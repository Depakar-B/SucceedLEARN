<?php
/**
 * Anti-Bribery and Anti-Corruption — Topics Covered section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$topics = array(
	array(
		'title' => __( 'Gifts & hospitality', 'akaza-adventure' ),
		'text'  => __( 'Value, timing, frequency, purpose, approvals and accurate records.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Third parties & agents', 'akaza-adventure' ),
		'text'  => __( 'Indirect payments, unusual commissions and associated-person exposure.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Travel & entertainment', 'akaza-adventure' ),
		'text'  => __( 'Reasonable business purpose, pre-approval, receipts and transparency.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Facilitation payments', 'akaza-adventure' ),
		'text'  => __( 'Requests to speed up routine action and the correct response under policy and law.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Donations & sponsorships', 'akaza-adventure' ),
		'text'  => __( 'Links to decision-makers, destination of funds and hidden commercial motives.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Nepotism & cronyism', 'akaza-adventure' ),
		'text'  => __( 'Employment or favours offered to influence or reward a business decision.', 'akaza-adventure' ),
	),
);
?>

<section
	id="topics"
	class="sl-course-topics sl-anti-bribery-topics"
	aria-labelledby="sl-anti-bribery-topics-title"
>
	<div class="container sl-anti-bribery-topics__layout">

		<div class="sl-anti-bribery-topics__intro">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Topics Covered', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-anti-bribery-topics-title">
				<?php esc_html_e( 'What bribery and corruption risks does ABAC', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'training cover?', 'akaza-adventure' ); ?></span>
			</h2>

			<p>
				<?php
				esc_html_e(
					'The course connects abstract rules to six familiar areas of work, helping employees identify warning signs before a decision becomes a breach.',
					'akaza-adventure'
				);
				?>
			</p>

		</div>

		<div class="sl-anti-bribery-topics__list">
			<?php foreach ( $topics as $topic ) : ?>
				<article class="sl-anti-bribery-topics__item">
					<h3><?php echo esc_html( $topic['title'] ); ?></h3>
					<p><?php echo esc_html( $topic['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>

	</div>
</section>
