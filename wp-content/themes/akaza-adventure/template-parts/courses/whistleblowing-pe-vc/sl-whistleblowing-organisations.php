<?php
/**
 * SucceedLEARN
 * Whistleblowing Training for PE/VC — For Organisations
 *
 * @package Akaza_Adventure
 */

defined( 'ABSPATH' ) || exit;

$features = array(
	array(
		'num'   => '01',
		'title' => __( 'Reporting and tracking', 'akaza-adventure' ),
		'text'  => __( 'Monitor learner progress, completion and training status.', 'akaza-adventure' ),
	),
	array(
		'num'   => '02',
		'title' => __( 'Automatic reminders', 'akaza-adventure' ),
		'text'  => __( 'Support completion with automated learner reminders.', 'akaza-adventure' ),
	),
	array(
		'num'   => '03',
		'title' => __( 'SCORM or SaaS delivery', 'akaza-adventure' ),
		'text'  => __( 'Deploy through your LMS or use the SucceedLEARN platform.', 'akaza-adventure' ),
	),
	array(
		'num'   => '04',
		'title' => __( 'Group assignment', 'akaza-adventure' ),
		'text'  => __( 'Assign whistleblowing training to selected teams or learner groups.', 'akaza-adventure' ),
	),
	array(
		'num'   => '05',
		'title' => __( 'Completion visibility', 'akaza-adventure' ),
		'text'  => __( 'Give administrators clear oversight of learner activity.', 'akaza-adventure' ),
	),
);
?>

<section
	id="organisations"
	class="sl-whistleblowing-organisations"
	aria-labelledby="sl-whistleblowing-organisations-title"
>
	<div class="container">

		<div class="sl-whistleblowing-organisations__grid">

			<div class="sl-whistleblowing-organisations__media">
				<figure class="sl-whistleblowing-organisations__image">
					<img
						src="<?php echo esc_url( 'https://succeedlearn.com/wp-content/uploads/2026/09/Image-2.webp' ); ?>"
						alt="<?php esc_attr_e( 'Organisational Training Dashboard', 'akaza-adventure' ); ?>"
						loading="lazy"
						decoding="async"
					>
				</figure>

				<div class="sl-whistleblowing-organisations__actions">
					<a class="sl-content-btn sl-content-btn-primary" href="#contact">
						<?php esc_html_e( 'Request Demo', 'akaza-adventure' ); ?>
					</a>
					<a class="sl-content-btn sl-content-btn-secondary" href="#pevc-suite">
						<?php esc_html_e( 'Explore More', 'akaza-adventure' ); ?>
					</a>
				</div>
			</div>

			<div class="sl-whistleblowing-organisations__content">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Enterprise Whistleblowing eLearning', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-whistleblowing-organisations-title">
					<?php
					echo wp_kses_post(
						__(
							'Whistleblowing Training <span>For Organisations</span>',
							'akaza-adventure'
						)
					);
					?>
				</h2>

				<p>
					<?php
					esc_html_e(
						'Deliver whistleblowing awareness across teams while giving administrators the controls needed to assign training, monitor completion and manage recurring compliance activity.',
						'akaza-adventure'
					);
					?>
				</p>

				<ul class="sl-whistleblowing-organisations__features">
					<?php foreach ( $features as $feature ) : ?>
						<li class="sl-whistleblowing-organisations__feature">
							<span class="sl-whistleblowing-organisations__feature-num" aria-hidden="true">
								<?php echo esc_html( $feature['num'] ); ?>
							</span>
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
