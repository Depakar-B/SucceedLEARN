<?php
/**
 * Shared navigation structure for desktop mega menu and mobile sidebar.
 *
 * @package Akaza_Header_Footer
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Central menu definitions (filterable).
 */
class AHF_Menu_Items {

	/**
	 * Display label for the HEI course menu item.
	 */
	public static function get_hei_menu_label() {
		return __( 'POSH Training for Higher Educational Institutions', 'akaza-header-footer' );
	}

	/**
	 * Display label for the POCSO course menu item.
	 */
	public static function get_pocso_menu_label() {
		return __( 'POCSO - Prevention of Child Sexual Abuse', 'akaza-header-footer' );
	}

	/**
	 * @return array<int, array{label:string,url:string}>
	 */
	public static function get_posh_courses() {
		$items = array_merge(
			self::get_posh_courses_core(),
			array(
				array(
					'label' => self::get_hei_menu_label(),
					'url'   => self::get_hei_menu_path(),
				),
				array(
					'label' => self::get_pocso_menu_label(),
					'url'   => self::get_pocso_menu_path(),
				),
			)
		);

		return apply_filters( 'ahf_posh_courses', $items );
	}

	/**
	 * Core POSH course links (flat).
	 *
	 * @return array<int, array{label:string,url:string}>
	 */
	public static function get_posh_courses_core() {
		$items = array(
			array(
				'label' => __( 'POSH Training for Employees', 'akaza-header-footer' ),
				'url'   => self::get_employees_menu_path(),
			),
			array(
				'label' => __( 'POSH Training for Managers', 'akaza-header-footer' ),
				'url'   => self::get_managers_menu_path(),
			),
			array(
				'label' => __( 'POSH Training for IC Members', 'akaza-header-footer' ),
				'url'   => self::get_ic_members_menu_path(),
			),
		);

		return apply_filters( 'ahf_posh_courses_core', $items );
	}

	/**
	 * POSH Courses column links for the desktop mega menu.
	 *
	 * @return array<int, array{label:string,url:string}>
	 */
	public static function get_posh_courses_mega_links() {
		return apply_filters( 'ahf_posh_courses_mega_links', self::get_posh_courses() );
	}

	/**
	 * Relative menu path for the Employees course page.
	 */
	public static function get_employees_menu_path() {
		if ( function_exists( 'posh_get_employees_page_url' ) ) {
			return self::absolute_url_to_menu_path( posh_get_employees_page_url() );
		}

		return '/solutions/posh-training-for-employees/';
	}

	/**
	 * Relative menu path for the Managers course page.
	 */
	public static function get_managers_menu_path() {
		if ( function_exists( 'posh_get_managers_page_url' ) ) {
			return self::absolute_url_to_menu_path( posh_get_managers_page_url() );
		}

		return '/solutions/posh-training-for-managers/';
	}

	/**
	 * Relative menu path for the IC Members course page.
	 */
	public static function get_ic_members_menu_path() {
		if ( function_exists( 'posh_get_ic_members_page_url' ) ) {
			return self::absolute_url_to_menu_path( posh_get_ic_members_page_url() );
		}

		return '/solutions/posh-training-for-ic-members/';
	}

	/**
	 * Relative menu path for the HEI course page.
	 */
	public static function get_hei_menu_path() {
		if ( function_exists( 'posh_get_hei_page_url' ) ) {
			return self::absolute_url_to_menu_path( posh_get_hei_page_url() );
		}

		return '/solutions/posh-for-higher-educational-institutions/';
	}

	/**
	 * Relative menu path for the POCSO course page.
	 */
	public static function get_pocso_menu_path() {
		if ( function_exists( 'posh_get_pocso_page_url' ) ) {
			return self::absolute_url_to_menu_path( posh_get_pocso_page_url() );
		}

		return '/solutions/pocso-prevention-of-child-sexual-abuse/';
	}

	/**
	 * Relative menu path for the Unconscious Bias course page.
	 */
	public static function get_unconscious_bias_menu_path() {
		if ( function_exists( 'posh_get_unconscious_bias_page_url' ) ) {
			return self::absolute_url_to_menu_path( posh_get_unconscious_bias_page_url() );
		}

		return '/solutions/unconscious-bias/';
	}

