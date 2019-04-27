<?php
/**
 * IT Company Theme Customizer
 * @package IT Company
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function it_company_customize_register( $wp_customize ) {	

	//add home page setting pannel
	$wp_customize->add_panel( 'it_company_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Theme Settings', 'it-company' ),
	    'description' => __( 'Description of what this panel does.', 'it-company' ),
	) );

	//layout setting
	$wp_customize->add_section( 'it_company_theme_layout', array(
    	'title'      => __( 'Layout Settings', 'it-company' ),
		'priority'   => null,
		'panel' => 'it_company_panel_id'
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('it_company_layout',array(
	        'default' => __( 'Right Sidebar', 'it-company' ),
	        'sanitize_callback' => 'it_company_sanitize_choices'	        
	    )
    );

	$wp_customize->add_control('it_company_layout',
	    array(
	        'type' => 'radio',
	        'label' => __( 'Do you want this section', 'it-company' ),
	        'section' => 'it_company_theme_layout',
	        'choices' => array(
	            'Left Sidebar' => __('Left Sidebar','it-company'),
	            'Right Sidebar' => __('Right Sidebar','it-company'),
	            'One Column' => __('One Column','it-company'),
	            'Three Columns' => __('Three Columns','it-company'),
	            'Four Columns' => __('Four Columns','it-company'),
	            'Grid Layout' => __('Grid Layout','it-company')
	        ),
	    )
    );

	//Topbar section
	$wp_customize->add_section('it_company_topbar_icon',array(
		'title'	=> __('Topbar Section','it-company'),
		'description'	=> __('Add Header Content here','it-company'),
		'priority'	=> null,
		'panel' => 'it_company_panel_id',
	));

	$wp_customize->add_setting('it_company_question',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('it_company_question',array(
		'label'	=> __('Add Text','it-company'),
		'section'	=> 'it_company_topbar_icon',
		'setting'	=> 'it_company_question',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('it_company_email',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('it_company_email',array(
		'label'	=> __('Add Email Address','it-company'),
		'section'	=> 'it_company_topbar_icon',
		'setting'	=> 'it_company_email',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('it_company_call_number',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('it_company_call_number',array(
		'label'	=> __('Add Contact Number','it-company'),
		'section'	=> 'it_company_topbar_icon',
		'setting'	=> 'it_company_call_number',
		'type'		=> 'text'
	));

		$wp_customize->add_setting('it_company_facebook',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('it_company_facebook',array(
		'label'	=> __('Add Facebook link','it-company'),
		'section'	=> 'it_company_topbar_icon',
		'setting'	=> 'it_company_facebook',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('it_company_twitter',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('it_company_twitter',array(
		'label'	=> __('Add Twitter link','it-company'),
		'section'	=> 'it_company_topbar_icon',
		'setting'	=> 'it_company_twitter',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('it_company_googleplus',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('it_company_googleplus',array(
		'label'	=> __('Add Google Plus link','it-company'),
		'section'	=> 'it_company_topbar_icon',
		'setting'	=> 'it_company_googleplus',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('it_company_linkedin',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('it_company_linkedin',array(
		'label'	=> __('Add Linkedin link','it-company'),
		'section'	=> 'it_company_topbar_icon',
		'setting'	=> 'it_company_linkedin',
		'type'	=> 'url'
	));

	//home page slider
	$wp_customize->add_section( 'it_company_slider_section' , array(
    	'title'      => __( 'Slider Settings', 'it-company' ),
		'priority'   => null,
		'panel' => 'it_company_panel_id'
	) );

	$wp_customize->add_setting('it_company_slider_hide',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('it_company_slider_hide',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide slider','it-company'),
       'section' => 'it_company_slider_section',
    ));

	for ( $count = 1; $count <= 4; $count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'it_company_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'it_company_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'it_company_slider_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'it-company' ),
			'section'  => 'it_company_slider_section',
			'type'     => 'dropdown-pages'
		) );
	}

	//About Us Section
	$wp_customize->add_section('it_company_about',array(
		'title'	=> __('About Us','it-company'),
		'description'	=> __('Add About Us sections below.','it-company'),
		'panel' => 'it_company_panel_id',
	));

	$wp_customize->add_setting('it_company_page_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('it_company_page_title',array(
		'label'	=> __('Section Title','it-company'),
		'section'	=> 'it_company_about',
		'type'		=> 'text'
	));

	// category left
	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_post[]= 'select';
	foreach($categories as $category){
	if($i==0){
	$default = $category->slug;
	$i++;
	}
	$cat_post[$category->slug] = $category->name;
	}

    $wp_customize->add_setting( 'it_company_category', array(
      'default'           => '',
      'sanitize_callback' => 'it_company_sanitize_choices'
    ));
    $wp_customize->add_control('it_company_category',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => __('Select Category to display Latest Post','it-company'),
		'section' => 'it_company_about',
	));

	$post_list = get_posts();
 	$i = 0;
	$pst[]='Select';  
	foreach($post_list as $post){
	$pst[$post->post_title] = $post->post_title;
	}

	$wp_customize->add_setting('it_company_about_setting',array(
		'sanitize_callback' => 'it_company_sanitize_choices',
	));

	$wp_customize->add_control('it_company_about_setting',array(
		'type'    => 'select',
		'choices' => $pst,
		'label' => __('Select post','it-company'),
		'section' => 'it_company_about',
	));

	// category right
	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_post1[]= 'select';
	foreach($categories as $category){
	if($i==0){
	$default = $category->slug;
	$i++;
	}
	$cat_post1[$category->slug] = $category->name;
	}

	$wp_customize->add_setting( 'it_company_category1', array(
      'default'           => '',
      'sanitize_callback' => 'it_company_sanitize_choices'
    ));
    $wp_customize->add_control('it_company_category1',array(
		'type'    => 'select',
		'choices' => $cat_post1,
		'label' => __('Select Category to display Latest Post','it-company'),
		'section' => 'it_company_about',
	));

	//footer text
	$wp_customize->add_section('it_company_footer_section',array(
		'title'	=> __('Footer Text','it-company'),
		'description'	=> __('Add some text for footer like copyright etc.','it-company'),
		'panel' => 'it_company_panel_id'
	));
	
	$wp_customize->add_setting('it_company_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('it_company_text',array(
		'label'	=> __('Copyright Text','it-company'),
		'section'	=> 'it_company_footer_section',
		'type'		=> 'text'
	));	
}
add_action( 'customize_register', 'it_company_customize_register' );	

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class IT_Company_Customize {

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
		$manager->register_section_type( 'IT_Company_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new IT_Company_Customize_Section_Pro(
			$manager,
			'example_1',
				array(
				'priority'   => 9,
				'title'    => esc_html__( 'IT Company Pro', 'it-company' ),
				'pro_text' => esc_html__( 'Go Pro', 'it-company' ),
				'pro_url'  => esc_url('https://www.themesglance.com/themes/it-company-wordpress-theme/')					
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

		wp_enqueue_script( 'it-company-customize-controls', trailingslashit( get_template_directory_uri() ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'it-company-customize-controls', trailingslashit( get_template_directory_uri() ) . '/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
IT_Company_Customize::get_instance();