<?php
/**
 * Admin settings page.
 *
 * @package Post_Lattice
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Settings API registration and page.
 */
class Post_Lattice_Settings {

	/**
	 * Add top-level admin menu.
	 */
	public static function add_menu() {
		add_menu_page(
			__( 'Post Lattice', 'post-lattice' ),
			__( 'Post Lattice', 'post-lattice' ),
			'manage_options',
			'post-lattice',
			array( __CLASS__, 'render_page' ),
			'dashicons-screenoptions',
			58
		);
	}

	/**
	 * Register option.
	 */
	public static function register() {
		register_setting(
			'plt_settings_group',
			Post_Lattice_Options::OPTION_KEY,
			array(
				'type'              => 'array',
				'sanitize_callback' => array( 'Post_Lattice_Options', 'sanitize' ),
				'default'           => Post_Lattice_Defaults::all(),
			)
		);
	}

	/**
	 * Settings screen.
	 */
	public static function render_page() {
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}

		$post_lattice_tabs        = self::tabs();
		$post_lattice_profiles    = Post_Lattice_Profiles::get_profiles();
		$post_lattice_is_pro      = Post_Lattice_Features::is_pro();
		$post_lattice_active_tab  = isset( $_GET['tab'] ) ? sanitize_key( (string) wp_unslash( $_GET['tab'] ) ) : 'profiles'; // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Read-only tab UI.
		$post_lattice_edit_slug   = isset( $_GET['edit_profile'] ) ? sanitize_title( (string) wp_unslash( $_GET['edit_profile'] ) ) : ''; // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Read-only edit UI.
		$post_lattice_editing     = $post_lattice_edit_slug ? Post_Lattice_Profiles::get_profile( $post_lattice_edit_slug ) : null;
		$post_lattice_edit_tab    = isset( $_GET['edit_tab'] ) ? sanitize_key( (string) wp_unslash( $_GET['edit_tab'] ) ) : 'layout'; // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Read-only edit UI.

