<?php
define('PAGE_TITLE', 'About');
define('PAGE_DESC', 'Hexasure is a premium educational enrichment brand focused on critical thinking, logical reasoning, and independent problem-solving through private, one-to-one learning.');
require_once 'includes/header.php';
?>

<section class="edu-hero">
    <div class="container text-center">
        <div class="edu-hero__badge">About Hexasure</div>
        <h1>Helping students think clearly and solve with confidence.</h1>
        <p>
            Hexasure supports learners who want to go beyond memorised answers and build lasting analytical habits through personalised instruction.
        </p>
    </div>
</section>

<section class="edu-section">
    <div class="container">
        <div class="edu-section-header reveal">
            <h2>Our mission</h2>
            <p>
                We help students develop the habits of careful observation, critical thinking, structured reasoning, and independent problem-solving.
            </p>
        </div>

        <div class="edu-mission-grid">
            <div class="edu-profile-card reveal">
                <h3>Mission</h3>
                <p>
                    To empower students with the confidence and methods they need to approach difficult problems with curiosity, discipline, and clarity.
                </p>
            </div>
            <div class="edu-profile-card reveal delay-100">
                <h3>Vision</h3>
                <p>
                    To make premium, reasoning-first education accessible to students who want to grow beyond the classroom and develop lasting intellectual habits.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="edu-section">
    <div class="container">
        <div class="edu-section-header reveal">
            <h2>Our teaching philosophy</h2>
            <p>
                We believe strong learning develops through reflection, explanation, and persistence — not shortcuts.
            </p>
        </div>

        <div class="edu-philosophy-grid">
            <div class="philosophy-card reveal">
                <h3>Think beyond memorised answers.</h3>
                <p>Students are guided to understand the structure behind a problem and why a method works.</p>
            </div>
            <div class="philosophy-card reveal delay-100">
                <h3>Observe before acting.</h3>
                <p>Careful attention to clues, patterns, and constraints leads to clearer decisions.</p>
            </div>
            <div class="philosophy-card reveal">
                <h3>Explore multiple approaches.</h3>
                <p>Different strategies deepen understanding and increase flexibility in unfamiliar situations.</p>
            </div>
            <div class="philosophy-card reveal delay-100">
                <h3>Explain your reasoning.</h3>
                <p>When students articulate their thinking, they become more confident and more capable learners.</p>
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
                <h2>Instructor profile</h2>
                <p>
                    Hexasure is building a premium educational enrichment offering grounded in private, one-to-one learning and personalised guidance.
                </p>
                <p>
                    Full instructor details, verified qualifications, and profile information will be added once confirmed and approved.
                </p>
                <p>
                    Parent and guardian communication, consent, privacy, and age-appropriate support remain a central part of the educational experience.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="edu-section">
    <div class="container">
        <div class="edu-cta reveal">
            <h2>Start a personalised learning conversation.</h2>
            <p>
                If you are looking for private lessons that help students build real reasoning skills, we would be pleased to discuss the right programme.
            </p>
            <div class="hero-buttons">
                <a href="<?php echo BASE_URL; ?>/contact.php" class="btn btn-primary">Enquire About Lessons</a>
                <a href="<?php echo BASE_URL; ?>/services.php" class="btn btn-secondary">Explore Programmes</a>
            </div>
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