	/**
	 * Relative menu path for the US sexual harassment prevention course page.
	 */
	public static function get_sexual_harassment_us_menu_path() {
		if ( function_exists( 'posh_get_sexual_harassment_us_page_url' ) ) {
			return self::absolute_url_to_menu_path( posh_get_sexual_harassment_us_page_url() );
		}

		return '/solutions/sexual-harassment-prevention-for-us/';
	}

	/**
	 * Relative menu path for Equality, Diversity & Inclusion.
	 */
	public static function get_equality_diversity_menu_path() {
		if ( function_exists( 'posh_get_equality_diversity_page_url' ) ) {
			return self::absolute_url_to_menu_path( posh_get_equality_diversity_page_url() );
		}

		return '/equality-and-diversity/';
	}

	/**
	 * Relative menu path for the POSH Act page.
	 */
	public static function get_posh_act_menu_path() {
		if ( function_exists( 'elearnposh_get_posh_act_page_url' ) ) {
			return self::absolute_url_to_menu_path( elearnposh_get_posh_act_page_url() );
		}

		return '/posh-act/';
	}

	/**
	 * Relative menu path for Our Webinars.
	 */
	public static function get_our_webinars_menu_path() {
		if ( function_exists( 'posh_get_our_webinars_page_url' ) ) {
			return self::absolute_url_to_menu_path( posh_get_our_webinars_page_url() );
		}

		return '/our-webinars/';
	}

	/**
	 * Relative menu path for SHe-Box.
	 */
	public static function get_she_box_menu_path() {
		if ( function_exists( 'elearnposh_get_she_box_page_url' ) ) {
			return self::absolute_url_to_menu_path( elearnposh_get_she_box_page_url() );
		}

		return '/she-box/';
	}

	/**
	 * Relative menu path for FAQs.
	 */
	public static function get_faqs_menu_path() {
		if ( function_exists( 'posh_get_faqs_page_url' ) ) {
			return self::absolute_url_to_menu_path( posh_get_faqs_page_url() );
		}

		return '/elearnposh-frequently-asked-questions-faqs/';
	}

	/**
	 * Convert absolute URL to relative menu path (never includes /amp/).
	 *
	 * @param string $url Absolute or relative URL.
	 */
	public static function absolute_url_to_menu_path( $url ) {
		$path = wp_parse_url( $url, PHP_URL_PATH );
		$hash = wp_parse_url( $url, PHP_URL_FRAGMENT );

		if ( empty( $path ) ) {
			return '/';
		}

		$path = '/' . ltrim( (string) $path, '/' );

		// Subdirectory installs (e.g. /Succeedlearn): strip home path so
		// home_url( $path ) does not produce /Succeedlearn/Succeedlearn/...
		$home_path = wp_parse_url( home_url( '/' ), PHP_URL_PATH );
		if ( is_string( $home_path ) && '/' !== $home_path ) {
			$home_path = '/' . trim( $home_path, '/' );
			if ( 0 === strpos( $path, $home_path . '/' ) || $path === $home_path || $path === $home_path . '/' ) {
				$path = substr( $path, strlen( $home_path ) );
				$path = '/' . ltrim( (string) $path, '/' );
			}
		}

		$path = self::strip_amp_from_path( $path );

		if ( ! empty( $hash ) ) {
			$path .= '#' . $hash;
		}

		return $path;
	}

	/**
	 * Strip paired AMP endpoint from a path so desktop nav never links to /amp/.
	 *
	 * @param string $path URL path.
	 * @return string
	 */
	public static function strip_amp_from_path( $path ) {
		$path = (string) $path;
		if ( '' === $path ) {
			return '/';
		}

		$cleaned = preg_replace( '#/amp/?$#i', '/', $path );
		if ( ! is_string( $cleaned ) || '' === $cleaned ) {
			return '/';
		}

		return $cleaned;
	}

	/**
	 * @return array<int, array{label:string,url:string}>
	 */
	public static function get_global_courses() {
		$items = array(
			array(
				'label' => __( 'Unconscious Bias', 'akaza-header-footer' ),
				'url'   => self::get_unconscious_bias_menu_path(),
			),
			array(
				'label' => __( 'Equality, Diversity & Inclusion', 'akaza-header-footer' ),
				'url'   => self::get_equality_diversity_menu_path(),
			),
			array(
				'label' => __( 'Sexual Harassment Prevention for US', 'akaza-header-footer' ),
				'url'   => self::get_sexual_harassment_us_menu_path(),
			),
		);

		return apply_filters( 'ahf_global_courses', $items );
	}

