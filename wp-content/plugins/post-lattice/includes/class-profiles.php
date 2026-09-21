<?php
/**
 * Saved shortcode profiles and migration.
 *
 * @package Post_Lattice
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * CRUD helpers for shortcode profiles.
 */
class Post_Lattice_Profiles {

	/**
	 * Option key.
	 */
	const OPTION_KEY = 'plt_profiles';

	/**
	 * Meta keys not part of config.
	 *
	 * @return string[]
	 */
	private static function meta_keys() {
		return array( 'name', 'slug' );
	}

	/**
	 * Register hooks.
	 */
	public static function hooks() {
		add_action( 'admin_post_plt_save_profile', array( __CLASS__, 'handle_save_profile' ) );
		add_action( 'admin_post_plt_delete_profile', array( __CLASS__, 'handle_delete_profile' ) );
		add_action( 'admin_post_plt_duplicate_profile', array( __CLASS__, 'handle_duplicate_profile' ) );
	}

	/**
	 * Migrate options into profiles if needed.
	 */
	public static function maybe_migrate() {
		$profiles = get_option( self::OPTION_KEY, null );

		if ( is_array( $profiles ) && ! empty( $profiles ) ) {
			$migrated = array();
			foreach ( $profiles as $profile ) {
				$migrated[] = self::sanitize_profile( $profile );
			}
			update_option( self::OPTION_KEY, $migrated );
			return;
		}

		$defaults = Post_Lattice_Options::get();

		$seed = array(
			self::default_profile( $defaults ),
			self::template_profile( 'home-featured', __( 'Home Featured Section', 'post-lattice' ), array( 'category' ) ),
			self::template_profile( 'blog-index', __( 'Blog Index Page', 'post-lattice' ), array( 'category', 'year', 'sort' ) ),
			self::template_profile( 'newsletter-index', __( 'Newsletter Page', 'post-lattice' ), array( 'category', 'year' ) ),
			self::template_profile( 'related-blogs', __( 'Related Blogs Section', 'post-lattice' ), array( 'category' ), true ),
		);

		update_option( self::OPTION_KEY, self::sanitize_profiles( $seed ) );
	}

	/**
	 * Return all profiles.
	 *
	 * @return array
	 */
	public static function get_profiles() {
		self::maybe_migrate();
		$profiles = get_option( self::OPTION_KEY, array() );

		if ( ! is_array( $profiles ) ) {
			return array();
		}

		return self::sanitize_profiles( $profiles );
	}

	/**
	 * Get profile by slug.
	 *
	 * @param string $slug Profile slug.
	 * @return array|null
	 */
	public static function get_profile( $slug ) {
		$slug = sanitize_title( $slug );
		foreach ( self::get_profiles() as $profile ) {
			if ( $profile['slug'] === $slug ) {
				return $profile;
			}
		}

		return null;
	}

	/**
	 * Get profile config only.
	 *
	 * @param string $slug Profile slug.
	 * @return array
	 */
	public static function get_profile_config( $slug ) {
		$profile = self::get_profile( $slug );
		if ( ! $profile ) {
			return array();
		}

		$config = $profile;
		foreach ( self::meta_keys() as $key ) {
			unset( $config[ $key ] );
		}

		return $config;
	}

	/**
	 * Save one profile (create or update by slug).
	 *
	 * @param array $data Raw profile data.
	 */
	public static function upsert_profile( $data ) {
		$profiles = self::get_profiles();
		$profile  = self::sanitize_profile( $data );
		$updated  = false;

		foreach ( $profiles as $index => $item ) {
			if ( $item['slug'] === $profile['slug'] ) {
				$profiles[ $index ] = $profile;
				$updated            = true;
				break;
			}
		}

		if ( ! $updated ) {
			$profiles[] = $profile;
		}

		update_option( self::OPTION_KEY, self::sanitize_profiles( $profiles ) );
	}

	/**
	 * Delete one profile (default is protected).
	 *
	 * @param string $slug Profile slug.
	 */
	public static function delete_profile( $slug ) {
		$slug     = sanitize_title( $slug );
		$profiles = self::get_profiles();

		$profiles = array_values(
			array_filter(
				$profiles,
				function ( $profile ) use ( $slug ) {
					if ( 'default' === $profile['slug'] ) {
						return true;
					}
					return $profile['slug'] !== $slug;
				}
			)
		);

		update_option( self::OPTION_KEY, self::sanitize_profiles( $profiles ) );
	}

	/**
	 * Convert profile into shortcode string.
	 *
	 * @param array $profile Profile.
	 * @return string
	 */
	public static function shortcode_for_profile( $profile ) {
		return '[post_lattice id="' . sanitize_title( $profile['slug'] ) . '"]';
	}

