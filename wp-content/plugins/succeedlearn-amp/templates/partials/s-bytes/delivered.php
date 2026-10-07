<?php
/**
 * S-Bytes AMP — Awareness Delivered Where Employees Already Work.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$delivered_image = succeedlearn_amp_get_sbytes_delivered_image();
?>
<section id="awareness-delivered" class="sl-sbytes-delivered" aria-labelledby="sl-sbytes-delivered-title">
	<div class="sl-wrap">
		<div class="sl-sbytes-delivered__layout">
			<div class="sl-sbytes-delivered__content">
				<span class="sl-home-sub-heading"><?php esc_html_e( 'Easy Access', 'succeedlearn-amp' ); ?></span>
				<h2 id="sl-sbytes-delivered-title" class="sl-h2">
					<?php esc_html_e( 'Awareness Delivered Where Employees', 'succeedlearn-amp' ); ?>
					<span><?php esc_html_e( 'Already Work', 'succeedlearn-amp' ); ?></span>
				</h2>
				<h3 class="sl-panel-title"><?php esc_html_e( 'Less Friction. More Opportunity to Learn.', 'succeedlearn-amp' ); ?></h3>
				<div class="sl-sbytes-delivered__body">
					<p><?php esc_html_e( 'One of the biggest barriers to continuous learning is friction. Another login. Another platform. Another password. Another lengthy course. FunFoSec is designed to make microlearning easier to access.', 'succeedlearn-amp' ); ?></p>
					<p><?php esc_html_e( 'Unique learning links can be delivered directly to employees through email, WhatsApp or teams allowing them to access short awareness content by clicking on the link, without requiring an additional learner login. This makes it easier for organisations to introduce frequent awareness touchpoints while keeping the employee experience straightforward.', 'succeedlearn-amp' ); ?></p>
				</div>
				<p class="sl-sbytes-tagline"><?php esc_html_e( 'Open. Watch. Learn. Get back to work.', 'succeedlearn-amp' ); ?></p>
			</div>
			<div class="sl-sbytes-delivered__media">
				<div class="sl-sbytes-delivered__image">
					<amp-img
						src="<?php echo esc_url( $delivered_image ); ?>"
						width="960"
						height="720"
						layout="responsive"
						alt="<?php esc_attr_e( 'Awareness delivered where employees work through email, WhatsApp and Teams', 'succeedlearn-amp' ); ?>"
					></amp-img>
				</div>
			</div>
		</div>
	</div>
</section>
