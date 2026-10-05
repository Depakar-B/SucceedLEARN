<?php
/**
 * Modern Slavery Awareness — FAQs (accordion + FAQPage schema).
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$faq_items = array(
	array(
		'question' => __( 'What is Modern Slavery Awareness Training?', 'akaza-adventure' ),
		'answer'   => __( 'Modern Slavery Awareness Training helps employees understand modern slavery, recognise possible warning signs and know how to report concerns appropriately.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'How long does the Modern Slavery Awareness course take?', 'akaza-adventure' ),
		'answer'   => __( 'The SucceedLEARN course has an approximate duration of 15 minutes.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Which forms of modern slavery are covered?', 'akaza-adventure' ),
		'answer'   => __( 'The course covers slavery and servitude, forced labour, human trafficking, debt bondage and domestic servitude.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Does the course include practical scenarios?', 'akaza-adventure' ),
		'answer'   => __( 'Yes. The course includes practical workplace scenarios designed to reinforce recognition and appropriate response.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Does the course include procurement and vendor-selection content?', 'akaza-adventure' ),
		'answer'   => __( 'Yes. Learners involved in procurement or vendor selection receive additional content on supplier due diligence and supply-chain risk.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Should employees investigate suspected modern slavery themselves?', 'akaza-adventure' ),
		'answer'   => __( 'No. Employees should report concerns through the appropriate internal channel rather than investigate or confront people themselves.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Does one warning sign prove modern slavery?', 'akaza-adventure' ),
		'answer'   => __( 'No. One warning sign does not necessarily confirm exploitation, but a genuine concern should still be taken seriously and reported appropriately.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Does the course cover the Modern Slavery Act 2015?', 'akaza-adventure' ),
		'answer'   => __( 'Yes. The course introduces the UK Modern Slavery Act 2015 and Section 54 transparency in supply chains within the procurement pathway.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Is this Modern Slavery Awareness course UK-focused?', 'akaza-adventure' ),
		'answer'   => __( 'Yes. The course is UK-focused and includes UK-specific legal and supply-chain transparency content.', 'akaza-adventure' ),
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
		$faq_items
	),
);
?>

<section id="faq" class="msa-section msa-section--grey" aria-labelledby="msa-faq-title">
	<div class="msa-container">

		<div class="msa-section-intro">
			<span class="sl-home-sub-heading"><?php esc_html_e( 'Frequently Asked Questions', 'akaza-adventure' ); ?></span>
			<h2 id="msa-faq-title">
				<?php esc_html_e( 'Modern Slavery Awareness Training', 'akaza-adventure' ); ?>
				<span class="msa-highlight"><?php esc_html_e( 'FAQs', 'akaza-adventure' ); ?></span>
			</h2>
			<p><?php esc_html_e( "Concise answers to common questions about SucceedLEARN's UK Modern Slavery Awareness course.", 'akaza-adventure' ); ?></p>
		</div>

		<div class="msa-faq">
			<?php foreach ( $faq_items as $index => $item ) : ?>
				<?php
				$answer_id = 'msa-faq-' . ( $index + 1 );
				$is_open   = 0 === $index;
				?>
				<div class="msa-faq__item">
					<button
						class="msa-faq__question"
						type="button"
						aria-expanded="<?php echo $is_open ? 'true' : 'false'; ?>"
						aria-controls="<?php echo esc_attr( $answer_id ); ?>"
					>
						<span><?php echo esc_html( $item['question'] ); ?></span>
						<span class="msa-faq__icon" aria-hidden="true">+</span>
					</button>
					<div id="<?php echo esc_attr( $answer_id ); ?>" class="msa-faq__answer"<?php echo $is_open ? '' : ' hidden'; ?>>
						<p><?php echo esc_html( $item['answer'] ); ?></p>
					</div>
				</div>
			<?php endforeach; ?>
		</div>

	</div>
	<script type="application/ld+json"><?php echo wp_json_encode( $faq_schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ); ?></script>
</section>
