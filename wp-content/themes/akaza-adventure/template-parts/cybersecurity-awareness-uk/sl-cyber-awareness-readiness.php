<?php
/**
 * SucceedLEARN — Cybersecurity Awareness Readiness Section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section
	class="sl-cyber-awareness-readiness"
	aria-labelledby="sl-cyber-awareness-readiness-title"
>
	<div class="container">

		<div class="sl-cyber-awareness-readiness__heading">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'The Human Side of Cyber Risk', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-cyber-awareness-readiness-title">
				<?php
				echo wp_kses(
					__( 'Would your employees identify, resist and report <span>a real attack?</span>', 'akaza-adventure' ),
					array( 'span' => array() )
				);
				?>
			</h2>

			<p>
				<?php esc_html_e( 'Cyber criminals do not always need to defeat your security systems. Sometimes, they only need one employee to click a link, open an attachment, scan a QR code or respond to a convincing request.', 'akaza-adventure' ); ?>
			</p>

			<p>
				<?php esc_html_e( 'Traditional awareness training often ends when employees complete a course. ', 'akaza-adventure' ); ?>
				<strong>
					<?php esc_html_e( 'But completion alone does not demonstrate readiness.', 'akaza-adventure' ); ?>
				</strong>
			</p>

		</div>

		<div class="sl-cyber-awareness-readiness__grid">

			<article class="sl-cyber-awareness-readiness__card">

				<span class="sl-cyber-awareness-readiness__number" aria-hidden="true">
					01
				</span>

				<div class="sl-cyber-awareness-readiness__icon" aria-hidden="true">
					<svg viewBox="0 0 24 24" focusable="false">
						<path d="M5 4.5h9a3 3 0 0 1 3 3v12H8a3 3 0 0 1-3-3z" />
						<path d="M8 19.5h11v-12a3 3 0 0 0-3-3h-1" />
						<path d="M9 9h5M9 12h5M9 15h3" />
						<path d="m16 14 1.5 1.5L21 12" />
					</svg>
				</div>

				<div class="sl-cyber-awareness-readiness__content">
					<h3>
						<?php esc_html_e( 'Learn', 'akaza-adventure' ); ?>
					</h3>

					<p>
						<?php esc_html_e( 'Build practical cyber security knowledge employees can use every day.', 'akaza-adventure' ); ?>
					</p>
				</div>

				<div class="sl-cyber-awareness-readiness__footer">
					<span>
						<?php esc_html_e( 'Build awareness', 'akaza-adventure' ); ?>
					</span>
				</div>

			</article>

			<article class="sl-cyber-awareness-readiness__card">

				<span class="sl-cyber-awareness-readiness__number" aria-hidden="true">
					02
				</span>

				<div class="sl-cyber-awareness-readiness__icon" aria-hidden="true">
					<svg viewBox="0 0 24 24" focusable="false">
						<circle cx="12" cy="12" r="8.5" />
						<circle cx="12" cy="12" r="4.5" />
						<circle cx="12" cy="12" r="1.5" />
					</svg>
				</div>

				<div class="sl-cyber-awareness-readiness__content">
					<h3>
						<?php esc_html_e( 'Test', 'akaza-adventure' ); ?>
					</h3>

					<p>
						<?php esc_html_e( 'Measure employee responses through realistic, approved phishing simulations.', 'akaza-adventure' ); ?>
					</p>
				</div>

				<div class="sl-cyber-awareness-readiness__footer">
					<span>
						<?php esc_html_e( 'Test readiness', 'akaza-adventure' ); ?>
					</span>
				</div>

			</article>

			<article class="sl-cyber-awareness-readiness__card">

				<span class="sl-cyber-awareness-readiness__number" aria-hidden="true">
					03
				</span>

				<div class="sl-cyber-awareness-readiness__icon" aria-hidden="true">
					<svg viewBox="0 0 24 24" focusable="false">
						<path d="M3.5 5.5h17v13h-17z" />
						<path d="m4.5 7 7.5 6 7.5-6" />
						<path d="M15.5 17.5 18 20l3-3.5" />
					</svg>
				</div>

				<div class="sl-cyber-awareness-readiness__content">
					<h3>
						<?php esc_html_e( 'Report', 'akaza-adventure' ); ?>
					</h3>

					<p>
						<?php esc_html_e( 'Help employees report suspicious emails easily using PhishCue.', 'akaza-adventure' ); ?>
					</p>
				</div>

				<div class="sl-cyber-awareness-readiness__footer">
					<span>
						<?php esc_html_e( 'Enable reporting', 'akaza-adventure' ); ?>
					</span>
				</div>

			</article>

		</div>

	</div>
</section>