<?php
/**
 * Register and enqueue core theme CSS/JS.
 *
 * @package Insynia
 */

defined( 'ABSPATH' ) || exit;

add_action( 'wp_enqueue_scripts', function () {
	$css = INSYNIA_URI . '/assets/css/';
	$js  = INSYNIA_URI . '/assets/js/';
	$v   = INSYNIA_VERSION;

	wp_enqueue_style(
		'insynia-fonts',
		'https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,600;9..144,700&family=IBM+Plex+Mono:wght@400;500&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap',
		array(),
		null
	);

	wp_enqueue_style( 'insynia-variables', $css . 'variables.css', array( 'insynia-fonts' ), $v );
	wp_enqueue_style( 'insynia-reset', $css . 'reset.css', array( 'insynia-variables' ), $v );
	wp_enqueue_style( 'insynia-base', $css . 'base.css', array( 'insynia-reset' ), $v );
	wp_enqueue_style( 'insynia-layout', $css . 'layout.css', array( 'insynia-base' ), $v );
	wp_enqueue_style( 'insynia-components', $css . 'components.css', array( 'insynia-layout' ), $v );

	wp_enqueue_script( 'insynia-main', $js . 'main.js', array(), $v, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
} );

add_filter( 'script_loader_tag', function ( $tag, $handle ) {
	$deferred = apply_filters( 'insynia_deferred_scripts', array( 'insynia-main' ) );

	if ( in_array( $handle, $deferred, true ) && strpos( $tag, ' defer ' ) === false ) {
		$tag = str_replace( ' src=', ' defer src=', $tag );
	}

	return $tag;
}, 10, 2 );
