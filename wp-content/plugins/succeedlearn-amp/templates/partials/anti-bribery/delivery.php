<?php
/**
 * Anti-Bribery AMP: Delivery options.
 *
 * Expected vars: $delivery
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="abac-delivery-options" class="sl-section sl-aml-pe-vc-delivery" aria-labelledby="sl-anti-bribery-delivery-title">
	<div class="sl-wrap">
		<div class="sl-aml-intro">
			<span class="sl-eyebrow sl-home-sub-heading">
				<?php esc_html_e( 'Delivery Options', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-anti-bribery-delivery-title" class="sl-h2">
				<?php
				echo wp_kses(
					__( 'How can organisations deliver <span>ABAC eLearning?</span>', 'succeedlearn-amp' ),
					array( 'span' => array() )
				);
				?>
			</h2>

			<p>
				<?php esc_html_e( 'Use the SucceedLEARN platform or add the course to your existing compatible learning environment. Both routes support structured completion and reporting.', 'succeedlearn-amp' ); ?>
			</p>
		</div>

		<ul class="sl-aml-outcome-list" role="list">
			<?php foreach ( $delivery as $option ) : ?>
				<li class="sl-aml-outcome-list__item">
					<span class="sl-aml-number" aria-hidden="true"><?php echo esc_html( $option['num'] ); ?></span>
					<div>
						<h3 class="sl-panel-title"><?php echo esc_html( $option['title'] ); ?></h3>
						<p><?php echo esc_html( $option['text'] ); ?></p>
					</div>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
