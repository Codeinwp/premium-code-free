<?php
/*
	Template Name: Blog 1column ( top image ) + sidebar
*/
?>
<?php get_header(); ?>
		<div class="generalheadline">
			<h3><?php the_title(); ?></h3>
		</div><!--/generalheadline-->
		<div id="wrap">
			<div id="content" class="fleft">
				<?php
					global $paged, $wp_query, $wp;
					if  ( empty( $paged ) ) {
							if ( !empty( $_GET['paged'] ) ) {
									$paged = $_GET['paged'];
							} elseif ( !empty( $wp->matched_query ) && $args = wp_parse_args( $wp->matched_query ) ) {
									if ( !empty( $args['paged'] ) ) {
											$paged = $args['paged'];
									}
							}
							if ( !empty( $paged ) ) {
								$wp_query->set( 'paged', $paged );							}
					}      
					$temp = $wp_query;
					$wp_query= null;
					$wp_query = new WP_Query();
					$wp_query->query( 'paged='.$paged.'&post_type=post&showposts=4' );

					while ( $wp_query->have_posts() ) : $wp_query->the_post();
						?>
						<div class="post">

							<aside class="avatar">

								<div class="img"><?php echo get_avatar( get_the_author_meta( 'ID' ), 68 ); ?></div>
								<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a>

							</aside><!--/avatar-->

							<div class="postcontent">
									<?php
										if ( has_post_thumbnail( $post->ID ) ) {
											echo '<div class="img">';
											echo get_the_post_thumbnail( $post->ID, 'blog-style1-image' ); 
											echo '</div>';
										}
									?>

								<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

								<section class="post-details">
											<?php
												_e( 'On ', 'premium-code' );
												echo get_the_date( 'F d S, Y' ).'&#183;';
												echo '<a href="'.get_comments_link().'">';
												comments_number( ' no comments ', ' one comment ', ' % comments ' );
												echo '</a>&#183;';
												
												$cat = get_the_category();
												if ( !empty( $cat ) ) :
												_e( ' In ', 'premium-code' );
												$nr_of_cat = 0;
												foreach ( $cat as $cat_item ):
													$nr_of_cat++;
												endforeach;
												$count = 1;
												foreach ( $cat as $cat_item ):
													if ( $count != $nr_of_cat )
														echo '<a class="sub-link" href="'.get_category_link( $cat_item->cat_ID ).'">'.$cat_item->cat_name.'</a> , ';
													else	
														echo '<a class="sub-link" href="'.get_category_link( $cat_item->cat_ID ).'">'.$cat_item->cat_name.'</a>';
													$count++;
												endforeach;
												endif;
											?>
								</section>
								<?php the_excerpt(); ?>
								<div class="readmore simplebutton blue"><a href="<?php the_permalink(); ?>"><?php _e( 'Read More', 'premium-code' ); ?></a></div>

							</div><!--/postcontent-->

						</div><!--/post-->
				<?php
					endwhile;
				?>
				<div id="generalnavi" style="margin-bottom: 40px;">
					<?php previous_posts_link( '<span class="prev">Prev</span>' ) ?>
					<?php next_posts_link( '<span class="next">Next</span>' ) ?>
					<?php $wp_query = null; $wp_query = $temp;?>
				</div><!--/generalnavi-->

			</div><!--/content-wrap-right-->
			<div id="sidebar" class="fleft sidebarright">	
				<?php get_sidebar(); ?>
			</div><!--/sidebar-->
		</div><!--/wrap-->
<?php get_footer(); ?>