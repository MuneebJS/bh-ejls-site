<?php
/**
 * Insynia theme bootstrap.
 *
 * This file intentionally contains no business logic. All functionality
 * lives in small, self-contained modules under /inc/ and /inc/features/,
 * which are auto-loaded via glob() so new features can be added simply
 * by dropping a PHP file into inc/features/.
 *
 * @package Insynia
 */

defined( 'ABSPATH' ) || exit;

if ( ! defined( 'INSYNIA_VERSION' ) ) {
	define( 'INSYNIA_VERSION', wp_get_theme()->get( 'Version' ) ?: '1.0.0' );
}

if ( ! defined( 'INSYNIA_DIR' ) ) {
	define( 'INSYNIA_DIR', get_template_directory() );
}

if ( ! defined( 'INSYNIA_URI' ) ) {
	define( 'INSYNIA_URI', get_template_directory_uri() );
}

foreach ( glob( INSYNIA_DIR . '/inc/*.php' ) as $insynia_core_file ) {
	require_once $insynia_core_file;
}
unset( $insynia_core_file );

foreach ( glob( INSYNIA_DIR . '/inc/features/*.php' ) as $insynia_feature_file ) {
	require_once $insynia_feature_file;
}
unset( $insynia_feature_file );
