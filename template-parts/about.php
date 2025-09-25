<?php
/**
 * Template Name: About Page
 *
 * @package Aura-Grid_Machina_Enhanced
 */

get_header(); ?>

<main id="main-content">

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        
        <header class="container-narrow text-center" style="padding-top: var(--spacing-section); padding-bottom: var(--spacing-section-small);">
            <h1 class="section-heading anim-reveal"><?php _e('The Studio', 'auragrid'); ?></h1>
            <p class="anim-reveal" style="color: var(--color-text-secondary); max-width: 60ch; margin-inline: auto; transition-delay: 0.1s;">
                <?php _e('We created the agency we always wanted to work with. Transparent, founder-led, and obsessed with results.', 'auragrid'); ?>
            </p>
        </header>

        <!-- ======================================================================== -->
        <!-- PHILOSOPHY SECTION WITH SPLIT LAYOUT -->
        <!-- ======================================================================== -->
        <section class="container">
            <div class="split-section reverse">
                <div class="split-content anim-slide-left">
                    <h2 class="h3 mb-2" style="color: var(--color-primary);"><?php _e('Our Philosophy', 'auragrid'); ?></h2>
                    <p class="text-secondary"><?php _e('Case Study Labs was founded after years of working in agencies that lacked transparency, where ad spend was a mystery and the founders disappeared after the deal was signed. We set out to build something different — an agency that puts relationships and performance first.', 'auragrid'); ?></p>
                </div>
                <div class="split-visual anim-slide-right">
                    <div class="glass-panel">
                        <blockquote><?php _e('Our mantra? Made to Inspire.', 'auragrid'); ?></blockquote>
                    </div>
                </div>
            </div>
        </section>

        <!-- ======================================================================== -->
        <!-- LEADERSHIP SECTION WITH CUSTOM CARDS -->
        <!-- ======================================================================== -->
        <section class="container">
            <h2 class="section-heading anim-reveal"><?php _e('Leadership', 'auragrid'); ?></h2>
            <div class="leadership-grid anim-reveal" style="transition-delay: 0.1s;">
                <!-- Leader 1 -->
                <div class="leader-card" style="--stagger-index: 1;">
                    <div class="leader-portrait" style="background-image: url('http://casestudy-labs.com/wp-content/uploads/2025/06/john-dough-dangelo.png');"></div>
                    <h3 class="leader-name">John Dough D’Angelo</h3>
                    <p class="leader-title">Founder & Chief Strategist</p>
                    <p class="leader-bio">John leads strategy and vision. With a background in branding and digital products, he helps ambitious founders bring premium brands to life.</p>
                </div>
                <!-- Leader 2 -->
                <div class="leader-card" style="--stagger-index: 2;">
                    <div class="leader-portrait" style="background-image: url('http://casestudy-labs.com/wp-content/uploads/2025/06/Bill_brady_portrait.jpg');"></div>
                    <h3 class="leader-name">Bill Brady</h3>
                    <p class="leader-title">Partner & Head of Visual Storytelling</p>
                    <p class="leader-bio">Bill is a visual director known for his story-rich images. He brings clarity and emotion to brand narratives with 20+ years of craft.</p>
                </div>
                <!-- Leader 3 -->
                <div class="leader-card" style="--stagger-index: 3;">
                    <div class="leader-portrait" style="background-image: url('http://casestudy-labs.com/wp-content/uploads/2025/06/EDREYS-EAT-OFF-ART-scaled-e1751150967718.jpg');"></div>
                    <h3 class="leader-name">Edreys Wajed</h3>
                    <p class="leader-title">Illustrator & Identity Designer</p>
                    <p class="leader-bio">A multidisciplinary artist, Edreys translates brand ethos into striking logos and systems that carry meaning, depth, and intention.</p>
                </div>
            </div>
        </section>
        
