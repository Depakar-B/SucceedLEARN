<?php
/**
 * Cybersecurity Awareness AMP — Integration section.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$integration_image = succeedlearn_amp_get_csa_integration_image();
$items             = array(
	array(
		'label' => __( 'Integrations', 'succeedlearn-amp' ),
		'text'  => __( 'Free integration setup with your favourite enterprise tools', 'succeedlearn-amp' ),
	),
	array(
		'label' => __( 'SSO', 'succeedlearn-amp' ),
		'text'  => __( 'Entra ID, OneLogin, Okta, JumpCloud and Google Workspace', 'succeedlearn-amp' ),
	),
	array(
		'label' => __( 'HRIS Systems', 'succeedlearn-amp' ),
		'text'  => __( 'Darwinbox, Keka, Workday and more', 'succeedlearn-amp' ),
	),
	array(
		'label' => __( 'GRC Systems', 'succeedlearn-amp' ),
		'text'  => __( 'Vanta customers receive a 50% discount on the price', 'succeedlearn-amp' ),
	),
);
?>
<section class="sl-section sl-section--alt sl-csa-integration" aria-labelledby="sl-csa-integration-title">
	<div class="sl-wrap sl-csa-two-col">
		<div>
			<span class="sl-home-sub-heading"><?php esc_html_e( 'Free Integration Setup', 'succeedlearn-amp' ); ?></span>
			<h2 id="sl-csa-integration-title" class="sl-h2">
				<?php echo wp_kses_post( __( 'Built to work with your <span>Microsoft environment.</span>', 'succeedlearn-amp' ) ); ?>
			</h2>
			<p class="sl-lead">
				<?php esc_html_e( 'Connect the campaign with the enterprise tools your team already uses. Standard integration setup is included at no additional cost.', 'succeedlearn-amp' ); ?>
			</p>
			<dl class="sl-csa-integration__list">
				<?php foreach ( $items as $item ) : ?>
					<div>
						<dt><?php echo esc_html( $item['label'] ); ?></dt>
						<dd><?php echo esc_html( $item['text'] ); ?></dd>
					</div>
				<?php endforeach; ?>
			</dl>
		</div>
		<div class="sl-csa-integration__visual">
			<div class="sl-csa-integration__image">
				<amp-img
					src="<?php echo esc_url( $integration_image ); ?>"
					width="1200"
					height="940"
					layout="responsive"
					alt="<?php esc_attr_e( 'Enterprise tools connected to your Microsoft environment', 'succeedlearn-amp' ); ?>"
				></amp-img>
			</div>
		</div>
	</div>
</section>
