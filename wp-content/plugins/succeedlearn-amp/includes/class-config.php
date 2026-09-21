<?php
/**
 * Configuration Management Class
 *
 * @package SucceedLEARN\AMP
 */

namespace SucceedLEARN\AMP;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Config Class — Phase 1: front page + form/ERP settings.
 */
class Config {

	/**
	 * Plugin settings.
	 *
	 * @var array
	 */
	private $settings;

	public function __construct() {
		$this->load_settings();
	}

	private function load_settings() {
		$defaults = array(
			'version'                         => SUCCEEDLEARN_AMP_VERSION,
			'home_page_id'                    => 0,
			'clients_page_id'                 => 0,
			'contact_page_id'                 => 0,
			'thankyou_page_id'                => 0,
			'blog_page_id'                    => 0,
			'newsletter_page_id'              => 0,
			'enable_custom_css'               => true,
			'custom_css'                      => '',
			'erpnext_api_url'                 => 'https://intranet.succeedtech.com/api/resource/Lead',
			'erpnext_api_key'                 => '',
			'contact_emails'                  => array( 'sales@succeedtech.com' ),
			'phone_numbers'                   => array(
				array( 'url' => 'tel:+919740576761', 'text' => '+91-97405 76761' ),
				array( 'url' => 'tel:+918660448654', 'text' => '+91-86604 48654' ),
			),
			'contact_email_recipients'        => class_exists( __NAMESPACE__ . '\\Email' )
				? Email::get_default_admin_recipients()
				: array( 'sales@succeedtech.com' ),
			'contact_user_email_brochure_url' => '',
		);

		$this->settings = wp_parse_args( get_option( 'succeedlearn_amp_settings', array() ), $defaults );
	}

	/**
	 * @param string $key Setting key.
	 * @param mixed  $default Default value.
	 * @return mixed
	 */
	public function get( $key, $default = null ) {
		if ( 'erpnext_api_url' === $key ) {
			if ( function_exists( 'scf_is_admin_email_test_mode' ) && scf_is_admin_email_test_mode() ) {
				if ( defined( 'SUCCEEDLEARN_ERP_UAT_API_URL' ) && SUCCEEDLEARN_ERP_UAT_API_URL ) {
					return (string) SUCCEEDLEARN_ERP_UAT_API_URL;
				}
				if ( class_exists( 'SCF_Contact_Form_Plugin' ) ) {
					return \SCF_Contact_Form_Plugin::ERP_UAT_API_URL;
				}
				return 'https://uaterp.succeedtech.com/api/resource/Lead';
			}
		}

		if ( 'erpnext_api_url' === $key && defined( 'SUCCEEDLEARN_ERP_API_URL' ) && SUCCEEDLEARN_ERP_API_URL ) {
			return (string) SUCCEEDLEARN_ERP_API_URL;
		}
		if ( 'erpnext_api_key' === $key && function_exists( 'scf_is_admin_email_test_mode' ) && scf_is_admin_email_test_mode() ) {
			if ( defined( 'SUCCEEDLEARN_ERP_UAT_API_KEY' ) && SUCCEEDLEARN_ERP_UAT_API_KEY ) {
				return (string) SUCCEEDLEARN_ERP_UAT_API_KEY;
			}
		}
		if ( 'erpnext_api_key' === $key && defined( 'SUCCEEDLEARN_ERP_API_KEY' ) && SUCCEEDLEARN_ERP_API_KEY ) {
			return (string) SUCCEEDLEARN_ERP_API_KEY;
		}

		return isset( $this->settings[ $key ] ) ? $this->settings[ $key ] : $default;
	}

	/**
	 * @param string $key Setting key.
	 * @param mixed  $value Value.
	 */
	public function set( $key, $value ) {
		$this->settings[ $key ] = $value;
	}

	/**
	 * @return bool
	 */
	public function save() {
		return update_option( 'succeedlearn_amp_settings', $this->settings );
	}

	/**
	 * @return array
	 */
	public function get_all() {
		return $this->settings;
	}

