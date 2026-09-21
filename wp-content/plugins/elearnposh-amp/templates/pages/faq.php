<?php
/**
 * FAQ Page Template
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require ELEARNPOSH_AMP_TEMPLATES_DIR . 'partials/amp-page-shell-start.php';

global $redux_builder_amp;

$post_id         = absint( get_the_ID() );
$post_body_class = 'post-' . $post_id;
$page_permalink  = get_permalink( $post_id ) ?: home_url( '/elearnposh-frequently-asked-questions-faqs/' );

$faq_items = array(
	array(
		'question'    => 'What is POSH policy?',
		'answer_html' => '<p>The POSH Act- Sexual Harassment of Women at Workplace (Prevention, Prohibition and Redressal) 2013 was enacted to protect women from sexual harassment and provide a safe and secure work environment.</p>',
	),
	array(
		'question'    => 'Is POSH training mandatory?',
		'answer_html' => '<p>Creating awareness among the employees about prevention of sexual harassment of women is mandated by the POSH act. That makes POSH training mandatory.</p>',
	),
	array(
		'question'    => 'What is ICC in POSH?',
		'answer_html' => '<p>ICC- Internal complaints committee (Now referred to as Internal Committee/IC) was introduced as a feature by POSH Act 2013. Every organization should have an IC, which registers the complaint and investigates it with fairness and justice.</p>',
	),
	array(
		'question'    => 'What is the full form of POSH?',
		'answer_html' => '<p>Prevention Of Sexual Harassment (POSH) It aims at creating a safe and secure, harassment free work environment in an organization.</p>',
	),
	array(
		'question'    => 'What are examples of harassment?',
		'answer_html' => '<p>Harassment can be in any form. An example of sexual harassment is, when a person in the managerial position offers job benefits to a female employee in exchange for sexual favors.</p>',
	),
	array(
		'question'    => 'Why is POSH training important?',
		'answer_html' => '<p>POSH training is important to create awareness among the employees at workplace. It helps in creating a safe and secure work environment for the women at workplace.</p>',
	),
	array(
		'question'    => 'What is the origin of POSH law in India?',
		'answer_html' => '<p>The POSH Law 2013 is the first legislation passed in India to specifically protect the women at workplace from sexual harassment.</p>',
	),
	array(
		'question'    => 'What is POSH awareness?',
		'answer_html' => '<p>The POSH awareness course explains about the POSH Act 2013 and explains what constitutes sexual harassment. It promotes the awareness to prevent harassment of women at workplace.</p>',
	),
	array(
		'question'    => 'What is POSH law?',
		'answer_html' => '<p>A law to protect and prevent harassment of women at workplace and also redressal of the registered complaints.</p>',
	),
	array(
		'question'    => 'What is HR POSH?',
		'answer_html' => '<p>The POSH Act- Sexual Harassment of Women at Workplace (Prevention, Prohibition and Redressal) 2013 was enacted to protect women from sexual harassment and provide a safe and secure work environment.</p>',
	),
	array(
		'question'    => 'What is Quid Pro Quo harassment?',
		'answer_html' => '<p>Quid Pro Quo harassment occurs when a person trades, or tries to trade, job benefits for sexual favors. It therefore occurs between an employee and someone with authority, like a supervisor, who has the ability to grant or with hold job benefits.</p>',
	),
	array(
		'question'    => 'What kind of harassment is illegal?',
		'answer_html' => '<p>The harassment based on race, age, sex, religion, national origin, disability, pregnancy, or marital status is considered as illegal.</p>',
	),
	array(
		'question'    => 'What defines harassment?',
		'answer_html' => '<p>Harassment comprises of behaviour that is offensive, and has the potential to cause or causes adverse impact on one&rsquo;s emotional and physical well-being, productivity and/or relationships, which could result in creating a toxic environment at the workplace.</p>',
	),
	array(
		'question'    => 'Why is POSH important?',
		'answer_html' => '<p>POSH Act is important to protect women from sexual harassment at workplace. It creates a safe and secure work environment and acts as a savior of women at workplace.</p>',
	),
	array(
		'question'    => 'What is indirect harassment?',
		'answer_html' => '<p>A person may be offended by a photograph, joke, email, a lewd comment or any other picture sexual in nature, although it was not intended towards the victim. In such cases, it is considered as indirect harassment.</p>',
	),
	array(
		'question'    => 'Who can file a complaint of sexual harassment at workplace ?',
		'answer_html' => '<p>According to the POSH Act, any woman who is working in or visiting a workplace for the purpose of employment can file a complaint. She can be working as a permanent, temporary or adhoc employee or on daily-wages, voluntary or contract basis. A visitor, probationer, trainee, apprentice and intern are also entitled to file a complaint.</p>',
	),
);

$faq_schema = array(
	'@context'   => 'https://schema.org',
	'@type'      => 'FAQPage',
	'mainEntity' => array(),
);

foreach ( $faq_items as $faq_item ) {
	$faq_schema['mainEntity'][] = array(
		'@type'          => 'Question',
		'name'           => $faq_item['question'],
		'acceptedAnswer' => array(
			'@type' => 'Answer',
			'text'  => wp_strip_all_tags( $faq_item['answer_html'] ),
		),
	);
}
?>
<!doctype html>
<html amp lang="<?php echo esc_attr( get_bloginfo( 'language' ) ); ?>">
<head>
	<meta charset="utf-8" />
	<link rel="shortcut icon" href="<?php echo esc_url( elearnposh_amp_get_favicon_url() ); ?>" type="image/png" />
	<title><?php esc_html_e( 'POSH Training FAQs', 'elearnposh-amp' ); ?> - eLearnPOSH</title>
	<link rel="dns-prefetch" href="https://cdn.ampproject.org" />
	<?php do_action( 'amp_post_template_head', $this ); ?>
	<style amp-custom>
		body{font-family:'Nunito Sans',Arial,sans-serif;margin:0;padding:0;padding-top:100px !important;background:#f6f9fd;color:#0f172a}
	<?php elearnposh_amp_output_optimized_css( 'course', array( 'menu', 'footer' ) ); ?>
	.pfe{--bg:#fff;--text:#0d2238;--muted:#54708d;--line:#d9e6f6;--container:min(1290px,100%);background:var(--bg);color:var(--text);font-family:"Inter","Segoe UI",Arial,sans-serif;overflow-x:hidden;padding:0 0 22px}
	.pfe *{box-sizing:border-box}.pfe a{text-decoration:none}.pfe-wrap{width:var(--container);margin:0 auto}
	.pfe-hero,.pfe-section,.pfe-section-sm{padding:18px 16px}
	.pfe-title{margin:0 0 12px;font-size:clamp(1.5rem,1.1rem + 1.3vw,2.1rem);line-height:1.2;color:var(--text)}
	.pfe-sub{margin:0;color:var(--muted);line-height:1.75;font-size:16px}
	.pfe-hero .pfe-sub{max-width:100%;width:100%}
	.pfe-hero{background:radial-gradient(900px 460px at 0% 0%,rgba(47,144,239,.14),transparent 70%),radial-gradient(900px 460px at 100% 0%,rgba(10,154,116,.1),transparent 72%),#fff}
	.pfe-hero h1{margin:0 0 14px;font-size:clamp(1.85rem,1.2rem + 2.2vw,3rem);line-height:1.12;color:var(--text)}
	<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'partials/faq-accordion-styles.php'; ?>
	@media (min-width:641px){.pfe-hero,.pfe-section,.pfe-section-sm{padding:24px 20px}}
	</style>
	<script type="application/ld+json"><?php echo elearnposh_amp_encode_page_schema_json_ld( $faq_schema ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></script>
	<?php elearnposh_amp_output_components( 'course', array( 'amp-accordion' ) ); ?>
</head>
<body class="<?php echo esc_attr( $post_body_class ); ?>">
	<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/menu.php'; ?>
	<div class="amp-content-wrapper">
	<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/user-notification.php'; ?>
		<main class="pfe">
			<section class="pfe-hero" aria-label="<?php esc_attr_e( 'POSH Training FAQs and workplace compliance guidance', 'elearnposh-amp' ); ?>">
				<div class="pfe-wrap">
				<?php elearnposh_amp_render_breadcrumbs(); ?>
					<h1><?php esc_html_e( 'POSH Training FAQs', 'elearnposh-amp' ); ?></h1>
					<p class="pfe-sub"><?php esc_html_e( 'Our POSH Training FAQs answer the most common questions about workplace compliance, POSH certification, employee training, manager training, Internal Committee training, implementation, and learner support.', 'elearnposh-amp' ); ?></p>
				</div>
			</section>

			<section class="pfe-section" id="pfe-faq">
				<div class="pfe-wrap">
					<h2 class="pfe-title"><?php esc_html_e( 'Common POSH Training FAQs', 'elearnposh-amp' ); ?></h2>
					<amp-accordion animate expand-single-section>
						<?php foreach ( $faq_items as $faq_index => $faq_item ) : ?>
						<section<?php echo 0 === $faq_index ? ' expanded' : ''; ?>>
							<h3 class="faq-q"><?php echo esc_html( ( $faq_index + 1 ) . '. ' . $faq_item['question'] ); ?></h3>
							<div class="faq-a">
								<?php echo wp_kses_post( $faq_item['answer_html'] ); ?>
							</div>
						</section>
						<?php endforeach; ?>
					</amp-accordion>
				</div>
			</section>
		</main>
	</div>
	<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/footer.php'; ?>
</body>
</html>
