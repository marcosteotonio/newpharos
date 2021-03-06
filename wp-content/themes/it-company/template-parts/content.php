<?php
/**
 * The template part for displaying services
 * @package IT Company
 * @subpackage it_company
 * @since 1.0
 */
?>
<div class="blog-sec animated fadeInDown">
  <div class="mainimage">
    <?php 
      if(has_post_thumbnail()) { 
        the_post_thumbnail(); 
      }
    ?>
  </div>
  <h3><a href="<?php echo esc_url(get_permalink() ); ?>"><?php the_title(); ?></a></h3>
  <div class="post-info">
    <i class="fa fa-calendar" aria-hidden="true"></i><span class="entry-date"><?php the_date(); ?></span>
    <i class="fa fa-user" aria-hidden="true"></i><span class="entry-author"> <?php the_author(); ?></span>
    <i class="fa fa-comments" aria-hidden="true"></i><span class="entry-comments"><?php comments_number( __('0 Comments','it-company'), __('0 Comments','it-company'), __('% Comments','it-company') ); ?></span> 
  </div>
  <p><?php the_excerpt(); ?></p>
  <div class="blogbtn">
    <a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small" title="<?php esc_attr_e( 'Read Full', 'it-company' ); ?>"><?php esc_html_e('Read Full','it-company'); ?></a>
  </div>
</div>