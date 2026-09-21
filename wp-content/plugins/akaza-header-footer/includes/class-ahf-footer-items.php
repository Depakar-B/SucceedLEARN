<?php
/**
 * Footer link registry (shared page-ID helpers with header nav).
 *
 * @package Akaza_Header_Footer
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Central footer definitions (filterable).
 */
class AHF_Footer_Items {

	/**
	 * Courses grouped by category for the "Our Complete Solutions" footer block.
	 *
	 * @return array<int, array{label:string,url:string,courses:array<int, array{label:string,url:string}>}>
	 */
	public static function get_complete_solutions() {
		$cached = get_transient( 'ahf_footer_complete_solutions_v2' );
		if ( false !== $cached && is_array( $cached ) ) {
			return apply_filters( 'ahf_footer_complete_solutions', $cached );
		}

		$post_types = class_exists( 'AHF_Mega_Menu_Data' )
			? AHF_Mega_Menu_Data::detect_course_post_types()
			: array_values(
				array_filter(
					array( 'course', 'lp_course' ),
					static function ( $candidate ) {
						return post_type_exists( $candidate );
					}
				)
			);
		$taxonomy = class_exists( 'AHF_Mega_Menu_Data' )
			? AHF_Mega_Menu_Data::detect_course_taxonomy( $post_types )
			: '';
		if ( '' === $taxonomy ) {
			foreach ( array( 'course_category', 'lp_course_category' ) as $candidate_tax ) {
				if ( taxonomy_exists( $candidate_tax ) ) {
					$taxonomy = $candidate_tax;
					break;
				}
			}
		}

		$groups = array();

		if ( ! empty( $post_types ) && taxonomy_exists( $taxonomy ) ) {
			$terms = get_terms(
				array(
					'taxonomy'   => $taxonomy,
					'hide_empty' => true,
					'orderby'    => 'name',
					'order'      => 'ASC',
				)
			);

			if ( ! is_wp_error( $terms ) && ! empty( $terms ) ) {
				$courses_base = AHF_Menu_Items::get_courses_menu_path();

				foreach ( $terms as $term ) {
					$posts = get_posts(
						array(
							'post_type'      => $post_types,
							'posts_per_page' => -1,
							'post_status'    => 'publish',
							'orderby'        => 'title',
							'order'          => 'ASC',
							'tax_query'      => array( // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_tax_query
								array(
									'taxonomy' => $taxonomy,
									'field'    => 'term_id',
									'terms'    => (int) $term->term_id,
								),
							),
						)
					);

					if ( empty( $posts ) ) {
						continue;
					}

					$courses = array();
					foreach ( $posts as $post ) {
						$meta_title = get_post_meta( $post->ID, 'course_title', true );
						$label      = is_string( $meta_title ) && '' !== $meta_title ? $meta_title : get_the_title( $post );
						$label      = wp_specialchars_decode( wp_strip_all_tags( (string) $label ), ENT_QUOTES );
						$permalink  = get_permalink( $post );
						if ( ! $permalink ) {
							continue;
						}

						$courses[] = array(
							'label' => $label,
							'url'   => AHF_Menu_Items::absolute_url_to_menu_path( $permalink ),
						);
					}

					if ( empty( $courses ) ) {
						continue;
					}

					$groups[] = array(
						'label'   => wp_specialchars_decode( $term->name, ENT_QUOTES ),
						'url'     => $courses_base . '#cca-category-' . $term->slug,
						'courses' => $courses,
					);
				}
			}
		}

		set_transient( 'ahf_footer_complete_solutions_v2', $groups, HOUR_IN_SECONDS );

		return apply_filters( 'ahf_footer_complete_solutions', $groups );
	}

	/**
	 * Clear cached complete-solutions groups when courses change.
	 */
	public static function flush_complete_solutions_cache() {
		delete_transient( 'ahf_footer_complete_solutions' );
		delete_transient( 'ahf_footer_complete_solutions_v2' );

		if ( class_exists( 'AHF_Mega_Menu_Data' ) ) {
			delete_transient( AHF_Mega_Menu_Data::TRANSIENT_KEY );
		}
	}

