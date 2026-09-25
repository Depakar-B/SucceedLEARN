<?php
/**
 * S-Play — Built for Every Employee.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$audiences = array(
	array(
		'title' => __( 'New Joiners', 'akaza-adventure' ),
		'text'  => __( 'Reinforce foundational security knowledge after initial onboarding and awareness training.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Employees Across the Organisation', 'akaza-adventure' ),
		'text'  => __( 'Give employees an interactive way to revisit and apply everyday cybersecurity concepts.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Managers & People Leaders', 'akaza-adventure' ),
		'text'  => __( 'Reinforce security decision-making among employees responsible for teams, information and business decisions.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Remote & Hybrid Workforces', 'akaza-adventure' ),
		'text'  => __( 'Keep employees engaged with security awareness regardless of where they work.', 'akaza-adventure' ),
	),
);
?>

<section
	class="sl-s-play-employees"
	aria-labelledby="sl-s-play-employees-title"
>
	<div class="container">

		<div class="sl-s-play-employees__intro">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Workforce Coverage', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-s-play-employees-title">
				<?php esc_html_e( 'Built for', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Every Employee', 'akaza-adventure' ); ?></span>
			</h2>

			<p>
				<?php
				esc_html_e(
					'Cybersecurity affects employees across roles, departments and levels of technical knowledge.',
					'akaza-adventure'
				);
				?>
			</p>

			<p>
				<?php
				esc_html_e(
					'S-Play provides an approachable way for different employee populations to actively engage with security concepts.',
					'akaza-adventure'
				);
				?>
			</p>

		</div>

		<div class="sl-s-play-employees__grid">

			<?php foreach ( $audiences as $audience ) : ?>

				<article class="sl-s-play-employees__card">
					<h3 class="sl-panel-title">
						<?php echo esc_html( $audience['title'] ); ?>
					</h3>
					<p>
						<?php echo esc_html( $audience['text'] ); ?>
					</p>
				</article>

			<?php endforeach; ?>

		</div>

	</div>
</section>
