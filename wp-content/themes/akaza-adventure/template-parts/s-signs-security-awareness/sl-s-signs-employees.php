<?php
/**
 * S-Signs — Built for Every Employee.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$audiences = array(
	array(
		'title' => __( 'New Joiners', 'akaza-adventure' ),
		'text'  => __( 'Reinforce foundational security behaviours as employees become familiar with organisational policies and systems.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Employees Across the Organisation', 'akaza-adventure' ),
		'text'  => __( 'Maintain regular cybersecurity visibility across departments and functions.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Managers & People Leaders', 'akaza-adventure' ),
		'text'  => __( 'Support employees responsible for teams, information and organisational decisions with ongoing security reminders.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Remote & Hybrid Workforces', 'akaza-adventure' ),
		'text'  => __( 'Keep awareness visible to employees working outside traditional office environments.', 'akaza-adventure' ),
	),
);
?>

<section
	class="sl-s-signs-employees"
	aria-labelledby="sl-s-signs-employees-title"
>
	<div class="container">

		<div class="sl-s-signs-employees__intro">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Workforce Coverage', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-s-signs-employees-title">
				<?php esc_html_e( 'Built for', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Every Employee', 'akaza-adventure' ); ?></span>
			</h2>

			<p>
				<?php
				esc_html_e(
					'Cybersecurity awareness needs to remain relevant across the workforce, regardless of role or location.',
					'akaza-adventure'
				);
				?>
			</p>

			<p>
				<?php
				esc_html_e(
					'S-Signs provides a simple way to keep important security messages visible to different employee populations.',
					'akaza-adventure'
				);
				?>
			</p>

		</div>

		<div class="sl-s-signs-employees__grid">

			<?php foreach ( $audiences as $audience ) : ?>

				<article class="sl-s-signs-employees__card">
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
