<?php
/**
 * SucceedLEARN AMP — Online Defensive Driving Training for Employees.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$uploads   = content_url( '/uploads' );
$theme_uri = get_template_directory_uri();
$hero_img  = $uploads . '/2026/08/defensive-driving-hero.png';
$local_img = WP_CONTENT_DIR . '/uploads/2026/08/defensive-driving-hero.png';
if ( ! file_exists( $local_img ) ) {
	$hero_img = 'https://succeedlearn.com/wp-content/uploads/2026/08/defensive-driving-hero.png';
}

$canonical = home_url( '/defensive-driving/' );
foreach ( array( 'defensive-driving', 'online-defensive-driving-training' ) as $slug ) {
	$page = get_page_by_path( $slug );
	if ( $page instanceof WP_Post && 'publish' === $page->post_status ) {
		$link = get_permalink( $page );
		if ( $link ) {
			$canonical = $link;
			break;
		}
	}
}

$highlights = array(
	array(
		'number' => '01',
		'title'  => __( 'Safer drivers', 'succeedlearn-amp' ),
		'text'   => __( 'Build judgement, not just rule recall.', 'succeedlearn-amp' ),
	),
	array(
		'number' => '02',
		'title'  => __( 'Lower road risk', 'succeedlearn-amp' ),
		'text'   => __( 'Address preventable collision factors.', 'succeedlearn-amp' ),
	),
	array(
		'number' => '03',
		'title'  => __( 'Consistent learning', 'succeedlearn-amp' ),
		'text'   => __( 'Reach distributed teams at scale.', 'succeedlearn-amp' ),
	),
	array(
		'number' => '04',
		'title'  => __( 'Trackable evidence', 'succeedlearn-amp' ),
		'text'   => __( 'Assessment and completion records.', 'succeedlearn-amp' ),
	),
);

$risk_cards = array(
	array(
		'icon'  => '◎',
		'title' => __( 'Hazard perception', 'succeedlearn-amp' ),
		'text'  => __( 'Scan ahead, anticipate developing risks and preserve a safe escape route.', 'succeedlearn-amp' ),
	),
	array(
		'icon'  => '▣',
		'title' => __( 'Distracted driving', 'succeedlearn-amp' ),
		'text'  => __( 'Manage mobile phones, navigation systems and cognitive distraction.', 'succeedlearn-amp' ),
	),
	array(
		'icon'  => '◐',
		'title' => __( 'Fatigue & impairment', 'succeedlearn-amp' ),
		'text'  => __( 'Recognise reduced fitness to drive and choose the safe response.', 'succeedlearn-amp' ),
	),
	array(
		'icon'  => '☂',
		'title' => __( 'Weather & visibility', 'succeedlearn-amp' ),
		'text'  => __( 'Adapt speed, space and vehicle control to changing conditions.', 'succeedlearn-amp' ),
	),
	array(
		'icon'  => '◇',
		'title' => __( 'Blind spots & spacing', 'succeedlearn-amp' ),
		'text'  => __( 'Maintain safe following distance and avoid high-risk vehicle zones.', 'succeedlearn-amp' ),
	),
	array(
		'icon'  => '✓',
		'title' => __( 'Collision prevention', 'succeedlearn-amp' ),
		'text'  => __( 'Apply calm, preventive decisions before a situation becomes critical.', 'succeedlearn-amp' ),
	),
);

$modules = array(
	array(
		'title' => __( 'Why crashes happen', 'succeedlearn-amp' ),
		'desc'  => __( 'Human, vehicle and environmental factors.', 'succeedlearn-amp' ),
	),
	array(
		'title' => __( 'The Haddon Matrix', 'succeedlearn-amp' ),
		'desc'  => __( 'Prevention before, during and after a collision.', 'succeedlearn-amp' ),
	),
	array(
		'title' => __( 'Defensive driving essentials', 'succeedlearn-amp' ),
		'desc'  => __( 'Observation, anticipation, speed and space.', 'succeedlearn-amp' ),
	),
	array(
		'title' => __( 'The Eight Commandments', 'succeedlearn-amp' ),
		'desc'  => __( 'Memorable rules for everyday safe driving.', 'succeedlearn-amp' ),
	),
	array(
		'title' => __( 'High-risk situations', 'succeedlearn-amp' ),
		'desc'  => __( 'Blind spots, weather, night driving and aggression.', 'succeedlearn-amp' ),
	),
	array(
		'title' => __( 'Fit vehicle. Fit driver.', 'succeedlearn-amp' ),
		'desc'  => __( 'Checks, distraction, fatigue and impairment.', 'succeedlearn-amp' ),
	),
	array(
		'title' => __( 'Every stage of the journey', 'succeedlearn-amp' ),
		'desc'  => __( 'Before starting, while driving and after stopping.', 'succeedlearn-amp' ),
	),
	array(
		'title' => __( 'Scenario assessment', 'succeedlearn-amp' ),
		'desc'  => __( 'Decision activities and final assessment.', 'succeedlearn-amp' ),
	),
);

$learning_points = array(
	__( 'Animated explanations and real-world examples', 'succeedlearn-amp' ),
	__( 'Scenario-based decisions and knowledge checks', 'succeedlearn-amp' ),
	__( 'Responsive learning on desktop, tablet and mobile', 'succeedlearn-amp' ),
	__( 'Final assessment and configurable certificate', 'succeedlearn-amp' ),
);

$regions = array(
	array(
		'code'  => 'UK',
		'title' => __( 'United Kingdom', 'succeedlearn-amp' ),
		'text'  => __( 'Supports the HSE approach to the journey, driver and vehicle, including grey-fleet use.', 'succeedlearn-amp' ),
	),
	array(
		'code'  => 'US',
		'title' => __( 'United States', 'succeedlearn-amp' ),
		'text'  => __( 'Reflects OSHA guidance on training, distraction, fatigue and vehicle risk.', 'succeedlearn-amp' ),
	),
	array(
		'code'  => 'CA',
		'title' => __( 'Canada', 'succeedlearn-amp' ),
		'text'  => __( 'Designed for localisation to federal, provincial and territorial requirements.', 'succeedlearn-amp' ),
	),
	array(
		'code'  => 'EU',
		'title' => __( 'European Union', 'succeedlearn-amp' ),
		'text'  => __( 'Supports occupational road-risk awareness alongside national laws.', 'succeedlearn-amp' ),
	),
	array(
		'code'  => 'AN',
		'title' => __( 'Australia & New Zealand', 'succeedlearn-amp' ),
		'text'  => __( 'Complements risk-based WHS practices and safe journey planning.', 'succeedlearn-amp' ),
	),
	array(
		'code'  => 'GL',
		'title' => __( 'India & Global', 'succeedlearn-amp' ),
		'text'  => __( 'Can be localised for traffic law, company policy and industry risk.', 'succeedlearn-amp' ),
	),
);

$audience_points = array(
	__( 'Company car and grey-fleet drivers', 'succeedlearn-amp' ),
	__( 'Sales and field teams', 'succeedlearn-amp' ),
	__( 'Service engineers and technicians', 'succeedlearn-amp' ),
	__( 'Delivery and logistics personnel', 'succeedlearn-amp' ),
	__( 'Contractors and third-party drivers', 'succeedlearn-amp' ),
	__( 'Fleet managers and safety teams', 'succeedlearn-amp' ),
);

$delivery_cards = array(
	array(
		'icon'  => '◎',
		'title' => __( 'Reach every driver', 'succeedlearn-amp' ),
		'text'  => __( 'Assign consistent training across teams and regions.', 'succeedlearn-amp' ),
	),
	array(
		'icon'  => '↗',
		'title' => __( 'Track completion', 'succeedlearn-amp' ),
		'text'  => __( 'Monitor progress, assessment and records.', 'succeedlearn-amp' ),
	),
	array(
		'icon'  => '◉',
		'title' => __( 'Localise at scale', 'succeedlearn-amp' ),
		'text'  => __( 'Adapt language, policy and scenarios.', 'succeedlearn-amp' ),
	),
	array(
		'icon'  => '◇',
		'title' => __( 'Certify learning', 'succeedlearn-amp' ),
		'text'  => __( 'Issue configurable completion certificates.', 'succeedlearn-amp' ),
	),
);

$faq_items = array(
	array(
		'question' => __( 'What is defensive driving?', 'succeedlearn-amp' ),
		'answer'   => __( 'A proactive approach that helps drivers anticipate hazards, maintain safe speed and space, and act before a collision occurs.', 'succeedlearn-amp' ),
	),
	array(
		'question' => __( 'Is defensive driving training mandatory?', 'succeedlearn-amp' ),
		'answer'   => __( 'Not universally under that course name. Employers in many jurisdictions must nevertheless assess driving risks and provide appropriate instruction or training.', 'succeedlearn-amp' ),
	),
	array(
		'question' => __( 'Does OSHA require defensive driving training?', 'succeedlearn-amp' ),
		'answer'   => __( 'OSHA recommends initial and ongoing driver training. Specific requirements depend on the work, vehicle and applicable federal or state rules.', 'succeedlearn-amp' ),
	),
	array(
		'question' => __( 'Does it cover distracted and drowsy driving?', 'succeedlearn-amp' ),
		'answer'   => __( 'Yes. It covers mobile distraction, fatigue signs, journey planning, rest and fitness to drive.', 'succeedlearn-amp' ),
	),
	array(
		'question' => __( 'Can the course be customised by country?', 'succeedlearn-amp' ),
		'answer'   => __( 'Yes. Policies, legal references, emergency information, vehicle types and scenarios can be localised.', 'succeedlearn-amp' ),
	),
	array(
		'question' => __( 'Does it include an assessment and certificate?', 'succeedlearn-amp' ),
		'answer'   => __( 'Yes. It includes knowledge checks, a final assessment and configurable certificate.', 'succeedlearn-amp' ),
	),
	array(
		'question' => __( 'Can it be delivered through our LMS?', 'succeedlearn-amp' ),
		'answer'   => __( 'Yes, subject to confirming technical compatibility and tracking requirements.', 'succeedlearn-amp' ),
	),
);

$course_stats = array(
	array(
		'value' => __( '40 Mins', 'succeedlearn-amp' ),
		'label' => __( 'Total Duration', 'succeedlearn-amp' ),
	),
	array(
		'value' => '$ 15',
		'label' => __( 'Course Price', 'succeedlearn-amp' ),
	),
	array(
		'value' => __( 'Beginner Level', 'succeedlearn-amp' ),
		'label' => __( 'Course Level', 'succeedlearn-amp' ),
	),
	array(
		'value' => __( 'Workplace Health & Safety', 'succeedlearn-amp' ),
		'label' => __( 'Course Category', 'succeedlearn-amp' ),
	),
);

$course_features = array(
	__( 'Assessment', 'succeedlearn-amp' ),
	__( 'Certificate included', 'succeedlearn-amp' ),
	__( 'LMS-ready', 'succeedlearn-amp' ),
);

$page_title = __( 'Online Defensive Driving Training for Employees', 'succeedlearn-amp' );
$meta_desc  = __( 'Help employees anticipate road hazards, make safer decisions and prevent avoidable collisions with interactive, globally adaptable defensive driving eLearning.', 'succeedlearn-amp' );
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
		'defensive_driving',
		array( 'home-page' ),
		array( 'home-sections', 'contact-form', 'defensive-driving' )
	);
	?>
	.sl-dd-hero__bg{background-image:url(<?php echo esc_url( $hero_img ); ?>)}
	</style>
	<?php succeedlearn_amp_output_components( 'defensive_driving', array( 'amp-form', 'amp-mustache', 'amp-sidebar', 'amp-accordion', 'amp-bind' ) ); ?>
</head>
<body class="sl-home sl-dd-page">
<?php include SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'components/menu.php'; ?>

<main id="main-content">

	<section class="sl-dd-hero">
		<div class="sl-dd-hero__bg" aria-hidden="true"></div>
		<div class="sl-dd-hero__overlay" aria-hidden="true"></div>
		<div class="sl-wrap sl-dd-hero__grid">
			<div class="sl-dd-hero__content">
				<p class="sl-dd-hero__eyebrow"><?php esc_html_e( 'Workplace Health & Safety eLearning', 'succeedlearn-amp' ); ?></p>
				<h1 class="sl-dd-hero__title">
					<?php esc_html_e( 'Online Defensive Driving', 'succeedlearn-amp' ); ?>
					<span><?php esc_html_e( 'Training for Employees', 'succeedlearn-amp' ); ?></span>
				</h1>
				<p class="sl-dd-hero__desc"><?php esc_html_e( 'Help employees anticipate road hazards, make safer decisions and prevent avoidable collisions-with interactive, globally adaptable eLearning built for people who drive for work.', 'succeedlearn-amp' ); ?></p>
				<ul class="sl-dd-hero__meta">
					<li><?php esc_html_e( '8 modules', 'succeedlearn-amp' ); ?></li>
					<li><?php esc_html_e( '100% online learning', 'succeedlearn-amp' ); ?></li>
					<li><?php esc_html_e( 'Globally adaptable', 'succeedlearn-amp' ); ?></li>
				</ul>
				<div class="sl-dd-hero__actions">
					<div class="sl-dd-hero__cta-group">
						<span class="sl-dd-hero__cta-label"><?php esc_html_e( 'For Enterprise', 'succeedlearn-amp' ); ?></span>
						<button type="button" class="sl-btn sl-btn--primary" <?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>><?php esc_html_e( 'Request Demo', 'succeedlearn-amp' ); ?></button>
					</div>
				</div>
			</div>
			<aside class="sl-dd-course-card" aria-label="<?php esc_attr_e( 'Course overview', 'succeedlearn-amp' ); ?>">
				<span class="sl-dd-course-card__badge"><?php esc_html_e( 'Interactive eLearning', 'succeedlearn-amp' ); ?></span>
				<h2 class="sl-dd-course-card__title"><?php esc_html_e( 'Defensive Driving Essentials', 'succeedlearn-amp' ); ?></h2>
				<p class="sl-dd-course-card__desc"><?php esc_html_e( 'Practical awareness for safer journeys-before, during and after driving.', 'succeedlearn-amp' ); ?></p>
				<ul class="sl-dd-course-card__stats">
					<?php foreach ( $course_stats as $stat ) : ?>
						<li>
							<strong><?php echo esc_html( $stat['value'] ); ?></strong>
							<span><?php echo esc_html( $stat['label'] ); ?></span>
						</li>
					<?php endforeach; ?>
				</ul>
				<ul class="sl-dd-course-card__features">
					<?php foreach ( $course_features as $feature ) : ?>
						<li><?php echo esc_html( $feature ); ?></li>
					<?php endforeach; ?>
				</ul>
			</aside>
		</div>
	</section>

	<section class="sl-section sl-section--alt" aria-label="<?php esc_attr_e( 'Course highlights', 'succeedlearn-amp' ); ?>">
		<div class="sl-wrap sl-dd-highlights">
			<?php foreach ( $highlights as $item ) : ?>
				<article class="sl-dd-highlight">
					<span class="sl-dd-highlight__num"><?php echo esc_html( $item['number'] ); ?></span>
					<h3><?php echo esc_html( $item['title'] ); ?></h3>
					<p><?php echo esc_html( $item['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</section>

	<section class="sl-section">
		<div class="sl-wrap">
			<div class="sl-dd-risk-intro">
				<span class="sl-dd-risk-intro__eyebrow"><?php esc_html_e( 'Safety Beyond the Workplace Gate', 'succeedlearn-amp' ); ?></span>
				<h2>
					<?php esc_html_e( 'Driving for work is work.', 'succeedlearn-amp' ); ?>
					<span><?php esc_html_e( 'Manage the risk.', 'succeedlearn-amp' ); ?></span>
				</h2>
				<p><?php esc_html_e( 'Employees drive to meet customers, make deliveries, travel between sites and complete everyday business tasks. Each journey can expose the employee, the public and the organisation to risk. Defensive driving training goes beyond traffic rules. It builds a proactive mindset: observe earlier, anticipate mistakes, preserve time and space, and choose the safest response.', 'succeedlearn-amp' ); ?></p>
			</div>
			<div class="sl-dd-risk-grid">
				<?php foreach ( $risk_cards as $card ) : ?>
					<article class="sl-dd-risk-card">
						<div class="sl-dd-risk-card__icon" aria-hidden="true"><?php echo esc_html( $card['icon'] ); ?></div>
						<h3><?php echo esc_html( $card['title'] ); ?></h3>
						<p><?php echo esc_html( $card['text'] ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="sl-section sl-section--alt" id="curriculum">
		<div class="sl-wrap">
			<div class="sl-dd-section-head">
				<span class="sl-dd-section-head__eyebrow"><?php esc_html_e( 'Course Curriculum', 'succeedlearn-amp' ); ?></span>
				<h2>
					<?php esc_html_e( 'Everything employees need', 'succeedlearn-amp' ); ?>
					<span><?php esc_html_e( 'for safer journeys', 'succeedlearn-amp' ); ?></span>
				</h2>
				<p><?php esc_html_e( 'A focused 40-minute experience combining practical explanations, animated content, realistic decisions and frequent reinforcement.', 'succeedlearn-amp' ); ?></p>
			</div>
			<div class="sl-dd-modules">
				<?php foreach ( $modules as $index => $module ) : ?>
					<article class="sl-dd-module">
						<span class="sl-dd-module__num"><?php echo esc_html( sprintf( '%02d', $index + 1 ) ); ?></span>
						<div>
							<h3><?php echo esc_html( $module['title'] ); ?></h3>
							<p><?php echo esc_html( $module['desc'] ); ?></p>
						</div>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="sl-section">
		<div class="sl-wrap sl-dd-split">
			<div class="sl-dd-split__content">
				<div class="sl-dd-section-head">
					<span class="sl-dd-section-head__eyebrow"><?php esc_html_e( 'Learning that changes behaviour', 'succeedlearn-amp' ); ?></span>
					<h2>
						<?php esc_html_e( 'Put learners in the', 'succeedlearn-amp' ); ?>
						<span><?php esc_html_e( 'driver’s seat', 'succeedlearn-amp' ); ?></span>
					</h2>
					<p><?php esc_html_e( 'Decision-based activities move employees from passive awareness to active judgement. Learners encounter tailgating, blind spots, mobile distraction, fatigue, weather and low visibility-and choose the safest response.', 'succeedlearn-amp' ); ?></p>
				</div>
				<ul class="sl-dd-points">
					<?php foreach ( $learning_points as $point ) : ?>
						<li><?php echo esc_html( $point ); ?></li>
					<?php endforeach; ?>
				</ul>
			</div>
			<div class="sl-dd-split__media">
				<amp-img
					src="<?php echo esc_url( $hero_img ); ?>"
					width="1200"
					height="900"
					layout="responsive"
					alt="<?php esc_attr_e( 'Defensive driving course scenario', 'succeedlearn-amp' ); ?>"
				></amp-img>
			</div>
		</div>
	</section>

	<section class="sl-section sl-section--alt">
		<div class="sl-wrap">
			<div class="sl-dd-section-head">
				<span class="sl-dd-section-head__eyebrow"><?php esc_html_e( 'Global road-safety alignment', 'succeedlearn-amp' ); ?></span>
				<h2>
					<?php esc_html_e( 'One core course.', 'succeedlearn-amp' ); ?>
					<span><?php esc_html_e( 'Localised where it matters.', 'succeedlearn-amp' ); ?></span>
				</h2>
				<p><?php esc_html_e( 'Local law, company policy and regulated-driver requirements can be added for each workforce.', 'succeedlearn-amp' ); ?></p>
			</div>
			<div class="sl-dd-regions">
				<?php foreach ( $regions as $region ) : ?>
					<article class="sl-dd-region">
						<span class="sl-dd-region__code"><?php echo esc_html( $region['code'] ); ?></span>
						<h3><?php echo esc_html( $region['title'] ); ?></h3>
						<p><?php echo esc_html( $region['text'] ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
			<div class="sl-dd-callout">
				<h3><?php esc_html_e( 'A clear compliance position', 'succeedlearn-amp' ); ?></h3>
				<p><?php esc_html_e( 'Defensive driving training is not universally mandated by that specific name. Employers in many jurisdictions must nevertheless assess and control work-related driving risks and provide appropriate information, instruction or training.', 'succeedlearn-amp' ); ?></p>
			</div>
			<p class="sl-dd-note"><?php esc_html_e( 'This course complements-but does not replace-valid licensing, Driver CPC, CDL, vocational, practical or vehicle-specific training where required.', 'succeedlearn-amp' ); ?></p>
		</div>
	</section>

	<section class="sl-section">
		<div class="sl-wrap sl-dd-split sl-dd-split--reverse">
			<div class="sl-dd-split__content">
				<div class="sl-dd-section-head">
					<span class="sl-dd-section-head__eyebrow"><?php esc_html_e( 'Who should take this course?', 'succeedlearn-amp' ); ?></span>
					<h2>
						<?php esc_html_e( 'Built for everyone who', 'succeedlearn-amp' ); ?>
						<span><?php esc_html_e( 'drives for work', 'succeedlearn-amp' ); ?></span>
					</h2>
					<p><?php esc_html_e( 'Use it for onboarding, annual safety awareness, targeted refreshers or as part of a wider fleet risk programme.', 'succeedlearn-amp' ); ?></p>
				</div>
				<p class="sl-dd-audience-badge">
					<strong><?php esc_html_e( '1 course', 'succeedlearn-amp' ); ?></strong>
					<?php esc_html_e( 'for company, fleet, rental and grey-fleet drivers', 'succeedlearn-amp' ); ?>
				</p>
				<ul class="sl-dd-points">
					<?php foreach ( $audience_points as $point ) : ?>
						<li><?php echo esc_html( $point ); ?></li>
					<?php endforeach; ?>
				</ul>
			</div>
			<div class="sl-dd-split__media">
				<amp-img
					src="<?php echo esc_url( $hero_img ); ?>"
					width="1200"
					height="900"
					layout="responsive"
					alt="<?php esc_attr_e( 'Defensive driving course audience', 'succeedlearn-amp' ); ?>"
				></amp-img>
			</div>
		</div>
	</section>

	<section class="sl-section sl-section--alt">
		<div class="sl-wrap">
			<div class="sl-dd-section-head">
				<span class="sl-dd-section-head__eyebrow"><?php esc_html_e( 'Deliver with SucceedLEARN', 'succeedlearn-amp' ); ?></span>
				<h2>
					<?php esc_html_e( 'Simple to deploy. Easy to track. Built to', 'succeedlearn-amp' ); ?>
					<span><?php esc_html_e( 'scale.', 'succeedlearn-amp' ); ?></span>
				</h2>
				<p><?php esc_html_e( 'Deliver through SucceedLEARN or your compatible LMS.', 'succeedlearn-amp' ); ?></p>
			</div>
			<div class="sl-dd-delivery-grid">
				<?php foreach ( $delivery_cards as $card ) : ?>
					<article class="sl-dd-delivery-card">
						<div class="sl-dd-delivery-card__icon" aria-hidden="true"><?php echo esc_html( $card['icon'] ); ?></div>
						<h3><?php echo esc_html( $card['title'] ); ?></h3>
						<p><?php echo esc_html( $card['text'] ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="sl-section">
		<div class="sl-wrap">
			<div class="sl-dd-section-head">
				<span class="sl-dd-section-head__eyebrow"><?php esc_html_e( 'Frequently asked questions', 'succeedlearn-amp' ); ?></span>
				<h2>
					<?php esc_html_e( 'What employers ask about', 'succeedlearn-amp' ); ?>
					<span><?php esc_html_e( 'defensive driving training', 'succeedlearn-amp' ); ?></span>
				</h2>
				<p><?php esc_html_e( 'Clear answers for HR, fleet, EHS and compliance teams.', 'succeedlearn-amp' ); ?></p>
			</div>
			<div class="sl-dd-faq">
				<amp-accordion animate>
					<?php foreach ( $faq_items as $item ) : ?>
						<section>
							<h3><?php echo esc_html( $item['question'] ); ?></h3>
							<div><p><?php echo esc_html( $item['answer'] ); ?></p></div>
						</section>
					<?php endforeach; ?>
				</amp-accordion>
			</div>
			<p style="margin-top:18px">
				<button type="button" class="sl-btn sl-btn--secondary" <?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>><?php esc_html_e( 'Still have a question? Talk to us', 'succeedlearn-amp' ); ?></button>
			</p>
		</div>
	</section>

	<section class="sl-section sl-section--alt">
		<div class="sl-wrap sl-dd-cta-panel">
			<p class="sl-eyebrow"><?php esc_html_e( 'Ready to reduce road risk?', 'succeedlearn-amp' ); ?></p>
			<h2 class="sl-h2">
				<?php esc_html_e( 'Build safer drivers -', 'succeedlearn-amp' ); ?>
				<span style="color:var(--sl-page-primary)"><?php esc_html_e( 'one decision at a time.', 'succeedlearn-amp' ); ?></span>
			</h2>
			<p class="sl-lead"><?php esc_html_e( 'Preview the course and see how SucceedLEARN can customise, deploy and track it for your workforce.', 'succeedlearn-amp' ); ?></p>
			<ul class="sl-dd-cta-points">
				<li><?php esc_html_e( 'Course preview', 'succeedlearn-amp' ); ?></li>
				<li><?php esc_html_e( 'Deployment guidance', 'succeedlearn-amp' ); ?></li>
				<li><?php esc_html_e( 'Customisation options', 'succeedlearn-amp' ); ?></li>
			</ul>
			<div class="sl-cta-buttons" style="margin-top:20px">
				<button type="button" class="sl-btn sl-btn--primary" <?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>><?php esc_html_e( 'Request a course demo', 'succeedlearn-amp' ); ?></button>
			</div>
		</div>
	</section>

	<section class="sl-section" id="contact">
		<div class="sl-wrap sl-contact-layout">
			<div class="sl-contact-intro">
				<p class="sl-eyebrow"><?php esc_html_e( 'Talk to our team', 'succeedlearn-amp' ); ?></p>
				<h2 class="sl-h2"><?php esc_html_e( 'See how defensive driving training works for your workforce', 'succeedlearn-amp' ); ?></h2>
				<p class="sl-lead"><?php esc_html_e( 'Book a short demo and we will walk you through the course experience, deployment options, localisation, and how completion and assessment records can support your fleet or EHS programme.', 'succeedlearn-amp' ); ?></p>
				<div class="sl-gwct-contact-direct">
					<p class="sl-gwct-contact-direct__label"><?php esc_html_e( 'Prefer to reach us directly?', 'succeedlearn-amp' ); ?></p>
					<a href="mailto:sales@succeedtech.com">
						<span class="sl-gwct-contact-direct__body">
							<span class="sl-gwct-contact-direct__title"><?php esc_html_e( 'Email us', 'succeedlearn-amp' ); ?></span>
							<span class="sl-gwct-contact-direct__value">sales@succeedtech.com</span>
						</span>
					</a>
					<a href="tel:+916362021778">
						<span class="sl-gwct-contact-direct__body">
							<span class="sl-gwct-contact-direct__title"><?php esc_html_e( 'Call us', 'succeedlearn-amp' ); ?></span>
							<span class="sl-gwct-contact-direct__value">+91 63620 21778</span>
						</span>
					</a>
				</div>
			</div>
			<div class="sl-contact-form-card">
				<?php
				if ( function_exists( 'succeedlearn_amp_render_contact_form' ) ) {
					succeedlearn_amp_render_contact_form(
						array(
							'form_page'     => $page_title,
							'form_page_url' => $canonical,
							'echo'          => true,
						)
					);
				} else {
					echo do_shortcode( '[contact_form form_variant="course" title="Request a course demo"]' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				}
				?>
			</div>
		</div>
	</section>

</main>

<?php include SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'components/footer.php'; ?>
<?php do_action( 'amp_post_template_footer', $this ); ?>
</body>
</html>
