<?php
/** WordPress administration screens. @package FormMailbox */
defined( 'ABSPATH' ) || exit;

/** Registers and renders the FormMailbox administration area. */
final class FormMailbox_Admin {
	/** @var FormMailbox_Repository */
	private $repository;

	/** @param FormMailbox_Repository $repository Data access. */
	public function __construct( FormMailbox_Repository $repository ) { $this->repository = $repository; }

	/** @return void */
	public function register_hooks() {
		add_action( 'admin_menu', array( $this, 'register_menu' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_assets' ) );
		add_action( 'admin_init', array( $this, 'maybe_redirect_after_activation' ) );
		add_action( 'admin_init', array( $this, 'handle_actions' ) );
	}

	/** @return void */
	public function register_menu() {
		$c = 'manage_options';
		add_menu_page( __( 'FormMailbox', 'formmailbox' ), __( 'FormMailbox', 'formmailbox' ), $c, 'formmailbox', array( $this, 'render_dashboard' ), 'dashicons-feedback', 30 );
		add_submenu_page( 'formmailbox', __( 'Dashboard', 'formmailbox' ), __( 'Dashboard', 'formmailbox' ), $c, 'formmailbox', array( $this, 'render_dashboard' ) );
		add_submenu_page( 'formmailbox', __( 'Forms', 'formmailbox' ), __( 'Forms', 'formmailbox' ), $c, 'formmailbox-forms', array( $this, 'render_forms' ) );
		add_submenu_page( 'formmailbox', __( 'Create Form', 'formmailbox' ), __( 'Create Form', 'formmailbox' ), $c, 'formmailbox-create', array( $this, 'render_create_form' ) );
		add_submenu_page( 'formmailbox', __( 'Entries', 'formmailbox' ), __( 'Entries', 'formmailbox' ), $c, 'formmailbox-entries', array( $this, 'render_entries' ) );
		add_submenu_page( 'formmailbox', __( 'Help', 'formmailbox' ), __( 'Help', 'formmailbox' ), $c, 'formmailbox-help', array( $this, 'render_help' ) );
		add_submenu_page( 'formmailbox', __( 'Settings', 'formmailbox' ), __( 'Settings', 'formmailbox' ), $c, 'formmailbox-settings', array( $this, 'render_settings' ) );
	}

	/** @param string $hook Current hook. @return void */
	public function enqueue_assets( $hook ) {
		if ( false === strpos( $hook, 'formmailbox' ) ) { return; }
		wp_enqueue_style( 'formmailbox-admin', FORMMAILBOX_URL . 'admin/css/formmailbox-admin.css', array(), FORMMAILBOX_VERSION );
		wp_enqueue_script( 'formmailbox-admin', FORMMAILBOX_URL . 'admin/js/formmailbox-admin.js', array(), FORMMAILBOX_VERSION, true );
	}

	/** @return void */
	public function maybe_redirect_after_activation() {
		if ( ! get_option( 'formmailbox_activation_redirect' ) ) { return; }
		delete_option( 'formmailbox_activation_redirect' );
		if ( wp_doing_ajax() || is_network_admin() || ! current_user_can( 'manage_options' ) ) { return; }
		wp_safe_redirect( admin_url( 'admin.php?page=formmailbox' ) ); exit;
	}

	/** Processes nonce-protected admin changes. @return void */
	public function handle_actions() {
		if ( ! current_user_can( 'manage_options' ) || empty( $_REQUEST['fmbx_action'] ) ) { return; }
		$action = sanitize_key( wp_unslash( $_REQUEST['fmbx_action'] ) );
		if ( 'create_form' === $action ) {
			check_admin_referer( 'fmbx_create_form' );
			$key = isset( $_POST['template'] ) ? sanitize_key( wp_unslash( $_POST['template'] ) ) : 'blank';
			$all = FormMailbox_Templates::all(); $template = isset( $all[ $key ] ) ? $all[ $key ] : $all['blank'];
			$id = $this->repository->create_form( $template['name'], $template['fields'], $this->global_settings() );
			$this->redirect( 'formmailbox-create', $id ? 'created' : 'error', array( 'form_id' => $id ) );
		}
		if ( 'save_form' === $action ) {
			$id = isset( $_POST['form_id'] ) ? absint( $_POST['form_id'] ) : 0;
			check_admin_referer( 'fmbx_save_form_' . $id );
			$name = isset( $_POST['form_name'] ) ? sanitize_text_field( wp_unslash( $_POST['form_name'] ) ) : '';
			$status = isset( $_POST['form_status'] ) ? sanitize_key( wp_unslash( $_POST['form_status'] ) ) : 'draft';
			$fields = $this->sanitize_fields( isset( $_POST['fields'] ) ? wp_unslash( $_POST['fields'] ) : array() );
			$settings = $this->sanitize_form_settings( isset( $_POST['settings'] ) ? wp_unslash( $_POST['settings'] ) : array() );
			$ok = $name && $this->repository->update_form( $id, $name, $status, $fields, $settings );
			$this->redirect( 'formmailbox-create', $ok ? 'saved' : 'error', array( 'form_id' => $id ) );
		}
		if ( in_array( $action, array( 'duplicate_form', 'delete_form' ), true ) ) {
			$id = isset( $_GET['form_id'] ) ? absint( $_GET['form_id'] ) : 0; check_admin_referer( $action . '_' . $id );
			if ( 'duplicate_form' === $action ) { $new = $this->repository->duplicate_form( $id ); $this->redirect( 'formmailbox-create', $new ? 'duplicated' : 'error', array( 'form_id' => $new ) ); }
			$this->redirect( 'formmailbox-forms', $this->repository->delete_form( $id ) ? 'deleted' : 'form_has_entries' );
		}
		if ( 'delete_entry' === $action ) {
			$id = isset( $_GET['entry_id'] ) ? absint( $_GET['entry_id'] ) : 0; check_admin_referer( 'delete_entry_' . $id );
			$this->repository->delete_entry( $id ); $this->redirect( 'formmailbox-entries', 'entry_deleted' );
		}
		if ( 'resend_entry' === $action ) {
			$id = isset( $_GET['entry_id'] ) ? absint( $_GET['entry_id'] ) : 0; check_admin_referer( 'resend_entry_' . $id );
			$this->redirect( 'formmailbox-entries', $this->resend_entry( $id ) ? 'email_resent' : 'email_failed', array( 'entry_id' => $id ) );
		}
		if ( 'export_entries' === $action ) {
			check_admin_referer( 'export_entries' ); $this->export_entries();
		}
		if ( 'save_settings' === $action ) {
			check_admin_referer( 'fmbx_save_settings' );
			$raw = isset( $_POST['defaults'] ) && is_array( $_POST['defaults'] ) ? wp_unslash( $_POST['defaults'] ) : array();
			update_option( 'formmailbox_defaults', $this->sanitize_global_settings( $raw ) ); $this->redirect( 'formmailbox-settings', 'settings_saved' );
		}
	}

	/** @param string $title Title. @param string $description Description. @return void */
	private function page_start( $title, $description ) { ?>
		<div class="wrap fmbx-admin"><header class="fmbx-page-header"><div><h1><?php echo esc_html( $title ); ?></h1><p><?php echo esc_html( $description ); ?></p></div></header><?php $this->render_notice(); ?>
	<?php }
	/** @return void */
	private function page_end() { echo '</div>'; }
	/** @return void */
	private function render_notice() {
		$key = isset( $_GET['fmbx_notice'] ) ? sanitize_key( wp_unslash( $_GET['fmbx_notice'] ) ) : ''; // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		$messages = array( 'created' => __( 'Form created. Customize it below and save when ready.', 'formmailbox' ), 'saved' => __( 'Form saved.', 'formmailbox' ), 'duplicated' => __( 'Form duplicated as a draft.', 'formmailbox' ), 'deleted' => __( 'Form deleted.', 'formmailbox' ), 'entry_deleted' => __( 'Entry deleted.', 'formmailbox' ), 'email_resent' => __( 'Notification email accepted by WordPress.', 'formmailbox' ), 'email_failed' => __( 'WordPress could not accept the notification email.', 'formmailbox' ), 'settings_saved' => __( 'Settings saved.', 'formmailbox' ), 'form_has_entries' => __( 'This form has stored entries. Delete those entries first to prevent accidental data loss.', 'formmailbox' ), 'error' => __( 'The requested change could not be saved.', 'formmailbox' ) );
		if ( isset( $messages[ $key ] ) ) { $class = in_array( $key, array( 'error', 'email_failed', 'form_has_entries' ), true ) ? 'notice-error' : 'notice-success'; echo '<div class="notice ' . esc_attr( $class ) . ' is-dismissible"><p>' . esc_html( $messages[ $key ] ) . '</p></div>'; }
	}

	/** @return void */
	public function render_dashboard() {
		$counts = $this->repository->get_counts(); $entries = $this->repository->get_entries( 5 );
		$this->page_start( __( 'Dashboard', 'formmailbox' ), __( 'Forms, stored entries, and email notification health.', 'formmailbox' ) ); ?>
		<div class="fmbx-metrics"><a href="<?php echo esc_url( admin_url( 'admin.php?page=formmailbox-forms' ) ); ?>"><strong><?php echo esc_html( number_format_i18n( $counts['forms'] ) ); ?></strong><span><?php esc_html_e( 'Forms', 'formmailbox' ); ?></span></a><a href="<?php echo esc_url( admin_url( 'admin.php?page=formmailbox-entries' ) ); ?>"><strong><?php echo esc_html( number_format_i18n( $counts['entries'] ) ); ?></strong><span><?php esc_html_e( 'Stored entries', 'formmailbox' ); ?></span></a><a href="<?php echo esc_url( admin_url( 'admin.php?page=formmailbox-entries&email_status=failed' ) ); ?>"><strong><?php echo esc_html( number_format_i18n( $counts['failed'] ) ); ?></strong><span><?php esc_html_e( 'Failed emails', 'formmailbox' ); ?></span></a></div>
		<div class="fmbx-grid fmbx-grid--dashboard"><section class="fmbx-card"><h2><?php esc_html_e( 'Get started', 'formmailbox' ); ?></h2><ol class="fmbx-steps"><li><a href="<?php echo esc_url( admin_url( 'admin.php?page=formmailbox-create' ) ); ?>"><?php esc_html_e( 'Create a form', 'formmailbox' ); ?></a></li><li><?php esc_html_e( 'Publish it and copy its shortcode.', 'formmailbox' ); ?></li><li><?php esc_html_e( 'Paste the shortcode into a page and send a test.', 'formmailbox' ); ?></li></ol><a class="button button-primary" href="<?php echo esc_url( admin_url( 'admin.php?page=formmailbox-create' ) ); ?>"><?php esc_html_e( 'Create Form', 'formmailbox' ); ?></a></section><section class="fmbx-card"><h2><?php esc_html_e( 'Recent entries', 'formmailbox' ); ?></h2><?php if ( ! $entries ) : ?><p class="fmbx-muted"><?php esc_html_e( 'No submissions yet. Entries remain stored even if email delivery fails.', 'formmailbox' ); ?></p><?php else : ?><ul class="fmbx-recent"><?php foreach ( $entries as $entry ) : ?><li><a href="<?php echo esc_url( admin_url( 'admin.php?page=formmailbox-entries&entry_id=' . absint( $entry->id ) ) ); ?>"><?php echo esc_html( $entry->form_name ); ?></a><span><?php echo esc_html( mysql2date( get_option( 'date_format' ), $entry->created_at ) ); ?></span></li><?php endforeach; ?></ul><?php endif; ?></section></div>
		<?php $this->page_end();
	}

	/** @return void */
	public function render_forms() {
		$forms = $this->repository->get_forms(); $this->page_start( __( 'Forms', 'formmailbox' ), __( 'Create, duplicate, embed, and manage your forms.', 'formmailbox' ) ); ?>
		<div class="fmbx-card"><div class="fmbx-section-heading"><div><h2><?php esc_html_e( 'Your forms', 'formmailbox' ); ?></h2><p><?php esc_html_e( 'Each form has its own shortcode and settings.', 'formmailbox' ); ?></p></div><a class="button button-primary" href="<?php echo esc_url( admin_url( 'admin.php?page=formmailbox-create' ) ); ?>"><?php esc_html_e( 'Create Form', 'formmailbox' ); ?></a></div>
		<?php if ( ! $forms ) : ?><div class="fmbx-empty-state"><span class="dashicons dashicons-feedback" aria-hidden="true"></span><h3><?php esc_html_e( 'No forms yet', 'formmailbox' ); ?></h3><p><?php esc_html_e( 'Choose a template or start blank.', 'formmailbox' ); ?></p><a class="button button-primary" href="<?php echo esc_url( admin_url( 'admin.php?page=formmailbox-create' ) ); ?>"><?php esc_html_e( 'Create Your First Form', 'formmailbox' ); ?></a></div>
		<?php else : ?><div class="fmbx-table-wrap"><table class="widefat striped"><thead><tr><th><?php esc_html_e( 'Form', 'formmailbox' ); ?></th><th><?php esc_html_e( 'Shortcode', 'formmailbox' ); ?></th><th><?php esc_html_e( 'Status', 'formmailbox' ); ?></th><th><?php esc_html_e( 'Updated', 'formmailbox' ); ?></th></tr></thead><tbody><?php foreach ( $forms as $form ) : $edit = admin_url( 'admin.php?page=formmailbox-create&form_id=' . absint( $form->id ) ); $dup = wp_nonce_url( admin_url( 'admin.php?page=formmailbox-forms&fmbx_action=duplicate_form&form_id=' . absint( $form->id ) ), 'duplicate_form_' . absint( $form->id ) ); $del = wp_nonce_url( admin_url( 'admin.php?page=formmailbox-forms&fmbx_action=delete_form&form_id=' . absint( $form->id ) ), 'delete_form_' . absint( $form->id ) ); ?><tr><td><strong><a href="<?php echo esc_url( $edit ); ?>"><?php echo esc_html( $form->name ); ?></a></strong><div class="row-actions"><span><a href="<?php echo esc_url( $edit ); ?>"><?php esc_html_e( 'Edit', 'formmailbox' ); ?></a> | </span><span><a href="<?php echo esc_url( $dup ); ?>"><?php esc_html_e( 'Duplicate', 'formmailbox' ); ?></a> | </span><span class="delete"><a class="fmbx-confirm-delete" href="<?php echo esc_url( $del ); ?>"><?php esc_html_e( 'Delete', 'formmailbox' ); ?></a></span></div></td><td><code>[formmailbox id=&quot;<?php echo esc_html( absint( $form->id ) ); ?>&quot;]</code></td><td><span class="fmbx-status fmbx-status--<?php echo esc_attr( $form->status ); ?>"><?php echo esc_html( ucfirst( $form->status ) ); ?></span></td><td><?php echo esc_html( mysql2date( get_option( 'date_format' ), $form->updated_at ) ); ?></td></tr><?php endforeach; ?></tbody></table></div><?php endif; ?></div>
		<?php $this->page_end();
	}

	/** @return void */
	public function render_create_form() {
		$id = isset( $_GET['form_id'] ) ? absint( $_GET['form_id'] ) : 0; // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( $id ) { $this->render_builder( $id ); return; }
		$this->page_start( __( 'Create Form', 'formmailbox' ), __( 'Start with useful fields or choose a blank form.', 'formmailbox' ) ); $templates = FormMailbox_Templates::all(); ?>
		<div class="fmbx-card"><div class="fmbx-section-heading"><div><h2><?php esc_html_e( 'Choose a starting point', 'formmailbox' ); ?></h2><p><?php esc_html_e( 'Every template can be fully edited.', 'formmailbox' ); ?></p></div></div><div class="fmbx-template-list"><?php foreach ( $templates as $key => $template ) : ?><article class="fmbx-template"><div><h3><?php echo esc_html( $template['name'] ); ?></h3><p><?php echo esc_html( $template['description'] ); ?></p><p class="fmbx-muted"><?php echo esc_html( sprintf( _n( '%d field', '%d fields', count( $template['fields'] ), 'formmailbox' ), count( $template['fields'] ) ) ); ?></p></div><form method="post"><input type="hidden" name="fmbx_action" value="create_form"><input type="hidden" name="template" value="<?php echo esc_attr( $key ); ?>"><?php wp_nonce_field( 'fmbx_create_form' ); ?><button class="button<?php echo 'blank' === $key ? '' : ' button-primary'; ?>" type="submit"><?php echo 'blank' === $key ? esc_html__( 'Create Blank Form', 'formmailbox' ) : esc_html__( 'Use Template', 'formmailbox' ); ?></button></form></article><?php endforeach; ?></div></div>
		<?php $this->page_end();
	}

	/** @param int $id Form ID. @return void */
	private function render_builder( $id ) {
		$form = $this->repository->get_form( $id ); if ( ! $form ) { wp_die( esc_html__( 'Form not found.', 'formmailbox' ) ); }
		$fields = $this->repository->decode_json( $form->schema_json ); $settings = wp_parse_args( $this->repository->decode_json( $form->settings_json ), FormMailbox_Templates::default_settings() );
		$this->page_start( __( 'Edit Form', 'formmailbox' ), __( 'Arrange fields, configure notifications, then publish.', 'formmailbox' ) ); ?>
		<form method="post" class="fmbx-builder"><input type="hidden" name="fmbx_action" value="save_form"><input type="hidden" name="form_id" value="<?php echo esc_attr( $id ); ?>"><?php wp_nonce_field( 'fmbx_save_form_' . $id ); ?><div class="fmbx-builder-bar"><label><span><?php esc_html_e( 'Form name', 'formmailbox' ); ?></span><input type="text" name="form_name" value="<?php echo esc_attr( $form->name ); ?>" required></label><label><span><?php esc_html_e( 'Status', 'formmailbox' ); ?></span><select name="form_status"><option value="draft" <?php selected( $form->status, 'draft' ); ?>><?php esc_html_e( 'Draft', 'formmailbox' ); ?></option><option value="published" <?php selected( $form->status, 'published' ); ?>><?php esc_html_e( 'Published', 'formmailbox' ); ?></option></select></label><button class="button button-primary" type="submit"><?php esc_html_e( 'Save Form', 'formmailbox' ); ?></button></div>
		<div class="fmbx-builder-grid"><main class="fmbx-card"><div class="fmbx-section-heading"><div><h2><?php esc_html_e( 'Fields', 'formmailbox' ); ?></h2><p><?php esc_html_e( 'Use arrows to change the order.', 'formmailbox' ); ?></p></div><button type="button" class="button" data-fmbx-add-field><?php esc_html_e( 'Add Field', 'formmailbox' ); ?></button></div><div id="fmbx-fields" data-next-index="<?php echo esc_attr( count( $fields ) ); ?>"><?php foreach ( $fields as $index => $field ) { $this->render_field_row( $field, $index ); } ?></div><div class="fmbx-empty-fields" <?php echo $fields ? 'hidden' : ''; ?>><?php esc_html_e( 'No fields yet. Add your first field.', 'formmailbox' ); ?></div></main><aside><section class="fmbx-card"><h2><?php esc_html_e( 'Embed', 'formmailbox' ); ?></h2><p><?php esc_html_e( 'Paste this into a page or Shortcode block.', 'formmailbox' ); ?></p><code class="fmbx-shortcode">[formmailbox id=&quot;<?php echo esc_html( $id ); ?>&quot;]</code><?php if ( 'draft' === $form->status ) : ?><p class="fmbx-note"><?php esc_html_e( 'Publish before visitors can see it.', 'formmailbox' ); ?></p><?php endif; ?></section><section class="fmbx-card"><h2><?php esc_html_e( 'Email notifications', 'formmailbox' ); ?></h2><label class="fmbx-control"><span><?php esc_html_e( 'Send entries to', 'formmailbox' ); ?></span><input type="email" name="settings[admin_email]" value="<?php echo esc_attr( $settings['admin_email'] ); ?>" required></label><label class="fmbx-control"><span><?php esc_html_e( 'Subject', 'formmailbox' ); ?></span><input type="text" name="settings[admin_subject]" value="<?php echo esc_attr( $settings['admin_subject'] ); ?>"></label><label class="fmbx-check"><input type="checkbox" name="settings[confirmation]" value="1" <?php checked( ! empty( $settings['confirmation'] ) ); ?>> <?php esc_html_e( 'Email a confirmation to the submitter', 'formmailbox' ); ?></label><label class="fmbx-control"><span><?php esc_html_e( 'Confirmation subject', 'formmailbox' ); ?></span><input type="text" name="settings[confirmation_subject]" value="<?php echo esc_attr( $settings['confirmation_subject'] ); ?>"></label><label class="fmbx-control"><span><?php esc_html_e( 'Confirmation message', 'formmailbox' ); ?></span><textarea name="settings[confirmation_message]" rows="4"><?php echo esc_textarea( $settings['confirmation_message'] ); ?></textarea></label></section><section class="fmbx-card"><h2><?php esc_html_e( 'Behaviour and security', 'formmailbox' ); ?></h2><label class="fmbx-control"><span><?php esc_html_e( 'Success message', 'formmailbox' ); ?></span><textarea name="settings[success_message]" rows="3"><?php echo esc_textarea( $settings['success_message'] ); ?></textarea></label><label class="fmbx-check"><input type="checkbox" name="settings[honeypot]" value="1" <?php checked( ! empty( $settings['honeypot'] ) ); ?>> <?php esc_html_e( 'Honeypot protection', 'formmailbox' ); ?></label><label class="fmbx-check"><input type="checkbox" name="settings[timing]" value="1" <?php checked( ! empty( $settings['timing'] ) ); ?>> <?php esc_html_e( 'Submission timing check', 'formmailbox' ); ?></label><label class="fmbx-control"><span><?php esc_html_e( 'CAPTCHA', 'formmailbox' ); ?></span><select name="settings[captcha_provider]"><option value="none" <?php selected( $settings['captcha_provider'], 'none' ); ?>><?php esc_html_e( 'None', 'formmailbox' ); ?></option><option value="math" <?php selected( $settings['captcha_provider'], 'math' ); ?>><?php esc_html_e( 'Built-in math question', 'formmailbox' ); ?></option><option value="recaptcha_v2" <?php selected( $settings['captcha_provider'], 'recaptcha_v2' ); ?>><?php esc_html_e( 'Google reCAPTCHA v2', 'formmailbox' ); ?></option></select></label><label class="fmbx-control"><span><?php esc_html_e( 'reCAPTCHA site key', 'formmailbox' ); ?></span><input type="text" name="settings[recaptcha_site_key]" value="<?php echo esc_attr( $settings['recaptcha_site_key'] ); ?>"></label><label class="fmbx-control"><span><?php esc_html_e( 'reCAPTCHA secret key', 'formmailbox' ); ?></span><input type="password" name="settings[recaptcha_secret_key]" value="<?php echo esc_attr( $settings['recaptcha_secret_key'] ); ?>" autocomplete="new-password"></label><p class="fmbx-muted"><?php esc_html_e( 'Google reCAPTCHA may send visitor information to Google. Explain its use in your privacy policy.', 'formmailbox' ); ?></p></section></aside></div><div class="fmbx-sticky-save"><a class="button" href="<?php echo esc_url( admin_url( 'admin.php?page=formmailbox-forms' ) ); ?>"><?php esc_html_e( 'Back to Forms', 'formmailbox' ); ?></a><button class="button button-primary" type="submit"><?php esc_html_e( 'Save Form', 'formmailbox' ); ?></button></div></form><script type="text/template" id="fmbx-field-template"><?php $this->render_field_row( array( 'key' => '', 'type' => 'text', 'label' => __( 'New field', 'formmailbox' ), 'required' => false, 'placeholder' => '', 'options' => array() ), '__INDEX__' ); ?></script>
		<?php $this->page_end();
	}

	/** @param array $field Field. @param int|string $index Index. @return void */
	private function render_field_row( array $field, $index ) {
		$options = ! empty( $field['options'] ) && is_array( $field['options'] ) ? implode( "\n", $field['options'] ) : '';
		$types = array( 'text' => __( 'Text', 'formmailbox' ), 'email' => __( 'Email', 'formmailbox' ), 'tel' => __( 'Telephone', 'formmailbox' ), 'textarea' => __( 'Long text', 'formmailbox' ), 'number' => __( 'Number', 'formmailbox' ), 'url' => __( 'Website', 'formmailbox' ), 'date' => __( 'Date', 'formmailbox' ), 'time' => __( 'Time', 'formmailbox' ), 'select' => __( 'Dropdown', 'formmailbox' ), 'radio' => __( 'Radio buttons', 'formmailbox' ), 'checkbox' => __( 'Checkboxes', 'formmailbox' ) ); ?>
		<div class="fmbx-field-row"><div class="fmbx-field-row__head"><strong data-fmbx-field-title><?php echo esc_html( $field['label'] ); ?></strong><div><button type="button" class="button-link" data-fmbx-up>↑</button><button type="button" class="button-link" data-fmbx-down>↓</button><button type="button" class="button-link-delete" data-fmbx-remove><?php esc_html_e( 'Remove', 'formmailbox' ); ?></button></div></div><div class="fmbx-field-row__body"><label><span><?php esc_html_e( 'Label', 'formmailbox' ); ?></span><input type="text" name="fields[<?php echo esc_attr( $index ); ?>][label]" value="<?php echo esc_attr( $field['label'] ); ?>" data-fmbx-label required></label><label><span><?php esc_html_e( 'Field key', 'formmailbox' ); ?></span><input type="text" name="fields[<?php echo esc_attr( $index ); ?>][key]" value="<?php echo esc_attr( $field['key'] ); ?>" pattern="[a-z0-9_-]+" required></label><label><span><?php esc_html_e( 'Type', 'formmailbox' ); ?></span><select name="fields[<?php echo esc_attr( $index ); ?>][type]"><?php foreach ( $types as $type => $label ) : ?><option value="<?php echo esc_attr( $type ); ?>" <?php selected( $field['type'], $type ); ?>><?php echo esc_html( $label ); ?></option><?php endforeach; ?></select></label><label><span><?php esc_html_e( 'Placeholder', 'formmailbox' ); ?></span><input type="text" name="fields[<?php echo esc_attr( $index ); ?>][placeholder]" value="<?php echo esc_attr( isset( $field['placeholder'] ) ? $field['placeholder'] : '' ); ?>"></label><label class="fmbx-options"><span><?php esc_html_e( 'Options (one per line)', 'formmailbox' ); ?></span><textarea name="fields[<?php echo esc_attr( $index ); ?>][options]" rows="3"><?php echo esc_textarea( $options ); ?></textarea></label><label class="fmbx-check"><input type="checkbox" name="fields[<?php echo esc_attr( $index ); ?>][required]" value="1" <?php checked( ! empty( $field['required'] ) ); ?>> <?php esc_html_e( 'Required', 'formmailbox' ); ?></label></div></div>
	<?php }

	/** @return void */
	public function render_entries() {
		$id = isset( $_GET['entry_id'] ) ? absint( $_GET['entry_id'] ) : 0; // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( $id ) { $this->render_entry( $id ); return; }
		$entries = $this->repository->get_entries( 200 ); $filter = isset( $_GET['email_status'] ) ? sanitize_key( wp_unslash( $_GET['email_status'] ) ) : ''; // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( $filter ) { $entries = array_filter( $entries, static function ( $entry ) use ( $filter ) { return $entry->email_status === $filter; } ); }
		$this->page_start( __( 'Entries', 'formmailbox' ), __( 'Every valid submission is stored independently of email delivery.', 'formmailbox' ) ); ?>
		<div class="fmbx-card"><div class="fmbx-section-heading"><div><h2><?php esc_html_e( 'Submissions', 'formmailbox' ); ?></h2><p><?php esc_html_e( 'Open an entry to see all values and its email log.', 'formmailbox' ); ?></p></div><div class="fmbx-actions"><form method="get"><input type="hidden" name="page" value="formmailbox-entries"><select name="email_status"><option value=""><?php esc_html_e( 'All email statuses', 'formmailbox' ); ?></option><option value="accepted" <?php selected( $filter, 'accepted' ); ?>><?php esc_html_e( 'Accepted', 'formmailbox' ); ?></option><option value="failed" <?php selected( $filter, 'failed' ); ?>><?php esc_html_e( 'Failed', 'formmailbox' ); ?></option></select><button class="button"><?php esc_html_e( 'Filter', 'formmailbox' ); ?></button></form><a class="button" href="<?php echo esc_url( wp_nonce_url( admin_url( 'admin.php?page=formmailbox-entries&fmbx_action=export_entries' ), 'export_entries' ) ); ?>"><?php esc_html_e( 'Export CSV', 'formmailbox' ); ?></a></div></div><?php if ( ! $entries ) : ?><div class="fmbx-empty-state"><span class="dashicons dashicons-database" aria-hidden="true"></span><h3><?php esc_html_e( 'No entries found', 'formmailbox' ); ?></h3><p><?php esc_html_e( 'Publish and embed a form, then submit a test.', 'formmailbox' ); ?></p></div><?php else : ?><div class="fmbx-table-wrap"><table class="widefat striped"><thead><tr><th><?php esc_html_e( 'Entry', 'formmailbox' ); ?></th><th><?php esc_html_e( 'Form', 'formmailbox' ); ?></th><th><?php esc_html_e( 'Email', 'formmailbox' ); ?></th><th><?php esc_html_e( 'Submitted', 'formmailbox' ); ?></th></tr></thead><tbody><?php foreach ( $entries as $entry ) : ?><tr><td><strong><a href="<?php echo esc_url( admin_url( 'admin.php?page=formmailbox-entries&entry_id=' . absint( $entry->id ) ) ); ?>">#<?php echo esc_html( $entry->id ); ?></a></strong></td><td><?php echo esc_html( $entry->form_name ? $entry->form_name : __( 'Deleted form', 'formmailbox' ) ); ?></td><td><span class="fmbx-status fmbx-status--<?php echo esc_attr( $entry->email_status ); ?>"><?php echo esc_html( ucfirst( $entry->email_status ) ); ?></span></td><td><?php echo esc_html( mysql2date( get_option( 'date_format' ) . ' ' . get_option( 'time_format' ), $entry->created_at ) ); ?></td></tr><?php endforeach; ?></tbody></table></div><?php endif; ?></div>
		<?php $this->page_end();
	}

	/** @param int $id Entry ID. @return void */
	private function render_entry( $id ) {
		$entry = $this->repository->get_entry( $id ); if ( ! $entry ) { wp_die( esc_html__( 'Entry not found.', 'formmailbox' ) ); }
		$labels = array(); foreach ( $this->repository->decode_json( $entry->schema_json ) as $field ) { $labels[ $field['key'] ] = $field['label']; }
		$delete = wp_nonce_url( admin_url( 'admin.php?page=formmailbox-entries&fmbx_action=delete_entry&entry_id=' . $id ), 'delete_entry_' . $id );
		$this->page_start( sprintf( __( 'Entry #%d', 'formmailbox' ), $id ), sprintf( __( 'Submitted through %s.', 'formmailbox' ), $entry->form_name ) ); ?>
		<div class="fmbx-entry-grid"><section class="fmbx-card"><h2><?php esc_html_e( 'Submitted values', 'formmailbox' ); ?></h2><dl class="fmbx-entry-values"><?php foreach ( $entry->values as $value ) : $decoded = json_decode( $value->field_value, true ); ?><div><dt><?php echo esc_html( isset( $labels[ $value->field_key ] ) ? $labels[ $value->field_key ] : $value->field_key ); ?></dt><dd><?php echo nl2br( esc_html( is_array( $decoded ) ? implode( ', ', $decoded ) : $value->field_value ) ); ?></dd></div><?php endforeach; ?></dl></section><aside><section class="fmbx-card"><h2><?php esc_html_e( 'Details', 'formmailbox' ); ?></h2><p><strong><?php esc_html_e( 'Received:', 'formmailbox' ); ?></strong><br><?php echo esc_html( mysql2date( get_option( 'date_format' ) . ' ' . get_option( 'time_format' ), $entry->created_at ) ); ?></p><p><strong><?php esc_html_e( 'Source:', 'formmailbox' ); ?></strong><br><?php echo $entry->source_url ? '<a href="' . esc_url( $entry->source_url ) . '" target="_blank" rel="noopener noreferrer">' . esc_html( $entry->source_url ) . '</a>' : esc_html__( 'Not recorded', 'formmailbox' ); ?></p><p><a class="button" href="<?php echo esc_url( wp_nonce_url( admin_url( 'admin.php?page=formmailbox-entries&fmbx_action=resend_entry&entry_id=' . $id ), 'resend_entry_' . $id ) ); ?>"><?php esc_html_e( 'Resend Notification', 'formmailbox' ); ?></a></p><a class="button button-link-delete fmbx-confirm-delete" href="<?php echo esc_url( $delete ); ?>"><?php esc_html_e( 'Delete Entry', 'formmailbox' ); ?></a></section><section class="fmbx-card"><h2><?php esc_html_e( 'Email log', 'formmailbox' ); ?></h2><?php if ( ! $entry->logs ) : ?><p><?php esc_html_e( 'No email attempts were logged.', 'formmailbox' ); ?></p><?php else : ?><ul class="fmbx-log"><?php foreach ( $entry->logs as $log ) : ?><li><strong><?php echo esc_html( ucfirst( $log->notification_type ) . ': ' . ucfirst( $log->status ) ); ?></strong><span><?php echo esc_html( $log->recipient ); ?></span><small><?php echo esc_html( $log->subject ); ?></small></li><?php endforeach; ?></ul><?php endif; ?></section></aside></div><p><a href="<?php echo esc_url( admin_url( 'admin.php?page=formmailbox-entries' ) ); ?>">← <?php esc_html_e( 'Back to Entries', 'formmailbox' ); ?></a></p>
		<?php $this->page_end();
	}

	/** @return void */
	public function render_help() {
		$this->page_start( __( 'Help', 'formmailbox' ), __( 'Create, publish, embed, and test a form.', 'formmailbox' ) ); ?>
		<div class="fmbx-help-grid"><section class="fmbx-card"><h2><?php esc_html_e( 'Setup guide', 'formmailbox' ); ?></h2><ol class="fmbx-steps"><li><?php esc_html_e( 'Choose a template under Create Form.', 'formmailbox' ); ?></li><li><?php esc_html_e( 'Edit fields and set the form to Published.', 'formmailbox' ); ?></li><li><?php esc_html_e( 'Copy its shortcode into a WordPress Shortcode block.', 'formmailbox' ); ?></li><li><?php esc_html_e( 'Send a test and verify it under Entries.', 'formmailbox' ); ?></li></ol></section><section class="fmbx-card"><h2><?php esc_html_e( 'Embedding', 'formmailbox' ); ?></h2><p><code>[formmailbox id=&quot;123&quot;]</code></p><p><?php esc_html_e( 'Replace 123 with the form ID. Add show_title="yes" to show its name.', 'formmailbox' ); ?></p><h3><?php esc_html_e( 'Theme code', 'formmailbox' ); ?></h3><p><code>formmailbox_render_form( 123 );</code></p></section><section class="fmbx-card"><h2><?php esc_html_e( 'Email troubleshooting', 'formmailbox' ); ?></h2><p><?php esc_html_e( 'Accepted means WordPress handed the message to its mail system, not guaranteed delivery. Configure SMTP if messages disappear. The entry remains stored here.', 'formmailbox' ); ?></p></section><section class="fmbx-card"><h2><?php esc_html_e( 'Security and privacy', 'formmailbox' ); ?></h2><p><?php esc_html_e( 'The submission path uses nonces, validation, sanitization, rate limiting, honeypot, and timing checks. Add a privacy notice whenever you collect personal information.', 'formmailbox' ); ?></p></section></div>
		<?php $this->page_end();
	}

	/** @return void */
	public function render_settings() {
		$s = $this->global_settings(); $this->page_start( __( 'Settings', 'formmailbox' ), __( 'Set defaults used for newly created forms.', 'formmailbox' ) ); ?>
		<form method="post" class="fmbx-card fmbx-settings"><input type="hidden" name="fmbx_action" value="save_settings"><?php wp_nonce_field( 'fmbx_save_settings' ); ?><h2><?php esc_html_e( 'New form defaults', 'formmailbox' ); ?></h2><p class="fmbx-muted"><?php esc_html_e( 'Existing forms keep their own settings.', 'formmailbox' ); ?></p><label class="fmbx-control"><span><?php esc_html_e( 'Notification email', 'formmailbox' ); ?></span><input type="email" name="defaults[admin_email]" value="<?php echo esc_attr( $s['admin_email'] ); ?>" required></label><label class="fmbx-control"><span><?php esc_html_e( 'Notification subject', 'formmailbox' ); ?></span><input type="text" name="defaults[admin_subject]" value="<?php echo esc_attr( $s['admin_subject'] ); ?>"></label><label class="fmbx-check"><input type="checkbox" name="defaults[honeypot]" value="1" <?php checked( ! empty( $s['honeypot'] ) ); ?>> <?php esc_html_e( 'Enable honeypot by default', 'formmailbox' ); ?></label><label class="fmbx-check"><input type="checkbox" name="defaults[timing]" value="1" <?php checked( ! empty( $s['timing'] ) ); ?>> <?php esc_html_e( 'Enable timing check by default', 'formmailbox' ); ?></label><p><button class="button button-primary" type="submit"><?php esc_html_e( 'Save Settings', 'formmailbox' ); ?></button></p></form>
		<?php $this->page_end();
	}

	/** @param mixed $raw Raw fields. @return array */
	private function sanitize_fields( $raw ) {
		$out = array(); $used = array(); $allowed = array( 'text', 'email', 'tel', 'textarea', 'number', 'url', 'date', 'time', 'select', 'radio', 'checkbox' ); if ( ! is_array( $raw ) ) { return $out; }
		foreach ( $raw as $field ) { if ( ! is_array( $field ) ) { continue; } $label = isset( $field['label'] ) ? sanitize_text_field( $field['label'] ) : ''; $key = isset( $field['key'] ) ? sanitize_key( $field['key'] ) : sanitize_key( $label ); $type = isset( $field['type'] ) && in_array( $field['type'], $allowed, true ) ? $field['type'] : 'text'; if ( ! $label || ! $key ) { continue; } $base = $key; $suffix = 2; while ( isset( $used[ $key ] ) ) { $key = $base . '_' . $suffix; ++$suffix; } $used[ $key ] = true; $options = isset( $field['options'] ) ? preg_split( '/\r\n|\r|\n/', sanitize_textarea_field( $field['options'] ) ) : array(); $options = array_values( array_filter( array_map( 'sanitize_text_field', $options ) ) ); $out[] = array( 'key' => $key, 'type' => $type, 'label' => $label, 'required' => ! empty( $field['required'] ), 'placeholder' => isset( $field['placeholder'] ) ? sanitize_text_field( $field['placeholder'] ) : '', 'options' => $options ); }
		return $out;
	}
	/** @param array $raw Raw settings. @return array */
	private function sanitize_form_settings( $raw ) {
		$d = FormMailbox_Templates::default_settings(); if ( ! is_array( $raw ) ) { $raw = array(); }
		$provider = isset( $raw['captcha_provider'] ) && in_array( $raw['captcha_provider'], array( 'none', 'math', 'recaptcha_v2' ), true ) ? $raw['captcha_provider'] : 'none';
		return array( 'admin_email' => isset( $raw['admin_email'] ) && is_email( $raw['admin_email'] ) ? sanitize_email( $raw['admin_email'] ) : $d['admin_email'], 'admin_subject' => isset( $raw['admin_subject'] ) ? sanitize_text_field( $raw['admin_subject'] ) : $d['admin_subject'], 'confirmation' => ! empty( $raw['confirmation'] ), 'confirmation_subject' => isset( $raw['confirmation_subject'] ) ? sanitize_text_field( $raw['confirmation_subject'] ) : $d['confirmation_subject'], 'confirmation_message' => isset( $raw['confirmation_message'] ) ? sanitize_textarea_field( $raw['confirmation_message'] ) : $d['confirmation_message'], 'success_message' => isset( $raw['success_message'] ) ? sanitize_textarea_field( $raw['success_message'] ) : $d['success_message'], 'honeypot' => ! empty( $raw['honeypot'] ), 'timing' => ! empty( $raw['timing'] ), 'captcha_provider' => $provider, 'recaptcha_site_key' => isset( $raw['recaptcha_site_key'] ) ? sanitize_text_field( $raw['recaptcha_site_key'] ) : '', 'recaptcha_secret_key' => isset( $raw['recaptcha_secret_key'] ) ? sanitize_text_field( $raw['recaptcha_secret_key'] ) : '' );
	}
	/** @return array */
	private function global_settings() { return wp_parse_args( get_option( 'formmailbox_defaults', array() ), FormMailbox_Templates::default_settings() ); }
	/** @param array $raw Raw settings. @return array */
	private function sanitize_global_settings( array $raw ) { $s = $this->global_settings(); return array( 'admin_email' => isset( $raw['admin_email'] ) && is_email( $raw['admin_email'] ) ? sanitize_email( $raw['admin_email'] ) : $s['admin_email'], 'admin_subject' => isset( $raw['admin_subject'] ) ? sanitize_text_field( $raw['admin_subject'] ) : $s['admin_subject'], 'honeypot' => ! empty( $raw['honeypot'] ), 'timing' => ! empty( $raw['timing'] ) ); }
	/** @param int $id Entry ID. @return bool */
	private function resend_entry( $id ) {
		$entry = $this->repository->get_entry( $id ); if ( ! $entry ) { return false; }
		$settings = wp_parse_args( $this->repository->decode_json( $entry->settings_json ), FormMailbox_Templates::default_settings() ); $lines = array();
		foreach ( $entry->values as $value ) { $decoded = json_decode( $value->field_value, true ); $lines[] = $value->field_key . ': ' . ( is_array( $decoded ) ? implode( ', ', $decoded ) : $value->field_value ); }
		$recipient = sanitize_email( $settings['admin_email'] ); $subject = str_replace( '{form_name}', $entry->form_name, $settings['admin_subject'] ); $sent = $recipient && wp_mail( $recipient, $subject, implode( "\n\n", $lines ) );
		$this->repository->log_email( $id, 'admin_resend', $recipient, $subject, $sent ? 'accepted' : 'failed' ); $this->repository->update_entry_email_status( $id, $sent ? 'accepted' : 'failed' ); return (bool) $sent;
	}
	/** Streams all entries as CSV. @return void */
	private function export_entries() {
		nocache_headers(); header( 'Content-Type: text/csv; charset=utf-8' ); header( 'Content-Disposition: attachment; filename=formmailbox-entries-' . gmdate( 'Y-m-d' ) . '.csv' );
		$output = fopen( 'php://output', 'w' ); // phpcs:ignore WordPress.WP.AlternativeFunctions.file_system_operations_fopen
		fputcsv( $output, array( 'Entry ID', 'Form', 'Email status', 'Submitted', 'Field', 'Value' ) );
		foreach ( $this->repository->get_entries( 10000 ) as $summary ) { $entry = $this->repository->get_entry( $summary->id ); foreach ( $entry->values as $value ) { $decoded = json_decode( $value->field_value, true ); fputcsv( $output, array( $entry->id, $entry->form_name, $entry->email_status, $entry->created_at, $value->field_key, is_array( $decoded ) ? implode( ', ', $decoded ) : $value->field_value ) ); } }
		fclose( $output ); // phpcs:ignore WordPress.WP.AlternativeFunctions.file_system_operations_fclose
		exit;
	}
	/** @param string $page Page. @param string $notice Notice. @param array $extra Extra args. @return void */
	private function redirect( $page, $notice, array $extra = array() ) { wp_safe_redirect( add_query_arg( array_merge( array( 'page' => $page, 'fmbx_notice' => $notice ), array_filter( $extra ) ), admin_url( 'admin.php' ) ) ); exit; }
}
