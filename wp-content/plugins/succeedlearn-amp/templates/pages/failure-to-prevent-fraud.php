<?php
/**
 * SucceedLEARN AMP: Failure to Prevent Fraud.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$canonical = home_url( '/failure-to-prevent-fraud/' );
foreach ( array( 'failure-to-prevent-fraud', 'failur-to-prevent-fraud' ) as $slug ) {
	$page_obj = get_page_by_path( $slug );
	if ( $page_obj instanceof WP_Post ) {
		$link = get_permalink( $page_obj );
		if ( $link ) {
			$canonical = $link;
			break;
		}
	}
}

$page_title = __( 'Failure to Prevent Fraud Training', 'succeedlearn-amp' );
$meta_desc  = __( 'Scenario-led eLearning covering the Failure to Prevent Fraud offence, associated-person risk, fraud warning signs, reporting and individual responsibilities.', 'succeedlearn-amp' );
$hero_image = succeedlearn_amp_upload_url( '2026/10/suspicious_payment_invoice_review.webp' );
$individual_image   = succeedlearn_amp_upload_url( '2026/09/Image-1-AML.webp' );
$organisation_image = succeedlearn_amp_upload_url( '2026/09/organisation-image-1.webp' );
$law_image          = succeedlearn_amp_upload_url( '2026/10/Prevent-Fraud_Image-2.webp' );
$why_image          = succeedlearn_amp_upload_url( '2026/10/prevent-fraud_Image-3.webp' );

$law_cards = array(
	array( 'num' => '01', 'title' => __( 'Corporate liability can arise', 'succeedlearn-amp' ), 'text' => __( 'A large organisation can face criminal liability where an associated person commits a specified fraud offence intending to benefit the organisation and the organisation did not have reasonable fraud-prevention procedures in place.', 'succeedlearn-amp' ) ),
	array( 'num' => '02', 'title' => __( 'Associated persons matter', 'succeedlearn-amp' ), 'text' => __( 'Fraud risk is not limited to the actions of directors or senior management. Employees, agents and others providing services for or on behalf of an organisation can be relevant to the offence.', 'succeedlearn-amp' ) ),
	array( 'num' => '03', 'title' => __( 'Awareness supports stronger controls', 'succeedlearn-amp' ), 'text' => __( 'Government guidance identifies communication, including training, as one of the principles supporting reasonable fraud-prevention procedures, alongside areas such as risk assessment, due diligence and monitoring.', 'succeedlearn-amp' ) ),
);
$reasons = array(
	array( 'num' => '01', 'title' => __( 'Employees influence the information the organisation relies on', 'succeedlearn-amp' ), 'text' => __( 'Financial figures, investor communications, external reports and supplier information can all create risk when facts are inaccurate, incomplete or misleading.', 'succeedlearn-amp' ) ),
	array( 'num' => '02', 'title' => __( 'Pressure can change behaviour', 'succeedlearn-amp' ), 'text' => __( 'Commercial targets, fundraising pressure and tight deadlines can increase the importance of employees knowing when information needs to be checked or challenged.', 'succeedlearn-amp' ) ),
	array( 'num' => '03', 'title' => __( 'Small warning signs can be easy to overlook', 'succeedlearn-amp' ), 'text' => __( 'Employees need to recognise inconsistencies, weak audit trails, unusual behaviour and resistance to reasonable questions.', 'succeedlearn-amp' ) ),
	array( 'num' => '04', 'title' => __( 'Early escalation matters', 'succeedlearn-amp' ), 'text' => __( 'Employees should understand that a concern does not need to be proven fraud before it is raised through the appropriate internal channel.', 'succeedlearn-amp' ) ),
);
$warning_signs = array(
	array( 'num' => '01', 'title' => __( 'Incomplete or inconsistent information', 'succeedlearn-amp' ), 'text' => __( 'Figures, explanations or supporting information do not align, or change without a clear reason.', 'succeedlearn-amp' ) ),
	array( 'num' => '02', 'title' => __( 'Over-reliance on a single source', 'succeedlearn-amp' ), 'text' => __( 'Important decisions or communications depend on information that has not been independently corroborated.', 'succeedlearn-amp' ) ),
	array( 'num' => '03', 'title' => __( 'Lack of transparency or resistance to questions', 'succeedlearn-amp' ), 'text' => __( 'Someone avoids reasonable scrutiny, becomes defensive or discourages further review.', 'succeedlearn-amp' ) ),
	array( 'num' => '04', 'title' => __( 'Unethical or suspicious behaviour', 'succeedlearn-amp' ), 'text' => __( 'Conduct appears inconsistent with expected standards, processes or organisational values.', 'succeedlearn-amp' ) ),
	array( 'num' => '05', 'title' => __( 'Missing documentation or weak audit trails', 'succeedlearn-amp' ), 'text' => __( 'Important decisions, adjustments or transactions lack appropriate records or supporting documentation.', 'succeedlearn-amp' ) ),
	array( 'num' => '06', 'title' => __( 'Uncertainty about whether something is right', 'succeedlearn-amp' ), 'text' => __( 'Information, instructions or behaviour feels unusual, unclear or inconsistent with normal expectations.', 'succeedlearn-amp' ) ),
);
$faq_items = array(
	array( 'question' => __( 'What is the Failure to Prevent Fraud offence?', 'succeedlearn-amp' ), 'answer' => __( 'The Economic Crime and Corporate Transparency Act 2023 created a corporate Failure to Prevent Fraud offence. It can apply to large organisations where an associated person commits a specified fraud offence intending to benefit the organisation and reasonable fraud-prevention procedures were not in place.', 'succeedlearn-amp' ) ),
	array( 'question' => __( 'When did the offence come into force?', 'succeedlearn-amp' ), 'answer' => __( 'The Failure to Prevent Fraud offence came into force on 1 September 2025.', 'succeedlearn-amp' ) ),
	array( 'question' => __( 'Why does employee training matter?', 'succeedlearn-amp' ), 'answer' => __( 'Employees can influence information, financial records, reporting and commercial decisions. Government guidance on reasonable fraud-prevention procedures includes communication, including training, among its six principles.', 'succeedlearn-amp' ) ),
	array( 'question' => __( 'Who is this course relevant for?', 'succeedlearn-amp' ), 'answer' => __( 'Fraud prevention is relevant throughout an organisation. The course highlights Investment and Deal Teams, Finance and Fund Operations, external-reporting functions, Sales and Investor Relations, and Procurement and Third-Party Management as functions that should be particularly alert.', 'succeedlearn-amp' ) ),
	array( 'question' => __( 'What warning signs does the course cover?', 'succeedlearn-amp' ), 'answer' => __( 'Examples include incomplete or inconsistent information, reliance on one source, resistance to questions, suspicious behaviour, missing documentation, weak audit trails and uncertainty about whether an action is appropriate.', 'succeedlearn-amp' ) ),
	array( 'question' => __( 'What should an employee do if something feels unclear?', 'succeedlearn-amp' ), 'answer' => __( 'The course reinforces early escalation. Employees should not wait until fraud has been conclusively proven before raising an appropriate concern.', 'succeedlearn-amp' ) ),
);
$suite = array(
	array( 'num' => '01', 'title' => __( 'Anti-Money Laundering (AML)', 'succeedlearn-amp' ), 'text' => __( 'Build awareness of money laundering risks, suspicious activity, customer due diligence, warning signs and appropriate escalation.', 'succeedlearn-amp' ), 'slug' => 'aml-pe-vc' ),
	array( 'num' => '02', 'title' => __( 'Anti-Bribery and Anti-Corruption (ABAC)', 'succeedlearn-amp' ), 'text' => __( 'Help employees recognise bribery and corruption risks involving gifts, hospitality, conflicts, third parties and improper influence.', 'succeedlearn-amp' ), 'slug' => 'anti-bribery-anti-corruption' ),
	array( 'num' => '03', 'title' => __( 'Preventing Facilitation of Tax Evasion', 'succeedlearn-amp' ), 'text' => __( 'Help employees recognise tax-evasion facilitation risks, suspicious conduct and situations requiring appropriate prevention or escalation.', 'succeedlearn-amp' ), 'slug' => 'tax-evasion-facilitation' ),
	array( 'num' => '04', 'title' => __( 'Insider Trading', 'succeedlearn-amp' ), 'text' => __( 'Build awareness around inside information, confidential information, improper disclosure and responsible handling of market-sensitive data.', 'succeedlearn-amp' ), 'slug' => 'insider-trading' ),
	array( 'num' => '05', 'title' => __( 'Trade Compliance and Sanctions', 'succeedlearn-amp' ), 'text' => __( 'Help employees understand sanctions, restricted parties, high-risk jurisdictions, export controls and cross-border transaction risks.', 'succeedlearn-amp' ), 'slug' => 'trade-compliance-and-sanctions' ),
	array( 'num' => '06', 'title' => __( 'Failure to Prevent Fraud', 'succeedlearn-amp' ), 'text' => __( 'Develop awareness of fraud risks, associated-person risk, warning signs, preventive actions and reporting responsibilities.', 'succeedlearn-amp' ), 'slug' => 'failure-to-prevent-fraud', 'current' => true ),
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
		'failure_to_prevent_fraud',
		array( 'home-page' ),
		array( 'home-sections', 'contact-form', 'global-course-suite', 'global-sub-heading', 'anti-bribery', 'modern-slavery' )
	);
	?>
	</style>
	<?php succeedlearn_amp_output_components( 'failure_to_prevent_fraud', array( 'amp-form', 'amp-mustache', 'amp-sidebar', 'amp-accordion', 'amp-bind', 'amp-lightbox' ) ); ?>
</head>
<body class="sl-home sl-anti-bribery-page sl-msa-page sl-ftpf-page">
<?php include SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'components/menu.php'; ?>
<main id="main-content">
	<section id="top" class="sl-section sl-aml-pe-vc-hero" aria-labelledby="ftpf-hero-title">
		<div class="sl-wrap">
			<span class="sl-eyebrow sl-home-sub-heading"><?php esc_html_e( 'Fraud Prevention Compliance eLearning', 'succeedlearn-amp' ); ?></span>
			<h1 id="ftpf-hero-title"><?php esc_html_e( 'Failure to Prevent', 'succeedlearn-amp' ); ?> <span><?php esc_html_e( 'Fraud Training', 'succeedlearn-amp' ); ?></span></h1>
			<p class="sl-aml-lead"><?php esc_html_e( 'Help employees understand fraud risk, recognise warning signs and know when something needs to be questioned or escalated.', 'succeedlearn-amp' ); ?></p>
			<p><?php esc_html_e( 'A practical eLearning course connecting the UK Failure to Prevent Fraud offence with the decisions employees make around information, reporting, investor communications and business processes.', 'succeedlearn-amp' ); ?></p>
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
					<amp-img src="<?php echo esc_url( $hero_image ); ?>" width="1600" height="1066" layout="responsive" alt="<?php esc_attr_e( 'Invoice review highlighting a suspicious payment', 'succeedlearn-amp' ); ?>"></amp-img>
				</div>
			</div>
		</div>
	</section>

	<section id="individuals" class="sl-section sl-section--alt">
		<div class="sl-wrap">
			<span class="sl-eyebrow sl-home-sub-heading"><?php esc_html_e( 'Individual Fraud Prevention eLearning', 'succeedlearn-amp' ); ?></span>
			<h2 class="sl-h2"><?php esc_html_e( 'Fraud Prevention Training', 'succeedlearn-amp' ); ?> <span><?php esc_html_e( 'For Individuals', 'succeedlearn-amp' ); ?></span> <?php esc_html_e( '- Start Immediately', 'succeedlearn-amp' ); ?></h2>
			<p class="sl-aml-lead"><?php esc_html_e( 'A focused learning experience for professionals who want practical Fraud Prevention awareness without a lengthy training commitment.', 'succeedlearn-amp' ); ?></p>
			<ul class="sl-aml-feature-list" role="list">
				<li class="sl-aml-feature-list__item"><span class="sl-aml-number">01</span><div><strong><?php esc_html_e( 'Interactive eLearning', 'succeedlearn-amp' ); ?></strong><span><?php esc_html_e( 'Practical digital learning supported by Fraud Prevention scenarios and knowledge checks.', 'succeedlearn-amp' ); ?></span></div></li>
				<li class="sl-aml-feature-list__item"><span class="sl-aml-number">02</span><div><strong><?php esc_html_e( '16-minute duration', 'succeedlearn-amp' ); ?></strong><span><?php esc_html_e( 'Complete the core Fraud Prevention learning at your own pace.', 'succeedlearn-amp' ); ?></span></div></li>
				<li class="sl-aml-feature-list__item"><span class="sl-aml-number">03</span><div><strong><?php esc_html_e( 'Instant access', 'succeedlearn-amp' ); ?></strong><span><?php esc_html_e( 'Start learning immediately after purchase.', 'succeedlearn-amp' ); ?></span></div></li>
			</ul>
			<div class="sl-content-actions">
				<button type="button" class="sl-content-btn sl-content-btn-primary" <?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>><?php esc_html_e( 'Buy Now @ $18', 'succeedlearn-amp' ); ?></button>
				<button type="button" class="sl-content-btn sl-content-btn-secondary" <?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>><?php esc_html_e( 'Request Demo', 'succeedlearn-amp' ); ?></button>
			</div>
			<div class="sl-aml-media sl-aml-after"><div class="sl-aml-image"><amp-img src="<?php echo esc_url( $individual_image ); ?>" width="1200" height="900" layout="responsive" alt="<?php esc_attr_e( 'Individual Fraud Prevention course preview', 'succeedlearn-amp' ); ?>"></amp-img></div></div>
		</div>
	</section>

	<section id="organisations" class="sl-section">
		<div class="sl-wrap">
			<span class="sl-eyebrow sl-home-sub-heading"><?php esc_html_e( 'Enterprise Fraud Prevention eLearning', 'succeedlearn-amp' ); ?></span>
			<h2 class="sl-h2"><?php esc_html_e( 'Fraud Prevention Training', 'succeedlearn-amp' ); ?> <span><?php esc_html_e( 'For Organisations', 'succeedlearn-amp' ); ?></span> <?php esc_html_e( '- Built for Scale', 'succeedlearn-amp' ); ?></h2>
			<p><?php esc_html_e( 'Deliver Fraud Prevention awareness across teams while giving administrators the controls needed to assign training, monitor completion and manage recurring compliance activity.', 'succeedlearn-amp' ); ?></p>
			<ul class="sl-aml-feature-list" role="list">
				<li class="sl-aml-feature-list__item"><span class="sl-aml-number">01</span><div><strong><?php esc_html_e( 'Reporting and tracking', 'succeedlearn-amp' ); ?></strong><span><?php esc_html_e( 'Monitor learner progress, completion and training status.', 'succeedlearn-amp' ); ?></span></div></li>
				<li class="sl-aml-feature-list__item"><span class="sl-aml-number">02</span><div><strong><?php esc_html_e( 'Automatic reminders', 'succeedlearn-amp' ); ?></strong><span><?php esc_html_e( 'Support completion with automated learner reminders.', 'succeedlearn-amp' ); ?></span></div></li>
				<li class="sl-aml-feature-list__item"><span class="sl-aml-number">03</span><div><strong><?php esc_html_e( 'SCORM or SaaS delivery', 'succeedlearn-amp' ); ?></strong><span><?php esc_html_e( 'Deploy through your LMS or use the SucceedLEARN platform.', 'succeedlearn-amp' ); ?></span></div></li>
				<li class="sl-aml-feature-list__item"><span class="sl-aml-number">04</span><div><strong><?php esc_html_e( 'Group assignment', 'succeedlearn-amp' ); ?></strong><span><?php esc_html_e( 'Assign Fraud Prevention training to selected teams or learner groups.', 'succeedlearn-amp' ); ?></span></div></li>
				<li class="sl-aml-feature-list__item"><span class="sl-aml-number">05</span><div><strong><?php esc_html_e( 'Completion visibility', 'succeedlearn-amp' ); ?></strong><span><?php esc_html_e( 'Give administrators clear oversight of learner activity.', 'succeedlearn-amp' ); ?></span></div></li>
			</ul>
			<div class="sl-content-actions">
				<button type="button" class="sl-content-btn sl-content-btn-primary" <?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>><?php esc_html_e( 'Request Demo', 'succeedlearn-amp' ); ?></button>
				<button type="button" class="sl-content-btn sl-content-btn-secondary" <?php echo succeedlearn_amp_scroll_tap_attr( 'fcp-suite' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>><?php esc_html_e( 'Explore More', 'succeedlearn-amp' ); ?></button>
			</div>
			<div class="sl-aml-media sl-aml-after"><div class="sl-aml-image"><amp-img src="<?php echo esc_url( $organisation_image ); ?>" width="1200" height="900" layout="responsive" alt="<?php esc_attr_e( 'Organisational Training Dashboard', 'succeedlearn-amp' ); ?>"></amp-img></div></div>
		</div>
	</section>

	<section id="fcp-suite" class="sl-section sl-course-suite sl-course-suite--fcp" aria-labelledby="sl-fcp-course-suite-title">
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
							<span class="sl-course-suite__dash" aria-hidden="true"></span>
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

	<section id="why-it-matters" class="sl-section sl-section--alt">
		<div class="sl-wrap">
			<span class="sl-eyebrow sl-home-sub-heading"><?php esc_html_e( 'Why This Training Matters', 'succeedlearn-amp' ); ?></span>
			<h2 class="sl-h2"><?php esc_html_e( 'Failure to Prevent Fraud', 'succeedlearn-amp' ); ?> <span><?php esc_html_e( '— the regulatory landscape has changed', 'succeedlearn-amp' ); ?></span></h2>
			<p><?php esc_html_e( 'The Economic Crime and Corporate Transparency Act 2023 introduced a corporate offence of Failure to Prevent Fraud.', 'succeedlearn-amp' ); ?></p>
			<p class="sl-aml-lead"><?php esc_html_e( 'The offence came into force on 1 September 2025.', 'succeedlearn-amp' ); ?></p>
			<p><?php esc_html_e( 'For organisations within scope, understanding how fraud can arise through employees, agents and other associated persons is now an important part of managing corporate fraud risk.', 'succeedlearn-amp' ); ?></p>
			<?php $render_cards( $law_cards ); ?>
			<div class="sl-aml-media sl-aml-after">
				<div class="sl-aml-image"><amp-img src="<?php echo esc_url( $law_image ); ?>" width="1200" height="800" layout="responsive" alt="<?php esc_attr_e( 'Scales of justice beside the Economic Crime and Corporate Transparency Act', 'succeedlearn-amp' ); ?>"></amp-img></div>
			</div>
		</div>
	</section>

	<section id="organisational-challenge" class="sl-section">
		<div class="sl-wrap">
			<span class="sl-eyebrow sl-home-sub-heading"><?php esc_html_e( 'The Organisational Challenge', 'succeedlearn-amp' ); ?></span>
			<h2 class="sl-h2"><?php esc_html_e( 'Fraud risk can begin with an everyday decision', 'succeedlearn-amp' ); ?></h2>
			<p><?php esc_html_e( 'Misleading information, poor validation, weak documentation or a concern that is never raised can create exposure long before an issue is formally identified as fraud.', 'succeedlearn-amp' ); ?></p>
			<?php $render_cards( $reasons ); ?>
			<div class="sl-aml-media sl-aml-after">
				<div class="sl-aml-image"><amp-img src="<?php echo esc_url( $why_image ); ?>" width="1200" height="800" layout="responsive" alt="<?php esc_attr_e( 'Examples of fraud risk, including misuse of expense claims and accidental risk', 'succeedlearn-amp' ); ?>"></amp-img></div>
			</div>
		</div>
	</section>

	<section id="overview" class="sl-section sl-section--alt">
		<div class="sl-wrap">
			<span class="sl-eyebrow sl-home-sub-heading"><?php esc_html_e( 'Course Overview', 'succeedlearn-amp' ); ?></span>
			<h2 class="sl-h2"><?php esc_html_e( 'Help employees connect', 'succeedlearn-amp' ); ?> <span><?php esc_html_e( 'risk with everyday behaviour', 'succeedlearn-amp' ); ?></span></h2>
			<p class="sl-aml-lead"><?php esc_html_e( 'Fraud prevention is not only a concern for senior leaders, Compliance or Legal.', 'succeedlearn-amp' ); ?></p>
			<p><?php esc_html_e( 'Employees across an organisation may create, review, communicate or rely on information that affects investors, financial records, suppliers and business decisions.', 'succeedlearn-amp' ); ?></p>
			<p><?php esc_html_e( 'This course helps learners understand the Failure to Prevent Fraud context, recognise relevant warning signs and understand the importance of raising concerns when something appears unclear, unusual or suspicious.', 'succeedlearn-amp' ); ?></p>
		</div>
	</section>

	<section id="warning-signs" class="sl-section">
		<div class="sl-wrap">
			<span class="sl-eyebrow sl-home-sub-heading"><?php esc_html_e( 'Identifying Fraud Risk', 'succeedlearn-amp' ); ?></span>
			<h2 class="sl-h2"><?php esc_html_e( 'Recognising Fraud Risk - know', 'succeedlearn-amp' ); ?> <span><?php esc_html_e( 'what to watch for', 'succeedlearn-amp' ); ?></span></h2>
			<p><?php esc_html_e( 'Fraud risk does not always start with an obvious act of misconduct. Learners should be alert to warning signs in information, behaviour and business processes.', 'succeedlearn-amp' ); ?></p>
			<?php $render_cards( $warning_signs ); ?>
		</div>
	</section>

	<section id="faqs" class="sl-section sl-section--alt">
		<div class="sl-wrap">
			<span class="sl-eyebrow sl-home-sub-heading"><?php esc_html_e( 'Frequently Asked Questions', 'succeedlearn-amp' ); ?></span>
			<h2 class="sl-h2"><?php esc_html_e( 'Failure to Prevent Fraud FAQs', 'succeedlearn-amp' ); ?></h2>
			<?php
			if ( function_exists( 'succeedlearn_amp_render_faq_accordion' ) ) {
				succeedlearn_amp_render_faq_accordion( $faq_items );
			}
			?>
		</div>
	</section>

	<section id="contact" class="sl-section" aria-labelledby="ftpf-contact-title">
		<div class="sl-wrap sl-contact-layout">
			<div class="sl-contact-intro">
				<span class="sl-eyebrow sl-home-sub-heading"><?php esc_html_e( 'Your Next Step', 'succeedlearn-amp' ); ?></span>
				<h2 id="ftpf-contact-title" class="sl-h2"><?php esc_html_e( 'Buy Failure to Prevent Fraud training', 'succeedlearn-amp' ); ?></h2>
				<p><?php esc_html_e( 'Tell us about your fraud-prevention training needs, delivery and any customisation.', 'succeedlearn-amp' ); ?></p>
			</div>
			<div class="sl-contact-form-card">
				<?php
				if ( function_exists( 'succeedlearn_amp_render_contact_form' ) ) {
					succeedlearn_amp_render_contact_form(
						array(
							'form_page'     => $page_title,
							'form_page_url' => $canonical,
							'form_variant'  => 'course',
							'title'         => __( 'Failure to Prevent Fraud Enquiry', 'succeedlearn-amp' ),
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