<!-- ======================================================================== -->
<!-- PARTNERS SECTION WITH SERVICE GRID (logos contained) -->
<!-- ======================================================================== -->
<section class="container pt-12">
  <h2 class="section-heading anim-reveal"><?php _e('Our Partners', 'auragrid'); ?></h2>
  <p class="text-center text-secondary anim-reveal anim-delay-1 mb-16" style="max-width: 70ch; margin-inline: auto;">
    <?php _e('Our network gives clients access to strategic advantages across media and distribution. As a true partner, not just a vendor, we unlock exclusive opportunities.', 'auragrid'); ?>
  </p>

  <div class="services-grid">
    <!-- Partner 1 -->
    <div class="service-category text-center anim-reveal anim-delay-1">
      <div class="logo-box">
        <img src="https://casestudy-labs.com/wp-content/uploads/2025/06/cannabuffa-logo-scaled.png"
             alt="Cannabuff Logo" class="logo-grid-img" loading="lazy">
      </div>
      <h4 class="service-title mt-6">Editorial</h4>
      <p class="service-text">Collaborating with WNY’s definitive voice on cannabis, giving clients preferred editorial access.</p>
    </div>

    <!-- Partner 2 -->
    <div class="service-category text-center anim-reveal anim-delay-2">
      <div class="logo-box">
        <img src="https://casestudy-labs.com/wp-content/uploads/2025/07/the-otherAsset-1@4x.png"
             alt="The Other Magazines Logo" class="logo-grid-img" loading="lazy">
      </div>
      <h4 class="service-title mt-6">Editorial</h4>
      <p class="service-text">Clients gain access to influential editorial channels and deeply engaged audiences across NYS.</p>
    </div>

    <!-- Partner 3 -->
    <div class="service-category text-center anim-reveal anim-delay-3">
      <div class="logo-box">
        <img src="https://casestudy-labs.com/wp-content/uploads/2025/06/AmplifiedLogo-002.png"
             alt="Amplified Media Logo" class="logo-grid-img" loading="lazy">
      </div>
      <h4 class="service-title mt-6">Paid Media</h4>
      <p class="service-text">Access to compliant advertising, including geofencing, native content, and homepage takeovers.</p>
    </div>
  </div>
</section>

        <!-- ======================================================================== -->
        <!-- SERVICES (pulls child pages of the Services parent) -->
        <!-- ======================================================================== -->
        <?php
        // Try to resolve the Services parent by slug first; fall back to ID 20 if needed.
        $services_parent = get_page_by_path( 'services' );
        $services_parent_id = $services_parent ? $services_parent->ID : 20;

        // Query up to 6 child pages of Services, ordered by menu order.
        $services = new WP_Query([
            'post_type'      => 'page',
            'posts_per_page' => 6,
            'post_parent'    => $services_parent_id,
            'orderby'        => 'menu_order',
            'order'          => 'ASC',
            'no_found_rows'  => true,
        ]);
        ?>

        <section id="services" class="container">
            <h2 class="section-heading anim-reveal">
                <?php echo esc_html( get_theme_mod( 'csl_services_heading', __( 'Capabilities', 'auragrid' ) ) ); ?>
            </h2>

            <div class="services-grid">
                <?php if ( $services->have_posts() ) :
                    $i = 0;
                    while ( $services->have_posts() ) : $services->the_post(); $i++; ?>
                        <a href="<?php the_permalink(); ?>" class="service-card-link anim-reveal" style="--stagger-index:<?php echo esc_attr( $i ); ?>">
                            <div class="service-category glass-medium">
                                <div class="service-header">
                                    <span class="service-icon">■</span>
                                    <h3 class="service-title"><?php the_title(); ?></h3>
                                </div>
                                <p class="service-text"><?php echo esc_html( get_the_excerpt() ); ?></p>
                            </div>
                        </a>
                    <?php endwhile; wp_reset_postdata();
                else : ?>
                    <div class="glass-panel anim-reveal">
                        <p class="text-center text-secondary"><?php esc_html_e( 'Service details coming soon.', 'auragrid' ); ?></p>
                    </div>
                <?php endif; ?>
            </div>

            <div class="text-center mt-3">
                <a href="<?php echo esc_url( get_permalink( $services_parent_id ) ); ?>" class="btn">
                    <?php esc_html_e( 'View All Services', 'auragrid' ); ?>
                </a>
            </div>
        </section>

        <!-- ======================================================================== -->
        <!-- CLIENT FIT -->
        <!-- ======================================================================== -->
        <section class="container-narrow client-fit--about">
            <h2 class="section-heading anim-reveal">
                <?php echo esc_html( get_theme_mod( 'csl_about_client_fit_heading', __( 'Are We A Good Fit?', 'auragrid' ) ) ); ?>
            </h2>

        <p class="text-center anim-reveal">
    <?php echo esc_html( get_theme_mod( 'csl_about_client_fit_subheading', __( 'We collaborate with founders who value transparency, quality, and long-term partnership.', 'auragrid' ) ) ); ?>
  </p>

  <?php
    echo wp_kses_post( get_theme_mod(
      'csl_about_client_fit_table_html',
      '<div class="glass-table-container glass-realistic anim-reveal client-fit-table--about">
        <table class="glass-table">
          <thead>
            <tr><th>You Are…</th><th>We Provide…</th></tr>
          </thead>
          <tbody>
            <tr><td>An ambitious founder who wants a partner, not a vendor.</td><td>A dedicated senior team that ships and communicates clearly.</td></tr>
            <tr><td>Focused on outcomes and willing to invest in doing it right.</td><td>Transparent roadmaps, clear pricing, and measurable results.</td></tr>
            <tr><td>Passionate about quality and brand consistency.</td><td>Pixel-perfect execution, documentation, and maintainable systems.</td></tr>
          </tbody>
        </table>
      </div>'
    ) );
  ?>
