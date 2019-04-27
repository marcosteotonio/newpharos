<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content-box">
 *
 * @package tafri-travel
 */

?><!DOCTYPE html>

<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <link rel="profile" href="<?php echo esc_url( __( 'http://gmpg.org/xfn/11', 'tafri-travel' ) ); ?>">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="toggle"><a class="toggleMenu" href="#"><?php esc_html_e('Menu','tafri-travel'); ?></a></div>
<div class="top-header">
  <div class="container">
    <div class="row">
      <div class="col-lg-5 col-md-5">
        <div class="timing">
          <?php if( get_theme_mod('tafri_travel_timing') != ''){ ?>
            <p><i class="far fa-clock"></i><?php echo esc_html( get_theme_mod('tafri_travel_timing','')); ?></p>
          <?php } ?>
        </div>
      </div>
      <div class="col-lg-4 col-md-4">
        <div class="social-icons">
          <?php if( get_theme_mod( 'tafri_travel_facebook_url') != '') { ?>
              <a href="<?php echo esc_url( get_theme_mod( 'tafri_travel_facebook_url','' ) ); ?>"><i class="fab fa-facebook-f" aria-hidden="true"></i></a><span>/</span>
            <?php } ?>
            <?php if( get_theme_mod( 'tafri_travel_twitter_url') != '') { ?>
              <a href="<?php echo esc_url( get_theme_mod( 'tafri_travel_twitter_url','' ) ); ?>"><i class="fab fa-twitter"></i></a><span>/</span>
            <?php } ?>
            <?php if( get_theme_mod( 'tafri_travel_insta_url') != '') { ?>
              <a href="<?php echo esc_url( get_theme_mod( 'tafri_travel_insta_url','' ) ); ?>"><i class="fab fa-instagram"></i></a><span>/</span>
            <?php } ?> 
            <?php if( get_theme_mod( 'tafri_travel_linkedin_url') != '') { ?>
              <a href="<?php echo esc_url( get_theme_mod( 'tafri_travel_linkedin_url','' ) ); ?>"><i class="fab fa-linkedin-in"></i></a><span>/</span>
            <?php } ?> 
            <?php if( get_theme_mod( 'tafri_travel_pintrest_url') != '') { ?>
              <a href="<?php echo esc_url( get_theme_mod( 'tafri_travel_pintrest_url','' ) ); ?>"><i class="fab fa-pinterest-p"></i></a><span>/</span>
            <?php } ?>  
            <?php if( get_theme_mod( 'tafri_travel_youtube_url') != '') { ?>
              <a href="<?php echo esc_url( get_theme_mod( 'tafri_travel_youtube_url','' ) ); ?>"><i class="fab fa-youtube"></i></a>
            <?php } ?>
        </div> 
      </div>
      <div class="col-lg-1 col-md-1">
        <div class="search-box">
          <i class="fas fa-search"></i>
        </div>
      </div>
      <div class="col-lg-2 col-md-2">
        <p class="account-btn">
          <a href="<?php the_permalink((get_option('woocommerce_myaccount_page_id'))); ?>"><i class="fas fa-user"></i><?php echo esc_html_e('My Account','tafri-travel'); ?></a>
        </p>
      </div>
    </div>
    <div class="serach_outer">
      <div class="closepop"><i class="far fa-window-close"></i></div>
      <div class="serach_inner">
       <?php get_search_form(); ?>
      </div>
    </div>
  </div>
</div>
<div id="header">
  <div class="container">
    <div class="main-menu">
      <div class="responsive-menu">
        <div class="nav">
          <?php wp_nav_menu( array('theme_location'  => 'responsive-menu') ); ?>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 col-md-4">
          <div class="nav left-menu">
            <?php wp_nav_menu( array('theme_location' => 'left-primary') ); ?>
          </div>
        </div>
        <div class="col-lg-4 col-md-4">
          <div class="logo">
             <?php if( has_custom_logo() ){ tafri_travel_the_custom_logo();
             }else{ ?>
              <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
              <?php $description = get_bloginfo( 'description', 'display' );
                if ( $description || is_customize_preview() ) : ?> 
                <p class="site-description"><?php echo esc_html($description); ?></p>       
              <?php endif; }?>
          </div>
        </div>
        <div class="col-lg-4 col-md-4">
          <div class="nav right-menu">
            <?php wp_nav_menu( array('theme_location' => 'right-primary') ); ?>
          </div>
        </div>
      </div>
      <hr>
    </div>
  </div>
</div>