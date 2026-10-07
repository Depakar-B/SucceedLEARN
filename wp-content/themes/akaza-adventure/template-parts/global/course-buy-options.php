<?php
/**
 * Global "For Individuals" + "For Organisations" sections for course pages.
 * Same layout as the AML PE/VC individuals / organisations sections.
 *
 * Usage:
 * get_template_part( 'template-parts/global/course-buy-options', null, array( ... ) );
 *
 * Args:
 * - course (string) short course name used in headings, e.g. "ABAC"
 * - duration (string) optional, e.g. "30-minute duration"
 * - contact (string) anchor for buy / demo buttons (default #contact)
 * - suite (string) anchor for the organisation "Explore More" button (default #fcp-suite)
 * - individual_image (string) optional image URL; a placeholder is shown when empty
 * - price (string) optional, e.g. "$18" → "Buy Now @ $18"
 * - certificate (bool) optional, include the individual CPD certificate feature (default true)
 *
 * @package Akaza_Adventure
 */

defined( 'ABSPATH' ) || exit;

$args             = is_array( $args ?? null ) ? $args : array();
$course           = isset( $args['course'] ) ? (string) $args['course'] : '';
$duration         = isset( $args['duration'] ) ? (string) $args['duration'] : '';
$contact          = isset( $args['contact'] ) ? (string) $args['contact'] : '#contact';
$suite            = isset( $args['suite'] ) ? (string) $args['suite'] : '#fcp-suite';
$individual_image = isset( $args['individual_image'] ) ? (string) $args['individual_image'] : 'https://succeedlearn.com/wp-content/uploads/2026/09/Image-1-AML.webp';
$price            = isset( $args['price'] ) ? (string) $args['price'] : '';
$show_certificate = ! isset( $args['certificate'] ) || (bool) $args['certificate'];

if ( '' === $course ) {
	return;
}

$individual_features = array(
	array(
		'title' => __( 'Interactive eLearning', 'akaza-adventure' ),
		/* translators: %s: course name. */
		'text'  => sprintf( __( 'Practical digital learning supported by %s scenarios and knowledge checks.', 'akaza-adventure' ), $course ),
	),
	array(
		'title' => '' !== $duration ? $duration : __( 'Focused, self-paced learning', 'akaza-adventure' ),
		/* translators: %s: course name. */
		'text'  => sprintf( __( 'Complete the core %s learning at your own pace.', 'akaza-adventure' ), $course ),
	),
);

if ( $show_certificate ) {
	$individual_features[] = array(
		'title' => __( 'CPD Certificate on Completion', 'akaza-adventure' ),
		'text'  => __( 'Receive a completion certificate after successfully finishing the learning.', 'akaza-adventure' ),
	);
}

$individual_features[] = array(
	'title' => __( 'Instant access', 'akaza-adventure' ),
	'text'  => __( 'Start learning immediately after purchase.', 'akaza-adventure' ),
);