	/**
	 * Save profile action.
	 */
	public static function handle_save_profile() {
		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( esc_html__( 'Permission denied.', 'post-lattice' ) );
		}

		check_admin_referer( 'plt_profile_actions' );

		$data      = self::get_posted_profile_meta();
		$is_create = empty( $data['slug'] );

		if ( '' === $data['name'] ) {
			$data['name'] = __( 'Untitled Profile', 'post-lattice' );
		}

		if ( $is_create ) {
			$data['slug'] = self::unique_slug( sanitize_title( $data['name'] ) );
		}

		$config_posted = self::get_posted_profile_config();
		if ( ! empty( $config_posted ) ) {
			$data = array_merge( $data, $config_posted );
		}

		$is_new = ! self::get_profile( $data['slug'] );
		if ( $is_new && ! Post_Lattice_Features::is_pro() ) {
			$custom_count = 0;
			foreach ( self::get_profiles() as $item ) {
				if ( 'default' !== $item['slug'] ) {
					$custom_count++;
				}
			}
			if ( $custom_count >= 1 ) {
				wp_safe_redirect( admin_url( 'admin.php?page=post-lattice&tab=profiles&plt_notice=shortcode_limit' ) );
				exit;
			}
		}

		self::upsert_profile( $data );

		$edit_tab = isset( $_POST['edit_tab'] ) ? sanitize_key( (string) wp_unslash( $_POST['edit_tab'] ) ) : '';
		if ( in_array( $edit_tab, array( 'layout', 'text', 'style' ), true ) ) {
			wp_safe_redirect(
				admin_url(
					'admin.php?page=post-lattice&tab=profiles&edit_profile=' . sanitize_title( $data['slug'] ) . '&edit_tab=' . $edit_tab
				)
			);
			exit;
		}

