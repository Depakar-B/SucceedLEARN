<?php
/**
 * Plugin Name: LP Course Manual Export
 * Description: Lightweight lp_course-only exporter that writes XML to disk. Avoids the LearnPress Import/Export 500.
 * Version: 1.0.0
 *
 * Upload this file to wp-content/mu-plugins/ on succeedlearn.com if it is not already there.
 */

defined( 'ABSPATH' ) || exit;

add_action( 'admin_menu', static function () {
	add_management_page(
		'Export LP Courses',
		'Export LP Courses',
		'manage_options',
		'lp-course-manual-export',
		'sl_lp_course_export_page'
	);
} );

/**
 * Escape a string for WXR CDATA without utf8_encode() (removed in PHP 8.4).
 */
function sl_lp_wxr_cdata( $str ) {
	$str = (string) $str;
	if ( function_exists( 'wp_is_valid_utf8' ) && ! wp_is_valid_utf8( $str ) && function_exists( 'mb_convert_encoding' ) ) {
		$str = mb_convert_encoding( $str, 'UTF-8', 'ISO-8859-1' );
	}
	return '<![CDATA[' . str_replace( ']]>', ']]]]><![CDATA[>', $str ) . ']]>';
}

function sl_lp_export_dir() {
	$upload = wp_upload_dir();
	$dir    = trailingslashit( $upload['basedir'] ) . 'learnpress/export';
	wp_mkdir_p( $dir );
	return $dir;
}

function sl_lp_course_export_page() {
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( esc_html__( 'You do not have permission to export courses.', 'default' ) );
	}

	$result = null;
	if ( isset( $_POST['sl_lp_export'] ) ) {
		check_admin_referer( 'sl_lp_course_export' );
		$ids    = isset( $_POST['course_ids'] ) ? array_map( 'absint', (array) $_POST['course_ids'] ) : array();
		$result = sl_lp_run_course_export( $ids );
	}

	$courses = get_posts(
		array(
			'post_type'      => 'lp_course',
			'post_status'    => 'any',
			'posts_per_page' => -1,
			'orderby'        => 'title',
			'order'          => 'ASC',
		)
	);

	$files = array();
	$dir   = sl_lp_export_dir();
	if ( is_dir( $dir ) ) {
		foreach ( glob( $dir . '/*.xml' ) ?: array() as $file ) {
			$files[] = array(
				'name' => basename( $file ),
				'size' => size_format( (int) filesize( $file ) ),
				'time' => date_i18n( 'Y-m-d H:i:s', filemtime( $file ) ),
				'url'  => wp_upload_dir()['baseurl'] . '/learnpress/export/' . basename( $file ),
			);
		}
		usort(
			$files,
			static function ( $a, $b ) {
				return strcmp( $b['time'], $a['time'] );
			}
		);
	}
	?>
	<div class="wrap">
		<h1>Export LP Courses</h1>
		<p>This exports <code>lp_course</code> posts only (title, content, meta, categories, featured image URL — not base64). Files are saved to:</p>
		<p><code><?php echo esc_html( sl_lp_export_dir() ); ?></code></p>

		<?php if ( is_wp_error( $result ) ) : ?>
			<div class="notice notice-error"><p><?php echo esc_html( $result->get_error_message() ); ?></p></div>
		<?php elseif ( is_array( $result ) ) : ?>
			<div class="notice notice-success">
				<p>Exported <?php echo (int) $result['count']; ?> course(s) to
					<a href="<?php echo esc_url( $result['url'] ); ?>"><?php echo esc_html( $result['name'] ); ?></a>
					(<?php echo esc_html( $result['size'] ); ?>).
				</p>
			</div>
		<?php endif; ?>

		<form method="post">
			<?php wp_nonce_field( 'sl_lp_course_export' ); ?>
			<p>
				<label>
					<input type="checkbox" id="sl-lp-select-all" checked>
					Select all (<?php echo count( $courses ); ?> courses)
				</label>
			</p>
			<div style="max-height:360px;overflow:auto;border:1px solid #ccd0d4;padding:8px;background:#fff;">
				<?php if ( ! $courses ) : ?>
					<p>No <code>lp_course</code> posts found.</p>
				<?php else : ?>
					<?php foreach ( $courses as $course ) : ?>
						<label style="display:block;margin:4px 0;">
							<input type="checkbox" name="course_ids[]" value="<?php echo (int) $course->ID; ?>" checked>
							<?php echo esc_html( $course->post_title ); ?>
							<code>#<?php echo (int) $course->ID; ?></code>
							<small>(<?php echo esc_html( $course->post_status ); ?>)</small>
						</label>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
			<p>
				<button type="submit" name="sl_lp_export" class="button button-primary" <?php disabled( empty( $courses ) ); ?>>
					Export selected courses
				</button>
			</p>
		</form>

		<h2>Saved export files</h2>
		<?php if ( ! $files ) : ?>
			<p>No XML files yet. After a successful export they appear here and in <code>wp-content/uploads/learnpress/export/</code>.</p>
		<?php else : ?>
			<table class="widefat striped">
				<thead>
					<tr><th>File</th><th>Size</th><th>Time</th></tr>
				</thead>
				<tbody>
					<?php foreach ( $files as $file ) : ?>
						<tr>
							<td><a href="<?php echo esc_url( $file['url'] ); ?>"><?php echo esc_html( $file['name'] ); ?></a></td>
							<td><?php echo esc_html( $file['size'] ); ?></td>
							<td><?php echo esc_html( $file['time'] ); ?></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		<?php endif; ?>
	</div>
	<script>
		document.getElementById('sl-lp-select-all') && document.getElementById('sl-lp-select-all').addEventListener('change', function () {
			document.querySelectorAll('input[name="course_ids[]"]').forEach(function (el) { el.checked = this.checked; }, this);
		});
	</script>
	<?php
}

