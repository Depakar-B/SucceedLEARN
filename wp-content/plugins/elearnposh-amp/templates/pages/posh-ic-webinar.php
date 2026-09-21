<?php
/**
 * POSH IC Webinar — AMP landing page.
 *
 * Theme template: genesis-sample/posh-ic-webinar.php
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require ELEARNPOSH_AMP_TEMPLATES_DIR . 'partials/amp-page-shell-start.php';

global $redux_builder_amp;

$pwb_demo_url          = elearnposh_amp_url( '/contact-us/#demo' );
$pwb_register_url      = 'https://rzp.io/rzp/zcWw2VDT';
$pwb_sales_email       = 'sales@succeedtech.com';
$pwb_ic_subscribe_url  = esc_url( elearnposh_amp_get_ic_members_page_url() );
$pwb_uploads           = 'https://elearnposh.com/wp-content/uploads/';

$pwb_banner_src = $pwb_uploads . '2026/06/POSH-Annual-Webinar-banner-jully-2026.jpg';
$pwb_banner_alt = 'POSH Annual Webinar for IC Members - July 2026';

$pwb_title    = 'POSH and Consent: Beyond "Yes" and "No"';
$pwb_subtitle = 'Navigating Consent, Power Dynamics, and Compliance in Workplace Inquiries';
$pwb_date       = '17 Jul 2026';
$pwb_time_start = '03:00 PM';
$pwb_time_end   = '04:30 PM';

$pwb_intro = array(
	'Consent is often perceived as a straightforward concept, yet it remains one of the most misunderstood aspects of workplace behaviour and sexual harassment prevention.',
	'In the context of the POSH Act, 2013, understanding consent requires looking beyond explicit agreement to consider workplace boundaries, power dynamics, professional relationships, and whether conduct is welcome or unwelcome.',
	'This webinar explores the role of consent in creating respectful workplaces and preventing sexual harassment. Participants will learn how to understand consent beyond verbal agreement, evaluate the impact of power dynamics, and handle consent-related issues fairly and compliantly during workplace inquiries.',
);

$pwb_key_points = array(
	'Consent in the context of POSH, workplace conduct, and professional boundaries.',
	'How power dynamics, hierarchy, influence, dependency, or fear of consequences can affect consent.',
	'Handling consent-related issues during POSH inquiries with sensitivity, neutrality, and procedural fairness.',
	'Evaluating evidence to assess whether consent was present, absent, coerced, conditional, or withdrawn.',
	'Compliance expectations for employers, Internal Committee members, HR teams, and managers in consent-related complaints.',
);

$pwb_audience = array(
	'Employees across all levels',
	'Managers and People Leaders',
	'HR Professionals',
	'Internal Committee (IC) Members',
	'POSH Practitioners and Consultants',
	'Compliance and Ethics Professionals',
	'DEI Leaders',
	'Senior Management and Business Leaders',
);

$pwb_speakers = array(
	array(
		'name'  => 'Santhosh K T',
		'role'  => 'Founder - eLearnPOSH.com | Subject Matter Expert - Compliance',
		'image' => $pwb_uploads . '2023/11/Santhosh-KT.png',
		'alt'   => 'Santhosh KT',
	),
);

$pwb_event_schema = array(
	'@context'            => 'https://schema.org',
	'@type'                 => 'Event',
	'name'                  => $pwb_title,
	'description'           => implode( ' ', $pwb_intro ),
	'startDate'             => '2026-07-17T15:00:00+05:30',
	'endDate'               => '2026-07-17T16:30:00+05:30',
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
	'offers'                => array(
		'@type'         => 'Offer',
		'url'           => $pwb_register_url,
		'availability'  => 'https://schema.org/InStock',
		'price'         => '0',
		'priceCurrency' => 'INR',
	),
);
?>
<!doctype html>
<html amp lang="<?php echo esc_attr( get_bloginfo( 'language' ) ); ?>">
<head>
	<meta charset="utf-8" />
	<link rel="shortcut icon" href="<?php echo esc_url( elearnposh_amp_get_favicon_url() ); ?>" type="image/png" />
	<title><?php echo esc_html( $pwb_title ); ?> - eLearnPOSH</title>
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

		.pwb-actions {
			display: flex;
			flex-wrap: wrap;
			gap: 10px;
			margin-bottom: 28px;
		}

		.pwb-intro p {
			margin: 0 0 14px;
			color: var(--muted);
			line-height: 1.8;
			font-size: 16px;
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

		.pwb-btn--dark {
			background: var(--dark);
			color: #fff;
		}

		.pwb-section {
			padding: 28px 0;
		}

		.pwb-section-title {
			margin: 0 0 16px;
			font-size: 22px;
			color: var(--brand);
			line-height: 1.3;
		}

		.pwb-list {
			list-style: none;
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
			max-width: 88px;
			max-height: 88px;
			border-radius: 50%;
			overflow: hidden;
			border: 3px solid #eaf4ff;
		}

		.pwb-speaker-photo amp-img {
			display: block;
			max-width: 88px;
			max-height: 88px;
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

		.pwb-note {
			margin-top: 28px;
			padding: 22px;
			border-radius: 14px;
			background: linear-gradient(125deg, #f7fbff 0%, #eff7ff 50%, #f4fffa 100%);
			border: 1px solid #d7e8fb;
		}

		.pwb-note h2 {
			margin: 0 0 10px;
			font-size: 22px;
			color: var(--brand);
		}

		.pwb-note p {
			margin: 0 0 16px;
			color: var(--muted);
			line-height: 1.75;
		}

		.pwb-note a.pwb-note__link {
			color: var(--accent);
			font-weight: 700;
			text-decoration: underline;
		}

		.pwb-note .pwb-actions {
			margin-top: 4px;
			margin-bottom: 0;
		}

		.pwb-note .pwb-btn {
			margin-top: 0;
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

		.pwb-topic-label {
			margin: 0 0 8px;
			font-size: 14px;
			font-weight: 700;
			color: var(--accent);
			text-transform: uppercase;
			letter-spacing: 0.04em;
		}

		.pwb-step-label {
			margin: 0 0 8px;
			font-size: 14px;
			font-weight: 700;
			color: #0d2238;
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
				<p class="ep-page-hero__subtitle pwb-subtitle"><?php echo esc_html( $pwb_subtitle ); ?></p>
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

			<div class="pwb-actions">
				<a class="pwb-btn pwb-btn--primary" href="<?php echo esc_url( $pwb_register_url ); ?>" target="_blank" rel="noopener noreferrer">
					<?php esc_html_e( 'Register Now', 'elearnposh-amp' ); ?>
				</a>
			</div>

			<h2 class="pwb-section-title"><?php esc_html_e( 'Key Discussion Points', 'elearnposh-amp' ); ?></h2>
			<ul class="pwb-list">
				<?php foreach ( $pwb_key_points as $pwb_point ) : ?>
				<li><?php echo esc_html( elearnposh_amp_format_key_point( $pwb_point ) ); ?></li>
				<?php endforeach; ?>
			</ul>

			<div class="pwb-section">
				<h2 class="pwb-section-title"><?php esc_html_e( 'Who Should Attend?', 'elearnposh-amp' ); ?></h2>
				<ul class="pwb-list pwb-list--two-col">
					<?php foreach ( $pwb_audience as $pwb_item ) : ?>
					<li><?php echo esc_html( elearnposh_amp_format_key_point( $pwb_item ) ); ?></li>
					<?php endforeach; ?>
				</ul>
			</div>

			<div class="pwb-section">
				<h2 class="pwb-section-title"><?php esc_html_e( 'Speaker:', 'elearnposh-amp' ); ?></h2>
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

			<div class="pwb-note">
				<h2><?php esc_html_e( 'Free for Annual IC Program Subscribers', 'elearnposh-amp' ); ?></h2>
				<p>
					<?php esc_html_e( 'This webinar is free for subscribers to eLearnPOSH\'s Annual IC Program. For more information about the Annual IC Program or to secure your spot, please contact at', 'elearnposh-amp' ); ?>
					<a class="pwb-note__link" href="mailto:<?php echo esc_attr( $pwb_sales_email ); ?>"><?php echo esc_html( $pwb_sales_email ); ?></a>
				</p>
				<div class="pwb-actions">
					<a class="pwb-btn pwb-btn--primary" href="<?php echo esc_url( $pwb_ic_subscribe_url ); ?>">
						<?php esc_html_e( 'Annual IC Members Subscription', 'elearnposh-amp' ); ?>
					</a>
				</div>
			</div>
			</div><!-- .pwb-hero-content -->
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
