<?php
/**
 * Legacy AMP contact form partial (fallback when SCF is unavailable).
 *
 * Matches the common contact form field set:
 * - default: name, email, interested in, message, privacy
 * - course:  name, email, message, privacy
 *
 * @package SucceedLEARN\AMP
 *
 * @var string $form_page
 * @var string $form_page_url
 * @var string $form_variant
 * @var string $form_title
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$form_page     = isset( $form_page ) ? $form_page : 'Home';
$form_page_url = isset( $form_page_url ) ? $form_page_url : home_url( '/' );
$form_variant  = ( isset( $form_variant ) && 'course' === $form_variant ) ? 'course' : 'default';
$is_course     = ( 'course' === $form_variant );
$form_title    = isset( $form_title ) ? trim( (string) $form_title ) : '';
if ( $is_course && '' === $form_title ) {
	$form_title = __( 'Request a Demo', 'succeedlearn-amp' );
}

$action      = esc_url_raw( rest_url( 'succeedlearn-amp/v1/contact' ) );
$privacy_url = home_url( '/privacy-policy/' );
$form_ts     = (string) time();
$form_sig    = wp_hash( $form_ts . '|' . $form_page_url, 'nonce' );

$interest_options = array(
	'Security Awareness & Phishing',
	'Financial Crime Prevention',
	'ESG Awareness',
	'Custom Development',
	'POSH India',
	'Others',
);
?>
<div class="scf-form-wrap<?php echo $is_course ? ' scf-form-wrap-course' : ''; ?>">
	<?php if ( $is_course && '' !== $form_title ) : ?>
		<h2 class="scf-form-title"><?php echo esc_html( $form_title ); ?></h2>
	<?php endif; ?>

	<form
		class="scf-form slcf-form"
		method="post"
		action-xhr="<?php echo esc_url( $action ); ?>"
		custom-validation-reporting="show-all-on-submit"
		target="_top"
	>
		<input type="hidden" name="contact_form" value="1" />
		<input type="hidden" name="amp_submission" value="1" />
		<input type="hidden" name="scf_form_variant" value="<?php echo esc_attr( $form_variant ); ?>" />
		<input type="hidden" name="form_page" value="<?php echo esc_attr( $form_page ); ?>" />
		<input type="hidden" name="form_page_url" value="<?php echo esc_url( $form_page_url ); ?>" />
		<input type="hidden" name="utm_source" value="succeedlearn" />
		<input type="hidden" name="form_ts" value="<?php echo esc_attr( $form_ts ); ?>" />
		<input type="hidden" name="form_sig" value="<?php echo esc_attr( $form_sig ); ?>" />

		<div class="scf-honeypot slcf-honeypot" aria-hidden="true">
			<label><?php esc_html_e( 'Website', 'succeedlearn-amp' ); ?>
				<input type="text" name="website_url" tabindex="-1" autocomplete="off" />
			</label>
		</div>

		<div class="scf-field">
			<label for="slcf-name"><?php esc_html_e( 'Full Name', 'succeedlearn-amp' ); ?> <span class="scf-required">*</span></label>
			<input type="text" id="slcf-name" name="name" required />
		</div>

		<div class="scf-field">
			<label for="slcf-email"><?php esc_html_e( 'Work Email', 'succeedlearn-amp' ); ?> <span class="scf-required">*</span></label>
			<input type="email" id="slcf-email" name="email" required />
		</div>

		<?php if ( ! $is_course ) : ?>
			<div class="scf-field">
				<label><?php esc_html_e( 'Interested In', 'succeedlearn-amp' ); ?> <span class="scf-required">*</span></label>
				<div class="scf-interest-group" role="group">
					<?php foreach ( $interest_options as $index => $option ) : ?>
						<div class="scf-interest-option">
							<input
								type="checkbox"
								id="<?php echo esc_attr( 'slcf-interest-' . $index ); ?>"
								name="course_interest[]"
								value="<?php echo esc_attr( $option ); ?>"
							/>
							<label for="<?php echo esc_attr( 'slcf-interest-' . $index ); ?>"><?php echo esc_html( $option ); ?></label>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		<?php endif; ?>

		<div class="scf-field">
			<label for="slcf-message"><?php esc_html_e( 'Your Message', 'succeedlearn-amp' ); ?></label>
			<textarea id="slcf-message" name="msg" rows="3"></textarea>
		</div>

		<div class="scf-field scf-checkbox">
			<input type="checkbox" id="slcf-privacy" name="privacy" value="1" required />
			<label for="slcf-privacy">
				<?php
				printf(
					/* translators: %s: privacy policy URL */
					wp_kses(
						__( 'I Accept <a href="%s" target="_blank" rel="noopener">privacy policy</a>', 'succeedlearn-amp' ),
						array(
							'a' => array(
								'href'   => true,
								'target' => true,
								'rel'    => true,
							),
						)
					),
					esc_url( $privacy_url )
				);
				?>
				<span class="scf-required">*</span>
			</label>
		</div>

		<button type="submit" class="scf-submit slcf-submit"><?php esc_html_e( 'Submit', 'succeedlearn-amp' ); ?></button>

		<div submit-success>
			<template type="amp-mustache">
				<p class="scf-response scf-success slcf-success">{{output_message}}</p>
			</template>
		</div>
		<div submit-error>
			<template type="amp-mustache">
				<p class="scf-response scf-error slcf-error">{{output_message}}</p>
			</template>
		</div>
	</form>
</div>
