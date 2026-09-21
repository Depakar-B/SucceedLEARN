<?php
/**
 * POSH for Employees AMP Template
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$brochure_source_url = 'https://elearnposh.com/eLearnPOSH-Brochure.pdf';

if ( isset( $_GET['download_brochure'] ) && '1' === sanitize_text_field( wp_unslash( $_GET['download_brochure'] ) ) ) {
	$response = wp_remote_get(
		$brochure_source_url,
		array(
			'timeout'     => 20,
			'redirection' => 5,
		)
	);

	if ( ! is_wp_error( $response ) && 200 === (int) wp_remote_retrieve_response_code( $response ) ) {
		$body = wp_remote_retrieve_body( $response );

		if ( ! empty( $body ) ) {
			nocache_headers();
			header( 'Content-Type: application/pdf' );
			header( 'Content-Disposition: attachment; filename="eLearnPOSH-Brochure.pdf"' );
			header( 'Content-Length: ' . strlen( $body ) );
			echo $body; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			exit;
		}
	}

	wp_safe_redirect( esc_url_raw( $brochure_source_url ) );
	exit;
}

$demo_url           = elearnposh_amp_url( '/contact-us/#demo' );
$post_body_class    = 'post-' . absint( get_the_ID() );
$foundation_plan_id = esc_attr__( 'posh-foundation-plan', 'elearnposh-amp' );
$pro_plan_id        = esc_attr__( 'posh-pro-plan', 'elearnposh-amp' );
$brochure_url       = esc_url( add_query_arg( 'download_brochure', '1', get_permalink() ) );

$pfe_choose_items = array(
	array(
		'icon' => 'https://placehold.co/44x44/0d73d4/ffffff?text=Icon',
		'text' => 'Builds both compliance and culture across the organization',
	),
	array(
		'icon' => 'https://placehold.co/44x44/0d73d4/ffffff?text=Icon',
		'text' => 'Makes POSH awareness easier to scale across teams and locations',
	),
	array(
		'icon' => 'https://placehold.co/44x44/0d73d4/ffffff?text=Icon',
		'text' => 'Offers two training options to match different organizational needs',
	),
	array(
		'icon' => 'https://placehold.co/44x44/0d73d4/ffffff?text=Icon',
		'text' => 'Keeps learning active beyond a one-time course through refresher content and microlearning',
	),
	array(
		'icon' => 'https://placehold.co/44x44/0d73d4/ffffff?text=Icon',
		'text' => 'Uses engaging formats such as live-action training to improve understanding and retention',
	),
	array(
		'icon' => 'https://placehold.co/44x44/0d73d4/ffffff?text=Icon',
		'text' => 'Supports HR and compliance efforts with practical resources and ongoing reinforcement',
	),
	array(
		'icon' => 'https://placehold.co/44x44/0d73d4/ffffff?text=Icon',
		'text' => 'Helps create lasting workplace impact through continuous awareness and behaviour change',
	),
);

$faq_schema_items = array(
	array(
		'@type'          => 'Question',
		'name'           => 'What is the full form of POSH?',
		'acceptedAnswer' => array(
			'@type' => 'Answer',
			'text'  => 'POSH stands for Prevention of Sexual Harassment and is based on the Sexual Harassment of Women at Workplace (Prevention, Prohibition and Redressal) Act, 2013.',
		),
	),
	array(
		'@type'          => 'Question',
		'name'           => 'What is POSH Training?',
		'acceptedAnswer' => array(
			'@type' => 'Answer',
			'text'  => 'POSH training educates employees about identifying, preventing, and addressing sexual harassment in the workplace, including legal framework, policies, responsibilities, and reporting procedures.',
		),
	),
	array(
		'@type'          => 'Question',
		'name'           => 'What is the POSH Act?',
		'acceptedAnswer' => array(
			'@type' => 'Answer',
			'text'  => 'The POSH Act is the Sexual Harassment of Women at Workplace Act, 2013 in India, which requires organizations to prevent and redress workplace sexual harassment.',
		),
	),
	array(
		'@type'          => 'Question',
		'name'           => 'Why POSH training?',
		'acceptedAnswer' => array(
			'@type' => 'Answer',
			'text'  => 'POSH training is legally important and helps employees understand acceptable behaviour, rights, reporting, and workplace respect.',
		),
	),
	array(
		'@type'          => 'Question',
		'name'           => 'Is compliance with the POSH Act mandatory?',
		'acceptedAnswer' => array(
			'@type' => 'Answer',
			'text'  => 'Yes. Organizations with 10 or more employees must comply, including Internal Committee setup, awareness programs, complaint handling, and confidentiality.',
		),
	),
	array(
		'@type'          => 'Question',
		'name'           => 'How long is the POSH employee training?',
		'acceptedAnswer' => array(
			'@type' => 'Answer',
			'text'  => 'The eLearnPOSH employee training duration is approximately 45 minutes.',
		),
	),
	array(
		'@type'          => 'Question',
		'name'           => 'How do you provide POSH training to employees?',
		'acceptedAnswer' => array(
			'@type' => 'Answer',
			'text'  => 'Training is delivered through tailored eLearning modules for employees, IC members, and managers, supported by regular updates and webinars.',
		),
	),
	array(
		'@type'          => 'Question',
		'name'           => 'What is the time limit under the POSH Act to file a complaint?',
		'acceptedAnswer' => array(
			'@type' => 'Answer',
			'text'  => 'A complaint should be filed within 3 months of the last incident, extendable by another 3 months in certain cases.',
		),
	),
	array(
		'@type'          => 'Question',
		'name'           => 'What is the penalty under POSH Law?',
		'acceptedAnswer' => array(
			'@type' => 'Answer',
			'text'  => 'Employers may face fines up to INR 50,000 for non-compliance, with stricter penalties for repeated violations.',
		),
	),
	array(
		'@type'          => 'Question',
		'name'           => 'What is sexual harassment in the workplace?',
		'acceptedAnswer' => array(
			'@type' => 'Answer',
			'text'  => 'Sexual harassment includes unwelcome physical, verbal, or non-verbal conduct of a sexual nature, including advances, sexual favours, remarks, or showing pornography.',
		),
	),
	array(
		'@type'          => 'Question',
		'name'           => 'Which laws in India offer protection from sexual harassment?',
		'acceptedAnswer' => array(
			'@type' => 'Answer',
			'text'  => 'The main workplace law is the POSH Act, 2013, with related protections under other Indian laws such as the IPC.',
		),
	),
	array(
		'@type'          => 'Question',
		'name'           => 'What are the compliance requirements under the POSH Law?',
		'acceptedAnswer' => array(
			'@type' => 'Answer',
			'text'  => 'Key requirements include policy drafting, Internal Committee constitution, employee and IC training, and annual reporting.',
		),
	),
);

$faq_schema = array(
	'@context'    => 'https://schema.org',
	'@type'       => 'FAQPage',
	'mainEntity'  => $faq_schema_items,
);
?>
<!DOCTYPE html>
<html amp lang="<?php echo esc_attr( get_bloginfo( 'language' ) ); ?>">
<head>
	<meta charset="utf-8" />
	<link rel="shortcut icon" href="<?php echo esc_url( wp_get_attachment_url( 126 ) ); ?>" type="image/png" />
	<title><?php echo esc_html( get_the_title() ); ?> - eLearnPOSH</title>
	<?php do_action( 'amp_post_template_head', $this ); ?>
	<style amp-custom>
	<?php elearnposh_amp_output_optimized_css( 'course', array( 'course-page', 'menu', 'footer' ) ); ?>
	.amp-content-wrapper{margin-top:75px !important;padding-top:0 !important;width:100%}
	.pfe{--bg:#fff;--text:#0d2238;--muted:#54708d;--line:#d9e6f6;--container:min(1290px,100%);background:var(--bg);color:var(--text);font-family:"Inter","Segoe UI",Arial,sans-serif;overflow-x:hidden;padding:0 0 22px}
	.pfe *{box-sizing:border-box}.pfe a{text-decoration:none}.pfe-wrap{width:var(--container);margin:0 auto}.pfe-hero,.pfe-section,.pfe-section-sm{padding:18px 16px}
	.pfe-title{margin:0 0 12px;font-size:clamp(1.5rem,1.1rem + 1.3vw,2.1rem);line-height:1.2}.pfe-sub{margin:0;color:var(--muted);line-height:1.75}.pfe-sub-wide{max-width:100%}
	.btn-primary{display:inline-block;background:#002a38;color:#fff;padding:10px 18px;border-radius:8px;font-weight:700}
	.pfe-hero{background:radial-gradient(900px 460px at 0% 0%,rgba(47,144,239,.14),transparent 70%),radial-gradient(900px 460px at 100% 0%,rgba(10,154,116,.1),transparent 72%),#fff}
	.pfe-hero-grid,.pfe-why-grid,.pfe-grid-2,.pfe-choose-grid{display:grid;grid-template-columns:1fr;gap:16px}
	.pfe-why-gallery{display:grid;grid-template-columns:1fr;gap:16px;width:100%;min-width:0}
	.pfe-hero-grid > *,.pfe-why-grid > *{min-width:0}
	.pfe-grid-2 .pfe-card{padding:16px}
	.pfe-kicker{display:inline-flex;align-items:center;padding:8px 12px;margin-bottom:14px;border-radius:999px;background:#eaf4ff;border:1px solid #c9e1fb;color:#0c5fae;font-size:13px;font-weight:700}
	.pfe-hero h1{margin:0 0 14px;font-size:clamp(1.85rem,1.2rem + 2.2vw,3rem);line-height:1.12}.pfe-hero p{margin:0;color:var(--muted);font-size:16px;line-height:1.8}
	.pfe-hero-actions{margin-top:20px;display:flex;flex-wrap:wrap;gap:10px;align-items:center}
	.pfe-btn-outline{display:inline-block;color:#0d73d4;background:#f7fbff;border:1px solid #bad9f8;padding:12px 16px;border-radius:8px;font-weight:700}
	.pfe-btn-download{display:inline-flex;align-items:center;justify-content:center;gap:8px;color:#0d73d4;background:#f7fbff;border:1px solid #bad9f8;padding:11px 18px;border-radius:8px;font-weight:700}
	.pfe-btn-download:hover{border-color:#0d73d4;background:#eef6ff}
	.pfe-btn-download .pfe-dl-icon{width:16px;height:16px;display:inline-block;flex:0 0 auto}
	.pfe-card,.pfe-plan-box,.pfe-info-panel,.pfe-choose-box,.pfe-image-card,.pfe-demo-cta{background:#fff;border:0;border-radius:14px}
	.pfe-card,.pfe-plan-box,.pfe-info-panel,.pfe-choose-box{padding:0;box-shadow:0 8px 24px rgba(11,35,58,.08)}
	.pfe-list{list-style:none;margin:0;padding:0}
	.pfe-list li{position:relative;padding-left:22px;margin:0 0 8px;line-height:1.75;color:#2f4358}
	.pfe-list li::before{content:"✓";position:absolute;left:0;top:0;color:#123456;font-weight:700}
	.pfe-bullet-list{list-style:disc;margin:0;padding:0 0 0 20px}
	.pfe-bullet-list li{margin:0 0 8px;padding-left:0;line-height:1.75;color:#2f4358;position:static}
	.pfe-bullet-list li::before{content:none}
	.pfe-bullet-list-no-bullets{list-style:none;padding-left:0}
	.pfe-bullet-list-no-bullets > li{padding-left:0}
	.pfe-bullet-list--cards{display:grid;grid-template-columns:1fr;gap:14px;list-style:none;padding:0}
	.pfe-bullet-list--cards li{padding:14px;border:1px solid var(--line);border-radius:12px;background:#fff}
	.pfe-bullet-list--cards li::before{content:none}
	.pfe-bullet-list--cards li strong{display:block;margin-bottom:6px;color:#10273f}
	.pfe-plan-sections{display:grid;gap:24px;margin-top:22px}
	.pfe-plan-box{padding:22px}
	.pfe-plan-box h3{margin:0 0 12px}
	.pfe-plan-box h4{margin:18px 0 10px;font-size:1.02rem;line-height:1.4;color:#10273f}
	.pfe-plan-box p{margin:0 0 12px;line-height:1.78;color:#2f4358}
	.pfe-plan-box .pfe-bullet-list:not(.pfe-bullet-list--cards){margin-top:8px;padding-left:24px}
	.pfe-plan-box .pfe-bullet-list:not(.pfe-bullet-list--cards) li{margin:0 0 10px}
	.pfe-bullet-content{margin-top:12px;margin-left:0}
	.pfe-bullet-content h4{margin:0 0 10px;font-size:1rem}
	.pfe-bullet-content p{margin-bottom:12px}
	.pfe-bullet-content p + p{margin-top:2px}
	.pfe-image-card{overflow:hidden;box-shadow:0 8px 24px rgba(11,35,58,.08);margin:0}.pfe-image-card amp-img{display:block;width:100%;max-width:100%}.pfe-image-card amp-img[role="button"]{cursor:pointer}.pfe-choose-grid{margin:14px auto 0;max-width:920px}.pfe-why-gallery{margin-top:8px}.pfe-plan-box .pfe-plan-gallery{margin-top:16px;margin-left:-24px;width:calc(100% + 24px)}
	.pfe-choose-box{display:flex;flex-direction:column;align-items:flex-start;justify-content:flex-start;gap:14px;min-height:148px;max-width:440px;width:100%;margin:0 auto;padding:24px 22px}
	.pfe-choose-icon{display:inline-flex;align-items:center;justify-content:center;width:44px;height:44px;border-radius:12px;background:#eaf4ff;color:#0d73d4;flex:0 0 auto}
	.pfe-choose-icon amp-img{display:block}
	.pfe-choose-text{margin:0;line-height:1.65;color:#2f4358}
	.pfe-enterprise-grid{display:grid;grid-template-columns:1fr;gap:12px;margin:12px auto 0;max-width:920px}
	.pfe-enterprise-item{background:#fff;border:0;border-radius:12px;box-shadow:0 8px 20px rgba(11,35,58,.08);padding:14px;max-width:440px;width:100%;margin:0 auto}
	.pfe-enterprise-item h3{margin:0 0 8px;font-size:1.04rem;line-height:1.35;color:#10273f}
	.pfe-enterprise-item p{margin:0;color:#2f4358;line-height:1.7}
	.pfe-demo-cta{padding:20px;background:linear-gradient(125deg,#f7fbff 0%,#eff7ff 50%,#f4fffa 100%);box-shadow:0 16px 34px rgba(12,42,72,.12)}
	#pfe-faq amp-accordion section{border:1px solid rgba(20,114,186,.18);border-radius:10px;margin-bottom:12px;overflow:hidden;background:#fff}
	#pfe-faq amp-accordion section[expanded]{box-shadow:0 4px 16px rgba(0,0,0,.08)}
	.faq-q{margin:0;padding:16px 44px 16px 16px;font-size:17px;font-weight:700;background:#fff;display:block;color:#1a1a1a;position:relative}
	.faq-q::after{content:"+";position:absolute;right:16px;top:50%;transform:translateY(-50%);font-size:22px;line-height:1;color:#1472ba;font-weight:700}
	#pfe-faq amp-accordion section[expanded] .faq-q::after{content:"−"}
	.faq-a{padding:0 16px 16px}.faq-a p,.faq-a li{font-size:15px;line-height:1.7;color:#2c2c2c}
	.faq-a ul{margin:8px 0 0 18px;padding-left:18px}
	@media (min-width:641px){.pfe-hero,.pfe-section,.pfe-section-sm{padding:24px 20px}.pfe-why-gallery{grid-template-columns:repeat(2,minmax(0,1fr))}.pfe-why-gallery--trio figure:last-child{grid-column:1 / -1}.pfe-bullet-list--cards{grid-template-columns:repeat(2,minmax(0,1fr))}.pfe-bullet-list--cards li:nth-child(-n+2){grid-column:1/-1}.pfe-choose-grid{grid-template-columns:repeat(2,minmax(0,1fr))}.pfe-enterprise-grid{grid-template-columns:repeat(2,minmax(0,1fr))}}
	@media (min-width:641px) and (max-width:1024px){.pfe-hero-grid > .pfe-why-gallery,.pfe-why-grid > .pfe-why-gallery{grid-column:1/-1;width:100%;max-width:620px;margin:0 auto}.pfe-hero-grid,.pfe-why-grid{gap:24px}}
	@media (min-width:981px){.pfe-grid-2{grid-template-columns:repeat(2,minmax(0,1fr))}.pfe-enterprise-grid{grid-template-columns:repeat(2,minmax(0,1fr))}}
	@media (min-width:1025px){.pfe-hero-grid{grid-template-columns:1.1fr .9fr}.pfe-why-grid{grid-template-columns:1.1fr .9fr}.pfe-hero-grid > .pfe-why-gallery{grid-column:auto;width:100%;max-width:none;margin-top:8px}}
	@media (max-width:640px){.pfe-wrap{width:min(1290px,100%)}.pfe-plan-box{padding:16px}.pfe-plan-sections{gap:18px}.pfe-hero-actions a,.btn-primary{width:100%;text-align:center}}
	html,body.<?php echo esc_attr( $post_body_class ); ?>{margin:0 !important;padding:0 !important;max-width:none !important;width:100% !important;border:0 !important;box-shadow:none !important;-webkit-box-shadow:none !important;background:#fff !important;color:#0d2238;font-family:"Inter","Segoe UI",Arial,sans-serif}
	@media (max-width:1024px){html,body.<?php echo esc_attr( $post_body_class ); ?>{padding-top:0 !important;margin-top:0 !important}}
	@media (min-width:1025px){html,body.<?php echo esc_attr( $post_body_class ); ?>{padding-top:0 !important}}
	</style>
	<script type="application/ld+json"><?php echo elearnposh_amp_encode_page_schema_json_ld( $faq_schema ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></script>
	<?php elearnposh_amp_output_components( 'course', array( 'amp-accordion', 'amp-youtube', 'amp-image-lightbox' ) ); ?>
</head>
<body class="<?php echo esc_attr( $post_body_class ); ?>" style="margin:0 !important;padding:0 !important;max-width:none !important;width:100% !important;border:0 !important;box-shadow:none !important;background:#fff !important;">
	<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/menu.php'; ?>
	<div class="amp-content-wrapper" style="margin-top:60px !important;padding-top:0 !important;width:100%;">
		<main class="pfe">
			<section class="pfe-hero">
				<div class="pfe-wrap">
					<div class="pfe-hero-grid">
						<div>
							<div class="pfe-kicker">POSH for Employees - Employee Awareness Training</div>
							<h1>Build safer workplaces with practical POSH employee training</h1>
							<p>POSH for Employees is a workplace awareness training solution designed to help employees understand the POSH law, recognize inappropriate behaviour, and contribute to a safer, more respectful work environment. Whether you are looking for a strong foundational employee awareness program or a more advanced solution with microlearning, manager training, and HR compliance resources, we offer a plan to match your organization&rsquo;s needs.</p>
							<div class="pfe-hero-actions">
								<a class="btn-primary" href="<?php echo $demo_url; ?>">Schedule a Demo</a>
								<a class="pfe-btn-download" href="<?php echo $brochure_url; ?>" target="_top" download>
									<span class="pfe-dl-icon" aria-hidden="true">&#8681;</span>
									<span><?php esc_html_e( 'Download Brochure', 'elearnposh-amp' ); ?></span>
								</a>
							</div>
						</div>
						<div class="pfe-why-gallery" aria-label="POSH training preview images">
							<figure class="pfe-image-card"><amp-img on="tap:ep-image-lightbox" role="button" tabindex="0" src="https://elearnposh.com/wp-content/uploads/2026/02/POSH-Foundation-Image.png" width="1280" height="800" layout="responsive" alt="POSH for Employees slide 1"></amp-img></figure>
							<figure class="pfe-image-card"><amp-img on="tap:ep-image-lightbox" role="button" tabindex="0" src="https://elearnposh.com/wp-content/uploads/2026/02/Foundation.png" width="1280" height="800" layout="responsive" alt="POSH for Employees slide 2"></amp-img></figure>
							<figure class="pfe-image-card"><amp-img on="tap:ep-image-lightbox" role="button" tabindex="0" src="https://elearnposh.com/wp-content/uploads/2026/02/POSH-Foundation-img.png" width="1280" height="800" layout="responsive" alt="POSH for Employees slide 3"></amp-img></figure>
							<figure class="pfe-image-card"><amp-img on="tap:ep-image-lightbox" role="button" tabindex="0" src="https://elearnposh.com/wp-content/uploads/2026/02/POSH-Foundation.png" width="1280" height="800" layout="responsive" alt="POSH for Employees slide 4"></amp-img></figure>
							<figure class="pfe-image-card"><amp-img on="tap:ep-image-lightbox" role="button" tabindex="0" src="https://elearnposh.com/wp-content/uploads/2024/03/14.png" width="1280" height="800" layout="responsive" alt="POSH for Employees slide 5"></amp-img></figure>
							<figure class="pfe-image-card"><amp-img on="tap:ep-image-lightbox" role="button" tabindex="0" src="https://elearnposh.com/wp-content/uploads/2024/03/13.png" width="1280" height="800" layout="responsive" alt="POSH for Employees slide 6"></amp-img></figure>
							<figure class="pfe-image-card"><amp-img on="tap:ep-image-lightbox" role="button" tabindex="0" src="https://elearnposh.com/wp-content/uploads/2024/03/10.png" width="1280" height="800" layout="responsive" alt="POSH for Employees slide 7"></amp-img></figure>
							<figure class="pfe-image-card"><amp-img on="tap:ep-image-lightbox" role="button" tabindex="0" src="https://elearnposh.com/wp-content/uploads/2024/03/11.png" width="1280" height="800" layout="responsive" alt="POSH for Employees slide 8"></amp-img></figure>
							<figure class="pfe-image-card"><amp-img on="tap:ep-image-lightbox" role="button" tabindex="0" src="https://elearnposh.com/wp-content/uploads/2024/03/12.png" width="1280" height="800" layout="responsive" alt="POSH for Employees slide 9"></amp-img></figure>
						</div>
					</div>
				</div>
			</section>

			<section class="pfe-section-sm" id="pfe-details">
				<div class="pfe-wrap">
					<h2 class="pfe-title">Course details and highlights</h2>
					<p class="pfe-sub">Designed for better completion rates, stronger awareness, and practical workplace behaviour outcomes.</p>
					<div class="pfe-grid-2">
						<article class="pfe-card">
							<h3>Course Details</h3>
							<ul class="pfe-list">
								<li>Duration: 45 minutes</li>
								<li>Target audience: All employees</li>
								<li>Format: Self-paced, structured awareness learning</li>
							</ul>
						</article>
						<article class="pfe-card">
							<h3>Course Highlights</h3>
							<ul class="pfe-list">
								<li>Animated and interactive learning format</li>
								<li>Legally accurate content aligned with POSH law</li>
								<li>Frequently updated content and refresher support</li>
								<li>Designed for in-person, hybrid and virtual teams</li>
							</ul>
						</article>
					</div>
					<div style="margin-top:14px;text-align:center;">
						<a class="btn-primary" href="<?php echo $demo_url; ?>" aria-label="Book a Demo for POSH training">Book a Demo</a>
					</div>
				</div>
			</section>

			<section class="pfe-section-sm">
				<div class="pfe-wrap">
					<div class="pfe-info-panel">
						<div class="pfe-why-grid">
							<div>
								<h2 class="pfe-title">Why POSH Training Is Important</h2>
								<p class="pfe-sub pfe-sub-wide">POSH training is an essential part of building a safe, respectful, and legally compliant workplace. Under the POSH Act, employers are required to provide a work environment free from sexual harassment, and organizations with 10 or more employees are required to constitute an Internal Committee. The law and rules also place responsibilities on employers to organize awareness programmes, workshops, and orientation initiatives to support prevention and compliance.</p>
								<p class="pfe-sub pfe-sub-wide" style="margin-top:12px;">For organizations, this makes POSH training more than a compliance formality. It helps employees understand acceptable workplace behaviour, recognize misconduct early, improve confidence in reporting, and support a culture of accountability, dignity, and prevention. It also helps reinforce the organization&rsquo;s commitment to workplace safety across in-person, hybrid, and virtual work environments.</p>
							</div>
							<div class="pfe-why-gallery" aria-label="POSH awareness visuals">
								<figure class="pfe-image-card"><amp-img on="tap:ep-image-lightbox" role="button" tabindex="0" src="https://elearnposh.com/wp-content/uploads/2026/06/posh-compliance-hr-workplace-policy.webp" width="1280" height="880" layout="responsive" alt="HR and compliance team managing POSH policy and workplace safety initiatives"></amp-img></figure>
								<figure class="pfe-image-card"><amp-img on="tap:ep-image-lightbox" role="button" tabindex="0" src="https://elearnposh.com/wp-content/uploads/2026/06/posh-continuous-learning-microlearning.webp" width="1280" height="880" layout="responsive" alt="Continuous POSH learning through microlearning modules for ongoing workplace awareness"></amp-img></figure>
								<figure class="pfe-image-card"><amp-img on="tap:ep-image-lightbox" role="button" tabindex="0" src="https://elearnposh.com/wp-content/uploads/2026/06/safe-workplace-respectful-culture-posh.webp" width="1280" height="880" layout="responsive" alt="Employees building a safe and respectful workplace culture through POSH training"></amp-img></figure>
								<figure class="pfe-image-card"><amp-img on="tap:ep-image-lightbox" role="button" tabindex="0" src="https://elearnposh.com/wp-content/uploads/2026/06/posh-employee-training-workplace-awareness.webp" width="1280" height="880" layout="responsive" alt="POSH employee training program focused on workplace harassment awareness and compliance"></amp-img></figure>
								<figure class="pfe-image-card"><amp-img on="tap:ep-image-lightbox" role="button" tabindex="0" src="https://elearnposh.com/wp-content/uploads/2026/06/workplace-harassment-prevention-training.webp" width="1280" height="880" layout="responsive" alt="Workplace harassment prevention training session for employees under POSH guidelines"></amp-img></figure>
								<figure class="pfe-image-card"><amp-img on="tap:ep-image-lightbox" role="button" tabindex="0" src="https://elearnposh.com/wp-content/uploads/2026/06/posh-elearning-course-employees.webp" width="1280" height="880" layout="responsive" alt="POSH eLearning course designed for employee awareness and workplace safety training"></amp-img></figure>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="pfe-section">
				<div class="pfe-wrap">
					<h2 class="pfe-title">Explore Our POSH Training Plans</h2>
					<p class="pfe-sub">Our POSH course is available in two subscription options, POSH Foundation and POSH Pro, to help organizations strengthen compliance and deliver engaging POSH training at scale.</p>

					<div class="pfe-plan-sections">
						<article class="pfe-plan-box" id="<?php echo $foundation_plan_id; ?>">
							<h3>POSH Foundation</h3>
							<p>POSH Foundation is our CBT (Computer-Based Training) course designed to introduce individual contributors to the law and policy, while informing them about their rights and duties.</p>
							<p>Since sexual harassment is a sensitive topic, employees generally have many questions regarding the same. Many employees are unaware of the legalities and their responsibilities in preventing sexual harassment at the workplace.</p>
							<p>This course is designed to create awareness about the POSH law among employees. The eLearning content is curated based on SME reviews and customer feedback.</p>

							<h4>Topics Covered in the Course</h4>
							<ul class="pfe-bullet-list pfe-bullet-list-no-bullets">
								<li>POSH Law Awareness</li>
								<li>Intent vs. Impact</li>
								<li>Sexual Harassment vs. Reasonable Behaviour</li>
								<li>Virtual Workplace Do&rsquo;s and Don&rsquo;ts</li>
								<li>Bystander Intervention</li>
								<li>Personal Relationships at the Workplace</li>
							</ul>

							<h4>POSH Foundation Learning Outcomes</h4>
							<p>Through this course, employees will be able to:</p>
							<ul class="pfe-bullet-list">
								<li>Identify sexual harassment in the workplace</li>
								<li>Describe the common types of sexual harassment</li>
								<li>Distinguish between reasonable and harassing behaviour of a sexual nature</li>
								<li>Understand the difference between intent and impact</li>
								<li>Know what to do when they experience sexual harassment</li>
								<li>Understand their rights and responsibilities in preventing workplace sexual harassment</li>
								<li>Recognize what does not constitute sexual harassment</li>
							</ul>

							<h4>Refresher Learning for Ongoing Awareness</h4>
							<p>POSH awareness training should not be treated as a one-time requirement. As employees change roles, workplace contexts evolve, and time passes, refresher training helps reinforce key POSH concepts, refresh memory, and keep awareness current. In the following years, we also provide refresher courses that revisit the core principles of POSH while introducing updated and relevant content for learners who have already completed the training once.</p>
						</article>

						<article class="pfe-plan-box" id="<?php echo $pro_plan_id; ?>">
							<h3>POSH Pro</h3>
							<p>POSH Pro is an advanced 12-month POSH compliance subscription designed for organizations that want to go beyond basic awareness training and build a stronger culture of respect, accountability, and prevention. Along with the foundational employee awareness features included in POSH Foundation, POSH Pro provides additional learning formats and practical compliance resources to support employees, managers, HR teams, and organizations throughout the year.</p>
							<p>Beyond compliance, POSH Pro is designed to help organizations build a stronger culture of respect, accountability, and prevention. While awareness is the foundation, creating a truly safe and respectful workplace requires continuous engagement and behavioural change. POSH Pro goes beyond one-time training by reinforcing learning through real-life scenarios, manager enablement, and ongoing microlearning. It helps organizations not just meet compliance requirements, but actively shape a culture where respect, accountability, and inclusion are practised every day.</p>

							<h4>Advanced Offerings</h4>
							<p>In addition to everything included in POSH Foundation, POSH Pro offers the following additional features:</p>

							<ul class="pfe-bullet-list">
								<li><strong>POSH in Action, Live-Action Training Modules</strong>
									<div class="pfe-bullet-content">
										<p>POSH in Action is a live-action training format that uses realistic workplace stories to help employees understand the nuances of workplace harassment, consent, boundaries, and power dynamics.</p>
										<p>Unlike traditional slide-based learning, these modules bring real-world situations to life through professional actors, high-quality production, and legally vetted scripts, making the learning experience more immersive, relatable, and impactful.</p>
										<p>This format is especially useful in helping learners recognize subtle forms of harassment, understand the emotional impact of misconduct, and respond more appropriately in workplace situations.</p>
										<p>Through realistic workplace scenarios, POSH in Action helps employees identify verbal, visual, physical, and written forms of harassment under POSH. It also helps them understand how power dynamics and silence can contribute to hostile environments, recognize quid pro quo and virtual harassment even when it is subtle, respond more appropriately whether they are directly affected or a bystander, and better understand the role of the Internal Committee and the protections available under the POSH framework.</p>
									</div>
									<div class="pfe-why-gallery pfe-plan-gallery" aria-label="POSH in Action training module visuals">
											<figure class="pfe-image-card"><amp-img on="tap:ep-image-lightbox" role="button" tabindex="0" src="https://elearnposh.com/wp-content/uploads/2026/06/posh-harassment-awareness-training-module.webp" width="1280" height="880" layout="responsive" alt="Corporate training module illustrating harassment identification and response under POSH Act"></amp-img></figure>
											<figure class="pfe-image-card"><amp-img on="tap:ep-image-lightbox" role="button" tabindex="0" src="https://elearnposh.com/wp-content/uploads/2026/06/posh-employee-roleplay-training.webp" width="1280" height="880" layout="responsive" alt="Employees learning POSH guidelines through realistic workplace role-play training module"></amp-img></figure>
											<figure class="pfe-image-card"><amp-img on="tap:ep-image-lightbox" role="button" tabindex="0" src="https://elearnposh.com/wp-content/uploads/2026/06/posh-power-dynamics-office-training.webp" width="1280" height="880" layout="responsive" alt="Live-action training visual showing bystander response and workplace misconduct prevention"></amp-img></figure>
											<figure class="pfe-image-card"><amp-img on="tap:ep-image-lightbox" role="button" tabindex="0" src="https://elearnposh.com/wp-content/uploads/2026/06/posh-bystander-intervention-training.webp" width="1280" height="880" layout="responsive" alt="Office environment depicting power dynamics and employee communication in POSH awareness training"></amp-img></figure>
											<figure class="pfe-image-card"><amp-img on="tap:ep-image-lightbox" role="button" tabindex="0" src="https://elearnposh.com/wp-content/uploads/2026/06/Work-from-Home.webp" width="1280" height="880" layout="responsive" alt="POSH training module highlighting virtual harassment scenarios and appropriate workplace response"></amp-img></figure>
											<figure class="pfe-image-card"><amp-img on="tap:ep-image-lightbox" role="button" tabindex="0" src="https://elearnposh.com/wp-content/uploads/2026/06/posh-consent-boundaries-workplace.webp" width="1280" height="880" layout="responsive" alt="Workplace scene demonstrating professional boundaries and consent in POSH training"></amp-img></figure>
									</div>
								</li>

								<li><strong>ePOSH Bytes: 2&ndash;5 Minute Microlearning Modules</strong>
									<div class="pfe-bullet-content">
										<h4>ePOSHBytes Microlearning</h4>
										<p>ePOSHBytes are bite-sized 3 to 5 minute microlearning modules designed to keep POSH awareness active beyond the main training program. Delivered through channels such as WhatsApp, Teams, and email, these short learning bursts help reinforce key concepts, improve recall, and make refresher learning easier to consume in day-to-day work schedules. With real-world scenarios and repeatable short-format learning, ePOSHBytes are especially effective for ongoing awareness, periodic refreshers, and continuous reinforcement of important POSH topics.</p>
										<p>ePOSHBytes are ideal for monthly or quarterly refresher learning and can also be customized by selecting and combining scenarios that are most relevant to the organization&rsquo;s needs.</p>
									</div>
									<div class="pfe-why-gallery pfe-plan-gallery pfe-why-gallery--trio" aria-label="ePOSHBytes microlearning visuals">
										<figure class="pfe-image-card"><amp-img on="tap:ep-image-lightbox" role="button" tabindex="0" src="https://elearnposh.com/wp-content/uploads/2026/06/eposh-microlearning-mobile-training.webp" width="1280" height="880" layout="responsive" alt="ePOSHBytes microlearning module delivered on mobile devices for quick workplace harassment awareness"></amp-img></figure>
										<figure class="pfe-image-card"><amp-img on="tap:ep-image-lightbox" role="button" tabindex="0" src="https://elearnposh.com/wp-content/uploads/2026/06/posh-refresher-microlearning-scenarios.webp" width="1280" height="880" layout="responsive" alt="Bite-sized POSH refresher training covering real workplace scenarios and compliance topics"></amp-img></figure>
										<figure class="pfe-image-card"><amp-img on="tap:ep-image-lightbox" role="button" tabindex="0" src="https://elearnposh.com/wp-content/uploads/2026/06/posh-bite-sized-training-whatsapp-teams.webp" width="1280" height="880" layout="responsive" alt="Short POSH training modules shared via WhatsApp and Teams for continuous workplace awareness"></amp-img></figure>
									</div>
									<div class="pfe-bullet-content">
										<h4>Sample Topics Covered</h4>
										<ul class="pfe-bullet-list">
											<li>False Complaints and Witnesses</li>
											<li>Personal Relationships at Work</li>
											<li>Bystander Intervention</li>
											<li>Hostile Work Environment</li>
											<li>Intent vs Impact</li>
											<li>Offsite Conduct and Extended Workplace</li>
											<li>Complimenting on Appearance</li>
											<li>Quid Pro Quo Harassment</li>
										</ul>
									</div>
								</li>

								<li><strong>Manager eLearning (English)</strong>
									<div class="pfe-bullet-content">
										<p>A dedicated manager training module in English that helps people managers understand their role in preventing misconduct, responding appropriately, and supporting a respectful workplace culture.</p>
									</div>
								</li>

								<li><strong>Diversity Survey</strong>
									<div class="pfe-bullet-content">
										<p>A ready-to-use survey tool that helps organizations gather insights on workplace culture, inclusion, and employee perceptions related to respect and safety.</p>
									</div>
								</li>

								<li><strong>Policy Drafting Tools</strong>
									<div class="pfe-bullet-content">
										<p>Helps organizations create or customize a POSH policy quickly by generating a professionally branded draft based on key organizational inputs.</p>
									</div>
								</li>

								<li><strong>POSHters, Multilingual Editable Posters</strong>
									<div class="pfe-bullet-content">
										<p>Downloadable and editable awareness posters in multiple languages that help organizations reinforce POSH messaging across the workplace.</p>
									</div>
								</li>

								<li><strong>POSH Audit</strong>
									<div class="pfe-bullet-content">
										<p>A structured audit tool that evaluates your organization&rsquo;s alignment with POSH law and generates a report on compliance status.</p>
									</div>
								</li>

								<li><strong>District Officer Contact Details</strong>
									<div class="pfe-bullet-content">
										<p>Provides updated district officer contact information to support mandatory annual reporting and statutory filing readiness.</p>
									</div>
								</li>

								<li><strong>External Members Directory</strong>
									<div class="pfe-bullet-content">
										<p>An open free-to-use directory of available external members that helps organizations identify and connect with neutral professionals for their Internal Committee.</p>
									</div>
								</li>

								<li><strong>Organizational Compliance Certificate</strong>
									<div class="pfe-bullet-content">
										<p>A formal certificate that helps showcase your organization&rsquo;s commitment to structured POSH awareness and compliance efforts.</p>
									</div>
								</li>
							</ul>
						</article>
					</div>
				</div>
			</section>

			<section class="pfe-section-sm">
				<div class="pfe-wrap">
					<h2 class="pfe-title">Why Organizations Choose POSH for Employees</h2>
					<div class="pfe-choose-grid">
						<?php foreach ( $pfe_choose_items as $pfe_choose_item ) : ?>
						<div class="pfe-choose-box">
							<span class="pfe-choose-icon" aria-hidden="true"><amp-img src="<?php echo esc_url( $pfe_choose_item['icon'] ); ?>" width="44" height="44" layout="fixed" alt=""></amp-img></span>
							<p class="pfe-choose-text"><?php echo esc_html( $pfe_choose_item['text'] ); ?></p>
						</div>
						<?php endforeach; ?>
					</div>
				</div>
			</section>

			<section class="pfe-section-sm">
				<div class="pfe-wrap">
					<h2 class="pfe-title">Enterprise-Ready Delivery</h2>
					<div class="pfe-enterprise-grid">
						<article class="pfe-enterprise-item">
							<h3>Branded Learning Portal</h3>
							<p>Deliver POSH training through a fully branded learning portal that aligns with your organization&rsquo;s identity and learning environment.</p>
						</article>
						<article class="pfe-enterprise-item">
							<h3>Certificates and Reporting Access</h3>
							<p>Provide learners with certificates and give admins access to reports for easier tracking and compliance visibility.</p>
						</article>
						<article class="pfe-enterprise-item">
							<h3>Quick Onboarding</h3>
							<p>Go live faster with onboarding and activation options designed to reduce rollout time and effort.</p>
						</article>
						<article class="pfe-enterprise-item">
							<h3>Flexible Activation Options</h3>
							<p>Support smoother deployment with activation options such as triggered emails, pre-set passwords, user-set passwords, and two-factor authentication (2FA).</p>
						</article>
						<article class="pfe-enterprise-item">
							<h3>Integration-Ready Deployment</h3>
							<p>Enable easier implementation through SSO, HR system, and reporting integration capabilities where needed.</p>
						</article>
						<article class="pfe-enterprise-item">
							<h3>Automated Reminder Workflows</h3>
							<p>Improve completion rates with reminder emails and follow-up workflows that reduce manual effort.</p>
						</article>
						<article class="pfe-enterprise-item">
							<h3>Secure Enterprise-Grade Access</h3>
							<p>Support organizational rollout with secure access, privacy-focused implementation, and enterprise-class platform standards.</p>
						</article>
					</div>
				</div>
			</section>

			<section class="pfe-section-sm">
				<div class="pfe-wrap">
					<div class="pfe-demo-cta ep-cta-shell--white">
						<h2 class="pfe-title">Schedule a Demo</h2>
						<p class="pfe-sub">Whether you need a strong foundational POSH course for all employees or a more advanced subscription with microlearning, manager training, and HR support resources, our employee training solutions are designed to help organizations build safer, more respectful workplaces. Get a product walkthrough, plan guidance, and deployment support.</p>
						<div style="margin-top:14px;">
							<a class="btn-primary" href="<?php echo $demo_url; ?>" aria-label="Schedule a Demo">Schedule a Demo</a>
						</div>
						<div style="margin-top:14px;">
							<amp-youtube data-videoid="2u_YZty7nd4" layout="responsive" width="16" height="9"></amp-youtube>
						</div>
					</div>
				</div>
			</section>

			<section class="pfe-section" id="pfe-faq">
				<div class="pfe-wrap">
					<h2 class="pfe-title">FAQs</h2>
					<amp-accordion animate expand-single-section>
						<section expanded>
							<h3 class="faq-q">1. What is the full form of POSH?</h3>
							<div class="faq-a">
								<p>The full form of POSH is Prevention of Sexual Harassment. This concept is based on the Sexual Harassment of Women at Workplace (Prevention, Prohibition and Redressal) Act, 2013. This Act is also otherwise called the POSH Act, 2013. Under this Act, organizations have to adhere to certain compliance standards to prevent sexual harassment in the workplace.</p>
							</div>
						</section>

						<section>
							<h3 class="faq-q">2. What is POSH Training?</h3>
							<div class="faq-a">
								<p>Prevention of Sexual Harassment (POSH) training is a program designed to educate employees about recognizing, preventing, and addressing sexual harassment in the workplace. It typically covers the legal framework, company policies on harassment, employee rights and responsibilities, and procedures for reporting and handling complaints. The aim is to create a safe and respectful work environment.</p>
								<p>POSH training in an organization includes two primary levels: one for general employees and one specifically tailored for members of the Internal Committee (IC), responsible for addressing harassment complaints. Additionally, there is specialized training for managers. The content covered encompasses:</p>
								<ul>
									<li><strong>For Employees:</strong> This training focuses on awareness about what constitutes sexual harassment, the legal framework, and company policies. It aims to educate employees on their rights, responsibilities, and the procedures for reporting incidents.</li>
									<li><strong>For Internal Committee Members:</strong> This level delves deeper into the process of handling complaints, ensuring proper investigation, and maintaining confidentiality. It equips IC members with the skills necessary to address complaints sensitively and effectively.</li>
									<li><strong>For Managers:</strong> This training typically covers how to create a respectful workplace culture, respond to reports of harassment, and support team members while adhering to legal and company policies. However, unlike employee and IC training, manager training is not a legal requirement but is often implemented to strengthen the organization&rsquo;s commitment to a harassment-free workplace.</li>
								</ul>
							</div>
						</section>

						<section>
							<h3 class="faq-q">3. What is the POSH Act?</h3>
							<div class="faq-a">
								<p>The POSH (Prevention of Sexual Harassment) Act in India, formally known as the Sexual Harassment of Women at Workplace (Prevention, Prohibition and Redressal) Act, 2013, is a law aimed at preventing sexual harassment of women in the workplace. It mandates creating an Internal Committee in organizations with 10 or more employees, outlines procedures for handling complaints, and ensures confidentiality and protection for complainants. The Act covers all workplaces and applies to all women, irrespective of their employment status. It also requires organizations to conduct regular training and awareness programs about sexual harassment.</p>
							</div>
						</section>

						<section>
							<h3 class="faq-q">4. Why POSH training?</h3>
							<div class="faq-a">
								<p>POSH training is legally mandatory, with non-compliance leading to significant penalties. Beyond legal compliance, all employees need to understand what constitutes sexual harassment and the appropriate responses to such incidents. This training is crucial for protecting employees&rsquo; rights and promoting workplace equality and must be provided to everyone, regardless of their role or gender.</p>
							</div>
						</section>

						<section>
							<h3 class="faq-q">5. Is compliance with the POSH Act mandatory?</h3>
							<div class="faq-a">
								<p>Yes, compliance with the POSH (Prevention of Sexual Harassment) Act is mandatory for all organizations in India that have 10 or more employees. The Act requires these organizations to implement specific measures to prevent and redress sexual harassment in the workplace. This includes forming an Internal Committee (IC), conducting regular training and awareness programs, establishing a process for handling and resolving complaints, and ensuring protection and confidentiality for those involved in a complaint.</p>
							</div>
						</section>

						<section>
							<h3 class="faq-q">6. How long is the POSH employee Training?</h3>
							<div class="faq-a">
								<p>eLearnPOSH&rsquo;s POSH employee training is designed to last 45 minutes. This duration is structured to effectively cover key topics such as understanding what constitutes sexual harassment, the legal framework of the POSH Act, and the procedures for reporting and addressing such incidents in the workplace.</p>
							</div>
						</section>

						<section>
							<h3 class="faq-q">7. How do you provide POSH training to employees?</h3>
							<div class="faq-a">
								<p>eLearnPOSH provides POSH training through a variety of e-learning courses tailored to the specific needs of different groups like employees, Internal Committee members, and managers. These courses are designed to be engaging and interactive, ensuring comprehensive understanding and compliance with POSH guidelines. Regular updates and feedback mechanisms help keep the training relevant and effective. Additionally, we conduct three Internal Committee webinars each year as part of our IC subscription. These webinars serve as an interactive platform for in-depth discussions, updates, and case studies, complementing the e-learning modules.</p>
							</div>
						</section>

						<section>
							<h3 class="faq-q">8. What is the time limit under the POSH Act to file a complaint?</h3>
							<div class="faq-a">
								<p>Under the POSH Act, a complaint of sexual harassment must be filed within 3 months of the last incident. In certain circumstances, the Internal Committee (IC) may extend this time limit to a further 3 months if the complainant can provide sufficient reason for the delay.</p>
							</div>
						</section>

						<section>
							<h3 class="faq-q">9. What is the penalty under POSH Law?</h3>
							<div class="faq-a">
								<p>Under the POSH Law, if an employer fails to comply with the statutory requirements, they can face a fine of up to INR 50,000. Repeated violations can lead to increased penalties, including a doubled fine for subsequent offences, and may even result in the cancellation of the business license or withdrawal of any governmental or statutory benefits. The Act emphasizes the importance of creating a safe work environment for women and holds organizations accountable for implementing and enforcing its provisions.</p>
							</div>
						</section>

						<section>
							<h3 class="faq-q">10. What is sexual harassment in the workplace?</h3>
							<div class="faq-a">
								<p>Sexual harassment refers to unwelcome or inappropriate behaviour of a sexual nature that is committed in a professional or social setting. It can occur in various forms, including verbal, non-verbal, or physical conduct. Sexual harassment is a violation of an individual&rsquo;s rights and can create a hostile or intimidating environment.</p>
								<p>Sexual harassment is defined under the POSH Act, 2013 as sexual harassment includes any one or more of the following unwelcome acts or behaviour (whether directly or by implication) namely:</p>
								<ul>
									<li>Physical contact and advances; or</li>
									<li>A demand or request for sexual favours; or</li>
									<li>Making sexually coloured remarks; or</li>
									<li>Showing pornography; or</li>
									<li>Any other unwelcome physical, verbal or non-verbal conduct of sexual nature.</li>
								</ul>
							</div>
						</section>

						<section>
							<h3 class="faq-q">11. Which laws in India offer protection from sexual harassment?</h3>
							<div class="faq-a">
								<p>The primary law in India that provides protection against sexual harassment to women in the workplace is the Sexual Harassment of Women at Workplace (Prevention, Prohibition, and Redressal) Act, 2013. This legislation outlines the guidelines and procedures for addressing complaints of sexual harassment in the workplace and aims to create a safe and conducive working environment for women. Additionally, provisions related to sexual harassment may also be found in other laws, such as the Indian Penal Code and Transgender Persons (Protection of Rights) Act, 2019.</p>
							</div>
						</section>

						<section>
							<h3 class="faq-q">12. What are the compliance requirements under the POSH Law?</h3>
							<div class="faq-a">
								<p>The Sexual Harassment of Women at Workplace (Prevention, Prohibition, and Redressal) Act, 2013, commonly known as the POSH Act, mandates specific compliance requirements for organizations to ensure a safe and respectful work environment. Key compliance requirements under the POSH law include:</p>
								<ul>
									<li><strong>Policy Drafting:</strong> Organizations must formulate and implement a comprehensive policy against sexual harassment. The policy should be communicated to all employees and prominently displayed in the workplace.</li>
									<li><strong>Internal Committee:</strong> Establish an Internal Committee at each office or branch with ten or more employees. The IC is responsible for addressing and resolving complaints of sexual harassment.</li>
									<li><strong>Training Programs:</strong> Conduct awareness programs to educate employees about the prevention and consequences of sexual harassment and the redressal mechanism. Conduct Internal Committee (IC) training to empower members in handling sexual harassment complaints effectively and ensuring a safe and inclusive workplace.</li>
									<li><strong>Annual Reports:</strong> Submit an annual report to the District Officer, detailing the complaints received, actions taken under the POSH Act and the measures taken to prevent sexual harassment at the workplace.</li>
								</ul>
							</div>
						</section>
					</amp-accordion>
				</div>
			</section>
		</main>
		<div class="hrtag-end"></div>
	</div>
	<?php elearnposh_amp_render_image_lightbox_shell(); ?>
	<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/footer.php'; ?>
</body>
</html>