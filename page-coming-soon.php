<?php
/**
 * Template Name: Coming soon
 */
get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
		<div class="generalheadline">
			<h3><?php the_title();?></h3>
		</div><!--/generalheadline-->
		<div id="wrap">
			<div class="portfoliohead">
				<?php 
				the_content();
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'premium-code' ),
					'after'  => '</div>',
				) );
				?>
				<div class="ordernow"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php _e( 'Go Home', 'premium-code' );?></a></div>
			</div><!--/portfoliohead-->
			<div class="comingsoon-widgetarea">
			<?php
				dynamic_sidebar( 'comingsoon_widgets_area' );
			?>
			</div>
		</div><!--/wrap-->
<?php endwhile; ?>
<?php get_footer(); ?>