$organisation_features = array(
	array(
		'title' => __( 'Reporting and tracking', 'akaza-adventure' ),
		'text'  => __( 'Monitor learner progress, completion and training status.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Automatic reminders', 'akaza-adventure' ),
		'text'  => __( 'Support completion with automated learner reminders.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'SCORM or SaaS delivery', 'akaza-adventure' ),
		'text'  => __( 'Deploy through your LMS or use the SucceedLEARN platform.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Group assignment', 'akaza-adventure' ),
		/* translators: %s: course name. */
		'text'  => sprintf( __( 'Assign %s training to selected teams or learner groups.', 'akaza-adventure' ), $course ),
	),
	array(
		'title' => __( 'Completion visibility', 'akaza-adventure' ),
		'text'  => __( 'Give administrators clear oversight of learner activity.', 'akaza-adventure' ),
	),
);
?>

<section
	id="individuals"
	class="sl-buy-options sl-buy-options--individuals"
	aria-labelledby="sl-buy-options-individuals-title"
>
	<div class="container">
		<div class="sl-buy-options__grid">

			<div class="sl-buy-options__content">
				<span class="sl-home-sub-heading">
					<?php
					/* translators: %s: course name. */
					echo esc_html( sprintf( __( 'Individual %s eLearning', 'akaza-adventure' ), $course ) );
					?>
				</span>

				<h2 id="sl-buy-options-individuals-title">
					<?php
					/* translators: %s: course name. */
					echo esc_html( sprintf( __( '%s Training', 'akaza-adventure' ), $course ) );
					?>
					<span><?php esc_html_e( 'For Individuals', 'akaza-adventure' ); ?></span>
					<?php esc_html_e( '- Start Immediately', 'akaza-adventure' ); ?>
				</h2>

				<p class="sl-buy-options__lead">
					<?php
					/* translators: %s: course name. */
					echo esc_html( sprintf( __( 'A focused learning experience for professionals who want practical %s awareness without a lengthy training commitment.', 'akaza-adventure' ), $course ) );
					?>
				</p>

				<ul class="sl-buy-options__features">
					<?php foreach ( $individual_features as $index => $feature ) : ?>
						<li class="sl-buy-options__feature">
							<span class="sl-buy-options__feature-num" aria-hidden="true"><?php echo esc_html( sprintf( '%02d', $index + 1 ) ); ?></span>
							<div>
								<strong><?php echo esc_html( $feature['title'] ); ?></strong>
								<span><?php echo esc_html( $feature['text'] ); ?></span>
							</div>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>

			<div class="sl-buy-options__media">
				<?php if ( '' !== $individual_image ) : ?>
					<figure class="sl-buy-options__image">
						<img
							src="<?php echo esc_url( $individual_image ); ?>"
							alt="<?php echo esc_attr( sprintf( /* translators: %s: course name. */ __( 'Individual %s course preview', 'akaza-adventure' ), $course ) ); ?>"
							loading="lazy"
							decoding="async"
						>
					</figure>
				<?php else : ?>
					<div
						class="sl-buy-options__placeholder"
						role="img"
						aria-label="<?php echo esc_attr( sprintf( /* translators: %s: course name. */ __( 'Individual %s course preview placeholder', 'akaza-adventure' ), $course ) ); ?>"
					>
						<span><?php esc_html_e( 'Image placeholder', 'akaza-adventure' ); ?></span>
					</div>
				<?php endif; ?>

				<div class="sl-buy-options__actions">
					<a class="sl-content-btn sl-content-btn-primary" href="<?php echo esc_attr( $contact ); ?>">
						<?php
						if ( '' !== $price ) {
							/* translators: %s: course price, e.g. "$18". */
							echo esc_html( sprintf( __( 'Buy Now @ %s', 'akaza-adventure' ), $price ) );
						} else {
							esc_html_e( 'Buy Now', 'akaza-adventure' );
						}
						?>
					</a>
					<a class="sl-content-btn sl-content-btn-secondary" href="<?php echo esc_attr( $contact ); ?>">
						<?php esc_html_e( 'Request Demo', 'akaza-adventure' ); ?>
					</a>
				</div>
			</div>

		</div>
	</div>
</section>

<section
	id="organisations"
	class="sl-buy-options sl-buy-options--organisations"
	aria-labelledby="sl-buy-options-organisations-title"
>
	<div class="container">
		<div class="sl-buy-options__grid">

			<div class="sl-buy-options__media">
				<figure class="sl-buy-options__image">
					<img
						src="<?php echo esc_url( 'https://succeedlearn.com/wp-content/uploads/2026/09/organisation-image-1.webp' ); ?>"
						alt="<?php esc_attr_e( 'Organisational Training Dashboard', 'akaza-adventure' ); ?>"
						loading="lazy"
						decoding="async"
					>
				</figure>

				<div class="sl-buy-options__actions">
					<a class="sl-content-btn sl-content-btn-primary" href="<?php echo esc_attr( $contact ); ?>">
						<?php esc_html_e( 'Request Demo', 'akaza-adventure' ); ?>
					</a>
					<a class="sl-content-btn sl-content-btn-secondary" href="<?php echo esc_attr( $suite ); ?>">
						<?php esc_html_e( 'Explore More', 'akaza-adventure' ); ?>
					</a>
				</div>
			</div>

			<div class="sl-buy-options__content">
				<span class="sl-home-sub-heading">
					<?php
					/* translators: %s: course name. */
					echo esc_html( sprintf( __( 'Enterprise %s eLearning', 'akaza-adventure' ), $course ) );
					?>
				</span>

				<h2 id="sl-buy-options-organisations-title">
					<?php
					/* translators: %s: course name. */
					echo esc_html( sprintf( __( '%s Training', 'akaza-adventure' ), $course ) );
					?>
					<span><?php esc_html_e( 'For Organisations', 'akaza-adventure' ); ?></span>
					<?php esc_html_e( '- Built for Scale', 'akaza-adventure' ); ?>
				</h2>

				<p class="sl-buy-options__lead">
					<?php
					/* translators: %s: course name. */
					echo esc_html( sprintf( __( 'Deliver %s awareness across teams while giving administrators the controls needed to assign training, monitor completion and manage recurring compliance activity.', 'akaza-adventure' ), $course ) );
					?>
				</p>

				<ul class="sl-buy-options__features">
					<?php foreach ( $organisation_features as $index => $feature ) : ?>
						<li class="sl-buy-options__feature">
							<span class="sl-buy-options__feature-num" aria-hidden="true"><?php echo esc_html( sprintf( '%02d', $index + 1 ) ); ?></span>
							<div>
								<strong><?php echo esc_html( $feature['title'] ); ?></strong>
								<span><?php echo esc_html( $feature['text'] ); ?></span>
							</div>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>

		</div>
	</div>
</section>
