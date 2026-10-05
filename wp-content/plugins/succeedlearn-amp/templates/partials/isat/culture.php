<?php
/**
 * ISAT AMP — Support a stronger information security culture.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section
	class="sl-isat-culture"
	id="stronger-information-security-culture"
	aria-labelledby="sl-isat-culture-title"
>
	<div class="sl-wrap">
		<div class="sl-isat-culture__inner">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Security Culture', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-isat-culture-title" class="sl-h2">
				<?php esc_html_e( 'Support a Stronger', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'Information Security Culture', 'succeedlearn-amp' ); ?></span>
			</h2>

			<div class="sl-isat-culture__copy">
				<p>
					<?php esc_html_e( 'Information security isn\'t created by technology alone.', 'succeedlearn-amp' ); ?>
				</p>

				<p>
					<?php esc_html_e( 'It depends on employees understanding the risks they encounter and knowing how to make safer decisions when handling information, using technology, responding to communications, and accessing organisational systems.', 'succeedlearn-amp' ); ?>
				</p>

				<p>
					<?php esc_html_e( 'SucceedLEARN\'s Information Security Awareness Training gives employees practical foundational knowledge to recognise common threats, protect organisational information, and respond appropriately when potential security risks arise.', 'succeedlearn-amp' ); ?>
				</p>
			</div>

			<p class="sl-isat-culture__highlight">
				<?php esc_html_e( 'Move beyond simply completing security training.', 'succeedlearn-amp' ); ?>
				<strong><?php esc_html_e( 'Build awareness employees can apply every day.', 'succeedlearn-amp' ); ?></strong>
			</p>

			<div class="sl-isat-culture__actions">
				<button
					type="button"
					class="sl-content-btn sl-content-btn-primary"
					data-cta="isat-culture-demo"
					<?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				>
					<?php esc_html_e( 'Request a Demo', 'succeedlearn-amp' ); ?>
				</button>
			</div>
		</div>
	</div>
</section>
