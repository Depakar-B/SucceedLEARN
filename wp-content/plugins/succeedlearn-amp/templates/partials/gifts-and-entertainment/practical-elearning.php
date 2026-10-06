<?php
/**
 * Gifts and Entertainment AMP: Scenario-Based eLearning.
 *
 * Expected vars: $images
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="practical-elearning" class="sl-section sl-aml-pe-vc-practical-elearning" aria-labelledby="sl-gifts-practical-elearning-title">
	<div class="sl-wrap">
		<div class="sl-aml-intro">
			<span class="sl-eyebrow sl-home-sub-heading">
				<?php esc_html_e( 'Practical eLearning', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-gifts-practical-elearning-title" class="sl-h2">
				<?php
				echo wp_kses(
					__( 'Scenario-Based Gifts and Entertainment <span>eLearning for PE/VC</span>', 'succeedlearn-amp' ),
					array( 'span' => array() )
				);
				?>
			</h2>
		</div>

		<div class="sl-aml-copy">
			<p>
				<?php esc_html_e( 'Learners apply the principles to realistic situations rather than simply reading policy wording.', 'succeedlearn-amp' ); ?>
			</p>
			<p>
				<?php esc_html_e( 'Course examples include an expensive watch offered during contract negotiations, hospitality involving a government official, event tickets for an investor, a cash voucher and modest refreshments provided during training.', 'succeedlearn-amp' ); ?>
			</p>
			<p>
				<?php esc_html_e( 'The assessment also uses PE/VC situations involving an investment banker, a former portfolio company CEO, a prospective vendor and a Limited Partner.', 'succeedlearn-amp' ); ?>
			</p>
		</div>

		<div class="sl-aml-media sl-aml-after">
			<div class="sl-aml-image">
				<amp-img
					src="<?php echo esc_url( $images['practical_elearning'] ); ?>"
					width="1200"
					height="800"
					layout="responsive"
					alt="<?php esc_attr_e( 'Gifts and Entertainment course assessment screenshot', 'succeedlearn-amp' ); ?>"
				></amp-img>
			</div>
		</div>
	</div>
</section>
