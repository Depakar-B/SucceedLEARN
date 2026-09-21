<?php
/**
 * US Sexual Harassment Prevention Training — Training Coverage
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$training_requirements = array(
	__( 'The state, city or territory where each employee works', 'akaza-adventure' ),
	__( 'Whether the learner has supervisory authority', 'akaza-adventure' ),
	__( 'Employer-size and industry thresholds', 'akaza-adventure' ),
	__( 'Required course length, frequency and delivery format', 'akaza-adventure' ),
	__( 'Policy, notice, certificate and record-retention obligations', 'akaza-adventure' ),
);
?>

<section class="sl-us-harassment-coverage" aria-labelledby="sl-us-harassment-coverage-title">
	<div class="container">

		<div class="sl-us-harassment-coverage__grid">

			<!-- Left: Sticky Image -->
			<div class="sl-us-harassment-coverage__media">

				<div class="sl-us-harassment-coverage__image">

					<div class="sl-us-harassment-coverage__image-placeholder">
						<span>
							<?php esc_html_e( 'Image Placeholder', 'akaza-adventure' ); ?>
						</span>
					</div>

				</div>

			</div>

			<!-- Right: Content -->
			<div class="sl-us-harassment-coverage__content">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Training Requirements', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-us-harassment-coverage-title">
					<?php esc_html_e( 'What Should U.S. Harassment Prevention', 'akaza-adventure' ); ?>
					<span><?php esc_html_e( 'Training Cover?', 'akaza-adventure' ); ?></span>
				</h2>

				<div class="sl-us-harassment-coverage__intro">

					<p>
						<?php esc_html_e(
							'U.S. harassment prevention training should help employees identify prohibited and inappropriate conduct, understand how concerns can be reported and recognize protection against retaliation. Supervisor learning should add guidance on policy enforcement, mandatory escalation, complaint handling, documentation, privacy and cooperation with investigations.',
							'akaza-adventure'
						); ?>
					</p>

					<p>
						<?php esc_html_e(
							'The right course also depends on location. Federal anti-discrimination principles operate alongside state and local rules, which may specify who must be trained, the required duration and frequency, interactivity standards or recordkeeping obligations.',
							'akaza-adventure'
						); ?>
					</p>

				</div>

				<div class="sl-us-harassment-coverage__checklist">

					<h3 class="sl-panel-title">
						<?php esc_html_e( 'Before assigning a course, confirm:', 'akaza-adventure' ); ?>
					</h3>

					<ul class="sl-list sl-us-harassment-coverage__list">

						<?php foreach ( $training_requirements as $index => $requirement ) : ?>

							<li class="sl-list-item">

								<span class="sl-list-item__label" aria-hidden="true">
									<?php
									echo esc_html(
										str_pad(
											(string) ( $index + 1 ),
											2,
											'0',
											STR_PAD_LEFT
										)
									);
									?>
								</span>

								<span class="sl-list-item__text">
									<?php echo esc_html( $requirement ); ?>
								</span>

							</li>

						<?php endforeach; ?>

					</ul>

				</div>

			</div>

		</div>

	</div>
</section>