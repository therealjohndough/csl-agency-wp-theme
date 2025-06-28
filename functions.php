<?php

function neobrutalist_theme_setup() {
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'neobrutalist'),
    ));
    add_theme_support('wp-block-styles'); // Recommended for block editor
    add_theme_support('align-wide'); // Recommended for block editor
}
add_action('after_setup_theme', 'neobrutalist_theme_setup');


function neobrutalist_enqueue_scripts() {
    // For cache busting
    $theme_version = wp_get_theme()->get('Version');
    $css_version = $theme_version . '.' . filemtime(get_stylesheet_directory() . '/style.css');
    $js_version = $theme_version . '.' . filemtime(get_template_directory() . '/main.js');

    // 1. Enqueue Styles
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;700&display=swap', array(), null);
    wp_enqueue_style('phosphor-icons', 'https://unpkg.com/@phosphor-icons/web@2.0.3/src/bold/style.css', array(), '2.0.3');
    wp_enqueue_style('neobrutalist-style', get_stylesheet_uri(), array(), $css_version);

    // 2. Enqueue Scripts
    // --- REMOVED GSAP SCRIPTS ---
    
    // Main Theme JS - note the empty dependency array `array()` now
    wp_enqueue_script('neobrutalist-main-js', get_template_directory_uri() . '/main.js', array(), $js_version, true);
}
add_action('wp_enqueue_scripts', 'neobrutalist_enqueue_scripts');