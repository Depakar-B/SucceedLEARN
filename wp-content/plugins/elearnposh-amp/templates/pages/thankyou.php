<?php
/**
 * Thank You Page Template (contact form confirmation)
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require ELEARNPOSH_AMP_TEMPLATES_DIR . 'partials/amp-page-shell-start.php';

global $redux_builder_amp;

$config  = \ElearnPOSH\AMP\Plugin::get_instance()->get_config();
$post_id = absint( get_the_ID() );
if ( ! $post_id ) {
	$post_id = $config->resolve_page_id_by_map_key( 'thankyou' );
}
$post_body_class = 'post-' . $post_id;
$page_permalink  = get_permalink( $post_id ) ?: home_url( '/thankyou/' );

$home_url    = elearnposh_amp_url( '/' );
$contact_url = elearnposh_amp_url( '/contact-us/' );
$courses_url = 'https://elearnposh.com/#portfolio';
?>
<!doctype html>
<html amp lang="<?php echo esc_attr( get_bloginfo( 'language' ) ); ?>">
<head>
	<meta charset="utf-8" />
	<meta name="robots" content="noindex, follow" />
	<link rel="shortcut icon" href="<?php echo esc_url( elearnposh_amp_get_favicon_url() ); ?>" type="image/png" />
	<title><?php esc_html_e( 'Thank You', 'elearnposh-amp' ); ?> - eLearnPOSH</title>
	<link rel="dns-prefetch" href="https://cdn.ampproject.org" />
	<?php do_action( 'amp_post_template_head', $this ); ?>
	<style amp-custom>
		body {
			font-family: 'Nunito Sans', Arial, sans-serif;
			margin: 0;
			padding: 0;
			padding-top: 100px !important;
			background: #f6f9fd;
			color: #0f172a;
		}
		<?php elearnposh_amp_output_optimized_css( 'thankyou', array( 'menu', 'footer' ) ); ?>
		.ep-thanks {
			max-width: 720px;
			margin: 0 auto;
			padding: 24px 16px 40px;
		}
		.ep-thanks-card {
			background: #fff;
			border: 1px solid #d9e6f6;
			border-radius: 16px;
			box-shadow: 0 10px 28px rgba(13, 34, 56, 0.08);
			padding: 28px 22px;
			text-align: center;
		}
		.ep-thanks-icon {
			width: 64px;
			height: 64px;
			margin: 0 auto 18px;
			border-radius: 50%;
			background: #d1fae5;
			color: #047857;
			font-size: 34px;
			line-height: 64px;
			font-weight: 700;
		}
		.ep-thanks h1 {
			margin: 0 0 12px;
			font-size: clamp(1.6rem, 1.2rem + 1.4vw, 2rem);
			line-height: 1.2;
			color: #0d2238;
		}
		.ep-thanks-lead {
			margin: 0 0 10px;
			font-size: 16px;
			line-height: 1.7;
			color: #2f4358;
		}
		.ep-thanks-note {
			margin: 0 0 24px;
			font-size: 14px;
			line-height: 1.6;
			color: #54708d;
		}
		.ep-thanks-actions {
			display: flex;
			flex-wrap: wrap;
			gap: 10px;
			justify-content: center;
		}
		.ep-thanks-btn {
			display: inline-flex;
			align-items: center;
			justify-content: center;
			min-height: 44px;
			padding: 10px 18px;
			border-radius: 10px;
			font-size: 14px;
			font-weight: 700;
			text-decoration: none;
		}
		.ep-thanks-btn--primary {
			background: #01465d;
			color: #fff;
			border: 1px solid #01465d;
		}
		.ep-thanks-btn--secondary {
			background: #fff;
			color: #01465d;
			border: 1px solid #cadff5;
		}
		@media (min-width: 641px) {
			.ep-thanks {
				padding: 32px 20px 48px;
			}
			.ep-thanks-card {
				padding: 36px 32px;
			}
		}
	</style>
	<?php elearnposh_amp_output_components( 'thankyou' ); ?>
</head>
<body class="<?php echo esc_attr( $post_body_class ); ?>">
	<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/menu.php'; ?>
	<div class="amp-content-wrapper">
		<main class="ep-thanks">
			<div class="ep-thanks-card">
				<div class="ep-thanks-icon" aria-hidden="true">&#10003;</div>
				<h1><?php esc_html_e( 'Thank You!', 'elearnposh-amp' ); ?></h1>
				<p class="ep-thanks-lead">
					<?php esc_html_e( 'Thank you for contacting us. We have received your request and our team will be in touch with you shortly.', 'elearnposh-amp' ); ?>
				</p>
				<p class="ep-thanks-note">
					<?php esc_html_e( 'A confirmation email has been sent to your inbox with more details.', 'elearnposh-amp' ); ?>
				</p>
				<div class="ep-thanks-actions">
					<a class="ep-thanks-btn ep-thanks-btn--primary" href="<?php echo esc_url( $home_url ); ?>">
						<?php esc_html_e( 'Back to Home', 'elearnposh-amp' ); ?>
					</a>
					<a class="ep-thanks-btn ep-thanks-btn--secondary" href="<?php echo esc_url( $courses_url ); ?>">
						<?php esc_html_e( 'Explore Courses', 'elearnposh-amp' ); ?>
					</a>
					<a class="ep-thanks-btn ep-thanks-btn--secondary" href="<?php echo esc_url( $contact_url ); ?>">
						<?php esc_html_e( 'Contact Us', 'elearnposh-amp' ); ?>
					</a>
				</div>
			</div>
		</main>
	</div>
	<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/footer.php'; ?>
</body>
</html>
