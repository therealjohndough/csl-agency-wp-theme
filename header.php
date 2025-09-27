<?php
/**
 * The template for displaying the header
 *
 * @package CSL_Agency
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@400;500&family=Space+Grotesk:wght@600;700&display=swap" rel="stylesheet">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#page-content"><?php esc_html_e( 'Skip to content', 'auragrid' ); ?></a>

<header class="site-header">
  <div class="site-logo">
    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
      <?php if ( has_custom_logo() ) { the_custom_logo(); } else { bloginfo('name'); } ?>
    </a>
  </div>

  <nav class="main-navigation-container" aria-label="<?php esc_attr_e( 'Main Menu', 'auragrid' ); ?>">
    <?php
      wp_nav_menu([
        'theme_location' => 'primary',
        'container'      => false,
        'menu_class'     => 'main-navigation',
        'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        'walker'         => new Aura_Grid_Nav_Walker(),
      ]);
    ?>
  </nav>

  <button class="hamburger-menu" aria-label="<?php esc_attr_e('Open Menu', 'auragrid'); ?>" aria-controls="main-navigation" aria-expanded="false">
    <span class="bar bar1"></span><span class="bar bar2"></span><span class="bar bar3"></span>
  </button>
</header>

<div id="page-content" class="site-content">
