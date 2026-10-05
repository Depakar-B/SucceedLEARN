<?php
/**
 * Failure to Prevent Fraud — FAQ (native <details> accordion) + FAQPage schema.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$faqs = array(
	array(
		'question' => __( 'What is the Failure to Prevent Fraud offence?', 'akaza-adventure' ),
		'answer'   => __( 'The Economic Crime and Corporate Transparency Act 2023 created a corporate Failure to Prevent Fraud offence. It can apply to large organisations where an associated person commits a specified fraud offence intending to benefit the organisation and reasonable fraud-prevention procedures were not in place.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'When did the offence come into force?', 'akaza-adventure' ),
		'answer'   => __( 'The Failure to Prevent Fraud offence came into force on 1 September 2025.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Why does employee training matter?', 'akaza-adventure' ),
		'answer'   => __( 'Employees can influence information, financial records, reporting and commercial decisions. Government guidance on reasonable fraud-prevention procedures includes communication, including training, among its six principles.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Who is this course relevant for?', 'akaza-adventure' ),
		'answer'   => __( 'Fraud prevention is relevant throughout an organisation. The course highlights Investment and Deal Teams, Finance and Fund Operations, external-reporting functions, Sales and Investor Relations, and Procurement and Third-Party Management as functions that should be particularly alert.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'What warning signs does the course cover?', 'akaza-adventure' ),
		'answer'   => __( 'Examples include incomplete or inconsistent information, reliance on one source, resistance to questions, suspicious behaviour, missing documentation, weak audit trails and uncertainty about whether an action is appropriate.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'What should an employee do if something feels unclear?', 'akaza-adventure' ),
		'answer'   => __( 'The course reinforces early escalation. Employees should not wait until fraud has been conclusively proven before raising an appropriate concern.', 'akaza-adventure' ),
	),
);

$faq_schema = array(
	'@context'   => 'https://schema.org',
	'@type'      => 'FAQPage',
	'mainEntity' => array_map(
		static function ( $item ) {
			return array(
				'@type'          => 'Question',
				'name'           => $item['question'],
				'acceptedAnswer' => array(
					'@type' => 'Answer',
					'text'  => $item['answer'],
				),
			);
		},
		$faqs
	),
);
?>

<section id="faqs" class="ftpf-section ftpf-section--grey ftpf-faq" aria-labelledby="ftpf-faq-title">
	<div class="ftpf-container ftpf-faq__grid">

		<div class="ftpf-faq__intro">
			<span class="sl-home-sub-heading"><?php esc_html_e( 'Frequently Asked Questions', 'akaza-adventure' ); ?></span>
			<h2 id="ftpf-faq-title">
				<?php esc_html_e( 'Failure to Prevent Fraud', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'training FAQs', 'akaza-adventure' ); ?></span>
			</h2>
			<p><?php esc_html_e( 'Key questions for Compliance, Risk, Legal and Learning & Development teams.', 'akaza-adventure' ); ?></p>
		</div>

		<div class="ftpf-faq__list">
			<?php foreach ( $faqs as $faq ) : ?>
				<details class="ftpf-faq__item">
					<summary><?php echo esc_html( $faq['question'] ); ?></summary>
					<div class="ftpf-faq__answer">
						<p><?php echo esc_html( $faq['answer'] ); ?></p>
					</div>
				</details>
			<?php endforeach; ?>
		</div>

	</div>
	<script type="application/ld+json"><?php echo wp_json_encode( $faq_schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ); ?></script>
</section>
