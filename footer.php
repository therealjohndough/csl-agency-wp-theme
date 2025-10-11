<?php
/**
 * The template for displaying the footer
 *
 * @package CSL_Agency
 */
?>
    </div><!-- #page-content -->

<footer class="site-footer" role="contentinfo">
  <div class="container">
    <div class="footer-grid">

      <!-- Left: Brand + Newsletter -->
      <div class="footer-left">
        <div class="footer-brand-info">
          <div class="site-logo">
            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
              <?php if (has_custom_logo()) { the_custom_logo(); } else { bloginfo('name'); } ?>
            </a>
          </div>
          <p class="footer-tagline">Strategic design and brand elevation for industry leaders. Made to Inspire.</p>
        </div>

        <div id="newsletter-signup" class="footer-newsletter">
          <h4 class="footer-heading">Stay Updated</h4>
          <p class="footer-newsletter-intro">Join our network for insights on branding, cannabis culture, and design strategy.</p>
          <div class="footer-newsletter-form">
            <?php echo do_shortcode('[csl_footer_signup]'); ?>
          </div>
        </div>
      </div>

      <!-- Right: Explore + Services + Connect -->
      <div class="footer-links-blocks">

        <nav class="footer-column" aria-labelledby="footer-explore">
          <h4 id="footer-explore" class="footer-heading">Explore</h4>
          <ul class="footer-links-list">
            <li><a href="<?php echo esc_url(home_url('/studio')); ?>">About The Studio</a></li>
            <li><a href="<?php echo esc_url(home_url('/services/')); ?>">Our Services</a></li>
            <li><a href="<?php echo esc_url(home_url('/services#pricing')); ?>">Pricing</a></li>
            <li><a href="<?php echo esc_url(home_url('/case-studies')); ?>">Case Studies</a></li>
            <li><a href="<?php echo esc_url(home_url('/contact')); ?>">Work With Us</a></li>
          </ul>
        </nav>

        <nav class="footer-column" aria-labelledby="footer-services">
          <h4 id="footer-services" class="footer-heading">Services</h4>
          <ul class="footer-links-list">
            <li><a href="<?php echo esc_url(home_url('/services/strategy/')); ?>">Strategy</a></li>
            <li><a href="<?php echo esc_url(home_url('/services/branding-production/')); ?>">Branding &amp; Production</a></li>
            <li><a href="<?php echo esc_url(home_url('/services/web-design/')); ?>">Web Design</a></li>
            <li><a href="<?php echo esc_url(home_url('/services/content-social/')); ?>">Content &amp; Social</a></li>
            <li><a href="<?php echo esc_url(home_url('/services/media-buying/')); ?>">Media Buying</a></li>
            <li><a href="<?php echo esc_url(home_url('/services/lifecycle-marketing/')); ?>">Lifecycle Marketing</a></li>
          </ul>
        </nav>

        <nav class="footer-column" aria-labelledby="footer-connect">
          <h4 id="footer-connect" class="footer-heading">Connect</h4>
          <ul class="footer-links-list">
            <li><a href="mailto:dough@casestudy-labs.com"><i class="ph ph-envelope" aria-hidden="true"></i> dough@casestudy-labs.com</a></li>
            <li><a href="https://calendar.app.google/wjzdm2J4EUE1oxh36" target="_blank" rel="noopener"><i class="ph ph-calendar-check" aria-hidden="true"></i> Schedule a Discovery Call</a></li>
            <li><a href="https://linkedin.com/company/case-study-labs" target="_blank" rel="noopener"><i class="ph ph-linkedin-logo" aria-hidden="true"></i> LinkedIn</a></li>
            <li><a href="https://instagram.com/case_study_labs" target="_blank" rel="noopener"><i class="ph ph-instagram-logo" aria-hidden="true"></i> Instagram</a></li>
          </ul>
        </nav>

      </div>
    </div>

    <div class="footer-bottom-bar">
      <p>
        © <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php _e('All rights reserved.', 'auragrid'); ?>
        <span class="sep" aria-hidden="true">|</span>
        <a href="<?php echo esc_url(home_url('/privacy-policy')); ?>">Privacy</a>
      </p>
        </div>

        
</footer>

    <?php wp_footer(); ?>
  </body>
</html>
