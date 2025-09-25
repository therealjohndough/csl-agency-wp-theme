<?php
/**
 * Improved Contact Form Shortcode
 * Clean, modular contact form with better lead qualification
 *
 * @package Aura-Grid_Machina_Enhanced
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Enhanced Contact Form Shortcode
 */
function csl_improved_contact_form_shortcode($atts = []) {
    // Parse attributes
    $atts = shortcode_atts([
        'class' => 'csl-contact-form',
        'title' => 'Project Inquiry',
        'redirect' => '/thank-you',
    ], $atts);

    // Generate nonce for security
    $nonce = wp_nonce_field('csl_contact_form_submit', 'csl_contact_nonce', true, false);
    
    // Start output buffering
    ob_start();
    ?>
    
    <div class="<?php echo esc_attr($atts['class']); ?>">
        <form method="post" class="csl-form" novalidate data-redirect="<?php echo esc_url($atts['redirect']); ?>">
            
            <?php echo $nonce; ?>
            <input type="hidden" name="csl_form_submit" value="1">
            <input type="hidden" name="csl_ts" value="<?php echo time(); ?>">
            
            <!-- Honeypot for spam protection -->
            <input type="text" name="csl_hp" value="" style="display:none !important;" tabindex="-1" autocomplete="off">
            
            <?php if (!empty($atts['title'])): ?>
            <h3 class="title"><?php echo esc_html($atts['title']); ?></h3>
            <?php endif; ?>

            <!-- Name and Email Row -->
            <div class="form-group">
                <label>
                    <input class="input" type="text" name="csl_name" required placeholder=" " autocomplete="name">
                    <span>Full Name *</span>
                </label>
                <label>
                    <input class="input" type="email" name="csl_email" required placeholder=" " autocomplete="email">
                    <span>Email Address *</span>
                </label>
            </div>

            <!-- Phone and Company Row -->
            <div class="form-group">
                <label>
                    <input class="input" type="tel" name="csl_phone" placeholder=" " autocomplete="tel">
                    <span>Phone (optional)</span>
                </label>
                <label>
                    <input class="input" type="text" name="csl_company" placeholder=" " autocomplete="organization">
                    <span>Company / Organization (optional)</span>
                </label>
            </div>

            <!-- Project Type and Budget Row -->
            <div class="form-group">
                <label>
                    <select class="input" name="csl_project_type" required>
                        <option value="" disabled selected hidden>Select project type…</option>
                        <option value="website">Website Design & Development</option>
                        <option value="branding">Brand Identity & Strategy</option>
                        <option value="marketing">Marketing & Campaigns</option>
                        <option value="ecommerce">E-commerce & Online Store</option>
                        <option value="audit">Brand Audit & Consultation</option>
                        <option value="packaging">Product & Packaging Design</option>
                        <option value="other">Other / Multiple Services</option>
                    </select>
                    <span>Project Type *</span>
                </label>
                
                <label>
                    <select class="input" name="csl_budget" required>
                        <option value="" disabled selected hidden>Select investment range…</option>
                        <option value="under-5k">Under $5,000</option>
                        <option value="5k-10k">$5,000 – $10,000</option>
                        <option value="10k-25k">$10,000 – $25,000</option>
                        <option value="25k-50k">$25,000 – $50,000</option>
                        <option value="50k-plus">$50,000+</option>
                        <option value="lets-discuss">Let's discuss</option>
                    </select>
                    <span>Investment Range *</span>
                </label>
            </div>

            <!-- Timeline and Experience Row -->
            <div class="form-group">
                <label>
                    <select class="input" name="csl_timeline" required>
                        <option value="" disabled selected hidden>Select timeline…</option>
                        <option value="asap">ASAP (Rush project)</option>
                        <option value="1-3-months">1-3 months</option>
                        <option value="3-6-months">3-6 months</option>
                        <option value="6-plus-months">6+ months</option>
                        <option value="planning">Planning phase</option>
                        <option value="flexible">Flexible timing</option>
                    </select>
                    <span>Timeline *</span>
                </label>
                
                <label>
                    <select class="input" name="csl_agency_experience">
                        <option value="" disabled selected hidden>Agency experience (optional)…</option>
                        <option value="first-time">First time working with an agency</option>
                        <option value="previous-good">Worked with agencies before (good experience)</option>
                        <option value="previous-bad">Worked with agencies before (bad experience)</option>
                        <option value="in-house-team">Have in-house marketing team</option>
                    </select>
                    <span>Agency Experience</span>
                </label>
            </div>

            <!-- Referral Source Row -->
            <div class="form-group full-width">
                <label>
                    <select class="input" name="csl_source">
                        <option value="" disabled selected hidden>How did you hear about us? (optional)</option>
                        <option value="referral">Referral from client/partner</option>
                        <option value="google-search">Google Search</option>
                        <option value="linkedin">LinkedIn</option>
                        <option value="instagram">Instagram</option>
                        <option value="cannabis-event">Cannabis industry event</option>
                        <option value="business-event">Business/networking event</option>
                        <option value="press-article">Article or press mention</option>
                        <option value="other">Other</option>
                    </select>
                    <span>Referral Source</span>
                </label>
            </div>

            <!-- Project Description -->
            <div class="form-group full-width">
                <label>
                    <textarea class="input" name="csl_message" rows="4" required placeholder=" "></textarea>
                    <span>Tell us about your project, goals, and what success looks like *</span>
                </label>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="submit">
                <span class="submit-text">Send Inquiry</span>
                <span class="submit-loading" style="display:none;">Sending...</span>
            </button>

        </form>
    </div>

    <script>
    // Enhanced form handling
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('.csl-form');
        const submitBtn = form.querySelector('.submit');
        const submitText = submitBtn.querySelector('.submit-text');
        const submitLoading = submitBtn.querySelector('.submit-loading');
        
        // Enhanced form submission with loading state
        form.addEventListener('submit', function(e) {
            submitBtn.disabled = true;
            submitText.style.display = 'none';
            submitLoading.style.display = 'inline';
            
            // Add form validation and AJAX submission here if needed
        });
        
        // Enhanced floating labels
        const inputs = form.querySelectorAll('.input');
        inputs.forEach(input => {
            // Check if input has value on load
            if (input.value.trim() !== '') {
                input.classList.add('has-value');
            }
            
            input.addEventListener('input', function() {
                if (this.value.trim() !== '') {
                    this.classList.add('has-value');
                } else {
                    this.classList.remove('has-value');
                }
            });
        });
    });
    </script>

    <?php
    return ob_get_clean();
}

