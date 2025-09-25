<?php
/**
 * Client Portal Login Shortcode
 *
 * This file contains the functionality for the [client_login_portal] shortcode,
 * which displays a login form or a welcome message for logged-in users.
 *
 * @package Aura-Grid_Machina_Enhanced
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Renders the client portal login form or a welcome message.
 *
 * @return string The HTML output for the shortcode.
 */
function client_portal_login_form_shortcode() {
    if ( is_user_logged_in() ) {
        // This part for logged-in users remains the same
        $dashboard_url = home_url('/dashboard');
        $current_user = wp_get_current_user();
        
        $welcome_message = sprintf(
            esc_html__( 'Welcome back, %s!', 'auragrid' ),
            esc_html( $current_user->display_name )
        );

        return '
            <div class="client-portal-welcome">
                <h2 class="welcome-heading">' . $welcome_message . '</h2>
                <p>You can view your projects and files on your dashboard.</p>
                <div class="portal-actions">
                    <a href="' . esc_url($dashboard_url) . '" class="btn">View Your Dashboard</a>
                    <a href="' . wp_logout_url(home_url('/portal')) . '" class="logout-link">Logout</a>
                </div>
            </div>
        ';

    } else {
        // --- THIS IS THE UPDATED SECTION FOR LOGGED-OUT USERS ---
        
        $login_error_message = '';
        if ( isset( $_GET['login'] ) && $_GET['login'] == 'failed' ) {
            $login_error_message = '<p class="login-error" style="color: var(--color-warning); background: var(--glass-bg-light); border-left: 4px solid var(--color-warning); padding: var(--space-4); margin-bottom: var(--space-4); border-radius: var(--ui-radius-sm);"><strong>Error:</strong> Invalid username or password.</p>';
        }

        $args = [
            'echo'           => false,
            'redirect'       => home_url('/dashboard'),
            'form_id'        => 'loginform', // Ensure the ID is 'loginform' to match our CSS
            'label_username' => __( 'Username or Email', 'auragrid' ),
            'label_password' => __( 'Password', 'auragrid' ),
            'label_log_in'   => __( 'Sign In', 'auragrid' ),
            'remember'       => true,
        ];
        
        return '
        <div class="container client-login-section">
          ' . $login_error_message . ' <!-- This displays our custom error message -->
          <h1 class="section-heading" style="text-transform: uppercase; letter-spacing: 0.05em;">Client Portal</h1>
          <p class="section-subheading text-secondary">Access your dashboard, files, and project updates securely.</p>
          ' . wp_login_form($args) . '
        </div>';
    }
}
add_shortcode('client_login_portal', 'client_portal_login_form_shortcode');