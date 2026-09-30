<?php
/**
 * S-Signs — AMP data helpers.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Include an S-Signs section partial.
 *
 * @param string $name Partial basename without .php.
 */
function succeedlearn_amp_ss_partial( $name ) {
	$path = SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'partials/s-signs/' . sanitize_file_name( (string) $name ) . '.php';
	if ( is_readable( $path ) ) {
		include $path;
	}
}

/**
 * @return string
 */
function succeedlearn_amp_get_ss_canonical_url() {
	$fallback = home_url( '/security-awareness/s-signs-security-awareness/' );
	foreach ( array(
		's-signs',
		's-signs-security-awareness',
		'security-awareness/s-signs-security-awareness',
		'security-awareness/s-signs',
	) as $slug ) {
		$page = get_page_by_path( $slug );
		if ( $page instanceof WP_Post && 'publish' === $page->post_status ) {
			$link = get_permalink( $page );
			if ( $link ) {
				return $link;
			}
		}
	}
	return $fallback;
}

/**
 * @return string
 */
function succeedlearn_amp_get_ss_page_title() {
	return __( 'Visual Security Awareness Posters & Digital Nudges', 'succeedlearn-amp' );
}

/**
 * @return string
 */
function succeedlearn_amp_get_ss_meta_description() {
	return __( 'S-Signs is the visual reinforcement solution within the SucceedLEARN Security Behaviour & Culture Suite, providing a growing library of cybersecurity awareness posters, digital security reminders and behavioural nudges.', 'succeedlearn-amp' );
}

/**
 * @return string
 */
function succeedlearn_amp_get_ss_hero_image() {
	return succeedlearn_amp_upload_url( '2026/09/S-Signs-Posters-Digital-Reminders.webp' );
}

/**
 * @return string
 */
function succeedlearn_amp_get_ss_filtering_image() {
	return succeedlearn_amp_upload_url( '2026/09/The-Visual-Reinforcement-Layer-of-SBCS.webp' );
}

/**
 * @return string
 */
function succeedlearn_amp_get_ss_library_image() {
	return succeedlearn_amp_upload_url( '2026/09/A-growing-library-of-posters.webp' );
}

/**
 * @return string
 */
function succeedlearn_amp_get_ss_nudges_image() {
	return succeedlearn_amp_upload_url( '2026/09/S-Signs-Directive-and-Nudge-Posters.webp' );
}

/**
 * @return string
 */
function succeedlearn_amp_get_ss_suite_image() {
	return succeedlearn_amp_upload_url( '2026/09/From-Awareness-to-Real-World-Readiness.webp' );
}

/**
 * @return array<int, array{title:string,text:string}>
 */
