<?php
/**
 * Register navigation menu locations.
 *
 * @package Insynia
 */

defined( 'ABSPATH' ) || exit;

add_action( 'after_setup_theme', function () {
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'insynia' ),
		'footer'  => __( 'Footer Navigation', 'insynia' ),
		'social'  => __( 'Social Links', 'insynia' ),
	) );
} );
