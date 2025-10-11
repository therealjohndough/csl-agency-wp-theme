<?php
/**
 * Template Name: Services Page (Updated SLAs & Pricing)
 *
 * @package Aura-Grid_Machina_Enhanced
 */

get_header(); ?>

<main id="main-content">

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        
        <!-- ============================================================= -->
        <!-- HERO -->
        <!-- ============================================================= -->
        <header class="container-narrow text-center" style="padding-top: var(--spacing-section); padding-bottom: var(--spacing-section-small);">
            <h1 class="section-heading anim-reveal"><?php _e('Our Services', 'auragrid'); ?></h1>
            <p class="anim-reveal" style="color: var(--color-text-secondary); max-width: 70ch; margin-inline: auto; transition-delay: 0.1s;">
                <?php _e('Whether you are an established brand or startup, Case Study Labs exists to give you access to best-in-class marketing services. Whatever your goals, let us help you exceed them.', 'auragrid'); ?>
            </p>
        </header>

        <!-- ============================================================= -->
        <!-- CORE CAPABILITIES GRID -->
        <!-- ============================================================= -->
        <section class="container">
            <h2 class="section-heading anim-reveal"><?php _e('Core Capabilities', 'auragrid'); ?></h2>
            <div class="services-grid" style="margin-top: 4rem;">
                <?php
                $services = [
                    'strategy' => [
                        'title' => 'Strategy',
                        'icon' => 'ph-target',
                        'description' => 'We build a digital playbook around what makes your business unique, helping you to leverage strengths and make a greater impact.'
                    ],
                    'branding-production' => [
                        'title' => 'Branding & Production',
                        'icon' => 'ph-pen-nib',
                        'description' => 'Combining creative insight and deft design, we develop a visual aesthetic to truly distinguish your brand and make it resonate.'
                    ],
                    'media-buying' => [
                        'title' => 'Media Buying',
                        'icon' => 'ph-megaphone',
                        'description' => 'We develop data-driven campaigns to target ideal touchpoints, ensuring the right people see the right message.'
                    ],
                    'web-design' => [
                        'title' => 'Web Design',
                        'icon' => 'ph-code',
                        'description' => 'Using UX-focused frameworks, we create an online journey designed to turn prospects into conversions.'
                    ],
                    'content-social' => [
                        'title' => 'Content & Social',
                        'icon' => 'ph-article',
                        'description' => 'Providing customized content and organic social curation, we leverage SEO insights to grow audiences through engagement.'
                    ],
                    'lifecycle-marketing' => [
                        'title' => 'Lifecycle Marketing',
                        'icon' => 'ph-graph',
                        'description' => 'We build lifecycle programs that drive revenue through segmentation, automation, and retargeting.'
                    ],
                ];
                $stagger_index = 0;
                foreach ($services as $slug => $details) :
                    $stagger_index++;
                    $service_url = home_url('/services/' . $slug . '/');
                    ?>
                    <a href="<?php echo esc_url($service_url); ?>" class="service-card-link anim-reveal" style="--stagger-index: <?php echo (int) $stagger_index; ?>;">
                        <div class="service-category glass-medium">
                            <div class="service-header">
                                <i class="ph <?php echo esc_attr($details['icon']); ?> service-icon" aria-hidden="true"></i>
                                <h3 class="service-title"><?php echo esc_html($details['title']); ?></h3>
                            </div>
                            <p class="service-text"><?php echo esc_html($details['description']); ?></p>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- ============================================================= -->
        <!-- SLA TABLE (FAST-TURN DELIVERABLES) -->
        <!-- ============================================================= -->
        <section class="container">
            <h2 class="section-heading anim-reveal"><?php _e('SLAs (by Request Type)', 'auragrid'); ?></h2>
            <p class="anim-reveal" style="max-width: 70ch; color: var(--color-text-secondary);">
                <?php _e('Default timelines assume clear briefs and approved content. Rush options available upon request.', 'auragrid'); ?>
            </p>

  <div class="glass-table-container anim-reveal" style="transition-delay: 0.1s; margin-top: 2.5rem;">
    <div class="table-scroll">
      <table class="glass-table table--responsive">
        <thead>
          <tr>
            <th><?php _e('Type', 'auragrid'); ?></th>
            <th><?php _e('Default SLA', 'auragrid'); ?></th>
            <th><?php _e('Included Revisions', 'auragrid'); ?></th>
            <th><?php _e('Output', 'auragrid'); ?></th>
            <th><?php _e('One-Off Price (Starting)', 'auragrid'); ?></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td data-label="Type"><?php _e('Social post set (3 sizes, 1 concept)', 'auragrid'); ?></td>
            <td data-label="Default SLA">2–3 biz days</td>
            <td data-label="Included Revisions">1 round</td>
            <td data-label="Output">PNG/JPG + source (PSD/AI)</td>
            <td data-label="One-Off Price (Starting)">$250</td>
          </tr>
          <tr>
            <td data-label="Type"><?php _e('Ad concepts (3)', 'auragrid'); ?></td>
            <td data-label="Default SLA">3–5 biz days</td>
            <td data-label="Included Revisions">1 round</td>
            <td data-label="Output">JPG/Keynote/Figma frames</td>
            <td data-label="One-Off Price (Starting)">$400</td>
          </tr>
          <tr>
            <td data-label="Type"><?php _e('Pitch deck (slides 1–10)', 'auragrid'); ?></td>
            <td data-label="Default SLA">4–7 biz days</td>
            <td data-label="Included Revisions">1 round</td>
            <td data-label="Output">Keynote/PPT + PDF</td>
            <td data-label="One-Off Price (Starting)">$1,200</td>
          </tr>
          <tr>
            <td data-label="Type"><?php _e('Packaging update (dieline in hand)', 'auragrid'); ?></td>
            <td data-label="Default SLA">5–7 biz days</td>
            <td data-label="Included Revisions">1 round</td>
            <td data-label="Output">Print-ready PDF + source</td>
            <td data-label="One-Off Price (Starting)">$750</td>
          </tr>
          <tr>
            <td data-label="Type"><?php _e('WordPress component (UI only)', 'auragrid'); ?></td>
            <td data-label="Default SLA">3–5 biz days</td>
            <td data-label="Included Revisions">1 round</td>
            <td data-label="Output">Figma or coded module</td>
            <td data-label="One-Off Price (Starting)">$600</td>
          </tr>
        </tbody>
      </table>
    </div> <!-- /.table-scroll -->
  </div> <!-- /.glass-table-container -->

  <p class="anim-reveal" style="margin-top: 1rem; color: var(--color-text-secondary);">
    <?php _e('20% BTC Discount. Larger scopes priced separately.', 'auragrid'); ?>
  </p>
