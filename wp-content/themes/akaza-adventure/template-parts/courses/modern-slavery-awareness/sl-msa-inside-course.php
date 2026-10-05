<?php
/**
 * Modern Slavery Awareness — Inside the course (screenshot gallery).
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$shots = array(
	array(
		'image'    => 'https://succeedlearn.com/wp-content/uploads/2026/10/Slavery-awareness_Image-1.webp',
		'alt'      => __( 'SucceedLEARN Modern Slavery Awareness course objectives', 'akaza-adventure' ),
		'fallback' => __( 'Insert supplied course objectives screenshot', 'akaza-adventure' ),
		'title'    => __( 'Clear learning objectives', 'akaza-adventure' ),
		'text'     => __( 'Learners are introduced to modern slavery, warning signs and appropriate reporting.', 'akaza-adventure' ),
	),
	array(
		'image'    => 'https://succeedlearn.com/wp-content/uploads/2026/10/Slavery-awareness_Image-3.webp',
		'alt'      => __( 'SucceedLEARN Modern Slavery Awareness course menu', 'akaza-adventure' ),
		'fallback' => __( 'Insert supplied course menu screenshot', 'akaza-adventure' ),
		'title'    => __( 'Structured learning journey', 'akaza-adventure' ),
		'text'     => __( 'Definitions, warning signs, scenarios, procurement, reporting and assessment.', 'akaza-adventure' ),
	),
	array(
		'image'    => 'https://succeedlearn.com/wp-content/uploads/2026/10/Slavery-awareness_Image-2.webp',
		'alt'      => __( 'SucceedLEARN procurement and supply-chain modern slavery course section', 'akaza-adventure' ),
		'fallback' => __( 'Insert supplied procurement screenshot', 'akaza-adventure' ),
		'title'    => __( 'Procurement pathway', 'akaza-adventure' ),
		'text'     => __( 'Additional supplier-risk content for learners involved in procurement or vendor selection.', 'akaza-adventure' ),
	),
);

$render_shot = static function ( $shot ) {
	?>
	<figure class="msa-shot">
		<?php if ( $shot['image'] ) : ?>
			<img src="<?php echo esc_url( $shot['image'] ); ?>" alt="<?php echo esc_attr( $shot['alt'] ); ?>" loading="lazy" decoding="async">
		<?php else : ?>
			<div class="msa-shot__fallback"><?php echo esc_html( $shot['fallback'] ); ?></div>
		<?php endif; ?>
		<figcaption>
			<strong><?php echo esc_html( $shot['title'] ); ?></strong>
			<p><?php echo esc_html( $shot['text'] ); ?></p>
		</figcaption>
	</figure>
	<?php
};
?>

<section id="inside-course" class="msa-section msa-section--grey" aria-labelledby="msa-inside-title">
	<div class="msa-container">

		<div class="msa-section-intro">
			<span class="sl-home-sub-heading"><?php esc_html_e( 'Inside the Course', 'akaza-adventure' ); ?></span>
			<h2 id="msa-inside-title">
				<?php esc_html_e( 'Explore the SucceedLEARN', 'akaza-adventure' ); ?>
				<span class="msa-highlight"><?php esc_html_e( 'Modern Slavery Awareness Course', 'akaza-adventure' ); ?></span>
			</h2>
			<p><?php esc_html_e( 'Authentic course screens help learners and buyers see how the training is structured.', 'akaza-adventure' ); ?></p>
		</div>

		<div class="msa-gallery">
			<?php $render_shot( $shots[0] ); ?>
			<div class="msa-gallery__side">
				<?php $render_shot( $shots[1] ); ?>
				<?php $render_shot( $shots[2] ); ?>
			</div>
		</div>

	</div>
</section>
