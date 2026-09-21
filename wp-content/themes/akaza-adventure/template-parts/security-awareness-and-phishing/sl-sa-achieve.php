<?php
/**
 * Security Awareness — What Can Your Organization Achieve?
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$sa_outcomes = array(
	array(
		'icon' => 'shield',
		'text' => __( 'Building stronger employee understanding of cybersecurity risks.', 'akaza-adventure' ),
	),
	array(
		'icon' => 'mail',
		'text' => __( 'Improving employees\' ability to recognise and respond to phishing and social engineering attempts.', 'akaza-adventure' ),
	),
	array(
		'icon' => 'refresh',
		'text' => __( 'Reinforcing secure behaviours throughout the year.', 'akaza-adventure' ),
	),
	array(
		'icon' => 'chart',
		'text' => __( 'Identifying areas of potential human cyber risk through measurable data.', 'akaza-adventure' ),
	),
	array(
		'icon' => 'target',
		'text' => __( 'Delivering targeted interventions where additional support is required.', 'akaza-adventure' ),
	),
	array(
		'icon' => 'eye',
		'text' => __( 'Creating greater visibility for security, compliance and leadership teams.', 'akaza-adventure' ),
	),
	array(
		'icon' => 'clipboard',
		'text' => __( 'Supporting security awareness and regulatory compliance initiatives.', 'akaza-adventure' ),
	),
	array(
		'icon' => 'users',
		'text' => __( 'Building a culture in which employees understand their role in protecting organisational information.', 'akaza-adventure' ),
	),
);

/**
 * Inline SVG icons for achieve cards.
 *
 * @param string $icon Icon key.
 * @return void
 */
$sl_sa_achieve_render_icon = static function ( $icon ) {
	$paths = array(
		'shield'    => '<path d="M12 3l7 3v5c0 4.5-2.9 7.8-7 10-4.1-2.2-7-5.5-7-10V6l7-3z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/><path d="M9.5 12.2l1.7 1.7 3.5-3.8" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>',
		'mail'      => '<rect x="3.5" y="5.5" width="17" height="13" rx="2" stroke="currentColor" stroke-width="1.7"/><path d="M4.5 7.5L12 13l7.5-5.5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>',
		'refresh'   => '<path d="M19.5 12a7.5 7.5 0 1 1-2.2-5.3" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/><path d="M19.5 4.5v5h-5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>',
		'chart'     => '<path d="M4.5 19.5h15" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/><path d="M7 16.5V11M12 16.5V7.5M17 16.5v-5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/>',
		'target'    => '<circle cx="12" cy="12" r="7.5" stroke="currentColor" stroke-width="1.7"/><circle cx="12" cy="12" r="3.2" stroke="currentColor" stroke-width="1.7"/><path d="M12 4.5V7M12 17v2.5M4.5 12H7M17 12h2.5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/>',
		'eye'       => '<path d="M2.8 12s3.2-6 9.2-6 9.2 6 9.2 6-3.2 6-9.2 6-9.2-6-9.2-6z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/><circle cx="12" cy="12" r="2.6" stroke="currentColor" stroke-width="1.7"/>',
		'clipboard' => '<rect x="6.5" y="4.5" width="11" height="15.5" rx="2" stroke="currentColor" stroke-width="1.7"/><path d="M9 4.5h6v2.2H9V4.5z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/><path d="M9.5 11.5h5M9.5 14.5h3.5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/>',
		'users'     => '<circle cx="9" cy="9" r="2.6" stroke="currentColor" stroke-width="1.7"/><circle cx="16.2" cy="10" r="2.1" stroke="currentColor" stroke-width="1.7"/><path d="M4.5 18.5c.6-2.6 2.6-4 4.5-4s3.9 1.4 4.5 4M14.2 14.8c1.5.2 2.9 1.2 3.5 3.2" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/>',
	);

	$markup = isset( $paths[ $icon ] ) ? $paths[ $icon ] : $paths['shield'];
	?>
	<span class="sl-sa-achieve__icon" aria-hidden="true">
		<svg viewBox="0 0 24 24" fill="none" focusable="false" xmlns="http://www.w3.org/2000/svg">
			<?php
			// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG path markup.
			echo $markup;
			?>
		</svg>
	</span>
	<?php
};
?>

<section
	class="sl-sa-achieve"
	id="what-can-your-organization-achieve"
	aria-labelledby="sl-sa-achieve-title"
>
	<div class="container">

		<div class="sl-sa-achieve__intro">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Measurable Security Behaviour Change', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-sa-achieve-title">
				<?php esc_html_e( 'What Can Your Organization', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Achieve?', 'akaza-adventure' ); ?></span>
			</h2>

			<p>
				<?php esc_html_e( 'The objective of security awareness should extend beyond training completion, with an integrated behaviour and culture programme, organisations can work towards:', 'akaza-adventure' ); ?>
			</p>
		</div>

		<div class="sl-sa-achieve__grid">

			<?php foreach ( $sa_outcomes as $outcome ) : ?>

				<article class="sl-sa-achieve__card">
					<?php $sl_sa_achieve_render_icon( $outcome['icon'] ); ?>
					<p class="sl-sa-achieve__text">
						<?php echo esc_html( $outcome['text'] ); ?>
					</p>
				</article>

			<?php endforeach; ?>

		</div>

	</div>
</section>
