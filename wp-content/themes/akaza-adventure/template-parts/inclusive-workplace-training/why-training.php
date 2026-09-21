<?php
/**
 * Inclusive Workplace Training — Why training deserves more than a tick-box approach.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$training_aims = array(
	__( 'Recognise conduct and decisions that may affect others', 'akaza-adventure' ),
	__( 'Understand why certain behaviours create risk or exclusion', 'akaza-adventure' ),
	__( 'Examine the assumptions influencing their judgement', 'akaza-adventure' ),
	__( 'Consider situations from another person\'s perspective', 'akaza-adventure' ),
	__( 'Identify appropriate reporting or response options', 'akaza-adventure' ),
	__( 'Make more informed choices at work', 'akaza-adventure' ),
);
?>
<section class="sl-inclusive-why-training" id="inclusive-why-training">
	<div class="container-xl">
		<div class="sl-inclusive-why-training__inner">

			<h2><?php esc_html_e( 'Why inclusive workplace training deserves more than a tick-box approach', 'akaza-adventure' ); ?></h2>

			<p><?php esc_html_e( 'Equality, bias and harassment are serious topics. Yet training on these subjects is often reduced to long lists of definitions or abstract statements that feel disconnected from employees\' working lives.', 'akaza-adventure' ); ?></p>

			<p><?php esc_html_e( 'Employees may complete the course without understanding how the subject applies to a conversation, meeting, recruitment decision, performance review or uncomfortable workplace interaction.', 'akaza-adventure' ); ?></p>

			<p><?php esc_html_e( 'SucceedLearn\'s Inclusive Workplace courses are designed to make important concepts clearer and more applicable. Each module focuses on a defined workplace issue and helps learners connect knowledge with behaviour.', 'akaza-adventure' ); ?></p>

			<h3 class="sl-inclusive-why-training__list-intro"><?php esc_html_e( 'The aim is not to tell employees what to think. It is to help them:', 'akaza-adventure' ); ?></h3>

			<div class="sl-inclusive-why-training__split">
				<div class="sl-inclusive-why-training__media">
					<?php
					// Placeholder for future image URL.
					$why_training_image = '';
					if ( $why_training_image ) :
						?>
						<img
							src="<?php echo esc_url( $why_training_image ); ?>"
							alt=""
							loading="lazy"
							decoding="async"
						/>
					<?php endif; ?>
				</div>

				<ul class="sl-inclusive-why-training__list" role="list">
					<?php foreach ( $training_aims as $aim ) : ?>
						<li>
							<span class="sl-inclusive-why-training__icon" aria-hidden="true">
								<i class="bi bi-check2"></i>
							</span>
							<?php echo esc_html( $aim ); ?>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>

			<p class="sl-inclusive-why-training__closing"><?php esc_html_e( 'Training cannot create an inclusive culture by itself. It can, however, give employees a shared foundation for understanding organisational expectations and acting on them.', 'akaza-adventure' ); ?></p>

		</div>
	</div>
</section>
