<?php
/**
 * Code of Conduct — Buyer Personas.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section class="sl-coc-buyer-personas" aria-labelledby="sl-coc-buyer-personas-title">
	<div class="container">

		<div class="sl-coc-buyer-personas__heading">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Buyer Personas', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-coc-buyer-personas-title">
				<?php
				echo wp_kses(
					__( 'One Programme. Value Across the <span>Organization.</span>', 'akaza-adventure' ),
					array( 'span' => array() )
				);
				?>
			</h2>

		</div>

		<div class="sl-coc-buyer-personas__layout">

			<div class="sl-coc-buyer-personas__visual">

				<img
					src="<?php echo esc_url( get_theme_file_uri( '/assets/images/code-of-conduct/buyer-personas.jpg' ) ); ?>"
					alt="<?php esc_attr_e( 'Professionals collaborating in a workplace meeting', 'akaza-adventure' ); ?>"
					loading="lazy"
				>

			</div>

			<div class="sl-coc-buyer-personas__cards">

				<article class="sl-coc-buyer-personas__card">

					<h3 class="sl-panel-title">
						<?php esc_html_e( 'For HR Leaders', 'akaza-adventure' ); ?>
					</h3>

					<p>
						<?php esc_html_e( 'Build consistent understanding of workplace behaviour, organizational values and employee responsibilities.', 'akaza-adventure' ); ?>
					</p>

				</article>

				<article class="sl-coc-buyer-personas__card">

					<h3 class="sl-panel-title">
						<?php esc_html_e( 'For Compliance Teams', 'akaza-adventure' ); ?>
					</h3>

					<p>
						<?php esc_html_e( 'Strengthen policy awareness, improve reporting visibility and maintain evidence of employee training.', 'akaza-adventure' ); ?>
					</p>

				</article>

				<article class="sl-coc-buyer-personas__card">

					<h3 class="sl-panel-title">
						<?php esc_html_e( 'For Learning & Development', 'akaza-adventure' ); ?>
					</h3>

					<p>
						<?php esc_html_e( 'Deliver interactive corporate compliance training that is easier for employees to understand and remember.', 'akaza-adventure' ); ?>
					</p>

				</article>

				<article class="sl-coc-buyer-personas__card">

					<h3 class="sl-panel-title">
						<?php esc_html_e( 'For Business Leaders', 'akaza-adventure' ); ?>
					</h3>

					<p>
						<?php esc_html_e( 'Build a stronger ethical culture while reducing behavioural, compliance and reputational risk.', 'akaza-adventure' ); ?>
					</p>

				</article>

				<article class="sl-coc-buyer-personas__card">

					<h3 class="sl-panel-title">
						<?php esc_html_e( 'For Employees', 'akaza-adventure' ); ?>
					</h3>

					<p>
						<?php esc_html_e( 'Understand what the Code means in practical situations and gain confidence to make responsible decisions.', 'akaza-adventure' ); ?>
					</p>

				</article>

			</div>

		</div>

	</div>
</section>