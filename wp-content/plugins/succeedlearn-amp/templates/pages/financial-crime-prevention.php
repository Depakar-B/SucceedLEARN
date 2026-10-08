<?php
/**
 * SucceedLEARN AMP: Financial Crime Prevention home page.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$canonical = home_url( '/fcp-home-page/' );
foreach ( array( 'fcp-home-page', 'financial-crime-prevention' ) as $slug ) {
	$page_obj = get_page_by_path( $slug );
	if ( $page_obj instanceof WP_Post ) {
		$link = get_permalink( $page_obj );
		if ( $link ) {
			$canonical = $link;
			break;
		}
	}
}

$page_title = __( 'Financial Crime Prevention Training', 'succeedlearn-amp' );
$meta_desc  = __( 'Practical Financial Crime Prevention eLearning that helps employees recognise key risks, understand warning signs and respond appropriately in real workplace situations.', 'succeedlearn-amp' );

$hero_image     = succeedlearn_amp_upload_url( '2026/10/financial_compliance_risk_monitoring.webp' );
$offer_image    = succeedlearn_amp_upload_url( '2026/10/FCP-Homepage_Image-2.webp' );
$definition_img = succeedlearn_amp_upload_url( '2026/10/global_financial_crime_monitoring.webp' );
$training_image = succeedlearn_amp_upload_url( '2026/10/FCP-Homepage_Image-1.webp' );

$suite = array(
	array( 'num' => '01', 'title' => __( 'Anti-Money Laundering (AML)', 'succeedlearn-amp' ), 'text' => __( 'Build awareness of money laundering risks, suspicious activity, customer due diligence, warning signs and appropriate escalation.', 'succeedlearn-amp' ), 'slug' => 'aml-pe-vc' ),
	array( 'num' => '02', 'title' => __( 'Anti-Bribery and Anti-Corruption (ABAC)', 'succeedlearn-amp' ), 'text' => __( 'Help employees recognise bribery and corruption risks involving gifts, hospitality, conflicts, third parties and improper influence.', 'succeedlearn-amp' ), 'slug' => 'anti-bribery-anti-corruption' ),
	array( 'num' => '03', 'title' => __( 'Preventing Facilitation of Tax Evasion', 'succeedlearn-amp' ), 'text' => __( 'Help employees recognise tax-evasion facilitation risks, suspicious conduct and situations requiring appropriate prevention or escalation.', 'succeedlearn-amp' ), 'slug' => 'tax-evasion-facilitation' ),
	array( 'num' => '04', 'title' => __( 'Insider Trading', 'succeedlearn-amp' ), 'text' => __( 'Build awareness around inside information, confidential information, improper disclosure and responsible handling of market-sensitive data.', 'succeedlearn-amp' ), 'slug' => 'insider-trading' ),
	array( 'num' => '05', 'title' => __( 'Trade Compliance and Sanctions', 'succeedlearn-amp' ), 'text' => __( 'Help employees understand sanctions, restricted parties, high-risk jurisdictions, export controls and cross-border transaction risks.', 'succeedlearn-amp' ), 'slug' => 'trade-compliance-and-sanctions' ),
	array( 'num' => '06', 'title' => __( 'Failure to Prevent Fraud', 'succeedlearn-amp' ), 'text' => __( 'Develop awareness of fraud risks, associated-person risk, warning signs, preventive actions and reporting responsibilities.', 'succeedlearn-amp' ), 'slug' => 'failure-to-prevent-fraud' ),
	array( 'num' => '07', 'title' => __( 'Modern Slavery Awareness', 'succeedlearn-amp' ), 'text' => __( 'Build employee awareness of modern slavery risks and potential concerns within business activities and supply-chain relationships.', 'succeedlearn-amp' ), 'slug' => 'modern-slavery-awareness' ),
	array( 'num' => '08', 'title' => __( 'Responsible Use of AI', 'succeedlearn-amp' ), 'text' => __( 'Help employees understand responsible workplace use of AI and the importance of applying organisational controls when using AI tools.', 'succeedlearn-amp' ), 'slug' => 'responsible-use-of-gen-ai' ),
);

$statistics = array(
	array(
		'num'   => '5%',
		'title' => __( 'ACFE Report to the Nations 2024', 'succeedlearn-amp' ),
		'text'  => __( 'ACFE estimates that organisations lose 5% of revenue to fraud each year.', 'succeedlearn-amp' ),
		'url'   => 'https://www.acfe.com/about-the-acfe/newsroom-for-media/press-releases/press-release-detail?s=2024-Report-to-the-Nations',
	),
	array(
		'num'   => '43%',
		'title' => __( 'ACFE Report to the Nations 2024', 'succeedlearn-amp' ),
		'text'  => __( 'ACFE reported that 43% of occupational fraud cases examined were detected through tips.', 'succeedlearn-amp' ),
		'url'   => 'https://www.acfe.com/about-the-acfe/newsroom-for-media/press-releases/press-release-detail?s=2024-Report-to-the-Nations',
	),
	array(
		'num'   => '$500m+',
		'title' => __( 'INTERPOL assessment', 'succeedlearn-amp' ),
		'text'  => __( 'INTERPOL reported that its I-GRIP mechanism had helped member countries intercept more than US$500 million in criminal proceeds since 2022.', 'succeedlearn-amp' ),
		'url'   => 'https://www.interpol.int/en/News-and-Events/News/2024/INTERPOL-Financial-Fraud-assessment-A-global-threat-boosted-by-technology',
	),
);

$training_points = array(
	array( 'num' => '01', 'title' => __( 'Understand Everyday Risk Situations', 'succeedlearn-amp' ), 'text' => __( 'Connect compliance concepts with situations involving customers, payments, suppliers, intermediaries and sensitive information.', 'succeedlearn-amp' ) ),
	array( 'num' => '02', 'title' => __( 'Recognise Red Flags and Warning Signs', 'succeedlearn-amp' ), 'text' => __( 'Help employees identify unusual instructions, inconsistent information, suspicious behaviour and situations requiring additional care.', 'succeedlearn-amp' ) ),
	array( 'num' => '03', 'title' => __( 'Escalate and Report Concerns Correctly', 'succeedlearn-amp' ), 'text' => __( 'Reinforce internal procedures and help employees understand when to pause, seek advice or use an approved reporting route.', 'succeedlearn-amp' ) ),
);

$audience_cards = array(
	array( 'num' => '01', 'title' => __( 'All employees and new joiners', 'succeedlearn-amp' ), 'text' => __( 'Risks: General compliance risks, misconduct, unusual requests and responsible workplace use. Training: ABAC, fraud prevention, modern slavery and responsible AI.', 'succeedlearn-amp' ) ),
	array( 'num' => '02', 'title' => __( 'Client-facing and onboarding teams', 'succeedlearn-amp' ), 'text' => __( 'Risks: Customer identity, unusual activity and high-risk relationships. Training: Anti-Money Laundering.', 'succeedlearn-amp' ) ),
	array( 'num' => '03', 'title' => __( 'Finance and operations teams', 'succeedlearn-amp' ), 'text' => __( 'Risks: Payments, suspicious instructions, records and transaction anomalies. Training: AML, sanctions, tax evasion and fraud prevention.', 'succeedlearn-amp' ) ),
	array( 'num' => '04', 'title' => __( 'Sales and business development', 'succeedlearn-amp' ), 'text' => __( 'Risks: Gifts, hospitality, third parties, intermediaries and high-risk markets. Training: ABAC, sanctions and fraud prevention.', 'succeedlearn-amp' ) ),
	array( 'num' => '05', 'title' => __( 'Procurement and vendor teams', 'succeedlearn-amp' ), 'text' => __( 'Risks: Suppliers, associated persons, supply chains and unusual payment activity. Training: ABAC, tax evasion, fraud and modern slavery awareness.', 'succeedlearn-amp' ) ),
	array( 'num' => '06', 'title' => __( 'Employees handling sensitive information', 'succeedlearn-amp' ), 'text' => __( 'Risks: Inside information, confidential information and disclosure risks. Training: Insider Trading.', 'succeedlearn-amp' ) ),
	array( 'num' => '07', 'title' => __( 'Employees using AI tools', 'succeedlearn-amp' ), 'text' => __( 'Risks: Workplace AI use and application of organisational controls. Training: Responsible Use of AI.', 'succeedlearn-amp' ) ),
);

$delivery_cards = array(
	array( 'num' => '01', 'title' => __( 'Hosted LMS or SCORM', 'succeedlearn-amp' ), 'text' => __( 'Deliver courses through the hosted platform or through an existing compatible learning environment.', 'succeedlearn-amp' ) ),
	array( 'num' => '02', 'title' => __( 'Assessments and Certificates', 'succeedlearn-amp' ), 'text' => __( 'Use knowledge checks, assessments and completion certificates to support learning records.', 'succeedlearn-amp' ) ),
	array( 'num' => '03', 'title' => __( 'Tracking and Reporting', 'succeedlearn-amp' ), 'text' => __( 'Monitor assignments, completion activity and available learner records.', 'succeedlearn-amp' ) ),
	array( 'num' => '04', 'title' => __( 'Policy Customisation', 'succeedlearn-amp' ), 'text' => __( 'Discuss organisational terminology, internal policies, branding and reporting routes.', 'succeedlearn-amp' ) ),
);

$faq_items = array(
	array( 'question' => __( 'What is Financial Crime Prevention?', 'succeedlearn-amp' ), 'answer' => __( 'Financial Crime Prevention is the process of identifying, preventing and responding to financial crime risks through effective policies, internal controls, due diligence and employee awareness.', 'succeedlearn-amp' ) ),
	array( 'question' => __( 'What is Financial Crime Prevention Training?', 'succeedlearn-amp' ), 'answer' => __( 'Financial Crime Prevention Training equips employees to recognise financial crime risks, identify red flags, follow internal procedures and report concerns appropriately.', 'succeedlearn-amp' ) ),
	array( 'question' => __( 'What is the difference between Anti-Money Laundering (AML) and Financial Crime Prevention?', 'succeedlearn-amp' ), 'answer' => __( 'AML focuses on preventing money laundering and terrorist financing, while Financial Crime Prevention is broader and also covers bribery, corruption, sanctions, fraud, tax evasion, insider trading and market abuse.', 'succeedlearn-amp' ) ),
	array( 'question' => __( 'Who should complete Financial Crime Prevention Training?', 'succeedlearn-amp' ), 'answer' => __( 'Employees in Compliance, Risk, Internal Audit, Finance, Operations, Procurement, Sales, customer-facing roles, Senior Management, and anyone handling customers, payments, third-party relationships or confidential information.', 'succeedlearn-amp' ) ),
	array( 'question' => __( 'Can Financial Crime Prevention Training be customised?', 'succeedlearn-amp' ), 'answer' => __( 'Yes. SucceedLEARN’s courses can be customised to reflect your organisation’s policies, procedures, branding, reporting routes and industry-specific compliance requirements.', 'succeedlearn-amp' ) ),
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
	<style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style>
	<noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
	<?php do_action( 'amp_post_template_head', $this ); ?>
	<style amp-custom>
	<?php
	succeedlearn_amp_output_page_styles(
		'financial_crime_prevention',
		array( 'home-page' ),
		array( 'home-sections', 'contact-form', 'global-course-suite', 'global-sub-heading', 'anti-bribery', 'modern-slavery' )
	);
	?>
	.sl-fcp-page #suite .sl-course-suite__grid{grid-template-columns:minmax(0,1fr)}
	@media(min-width:768px){
		.sl-fcp-page #suite .sl-course-suite__grid{grid-template-columns:repeat(2,minmax(0,1fr));gap:16px}
		.sl-fcp-page #suite .sl-course-suite__grid>.sl-course-suite__tile:last-child:nth-child(odd){grid-column:1/-1;justify-self:center;width:calc(50% - 8px)}
	}
	@media(min-width:1000px){
		.sl-fcp-page #suite .sl-course-suite__grid{grid-template-columns:repeat(2,minmax(0,1fr));gap:18px}
		.sl-fcp-page #suite .sl-course-suite__grid>.sl-course-suite__tile,
		.sl-fcp-page #suite .sl-course-suite__grid>.sl-course-suite__tile:last-child:nth-child(odd),
		.sl-fcp-page #suite .sl-course-suite__grid>.sl-course-suite__tile:nth-last-child(2):nth-child(3n+1),
		.sl-fcp-page #suite .sl-course-suite__grid>.sl-course-suite__tile:last-child:nth-child(3n+1){grid-column:auto;justify-self:stretch;width:auto}
	}
	</style>
	<?php succeedlearn_amp_output_components( 'financial_crime_prevention', array( 'amp-form', 'amp-mustache', 'amp-sidebar', 'amp-accordion', 'amp-bind', 'amp-lightbox' ) ); ?>
</head>
<body class="sl-home sl-anti-bribery-page sl-msa-page sl-fcp-page">
<?php include SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'components/menu.php'; ?>
<main id="main-content">
	<section id="course-hero" class="sl-section sl-aml-pe-vc-hero" aria-labelledby="sl-fcp-hero-title">
		<div class="sl-wrap">
			<span class="sl-eyebrow sl-home-sub-heading"><?php esc_html_e( 'Financial Crime Prevention Training', 'succeedlearn-amp' ); ?></span>
			<h1 id="sl-fcp-hero-title"><?php esc_html_e( 'Financial Crime Prevention', 'succeedlearn-amp' ); ?> <span><?php esc_html_e( 'eLearning Compliance Suite', 'succeedlearn-amp' ); ?></span></h1>
			<p class="sl-aml-lead"><?php esc_html_e( 'Practical compliance eLearning that helps employees recognise key risks, understand warning signs and respond appropriately in real workplace situations.', 'succeedlearn-amp' ); ?></p>
			<p><?php esc_html_e( 'Explore a connected suite covering financial crime, ethical conduct and emerging compliance risks across the organisation.', 'succeedlearn-amp' ); ?></p>
			<ul class="sl-aml-tags" role="list">
				<li><?php esc_html_e( 'Scenario-based eLearning', 'succeedlearn-amp' ); ?></li>
				<li><?php esc_html_e( 'Eight compliance courses', 'succeedlearn-amp' ); ?></li>
				<li><?php esc_html_e( 'Practical employee awareness', 'succeedlearn-amp' ); ?></li>
			</ul>
			<div class="sl-hero-actions sl-aml-hero__actions">
				<div class="sl-aml-hero__cta-item">
					<button type="button" class="sl-hero-btn sl-hero-btn-primary" <?php echo succeedlearn_amp_scroll_tap_attr( 'suite' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>><?php esc_html_e( 'Explore More', 'succeedlearn-amp' ); ?></button>
				</div>
				<div class="sl-aml-hero__cta-item">
					<button type="button" class="sl-hero-btn sl-hero-btn-secondary" <?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>><?php esc_html_e( 'Request Demo', 'succeedlearn-amp' ); ?></button>
				</div>
				<div class="sl-aml-hero__cta-item">
					<a class="sl-hero-btn sl-hero-btn-secondary" href="https://succeedlearn.com/FCP-module-Brochure.pdf" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Download Brochure', 'succeedlearn-amp' ); ?></a>
				</div>
			</div>
			<div class="sl-aml-media sl-aml-after">
				<div class="sl-aml-image sl-aml-image--wide">
					<amp-img src="<?php echo esc_url( $hero_image ); ?>" width="1600" height="1066" layout="responsive" alt="<?php esc_attr_e( 'Financial compliance risk monitoring across banking, sanctions and AI controls', 'succeedlearn-amp' ); ?>"></amp-img>
				</div>
			</div>
		</div>
	</section>

	<section id="offer" class="sl-section sl-section--alt">
		<div class="sl-wrap">
			<span class="sl-eyebrow sl-home-sub-heading"><?php esc_html_e( 'Complete Compliance Suite', 'succeedlearn-amp' ); ?></span>
			<h2 class="sl-h2"><?php esc_html_e( 'Avail the whole suite for just', 'succeedlearn-amp' ); ?> <span><?php esc_html_e( '$18 per user per year', 'succeedlearn-amp' ); ?></span></h2>
			<p><?php esc_html_e( 'Give your workforce access to the complete Financial Crime Prevention eLearning Compliance Suite through one simple annual option.', 'succeedlearn-amp' ); ?></p>
			<div class="sl-content-actions">
				<button type="button" class="sl-content-btn sl-content-btn-primary" <?php echo succeedlearn_amp_scroll_tap_attr( 'suite' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>><?php esc_html_e( 'Explore the Full Suite', 'succeedlearn-amp' ); ?></button>
			</div>
			<div class="sl-aml-media sl-aml-after">
				<div class="sl-aml-image">
					<amp-img src="<?php echo esc_url( $offer_image ); ?>" width="1122" height="1402" layout="responsive" alt="<?php esc_attr_e( 'Compliance team reviewing financial crime risk reports together', 'succeedlearn-amp' ); ?>"></amp-img>
				</div>
			</div>
		</div>
	</section>

	<section id="suite" class="sl-section sl-course-suite sl-course-suite--fcp" aria-labelledby="sl-fcp-suite-title">
		<div class="sl-wrap">
			<div class="sl-course-suite__header">
				<div class="sl-course-suite__intro">
					<span class="sl-eyebrow sl-home-sub-heading"><?php esc_html_e( 'Financial Crime Prevention Suite', 'succeedlearn-amp' ); ?></span>
					<h2 id="sl-fcp-suite-title" class="sl-h2"><?php esc_html_e( 'Explore Our eLearning Compliance Courses', 'succeedlearn-amp' ); ?></h2>
					<p><?php esc_html_e( 'Build employee awareness across financial crime, ethical conduct and emerging compliance risks with practical, role-relevant eLearning.', 'succeedlearn-amp' ); ?></p>
				</div>
				<div class="sl-content-actions sl-course-suite__header-cta">
					<a class="sl-content-btn sl-content-btn-primary" href="#contact"><?php esc_html_e( 'Grab the whole suite for $1.5 per user per month', 'succeedlearn-amp' ); ?></a>
				</div>
			</div>
			<div class="sl-course-suite__grid">
				<?php foreach ( $suite as $course ) : ?>
					<a class="sl-course-suite__tile" href="<?php echo esc_url( succeedlearn_amp_course_suite_page_url( $course['slug'], '#contact' ) ); ?>">
						<div class="sl-course-suite__chrome">
							<span class="sl-course-suite__dash" aria-hidden="true"></span>
							<span class="sl-course-suite__num" aria-hidden="true"><?php echo esc_html( $course['num'] ); ?></span>
						</div>
						<h3 class="sl-panel-title"><?php echo esc_html( $course['title'] ); ?></h3>
						<p><?php echo esc_html( $course['text'] ); ?></p>
						<span class="sl-course-suite__cta"><?php esc_html_e( 'Explore More', 'succeedlearn-amp' ); ?> <span aria-hidden="true">&rarr;</span></span>
					</a>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section id="what-is-fcp" class="sl-section sl-section--alt">
		<div class="sl-wrap">
			<span class="sl-eyebrow sl-home-sub-heading"><?php esc_html_e( 'FCP Definition', 'succeedlearn-amp' ); ?></span>
			<h2 class="sl-h2"><?php esc_html_e( 'What Is Financial Crime Prevention Training?', 'succeedlearn-amp' ); ?></h2>
			<p class="sl-aml-lead"><strong><?php esc_html_e( 'Financial Crime Prevention Training explained', 'succeedlearn-amp' ); ?></strong></p>
			<p><?php esc_html_e( 'Financial Crime Prevention Training helps employees recognise financial crime and compliance risks, understand relevant organisational controls and know when concerns should be prevented, escalated or reported.', 'succeedlearn-amp' ); ?></p>
			<p><?php esc_html_e( 'Financial crime and compliance risks can arise through money laundering, bribery, corruption, sanctions, tax evasion, fraud, misuse of confidential information and other forms of misconduct.', 'succeedlearn-amp' ); ?></p>
			<p><?php esc_html_e( 'Effective training connects these risks with situations employees may encounter in their roles, helping them understand warning signs and make informed decisions.', 'succeedlearn-amp' ); ?></p>
			<div class="sl-aml-media sl-aml-after">
				<div class="sl-aml-image">
					<amp-img src="<?php echo esc_url( $definition_img ); ?>" width="1536" height="1024" layout="responsive" alt="<?php esc_attr_e( 'Global financial crime monitoring dashboard on a laptop beside compliance reports', 'succeedlearn-amp' ); ?>"></amp-img>
				</div>
			</div>
		</div>
	</section>

	<section id="why-it-matters" class="sl-section">
		<div class="sl-wrap">
			<span class="sl-eyebrow sl-home-sub-heading"><?php esc_html_e( 'Why It Matters', 'succeedlearn-amp' ); ?></span>
			<h2 class="sl-h2"><?php esc_html_e( 'Why Financial Crime Prevention Matters Now', 'succeedlearn-amp' ); ?></h2>
			<p><?php esc_html_e( 'Employee awareness remains an important part of wider organisational controls designed to identify, prevent and respond to financial crime risks.', 'succeedlearn-amp' ); ?></p>
			<div class="sl-msa-cards">
				<?php foreach ( $statistics as $stat ) : ?>
					<article class="sl-msa-card">
						<span class="sl-msa-card__num"><?php echo esc_html( $stat['num'] ); ?></span>
						<p><?php echo esc_html( $stat['text'] ); ?></p>
						<p><a href="<?php echo esc_url( $stat['url'] ); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html( $stat['title'] ); ?> <span aria-hidden="true">&rarr;</span></a></p>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section id="training" class="sl-section sl-section--alt">
		<div class="sl-wrap">
			<span class="sl-eyebrow sl-home-sub-heading"><?php esc_html_e( 'Practical Employee Awareness', 'succeedlearn-amp' ); ?></span>
			<h2 class="sl-h2"><?php esc_html_e( 'Online Financial Crime Prevention Training for Employees', 'succeedlearn-amp' ); ?></h2>
			<p class="sl-aml-lead"><?php esc_html_e( 'Financial crime risks can arise during customer onboarding, payments, third-party dealings, gifts, confidential information handling, cross-border transactions and routine business approvals.', 'succeedlearn-amp' ); ?></p>
			<p><?php esc_html_e( 'SucceedLEARN’s online training uses practical scenarios, knowledge checks and assessments to help employees connect compliance expectations with decisions they may face in their work.', 'succeedlearn-amp' ); ?></p>
			<?php $render_cards( $training_points ); ?>
			<div class="sl-aml-media sl-aml-after">
				<div class="sl-aml-image">
					<amp-img src="<?php echo esc_url( $training_image ); ?>" width="1609" height="977" layout="responsive" alt="<?php esc_attr_e( 'Employees reviewing financial crime risks and compliance information', 'succeedlearn-amp' ); ?>"></amp-img>
				</div>
			</div>
		</div>
	</section>

	<section id="audience" class="sl-section">
		<div class="sl-wrap">
			<span class="sl-eyebrow sl-home-sub-heading"><?php esc_html_e( 'Role-Relevant Learning', 'succeedlearn-amp' ); ?></span>
			<h2 class="sl-h2"><?php esc_html_e( 'Who Should Take Financial Crime Prevention Training?', 'succeedlearn-amp' ); ?></h2>
			<p><?php esc_html_e( 'Training may be relevant to employees who encounter compliance risks through customers, payments, vendors, third parties, confidential information, technology or business decisions.', 'succeedlearn-amp' ); ?></p>
			<?php $render_cards( $audience_cards ); ?>
		</div>
	</section>

	<section id="delivery" class="sl-section sl-section--alt">
		<div class="sl-wrap">
			<span class="sl-eyebrow sl-home-sub-heading"><?php esc_html_e( 'Flexible Implementation', 'succeedlearn-amp' ); ?></span>
			<h2 class="sl-h2"><?php esc_html_e( 'Deliver Financial Crime Prevention Training Your Way', 'succeedlearn-amp' ); ?></h2>
			<p><?php esc_html_e( 'SucceedLEARN’s training can be delivered through a hosted learning platform or supplied as SCORM-compatible eLearning for an organisation’s existing LMS.', 'succeedlearn-amp' ); ?></p>
			<?php $render_cards( $delivery_cards ); ?>
		</div>
	</section>

	<section id="faqs" class="sl-section">
		<div class="sl-wrap">
			<span class="sl-eyebrow sl-home-sub-heading"><?php esc_html_e( 'Financial Crime Prevention FAQs', 'succeedlearn-amp' ); ?></span>
			<h2 class="sl-h2"><?php esc_html_e( 'Frequently Asked Questions', 'succeedlearn-amp' ); ?></h2>
			<?php
			if ( function_exists( 'succeedlearn_amp_render_faq_accordion' ) ) {
				succeedlearn_amp_render_faq_accordion( $faq_items );
			}
			?>
		</div>
	</section>

	<section id="contact" class="sl-section sl-section--alt" aria-labelledby="fcp-contact-title">
		<div class="sl-wrap sl-contact-layout">
			<div class="sl-contact-intro">
				<span class="sl-eyebrow sl-home-sub-heading"><?php esc_html_e( 'Your Next Step', 'succeedlearn-amp' ); ?></span>
				<h2 id="fcp-contact-title" class="sl-h2"><?php esc_html_e( 'Request a Financial Crime Prevention demo', 'succeedlearn-amp' ); ?></h2>
				<p><?php esc_html_e( 'Tell us about your Financial Crime Prevention training needs, delivery preferences and any customisation.', 'succeedlearn-amp' ); ?></p>
			</div>
			<div class="sl-contact-form-card">
				<?php
				if ( function_exists( 'succeedlearn_amp_render_contact_form' ) ) {
					succeedlearn_amp_render_contact_form(
						array(
							'form_page'     => $page_title,
							'form_page_url' => $canonical,
							'form_variant'  => 'course',
							'title'         => __( 'FCP Suite Enquiry', 'succeedlearn-amp' ),
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
