<?php
/**
 * Template Name: Contact Page
 *
 * @package Neo-Brutalist_Dynamic
 */

get_header(); ?>

<main id="primary" class="site-main">

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="page-header">
            <div class="container">
                <h1 class="entry-title section-heading anim-fade-in-up">Work With Us</h1>
                <p class="section-subheading anim-fade-in-up" style="max-width: 650px;">
                    Let’s build something iconic. Start your next cannabis or lifestyle branding project with Case Study Labs today.
                </p>
            </div>
        </header>

<div class="entry-content">
    <div class="container" style="max-width: 800px;">

        <?php
        // Render the SureForm
        echo do_shortcode("[sureforms id='85']");

        // Optional: Also render content from the WP editor if you’re using it
        the_content();
        ?>

    </div>
</div>

    </article>

    <?php 
    // You can reuse the final CTA block for extra emphasis at the bottom.
    get_template_part('template-parts/block', 'contact'); 
    ?>

</main>

<?php get_footer(); ?>