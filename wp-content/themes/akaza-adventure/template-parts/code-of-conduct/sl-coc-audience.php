<?php
/**
 * Code of Conduct — Audience.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section class="sl-coc-audience" aria-labelledby="sl-coc-audience-title">
	<div class="container">

		<div class="sl-coc-audience__heading">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Audience', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-coc-audience-title">
				<?php
				echo wp_kses(
					__( 'Who Should Take Code of Conduct <span>Training?</span>', 'akaza-adventure' ),
					array( 'span' => array() )
				);
				?>
			</h2>

			<p>
				<?php esc_html_e( 'Code of Conduct training is generally relevant to employees across the organization because ethical responsibility is not limited to compliance teams.', 'akaza-adventure' ); ?>
			</p>

		</div>

		<div class="sl-coc-audience__content">

			<h3>
				<?php esc_html_e( 'Training can be assigned to:', 'akaza-adventure' ); ?>
			</h3>

			<div class="sl-coc-audience__grid">

				<article class="sl-coc-audience__card">

					<h3 class="sl-panel-title">
						<?php esc_html_e( 'Employees', 'akaza-adventure' ); ?>
					</h3>

					<p>
						<?php esc_html_e( 'Understand everyday responsibilities and expected behaviour.', 'akaza-adventure' ); ?>
					</p>

				</article>

				<article class="sl-coc-audience__card">

					<h3 class="sl-panel-title">
						<?php esc_html_e( 'Managers', 'akaza-adventure' ); ?>
					</h3>

					<p>
						<?php esc_html_e( 'Recognize concerns, respond appropriately and model ethical leadership.', 'akaza-adventure' ); ?>
					</p>

				</article>

				<article class="sl-coc-audience__card">

					<h3 class="sl-panel-title">
						<?php esc_html_e( 'Leadership', 'akaza-adventure' ); ?>
					</h3>

					<p>
						<?php esc_html_e( 'Reinforce accountability and organizational values.', 'akaza-adventure' ); ?>
					</p>

				</article>

				<article class="sl-coc-audience__card">

					<h3 class="sl-panel-title">
						<?php esc_html_e( 'New Joiners', 'akaza-adventure' ); ?>
					</h3>

					<p>
						<?php esc_html_e( 'Understand expected workplace behaviour from the beginning.', 'akaza-adventure' ); ?>
					</p>

				</article>

				<article class="sl-coc-audience__card">

					<h3 class="sl-panel-title">
						<?php esc_html_e( 'Contractors & Consultants', 'akaza-adventure' ); ?>
					</h3>

					<p>
						<?php esc_html_e( 'Understand applicable organizational expectations.', 'akaza-adventure' ); ?>
					</p>

				</article>

				<article class="sl-coc-audience__card">

					<h3 class="sl-panel-title">
						<?php esc_html_e( 'Third Parties', 'akaza-adventure' ); ?>
					</h3>

					<p>
						<?php esc_html_e( 'Where appropriate, communicate standards expected when representing or working with the organization.', 'akaza-adventure' ); ?>
					</p>

				</article>

			</div>

		</div>

	</div>
</section>