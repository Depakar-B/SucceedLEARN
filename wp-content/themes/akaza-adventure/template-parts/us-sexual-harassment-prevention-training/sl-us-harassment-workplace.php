<?php
/**
 * US Sexual Harassment Prevention Training — Real Workplace Situations
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$learning_journey = array(
	__( 'Recognize concerning conduct and relevant workplace boundaries', 'akaza-adventure' ),
	__( 'Consider the context, policy and people affected', 'akaza-adventure' ),
	__( 'Respond safely as an employee, witness or supervisor', 'akaza-adventure' ),
	__( 'Report or escalate through the appropriate channel', 'akaza-adventure' ),
	__( 'Support fair follow-up without retaliation', 'akaza-adventure' ),
);
?>

<section class="sl-us-harassment-workplace" aria-labelledby="sl-us-harassment-workplace-title">

	<div class="container">

		<div class="sl-us-harassment-workplace__grid">

			<div class="sl-us-harassment-workplace__media">

				<div class="sl-us-harassment-workplace__image">

					<div class="sl-us-harassment-workplace__image-placeholder">
						<span>
							<?php esc_html_e( 'Image Placeholder', 'akaza-adventure' ); ?>
						</span>
					</div>

				</div>

			</div>


			<div class="sl-us-harassment-workplace__content">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Learning for Real Workplace Situations', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-us-harassment-workplace-title">
					<?php esc_html_e( 'Learning for Real Workplace', 'akaza-adventure' ); ?>
					<span><?php esc_html_e( 'Situations', 'akaza-adventure' ); ?></span>
				</h2>

				<div class="sl-us-harassment-workplace__intro">

					<p>
						<?php esc_html_e( 'Harassment is not limited to a physical office or a single type of interaction. Course scenarios can help learners consider conduct in meetings, email and chat, video calls, client locations, business travel, work events and remote or hybrid environments.', 'akaza-adventure' ); ?>
					</p>

					<p>
						<?php esc_html_e( 'Learners examine how context, frequency, severity, authority and impact can affect the assessment of conduct. They also learn that an organization’s policy may set behavioral expectations that are broader than the minimum legal threshold.', 'akaza-adventure' ); ?>
					</p>

					<p>
						<?php esc_html_e( 'The learning journey moves from recognition to action:', 'akaza-adventure' ); ?>
					</p>

				</div>


				<ul class="sl-list sl-us-harassment-workplace__list">

					<?php foreach ( $learning_journey as $index => $item ) : ?>

						<li class="sl-list-item">

							<span class="sl-list-item__label" aria-hidden="true">
								<?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?>
							</span>

							<span class="sl-list-item__text">
								<?php echo esc_html( $item ); ?>
							</span>

						</li>

					<?php endforeach; ?>

				</ul>

			</div>

		</div>

	</div>

</section>