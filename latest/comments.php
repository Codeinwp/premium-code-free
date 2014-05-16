<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to codeinwp_theme_comment() which is
 * located in the inc/template-tags.php file.
 *
 * @package premium-code
 */
/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() )
	return;
?>
	<?php // You can start editing here -- including this comment! ?>
	<?php if ( have_comments() ) : ?>
		
			<?php
				wp_list_comments( array( 'callback' => 'cwp_comment' ) );
			?>
	        
		
	<?php endif; // have_comments() ?>
	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'premium-code' ); ?></p>
	<?php endif; ?>