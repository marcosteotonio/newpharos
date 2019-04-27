<?php
/**
 * VW Charity NGO Theme Customizer
 *
 * @package VW Charity NGO
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vw_charity_ngo_customize_register( $wp_customize ) {

	//add home page setting pannel
	$wp_customize->add_panel( 'vw_charity_ngo_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'VW Settings', 'vw-charity-ngo' ),
	    'description' => __( 'Description of what this panel does.', 'vw-charity-ngo' ),
	) );

	$wp_customize->add_section( 'vw_charity_ngo_left_right', array(
    	'title'      => __( 'General Settings', 'vw-charity-ngo' ),
		'priority'   => 30,
		'panel' => 'vw_charity_ngo_panel_id'
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('vw_charity_ngo_theme_options',array(
        'default' => __('Right Sidebar','vw-charity-ngo'),
        'sanitize_callback' => 'vw_charity_ngo_sanitize_choices'	        
	));
	$wp_customize->add_control('vw_charity_ngo_theme_options',array(
        'type' => 'radio',
        'label' => __('Do you want this section','vw-charity-ngo'),
        'section' => 'vw_charity_ngo_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-charity-ngo'),
            'Right Sidebar' => __('Right Sidebar','vw-charity-ngo'),
            'One Column' => __('One Column','vw-charity-ngo'),
            'Three Columns' => __('Three Columns','vw-charity-ngo'),
            'Four Columns' => __('Four Columns','vw-charity-ngo'),
            'Grid Layout' => __('Grid Layout','vw-charity-ngo')
        ),
	)   );
    
    $font_array = array(
        '' => __( 'No Fonts', 'vw-charity-ngo' ),
        'Abril Fatface' => __( 'Abril Fatface', 'vw-charity-ngo' ),
        'Acme' => __( 'Acme', 'vw-charity-ngo' ),
        'Anton' => __( 'Anton', 'vw-charity-ngo' ),
        'Architects Daughter' => __( 'Architects Daughter', 'vw-charity-ngo' ),
        'Arimo' => __( 'Arimo', 'vw-charity-ngo' ),
        'Arsenal' => __( 'Arsenal', 'vw-charity-ngo' ),
        'Arvo' => __( 'Arvo', 'vw-charity-ngo' ),
        'Alegreya' => __( 'Alegreya', 'vw-charity-ngo' ),
        'Alfa Slab One' => __( 'Alfa Slab One', 'vw-charity-ngo' ),
        'Averia Serif Libre' => __( 'Averia Serif Libre', 'vw-charity-ngo' ),
        'Bangers' => __( 'Bangers', 'vw-charity-ngo' ),
        'Boogaloo' => __( 'Boogaloo', 'vw-charity-ngo' ),
        'Bad Script' => __( 'Bad Script', 'vw-charity-ngo' ),
        'Bitter' => __( 'Bitter', 'vw-charity-ngo' ),
        'Bree Serif' => __( 'Bree Serif', 'vw-charity-ngo' ),
        'BenchNine' => __( 'BenchNine', 'vw-charity-ngo' ),
        'Cabin' => __( 'Cabin', 'vw-charity-ngo' ),
        'Cardo' => __( 'Cardo', 'vw-charity-ngo' ),
        'Courgette' => __( 'Courgette', 'vw-charity-ngo' ),
        'Cherry Swash' => __( 'Cherry Swash', 'vw-charity-ngo' ),
        'Cormorant Garamond' => __( 'Cormorant Garamond', 'vw-charity-ngo' ),
        'Crimson Text' => __( 'Crimson Text', 'vw-charity-ngo' ),
        'Cuprum' => __( 'Cuprum', 'vw-charity-ngo' ),
        'Cookie' => __( 'Cookie', 'vw-charity-ngo' ),
        'Chewy' => __( 'Chewy', 'vw-charity-ngo' ),
        'Days One' => __( 'Days One', 'vw-charity-ngo' ),
        'Dosis' => __( 'Dosis', 'vw-charity-ngo' ),
        'Droid Sans' => __( 'Droid Sans', 'vw-charity-ngo' ),
        'Economica' => __( 'Economica', 'vw-charity-ngo' ),
        'Fredoka One' => __( 'Fredoka One', 'vw-charity-ngo' ),
        'Fjalla One' => __( 'Fjalla One', 'vw-charity-ngo' ),
        'Francois One' => __( 'Francois One', 'vw-charity-ngo' ),
        'Frank Ruhl Libre' => __( 'Frank Ruhl Libre', 'vw-charity-ngo' ),
        'Gloria Hallelujah' => __( 'Gloria Hallelujah', 'vw-charity-ngo' ),
        'Great Vibes' => __( 'Great Vibes', 'vw-charity-ngo' ),
        'Handlee' => __( 'Handlee', 'vw-charity-ngo' ),
        'Hammersmith One' => __( 'Hammersmith One', 'vw-charity-ngo' ),
        'Inconsolata' => __( 'Inconsolata', 'vw-charity-ngo' ),
        'Indie Flower' => __( 'Indie Flower', 'vw-charity-ngo' ),
        'IM Fell English SC' => __( 'IM Fell English SC', 'vw-charity-ngo' ),
        'Julius Sans One' => __( 'Julius Sans One', 'vw-charity-ngo' ),
        'Josefin Slab' => __( 'Josefin Slab', 'vw-charity-ngo' ),
        'Josefin Sans' => __( 'Josefin Sans', 'vw-charity-ngo' ),
        'Kanit' => __( 'Kanit', 'vw-charity-ngo' ),
        'Lobster' => __( 'Lobster', 'vw-charity-ngo' ),
        'Lato' => __( 'Lato', 'vw-charity-ngo' ),
        'Lora' => __( 'Lora', 'vw-charity-ngo' ),
        'Libre Baskerville' => __( 'Libre Baskerville', 'vw-charity-ngo' ),
        'Lobster Two' => __( 'Lobster Two', 'vw-charity-ngo' ),
        'Merriweather' => __( 'Merriweather', 'vw-charity-ngo' ),
        'Monda' => __( 'Monda', 'vw-charity-ngo' ),
        'Montserrat' => __( 'Montserrat', 'vw-charity-ngo' ),
        'Muli' => __( 'Muli', 'vw-charity-ngo' ),
        'Marck Script' => __( 'Marck Script', 'vw-charity-ngo' ),
        'Noto Serif' => __( 'Noto Serif', 'vw-charity-ngo' ),
        'Open Sans' => __( 'Open Sans', 'vw-charity-ngo' ),
        'Overpass' => __( 'Overpass', 'vw-charity-ngo' ),
        'Overpass Mono' => __( 'Overpass Mono', 'vw-charity-ngo' ),
        'Oxygen' => __( 'Oxygen', 'vw-charity-ngo' ),
        'Orbitron' => __( 'Orbitron', 'vw-charity-ngo' ),
        'Patua One' => __( 'Patua One', 'vw-charity-ngo' ),
        'Pacifico' => __( 'Pacifico', 'vw-charity-ngo' ),
        'Padauk' => __( 'Padauk', 'vw-charity-ngo' ),
        'Playball' => __( 'Playball', 'vw-charity-ngo' ),
        'Playfair Display' => __( 'Playfair Display', 'vw-charity-ngo' ),
        'PT Sans' => __( 'PT Sans', 'vw-charity-ngo' ),
        'Philosopher' => __( 'Philosopher', 'vw-charity-ngo' ),
        'Permanent Marker' => __( 'Permanent Marker', 'vw-charity-ngo' ),
        'Poiret One' => __( 'Poiret One', 'vw-charity-ngo' ),
        'Quicksand' => __( 'Quicksand', 'vw-charity-ngo' ),
        'Quattrocento Sans' => __( 'Quattrocento Sans', 'vw-charity-ngo' ),
        'Raleway' => __( 'Raleway', 'vw-charity-ngo' ),
        'Rubik' => __( 'Rubik', 'vw-charity-ngo' ),
        'Rokkitt' => __( 'Rokkitt', 'vw-charity-ngo' ),
        'Russo One' => __( 'Russo One', 'vw-charity-ngo' ),
        'Righteous' => __( 'Righteous', 'vw-charity-ngo' ),
        'Slabo' => __( 'Slabo', 'vw-charity-ngo' ),
        'Source Sans Pro' => __( 'Source Sans Pro', 'vw-charity-ngo' ),
        'Shadows Into Light Two' => __( 'Shadows Into Light Two', 'vw-charity-ngo'),
        'Shadows Into Light' => __( 'Shadows Into Light', 'vw-charity-ngo' ),
        'Sacramento' => __( 'Sacramento', 'vw-charity-ngo' ),
        'Shrikhand' => __( 'Shrikhand', 'vw-charity-ngo' ),
        'Tangerine' => __( 'Tangerine', 'vw-charity-ngo' ),
        'Ubuntu' => __( 'Ubuntu', 'vw-charity-ngo' ),
        'VT323' => __( 'VT323', 'vw-charity-ngo' ),
        'Varela Round' => __( 'Varela Round', 'vw-charity-ngo' ),
        'Vampiro One' => __( 'Vampiro One', 'vw-charity-ngo' ),
        'Vollkorn' => __( 'Vollkorn', 'vw-charity-ngo' ),
        'Volkhov' => __( 'Volkhov', 'vw-charity-ngo' ),
        'Yanone Kaffeesatz' => __( 'Yanone Kaffeesatz', 'vw-charity-ngo' )
    );

	//Typography
	$wp_customize->add_section( 'vw_charity_ngo_typography', array(
    	'title'      => __( 'Typography', 'vw-charity-ngo' ),
		'priority'   => 30,
		'panel' => 'vw_charity_ngo_panel_id'
	) );
	
	// This is Paragraph Color picker setting
	$wp_customize->add_setting( 'vw_charity_ngo_paragraph_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_charity_ngo_paragraph_color', array(
		'label' => __('Paragraph Color', 'vw-charity-ngo'),
		'section' => 'vw_charity_ngo_typography',
		'settings' => 'vw_charity_ngo_paragraph_color',
	)));

	//This is Paragraph FontFamily picker setting
	$wp_customize->add_setting('vw_charity_ngo_paragraph_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_charity_ngo_sanitize_choices'
	));
	$wp_customize->add_control(
	    'vw_charity_ngo_paragraph_font_family', array(
	    'section'  => 'vw_charity_ngo_typography',
	    'label'    => __( 'Paragraph Fonts','vw-charity-ngo'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting('vw_charity_ngo_paragraph_font_size',array(
		'default'	=> '12px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('vw_charity_ngo_paragraph_font_size',array(
		'label'	=> __('Paragraph Font Size','vw-charity-ngo'),
		'section'	=> 'vw_charity_ngo_typography',
		'setting'	=> 'vw_charity_ngo_paragraph_font_size',
		'type'	=> 'text'
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'vw_charity_ngo_atag_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_charity_ngo_atag_color', array(
		'label' => __('"a" Tag Color', 'vw-charity-ngo'),
		'section' => 'vw_charity_ngo_typography',
		'settings' => 'vw_charity_ngo_atag_color',
	)));

	//This is "a" Tag FontFamily picker setting
	$wp_customize->add_setting('vw_charity_ngo_atag_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_charity_ngo_sanitize_choices'
	));
	$wp_customize->add_control(
	    'vw_charity_ngo_atag_font_family', array(
	    'section'  => 'vw_charity_ngo_typography',
	    'label'    => __( '"a" Tag Fonts','vw-charity-ngo'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'vw_charity_ngo_li_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_charity_ngo_li_color', array(
		'label' => __('"li" Tag Color', 'vw-charity-ngo'),
		'section' => 'vw_charity_ngo_typography',
		'settings' => 'vw_charity_ngo_li_color',
	)));

	//This is "li" Tag FontFamily picker setting
	$wp_customize->add_setting('vw_charity_ngo_li_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_charity_ngo_sanitize_choices'
	));
	$wp_customize->add_control(
	    'vw_charity_ngo_li_font_family', array(
	    'section'  => 'vw_charity_ngo_typography',
	    'label'    => __( '"li" Tag Fonts','vw-charity-ngo'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	// This is H1 Color picker setting
	$wp_customize->add_setting( 'vw_charity_ngo_h1_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_charity_ngo_h1_color', array(
		'label' => __('H1 Color', 'vw-charity-ngo'),
		'section' => 'vw_charity_ngo_typography',
		'settings' => 'vw_charity_ngo_h1_color',
	)));

	//This is H1 FontFamily picker setting
	$wp_customize->add_setting('vw_charity_ngo_h1_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_charity_ngo_sanitize_choices'
	));
	$wp_customize->add_control(
	    'vw_charity_ngo_h1_font_family', array(
	    'section'  => 'vw_charity_ngo_typography',
	    'label'    => __( 'H1 Fonts','vw-charity-ngo'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H1 FontSize setting
	$wp_customize->add_setting('vw_charity_ngo_h1_font_size',array(
		'default'	=> '50px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('vw_charity_ngo_h1_font_size',array(
		'label'	=> __('H1 Font Size','vw-charity-ngo'),
		'section'	=> 'vw_charity_ngo_typography',
		'setting'	=> 'vw_charity_ngo_h1_font_size',
		'type'	=> 'text'
	));

	// This is H2 Color picker setting
	$wp_customize->add_setting( 'vw_charity_ngo_h2_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_charity_ngo_h2_color', array(
		'label' => __('h2 Color', 'vw-charity-ngo'),
		'section' => 'vw_charity_ngo_typography',
		'settings' => 'vw_charity_ngo_h2_color',
	)));

	//This is H2 FontFamily picker setting
	$wp_customize->add_setting('vw_charity_ngo_h2_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_charity_ngo_sanitize_choices'
	));
	$wp_customize->add_control(
	    'vw_charity_ngo_h2_font_family', array(
	    'section'  => 'vw_charity_ngo_typography',
	    'label'    => __( 'h2 Fonts','vw-charity-ngo'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H2 FontSize setting
	$wp_customize->add_setting('vw_charity_ngo_h2_font_size',array(
		'default'	=> '45px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('vw_charity_ngo_h2_font_size',array(
		'label'	=> __('h2 Font Size','vw-charity-ngo'),
		'section'	=> 'vw_charity_ngo_typography',
		'setting'	=> 'vw_charity_ngo_h2_font_size',
		'type'	=> 'text'
	));

	// This is H3 Color picker setting
	$wp_customize->add_setting( 'vw_charity_ngo_h3_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_charity_ngo_h3_color', array(
		'label' => __('h3 Color', 'vw-charity-ngo'),
		'section' => 'vw_charity_ngo_typography',
		'settings' => 'vw_charity_ngo_h3_color',
	)));

	//This is H3 FontFamily picker setting
	$wp_customize->add_setting('vw_charity_ngo_h3_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_charity_ngo_sanitize_choices'
	));
	$wp_customize->add_control(
	    'vw_charity_ngo_h3_font_family', array(
	    'section'  => 'vw_charity_ngo_typography',
	    'label'    => __( 'h3 Fonts','vw-charity-ngo'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H3 FontSize setting
	$wp_customize->add_setting('vw_charity_ngo_h3_font_size',array(
		'default'	=> '36px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('vw_charity_ngo_h3_font_size',array(
		'label'	=> __('h3 Font Size','vw-charity-ngo'),
		'section'	=> 'vw_charity_ngo_typography',
		'setting'	=> 'vw_charity_ngo_h3_font_size',
		'type'	=> 'text'
	));

	// This is H4 Color picker setting
	$wp_customize->add_setting( 'vw_charity_ngo_h4_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_charity_ngo_h4_color', array(
		'label' => __('h4 Color', 'vw-charity-ngo'),
		'section' => 'vw_charity_ngo_typography',
		'settings' => 'vw_charity_ngo_h4_color',
	)));

	//This is H4 FontFamily picker setting
	$wp_customize->add_setting('vw_charity_ngo_h4_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_charity_ngo_sanitize_choices'
	));
	$wp_customize->add_control(
	    'vw_charity_ngo_h4_font_family', array(
	    'section'  => 'vw_charity_ngo_typography',
	    'label'    => __( 'h4 Fonts','vw-charity-ngo'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H4 FontSize setting
	$wp_customize->add_setting('vw_charity_ngo_h4_font_size',array(
		'default'	=> '30px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('vw_charity_ngo_h4_font_size',array(
		'label'	=> __('h4 Font Size','vw-charity-ngo'),
		'section'	=> 'vw_charity_ngo_typography',
		'setting'	=> 'vw_charity_ngo_h4_font_size',
		'type'	=> 'text'
	));

	// This is H5 Color picker setting
	$wp_customize->add_setting( 'vw_charity_ngo_h5_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_charity_ngo_h5_color', array(
		'label' => __('h5 Color', 'vw-charity-ngo'),
		'section' => 'vw_charity_ngo_typography',
		'settings' => 'vw_charity_ngo_h5_color',
	)));

	//This is H5 FontFamily picker setting
	$wp_customize->add_setting('vw_charity_ngo_h5_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_charity_ngo_sanitize_choices'
	));
	$wp_customize->add_control(
	    'vw_charity_ngo_h5_font_family', array(
	    'section'  => 'vw_charity_ngo_typography',
	    'label'    => __( 'h5 Fonts','vw-charity-ngo'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H5 FontSize setting
	$wp_customize->add_setting('vw_charity_ngo_h5_font_size',array(
		'default'	=> '25px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('vw_charity_ngo_h5_font_size',array(
		'label'	=> __('h5 Font Size','vw-charity-ngo'),
		'section'	=> 'vw_charity_ngo_typography',
		'setting'	=> 'vw_charity_ngo_h5_font_size',
		'type'	=> 'text'
	));

	// This is H6 Color picker setting
	$wp_customize->add_setting( 'vw_charity_ngo_h6_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_charity_ngo_h6_color', array(
		'label' => __('h6 Color', 'vw-charity-ngo'),
		'section' => 'vw_charity_ngo_typography',
		'settings' => 'vw_charity_ngo_h6_color',
	)));

	//This is H6 FontFamily picker setting
	$wp_customize->add_setting('vw_charity_ngo_h6_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_charity_ngo_sanitize_choices'
	));
	$wp_customize->add_control(
	    'vw_charity_ngo_h6_font_family', array(
	    'section'  => 'vw_charity_ngo_typography',
	    'label'    => __( 'h6 Fonts','vw-charity-ngo'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H6 FontSize setting
	$wp_customize->add_setting('vw_charity_ngo_h6_font_size',array(
		'default'	=> '18px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('vw_charity_ngo_h6_font_size',array(
		'label'	=> __('h6 Font Size','vw-charity-ngo'),
		'section'	=> 'vw_charity_ngo_typography',
		'setting'	=> 'vw_charity_ngo_h6_font_size',
		'type'	=> 'text'
	));

	//Topbar section
	$wp_customize->add_section('vw_charity_ngo_topbar',array(
		'title'	=> __('Topbar Section','vw-charity-ngo'),
		'description'	=> __('Add TopBar Content here','vw-charity-ngo'),
		'priority'	=> null,
		'panel' => 'vw_charity_ngo_panel_id',
	));
	
	$wp_customize->add_setting('vw_charity_ngo_address',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_charity_ngo_address',array(
		'label'	=> __('Add Location','vw-charity-ngo'),
		'section'	=> 'vw_charity_ngo_topbar',
		'setting'	=> 'vw_charity_ngo_address',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('vw_charity_ngo_contact',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_charity_ngo_contact',array(
		'label'	=> __('Add Contact Details','vw-charity-ngo'),
		'section'	=> 'vw_charity_ngo_topbar',
		'setting'	=> 'vw_charity_ngo_contact',
		'type'		=> 'text'
	));	

	$wp_customize->add_setting('vw_charity_ngo_email',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_charity_ngo_email',array(
		'label'	=> __('Add Email Address','vw-charity-ngo'),
		'section'	=> 'vw_charity_ngo_topbar',
		'setting'	=> 'vw_charity_ngo_email',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('vw_charity_ngo_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_charity_ngo_text',array(
		'label'	=> __('Button Text','vw-charity-ngo'),
		'section'	=> 'vw_charity_ngo_topbar',
		'setting'	=> 'vw_charity_ngo_text',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('vw_charity_ngo_link',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_charity_ngo_link',array(
		'label'	=> __('Button Link','vw-charity-ngo'),
		'section'	=> 'vw_charity_ngo_topbar',
		'setting'	=> 'vw_charity_ngo_link',
		'type'		=> 'text'
	));

	//Slider
	$wp_customize->add_section( 'vw_charity_ngo_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'vw-charity-ngo' ),
		'priority'   => null,
		'panel' => 'vw_charity_ngo_panel_id'
	) );

	for ( $count = 1; $count <= 4; $count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'vw_charity_ngo_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'absint'
		) );
		$wp_customize->add_control( 'vw_charity_ngo_slider_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'vw-charity-ngo' ),
			'section'  => 'vw_charity_ngo_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	//Scholarship
	$wp_customize->add_section( 'vw_charity_ngo_scholarship' , array(
    	'title'      => __( 'Scholarship Section', 'vw-charity-ngo' ),
		'priority'   => null,
		'panel' => 'vw_charity_ngo_panel_id'
	) );

	for ( $count = 1; $count <= 3; $count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'vw_charity_ngo_scholarship_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'absint'
		) );
		$wp_customize->add_control( 'vw_charity_ngo_scholarship_page' . $count, array(
			'label'    => __( 'Select Scholarship Page', 'vw-charity-ngo' ),
			'section'  => 'vw_charity_ngo_scholarship',
			'type'     => 'dropdown-pages'
		) );
	}

	//What We Do
	$wp_customize->add_section( 'vw_charity_ngo_what_do' , array(
    	'title'      => __( 'What we do Section', 'vw-charity-ngo' ),
		'priority'   => null,
		'panel' => 'vw_charity_ngo_panel_id'
	) );

	$wp_customize->add_setting('vw_charity_ngo_what_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_charity_ngo_what_title',array(
		'label'	=> __('Section Title','vw-charity-ngo'),
		'section'	=> 'vw_charity_ngo_what_do',
		'setting'	=> 'vw_charity_ngo_what_title',
		'type'		=> 'text'
	));

	for ( $count = 1; $count <= 3; $count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'vw_charity_ngo_what_do_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'absint'
		) );
		$wp_customize->add_control( 'vw_charity_ngo_what_do_page' . $count, array(
			'label'    => __( 'Select What we do Page', 'vw-charity-ngo' ),
			'section'  => 'vw_charity_ngo_what_do',
			'type'     => 'dropdown-pages'
		) );
	}

	//Footer Text
	$wp_customize->add_section('vw_charity_ngo_footer',array(
		'title'	=> __('Footer','vw-charity-ngo'),
		'description'=> __('This section will appear in the footer','vw-charity-ngo'),
		'panel' => 'vw_charity_ngo_panel_id',
	));	
	
	$wp_customize->add_setting('vw_charity_ngo_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_charity_ngo_footer_text',array(
		'label'	=> __('Copyright Text','vw-charity-ngo'),
		'section'=> 'vw_charity_ngo_footer',
		'setting'=> 'vw_charity_ngo_footer_text',
		'type'=> 'text'
	));	
}

add_action( 'customize_register', 'vw_charity_ngo_customize_register' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class vw_charity_ngo_customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'VW_Charity_NGO_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new VW_Charity_NGO_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority'   => 9,
					'title'    => esc_html__( 'VW Charity NGO Pro', 'vw-charity-ngo' ),
					'pro_text' => esc_html__( 'Upgrade Pro', 'vw-charity-ngo' ),
					'pro_url'  => esc_url('https://www.vwthemes.com/themes/premium-charity-wordpress-theme/'),
				)
			)
		);

		$manager->add_section(
			new VW_Charity_NGO_Customize_Section_Pro(
				$manager,
				'example_2',
				array(
					'priority'   => 9,
					'title'    => esc_html__( 'Documentation', 'vw-charity-ngo' ),
					'pro_text' => esc_html__( 'Docs', 'vw-charity-ngo' ),
					'pro_url'  => admin_url( 'themes.php?page=vw_charity_ngo_guide' ),
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'vw-charity-ngo-customize-controls', trailingslashit( get_template_directory_uri() ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'vw-charity-ngo-customize-controls', trailingslashit( get_template_directory_uri() ) . '/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Vw_Charity_Ngo_Customize::get_instance();