</section>

        <!-- ============================================================= -->
        <!-- SERVICE TIERS (MONTHLY PROGRAMS) -->
        <!-- ============================================================= -->
       <section class="container">
  <h2 class="section-heading anim-reveal"><?php _e('Service Tiers & Pricing', 'auragrid'); ?></h2>

  <div class="glass-table-container anim-reveal" style="transition-delay: 0.1s; margin-top: 2.5rem;">
    <div class="table-scroll">
      <table class="glass-table table--responsive">
        <thead>
          <tr>
            <th><?php _e('Service Tier', 'auragrid'); ?></th>
            <th><?php _e('Target Audience', 'auragrid'); ?></th>
            <th><?php _e('Price Per Month', 'auragrid'); ?></th>
            <th><?php _e('Key Services', 'auragrid'); ?></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Launch</td>
            <td>Startups / ~$250k+ revenue</td>
            <td>$1,500 – $3,500</td>
            <td>Core SEO, content calendar, 2–4 emails/mo, local listings, analytics setup</td>
          </tr>
          <tr>
            <td>Growth</td>
            <td>$500k+ businesses</td>
            <td>$3,500 – $8,000</td>
            <td>SEO/SEM, weekly content, email automation, paid creative, social support</td>
          </tr>
          <tr>
            <td>Scale</td>
            <td>$1M+ organizations</td>
            <td>$8,000 – $20,000+</td>
            <td>Full-funnel strategy, CRO, advanced analytics, video/interactive, multi-channel orchestration</td>
          </tr>
        </tbody>
      </table>
    </div> <!-- /.table-scroll -->
  </div> <!-- /.glass-table-container -->
