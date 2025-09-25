<?php
/**
 * Template Name: Our Process — Customizer)
 * Description: Process page powered by Theme Customizer settings (no ACF). JSON-encoded steps & FAQ with JD copy.
 * @package Aura-Grid_Machina_Enhanced
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

get_header(); ?>

<main id="main-content" class="csl-process">
<?php
  // --- Customizer-backed content --- //
  $kicker   = get_theme_mod('csl_process_kicker', __('Strategic Brand Consulting','auragrid'));
  $title    = get_theme_mod('csl_process_title', __('Learn Our Process','auragrid'));
  $body     = get_theme_mod('csl_process_body', __("You're ready to scale but need a roadmap. Our strategic consulting helps you define your market position, identify growth opportunities, and create systems that drive sustainable revenue. Let's build your blueprint for domination.", 'auragrid'));

  $cta_primary_text = get_theme_mod('csl_process_cta_primary_text', __('Book Strategy Call','auragrid'));
  $cta_primary_url  = get_theme_mod('csl_process_cta_primary_url', home_url('/contact/'));
  $cta_secondary_text = get_theme_mod('csl_process_cta_secondary_text', __('Deliverable FAQ','auragrid'));
  $cta_secondary_url  = get_theme_mod('csl_process_cta_secondary_url', 'https://casestudy-labs.com/services/');

  $steps_json = get_theme_mod('csl_process_steps_json', '');
  $faq_json   = get_theme_mod('csl_process_faq_json', '');

  // Fallback defaults for steps (if JSON missing/invalid)
  $default_steps = [
    ['title'=>'Discovery, Not Therapy','desc'=>'We get brutally clear on goals, constraints, budget, and what “win” means in numbers.','out'=>'Fit Check & Next Steps','slug'=>'discovery'],
    ['title'=>'Flash Audit','desc'=>'Brand, site, data, funnel. We hunt for friction, leaks, and leverage.','out'=>'Findings Brief (1–2 pages)','slug'=>'flash-audit'],
    ['title'=>'Strategy Sprint','desc'=>'Positioning, audience slices, offers, channels. Less theory, more moves.','out'=>'Strategy One‑Pager','slug'=>'strategy-sprint'],
    ['title'=>'Message + Prototype','desc'=>'We build a click‑through concept (landing/ad set) and put your story under heat.','out'=>'Prototype & Copy Deck','slug'=>'message-prototype'],
    ['title'=>'90‑Day Plan','desc'=>'Sequence, resourcing, owners, and non‑negotiable milestones.','out'=>'Execution Roadmap','slug'=>'90-day-plan'],
    ['title'=>'Measure, Optimize, Repeat','desc'=>'Simple analytics tied to revenue. No vanity dashboards allowed.','out'=>'KPI Sheet & Cadence','slug'=>'measure-optimize'],
  ];

  $steps = json_decode($steps_json, true);
  if ( ! is_array($steps) || empty($steps) ) { $steps = $default_steps; }
  // Normalize and sanitize step fields
  $norm_steps = [];
  foreach ($steps as $i => $s) {
    $title_s = isset($s['title']) ? wp_strip_all_tags($s['title']) : ('Step '.($i+1));
    $slug_s  = isset($s['slug']) && $s['slug'] !== '' ? sanitize_title($s['slug']) : sanitize_title($title_s);
    $norm_steps[] = [
      'title' => $title_s,
      'desc'  => isset($s['desc']) ? wp_strip_all_tags($s['desc']) : '',
      'out'   => isset($s['out']) ? wp_strip_all_tags($s['out']) : '',
      'slug'  => $slug_s,
    ];
  }

  // FAQ fallback
  $default_faq = [
    ['q'=>'How fast is the Strategy Sprint?','a'=>'Typically 10 business days, start to finish. Prototype included.'],
    ['q'=>'What’s the investment?','a'=>'Scope‑based. Strategy Sprints start lean; execution is modular so you’re not paying for a circus you don’t need.'],
    ['q'=>'Can you work with our in‑house team?','a'=>'Absolutely. We love being your unfair advantage — and leaving you with systems, not dependency.'],
  ];
  $faq = json_decode($faq_json, true);
  if ( ! is_array($faq) || empty($faq) ) { $faq = $default_faq; }
?>

  <!-- Hero -->
  <header class="container-narrow text-center" style="padding-top: var(--spacing-section); padding-bottom: var(--spacing-section-small);">
    <p class="kicker anim-reveal" style="letter-spacing:.08em; text-transform:uppercase; opacity:.75; margin:0 0 .5rem;"><?php echo esc_html($kicker); ?></p>
    <h1 class="section-heading anim-reveal"><?php echo esc_html($title); ?></h1>
    <p class="anim-reveal" style="color: var(--color-text-secondary); max-width: 70ch; margin-inline: auto; transition-delay: 0.1s;">
      <?php echo wp_kses_post($body); ?>
    </p>
    <div class="cta-row anim-reveal" style="display:flex; gap:.75rem; justify-content:center; margin-top:1rem;">
      <a class="btn btn-accent" href="<?php echo esc_url($cta_primary_url); ?>"><?php echo esc_html($cta_primary_text); ?></a>
      <a class="btn btn-outline" href="<?php echo esc_url($cta_secondary_url); ?>"><?php echo esc_html($cta_secondary_text); ?></a>
    </div>
  </header>

  <!-- What You Get -->
  <section class="container" style="padding-bottom: var(--spacing-section-small);">
    <div class="glass-panel anim-reveal" style="padding: clamp(16px, 2vw, 28px);">
      <h2 class="h3" style="margin-bottom:.5rem;"><?php _e('What You Get', 'auragrid'); ?></h2>
      <ul class="check-list" style="display:grid; grid-template-columns: 1fr; gap:.5rem; margin:0; padding:0; list-style:none;">
        <li>Positioning that doesn’t wobble when the market sneezes.</li>
        <li>Offer architecture that makes buying the obvious next step.</li>
        <li>Message, creative, and a click‑through prototype to pressure‑test fast.</li>
        <li>90‑day execution plan tied to revenue, not vibes.</li>
      </ul>
    </div>
  </section>

  <!-- Process Steps -->
  <section class="container" style="padding-bottom: var(--spacing-section);">
    <h2 class="h3 anim-reveal" style="margin-bottom:1rem;"><?php _e('The Process', 'auragrid'); ?></h2>

    <ol class="process-grid">
      <?php foreach ($norm_steps as $i => $s): $anchor = esc_attr($s['slug']); ?>
        <li id="<?php echo $anchor; ?>" class="process-card anim-reveal" style="transition-delay: <?php echo esc_attr( 0.05 * $i ); ?>s;">
          <div class="num"><?php echo esc_html($i+1); ?></div>
          <div class="body">
            <h3 class="h4" style="margin:.2rem 0 .4rem;"><?php echo esc_html($s['title']); ?></h3>
            <?php if (!empty($s['desc'])): ?><p class="muted"><?php echo esc_html($s['desc']); ?></p><?php endif; ?>
            <?php if (!empty($s['out'])): ?><p class="tiny"><strong><?php _e('Output:', 'auragrid'); ?></strong> <?php echo esc_html($s['out']); ?></p><?php endif; ?>
          </div>
        </li>
      <?php endforeach; ?>
    </ol>

    <div class="cta-row" style="margin-top:1.25rem; display:flex; gap:.75rem; flex-wrap:wrap;">
      <a class="btn btn-accent" href="<?php echo esc_url($cta_primary_url); ?>"><?php echo esc_html($cta_primary_text); ?></a>
      <a class="btn" href="<?php echo esc_url($cta_secondary_url); ?>"><?php _e('Services and Deliverables', 'auragrid'); ?></a>
    </div>
  </section>

  <!-- Receipts: Use page editor content if present -->
  <section class="container" style="padding-bottom: var(--spacing-section-small);">
    <div class="split-section split-60-40">
      <div class="split-content anim-slide-left">
        <h2 class="h4 mb-2"><?php _e('Why This Works', 'auragrid'); ?></h2>
        <ul class="dash-list" style="margin:0; padding-left:1rem;">
          <li>Founder‑led from brief to launch. No disappear‑and‑delegate.</li>
          <li>Creative that sells first, wins awards later.</li>
          <li>Systems you can run without us (if you want — we won’t cry).</li>
        </ul>
      </div>
      <aside class="split-content anim-slide-right">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <div class="glass-panel"><?php the_content(); ?></div>
        <?php endwhile; wp_reset_postdata(); endif; ?>
      </aside>
    </div>
  </section>

  <!-- FAQ -->
  <section class="container" style="padding-bottom: var(--spacing-section);">
    <h2 class="h4 mb-2 anim-reveal"><?php _e('FAQ (Straight Answers)', 'auragrid'); ?></h2>
    <div class="glass-panel">
      <?php foreach ($faq as $qa): ?>
        <details>
          <summary><strong><?php echo esc_html( isset($qa['q']) ? $qa['q'] : '' ); ?></strong></summary>
          <p><?php echo esc_html( isset($qa['a']) ? $qa['a'] : '' ); ?></p>
        </details>
      <?php endforeach; ?>
    </div>
  </section>

</main>

<style>
/***** light, theme-friendly helpers *****/
.csl-process .process-grid{list-style:none; padding:0; margin:0; display:grid; grid-template-columns:1fr; gap: var(--spacing-grid, 16px);} 
.csl-process .process-card{border:1px solid color-mix(in oklab, var(--color-border, #000) 12%, transparent); border-radius:16px; padding:16px; display:grid; grid-template-columns:48px 1fr; gap:12px;}
.csl-process .process-card .num{width:36px; height:36px; border-radius:999px; display:grid; place-items:center; font-weight:600; border:1px solid color-mix(in oklab, var(--color-border, #000) 20%, transparent);}
.csl-process .process-card .muted{color: var(--color-text-secondary);} 
.csl-process .process-card .tiny{opacity:.9; font-size:.9rem;}
@media (min-width: 900px){ .csl-process .process-grid{ grid-template-columns: 1fr 1fr; } }
.csl-process details{padding:.75rem 0; border-bottom:1px dashed color-mix(in oklab, var(--color-border, #000) 18%, transparent);} 
.csl-process details:last-child{border-bottom:0;}
.csl-process .check-list li::marker{content:'✔︎ ';}
.csl-process .dash-list li{margin:.4rem 0;}
</style>

<?php
// JSON-LD HowTo schema built from Customizer steps
$schema_steps = [];
$page_url = get_permalink();
foreach ($norm_steps as $i => $s) {
  $schema_steps[] = [
    '@type'    => 'HowToStep',
    'position' => $i+1,
    'name'     => $s['title'],
    'url'      => trailingslashit($page_url) . $s['slug'],
    'itemListElement' => [
      '@type' => 'HowToDirection',
      'text'  => $s['desc']
    ]
  ];
}
$howto = [
  '@context' => 'https://schema.org',
  '@type'    => 'HowTo',
  '@id'      => trailingslashit($page_url) . '#howto',
  'name'     => 'Case Study Labs — Strategic Consulting Process',
  'description' => wp_strip_all_tags($body),
  'totalTime'   => 'P10D',
  'estimatedCost'=> [ '@type'=>'MonetaryAmount', 'currency'=>'USD', 'value'=>'0' ],
  'supply'       => ['Brand assets','Access to analytics'],
  'tool'         => ['Figma prototype','Analytics dashboard'],
  'step'         => $schema_steps,
];
?>
<script type="application/ld+json">
<?php echo wp_json_encode($howto, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT); ?>
</script>

<?php get_footer(); ?>
