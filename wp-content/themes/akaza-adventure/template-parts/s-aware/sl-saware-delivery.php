<?php
/**
 * SucceedLEARN — S-Aware
 *
 * Section: Flexible Delivery for Your Learning Environment
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$delivery_options = array(
	array(
		'title'   => __( 'SucceedLEARN SaaS Platform', 'akaza-adventure' ),
		'content' => array(
			__(
				'Deliver and manage security awareness directly through the SucceedLEARN learning environment, providing employees with access to assigned learning while enabling organisations to manage and monitor programme activity.',
				'akaza-adventure'
			),
		),
	),
	array(
		'title'   => __( 'SCORM for Your Existing LMS', 'akaza-adventure' ),
		'content' => array(
			__(
				'Already have an LMS?',
				'akaza-adventure'
			),
			__(
				'S-Aware content can be provided in SCORM-compatible formats, enabling organisations to deploy selected security awareness learning through their existing Learning Management System.',
				'akaza-adventure'
			),
			__(
				'This gives organisations the flexibility to strengthen security awareness without necessarily introducing an additional learning platform.',
				'akaza-adventure'
			),
		),
	),
);

?>

<section class="sl-saware-delivery" aria-labelledby="saware-delivery-title">

	<div class="container">

		<div class="sl-saware-delivery__intro-block">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Flexible Delivery', 'akaza-adventure' ); ?>
			</span>

			<h2 id="saware-delivery-title">
				<?php esc_html_e( 'Flexible Delivery for Your', 'akaza-adventure' ); ?>
				<span>
					<?php esc_html_e( 'Learning Environment', 'akaza-adventure' ); ?>
				</span>
			</h2>

			<div class="sl-saware-delivery__intro">

				<p>
					<?php
					esc_html_e(
						'Every organisation has a different learning technology environment.',
						'akaza-adventure'
					);
					?>
				</p>

				<p>
					<?php
					esc_html_e(
						'S-Aware provides flexible delivery options that allow organisations to implement security awareness in the way that best fits their existing infrastructure.',
						'akaza-adventure'
					);
					?>
				</p>

			</div>

		</div>

		<div class="sl-saware-delivery__options">

			<?php foreach ( $delivery_options as $index => $option ) : ?>

				<article class="sl-saware-delivery__option">

					<div class="sl-saware-delivery__option-header">

						<span class="sl-saware-delivery__option-number" aria-hidden="true">
							<?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?>
						</span>

						<h3 class="sl-panel-title">
							<?php echo esc_html( $option['title'] ); ?>
						</h3>

					</div>

					<div class="sl-saware-delivery__option-content">

						<?php foreach ( $option['content'] as $paragraph ) : ?>

							<p>
								<?php echo esc_html( $paragraph ); ?>
							</p>

						<?php endforeach; ?>

					</div>

				</article>

			<?php endforeach; ?>

		</div>

	</div>

</section>
