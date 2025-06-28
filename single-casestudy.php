<?php
/**
 * The template for displaying a single Case Study.
 *
 * @package Neo-Brutalist_Dynamic
 */

get_header(); ?>

<main id="primary" class="site-main">

    <?php
    // Start the Loop.
    while ( have_posts() ) :
        the_post();
        $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
        ?>

        <header class="case-study-header" style="background-image: linear-gradient(rgba(5,5,5,0.7), rgba(5,5,5,0.7)), url(<?php echo esc_url($featured_img_url); ?>);">
            <div class="container">
                <h1 class="entry-title anim-fade-in-up"><?php the_title(); ?></h1>
                <div class="case-study-excerpt anim-fade-in-up" style="animation-delay: 0.1s;">
                    <?php the_excerpt(); ?>
                </div>
            </div>
        </header>

        <article id="post-<?php the_ID(); ?>" <?php post_class('case-study-content-area'); ?>>
            <div class="container">
<?php if ($challenge = get_field('the_challenge')) : ?>
    <section class="case-section">
        <h2>The Challenge</h2>
        <p><?php echo wp_kses_post($challenge); ?></p>
    </section>
<?php endif; ?>

<?php if ($solution = get_field('our_solution')) : ?>
    <section class="case-section">
        <h2>Our Solution</h2>
        <div><?php echo wp_kses_post($solution); ?></div>
    </section>
<?php endif; ?>

<?php if ($gallery = get_field('project_gallery')) : ?>
    <section class="case-section">
        <h2>Gallery</h2>
        <div class="project-gallery">
            <?php foreach ($gallery as $image) : ?>
                <figure>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                    <?php if ($image['caption']) : ?>
                        <figcaption><?php echo esc_html($image['caption']); ?></figcaption>
                    <?php endif; ?>
                </figure>
            <?php endforeach; ?>
        </div>
    </section>
<?php endif; ?>
<aside class="case-study-sidebar">
    <div class="project-info-box">
        <h4>Project Info</h4>
        <ul>
            <?php if ($client = get_field('client_name')) : ?>
                <li><strong>Client:</strong> <?php echo esc_html($client); ?></li>
            <?php endif; ?>

            <?php if ($services = get_field('services_provided')) : ?>
                <li><strong>Services:</strong> <?php echo implode(', ', $services); ?></li>
            <?php endif; ?>

            <?php if ($year = get_field('project_year')) : ?>
                <li><strong>Year:</strong> <?php echo esc_html($year); ?></li>
            <?php endif; ?>

            <?php if ($url = get_field('project_url')) : ?>
                <li><strong>URL:</strong> <a href="<?php echo esc_url($url); ?>" target="_blank" rel="noopener"><?php echo esc_html($url); ?></a></li>
            <?php endif; ?>
        </ul>
    </div>
</aside>
            </div>
        </article>

    <?php endwhile; ?>

</main>

<?php get_footer(); ?>