	/**
	 * AMP page map — templates served by this plugin.
	 *
	 * @return array<string, array{settings_key?:string,default_id:int,slugs:array,template:string}>
	 */
	public static function get_amp_page_map() {
		return array(
			'home'     => array(
				'settings_key' => 'home_page_id',
				'default_id'   => 0,
				'slugs'        => array(),
				'template'     => 'pages/home',
			),
			'clients'  => array(
				'settings_key' => 'clients_page_id',
				'default_id'   => 0,
				'slugs'        => array( 'clients', 'our-clients' ),
				'template'     => 'pages/clients',
			),
			'contact'  => array(
				'settings_key'   => 'contact_page_id',
				'default_id'     => 0,
				'slugs'          => array( 'contact-us', 'contact' ),
				'page_templates' => array( 'page-templates/page-contact.php' ),
				'template'       => 'pages/contact',
			),
			'thankyou' => array(
				'settings_key'   => 'thankyou_page_id',
				'default_id'     => 0,
				'slugs'          => array( 'thankyou', 'thank-you' ),
				'page_templates' => array( 'page-templates/thank-you.php' ),
				'template'       => 'pages/thankyou',
			),
			'about_us' => array(
				'default_id'     => 0,
				'slugs'          => array( 'about-us', 'about' ),
				'page_templates' => array( 'page-templates/page-about.php' ),
				'template'       => 'pages/about-us',
			),
			'blog'     => array(
				'settings_key' => 'blog_page_id',
				'default_id'   => 0,
				'slugs'        => array( 'blog', 'blogs' ),
				'template'     => 'pages/blog',
			),
			'newsletter' => array(
				'settings_key' => 'newsletter_page_id',
				'default_id'   => 0,
				'slugs'        => array( 'newsletter', 'newsletters' ),
				'template'     => 'pages/newsletter',
			),
			'privacy_policy' => array(
				'default_id'     => 0,
				'slugs'          => array( 'privacy-policy' ),
				'page_templates' => array( 'page-templates/privacy-policy.php' ),
				'template'       => 'pages/privacy',
			),
			'terms' => array(
				'default_id'     => 0,
				'slugs'          => array( 'terms-and-conditions', 'terms' ),
				'page_templates' => array( 'page-templates/terms-and-conditions.php' ),
				'template'       => 'pages/terms',
			),
			'sphish_report' => array(
				'default_id'     => 0,
				'slugs'          => array( 's-phish-report', 'sphish-report' ),
				'page_templates' => array( 'page-templates/s-phish-report.php' ),
				'template'       => 'pages/sphish-report',
			),
			'cookie_policy' => array(
				'default_id'     => 0,
				'slugs'          => array( 'cookie-policy', 'cookies' ),
				'page_templates' => array( 'page-templates/cookie-policy.php' ),
				'template'       => 'pages/cookie-policy',
			),
			'global_workplace_compliance' => array(
				'default_id'     => 0,
				'slugs'          => array(
					'global-workplace-compliance-training-for-employees',
				),
				'page_templates' => array( 'page-templates/global-workplace-compliance-training-for-employees.php' ),
				'template'       => 'pages/global-workplace-compliance-training-for-employees',
			),
			'defensive_driving' => array(
				'default_id'     => 0,
				'slugs'          => array(
					'defensive-driving',
					'online-defensive-driving-training',
				),
				'page_templates' => array( 'page-templates/defensive-driving.php' ),
				'template'       => 'pages/defensive-driving',
			),
			'security_awareness' => array(
				'default_id'     => 0,
				'slugs'          => array(
					'security-awareness',
					'security-awareness-and-phishing',
				),
				'page_templates' => array( 'page-templates/security-awareness-and-phishing.php' ),
				'template'       => 'pages/security-awareness',
			),
			'cybersecurity_awareness' => array(
				'default_id'     => 0,
				'slugs'          => array(
					'us-cyber-aware-october',
					'uk-cyber-aware-october',
				),
				'page_templates' => array(
					'page-templates/cybersecurity-awareness.php',
					'page-templates/cybersecurity-awareness-uk.php',
				),
				'template'       => 'pages/cybersecurity-awareness',
			),
			'infosec_2026_cyber' => array(
				'default_id'     => 0,
				'slugs'          => array(
					'infosec-cybersecurity-awareness',
					'infosec-cybersecurity-awareness/us',
					'infosec-cybersecurity-awareness/uk',
					'cybersecurity-awareness',
					'infosec-cybersecurity-awareness-month-2026',
					'infosec-2026-cyber',
					'infosec-2026',
				),
				'page_templates' => array(
					'page-templates/infosec-2026-cyber.php',
					'page-templates/infosec-2026-cyber-uk.php',
				),
				'template'       => 'pages/infosec-2026-cyber',
			),
			'hipaa' => array(
				'default_id'     => 0,
				'slugs'          => array( 'hipaa-annual-workforce-training' ),
				'page_templates' => array( 'page-templates/hipaa-annual-workforce-training.php' ),
				'template'       => 'pages/hipaa',
			),
			'financial_crime_prevention' => array(
				'default_id'     => 0,
				'slugs'          => array( 'financial-crime-prevention' ),
				'page_templates' => array( 'page-templates/financial-crime-prevention.php' ),
				'template'       => 'pages/financial-crime-prevention',
			),
			'code_of_conduct' => array(
				'default_id'     => 0,
				'slugs'          => array( 'code-of-conduct' ),
				'page_templates' => array( 'page-templates/code-of-conduct.php' ),
				'template'       => 'pages/code-of-conduct',
			),
			'dpdpa' => array(
				'default_id'     => 0,
				'slugs'          => array( 'dpdpa-compliance-training' ),
				'page_templates' => array( 'page-templates/dpdpa-compliance-training.php' ),
				'template'       => 'pages/dpdpa',
			),
			'inclusive_workplace_training' => array(
				'default_id'     => 0,
				'slugs'          => array( 'inclusive-workplace-training' ),
				'page_templates' => array( 'page-templates/inclusive-workplace-training.php' ),
				'template'       => 'pages/inclusive-workplace-training',
			),
			'gdpr' => array(
				'default_id'     => 0,
				'slugs'          => array( 'gdpr-employee-awareness-training' ),
				'page_templates' => array( 'page-templates/gdpr-employee-awareness-training.php' ),
				'template'       => 'pages/gdpr',
			),
			'ferpa' => array(
				'default_id'     => 0,
				'slugs'          => array( 'ferpa-training-for-school-and-university-staff' ),
				'page_templates' => array( 'page-templates/ferpa-training-for-school-and-university-staff.php' ),
				'template'       => 'pages/ferpa',
			),
			'whp' => array(
				'default_id'     => 0,
				'slugs'          => array( 'workplace-harassment-prevention-training' ),
				'page_templates' => array( 'page-templates/workplace-harassment-prevention-training.php' ),
				'template'       => 'pages/whp',
				'skip_amp'       => true,
			),
			'hr_compliance_suite' => array(
				'default_id'     => 0,
				'slugs'          => array( 'hr-compliance-suite' ),
				'page_templates' => array( 'page-templates/hr-compliance-suite.php' ),
				'template'       => 'pages/hr-compliance-suite',
				'skip_amp'       => true,
			),
			'workplace_health_and_safety' => array(
				'default_id'     => 0,
				'slugs'          => array( 'workplace-health-and-safety' ),
				'page_templates' => array( 'page-templates/workplace-health-and-safety.php' ),
				'template'       => 'pages/workplace-health-and-safety',
				'skip_amp'       => true,
			),
			'pevc' => array(
				'default_id'     => 0,
				'slugs'          => array( 'private-equity-and-venture-capital-suite' ),
				'page_templates' => array( 'page-templates/private-equity-and-venture-capital-suite.php' ),
				'template'       => 'pages/pevc',
				'skip_amp'       => true,
			),
			'india_esg' => array(
				'default_id'     => 0,
				'slugs'          => array( 'india-esg-awareness' ),
				'page_templates' => array( 'page-templates/india-esg-awareness.php' ),
				'template'       => 'pages/india-esg-awareness',
				'skip_amp'       => true,
			),
			'posh' => array(
				'default_id'     => 0,
				'slugs'          => array(
					'posh-fundamentals-india',
					'prevention-of-sexual-harassment-posh-fundamentals-india',
				),
				'page_templates' => array( 'page-templates/posh-fundamentals-india.php' ),
				'template'       => 'pages/posh',
				'skip_amp'       => true,
			),
			'courses'  => array(
				'default_id' => 0,
				'slugs'      => array( 'courses', 'course' ),
				'template'   => 'pages/courses',
			),
			'category' => array(
				'default_id' => 0,
				'slugs'      => array(),
				'template'   => 'pages/category',
			),
			'single_post' => array(
				'default_id' => 0,
				'slugs'      => array(),
				'template'   => 'pages/single-post',
			),
		);
	}