	/**
	 * Course links for the footer column.
	 *
	 * @return array<int, array{label:string,url:string}>
	 */
	public static function get_course_links() {
		$items = array(
			array(
				'label' => __( 'POSH Training for Employees', 'akaza-header-footer' ),
				'url'   => AHF_Menu_Items::get_employees_menu_path(),
			),
			array(
				'label' => __( 'POSH Training For Managers', 'akaza-header-footer' ),
				'url'   => AHF_Menu_Items::get_managers_menu_path(),
			),
			array(
				'label' => __( 'POSH Training For IC Members', 'akaza-header-footer' ),
				'url'   => AHF_Menu_Items::get_ic_members_menu_path(),
			),
			array(
				'label' => __( 'POSH Training for HEI', 'akaza-header-footer' ),
				'url'   => AHF_Menu_Items::get_hei_menu_path(),
			),
			array(
				'label' => __( 'Compliance Management System', 'akaza-header-footer' ),
				'url'   => AHF_Menu_Items::get_cms_menu_path(),
			),
			array(
				'label' => __( 'POCSO', 'akaza-header-footer' ),
				'url'   => AHF_Menu_Items::get_pocso_menu_path(),
			),
			array(
				'label' => __( 'Unconscious Bias', 'akaza-header-footer' ),
				'url'   => AHF_Menu_Items::get_unconscious_bias_menu_path(),
			),
			array(
				'label' => __( 'Equality, Diversity & Inclusion', 'akaza-header-footer' ),
				'url'   => AHF_Menu_Items::get_equality_diversity_menu_path(),
			),
			array(
				'label' => __( 'Sexual Harassment Prevention for US', 'akaza-header-footer' ),
				'url'   => AHF_Menu_Items::get_sexual_harassment_us_menu_path(),
			),
		);

		return apply_filters( 'ahf_footer_course_links', $items );
	}

	/**
	 * Bottom legal / utility links.
	 *
	 * @return array<int, array{label:string,url:string}>
	 */
	public static function get_bottom_links() {
		$items = array(
			array(
				'label' => __( 'Privacy Policy', 'akaza-header-footer' ),
				'url'   => '/privacy-policy/',
			),
			array(
				'label'    => __( 'Trust Center', 'akaza-header-footer' ),
				'url'      => 'https://trust.succeedtech.com/',
				'external' => true,
			),
			array(
				'label' => __( 'Terms And Conditions', 'akaza-header-footer' ),
				'url'   => self::path_from_page_id_footer( 12, '/terms-and-conditions/' ),
			),
			array(
				'label' => __( 'S-PhishReport', 'akaza-header-footer' ),
				'url'   => self::path_from_page_id_footer( 54608, '/s-phishreport/' ),
			),
		);

		return apply_filters( 'ahf_footer_bottom_links', $items );
	}

	/**
	 * @param int    $page_id Page ID.
	 * @param string $fallback Fallback path.
	 * @return string
	 */
	private static function path_from_page_id_footer( $page_id, $fallback ) {
		if ( class_exists( 'AHF_Menu_Items' ) ) {
			return AHF_Menu_Items::path_from_page_id( $page_id, $fallback );
		}
		return $fallback;
	}

	/**
	 * Social profile links.
	 *
	 * @return array<int, array{label:string,url:string,icon:string,external?:bool,image?:array{width:int,height:int,src:string,alt:string}}>
	 */
	public static function get_social_links() {
		$items = array(
			array(
				'label'    => __( 'LinkedIn', 'akaza-header-footer' ),
				'url'      => 'https://www.linkedin.com/company/succeed-technologies/',
				'icon'     => 'linkedin',
				'external' => true,
			),
		);

		return apply_filters( 'ahf_footer_social_links', $items );
	}

