<?php
/**
 * The footer for the theme.
 *
 * Renders the site footer via a template part and closes
 * the HTML document.
 *
 * @package Insynia
 */

defined( 'ABSPATH' ) || exit;
?>

	<?php get_template_part( 'template-parts/global/site-footer' ); ?>

</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
