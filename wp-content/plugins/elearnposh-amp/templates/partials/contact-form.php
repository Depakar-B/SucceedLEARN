<?php
/**
 * Reusable AMP contact form partial.
 *
 * @package ElearnPOSH\AMP
 *
 * @var array $args {
 *     @type string $form_id         Unique form element ID prefix.
 *     @type string $title           Hero heading.
 *     @type string $description     Hero subtext.
 *     @type string $heading_tag     h1 or h2 for hero title.
 *     @type bool   $compact         Compact layout styling (all fields always shown).
 *     @type bool   $desktop_ui      Match legacy erp-Homepage / erp-contact-us field UI.
 *     @type string $page_source     Human-readable page name for admin email source.
 * }
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$defaults = array(
	'form_id'     => 'epcf',
	'title'       => '',
	'description' => '',
	'heading_tag' => 'h2',
	'compact'     => false,
	'desktop_ui'  => true,
	'page_source' => '',
);

$args = wp_parse_args( isset( $args ) ? $args : array(), $defaults );

$form_id     = sanitize_key( $args['form_id'] );
$title       = $args['title'];
$description = $args['description'];
$heading_tag = in_array( $args['heading_tag'], array( 'h1', 'h2' ), true ) ? $args['heading_tag'] : 'h2';
$compact     = (bool) $args['compact'];
$desktop_ui  = (bool) $args['desktop_ui'];
$page_source = ! empty( $args['page_source'] )
	? sanitize_text_field( $args['page_source'] )
	: ( function_exists( 'elearnposh_amp_default_form_page_source' )
		? elearnposh_amp_default_form_page_source( $title )
		: __( 'Website', 'elearnposh-amp' ) );

$name_id    = $form_id . '-name';
$email_id   = $form_id . '-email';
$phone_id   = $form_id . '-phone';
$org_id     = $form_id . '-org';
$msg_id     = $form_id . '-msg';
$privacy_id = $form_id . '-privacy';
$posh_id    = $form_id . '-posh';

$utm = function_exists( 'elearnposh_amp_resolve_traffic_source' )
	? elearnposh_amp_resolve_traffic_source(
		array(
			'utm_source' => isset( $_GET['utm_source'] ) ? sanitize_text_field( wp_unslash( $_GET['utm_source'] ) ) : '', // phpcs:ignore WordPress.Security.NonceVerification.Recommended
			'utm'        => isset( $_GET['utm'] ) ? sanitize_text_field( wp_unslash( $_GET['utm'] ) ) : '', // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		)
	)
	: 'direct';
$page_url   = function_exists( 'elearnposh_amp_current_page_url' ) ? elearnposh_amp_current_page_url() : '';
$action_url = rest_url( 'elearnposh-amp/v1/contact' );

$wrap_classes = array( 'epcf-wrap' );
if ( $compact ) {
	$wrap_classes[] = 'epcf-wrap--compact';
}
if ( $desktop_ui ) {
	$wrap_classes[] = 'erp-home-contact-form';
}

$field_class    = $desktop_ui ? 'epcf-field erp-contact-field' : 'epcf-field';
$input_class    = $desktop_ui ? 'epcf-input form-control' : 'epcf-input';
$textarea_class = $desktop_ui ? 'epcf-textarea form-control' : 'epcf-textarea';
$label_class    = $desktop_ui ? 'epcf-label epcf-label--visually-hidden' : 'epcf-label';
$form_classes   = array( 'epcf-form' );
if ( $compact ) {
	$form_classes[] = 'epcf-form--compact';
}
if ( $desktop_ui ) {
	$form_classes[] = 'erp-contact-form';
}

$ph_name  = __( 'Name*', 'elearnposh-amp' );
$ph_email = __( 'Email*', 'elearnposh-amp' );
$ph_phone = __( 'Phone*', 'elearnposh-amp' );
$ph_org   = __( 'Organization (optional)', 'elearnposh-amp' );
$ph_msg   = __( 'Your message', 'elearnposh-amp' );

$recaptcha_amp_required = function_exists( 'elearnposh_recaptcha_amp_required' ) && elearnposh_recaptcha_amp_required();
$recaptcha_amp_site_key = $recaptcha_amp_required && function_exists( 'elearnposh_recaptcha_amp_site_key' )
	? elearnposh_recaptcha_amp_site_key()
	: '';
?>
<div class="<?php echo esc_attr( implode( ' ', $wrap_classes ) ); ?>" id="<?php echo esc_attr( $form_id ); ?>-wrap">
	<div class="epcf-card">
		<?php if ( $title || $description ) : ?>
		<div class="epcf-hero">
			<?php if ( $title ) : ?>
				<<?php echo esc_html( $heading_tag ); ?>><?php echo esc_html( $title ); ?></<?php echo esc_html( $heading_tag ); ?>>
			<?php endif; ?>
			<?php if ( $description ) : ?>
				<p><?php echo esc_html( $description ); ?></p>
			<?php endif; ?>
		</div>
		<?php endif; ?>

		<form
			id="<?php echo esc_attr( $form_id ); ?>-form"
			name="contact_form"
			class="<?php echo esc_attr( implode( ' ', $form_classes ) ); ?>"
			method="post"
			action-xhr="<?php echo esc_url( $action_url ); ?>"
			target="_top"
			custom-validation-reporting="show-first-on-submit"
			role="form"
			tabindex="0"
			on="submit-success:<?php echo esc_attr( $form_id ); ?>-form.clear, AMP.navigateTo(url=event.response.redirect_url)"
		>
			<input type="hidden" name="contact_form" value="1">
			<input type="hidden" name="amp_submission" value="1">
			<input type="hidden" name="form_page" value="<?php echo esc_attr( $page_source ); ?>">
			<input type="hidden" name="form_page_url" value="<?php echo esc_attr( $page_url ); ?>">
			<input type="hidden" name="utm" value="<?php echo esc_attr( $utm ); ?>">
			<input type="hidden" name="ep_vid" value="<?php echo esc_attr( isset( $_COOKIE['ep_vid'] ) ? sanitize_text_field( wp_unslash( $_COOKIE['ep_vid'] ) ) : '' ); ?>">

			<input
				type="text"
				name="website_url"
				class="epcf-honeypot"
				tabindex="-1"
				autocomplete="off"
				aria-hidden="true"
			>

			<div submit-error>
				<template type="amp-mustache">
					<div class="epcf-message is-error" role="alert">{{output_message}}</div>
				</template>
			</div>

			<div submitting>
				<div class="epcf-message is-loading" role="status">
					<?php esc_html_e( 'Submitting your request…', 'elearnposh-amp' ); ?>
				</div>
			</div>

			<div class="epcf-fields<?php echo $compact ? ' epcf-fields--compact' : ''; ?>">
			<div class="<?php echo esc_attr( $field_class ); ?>">
				<label class="<?php echo esc_attr( $label_class ); ?>" for="<?php echo esc_attr( $name_id ); ?>">
					<?php esc_html_e( 'Name', 'elearnposh-amp' ); ?> <span class="epcf-req">*</span>
				</label>
				<input
					type="text"
					name="name"
					id="<?php echo esc_attr( $name_id ); ?>"
					class="<?php echo esc_attr( $input_class ); ?>"
					<?php echo $desktop_ui ? 'placeholder="' . esc_attr( $ph_name ) . '"' : ''; ?>
					required
				>
				<span class="epcf-invalid" visible-when-invalid="valueMissing" validation-for="<?php echo esc_attr( $name_id ); ?>">
					<?php esc_html_e( 'Please enter your name.', 'elearnposh-amp' ); ?>
				</span>
			</div>

			<div class="<?php echo esc_attr( $field_class ); ?>">
				<label class="<?php echo esc_attr( $label_class ); ?>" for="<?php echo esc_attr( $email_id ); ?>">
					<?php esc_html_e( 'Email', 'elearnposh-amp' ); ?> <span class="epcf-req">*</span>
				</label>
				<input
					type="email"
					name="email"
					id="<?php echo esc_attr( $email_id ); ?>"
					class="<?php echo esc_attr( $input_class ); ?>"
					<?php echo $desktop_ui ? 'placeholder="' . esc_attr( $ph_email ) . '"' : ''; ?>
					required
				>
				<span class="epcf-invalid" visible-when-invalid="valueMissing" validation-for="<?php echo esc_attr( $email_id ); ?>">
					<?php esc_html_e( 'Please enter your email.', 'elearnposh-amp' ); ?>
				</span>
				<span class="epcf-invalid" visible-when-invalid="typeMismatch" validation-for="<?php echo esc_attr( $email_id ); ?>">
					<?php esc_html_e( 'Please enter a valid email address.', 'elearnposh-amp' ); ?>
				</span>
			</div>

			<div class="<?php echo esc_attr( $field_class ); ?>">
				<label class="<?php echo esc_attr( $label_class ); ?>" for="<?php echo esc_attr( $phone_id ); ?>">
					<?php esc_html_e( 'Phone', 'elearnposh-amp' ); ?> <span class="epcf-req">*</span>
				</label>
				<input
					type="tel"
					name="phone"
					id="<?php echo esc_attr( $phone_id ); ?>"
					class="<?php echo esc_attr( $input_class ); ?>"
					<?php echo $desktop_ui ? 'placeholder="' . esc_attr( $ph_phone ) . '"' : ''; ?>
					required
					pattern="[6-9][0-9]{9}"
				>
				<span class="epcf-invalid" visible-when-invalid="valueMissing" validation-for="<?php echo esc_attr( $phone_id ); ?>">
					<?php esc_html_e( 'Please enter your phone number.', 'elearnposh-amp' ); ?>
				</span>
				<span class="epcf-invalid" visible-when-invalid="patternMismatch" validation-for="<?php echo esc_attr( $phone_id ); ?>">
					<?php esc_html_e( 'Please enter a valid 10-digit Indian mobile number.', 'elearnposh-amp' ); ?>
				</span>
			</div>
			</div>

			<div class="<?php echo esc_attr( $field_class ); ?>">
				<label class="<?php echo esc_attr( $label_class ); ?>" for="<?php echo esc_attr( $org_id ); ?>">
					<?php esc_html_e( 'Organization', 'elearnposh-amp' ); ?>
				</label>
				<input
					type="text"
					name="org"
					id="<?php echo esc_attr( $org_id ); ?>"
					class="<?php echo esc_attr( $input_class ); ?>"
					<?php echo $desktop_ui ? 'placeholder="' . esc_attr( $ph_org ) . '"' : ''; ?>
				>
			</div>

			<div class="<?php echo esc_attr( $field_class ); ?>">
				<label class="<?php echo esc_attr( $label_class ); ?>" for="<?php echo esc_attr( $msg_id ); ?>">
					<?php esc_html_e( 'Message', 'elearnposh-amp' ); ?>
				</label>
				<textarea
					name="msg"
					id="<?php echo esc_attr( $msg_id ); ?>"
					class="<?php echo esc_attr( $textarea_class ); ?>"
					<?php echo $desktop_ui ? 'placeholder="' . esc_attr( $ph_msg ) . '"' : ''; ?>
					autoexpand
				></textarea>
			</div>

			<div class="epcf-checks<?php echo $desktop_ui ? ' erp-contact-checks' : ''; ?>">
				<div class="<?php echo $desktop_ui ? 'erp-contact-check' : 'epcf-check'; ?>">
					<input type="checkbox" class="<?php echo $desktop_ui ? 'checkbox' : ''; ?>" id="<?php echo esc_attr( $privacy_id ); ?>" name="privacy" value="privacy" required>
					<label class="<?php echo $desktop_ui ? 'form-check-label' : 'epcf-check'; ?>" for="<?php echo esc_attr( $privacy_id ); ?>">
						<?php esc_html_e( 'Yes, I agree with', 'elearnposh-amp' ); ?>
						<a href="<?php echo elearnposh_amp_url( '/privacy-policy/' ); ?>"><?php esc_html_e( 'Privacy Policy', 'elearnposh-amp' ); ?></a>
					</label>
				</div>
				<span class="epcf-invalid" visible-when-invalid="valueMissing" validation-for="<?php echo esc_attr( $privacy_id ); ?>">
					<?php esc_html_e( 'Please accept the privacy policy to continue.', 'elearnposh-amp' ); ?>
				</span>

				<div class="<?php echo $desktop_ui ? 'erp-contact-check' : 'epcf-check'; ?>">
					<input type="checkbox" class="<?php echo $desktop_ui ? 'checkbox' : ''; ?>" id="<?php echo esc_attr( $posh_id ); ?>" name="posh" value="posh">
					<label class="<?php echo $desktop_ui ? 'form-check-label' : 'epcf-check'; ?>" for="<?php echo esc_attr( $posh_id ); ?>">
						<?php esc_html_e( 'I am ok to receive POSH related updates', 'elearnposh-amp' ); ?>
					</label>
				</div>
			</div>

			<div class="epcf-submit-wrap<?php echo $desktop_ui ? ' erp-contact-submit' : ''; ?>">
				<?php if ( $recaptcha_amp_required && '' !== $recaptcha_amp_site_key ) : ?>
				<amp-recaptcha-input
					layout="nodisplay"
					name="recaptcha_token"
					data-sitekey="<?php echo esc_attr( $recaptcha_amp_site_key ); ?>"
					data-action="contact_submit">
				</amp-recaptcha-input>
				<?php endif; ?>
				<button type="submit" class="epcf-submit<?php echo $desktop_ui ? ' btnSubmit' : ''; ?>" id="<?php echo esc_attr( $form_id ); ?>-submit">
					<?php esc_html_e( 'Submit', 'elearnposh-amp' ); ?>
				</button>
			</div>
		</form>
	</div>
</div>
