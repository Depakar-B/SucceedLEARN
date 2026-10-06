<?php
/**
 * PE/VC Suite AMP — Why it matters.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( empty( $why_items ) || ! is_array( $why_items ) ) {
	$why_items = succeedlearn_amp_get_pevc_why_items();
}
?>
<section id="why-it-matters" class="sl-pevc-why" aria-labelledby="sl-pevc-why-title">
	<div class="sl-wrap">
		<span class="sl-home-sub-heading">
			<?php esc_html_e( 'Why it matters', 'succeedlearn-amp' ); ?>
		</span>

		<h2 id="sl-pevc-why-title" class="sl-h2">
			<?php esc_html_e( 'Why Compliance Training Matters for Private Equity and Venture Capital Firms', 'succeedlearn-amp' ); ?>
		</h2>

		<p class="sl-pevc-why__lead">
			<?php
			esc_html_e(
				'PE and VC employees make decisions around information, investors, counterparties, suppliers, payments, hospitality, workplace conduct and governance every day.',
				'succeedlearn-amp'
			);
			?>
		</p>
		<p>
			<?php
			esc_html_e(
				'The strongest compliance programmes do more than explain policies. They help employees recognise when an ordinary business situation becomes a compliance decision.',
				'succeedlearn-amp'
			);
			?>
		</p>

		<aside class="sl-pevc-why__panel">
			<h3 class="sl-panel-title"><?php esc_html_e( 'Effective training helps people:', 'succeedlearn-amp' ); ?></h3>
			<ol class="sl-pevc-why__list">
				<?php foreach ( $why_items as $item ) : ?>
					<li><?php echo esc_html( $item ); ?></li>
				<?php endforeach; ?>
			</ol>
		</aside>
	</div>
</section>
