<?php
/**
 * AMP partial — UK Sexual Harassment Prevention Training — learning experience.
 *
 * Expected vars: $learning_points
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( empty( $learning_points ) || ! is_array( $learning_points ) ) {
	$learning_points = function_exists( 'succeedlearn_amp_get_uk_harassment_learning_points' )
		? succeedlearn_amp_get_uk_harassment_learning_points()
		: array();
}

$images         = function_exists( 'succeedlearn_amp_get_uk_harassment_images' )
	? succeedlearn_amp_get_uk_harassment_images()
	: array();
$learning_image = isset( $images['learning'] ) ? $images['learning'] : '';
?>
<section
	id="learning-experience"
	class="sl-section sl-section--alt sl-uk-harassment-learning"
	aria-labelledby="sl-uk-harassment-learning-title"
>
	<div class="sl-wrap">
		<div class="sl-uk-harassment-learning__grid">

			<div class="sl-uk-harassment-learning__content">
				<span class="sl-uk-harassment-learning__intro">
					<?php esc_html_e( 'Serious learning does not need to feel heavy.', 'succeedlearn-amp' ); ?>
				</span>

				<h2 id="sl-uk-harassment-learning-title" class="sl-h2">
					<?php esc_html_e( 'Built for Attention, Not', 'succeedlearn-amp' ); ?>
					<span><?php esc_html_e( 'Information Overload', 'succeedlearn-amp' ); ?></span>
				</h2>

				<p>
					<?php esc_html_e( 'Sensitive subjects need clear and considered learning.', 'succeedlearn-amp' ); ?>
				</p>
				<p>
					<?php esc_html_e( 'The course uses concise content, relatable workplace situations and learner interaction to make the experience easier to follow and remember. Employees are encouraged to consider how they would respond without being overwhelmed by dense explanations.', 'succeedlearn-amp' ); ?>
				</p>

				<h3 class="sl-panel-title">
					<?php esc_html_e( 'The learning experience is', 'succeedlearn-amp' ); ?>
				</h3>

				<ul class="sl-uk-harassment-numbered-list">
					<?php foreach ( $learning_points as $point ) : ?>
						<li class="sl-uk-harassment-numbered-list__item">
							<span class="sl-uk-harassment-numbered-list__text">
								<strong><?php echo esc_html( $point['label'] ); ?> -</strong>
								<?php echo esc_html( $point['text'] ); ?>
							</span>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>

			<div class="sl-uk-harassment-learning__media">
				<?php if ( $learning_image ) : ?>
					<div class="sl-uk-harassment-learning__image">
						<amp-img
							src="<?php echo esc_url( $learning_image ); ?>"
							width="560"
							height="420"
							layout="responsive"
							alt="<?php esc_attr_e( 'UK sexual harassment prevention learning experience on laptop with workplace scenarios.', 'succeedlearn-amp' ); ?>"
						></amp-img>
					</div>
				<?php endif; ?>
			</div>

		</div>
	</div>
</section>
