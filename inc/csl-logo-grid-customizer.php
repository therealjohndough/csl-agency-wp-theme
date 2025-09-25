<?php
/**
 * Add a Logo Grid section to the Front Page customizer panel.
 *
 * This is hooked separately so it doesn’t interfere with the main customizer function.
 */
function csl_add_logo_grid_customizer_section( $wp_customize ) {
    // Add the section to your existing panel
    $wp_customize->add_section( 'logo_grid_section', array(
        'title'    => __( 'Logo Grid Section', 'auragrid' ),
        'panel'    => 'frontpage_sections_panel',
        'priority' => 70,
    ) );

    // Show/hide toggle
    $wp_customize->add_setting( 'csl_logo_grid_show', array(
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ) );
    $wp_customize->add_control( 'csl_logo_grid_show', array(
        'type'    => 'checkbox',
        'section' => 'logo_grid_section',
        'label'   => __( 'Show Logo Grid Section', 'auragrid' ),
    ) );

    // Heading text
    $wp_customize->add_setting( 'csl_logo_grid_heading', array(
        'default'           => "Brands We\\'ve Worked With", // escape apostrophe
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'csl_logo_grid_heading', array(
        'type'    => 'text',
        'section' => 'logo_grid_section',
        'label'   => __( 'Heading', 'auragrid' ),
    ) );
}
add_action( 'customize_register', 'csl_add_logo_grid_customizer_section', 11 );
