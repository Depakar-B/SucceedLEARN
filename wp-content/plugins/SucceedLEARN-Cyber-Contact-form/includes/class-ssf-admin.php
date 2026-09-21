<?php
/**
 * WordPress admin dashboard and CSV export.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class SSF_Admin {

	/** @var SSF_Database */
	private $database;

	public function __construct( SSF_Database $database ) {
		$this->database = $database;
	}

	public function register_menu() {
		add_menu_page(
			__( 'Cybersecurity Form Submissions', 'seo-form' ),
			__( 'Cybersecurity Form', 'seo-form' ),
			'manage_options',
			'ssf-submissions',
			array( $this, 'render_page' ),
			'dashicons-feedback',
			59
		);
	}

	public function render_page() {
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}

		$this->maybe_save_settings();

		$filters   = $this->get_filters();
		$items     = $this->database->get_submissions( $filters );
		$settings  = get_option( SSF_OPTION_KEY, array() );
		$test_mode = ! empty( $settings['admin_email_test_mode'] );
		?>
		<div class="wrap">
			<h1><?php esc_html_e( 'Cybersecurity Form Submissions', 'seo-form' ); ?></h1>
			<p>
				<?php
				esc_html_e(
					'Submissions from [cybersecurity_form]. Default (CSA / US Cyber) live admin: connect@succeedtech.com. Infosec Campaign Registration live admin: vridhi.shah@succeedtech.com. Test mode sends to connect@succeedtech.com.',
					'seo-form'
				);
				?>
			</p>

			<form method="post" style="margin-bottom:20px;padding:12px 16px;background:#fff;border:1px solid #ccd0d4;">
				<?php wp_nonce_field( 'ssf_save_settings', 'ssf_settings_nonce' ); ?>
				<label for="ssf_admin_email_test_mode">
					<input type="checkbox" id="ssf_admin_email_test_mode" name="ssf_admin_email_test_mode" value="1" <?php checked( $test_mode ); ?> />
					<?php esc_html_e( 'Admin email test mode (send notifications to connect@succeedtech.com)', 'seo-form' ); ?>
				</label>
				<?php if ( $test_mode ) : ?>
					<p style="color:#b32d2e;margin:8px 0 0;"><strong><?php esc_html_e( 'Test mode is ON.', 'seo-form' ); ?></strong></p>
				<?php endif; ?>
				<p style="margin:10px 0 0;">
					<button type="submit" class="button button-secondary" name="ssf_save_settings" value="1"><?php esc_html_e( 'Save settings', 'seo-form' ); ?></button>
				</p>
			</form>

			<form method="get" style="margin-bottom:20px;">
				<input type="hidden" name="page" value="ssf-submissions" />
				<label>
					<?php esc_html_e( 'Start Date', 'seo-form' ); ?>
					<input type="date" name="start_date" value="<?php echo esc_attr( $filters['start_date'] ); ?>" />
				</label>
				&nbsp;
				<label>
					<?php esc_html_e( 'End Date', 'seo-form' ); ?>
					<input type="date" name="end_date" value="<?php echo esc_attr( $filters['end_date'] ); ?>" />
				</label>
				&nbsp;
				<label>
					<?php esc_html_e( 'Email', 'seo-form' ); ?>
					<input type="search" name="email" value="<?php echo esc_attr( $filters['email'] ); ?>" />
				</label>
				&nbsp;
				<label>
					<?php esc_html_e( 'Variant', 'seo-form' ); ?>
					<select name="form_variant">
						<option value=""><?php esc_html_e( 'All', 'seo-form' ); ?></option>
						<option value="default" <?php selected( $filters['form_variant'], 'default' ); ?>><?php esc_html_e( 'Default (CSA)', 'seo-form' ); ?></option>
						<option value="infosec" <?php selected( $filters['form_variant'], 'infosec' ); ?>><?php esc_html_e( 'Infosec Campaign', 'seo-form' ); ?></option>
					</select>
				</label>
				&nbsp;
				<button class="button button-primary" type="submit"><?php esc_html_e( 'Filter', 'seo-form' ); ?></button>
				<?php wp_nonce_field( 'ssf_export', 'ssf_export_nonce' ); ?>
				<button class="button" name="ssf_export" value="1"><?php esc_html_e( 'Export CSV', 'seo-form' ); ?></button>
			</form>

			<table class="widefat fixed striped">
				<thead>
					<tr>
						<th><?php esc_html_e( 'Date', 'seo-form' ); ?></th>
						<th><?php esc_html_e( 'Variant', 'seo-form' ); ?></th>
						<th><?php esc_html_e( 'Name', 'seo-form' ); ?></th>
						<th><?php esc_html_e( 'Email', 'seo-form' ); ?></th>
						<th><?php esc_html_e( 'Job Title', 'seo-form' ); ?></th>
						<th><?php esc_html_e( 'Employees', 'seo-form' ); ?></th>
						<th><?php esc_html_e( 'Authorized', 'seo-form' ); ?></th>
						<th><?php esc_html_e( 'Message', 'seo-form' ); ?></th>
						<th><?php esc_html_e( 'UTM Source', 'seo-form' ); ?></th>
						<th><?php esc_html_e( 'Page URL', 'seo-form' ); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php if ( empty( $items ) ) : ?>
						<tr><td colspan="10"><?php esc_html_e( 'No submissions found.', 'seo-form' ); ?></td></tr>
					<?php else : ?>
						<?php
						$date_format = get_option( 'date_format', 'Y-m-d' ) . ' ' . get_option( 'time_format', 'H:i' );
						foreach ( $items as $item ) :
							?>
							<tr>
								<td><?php echo esc_html( wp_date( $date_format, strtotime( $item->created_at ) ) ); ?></td>
								<td><?php echo esc_html( $item->form_variant ?? 'default' ); ?></td>
								<td><?php echo esc_html( $item->name ); ?></td>
								<td><?php echo esc_html( $item->email ); ?></td>
								<td><?php echo esc_html( $item->job_title ?? '' ); ?></td>
								<td><?php echo esc_html( $item->employees ?? '' ); ?></td>
								<td><?php echo ! empty( $item->authorised_confirm ) ? esc_html__( 'Yes', 'seo-form' ) : esc_html__( 'No', 'seo-form' ); ?></td>
								<td><?php echo esc_html( wp_trim_words( $item->message ?? '', 12 ) ); ?></td>
								<td><?php echo esc_html( $item->utm_source ); ?></td>
								<td><a href="<?php echo esc_url( $item->page_url ); ?>" target="_blank" rel="noopener"><?php esc_html_e( 'View', 'seo-form' ); ?></a></td>
							</tr>
						<?php endforeach; ?>
					<?php endif; ?>
				</tbody>
			</table>
		</div>
		<?php
	}

	public function maybe_export_csv() {
		$export_flag = isset( $_GET['ssf_export'] ) ? sanitize_text_field( wp_unslash( $_GET['ssf_export'] ) ) : '';
		if ( '1' !== $export_flag ) {
			return;
		}
		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( esc_html__( 'Unauthorized', 'seo-form' ) );
		}
		if ( ! isset( $_GET['ssf_export_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_GET['ssf_export_nonce'] ) ), 'ssf_export' ) ) {
			wp_die( esc_html__( 'Invalid export request.', 'seo-form' ) );
		}

		$data     = $this->database->get_submissions( $this->get_filters() );
		$filename = 'cybersecurity-form-submissions-' . gmdate( 'Ymd-His' ) . '.csv';

		nocache_headers();
		header( 'Content-Type: text/csv; charset=UTF-8' );
		header( 'Content-Disposition: attachment; filename=' . $filename );

		$fh = fopen( 'php://output', 'w' );
		fputcsv(
			$fh,
			array( 'ID', 'Date', 'Variant', 'Name', 'Email', 'Job Title', 'Employees', 'Authorized', 'Message', 'UTM Source', 'UTM Medium', 'UTM Campaign', 'Page URL', 'IP' )
		);
		foreach ( $data as $row ) {
			fputcsv(
				$fh,
				array(
					$row->id,
					$row->created_at,
					$row->form_variant ?? 'default',
					$row->name,
					$row->email,
					$row->job_title ?? '',
					$row->employees ?? '',
					! empty( $row->authorised_confirm ) ? 'Yes' : 'No',
					$row->message,
					$row->utm_source,
					$row->utm_medium,
					$row->utm_campaign,
					$row->page_url,
					$row->user_ip,
				)
			);
		}
		fclose( $fh );
		exit;
	}

	/**
	 * Persist admin email test mode checkbox.
	 */
	private function maybe_save_settings() {
		if ( empty( $_POST['ssf_save_settings'] ) ) {
			return;
		}
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}
		if ( ! isset( $_POST['ssf_settings_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['ssf_settings_nonce'] ) ), 'ssf_save_settings' ) ) {
			return;
		}

		$settings = get_option( SSF_OPTION_KEY, array() );
		if ( ! is_array( $settings ) ) {
			$settings = array();
		}
		$settings['admin_email_test_mode'] = ! empty( $_POST['ssf_admin_email_test_mode'] ) ? 1 : 0;
		update_option( SSF_OPTION_KEY, $settings, false );

		add_settings_error( 'ssf_settings', 'ssf_settings_saved', __( 'Settings saved.', 'seo-form' ), 'updated' );
		settings_errors( 'ssf_settings' );
	}

	/**
	 * @return array
	 */
	private function get_filters() {
		return array(
			'start_date'   => sanitize_text_field( wp_unslash( $_GET['start_date'] ?? '' ) ),
			'end_date'     => sanitize_text_field( wp_unslash( $_GET['end_date'] ?? '' ) ),
			'email'        => sanitize_email( wp_unslash( $_GET['email'] ?? '' ) ),
			'form_variant' => sanitize_key( wp_unslash( $_GET['form_variant'] ?? '' ) ),
		);
	}
}
