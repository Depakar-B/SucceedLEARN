<?php
/**
 * POSH for HEI (Higher Education Institutions) Page Template
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $post;

$ep_id           = absint( $post->ID );
$demo_url        = elearnposh_amp_url( '/contact-us/#demo' );
$post_body_class = 'post-' . $ep_id;
$hei_faqs        = require ELEARNPOSH_AMP_INCLUDES_DIR . 'data/hei-faqs.php';
$faq_schema      = elearnposh_amp_build_faq_schema( $hei_faqs );

$gallery_images = elearnposh_amp_get_course_screenshot_images( $ep_id, __( 'POSH for HEI screenshot', 'elearnposh-amp' ) );
if ( empty( $gallery_images ) ) {
	$gallery_images = elearnposh_amp_urls_to_image_cards(
		array(
			'https://elearnposh.com/wp-content/uploads/2026/06/POSH-for-Higher-Educational-Institutions-Slide-1.webp',
			'https://elearnposh.com/wp-content/uploads/2026/06/POSH-for-Higher-Educational-Institutions-Slide-2.webp',
		),
		__( 'POSH for HEI screenshot', 'elearnposh-amp' )
	);
}

$hei_outcomes = array(
	'Identify sexual harassment at higher educational institutions',
	'Describe the common types of sexual harassment',
	'Understand the difference between intent and impact',
	'State what to do when you experience sexual harassment',
	'Know your duties and responsibilities to counter sexual harassment in the campus',
);

remove_all_actions( 'the_content' );
remove_all_actions( 'amp_post_template_content' );
remove_all_actions( 'ampforwp_content' );
?>
<!doctype html>
<html amp lang="<?php echo esc_attr( get_bloginfo( 'language' ) ); ?>">
<head>
	<meta charset="utf-8" />
	<link rel="shortcut icon" href="<?php echo esc_url( elearnposh_amp_get_favicon_url() ); ?>" type="image/png" />
	<title><?php echo esc_html( get_post_meta( $ep_id, 'title', true ) ?: get_the_title() ); ?> - eLearnPOSH</title>
	<?php do_action( 'amp_post_template_head', $this ); ?>
	<style amp-custom>
	<?php elearnposh_amp_output_optimized_css( 'course', array( 'course-page', 'menu', 'footer' ) ); ?>
	<?php elearnposh_amp_output_course_pfe_base_styles(); ?>
	<?php elearnposh_amp_output_course_pfe_extended_styles(); ?>
	</style>
	<script type="application/ld+json"><?php echo elearnposh_amp_encode_page_schema_json_ld( $faq_schema ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></script>
	<?php elearnposh_amp_output_components( 'course', array( 'amp-accordion' ) ); ?>
</head>
<body class="<?php echo esc_attr( $post_body_class ); ?>">
	<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/menu.php'; ?>
	<div class="amp-content-wrapper">
		<main class="pfe">
			<section class="pfe-hero">
				<div class="pfe-wrap">
				<?php elearnposh_amp_render_breadcrumbs(); ?>
					<div class="pfe-hero-grid">
						<div>
							<span class="pfe-kicker"><?php esc_html_e( 'Higher Educational Institutions', 'elearnposh-amp' ); ?></span>
							<h1><?php esc_html_e( 'POSH at Higher Educational Institutions', 'elearnposh-amp' ); ?></h1>
							<h2 class="pfe-hero-subtitle"><?php esc_html_e( 'Empowering Your Institution through knowledge and compliance', 'elearnposh-amp' ); ?></h2>
							<p><?php esc_html_e( 'At your institution, we prioritize creating a safe and respectful environment for all members. Our comprehensive e-learning course on gender sensitization and sexual harassment prevention is designed to equip staff and students with crucial knowledge and skills to foster a culture of respect and equality.', 'elearnposh-amp' ); ?></p>
							<div class="pfe-hero-actions">
								<a class="btn-primary" href="<?php echo $demo_url; ?>"><?php esc_html_e( 'Schedule a Demo', 'elearnposh-amp' ); ?></a>
							</div>
						</div>
						<?php elearnposh_amp_render_image_gallery( $gallery_images, __( 'POSH for Higher Education Institutions preview images', 'elearnposh-amp' ) ); ?>
					</div>
				</div>
			</section>

			<section class="pfe-section-sm">
				<div class="pfe-wrap">
					<h2 class="pfe-title"><?php esc_html_e( 'Why take this Course?', 'elearnposh-amp' ); ?></h2>
					<p class="pfe-sub"><strong><?php esc_html_e( 'Promote a Safe Environment:', 'elearnposh-amp' ); ?></strong> <?php esc_html_e( 'Understand the importance of gender sensitization and its role in preventing sexual harassment.', 'elearnposh-amp' ); ?></p>
					<h3 class="pfe-title" style="font-size:1.2rem;margin-top:20px;"><?php esc_html_e( 'Compliance with AICTE and UGC Guidelines', 'elearnposh-amp' ); ?></h3>
					<p class="pfe-sub"><?php esc_html_e( 'This course is aligned with key legal and regulatory frameworks aimed at ensuring a safe and respectful environment in higher educational institutions:', 'elearnposh-amp' ); ?></p>
					<div class="hei-compliance-stack">
						<article class="hei-compliance-card hei-compliance-card--posh">
							<span class="hei-compliance-icon hei-compliance-icon--posh" aria-hidden="true">
								<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="m9 12 2 2 4-4"/></svg>
							</span>
							<div class="hei-compliance-body">
								<div class="hei-compliance-meta">
									<span class="hei-compliance-year">2013</span>
								</div>
								<h3><?php esc_html_e( 'The Protection of Sexual Harassment (POSH) Act, 2013', 'elearnposh-amp' ); ?></h3>
								<p><?php esc_html_e( 'Establishing the legal framework for the prevention, prohibition, and redressal of sexual harassment at the workplace, including educational institutions.', 'elearnposh-amp' ); ?></p>
							</div>
						</article>
						<article class="hei-compliance-card hei-compliance-card--ugc">
							<span class="hei-compliance-icon hei-compliance-icon--ugc" aria-hidden="true">
								<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M3 21h18"/><path d="M6 21V7l6-3 6 3v14"/><path d="M10 21v-4h4v4"/><path d="M10 9h.01"/><path d="M14 9h.01"/><path d="M10 13h.01"/><path d="M14 13h.01"/></svg>
							</span>
							<div class="hei-compliance-body">
								<div class="hei-compliance-meta">
									<span class="hei-compliance-year">2015</span>
								</div>
								<h3><?php esc_html_e( 'UGC Regulations on Prevention, Prohibition and Redressal of Sexual Harassment in Higher Educational Institutions', 'elearnposh-amp' ); ?></h3>
								<p><?php esc_html_e( 'Mandating institutions to establish committees for the prevention, prohibition, and redressal of sexual harassment.', 'elearnposh-amp' ); ?></p>
							</div>
						</article>
						<article class="hei-compliance-card hei-compliance-card--aicte">
							<span class="hei-compliance-icon hei-compliance-icon--aicte" aria-hidden="true">
								<svg viewBox="0 0 24 24" aria-hidden="true"><rect x="8" y="2" width="8" height="4" rx="1"/><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><path d="m9 14 2 2 4-4"/></svg>
							</span>
							<div class="hei-compliance-body">
								<div class="hei-compliance-meta">
									<span class="hei-compliance-year">2016</span>
								</div>
								<h3><?php esc_html_e( 'AICTE Regulations on Prevention, Prohibition and Redressal of Sexual Harassment in Higher Educational Institutions', 'elearnposh-amp' ); ?></h3>
								<p><?php esc_html_e( 'Requiring institutions to set up mechanisms for addressing sexual harassment complaints and promoting a safe campus environment.', 'elearnposh-amp' ); ?></p>
							</div>
						</article>
					</div>
					<p class="pfe-sub" style="margin-top:16px;"><strong><?php esc_html_e( 'Educational Excellence:', 'elearnposh-amp' ); ?></strong> <?php esc_html_e( 'Enhance institutional reputation and credibility by demonstrating commitment to social responsibility and ethical practices.', 'elearnposh-amp' ); ?></p>
				</div>
			</section>

			<?php
			elearnposh_amp_render_course_details_cards(
				__( 'Designed for campus-wide awareness, stronger compliance, and a safer learning environment.', 'elearnposh-amp' ),
				array(
					'Module: 1',
					'Duration: 25 Minutes',
					'Role: Staff & Students',
					'Frequently Updated',
				),
				array(
					'Animated & Interactive',
					'Fully Customizable',
					'Flexible Delivery - SaaS & SCORM',
					'Legally Accurate',
				)
			);
			?>

			<section class="pfe-section-sm">
				<div class="pfe-wrap">
					<h2 class="pfe-title"><?php esc_html_e( 'Course Highlights', 'elearnposh-amp' ); ?></h2>
					<ul class="hei-point-grid hei-point-grid--3">
						<li>
							<span class="hei-point-icon hei-point-icon--curriculum" aria-hidden="true">
								<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/><path d="M8 7h8"/><path d="M8 11h8"/></svg>
							</span>
							<div class="hei-point-body">
								<h3><?php esc_html_e( 'Comprehensive Curriculum', 'elearnposh-amp' ); ?></h3>
								<p><?php esc_html_e( 'Covering understanding gender roles and stereotypes, legal frameworks and regulations, and preventive measures and reporting procedures.', 'elearnposh-amp' ); ?></p>
							</div>
						</li>
						<li>
							<span class="hei-point-icon hei-point-icon--learning" aria-hidden="true">
								<svg viewBox="0 0 24 24" aria-hidden="true"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8"/><path d="M12 17v4"/><path d="m10 8 2 2 4-4"/></svg>
							</span>
							<div class="hei-point-body">
								<h3><?php esc_html_e( 'Interactive Learning', 'elearnposh-amp' ); ?></h3>
								<p><?php esc_html_e( 'Engage through interactive modules, case studies, and quizzes to reinforce learning and practical application.', 'elearnposh-amp' ); ?></p>
							</div>
						</li>
						<li>
							<span class="hei-point-icon hei-point-icon--cert" aria-hidden="true">
								<svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="8" r="5"/><path d="M7 14l-2 7 7-3 7 3-2-7"/><path d="M9.5 8.5 11 10l3.5-4"/></svg>
							</span>
							<div class="hei-point-body">
								<h3><?php esc_html_e( 'Certification', 'elearnposh-amp' ); ?></h3>
								<p><?php esc_html_e( 'Receive a certificate upon successful completion.', 'elearnposh-amp' ); ?></p>
							</div>
						</li>
					</ul>

					<h2 class="pfe-title hei-section-gap"><?php esc_html_e( 'Who Should Enroll?', 'elearnposh-amp' ); ?></h2>
					<ul class="hei-point-grid hei-point-grid--2">
						<li>
							<span class="hei-point-icon hei-point-icon--staff" aria-hidden="true">
								<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
							</span>
							<div class="hei-point-body">
								<h3><?php esc_html_e( 'Staff Members', 'elearnposh-amp' ); ?></h3>
								<p><?php esc_html_e( 'Administrators, faculty, and support staff.', 'elearnposh-amp' ); ?></p>
							</div>
						</li>
						<li>
							<span class="hei-point-icon hei-point-icon--students" aria-hidden="true">
								<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c0 1.5 2.7 3 6 3s6-1.5 6-3v-5"/></svg>
							</span>
							<div class="hei-point-body">
								<h3><?php esc_html_e( 'Students', 'elearnposh-amp' ); ?></h3>
								<p><?php esc_html_e( 'Promoting awareness among the student body ensures a holistic approach to institutional safety and respect.', 'elearnposh-amp' ); ?></p>
							</div>
						</li>
					</ul>

					<h2 class="pfe-title hei-section-gap"><?php esc_html_e( 'About AICTE and UGC Guidelines', 'elearnposh-amp' ); ?></h2>
					<p class="pfe-sub"><?php esc_html_e( 'The UGC Regulations, 2015, and the AICTE Regulations, 2016, mandate that educational institutions establish proper mechanisms for the prevention, prohibition, and redressal of sexual harassment. Our course not only meets but exceeds these guidelines, ensuring compliance and promoting a positive learning and working environment for all.', 'elearnposh-amp' ); ?></p>
				</div>
			</section>

			<section class="pfe-section-sm">
				<div class="pfe-wrap">
					<?php
					elearnposh_amp_render_cta_band(
						__( 'Join us in fostering an environment where everyone feels respected and valued. Enroll today and make a difference in creating a safer and more inclusive community at your organization.', 'elearnposh-amp' ),
						$demo_url,
						__( 'Take the First Step Towards a Safer Future', 'elearnposh-amp' )
					);
					?>
				</div>
			</section>

			<section class="pfe-section-sm" id="hei-outcomes">
				<div class="pfe-wrap">
					<?php elearnposh_amp_render_outcomes_card( __( 'Through this course, the staff and students should be able to:', 'elearnposh-amp' ), $hei_outcomes ); ?>
				</div>
			</section>

			<?php elearnposh_amp_render_faq_section( $hei_faqs ); ?>

			<?php elearnposh_amp_render_top_courses_section( array( 'exclude' => 'hei' ) ); ?>
		</main>
		<div class="hrtag-end"></div>
	</div>
	<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/footer.php'; ?>
</body>
</html>
