<?php
/**
 * SucceedLEARN AMP Home Page
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$uploads   = content_url( '/uploads' );
$theme_uri = get_template_directory_uri();
$hero_bg   = $theme_uri . '/assets/images/hero-bg.jpg';
$contact_url = home_url( '/contact-us/' );
$solutions_url = home_url( '/solutions/' );

require_once SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'data/clients.php';

/** Homepage AMP preview: 12 logos = 3 rows × 4 (tablet) / 6 rows × 2 (mobile). */
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

$platform_cards = array(
	array(
		'Security Awareness Training',
		'Security.svg',
		'Reduce human cyber risk through phishing simulations, microlearning, gamified learning and analytics.',
	),
	array(
		'HR Compliance Training',
		'HR-Complaince.svg',
		'Create respectful workplaces through workplace conduct, anti-harassment, ethics and compliance learning.',
	),
	array(
		'Financial Crime Prevention',
		'Financial.svg',
		'Support AML, anti-bribery, anti-corruption and fraud awareness initiatives.',
	),
	array(
		'Workplace Health & Safety',
		'Workplace.svg',
		'Help employees identify risks and contribute to safer workplaces.',
	),
	array(
		'Code of Conduct Training',
		'SucceedLEARN-Code-of-conduct.svg',
		'Turn policies into practical workplace decisions through scenario-based learning.',
	),
	array(
		'Private Equity & VC Compliance',
		'Private-Equity.svg',
		'Help organisations remain investor-ready through targeted compliance programmes.',
	),
	array(
		'Compliance LMS',
		'Compliance-LMS.svg',
		'A compliance-focused LMS with automation, reporting, branding and enterprise integrations.',
	),
);

$pills = array(
	'Awareness Training', 'Phishing Simulations', 'Microlearning', 'Gamified Learning',
	'Visual Awareness Campaigns', 'Assessments', 'Analytics & Reporting', 'Enterprise Integrations',
);

