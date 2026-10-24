<?php
define('PAGE_TITLE', 'Insights');
define('PAGE_DESC', 'Explore ideas on cube-solving, Sudoku, logical reasoning, mathematical problem-solving, and the habits that support independent learning.');
require_once 'includes/header.php';
require_once 'includes/blog_helpers.php';
require_once 'includes/functions.php';

// Keep published articles database-driven; existing posts and records are not changed here.
$page = max(1, isset($_GET['page']) ? (int)$_GET['page'] : 1);
$limit = 7; // Get 7 posts (1 featured + 6 grid)
$offset = ($page - 1) * 6; // Offset for grid (skip featured if page 1)

// If page 1, we want 1 featured + 6 grid. 
// If page > 1, we just want 6 grid items, offset by 1 (featured) + previous pages.
// Actually simpler: Just get all posts with limit and handle display logic.

$all_posts = get_all_posts($limit, ($page == 1 ? 0 : $offset + 1)); // Adjust offset to skip featured on page 2+
$total_posts = get_total_posts_count();
$total_pages = ceil(($total_posts - 1) / 6); // Subtract 1 for featured

$featured_post = null;
$grid_posts = [];

if ($page == 1 && !empty($all_posts)) {
    $featured_post = $all_posts[0];
    $grid_posts = array_slice($all_posts, 1);
} else {
    $grid_posts = $all_posts;
}
?>

<!-- Header / Featured Section -->
<section class="edu-hero">
    <div class="container">
        <div class="edu-section-header reveal">
            <div class="edu-hero__badge">Ideas for curious learners</div>
            <h1>Insights for thinking beyond the answer.</h1>
            <p>
                Explore approaches to cube-solving, Sudoku, logical reasoning, mathematical challenges, and independent learning.
            </p>
        </div>

        <?php if ($featured_post): ?>
        <!-- Featured Post -->
        <div class="reveal delay-100" style="margin-top: 4rem; margin-bottom: 6rem;">
            <a href="<?php echo BASE_URL; ?>/blog/post.php?slug=<?php echo rawurlencode($featured_post['slug']); ?>" class="insight-featured-link">
                <div class="insight-featured">
                    <div>
                        <span class="eyebrow">Featured Insight</span>
                        <h2>
                            <?php echo htmlspecialchars($featured_post['title']); ?>
                        </h2>
                        <p class="insight-featured-excerpt">
                            <?php echo htmlspecialchars(truncate_text($featured_post['excerpt'], 200), ENT_QUOTES, 'UTF-8'); ?>
                        </p>
                        <div class="insight-meta">
                            <span>Read Article &rarr;</span>
                            <span>|</span>
                            <span><?php echo format_date($featured_post['published_at']); ?></span>
                            <span>|</span>
                            <span><?php echo htmlspecialchars($featured_post['category']); ?></span>
                        </div>
                    </div>
                    <div class="insight-featured-art" aria-hidden="true">
                        <span class="insight-art-mark">?</span>
                        <span>Observe. Reason. Explain.</span>
                    </div>
                </div>
            </a>
        </div>
        <?php endif; ?>
    </div>
</section>

<!-- Latest Posts Grid -->
<section class="edu-section">
    <div class="container">
        <div class="edu-section-header reveal">
            <h2>Explore learning themes</h2>
            <p>These are the three programme areas around which Hexasure’s educational insights are organised.</p>
        </div>

        <div class="insight-topic-grid">
            <a href="<?php echo BASE_URL; ?>/services.php#cube-puzzles" class="insight-topic-card">
                <span class="eyebrow">01 · Cube puzzles</span>
                <h3>Cube-solving techniques</h3>
                <p>Patterns, spatial reasoning, algorithms, and patient practice.</p>
            </a>
            <a href="<?php echo BASE_URL; ?>/services.php#sudoku-logical-reasoning" class="insight-topic-card">
                <span class="eyebrow">02 · Logical reasoning</span>
                <h3>Sudoku strategies</h3>
                <p>Structured deduction, elimination, and solving without guesswork.</p>
            </a>
            <a href="<?php echo BASE_URL; ?>/services.php#olympiad-problem-solving" class="insight-topic-card">
                <span class="eyebrow">03 · Mathematical thinking</span>
                <h3>Challenges and proofs</h3>
                <p>Creative approaches, clear arguments, and why a solution works.</p>
            </a>
        </div>

        <div class="insight-articles">
            <h2 class="reveal">Latest published articles</h2>
            <p class="insight-articles-note">
                Articles remain loaded from the existing publishing database. Existing records have not been edited or deleted.
            </p>
            
            <div class="grid grid-3">
                <?php if ($grid_posts): ?>
                    <?php foreach ($grid_posts as $index => $post): ?>
                        <article class="insight-article-card reveal">
                            <div class="insight-article-art" aria-hidden="true"></div>
                            
                            <div class="eyebrow">
                                <?php echo htmlspecialchars($post['category']); ?>
                            </div>
                            
                            <h3>
                                <a href="<?php echo BASE_URL; ?>/blog/post.php?slug=<?php echo rawurlencode($post['slug']); ?>"><?php echo htmlspecialchars($post['title']); ?></a>
                            </h3>
                            
                            <p>
                                <?php echo htmlspecialchars(truncate_text($post['excerpt'], 100), ENT_QUOTES, 'UTF-8'); ?>
                            </p>
                            
                            <div class="insight-article-date">
                                <?php echo format_date($post['published_at']); ?>
                            </div>
                        </article>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="insight-empty-state">
                        <p>No published articles are available on this page yet. Explore a programme to discover the learning themes.</p>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Pagination -->
            <?php if ($total_pages > 1): ?>
                <div class="reveal insight-pagination">
                    <?php if ($page > 1): ?>
                        <a href="?page=<?php echo $page - 1; ?>" class="btn btn-secondary">&larr; Previous</a>
                    <?php endif; ?>
                    
                    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                        <a href="?page=<?php echo $i; ?>" class="btn <?php echo ($i == $page) ? 'btn-primary' : 'btn-secondary'; ?>">
                            <?php echo $i; ?>
                        </a>
                    <?php endfor; ?>
                    
                    <?php if ($page < $total_pages): ?>
                        <a href="?page=<?php echo $page + 1; ?>" class="btn btn-secondary">Next &rarr;</a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
