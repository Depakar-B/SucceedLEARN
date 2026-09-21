<?php
/**
 * Terms & Conditions Page Template
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require ELEARNPOSH_AMP_TEMPLATES_DIR . 'partials/amp-page-shell-start.php';

global $redux_builder_amp;

$post_id         = absint( get_the_ID() );
$post_body_class = 'post-' . $post_id;
$page_permalink  = get_permalink( $post_id ) ?: home_url( '/terms-and-conditions/' );

$terms_schema = array(
	'@context'    => 'https://schema.org',
	'@type'       => 'WebPage',
	'name'        => 'Terms and Conditions for Purchases',
	'description' => 'Terms and conditions for purchasing services and subscriptions from the eLearnPOSH.com online portal.',
	'url'         => home_url( '/terms-and-conditions/' ),
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
	<title><?php esc_html_e( 'Terms and Conditions for Purchases', 'elearnposh-amp' ); ?> - eLearnPOSH</title>
	<link rel="dns-prefetch" href="https://cdn.ampproject.org" />
	<?php do_action( 'amp_post_template_head', $this ); ?>
	<style amp-custom>
		body{font-family:'Nunito Sans',Arial,sans-serif;margin:0;padding:0;padding-top:100px !important;background:#f6f9fd;color:#0f172a}
	<?php elearnposh_amp_output_optimized_css( 'course', array( 'menu', 'footer' ) ); ?>
	.pfe{--bg:#fff;--text:#0d2238;--muted:#54708d;--line:#d9e6f6;--container:min(1290px,100%);background:var(--bg);color:var(--text);font-family:"Inter","Segoe UI",Arial,sans-serif;overflow-x:hidden;padding:0 0 22px}
	.pfe *{box-sizing:border-box}.pfe a{text-decoration:underline;color:#0d73d4}.pfe-wrap{width:var(--container);margin:0 auto}
	.pfe-hero,.pfe-section,.pfe-section-sm{padding:18px 16px}
	.pfe-sub{margin:0;color:var(--muted);line-height:1.75;font-size:16px}
	.pfe-hero{background:radial-gradient(900px 460px at 0% 0%,rgba(47,144,239,.14),transparent 70%),radial-gradient(900px 460px at 100% 0%,rgba(10,154,116,.1),transparent 72%),#fff}
	.pfe-hero h1{margin:0 0 14px;font-size:clamp(1.85rem,1.2rem + 2.2vw,3rem);line-height:1.12;color:var(--text)}
	.pfe-policy-panel{background:transparent;border:0;border-radius:0;box-shadow:none;padding:0 0 22px}
	.pfe-policy-section + .pfe-policy-section{margin-top:28px;padding-top:28px;border-top:1px solid var(--line)}
	.pfe-policy-section h2{margin:0 0 12px;font-size:clamp(1.35rem,1.05rem + 1vw,1.85rem);line-height:1.25;color:var(--text)}
	.pfe-policy-section h3{margin:18px 0 10px;font-size:1.05rem;line-height:1.35;color:#10273f;font-weight:700}
	.pfe-policy-section p,.pfe-policy-section li{margin:0 0 12px;font-size:16px;line-height:1.75;color:#2f4358}
	.pfe-policy-section ul{margin:0 0 12px;padding-left:24px;list-style:disc}
	@media (min-width:641px){.pfe-hero,.pfe-section,.pfe-section-sm{padding:24px 20px}}
	</style>
	<script type="application/ld+json"><?php echo elearnposh_amp_encode_page_schema_json_ld( $terms_schema ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></script>
	<?php elearnposh_amp_output_components( 'course' ); ?>
</head>
<body class="<?php echo esc_attr( $post_body_class ); ?>">
	<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/menu.php'; ?>
	<div class="amp-content-wrapper">
	<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/user-notification.php'; ?>
		<main class="pfe">
			<section class="pfe-hero">
				<div class="pfe-wrap">
					<?php elearnposh_amp_render_breadcrumbs(); ?>
					<h1><?php esc_html_e( 'Terms and Conditions for Purchases', 'elearnposh-amp' ); ?></h1>
					<p class="pfe-sub"><?php esc_html_e( 'Read the terms that apply when you purchase learning services and subscriptions through the eLearnPOSH.com online portal.', 'elearnposh-amp' ); ?></p>
				</div>
			</section>

			<section class="pfe-section" id="terms-conditions-content">
				<div class="pfe-wrap">
					<article class="pfe-policy-panel">
						<section class="pfe-policy-section" id="terms-introduction">
							<h2><?php esc_html_e( '1. Introduction', 'elearnposh-amp' ); ?></h2>
							<p><?php esc_html_e( 'These Terms and Conditions are applicable only for purchase of services and subscriptions from our online portal(Example – Webinar or IC Subscriptions purchased from eLearnPOSH.com portal). This is not applicable for any purchase performed through our other Sales Channels. There may be a separate Service Agreement that will be signed with the organization. For more details, reach out to your Sales/Support POC.', 'elearnposh-amp' ); ?></p>
							<p><?php esc_html_e( 'By purchasing our learning services, you agree to abide by these Terms and Conditions. Please read them carefully before making a purchase. For the purposes of these Terms and Conditions, "you" and "your" refer to the individual or entity purchasing the course/learning services. "Succeed Technologies," "we," "us," and "our" refer to Succeed Technologies Private Limited including its products delivered through eLearnPOSH.com and SucceedLEARN.com, the provider of the courses/learning services.', 'elearnposh-amp' ); ?></p>
						</section>

						<section class="pfe-policy-section" id="terms-purchase-payment">
							<h2><?php esc_html_e( '2. Purchase and Payment', 'elearnposh-amp' ); ?></h2>
							<h3><?php esc_html_e( '2.1. Purchase of Learning Services', 'elearnposh-amp' ); ?></h3>
							<ul>
								<li><?php esc_html_e( 'To purchase a course/learning service, you must complete the checkout process, providing accurate and complete payment and personal information.', 'elearnposh-amp' ); ?></li>
								<li><?php esc_html_e( 'By placing an order, you confirm that you are legally capable of entering into binding contracts.', 'elearnposh-amp' ); ?></li>
							</ul>
							<h3><?php esc_html_e( '2.2. Payment Methods', 'elearnposh-amp' ); ?></h3>
							<ul>
								<li><?php esc_html_e( 'We accept various payment methods including credit/debit cards, UPI, and other specified options.', 'elearnposh-amp' ); ?></li>
								<li><?php esc_html_e( 'All payments are processed securely through our payment gateway providers. To know more about the terms and conditions of our payment gateway providers click here.', 'elearnposh-amp' ); ?></li>
							</ul>
							<h3><?php esc_html_e( '2.3. Pricing', 'elearnposh-amp' ); ?></h3>
							<ul>
								<li><?php esc_html_e( 'Our courses are priced based on the value we provide to customers. Prices are subject to change at our discretion without prior notice.', 'elearnposh-amp' ); ?></li>
								<li><?php esc_html_e( 'All prices are listed in INR/USD and exclude any applicable VAT/service taxes unless otherwise stated. If you require a GST invoice, please write to our customer support at support@succeedtech.com.', 'elearnposh-amp' ); ?></li>
							</ul>
						</section>

						<section class="pfe-policy-section" id="terms-refund-cancellation">
							<h2><?php esc_html_e( '3. Refund and Cancellation Policy', 'elearnposh-amp' ); ?></h2>
							<h3><?php esc_html_e( '3.1. Refunds and Cancellations', 'elearnposh-amp' ); ?></h3>
							<ul>
								<li><?php esc_html_e( 'Refund or cancellation requests can be submitted within 30 days of the payment date.', 'elearnposh-amp' ); ?></li>
								<li><?php esc_html_e( 'Refunds or cancellations are granted if the course content or delivery does not align with the advertised description.', 'elearnposh-amp' ); ?></li>
								<li><?php esc_html_e( 'Succeed Technologies will review and determine the reasonableness of each refund or cancellation request. We reserve the right to approve or deny refund or cancellation requests.', 'elearnposh-amp' ); ?></li>
								<li><?php esc_html_e( 'Refunds or cancellation may be denied if the customer has gained substantial benefit from the course material within the 30-day period.', 'elearnposh-amp' ); ?></li>
							</ul>
							<h3><?php esc_html_e( '3.2. Non-Refundable Situations', 'elearnposh-amp' ); ?></h3>
							<ul>
								<li><?php esc_html_e( 'No refunds or cancellations will be provided for courses purchased during promotional sales or with discount codes.', 'elearnposh-amp' ); ?></li>
							</ul>
						</section>

						<section class="pfe-policy-section" id="terms-intellectual-property">
							<h2><?php esc_html_e( '4. Intellectual Property', 'elearnposh-amp' ); ?></h2>
							<h3><?php esc_html_e( '4.1. Intellectual Property Rights', 'elearnposh-amp' ); ?></h3>
							<ul>
								<li><?php esc_html_e( 'All content, including text, graphics, images, videos, and other materials provided in the course/learning services, are the intellectual property of Succeed Technologies.', 'elearnposh-amp' ); ?></li>
								<li><?php esc_html_e( 'You are granted a limited, non-exclusive, non-transferable license to access and view the course/learning services content for personal or organizational use. The courses/learning services bought through this channel are not for resale unless agreed through a separate partnership agreement.', 'elearnposh-amp' ); ?></li>
							</ul>
							<h3><?php esc_html_e( '4.2. Restrictions', 'elearnposh-amp' ); ?></h3>
							<ul>
								<li><?php esc_html_e( 'You may not reproduce, distribute, modify, create derivative works from, publicly display, or commercially exploit any part of the course/learning services content without explicit written permission from Succeed Technologies.', 'elearnposh-amp' ); ?></li>
								<li><?php esc_html_e( 'Any unauthorized use of the course/learning service content is strictly prohibited and may result in legal action.', 'elearnposh-amp' ); ?></li>
							</ul>
						</section>

						<section class="pfe-policy-section" id="terms-usage-access">
							<h2><?php esc_html_e( '5. Usage and Access', 'elearnposh-amp' ); ?></h2>
							<h3><?php esc_html_e( '5.1. Account Suspension', 'elearnposh-amp' ); ?></h3>
							<ul>
								<li><?php esc_html_e( 'Access to your account may be suspended or terminated if suspicious or fraudulent activity is detected.', 'elearnposh-amp' ); ?></li>
								<li><?php esc_html_e( 'In the event of account suspension due to suspicious activity, no refunds will be issued.', 'elearnposh-amp' ); ?></li>
							</ul>
							<h3><?php esc_html_e( '5.2. Permitted Use', 'elearnposh-amp' ); ?></h3>
							<ul>
								<li><?php esc_html_e( 'Courses/learning services are intended for individual use only and may not be shared, resold, or redistributed in any form.', 'elearnposh-amp' ); ?></li>
								<li><?php esc_html_e( 'The courses/learning services purchased through this channel should be used only by a single user from one login ID. It should not be used by broadcasting to multiple individuals.', 'elearnposh-amp' ); ?></li>
							</ul>
						</section>

						<section class="pfe-policy-section" id="terms-governing-law">
							<h2><?php esc_html_e( '6. Governing Law and Jurisdiction', 'elearnposh-amp' ); ?></h2>
							<ul>
								<li><?php esc_html_e( 'These Terms and Conditions are governed by and construed in accordance with the laws of India.', 'elearnposh-amp' ); ?></li>
								<li><?php esc_html_e( 'Any disputes arising from these terms will be subject to the exclusive jurisdiction of the courts of Bengaluru, India.', 'elearnposh-amp' ); ?></li>
							</ul>
						</section>

						<section class="pfe-policy-section" id="terms-agreement-override">
							<h2><?php esc_html_e( '7. Agreement Override', 'elearnposh-amp' ); ?></h2>
							<p><?php esc_html_e( 'Any specific agreement signed with Succeed Technologies will take precedence over the terms mentioned herein.', 'elearnposh-amp' ); ?></p>
						</section>

						<section class="pfe-policy-section" id="terms-contact">
							<h2><?php esc_html_e( '8. Contact Information', 'elearnposh-amp' ); ?></h2>
							<h3><?php esc_html_e( '8.1. Support', 'elearnposh-amp' ); ?></h3>
							<ul>
								<li>
									<?php
									printf(
										/* translators: %1$s: support email, %2$s: support phone */
										esc_html__( 'For any queries, issues, or support requests, please contact our customer support team at %1$s or %2$s.', 'elearnposh-amp' ),
										'support@succeedtech.com',
										'+91-9080687629'
									);
									?>
								</li>
							</ul>
							<p><?php esc_html_e( 'We are committed to providing prompt and effective assistance to all inquiries.', 'elearnposh-amp' ); ?></p>
						</section>
					</article>
				</div>
			</section>
		</main>
	</div>
	<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/footer.php'; ?>
</body>
</html>
