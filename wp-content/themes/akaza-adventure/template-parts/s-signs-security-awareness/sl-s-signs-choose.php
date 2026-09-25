<?php
/**
 * S-Signs — Why choose Visual Security Awareness Reinforcements.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$reasons = array(
	array(
		'title' => __( 'Continuous Visual Reinforcement', 'akaza-adventure' ),
		'text'  => __( 'Keep important cybersecurity messages visible between formal training and awareness activities.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Multiple Communication Styles', 'akaza-adventure' ),
		'text'  => __( 'Combine instructional posters with behavioural nudges depending on the awareness objective.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Broad Cybersecurity Coverage', 'akaza-adventure' ),
		'text'  => __( 'Reinforce awareness across phishing, passwords, remote working, AI security, mobile devices, data protection and other relevant cyber risks.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Flexible Distribution', 'akaza-adventure' ),
		'text'  => __( 'Use visual content across office environments, digital signage, employee communications and collaboration platforms.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Part of a Wider Awareness Programme', 'akaza-adventure' ),
		'text'  => __( 'Connect visual reinforcement with S-Aware, S-Bytes, S-Phish, S-Play and S-Metrics as part of the wider SBCS ecosystem.', 'akaza-adventure' ),
	),
);
?>

<section
	class="sl-s-signs-choose"
	aria-labelledby="sl-s-signs-choose-title"
>
	<div class="container">

		<div class="sl-s-signs-choose__intro">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Why Choose S-Signs', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-s-signs-choose-title">
				<?php esc_html_e( 'Why choose', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Visual Security Awareness Reinforcements', 'akaza-adventure' ); ?></span>
			</h2>

		</div>

		<div class="sl-s-signs-choose__grid">

			<?php foreach ( $reasons as $reason ) : ?>

				<article class="sl-s-signs-choose__card">
					<h3 class="sl-panel-title">
						<?php echo esc_html( $reason['title'] ); ?>
					</h3>
					<p>
						<?php echo esc_html( $reason['text'] ); ?>
					</p>
				</article>

			<?php endforeach; ?>

		</div>

	</div>
</section>