	/**
	 * Whether a mapped page type should skip AMP and use the normal theme.
	 *
	 * @param string $page_type Page type key from get_amp_page_map().
	 * @return bool
	 */
	public static function page_type_skips_amp( $page_type ) {
		if ( ! is_string( $page_type ) || '' === $page_type ) {
			return false;
		}

		$map = self::get_amp_page_map();
		return ! empty( $map[ $page_type ]['skip_amp'] );
	}

	/**
	 * Resolve AMP page type for a post ID / slug.
	 *
	 * @param int    $post_id Post ID.
	 * @param string $slug    Post slug.
	 * @return string Page type key or empty string.
	 */
	public function resolve_amp_page_type( $post_id = 0, $slug = '' ) {
		$post_id = absint( $post_id );
		$slug    = sanitize_title( (string) $slug );

		if ( $this->is_front_page_request( $post_id, $slug ) ) {
			return 'home';
		}

		if ( $this->is_category_archive_request() ) {
			return 'category';
		}

		if ( $this->is_courses_archive_request() ) {
			return 'courses';
		}

		if ( $this->is_newsletter_page_request( $post_id, $slug ) ) {
			return 'newsletter';
		}

		if ( $this->is_blog_page_request( $post_id, $slug ) ) {
			return 'blog';
		}

		// Prefer page-template matching for legal pages (reliable even when $post is incomplete).
		if ( function_exists( 'is_page_template' ) ) {
			foreach ( self::get_amp_page_map() as $type => $map ) {
				$templates = isset( $map['page_templates'] ) ? (array) $map['page_templates'] : array();
				foreach ( $templates as $page_template ) {
					if ( $page_template && is_page_template( $page_template ) ) {
						return $type;
					}
				}
			}
		}

		if ( function_exists( 'is_page' ) ) {
			foreach ( self::get_amp_page_map() as $type => $map ) {
				$slugs = isset( $map['slugs'] ) ? (array) $map['slugs'] : array();
				foreach ( $slugs as $page_slug ) {
					if ( $page_slug && is_page( $page_slug ) ) {
						return $type;
					}
				}
			}
		}

		if ( $this->is_single_post_request( $post_id ) ) {
			return 'single_post';
		}

		foreach ( self::get_amp_page_map() as $type => $map ) {
			if ( 'home' === $type ) {
				continue;
			}

			$settings_key = isset( $map['settings_key'] ) ? (string) $map['settings_key'] : '';
			if ( $settings_key && $post_id && absint( $this->get( $settings_key, 0 ) ) === $post_id ) {
				return $type;
			}

			$slugs = isset( $map['slugs'] ) ? (array) $map['slugs'] : array();
			if ( $slug && in_array( $slug, $slugs, true ) ) {
				return $type;
			}

			if ( $post_id ) {
				foreach ( $slugs as $page_slug ) {
					$page = get_page_by_path( $page_slug );
					if ( $page && absint( $page->ID ) === $post_id ) {
						return $type;
					}
				}
			}
		}

		return '';
	}

