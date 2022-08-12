<?php

if ( !defined( 'AMCLINIC_THEME_VERSION' ) ) {
	define( 'AMCLINIC_THEME_VERSION', '2.0.3' );
}


/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 1170; /* pixels */
}

if ( ! function_exists( '_ambasetheme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function _ambasetheme_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on _amclinictheme, use a find and replace
	 * to change '_amclinictheme' to the name of your theme in all the template files
	 */
	load_theme_textdomain( '_amclinictheme', get_template_directory() . '/languages' );

	// Clean up the head
	remove_action( 'wp_head', 'rsd_link' );
	remove_action( 'wp_head', 'wlwmanifest_link' );
	remove_action( 'wp_head', 'wp_generator' );
	remove_action( 'wp_head', 'wp_shortlink_wp_head' );
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Register nav menus
	register_nav_menus( array(
		'header' => __( 'Header Menu', '_amclinictheme'),
		'footer' => __( 'Footer Menu', '_amclinictheme'),
	) );

	// Register Widget Areas
	// Function location: /lib/theme-functions.php
	add_action( 'widgets_init', 'am_widgets_init' );

	// Execute shortcodes in widgets
	// add_filter('widget_text', 'do_shortcode');




	// Add Editor Style
	add_editor_style();

	// Prevent File Modifications
	if ( ! defined( 'DISALLOW_FILE_EDIT' ) ) {
		define( 'DISALLOW_FILE_EDIT', true );
	}

	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );

	// Add Image Sizes
	add_image_size( 'am_thumb', $width = 210, $height = 140, $crop = false );
	add_image_size( 'am_feature_720w', $width = 720, $height = 720, $crop = false );
	add_image_size( 'slider_large', $width = 1920, $height = 1920, $crop = false );
	add_image_size( 'slider_medium', $width = 1000, $height = 1000, $crop = false );
	add_image_size( 'slider_small', $width = 760, $height = 760, $crop = false );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( '_amclinictheme_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Remove Dashboard Meta Boxes
	// Function location: /lib/theme-functions.php
	add_action( 'wp_dashboard_setup', 'am_remove_dashboard_widgets' );

	// Change Admin Menu Order
	// Function location: /lib/theme-functions.php
	add_filter( 'custom_menu_order', '__return_true' );
	add_filter( 'menu_order', 'am_custom_menu_order' );

	// Hide Admin Areas that are not used
	// Function location: /lib/theme-functions.php
	add_action( 'admin_menu', 'am_remove_menu_pages' );

	// Remove default link for images
	// Function location: /lib/theme-functions.php
	add_action( 'admin_init', 'am_imagelink_setup', 10 );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Enqueue scripts
	// Function location: /lib/theme-functions.php
	add_action( 'wp_enqueue_scripts', 'am_scripts',99 );

	// Remove Query Strings From Static Resources
	// Function location: /lib/theme-functions.php
	add_filter( 'script_loader_src', 'am_remove_script_version', 15, 1 );
	add_filter( 'style_loader_src', 'am_remove_script_version', 15, 1 );

	// Remove Read More Jump
	// Function location: /lib/theme-functions.php
	add_filter( 'the_content_more_link', 'am_remove_more_jump_link' );

}
endif; // _ambasetheme_setup

add_action( 'after_setup_theme', '_ambasetheme_setup' );
