<?php
/**
 * Front Page template
 */
get_header();

/* ---------- Helper ---------- */
$section = function( $id, $callback ) {
  if ( get_theme_mod( "csl_{$id}_show", true ) ) { $callback(); }
};
?>

<main id="main-content">
<?php
/* ---------- 1. Hero ---------- */
$section( 'hero', function() { ?>
  <section class="hero">
    <div class="hero-content anim-reveal">
      <h1 class="headline" data-text="<?php echo esc_attr( get_theme_mod( 'csl_hero_headline', 'Made To Inspire' ) ); ?>">
        <?php echo esc_html( get_theme_mod( 'csl_hero_headline', 'Made To Inspire' ) ); ?>
      </h1>
      <p class="hero-intro">
        <?php echo esc_html( get_theme_mod( 'csl_hero_intro', 'We empower innovative brands with strategic design...' ) ); ?>
      </p>
      <div class="hero-cta-group">
        <a href="<?php echo esc_url( get_theme_mod( 'csl_hero_cta1_link', '#work' ) ); ?>" class="btn">
          <?php echo esc_html( get_theme_mod( 'csl_hero_cta1_text', 'See Our Work' ) ); ?>
        </a>
        <a href="<?php echo esc_url( get_theme_mod( 'csl_hero_cta2_link', '/contact' ) ); ?>" class="btn btn-accent">
          <?php echo esc_html( get_theme_mod( 'csl_hero_cta2_text', 'Start a Project' ) ); ?>
        </a>
      </div>
    </div>
  </section>
<?php } );

/* ---------- Logo Grid (Brands) ---------- */
$section( 'logo_grid', function() { ?>
  <section class="container-narrow">
    <h2 class="section-heading anim-reveal">
      <?php echo esc_html( get_theme_mod( 'csl_logo_grid_heading', "Brands We've Worked With" ) ); ?>
    </h2>
    <div class="glass-panel anim-reveal">
      <div class="logo-grid">
        <!-- Replace these img tags with your own logos -->
        <img src="http://casestudy-labs.com/wp-content/uploads/2025/07/stock-x-logo.png" alt="StockX Logo">
        <img src="http://casestudy-labs.com/wp-content/uploads/2025/06/SKYWORLD-LOGO-BLK-TRANSPARENT.png" alt="Skywolrd Cannabis Logo">
        <img src="http://casestudy-labs.com/wp-content/uploads/2025/07/the-otherAsset-1@4x.png" alt="The Other Logo">
        <img src="http://casestudy-labs.com/wp-content/uploads/2025/06/cannabuffa-logo-scaled.png" alt="Cannabuff Logo">
        <img src="http://casestudy-labs.com/wp-content/uploads/2025/06/atc-logoAsset-5@3x.png" alt="All That Chocolate Logo">
        <img src="http://casestudy-labs.com/wp-content/uploads/2025/06/cbk-logo.png" alt="CBK Logo">
        <img src="http://casestudy-labs.com/wp-content/uploads/2025/06/LIONS-MANE-FULL-COLOR-LOGO.png" alt="Lions Mane Infusions Logo">
        <img src="http://casestudy-labs.com/wp-content/uploads/2025/07/Full-Logo-Black.png" alt="Most Alive Logo">
        <img src="http://casestudy-labs.com/wp-content/uploads/2025/07/bcn-summer-event-sticker-2@3x.png" alt="Buffalo Cannabis Network Logo">
        <img src="http://casestudy-labs.com/wp-content/uploads/2025/07/1280px-Dunkin_logo.svg_.png" alt="Dunkin’ Logo">
        <img src="http://casestudy-labs.com/wp-content/uploads/2025/06/Sensi_Word-mark_FINAL.png" alt="Sensi Magazine Logo">

      </div>
    </div>
  </section>
<?php } );

