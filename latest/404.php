<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package premium-code
 */
get_header(); 

if(get_theme_mod('404page_title')):
	echo '<div class="generalheadline">';
		echo '<h3>'.get_theme_mod('404page_title').'</h3>';
	echo '</div>';
endif;
?>
<div id="wrap">
	<div class="portfoliohead">
	<?php
		if(get_theme_mod('404page_text')):
			echo '<p>'.get_theme_mod('404page_text').'</p>';		endif;
	?>
		<div class="ordernow"><a href="<?php echo home_url('/'); ?>"><?php _e('Go Home','premium-code'); ?></a></div>
	</div><!--/portfoliohead-->
	<span class="erroror"><?php _e('or','premium-code'); ?></span>
	<div class="sidebarsearch error-search">
		<?php get_search_form(); ?>
	</div><!--/sidebarsearch-->
</div><!--/wrap-->
<?php get_footer(); ?>