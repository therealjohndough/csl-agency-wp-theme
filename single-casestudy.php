<?php
/**
 * single-casestudy.php
 * Redesigned template with TE aesthetic and better readability
 */
get_header(); ?>

<main id="main-content" class="single-casestudy">
  <?php while (have_posts()) : the_post(); ?>
    
    <!-- Minimal Hero Section -->
    <header class="case-hero-minimal">
      <div class="container-narrow">
        <div class="case-meta">
          <?php
          $post_tags = get_the_tags();
          if (!empty($post_tags)) :
            foreach (array_slice($post_tags, 0, 2) as $tag) :
          ?>
            <span class="case-tag"><?php echo esc_html($tag->name); ?></span>
          <?php 
            endforeach;
          endif; 
          ?>
        </div>
        <h1 class="case-title-minimal"><?php the_title(); ?></h1>
        <?php if (has_excerpt()) : ?>
          <p class="case-subtitle"><?php the_excerpt(); ?></p>
        <?php endif; ?>
      </div>
    </header>

    <!-- Project Stats Grid -->
    <section class="project-stats">
      <div class="container">
        <div class="stats-grid">
          <?php if ($client = get_field('client_name')) : ?>
            <div class="stat-item">
              <div class="stat-label">CLIENT</div>
              <div class="stat-value"><?php echo esc_html($client); ?></div>
            </div>
          <?php endif; ?>
          
          <?php if ($year = get_field('project_year')) : ?>
            <div class="stat-item">
              <div class="stat-label">YEAR</div>
              <div class="stat-value"><?php echo esc_html($year); ?></div>
            </div>
          <?php endif; ?>
          
          <?php if ($url = get_field('project_url')) : ?>
            <div class="stat-item">
              <div class="stat-label">LIVE SITE</div>
              <div class="stat-value">
                <a href="<?php echo esc_url($url); ?>" target="_blank" class="stat-link">
                  VIEW SITE ↗
                </a>
              </div>
            </div>
          <?php endif; ?>
          
          <div class="stat-item">
            <div class="stat-label">SERVICES</div>
            <div class="stat-value">
              <?php
              if (!empty($post_tags)) :
                $service_tags = array_slice($post_tags, 0, 3);
                echo esc_html(implode(' / ', array_map(function($tag) { return $tag->name; }, $service_tags)));
              endif;
              ?>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Content Sections -->
    <div class="container">
      <div class="content-sections">
        
        <!-- Brief Section -->
        <?php 
        $brief = get_field('the_brief') ?: get_field('the_challenge');
        if ($brief) : ?>
          <section class="content-block brief-block">
            <div class="content-grid">
              <div class="content-header">
                <div class="section-number">01</div>
                <h2 class="section-title">THE BRIEF</h2>
              </div>
              <div class="content-body">
                <?php echo wp_kses_post($brief); ?>
              </div>
            </div>
          </section>
        <?php endif; ?>

        <!-- Deliverable Section -->
        <?php 
        $deliverable = get_field('the_deliverable') ?: get_field('our_solution');
        if ($deliverable) : ?>
          <section class="content-block deliverable-block">
            <div class="content-grid">
              <div class="content-header">
                <div class="section-number">02</div>
                <h2 class="section-title">THE DELIVERABLE</h2>
              </div>
              <div class="content-body">
                <?php echo wp_kses_post($deliverable); ?>
              </div>
            </div>
          </section>
        <?php endif; ?>

        <!-- Strategic Audit Document Section -->
        <?php 
        $strategic_audit = get_field('strategic_audit_document');
        if ($strategic_audit) : ?>
          <section class="content-block audit-document-block">
            <div class="content-grid">
              <div class="content-header">
                <div class="section-number">03</div>
                <h2 class="section-title">STRATEGIC AUDIT DOCUMENT</h2>
              </div>
              <div class="content-body">
                <?php echo $strategic_audit; ?>
              </div>
            </div>
          </section>
        <?php endif; ?>

        <!-- Gallery Section -->
        <?php if ($gallery = get_field('project_gallery')) : ?>
          <section class="content-block gallery-block">
            <div class="content-grid">
              <div class="content-header">
                <div class="section-number">04</div>
                <h2 class="section-title">PROJECT GALLERY</h2>
              </div>
              <div class="content-body">
                <div class="te-gallery">
                  <?php foreach ($gallery as $index => $image) : ?>
                    <div class="gallery-item" data-index="<?php echo $index; ?>">
                      <img src="<?php echo esc_url($image['sizes']['large']); ?>" 
                           alt="<?php echo esc_attr($image['alt']); ?>"
                           loading="lazy">
                      <?php if ($image['caption']) : ?>
                        <div class="gallery-caption"><?php echo esc_html($image['caption']); ?></div>
                      <?php endif; ?>
                    </div>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
          </section>
        <?php endif; ?>

        <!-- Additional Content -->
        <?php if (get_the_content()) : ?>
          <section class="content-block details-block">
            <div class="content-grid">
              <div class="content-header">
                <div class="section-number">05</div>
                <h2 class="section-title">PROJECT DETAILS</h2>
              </div>
              <div class="content-body additional-content">
                <?php the_content(); ?>
              </div>
            </div>
          </section>
        <?php endif; ?>

      </div>
    </div>

    <!-- CTA Section -->
    <section class="case-cta">
      <div class="container-narrow">
        <div class="cta-content">
          <h3 class="cta-title">READY TO START YOUR PROJECT?</h3>
          <p class="cta-text">Let's create something that moves your audience and drives results.</p>
          <div class="cta-buttons">
            <a href="/contact" class="btn btn-accent">START A PROJECT</a>
            <a href="/case-studies" class="btn btn-secondary">VIEW MORE WORK</a>
          </div>
        </div>
      </div>
    </section>

  <?php endwhile; ?>
