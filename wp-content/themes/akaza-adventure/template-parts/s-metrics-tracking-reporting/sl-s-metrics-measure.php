<?php
/**
 * S-Metrics — Reporting for Audit & Compliance Readiness.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$audit_items = array(
	__( 'Training assignments', 'akaza-adventure' ),
	__( 'Completion records', 'akaza-adventure' ),
	__( 'Assessment outcomes', 'akaza-adventure' ),
	__( 'Certificates', 'akaza-adventure' ),
	__( 'Campaign history', 'akaza-adventure' ),
	__( 'Awareness participation', 'akaza-adventure' ),
	__( 'Relevant reporting activity', 'akaza-adventure' ),
);
?>

<section
	class="sl-s-metrics-measure"
	aria-labelledby="sl-s-metrics-measure-title"
>
	<div class="container">

		<div class="sl-s-metrics-measure__grid">

			<div class="sl-s-metrics-measure__content">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Audit & Compliance', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-s-metrics-measure-title">
					<?php esc_html_e( 'Reporting for Audit', 'akaza-adventure' ); ?>
					<span><?php esc_html_e( '& Compliance Readiness', 'akaza-adventure' ); ?></span>
				</h2>

				<div class="sl-s-metrics-measure__copy">
					<p>
						<?php
						esc_html_e(
							'Security awareness programmes often need to demonstrate that learning and awareness activities have taken place.',
							'akaza-adventure'
						);
						?>
					</p>

					<p>
						<?php
						esc_html_e(
							'S-Metrics can help organisations maintain visibility into information such as:',
							'akaza-adventure'
						);
						?>
					</p>

					<ul class="sl-s-metrics-measure__list">
						<?php foreach ( $audit_items as $item ) : ?>
							<li><?php echo esc_html( $item ); ?></li>
						<?php endforeach; ?>
					</ul>

					<p>
						<?php
						esc_html_e(
							'Exportable reports can support internal governance, audit preparation and compliance reviews.',
							'akaza-adventure'
						);
						?>
					</p>
				</div>

			</div>

			<div class="sl-s-metrics-measure__media">
				<div class="sl-s-metrics-measure__image-placeholder">
					<span><?php esc_html_e( 'Image Placeholder', 'akaza-adventure' ); ?></span>
				</div>
			</div>

		</div>

	</div>
</section>
