<?php
/**
 * Preventing the Facilitation of Tax Evasion Training — Prevention Cycle.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$prevention_cycle = array(
	array(
		'class' => 'sl-tax-evasion-cycle__step--top',
		'title' => __( 'Assess Risk', 'akaza-adventure' ),
	),
	array(
		'class' => 'sl-tax-evasion-cycle__step--top-right',
		'title' => __( 'Apply Due Diligence', 'akaza-adventure' ),
	),
	array(
		'class' => 'sl-tax-evasion-cycle__step--bottom-right',
		'title' => __( 'Design Policy', 'akaza-adventure' ),
	),
	array(
		'class' => 'sl-tax-evasion-cycle__step--bottom',
		'title' => __( 'Communicate & Train', 'akaza-adventure' ),
	),
	array(
		'class' => 'sl-tax-evasion-cycle__step--bottom-left',
		'title' => __( 'Report Concerns', 'akaza-adventure' ),
	),
	array(
		'class' => 'sl-tax-evasion-cycle__step--top-left',
		'title' => __( 'Monitor & Improve', 'akaza-adventure' ),
	),
);
?>

<section
	id="prevention-cycle"
	class="sl-tax-evasion-cycle"
	aria-labelledby="sl-tax-evasion-cycle-title"
>
	<div class="container">

		<div class="sl-tax-evasion-cycle__grid">

			<!-- Content -->
			<div class="sl-tax-evasion-cycle__content">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Senior Management Tax Evasion Training', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-tax-evasion-cycle-title">
					<?php esc_html_e( 'Preventing Facilitation of Tax Evasion Is a Cycle', 'akaza-adventure' ); ?>
					<span><?php esc_html_e( 'Not a One-Off Exercise', 'akaza-adventure' ); ?></span>
				</h2>

				<p>
					<?php esc_html_e( 'Senior management plays an important role in setting expectations, supporting suitable controls and helping ensure prevention measures are understood and integrated into day-to-day operations.', 'akaza-adventure' ); ?>
				</p>

				<p>
					<?php esc_html_e( 'Monitoring and review then feed back into the prevention process. Where weaknesses are identified, organisations can revisit processes, policies and communication.', 'akaza-adventure' ); ?>
				</p>

			</div>

			<!-- Prevention Cycle -->
			<div class="sl-tax-evasion-cycle__visual">

				<div class="sl-tax-evasion-cycle__ring" aria-hidden="true"></div>

				<div class="sl-tax-evasion-cycle__centre">
					<span>
						<?php esc_html_e( 'Preventing', 'akaza-adventure' ); ?>
					</span>
					<span>
						<?php esc_html_e( 'Tax Evasion', 'akaza-adventure' ); ?>
					</span>
					<span>
						<?php esc_html_e( 'Facilitation', 'akaza-adventure' ); ?>
					</span>
				</div>

				<?php foreach ( $prevention_cycle as $step ) : ?>

					<div class="sl-tax-evasion-cycle__step <?php echo esc_attr( $step['class'] ); ?>">
						<span>
							<?php echo esc_html( $step['title'] ); ?>
						</span>
					</div>

				<?php endforeach; ?>

			</div>

		</div>

	</div>
</section>