		wp_safe_redirect( admin_url( 'admin.php?page=post-lattice&tab=profiles' ) );
		exit;
	}

	/**
	 * Delete profile action.
	 */
	public static function handle_delete_profile() {
		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( esc_html__( 'Permission denied.', 'post-lattice' ) );
		}

		check_admin_referer( 'plt_profile_actions' );

		$slug = isset( $_POST['slug'] ) ? sanitize_title( wp_unslash( $_POST['slug'] ) ) : '';
		if ( $slug ) {
			self::delete_profile( $slug );
		}

		wp_safe_redirect( admin_url( 'admin.php?page=post-lattice&tab=profiles' ) );
		exit;
	}

	/**
	 * Duplicate profile action.
	 */
	public static function handle_duplicate_profile() {
		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( esc_html__( 'Permission denied.', 'post-lattice' ) );
		}

		check_admin_referer( 'plt_profile_actions' );

		$slug    = isset( $_POST['slug'] ) ? sanitize_title( wp_unslash( $_POST['slug'] ) ) : '';
		$profile = self::get_profile( $slug );

		if ( ! $profile ) {
			wp_safe_redirect( admin_url( 'admin.php?page=post-lattice&tab=profiles' ) );
			exit;
		}

		$profile['name'] = sprintf(
			/* translators: %s: profile name */
			__( '%s Copy', 'post-lattice' ),
			$profile['name']
		);
		$profile['slug'] = sanitize_title( $profile['slug'] . '-' . wp_generate_password( 4, false, false ) );
		self::upsert_profile( $profile );

		wp_safe_redirect( admin_url( 'admin.php?page=post-lattice&tab=profiles' ) );
		exit;
	}

	/**
	 * Read and sanitize posted profile name/slug.
	 *
	 * Call only after check_admin_referer( 'plt_profile_actions' ).
	 *
	 * @return array{name:string,slug:string}
	 */
	private static function get_posted_profile_meta() {
		$raw = array();

		// phpcs:disable WordPress.Security.NonceVerification.Missing -- Verified in handle_save_profile().
		if ( isset( $_POST['profile'] ) ) {
			$raw = map_deep( wp_unslash( (array) $_POST['profile'] ), 'sanitize_text_field' );
		}
		// phpcs:enable WordPress.Security.NonceVerification.Missing

		return array(
			'name' => isset( $raw['name'] ) ? sanitize_text_field( (string) $raw['name'] ) : '',
			'slug' => isset( $raw['slug'] ) ? sanitize_title( (string) $raw['slug'] ) : '',
		);
	}

	/**
	 * Read and sanitize posted profile config fields.
	 *
	 * Call only after check_admin_referer( 'plt_profile_actions' ).
	 *
	 * @return array
	 */
	private static function get_posted_profile_config() {
		// phpcs:disable WordPress.Security.NonceVerification.Missing -- Verified in handle_save_profile().
		if ( ! isset( $_POST['profile_config'] ) ) {
			return array();
		}

		$raw = map_deep( wp_unslash( (array) $_POST['profile_config'] ), 'sanitize_text_field' );
		// phpcs:enable WordPress.Security.NonceVerification.Missing

		return Post_Lattice_Options::sanitize( $raw, true );
	}

	/**
	 * Create default profile from global config.
	 *
	 * @param array $defaults Existing defaults.
	 * @return array
	 */
	private static function default_profile( $defaults ) {
		$config = Post_Lattice_Options::sanitize( $defaults, false );
		return array_merge(
			array(
				'name' => __( 'Default Profile', 'post-lattice' ),
				'slug' => 'default',
			),
			$config
		);
	}

	/**
	 * Create preset profile.
	 *
	 * @param string $slug Slug.
	 * @param string $name Name.
	 * @param array  $enabled_filters Filter set.
	 * @param bool   $related_mode Related mode.
	 * @return array
	 */
	private static function template_profile( $slug, $name, $enabled_filters, $related_mode = false ) {
		$config = Post_Lattice_Defaults::all();
		$config['enabled_filters'] = $enabled_filters;
		$config['related_mode']    = $related_mode ? 1 : 0;
		$config['post_type']       = 'post';
		$config['post_types']      = array( 'post' );
		$config                    = Post_Lattice_Options::sanitize( $config, false );

		return array_merge(
			array(
				'name' => $name,
				'slug' => $slug,
			),
			$config
		);
	}

	/**
	 * Sanitize profile list.
	 *
	 * @param array $profiles Profile list.
	 * @return array
	 */
	private static function sanitize_profiles( $profiles ) {
		$profiles = is_array( $profiles ) ? $profiles : array();
		$clean    = array();
		$seen     = array();

		foreach ( $profiles as $profile ) {
			$item = self::sanitize_profile( $profile );
			if ( isset( $seen[ $item['slug'] ] ) ) {
				continue;
			}
			$seen[ $item['slug'] ] = true;
			$clean[]               = $item;
		}

		if ( empty( $clean ) ) {
			$clean[] = self::default_profile( Post_Lattice_Options::get() );
		}

		return $clean;
	}

	/**
	 * Sanitize one profile. Supports old thin schema.
	 *
	 * @param array $profile Raw profile.
	 * @return array
	 */
	private static function sanitize_profile( $profile ) {
		$profile = is_array( $profile ) ? $profile : array();
		$name    = isset( $profile['name'] ) ? sanitize_text_field( (string) $profile['name'] ) : __( 'Untitled Profile', 'post-lattice' );
		$slug    = isset( $profile['slug'] ) ? sanitize_title( (string) $profile['slug'] ) : sanitize_title( $name );

		$config = Post_Lattice_Options::get();

		// Old thin schema compatibility.
		if ( isset( $profile['include_terms'] ) && ! isset( $profile['include_categories'] ) ) {
			$profile['include_categories'] = $profile['include_terms'];
		}
		if ( isset( $profile['exclude_terms'] ) && ! isset( $profile['exclude_categories'] ) ) {
			$profile['exclude_categories'] = $profile['exclude_terms'];
		}

		foreach ( $profile as $key => $value ) {
			if ( in_array( $key, self::meta_keys(), true ) ) {
				continue;
			}
			$config[ $key ] = $value;
		}

		// Ensure multiple post types are represented and fallback remains.
		if ( isset( $profile['post_type'] ) && ! isset( $profile['post_types'] ) ) {
			$config['post_types'] = array( sanitize_key( (string) $profile['post_type'] ) );
		}

		$config = Post_Lattice_Options::sanitize( $config, false );

		if ( ! Post_Lattice_Features::is_pro() ) {
			$config['post_types'] = array_slice( (array) $config['post_types'], 0, 1 );
			if ( empty( $config['post_types'] ) ) {
				$config['post_types'] = array( 'post' );
			}
		}

		$config['post_type'] = (string) $config['post_types'][0];

		return array_merge(
			array(
				'name' => $name,
				'slug' => $slug,
			),
			$config
		);
	}

	/**
	 * Generate a unique profile slug.
	 *
	 * @param string $base_slug Requested slug.
	 * @return string
	 */
	private static function unique_slug( $base_slug ) {
		$base_slug = sanitize_title( $base_slug );
		if ( '' === $base_slug ) {
			$base_slug = 'shortcode';
		}

		$existing = array();
		foreach ( self::get_profiles() as $profile ) {
			if ( ! empty( $profile['slug'] ) ) {
				$existing[ $profile['slug'] ] = true;
			}
		}

		if ( ! isset( $existing[ $base_slug ] ) ) {
			return $base_slug;
		}

		$index = 2;
		while ( isset( $existing[ $base_slug . '-' . $index ] ) ) {
			$index++;
		}

		return $base_slug . '-' . $index;
	}
}

