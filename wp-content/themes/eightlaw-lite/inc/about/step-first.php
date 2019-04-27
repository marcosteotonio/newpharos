<?php
/**
 * Getting started template
 */
$customizer_url = admin_url() . 'customize.php';
?>

<div class="feature-section">
	<div class="cols">
		<span><?php esc_html_e('Step 1','eightlaw-lite')?></span>
		<h3><?php esc_html_e( 'Follow below actions', 'eightlaw-lite' ); ?></h3>
		<p><?php esc_html_e( 'We\'ve made a checklist for you to take while setting up with our theme. Go through this and you can have your website ready in minutes.', 'eightlaw-lite' ); ?></p>
			<p><span class="dashicons dashicons-yes"></span> <?php esc_html_e( 'Create a post, post category, page.', 'eightlaw-lite' ); ?> <a target="_blank" href="<?php echo esc_url('https://8degreethemes.com/documentation/general/#creating_a_post_page_and_category'); ?>"><?php esc_html_e( 'Click here if you need help!', 'eightlaw-lite' ); ?></a> </p>
			<p><span class="dashicons dashicons-yes"></span> <?php esc_html_e( 'Set page you created to load a custom template "Homepage" that came with theme and set it as frontpage.', 'eightlaw-lite' ); ?> <a target="_blank" href="<?php echo esc_url('https://8degreethemes.com/documentation/general/#creating_a_homepage'); ?>"><?php esc_html_e( 'Click here if you need help!', 'eightlaw-lite' ); ?></a> </p>
			<p><span class="dashicons dashicons-yes"></span> <?php esc_html_e( 'Install required/recommerded plugins (if any).', 'eightlaw-lite' ); ?> </p>
		<p><a class="button button-primary" href="<?php echo esc_url( admin_url( 'themes.php?page=eightlaw-lite-about&tab=recommended_plugins' ) ); ?>"><?php esc_html_e( 'Click Me to install recommended plugins.', 'eightlaw-lite' ); ?></a>
		</p>
	</div><!--/.col-->

<div class="cols">
		<span><?php esc_html_e('Step 2','eightlaw-lite')?></span>
		<h3><?php esc_html_e( 'Import Demo Contents', 'eightlaw-lite' ); ?></h3>
		<p><?php esc_html_e( 'If you like to have a site as similar like our demo then, go to Import Demo tab and do the needfuls.', 'eightlaw-lite' ) ?></p>
		<p><a class="button button-primary" href="<?php echo esc_url( admin_url( 'themes.php?page=eightlaw-lite-about&tab=demo_import' ) ); ?>"><?php esc_html_e( 'Click Me to import demo contents.', 'eightlaw-lite' ); ?></a>
		</p>
	</div><!--/.col-->
	
	<div class="cols">
		<span><?php esc_html_e('Step 2','eightlaw-lite')?></span>
		<h3><?php esc_html_e( 'Check our documentation', 'eightlaw-lite' ); ?></h3>
		<p><?php esc_html_e( 'Even if you\'re a long-time WordPress user, we still believe you should give our documentation a very quick Read.', 'eightlaw-lite' ) ?></p>
		<p>
			<a class="button button-primary" target="_blank" href="<?php echo esc_url( 'https://8degreethemes.com/documentation/eightlaw-lite' ); ?>"><?php esc_html_e( 'Full documentation', 'eightlaw-lite' ); ?></a>
		</p>
	</div><!--/.col-->

	<div class="cols">
		<span><?php esc_html_e('Step 3','eightlaw-lite')?></span>
		<h3><?php esc_html_e( 'Customize everything', 'eightlaw-lite' ); ?></h3>
		<p><?php esc_html_e( 'Using the WordPress Customizer you can easily customize every aspect of the theme.', 'eightlaw-lite' ); ?></p>
		<p><a target="_blank" href="<?php echo esc_url( $customizer_url ); ?>"
			class="button button-primary"><?php esc_html_e( 'Go to Customizer', 'eightlaw-lite' ); ?></a>
		</p>
	</div><!--/.col-->
</div><!--/.feature-section-->