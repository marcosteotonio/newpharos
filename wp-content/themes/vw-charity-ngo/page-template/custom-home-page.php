<?php
/**
 * Template Name: Custom Home
 */

get_header(); ?>

<?php do_action( 'vw_charity_ngo_before_slider' ); ?>

<section id="slider">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> 
    <?php $pages = array();
      for ( $count = 1; $count <= 3; $count++ ) {
        $mod = intval( get_theme_mod( 'vw_charity_ngo_slider_page' . $count ));
        if ( 'page-none-selected' != $mod ) {
          $pages[] = $mod;
        }
      }
      if( !empty($pages) ) :
        $args = array(
          'post_type' => 'page',
          'post__in' => $pages,
          'orderby' => 'post__in'
        );
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) :
          $i = 1;
    ?>     
    <div class="carousel-inner" role="listbox">
      <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
        <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
          <img src="<?php the_post_thumbnail_url('full'); ?>"/>
          <div class="carousel-caption">
            <div class="inner_carousel">
              <h2><?php the_title(); ?></h2>
              <hr class="head-line">
              <p><?php the_excerpt(); ?></p>
              <div class="more-btn">              
                <a href="<?php the_permalink(); ?>"><?php esc_html_e('READ MORE','vw-charity-ngo'); ?></a>
              </div>
            </div>
          </div>
        </div>
      <?php $i++; endwhile; 
      wp_reset_postdata();?>
    </div>
    <?php else : ?>
        <div class="no-postfound"></div>
      <?php endif;
    endif;?>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
    </a>
  </div>  
  <div class="clearfix"></div>
</section> 

<?php do_action( 'vw_charity_ngo_after_slider' ); ?>

<section id="scholarship">
  <div class="container">
    <div class="row scholarship-box">
      <?php $pages = array();
        for ( $count = 1; $count <= 3; $count++ ) {
          $mod = intval( get_theme_mod( 'vw_charity_ngo_scholarship_page' . $count ));
          if ( 'page-none-selected' != $mod ) {
            $pages[] = $mod;
          }
        }
        if( !empty($pages) ) :
          $args = array(
            'post_type' => 'page',
            'post__in' => $pages,
            'orderby' => 'post__in'
          );
          $query = new WP_Query( $args );
          if ( $query->have_posts() ) :
            $count = 1;
            while ( $query->have_posts() ) : $query->the_post(); ?>
                <div class="col-md-4">
                  <div class="row">
                    <div class="col-md-3">
                      <img src="<?php the_post_thumbnail_url('full'); ?>"/>
                    </div>
                    <div class="col-md-9">
                        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                        <hr class="scholar">
                        <p><?php $excerpt = get_the_excerpt(); echo esc_html( vw_charity_ngo_string_limit_words( $excerpt,10 ) ); ?></p>
                    </div>
                  </div>
                </div>
            <?php $count++; endwhile; 
            wp_reset_postdata();?>
          <?php else : ?>
            <div class="no-postfound"></div>
        <?php endif;
      endif;?>
        <div class="clearfix"></div>
      </div>
  </div> 
</section>

<?php do_action( 'vw_charity_ngo_after_scholarship' ); ?>

<section id="what-do">
  <div class="container">
    <?php if( get_theme_mod('vw_charity_ngo_what_title') != ''){ ?>
      <h3><?php echo esc_html(get_theme_mod('vw_charity_ngo_what_title',__('What We Do','vw-charity-ngo'))); ?></h3>
      <hr class="title">
    <?php }?>
    <div class="row">
      <?php $pages = array();
        for ( $count = 1; $count <= 3; $count++ ) {
          $mod = intval( get_theme_mod( 'vw_charity_ngo_what_do_page' . $count ));
          if ( 'page-none-selected' != $mod ) {
            $pages[] = $mod;
          }
        }
        if( !empty($pages) ) :
          $args = array(
            'post_type' => 'page',
            'post__in' => $pages,
            'orderby' => 'post__in'
          );
          $query = new WP_Query( $args );
          if ( $query->have_posts() ) :
            $count = 1;
            while ( $query->have_posts() ) : $query->the_post(); ?>
                <div class="col-md-4">
                  <img src="<?php the_post_thumbnail_url('full'); ?>"/>
                  <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                  <hr class="what_do">
                  <p><?php $excerpt = get_the_excerpt(); echo esc_html( vw_charity_ngo_string_limit_words( $excerpt,30 ) ); ?></p>
                </div>
            <?php $count++; endwhile; 
            wp_reset_postdata();?>
          <?php else : ?>
            <div class="no-postfound"></div>
        <?php endif;
      endif;?>
        <div class="clearfix"></div>
    </div>
  </div> 
</section>

<?php do_action( 'vw_charity_ngo_after_what_we_do' ); ?>

<div class="container">
  <?php while ( have_posts() ) : the_post(); ?>
    <?php the_content(); ?>
  <?php endwhile; // end of the loop. ?>
</div>

<?php get_footer(); ?>