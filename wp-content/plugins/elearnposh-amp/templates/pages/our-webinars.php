<?php
/**
 * Our Webinars Page Template (AMP) — Page ID 11438, uses [wmpro_all_amp].
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/** Production page ID — matches Config::OUR_WEBINARS_PAGE_ID. */
if ( ! defined( 'ELEARNPOSH_AMP_OUR_WEBINARS_PAGE_ID' ) ) {
	define( 'ELEARNPOSH_AMP_OUR_WEBINARS_PAGE_ID', 11438 );
}

require ELEARNPOSH_AMP_TEMPLATES_DIR . 'partials/amp-page-shell-start.php';

global $redux_builder_amp;

$config  = \ElearnPOSH\AMP\Plugin::get_instance()->get_config();
$post_id = absint( get_the_ID() );
if ( ! $post_id ) {
	$post_id = $config->resolve_page_id_by_map_key( 'our-webinars' );
}
if ( ! $post_id ) {
	$post_id = ELEARNPOSH_AMP_OUR_WEBINARS_PAGE_ID;
}
$post_body_class = 'post-' . $post_id;
$page_permalink = get_permalink( $post_id ) ?: home_url( '/our-webinars/' );
$page_title     = function_exists( 'wmpro_get_title' ) ? wmpro_get_title( 'all' ) : __( 'Our Webinars', 'elearnposh-amp' );
$hero_intro     = function_exists( 'wmpro_get_hero_intro' )
	? wmpro_get_hero_intro()
	: array(
		'subtitle'    => __( 'Expert-led sessions on POSH compliance, prevention, and Internal Committee development.', 'elearnposh-amp' ),
		'description' => __( 'Learn from subject matter experts through live sessions and on-demand recordings built for HR leaders, Internal Committee members, and compliance teams. Browse upcoming webinars, filter by topic and year, and revisit our library of past POSH training sessions anytime.', 'elearnposh-amp' ),
	);

$webinars_schema = array(
	'@context'    => 'https://schema.org',
	'@type'       => 'CollectionPage',
	'name'        => $page_title,
	'description' => trim( ( $hero_intro['subtitle'] ?? '' ) . ' ' . ( $hero_intro['description'] ?? '' ) ),
	'url'         => $page_permalink,
	'inLanguage'  => get_bloginfo( 'language' ),
	'publisher'   => array(
		'@type' => 'Organization',
		'name'  => 'eLearnPOSH',
		'url'   => home_url( '/' ),
	),
);
?>
<!doctype html>
<html amp lang="<?php echo esc_attr( get_bloginfo( 'language' ) ); ?>">
<head>
	<meta charset="utf-8" />
	<link rel="shortcut icon" href="<?php echo esc_url( elearnposh_amp_get_favicon_url() ); ?>" type="image/png" />
	<title><?php echo esc_html( $page_title ); ?> - eLearnPOSH</title>
	<link rel="dns-prefetch" href="https://cdn.ampproject.org" />

	<?php do_action( 'amp_post_template_head', $this ); ?>

	<style amp-custom>
		body{font-family:'Nunito Sans',Arial,sans-serif;margin:0;padding:0;padding-top:100px !important;background:#f6f9fd;color:#0f172a}
		a{text-decoration:none;color:inherit}
		@media (max-width:640px){body{padding-top:90px !important}}
		<?php elearnposh_amp_output_page_styles( 'our-webinars', array(), array( 'page-hero-subtitle', 'contact-form', 'our-webinars-page' ) ); ?>
	</style>
	<script type="application/ld+json"><?php echo elearnposh_amp_encode_page_schema_json_ld( $webinars_schema ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></script>
	<?php elearnposh_amp_output_components( 'our-webinars' ); ?>
</head>
<body class="<?php echo esc_attr( $post_body_class ); ?>">

<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/menu.php'; ?>

<div class="amp-content-wrapper">
<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/user-notification.php'; ?>

<div class="ow-page">
	<div class="ow-hero">
		<?php elearnposh_amp_render_breadcrumbs(); ?>
		<div class="ow-hero-row">
			<div class="ow-hero-copy">
				<h1><?php echo esc_html( $page_title ); ?></h1>
				<?php if ( ! empty( $hero_intro['subtitle'] ) ) : ?>
					<h2 class="ep-page-hero__subtitle ow-hero-subtitle"><?php echo esc_html( $hero_intro['subtitle'] ); ?></h2>
				<?php endif; ?>
				<?php if ( ! empty( $hero_intro['description'] ) ) : ?>
					<p class="ow-hero-desc"><?php echo esc_html( $hero_intro['description'] ); ?></p>
				<?php endif; ?>
				<div class="ow-hero-actions">
					<button
						type="button"
						class="ow-hero-library-btn"
						on="tap:wmall-access-lightbox.open"
						role="button"
						tabindex="0"
					><?php esc_html_e( 'Access Webinar Library', 'elearnposh-amp' ); ?></button>
				</div>
			</div>
		</div>
	</div>

	<?php
	if ( shortcode_exists( 'wmpro_all_amp' ) ) {
		echo do_shortcode( '[wmpro_all_amp]' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	} else {
		?>
		<div class="ow-empty">
			<p><?php esc_html_e( 'Webinar Manager Pro plugin is required for this page.', 'elearnposh-amp' ); ?></p>
		</div>
		<?php
	}
	?>

</div>

</div>

<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/footer.php'; ?>

</body>
</html>