</main>

<style>
/* ========================================
   SINGLE CASE STUDY - TE DESIGN
   ======================================== */

.single-casestudy {
  background: var(--te-bg-primary);
  color: var(--te-text-primary);
  font-family: var(--font-primary);
}

/* Hero Section */
.case-hero-minimal {
  padding: 4rem 0 2rem;
  text-align: center;
}

.case-meta {
  display: flex;
  justify-content: center;
  gap: 1rem;
  margin-bottom: 2rem;
}

.case-tag {
  background: var(--te-accent-orange);
  color: white;
  padding: 0.5rem 1rem;
  border-radius: 3px;
  font-size: 0.7rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.1em;
}

.case-title-minimal {
  font-size: clamp(2rem, 5vw, 4rem);
  font-weight: 700;
  color: var(--te-text-primary);
  margin-bottom: 1rem;
  text-transform: uppercase;
  letter-spacing: 0.02em;
}

.case-subtitle {
  font-size: 1.2rem;
  color: var(--te-text-secondary);
  max-width: 60ch;
  margin: 0 auto;
  line-height: 1.6;
}

/* Project Stats Grid */
.project-stats {
  padding: 3rem 0;
  background: rgba(23, 23, 23, 0.9);
  border-top: 1px solid rgba(255, 255, 255, 0.1);
  border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.stats-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
  gap: 2rem;
}

.stat-item {
  text-align: center;
}

.stat-label {
  font-size: 0.7rem;
  font-weight: 600;
  color: var(--te-text-muted);
  text-transform: uppercase;
  letter-spacing: 0.15em;
  margin-bottom: 0.5rem;
}

.stat-value {
  font-size: 1rem;
  font-weight: 500;
  color: var(--te-text-primary);
}

.stat-link {
  color: var(--te-accent-orange);
  text-decoration: none;
  font-weight: 600;
  transition: color 0.2s ease;
}

.stat-link:hover {
  color: #ff5722;
}

/* Content Sections */
.content-sections {
  padding: 4rem 0;
}

.content-block {
  margin-bottom: 4rem;
  background: rgba(23, 23, 23, 0.8);
  border: 1px solid rgba(255, 255, 255, 0.1);
  border-radius: 8px;
  padding: 3rem;
  backdrop-filter: blur(10px);
}

.content-grid {
  display: grid;
  grid-template-columns: 200px 1fr;
  gap: 3rem;
  align-items: start;
}

.content-header {
  position: sticky;
  top: 2rem;
}

.section-number {
  font-size: 3rem;
  font-weight: 800;
  color: var(--te-accent-orange);
  line-height: 1;
  margin-bottom: 1rem;
}

.section-title {
  font-size: 0.8rem;
  font-weight: 600;
  color: var(--te-text-primary);
  text-transform: uppercase;
  letter-spacing: 0.15em;
  line-height: 1.4;
}

.content-body {
  color: var(--te-text-primary);
  font-size: 1.1rem;
  line-height: 1.7;
}

.content-body p {
  margin-bottom: 1.5rem;
  color: var(--te-text-primary);
}

.content-body h3 {
  color: var(--te-text-primary);
  margin-bottom: 1rem;
  margin-top: 2rem;
}

/* Audit Document Block Specific Styles */
.audit-document-block {
  background: #ffffff;
  border: 2px solid var(--te-accent-orange);
  position: relative;
  color: #333;
}

.audit-document-block .content-body {
  color: #333;
}

.audit-document-block .audit-intro h3 {
  color: var(--te-accent-orange);
  font-size: 1.5rem;
  font-weight: 700;
  margin-bottom: 1rem;
  text-transform: uppercase;
  letter-spacing: 0.02em;
}

.audit-document-block .audit-intro p {
  color: #555;
  font-size: 1.1rem;
  line-height: 1.6;
}

.audit-document-block .audit-highlights {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 1rem;
  margin: 2rem 0;
  padding: 2rem;
  background: #f8f9fa;
  border-radius: 6px;
  border-left: 4px solid var(--te-accent-orange);
}

.audit-document-block .highlight-item {
  padding: 1rem;
  background: #ffffff;
  border-radius: 4px;
  border: 1px solid #e9ecef;
  box-shadow: 0 2px 4px rgba(0,0,0,0.05);
}