// Register the new shortcode
add_shortcode('csl_contact_form_improved', 'csl_improved_contact_form_shortcode');

/**
 * Handle form submission
 */
function csl_handle_contact_form_submission() {
    // Only process if our form was submitted
    if (!isset($_POST['csl_form_submit']) || $_POST['csl_form_submit'] !== '1') {
        return;
    }
    
    // Verify nonce for security
    if (!wp_verify_nonce($_POST['csl_contact_nonce'], 'csl_contact_form_submit')) {
        wp_die('Security check failed. Please try again.');
    }
    
    // Check honeypot (spam protection)
    if (!empty($_POST['csl_hp'])) {
        wp_die('Spam detected.');
    }
    
    // Sanitize and validate form data
    $form_data = [
        'name' => sanitize_text_field($_POST['csl_name'] ?? ''),
        'email' => sanitize_email($_POST['csl_email'] ?? ''),
        'phone' => sanitize_text_field($_POST['csl_phone'] ?? ''),
        'company' => sanitize_text_field($_POST['csl_company'] ?? ''),
        'project_type' => sanitize_text_field($_POST['csl_project_type'] ?? ''),
        'budget' => sanitize_text_field($_POST['csl_budget'] ?? ''),
        'timeline' => sanitize_text_field($_POST['csl_timeline'] ?? ''),
        'agency_experience' => sanitize_text_field($_POST['csl_agency_experience'] ?? ''),
        'source' => sanitize_text_field($_POST['csl_source'] ?? ''),
        'message' => sanitize_textarea_field($_POST['csl_message'] ?? ''),
        'timestamp' => current_time('mysql'),
        'ip_address' => $_SERVER['REMOTE_ADDR'] ?? '',
        'user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? ''
    ];
    
    // Validate required fields
    $required_fields = ['name', 'email', 'project_type', 'budget', 'timeline', 'message'];
    $errors = [];
    
    foreach ($required_fields as $field) {
        if (empty($form_data[$field])) {
            $errors[] = ucfirst(str_replace('_', ' ', $field)) . ' is required.';
        }
    }
    
    // Validate email
    if (!is_email($form_data['email'])) {
        $errors[] = 'Please enter a valid email address.';
    }
    
    if (!empty($errors)) {
        // Handle validation errors
        $_SESSION['form_errors'] = $errors;
        $_SESSION['form_data'] = $form_data;
        return;
    }
    
    // Calculate lead score
    $lead_score = csl_calculate_lead_score($form_data);
    $form_data['lead_score'] = $lead_score;
    
    // Save to database (we'll create this table)
    csl_save_contact_submission($form_data);
    
    // Send notification emails
    csl_send_contact_notification($form_data);
    
    // Send confirmation email to user
    csl_send_confirmation_email($form_data);
    
    // Redirect to thank you page
    $redirect_url = home_url('/thank-you/?lead=' . $lead_score);
    wp_redirect($redirect_url);
    exit;
}
add_action('init', 'csl_handle_contact_form_submission');

