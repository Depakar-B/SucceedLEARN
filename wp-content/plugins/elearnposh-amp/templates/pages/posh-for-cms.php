<?php
/**
 * POSH for CMS AMP Template
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$contact_url       = '#schedule-a-demo';
$post_body_class   = 'post-' . absint( get_the_ID() );
$cms_demo_video_id = 'O4O9XKIKT64';

$pfecms_hero_image = array(
	'src'         => 'https://elearnposh.com/wp-content/uploads/2026/06/Make-POSH-Compliance-Simpler-When-It-Matters-Most-scaled.webp',
	'alt'         => 'POSH Complaints Management System (CMS) by eLearnPOSH',
	'width'       => 1280,
	'height'      => 960,
	'hero'        => true,
	'no_lightbox' => true,
);

$pfecms_challenges = array(
	array(
		'num'   => '01',
		'title' => 'No Structured Complaint Reporting Process',
		'lead'  => 'Employees often don\'t know:',
		'items' => array(
			'Where to report',
			'How to report',
			'Whom to approach',
			'Whether their complaint will remain confidential',
		),
		'note'  => 'This creates hesitation, fear, and delayed reporting.',
	),
	array(
		'num'   => '02',
		'title' => 'Confidential Information Becomes Difficult to Control',
		'lead'  => 'When complaints are managed through emails, spreadsheets, and shared folders:',
		'items' => array(
			'Sensitive information becomes accessible beyond the Internal Committee.',
			'Evidence gets scattered across multiple files and emails.',
			'Documentation becomes difficult to manage.',
		),
		'note'  => 'One accidental breach can permanently damage employee trust.',
	),
	array(
		'num'   => '03',
		'title' => 'Critical POSH Timelines Get Missed',
		'lead'  => 'Without a structured process, organisations risk:',
		'items' => array(
			'Delayed responses',
			'Incomplete documentation',
			'Missed inquiry deadlines',
			'Prolonged investigations',
		),
		'note'  => 'Even one missed step can create legal and reputational consequences.',
	),
	array(
		'num'        => '04',
		'title'      => 'No Centralised Visibility Into Active Cases',
		'lead'       => 'When cases are managed across emails and documents:',
		'items'      => array(
			'There is no single source of truth.',
			'Leadership lacks visibility.',
			'Follow-ups become inconsistent.',
			'Accountability suffers.',
		),
		'note_title' => 'POSH Inquiry Timeline',
		'note'       => 'POSH inquiries involve multiple stages, timelines, and responsibilities. Tracking every deadline manually becomes difficult and error-prone.',
	),
);

$pfecms_intro_features = array(
	'Streamline complaint handling',
	'Maintain confidentiality',
	'Track inquiry timelines',
	'Centralise evidence',
	'Ensure compliant case resolution',
);

$pfecms_workflow_steps = array(
	'Complaint Filed',
	'Evidence Collection',
	'Inquiry Process',
	'Recommendations',
	'Case Closed',
);

$pfecms_benefits = array(
	array(
		'num'   => '01',
		'icon'  => '🤝',
		'title' => 'Build Employee Trust',
		'text'  => 'Provide employees with a safe, confidential, and structured process to report workplace concerns with confidence.',
	),
	array(
		'num'   => '02',
		'icon'  => '🛡',
		'title' => 'Reduce Compliance Risk',
		'text'  => 'Ensure every complaint follows documented workflows and legally aligned POSH timelines.',
	),
	array(
		'num'   => '03',
		'icon'  => '🔒',
		'title' => 'Maintain Confidentiality',
		'text'  => 'Restrict sensitive case information to authorised Internal Committee members only.',
	),
	array(
		'num'   => '04',
		'icon'  => '⏰',
		'title' => 'Prevent Delays',
		'text'  => 'Automated reminders ensure important inquiry milestones and statutory deadlines are never overlooked.',
	),
	array(
		'num'   => '05',
		'icon'  => '📊',
		'title' => 'Improve Accountability',
		'text'  => 'Track every action, status update, evidence upload, meeting, and recommendation from one secure dashboard with complete visibility throughout the case lifecycle.',
	),
);

$pfecms_manual_vs_cms_rows = array(
	array(
		'manual' => 'Complaints lost across emails and folders',
		'cms'    => 'Centralised case management',
	),
	array(
		'manual' => 'Confidential information accessible beyond IC',
		'cms'    => 'Restricted role-based access',
	),
	array(
		'manual' => 'Missed timelines and follow-ups',
		'cms'    => 'Automated reminders and tracking',
	),
	array(
		'manual' => 'Scattered evidence and documents',
		'cms'    => 'Secure evidence repository',
	),
	array(
		'manual' => 'No visibility into case progress',
		'cms'    => 'Real-time dashboard visibility',
	),
	array(
		'manual' => 'Inconsistent inquiry management',
		'cms'    => 'Structured POSH workflows',
	),
	array(
		'manual' => 'Difficult audit preparation',
		'cms'    => 'Complete audit-ready records',
	),
);

$pfecms_employee_features = array(
	array(
		'icon'  => '🛡️',
		'title' => 'Safe Reporting',
		'text'  => 'Raise concerns confidentially without fear or hesitation.',
	),
	array(
		'icon'  => '📝',
		'title' => 'Simple Process',
		'text'  => 'File and track complaints without complex paperwork.',
	),
	array(
		'icon'  => '⏰',
		'title' => 'Timely Action',
		'text'  => 'Know your case is being handled fairly and efficiently.',
	),
);

$pfecms_ic_employer_features = array(
	array(
		'icon'  => '🛡️',
		'title' => 'Risk Mitigation',
		'text'  => 'Avoid legal exposure with structured, compliant case handling.',
	),
	array(
		'icon'  => '✅',
		'title' => 'Audit-Ready Compliance',
		'text'  => 'Maintain complete records and documentation for inspections.',
	),
	array(
		'icon'  => '📚',
		'title' => 'Seamless Management',
		'text'  => 'Handle every case from one secure platform.',
	),
	array(
		'icon'  => '📈',
		'title' => 'Transparent Tracking',
		'text'  => 'Monitor progress and ensure accountability at every stage.',
	),
);

$pfecms_why_choose_features = array(
	array(
		'icon'  => '📋',
		'title' => 'Allegation-Based Tracking',
		'text'  => 'Investigate each allegation separately for greater clarity, consistency, and objective decision-making.',
	),
	array(
		'icon'  => '⏰',
		'title' => 'Automated Timeline Management',
		'text'  => 'Stay compliant with statutory inquiry timelines through automated reminders and workflow tracking.',
	),
	array(
		'icon'  => '🛡️',
		'title' => 'Built-In Confidentiality',
		'text'  => 'Restrict access to sensitive information using confidentiality-first workflows and role-based permissions.',
	),
	array(
		'icon'  => '📁',
		'title' => 'Secure Evidence Management',
		'text'  => 'Store, organise, and retrieve all case-related documents and evidence securely from one location.',
	),
	array(
		'icon'  => '🔐',
		'title' => 'Bank-Grade Security',
		'text'  => 'Protect every case using encryption, two-factor authentication, CAPTCHA, and complete audit logs.',
	),
	array(
		'icon'  => '🖥️',
		'title' => 'Screen Protection',
		'text'  => 'Reduce unauthorised sharing through dynamic watermarking and secure viewing controls.',
	),
	array(
		'icon'  => '📄',
		'title' => 'One-Click Report Generation',
		'text'  => 'Generate professional investigation reports instantly with secure sharing and download options.',
	),
);

$pfecms_architecture_nodes = array(
	array(
		'num'   => '01',
		'icon'  => '🛡️',
		'title' => 'Designed Specifically for POSH Complaint Management',
	),
	array(
		'num'   => '02',
		'icon'  => '👥',
		'title' => 'Built Around Internal Committee Processes',
	),
	array(
		'num'   => '03',
		'icon'  => '⚖️',
		'title' => 'Structured Investigation Management',
	),
	array(
		'num'   => '04',
		'icon'  => '✓',
		'title' => 'Allegation-Based Inquiry Handling',
	),
	array(
		'num'   => '05',
		'icon'  => '⏰',
		'title' => 'Timeline-Driven Case Tracking',
	),
	array(
		'num'   => '06',
		'icon'  => '🔒',
		'title' => 'Confidentiality-First Architecture',
	),
	array(
		'num'   => '07',
		'icon'  => '📁',
		'title' => 'Secure Evidence Management',
	),
	array(
		'num'   => '08',
		'icon'  => '📄',
		'title' => 'Audit-Ready Reporting',
	),
);

$pfecms_faq_items = array(
	array(
		'question'    => 'What is a POSH Case Management System?',
		'answer_html' => '<p>A POSH Case Management System is a digital platform designed to manage workplace harassment complaints efficiently. It helps companies handle reporting, investigation, documentation, and resolution while staying compliant with POSH regulations.</p>',
	),
	array(
		'question'    => 'How does CMS simplify POSH compliance?',
		'answer_html' => '<p>Our CMS automates the entire process, from complaint filing to final resolution. With features like allegation-based tracking, automated reminders, and report generation, it ensures compliance without manual effort.</p>',
	),
	array(
		'question'    => 'Who is a complainant and who is a respondent in a POSH case?',
		'answer_html' => '<p>In a POSH complaint, the complainant is the person who reports or files a complaint of sexual harassment at the workplace. The respondent is the person against whom the complaint has been made.</p>',
	),
	array(
		'question'    => 'What is considered an allegation in a POSH complaint?',
		'answer_html' => '<p>An allegation is a specific claim that the respondent engaged in inappropriate behavior with a sexual nature. Each allegation represents one distinct action or incident that needs to be evaluated during the inquiry.</p><p>Example: If an employee says a colleague made an inappropriate joke and later sent uncomfortable messages, these would be two separate allegations, even though they are part of the same complaint.</p>',
	),
	array(
		'question'    => 'What is an allegation-based approach in POSH case investigations?',
		'answer_html' => '<p>An allegation-based approach (ABA) is a method where a complaint is broken down into separate incidents (allegations), and each one is investigated individually. This helps the Internal Committee stay objective and avoid confusion, especially when complaints are detailed or emotionally complex.</p><p>Example: If a complainant reports inappropriate comments, repeated messages, and an incident at an office event, each of these is treated as a separate allegation and examined on its own.</p>',
	),
	array(
		'question'    => 'What are the advantages of using the allegation-based approach (ABA) in POSH cases?',
		'answer_html' => '<p>The allegation-based approach (ABA) helps Internal Committees handle complaints in a more structured and effective way. By breaking down a complaint into individual allegations, it allows each incident to be examined separately, ensuring clarity and focus.</p><p>This approach is time-efficient, objective, and evidence-driven, as decisions are based on specific incidents rather than a general narrative. While there are multiple ways to conduct an inquiry, ABA is widely preferred because it leads to more structured investigations and fairer outcomes.</p>',
	),
	array(
		'question'    => 'Why is confidentiality important in POSH cases and how does a CMS help maintain it?',
		'answer_html' => '<p>Confidentiality is crucial in POSH cases to protect the privacy, dignity, and safety of all parties involved. Any breach can lead to stigma, retaliation, or loss of trust in the process, making it essential to handle information with utmost care.</p><p>A POSH Case Management System helps maintain confidentiality by providing secure access controls, NDA integration, data encryption, and activity tracking, ensuring that sensitive information is only accessible to authorized individuals and remains protected at every stage of the inquiry.</p>',
	),
	array(
		'question'    => 'How is evidence handled in a POSH case and how does a CMS help?',
		'answer_html' => '<p>In a POSH inquiry, all evidence, such as statements, documents, emails, chat logs, and recordings, must be carefully documented, verified, and stored securely. The Internal Committee is responsible for maintaining accurate and complete records throughout the investigation to ensure transparency, fairness, and compliance.</p><p>Our CMS simplifies this by providing a secure, centralized platform to upload, organize, and access all evidence in one place. With features like controlled access, encryption, watermarking, and audit trails, the CMS ensures that evidence remains protected, tamper-proof, and easily retrievable whenever needed.</p>',
	),
	array(
		'question'    => 'What is the typical timeline for resolving a POSH complaint?',
		'answer_html' => '<p>A POSH complaint follows a defined step-by-step timeline to ensure timely and fair resolution. After a complaint is received, a copy is shared with the respondent within 7 working days, and the respondent must submit a written response within 10 working days.</p><p>The Internal Committee then conducts the inquiry or conciliation process, which must be completed within 90 days. Once the inquiry is concluded, the IC submits its recommendations within 10 days, after which the employer takes appropriate action based on the findings within 60 days.</p><p>This structured timeline ensures that cases are handled efficiently without unnecessary delays. Our CMS helps track each stage, sends reminders, and ensures all deadlines are met seamlessly.</p>',
	),
	array(
		'question'    => 'What is the difference between an Internal Committee (IC) and a Case Panel in POSH cases?',
		'answer_html' => '<p>The Internal Committee is a legally mandated body under the POSH Act responsible for handling and resolving workplace sexual harassment complaints. It is a permanent committee within a company, consisting of designated members as per legal requirements.</p><p>A Case Panel is a smaller group formed from IC members to handle a specific case. It focuses on conducting the inquiry, reviewing evidence, and making recommendations for that particular complaint.</p><ul><li>The IC is the official body responsible for all POSH cases in the company.</li><li>The Case Panel is a subset of the IC assigned to investigate an individual case.</li></ul>',
	),
	array(
		'question'    => 'What qualifies as sexual harassment under POSH?',
		'answer_html' => '<p>Sexual harassment includes unwelcome acts such as inappropriate comments, physical contact, requests for favors, sharing explicit content, or any behavior with a sexual connotation that creates a hostile work environment.</p>',
	),
	array(
		'question'    => 'What is the time limit to file a POSH complaint?',
		'answer_html' => '<p>A complaint should ideally be filed within 3 months from the date of the last incident.</p>',
	),
	array(
		'question'    => 'What is conciliation in a POSH case and when is it used?',
		'answer_html' => '<p>Conciliation is an alternative dispute resolution process under the POSH Act that allows the complainant and respondent to settle the matter amicably without going through a full inquiry. It can only be initiated if the complainant requests it, and the Internal Committee acts as a neutral mediator throughout the process.</p>',
	),
	array(
		'question'    => 'Can a POSH case be settled through monetary compensation during conciliation?',
		'answer_html' => '<p>No, monetary compensation cannot be the basis of conciliation under the POSH Act. This rule exists to prevent misuse of the law, such as coercion or financial pressure.</p><p>Instead, conciliation outcomes may include actions like an apology, commitment to stop the behavior, or other mutually agreed non-monetary terms.</p>',
	),
	array(
		'question'    => 'What is an ex-parte decision in a POSH inquiry?',
		'answer_html' => '<p>An ex-parte decision means the IC continues the inquiry and makes a decision without the participation of the absent party, after giving proper notice. This ensures the process is not delayed unnecessarily.</p>',
	),
	array(
		'question'    => 'What constitutes a workplace under the POSH Act?',
		'answer_html' => '<p>Under the POSH Act, a workplace is defined broadly and goes beyond just the physical office. It includes any place where an employee works or is present as part of their employment.</p><ul><li>Office premises and branch locations</li><li>Work-from-home or remote work environments</li><li>Client sites or offsite meetings</li><li>Company-provided transportation</li><li>Work-related events, conferences, or travel</li></ul><p>In simple terms, any location connected to work where professional interactions occur can be considered a workplace under the POSH Act.</p>',
	),
	array(
		'question'    => 'Can a complaint be filed for incidents outside of office hours?',
		'answer_html' => '<p>Yes, a POSH complaint can be filed even if the incident occurs outside of official office hours, as long as it is connected to the workplace or arises out of a work-related context.</p><p>This includes situations such as work trips, office parties, client meetings, or any interaction linked to employment. The key factor is not the time, but whether the incident is related to the professional environment.</p><p>Example: If inappropriate behavior occurs during a team dinner or business travel, it can still be considered a valid POSH complaint.</p>',
	),
	array(
		'question'    => 'What are the consequences of filing a false POSH complaint?',
		'answer_html' => '<p>If a complaint is found to be malicious or intentionally false, the Internal Committee may recommend action against the complainant as per company policies and the POSH Act. This can include disciplinary measures similar to those applicable to the respondent.</p><p>Genuine complaints made in good faith are protected, but deliberately false accusations may lead to consequences.</p>',
	),
	array(
		'question'    => 'Is POSH training mandatory for companies?',
		'answer_html' => '<p>Yes, POSH training is mandatory for companies under the POSH Act. Employers are required to create awareness about workplace sexual harassment, educate employees about their rights and responsibilities, and ensure that members of the Internal Committee are properly trained to handle complaints.</p>',
	),
	array(
		'question'    => 'Is an Internal Committee (IC) mandatory for every company?',
		'answer_html' => '<p>Yes, as per the POSH Act, it is mandatory for every company with 10 or more employees to constitute an Internal Committee.</p>',
	),
	array(
		'question'    => 'Who are the members of the Internal Committee (IC) under the POSH Act?',
		'answer_html' => '<p>The Internal Committee must consist of a Presiding Officer (a senior woman employee), at least two employee members, and one external member who is familiar with issues related to sexual harassment or legal matters.</p><p>The presence of an external member ensures impartiality, while having a woman as the Presiding Officer helps create a more sensitive and balanced approach to handling complaints.</p>',
	),
	array(
		'question'    => 'What is the required percentage of women representation in the Internal Committee (IC)?',
		'answer_html' => '<p>As per the POSH Act, at least 50% of the members of the Internal Committee must be women.</p>',
	),
);

$pfecms_faq_schema = array(
	'@context'   => 'https://schema.org',
	'@type'      => 'FAQPage',
	'mainEntity' => array(),
);

foreach ( $pfecms_faq_items as $pfecms_faq_item ) {
	$pfecms_faq_schema['mainEntity'][] = array(
		'@type'          => 'Question',
		'name'           => $pfecms_faq_item['question'],
		'acceptedAnswer' => array(
			'@type' => 'Answer',
			'text'  => wp_strip_all_tags( $pfecms_faq_item['answer_html'] ),
		),
	);
}

$pfecms_contact_form_html = '';
if ( function_exists( 'elearnposh_amp_render_contact_form' ) ) {
	$pfecms_contact_form_html = elearnposh_amp_render_contact_form(
		array(
			'form_id'     => 'ep-cms-amp-demo',
			'title'       => '',
			'description' => '',
			'compact'     => true,
			'desktop_ui'  => true,
			'page_source' => 'POSH for CMS',
		)
	);
}
?>
<!doctype html>
<html amp lang="<?php echo esc_attr( get_bloginfo( 'language' ) ); ?>">
<head>
	<meta charset="utf-8" />
	<link rel="shortcut icon" href="<?php echo esc_url( elearnposh_amp_get_favicon_url() ); ?>" type="image/png" />
	<title><?php echo esc_html( get_the_title() ); ?> - eLearnPOSH</title>
	<?php do_action( 'amp_post_template_head', $this ); ?>
	<style amp-custom>
	<?php elearnposh_amp_output_optimized_css( 'course', array( 'course-page', 'menu', 'footer' ) ); ?>
	<?php
	if ( function_exists( 'elearnposh_amp_get_contact_form_css' ) && '' !== trim( $pfecms_contact_form_html ) ) {
		echo elearnposh_amp_get_contact_form_css(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
	?>
	.pfe{--bg:#fff;--text:#0d2238;--muted:#54708d;--line:#d9e6f6;--container:min(1290px,100%);background:var(--bg);color:var(--text);font-family:"Inter","Segoe UI",Arial,sans-serif;overflow-x:hidden;padding:0 0 22px}
	.pfe *{box-sizing:border-box}.pfe a{text-decoration:none}.pfe-wrap{width:var(--container);margin:0 auto}
	.btn-primary{display:inline-block;background:var(--posh-demo-btn-bg,#01465d);color:#fff;padding:10px 18px;border-radius:8px;font-weight:700}
	.pfe-hero{background:radial-gradient(900px 460px at 0% 0%,rgba(47,144,239,.14),transparent 70%),radial-gradient(900px 460px at 100% 0%,rgba(10,154,116,.1),transparent 72%),#fff}
	.pfe-hero-grid{display:grid;grid-template-columns:1fr;gap:16px}
	.pfe-hero-visual{width:100%;min-width:0;margin-top:8px}
	.pfe-hero-grid > *{min-width:0}
	.pfe-title--intro{display:block;font-size:clamp(1.18rem,1rem + .45vw,1.4rem);font-weight:500;line-height:1.25;margin-bottom:12px}
	.pfe-image-card--hero{border:1px solid var(--line);border-radius:18px}
	.pfe-kicker{display:inline-flex;align-items:center;flex-wrap:wrap;gap:4px 6px;max-width:100%;padding:5px 11px;margin:0 0 10px;border-radius:999px;background:rgba(234,244,255,.9);border:1px solid #d4e8fb;color:#0c5fae;font-size:11px;font-weight:600;line-height:1.4;letter-spacing:.02em}
	.pfe-hero h1{margin:0 0 14px;font-size:clamp(1.85rem,1.2rem + 2.2vw,3rem);line-height:1.12}.pfe-hero p{margin:0;color:var(--muted);font-size:16px;line-height:1.8}
	.pfe-hero-actions{margin-top:20px;display:flex;flex-wrap:wrap;gap:10px;align-items:center}
	.pfe-image-card{overflow:hidden;box-shadow:0 8px 24px rgba(11,35,58,.08);margin:0;background:#fff;border:0;border-radius:14px}.pfe-image-card amp-img{display:block;width:100%;max-width:100%}.pfe-image-card amp-img[role="button"]{cursor:pointer}
	.pfe-hero,.pfe-section,.pfe-section-sm{padding:18px 16px}.pfe-title{margin:0 0 12px;font-size:clamp(1.5rem,1.1rem + 1.3vw,2.1rem);line-height:1.2;color:var(--text)}.pfe-title .pfe-title-accent{color:var(--brand)}.pfe-sub{margin:0;color:var(--muted);line-height:1.75;font-size:16px}
	#pfe-faq .pfe-section-tag{display:table;margin:0 auto 12px}
	#pfe-faq .pfe-title{text-align:center;max-width:900px;margin-left:auto;margin-right:auto}
	#pfe-faq .pfe-faq-intro{text-align:center;max-width:860px;margin:0 auto 32px}
	.pfe-demo-cta--center{text-align:center}
	.pfe-demo-cta--center .pfe-title,.pfe-demo-cta--center .pfe-sub{margin-left:auto;margin-right:auto}
	.pfe-cms-form{background:#fff;border:1px solid #dbe8f3;border-radius:16px;box-shadow:0 10px 28px rgba(0,42,56,.08);padding:0;margin:0 0 30px;overflow:hidden}
	.pfe-close-cta-actions{margin-top:14px}
	<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'styles/posh-for-cms-page.php'; ?>
	<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'partials/faq-accordion-styles.php'; ?>
	@media (min-width:641px){.pfe-hero,.pfe-section,.pfe-section-sm{padding:24px 20px}}
	@media (min-width:641px) and (max-width:1024px){.pfe-hero-grid > .pfe-hero-visual{grid-column:1/-1;width:100%;max-width:620px;margin:0 auto}.pfe-hero-grid{gap:24px}}
	@media (min-width:1025px){.pfe-hero-grid{grid-template-columns:1.1fr .9fr}.pfe-hero-grid > .pfe-hero-visual{grid-column:auto;width:100%;max-width:none;margin-top:0}}
	@media (max-width:640px){.pfe-wrap{width:min(1290px,100%)}.pfe-hero-actions a,.btn-primary{width:100%;text-align:center}}
	<?php elearnposh_amp_output_course_pfe_extended_styles(); ?>
	<?php elearnposh_amp_output_top_courses_styles(); ?>
	</style>
	<script type="application/ld+json"><?php echo elearnposh_amp_encode_page_schema_json_ld( $pfecms_faq_schema ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></script>
	<?php
	$pfecms_amp_components = array( 'amp-youtube', 'amp-accordion' );
	if ( '' !== trim( $pfecms_contact_form_html ) ) {
		$pfecms_amp_components[] = 'amp-form';
	}
	elearnposh_amp_output_components( 'course', $pfecms_amp_components );
	?>
</head>
<body class="<?php echo esc_attr( $post_body_class ); ?>">
	<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/menu.php'; ?>
	<div class="amp-content-wrapper">
		<main class="pfe">
			<section class="pfe-hero">
				<div class="pfe-wrap">
				<?php elearnposh_amp_render_breadcrumbs(); ?>
					<div class="pfe-hero-grid">
						<div>
							<span class="pfe-kicker">Delay in Action is Denial of Justice</span>
							<h1>POSH Complaints Management System (CMS)</h1>
							<p>A POSH complaint is more than a case.</p>
							<p>It involves trust, confidentiality, legal responsibility, and employee safety. Experiencing workplace harassment is already overwhelming. The process of reporting and resolution shouldn't add to that burden.</p>
							<p>Handle POSH complaints confidentially, track every timeline, and manage investigations seamlessly from one secure platform.</p>
							<div class="pfe-hero-actions">
								<a class="btn-primary" href="<?php echo esc_url( $contact_url ); ?>"><?php esc_html_e( 'Request a Walkthrough', 'elearnposh-amp' ); ?></a>
							</div>
						</div>
						<div class="pfe-hero-visual">
							<?php elearnposh_amp_render_image_card( $pfecms_hero_image ); ?>
						</div>
					</div>
				</div>
			</section>

			<section class="pfe-section-sm pfe-section-sm--muted">
				<div class="pfe-wrap">
					<div class="pfe-section-head">
						<span class="pfe-section-tag"><?php esc_html_e( 'Why Organisations Need CMS', 'elearnposh-amp' ); ?></span>
						<h2 class="pfe-title"><?php esc_html_e( 'Why POSH Case Handling Becomes Difficult Without a Structured System', 'elearnposh-amp' ); ?></h2>
						<p class="pfe-sub"><?php esc_html_e( 'Most organisations have POSH policies and awareness training in place. However, when an actual complaint is filed, they often struggle with complaint management, inquiry tracking, documentation, confidentiality, and statutory timelines.', 'elearnposh-amp' ); ?></p>
					</div>
					<div class="pfe-challenge-label">
						<span><span class="pfe-challenge-label-num">4</span><?php esc_html_e( 'Common Challenges', 'elearnposh-amp' ); ?></span>
					</div>
					<div class="pfe-feature-grid">
						<?php foreach ( $pfecms_challenges as $pfecms_challenge ) : ?>
						<article class="pfe-feature-item pfe-feature-item--numbered">
							<span class="pfe-feature-num" aria-hidden="true"><?php echo esc_html( $pfecms_challenge['num'] ); ?></span>
							<h3><?php echo esc_html( $pfecms_challenge['title'] ); ?></h3>
							<p><?php echo esc_html( $pfecms_challenge['lead'] ); ?></p>
							<ul class="pfe-check-list">
								<?php foreach ( $pfecms_challenge['items'] as $pfecms_challenge_item ) : ?>
								<li><?php echo esc_html( $pfecms_challenge_item ); ?></li>
								<?php endforeach; ?>
							</ul>
							<?php if ( ! empty( $pfecms_challenge['note_title'] ) ) : ?>
							<div class="pfe-feature-caption">
								<strong><?php echo esc_html( $pfecms_challenge['note_title'] ); ?></strong>
								<p><?php echo esc_html( $pfecms_challenge['note'] ); ?></p>
							</div>
							<?php else : ?>
							<p class="pfe-feature-note"><?php echo esc_html( $pfecms_challenge['note'] ); ?></p>
							<?php endif; ?>
						</article>
						<?php endforeach; ?>
					</div>
				</div>
			</section>

			<section class="pfe-section-sm">
				<div class="pfe-wrap">
					<div class="pfe-section-head">
						<span class="pfe-section-tag"><?php esc_html_e( 'POSH Compliance Management', 'elearnposh-amp' ); ?></span>
						<h2 class="pfe-title pfe-title--intro"><?php esc_html_e( 'Introducing ', 'elearnposh-amp' ); ?><span><?php esc_html_e( 'Complaints Management System (CMS) by eLearnPOSH', 'elearnposh-amp' ); ?></span></h2>
						<p class="pfe-sub"><?php esc_html_e( 'A secure, structured, and confidential POSH Case Management System designed to help organisations manage every complaint with confidence, accuracy, and compliance.', 'elearnposh-amp' ); ?></p>
					</div>
					<div class="pfe-intro-grid">
						<?php foreach ( $pfecms_intro_features as $pfecms_intro_feature ) : ?>
						<div class="pfe-intro-box">✓ <?php echo esc_html( $pfecms_intro_feature ); ?></div>
						<?php endforeach; ?>
					</div>
					<p class="pfe-sub pfe-sub--follow"><?php esc_html_e( 'From complaint filing to final recommendations, every stage is managed through one secure workflow.', 'elearnposh-amp' ); ?></p>
					<div class="pfe-hero-actions">
						<a class="btn-primary" href="<?php echo esc_url( $contact_url ); ?>"><?php esc_html_e( 'Request a Demo', 'elearnposh-amp' ); ?></a>
					</div>
					<div class="pfe-workflow">
						<h3><?php esc_html_e( 'POSH Case Workflow', 'elearnposh-amp' ); ?></h3>
						<div class="pfe-workflow-steps">
							<?php
							$pfecms_workflow_total = count( $pfecms_workflow_steps );
							foreach ( $pfecms_workflow_steps as $pfecms_workflow_index => $pfecms_workflow_step ) :
								$pfecms_is_last_step = ( $pfecms_workflow_index + 1 ) === $pfecms_workflow_total;
								?>
							<div class="pfe-workflow-step<?php echo $pfecms_is_last_step ? ' pfe-workflow-step--active' : ''; ?>"><?php echo esc_html( $pfecms_workflow_step ); ?></div>
								<?php if ( ! $pfecms_is_last_step ) : ?>
							<div class="pfe-workflow-arrow" aria-hidden="true">↓</div>
								<?php endif; ?>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</section>

			<section class="pfe-section-sm">
				<div class="pfe-wrap">
					<div class="pfe-demo-cta ep-cta-shell--white">
						<div class="pfe-demo-left">
							<div class="pfe-demo-copy">
								<h2><?php esc_html_e( 'See how complaints are securely managed from reporting to resolution - in under 2 minutes.', 'elearnposh-amp' ); ?></h2>
							</div>
							<div class="pfe-demo-actions">
								<a class="btn-primary" href="<?php echo esc_url( $contact_url ); ?>" aria-label="<?php esc_attr_e( 'Request a Walkthrough', 'elearnposh-amp' ); ?>"><?php esc_html_e( 'Request a Walkthrough', 'elearnposh-amp' ); ?></a>
							</div>
						</div>
						<div class="pfe-demo-video">
							<amp-youtube data-videoid="<?php echo esc_attr( $cms_demo_video_id ); ?>" layout="responsive" width="16" height="9"></amp-youtube>
						</div>
					</div>
				</div>
			</section>

			<section class="pfe-section-sm pfe-section-sm--muted">
				<div class="pfe-wrap">
					<div class="pfe-section-head">
						<span class="pfe-section-tag"><?php esc_html_e( 'Why Organisations Choose CMS', 'elearnposh-amp' ); ?></span>
						<h2 class="pfe-title"><?php esc_html_e( 'How Complaints Management System (CMS) Helps You ', 'elearnposh-amp' ); ?><span><?php esc_html_e( 'Manage POSH Cases Better', 'elearnposh-amp' ); ?></span></h2>
						<p class="pfe-sub"><?php esc_html_e( 'Simplify investigations, improve transparency, and ensure every complaint is handled through a secure and compliant workflow.', 'elearnposh-amp' ); ?></p>
					</div>
					<div class="pfe-feature-grid pfe-feature-grid--benefits">
						<?php foreach ( $pfecms_benefits as $pfecms_benefit ) : ?>
						<article class="pfe-feature-item pfe-feature-item--numbered">
							<span class="pfe-feature-num" aria-hidden="true"><?php echo esc_html( $pfecms_benefit['num'] ); ?></span>
							<span class="pfe-feature-icon" aria-hidden="true"><?php echo esc_html( $pfecms_benefit['icon'] ); ?></span>
							<h3><?php echo esc_html( $pfecms_benefit['title'] ); ?></h3>
							<p><?php echo esc_html( $pfecms_benefit['text'] ); ?></p>
						</article>
						<?php endforeach; ?>
					</div>
				</div>
			</section>

			<section class="pfe-section-sm">
				<div class="pfe-wrap">
					<div class="pfe-section-head">
						<span class="pfe-section-tag"><?php esc_html_e( 'Why Upgrade to CMS', 'elearnposh-amp' ); ?></span>
						<h2 class="pfe-title"><?php esc_html_e( 'From Manual Processes to Smarter POSH Case Management', 'elearnposh-amp' ); ?></h2>
						<p class="pfe-sub"><?php esc_html_e( 'Compare the challenges of traditional complaint handling with the advantages of using the eLearnPOSH Case Management System.', 'elearnposh-amp' ); ?></p>
					</div>
					<div class="pfe-cms-compare-wrap">
						<div class="pfe-cms-compare">
							<div class="pfe-cms-compare__head pfe-cms-compare__head--risk"><?php esc_html_e( 'Manual Process Risks', 'elearnposh-amp' ); ?></div>
							<div class="pfe-cms-compare__head pfe-cms-compare__head--adv"><?php esc_html_e( 'CMS Advantages', 'elearnposh-amp' ); ?></div>
							<?php foreach ( $pfecms_manual_vs_cms_rows as $pfecms_compare_row ) : ?>
							<div class="pfe-cms-compare__cell pfe-cms-compare__cell--risk"><span class="pfe-cms-compare__icon pfe-cms-compare__icon--risk" aria-hidden="true">×</span> <?php echo esc_html( $pfecms_compare_row['manual'] ); ?></div>
							<div class="pfe-cms-compare__cell pfe-cms-compare__cell--adv"><span class="pfe-cms-compare__icon pfe-cms-compare__icon--adv" aria-hidden="true">✓</span> <?php echo esc_html( $pfecms_compare_row['cms'] ); ?></div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</section>

			<section class="pfe-section-sm">
				<div class="pfe-wrap">
					<div class="pfe-section-head">
						<span class="pfe-section-tag"><?php esc_html_e( 'A Safe, Simple & Transparent Reporting Experience', 'elearnposh-amp' ); ?></span>
						<h2 class="pfe-title"><?php esc_html_e( 'Complaints Management System (CMS) for Employees', 'elearnposh-amp' ); ?></h2>
						<p class="pfe-sub"><?php esc_html_e( 'CMS empowers employees with a confidential, structured, and easy-to-use complaint reporting process while ensuring transparency and timely action throughout the inquiry lifecycle.', 'elearnposh-amp' ); ?></p>
					</div>
					<div class="pfe-feature-grid">
						<?php foreach ( $pfecms_employee_features as $pfecms_employee_feature ) : ?>
						<article class="pfe-feature-item pfe-feature-item--icon-only">
							<span class="pfe-feature-icon" aria-hidden="true"><?php echo esc_html( $pfecms_employee_feature['icon'] ); ?></span>
							<h3><?php echo esc_html( $pfecms_employee_feature['title'] ); ?></h3>
							<p><?php echo esc_html( $pfecms_employee_feature['text'] ); ?></p>
						</article>
						<?php endforeach; ?>
					</div>
				</div>
			</section>

			<section class="pfe-section-sm pfe-ic-benefits">
				<div class="pfe-wrap">
					<div class="pfe-section-head">
						<span class="pfe-section-tag"><?php esc_html_e( 'Enterprise Benefits', 'elearnposh-amp' ); ?></span>
						<h2 class="pfe-title"><?php esc_html_e( 'Complaints Management System (CMS) for Internal Committees & Organisations', 'elearnposh-amp' ); ?></h2>
						<p class="pfe-sub"><?php esc_html_e( 'Empower your Internal Committee with a secure and structured Case Management System that simplifies investigations, improves accountability, and helps maintain POSH compliance throughout every stage of the complaint lifecycle.', 'elearnposh-amp' ); ?></p>
					</div>
					<div class="pfe-feature-grid">
						<?php foreach ( $pfecms_ic_employer_features as $pfecms_ic_employer_feature ) : ?>
						<article class="pfe-feature-item pfe-feature-item--icon-only">
							<span class="pfe-feature-icon" aria-hidden="true"><?php echo esc_html( $pfecms_ic_employer_feature['icon'] ); ?></span>
							<h3><?php echo esc_html( $pfecms_ic_employer_feature['title'] ); ?></h3>
							<p><?php echo esc_html( $pfecms_ic_employer_feature['text'] ); ?></p>
						</article>
						<?php endforeach; ?>
					</div>
				</div>
			</section>

			<section class="pfe-section-sm">
				<div class="pfe-wrap">
					<div class="pfe-cta-box ep-cta-shell--white">
						<h2 class="pfe-title"><?php esc_html_e( 'The Best Part?', 'elearnposh-amp' ); ?></h2>
						<p class="pfe-sub"><?php esc_html_e( 'It comes free with our POSH for IC Program. Get a complete POSH Case Management System at no additional cost with our Internal Committee training program.', 'elearnposh-amp' ); ?></p>
						<a class="btn-primary" href="<?php echo esc_url( $contact_url ); ?>"><?php esc_html_e( 'Request a Walkthrough', 'elearnposh-amp' ); ?></a>
					</div>
				</div>
			</section>

			<section class="pfe-section-sm pfe-section-sm--muted">
				<div class="pfe-wrap">
					<div class="pfe-section-head">
						<span class="pfe-section-tag"><?php esc_html_e( 'Why Choose Our Complaints Management System (CMS)?', 'elearnposh-amp' ); ?></span>
						<h2 class="pfe-title"><?php esc_html_e( 'Designed Specifically for POSH Case Management', 'elearnposh-amp' ); ?></h2>
						<p class="pfe-sub"><?php esc_html_e( 'Unlike generic workflow or ticketing tools, our CMS is purpose-built for POSH complaint handling, helping organisations manage every inquiry securely, efficiently, and in compliance with statutory requirements.', 'elearnposh-amp' ); ?></p>
					</div>
					<div class="pfe-feature-label"><span><?php esc_html_e( 'Key Features', 'elearnposh-amp' ); ?></span></div>
					<div class="pfe-feature-grid">
						<?php foreach ( $pfecms_why_choose_features as $pfecms_why_choose_feature ) : ?>
						<article class="pfe-feature-item pfe-feature-item--icon-only">
							<span class="pfe-feature-icon" aria-hidden="true"><?php echo esc_html( $pfecms_why_choose_feature['icon'] ); ?></span>
							<h3><?php echo esc_html( $pfecms_why_choose_feature['title'] ); ?></h3>
							<p><?php echo esc_html( $pfecms_why_choose_feature['text'] ); ?></p>
						</article>
						<?php endforeach; ?>
					</div>
				</div>
			</section>

			<section class="pfe-section-sm">
				<div class="pfe-wrap">
					<div class="pfe-section-head">
						<span class="pfe-section-tag"><?php esc_html_e( 'What Makes Complaints Management System (CMS) Different?', 'elearnposh-amp' ); ?></span>
						<h2 class="pfe-title"><?php esc_html_e( 'Built Around Real POSH CMS Workflows', 'elearnposh-amp' ); ?></h2>
						<p class="pfe-sub"><?php esc_html_e( 'Most organisations have POSH policies and training programs in place. What they often lack is a structured system to manage complaint filing, inquiries, evidence, documentation and resolution.', 'elearnposh-amp' ); ?></p>
					</div>
					<div class="pfe-arch-core">
						<h3><?php esc_html_e( 'Complaints Management System', 'elearnposh-amp' ); ?></h3>
						<p><?php esc_html_e( 'Secure POSH Case Management System', 'elearnposh-amp' ); ?></p>
					</div>
					<div class="pfe-feature-grid pfe-feature-grid--arch">
						<?php foreach ( $pfecms_architecture_nodes as $pfecms_architecture_node ) : ?>
						<article class="pfe-feature-item pfe-feature-item--numbered pfe-feature-item--compact">
							<span class="pfe-feature-num" aria-hidden="true"><?php echo esc_html( $pfecms_architecture_node['num'] ); ?></span>
							<span class="pfe-feature-icon" aria-hidden="true"><?php echo esc_html( $pfecms_architecture_node['icon'] ); ?></span>
							<h3><?php echo esc_html( $pfecms_architecture_node['title'] ); ?></h3>
						</article>
						<?php endforeach; ?>
					</div>
				</div>
			</section>

			<?php if ( '' !== trim( $pfecms_contact_form_html ) ) : ?>
			<section class="pfe-section-sm" id="schedule-demo">
				<div class="pfe-wrap">
					<div class="pfe-cms-form home-contact-form ep-contact-conversion__form" id="schedule-a-demo">
						<?php
						if ( function_exists( 'elearnposh_amp_render_contact_form_title_bar' ) ) {
							elearnposh_amp_render_contact_form_title_bar( 'home' );
						} else {
							echo '<h2 class="test-headline m-0 section-main-heading ep-amp-form-title">' . esc_html__( 'Book a Demo', 'elearnposh-amp' ) . '</h2>';
						}
						echo $pfecms_contact_form_html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						?>
					</div>
				</div>
			</section>
			<?php endif; ?>

			<section class="pfe-section" id="pfe-faq">
				<div class="pfe-wrap">
					<span class="pfe-section-tag"><?php esc_html_e( 'FAQs', 'elearnposh-amp' ); ?></span>
					<h2 class="pfe-title"><?php esc_html_e( 'Find everything you need to know about', 'elearnposh-amp' ); ?> <span class="pfe-title-accent"><?php esc_html_e( 'Complaints Management System (CMS)', 'elearnposh-amp' ); ?></span> <?php esc_html_e( 'right here.', 'elearnposh-amp' ); ?></h2>
					<p class="pfe-sub pfe-faq-intro"><?php esc_html_e( 'Explore key answers on reporting, inquiry workflow, confidentiality, timelines, and documentation to manage POSH cases with more clarity and confidence.', 'elearnposh-amp' ); ?></p>
					<amp-accordion animate expand-single-section>
						<?php foreach ( $pfecms_faq_items as $pfecms_faq_index => $pfecms_faq_item ) : ?>
						<section<?php echo 0 === $pfecms_faq_index ? ' expanded' : ''; ?>>
							<h3 class="faq-q"><?php echo esc_html( ( $pfecms_faq_index + 1 ) . '. ' . $pfecms_faq_item['question'] ); ?></h3>
							<div class="faq-a">
								<?php echo wp_kses_post( $pfecms_faq_item['answer_html'] ); ?>
							</div>
						</section>
						<?php endforeach; ?>
					</amp-accordion>
				</div>
			</section>

			<?php elearnposh_amp_render_top_courses_section(); ?>

			<section class="pfe-section-sm">
				<div class="pfe-wrap">
					<div class="pfe-demo-cta pfe-demo-cta--center">
						<h2 class="pfe-title"><?php esc_html_e( 'Ready to simplify POSH case management?', 'elearnposh-amp' ); ?></h2>
						<p class="pfe-sub"><?php esc_html_e( 'Talk to our team about CMS and Internal Committee training for your organisation.', 'elearnposh-amp' ); ?></p>
						<div class="pfe-close-cta-actions">
							<a class="btn-primary" href="<?php echo esc_url( $contact_url ); ?>" aria-label="<?php esc_attr_e( 'Get in Touch', 'elearnposh-amp' ); ?>"><?php esc_html_e( 'Get in Touch', 'elearnposh-amp' ); ?></a>
						</div>
					</div>
				</div>
			</section>

		</main>
		<div class="hrtag-end"></div>
	</div>
	<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/footer.php'; ?>
</body>
</html>
