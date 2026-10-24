<?php
require_once __DIR__ . '/../backend/config.php';
require_once __DIR__ . '/../includes/blog_helpers.php';
require_once __DIR__ . '/../includes/functions.php';

$slug = isset($_GET['slug']) && is_string($_GET['slug']) ? $_GET['slug'] : '';
$post = get_post_by_slug($slug);

if (!$post) {
    header('Location: ' . BASE_URL . '/blog.php');
    exit();
}

define('PAGE_TITLE', $post['title']);
define('PAGE_DESC', strip_tags($post['excerpt']));
require_once __DIR__ . '/../includes/header.php';
?>

<article class="edu-section insight-post">
    <div class="container insight-post-container">
        <header class="insight-post-header">
            <div class="eyebrow"><?php echo htmlspecialchars($post['category'], ENT_QUOTES, 'UTF-8'); ?></div>
            <h1><?php echo htmlspecialchars($post['title'], ENT_QUOTES, 'UTF-8'); ?></h1>
            <p class="insight-post-meta">
                By <?php echo htmlspecialchars($post['author'], ENT_QUOTES, 'UTF-8'); ?>
                <span aria-hidden="true">·</span>
                <?php echo htmlspecialchars(format_date($post['published_at']), ENT_QUOTES, 'UTF-8'); ?>
            </p>
        </header>

        <div class="insight-post-content">
            <?php echo $post['content']; ?>
        </div>

        <footer class="insight-post-footer">
            <a href="<?php echo BASE_URL; ?>/blog.php" class="btn btn-secondary">&larr; Back to Insights</a>
            <a href="<?php echo BASE_URL; ?>/contact.php" class="btn btn-primary">Enquire About Lessons</a>
        </footer>
    </div>
</article>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
