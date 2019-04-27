<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package VW Charity NGO
 */

get_header(); ?>

<div class="title-box">
    <div class="container">
        <h1><?php printf( '<strong>%s</strong> %s', esc_html__( '404','vw-charity-ngo' ), esc_html__( 'Not Found', 'vw-charity-ngo' ) ) ?></h1>
    </div>
</div>

<div id="content-vw">
	<div class="container">
        <div class="page-content">		
			<p class="text-404"><?php esc_html_e( 'Looks like you have taken a wrong turn&hellip', 'vw-charity-ngo' ); ?></p>
			<p class="text-404"><?php esc_html_e( 'Dont worry&hellip it happens to the best of us.', 'vw-charity-ngo' ); ?></p>
			<div class="read-moresec">
        		<a href="<?php echo esc_url(home_url()); ?>" class="button hvr-sweep-to-right"><?php esc_html_e( 'Return to the home page', 'vw-charity-ngo' ); ?></a>
			</div>
			<div class="clearfix"></div>
        </div>
	</div>
</div>
<?php get_footer(); ?>