<?php
/**
 * S-Aware AMP — Security Behaviour & Culture Suite (image at end).
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$suite_items = succeedlearn_amp_get_sa_suite_items();
$suite_image = succeedlearn_amp_get_sa_suite_image();
?>
<section
	id="from-awareness-to-behaviour-change"
	class="sl-sbcs sl-sbcs--media-end sl-sbcs--bg-white"
	aria-labelledby="security-behaviour-culture-suite-title"
>
	<div class="sl-wrap">
		<div class="sl-sbcs__intro">
			<span class="sl-home-sub-heading"><?php esc_html_e( 'Security Behaviour & Culture Suite', 'succeedlearn-amp' ); ?></span>
			<h2 id="security-behaviour-culture-suite-title" class="sl-h2">
				<?php esc_html_e( 'From Awareness to', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'Real-World Readiness', 'succeedlearn-amp' ); ?></span>
			</h2>
			<p><?php esc_html_e( 'As part of the SucceedLEARN Security Behaviour & Culture Suite, continuous learning, reinforcement, engagement, testing and measurement work together to help organisations build stronger security behaviours.', 'succeedlearn-amp' ); ?></p>
		</div>

		<div class="sl-sbcs__layout sl-sbcs__layout--stack">
			<div class="sl-sbcs__journey">
				<div class="sl-sbcs__journey-line" aria-hidden="true"></div>
				<?php foreach ( $suite_items as $index => $item ) : ?>
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
			<div class="sl-sbcs__media">
				<div class="sl-sbcs__image">
					<amp-img
						src="<?php echo esc_url( $suite_image ); ?>"
						width="720"
						height="900"
						layout="responsive"
						alt="<?php esc_attr_e( 'From Awareness to Real-World Readiness', 'succeedlearn-amp' ); ?>"
					></amp-img>
				</div>
			</div>
		</div>

		<div class="sl-sbcs__closing">
			<p>
				<strong><?php esc_html_e( 'Together, these solutions create a continuous cycle of learning, testing, reinforcement and measurement.', 'succeedlearn-amp' ); ?></strong>
			</p>
		</div>
	</div>
</section>
