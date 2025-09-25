<?php
/**
 * Template Name: Service Landing Page
 * Description: A reusable landing page for individual services.
 *
 * @package Aura-Grid_Machina_Enhanced
 */

get_header(); ?>

<main id="main-content">
    <?php
    // Pull ACF fields with fallbacks
    $hero_title      = get_field('service_hero_title') ?: get_the_title();
    $hero_subtitle   = get_field('service_hero_subtitle');
    $hero_intro      = get_field('service_hero_intro');

    $offerings_heading = get_field('offerings_heading') ?: 'What We Offer';
    $detailed_process  = get_field('service_detailed_process');

    $cta_heading     = get_field('cta_heading') ?: 'Ready to Elevate Your Brand?';
    $cta_subheading  = get_field('cta_subheading') ?: "Let's discuss how our expertise can drive your success.";
    $cta_button_text = get_field('cta_button_text') ?: 'Start a Project';
    $cta_button_link = get_field('cta_button_link') ?: home_url('/contact');
    ?>

    <!-- ========================= HERO SECTION =============================== -->
    <section class="hero">
        <div class="hero-content container text-center">
            <?php if ($hero_subtitle) : ?>
                <p class="h4 anim-reveal" style="color: var(--color-primary); text-transform: uppercase; letter-spacing: 0.1em; transition-delay: 0.1s;">
                    <?php echo esc_html($hero_subtitle); ?>
                </p>
            <?php endif; ?>
            <h1 class="headline anim-reveal text-gradient" data-text="<?php echo esc_attr($hero_title); ?>">
                <?php echo esc_html($hero_title); ?>
            </h1>
            <?php if ($hero_intro) : ?>
                <p class="hero-intro anim-reveal" style="transition-delay: 0.2s;">
                    <?php echo esc_html($hero_intro); ?>
                </p>
            <?php endif; ?>
        </div>
    </section>

    <!-- ========================= WHAT WE OFFER ============================= -->
    <section class="container">
        <h2 class="section-heading anim-reveal">
            <?php echo esc_html($offerings_heading); ?>
        </h2>

        <?php if (have_rows('service_offerings')) : ?>
            <div class="services-grid" style="margin-top: 4rem;">
                <?php
                $stagger_index = 0;
                while (have_rows('service_offerings')) : the_row();
                    $stagger_index++;
                    $offering_title       = get_sub_field('offering_title');
                    $offering_description = get_sub_field('offering_description');
                    ?>
                    <div class="service-category offer-item anim-reveal" style="--stagger-index: <?php echo esc_attr($stagger_index); ?>;">
                        <div class="service-header">
                            <h3 class="service-title"><?php echo esc_html($offering_title); ?></h3>
                        </div>
                        <p class="service-text"><?php echo esc_html($offering_description); ?></p>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </section>

    <!-- ========================= DETAILED PROCESS ========================== -->
    <?php if ($detailed_process) : ?>
        <section class="container-narrow">
            <div class="glass-panel anim-reveal">
                <div class="content-wrapper">
                    <?php echo wp_kses_post($detailed_process); ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- ========================= FAQ ACCORDION ============================= -->
    <?php if (have_rows('service_faqs')) : ?>
        <section class="container-narrow">
            <h2 class="section-heading anim-reveal">
                <?php _e('Frequently Asked Questions', 'auragrid'); ?>
            </h2>
            <div class="faq-accordion anim-reveal" style="margin-top: 3rem; transition-delay: 0.1s;">
                <?php
                while (have_rows('service_faqs')) : the_row();
                    $question = get_sub_field('faq_question');
                    $answer   = get_sub_field('faq_answer');
                    ?>
                    <details class="faq-item">
                        <summary class="faq-question"><?php echo esc_html($question); ?></summary>
                        <div class="faq-answer content-wrapper">
                            <p><?php echo esc_html($answer); ?></p>
                        </div>
                    </details>
                <?php endwhile; ?>
            </div>
        </section>
    <?php endif; ?>

    <!-- ========================= FINAL CTA ================================ -->
    <section class="container-narrow">
        <div class="glass-panel text-center anim-reveal glow-primary">
            <h2 class="h3 mt-0 mb-1"><?php echo esc_html($cta_heading); ?></h2>
            <p class="mb-2" style="color: var(--color-text-secondary);">
                <?php echo esc_html($cta_subheading); ?>
            </p>
            <a href="<?php echo esc_url($cta_button_link); ?>" class="btn" style="margin-bottom: 1rem;">
                <?php echo esc_html($cta_button_text); ?>
            </a>
        </div>
    </section>
</main>

<?php get_footer(); ?>
