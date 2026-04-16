<?php
/**
 * Insynia functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Insynia
 * @since Insynia 1.0.0
 */

// Adds theme support for post formats.
if ( ! function_exists( 'insynia_post_format_setup' ) ) :
	/**
	 * Adds theme support for post formats.
	 *
	 * @since Insynia 1.0.0
	 *
	 * @return void
	 */
	function insynia_post_format_setup() {
		add_theme_support( 'post-formats', array( 'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video' ) );
	}
endif;
add_action( 'after_setup_theme', 'insynia_post_format_setup' );

// Enqueues editor-style.css in the editors.
if ( ! function_exists( 'insynia_editor_style' ) ) :
	/**
	 * Enqueues editor-style.css in the editors.
	 *
	 * @since Insynia 1.0.0
	 *
	 * @return void
	 */
	function insynia_editor_style() {
		add_editor_style( 'assets/css/editor-style.css' );
	}
endif;
add_action( 'after_setup_theme', 'insynia_editor_style' );

// Enqueues the theme stylesheet on the front.
if ( ! function_exists( 'insynia_enqueue_styles' ) ) :
	/**
	 * Enqueues style.css to ensure the custom Insynia skin is always loaded.
	 *
	 * @since Insynia 1.0.0
	 *
	 * @return void
	 */
	function insynia_enqueue_styles() {
		wp_enqueue_style(
			'insynia-style',
			get_parent_theme_file_uri( 'style.css' ),
			array(),
			wp_get_theme()->get( 'Version' )
		);
		wp_style_add_data(
			'insynia-style',
			'path',
			get_parent_theme_file_path( 'style.css' )
		);
	}
endif;
add_action( 'wp_enqueue_scripts', 'insynia_enqueue_styles' );

// Registers custom block styles.
if ( ! function_exists( 'insynia_block_styles' ) ) :
	/**
	 * Registers custom block styles.
	 *
	 * @since Insynia 1.0.0
	 *
	 * @return void
	 */
	function insynia_block_styles() {
		register_block_style(
			'core/list',
			array(
				'name'         => 'checkmark-list',
				'label'        => __( 'Checkmark', 'insynia' ),
				'inline_style' => '
				ul.is-style-checkmark-list {
					list-style-type: "\\2713";
				}

				ul.is-style-checkmark-list li {
					padding-inline-start: 1ch;
				}',
			)
		);
	}
endif;
add_action( 'init', 'insynia_block_styles' );

// Registers pattern categories.
if ( ! function_exists( 'insynia_pattern_categories' ) ) :
	/**
	 * Registers pattern categories.
	 *
	 * @since Insynia 1.0.0
	 *
	 * @return void
	 */
	function insynia_pattern_categories() {

		register_block_pattern_category(
			'insynia_page',
			array(
				'label'       => __( 'Pages', 'insynia' ),
				'description' => __( 'A collection of full page layouts.', 'insynia' ),
			)
		);

		register_block_pattern_category(
			'insynia_post-format',
			array(
				'label'       => __( 'Post formats', 'insynia' ),
				'description' => __( 'A collection of post format patterns.', 'insynia' ),
			)
		);
	}
endif;
add_action( 'init', 'insynia_pattern_categories' );

// Registers block binding sources.
if ( ! function_exists( 'insynia_register_block_bindings' ) ) :
	/**
	 * Registers the post format block binding source.
	 *
	 * @since Insynia 1.0.0
	 *
	 * @return void
	 */
	function insynia_register_block_bindings() {
		register_block_bindings_source(
			'insynia/format',
			array(
				'label'              => _x( 'Post format name', 'Label for the block binding placeholder in the editor', 'insynia' ),
				'get_value_callback' => 'insynia_format_binding',
			)
		);
	}
endif;
add_action( 'init', 'insynia_register_block_bindings' );

// Registers block binding callback function for the post format name.
if ( ! function_exists( 'insynia_format_binding' ) ) :
	/**
	 * Callback function for the post format name block binding source.
	 *
	 * @since Insynia 1.0.0
	 *
	 * @return string|void Post format name, or nothing if the format is 'standard'.
	 */
	function insynia_format_binding() {
		$post_format_slug = get_post_format();

		if ( $post_format_slug && 'standard' !== $post_format_slug ) {
			return get_post_format_string( $post_format_slug );
		}
	}
endif;

// Adds a direct /team route that renders a standalone page from the theme.
if ( ! function_exists( 'insynia_register_team_route' ) ) :
	/**
	 * Registers a rewrite rule for the /team URL.
	 *
	 * @since Insynia 1.0.0
	 *
	 * @return void
	 */
	function insynia_register_team_route() {
		add_rewrite_rule( '^team/?$', 'index.php?insynia_team_page=1', 'top' );
	}
endif;
add_action( 'init', 'insynia_register_team_route' );

if ( ! function_exists( 'insynia_register_team_query_var' ) ) :
	/**
	 * Registers custom query vars for the direct team page route.
	 *
	 * @since Insynia 1.0.0
	 *
	 * @param array $vars Existing query vars.
	 * @return array
	 */
	function insynia_register_team_query_var( $vars ) {
		$vars[] = 'insynia_team_page';
		return $vars;
	}
endif;
add_filter( 'query_vars', 'insynia_register_team_query_var' );

if ( ! function_exists( 'insynia_load_team_page_template' ) ) :
	/**
	 * Loads a standalone template file for the /team route.
	 *
	 * @since Insynia 1.0.0
	 *
	 * @param string $template The active template path.
	 * @return string
	 */
	function insynia_load_team_page_template( $template ) {
		if ( get_query_var( 'insynia_team_page' ) ) {
			$team_template = get_parent_theme_file_path( 'team-page.php' );
			if ( file_exists( $team_template ) ) {
				return $team_template;
			}
		}

		return $template;
	}
endif;
add_filter( 'template_include', 'insynia_load_team_page_template' );

if ( ! function_exists( 'insynia_flush_team_route_rules' ) ) :
	/**
	 * Flushes rewrite rules after theme switch so /team resolves immediately.
	 *
	 * @since Insynia 1.0.0
	 *
	 * @return void
	 */
	function insynia_flush_team_route_rules() {
		insynia_register_team_route();
		flush_rewrite_rules();
	}
endif;
add_action( 'after_switch_theme', 'insynia_flush_team_route_rules' );

if ( ! function_exists( 'insynia_maybe_flush_team_route_rules' ) ) :
	/**
	 * Flushes team route rewrite rules once after deployment.
	 *
	 * @since Insynia 1.0.0
	 *
	 * @return void
	 */
	function insynia_maybe_flush_team_route_rules() {
		if ( get_option( 'insynia_team_route_rules_version' ) === '1' ) {
			return;
		}

		insynia_register_team_route();
		flush_rewrite_rules();
		update_option( 'insynia_team_route_rules_version', '1' );
	}
endif;
add_action( 'init', 'insynia_maybe_flush_team_route_rules', 20 );
