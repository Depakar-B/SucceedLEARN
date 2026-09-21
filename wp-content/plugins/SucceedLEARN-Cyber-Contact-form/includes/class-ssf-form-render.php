<?php
/**
 * Shortcode rendering and form HTML output.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class SSF_Form_Render {

	/** @var SSF_Security */
	private $security;

	public function __construct( SSF_Security $security ) {
		$this->security = $security;
	}

	public function register_shortcode() {
		add_shortcode( 'cybersecurity_form', array( $this, 'render' ) );
		add_shortcode( 'seo_form', array( $this, 'render' ) ); // Alias for backwards compatibility.
	}

	/**
	 * Render the cybersecurity form.
	 *
	 * Usage: [cybersecurity_form title="Campaign Registration" variant="infosec"]
	 *
	 * @param array|string $atts Shortcode attributes.
	 * @return string
	 */
	public function render( $atts = array() ) {
		$raw_atts = is_array( $atts ) ? $atts : array();
		$atts     = shortcode_atts(
			array(
				'title'    => '',
				'subtitle' => '',
				'variant'  => SSF_Variants::DEFAULT,
			),
			$atts,
			'cybersecurity_form'
		);

		$variant = SSF_Variants::normalize( $atts['variant'] );
		$config  = SSF_Variants::get( $variant );

		if ( '' === trim( (string) $atts['title'] ) ) {
			$atts['title'] = $config['title'];
		}
		// Only fall back to config subtitle when the attribute was omitted.
		if ( ! array_key_exists( 'subtitle', $raw_atts ) && isset( $config['subtitle'] ) ) {
			$atts['subtitle'] = $config['subtitle'];
		} elseif ( array_key_exists( 'subtitle', $raw_atts ) ) {
			$atts['subtitle'] = (string) $raw_atts['subtitle'];
		}

		$atts['variant'] = $variant;
		$atts['config']  = $config;

		if ( $this->is_amp() ) {
			return $this->render_amp_form( $atts );
		}

		return $this->render_standard_form( $atts );
	}

	/**
	 * @param array $atts Shortcode attributes + config.
	 * @return string
	 */
	private function render_standard_form( $atts ) {
		ob_start();
		$config         = $atts['config'];
		$variant        = $atts['variant'];
		$is_infosec     = SSF_Variants::is_infosec( $variant );
		$form_token     = $this->security->generate_form_token();
		$honeypot_names = $this->security->create_honeypots( $form_token );
		$source_tag     = $this->determine_source_tag( '', $variant );
		$wrap_class     = 'ssf-form-wrap' . ( $is_infosec ? ' ssf-form-wrap--infosec' : '' );
		?>
		<div class="<?php echo esc_attr( $wrap_class ); ?>">
			<div class="ssf-form-card">
				<div class="ssf-form-header">
					<h3 class="ssf-form-title"><?php echo esc_html( $atts['title'] ); ?></h3>
					<?php if ( ! empty( $atts['subtitle'] ) ) : ?>
						<p class="ssf-form-subtitle"><?php echo esc_html( $atts['subtitle'] ); ?></p>
					<?php endif; ?>
				</div>
				<form id="ssf-form" class="ssf-form" method="post" novalidate data-ssf-variant="<?php echo esc_attr( $variant ); ?>">
					<input type="hidden" name="ssf_form_token" value="<?php echo esc_attr( $form_token ); ?>" />
					<input type="hidden" name="ssf_form_time" value="<?php echo esc_attr( (string) time() ); ?>" />
					<input type="hidden" name="ssf_form_variant" value="<?php echo esc_attr( $variant ); ?>" />
					<input type="hidden" name="source_tag" value="<?php echo esc_attr( $source_tag ); ?>" />

					<div class="ssf-honeypot">
						<label for="ssf-website"><?php esc_html_e( 'Website', 'seo-form' ); ?></label>
						<input type="text" id="ssf-website" name="<?php echo esc_attr( $honeypot_names['website'] ); ?>" tabindex="-1" autocomplete="off" aria-hidden="true" />
					</div>
					<div class="ssf-honeypot">
						<label for="ssf-company"><?php esc_html_e( 'Company', 'seo-form' ); ?></label>
						<input type="text" id="ssf-company" name="<?php echo esc_attr( $honeypot_names['company'] ); ?>" tabindex="-1" autocomplete="off" aria-hidden="true" />
					</div>

					<?php if ( $is_infosec ) : ?>
						<div class="ssf-form-row">
							<div class="ssf-field">
								<label for="ssf-name"><?php echo esc_html( $config['name_label'] ); ?> <span class="ssf-required">*</span></label>
								<input type="text" id="ssf-name" name="name" required placeholder="<?php esc_attr_e( 'John Smith', 'seo-form' ); ?>" autocomplete="name" />
							</div>
							<div class="ssf-field">
								<label for="ssf-email"><?php echo esc_html( $config['email_label'] ); ?> <span class="ssf-required">*</span></label>
								<input type="email" id="ssf-email" name="email" required placeholder="<?php esc_attr_e( 'you@company.com', 'seo-form' ); ?>" autocomplete="email" />
							</div>
						</div>
						<div class="ssf-form-row">
							<div class="ssf-field">
								<label for="ssf-job-title"><?php echo esc_html( $config['job_title_label'] ); ?> <span class="ssf-required">*</span></label>
								<input type="text" id="ssf-job-title" name="job_title" required placeholder="<?php esc_attr_e( 'e.g. Security Manager', 'seo-form' ); ?>" autocomplete="organization-title" />
							</div>
							<div class="ssf-field">
								<label for="ssf-employees"><?php echo esc_html( $config['employees_label'] ); ?> <span class="ssf-required">*</span></label>
								<input type="number" id="ssf-employees" name="employees" required min="1" step="1" inputmode="numeric" placeholder="<?php esc_attr_e( 'e.g. 250', 'seo-form' ); ?>" />
							</div>
						</div>
					<?php else : ?>
						<div class="ssf-form-row">
							<div class="ssf-field">
								<label for="ssf-name"><?php echo esc_html( $config['name_label'] ); ?> <span class="ssf-required">*</span></label>
								<input type="text" id="ssf-name" name="name" required placeholder="<?php esc_attr_e( 'John Smith', 'seo-form' ); ?>" autocomplete="name" />
							</div>
							<div class="ssf-field">
								<label for="ssf-email"><?php echo esc_html( $config['email_label'] ); ?> <span class="ssf-required">*</span></label>
								<input type="email" id="ssf-email" name="email" required placeholder="<?php esc_attr_e( 'you@company.com', 'seo-form' ); ?>" autocomplete="email" />
							</div>
						</div>

						<div class="ssf-field">
							<label for="ssf-employees"><?php echo esc_html( $config['employees_label'] ); ?> <span class="ssf-required">*</span></label>
							<input type="number" id="ssf-employees" name="employees" required min="1" step="1" inputmode="numeric" placeholder="<?php esc_attr_e( 'e.g. 250', 'seo-form' ); ?>" />
						</div>
					<?php endif; ?>

					<?php if ( ! empty( $config['show_message'] ) ) : ?>
						<div class="ssf-field">
							<label for="ssf-message"><?php esc_html_e( 'Message', 'seo-form' ); ?></label>
							<textarea id="ssf-message" name="message" rows="4" placeholder="<?php esc_attr_e( 'How can we help you?', 'seo-form' ); ?>"></textarea>
						</div>
					<?php endif; ?>

					<?php if ( ! empty( $config['require_authorisation'] ) ) : ?>
						<div class="ssf-field ssf-checkbox">
							<input type="checkbox" id="ssf-authorised" name="authorised_confirm" value="1" required />
							<label for="ssf-authorised">
								<?php echo esc_html( $config['authorisation_label'] ); ?>
								<span class="ssf-required"> *</span>
							</label>
						</div>
					<?php endif; ?>

					<div class="ssf-field ssf-checkbox">
						<input type="checkbox" id="ssf-privacy" name="privacy" value="1" required />
						<label for="ssf-privacy">
							<?php
							if ( $is_infosec && ! empty( $config['terms_privacy_label_html'] ) ) {
								echo wp_kses(
									$config['terms_privacy_label_html'],
									array(
										'a' => array(
											'href'   => array(),
											'target' => array(),
											'rel'    => array(),
										),
									)
								);
							} else {
								$privacy_url = get_privacy_policy_url();
								printf(
									wp_kses(
										__( 'I agree to the <a href="%s" target="_blank" rel="noopener">privacy policy</a>', 'seo-form' ),
										array(
											'a' => array(
												'href'   => array(),
												'target' => array(),
												'rel'    => array(),
											),
										)
									),
									esc_url( $privacy_url ? $privacy_url : '#' )
								);
							}
							?>
							<span class="ssf-required"> *</span>
						</label>
					</div>

					<input type="hidden" name="utm_source" />
					<input type="hidden" name="utm_medium" />
					<input type="hidden" name="utm_campaign" />
					<input type="hidden" name="utm_term" />
					<input type="hidden" name="utm_content" />
					<input type="hidden" name="page_url" />

					<button type="submit" class="ssf-submit">
						<span class="ssf-submit-text"><?php echo esc_html( $config['submit_label'] ); ?></span>
						<span class="ssf-submit-loading" style="display:none;">
							<span class="ssf-spinner"></span>
							<?php esc_html_e( 'Submitting...', 'seo-form' ); ?>
						</span>
					</button>
					<p class="ssf-response" role="status" aria-live="polite"></p>
				</form>
			</div>
		</div>
		<?php
		return ob_get_clean();
	}

	/**
	 * AMP-compatible form (amp-form + action-xhr). No custom JS.
	 *
	 * @param array $atts Shortcode attributes + config.
	 * @return string
	 */
	private function render_amp_form( $atts ) {
		ob_start();
		$config         = $atts['config'];
		$variant        = $atts['variant'];
		$is_infosec     = SSF_Variants::is_infosec( $variant );
		$ajax_url       = admin_url( 'admin-ajax.php' );
		$nonce          = wp_create_nonce( 'ssf_submit' );
		$form_token     = $this->security->generate_form_token();
		$honeypot_names = $this->security->create_honeypots( $form_token );
		$current_url    = ( isset( $_SERVER['HTTPS'] ) && 'on' === $_SERVER['HTTPS'] ? 'https' : 'http' )
			. '://' . ( $_SERVER['HTTP_HOST'] ?? '' ) . ( $_SERVER['REQUEST_URI'] ?? '' );
		$source_tag     = $this->determine_source_tag( $current_url, $variant );
		$form_time      = time();
		$submit_label   = $config['submit_label'];
		$wrap_class     = 'ssf-form-wrap ssf-form-wrap--amp' . ( $is_infosec ? ' ssf-form-wrap--infosec' : '' );
		$success_id     = $is_infosec ? 'ssf-infosec-success-popup' : 'ssf-success-popup';
		$error_id       = $is_infosec ? 'ssf-infosec-error-popup' : 'ssf-error-popup';
		?>
		<amp-state id="ssfButtonState">
			<script type="application/json">{"text":"<?php echo esc_js( $submit_label ); ?>","loading":false}</script>
		</amp-state>
		<amp-state id="ssfFormTime">
			<script type="application/json"><?php echo (int) $form_time; ?></script>
		</amp-state>
		<amp-state id="ssfErrorState">
			<script type="application/json">{"message":"<?php echo esc_js( __( 'Please check your information and try again.', 'seo-form' ) ); ?>"}</script>
		</amp-state>

		<div class="<?php echo esc_attr( $wrap_class ); ?>">
			<div class="ssf-form-card">
				<div class="ssf-form-header">
					<h3 class="ssf-form-title"><?php echo esc_html( $atts['title'] ); ?></h3>
					<?php if ( ! empty( $atts['subtitle'] ) ) : ?>
						<p class="ssf-form-subtitle"><?php echo esc_html( $atts['subtitle'] ); ?></p>
					<?php endif; ?>
				</div>

				<form
					id="ssfAmpForm"
					class="ssf-form"
					method="post"
					action-xhr="<?php echo esc_url( $ajax_url ); ?>"
					target="_top"
					on="submit:AMP.setState({ssfButtonState:{text:'<?php echo esc_js( __( 'Submitting...', 'seo-form' ) ); ?>',loading:true}});
						submit-success:AMP.setState({ssfButtonState:{text:'<?php echo esc_js( $submit_label ); ?>',loading:false},ssfFormTime:<?php echo (int) time(); ?>}),ssfAmpForm.clear,<?php echo esc_attr( $success_id ); ?>.open;
						submit-error:AMP.setState({ssfButtonState:{text:'<?php echo esc_js( $submit_label ); ?>',loading:false},ssfErrorState:{message:(event.response && event.response.message)?event.response.message:'<?php echo esc_js( __( 'Please check your information and try again.', 'seo-form' ) ); ?>'}}),<?php echo esc_attr( $error_id ); ?>.open;"
				>
					<input type="hidden" name="action" value="ssf_submit_form" />
					<input type="hidden" name="nonce" value="<?php echo esc_attr( $nonce ); ?>" />
					<input type="hidden" name="ssf_form_token" value="<?php echo esc_attr( $form_token ); ?>" />
					<input type="hidden" name="ssf_form_time" [value]="ssfFormTime || <?php echo (int) $form_time; ?>" value="<?php echo esc_attr( (string) $form_time ); ?>" />
					<input type="hidden" name="ssf_form_variant" value="<?php echo esc_attr( $variant ); ?>" />
					<input type="hidden" name="source_tag" value="<?php echo esc_attr( $source_tag ); ?>" />
					<input type="hidden" name="amp_submission" value="1" />

					<div class="ssf-honeypot" aria-hidden="true">
						<label for="ssf-website-amp"><?php esc_html_e( 'Website', 'seo-form' ); ?></label>
						<input type="text" id="ssf-website-amp" name="<?php echo esc_attr( $honeypot_names['website'] ); ?>" tabindex="-1" autocomplete="off" />
					</div>
					<div class="ssf-honeypot" aria-hidden="true">
						<label for="ssf-company-amp"><?php esc_html_e( 'Company', 'seo-form' ); ?></label>
						<input type="text" id="ssf-company-amp" name="<?php echo esc_attr( $honeypot_names['company'] ); ?>" tabindex="-1" autocomplete="off" />
					</div>

					<?php if ( $is_infosec ) : ?>
						<div class="ssf-form-row">
							<div class="ssf-field">
								<label for="ssf-name-amp"><?php echo esc_html( $config['name_label'] ); ?> <span class="ssf-required">*</span></label>
								<input type="text" id="ssf-name-amp" name="name" required autocomplete="name" />
								<span visible-when-invalid="valueMissing" validation-for="ssf-name-amp" class="ssf-error-message"><?php esc_html_e( 'Please fill out this field.', 'seo-form' ); ?></span>
							</div>
							<div class="ssf-field">
								<label for="ssf-email-amp"><?php echo esc_html( $config['email_label'] ); ?> <span class="ssf-required">*</span></label>
								<input type="email" id="ssf-email-amp" name="email" required autocomplete="email" />
								<span visible-when-invalid="valueMissing" validation-for="ssf-email-amp" class="ssf-error-message"><?php esc_html_e( 'Please fill out this field.', 'seo-form' ); ?></span>
								<span visible-when-invalid="typeMismatch" validation-for="ssf-email-amp" class="ssf-error-message"><?php esc_html_e( 'Please enter a valid email address.', 'seo-form' ); ?></span>
							</div>
						</div>
						<div class="ssf-form-row">
							<div class="ssf-field">
								<label for="ssf-job-title-amp"><?php echo esc_html( $config['job_title_label'] ); ?> <span class="ssf-required">*</span></label>
								<input type="text" id="ssf-job-title-amp" name="job_title" required autocomplete="organization-title" />
								<span visible-when-invalid="valueMissing" validation-for="ssf-job-title-amp" class="ssf-error-message"><?php esc_html_e( 'Please fill out this field.', 'seo-form' ); ?></span>
							</div>
							<div class="ssf-field">
								<label for="ssf-employees-amp"><?php echo esc_html( $config['employees_label'] ); ?> <span class="ssf-required">*</span></label>
								<input type="number" id="ssf-employees-amp" name="employees" required min="1" step="1" inputmode="numeric" />
								<span visible-when-invalid="valueMissing" validation-for="ssf-employees-amp" class="ssf-error-message"><?php esc_html_e( 'Please fill out this field.', 'seo-form' ); ?></span>
								<span visible-when-invalid="rangeUnderflow" validation-for="ssf-employees-amp" class="ssf-error-message"><?php esc_html_e( 'Please enter a valid number of employees.', 'seo-form' ); ?></span>
							</div>
						</div>
					<?php else : ?>
						<div class="ssf-form-row">
							<div class="ssf-field">
								<label for="ssf-name-amp"><?php echo esc_html( $config['name_label'] ); ?> <span class="ssf-required">*</span></label>
								<input type="text" id="ssf-name-amp" name="name" required autocomplete="name" />
								<span visible-when-invalid="valueMissing" validation-for="ssf-name-amp" class="ssf-error-message"><?php esc_html_e( 'Please fill out this field.', 'seo-form' ); ?></span>
							</div>
							<div class="ssf-field">
								<label for="ssf-email-amp"><?php echo esc_html( $config['email_label'] ); ?> <span class="ssf-required">*</span></label>
								<input type="email" id="ssf-email-amp" name="email" required autocomplete="email" />
								<span visible-when-invalid="valueMissing" validation-for="ssf-email-amp" class="ssf-error-message"><?php esc_html_e( 'Please fill out this field.', 'seo-form' ); ?></span>
								<span visible-when-invalid="typeMismatch" validation-for="ssf-email-amp" class="ssf-error-message"><?php esc_html_e( 'Please enter a valid email address.', 'seo-form' ); ?></span>
							</div>
						</div>

						<div class="ssf-field">
							<label for="ssf-employees-amp"><?php echo esc_html( $config['employees_label'] ); ?> <span class="ssf-required">*</span></label>
							<input type="number" id="ssf-employees-amp" name="employees" required min="1" step="1" inputmode="numeric" />
							<span visible-when-invalid="valueMissing" validation-for="ssf-employees-amp" class="ssf-error-message"><?php esc_html_e( 'Please fill out this field.', 'seo-form' ); ?></span>
							<span visible-when-invalid="rangeUnderflow" validation-for="ssf-employees-amp" class="ssf-error-message"><?php esc_html_e( 'Please enter a valid number of employees.', 'seo-form' ); ?></span>
						</div>
					<?php endif; ?>

					<?php if ( ! empty( $config['show_message'] ) ) : ?>
						<div class="ssf-field">
							<label for="ssf-message-amp"><?php esc_html_e( 'Message', 'seo-form' ); ?></label>
							<textarea id="ssf-message-amp" name="message" rows="4"></textarea>
						</div>
					<?php endif; ?>

					<?php if ( ! empty( $config['require_authorisation'] ) ) : ?>
						<div class="ssf-field ssf-checkbox">
							<input type="checkbox" id="ssf-authorised-amp" name="authorised_confirm" value="1" required />
							<label for="ssf-authorised-amp">
								<?php echo esc_html( $config['authorisation_label'] ); ?>
								<span class="ssf-required"> *</span>
							</label>
							<span visible-when-invalid="valueMissing" validation-for="ssf-authorised-amp" class="ssf-error-message"><?php esc_html_e( 'Please confirm authorization to continue.', 'seo-form' ); ?></span>
						</div>
					<?php endif; ?>

					<div class="ssf-field ssf-checkbox">
						<input type="checkbox" id="ssf-privacy-amp" name="privacy" value="1" required />
						<label for="ssf-privacy-amp">
							<?php
							if ( $is_infosec && ! empty( $config['terms_privacy_label_html'] ) ) {
								echo wp_kses(
									$config['terms_privacy_label_html'],
									array(
										'a' => array(
											'href'   => array(),
											'target' => array(),
											'rel'    => array(),
										),
									)
								);
							} else {
								$privacy_url = get_privacy_policy_url();
								printf(
									wp_kses(
										__( 'I agree to the <a href="%s" target="_blank" rel="noopener">privacy policy</a>', 'seo-form' ),
										array(
											'a' => array(
												'href'   => array(),
												'target' => array(),
												'rel'    => array(),
											),
										)
									),
									esc_url( $privacy_url ? $privacy_url : '#' )
								);
							}
							?>
							<span class="ssf-required"> *</span>
						</label>
						<span visible-when-invalid="valueMissing" validation-for="ssf-privacy-amp" class="ssf-error-message"><?php esc_html_e( 'Please accept the terms to continue.', 'seo-form' ); ?></span>
					</div>

					<input type="hidden" name="utm_source" value="<?php echo esc_attr( sanitize_text_field( wp_unslash( $_GET['utm_source'] ?? '' ) ) ); ?>" />
					<input type="hidden" name="utm_medium" value="<?php echo esc_attr( sanitize_text_field( wp_unslash( $_GET['utm_medium'] ?? '' ) ) ); ?>" />
					<input type="hidden" name="utm_campaign" value="<?php echo esc_attr( sanitize_text_field( wp_unslash( $_GET['utm_campaign'] ?? '' ) ) ); ?>" />
					<input type="hidden" name="utm_term" value="<?php echo esc_attr( sanitize_text_field( wp_unslash( $_GET['utm_term'] ?? '' ) ) ); ?>" />
					<input type="hidden" name="utm_content" value="<?php echo esc_attr( sanitize_text_field( wp_unslash( $_GET['utm_content'] ?? '' ) ) ); ?>" />
					<input type="hidden" name="page_url" value="<?php echo esc_url( $current_url ); ?>" />

					<button type="submit" class="ssf-submit" [disabled]="ssfButtonState.loading">
						<span [text]="ssfButtonState.text"><?php echo esc_html( $submit_label ); ?></span>
					</button>
				</form>
			</div>
		</div>

		<amp-lightbox id="<?php echo esc_attr( $success_id ); ?>" layout="nodisplay" on="close:ssfAmpForm.clear">
			<div class="ssf-lightbox-overlay">
				<div class="ssf-lightbox-content ssf-lightbox-success">
					<div class="ssf-lightbox-title"><?php esc_html_e( 'Submitted Successfully', 'seo-form' ); ?></div>
					<div class="ssf-lightbox-message"><?php echo esc_html( $config['success_message'] ); ?></div>
					<button type="button" on="tap:<?php echo esc_attr( $success_id ); ?>.close" class="ssf-lightbox-button"><?php esc_html_e( 'Close', 'seo-form' ); ?></button>
				</div>
			</div>
		</amp-lightbox>

		<amp-lightbox id="<?php echo esc_attr( $error_id ); ?>" layout="nodisplay">
			<div class="ssf-lightbox-overlay">
				<div class="ssf-lightbox-content ssf-lightbox-error">
					<div class="ssf-lightbox-title"><?php esc_html_e( 'Submission Failed', 'seo-form' ); ?></div>
					<div class="ssf-lightbox-message" [text]="ssfErrorState.message"><?php esc_html_e( 'Please check your information and try again.', 'seo-form' ); ?></div>
					<button type="button" on="tap:<?php echo esc_attr( $error_id ); ?>.close" class="ssf-lightbox-button"><?php esc_html_e( 'Close', 'seo-form' ); ?></button>
				</div>
			</div>
		</amp-lightbox>
		<?php
		return ob_get_clean();
	}

	/**
	 * @param string $page_url Optional page URL.
	 * @param string $variant  Form variant.
	 * @return string
	 */
	public function determine_source_tag( $page_url = '', $variant = SSF_Variants::DEFAULT ) {
		$variant = SSF_Variants::normalize( $variant );
		$config  = SSF_Variants::get( $variant );
		$path    = $this->extract_path_from_url( $page_url );
		$tag     = ! empty( $config['source_tag'] ) ? $config['source_tag'] : 'cybersecurity';

		if ( SSF_Variants::DEFAULT === $variant ) {
			if ( preg_match( '#/(blog|resources|articles)/#i', $path ) ) {
				$tag = 'content';
			} elseif ( preg_match( '#cybersecurity#i', $path ) ) {
				$tag = 'cybersecurity';
			}
		} elseif ( preg_match( '#infosec#i', $path ) ) {
			$tag = 'infosec';
		}

		return apply_filters( 'ssf_source_tag', $tag, $path, $page_url, $variant );
	}

	private function extract_path_from_url( $page_url = '' ) {
		if ( empty( $page_url ) ) {
			$page_url = ( isset( $_SERVER['HTTPS'] ) && 'on' === $_SERVER['HTTPS'] ? 'https' : 'http' )
				. '://' . ( $_SERVER['HTTP_HOST'] ?? '' ) . ( $_SERVER['REQUEST_URI'] ?? '' );
		}
		$parsed = wp_parse_url( $page_url );
		return ! empty( $parsed['path'] ) ? strtolower( $parsed['path'] ) : '/';
	}

	/**
	 * @return bool
	 */
	private function is_amp() {
		if ( function_exists( 'succeedlearn_amp_is_serving_amp' ) && succeedlearn_amp_is_serving_amp() ) {
			return true;
		}
		if ( function_exists( 'is_amp_endpoint' ) && is_amp_endpoint() ) {
			return true;
		}
		if ( function_exists( 'ampforwp_is_amp_endpoint' ) && ampforwp_is_amp_endpoint() ) {
			return true;
		}
		return false;
	}
}
