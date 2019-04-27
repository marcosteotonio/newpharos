<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content-vw">
 *
 * @package VW Charity NGO
 */

?><!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <link rel="profile" href="<?php echo esc_url( __( 'http://gmpg.org/xfn/11', 'vw-charity-ngo' ) ); ?>">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php get_template_part('template-parts/header/content-header'); ?>
<?php get_template_part('template-parts/header/navigation'); ?>