function succeedlearn_amp_get_ss_campaigns() {
	return array(
		array(
			'title' => __( 'Cybersecurity Awareness Month', 'succeedlearn-amp' ),
			'text'  => __( 'Create themed awareness campaigns around phishing, passwords, data security, remote working and other priority topics.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Phishing Reinforcement', 'succeedlearn-amp' ),
			'text'  => __( 'Follow a phishing simulation campaign with visual reminders about suspicious messages, links, verification and reporting.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Remote & Hybrid Working', 'succeedlearn-amp' ),
			'text'  => __( 'Reinforce safer behaviours around Wi-Fi, devices, information handling and remote access.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Emerging Threat Awareness', 'succeedlearn-amp' ),
			'text'  => __( 'Use relevant visual content to highlight new or evolving risks such as AI-enabled attacks.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Data Protection Campaigns', 'succeedlearn-amp' ),
			'text'  => __( 'Keep secure information handling, confidentiality and privacy responsibilities visible.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Security Incident Reporting', 'succeedlearn-amp' ),
			'text'  => __( 'Remind employees where and when suspicious activity should be reported.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'New Joiner Awareness', 'succeedlearn-amp' ),
			'text'  => __( 'Include security posters and digital reminders as part of the broader employee onboarding experience.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * @return array<int, array{title:string,text:string}>
 */
function succeedlearn_amp_get_ss_employees() {
	return array(
		array(
			'title' => __( 'New Joiners', 'succeedlearn-amp' ),
			'text'  => __( 'Reinforce foundational security behaviours as employees become familiar with organisational policies and systems.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Employees Across the Organisation', 'succeedlearn-amp' ),
			'text'  => __( 'Maintain regular cybersecurity visibility across departments and functions.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Managers & People Leaders', 'succeedlearn-amp' ),
			'text'  => __( 'Support employees responsible for teams, information and organisational decisions with ongoing security reminders.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Remote & Hybrid Workforces', 'succeedlearn-amp' ),
			'text'  => __( 'Keep awareness visible to employees working outside traditional office environments.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * @return array<int, array{title:string,text:string}>
 */
function succeedlearn_amp_get_ss_teams() {
	return array(
		array(
			'title' => __( 'Information Security & Cybersecurity Teams', 'succeedlearn-amp' ),
			'text'  => __( 'Reinforce priority cyber risks and behaviours through targeted visual campaigns.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Compliance & Risk Teams', 'succeedlearn-amp' ),
			'text'  => __( 'Support ongoing communication around information security, privacy and relevant organisational responsibilities.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Learning & Development Teams', 'succeedlearn-amp' ),
			'text'  => __( 'Extend key learning messages beyond formal courses through continuous visual reinforcement.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'HR & People Teams', 'succeedlearn-amp' ),
			'text'  => __( 'Integrate security reminders into employee communications, onboarding and workplace engagement initiatives.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Leadership', 'succeedlearn-amp' ),
			'text'  => __( 'Support an environment where cybersecurity remains visible across the organisation throughout the year.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * Suite products from global SBCS component.
 *
 * @return array<int, array{name:string,action:string,description:string}>
 */
function succeedlearn_amp_get_ss_suite_items() {
	return array(
		array(
			'name'        => __( 'S-Aware', 'succeedlearn-amp' ),
			'action'      => __( 'Learn', 'succeedlearn-amp' ),
			'description' => __( 'Build foundational cybersecurity and privacy knowledge.', 'succeedlearn-amp' ),
		),
		array(
			'name'        => __( 'S-Bytes', 'succeedlearn-amp' ),
			'action'      => __( 'Reinforce', 'succeedlearn-amp' ),
			'description' => __( 'Keep important security concepts fresh through continuous microlearning.', 'succeedlearn-amp' ),
		),
		array(
			'name'        => __( 'S-Phish', 'succeedlearn-amp' ),
			'action'      => __( 'Test', 'succeedlearn-amp' ),
			'description' => __( 'Give employees practical experience recognising realistic phishing threats.', 'succeedlearn-amp' ),
		),
		array(
			'name'        => __( 'S-Play', 'succeedlearn-amp' ),
			'action'      => __( 'Engage', 'succeedlearn-amp' ),
			'description' => __( 'Reinforce cybersecurity concepts through interactive and gamified learning.', 'succeedlearn-amp' ),
		),
		array(
			'name'        => __( 'S-Signs', 'succeedlearn-amp' ),
			'action'      => __( 'Remind', 'succeedlearn-amp' ),
			'description' => __( 'Keep security visible through ongoing awareness campaigns and visual nudges.', 'succeedlearn-amp' ),
		),
		array(
			'name'        => __( 'S-Metrics', 'succeedlearn-amp' ),
			'action'      => __( 'Measure', 'succeedlearn-amp' ),
			'description' => __( 'Bring awareness and behavioural data together to understand programme performance.', 'succeedlearn-amp' ),
		),
		array(
			'name'        => __( 'S-Sync', 'succeedlearn-amp' ),
			'action'      => __( 'Connect', 'succeedlearn-amp' ),
			'description' => __( "Integrate security awareness with the organisation's wider learning and technology ecosystem.", 'succeedlearn-amp' ),
		),
	);
}

/**
 * @return array<int, array{title:string,text:string}>
 */
function succeedlearn_amp_get_ss_choose_items() {
	return array(
		array(
			'title' => __( 'Continuous Visual Reinforcement', 'succeedlearn-amp' ),
			'text'  => __( 'Keep important cybersecurity messages visible between formal training and awareness activities.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Multiple Communication Styles', 'succeedlearn-amp' ),
			'text'  => __( 'Combine instructional posters with behavioural nudges depending on the awareness objective.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Broad Cybersecurity Coverage', 'succeedlearn-amp' ),
			'text'  => __( 'Reinforce awareness across phishing, passwords, remote working, AI security, mobile devices, data protection and other relevant cyber risks.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Flexible Distribution', 'succeedlearn-amp' ),
			'text'  => __( 'Use visual content across office environments, digital signage, employee communications and collaboration platforms.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Part of a Wider Awareness Programme', 'succeedlearn-amp' ),
			'text'  => __( 'Connect visual reinforcement with S-Aware, S-Bytes, S-Phish, S-Play and S-Metrics as part of the wider SBCS ecosystem.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * @return array<int, array{traditional:string,ssigns:string}>
 */
function succeedlearn_amp_get_ss_comparison_items() {
	return array(
		array(
			'traditional' => __( 'Awareness concentrated around training events', 'succeedlearn-amp' ),
			'ssigns'      => __( 'Continuous visual reinforcement', 'succeedlearn-amp' ),
		),
		array(
			'traditional' => __( 'Lengthy security communications', 'succeedlearn-amp' ),
			'ssigns'      => __( 'Short, focused visual messages', 'succeedlearn-amp' ),
		),
		array(
			'traditional' => __( 'Employees need to actively access content', 'succeedlearn-amp' ),
			'ssigns'      => __( 'Awareness can appear within the workplace', 'succeedlearn-amp' ),
		),
		array(
			'traditional' => __( 'Single communication style', 'succeedlearn-amp' ),
			'ssigns'      => __( 'Directive posters and behavioural nudges', 'succeedlearn-amp' ),
		),
		array(
			'traditional' => __( 'Limited campaign flexibility', 'succeedlearn-amp' ),
			'ssigns'      => __( 'Topic-based visual awareness campaigns', 'succeedlearn-amp' ),
		),
		array(
			'traditional' => __( 'Primarily digital or email-based', 'succeedlearn-amp' ),
			'ssigns'      => __( 'Physical and digital distribution', 'succeedlearn-amp' ),
		),
		array(
			'traditional' => __( 'Security messages may fade over time', 'succeedlearn-amp' ),
			'ssigns'      => __( 'Regular visual reminders keep topics visible', 'succeedlearn-amp' ),
		),
	);
}

/**
 * @return array<int, array{question:string,answer:string}>
 */
function succeedlearn_amp_get_ss_faq_items() {
	$pairs = array(
		array( __( 'What is the purpose of security awareness posters?', 'succeedlearn-amp' ), __( 'Posters act as constant visual reminders that help reinforce key security practices employees have learned through training.', 'succeedlearn-amp' ) ),
		array( __( 'How do posters support long-term learning?', 'succeedlearn-amp' ), __( 'By regularly displaying reminders, posters help people retain and apply important behaviors over time.', 'succeedlearn-amp' ) ),
		array( __( 'Are image-based posters really effective?', 'succeedlearn-amp' ), __( 'Yes. Visual cues are processed faster by the brain and often stick longer than text-heavy messages.', 'succeedlearn-amp' ) ),
		array( __( 'Where should these posters be placed?', 'succeedlearn-amp' ), __( 'In high-visibility areas like hallways, break rooms, near elevators, and digitally on intranet pages or email.', 'succeedlearn-amp' ) ),
		array( __( 'Can posters replace formal training?', 'succeedlearn-amp' ), __( 'No-they complement formal training by keeping messages alive after a course or simulation is over.', 'succeedlearn-amp' ) ),
		array( __( 'How often should new posters be shown?', 'succeedlearn-amp' ), __( 'Weekly or monthly rotations work well to keep the content fresh and employees engaged.', 'succeedlearn-amp' ) ),
		array( __( 'Can I send these posters by email?', 'succeedlearn-amp' ), __( 'Absolutely! S-Signs are formatted for easy email distribution in addition to print.', 'succeedlearn-amp' ) ),
		array( __( 'Can we customize posters with our branding?', 'succeedlearn-amp' ), __( 'Yes. Logos, colors, and even department-specific messaging can be added to match your brand.', 'succeedlearn-amp' ) ),
		array( __( 'Do visual campaigns really change behavior?', 'succeedlearn-amp' ), __( 'When combined with training, yes-visual nudges encourage everyday vigilance and habit-building.', 'succeedlearn-amp' ) ),
		array( __( 'Is there a psychological reason posters work?', 'succeedlearn-amp' ), __( 'Yes. Visual repetition triggers recall, and humour or surprise in posters increases message retention and sharing.', 'succeedlearn-amp' ) ),
		array( __( 'Can we track poster engagement?', 'succeedlearn-amp' ), __( 'If emailed through the LMS, views can be tracked to show reach and frequency.', 'succeedlearn-amp' ) ),
		array( __( 'Are the posters aligned with global awareness campaigns?', 'succeedlearn-amp' ), __( 'Yes. We include posters for Cybersecurity Awareness Month, Data Privacy Day, and more.', 'succeedlearn-amp' ) ),
		array( __( 'Can I request posters in different languages?', 'succeedlearn-amp' ), __( 'Localized versions can be created on request-contact us for language options.', 'succeedlearn-amp' ) ),
		array( __( 'How many posters are included in S-Signs?', 'succeedlearn-amp' ), __( 'Currently, over 50 posters are available and the library continues to grow.', 'succeedlearn-amp' ) ),
		array( __( 'Are there posters for specific threats like phishing?', 'succeedlearn-amp' ), __( 'Yes, phishing is one of the most covered topics, with multiple poster designs.', 'succeedlearn-amp' ) ),
		array( __( 'Do the posters include interactive elements?', 'succeedlearn-amp' ), __( 'Most are static, but QR codes or embedded links can be added upon request.', 'succeedlearn-amp' ) ),
		array( __( 'Can I print them in large formats?', 'succeedlearn-amp' ), __( 'Yes, high-resolution files are available for print sizes up to A2 or larger.', 'succeedlearn-amp' ) ),
		array( __( 'Can I edit the text in a poster?', 'succeedlearn-amp' ), __( 'Editable formats are available so you can localize or change messaging.', 'succeedlearn-amp' ) ),
		array( __( 'Are these available with the SucceedLEARN subscription?', 'succeedlearn-amp' ), __( 'Yes, S-Signs is included in the Security Awareness Package.', 'succeedlearn-amp' ) ),
		array( __( 'How do I get started with S-Signs?', 'succeedlearn-amp' ), __( 'Just browse the library, pick a poster or campaign, and deploy instantly!', 'succeedlearn-amp' ) ),
	);

	$items = array();
	foreach ( $pairs as $pair ) {
		$items[] = array(
			'question' => $pair[0],
			'answer'   => '<p>' . esc_html( $pair[1] ) . '</p>',
		);
	}

	return $items;
}

/**
 * FAQPage JSON-LD for the S-Signs AMP page.
 *
 * @return array<string, mixed>
 */
function succeedlearn_amp_ss_faq_schema() {
	$entities = array();
	foreach ( succeedlearn_amp_get_ss_faq_items() as $item ) {
		$entities[] = array(
			'@type'          => 'Question',
			'name'           => $item['question'],
			'acceptedAnswer' => array(
				'@type' => 'Answer',
				'text'  => wp_strip_all_tags( $item['answer'] ),
			),
		);
	}

	return array(
		'@context'   => 'https://schema.org',
		'@type'      => 'FAQPage',
		'mainEntity' => $entities,
	);
}
