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

			<h3 class="sl-s-signs-nudges__subtitle">
				<?php esc_html_e( 'Different Messages for Different Awareness Objectives', 'akaza-adventure' ); ?>
			</h3>

			<p>
				<?php
				esc_html_e(
					'Not every security message needs to be communicated in the same way.',
					'akaza-adventure'
				);
				?>
			</p>

			<p>
				<?php
				esc_html_e(
					'S-Signs supports different types of visual reinforcement depending on what the organisation wants employees to understand or do.',
					'akaza-adventure'
				);
				?>
			</p>

		</div>

		<div class="sl-s-signs-nudges__layout">

			<div class="sl-s-signs-nudges__content">

				<div class="sl-s-signs-nudges__grid">

					<article class="sl-s-signs-nudges__card">
						<h3 class="sl-panel-title">
							<?php esc_html_e( 'Directive Security Posters', 'akaza-adventure' ); ?>
						</h3>
						<p>
							<?php
							esc_html_e(
								'Clear, instructional visual content that communicates expected employee behaviours, security responsibilities or organisational best practices.',
								'akaza-adventure'
							);
							?>
						</p>
						<p>
							<?php
							esc_html_e(
								'Directive posters are useful when the message needs to be explicit.',
								'akaza-adventure'
							);
							?>
						</p>
					</article>

					<article class="sl-s-signs-nudges__card">
						<h3 class="sl-panel-title">
							<?php esc_html_e( 'Behavioural Nudges', 'akaza-adventure' ); ?>
						</h3>
						<p>
							<?php
							esc_html_e(
								'Short visual prompts designed to encourage employees to pause and consider their behaviour before taking an action.',
								'akaza-adventure'
							);
							?>
						</p>
						<p>
							<?php
							esc_html_e(
								'Rather than explaining an entire policy, nudges keep a relevant security concept visible and encourage employees to make a more deliberate decision.',
								'akaza-adventure'
							);
							?>
						</p>
					</article>

				</div>

				<p class="sl-s-signs-nudges__closing">
					<?php
					esc_html_e(
						'Together, directive posters and behavioural nudges give organisations flexibility to combine instruction with reinforcement.',
						'akaza-adventure'
					);
					?>
				</p>

			</div>

			<div class="sl-s-signs-nudges__media">
				<img
					class="sl-s-signs-nudges__image"
					src="<?php echo esc_url( akaza_upload_url( '2026/09/S-Signs-Directive-and-Nudge-Posters.webp' ) ); ?>"
					alt="<?php esc_attr_e( 'S-Signs directive posters and behavioural nudges', 'akaza-adventure' ); ?>"
					width="800"
					height="600"
					loading="lazy"
					decoding="async"
				>
			</div>

		</div>

	</div>
</section>
