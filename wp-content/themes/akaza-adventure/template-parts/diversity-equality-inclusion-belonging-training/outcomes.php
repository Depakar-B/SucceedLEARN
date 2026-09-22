<?php
/**
 * DEI&B — Learning outcomes section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$outcomes = array(
	__( 'Explain the principles of equality and diversity.', 'akaza-adventure' ),
	__( 'Recognise different types and forms of discrimination.', 'akaza-adventure' ),
	__( 'Understand the consequences of unfair treatment.', 'akaza-adventure' ),
	__( 'Appreciate that legal frameworks vary between locations.', 'akaza-adventure' ),
	__( 'Identify appropriate options for raising concerns.', 'akaza-adventure' ),
	__( 'Support fairer, more respectful workplace practices.', 'akaza-adventure' ),
);
?>
<section class="sl-deib-outcomes" aria-labelledby="sl-deib-outcomes-heading">

	<div class="container">

		<div class="sl-deib-outcomes__intro">
			<h2 id="sl-deib-outcomes-heading">
				<?php esc_html_e( 'What employees should take away', 'akaza-adventure' ); ?>
			</h2>
			<p>
				<?php esc_html_e( 'By the end of the course, learners should be better equipped to:', 'akaza-adventure' ); ?>
			</p>
		</div>

		<ul class="sl-deib-outcomes__list">
			<?php foreach ( $outcomes as $outcome ) : ?>
				<li>
					<span class="sl-deib-outcomes__check" aria-hidden="true"><i class="bi bi-check2"></i></span>
					<span><?php echo esc_html( $outcome ); ?></span>
				</li>
			<?php endforeach; ?>
		</ul>

		<p class="sl-deib-outcomes__note">
			<?php esc_html_e( 'These outcomes give HR teams and managers a foundation for follow-up conversations about how the learning applies within their organisation.', 'akaza-adventure' ); ?>
		</p>

	</div>

</section>
