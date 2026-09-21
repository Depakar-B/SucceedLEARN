<?php
/**
 * UK Sexual Harassment Prevention Training — Learning Experience.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$learning_points = array(
	array(
		'label' => __( 'Relevant', 'akaza-adventure' ),
		'text'  => __( 'created for the UK workplace context', 'akaza-adventure' ),
	),
	array(
		'label' => __( 'Practical', 'akaza-adventure' ),
		'text'  => __( 'focused on workplace decisions and responses', 'akaza-adventure' ),
	),
	array(
		'label' => __( 'Engaging', 'akaza-adventure' ),
		'text'  => __( 'supported by scenarios and knowledge checks', 'akaza-adventure' ),
	),
	array(
		'label' => __( 'Accessible', 'akaza-adventure' ),
		'text'  => __( 'available through online learning', 'akaza-adventure' ),
	),
	array(
		'label' => __( 'Action oriented', 'akaza-adventure' ),
		'text'  => __( 'connected to organisational expectations', 'akaza-adventure' ),
	),
);
?>

<section
	id="learning-experience"
	class="sl-uk-sexual-harassment-learning"
	aria-labelledby="sl-uk-sexual-harassment-learning-title"
>
	<div class="container">

		<div class="sl-uk-sexual-harassment-learning__grid">

			<!-- Left: Image -->
			<div class="sl-uk-sexual-harassment-learning__media">
				<div class="sl-uk-sexual-harassment-learning__image">
					<div
						class="sl-uk-sexual-harassment-learning__image-placeholder"
						role="img"
						aria-label="<?php esc_attr_e( 'Image Placeholder', 'akaza-adventure' ); ?>"
					>
						<?php esc_html_e( 'Image Placeholder', 'akaza-adventure' ); ?>
					</div>
				</div>
			</div>

			<!-- Right: Content -->
			<div class="sl-uk-sexual-harassment-learning__content">

				<span class="sl-uk-sexual-harassment-learning__intro">
					<?php esc_html_e( 'Serious learning does not need to feel heavy.', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-uk-sexual-harassment-learning-title">
					<?php esc_html_e( 'Built for Attention, Not', 'akaza-adventure' ); ?>
					<span><?php esc_html_e( 'Information Overload', 'akaza-adventure' ); ?></span>
				</h2>

				<p>
					<?php esc_html_e( 'Sensitive subjects need clear and considered learning.', 'akaza-adventure' ); ?>
				</p>

				<p>
					<?php esc_html_e( 'The course uses concise content, relatable workplace situations and learner interaction to make the experience easier to follow and remember. Employees are encouraged to consider how they would respond without being overwhelmed by dense explanations.', 'akaza-adventure' ); ?>
				</p>

				<h3 class="sl-panel-title">
					<?php esc_html_e( 'The learning experience is', 'akaza-adventure' ); ?>
				</h3>

				<ul class="sl-uk-sexual-harassment-learning__list">
					<?php foreach ( $learning_points as $index => $point ) : ?>
						<li class="sl-uk-sexual-harassment-learning__item">
							<span
								class="sl-uk-sexual-harassment-learning__number"
								aria-hidden="true"
							>
								<?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?>
							</span>

							<span class="sl-uk-sexual-harassment-learning__text">
								<strong><?php echo esc_html( $point['label'] ); ?> -</strong>
								<?php echo esc_html( $point['text'] ); ?>
							</span>
						</li>
					<?php endforeach; ?>
				</ul>

			</div>

		</div>
	</div>
</section>