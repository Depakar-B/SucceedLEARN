<?php
/**
 * Infosec Cybersecurity Awareness Month 2026 AMP - Simulation insights.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$simulation_insights = succeedlearn_amp_infosec_simulation_insights();
?>

<section
	class="sl-section sl-infosec-2026-understand"
	aria-labelledby="sl-infosec-2026-understand-title"
>
	<div class="sl-wrap">
		<div class="sl-infosec-2026-understand__grid">
			<div class="sl-infosec-2026-understand__content">
				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'What You Can Measure', 'succeedlearn-amp' ); ?>
				</span>

				<h2
					id="sl-infosec-2026-understand-title"
					class="sl-h2"
				>
					<?php
					echo wp_kses_post(
						__(
							'What Can the Simulation <span>Help You Understand?</span>',
							'succeedlearn-amp'
						)
					);
					?>
				</h2>

				<ul class="sl-list sl-infosec-2026-understand__list">
					<?php foreach ( $simulation_insights as $insight ) : ?>
						<li class="sl-list-item sl-infosec-2026-understand__item">
							<div class="sl-infosec-2026-understand__item-content">
								<h3 class="sl-panel-title">
									<?php echo esc_html( $insight['title'] ); ?>
								</h3>

								<p class="sl-list-item__text">
									<?php echo esc_html( $insight['text'] ); ?>
								</p>
							</div>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>

			<div class="sl-infosec-2026-understand__media">
				<div class="sl-infosec-2026-understand__image">
					<amp-img
						src="<?php echo esc_url( succeedlearn_amp_get_infosec_understand_image() ); ?>"
						width="700"
						height="650"
						layout="responsive"
						alt="<?php esc_attr_e( 'What the phishing simulation helps you understand', 'succeedlearn-amp' ); ?>"
					></amp-img>
				</div>
			</div>
		</div>
	</div>
</section>