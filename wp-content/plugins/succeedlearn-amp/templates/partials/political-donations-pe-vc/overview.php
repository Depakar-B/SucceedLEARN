<?php
/**
 * Political Donations PE/VC AMP: Course Overview.
 *
 * Expected vars: $images
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="overview" class="sl-section sl-section--alt sl-aml-pe-vc-overview" aria-labelledby="sl-political-donations-pe-vc-overview-title">
	<div class="sl-wrap">
		<div class="sl-aml-intro">
			<span class="sl-eyebrow sl-home-sub-heading">
				<?php esc_html_e( 'Course overview', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-political-donations-pe-vc-overview-title" class="sl-h2">
				<?php
				echo wp_kses(
					__( 'What Is Political Donations and Political Contributions <span>Compliance Training?</span>', 'succeedlearn-amp' ),
					array( 'span' => array() )
				);
				?>
			</h2>
		</div>

		<div class="sl-aml-media">
			<div class="sl-aml-image">
				<amp-img
					src="<?php echo esc_url( $images['overview'] ); ?>"
					width="1200"
					height="900"
					layout="responsive"
					alt="<?php esc_attr_e( 'What is political donations and political contributions compliance training', 'succeedlearn-amp' ); ?>"
				></amp-img>
			</div>
		</div>

		<div class="sl-aml-copy">
			<p>
				<?php esc_html_e( 'Political contributions compliance training helps employees recognise activities that may create regulatory, anti-bribery, conflict of interest or reputational risk.', 'succeedlearn-amp' ); ?>
			</p>
			<p>
				<?php esc_html_e( 'The course focuses on situations relevant to investment professionals, including monetary contributions, fundraising, in-kind support, professional titles, political events and organisational endorsement.', 'succeedlearn-amp' ); ?>
			</p>
			<p>
				<?php esc_html_e( 'Learners are encouraged to recognise risk early and understand when firm policy, internal approval or Compliance input may be relevant.', 'succeedlearn-amp' ); ?>
			</p>
		</div>
	</div>
</section>