	/**
	 * Clients page permalink (canonical, non-AMP).
	 *
	 * @return string
	 */
	public function get_clients_url() {
		$page = $this->get_clients_page();
		if ( $page ) {
			$url = get_permalink( $page );
			if ( $url ) {
				return $url;
			}
		}

		return home_url( '/clients/' );
	}

	/**
	 * Published clients page, if one exists.
	 *
	 * @return \WP_Post|null
	 */
	public function get_clients_page() {
		$id = absint( $this->get( 'clients_page_id', 0 ) );
		if ( $id ) {
			$page = get_post( $id );
			if ( $page && 'page' === $page->post_type && 'publish' === $page->post_status ) {
				return $page;
			}
		}

		foreach ( array( 'clients', 'our-clients' ) as $slug ) {
			$page = get_page_by_path( $slug );
			if ( $page && 'publish' === $page->post_status ) {
				return $page;
			}
		}

		return null;
	}

	/**
	 * Whether a published clients page is available.
	 *
	 * @return bool
	 */
	public function has_clients_page() {
		return (bool) $this->get_clients_page();
	}

	/**
	 * Whether the current request is the site front page.
	 *
	 * @param int    $post_id Optional post ID.
	 * @param string $slug    Optional slug.
	 * @return bool
	 */
	public function is_front_page_request( $post_id = 0, $slug = '' ) {
		if ( $this->request_is_blog_listing_path() ) {
			return false;
		}

		// /amp/ is AMPforWP's homepage endpoint, but WP treats it as is_home() (posts).
		if ( $this->request_is_site_home_path() ) {
			return true;
		}

		if ( function_exists( 'is_home' ) && is_home() && function_exists( 'is_front_page' ) && ! is_front_page() ) {
			return false;
		}

		if ( function_exists( 'is_front_page' ) && is_front_page() ) {
			return true;
		}

		$front_id = absint( get_option( 'page_on_front' ) );
		if ( $front_id && $post_id && absint( $post_id ) === $front_id ) {
			return true;
		}

		$configured = absint( $this->get( 'home_page_id', 0 ) );
		if ( $configured && $post_id && absint( $post_id ) === $configured ) {
			return true;
		}

		return false;
	}

