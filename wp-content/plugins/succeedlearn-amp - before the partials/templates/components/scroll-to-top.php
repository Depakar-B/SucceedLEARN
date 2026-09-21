<?php
/**
 * Scroll to top button.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div id="sl-scroll-top" class="sl-scroll-top-wrap">
	<button
		type="button"
		class="sl-scroll-top"
		on="tap:AMP.scrollTo(id='sl-page-top', duration=400, position='top')"
		aria-label="<?php esc_attr_e( 'Back to top', 'succeedlearn-amp' ); ?>"
		title="<?php esc_attr_e( 'Back to top', 'succeedlearn-amp' ); ?>"
	>
		<span class="sl-scroll-top__icon" aria-hidden="true"></span>
	</button>
</div>
