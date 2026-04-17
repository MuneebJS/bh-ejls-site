<?php
/**
 * Theme setup: supports, image sizes, editor config, i18n.
 *
 * @package Insynia
 */

defined( 'ABSPATH' ) || exit;

add_action( 'after_setup_theme', function () {
	load_theme_textdomain( 'insynia', INSYNIA_DIR . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'editor-styles' );
	add_theme_support( 'customize-selective-refresh-widgets' );

	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		'style',
		'script',
		'navigation-widgets',
	) );

	add_theme_support( 'custom-logo', array(
		'height'      => 60,
		'width'       => 240,
		'flex-width'  => true,
		'flex-height' => true,
	) );

	add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio' ) );

	add_image_size( 'insynia-hero', 1920, 900, true );
	add_image_size( 'insynia-card', 800, 500, true );
	add_image_size( 'insynia-thumb', 400, 300, true );

	add_editor_style( 'assets/css/editor-style.css' );
} );

add_action( 'after_setup_theme', function () {
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 1200;
	}
}, 0 );
