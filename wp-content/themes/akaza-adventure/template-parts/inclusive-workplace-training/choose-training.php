<?php
/**
 * Inclusive Workplace Training — Choose training by workplace challenge.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$choices = array(
	array(
		'icon'   => 'bi-globe2',
		'prompt' => __( 'Need employees to understand discrimination and fair treatment?', 'akaza-adventure' ),
		'choice' => __( 'Choose Equality, Diversity and Inclusion Training.', 'akaza-adventure' ),
		'href'   => '#inclusive-course-edi',
	),
	array(
		'icon'   => 'bi-eye-slash',
		'prompt' => __( 'Want to improve awareness of assumptions in workplace decisions?', 'akaza-adventure' ),
		'choice' => __( 'Choose Unconscious Bias Training.', 'akaza-adventure' ),
		'href'   => '#inclusive-course-unconscious-bias',
	),
	array(
		'icon'   => 'bi-people-fill',
		'prompt' => __( 'Need employees to know how to respond when they witness sexual harassment?', 'akaza-adventure' ),
		'choice' => __( 'Choose Bystander Intervention Training.', 'akaza-adventure' ),
		'href'   => '#inclusive-course-bystander',
	),
);
?>
<section class="sl-inclusive-choose" id="inclusive-choose-training" aria-labelledby="sl-inclusive-choose-heading">
	<div class="container-xl">
		<div class="sl-inclusive-choose__inner">
			<h2 id="sl-inclusive-choose-heading">
				<?php esc_html_e( 'Choose training for the issue you need to address', 'akaza-adventure' ); ?>
			</h2>

			<p class="sl-inclusive-choose__lead">
				<?php esc_html_e( 'You do not need to begin with a predefined bundle.', 'akaza-adventure' ); ?>
			</p>

			<p class="sl-inclusive-choose__prompt">
				<?php esc_html_e( 'Start with the workplace challenge in front of you:', 'akaza-adventure' ); ?>
			</p>

			<div class="sl-inclusive-choose__grid" role="list">
				<?php foreach ( $choices as $choice ) : ?>
					<a class="sl-inclusive-choose__card" href="<?php echo esc_url( $choice['href'] ); ?>" role="listitem">
						<span class="sl-inclusive-choose__card-icon" aria-hidden="true">
							<i class="bi <?php echo esc_attr( $choice['icon'] ); ?>"></i>
						</span>
						<p class="sl-inclusive-choose__card-prompt"><?php echo esc_html( $choice['prompt'] ); ?></p>
						<h3 class="sl-inclusive-choose__card-choice"><?php echo esc_html( $choice['choice'] ); ?></h3>
					</a>
				<?php endforeach; ?>
			</div>

			<p class="sl-inclusive-choose__closing">
				<?php esc_html_e( 'Each course stands independently, allowing your organisation to focus learning on the issue, audience or risk that matters now.', 'akaza-adventure' ); ?>
			</p>
		</div>
	</div>
</section>
