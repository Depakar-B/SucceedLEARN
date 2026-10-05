<?php
/**
 * PCI DSS AMP — Why organisations choose SucceedLEARN PCI DSS training.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$reasons = succeedlearn_amp_get_pci_dss_choose_items();
?>
<section class="sl-pci-choose" aria-labelledby="sl-pci-choose-title">
	<div class="sl-wrap">
		<div class="sl-pci-choose__intro">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Business Value', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-pci-choose-title" class="sl-h2">
				<?php esc_html_e( 'Why Organisations Choose SucceedLEARN', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'PCI DSS Training', 'succeedlearn-amp' ); ?></span>
			</h2>
		</div>

		<div class="sl-pci-choose__grid">
			<?php foreach ( $reasons as $reason ) : ?>
				<article class="sl-pci-choose__card">
					<h3 class="sl-panel-title"><?php echo esc_html( $reason['title'] ); ?></h3>
					<p><?php echo esc_html( $reason['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
