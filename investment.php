<?php
define('PAGE_TITLE', 'Investment & Partnerships');
define('PAGE_DESC', 'Partner with Hexasure for strategic ventures and investment opportunities.');
require_once 'includes/header.php';
?>

<section style="background-color: #fff; padding-bottom: 2rem;">
    <div class="container">
        <div class="section-header">
            <h1>Investment & Partnerships</h1>
            <p>Collaborating with visionary investors and partners to build the future.</p>
        </div>
        
        <div class="grid grid-2" style="align-items: center; gap: 4rem;">
            <div>
                <h2 style="margin-bottom: 1.5rem;">Our Philosophy</h2>
                <p>
                    Hexasure works with a select group of partners and investors who share our long-term view 
                    on building ventures. We believe that capital is a commodity, but strategic value is rare.
                </p>
                <p>
                    We bridge the gap between capital and execution, ensuring that investments are backed 
                    by solid operational foundations and clear growth strategies.
                </p>
                
                <div style="margin-top: 2rem;">
                    <h3 style="font-size: 1.25rem; margin-bottom: 1rem;">What We Offer Partners</h3>
                    <ul style="list-style: none; padding: 0;">
                        <li style="margin-bottom: 0.5rem; display: flex; align-items: center; gap: 0.5rem;">
                            <span style="color: var(--color-accent);">✓</span> Deal flow & curated opportunities
                        </li>
                        <li style="margin-bottom: 0.5rem; display: flex; align-items: center; gap: 0.5rem;">
                            <span style="color: var(--color-accent);">✓</span> Strategic oversight & due diligence
                        </li>
                        <li style="margin-bottom: 0.5rem; display: flex; align-items: center; gap: 0.5rem;">
                            <span style="color: var(--color-accent);">✓</span> Access to global consulting capabilities
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="card">
                <h3 style="margin-bottom: 1.5rem;">Partnership Enquiry</h3>
                <?php if (isset($_GET['success'])): ?>
                    <div style="background-color: #d1fae5; color: #065f46; padding: 1rem; border-radius: 8px; margin-bottom: 1rem;">
                        Thank you for your interest. We will be in touch shortly.
                    </div>
                <?php endif; ?>
                
                <form action="backend/handle_investment.php" method="POST">
                    <div class="form-group">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="organization" class="form-label">Organisation / Fund</label>
                        <input type="text" id="organization" name="organization" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label for="region" class="form-label">Region of Interest</label>
                        <input type="text" id="region" name="region" class="form-control" placeholder="e.g. Southeast Asia, Europe">
                    </div>
                    
                    <div class="form-group">
                        <label for="message" class="form-label">Message</label>
                        <textarea id="message" name="message" class="form-control" placeholder="Tell us about your investment focus or partnership goals..."></textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-primary" style="width: 100%;">Send Enquiry</button>
                </form>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container text-center">
        <div class="section-header">
            <h2>What We Look For</h2>
        </div>
        <div class="grid grid-3">
            <div>
                <h3 style="font-size: 1.25rem;">Long-term Orientation</h3>
                <p>Partners who understand that building great ventures takes time and patience.</p>
            </div>
            <div>
                <h3 style="font-size: 1.25rem;">Strategic Alignment</h3>
                <p>Shared vision on sectors, regions, and the future of technology and business.</p>
            </div>
            <div>
                <h3 style="font-size: 1.25rem;">Value Add</h3>
                <p>Investors and partners who bring more than just capital to the table.</p>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
