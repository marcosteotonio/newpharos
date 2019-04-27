<?php
/**
 * Elviaa Plus functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package elvinaa-plus
 */


function elvinaa_plus_load_scripts() {	
  $parent_style = 'parent-style';
  wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
  wp_enqueue_style( 'parent-elvinaa-style-responsive', get_template_directory_uri() . '/css/elvinaa-style-responsive.css' );
  wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css',array( $parent_style ), wp_get_theme()->get('Version'));
  wp_enqueue_style( 'elvinaa-plus-woocommerce-style', get_stylesheet_directory_uri() . '/css/woocommerce-style.css', array(), wp_get_theme()->get('Version')); 
  wp_enqueue_script( 'elvinaa-plus-script', get_stylesheet_directory_uri() . '/js/elvinaa-plus-main.js', array(), wp_get_theme()->get('Version'), true );
}

function elvinaa_plus_theme_setup(){
	add_action('wp_enqueue_scripts', 'elvinaa_plus_load_scripts');
}
add_action( 'after_setup_theme', 'elvinaa_plus_theme_setup', 99 );


/** 
* WooCommerce Support
*/

function elvinaa_plus_wc_support() {
  add_theme_support( 'woocommerce' );
  add_theme_support( 'wc-product-gallery-zoom' );
  add_theme_support( 'wc-product-gallery-lightbox' );
  add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'elvinaa_plus_wc_support' );


/** 
* Register Widget Area
*/

function elvinaa_plus_widgets_init() {
  register_sidebar( array(
      'name'          => __( 'Woocommerce Sidebar', 'elvinaa-plus' ),
      'id'            => 'woosidebar',
      'description'   => __( 'Add widgets here.', 'elvinaa-plus' ),
      'before_widget' => '<aside id="%1$s" class="widget %2$s">',
      'after_widget'  => '</aside>',
      'before_title'  => '<h5 class="widget-title">',
      'after_title'   => '</h5>',
  ) ); 

}
add_action( 'widgets_init', 'elvinaa_plus_widgets_init' );


/**
 * Custom product search form
*/

if ( !function_exists('elvinaa_plus_product_search_form') ) :
function elvinaa_plus_product_search_form( $form ) {
    $form = '<form role="search" method="get" id="searchform" class="searchform" action="' . esc_url(home_url( '/' )) . '" >
    <div class="search">
      <input type="text" value="' . get_search_query() . '" class="product-search" name="s" id="s" placeholder="'. __('Search products.','elvinaa-plus'). '">
      <label for="searchsubmit" class="search-icon"><i class="fa fa-search"></i></label>
      <input type="hidden" name="post_type" value="'. __( 'product','elvinaa-plus' ) .'" />
      <input type="submit" id="searchsubmit" value="'. __( 'Search','elvinaa-plus' ) .'" />
    </div>
    </form>';
    return $form;
}
endif;
add_filter( 'get_product_search_form', 'elvinaa_plus_product_search_form', 100 );


/**
 * Display Dynamic CSS.
 */

function elvinaa_plus_dynamic_css_wrap() {
  require_once( get_stylesheet_directory(). '/css/dynamic.css.php' );
  ?>
    <style type="text/css" id="elvinaa-plus-theme-dynamic-style">
        <?php echo elvinaa_plus_dynamic_css_stylesheet(); ?>
    </style>
  <?php 
}
add_action( 'wp_head', 'elvinaa_plus_dynamic_css_wrap' );


/**
* Admin Scripts
*/

if ( ! function_exists( 'elvinaa_plus_admin_scripts' ) ) :
function elvinaa_plus_admin_scripts($hook) {
  if('appearance_page_elvinaa-plus-theme-info' != $hook)
    return;  
  wp_enqueue_style( 'elvinaa-plus-info-css', trailingslashit(get_stylesheet_directory_uri()).'css/elvinaa-plus-theme-info.css', false );  
}
endif;
add_action( 'admin_enqueue_scripts', 'elvinaa_plus_admin_scripts' );


/** 
* Removing parent theme info
*/

function elvinaa_plus_remove_parent_theme_info_menu() {
    remove_submenu_page( 'themes.php', 'elvinaa-theme-info' );
}
add_action( 'admin_menu', 'elvinaa_plus_remove_parent_theme_info_menu',999 );


/** 
* Plugins Required
*/
function elvinaa_plus_register_required_plugins() {
    $plugins = array(    
      array(
          'name'               => 'WooCommerce',
          'slug'               => 'woocommerce',
          'source'             => '',
          'required'           => false,          
          'force_activation'   => false,
      ),
      array(
          'name'               => 'Elementor Page Builder',
          'slug'               => 'elementor',
          'source'             => '',
          'required'           => false,          
          'force_activation'   => false,
      )
    );

    $config = array(
            'id'           => 'elvinaa-plus',
            'default_path' => '',
            'menu'         => 'tgmpa-install-plugins',
            'has_notices'  => true,
            'dismissable'  => true,
            'dismiss_msg'  => '',
            'is_automatic' => false,
            'message'      => '',
            'strings'      => array()
    );
	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'elvinaa_plus_register_required_plugins' );


//include info
require_once( get_stylesheet_directory(). '/inc/theme-info.php' );

//include customizer
require_once( get_stylesheet_directory(). '/inc/customizer/customizer.php' );

//include woocommerce functions
require_once( get_stylesheet_directory(). '/inc/woocommerce-functions.php' );

//include template functions
require_once( get_stylesheet_directory(). '/inc/template-functions.php' );

?>
