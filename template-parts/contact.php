<?php
/**
 * Template Name: Contact Page
 *
 * @package Aura-Grid_Machina_Enhanced
 */

get_header(); ?>

<main id="main-content" role="main" aria-label="<?php esc_attr_e('Contact page main content', 'auragrid'); ?>">

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

      <header class="container-narrow text-center section-pad-top section-pad-bottom-sm">
        <h1 class="section-heading anim-reveal">
          <?php _e('Work With Us', 'auragrid'); ?>
        </h1>
        <p class="anim-reveal text-secondary max-measure delay-100">
          <?php _e('Let’s build something iconic. Start your next cannabis or lifestyle branding project with Case Study Labs today.', 'auragrid'); ?>
        </p>
      </header>

      <div class="container">
        <div class="split-section split-60-40">

          <!-- Left: Form -->
          <section class="split-content anim-slide-left" aria-labelledby="inquiry-form-title">
            <h2 id="inquiry-form-title" class="h3 mb-2">
              <?php _e('Project Inquiry Form', 'auragrid'); ?>
            </h2>

            <div class="glass-panel">
              <?php
                // Render our improved contact form
                echo do_shortcode('[csl_contact_form_improved]');

                // Optional: page content above/below the form from WP editor
                the_content();
              ?>
            </div>
          </section>

          <!-- Right: Direct Contact Info -->
          <aside class="split-content anim-slide-right" aria-labelledby="direct-contact-title">
            <h2 id="direct-contact-title" class="h3 mb-2">
              <?php _e('Direct Contact', 'auragrid'); ?>
            </h2>

            <div class="glass-panel">
              <p><?php _e('Prefer to send a direct email or schedule a call? Use the links below.', 'auragrid'); ?></p>

              <ul class="list-unstyled stack-16">
                <li>
                  <strong class="contact-label">
                    <?php _e('Email Us:', 'auragrid'); ?>
                  </strong>
                  <a href="mailto:dough@casestudylabs.com">dough@casestudylabs.com</a>
                </li>

                <li>
                  <strong class="contact-label">
                    <?php _e('Book a Call:', 'auragrid'); ?>
                  </strong>
                  <a href="https://calendar.app.google/z1veEHms9x3RJAT79" rel="noopener">
                    <?php _e('Schedule a Discovery Session', 'auragrid'); ?>
                  </a>
                </li>

                <li class="mt-16">
                  <a href="/services" class="btn btn-accent btn-block">
                    <?php _e('View Our Services', 'auragrid'); ?>
                  </a>
                </li>
              </ul>
            </div>
          </aside>

        </div><!-- .split-section -->
      </div><!-- .container -->

    </article>
  <?php endwhile; endif; ?>

</main>

<?php get_footer();
