<?php
/**
 * Single course helpers — LearnPress course pages.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Batch-load all course post meta (cached).
 *
 * @param int $course_id Course post ID.
 * @return array<string, mixed>
 */
function get_cached_course_meta( $course_id ) {
	$course_id = absint( $course_id );
	if ( ! $course_id ) {
		return array();
	}

	$cache_key = 'course_meta_' . $course_id;
	$meta      = wp_cache_get( $cache_key );

	if ( false === $meta ) {
		$all_meta = get_post_meta( $course_id );
		$meta     = array();

		foreach ( $all_meta as $key => $value ) {
			$raw_value    = is_array( $value ) ? $value[0] : $value;
			$meta[ $key ] = maybe_unserialize( $raw_value );
		}

		wp_cache_set( $cache_key, $meta, '', 3600 );
	}

	return is_array( $meta ) ? $meta : array();
}

/**
 * Detect media type from a URL or embed string.
 *
 * @param string $raw_media Media URL.
 * @return array{type:string,url:string,id:string,video_type?:string}
 */
function detect_media_type( $raw_media ) {
	if ( empty( $raw_media ) ) {
		return array(
			'type' => '',
			'url'  => '',
			'id'   => '',
		);
	}

	if ( false !== strpos( $raw_media, 'youtube.com' ) || false !== strpos( $raw_media, 'youtu.be' ) ) {
		$yt_id = '';
		if ( false !== strpos( $raw_media, 'v=' ) ) {
			$yt_id = explode( 'v=', $raw_media )[1];
			$yt_id = explode( '&', $yt_id )[0];
		} elseif ( false !== strpos( $raw_media, 'youtu.be/' ) ) {
			$yt_id = basename( parse_url( $raw_media, PHP_URL_PATH ) );
		} else {
			$yt_id = basename( $raw_media );
		}

		return array(
			'type' => 'youtube',
			'url'  => 'https://www.youtube.com/embed/' . $yt_id,
			'id'   => $yt_id,
		);
	}

	if ( false !== strpos( $raw_media, 'vimeo.com' ) ) {
		$vimeo_id = '';
		if ( preg_match( '/vimeo\.com\/(\d+)/', $raw_media, $matches ) ) {
			$vimeo_id = $matches[1];
		} else {
			$vimeo_id = basename( parse_url( $raw_media, PHP_URL_PATH ) );
		}

		return array(
			'type' => 'vimeo',
			'url'  => 'https://player.vimeo.com/video/' . $vimeo_id,
			'id'   => $vimeo_id,
		);
	}

	if ( preg_match( '/\.(mp4|webm|ogg|ogv|mov|avi|wmv|flv)$/i', $raw_media ) ) {
		$video_type = 'video/mp4';
		if ( preg_match( '/\.(webm)$/i', $raw_media ) ) {
			$video_type = 'video/webm';
		} elseif ( preg_match( '/\.(ogg|ogv)$/i', $raw_media ) ) {
			$video_type = 'video/ogg';
		}

		return array(
			'type'       => 'video',
			'url'        => $raw_media,
			'id'         => '',
			'video_type' => $video_type,
		);
	}

	if ( preg_match( '/\.(jpg|jpeg|png|gif|webp|svg|bmp|ico)$/i', $raw_media ) ) {
		return array(
			'type' => 'image',
			'url'  => $raw_media,
			'id'   => '',
		);
	}

	return array(
		'type' => 'image',
		'url'  => $raw_media,
		'id'   => '',
	);
}

/**
 * Resolve image alt text from a media library URL.
 *
 * @param string $url      Attachment URL.
 * @param string $fallback Fallback alt text.
 * @return string
 */
function get_media_alt_from_url( $url, $fallback = '' ) {
	if ( empty( $url ) ) {
		return $fallback;
	}

	$attachment_id = attachment_url_to_postid( $url );
	if ( $attachment_id ) {
		$alt = trim( (string) get_post_meta( $attachment_id, '_wp_attachment_image_alt', true ) );
		if ( '' !== $alt ) {
			return $alt;
		}

		$title = trim( (string) get_the_title( $attachment_id ) );
		if ( '' !== $title ) {
			return $title;
		}
	}

	return $fallback;
}

/**
 * Whether the current request is a single course page.
 *
 * @return bool
 */
function akaza_is_single_course_page() {
	if ( is_singular( array( 'lp_course', 'course' ) ) ) {
		return true;
	}
	if ( function_exists( 'learn_press_is_course' ) && learn_press_is_course() ) {
		return true;
	}
	return false;
}

/**
 * Registered course template-part mappings.
 *
 * @return array<string, string>
 */
