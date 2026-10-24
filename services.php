<?php
define('PAGE_TITLE', 'Programmes');
define('PAGE_DESC', 'Hexasure offers private, one-to-one learning in cube puzzles and speedcubing, sudoku and logical reasoning, and mathematical olympiad problem-solving.');
require_once 'includes/header.php';
?>

<section class="edu-hero">
    <div class="container text-center">
        <div class="edu-hero__badge">Private, one-to-one learning</div>
        <h1>Programmes for independent thinking.</h1>
        <p>
            Build reasoning, persistence, and problem-solving confidence through carefully guided learning in three focused categories.
        </p>
    </div>
</section>

<section class="edu-section">
    <div class="container">
        <div class="edu-section-header reveal">
            <h2>Three pathways to stronger reasoning</h2>
            <p>
                Each programme is designed to help students think more clearly, solve unfamiliar challenges, and explain their thinking with confidence.
            </p>
        </div>

        <div class="edu-programmes-grid">
            <article class="programme-card reveal" id="cube-puzzles">
                <span class="eyebrow">Category 01</span>
                <h3>Cube Puzzles & Speedcubing</h3>
                <p>
                    Learn to observe patterns, apply efficient techniques, and improve spatial reasoning through guided cube-solving practice.
                </p>
                <ul class="programme-features">
                    <li>2x2, 3x3, 4x4, and Mirror Cube</li>
                    <li>Algorithms, observation, and reduction of errors</li>
                    <li>Persistence in unfamiliar problem-solving</li>
                </ul>
                <a class="programme-link" href="<?php echo BASE_URL; ?>/contact.php">Enquire about this programme &rarr;</a>
            </article>

            <article class="programme-card reveal delay-100" id="sudoku-logical-reasoning">
                <span class="eyebrow">Category 02</span>
                <h3>Sudoku & Logical Reasoning</h3>
                <p>
                    Develop systematic thinking through structured deduction, elimination, and disciplined reasoning without guesswork.
                </p>
                <ul class="programme-features">
                    <li>Beginner, intermediate, and advanced Sudoku</li>
                    <li>Constraint-based reasoning and pattern recognition</li>
                    <li>Clear steps, checking, and logical justification</li>
                </ul>
                <a class="programme-link" href="<?php echo BASE_URL; ?>/contact.php">Enquire about this programme &rarr;</a>
            </article>

            <article class="programme-card reveal delay-200" id="olympiad-problem-solving">
                <span class="eyebrow">Category 03</span>
                <h3>Mathematical Olympiad & Problem-Solving</h3>
                <p>
                    Explore elegant problem-solving, structured arguments, and mathematical proof through olympiad-style challenges.
                </p>
                <ul class="programme-features">
                    <li>Number theory, combinatorics, and geometry</li>
                    <li>Creative and rigorous mathematical thinking</li>
                    <li>Explaining why a solution works</li>
                </ul>
                <a class="programme-link" href="<?php echo BASE_URL; ?>/contact.php">Enquire about this programme &rarr;</a>
            </article>
        </div>
    </div>
</section>

<section class="edu-section">
    <div class="container">
        <div class="edu-profile-grid">
            <div class="edu-profile-card reveal">
                <h2>Learning approach</h2>
                <p>
                    Every lesson is shaped around the student’s current level, goals, and the habits needed to tackle unfamiliar challenges with confidence.
                </p>
                <p>
                    We focus on problem structure, independent thinking, and clear reasoning rather than answer-first methods.
                </p>
            </div>
            <div class="edu-callout reveal delay-100">
                <h2>Private lesson format</h2>
                <p>
                    Students may be school-age and may require parent or guardian support at the enquiry stage. The learning experience is designed to remain personalised, focused, and age-appropriate.
                </p>
                <p>
                    Full lesson logistics, availability, and pricing details remain subject to final confirmation and are intentionally kept flexible at this stage.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="edu-section">
    <div class="container">
        <div class="edu-cta reveal">
            <h2>Book a learning conversation.</h2>
            <p>
                Tell us which programme fits the student best and we will guide the next steps with a personalised approach.
            </p>
            <div class="hero-buttons">
                <a href="<?php echo BASE_URL; ?>/contact.php" class="btn btn-primary">Enquire About Lessons</a>
                <a href="<?php echo BASE_URL; ?>/about.php" class="btn btn-secondary">Learn About Hexasure</a>
            </div>
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