.audit-document-block .highlight-item strong {
  color: var(--te-accent-orange);
  display: block;
  margin-bottom: 0.5rem;
  font-size: 0.9rem;
  text-transform: uppercase;
  letter-spacing: 0.05em;
}

.audit-document-block .flipbook-container {
  margin: 3rem 0;
  padding: 2rem;
  background: #f8f9fa;
  border-radius: 8px;
  border: 1px solid #dee2e6;
  min-height: 600px;
  display: flex;
  align-items: center;
  justify-content: center;
  position: relative;
}

.audit-document-block .flipbook-container::before {
  content: 'Interactive Audit Document';
  position: absolute;
  top: 1rem;
  left: 2rem;
  font-size: 0.8rem;
  color: #6c757d;
  text-transform: uppercase;
  letter-spacing: 0.1em;
  font-weight: 600;
}

.audit-document-block .audit-conclusion {
  margin-top: 2rem;
  padding: 2rem;
  background: #fff3cd;
  border-radius: 6px;
  border-left: 4px solid var(--te-accent-orange);
  border: 1px solid #ffeaa7;
}

.audit-document-block .audit-conclusion p {
  font-size: 1.1rem;
  line-height: 1.6;
  margin: 0;
  color: #333;
}

.audit-document-block .audit-conclusion strong {
  color: var(--te-accent-orange);
}

/* Featured Image within Content Flow */
.featured-image-block .featured-image-container {
  border-radius: 8px;
  overflow: hidden;
  box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
}

.featured-image-block .featured-image {
  width: 100%;
  height: auto;
  display: block;
}

/* Gallery */
.te-gallery {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 2rem;
}

.gallery-item {
  background: rgba(0, 0, 0, 0.3);
  border-radius: 6px;
  overflow: hidden;
  transition: transform 0.2s ease;
  cursor: pointer;
}

.gallery-item:hover {
  transform: translateY(-4px);
}

.gallery-item img {
  width: 100%;
  height: auto;
  display: block;
}

.gallery-caption {
  padding: 1rem;
  font-size: 0.9rem;
  color: var(--te-text-secondary);
  background: rgba(0, 0, 0, 0.5);
}

/* CTA Section */
.case-cta {
  padding: 4rem 0;
  background: rgba(23, 23, 23, 0.95);
  border-top: 1px solid rgba(255, 255, 255, 0.1);
  text-align: center;
}

.cta-title {
  font-size: 2rem;
  font-weight: 700;
  color: var(--te-text-primary);
  text-transform: uppercase;
  letter-spacing: 0.05em;
  margin-bottom: 1rem;
}

.cta-text {
  font-size: 1.1rem;
  color: var(--te-text-secondary);
  margin-bottom: 2rem;
  max-width: 50ch;
  margin-left: auto;
  margin-right: auto;
}

.cta-buttons {
  display: flex;
  gap: 1rem;
  justify-content: center;
  flex-wrap: wrap;
}

/* Responsive */
@media (max-width: 768px) {
  .content-grid {
    grid-template-columns: 1fr;
    gap: 1.5rem;
  }
  
  .content-header {
    position: static;
    text-align: center;
  }
  
  .section-number {
    font-size: 2rem;
  }
  
  .content-block {
    padding: 2rem 1.5rem;
  }
  
  .stats-grid {
    grid-template-columns: 1fr;
    gap: 1.5rem;
  }
  
  .te-gallery {
    grid-template-columns: 1fr;
  }
  
  .cta-buttons {
    flex-direction: column;
    align-items: center;
  }
  
  .cta-buttons .btn {
    width: 100%;
    max-width: 280px;
  }
  
  .audit-document-block .audit-highlights {
    grid-template-columns: 1fr;
    padding: 1.5rem;
  }
  
  .audit-document-block .flipbook-container {
    padding: 1rem;
    min-height: 500px;
  }
  
  .audit-document-block .audit-conclusion {
    padding: 1.5rem;
  }
}

/* Additional Content Styling */
.additional-content ul,
.additional-content ol {
  color: var(--te-text-primary);
  margin-bottom: 1.5rem;
}

.additional-content li {
  margin-bottom: 0.5rem;
  color: var(--te-text-primary);
}

.additional-content strong {
  color: var(--te-text-primary);
}

.additional-content a {
  color: var(--te-accent-orange);
  text-decoration: none;
}

.additional-content a:hover {
  color: #ff5722;
  text-decoration: underline;
}
</style>

<script>
// Simple gallery lightbox effect
document.addEventListener('DOMContentLoaded', function() {
  const galleryItems = document.querySelectorAll('.gallery-item');
  
  galleryItems.forEach(item => {
    item.addEventListener('click', function() {
      const img = this.querySelector('img');
      if (img) {
        // Simple zoom effect
        if (img.style.transform === 'scale(1.05)') {
          img.style.transform = 'scale(1)';
        } else {
          img.style.transform = 'scale(1.05)';
        }
      }
    });
  });
});
</script>

<?php get_footer(); ?>