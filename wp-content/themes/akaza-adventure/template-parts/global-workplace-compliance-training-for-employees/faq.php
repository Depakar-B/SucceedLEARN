<?php
/**
 * Global Workplace Compliance Training for Employees — FAQ section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$faq_items = array(
	array(
		'question' => __( 'Who should take these courses?', 'akaza-adventure' ),
		'answer'   => __( 'The courses are suitable for employees, managers, supervisors, and leaders. Specific modules can be assigned based on role, location, and applicable compliance requirements.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Can the training be customised for our organisation?', 'akaza-adventure' ),
		'answer'   => __( 'Yes. Course content, branding, policies, scenarios, assessments, and supporting resources can be tailored to your organisation’s requirements.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Is the training suitable for a global workforce?', 'akaza-adventure' ),
		'answer'   => __( 'Yes. Organisations can create learning pathways based on each employee’s country, role, and responsibilities, helping deliver relevant training across a global workforce. We have a Global module which can be delivered to employees in multiple countries.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'How are the courses delivered?', 'akaza-adventure' ),
		'answer'   => __( 'The modules are delivered online and can be accessed through SucceedLEARN or, subject to technical compatibility, deployed through your organisation’s learning management system.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Can we track employee completion and assessment scores?', 'akaza-adventure' ),
		'answer'   => __( 'Yes. Administrators can monitor enrolment, course progress, completion status, and assessment scores to support internal compliance reporting.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'How long does each module take to complete?', 'akaza-adventure' ),
		'answer'   => __( 'Completion time varies by topic and course version. Each course page provides the expected duration, intended audience, and learning objectives.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'How often is the course content reviewed?', 'akaza-adventure' ),
		'answer'   => __( 'The content is periodically reviewed to maintain relevance. Organisations should also ensure that training is supported by current internal policies and jurisdiction-specific legal advice.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'How can we request a demo or discuss our requirements?', 'akaza-adventure' ),
		'answer'   => __( 'Contact the SucceedLEARN team through the enquiry form to request a demonstration, explore relevant modules, and discuss customisation, deployment, and pricing.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Does the training include assessments or knowledge checks?', 'akaza-adventure' ),
		'answer'   => __( 'Yes. Modules can include quizzes, scenario-based questions, and assessments to reinforce learning and measure understanding.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Will employees receive a certificate after completing a course?', 'akaza-adventure' ),
		'answer'   => __( 'Certificates of completion can be provided for eligible modules, helping organisations maintain training records and demonstrate participation.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Can the courses incorporate our workplace policies?', 'akaza-adventure' ),
		'answer'   => __( 'Yes. Relevant internal policies, reporting procedures, escalation routes, leadership messages, and contact information can be incorporated into the learning experience.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Are the modules accessible on mobile devices?', 'akaza-adventure' ),
		'answer'   => __( 'The online modules are designed for flexible learning and can be accessed on compatible desktops, tablets, and mobile devices.', 'akaza-adventure' ),
	),
);

$schema_entities = array();
foreach ( $faq_items as $item ) {
	$schema_entities[] = array(
		'@type'          => 'Question',
		'name'           => $item['question'],
		'acceptedAnswer' => array(
			'@type' => 'Answer',
			'text'  => $item['answer'],
		),
	);
}

$schema = array(
	'@context'   => 'https://schema.org',
	'@type'      => 'FAQPage',
	'mainEntity' => $schema_entities,
);
?>
<script type="application/ld+json"><?php echo wp_json_encode( $schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ); ?></script>

<section class="sl-global-faq-section" aria-labelledby="sl-global-faq-heading">

	<div class="container">

		<div class="sl-global-faq-heading">
			<span class="sl-home-sub-heading"><?php esc_html_e( 'FAQ', 'akaza-adventure' ); ?></span>
			<h2 id="sl-global-faq-heading">
				<?php
				echo wp_kses(
					__( 'The questions buyers <span>actually ask</span>', 'akaza-adventure' ),
					array( 'span' => array() )
				);
				?>
			</h2>
			<p class="sl-global-faq-intro">
				<?php esc_html_e( 'Clear answers for HR, L&D, and compliance teams evaluating workplace training programmes: from customisation and global deployment to tracking, assessments, and getting started.', 'akaza-adventure' ); ?>
			</p>
		</div>

		<div class="sl-global-faq-grid">
			<?php foreach ( $faq_items as $index => $item ) : ?>
				<details class="sl-global-faq-item">
					<summary>
						<span class="sl-global-faq-item__question">
							<span class="sl-global-faq-item__index" aria-hidden="true"><?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span>
							<?php echo esc_html( $item['question'] ); ?>
						</span>
						<span class="sl-global-faq-item__toggle" aria-hidden="true">
							<i class="bi bi-chevron-down"></i>
						</span>
					</summary>
					<div class="sl-global-faq-item__answer">
						<p><?php echo esc_html( $item['answer'] ); ?></p>
					</div>
				</details>
			<?php endforeach; ?>
		</div>

	</div>

</section>
