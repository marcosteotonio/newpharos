<?php
/**
 * Tafri Travel functions and definitions
 *
 * @package tafri-travel
 */
/**
 * Set the content width based on the theme's design and stylesheet.
 */

/* Theme Setup */
if (!function_exists('tafri_travel_setup')):

function tafri_travel_setup() {

	$GLOBALS['content_width'] = apply_filters('tafri_travel_content_width', 640);

	add_theme_support('automatic-feed-links');
	add_theme_support('post-thumbnails');
	add_theme_support('woocommerce');
	add_theme_support('title-tag');
	add_theme_support('custom-logo', array(
		'height'      => 250,
		'width'       => 250,
		'flex-width'  => true,
		'flex-height' => true,
	));
	add_image_size('tafri-travel-homepage-thumb', 250, 145, true);
	register_nav_menus( array(
		'left-primary' => __( 'Left Menu', 'tafri-travel' ),
		'right-primary' => __( 'Right Menu', 'tafri-travel' ),
		'responsive-menu' => __( 'Responsive Menu', 'tafri-travel' ),
	) );

	add_theme_support('custom-background', array(
		'default-color' => 'f1f1f1',
	));

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style(array('assets/css/editor-style.css', tafri_travel_font_url()));
}

endif;
add_action('after_setup_theme', 'tafri_travel_setup');

// Theme Widgets Setup
function tafri_travel_widgets_init() {
	register_sidebar(array(
		'name'          => __('Blog Sidebar', 'tafri-travel'),
		'description'   => __('Appears on blog page sidebar', 'tafri-travel'),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));

	register_sidebar(array(
		'name'          => __('Page Sidebar', 'tafri-travel'),
		'description'   => __('Appears on page sidebar', 'tafri-travel'),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));

	register_sidebar(array(
		'name'          => __('Third Column Sidebar', 'tafri-travel'),
		'description'   => __('Appears on page sidebar', 'tafri-travel'),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));

	register_sidebar(array(
		'name'          => __('Footer Navigation 1', 'tafri-travel'),
		'description'   => __('Appears on footer', 'tafri-travel'),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));

	register_sidebar(array(
		'name'          => __('Footer Navigation 2', 'tafri-travel'),
		'description'   => __('Appears on footer', 'tafri-travel'),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));

	register_sidebar(array(
		'name'          => __('Footer Navigation 3', 'tafri-travel'),
		'description'   => __('Appears on footer', 'tafri-travel'),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));

	register_sidebar(array(
		'name'          => __('Footer Navigation 4', 'tafri-travel'),
		'description'   => __('Appears on footer', 'tafri-travel'),
		'id'            => 'footer-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));
}

add_action('widgets_init', 'tafri_travel_widgets_init');

// Theme Font URL
function tafri_travel_font_url() {
	$font_url      = '';
	$font_family   = array();
	$font_family[] = 'Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i';
	$font_family[] = 'Merienda One';

	$query_args = array(
		'family' => rawurlencode(implode('|', $font_family)),
	);
	$font_url = add_query_arg($query_args, '//fonts.googleapis.com/css');
	return $font_url;
}

function tafri_travel_sanitize_dropdown_pages($page_id, $setting) {
	// Ensure $input is an absolute integer.
	$page_id = absint($page_id);
	// If $page_id is an ID of a published page, return it; otherwise, return the default.
	return ('publish' == get_post_status($page_id)?$page_id:$setting->default);
}

// radio button sanitization
function tafri_travel_sanitize_choices($input, $setting) {
	global $wp_customize;
	$control = $wp_customize->get_control($setting->id);
	if (array_key_exists($input, $control->choices)) {
		return $input;
	} else {
		return $setting->default;
	}
}

// Excerpt Limit Begin
function tafri_travel_string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}

//define
define('TAFRI_TRAVEL_CREDIT', 'https://www.themeseye.com/', 'tafri-travel');

if (!function_exists('tafri_travel_credit')) {
	function tafri_travel_credit() {
		echo "<a href=".esc_url(TAFRI_TRAVEL_CREDIT)." target='_blank'>".esc_html__('Themeseye', 'tafri-travel')."</a>";
	}
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'tafri_travel_loop_columns');
	if (!function_exists('tafri_travel_loop_columns')) {
		function tafri_travel_loop_columns() {
		return 3; // 3 products per row
	}
}

// Theme enqueue scripts
function tafri_travel_scripts() {
	wp_enqueue_style('tafri-travel-font', tafri_travel_font_url(), array());
	wp_enqueue_style('bootstrap', get_template_directory_uri().'/assets/css/bootstrap.css');
	wp_enqueue_style('tafri-travel-basic-style', get_stylesheet_uri());
	wp_enqueue_style('tafri-travel-customcss', get_template_directory_uri().'/assets/css/custom.css');
	wp_enqueue_style('font-awesome', get_template_directory_uri().'/assets/css/fontawesome-all.css');
	wp_enqueue_script('SmoothScroll', get_template_directory_uri().'/assets/js/SmoothScroll.js', array('jquery'));
	wp_enqueue_script('tafri-travel-customscripts-jquery', get_template_directory_uri().'/assets/js/custom.js', array('jquery'));
	wp_enqueue_script('bootstrap', get_template_directory_uri().'/assets/js/bootstrap.js', array('jquery'));
	wp_enqueue_style('tafri-travel-ie', get_template_directory_uri().'/assets/css/ie.css', array('tafri-travel-basic-style'));
	wp_style_add_data('tafri-travel-ie', 'conditional', 'IE');
	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'tafri_travel_scripts');

/* Custom header additions. */
require get_template_directory().'/inc/custom-header.php';

/* Custom template tags for this theme. */
require get_template_directory().'/inc/template-tags.php';

/* Customizer additions. */
require get_template_directory().'/inc/customizer.php';