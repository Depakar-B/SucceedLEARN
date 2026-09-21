<?php
/**
 * SucceedLEARN — Workplace Harassment Prevention
 *
 * Section: Make your policy part of the learning
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$customisation_items = array(
	'Organisation branding',
	'Anti-harassment or POSH policy',
	'Reporting and escalation channels',
	'HR and compliance contact details',
	'India Internal Committee information',
	'Leadership messages',
	'Industry-relevant examples',
	'Assessments and completion requirements',
);
?>

<section
	class="sl-harassment-policy-learning"
	id="make-policy-part-of-learning"
	aria-labelledby="sl-harassment-policy-learning-title"
>

	<div class="container">

		<div class="sl-harassment-policy-learning__layout">

			<!-- =====================================
			     CONTENT
			===================================== -->

			<div class="sl-harassment-policy-learning__content">

				<span class="sl-home-sub-heading">
					<?php
					esc_html_e(
						'Customised Workplace Learning',
						'akaza-adventure'
					);
					?>
				</span>

				<h2 id="sl-harassment-policy-learning-title">
					<?php
					esc_html_e(
						'Make your policy part of the',
						'akaza-adventure'
					);
					?>
					<span>
						<?php
						esc_html_e(
							'learning',
							'akaza-adventure'
						);
						?>
					</span>
				</h2>

				<p class="sl-harassment-policy-learning__intro">
					<?php
					esc_html_e(
						'Employees should finish training knowing how your organisation expects them to respond.',
						'akaza-adventure'
					);
					?>
				</p>

				<p>
					<?php
					esc_html_e(
						'Depending on the selected course and project scope, customisation can include:',
						'akaza-adventure'
					);
					?>
				</p>


				<!-- =====================================
				     CUSTOMISATION LIST
				===================================== -->

				<ul class="sl-harassment-policy-learning__list">

					<?php foreach ( $customisation_items as $item ) : ?>

						<li>

							<span
								class="sl-harassment-policy-learning__check"
								aria-hidden="true"
							>
								✓
							</span>

							<span>
								<?php echo esc_html( $item ); ?>
							</span>

						</li>

					<?php endforeach; ?>

				</ul>


				<p class="sl-harassment-policy-learning__closing">
					<?php
					esc_html_e(
						'Customisation makes the learning more recognisable and helps connect course content with the organisation’s actual procedures.',
						'akaza-adventure'
					);
					?>
				</p>


				<!-- =====================================
				     CTA
				===================================== -->

				<div class="sl-content-actions">

					<a
						class="sl-content-btn sl-content-btn-primary"
						href="#contact"
					>
						<?php
						esc_html_e(
							'Discuss Customisation',
							'akaza-adventure'
						);
						?>
						<span aria-hidden="true">→</span>
					</a>

				</div>

			</div>


			<!-- =====================================
			     STATIC IMAGE
			===================================== -->

			<div class="sl-harassment-policy-learning__visual">

				<div
					class="sl-harassment-policy-learning__image-placeholder"
					role="img"
					aria-label="<?php esc_attr_e( 'Customised workplace harassment training image placeholder', 'akaza-adventure' ); ?>"
				>

					<div class="sl-harassment-policy-learning__image-mark">
						<span aria-hidden="true">✦</span>
					</div>

					<span class="sl-harassment-policy-learning__image-label">
						<?php
						esc_html_e(
							'Image Placeholder',
							'akaza-adventure'
						);
						?>
					</span>

					<span class="sl-harassment-policy-learning__image-size">
						<?php
						esc_html_e(
							'Recommended: 720 × 620 px',
							'akaza-adventure'
						);
						?>
					</span>

				</div>

			</div>

		</div>

	</div>

</section>