	/**
	 * Certification badge images.
	 *
	 * @return array<int, array{src:string,alt:string,width:int,height:int}>
	 */
	public static function get_cert_badges() {
		$items = array(
			array(
				'src'    => 'https://succeedlearn.com/wp-content/uploads/2026/03/GDPR.webp',
				'alt'    => __( 'GDPR', 'akaza-header-footer' ),
				'width'  => 96,
				'height' => 96,
			),
			array(
				'src'    => 'https://succeedlearn.com/wp-content/uploads/2026/03/ISO-27001.webp',
				'alt'    => __( 'ISO 27001', 'akaza-header-footer' ),
				'width'  => 96,
				'height' => 96,
			),
			array(
				'src'    => 'https://succeedlearn.com/wp-content/uploads/2026/03/Soc-2.webp',
				'alt'    => __( 'SOC 2', 'akaza-header-footer' ),
				'width'  => 96,
				'height' => 96,
			),
		);

		return apply_filters( 'ahf_footer_cert_badges', $items );
	}

	/**
	 * Contact block data.
	 *
	 * @return array{email:string,fixed_phone:array{url:string,text:string},shuffled_phones:array<int,array{url:string,text:string}>}
	 */
	public static function get_contact() {
		$config = AHF_Config::get();

		return array(
			'email'           => (string) ( $config['contact']['email'] ?? 'sales@succeedtech.com' ),
			'fixed_phone'     => array(
				'url'  => '',
				'text' => '',
			),
			'shuffled_phones' => array(),
		);
	}

	/**
	 * Shuffled phone numbers for footer display.
	 *
	 * @param int $count Number of phones to return.
	 * @return array<int, array{url:string,text:string}>
	 */
	public static function get_shuffled_phones( $count = 2 ) {
		$phones = array();

		if ( class_exists( '\ElearnPOSH\AMP\Plugin' ) ) {
			$plugin = \ElearnPOSH\AMP\Plugin::get_instance();
			if ( $plugin && method_exists( $plugin, 'get_config' ) ) {
				$amp_config = $plugin->get_config();
				if ( $amp_config && method_exists( $amp_config, 'get_shuffled_phones' ) ) {
					$phones = $amp_config->get_shuffled_phones( $count );
				}
			}
		}

		if ( empty( $phones ) ) {
			$pool = array(
				array( 'url' => 'tel:+919740576761', 'text' => '+91-97405 76761' ),
				array( 'url' => 'tel:+918660448654', 'text' => '+91-86604 48654' ),
				array( 'url' => 'tel:+918431810625', 'text' => '+91-84318 10625' ),
				array( 'url' => 'tel:+916362021778', 'text' => '+91-63620 21778' ),
			);
			shuffle( $pool );
			$phones = array_slice( $pool, 0, $count );
		}

		return apply_filters( 'ahf_footer_shuffled_phones', $phones, $count );
	}

