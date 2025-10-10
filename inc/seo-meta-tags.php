<?php
/**
 * SEO Meta Tags Enhancement
 *
 * Adds comprehensive meta tags, Open Graph, and Twitter Cards
 *
 * @package CSL_Agency
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Add SEO meta tags to wp_head
 */
function csl_seo_meta_tags() {
    // Skip if Yoast or RankMath is active
    if (defined('WPSEO_VERSION') || class_exists('RankMath')) {
        return;
    }

    $site_name = get_bloginfo('name');
    $site_description = get_bloginfo('description');

    // Get current page info
    $page_title = wp_get_document_title();
    $page_url = get_permalink();
    $page_description = '';
    $page_image = '';

    // Homepage
    if (is_front_page()) {
        $page_description = $site_description ?: 'Strategic branding and design agency specializing in cannabis and lifestyle brands. We design brands that define categories, drive revenue, and stand the test of time.';
        $page_image = get_theme_mod('csl_og_default_image', get_template_directory_uri() . '/assets/images/og-default.jpg');
    }
    // Single post/page
    elseif (is_singular()) {
        $post_id = get_the_ID();

        // Get excerpt or custom field for description
        if (has_excerpt()) {
            $page_description = wp_strip_all_tags(get_the_excerpt());
        } else {
            $page_description = wp_trim_words(wp_strip_all_tags(get_the_content()), 25);
        }

        // Get featured image
        if (has_post_thumbnail()) {
            $page_image = get_the_post_thumbnail_url($post_id, 'large');
        }
    }
    // Archive pages
    elseif (is_archive()) {
        $page_description = get_the_archive_description();
        $page_description = wp_strip_all_tags($page_description);
    }

    // Fallback image
    if (empty($page_image)) {
        $page_image = get_template_directory_uri() . '/assets/images/og-default.jpg';
    }

    // Clean description
    $page_description = esc_attr(wp_trim_words($page_description, 30));

    ?>
    <!-- SEO Meta Tags -->
    <meta name="description" content="<?php echo $page_description; ?>">
    <link rel="canonical" href="<?php echo esc_url($page_url ?: home_url(add_query_arg(null, null))); ?>">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="<?php echo is_singular('post') ? 'article' : 'website'; ?>">
    <meta property="og:url" content="<?php echo esc_url($page_url ?: home_url(add_query_arg(null, null))); ?>">
    <meta property="og:title" content="<?php echo esc_attr($page_title); ?>">
    <meta property="og:description" content="<?php echo $page_description; ?>">
    <meta property="og:image" content="<?php echo esc_url($page_image); ?>">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:site_name" content="<?php echo esc_attr($site_name); ?>">
    <meta property="og:locale" content="<?php echo esc_attr(get_locale()); ?>">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="<?php echo esc_url($page_url ?: home_url(add_query_arg(null, null))); ?>">
    <meta name="twitter:title" content="<?php echo esc_attr($page_title); ?>">
    <meta name="twitter:description" content="<?php echo $page_description; ?>">
    <meta name="twitter:image" content="<?php echo esc_url($page_image); ?>">
    <?php if ($twitter_handle = get_theme_mod('csl_twitter_handle', '@case_study_labs')) : ?>
    <meta name="twitter:site" content="<?php echo esc_attr($twitter_handle); ?>">
    <meta name="twitter:creator" content="<?php echo esc_attr($twitter_handle); ?>">
    <?php endif; ?>

    <!-- Additional SEO -->
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <meta name="googlebot" content="index, follow">

    <?php if (is_singular('post')) : ?>
    <!-- Article specific -->
    <meta property="article:published_time" content="<?php echo esc_attr(get_the_date('c')); ?>">
    <meta property="article:modified_time" content="<?php echo esc_attr(get_the_modified_date('c')); ?>">
    <meta property="article:author" content="<?php echo esc_attr(get_the_author()); ?>">
    <?php endif; ?>

    <!-- Preconnect for performance -->
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <?php
}
add_action('wp_head', 'csl_seo_meta_tags', 1);

/**
 * Add default image alt text filter
 */
function csl_add_default_image_alt($attr, $attachment, $size) {
    if (empty($attr['alt'])) {
        $post = get_post($attachment);

        // Try to get alt from image metadata
        $alt = get_post_meta($attachment, '_wp_attachment_image_alt', true);

        // Fallback to image title
        if (empty($alt) && $post) {
            $alt = $post->post_title;
        }

        // Final fallback
        if (empty($alt)) {
            $alt = get_bloginfo('name') . ' - Image';
        }

        $attr['alt'] = $alt;
    }

    return $attr;
}
add_filter('wp_get_attachment_image_attributes', 'csl_add_default_image_alt', 10, 3);

/**
 * Customize title separator
 */
function csl_document_title_separator($sep) {
    return '—';
}
add_filter('document_title_separator', 'csl_document_title_separator');

/**
 * Customize title parts
 */
function csl_document_title_parts($title) {
    // Remove tagline from homepage title
    if (is_front_page()) {
        unset($title['tagline']);
    }

    return $title;
}
add_filter('document_title_parts', 'csl_document_title_parts');

/**
 * Add custom SEO settings to customizer
 */
function csl_seo_customizer_settings($wp_customize) {
    // SEO Section
    $wp_customize->add_section('csl_seo_settings', [
        'title' => __('SEO Settings', 'csl-agency'),
        'priority' => 30,
    ]);

    // Default OG Image
    $wp_customize->add_setting('csl_og_default_image', [
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ]);

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'csl_og_default_image', [
        'label' => __('Default Social Share Image', 'csl-agency'),
        'description' => __('1200x630px recommended', 'csl-agency'),
        'section' => 'csl_seo_settings',
    ]));

    // Twitter Handle
    $wp_customize->add_setting('csl_twitter_handle', [
        'default' => '@case_study_labs',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('csl_twitter_handle', [
        'label' => __('Twitter Handle', 'csl-agency'),
        'description' => __('Include @ symbol', 'csl-agency'),
        'section' => 'csl_seo_settings',
        'type' => 'text',
    ]);

    // Homepage Description Override
    $wp_customize->add_setting('csl_homepage_description', [
        'default' => '',
        'sanitize_callback' => 'sanitize_textarea_field',
    ]);

    $wp_customize->add_control('csl_homepage_description', [
        'label' => __('Homepage Meta Description', 'csl-agency'),
        'description' => __('Custom description for homepage (150-160 characters)', 'csl-agency'),
        'section' => 'csl_seo_settings',
        'type' => 'textarea',
    ]);
}
add_action('customize_register', 'csl_seo_customizer_settings');

/**
 * Add sitemap notification
 */
function csl_add_sitemap_link() {
    if (function_exists('wp_sitemaps_get_server')) {
        echo '<!-- WordPress Sitemap: ' . esc_url(home_url('/wp-sitemap.xml')) . ' -->' . "\n";
    }
}
add_action('wp_head', 'csl_add_sitemap_link', 0);
