<?php
require_once __DIR__ . '/../backend/db.php';

/**
 * Get latest published posts
 */
function get_latest_posts($limit = 3) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM posts WHERE status = 'published' ORDER BY published_at DESC LIMIT :limit");
    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll();
}

/**
 * Get all published posts with pagination
 */
function get_all_posts($limit = 6, $offset = 0) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM posts WHERE status = 'published' ORDER BY published_at DESC LIMIT :limit OFFSET :offset");
    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll();
}

/**
 * Get total count of published posts
 */
function get_total_posts_count() {
    global $pdo;
    $stmt = $pdo->query("SELECT COUNT(*) FROM posts WHERE status = 'published'");
    return $stmt->fetchColumn();
}

/**
 * Get single post by slug
 */
function get_post_by_slug($slug) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM posts WHERE slug = :slug AND status = 'published' LIMIT 1");
    $stmt->execute(['slug' => $slug]);
    return $stmt->fetch();
}
/**
 * Get highlighted insights for home screen
 */
function get_highlighted_insights($limit = 5) {
    global $pdo;
    try {
        $stmt = $pdo->prepare("SELECT * FROM M_Insights WHERE highlight = 1 ORDER BY published_date DESC LIMIT :limit");
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        // Fallback or return empty if table doesn't exist yet
        return [];
    }
}
?>
