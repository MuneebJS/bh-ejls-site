<?php
/**
 * Search results template.
 *
 * @package Insynia
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="primary" class="site-main">
	<section class="section section--sm">
		<div class="container">
			<?php if ( have_posts() ) : ?>
				<header class="page-header">
					<h1 class="page-title">
						<?php
						printf(
							/* translators: %s: search query. */
							esc_html__( 'Search Results for: %s', 'insynia' ),
							'<span>' . esc_html( get_search_query() ) . '</span>'
						);
						?>
					</h1>
				</header>

				<div class="posts-grid">
					<?php
					while ( have_posts() ) :
						the_post();
						get_template_part( 'template-parts/content/content', 'search' );
					endwhile;
					?>
				</div>

				<?php
				the_posts_pagination( array(
					'prev_text' => __( 'Previous', 'insynia' ),
					'next_text' => __( 'Next', 'insynia' ),
				) );
				?>
			<?php else : ?>
				<?php get_template_part( 'template-parts/content/content', 'none' ); ?>
			<?php endif; ?>
		</div>
	</section>
</main>

<?php
get_footer();
