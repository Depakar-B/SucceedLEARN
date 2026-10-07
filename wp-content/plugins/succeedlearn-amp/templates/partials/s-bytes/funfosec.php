<?php
/**
 * S-Bytes AMP — Why S-Bytes? (FunFoSec benefits).
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$benefits = succeedlearn_amp_get_sbytes_funfosec_items();
?>
<section id="why-funfosec" class="sl-sbytes-funfosec" aria-labelledby="sl-sbytes-funfosec-title">
	<div class="sl-wrap">
		<div class="sl-sbytes-funfosec__layout">
			<div class="sl-sbytes-funfosec__intro">
				<span class="sl-home-sub-heading"><?php esc_html_e( 'Why S-Bytes', 'succeedlearn-amp' ); ?></span>
				<h2 id="sl-sbytes-funfosec-title" class="sl-h2">
					<?php esc_html_e( 'Why', 'succeedlearn-amp' ); ?>
					<span><?php esc_html_e( 'S-Bytes?', 'succeedlearn-amp' ); ?></span>
				</h2>
				<p><?php esc_html_e( 'Traditional cybersecurity training is often dull and repetitive, leading employees to tune out and miss crucial information. FunFoSec flips the script by delivering short, humorous, and highly memorable security lessons that employees will genuinely look forward to.', 'succeedlearn-amp' ); ?></p>
				<p><?php esc_html_e( 'By delivering awareness in small, regular bursts, FunFoSec helps organisations reinforce secure behaviours long after formal security awareness training has been completed.', 'succeedlearn-amp' ); ?></p>
				<div class="sl-hero-actions sl-sbytes-funfosec__actions">
					<button
						type="button"
						class="sl-hero-btn sl-hero-btn-primary"
						data-cta="funfosec-contact"
						<?php echo succeedlearn_amp_scroll_tap_attr( 'request-demo' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					>
						<?php esc_html_e( 'Contact Us', 'succeedlearn-amp' ); ?>
					</button>
				</div>
			</div>
			<div class="sl-sbytes-funfosec__cards">
				<div class="sl-sbytes-funfosec__grid">
					<?php foreach ( $benefits as $item ) : ?>
						<article class="sl-sbytes-funfosec__card">
							<h3 class="sl-panel-title"><?php echo esc_html( $item['title'] ); ?></h3>
							<p><?php echo esc_html( $item['text'] ); ?></p>
						</article>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</section>