	/**
	 * Relative menu path for the Compliance Management System page.
	 */
	public static function get_cms_menu_path() {
		if ( function_exists( 'posh_get_cms_page_url' ) ) {
			return self::absolute_url_to_menu_path( posh_get_cms_page_url() );
		}

		return '/solutions/compliance-management-system/';
	}

	/**
	 * Relative menu path for the Free POSH Audit page.
	 */
	public static function get_posh_audit_menu_path() {
		foreach ( array( 'posh-compliance-audit', 'audit' ) as $path ) {
			$page = get_page_by_path( $path );
			if ( $page && ! is_wp_error( $page ) ) {
				return self::absolute_url_to_menu_path( get_permalink( $page->ID ) );
			}
		}

		return '/posh-compliance-audit/';
	}

	/**
	 * @return array<int, array{label:string,url:string}>
	 */
	public static function get_important_resources() {
		$items = array(
			array(
				'label' => __( 'Free POSH Audit', 'akaza-header-footer' ),
				'url'   => self::get_posh_audit_menu_path(),
			),
			array(
				'label' => __( 'Complaint Management System', 'akaza-header-footer' ),
				'url'   => self::get_cms_menu_path(),
			),
			array(
				'label' => __( 'SHe-Box', 'akaza-header-footer' ),
				'url'   => self::get_she_box_menu_path(),
			),
			array(
				'label' => __( 'About Us', 'akaza-header-footer' ),
				'url'   => '/about-us/',
			),
			array(
				'label' => __( 'FAQ', 'akaza-header-footer' ),
				'url'   => self::get_faqs_menu_path(),
			),
		);

		return apply_filters( 'ahf_important_resources', $items );
	}

	/**
	 * @return array<int, array{label:string,url:string}>
	 */
	public static function get_resource_links() {
		$items = array(
			array(
				'label' => __( 'Blog', 'akaza-header-footer' ),
				'url'   => '/blog/',
			),
			array(
				'label' => __( 'Newsletter', 'akaza-header-footer' ),
				'url'   => '/newsletter/',
			),
			array(
				'label' => __( 'Media', 'akaza-header-footer' ),
				'url'   => '/press/',
			),
			array(
				'label' => __( 'Enterprise Features', 'akaza-header-footer' ),
				'url'   => '/enterprise-features/',
			),
		);

		return apply_filters( 'ahf_resource_links', $items );
	}

	/**
	 * SucceedLEARN By Solution links (shared by header mega + footer).
	 *
	 * @return array<int, array{label:string,url:string}>
	 */
	public static function get_succeedlearn_solutions() {
		$items = array(
			array(
				'label' => __( 'Security Awareness', 'akaza-header-footer' ),
				'url'   => self::path_from_page_id( 37337, '/security-awareness/' ),
			),
			array(
				'label' => __( 'HR Compliance Suite', 'akaza-header-footer' ),
				'url'   => self::path_from_page_id( 43515, '/hr-compliance-suite/' ),
			),
			array(
				'label' => __( 'Financial Crime Prevention', 'akaza-header-footer' ),
				'url'   => self::path_from_page_id( 50893, '/financial-crime-prevention/' ),
			),
			array(
				'label' => __( 'Workplace Health and Safety', 'akaza-header-footer' ),
				'url'   => self::path_from_page_id( 50712, '/workplace-health-and-safety/' ),
			),
			array(
				'label' => __( 'Code of Conduct', 'akaza-header-footer' ),
				'url'   => self::path_from_page_id( 51624, '/code-of-conduct/' ),
			),
			array(
				'label' => __( 'Private Equity and Venture Capital Suite', 'akaza-header-footer' ),
				'url'   => self::path_from_page_id( 50754, '/private-equity-and-venture-capital-suite/' ),
			),
			array(
				'label' => __( 'India ESG Awareness', 'akaza-header-footer' ),
				'url'   => self::path_from_page_id( 53448, '/india-esg-awareness/' ),
			),
		);

		return apply_filters( 'ahf_succeedlearn_solutions', $items );
	}

