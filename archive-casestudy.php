<?php
/**
 * The template for displaying the Case Study archive page.
 *
 * @package Neo-Brutalist_Dynamic
 */

get_header(); ?>

<main id="primary" class="site-main">

    <header class="page-header">
        <div class="container">
            <h1 class="entry-title section-heading anim-fade-in-up">Case Studies</h1>
            <p class="section-subheading anim-fade-in-up">
                Results, not just recognition. Here’s what happens when strategy, taste, and execution align.
            </p>
        </div>
    </header>

    <div class="container" style="padding-top: 2rem;">
        <?php if ( have_posts() ) : ?>
            <div class="project-grid anim-fade-in-up">
                <?php
                // Start the Loop.
                while ( have_posts() ) :
                    the_post();
                    ?>
                    <article class="project-card">
                        <a href="<?php the_permalink(); ?>" class="card-link-wrapper">
                            <div class="card-image-wrapper">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <?php the_post_thumbnail( 'large' ); ?>
                                <?php else : ?>
                                    <img src="https://via.placeholder.com/800x600?text=Placeholder" alt="Placeholder Image">
                                <?php endif; ?>
                            </div>
                            <div class="card-content">
                                <h3 class="card-title"><?php the_title(); ?></h3>
                                <div class="card-excerpt">
                                    <?php the_excerpt(); ?>
                                </div>
                            </div>
                        </a>
                    </article>
                    <?php
                endwhile;
                ?>
            </div>

            <?php
            // Previous/next page navigation.
            the_posts_pagination(
                array(
                    'prev_text'          => __( 'Previous', 'neobrutalist' ),
                    'next_text'          => __( 'Next', 'neobrutalist' ),
                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'neobrutalist' ) . ' </span>',
                )
            );
        else :
            // If no content, include the "No posts found" template.
            echo '<p>No case studies found.</p>';
        endif;
        ?>
    </div>

</main>

<?php get_footer(); ?>