/**
 * Calculate lead score based on form responses
 */
function csl_calculate_lead_score($data) {
    $score = 0;
    
    // Budget scoring (most important factor)
    $budget_scores = [
        'under-5k' => 10,
        '5k-10k' => 25,
        '10k-25k' => 50,
        '25k-50k' => 75,
        '50k-plus' => 100,
        'lets-discuss' => 80
    ];
    $score += $budget_scores[$data['budget']] ?? 0;
    
    // Timeline scoring (urgency factor)
    $timeline_scores = [
        'asap' => 30,
        '1-3-months' => 25,
        '3-6-months' => 15,
        '6-plus-months' => 5,
        'planning' => 10,
        'flexible' => 10
    ];
    $score += $timeline_scores[$data['timeline']] ?? 0;
    
    // Project type scoring
    $project_scores = [
        'website' => 20,
        'branding' => 25,
        'marketing' => 15,
        'ecommerce' => 30,
        'audit' => 10,
        'packaging' => 20,
        'other' => 15
    ];
    $score += $project_scores[$data['project_type']] ?? 0;
    
    // Agency experience bonus
    if ($data['agency_experience'] === 'previous-good') {
        $score += 10;
    } elseif ($data['agency_experience'] === 'in-house-team') {
        $score += 5;
    }
    
    // Company provided bonus
    if (!empty($data['company'])) {
        $score += 5;
    }
    
    // Phone provided bonus (shows serious intent)
    if (!empty($data['phone'])) {
        $score += 5;
    }
    
    return min($score, 100); // Cap at 100
}

/**
 * Save contact form submission to database
 */
function csl_save_contact_submission($data) {
    global $wpdb;
    
    $table_name = $wpdb->prefix . 'csl_contact_submissions';
    
    // Create table if it doesn't exist
    csl_create_contact_submissions_table();
    
    $wpdb->insert(
        $table_name,
        $data,
        [
            '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', 
            '%s', '%s', '%s', '%d'
        ]
    );
}

/**
 * Create contact submissions table
 */
