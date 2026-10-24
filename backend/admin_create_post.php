<?php
require_once 'db.php';
require_once '../includes/functions.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = sanitize_input($_POST['title']);
    // Simple slug generation
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title)));
    $excerpt = sanitize_input($_POST['excerpt']);
    $content = $_POST['content']; // Allow HTML in content
    $author = sanitize_input($_POST['author']);
    $category = sanitize_input($_POST['category']);
    $status = 'published';
    $published_at = date('Y-m-d H:i:s');

    try {
        $stmt = $pdo->prepare("INSERT INTO posts (slug, title, excerpt, content, author, category, status, published_at) VALUES (:slug, :title, :excerpt, :content, :author, :category, :status, :published_at)");
        $stmt->execute([
            ':slug' => $slug,
            ':title' => $title,
            ':excerpt' => $excerpt,
            ':content' => $content,
            ':author' => $author,
            ':category' => $category,
            ':status' => $status,
            ':published_at' => $published_at
        ]);
        $message = "Post created successfully! <a href='../blog/$slug'>View Post</a>";
    } catch (PDOException $e) {
        $message = "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Create Post</title>
    <style>
        body { font-family: sans-serif; max-width: 800px; margin: 2rem auto; padding: 0 1rem; }
        form { display: flex; flex-direction: column; gap: 1rem; }
        input, textarea, select { padding: 0.5rem; font-size: 1rem; }
        button { padding: 0.7rem; background: #1D4ED8; color: white; border: none; cursor: pointer; }
        .message { padding: 1rem; background: #e0f2fe; margin-bottom: 1rem; }
    </style>
</head>
<body>
    <h1>Create New Blog Post</h1>
    <?php if ($message): ?>
        <div class="message"><?php echo $message; ?></div>
    <?php endif; ?>
    <form method="POST">
        <input type="text" name="title" placeholder="Title" required>
        <input type="text" name="author" placeholder="Author" value="Hexasure Insights">
        <input type="text" name="category" placeholder="Category" required>
        <textarea name="excerpt" placeholder="Excerpt" rows="3" required></textarea>
        <textarea name="content" placeholder="Content (HTML allowed)" rows="10" required></textarea>
        <button type="submit">Publish Post</button>
    </form>
</body>
</html>