</section>


        <!-- ============================================================= -->
        <!-- FULL SERVICE CATALOG (ONE-OFF PRICING) -->
        <!-- ============================================================= -->
        <section class="container">
            <h2 class="section-heading anim-reveal"><?php _e('Service Catalog (One‑Off Pricing)', 'auragrid'); ?></h2>
            <div class="service-catalog grid" style="margin-top: 2rem; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.25rem;">

                <!-- Branding & Strategy -->
                <div class="catalog-card glass anim-reveal">
                    <h3 class="h4" style="margin-bottom: .5rem;">Branding & Strategy</h3>
                    <ul class="priced-list">
                        <li><strong>Brand workshop & audit</strong> — $2,500+</li>
                        <li><strong>Naming & messaging framework</strong> — $1,200+</li>
                        <li><strong>Visual identity system</strong> (logo, type, color, guidelines) — $3,500–$10,000</li>
                        <li><strong>Brand book / playbook</strong> — $5,000+</li>
                    </ul>
                </div>

                <!-- Design & Creative -->
                <div class="catalog-card glass anim-reveal">
                    <h3 class="h4" style="margin-bottom: .5rem;">Design & Creative</h3>
                    <ul class="priced-list">
                        <li><strong>Social campaign kit</strong> — $750+ (or via SLA table)</li>
                        <li><strong>Advertising concepts & variations</strong> — $400–$1,500</li>
                        <li><strong>Packaging design (new dieline)</strong> — $2,500+</li>
                        <li><strong>Pitch deck (10–30 slides)</strong> — $1,200–$4,500</li>
                        <li><strong>Collateral</strong> (one‑pager / brochure / poster) — $350–$1,500</li>
                    </ul>
                </div>

                <!-- Digital & Web -->
                <div class="catalog-card glass anim-reveal">
                    <h3 class="h4" style="margin-bottom: .5rem;">Digital & Web</h3>
                    <ul class="priced-list">
                        <li><strong>Custom WordPress theme</strong> — $6,000–$15,000</li>
                        <li><strong>E‑commerce setup</strong> (Woo/Shopify) — $4,500+</li>
                        <li><strong>Landing page / microsite</strong> — $1,500–$3,500</li>
                        <li><strong>UI/UX design system (Figma)</strong> — $3,000–$7,500</li>
                        <li><strong>Hosting & maintenance</strong> — $95–$495/mo</li>
                    </ul>
                </div>

                <!-- Marketing & Content -->
                <div class="catalog-card glass anim-reveal">
                    <h3 class="h4" style="margin-bottom: .5rem;">Marketing & Content</h3>
                    <ul class="priced-list">
                        <li><strong>SEO strategy & content plan</strong> — $2,500+</li>
                        <li><strong>Blog article</strong> (SEO‑optimized ~1,000 words) — $400 each</li>
                        <li><strong>Email campaign</strong> (design + setup) — $500 each</li>
                        <li><strong>Paid media creative package</strong> — $1,200+</li>
                    </ul>
                </div>

                <!-- Production & Media -->
                <div class="catalog-card glass anim-reveal">
                    <h3 class="h4" style="margin-bottom: .5rem;">Production & Media</h3>
                    <ul class="priced-list">
                        <li><strong>Creative direction</strong> — $1,500/day</li>
                        <li><strong>Photography (with partner)</strong> — $2,800+ per shoot</li>
                        <li><strong>Motion graphics / brand animation</strong> — $1,200–$3,500</li>
                    </ul>
                </div>

                <!-- Consulting & Ongoing -->
                <div class="catalog-card glass anim-reveal">
                    <h3 class="h4" style="margin-bottom: .5rem;">Consulting & Ongoing</h3>
                    <ul class="priced-list">
                        <li><strong>Fractional brand/digital strategy</strong> — $2,000+/mo</li>
                        <li><strong>Design Labs (SLA subscription)</strong> — $2,500–$5,000/mo</li>
                        <li><strong>Campaign launch & evaluation</strong> — $3,500+</li>
                    </ul>
                </div>

            </div>
        </section>

        <!-- ============================================================= -->
        <!-- OPTIONAL: NOTES / DISCLAIMERS -->
        <!-- ============================================================= -->
        <section class="container" style="padding-bottom: var(--spacing-section);">
            <div class="note-block anim-reveal" style="max-width: 70ch; color: var(--color-text-secondary);">
                <p><strong><?php _e('Notes:', 'auragrid'); ?></strong> <?php _e('Save 20% when you pay with BTC. Pricing represents typical starting points. Final quotes depend on complexity, integrations, and timelines. All prices in USD.', 'auragrid'); ?></p>
            </div>
        </section>

    </article>

</main><!-- #main-content -->

<?php get_footer(); ?>
