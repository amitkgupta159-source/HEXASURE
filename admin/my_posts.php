<?php
require_once '../backend/config.php';
require_once '../backend/auth.php';
require_once '../backend/db.php';

require_login();

$user_id = $_SESSION['user_id'];

// Fetch user's posts
$stmt = $pdo->prepare("SELECT * FROM posts WHERE user_id = ? ORDER BY created_at DESC");
$stmt->execute([$user_id]);
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Insights | <?php echo SITE_NAME; ?></title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/typography.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/components.css">
    <link rel="icon" type="image/svg+xml" href="<?php echo BASE_URL; ?>/assets/images/logo/ic_favicon.svg">
    <style>
        body { background-color: #F9FAFB; }
        .admin-header { background: #fff; border-bottom: 1px solid var(--color-border); padding: 1rem 0; }
        .table-container { background: #fff; border-radius: 12px; border: 1px solid var(--color-border); overflow: hidden; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 1rem; text-align: left; border-bottom: 1px solid var(--color-border); }
        th { background: #F3F4F6; font-weight: 600; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 0.05em; color: var(--color-text-muted); }
        tr:last-child td { border-bottom: none; }
        .badge { padding: 0.25rem 0.5rem; border-radius: 4px; font-size: 0.75rem; font-weight: 600; }
        .badge-published { background: #D1FAE5; color: #065F46; }
        .badge-draft { background: #F3F4F6; color: #374151; }
    </style>
</head>
<body>

    <header class="admin-header">
        <div class="container" style="display: flex; justify-content: space-between; align-items: center;">
            <div style="display: flex; align-items: center; gap: 1rem;">
                <a href="dashboard.php" style="font-weight: 800; font-size: 1.25rem;"><?php echo SITE_NAME; ?></a>
                <span style="color: var(--color-border);">|</span>
                <span>My Insights</span>
            </div>
            <a href="dashboard.php" class="btn btn-secondary" style="padding: 0.5rem 1rem; font-size: 0.9rem;">&larr; Back to Dashboard</a>
        </div>
    </header>

    <main class="container" style="padding-top: 4rem; padding-bottom: 4rem;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
            <h1>My Insights</h1>
            <a href="create_post.php" class="btn btn-primary">Write New Insight</a>
        </div>

        <?php if (empty($posts)): ?>
            <div style="text-align: center; padding: 4rem; background: #fff; border-radius: 12px; border: 1px solid var(--color-border);">
                <p style="color: var(--color-text-muted); margin-bottom: 1.5rem;">You haven't written any insights yet.</p>
                <a href="create_post.php" class="btn btn-primary">Start Writing</a>
            </div>
        <?php else: ?>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($posts as $post): ?>
                        <tr>
                            <td>
                                <strong style="display: block; font-size: 1rem;"><?php echo htmlspecialchars($post['title']); ?></strong>
                                <span style="font-size: 0.85rem; color: var(--color-text-muted);"><?php echo htmlspecialchars($post['slug']); ?></span>
                            </td>
                            <td><?php echo htmlspecialchars($post['category']); ?></td>
                            <td><span class="badge badge-<?php echo $post['status']; ?>"><?php echo ucfirst($post['status']); ?></span></td>
                            <td><?php echo date('M d, Y', strtotime($post['created_at'])); ?></td>
                            <td>
                                <div style="display: flex; gap: 0.5rem;">
                                    <a href="edit_post.php?id=<?php echo $post['id']; ?>" class="btn btn-secondary" style="padding: 0.25rem 0.75rem; font-size: 0.85rem;">Edit</a>
                                    <a href="../blog/<?php echo $post['slug']; ?>" target="_blank" class="btn btn-text" style="font-size: 0.85rem;">View</a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </main>

</body>
</html>
