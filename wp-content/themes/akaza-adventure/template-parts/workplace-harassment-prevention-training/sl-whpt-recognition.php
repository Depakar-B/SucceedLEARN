<?php
/**
 * SucceedLEARN
 * Workplace Harassment Prevention Training
 * Recognition / Response section
 */
?>

<section
	class="sl-whpt-recognition"
	aria-labelledby="sl-whpt-recognition-title"
>
	<div class="container">

		<div class="sl-whpt-recognition__grid">

			<!-- Left: Content -->
			<div class="sl-whpt-recognition__content">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'RECOGNISE THE MOMENTS THAT MATTER', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-whpt-recognition-title">
					<?php
					echo wp_kses_post(
						__( 'Help employees <span>recognise</span> the moments that matter', 'akaza-adventure' )
					);
					?>
				</h2>

				<p class="sl-whpt-recognition__lead">
					<?php esc_html_e(
						'Harassment may appear through inappropriate comments, messages, unwanted attention, misuse of authority or conduct in virtual and work-related settings.',
						'akaza-adventure'
					); ?>
				</p>

				<p>
					<?php esc_html_e(
						'Through practical scenarios, learners explore different forms of harassment, intent and impact, consent, bystander intervention, reporting and appropriate workplace responses.',
						'akaza-adventure'
					); ?>
				</p>

				<div class="sl-whpt-recognition__path" aria-label="<?php esc_attr_e( 'Learning approach', 'akaza-adventure' ); ?>">

					<div class="sl-whpt-recognition__step">
						<span class="sl-whpt-recognition__number">01</span>
						<span class="sl-whpt-recognition__label">
							<?php esc_html_e( 'Recognise', 'akaza-adventure' ); ?>
						</span>
					</div>

					<span class="sl-whpt-recognition__arrow" aria-hidden="true">→</span>

					<div class="sl-whpt-recognition__step">
						<span class="sl-whpt-recognition__number">02</span>
						<span class="sl-whpt-recognition__label">
							<?php esc_html_e( 'Understand', 'akaza-adventure' ); ?>
						</span>
					</div>

					<span class="sl-whpt-recognition__arrow" aria-hidden="true">→</span>

					<div class="sl-whpt-recognition__step">
						<span class="sl-whpt-recognition__number">03</span>
						<span class="sl-whpt-recognition__label">
							<?php esc_html_e( 'Respond', 'akaza-adventure' ); ?>
						</span>
					</div>

					<span class="sl-whpt-recognition__arrow" aria-hidden="true">→</span>

					<div class="sl-whpt-recognition__step">
						<span class="sl-whpt-recognition__number">04</span>
						<span class="sl-whpt-recognition__label">
							<?php esc_html_e( 'Prevent', 'akaza-adventure' ); ?>
						</span>
					</div>

				</div>

			</div>

			<!-- Right: Image -->
			<div class="sl-whpt-recognition__media">

				<div class="sl-whpt-recognition__image-placeholder">
					<span>Image placeholder</span>
					<small>Recommended: 720 × 620 px</small>
				</div>

			</div>

		</div>

	</div>
</section>