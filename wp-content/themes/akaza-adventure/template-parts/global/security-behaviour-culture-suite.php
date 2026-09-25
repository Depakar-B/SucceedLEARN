<?php
/**
 * Global Security Behaviour & Culture Suite section.
 *
 * Shared suite product list for S-Aware, S-Phish, and related pages.
 *
 * Usage:
 * get_template_part(
 *   'template-parts/global/security-behaviour-culture-suite',
 *   null,
 *   array(
 *     'media_side'    => 'left',   // left | right
 *     'background'    => 'white',  // white | soft | any CSS color
 *     'image'         => '',
 *     'image_alt'     => '',
 *     'id'            => 'security-behaviour-culture-suite',
 *     'section_class' => '',
 *   )
 * );
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$args = is_array( $args ?? null ) ? $args : array();

$media_side = isset( $args['media_side'] ) ? strtolower( (string) $args['media_side'] ) : 'left';
if ( ! in_array( $media_side, array( 'left', 'right' ), true ) ) {
	$media_side = 'left';
}

$background  = isset( $args['background'] ) ? trim( (string) $args['background'] ) : 'white';
$image       = isset( $args['image'] ) ? trim( (string) $args['image'] ) : '';
$image_alt   = isset( $args['image_alt'] ) ? trim( (string) $args['image_alt'] ) : __( 'SucceedLEARN Security Behaviour and Culture Suite', 'akaza-adventure' );
$section_id  = isset( $args['id'] ) ? sanitize_html_class( (string) $args['id'] ) : 'security-behaviour-culture-suite';
$extra_class = isset( $args['section_class'] ) ? trim( (string) $args['section_class'] ) : '';

$suite_items = array(
	array(
		'name'        => __( 'S-Aware', 'akaza-adventure' ),
		'action'      => __( 'Learn', 'akaza-adventure' ),
		'description' => __( 'Build foundational cybersecurity and privacy knowledge.', 'akaza-adventure' ),
	),
	array(
		'name'        => __( 'S-Bytes', 'akaza-adventure' ),
		'action'      => __( 'Reinforce', 'akaza-adventure' ),
		'description' => __( 'Keep important security concepts fresh through continuous microlearning.', 'akaza-adventure' ),
	),
	array(
		'name'        => __( 'S-Phish', 'akaza-adventure' ),
		'action'      => __( 'Test', 'akaza-adventure' ),
		'description' => __( 'Give employees practical experience recognising realistic phishing threats.', 'akaza-adventure' ),
	),
	array(
		'name'        => __( 'S-Play', 'akaza-adventure' ),
		'action'      => __( 'Engage', 'akaza-adventure' ),
		'description' => __( 'Reinforce cybersecurity concepts through interactive and gamified learning.', 'akaza-adventure' ),
	),
	array(
		'name'        => __( 'S-Signs', 'akaza-adventure' ),
		'action'      => __( 'Remind', 'akaza-adventure' ),
		'description' => __( 'Keep security visible through ongoing awareness campaigns and visual nudges.', 'akaza-adventure' ),
	),
	array(
		'name'        => __( 'S-Metrics', 'akaza-adventure' ),
		'action'      => __( 'Measure', 'akaza-adventure' ),
		'description' => __( 'Bring awareness and behavioural data together to understand programme performance.', 'akaza-adventure' ),
	),
	array(
		'name'        => __( 'S-Sync', 'akaza-adventure' ),
		'action'      => __( 'Connect', 'akaza-adventure' ),
		'description' => __( "Integrate security awareness with the organisation's wider learning and technology ecosystem.", 'akaza-adventure' ),
	),
);

$bg_modifiers = array(
	'white' => 'sl-sbcs--bg-white',
	'soft'  => 'sl-sbcs--bg-soft',
);

$section_classes = array( 'sl-sbcs', 'sl-sbcs--media-' . $media_side );
$custom_bg       = '';

if ( isset( $bg_modifiers[ $background ] ) ) {
	$section_classes[] = $bg_modifiers[ $background ];
} else {
	$section_classes[] = 'sl-sbcs--bg-custom';
	$custom_bg         = $background;
}

if ( '' !== $extra_class ) {
	$section_classes[] = $extra_class;
}

$title_id = $section_id ? $section_id . '-title' : 'sl-sbcs-title';
?>
<section
	<?php echo $section_id ? 'id="' . esc_attr( $section_id ) . '"' : ''; ?>
	class="<?php echo esc_attr( implode( ' ', $section_classes ) ); ?>"
	<?php
	if ( '' !== $custom_bg ) {
		echo ' style="' . esc_attr( '--sl-sbcs-bg: ' . $custom_bg . ';' ) . '"';
	}
	?>
	aria-labelledby="<?php echo esc_attr( $title_id ); ?>"
>
	<div class="container">

		<div class="sl-sbcs__intro">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Security Behaviour & Culture Suite', 'akaza-adventure' ); ?>
			</span>

			<h2 id="<?php echo esc_attr( $title_id ); ?>">
				<?php esc_html_e( 'From Awareness to ', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Real-World Readiness', 'akaza-adventure' ); ?></span>
			</h2>

			<p>
				<?php esc_html_e(
					'As part of the SucceedLEARN Security Behaviour & Culture Suite, continuous learning, reinforcement, engagement, testing and measurement work together to help organisations build stronger security behaviours.',
					'akaza-adventure'
				); ?>
			</p>

		</div>

		<div class="sl-sbcs__layout">

			<div class="sl-sbcs__media">
				<div class="sl-sbcs__image">
					<?php if ( '' !== $image ) : ?>
						<img
							src="<?php echo esc_url( $image ); ?>"
							alt="<?php echo esc_attr( $image_alt ); ?>"
							width="720"
							height="900"
							loading="lazy"
							decoding="async"
						/>
					<?php else : ?>
						<div
							class="sl-sbcs__image-placeholder"
							role="img"
							aria-label="<?php echo esc_attr( $image_alt ); ?>"
						>
							<?php esc_html_e( 'Image Placeholder', 'akaza-adventure' ); ?>
						</div>
					<?php endif; ?>
				</div>
			</div>

			<div class="sl-sbcs__journey">

				<div class="sl-sbcs__journey-line" aria-hidden="true"></div>

				<?php foreach ( $suite_items as $index => $item ) : ?>

					<div class="sl-sbcs__step">

						<div class="sl-sbcs__step-marker" aria-hidden="true">
							<?php
							echo esc_html(
								str_pad(
									(string) ( $index + 1 ),
									2,
									'0',
									STR_PAD_LEFT
								)
							);
							?>
						</div>

						<div class="sl-sbcs__step-content">

							<div class="sl-sbcs__step-heading">
								<h3 class="sl-panel-title">
									<?php echo esc_html( $item['name'] ); ?>
								</h3>
								<span class="sl-sbcs__step-action">
									<?php echo esc_html( $item['action'] ); ?>
								</span>
							</div>

							<p>
								<?php echo esc_html( $item['description'] ); ?>
							</p>

						</div>

					</div>

				<?php endforeach; ?>

			</div>

		</div>

		<div class="sl-sbcs__closing">
			<p>
				<strong>
					<?php
					esc_html_e(
						'Together, these solutions create a continuous cycle of learning, testing, reinforcement and measurement.',
						'akaza-adventure'
					);
					?>
				</strong>
			</p>
		</div>

	</div>
</section>
