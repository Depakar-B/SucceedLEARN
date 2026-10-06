<?php
/**
 * ISO 27001 AMP — Customise the training.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$customise_items = succeedlearn_amp_get_iso27001_customise_items();
$customise_image = succeedlearn_amp_get_iso27001_customise_image();
?>
<section
	class="sl-iso27-customise"
	id="customise-the-training"
	aria-labelledby="sl-iso27-customise-title"
>
	<div class="sl-wrap">
		<div class="sl-iso27-customise__grid">
			<div class="sl-iso27-customise__content">
				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Customisation', 'succeedlearn-amp' ); ?>
				</span>

				<h2 id="sl-iso27-customise-title" class="sl-h2">
					<?php esc_html_e( 'Learning That Reflects', 'succeedlearn-amp' ); ?>
					<span><?php esc_html_e( 'Your Organisation', 'succeedlearn-amp' ); ?></span>
				</h2>

				<p>
					<?php esc_html_e( 'ISO 27001 awareness becomes more meaningful when employees can connect general information security principles with the policies and procedures they are expected to follow internally. Depending on the agreed customization scope, the training can be adapted to incorporate organization-specific elements such as:', 'succeedlearn-amp' ); ?>
				</p>

				<ul class="sl-iso27-customise__list">
					<?php foreach ( $customise_items as $item ) : ?>
						<li><?php echo esc_html( $item ); ?></li>
					<?php endforeach; ?>
				</ul>
			</div>

			<div class="sl-iso27-customise__media">
				<div class="sl-iso27-customise__image">
					<amp-img
						src="<?php echo esc_url( $customise_image ); ?>"
						width="720"
						height="540"
						layout="responsive"
						alt="<?php esc_attr_e( 'Customisable ISO 27001:2022 staff awareness training for your organisation', 'succeedlearn-amp' ); ?>"
					></amp-img>
				</div>
			</div>
		</div>
	</div>
</section>