	/**
	 * Whether the current request is a blog category archive (not Newsletter).
	 *
	 * @return bool
	 */
	public function is_category_archive_request() {
		if ( function_exists( 'is_category' ) && is_category() ) {
			$term = get_queried_object();
			if ( $term instanceof \WP_Term ) {
				if ( function_exists( 'akaza_is_newsletter_term' ) && akaza_is_newsletter_term( $term ) ) {
					return false;
				}
				if ( in_array( $term->slug, array( 'newsletter', 'newsletters' ), true ) ) {
					return false;
				}
				if ( 0 === strcasecmp( (string) $term->name, 'Newsletter' ) ) {
					return false;
				}
				return true;
			}
		}

		return $this->request_is_category_archive_path();
	}

	/**
	 * Whether the request URI looks like a post category archive (optional /amp/).
	 *
	 * @return bool
	 */
	public function request_is_category_archive_path() {
		$uri  = isset( $_SERVER['REQUEST_URI'] ) ? (string) wp_unslash( $_SERVER['REQUEST_URI'] ) : '';
		$path = (string) wp_parse_url( $uri, PHP_URL_PATH );
		$path = untrailingslashit( strtolower( $path ) );

		if ( '' === $path ) {
			return false;
		}

		if ( ! preg_match( '#/category/([^/]+)(/amp)?(/page/\d+)?$#', $path, $matches ) ) {
			return false;
		}

		$slug = isset( $matches[1] ) ? sanitize_title( $matches[1] ) : '';
		if ( ! $slug || in_array( $slug, array( 'newsletter', 'newsletters' ), true ) ) {
			return false;
		}

		return true;
	}

	/**
	 * Whether the current request is the course archive listing.
	 *
	 * @return bool
	 */
	public function is_courses_archive_request() {
		if ( function_exists( 'akaza_is_courses_archive' ) && akaza_is_courses_archive() ) {
			return true;
		}

		if ( function_exists( 'is_post_type_archive' ) && ( is_post_type_archive( 'lp_course' ) || is_post_type_archive( 'course' ) ) ) {
			return true;
		}

		if ( function_exists( 'learn_press_is_courses' ) && learn_press_is_courses() ) {
			return true;
		}

		return $this->request_is_courses_archive_path();
	}

	/**
	 * Whether the request URI looks like a course archive (optional /amp/).
	 *
	 * @return bool
	 */
	public function request_is_courses_archive_path() {
		$uri  = isset( $_SERVER['REQUEST_URI'] ) ? (string) wp_unslash( $_SERVER['REQUEST_URI'] ) : '';
		$path = (string) wp_parse_url( $uri, PHP_URL_PATH );
		$path = untrailingslashit( strtolower( $path ) );

		if ( '' === $path ) {
			return false;
		}

		if ( preg_match( '#/(courses|course)(/amp)?(/page/\d+)?$#', $path ) ) {
			return true;
		}

		if ( preg_match( '#/(course-category|lp_course_category|course_category)/([^/]+)(/amp)?(/page/\d+)?$#', $path ) ) {
			return true;
		}

		return false;
	}

