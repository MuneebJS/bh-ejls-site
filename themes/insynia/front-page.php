<?php
/**
 * The front page template.
 *
 * @package Insynia
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="primary" class="site-main">
	<section class="section">
		<div class="container container--narrow">
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<article <?php post_class( 'front-page-content stack stack--lg' ); ?>>
						<?php if ( get_the_content() ) : ?>
							<div class="entry-content">
								<?php the_content(); ?>
							</div>
						<?php else : ?>
							<div class="no-results">
								<p><?php esc_html_e( 'Edit this page to add homepage content.', 'insynia' ); ?></p>
							</div>
						<?php endif; ?>
					</article>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</section>
</main>

<?php
get_footer();
