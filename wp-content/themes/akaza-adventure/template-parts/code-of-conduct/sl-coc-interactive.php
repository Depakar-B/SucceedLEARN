<?php
/**
 * Code of Conduct — Interactive Experience.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section class="sl-coc-interactive" aria-labelledby="sl-coc-interactive-title">
	<div class="container">

		<div class="sl-coc-interactive__heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Interactive Experience', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-coc-interactive-title">
				<?php
				echo wp_kses(
					sprintf(
						/* translators: %s: accent phrase. */
						__( 'Experience Scenario-Based <span>Code of Conduct Training</span>', 'akaza-adventure' )
					),
					array( 'span' => array() )
				);
				?>
			</h2>

			<p>
				<?php esc_html_e( 'Employees learn differently when they participate rather than simply read. SucceedLEARN uses realistic workplace scenarios to place employees inside situations they could genuinely encounter, helping them practise ethical judgement in context.', 'akaza-adventure' ); ?>
			</p>
		</div>

		<div class="sl-coc-interactive__grid">

			<article class="sl-coc-interactive__card">
				<div class="sl-coc-interactive__card-head">
					<span class="sl-coc-interactive__number">01</span>
					<h3 class="sl-panel-title">
						<?php esc_html_e( 'Conflict of Interest', 'akaza-adventure' ); ?>
					</h3>
				</div>

				<div class="sl-coc-interactive__card-content">
					<strong>
						<?php esc_html_e( 'The Situation', 'akaza-adventure' ); ?>
					</strong>

					<p>
						<?php esc_html_e( 'Your team is evaluating three vendors. One of the vendors is owned by a close relative.', 'akaza-adventure' ); ?>
					</p>

					<strong>
						<?php esc_html_e( 'What should you do?', 'akaza-adventure' ); ?>
					</strong>

					<p>
						<?php esc_html_e( 'The learner makes a decision and receives immediate feedback explaining the ethical considerations involved.', 'akaza-adventure' ); ?>
					</p>
				</div>
			</article>

			<article class="sl-coc-interactive__card">
				<div class="sl-coc-interactive__card-head">
					<span class="sl-coc-interactive__number">02</span>
					<h3 class="sl-panel-title">
						<?php esc_html_e( 'Confidentiality', 'akaza-adventure' ); ?>
					</h3>
				</div>

				<div class="sl-coc-interactive__card-content">
					<strong>
						<?php esc_html_e( 'The Situation', 'akaza-adventure' ); ?>
					</strong>

					<p>
						<?php esc_html_e( 'An employee receives a confidential presentation before travelling.', 'akaza-adventure' ); ?>
					</p>

					<strong>
						<?php esc_html_e( 'Would it be appropriate?', 'akaza-adventure' ); ?>
					</strong>

					<p>
						<?php esc_html_e( 'Would it be appropriate to review the presentation in a crowded airport lounge?', 'akaza-adventure' ); ?>
					</p>
				</div>
			</article>

			<article class="sl-coc-interactive__card">
				<div class="sl-coc-interactive__card-head">
					<span class="sl-coc-interactive__number">03</span>
					<h3 class="sl-panel-title">
						<?php esc_html_e( 'Speak Up', 'akaza-adventure' ); ?>
					</h3>
				</div>

				<div class="sl-coc-interactive__card-content">
					<strong>
						<?php esc_html_e( 'The Situation', 'akaza-adventure' ); ?>
					</strong>

					<p>
						<?php esc_html_e( 'You notice behaviour that appears inconsistent with the Code, but you are not certain a violation has occurred.', 'akaza-adventure' ); ?>
					</p>

					<strong>
						<?php esc_html_e( 'Should you report the concern?', 'akaza-adventure' ); ?>
					</strong>

					<p>
						<?php esc_html_e( 'The learner considers the situation and develops confidence in recognising when an ethical concern should be raised.', 'akaza-adventure' ); ?>
					</p>
				</div>
			</article>

		</div>

		<div class="sl-coc-section-close">
			<p class="sl-coc-section-close__text">
				<?php
				echo wp_kses(
					__( 'These scenarios help employees develop <strong>ethical judgement</strong>, not simply recall policy statements.', 'akaza-adventure' ),
					array( 'strong' => array() )
				);
				?>
			</p>
		</div>

	</div>
</section>

