<?php
/**
 * Political Donations Training — Why SucceedLEARN.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$why_items = array(
	array(
		'title'       => __( 'Investment-sector relevance', 'akaza-adventure' ),
		'description' => __( 'PE/VC situations are used instead of generic corporate examples.', 'akaza-adventure' ),
	),
	array(
		'title'       => __( 'UK and US awareness', 'akaza-adventure' ),
		'description' => __( 'Learners see both domestic and cross-border compliance considerations.', 'akaza-adventure' ),
	),
	array(
		'title'       => __( 'Scenario-led learning', 'akaza-adventure' ),
		'description' => __( 'Employees apply principles to practical decisions.', 'akaza-adventure' ),
	),
	array(
		'title'       => __( 'Clear compliance messaging', 'akaza-adventure' ),
		'description' => __( 'Complex political contribution risks are explained concisely.', 'akaza-adventure' ),
	),
);
?>

<section
	id="why-succeedlearn"
	class="sl-political-donations-why"
	aria-labelledby="sl-political-donations-why-title"
>
	<div class="container">

		<div class="sl-political-donations-why__intro">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Why SucceedLEARN', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-political-donations-why-title">
				<?php esc_html_e( 'Why Choose Investment Compliance E-Learning for', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Political Activity Risk?', 'akaza-adventure' ); ?></span>
			</h2>

			<p>
				<?php esc_html_e( 'Specialist compliance training works best when learners can see how the topic applies to their actual working environment.', 'akaza-adventure' ); ?>
			</p>

		</div>

		<div class="sl-political-donations-why__grid">

			<?php foreach ( $why_items as $item ) : ?>

				<article class="sl-political-donations-why__item">

					<h3 class="sl-panel-title">
						<?php echo esc_html( $item['title'] ); ?>
					</h3>

					<p>
						<?php echo esc_html( $item['description'] ); ?>
					</p>

				</article>

			<?php endforeach; ?>

		</div>

	</div>
</section>