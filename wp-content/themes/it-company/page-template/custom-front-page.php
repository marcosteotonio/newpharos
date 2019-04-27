<?php
/**
 * Template Name: Custom home page
 */

get_header(); ?>

<?php do_action('it_company_above_slider_section'); ?>

<?php if( get_theme_mod('it_company_slider_hide') != ''){ ?>
  <section id="slider">
    <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel"> 
      <?php $pages = array();
        for ( $count = 1; $count <= 3; $count++ ) {
          $mod = intval( get_theme_mod( 'it_company_slider_page' . $count ));
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
                <h2 class="animated fadeInDown"><?php the_title(); ?></h2>
                <p><?php $excerpt = get_the_excerpt(); echo esc_html( it_company_string_limit_words( $excerpt,25 ) ); ?></p>
                <div class="more-btn">              
                  <span><a href="<?php the_permalink(); ?>"><?php esc_html_e('Details','it-company'); ?></a></span>
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
<?php }?>

<?php do_action('it_company_below_slider_section'); ?>

<?php if( get_theme_mod('it_company_page_title') != ''){ ?>
  <section id="about">
    <div class="container">
      <?php if( get_theme_mod('it_company_page_title') != ''){ ?>
        <div class="text-center">
          <h3><?php echo esc_html(get_theme_mod('it_company_page_title',__('FEATURED PRODUCTS','it-company'))); ?></h3>
        </div>
      <?php }?>
      <div class="row">
        <div class="col-lg-4 col-md-4">
          <?php 
            $catData=  get_theme_mod('it_company_category');
            if($catData){
              $page_query = new WP_Query(array( 'category_name' => esc_html( $catData ,'it-company')));?>
              <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
              <div class="right-part">
                <div class="row m-0"> 
                  <div class="col-lg-3 col-md-3">
                    <div class="abt-img-box"><?php if(has_post_thumbnail()) { ?><?php the_post_thumbnail(); ?><?php } ?></div>
                  </div>
                  <div class="col-lg-9 col-md-9 p-0">
                    <h4><?php the_title(); ?></h4>     
                    <p><?php $excerpt = get_the_excerpt(); echo esc_html( it_company_string_limit_words( $excerpt,10 ) ); ?></p>
                      <span><a href="<?php the_permalink(); ?>"><?php esc_html_e('Know More','it-company'); ?><i class="fas fa-angle-double-right"></i></a></span>
                  </div>
                </div>
                <div class="clearfix"></div>
              </div>
              <?php endwhile;
              wp_reset_postdata();   
            }       
          ?>
        </div>
        <div class="col-lg-4 col-md-4">
          <?php
            $args = array( 'name' => esc_html( get_theme_mod('it_company_about_setting','')));
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) :
              while ( $query->have_posts() ) : $query->the_post(); ?>
                <div class="abt-image">
                  <img src="<?php the_post_thumbnail_url('full'); ?>"/>              
                </div>    
              <?php endwhile; 
              wp_reset_postdata();?>
              <?php else : ?>
                 <div class="no-postfound"></div>
              <?php
          endif; ?>
        </div>
        <div class="col-lg-4 col-md-4">
          <?php 
            $catData=  get_theme_mod('it_company_category1');
            if($catData){
            $page_query = new WP_Query(array( 'category_name' => esc_html($catData,'it-company')));?>
            <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
            <div class="left-part">
              <div class="row m-0"> 
                <div class="col-lg-3 col-md-3">
                  <div class="abt-img-box"><?php if(has_post_thumbnail()) { ?><?php the_post_thumbnail(); ?><?php } ?></div>
                </div>
                <div class="col-lg-9 col-md-9 p-0">
                  <h4><?php the_title(); ?></h4>     
                  <p><?php $excerpt = get_the_excerpt(); echo esc_html( it_company_string_limit_words( $excerpt,10 ) ); ?></p>
                    <span><a href="<?php the_permalink(); ?>"><?php esc_html_e('Know More','it-company'); ?><i class="fas fa-angle-double-right"></i></a></span>
                </div>
              </div>
              <div class="clearfix"></div>
            </div>
            <?php endwhile;
            wp_reset_postdata();  
            }        
          ?>  
        </div>
      </div>
      <div class="clearfix"></div> 
    </div>
  </section>
<?php }?>

<?php do_action('it_company_after_about_section'); ?>

<div class="container">
  <?php while ( have_posts() ) : the_post(); ?>
    <?php the_content(); ?>
  <?php endwhile; // end of the loop. ?>
</div>

<?php get_footer(); ?>