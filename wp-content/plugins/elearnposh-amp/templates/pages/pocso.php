<?php
/**
 * POCSO (Protection of Children from Sexual Offences) Page Template
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
$pocso_faqs      = require ELEARNPOSH_AMP_INCLUDES_DIR . 'data/pocso-faqs.php';
$faq_schema      = elearnposh_amp_build_faq_schema( $pocso_faqs );

$gallery_images = elearnposh_amp_urls_to_image_cards(
	array(
		'https://elearnposh.com/wp-content/uploads/2021/04/image-3.png',
		'https://elearnposh.com/wp-content/uploads/2021/04/vlcsnap-2021-05-31-11h03m42s911.png',
	),
	__( 'POCSO course screenshot', 'elearnposh-amp' )
);

$pocso_outcomes = array(
	'Identify what is child sexual abuse as per POCSO Act',
	'Detect the warning signs of child sexual abuse',
	'Know what to do when staff comes across an incident of child sexual abuse',
	'Describe one\'s responsibilities towards the aggrieved child',
	'Know one\'s duties and responsibilities to counter child sexual abuse',
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
	<title><?php esc_html_e( 'Prevention of Child Sexual Abuse eLearning - POCSO', 'elearnposh-amp' ); ?> - eLearnPOSH</title>
	<?php do_action( 'amp_post_template_head', $this ); ?>
	<style amp-custom>
	<?php elearnposh_amp_output_optimized_css( 'course', array( 'course-page', 'menu', 'footer' ) ); ?>
	<?php elearnposh_amp_output_course_pfe_base_styles(); ?>
	<?php elearnposh_amp_output_course_pfe_extended_styles(); ?>
	@media (max-width:640px){.pfe-card.pocso-outcomes-card{padding:0;background:transparent;border:0;border-radius:0;box-shadow:none}}
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
							<span class="pfe-kicker"><?php esc_html_e( 'POCSO and Child Protection eLearning', 'elearnposh-amp' ); ?></span>
							<h1><?php esc_html_e( 'Prevention of Child Sexual Abuse eLearning - POCSO', 'elearnposh-amp' ); ?></h1>
							<p><?php esc_html_e( 'Since child sexual abuse is a sensitive topic, staff and students generally have many questions regarding it. Many staff and students are unaware of the legalities and their duties and responsibilities.', 'elearnposh-amp' ); ?></p>
							<p><?php esc_html_e( 'This CBT / eLearning course will introduce all the staff and the students to the POCSO law and Child Protection Policy, informing them about their duties and responsibilities.', 'elearnposh-amp' ); ?></p>
							<p><?php esc_html_e( 'This POCSO training is designed to create awareness about the POCSO law among the staff and the students by educating them about their duties and responsibilities to ensure a safe learning environment and give them clarity on what constitutes child sexual abuse.', 'elearnposh-amp' ); ?></p>
							<div class="pfe-hero-actions">
								<a class="btn-primary" href="<?php echo $demo_url; ?>"><?php esc_html_e( 'Schedule a Demo', 'elearnposh-amp' ); ?></a>
							</div>
						</div>
						<?php elearnposh_amp_render_image_gallery( $gallery_images, __( 'POCSO course preview images', 'elearnposh-amp' ) ); ?>
					</div>
				</div>
			</section>

			<?php
			elearnposh_amp_render_course_details_cards(
				__( 'Designed to help school staff recognize, respond to, and prevent child sexual abuse with confidence.', 'elearnposh-amp' ),
				array(
					'Module: 1',
					'Duration: 20 Minutes',
					'Role: School staff',
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

			<section class="pfe-section-sm" id="pocso-outcomes">
				<div class="pfe-wrap">
					<?php elearnposh_amp_render_outcomes_card( __( 'Through this course, the school staff should be able to:', 'elearnposh-amp' ), $pocso_outcomes ); ?>
				</div>
			</section>

			<section class="pfe-section-sm">
				<div class="pfe-wrap">
					<?php
					elearnposh_amp_render_cta_band(
						__( 'Help your school staff and students understand POCSO law, recognize warning signs, and respond responsibly to protect children.', 'elearnposh-amp' ),
						$demo_url
					);
					?>
				</div>
			</section>

			<?php elearnposh_amp_render_faq_section( $pocso_faqs ); ?>

			<?php elearnposh_amp_render_top_courses_section( array( 'exclude' => 'pocso' ) ); ?>
		</main>
		<div class="hrtag-end"></div>
	</div>
	<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/footer.php'; ?>
</body>
</html>