/**
 * @param int[] $course_ids
 * @return array|WP_Error
 */
function sl_lp_run_course_export( $course_ids ) {
	@set_time_limit( 300 );
	@ini_set( 'memory_limit', '512M' );

	$course_ids = array_filter( array_map( 'absint', $course_ids ) );
	if ( empty( $course_ids ) ) {
		return new WP_Error( 'no_courses', 'Select at least one course.' );
	}

	$posts = get_posts(
		array(
			'post_type'      => 'lp_course',
			'post_status'    => 'any',
			'post__in'       => $course_ids,
			'posts_per_page' => -1,
			'orderby'        => 'post__in',
		)
	);

	if ( empty( $posts ) ) {
		return new WP_Error( 'not_found', 'No matching lp_course posts found.' );
	}

	$version = defined( 'LP_ADDON_IMPORT_EXPORT_VER' ) ? LP_ADDON_IMPORT_EXPORT_VER : '4.1.5';
	$charset = get_bloginfo( 'charset' );
	$xml     = '<?xml version="1.0" encoding="' . esc_attr( $charset ) . '" ?>' . "\n";
	$xml    .= '<rss version="2.0"' . "\n";
	$xml    .= '     xmlns:excerpt="http://wordpress.org/export/' . esc_attr( $version ) . '/excerpt/"' . "\n";
	$xml    .= '     xmlns:content="http://purl.org/rss/1.0/modules/content/"' . "\n";
	$xml    .= '     xmlns:wfw="http://wellformedweb.org/CommentAPI/"' . "\n";
	$xml    .= '     xmlns:dc="http://purl.org/dc/elements/1.1/"' . "\n";
	$xml    .= '     xmlns:wp="http://wordpress.org/export/' . esc_attr( $version ) . '/">' . "\n";
	$xml    .= "<channel>\n";
	$xml    .= '<title>' . sl_lp_wxr_cdata( get_bloginfo( 'name' ) ) . "</title>\n";
	$xml    .= '<link>' . esc_url( home_url( '/' ) ) . "</link>\n";
	$xml    .= '<description>' . sl_lp_wxr_cdata( get_bloginfo( 'description' ) ) . "</description>\n";
	$xml    .= '<pubDate>' . gmdate( 'D, d M Y H:i:s +0000' ) . "</pubDate>\n";
	$xml    .= '<language>' . sl_lp_wxr_cdata( get_bloginfo( 'language' ) ) . "</language>\n";
	$xml    .= '<wp:wxr_version>' . esc_html( $version ) . "</wp:wxr_version>\n";
	$xml    .= '<wp:base_site_url>' . esc_url( network_home_url() ) . "</wp:base_site_url>\n";
	$xml    .= '<wp:base_blog_url>' . esc_url( home_url( '/' ) ) . "</wp:base_blog_url>\n";
	$xml    .= "<wp:plugin_name>learnpress</wp:plugin_name>\n";
	$xml    .= '<wp:plugin_version>' . esc_html( $version ) . "</wp:plugin_version>\n";

	$authors = array();
	foreach ( $posts as $post ) {
		$authors[ (int) $post->post_author ] = true;
	}
	foreach ( array_keys( $authors ) as $author_id ) {
		$user = get_userdata( $author_id );
		if ( ! $user ) {
			continue;
		}
		$xml .= "<wp:author>\n";
		$xml .= '<wp:author_id>' . (int) $user->ID . "</wp:author_id>\n";
		$xml .= '<wp:author_login>' . esc_html( $user->user_login ) . "</wp:author_login>\n";
		$xml .= '<wp:author_email>' . esc_html( $user->user_email ) . "</wp:author_email>\n";
		$xml .= '<wp:author_display_name>' . sl_lp_wxr_cdata( $user->display_name ) . "</wp:author_display_name>\n";
		$xml .= "</wp:author>\n";
	}

	global $wpdb;
	foreach ( $posts as $post ) {
		$xml .= sl_lp_export_one_course( $post, $wpdb );
	}

	$xml .= "</channel>\n</rss>\n";

	$dir      = sl_lp_export_dir();
	$filename = 'export-lp-courses-' . gmdate( 'YmdHis' ) . '.xml';
	$path     = $dir . '/' . $filename;
	$written  = file_put_contents( $path, $xml );

	if ( false === $written ) {
		return new WP_Error( 'write_failed', 'Could not write XML to ' . $path . '. Check folder permissions.' );
	}

	return array(
		'count' => count( $posts ),
		'name'  => $filename,
		'url'   => wp_upload_dir()['baseurl'] . '/learnpress/export/' . $filename,
		'size'  => size_format( (int) $written ),
		'path'  => $path,
	);
}

