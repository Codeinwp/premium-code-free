<?php
/**
 * cwp Theme Customizer
 *
 * @package cwp
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function cwp_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';		/* theme notes */	$wp_customize->add_section( 'codeinwp_theme_notes' , array(		'title'      => __( 'ThemeIsle theme notes','codeinwp' ),		'description' => sprintf( __( "Thank you for being part of this! We've spent almost 6 months building ThemeIsle without really knowing if anyone will ever use a theme or not, so we're very grateful that you've decided to work with us. Wanna <a href='http://themeisle.com/contact/' target='_blank'>say hi</a>?		<br/><br/><a href='http://themeisle.com/demo/?theme=Premium code Free' target='_blank' />View Theme Demo</a> | <a href='http://themeisle.com/forums/forum/premium-code-free' target='_blank'>Get theme support</a><br/><br/><a href='http://themeisle.com/documentation-premium-code-free' target='_blank'>Documentation</a>" ) ),		'priority'   => 30,	) );	$wp_customize->add_setting(        'cwp_theme_notice'	);		$wp_customize->add_control(    'cwp_theme_notice',    array(        'section' => 'codeinwp_theme_notes',		'type'  => 'read-only',    ) );				/* header logo */	$wp_customize->add_section( 'cwp_logo_section' , array(    	'title'       => __( 'Header Logo', 'premium-code' ),    	'priority'    => 31,    	'description' => __( 'Upload a logo to replace the default site name and description in the header', 'premium-code' ),	) );	$wp_customize->add_setting( 'logo' );	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_logo', array(	    'label'    => __( 'Logo', 'premium-code' ),	    'section'  => 'cwp_logo_section',		'settings' => 'logo',	) ) );		/* header logo - mobile */	$wp_customize->add_setting( 'logo_mobile' );	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_logomobile', array(	    'label'    => __( 'Logo for mobile', 'premium-code' ),	    'section'  => 'cwp_logo_section',	    'settings' => 'logo_mobile',	) ) );		/* 404 page */	$wp_customize->add_section( 'cwp_404', array(        'title'    => __( '404 Page', 'premium-code' ),        'priority' => 32,    ) ); 	/* 404 page - title */    $wp_customize->add_setting( '404page_title', array( 'default' => '404 - Sorry, Page not found!', 'sanitize_callback' => 'cwp_text_sanitization' ) );    $wp_customize->add_control( '404page_title', array(        'label'      => __( 'Title for 404 pages', 'premium-code' ),        'section'    => 'cwp_404',        'settings'   => '404page_title',    ) );		/* 404 page - text */    $wp_customize->add_setting( '404page_text', array( 'default' => "<h4>We are sorry, the page you are looking is doesn't exist on this server.</h4><p>You're looking for something that doesn't actually exits... Try going to our page or search for what you need.", 'sanitize_callback' => 'cwp_text_sanitization' ) );    $wp_customize->add_control( '404page_text', array(        'label'      => __( 'Text for 404 pages', 'premium-code' ),        'section'    => 'cwp_404',        'settings'   => '404page_text',    ) );		/* footer logo */	$wp_customize->add_section( 'cwp_footerlogo_section' , array(    	'title'       => __( 'Footer Logo', 'premium-code' ),    	'priority'    => 33,    	'description' => __( 'Choose an image for the logo in the footer', 'premium-code' ),	) );	$wp_customize->add_setting( 'logo_footer' );	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_footerlogo', array(	    'label'    => __( 'Logo', 'premium-code' ),	    'section'  => 'cwp_footerlogo_section',	    'settings' => 'logo_footer',	) ) );		/* socials */	$wp_customize->add_section( 'cwp_socials_section' , array(    	'title'       => __( 'Socials', 'premium-code' ),    	'priority'    => 34	) );		/* facebook */	$wp_customize->add_setting( 'facebook_link', array( 'default' => "#", 'sanitize_callback' => 'esc_url_raw' ) );    $wp_customize->add_control( 'facebook_link', array(        'label'      => __( 'Facebook link', 'premium-code' ),        'section'    => 'cwp_socials_section',        'settings'   => 'facebook_link',    ) );		/* twitter */	$wp_customize->add_setting( 'twitter_link', array( 'default' => "#", 'sanitize_callback' => 'esc_url_raw' ) );    $wp_customize->add_control( 'twitter_link', array(        'label'      => __( 'Twitter link', 'premium-code' ),        'section'    => 'cwp_socials_section',        'settings'   => 'twitter_link',    ) );		/* pinterest */	$wp_customize->add_setting( 'pinterest_link', array( 'default' => "#", 'sanitize_callback' => 'esc_url_raw' ) );    $wp_customize->add_control( 'pinterest_link', array(        'label'      => __( 'Pinterest link', 'premium-code' ),        'section'    => 'cwp_socials_section',        'settings'   => 'pinterest_link',    ) );		/* youtube */	$wp_customize->add_setting( 'youtube_link', array( 'default' => "#", 'sanitize_callback' => 'esc_url_raw' ) );    $wp_customize->add_control( 'youtube_link', array(        'label'      => __( 'Youtube link', 'premium-code' ),        'section'    => 'cwp_socials_section',        'settings'   => 'youtube_link',    ) );		/* linkedin */	$wp_customize->add_setting( 'linkedin_link', array( 'default' => "#", 'sanitize_callback' => 'esc_url_raw' ) );    $wp_customize->add_control( 'linkedin_link', array(        'label'      => __( 'Linkedin link', 'premium-code' ),        'section'    => 'cwp_socials_section',        'settings'   => 'linkedin_link',    ) );		/* flickr */	$wp_customize->add_setting( 'flickr_link', array( 'default' => "#", 'sanitize_callback' => 'esc_url_raw' ) );    $wp_customize->add_control( 'flickr_link', array(        'label'      => __( 'Flickr link', 'premium-code' ),        'section'    => 'cwp_socials_section',        'settings'   => 'flickr_link',    ) );		/* googleplus */	$wp_customize->add_setting( 'googleplus_link', array( 'default' => "#", 'sanitize_callback' => 'esc_url_raw' ) );    $wp_customize->add_control( 'googleplus_link', array(        'label'      => __( 'Google Plus link', 'premium-code' ),        'section'    => 'cwp_socials_section',        'settings'   => 'googleplus_link',    ) );	/* rss */	$wp_customize->add_setting( 'rss_link', array( 'default' => "#", 'sanitize_callback' => 'esc_url_raw' ) );    $wp_customize->add_control( 'rss_link', array(        'label'      => __( 'RSS link', 'premium-code' ),        'section'    => 'cwp_socials_section',        'settings'   => 'rss_link',    ) );		/* copyright */	$wp_customize->add_section( 'cwp_copyright_section' , array(    	'title'       => __( 'Copyright', 'premium-code' ),    	'priority'    => 35	) );	$wp_customize->add_setting( 'copyright', array( 'sanitize_callback' => 'cwp_text_sanitization' ) );    $wp_customize->add_control( 'copyright', array(        'label'      => __( 'Copyright', 'premium-code' ),        'section'    => 'cwp_copyright_section',        'settings'   => 'copyright',    ) );		/* contact page */	$wp_customize->add_section( 'cwp_contactpage_section' , array(    	'title'       => __( 'Contact page', 'premium-code' ),    	'priority'    => 36	) );		/* phone number */	$wp_customize->add_setting( 'phone', array( 'sanitize_callback' => 'cwp_text_sanitization' ) );    $wp_customize->add_control( 'phone', array(        'label'      => __( 'Phone number', 'premium-code' ),        'section'    => 'cwp_contactpage_section',        'settings'   => 'phone',    ) );		/* email */	$wp_customize->add_setting( 'email', array( 'sanitize_callback' => 'is_email' ) );    $wp_customize->add_control( 'email', array(        'label'      => __( 'Email address', 'premium-code' ),        'section'    => 'cwp_contactpage_section',        'settings'   => 'email',    ) );		/* address */	$wp_customize->add_setting( 'address', array( 'sanitize_callback' => 'cwp_text_sanitization' ) );    $wp_customize->add_control( 'address', array(        'label'      => __( 'Address', 'premium-code' ),        'section'    => 'cwp_contactpage_section',        'settings'   => 'address',    ) );		/* Single post page details */	$wp_customize->add_section( 'cwp_singlepostdetails_section' , array(    	'title'       => __( 'Choose sections for single post page', 'premium-code' ),    	'priority'    => 37	) );	/* Related posts */	$wp_customize->add_setting( 'related_posts' );	$wp_customize->add_control( 'related_posts', array(		'settings' => 'related_posts',		'label'    => __( 'Related posts', 'premium-code' ),		'section'  => 'cwp_singlepostdetails_section',		'type'     => 'checkbox',		'priority'    => 1	) );		/* About author */	$wp_customize->add_setting( 'about_author_posts' );	$wp_customize->add_control( 'about_author_posts', array(		'settings' => 'about_author_posts',		'label'    => __( 'About author', 'premium-code' ),		'section'  => 'cwp_singlepostdetails_section',		'type'     => 'checkbox',		'priority'    => 2	) );		/* Facebook */	$wp_customize->add_setting( 'facebook' );	$wp_customize->add_control( 'facebook', array(		'settings' => 'facebook',		'label'    => __( 'Facebook share button', 'premium-code' ),		'section'  => 'cwp_singlepostdetails_section',		'type'     => 'checkbox',		'priority'    => 3	) );		/* Twitter */	$wp_customize->add_setting( 'twitter' );	$wp_customize->add_control( 'twitter', array(		'settings' => 'twitter',		'label'    => __( 'Twitter share button', 'premium-code' ),		'section'  => 'cwp_singlepostdetails_section',		'type'     => 'checkbox',		'priority'    => 4	) );		/* Layout for search page and archive page */	$wp_customize->add_section( 'cwp_layout_section' , array(    	'title'       => __( 'Layout for search page and archive page', 'premium-code' ),    	'priority'    => 38	) );		$wp_customize->add_setting( 'page_layout' );	$wp_customize->add_control(		'page_layout',		array(			'type' => 'radio',			'label' => '',			'section' => 'cwp_layout_section',			'choices' => array(							"select_opt1" => "1 column ( top image ) + sidebar",							"select_opt2" => "1column ( left image ) + sidebar",							"select_opt3" => "1column ( right image ) + sidebar",							"select_opt4" => "1column ( left image ) no sidebar",							"select_opt5" => "1column ( right image ) no sidebar",							"select_opt6" => "2columns - no sidebar",							"select_opt7" => "2columns - with sidebar" ),		)	);
}
add_action( 'customize_register', 'cwp_customize_register' );
function cwp_text_sanitization( $input ) {    return wp_kses_post( force_balance_tags( $input ) );}
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function cwp_customize_preview_js() {
	wp_enqueue_script( 'cwp_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'cwp_customize_preview_js' );
