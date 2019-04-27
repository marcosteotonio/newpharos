<?php
/**
 * The template part for displaying grid post
 *
 * @package tafri-travel
 * @subpackage tafri-travel
 * @since tafri-travel 1.0
 */
?>
<div class="col-lg-4 col-md-4">
    <div class="page-box">
        <div class="box-img">
            <img src="<?php the_post_thumbnail_url('full'); ?>"/>
        </div>
        <div class="new-text">
            <h4><?php the_title();?></h4>
            <div class="metabox">
                <span class="entry-date"><i class="fas fa-calendar-alt"></i><?php echo esc_html( get_the_date() ); ?></span>
                <span class="entry-comments"><i class="fas fa-comments"></i> <?php comments_number( __('0 Comment', 'tafri-travel'), __('0 Comments', 'tafri-travel'), __('% Comments', 'tafri-travel') ); ?> </span>
                <span class="entry-author"><i class="fas fa-user"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a></span>
            </div>
            <p><?php the_excerpt();?></p>        
            <div class="read-more-btn">
                <a href="<?php the_permalink(); ?>"><?php echo esc_html_e('READ MORE','tafri-travel'); ?></a>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>