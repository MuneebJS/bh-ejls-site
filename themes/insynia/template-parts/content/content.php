<?php
/**
 * Default content template for post grids / archives.
 *
 * @package Insynia
 */

defined( 'ABSPATH' ) || exit;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-card' ); ?>>

	<?php if ( has_post_thumbnail() ) : ?>
		<a class="post-card__thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
			<?php the_post_thumbnail( 'insynia-card', array( 'loading' => 'lazy' ) ); ?>
		</a>
	<?php endif; ?>

	<div class="post-card__body">
		<header class="post-card__header">
			<?php the_title( sprintf( '<h2 class="post-card__title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

			<?php if ( 'post' === get_post_type() ) : ?>
				<div class="post-card__meta">
					<time class="post-card__date" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
						<?php echo esc_html( get_the_date() ); ?>
					</time>
					<span class="post-card__author"><?php the_author(); ?></span>
				</div>
			<?php endif; ?>
		</header>

		<div class="post-card__excerpt">
			<?php the_excerpt(); ?>
		</div>

		<a class="post-card__more" href="<?php the_permalink(); ?>">
			<?php esc_html_e( 'Read more', 'insynia' ); ?>
			<span aria-hidden="true">&rarr;</span>
		</a>
	</div>

</article>
