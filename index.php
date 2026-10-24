<?php
define('PAGE_TITLE', 'Home');
define('PAGE_DESC', 'Hexasure helps students build critical thinking, logical reasoning, observation, and independent problem-solving through private, one-to-one learning.');
require_once 'includes/header.php';
?>

<section class="edu-hero">
    <div class="container text-center">
        <div class="edu-hero__badge">Private learning • reasoning-first</div>
        <h1>Go Beyond Your Studies.</h1>
        <p>
            Build sharper thinking, stronger reasoning, and independent problem-solving through private, one-to-one learning.
        </p>

        <div class="hero-cta-wrapper">
            <div class="hero-buttons">
                <a href="<?php echo BASE_URL; ?>/services.php" class="btn btn-primary">Explore Our Programmes</a>
                <a href="<?php echo BASE_URL; ?>/contact.php" class="btn btn-secondary">Enquire About Private Lessons</a>
            </div>

            <div class="edu-proof-row">
                <span>✓ One-to-one support</span>
                <span>✓ Independent thinking</span>
                <span>✓ Personalised learning plans</span>
            </div>
        </div>
    </div>
</section>

<section class="cube-feature-section" aria-labelledby="cube-feature-heading">
    <div class="container cube-feature-layout">
        <div class="cube-feature-copy reveal">
            <span class="eyebrow">A closer look · Cube puzzles</span>
            <h2 id="cube-feature-heading">See the patterns. Find the next move.</h2>
            <p>
                Cube puzzles turn observation into action. In one-to-one lessons, students explore how pieces move, recognise patterns, and choose a strategy rather than relying on guesswork.
            </p>
            <p>
                Explore 3x3 and 4x4 cube challenges as part of the Cube Puzzles &amp; Speedcubing programme.
            </p>
            <a href="<?php echo BASE_URL; ?>/services.php#cube-puzzles" class="btn btn-primary">Explore Cube Puzzles</a>
        </div>

        <div class="cube-scene reveal" data-cube-scene>
            <div class="cube-orbit cube-orbit--large" data-scroll-cube role="img" aria-label="Animated 3D-style 4 by 4 cube illustration">
                <?php foreach (['front', 'back', 'right', 'left', 'top', 'bottom'] as $face): ?>
                    <div class="cube-face cube-face--<?php echo $face; ?>" style="--cube-size: 4;" aria-hidden="true">
                        <?php for ($sticker = 0; $sticker < 16; $sticker++): ?>
                            <span class="cube-sticker"></span>
                        <?php endfor; ?>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="cube-orbit cube-orbit--small" data-scroll-cube role="img" aria-label="Animated 3D-style 3 by 3 cube illustration">
                <?php foreach (['front', 'back', 'right', 'left', 'top', 'bottom'] as $face): ?>
                    <div class="cube-face cube-face--<?php echo $face; ?>" style="--cube-size: 3;" aria-hidden="true">
                        <?php for ($sticker = 0; $sticker < 9; $sticker++): ?>
                            <span class="cube-sticker"></span>
                        <?php endfor; ?>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="cube-scene-caption">
                <span>3×3</span>
                <span>4×4</span>
                <span>Observe · Plan · Solve</span>
            </div>
        </div>
    </div>
</section>

<section class="edu-section">
    <div class="container">
        <div class="edu-section-header reveal">
            <h2>Three learning programmes</h2>
            <p>
                Designed for curious students who want to solve unfamiliar problems with clarity, structure, and confidence.
            </p>
        </div>

        <div class="edu-programmes-grid">
            <article class="programme-card reveal" id="cube-puzzles">
                <span class="eyebrow">Programme 01</span>
                <h3>Cube Puzzles & Speedcubing</h3>
                <p>
                    Develop spatial reasoning, observation, pattern recognition, and efficient problem-solving through structured cube practice.
                </p>
                <ul class="programme-features">
                    <li>2x2, 3x3, 4x4, and Mirror Cube</li>
                    <li>Algorithmic thinking and persistence</li>
                    <li>Improved focus and pattern recognition</li>
                </ul>
                <a class="programme-link" href="<?php echo BASE_URL; ?>/services.php#cube-puzzles">View programme &rarr;</a>
            </article>

            <article class="programme-card reveal" id="sudoku-logical-reasoning">
                <span class="eyebrow">Programme 02</span>
                <h3>Sudoku & Logical Reasoning</h3>
                <p>
                    Strengthen systematic thinking, elimination techniques, and constraint-based reasoning using progressive, well-structured challenges.
                </p>
                <ul class="programme-features">
                    <li>Beginner to advanced Sudoku</li>
                    <li>Logical deduction and pattern recognition</li>
                    <li>Solving without guesswork</li>
                </ul>
                <a class="programme-link" href="<?php echo BASE_URL; ?>/services.php#sudoku-logical-reasoning">View programme &rarr;</a>
            </article>

            <article class="programme-card reveal" id="olympiad-problem-solving">
                <span class="eyebrow">Programme 03</span>
                <h3>Mathematical Olympiad & Problem-Solving</h3>
                <p>
                    Explore logic, creativity, and structured thinking through olympiad-style challenges and mathematical proof-building.
                </p>
                <ul class="programme-features">
                    <li>Number theory, combinatorics, and geometry</li>
                    <li>Reasoning and mathematical proof</li>
                    <li>Explaining why a solution works</li>
                </ul>
                <a class="programme-link" href="<?php echo BASE_URL; ?>/services.php#olympiad-problem-solving">View programme &rarr;</a>
            </article>
        </div>
    </div>
