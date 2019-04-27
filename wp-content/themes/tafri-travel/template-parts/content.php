<?php
/**
 * The template part for displaying post 
 *
 * @package tafri-travel
 * @subpackage tafri-travel
 * @since tafri-travel 1.0
 */
?>  
<div class="page-box">
    <div class="row">
        <?php 
            if(has_post_thumbnail()) { ?>
            <div class="box-image col-lg-6 col-md-6">
                <?php the_post_thumbnail();  ?>
            </div>
            <div class="date-color">
              <span class="entry-date"><i class="fas fa-calendar-alt"></i><?php echo esc_html( get_the_date()); ?></span>  
            </div>
        <?php } ?>
        <div class="<?php 
            if(has_post_thumbnail()) { ?>col-lg-6 col-md-6"<?php } else { ?>col-lg-12 col-md-12"<?php } ?>>
          <div class="content">
            <h4><?php the_title();?></h4>        
            <p><?php $excerpt = get_the_excerpt();echo esc_html( tafri_travel_string_limit_words( $excerpt,30 ) ); ?></p>
            <p><?php the_tags(); ?></p>  
             <div class="read-more-btn">
                <a href="<?php the_permalink(); ?>"><?php echo esc_html_e('READ MORE','tafri-travel'); ?></a>
            </div>
          </div>
        </div>
    </div>
    <div class="metabox">
        <span class="entry-comments"><i class="fas fa-comments"></i> <?php comments_number( __('0 Comment', 'tafri-travel'), __('0 Comments', 'tafri-travel'), __('% Comments', 'tafri-travel') ); ?> </span>
        <span class="entry-author"><i class="fas fa-user"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a></span>
    </div>
</div>