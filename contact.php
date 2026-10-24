<?php
define('PAGE_TITLE', 'Enquire About Lessons');
define('PAGE_DESC', 'Contact Hexasure to discuss private, one-to-one learning in cube puzzles, Sudoku and logical reasoning, or mathematical problem-solving.');
require_once 'includes/header.php';
?>

<section class="edu-hero">
    <div class="container text-center">
        <div class="edu-hero__badge">Private lesson enquiries</div>
        <h1>Let’s find the right learning challenge.</h1>
        <p>
            Tell us a little about what the student would like to explore. We’ll follow up to discuss the programme and possible next steps.
        </p>
    </div>
</section>

<section class="edu-section">
    <div class="container contact-enquiry-layout">
        <div class="contact-enquiry-intro">
            <h2>A personal starting point</h2>
            <p>
                Hexasure offers private, one-to-one educational enrichment focused on reasoning, careful observation, and independent problem-solving.
            </p>
            <p>
                This form is an enquiry only. It does not confirm a lesson, booking, place, availability, or payment.
            </p>
            <div class="contact-note">
                <h3>For students under 18</h3>
                <p>
                    A parent or legal guardian must submit the enquiry on the student’s behalf. Please do not include sensitive personal information or school records.
                </p>
            </div>
            <p class="contact-email-note">
                Prefer email? <a href="mailto:contact@hexasure.com">contact@hexasure.com</a>
            </p>
        </div>

        <div class="edu-profile-card contact-form-card">
            <h2>Enquire about lessons</h2>

            <?php if (isset($_GET['success']) && $_GET['success'] === '1'): ?>
                <div class="form-notice form-notice--success" role="status">
                    Thank you. Your enquiry has been received. This is not a confirmed booking; we’ll be in touch to discuss next steps.
                </div>
            <?php elseif (isset($_GET['error'])): ?>
                <div class="form-notice form-notice--error" role="alert">
                    <?php if ($_GET['error'] === 'invalid'): ?>
                        Please check the required fields and try again.
                    <?php else: ?>
                        We couldn’t submit your enquiry just now. Please try again later or email us directly.
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <form action="<?php echo BASE_URL; ?>/backend/handle_contact.php" method="POST">
                <div class="form-group">
                    <label for="name" class="form-label">Parent or adult contact name</label>
                    <input type="text" id="name" name="name" class="form-control" autocomplete="name" maxlength="120" required>
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" id="email" name="email" class="form-control" autocomplete="email" maxlength="254" required>
                </div>

                <div class="form-group">
                    <label for="region" class="form-label">Country or time zone <span class="text-muted">(optional)</span></label>
                    <input type="text" id="region" name="region" class="form-control" autocomplete="country-name" maxlength="120">
                </div>

                <div class="form-group">
                    <label for="type" class="form-label">Programme of interest</label>
                    <select id="type" name="type" class="form-control" required>
                        <option value="">Choose a programme</option>
                        <option value="cube_puzzles">Cube Puzzles &amp; Speedcubing</option>
                        <option value="sudoku_reasoning">Sudoku &amp; Logical Reasoning</option>
                        <option value="math_olympiad">Mathematical Olympiad &amp; Problem-Solving</option>
                        <option value="not_sure">Not sure yet</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="message" class="form-label">What would you like the student to work on? <span class="text-muted">(optional)</span></label>
                    <textarea id="message" name="message" class="form-control" rows="4" maxlength="2000" placeholder="Share interests, goals, or questions. Please do not include sensitive personal information."></textarea>
                </div>

                <div class="form-group consent-group">
                    <input type="checkbox" id="guardian_confirmation" name="guardian_confirmation" value="1" required>
                    <label for="guardian_confirmation">
                        I am an adult. If this enquiry is for a student under 18, I am their parent or legal guardian and am submitting it on their behalf.
                    </label>
                </div>

                <p class="form-privacy-note">
                    We use these details to manage and respond to this enquiry. Do not enter sensitive personal information.
                </p>

                <button type="submit" class="btn btn-primary contact-submit">Send Lesson Enquiry</button>
            </form>
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
