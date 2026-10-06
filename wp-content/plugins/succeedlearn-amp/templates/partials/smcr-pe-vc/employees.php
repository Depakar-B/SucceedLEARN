<?php
/**
 * SMCR PE/VC AMP: Employees Learning Path.
 *
 * Expected vars: $images, $employees_learning
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="employees-learning" class="sl-section sl-section--alt sl-smcr-pe-vc-employees" aria-labelledby="sl-smcr-pe-vc-employees-title">
	<div class="sl-wrap">
		<div class="sl-aml-intro">
			<span class="sl-eyebrow sl-home-sub-heading">
				<?php esc_html_e( 'Employees Learning Path', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-smcr-pe-vc-employees-title" class="sl-h2">
				<?php
				echo wp_kses(
					__( 'SMCR Training for Employees: FCA Conduct Rules and Workplace <span>Responsibilities</span>', 'succeedlearn-amp' ),
					array( 'span' => array() )
				);
				?>
			</h2>
		</div>

		<div class="sl-aml-media">
			<div class="sl-aml-image">
				<amp-img
					src="<?php echo esc_url( $images['employees'] ); ?>"
					width="1200"
					height="900"
					layout="responsive"
					alt="<?php esc_attr_e( 'SMCR training for UK private equity and venture capital firms', 'succeedlearn-amp' ); ?>"
				></amp-img>
			</div>
		</div>

		<div class="sl-aml-copy">
			<p>
				<?php esc_html_e( 'The Employees course helps learners understand where they sit within the SMCR structure and what the six Individual Conduct Rules mean for day-to-day behaviour.', 'succeedlearn-amp' ); ?>
			</p>
			<p>
				<?php esc_html_e( 'Practical situations help connect the rules with decisions involving investor information, due diligence, operations, valuations, confidential information and regulatory interaction.', 'succeedlearn-amp' ); ?>
			</p>
		</div>

		<h3 class="sl-panel-title"><?php esc_html_e( 'Key Learning Areas', 'succeedlearn-amp' ); ?></h3>

		<ul class="sl-list" role="list">
			<?php foreach ( $employees_learning as $index => $learning_area ) : ?>
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
