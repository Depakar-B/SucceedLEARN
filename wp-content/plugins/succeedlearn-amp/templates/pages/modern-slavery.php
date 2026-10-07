<?php
/**
 * SucceedLEARN AMP: Modern Slavery Awareness.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$canonical  = home_url( '/modern-slavery-awareness/' );
$page_obj   = get_page_by_path( 'modern-slavery-awareness' );
if ( $page_obj instanceof WP_Post ) {
	$link = get_permalink( $page_obj );
	if ( $link ) {
		$canonical = $link;
	}
}
$page_title = __( 'Modern Slavery Awareness Training', 'succeedlearn-amp' );
$meta_desc  = __( 'UK-focused Modern Slavery Awareness Training covering modern slavery, warning signs, reporting and escalation, procurement and supply-chain risk.', 'succeedlearn-amp' );
$hero_image = succeedlearn_amp_upload_url( '2026/10/supply_chain_due_diligence_review.webp' );

$why_cards = array(
	array( 'num' => '01', 'title' => __( 'Understand modern slavery', 'succeedlearn-amp' ), 'text' => __( 'Learn how exploitation can involve coercion, threats, deception, abuse of power or other forms of control.', 'succeedlearn-amp' ) ),
	array( 'num' => '02', 'title' => __( 'Recognise possible warning signs', 'succeedlearn-amp' ), 'text' => __( 'Identify behaviours or circumstances that may indicate a person is being controlled or exploited.', 'succeedlearn-amp' ) ),
	array( 'num' => '03', 'title' => __( 'Respond appropriately', 'succeedlearn-amp' ), 'text' => __( 'Know what information to note and where to report a concern internally.', 'succeedlearn-amp' ) ),
	array( 'num' => '04', 'title' => __( 'Consider supply-chain risk', 'succeedlearn-amp' ), 'text' => __( 'Relevant procurement learners receive additional guidance on suppliers, due diligence and vendor risk.', 'succeedlearn-amp' ) ),
);
$outcomes = array(
	array( 'num' => '01 / DEFINE', 'title' => __( 'Understand modern slavery', 'succeedlearn-amp' ), 'text' => __( 'Recognise what modern slavery means and the different forms it can take.', 'succeedlearn-amp' ) ),
	array( 'num' => '02 / RECOGNISE', 'title' => __( 'Identify warning signs', 'succeedlearn-amp' ), 'text' => __( 'Recognise behaviours and circumstances that may indicate exploitation or control.', 'succeedlearn-amp' ) ),
	array( 'num' => '03 / REPORT', 'title' => __( 'Report appropriately', 'succeedlearn-amp' ), 'text' => __( 'Know how to record relevant facts and report concerns through the right channels.', 'succeedlearn-amp' ) ),
	array( 'num' => '04 / PROCUREMENT', 'title' => __( 'Reduce supply-chain risk', 'succeedlearn-amp' ), 'text' => __( 'Relevant learners explore supplier due diligence and practical vendor-selection considerations.', 'succeedlearn-amp' ) ),
);
$procurement = array(
	array( 'num' => '01', 'title' => __( 'Check supplier due diligence', 'succeedlearn-amp' ), 'text' => __( 'Follow relevant screening and review processes before onboarding and throughout supplier relationships.', 'succeedlearn-amp' ) ),
	array( 'num' => '02', 'title' => __( 'Review supplier policies and controls', 'succeedlearn-amp' ), 'text' => __( 'Look for standards relating to labour practices, worker protections and responsible sourcing.', 'succeedlearn-amp' ) ),
	array( 'num' => '03', 'title' => __( 'Assess transparency', 'succeedlearn-amp' ), 'text' => __( 'Consider whether a supplier can clearly explain how labour is sourced, managed and monitored.', 'succeedlearn-amp' ) ),
	array( 'num' => '04', 'title' => __( 'Watch for commercial red flags', 'succeedlearn-amp' ), 'text' => __( 'Unusually low pricing, vague workforce arrangements or inconsistent information may justify further review.', 'succeedlearn-amp' ) ),
	array( 'num' => '05', 'title' => __( 'Understand subcontracting and keep records', 'succeedlearn-amp' ), 'text' => __( 'Consider visibility and oversight, and document relevant decisions, checks and risk considerations.', 'succeedlearn-amp' ) ),
);
$reporting = array(
	array( 'num' => 'STEP 01', 'title' => __( 'Observe', 'succeedlearn-amp' ), 'text' => __( 'Focus on what you have directly seen or heard.', 'succeedlearn-amp' ) ),
	array( 'num' => 'STEP 02', 'title' => __( 'Note the facts', 'succeedlearn-amp' ), 'text' => __( 'Record relevant information about what happened, who was involved and when or where it was observed, where known.', 'succeedlearn-amp' ) ),
	array( 'num' => 'STEP 03', 'title' => __( 'Report', 'succeedlearn-amp' ), 'text' => __( 'Raise the concern through the appropriate internal channel, such as a line manager, Compliance or Legal.', 'succeedlearn-amp' ) ),
);
$individual_image   = succeedlearn_amp_upload_url( '2026/09/Image-1-AML.webp' );
$organisation_image = succeedlearn_amp_upload_url( '2026/09/organisation-image-1.webp' );
$audience_image     = succeedlearn_amp_upload_url( '2026/10/Slavery-Awareness_Image-4.webp' );
$audiences = array(
	__( 'Employees who need basic modern slavery awareness.', 'succeedlearn-amp' ),
	__( 'Employees who may encounter third-party workers or vendors.', 'succeedlearn-amp' ),
	__( 'Procurement and vendor-selection colleagues.', 'succeedlearn-amp' ),
	__( 'Employees who may need to raise or escalate concerns.', 'succeedlearn-amp' ),
);
$faq_items = array(
	array( 'question' => __( 'What is Modern Slavery Awareness Training?', 'succeedlearn-amp' ), 'answer' => __( 'Modern Slavery Awareness Training helps employees understand modern slavery, recognise possible warning signs and know how to report concerns appropriately.', 'succeedlearn-amp' ) ),
	array( 'question' => __( 'How long does the Modern Slavery Awareness course take?', 'succeedlearn-amp' ), 'answer' => __( 'The SucceedLEARN course has an approximate duration of 15 minutes.', 'succeedlearn-amp' ) ),
	array( 'question' => __( 'Which forms of modern slavery are covered?', 'succeedlearn-amp' ), 'answer' => __( 'The course covers slavery and servitude, forced labour, human trafficking, debt bondage and domestic servitude.', 'succeedlearn-amp' ) ),
	array( 'question' => __( 'Does the course include practical scenarios?', 'succeedlearn-amp' ), 'answer' => __( 'Yes. The course includes practical workplace scenarios designed to reinforce recognition and appropriate response.', 'succeedlearn-amp' ) ),
	array( 'question' => __( 'Does the course include procurement and vendor-selection content?', 'succeedlearn-amp' ), 'answer' => __( 'Yes. Learners involved in procurement or vendor selection receive additional content on supplier due diligence and supply-chain risk.', 'succeedlearn-amp' ) ),
	array( 'question' => __( 'Should employees investigate suspected modern slavery themselves?', 'succeedlearn-amp' ), 'answer' => __( 'No. Employees should report concerns through the appropriate internal channel rather than investigate or confront people themselves.', 'succeedlearn-amp' ) ),
	array( 'question' => __( 'Does one warning sign prove modern slavery?', 'succeedlearn-amp' ), 'answer' => __( 'No. One warning sign does not necessarily confirm exploitation, but a genuine concern should still be taken seriously and reported appropriately.', 'succeedlearn-amp' ) ),
	array( 'question' => __( 'Does the course cover the Modern Slavery Act 2015?', 'succeedlearn-amp' ), 'answer' => __( 'Yes. The course introduces the UK Modern Slavery Act 2015 and Section 54 transparency in supply chains within the procurement pathway.', 'succeedlearn-amp' ) ),
	array( 'question' => __( 'Is this Modern Slavery Awareness course UK-focused?', 'succeedlearn-amp' ), 'answer' => __( 'Yes. The course is UK-focused and includes UK-specific legal and supply-chain transparency content.', 'succeedlearn-amp' ) ),
);

$render_cards = static function ( $cards ) {
	echo '<div class="sl-msa-cards">';
	foreach ( $cards as $card ) {
		echo '<article class="sl-msa-card">';
		echo '<span class="sl-msa-card__num">' . esc_html( $card['num'] ) . '</span>';
		echo '<h3 class="sl-panel-title">' . esc_html( $card['title'] ) . '</h3>';
		echo '<p>' . esc_html( $card['text'] ) . '</p>';
		echo '</article>';
	}
	echo '</div>';
};
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
		'modern_slavery',
		array( 'home-page' ),
		array( 'home-sections', 'contact-form', 'global-course-suite', 'global-sub-heading', 'anti-bribery', 'modern-slavery' )
	);
	?>
	</style>
	<?php succeedlearn_amp_output_components( 'modern_slavery', array( 'amp-form', 'amp-mustache', 'amp-sidebar', 'amp-accordion', 'amp-bind', 'amp-lightbox' ) ); ?>
</head>
<body class="sl-home sl-anti-bribery-page sl-msa-page">
<?php include SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'components/menu.php'; ?>

<main id="main-content">
	<section id="top" class="sl-section sl-aml-pe-vc-hero" aria-labelledby="msa-hero-title">
		<div class="sl-wrap">
			<span class="sl-eyebrow sl-home-sub-heading"><?php esc_html_e( 'Modern Slavery Compliance Training', 'succeedlearn-amp' ); ?></span>
			<h1 id="msa-hero-title"><?php esc_html_e( 'Modern Slavery Awareness Training', 'succeedlearn-amp' ); ?> <span><?php esc_html_e( 'for UK Organisations', 'succeedlearn-amp' ); ?></span></h1>
			<p class="sl-aml-lead"><?php esc_html_e( 'Recognise the signs. Report concerns appropriately.', 'succeedlearn-amp' ); ?></p>
			<p><?php esc_html_e( 'A concise UK-focused course that helps employees understand modern slavery, recognise possible warning signs and know how to respond through the appropriate internal channels.', 'succeedlearn-amp' ); ?></p>
			<ul class="sl-aml-tags" role="list">
				<li><?php esc_html_e( '15 minutes', 'succeedlearn-amp' ); ?></li>
				<li><?php esc_html_e( 'Practical workplace scenarios', 'succeedlearn-amp' ); ?></li>
				<li><?php esc_html_e( 'Optional procurement pathway', 'succeedlearn-amp' ); ?></li>
			</ul>
			<div class="sl-hero-actions sl-aml-hero__actions">
				<div class="sl-aml-hero__cta-item">
					<span class="sl-aml-hero__cta-label"><?php esc_html_e( 'Individual', 'succeedlearn-amp' ); ?></span>
					<button type="button" class="sl-hero-btn sl-hero-btn-primary" <?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
						<?php esc_html_e( 'Buy Now @ $18', 'succeedlearn-amp' ); ?> <span aria-hidden="true">→</span>
					</button>
				</div>
				<div class="sl-aml-hero__cta-item">
					<span class="sl-aml-hero__cta-label"><?php esc_html_e( 'Organisation', 'succeedlearn-amp' ); ?></span>
					<button type="button" class="sl-hero-btn sl-hero-btn-secondary" <?php echo succeedlearn_amp_scroll_tap_attr( 'fcp-suite' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
						<?php esc_html_e( 'Explore More', 'succeedlearn-amp' ); ?>
					</button>
				</div>
			</div>
			<div class="sl-aml-media sl-aml-after">
				<div class="sl-aml-image sl-aml-image--wide">
					<amp-img src="<?php echo esc_url( $hero_image ); ?>" width="1600" height="1066" layout="responsive" alt="<?php esc_attr_e( 'Supply-chain due diligence review across shipping, warehousing and workforce risk', 'succeedlearn-amp' ); ?>"></amp-img>
				</div>
			</div>
		</div>
	</section>

	<section id="individuals" class="sl-section sl-section--alt">
		<div class="sl-wrap">
			<span class="sl-eyebrow sl-home-sub-heading"><?php esc_html_e( 'Individual Modern Slavery eLearning', 'succeedlearn-amp' ); ?></span>
			<h2 class="sl-h2"><?php esc_html_e( 'Modern Slavery Training', 'succeedlearn-amp' ); ?> <span><?php esc_html_e( 'For Individuals', 'succeedlearn-amp' ); ?></span> <?php esc_html_e( '- Start Immediately', 'succeedlearn-amp' ); ?></h2>
			<p class="sl-aml-lead"><?php esc_html_e( 'A focused learning experience for professionals who want practical Modern Slavery awareness without a lengthy training commitment.', 'succeedlearn-amp' ); ?></p>
			<ul class="sl-aml-feature-list" role="list">
				<li class="sl-aml-feature-list__item"><span class="sl-aml-number">01</span><div><strong><?php esc_html_e( 'Interactive eLearning', 'succeedlearn-amp' ); ?></strong><span><?php esc_html_e( 'Practical digital learning supported by Modern Slavery scenarios and knowledge checks.', 'succeedlearn-amp' ); ?></span></div></li>
				<li class="sl-aml-feature-list__item"><span class="sl-aml-number">02</span><div><strong><?php esc_html_e( '15-minute duration', 'succeedlearn-amp' ); ?></strong><span><?php esc_html_e( 'Complete the core Modern Slavery learning at your own pace.', 'succeedlearn-amp' ); ?></span></div></li>
				<li class="sl-aml-feature-list__item"><span class="sl-aml-number">03</span><div><strong><?php esc_html_e( 'Instant access', 'succeedlearn-amp' ); ?></strong><span><?php esc_html_e( 'Start learning immediately after purchase.', 'succeedlearn-amp' ); ?></span></div></li>
			</ul>
			<div class="sl-content-actions">
				<button type="button" class="sl-content-btn sl-content-btn-primary" <?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>><?php esc_html_e( 'Buy Now @ $18', 'succeedlearn-amp' ); ?></button>
				<button type="button" class="sl-content-btn sl-content-btn-secondary" <?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>><?php esc_html_e( 'Request Demo', 'succeedlearn-amp' ); ?></button>
			</div>
			<div class="sl-aml-media sl-aml-after">
				<div class="sl-aml-image">
					<amp-img src="<?php echo esc_url( $individual_image ); ?>" width="1200" height="900" layout="responsive" alt="<?php esc_attr_e( 'Individual Modern Slavery course preview', 'succeedlearn-amp' ); ?>"></amp-img>
				</div>
			</div>
		</div>
	</section>

	<section id="organisations" class="sl-section">
		<div class="sl-wrap">
			<span class="sl-eyebrow sl-home-sub-heading"><?php esc_html_e( 'Enterprise Modern Slavery eLearning', 'succeedlearn-amp' ); ?></span>
			<h2 class="sl-h2"><?php esc_html_e( 'Modern Slavery Training', 'succeedlearn-amp' ); ?> <span><?php esc_html_e( 'For Organisations', 'succeedlearn-amp' ); ?></span> <?php esc_html_e( '- Built for Scale', 'succeedlearn-amp' ); ?></h2>
			<p><?php esc_html_e( 'Deliver Modern Slavery awareness across teams while giving administrators the controls needed to assign training, monitor completion and manage recurring compliance activity.', 'succeedlearn-amp' ); ?></p>
			<ul class="sl-aml-feature-list" role="list">
				<li class="sl-aml-feature-list__item"><span class="sl-aml-number">01</span><div><strong><?php esc_html_e( 'Reporting and tracking', 'succeedlearn-amp' ); ?></strong><span><?php esc_html_e( 'Monitor learner progress, completion and training status.', 'succeedlearn-amp' ); ?></span></div></li>
				<li class="sl-aml-feature-list__item"><span class="sl-aml-number">02</span><div><strong><?php esc_html_e( 'Automatic reminders', 'succeedlearn-amp' ); ?></strong><span><?php esc_html_e( 'Support completion with automated learner reminders.', 'succeedlearn-amp' ); ?></span></div></li>
				<li class="sl-aml-feature-list__item"><span class="sl-aml-number">03</span><div><strong><?php esc_html_e( 'SCORM or SaaS delivery', 'succeedlearn-amp' ); ?></strong><span><?php esc_html_e( 'Deploy through your LMS or use the SucceedLEARN platform.', 'succeedlearn-amp' ); ?></span></div></li>
				<li class="sl-aml-feature-list__item"><span class="sl-aml-number">04</span><div><strong><?php esc_html_e( 'Group assignment', 'succeedlearn-amp' ); ?></strong><span><?php esc_html_e( 'Assign Modern Slavery training to selected teams or learner groups.', 'succeedlearn-amp' ); ?></span></div></li>
				<li class="sl-aml-feature-list__item"><span class="sl-aml-number">05</span><div><strong><?php esc_html_e( 'Completion visibility', 'succeedlearn-amp' ); ?></strong><span><?php esc_html_e( 'Give administrators clear oversight of learner activity.', 'succeedlearn-amp' ); ?></span></div></li>
			</ul>
			<div class="sl-content-actions">
				<button type="button" class="sl-content-btn sl-content-btn-primary" <?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>><?php esc_html_e( 'Request Demo', 'succeedlearn-amp' ); ?></button>
				<button type="button" class="sl-content-btn sl-content-btn-secondary" <?php echo succeedlearn_amp_scroll_tap_attr( 'fcp-suite' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>><?php esc_html_e( 'Explore More', 'succeedlearn-amp' ); ?></button>
			</div>
			<div class="sl-aml-media sl-aml-after">
				<div class="sl-aml-image">
					<amp-img src="<?php echo esc_url( $organisation_image ); ?>" width="1200" height="900" layout="responsive" alt="<?php esc_attr_e( 'Organisational Training Dashboard', 'succeedlearn-amp' ); ?>"></amp-img>
				</div>
			</div>
		</div>
	</section>

	<?php
	$fcp_courses = array(
		array(
			'num'   => '01',
			'title' => __( 'Anti-Money Laundering (AML)', 'succeedlearn-amp' ),
			'text'  => __( 'Build awareness of money laundering risks, suspicious activity, customer due diligence, warning signs and appropriate escalation.', 'succeedlearn-amp' ),
			'slug'  => 'aml-pe-vc',
		),
		array(
			'num'   => '02',
			'title' => __( 'Anti-Bribery and Anti-Corruption (ABAC)', 'succeedlearn-amp' ),
			'text'  => __( 'Help employees recognise bribery and corruption risks involving gifts, hospitality, conflicts, third parties and improper influence.', 'succeedlearn-amp' ),
			'slug'  => 'anti-bribery-anti-corruption',
		),
		array(
			'num'   => '03',
			'title' => __( 'Preventing Facilitation of Tax Evasion', 'succeedlearn-amp' ),
			'text'  => __( 'Help employees recognise tax-evasion facilitation risks, suspicious conduct and situations requiring appropriate prevention or escalation.', 'succeedlearn-amp' ),
			'slug'  => 'tax-evasion-facilitation',
		),
		array(
			'num'   => '04',
			'title' => __( 'Insider Trading', 'succeedlearn-amp' ),
			'text'  => __( 'Build awareness around inside information, confidential information, improper disclosure and responsible handling of market-sensitive data.', 'succeedlearn-amp' ),
			'slug'  => 'insider-trading',
		),
		array(
			'num'   => '05',
			'title' => __( 'Trade Compliance and Sanctions', 'succeedlearn-amp' ),
			'text'  => __( 'Help employees understand sanctions, restricted parties, high-risk jurisdictions, export controls and cross-border transaction risks.', 'succeedlearn-amp' ),
			'slug'  => 'trade-compliance-and-sanctions',
		),
		array(
			'num'   => '06',
			'title' => __( 'Failure to Prevent Fraud', 'succeedlearn-amp' ),
			'text'  => __( 'Develop awareness of fraud risks, associated-person risk, warning signs, preventive actions and reporting responsibilities.', 'succeedlearn-amp' ),
			'slug'  => 'failure-to-prevent-fraud',
		),
		array(
			'num'     => '07',
			'title'   => __( 'Modern Slavery Awareness', 'succeedlearn-amp' ),
			'text'    => __( 'Build employee awareness of modern slavery risks and potential concerns within business activities and supply-chain relationships.', 'succeedlearn-amp' ),
			'slug'    => 'modern-slavery-awareness',
			'current' => true,
		),
		array(
			'num'   => '08',
			'title' => __( 'Responsible Use of AI', 'succeedlearn-amp' ),
			'text'  => __( 'Help employees understand responsible workplace use of AI and the importance of applying organisational controls when using AI tools.', 'succeedlearn-amp' ),
			'slug'  => 'responsible-use-of-gen-ai',
		),
	);
	?>
	<section id="fcp-suite" class="sl-section sl-section--alt sl-course-suite sl-course-suite--fcp" aria-labelledby="sl-fcp-course-suite-title">
		<div class="sl-wrap">
			<div class="sl-course-suite__header">
				<div class="sl-course-suite__intro">
					<span class="sl-eyebrow sl-home-sub-heading"><?php esc_html_e( 'Financial Crime Prevention Suite', 'succeedlearn-amp' ); ?></span>
					<h2 id="sl-fcp-course-suite-title" class="sl-h2"><?php esc_html_e( 'Explore Our eLearning Compliance Courses', 'succeedlearn-amp' ); ?></h2>
					<p><?php esc_html_e( 'Build employee awareness across financial crime, ethical conduct and emerging compliance risks with practical, role-relevant eLearning.', 'succeedlearn-amp' ); ?></p>
				</div>
				<div class="sl-content-actions sl-course-suite__header-cta">
					<a class="sl-content-btn sl-content-btn-primary" href="#contact">
						<?php esc_html_e( 'Grab the whole suite for $1.5 per user per month', 'succeedlearn-amp' ); ?>
					</a>
				</div>
			</div>
			<div class="sl-course-suite__grid">
				<?php foreach ( $fcp_courses as $course ) : ?>
					<?php
					$is_current = ! empty( $course['current'] );
					$href       = $is_current ? '#contact' : succeedlearn_amp_course_suite_page_url( $course['slug'], '#contact' );
					$tile_class = 'sl-course-suite__tile' . ( $is_current ? ' is-active' : '' );
					$cta        = $is_current ? __( 'Buy This Course', 'succeedlearn-amp' ) : __( 'Explore More', 'succeedlearn-amp' );
					?>
					<a class="<?php echo esc_attr( $tile_class ); ?>" href="<?php echo esc_url( $href ); ?>">
						<div class="sl-course-suite__chrome">
							<span class="sl-course-suite__dash" aria-hidden="true"></span>
							<span class="sl-course-suite__num" aria-hidden="true"><?php echo esc_html( $course['num'] ); ?></span>
						</div>
						<h3 class="sl-panel-title"><?php echo esc_html( $course['title'] ); ?></h3>
						<p><?php echo esc_html( $course['text'] ); ?></p>
						<span class="sl-course-suite__cta">
							<?php echo esc_html( $cta ); ?>
							<span aria-hidden="true">→</span>
						</span>
					</a>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section id="overview" class="sl-section sl-section--alt">
		<div class="sl-wrap">
			<span class="sl-eyebrow sl-home-sub-heading"><?php esc_html_e( 'Course Overview', 'succeedlearn-amp' ); ?></span>
			<h2 class="sl-h2"><?php esc_html_e( 'What Is Modern Slavery Awareness Training', 'succeedlearn-amp' ); ?> <span><?php esc_html_e( 'in the UK?', 'succeedlearn-amp' ); ?></span></h2>
			<p class="sl-aml-lead"><?php esc_html_e( 'Modern Slavery Awareness Training helps employees understand what modern slavery is, recognise possible signs of exploitation and know how to report concerns appropriately.', 'succeedlearn-amp' ); ?></p>
			<p><?php esc_html_e( 'The SucceedLEARN course introduces slavery and servitude, forced labour, human trafficking, debt bondage and domestic servitude in clear, practical terms.', 'succeedlearn-amp' ); ?></p>
			<p><?php esc_html_e( 'Employees are not expected to investigate suspected exploitation themselves. The course focuses on recognising possible concerns and reporting them through the appropriate internal process.', 'succeedlearn-amp' ); ?></p>
		</div>
	</section>

	<section id="why-it-matters" class="sl-section">
		<div class="sl-wrap">
			<span class="sl-eyebrow sl-home-sub-heading"><?php esc_html_e( 'Why This Matters', 'succeedlearn-amp' ); ?></span>
			<h2 class="sl-h2"><?php esc_html_e( 'Why Modern Slavery Awareness Training Matters', 'succeedlearn-amp' ); ?> <span><?php esc_html_e( 'for UK Workplaces', 'succeedlearn-amp' ); ?></span></h2>
			<p><?php esc_html_e( 'Modern slavery can exist in different environments and may not always be immediately obvious.', 'succeedlearn-amp' ); ?></p>
			<?php $render_cards( $why_cards ); ?>
		</div>
	</section>

	<section id="audience" class="sl-section sl-section--alt">
		<div class="sl-wrap">
			<span class="sl-eyebrow sl-home-sub-heading"><?php esc_html_e( 'Target Audience', 'succeedlearn-amp' ); ?></span>
			<h2 class="sl-h2"><?php esc_html_e( 'Who Should Take Modern Slavery Awareness Training', 'succeedlearn-amp' ); ?> <span><?php esc_html_e( 'in a UK Organisation?', 'succeedlearn-amp' ); ?></span></h2>
			<p><?php esc_html_e( 'The course is suitable for employees who need practical awareness of modern slavery and guidance on how to respond when something does not seem right.', 'succeedlearn-amp' ); ?></p>
			<ul class="sl-list sl-aml-list" role="list">
				<?php foreach ( $audiences as $audience ) : ?>
					<li class="sl-list-item"><span class="sl-aml-check" aria-hidden="true">✓</span><span class="sl-list-item__text"><?php echo esc_html( $audience ); ?></span></li>
				<?php endforeach; ?>
			</ul>
			<div class="sl-aml-media sl-aml-after">
				<div class="sl-aml-image">
					<amp-img src="<?php echo esc_url( $audience_image ); ?>" width="1200" height="800" layout="responsive" alt="<?php esc_attr_e( 'UK employees, compliance or procurement colleagues discussing workplace and supplier risk', 'succeedlearn-amp' ); ?>"></amp-img>
				</div>
			</div>
		</div>
	</section>

	<section id="outcomes" class="sl-section">
		<div class="sl-wrap">
			<span class="sl-eyebrow sl-home-sub-heading"><?php esc_html_e( 'Learning Outcomes', 'succeedlearn-amp' ); ?></span>
			<h2 class="sl-h2"><?php esc_html_e( 'What Will Learners Be Able to Do?', 'succeedlearn-amp' ); ?></h2>
			<p><?php esc_html_e( 'The course focuses on practical awareness and appropriate workplace behaviour.', 'succeedlearn-amp' ); ?></p>
			<?php $render_cards( $outcomes ); ?>
		</div>
	</section>

	<section id="uk-law" class="sl-section sl-section--alt">
		<div class="sl-wrap">
			<span class="sl-eyebrow sl-home-sub-heading"><?php esc_html_e( 'UK Legal Context', 'succeedlearn-amp' ); ?></span>
			<h2 class="sl-h2"><?php esc_html_e( 'Modern Slavery Act 2015 and', 'succeedlearn-amp' ); ?> <span><?php esc_html_e( 'Section 54 Supply-Chain Transparency', 'succeedlearn-amp' ); ?></span></h2>
			<p><?php esc_html_e( 'The course introduces the Modern Slavery Act 2015 as part of the UK legal and compliance context. Learners who follow the procurement pathway are also introduced to Section 54, which focuses on transparency in supply chains.', 'succeedlearn-amp' ); ?></p>
			<article class="sl-msa-card">
				<span class="sl-msa-card__num">£36m</span>
				<h3 class="sl-panel-title"><?php esc_html_e( 'Section 54 turnover threshold', 'succeedlearn-amp' ); ?></h3>
				<p><?php esc_html_e( 'Current UK guidance states that Section 54 applies to qualifying commercial organisations that carry on a business or part of a business in the UK, supply goods or services and have annual turnover of £36 million or more.', 'succeedlearn-amp' ); ?></p>
			</article>
			<p class="sl-aml-disclaimer"><?php esc_html_e( 'This course provides awareness training and should not be treated as legal advice.', 'succeedlearn-amp' ); ?></p>
		</div>
	</section>

	<section id="procurement" class="sl-section">
		<div class="sl-wrap">
			<span class="sl-eyebrow sl-home-sub-heading"><?php esc_html_e( 'Optional Procurement Pathway', 'succeedlearn-amp' ); ?></span>
			<h2 class="sl-h2"><?php esc_html_e( 'Procurement and Supply-Chain Modern Slavery Training', 'succeedlearn-amp' ); ?></h2>
			<p><?php esc_html_e( 'Learners involved in procurement or vendor selection receive additional content on reducing modern slavery risk across supplier relationships.', 'succeedlearn-amp' ); ?></p>
			<?php $render_cards( $procurement ); ?>
		</div>
	</section>

	<section id="reporting" class="sl-section sl-section--alt">
		<div class="sl-wrap">
			<span class="sl-eyebrow sl-home-sub-heading"><?php esc_html_e( 'Reporting and Escalation', 'succeedlearn-amp' ); ?></span>
			<h2 class="sl-h2"><?php esc_html_e( 'A Clear Three-Step Response', 'succeedlearn-amp' ); ?></h2>
			<p><?php esc_html_e( 'The course gives learners a simple process for responding when something does not seem right.', 'succeedlearn-amp' ); ?></p>
			<?php $render_cards( $reporting ); ?>
		</div>
	</section>

	<section id="faqs" class="sl-section">
		<div class="sl-wrap">
			<span class="sl-eyebrow sl-home-sub-heading"><?php esc_html_e( 'Frequently Asked Questions', 'succeedlearn-amp' ); ?></span>
			<h2 class="sl-h2"><?php esc_html_e( 'Modern Slavery Awareness Training FAQs', 'succeedlearn-amp' ); ?></h2>
			<?php
			if ( function_exists( 'succeedlearn_amp_render_faq_accordion' ) ) {
				succeedlearn_amp_render_faq_accordion( $faq_items );
			}
			?>
		</div>
	</section>

	<section id="contact" class="sl-section sl-section--alt" aria-labelledby="msa-contact-title">
		<div class="sl-wrap sl-contact-layout">
			<div class="sl-contact-intro">
				<span class="sl-eyebrow sl-home-sub-heading"><?php esc_html_e( 'Your Next Step', 'succeedlearn-amp' ); ?></span>
				<h2 id="msa-contact-title" class="sl-h2"><?php esc_html_e( 'Buy Modern Slavery Awareness training', 'succeedlearn-amp' ); ?></h2>
				<p><?php esc_html_e( 'Tell us about your UK modern slavery awareness needs, including the optional procurement pathway, delivery and any customisation.', 'succeedlearn-amp' ); ?></p>
			</div>
			<div class="sl-contact-form-card">
				<?php
				if ( function_exists( 'succeedlearn_amp_render_contact_form' ) ) {
					succeedlearn_amp_render_contact_form(
						array(
							'form_page'     => $page_title,
							'form_page_url' => $canonical,
							'form_variant'  => 'course',
							'title'         => __( 'Modern Slavery Course Enquiry', 'succeedlearn-amp' ),
							'echo'          => true,
						)
					);
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
