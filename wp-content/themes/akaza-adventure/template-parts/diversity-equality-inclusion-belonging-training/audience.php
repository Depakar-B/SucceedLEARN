<?php
/**
 * DEI&B — Target audience section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$audiences = array(
	array(
		'title' => __( 'Employees', 'akaza-adventure' ),
		'text'  => __( 'Build awareness of fair treatment, respectful working relationships and appropriate routes for raising discrimination concerns.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Supervisors and managers', 'akaza-adventure' ),
		'text'  => __( 'Understand how everyday decisions and responses can affect participation, opportunity and the experience of team members.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'HR and people teams', 'akaza-adventure' ),
		'text'  => __( 'Support consistent communication about equality, diversity and organisational expectations.', 'akaza-adventure' ),
	),
);
?>
<section class="sl-deib-audience" aria-labelledby="sl-deib-audience-heading">

	<div class="container">

		<div class="sl-deib-audience__intro">
			<h2 id="sl-deib-audience-heading">
				<?php esc_html_e( 'Who is the course for?', 'akaza-adventure' ); ?>
			</h2>
		</div>

		<div class="sl-deib-audience__list">
			<?php foreach ( $audiences as $audience ) : ?>
				<div class="sl-deib-audience__row">
					<h3 class="sl-deib-audience__label"><?php echo esc_html( $audience['title'] ); ?></h3>
					<p class="sl-deib-audience__text"><?php echo esc_html( $audience['text'] ); ?></p>
				</div>
			<?php endforeach; ?>
		</div>

		<p class="sl-deib-audience__note">
			<?php esc_html_e( 'This is a foundation course for workplace awareness. Discuss any specialist learning requirements with our team.', 'akaza-adventure' ); ?>
		</p>

	</div>

</section>
