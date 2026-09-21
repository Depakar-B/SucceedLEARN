<?php
/**
 * Equity & Diversity Awareness Page Template
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
$youtube_id      = 'DfPb9YNuijY';

$eq_outcomes = array(
	'Explain the key principles of equality and diversity.',
	'Describe how to handle workplace discrimination or complaints.',
	'List the consequences of inequality or discrimination in the workplace.',
	'Create a workplace free from discrimination.',
	'Know the legislative frameworks in different countries.',
	'Encourage diversity in the workplace.',
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
	.pfe-hero-media .pfe-video{margin-top:0;background:#fff;border:1px solid var(--line);border-radius:14px;box-shadow:0 8px 24px rgba(11,35,58,.08)}
	@media (max-width:1024px) and (min-width:641px){.pfe-hero-grid > .pfe-hero-media{grid-column:1/-1;width:100%;max-width:520px;margin:0 auto;justify-self:center}}
	</style>
	<?php elearnposh_amp_output_current_page_schema_json_ld(); ?>

	<?php elearnposh_amp_output_components( 'course', array( 'amp-youtube' ) ); ?>
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
							<span class="pfe-kicker"><?php esc_html_e( 'Equality, Diversity and Inclusion eLearning', 'elearnposh-amp' ); ?></span>
							<h1><?php esc_html_e( 'Equality, Diversity & Inclusion', 'elearnposh-amp' ); ?></h1>
							<p><?php esc_html_e( 'Equality and Diversity are the buzzwords among corporates lately, for ample amount of reasons. Studies suggest that organizations that invest on diversity training are more profitable than those that do not, are more attuned to customer-needs and have innovative product designs. The first step of getting there is sensitizing the employees on the importance of diversity and inclusion. We got your back!', 'elearnposh-amp' ); ?></p>
							<p><?php esc_html_e( 'Our eLearning module covers all aspects of equality and diversity from definition to forms of discrimination, handling issues and measures to prevent any untoward incidents. The module is designed to be engaging and effective with the use of thoroughly researched content, a blend of text, graphics and interactive activities and knowledge checks.', 'elearnposh-amp' ); ?></p>
							<div class="pfe-hero-actions">
								<a class="btn-primary" href="<?php echo $demo_url; ?>"><?php esc_html_e( 'Schedule a Demo', 'elearnposh-amp' ); ?></a>
							</div>
						</div>
						<div class="pfe-hero-media">
							<div class="pfe-video" aria-label="<?php esc_attr_e( 'Equality and Diversity course overview video', 'elearnposh-amp' ); ?>">
								<amp-youtube data-videoid="<?php echo esc_attr( $youtube_id ); ?>" layout="responsive" width="480" height="270" title="<?php esc_attr_e( 'Equality, Diversity and Inclusion eLearning overview', 'elearnposh-amp' ); ?>"></amp-youtube>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="pfe-section-sm" id="eq-outcomes">
				<div class="pfe-wrap">
					<?php elearnposh_amp_render_outcomes_card( __( 'Through this course, the learners should be able to:', 'elearnposh-amp' ), $eq_outcomes ); ?>
				</div>
			</section>

			<section class="pfe-section-sm">
				<div class="pfe-wrap">
					<?php
					elearnposh_amp_render_cta_band(
						__( 'Sensitize your workforce on equality, diversity and inclusion with engaging, research-backed eLearning.', 'elearnposh-amp' ),
						$demo_url
					);
					?>
				</div>
			</section>

			<?php
			elearnposh_amp_render_top_courses_section(
				array(
					'subtitle' => __( 'Explore our POSH compliance and global workplace training courses.', 'elearnposh-amp' ),
				)
			);
			?>
		</main>
		<div class="hrtag-end"></div>
	</div>
	<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/footer.php'; ?>
</body>
</html>