function csl_create_contact_submissions_table() {
    global $wpdb;
    
    $table_name = $wpdb->prefix . 'csl_contact_submissions';
    
    $charset_collate = $wpdb->get_charset_collate();
    
    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        name tinytext NOT NULL,
        email varchar(100) NOT NULL,
        phone varchar(20) DEFAULT '',
        company varchar(255) DEFAULT '',
        project_type varchar(50) NOT NULL,
        budget varchar(20) NOT NULL,
        timeline varchar(30) NOT NULL,
        agency_experience varchar(50) DEFAULT '',
        source varchar(50) DEFAULT '',
        message text NOT NULL,
        lead_score int(3) DEFAULT 0,
        timestamp datetime DEFAULT CURRENT_TIMESTAMP,
        ip_address varchar(45) DEFAULT '',
        user_agent text DEFAULT '',
        status varchar(20) DEFAULT 'new',
        PRIMARY KEY (id),
        KEY email (email),
        KEY lead_score (lead_score),
        KEY timestamp (timestamp)
    ) $charset_collate;";
    
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

/**
 * Send notification email to admin
 */
function csl_send_contact_notification($data) {
    $to = get_option('admin_email', 'dough@casestudylabs.com');
    $subject = "New High-Quality Lead: {$data['name']} (Score: {$data['lead_score']})";
    
    $message = "New contact form submission with lead score: {$data['lead_score']}/100\n\n";
    $message .= "Name: {$data['name']}\n";
    $message .= "Email: {$data['email']}\n";
    $message .= "Phone: " . ($data['phone'] ?: 'Not provided') . "\n";
    $message .= "Company: " . ($data['company'] ?: 'Not provided') . "\n\n";
    $message .= "Project Details:\n";
    $message .= "Type: {$data['project_type']}\n";
    $message .= "Budget: {$data['budget']}\n";
    $message .= "Timeline: {$data['timeline']}\n";
    $message .= "Agency Experience: " . ($data['agency_experience'] ?: 'Not specified') . "\n";
    $message .= "Source: " . ($data['source'] ?: 'Not specified') . "\n\n";
    $message .= "Message:\n{$data['message']}\n\n";
    $message .= "Submitted: {$data['timestamp']}\n";
    
    wp_mail($to, $subject, $message);
}

/**
 * Send confirmation email to user
 */
function csl_send_confirmation_email($data) {
    $to = $data['email'];
    $subject = "Thanks for your inquiry, {$data['name']}! We'll be in touch soon.";
    
    $message = "Hi {$data['name']},\n\n";
    $message .= "Thanks for reaching out to Case Study Labs! We received your inquiry about {$data['project_type']} and we're excited to learn more about your project.\n\n";
    $message .= "What's Next:\n";
    $message .= "• We'll review your project details within 24 hours\n";
    $message .= "• If we're a good fit, we'll schedule a discovery call\n";
    $message .= "• We'll provide a custom proposal and timeline\n\n";
    $message .= "In the meantime, feel free to:\n";
    $message .= "• Check out our case studies: " . home_url('/case-studies') . "\n";
    $message .= "• Learn about our process: " . home_url('/our-process') . "\n";
    $message .= "• Book a call directly: https://calendar.app.google/z1veEHms9x3RJAT79\n\n";
    $message .= "Best,\nThe Case Study Labs Team\n\n";
    $message .= "---\n";
    $message .= "Case Study Labs\n";
    $message .= "Strategic Design & Brand Elevation\n";
    $message .= "dough@casestudylabs.com\n";
    
    wp_mail($to, $subject, $message);
}

/**
 * Thank you page content shortcode with lead score integration
 */
