<?php
/**
 * Custom functons for WooCommerce
 *
 *
 * @package elvinaa-plus
 */


/*
* Add cart menu
*
**/

if ( !function_exists( 'elvinaa_plus_wc_menu_cart_link' ) ) :
function elvinaa_plus_wc_menu_cart_link() {
  ?>  
    <a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'elvinaa-plus' ); ?>">
      <i class="fa fa-shopping-cart"></i>
      <span class="badge"> 
        <?php echo absint( WC()->cart->get_cart_contents_count() ) ?>
      </span>
    </a>
  <?php
}
endif;

  

if ( !function_exists( 'elvinaa_plus_wc_menu_cart' ) ) :
function elvinaa_plus_wc_menu_cart() {
  ?> 
    <?php elvinaa_plus_wc_menu_cart_link(); ?>
    <ul class="menu-header-cart">
      <li>
        <?php the_widget( 'WC_Widget_Cart', 'title=' ); ?>
      </li>
    </ul>
  <?php
}
endif;


if ( !function_exists( 'elvinaa_plus_wc_menu_add_to_cart_fragment' ) ) :
function elvinaa_plus_wc_menu_add_to_cart_fragment( $fragments ) {
  ob_start();
  elvinaa_plus_wc_menu_cart_link();
  $fragments[ '.cart-contents' ] = ob_get_clean();
  return $fragments;
}
endif;
add_filter( 'woocommerce_add_to_cart_fragments', 'elvinaa_plus_wc_menu_add_to_cart_fragment' );


/**
 * Number of products per page
*/

if ( ! function_exists( 'elvinaa_plus_number_items_page' ) ) :
function elvinaa_plus_number_items_page() {
  	$number_product_per_page = 6;
  	if( $number_product_per_page ){
  		$number = $number_product_per_page;
  	}
  	else{
  		$number=9;
  	}
  	return $number;	
}
endif;
add_filter( 'loop_shop_per_page', 'elvinaa_plus_number_items_page' );


/**
 * Number of products per row
*/

if (!function_exists('elvinaa_plus_loop_columns')) :
    function elvinaa_plus_loop_columns() {
        $product_num_per_row = 3;            
        if( $product_num_per_row ){
            $number = $product_num_per_row;
        } else {
            $number = 3;
        }
        return $number;
    }
endif;
add_filter('loop_shop_columns', 'elvinaa_plus_loop_columns');


/**
 * Related Products
*/
if (!function_exists('elvinaa_plus_filter_woocommerce_output_related_products_args')) :
function elvinaa_plus_filter_woocommerce_output_related_products_args( $args ) {     
    $args=array(    
    'posts_per_page' => 3,
    'columns' => 3,
    );

    return $args; 
};
endif;
add_filter( 'woocommerce_output_related_products_args', 'elvinaa_plus_filter_woocommerce_output_related_products_args', 10, 1 ); 


/**
 * Add Class
*/

if (!function_exists('elvinaa_plus_woo_body_columns_class')) :
    function elvinaa_plus_woo_body_columns_class( $class ) {
      $class[] = 'columns-3'; 
    	return $class;
    }
endif;
add_action( 'body_class', 'elvinaa_plus_woo_body_columns_class');


/**
 * Check woocommece is active
*/

if ( ! function_exists( 'elvinaa_plus_is_woocommerce_activated' ) ) :
	function elvinaa_plus_is_woocommerce_activated() {
		if ( class_exists( 'woocommerce' ) ) { return true; } else { return false; }
	}
endif;


/**
 * Check class and return
*/

if ( ! function_exists( 'elvinaa_plus_check_class' ) ) :
	function elvinaa_plus_check_class($class) {
		$body_classes = get_body_class();
		if(in_array($class, $body_classes)){
			return true; 
		} 
		else { 
			return false; 
		}
	}
endif;

?>
