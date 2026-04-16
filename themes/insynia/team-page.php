<?php
/**
 * Standalone Team page template loaded through the /team route.
 *
 * @package WordPress
 * @subpackage Insynia
 * @since Insynia 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$insynia_team_members = array(
	array(
		'name' => 'Avery Collins',
		'role' => 'Executive Director',
		'bio'  => 'Leads cross-functional strategy and long-term growth initiatives.',
	),
	array(
		'name' => 'Jordan Patel',
		'role' => 'Programs Manager',
		'bio'  => 'Designs and runs core programs with a focus on measurable impact.',
	),
	array(
		'name' => 'Taylor Nguyen',
		'role' => 'Partnerships Lead',
		'bio'  => 'Builds relationships with institutions and community collaborators.',
	),
	array(
		'name' => 'Morgan Reed',
		'role' => 'Communications Specialist',
		'bio'  => 'Owns storytelling, messaging, and audience engagement strategy.',
	),
	array(
		'name' => 'Riley Brooks',
		'role' => 'Research Coordinator',
		'bio'  => 'Coordinates studies, reporting, and internal knowledge workflows.',
	),
	array(
		'name' => 'Casey Martinez',
		'role' => 'Operations Associate',
		'bio'  => 'Supports day-to-day operations, logistics, and process improvements.',
	),
);

status_header( 200 );
nocache_headers();
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class( 'insynia-team-page' ); ?>>
<?php wp_body_open(); ?>

<?php
if ( function_exists( 'block_template_part' ) ) {
	block_template_part( 'header' );
}
?>

<main class="wp-block-group" style="margin-top:var(--wp--preset--spacing--60)">
	<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
		<div class="wp-block-group alignwide">
			<p class="has-small-font-size"><?php esc_html_e( 'TEAM', 'insynia' ); ?></p>
			<h1 class="wp-block-heading has-xx-large-font-size"><?php esc_html_e( 'Meet Our Team', 'insynia' ); ?></h1>
			<p><?php esc_html_e( 'This standalone page is accessible directly at /team and currently uses placeholder details.', 'insynia' ); ?></p>
		</div>

		<div class="wp-block-columns alignwide" style="margin-top:var(--wp--preset--spacing--60);flex-wrap:wrap;gap:var(--wp--preset--spacing--40);">
			<?php foreach ( $insynia_team_members as $member ) : ?>
				<div class="wp-block-column" style="flex-basis:30%;min-width:240px;flex-grow:1;">
					<div class="wp-block-group has-border-color has-stroke-border-color" style="border-width:1px;border-style:solid;border-radius:12px;padding:var(--wp--preset--spacing--40);height:100%;">
						<h3 class="wp-block-heading"><?php echo esc_html( $member['name'] ); ?></h3>
						<p class="has-muted-color has-text-color"><strong><?php echo esc_html( $member['role'] ); ?></strong></p>
						<p><?php echo esc_html( $member['bio'] ); ?></p>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</main>

<?php
if ( function_exists( 'block_template_part' ) ) {
	block_template_part( 'footer' );
}
?>

<?php wp_footer(); ?>
</body>
</html>
