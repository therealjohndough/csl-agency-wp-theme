<?php
/**
 * Client Portal Redirect System (Definitive)
 * Forces all login traffic to the custom /portal page.
 */

// 1. Fixes plugins (like CSL Tickets) by filtering wp_login_url()
function agme_filter_login_url( $login_url, $redirect ) {
    return add_query_arg( 'redirect_to', $redirect, home_url( '/portal/' ) );
}
add_filter( 'login_url', 'agme_filter_login_url', 10, 2 );

// 2. Catches any direct access to wp-login.php or /wp-admin for logged-out users
function agme_global_login_redirect() {
    global $pagenow;
    if ( ! is_user_logged_in() && ! wp_doing_ajax() ) {
        if ( $pagenow === 'wp-login.php' || is_admin() ) {
            $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';
            if ( in_array($action, ['logout', 'lostpassword', 'rp', 'resetpass']) ) {
                return; // Do not redirect these essential actions
            }
            wp_redirect( home_url('/portal/') );
            exit;
        }
    }
}
add_action('template_redirect', 'agme_global_login_redirect');