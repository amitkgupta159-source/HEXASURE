<?php
require_once '../backend/config.php';
require_once '../backend/auth.php';
require_once '../backend/db.php';

require_login();

$id = $_SESSION['user_id'];

// Fetch user
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    die("User not found.");
}

$message = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Update Profile
    if (isset($_POST['update_profile'])) {
        $title = $_POST['title'];
        $first_name = $_POST['first_name'];
        $middle_name = $_POST['middle_name'];
        $last_name = $_POST['last_name'];
        $gender = $_POST['gender'];
        
        $stmt = $pdo->prepare("UPDATE users SET title=?, first_name=?, middle_name=?, last_name=?, gender=? WHERE id=?");
        if ($stmt->execute([$title, $first_name, $middle_name, $last_name, $gender, $id])) {
            $message = "Profile updated successfully.";
            // Update session name if changed
            $_SESSION['user_name'] = ($first_name ?? 'User') . ' ' . ($last_name ?? '');
            
            // Refresh user data
            $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
            $stmt->execute([$id]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            $error = "Failed to update profile.";
        }
    }

    // Reset Password
    if (isset($_POST['change_password'])) {
        $new_password = $_POST['new_password'];
        if (strlen($new_password) < 4) {
            $error = "Password must be at least 4 characters.";
        } else {
            $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("UPDATE users SET password_hash=? WHERE id=?");
            if ($stmt->execute([$password_hash, $id])) {
                $message = "Password changed successfully.";
            } else {
                $error = "Failed to change password.";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile | <?php echo SITE_NAME; ?></title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/typography.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/components.css">
    <link rel="icon" type="image/svg+xml" href="<?php echo BASE_URL; ?>/assets/images/logo/ic_favicon.svg">
    <style>
        body { background-color: #F9FAFB; }
        .admin-header { background: #fff; border-bottom: 1px solid var(--color-border); padding: 1rem 0; }
        .card { background: #fff; padding: 2rem; border-radius: 12px; border: 1px solid var(--color-border); margin-bottom: 2rem; }
        .form-group { margin-bottom: 1.5rem; }
        .form-group label { display: block; margin-bottom: 0.5rem; font-weight: 600; }
        .form-group input, .form-group select { width: 100%; padding: 0.75rem; border: 1px solid var(--color-border); border-radius: 8px; font-family: inherit; }
        .alert { padding: 1rem; border-radius: 8px; margin-bottom: 2rem; }
        .alert-success { background: #D1FAE5; color: #065F46; }
        .alert-error { background: #FEE2E2; color: #991B1B; }
    </style>
</head>
<body>

    <header class="admin-header">
        <div class="container" style="display: flex; justify-content: space-between; align-items: center;">
            <div style="display: flex; align-items: center; gap: 1rem;">
                <a href="dashboard.php" style="font-weight: 800; font-size: 1.25rem;"><?php echo SITE_NAME; ?></a>
                <span style="color: var(--color-border);">|</span>
                <span>My Profile</span>
            </div>
            <a href="dashboard.php" class="btn btn-secondary" style="padding: 0.5rem 1rem; font-size: 0.9rem;">&larr; Back to Dashboard</a>
        </div>
    </header>

    <main class="container" style="padding-top: 4rem; padding-bottom: 4rem; max-width: 800px;">
        
        <?php if ($message): ?>
            <div class="alert alert-success"><?php echo $message; ?></div>
        <?php endif; ?>
        
        <?php if ($error): ?>
            <div class="alert alert-error"><?php echo $error; ?></div>
        <?php endif; ?>

        <!-- Profile Form -->
        <div class="card">
            <h2 style="margin-bottom: 1.5rem;">Edit Profile</h2>
            <form method="POST">
                <input type="hidden" name="update_profile" value="1">
                
                <div class="grid grid-2" style="gap: 1.5rem;">
                    <div class="form-group">
                        <label>Title</label>
                        <select name="title">
                            <option value="">Select...</option>
                            <option value="Mr." <?php echo $user['title'] == 'Mr.' ? 'selected' : ''; ?>>Mr.</option>
                            <option value="Ms." <?php echo $user['title'] == 'Ms.' ? 'selected' : ''; ?>>Ms.</option>
                            <option value="Mrs." <?php echo $user['title'] == 'Mrs.' ? 'selected' : ''; ?>>Mrs.</option>
                            <option value="Dr." <?php echo $user['title'] == 'Dr.' ? 'selected' : ''; ?>>Dr.</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Gender</label>
                        <select name="gender">
                            <option value="">Select...</option>
                            <option value="Male" <?php echo $user['gender'] == 'Male' ? 'selected' : ''; ?>>Male</option>
                            <option value="Female" <?php echo $user['gender'] == 'Female' ? 'selected' : ''; ?>>Female</option>
                            <option value="Other" <?php echo $user['gender'] == 'Other' ? 'selected' : ''; ?>>Other</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-3" style="gap: 1.5rem;">
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="first_name" value="<?php echo htmlspecialchars($user['first_name'] ?? ''); ?>">
                    </div>
                    <div class="form-group">
                        <label>Middle Name</label>
                        <input type="text" name="middle_name" value="<?php echo htmlspecialchars($user['middle_name'] ?? ''); ?>">
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="last_name" value="<?php echo htmlspecialchars($user['last_name'] ?? ''); ?>">
                    </div>
                </div>

                <div style="text-align: right;">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>

        <!-- Password Reset -->
        <div class="card" style="border-color: #FCA5A5;">
            <h2 style="margin-bottom: 1.5rem; color: #991B1B;">Change Password</h2>
            <form method="POST">
                <input type="hidden" name="change_password" value="1">
                <div class="form-group">
                    <label>New Password</label>
                    <input type="password" name="new_password" required placeholder="Enter new password">
                </div>
                <div style="text-align: right;">
                    <button type="submit" class="btn btn-secondary" style="background: #FEF2F2; color: #991B1B; border-color: #FCA5A5;">Change Password</button>
                </div>
            </form>
        </div>

    </main>

</body>
</html>
