<?php
/**
 * S-Bytes — Built for Every Employee.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$sbytes_employees = array(
	array(
		'title' => __( 'New Joiners', 'akaza-adventure' ),
		'body'  => __(
			'Reinforce foundational security concepts after onboarding and keep awareness active as employees settle into their roles.',
			'akaza-adventure'
		),
	),
	array(
		'title' => __( 'Employees Across the Organisation', 'akaza-adventure' ),
		'body'  => __(
			'Deliver short and understandable security messages to employees across functions and levels of technical knowledge.',
			'akaza-adventure'
		),
	),
	array(
		'title' => __( 'Managers & People Leaders', 'akaza-adventure' ),
		'body'  => __(
			'Keep important security behaviours visible for employees responsible for teams, information and organisational decision-making.',
			'akaza-adventure'
		),
	),
	array(
		'title' => __( 'Remote & Hybrid Workforces', 'akaza-adventure' ),
		'body'  => __(
			'Reinforce security behaviours relevant to employees working across offices, homes, public environments and distributed teams.',
			'akaza-adventure'
		),
	),
	array(
		'title' => __( 'Busy Workforces', 'akaza-adventure' ),
		'body'  => __(
			'Introduce regular awareness without repeatedly taking employees away from their work for lengthy training sessions.',
			'akaza-adventure'
		),
	),
);
?>

<section
	id="built-for-every-employee"
	class="sl-sbytes-employees"
	aria-labelledby="sl-sbytes-employees-title"
>
	<div class="container">

		<div class="sl-sbytes-employees__intro">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'For Your Workforce', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-sbytes-employees-title">
				<?php esc_html_e( 'Built for Every', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Employee', 'akaza-adventure' ); ?></span>
			</h2>

			<p>
				<?php esc_html_e( 'Cybersecurity affects employees across every role and department.', 'akaza-adventure' ); ?>
			</p>
			<p>
				<?php
				esc_html_e(
					'S-Bytes is designed to make continuous security learning accessible without requiring employees to become cybersecurity experts.',
					'akaza-adventure'
				);
				?>
			</p>

		</div>

		<div class="sl-sbytes-employees__grid">
			<?php foreach ( $sbytes_employees as $item ) : ?>
				<article class="sl-sbytes-employees__card">
					<h3 class="sl-panel-title"><?php echo esc_html( $item['title'] ); ?></h3>
					<p><?php echo esc_html( $item['body'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>

	</div>
</section>
