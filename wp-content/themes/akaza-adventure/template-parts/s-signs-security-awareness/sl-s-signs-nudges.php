<?php
/**
 * S-Signs — Directive Posters & Behavioural Nudges.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section
	class="sl-s-signs-nudges"
	aria-labelledby="sl-s-signs-nudges-title"
>
	<div class="container">

		<div class="sl-s-signs-nudges__intro">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Two Communication Styles', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-s-signs-nudges-title">
				<?php esc_html_e( 'Directive Posters &', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Behavioural Nudges', 'akaza-adventure' ); ?></span>
			</h2>

			<p>
				<?php
				esc_html_e(
					'Different awareness objectives require different styles of communication.',
					'akaza-adventure'
				);
				?>
			</p>

			<p>
				<?php
				esc_html_e(
					'S-Signs includes both directive security posters and behavioural nudges, allowing organisations to reinforce security awareness using a variety of visual approaches.',
					'akaza-adventure'
				);
				?>
			</p>

		</div>

		<div class="sl-s-signs-nudges__grid">

			<article class="sl-s-signs-nudges__card">
				<span class="sl-s-signs-nudges__number" aria-hidden="true">01</span>
				<h3 class="sl-panel-title">
					<?php esc_html_e( 'Directive Posters', 'akaza-adventure' ); ?>
				</h3>
				<p>
					<?php
					esc_html_e(
						'Clear instructional posters that communicate expected employee behaviours, security responsibilities, and organisational best practices in a simple, easy-to-understand format.',
						'akaza-adventure'
					);
					?>
				</p>
			</article>

			<article class="sl-s-signs-nudges__card">
				<span class="sl-s-signs-nudges__number" aria-hidden="true">02</span>
				<h3 class="sl-panel-title">
					<?php esc_html_e( 'Behavioural Nudges', 'akaza-adventure' ); ?>
				</h3>
				<p>
					<?php
					esc_html_e(
						'Subtle visual reminders designed to influence everyday employee behaviour without disrupting productivity.',
						'akaza-adventure'
					);
					?>
				</p>
				<p>
					<?php
					esc_html_e(
						'These posters encourage employees to pause, think, and make secure decisions before performing routine workplace activities.',
						'akaza-adventure'
					);
					?>
				</p>
				<p>
					<?php
					esc_html_e(
						'Behavioural nudges help reinforce positive security habits through regular visual exposure rather than lengthy instructional content.',
						'akaza-adventure'
					);
					?>
				</p>
			</article>

		</div>

	</div>
</section>
