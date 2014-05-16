<?php 
	get_header(); 
	while ( have_posts() ):
		the_post(); ?>

		<div class="generalheadline">
			<h3><?php the_title();?> </h3>
		</div>

		<div id="wrap">
			<div id="content" class="fleft marginright">
				<?php 
					/* featured image */
						if ( has_post_thumbnail() ): 
							echo '<div class="singleimg">';
								the_post_thumbnail();
							echo '</div>';
						endif;

					/* POST DETAILS */
						echo '<div class="singledetails">';
							echo '<div class="postdetails">';							
								/* post date */								echo '<span>'.get_the_date().'</span>';
								/* number of comments */	
								echo ' &#183;';								comments_number( 'no comments', 'one comment', '% comments' );
								/* author name */									echo ' &#183;';								echo __(" by ","premium-code");								echo '<span>';									echo '<a href="'.get_author_posts_url( get_the_author_meta( 'ID' )).'">';										the_author();									echo '</a>';								echo '</span>';								/* category */
								$cat = get_the_category();								if(!empty($cat)) :									echo ' &#183;';									echo __(" in ","premium-code");									$nr_of_cat = 0;									foreach($cat as $cat_item):										$nr_of_cat++;									endforeach;									$count = 1;									foreach($cat as $cat_item):										if($count != $nr_of_cat):											echo '<a class="sub-link" href="'.get_category_link($cat_item->cat_ID).'">'.$cat_item->cat_name.'</a> , ';										else:											echo '<a class="sub-link" href="'.get_category_link($cat_item->cat_ID).'">'.$cat_item->cat_name.'</a>';										endif;											$count++;										endforeach;								endif;
							echo '</div>';
						/* sharrre buttons */						if((get_theme_mod('facebook') && (get_theme_mod('facebook') == '1')) || (get_theme_mod('twitter') && (get_theme_mod('twitter') == '1'))):							echo '<div class="socialshare">';								if(get_theme_mod('twitter') && (get_theme_mod('twitter') == '1')):									echo '<div id="twitter" data-url="'.get_permalink().'" data-text="Twitter" data-title="Tweet"></div>';								endif;									if(get_theme_mod('facebook') && (get_theme_mod('facebook') == '1')):									echo '<div id="facebook" data-url="'.get_permalink().'" data-text="Facebook" data-title="Like"></div>';								endif;							echo '</div>';						endif;	
						echo '<div class="clearfix"></div>';
						echo '</div>';
						echo '<div class="clearfix"></div>';

					the_content();
					wp_link_pages( array(
						'before' => '<div class="page-links">' . __( 'Pages:', 'premium-code' ),
						'after'  => '</div>',
					) );
					/* TAGS */
						$posttags = get_the_tags();
						if ($posttags):
							echo '<div class="headingsix">'.__('Tags','premium-code').'</div>';
							foreach($posttags as $tag):
							echo '<div class="simplebutton singletag"><a href="'.get_tag_link($tag->term_id).'">'.$tag->name.'</a></div>';
							endforeach;
						endif;
					echo '<div class="clearfix"></div>';
					
					/* ABOUT AUTHOR */
					if(get_theme_mod('about_author_posts') && (get_theme_mod('about_author_posts') == '1')):
						echo '<div class="singleaboutauthor">';
							echo '<div class="img">'.get_avatar( get_the_author_meta( 'ID' ), 75 ).'</div>';
								echo '<div class="abouttext">';
									echo '<div class="title"><span>'.__('About author:','premium-code').'</span>'.get_the_author().'</div>';
										echo '<p>'.get_the_author_meta('description').'</p>';
								echo '</div>';	
								echo '<div class="clearfix"></div>';
						echo '</div>';
					endif;
					/* RELATED POSTS */
					if(get_theme_mod('related_posts') && (get_theme_mod('related_posts') == '1')):
						echo '<div class="singlepostrelated ourworkitems">';
							$orig_post = $post;
							global $post;
							$tags = wp_get_post_tags($post->ID);
							if ($tags) {
							$tag_ids = array();
							foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
							$args=array(
							'tag__in' => $tag_ids,
							'post__not_in' => array($post->ID),
							'posts_per_page'=>4, // Number of related posts that will be shown.
							'caller_get_posts'=>1
							);
							$my_query = new wp_query( $args );
							if( $my_query->have_posts() ) {
								echo '<div class="headingsix">'.__('Related posts','premiumcode').'</div>';
								$count_related = 0;
								while( $my_query->have_posts() ) {
								$my_query->the_post(); 
								if($count_related == 0)
									$margin_class="nomargin";
								else
									$margin_class="";
								?>
								<div class="item <?php echo $margin_class; ?>">
									<a href=""><span class="hover"></span></a>
									<div class="img">
										<?php 
											if ( has_post_thumbnail($post->ID) ):
												echo get_the_post_thumbnail($post->ID, 'related_posts-image'); 
											else:
												echo '<img src="'.get_template_directory_uri().'/images/default-product.png">';	
											endif;
										?>
									</div>
									<a class="bottomlink" href="<?php the_permalink();?>"><?php the_title(); ?></a>
								</div>
								
								<?php  $count_related++; }
							}
							}
							$post = $orig_post;
							wp_reset_query();
						echo '</div>';
					endif;
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
				<div class="headingsix"><?php _e('Leave a Comment','premium-code'); ?></div>
				<?php
				$comments_args = array(
						// change the title of send button 
						'label_submit'=>'POST',
						'comment_notes_before' => '',
						// remove "Text or HTML to be displayed after the set of comment fields"
						'comment_notes_after' => '',
						'title_reply' => '',
						// redefine your own textarea (the comment body)
						'comment_field' => '<div class="item"><label for="comment">Your comment<span>*</span></label><textarea class="txtarea input-bungot" id="comment" name="comment" ></textarea></div>',
						'fields' => array(
						'author' => '<div class="item"><label for="author">Your name<span>*</span></label><input class="txtfield input-bungot" id="author" name="author" type="text" value="" /></div>',
						'email' => '<div class="item"><label for="email">Your e-mail<span>*</span></label><input class="txtfield input-bungot" id="email" name="email" type="text" value=""/></div>'
					),
				);
				echo '<div id="commentform">';
					echo '<fieldset>';
						comment_form($comments_args);
					echo '</fieldset>';
				echo '</div>';
				?>

			</div><!--/content-wrap-right-->
			<div id="sidebar" class="fleft">
				<?php get_sidebar(); ?>
			</div>
		</div><!--/wrap-->
<?php endwhile; ?>		
<?php get_footer(); ?>