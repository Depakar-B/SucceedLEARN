<?php
/**
 * Preventing the Facilitation of Tax Evasion Training — Interactive Learning.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$learning_features = array(
	__( 'Knowledge Checks', 'akaza-adventure' ),
	__( 'Scenario-Based Learning', 'akaza-adventure' ),
	__( 'Assessment', 'akaza-adventure' ),
	__( 'CPD-Certified', 'akaza-adventure' ),
);
?>

<section
	id="interactive-learning"
	class="sl-tax-evasion-interactive"
	aria-labelledby="sl-tax-evasion-interactive-title"
>
	<div class="container">

		<div class="sl-tax-evasion-interactive__grid">

			<!-- Left: Course Images -->
			<div class="sl-tax-evasion-interactive__media">

				<div class="sl-tax-evasion-interactive__image">
					<div class="sl-tax-evasion-interactive__image-placeholder">
						<?php esc_html_e( 'Image Placeholder', 'akaza-adventure' ); ?>
					</div>
				</div>

				<div class="sl-tax-evasion-interactive__image">
					<div class="sl-tax-evasion-interactive__image-placeholder">
						<?php esc_html_e( 'Image Placeholder', 'akaza-adventure' ); ?>
					</div>
				</div>

			</div>

			<!-- Right: Content -->
			<div class="sl-tax-evasion-interactive__content">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Interactive Tax Evasion eLearning', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-tax-evasion-interactive-title">
					<?php esc_html_e( 'How Does SucceedLEARN Reinforce Preventing Facilitation of Tax Evasion', 'akaza-adventure' ); ?>
					<span><?php esc_html_e( 'Training?', 'akaza-adventure' ); ?></span>
				</h2>

				<p>
					<?php esc_html_e( 'Learners interact with questions, scenarios and assessment activities designed to reinforce understanding as they progress through the course.', 'akaza-adventure' ); ?>
				</p>

				<p>
					<?php esc_html_e( 'The supplied course content includes scenario-based learning around risk assessment and due diligence, helping learners consider how they would respond in different circumstances.', 'akaza-adventure' ); ?>
				</p>

				<div class="sl-tax-evasion-interactive__features">

					<?php foreach ( $learning_features as $feature ) : ?>

						<div class="sl-tax-evasion-interactive__feature">
							<span class="sl-tax-evasion-interactive__feature-marker" aria-hidden="true"></span>
							<span><?php echo esc_html( $feature ); ?></span>
						</div>

					<?php endforeach; ?>

				</div>

			</div>

		</div>

	</div>
</section>