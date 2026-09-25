<?php
/**
 * PCI DSS — See the Training in Action (tabbed screenshot carousels).
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$module_carousels = array(
	'employee' => array(
		'label'  => __( 'Employee Awareness', 'akaza-adventure' ),
		'slides' => array(
			__( 'Employee Awareness screenshot 1', 'akaza-adventure' ),
			__( 'Employee Awareness screenshot 2', 'akaza-adventure' ),
			__( 'Employee Awareness screenshot 3', 'akaza-adventure' ),
			__( 'Employee Awareness screenshot 4', 'akaza-adventure' ),
		),
	),
	'cashier'  => array(
		'label'  => __( 'Cashier & Payment Handler', 'akaza-adventure' ),
		'slides' => array(
			__( 'Cashier & Payment Handler screenshot 1', 'akaza-adventure' ),
			__( 'Cashier & Payment Handler screenshot 2', 'akaza-adventure' ),
			__( 'Cashier & Payment Handler screenshot 3', 'akaza-adventure' ),
			__( 'Cashier & Payment Handler screenshot 4', 'akaza-adventure' ),
		),
	),
);
?>

<section
	class="sl-pci-screenshots"
	aria-labelledby="sl-pci-screenshots-title"
>
	<div class="container">

		<div class="sl-pci-screenshots__intro">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Inside the Course', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-pci-screenshots-title">
				<?php esc_html_e( 'See the PCI DSS Training', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'in Action', 'akaza-adventure' ); ?></span>
			</h2>

			<h3 class="sl-pci-screenshots__subtitle">
				<?php esc_html_e( 'Two Learning Experiences Designed Around Different Employee Responsibilities', 'akaza-adventure' ); ?>
			</h3>

			<div class="sl-pci-screenshots__copy">
				<p>
					<?php
					esc_html_e(
						'PCI DSS concepts become easier to understand when employees can see how security requirements relate to their responsibilities.',
						'akaza-adventure'
					);
					?>
				</p>

				<p>
					<?php
					esc_html_e(
						'The Employee Awareness module introduces foundational concepts through explanations, interactive security checks and knowledge activities.',
						'akaza-adventure'
					);
					?>
				</p>

				<p>
					<?php
					esc_html_e(
						'The Cashier & Payment Handler module brings payment security closer to frontline situations through practical content around card transactions, social engineering, suspicious activity and secure payment practices.',
						'akaza-adventure'
					);
					?>
				</p>
			</div>

		</div>

		<div class="sl-pci-screenshots__tabs" role="tablist" aria-label="<?php esc_attr_e( 'PCI DSS training modules', 'akaza-adventure' ); ?>">
			<?php $tab_index = 0; ?>
			<?php foreach ( $module_carousels as $key => $module ) : ?>
				<button
					type="button"
					class="sl-pci-screenshots__tab<?php echo 0 === $tab_index ? ' is-active' : ''; ?>"
					role="tab"
					id="sl-pci-tab-<?php echo esc_attr( $key ); ?>"
					aria-selected="<?php echo 0 === $tab_index ? 'true' : 'false'; ?>"
					aria-controls="sl-pci-panel-<?php echo esc_attr( $key ); ?>"
					data-pci-tab="<?php echo esc_attr( $key ); ?>"
				>
					<?php echo esc_html( $module['label'] ); ?>
				</button>
				<?php ++$tab_index; ?>
			<?php endforeach; ?>
		</div>

		<?php $panel_index = 0; ?>
		<?php foreach ( $module_carousels as $key => $module ) : ?>
			<div
				class="sl-pci-screenshots__panel"
				id="sl-pci-panel-<?php echo esc_attr( $key ); ?>"
				role="tabpanel"
				aria-labelledby="sl-pci-tab-<?php echo esc_attr( $key ); ?>"
				data-pci-tab-panel="<?php echo esc_attr( $key ); ?>"
				<?php echo 0 === $panel_index ? '' : ' hidden'; ?>
			>
				<div
					class="sl-pci-screenshots__carousel"
					data-pci-carousel
					aria-roledescription="carousel"
					aria-label="<?php echo esc_attr( $module['label'] ); ?>"
				>
					<div class="sl-pci-screenshots__track" data-pci-carousel-track>
						<?php foreach ( $module['slides'] as $index => $label ) : ?>
							<figure
								class="sl-pci-screenshots__slide<?php echo 0 === $index ? ' is-active' : ''; ?>"
								data-pci-carousel-slide
								<?php echo 0 === $index ? '' : ' hidden'; ?>
							>
								<div class="sl-pci-screenshots__image-placeholder">
									<span><?php echo esc_html( $label ); ?></span>
								</div>
								<figcaption class="screen-reader-text">
									<?php echo esc_html( $label ); ?>
								</figcaption>
							</figure>
						<?php endforeach; ?>
					</div>

					<div class="sl-pci-screenshots__controls">
						<button type="button" class="sl-pci-screenshots__btn" data-pci-carousel-prev aria-label="<?php esc_attr_e( 'Previous screenshot', 'akaza-adventure' ); ?>">
							←
						</button>
						<div class="sl-pci-screenshots__dots" data-pci-carousel-dots aria-hidden="true"></div>
						<button type="button" class="sl-pci-screenshots__btn" data-pci-carousel-next aria-label="<?php esc_attr_e( 'Next screenshot', 'akaza-adventure' ); ?>">
							→
						</button>
					</div>
				</div>
			</div>
			<?php ++$panel_index; ?>
		<?php endforeach; ?>

	</div>
</section>