	/**
	 * Course archive permalink (canonical, non-AMP).
	 *
	 * @return string
	 */
	public function get_courses_url() {
		if ( function_exists( 'akaza_course_post_type' ) ) {
			$link = get_post_type_archive_link( akaza_course_post_type() );
			if ( $link ) {
				return $link;
			}
		}

		foreach ( array( 'lp_course', 'course' ) as $post_type ) {
			if ( post_type_exists( $post_type ) ) {
				$link = get_post_type_archive_link( $post_type );
				if ( $link ) {
					return $link;
				}
			}
		}

		return home_url( '/courses/' );
	}

	/**
	 * Whether the current request is the Newsletter listing page.
	 *
	 * @param int    $post_id Optional post ID.
	 * @param string $slug    Optional slug.
	 * @return bool
	 */
	public function is_newsletter_page_request( $post_id = 0, $slug = '' ) {
		$post_id = absint( $post_id );
		$slug    = sanitize_title( (string) $slug );

		if ( $this->request_is_newsletter_listing_path() ) {
			return true;
		}

		$configured = absint( $this->get( 'newsletter_page_id', 0 ) );
		if ( $configured && $post_id && $post_id === $configured ) {
			return true;
		}

		if ( $slug && in_array( $slug, array( 'newsletter', 'newsletters' ), true ) ) {
			return true;
		}

		if ( function_exists( 'is_page_template' ) && ( is_page_template( 'page-templates/newsletter.php' ) || is_page_template( 'newsletter.php' ) ) ) {
			return true;
		}

		if ( function_exists( 'is_page' ) && ( is_page( 'newsletter' ) || is_page( 'newsletters' ) ) ) {
			return true;
		}

		if ( function_exists( 'akaza_is_newsletter_page' ) && akaza_is_newsletter_page() ) {
			return true;
		}

		return false;
	}

	/**
	 * Newsletter listing permalink (canonical, non-AMP).
	 *
	 * @return string
	 */
	public function get_newsletter_url() {
		$id = absint( $this->get( 'newsletter_page_id', 0 ) );
		if ( $id ) {
			$url = get_permalink( $id );
			if ( $url ) {
				return $url;
			}
		}

		if ( function_exists( 'akaza_newsletter_listing_url' ) ) {
			$url = akaza_newsletter_listing_url();
			if ( $url ) {
				return $url;
			}
		}

		foreach ( array( 'newsletter', 'newsletters' ) as $page_slug ) {
			$page = get_page_by_path( $page_slug );
			if ( $page && 'publish' === $page->post_status ) {
				$url = get_permalink( $page );
				if ( $url ) {
					return $url;
				}
			}
		}

		return home_url( '/newsletter/' );
	}

	/**
	 * Whether the request URI is the newsletter listing (optional /amp/).
	 *
	 * @return bool
	 */
	public function request_is_newsletter_listing_path() {
		$uri  = isset( $_SERVER['REQUEST_URI'] ) ? (string) wp_unslash( $_SERVER['REQUEST_URI'] ) : '';
		$path = (string) wp_parse_url( $uri, PHP_URL_PATH );
		$path = untrailingslashit( strtolower( $path ) );

		if ( '' === $path ) {
			return false;
		}

		return (bool) preg_match( '#/(newsletter|newsletters)(/amp)?$#', $path );
	}

	/**
	 * Whether the current request is the blog listing (posts page).
	 *
	 * @param int    $post_id Optional post ID.
	 * @param string $slug    Optional slug.
	 * @return bool
	 */
	public function is_blog_page_request( $post_id = 0, $slug = '' ) {
		$post_id = absint( $post_id );
		$slug    = sanitize_title( (string) $slug );

		if ( $this->request_is_site_home_path() ) {
			return false;
		}

		if ( function_exists( 'is_home' ) && is_home() && function_exists( 'is_front_page' ) && ! is_front_page() ) {
			return true;
		}

		if ( $this->request_is_blog_listing_path() ) {
			return true;
		}

		$posts_page = absint( get_option( 'page_for_posts' ) );
		if ( $posts_page && $post_id && $post_id === $posts_page ) {
			return true;
		}

		$configured = absint( $this->get( 'blog_page_id', 0 ) );
		if ( $configured && $post_id && $post_id === $configured ) {
			return true;
		}

		if ( $slug && in_array( $slug, array( 'blog', 'blogs' ), true ) ) {
			return true;
		}

		if ( function_exists( 'is_page' ) && ( is_page( 'blog' ) || is_page( 'blogs' ) ) ) {
			return true;
		}

		return false;
	}

