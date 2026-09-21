<?php
/**
 * Inclusive Workplace Training — Modules overview section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$inclusive_modules = array(
	array( 'icon' => 'bi-globe2',      'title' => __( 'Equality, Diversity and Inclusion', 'akaza-adventure' ) ),
	array( 'icon' => 'bi-eye-slash',   'title' => __( 'Unconscious Bias', 'akaza-adventure' ) ),
	array( 'icon' => 'bi-people-fill', 'title' => __( 'Bystander Intervention', 'akaza-adventure' ) ),
);
?>
<section class="sl-inclusive-modules-overview">
	<div class="container-xl">
		<div class="sl-inclusive-modules-overview__inner">
		<h2><?php esc_html_e( 'Inclusive Workplace Training from SucceedLearn', 'akaza-adventure' ); ?></h2>
			<h3 class="sl-inclusive-modules-overview__intro"><?php esc_html_e( 'Inclusive Workplace Training from SucceedLearn helps employees recognise these moments and respond more thoughtfully.', 'akaza-adventure' ); ?></h3>

			<p><?php esc_html_e( 'Part of the Global HR Compliance Suite, the Inclusive Workplace category contains three separate online training modules:', 'akaza-adventure' ); ?></p>

			<div class="sl-inclusive-modules-overview__grid" role="list" aria-label="<?php esc_attr_e( 'Inclusive workplace training modules', 'akaza-adventure' ); ?>">
				<?php foreach ( $inclusive_modules as $module ) : ?>
					<div class="sl-inclusive-modules-overview__card" role="listitem">
						<div class="sl-inclusive-modules-overview__card-icon" aria-hidden="true">
							<i class="bi <?php echo esc_attr( $module['icon'] ); ?>"></i>
						</div>
						<h3><?php echo esc_html( $module['title'] ); ?></h3>
					</div>
				<?php endforeach; ?>
			</div>

			<p class="sl-inclusive-modules-overview__desc">
				<?php esc_html_e( 'Each module addresses a specific workplace challenge and has its own learning objectives, course content and practical applications. Organisations can select the individual course that best supports their current workforce and compliance priorities.', 'akaza-adventure' ); ?>
			</p>

			<p class="sl-inclusive-modules-overview__tagline">
				<?php esc_html_e( 'Move inclusion beyond intention. Make it part of everyday action.', 'akaza-adventure' ); ?>
			</p>

			<div class="sl-inclusive-modules-overview__actions">
				<a href="#inclusive-courses" class="sl-content-btn sl-content-btn-secondary">
					<?php esc_html_e( 'Explore the Courses', 'akaza-adventure' ); ?>
				</a>
				<a href="#contact" class="sl-content-btn sl-content-btn-primary">
					<?php esc_html_e( 'Request a Demo', 'akaza-adventure' ); ?>
				</a>
			</div>

		</div>
	</div>
</section>
