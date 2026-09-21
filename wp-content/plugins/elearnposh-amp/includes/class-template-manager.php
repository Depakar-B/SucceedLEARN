<?php
/**
 * Template Manager Class
 *
 * @package ElearnPOSH\AMP
 */

namespace ElearnPOSH\AMP;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Template Manager - Handles all AMP template routing and rendering
 */
class Template_Manager {
	/**
	 * Config instance
	 *
	 * @var Config
	 */
	private $config;

	/**
	 * Constructor
	 *
	 * @param Config $config Config instance.
	 */
	public function __construct( Config $config ) {
		$this->config = $config;
	}

	/**
	 * Initialize template manager
	 */
	public function init() {
		add_action( 'plugins_loaded', array( $this, 'register_template_overrides' ), 20 );
		add_action( 'amp_post_template_css', array( $this, 'add_custom_styles' ), 11 );
	}

	/**
	 * Register template file overrides
	 */
	public function register_template_overrides() {
		add_filter( 'amp_post_template_file', array( $this, 'override_header' ), 99, 2 );
		add_filter( 'amp_post_template_file', array( $this, 'override_footer' ), 99, 2 );
		add_filter( 'amp_post_template_file', array( $this, 'override_template' ), 99, 3 );
	}

	/**
	 * Override header template
	 *
	 * @param string $file Template file path.
	 * @param string $type Template type.
	 * @return string Modified file path.
	 */
	public function override_header( $file, $type ) {
		if ( 'header-bar' === $type ) {
			$custom_file = ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/header-bar.php';
			if ( file_exists( $custom_file ) ) {
				return $custom_file;
			}
		}
		return $file;
	}

	/**
	 * Override footer template
	 *
	 * @param string $file Template file path.
	 * @param string $type Template type.
	 * @return string Modified file path.
	 */
	public function override_footer( $file, $type ) {
		if ( 'footer' === $type ) {
			$custom_file = ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/footer.php';
			if ( file_exists( $custom_file ) ) {
				return $custom_file;
			}
		}
		return $file;
	}