	/**
	 * Menu path from a page ID with fallback slug path.
	 *
	 * @param int    $page_id Page ID.
	 * @param string $fallback Fallback relative path.
	 * @return string
	 */
	public static function path_from_page_id( $page_id, $fallback ) {
		$page_id = absint( $page_id );
		if ( $page_id > 0 ) {
			$permalink = get_permalink( $page_id );
			if ( $permalink ) {
				return self::absolute_url_to_menu_path( $permalink );
			}
		}

		return $fallback;
	}

	/**
	 * Courses archive menu path.
	 *
	 * @return string
	 */
	public static function get_courses_menu_path() {
		if ( function_exists( 'learn_press_get_page_link' ) ) {
			$link = learn_press_get_page_link( 'courses' );
			if ( $link ) {
				return self::absolute_url_to_menu_path( $link );
			}
		}

		return self::path_from_page_id( 54398, '/courses/' );
	}

	/**
	 * Desktop navigation tree.
	 *
	 * @return array<int, array<string, mixed>>
	 */
	public static function get_desktop_items() {
		$items = array(
			array(
				'label' => __( 'By Solution', 'akaza-header-footer' ),
				'type'  => 'interactive_mega',
				'slug'  => 'solutions',
			),
			array(
				'label' => __( 'By Courses', 'akaza-header-footer' ),
				'url'   => self::get_courses_menu_path(),
			),
			array(
				'label' => __( 'Who We Are?', 'akaza-header-footer' ),
				'type'  => 'dropdown',
				'links' => array(
					array(
						'label' => __( 'About Us', 'akaza-header-footer' ),
						'url'   => self::path_from_page_id( 2901, '/about-us/' ),
					),
					array(
						'label' => __( 'Contact Us', 'akaza-header-footer' ),
						'url'   => self::path_from_page_id( 87, '/contact-us/' ),
					),
				),
			),
		);

		return apply_filters( 'ahf_desktop_menu_items', $items );
	}

	/**
	 * Mobile sidebar navigation tree.
	 *
	 * @return array<int, array<string, mixed>>
	 */
	public static function get_mobile_items() {
		$solution_children = array();

		if ( class_exists( 'AHF_Mega_Menu_Data' ) ) {
			foreach ( AHF_Mega_Menu_Data::get_mega_menu_tree() as $category ) {
				$course_children = array();

				foreach ( (array) ( $category['courses'] ?? array() ) as $course ) {
					$course_url = (string) ( $course['url'] ?? '' );
					if ( '' === $course_url ) {
						continue;
					}

					$course_children[] = array(
						'label' => (string) ( $course['label'] ?? '' ),
						'url'   => self::absolute_url_to_menu_path( $course_url ),
					);
				}

				if ( empty( $course_children ) ) {
					continue;
				}

				$solution_children[] = array(
					'label'         => (string) ( $category['label'] ?? '' ),
					'child_variant' => 'indent',
					'children'      => $course_children,
				);
			}
		}

		if ( empty( $solution_children ) ) {
			$solution_children = array_map(
				static function ( $link ) {
					return array(
						'label' => $link['label'],
						'url'   => $link['url'],
					);
				},
				self::get_succeedlearn_solutions()
			);
		}

		$items = array(
			array(
				'label'    => __( 'By Solution', 'akaza-header-footer' ),
				'variant'  => 'flat',
				'children' => $solution_children,
			),
			array(
				'label' => __( 'By Courses', 'akaza-header-footer' ),
				'url'   => self::get_courses_menu_path(),
			),
			array(
				'label'    => __( 'Who We Are?', 'akaza-header-footer' ),
				'variant'  => 'indent',
				'children' => array(
					array(
						'label' => __( 'About Us', 'akaza-header-footer' ),
						'url'   => self::path_from_page_id( 2901, '/about-us/' ),
					),
					array(
						'label' => __( 'Contact Us', 'akaza-header-footer' ),
						'url'   => self::path_from_page_id( 87, '/contact-us/' ),
					),
				),
			),
		);

		return apply_filters( 'ahf_mobile_menu_items', $items );
	}

	/**
	 * Whether a nested menu tree contains the active page.
	 *
	 * @param array<int, array<string, mixed>> $items Menu items.
	 */
	public static function item_tree_has_active( $items ) {
		foreach ( $items as $item ) {
			if ( ! empty( $item['url'] ) && AHF_Config::is_menu_url_active( $item['url'] ) ) {
				return true;
			}

			if ( ! empty( $item['children'] ) && self::item_tree_has_active( $item['children'] ) ) {
				return true;
			}
		}

		return false;
	}

