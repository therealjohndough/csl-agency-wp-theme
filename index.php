<?php get_header(); ?>

<main id="main-content">

    <!-- ======================================================================== -->
    <!-- HERO SECTION -->
    <!-- ======================================================================== -->
    <section class="hero">
        <div class="hero-content anim-reveal">
            <?php $hero_headline = __('Where Taste Drives Growth.', 'csl-agency'); ?>
            <h1 class="headline" data-text="<?php echo esc_attr($hero_headline); ?>"><?php echo esc_html($hero_headline); ?></h1>

            <p class="hero-intro">
                <?php _e('Strategic design and brand elevation for cannabis and lifestyle leaders. We empower premium brands with creative that inspires culture, commands attention, and drives revenue.', 'csl-agency'); ?>
            </p>
            
            <div class="hero-cta-group" style="margin-top: 3rem;">
                <a href="<?php echo esc_url(home_url('/case-studies')); ?>" class="btn"><?php _e('See Our Work', 'csl-agency'); ?></a>
                <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-accent"><?php _e('Work With Us', 'csl-agency'); ?></a>
            </div>
        </div>
    </section>

    <!-- ======================================================================== -->
    <!-- WORK / CASE STUDIES SECTION -->
    <!-- ======================================================================== -->
    <section id="work" class="container">
        <h2 class="section-heading anim-reveal"><?php _e('Results, Not Just Recognition.', 'auragrid'); ?></h2>
        <p class="text-center anim-reveal" style="max-width: 650px; margin-inline: auto; margin-bottom: 4rem; color: var(--color-text-secondary); transition-delay: 0.1s;">
            <?php _e('We design brands that stand out, sell out, and stand the test of time. Here’s what happens when strategy, taste, and execution align.', 'auragrid'); ?>
        </p>
            
        <div class="project-grid">
            <?php for ($i = 1; $i <= 3; $i++): ?>
            <a href="<?php echo esc_url(home_url('/case-studies')); ?>" style="text-decoration: none; color: inherit; display: block;">
                <article class="project-card anim-reveal" style="--stagger-index: <?php echo $i; ?>;">
                    <div class="card-image-wrapper">
                        <img src="https://images.unsplash.com/photo-1620421680280-3b2b72442426?ixlib=rb-4.0.3&q=85&fm=jpg&crop=entropy&cs=srgb&w=1600" alt="<?php esc_attr_e('Project Thumbnail', 'auragrid'); ?>">
                    </div>
                    <div class="card-content">
                        <h3 class="card-title"><?php printf(esc_html__('Client Project %d', 'auragrid'), $i); ?></h3>
                        <p class="card-excerpt"><?php _e('A brief, compelling description of the project appears here, revealing key technologies or design choices.', 'auragrid'); ?></p>
                    </div>
                </article>
            </a>
            <?php endfor; ?>
        </div>

        <div class="text-center mt-3 anim-reveal" style="transition-delay: 0.2s;">
            <a href="<?php echo esc_url(home_url('/case-studies')); ?>" class="btn"><?php _e('View All Case Studies', 'auragrid'); ?></a>
        </div>
    </section>

    <!-- ======================================================================== -->
    <!-- MISSION (SPLIT) SECTION -->
    <!-- ======================================================================== -->
    <section id="mission" class="container">
         <div class="split-section">
            <div class="split-content anim-slide-left">
                <h2 class="h3 mb-2" style="text-transform: uppercase; color: var(--color-primary); letter-spacing: 0.1em;"><?php _e('Our Mission', 'auragrid'); ?></h2>
                <h3 class="h2 mb-2"><?php _e('Case Study Labs: Built to Inspire.', 'auragrid'); ?></h3>
                <p class="text-secondary"><?php _e('We’re not just a branding agency. We’re your strategic creative partner—trusted by category leaders and next-gen founders who demand more from their brand.', 'auragrid'); ?></p>
                <p><?php _e('Our mission is to elevate the creative standard in cannabis and emerging industries—one brand, one drop, one legacy at a time.', 'auragrid'); ?></p>
            </div>
            <div class="split-visual anim-slide-right">
                 <div class="glass-panel d-flex flex-column" style="display: flex; flex-direction: column; justify-content: center; align-items: center; gap: 1.5rem; text-align: center; min-height: 100%;">
                    <h4 class="h4"><?php _e('Explore The Studio', 'auragrid'); ?></h4>
                    <a href="<?php echo esc_url(home_url('/studio')); ?>" class="btn btn-glass"><?php _e('Learn About Us', 'auragrid'); ?></a>
                    <a href="<?php echo esc_url(home_url('/studio/cannabis-advertising-readiness-quiz/')); ?>" class="btn btn-accent"><?php _e('Cannabis Advertising Quiz', 'auragrid'); ?></a>
                </div>
            </div>
        </div>
    </section>

    <!-- ======================================================================== -->
    <!-- VISION & VALUES SECTION (Using Service Grid) -->
    <!-- ======================================================================== -->
    <section id="values" class="container">
        <h2 class="section-heading anim-reveal"><?php _e('Vision & Values', 'auragrid'); ?></h2>
        <p class="text-center anim-reveal" style="max-width: 650px; margin-inline: auto; margin-bottom: 4rem; color: var(--color-text-secondary); transition-delay: 0.1s;">
            <strong><?php _e('Vision:', 'auragrid'); ?></strong> <?php _e('To build a world-class creative agency and ecosystem that attracts innovative minds, A-1 operators, and iconic brands.', 'auragrid'); ?>
        </p>
        <div class="services-grid">
            <div class="service-category anim-reveal" style="--stagger-index: 1;"><div class="service-header"><h3 class="service-title"><?php _e('Taste is Strategy', 'auragrid'); ?></h3></div><p class="service-text"><?php _e('Design isn’t decoration—it’s direction.', 'auragrid'); ?></p></div>
            <div class="service-category anim-reveal" style="--stagger-index: 2;"><div class="service-header"><h3 class="service-title"><?php _e('Clarity is Currency', 'auragrid'); ?></h3></div><p class="service-text"><?php _e('Clear brands grow.', 'auragrid'); ?></p></div>
            <div class="service-category anim-reveal" style="--stagger-index: 3;"><div class="service-header"><h3 class="service-title"><?php _e('Collaboration Over Control', 'auragrid'); ?></h3></div><p class="service-text"><?php _e('We co-create, not babysit.', 'auragrid'); ?></p></div>
        </div>
    </section>

    <!-- ======================================================================== -->
    <!-- SERVICES SECTION -->
    <!-- ======================================================================== -->
    <section id="services" class="container">
        <h2 class="section-heading anim-reveal"><?php _e('Services', 'auragrid'); ?></h2>
        <div class="services-grid">
            <div class="service-category anim-reveal" style="--stagger-index: 1;">
                <div class="service-header">
                    <span class="service-icon" style="color: var(--color-primary);">■</span>
                    <h3 class="service-title"><?php _e('Premium Services', 'auragrid'); ?></h3>
                </div>
                <ul class="service-list">
                    <li class="service-item"><span class="service-bullet">></span><span class="service-text"><?php _e('Brand Positioning & Identity Systems', 'auragrid'); ?></span></li>
                    <li class="service-item"><span class="service-bullet">></span><span class="service-text"><?php _e('Product Drop Strategy & Storytelling', 'auragrid'); ?></span></li>
                    <li class="service-item"><span class="service-bullet">></span><span class="service-text"><?php _e('Creative Direction Retainers', 'auragrid'); ?></span></li>
                </ul>
            </div>
            <div class="service-category anim-reveal" style="--stagger-index: 2;">
                <div class="service-header">
                    <span class="service-icon" style="color: var(--color-accent);">■</span>
                    <h3 class="service-title"><?php _e('Modular Support', 'auragrid'); ?></h3>
                </div>
                 <ul class="service-list">
                    <li class="service-item"><span class="service-bullet">></span><span class="service-text"><?php _e('UI/UX & Web Development Sprints', 'auragrid'); ?></span></li>
                    <li class="service-item"><span class="service-bullet">></span><span class="service-text"><?php _e('Digital Tools & Templates', 'auragrid'); ?></span></li>
                </ul>
            </div>
        </div>
    </section>

    <!-- ======================================================================== -->
    <!-- CLIENT FIT (TABLE) SECTION -->
    <!-- ======================================================================== -->
    <section id="client-fit" class="container-narrow">
        <h2 class="section-heading anim-reveal"><?php _e('This Only Works If It’s Mutual.', 'auragrid'); ?></h2>
        <p class="text-center anim-reveal" style="max-width: 650px; margin-inline: auto; margin-bottom: 4rem; color: var(--color-text-secondary); transition-delay: 0.1s;">
            <?php _e('We collaborate with founders and teams who want to build legacy—not just chase hype.', 'auragrid'); ?>
        </p>

        <div class="glass-table-container anim-reveal" style="transition-delay: 0.2s;">
            <table class="glass-table">
                <thead>
                    <tr>
                        <th><?php _e('We Collaborate With Founders Who:', 'auragrid'); ?></th>
                        <th><?php _e('We Are Not A Good Fit For:', 'auragrid'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php _e('See design as a business multiplier', 'auragrid'); ?></td>
                        <td><?php _e('Micromanagers and design-by-committee', 'auragrid'); ?></td>
                    </tr>
                    <tr>
                        <td><?php _e('Value speed, taste, and strategy', 'auragrid'); ?></td>
                        <td><?php _e('“Just need a quick logo” shoppers', 'auragrid'); ?></td>
                    </tr>
                    <tr>
                        <td><?php _e('Want to build legacy—not just chase hype', 'auragrid'); ?></td>
                        <td><?php _e('Startups with no direction', 'auragrid'); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

    <!-- ======================================================================== -->
    <!-- FINAL CTA SECTION -->
    <!-- ======================================================================== -->
    <section id="contact" class="container text-center">
        <div class="anim-reveal">
            <h2 class="h3 mb-3"><?php _e('Ready To Build The Future?', 'auragrid'); ?></h2>
            <div class="final-cta-group">
                <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn"><?php _e('Start a Project', 'auragrid'); ?></a>
                <a href="<?php echo esc_url(home_url('/form/subscribe/')); ?>" class="btn btn-accent"><?php _e('Join Our Network', 'auragrid'); ?></a>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>