</section>

<section class="edu-section" id="approach">
    <div class="container">
        <div class="edu-section-header reveal">
            <h2>Our philosophy</h2>
            <p>
                We help students think independently, explore multiple approaches, and explain their reasoning with confidence.
            </p>
        </div>

        <div class="edu-philosophy-grid">
            <div class="philosophy-card reveal">
                <h3>Think beyond memorised answers.</h3>
                <p>Students are encouraged to understand the method, not just the result.</p>
            </div>
            <div class="philosophy-card reveal delay-100">
                <h3>Observe before acting.</h3>
                <p>Careful attention to patterns, structure, and constraints develops sharper analytical instincts.</p>
            </div>
            <div class="philosophy-card reveal">
                <h3>Explore multiple approaches.</h3>
                <p>Different routes to a solution build flexibility and deeper understanding.</p>
            </div>
            <div class="philosophy-card reveal delay-100">
                <h3>Learn to explain your reasoning.</h3>
                <p>Clear communication is part of mathematical and logical mastery.</p>
            </div>
        </div>
    </div>
</section>

<section class="edu-section">
    <div class="container">
        <div class="edu-section-header reveal">
            <h2>How private lessons work</h2>
            <p>
                A clear and personal process that helps students grow with structure and purpose.
            </p>
        </div>

        <div class="edu-step-grid">
            <div class="step-card reveal">
                <div class="step-number">1</div>
                <h3>Choose a programme</h3>
                <p>Select the area of focus that best matches the student’s interests and goals.</p>
            </div>
            <div class="step-card reveal delay-100">
                <div class="step-number">2</div>
                <h3>Discuss current level</h3>
                <p>We begin by understanding the student’s strengths, challenges, and learning objectives.</p>
            </div>
            <div class="step-card reveal delay-200">
                <div class="step-number">3</div>
                <h3>Plan the learning journey</h3>
                <p>Each lesson is shaped around the student’s pace, needs, and next stage of development.</p>
            </div>
            <div class="step-card reveal delay-300">
                <div class="step-number">4</div>
                <h3>Practise with guidance</h3>
                <p>Students work through carefully chosen problems with support, reflection, and feedback.</p>
            </div>
            <div class="step-card reveal delay-400">
                <div class="step-number">5</div>
                <h3>Review and next steps</h3>
                <p>We identify patterns to address, strengths to build on, and the most effective next challenge.</p>
            </div>
        </div>
    </div>
</section>

<section class="edu-section">
    <div class="container">
        <div class="edu-profile-grid">
            <div class="profile-placeholder reveal">
                Instructor profile placeholder<br>
                To be supplied later
            </div>
            <div class="edu-profile-card reveal delay-100">
                <h2>Meet the instructor</h2>
                <p>
                    Hexasure provides private, one-to-one educational enrichment with a focus on reasoning, analytical thinking, and independent problem-solving.
                </p>
                <p>
                    Full teaching profile details, verified qualifications, and instructor-specific information will be added once confirmed.
                </p>
                <p>
                    For younger students, parent or guardian communication, consent, and privacy considerations are handled carefully throughout the enquiry process.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="edu-section">
    <div class="container">
        <div class="edu-cta reveal">
            <h2>Start with a tailored learning conversation.</h2>
            <p>
                Whether your student is exploring a new challenge or strengthening core skills, we can recommend the right programme and next steps.
            </p>
            <div class="hero-buttons">
                <a href="<?php echo BASE_URL; ?>/contact.php" class="btn btn-primary">Enquire About Lessons</a>
                <a href="<?php echo BASE_URL; ?>/services.php" class="btn btn-secondary">Explore Programmes</a>
            </div>
        </div>
    </div>
</section>

<script src="<?php echo BASE_URL; ?>/assets/js/cube-scroll.js" defer></script>
<?php require_once 'includes/footer.php'; ?>