	/**
	 * Override main content template based on post type and ID
	 *
	 * @param string   $file Template file path.
	 * @param string   $type Template type.
	 * @param \WP_Post $post Post object.
	 * @return string Modified file path.
	 */
	public function override_template( $file, $type, $post ) {
		if ( $post ) {
			$post_slug = isset( $post->post_name ) ? $post->post_name : '';

			// Compliance essentials webinar — before IC check and legacy webinar.php fallback.
			if ( $this->config->is_posh_compliance_essentials_webinar_page( $post->ID, $post_slug ) ) {
				return $this->get_template_path( 'pages/posh-compliance-essentials-webinar' );
			}

			if ( $this->config->is_posh_annual_webinar_ic_page( $post->ID, $post_slug ) ) {
				return $this->get_template_path( 'pages/posh-annual-webinar-for-ic-members' );
			}

			if ( $this->config->is_posh_ic_webinar_page( $post->ID, $post_slug ) ) {
				return $this->get_template_path( 'pages/posh-ic-webinar' );
			}

			// Legacy fallback for excluded pages without a dedicated AMP template.
			$excluded_ids = $this->config->get( 'excluded_page_ids', array() );
			if ( is_array( $excluded_ids ) && in_array( absint( $post->ID ), array_map( 'absint', $excluded_ids ), true ) ) {
				return $this->get_template_path( 'pages/webinar' );
			}
		}

		// Homepage — AMP uses template type "page" for a static front page, not only "single".
		if ( $this->is_home_amp_template_request( $type, $post ) ) {
			return $this->get_template_path( 'pages/home' );
		}

		// Archive pages
		if ( is_archive() && 'single' === $type ) {
			return $this->get_template_path( 'pages/archive' );
		}

		// If no post object, return default
		if ( ! $post ) {
			return $file;
		}

		$post_id   = $post->ID;
		$post_slug = isset( $post->post_name ) ? $post->post_name : '';

		// Theme-only pages (e.g. HTML sitemap) — never use plugin AMP templates.
		if ( $this->config->is_non_amp_page( $post_id, $post_slug ) ) {
			return $file;
		}

		// Newer custom AMP pages (same pattern as newsletter-list — explicit match first).
		if ( $this->config->is_press_media_page( $post_id ) ) {
			return $this->get_template_path( 'pages/press-media' );
		}
		if ( $this->config->is_enterprise_features_page( $post_id ) ) {
			return $this->get_template_path( 'pages/enterprise-features' );
		}
		if ( $this->config->is_our_webinars_page( $post_id ) ) {
			return $this->get_template_path( 'pages/our-webinars' );
		}
		if ( $this->config->is_posh_act_page( $post_id ) ) {
			return $this->get_template_path( 'pages/posh-act' );
		}
		if ( $this->config->is_posh_compliance_audit_page( $post_id ) || $this->post_has_posh_audit_shortcode( $post ) ) {
			return $this->get_template_path( 'pages/posh-compliance-audit' );
		}

		// Other custom AMP pages (newsletter, blog, contact, etc.).
		$mapped_template = $this->config->get_amp_template_for_post( $post_id, $post_slug );
		if ( $mapped_template ) {
			return $this->get_template_path( $mapped_template );
		}

		// Course pages - specific routing first (AMP uses type "single" or "page").
		if ( in_array( $type, array( 'single', 'page' ), true ) ) {
			// POSH for IC (Page ID 42)
			if ( 42 === absint( $post_id ) ) {
				return $this->get_template_path( 'pages/posh-for-ic' );
			}

			// POSH Training for Employees (POSH Foundation + POSH Pro — slug or production IDs).
			if ( in_array( $post_slug, array( 'posh-training-for-employees', 'posh-for-employees', 'posh-foundation', 'posh-pro' ), true )
				|| in_array( absint( $post_id ), array( 66, 15820 ), true ) ) {
				return $this->get_template_path( 'pages/posh-training-for-employees' );
			}

			// Unconscious Bias (Page ID 15159)
			if ( 15159 === absint( $post_id ) ) {
				return $this->get_template_path( 'pages/unconscious-bias' );
			}

			// POSH for Managers (Page ID 5390 or updated slug)
			if ( 5390 === absint( $post_id ) || in_array( $post_slug, array( 'posh-for-managers', 'posh-training-for-managers' ), true ) ) {
				return $this->get_template_path( 'pages/posh-for-managers' );
			}

			// POSH for HEI (Page ID 8100)
			if ( 8100 === absint( $post_id ) ) {
				return $this->get_template_path( 'pages/posh-for-hei' );
			}

			// POCSO (Page ID 8244)
			if ( 8244 === absint( $post_id ) ) {
				return $this->get_template_path( 'pages/pocso' );
			}

			// Compliance Management System landing page (legacy slug: posh-for-cms).
			if ( in_array( $post_slug, array( 'compliance-management-system', 'posh-for-cms' ), true ) ) {
				return $this->get_template_path( 'pages/posh-for-cms' );
			}

			// Equity & Diversity awareness page (slug based to avoid ID drift)
			if ( in_array( $post_slug, array( 'equality-and-diversity' ), true ) ) {
				return $this->get_template_path( 'pages/equity-diversity' );
			}

			// Sexual Harassment Prevention (US) landing page
			if ( in_array( $post_slug, array( 'sexual-harassment-prevention-for-us' ), true ) ) {
				return $this->get_template_path( 'pages/sexual-harassment-us' );
			}

			// Other course pages fallback to generic template
			if ( $this->config->is_course_page( $post_id ) ) {
				return $this->get_template_path( 'pages/single-course' );
			}

			if ( $this->config->is_global_course_page( $post_id ) ) {
				return $this->get_template_path( 'pages/global-course' );
			}
		}

		// Single newsletter post
		if ( $post->post_type === 'post' && has_category( $this->config->get( 'newsletter_category' ), $post ) ) {
			return $this->get_template_path( 'pages/single-newsletter' );
		}

		// Single blog post (not newsletter)
		if ( $post->post_type === 'post' && ! has_category( $this->config->get( 'newsletter_category' ), $post ) ) {
			return $this->get_template_path( 'pages/single-blog' );
		}

		return $file;
	}

