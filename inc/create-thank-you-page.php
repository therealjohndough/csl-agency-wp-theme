<?php
/**
 * Create Thank You Page for Contact Form
 * Run this once to create the thank you page
 */

function csl_create_thank_you_page() {
    // Check if thank you page already exists
    $existing_page = get_page_by_path('thank-you');
    
    if ($existing_page) {
        return; // Page already exists
    }
    
    // Create the thank you page with dynamic content
    $page_data = array(
        'post_title'    => 'Thank You',
        'post_name'     => 'thank-you',
        'post_content'  => '
        <div class="container-narrow text-center section-pad-top section-pad-bottom">
            [csl_thank_you_content]
        </div>',
        'post_status'   => 'publish',
        'post_type'     => 'page',
        'post_author'   => 1,
    );
    
    wp_insert_post($page_data);
}

// Run this on theme activation or admin init
add_action('after_setup_theme', 'csl_create_thank_you_page');

// Also try to run on admin init
add_action('admin_init', 'csl_create_thank_you_page');