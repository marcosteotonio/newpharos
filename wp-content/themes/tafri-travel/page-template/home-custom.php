<?php
/**
 * Template Name: Home Custom Page
 */

get_header(); ?>

<?php do_action( 'tafri_travel_above_slider' ); ?>

<?php if( get_theme_mod( 'tafri_travel_slider_hide') != '') { ?>
  <section id="slider">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> 
      <?php $pages = array();
        for ( $count = 1; $count <= 3; $count++ ) {
          $mod = intval( get_theme_mod( 'tafri_travel_slider_page' . $count ));
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
                <hr>
                <p><?php $excerpt = get_the_excerpt(); echo esc_html( tafri_travel_string_limit_words( $excerpt,20 ) ); ?></p>
                <div class="view-btn">
                  <a href="<?php the_permalink(); ?>"><?php echo esc_html_e('View All Travels','tafri-travel'); ?></a>
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
      <div class="slider-nex-pre">
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
        </a>
      </div>
    </div>
    <div class="clearfix"></div>
  </section>
<?php } ?>

<?php do_action( 'tafri_travel_below_slider' ); ?>

<?php if( get_theme_mod('tafri_travel_title') != '' || get_theme_mod( 'tafri_travel_desc' )!= ''|| get_theme_mod( 'tafri_travel_popular_destination' )!= ''){ ?>
  <section id="destination">
    <div class="container">
      <?php if( get_theme_mod('tafri_travel_title') != ''){ ?>
        <hr><h2><?php echo esc_html(get_theme_mod('tafri_travel_title','')); ?></h2>
      <?php } ?>
      <?php if( get_theme_mod('tafri_travel_desc') != ''){ ?>
        <p><?php echo esc_html(get_theme_mod('tafri_travel_desc','')); ?></p>
      <?php } ?>
      <div class="row">
        <?php 
        $catData =  get_theme_mod('tafri_travel_popular_destination');
        if($catData){
          $page_query = new WP_Query(array( 'category_name' => esc_html($catData,'tafri-travel')));?>
            <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
              <div class="col-lg-3 col-md-6">
                <div class="des_box">
                  <div class="des_box_img">
                    <?php if(has_post_thumbnail()) { ?><?php the_post_thumbnail(); ?><?php } ?>
                  </div>
                  <div class="des_content">
                    <h4><?php the_title(); ?></h4>
                    <p>
                      <?php $excerpt = get_the_excerpt(); echo esc_html( tafri_travel_string_limit_words( $excerpt,12 ) ); ?>
                    </p> 
                    <div class="read-btn">
                      <a href="<?php the_permalink(); ?>"><?php echo esc_html_e('Read More','tafri-travel'); ?><i class="fas fa-arrow-right"></i>
                      </a>
                    </div>
                  </div>
                  <h3 class="title-btn"><?php the_title(); ?></h3>
                </div>
              </div> 
            <?php endwhile;
            wp_reset_postdata();
            }
        ?>
      </div>
    </div>
  </section>
<?php }?>

<?php do_action( 'tafri_travel_below_destination_section' ); ?>

<div id="content">
  <div class="container">
    <?php while ( have_posts() ) : the_post(); ?>
      <?php the_content(); ?>
    <?php endwhile; // end of the loop. ?>
  </div>
</div>

<?php get_footer(); ?>