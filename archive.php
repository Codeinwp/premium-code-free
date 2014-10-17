<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package premium-code
 */get_header(); if ( get_theme_mod( 'page_layout' ) ) :
	$page_layout = get_theme_mod( 'page_layout' );else:	$page_layout = 'select_default';	endif;
if ( isset( $page_layout ) && $page_layout != '' ) :
	switch( $page_layout ):
		case 'select_opt1':
			get_template_part( '/search-archives-layouts/layout-1col-topimg-sidebar' );
			break;
		case 'select_opt2':
			get_template_part( '/search-archives-layouts/layout-1col-leftimg-sidebar' );
			break;	
		case 'select_opt3':
			get_template_part( '/search-archives-layouts/layout-1col-rightimg-sidebar' );
			break;	
		case 'select_opt4':
			get_template_part( '/search-archives-layouts/layout-1col-leftimg-nosidebar' );
			break;	
		case 'select_opt5':
			get_template_part( '/search-archives-layouts/layout-1col-rightimg-nosidebar' );
			break;	
		case 'select_opt6':
			get_template_part( '/search-archives-layouts/layout-2cols-nosidebar' );
			break;	
		case 'select_opt7':
			get_template_part( '/search-archives-layouts/layout-2cols-sidebar' );	
			break;		default:			get_template_part( '/search-archives-layouts/layout-1col-topimg-sidebar' );			break;
	endswitch;
endif;
get_footer(); ?>
