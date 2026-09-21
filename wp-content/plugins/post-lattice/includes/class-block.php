<?php
/**
 * Gutenberg block.
 *
 * @package Post_Lattice
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Dynamic Post Lattice grid block.
 */
class Post_Lattice_Block {

	/**
	 * Register the block.
	 */
	public static function register() {
		wp_register_script(
			'post-lattice-block',
			PLT_URL . 'admin/js/block.js',
			array( 'wp-blocks', 'wp-element', 'wp-block-editor', 'wp-components', 'wp-i18n', 'wp-server-side-render' ),
			PLT_VERSION,
			true
		);

		wp_localize_script(
			'post-lattice-block',
			'pltBlock',
			array(
				'filterTypes' => array(
					array(
						'label' => __( 'Use plugin settings', 'post-lattice' ),
						'value' => '',
					),
					array(
						'label' => __( 'Category pills', 'post-lattice' ),
						'value' => 'category',
					),
					array(
						'label' => __( 'Year pills', 'post-lattice' ),
						'value' => 'year',
					),
					array(
						'label' => __( 'No filters', 'post-lattice' ),
						'value' => 'none',
					),
				),
			)
		);

		register_block_type(
			'post-lattice/grid',
			array(
				'api_version'     => 2,
				'title'           => __( 'Post Lattice Grid', 'post-lattice' ),
				'description'     => __( 'Filterable post, blog, or newsletter card grid.', 'post-lattice' ),
				'category'        => 'widgets',
				'icon'            => 'grid-view',
				'keywords'        => array( 'posts', 'grid', 'blog', 'newsletter' ),
				'editor_script'   => 'post-lattice-block',
				'render_callback' => array( __CLASS__, 'render' ),
				'attributes'      => array(
					'id'                 => array(
						'type'    => 'string',
						'default' => '',
					),
					'filter'             => array(
						'type'    => 'string',
						'default' => '',
					),
					'profile'            => array(
						'type'    => 'string',
						'default' => '',
					),
					'post_types'         => array(
						'type'    => 'string',
						'default' => '',
					),
					'include_categories' => array(
						'type'    => 'string',
						'default' => '',
					),
					'exclude_categories' => array(
						'type'    => 'string',
						'default' => '',
					),
					'title'              => array(
						'type'    => 'string',
						'default' => '',
					),
					'show_hero'          => array(
						'type'    => 'string',
						'default' => '',
					),
					'show_cta'           => array(
						'type'    => 'string',
						'default' => '',
					),
					'columns'            => array(
						'type'    => 'string',
						'default' => '',
					),
					'card_badge'         => array(
						'type'    => 'string',
						'default' => '',
					),
				),
			)
		);
	}

	/**
	 * Render callback.
	 *
	 * @param array $attributes Block attributes.
	 * @return string
	 */
	public static function render( $attributes ) {
		return Post_Lattice_Shortcode::render( is_array( $attributes ) ? $attributes : array() );
	}
}