	/**
	 * Whether this is a blog/newsletter article (WP post).
	 *
	 * @param int $post_id Optional post ID.
	 * @return bool
	 */
	public function is_single_post_request( $post_id = 0 ) {
		if ( function_exists( 'is_singular' ) && is_singular( 'post' ) ) {
			return true;
		}

		$post_id = absint( $post_id );
		if ( ! $post_id ) {
			return false;
		}

		$post = get_post( $post_id );
		return $post && 'post' === $post->post_type;
	}

	/**
	 * Blog listing permalink (canonical, non-AMP).
	 *
	 * @return string
	 */
	public function get_blog_url() {
		$id = absint( $this->get( 'blog_page_id', 0 ) );
		if ( $id ) {
			$url = get_permalink( $id );
			if ( $url ) {
				return $url;
			}
		}

		$posts_page = absint( get_option( 'page_for_posts' ) );
		if ( $posts_page ) {
			$url = get_permalink( $posts_page );
			if ( $url ) {
				return $url;
			}
		}

		$page = get_page_by_path( 'blog' );
		if ( $page ) {
			return get_permalink( $page );
		}

		return home_url( '/blog/' );
	}

	/**
	 * Whether the request URI is the blog listing (not a single post under /blog/).
	 *
	 * @return bool
	 */
	public function request_is_blog_listing_path() {
		$uri  = isset( $_SERVER['REQUEST_URI'] ) ? (string) wp_unslash( $_SERVER['REQUEST_URI'] ) : '';
		$path = (string) wp_parse_url( $uri, PHP_URL_PATH );
		$path = untrailingslashit( strtolower( $path ) );

		if ( '' === $path ) {
			return false;
		}

		return (bool) preg_match( '#/(blog|blogs)(/amp)?$#', $path );
	}

	/**
	 * Whether the request is the site homepage or AMPforWP homepage /amp/ endpoint.
	 *
	 * @return bool
	 */
	public function request_is_site_home_path() {
		if ( $this->request_is_blog_listing_path() ) {
			return false;
		}

		$uri  = isset( $_SERVER['REQUEST_URI'] ) ? (string) wp_unslash( $_SERVER['REQUEST_URI'] ) : '';
		$path = (string) wp_parse_url( $uri, PHP_URL_PATH );
		$path = untrailingslashit( strtolower( $path ) );

		$home_path = (string) wp_parse_url( home_url( '/' ), PHP_URL_PATH );
		$home_path = untrailingslashit( strtolower( $home_path ) );

		if ( '' === $path || '/' === $path || $path === $home_path ) {
			return true;
		}

		$amp_path = untrailingslashit( $home_path . '/amp' );
		if ( $path === $amp_path || '/amp' === $path ) {
			return true;
		}

		return false;
	}

	/**
	 * Resolve thank-you URL for AMP form redirects.
	 *
	 * @return string
	 */
	public function get_thankyou_url() {
		$id = absint( $this->get( 'thankyou_page_id', 0 ) );
		if ( $id ) {
			$url = get_permalink( $id );
			if ( $url ) {
				return $url;
			}
		}

		$page = get_page_by_path( 'thankyou' );
		if ( ! $page ) {
			$page = get_page_by_path( 'thank-you' );
		}
		if ( $page ) {
			return get_permalink( $page );
		}

		return home_url( '/' );
	}

	/**
	 * Build AMP URL for a path or permalink.
	 *
	 * @param string $path Path or full URL.
	 * @return string
	 */
	public function amp_url( $path = '/' ) {
		if ( function_exists( 'succeedlearn_amp_url' ) ) {
			return succeedlearn_amp_url( $path );
		}

		$url = ( 0 === strpos( $path, 'http' ) ) ? $path : home_url( $path );
		return add_query_arg( 'amp', '1', $url );
	}
}
