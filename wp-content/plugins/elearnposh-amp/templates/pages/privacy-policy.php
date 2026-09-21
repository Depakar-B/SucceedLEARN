<?php
/**
 * Privacy Policy Page Template
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
$page_permalink  = get_permalink( $post_id ) ?: home_url( '/privacy-policy/' );

$privacy_schema = array(
	'@context'    => 'https://schema.org',
	'@type'       => 'WebPage',
	'name'        => 'Privacy Policy',
	'description' => 'Privacy notice for eLearnPOSH.com covering data collection, usage, retention, cookies, and user rights.',
	'url'         => home_url( '/privacy-policy/' ),
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
	<title><?php esc_html_e( 'Privacy Policy | Data Protection & User Rights', 'elearnposh-amp' ); ?> - eLearnPOSH</title>
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
	.pfe-policy-panel{background:#fff;border:1px solid rgba(20,114,186,.12);border-radius:14px;box-shadow:0 8px 24px rgba(11,35,58,.08);padding:22px 18px}
	.pfe-policy-section + .pfe-policy-section{margin-top:28px;padding-top:28px;border-top:1px solid var(--line)}
	.pfe-policy-section h2{margin:0 0 12px;font-size:clamp(1.35rem,1.05rem + 1vw,1.85rem);line-height:1.25;color:var(--text)}
	.pfe-policy-section h3{margin:18px 0 10px;font-size:1.05rem;line-height:1.35;color:#10273f}
	.pfe-policy-section p,.pfe-policy-section li{margin:0 0 12px;font-size:15px;line-height:1.75;color:#2f4358}
	.pfe-policy-section ul{margin:0 0 12px;padding-left:20px}
	.pfe-policy-section li{margin-bottom:8px}
	@media (min-width:641px){.pfe-hero,.pfe-section,.pfe-section-sm{padding:24px 20px}.pfe-policy-panel{padding:28px 24px}}
	</style>
	<script type="application/ld+json"><?php echo elearnposh_amp_encode_page_schema_json_ld( $privacy_schema ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></script>
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
					<h1><?php esc_html_e( 'Privacy Policy', 'elearnposh-amp' ); ?></h1>
					<p class="pfe-sub"><?php esc_html_e( 'Learn how eLearnPOSH collects, uses, protects, and retains personal information for learners, organisations, and portal visitors.', 'elearnposh-amp' ); ?></p>
				</div>
			</section>

			<section class="pfe-section" id="privacy-policy-content">
				<div class="pfe-wrap">
					<article class="pfe-policy-panel">
						<section class="pfe-policy-section" id="privacy-notice">
							<h2><?php esc_html_e( 'Privacy Notice', 'elearnposh-amp' ); ?></h2>
							<p><?php esc_html_e( 'This privacy notice discloses the privacy practices for eLearnPOSH.com', 'elearnposh-amp' ); ?></p>
							<p><?php esc_html_e( 'We, at eLearnPOSH.com powered by Succeed Technologies Private Limited, respect your privacy. We protect your information and give you full control over the data you share with us.', 'elearnposh-amp' ); ?></p>
							<p><?php esc_html_e( 'This privacy document is to ensure that all our users (both individuals and organisations) know and understand their rights in terms of the personal information shared with us and are clear on how this information is used.', 'elearnposh-amp' ); ?></p>
							<p><?php esc_html_e( 'This privacy policy may be updated in the future to keep up with the necessary privacy standards. Do visit us frequently to see any updates or changes in our policy.', 'elearnposh-amp' ); ?></p>
						</section>

						<section class="pfe-policy-section" id="contact-permission">
							<h2><?php esc_html_e( 'Contact Permission', 'elearnposh-amp' ); ?></h2>
							<p><?php esc_html_e( 'If you submit a Contact request or Demo request on eLearnPOSH, we&rsquo;d love to contact you by email or phone to understand more about what you are looking for in our courses, so we help you make the best decision. We would also like to keep you informed about any new offers or services. We&rsquo;ll always treat your personal details with the utmost care and will never sell them to or share with other companies for marketing 3rd party products.', 'elearnposh-amp' ); ?></p>
						</section>

						<section class="pfe-policy-section" id="what-we-collect">
							<h2><?php esc_html_e( 'What Do We Collect?', 'elearnposh-amp' ); ?></h2>
							<p><?php esc_html_e( 'From our Subscribers, we collect very limited personal information.', 'elearnposh-amp' ); ?></p>
							<h3><?php esc_html_e( 'For individual users', 'elearnposh-amp' ); ?></h3>
							<p><?php esc_html_e( 'For individual users, we collect Name, Email address and a Password of your choice. Additionally, we collect your system-generated details such as Signin &amp; Signout date and time, IP addresses and information related to your learning activities.', 'elearnposh-amp' ); ?></p>
							<h3><?php esc_html_e( 'For organisational users', 'elearnposh-amp' ); ?></h3>
							<p><?php esc_html_e( 'For organisational users, in addition to the ones mentioned above, we may also collect information like your Designation, Department, Employee ID, Manager Information and other details provided by your organisation.', 'elearnposh-amp' ); ?></p>
							<h3><?php esc_html_e( 'For online purchasers', 'elearnposh-amp' ); ?></h3>
							<p><?php esc_html_e( 'For online purchasers of eLearning courses, we may collect and store details such as your billing and payment information.', 'elearnposh-amp' ); ?></p>
							<h3><?php esc_html_e( 'For portal visitors', 'elearnposh-amp' ); ?></h3>
							<p><?php esc_html_e( 'For the visitors of our eLearnPOSH.com portals, we collect information about your Link Source, your browsing activities on our portal, and your form submissions. This is collected to improve and optimize our portal.', 'elearnposh-amp' ); ?></p>
						</section>

						<section class="pfe-policy-section" id="how-information-is-used">
							<h2><?php esc_html_e( 'How Is This Information Used?', 'elearnposh-amp' ); ?></h2>
							<p><?php esc_html_e( 'We use your personal information for tracking, analysing and reporting your learning progress (and for marketing our products if you have opted-in to be contacted with marketing updates). We may use this information to:', 'elearnposh-amp' ); ?></p>
							<ul>
								<li><?php esc_html_e( 'Provide course recommendations to you or other users based on usage patterns.', 'elearnposh-amp' ); ?></li>
								<li><?php esc_html_e( 'Update or create new courses.', 'elearnposh-amp' ); ?></li>
								<li><?php esc_html_e( 'Carry out any obligations arising from any contracts entered between you/your organisation and us.', 'elearnposh-amp' ); ?></li>
								<li><?php esc_html_e( 'Enhance/optimise user experience, data security and system performance.', 'elearnposh-amp' ); ?></li>
								<li><?php esc_html_e( 'For organisational users, the information may be used as desired by your organisation.', 'elearnposh-amp' ); ?></li>
							</ul>
							<p><?php esc_html_e( 'We will send you product or relevant marketing information ONLY IF YOU HAVE OPTED-IN TO BE CONTACTED BY eLearnPOSH.com.', 'elearnposh-amp' ); ?></p>
						</section>

						<section class="pfe-policy-section" id="information-retention">
							<h2><?php esc_html_e( 'Information Retention', 'elearnposh-amp' ); ?></h2>
							<p><?php esc_html_e( 'We keep personal information only as long as needed, specific to the purposes for which the data was collected. We will delete all your personal information after the data retention period as per our company policy (6 month from your last login). For organisational users, your information will be retained in accordance with your organisation&rsquo;s data retention policy.', 'elearnposh-amp' ); ?></p>
						</section>

						<section class="pfe-policy-section" id="request-for-erasure">
							<h2><?php esc_html_e( 'Request for Erasure', 'elearnposh-amp' ); ?></h2>
							<p><?php esc_html_e( 'As an individual user, you can request complete erasure of your personal information from the Profile section.', 'elearnposh-amp' ); ?></p>
							<p><?php esc_html_e( 'As an organisational user, you can request deletion of your information with your organisational points of contact. This will be governed by your organisation&rsquo;s data retention policy.', 'elearnposh-amp' ); ?></p>
						</section>

						<section class="pfe-policy-section" id="access-and-rectification">
							<h2><?php esc_html_e( 'Access &amp; Rectification', 'elearnposh-amp' ); ?></h2>
							<p><?php esc_html_e( 'As an individual user, you can view and update your information on your Profile section. Your email address will be locked while editing.', 'elearnposh-amp' ); ?></p>
							<p><?php esc_html_e( 'To update your email address, send a request by email to support@succeedtech.com. If you are an organisational user, these details are controlled by your organisation. Please contact your organisation&rsquo;s administrator to update any details.', 'elearnposh-amp' ); ?></p>
						</section>

						<section class="pfe-policy-section" id="sharing-information">
							<h2><?php esc_html_e( 'Sharing Information', 'elearnposh-amp' ); ?></h2>
							<p><?php esc_html_e( 'We may share your personal information with other entities or organisations to deliver a quality experience on our learning portal.', 'elearnposh-amp' ); ?></p>
							<p><?php esc_html_e( 'We do not share any of your personal information with anyone for the purpose of marketing. We share it with our partners to manage administration and operations, for services like billing and subscription management, hosting and performance enhancement.', 'elearnposh-amp' ); ?></p>
							<h3><?php esc_html_e( 'Organisational users', 'elearnposh-amp' ); ?></h3>
							<p><?php esc_html_e( 'Additionally, we share your information with your organisation&rsquo;s administrators and managers.', 'elearnposh-amp' ); ?></p>
						</section>

						<section class="pfe-policy-section" id="cookies-policy">
							<h2><?php esc_html_e( 'Cookies Policy', 'elearnposh-amp' ); ?></h2>
							<p><?php esc_html_e( 'Cookies contain information that are transferred by our portal to your computer&rsquo;s storage. We store the following cookies to enhance your experience:', 'elearnposh-amp' ); ?></p>
							<h3><?php esc_html_e( 'Essential Cookies', 'elearnposh-amp' ); ?></h3>
							<p><?php esc_html_e( 'Required to provide secure access, cart management, billing and payment services.', 'elearnposh-amp' ); ?></p>
							<h3><?php esc_html_e( 'Performance Cookies', 'elearnposh-amp' ); ?></h3>
							<p><?php esc_html_e( 'This helps us in improving the performance of our website by analysing the usage pattern.', 'elearnposh-amp' ); ?></p>
							<h3><?php esc_html_e( 'Preference Cookies', 'elearnposh-amp' ); ?></h3>
							<p><?php esc_html_e( 'Required to store your personalisation preferences such as Language selection.', 'elearnposh-amp' ); ?></p>
							<h3><?php esc_html_e( 'Journey Cookies', 'elearnposh-amp' ); ?></h3>
							<p><?php esc_html_e( 'First-party cookies such as ep_vid and ep_sid identify an anonymous browser session so we can understand page paths, time on page, and visit counts. These become linked to your contact details only if you submit a form.', 'elearnposh-amp' ); ?></p>
							<h3><?php esc_html_e( '3rd Party Cookies', 'elearnposh-amp' ); ?></h3>
							<p>
								<?php esc_html_e( 'Our eLearnPOSH.com portal may set/modify 3rd party cookies from Google Analytics. This is used in tracking the user behaviour on or related to our portal. We do not control the operations of those cookies. Please view Google&rsquo;s respective privacy policies.', 'elearnposh-amp' ); ?>
								<a href="https://policies.google.com/privacy" target="_blank" rel="noopener noreferrer">https://policies.google.com/privacy</a>.
							</p>
							<p><?php esc_html_e( 'You can block cookies by disabling them on your browser settings. Disabling Essential Cookies may result in some parts of the site becoming unavailable.', 'elearnposh-amp' ); ?></p>
						</section>

						<section class="pfe-policy-section" id="international-transfer">
							<h2><?php esc_html_e( 'International Transfer', 'elearnposh-amp' ); ?></h2>
							<p><?php esc_html_e( 'eLearnPOSH.com is hosted on Microsoft Azure within the India Region. Some of our features like payment and subscription management services may be provided by other partner/service provider organisations. The information stored may be accessed by the development and operation team members of our portal (our employees, partner employees and other support users) located India. All the information is accessed strictly for the purposes discussed above.', 'elearnposh-amp' ); ?></p>
							<p>
								<?php esc_html_e( 'We care for your privacy as we care for our own. For any further queries or concerns, you can reach us at', 'elearnposh-amp' ); ?>
								<a href="mailto:support@succeedtech.com">support@succeedtech.com</a>
								<?php esc_html_e( 'or', 'elearnposh-amp' ); ?>
								<a href="tel:+919080687629">9080687629</a>.
								<?php esc_html_e( 'You are required to agree to our Privacy Policy in order to sign up and use our services.', 'elearnposh-amp' ); ?>
							</p>
						</section>
					</article>
				</div>
			</section>
		</main>
	</div>
	<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/footer.php'; ?>
</body>
</html>
