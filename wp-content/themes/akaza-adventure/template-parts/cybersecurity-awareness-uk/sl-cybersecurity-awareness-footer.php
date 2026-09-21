<?php
/**
 * Cybersecurity Awareness — campaign footer (this page only).
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<footer class="sl-csa-footer" role="contentinfo" aria-label="<?php esc_attr_e( 'Campaign footer', 'akaza-adventure' ); ?>">
	<div class="container">
		<div class="sl-csa-footer__meta">
			<p class="sl-csa-footer__tagline">
				<?php esc_html_e( 'Cyber Ready October 2026 - Powered by SucceedLEARN', 'akaza-adventure' ); ?>
			</p>
			<p class="sl-csa-footer__email">
				<a href="mailto:connect@succeedtech.com">Connect@succeedtech.com</a>
			</p>
			<p class="sl-csa-footer__copyright">
				<?php esc_html_e( '© 2026 All Rights Reserved.', 'akaza-adventure' ); ?>
			</p>
		</div>

		<details class="sl-csa-footer__conditions">
			<summary class="sl-csa-footer__conditions-toggle">
				<?php esc_html_e( 'Campaign conditions', 'akaza-adventure' ); ?>
			</summary>
			<div class="sl-csa-footer__conditions-panel">
				<p>
					<?php esc_html_e( 'One contracting domain and one Microsoft 365 tenant. Customer approval is required for simulations. Standard configuration only; custom integrations, extensive tenant troubleshooting and managed incident response are excluded. PhishCue supports reported-email checking and review and is not a substitute for a managed SOC. Final dates and access period will be confirmed in the order form.', 'akaza-adventure' ); ?>
				</p>
			</div>
		</details>
	</div>
</footer>