function akaza_get_course_template_map_options() {
	$options = array(
		'' => __( 'Default LearnPress Course Layout', 'akaza-adventure' ),
	);

	$base_dir = AKAZA_DIR . '/template-parts/courses';
	if ( is_dir( $base_dir ) ) {
		$entries = scandir( $base_dir );
		if ( is_array( $entries ) ) {
			foreach ( $entries as $entry ) {
				if ( '.' === $entry || '..' === $entry ) {
					continue;
				}

				$entry_path = $base_dir . '/' . $entry;
				if ( ! is_dir( $entry_path ) ) {
					continue;
				}

				// Skip shared/internal folders.
				if ( in_array( $entry, array( 'components', 'partials', 'shared' ), true ) ) {
					continue;
				}

				$template_part_key = 'template-parts/courses/' . $entry;
				$template_file     = $entry_path . '.php';
				if ( ! file_exists( $template_file ) ) {
					continue;
				}

				$label = ucwords( str_replace( array( '-', '_' ), ' ', $entry ) );
				$label = sprintf( __( 'SucceedLEARN %s', 'akaza-adventure' ), $label );
				$options[ $template_part_key ] = $label;
			}
		}
	}

	/**
	 * Filter course template mapping options.
	 *
	 * Array key must be template-part path without .php extension.
	 */
	return (array) apply_filters( 'akaza_course_template_map_options', $options );
}

/**
 * Resolve mapped template-part for a given course.
 *
 * @param int $course_id Course post ID.
 * @return string
 */
function akaza_get_mapped_course_template_part( $course_id = 0 ) {
	$course_id = $course_id ? absint( $course_id ) : get_the_ID();
	if ( ! $course_id ) {
		return '';
	}

	$selected = (string) get_post_meta( $course_id, '_akaza_course_template_part', true );
	if ( '' === $selected ) {
		return '';
	}

	$options = akaza_get_course_template_map_options();
	if ( ! array_key_exists( $selected, $options ) ) {
		return '';
	}

	$template_file = AKAZA_DIR . '/' . $selected . '.php';
	if ( ! file_exists( $template_file ) ) {
		return '';
	}

	return $selected;
}

/**
 * Whether current course uses mapped marketing template.
 *
 * @param int $course_id Course post ID.
 * @return bool
 */
function akaza_course_uses_marketing_template( $course_id = 0 ) {
	return '' !== akaza_get_mapped_course_template_part( $course_id );
}

/**
 * Add course template mapping selector in admin.
 */
function akaza_course_template_map_metabox() {
	$post_types = array( 'lp_course', 'course' );

	foreach ( $post_types as $post_type ) {
		if ( post_type_exists( $post_type ) ) {
			add_meta_box(
				'akaza-course-template-map',
				__( 'Template Mapping', 'akaza-adventure' ),
				'akaza_render_course_template_map_metabox',
				$post_type,
				'side',
				'default'
			);
		}
	}
}
add_action( 'add_meta_boxes', 'akaza_course_template_map_metabox' );

/**
 * Render course template mapping meta box.
 *
 * @param WP_Post $post Post object.
 */
function akaza_render_course_template_map_metabox( $post ) {
	$current = (string) get_post_meta( $post->ID, '_akaza_course_template_part', true );
	$options = akaza_get_course_template_map_options();

	wp_nonce_field( 'akaza_course_template_map_save', 'akaza_course_template_map_nonce' );
	?>
	<p>
		<label for="akaza-course-template-map-field" class="screen-reader-text">
			<?php esc_html_e( 'Select template mapping', 'akaza-adventure' ); ?>
		</label>
		<select id="akaza-course-template-map-field" name="akaza_course_template_part" style="width:100%;">
			<?php foreach ( $options as $value => $label ) : ?>
				<option value="<?php echo esc_attr( $value ); ?>" <?php selected( $current, (string) $value ); ?>>
					<?php echo esc_html( $label ); ?>
				</option>
			<?php endforeach; ?>
		</select>
	</p>
	<p style="margin:0;color:#646970;">
		<?php esc_html_e( 'Use this to map a course URL to a custom course template-part.', 'akaza-adventure' ); ?>
	</p>
	<?php
}

/**
 * Save course template mapping.
 *
 * @param int $post_id Post ID.
 */
