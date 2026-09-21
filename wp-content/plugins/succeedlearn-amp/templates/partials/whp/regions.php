<?php
/**
 * Workplace Harassment Prevention AMP — Training by Region.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$harassment_regions = array(
	array(
		'number' => '01',
		'text'   => __( 'Global and multinational workforces.', 'succeedlearn-amp' ),
	),
	array(
		'number' => '02',
		'text'   => __( 'Employees and supervisors in the United States.', 'succeedlearn-amp' ),
	),
	array(
		'number' => '03',
		'text'   => __( 'Workers in the United Kingdom.', 'succeedlearn-amp' ),
	),
	array(
		'number' => '04',
		'text'   => __( 'Employees, managers and Internal Committee members in India.', 'succeedlearn-amp' ),
	),
);
?>
<section
	class="sl-section sl-harassment-regions"
	id="training-by-region"
	aria-labelledby="sl-harassment-regions-title"
>
	<div class="sl-wrap">
		<header class="sl-harassment-regions__heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Training Designed Around Your Workforce', 'succeedlearn-amp' ); ?>
			</span>
			<h2 id="sl-harassment-regions-title" class="sl-h2">
				<?php
				echo wp_kses_post(
					__( 'Choose from dedicated training <span>solutions for every region.</span>', 'succeedlearn-amp' )
				);
				?>
			</h2>
		</header>

		<div class="sl-harassment-regions__grid">
			<?php foreach ( $harassment_regions as $region ) : ?>
				<article class="sl-harassment-regions__card">
					<span class="sl-harassment-regions__number"><?php echo esc_html( $region['number'] ); ?></span>
					<p class="sl-harassment-regions__text"><?php echo esc_html( $region['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>

		<div class="sl-harassment-regions__footer">
			<div class="sl-harassment-regions__message">
				<p>
					<?php
					esc_html_e(
						'Build awareness. Clarify responsibilities. Help your people make informed choices when difficult workplace situations arise.',
						'succeedlearn-amp'
					);
					?>
				</p>
			</div>

			<button
				type="button"
				class="sl-btn sl-btn--primary sl-harassment-regions__cta"
				data-cta="regions-request-demo"
				<?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			>
				<?php esc_html_e( 'Request a Demo', 'succeedlearn-amp' ); ?>
				<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
					<path d="M5 12h13M13 6l6 6-6 6" />
				</svg>
			</button>
		</div>
	</div>
</section>
