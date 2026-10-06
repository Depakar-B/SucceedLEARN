<?php
/**
 * SMCR PE/VC AMP: Senior Managers Learning Path.
 *
 * Expected vars: $images, $senior_managers_learning
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="senior-managers-learning" class="sl-section sl-section--alt sl-smcr-pe-vc-senior-managers" aria-labelledby="sl-smcr-pe-vc-senior-managers-title">
	<div class="sl-wrap">
		<div class="sl-aml-intro">
			<span class="sl-eyebrow sl-home-sub-heading">
				<?php esc_html_e( 'Senior Managers Learning Path', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-smcr-pe-vc-senior-managers-title" class="sl-h2">
				<?php
				echo wp_kses(
					__( 'SMCR Senior Managers Training for Reasonable Steps, Oversight and <span>Accountability</span>', 'succeedlearn-amp' ),
					array( 'span' => array() )
				);
				?>
			</h2>
		</div>

		<div class="sl-aml-media">
			<div class="sl-aml-image">
				<amp-img
					src="<?php echo esc_url( $images['senior_managers'] ); ?>"
					width="1200"
					height="900"
					layout="responsive"
					alt="<?php esc_attr_e( 'SMCR senior managers training', 'succeedlearn-amp' ); ?>"
				></amp-img>
			</div>
		</div>

		<div class="sl-aml-copy">
			<p>
				<?php esc_html_e( 'Senior Managers have additional responsibilities beyond the employee-level Conduct Rules. This course focuses on how those responsibilities translate into leadership and oversight.', 'succeedlearn-amp' ); ?>
			</p>
			<p>
				<?php esc_html_e( 'Learners work through practical PE/VC situations involving controls, delegation, reporting, documentation and regulatory interaction.', 'succeedlearn-amp' ); ?>
			</p>
		</div>

		<h3 class="sl-panel-title"><?php esc_html_e( 'Key Learning Areas', 'succeedlearn-amp' ); ?></h3>

		<ul class="sl-list" role="list">
			<?php foreach ( $senior_managers_learning as $index => $learning_area ) : ?>
				<li class="sl-list-item">
					<span class="sl-list-item__label" aria-hidden="true">
						<?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?>
					</span>
					<span class="sl-list-item__text"><?php echo esc_html( $learning_area ); ?></span>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
