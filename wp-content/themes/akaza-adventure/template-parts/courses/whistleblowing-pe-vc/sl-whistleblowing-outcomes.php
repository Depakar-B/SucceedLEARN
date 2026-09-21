<?php
/**
 * Whistleblowing Training — Learning Outcomes Strip.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$learning_points = array(
	array(
		'label' => __( 'Recognise', 'akaza-adventure' ),
		'text'  => __( 'Potential misconduct', 'akaza-adventure' ),
	),
	array(
		'label' => __( 'Understand', 'akaza-adventure' ),
		'text'  => __( 'Key protections', 'akaza-adventure' ),
	),
	array(
		'label' => __( 'Apply', 'akaza-adventure' ),
		'text'  => __( 'Relevant workplace examples', 'akaza-adventure' ),
	),
	array(
		'label' => __( 'Know', 'akaza-adventure' ),
		'text'  => __( 'When and how to speak up', 'akaza-adventure' ),
	),
);
?>

<section
	id="learning-outcomes"
	class="sl-whistleblowing-outcomes"
	aria-label="<?php esc_attr_e( 'Whistleblowing training learning outcomes', 'akaza-adventure' ); ?>"
>
	<div class="container">
		<div class="sl-whistleblowing-outcomes__grid">
			<?php foreach ( $learning_points as $point ) : ?>
				<div class="sl-whistleblowing-outcomes__item">
					<span class="sl-whistleblowing-outcomes__label">
						<?php echo esc_html( $point['label'] ); ?>
					</span>

					<p class="sl-whistleblowing-outcomes__text">
						<?php echo esc_html( $point['text'] ); ?>
					</p>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>