function csl_thank_you_content_shortcode($atts = []) {
    $atts = shortcode_atts([
        'default_title' => 'Thanks for Your Inquiry!',
        'default_message' => 'We received your project inquiry and will be in touch within 24 hours.'
    ], $atts);
    
    // Get lead score from URL parameter
    $lead_score = isset($_GET['lead']) ? (int)$_GET['lead'] : 0;
    
    // Customize content based on lead score
    if ($lead_score >= 80) {
        $title = 'High-Priority Inquiry Received!';
        $message = 'Thank you for your detailed inquiry! Based on your project details, we're very excited to discuss this opportunity. Expect a call from our team within 4-6 hours.';
        $priority_class = 'high-priority';
        $cta_text = 'Schedule Priority Call';
    } elseif ($lead_score >= 50) {
        $title = 'Thanks for Your Inquiry!';
        $message = 'We received your project details and are excited to learn more. Our team will review everything and get back to you within 12-24 hours.';
        $priority_class = 'medium-priority';
        $cta_text = 'Book Discovery Call';
    } else {
        $title = $atts['default_title'];
        $message = $atts['default_message'];
        $priority_class = 'standard-priority';
        $cta_text = 'Schedule Call';
    }
    
    ob_start();
    ?>
    
    <div class="thank-you-content <?php echo esc_attr($priority_class); ?>">
        <h1 class="section-heading"><?php echo esc_html($title); ?></h1>
        <p class="text-secondary max-measure"><?php echo esc_html($message); ?></p>
        
        <?php if ($lead_score >= 70): ?>
        <div class="priority-notice glass-panel mt-6 mb-6">
            <h3 class="h4 mb-2">🚀 Priority Status</h3>
            <p class="text-sm">Your project profile indicates a high-value opportunity. We're fast-tracking your inquiry for immediate review.</p>
        </div>
        <?php endif; ?>
        
        <div class="cta-group mt-8">
            <a href="https://calendar.app.google/z1veEHms9x3RJAT79" class="btn btn-primary" target="_blank">
                <?php echo esc_html($cta_text); ?>
            </a>
            <a href="/case-studies" class="btn btn-secondary">View Case Studies</a>
        </div>
        
        <div class="next-steps mt-12">
            <h3 class="h4 mb-4">What Happens Next?</h3>
            <div class="steps-grid">
                <div class="step">
                    <div class="step-number">1</div>
                    <div class="step-content">
                        <h4>Review & Analysis</h4>
                        <p>We'll analyze your project requirements and budget</p>
                    </div>
                </div>
                <div class="step">
                    <div class="step-number">2</div>
                    <div class="step-content">
                        <h4>Discovery Call</h4>
                        <p>Schedule a conversation to discuss your vision</p>
                    </div>
                </div>
                <div class="step">
                    <div class="step-number">3</div>
                    <div class="step-content">
                        <h4>Custom Proposal</h4>
                        <p>Receive a tailored strategy and timeline</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="contact-info mt-12 glass-panel">
            <h3 class="h5 mb-3">Have Questions?</h3>
            <p class="text-sm mb-4">Need to discuss your project immediately?</p>
            <a href="mailto:dough@casestudylabs.com" class="btn btn-accent btn-sm">
                Email Us Directly
            </a>
        </div>
    </div>
    
    <style>
    .thank-you-content.high-priority .section-heading {
        color: var(--color-primary-500);
    }
    
    .priority-notice {
        background: linear-gradient(135deg, var(--color-primary-50), var(--color-primary-100));
        border: 1px solid var(--color-primary-200);
        padding: var(--space-6);
        border-radius: var(--radius-lg);
    }
    
    .steps-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: var(--space-6);
        margin-top: var(--space-8);
    }
    
    .step {
        display: flex;
        gap: var(--space-4);
        align-items: flex-start;
    }
    
    .step-number {
        background: var(--color-primary-500);
        color: white;
        width: 32px;
        height: 32px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: var(--fw-bold);
        font-size: var(--fs-sm);
        flex-shrink: 0;
    }
    
    .step-content h4 {
        margin: 0 0 var(--space-2) 0;
        font-size: var(--fs-lg);
        font-weight: var(--fw-semibold);
    }
    
    .step-content p {
        margin: 0;
        font-size: var(--fs-sm);
        color: var(--color-text-secondary);
    }
    
    .contact-info {
        text-align: center;
        padding: var(--space-6);
    }
    
    @media (max-width: 768px) {
        .steps-grid {
            grid-template-columns: 1fr;
        }
        
        .step {
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
    }
    </style>
    
    <?php
    return ob_get_clean();
}
add_shortcode('csl_thank_you_content', 'csl_thank_you_content_shortcode');