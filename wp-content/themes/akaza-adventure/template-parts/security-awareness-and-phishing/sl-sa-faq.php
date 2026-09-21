<?php
/**
 * SucceedLEARN — Security Awareness and Phishing
 *
 * FAQ section for the Security Behaviour & Culture Suite.
 *
 * Uses the shared global FAQ component (global-faq.css / global-faq.js).
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$faq_items = array(
	array(
		'question' => __( 'What is the SucceedLEARN Security Behaviour & Culture Suite?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'The SucceedLEARN Security Behaviour & Culture Suite (SBCS) is an integrated security awareness ecosystem designed to help organisations strengthen employee cybersecurity knowledge, behaviour and resilience.', 'akaza-adventure' ) . '</p>'
			. '<p>' . esc_html__( 'The suite combines security awareness training, microlearning, phishing simulations, gamified learning, visual reinforcement, analytics and integrations to create a continuous security awareness programme rather than relying solely on periodic training.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'What solutions are included in the Security Behaviour & Culture Suite?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'The SucceedLEARN Security Behaviour & Culture Suite brings together seven interconnected solutions:', 'akaza-adventure' ) . '</p>'
			. '<ul>'
			. '<li><strong>S-Aware:</strong> ' . esc_html__( 'Foundational security and privacy awareness training.', 'akaza-adventure' ) . '</li>'
			. '<li><strong>S-Bytes:</strong> ' . esc_html__( 'Bite-sized microlearning for continuous reinforcement.', 'akaza-adventure' ) . '</li>'
			. '<li><strong>S-Phish:</strong> ' . esc_html__( 'Realistic phishing simulations to test employee readiness.', 'akaza-adventure' ) . '</li>'
			. '<li><strong>S-Play:</strong> ' . esc_html__( 'Gamified security learning and engagement.', 'akaza-adventure' ) . '</li>'
			. '<li><strong>S-Signs:</strong> ' . esc_html__( 'Visual security awareness reinforcement and nudges.', 'akaza-adventure' ) . '</li>'
			. '<li><strong>S-Metrics:</strong> ' . esc_html__( 'Reporting and analytics for measuring programme performance.', 'akaza-adventure' ) . '</li>'
			. '<li><strong>S-Sync:</strong> ' . esc_html__( "Integrations that connect security awareness with the organisation's wider technology and learning ecosystem.", 'akaza-adventure' ) . '</li>'
			. '</ul>'
			. '<p>' . esc_html__( 'Together, these solutions help organisations learn, reinforce, test, engage, remind, measure and connect their security awareness activities.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'How is the SBCS approach different from traditional security awareness training?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Traditional security awareness programmes often centre around annual training and course completion. While foundational training remains important, employee security behaviour needs to be reinforced throughout the year.', 'akaza-adventure' ) . '</p>'
			. '<p>' . esc_html__( 'SBCS combines multiple awareness interventions, including training, microlearning, phishing simulations, gamification and visual reinforcement, with measurement and analytics.', 'akaza-adventure' ) . '</p>'
			. '<p>' . esc_html__( 'This enables organisations to move from a periodic "train and complete" approach towards a continuous cycle of learning, practice, reinforcement and measurement.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Why is continuous security awareness important?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Cyber threats continue to evolve, while employees make security-related decisions throughout their everyday work.', 'akaza-adventure' ) . '</p>'
			. '<p>' . esc_html__( 'A single annual training session may build initial awareness, but knowledge can fade over time. Continuous security awareness creates regular opportunities to revisit important concepts, practise recognising threats and reinforce secure behaviours.', 'akaza-adventure' ) . '</p>'
			. '<p>' . esc_html__( 'By maintaining regular security touchpoints throughout the year, organisations can help keep cybersecurity visible and relevant rather than treating it as a once-a-year compliance activity.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Can organisations use individual S-Series solutions without implementing the entire suite?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Yes. Organisations can select individual S-Series solutions based on their security awareness requirements and programme objectives.', 'akaza-adventure' ) . '</p>'
			. '<p>' . esc_html__( 'For example, an organisation may begin with S-Aware for foundational awareness training or S-Phish for phishing simulations and later introduce additional solutions for microlearning, gamification and visual reinforcements.', 'akaza-adventure' ) . '</p>'
			. '<p>' . esc_html__( 'The solutions are designed to work together as part of the wider SBCS ecosystem, allowing organisations to develop their security awareness programme over time.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'What cybersecurity topics can employees learn about through SucceedLEARN?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'The SucceedLEARN security awareness ecosystem can address a range of security, privacy and cyber-risk topics depending on the selected courses and awareness programme.', 'akaza-adventure' ) . '</p>'
			. '<p>' . esc_html__( 'These can include areas such as information security, phishing and social engineering, password and account security, data protection and privacy, secure remote working, malware and cyber threats, responsible use of technology, responsible use of AI, information handling and incident identification and reporting.', 'akaza-adventure' ) . '</p>'
			. '<p>' . esc_html__( 'Organisations can structure their awareness initiatives around relevant workforce risks, security priorities and programme requirements.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Can the security awareness programme be customised for our organisation?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Customisation can be supported depending on the selected S-Series solution, content and agreed scope.', 'akaza-adventure' ) . '</p>'
			. '<p>' . esc_html__( 'This may include elements such as organisational branding, internal policies and procedures, organisation-specific terminology, reporting mechanisms, examples and other relevant internal requirements.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Can SucceedLEARN support our security and compliance objectives?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Security awareness is an important component of many cybersecurity, information security, privacy and compliance programmes.', 'akaza-adventure' ) . '</p>'
			. '<p>' . esc_html__( 'SucceedLEARN can help organisations deliver structured awareness initiatives, track participation and learning activity, conduct practical simulations, and maintain reporting that can support internal governance, audits and relevant compliance objectives.', 'akaza-adventure' ) . '</p>'
			. '<p>' . esc_html__( "The specific training and programme requirements should be determined based on the organisation's applicable regulatory, contractual and security obligations.", 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( "Can security awareness training be delivered through the client's existing LMS?", 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( "Depending on the selected SucceedLEARN solution and deployment model, security awareness content can be delivered through SucceedLEARN's learning environment or through an organisation's existing Learning Management System using compatible content formats such as SCORM.", 'akaza-adventure' ) . '</p>'
			. '<p>' . esc_html__( 'This gives organisations flexibility to incorporate security awareness into their existing learning infrastructure while also having the option of using the wider SucceedLEARN ecosystem.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'How can organisations measure the effectiveness of their security awareness programme?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Security awareness effectiveness should be evaluated using more than course completion alone.', 'akaza-adventure' ) . '</p>'
			. '<p>' . esc_html__( 'Across the SBCS ecosystem, organisations can gain visibility into indicators such as learning participation, assessment performance, phishing simulation behaviour, reporting behaviour, remedial learning and other engagement measures depending on the solutions deployed.', 'akaza-adventure' ) . '</p>'
			. '<p>' . esc_html__( 'S-Metrics provides the measurement layer of the suite, helping bring relevant awareness and behavioural information together to provide greater visibility into programme performance and areas where additional reinforcement may be required.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Who is the SucceedLEARN Security Behaviour & Culture Suite designed for?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'SBCS is designed for organisations seeking to build stronger cybersecurity awareness and security behaviours across their workforce.', 'akaza-adventure' ) . '</p>'
			. '<p>' . esc_html__( "Employees across roles and departments can participate in awareness and reinforcement activities, while teams including Information Security, Cybersecurity, Compliance, Risk, Learning & Development, HR and People functions can use the suite to support and manage different aspects of the organisation's security awareness programme.", 'akaza-adventure' ) . '</p>'
			. '<p>' . esc_html__( 'This enables security awareness to become a shared organisational initiative rather than the responsibility of a single function.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'How do the S-Series solutions work together to support behaviour change?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Each S-Series solution addresses a different part of the security behaviour journey.', 'akaza-adventure' ) . '</p>'
			. '<ul>'
			. '<li><strong>S-Aware</strong> ' . esc_html__( 'helps employees learn.', 'akaza-adventure' ) . '</li>'
			. '<li><strong>S-Bytes</strong> ' . esc_html__( 'reinforces knowledge.', 'akaza-adventure' ) . '</li>'
			. '<li><strong>S-Phish</strong> ' . esc_html__( 'puts awareness to the test.', 'akaza-adventure' ) . '</li>'
			. '<li><strong>S-Play</strong> ' . esc_html__( 'creates engagement through gamified learning.', 'akaza-adventure' ) . '</li>'
			. '<li><strong>S-Signs</strong> ' . esc_html__( 'keeps security visible.', 'akaza-adventure' ) . '</li>'
			. '<li><strong>S-Metrics</strong> ' . esc_html__( 'measures programme performance.', 'akaza-adventure' ) . '</li>'
			. '<li><strong>S-Sync</strong> ' . esc_html__( 'connects the ecosystem.', 'akaza-adventure' ) . '</li>'
			. '</ul>'
			. '<p>' . esc_html__( 'Together, they create a continuous cycle in which employees can learn, practise, receive reinforcement and improve, while organisations gain greater visibility into their security awareness programme.', 'akaza-adventure' ) . '</p>'
			. '<p>' . esc_html__( 'This helps move security awareness beyond isolated training activities towards a broader culture of continuous security learning and behaviour change.', 'akaza-adventure' ) . '</p>',
	),
);

get_template_part(
	'template-parts/global/faq',
	null,
	array(
		'id'            => 'frequently-asked-questions',
		'section_class' => 'sl-sap-faq',
		'eyebrow'       => __( 'FAQ', 'akaza-adventure' ),
		'title_html'    => __( 'Frequently Asked <span>Questions</span>', 'akaza-adventure' ),
		'description'   => __( 'Answers to common questions about the SucceedLEARN Security Behaviour & Culture Suite and how the S-Series solutions support continuous security awareness.', 'akaza-adventure' ),
		'cta_text'      => __( 'Speak to a specialist', 'akaza-adventure' ),
		'cta_url'       => '#contact',
		'numbered'      => true,
		'open_first'    => true,
		'schema'        => true,
		'items'         => $faq_items,
	)
);
