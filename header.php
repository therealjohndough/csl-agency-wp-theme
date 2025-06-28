<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="main-content">
    
    <header class="site-header">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo">
            <?php bloginfo('name'); ?>
        </a>

        <nav id="main-navigation" class="main-navigation">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container'      => false,
                'menu_class'     => '',
                'items_wrap'     => '<ul>%3$s</ul>',
            ));
            ?>
        </nav>

        <button id="hamburger-menu" class="hamburger-menu" aria-label="<?php esc_attr_e('Open Menu', 'neobrutalist'); ?>" aria-controls="main-navigation" aria-expanded="false">
            <i class="ph-bold ph-list"></i>
        </button>
    </header>