<?php
/**
 * SMCR Training for PE & VC Firms — Senior Managers Learning Path.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$learning_areas = array(
	__( 'Statements of Responsibilities', 'akaza-adventure' ),
	__( 'Duty of Responsibility', 'akaza-adventure' ),
	__( 'Reasonable steps', 'akaza-adventure' ),
	__( 'Delegation and oversight', 'akaza-adventure' ),
	__( 'Additional Senior Manager Conduct Rules', 'akaza-adventure' ),
	__( 'Documentation and recordkeeping', 'akaza-adventure' ),
);
?>

<section
	id="senior-managers-learning"
	class="sl-smcr-senior-managers"
	aria-labelledby="sl-smcr-senior-managers-title"
>
	<div class="container">

		<div class="sl-smcr-senior-managers__grid">

			<div class="sl-smcr-senior-managers__content">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Senior Managers Learning Path', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-smcr-senior-managers-title">
					<?php esc_html_e( 'SMCR Senior Managers Training for Reasonable Steps, Oversight and', 'akaza-adventure' ); ?>
					<span><?php esc_html_e( 'Accountability', 'akaza-adventure' ); ?></span>
				</h2>

				<p>
					<?php esc_html_e(
						'Senior Managers have additional responsibilities beyond the employee-level Conduct Rules. This course focuses on how those responsibilities translate into leadership and oversight.',
						'akaza-adventure'
					); ?>
				</p>

				<p>
					<?php esc_html_e(
						'Learners work through practical PE/VC situations involving controls, delegation, reporting, documentation and regulatory interaction.',
						'akaza-adventure'
					); ?>
				</p>

				<div class="sl-smcr-senior-managers__learning">

					<h3 class="sl-panel-title">
						<?php esc_html_e( 'Key Learning Areas', 'akaza-adventure' ); ?>
					</h3>

					<ul class="sl-list">
						<?php foreach ( $learning_areas as $index => $learning_area ) : ?>
							<li class="sl-list-item">
								<span class="sl-list-item__label" aria-hidden="true">
									<?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?>
								</span>

								<span class="sl-list-item__text">
									<?php echo esc_html( $learning_area ); ?>
								</span>
							</li>
						<?php endforeach; ?>
					</ul>

				</div>

			</div>

			<div class="sl-smcr-senior-managers__media">

				<div class="sl-smcr-senior-managers__image">
					<img
						src="<?php echo esc_url( 'https://succeedlearn.com/wp-content/uploads/2026/09/SMCR_Manager.webp' ); ?>"
						alt="<?php esc_attr_e( 'SMCR senior managers training', 'akaza-adventure' ); ?>"
						loading="lazy"
						decoding="async"
					>
				</div>

			</div>

		</div>

	</div>
</section>