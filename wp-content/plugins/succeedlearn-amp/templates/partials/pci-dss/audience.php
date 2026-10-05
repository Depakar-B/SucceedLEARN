<?php
/**
 * PCI DSS AMP — Who should take PCI DSS training?
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$audiences = succeedlearn_amp_get_pci_dss_audiences();
?>
<section class="sl-pci-audience" aria-labelledby="sl-pci-audience-title">
	<div class="sl-wrap">
		<div class="sl-pci-audience__intro">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Target Audience', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-pci-audience-title" class="sl-h2">
				<?php esc_html_e( 'Who Should Take', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'PCI DSS Training?', 'succeedlearn-amp' ); ?></span>
			</h2>

			<h3 class="sl-pci-audience__subtitle">
				<?php esc_html_e( 'Assign Awareness Based on Employee Responsibilities', 'succeedlearn-amp' ); ?>
			</h3>
		</div>

		<div class="sl-pci-audience__grid">
			<?php foreach ( $audiences as $audience ) : ?>
				<article class="sl-pci-audience__card">
					<h3 class="sl-panel-title"><?php echo esc_html( $audience['title'] ); ?></h3>
					<p><?php echo esc_html( $audience['lead'] ); ?></p>
					<ul class="sl-pci-audience__list">
						<?php foreach ( $audience['people'] as $person ) : ?>
							<li><?php echo esc_html( $person ); ?></li>
						<?php endforeach; ?>
					</ul>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
