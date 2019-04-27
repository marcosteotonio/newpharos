<?php
/**
 *
 * @package elvinaa-plus
 */


if ( ! is_active_sidebar( 'woosidebar' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'woosidebar' ); ?>
</aside><!-- #secondary -->

