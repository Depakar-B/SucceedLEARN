<?php
/**
 * SucceedLEARN AMP — About Us
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$canonical   = home_url( '/about-us/' );
$contact_url = home_url( '/contact-us/' );
foreach ( array( 'about-us', 'about' ) as $slug ) {
	$page = get_page_by_path( $slug );
	if ( $page instanceof WP_Post && 'publish' === $page->post_status ) {
		$link = get_permalink( $page );
		if ( $link ) {
			$canonical = $link;
			break;
		}
	}
}

$contact_amp = function_exists( 'succeedlearn_amp_url' ) ? succeedlearn_amp_url( $contact_url ) : $contact_url;

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

$page_title = __( 'About Us', 'succeedlearn-amp' );
$meta_desc  = __( 'SucceedLEARN is a product of Succeed Technologies, created to revolutionize compliance eLearning for organizations across the globe.', 'succeedlearn-amp' );
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
		'about_us',
		array( 'home-page' ),
		array( 'home-sections', 'about-us' )
	);
	?>
	</style>
	<?php succeedlearn_amp_output_components( 'about_us', array( 'amp-sidebar' ) ); ?>
</head>
<body class="sl-home sl-about-page">
<?php include SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'components/menu.php'; ?>

<main id="main-content">

	<section class="sl-about-hero">
		<div class="sl-wrap sl-about-hero__grid">
			<div class="sl-about-hero__content">
				<p class="sl-about-hero__eyebrow"><?php esc_html_e( 'About SucceedLearn', 'succeedlearn-amp' ); ?></p>
				<h1 class="sl-about-hero__title">
					<?php esc_html_e( 'Empowering Better Learning,', 'succeedlearn-amp' ); ?>
					<span><?php esc_html_e( 'Building Better Compliance.', 'succeedlearn-amp' ); ?></span>
				</h1>
				<p class="sl-about-hero__desc">
					<?php
					echo wp_kses(
						sprintf(
							/* translators: %s: company name */
							__( 'SucceedLEARN is a product of %s, created to revolutionize how people learn online and simplify compliance eLearning for organizations across the globe.', 'succeedlearn-amp' ),
							'<strong>Succeed Technologies®</strong>'
						),
						array( 'strong' => array() )
					);
					?>
				</p>
				<p class="sl-about-hero__desc"><?php esc_html_e( 'With expertise in corporate training, adult learning, instructional design and multiple industries, we create engaging and impactful learning experiences that make compliance training easier, smarter and more enjoyable.', 'succeedlearn-amp' ); ?></p>
				<div class="sl-about-hero__actions">
					<a class="sl-btn sl-btn--primary" href="<?php echo esc_url( $contact_amp ); ?>"><?php esc_html_e( 'Get in Touch', 'succeedlearn-amp' ); ?></a>
				</div>
			</div>
			<div class="sl-about-hero__visual" aria-hidden="true">
				<div class="sl-about-hero__card sl-about-hero__card--main">
					<div class="sl-about-hero__icon"><span>✓</span></div>
					<div>
						<span class="sl-about-hero__card-label"><?php esc_html_e( 'Compliance Learning', 'succeedlearn-amp' ); ?></span>
						<h3>
							<?php esc_html_e( 'Learn. Engage.', 'succeedlearn-amp' ); ?>
							<span><?php esc_html_e( 'Succeed.', 'succeedlearn-amp' ); ?></span>
						</h3>
					</div>
				</div>
				<div class="sl-about-hero__mini-grid">
					<div class="sl-about-hero__card sl-about-hero__card--small">
						<span class="sl-about-hero__mini-icon">✦</span>
						<div>
							<strong>30+</strong>
							<small><?php esc_html_e( 'Languages', 'succeedlearn-amp' ); ?></small>
						</div>
					</div>
					<div class="sl-about-hero__card sl-about-hero__card--small">
						<span class="sl-about-hero__mini-icon">◎</span>
						<div>
							<strong><?php esc_html_e( 'eLearning', 'succeedlearn-amp' ); ?></strong>
							<small><?php esc_html_e( 'Made Engaging', 'succeedlearn-amp' ); ?></small>
						</div>
					</div>
				</div>
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
