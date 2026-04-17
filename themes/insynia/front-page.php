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
							<div class="stack stack--xl">
								<section class="entry stack stack--lg">
									<header class="stack stack--sm">
										<p><?php esc_html_e( 'Welcome to the EJLS demo homepage', 'insynia' ); ?></p>
										<h1><?php esc_html_e( 'Building Better Learning Outcomes', 'insynia' ); ?></h1>
										<p>
											<?php esc_html_e( 'This section contains sample content so you can preview layout, spacing, and typography before final copy is ready.', 'insynia' ); ?>
										</p>
									</header>
									<div class="cluster">
										<a class="btn btn--primary" href="#"><?php esc_html_e( 'Get Started', 'insynia' ); ?></a>
										<a class="btn btn--secondary" href="#"><?php esc_html_e( 'View Programs', 'insynia' ); ?></a>
									</div>
								</section>

								<section class="stack stack--lg">
									<h2><?php esc_html_e( 'About Us', 'insynia' ); ?></h2>
									<p>
										<?php esc_html_e( 'EJLS is a community-focused learning initiative that partners with families, educators, and local organizations to support every learner from foundation to future goals.', 'insynia' ); ?>
									</p>
									<div class="grid grid--3">
										<article class="entry stack stack--sm">
											<h3><?php esc_html_e( 'Our Mission', 'insynia' ); ?></h3>
											<p><?php esc_html_e( 'Deliver accessible, high-quality educational support that builds confidence, curiosity, and long-term academic success.', 'insynia' ); ?></p>
										</article>
										<article class="entry stack stack--sm">
											<h3><?php esc_html_e( 'What We Do', 'insynia' ); ?></h3>
											<p><?php esc_html_e( 'We run after-school programs, mentorship sessions, and family engagement workshops designed around practical, measurable outcomes.', 'insynia' ); ?></p>
										</article>
										<article class="entry stack stack--sm">
											<h3><?php esc_html_e( 'Why It Matters', 'insynia' ); ?></h3>
											<p><?php esc_html_e( 'By combining personalized support with community collaboration, we help students stay engaged and progress with purpose.', 'insynia' ); ?></p>
										</article>
									</div>
								</section>

								<section class="stack stack--lg">
									<h2><?php esc_html_e( 'Featured Programs', 'insynia' ); ?></h2>
									<div class="grid grid--3">
										<article class="post-card">
											<div class="post-card__body">
												<p class="post-card__meta"><?php esc_html_e( 'Program', 'insynia' ); ?></p>
												<h3 class="post-card__title"><a href="#"><?php esc_html_e( 'After-School Literacy Lab', 'insynia' ); ?></a></h3>
												<p class="post-card__excerpt"><?php esc_html_e( 'A weekday support track focused on reading confidence and collaborative learning habits.', 'insynia' ); ?></p>
												<a class="post-card__more" href="#"><?php esc_html_e( 'Learn More', 'insynia' ); ?></a>
											</div>
										</article>
										<article class="post-card">
											<div class="post-card__body">
												<p class="post-card__meta"><?php esc_html_e( 'Program', 'insynia' ); ?></p>
												<h3 class="post-card__title"><a href="#"><?php esc_html_e( 'Math Mentorship Series', 'insynia' ); ?></a></h3>
												<p class="post-card__excerpt"><?php esc_html_e( 'Small-group sessions with weekly milestones to strengthen core numeracy skills.', 'insynia' ); ?></p>
												<a class="post-card__more" href="#"><?php esc_html_e( 'Learn More', 'insynia' ); ?></a>
											</div>
										</article>
										<article class="post-card">
											<div class="post-card__body">
												<p class="post-card__meta"><?php esc_html_e( 'Program', 'insynia' ); ?></p>
												<h3 class="post-card__title"><a href="#"><?php esc_html_e( 'Parent Engagement Workshops', 'insynia' ); ?></a></h3>
												<p class="post-card__excerpt"><?php esc_html_e( 'Practical monthly workshops that help families support learning at home.', 'insynia' ); ?></p>
												<a class="post-card__more" href="#"><?php esc_html_e( 'Learn More', 'insynia' ); ?></a>
											</div>
										</article>
									</div>
								</section>

								<section class="stack stack--lg">
									<h2><?php esc_html_e( 'Latest Updates', 'insynia' ); ?></h2>
									<div class="grid grid--2">
										<article class="entry stack stack--sm">
											<h3><?php esc_html_e( 'Spring Enrollment Is Open', 'insynia' ); ?></h3>
											<p><?php esc_html_e( 'Applications for the spring cohort are now available. Priority review closes on May 15.', 'insynia' ); ?></p>
											<a class="btn btn--ghost" href="#"><?php esc_html_e( 'Read Update', 'insynia' ); ?></a>
										</article>
										<article class="entry stack stack--sm">
											<h3><?php esc_html_e( 'Volunteer Orientation Schedule', 'insynia' ); ?></h3>
											<p><?php esc_html_e( 'New volunteer onboarding sessions run every Tuesday and Thursday at 6:00 PM.', 'insynia' ); ?></p>
											<a class="btn btn--ghost" href="#"><?php esc_html_e( 'Read Update', 'insynia' ); ?></a>
										</article>
									</div>
								</section>
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
