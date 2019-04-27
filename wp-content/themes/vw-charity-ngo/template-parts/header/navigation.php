<div class="toggle"><a class="toggleMenu" href="#"><?php esc_html_e('Menu','vw-charity-ngo'); ?></a></div>  
<div id="header" class="menubar">
  <div class="container">
    <div class="row">
      <div class="logo col-lg-3 col-md-3">
        <?php if( has_custom_logo() ){ vw_charity_ngo_the_custom_logo();
        }else{ ?>
          <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
          <?php $description = get_bloginfo( 'description', 'display' );
          if ( $description || is_customize_preview() ) : ?>
            <p class="site-description"><?php echo esc_html($description); ?></p>
        <?php endif; } ?>
      </div>
      <div class="col-lg-7 col-md-7 nav">
        <?php wp_nav_menu( array('theme_location'  => 'primary') ); ?>
      </div>
      <div class="col-lg-2 col-md-2">
        <?php if( get_theme_mod('vw_charity_ngo_link') != ''){ ?>
          <div class ="donate">
            <a href="<?php echo esc_url(get_theme_mod('vw_charity_ngo_link','#')); ?>"><?php echo esc_html(get_theme_mod('vw_charity_ngo_text',__('Donate Now','vw-charity-ngo'))); ?></a>
          </div>
        <?php }?>
      </div>
    </div>
  </div>
</div>