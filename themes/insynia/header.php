<?php
/**
 * The header for the theme.
 *
 * Opens the HTML document and renders the site header via
 * a template part for easy customization.
 *
 * @package Insynia
 */

defined( 'ABSPATH' ) || exit;
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link sr-only-focusable" href="#primary">
	<?php esc_html_e( 'Skip to content', 'insynia' ); ?>
</a>

<div id="page" class="site">

	<?php get_template_part( 'template-parts/global/site-header' ); ?>
