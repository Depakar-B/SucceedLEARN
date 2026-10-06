<?php
/**
 * S-Aware AMP — Why (content first, image at end).
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$why_image = succeedlearn_amp_get_sa_why_image();
?>
<section class="sl-saware-why" aria-labelledby="sl-saware-why-title">
	<div class="sl-wrap">
		<div class="sl-saware-why__stack">
			<div class="sl-saware-why__content">
				<span class="sl-home-sub-heading"><?php esc_html_e( 'Why S-Aware?', 'succeedlearn-amp' ); ?></span>
				<h2 id="sl-saware-why-title" class="sl-h2">
					<?php esc_html_e( 'Why', 'succeedlearn-amp' ); ?>
					<span><?php esc_html_e( 'Security Awareness Training?', 'succeedlearn-amp' ); ?></span>
				</h2>
				<div class="sl-saware-why__copy">
					<p><?php esc_html_e( 'Most organisations conduct annual security awareness training to satisfy compliance requirements. However, awareness alone does not always translate into secure day-to-day behaviour.', 'succeedlearn-amp' ); ?></p>
					<p><?php esc_html_e( 'S-Aware is designed to establish that critical foundation by equipping employees with practical cybersecurity knowledge through engaging, scenario-based learning aligned with global security and privacy regulations. It forms the first layer of the SucceedLEARN Security Behaviour & Culture Suite.', 'succeedlearn-amp' ); ?></p>
					<p><?php esc_html_e( 'Instead of treating awareness as a box to tick, S-Aware helps organisations establish the knowledge and understanding required to support stronger security behaviours over time.', 'succeedlearn-amp' ); ?></p>
				</div>
			</div>
			<div class="sl-saware-why__media">
				<div class="sl-saware-why__image">
					<amp-img
						src="<?php echo esc_url( $why_image ); ?>"
						width="720"
						height="900"
						layout="responsive"
						alt="<?php esc_attr_e( 'Why S-Aware security awareness training', 'succeedlearn-amp' ); ?>"
					></amp-img>
				</div>
			</div>
		</div>
	</div>
</section>
