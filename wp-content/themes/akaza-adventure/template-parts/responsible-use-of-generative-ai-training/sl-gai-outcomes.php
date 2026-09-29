<?php
/**
 * Responsible Use of Generative AI Training - Learning outcomes.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$gai_outcomes = array(
	__( 'Describe the impact and common applications of generative AI', 'akaza-adventure' ),
	__( 'Outline how generative AI works and creates images', 'akaza-adventure' ),
	__( 'Recognise key risks and limitations of GenAI tools', 'akaza-adventure' ),
	__( 'Use greater care when uploading information or interacting with AI systems', 'akaza-adventure' ),
	__( 'Understand that system integration may require prior approval', 'akaza-adventure' ),
	__( 'Recognise that AI-generated output may be inaccurate', 'akaza-adventure' ),
	__( 'Consider regulatory variation across countries and use cases', 'akaza-adventure' ),
	__( 'Identify relevant copyright considerations', 'akaza-adventure' ),
	__( 'Recognise AI washing', 'akaza-adventure' ),
	__( 'Apply a risk-based approach to workplace use of generative AI', 'akaza-adventure' ),
);
?>

<section
	class="sl-gai-outcomes"
	id="learning-outcomes"
	aria-labelledby="sl-gai-outcomes-title"
>
	<div class="container">

		<div class="sl-gai-outcomes__heading">
			<h2 id="sl-gai-outcomes-title">
				<?php esc_html_e( 'Learning', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'outcomes', 'akaza-adventure' ); ?></span>
			</h2>

			<p>
				<?php esc_html_e( 'After completing the course, learners should be able to:', 'akaza-adventure' ); ?>
			</p>
		</div>

		<ul class="sl-gai-outcomes__list">
			<?php foreach ( $gai_outcomes as $gai_outcome ) : ?>
				<li class="sl-gai-outcomes__item">
					<?php echo esc_html( $gai_outcome ); ?>
				</li>
			<?php endforeach; ?>
		</ul>

	</div>
</section>
