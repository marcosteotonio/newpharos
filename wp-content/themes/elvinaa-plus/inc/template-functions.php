<?php
/**
 * @package elvinaa-plus
 */


/**
 * Elvinaa Plus Page Title
 */

if ( ! function_exists( 'elvinaa_plus_get_page_title' ) ) :
function elvinaa_plus_get_page_title($blogtitle=false,$archivetitle=false,$searchtitle=false,$pagenotfoundtitle=false) {
	if(!is_front_page()){
		?>
			<div class="content-section img-overlay">
				<div class="container">
					<div class="row text-center">
						<div class="col-md-12">
							<div class="section-title page-title"> 
								<?php
									if($blogtitle){
										?><h1 class="main-title"><?php single_post_title(); ?></h1><?php
									}
									if($archivetitle){
										?><h1 class="main-title"><?php the_archive_title(); ?></h1><?php
									}
									if($searchtitle){
										?><h1 class="main-title"><?php _e('SEARCH RESULTS','elvinaa-plus') ?></h1><?php
									}
									if($pagenotfoundtitle){
										?><h1 class="main-title"><?php _e('PAGE NOT FOUND','elvinaa-plus') ?></h1><?php
									}
									if($blogtitle==false && $archivetitle==false && $searchtitle==false && $pagenotfoundtitle==false){
										?><h1 class="main-title"><?php the_title(); ?></h1><?php
									}
								?>                                                          
			                </div>						
						</div>
					</div>
				</div>	
			</div>
			</div>	<!-- End page-title -->	
		<?php
	}	
}
endif;

/**
 * Elvinaa Plus Shop Title
 */

if ( ! function_exists( 'elvinaa_plus_get_shop_title' ) ) :
function elvinaa_plus_get_shop_title() {
	if(!is_front_page()){
		?>
			<div class="content-section img-overlay">
				<div class="container">
					<div class="row text-center">
						<div class="col-md-12">
							<div class="section-title page-title"> 
								<h1 class="main-title"><?php echo esc_attr(get_theme_mod( 'ep_shop_name','SHOP' )) ?></h1>
							</div>						
						</div>
					</div>
				</div>	
			</div>
			</div>	<!-- End page-title -->	
		<?php
	}	
}
endif;



?>