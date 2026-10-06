<?php
/**
 * Whistleblowing PE/VC AMP: Designed for Investment Firms.
 *
 * Expected vars: $designed_features
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="why-whistleblowing-training" class="sl-section sl-section--alt sl-aml-pe-vc-designed" aria-labelledby="sl-whistleblowing-pe-vc-designed-title">
	<div class="sl-wrap">
		<div class="sl-aml-intro">
			<span class="sl-eyebrow sl-home-sub-heading">
				<?php esc_html_e( 'Designed for Investment Firms', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-whistleblowing-pe-vc-designed-title" class="sl-h2">
				<?php
				echo wp_kses(
					__( 'Why Choose Whistleblowing Training Designed for PE and VC <span>Firms?</span>', 'succeedlearn-amp' ),
					array( 'span' => array() )
				);
				?>
			</h2>

			<p>
				<?php esc_html_e( 'Generic training can feel disconnected from the decisions and risks professionals encounter in investment firms. This course places whistleblowing in situations learners can recognise.', 'succeedlearn-amp' ); ?>
			</p>
		</div>

		<ul class="sl-aml-feature-list" role="list">
			<?php foreach ( $designed_features as $feature ) : ?>
				<li class="sl-aml-feature-list__item">
					<span class="sl-aml-number" aria-hidden="true"><?php echo esc_html( $feature['num'] ); ?></span>
					<div>
						<strong><?php echo esc_html( $feature['title'] ); ?></strong>
						<span><?php echo esc_html( $feature['text'] ); ?></span>
					</div>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
