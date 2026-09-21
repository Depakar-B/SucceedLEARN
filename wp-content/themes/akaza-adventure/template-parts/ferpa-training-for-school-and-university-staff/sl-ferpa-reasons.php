<?php
/**
 * SucceedLEARN — FERPA Staff Awareness
 *
 * Section: Why Staff Training Matters
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$ferpa_reasons = array(
	array(
		'icon'  => 'shield',
		'title' => 'It answers the question staff freeze on',
		'text'  => 'Who is allowed to know this, and do I need consent first. Staff learn to recognise a legitimate educational interest, and to route anything outside it rather than deciding alone at the counter.',
	),
	array(
		'icon'  => 'people',
		'title' => 'It handles the moment rights transfer',
		'text'  => 'The shift from parent to eligible student catches people out constantly. The course makes the trigger explicit and walks through the conversation staff have to have with a parent who no longer holds the right.',
	),
	array(
		'icon'  => 'record',
		'title' => 'It gives you an institutional record',
		'text'  => 'Dated certificates and a completion report by department, which is what you produce for an accreditation review, an internal audit, or a complaint that reaches the Department of Education.',
	),
);
?>

<section
	class="sl-ferpa-reasons"
	id="why-staff-training-matters"
	aria-labelledby="sl-ferpa-reasons-title"
>
	<div class="container">

		<div class="sl-ferpa-reasons__heading">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Why Staff Training Matters', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-ferpa-reasons-title">
				<?php esc_html_e( 'Most FERPA problems start with', 'akaza-adventure' ); ?>
				<span>
					<?php esc_html_e( 'someone trying to be helpful.', 'akaza-adventure' ); ?>
				</span>
			</h2>

			<p>
				<?php esc_html_e( 'A parent calls about a grade and the student turned eighteen last month. A coach asks for eligibility details for the whole squad. A teacher posts a class list with names and scores on a shared drive. A vendor asks for a student export to configure a new system. Every one of these is a well-intentioned person making a decision they were never trained to make.', 'akaza-adventure' ); ?>
			</p>

		</div>

		<div class="sl-ferpa-reasons__grid">

			<?php foreach ( $ferpa_reasons as $reason ) : ?>

				<article class="sl-ferpa-reasons__card">

					<div class="sl-ferpa-reasons__card-top">

						<div class="sl-ferpa-reasons__icon-wrap">

							<?php if ( 'shield' === $reason['icon'] ) : ?>

								<svg
									class="sl-ferpa-reasons__icon"
									viewBox="0 0 24 24"
									aria-hidden="true"
									focusable="false"
								>
									<path
										d="M12 3.5 19 6v5.5c0 4.5-2.9 7.7-7 9-4.1-1.3-7-4.5-7-9V6l7-2.5Z"
										fill="none"
										stroke="currentColor"
										stroke-width="1.7"
										stroke-linejoin="round"
									/>
									<path
										d="m8.8 12 2.1 2.1 4.4-4.5"
										fill="none"
										stroke="currentColor"
										stroke-width="1.7"
										stroke-linecap="round"
										stroke-linejoin="round"
									/>
								</svg>

							<?php elseif ( 'people' === $reason['icon'] ) : ?>

								<svg
									class="sl-ferpa-reasons__icon"
									viewBox="0 0 24 24"
									aria-hidden="true"
									focusable="false"
								>
									<circle
										cx="9"
										cy="8"
										r="3"
										fill="none"
										stroke="currentColor"
										stroke-width="1.7"
									/>
									<path
										d="M3.8 19.5c.5-3.5 2.2-5.2 5.2-5.2s4.7 1.7 5.2 5.2"
										fill="none"
										stroke="currentColor"
										stroke-width="1.7"
										stroke-linecap="round"
									/>
									<path
										d="M15 6.5c2.1.1 3.5 1.5 3.5 3.5M17 14.5c2 .5 3.1 2 3.3 4"
										fill="none"
										stroke="currentColor"
										stroke-width="1.7"
										stroke-linecap="round"
									/>
								</svg>

							<?php else : ?>

								<svg
									class="sl-ferpa-reasons__icon"
									viewBox="0 0 24 24"
									aria-hidden="true"
									focusable="false"
								>
									<path
										d="M6 3.5h9l3 3v14H6z"
										fill="none"
										stroke="currentColor"
										stroke-width="1.7"
										stroke-linejoin="round"
									/>
									<path
										d="M15 3.5v3h3M9 11h6M9 14.5h6M9 18h4"
										fill="none"
										stroke="currentColor"
										stroke-width="1.7"
										stroke-linecap="round"
										stroke-linejoin="round"
									/>
								</svg>

							<?php endif; ?>

						</div>

						<h3 class="sl-panel-title">
							<?php echo esc_html( $reason['title'] ); ?>
						</h3>

					</div>

					<div class="sl-ferpa-reasons__card-content">

						<p>
							<?php echo esc_html( $reason['text'] ); ?>
						</p>

					</div>

				</article>

			<?php endforeach; ?>

		</div>

	</div>
</section>