<?php
/**
 * Political Donations Training — Frequently Asked Questions.
 *
 * Uses the global FAQ component.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$faq_items = array(
	array(
		'question' => __( 'What is political donations training?', 'akaza-adventure' ),
		'answer'   => __( 'Political donations training helps employees recognise political activity that may create regulatory, anti-bribery, conflict of interest or reputational risk.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'What can count as a political donation?', 'akaza-adventure' ),
		'answer'   => __( 'Political donations can include monetary contributions, fundraising participation, sponsorship, facilities, services and in-kind support depending on the circumstances.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Why are political contributions relevant to investment firms?', 'akaza-adventure' ),
		'answer'   => __( 'Investment firms may interact with investors, public bodies, portfolio companies and government-linked stakeholders, creating additional influence and conflict risks.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Can personal political activity create professional risk?', 'akaza-adventure' ),
		'answer'   => __( 'Yes. Risk can arise where an employee\'s professional title, organisation name, business access or firm resources are visible.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Does the course cover both UK and US political contribution risks?', 'akaza-adventure' ),
		'answer'   => __( 'Yes. The course introduces UK political donations and anti-bribery considerations alongside US Pay-to-Play issues relevant to internationally active investment firms.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Can using a job title create political contribution risk?', 'akaza-adventure' ),
		'answer'   => __( 'Yes. A professional title can make personal political activity appear connected with the organisation and may create perceived endorsement.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Can providing facilities count as political support?', 'akaza-adventure' ),
		'answer'   => __( 'Depending on the circumstances, providing facilities, services or organisational resources can constitute in-kind political support.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Who should take political contributions compliance training?', 'akaza-adventure' ),
		'answer'   => __( 'It is relevant to investment teams, managers, executives, portfolio-facing professionals and Compliance, Legal and Risk functions.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'What is Pay-to-Play in investment management?', 'akaza-adventure' ),
		'answer'   => __( 'Pay-to-Play describes concerns around political contributions being connected with obtaining or retaining government investment advisory business.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Why should firms provide political contribution compliance training?', 'akaza-adventure' ),
		'answer'   => __( 'Training helps employees recognise risks early, follow internal approval procedures and reduce compliance, conflict and reputational exposure.', 'akaza-adventure' ),
	),
);

get_template_part(
	'template-parts/global/faq',
	null,
	array(
		'id'            => 'frequently-asked-questions',
		'section_class' => 'sl-faq-section--alt sl-political-donations-faq',
		'eyebrow'       => __( 'Frequently Asked Questions', 'akaza-adventure' ),
		'title_html'    => __( 'Political Contributions, Pay-to-Play and <span>Compliance Training FAQs</span>', 'akaza-adventure' ),
		'numbered'      => true,
		'items'         => $faq_items,
		'schema'        => true,
	)
);