/* ---------- 2. Work (Case Studies) ---------- */
$section( 'work', function() { ?>
  <section id="work" class="container">
    <h2 class="section-heading anim-reveal">
      <?php echo esc_html( get_theme_mod( 'csl_work_heading', 'Case Studies' ) ); ?>
    </h2>
    <p class="text-center anim-reveal">
      <?php echo esc_html( get_theme_mod( 'csl_work_subheading', 'We design brands and platforms...' ) ); ?>
    </p>

    <div class="project-grid">
    <?php
      // Get theme customizer settings for featured case studies
      $selected = get_theme_mod( 'csl_work_featured_ids', [] );
      if ( ! is_array( $selected ) ) { 
        $selected = array_filter( array_map( 'absint', explode( ',', $selected ) ) ); 
      }
      $fallback_count = absint( get_theme_mod( 'csl_work_fallback_count', 3 ) );
      
      // Ensure fallback count is at least 1
      if ( $fallback_count < 1 ) {
        $fallback_count = 3;
      }

      // Build query arguments with better error handling
      $args = [
        'post_type'      => 'casestudy',
        'post_status'    => 'publish',
        'posts_per_page' => empty( $selected ) ? $fallback_count : count( $selected ),
        'orderby'        => empty( $selected ) ? 'date' : 'post__in',
        'order'          => 'DESC',
      ];
      
      // Only add post__in if we have valid selected IDs
      if ( ! empty( $selected ) && is_array( $selected ) ) { 
        $args['post__in'] = $selected; 
      }

      // Execute the query
      $q = new WP_Query( $args ); 
      $i = 0;
      
      if ( $q->have_posts() ) :
        while ( $q->have_posts() ) : $q->the_post(); $i++; ?>
          <a href="<?php the_permalink(); ?>" class="project-card-link anim-reveal" style="--stagger-index:<?php echo $i; ?>">
            <article class="project-card glass-realistic">
              <div class="card-image-wrapper">
                <?php if ( has_post_thumbnail() ) : ?>
                  <?php the_post_thumbnail( 'large' ); ?>
                <?php else : ?>
                  <div class="placeholder-image" style="background: rgba(255,255,255,0.1); aspect-ratio: 16/9; display: flex; align-items: center; justify-content: center; color: rgba(255,255,255,0.6);">
                    <span>No Image</span>
                  </div>
                <?php endif; ?>
              </div>
              <div class="card-content">
                <h3 class="card-title"><?php the_title(); ?></h3>
                <div class="card-excerpt">
                  <?php 
                  if ( has_excerpt() ) {
                    the_excerpt();
                  } else {
                    echo wp_trim_words( get_the_content(), 20, '...' );
                  }
                  ?>
                </div>
              </div>
            </article>
          </a>
        <?php endwhile; 
        wp_reset_postdata();
      else : ?>
        <div class="glass-panel text-center" style="padding: 3rem 2rem;">
          <h3 style="margin-bottom: 1rem; opacity: 0.8;">No Case Studies Yet</h3>
          <p style="margin-bottom: 0; opacity: 0.6;">We're working on showcasing our latest projects. Check back soon!</p>
        </div>
      <?php endif; ?>
    </div>

    <div class="text-center mt-3">
      <?php 
      // Only show "View All" if case studies exist
      $case_study_count = wp_count_posts('casestudy');
      if ( $case_study_count && $case_study_count->publish > 0 ) : ?>
        <a href="<?php echo esc_url( get_post_type_archive_link( 'casestudy' ) ); ?>" class="btn btn-glass">View All Cases</a>
      <?php else : ?>
        <a href="/contact" class="btn btn-glass">Start Your Project</a>
      <?php endif; ?>
    </div>
  </section>
<?php } );

/* ---------- 3. Mission ---------- */
$section( 'mission', function() { ?>
  <section class="container">
    <div class="split-section reverse">
      <div class="split-content anim-slide-left">
        <h2 class="h3 mb-2"><?php echo esc_html( get_theme_mod( 'csl_mission_tagline', 'Our Approach' ) ); ?></h2>
        <h3 class="h2 mb-2"><?php echo esc_html( get_theme_mod( 'csl_mission_heading', 'Strategic Creative Partners' ) ); ?></h3>
        <p><?php echo esc_html( get_theme_mod( 'csl_mission_paragraph1', 'We’re not just a design agency...' ) ); ?></p>
        <p><?php echo esc_html( get_theme_mod( 'csl_mission_paragraph2', 'Our mission is...' ) ); ?></p>
      </div>
      <div class="split-visual anim-slide-right">
        <div class="glass-panel">
          <blockquote><?php echo esc_html( get_theme_mod( 'csl_mission_vision', 'To build a world-class creative ecosystem...' ) ); ?></blockquote>
        </div>
      </div>
    </div>
  </section>
<?php } );

/* ---------- 3.5 Vision & Values ---------- */
$section( 'values', function() { ?>
  <section id="values" class="container">
    <h2 class="section-heading anim-reveal"><?php esc_html_e('Our Lab Values', 'auragrid'); ?></h2>

    <p class="section-intro anim-reveal" style="--stagger-index:0;">
      <strong><?php esc_html_e('Vision:', 'auragrid'); ?></strong>
      <?php esc_html_e('To build a world-class creative agency and ecosystem that attracts innovative minds, A-1 operators, and iconic brands.', 'auragrid'); ?>
    </p>

    <div class="lab-values-grid">
      <div class="lab-value-card anim-reveal" style="--stagger-index:1;">
        <div class="lab-icon-wrapper">
          <i class="ph ph-flask service-icon" aria-hidden="true"></i>
        </div>
        <h3 class="lab-value-title"><?php esc_html_e('Taste is Strategy', 'auragrid'); ?></h3>
        <p class="lab-value-text"><?php esc_html_e('Design isn\'t decoration—it\'s direction.', 'auragrid'); ?></p>
      </div>

      <div class="lab-value-card anim-reveal" style="--stagger-index:2;">
        <div class="lab-icon-wrapper">
          <i class="ph ph-test-tube service-icon" aria-hidden="true"></i>
        </div>
        <h3 class="lab-value-title"><?php esc_html_e('Clarity is Currency', 'auragrid'); ?></h3>
        <p class="lab-value-text"><?php esc_html_e('Clear brands grow.', 'auragrid'); ?></p>
      </div>

      <div class="lab-value-card anim-reveal" style="--stagger-index:3;">
        <div class="lab-icon-wrapper">
          <i class="ph ph-atom service-icon" aria-hidden="true"></i>
        </div>
        <h3 class="lab-value-title"><?php esc_html_e('Collaboration Over Control', 'auragrid'); ?></h3>
        <p class="lab-value-text"><?php esc_html_e('We co-create, not babysit.', 'auragrid'); ?></p>
      </div>
    </div>
  </section>
<?php } );


