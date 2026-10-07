<?php
/**
 * Preventing the Facilitation of Tax Evasion Training — Interactive Learning.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$course_images = array(
	array(
		'src' => 'https://succeedlearn.com/wp-content/uploads/2026/10/image.webp',
		'alt' => __( 'Tax evasion risk shown across the floors of an organisation', 'akaza-adventure' ),
	),
	array(
		'src' => 'https://succeedlearn.com/wp-content/uploads/2026/10/Image-4_Tax-Evasion.webp',
		'alt' => __( 'A hand pointing at unreported figures beside income and expenses', 'akaza-adventure' ),
	),
	array(
		'src' => 'https://succeedlearn.com/wp-content/uploads/2026/10/Image-3_Tax-Evasion.webp',
		'alt' => __( 'A facilitator inflating a sale while serving a tax evader', 'akaza-adventure' ),
	),
	array(
		'src' => 'https://succeedlearn.com/wp-content/uploads/2026/10/Image-2_Tax-Evasion.webp',
		'alt' => __( 'A learner sorting a statement into evasion or not evasion', 'akaza-adventure' ),
	),
);
?>

<section
	id="interactive-learning"
	class="sl-tax-evasion-interactive"
	aria-labelledby="sl-tax-evasion-interactive-title"
>
	<div class="container">

		<div class="sl-tax-evasion-interactive__intro">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Interactive Tax Evasion eLearning', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-tax-evasion-interactive-title">
				<?php esc_html_e( 'How does SucceedLEARN support Anti-Tax Evasion', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Training?', 'akaza-adventure' ); ?></span>
			</h2>

			<p>
				<?php esc_html_e( 'Learners interact with questions, scenarios and assessment activities designed to reinforce understanding as they progress through the course.', 'akaza-adventure' ); ?>
			</p>

			<p>
				<?php esc_html_e( 'The supplied course content includes scenario-based learning around risk assessment and due diligence, helping learners consider how they would respond in different circumstances.', 'akaza-adventure' ); ?>
			</p>

		</div>

		<div class="sl-tax-evasion-interactive__carousel" data-tax-evasion-carousel>

			<button
				type="button"
				class="sl-tax-evasion-interactive__arrow"
				data-tax-evasion-prev
				aria-label="<?php esc_attr_e( 'Previous image', 'akaza-adventure' ); ?>"
			>
				<span aria-hidden="true">←</span>
			</button>

			<div class="sl-tax-evasion-interactive__viewport">
				<div class="sl-tax-evasion-interactive__track" data-tax-evasion-track>
					<?php foreach ( $course_images as $image ) : ?>
						<?php $is_compact = false !== strpos( $image['src'], 'Image-4_Tax-Evasion.webp' ); ?>
						<div class="sl-tax-evasion-interactive__image<?php echo $is_compact ? ' sl-tax-evasion-interactive__image--compact' : ''; ?>">
							<img
								src="<?php echo esc_url( $image['src'] ); ?>"
								alt="<?php echo esc_attr( $image['alt'] ); ?>"
								loading="eager"
								decoding="async"
							>
						</div>
					<?php endforeach; ?>
				</div>
			</div>

			<button
				type="button"
				class="sl-tax-evasion-interactive__arrow"
				data-tax-evasion-next
				aria-label="<?php esc_attr_e( 'Next image', 'akaza-adventure' ); ?>"
			>
				<span aria-hidden="true">→</span>
			</button>

		</div>

	</div>
</section>