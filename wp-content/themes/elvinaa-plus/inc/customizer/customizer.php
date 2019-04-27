<?php
/**
 * Elvinaa Plus Theme Customizer
 *
 * @package elvinaa-plus
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

if ( ! function_exists( 'elvinaa_plus_customize_register' ) ) :
function elvinaa_plus_customize_register( $wp_customize ) {

    if(elvinaa_plus_is_woocommerce_activated()){

        //Shop Settings
        
        $wp_customize->add_section(
            'elvinaa_plus_shop_settings',
            array (
                'priority'      => 25,
                'capability'    => 'edit_theme_options',
                'theme_supports'=> '',
                'title'         => __( 'Shop Settings', 'elvinaa-plus' )
            )
        );

        // Shop Name 
        $wp_customize->add_setting(
            'ep_shop_name',
            array(
                'type' => 'theme_mod',
                'default'           => __('SHOP','elvinaa-plus'),
                'sanitize_callback' => 'elvinaa_plus_sanitize_textarea',            
            )
        );

        $wp_customize->add_control(
            'ep_shop_name',
            array(
                'settings'      => 'ep_shop_name',
                'section'       => 'elvinaa_plus_shop_settings',
                'type'          => 'textbox',
                'label'         => __( 'Shop Name', 'elvinaa-plus' ),
                'description'   => '',
            )
        );

        // Shop Styles
        $wp_customize->add_setting(
            'ep_shop_styles',
            array(
                'type' => 'theme_mod',
                'default'           => 'default',
                'sanitize_callback' => 'elvinaa_plus_sanitize_shop_styles_selection'
            )
        );

        $wp_customize->add_control(
            'ep_shop_styles',
            array(
                'settings'      => 'ep_shop_styles',
                'section'       => 'elvinaa_plus_shop_settings',
                'type'          => 'radio',
                'label'         => __( 'Select Sidebar Position:', 'elvinaa-plus' ),
                'description'   => '',
                'choices' => array(
                                'default' => __('Full Width', 'elvinaa-plus'),
                                'right' => __('Rignt Sidebar', 'elvinaa-plus'),
                                'left' => __('Left Sidebar', 'elvinaa-plus'),
                                ),
            )
        );        
    }  
   
}
endif;

add_action( 'customize_register', 'elvinaa_plus_customize_register' );

/**
 * Sanitize textarea.
 *
 * @param string $input
 * @return string
 */
if ( ! function_exists( 'elvinaa_plus_sanitize_textarea' ) ) :
function elvinaa_plus_sanitize_textarea( $input ) {
    return sanitize_textarea_field( $input );
}
endif;


/**
 * Sanitize Shop sidebar radio option 
 *
 * @param string $input
 * @return string
 */
if ( ! function_exists( 'elvinaa_plus_sanitize_shop_styles_selection' ) ) :
function elvinaa_plus_sanitize_shop_styles_selection(  $input ){
    $valid = array(
        'default' => __('Full Width', 'elvinaa-plus'),
        'right' => __('Rignt Sidebar', 'elvinaa-plus'),
        'left' => __('Left Sidebar', 'elvinaa-plus'),      
     );

     if ( array_key_exists( $input, $valid ) ) {
        return $input;
     } else {
        return '';
     }
}
endif;

/**
 * URL sanitization.
 *
 * @see esc_url_raw() https://developer.wordpress.org/reference/functions/esc_url_raw/
 *
 * @param string $url URL to sanitize.
 * @return string Sanitized URL.
 */
if ( ! function_exists( 'elvinaa_plus_sanitize_url' ) ) :
function elvinaa_plus_sanitize_url( $url ) {
    return esc_url_raw( $url );
}
endif;

/**
 * Sanitize checkbox.
 *
 * @param bool $checked Whether the checkbox is checked.
 * @return bool Whether the checkbox is checked.
 */
if ( ! function_exists( 'elvinaa_plus_sanitize_checkbox_selection' ) ) :
function elvinaa_plus_sanitize_checkbox_selection( $checked ) {
    // Boolean check.
    return ( ( isset( $checked ) && true == $checked ) ? true : false );
}
endif;