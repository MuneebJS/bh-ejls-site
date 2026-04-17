<?php
/**
 * The template for displaying comments.
 *
 * @package Insynia
 */

defined( 'ABSPATH' ) || exit;

if ( post_password_required() ) {
	return;
}
?>

<section id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>

		<h2 class="comments-title">
			<?php
			$insynia_comment_count = get_comments_number();
			if ( '1' === $insynia_comment_count ) {
				/* translators: %s: post title. */
				printf( esc_html__( 'One thought on &ldquo;%s&rdquo;', 'insynia' ), '<span>' . esc_html( get_the_title() ) . '</span>' );
			} else {
				printf(
					/* translators: 1: comment count, 2: post title. */
					esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $insynia_comment_count, 'comments title', 'insynia' ) ),
					esc_html( number_format_i18n( $insynia_comment_count ) ),
					'<span>' . esc_html( get_the_title() ) . '</span>'
				);
			}
			?>
		</h2>

		<ol class="comment-list">
			<?php
			wp_list_comments( array(
				'style'      => 'ol',
				'short_ping' => true,
				'avatar_size'=> 48,
			) );
			?>
		</ol>

		<?php
		the_comments_navigation( array(
			'prev_text' => __( 'Older comments', 'insynia' ),
			'next_text' => __( 'Newer comments', 'insynia' ),
		) );
		?>

		<?php if ( ! comments_open() ) : ?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'insynia' ); ?></p>
		<?php endif; ?>

	<?php endif; ?>

	<?php comment_form(); ?>

</section>
