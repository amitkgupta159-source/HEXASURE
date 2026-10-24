<?php
require_once '../backend/config.php';
require_once '../backend/auth.php';

require_login();

// Handle Logout
if (isset($_GET['logout'])) {
    logout();
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | <?php echo SITE_NAME; ?></title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/typography.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/components.css">
    <link rel="icon" type="image/svg+xml" href="<?php echo BASE_URL; ?>/assets/images/logo/ic_favicon.svg">
    <style>
        body { background-color: #F9FAFB; }
        .admin-header {
            background: #fff;
            border-bottom: 1px solid var(--color-border);
            padding: 1rem 0;
        }
        .admin-nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .dashboard-card {
            background: #fff;
            padding: 2rem;
            border-radius: 12px;
            border: 1px solid var(--color-border);
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .dashboard-card:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }
        .icon { font-size: 2rem; margin-bottom: 1rem; display: block; }
    </style>
</head>
<body>

    <header class="admin-header">
        <div class="container admin-nav">
            <div style="display: flex; align-items: center; gap: 1rem;">
                <a href="<?php echo BASE_URL; ?>/" style="font-weight: 800; font-size: 1.25rem;"><?php echo SITE_NAME; ?></a>
                <span style="color: var(--color-border);">|</span>
                <span style="color: var(--color-text-muted);">Dashboard</span>
            </div>
            <div style="display: flex; align-items: center; gap: 1.5rem;">
                <span>Welcome, <strong><?php echo htmlspecialchars($_SESSION['user_name']); ?></strong></span>
                <a href="?logout=true" class="btn btn-secondary" style="padding: 0.5rem 1rem; font-size: 0.9rem;">Logout</a>
            </div>
        </div>
    </header>

    <main class="container" style="padding-top: 4rem;">
        <h1 style="margin-bottom: 2rem;">Overview</h1>
        
        <div class="grid grid-3">
            <!-- Create Post -->
            <a href="create_post.php" class="dashboard-card">
                <span class="icon">✍️</span>
                <h3>Write New Insight</h3>
                <p style="color: var(--color-text-muted); margin-top: 0.5rem;">Draft and publish a new blog post.</p>
            </a>

            <!-- Manage Users (Super Admin Only) -->
            <?php if (!empty($_SESSION['is_super_admin'])): ?>
            <a href="users.php" class="dashboard-card">
                <span class="icon">👥</span>
                <h3>Manage Users</h3>
                <p style="color: var(--color-text-muted); margin-top: 0.5rem;">Add users, edit profiles, and reset passwords.</p>
            </a>
            <?php endif; ?>

            <!-- Manage Insights -->
            <a href="my_posts.php" class="dashboard-card">
                <span class="icon">📄</span>
                <h3>My Insights</h3>
                <p style="color: var(--color-text-muted); margin-top: 0.5rem;">View, edit, and manage your articles.</p>
            </a>

            <!-- My Profile -->
            <a href="profile.php" class="dashboard-card">
                <span class="icon">👤</span>
                <h3>My Profile</h3>
                <p style="color: var(--color-text-muted); margin-top: 0.5rem;">Update your name, details, and password.</p>
            </a>
        </div>
    </main>

</body>
</html>