<?php
/**
 * Tafri Travel Theme Customizer
 *
 * @package tafri-travel
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function tafri_travel_customize_register($wp_customize) {

	//add home page setting pannel
	$wp_customize->add_panel('tafri_travel_panel_id', array(
		'priority'       => 10,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __('Theme Settings', 'tafri-travel'),
		'description'    => __('Description of what this panel does.', 'tafri-travel'),
	));	

	//Top Bar
	$wp_customize->add_section('tafri_travel_topbar',array(
		'title'	=> __('Topbar Section','tafri-travel'),
		'description'	=> __('Add topbar content','tafri-travel'),
		'priority'	=> null,
		'panel' => 'tafri_travel_panel_id',
	));

	$wp_customize->add_setting('tafri_travel_timing',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('tafri_travel_timing',array(
		'label'	=> __('Timing','tafri-travel'),
		'section'	=> 'tafri_travel_topbar',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('tafri_travel_facebook_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('tafri_travel_facebook_url',array(
		'label'	=> __('Add Facebook link','tafri-travel'),
		'section'	=> 'tafri_travel_topbar',
		'setting'	=> 'tafri_travel_facebook_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('tafri_travel_twitter_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('tafri_travel_twitter_url',array(
		'label'	=> __('Add Twitter link','tafri-travel'),
		'section'	=> 'tafri_travel_topbar',
		'setting'	=> 'tafri_travel_twitter_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('tafri_travel_insta_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('tafri_travel_insta_url',array(
		'label'	=> __('Add Instagram link','tafri-travel'),
		'section'	=> 'tafri_travel_topbar',
		'setting'	=> 'tafri_travel_insta_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('tafri_travel_linkedin_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('tafri_travel_linkedin_url',array(
		'label'	=> __('Add Linkedin link','tafri-travel'),
		'section'	=> 'tafri_travel_topbar',
		'setting'	=> 'tafri_travel_linkedin_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('tafri_travel_pintrest_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('tafri_travel_pintrest_url',array(
		'label'	=> __('Add Pintrest link','tafri-travel'),
		'section'	=> 'tafri_travel_topbar',
		'setting'	=> 'tafri_travel_pintrest_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('tafri_travel_youtube_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('tafri_travel_youtube_url',array(
		'label'	=> __('Add Youtube link','tafri-travel'),
		'section'	=> 'tafri_travel_topbar',
		'setting'	=> 'tafri_travel_youtube_url',
		'type'	=> 'url'
	));

	//Slider
	$wp_customize->add_section( 'tafri_travel_slider' , array(
    	'title'      => __( 'Slider Settings', 'tafri-travel' ),
		'priority'   => null,
		'panel' => 'tafri_travel_panel_id'
	) );

	$wp_customize->add_setting('tafri_travel_slider_hide',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('tafri_travel_slider_hide',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide slider','tafri-travel'),
       'section' => 'tafri_travel_slider'
    ));

	for ( $count = 1; $count <= 4; $count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'tafri_travel_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'tafri_travel_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'tafri_travel_slider_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'tafri-travel' ),
			'description'	=> __('Size of image should be 1600 x 633','tafri-travel'),
			'section'  => 'tafri_travel_slider',
			'type'     => 'dropdown-pages'
		) );
	}

	//Destination Section
	$wp_customize->add_section('tafri_travel_category',array(
		'title'	=> __('Destination Section','tafri-travel'),
		'description'	=> __('Add  section below.','tafri-travel'),
		'panel' => 'tafri_travel_panel_id',
	));

	$wp_customize->add_setting('tafri_travel_title',array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_text_field',
   	));
   	$wp_customize->add_control('tafri_travel_title',array(
	    'label' => __('Section Title','tafri-travel'),
	    'section' => 'tafri_travel_category',
	    'type'  => 'text'
   	));

   	$wp_customize->add_setting('tafri_travel_desc',array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_text_field',
   	));
   	$wp_customize->add_control('tafri_travel_desc',array(
	    'label' => __('Section short description','tafri-travel'),
	    'section' => 'tafri_travel_category',
	    'type'  => 'text'
   	));

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

	$wp_customize->add_setting('tafri_travel_popular_destination',array(
		'default'	=> 'select',
		'sanitize_callback' => 'tafri_travel_sanitize_choices',
	));	
	$wp_customize->add_control('tafri_travel_popular_destination',array(
		'type'    => 'select',
		'choices' => $cat_post,		
		'label' => __('Select Category to display post','tafri-travel'),
		'description'	=> __('Size of image should be 300 x 300','tafri-travel'),
		'section' => 'tafri_travel_category',
	));

	//footer
	$wp_customize->add_section('tafri_travel_footer_section', array(
		'title'       => __('Footer Text', 'tafri-travel'),
		'description' => __('Add some text for footer like copyright etc.', 'tafri-travel'),
		'priority'    => null,
		'panel'       => 'tafri_travel_panel_id',
	));

	$wp_customize->add_setting('tafri_travel_footer_copy', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('tafri_travel_footer_copy', array(
		'label'   => __('Copyright Text', 'tafri-travel'),
		'section' => 'tafri_travel_footer_section',
		'type'    => 'text',
	));

	//Layouts
	$wp_customize->add_section('tafri_travel_left_right', array(
		'title'    => __('Sidebar Layout Settings', 'tafri-travel'),
		'priority' => null,
		'panel'    => 'tafri_travel_panel_id',
	));

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('tafri_travel_layout_options', array(
		'default'           => __('Right Sidebar', 'tafri-travel'),
		'sanitize_callback' => 'tafri_travel_sanitize_choices',
	));
	$wp_customize->add_control('tafri_travel_layout_options',array(
		'type'           => 'radio',
		'label'          => __('Change Layouts', 'tafri-travel'),
		'section'        => 'tafri_travel_left_right',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'tafri-travel'),
			'Right Sidebar' => __('Right Sidebar', 'tafri-travel'),
			'One Column'    => __('One Column', 'tafri-travel'),
			'Grid Layout'   => __('Grid Layout', 'tafri-travel')
		),
	));
}
add_action('customize_register', 'tafri_travel_customize_register');

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Tafri_Travel_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if (is_null($instance)) {
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
		add_action('customize_register', array($this, 'sections'));

		// Register scripts and styles for the contafri_travel_Customizetrols.
		add_action('customize_controls_enqueue_scripts', array($this, 'enqueue_control_scripts'), 0);
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections($manager) {

		// Load custom sections.
		load_template(trailingslashit(get_template_directory()).'/inc/section-pro.php');

		// Register custom section types.
		$manager->register_section_type('Tafri_Travel_Customize_Section_Pro');

		// Register sections.
		$manager->add_section(
			new Tafri_Travel_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority' => 9,
					'title'    => esc_html__('Tavel Pro Theme', 'tafri-travel'),
					'pro_text' => esc_html__('Go Pro', 'tafri-travel'),
					'pro_url'  => esc_url('https://www.themeseye.com/wordpress/wordpress-travel-theme/'),
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

		wp_enqueue_script('tafri-travel-customize-controls', trailingslashit(get_template_directory_uri()).'/assets/js/customize-controls.js', array('customize-controls'));
		wp_enqueue_style('tafri-travel-customize-controls', trailingslashit(get_template_directory_uri()).'assets/css/customize-controls.css');
	}
}

// Doing this customizer thang!
Tafri_Travel_Customize::get_instance();