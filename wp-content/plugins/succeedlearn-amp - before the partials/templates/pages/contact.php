<?php
/**
 * SucceedLEARN AMP — Contact Us
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$uploads    = content_url( '/uploads' );
$hero_img   = $uploads . '/2026/08/Get-Your-Personalized.webp';
$local_img  = WP_CONTENT_DIR . '/uploads/2026/08/Get-Your-Personalized.webp';
if ( ! file_exists( $local_img ) ) {
	$hero_img = 'https://succeedlearn.com/wp-content/uploads/2026/08/Get-Your-Personalized.webp';
}

$canonical = home_url( '/contact-us/' );
foreach ( array( 'contact-us', 'contact' ) as $slug ) {
	$page = get_page_by_path( $slug );
	if ( $page instanceof WP_Post && 'publish' === $page->post_status ) {
		$link = get_permalink( $page );
		if ( $link ) {
			$canonical = $link;
			break;
		}
	}
}

require_once SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'data/clients.php';
$home_client_limit = 12;
$client_logos      = succeedlearn_amp_get_home_client_logos( $home_client_limit );
$uploads_base      = content_url( '/uploads/2026/03' );
$show_view_all     = false;
$clients_page_url  = home_url( '/clients/' );

if ( class_exists( '\\SucceedLEARN\\AMP\\Plugin' ) ) {
	$config = \SucceedLEARN\AMP\Plugin::get_instance()->get_config();
	if ( $config && method_exists( $config, 'has_clients_page' ) && $config->has_clients_page() ) {
		$show_view_all    = true;
		$clients_page_url = $config->get_clients_url();
		if ( function_exists( 'succeedlearn_amp_url' ) ) {
			$clients_page_url = succeedlearn_amp_url( $clients_page_url );
		}
	}
}

$page_title = __( 'Contact Us', 'succeedlearn-amp' );
$meta_desc  = __( 'Contact SucceedLEARN for demos, sales enquiries, and support. Our team is ready to help with compliance training questions.', 'succeedlearn-amp' );
?>
<!doctype html>
<html amp lang="<?php echo esc_attr( get_bloginfo( 'language' ) ); ?>">
<head>
	<meta charset="utf-8" />
	<script async src="https://cdn.ampproject.org/v0.js"></script>
	<link rel="canonical" href="<?php echo esc_url( $canonical ); ?>" />
	<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1" />
	<meta name="description" content="<?php echo esc_attr( wp_strip_all_tags( $meta_desc ) ); ?>" />
	<link rel="shortcut icon" href="<?php echo esc_url( succeedlearn_amp_get_favicon_url() ); ?>" />
	<title><?php echo esc_html( $page_title . ' | SucceedLEARN' ); ?></title>
	<link rel="preconnect" href="https://cdn.ampproject.org" />
	<link rel="dns-prefetch" href="https://cdn.ampproject.org" />
	<style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style>
	<noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
	<?php do_action( 'amp_post_template_head', $this ); ?>
	<style amp-custom>
	<?php
	succeedlearn_amp_output_page_styles(
		'contact',
		array( 'home-page' ),
		array( 'home-sections', 'contact-form', 'contact' )
	);
	?>
	</style>
	<?php succeedlearn_amp_output_components( 'contact', array( 'amp-form', 'amp-mustache', 'amp-sidebar', 'amp-bind' ) ); ?>
</head>
<body class="sl-home sl-contact-page">
<?php include SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'components/menu.php'; ?>

<main id="main-content">

	<section class="sl-contact-hero">
		<div class="sl-wrap sl-contact-hero__grid">
			<div class="sl-contact-hero__content">
				<p class="sl-contact-hero__eyebrow"><?php esc_html_e( 'Contact Us', 'succeedlearn-amp' ); ?></p>
				<h1 class="sl-contact-hero__title">
					<?php esc_html_e( 'Your perspective is invaluable to us.', 'succeedlearn-amp' ); ?>
					<span><?php esc_html_e( 'We eagerly await your input.', 'succeedlearn-amp' ); ?></span>
				</h1>
				<h2 class="sl-contact-hero__heading"><?php esc_html_e( "We're here to help!", 'succeedlearn-amp' ); ?></h2>
				<p class="sl-contact-hero__lead"><?php esc_html_e( 'Got questions or feedback?', 'succeedlearn-amp' ); ?></p>
				<p class="sl-contact-hero__desc"><?php esc_html_e( 'Our dedicated support team is available to assist you with any inquiries or concerns you may have. We strive to provide prompt and helpful assistance to ensure your learning experience with us is seamless and enjoyable.', 'succeedlearn-amp' ); ?></p>
				<div class="sl-contact-hero__email">
					<span class="sl-contact-hero__email-label"><?php esc_html_e( 'Email Us:', 'succeedlearn-amp' ); ?></span>
					<a href="mailto:sales@succeedtech.com">sales@succeedtech.com</a>
				</div>
			</div>
			<div class="sl-contact-hero__media">
				<amp-img
					src="<?php echo esc_url( $hero_img ); ?>"
					width="720"
					height="640"
					layout="responsive"
					alt="<?php esc_attr_e( 'SucceedLEARN team ready to help', 'succeedlearn-amp' ); ?>"
				></amp-img>
			</div>
		</div>
	</section>

	<section class="sl-section" id="contact">
		<div class="sl-wrap sl-contact-layout">
			<div class="sl-contact-intro">
				<p class="sl-eyebrow"><?php esc_html_e( 'Get Your Personalized Demo', 'succeedlearn-amp' ); ?></p>
				<h2 class="sl-h2"><?php esc_html_e( 'Need Help or Have a Query?', 'succeedlearn-amp' ); ?></h2>
				<p class="sl-lead"><?php esc_html_e( "Tell us a bit about your organisation and we'll show you exactly how SucceedLEARN reduces risk, simplifies compliance, and drives measurable behaviour change — for your team.", 'succeedlearn-amp' ); ?></p>
			</div>
			<div class="sl-contact-form-card">
				<?php
				if ( function_exists( 'succeedlearn_amp_render_contact_form' ) ) {
					succeedlearn_amp_render_contact_form(
						array(
							'form_page'     => $page_title,
							'form_page_url' => $canonical,
							'echo'          => true,
						)
					);
				} else {
					echo do_shortcode( '[contact_form]' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				}
				?>
			</div>
		</div>
	</section>

	<section class="sl-section sl-section--alt">
		<div class="sl-wrap sl-grid-4 sl-stats">
			<?php
			$stats = array(
				array( '1000+', __( 'Organisations Trained', 'succeedlearn-amp' ) ),
				array( '90%+', __( 'Learner Engagement', 'succeedlearn-amp' ) ),
				array( '70%', __( 'Reduction in Phishing Risk', 'succeedlearn-amp' ) ),
				array( '90%', __( 'Compliance Risk Reduced', 'succeedlearn-amp' ) ),
			);
			foreach ( $stats as $stat ) :
				?>
				<div class="sl-stat">
					<p class="sl-stat__value"><?php echo esc_html( $stat[0] ); ?></p>
					<p class="sl-stat__label"><?php echo esc_html( $stat[1] ); ?></p>
				</div>
			<?php endforeach; ?>
		</div>
	</section>

	<section class="sl-section sl-clients">
		<div class="sl-wrap" style="text-align:center">
			<h2 class="sl-h2 sl-clients__title"><?php echo wp_kses_post( __( 'Trusted by Leading <span>700+</span> Organisations', 'succeedlearn-amp' ) ); ?></h2>
			<p class="sl-lead"><?php esc_html_e( 'Building safer, compliant, and resilient workplaces worldwide.', 'succeedlearn-amp' ); ?></p>
			<?php include SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'partials/clients-logos.php'; ?>
		</div>
	</section>

</main>

<?php include SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'components/footer.php'; ?>
<?php do_action( 'amp_post_template_footer', $this ); ?>
</body>
</html>