function akaza_save_course_template_map( $post_id ) {
	if ( ! isset( $_POST['akaza_course_template_map_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['akaza_course_template_map_nonce'] ) ), 'akaza_course_template_map_save' ) ) {
		return;
	}

	if ( wp_is_post_revision( $post_id ) || wp_is_post_autosave( $post_id ) ) {
		return;
	}

	$post_type = get_post_type( $post_id );
	if ( ! in_array( $post_type, array( 'lp_course', 'course' ), true ) ) {
		return;
	}

	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	$raw_value = isset( $_POST['akaza_course_template_part'] ) ? wp_unslash( $_POST['akaza_course_template_part'] ) : '';
	$value     = sanitize_text_field( (string) $raw_value );
	$options   = akaza_get_course_template_map_options();

	if ( ! array_key_exists( $value, $options ) ) {
		$value = '';
	}

	if ( '' === $value ) {
		delete_post_meta( $post_id, '_akaza_course_template_part' );
	} else {
		update_post_meta( $post_id, '_akaza_course_template_part', $value );
	}
}
add_action( 'save_post', 'akaza_save_course_template_map' );

/**
 * One-time helper: auto-map the defensive driving course by slug
 * and seed empty CCBM archive-card fields only (does not touch marketing UI).
 */
function akaza_bootstrap_defensive_driving_course_template_map() {
	$slug         = 'succeedlearn-defensive-driving';
	$template_key = 'template-parts/courses/defensive-driving';

	$candidate_types = array( 'lp_course', 'course' );
	foreach ( $candidate_types as $post_type ) {
		if ( ! post_type_exists( $post_type ) ) {
			continue;
		}

		$course = get_page_by_path( $slug, OBJECT, $post_type );
		if ( ! $course || empty( $course->ID ) ) {
			continue;
		}

		$course_id = (int) $course->ID;

		$current = (string) get_post_meta( $course_id, '_akaza_course_template_part', true );
		if ( '' === $current ) {
			update_post_meta( $course_id, '_akaza_course_template_part', $template_key );
		}

		// Archive card only — never overwrite editor-filled CCBM; never read into hero.
		$desc = trim( (string) get_post_meta( $course_id, 'course_description', true ) );
		if ( '' === $desc ) {
			update_post_meta(
				$course_id,
				'course_description',
				'Help employees anticipate road hazards, make safer decisions and prevent avoidable collisions-with interactive, globally adaptable eLearning built for people who drive for work.'
			);
		}

		$duration = trim( wp_strip_all_tags( (string) get_post_meta( $course_id, 'duration_value', true ) ) );
		if ( '' === $duration || 0 === strcasecmp( $duration, 'N/A' ) ) {
			update_post_meta( $course_id, 'duration_value', '40 minutes' );
		}

		$duration_title = trim( (string) get_post_meta( $course_id, 'duration_title', true ) );
		if ( '' === $duration_title ) {
			update_post_meta( $course_id, 'duration_title', 'Total Duration' );
		}

		$btn = trim( (string) get_post_meta( $course_id, 'individual_btn_text', true ) );
		if ( '' === $btn || 0 === strcasecmp( $btn, 'Buy Course' ) ) {
			update_post_meta( $course_id, 'individual_btn_text', 'View Course' );
		}

		break;
	}
}
add_action( 'init', 'akaza_bootstrap_defensive_driving_course_template_map', 25 );

/**
 * Enqueue shared marketing course styles, plus optional course-specific sheets.
 *
 * Course-specific CSS lives in a per-course folder (same pattern as landing pages):
 *   assets/css/courses/{slug}/*.css
 * Legacy fallback: assets/css/courses/{slug}.css
 *
 * @param string               $course_slug Course folder slug, e.g. defensive-driving.
 * @param array<string, mixed> $args {
 *     Optional. Arguments.
 *     @type bool $shared_sections Load shared sl-course-* section CSS (default true).
 * }
 */
function akaza_enqueue_course_marketing_styles( $course_slug = '', $args = array() ) {
	$args = wp_parse_args(
		$args,
		array(
			'shared_sections' => true,
		)
	);

	$shared = array(
		'akaza-course-global' => 'course-global.css',
	);

	if ( $args['shared_sections'] ) {
		wp_enqueue_style(
			'bootstrap-icons',
			'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css',
			array(),
			'1.11.3'
		);

		$contact_css = AKAZA_DIR . '/assets/css/contact-from.css';
		wp_enqueue_style(
			'akaza-contact-form',
			AKAZA_URI . '/assets/css/contact-from.css',
			array( 'akaza-main' ),
			file_exists( $contact_css ) ? (string) filemtime( $contact_css ) : AKAZA_VERSION
		);

		$shared = array(
			'akaza-course-global'       => 'course-global.css',
			'akaza-course-hero'         => 'course-hero.css',
			'akaza-course-highlights'   => 'course-highlights.css',
			'akaza-course-risk'         => 'course-risk.css',
			'akaza-course-curriculum'   => 'course-curriculum.css',
			'akaza-course-learning'     => 'course-learning.css',
			'akaza-course-localisation' => 'course-localisation.css',
			'akaza-course-audience'     => 'course-audience.css',
			'akaza-course-delivery'     => 'course-delivery.css',
			'akaza-course-faq'          => 'course-faq.css',
			'akaza-course-cta'          => 'course-cta.css',
		);
	}

	foreach ( $shared as $handle => $file ) {
		$path = AKAZA_DIR . '/assets/css/courses/' . $file;
		$deps = ( 'akaza-course-global' === $handle )
			? array( 'akaza-main', 'akaza-fonts' )
			: array( 'akaza-course-global' );

		if ( 'akaza-course-learning' === $handle ) {
			$deps[] = 'bootstrap-icons';
		}

		if ( 'akaza-course-localisation' === $handle ) {
			$deps[] = 'akaza-course-risk';
		}

		if ( 'akaza-course-audience' === $handle ) {
			$deps[] = 'akaza-course-learning';
			$deps[] = 'bootstrap-icons';
		}

		if ( 'akaza-course-cta' === $handle ) {
			$deps[] = 'akaza-contact-form';
		}

		wp_enqueue_style(
			$handle,
			AKAZA_URI . '/assets/css/courses/' . $file,
			$deps,
			file_exists( $path ) ? (string) filemtime( $path ) : AKAZA_VERSION
		);
	}

	if ( $args['shared_sections'] ) {
		$faq_js = AKAZA_DIR . '/assets/js/courses/course-faq.js';
		wp_enqueue_script(
			'akaza-course-faq',
			AKAZA_URI . '/assets/js/courses/course-faq.js',
			array(),
			file_exists( $faq_js ) ? (string) filemtime( $faq_js ) : AKAZA_VERSION,
			array(
				'strategy'  => 'defer',
				'in_footer' => true,
			)
		);
	}

	$course_slug = sanitize_file_name( (string) $course_slug );
	if ( '' === $course_slug ) {
		return;
	}

	$deps = array_keys( $shared );

	// Preferred: per-course folder (like landing pages).
	$course_dir = AKAZA_DIR . '/assets/css/courses/' . $course_slug . '/';
	if ( is_dir( $course_dir ) ) {
		$files = glob( $course_dir . '*.css' );
		if ( is_array( $files ) ) {
			natcasesort( $files );
			foreach ( $files as $file_path ) {
				$name = basename( $file_path, '.css' );
				if ( '' === $name || 0 === filesize( $file_path ) ) {
					continue;
				}

				$rel = 'courses/' . $course_slug . '/' . $name . '.css';
				wp_enqueue_style(
					'akaza-course-' . $course_slug . '-' . $name,
					AKAZA_URI . '/assets/css/' . $rel,
					$deps,
					(string) filemtime( $file_path )
				);
			}
		}
		return;
	}

	// Legacy flat file: assets/css/courses/{slug}.css
	$path = AKAZA_DIR . '/assets/css/courses/' . $course_slug . '.css';
	if ( ! file_exists( $path ) ) {
		return;
	}

	wp_enqueue_style(
		'akaza-course-' . $course_slug,
		AKAZA_URI . '/assets/css/courses/' . $course_slug . '.css',
		$deps,
		(string) filemtime( $path )
	);
}

/**
 * Enqueue single course styles (external file — inline styles are stripped by cache plugins).
 */
function akaza_single_course_assets() {
	if ( ! akaza_is_single_course_page() ) {
		return;
	}

	$course_id = get_queried_object_id();
	if ( $course_id && akaza_course_uses_marketing_template( $course_id ) ) {
		$template = akaza_get_mapped_course_template_part( $course_id );
		akaza_enqueue_course_marketing_styles( $template ? basename( $template ) : '' );
		return;
	}

	wp_enqueue_style(
		'akaza-single-course-fonts',
		'https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&display=swap',
		array(),
		null
	);

	$css_path = AKAZA_DIR . '/assets/css/single-course.css';
	wp_enqueue_style(
		'akaza-single-course',
		AKAZA_URI . '/assets/css/single-course.css',
		array( 'akaza-main', 'akaza-single-course-fonts' ),
		file_exists( $css_path ) ? (string) filemtime( $css_path ) : AKAZA_VERSION
	);
}
add_action( 'wp_enqueue_scripts', 'akaza_single_course_assets', 25 );

/**
 * Body class for single course layout.
 *
 * @param string[] $classes Body classes.
 * @return string[]
 */
function akaza_single_course_body_class( $classes ) {
	if ( ! akaza_is_single_course_page() ) {
		return $classes;
	}

	$classes[] = 'slf-single-course';

	return $classes;
}
add_filter( 'body_class', 'akaza_single_course_body_class' );

/**
 * Ensure course singles use the theme course template (course + lp_course).
 *
 * @param string $template Path to current template.
 * @return string
 */
function akaza_single_course_force_template( $template ) {
	if ( ! is_singular( array( 'lp_course', 'course' ) ) ) {
		return $template;
	}

	$course_template = AKAZA_DIR . '/single-course.php';
	if ( file_exists( $course_template ) ) {
		return $course_template;
	}

	return $template;
}
add_filter( 'template_include', 'akaza_single_course_force_template', 99 );
