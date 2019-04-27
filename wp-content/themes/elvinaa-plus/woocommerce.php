<?php
/**
 * @package elvinaa-plus
 */

get_header();

?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
    	<?php elvinaa_plus_get_shop_title(); ?>
    	<div class="content-inner">
    		<div class="page-content-area">
		        <?php
		            get_template_part( 'template-parts/content', 'woocommerce' );           
		        ?>
	    	</div>
	    </div>
    </main><!-- #main -->
</div><!-- #primary -->

<?php
	get_footer();
?>