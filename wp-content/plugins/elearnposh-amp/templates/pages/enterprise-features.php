<?php
/**
 * Enterprise Features Page Template
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
	$post_id = $config->resolve_page_id_by_map_key( 'enterprise-features' );
}
$post_body_class = 'post-' . $post_id;
$page_permalink  = get_permalink( $post_id ) ?: home_url( '/enterprise-features/' );
$page_title      = $post_id ? get_the_title( $post_id ) : __( 'Enterprise Features', 'elearnposh-amp' );
if ( empty( $page_title ) ) {
	$page_title = __( 'Enterprise Features', 'elearnposh-amp' );
}

$contact_id = $config->resolve_page_id_by_map_key( 'contact' );
$demo_url   = $contact_id && function_exists( 'elearnposh_amp_get_post_amp_url' )
	? elearnposh_amp_get_post_amp_url( $contact_id ) . '#demo'
	: elearnposh_amp_url( '/contact-us/#demo' );

$enterprise_features = array(
	array(
		'title'       => 'Branded & Customized for You',
		'description' => 'Your employees will take the courses on a portal that is completely branded as your own - the logo, colours, look and feel. The interface will also be customized based on the courses you subscribe. The Learner Dashboard will have the list of your organization\'s Internal Committee members and also an option to download your organization\'s Sexual Harassment policy.',
		'image'       => 'https://elearnposh.com/wp-content/uploads/2021/03/Group-179.png',
		'width'       => 800,
		'height'      => 520,
		'alt'         => 'Branded and customized enterprise learning portal',
	),
	array(
		'title'       => 'Quick Onboarding',
		'description' => 'From the time we receive the details of Learners, IC Members and Policy, we can go live in just 24 hours. You also have a host of flexible activation options like triggered emails, pre-set password, user-set password and 2FA to choose from.',
		'image'       => 'https://elearnposh.com/wp-content/uploads/2021/03/Group-180.png',
		'width'       => 800,
		'height'      => 520,
		'alt'         => 'Quick onboarding for enterprise POSH training',
	),
	array(
		'title'       => 'Flexible Authentication',
		'description' => 'We can integrate with your organization\'s authentication method like SAML2 Single Sign-on, Google OAuth, Azure My Apps, LDAP, Token Auth and more. These will allow your users to securely login with their existing accounts.',
		'image'       => 'https://elearnposh.com/wp-content/uploads/2021/03/Group-185.png',
		'width'       => 800,
		'height'      => 520,
		'alt'         => 'Flexible authentication options for enterprise users',
	),
	array(
		'title'       => 'Automated Seamless Integration',
		'description' => 'Reduce manual touch points with seamless integration of our LMS with your HR Systems and Reporting Systems using REST API which allows hassle-free data flow and automation.',
		'image'       => 'https://elearnposh.com/wp-content/uploads/2021/03/Group-182.png',
		'width'       => 800,
		'height'      => 520,
		'alt'         => 'Automated seamless LMS integration',
	),
	array(
		'title'       => 'Self-service Reporting',
		'description' => 'Designated users in your organization will be provided with reporting access to generate the Training Completion Reports. The reports include Course completion status by Manager, By Department and Recent Completions. These reports are downloadable in Excel and PDF file formats. Admins can trigger automated reminder emails to Employees and Managers to drive completion. Managers can generate their team\'s reports any time from the system.',
		'image'       => 'https://elearnposh.com/wp-content/uploads/2021/03/Group-183.png',
		'width'       => 800,
		'height'      => 520,
		'alt'         => 'Self-service reporting dashboard',
	),
	array(
		'title'       => 'Enterprise-class Security & Privacy',
		'description' => 'Your data is in safe hands! We are an ISO 27001 Certified organization with experience in running Secured Learning Management Portals for global clients. The technical and organizational measures are in line with the GDPR Standards for Security and Privacy. These measures including encryption standards, hosting, data backup & recovery are in line with Enterprise-class SaaS standards.',
		'image'       => 'https://elearnposh.com/wp-content/uploads/2021/03/Group-184.png',
		'width'       => 800,
		'height'      => 520,
		'alt'         => 'Enterprise-class security and privacy',
	),
	array(
		'title'       => 'Best-in-class Support',
		'description' => 'We take pride in being a responsive and customer-focussed organization. Our customers like our courses and love our Customer Support. We provide both phone and email-based support to the Learners and Admins to eliminate technology or process issues hindering compliance.',
		'image'       => 'https://elearnposh.com/wp-content/uploads/2021/03/Group-165.png',
		'width'       => 800,
		'height'      => 520,
		'alt'         => 'Best-in-class customer support',
	),
);

$enterprise_schema = array(
	'@context'    => 'https://schema.org',
	'@type'       => 'WebPage',
	'name'        => 'Enterprise Features',
	'description' => 'Enterprise-class POSH training platform features including branding, onboarding, authentication, reporting, security, and support.',
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
		body{font-family:'Nunito Sans',Arial,sans-serif;margin:0;padding:0;padding-top:100px !important;background:#f8fafc;color:#0f172a}
		a{color:inherit}
		<?php
		elearnposh_amp_output_page_styles(
			'enterprise-features',
			array(),
			array( 'home-clients-testimonials', 'press-enterprise-amp' )
		);
		?>
	</style>
	<script type="application/ld+json"><?php echo elearnposh_amp_encode_page_schema_json_ld( $enterprise_schema ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></script>
	<?php elearnposh_amp_output_components( 'enterprise-features', array( 'amp-mustache' ) ); ?>
</head>
<body class="<?php echo esc_attr( $post_body_class ); ?>">
	<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/menu.php'; ?>
	<div class="amp-content-wrapper">
	<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/user-notification.php'; ?>
		<main class="ep-enterprise-page pfe" id="enterprise-features-page">
			<section class="ep-enterprise-hero">
				<div class="ep-enterprise-hero__inner pfe-wrap">
					<?php elearnposh_amp_render_breadcrumbs(); ?>
					<div class="ep-enterprise-hero__grid" id="with-elearnposh">
						<div class="ep-enterprise-hero__copy">
							<h1 class="ep-enterprise-hero__title"><?php echo esc_html( $page_title ); ?></h1>
							<p class="ep-page-hero__subtitle ep-enterprise-hero__subtitle"><?php esc_html_e( 'With eLearnPOSH, get much more than POSH compliance courses!', 'elearnposh-amp' ); ?></p>
							<p class="ep-enterprise-hero__lead"><?php esc_html_e( 'Get the complete experience you deserve through our Enterprise-class platform and our seamless processes. All our POSH eLearning courses, POSH Knowledge base, POSH Webinar Recordings, Certificates and Reports are delivered on a fully branded state of the art enterprise-class Learning Management Portal.', 'elearnposh-amp' ); ?></p>
						</div>
						<div class="ep-enterprise-hero__media">
							<div class="ep-enterprise-hero__media-frame">
								<amp-img
									src="https://elearnposh.com/wp-content/uploads/2021/03/With-eLearnPOSH-1.png"
									width="1200"
									height="620"
									layout="fill"
									object-fit="contain"
									alt="<?php esc_attr_e( 'With eLearnPOSH enterprise platform', 'elearnposh-amp' ); ?>"
								></amp-img>
							</div>
						</div>
					</div>
				</div>
			</section>

			<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'partials/home-clients-section.php'; ?>
			<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'partials/home-testimonials-section.php'; ?>

			<div class="ep-enterprise-shell pfe-wrap">
				<section class="ep-enterprise-features" id="enterprise-feature-cards" aria-label="<?php esc_attr_e( 'Enterprise platform capabilities', 'elearnposh-amp' ); ?>">
					<h2 class="ep-enterprise-features__heading"><?php esc_html_e( 'Platform capabilities built for enterprise teams', 'elearnposh-amp' ); ?></h2>
					<div class="ep-enterprise-grid">
						<?php foreach ( $enterprise_features as $enterprise_feature ) : ?>
						<article class="ep-enterprise-card">
							<div class="ep-enterprise-card__media">
								<div class="ep-enterprise-card__media-frame">
									<amp-img
										src="<?php echo esc_url( $enterprise_feature['image'] ); ?>"
										width="<?php echo esc_attr( (string) $enterprise_feature['width'] ); ?>"
										height="<?php echo esc_attr( (string) $enterprise_feature['height'] ); ?>"
										layout="fill"
										object-fit="contain"
										alt="<?php echo esc_attr( $enterprise_feature['alt'] ); ?>"
									></amp-img>
								</div>
							</div>
							<div class="ep-enterprise-card__body">
								<h3><?php echo esc_html( $enterprise_feature['title'] ); ?></h3>
								<p><?php echo esc_html( $enterprise_feature['description'] ); ?></p>
							</div>
						</article>
						<?php endforeach; ?>
					</div>
				</section>

				<section class="ep-enterprise-cta" aria-label="<?php esc_attr_e( 'Schedule a demo', 'elearnposh-amp' ); ?>">
					<div class="ep-enterprise-cta__inner">
						<h2><?php esc_html_e( 'See the enterprise platform in action', 'elearnposh-amp' ); ?></h2>
						<p><?php esc_html_e( 'Book a personalized demo to explore branding, onboarding, reporting, and security features built for your organization.', 'elearnposh-amp' ); ?></p>
						<a class="ep-enterprise-btn" href="<?php echo esc_url( $demo_url ); ?>"><?php esc_html_e( 'Schedule a Demo', 'elearnposh-amp' ); ?></a>
					</div>
				</section>
			</div>
		</main>
	</div>
	<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/footer.php'; ?>
</body>
</html>
