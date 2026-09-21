<?php
/**
 * Preventing the Facilitation of Tax Evasion Training — Why SucceedLEARN.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$succeedlearn_benefits = array(
	array(
		'title'       => __( 'Clear Learning', 'akaza-adventure' ),
		'description' => __( 'Complex compliance concepts presented in an accessible way.', 'akaza-adventure' ),
	),
	array(
		'title'       => __( 'Relevant Content', 'akaza-adventure' ),
		'description' => __( 'Learning linked to workplace responsibilities and decisions.', 'akaza-adventure' ),
	),
	array(
		'title'       => __( 'Interactive Experience', 'akaza-adventure' ),
		'description' => __( 'Knowledge checks and assessment activities encourage active participation.', 'akaza-adventure' ),
	),
	array(
		'title'       => __( 'Practical Awareness', 'akaza-adventure' ),
		'description' => __( 'The course connects legislation with risk, policy, reporting and monitoring.', 'akaza-adventure' ),
	),
);
?>

<section
	id="why-succeedlearn"
	class="sl-tax-evasion-why-succeedlearn"
	aria-labelledby="sl-tax-evasion-why-succeedlearn-title"
>
	<div class="container">

		<div class="sl-tax-evasion-why-succeedlearn__grid">

			<!-- Left: Content -->
			<div class="sl-tax-evasion-why-succeedlearn__content">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'SucceedLEARN Compliance Training', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-tax-evasion-why-succeedlearn-title">
					<?php esc_html_e( 'Why Choose SucceedLEARN for Preventing Facilitation of Tax Evasion', 'akaza-adventure' ); ?>
					<span><?php esc_html_e( 'Training?', 'akaza-adventure' ); ?></span>
				</h2>

				<p>
					<?php esc_html_e( 'Compliance learning should make complex topics easier to understand while helping learners connect requirements with their workplace responsibilities.', 'akaza-adventure' ); ?>
				</p>

				<div class="sl-tax-evasion-why-succeedlearn__benefits">

					<?php foreach ( $succeedlearn_benefits as $benefit ) : ?>

						<article class="sl-tax-evasion-why-succeedlearn__benefit">

							<h3 class="sl-panel-title">
								<?php echo esc_html( $benefit['title'] ); ?>
							</h3>

							<p>
								<?php echo esc_html( $benefit['description'] ); ?>
							</p>

						</article>

					<?php endforeach; ?>

				</div>

			</div>

			<!-- Right: Image -->
			<div class="sl-tax-evasion-why-succeedlearn__media">

				<div class="sl-tax-evasion-why-succeedlearn__image">
					<div class="sl-tax-evasion-why-succeedlearn__image-placeholder">
						<?php esc_html_e( 'Image Placeholder', 'akaza-adventure' ); ?>
					</div>
				</div>

			</div>

		</div>

	</div>
</section>