<?php
/**
 * AMP contact form partial.
 *
 * @package SucceedLEARN\AMP
 *
 * @var string $form_page
 * @var string $form_page_url
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$form_page     = isset( $form_page ) ? $form_page : 'Home';
$form_page_url = isset( $form_page_url ) ? $form_page_url : home_url( '/' );
$action        = esc_url_raw( rest_url( 'succeedlearn-amp/v1/contact' ) );
$privacy_url   = home_url( '/privacy-policy/' );
$form_ts       = (string) time();
$form_sig      = wp_hash( $form_ts . '|' . $form_page_url, 'nonce' );
?>
<form
	class="slcf-form"
	method="post"
	action-xhr="<?php echo esc_url( $action ); ?>"
	custom-validation-reporting="show-all-on-submit"
	target="_top"
>
	<input type="hidden" name="contact_form" value="1" />
	<input type="hidden" name="amp_submission" value="1" />
	<input type="hidden" name="form_page" value="<?php echo esc_attr( $form_page ); ?>" />
	<input type="hidden" name="form_page_url" value="<?php echo esc_url( $form_page_url ); ?>" />
	<input type="hidden" name="utm_source" value="succeedlearn" />
	<input type="hidden" name="form_ts" value="<?php echo esc_attr( $form_ts ); ?>" />
	<input type="hidden" name="form_sig" value="<?php echo esc_attr( $form_sig ); ?>" />

	<div class="slcf-honeypot" aria-hidden="true">
		<label><?php esc_html_e( 'Website', 'succeedlearn-amp' ); ?>
			<input type="text" name="website_url" tabindex="-1" autocomplete="off" />
		</label>
	</div>

	<label class="slcf-field">
		<span><?php esc_html_e( 'Full Name *', 'succeedlearn-amp' ); ?></span>
		<input type="text" name="name" required />
	</label>

	<label class="slcf-field">
		<span><?php esc_html_e( 'Work Email *', 'succeedlearn-amp' ); ?></span>
		<input type="email" name="email" required />
	</label>

	<label class="slcf-field">
		<span><?php esc_html_e( 'Phone *', 'succeedlearn-amp' ); ?></span>
		<input type="tel" name="phone" required pattern="[6-9][0-9]{9}" title="<?php esc_attr_e( '10-digit mobile number', 'succeedlearn-amp' ); ?>" />
	</label>

	<label class="slcf-field">
		<span><?php esc_html_e( 'Organisation', 'succeedlearn-amp' ); ?></span>
		<input type="text" name="org" />
	</label>

	<label class="slcf-field">
		<span><?php esc_html_e( 'Message', 'succeedlearn-amp' ); ?></span>
		<textarea name="msg" rows="4"></textarea>
	</label>

	<label class="slcf-check">
		<input type="checkbox" name="privacy" value="1" required />
		<span><?php esc_html_e( 'I agree to the Privacy Policy', 'succeedlearn-amp' ); ?>
			(<a href="<?php echo esc_url( $privacy_url ); ?>" target="_blank" rel="noopener"><?php esc_html_e( 'view', 'succeedlearn-amp' ); ?></a>)
		</span>
	</label>

	<label class="slcf-check">
		<input type="checkbox" name="posh" value="1" />
		<span><?php esc_html_e( 'Send me SucceedLEARN product updates', 'succeedlearn-amp' ); ?></span>
	</label>

	<button type="submit" class="slcf-submit"><?php esc_html_e( 'Request Demo', 'succeedlearn-amp' ); ?></button>

	<div submit-success>
		<template type="amp-mustache">
			<p class="slcf-success">{{output_message}}</p>
		</template>
	</div>
	<div submit-error>
		<template type="amp-mustache">
			<p class="slcf-error">{{output_message}}</p>
		</template>
	</div>
</form>
