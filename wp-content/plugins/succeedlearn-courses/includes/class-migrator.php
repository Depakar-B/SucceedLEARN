<?php
/**
 * Migrate LearnPress lp_course posts to course (in-place, keep IDs).
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class SL_Courses_Migrator {

	const OPTION_FLAG  = 'sl_courses_lp_migrated';
	const OPTION_COUNT = 'sl_courses_lp_migrated_count';
	const META_FROM    = '_sl_migrated_from';

	/**
	 * Admin UI for manual re-run / status.
	 */
	public static function init() {
		add_action( 'admin_menu', array( __CLASS__, 'admin_menu' ), 20 );
		add_action( 'admin_init', array( __CLASS__, 'handle_manual_migrate' ) );
		add_action( 'admin_notices', array( __CLASS__, 'admin_notice' ) );
	}

	/**
	 * Convert all lp_course posts to course once.
	 *
	 * @param bool $force Re-run even if already migrated.
	 * @return int Number of posts converted.
	 */
	public static function migrate( $force = false ) {
		if ( ! $force && get_option( self::OPTION_FLAG ) ) {
			return (int) get_option( self::OPTION_COUNT, 0 );
		}

		global $wpdb;

		$ids = $wpdb->get_col(
			$wpdb->prepare(
				"SELECT ID FROM {$wpdb->posts} WHERE post_type = %s",
				'lp_course'
			)
		);

		if ( empty( $ids ) ) {
			update_option( self::OPTION_FLAG, 1, false );
			update_option( self::OPTION_COUNT, 0, false );
			return 0;
		}

		$ids   = array_map( 'intval', $ids );
		$count = count( $ids );

		// Bulk convert post types (keeps IDs, meta, terms).
		$id_list = implode( ',', $ids );
		$wpdb->query(
			"UPDATE {$wpdb->posts} SET post_type = '" . esc_sql( SL_COURSES_CPT ) . "' WHERE ID IN ({$id_list})"
		);

		foreach ( $ids as $id ) {
			update_post_meta( $id, self::META_FROM, 'lp_course' );
			clean_post_cache( $id );
		}

		update_option( self::OPTION_FLAG, 1, false );
		update_option( self::OPTION_COUNT, $count, false );

		return $count;
	}

	/**
	 * Tools submenu under Courses.
	 */
	public static function admin_menu() {
		add_submenu_page(
			'edit.php?post_type=' . SL_COURSES_CPT,
			__( 'Migrate LearnPress', 'succeedlearn-courses' ),
			__( 'Migrate LearnPress', 'succeedlearn-courses' ),
			'manage_options',
			'sl-courses-migrate',
			array( __CLASS__, 'render_page' )
		);
	}

	/**
	 * Handle manual migrate form.
	 */
	public static function handle_manual_migrate() {
		if ( ! isset( $_POST['sl_courses_migrate_nonce'] ) ) {
			return;
		}

		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}

		if ( ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['sl_courses_migrate_nonce'] ) ), 'sl_courses_migrate' ) ) {
			return;
		}

		$count = self::migrate( true );

		wp_safe_redirect(
			add_query_arg(
				array(
					'page'              => 'sl-courses-migrate',
					'post_type'         => SL_COURSES_CPT,
					'sl_migrated'       => 1,
					'sl_migrated_count' => $count,
				),
				admin_url( 'edit.php' )
			)
		);
		exit;
	}

	/**
	 * Migration tools page.
	 */
	public static function render_page() {
		$done  = (bool) get_option( self::OPTION_FLAG );
		$count = (int) get_option( self::OPTION_COUNT, 0 );

		global $wpdb;
		$remaining = (int) $wpdb->get_var(
			$wpdb->prepare(
				"SELECT COUNT(*) FROM {$wpdb->posts} WHERE post_type = %s",
				'lp_course'
			)
		);
		?>
		<div class="wrap">
			<h1><?php esc_html_e( 'Migrate LearnPress Courses', 'succeedlearn-courses' ); ?></h1>
			<p>
				<?php
				echo esc_html(
					sprintf(
						/* translators: 1: migrated count, 2: remaining lp_course count */
						__( 'Previously migrated: %1$d. Remaining lp_course posts: %2$d.', 'succeedlearn-courses' ),
						$count,
						$remaining
					)
				);
				?>
			</p>
			<?php if ( $done && 0 === $remaining ) : ?>
				<p><strong><?php esc_html_e( 'Migration complete. You can deactivate LearnPress, then flush permalinks (Settings → Permalinks → Save).', 'succeedlearn-courses' ); ?></strong></p>
			<?php endif; ?>
			<form method="post">
				<?php wp_nonce_field( 'sl_courses_migrate', 'sl_courses_migrate_nonce' ); ?>
				<?php submit_button( __( 'Run migration now', 'succeedlearn-courses' ) ); ?>
			</form>
		</div>
		<?php
	}

	/**
	 * One-time success notice after activation migration.
	 */
	public static function admin_notice() {
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}

		if ( isset( $_GET['sl_migrated'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$count = isset( $_GET['sl_migrated_count'] ) ? (int) $_GET['sl_migrated_count'] : 0; // phpcs:ignore WordPress.Security.NonceVerification.Recommended
			echo '<div class="notice notice-success is-dismissible"><p>';
			echo esc_html(
				sprintf(
					/* translators: %d: number of courses */
					__( 'SucceedLEARN Courses: migrated %d LearnPress course(s) to the new Courses post type.', 'succeedlearn-courses' ),
					$count
				)
			);
			echo '</p></div>';
		}
	}
}
