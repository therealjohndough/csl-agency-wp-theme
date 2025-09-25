<?php
/**
 * archive-casestudy.php
 * Template for displaying the case study archive.
 */
get_header(); 

// Get customizer settings for under construction hero
$show_construction_hero = get_theme_mod('csl_construction_hero_enabled', false);
$construction_title = get_theme_mod('csl_construction_hero_title', 'Under Construction');
$construction_subtitle = get_theme_mod('csl_construction_hero_subtitle', 'Coming Soon');
$construction_description = get_theme_mod('csl_construction_hero_description', 'We\'re working hard to bring you something amazing. Check back soon!');
$construction_cta_text = get_theme_mod('csl_construction_hero_cta_text', 'Get Notified');
$construction_cta_url = get_theme_mod('csl_construction_hero_cta_url', '#');
$construction_bg_color = get_theme_mod('csl_construction_hero_bg_color', '#1a1a1a');
$construction_text_color = get_theme_mod('csl_construction_hero_text_color', '#ffffff');
?>

<main id="main-content">
  <?php if ($show_construction_hero) : ?>
    <!-- Under Construction Hero Section -->
    <div class="construction-hero" style="
      background-color: <?php echo esc_attr($construction_bg_color); ?>;
      color: <?php echo esc_attr($construction_text_color); ?>;
      padding: var(--spacing-section) 0;
      text-align: center;
      min-height: 50vh;
      display: flex;
      align-items: center;
      justify-content: center;
    ">
      <div class="container-narrow">
        <?php if ($construction_title) : ?>
          <h1 class="construction-title anim-reveal" style="
            font-size: clamp(2rem, 5vw, 4rem);
            margin-bottom: 1rem;
            font-weight: 700;
            letter-spacing: -0.02em;
          ">
            <?php echo esc_html($construction_title); ?>
          </h1>
        <?php endif; ?>
        
        <?php if ($construction_subtitle) : ?>
          <h2 class="construction-subtitle anim-reveal" style="
            font-size: clamp(1.25rem, 3vw, 2rem);
            margin-bottom: 2rem;
            opacity: 0.8;
            font-weight: 600;
            transition-delay: 0.1s;
          ">
            <?php echo esc_html($construction_subtitle); ?>
          </h2>
        <?php endif; ?>
        
        <?php if ($construction_description) : ?>
          <p class="construction-description anim-reveal" style="
            max-width: 60ch;
            margin: 0 auto 2.5rem;
            opacity: 0.7;
            font-size: 1.125rem;
            line-height: 1.6;
            transition-delay: 0.2s;
          ">
            <?php echo wp_kses_post($construction_description); ?>
          </p>
        <?php endif; ?>
        
        <?php if ($construction_cta_text && $construction_cta_url) : ?>
          <a href="<?php echo esc_url($construction_cta_url); ?>" 
             class="btn btn-primary construction-cta anim-reveal" 
             style="
               display: inline-block;
               padding: 1rem 2rem;
               background-color: var(--color-accent, #007cba);
               color: white;
               text-decoration: none;
               border-radius: 6px;
               font-weight: 600;
               transition: all 0.3s ease;
               transition-delay: 0.3s;
             "
             onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 10px 30px rgba(0,0,0,0.2)';"
             onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none';">
            <?php echo esc_html($construction_cta_text); ?>
          </a>
        <?php endif; ?>
      </div>
    </div>
    
    <!-- Separator -->
    <div style="height: 2rem; background: linear-gradient(to bottom, <?php echo esc_attr($construction_bg_color); ?>, transparent);"></div>
    
  <?php endif; ?>

  <!-- Original Content (only show if construction hero is disabled) -->
  <?php if (!$show_construction_hero) : ?>
    <div class="container-narrow text-center" style="padding-top: var(--spacing-section); padding-bottom: 4rem;">
      <h1 class="section-heading anim-reveal"><?php esc_html_e('Case Studies', 'auragrid'); ?></h1>
      <p class="anim-reveal" style="color: var(--color-text-secondary); max-width: 60ch; margin-inline: auto; transition-delay: 0.1s;">
        Results mean more than recognition. Explore by industry or project type.
      </p>
    </div>
  <?php endif; ?>

  <div class="container" style="padding-top: 0;">
    <?php if (!$show_construction_hero && have_posts()) : ?>
      <div class="project-grid">
        <?php while (have_posts()) : the_post(); ?>
          <article class="project-card anim-reveal" style="--stagger-index: 1;">
            <a href="<?php the_permalink(); ?>" class="card-link">
              <div class="card-image-wrapper">
                <?php
                // Display Post Tags as pills.
                $post_tags = get_the_tags();
                if (!empty($post_tags)) : ?>
                  <div class="term-pills-container">
                    <?php foreach ($post_tags as $tag) :
                      echo '<span class="term-pill">' . esc_html($tag->name) . '</span>';
                    endforeach; ?>
                  </div>
                <?php endif; ?>

                <?php if (has_post_thumbnail()) :
                  the_post_thumbnail('large');
                else : ?>
                  <img src="https://images.unsplash.com/photo-1511377142434-94649dd6a5ae?ixlib=rb-4.0.3&q=85&fm=jpg&crop=entropy&cs=srgb&w=1600" alt="Placeholder Image">
                <?php endif; ?>
              </div>
              <div class="card-content">
                <h3 class="card-title"><?php the_title(); ?></h3>
                <div class="card-excerpt"><?php the_excerpt(); ?></div>
              </div>
            </a>
          </article>
        <?php endwhile; ?>
      </div>
      <?php the_posts_pagination(); ?>
    <?php elseif (!$show_construction_hero) : ?>
      <div class="glass-panel text-center">
        <p><?php esc_html_e('No case studies have been published yet. Please check back soon.', 'auragrid'); ?></p>
      </div>
    <?php endif; ?>
  </div>
</main>

<?php get_footer(); ?>