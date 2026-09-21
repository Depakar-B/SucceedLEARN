<?php
/**
 * POSH Annual Webinar for IC Members — AMP landing page.
 *
 * Elementor snippet: genesis-sample/elementor-snippets/posh-annual-webinar-for-ic-members.html
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require ELEARNPOSH_AMP_TEMPLATES_DIR . 'partials/amp-page-shell-start.php';

global $redux_builder_amp;

$pwb_demo_url     = elearnposh_amp_url( '/contact-us/#demo' );
$pwb_register_url = 'https://us06web.zoom.us/webinar/register/WN_DSNHx184QWKAP5QgEpmRFA';
$pwb_sales_email  = 'sales@succeedtech.com';
$pwb_uploads      = 'https://elearnposh.com/wp-content/uploads/';

$pwb_banner_src = $pwb_uploads . '2026/06/POSH-Annual-IC-webinar-banner-image-scaled.jpg';
$pwb_banner_alt = 'POSH Annual Webinar for IC Members - July 2026';

$pwb_title    = 'All You Need to Know About POSH Compliance';
$pwb_subtitle = 'A Deep Dive into Workplace Safety, Legal Compliance and Internal POSH Audits';
$pwb_date       = '23rd July 2026';
$pwb_time_start = '03:00 PM';
$pwb_time_end   = '04:30 PM';

$pwb_intro = array(
	'In today\'s evolving professional landscape, ensuring a safe and respectful workplace is not just a legal requirement, but a cornerstone of organizational integrity, employee welfare and responsible governance. The Sexual Harassment of Women at Workplace (Prevention, Prohibition and Redressal) Act, 2013, commonly referred to as the POSH Act, provides the legal framework for preventing and addressing workplace sexual harassment in India.',
	'This webinar is designed to provide a practical and detailed understanding of POSH compliance and the responsibilities it creates for organizations. The session will help participants understand the key steps required to build a safer workplace where employees feel respected, protected and empowered to report concerns.',
	'We will also discuss the recent advisory issued by the National Commission for Women, which emphasizes stronger POSH implementation, regular awareness initiatives, professional training for Internal Committee members, SHe-Box usage, annual reporting, workplace safety mechanisms and annual POSH audits for establishments employing ten or more persons.',
	'Throughout this session, we will explore the seven key steps to ensure POSH compliance.',
);

$pwb_steps = array(
	array(
		'title'   => 'Drafting a POSH Policy',
		'intro'   => 'The POSH policy is the foundation of compliance. It should explain the law, define sexual harassment, identify covered persons, describe complaint channels, clarify inquiry timelines and state the organization\'s zero-tolerance approach.',
		'aspects' => array(
			'Define sexual harassment with examples.',
			'Cover employees, interns, consultants, trainees, contractors and third-party situations.',
			'Explain complaint filing, inquiry, confidentiality, interim relief and possible outcomes.',
			'Include anti-retaliation safeguards.',
		),
	),
	array(
		'title'   => 'Constituting an Internal Committee',
		'intro'   => 'Every workplace with 10 or more employees must have an Internal Committee. The IC is responsible for receiving complaints, conducting inquiries, making recommendations and supporting a fair redressal process.',
		'aspects' => array(
			'Woman Presiding Officer.',
			'At least 50% women members.',
			'External member with relevant expertise.',
			'IC constitution for each eligible office, branch or unit.',
		),
	),
	array(
		'title'   => 'Creating Awareness for Employees',
		'intro'   => 'Employees must know what sexual harassment means, how to report it, who the IC members are and what protection the law provides. Awareness should be ongoing and should not be limited to onboarding.',
		'aspects' => array(
			'Conducting regular awareness sessions.',
			'Displaying IC details and complaint procedures.',
			'Using posters, emails, intranet pages and town halls.',
			'Including managers, interns, contractors and trainees in awareness initiatives.',
		),
	),
	array(
		'title'   => 'Capacity Building for IC Members',
		'intro'   => 'IC members need specialized training because they perform a sensitive and quasi-judicial role. They must understand legal procedure, fairness, confidentiality, sensitivity, documentation, evidence and report writing.',
		'aspects' => array(
			'Training IC members on inquiry procedure.',
			'Covering principles of natural justice and confidentiality.',
			'Building skills for trauma-sensitive complaint handling.',
			'Training on findings, recommendations and closure reports.',
		),
	),
	array(
		'title'   => 'Annual Report Filing',
		'intro'   => 'Organizations must maintain annual POSH data and submit statutory reports. Annual reporting demonstrates that the employer is tracking complaints, awareness activities and compliance obligations.',
		'aspects' => array(
			'Number of complaints received.',
			'Number of complaints disposed of.',
			'Number of cases pending beyond prescribed timelines.',
			'Workshops and awareness programmes conducted.',
			'Action taken by the employer.',
		),
	),
	array(
		'title'   => 'SHe-Box Registration and Readiness',
		'intro'   => 'SHe-Box is a digital platform for workplace sexual harassment complaints. Organizations should be prepared to update relevant details and inform employees that SHe-Box is an additional complaint and tracking mechanism.',
		'aspects' => array(
			'Maintaining updated organization details.',
			'Keeping IC information ready.',
			'Informing employees about the platform.',
			'Tracking and responding to any complaint routed through SHe-Box.',
		),
	),
	array(
		'title'   => 'Internal POSH Audit and Compliance Review',
		'intro'   => 'In light of the recent advisory issued by the National Commission for Women, organizations are now expected to move beyond basic POSH documentation and demonstrate active compliance.',
		'extra'   => 'The advisory recommends annual POSH audits for establishments employing ten or more persons and emphasizes regular awareness, IC training, annual reporting, transparency, SHe-Box usage and workplace safety mechanisms.',
		'closing' => 'As part of this session, we will explain how an Internal POSH Audit can serve as the 7th step in a complete POSH compliance framework. The audit helps organizations verify whether their POSH policy, IC constitution, employee awareness, IC training, complaint handling, reporting, SHe-Box readiness and workplace safety practices are actually working in practice.',
		'aspects' => array(),
	),
);

$pwb_audience = array(
	'Internal Committee members',
	'HR professionals',
	'Legal professionals',
	'Compliance specialists',
	'Business leaders',
	'Founders and management teams',
	'Anyone interested in building a safer and more respectful workplace',
);

$pwb_closing = array(
	'This webinar is not just a journey through the legal requirements of the POSH Act. It is also a practical platform to discuss compliance best practices, implementation challenges, internal audit readiness and workplace safety culture.',
	'Join us as we navigate the key requirements of the POSH Act and empower organizations to foster a workplace environment that is safe, respectful and conducive to professional growth.',
	'We will also answer questions from participants about the POSH Act, compliance requirements and practical implementation.',
);

$pwb_speakers = array(
	array(
		'name'  => 'Santhosh KT',
		'role'  => 'Founder, eLearnPOSH.com | Subject Matter Expert - Compliance',
		'image' => $pwb_uploads . '2023/11/Santhosh-KT.png',
		'alt'   => 'Santhosh KT',
	),
	array(
		'name'  => 'Maya Sreenivasan',
		'role'  => 'Psychologist | Subject Matter Expert - eLearnPOSH.com',
		'image' => 'https://elearnposh.com/wp-content/uploads/2024/06/Maya.png',
		'alt'   => 'Maya Sreenivasan',
	),
);

$pwb_event_schema = array(
	'@context'              => 'https://schema.org',
	'@type'                 => 'Event',
	'name'                  => $pwb_title,
	'description'           => implode( ' ', $pwb_intro ),
	'startDate'             => '2026-07-23T15:00:00+05:30',
	'endDate'               => '2026-07-23T16:30:00+05:30',
	'eventAttendanceMode'   => 'https://schema.org/OnlineEventAttendanceMode',
	'eventStatus'           => 'https://schema.org/EventScheduled',
	'location'              => array(
		'@type' => 'VirtualLocation',
		'url'   => get_permalink(),
	),
	'organizer'             => array(
		'@type' => 'Organization',
		'name'  => 'eLearnPOSH',
		'url'   => home_url( '/' ),
	),
	'performer'             => array_map(
		static function ( $speaker ) {
			return array(
				'@type' => 'Person',
				'name'  => $speaker['name'],
			);
		},
		$pwb_speakers
	),
);

if ( $pwb_register_url ) {
	$pwb_event_schema['offers'] = array(
		'@type'         => 'Offer',
		'url'           => $pwb_register_url,
		'availability'  => 'https://schema.org/InStock',
		'price'         => '0',
		'priceCurrency' => 'INR',
	);
}

$pwb_meta_title = 'POSH Compliance Essentials Webinar: A Deep Dive into Workplace Safety, Legal Compliance and Internal POSH Audits';
?>
<!doctype html>
<html amp lang="<?php echo esc_attr( get_bloginfo( 'language' ) ); ?>">
<head>
	<meta charset="utf-8" />
	<link rel="shortcut icon" href="<?php echo esc_url( elearnposh_amp_get_favicon_url() ); ?>" type="image/png" />
	<title><?php echo esc_html( $pwb_meta_title ); ?> - eLearnPOSH</title>
	<?php do_action( 'amp_post_template_head', $this ); ?>

	<style amp-custom>
		body {
			font-family: "Inter", "Segoe UI", Roboto, Arial, sans-serif;
			margin: 0;
			padding: 0;
			padding-top: 100px;
			background: #fff;
			color: #0d2238;
		}

		<?php elearnposh_amp_include_style_partial( 'page-hero-subtitle' ); ?>

		.pwb {
			--brand: #064e96;
			--accent: #1472b2;
			--dark: #002a38;
			--muted: #54708d;
			--line: #d9e6f6;
		}

		.pwb-wrap {
			width: min(1110px, calc(100% - 2rem));
			max-width: min(1110px, calc(100% - 2rem));
			margin: 0 auto;
			box-sizing: border-box;
		}

		@media (min-width: 1601px) {
			.pwb-wrap {
				width: min(1290px, calc(100% - 2rem));
				max-width: min(1290px, calc(100% - 2rem));
			}
		}

		.pwb-hero {
			padding: 42px 0 28px;
			background:
				radial-gradient(900px 460px at 0% 0%, rgba(47, 144, 239, 0.1), transparent 70%),
				radial-gradient(900px 460px at 100% 0%, rgba(10, 154, 116, 0.08), transparent 72%),
				#fff;
		}

		.pwb-banner-card {
			margin: 40px 0 44px;
			border-radius: 8px;
			overflow: hidden;
		}

		.pwb-hero-head {
			text-align: center;
			margin: 0 auto 24px;
			max-width: 1040px;
			width: 100%;
		}

		.pwb-title {
			margin: 0 auto;
			font-size: 28px;
			line-height: 1.22;
			color: var(--brand);
			font-weight: 800;
			display: block;
			width: 100%;
			text-align: center;
			background: none;
			background-color: transparent;
			border: 0;
			border-radius: 0;
			box-shadow: none;
			padding: 0;
		}

		.pwb-datetime {
			display: flex;
			flex-direction: column;
			align-items: flex-start;
			gap: 4px;
			margin-bottom: 20px;
			padding: 12px 16px;
			border-radius: 12px;
			background: #f8fbff;
			border: 1px solid #d7e8fb;
			color: #0d2238;
			font-size: 15px;
		}

		.pwb-datetime-label {
			display: block;
			font-weight: 600;
			color: var(--muted);
			font-size: 14px;
		}

		.pwb-datetime-value {
			display: block;
			margin-top: 4px;
			font-size: 16px;
			line-height: 1.45;
		}

		.pwb-datetime strong { color: var(--brand); }

		.pwb-intro p,
		.pwb-closing p,
		.pwb-audience-intro {
			margin: 0 0 14px;
			color: var(--muted);
			line-height: 1.8;
			font-size: 16px;
		}

		.pwb-actions {
			display: flex;
			flex-wrap: wrap;
			gap: 10px;
			margin-bottom: 28px;
		}

		.pwb-zoom {
			display: inline-block;
			margin: 8px 0 20px;
			padding: 8px 12px;
			border-radius: 8px;
			background: #eefbf6;
			border: 1px solid #bfe9d8;
			color: #0f766e;
			font-size: 14px;
			font-weight: 700;
		}

		.pwb-btn {
			display: inline-block;
			padding: 11px 22px;
			border-radius: 8px;
			font-weight: 700;
			font-size: 15px;
			text-decoration: none;
		}

		.pwb-btn--primary {
			background: var(--accent);
			color: #fff;
			box-shadow: 0 6px 16px rgba(20, 114, 178, 0.28);
		}

		.pwb-section { padding: 28px 0 0; }

		.pwb-section-title {
			margin: 0 0 16px;
			font-size: 22px;
			color: var(--brand);
			line-height: 1.3;
		}

		.pwb-steps {
			display: grid;
			gap: 18px;
			margin-bottom: 8px;
		}

		.pwb-step {
			padding: 20px 22px;
			border: 1px solid #e8f0f8;
			border-radius: 14px;
			background: #fafcfd;
		}

		.pwb-step-head {
			display: flex;
			align-items: flex-start;
			gap: 14px;
			margin-bottom: 10px;
		}

		.pwb-step-num {
			flex: 0 0 34px;
			width: 34px;
			height: 34px;
			border-radius: 50%;
			background: linear-gradient(135deg, #0d73d4 0%, #2f90ef 100%);
			color: #fff;
			font-size: 15px;
			font-weight: 800;
			display: inline-flex;
			align-items: center;
			justify-content: center;
			line-height: 1;
		}

		.pwb-step-title {
			margin: 4px 0 0;
			font-size: 18px;
			font-weight: 700;
			color: var(--brand);
			line-height: 1.35;
		}

		.pwb-step p {
			margin: 0 0 12px;
			color: var(--muted);
			line-height: 1.75;
			font-size: 15px;
		}

		.pwb-step-label {
			margin: 0 0 8px;
			font-size: 14px;
			font-weight: 700;
			color: #0d2238;
		}

		.pwb-step-aspects {
			list-style: none;
			list-style-type: none;
			margin: 0;
			padding: 0;
			display: grid;
			gap: 8px;
		}

		.pwb-step-aspects li {
			list-style: none;
			list-style-type: none;
			position: relative;
			padding-left: 18px;
			color: var(--muted);
			line-height: 1.65;
			font-size: 15px;
		}

		.pwb-step-aspects li::before {
			content: "";
			position: absolute;
			left: 0;
			top: 9px;
			width: 7px;
			height: 7px;
			border-radius: 50%;
			background: #2f90ef;
		}

		.pwb-list {
			list-style: none;
			list-style-type: none;
			margin: 0;
			padding: 0;
			display: grid;
			gap: 10px;
		}

		.pwb-list--two-col {
			grid-template-columns: repeat(2, minmax(0, 1fr));
			gap: 10px 16px;
		}

		.pwb-list li {
			list-style: none;
			list-style-type: none;
			display: flex;
			align-items: flex-start;
			gap: 12px;
			padding: 12px 14px;
			border: 1px solid #e8f0f8;
			border-radius: 12px;
			background: #fafcfd;
			color: var(--muted);
			line-height: 1.65;
			font-size: 15px;
		}

		.pwb-list li::before {
			content: "";
			flex: 0 0 10px;
			width: 10px;
			height: 10px;
			margin-top: 7px;
			border-radius: 50%;
			background: linear-gradient(135deg, #0d73d4 0%, #2f90ef 100%);
		}

		.pwb-speakers-grid {
			display: grid;
			grid-template-columns: repeat(2, minmax(0, 1fr));
			gap: 16px;
			margin-top: 8px;
		}

		.pwb-speaker {
			display: flex;
			align-items: center;
			gap: 16px;
			padding: 16px;
			border: 1px solid var(--line);
			border-radius: 14px;
			background: #fff;
			box-shadow: 0 8px 24px rgba(11, 35, 58, 0.08);
		}

		.pwb-speaker-photo {
			flex: 0 0 88px;
			width: 88px;
			height: 88px;
			border-radius: 50%;
			overflow: hidden;
			border: 3px solid #eaf4ff;
		}

		.pwb-speaker-name {
			margin: 0 0 4px;
			font-size: 18px;
			font-weight: 700;
			color: var(--brand);
		}

		.pwb-speaker-role {
			margin: 0;
			color: var(--muted);
			font-size: 14px;
			line-height: 1.55;
		}

		@media (max-width: 991px) {
			.pwb-list--two-col,
			.pwb-speakers-grid { grid-template-columns: 1fr; }
		}

		@media (max-width: 767px) {
			.pwb-hero { padding-top: 12px; }
			.pwb-hero .pwb-wrap {
				width: 100%;
				max-width: none;
				padding-left: 1rem;
				padding-right: 1rem;
				box-sizing: border-box;
			}
			.pwb-hero-content {
				padding-left: 0;
				padding-right: 0;
			}
			.pwb-banner-card {
				margin-top: 0;
				margin-bottom: 28px;
				border-radius: 8px;
			}
		}

		@media (max-width: 640px) {
			.pwb-speaker {
				flex-direction: column;
				text-align: center;
			}
		}

		@media (min-width: 768px) {
			.pwb-title { font-size: 34px; }
		}

		<?php elearnposh_amp_include_style_partial( 'eposh-vz' ); ?>

		<?php
		$optimizer = \ElearnPOSH\AMP\Performance_Optimizer::get_instance();
		echo $optimizer->get_optimized_css( 'webinar', array( 'menu', 'footer' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		?>
	</style>

	<script type="application/ld+json"><?php echo elearnposh_amp_encode_page_schema_json_ld( $pwb_event_schema ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></script>
	<?php elearnposh_amp_output_components( 'webinar', array( 'amp-youtube', 'amp-accordion', 'amp-bind', 'amp-position-observer' ) ); ?>
</head>
<body>

<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/menu.php'; ?>

<div class="amp-content-wrapper">
<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/user-notification.php'; ?>

<main class="pwb">
	<section class="pwb-hero">
		<div class="pwb-wrap">
			<div class="pwb-banner-card">
				<amp-img
					src="<?php echo esc_url( $pwb_banner_src ); ?>"
					alt="<?php echo esc_attr( $pwb_banner_alt ); ?>"
					width="1024"
					height="400"
					layout="responsive">
				</amp-img>
			</div>

			<div class="pwb-hero-content">
				<div class="pwb-hero-head">
					<h1 class="pwb-title"><?php echo esc_html( $pwb_title ); ?></h1>
					<h3 class="ep-page-hero__subtitle pwb-subtitle"><?php echo esc_html( $pwb_subtitle ); ?></h3>
				</div>

				<div class="pwb-datetime">
					<span class="pwb-datetime-label"><?php esc_html_e( 'Date & Time:', 'elearnposh-amp' ); ?></span>
					<span class="pwb-datetime-value">
						<strong><?php echo esc_html( $pwb_date ); ?></strong>
						<span aria-hidden="true">|</span>
						<strong><?php echo esc_html( $pwb_time_start ); ?></strong>
						<span aria-hidden="true">to</span>
						<strong><?php echo esc_html( $pwb_time_end ); ?></strong> IST
					</span>
				</div>

				<div class="pwb-intro">
					<?php foreach ( $pwb_intro as $pwb_paragraph ) : ?>
					<p><?php echo esc_html( $pwb_paragraph ); ?></p>
					<?php endforeach; ?>
				</div>

				<p class="pwb-zoom" aria-label="<?php esc_attr_e( 'Delivery format', 'elearnposh-amp' ); ?>"><?php esc_html_e( 'Live on Zoom', 'elearnposh-amp' ); ?></p>

				<?php if ( $pwb_register_url ) : ?>
				<div class="pwb-actions">
					<a class="pwb-btn pwb-btn--primary" href="<?php echo esc_url( $pwb_register_url ); ?>" target="_blank" rel="noopener noreferrer">
						<?php esc_html_e( 'Register Now', 'elearnposh-amp' ); ?>
					</a>
				</div>
				<?php endif; ?>

				<div class="pwb-section">
					<h2 class="pwb-section-title"><?php esc_html_e( 'Steps to Ensure POSH Compliance', 'elearnposh-amp' ); ?></h2>
					<div class="pwb-steps">
						<?php foreach ( $pwb_steps as $pwb_step_index => $pwb_step ) : ?>
						<article class="pwb-step">
							<div class="pwb-step-head">
								<span class="pwb-step-num"><?php echo esc_html( (string) ( $pwb_step_index + 1 ) ); ?></span>
								<h3 class="pwb-step-title"><?php echo esc_html( $pwb_step['title'] ); ?></h3>
							</div>
							<?php if ( ! empty( $pwb_step['intro'] ) ) : ?>
							<p><?php echo esc_html( $pwb_step['intro'] ); ?></p>
							<?php endif; ?>
							<?php if ( ! empty( $pwb_step['extra'] ) ) : ?>
							<p><?php echo esc_html( $pwb_step['extra'] ); ?></p>
							<?php endif; ?>
							<?php if ( ! empty( $pwb_step['aspects'] ) ) : ?>
							<p class="pwb-step-label"><?php esc_html_e( 'Key aspects covered:', 'elearnposh-amp' ); ?></p>
							<ul class="pwb-step-aspects">
								<?php foreach ( $pwb_step['aspects'] as $pwb_aspect ) : ?>
								<li><?php echo esc_html( elearnposh_amp_format_key_point( $pwb_aspect ) ); ?></li>
								<?php endforeach; ?>
							</ul>
							<?php endif; ?>
							<?php if ( ! empty( $pwb_step['closing'] ) ) : ?>
							<p><?php echo esc_html( $pwb_step['closing'] ); ?></p>
							<?php endif; ?>
						</article>
						<?php endforeach; ?>
					</div>
				</div>

				<div class="pwb-section">
					<h2 class="pwb-section-title"><?php esc_html_e( 'Who Should Attend?', 'elearnposh-amp' ); ?></h2>
					<p class="pwb-audience-intro"><?php esc_html_e( 'This webinar is suitable for:', 'elearnposh-amp' ); ?></p>
					<ul class="pwb-list pwb-list--two-col">
						<?php foreach ( $pwb_audience as $pwb_item ) : ?>
						<li><?php echo esc_html( elearnposh_amp_format_key_point( $pwb_item ) ); ?></li>
						<?php endforeach; ?>
					</ul>
				</div>

				<div class="pwb-closing">
					<?php foreach ( $pwb_closing as $pwb_paragraph ) : ?>
					<p><?php echo esc_html( $pwb_paragraph ); ?></p>
					<?php endforeach; ?>
				</div>

				<div class="pwb-section">
					<h2 class="pwb-section-title"><?php esc_html_e( 'Speakers', 'elearnposh-amp' ); ?></h2>
					<div class="pwb-speakers-grid">
						<?php foreach ( $pwb_speakers as $pwb_speaker ) : ?>
						<div class="pwb-speaker">
							<div class="pwb-speaker-photo">
								<amp-img
									src="<?php echo esc_url( $pwb_speaker['image'] ); ?>"
									alt="<?php echo esc_attr( $pwb_speaker['alt'] ); ?>"
									width="88"
									height="88"
									layout="fixed"
									object-fit="cover">
								</amp-img>
							</div>
							<div>
								<p class="pwb-speaker-name"><?php echo esc_html( $pwb_speaker['name'] ); ?></p>
								<p class="pwb-speaker-role"><?php echo esc_html( $pwb_speaker['role'] ); ?></p>
							</div>
						</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php
	$eposh_vz_demo_url        = $pwb_demo_url;
	$eposh_vz_show_card_links = false;
	include ELEARNPOSH_AMP_TEMPLATES_DIR . 'partials/eposh-vz-section.php';
	?>
</main>

</div><!-- .amp-content-wrapper -->

<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/footer.php'; ?>

</body>
</html>
