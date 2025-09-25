<?php
/**
 * Customizer functionality for the Aura-Grid Machina Enhanced theme
 *
 * @package Aura-Grid_Machina_Enhanced
 */

/*--------------------------------------------------------------
# Front-Page Builder (Customizer)
--------------------------------------------------------------*/
add_action('customize_register', 'csl_frontpage_full_customizer');
function csl_frontpage_full_customizer($wp_customize) {
    // Add Front Page Sections Panel
    $wp_customize->add_panel('frontpage_sections_panel', array(
        'title' => __('Front Page Sections', 'auragrid'),
        'description' => __('Customize the content and visibility of homepage sections.', 'auragrid'),
        'priority' => 30,
    ));

    // Hero Section
    $wp_customize->add_section('hero_section', array(
        'title' => __('Hero Section', 'auragrid'),
        'panel' => 'frontpage_sections_panel',
        'priority' => 10,
    ));

    // Hero Section Controls
    $wp_customize->add_setting('csl_hero_show', array(
        'default' => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ));
    $wp_customize->add_control('csl_hero_show', array(
        'type' => 'checkbox',
        'section' => 'hero_section',
        'label' => __('Show Hero Section', 'auragrid'),
    ));

    $wp_customize->add_setting('csl_hero_headline', array(
        'default' => 'Made To Inspire',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('csl_hero_headline', array(
        'type' => 'text',
        'section' => 'hero_section',
        'label' => __('Headline', 'auragrid'),
    ));

    $wp_customize->add_setting('csl_hero_intro', array(
        'default' => 'We empower innovative brands with strategic design...',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('csl_hero_intro', array(
        'type' => 'textarea',
        'section' => 'hero_section',
        'label' => __('Intro Text', 'auragrid'),
    ));

    $wp_customize->add_setting('csl_hero_cta1_text', array(
        'default' => 'See Our Work',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('csl_hero_cta1_text', array(
        'type' => 'text',
        'section' => 'hero_section',
        'label' => __('CTA 1 Text', 'auragrid'),
    ));

    $wp_customize->add_setting('csl_hero_cta1_link', array(
        'default' => '#work',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('csl_hero_cta1_link', array(
        'type' => 'url',
        'section' => 'hero_section',
        'label' => __('CTA 1 Link', 'auragrid'),
    ));

    $wp_customize->add_setting('csl_hero_cta2_text', array(
        'default' => 'Start a Project',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('csl_hero_cta2_text', array(
        'type' => 'text',
        'section' => 'hero_section',
        'label' => __('CTA 2 Text', 'auragrid'),
    ));

    $wp_customize->add_setting('csl_hero_cta2_link', array(
        'default' => '/contact',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('csl_hero_cta2_link', array(
        'type' => 'url',
        'section' => 'hero_section',
        'label' => __('CTA 2 Link', 'auragrid'),
    ));

    // Work Section
    $wp_customize->add_section('work_section', array(
        'title' => __('Work Section', 'auragrid'),
        'panel' => 'frontpage_sections_panel',
        'priority' => 20,
    ));

    // Work Section Controls
    $wp_customize->add_setting('csl_work_show', array(
        'default' => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ));
    $wp_customize->add_control('csl_work_show', array(
        'type' => 'checkbox',
        'section' => 'work_section',
        'label' => __('Show Work Section', 'auragrid'),
    ));

    $wp_customize->add_setting('csl_work_heading', array(
        'default' => 'Case Studies',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('csl_work_heading', array(
        'type' => 'text',
        'section' => 'work_section',
        'label' => __('Heading', 'auragrid'),
    ));

    $wp_customize->add_setting('csl_work_subheading', array(
        'default' => 'We design brands and platforms...',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('csl_work_subheading', array(
        'type' => 'textarea',
        'section' => 'work_section',
        'label' => __('Subheading', 'auragrid'),
    ));

    // Get case studies for the dropdown
    $case_studies = get_posts(array(
        'post_type' => 'casestudy',
        'numberposts' => -1,
        'orderby' => 'title',
        'order' => 'ASC',
    ));
    
    $choices = array();
    foreach ($case_studies as $case_study) {
        $choices[$case_study->ID] = $case_study->post_title;
    }

    $wp_customize->add_setting('csl_work_featured_ids', array(
        'default' => array(),
        'sanitize_callback' => function($value) {
            if (is_array($value)) {
                return array_map('absint', $value);
            }
            return array();
        },
    ));
    
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'csl_work_featured_ids', array(
        'type' => 'select',
        'section' => 'work_section',
        'label' => __('Featured Case Studies', 'auragrid'),
        'choices' => $choices,
        'multiple' => true,
        'input_attrs' => array(
            'multiple' => 'multiple',
            'size' => 5,
        ),
    )));

    $wp_customize->add_setting('csl_work_fallback_count', array(
        'default' => 3,
        'sanitize_callback' => 'absint',
    ));
    $wp_customize->add_control('csl_work_fallback_count', array(
        'type' => 'number',
        'section' => 'work_section',
        'label' => __('Fallback Count (if no featured selected)', 'auragrid'),
        'input_attrs' => array(
            'min' => 1,
            'max' => 10,
        ),
    ));

    // Mission Section
    $wp_customize->add_section('mission_section', array(
        'title' => __('Mission Section', 'auragrid'),
        'panel' => 'frontpage_sections_panel',
        'priority' => 30,
    ));

    // Mission Section Controls
    $wp_customize->add_setting('csl_mission_show', array(
        'default' => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ));
    $wp_customize->add_control('csl_mission_show', array(
        'type' => 'checkbox',
        'section' => 'mission_section',
        'label' => __('Show Mission Section', 'auragrid'),
    ));

    $wp_customize->add_setting('csl_mission_tagline', array(
        'default' => 'Our Approach',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('csl_mission_tagline', array(
        'type' => 'text',
        'section' => 'mission_section',
        'label' => __('Tagline', 'auragrid'),
    ));

    $wp_customize->add_setting('csl_mission_heading', array(
        'default' => 'Strategic Creative Partners',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('csl_mission_heading', array(
        'type' => 'text',
        'section' => 'mission_section',
        'label' => __('Heading', 'auragrid'),
    ));

    $wp_customize->add_setting('csl_mission_paragraph1', array(
        'default' => 'We\'re not just a design agency...',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('csl_mission_paragraph1', array(
        'type' => 'textarea',
        'section' => 'mission_section',
        'label' => __('Paragraph 1', 'auragrid'),
    ));

    $wp_customize->add_setting('csl_mission_paragraph2', array(
        'default' => 'Our mission is...',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('csl_mission_paragraph2', array(
        'type' => 'textarea',
        'section' => 'mission_section',
        'label' => __('Paragraph 2', 'auragrid'),
    ));

    $wp_customize->add_setting('csl_mission_vision', array(
        'default' => 'To build a world-class creative ecosystem...',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('csl_mission_vision', array(
        'type' => 'textarea',
        'section' => 'mission_section',
        'label' => __('Vision (Quote)', 'auragrid'),
    ));

    // Services Section
    $wp_customize->add_section('services_section', array(
        'title' => __('Services Section', 'auragrid'),
        'panel' => 'frontpage_sections_panel',
        'priority' => 40,
    ));

    // Services Section Controls
    $wp_customize->add_setting('csl_services_show', array(
        'default' => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ));
    $wp_customize->add_control('csl_services_show', array(
        'type' => 'checkbox',
        'section' => 'services_section',
        'label' => __('Show Services Section', 'auragrid'),
    ));

    $wp_customize->add_setting('csl_services_heading', array(
        'default' => 'Capabilities',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('csl_services_heading', array(
        'type' => 'text',
        'section' => 'services_section',
        'label' => __('Heading', 'auragrid'),
    ));

    // Client Fit Section
    $wp_customize->add_section('client_fit_section', array(
        'title' => __('Client Fit Section', 'auragrid'),
        'panel' => 'frontpage_sections_panel',
        'priority' => 50,
    ));

    // Client Fit Section Controls
    $wp_customize->add_setting('csl_client_fit_show', array(
        'default' => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ));
    $wp_customize->add_control('csl_client_fit_show', array(
        'type' => 'checkbox',
        'section' => 'client_fit_section',
        'label' => __('Show Client Fit Section', 'auragrid'),
    ));

    $wp_customize->add_setting('csl_client_fit_heading', array(
        'default' => 'Are We A Good Fit?',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('csl_client_fit_heading', array(
        'type' => 'text',
        'section' => 'client_fit_section',
        'label' => __('Heading', 'auragrid'),
    ));

    $wp_customize->add_setting('csl_client_fit_subheading', array(
        'default' => 'We collaborate with founders...',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('csl_client_fit_subheading', array(
        'type' => 'textarea',
        'section' => 'client_fit_section',
        'label' => __('Subheading', 'auragrid'),
    ));

    $wp_customize->add_setting('csl_client_fit_table_html', array(
        'default' => '<div class="glass-table-container glass-realistic anim-reveal">
          <table class="glass-table">
            <thead><tr><th>You Are...</th><th>We Provide...</th></tr></thead>
            <tbody>
              <tr><td>An ambitious founder...</td><td>A dedicated team...</td></tr>
              <tr><td>Looking for a long-term partner...</td><td>A transparent...</td></tr>
              <tr><td>Passionate about quality...</td><td>Pixel-perfect execution...</td></tr>
            </tbody>
          </table>
        </div>',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control('csl_client_fit_table_html', array(
        'type' => 'textarea',
        'section' => 'client_fit_section',
        'label' => __('Table HTML', 'auragrid'),
        'description' => __('You can use HTML tags for the table structure.', 'auragrid'),
    ));

    // Final CTA Section
    $wp_customize->add_section('final_cta_section', array(
        'title' => __('Final CTA Section', 'auragrid'),
        'panel' => 'frontpage_sections_panel',
        'priority' => 60,
    ));

    // Final CTA Section Controls
    $wp_customize->add_setting('csl_final_cta_show', array(
        'default' => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ));
    $wp_customize->add_control('csl_final_cta_show', array(
        'type' => 'checkbox',
        'section' => 'final_cta_section',
        'label' => __('Show Final CTA Section', 'auragrid'),
    ));

    $wp_customize->add_setting('csl_final_cta_heading', array(
        'default' => 'Ready to Build the Future?',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('csl_final_cta_heading', array(
        'type' => 'text',
        'section' => 'final_cta_section',
        'label' => __('Heading', 'auragrid'),
    ));

    $wp_customize->add_setting('csl_final_cta_cta1_text', array(
        'default' => 'Start a Project',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('csl_final_cta_cta1_text', array(
        'type' => 'text',
        'section' => 'final_cta_section',
        'label' => __('CTA 1 Text', 'auragrid'),
    ));

    $wp_customize->add_setting('csl_final_cta_cta1_link', array(
        'default' => '/contact',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('csl_final_cta_cta1_link', array(
        'type' => 'url',
        'section' => 'final_cta_section',
        'label' => __('CTA 1 Link', 'auragrid'),
    ));

    $wp_customize->add_setting('csl_final_cta_cta2_text', array(
        'default' => 'Join Our Network',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('csl_final_cta_cta2_text', array(
        'type' => 'text',
        'section' => 'final_cta_section',
        'label' => __('CTA 2 Text', 'auragrid'),
    ));

    $wp_customize->add_setting('csl_final_cta_cta2_link', array(
        'default' => '/form/subscribe',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('csl_final_cta_cta2_link', array(
        'type' => 'url',
        'section' => 'final_cta_section',
        'label' => __('CTA 2 Link', 'auragrid'),
    ));
}
