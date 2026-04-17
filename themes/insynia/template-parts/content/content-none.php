<?php
/**
 * Template part for empty-state / no-results messages.
 *
 * @package Insynia
 */

defined( 'ABSPATH' ) || exit;
?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'Nothing here', 'insynia' ); ?></h1>
	</header>

	<div class="page-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
			<p>
				<?php
				printf(
					wp_kses(
						/* translators: %s: URL to write first post. */
						__( 'Ready to publish your first post? <a href="%s">Get started here</a>.', 'insynia' ),
						array( 'a' => array( 'href' => array() ) )
					),
					esc_url( admin_url( 'post-new.php' ) )
				);
				?>
			</p>
		<?php elseif ( is_search() ) : ?>
			<p><?php esc_html_e( 'Sorry, nothing matched your search. Try again with different keywords.', 'insynia' ); ?></p>
			<?php get_search_form(); ?>
		<?php else : ?>
			<p><?php esc_html_e( 'It seems we can’t find what you’re looking for. Perhaps searching can help.', 'insynia' ); ?></p>
			<?php get_search_form(); ?>
		<?php endif; ?>
	</div>
</section>
