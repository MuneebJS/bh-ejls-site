<?php
/**
 * Site footer markup.
 *
 * @package Insynia
 */

defined( 'ABSPATH' ) || exit;
?>

<footer id="colophon" class="site-footer site-footer--columns">
	<div class="container footer-inner">
		<section class="footer-brand">
			<h2 class="footer-title"><?php bloginfo( 'name' ); ?></h2>
			<p class="footer-copy">
				<?php
				$insynia_description = get_bloginfo( 'description', 'display' );
				echo esc_html( $insynia_description ? $insynia_description : __( 'Modern publishing workflow for editorial teams.', 'insynia' ) );
				?>
			</p>
		</section>

		<div class="footer-meta">
			<?php if ( is_active_sidebar( 'sidebar-footer' ) ) : ?>
				<div class="footer-widgets">
					<?php dynamic_sidebar( 'sidebar-footer' ); ?>
				</div>
			<?php endif; ?>

			<?php if ( has_nav_menu( 'footer' ) ) : ?>
				<nav class="footer-navigation" aria-label="<?php esc_attr_e( 'Footer', 'insynia' ); ?>">
					<?php
					wp_nav_menu( array(
						'theme_location' => 'footer',
						'menu_class'     => 'footer-nav',
						'container'      => false,
						'depth'          => 1,
						'fallback_cb'    => false,
					) );
					?>
				</nav>
			<?php endif; ?>
		</div>
	</div>

	<div class="container footer-bottom">
		<p class="site-info">
			<?php
			printf(
				/* translators: 1: current year, 2: site name. */
				esc_html__( '&copy; %1$s %2$s', 'insynia' ),
				esc_html( date_i18n( 'Y' ) ),
				esc_html( get_bloginfo( 'name' ) )
			);
			?>
		</p>

		<?php if ( has_nav_menu( 'social' ) ) : ?>
			<nav class="social-navigation" aria-label="<?php esc_attr_e( 'Social', 'insynia' ); ?>">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'social',
					'menu_class'     => 'social-nav',
					'container'      => false,
					'depth'          => 1,
					'fallback_cb'    => false,
				) );
				?>
			</nav>
		<?php endif; ?>
	</div>
</footer>
