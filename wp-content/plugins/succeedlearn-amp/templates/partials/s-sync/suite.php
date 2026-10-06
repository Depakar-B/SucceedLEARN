<?php
/**
 * S-Sync AMP — Integrating the Entire Security Behaviour & Culture Suite.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$suite_products = function_exists( 'succeedlearn_amp_get_ssync_suite_items' )
	? succeedlearn_amp_get_ssync_suite_items()
	: array();

if ( empty( $suite_products ) ) {
	return;
}
?>
<section class="sl-s-sync-suite" aria-labelledby="sl-s-sync-suite-title">
	<div class="sl-wrap">
		<div class="sl-s-sync-suite__intro">
			<span class="sl-home-sub-heading"><?php esc_html_e( 'S-Sync Connects the Entire SBCS Journey', 'succeedlearn-amp' ); ?></span>
			<h2 id="sl-s-sync-suite-title" class="sl-h2">
				<?php esc_html_e( 'From Awareness to a', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'Connected Security Ecosystem', 'succeedlearn-amp' ); ?></span>
			</h2>
		</div>
		<div class="sl-s-sync-suite__cards sl-amp-card-grid">
			<?php foreach ( $suite_products as $index => $product ) : ?>
				<article class="sl-s-sync-suite__card">
					<span class="sl-s-sync-suite__number" aria-hidden="true">
						<?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?>
					</span>
					<div class="sl-s-sync-suite__card-heading">
						<h3 class="sl-panel-title"><?php echo esc_html( $product['name'] ); ?></h3>
						<span class="sl-s-sync-suite__role"><?php echo esc_html( $product['role'] ); ?></span>
					</div>
					<p><?php echo esc_html( $product['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
		<div class="sl-s-sync-suite__closing">
			<p><?php esc_html_e( 'Together, these solutions create a continuous security-awareness ecosystem that can learn, reinforce, test, engage, remind, measure and connect.', 'succeedlearn-amp' ); ?></p>
		</div>
	</div>
</section>
