<?php
/**
 * POSH for Managers Page Template
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

$youtube_id = '';
$youtube_raw = get_post_meta( $ep_id, 'youtube_id_amp', true );
if ( empty( $youtube_raw ) && function_exists( 'get_field' ) ) {
	$youtube_raw = get_field( 'youtube_id_amp', $ep_id );
}
if ( ! empty( $youtube_raw ) ) {
	$youtube_raw = trim( (string) $youtube_raw );
	if ( preg_match( '/(?:youtube\.com\/(?:watch\?v=|embed\/)|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $youtube_raw, $yt_match ) ) {
		$youtube_id = $yt_match[1];
	} elseif ( preg_match( '/^[a-zA-Z0-9_-]{11}$/', $youtube_raw ) ) {
		$youtube_id = $youtube_raw;
	}
}

$mgr_hero_slides = array(
	array(
		'src' => 'https://elearnposh.com/wp-content/uploads/2026/06/POSH-Training-for-Manager-Slide-1.webp',
		'alt' => 'POSH Training for Managers explaining the role of people managers in preventing workplace sexual harassment',
	),
	array(
		'src' => 'https://elearnposh.com/wp-content/uploads/2026/06/POSH-Training-for-Manager-Slide-2.webp',
		'alt' => 'People managers participating in POSH training to create safe and inclusive workplaces in India',
	),
	array(
		'src' => 'https://elearnposh.com/wp-content/uploads/2026/06/POSH-Training-for-Manager-Slide-3.webp',
		'alt' => 'POSH Training for Managers helping supervisors identify inappropriate workplace behaviour',
	),
	array(
		'src' => 'https://elearnposh.com/wp-content/uploads/2026/06/POSH-Training-for-Manager-Slide-4.webp',
		'alt' => 'Manager receiving a workplace concern during POSH training for managers and leaders',
	),
	array(
		'src' => 'https://elearnposh.com/wp-content/uploads/2026/06/POSH-Training-for-Manager-Slide-5.webp',
		'alt' => 'POSH compliance training for managers focusing on fair and unbiased complaint handling',
	),
	array(
		'src' => 'https://elearnposh.com/wp-content/uploads/2026/06/POSH-Training-for-Manager-Slide-6.webp',
		'alt' => 'People managers collaborating with the Internal Committee during a POSH inquiry process',
	),
	array(
		'src' => 'https://elearnposh.com/wp-content/uploads/2026/06/POSH-Training-for-Manager-Slide-8.webp',
		'alt' => 'POSH Training for Managers demonstrating proactive approaches to harassment prevention',
	),
	array(
		'src' => 'https://elearnposh.com/wp-content/uploads/2026/06/POSH-Training-for-Manager-Slide-9.webp',
		'alt' => 'Leadership development through POSH training for managers in Indian workplaces',
	),
);

$gallery_images = elearnposh_amp_slides_to_image_cards( $mgr_hero_slides );

$mgr_outcomes = array(
	__( 'Implement proactive measures to prevent sexual harassment', 'elearnposh-amp' ),
	__( 'Manage complaints on sexual harassment efficiently', 'elearnposh-amp' ),
	__( 'Use the support mechanism to resolve complaints', 'elearnposh-amp' ),
);

$mgr_why_slides = array(
	array(
		'src' => 'https://elearnposh.com/wp-content/uploads/2026/06/posh-compliance-hr-workplace-policy.webp',
		'alt' => 'HR and compliance team managing POSH policy and workplace safety initiatives',
	),
	array(
		'src' => 'https://elearnposh.com/wp-content/uploads/2026/06/posh-continuous-learning-microlearning.webp',
		'alt' => 'Continuous POSH learning through microlearning modules for ongoing workplace awareness',
	),
	array(
		'src' => 'https://elearnposh.com/wp-content/uploads/2026/06/safe-workplace-respectful-culture-posh.webp',
		'alt' => 'Employees building a safe and respectful workplace culture through POSH training',
	),
	array(
		'src' => 'https://elearnposh.com/wp-content/uploads/2026/06/posh-employee-training-workplace-awareness.webp',
		'alt' => 'POSH employee training program focused on workplace harassment awareness and compliance',
	),
	array(
		'src' => 'https://elearnposh.com/wp-content/uploads/2026/06/workplace-harassment-prevention-training.webp',
		'alt' => 'Workplace harassment prevention training session for employees under POSH guidelines',
	),
	array(
		'src' => 'https://elearnposh.com/wp-content/uploads/2026/06/posh-elearning-course-employees.webp',
		'alt' => 'POSH eLearning course designed for employee awareness and workplace safety training',
	),
);

$mgr_why_images = elearnposh_amp_slides_to_image_cards( $mgr_why_slides );

remove_all_actions( 'the_content' );
remove_all_actions( 'amp_post_template_content' );
remove_all_actions( 'ampforwp_content' );
?>
<!doctype html>
<html amp lang="<?php echo esc_attr( get_bloginfo( 'language' ) ); ?>">
<head>
	<meta charset="utf-8" />
	<link rel="shortcut icon" href="<?php echo esc_url( elearnposh_amp_get_favicon_url() ); ?>" type="image/png" />
	<title><?php esc_html_e( 'POSH Training for Managers', 'elearnposh-amp' ); ?> - eLearnPOSH</title>
	<?php do_action( 'amp_post_template_head', $this ); ?>
	<style amp-custom>
	<?php elearnposh_amp_output_optimized_css( 'course', array( 'course-page', 'menu', 'footer' ) ); ?>
	<?php elearnposh_amp_output_course_pfe_base_styles(); ?>
	<?php elearnposh_amp_output_course_pfe_extended_styles(); ?>
	.pfe-kicker{font-size:13px;padding:8px 12px;margin-bottom:14px;text-transform:none;letter-spacing:normal;font-weight:700}
	@media (min-width:768px) and (max-width:1024px){
		.mgr-outcomes-video{max-width:480px;width:100%;margin:0 auto}
	}
	</style>
	<?php elearnposh_amp_output_current_page_schema_json_ld(); ?>

	<?php elearnposh_amp_output_components( 'course', array( 'amp-youtube' ) ); ?>
</head>
<body class="<?php echo esc_attr( $post_body_class ); ?>">
	<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/menu.php'; ?>
	<main class="pfe">
			<section class="pfe-hero">
				<div class="pfe-wrap">
				<?php elearnposh_amp_render_breadcrumbs(); ?>
					<div class="pfe-hero-grid">
						<div>
							<span class="pfe-kicker"><?php esc_html_e( 'POSH Training for People Managers', 'elearnposh-amp' ); ?></span>
							<h1><?php esc_html_e( 'POSH Training for Managers', 'elearnposh-amp' ); ?></h1>
							<p><?php esc_html_e( 'People managers play a significant role in implementation of POSH compliance at the workplace. Negligence or ineffective management of sexual harassment incidents by a manager can prove costly to the organization, the team and the victim. Using a learner-centric approach, the module covers the nuances involved in listening to two sides of the same story without any judgement, handling the complaints effectively and working with the IC to ensure fairness.', 'elearnposh-amp' ); ?></p>
							<p><?php esc_html_e( 'Information on best practices, engaging activities, differentiation between proactive and reactive measures, self-paced learning method, etc. are incorporated to enable the managers.', 'elearnposh-amp' ); ?></p>
							<div class="pfe-hero-actions">
								<a class="btn-primary" href="<?php echo $demo_url; ?>"><?php esc_html_e( 'Schedule a Demo', 'elearnposh-amp' ); ?></a>
							</div>
						</div>
						<?php elearnposh_amp_render_image_gallery( $gallery_images, __( 'POSH Training for Managers course preview images', 'elearnposh-amp' ), 'hero' ); ?>
					</div>
				</div>
			</section>

			<?php
			elearnposh_amp_render_course_details_cards(
				__( 'Equip people managers with practical POSH skills, from proactive prevention to fair complaint handling.', 'elearnposh-amp' ),
				array(
					'Modules: 2',
					'POSH Foundation',
					'POSH Training for Managers',
					'Advanced Reporting',
				),
				array(
					'Fully Customizable',
					'Animated',
					'Interactive',
					'Legally Accurate',
				),
				$demo_url,
				__( 'Schedule a Demo', 'elearnposh-amp' ),
				__( 'Schedule a demo for POSH Training for Managers', 'elearnposh-amp' ),
				'mgr-details',
				__( 'Course Details', 'elearnposh-amp' ),
				__( 'Salient Features', 'elearnposh-amp' )
			);
			?>

			<section class="pfe-section-sm">
				<div class="pfe-wrap">
					<div class="pfe-info-panel">
						<div class="pfe-why-grid">
							<div>
								<h2 class="pfe-title"><?php esc_html_e( 'Why POSH Training Is Important', 'elearnposh-amp' ); ?></h2>
								<p class="pfe-sub pfe-sub-wide"><?php esc_html_e( 'POSH training is an essential part of building a safe, respectful, and legally compliant workplace. Under the POSH Act, employers are required to provide a work environment free from sexual harassment, and organizations with 10 or more employees are required to constitute an Internal Committee. The law and rules also place responsibilities on employers to organize awareness programmes, workshops, and orientation initiatives to support prevention and compliance.', 'elearnposh-amp' ); ?></p>
								<p class="pfe-sub pfe-sub-wide" style="margin-top:12px;"><?php esc_html_e( 'For organizations, this makes POSH training more than a compliance formality. It helps people managers understand acceptable workplace behaviour, recognize misconduct early, respond appropriately, and support a culture of accountability, dignity, and prevention alongside the Internal Committee.', 'elearnposh-amp' ); ?></p>
							</div>
							<?php elearnposh_amp_render_image_gallery( $mgr_why_images, __( 'Why POSH training visual gallery', 'elearnposh-amp' ) ); ?>
						</div>
					</div>
				</div>
			</section>

			<?php elearnposh_amp_render_mgr_outcomes_section( $mgr_outcomes, $youtube_id ); ?>

			<section class="pfe-section-sm">
				<div class="pfe-wrap">
					<?php
					elearnposh_amp_render_cta_band(
						__( 'Equip your people managers with practical POSH skills, from proactive prevention to fair complaint handling alongside the Internal Committee.', 'elearnposh-amp' ),
						$demo_url
					);
					?>
				</div>
			</section>

			<?php elearnposh_amp_render_top_courses_section( array( 'exclude' => 'managers' ) ); ?>
	</main>
	<div class="hrtag-end"></div>
	<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/footer.php'; ?>
</body>
</html>
