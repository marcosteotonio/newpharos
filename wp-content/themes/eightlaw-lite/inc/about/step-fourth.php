<?php
/**
 * Changelog
 */

$eightlaw = wp_get_theme( 'eightlaw' );
?>
<div class="featured-section changelog">
<?php
	WP_Filesystem();
	global $wp_filesystem;
	$eightlaw_changelog       = $wp_filesystem->get_contents( get_template_directory() . '/readme.txt' );
	$changelog_start = strpos($eightlaw_changelog,'== Changelog ==');
	$eightlaw_changelog_before = substr($eightlaw_changelog,0,($changelog_start+17));
	$eightlaw_changelog = str_replace($eightlaw_changelog_before,'',$eightlaw_changelog);
	$eightlaw_changelog_lines = explode( PHP_EOL, $eightlaw_changelog );
	foreach ( $eightlaw_changelog_lines as $eightlaw_changelog_line ) {
		if ( substr( $eightlaw_changelog_line, 0, 5 ) === "= 1.0" ) {
			echo '<h4>' . substr( $eightlaw_changelog_line,0, 10 ) . '</h4>';
		} else {
			echo esc_html( $eightlaw_changelog_line ), '<br/>';
		}
	}
	echo '<hr />';
	?>
</div>