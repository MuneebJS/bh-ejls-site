<?php
/**
 * Site header markup.
 *
 * @package Insynia
 */

defined( 'ABSPATH' ) || exit;
?>

<header id="masthead" class="site-header">
	<div class="container site-header__inner">
		<div class="site-branding">
			<?php if ( has_custom_logo() ) : ?>
				<?php the_custom_logo(); ?>
			<?php else : ?>
				<?php if ( is_front_page() && is_home() ) : ?>
					<h1 class="site-title">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
					</h1>
				<?php else : ?>
					<p class="site-title">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
					</p>
				<?php endif; ?>
			<?php endif; ?>

			<?php $insynia_description = get_bloginfo( 'description', 'display' ); ?>
			<?php if ( $insynia_description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo esc_html( $insynia_description ); ?></p>
			<?php endif; ?>
		</div>

		<button class="nav-toggle" aria-controls="primary-menu" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle menu', 'insynia' ); ?>">
			<span class="nav-toggle__bar" aria-hidden="true"></span>
			<span class="nav-toggle__bar" aria-hidden="true"></span>
			<span class="nav-toggle__bar" aria-hidden="true"></span>
		</button>

		<nav id="site-navigation" class="main-navigation" aria-label="<?php esc_attr_e( 'Primary', 'insynia' ); ?>">
			<?php
			if ( has_nav_menu( 'primary' ) ) {
				wp_nav_menu( array(
					'theme_location' => 'primary',
					'menu_id'        => 'primary-menu',
					'menu_class'     => 'nav-menu',
					'container'      => false,
					'depth'          => 3,
					'fallback_cb'    => false,
				) );
			} else {
				echo '<ul id="primary-menu" class="nav-menu nav-menu--fallback">';
				echo '<li><a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '">' . esc_html__( 'Add a menu', 'insynia' ) . '</a></li>';
				echo '</ul>';
			}
			?>
		</nav>

		<div class="site-header__actions">
			<a class="btn btn--primary btn--sm site-header__cta" href="<?php echo esc_url( home_url( '/contact' ) ); ?>">
				<?php esc_html_e( 'Request Demo', 'insynia' ); ?>
			</a>
		</div>
	</div>
</header>
