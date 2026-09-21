<?php
/**
 * DPDPA Compliance Training AMP - How the course is taught.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section
	class="sl-section sl-dpdpa-learning"
	aria-labelledby="sl-dpdpa-learning-title"
>
	<div class="sl-wrap">

		<header class="sl-dpdpa-learning__heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( "How It's Actually Taught", 'succeedlearn-amp' ); ?>
			</span>

			<h2
				id="sl-dpdpa-learning-title"
				class="sl-h2"
			>
				<?php esc_html_e( 'Not a PDF with a quiz ', 'succeedlearn-amp' ); ?>

				<span>
					<?php esc_html_e( 'stapled to the end.', 'succeedlearn-amp' ); ?>
				</span>
			</h2>

			<div class="sl-dpdpa-learning__intro">
				<p class="sl-lead">
					<?php
					esc_html_e(
						'Most compliance courses hand you a definition and move on. This one makes you do something with it first, which is why people finish it and remember it.',
						'succeedlearn-amp'
					);
					?>
				</p>
			</div>
		</header>

		<article class="sl-dpdpa-learning__row">
			<div class="sl-dpdpa-learning__content">
				<span class="sl-dpdpa-learning__label">
					<?php esc_html_e( 'Module 01', 'succeedlearn-amp' ); ?>
				</span>

				<h3 class="sl-panel-title">
					<?php
					esc_html_e(
						'Terms you open, not paragraphs you scroll past',
						'succeedlearn-amp'
					);
					?>
				</h3>

				<p>
					<?php
					esc_html_e(
						'Personal data, Data Fiduciary, Data Principal, Data Processor. Each one is a tile the learner clicks open, with a real workplace example behind it instead of a dictionary definition.',
						'succeedlearn-amp'
					);
					?>
				</p>
			</div>

			<div class="sl-dpdpa-learning__media">
				<div
					class="sl-dpdpa-learning__image-placeholder"
					role="img"
					aria-label="<?php esc_attr_e( 'Interactive DPDPA terminology module image placeholder', 'succeedlearn-amp' ); ?>"
				>
					<span>
						<?php esc_html_e( 'Image placeholder', 'succeedlearn-amp' ); ?>
					</span>
				</div>

				<span class="sl-dpdpa-learning__caption">
					<?php
					esc_html_e(
						'A view, opened, not just read',
						'succeedlearn-amp'
					);
					?>
				</span>
			</div>
		</article>

		<div
			class="sl-dpdpa-learning__divider"
			aria-hidden="true"
		></div>

		<article class="sl-dpdpa-learning__row">
			<div class="sl-dpdpa-learning__content">
				<span class="sl-dpdpa-learning__label">
					<?php esc_html_e( 'Throughout the Course', 'succeedlearn-amp' ); ?>
				</span>

				<h3 class="sl-panel-title">
					<?php
					esc_html_e(
						'Decisions, not multiple choice',
						'succeedlearn-amp'
					);
					?>
				</h3>

				<p>
					<?php
					esc_html_e(
						'Is this personal data or not? Learners sort it themselves and find out immediately whether they were right. The same pattern runs through the rights request in module 09 and the breach report in module 11.',
						'succeedlearn-amp'
					);
					?>
				</p>
			</div>

			<div class="sl-dpdpa-learning__media">
				<div
					class="sl-dpdpa-learning__image-placeholder"
					role="img"
					aria-label="<?php esc_attr_e( 'Interactive DPDPA learning activity image placeholder', 'succeedlearn-amp' ); ?>"
				>
					<span>
						<?php esc_html_e( 'Image placeholder', 'succeedlearn-amp' ); ?>
					</span>
				</div>

				<span class="sl-dpdpa-learning__caption">
					<?php
					esc_html_e(
						'Something to do, not just watch',
						'succeedlearn-amp'
					);
					?>
				</span>
			</div>
		</article>

	</div>
</section>