</section>

        <!-- ======================================================================== -->
        <!-- BRANDS SECTION w/LOGO GRID -->
        <!-- ======================================================================== -->
        <section class="container-narrow">
            <h2 class="section-heading anim-reveal"><?php _e("Brands We've Worked With", 'auragrid'); ?></h2>
            <div class="glass-panel anim-reveal" style="transition-delay: 0.1s; margin-top: 3rem;">
                <div class="logo-grid">
                    <img src="http://casestudy-labs.com/wp-content/uploads/2025/07/stock-x-logo.png" alt="StockX Logo">
                    <img src="http://casestudy-labs.com/wp-content/uploads/2025/06/Sensi_Word-mark_FINAL.png" alt="Sensi Magazine Logo">
                    <img src="http://casestudy-labs.com/wp-content/uploads/2025/06/logo_ontherevel_black.png" alt="On the Revel Logo">
                    <img src="http://casestudy-labs.com/wp-content/uploads/2025/06/cannabuffa-logo-scaled.png" alt="Cannabuffa Logo">
                    <img src="http://casestudy-labs.com/wp-content/uploads/2025/06/atc-logoAsset-5@3x.png" alt="All That Chocolate Logo">
                    <img src="http://casestudy-labs.com/wp-content/uploads/2025/06/cbk-logo.png" alt="CBK Logo">
                    <img src="http://casestudy-labs.com/wp-content/uploads/2025/07/RR-BLACK.png" alt="Rhytm and Roots Logo">
                    <img src="http://casestudy-labs.com/wp-content/uploads/2025/06/EAT-OFF-ART-LOGOTYPEAsset-5@2x.png" alt="Eat Off Art Logo">
                    <img src="http://casestudy-labs.com/wp-content/uploads/2025/07/Full-Logo-Black.png" alt="Most Alive Logo">
                    <img src="http://casestudy-labs.com/wp-content/uploads/2025/07/bcn-summer-event-sticker-2@3x.png" alt="Buffalo Cannabis Network Logo">
                    <img src="http://casestudy-labs.com/wp-content/uploads/2025/06/SKYWORLD-LOGO-BLK-TRANSPARENT.png" alt="Skywolrd Cannabis Logo">
                    <img src="http://casestudy-labs.com/wp-content/uploads/2025/07/1280px-Dunkin_logo.svg_.png" alt="Dunkin' Logo">

                </div>
            </div>
        </section>
        
                <!-- ======================================================================== -->
        <!-- FINAL CTA -->
        <!-- ======================================================================== -->
        <section class="container text-center">
            <div class="anim-reveal">
                <h2 class="h3 mb-3">
                    <?php echo esc_html( get_theme_mod( 'csl_final_cta_heading', __( 'Ready to Build the Future?', 'auragrid' ) ) ); ?>
                </h2>

                <div class="final-cta-group">
                    <a href="<?php echo esc_url( get_theme_mod( 'csl_final_cta_cta1_link', '/contact' ) ); ?>" class="btn">
                        <?php echo esc_html( get_theme_mod( 'csl_final_cta_cta1_text', __( 'Start a Project', 'auragrid' ) ) ); ?>
                    </a>
                    <a href="<?php echo esc_url( get_theme_mod( 'csl_final_cta_cta2_link', 'https://calendar.app.google/8ufVU6SrrLy9MS8Q7' ) ); ?>" class="btn btn-accent" target="_blank" rel="noopener">
                        <?php echo esc_html( get_theme_mod( 'csl_final_cta_cta2_text', __( 'Book a Discovery Call', 'auragrid' ) ) ); ?>
                    </a>
                </div>
            </div>
        </section>

     

    </article>

</main>

<?php get_footer(); ?>