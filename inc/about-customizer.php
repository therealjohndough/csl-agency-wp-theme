<?php
// inc/about-customizer.php

add_action('customize_register', function (WP_Customize_Manager $wp_customize) {

  // About Page section (guard if already created)
  if (! $wp_customize->get_section('about_page_section')) {
    $wp_customize->add_section('about_page_section', [
      'title'       => __('About Page', 'auragrid'),
      'priority'    => 35,
      'description' => __('Copy/options for the About page.', 'auragrid'),
    ]);
  }

  /* ---------- Client Fit (About-only) ---------- */
  $wp_customize->add_setting('csl_about_client_fit_heading', [
    'default'           => __('Are We A Good Fit?', 'auragrid'),
    'sanitize_callback' => 'sanitize_text_field',
  ]);
  $wp_customize->add_control('csl_about_client_fit_heading', [
    'type'    => 'text',
    'section' => 'about_page_section',
    'label'   => __('Client Fit Heading (About)', 'auragrid'),
  ]);

  $wp_customize->add_setting('csl_about_client_fit_subheading', [
    'default'           => __('We collaborate with founders who value transparency, quality, and long-term partnership.', 'auragrid'),
    'sanitize_callback' => 'sanitize_text_field',
  ]);
  $wp_customize->add_control('csl_about_client_fit_subheading', [
    'type'    => 'text',
    'section' => 'about_page_section',
    'label'   => __('Client Fit Subheading (About)', 'auragrid'),
  ]);

  $wp_customize->add_setting('csl_about_client_fit_table_html', [
    'default'           => '',
    'sanitize_callback' => function($v){ return wp_kses_post($v); },
  ]);
  $wp_customize->add_control('csl_about_client_fit_table_html', [
    'type'        => 'textarea',
    'section'     => 'about_page_section',
    'label'       => __('Client Fit Table HTML (About)', 'auragrid'),
    'description' => __('Limited HTML allowed: table/thead/tbody/tr/th/td/strong/em.', 'auragrid'),
  ]);

  /* ---------- Services on About (optional but recommended) ---------- */
  $wp_customize->add_setting('csl_about_services_show', [
    'default'           => true,
    'sanitize_callback' => 'wp_validate_boolean',
  ]);
  $wp_customize->add_control('csl_about_services_show', [
    'type'    => 'checkbox',
    'section' => 'about_page_section',
    'label'   => __('Show Services (About)', 'auragrid'),
  ]);

  $wp_customize->add_setting('csl_about_services_heading', [
    'default'           => __('Capabilities', 'auragrid'),
    'sanitize_callback' => 'sanitize_text_field',
  ]);
  $wp_customize->add_control('csl_about_services_heading', [
    'type'    => 'text',
    'section' => 'about_page_section',
    'label'   => __('Services Heading (About)', 'auragrid'),
  ]);

  // Lets you override which parent page feeds the grid (falls back to slug "services")
  $wp_customize->add_setting('csl_about_services_parent', [
    'default'           => 0,
    'sanitize_callback' => 'absint',
  ]);
  $wp_customize->add_control('csl_about_services_parent', [
    'type'        => 'dropdown-pages',
    'section'     => 'about_page_section',
    'label'       => __('Services Parent Page (About)', 'auragrid'),
    'description' => __('Defaults to page with slug "services" if left empty.', 'auragrid'),
  ]);
});
