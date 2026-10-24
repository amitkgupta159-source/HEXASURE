<?php
define('PAGE_TITLE', 'Our Approach');
define('PAGE_DESC', 'Discover Hexasure’s approach to private, one-to-one learning built on observation, independent reasoning, guided practice, and clear explanations.');
require_once 'includes/header.php';
?>

<section class="edu-hero">
    <div class="container text-center">
        <div class="edu-hero__badge">Our approach</div>
        <h1>Learning to think, not just to answer.</h1>
        <p>
            Private, one-to-one lessons help students examine a problem, choose a strategy, and explain how they reached a solution.
        </p>
    </div>
</section>

<section class="edu-section">
    <div class="container">
        <div class="edu-section-header reveal">
            <h2>Reasoning is the real practice.</h2>
            <p>
                Each programme uses puzzles and mathematical challenges to help students build habits they can apply to unfamiliar problems.
            </p>
        </div>

        <div class="edu-philosophy-grid">
            <article class="philosophy-card reveal">
                <h3>Observe before acting.</h3>
                <p>Notice clues, patterns, and constraints before choosing a move or method.</p>
            </article>
            <article class="philosophy-card reveal delay-100">
                <h3>Explore more than one route.</h3>
                <p>Compare strategies and learn when different approaches are useful.</p>
            </article>
            <article class="philosophy-card reveal">
                <h3>Explain why it works.</h3>
                <p>Put reasoning into words and support conclusions with clear steps.</p>
            </article>
            <article class="philosophy-card reveal delay-100">
                <h3>Persist through challenge.</h3>
                <p>Treat mistakes as information and use them to refine the next attempt.</p>
            </article>
        </div>
    </div>
</section>

<section class="edu-section">
    <div class="container">
        <div class="edu-section-header reveal">
            <h2>A personal learning process</h2>
            <p>Lessons are intended to adapt to a student’s current level, interests, and learning goals.</p>
        </div>
        <div class="edu-step-grid">
            <article class="step-card reveal">
                <div class="step-number">1</div>
                <h3>Understand the goal</h3>
                <p>Discuss the student's interests, experience, and what they hope to develop.</p>
            </article>
            <article class="step-card reveal delay-100">
                <div class="step-number">2</div>
                <h3>Choose a challenge</h3>
                <p>Focus on cube puzzles, Sudoku and logical reasoning, or mathematical problem-solving.</p>
            </article>
            <article class="step-card reveal delay-200">
                <div class="step-number">3</div>
                <h3>Work through it together</h3>
                <p>Use guided questions and practice to develop the student's own approach.</p>
            </article>
            <article class="step-card reveal delay-300">
                <div class="step-number">4</div>
                <h3>Reflect and continue</h3>
                <p>Review the reasoning and discuss a useful next challenge.</p>
            </article>
        </div>
    </div>
</section>

<section class="edu-section">
    <div class="container">
        <div class="edu-cta reveal">
            <h2>Choose a programme to get started.</h2>
            <p>Explore the three learning areas or send an enquiry to discuss what may suit the student.</p>
            <div class="hero-buttons">
                <a href="<?php echo BASE_URL; ?>/services.php" class="btn btn-primary">Explore Programmes</a>
                <a href="<?php echo BASE_URL; ?>/contact.php" class="btn btn-secondary">Enquire About Lessons</a>
            </div>
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
