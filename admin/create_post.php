<?php
require_once '../backend/config.php';
require_once '../backend/auth.php';
require_once '../backend/db.php';

require_login();

$message = '';
$error = '';

$user_id = $_SESSION['user_id'];

// Fetch user's first name for default author
$stmt = $pdo->prepare("SELECT first_name FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user_data = $stmt->fetch(PDO::FETCH_ASSOC);
$first_name = $user_data['first_name'] ?? 'Team';
$default_author = $first_name . ' on behalf of Hexasure';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title)));
    $excerpt = $_POST['excerpt'] ?? '';
    $content = $_POST['content'] ?? '';
    $author = $_POST['author'] ?? $default_author;
    $category = $_POST['category'] ?? 'Strategy';
    $status = 'published'; // Default to published for now

    if ($title && $content) {
        try {
            $stmt = $pdo->prepare("INSERT INTO posts (user_id, slug, title, excerpt, content, author, category, status, published_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW())");
            $stmt->execute([$user_id, $slug, $title, $excerpt, $content, $author, $category, $status]);
            $message = "Post published successfully! <a href='../blog/" . $slug . "'>View Post</a>";
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) { // Duplicate entry
                $error = "A post with this title already exists.";
            } else {
                $error = "Error: " . $e->getMessage();
            }
        }
    } else {
        $error = "Title and Content are required.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Insight | <?php echo SITE_NAME; ?></title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/typography.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/components.css">
    <link rel="icon" type="image/svg+xml" href="<?php echo BASE_URL; ?>/assets/images/logo/ic_favicon.svg">
    <style>
        body { background-color: #F9FAFB; }
        .admin-header { background: #fff; border-bottom: 1px solid var(--color-border); padding: 1rem 0; }
        .editor-container { background: #fff; padding: 2rem; border-radius: 12px; border: 1px solid var(--color-border); max-width: 800px; margin: 0 auto; }
        .form-group { margin-bottom: 1.5rem; }
        .form-group label { display: block; margin-bottom: 0.5rem; font-weight: 600; }
        .form-group input, .form-group textarea, .form-group select { width: 100%; padding: 0.75rem; border: 1px solid var(--color-border); border-radius: 8px; font-family: inherit; }
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
                <span>Create Insight</span>
            </div>
            <a href="dashboard.php" class="btn btn-secondary" style="padding: 0.5rem 1rem; font-size: 0.9rem;">&larr; Back to Dashboard</a>
        </div>
    </header>

    <main class="container" style="padding-top: 4rem; padding-bottom: 4rem;">
        
        <?php if ($message): ?>
            <div class="alert alert-success"><?php echo $message; ?></div>
        <?php endif; ?>
        
        <?php if ($error): ?>
            <div class="alert alert-error"><?php echo $error; ?></div>
        <?php endif; ?>

        <div class="editor-container">
            <form method="POST">
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" placeholder="e.g. The Future of Fintech" required>
                </div>
                
                <div class="grid grid-2" style="gap: 1.5rem;">
                    <div class="form-group">
                        <label>Category</label>
                        <select name="category">
                            <option value="Strategy">Strategy</option>
                            <option value="Ventures">Ventures</option>
                            <option value="Capital">Capital</option>
                            <option value="Technology">Technology</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Author</label>
                        <input type="text" name="author" value="<?php echo htmlspecialchars($default_author); ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label>Excerpt (Short Summary)</label>
                    <textarea name="excerpt" rows="3" placeholder="Brief description for the card preview..." required></textarea>
                </div>

                <div class="form-group">
                    <label>Content (HTML allowed)</label>
                    <textarea name="content" rows="15" placeholder="<p>Write your article content here...</p>" required></textarea>
                    <p style="font-size: 0.85rem; color: var(--color-text-muted); margin-top: 0.5rem;">Tip: You can use HTML tags like &lt;p&gt;, &lt;h2&gt;, &lt;ul&gt;, etc.</p>
                </div>

                <div style="text-align: right;">
                    <button type="submit" class="btn btn-primary">Publish Insight</button>
                </div>
            </form>
        </div>
    </main>

</body>
</html>