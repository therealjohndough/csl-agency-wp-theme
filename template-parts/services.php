<?php
/**
 * Template Name: Services Page
 *
 * @package Neo-Brutalist_Dynamic
 */

get_header(); ?>

<main id="primary" class="site-main">

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="page-header">
            <div class="container">
                <h1 class="entry-title section-heading anim-fade-in-up">Our Services</h1>
                <p class="section-subheading anim-fade-in-up" style="max-width: 800px;">
                    Whether you are an established brand or startup, Case Study Labs exists to give you access to best-in-class marketing services. Whatever your goals, let us help you exceed them.
                </p>
            </div>
        </header>

        <!-- Core Services Grid -->
        <section class="values-section" style="padding-top: 3rem;">
            <div class="container">
                <div class="values-grid anim-fade-in-up">
                    <div class="value-item"><h4>Strategy</h4><p>We build a digital playbook around what makes your business unique, helping you to leverage strengths and make greater impact within industry specific markets.</p></div>
                    <div class="value-item"><h4>Branding & Production</h4><p>Combining creative insight and deft design, we develop a visual aesthetic to truly distinguish your brand and make it resonate with target audiences.</p></div>
                    <div class="value-item"><h4>Media Buying</h4><p>We develop data-driven social campaigns to target your consumer’s ideal touch points, ensuring the right people are always met with the right message.</p></div>
                    <div class="value-item"><h4>Web Design</h4><p>Using UX focused frameworks and front-end aesthetic development, we create an online journey to turn your prospects into conversions.</p></div>
                    <div class="value-item"><h4>Content & Social</h4><p>Providing customized written content and organic social curation, we leverage SEO insights to grow your audiences through online engagement.</p></div>
                    <div class="value-item"><h4>Lifecycle Marketing</h4><p>Creating a consumer lifecycle game plan based on your brand and audiences, we drive massive revenue through comprehensive growth and re-targeting strategies.</p></div>
                </div>
            </div>
        </section>

        <!-- Service Tiers Table -->
        <section class="service-tiers-section">
            <div class="container">
                <h2 class="section-heading anim-fade-in-up">Service Tiers & Pricing</h2>
                <div class="table-wrapper anim-fade-in-up">
                    <table>
                        <thead>
                            <tr>
                                <th>Service Tier</th>
                                <th>Target Audience</th>
                                <th>Price Per Month</th>
                                <th>Key Services</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Basic Digital Marketing</td>
                                <td>Startups and $250k+</td>
                                <td>$500 - $2,000</td>
                                <td>Basic SEO, Content Marketing, Email Newsletters, Local Listings, Basic Analytics</td>
                            </tr>
                            <tr>
                                <td>Advanced Digital Marketing</td>
                                <td>$500k+ Businesses</td>
                                <td>$2,000 - $5,000</td>
                                <td>Advanced SEO/SEM, Frequent Content, Email Automation, Social Media Support, Basic Video Marketing</td>
                            </tr>
                            <tr>
                                <td>Premium Full-Service</td>
                                <td>Large Enterprises $1m+</td>
                                <td>$5,000 - $20,000+</td>
                                <td>Comprehensive SEO/SEM, High-Quality Content, Full Social Media Management, Advanced Video/Interactive Media</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

    </article>

</main>

<?php get_footer(); ?>