<?php
/**
 * The Template for displaying all single posts.
 *
 * @package tafri-travel
 */

get_header(); ?>

<div class="container">
    <div class="middle-align">
    	<?php
            $left_right = get_theme_mod( 'tafri_travel_layout_options','Right Sidebar');
            if($left_right == 'Left Sidebar'){ ?>
            <div class="row m-0">
		    	<div id="sidebar" class="col-lg-4 col-md-4">
					<?php dynamic_sidebar('sidebar-1'); ?>
				</div>
				<div class="col-lg-8 col-md-8" id="content-box">
					<?php
						/* Start the Loop */
						while ( have_posts() ) : the_post();

							get_template_part( 'template-parts/content-single' );

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

							the_post_navigation( array(
								'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'tafri-travel' ) . '</span> ' .
									'<span class="screen-reader-text">' . __( 'Next post:', 'tafri-travel' ) . '</span> ' .
									'<span class="post-title">%title</span>',
								'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'tafri-travel' ) . '</span> ' .
									'<span class="screen-reader-text">' . __( 'Previous post:', 'tafri-travel' ) . '</span> ' .
									'<span class="post-title">%title</span>',
							) );

						endwhile; // End of the loop.
					?>
		       	</div>
		    </div>
	    <?php }else if($left_right == 'Right Sidebar'){ ?>
	    	<div class="row m-0">
		       	<div class="col-lg-8 col-md-8" id="content-box">
					<?php
						/* Start the Loop */
						while ( have_posts() ) : the_post();

							get_template_part( 'template-parts/content-single' );

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

							the_post_navigation( array(
								'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'tafri-travel' ) . '</span> ' .
									'<span class="screen-reader-text">' . __( 'Next post:', 'tafri-travel' ) . '</span> ' .
									'<span class="post-title">%title</span>',
								'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'tafri-travel' ) . '</span> ' .
									'<span class="screen-reader-text">' . __( 'Previous post:', 'tafri-travel' ) . '</span> ' .
									'<span class="post-title">%title</span>',
							) );

						endwhile; // End of the loop.
					?>
		       	</div>
				<div id="sidebar" class="col-lg-4 col-md-4">
					<?php dynamic_sidebar('sidebar-1'); ?>
				</div>
			</div>
		<?php }else if($left_right == 'One Column'){ ?>
			<div id="content-box">
				<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content-single' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

						the_post_navigation( array(
							'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'tafri-travel' ) . '</span> ' .
								'<span class="screen-reader-text">' . __( 'Next post:', 'tafri-travel' ) . '</span> ' .
								'<span class="post-title">%title</span>',
							'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'tafri-travel' ) . '</span> ' .
								'<span class="screen-reader-text">' . __( 'Previous post:', 'tafri-travel' ) . '</span> ' .
								'<span class="post-title">%title</span>',
						) );

					endwhile; // End of the loop.
				?>
	       	</div>
	    <?php }else if($left_right == 'Grid Layout'){ ?>
			<div class="row m-0">
				<div class="col-lg-8 col-md-8" id="content-box">
					<?php
						/* Start the Loop */
						while ( have_posts() ) : the_post();

							get_template_part( 'template-parts/content-single' );

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

							the_post_navigation( array(
								'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'tafri-travel' ) . '</span> ' .
									'<span class="screen-reader-text">' . __( 'Next post:', 'tafri-travel' ) . '</span> ' .
									'<span class="post-title">%title</span>',
								'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'tafri-travel' ) . '</span> ' .
									'<span class="screen-reader-text">' . __( 'Previous post:', 'tafri-travel' ) . '</span> ' .
									'<span class="post-title">%title</span>',
							) );

						endwhile; // End of the loop.
					?>
		       	</div>
				<div id="sidebar" class="col-lg-4 col-md-4">
					<?php dynamic_sidebar('sidebar-2'); ?>
				</div>
			</div>
		<?php } else { ?>
			<div class="row m-0">
		       	<div class="col-lg-8 col-md-8" id="content-box">
					<?php
						/* Start the Loop */
						while ( have_posts() ) : the_post();

							get_template_part( 'template-parts/content-single' );

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

							the_post_navigation( array(
								'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'tafri-travel' ) . '</span> ' .
									'<span class="screen-reader-text">' . __( 'Next post:', 'tafri-travel' ) . '</span> ' .
									'<span class="post-title">%title</span>',
								'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'tafri-travel' ) . '</span> ' .
									'<span class="screen-reader-text">' . __( 'Previous post:', 'tafri-travel' ) . '</span> ' .
									'<span class="post-title">%title</span>',
							) );

						endwhile; // End of the loop.
					?>
		       	</div>
				<div id="sidebar" class="col-lg-4 col-md-4">
					<?php dynamic_sidebar('sidebar-1'); ?>
				</div>
			</div>
		<?php }?>
	    <div class="clearfix"></div>
    </div>
</div>

<?php get_footer(); ?>