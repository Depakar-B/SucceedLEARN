<?php
/**
 * DEI&B — Learning experience section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$experience_image = '';

$elements = array(
	array(
		'icon'  => 'bi-film',
		'label' => __( 'Animated videos', 'akaza-adventure' ),
	),
	array(
		'icon'  => 'bi-easel',
		'label' => __( 'Short narrated slides', 'akaza-adventure' ),
	),
	array(
		'icon'  => 'bi-chat-square-quote',
		'label' => __( 'Interactive scenarios', 'akaza-adventure' ),
	),
	array(
		'icon'  => 'bi-ui-checks-grid',
		'label' => __( 'Knowledge checks and quizzes', 'akaza-adventure' ),
	),
	array(
		'icon'  => 'bi-award',
		'label' => __( 'A final assessment and completion certificate', 'akaza-adventure' ),
	),
);
?>
<section class="sl-deib-experience" aria-labelledby="sl-deib-experience-heading">

	<div class="container">

		<div class="row sl-deib-experience__row align-items-center gy-5">

			<div class="col-lg-6">
				<div class="sl-deib-experience__media">
					<?php if ( $experience_image ) : ?>
						<img
							src="<?php echo esc_url( $experience_image ); ?>"
							alt="<?php esc_attr_e( 'Course scenario or learner interaction screenshot', 'akaza-adventure' ); ?>"
							loading="lazy"
							decoding="async"
						>
					<?php else : ?>
						<div class="sl-deib-experience__placeholder" role="img" aria-label="<?php esc_attr_e( 'Learning experience screenshot placeholder', 'akaza-adventure' ); ?>">
							<span aria-hidden="true"><i class="bi bi-play-btn"></i></span>
							<span><?php esc_html_e( 'Scenario / interaction screenshot', 'akaza-adventure' ); ?></span>
						</div>
					<?php endif; ?>
				</div>
			</div>

			<div class="col-lg-6">
				<div class="sl-deib-experience__content">
					<h2 id="sl-deib-experience-heading">
						<?php esc_html_e( 'Give employees something to think through', 'akaza-adventure' ); ?>
					</h2>

					<p>
						<?php esc_html_e( 'Understanding a definition is a starting point. Employees also need opportunities to consider how it applies to a workplace situation.', 'akaza-adventure' ); ?>
					</p>

					<p>
						<?php esc_html_e( 'The course combines explanations with interactive scenario exercises and reflection. Knowledge checks reinforce understanding, and a final assessment checks learning.', 'akaza-adventure' ); ?>
					</p>

					<p class="sl-deib-experience__lead">
						<?php esc_html_e( 'The learning experience includes:', 'akaza-adventure' ); ?>
					</p>

					<ul class="sl-deib-experience__elements">
						<?php foreach ( $elements as $element ) : ?>
							<li>
								<span class="sl-deib-experience__icon" aria-hidden="true">
									<i class="bi <?php echo esc_attr( $element['icon'] ); ?>"></i>
								</span>
								<span><?php echo esc_html( $element['label'] ); ?></span>
							</li>
						<?php endforeach; ?>
					</ul>

					<p>
						<?php esc_html_e( 'Review the demo to assess the clarity, relevance and learning experience for your workforce.', 'akaza-adventure' ); ?>
					</p>

					<div class="sl-deib-experience__actions">
						<a href="#contact" class="sl-content-btn sl-content-btn-primary">
							<?php esc_html_e( 'Request a Demo', 'akaza-adventure' ); ?>
						</a>
					</div>
				</div>
			</div>

		</div>

	</div>

</section>
