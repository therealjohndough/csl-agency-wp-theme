<?php
/**
 * Template Name: Website Development Landing Page
 * Description: Custom landing page for website development services, enhanced with Aura-Grid styles.
 *
 * @package Aura-Grid_Machina_Enhanced
 */

get_header(); ?>

<main id="main-content">
  <!-- ======================================================================== -->
  <!-- HERO SECTION (WITH VANTA.JS) -->
  <!-- ======================================================================== -->
  <section class="hero vanta-hero">
    <div class="hero-content container text-center">
      <p class="h4 anim-reveal" style="color: var(--color-primary); text-transform: uppercase; letter-spacing: 0.1em; transition-delay: 0.1s;"><?php _e('Web Design & Development Services', 'auragrid'); ?></p>
      <h1 class="headline anim-reveal text-gradient"><?php _e('Where Taste Drives Growth.', 'auragrid'); ?></h1>
      <p class="hero-intro anim-reveal" style="transition-delay: 0.2s;"><?php _e('Strategic web design and digital presence for cannabis and lifestyle leaders. We build fast, beautiful, high-converting websites that turn clicks into customers.', 'auragrid'); ?></p>
      <div class="hero-cta-group mt-3 anim-reveal" style="transition-delay: 0.3s;">
        <a href="<?php echo esc_url(home_url('/work')); ?>" class="btn"><?php _e('See Our Work', 'auragrid'); ?></a>
        <a href="#custom-form" class="btn btn-accent"><?php _e('Work With Us', 'auragrid'); ?></a>
        <a href="#faq" class="btn btn-glass"><?php _e('Have Questions?', 'auragrid'); ?></a>
      </div>
    </div>
  </section>

  <!-- ======================================================================== -->
  <!-- FAQ SECTION (REBUILT WITH GLASS CARDS) -->
  <!-- ======================================================================== -->
  <section id="faq" class="container">
    <h2 class="section-heading anim-reveal"><?php _e('Website Development FAQ', 'auragrid'); ?></h2>

    <div class="services-grid" style="margin-top: 4rem;">
        <div class="service-category anim-reveal" style="--stagger-index: 1;">
            <div class="service-header"><h3 class="service-title"><?php _e('How long does a typical website project take?', 'auragrid'); ?></h3></div>
            <p class="service-text"><?php _e('Most projects take 4–8 weeks depending on scope, complexity, and content readiness. We move fast without sacrificing polish.', 'auragrid'); ?></p>
        </div>
        <div class="service-category anim-reveal" style="--stagger-index: 2;">
            <div class="service-header"><h3 class="service-title"><?php _e('What platforms do you build on?', 'auragrid'); ?></h3></div>
            <p class="service-text"><?php _e('We specialize in WordPress but also build custom static sites, Shopify, and headless CMS setups depending on your needs.', 'auragrid'); ?></p>
        </div>
        <div class="service-category anim-reveal" style="--stagger-index: 3;">
            <div class="service-header"><h3 class="service-title"><?php _e('Do you offer hosting and maintenance?', 'auragrid'); ?></h3></div>
            <p class="service-text"><?php _e('Yes — we offer fast, secure hosting with ongoing support. Most clients stay with us for the long haul because it’s easy and reliable.', 'auragrid'); ?></p>
        </div>
        <div class="service-category anim-reveal" style="--stagger-index: 4;">
            <div class="service-header"><h3 class="service-title"><?php _e('Can you work with my brand’s existing assets?', 'auragrid'); ?></h3></div>
            <p class="service-text"><?php _e('Absolutely. We can start with your current logo, brand guide, or assets — or help you elevate and refine them.', 'auragrid'); ?></p>
        </div>
    </div>
  </section>

  <!-- ======================================================================== -->
  <!-- CONTACT FORM SECTION (IN GLASS PANEL) -->
  <!-- ======================================================================== -->
  <section id="custom-form" class="container-narrow text-center">
    <h2 class="section-heading anim-reveal"><?php _e('Start a Conversation', 'auragrid'); ?></h2>
    <p class="anim-reveal" style="color: var(--color-text-secondary); max-width: 60ch; margin-inline: auto; transition-delay: 0.1s; margin-bottom: 3rem;">
        <?php _e('Tell us about your brand, your goals, and how we can help you grow.', 'auragrid'); ?>
    </p>
    <div class="glass-panel anim-reveal" style="transition-delay: 0.2s;">
      <?php echo do_shortcode("[sureforms id='85']"); // Replace with your form shortcode ?>
    </div>
  </section>
</main>

<!-- Scripts and Schema (Keep these) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r121/three.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vanta@latest/dist/vanta.clouds.min.js"></script>
<script>
  // Initialize Vanta.js on page load
  document.addEventListener("DOMContentLoaded", function () {
    if (window.VANTA && document.querySelector('.vanta-hero')) {
      VANTA.CLOUDS({
        el: ".vanta-hero",
        mouseControls: true,
        touchControls: true,
        gyroControls: false,
        minHeight: 200.00,
        minWidth: 200.00,
        // Match theme colors
        skyColor: 0x0A0F1E,
        cloudColor: 0x141A2C,
        sunColor: 0xb8ff00,
        sunlightColor: 0x00eeff
      });
    }
  });
</script>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    { "@type": "Question", "name": "How long does a typical website project take?", "acceptedAnswer": { "@type": "Answer", "text": "Most projects take 4–8 weeks depending on scope, complexity, and content readiness. We move fast without sacrificing polish." }},
    { "@type": "Question", "name": "What platforms do you build on?", "acceptedAnswer": { "@type": "Answer", "text": "We specialize in WordPress but also build custom static sites, Shopify, and headless CMS setups depending on your needs." }},
    { "@type": "Question", "name": "Do you offer hosting and maintenance?", "acceptedAnswer": { "@type": "Answer", "text": "Yes — we offer fast, secure hosting with ongoing support. Most clients stay with us for the long haul because it’s easy and reliable." }},
    { "@type": "Question", "name": "Can you work with my brand’s existing assets?", "acceptedAnswer": { "@type": "Answer", "text": "Absolutely. We can start with your current logo, brand guide, or assets — or help you elevate and refine them." }}
  ]
}
</script>

<!-- Minimal Page-Specific Styles (Only for Vanta integration) -->
<style>
  .vanta-hero {
    /* Ensure Vanta canvas is behind the content */
    z-index: 0;
  }
  .vanta-hero canvas {
    z-index: -1;
  }
  .vanta-hero .hero-content {
    /* Ensure content is on top */
    position: relative;
    z-index: 1;
    /* Override default hero text color for better contrast on Vanta bg */
    color: var(--color-text-primary); 
  }
  .text-gradient {
    /* Recreate gradient text using theme variables */
    background: linear-gradient(90deg, var(--color-primary), var(--color-accent));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    text-fill-color: transparent;
  }
</style>

<?php get_footer(); ?>