<?php
/**
 * S-Metrics AMP — From Awareness to Measurable Behaviour Change.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$suite_items = succeedlearn_amp_get_sm_suite_items();
?>
<section
	id="security-behaviour-culture-suite"
	class="sl-sbcs sl-sbcs--bg-soft"
	aria-labelledby="security-behaviour-culture-suite-title"
>
	<div class="sl-wrap">
		<div class="sl-sbcs__intro">
			<span class="sl-home-sub-heading"><?php esc_html_e( 'S-Metrics Measures What the SBCS Ecosystem Delivers', 'succeedlearn-amp' ); ?></span>

			<h2 id="security-behaviour-culture-suite-title" class="sl-h2">
				<?php esc_html_e( 'From Awareness to', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'Measurable Behaviour Change', 'succeedlearn-amp' ); ?></span>
			</h2>

			<p>
				<?php
				esc_html_e(
					'S-Metrics forms the Measure layer of the SucceedLEARN Security Behaviour & Culture Suite.',
					'succeedlearn-amp'
				);
				?>
			</p>
		</div>

		<div class="sl-sbcs__layout">
			<div class="sl-sbcs__journey">
				<div class="sl-sbcs__journey-line" aria-hidden="true"></div>

				<?php foreach ( $suite_items as $index => $item ) : ?>
					<div class="sl-sbcs__step">
						<div class="sl-sbcs__step-marker" aria-hidden="true">
							<?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?>
						</div>
						<div class="sl-sbcs__step-content">
							<div class="sl-sbcs__step-heading">
								<h3 class="sl-panel-title"><?php echo esc_html( $item['name'] ); ?></h3>
								<span class="sl-sbcs__step-action"><?php echo esc_html( $item['action'] ); ?></span>
							</div>
							<p><?php echo esc_html( $item['description'] ); ?></p>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
