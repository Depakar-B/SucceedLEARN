<?php
/**
 * DEI&B — Buyer fit section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$needs = array(
	array(
		'title' => __( 'Establish a shared foundation', 'akaza-adventure' ),
		'text'  => __( 'Introduce equality, diversity and inclusion expectations across your workforce.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Make unfair treatment easier to recognise', 'akaza-adventure' ),
		'text'  => __( 'Help employees identify different forms of discrimination.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Clarify response options', 'akaza-adventure' ),
		'text'  => __( 'Explain how employees can raise concerns through appropriate channels.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Reinforce your policies', 'akaza-adventure' ),
		'text'  => __( 'Connect organisational expectations with practical workplace behaviour.', 'akaza-adventure' ),
	),
);
?>
<section class="sl-deib-buyer" aria-labelledby="sl-deib-buyer-heading">

	<div class="container">

		<div class="row sl-deib-buyer__row gy-4">

			<div class="col-lg-5">
				<div class="sl-deib-buyer__intro">
					<h2 id="sl-deib-buyer-heading">
						<?php esc_html_e( 'What does your workforce need to understand?', 'akaza-adventure' ); ?>
					</h2>
					<p>
						<?php esc_html_e( 'Employees may know that discrimination is unacceptable without recognising how it can appear in everyday work.', 'akaza-adventure' ); ?>
					</p>
					<p>
						<?php esc_html_e( 'This course helps you close that knowledge gap. Choose it when you need to:', 'akaza-adventure' ); ?>
					</p>
				</div>
			</div>

			<div class="col-lg-7">
				<ul class="sl-deib-buyer__list">
					<?php foreach ( $needs as $need ) : ?>
						<li class="sl-deib-buyer__item">
							<span class="sl-deib-buyer__check" aria-hidden="true"><i class="bi bi-check-lg"></i></span>
							<span class="sl-deib-buyer__body">
								<strong><?php echo esc_html( $need['title'] ); ?>:</strong>
								<?php echo esc_html( $need['text'] ); ?>
							</span>
						</li>
					<?php endforeach; ?>
				</ul>
				<p class="sl-deib-buyer__note">
					<?php esc_html_e( 'Use the course within onboarding, employee awareness or a wider inclusion initiative, according to your organisation’s needs.', 'akaza-adventure' ); ?>
				</p>
			</div>

		</div>

	</div>

</section>
