<?php
require_once __DIR__ . '/../backend/config.php';
// Get current page for active state
$current_page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo defined('PAGE_TITLE') ? htmlspecialchars(PAGE_TITLE, ENT_QUOTES, 'UTF-8') . ' | ' . SITE_NAME : SITE_NAME . ' | Go Beyond Your Studies.'; ?></title>
    <meta name="description" content="<?php echo defined('PAGE_DESC') ? htmlspecialchars(PAGE_DESC, ENT_QUOTES, 'UTF-8') : 'Hexasure offers private, one-to-one educational enrichment in reasoning, puzzles, and mathematical problem-solving.'; ?>">

    <!-- Theme Script (Prevent Flash) -->
    <script>
        (function() {
            const savedTheme = localStorage.getItem('theme');
            const systemTheme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
            const theme = savedTheme || systemTheme;
            document.documentElement.setAttribute('data-theme', theme);
        })();
    </script>

    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/global.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/typography.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/components.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/animations.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/home_hero.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/home_services.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/home_testimonials.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/home_blog.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/footer.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/about_hero.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/about_story.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/about_mission.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/about_values.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/about_differentiators.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/about_team.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/about_approach.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/about_promise.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/services_hero.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/services_pillars.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/services_priority.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/services_process.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/services_pricing.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/service_detail.css">
    
   <!-- Main SVG Favicon -->
    <link rel="icon" type="image/svg+xml" href="<?= BASE_URL ?>/assets/images/logo/ic_favicon.svg">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= BASE_URL ?>/assets/images/logo/favicon-32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= BASE_URL ?>/assets/images/logo/favicon-16.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= BASE_URL ?>/assets/images/logo/apple-touch-icon.png">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Outfit:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="loader-spinner"></div>
    </div>

    <header class="navbar">
        <div class="container nav-container">
            <a href="<?php echo BASE_URL; ?>/" class="logo">
                <img src="<?php echo BASE_URL; ?>/assets/images/logo/ic_main.svg" alt="Logo">
                <h3>hexasure</h3>
            </a>
            
            <button class="mobile-toggle" aria-label="Toggle navigation" aria-expanded="false" aria-controls="primary-navigation">☰</button>
            
            <nav class="nav-links" id="primary-navigation">
                <a href="<?php echo BASE_URL; ?>/index.php" class="nav-link <?php echo ($current_page == 'index.php') ? 'active' : ''; ?>">Home</a>
                <a href="<?php echo BASE_URL; ?>/services.php" class="nav-link <?php echo ($current_page == 'services.php') ? 'active' : ''; ?>">Programmes</a>
                <a href="<?php echo BASE_URL; ?>/approach.php" class="nav-link <?php echo ($current_page == 'approach.php') ? 'active' : ''; ?>">Our Approach</a>
                <a href="<?php echo BASE_URL; ?>/about.php" class="nav-link <?php echo ($current_page == 'about.php') ? 'active' : ''; ?>">About</a>
                <a href="<?php echo BASE_URL; ?>/blog.php" class="nav-link <?php echo ($current_page == 'blog.php' || strpos($_SERVER['REQUEST_URI'], '/blog/') !== false) ? 'active' : ''; ?>">Insights</a>
                <a href="<?php echo BASE_URL; ?>/contact.php" class="nav-link <?php echo ($current_page == 'contact.php') ? 'active' : ''; ?>">Contact</a>
                <a href="<?php echo BASE_URL; ?>/contact.php" class="btn btn-primary">Enquire About Lessons</a>
                
                <!-- Theme Toggle -->
                <button id="theme-toggle" class="theme-toggle" aria-label="Toggle Theme">
                    <svg class="icon-sun" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="5"></circle><line x1="12" y1="1" x2="12" y2="3"></line><line x1="12" y1="21" x2="12" y2="23"></line><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line><line x1="1" y1="12" x2="3" y2="12"></line><line x1="21" y1="12" x2="23" y2="12"></line><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line></svg>
                    <svg class="icon-moon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path></svg>
                </button>
            </nav>
        </div>
    </header>
    <main>
    
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const toggleBtn = document.getElementById('theme-toggle');
            const root = document.documentElement;
            
            if (toggleBtn) {
                toggleBtn.addEventListener('click', () => {
                    const currentTheme = root.getAttribute('data-theme');
                    const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
                    
                    root.setAttribute('data-theme', newTheme);
                    localStorage.setItem('theme', newTheme);
                });
            }
        });
    </script>
