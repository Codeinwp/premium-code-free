<?php
/*
	Template Name: Right sidebar template
*/
?>
<?php get_header(); ?>
<?php 
	while ( have_posts() ) : the_post(); 
?>
		<div class="generalheadline">
			<h3><?php the_title(); ?></h3>
		</div><!--/generalheadline-->
		<div id="wrap">
			<div id="content" class="fleft">
				<?php 
				the_content(); 
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'premium-code' ),
					'after'  => '</div>',
				) );
				?>		
				<div id="commentlist">
					<div class="commentscount">
						<div class="counter"><?php comments_number( 'No comments', 'One comment', '% Comments' ); ?></div>
						<nav class="commnav">
							<?php next_comments_link("next page") ?> -
							<?php previous_comments_link("prev page"); ?>
						</nav><!--/commnav-->
					</div><!--/commentscount-->
					<?php comments_template();?>
				</div><!--/commentlist-->
				<div class="headingsix"><?php _e('Leave a Comment', 'premium-code'); ?></div>	
					<?php
					$comments_args = array(
								'label_submit'=>'POST',
								'comment_notes_before' => '',
								'comment_notes_after' => '',
								'title_reply' => '',
								'comment_field' => '<div class="item"><label for="comment">Your comment<span>*</span></label><textarea class="txtarea input-bungot" id="comment" name="comment" ></textarea></div>',
								'fields' => array(
								'author' => '<div class="item"><label for="author">Your name<span>*</span></label><input class="txtfield input-bungot" id="author" name="author" type="text" value="" /></div>',
								'email' => '<div class="item"><label for="email">Your e-mail<span>*</span></label><input class="txtfield input-bungot" id="email" name="email" type="text" value=""/></div>'
							),
					);
					echo '<div id="commentform">';
						echo '<fieldset>';
							comment_form( $comments_args );
						echo '</fieldset>';
					echo '</div>';
				?>
			</div><!--/content-wrap-right-->
			
			<div id="sidebar" class="fleft sidebarright">
				<?php get_sidebar( 'rightsidebar' ); ?>
			</div><!--/sidebar-->
		</div><!--/wrap-->
<?php	
	endwhile;	
?>
<?php get_footer(); ?>