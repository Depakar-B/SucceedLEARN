<?php
/**
 * BFSI & PE/VC AMP — Built around financial-services scenarios.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$scenarios = succeedlearn_amp_get_bfsi_scenarios();
?>
<section
	class="sl-bfsi-scenarios"
	id="financial-services-scenarios"
	aria-labelledby="sl-bfsi-scenarios-title"
>
	<div class="sl-wrap">
		<div class="sl-bfsi-scenarios__intro">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Workplace Context', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-bfsi-scenarios-title" class="sl-h2">
				<?php esc_html_e( 'Built Around Financial-Services', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'Scenarios', 'succeedlearn-amp' ); ?></span>
			</h2>

			<p><?php esc_html_e( 'Generic cybersecurity examples can be difficult for employees to connect with their own responsibilities.', 'succeedlearn-amp' ); ?></p>

			<p class="sl-bfsi-scenarios__lead">
				<?php esc_html_e( 'This course places security awareness within situations relevant to BFSI and PE/VC environments, where employees may encounter:', 'succeedlearn-amp' ); ?>
			</p>
		</div>

		<ul class="sl-bfsi-scenarios__list">
			<?php foreach ( $scenarios as $scenario ) : ?>
				<li><?php echo esc_html( $scenario ); ?></li>
			<?php endforeach; ?>
		</ul>

		<p class="sl-bfsi-scenarios__close">
			<?php esc_html_e( 'The objective is to help employees move from simply knowing that cyber threats exist to understanding how to recognise, verify, report and respond to them.', 'succeedlearn-amp' ); ?>
		</p>
	</div>
</section>
