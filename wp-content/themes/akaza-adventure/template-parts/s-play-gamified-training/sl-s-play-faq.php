<?php
/**
 * S-Play — Frequently Asked Questions.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$faq_items = array(
	array(
		'question' => __( 'What is gamified security awareness training?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Gamified security awareness training uses game mechanics, interactive challenges, scenarios and decision-making activities to help employees actively engage with cybersecurity concepts rather than only consuming passive learning content.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'What is S-Play?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'S-Play is the gamified cybersecurity learning solution within the SucceedLEARN Security Behaviour & Culture Suite. It enables organisations to reinforce security awareness through interactive games and structured awareness campaigns.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'What cybersecurity games are available in S-Play?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'S-Play currently includes interactive learning experiences such as Grab or Duck, Out of the Well and Cyber Crossword, with different formats designed to reinforce decision-making, application and knowledge recall.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Does S-Play replace security awareness training?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'No. S-Play is designed to complement foundational security awareness training by giving employees additional opportunities to revisit, apply and reinforce cybersecurity concepts through interactive learning.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Can S-Play be used throughout the year?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Yes. Organisations can schedule gamified security awareness campaigns at different points throughout their awareness programme, helping create additional employee engagement beyond formal training events.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Can security games be assigned to specific employee groups?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Yes. S-Play campaigns can be assigned across the organisation or targeted to specific departments, locations, teams or custom employee groups.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Can administrators schedule S-Play campaigns in advance?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Yes. Campaigns can be launched immediately or scheduled for a future date, allowing organisations to incorporate gamified activities into their wider security awareness calendar.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Can organisations track employee participation in S-Play?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'S-Play provides visibility into campaign activity and employee participation. When used within the wider SucceedLEARN SBCS ecosystem, S-Play activity can also contribute to broader programme measurement through S-Metrics.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'How does gamification support cybersecurity awareness?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Gamification encourages employees to interact with security concepts through challenges, decisions and knowledge-based activities. This gives learners opportunities to actively apply and revisit what they have learned rather than relying entirely on passive content consumption.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Who can use S-Play?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'S-Play can be used across different employee populations, including new joiners, existing employees, managers, remote and hybrid workers, and other groups that organisations want to engage through cybersecurity awareness activities.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Can S-Play complement phishing simulations and microlearning?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Yes. Within SBCS, S-Play can work alongside S-Phish for phishing simulations, S-Bytes for continuous microlearning and S-Aware for foundational security awareness training, creating multiple forms of learning and reinforcement.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( "Can S-Play be delivered through an organisation's LMS?", 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( "S-Play supports SucceedLEARN-based delivery, and SCORM delivery can be available depending on the applicable game or deployment configuration. Organisations can select the delivery approach that fits their learning environment.", 'akaza-adventure' ) . '</p>',
	),
);

get_template_part(
	'template-parts/global/faq',
	null,
	array(
		'id'            => 'frequently-asked-questions',
		'section_class' => 'sl-s-play-faq',
		'eyebrow'       => __( 'Frequently Asked Questions', 'akaza-adventure' ),
		'title_html'    => __( 'Frequently Asked <span>Questions</span>', 'akaza-adventure' ),
		'description'   => __( 'Answers to common questions about S-Play and gamified security awareness training.', 'akaza-adventure' ),
		'cta_text'      => __( 'Request Demo', 'akaza-adventure' ),
		'cta_url'       => '#request-demo',
		'numbered'      => true,
		'open_first'    => true,
		'schema'        => true,
		'items'         => $faq_items,
	)
);
