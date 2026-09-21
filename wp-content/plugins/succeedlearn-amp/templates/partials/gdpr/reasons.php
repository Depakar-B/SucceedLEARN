<?php
/**
 * GDPR Employee Awareness Training - Three reasons.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$gdpr_reasons = function_exists( 'succeedlearn_amp_get_gdpr_reasons' )
	? succeedlearn_amp_get_gdpr_reasons()
	: array();
?>

<section
	class="sl-section sl-gdpr-reasons"
	id="three-reasons"
	aria-labelledby="sl-gdpr-reasons-title"
>
	<div class="sl-wrap">
		<header class="sl-gdpr-reasons__heading">
			<span class="sl-home-sub-heading">
				<?php
				esc_html_e(
					'Same Course. Three Reasons It Lands on Your Desk',
					'succeedlearn-amp'
				);
				?>
			</span>

			<h2
				class="sl-h2"
				id="sl-gdpr-reasons-title"
			>
				<?php
				echo wp_kses(
					__(
						'Whatever you sign off, this <span>answers the part that keeps you up.</span>',
						'succeedlearn-amp'
					),
					array(
						'span' => array(),
					)
				);
				?>
			</h2>
		</header>

		<div class="sl-gdpr-reasons__grid">
			<?php foreach ( $gdpr_reasons as $reason ) : ?>
				<article class="sl-gdpr-reasons__card">
					<div class="sl-gdpr-reasons__card-top">
						<span
							class="sl-gdpr-reasons__icon-wrap"
							aria-hidden="true"
						>
							<?php if ( 'shield' === $reason['icon'] ) : ?>
								<svg
									class="sl-gdpr-reasons__icon"
									viewBox="0 0 24 24"
									focusable="false"
								>
									<path d="M12 3.5 19 6v5.5c0 4.5-2.9 7.7-7 9-4.1-1.3-7-4.5-7-9V6l7-2.5Z"></path>
									<path d="m8.8 12 2.1 2.1 4.4-4.5"></path>
								</svg>
							<?php elseif ( 'risk' === $reason['icon'] ) : ?>
								<svg
									class="sl-gdpr-reasons__icon"
									viewBox="0 0 24 24"
									focusable="false"
								>
									<path d="M4 17.5 9 12l3.2 3L20 7"></path>
									<path d="M16 7h4v4"></path>
								</svg>
							<?php else : ?>
								<svg
									class="sl-gdpr-reasons__icon"
									viewBox="0 0 24 24"
									focusable="false"
								>
									<circle cx="12" cy="7.5" r="3"></circle>
									<path d="M5.5 20c.5-3.5 2.7-5.3 6.5-5.3s6 1.8 6.5 5.3"></path>
								</svg>
							<?php endif; ?>
						</span>

						<h3 class="sl-panel-title">
							<?php echo esc_html( $reason['title'] ); ?>
						</h3>
					</div>

					<div class="sl-gdpr-reasons__card-content">
						<p>
							<?php echo esc_html( $reason['text'] ); ?>
						</p>
					</div>
				</article>
			<?php endforeach; ?>
		</div>

		<div class="sl-highlight sl-gdpr-reasons__closing">
			<p>
				<?php
				esc_html_e(
					'Three jobs. One course. One conversation with your team instead of three.',
					'succeedlearn-amp'
				);
				?>
			</p>
		</div>
	</div>
</section>