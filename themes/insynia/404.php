<?php
/**
 * Template for 404 pages.
 *
 * @package Insynia
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="primary" class="site-main error-404 not-found">
	<section class="section section--sm">
		<div class="container container--narrow">
			<div class="no-results stack stack--lg" style="text-align: center;">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( '404', 'insynia' ); ?></h1>
					<p class="page-subtitle"><?php esc_html_e( 'The page you were looking for could not be found.', 'insynia' ); ?></p>
				</header>

				<div class="page-content stack">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Try a search, or return to the homepage.', 'insynia' ); ?></p>
					<?php get_search_form(); ?>
					<p>
						<a class="btn btn--primary" href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<?php esc_html_e( 'Back to homepage', 'insynia' ); ?>
						</a>
					</p>
				</div>
			</div>
		</div>
	</section>
</main>

<?php
get_footer();
