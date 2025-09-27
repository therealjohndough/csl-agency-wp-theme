<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CSL_Agency
 */

get_header();
?>

<main id="main-content">

    <?php
    while ( have_posts() ) :
        the_post();
        ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        
            <header class="page-header container-narrow text-center" style="padding-top: var(--spacing-section); padding-bottom: var(--spacing-section-small);">
                <h1 class="section-heading anim-reveal"><?php the_title(); ?></h1>
            </header>

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
            </div>

        </article><!-- #post-<?php the_ID(); ?> -->

        <?php
        // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) :
            ?>
            <div class="comments-area container-narrow mt-3">
                <?php comments_template(); ?>
            </div>
            <?php
        endif;

    endwhile; // End of the loop.
    ?>

</main><!-- #main-content -->

<?php
get_footer();