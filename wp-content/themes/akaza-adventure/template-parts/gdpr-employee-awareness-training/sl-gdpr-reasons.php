<?php
/**
 * SucceedLEARN — GDPR Employee Awareness
 *
 * Section: Three Reasons It Lands on Your Desk
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$gdpr_reasons = array(
	array(
		'icon'  => 'shield',
		'title' => 'If you own accountability',
		'text'  => 'Show, not just say, that staff are trained. Every learner gets a dated certificate and a completion record, ready to export the moment someone asks.',
	),
	array(
		'icon'  => 'risk',
		'title' => 'If you own the risk',
		'text'  => 'Controls stop technical failures. They cannot stop a well meaning person sending data to the wrong recipient. This course targets that exposure directly.',
	),
	array(
		'icon'  => 'people',
		'title' => 'If you own the rollout',
		'text'  => 'Thirty minutes, scenario led, written for every function. Certificates and dashboards make completion visible without adding to your workload.',
	),
);
?>

<section
	class="sl-gdpr-reasons"
	id="three-reasons"
	aria-labelledby="sl-gdpr-reasons-title"
>

	<div class="container">

		<div class="sl-gdpr-reasons__heading">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Same Course. Three Reasons It Lands On Your Desk', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-gdpr-reasons-title">
				<?php esc_html_e( 'Whatever you sign off, this', 'akaza-adventure' ); ?>
				<span>
					<?php esc_html_e( 'answers the part that keeps you up.', 'akaza-adventure' ); ?>
				</span>
			</h2>

		</div>


		<div class="sl-gdpr-reasons__grid">

			<?php foreach ( $gdpr_reasons as $reason ) : ?>

				<article class="sl-gdpr-reasons__card">

					<div class="sl-gdpr-reasons__card-top">

						<div class="sl-gdpr-reasons__icon-wrap">

							<?php if ( 'shield' === $reason['icon'] ) : ?>

								<svg
									class="sl-gdpr-reasons__icon"
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

							<?php elseif ( 'risk' === $reason['icon'] ) : ?>

								<svg
									class="sl-gdpr-reasons__icon"
									viewBox="0 0 24 24"
									aria-hidden="true"
									focusable="false"
								>
									<path
										d="M4 17.5 9 12l3.2 3 7.8-8"
										fill="none"
										stroke="currentColor"
										stroke-width="1.7"
										stroke-linecap="round"
										stroke-linejoin="round"
									/>
									<path
										d="M16 7h4v4"
										fill="none"
										stroke="currentColor"
										stroke-width="1.7"
										stroke-linecap="round"
										stroke-linejoin="round"
									/>
								</svg>

							<?php else : ?>

								<svg
									class="sl-gdpr-reasons__icon"
									viewBox="0 0 24 24"
									aria-hidden="true"
									focusable="false"
								>
									<circle
										cx="12"
										cy="7.5"
										r="3"
										fill="none"
										stroke="currentColor"
										stroke-width="1.7"
									/>
									<path
										d="M5.5 20c.5-3.5 2.7-5.3 6.5-5.3s6 1.8 6.5 5.3"
										fill="none"
										stroke="currentColor"
										stroke-width="1.7"
										stroke-linecap="round"
									/>
								</svg>

							<?php endif; ?>

						</div>

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


		<div class="sl-gdpr-reasons__closing">

			<span class="sl-gdpr-reasons__closing-line" aria-hidden="true"></span>

			<p>
				<?php
				esc_html_e(
					'Three jobs. One course. One conversation with your team instead of three.',
					'akaza-adventure'
				);
				?>
			</p>

			<span class="sl-gdpr-reasons__closing-line" aria-hidden="true"></span>

		</div>

	</div>

</section>