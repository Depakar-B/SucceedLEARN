<?php
/**
 * SucceedLEARN AMP: Preventing Facilitation of Tax Evasion.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$canonical = home_url( '/tax-evasion-facilitation/' );
$page_obj  = get_page_by_path( 'tax-evasion-facilitation' );
if ( $page_obj instanceof WP_Post ) {
	$link = get_permalink( $page_obj );
	if ( $link ) {
		$canonical = $link;
	}
}

$page_title = __( 'Preventing the Facilitation of Tax Evasion Training', 'succeedlearn-amp' );
$meta_desc  = __( 'UK-focused eLearning covering the Criminal Finances Act 2017, tax evasion facilitation risks, risk assessment, due diligence, reporting and monitoring.', 'succeedlearn-amp' );

$hero_image         = succeedlearn_amp_upload_url( '2026/10/tax_evasion_prevention_global.webp' );
$individual_image   = succeedlearn_amp_upload_url( '2026/09/Image-1-AML.webp' );
$organisation_image = succeedlearn_amp_upload_url( '2026/09/organisation-image-1.webp' );
$cfa_image          = succeedlearn_amp_upload_url( '2026/10/Tax-evasion-image.webp' );

$risk_cards = array(
	array(
		'num'   => '01 / REQUEST',
		'title' => __( 'Something looks unusual', 'succeedlearn-amp' ),
		'text'  => __( 'A payment, arrangement or instruction does not fit the expected pattern.', 'succeedlearn-amp' ),
	),
	array(
		'num'   => '02 / RECOGNISE',
		'title' => __( 'The learner questions it', 'succeedlearn-amp' ),
		'text'  => __( 'Awareness helps them recognise when further consideration may be needed.', 'succeedlearn-amp' ),
	),
	array(
		'num'   => '03 / RESPOND',
		'title' => __( 'They know what happens next', 'succeedlearn-amp' ),
		'text'  => __( 'Concerns are raised through the organisation’s appropriate reporting process.', 'succeedlearn-amp' ),
	),
);

$assessment_cards = array(
	array(
		'num'   => '01',
		'title' => __( 'Examine internal risks', 'succeedlearn-amp' ),
		'text'  => __( 'Consider where money, decisions and information move through the organisation.', 'succeedlearn-amp' ),
	),
	array(
		'num'   => '02',
		'title' => __( 'Examine external risks', 'succeedlearn-amp' ),
		'text'  => __( 'Consider jurisdictions, third parties, sectors and complex business relationships.', 'succeedlearn-amp' ),
	),
	array(
		'num'   => '03',
		'title' => __( 'Prioritise risks', 'succeedlearn-amp' ),
		'text'  => __( 'Consider likelihood and potential impact when deciding where attention is most needed.', 'succeedlearn-amp' ),
	),
);

$audience_cards = array(
	array( 'num' => '01', 'title' => __( 'Senior Management', 'succeedlearn-amp' ), 'text' => __( 'Leaders responsible for organisational tone, oversight, prevention frameworks and policy.', 'succeedlearn-amp' ) ),
	array( 'num' => '02', 'title' => __( 'Employees & Managers', 'succeedlearn-amp' ), 'text' => __( 'People who interact with clients, third parties or participate in business decisions.', 'succeedlearn-amp' ) ),
	array( 'num' => '03', 'title' => __( 'Finance & Accounts', 'succeedlearn-amp' ), 'text' => __( 'Professionals involved in financial transactions, payments, reporting and financial administration.', 'succeedlearn-amp' ) ),
	array( 'num' => '04', 'title' => __( 'Procurement & Vendor Teams', 'succeedlearn-amp' ), 'text' => __( 'People managing suppliers, contractors, procurement processes and vendor relationships.', 'succeedlearn-amp' ) ),
	array( 'num' => '05', 'title' => __( 'Compliance & Risk', 'succeedlearn-amp' ), 'text' => __( 'Professionals supporting regulatory compliance, risk frameworks, controls and monitoring.', 'succeedlearn-amp' ) ),
	array( 'num' => '06', 'title' => __( 'Legal & Audit', 'succeedlearn-amp' ), 'text' => __( 'Professionals supporting governance, legal oversight, investigations or assurance activities.', 'succeedlearn-amp' ) ),
	array( 'num' => '07', 'title' => __( 'Third-Party & Intermediary-Facing Roles', 'succeedlearn-amp' ), 'text' => __( 'Employees working with agents, suppliers, contractors, advisers or intermediaries.', 'succeedlearn-amp' ) ),
	array( 'num' => '08', 'title' => __( 'Financial Transaction Roles', 'succeedlearn-amp' ), 'text' => __( 'Individuals involved in payments, transactions, procurement, customer activity or vendor management.', 'succeedlearn-amp' ) ),
	array( 'num' => '09', 'title' => __( 'Other Risk-Exposed Roles', 'succeedlearn-amp' ), 'text' => __( 'Anyone whose responsibilities could expose the organisation or individual to tax compliance or facilitation risk.', 'succeedlearn-amp' ) ),
);

$course_images = array(
	array(
		'src' => succeedlearn_amp_upload_url( '2026/10/image.webp' ),
		'alt' => __( 'Tax evasion risk shown across the floors of an organisation', 'succeedlearn-amp' ),
	),
	array(
		'src' => succeedlearn_amp_upload_url( '2026/10/Image-4_Tax-Evasion.webp' ),
		'alt' => __( 'A hand pointing at unreported figures beside income and expenses', 'succeedlearn-amp' ),
	),
	array(
		'src' => succeedlearn_amp_upload_url( '2026/10/Image-3_Tax-Evasion.webp' ),
		'alt' => __( 'A facilitator inflating a sale while serving a tax evader', 'succeedlearn-amp' ),
	),
	array(
		'src' => succeedlearn_amp_upload_url( '2026/10/Image-2_Tax-Evasion.webp' ),
		'alt' => __( 'A learner sorting a statement into evasion or not evasion', 'succeedlearn-amp' ),
	),
);

$faq_items = array(
	array( 'question' => __( 'What is tax evasion?', 'succeedlearn-amp' ), 'answer' => __( 'Tax evasion is the deliberate and dishonest avoidance of tax that is legally due.', 'succeedlearn-amp' ) ),
	array( 'question' => __( 'What is the facilitation of tax evasion?', 'succeedlearn-amp' ), 'answer' => __( 'Criminal facilitation occurs when another person deliberately and dishonestly helps someone commit tax evasion.', 'succeedlearn-amp' ) ),
	array( 'question' => __( 'What is Preventing the Facilitation of Tax Evasion training?', 'succeedlearn-amp' ), 'answer' => __( 'It is UK-focused eLearning that helps learners understand tax evasion, the Criminal Finances Act 2017, risk assessment, due diligence, associated persons, reporting and monitoring.', 'succeedlearn-amp' ) ),
	array( 'question' => __( 'What does the Criminal Finances Act 2017 mean for organisations?', 'succeedlearn-amp' ), 'answer' => __( 'Part 3 of the Criminal Finances Act 2017 introduced corporate offences relating to failure to prevent the criminal facilitation of tax evasion.', 'succeedlearn-amp' ) ),
	array( 'question' => __( 'Who should take Preventing Facilitation of Tax Evasion training?', 'succeedlearn-amp' ), 'answer' => __( 'The course is relevant to senior management, employees and managers, finance and accounts teams, procurement and vendor teams, compliance and risk professionals, legal and audit teams, people working with third parties or intermediaries, and other roles exposed to tax compliance risk.', 'succeedlearn-amp' ) ),
	array( 'question' => __( 'How long is the course?', 'succeedlearn-amp' ), 'answer' => __( 'The course duration is 30 minutes.', 'succeedlearn-amp' ) ),
	array( 'question' => __( 'Is the Preventing Facilitation of Tax Evasion course CPD-certified?', 'succeedlearn-amp' ), 'answer' => __( 'Yes. The course is CPD-certified.', 'succeedlearn-amp' ) ),
);

$suite = array(
	array( 'num' => '01', 'title' => __( 'Anti-Money Laundering (AML)', 'succeedlearn-amp' ), 'text' => __( 'Build awareness of money laundering risks, suspicious activity, customer due diligence, warning signs and appropriate escalation.', 'succeedlearn-amp' ), 'slug' => 'aml-pe-vc' ),
	array( 'num' => '02', 'title' => __( 'Anti-Bribery and Anti-Corruption (ABAC)', 'succeedlearn-amp' ), 'text' => __( 'Help employees recognise bribery and corruption risks involving gifts, hospitality, conflicts, third parties and improper influence.', 'succeedlearn-amp' ), 'slug' => 'anti-bribery-anti-corruption' ),
	array( 'num' => '03', 'title' => __( 'Preventing Facilitation of Tax Evasion', 'succeedlearn-amp' ), 'text' => __( 'Help employees recognise tax-evasion facilitation risks, suspicious conduct and situations requiring appropriate prevention or escalation.', 'succeedlearn-amp' ), 'slug' => 'tax-evasion-facilitation', 'current' => true ),
	array( 'num' => '04', 'title' => __( 'Insider Trading', 'succeedlearn-amp' ), 'text' => __( 'Build awareness around inside information, confidential information, improper disclosure and responsible handling of market-sensitive data.', 'succeedlearn-amp' ), 'slug' => 'insider-trading' ),
	array( 'num' => '05', 'title' => __( 'Trade Compliance and Sanctions', 'succeedlearn-amp' ), 'text' => __( 'Help employees understand sanctions, restricted parties, high-risk jurisdictions, export controls and cross-border transaction risks.', 'succeedlearn-amp' ), 'slug' => 'trade-compliance-and-sanctions' ),
	array( 'num' => '06', 'title' => __( 'Failure to Prevent Fraud', 'succeedlearn-amp' ), 'text' => __( 'Develop awareness of fraud risks, associated-person risk, warning signs, preventive actions and reporting responsibilities.', 'succeedlearn-amp' ), 'slug' => 'failure-to-prevent-fraud' ),
	array( 'num' => '07', 'title' => __( 'Modern Slavery Awareness', 'succeedlearn-amp' ), 'text' => __( 'Build employee awareness of modern slavery risks and potential concerns within business activities and supply-chain relationships.', 'succeedlearn-amp' ), 'slug' => 'modern-slavery-awareness' ),
	array( 'num' => '08', 'title' => __( 'Responsible Use of AI', 'succeedlearn-amp' ), 'text' => __( 'Help employees understand responsible workplace use of AI and the importance of applying organisational controls when using AI tools.', 'succeedlearn-amp' ), 'slug' => 'responsible-use-of-gen-ai' ),
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
		'tax_evasion',
		array( 'home-page' ),
		array( 'home-sections', 'contact-form', 'global-course-suite', 'global-sub-heading', 'anti-bribery', 'modern-slavery' )
	);
	?>
	.sl-msa-page .sl-tax-media-grid{display:grid;grid-template-columns:minmax(0,1fr);gap:12px;margin:20px 0 0}
	.sl-msa-page .sl-tax-media-card{margin:0;padding:0;border:1px solid rgba(22,35,78,.1);border-radius:12px;overflow:hidden;background:var(--sl-page-white,#fff);box-shadow:0 6px 18px rgba(22,35,78,.04)}
	.sl-msa-page .sl-tax-media-card .sl-aml-image{max-width:none;border:0;border-radius:0}
	@media(min-width:768px){
		.sl-msa-page .sl-tax-media-grid{grid-template-columns:repeat(2,minmax(0,1fr));gap:16px}
		.sl-msa-page .sl-tax-media-grid>.sl-tax-media-card:last-child:nth-child(odd){grid-column:1/-1;justify-self:center;width:100%;max-width:calc((100% - 16px) / 2)}
	}
	</style>
	<?php succeedlearn_amp_output_components( 'tax_evasion', array( 'amp-form', 'amp-mustache', 'amp-sidebar', 'amp-accordion', 'amp-bind', 'amp-lightbox' ) ); ?>
</head>
<body class="sl-home sl-anti-bribery-page sl-msa-page sl-tax-evasion-page">
<?php include SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'components/menu.php'; ?>
<main id="main-content">
	<section id="course-hero" class="sl-section sl-aml-pe-vc-hero" aria-labelledby="sl-tax-evasion-hero-title">
		<div class="sl-wrap">
			<span class="sl-eyebrow sl-home-sub-heading"><?php esc_html_e( 'Preventing Facilitation of Tax Evasion Compliance Training', 'succeedlearn-amp' ); ?></span>
			<h1 id="sl-tax-evasion-hero-title"><?php esc_html_e( 'Preventing the Facilitation of', 'succeedlearn-amp' ); ?> <span><?php esc_html_e( 'Tax Evasion Training', 'succeedlearn-amp' ); ?></span></h1>
			<p class="sl-aml-lead"><?php esc_html_e( 'SucceedLEARN’s Preventing the Facilitation of Tax Evasion training helps senior leaders and relevant employees understand the Criminal Finances Act 2017, recognise tax evasion facilitation risks and understand how those risks can be identified, prevented and reported.', 'succeedlearn-amp' ); ?></p>
			<p><?php esc_html_e( 'Learners explore tax evasion, risk assessment, due diligence, policy development, communication and training, internal reporting, and ongoing monitoring and review.', 'succeedlearn-amp' ); ?></p>
			<ul class="sl-aml-tags" role="list">
				<li><?php esc_html_e( 'CPD-Certified', 'succeedlearn-amp' ); ?></li>
				<li><?php esc_html_e( '30-Minute eLearning', 'succeedlearn-amp' ); ?></li>
				<li><?php esc_html_e( 'Knowledge Checks', 'succeedlearn-amp' ); ?></li>
				<li><?php esc_html_e( 'Assessment Included', 'succeedlearn-amp' ); ?></li>
			</ul>
			<div class="sl-hero-actions sl-aml-hero__actions">
				<div class="sl-aml-hero__cta-item">
					<span class="sl-aml-hero__cta-label"><?php esc_html_e( 'Individual', 'succeedlearn-amp' ); ?></span>
					<button type="button" class="sl-hero-btn sl-hero-btn-primary" <?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>><?php esc_html_e( 'Buy Now @ $18', 'succeedlearn-amp' ); ?> <span aria-hidden="true">→</span></button>
				</div>
				<div class="sl-aml-hero__cta-item">
					<span class="sl-aml-hero__cta-label"><?php esc_html_e( 'Organisation', 'succeedlearn-amp' ); ?></span>
					<button type="button" class="sl-hero-btn sl-hero-btn-secondary" <?php echo succeedlearn_amp_scroll_tap_attr( 'organisations' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>><?php esc_html_e( 'Explore More', 'succeedlearn-amp' ); ?></button>
				</div>
			</div>
			<div class="sl-aml-media sl-aml-after">
				<div class="sl-aml-image sl-aml-image--wide">
					<amp-img src="<?php echo esc_url( $hero_image ); ?>" width="1600" height="1066" layout="responsive" alt="<?php esc_attr_e( 'Tax evasion prevention with shield, tax documents and global finance symbols', 'succeedlearn-amp' ); ?>"></amp-img>
				</div>
			</div>
		</div>
	</section>

	<section id="individuals" class="sl-section sl-section--alt">
		<div class="sl-wrap">
			<span class="sl-eyebrow sl-home-sub-heading"><?php esc_html_e( 'Individual Tax Evasion Prevention eLearning', 'succeedlearn-amp' ); ?></span>
			<h2 class="sl-h2"><?php esc_html_e( 'Tax Evasion Prevention Training', 'succeedlearn-amp' ); ?> <span><?php esc_html_e( 'For Individuals', 'succeedlearn-amp' ); ?></span> <?php esc_html_e( '- Start Immediately', 'succeedlearn-amp' ); ?></h2>
			<p class="sl-aml-lead"><?php esc_html_e( 'A focused learning experience for professionals who want practical Tax Evasion Prevention awareness without a lengthy training commitment.', 'succeedlearn-amp' ); ?></p>
			<ul class="sl-aml-feature-list" role="list">
				<li class="sl-aml-feature-list__item"><span class="sl-aml-number">01</span><div><strong><?php esc_html_e( 'Interactive eLearning', 'succeedlearn-amp' ); ?></strong><span><?php esc_html_e( 'Practical digital learning supported by Tax Evasion Prevention scenarios and knowledge checks.', 'succeedlearn-amp' ); ?></span></div></li>
				<li class="sl-aml-feature-list__item"><span class="sl-aml-number">02</span><div><strong><?php esc_html_e( '30-minute duration', 'succeedlearn-amp' ); ?></strong><span><?php esc_html_e( 'Complete the core Tax Evasion Prevention learning at your own pace.', 'succeedlearn-amp' ); ?></span></div></li>
				<li class="sl-aml-feature-list__item"><span class="sl-aml-number">03</span><div><strong><?php esc_html_e( 'Instant access', 'succeedlearn-amp' ); ?></strong><span><?php esc_html_e( 'Start learning immediately after purchase.', 'succeedlearn-amp' ); ?></span></div></li>
			</ul>
			<div class="sl-content-actions">
				<button type="button" class="sl-content-btn sl-content-btn-primary" <?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>><?php esc_html_e( 'Buy Now @ $18', 'succeedlearn-amp' ); ?></button>
				<button type="button" class="sl-content-btn sl-content-btn-secondary" <?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>><?php esc_html_e( 'Request Demo', 'succeedlearn-amp' ); ?></button>
			</div>
			<div class="sl-aml-media sl-aml-after"><div class="sl-aml-image"><amp-img src="<?php echo esc_url( $individual_image ); ?>" width="1200" height="900" layout="responsive" alt="<?php esc_attr_e( 'Individual Tax Evasion Prevention course preview', 'succeedlearn-amp' ); ?>"></amp-img></div></div>
		</div>
	</section>

	<section id="organisations" class="sl-section">
		<div class="sl-wrap">
			<span class="sl-eyebrow sl-home-sub-heading"><?php esc_html_e( 'Enterprise Tax Evasion Prevention eLearning', 'succeedlearn-amp' ); ?></span>
			<h2 class="sl-h2"><?php esc_html_e( 'Tax Evasion Prevention Training', 'succeedlearn-amp' ); ?> <span><?php esc_html_e( 'For Organisations', 'succeedlearn-amp' ); ?></span> <?php esc_html_e( '- Built for Scale', 'succeedlearn-amp' ); ?></h2>
			<p><?php esc_html_e( 'Deliver Tax Evasion Prevention awareness across teams while giving administrators the controls needed to assign training, monitor completion and manage recurring compliance activity.', 'succeedlearn-amp' ); ?></p>
			<ul class="sl-aml-feature-list" role="list">
				<li class="sl-aml-feature-list__item"><span class="sl-aml-number">01</span><div><strong><?php esc_html_e( 'Reporting and tracking', 'succeedlearn-amp' ); ?></strong><span><?php esc_html_e( 'Monitor learner progress, completion and training status.', 'succeedlearn-amp' ); ?></span></div></li>
				<li class="sl-aml-feature-list__item"><span class="sl-aml-number">02</span><div><strong><?php esc_html_e( 'Automatic reminders', 'succeedlearn-amp' ); ?></strong><span><?php esc_html_e( 'Support completion with automated learner reminders.', 'succeedlearn-amp' ); ?></span></div></li>
				<li class="sl-aml-feature-list__item"><span class="sl-aml-number">03</span><div><strong><?php esc_html_e( 'SCORM or SaaS delivery', 'succeedlearn-amp' ); ?></strong><span><?php esc_html_e( 'Deploy through your LMS or use the SucceedLEARN platform.', 'succeedlearn-amp' ); ?></span></div></li>
				<li class="sl-aml-feature-list__item"><span class="sl-aml-number">04</span><div><strong><?php esc_html_e( 'Group assignment', 'succeedlearn-amp' ); ?></strong><span><?php esc_html_e( 'Assign Tax Evasion Prevention training to selected teams or learner groups.', 'succeedlearn-amp' ); ?></span></div></li>
				<li class="sl-aml-feature-list__item"><span class="sl-aml-number">05</span><div><strong><?php esc_html_e( 'Completion visibility', 'succeedlearn-amp' ); ?></strong><span><?php esc_html_e( 'Give administrators clear oversight of learner activity.', 'succeedlearn-amp' ); ?></span></div></li>
			</ul>
			<div class="sl-content-actions">
				<button type="button" class="sl-content-btn sl-content-btn-primary" <?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>><?php esc_html_e( 'Request Demo', 'succeedlearn-amp' ); ?></button>
				<button type="button" class="sl-content-btn sl-content-btn-secondary" <?php echo succeedlearn_amp_scroll_tap_attr( 'fcp-suite' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>><?php esc_html_e( 'Explore More', 'succeedlearn-amp' ); ?></button>
			</div>
			<div class="sl-aml-media sl-aml-after"><div class="sl-aml-image"><amp-img src="<?php echo esc_url( $organisation_image ); ?>" width="1200" height="900" layout="responsive" alt="<?php esc_attr_e( 'Organisational Training Dashboard', 'succeedlearn-amp' ); ?>"></amp-img></div></div>
		</div>
	</section>

	<section id="fcp-suite" class="sl-section sl-section--alt sl-course-suite sl-course-suite--fcp" aria-labelledby="sl-fcp-course-suite-title">
		<div class="sl-wrap">
			<div class="sl-course-suite__header">
				<div class="sl-course-suite__intro">
					<span class="sl-eyebrow sl-home-sub-heading"><?php esc_html_e( 'Financial Crime Prevention Suite', 'succeedlearn-amp' ); ?></span>
					<h2 id="sl-fcp-course-suite-title" class="sl-h2"><?php esc_html_e( 'Explore Our eLearning Compliance Courses', 'succeedlearn-amp' ); ?></h2>
					<p><?php esc_html_e( 'Build employee awareness across financial crime, ethical conduct and emerging compliance risks with practical, role-relevant eLearning.', 'succeedlearn-amp' ); ?></p>
				</div>
				<div class="sl-content-actions sl-course-suite__header-cta">
					<a class="sl-content-btn sl-content-btn-primary" href="#contact"><?php esc_html_e( 'Grab the whole suite for $1.5 per user per month', 'succeedlearn-amp' ); ?></a>
				</div>
			</div>
			<div class="sl-course-suite__grid">
				<?php foreach ( $suite as $course ) : ?>
					<?php
					$is_current = ! empty( $course['current'] );
					$href       = $is_current ? '#contact' : succeedlearn_amp_course_suite_page_url( $course['slug'], '#contact' );
					?>
					<a class="sl-course-suite__tile<?php echo $is_current ? ' is-active' : ''; ?>" href="<?php echo esc_url( $href ); ?>">
						<div class="sl-course-suite__chrome">
							<span class="sl-course-suite__dash" aria-hidden="true">→</span>
							<span class="sl-course-suite__num" aria-hidden="true"><?php echo esc_html( $course['num'] ); ?></span>
						</div>
						<h3 class="sl-panel-title"><?php echo esc_html( $course['title'] ); ?></h3>
						<p><?php echo esc_html( $course['text'] ); ?></p>
						<span class="sl-course-suite__cta"><?php echo esc_html( $is_current ? __( 'Buy This Course', 'succeedlearn-amp' ) : __( 'Explore More', 'succeedlearn-amp' ) ); ?> <span aria-hidden="true">→</span></span>
					</a>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section id="tax-evasion-risk" class="sl-section">
		<div class="sl-wrap">
			<span class="sl-eyebrow sl-home-sub-heading"><?php esc_html_e( 'Reporting Tax Evasion', 'succeedlearn-amp' ); ?></span>
			<h2 class="sl-h2"><?php esc_html_e( 'Preventing Tax Evasion Risk at Work - Would they know when to', 'succeedlearn-amp' ); ?> <span><?php esc_html_e( 'stop?', 'succeedlearn-amp' ); ?></span></h2>
			<p><?php esc_html_e( 'Tax evasion facilitation risk does not always arrive clearly labelled as a compliance issue. It may begin with a client request, an unusual transaction, a complex arrangement or a third-party relationship that deserves closer scrutiny.', 'succeedlearn-amp' ); ?></p>
			<?php $render_cards( $risk_cards ); ?>
		</div>
	</section>

	<section id="criminal-finances-act" class="sl-section sl-section--alt">
		<div class="sl-wrap">
			<span class="sl-eyebrow sl-home-sub-heading"><?php esc_html_e( 'Criminal Finances Act 2017', 'succeedlearn-amp' ); ?></span>
			<h2 class="sl-h2"><?php esc_html_e( 'What Is the Facilitation of Tax Evasion Under the', 'succeedlearn-amp' ); ?> <span><?php esc_html_e( 'Criminal Finances Act 2017?', 'succeedlearn-amp' ); ?></span></h2>
			<p><?php esc_html_e( 'Criminal facilitation occurs when another person deliberately and dishonestly assists someone in committing tax evasion.', 'succeedlearn-amp' ); ?></p>
			<p><?php esc_html_e( 'The Criminal Finances Act 2017 introduced corporate offences relating to organisations that fail to prevent people acting for or on their behalf from criminally facilitating tax evasion.', 'succeedlearn-amp' ); ?></p>
			<p><?php esc_html_e( 'This makes awareness particularly important where employees or other associated persons deal with financial activity, customers, suppliers, intermediaries or complex business relationships.', 'succeedlearn-amp' ); ?></p>
			<div class="sl-aml-media sl-aml-after">
				<div class="sl-aml-image">
					<amp-img src="<?php echo esc_url( $cfa_image ); ?>" width="1200" height="800" layout="responsive" alt="<?php esc_attr_e( 'Criminal Finances Act 2017 beside scales, coins and cash', 'succeedlearn-amp' ); ?>"></amp-img>
				</div>
			</div>
		</div>
	</section>

	<section id="risk-assessment" class="sl-section">
		<div class="sl-wrap">
			<span class="sl-eyebrow sl-home-sub-heading"><?php esc_html_e( 'Tax Evasion Risk Assessment', 'succeedlearn-amp' ); ?></span>
			<h2 class="sl-h2"><?php esc_html_e( 'How Can Organisations Identify and Prioritise Tax Evasion', 'succeedlearn-amp' ); ?> <span><?php esc_html_e( 'Facilitation Risk?', 'succeedlearn-amp' ); ?></span></h2>
			<p><?php esc_html_e( 'The course explores how organisations can examine their operating environment, financial processes, customers, jurisdictions, supply chains and third-party relationships when considering potential tax evasion facilitation risk.', 'succeedlearn-amp' ); ?></p>
			<?php $render_cards( $assessment_cards ); ?>
		</div>
	</section>

	<section id="training-audience" class="sl-section sl-section--alt">
		<div class="sl-wrap">
			<span class="sl-eyebrow sl-home-sub-heading"><?php esc_html_e( 'Preventing Facilitation of Tax Evasion Training Audience', 'succeedlearn-amp' ); ?></span>
			<h2 class="sl-h2"><?php esc_html_e( 'Who should take tax evasion prevention', 'succeedlearn-amp' ); ?> <span><?php esc_html_e( 'training', 'succeedlearn-amp' ); ?></span></h2>
			<p><?php esc_html_e( 'The course is relevant to people whose responsibilities involve leadership, financial activity, business decisions, third-party relationships or tax compliance risks.', 'succeedlearn-amp' ); ?></p>
			<?php $render_cards( $audience_cards ); ?>
		</div>
	</section>

	<section id="interactive-learning" class="sl-section">
		<div class="sl-wrap">
			<span class="sl-eyebrow sl-home-sub-heading"><?php esc_html_e( 'Interactive Tax Evasion eLearning', 'succeedlearn-amp' ); ?></span>
			<h2 class="sl-h2"><?php esc_html_e( 'How does SucceedLEARN support Anti-Tax Evasion', 'succeedlearn-amp' ); ?> <span><?php esc_html_e( 'Training?', 'succeedlearn-amp' ); ?></span></h2>
			<p><?php esc_html_e( 'Learners interact with questions, scenarios and assessment activities designed to reinforce understanding as they progress through the course.', 'succeedlearn-amp' ); ?></p>
			<p><?php esc_html_e( 'The supplied course content includes scenario-based learning around risk assessment and due diligence, helping learners consider how they would respond in different circumstances.', 'succeedlearn-amp' ); ?></p>
			<div class="sl-tax-media-grid">
				<?php foreach ( $course_images as $image ) : ?>
					<article class="sl-tax-media-card">
						<div class="sl-aml-image">
							<amp-img src="<?php echo esc_url( $image['src'] ); ?>" width="820" height="420" layout="responsive" alt="<?php echo esc_attr( $image['alt'] ); ?>"></amp-img>
						</div>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section id="faqs" class="sl-section sl-section--alt">
		<div class="sl-wrap">
			<span class="sl-eyebrow sl-home-sub-heading"><?php esc_html_e( 'Preventing Facilitation of Tax Evasion FAQs', 'succeedlearn-amp' ); ?></span>
			<h2 class="sl-h2"><?php esc_html_e( 'Frequently Asked Questions About Preventing Facilitation of Tax Evasion', 'succeedlearn-amp' ); ?> <span><?php esc_html_e( 'Training', 'succeedlearn-amp' ); ?></span></h2>
			<?php
			if ( function_exists( 'succeedlearn_amp_render_faq_accordion' ) ) {
				succeedlearn_amp_render_faq_accordion( $faq_items );
			}
			?>
		</div>
	</section>

	<section id="contact" class="sl-section" aria-labelledby="tax-evasion-contact-title">
		<div class="sl-wrap sl-contact-layout">
			<div class="sl-contact-intro">
				<span class="sl-eyebrow sl-home-sub-heading"><?php esc_html_e( 'Your Next Step', 'succeedlearn-amp' ); ?></span>
				<h2 id="tax-evasion-contact-title" class="sl-h2"><?php esc_html_e( 'Buy Preventing Facilitation of Tax Evasion training', 'succeedlearn-amp' ); ?></h2>
				<p><?php esc_html_e( 'Tell us about your tax evasion prevention training needs, delivery and any customisation.', 'succeedlearn-amp' ); ?></p>
			</div>
			<div class="sl-contact-form-card">
				<?php
				if ( function_exists( 'succeedlearn_amp_render_contact_form' ) ) {
					succeedlearn_amp_render_contact_form(
						array(
							'form_page'     => $page_title,
							'form_page_url' => $canonical,
							'form_variant'  => 'course',
							'title'         => __( 'Tax Evasion Course Enquiry', 'succeedlearn-amp' ),
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
