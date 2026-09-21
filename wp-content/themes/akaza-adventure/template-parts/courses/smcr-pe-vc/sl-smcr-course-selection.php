<?php
/**
 * SMCR Training — Course Selection.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section
	id="course-selection"
	class="sl-smcr-course-selection"
	aria-labelledby="sl-smcr-course-selection-title"
>
	<div class="container">

		<div class="sl-section-intro">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Course Selection', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-smcr-course-selection-title">
				<?php esc_html_e( 'Who Should Take SMCR Training in a UK PE or VC', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Firm?', 'akaza-adventure' ); ?></span>
			</h2>

			<p>
				<?php esc_html_e( 'Choose the learning path that best matches the learner’s role and responsibilities within the firm.', 'akaza-adventure' ); ?>
			</p>
		</div>

		<div class="sl-smcr-course-selection__grid">

			<article class="sl-smcr-course-selection__card">
				<div class="sl-smcr-course-selection__card-content">

					<span class="sl-smcr-course-selection__label">
						<?php esc_html_e( 'Employees Course', 'akaza-adventure' ); ?>
					</span>

					<h3 class="sl-panel-title">
						<?php esc_html_e( 'SMCR Training for Employees', 'akaza-adventure' ); ?>
					</h3>

					<p>
						<?php esc_html_e( 'Designed for relevant employees who need to understand the SMCR structure and how the Individual Conduct Rules apply to their responsibilities.', 'akaza-adventure' ); ?>
					</p>

					<div class="sl-smcr-course-selection__focus">
						<span>
							<?php esc_html_e( 'SMCR structure', 'akaza-adventure' ); ?>
						</span>

						<span>
							<?php esc_html_e( 'Individual Conduct Rules', 'akaza-adventure' ); ?>
						</span>

						<span>
							<?php esc_html_e( 'Workplace responsibilities', 'akaza-adventure' ); ?>
						</span>
					</div>

					<a
						class="sl-smcr-course-selection__link"
						href="#employees-learning"
					>
						<?php esc_html_e( 'Explore Employees Course', 'akaza-adventure' ); ?>
						<span aria-hidden="true">→</span>
					</a>

				</div>
			</article>

			<article class="sl-smcr-course-selection__card">
				<div class="sl-smcr-course-selection__card-content">

					<span class="sl-smcr-course-selection__label">
						<?php esc_html_e( 'Senior Managers Course', 'akaza-adventure' ); ?>
					</span>

					<h3 class="sl-panel-title">
						<?php esc_html_e( 'SMCR Training for Senior Managers', 'akaza-adventure' ); ?>
					</h3>

					<p>
						<?php esc_html_e( 'Designed for relevant Senior Management Function holders who need additional understanding of accountability, reasonable steps, delegation and oversight.', 'akaza-adventure' ); ?>
					</p>

					<div class="sl-smcr-course-selection__focus">
						<span>
							<?php esc_html_e( 'Senior Manager accountability', 'akaza-adventure' ); ?>
						</span>

						<span>
							<?php esc_html_e( 'Reasonable steps', 'akaza-adventure' ); ?>
						</span>

						<span>
							<?php esc_html_e( 'Delegation and oversight', 'akaza-adventure' ); ?>
						</span>
					</div>

					<a
						class="sl-smcr-course-selection__link"
						href="#senior-managers-learning"
					>
						<?php esc_html_e( 'Explore Senior Managers Course', 'akaza-adventure' ); ?>
						<span aria-hidden="true">→</span>
					</a>

				</div>
			</article>

		</div>

	</div>
</section>