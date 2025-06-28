<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Neo-Brutalist_Dynamic
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="page-header">
        <div class="container">
            <?php the_title( '<h1 class="entry-title section-heading">', '</h1>' ); ?>
        </div>
    </header><!-- .page-header -->

    <div class="entry-content">
        <div class="container" style="padding-top: 2rem;">
            <?php
            the_content();

            wp_link_pages(
                array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'neobrutalist' ),
                    'after'  => '</div>',
                )
            );
            ?>
        </div>
    </div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->