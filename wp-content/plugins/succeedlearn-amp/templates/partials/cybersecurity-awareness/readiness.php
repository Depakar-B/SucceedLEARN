<?php
/**
 * Cybersecurity Awareness Month AMP - Readiness section.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$readiness_cards = succeedlearn_amp_cybersecurity_awareness_readiness_cards();
?>

<section
	class="sl-section sl-cyber-awareness-readiness"
	aria-labelledby="sl-cyber-awareness-readiness-title"
>
	<div class="sl-wrap">
		<div class="sl-cyber-awareness-readiness__heading">
			<span class="sl-eyebrow sl-home-sub-heading">
				<?php esc_html_e( 'The Human Side of Cyber Risk', 'succeedlearn-amp' ); ?>
			</span>

			<h2
				id="sl-cyber-awareness-readiness-title"
				class="sl-h2"
			>
				<?php esc_html_e( 'Would your employees identify, resist and report ', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'a real attack?', 'succeedlearn-amp' ); ?></span>
			</h2>

			<p class="sl-lead">
				<?php
				esc_html_e(
					'Cybercriminals do not always need to defeat your security systems. Sometimes, they only need one employee to click a link, open an attachment, scan a QR code or respond to a convincing request.',
					'succeedlearn-amp'
				);
				?>
			</p>

			<p class="sl-lead">
				<?php
				esc_html_e(
					'Traditional awareness training often ends when employees complete a course. ',
					'succeedlearn-amp'
				);
				?>
				<strong>
					<?php
					esc_html_e(
						'But completion alone does not demonstrate readiness.',
						'succeedlearn-amp'
					);
					?>
				</strong>
			</p>
		</div>

		<div class="sl-cyber-awareness-readiness__grid">
			<?php foreach ( $readiness_cards as $card ) : ?>
				<article class="sl-cyber-awareness-readiness__card">
					<span
						class="sl-cyber-awareness-readiness__number"
						aria-hidden="true"
					>
						<?php echo esc_html( $card['number'] ); ?>
					</span>

					<div
						class="sl-cyber-awareness-readiness__icon"
						aria-hidden="true"
					>
						<?php if ( 'learn' === $card['icon'] ) : ?>
							<svg viewBox="0 0 24 24" focusable="false">
								<path d="M5 4.5h9a3 3 0 0 1 3 3v12H8a3 3 0 0 1-3-3z" />
								<path d="M8 19.5h11v-12a3 3 0 0 0-3-3h-1" />
								<path d="M9 9h5M9 12h5M9 15h3" />
								<path d="m16 14 1.5 1.5L21 12" />
							</svg>
						<?php elseif ( 'test' === $card['icon'] ) : ?>
							<svg viewBox="0 0 24 24" focusable="false">
								<circle cx="12" cy="12" r="8.5" />
								<circle cx="12" cy="12" r="4.5" />
								<circle cx="12" cy="12" r="1.5" />
							</svg>
						<?php elseif ( 'report' === $card['icon'] ) : ?>
							<svg viewBox="0 0 24 24" focusable="false">
								<path d="M3.5 5.5h17v13h-17z" />
								<path d="m4.5 7 7.5 6 7.5-6" />
								<path d="M15.5 17.5 18 20l3-3.5" />
							</svg>
						<?php endif; ?>
					</div>

					<div class="sl-cyber-awareness-readiness__content">
						<h3><?php echo esc_html( $card['title'] ); ?></h3>
						<p><?php echo esc_html( $card['text'] ); ?></p>
					</div>

					<div class="sl-cyber-awareness-readiness__footer">
						<span><?php echo esc_html( $card['footer'] ); ?></span>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>