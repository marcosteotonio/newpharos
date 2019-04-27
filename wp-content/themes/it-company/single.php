<?php
/**
 * The Template for displaying all single posts.
 * @package IT Company
 */

get_header(); ?>

<div class="container">
    <div class="main-wrap-box">
    	<?php
	    $left_right = get_theme_mod( 'it_company_layout','Left Sidebar');
	    if($left_right == 'Right Sidebar'){ ?>
		    <div class="row">
				<div class="col-lg-9 col-md-9" id="wrapper">
					<div class="feature-box">
			            <div class="bradcrumbs">
			                <?php it_company_the_breadcrumb(); ?>
			            </div>
					</div>
					<?php while ( have_posts() ) : the_post(); ?>
						<h1><?php the_title();?></h1>
						<div class="post-info">
					        <i class="fa fa-calendar" aria-hidden="true"></i><span class="entry-date"><?php the_date(); ?></span>
					        <i class="fa fa-user" aria-hidden="true"></i><span class="entry-author"> <?php the_author(); ?></span>
					        <i class="fa fa-comments" aria-hidden="true"></i><span class="entry-comments"> <?php comments_number( __('0 Comments','it-company'), __('0 Comments','it-company'), __('% Comments','it-company') ); ?></span> 
					    </div>
						<?php if(has_post_thumbnail()) { ?>
							<hr>
							<div class="feature-box">	
								<img src="<?php the_post_thumbnail_url('full'); ?>" width="100%">
							</div>
							<hr>					
						<?php } 
						the_content();

						wp_link_pages( array(
							'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'it-company' ) . '</span>',
							'after'       => '</div>',
							'link_before' => '<span>',
							'link_after'  => '</span>',
							'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'it-company' ) . ' </span>%',
							'separator'   => '<span class="screen-reader-text">, </span>',
						) );
							
						if ( is_singular( 'attachment' ) ) {
							// Parent post navigation.
							the_post_navigation( array(
								'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'it-company' ),
							) );
						} elseif ( is_singular( 'post' ) ) {
							// Previous/next post navigation.
							the_post_navigation( array(
								'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'it-company' ) . '</span> ' .
									'<span class="screen-reader-text">' . __( 'Next post:', 'it-company' ) . '</span> ' .
									'<span class="post-title">%title</span>',
								'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'it-company' ) . '</span> ' .
									'<span class="screen-reader-text">' . __( 'Previous post:', 'it-company' ) . '</span> ' .
									'<span class="post-title">%title</span>',
							) );
						}
		                
		                echo '<div class="clearfix"></div>';
		                
						the_tags(); 

		                // If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) {
							comments_template();
						}

		            endwhile; // end of the loop. 
		            wp_reset_postdata();?>
		       	</div>
				<div class="col-lg-3 col-md-3"><?php get_sidebar();?></div>
			</div>
		<?php }else if($left_right == 'Left Sidebar'){ ?>
			<div class="row">
				<div class="col-lg-3 col-md-3"><?php get_sidebar();?></div>
				<div class="col-lg-9 col-md-9" id="wrapper">
					<div class="feature-box">
			            <div class="bradcrumbs">
			                <?php it_company_the_breadcrumb(); ?>
			            </div>
					</div>
					<?php while ( have_posts() ) : the_post(); ?>
						<h1><?php the_title();?></h1>
						<div class="post-info">
					        <i class="fa fa-calendar" aria-hidden="true"></i><span class="entry-date"><?php the_date(); ?></span>
					        <i class="fa fa-user" aria-hidden="true"></i><span class="entry-author"> <?php the_author(); ?></span>
					        <i class="fa fa-comments" aria-hidden="true"></i><span class="entry-comments"> <?php comments_number( __('0 Comments','it-company'), __('0 Comments','it-company'), __('% Comments','it-company') ); ?></span> 
					    </div>
						<?php if(has_post_thumbnail()) { ?>
							<hr>
							<div class="feature-box">	
								<img src="<?php the_post_thumbnail_url('full'); ?>" width="100%">
							</div>
							<hr>					
						<?php } 
						the_content();

						wp_link_pages( array(
							'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'it-company' ) . '</span>',
							'after'       => '</div>',
							'link_before' => '<span>',
							'link_after'  => '</span>',
							'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'it-company' ) . ' </span>%',
							'separator'   => '<span class="screen-reader-text">, </span>',
						) );
							
						if ( is_singular( 'attachment' ) ) {
							// Parent post navigation.
							the_post_navigation( array(
								'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'it-company' ),
							) );
						} elseif ( is_singular( 'post' ) ) {
							// Previous/next post navigation.
							the_post_navigation( array(
								'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'it-company' ) . '</span> ' .
									'<span class="screen-reader-text">' . __( 'Next post:', 'it-company' ) . '</span> ' .
									'<span class="post-title">%title</span>',
								'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'it-company' ) . '</span> ' .
									'<span class="screen-reader-text">' . __( 'Previous post:', 'it-company' ) . '</span> ' .
									'<span class="post-title">%title</span>',
							) );
						}
		                
		                echo '<div class="clearfix"></div>';
		                
						the_tags(); 

		                // If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) {
							comments_template();
						}
		            endwhile; // end of the loop. 
		            wp_reset_postdata();?>
		       	</div>	     
		    </div>  	
		<?php }else if($left_right == 'One Column'){ ?>
			<div id="wrapper">
				<div class="feature-box">
		            <div class="bradcrumbs">
		                <?php it_company_the_breadcrumb(); ?>
		            </div>
				</div>
				<?php while ( have_posts() ) : the_post(); ?>
					<h1><?php the_title();?></h1>
					<div class="post-info">
				        <i class="fa fa-calendar" aria-hidden="true"></i><span class="entry-date"><?php the_date(); ?></span>
				        <i class="fa fa-user" aria-hidden="true"></i><span class="entry-author"> <?php the_author(); ?></span>
				        <i class="fa fa-comments" aria-hidden="true"></i><span class="entry-comments"> <?php comments_number( __('0 Comments','it-company'), __('0 Comments','it-company'), __('% Comments','it-company') ); ?></span> 
				    </div>
					<?php if(has_post_thumbnail()) { ?>
						<hr>
						<div class="feature-box">	
							<img src="<?php the_post_thumbnail_url('full'); ?>" width="100%">
						</div>
						<hr>					
					<?php } 
					the_content();

					wp_link_pages( array(
						'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'it-company' ) . '</span>',
						'after'       => '</div>',
						'link_before' => '<span>',
						'link_after'  => '</span>',
						'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'it-company' ) . ' </span>%',
						'separator'   => '<span class="screen-reader-text">, </span>',
					) );
						
					if ( is_singular( 'attachment' ) ) {
						// Parent post navigation.
						the_post_navigation( array(
							'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'it-company' ),
						) );
					} elseif ( is_singular( 'post' ) ) {
						// Previous/next post navigation.
						the_post_navigation( array(
							'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'it-company' ) . '</span> ' .
								'<span class="screen-reader-text">' . __( 'Next post:', 'it-company' ) . '</span> ' .
								'<span class="post-title">%title</span>',
							'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'it-company' ) . '</span> ' .
								'<span class="screen-reader-text">' . __( 'Previous post:', 'it-company' ) . '</span> ' .
								'<span class="post-title">%title</span>',
						) );
					}
	                
	                echo '<div class="clearfix"></div>';
	                
					the_tags(); 

	                // If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
					setPostViews(get_the_ID());
	            endwhile; // end of the loop. 
	            wp_reset_postdata();?>
	       	</div>
	    <?php }else if($left_right == 'Three Columns'){ ?>
		    <div class="row">
		        <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-1');?></div>
				<div class="col-lg-6 col-md-6" id="wrapper">
					<div class="feature-box">
			            <div class="bradcrumbs">
			                <?php it_company_the_breadcrumb(); ?>
			            </div>
					</div>
					<?php while ( have_posts() ) : the_post(); ?>
						<h1><?php the_title();?></h1>
						<div class="post-info">
					        <i class="fa fa-calendar" aria-hidden="true"></i><span class="entry-date"><?php the_date(); ?></span>
					        <i class="fa fa-user" aria-hidden="true"></i><span class="entry-author"> <?php the_author(); ?></span>
					        <i class="fa fa-comments" aria-hidden="true"></i><span class="entry-comments"> <?php comments_number( __('0 Comments','it-company'), __('0 Comments','it-company'), __('% Comments','it-company') ); ?></span> 
					    </div>
						<?php if(has_post_thumbnail()) { ?>
							<hr>
							<div class="feature-box">	
								<img src="<?php the_post_thumbnail_url('full'); ?>" width="100%">
							</div>
							<hr>					
						<?php } 
						the_content();

						wp_link_pages( array(
							'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'it-company' ) . '</span>',
							'after'       => '</div>',
							'link_before' => '<span>',
							'link_after'  => '</span>',
							'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'it-company' ) . ' </span>%',
							'separator'   => '<span class="screen-reader-text">, </span>',
						) );
							
						if ( is_singular( 'attachment' ) ) {
							// Parent post navigation.
							the_post_navigation( array(
								'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'it-company' ),
							) );
						} elseif ( is_singular( 'post' ) ) {
							// Previous/next post navigation.
							the_post_navigation( array(
								'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'it-company' ) . '</span> ' .
									'<span class="screen-reader-text">' . __( 'Next post:', 'it-company' ) . '</span> ' .
									'<span class="post-title">%title</span>',
								'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'it-company' ) . '</span> ' .
									'<span class="screen-reader-text">' . __( 'Previous post:', 'it-company' ) . '</span> ' .
									'<span class="post-title">%title</span>',
							) );
						}
		                
		                echo '<div class="clearfix"></div>';
		                
						the_tags(); 

		                // If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) {
							comments_template();
						}
		            endwhile; // end of the loop. 
		            wp_reset_postdata();?>
		       	</div>
	       		<div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-2');?></div>
		    </div>
	    <?php }else if($left_right == 'Four Columns'){ ?>
		    <div class="row">
		        <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-1');?></div>
				<div class="col-lg-3 col-md-3" id="wrapper">
					<div class="feature-box">
			            <div class="bradcrumbs">
			                <?php it_company_the_breadcrumb(); ?>
			            </div>
					</div>
					<?php while ( have_posts() ) : the_post(); ?>
						<h1><?php the_title();?></h1>
						<div class="post-info">
					        <i class="fa fa-calendar" aria-hidden="true"></i><span class="entry-date"><?php the_date(); ?></span>
					        <i class="fa fa-user" aria-hidden="true"></i><span class="entry-author"> <?php the_author(); ?></span>
					        <i class="fa fa-comments" aria-hidden="true"></i><span class="entry-comments"> <?php comments_number( __('0 Comments','it-company'), __('0 Comments','it-company'), __('% Comments','it-company') ); ?></span> 
					    </div>
						<?php if(has_post_thumbnail()) { ?>
							<hr>
							<div class="feature-box">	
								<img src="<?php the_post_thumbnail_url('full'); ?>" width="100%">
							</div>
							<hr>					
						<?php } 
						the_content();

						wp_link_pages( array(
							'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'it-company' ) . '</span>',
							'after'       => '</div>',
							'link_before' => '<span>',
							'link_after'  => '</span>',
							'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'it-company' ) . ' </span>%',
							'separator'   => '<span class="screen-reader-text">, </span>',
						) );
							
						if ( is_singular( 'attachment' ) ) {
							// Parent post navigation.
							the_post_navigation( array(
								'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'it-company' ),
							) );
						} elseif ( is_singular( 'post' ) ) {
							// Previous/next post navigation.
							the_post_navigation( array(
								'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'it-company' ) . '</span> ' .
									'<span class="screen-reader-text">' . __( 'Next post:', 'it-company' ) . '</span> ' .
									'<span class="post-title">%title</span>',
								'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'it-company' ) . '</span> ' .
									'<span class="screen-reader-text">' . __( 'Previous post:', 'it-company' ) . '</span> ' .
									'<span class="post-title">%title</span>',
							) );
						}
		                
		                echo '<div class="clearfix"></div>';
		                
						the_tags(); 

		                // If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) {
							comments_template();
						}
		            endwhile; // end of the loop. 
		            wp_reset_postdata();?>
		       	</div>
		       	<div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-2');?></div>
		       	<div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-3');?></div>
		    </div>
	    <?php }else if($left_right == 'Grid Layout'){ ?>
	    <div class="row">
	    	<div class="col-lg-4 col-md-4"><?php get_sidebar();?></div>
			<div class="col-lg-8 col-md-8" id="wrapper">
				<div class="feature-box">
		            <div class="bradcrumbs">
		                <?php it_company_the_breadcrumb(); ?>
		            </div>
				</div>
				<?php while ( have_posts() ) : the_post(); ?>
					<h1><?php the_title();?></h1>
					<div class="post-info">
				        <i class="fa fa-calendar" aria-hidden="true"></i><span class="entry-date"><?php the_date(); ?></span>
				        <i class="fa fa-user" aria-hidden="true"></i><span class="entry-author"> <?php the_author(); ?></span>
				        <i class="fa fa-comments" aria-hidden="true"></i><span class="entry-comments"> <?php comments_number( __('0 Comments','it-company'), __('0 Comments','it-company'), __('% Comments','it-company') ); ?></span> 
				    </div>
					<?php if(has_post_thumbnail()) { ?>
						<hr>
						<div class="feature-box">	
							<img src="<?php the_post_thumbnail_url('full'); ?>" width="100%">
						</div>
						<hr>					
					<?php } 
					the_content();

					wp_link_pages( array(
						'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'it-company' ) . '</span>',
						'after'       => '</div>',
						'link_before' => '<span>',
						'link_after'  => '</span>',
						'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'it-company' ) . ' </span>%',
						'separator'   => '<span class="screen-reader-text">, </span>',
					) );
						
					if ( is_singular( 'attachment' ) ) {
						// Parent post navigation.
						the_post_navigation( array(
							'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'it-company' ),
						) );
					} elseif ( is_singular( 'post' ) ) {
						// Previous/next post navigation.
						the_post_navigation( array(
							'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'it-company' ) . '</span> ' .
								'<span class="screen-reader-text">' . __( 'Next post:', 'it-company' ) . '</span> ' .
								'<span class="post-title">%title</span>',
							'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'it-company' ) . '</span> ' .
								'<span class="screen-reader-text">' . __( 'Previous post:', 'it-company' ) . '</span> ' .
								'<span class="post-title">%title</span>',
						) );
					}
	                
	                echo '<div class="clearfix"></div>';
	                
					the_tags(); 

	                // If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
	            endwhile; // end of the loop. 
	            wp_reset_postdata();?>
	       	</div>
	    </div>
	    <?php }?>
        <div class="clearfix"></div>
    </div>
</div>
<?php get_footer(); ?>