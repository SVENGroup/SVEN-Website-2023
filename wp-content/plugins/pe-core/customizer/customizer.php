<?php


/**
 * Light Logo Option
 */


function pecore_customize_register( $wp_customize ) {
   //All our sections, settings, and controls will be added here
    
    $wp_customize->add_setting(
        'light_logo',
        array(
            'default' => '',
            'theme_mod' => 'image', // you can also use 'theme_mod'
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr'
        )
    );

    $wp_customize->add_control( new WP_Customize_Image_Control(
        $wp_customize,
        'light_logo',
        array(
            'label'      => esc_html__( 'Light Logo', 'pe-core' ),
            'settings'   => 'light_logo',
            'priority'   => 8,
            'section'    => 'title_tagline',
        )
    ) );
    
}
add_action( 'customize_register', 'pecore_customize_register' );