	/**
	 * Inline SVG for a social icon key.
	 *
	 * @param string $icon Icon key.
	 */
	public static function get_social_svg( $icon ) {
		$svgs = array(
			'linkedin'  => '<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false"><path fill="#fff" d="M20.45 20.45h-3.55v-5.57c0-1.33-.02-3.04-1.85-3.04-1.85 0-2.13 1.45-2.13 2.94v5.67H9.35V9h3.41v1.56h.05c.48-.9 1.64-1.85 3.37-1.85 3.6 0 4.27 2.37 4.27 5.45v6.29zM5.34 7.43a2.06 2.06 0 1 1 0-4.13 2.06 2.06 0 0 1 0 4.13zm1.78 13.02H3.56V9h3.56v11.45zM22.22 0H1.77C.79 0 0 .77 0 1.73v20.54C0 23.23.79 24 1.77 24h20.45c.98 0 1.78-.77 1.78-1.73V1.73C24 .77 23.2 0 22.22 0z"/></svg>',
			'youtube'   => '<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false"><path fill="#fff" d="M23.5 6.19a3.02 3.02 0 0 0-2.12-2.14C19.5 3.55 12 3.55 12 3.55s-7.5 0-9.38.5A3.02 3.02 0 0 0 .5 6.2C0 8.07 0 12 0 12s0 3.93.5 5.81a3.02 3.02 0 0 0 2.12 2.14c1.88.5 9.38.5 9.38.5s7.5 0 9.38-.5a3.02 3.02 0 0 0 2.12-2.14c.5-1.88.5-5.81.5-5.81s0-3.93-.5-5.81zM9.55 15.57V8.43L15.82 12l-6.27 3.57z"/></svg>',
			'twitter'   => '<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false"><path fill="#fff" d="M18.24 2.25h3.31l-7.23 8.26L23 21.75h-6.66l-5.21-6.82-5.97 6.82H1.85l7.73-8.84L1.25 2.25h6.83l4.71 6.23 5.45-6.23zm-1.16 17.52h1.83L7.08 4.13H5.12l11.96 15.64z"/></svg>',
			'instagram' => '<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false"><path fill="#fff" d="M12 2.16c3.2 0 3.58.01 4.85.07 3.25.15 4.77 1.69 4.92 4.92.06 1.27.07 1.65.07 4.85 0 3.21-.01 3.58-.07 4.85-.15 3.23-1.66 4.77-4.92 4.92-1.27.06-1.64.07-4.85.07-3.2 0-3.58-.01-4.85-.07-3.26-.15-4.77-1.7-4.92-4.92-.06-1.27-.07-1.64-.07-4.85 0-3.2.01-3.58.07-4.85.15-3.23 1.66-4.77 4.92-4.92 1.27-.06 1.65-.07 4.85-.07zM12 0C8.74 0 8.33.01 7.05.07 2.7.27.27 2.69.07 7.05.01 8.33 0 8.74 0 12s.01 3.67.07 4.95c.2 4.36 2.62 6.78 6.98 6.98 1.28.06 1.69.07 4.95.07s3.67-.01 4.95-.07c4.35-.2 6.78-2.62 6.98-6.98.06-1.28.07-1.69.07-4.95s-.01-3.67-.07-4.95C23.74 2.69 21.31.27 16.95.07 15.67.01 15.26 0 12 0zm0 5.84a6.16 6.16 0 1 0 0 12.32 6.16 6.16 0 0 0 0-12.32zM12 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm6.41-11.85a1.44 1.44 0 1 0 0 2.88 1.44 1.44 0 0 0 0-2.88z"/></svg>',
			'facebook'  => '<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false"><path fill="#fff" d="M24 12.07C24 5.44 18.63.07 12 .07S0 5.44 0 12.07c0 5.99 4.39 10.95 10.13 11.86v-8.39H7.08v-3.47h3.05V9.43c0-3 1.79-4.67 4.53-4.67 1.31 0 2.69.24 2.69.24v2.95h-1.52c-1.49 0-1.96.93-1.96 1.88v2.25h3.33l-.53 3.47h-2.8v8.39C19.61 23.02 24 18.06 24 12.07z"/></svg>',
		);

		return $svgs[ $icon ] ?? '';
	}

	/**
	 * @param string $path Menu path.
	 */
	public static function link_url( $path ) {
		return AHF_Config::menu_url( $path );
	}

	/**
	 * Relative path for Terms and Conditions.
	 */
	private static function get_terms_menu_path() {
		if ( function_exists( 'posh_get_terms_page_url' ) ) {
			return AHF_Menu_Items::absolute_url_to_menu_path( posh_get_terms_page_url() );
		}

		return '/terms-and-conditions/';
	}

	/**
	 * Relative path for Privacy Policy.
	 */
	private static function get_privacy_menu_path() {
		if ( function_exists( 'posh_get_privacy_policy_page_url' ) ) {
			return AHF_Menu_Items::absolute_url_to_menu_path( posh_get_privacy_policy_page_url() );
		}

		return '/privacy-policy/';
	}

	/**
	 * Relative path for FAQs.
	 */
	private static function get_faqs_menu_path() {
		if ( function_exists( 'posh_get_faqs_page_url' ) ) {
			return AHF_Menu_Items::absolute_url_to_menu_path( posh_get_faqs_page_url() );
		}

		return '/elearnposh-frequently-asked-questions-faqs/';
	}

	/**
	 * Relative path for Sitemap.
	 */
	private static function get_sitemap_menu_path() {
		if ( function_exists( 'posh_get_sitemap_page_url' ) ) {
			return AHF_Menu_Items::absolute_url_to_menu_path( posh_get_sitemap_page_url() );
		}

		return '/site-map/';
	}
}