		include PLT_DIR . 'admin/views/settings-page.php';
	}

	/**
	 * Tab schema used by the settings view.
	 *
	 * @return array
	 */
	public static function tabs() {
		return array(
			'layout' => array(
				'label'    => __( 'Layout', 'post-lattice' ),
				'sections' => array(
					array(
						'title'       => __( 'What to show', 'post-lattice' ),
						'description' => __( 'Choose the post type and which categories appear in the grid.', 'post-lattice' ),
						'fields'      => array(
						array(
							'id'          => 'post_types',
							'type'        => 'post_types',
							'label'       => __( 'Post types', 'post-lattice' ),
						'description' => __( 'Select the post type to display. Free is limited to Post. Upgrade to Pro to use any post type or multiple post types.', 'post-lattice' ),
						'pro_note'    => __( 'Only the Post post type is available in Free. Pro unlocks all post types and lets you select multiple.', 'post-lattice' ),
						),
							array(
								'id'          => 'include_categories',
								'type'        => 'categories',
								'label'       => __( 'Only these categories', 'post-lattice' ),
								'description' => __( 'Leave all unchecked to include every category. Check items to limit the grid (example: only Newsletter).', 'post-lattice' ),
							),
							array(
								'id'          => 'exclude_categories',
								'type'        => 'categories',
								'label'       => __( 'Hide these categories', 'post-lattice' ),
								'description' => __( 'Checked categories never appear. Use this to keep newsletters off a blog grid.', 'post-lattice' ),
							),
						),
					),
					array(
						'title'       => __( 'Grid and filters', 'post-lattice' ),
						'description' => __( 'How cards are arranged and how visitors filter them.', 'post-lattice' ),
						'fields'      => array(
							array(
								'id'          => 'filter_type',
								'type'        => 'radio',
								'label'       => __( 'Filter pills', 'post-lattice' ),
								'description' => __( 'Choose what the filter pills show: Categories (free) - group posts by category. Years (Pro) - group by publish year. None - hide filter pills entirely.', 'post-lattice' ),
								'pro_note'    => __( 'Years is a Pro-only option. Free can only use Categories or None.', 'post-lattice' ),
								'disabled_choices' => array( 'year' ),
								'choices'     => array(
									'category' => __( 'Categories', 'post-lattice' ),
									'year'     => __( 'Years', 'post-lattice' ),
									'none'     => __( 'None', 'post-lattice' ),
								),
							),
						array(
							'id'          => 'enabled_filters',
							'type'        => 'multi_check',
							'label'       => __( 'Active filter groups', 'post-lattice' ),
							'description' => __( 'Choose which filter groups are shown together.', 'post-lattice' ),
							'pro_note'    => __( 'Enabling more than one filter group at the same time requires Pro. Tag and Year filters also require Pro.', 'post-lattice' ),
							'choices'     => array(
								'category' => __( 'Category', 'post-lattice' ),
								'year'     => __( 'Year', 'post-lattice' ),
								'tag'      => __( 'Tag', 'post-lattice' ),
								'sort'     => __( 'Sort', 'post-lattice' ),
							),
						),
						array(
							'id'          => 'include_tags',
							'type'        => 'tags',
							'label'       => __( 'Only these tags', 'post-lattice' ),
							'description' => __( 'Leave empty for all tags.', 'post-lattice' ),
							'pro'         => true,
							'pro_note'    => __( 'Tag filtering is a Pro feature. Upgrade to use it.', 'post-lattice' ),
						),
						array(
							'id'          => 'exclude_tags',
							'type'        => 'tags',
							'label'       => __( 'Hide these tags', 'post-lattice' ),
							'description' => __( 'Tagged posts matching these terms are excluded.', 'post-lattice' ),
							'pro'         => true,
							'pro_note'    => __( 'Tag filtering is a Pro feature. Upgrade to use it.', 'post-lattice' ),
						),
							array(
								'id'          => 'years',
								'type'        => 'text',
								'label'       => __( 'Allowed years', 'post-lattice' ),
								'description' => __( 'Optional: comma-separated years such as 2026,2025.', 'post-lattice' ),
								'pro'         => true,
								'pro_note'    => __( 'Year filtering is a Pro feature. Upgrade to use it.', 'post-lattice' ),
							),
							array(
								'id'          => 'default_view',
								'type'        => 'radio',
								'label'       => __( 'Default layout view', 'post-lattice' ),
								'description' => __( 'Choose how visitors see cards first: grid or list.', 'post-lattice' ),
								'choices'     => array(
									'grid' => __( 'Grid view', 'post-lattice' ),
									'list' => __( 'List view', 'post-lattice' ),
								),
							),
							array(
								'id'          => 'card_badge',
								'type'        => 'radio',
								'label'       => __( 'Card badge', 'post-lattice' ),
								'description' => __( 'Small label on each card. Use Year for newsletters.', 'post-lattice' ),
								'choices'     => array(
									'category' => __( 'Category name', 'post-lattice' ),
									'year'     => __( 'Year', 'post-lattice' ),
									'none'     => __( 'Hidden', 'post-lattice' ),
								),
							),
							array(
								'id'      => 'columns_desktop',
								'type'    => 'radio',
								'label'   => __( 'Columns on laptop/desktop', 'post-lattice' ),
								'choices' => array(
									'2' => __( '2 columns', 'post-lattice' ),
									'3' => __( '3 columns', 'post-lattice' ),
									'4' => __( '4 columns', 'post-lattice' ),
								),
							),
							array(
								'id'      => 'columns_4k',
								'type'    => 'radio',
								'label'   => __( 'Columns on 4K / ultra-wide', 'post-lattice' ),
								'choices' => array(
									'2' => __( '2 columns', 'post-lattice' ),
									'3' => __( '3 columns', 'post-lattice' ),
									'4' => __( '4 columns', 'post-lattice' ),
									'5' => __( '5 columns', 'post-lattice' ),
									'6' => __( '6 columns', 'post-lattice' ),
								),
							),
							array(
								'id'      => 'columns_tablet',
								'type'    => 'radio',
								'label'   => __( 'Columns on tablet', 'post-lattice' ),
								'choices' => array(
									'1' => __( '1 column', 'post-lattice' ),
									'2' => __( '2 columns', 'post-lattice' ),
									'3' => __( '3 columns', 'post-lattice' ),
								),
							),
							array(
								'id'      => 'columns_mobile',
								'type'    => 'radio',
								'label'   => __( 'Columns on phone', 'post-lattice' ),
								'choices' => array(
									'1' => __( '1 column', 'post-lattice' ),
									'2' => __( '2 columns', 'post-lattice' ),
								),
							),
							array(
								'id'          => 'page_size',
								'type'        => 'number',
								'label'       => __( 'Cards per load', 'post-lattice' ),
								'description' => __( 'How many cards show before “Load more”. Recommended: 9–12.', 'post-lattice' ),
								'min'         => 3,
								'max'         => 48,
							),
							array(
								'id'          => 'max_posts',
								'type'        => 'number',
								'label'       => __( 'Maximum posts loaded', 'post-lattice' ),
								'description' => __( 'Safety cap so very large sites stay fast. 100 is a good default.', 'post-lattice' ),
								'min'         => 1,
								'max'         => 500,
							),
							array(
								'id'          => 'excerpt_words',
								'type'        => 'number',
								'label'       => __( 'Excerpt length (words)', 'post-lattice' ),
								'min'         => 8,
								'max'         => 80,
							),
							array(
								'id'      => 'default_sort',
								'type'    => 'radio',
								'label'   => __( 'Default sort', 'post-lattice' ),
								'choices' => array(
									'newest' => __( 'New to Old', 'post-lattice' ),
									'oldest' => __( 'Old to New', 'post-lattice' ),
									'a-z'    => __( 'Title A → Z', 'post-lattice' ),
									'z-a'    => __( 'Title Z → A', 'post-lattice' ),
								),
							),
						),
					),
					array(
						'title'       => __( 'Visible pieces', 'post-lattice' ),
						'description' => __( 'Turn sections and card details on or off.', 'post-lattice' ),
						'fields'      => array(
							array(
								'id'    => 'show_hero',
								'type'  => 'checkbox',
								'label' => __( 'Show the heading block (title, subtitle, description)', 'post-lattice' ),
							),
							array(
								'id'    => 'show_hero_button',
								'type'  => 'checkbox',
								'label' => __( 'Show the heading button', 'post-lattice' ),
							),
							array(
								'id'    => 'show_search',
								'type'  => 'checkbox',
								'label' => __( 'Show search', 'post-lattice' ),
							),
							array(
								'id'    => 'show_sort',
								'type'  => 'checkbox',
								'label' => __( 'Show sort dropdown', 'post-lattice' ),
							),
							array(
								'id'    => 'show_reset',
								'type'  => 'checkbox',
								'label' => __( 'Show Reset button', 'post-lattice' ),
							),
							array(
								'id'    => 'show_filters',
								'type'  => 'checkbox',
								'label' => __( 'Enable filter pills row', 'post-lattice' ),
							),
							array(
								'id'    => 'show_view_toggle',
								'type'  => 'checkbox',
								'label' => __( 'Enable Grid/List toggle button for visitors', 'post-lattice' ),
							),
							array(
								'id'    => 'show_thumbnail',
								'type'  => 'checkbox',
								'label' => __( 'Show card image', 'post-lattice' ),
							),
							array(
								'id'    => 'show_date',
								'type'  => 'checkbox',
								'label' => __( 'Show date', 'post-lattice' ),
							),
							array(
								'id'    => 'show_read_time',
								'type'  => 'checkbox',
								'label' => __( 'Show read time', 'post-lattice' ),
							),
							array(
								'id'    => 'show_excerpt',
								'type'  => 'checkbox',
								'label' => __( 'Show excerpt', 'post-lattice' ),
							),
							array(
								'id'    => 'show_read_more',
								'type'  => 'checkbox',
								'label' => __( 'Show “Read more” link', 'post-lattice' ),
							),
							array(
								'id'    => 'show_load_more',
								'type'  => 'checkbox',
								'label' => __( 'Show Load more', 'post-lattice' ),
							),
							array(
								'id'    => 'show_cta',
								'type'  => 'checkbox',
								'label' => __( 'Show the bottom call-to-action bar', 'post-lattice' ),
							),
						),
					),
				),
			),
			'text'   => array(
				'label'    => __( 'Text & labels', 'post-lattice' ),
				'sections' => array(
					array(
						'title'       => __( 'Heading', 'post-lattice' ),
						'description' => __( 'Shown at the top of the grid. Leave a field blank to hide that line.', 'post-lattice' ),
						'fields'      => array(
							array(
								'id'    => 'hero_title',
								'type'  => 'text',
								'label' => __( 'Title', 'post-lattice' ),
							),
							array(
								'id'    => 'hero_subtitle',
								'type'  => 'text',
								'label' => __( 'Subtitle', 'post-lattice' ),
							),
							array(
								'id'    => 'hero_description',
								'type'  => 'textarea',
								'label' => __( 'Description', 'post-lattice' ),
							),
							array(
								'id'    => 'hero_button_text',
								'type'  => 'text',
								'label' => __( 'Heading button text', 'post-lattice' ),
							),
							array(
								'id'          => 'hero_button_url',
								'type'        => 'url',
								'label'       => __( 'Heading button link', 'post-lattice' ),
								'description' => __( 'Leave blank to hide the button even if it is enabled above.', 'post-lattice' ),
							),
						),
					),
					array(
						'title'  => __( 'Search and sort', 'post-lattice' ),
						'fields' => array(
							array(
								'id'    => 'search_placeholder',
								'type'  => 'text',
								'label' => __( 'Search placeholder', 'post-lattice' ),
							),
							array(
								'id'    => 'search_label',
								'type'  => 'text',
								'label' => __( 'Search label (screen reader)', 'post-lattice' ),
							),
							array(
								'id'    => 'clear_search_label',
								'type'  => 'text',
								'label' => __( 'Clear search label', 'post-lattice' ),
							),
							array(
								'id'    => 'sort_label',
								'type'  => 'text',
								'label' => __( 'Sort label (screen reader)', 'post-lattice' ),
							),
							array(
								'id'    => 'sort_newest',
								'type'  => 'text',
								'label' => __( 'Sort: newest', 'post-lattice' ),
							),
							array(
								'id'    => 'sort_oldest',
								'type'  => 'text',
								'label' => __( 'Sort: oldest', 'post-lattice' ),
							),
							array(
								'id'    => 'sort_az',
								'type'  => 'text',
								'label' => __( 'Sort: A to Z', 'post-lattice' ),
							),
							array(
								'id'    => 'sort_za',
								'type'  => 'text',
								'label' => __( 'Sort: Z to A', 'post-lattice' ),
							),
							array(
								'id'    => 'reset_text',
								'type'  => 'text',
								'label' => __( 'Reset button', 'post-lattice' ),
							),
						),
					),
					array(
						'title'  => __( 'Filters, cards, and empty states', 'post-lattice' ),
						'fields' => array(
							array(
								'id'    => 'filter_all_text',
								'type'  => 'text',
								'label' => __( 'All categories pill', 'post-lattice' ),
							),
							array(
								'id'    => 'filter_all_years_text',
								'type'  => 'text',
								'label' => __( 'All years pill', 'post-lattice' ),
							),
							array(
								'id'    => 'filter_aria_category',
								'type'  => 'text',
								'label' => __( 'Category filter label', 'post-lattice' ),
							),
							array(
								'id'    => 'filter_aria_year',
								'type'  => 'text',
								'label' => __( 'Year filter label', 'post-lattice' ),
							),
							array(
								'id'    => 'read_more_text',
								'type'  => 'text',
								'label' => __( 'Read more link', 'post-lattice' ),
							),
							array(
								'id'    => 'load_more_text',
								'type'  => 'text',
								'label' => __( 'Load more button', 'post-lattice' ),
							),
							array(
								'id'          => 'showing_one',
								'type'        => 'text',
								'label'       => __( 'Status: one result', 'post-lattice' ),
								'description' => __( 'Example: Showing 1 article', 'post-lattice' ),
							),
							array(
								'id'          => 'showing_all',
								'type'        => 'text',
								'label'       => __( 'Status: all results', 'post-lattice' ),
								'description' => __( 'Use {total} for the count. Example: Showing all {total} articles', 'post-lattice' ),
							),
							array(
								'id'          => 'showing_paged',
								'type'        => 'text',
								'label'       => __( 'Status: partial list', 'post-lattice' ),
								'description' => __( 'Use {visible} and {total}. Example: Showing {visible} of {total} articles', 'post-lattice' ),
							),
							array(
								'id'    => 'empty_posts',
								'type'  => 'text',
								'label' => __( 'No posts message', 'post-lattice' ),
							),
							array(
								'id'    => 'empty_search',
								'type'  => 'text',
								'label' => __( 'No search results message', 'post-lattice' ),
							),
						),
					),
				array(
					'title'       => __( 'Bottom call to action', 'post-lattice' ),
					'description' => __( 'Shown below the card grid. Controls text, button, and colors for this CTA bar.', 'post-lattice' ),
					'fields'      => array(
						array(
							'id'    => 'cta_title',
							'type'  => 'text',
							'label' => __( 'CTA title', 'post-lattice' ),
						),
						array(
							'id'    => 'cta_description',
							'type'  => 'textarea',
							'label' => __( 'CTA description', 'post-lattice' ),
						),
						array(
							'id'    => 'cta_button_text',
							'type'  => 'text',
							'label' => __( 'Button text', 'post-lattice' ),
						),
						array(
							'id'          => 'cta_button_url',
							'type'        => 'url',
							'label'       => __( 'Button link (URL)', 'post-lattice' ),
							'description' => __( 'Leave blank to hide the button.', 'post-lattice' ),
						),
						array(
							'id'    => 'color_cta_bg',
							'type'  => 'color',
							'label' => __( 'CTA bar background color', 'post-lattice' ),
						),
						array(
							'id'    => 'color_cta_text',
							'type'  => 'color',
							'label' => __( 'CTA bar text color', 'post-lattice' ),
						),
						array(
							'id'    => 'color_button_bg',
							'type'  => 'color',
							'label' => __( 'CTA button background color', 'post-lattice' ),
						),
						array(
							'id'    => 'color_button_text',
							'type'  => 'color',
							'label' => __( 'CTA button text color', 'post-lattice' ),
						),
					),
				),
				),
			),
			'style'  => array(
				'label'    => __( 'Colors', 'post-lattice' ),
				'sections' => array(
					array(
						'title'       => __( 'Brand colors', 'post-lattice' ),
						'description' => __( 'These colors apply only to the grid, not the rest of your theme.', 'post-lattice' ),
						'fields'      => array(
							array(
								'id'    => 'color_accent',
								'type'  => 'color',
								'label' => __( 'Accent (pills, badges, links)', 'post-lattice' ),
							),
							array(
								'id'    => 'color_heading',
								'type'  => 'color',
								'label' => __( 'Headings', 'post-lattice' ),
							),
							array(
								'id'    => 'color_text',
								'type'  => 'color',
								'label' => __( 'Body text', 'post-lattice' ),
							),
							array(
								'id'    => 'color_muted',
								'type'  => 'color',
								'label' => __( 'Muted text', 'post-lattice' ),
							),
							array(
								'id'    => 'color_background',
								'type'  => 'color',
								'label' => __( 'Section background', 'post-lattice' ),
							),
							array(
								'id'    => 'color_card',
								'type'  => 'color',
								'label' => __( 'Card background', 'post-lattice' ),
							),
						// CTA colors are now grouped with the CTA section in Text & labels tab.
							array(
								'id'          => 'radius',
								'type'        => 'number',
								'label'       => __( 'Corner radius (px)', 'post-lattice' ),
								'min'         => 0,
								'max'         => 32,
							),
						),
					),
				),
			),
			'profiles' => array(
				'label'    => __( 'Shortcodes', 'post-lattice' ),
				'sections' => array(),
			),
			'help'   => array(
				'label'    => __( 'How to use', 'post-lattice' ),
				'sections' => array(),
			),
		);
	}

	/**
	 * Public post types for the dropdown.
	 *
	 * @return array
	 */
	public static function post_types() {
		$types = get_post_types(
			array(
				'public' => true,
			),
			'objects'
		);

		$choices = array();

		foreach ( $types as $name => $object ) {
			if ( in_array( $name, array( 'attachment', 'elementor_library' ), true ) ) {
				continue;
			}

			$choices[ $name ] = $object->labels->singular_name ? $object->labels->singular_name : $name;
		}

		return $choices;
	}

	/**
	 * Categories (or first hierarchical taxonomy) for checkboxes.
	 *
	 * @param array $options Current options.
	 * @return WP_Term[]
	 */
	public static function category_terms( $options ) {
		$post_types = isset( $options['post_types'] ) ? (array) $options['post_types'] : array();
		if ( empty( $post_types ) ) {
			$post_types = array( isset( $options['post_type'] ) ? $options['post_type'] : 'post' );
		}
		$all = array();
		foreach ( $post_types as $post_type ) {
			$taxonomy = Post_Lattice_Query::taxonomy_for_type( $post_type );
			$terms    = get_terms(
				array(
					'taxonomy'   => $taxonomy,
					'hide_empty' => false,
					'orderby'    => 'name',
					'order'      => 'ASC',
				)
			);
			if ( is_wp_error( $terms ) || empty( $terms ) ) {
				continue;
			}
			foreach ( $terms as $term ) {
				$all[ (int) $term->term_id ] = $term;
			}
		}

		return array_values( $all );
	}

	/**
	 * Tag terms for profile/query controls.
	 *
	 * @return WP_Term[]
	 */
	public static function tag_terms() {
		$terms = get_terms(
			array(
				'taxonomy'   => 'post_tag',
				'hide_empty' => false,
				'orderby'    => 'name',
				'order'      => 'ASC',
			)
		);

		if ( is_wp_error( $terms ) || empty( $terms ) ) {
			return array();
		}

		return $terms;
	}

	/**
	 * Field name attribute.
	 *
	 * @param string $id Field id.
	 * @return string
	 */
	public static function name( $id, $prefix = null ) {
		$prefix = null === $prefix ? Post_Lattice_Options::OPTION_KEY : (string) $prefix;
		return $prefix . '[' . $id . ']';
	}

	/**
	 * Render one field.
	 *
	 * @param array $field   Field schema.
	 * @param array $options Current options.
	 */
	public static function render_field( $field, $options, $name_prefix = null ) {
		$id    = $field['id'];
		$type  = $field['type'];
		$value = isset( $options[ $id ] ) ? $options[ $id ] : '';
		$name  = self::name( $id, $name_prefix );

		switch ( $type ) {
			case 'textarea':
				printf(
					'<textarea class="large-text" rows="3" id="%1$s" name="%2$s">%3$s</textarea>',
					esc_attr( $id ),
					esc_attr( $name ),
					esc_textarea( (string) $value )
				);
				break;

			case 'url':
				printf(
					'<input type="url" class="regular-text" id="%1$s" name="%2$s" value="%3$s" />',
					esc_attr( $id ),
					esc_attr( $name ),
					esc_attr( (string) $value )
				);
				break;

			case 'number':
				printf(
					'<input type="number" class="small-text" id="%1$s" name="%2$s" value="%3$s" min="%4$d" max="%5$d" />',
					esc_attr( $id ),
					esc_attr( $name ),
					esc_attr( (string) $value ),
					isset( $field['min'] ) ? (int) $field['min'] : 0,
					isset( $field['max'] ) ? (int) $field['max'] : 999
				);
				break;

			case 'checkbox':
				printf(
					'<label for="%1$s"><input type="checkbox" id="%1$s" name="%2$s" value="1" %3$s /> %4$s</label>',
					esc_attr( $id ),
					esc_attr( $name ),
					checked( ! empty( $value ), true, false ),
					esc_html( $field['label'] )
				);
				break;

			case 'select':
			case 'radio':
				$disabled_choices = array_map( 'sanitize_key', isset( $field['disabled_choices'] ) ? (array) $field['disabled_choices'] : array() );
				foreach ( $field['choices'] as $choice_value => $choice_label ) {
					$is_disabled = in_array( sanitize_key( (string) $choice_value ), $disabled_choices, true ) && ! Post_Lattice_Features::can_use( Post_Lattice_Features::YEAR_FILTERS );
					printf(
						'<label style="display:block;margin-bottom:4px;"><input type="radio" name="%1$s" value="%2$s" %3$s %4$s /> %5$s</label>',
						esc_attr( $name ),
						esc_attr( (string) $choice_value ),
						checked( (string) $value, (string) $choice_value, false ),
						$is_disabled ? 'disabled="disabled"' : '',
						esc_html( $choice_label )
					);
				}
				break;

			case 'color':
				printf(
					'<input type="text" class="plt-color" id="%1$s" name="%2$s" value="%3$s" data-default-color="%3$s" />',
					esc_attr( $id ),
					esc_attr( $name ),
					esc_attr( (string) $value )
				);
				break;

			case 'post_type':
				$choices = self::post_types();
				echo '<select id="' . esc_attr( $id ) . '" name="' . esc_attr( $name ) . '">';
				foreach ( $choices as $choice_value => $choice_label ) {
					printf(
						'<option value="%1$s" %2$s>%3$s</option>',
						esc_attr( $choice_value ),
						selected( (string) $value, (string) $choice_value, false ),
						esc_html( $choice_label )
					);
				}
				echo '</select>';
				break;

			case 'post_types':
				$choices  = self::post_types();
				$selected = array_map( 'sanitize_key', (array) $value );
				foreach ( $choices as $choice_value => $choice_label ) {
					printf(
						'<label style="display:block;margin-bottom:4px;"><input type="checkbox" name="%1$s[]" value="%2$s" %3$s %5$s /> %4$s</label>',
						esc_attr( $name ),
						esc_attr( (string) $choice_value ),
						checked( in_array( (string) $choice_value, $selected, true ), true, false ),
						esc_html( $choice_label ),
						disabled( ! Post_Lattice_Features::is_pro() && count( $selected ) >= 1 && ! in_array( (string) $choice_value, $selected, true ), true, false )
					);
				}
				break;

			case 'categories':
				$terms    = self::category_terms( $options );
				$selected = array_map( 'absint', (array) $value );

				if ( empty( $terms ) ) {
					echo '<p class="description">' . esc_html__( 'No categories found for this post type yet.', 'post-lattice' ) . '</p>';
					break;
				}

				echo '<div class="plt-term-list">';
				foreach ( $terms as $term ) {
					printf(
						'<label><input type="checkbox" name="%1$s[]" value="%2$d" %3$s /> %4$s <span class="plt-term-count">(%5$d)</span></label>',
						esc_attr( $name ),
						(int) $term->term_id,
						checked( in_array( (int) $term->term_id, $selected, true ), true, false ),
						esc_html( $term->name ),
						(int) $term->count
					);
				}
				echo '</div>';
				break;

			case 'tags':
				$terms    = self::tag_terms();
				$selected = array_map( 'absint', (array) $value );

				if ( empty( $terms ) ) {
					echo '<p class="description">' . esc_html__( 'No tags found yet.', 'post-lattice' ) . '</p>';
					break;
				}

				echo '<div class="plt-term-list">';
				foreach ( $terms as $term ) {
					printf(
						'<label><input type="checkbox" name="%1$s[]" value="%2$d" %3$s %6$s /> %4$s <span class="plt-term-count">(%5$d)</span></label>',
						esc_attr( $name ),
						(int) $term->term_id,
						checked( in_array( (int) $term->term_id, $selected, true ), true, false ),
						esc_html( $term->name ),
						(int) $term->count,
						disabled( ! Post_Lattice_Features::can_use( Post_Lattice_Features::TAG_FILTERS ), true, false )
					);
				}
				echo '</div>';
				break;

			case 'multi_check':
				$selected = array_map( 'sanitize_key', (array) $value );
				foreach ( (array) $field['choices'] as $choice_value => $choice_label ) {
					$is_pro_only = in_array( $choice_value, array( 'tag', 'year' ), true );
					$feature_ok  = true;
					if ( 'tag' === $choice_value ) {
						$feature_ok = Post_Lattice_Features::can_use( Post_Lattice_Features::TAG_FILTERS );
					} elseif ( 'year' === $choice_value ) {
						$feature_ok = Post_Lattice_Features::can_use( Post_Lattice_Features::YEAR_FILTERS );
					}
					printf(
						'<label style="display:block;margin-bottom:4px;"><input type="checkbox" name="%1$s[]" value="%2$s" %3$s %5$s /> %4$s</label>',
						esc_attr( $name ),
						esc_attr( (string) $choice_value ),
						checked( in_array( (string) $choice_value, $selected, true ), true, false ),
						esc_html( $choice_label ),
						$is_pro_only ? disabled( ! $feature_ok, true, false ) : ''
					);
				}
				break;

			case 'text':
			default:
				$text_value = is_array( $value ) ? implode( ',', array_map( 'absint', $value ) ) : (string) $value;
				printf(
					'<input type="text" class="regular-text" id="%1$s" name="%2$s" value="%3$s" />',
					esc_attr( $id ),
					esc_attr( $name ),
					esc_attr( $text_value )
				);
				break;
		}

		if ( 'checkbox' !== $type && ! empty( $field['description'] ) ) {
			echo '<p class="description">' . esc_html( $field['description'] ) . '</p>';
		}

		if ( ! Post_Lattice_Features::is_pro() && ! empty( $field['pro_note'] ) ) {
			echo '<p class="description plt-pro-note"><span class="plt-pro-badge">' . esc_html__( 'Pro', 'post-lattice' ) . '</span> ' . esc_html( $field['pro_note'] ) . '</p>';
		}
	}
}