/* ---------- 4. Services ---------- */
$section( 'services', function() { ?>
  <section id="services" class="container">
    <h2 class="section-heading anim-reveal">
      <?php echo esc_html( get_theme_mod( 'csl_services_heading', 'Capabilities' ) ); ?>
    </h2>
    <div class="services-grid">
      <?php
        // Icon mapping for services
        $service_icons = [
          'strategy' => 'ph-target',
          'branding' => 'ph-pen-nib',
          'production' => 'ph-film-slate',
          'web design' => 'ph-code',
          'content' => 'ph-article',
          'social' => 'ph-chat-circle-dots',
          'media buying' => 'ph-megaphone',
          'lifecycle' => 'ph-graph',
          'marketing' => 'ph-trend-up',
          'default' => 'ph-lightning'
        ];

        $services = new WP_Query([
          'post_type'      => 'page',
          'posts_per_page' => 6,
          'post_parent'    => 20, // TODO: adjust to actual parent page ID
          'orderby'        => 'menu_order',
          'order'          => 'ASC',
        ]);
        $i = 0;
        if ( $services->have_posts() ) :
          while ( $services->have_posts() ) : $services->the_post();
            $i++;

            // Get icon based on title
            $icon_class = 'ph-lightning'; // default
            $title_lower = strtolower(get_the_title());
            foreach ($service_icons as $keyword => $icon) {
              if (stripos($title_lower, $keyword) !== false) {
                $icon_class = $icon;
                break;
              }
            }
          ?>
            <a href="<?php the_permalink(); ?>" class="service-card-link anim-reveal" style="--stagger-index:<?php echo $i; ?>">
              <div class="service-category glass-medium">
                <div class="service-header">
                  <i class="ph <?php echo esc_attr($icon_class); ?> service-icon" aria-hidden="true"></i>
                  <h3 class="service-title"><?php the_title(); ?></h3>
                </div>
                <p class="service-text"><?php echo get_the_excerpt(); ?></p>
              </div>
            </a>
          <?php endwhile; wp_reset_postdata();
        endif;
      ?>
    </div>
    <div class="text-center mt-3">
      <a href="<?php echo esc_url( get_permalink( 20 ) ); ?>" class="btn">View All Services</a>
    </div>
  </section>
<?php } );

/* ---------- 5. Client Fit ---------- */
$section( 'client_fit', function() { ?>
  <section id="client-fit" class="container-narrow">
    <h2 class="section-heading anim-reveal"><?php _e('This Only Works If It\'s Mutual.', 'csl-agency'); ?></h2>
    <p class="text-center anim-reveal" style="max-width: 650px; margin-inline: auto; margin-bottom: 4rem; color: var(--color-text-secondary); transition-delay: 0.1s;">
      <?php _e('We collaborate with founders and teams who want to build legacy—not just chase hype.', 'csl-agency'); ?>
    </p>

    <div class="glass-table-container anim-reveal" style="transition-delay: 0.2s;">
      <table class="glass-table">
        <thead>
          <tr>
            <th><?php _e('We Collaborate With Founders Who:', 'csl-agency'); ?></th>
            <th><?php _e('We Are Not A Good Fit For:', 'csl-agency'); ?></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><?php _e('See design as a business multiplier', 'csl-agency'); ?></td>
            <td><?php _e('Micromanagers and design-by-committee', 'csl-agency'); ?></td>
          </tr>
          <tr>
            <td><?php _e('Value speed, taste, and strategy', 'csl-agency'); ?></td>
            <td><?php _e('"Just need a quick logo" shoppers', 'csl-agency'); ?></td>
          </tr>
          <tr>
            <td><?php _e('Want to build legacy—not just chase hype', 'csl-agency'); ?></td>
            <td><?php _e('Startups with no direction', 'csl-agency'); ?></td>
          </tr>
        </tbody>
      </table>
    </div>
  </section>
<?php } );

/* ---------- 6. Final CTA ---------- */
$section( 'final_cta', function() { ?>
  <section id="contact" class="container text-center">
    <div class="anim-reveal">
      <h2 class="h3 mb-3"><?php _e('Ready To Build The Future?', 'csl-agency'); ?></h2>
      <div class="final-cta-group">
        <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn"><?php _e('Start a Project', 'csl-agency'); ?></a>
        <a href="<?php echo esc_url(home_url('/form/subscribe/')); ?>" class="btn btn-accent"><?php _e('Join Our Network', 'csl-agency'); ?></a>
      </div>
    </div>
  </section>
<?php } ); ?>

</main>
<?php get_footer(); ?>
