<?php
/**
 * Whistleblowing PE/VC AMP: CPD Certification.
 *
 * Expected vars: $images
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$cpd_highlights = array(
	__( 'Structured Professional Learning', 'succeedlearn-amp' ),
	__( 'Practical Compliance Awareness', 'succeedlearn-amp' ),
	__( 'Supports Continuing Development', 'succeedlearn-amp' ),
);
?>
<section id="cpd-certification" class="sl-section sl-aml-pe-vc-cpd" aria-labelledby="sl-whistleblowing-pe-vc-cpd-title">
	<div class="sl-wrap">
		<div class="sl-aml-intro">
			<span class="sl-eyebrow sl-home-sub-heading">
				<?php esc_html_e( 'Certification', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-whistleblowing-pe-vc-cpd-title" class="sl-h2">
				<?php
				echo wp_kses(
					__( 'CPD <span>Certification</span>', 'succeedlearn-amp' ),
					array( 'span' => array() )
				);
				?>
			</h2>
		</div>

		<div class="sl-aml-media">
			<div class="sl-aml-image sl-aml-image--cpd">
				<amp-img
					src="<?php echo esc_url( $images['cpd'] ); ?>"
					width="170"
					height="170"
					layout="responsive"
					alt="<?php esc_attr_e( 'The CPD Certification Service', 'succeedlearn-amp' ); ?>"
				></amp-img>
			</div>
		</div>

		<p>
			<?php esc_html_e( 'Selected SucceedLEARN courses are CPD certified, helping learners build practical compliance knowledge while supporting continuing professional development.', 'succeedlearn-amp' ); ?>
		</p>

		<ul class="sl-list sl-aml-list" role="list">
			<?php foreach ( $cpd_highlights as $item ) : ?>
				<li class="sl-list-item">
					<span class="sl-aml-check" aria-hidden="true">✓</span>
					<span class="sl-list-item__text"><?php echo esc_html( $item ); ?></span>
				</li>
			<?php endforeach; ?>
		</ul>

		<p class="sl-aml-disclaimer">
			<?php esc_html_e( '*CPD certification applies to selected courses only.', 'succeedlearn-amp' ); ?>
		</p>
	</div>
</section>
