<?php
/**
 * PCI DSS AMP — See the training in action (tabbed screenshot carousels).
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$modules = succeedlearn_amp_get_pci_dss_screenshot_modules();

$employee_slides = isset( $modules['employee']['slides'] ) ? $modules['employee']['slides'] : array();
$cashier_slides  = isset( $modules['cashier']['slides'] ) ? $modules['cashier']['slides'] : array();
$employee_count  = count( $employee_slides );
$cashier_count   = count( $cashier_slides );
$employee_last   = max( 0, $employee_count - 1 );
$cashier_last    = max( 0, $cashier_count - 1 );
?>
<section class="sl-pci-screenshots" aria-labelledby="sl-pci-screenshots-title">
	<div class="sl-wrap">
		<div class="sl-pci-screenshots__grid">
			<div class="sl-pci-screenshots__content">
				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Inside the Course', 'succeedlearn-amp' ); ?>
				</span>

				<h2 id="sl-pci-screenshots-title" class="sl-h2">
					<?php esc_html_e( 'See the PCI DSS Training', 'succeedlearn-amp' ); ?>
					<span><?php esc_html_e( 'in Action', 'succeedlearn-amp' ); ?></span>
				</h2>

				<h3 class="sl-pci-screenshots__subtitle">
					<?php esc_html_e( 'Two Learning Experiences Designed Around Different Employee Responsibilities', 'succeedlearn-amp' ); ?>
				</h3>

				<div class="sl-pci-screenshots__copy">
					<p><?php esc_html_e( 'PCI DSS concepts become easier to understand when employees can see how security requirements relate to their responsibilities.', 'succeedlearn-amp' ); ?></p>
					<p><?php esc_html_e( 'The Employee Awareness module introduces foundational concepts through explanations, interactive security checks and knowledge activities.', 'succeedlearn-amp' ); ?></p>
					<p><?php esc_html_e( 'The Cashier & Payment Handler module brings payment security closer to frontline situations through practical content around card transactions, social engineering, suspicious activity and secure payment practices.', 'succeedlearn-amp' ); ?></p>
				</div>

				<amp-state id="pciShots">
					<script type="application/json">{"tab":"employee","employee":0,"cashier":0}</script>
				</amp-state>

				<div class="sl-pci-screenshots__tabs" role="tablist" aria-label="<?php esc_attr_e( 'PCI DSS training modules', 'succeedlearn-amp' ); ?>">
					<button
						type="button"
						class="sl-pci-screenshots__tab is-active"
						role="tab"
						id="sl-pci-tab-employee"
						aria-controls="sl-pci-panel-employee"
						[class]="pciShots.tab == 'employee' ? 'sl-pci-screenshots__tab is-active' : 'sl-pci-screenshots__tab'"
						[aria-selected]="pciShots.tab == 'employee' ? 'true' : 'false'"
						on="tap:AMP.setState({pciShots:{tab:'employee'}})"
					>
						<?php echo esc_html( $modules['employee']['label'] ); ?>
					</button>
					<button
						type="button"
						class="sl-pci-screenshots__tab"
						role="tab"
						id="sl-pci-tab-cashier"
						aria-controls="sl-pci-panel-cashier"
						[class]="pciShots.tab == 'cashier' ? 'sl-pci-screenshots__tab is-active' : 'sl-pci-screenshots__tab'"
						[aria-selected]="pciShots.tab == 'cashier' ? 'true' : 'false'"
						on="tap:AMP.setState({pciShots:{tab:'cashier'}})"
					>
						<?php echo esc_html( $modules['cashier']['label'] ); ?>
					</button>
				</div>
			</div>

			<div class="sl-pci-screenshots__media">
				<div
					class="sl-pci-screenshots__panel"
					id="sl-pci-panel-employee"
					role="tabpanel"
					aria-labelledby="sl-pci-tab-employee"
					[hidden]="pciShots.tab != 'employee'"
				>
					<div class="sl-pci-screenshots__viewport">
						<amp-carousel
							id="pciEmployeeCarousel"
							class="sl-pci-screenshots__carousel"
							type="slides"
							width="720"
							height="520"
							layout="responsive"
							role="region"
							aria-label="<?php echo esc_attr( $modules['employee']['label'] ); ?>"
							[slide]="pciShots.employee"
							on="slideChange:AMP.setState({pciShots:{employee:event.index}})"
						>
							<?php foreach ( $employee_slides as $slide ) : ?>
								<div class="sl-pci-screenshots__slide">
									<amp-img
										src="<?php echo esc_url( $slide['src'] ); ?>"
										width="720"
										height="520"
										layout="responsive"
										alt="<?php echo esc_attr( $slide['alt'] ); ?>"
									></amp-img>
								</div>
							<?php endforeach; ?>
						</amp-carousel>
					</div>

					<div class="sl-pci-screenshots__controls">
						<button
							type="button"
							class="sl-pci-screenshots__btn"
							aria-label="<?php esc_attr_e( 'Previous screenshot', 'succeedlearn-amp' ); ?>"
							on="tap:AMP.setState({pciShots:{employee:pciShots.employee>0?pciShots.employee-1:<?php echo (int) $employee_last; ?>}})"
						>
							<span aria-hidden="true">←</span>
						</button>

						<span
							class="sl-pci-screenshots__counter"
							aria-live="polite"
							[text]="(pciShots.employee + 1) + ' / <?php echo (int) $employee_count; ?>'"
						><?php echo esc_html( '1 / ' . $employee_count ); ?></span>

						<button
							type="button"
							class="sl-pci-screenshots__btn"
							aria-label="<?php esc_attr_e( 'Next screenshot', 'succeedlearn-amp' ); ?>"
							on="tap:AMP.setState({pciShots:{employee:pciShots.employee>=<?php echo (int) $employee_last; ?>?0:pciShots.employee+1}})"
						>
							<span aria-hidden="true">→</span>
						</button>
					</div>
				</div>

				<div
					class="sl-pci-screenshots__panel"
					id="sl-pci-panel-cashier"
					role="tabpanel"
					aria-labelledby="sl-pci-tab-cashier"
					hidden
					[hidden]="pciShots.tab != 'cashier'"
				>
					<div class="sl-pci-screenshots__viewport">
						<amp-carousel
							id="pciCashierCarousel"
							class="sl-pci-screenshots__carousel"
							type="slides"
							width="720"
							height="520"
							layout="responsive"
							role="region"
							aria-label="<?php echo esc_attr( $modules['cashier']['label'] ); ?>"
							[slide]="pciShots.cashier"
							on="slideChange:AMP.setState({pciShots:{cashier:event.index}})"
						>
							<?php foreach ( $cashier_slides as $slide ) : ?>
								<div class="sl-pci-screenshots__slide">
									<amp-img
										src="<?php echo esc_url( $slide['src'] ); ?>"
										width="720"
										height="520"
										layout="responsive"
										alt="<?php echo esc_attr( $slide['alt'] ); ?>"
									></amp-img>
								</div>
							<?php endforeach; ?>
						</amp-carousel>
					</div>

					<div class="sl-pci-screenshots__controls">
						<button
							type="button"
							class="sl-pci-screenshots__btn"
							aria-label="<?php esc_attr_e( 'Previous screenshot', 'succeedlearn-amp' ); ?>"
							on="tap:AMP.setState({pciShots:{cashier:pciShots.cashier>0?pciShots.cashier-1:<?php echo (int) $cashier_last; ?>}})"
						>
							<span aria-hidden="true">←</span>
						</button>

						<span
							class="sl-pci-screenshots__counter"
							aria-live="polite"
							[text]="(pciShots.cashier + 1) + ' / <?php echo (int) $cashier_count; ?>'"
						><?php echo esc_html( '1 / ' . $cashier_count ); ?></span>

						<button
							type="button"
							class="sl-pci-screenshots__btn"
							aria-label="<?php esc_attr_e( 'Next screenshot', 'succeedlearn-amp' ); ?>"
							on="tap:AMP.setState({pciShots:{cashier:pciShots.cashier>=<?php echo (int) $cashier_last; ?>?0:pciShots.cashier+1}})"
						>
							<span aria-hidden="true">→</span>
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
