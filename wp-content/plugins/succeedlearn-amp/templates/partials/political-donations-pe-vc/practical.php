<?php
/**
 * Political Donations PE/VC AMP: Practical Learning.
 *
 * Expected vars: $images
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="practical-learning" class="sl-section sl-section--alt sl-aml-pe-vc-practical" aria-labelledby="sl-political-donations-pe-vc-practical-title">
	<div class="sl-wrap">
		<div class="sl-aml-intro">
			<span class="sl-eyebrow sl-home-sub-heading">
				<?php esc_html_e( 'Practical learning', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-political-donations-pe-vc-practical-title" class="sl-h2">
				<?php
				echo wp_kses(
					__( 'Scenario-Based PE/VC Compliance Training for Real-World <span>Political Activity</span>', 'succeedlearn-amp' ),
					array( 'span' => array() )
				);
				?>
			</h2>
		</div>

		<div class="sl-aml-media">
			<div class="sl-aml-image">
				<amp-img
					src="<?php echo esc_url( $images['practical'] ); ?>"
					width="1200"
					height="900"
					layout="responsive"
					alt="<?php esc_attr_e( 'Scenario assessment: whether hosting a political discussion constitutes a political donation', 'succeedlearn-amp' ); ?>"
				></amp-img>
			</div>
		</div>

		<p>
			<?php esc_html_e( 'The course uses situations relevant to investment professionals so learners can apply compliance principles rather than simply memorise policy.', 'succeedlearn-amp' ); ?>
		</p>
	</div>
</section>