	/**
	 * Whether post content includes the POSH audit shortcode.
	 *
	 * @param \WP_Post|null $post Post object.
	 * @return bool
	 */
	private function post_has_posh_audit_shortcode( $post ) {
		if ( ! $post || empty( $post->post_content ) ) {
			return false;
		}
		$content = (string) $post->post_content;
		return has_shortcode( $content, 'posh_compliance_audit' )
			|| has_shortcode( $content, 'posh_compliance_audit_amp' )
			|| false !== strpos( $content, '[posh_compliance_audit' );
	}

	/**
	 * Get template file path
	 *
	 * @param string $template_name Template name (without .php extension).
	 * @return string Full path to template file.
	 */
	private function get_template_path( $template_name ) {
		$file = ELEARNPOSH_AMP_TEMPLATES_DIR . $template_name . '.php';
		return file_exists( $file ) ? $file : '';
	}

	/**
	 * Add custom styles to AMP
	 */
	public function add_custom_styles() {
		global $redux_builder_amp;
		
		// Get custom CSS from config
		$custom_css = $this->config->get( 'custom_css', '' );
		
		// Load base styles
		$this->load_base_styles();
		
		// Load component styles
		$this->load_component_styles();
		
		// Add custom CSS if enabled
		if ( $this->config->get( 'enable_custom_css', true ) && ! empty( $custom_css ) ) {
			echo wp_strip_all_tags( $custom_css ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}

		// Add CSS from redux if available
		if ( isset( $redux_builder_amp['css_editor'] ) && ! empty( $redux_builder_amp['css_editor'] ) ) {
			echo wp_strip_all_tags( $redux_builder_amp['css_editor'] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}
	}

	/**
	 * Load base stylesheet
	 */
	private function load_base_styles() {
		$style_file = ELEARNPOSH_AMP_ASSETS_DIR . 'css/amp-base.css';
		if ( file_exists( $style_file ) ) {
			include $style_file;
		}
	}

	/**
	 * Load component styles from templates/styles/ (used by amp_post_template_css).
	 */
	private function load_component_styles() {
		$components = array( 'menu', 'breadcrumbs', 'footer', 'bottom-bar', 'demo-btn' );
		foreach ( $components as $component ) {
			$style_file = ELEARNPOSH_AMP_TEMPLATES_DIR . 'styles/' . $component . '.php';
			if ( ! file_exists( $style_file ) ) {
				continue;
			}
			ob_start();
			include $style_file;
			$file_css = ob_get_clean();
			$file_css = preg_replace( '/<\?php.*?\?>/s', '', $file_css );
			echo $file_css; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}
	}

	/**
	 * Whether the current AMP request should use the custom home template.
	 *
	 * @param string        $type Template type from AMP (e.g. single, page).
	 * @param \WP_Post|null $post Post object.
	 * @return bool
	 */
	private function is_home_amp_template_request( $type, $post ) {
		if ( ! in_array( $type, array( 'single', 'page' ), true ) ) {
			return false;
		}

		// Blog index as homepage (Settings → Reading → "Your latest posts").
		if ( is_home() && is_front_page() ) {
			return true;
		}

		// Static front page (AMP loads it as template type "page").
		if ( is_front_page() ) {
			return true;
		}

		// Fallback when conditional tags are not set yet but we have the front-page post.
		if ( $post && 'page' === get_option( 'show_on_front' ) ) {
			$front_page_id = absint( get_option( 'page_on_front' ) );
			if ( $front_page_id && $front_page_id === absint( $post->ID ) ) {
				return true;
			}
		}

		return false;
	}

	/**
	 * Get config instance
	 *
	 * @return Config
	 */
	public function get_config() {
		return $this->config;
	}
}


