<?php
/**
 * Template part for displaying a single post.
 *
 * @package Insynia
 */

defined( 'ABSPATH' ) || exit;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry entry--single' ); ?>>

	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
			<time class="entry-date" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
				<?php echo esc_html( get_the_date() ); ?>
			</time>
			<span class="entry-author">
				<?php
				printf(
					/* translators: %s: post author. */
					esc_html__( 'by %s', 'insynia' ),
					'<span class="author vcard">' . esc_html( get_the_author() ) . '</span>'
				);
				?>
			</span>
			<?php if ( has_category() ) : ?>
				<span class="entry-categories">
					<?php the_category( ', ' ); ?>
				</span>
			<?php endif; ?>
		</div>
	</header>

	<?php if ( has_post_thumbnail() ) : ?>
		<figure class="entry-thumbnail">
			<?php the_post_thumbnail( 'insynia-hero', array( 'loading' => 'eager' ) ); ?>
		</figure>
	<?php endif; ?>

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'insynia' ),
			'after'  => '</div>',
		) );
		?>
	</div>

	<footer class="entry-footer">
		<?php if ( has_tag() ) : ?>
			<div class="entry-tags">
				<?php the_tags( '<span class="tags-label">' . esc_html__( 'Tags:', 'insynia' ) . '</span> ', ', ' ); ?>
			</div>
		<?php endif; ?>
		<?php edit_post_link( __( 'Edit', 'insynia' ), '<span class="edit-link">', '</span>' ); ?>
	</footer>

</article>
