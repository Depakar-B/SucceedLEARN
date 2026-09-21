<?php
/**
 * SMCR Training for PE & VC Firms — FCA Conduct Rules.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$conduct_rule_scenarios = array(
	array(
		'title'       => __( 'Investor Reporting', 'akaza-adventure' ),
		'description' => __( 'Recognising and responding appropriately to inaccurate or potentially misleading information.', 'akaza-adventure' ),
	),
	array(
		'title'       => __( 'Due Diligence', 'akaza-adventure' ),
		'description' => __( 'Responding appropriately when important information remains incomplete but commercial pressure is increasing.', 'akaza-adventure' ),
	),
	array(
		'title'       => __( 'Sensitive Information', 'akaza-adventure' ),
		'description' => __( 'Understanding when information requires appropriate clearance before it is shared.', 'akaza-adventure' ),
	),
);
?>

<section
	id="conduct-rules"
	class="sl-smcr-conduct-rules"
	aria-labelledby="sl-smcr-conduct-rules-title"
>
	<div class="container">

		<div class="sl-smcr-conduct-rules__grid">

			<div class="sl-smcr-conduct-rules__media">
				<div class="sl-smcr-conduct-rules__image">
					<div class="sl-smcr-conduct-rules__image-placeholder">
						<?php esc_html_e( 'Image Placeholder', 'akaza-adventure' ); ?>
					</div>
				</div>
			</div>

			<div class="sl-smcr-conduct-rules__content">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'FCA Conduct Rules Training', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-smcr-conduct-rules-title">
					<?php esc_html_e( 'How Do FCA Conduct Rules Apply to PE and VC', 'akaza-adventure' ); ?>
					<span><?php esc_html_e( 'Employees?', 'akaza-adventure' ); ?></span>
				</h2>

				<p class="sl-smcr-conduct-rules__intro">
					<?php esc_html_e(
						'The course places Conduct Rules in situations relevant to private equity and venture capital, helping learners recognise when individual conduct can affect investors, the firm or regulatory interactions.',
						'akaza-adventure'
					); ?>
				</p>

				<div class="sl-smcr-conduct-rules__cards">

					<?php foreach ( $conduct_rule_scenarios as $scenario ) : ?>

						<article class="sl-smcr-conduct-rules__card">

							<h3 class="sl-panel-title">
								<?php echo esc_html( $scenario['title'] ); ?>
							</h3>

							<p>
								<?php echo esc_html( $scenario['description'] ); ?>
							</p>

						</article>

					<?php endforeach; ?>

				</div>

			</div>

		</div>

	</div>
</section>