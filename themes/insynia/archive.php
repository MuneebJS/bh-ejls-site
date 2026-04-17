<?php
/**
 * Archive template.
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
					<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
					<?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>
				</header>

				<div class="posts-grid">
					<?php
					while ( have_posts() ) :
						the_post();
						get_template_part( 'template-parts/content/content', get_post_type() );
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
