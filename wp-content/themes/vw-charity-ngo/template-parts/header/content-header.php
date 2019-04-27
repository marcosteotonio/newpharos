<div id="top-bar">
  <div class="container">
    <div class="row m-0">
      <div class="col-lg-9 col-md-9">
        <div class="row m-0">        
          <div class="col-md-4">
            <?php if ( get_theme_mod('vw_charity_ngo_address','') != "" ) {?>
              <span class="email"><i class="fas fa-map-marker-alt"></i> <?php echo esc_html( get_theme_mod('vw_charity_ngo_address',__('123 Dummy Street, USA','vw-charity-ngo')) ); ?></span>
            <?php }?>
          </div>
          <div class="col-md-4">
            <?php if ( get_theme_mod('vw_charity_ngo_contact','') != "" ) {?>
              <span class="call"><i class="fas fa-mobile-alt"></i> <?php echo esc_html( get_theme_mod('vw_charity_ngo_contact',__('+00 1234-5678-90','vw-charity-ngo') )); ?></span>
            <?php }?>
          </div>
          <div class="col-md-4">
            <?php if ( get_theme_mod('vw_charity_ngo_email','') != "" ) {?>
              <span class="email"><i class="fa fa-envelope" aria-hidden="true"></i> <?php echo esc_html( get_theme_mod('vw_charity_ngo_email',__('info@youremail.com','vw-charity-ngo')) ); ?></span>
            <?php }?>
          </div>        
        </div>
      </div>
      <div class="col-lg-3 col-md-3">
        <div class="socialbox">
          <?php dynamic_sidebar('social-icon') ?>
        </div>
      </div>
    </div>
  </div>
</div>