/**
 * @param WP_Post $post
 * @param wpdb    $wpdb
 */
function sl_lp_export_one_course( $post, $wpdb ) {
	$xml  = "<item>\n";
	$xml .= '<title>' . sl_lp_wxr_cdata( $post->post_title ) . "</title>\n";
	$xml .= '<link>' . esc_url( get_permalink( $post ) ) . "</link>\n";
	$xml .= '<pubDate>' . mysql2date( 'D, d M Y H:i:s +0000', $post->post_date_gmt, false ) . "</pubDate>\n";
	$xml .= '<dc:creator>' . sl_lp_wxr_cdata( get_the_author_meta( 'login', $post->post_author ) ) . "</dc:creator>\n";
	$xml .= '<guid isPermaLink="false">' . esc_url( get_the_guid( $post ) ) . "</guid>\n";
	$xml .= "<description></description>\n";
	$xml .= '<content:encoded>' . sl_lp_wxr_cdata( $post->post_content ) . "</content:encoded>\n";
	$xml .= '<excerpt:encoded>' . sl_lp_wxr_cdata( $post->post_excerpt ) . "</excerpt:encoded>\n";
	$xml .= '<wp:post_id>' . (int) $post->ID . "</wp:post_id>\n";
	$xml .= '<wp:post_date>' . esc_html( $post->post_date ) . "</wp:post_date>\n";
	$xml .= '<wp:post_date_gmt>' . esc_html( $post->post_date_gmt ) . "</wp:post_date_gmt>\n";
	$xml .= '<wp:comment_status>' . esc_html( $post->comment_status ) . "</wp:comment_status>\n";
	$xml .= '<wp:ping_status>' . esc_html( $post->ping_status ) . "</wp:ping_status>\n";
	$xml .= '<wp:post_name>' . esc_html( $post->post_name ) . "</wp:post_name>\n";
	$xml .= '<wp:status>' . esc_html( $post->post_status ) . "</wp:status>\n";
	$xml .= '<wp:post_parent>' . (int) $post->post_parent . "</wp:post_parent>\n";
	$xml .= '<wp:menu_order>' . (int) $post->menu_order . "</wp:menu_order>\n";
	$xml .= '<wp:post_type>' . esc_html( $post->post_type ) . "</wp:post_type>\n";
	$xml .= '<wp:post_password>' . esc_html( $post->post_password ) . "</wp:post_password>\n";
	$xml .= '<wp:post_author_id>' . (int) $post->post_author . "</wp:post_author_id>\n";
	$xml .= "<wp:is_sticky>0</wp:is_sticky>\n";

	if ( has_post_thumbnail( $post->ID ) ) {
		$attachment_id = get_post_thumbnail_id( $post->ID );
		$url           = wp_get_attachment_url( $attachment_id );
		if ( $url ) {
			$filename = pathinfo( $url, PATHINFO_FILENAME );
			$xml     .= '<wp:attachment id="' . (int) $attachment_id . '" mime_type="' . esc_attr( (string) get_post_mime_type( $attachment_id ) ) . '" filename="' . esc_attr( $filename ) . '">' . sl_lp_wxr_cdata( $url ) . "</wp:attachment>\n";
		}
	}

	$taxonomies = get_object_taxonomies( $post->post_type );
	if ( $taxonomies ) {
		$terms = wp_get_object_terms( $post->ID, $taxonomies );
		foreach ( (array) $terms as $term ) {
			$xml .= "\t\t<category domain=\"" . esc_attr( $term->taxonomy ) . '" nicename="' . esc_attr( $term->slug ) . '" id="' . (int) $term->term_id . '" parent="' . (int) $term->parent . '" description=" ' . esc_attr( $term->description ) . '">' . sl_lp_wxr_cdata( $term->name ) . "</category>\n";
		}
	}

	if ( $wpdb->get_var( "SHOW TABLES LIKE '{$wpdb->prefix}learnpress_sections'" ) === $wpdb->prefix . 'learnpress_sections' ) {
		$sections = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM {$wpdb->prefix}learnpress_sections WHERE section_course_id = %d ORDER BY section_order ASC", $post->ID ) );
		foreach ( (array) $sections as $section ) {
			$xml .= "<wp:section>\n";
			$xml .= '<wp:section_id>' . (int) $section->section_id . "</wp:section_id>\n";
			$xml .= '<wp:section_name>' . esc_html( $section->section_name ) . "</wp:section_name>\n";
			$xml .= '<wp:section_course_id>' . (int) $section->section_course_id . "</wp:section_course_id>\n";
			$xml .= '<wp:section_order>' . (int) $section->section_order . "</wp:section_order>\n";
			$xml .= '<wp:section_description>' . sl_lp_wxr_cdata( $section->section_description ) . "</wp:section_description>\n";
			$items = $wpdb->get_results( $wpdb->prepare( "SELECT si.*, p.post_type FROM {$wpdb->prefix}learnpress_section_items si INNER JOIN {$wpdb->posts} p ON p.ID = si.item_id WHERE section_id = %d", $section->section_id ) );
			foreach ( (array) $items as $item ) {
				$xml .= "<wp:section_item>\n";
				$xml .= '<wp:section_id>' . (int) $item->section_id . "</wp:section_id>\n";
				$xml .= '<wp:item_id>' . (int) $item->item_id . "</wp:item_id>\n";
				$xml .= '<wp:item_order>' . (int) $item->item_order . "</wp:item_order>\n";
				$xml .= '<wp:item_type>' . esc_html( $item->item_type ) . "</wp:item_type>\n";
				$xml .= "</wp:section_item>\n";
			}
			$xml .= "</wp:section>\n";
		}
	}

	$postmeta = $wpdb->get_results( $wpdb->prepare( "SELECT meta_key, meta_value FROM {$wpdb->postmeta} WHERE post_id = %d", $post->ID ) );
	foreach ( (array) $postmeta as $meta ) {
		if ( '_edit_lock' === $meta->meta_key ) {
			continue;
		}
		$xml .= "<wp:postmeta>\n";
		$xml .= '<wp:meta_key>' . esc_html( $meta->meta_key ) . "</wp:meta_key>\n";
		$xml .= '<wp:meta_value>' . sl_lp_wxr_cdata( $meta->meta_value ) . "</wp:meta_value>\n";
		$xml .= "</wp:postmeta>\n";
	}

	$xml .= "</item>\n";
	return $xml;
}
