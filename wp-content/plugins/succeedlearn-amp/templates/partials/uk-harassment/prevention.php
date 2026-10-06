<?php
/**
 * AMP partial — UK Sexual Harassment Prevention Training — preventive approach.
 *
 * Expected vars: $prevention_points
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( empty( $prevention_points ) || ! is_array( $prevention_points ) ) {
	$prevention_points = function_exists( 'succeedlearn_amp_get_uk_harassment_prevention_points' )
		? succeedlearn_amp_get_uk_harassment_prevention_points()
		: array();
}

$images           = function_exists( 'succeedlearn_amp_get_uk_harassment_images' )
	? succeedlearn_amp_get_uk_harassment_images()
	: array();
$prevention_image = isset( $images['prevention'] ) ? $images['prevention'] : '';
?>
<section
	id="preventive-approach"
	class="sl-section sl-uk-harassment-prevention"
	aria-labelledby="sl-uk-harassment-prevention-title"
>
	<div class="sl-wrap">

		<div class="sl-uk-harassment-prevention__intro">
			<span class="sl-uk-harassment-prevention__intro-span">
				<?php esc_html_e( 'Prevention is no longer only good practice - it is an active legal responsibility.', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-uk-harassment-prevention-title" class="sl-h2">
				<?php esc_html_e( 'Support Your', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'Preventive Approach', 'succeedlearn-amp' ); ?></span>
			</h2>

			<p>
				<?php esc_html_e( 'Since 26 October 2024, the Worker Protection (Amendment of Equality Act 2010) Act 2023 has required UK employers to take reasonable steps to prevent sexual harassment of their workers, including harassment involving third parties such as customers and clients.', 'succeedlearn-amp' ); ?>
			</p>
			<p>
				<?php esc_html_e( 'The duty is proactive. Employers are expected to consider workplace risks and introduce appropriate preventive measures rather than waiting for an incident to occur. From 30 October 2026, this requirement will become stronger: employers will need to demonstrate that they have taken all reasonable steps to prevent sexual harassment. Failure to meet the duty may lead to enforcement action by the Equality and Human Rights Commission and increased compensation following a successful Employment Tribunal claim.', 'succeedlearn-amp' ); ?>
			</p>
		</div>

		<div class="sl-uk-harassment-prevention__grid">

			<div class="sl-uk-harassment-prevention__content">
				<h3 class="sl-panel-title">
					<?php esc_html_e( "Relevant, regularly reviewed training can support an organisation's preventive measures by:", 'succeedlearn-amp' ); ?>
				</h3>

				<ul class="sl-uk-harassment-numbered-list">
					<?php foreach ( $prevention_points as $point ) : ?>
						<li class="sl-uk-harassment-numbered-list__item">
							<span class="sl-uk-harassment-numbered-list__text">
								<?php echo esc_html( $point ); ?>
							</span>
						</li>
					<?php endforeach; ?>
				</ul>

				<p>
					<?php esc_html_e( 'Training should be supported by risk assessment, effective policies, accessible reporting routes and appropriate action when concerns arise.', 'succeedlearn-amp' ); ?>
				</p>

				<div class="sl-hero-actions">
					<button
						type="button"
						class="sl-hero-btn sl-hero-btn-primary"
						data-cta="uk-harassment-prevention-discuss"
						<?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					>
						<?php esc_html_e( 'Discuss Your Training Requirements', 'succeedlearn-amp' ); ?>
						<span aria-hidden="true">→</span>
					</button>
				</div>
			</div>

			<div class="sl-uk-harassment-prevention__media">
				<?php if ( $prevention_image ) : ?>
					<div class="sl-uk-harassment-prevention__image">
						<amp-img
							src="<?php echo esc_url( $prevention_image ); ?>"
							width="560"
							height="420"
							layout="responsive"
							alt="<?php esc_attr_e( 'UK workplace law context covering the Equality Act and Worker Protection Act.', 'succeedlearn-amp' ); ?>"
						></amp-img>
					</div>
				<?php endif; ?>
			</div>

		</div>

	</div>
</section>
