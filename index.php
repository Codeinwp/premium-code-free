<?php get_header(); ?>
		<div class="generalheadline">
			<h3><?php _e('Blog','premium-code'); ?></h3>
		</div><!--/generalheadline-->
		<div id="wrap">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<div class="postfull">
									<?php
										if ( has_post_thumbnail($post->ID) ) {
											echo '<div class="img thumbleft">';
											echo get_the_post_thumbnail($post->ID, 'blog-style45-image'); 
											echo '</div>';
											$postcalign_class = 'postcalign fleft';
										}
										else {
											$postcalign_class = '';
										}
									?>
							<div class="<?php echo $postcalign_class; ?>">
								<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<section class="post-details">
											<?php
												_e('On ','premium-code');
												echo get_the_date('F d S, Y').'&#183;';
												echo '<a href="'.get_comments_link().'">';
												comments_number( ' no comments ', ' one comment ', ' % comments ' );
												echo '</a>&#183;';
												
												$cat = get_the_category();
												if(!empty($cat)) :
												_e(' In ','premium-code');
												$nr_of_cat = 0;
												foreach($cat as $cat_item):
													$nr_of_cat++;
												endforeach;
												$count = 1;
												foreach($cat as $cat_item):
													if($count != $nr_of_cat)
														echo '<a class="sub-link" href="'.get_category_link($cat_item->cat_ID).'">'.$cat_item->cat_name.'</a> , ';
													else
														echo '<a class="sub-link" href="'.get_category_link($cat_item->cat_ID).'">'.$cat_item->cat_name.'</a>';
													$count++;	
												endforeach;
												endif;
											?>	
								</section>
								<?php the_excerpt(); ?>
								<div class="post-bottom">

									<div class="avatar">
										<div class="img"><?php echo get_avatar(get_the_author_meta('ID'),68); ?></div>
										<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' )); ?>"><?php _e('by ','premium-code'); the_author(); ?></a>
									</div><!--/avatar-->
									<div class="readmore simplebutton blue"><a href="<?php the_permalink(); ?>"><?php _e('Read More','premium-code'); ?></a></div>
								</div><!--/post-bottom-->
							</div><!--/postcalign-->
						</div><!--/postfull-->

					<?php endwhile; endif; ?>
				<div id="generalnavi" class="noborder" style="margin-bottom: 40px;">
					<?php previous_posts_link('<span class="prev">Prev</span>') ?>
					<?php next_posts_link('<span class="next">Next</span>') ?>
				</div><!--/generalnavi-->
		</div><!--/wrap-->
<?php get_footer(); ?>