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
	array( 'num' => '01', 'title' => __( 'Understand modern slavery', 'succeedlearn-amp' ), 'text' => __( 'Recognise what modern slavery means and the different forms it can take.', 'succeedlearn-amp' ) ),
	array( 'num' => '02', 'title' => __( 'Identify warning signs', 'succeedlearn-amp' ), 'text' => __( 'Recognise behaviours and circumstances that may indicate exploitation or control.', 'succeedlearn-amp' ) ),
	array( 'num' => '03', 'title' => __( 'Report appropriately', 'succeedlearn-amp' ), 'text' => __( 'Know how to record relevant facts and report concerns through the right channels.', 'succeedlearn-amp' ) ),
	array( 'num' => '04', 'title' => __( 'Reduce supply-chain risk', 'succeedlearn-amp' ), 'text' => __( 'Relevant learners explore supplier due diligence and practical vendor-selection considerations.', 'succeedlearn-amp' ) ),
);
$procurement = array(
	array( 'num' => '01', 'title' => __( 'Check supplier due diligence', 'succeedlearn-amp' ), 'text' => __( 'Follow relevant screening and review processes before onboarding and throughout supplier relationships.', 'succeedlearn-amp' ) ),
	array( 'num' => '02', 'title' => __( 'Review supplier policies and controls', 'succeedlearn-amp' ), 'text' => __( 'Look for standards relating to labour practices, worker protections and responsible sourcing.', 'succeedlearn-amp' ) ),
	array( 'num' => '03', 'title' => __( 'Assess transparency', 'succeedlearn-amp' ), 'text' => __( 'Consider whether a supplier can clearly explain how labour is sourced, managed and monitored.', 'succeedlearn-amp' ) ),
	array( 'num' => '04', 'title' => __( 'Watch for commercial red flags', 'succeedlearn-amp' ), 'text' => __( 'Unusually low pricing, vague workforce arrangements or inconsistent information may justify further review.', 'succeedlearn-amp' ) ),
	array( 'num' => '05', 'title' => __( 'Understand subcontracting and keep records', 'succeedlearn-amp' ), 'text' => __( 'Consider visibility and oversight, and document relevant decisions, checks and risk considerations.', 'succeedlearn-amp' ) ),
);
$reporting = array(
	array( 'num' => '01', 'title' => __( 'Observe', 'succeedlearn-amp' ), 'text' => __( 'Focus on what you have directly seen or heard.', 'succeedlearn-amp' ) ),
	array( 'num' => '02', 'title' => __( 'Note the facts', 'succeedlearn-amp' ), 'text' => __( 'Record relevant information about what happened, who was involved and when or where it was observed, where known.', 'succeedlearn-amp' ) ),
	array( 'num' => '03', 'title' => __( 'Report', 'succeedlearn-amp' ), 'text' => __( 'Raise the concern through the appropriate internal channel, such as a line manager, Compliance or Legal.', 'succeedlearn-amp' ) ),
);
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
			<div class="sl-aml-media">
				<div class="sl-aml-image sl-aml-image--wide">
					<amp-img src="<?php echo esc_url( $hero_image ); ?>" width="1600" height="1066" layout="responsive" alt="<?php esc_attr_e( 'Supply-chain due diligence review across shipping, warehousing and workforce risk', 'succeedlearn-amp' ); ?>"></amp-img>
				</div>
			</div>
			<p class="sl-aml-lead"><?php esc_html_e( 'A concise UK-focused course that helps employees understand modern slavery, recognise possible warning signs and know how to respond through the appropriate internal channels.', 'succeedlearn-amp' ); ?></p>
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
		</div>
	</section>

	<?php
	if ( function_exists( 'succeedlearn_amp_render_course_suite' ) ) {
		succeedlearn_amp_render_course_suite(
			array(
				'suite'      => 'fcp',
				'id'         => 'fcp-suite',
				'title_html' => __( 'Explore Our eLearning <span>Compliance Courses</span>', 'succeedlearn-amp' ),
				'intro'      => __( 'Build employee awareness across financial crime, ethical conduct and emerging compliance risks with practical, role-relevant eLearning.', 'succeedlearn-amp' ),
				'background' => 'soft',
			)
		);
	}
	?>

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
			<ul class="sl-list sl-aml-list" role="list">
				<?php foreach ( $audiences as $audience ) : ?>
					<li class="sl-list-item"><span class="sl-aml-check" aria-hidden="true">✓</span><span class="sl-list-item__text"><?php echo esc_html( $audience ); ?></span></li>
				<?php endforeach; ?>
			</ul>
		</div>
	</section>

	<section id="warning-signs" class="sl-section">
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
