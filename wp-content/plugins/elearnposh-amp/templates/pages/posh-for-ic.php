<?php
/**
 * POSH for IC Member Page Template
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $post;

$ep_id               = $post->ID;
$hero_title          = get_post_meta( $ep_id, 'title', true ) ?: get_the_title();
$demo_url            = elearnposh_amp_url( '/contact-us/#demo' );
$post_body_class     = 'post-' . absint( $ep_id );
$purchase_referrer   = esc_attr( urlencode( get_permalink() ) );
$pfeic_razorpay_individual = 'https://pages.razorpay.com/pl_PT4Foxw6tsrJ35/view';
$pfeic_razorpay_org        = 'https://pages.razorpay.com/pl_PT4RF54Mh4AGMs/view';
$pfeic_razorpay_embed      = static function ( $page_url, $size ) use ( $purchase_referrer ) {
	return 'https://cdn.razorpay.com/static/embed_btn/embed.html?url=' . rawurlencode( $page_url ) . '&text=Buy%20Now&color=%230089CF&size=' . rawurlencode( $size ) . '&referrer=' . $purchase_referrer;
};
$pfeic_uploads       = 'https://elearnposh.com/wp-content/uploads/2023/08/';
$pfeic_youtube_id    = 'F9JFd8JaEBc';
$pfeic_youtube_raw   = get_post_meta( $ep_id, 'youtube_id_amp', true );

if ( empty( $pfeic_youtube_raw ) && function_exists( 'get_field' ) ) {
	$pfeic_youtube_raw = get_field( 'youtube_id_amp', $ep_id );
}
if ( ! empty( $pfeic_youtube_raw ) ) {
	$pfeic_youtube_raw = trim( (string) $pfeic_youtube_raw );
	if ( preg_match( '/(?:youtube\.com\/(?:watch\?v=|embed\/)|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $pfeic_youtube_raw, $pfeic_yt_match ) ) {
		$pfeic_youtube_id = $pfeic_yt_match[1];
	} elseif ( preg_match( '/^[a-zA-Z0-9_-]{11}$/', $pfeic_youtube_raw ) ) {
		$pfeic_youtube_id = $pfeic_youtube_raw;
	}
}

$pfeic_outcomes = array(
	__( 'Explain the structure of an Internal Committee', 'elearnposh-amp' ),
	__( 'List the different rules for accepting complaints and settlements', 'elearnposh-amp' ),
	__( 'Conduct inquiry and recommend suitable actions', 'elearnposh-amp' ),
	__( 'Formulate proactive measures', 'elearnposh-amp' ),
	__( 'List the Roles and Responsibilities of a IC Member or HR', 'elearnposh-amp' ),
);

$pfeic_elearning_items = array(
	array( 'label' => __( 'POSH for IC Members eLearning', 'elearnposh-amp' ) ),
	array( 'label' => __( '170 min', 'elearnposh-amp' ) ),
	array( 'label' => __( 'Periodic Microlearning modules with case studies and legal judgements', 'elearnposh-amp' ) ),
	array( 'label' => __( 'A bunch of tools and resources to facilitate the smooth functioning of the IC', 'elearnposh-amp' ) ),
);

$pfeic_webinar_items = array(
	array( 'label' => __( '90 min sessions', 'elearnposh-amp' ) ),
	array( 'label' => __( '90 mins open session for subscribers', 'elearnposh-amp' ) ),
	array( 'label' => __( 'Live Webinars', 'elearnposh-amp' ) ),
	array( 'label' => __( 'Webinar Recording for those who miss the live session', 'elearnposh-amp' ) ),
	array(
		'label'  => __( 'Focussed topics with in-depth analysis and Q&A', 'elearnposh-amp' ),
		'detail' => __( 'E.g. Topics: inquiry process, Report creation, Case Studies, Judgements, Scenarios.', 'elearnposh-amp' ),
	),
);

$pfeic_subscription_blocks = array(
	array(
		'modifier' => 'learn',
		'title'    => __( 'OnDemand eLearning Courses', 'elearnposh-amp' ),
		'items'    => $pfeic_elearning_items,
	),
	array(
		'modifier' => 'webinar',
		'title'    => __( 'Periodic Webinars', 'elearnposh-amp' ),
		'items'    => $pfeic_webinar_items,
		'footer'   => __( 'March 3rd Week · July 3rd Week · November 3rd Week', 'elearnposh-amp' ),
	),
);

$pfeic_tools = array(
	array(
		'title' => __( 'POSH Policy Drafting', 'elearnposh-amp' ),
		'desc'  => __( 'This feature personalizes your POSH policy in under 15 minutes. By answering a few key questions about your organization, the tool will generate a professionally branded document tailored to your standards, with options for further customization.', 'elearnposh-amp' ),
		'img'   => $pfeic_uploads . 'ep_ic_member_page_policy_drafting-1024x673.png',
	),
	array(
		'title' => __( 'Template Library', 'elearnposh-amp' ),
		'desc'  => __( 'Our expansive library provides all the templates needed for seamless Internal Committee operations, from its constitution to inquiry handling and reporting. These resources streamline the documentation, emails, and reports essential to committee functioning.', 'elearnposh-amp' ),
		'img'   => $pfeic_uploads . 'ep_ic_member_page_template_library-1024x673.png',
	),
	array(
		'title' => __( 'District Officer Contact Directory', 'elearnposh-amp' ),
		'desc'  => __( 'This directory maintains updated contact information for District Officers across major cities, providing essential support for mandatory Annual Reporting in line with POSH Law.', 'elearnposh-amp' ),
		'img'   => $pfeic_uploads . 'ep_ic_member_page_district_officer_contact_directory-1024x673.png',
	),
	array(
		'title' => __( 'Posters Library', 'elearnposh-amp' ),
		'desc'  => __( 'Our library offers a range of POSH awareness posters in English and various Indian languages. Available for download in JPEG or PDF formats, these can be edited as required using a PDF editor tool.', 'elearnposh-amp' ),
		'img'   => $pfeic_uploads . 'ep_ic_member_page_posters_library-1024x795.png',
	),
	array(
		'title' => __( 'IC Meetings Minutes Register', 'elearnposh-amp' ),
		'desc'  => __( 'Offering a unique solution for quarterly and annual IC meetings, it allows scheduling, documenting, and sharing of meeting minutes with participants, facilitating acceptance of the minutes with a single click.', 'elearnposh-amp' ),
		'img'   => $pfeic_uploads . 'ep_ic_member_page_ic_meetings_minutes_register-1024x673.png',
	),
	array(
		'title' => __( 'Ask a POSH Expert', 'elearnposh-amp' ),
		'desc'  => __( 'This feature enables you to seek advice on the POSH inquiry process and compliance-related queries. The chat threads allow our in-house experts to provide timely responses, and any follow-up questions can be conveniently addressed within the same conversation or by scheduling a call with one of our experts.', 'elearnposh-amp' ),
		'img'   => $pfeic_uploads . 'ep_ic_member_page_ask_a_posh_expert-1024x673.png',
	),
	array(
		'title' => __( 'POSH Audit Tool', 'elearnposh-amp' ),
		'desc'  => __( 'This tool asks a series of structured questions to evaluate your organization\'s compliance with POSH Law. Your responses generate a comprehensive report outlining your organization\'s compliance status.', 'elearnposh-amp' ),
		'img'   => $pfeic_uploads . 'ep_ic_member_page_posh_audit_tool-1024x673.png',
	),
	array(
		'title' => __( 'Complaints Management System', 'elearnposh-amp' ),
		'desc'  => __( 'This holistic system manages everything from complaint filing to report generation. It enables the scheduling and documentation of interviews, cross-examinations, and meetings integral to POSH inquiries. Ultimately, a detailed inquiry report is generated with a single click.', 'elearnposh-amp' ),
		'img'   => $pfeic_uploads . 'ep_ic_member_page_complaints_management_system-1024x635.png',
	),
	array(
		'title' => __( 'Knowledge Base', 'elearnposh-amp' ),
		'desc'  => __( 'This resource provides simplified summaries of POSH Act, Laws, significant judgements, and frequently asked questions. It serves as an information library for POSH Compliance and Inquiry-related questions.', 'elearnposh-amp' ),
		'img'   => $pfeic_uploads . 'ep_ic_member_page_knowledge_base-1024x735.png',
	),
	array(
		'title' => __( 'Webinar Library', 'elearnposh-amp' ),
		'desc'  => __( 'This library archives webinar recordings conducted by POSH Experts for Internal Committee members, ensuring access to valuable insights and advice at any time.', 'elearnposh-amp' ),
		'img'   => $pfeic_uploads . 'ep_ic_member_page_webinar_library-1024x631.png',
	),
);

$pfeic_comparison_features = array(
	array( __( 'Minimum User Count', 'elearnposh-amp' ), '1', '3' ),
	array( __( 'Validity', 'elearnposh-amp' ), __( '12 Months', 'elearnposh-amp' ), __( '12 Months', 'elearnposh-amp' ) ),
	array( __( 'IC Specific eLearning (170 Minutes)', 'elearnposh-amp' ), true, true ),
	array( __( '3 Live Webinars (1 Year)', 'elearnposh-amp' ), true, true ),
	array( __( 'Webinar Recordings (>20 webinars)', 'elearnposh-amp' ), true, true ),
	array( __( 'Certification', 'elearnposh-amp' ), true, true ),
	array( __( 'Posters Library', 'elearnposh-amp' ), false, true ),
	array( __( 'Template Library', 'elearnposh-amp' ), false, true ),
	array( __( 'Knowledge Base', 'elearnposh-amp' ), false, true ),
	array( __( 'Ask an Expert', 'elearnposh-amp' ), false, true ),
	array( __( 'Policy Drafting Tool', 'elearnposh-amp' ), false, true ),
	array( __( 'District Officer Contact Details', 'elearnposh-amp' ), false, true ),
	array( __( 'Complaints Management System', 'elearnposh-amp' ), false, true ),
	array( __( 'POSH Audit Tool', 'elearnposh-amp' ), false, true ),
	array( __( 'IC Meeting Register', 'elearnposh-amp' ), false, true ),
);

$pfeic_faq_items = array(
	array(
		'question'    => 'What is the POSH for IC Members Training Program?',
		'answer_html' => '<p>The training program is a comprehensive solution designed to help Internal Committee (IC) members understand their roles and responsibilities under the POSH Act. It includes eLearning, webinars, and tools to ensure compliance and effectiveness.</p>',
	),
	array(
		'question'    => 'Who should take this training?',
		'answer_html' => '<p>Prevention of Sexual Harassment (POSH) training is a program designed to educate employees about recognizing, preventing, and addressing sexual harassment in the workplace. It typically covers the legal framework, company policies on harassment, employee rights and responsibilities, and procedures for reporting and handling complaints. The aim is to create a safe and respectful work environment. POSH training in an organization includes two primary levels: one for general employees and one specifically tailored for members of the Internal Committee (IC), responsible for addressing harassment complaints. Additionally, there is specialized training for managers. The content covered encompasses:</p><p>IC members, HR professionals, External Members, and anyone involved in POSH compliance or inquiry processes within an organization.</p>',
	),
	array(
		'question'    => 'Is certification provided after completing the training?',
		'answer_html' => '<p>Yes, participants receive a certification upon completing the eLearning course. Additionally, participants will receive a certificate of participation for every webinar they attend.</p>',
	),
	array(
		'question'    => 'Can I attend the webinars even if I am not available on the scheduled dates?',
		'answer_html' => '<p>Yes, all webinars are recorded, and participants can access these recordings later.</p>',
	),
	array(
		'question'    => 'What resources are included in the program?',
		'answer_html' => '<p>The program includes templates, POSH policy drafting tools, a posters library, a district officer contact directory, and more.</p>',
	),
	array(
		'question'    => 'What is the duration of the eLearning course?',
		'answer_html' => '<p>The eLearning course is 110 minutes long and covers all aspects of the IC\'s roles and responsibilities. Additionally, we update the course with micro-modules and additional eModules on POSH, incorporating changes in laws and recent judgments.</p>',
	),
	array(
		'question'    => 'How does the "Ask an Expert" feature work?',
		'answer_html' => '<p>Participants can directly consult POSH experts via a ticketing tool for guidance on procedural or compliance-related queries. Our team of experts will respond to these questions within 2 business days with suggestions. If further clarification is needed, a call can be scheduled to provide additional details.</p>',
	),
	array(
		'question'    => 'What is the minimum number of users required for organizational plans?',
		'answer_html' => '<p>A minimum of 3 users is required for organizational subscriptions.</p>',
	),
	array(
		'question'    => 'Who needs to form an Internal Committee?',
		'answer_html' => '<p>Any organization with 10 or more employees is legally required to form an Internal Committee under the POSH Act.</p>',
	),
	array(
		'question'    => 'What is the composition of the IC?',
		'answer_html' => '<p>The IC must include:</p><ul><li>A Presiding Officer (a senior woman employee from the organization).</li><li>At least two employee members experienced in social work or law.</li><li>One external member (an expert in POSH-related matters or social work).</li><li>At least 50% of IC members must be women.</li></ul>',
	),
	array(
		'question'    => 'Can the IC handle complaints from contract workers?',
		'answer_html' => '<p>Yes, the IC must handle complaints from any person working in the organization, including contract workers, interns, and part-time staff.</p>',
	),
	array(
		'question'    => 'How often should IC meetings be conducted?',
		'answer_html' => '<p>IC meetings should be held quarterly to review cases and compliance efforts.</p>',
	),
	array(
		'question'    => 'What records should the IC maintain?',
		'answer_html' => '<p>The IC should maintain:</p><ul><li>Complaint registers.</li><li>Meeting minutes.</li><li>Inquiry reports.</li><li>Annual compliance reports.</li></ul>',
	),
	array(
		'question'    => 'What is the timeline for filing a complaint?',
		'answer_html' => '<p>A complaint must be filed within three months from the date of the incident. This period can be extended by another three months if the IC finds valid reasons for the delay.</p>',
	),
	array(
		'question'    => 'What is the role of the respondent during the inquiry?',
		'answer_html' => '<p>The respondent has the right to present their side, submit evidence, and cross-examine witnesses.</p>',
	),
	array(
		'question'    => 'How long does the inquiry process take?',
		'answer_html' => '<p>The IC must complete the inquiry within 90 days from the date of the complaint.</p>',
	),
	array(
		'question'    => 'What happens after the inquiry is completed?',
		'answer_html' => '<p>The IC submits its findings and recommendations to the employer. The employer must act on these within 60 days.</p>',
	),
	array(
		'question'    => 'What actions can the IC recommend?',
		'answer_html' => '<p>Based on the findings, the IC can recommend:</p><ul><li>Disciplinary action against the respondent.</li><li>Compensation for the complainant.</li><li>Preventive measures to avoid similar incidents.</li></ul>',
	),
	array(
		'question'    => 'Is confidentiality maintained during the inquiry?',
		'answer_html' => '<p>Yes, the IC is required to maintain strict confidentiality regarding the identity of the complainant, respondent, and witnesses.</p>',
	),
	array(
		'question'    => 'What should an IC do if the complaint is found to be false?',
		'answer_html' => '<p>If a complaint is proven to be false or malicious, the IC can recommend disciplinary action against the complainant. However, this does not apply to complaints filed in good faith.</p>',
	),
	array(
		'question'    => 'What is the role of the external IC member in the inquiry?',
		'answer_html' => '<p>The external member ensures impartiality and brings expert knowledge to the inquiry process.</p>',
	),
	array(
		'question'    => 'What is an Annual Report, and why is it important?',
		'answer_html' => '<p>The IC must prepare an annual report summarizing:</p><ul><li>The number of complaints received.</li><li>Cases resolved.</li><li>Pending cases.</li><li>Preventive measures taken.</li></ul><p>This report is submitted to the District Officer to ensure compliance.</p>',
	),
	array(
		'question'    => 'What is the difference between IC and ICC?',
		'answer_html' => '<p>Internal Complaints Committee was envisioned in the POSH Act 2013. But in 2017, the Parliament amended the law to rename Internal Complaints Committee as Internal Committee. This is apparently the only amendment made to the POSH Act since its enactment.</p>',
	),
);

$pfeic_faq_schema = array(
	'@context'   => 'https://schema.org',
	'@type'      => 'FAQPage',
	'mainEntity' => array(),
);

foreach ( $pfeic_faq_items as $pfeic_faq_item ) {
	$pfeic_faq_schema['mainEntity'][] = array(
		'@type'          => 'Question',
		'name'           => $pfeic_faq_item['question'],
		'acceptedAnswer' => array(
			'@type' => 'Answer',
			'text'  => wp_strip_all_tags( $pfeic_faq_item['answer_html'] ),
		),
	);
}

remove_all_actions( 'the_content' );
remove_all_actions( 'amp_post_template_content' );
remove_all_actions( 'ampforwp_content' );
?>
<!doctype html>
<html amp lang="<?php echo esc_attr( get_bloginfo( 'language' ) ); ?>">
<head>
	<meta charset="utf-8" />
	<link rel="shortcut icon" href="<?php echo esc_url( elearnposh_amp_get_favicon_url() ); ?>" type="image/png" />
	<title><?php echo esc_html( $hero_title ); ?> - eLearnPOSH</title>
	<?php do_action( 'amp_post_template_head', $this ); ?>
	<style amp-custom>
	<?php elearnposh_amp_output_optimized_css( 'course', array( 'course-page', 'menu', 'footer' ) ); ?>
	<?php elearnposh_amp_output_course_pfe_base_styles(); ?>
	<?php elearnposh_amp_include_style_partial( 'page-hero-subtitle' ); ?>
	.pfe-compare-wrap{margin-top:18px;width:100%;max-width:100%;overflow-x:auto;-webkit-overflow-scrolling:touch}
	.pfe-compare{width:100%;min-width:520px;table-layout:fixed;border-collapse:collapse;background:#fff;border-radius:14px;overflow:hidden;box-shadow:0 8px 24px rgba(11,35,58,.08)}
	.pfe-compare th,.pfe-compare td{border:1px solid var(--line);padding:10px 12px;text-align:left;vertical-align:top;font-size:15px;line-height:1.45;color:#2f4358}
	.pfe-compare thead th{background:#002a38;color:#fff;font-weight:700;text-align:center}
	.pfe-compare thead th:first-child{text-align:left}
	.pfe-compare col.pfe-compare-col-features{width:46%}
	.pfe-compare col.pfe-compare-col-plan{width:27%}
	.pfe-compare tbody th{background:#f7fbff;font-weight:600;color:#10273f;line-height:1.45;word-break:break-word}
	.pfe-compare tbody td{padding-left:8px;padding-right:8px;text-align:center;vertical-align:middle;word-break:break-word}
	.pfe-compare-buy{padding:6px 4px 10px;text-align:center;overflow:visible}
	.pfe-compare-buy amp-iframe{display:block;margin:0 auto}
	.pfe-compare-cta-row th,.pfe-compare-cta-row td{padding-bottom:14px;vertical-align:middle}
	.pfe-compare-check{color:#0d73d4;font-size:24px;font-weight:700;line-height:1}
	.pfe-compare-note{margin-top:14px}
	.ic-subscription-intro{margin:0 0 6px;max-width:none;width:100%}
	.ic-outcomes-list{list-style:none;margin:0;padding:0;display:grid;gap:8px}
	.ic-outcomes-list li{list-style:none;display:flex;align-items:flex-start;gap:10px;color:#4a6278;line-height:1.5;padding:10px 12px;border:1px solid #e8f0f8;border-radius:10px;background:#fafcfd;font-size:15px}
	.ic-outcomes-tick{flex:0 0 20px;width:20px;height:20px;margin-top:1px;border-radius:50%;background:linear-gradient(135deg,#0a9a74 0%,#14b88a 100%);display:inline-flex;align-items:center;justify-content:center;box-shadow:0 3px 8px rgba(10,154,116,.22)}
	.ic-outcomes-tick::after{content:"";width:5px;height:8px;border:solid #fff;border-width:0 2px 2px 0;transform:rotate(45deg);margin-top:-1px}
	.ic-outcomes-card{padding:clamp(20px,3vw,28px)}
	.ic-outcomes-title{width:100%;margin:0 0 20px}
	.ic-outcomes-body{display:grid;grid-template-columns:minmax(0,1fr) minmax(0,1fr);gap:24px;align-items:start}
	.ic-outcomes-body--no-video{grid-template-columns:1fr}
	.ic-outcomes-video{background:#fff;border:1px solid #d7e8fb;border-radius:14px;box-shadow:0 10px 24px rgba(12,42,72,.1);padding:8px;width:100%;min-width:0}
	.ic-outcomes-video .pfe-video{margin-top:0;border-radius:10px;overflow:hidden;box-shadow:none}
	.ic-sub-grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:clamp(20px,3vw,30px);margin-top:28px}
	.ic-sub-block{display:flex;flex-direction:column;background:#fff;border:1px solid var(--line);border-radius:20px;overflow:hidden;box-shadow:0 10px 28px rgba(11,35,58,.06)}
	.ic-sub-block__head{display:flex;align-items:center;gap:14px;padding:22px 22px 18px;border-bottom:1px solid #e8f0f8}
	.ic-sub-block--learn .ic-sub-block__head{background:linear-gradient(135deg,#f3f8ff 0%,#fff 72%)}
	.ic-sub-block--webinar .ic-sub-block__head{background:linear-gradient(135deg,#f1fbf6 0%,#fff 72%)}
	.ic-sub-block__icon{flex:0 0 48px;width:48px;height:48px;border-radius:14px;display:inline-flex;align-items:center;justify-content:center;color:#fff}
	.ic-sub-block__icon svg{display:block;width:22px;height:22px;fill:currentColor}
	.ic-sub-block--learn .ic-sub-block__icon{background:linear-gradient(135deg,#0d73d4 0%,#2f90ef 100%);box-shadow:0 6px 16px rgba(13,115,212,.24)}
	.ic-sub-block--webinar .ic-sub-block__icon{background:linear-gradient(135deg,#0a9a74 0%,#14b88a 100%);box-shadow:0 6px 16px rgba(10,154,116,.24)}
	.ic-sub-block__titles{flex:1;min-width:0;display:flex;flex-direction:column;gap:8px}
	.ic-sub-block__titles h3{margin:0;font-size:clamp(1.08rem,1rem + .35vw,1.32rem);color:#10273f;font-weight:700;line-height:1.3}
	.ic-sub-block__body{display:flex;flex-direction:column;flex:1;padding:6px 22px 22px}
	.ic-sub-block__list{list-style:none;margin:0;padding:0;display:flex;flex-direction:column}
	.ic-sub-block__list li{list-style:none;display:flex;align-items:flex-start;gap:12px;padding:14px 0;border-bottom:1px solid #eef3f8;color:#2f4358;line-height:1.55}
	.ic-sub-block__list li:last-child{border-bottom:none;padding-bottom:0}
	.ic-sub-block__check{flex:0 0 20px;width:20px;height:20px;margin-top:.22em;align-self:flex-start;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:10px;font-weight:800;line-height:1}
	.ic-sub-block--learn .ic-sub-block__check{background:#eaf4ff;color:#0d73d4}
	.ic-sub-block--webinar .ic-sub-block__check{background:#e8f8f2;color:#0a9a74}
	.ic-sub-block__text{flex:1;min-width:0}
	.ic-sub-block__label{font-weight:600;color:#10273f}
	.ic-sub-block__detail{display:block;margin-top:5px;font-size:.9rem;color:var(--muted);font-weight:500;line-height:1.55}
	.ic-sub-block__footer{margin-top:auto;padding-top:16px}
	.ic-sub-block__schedule{display:flex;align-items:center;justify-content:center;gap:8px;padding:12px 14px;border-radius:12px;background:linear-gradient(90deg,#f0f7ff 0%,#f4fffa 100%);border:1px solid #d7e8fb;font-size:.86rem;font-weight:600;color:#1f4a72;text-align:center;line-height:1.5}
	.ic-sub-block__schedule svg{flex:0 0 16px;width:16px;height:16px;fill:#0d73d4}
	.ic-tools-intro{margin:0 0 8px;max-width:none;width:100%}
	.ic-tools-grid{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:clamp(16px,2vw,24px);margin-top:24px}
	.ic-tool-card{display:flex;flex-direction:column;background:#fff;border:1px solid var(--line);border-radius:18px;overflow:hidden;box-shadow:0 8px 22px rgba(11,35,58,.07);height:100%}
	.ic-tool-card__media{position:relative;aspect-ratio:1024/673;min-height:180px;display:flex;align-items:center;justify-content:center;padding:14px;overflow:hidden;background:linear-gradient(145deg,#eef6ff 0%,#f8fbff 100%);border-bottom:1px solid var(--line)}
	.ic-tool-card__media amp-img{display:block;width:100%;height:100%;object-fit:contain}
	.ic-tool-card__index{position:absolute;top:10px;left:10px;z-index:1;min-width:32px;padding:5px 8px;border-radius:8px;background:rgba(255,255,255,.94);border:1px solid rgba(0,137,207,.2);color:#0089cf;font-size:.78rem;font-weight:800;letter-spacing:.04em;line-height:1;box-shadow:0 4px 12px rgba(11,35,58,.1)}
	.ic-tool-card__body{display:flex;flex-direction:column;flex:1;padding:clamp(16px,2vw,22px);gap:10px}
	.ic-tool-card__body h3{margin:0;font-size:clamp(1.05rem,.95rem + .35vw,1.2rem);color:#10273f;line-height:1.35;font-weight:700}
	.ic-tool-card__body p{margin:0;color:var(--muted);font-size:.94rem;line-height:1.72;flex:1}
	.ic-tool-card__accent{width:40px;height:3px;border-radius:999px;background:linear-gradient(90deg,#0089cf 0%,#14b88a 100%);margin-top:auto}
	.pfe-cta-band{text-align:center;background:linear-gradient(125deg,#f7fbff 0%,#eff7ff 50%,#f4fffa 100%);border:1px solid #d7e8fb;border-radius:18px;padding:clamp(22px,4vw,34px);box-shadow:0 12px 28px rgba(12,42,72,.1)}
	.pfe-cta-band p{margin:0 auto 18px;max-width:72ch;color:var(--muted);line-height:1.75}
	<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'partials/faq-accordion-styles.php'; ?>
	@media (max-width:1100px){.ic-tools-grid{grid-template-columns:repeat(2,minmax(0,1fr))}}
	@media (max-width:1024px){#pfe-compare-plans .pfe-wrap{width:100%;max-width:100%;padding-left:10px;padding-right:10px}.pfe-compare{min-width:580px}.pfe-compare col.pfe-compare-col-features{width:38%}.pfe-compare col.pfe-compare-col-plan{width:31%}.pfe-compare-buy{padding:4px 4px 16px}.pfe-compare-cta-row th,.pfe-compare-cta-row td{padding-bottom:18px}}
	@media (max-width:980px){.ic-outcomes-body,.ic-sub-grid{grid-template-columns:1fr}}
	@media (max-width:980px) and (min-width:641px){.ic-outcomes-video{max-width:520px;width:100%;margin:0 auto;justify-self:center}}
	@media (max-width:640px){.pfe-compare{min-width:560px}.pfe-compare th,.pfe-compare td{padding:6px 5px;font-size:.8rem;line-height:1.3}.pfe-compare thead th{font-size:.82rem}.pfe-compare tbody th{font-size:.78rem}.pfe-compare-buy{padding:4px 4px 18px}.pfe-compare-cta-row th,.pfe-compare-cta-row td{padding-bottom:20px}.ic-tools-grid{grid-template-columns:1fr}.ic-sub-block__head,.ic-sub-block__body{padding-left:16px;padding-right:16px}.pfe-card.ic-outcomes-card{padding:0;background:transparent;border:0;border-radius:0;box-shadow:none}}
	</style>
	<script type="application/ld+json"><?php echo elearnposh_amp_encode_page_schema_json_ld( $pfeic_faq_schema ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></script>
	<?php elearnposh_amp_output_components( 'course', array( 'amp-accordion', 'amp-youtube', 'amp-iframe' ) ); ?>
</head>
<body class="<?php echo esc_attr( $post_body_class ); ?>">
	<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/menu.php'; ?>
	<div class="amp-content-wrapper">
		<main class="pfe">
			<section class="pfe-hero">
				<div class="pfe-wrap">
				<?php elearnposh_amp_render_breadcrumbs(); ?>
					<span class="pfe-kicker"><?php esc_html_e( 'POSH for IC Members, Annual Subscription Program', 'elearnposh-amp' ); ?></span>
					<h1><?php esc_html_e( 'POSH for IC members', 'elearnposh-amp' ); ?></h1>
					<h2 class="pfe-hero-subtitle"><?php esc_html_e( 'Comprehensive POSH Internal Committee Training (IC Training) and Tools', 'elearnposh-amp' ); ?></h2>
					<p><?php esc_html_e( 'Empower yourself or your organization with structured training and practical resources. Unlike traditional one-day workshops that often result in "check-the-box" compliance, the POSH for IC Members Annual Subscription Program by eLearnPOSH offers an end-to-end, technology-driven solution. Designed specifically to address the challenges of POSH compliance, the program ensures that IC members are well-equipped to handle complaints with confidence, sensitivity, and accuracy.', 'elearnposh-amp' ); ?></p>
					<div class="pfe-hero-actions">
						<a class="btn-primary" href="<?php echo $demo_url; ?>"><?php esc_html_e( 'Schedule a Demo', 'elearnposh-amp' ); ?></a>
					</div>
				</div>
			</section>

			<section class="pfe-section-sm" id="pfe-compare-plans">
				<div class="pfe-wrap">
					<h2 class="pfe-title"><?php esc_html_e( 'Compare Plans', 'elearnposh-amp' ); ?></h2>
					<p class="pfe-sub"><?php esc_html_e( 'Choose the plan that fits your needs.', 'elearnposh-amp' ); ?></p>
					<div class="pfe-compare-wrap">
						<table class="pfe-compare">
							<colgroup>
								<col class="pfe-compare-col-features">
								<col class="pfe-compare-col-plan">
								<col class="pfe-compare-col-plan">
							</colgroup>
							<thead>
								<tr>
									<th><?php esc_html_e( 'Features', 'elearnposh-amp' ); ?></th>
									<th><?php esc_html_e( 'Individual', 'elearnposh-amp' ); ?></th>
									<th><?php esc_html_e( 'Organizational', 'elearnposh-amp' ); ?></th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ( $pfeic_comparison_features as $pfeic_comparison_feature ) : ?>
								<tr>
									<th><?php echo esc_html( $pfeic_comparison_feature[0] ); ?></th>
									<td>
										<?php if ( is_bool( $pfeic_comparison_feature[1] ) ) : ?>
											<?php if ( $pfeic_comparison_feature[1] ) : ?>
											<span class="pfe-compare-check" aria-hidden="true">&#10003;</span>
											<?php endif; ?>
										<?php else : ?>
											<?php echo esc_html( $pfeic_comparison_feature[1] ); ?>
										<?php endif; ?>
									</td>
									<td>
										<?php if ( is_bool( $pfeic_comparison_feature[2] ) ) : ?>
											<?php if ( $pfeic_comparison_feature[2] ) : ?>
											<span class="pfe-compare-check" aria-hidden="true">&#10003;</span>
											<?php endif; ?>
										<?php else : ?>
											<?php echo esc_html( $pfeic_comparison_feature[2] ); ?>
										<?php endif; ?>
									</td>
								</tr>
								<?php endforeach; ?>
								<tr class="pfe-compare-cta-row">
									<th></th>
									<td class="pfe-compare-buy">
										<amp-iframe
											media="(min-width: 1025px)"
											src="<?php echo esc_url( $pfeic_razorpay_embed( $pfeic_razorpay_individual, 'medium' ) ); ?>"
											width="210"
											height="88"
											sandbox="allow-scripts allow-same-origin allow-popups allow-forms"
											layout="fixed"
											frameborder="0"
											scrolling="no">
										</amp-iframe>
										<amp-iframe
											media="(max-width: 1024px)"
											src="<?php echo esc_url( $pfeic_razorpay_embed( $pfeic_razorpay_individual, 'small' ) ); ?>"
											width="150"
											height="80"
											sandbox="allow-scripts allow-same-origin allow-popups allow-forms"
											layout="fixed"
											frameborder="0"
											scrolling="no">
										</amp-iframe>
									</td>
									<td class="pfe-compare-buy">
										<amp-iframe
											media="(min-width: 1025px)"
											src="<?php echo esc_url( $pfeic_razorpay_embed( $pfeic_razorpay_org, 'medium' ) ); ?>"
											width="210"
											height="88"
											sandbox="allow-scripts allow-same-origin allow-popups allow-forms"
											layout="fixed"
											frameborder="0"
											scrolling="no">
										</amp-iframe>
										<amp-iframe
											media="(max-width: 1024px)"
											src="<?php echo esc_url( $pfeic_razorpay_embed( $pfeic_razorpay_org, 'small' ) ); ?>"
											width="150"
											height="80"
											sandbox="allow-scripts allow-same-origin allow-popups allow-forms"
											layout="fixed"
											frameborder="0"
											scrolling="no">
										</amp-iframe>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<p class="pfe-sub pfe-compare-note"><?php esc_html_e( 'On successful purchase, our Support team will reach out to you with the details to access the module. If you are buying for your organization, then you can provide the list of IC members to be added to the subscription when the Support team contacts you by email.', 'elearnposh-amp' ); ?></p>
				</div>
			</section>

			<section class="pfe-section-sm" id="ic-outcomes">
				<div class="pfe-wrap">
					<article class="pfe-card ic-outcomes-card">
						<h2 class="pfe-title ic-outcomes-title"><?php esc_html_e( 'By the end of this course, IC and HR Department members should be able to:', 'elearnposh-amp' ); ?></h2>
						<div class="ic-outcomes-body<?php echo $pfeic_youtube_id ? '' : ' ic-outcomes-body--no-video'; ?>">
							<ul class="ic-outcomes-list">
								<?php foreach ( $pfeic_outcomes as $pfeic_outcome ) : ?>
								<li><span class="ic-outcomes-tick" aria-hidden="true"></span><?php echo esc_html( $pfeic_outcome ); ?></li>
								<?php endforeach; ?>
							</ul>
							<?php if ( $pfeic_youtube_id ) : ?>
							<div class="ic-outcomes-video" aria-label="<?php esc_attr_e( 'POSH for IC Members course overview video', 'elearnposh-amp' ); ?>">
								<div class="pfe-video">
									<amp-youtube data-videoid="<?php echo esc_attr( $pfeic_youtube_id ); ?>" layout="responsive" width="16" height="9" title="<?php esc_attr_e( 'POSH for IC Members course overview', 'elearnposh-amp' ); ?>"></amp-youtube>
								</div>
							</div>
							<?php endif; ?>
						</div>
					</article>
				</div>
			</section>

			<section class="pfe-section-sm" id="ic-subscription">
				<div class="pfe-wrap">
					<h2 class="pfe-title"><?php esc_html_e( 'With the POSH for IC Members subscription, you get:', 'elearnposh-amp' ); ?></h2>
					<p class="pfe-sub ic-subscription-intro">
						<?php esc_html_e( 'Includes OnDemand eLearning, live expert webinars, and practical IC compliance tools for inquiries, documentation, and day-to-day committee operations.', 'elearnposh-amp' ); ?>
					</p>
					<div class="ic-sub-grid">
						<?php foreach ( $pfeic_subscription_blocks as $pfeic_subscription_block ) : ?>
						<article class="ic-sub-block ic-sub-block--<?php echo esc_attr( $pfeic_subscription_block['modifier'] ); ?>">
							<header class="ic-sub-block__head">
								<span class="ic-sub-block__icon" aria-hidden="true">
									<?php if ( 'learn' === $pfeic_subscription_block['modifier'] ) : ?>
									<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path fill="#fff" d="M8 5v14l11-7z"/></svg>
									<?php else : ?>
									<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path fill="#fff" d="M17 10.5V7a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-3.5l4 4v-11l-4 4z"/></svg>
									<?php endif; ?>
								</span>
								<div class="ic-sub-block__titles">
									<h3><?php echo esc_html( $pfeic_subscription_block['title'] ); ?></h3>
								</div>
							</header>
							<div class="ic-sub-block__body">
								<ul class="ic-sub-block__list">
									<?php foreach ( $pfeic_subscription_block['items'] as $pfeic_subscription_item ) : ?>
									<li>
										<span class="ic-sub-block__check" aria-hidden="true">&#10003;</span>
										<span class="ic-sub-block__text">
											<span class="ic-sub-block__label"><?php echo esc_html( $pfeic_subscription_item['label'] ); ?></span>
											<?php if ( ! empty( $pfeic_subscription_item['detail'] ) ) : ?>
											<span class="ic-sub-block__detail"><?php echo esc_html( $pfeic_subscription_item['detail'] ); ?></span>
											<?php endif; ?>
										</span>
									</li>
									<?php endforeach; ?>
								</ul>
								<?php if ( ! empty( $pfeic_subscription_block['footer'] ) ) : ?>
								<div class="ic-sub-block__footer">
									<p class="ic-sub-block__schedule">
										<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M19 4h-1V2h-2v2H8V2H6v2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2zm0 16H5V10h14v10z"/></svg>
										<span><?php echo esc_html( $pfeic_subscription_block['footer'] ); ?></span>
									</p>
								</div>
								<?php endif; ?>
							</div>
						</article>
						<?php endforeach; ?>
					</div>
				</div>
			</section>

			<section class="pfe-section" id="ic-tools">
				<div class="pfe-wrap">
					<h2 class="pfe-title"><?php esc_html_e( 'Tools and Resources', 'elearnposh-amp' ); ?></h2>
					<p class="pfe-sub ic-tools-intro"><?php esc_html_e( 'Practical compliance tools included with your IC Members subscription, built to support inquiries, documentation, reporting, and day-to-day committee operations.', 'elearnposh-amp' ); ?></p>
					<div class="ic-tools-grid">
						<?php foreach ( $pfeic_tools as $pfeic_tool_index => $pfeic_tool ) : ?>
						<article class="ic-tool-card">
							<div class="ic-tool-card__media">
								<span class="ic-tool-card__index"><?php echo esc_html( str_pad( (string) ( $pfeic_tool_index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span>
								<amp-img
									src="<?php echo esc_url( $pfeic_tool['img'] ); ?>"
									width="1024"
									height="673"
									layout="responsive"
									alt="<?php echo esc_attr( $pfeic_tool['title'] ); ?>">
								</amp-img>
							</div>
							<div class="ic-tool-card__body">
								<h3><?php echo esc_html( $pfeic_tool['title'] ); ?></h3>
								<p><?php echo esc_html( $pfeic_tool['desc'] ); ?></p>
								<span class="ic-tool-card__accent" aria-hidden="true"></span>
							</div>
						</article>
						<?php endforeach; ?>
					</div>
				</div>
			</section>

			<section class="pfe-section-sm">
				<div class="pfe-wrap">
					<div class="pfe-cta-band ep-cta-shell--white">
						<p><?php esc_html_e( 'Go beyond one-day workshops with year-round IC training, live expert webinars, and practical compliance tools built for Internal Committees.', 'elearnposh-amp' ); ?></p>
						<a class="btn-primary" href="<?php echo $demo_url; ?>"><?php esc_html_e( 'Schedule a Demo', 'elearnposh-amp' ); ?></a>
					</div>
				</div>
			</section>

			<section class="pfe-section" id="ic-faq">
				<div class="pfe-wrap">
					<h2 class="pfe-title"><?php esc_html_e( 'General FAQs on IC Training', 'elearnposh-amp' ); ?></h2>
					<amp-accordion animate expand-single-section>
						<?php foreach ( $pfeic_faq_items as $pfeic_faq_index => $pfeic_faq_item ) : ?>
						<section<?php echo 0 === $pfeic_faq_index ? ' expanded' : ''; ?>>
							<h3 class="faq-q"><?php echo esc_html( ( $pfeic_faq_index + 1 ) . '. ' . $pfeic_faq_item['question'] ); ?></h3>
							<div class="faq-a">
								<?php echo wp_kses_post( $pfeic_faq_item['answer_html'] ); ?>
							</div>
						</section>
						<?php endforeach; ?>
					</amp-accordion>
				</div>
			</section>

			<?php elearnposh_amp_render_top_courses_section( array( 'exclude' => 'ic-members' ) ); ?>
		</main>
		<div class="hrtag-end"></div>
	</div>
	<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/footer.php'; ?>
</body>
</html>
