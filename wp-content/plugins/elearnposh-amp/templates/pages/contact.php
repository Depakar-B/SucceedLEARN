<?php
/**
 * Contact Page Template
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

remove_all_actions( 'ampforwp_content' );

global $redux_builder_amp;

$theme_contact_data = get_stylesheet_directory() . '/partials/contact-page-data.php';
if ( is_readable( $theme_contact_data ) ) {
	require $theme_contact_data;
}

$ep_contact_key_points = function_exists( 'elearnposh_amp_get_contact_key_points' )
	? elearnposh_amp_get_contact_key_points()
	: array();

if ( empty( $ep_contact_enabling_logos ) ) {
	$ep_contact_enabling_logos = array();
}
?>
<!doctype html>
<html amp lang="<?php echo esc_attr( get_bloginfo( 'language' ) ); ?>">
<head>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="<?php echo esc_url( elearnposh_amp_get_favicon_url() ); ?>" type="image/png" />
	<title><?php esc_html_e( 'Book Your Personalized Demo', 'elearnposh-amp' ); ?> - eLearnPOSH</title>
	<?php do_action( 'amp_post_template_head', $this ); ?>

	<style amp-custom>
		body {
			font-family: "Nunito Sans", Arial, sans-serif;
			margin: 0;
			padding: 0;
			padding-top: 100px !important;
			background: #fff;
		}

		<?php
		elearnposh_amp_output_page_styles(
			'contact',
			array( 'contact-highlights' ),
			array( 'contact-form', 'home-clients-testimonials', 'contact-page' )
		);
		if ( function_exists( 'elearnposh_amp_output_contact_highlights_css' ) ) {
			elearnposh_amp_output_contact_highlights_css();
		}
		?>
	</style>

	<?php elearnposh_amp_output_current_page_schema_json_ld(); ?>

	<?php elearnposh_amp_output_components( 'contact', array( 'amp-form', 'amp-mustache' ) ); ?>
</head>
<body>
	<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/menu.php'; ?>

	<div class="amp-content-wrapper">
	<main class="ep-contact-page" id="contact-us-page">
		<section class="ep-contact-hero">
			<div class="ep-contact-hero__inner">
				<?php elearnposh_amp_render_breadcrumbs(); ?>
				<div class="ep-contact-hero__copy">
					<span class="ep-contact-hero__kicker"><?php esc_html_e( 'Contact eLearnPOSH', 'elearnposh-amp' ); ?></span>
					<h1><?php esc_html_e( 'Book Your Personalized Demo', 'elearnposh-amp' ); ?></h1>
					<p class="ep-contact-hero__lead"><?php esc_html_e( 'In just 30 minutes, see how eLearnPOSH delivers real value for your organisation. Book a personalised demo to interact directly with our POSH Subject Matter Experts, explore our role-based courses, IC programmes, and compliance resources, and discover how we help you simplify employee training, committee readiness, and annual reporting - so POSH compliance becomes easier to manage and sustain.', 'elearnposh-amp' ); ?></p>
				</div>
			</div>
		</section>

		<div class="ep-contact-shell">
			<section class="ep-contact-conversion" aria-label="<?php esc_attr_e( 'Highlights and demo form', 'elearnposh-amp' ); ?>">
				<div class="ep-contact-conversion__grid">
					<?php
					if ( function_exists( 'elearnposh_amp_render_contact_highlights' ) ) {
						echo elearnposh_amp_render_contact_highlights(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					} else {
						include ELEARNPOSH_AMP_TEMPLATES_DIR . 'partials/contact-page-highlights.php';
					}
					?>

					<div class="ep-contact-conversion__form" id="demo">
						<?php if ( function_exists( 'elearnposh_amp_render_contact_form' ) ) : ?>
							<?php
							if ( function_exists( 'elearnposh_amp_render_contact_form_title_bar' ) ) {
								elearnposh_amp_render_contact_form_title_bar( 'contact' );
							}
							echo elearnposh_amp_render_contact_form( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
								array(
									'form_id'     => 'ep-legacy-page-amp',
									'title'       => '',
									'description' => '',
									'compact'     => true,
									'desktop_ui'  => true,
									'page_source' => __( 'Contact Us Page', 'elearnposh-amp' ),
								)
							);
							?>
						<?php else : ?>
							<h2 class="test-headline m-0 section-main-heading"><?php esc_html_e( 'Contact Us', 'elearnposh-amp' ); ?></h2>
							<p class="home-contact-cta__lead">
								<?php esc_html_e( 'Use our contact form to book a personalized demo.', 'elearnposh-amp' ); ?>
							</p>
							<a class="amp-pc-btn btn-schedule" href="<?php echo esc_url( function_exists( 'elearnposh_amp_url' ) ? elearnposh_amp_url( '/contact-us/#demo' ) : home_url( '/contact-us/#demo' ) ); ?>">
								<?php esc_html_e( 'Contact Us', 'elearnposh-amp' ); ?>
							</a>
						<?php endif; ?>
					</div>
				</div>
			</section>
		</div>

		<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'partials/home-clients-section.php'; ?>
		<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'partials/home-testimonials-section.php'; ?>

		<?php if ( ! empty( $ep_contact_enabling_logos ) ) : ?>
		<section class="ep-contact-enabling" aria-label="<?php esc_attr_e( 'Enabling POSH Compliance', 'elearnposh-amp' ); ?>">
			<div class="ep-contact-shell">
				<h2 class="ep-contact-section-title"><?php esc_html_e( 'Enabling POSH Compliance for', 'elearnposh-amp' ); ?></h2>
			</div>
			<div class="ep-contact-enabling__grid">
				<?php foreach ( $ep_contact_enabling_logos as $logo ) : ?>
					<div class="ep-contact-enabling__item">
						<amp-img
							src="<?php echo esc_url( $logo['src'] ); ?>"
							width="120"
							height="52"
							layout="fixed"
							alt="<?php echo esc_attr( $logo['alt'] ); ?>">
						</amp-img>
					</div>
				<?php endforeach; ?>
			</div>
		</section>
		<?php endif; ?>
	</main>
	</div>

	<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/footer.php'; ?>
</body>
</html>
