<?php
/**
 * Cybersecurity Awareness — top announcement bar (below site header).
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="sl-csa-top-bar" role="region" aria-label="<?php esc_attr_e( 'Campaign announcement', 'akaza-adventure' ); ?>">
	<div class="container">
		<div class="sl-csa-top-bar__inner">
			<p class="sl-csa-top-bar__label">
				<?php esc_html_e( 'Cyber Security Awareness Month 2026', 'akaza-adventure' ); ?>
			</p>
			<p class="sl-csa-top-bar__note">
				<?php esc_html_e( 'Limited-time campaign pricing for UK organisations', 'akaza-adventure' ); ?>
			</p>
		</div>
	</div>
</div>
