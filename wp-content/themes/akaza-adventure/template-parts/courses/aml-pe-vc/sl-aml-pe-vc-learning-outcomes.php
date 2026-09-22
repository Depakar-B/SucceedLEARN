<?php
/**
 * SucceedLEARN
 * AML Training for PE/VC — Learning Outcomes
 *
 * @package Akaza_Adventure
 */

defined( 'ABSPATH' ) || exit;

$outcomes = array(
	array(
		'title' => __( 'Understand money laundering', 'akaza-adventure' ),
		'text'  => __( 'Recognise placement, layering and integration.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Recognise suspicious activity', 'akaza-adventure' ),
		'text'  => __( 'Identify unusual ownership, funds, jurisdictions and transactions.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Understand KYC and due diligence', 'akaza-adventure' ),
		'text'  => __( 'Learn how identification, CDD and EDD support AML controls.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Understand CFT and CPF', 'akaza-adventure' ),
		'text'  => __( 'Recognise terrorist financing and proliferation financing risks.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Understand AML legislation', 'akaza-adventure' ),
		'text'  => __( 'Build awareness of key UK and US AML frameworks.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Know when to escalate', 'akaza-adventure' ),
		'text'  => __( 'Understand MLRO reporting and appropriate escalation.', 'akaza-adventure' ),
	),
);
?>

<section
	class="sl-aml-pe-vc-learning-outcomes"
	aria-labelledby="sl-aml-pe-vc-learning-outcomes-title"
>
	<div class="container">

		<span class="sl-home-sub-heading">
			<?php esc_html_e( 'Learning Outcomes', 'akaza-adventure' ); ?>
		</span>

		<h2 id="sl-aml-pe-vc-learning-outcomes-title">
			<?php
			echo wp_kses_post(
				__(
					'What Will Learners Gain From <span>AML Awareness Training?</span>',
					'akaza-adventure'
				)
			);
			?>
		</h2>

		<p class="sl-aml-pe-vc-learning-outcomes__intro">
			<?php
			esc_html_e(
				'The course builds practical financial crime awareness that learners can apply during onboarding, due diligence and investment-related activity.',
				'akaza-adventure'
			);
			?>
		</p>

		<ul class="sl-aml-pe-vc-learning-outcomes__list">
			<?php foreach ( $outcomes as $outcome ) : ?>
				<li class="sl-aml-pe-vc-learning-outcomes__item">
					<span class="sl-aml-pe-vc-learning-outcomes__check" aria-hidden="true">✓</span>
					<div>
						<h3><?php echo esc_html( $outcome['title'] ); ?></h3>
						<p><?php echo esc_html( $outcome['text'] ); ?></p>
					</div>
				</li>
			<?php endforeach; ?>
		</ul>

	</div>
</section>
