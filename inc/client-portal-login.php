<?php
/**
 * Client Portal Login Customization (Definitive - Teenage Engineering)
 *
 * This file completely re-brands the default wp-login.php page with the theme's
 * unique tactile aesthetic, providing a stable and integrated login experience.
 *
 * @package Aura-Grid_Machina_Enhanced
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * 1. Enqueue our custom "Teenage Engineering" stylesheet on the login page.
 *
 * This function uses the 'login_enqueue_scripts' hook, which is the correct,
 * modern way to add CSS specifically to the wp-login.php page.
 */
function agme_login_enqueue_styles() {
    // Get the full path to the CSS file to check if it exists and for cache-busting.
    $css_path = get_stylesheet_directory() . '/assets/css/wp-login-styles.css';

    // Only load the stylesheet if the file actually exists to prevent errors.
    if ( file_exists( $css_path ) ) {
        wp_enqueue_style(
            'csl-wp-login-styles', // A unique name for our stylesheet
            get_stylesheet_directory_uri() . '/assets/css/wp-login-styles.css',
            [], // This stylesheet has no dependencies
            filemtime($css_path) // This appends the file's last modified time to the URL, forcing browsers to reload it when you make changes.
        );
    }
}
add_action( 'login_enqueue_scripts', 'agme_login_enqueue_styles' );


/**
 * 2. Add our branded header (logo and title) above the login form.
 *
 * This function uses the 'login_header' hook to insert custom HTML.
 * It replaces the default WordPress logo.
 */
function agme_login_header_logo() {
    $logo_url = '';
    // Standard WordPress method to get the custom logo URL from the Customizer.
    if ( function_exists( 'get_custom_logo' ) && has_custom_logo() ) {
        $custom_logo_id = get_theme_mod( 'custom_logo' );
        $logo_image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
        $logo_url = $logo_image[0];
    }

    // Output the complete branded header.
    echo '
    <div class="csl-login-header" style="text-align: center; margin-bottom: 3rem;">';
    
    if ( ! empty($logo_url) ) {
        echo '<a href="' . esc_url( home_url( '/' ) ) . '" rel="home" title="' . esc_attr(get_bloginfo('name')) . '">
                <img src="' . esc_url($logo_url) . '" alt="' . esc_attr(get_bloginfo('name')) . ' Logo" style="max-width: 180px; height: auto; margin-bottom: 1rem;">
              </a>';
    }
    
    // The title that matches the new aesthetic.
    echo '<h2 style="font-family: \'Montserrat\', sans-serif; color: #4a4a4a; text-transform: uppercase; font-size: 16px; letter-spacing: 0.1em; font-weight: 600;">Client Portal</h2>
    </div>
    ';
}
add_action( 'login_header', 'agme_login_header_logo' );


/**
 * 3. Add our branded footer with a support link below the login form.
 *
 * This function uses the 'login_footer' hook.
 */
function agme_login_footer_links() {
    echo '
    <div class="csl-login-footer" style="max-width: 420px; margin: 2rem auto; font-size: 13px; text-align: center; font-family: \'Montserrat\', sans-serif;">
        <p style="color: #4a4a4a;">
            Having trouble logging in? 
            <a href="mailto:hello@casestudylabs.com" style="color: #4a4a4a; font-weight: 600; text-decoration: none;">Contact Support</a>
        </p>
    </div>
    ';
}
add_action( 'login_footer', 'agme_login_footer_links' );