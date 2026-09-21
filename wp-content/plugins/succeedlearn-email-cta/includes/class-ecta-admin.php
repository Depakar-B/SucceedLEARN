<?php
/**
 * WordPress admin list of Email CTA submissions.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class SL_ECTA_Admin {

	/** @var SL_ECTA_Database */
	private $database;

	public function __construct( SL_ECTA_Database $database ) {
		$this->database = $database;
	}

	public function register_menu() {
		add_menu_page(
			__( 'Email CTA Submissions', 'succeedlearn-email-cta' ),
			__( 'Email CTA', 'succeedlearn-email-cta' ),
			'manage_options',
			'sl-ecta-submissions',
			array( $this, 'render_page' ),
			'dashicons-email-alt',
			60
		);
	}

	public function render_page() {
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}

		$filters = $this->get_filters();
		$items   = $this->database->get_submissions( $filters );
		?>
		<div class="wrap">
			<h1><?php esc_html_e( 'Email CTA Submissions', 'succeedlearn-email-cta' ); ?></h1>
			<p><?php esc_html_e( 'Submissions from the [sl_email_cta] shortcode. Admin and user emails are sent after each valid submit.', 'succeedlearn-email-cta' ); ?></p>

			<form method="get" style="margin-bottom:20px;">
				<input type="hidden" name="page" value="sl-ecta-submissions" />
				<label>
					<?php esc_html_e( 'Start Date', 'succeedlearn-email-cta' ); ?>
					<input type="date" name="start_date" value="<?php echo esc_attr( $filters['start_date'] ); ?>" />
				</label>
				&nbsp;
				<label>
					<?php esc_html_e( 'End Date', 'succeedlearn-email-cta' ); ?>
					<input type="date" name="end_date" value="<?php echo esc_attr( $filters['end_date'] ); ?>" />
				</label>
				&nbsp;
				<label>
					<?php esc_html_e( 'Email', 'succeedlearn-email-cta' ); ?>
					<input type="search" name="email" value="<?php echo esc_attr( $filters['email'] ); ?>" />
				</label>
				&nbsp;
				<label>
					<?php esc_html_e( 'Source', 'succeedlearn-email-cta' ); ?>
					<input type="search" name="source" value="<?php echo esc_attr( $filters['source'] ); ?>" />
				</label>
				&nbsp;
				<button class="button button-primary" type="submit"><?php esc_html_e( 'Filter', 'succeedlearn-email-cta' ); ?></button>
				<?php wp_nonce_field( 'sl_ecta_export', 'sl_ecta_export_nonce' ); ?>
				<button class="button" name="sl_ecta_export" value="1"><?php esc_html_e( 'Export CSV', 'succeedlearn-email-cta' ); ?></button>
			</form>

			<table class="widefat fixed striped">
				<thead>
					<tr>
						<th><?php esc_html_e( 'Date', 'succeedlearn-email-cta' ); ?></th>
						<th><?php esc_html_e( 'Email', 'succeedlearn-email-cta' ); ?></th>
						<th><?php esc_html_e( 'Source', 'succeedlearn-email-cta' ); ?></th>
						<th><?php esc_html_e( 'UTM Source', 'succeedlearn-email-cta' ); ?></th>
						<th><?php esc_html_e( 'Page URL', 'succeedlearn-email-cta' ); ?></th>
						<th><?php esc_html_e( 'IP', 'succeedlearn-email-cta' ); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php if ( empty( $items ) ) : ?>
						<tr><td colspan="6"><?php esc_html_e( 'No submissions found.', 'succeedlearn-email-cta' ); ?></td></tr>
					<?php else : ?>
						<?php
						$date_format = get_option( 'date_format', 'Y-m-d' ) . ' ' . get_option( 'time_format', 'H:i' );
						foreach ( $items as $item ) :
							?>
							<tr>
								<td><?php echo esc_html( wp_date( $date_format, strtotime( $item->created_at ) ) ); ?></td>
								<td><?php echo esc_html( $item->email ); ?></td>
								<td><?php echo esc_html( $item->source ); ?></td>
								<td><?php echo esc_html( ! empty( $item->utm_source ) ? $item->utm_source : 'Direct' ); ?></td>
								<td>
									<?php if ( ! empty( $item->page_url ) ) : ?>
										<a href="<?php echo esc_url( $item->page_url ); ?>" target="_blank" rel="noopener"><?php esc_html_e( 'View', 'succeedlearn-email-cta' ); ?></a>
									<?php else : ?>
										—
									<?php endif; ?>
								</td>
								<td>
									<?php
									$ip = (string) ( $item->user_ip ?? '' );
									if ( in_array( strtolower( $ip ), array( '::1', '0:0:0:0:0:0:0:1' ), true ) ) {
										$ip = '127.0.0.1';
									}
									echo esc_html( $ip );
									?>
								</td>
							</tr>
						<?php endforeach; ?>
					<?php endif; ?>
				</tbody>
			</table>
		</div>
		<?php
	}

	public function maybe_export_csv() {
		$export_flag = isset( $_GET['sl_ecta_export'] ) ? sanitize_text_field( wp_unslash( $_GET['sl_ecta_export'] ) ) : '';
		if ( '1' !== $export_flag ) {
			return;
		}
		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( esc_html__( 'Unauthorized', 'succeedlearn-email-cta' ) );
		}
		if ( ! isset( $_GET['sl_ecta_export_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_GET['sl_ecta_export_nonce'] ) ), 'sl_ecta_export' ) ) {
			wp_die( esc_html__( 'Invalid export request.', 'succeedlearn-email-cta' ) );
		}

		$data     = $this->database->get_submissions( $this->get_filters() );
		$filename = 'email-cta-submissions-' . gmdate( 'Ymd-His' ) . '.csv';

		nocache_headers();
		header( 'Content-Type: text/csv; charset=UTF-8' );
		header( 'Content-Disposition: attachment; filename=' . $filename );

		$out = fopen( 'php://output', 'w' );
		fputcsv( $out, array( 'Date', 'Email', 'Source', 'UTM Source', 'UTM Medium', 'UTM Campaign', 'Page URL', 'IP' ) );
		foreach ( $data as $row ) {
			fputcsv(
				$out,
				array(
					$row->created_at,
					$row->email,
					$row->source,
					$row->utm_source,
					$row->utm_medium,
					$row->utm_campaign,
					$row->page_url,
					$row->user_ip,
				)
			);
		}
		fclose( $out );
		exit;
	}

	/**
	 * @return array
	 */
	private function get_filters() {
		return array(
			'start_date' => isset( $_GET['start_date'] ) ? sanitize_text_field( wp_unslash( $_GET['start_date'] ) ) : '', // phpcs:ignore WordPress.Security.NonceVerification.Recommended
			'end_date'   => isset( $_GET['end_date'] ) ? sanitize_text_field( wp_unslash( $_GET['end_date'] ) ) : '', // phpcs:ignore WordPress.Security.NonceVerification.Recommended
			'email'      => isset( $_GET['email'] ) ? sanitize_text_field( wp_unslash( $_GET['email'] ) ) : '', // phpcs:ignore WordPress.Security.NonceVerification.Recommended
			'source'     => isset( $_GET['source'] ) ? sanitize_text_field( wp_unslash( $_GET['source'] ) ) : '', // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		);
	}
}
