<?php
/**
 * Global AMP Security Behaviour & Culture Suite (SBCS) section.
 *
 * AMP counterpart of theme template-parts/global/security-behaviour-culture-suite.php.
 * Always renders the desktop tablet layout: intro, image, numbered journey, closing.
 *
 * Pages using it must add 'global-sbcs' to their page styles in
 * succeedlearn_amp_output_page_styles().
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * @return array<int, array{name:string, action:string, description:string}>
 */
function succeedlearn_amp_get_sbcs_items() {
	return array(
		array(
			'name'        => __( 'S-Aware', 'succeedlearn-amp' ),
			'action'      => __( 'Learn', 'succeedlearn-amp' ),
			'description' => __( 'Build foundational cybersecurity and privacy knowledge.', 'succeedlearn-amp' ),
		),
		array(
			'name'        => __( 'S-Bytes', 'succeedlearn-amp' ),
			'action'      => __( 'Reinforce', 'succeedlearn-amp' ),
			'description' => __( 'Keep important security concepts fresh through continuous microlearning.', 'succeedlearn-amp' ),
		),
		array(
			'name'        => __( 'S-Phish', 'succeedlearn-amp' ),
			'action'      => __( 'Test', 'succeedlearn-amp' ),
			'description' => __( 'Give employees practical experience recognising realistic phishing threats.', 'succeedlearn-amp' ),
		),
		array(
			'name'        => __( 'S-Play', 'succeedlearn-amp' ),
			'action'      => __( 'Engage', 'succeedlearn-amp' ),
			'description' => __( 'Reinforce cybersecurity concepts through interactive and gamified learning.', 'succeedlearn-amp' ),
		),
		array(
			'name'        => __( 'S-Signs', 'succeedlearn-amp' ),
			'action'      => __( 'Remind', 'succeedlearn-amp' ),
			'description' => __( 'Keep security visible through ongoing awareness campaigns and visual nudges.', 'succeedlearn-amp' ),
		),
		array(
			'name'        => __( 'S-Metrics', 'succeedlearn-amp' ),
			'action'      => __( 'Measure', 'succeedlearn-amp' ),
			'description' => __( 'Bring awareness and behavioural data together to understand programme performance.', 'succeedlearn-amp' ),
		),
		array(
			'name'        => __( 'S-Sync', 'succeedlearn-amp' ),
			'action'      => __( 'Connect', 'succeedlearn-amp' ),
			'description' => __( "Integrate security awareness with the organisation's wider learning and technology ecosystem.", 'succeedlearn-amp' ),
		),
	);
}

/**
 * Render the global SBCS section.
 *
 * @param array $args {
 *     @type string $id            Section id. Default 'security-behaviour-culture-suite'.
 *     @type string $background    white | soft. Default 'white'.
 *     @type string $image         Image URL. Default suite image.
 *     @type string $image_alt     Image alt text.
 *     @type string $section_class Extra section classes.
 * }
 */
function succeedlearn_amp_render_sbcs( $args = array() ) {
	$args = wp_parse_args(
		(array) $args,
		array(
			'id'            => 'security-behaviour-culture-suite',
			'background'    => 'white',
			'image'         => 'https://succeedlearn.com/wp-content/uploads/2026/09/From-Awareness-to-Real-World-Readiness.webp',
			'image_alt'     => __( 'From Awareness to Real-World Readiness', 'succeedlearn-amp' ),
			'section_class' => '',
		)
	);

	$section_id = sanitize_html_class( (string) $args['id'] );
	$title_id   = ( $section_id ? $section_id : 'sl-sbcs' ) . '-title';

	$classes = array( 'sl-section', 'sl-sbcs' );
	if ( 'soft' === $args['background'] ) {
		$classes[] = 'sl-section--alt';
		$classes[] = 'sl-sbcs--bg-soft';
	}
	if ( '' !== trim( (string) $args['section_class'] ) ) {
		$classes[] = trim( (string) $args['section_class'] );
	}
	?>
	<section<?php echo $section_id ? ' id="' . esc_attr( $section_id ) . '"' : ''; ?> class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>" aria-labelledby="<?php echo esc_attr( $title_id ); ?>">
		<div class="sl-wrap">
			<div class="sl-sbcs__intro">
				<span class="sl-eyebrow sl-home-sub-heading">
					<?php esc_html_e( 'Security Behaviour & Culture Suite', 'succeedlearn-amp' ); ?>
				</span>

				<h2 id="<?php echo esc_attr( $title_id ); ?>" class="sl-h2">
					<?php esc_html_e( 'From Awareness to', 'succeedlearn-amp' ); ?>
					<span><?php esc_html_e( 'Real-World Readiness', 'succeedlearn-amp' ); ?></span>
				</h2>

				<p>
					<?php esc_html_e( 'As part of the SucceedLEARN Security Behaviour & Culture Suite, continuous learning, reinforcement, engagement, testing and measurement work together to help organisations build stronger security behaviours.', 'succeedlearn-amp' ); ?>
				</p>
			</div>

			<?php if ( '' !== (string) $args['image'] ) : ?>
				<div class="sl-sbcs__media">
					<div class="sl-sbcs__image">
						<amp-img
							src="<?php echo esc_url( $args['image'] ); ?>"
							width="1254"
							height="1254"
							layout="responsive"
							alt="<?php echo esc_attr( $args['image_alt'] ); ?>"
						></amp-img>
					</div>
				</div>
			<?php endif; ?>

			<div class="sl-sbcs__journey">
				<?php foreach ( succeedlearn_amp_get_sbcs_items() as $index => $item ) : ?>
					<div class="sl-sbcs__step">
						<div class="sl-sbcs__step-marker" aria-hidden="true">
							<?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?>
						</div>
						<div class="sl-sbcs__step-content">
							<div class="sl-sbcs__step-heading">
								<h3 class="sl-panel-title"><?php echo esc_html( $item['name'] ); ?></h3>
								<span class="sl-sbcs__step-action"><?php echo esc_html( $item['action'] ); ?></span>
							</div>
							<p><?php echo esc_html( $item['description'] ); ?></p>
						</div>
					</div>
				<?php endforeach; ?>
			</div>

			<div class="sl-sbcs__closing">
				<p>
					<strong><?php esc_html_e( 'Together, these solutions create a continuous cycle of learning, testing, reinforcement and measurement.', 'succeedlearn-amp' ); ?></strong>
				</p>
			</div>
		</div>
	</section>
	<?php
}
