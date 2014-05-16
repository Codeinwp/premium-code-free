<div id="sidebar" class="frightt sidebarleft">
<?php 
if ( is_active_sidebar( 'sidebar-left' ) ) :
	dynamic_sidebar( 'sidebar-left' ); 
else:	

	/* SEARCH */
	echo '<div class="widget">';
		get_search_form();	
	echo '</div>';	
	
	
	/* RECENT POSTS */
	$recent_posts = wp_get_recent_posts();
	if(isset($recent_posts) && !empty($recent_posts)):
		echo '<div class="widget">';
		echo '<div class="widget-title">'.__('Recent Blog Posts','premium-code').'</div>';
		echo '<div class="widget-content">';
		foreach( $recent_posts as $recent ):
			echo '<div class="wrecentblogpost">';
			echo '<div class="img">';
			if(has_post_thumbnail($recent["ID"]))
				echo get_the_post_thumbnail($recent["ID"]);
			else
				echo '<img src="'.get_template_directory_uri().'/images/default-sidebar-product.png">';
			echo '</div>';
			echo '<div class="title"><a href="'.get_permalink($recent["ID"]).'">'.$recent["post_title"].'</a></div>';
			echo '</div>';
		endforeach;
		echo '</div></div>';
	endif;
	
endif; ?>				
</div><!--/sidebar-->