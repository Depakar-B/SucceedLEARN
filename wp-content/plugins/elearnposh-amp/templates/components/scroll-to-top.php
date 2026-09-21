<?php
/**
 * Scroll To Top Button Component
 *
 * Fixed bottom-right control aligned with desktop POSH templates.
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<div id="ep-scroll-to-top" class="ep-scroll-to-top-wrap">
	<button
		type="button"
		class="ep-scroll-to-top"
		on="tap:ep-page-top.scrollTo(duration=400, position=top)"
		role="button"
		tabindex="0"
		aria-label="<?php esc_attr_e( 'Back to top', 'elearnposh-amp' ); ?>"
		title="<?php esc_attr_e( 'Back to top', 'elearnposh-amp' ); ?>"
	>
		<span class="ep-scroll-to-top__icon" aria-hidden="true"></span>
	</button>
</div>
