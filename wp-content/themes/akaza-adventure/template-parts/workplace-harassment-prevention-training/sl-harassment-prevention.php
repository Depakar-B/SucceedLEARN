<?php
/**
 * SucceedLEARN — Workplace Harassment Prevention
 *
 * Section: Training is one part of prevention
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$prevention_framework = array(
	'Current regional policies',
	'Workplace risk assessments',
	'Accessible reporting channels',
	'Trained managers and complaint handlers',
	'Prompt and impartial investigations',
	'Protection from retaliation or victimisation',
	'Appropriate corrective action',
	'Periodic review of training and policies',
);
?>

<section
	class="sl-harassment-prevention"
	id="training-part-of-prevention"
	aria-labelledby="sl-harassment-prevention-title"
>

	<div class="container">

		<div class="sl-harassment-prevention__layout">

			<!-- =====================================
			     IMAGE
			===================================== -->

			<div class="sl-harassment-prevention__visual">

				<div
					class="sl-harassment-prevention__image-placeholder"
					role="img"
					aria-label="<?php esc_attr_e( 'Workplace harassment prevention image placeholder', 'akaza-adventure' ); ?>"
				>

					<div class="sl-harassment-prevention__image-mark">
						<span aria-hidden="true">✦</span>
					</div>

					<span class="sl-harassment-prevention__image-label">
						<?php
						esc_html_e(
							'Image Placeholder',
							'akaza-adventure'
						);
						?>
					</span>

					<span class="sl-harassment-prevention__image-size">
						<?php
						esc_html_e(
							'Recommended: 720 × 620 px',
							'akaza-adventure'
						);
						?>
					</span>

				</div>

			</div>


			<!-- =====================================
			     CONTENT
			===================================== -->

			<div class="sl-harassment-prevention__content">

				<span class="sl-home-sub-heading">
					<?php
					esc_html_e(
						'Beyond Training',
						'akaza-adventure'
					);
					?>
				</span>

				<h2 id="sl-harassment-prevention-title">
					<?php
					esc_html_e(
						'Training is one part of',
						'akaza-adventure'
					);
					?>
					<span>
						<?php
						esc_html_e(
							'prevention',
							'akaza-adventure'
						);
						?>
					</span>
				</h2>

				<p>
					<?php
					esc_html_e(
						'Training can build knowledge, establish shared expectations and clarify reporting options. It cannot create a harassment-free workplace on its own.',
						'akaza-adventure'
					);
					?>
				</p>

				<p>
					<?php
					esc_html_e(
						'A credible prevention framework may also require:',
						'akaza-adventure'
					);
					?>
				</p>


				<!-- =====================================
				     PREVENTION FRAMEWORK LIST
				===================================== -->

				<ul class="sl-harassment-prevention__list">

					<?php foreach ( $prevention_framework as $item ) : ?>

						<li>

							<span
								class="sl-harassment-prevention__check"
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

				<p class="sl-harassment-prevention__closing">
					<?php
					esc_html_e(
						'Training becomes meaningful when employees see its principles reflected in everyday decisions and in the organisation’s response to concerns.',
						'akaza-adventure'
					);
					?>
				</p>

			</div>

		</div>

	</div>

</section>