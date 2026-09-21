<?php
/**
 * Cybersecurity Awareness AMP — campaign footer.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<footer
	class="sl-csa-footer"
	role="contentinfo"
	aria-label="<?php esc_attr_e( 'Campaign footer', 'succeedlearn-amp' ); ?>"
>
	<div class="sl-wrap">
		<div class="sl-csa-footer__meta">
			<p class="sl-csa-footer__tagline">
				<?php esc_html_e( 'Cyber Ready October 2026 - Powered by SucceedLEARN', 'succeedlearn-amp' ); ?>
			</p>
			<p class="sl-csa-footer__email">
				<a href="mailto:connect@succeedtech.com">Connect@succeedtech.com</a>
			</p>
			<p class="sl-csa-footer__copyright">
				<?php esc_html_e( '© 2026 All Rights Reserved.', 'succeedlearn-amp' ); ?>
			</p>
		</div>

		<details class="sl-csa-footer__conditions">
			<summary class="sl-csa-footer__conditions-toggle">
				<?php esc_html_e( 'Campaign conditions', 'succeedlearn-amp' ); ?>
			</summary>
			<div class="sl-csa-footer__conditions-panel">
				<p>
					<?php
					esc_html_e(
						'One contracting domain and one Microsoft 365 tenant. Customer approval is required for simulations. Standard configuration only; custom integrations, extensive tenant troubleshooting and managed incident response are excluded. PhishCue supports reported-email checking and review and is not a substitute for a managed SOC. Final dates and access period will be confirmed in the order form.',
						'succeedlearn-amp'
					);
					?>
				</p>
			</div>
		</details>
	</div>
</footer>
<?php
$body_end = SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'components/body-end.php';
if ( is_readable( $body_end ) ) {
	include $body_end;
}
?>
