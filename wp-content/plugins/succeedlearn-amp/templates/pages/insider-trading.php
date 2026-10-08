<?php
/**
 * SucceedLEARN AMP: Insider Trading.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$canonical = home_url( '/insider-trading/' );
$page_obj  = get_page_by_path( 'insider-trading' );
if ( $page_obj instanceof WP_Post ) {
	$link = get_permalink( $page_obj );
	if ( $link ) {
		$canonical = $link;
	}
}

$page_title = __( 'Insider Trading eLearning', 'succeedlearn-amp' );
$meta_desc  = __( 'Insider Trading eLearning helps employees recognise sensitive or non-public information, understand trading and disclosure risk, and know when to pause and seek guidance under Market Abuse Regulations, UK MAR, US SEC and India SEBI frameworks.', 'succeedlearn-amp' );

$hero_image         = succeedlearn_amp_upload_url( '2026/10/confidential_insider_trading_scene.webp' );
$individual_image   = succeedlearn_amp_upload_url( '2026/09/Image-1-AML.webp' );
$organisation_image = succeedlearn_amp_upload_url( '2026/09/organisation-image-1.webp' );
$risk_image         = succeedlearn_amp_upload_url( '2026/10/insider_trading_monitoring_scene.webp' );

$frameworks = array(
	array(
		'region' => __( 'United Kingdom', 'succeedlearn-amp' ),
		'title'  => __( 'UK MAR and Market Abuse Regulations', 'succeedlearn-amp' ),
		'text'   => __( 'UK MAR addresses insider dealing, unlawful disclosure of inside information and market manipulation. Inside information is assessed using criteria including whether information is precise, non-public, connected to relevant issuers or financial instruments and likely to have a significant effect on price if made public.', 'succeedlearn-amp' ),
		'image'  => succeedlearn_amp_upload_url( '2026/10/uk_mar_market_abuse_regulation.webp' ),
		'alt'    => __( 'UK MAR and financial markets regulations on a desk overlooking Parliament', 'succeedlearn-amp' ),
	),
	array(
		'region' => __( 'United States', 'succeedlearn-amp' ),
		'title'  => __( 'US SEC Insider Trading Framework', 'succeedlearn-amp' ),
		'text'   => __( 'The US SEC administers and enforces important parts of the US federal securities framework. Material Non-Public Information (MNPI) is an important concept when evaluating how information may affect trading and disclosure decisions.', 'succeedlearn-amp' ),
		'image'  => succeedlearn_amp_upload_url( '2026/10/us_sec_insider_trading_framework.webp' ),
		'alt'    => __( 'US SEC insider trading books beside a confidential MNPI file', 'succeedlearn-amp' ),
	),
	array(
		'region' => __( 'India', 'succeedlearn-amp' ),
		'title'  => __( 'India SEBI Regulation', 'succeedlearn-amp' ),
		'text'   => __( 'A key framework is the SEBI (Prohibition of Insider Trading) Regulations, 2015. The India SEBI Regulation framework places significant emphasis on Unpublished Price Sensitive Information (UPSI), insiders, communication of UPSI and trading-related restrictions.', 'succeedlearn-amp' ),
		'image'  => succeedlearn_amp_upload_url( '2026/10/india_sebi_insider_trading_regulations.webp' ),
		'alt'    => __( 'India SEBI insider trading regulations beside a confidential UPSI file', 'succeedlearn-amp' ),
	),
);

$topics = array(
	array(
		'num'   => '01 · Information',
		'title' => __( 'Recognising Sensitive or Non-Public Information', 'succeedlearn-amp' ),
		'text'  => __( 'Learners consider how transaction, financial, investment or corporate information may become relevant before they trade or communicate.', 'succeedlearn-amp' ),
		'image' => 'https://images.unsplash.com/photo-1611974789855-9c2a0a7236a3?auto=format&fit=crop&w=700&q=80',
		'alt'   => __( 'Inside information and market abuse regulation training', 'succeedlearn-amp' ),
	),
	array(
		'num'   => '02 · Access',
		'title' => __( 'Understanding Who May Become an Insider', 'succeedlearn-amp' ),
		'text'  => __( 'Sensitive information may be received through projects, transactions, meetings, documents or professional relationships.', 'succeedlearn-amp' ),
		'image' => 'https://images.unsplash.com/photo-1556761175-b413da4baf72?auto=format&fit=crop&w=700&q=80',
		'alt'   => __( 'Employees with access to insider information', 'succeedlearn-amp' ),
	),
	array(
		'num'   => '03 · Personal Trading',
		'title' => __( 'Personal Trading and Account Dealing', 'succeedlearn-amp' ),
		'text'  => __( 'Learners consider how personal investment activity can intersect with sensitive information, restrictions and internal controls.', 'succeedlearn-amp' ),
		'image' => 'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?auto=format&fit=crop&w=700&q=80',
		'alt'   => __( 'Personal account dealing training', 'succeedlearn-amp' ),
	),
	array(
		'num'   => '04 · Disclosure',
		'title' => __( 'Handling and Sharing Information', 'succeedlearn-amp' ),
		'text'  => __( 'Employees consider whether sensitive information can appropriately be disclosed, discussed or passed to another person.', 'succeedlearn-amp' ),
		'image' => 'https://images.unsplash.com/photo-1521737711867-e3b97375f902?auto=format&fit=crop&w=700&q=80',
		'alt'   => __( 'Confidential information sharing risk', 'succeedlearn-amp' ),
	),
	array(
		'num'   => '05 · Conduct',
		'title' => __( 'Recognising Potentially Prohibited Conduct', 'succeedlearn-amp' ),
		'text'  => __( 'Practical scenarios help learners understand when ordinary activity may develop into an insider-trading or market-abuse concern.', 'succeedlearn-amp' ),
		'image' => 'https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&w=700&q=80',
		'alt'   => __( 'Market abuse and insider trading scenario training', 'succeedlearn-amp' ),
	),
	array(
		'num'   => '06 · Escalation',
		'title' => __( 'Knowing When to Pause and Seek Guidance', 'succeedlearn-amp' ),
		'text'  => __( 'Employees learn to recognise when they should stop, check internal requirements and seek appropriate guidance before acting.', 'succeedlearn-amp' ),
		'image' => 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=700&q=80',
		'alt'   => __( 'Employee seeking compliance guidance', 'succeedlearn-amp' ),
	),
);

$audience_cards = array(
	array( 'num' => '01', 'title' => __( 'Employees with Access to Sensitive Information', 'succeedlearn-amp' ), 'text' => __( 'Staff receiving financial, strategic, investment or transaction-related information.', 'succeedlearn-amp' ) ),
	array( 'num' => '02', 'title' => __( 'Investment, Deal and Transaction Professionals', 'succeedlearn-amp' ), 'text' => __( 'Professionals involved in sourcing, due diligence, portfolio activity or execution.', 'succeedlearn-amp' ) ),
	array( 'num' => '03', 'title' => __( 'Analysts and Associates', 'succeedlearn-amp' ), 'text' => __( 'Employees accessing information through research, modelling or transaction support.', 'succeedlearn-amp' ) ),
	array( 'num' => '04', 'title' => __( 'Compliance, Legal, Risk and Finance Teams', 'succeedlearn-amp' ), 'text' => __( 'Functions supporting information controls, escalation and employee decision-making.', 'succeedlearn-amp' ) ),
);

$faq_items = array(
	array( 'question' => __( 'What is Insider Trading eLearning?', 'succeedlearn-amp' ), 'answer' => __( 'Insider Trading eLearning helps employees recognise sensitive or non-public information, understand how that information may affect trading and disclosure decisions, and know when they should pause and seek guidance.', 'succeedlearn-amp' ) ),
	array( 'question' => __( 'What is UK MAR?', 'succeedlearn-amp' ), 'answer' => __( 'UK MAR refers to the UK Market Abuse Regulation. It addresses areas including inside information, insider dealing, unlawful disclosure and market manipulation.', 'succeedlearn-amp' ) ),
	array( 'question' => __( 'What is MNPI?', 'succeedlearn-amp' ), 'answer' => __( 'MNPI means Material Non-Public Information. Material information is information that may be important to an investor when making an investment decision, while non-public information has not been broadly disclosed to the investing public.', 'succeedlearn-amp' ) ),
	array( 'question' => __( 'What is UPSI?', 'succeedlearn-amp' ), 'answer' => __( 'UPSI means Unpublished Price Sensitive Information and is an important concept under the India SEBI Regulation framework.', 'succeedlearn-amp' ) ),
	array( 'question' => __( 'What is the role of the US SEC in insider trading?', 'succeedlearn-amp' ), 'answer' => __( 'The Securities and Exchange Commission (SEC) is the US federal securities regulator. Insider-trading compliance sits within the wider federal securities-law framework, SEC rules and relevant case law.', 'succeedlearn-amp' ) ),
	array( 'question' => __( 'Can SucceedLEARN customise the course?', 'succeedlearn-amp' ), 'answer' => __( 'Yes. SucceedLEARN can discuss customising Insider Trading eLearning around organisational policies, terminology, learner roles, workplace scenarios and jurisdiction-specific requirements.', 'succeedlearn-amp' ) ),
);

$suite = array(
	array( 'num' => '01', 'title' => __( 'Anti-Money Laundering (AML)', 'succeedlearn-amp' ), 'text' => __( 'Build awareness of money laundering risks, suspicious activity, customer due diligence, warning signs and appropriate escalation.', 'succeedlearn-amp' ), 'slug' => 'aml-pe-vc' ),
	array( 'num' => '02', 'title' => __( 'Anti-Bribery and Anti-Corruption (ABAC)', 'succeedlearn-amp' ), 'text' => __( 'Help employees recognise bribery and corruption risks involving gifts, hospitality, conflicts, third parties and improper influence.', 'succeedlearn-amp' ), 'slug' => 'anti-bribery-anti-corruption' ),
	array( 'num' => '03', 'title' => __( 'Preventing Facilitation of Tax Evasion', 'succeedlearn-amp' ), 'text' => __( 'Help employees recognise tax-evasion facilitation risks, suspicious conduct and situations requiring appropriate prevention or escalation.', 'succeedlearn-amp' ), 'slug' => 'tax-evasion-facilitation' ),
	array( 'num' => '04', 'title' => __( 'Insider Trading', 'succeedlearn-amp' ), 'text' => __( 'Build awareness around inside information, confidential information, improper disclosure and responsible handling of market-sensitive data.', 'succeedlearn-amp' ), 'slug' => 'insider-trading', 'current' => true ),
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
		'insider_trading',
		array( 'home-page' ),
		array( 'home-sections', 'contact-form', 'global-course-suite', 'global-sub-heading', 'anti-bribery', 'modern-slavery' )
	);
	?>
	.sl-msa-page .sl-insider-topic-grid{display:grid;grid-template-columns:minmax(0,1fr);gap:12px;margin:20px 0 0}
	.sl-msa-page .sl-insider-topic-card{margin:0;padding:0 0 18px;border:1px solid rgba(22,35,78,.1);border-radius:12px;overflow:hidden;background:var(--sl-page-white,#fff);box-shadow:0 6px 18px rgba(22,35,78,.04);box-sizing:border-box}
	.sl-msa-page .sl-insider-topic-card .sl-aml-image{max-width:none;margin:0;border:0;border-radius:0}
	.sl-msa-page .sl-insider-topic-card .sl-msa-card__num,
	.sl-msa-page .sl-insider-topic-card .sl-panel-title,
	.sl-msa-page .sl-insider-topic-card p{margin-left:18px;margin-right:18px}
	.sl-msa-page .sl-insider-topic-card .sl-msa-card__num{margin-top:16px}
	.sl-msa-page .sl-insider-topic-card .sl-panel-title{margin-top:0;margin-bottom:6px}
	.sl-msa-page .sl-insider-topic-card p{margin:0}
	@media(min-width:768px){
		.sl-msa-page .sl-insider-topic-grid{grid-template-columns:repeat(2,minmax(0,1fr));gap:16px}
		.sl-msa-page .sl-insider-topic-grid>.sl-insider-topic-card:last-child:nth-child(odd){grid-column:1/-1;justify-self:center;width:100%;max-width:calc((100% - 16px) / 2)}
	}
	</style>
	<?php succeedlearn_amp_output_components( 'insider_trading', array( 'amp-form', 'amp-mustache', 'amp-sidebar', 'amp-accordion', 'amp-bind', 'amp-lightbox' ) ); ?>
</head>
<body class="sl-home sl-anti-bribery-page sl-msa-page sl-insider-trading-page">
<?php include SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'components/menu.php'; ?>
<main id="main-content">
	<section id="course-hero" class="sl-section sl-aml-pe-vc-hero" aria-labelledby="sl-insider-trading-hero-title">
		<div class="sl-wrap">
			<span class="sl-eyebrow sl-home-sub-heading"><?php esc_html_e( 'Insider Trading Compliances Training', 'succeedlearn-amp' ); ?></span>
			<h1 id="sl-insider-trading-hero-title"><?php esc_html_e( 'Insider Trading', 'succeedlearn-amp' ); ?> <span><?php esc_html_e( 'eLearning', 'succeedlearn-amp' ); ?></span></h1>
			<p class="sl-aml-lead"><?php esc_html_e( 'Insider Trading eLearning helps employees recognise sensitive or non-public information, understand when trading or sharing information may create compliance risk, and make better-informed decisions before they act.', 'succeedlearn-amp' ); ?></p>
			<p><?php esc_html_e( 'The learning connects workplace decisions with important concepts associated with Market Abuse Regulations, UK MAR, US SEC requirements and India SEBI Regulation.', 'succeedlearn-amp' ); ?></p>
			<div class="sl-hero-actions sl-aml-hero__actions">
				<div class="sl-aml-hero__cta-item">
					<span class="sl-aml-hero__cta-label"><?php esc_html_e( 'Individual', 'succeedlearn-amp' ); ?></span>
					<button type="button" class="sl-hero-btn sl-hero-btn-primary" <?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>><?php esc_html_e( 'Buy Now @ $18', 'succeedlearn-amp' ); ?> <span aria-hidden="true">&rarr;</span></button>
				</div>
				<div class="sl-aml-hero__cta-item">
					<span class="sl-aml-hero__cta-label"><?php esc_html_e( 'Organisation', 'succeedlearn-amp' ); ?></span>
					<button type="button" class="sl-hero-btn sl-hero-btn-secondary" <?php echo succeedlearn_amp_scroll_tap_attr( 'organisations' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>><?php esc_html_e( 'Explore More', 'succeedlearn-amp' ); ?></button>
				</div>
			</div>
			<div class="sl-aml-media sl-aml-after">
				<div class="sl-aml-image sl-aml-image--wide">
					<amp-img src="<?php echo esc_url( $hero_image ); ?>" width="1600" height="1066" layout="responsive" alt="<?php esc_attr_e( 'Professional reviewing a confidential document beside market trading charts', 'succeedlearn-amp' ); ?>"></amp-img>
				</div>
			</div>
		</div>
	</section>

	<section id="individuals" class="sl-section sl-section--alt">
		<div class="sl-wrap">
			<span class="sl-eyebrow sl-home-sub-heading"><?php esc_html_e( 'Individual Insider Trading eLearning', 'succeedlearn-amp' ); ?></span>
			<h2 class="sl-h2"><?php esc_html_e( 'Insider Trading Training', 'succeedlearn-amp' ); ?> <span><?php esc_html_e( 'For Individuals', 'succeedlearn-amp' ); ?></span> <?php esc_html_e( '- Start Immediately', 'succeedlearn-amp' ); ?></h2>
			<p class="sl-aml-lead"><?php esc_html_e( 'A focused learning experience for professionals who want practical Insider Trading awareness without a lengthy training commitment.', 'succeedlearn-amp' ); ?></p>
			<ul class="sl-aml-feature-list" role="list">
				<li class="sl-aml-feature-list__item"><span class="sl-aml-number">01</span><div><strong><?php esc_html_e( 'Interactive eLearning', 'succeedlearn-amp' ); ?></strong><span><?php esc_html_e( 'Practical digital learning supported by Insider Trading scenarios and knowledge checks.', 'succeedlearn-amp' ); ?></span></div></li>
				<li class="sl-aml-feature-list__item"><span class="sl-aml-number">02</span><div><strong><?php esc_html_e( 'Focused, self-paced learning', 'succeedlearn-amp' ); ?></strong><span><?php esc_html_e( 'Complete the core Insider Trading learning at your own pace.', 'succeedlearn-amp' ); ?></span></div></li>
				<li class="sl-aml-feature-list__item"><span class="sl-aml-number">03</span><div><strong><?php esc_html_e( 'CPD certificate', 'succeedlearn-amp' ); ?></strong><span><?php esc_html_e( 'Receive a certificate on successful completion.', 'succeedlearn-amp' ); ?></span></div></li>
				<li class="sl-aml-feature-list__item"><span class="sl-aml-number">04</span><div><strong><?php esc_html_e( 'Instant access', 'succeedlearn-amp' ); ?></strong><span><?php esc_html_e( 'Start learning immediately after purchase.', 'succeedlearn-amp' ); ?></span></div></li>
			</ul>
			<div class="sl-content-actions">
				<button type="button" class="sl-content-btn sl-content-btn-primary" <?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>><?php esc_html_e( 'Buy Now @ $18', 'succeedlearn-amp' ); ?></button>
				<button type="button" class="sl-content-btn sl-content-btn-secondary" <?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>><?php esc_html_e( 'Request Demo', 'succeedlearn-amp' ); ?></button>
			</div>
			<div class="sl-aml-media sl-aml-after"><div class="sl-aml-image"><amp-img src="<?php echo esc_url( $individual_image ); ?>" width="1200" height="900" layout="responsive" alt="<?php esc_attr_e( 'Individual Insider Trading course preview', 'succeedlearn-amp' ); ?>"></amp-img></div></div>
		</div>
	</section>

	<section id="organisations" class="sl-section">
		<div class="sl-wrap">
			<span class="sl-eyebrow sl-home-sub-heading"><?php esc_html_e( 'Enterprise Insider Trading eLearning', 'succeedlearn-amp' ); ?></span>
			<h2 class="sl-h2"><?php esc_html_e( 'Insider Trading Training', 'succeedlearn-amp' ); ?> <span><?php esc_html_e( 'For Organisations', 'succeedlearn-amp' ); ?></span> <?php esc_html_e( '- Built for Scale', 'succeedlearn-amp' ); ?></h2>
			<p><?php esc_html_e( 'Deliver Insider Trading awareness across teams while giving administrators the controls needed to assign training, monitor completion and manage recurring compliance activity.', 'succeedlearn-amp' ); ?></p>
			<ul class="sl-aml-feature-list" role="list">
				<li class="sl-aml-feature-list__item"><span class="sl-aml-number">01</span><div><strong><?php esc_html_e( 'Reporting and tracking', 'succeedlearn-amp' ); ?></strong><span><?php esc_html_e( 'Monitor learner progress, completion and training status.', 'succeedlearn-amp' ); ?></span></div></li>
				<li class="sl-aml-feature-list__item"><span class="sl-aml-number">02</span><div><strong><?php esc_html_e( 'Automatic reminders', 'succeedlearn-amp' ); ?></strong><span><?php esc_html_e( 'Support completion with automated learner reminders.', 'succeedlearn-amp' ); ?></span></div></li>
				<li class="sl-aml-feature-list__item"><span class="sl-aml-number">03</span><div><strong><?php esc_html_e( 'SCORM or SaaS delivery', 'succeedlearn-amp' ); ?></strong><span><?php esc_html_e( 'Deploy through your LMS or use the SucceedLEARN platform.', 'succeedlearn-amp' ); ?></span></div></li>
				<li class="sl-aml-feature-list__item"><span class="sl-aml-number">04</span><div><strong><?php esc_html_e( 'Group assignment', 'succeedlearn-amp' ); ?></strong><span><?php esc_html_e( 'Assign Insider Trading training to selected teams or learner groups.', 'succeedlearn-amp' ); ?></span></div></li>
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
							<span class="sl-course-suite__dash" aria-hidden="true"></span>
							<span class="sl-course-suite__num" aria-hidden="true"><?php echo esc_html( $course['num'] ); ?></span>
						</div>
						<h3 class="sl-panel-title"><?php echo esc_html( $course['title'] ); ?></h3>
						<p><?php echo esc_html( $course['text'] ); ?></p>
						<span class="sl-course-suite__cta"><?php echo esc_html( $is_current ? __( 'Buy This Course', 'succeedlearn-amp' ) : __( 'Explore More', 'succeedlearn-amp' ) ); ?> <span aria-hidden="true">&rarr;</span></span>
					</a>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section id="insider-trading-risk" class="sl-section">
		<div class="sl-wrap">
			<span class="sl-eyebrow sl-home-sub-heading"><?php esc_html_e( 'Understanding Insider Trading Risk', 'succeedlearn-amp' ); ?></span>
			<h2 class="sl-h2"><?php esc_html_e( 'What Is Insider Trading and Why Does Insider Trading', 'succeedlearn-amp' ); ?> <span><?php esc_html_e( 'eLearning Matter?', 'succeedlearn-amp' ); ?></span></h2>
			<p><?php esc_html_e( 'Insider trading generally concerns securities trading in circumstances involving material, inside or otherwise protected non-public information. The precise legal definition and terminology depend on the applicable jurisdiction.', 'succeedlearn-amp' ); ?></p>
			<p><?php esc_html_e( 'The risk may arise through transactions, acquisitions, financial results, strategic activity, investments, portfolio businesses or other confidential corporate developments.', 'succeedlearn-amp' ); ?></p>
			<div class="sl-aml-media sl-aml-after">
				<div class="sl-aml-image">
					<amp-img src="<?php echo esc_url( $risk_image ); ?>" width="1200" height="800" layout="responsive" alt="<?php esc_attr_e( 'A person reviewing a trading decision beside confidential information', 'succeedlearn-amp' ); ?>"></amp-img>
				</div>
			</div>
		</div>
	</section>

	<section id="regulatory-frameworks" class="sl-section sl-section--alt">
		<div class="sl-wrap">
			<span class="sl-eyebrow sl-home-sub-heading"><?php esc_html_e( 'Market Abuse Regulations', 'succeedlearn-amp' ); ?></span>
			<h2 class="sl-h2"><?php esc_html_e( 'How Do Market Abuse Regulations, UK MAR, US SEC and India SEBI Regulation Address', 'succeedlearn-amp' ); ?> <span><?php esc_html_e( 'Insider Trading?', 'succeedlearn-amp' ); ?></span></h2>
			<p><?php esc_html_e( 'Market-abuse and insider-trading frameworks share a broad concern with misuse of protected non-public information, but their legal structures, terminology and detailed requirements differ.', 'succeedlearn-amp' ); ?></p>
			<div class="sl-abac-law-grid">
				<?php foreach ( $frameworks as $framework ) : ?>
					<article class="sl-aml-concept sl-abac-law-card">
						<div class="sl-aml-media">
							<div class="sl-aml-image">
								<amp-img src="<?php echo esc_url( $framework['image'] ); ?>" width="700" height="420" layout="responsive" alt="<?php echo esc_attr( $framework['alt'] ); ?>"></amp-img>
							</div>
						</div>
						<span class="sl-abac-law-card__region"><?php echo esc_html( $framework['region'] ); ?></span>
						<h3 class="sl-panel-title"><?php echo esc_html( $framework['title'] ); ?></h3>
						<p class="sl-aml-copy"><?php echo esc_html( $framework['text'] ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section id="topics" class="sl-section">
		<div class="sl-wrap">
			<span class="sl-eyebrow sl-home-sub-heading"><?php esc_html_e( 'Insider Trading eLearning Topics', 'succeedlearn-amp' ); ?></span>
			<h2 class="sl-h2"><?php esc_html_e( 'What Does Insider Trading eLearning Cover Under', 'succeedlearn-amp' ); ?> <span><?php esc_html_e( 'Market Abuse Regulations?', 'succeedlearn-amp' ); ?></span></h2>
			<p><?php esc_html_e( 'Insider Trading eLearning helps employees connect Market Abuse Regulations and insider-trading concepts with practical trading, information-handling and escalation decisions.', 'succeedlearn-amp' ); ?></p>
			<div class="sl-insider-topic-grid">
				<?php foreach ( $topics as $topic ) : ?>
					<article class="sl-insider-topic-card">
						<div class="sl-aml-image">
							<amp-img src="<?php echo esc_url( $topic['image'] ); ?>" width="700" height="420" layout="responsive" alt="<?php echo esc_attr( $topic['alt'] ); ?>"></amp-img>
						</div>
						<span class="sl-msa-card__num"><?php echo esc_html( $topic['num'] ); ?></span>
						<h3 class="sl-panel-title"><?php echo esc_html( $topic['title'] ); ?></h3>
						<p><?php echo esc_html( $topic['text'] ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section id="audience" class="sl-section sl-section--alt">
		<div class="sl-wrap">
			<span class="sl-eyebrow sl-home-sub-heading"><?php esc_html_e( 'Insider Trading eLearning Audience', 'succeedlearn-amp' ); ?></span>
			<h2 class="sl-h2"><?php esc_html_e( 'Who Should Take Insider Trading and Market Abuse', 'succeedlearn-amp' ); ?> <span><?php esc_html_e( 'Regulation Training?', 'succeedlearn-amp' ); ?></span></h2>
			<p><?php esc_html_e( 'Insider Trading eLearning can be particularly relevant to employees who may receive confidential, inside, unpublished or material non-public information.', 'succeedlearn-amp' ); ?></p>
			<?php $render_cards( $audience_cards ); ?>
		</div>
	</section>

	<section id="faqs" class="sl-section">
		<div class="sl-wrap">
			<span class="sl-eyebrow sl-home-sub-heading"><?php esc_html_e( 'Insider Trading eLearning FAQs', 'succeedlearn-amp' ); ?></span>
			<h2 class="sl-h2"><?php esc_html_e( 'What Are the Most Common Questions About Insider Trading and', 'succeedlearn-amp' ); ?> <span><?php esc_html_e( 'Market Abuse Regulations?', 'succeedlearn-amp' ); ?></span></h2>
			<?php
			if ( function_exists( 'succeedlearn_amp_render_faq_accordion' ) ) {
				succeedlearn_amp_render_faq_accordion( $faq_items );
			}
			?>
		</div>
	</section>

	<section id="contact" class="sl-section sl-section--alt" aria-labelledby="insider-trading-contact-title">
		<div class="sl-wrap sl-contact-layout">
			<div class="sl-contact-intro">
				<span class="sl-eyebrow sl-home-sub-heading"><?php esc_html_e( 'Your Next Step', 'succeedlearn-amp' ); ?></span>
				<h2 id="insider-trading-contact-title" class="sl-h2"><?php esc_html_e( 'Buy Insider Trading eLearning', 'succeedlearn-amp' ); ?></h2>
				<p><?php esc_html_e( 'Tell us about your Insider Trading training needs, delivery and any customisation.', 'succeedlearn-amp' ); ?></p>
			</div>
			<div class="sl-contact-form-card">
				<?php
				if ( function_exists( 'succeedlearn_amp_render_contact_form' ) ) {
					succeedlearn_amp_render_contact_form(
						array(
							'form_page'     => $page_title,
							'form_page_url' => $canonical,
							'form_variant'  => 'course',
							'title'         => __( 'Insider Trading Course Enquiry', 'succeedlearn-amp' ),
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
