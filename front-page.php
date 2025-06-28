<?php get_header(); ?>

<main>
    <!-- HERO SECTION -->
    <section class="hero">
        <div class="hero-content fade-in-up">
            <!-- ACF: Hero Headline -->
            <h1 class="headline">Where Taste Drives Growth.</h1>
            
            <!-- ACF: Hero Subheading -->
            <p class="hero-subheading" style="font-size: var(--fs-h3); line-height: 1.3;">Strategic design and brand elevation for cannabis and lifestyle leaders.</p>

            <!-- ACF: Hero Introduction Paragraph -->
            <p class="hero-intro">We empower premium cannabis and lifestyle brands with creative that inspires culture, commands attention, and drives revenue.</p>

            <!-- ACF: Hero Tagline -->
            <p class="hero-tagline">Clarity is currency. Taste is strategy. Growth is the outcome.</p>
            
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

    <!-- WORK / CASE STUDIES SECTION (Placeholder) -->
    <section id="work" class="projects-section">
        <div class="container">
            <h2 class="section-heading fade-in-up">Results, Not Just Recognition.</h2>
            <p class="section-subheading fade-in-up">We design brands that stand out, sell out, and stand the test of time. Here’s what happens when strategy, taste, and execution align.</p>
            
            <!-- ACF: Project Grid (using a WP_Query loop) -->
            <div class="project-grid">
                <?php for ($i = 1; $i <= 3; $i++): ?>
                <article class="project-card fade-in-up">
                    <a href="#" class="card-link-wrapper">
                        <div class="card-image-wrapper"><img src="https://picsum.photos/800/600?random=<?php echo $i; ?>" alt="Project Thumbnail"></div>
                        <div class="card-content">
                            <h3 class="card-title">Client Project <?php echo $i; ?></h3>
                            <p class="card-excerpt">A brief, compelling description of the project appears on hover, revealing key technologies or design choices.</p>
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
            <!-- ACF: Mission Heading -->
            <h2 class="section-heading fade-in-up">Case Study Labs: Built to Inspire.</h2>
            <div class="mission-content fade-in-up">
                <!-- ACF: Mission Paragraph 1 -->
                <p>We’re not just a branding agency. We’re your strategic creative partner—trusted by category leaders and next-gen founders who demand more from their brand.</p>
                <!-- ACF: Mission Paragraph 2 -->
                <p>Our mission is to elevate the creative standard in cannabis and emerging industries—one brand, one drop, one legacy at a time.</p>
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
            <!-- ACF: Values Heading -->
            <h2 class="section-heading fade-in-up">Vision &amp; Values</h2>
            
            <!-- ACF: Vision Statement -->
            <p class="section-subheading fade-in-up"><strong>Vision:</strong> To build a world-class creative agency and ecosystem that attracts innovative minds, A-1 operators, and iconic brands.</p>

            <div class="values-grid fade-in-up">
                <!-- Use an ACF Repeater field for these values -->
                <div class="value-item"><h4>Taste is Strategy</h4><p>Design isn’t decoration—it’s direction.</p></div>
                <div class="value-item"><h4>Clarity is Currency</h4><p>Clear brands grow.</p></div>
                <div class="value-item"><h4>Collaboration Over Control</h4><p>We co-create, not babysit.</p></div>
                <div class="value-item"><h4>Mutual Respect or Mutual Exit</h4><p>No micromanagers.</p></div>
                <div class="value-item"><h4>Efficiency Over Ego</h4><p>We move with purpose.</p></div>
                <div class="value-item"><h4>Community > Competition</h4><p>We’re building something bigger.</p></div>
            </div>
        </div>
    </section>

    <!-- SERVICES SECTION -->
    <section id="services" class="services-section">
        <div class="container">
            <h2 class="section-heading fade-in-up">Services</h2>
            <div class="services-grid fade-in-up">
                <!-- ACF: Column 1 - Premium Services -->
                <div class="service-column">
                    <h3>🔥 Premium Services</h3>
                    <ul class="service-list">
                        <li>Brand Positioning & Identity Systems</li>
                        <li>Product Drop Strategy & Storytelling</li>
                        <li>Creative Direction Retainers</li>
                    </ul>
                </div>
                <!-- ACF: Column 2 - Modular Support -->
                <div class="service-column">
                    <h3>⚡️ Modular Support</h3>
                    <ul class="service-list">
                        <li>Consulting Sprints</li>
                        <li>Digital Tools & Templates</li>
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
            <h2 class="section-heading fade-in-up">This Only Works If It’s Mutual.</h2>
            <p class="section-subheading fade-in-up">We collaborate with founders and teams who want to build legacy—not just chase hype.</p>

            <div class="client-profile-grid fade-in-up">
                <!-- ACF: "We work with" list -->
                <div class="profile-dos-column">
                    <h4>We collaborate with founders who:</h4>
                    <ul class="profile-list profile-dos">
                        <li>See design as a business multiplier</li>
                        <li>Value speed, taste, and strategy</li>
                        <li>Want to build legacy—not just chase hype</li>
                    </ul>
                </div>
                <!-- ACF: "We don't do" list -->
                <div class="profile-donts-column">
                    <h4>We don’t do:</h4>
                    <ul class="profile-list profile-donts">
                        <li>Micromanagers</li>
                        <li>“Just need a quick logo” shoppers</li>
                        <li>Startups with 5 decision-makers and no direction</li>
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