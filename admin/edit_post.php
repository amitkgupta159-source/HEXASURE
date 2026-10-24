<?php
require_once '../backend/config.php';
require_once '../backend/auth.php';
require_once '../backend/db.php';

require_login();

$post_id = $_GET['id'] ?? null;
if (!$post_id) {
    header("Location: my_posts.php");
    exit;
}

$user_id = $_SESSION['user_id'];

// Fetch post and verify ownership
$stmt = $pdo->prepare("SELECT * FROM posts WHERE id = ? AND user_id = ?");
$stmt->execute([$post_id, $user_id]);
$post = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$post) {
    die("Post not found or you don't have permission to edit it.");
}

$message = '';
$error = '';

// Handle Update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_post'])) {
    $title = $_POST['title'];
    $excerpt = $_POST['excerpt'];
    $content = $_POST['content'];
    $category = $_POST['category'];
    $author = $_POST['author'];
    
    $stmt = $pdo->prepare("UPDATE posts SET title=?, excerpt=?, content=?, category=?, author=? WHERE id=?");
    if ($stmt->execute([$title, $excerpt, $content, $category, $author, $post_id])) {
        $message = "Post updated successfully.";
        // Refresh post data
        $stmt = $pdo->prepare("SELECT * FROM posts WHERE id = ?");
        $stmt->execute([$post_id]);
        $post = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        $error = "Failed to update post.";
    }
}

// Handle Delete
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_post'])) {
    $stmt = $pdo->prepare("DELETE FROM posts WHERE id = ?");
    if ($stmt->execute([$post_id])) {
        header("Location: my_posts.php");
        exit;
    } else {
        $error = "Failed to delete post.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Insight | <?php echo SITE_NAME; ?></title>
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
                <span>Edit Insight</span>
            </div>
            <a href="my_posts.php" class="btn btn-secondary" style="padding: 0.5rem 1rem; font-size: 0.9rem;">&larr; Back to My Insights</a>
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
                <input type="hidden" name="update_post" value="1">
                
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" value="<?php echo htmlspecialchars($post['title']); ?>" required>
                </div>
                
                <div class="grid grid-2" style="gap: 1.5rem;">
                    <div class="form-group">
                        <label>Category</label>
                        <select name="category">
                            <option value="Strategy" <?php echo $post['category'] == 'Strategy' ? 'selected' : ''; ?>>Strategy</option>
                            <option value="Ventures" <?php echo $post['category'] == 'Ventures' ? 'selected' : ''; ?>>Ventures</option>
                            <option value="Capital" <?php echo $post['category'] == 'Capital' ? 'selected' : ''; ?>>Capital</option>
                            <option value="Technology" <?php echo $post['category'] == 'Technology' ? 'selected' : ''; ?>>Technology</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Author</label>
                        <input type="text" name="author" value="<?php echo htmlspecialchars($post['author']); ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label>Excerpt</label>
                    <textarea name="excerpt" rows="3" required><?php echo htmlspecialchars($post['excerpt']); ?></textarea>
                </div>

                <div class="form-group">
                    <label>Content</label>
                    <textarea name="content" rows="15" required><?php echo htmlspecialchars($post['content']); ?></textarea>
                </div>

                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <button type="button" onclick="if(confirm('Are you sure you want to delete this post?')) document.getElementById('delete-form').submit();" class="btn btn-secondary" style="background: #FEF2F2; color: #991B1B; border-color: #FCA5A5;">Delete Post</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>

            <form id="delete-form" method="POST" style="display: none;">
                <input type="hidden" name="delete_post" value="1">
            </form>
        </div>
    </main>

</body>
</html>
