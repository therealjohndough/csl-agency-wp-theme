<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Aura-Grid_Machina_Enhanced
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
    <header class="page-header container-narrow text-center" style="padding-top: var(--spacing-section); padding-bottom: var(--spacing-section-small);">
        <?php the_title( '<h1 class="section-heading anim-reveal">', '</h1>' ); ?>
    </header><!-- .page-header -->

    <div class="container-narrow anim-reveal" style="transition-delay: 0.1s;">
        <div class="content-wrapper glass-panel">
            <?php
            the_content();

            wp_link_pages(
                array(
                    'before'   => '<div class="page-links">' . __( 'Pages:', 'auragrid' ),
                    'after'    => '</div>',
                    'pagelink' => '<span class="page-number">%</span>',
                )
            );
            ?>
        </div>
    </div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->