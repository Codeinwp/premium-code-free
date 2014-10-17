<?php
/**
 * The template for displaying the footer.
 *
 * @package premium-code
 */
?>
		<footer>
			<div class="fcenter footer-top">
				<?php
					if ( get_theme_mod( 'logo_footer' ) ) :
						echo '<div class="flogo">';
							echo '<img src="'.$logo_footer.'" alt="'.get_bloginfo( 'name' ).'">';
						echo '</div>';	
					endif;
				dynamic_sidebar( 'footer_area' ); 

				echo '<div class="clearfix"></div>';

			echo '</div>';

			echo '<div class="footer-bottom">';

			echo '<div class="fcenter">';	

				echo '<div class="socialmedia">';

					if (  get_theme_mod( 'facebook_link' ) || get_theme_mod( 'twitter_link' ) || get_theme_mod( 'pinterest_link' ) || get_theme_mod( 'youtube_link' ) || get_theme_mod( 'linkedin_link' ) 
					|| get_theme_mod( 'flickr_link' ) || get_theme_mod( 'googleplus_link' ) || get_theme_mod( 'rss_link' ) ) :

						echo '<div class="rwdfsocial">';

						if ( get_theme_mod( 'facebook_link' ) ) :
							echo '<div class="item"><a href="'. get_theme_mod( 'facebook_link' ).'"><img src="'.get_template_directory_uri().'/images/social/facebookh.png" alt=""></a></div>';
						endif;

						if ( get_theme_mod( 'twitter_link' ) ) :
							echo '<div class="item"><a href="'. get_theme_mod( 'twitter_link' ).'"><img src="'.get_template_directory_uri().'/images/social/twitterh.png" alt=""></a></div>';
						endif;

						if ( get_theme_mod( 'pinterest_link' ) ) :
							echo '<div class="item"><a href="'. get_theme_mod( 'pinterest_link' ).'"><img src="'.get_template_directory_uri().'/images/social/pinteresth.png" alt=""></a></div>';
						endif;

						if ( get_theme_mod( 'youtube_link' ) ) :
							echo '<div class="item"><a href="'. get_theme_mod( 'youtube_link' ).'"><img src="'.get_template_directory_uri().'/images/social/youtubeh.png" alt=""></a></div>';
						endif;

						if ( get_theme_mod( 'linkedin_link' ) ) :
							echo '<div class="item"><a href="'. get_theme_mod( 'linkedin_link' ).'"><img src="'.get_template_directory_uri().'/images/social/linkedinh.png" alt=""></a></div>';
						endif;

						if ( get_theme_mod( 'flickr_link' ) ) :
							echo '<div class="item"><a href="'. get_theme_mod( 'flickr_link' ).'"><img src="'.get_template_directory_uri().'/images/social/flickrh.png" alt=""></a></div>';
						endif;

						if ( get_theme_mod( 'googleplus_link' ) ) :
							echo '<div class="item"><a href="'. get_theme_mod( 'googleplus_link' ).'"><img src="'.get_template_directory_uri().'/images/social/googleplush.png" alt=""></a></div>';
						endif;

						if ( get_theme_mod( 'rss_link' ) ) :
							echo '<div class="item"><a href="'. get_theme_mod( 'rss_link' ).'"><img src="'.get_template_directory_uri().'/images/social/rssh.png" alt=""></a></div>';;
						endif;

						echo '</div>';

					endif;


					echo '<div class="clearfix"></div>';

					if ( get_theme_mod( 'copyright' ) ) :
						echo '<div class="copyright">'. get_theme_mod( 'copyright' ).'</div>';
					endif;
				
					echo '</div>';
				?>

			</div><!--/fcenter-->
			</div>
		</footer>

<?php wp_footer(); ?>

</body>
</html>