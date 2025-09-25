<?php
/**
 * Template Name: Cannabis Advertising Offer
 * Description: 4 spots left; $1,500 in FREE Buffalo News print + digital add-ons.
 * @package Aura-Grid_Machina_Enhanced
 */

if ( ! defined('ABSPATH') ) exit;

get_header();

// Quick knobs (hardcoded; schema handled in functions.php)
$hero_headline = __('Are You Ready To Stand Out?', 'auragrid');
$hero_intro    = __('Case Study Labs + Amplified Media are teaming up with Buffalo News to deliver the highest-ROI ad program in NY cannabis — including $1,500 in FREE Buffalo News print + digital add-ons for new partners.', 'auragrid');

$slots_total = 5; // original allocation
$slots_left  = 4; // current remaining
$bonus_value = '$1,500';

$cta_text = __('Secure Your Spot Now', 'auragrid');
$cta_url  = 'https://casestudy-labs.com/form/cannabis-advertising-readiness-quiz/';

$partner_logo = 'https://casestudy-labs.com/wp-content/uploads/2025/06/AmplifiedLogo-002.png';
?>
<main id="main-content">

  <!-- HERO -->
  <section class="hero">
    <div class="hero-content anim-reveal">
      <h1 class="headline" data-text="<?php echo esc_attr($hero_headline); ?>">
        <?php echo esc_html($hero_headline); ?>
      </h1>

      <p class="hero-intro">
        <?php echo wp_kses_post($hero_intro); ?>
      </p>

      <p class="h4" style="color: var(--color-primary); margin-top: 1.5rem; text-shadow: var(--ui-glow-primary);">
        <?php
          printf(
            // translators: 1: slots total (struck), 2: slots left (highlight), 3: bonus value
            wp_kses_post(__('First <span style="text-decoration: line-through; color: var(--color-text-muted);">%1$d</span> <span style="color: var(--color-warning); font-weight: bold;">%2$d</span> businesses to sign up get %3$s in FREE Buffalo News print + digital add-ons.', 'auragrid')),
            intval($slots_total),
            intval($slots_left),
            esc_html($bonus_value)
          );
        ?>
      </p>

      <div class="hero-partner-logos mt-3" aria-label="<?php esc_attr_e('Partners','auragrid'); ?>">
        <span>Case Study Labs</span>
        <span style="font-size: 2rem; color: var(--color-text-muted);">+</span>
        <img src="<?php echo esc_url($partner_logo); ?>" alt="<?php esc_attr_e('Amplified Media Logo','auragrid'); ?>" loading="lazy" decoding="async">
      </div>

      <div class="mt-3">
        <a class="btn btn-accent" href="<?php echo esc_url($cta_url); ?>" rel="noopener nofollow">
          <?php echo esc_html($cta_text); ?>
        </a>
      </div>
    </div>
  </section>

  <!-- CLIENT EXAMPLES -->
  <section id="client-examples" class="container">
    <h2 class="section-heading anim-reveal text-center">Case Study Labs+</h2>

    <div class="glass-panel text-center anim-reveal glow-accent" style="margin: 2rem 0;">
      <p class="h4 mb-0" style="color: var(--color-warning);"><?php esc_html_e('Creative That Converts! Example: Programmatic Display Campaign Assets', 'auragrid'); ?> </p>
    </div>

    <div class="services-grid" style="margin-top: 3rem;">
      <div class="service-category client-ad anim-reveal" style="--stagger-index: 1;">
        <div class="service-header">
          <img src="https://casestudy-labs.com/wp-content/uploads/2025/08/CBK_2_8.25_300-x-600-1.gif" alt="Cannabis Ad Campaign — 300x600 Display Banner" style="width: 100%; height: auto; border-radius: var(--border-radius); margin-bottom: 1rem;" loading="lazy" decoding="async">
        </div>
        <p class="service-text text-center" style="font-weight: bold; color: var(--color-primary);">300x600 Display Banner</p>
      </div>

      <div class="service-category client-ad anim-reveal" style="--stagger-index: 2;">
        <div class="service-header">
          <img src="https://casestudy-labs.com/wp-content/uploads/2025/08/CBK_2_8.25_970-x-250-2-1.gif" alt="Cannabis Ad Campaign — 970x250 Leaderboard Banner" style="width: 100%; height: auto; border-radius: var(--border-radius); margin-bottom: 1rem;" loading="lazy" decoding="async">
        </div>
        <p class="service-text text-center" style="font-weight: bold; color: var(--color-primary);">970x250 Leaderboard Banner</p>
      </div>

      <div class="service-category client-ad anim-reveal" style="--stagger-index: 3;">
        <div class="service-header">
          <img src="https://casestudy-labs.com/wp-content/uploads/2025/08/CBK_8.25_300-x-2502.gif" alt="Cannabis Ad Campaign — 300x250 Medium Rectangle" style="width: 100%; height: auto; border-radius: var(--border-radius); margin-bottom: 1rem;" loading="lazy" decoding="async">
        </div>
        <p class="service-text text-center" style="font-weight: bold; color: var(--color-primary);">300x250 Medium Rectangle</p>
      </div>

      <div class="service-category client-ad anim-reveal" style="--stagger-index: 4;">
        <div class="service-header">
          <img src="https://casestudy-labs.com/wp-content/uploads/2025/08/CBK_8.25_300-x-600-2.gif" alt="Cannabis Ad Campaign — 300x600 Skyscraper" style="width: 100%; height: auto; border-radius: var(--border-radius); margin-bottom: 1rem;" loading="lazy" decoding="async">
        </div>
        <p class="service-text text-center" style="font-weight: bold; color: var(--color-primary);">300x600 Skyscraper Banner</p>
      </div>

      <div class="service-category client-ad anim-reveal" style="--stagger-index: 5;">
        <div class="service-header">
          <img src="https://casestudy-labs.com/wp-content/uploads/2025/08/CBK_8.25_970-x-250-2.gif" alt="Cannabis Ad Campaign — 970x250 Header Banner" style="width: 100%; height: auto; border-radius: var(--border-radius); margin-bottom: 1rem;" loading="lazy" decoding="async">
        </div>
        <p class="service-text text-center" style="font-weight: bold; color: var(--color-primary);">970x250 Header Banner</p>
      </div>
    </div>
  </section>

  <!-- WHAT'S INCLUDED -->
  <section id="offer-details" class="container">
    <h2 class="section-heading anim-reveal"><?php _e("What's Included", 'auragrid'); ?></h2>

    <div class="services-grid" style="margin-top: 4rem;">
      <?php
      $offer_items = [
        sprintf(__('%s in FREE Buffalo News print + digital add-ons', 'auragrid'), $bonus_value) => __('Guaranteed visibility across Western NY', 'auragrid'),
        __('Brand Audit', 'auragrid') => __('We’ll tell you what works—and what doesn’t', 'auragrid'),
        __('Compliance Review', 'auragrid') => __('Stay on the right side of NYS regs', 'auragrid'),
        __('Conversion Boost', 'auragrid') => __('Upgrade your site + promo strategy', 'auragrid'),
        __('Local Edge', 'auragrid') => __('Be seen where competitors aren’t', 'auragrid'),
      ];
      $stagger_index = 0;
      foreach ($offer_items as $title => $description) :
        $stagger_index++;
      ?>
        <div class="service-category offer-item anim-reveal" style="--stagger-index: <?php echo intval($stagger_index); ?>;">
          <div class="service-header"><h3 class="service-title"><?php echo esc_html($title); ?></h3></div>
          <p class="service-text"><?php echo esc_html($description); ?></p>
        </div>
      <?php endforeach; ?>
    </div>

    <p class="text-center h4 mt-3 anim-reveal" style="color: var(--color-warning);">
      <?php esc_html_e('Only 4 bonus slots available. Act fast or miss out.', 'auragrid'); ?>
    </p>
  </section>

  <!-- READINESS QUIZ CTA -->
  <section id="quiz" class="container-narrow">
    <div class="glass-panel text-center anim-reveal glow-accent">
      <h2 class="h3 mt-0 mb-1"><?php _e('Take the Readiness Quiz', 'auragrid'); ?></h2>
      <p class="mb-2" style="color: var(--color-text-secondary);">
        <?php _e('Answer 7 questions. Get instant clarity. See if you qualify for the $1,500 Buffalo News add-ons and campaign upgrades.', 'auragrid'); ?>
      </p>
      <a href="<?php echo esc_url($cta_url); ?>" class="btn btn-accent" style="margin-bottom: 1.5rem;" rel="noopener nofollow">
        <?php echo esc_html($cta_text); ?>
      </a>
      <p class="mb-0 fs-small" style="color: var(--color-text-muted);">
        <?php _e("No pressure. No strings. If it’s a fit, we’ll help you grow. If not, you’ll still walk away with real insights.", 'auragrid'); ?>
      </p>
    </div>
  </section>

  <!-- FINAL INFO -->
  <section class="container-narrow text-center">
    <div class="anim-reveal">
      <p style="color: var(--color-text-secondary);">
        <?php _e('Want to know more? Learn more at', 'auragrid'); ?>
        <a href="<?php echo esc_url( home_url('/') ); ?>">casestudy-labs.com</a>
        <?php _e('and', 'auragrid'); ?>
        <a href="<?php echo esc_url( home_url('/studio') ); ?>">/studio</a>.
      </p>
    </div>
  </section>

</main>

<?php get_footer(); ?>