	/**
	 * Whether a flat link list contains the active page.
	 *
	 * @param array<int, array{label:string,url:string}> $links Menu links.
	 */
	public static function links_have_active( $links ) {
		foreach ( $links as $link ) {
			if ( AHF_Config::is_menu_url_active( $link['url'] ?? '' ) ) {
				return true;
			}
		}

		return false;
	}

	/**
	 * Whether a mega menu section contains the active page.
	 *
	 * @param array<int, array<string, mixed>> $rows Mega rows.
	 */
	public static function mega_has_active_child( $rows ) {
		if ( empty( $rows ) ) {
			return false;
		}

		foreach ( $rows as $row ) {
			if ( empty( $row['links'] ) ) {
				continue;
			}

			foreach ( $row['links'] as $link ) {
				if ( self::link_item_has_active( $link ) ) {
					return true;
				}
			}
		}

		return false;
	}

	/**
	 * Whether a flat or grouped mega link item is active.
	 *
	 * @param array<string, mixed> $link Link or grouped link item.
	 */
	public static function link_item_has_active( $link ) {
		if ( ! empty( $link['url'] ) && AHF_Config::is_menu_url_active( $link['url'] ) ) {
			return true;
		}

		if ( empty( $link['children'] ) ) {
			return false;
		}

		foreach ( $link['children'] as $child ) {
			if ( AHF_Config::is_menu_url_active( $child['url'] ?? '' ) ) {
				return true;
			}
		}

		return false;
	}

	/**
	 * Link class list with optional active state.
	 *
	 * @param string $base_class Base class names.
	 * @param string $path       Menu path.
	 */
	public static function menu_link_class( $base_class, $path ) {
		$classes = array_filter( array_map( 'trim', explode( ' ', (string) $base_class ) ) );

		if ( AHF_Config::is_menu_url_active( $path ) ) {
			$classes[] = 'is-active';
		}

		return implode( ' ', $classes );
	}

	/**
	 * aria-current attribute when link is active.
	 *
	 * @param string $path Menu path.
	 */
	public static function menu_link_current_attr( $path ) {
		return AHF_Config::is_menu_url_active( $path ) ? ' aria-current="page"' : '';
	}

	/**
	 * Render nested mobile menu list.
	 *
	 * @param array<int, array<string, mixed>> $items   Menu items.
	 * @param int                              $depth   Nesting depth.
	 * @param string                           $variant flat|indent child link style.
	 */
	public static function render_list( $items, $depth = 0, $variant = 'flat' ) {
		if ( empty( $items ) ) {
			return;
		}

		printf(
			'<ul class="epsh-mobile-nav-list" data-depth="%1$d" data-variant="%2$s">',
			(int) $depth,
			esc_attr( $variant )
		);

		foreach ( $items as $item ) {
			$has_children  = ! empty( $item['children'] );
			$child_variant = isset( $item['child_variant'] ) ? (string) $item['child_variant'] : ( isset( $item['variant'] ) ? (string) $item['variant'] : $variant );
			$li_class      = $has_children ? 'epsh-has-submenu' : '';

			if ( $has_children && self::item_tree_has_active( $item['children'] ) ) {
				$li_class .= ' is-active';
			}

			echo '<li class="' . esc_attr( trim( $li_class ) ) . '">';

			if ( $has_children ) {
				printf(
					'<button type="button" class="epsh-submenu-toggle" aria-expanded="false"><span class="epsh-menu-label">%1$s</span><span class="epsh-arrow-icon" aria-hidden="true">&#9654;</span></button>',
					esc_html( $item['label'] )
				);
				self::render_list( $item['children'], $depth + 1, $child_variant );
			} else {
				$item_path  = $item['url'] ?? '#';
				$link_class = self::menu_link_class( 'indent' === $variant ? 'epsh-menu-link epsh-menu-link--indent' : 'epsh-menu-link', $item_path );
				printf(
					'<a class="%1$s" href="%2$s"%3$s>%4$s</a>',
					esc_attr( $link_class ),
					esc_url( AHF_Config::menu_url( $item_path ) ),
					self::menu_link_current_attr( $item_path ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					esc_html( $item['label'] )
				);
			}

			echo '</li>';
		}

		echo '</ul>';
	}
}
