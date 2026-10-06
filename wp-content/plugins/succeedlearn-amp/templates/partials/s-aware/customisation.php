<?php
/**
 * S-Aware AMP — Customisation (content first, image at end).
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$items = succeedlearn_amp_get_sa_customisation_items();
$image = succeedlearn_amp_get_sa_customisation_image();
?>
<section class="sl-saware-customisation" aria-labelledby="saware-customisation-title">
	<div class="sl-wrap">
		<div class="sl-saware-customisation__stack">
			<div class="sl-saware-customisation__content">
				<span class="sl-home-sub-heading"><?php esc_html_e( 'Customised Learning', 'succeedlearn-amp' ); ?></span>
				<h2 id="saware-customisation-title" class="sl-h2">
					<?php esc_html_e( 'Learning That Reflects Your', 'succeedlearn-amp' ); ?>
					<span><?php esc_html_e( 'Organisation', 'succeedlearn-amp' ); ?></span>
				</h2>
				<div class="sl-saware-customisation__intro">
					<p><?php esc_html_e( 'Generic cybersecurity principles are important, but employees also need to understand how security applies within their own organisation.', 'succeedlearn-amp' ); ?></p>
					<p><?php esc_html_e( 'S-Aware can support customised learning experiences that incorporate organisation-specific requirements into the broader awareness programme.', 'succeedlearn-amp' ); ?></p>
					<p><?php esc_html_e( 'Depending on the agreed scope, organisations can adapt learning to reflect elements such as:', 'succeedlearn-amp' ); ?></p>
				</div>
				<ul class="sl-saware-customisation__list" role="list">
					<?php foreach ( $items as $item ) : ?>
						<li class="sl-saware-customisation__list-item"><?php echo esc_html( $item ); ?></li>
					<?php endforeach; ?>
				</ul>
				<div class="sl-saware-customisation__highlight">
					<p><?php esc_html_e( 'This helps connect general cybersecurity knowledge with the policies and behaviours employees are expected to follow within their own workplace.', 'succeedlearn-amp' ); ?></p>
				</div>
			</div>
			<div class="sl-saware-customisation__media">
				<div class="sl-saware-customisation__image">
					<amp-img
						src="<?php echo esc_url( $image ); ?>"
						width="720"
						height="900"
						layout="responsive"
						alt="<?php esc_attr_e( 'Learning that reflects your organisation', 'succeedlearn-amp' ); ?>"
					></amp-img>
				</div>
			</div>
		</div>
	</div>
</section>