$reality_img  = succeedlearn_amp_upload_url( '2026/08/Reality.webp' );
$contact_img = succeedlearn_amp_upload_url( '2026/08/Outcomes-you-achieve.webp' );
?>
<!doctype html>
<html amp lang="<?php echo esc_attr( get_bloginfo( 'language' ) ); ?>">
<head>
	<meta charset="utf-8" />
	<script async src="https://cdn.ampproject.org/v0.js"></script>
	<link rel="canonical" href="<?php echo esc_url( home_url( '/' ) ); ?>" />
	<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1" />
	<link rel="shortcut icon" href="<?php echo esc_url( succeedlearn_amp_get_favicon_url() ); ?>" />
	<title><?php echo esc_html( 'SucceedLEARN | Global Compliance & Security Training' ); ?></title>
	<link rel="preconnect" href="https://cdn.ampproject.org" />
	<link rel="dns-prefetch" href="https://cdn.ampproject.org" />
	<style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style>
	<noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
	<?php do_action( 'amp_post_template_head', $this ); ?>
	<style amp-custom>
	<?php succeedlearn_amp_output_page_styles( 'home', array( 'home-page' ), array( 'home-sections', 'contact-form' ) ); ?>
	.sl-hero{background-image:url(<?php echo esc_url( $hero_bg ); ?>)}
	</style>
	<script type="application/ld+json"><?php echo wp_json_encode( succeedlearn_amp_get_homepage_schema_graph(), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></script>
<?php succeedlearn_amp_output_components( 'home', array( 'amp-form', 'amp-mustache', 'amp-sidebar', 'amp-bind', 'amp-lightbox' ) ); ?>
</head>
<body class="sl-home">
<?php include SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'components/menu.php'; ?>

<main id="main-content">

	<section class="sl-hero">
		<div class="sl-hero__overlay"></div>
		<div class="sl-hero__content">
			<h1 class="sl-hero__title"><?php esc_html_e( 'Global Compliance & Security Training That Employees Actually Remember', 'succeedlearn-amp' ); ?></h1>
			<p class="sl-hero__desc"><?php esc_html_e( 'SucceedLEARN is a global compliance training provider, helping teams transform mandatory employee compliance training into measurable outcomes through awareness, engagement, reinforcement, and analytics.', 'succeedlearn-amp' ); ?></p>
			<div class="sl-hero__actions">
				<button
					type="button"
					class="sl-btn sl-btn--primary"
					data-cta="hero-trial"
					<?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				><?php esc_html_e( 'Start Free Trial', 'succeedlearn-amp' ); ?></button>
				<a class="sl-btn sl-btn--ghost" href="<?php echo esc_url( $contact_url ); ?>" data-cta="hero-demo"><?php esc_html_e( 'Watch a Demo', 'succeedlearn-amp' ); ?></a>
			</div>
			<div class="sl-hero__features">
				<?php
				$features = array(
					array( 'Reduce Human Risk', 'Reduce-human.svg' ),
					array( 'Simplify Compliance Management', 'Simplify.svg' ),
					array( 'Improve Employee Engagement', 'Improve.svg' ),
					array( 'Stay Audit Ready', 'Stay.svg' ),
				);
				foreach ( $features as $feature ) :
					?>
					<div class="sl-hero__feature">
						<amp-img src="<?php echo esc_url( $uploads . '/2026/07/' . $feature[1] ); ?>" width="28" height="28" layout="fixed" alt=""></amp-img>
						<span><?php echo esc_html( $feature[0] ); ?></span>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="sl-section sl-section--alt">
		<div class="sl-wrap sl-grid-4 sl-stats">
			<?php
			$stats = array(
				array( '1000+', 'Organisations Trained' ),
				array( '90%+', 'Learner Engagement' ),
				array( '70%', 'Reduction in Phishing Risk' ),
				array( '90%', 'Compliance Risk Reduced' ),
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

	<section class="sl-section sl-section--alt">
		<div class="sl-wrap">
			<p class="sl-eyebrow"><?php esc_html_e( 'Why Traditional Ways Are Failing', 'succeedlearn-amp' ); ?></p>
			<h2 class="sl-h2"><?php echo wp_kses_post( __( "Today's challenges run on both<br><span>sides of the org chart</span>", 'succeedlearn-amp' ) ); ?></h2>
			<div class="sl-grid-2">
				<div class="sl-card sl-challenge-card">
					<span class="sl-card-tag"><?php esc_html_e( 'For Employees', 'succeedlearn-amp' ); ?></span>
					<h3><?php esc_html_e( "Training that doesn't land", 'succeedlearn-amp' ); ?></h3>
					<ul>
						<li><?php esc_html_e( 'Forget what they learned within weeks', 'succeedlearn-amp' ); ?></li>
						<li><?php esc_html_e( "Training feels like a box to check, not a skill to build", 'succeedlearn-amp' ); ?></li>
						<li><?php esc_html_e( "Content that doesn't relate to their actual role", 'succeedlearn-amp' ); ?></li>
					</ul>
				</div>
				<div class="sl-card sl-challenge-card">
					<span class="sl-card-tag"><?php esc_html_e( 'For Employers', 'succeedlearn-amp' ); ?></span>
					<h3><?php esc_html_e( "Compliance that doesn't scale", 'succeedlearn-amp' ); ?></h3>
					<ul>
						<li><?php esc_html_e( 'Compliance obligations keep growing across jurisdictions', 'succeedlearn-amp' ); ?></li>
						<li><?php esc_html_e( 'Juggling multiple disconnected tools creates unnecessary complexity', 'succeedlearn-amp' ); ?></li>
						<li><?php esc_html_e( 'Manual administration eats up valuable time', 'succeedlearn-amp' ); ?></li>
					</ul>
				</div>
			</div>
			<div class="sl-reality">
				<div class="sl-reality__grid">
					<div class="sl-reality__media">
						<amp-img
							src="<?php echo esc_url( $reality_img ); ?>"
							width="409"
							height="273"
							layout="responsive"
							alt="<?php esc_attr_e( 'Professional reviewing compliance training outcomes', 'succeedlearn-amp' ); ?>"
						></amp-img>
					</div>
					<div class="sl-reality__content">
						<span class="sl-card-tag"><?php esc_html_e( 'The Reality', 'succeedlearn-amp' ); ?></span>
						<h3 class="sl-reality__title"><?php esc_html_e( 'Does finishing a course actually change behaviour? Rarely.', 'succeedlearn-amp' ); ?></h3>
						<p class="sl-lead" style="margin:0"><?php esc_html_e( 'Employees need training that sticks. Employers need proof it worked. Both come from continuous reinforcement, real-world application, and a compliance training provider that tracks outcomes, not just completions.', 'succeedlearn-amp' ); ?></p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="sl-section">
		<div class="sl-wrap">
			<p class="sl-eyebrow"><?php esc_html_e( 'The Solution', 'succeedlearn-amp' ); ?></p>
			<h2 class="sl-h2"><?php echo wp_kses_post( __( 'Learning Experiences Employees Engage With. <span>Outcomes Employers Can Measure.</span>', 'succeedlearn-amp' ) ); ?></h2>
			<p class="sl-lead"><?php esc_html_e( 'Our workplace compliance training combines behavioural science, interactive content, and real-world scenarios to turn mandatory learning into measurable behaviour change.', 'succeedlearn-amp' ); ?></p>
			<div class="sl-grid-2">
				<div class="sl-card sl-solution-card">
					<span class="sl-card-tag"><?php esc_html_e( 'For Employees', 'succeedlearn-amp' ); ?></span>
					<h3><?php esc_html_e( 'Engaging Learning Experiences', 'succeedlearn-amp' ); ?></h3>
					<ul>
						<li><?php esc_html_e( 'Role-based and relevant content', 'succeedlearn-amp' ); ?></li>
						<li><?php esc_html_e( 'Interactive scenarios and assessments', 'succeedlearn-amp' ); ?></li>
						<li><?php esc_html_e( 'Gamified microlearning', 'succeedlearn-amp' ); ?></li>
						<li><?php esc_html_e( 'Mobile-friendly delivery', 'succeedlearn-amp' ); ?></li>
					</ul>
					<div class="sl-outcome-box">
						<h4><?php esc_html_e( 'Employee Outcomes', 'succeedlearn-amp' ); ?></h4>
						<p><?php esc_html_e( 'Employees gain practical skills to make safer, more compliant decisions every day.', 'succeedlearn-amp' ); ?></p>
					</div>
				</div>
				<div class="sl-card sl-solution-card">
					<span class="sl-card-tag"><?php esc_html_e( 'For Employers', 'succeedlearn-amp' ); ?></span>
					<h3><?php esc_html_e( 'Operational Simplicity', 'succeedlearn-amp' ); ?></h3>
					<ul>
						<li><?php esc_html_e( 'Real-time dashboards and reporting.', 'succeedlearn-amp' ); ?></li>
						<li><?php esc_html_e( 'Automated reminders and certifications.', 'succeedlearn-amp' ); ?></li>
						<li><?php esc_html_e( 'SSO, SAML and enterprise integrations.', 'succeedlearn-amp' ); ?></li>
						<li><?php esc_html_e( 'HRMS-driven user provisioning.', 'succeedlearn-amp' ); ?></li>
						<li><?php esc_html_e( 'Ready-to-use awareness assets.', 'succeedlearn-amp' ); ?></li>
					</ul>
					<div class="sl-outcome-box">
						<h4><?php esc_html_e( 'Business Outcomes', 'succeedlearn-amp' ); ?></h4>
						<p><?php esc_html_e( 'Reduce administrative effort while improving visibility, engagement and compliance readiness.', 'succeedlearn-amp' ); ?></p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="sl-section sl-section--alt" id="solutions">
		<div class="sl-wrap">
			<p class="sl-eyebrow"><?php esc_html_e( 'How SucceedLEARN Helps', 'succeedlearn-amp' ); ?></p>
			<h2 class="sl-h2"><?php echo wp_kses_post( __( 'One platform for security, <span>compliance &amp; workplace learning</span>', 'succeedlearn-amp' ) ); ?></h2>
			<p class="sl-lead"><?php esc_html_e( 'Bring training and compliance together through one intelligent, scalable eLearning platform.', 'succeedlearn-amp' ); ?></p>
			<div class="sl-grid-2">
				<?php foreach ( $platform_cards as $card ) : ?>
					<div class="sl-card sl-platform-card">
						<amp-img src="<?php echo esc_url( $uploads . '/2026/07/' . $card[1] ); ?>" width="32" height="32" layout="fixed" alt=""></amp-img>
						<h3><?php echo esc_html( $card[0] ); ?></h3>
						<p><?php echo esc_html( $card[2] ); ?></p>
					</div>
				<?php endforeach; ?>
				<div class="sl-card sl-platform-card sl-platform-card--cta">
					<h3><?php esc_html_e( 'See the full solution set', 'succeedlearn-amp' ); ?></h3>
					<p><a class="sl-btn sl-btn--primary" href="<?php echo esc_url( $solutions_url ); ?>"><?php esc_html_e( 'Explore All Solutions →', 'succeedlearn-amp' ); ?></a></p>
				</div>
			</div>
		</div>
	</section>

	<section class="sl-section">
		<div class="sl-wrap">
			<p class="sl-eyebrow"><?php esc_html_e( 'Featured Product', 'succeedlearn-amp' ); ?></p>
			<h2 class="sl-h2"><?php echo wp_kses_post( __( 'Security Behaviour &amp; <span>Culture Suite (SBCS)</span>', 'succeedlearn-amp' ) ); ?></h2>
			<p class="sl-sbcs-tagline"><?php esc_html_e( 'TRAIN. TEST. MEASURE. IMPROVE.', 'succeedlearn-amp' ); ?></p>
			<p class="sl-lead"><?php esc_html_e( 'SucceedLEARN SBCS is a unified platform designed to help organisations manage human cybersecurity risk at scale. Purpose-built to transform awareness into measurable behaviour change.', 'succeedlearn-amp' ); ?></p>
			<div class="sl-pills">
				<?php foreach ( $pills as $pill ) : ?>
					<span class="sl-pill">✓ <?php echo esc_html( $pill ); ?></span>
				<?php endforeach; ?>
			</div>
			<a class="sl-btn sl-btn--primary" href="<?php echo esc_url( $contact_url ); ?>"><?php esc_html_e( 'See SBCS in Action', 'succeedlearn-amp' ); ?></a>
			<div class="sl-metrics">
				<div class="sl-metric">
					<span class="sl-metric__label"><?php esc_html_e( 'Phishing Simulations Sent', 'succeedlearn-amp' ); ?></span>
					<strong class="sl-metric__value">12,480</strong>
				</div>
				<div class="sl-metric">
					<span class="sl-metric__label"><?php esc_html_e( 'Reduction in Phishing Click-Through Rate', 'succeedlearn-amp' ); ?></span>
					<strong class="sl-metric__value"><span class="sl-metric__arrow" aria-hidden="true">↓</span> 68%</strong>
				</div>
				<div class="sl-metric">
					<span class="sl-metric__label"><?php esc_html_e( 'Modules Completed', 'succeedlearn-amp' ); ?></span>
					<strong class="sl-metric__value">96%</strong>
				</div>
				<div class="sl-metric">
					<span class="sl-metric__label"><?php esc_html_e( 'Culture Score', 'succeedlearn-amp' ); ?></span>
					<strong class="sl-metric__value">A+</strong>
				</div>
				<div class="sl-metric sl-metric--wide">
					<span class="sl-metric__label"><?php esc_html_e( 'Audit Readiness', 'succeedlearn-amp' ); ?></span>
					<strong class="sl-metric__value">READY</strong>
				</div>
			</div>
		</div>
	</section>

	<section class="sl-section sl-section--alt">
		<div class="sl-wrap">
			<p class="sl-eyebrow"><?php esc_html_e( 'Why organisations choose SucceedLEARN', 'succeedlearn-amp' ); ?></p>
			<h2 class="sl-h2"><?php echo wp_kses_post( __( 'Outcomes <span>you achieve</span>', 'succeedlearn-amp' ) ); ?></h2>
			<div class="sl-grid-3 sl-grid-3--outcomes">
				<div class="sl-card sl-outcome-card">
					<h3><?php esc_html_e( 'Measurable outcomes', 'succeedlearn-amp' ); ?></h3>
					<ul>
						<li><?php esc_html_e( 'Reduced phishing and fraud incidents', 'succeedlearn-amp' ); ?></li>
						<li><?php esc_html_e( 'Fewer human errors and preventable breaches', 'succeedlearn-amp' ); ?></li>
						<li><?php esc_html_e( 'Improved employee decision-making', 'succeedlearn-amp' ); ?></li>
						<li><?php esc_html_e( 'Stronger security and compliance culture', 'succeedlearn-amp' ); ?></li>
						<li><?php esc_html_e( 'Better audit readiness', 'succeedlearn-amp' ); ?></li>
						<li><?php esc_html_e( 'Greater visibility into organisational risk', 'succeedlearn-amp' ); ?></li>
					</ul>
				</div>
				<div class="sl-card sl-outcome-card">
					<h3><?php esc_html_e( 'Easy Adoption. Real Impact.', 'succeedlearn-amp' ); ?></h3>
					<ul>
						<li><?php esc_html_e( 'SaaS or SCORM delivery', 'succeedlearn-amp' ); ?></li>
						<li><?php esc_html_e( 'Enterprise-ready architecture', 'succeedlearn-amp' ); ?></li>
						<li><?php esc_html_e( 'SSO, SAML, SCIM and API integrations', 'succeedlearn-amp' ); ?></li>
						<li><?php esc_html_e( 'Rapid onboarding', 'succeedlearn-amp' ); ?></li>
						<li><?php esc_html_e( 'Continuous reinforcement', 'succeedlearn-amp' ); ?></li>
						<li><?php esc_html_e( 'Dedicated support', 'succeedlearn-amp' ); ?></li>
					</ul>
				</div>
				<div class="sl-card sl-outcome-card">
					<h3><?php esc_html_e( 'Compliance Alignment', 'succeedlearn-amp' ); ?></h3>
					<div class="sl-outcome-tags">
						<?php
						$tags = array( 'GDPR / UK GDPR', 'ISO 27001', 'SOC 2', 'HIPAA', 'PCI DSS', 'Cyber Essentials', 'AML & Anti-Bribery', 'Workplace Conduct', 'Health & Safety' );
						foreach ( $tags as $tag ) :
							?>
							<span class="sl-outcome-tag"><?php echo esc_html( $tag ); ?></span>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
			<div class="sl-card sl-outcome-footer">
				<h4 class="sl-outcome-footer__title"><?php esc_html_e( 'Because compliance should not stop at course completion.', 'succeedlearn-amp' ); ?></h4>
				<p class="sl-outcome-footer__text"><?php esc_html_e( 'It should create safer decisions across the organisation.', 'succeedlearn-amp' ); ?></p>
			</div>
		</div>
	</section>

	<section class="sl-section">
		<div class="sl-wrap">
			<p class="sl-eyebrow"><?php esc_html_e( 'Getting Started', 'succeedlearn-amp' ); ?></p>
			<h2 class="sl-h2"><?php echo wp_kses_post( __( 'Getting started is <span>simple</span>', 'succeedlearn-amp' ) ); ?></h2>
			<div class="sl-grid-4 sl-steps">
				<?php
				$steps = array(
					array( '1', 'Discover', 'Tell us about your goals', 'Share your compliance and training needs.', 'Discover.svg' ),
					array( '2', 'Design', 'Get personalised recommendations', 'We recommend the right modules and delivery approach.', 'Design.svg' ),
					array( '3', 'Demo', 'See a live demo', 'Explore the platform and reporting capabilities.', 'Demo.svg' ),
					array( '4', 'Launch', 'Launch with ease', 'Rapid onboarding with guided setup and support.', 'Launch.svg' ),
				);
				foreach ( $steps as $step ) :
					?>
					<div class="sl-card sl-step">
						<amp-img src="<?php echo esc_url( $uploads . '/2026/07/' . $step[4] ); ?>" width="32" height="32" layout="fixed" alt=""></amp-img>
						<span class="sl-step__label"><?php echo esc_html( $step[1] ); ?></span>
						<h3><?php echo esc_html( $step[2] ); ?></h3>
						<p><?php echo esc_html( $step[3] ); ?></p>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="sl-section sl-cta-section">
		<div class="sl-wrap">
			<div class="sl-cta-card">
				<p class="sl-eyebrow"><?php esc_html_e( 'Final Call to Action', 'succeedlearn-amp' ); ?></p>
				<h2 class="sl-h2"><?php echo wp_kses_post( __( 'Ready to build a safer, <span>more compliant workforce?</span>', 'succeedlearn-amp' ) ); ?></h2>
				<p class="sl-lead"><?php esc_html_e( 'Discover how engaging training can reduce risk, simplify compliance, and create measurable behaviour change across your organisation.', 'succeedlearn-amp' ); ?></p>
				<div class="sl-cta-buttons">
					<a class="sl-btn sl-btn--primary" href="<?php echo esc_url( $contact_url ); ?>" data-cta="footer-demo"><?php esc_html_e( 'Book a Demo', 'succeedlearn-amp' ); ?></a>
					<a class="sl-btn sl-btn--secondary" href="mailto:sales@succeedtech.com"><?php esc_html_e( 'Contact Sales', 'succeedlearn-amp' ); ?></a>
				</div>
				<div class="sl-cta-contacts">
					<div class="sl-cta-contact">
						<span class="sl-cta-contact__label"><?php esc_html_e( 'Sales', 'succeedlearn-amp' ); ?></span>
						<a href="mailto:sales@succeedtech.com">sales@succeedtech.com</a>
					</div>
					<div class="sl-cta-contact">
						<span class="sl-cta-contact__label"><?php esc_html_e( 'General', 'succeedlearn-amp' ); ?></span>
						<a href="mailto:info@succeedtech.com">info@succeedtech.com</a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="sl-section sl-testimonials">
		<div class="sl-wrap">
			<p class="sl-eyebrow"><?php esc_html_e( 'What clients say', 'succeedlearn-amp' ); ?></p>
			<h2 class="sl-h2"><?php echo wp_kses_post( __( 'From teams who <span>rolled it out</span>', 'succeedlearn-amp' ) ); ?></h2>
			<p class="sl-lead"><?php esc_html_e( 'Organisations use SucceedLEARN to roll out compliance training that people complete — and remember.', 'succeedlearn-amp' ); ?></p>
			<div class="sl-testimonials__grid">
				<?php
				$testimonials = function_exists( 'akaza_get_client_testimonials' )
					? akaza_get_client_testimonials()
					: array(
						array(
							'quote' => 'The learning portal in Minda branding and integrated with our HRIS portal has made learner access seamless. I have recommended eLearnPOSH to my professional contacts.',
							'note'  => 'eLearnPOSH is a Product of SucceedLEARN. eLearnPOSH is for the POSH Compliance in India while SucceedLEARN is for Global Compliance.',
							'name'  => 'Mr. Sachchidanand Pande',
							'role'  => 'Group PR Head, UNO Minda Group',
						),
						array(
							'quote' => 'Succeed helped us make sure all of our workforce were trained and awareness was spread so effectively within a very short time. Your response to every email sent out by our employees was super quick and solution-oriented.',
							'name'  => 'Mr. Girisha Krishnappa',
							'role'  => 'People and Culture, AirAsia',
						),
						array(
							'quote' => 'An easy to use interface. The clarity and simplicity helps to navigate easily. The technical team is equally very good, their responses on queries are very prompt and they provide timely solutions.',
							'name'  => 'Ms. Gayatri Mishra',
							'role'  => 'L&D Specialist, Tata Smartfoodz Ltd',
						),
					);
				foreach ( $testimonials as $item ) :
					?>
					<figure class="sl-testimonials__card">
						<blockquote>
							<p>&ldquo;<?php echo esc_html( $item['quote'] ); ?>&rdquo;</p>
						</blockquote>
						<?php if ( ! empty( $item['note'] ) ) : ?>
							<div class="sl-testimonials__note">
								<?php echo esc_html( $item['note'] ); ?>
							</div>
						<?php endif; ?>
						<figcaption>
							<strong><?php echo esc_html( $item['name'] ); ?></strong>
							<span><?php echo esc_html( $item['role'] ); ?></span>
						</figcaption>
					</figure>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="sl-section" id="contact">
		<div class="sl-wrap sl-contact-layout">
			<div class="sl-contact-intro">
				<p class="sl-eyebrow"><?php esc_html_e( 'Get Your Personalized Demo', 'succeedlearn-amp' ); ?></p>
				<h2 class="sl-h2"><?php echo wp_kses_post( __( 'Need Help or <span>Have a Query?</span>', 'succeedlearn-amp' ) ); ?></h2>
				<p class="sl-lead"><?php esc_html_e( "Tell us a bit about your organisation and we'll show you exactly how SucceedLEARN reduces risk, simplifies compliance, and drives measurable behaviour change — for your team.", 'succeedlearn-amp' ); ?></p>
				<amp-img
					src="<?php echo esc_url( $contact_img ); ?>"
					width="1200"
					height="630"
					layout="responsive"
					alt="<?php esc_attr_e( 'Team reviewing compliance training outcomes and analytics', 'succeedlearn-amp' ); ?>"
				></amp-img>
			</div>
			<div class="sl-contact-form-card">
				<?php
				// Home keeps the default form (includes Interested In).
				echo do_shortcode( '[contact_form]' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				?>
			</div>
		</div>
	</section>

</main>

<?php include SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'components/footer.php'; ?>
<?php do_action( 'amp_post_template_footer', $this ); ?>
</body>
</html>
