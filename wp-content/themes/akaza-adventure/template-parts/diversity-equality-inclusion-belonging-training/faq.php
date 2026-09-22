<?php
/**
 * DEI&B — FAQ section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$faq_items = array(
	array(
		'question' => __( 'How long does the course take?', 'akaza-adventure' ),
		'answer'   => __( 'The course duration is 60 minutes. It is designed at beginner level for employees, supervisors, managers and HR professionals.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Is the course suitable for international teams?', 'akaza-adventure' ),
		'answer'   => __( 'It introduces equality and discrimination frameworks from multiple jurisdictions. Organisations should review suitability for their workforce and reinforce the learning with relevant local policies and guidance.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Does completing the course guarantee compliance?', 'akaza-adventure' ),
		'answer'   => __( 'No. Training supports a wider organisational effort that includes effective policies, accessible reporting channels, fair management practices and appropriate responses to concerns.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Can we review the course before selecting it?', 'akaza-adventure' ),
		'answer'   => __( 'Yes. Request a demo to review the content and learning experience, and discuss delivery and customisation requirements with our team.', 'akaza-adventure' ),
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

<section class="sl-deib-faq" aria-labelledby="sl-deib-faq-heading">

	<div class="container">

		<div class="sl-deib-faq__intro">
			<h2 id="sl-deib-faq-heading">
				<?php esc_html_e( 'Questions before you choose', 'akaza-adventure' ); ?>
			</h2>
		</div>

		<div class="sl-deib-faq__list">
			<?php foreach ( $faq_items as $index => $item ) : ?>
				<details class="sl-deib-faq__item"<?php echo 0 === $index ? ' open' : ''; ?>>
					<summary>
						<h3 class="sl-deib-faq__question"><?php echo esc_html( $item['question'] ); ?></h3>
						<span class="sl-deib-faq__toggle" aria-hidden="true">
							<i class="bi bi-chevron-down"></i>
						</span>
					</summary>
					<div class="sl-deib-faq__answer">
						<p><?php echo esc_html( $item['answer'] ); ?></p>
					</div>
				</details>
			<?php endforeach; ?>
		</div>

	</div>

</section>
