<?php
/**
 * Configuration Management Class
 *
 * @package ElearnPOSH\AMP
 */

namespace ElearnPOSH\AMP;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Config Class - Manages all plugin configuration
 */
class Config {

	/** Fallback ERP key when class-erpnext.php was not deployed. */
	const FALLBACK_ERP_API_KEY = 'OWM2ZDc2MmI2ZWQ1MWM3OmYwMzEyNDViMDU3NjNjOA==';

	/**
	 * Plugin settings
	 *
	 * @var array
	 */
	private $settings;

	/**
	 * Default ERP API key (safe when ERPNext class file is missing).
	 *
	 * @return string
	 */
	private static function default_erp_api_key() {
		return class_exists( __NAMESPACE__ . '\\ERPNext' ) ? ERPNext::DEFAULT_API_KEY : self::FALLBACK_ERP_API_KEY;
	}

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->load_settings();
	}

	/**
	 * Load settings from database
	 */
	private function load_settings() {
		$defaults = array(
			'version' => ELEARNPOSH_AMP_VERSION,
			'newsletter_page_id' => 18121,
			'blog_page_id' => 17993,
			'home_page_id' => 0,
			'contact_page_id' => 49,
			'thankyou_page_id' => 0,
			'terms_page_id' => 16356,
			'faq_page_id' => 0,
			'privacy_page_id' => 0,
			'press_media_page_id' => 6980,
			'enterprise_features_page_id' => 7689,
			'our_webinars_page_id' => 11438,
			'posh_act_page_id'     => 8301,
			'posh_compliance_audit_page_id' => 0,
			
			// Legacy fallback only — do NOT list pages with dedicated AMP templates here.
			'excluded_page_ids' => array(),
			
			// Course page IDs
			'course_page_ids' => array( 66, 42, 5390, 8100, 8244, 15159, 15820 ),
			'global_course_page_ids' => array( 93, 91 ),
			
			// Newsletter category
			'newsletter_category' => 'newsletter',
			
			// Contact emails
			'contact_emails' => array(
				'sales@succeedtech.com',
			),
			
			// Phone numbers (shuffled for display)
			'phone_numbers' => array(
				array( 'url' => 'tel:+919740576761', 'text' => '+91-97405 76761' ),
				array( 'url' => 'tel:+918660448654', 'text' => '+91-86604 48654' ),
				array( 'url' => 'tel:+918431810625', 'text' => '+91-84318 10625' ),
				array( 'url' => 'tel:+916362021778', 'text' => '+91-63620 21778' ),
				array( 'url' => 'tel:+917019012446', 'text' => '+91-70190 12446' ),
			),
			
			// Enable/disable features
			'enable_custom_css' => true,
			'custom_css' => '',

			// ERPNext Integration (production intranet).
			'erpnext_api_url' => 'https://intranet.succeedtech.com/api/resource/Lead',
			'erpnext_api_key' => self::default_erp_api_key(),
			
			// Email Configuration (legacy contact-func-mail recipient list).
			'contact_email_recipients' => Email::get_default_admin_recipients(),
			'contact_user_email_brochure_url' => 'https://elearnposh.com/eLearnPOSH-Brochure-2026.pdf',
		);

		$this->settings = wp_parse_args( get_option( 'elearnposh_amp_settings', array() ), $defaults );
		$this->settings = $this->normalize_page_id_settings( $this->settings, $defaults );
		$this->settings = $this->normalize_excluded_page_ids( $this->settings );

		// ── Webinar Banner ─────────────────────────────────────────────────────
		// Stored in a separate option so saving the banner page never overwrites
		// the main plugin settings and vice versa.
		$banner_defaults = array(
			'webinar_banner_enabled'             => false,
			'webinar_banner_text'                => '',
			'webinar_banner_primary_btn_text'    => '',
			'webinar_banner_primary_btn_url'     => '',
			'webinar_banner_secondary_btn_text'  => '',
			'webinar_banner_secondary_btn_url'   => '',
			'webinar_banner_bg_color'            => '#002a38',
			'webinar_banner_primary_btn_color'   => '#fa8b05',
			'webinar_banner_secondary_btn_color' => '#1a6b8a',
			// Page IDs where the banner should never appear
			'webinar_banner_excluded_ids'        => array( 21597 ),
			// WhatsApp CTA settings
			'whatsapp_cta_enabled'               => false,
			'whatsapp_cta_phone'                 => '919036837674',
			'whatsapp_cta_message'               => 'Hi, I am interested in eLearnPOSH courses',
		);

		$banner_settings = wp_parse_args(
			get_option( 'elearnposh_amp_banner_settings', array() ),
			$banner_defaults
		);

		// Merge banner settings into the unified $this->settings so all
		// components can use $config->get('webinar_banner_*') as before.
		foreach ( $banner_settings as $key => $value ) {
			$this->settings[ $key ] = $value;
		}
	}

	/**
	 * Get a setting value
	 *
	 * @param string $key Setting key.
	 * @param mixed  $default Default value if not found.
	 * @return mixed Setting value.
	 */
	public function get( $key, $default = null ) {
		if ( 'erpnext_api_url' === $key && defined( 'ELEARNPOSH_ERP_API_URL' ) && ELEARNPOSH_ERP_API_URL ) {
			return (string) ELEARNPOSH_ERP_API_URL;
		}
		if ( 'erpnext_api_key' === $key && defined( 'ELEARNPOSH_ERP_API_KEY' ) && ELEARNPOSH_ERP_API_KEY ) {
			return (string) ELEARNPOSH_ERP_API_KEY;
		}

		if ( in_array( $key, array( 'erpnext_api_url', 'erpnext_api_key' ), true ) && function_exists( 'elearnposh_erp_settings_option' ) ) {
			$erp_admin = elearnposh_erp_settings_option();
			if ( 'erpnext_api_url' === $key && '' !== $erp_admin['api_url'] ) {
				return $erp_admin['api_url'];
			}
			if ( 'erpnext_api_key' === $key && '' !== $erp_admin['api_key'] ) {
				return $erp_admin['api_key'];
			}
		}

		return isset( $this->settings[ $key ] ) ? $this->settings[ $key ] : $default;
	}

	/**
	 * Set a setting value
	 *
	 * @param string $key Setting key.
	 * @param mixed  $value Setting value.
	 */
	public function set( $key, $value ) {
		$this->settings[ $key ] = $value;
	}

	/**
	 * Save settings to database
	 *
	 * @return bool Whether the update was successful.
	 */
	public function save() {
		return update_option( 'elearnposh_amp_settings', $this->settings );
	}

	/**
	 * Get all settings
	 *
	 * @return array All settings.
	 */
	public function get_all() {
		return $this->settings;
	}

	/** Production page IDs for newer custom AMP landing pages. */
	const PRESS_MEDIA_PAGE_ID           = 6980;
	const ENTERPRISE_FEATURES_PAGE_ID   = 7689;
	const OUR_WEBINARS_PAGE_ID           = 11438;
	const POSH_WEBINAR_IC_PAGE_ID        = 21597;

	/**
	 * Page ID option keys — empty/zero saved values fall back to defaults.
	 *
	 * @return array<string>
	 */
	private function get_page_id_option_keys() {
		return array(
			'newsletter_page_id',
			'blog_page_id',
			'home_page_id',
			'contact_page_id',
			'thankyou_page_id',
			'terms_page_id',
			'faq_page_id',
			'privacy_page_id',
			'press_media_page_id',
			'enterprise_features_page_id',
			'our_webinars_page_id',
			'posh_act_page_id',
			'posh_compliance_audit_page_id',
		);
	}

	/**
	 * Replace zero/empty page IDs from saved options with plugin defaults.
	 *
	 * @param array $settings Merged settings.
	 * @param array $defaults Default settings.
	 * @return array
	 */
	private function normalize_page_id_settings( $settings, $defaults ) {
		foreach ( $this->get_page_id_option_keys() as $key ) {
			if ( empty( $settings[ $key ] ) && ! empty( $defaults[ $key ] ) ) {
				$settings[ $key ] = $defaults[ $key ];
			}
		}
		return $settings;
	}

	/**
	 * Pages with dedicated AMP templates must not use the legacy webinar.php fallback.
	 *
	 * @param array $settings Plugin settings.
	 * @return array
	 */
	private function normalize_excluded_page_ids( $settings ) {
		if ( empty( $settings['excluded_page_ids'] ) || ! is_array( $settings['excluded_page_ids'] ) ) {
			return $settings;
		}

		$protected_ids = array( self::POSH_WEBINAR_IC_PAGE_ID );
		$settings['excluded_page_ids'] = array_values( array_filter(
			array_map( 'absint', $settings['excluded_page_ids'] ),
			static function ( $id ) use ( $protected_ids ) {
				return ! in_array( $id, $protected_ids, true );
			}
		) );

		return $settings;
	}

	/**
	 * Central AMP page map (ID + slug → template). Single source for routing.
	 *
	 * @return array<string, array{settings_key?:string,default_id:int,slugs:array,template:string}>
	 */
	public static function get_amp_page_map() {
		return array(
			'newsletter-list'       => array(
				'settings_key' => 'newsletter_page_id',
				'default_id'   => 18121,
				'slugs'        => array(),
				'template'     => 'pages/newsletter-list',
			),
			'blog-list'             => array(
				'settings_key' => 'blog_page_id',
				'default_id'   => 17993,
				'slugs'        => array(),
				'template'     => 'pages/blog-list',
			),
			'contact'               => array(
				'settings_key' => 'contact_page_id',
				'default_id'   => 49,
				'slugs'        => array( 'contact-us', 'contact' ),
				'template'     => 'pages/contact',
			),
			'thankyou'              => array(
				'settings_key' => 'thankyou_page_id',
				'default_id'   => 0,
				'slugs'        => array( 'thankyou', 'thank-you' ),
				'template'     => 'pages/thankyou',
			),
			'terms-conditions'      => array(
				'settings_key' => 'terms_page_id',
				'default_id'   => 16356,
				'slugs'        => array( 'terms-and-conditions', 'terms-conditions' ),
				'template'     => 'pages/terms-conditions',
			),
			'faq'                   => array(
				'settings_key' => 'faq_page_id',
				'default_id'   => 0,
				'slugs'        => array(
					'elearnposh-frequently-asked-questions-faqs',
					'frequently-asked-questions',
					'faq',
				),
				'template'     => 'pages/faq',
			),
			'privacy-policy'        => array(
				'settings_key' => 'privacy_page_id',
				'default_id'   => 0,
				'slugs'        => array( 'privacy-policy' ),
				'template'     => 'pages/privacy-policy',
			),
			'about-us'              => array(
				'default_id' => 0,
				'slugs'    => array( 'about-us' ),
				'template' => 'pages/about-us',
			),
			'press-media'           => array(
				'settings_key' => 'press_media_page_id',
				'default_id'   => 6980,
				'slugs'        => array( 'press-media', 'press' ), // Theme mobile menu uses /press/.
				'template'     => 'pages/press-media',
			),
			'enterprise-features'   => array(
				'settings_key' => 'enterprise_features_page_id',
				'default_id'   => 7689,
				'slugs'        => array( 'enterprise-features' ),
				'template'     => 'pages/enterprise-features',
			),
			'our-webinars'          => array(
				'settings_key' => 'our_webinars_page_id',
				'default_id'   => self::OUR_WEBINARS_PAGE_ID,
				'slugs'        => array( 'our-webinars', 'webinars' ),
				'template'     => 'pages/our-webinars',
			),
			'clients-list'          => array(
				'default_id' => 23486,
				'slugs'    => array( 'clients', 'clients-list' ),
				'template' => 'pages/clients-list',
			),
			'gallery'               => array(
				'default_id' => 23542,
				'slugs'    => array( 'gallery' ),
				'template' => 'pages/gallery',
			),
			'posh-act'              => array(
				'settings_key' => 'posh_act_page_id',
				'default_id'   => 8301,
				'slugs'        => array( 'posh-act', 'poshact' ),
				'templates'    => array( 'poshact.php' ),
				'template'     => 'pages/posh-act',
			),
			'she-box'               => array(
				'settings_key' => 'she_box_page_id',
				'default_id'   => 0,
				'slugs'        => array( 'she-box' ),
				'template'     => 'pages/she-box',
			),
			'posh-compliance-audit' => array(
				'settings_key' => 'posh_compliance_audit_page_id',
				'default_id'   => 0,
				'slugs'        => array( 'posh-compliance-audit', 'audit' ),
				'templates'    => array( 'page-posh-compliance-audit.php' ),
				'template'     => 'pages/posh-compliance-audit',
			),
			'posh-annual-webinar-for-ic-members' => array(
				'settings_key' => 'posh_annual_webinar_ic_page_id',
				'default_id'   => self::POSH_WEBINAR_IC_PAGE_ID,
				'slugs'        => array( 'posh-annual-webinar-for-ic-members', 'purchase-confirmation' ),
				'template'     => 'pages/posh-annual-webinar-for-ic-members',
			),
			'posh-ic-webinar' => array(
				'settings_key' => 'posh_ic_webinar_page_id',
				'default_id'   => 0,
				'slugs'        => array( 'posh-webinar-for-ic-members' ),
				'template'     => 'pages/posh-ic-webinar',
			),
			'posh-compliance-essentials-webinar' => array(
				'settings_key' => 'posh_compliance_essentials_webinar_page_id',
				'default_id'   => 0,
				'slugs'        => array( 'posh-compliance-essentials-webinar' ),
				'template'     => 'pages/posh-compliance-essentials-webinar',
			),
			'site-map'              => array(
				'default_id' => 0,
				'slugs'      => array( 'site-map', 'sitemap' ),
				'template'   => 'pages/site-map',
			),
		);
	}

	/**
	 * Pages that always use the theme (non-AMP) view — not in the AMP page map.
	 *
	 * @return array<string>
	 */
	public static function get_non_amp_page_slugs() {
		return array(
			'sitemap-page',
			'html-sitemap',
		);
	}

	/**
	 * Whether a page should skip plugin AMP templates and mobile AMP redirect.
	 *
	 * @param int    $post_id   Post ID.
	 * @param string $post_slug Optional slug.
	 * @return bool
	 */
	public function is_non_amp_page( $post_id = 0, $post_slug = '' ) {
		if ( ! $post_slug && $post_id ) {
			$post = get_post( $post_id );
			$post_slug = ( $post && isset( $post->post_name ) ) ? $post->post_name : '';
		}
		if ( $post_slug && in_array( $post_slug, self::get_non_amp_page_slugs(), true ) ) {
			return true;
		}
		return false;
	}

	/**
	 * All page IDs used by the AMP page map (for AMPforWP allow-list).
	 *
	 * @return array<int>
	 */
	public function get_all_mapped_page_ids() {
		$ids = array();
		foreach ( self::get_amp_page_map() as $map_key => $definition ) {
			foreach ( $this->get_definition_page_ids( $definition ) as $id ) {
				if ( $id > 0 ) {
					$ids[] = $id;
				}
			}
			$resolved = $this->resolve_page_id_by_map_key( $map_key );
			if ( $resolved > 0 ) {
				$ids[] = $resolved;
			}
		}
		return array_values( array_unique( array_map( 'absint', $ids ) ) );
	}

	/**
	 * Resolve configured + default IDs for one map entry.
	 *
	 * @param array $definition Map entry.
	 * @return array<int>
	 */
	private function get_definition_page_ids( $definition ) {
		$ids = array();
		if ( ! empty( $definition['default_id'] ) ) {
			$ids[] = absint( $definition['default_id'] );
		}
		if ( ! empty( $definition['settings_key'] ) ) {
			$configured = absint( $this->get( $definition['settings_key'], $definition['default_id'] ) );
			if ( $configured > 0 ) {
				$ids[] = $configured;
			}
		}
		return array_values( array_unique( array_filter( $ids ) ) );
	}

	/**
	 * Whether a post matches one AMP page map entry.
	 *
	 * @param array  $definition Map entry.
	 * @param int    $post_id    Post ID.
	 * @param string $post_slug  Post slug.
	 * @return bool
	 */
	public function matches_amp_page_definition( $definition, $post_id, $post_slug = '' ) {
		$post_id = absint( $post_id );
		if ( $post_id && in_array( $post_id, $this->get_definition_page_ids( $definition ), true ) ) {
			return true;
		}
		if ( $post_id && ! empty( $definition['templates'] ) ) {
			$template = get_post_meta( $post_id, '_wp_page_template', true );
			if ( $template && in_array( $template, (array) $definition['templates'], true ) ) {
				return true;
			}
		}
		if ( $post_slug && ! empty( $definition['slugs'] ) && in_array( $post_slug, $definition['slugs'], true ) ) {
			return true;
		}
		if ( $post_id && ! empty( $definition['slugs'] ) ) {
			$post = get_post( $post_id );
			if ( $post && in_array( $post->post_name, $definition['slugs'], true ) ) {
				return true;
			}
		}
		return false;
	}

	/**
	 * Template path segment for a post (e.g. pages/press-media), or empty string.
	 *
	 * @param int    $post_id   Post ID.
	 * @param string $post_slug Optional slug.
	 * @return string
	 */
	public function get_amp_template_for_post( $post_id, $post_slug = '' ) {
		if ( ! $post_slug && $post_id ) {
			$post = get_post( $post_id );
			$post_slug = ( $post && isset( $post->post_name ) ) ? $post->post_name : '';
		}
		foreach ( self::get_amp_page_map() as $definition ) {
			if ( $this->matches_amp_page_definition( $definition, $post_id, $post_slug ) ) {
				return $definition['template'];
			}
		}
		return '';
	}

	/**
	 * Resolve the real page ID on this site (slug lookup when production IDs differ on staging/demo).
	 *
	 * @param string $map_key Key from get_amp_page_map() (e.g. press-media).
	 * @return int Post ID or 0.
	 */
	public function resolve_page_id_by_map_key( $map_key ) {
		$map = self::get_amp_page_map();
		if ( ! isset( $map[ $map_key ] ) ) {
			return 0;
		}

		$definition = $map[ $map_key ];

		if ( ! empty( $definition['templates'] ) ) {
			foreach ( (array) $definition['templates'] as $tpl ) {
				$pages = get_pages(
					array(
						'meta_key'    => '_wp_page_template',
						'meta_value'  => $tpl,
						'number'      => 1,
						'post_status' => 'publish',
					)
				);
				if ( ! empty( $pages ) ) {
					return absint( $pages[0]->ID );
				}
			}
		}

		$slugs = isset( $definition['slugs'] ) ? (array) $definition['slugs'] : array();

		foreach ( $slugs as $slug ) {
			$page = get_page_by_path( $slug );
			if ( $page && ! is_wp_error( $page ) && 'publish' === get_post_status( $page ) ) {
				return absint( $page->ID );
			}
		}

		foreach ( $this->get_definition_page_ids( $definition ) as $id ) {
			if ( $id > 0 && get_post_status( $id ) ) {
				return absint( $id );
			}
		}

		return 0;
	}

	/**
	 * Whether the post uses a custom AMP page template from the map.
	 *
	 * @param int $post_id Post ID.
	 * @return bool
	 */
	public function is_amp_mapped_page( $post_id = 0 ) {
		if ( ! $post_id ) {
			$post_id = get_the_ID();
		}
		return '' !== $this->get_amp_template_for_post( $post_id );
	}

	/**
	 * @param string $map_key Map key from get_amp_page_map().
	 * @param int    $post_id Post ID.
	 * @return bool
	 */
	private function matches_amp_page_map_key( $map_key, $post_id = 0 ) {
		$map = self::get_amp_page_map();
		if ( ! isset( $map[ $map_key ] ) ) {
			return false;
		}
		if ( ! $post_id ) {
			$post_id = get_the_ID();
		}
		$post_slug = '';
		if ( $post_id ) {
			$post = get_post( $post_id );
			$post_slug = ( $post && isset( $post->post_name ) ) ? $post->post_name : '';
		}
		return $this->matches_amp_page_definition( $map[ $map_key ], $post_id, $post_slug );
	}

	/**
	 * Check if current post is newsletter page
	 *
	 * @param int $post_id Post ID.
	 * @return bool
	 */
	public function is_newsletter_page( $post_id = 0 ) {
		return $this->matches_amp_page_map_key( 'newsletter-list', $post_id );
	}

	/**
	 * Check if current post is blog page
	 *
	 * @param int $post_id Post ID.
	 * @return bool
	 */
	public function is_blog_page( $post_id = 0 ) {
		return $this->matches_amp_page_map_key( 'blog-list', $post_id );
	}

	/**
	 * Check if current post is a course page
	 *
	 * @param int $post_id Post ID.
	 * @return bool
	 */
	public function is_course_page( $post_id = 0 ) {
		if ( ! $post_id ) {
			$post_id = get_the_ID();
		}
		$course_ids = $this->get( 'course_page_ids', array() );
		return in_array( absint( $post_id ), array_map( 'absint', $course_ids ), true );
	}

	/**
	 * Check if current post is a global course page
	 *
	 * @param int $post_id Post ID.
	 * @return bool
	 */
	public function is_global_course_page( $post_id = 0 ) {
		if ( ! $post_id ) {
			$post_id = get_the_ID();
		}
		$global_course_ids = $this->get( 'global_course_page_ids', array() );
		return in_array( absint( $post_id ), array_map( 'absint', $global_course_ids ), true );
	}

	/**
	 * Check if current post is thank you page
	 *
	 * @param int $post_id Post ID.
	 * @return bool
	 */
	public function is_thankyou_page( $post_id = 0 ) {
		return $this->matches_amp_page_map_key( 'thankyou', $post_id );
	}

	/**
	 * Check if current post is contact page
	 *
	 * @param int $post_id Post ID.
	 * @return bool
	 */
	public function is_contact_page( $post_id = 0 ) {
		return $this->matches_amp_page_map_key( 'contact', $post_id );
	}

	/**
	 * Check if current post is terms page
	 *
	 * @param int $post_id Post ID.
	 * @return bool
	 */
	public function is_terms_page( $post_id = 0 ) {
		return $this->matches_amp_page_map_key( 'terms-conditions', $post_id );
	}

	/**
	 * Check if current post is press and media page
	 *
	 * @param int $post_id Post ID.
	 * @return bool
	 */
	public function is_press_media_page( $post_id = 0 ) {
		return $this->matches_amp_page_map_key( 'press-media', $post_id );
	}

	/**
	 * Check if current post is enterprise features page
	 *
	 * @param int $post_id Post ID.
	 * @return bool
	 */
	public function is_enterprise_features_page( $post_id = 0 ) {
		return $this->matches_amp_page_map_key( 'enterprise-features', $post_id );
	}

	/**
	 * Check if current post is our webinars page
	 *
	 * @param int $post_id Post ID.
	 * @return bool
	 */
	public function is_our_webinars_page( $post_id = 0 ) {
		return $this->matches_amp_page_map_key( 'our-webinars', $post_id );
	}

	/**
	 * Check if current post is the POSH Webinar for IC Members landing page.
	 *
	 * @param int    $post_id   Post ID.
	 * @param string $post_slug Optional slug when post object is unavailable.
	 * @return bool
	 */
	public function is_posh_annual_webinar_ic_page( $post_id = 0, $post_slug = '' ) {
		if ( $this->matches_amp_page_map_key( 'posh-annual-webinar-for-ic-members', $post_id ) ) {
			return true;
		}
		if ( ! $post_slug && $post_id ) {
			$post = get_post( $post_id );
			$post_slug = ( $post && isset( $post->post_name ) ) ? $post->post_name : '';
		}
		return in_array( $post_slug, array( 'posh-annual-webinar-for-ic-members', 'purchase-confirmation' ), true );
	}

	/**
	 * Check if current post is the POSH IC Webinar landing page.
	 *
	 * @param int    $post_id   Post ID.
	 * @param string $post_slug Optional slug when post object is unavailable.
	 * @return bool
	 */
	public function is_posh_ic_webinar_page( $post_id = 0, $post_slug = '' ) {
		if ( $this->matches_amp_page_map_key( 'posh-ic-webinar', $post_id ) ) {
			return true;
		}
		if ( ! $post_slug && $post_id ) {
			$post = get_post( $post_id );
			$post_slug = ( $post && isset( $post->post_name ) ) ? $post->post_name : '';
		}
		return 'posh-webinar-for-ic-members' === $post_slug;
	}

	/**
	 * @deprecated Use is_posh_annual_webinar_ic_page() or is_posh_ic_webinar_page().
	 */
	public function is_posh_webinar_ic_page( $post_id = 0, $post_slug = '' ) {
		return $this->is_posh_annual_webinar_ic_page( $post_id, $post_slug )
			|| $this->is_posh_ic_webinar_page( $post_id, $post_slug );
	}

	/**
	 * Check if current post is the POSH Compliance Essentials Webinar landing page.
	 *
	 * @param int    $post_id   Post ID.
	 * @param string $post_slug Optional slug when post object is unavailable.
	 * @return bool
	 */
	public function is_posh_compliance_essentials_webinar_page( $post_id = 0, $post_slug = '' ) {
		if ( $this->matches_amp_page_map_key( 'posh-compliance-essentials-webinar', $post_id ) ) {
			return true;
		}
		if ( ! $post_slug && $post_id ) {
			$post = get_post( $post_id );
			$post_slug = ( $post && isset( $post->post_name ) ) ? $post->post_name : '';
		}
		return 'posh-compliance-essentials-webinar' === $post_slug;
	}

	/**
	 * Check if current post is the POSH Act reference page.
	 *
	 * @param int $post_id Post ID.
	 * @return bool
	 */
	public function is_posh_act_page( $post_id = 0 ) {
		return $this->matches_amp_page_map_key( 'posh-act', $post_id );
	}

	/**
	 * Check if current post is the POSH Compliance Audit page.
	 *
	 * @param int $post_id Post ID.
	 * @return bool
	 */
	public function is_posh_compliance_audit_page( $post_id = 0 ) {
		return $this->matches_amp_page_map_key( 'posh-compliance-audit', $post_id );
	}

	/**
	 * Check if current post is the SHe-Box guide page.
	 *
	 * @param int $post_id Post ID.
	 * @return bool
	 */
	public function is_she_box_page( $post_id = 0 ) {
		return $this->matches_amp_page_map_key( 'she-box', $post_id );
	}

	/**
	 * Slug-only course/landing pages routed in Template_Manager.
	 *
	 * @return array<string>
	 */
	public function get_extra_course_template_slugs() {
		return array(
			'compliance-management-system',
			'posh-for-cms',
			'equality-and-diversity',
			'sexual-harassment-prevention-for-us',
			'purchase-confirmation',
			'posh-annual-webinar-for-ic-members',
			'posh-webinar-for-ic-members',
			'posh-ic-webinar',
			'posh-compliance-essentials-webinar',
			'posh-training-for-employees',
			'posh-for-employees',
			'posh-foundation',
			'posh-pro',
			'posh-training-for-managers',
		);
	}

	/**
	 * Whether the post uses any plugin custom AMP template (mapped, course, or slug-routed).
	 *
	 * @param int $post_id Post ID.
	 * @return bool
	 */
	public function is_plugin_custom_amp_page( $post_id = 0 ) {
		if ( ! $post_id ) {
			$post_id = get_the_ID();
		}
		if ( ! $post_id ) {
			return false;
		}
		if ( $this->is_non_amp_page( $post_id ) ) {
			return false;
		}
		if ( '' !== $this->get_amp_template_for_post( $post_id ) ) {
			return true;
		}
		if ( $this->is_course_page( $post_id ) || $this->is_global_course_page( $post_id ) ) {
			return true;
		}
		$post = get_post( $post_id );
		if ( $post && isset( $post->post_name ) && in_array( $post->post_name, $this->get_extra_course_template_slugs(), true ) ) {
			return true;
		}
		return false;
	}

	/**
	 * All page slugs used for path-based AMP redirect detection.
	 *
	 * @return array<string>
	 */
	public function get_plugin_amp_redirect_slugs() {
		$slugs = array();
		foreach ( self::get_amp_page_map() as $definition ) {
			if ( empty( $definition['slugs'] ) ) {
				continue;
			}
			foreach ( (array) $definition['slugs'] as $slug ) {
				$slugs[] = sanitize_title( $slug );
			}
		}
		foreach ( $this->get_extra_course_template_slugs() as $slug ) {
			$slugs[] = sanitize_title( $slug );
		}
		$nested_course_slugs = array(
			'posh-training-for-employees',
			'posh-for-employees',
			'posh-foundation',
			'posh-for-managers',
			'posh-training-for-managers',
			'posh-for-ic-members',
			'posh-for-higher-educational-institutions',
			'pocso-prevention-of-child-sexual-abuse',
			'unconscious-bias',
			'bias',
			'purchase-confirmation',
			'posh-annual-webinar-for-ic-members',
			'posh-webinar-for-ic-members',
		);
		$slugs = array_merge( $slugs, $nested_course_slugs );
		$slugs = array_values( array_unique( array_filter( $slugs ) ) );
		return array_values( array_diff( $slugs, self::get_non_amp_page_slugs() ) );
	}

	/**
	 * Post IDs that should always load plugin AMP templates.
	 *
	 * @return array<int>
	 */
	public function get_plugin_amp_page_ids() {
		$ids = $this->get_all_mapped_page_ids();
		$ids = array_merge(
			$ids,
			array_map( 'absint', (array) $this->get( 'course_page_ids', array() ) ),
			array_map( 'absint', (array) $this->get( 'global_course_page_ids', array() ) )
		);
		$home_id = absint( $this->get( 'home_page_id', 0 ) );
		if ( $home_id > 0 ) {
			$ids[] = $home_id;
		}
		foreach ( $this->get_extra_course_template_slugs() as $slug ) {
			$page = get_page_by_path( $slug );
			if ( ( ! $page || is_wp_error( $page ) ) && 'compliance-management-system' === $slug ) {
				$page = get_page_by_path( 'solutions/compliance-management-system' );
			}
			if ( $page && ! is_wp_error( $page ) ) {
				$ids[] = absint( $page->ID );
			}
		}
		$ids = array_values( array_unique( array_filter( array_map( 'absint', $ids ) ) ) );
		return array_values( array_filter(
			$ids,
			function ( $id ) {
				return ! $this->is_non_amp_page( $id );
			}
		) );
	}

	/**
	 * Map keys that may redirect to AMP on mobile/tablet (theme disables mobile AMP globally).
	 *
	 * @return array<string>
	 */
	public static function get_force_amp_redirect_map_keys() {
		return array_keys( self::get_amp_page_map() );
	}

	/**
	 * Custom AMP pages that require forced redirect (all mapped + course pages).
	 *
	 * @param int $post_id Post ID.
	 * @return bool
	 */
	public function is_new_custom_amp_page( $post_id = 0 ) {
		return $this->is_plugin_custom_amp_page( $post_id );
	}

	/**
	 * Page IDs for custom AMP pages that require forced redirect.
	 *
	 * @return array<int>
	 */
	public function get_new_custom_amp_page_ids() {
		return $this->get_plugin_amp_page_ids();
	}

	/**
	 * Get shuffled phone numbers for display
	 *
	 * @param int $count Number of phone numbers to return.
	 * @return array
	 */
	public function get_shuffled_phones( $count = 2 ) {
		$phones = $this->get( 'phone_numbers', array() );
		shuffle( $phones );
		return array_slice( $phones, 0, $count );
	}
}


