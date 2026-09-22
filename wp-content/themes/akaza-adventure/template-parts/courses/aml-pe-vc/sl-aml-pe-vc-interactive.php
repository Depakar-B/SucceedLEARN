<?php
/**
 * SucceedLEARN
 * AML Training for PE/VC — Interactive Learning
 *
 * @package Akaza_Adventure
 */

defined( 'ABSPATH' ) || exit;

$cards = array(
	array(
		'title' => __( 'Recognise warning signs', 'akaza-adventure' ),
		'text'  => __( 'Identify suspicious ownership, funds and investment activity.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Assess investor profiles', 'akaza-adventure' ),
		'text'  => __( 'Consider when standard CDD or deeper EDD may be appropriate.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Practise escalation', 'akaza-adventure' ),
		'text'  => __( 'Understand when concerns should be raised through the MLRO process.', 'akaza-adventure' ),
	),
);
?>

<section
	class="sl-aml-pe-vc-interactive"
	aria-labelledby="sl-aml-pe-vc-interactive-title"
>
	<div class="container">

		<span class="sl-home-sub-heading">
			<?php esc_html_e( 'Learning Experience', 'akaza-adventure' ); ?>
		</span>

		<h2 id="sl-aml-pe-vc-interactive-title">
			<?php
			echo wp_kses_post(
				__(
					'Scenario-Based AML Training <span>That Builds Practical Judgement</span>',
					'akaza-adventure'
				)
			);
			?>
		</h2>

		<p class="sl-aml-pe-vc-interactive__intro">
			<?php
			esc_html_e(
				'Interactive activities help learners move from understanding AML concepts to recognising risk and making practical decisions.',
				'akaza-adventure'
			);
			?>
		</p>

		<div class="sl-aml-pe-vc-interactive__grid">
			<?php foreach ( $cards as $card ) : ?>
				<article class="sl-aml-pe-vc-interactive__card">
					<h3><?php echo esc_html( $card['title'] ); ?></h3>
					<p><?php echo esc_html( $card['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>

		<div class="sl-aml-pe-vc-interactive__media">
			<div
				class="sl-aml-pe-vc-interactive__image-placeholder"
				role="img"
				aria-label="<?php esc_attr_e( 'Interactive AML Knowledge Check placeholder', 'akaza-adventure' ); ?>"
			>
				<span><?php esc_html_e( 'Interactive AML Knowledge Check', 'akaza-adventure' ); ?></span>
				<small>
					<?php
					esc_html_e(
						'Replace with an approved CDD, EDD or AML red-flag activity screenshot.',
						'akaza-adventure'
					);
					?>
				</small>
			</div>
		</div>

	</div>
</section>
