<?php
/**
 * PCI DSS AMP — Two training modules.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$modules = succeedlearn_amp_get_pci_dss_modules();
?>
<section class="sl-pci-learn" aria-labelledby="sl-pci-learn-title">
	<div class="sl-wrap">
		<div class="sl-pci-learn__intro">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Two Learning Paths', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-pci-learn-title" class="sl-h2">
				<?php esc_html_e( 'Two PCI DSS Training Modules.', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'One Awareness Programme.', 'succeedlearn-amp' ); ?></span>
			</h2>

			<h3 class="sl-pci-learn__subtitle">
				<?php esc_html_e( 'Choose Training Based on Employee Responsibility', 'succeedlearn-amp' ); ?>
			</h3>

			<p>
				<?php esc_html_e( 'Rather than providing every employee with identical training, organizations can assign learning based on how employees interact with payment information and the cardholder data environment.', 'succeedlearn-amp' ); ?>
			</p>
		</div>

		<div class="sl-pci-learn__grid">
			<?php foreach ( $modules as $module ) : ?>
				<article class="sl-pci-learn__card">
					<h3 class="sl-panel-title"><?php echo esc_html( $module['title'] ); ?></h3>
					<p class="sl-pci-learn__tagline"><?php echo esc_html( $module['tagline'] ); ?></p>
					<p><?php echo esc_html( $module['intro'] ); ?></p>
					<p><strong><?php echo esc_html( $module['learn'] ); ?></strong></p>
					<ul class="sl-pci-learn__list">
						<?php foreach ( $module['topics'] as $topic ) : ?>
							<li><?php echo esc_html( $topic ); ?></li>
						<?php endforeach; ?>
					</ul>
					<?php foreach ( $module['meta'] as $meta_line ) : ?>
						<p class="sl-pci-learn__meta"><?php echo esc_html( $meta_line ); ?></p>
					<?php endforeach; ?>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
