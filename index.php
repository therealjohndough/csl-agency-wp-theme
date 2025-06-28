<?php get_header(); ?>

<main>
    <!-- HERO SECTION -->
    <section class="hero">
        <div class="hero-content">
            <!-- ACF: Hero Headline -->
            <h1 class="headline anim-fade-in-up"><?php _e('Where Taste Drives Growth.', 'neobrutalist'); ?></h1>
            
            <!-- ACF: Hero Subheading -->
            <p class="hero-subheading anim-fade-in-up" style="font-size: var(--fs-h3); line-height: 1.3; animation-delay: 0.1s;"><?php _e('Strategic design and brand elevation for cannabis and lifestyle leaders.', 'neobrutalist'); ?></p>

            <!-- ACF: Hero Introduction Paragraph -->
            <p class="hero-intro anim-fade-in-up" style="animation-delay: 0.2s;"><?php _e('We empower premium cannabis and lifestyle brands with creative that inspires culture, commands attention, and drives revenue.', 'neobrutalist'); ?></p>

            <!-- ACF: Hero Tagline -->
            <p class="hero-tagline anim-fade-in-up" style="animation-delay: 0.3s;"><?php _e('Clarity is currency. Taste is strategy. Growth is the outcome.', 'neobrutalist'); ?></p>
            
            <div class="hero-cta-group anim-fade-in-up" style="animation-delay: 0.4s;">
                <!-- ACF: Hero Button 1 -->
                <a href="<?php echo esc_url(home_url('/case-studies')); ?>" class="btn"><?php _e('See Our Work', 'neobrutalist'); ?></a>
                <!-- ACF: Hero Button 2 -->
                <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-secondary"><?php _e('Work With Us', 'neobrutalist'); ?></a>
            </div>
        </div>
        <div class="scroll-cue">
            <i class="ph-bold ph-arrow-down"></i>
        </div>
    </section>

    <!-- WORK / CASE STUDIES SECTION -->
    <section id="work" class="projects-section">
        <div class="container">
            <h2 class="section-heading anim-fade-in-up"><?php _e('Results, Not Just Recognition.', 'neobrutalist'); ?></h2>
            <p class="section-subheading anim-fade-in-up"><?php _e('We design brands that stand out, sell out, and stand the test of time. Here’s what happens when strategy, taste, and execution align.', 'neobrutalist'); ?></p>
            
            <div class="project-grid">
                <?php for ($i = 1; $i <= 3; $i++): ?>
                <article class="project-card anim-fade-in-up">
                    <a href="#" class="card-link-wrapper">
                        <div class="card-image-wrapper"><img src="https://picsum.photos/800/600?random=<?php echo $i; ?>" alt="<?php esc_attr_e('Project Thumbnail', 'neobrutalist'); ?>"></div>
                        <div class="card-content">
                            <h3 class="card-title"><?php printf(esc_html__('Client Project %d', 'neobrutalist'), $i); ?></h3>
                            <p class="card-excerpt"><?php _e('A brief, compelling description of the project appears on hover, revealing key technologies or design choices.', 'neobrutalist'); ?></p>
                        </div>
                    </a>
                </article>
                <?php endfor; ?>
            </div>
            <div class="section-cta-group anim-fade-in-up">
                <a href="/case-studies" class="btn"><?php _e('View Case Studies', 'neobrutalist'); ?></a>
                <a href="/form/cannabis-advertising-readiness-quiz/" class="btn btn-secondary"><?php _e('Dispensary Marketing', 'neobrutalist'); ?></a>
                <a href="/contact" class="btn btn-secondary"><?php _e('Start A Project', 'neobrutalist'); ?></a>
            </div>
        </div>
    </section>

    <!-- MISSION SECTION -->
    <section id="mission" class="mission-section">
        <div class="container">
            <h2 class="section-heading anim-fade-in-up"><?php _e('Case Study Labs: Built to Inspire.', 'neobrutalist'); ?></h2>
            <div class="mission-content anim-fade-in-up">
                <p><?php _e('We’re not just a branding agency. We’re your strategic creative partner—trusted by category leaders and next-gen founders who demand more from their brand.', 'neobrutalist'); ?></p>
                <p><?php _e('Our mission is to elevate the creative standard in cannabis and emerging industries—one brand, one drop, one legacy at a time.', 'neobrutalist'); ?></p>
            </div>
            <div class="section-cta-group anim-fade-in-up">
                <a href="/studio" class="btn"><?php _e('The Studio', 'neobrutalist'); ?></a>
                <a href="/studio/cannabis-advertising-readiness-quiz/" class="btn btn-secondary"><?php _e('Cannabis Advertising Quiz', 'neobrutalist'); ?></a>
            </div>
        </div>
    </section>

    <!-- VISION & VALUES SECTION -->
    <section id="values" class="values-section">
        <div class="container">
            <h2 class="section-heading anim-fade-in-up"><?php _e('Vision & Values', 'neobrutalist'); ?></h2>
            <p class="section-subheading anim-fade-in-up"><strong><?php _e('Vision:', 'neobrutalist'); ?></strong> <?php _e('To build a world-class creative agency and ecosystem that attracts innovative minds, A-1 operators, and iconic brands.', 'neobrutalist'); ?></p>
            <div class="values-grid anim-fade-in-up">
                <div class="value-item"><h4><?php _e('Taste is Strategy', 'neobrutalist'); ?></h4><p><?php _e('Design isn’t decoration—it’s direction.', 'neobrutalist'); ?></p></div>
                <div class="value-item"><h4><?php _e('Clarity is Currency', 'neobrutalist'); ?></h4><p><?php _e('Clear brands grow.', 'neobrutalist'); ?></p></div>
                <div class="value-item"><h4><?php _e('Collaboration Over Control', 'neobrutalist'); ?></h4><p><?php _e('We co-create, not babysit.', 'neobrutalist'); ?></p></div>
                <div class="value-item"><h4><?php _e('Mutual Respect or Mutual Exit', 'neobrutalist'); ?></h4><p><?php _e('No micromanagers.', 'neobrutalist'); ?></p></div>
                <div class="value-item"><h4><?php _e('Efficiency Over Ego', 'neobrutalist'); ?></h4><p><?php _e('We move with purpose.', 'neobrutalist'); ?></p></div>
                <div class="value-item"><h4><?php _e('Community > Competition', 'neobrutalist'); ?></h4><p><?php _e('We’re building something bigger.', 'neobrutalist'); ?></p></div>
            </div>
        </div>
    </section>

    <!-- SERVICES SECTION -->
    <section id="services" class="services-section">
        <div class="container">
            <h2 class="section-heading anim-fade-in-up"><?php _e('Services', 'neobrutalist'); ?></h2>
            <div class="services-grid anim-fade-in-up">
                <div class="service-column">
                    <h3><?php _e('🔥 Premium Services', 'neobrutalist'); ?></h3>
                    <ul class="service-list">
                        <li><?php _e('Brand Positioning & Identity Systems', 'neobrutalist'); ?></li>
                        <li><?php _e('Product Drop Strategy & Storytelling', 'neobrutalist'); ?></li>
                        <li><?php _e('Creative Direction Retainers', 'neobrutalist'); ?></li>
                    </ul>
                </div>
                <div class="service-column">
                    <h3><?php _e('⚡️ Modular Support', 'neobrutalist'); ?></h3>
                    <ul class="service-list">
                        <li><?php _e('Consulting Sprints', 'neobrutalist'); ?></li>
                        <li><?php _e('Digital Tools & Templates', 'neobrutalist'); ?></li>
                    </ul>
                </div>
            </div>
            <div class="section-cta-group anim-fade-in-up">
                <a href="#" class="btn"><?php _e('Book a Discovery Call', 'neobrutalist'); ?></a>
                <a href="/form/cannabis-advertising-readiness-quiz/" class="btn btn-secondary"><?php _e('Dispensary Marketing Packages', 'neobrutalist'); ?></a>
            </div>
        </div>
    </section>

    <!-- CLIENT FIT SECTION -->
    <section id="client-fit" class="client-fit-section">
        <div class="container">
            <h2 class="section-heading anim-fade-in-up"><?php _e('This Only Works If It’s Mutual.', 'neobrutalist'); ?></h2>
            <p class="section-subheading anim-fade-in-up"><?php _e('We collaborate with founders and teams who want to build legacy—not just chase hype.', 'neobrutalist'); ?></p>
            <div class="client-profile-grid anim-fade-in-up">
                <div class="profile-dos-column">
                    <h4><?php _e('We collaborate with founders who:', 'neobrutalist'); ?></h4>
                    <ul class="profile-list profile-dos">
                        <li><?php _e('See design as a business multiplier', 'neobrutalist'); ?></li>
                        <li><?php _e('Value speed, taste, and strategy', 'neobrutalist'); ?></li>
                        <li><?php _e('Want to build legacy—not just chase hype', 'neobrutalist'); ?></li>
                    </ul>
                </div>
                <div class="profile-donts-column">
                    <h4><?php _e('We don’t do:', 'neobrutalist'); ?></h4>
                    <ul class="profile-list profile-donts">
                        <li><?php _e('Micromanagers', 'neobrutalist'); ?></li>
                        <li><?php _e('“Just need a quick logo” shoppers', 'neobrutalist'); ?></li>
                        <li><?php _e('Startups with 5 decision-makers and no direction', 'neobrutalist'); ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- FINAL CTA SECTION -->
    <section id="contact" class="final-cta-section">
        <div class="container anim-fade-in-up">
            <div class="section-cta-group">
                <a href="/contact" class="btn"><?php _e('Start a Project', 'neobrutalist'); ?></a>
                <a href="/form/subscribe/" class="btn btn-secondary"><?php _e('Join Our Network', 'neobrutalist'); ?></a>
                <a href="/form/cannabis-advertising-readiness-quiz/" class="btn btn-secondary"><?php _e('Dispensary Marketing', 'neobrutalist'); ?></a>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>