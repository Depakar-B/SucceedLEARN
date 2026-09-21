<?php
/**
 * Frontend HTML renderer.
 *
 * @package Post_Lattice
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Renders one Post Lattice instance.
 */
class Post_Lattice_Renderer {

	/**
	 * Instance counter for unique IDs.
	 *
	 * @var int
	 */
	private static $count = 0;

	/**
	 * Render a grid from merged config.
	 *
	 * @param array $overrides Shortcode or block overrides.
	 * @return string
	 */
	public static function render( $overrides = array() ) {
		self::$count++;

		$post_lattice_config = Post_Lattice_Options::merge( is_array( $overrides ) ? $overrides : array() );
		$post_lattice_uid    = 'plt-' . self::$count;
		$post_lattice_cards  = Post_Lattice_Query::get_cards( $post_lattice_config );
		$post_lattice_terms  = array();
		$post_lattice_years  = array();
		$post_lattice_tags   = array();

		if ( empty( $post_lattice_config['enabled_filters'] ) || ! is_array( $post_lattice_config['enabled_filters'] ) ) {
			$post_lattice_config['enabled_filters'] = 'none' !== $post_lattice_config['filter_type'] ? array( $post_lattice_config['filter_type'] ) : array();
		}

		if ( in_array( 'category', $post_lattice_config['enabled_filters'], true ) ) {
			$post_lattice_terms = Post_Lattice_Query::filter_terms( $post_lattice_config );
		}

		if ( in_array( 'year', $post_lattice_config['enabled_filters'], true ) ) {
			$post_lattice_years = Post_Lattice_Query::years_from_cards( $post_lattice_cards );
		}

		if ( in_array( 'tag', $post_lattice_config['enabled_filters'], true ) ) {
			$post_lattice_tags = Post_Lattice_Query::filter_tags( $post_lattice_config );
		}

		Post_Lattice_Assets::enqueue();

		$template = PLT_DIR . 'templates/archive.php';

		if ( ! file_exists( $template ) ) {
			return '';
		}

		ob_start();
		include $template;
		return (string) ob_get_clean();
	}

	/**
	 * Inline CSS variables for one instance.
	 *
	 * @param array $config Instance config.
	 * @return string
	 */
	public static function css_variables( $config ) {
		$map = array(
			'--plt-accent'      => $config['color_accent'],
			'--plt-heading'     => $config['color_heading'],
			'--plt-text'        => $config['color_text'],
			'--plt-muted'       => $config['color_muted'],
			'--plt-bg'          => $config['color_background'],
			'--plt-card'        => $config['color_card'],
			'--plt-cta-bg'      => $config['color_cta_bg'],
			'--plt-cta-text'    => $config['color_cta_text'],
			'--plt-btn-bg'      => $config['color_button_bg'],
			'--plt-btn-text'    => $config['color_button_text'],
			'--plt-radius'      => absint( $config['radius'] ) . 'px',
			'--plt-cols-d'      => (string) absint( $config['columns_desktop'] ),
			'--plt-cols-t'      => (string) absint( $config['columns_tablet'] ),
			'--plt-cols-m'      => (string) absint( $config['columns_mobile'] ),
			'--plt-cols-4k'     => (string) absint( $config['columns_4k'] ),
		);

		$parts = array();

		foreach ( $map as $name => $value ) {
			$parts[] = $name . ':' . $value;
		}

		return implode( ';', $parts );
	}

	/**
	 * JSON config for frontend JS.
	 *
	 * @param array $config Instance config.
	 * @return array
	 */
	public static function js_config( $config ) {
		return array(
			'pageSize'     => (int) $config['page_size'],
			'defaultSort'  => $config['default_sort'],
			'filterType'   => $config['filter_type'],
			'enabledFilters' => array_values( (array) $config['enabled_filters'] ),
			'defaultView'  => $config['default_view'],
			'showViewUI'   => ! empty( $config['show_view_toggle'] ),
			'showingOne'   => $config['showing_one'],
			'showingAll'   => $config['showing_all'],
			'showingPaged' => $config['showing_paged'],
		);
	}

	/**
	 * Include a template partial.
	 *
	 * @param string $name Partial file name without .php.
	 * @param array  $args Variables for the partial.
	 */
	public static function partial( $name, $args = array() ) {
		$path = PLT_DIR . 'templates/partials/' . $name . '.php';

		if ( ! file_exists( $path ) ) {
			return;
		}

		$post_lattice_args = is_array( $args ) ? $args : array();

		include $path;
	}

	/**
	 * Current instance count (for tests / debug).
	 *
	 * @return int
	 */
	public static function instance_count() {
		return self::$count;
	}
}
