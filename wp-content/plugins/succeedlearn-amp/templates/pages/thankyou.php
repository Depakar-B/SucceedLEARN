<?php
/**
 * SucceedLEARN AMP — Thank You (bare shell, no menu/footer).
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$canonical = home_url( '/thank-you/' );
foreach ( array( 'thank-you', 'thankyou' ) as $slug ) {
	$page = get_page_by_path( $slug );
	if ( $page instanceof WP_Post && 'publish' === $page->post_status ) {
		$link = get_permalink( $page );
		if ( $link ) {
			$canonical = $link;
			break;
		}
	}
}

$return_url = home_url( '/' );
if ( isset( $_GET['return'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
	$candidate = esc_url_raw( wp_unslash( $_GET['return'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended
	$safe      = wp_validate_redirect( $candidate, false );
	if ( $safe ) {
		$path = (string) wp_parse_url( $safe, PHP_URL_PATH );
		if ( ! $path || ( false === strpos( $path, '/thank-you' ) && false === strpos( $path, '/thankyou' ) ) ) {
			$return_url = $safe;
		}
	}
} elseif ( ! empty( $_SERVER['HTTP_REFERER'] ) ) {
	$candidate = esc_url_raw( wp_unslash( $_SERVER['HTTP_REFERER'] ) );
	$safe      = wp_validate_redirect( $candidate, false );
	if ( $safe ) {
		$path = (string) wp_parse_url( $safe, PHP_URL_PATH );
		if ( ! $path || ( false === strpos( $path, '/thank-you' ) && false === strpos( $path, '/thankyou' ) ) ) {
			$return_url = function_exists( 'succeedlearn_amp_url' ) ? succeedlearn_amp_url( $safe ) : $safe;
		}
	}
} elseif ( function_exists( 'succeedlearn_amp_url' ) ) {
	$return_url = succeedlearn_amp_url( home_url( '/' ) );
}

$meta_desc = __( 'Thanks for registering. Your details are confirmed and a SucceedLEARN specialist will be in touch shortly.', 'succeedlearn-amp' );
?>
<!doctype html>
<html amp lang="<?php echo esc_attr( get_bloginfo( 'language' ) ); ?>">
<head>
	<meta charset="utf-8" />
	<script async src="https://cdn.ampproject.org/v0.js"></script>
	<script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>
	<link rel="canonical" href="<?php echo esc_url( $canonical ); ?>" />
	<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1" />
	<meta name="description" content="<?php echo esc_attr( wp_strip_all_tags( $meta_desc ) ); ?>" />
	<link rel="shortcut icon" href="<?php echo esc_url( succeedlearn_amp_get_favicon_url() ); ?>" />
	<title><?php echo esc_html( 'Thank You | SucceedLEARN' ); ?></title>
	<link rel="preconnect" href="https://cdn.ampproject.org" />
	<link rel="dns-prefetch" href="https://cdn.ampproject.org" />
	<style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style>
	<noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
	<?php do_action( 'amp_post_template_head', $this ); ?>
	<style amp-custom>
	body{margin:0;font-family:system-ui,-apple-system,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif;background:#f5f5f5;color:#4A4A4A}
	.sl-thankyou-page{--sl-page-navy:#16234e;--sl-page-primary:#1472ba;--sl-page-text:#4A4A4A;--sl-page-white:#fff;min-height:100vh;display:flex;align-items:center;justify-content:center;padding:32px 16px;box-sizing:border-box}
	.sl-thankyou-card{width:100%;max-width:720px;margin:0 auto;padding:36px 28px;border-radius:18px;background:var(--sl-page-white);border:1px solid rgba(107,124,147,.16);box-shadow:0 18px 48px rgba(22,35,78,.08);text-align:center;box-sizing:border-box}
	.sl-thankyou-success{position:relative;display:inline-flex;align-items:center;justify-content:center;width:96px;height:96px;margin:0 auto 24px}
	.sl-thankyou-success__ring{position:absolute;inset:0;border-radius:50%;background:#0e9f4a;box-shadow:0 10px 24px rgba(14,159,74,.28);transform:scale(.55);opacity:0;animation:sl-thankyou-pop .5s cubic-bezier(.22,1,.36,1) .05s forwards}
	.sl-thankyou-success__check{position:relative;z-index:1;display:block;transform-origin:50% 55%;transform:scale(.4);opacity:0;animation:sl-thankyou-check .45s cubic-bezier(.22,1,.36,1) .28s forwards}
	.sl-thankyou-success__check amp-img{display:block}
	@keyframes sl-thankyou-pop{0%{transform:scale(.55);opacity:0}70%{transform:scale(1.05);opacity:1}100%{transform:scale(1);opacity:1}}
	@keyframes sl-thankyou-check{0%{transform:scale(.4);opacity:0}100%{transform:scale(1);opacity:1}}
	@media(prefers-reduced-motion:reduce){.sl-thankyou-success__ring,.sl-thankyou-success__check{animation:none;opacity:1;transform:none}}
	.sl-thankyou-card__eyebrow{margin:0 0 12px;color:var(--sl-page-primary);font-size:13px;font-weight:700;letter-spacing:.04em;text-transform:uppercase}
	.sl-thankyou-card__title{margin:0 0 12px;color:var(--sl-page-navy);font-size:32px;font-weight:700;line-height:1.2}
	.sl-thankyou-card__confirm{margin:0 0 16px;color:var(--sl-page-primary);font-size:18px;font-weight:700;line-height:1.35}
	.sl-thankyou-card__message{margin:0 auto 28px;max-width:540px;color:var(--sl-page-text);font-size:16px;line-height:1.65}
	.sl-thankyou-card__btn{display:inline-flex;align-items:center;justify-content:center;gap:10px;min-height:48px;padding:13px 20px;border-radius:8px;background:#ea3e24;border:1px solid transparent;color:#fff;font-size:15px;font-weight:700;line-height:1.3;text-decoration:none;box-sizing:border-box;box-shadow:0 6px 16px rgba(234,62,36,.28)}
	.sl-thankyou-card__btn span{font-size:18px;line-height:1}
	@media(max-width:699px){
		.sl-thankyou-card{padding:28px 18px}
		.sl-thankyou-card__title{font-size:28px}
		.sl-thankyou-card__btn{width:100%}
	}
	</style>
</head>
<body class="sl-thankyou-page">
	<amp-analytics type="gtag" data-credentials="include">
		<script type="application/json">
		{
			"vars": {
				"gtag_id": "AW-18468349533",
				"config": {
					"AW-18468349533": {
						"groups": "default"
					}
				}
			},
			"triggers": {
				"leadFormConversion": {
					"on": "visible",
					"vars": {
						"event_name": "conversion",
						"send_to": "AW-18468349533/epl-CPzGtIEdEN3MsuZE",
						"value": 1.0,
						"currency": "INR"
					}
				}
			}
		}
		</script>
	</amp-analytics>
	<main>
		<article class="sl-thankyou-card" aria-labelledby="sl-thankyou-title">
			<div class="sl-thankyou-success" role="img" aria-label="<?php esc_attr_e( 'Success', 'succeedlearn-amp' ); ?>">
				<span class="sl-thankyou-success__ring" aria-hidden="true"></span>
				<span class="sl-thankyou-success__check">
					<amp-img
						src="<?php echo esc_url( get_theme_file_uri( 'assets/images/thank-you-check-white.png' ) ); ?>"
						width="58"
						height="51"
						layout="fixed"
						alt=""
					></amp-img>
				</span>
			</div>
			<p class="sl-thankyou-card__eyebrow"><?php esc_html_e( 'Submission received', 'succeedlearn-amp' ); ?></p>
			<h1 id="sl-thankyou-title" class="sl-thankyou-card__title">
				<?php esc_html_e( 'Thanks for Registering', 'succeedlearn-amp' ); ?>
			</h1>
			<p class="sl-thankyou-card__confirm">
				<?php esc_html_e( 'Your details are confirmed.', 'succeedlearn-amp' ); ?>
			</p>
			<p class="sl-thankyou-card__message">
				<?php
				esc_html_e(
					'A security specialist will call shortly to kick off your human firewall build.',
					'succeedlearn-amp'
				);
				?>
			</p>
			<a class="sl-thankyou-card__btn" href="<?php echo esc_url( $return_url ); ?>">
				<?php esc_html_e( 'Back to the main page', 'succeedlearn-amp' ); ?>
				<span aria-hidden="true">→</span>
			</a>
		</article>
	</main>
	<?php do_action( 'amp_post_template_footer', $this ); ?>
</body>
</html>
