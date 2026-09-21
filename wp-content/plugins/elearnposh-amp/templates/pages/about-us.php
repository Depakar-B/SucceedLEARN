<?php
/**
 * About Us Page Template
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

remove_all_actions( 'ampforwp_content' );

global $redux_builder_amp;

$config  = \ElearnPOSH\AMP\Plugin::get_instance()->get_config();
$post_id = absint( get_the_ID() );
if ( ! $post_id ) {
	$post_id = $config->resolve_page_id_by_map_key( 'about-us' );
}
$post_body_class = 'post-' . $post_id;
$page_permalink  = get_permalink( $post_id ) ?: home_url( '/about-us/' );
$page_title      = $post_id ? get_the_title( $post_id ) : __( 'About Us', 'elearnposh-amp' );
if ( empty( $page_title ) ) {
	$page_title = __( 'About Us', 'elearnposh-amp' );
}

$ep_home_stats_partial = get_stylesheet_directory() . '/partials/home-stats.php';
if ( is_readable( $ep_home_stats_partial ) ) {
	require_once $ep_home_stats_partial;
}

$succeed_learn_url = 'https://succeedlearn.com/';
$scorm_bridge_url  = 'https://scormbridge.com/';

$contact_id = $config->resolve_page_id_by_map_key( 'contact' );
$demo_url   = $contact_id && function_exists( 'elearnposh_amp_get_post_amp_url' )
	? elearnposh_amp_get_post_amp_url( $contact_id ) . '#demo'
	: elearnposh_amp_url( '/contact-us/#demo' );
$ep_about_cta_sales = 'sales@succeedtech.com';

$about_schema = array(
	'@context'    => 'https://schema.org',
	'@type'       => 'AboutPage',
	'name'        => 'About eLearnPOSH',
	'description' => 'Learn about eLearnPOSH, Succeed Technologies, and related learning and compliance offerings.',
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
	<title><?php esc_html_e( 'About eLearnPOSH POSH Training and Workplace Compliance Platform', 'elearnposh-amp' ); ?> - eLearnPOSH</title>
	<link rel="dns-prefetch" href="https://cdn.ampproject.org" />
	<?php do_action( 'amp_post_template_head', $this ); ?>
	<style amp-custom>
		body {
			font-family: "Nunito Sans", Arial, sans-serif;
			margin: 0;
			padding: 0;
			padding-top: 100px !important;
			background: #fff;
			color: #0d2238;
		}

		<?php
		elearnposh_amp_output_page_styles( 'about', array( 'about-page' ), array( 'home-clients-testimonials' ) );
		?>
	</style>
	<script type="application/ld+json"><?php echo elearnposh_amp_encode_page_schema_json_ld( $about_schema ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></script>
	<?php elearnposh_amp_output_components( 'about', array( 'amp-mustache' ) ); ?>
</head>
<body class="<?php echo esc_attr( $post_body_class ); ?>">
	<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/menu.php'; ?>
	<div class="amp-content-wrapper">
	<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/user-notification.php'; ?>

	<main class="ep-about-page" id="about-us-page">
		<section class="ep-about-hero">
			<div class="ep-about-hero__inner">
				<?php elearnposh_amp_render_breadcrumbs(); ?>
				<div class="ep-about-hero__copy">
					<h1><?php esc_html_e( 'About eLearnPOSH', 'elearnposh-amp' ); ?></h1>
					<div class="ep-about-hero__body">
						<p class="ep-about-hero__lead"><?php esc_html_e( 'eLearnPOSH is a product of Succeed Technologies®. We help organizations build safer workplaces through engaging POSH compliance training, IC enablement, and workplace learning solutions designed for real-world adoption.', 'elearnposh-amp' ); ?></p>
						<p class="ep-about-hero__lead"><?php esc_html_e( 'Many think online learning can be very boring. We are here to change that. Succeed Technologies® is a dynamic organization that aims to revolutionize how people learn online. Our 20+ years of experience in corporate training, adult learning principles, instructional design, and exposure to different industries has helped us create courses that are engaging, impactful, and provide a fun-filled learning experience with enriching visuals created using 2D and 3D technologies and gamified interactivities.', 'elearnposh-amp' ); ?></p>
					</div>
				</div>
			</div>
		</section>

		<div class="ep-about-shell">
			<section class="ep-about-section" id="about-other-offerings">
				<h2 class="ep-about-section-title"><?php esc_html_e( 'Our Other Offerings', 'elearnposh-amp' ); ?></h2>
				<div class="ep-about-grid">
					<article class="ep-about-card">
						<h3><?php esc_html_e( 'SucceedLEARN', 'elearnposh-amp' ); ?></h3>
						<p>
							<strong><?php esc_html_e( 'About SucceedLearn:', 'elearnposh-amp' ); ?></strong>
							<?php esc_html_e( 'Achieve more than just compliance with our intuitive, state of the art enterprise class learning portal that simplifies your organization\'s compliance training requirement. We have a catalog of curated ready-made courses for the most in-demand compliance trainings. With flexible customization and translations of the courses to more than 30 different languages, we will ensure your organization\'s unique needs are met.', 'elearnposh-amp' ); ?>
						</p>
						<div class="ep-about-card-logo">
							<amp-img
								src="https://elearnposh.com/wp-content/uploads/2026/07/SucceedLEARN-Logo.webp"
								width="300"
								height="120"
								layout="responsive"
								alt="<?php esc_attr_e( 'SucceedLEARN compliance and security awareness training platform – related offering from eLearnPOSH', 'elearnposh-amp' ); ?>"
							></amp-img>
						</div>
						<div class="ep-about-card-actions">
							<a class="ep-about-btn" href="<?php echo esc_url( $succeed_learn_url ); ?>" target="_blank" rel="noopener noreferrer">
								<?php esc_html_e( 'Know More', 'elearnposh-amp' ); ?>
							</a>
						</div>
					</article>

					<article class="ep-about-card">
						<h3><?php esc_html_e( 'SucceedLMS', 'elearnposh-amp' ); ?></h3>
						<p>
							<strong><?php esc_html_e( 'About SucceedLMS:', 'elearnposh-amp' ); ?></strong>
							<?php esc_html_e( 'Meet all your organizational learning needs through our responsive, agile, scalable and secure learning portal. Enjoy a host of features like 5 minutes Rapid Implementation, Team Manager Self Service, Trouble-Ticket system, Classroom Training Management, Multi-module course structure for Blended Learning, LIVE online training and seamless integration with your existing systems using standards like SSO using SAML 2.0 or LDAP connectivity.', 'elearnposh-amp' ); ?>
						</p>
						<div class="ep-about-card-logo">
							<amp-img
								src="https://elearnposh.com/wp-content/uploads/2020/03/succeedlms.png"
								width="300"
								height="120"
								layout="responsive"
								alt="<?php esc_attr_e( 'SucceedLMS learning management system – related offering from eLearnPOSH', 'elearnposh-amp' ); ?>"
							></amp-img>
						</div>
						<div class="ep-about-card-actions">
							<a class="ep-about-btn" href="<?php echo esc_url( $succeed_learn_url ); ?>" target="_blank" rel="noopener noreferrer">
								<?php esc_html_e( 'Know More', 'elearnposh-amp' ); ?>
							</a>
						</div>
					</article>

					<article class="ep-about-card">
						<h3><?php esc_html_e( 'SCORMBridge', 'elearnposh-amp' ); ?></h3>
						<p>
							<strong><?php esc_html_e( 'About SCORMBridge:', 'elearnposh-amp' ); ?></strong>
							<?php esc_html_e( 'SCORMBridge empowers organizations to securely deliver and manage SCORM-compliant eLearning content with complete control and flexibility. Our intuitive, enterprise-class content streaming solution enables you to seamlessly integrate and stream SCORM packages to any Learning Management System (LMS) with zero coding requirements. With secure content delivery, centralized management, and effortless deployment, SCORMBridge ensures your training materials remain protected while providing learners with a smooth and engaging learning experience across platforms.', 'elearnposh-amp' ); ?>
						</p>
						<div class="ep-about-card-logo">
							<amp-img
								src="https://elearnposh.com/wp-content/uploads/2026/07/Scormbridge-Logo.png"
								width="300"
								height="120"
								layout="responsive"
								alt="<?php esc_attr_e( 'SCORMBridge SCORM content streaming platform – related offering from eLearnPOSH', 'elearnposh-amp' ); ?>"
							></amp-img>
						</div>
						<div class="ep-about-card-actions">
							<a class="ep-about-btn" href="<?php echo esc_url( $scorm_bridge_url ); ?>" target="_blank" rel="noopener noreferrer">
								<?php esc_html_e( 'Know More', 'elearnposh-amp' ); ?>
							</a>
						</div>
					</article>
				</div>
			</section>
		</div>

		<section class="ep-about-stats" id="about-stats" aria-label="<?php esc_attr_e( 'eLearnPOSH impact statistics', 'elearnposh-amp' ); ?>">
			<div class="ep-about-shell">
				<h2 class="ep-about-stats__heading"><?php esc_html_e( 'Trusted by Organizations Driving POSH Compliance at Scale', 'elearnposh-amp' ); ?><br><?php esc_html_e( 'Real Impact. Real Results.', 'elearnposh-amp' ); ?></h2>
				<p class="ep-about-stats__subtitle"><?php esc_html_e( 'Delivering measurable POSH compliance outcomes across industries.', 'elearnposh-amp' ); ?></p>
				<?php
				if ( function_exists( 'ep_home_render_stats_cards' ) ) {
					ep_home_render_stats_cards();
				}
				?>
			</div>
		</section>

		<section class="ep-about-security" id="about-security-certificates" aria-label="<?php esc_attr_e( 'Security and compliance certifications', 'elearnposh-amp' ); ?>">
			<div class="ep-about-security__shell">
				<article class="ep-about-security__card">
					<h2 class="ep-about-security__title"><?php esc_html_e( 'Security & Compliance', 'elearnposh-amp' ); ?></h2>
					<div class="ep-about-security__badges">
						<amp-img src="https://elearnposh.com/wp-content/uploads/2025/12/ISO-27001.webp" width="130" height="130" layout="fixed" alt="<?php esc_attr_e( 'eLearnPOSH ISO 27001 information security certification badge', 'elearnposh-amp' ); ?>"></amp-img>
						<amp-img src="https://elearnposh.com/wp-content/uploads/2025/12/GDPR.webp" width="130" height="130" layout="fixed" alt="<?php esc_attr_e( 'eLearnPOSH GDPR data protection compliance badge', 'elearnposh-amp' ); ?>"></amp-img>
						<amp-img src="https://elearnposh.com/wp-content/uploads/2025/12/Soc-2.webp" width="130" height="130" layout="fixed" alt="<?php esc_attr_e( 'eLearnPOSH SOC 2 Type II security certification badge', 'elearnposh-amp' ); ?>"></amp-img>
					</div>
					<p class="ep-about-security__copy">
						<?php esc_html_e( 'eLearnPOSH.com is a product of Succeed Technologies® - an ISO 27001:2022, GDPR-aligned, and SOC 2 certified organisation trusted for delivering engaging, interactive and secure eLearning at scale.', 'elearnposh-amp' ); ?>
					</p>
					<div class="ep-about-security__trust">
						<p><?php esc_html_e( 'Visit the Succeed Technologies®', 'elearnposh-amp' ); ?></p>
						<a class="ep-about-security__trust-btn" href="https://trust.succeedtech.com/" target="_blank" rel="noopener noreferrer">
							<?php esc_html_e( 'Trust Centre', 'elearnposh-amp' ); ?>
						</a>
					</div>
				</article>
			</div>
		</section>

		<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'partials/home-clients-section.php'; ?>
		<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'partials/home-testimonials-section.php'; ?>

		<section class="ep-about-cta" aria-label="<?php esc_attr_e( 'Get started with eLearnPOSH', 'elearnposh-amp' ); ?>">
			<div class="ep-about-cta__shell">
				<div class="ep-about-cta__content">
					<span class="ep-about-cta__kicker"><?php esc_html_e( 'Ready to get started?', 'elearnposh-amp' ); ?></span>
					<h2><?php esc_html_e( 'Simplify POSH Compliance for Your Organization with eLearnPOSH', 'elearnposh-amp' ); ?></h2>
					<p><?php esc_html_e( 'Book a personalized demo to explore our role-based courses, IC enablement tools, and enterprise-ready learning platform. Our team will help you choose the right POSH training path for your workforce.', 'elearnposh-amp' ); ?></p>
					<div class="ep-about-cta__actions">
						<a class="ep-about-btn ep-about-cta__primary" href="<?php echo esc_url( $demo_url ); ?>">
							<?php esc_html_e( 'Schedule a Demo', 'elearnposh-amp' ); ?>
						</a>
						<a class="ep-about-cta__secondary" href="mailto:<?php echo esc_attr( $ep_about_cta_sales ); ?>">
							<?php echo esc_html( $ep_about_cta_sales ); ?>
						</a>
					</div>
				</div>
			</div>
		</section>
	</main>

	</div>
	<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/footer.php'; ?>
</body>
</html>
