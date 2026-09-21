<?php
/**
 * Main Plugin Class
 *
 * @package SucceedLEARN\AMP
 */

namespace SucceedLEARN\AMP;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Main Plugin Class
 */
class Plugin {

	/**
	 * @var Plugin|null
	 */
	private static $instance = null;

	/**
	 * @var Template_Manager
	 */
	private $template_manager;

	/**
	 * @var Config
	 */
	private $config;

	/**
	 * @var Admin
	 */
	private $admin;

	/**
	 * @var Performance_Optimizer
	 */
	private $performance_optimizer;

	/**
	 * @var Amp_Router
	 */
	private $amp_router;

	/**
	 * @var bool
	 */
	private $amp_output_buffer_started = false;

	/**
	 * @return Plugin
	 */
	public static function get_instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	private function __construct() {
		$this->config = new Config();
	}

	public function init() {
		if ( is_admin() ) {
			add_action( 'admin_notices', array( $this, 'maybe_ampforwp_missing_notice' ) );
		}

		$this->template_manager = new Template_Manager( $this->config );
		$this->template_manager->init();

		if ( class_exists( __NAMESPACE__ . '\\Amp_Router' ) ) {
			$this->amp_router = new Amp_Router( $this->config );
			$this->amp_router->init();
		}

		if ( is_admin() && class_exists( __NAMESPACE__ . '\\Admin' ) ) {
			$this->admin = new Admin( $this->config );
			$this->admin->init();
		}

		$this->performance_optimizer = Performance_Optimizer::get_instance();
		$this->performance_optimizer->init();
		$this->maybe_clear_stale_amp_css_cache();

		if ( class_exists( __NAMESPACE__ . '\\Form_Handler' ) ) {
			Form_Handler::init();
		}

		$this->remove_default_amp_actions();
		$this->register_hooks();

		add_action( 'init', array( $this, 'prevent_page_cache_for_logged_in_users' ), 0 );
		add_action( 'amp_post_template_footer', 'succeedlearn_amp_render_fixed_widgets', 5 );
	}

	private function maybe_clear_stale_amp_css_cache() {
		$stored = get_option( 'succeedlearn_amp_css_cache_version', '' );
		if ( (string) $stored === (string) SUCCEEDLEARN_AMP_VERSION ) {
			return;
		}
		$this->performance_optimizer->clear_cache();
		update_option( 'succeedlearn_amp_css_cache_version', SUCCEEDLEARN_AMP_VERSION, false );
	}

	private function remove_default_amp_actions() {
		add_action( 'pre_amp_render_post', array( $this, 'start_amp_output_buffer' ), 1 );
		add_action( 'pre_amp_render_post', array( $this, 'disable_w3tc_minify_for_amp' ), 1 );
		add_action( 'pre_amp_render_post', array( $this, 'prepare_custom_amp_page' ), 15 );
		add_action( 'template_redirect', array( $this, 'maybe_start_amp_output_buffer' ), 0 );
	}

	private function register_hooks() {
		add_action( 'amp_post_template_head', array( $this, 'add_preconnect_hints' ), 1 );
		add_action( 'wp', array( $this, 'register_amp_components' ) );
		add_filter( 'ampforwp_the_content_last_filter', array( $this, 'sanitize_amp_the_content' ), 20 );
		add_filter( 'ampforwp_the_content_last_filter', 'succeedlearn_amp_restore_custom_amp_css', 99 );
		add_filter( 'ampforwp_the_content_last_filter', 'succeedlearn_amp_reinforce_faq_accordion_css', 100 );
		add_filter( 'ampforwp_the_content_last_filter', 'succeedlearn_amp_reinforce_gdpr_risk_cards_css', 101 );
		add_filter( 'ampforwp_the_content_last_filter', 'succeedlearn_amp_reinforce_gwct_contact_direct_css', 102 );
		add_filter( 'ampforwp_the_content_last_filter', 'succeedlearn_amp_reinforce_coc_features_css', 103 );
		add_filter( 'ampforwp_the_content_last_filter', 'succeedlearn_amp_reinforce_card_grid_css', 104 );
		add_filter( 'the_content', array( $this, 'sanitize_amp_the_content' ), 20 );
		add_action( 'template_redirect', array( $this, 'prevent_duplicate_amp_canonicals' ), 5 );
		add_action( 'wp', array( $this, 'guard_amp_page_cache_for_logged_in_users' ), 0 );
		add_filter( 'ampforwp_tree_shaking_white_list_selector', array( $this, 'whitelist_home_css_for_tree_shaking' ) );
	}

	/**
	 * Strip AMPforWP default CSS injections on our AMP templates.
	 *
	 * @param int $post_id Post ID.
	 */
	public function prepare_custom_amp_page( $post_id = 0 ) {
		unset( $post_id );
		if ( ! $this->is_amp_request() ) {
			return;
		}
		remove_action( 'amp_post_template_css', 'ampforwp_head_css' );
		remove_all_actions( 'ampforwp_admin_menu_bar_front' );
		$this->disable_ampforwp_back_to_top();
		$this->prevent_duplicate_amp_canonicals();
	}

	/**
	 * Prefer SucceedLEARN scroll-to-top; hide AMPforWP’s gray .btt.
	 */
	private function disable_ampforwp_back_to_top() {
		global $redux_builder_amp;

		if ( is_array( $redux_builder_amp ) ) {
			$redux_builder_amp['ampforwp-footer-top'] = false;
		}

		remove_action( 'ampforwp_body_beginning', 'ampforwp_back_to_top_markup' );
	}

	/**
	 * Keep SucceedLEARN layout selectors when AMPforWP tree shaking runs.
	 *
	 * @param array $white_list Whitelist.
	 * @return array
	 */
	public function whitelist_home_css_for_tree_shaking( $white_list ) {
		$selectors = array(
			'.sl-home',
			'.sl-hero',
			'.sl-section',
			'.sl-wrap',
			'.sl-btn',
			'.sl-btn--primary',
			'.sl-btn--secondary',
			'.sl-btn--ghost',
			'.sl-btn.sl-btn--ghost',
			'.sl-hero-actions',
			'.sl-content-actions',
			'.sl-hero-btn',
			'.sl-content-btn',
			'.sl-hero-btn-primary',
			'.sl-hero-btn-secondary',
			'.sl-content-btn-primary',
			'.sl-content-btn-secondary',
			'.sl-panel-title',
			'.sl-highlight',
			'.sl-home-sub-heading',
			'.sl-h2',
			'.slf-breadcrumbs',
			'.slf-breadcrumbs--inline',
			'.slf-breadcrumbs__list',
			'.slf-breadcrumbs__item',
			'.slf-breadcrumbs__sep',
			'.slf-breadcrumbs__link',
			'.slf-breadcrumbs__current',
			'.amp-site-header',
			'.amp-site-header__logo',
			'.amp-site-header__toggle',
			'.sl-amp-landing-header',
			'.sl-amp-landing-header__inner',
			'.sl-amp-landing-header__logo',
			'.sl-amp-landing-header__cta',
			'.sl-amp-footer',
			'.sl-amp-sidebar',
			'.sl-amp-sidebar__top',
			'.sl-amp-sidebar__nav',
			'.sl-amp-sidebar__list',
			'.sl-amp-sidebar__item',
			'.sl-amp-sidebar__link',
			'.sl-amp-sidebar__accordion',
			'.sl-amp-sidebar__parent-title',
			'.sl-amp-sidebar__parent-label',
			'.sl-amp-sidebar__chevron',
			'.sl-amp-sidebar__chevron-right',
			'.sl-amp-sidebar__chevron-down',
			'.sl-amp-sidebar__children',
			'.sl-amp-sidebar__link--child',
			'.sl-amp-sidebar__footer',
			'.sl-amp-faq',
			'.sl-amp-faq__accordion',
			'.sl-amp-faq__item',
			'.sl-amp-faq__summary',
			'.sl-amp-faq__num',
			'.sl-amp-faq__q',
			'.sl-amp-faq__panel',
			'.sl-amp-faq__answer',
			'.sl-amp-card-grid',
			'.sl-amp-card-grid--1col',
			'.sl-gwct-page',
			'.sl-gwct-contact-direct',
			'.sl-gwct-contact-direct__label',
			'.sl-gwct-contact-direct__grid',
			'.sl-gwct-contact-direct__item',
			'.sl-gwct-contact-direct__icon',
			'.sl-gwct-contact-direct__body',
			'.sl-gwct-contact-direct__title',
			'.sl-gwct-contact-direct__value',
			'.sl-gwct-contact__whatsapp',
			'.sl-gwct-contact__whatsapp-icon',
			'.sl-gwct-contact__whatsapp-text',
			'.sl-gwct-contact__whatsapp-label',
			'.sl-gwct-contact__whatsapp-number',
			'.sl-amp-btn',
			'.slcf-form',
			'.sl-clients',
			'.sl-clients__grid',
			'.sl-clients__cell',
			'.sl-clients__cta',
			'.sl-clients__view-all',
			'.sl-clients__page-cta',
			'.sl-clients-page',
			'.sl-testimonials',
			'.sl-testimonials__grid',
			'.sl-testimonials__card',
			'.sl-testimonials__note',
			'.sl-card',
			'.sl-grid-2',
			'.sl-grid-3',
			'.sl-grid-4',
			'.sl-stats',
			'.sl-stat',
			'.sl-stat__value',
			'.sl-stat__label',
			'.sl-outcome-tags',
			'.sl-outcome-tag',
			'.sl-reality',
			'.sl-reality__grid',
			'.sl-reality__media',
			'.sl-reality__content',
			'.sl-scroll-top',
			'.sl-scroll-top-wrap',
			'.sl-scroll-top__icon',
			'#sl-scroll-top',
			'.sl-coc-page',

			'.sl-code-of-conduct-hero',
			'.sl-code-of-conduct-hero__breadcrumb',
			'.sl-code-of-conduct-hero__grid',
			'.sl-code-of-conduct-hero__content',
			'.sl-code-of-conduct-hero__highlight',
			'.sl-code-of-conduct-hero__lead',
			'.sl-code-of-conduct-hero__actions',
			'.sl-code-of-conduct-hero__button-icon',
			'.sl-code-of-conduct-hero__assessment',
			'.sl-code-of-conduct-hero__assessment-top',
			'.sl-code-of-conduct-hero__assessment-category',
			'.sl-code-of-conduct-hero__assessment-label',
			'.sl-code-of-conduct-hero__question',
			'.sl-code-of-conduct-hero__options',
			'.sl-code-of-conduct-hero__option',
			'.sl-code-of-conduct-hero__option-marker',
			'.sl-code-of-conduct-hero__option-text',
			'.sl-code-of-conduct-hero__feedback',
			'.sl-code-of-conduct-hero__feedback--success',
			'.sl-code-of-conduct-hero__feedback--retry',
			'.is-selected',
			'.is-correct',
			'.is-incorrect',
			'.sl-code-conduct-features',
			'.sl-code-conduct-features__heading',
			'.sl-code-conduct-features__grid',
			'.sl-code-conduct-features__card',
			'.sl-code-conduct-features__icon',
			'.sl-code-conduct-features__label',
			'.sl-code-conduct-definition',
			'.sl-code-conduct-definition__heading',
			'.sl-code-conduct-definition__lead',
			'.sl-code-conduct-definition__accent',
			'.sl-code-conduct-definition__layout',
			'.sl-code-conduct-definition__media',
			'.sl-code-conduct-definition__panels',
			'.sl-code-conduct-definition__panel',
			'.sl-code-conduct-definition__panel--navy',
			'.sl-code-conduct-definition__panel--flow',
			'.sl-code-conduct-definition__panel--approach',
			'.sl-code-conduct-definition__flow',
			'.sl-code-conduct-definition__flow-arrow',
			'.sl-code-conduct-definition__step',
			'.sl-code-conduct-definition__topics-intro',
			'.sl-code-conduct-definition__tags',
			'.sl-code-conduct-matters',
			'.sl-code-conduct-matters__heading',
			'.sl-code-conduct-matters__lead',
			'.sl-code-conduct-matters__layout',
			'.sl-code-conduct-matters__media',
			'.sl-code-conduct-matters__content',
			'.sl-code-conduct-matters__intro',
			'.sl-code-conduct-matters__list',
			'.sl-code-conduct-matters__list-item',
			'.sl-code-conduct-matters__list-index',
			'.sl-code-conduct-matters__question',
			'.sl-code-conduct-matters__gap',
			'.sl-code-conduct-matters__gap-eyebrow',
			'.sl-code-conduct-matters__gap-title',
			'.sl-code-conduct-matters__gap-text',
			'.sl-code-conduct-matters__gap-lead',
			'.sl-coc-problem',
			'.sl-coc-problem__heading',
			'.sl-coc-problem__grid',
			'.sl-coc-problem__card',
			'.sl-coc-problem__number',
			'.sl-coc-problem__card-title',
			'.sl-coc-problem__card-text',
			'.sl-coc-problem__close',
			'.sl-coc-problem__close-text',
			'.sl-coc-problem__close-actions',
			'.sl-coc-coverage',
			'.sl-coc-coverage__heading',
			'.sl-coc-coverage__grid',
			'.sl-coc-coverage__card',
			'.sl-coc-coverage__card-title',
			'.sl-coc-coverage__card-text',
			'.sl-coc-emerging-risks',
			'.sl-coc-emerging-risks__heading',
			'.sl-coc-emerging-risks__lead',
			'.sl-coc-emerging-risks__intro',
			'.sl-coc-emerging-risks__main',
			'.sl-coc-emerging-risks__image',
			'.sl-coc-emerging-risks__topics',
			'.sl-coc-emerging-risks__list',
			'.sl-coc-emerging-risks__list-item',
			'.sl-coc-emerging-risks__list-index',
			'.sl-coc-emerging-risks__list-label',
			'.sl-coc-emerging-risks__close',
			'.sl-coc-emerging-risks__close-example',
			'.sl-coc-emerging-risks__close-message',
			'.sl-coc-decision',
'.sl-coc-decision__heading',
'.sl-coc-decision__grid',
'.sl-coc-decision__card',
'.sl-coc-decision__card-top',
'.sl-coc-decision__number',
'.sl-coc-decision__description',
'.sl-coc-decision__card-title',
'.sl-coc-decision__section',
'.sl-coc-decision__section-label',
'.sl-coc-decision__section-text',
'.sl-coc-decision__question',
'.sl-coc-decision__feedback',
'.sl-coc-decision__feedback-text',
'.sl-coc-decision__close',
'.sl-coc-decision__close-text',
'.sl-coc-learning',
'.sl-coc-learning__heading',
'.sl-coc-learning__grid',
'.sl-coc-learning__card',
'.sl-coc-learning__card-heading',
'.sl-coc-learning__icon',
'.sl-coc-learning__card-title',
'.sl-coc-customization',
'.sl-coc-customization__heading',
'.sl-coc-customization__list-title',
'.sl-coc-customization__layout',
'.sl-coc-customization__list-box',
'.sl-coc-customization__list',
'.sl-coc-customization__list-item',
'.sl-coc-customization__list-index',
'.sl-coc-customization__list-label',
'.sl-coc-customization__media',
'.sl-coc-customization__close',
'.sl-coc-customization__close-text',
'.sl-coc-customization__actions',
'.sl-coc-deployment',
'.sl-coc-deployment__heading',
'.sl-coc-deployment__grid',
'.sl-coc-deployment__card',
'.sl-coc-deployment__eyebrow',
'.sl-coc-deployment__card-title',
'.sl-coc-deployment__features',
'.sl-coc-deployment__feature',
'.sl-coc-deployment__icon',
'.sl-coc-deployment__feature-label',
'.sl-coc-accessibility',
'.sl-coc-accessibility__heading',
'.sl-coc-accessibility__content',
'.sl-coc-accessibility__list-title',
'.sl-coc-accessibility__features',
'.sl-coc-accessibility__feature',
'.sl-coc-accessibility__feature-icon',
'.sl-coc-accessibility__feature-label',
'.sl-coc-accessibility__close',
'.sl-coc-accessibility__close-text',
'.sl-coc-reporting',
'.sl-coc-reporting__heading',
'.sl-coc-reporting__lead',
'.sl-coc-reporting__layout',
'.sl-coc-reporting__card',
'.sl-coc-reporting__list',
'.sl-coc-reporting__list-item',
'.sl-coc-reporting__list-index',
'.sl-coc-reporting__list-label',
'.sl-coc-reporting__media',
'.sl-coc-reporting__close',
'.sl-coc-reporting__close-text',
'.sl-coc-reporting__actions',
'.sl-coc-audience',
'.sl-coc-audience__heading',
'.sl-coc-audience__content',
'.sl-coc-audience__list-title',
'.sl-coc-audience__grid',
'.sl-coc-audience__card',
'.sl-coc-audience__card-title',
'.sl-coc-one-programme',
'.sl-coc-one-programme__heading',
'.sl-coc-one-programme__grid',
'.sl-coc-one-programme__card',
'.sl-coc-one-programme__card--featured',
'.sl-coc-one-programme__card-heading',
'.sl-coc-one-programme__icon',
'.sl-coc-one-programme__card-title',
'.sl-coc-industries',
'.sl-coc-industries__heading',
'.sl-coc-industries__lead',
'.sl-coc-industries__main',
'.sl-coc-industries__content',
'.sl-coc-industries__intro',
'.sl-coc-industries__list',
'.sl-coc-industries__item',
'.sl-coc-industries__item-index',
'.sl-coc-industries__item-label',
'.sl-coc-industries__image',
'.sl-coc-industries__image-placeholder',
'.sl-coc-industries__statement',
'.sl-coc-differentiation',
'.sl-coc-differentiation__heading',
'.sl-coc-differentiation__grid',
'.sl-coc-differentiation__card',
'.sl-coc-differentiation__card--featured',
'.sl-coc-differentiation__card-head',
'.sl-coc-differentiation__card-title',
'.sl-coc-differentiation__list',
'.sl-coc-differentiation__list-item',
'.sl-coc-differentiation__list-index',
'.sl-coc-differentiation__list-label',
'.sl-coc-differentiation__close',
'.sl-coc-differentiation__close-text',
'.sl-coc-differentiation__actions',
'.sl-coc-differentiation__button-text',
'.sl-coc-stats',
'.sl-coc-stats__heading',
'.sl-coc-stats__grid',
'.sl-coc-stats__item',
'.sl-coc-stats__value',
'.sl-coc-stats__label',
'.sl-coc-customer-story',
'.sl-coc-customer-story__heading',
'.sl-coc-customer-story__statement',
'.sl-coc-customer-story__grid',
'.sl-coc-customer-story__card',
'.sl-coc-customer-story__card--featured',
'.sl-coc-customer-story__number',
'.sl-coc-customer-story__card-title',
'.sl-coc-customer-story__action',
'.sl-coc-customer-story__button-text',
			'.sl-dpdpa-page',
			'.sl-dpdpa-hero',
			'.sl-dpdpa-hero__grid',
			'.sl-dpdpa-hero__copy',
			'.sl-dpdpa-hero__lede',
			'.sl-dpdpa-actions',
			'.sl-dpdpa-hero__fine',
			'.sl-dpdpa-hero__trust',
			'.sl-dpdpa-workday',
			'.sl-dpdpa-workday__top',
			'.sl-dpdpa-workday__label',
			'.sl-dpdpa-workday__live',
			'.sl-dpdpa-workday__clock',
			'.sl-dpdpa-workday__grid',
			'.sl-dpdpa-workday__count',
			'.sl-dpdpa-workday__num',
			'.sl-dpdpa-workday__sub',
			'.sl-dpdpa-workday__math',
			'.sl-dpdpa-workday__m',
			'.sl-dpdpa-workday__value',
			'.sl-dpdpa-workday__text',
			'.sl-dpdpa-workday__foot',
			'.sl-dpdpa-workday__foot-marker',
			'.sl-dpdpa-trusted',
			'.sl-dpdpa-trusted__heading',
			'.sl-dpdpa-trusted__grid',
			'.sl-dpdpa-trusted__logos',
			'.sl-dpdpa-trusted__logo-grid',
			'.sl-dpdpa-trusted__logo',
			'.sl-dpdpa-trusted__logo-placeholder',
			'.sl-dpdpa-trusted__proof',
			'.sl-dpdpa-trusted__proof-item',
			'.sl-dpdpa-trusted__proof-number',
			'.sl-dpdpa-trusted__proof-icon',
			'.sl-dpdpa-trusted__proof-content',
			'.sl-dpdpa-breach-scenario',
			'.sl-dpdpa-breach-scenario__grid',
			'.sl-dpdpa-breach-scenario__content',
			'.sl-dpdpa-breach-scenario__body',
			'.sl-dpdpa-breach-scenario__media',
			'.sl-dpdpa-breach-scenario__image',
			'.sl-dpdpa-breach-scenario__image-placeholder',
			'.sl-dpdpa-breach-scenario__caption',
			'.sl-dpdpa-course-coverage',
			'.sl-dpdpa-course-coverage__heading',
			'.sl-dpdpa-course-coverage__grid',
			'.sl-dpdpa-course-coverage__card',
			'.sl-dpdpa-course-coverage__number',
			'.sl-dpdpa-course-coverage__card-content',
			'.sl-dpdpa-course-coverage__curriculum',
			'.sl-dpdpa-course-coverage__accordion',
			'.sl-dpdpa-course-coverage__accordion-item',
			'.sl-dpdpa-course-coverage__summary',
			'.sl-dpdpa-course-coverage__toggle-title',
			'.sl-dpdpa-course-coverage__toggle-action',
			'.sl-dpdpa-course-coverage__toggle-icon',
			'.sl-dpdpa-course-coverage__panel',
			'.sl-dpdpa-course-coverage__curriculum-list',
			'.sl-dpdpa-course-coverage__curriculum-item',
			'.sl-dpdpa-course-coverage__curriculum-number',
			'.sl-dpdpa-course-coverage__curriculum-content',
			'.sl-dpdpa-learning',
			'.sl-dpdpa-learning__heading',
			'.sl-dpdpa-learning__intro',
			'.sl-dpdpa-learning__row',
			'.sl-dpdpa-learning__content',
			'.sl-dpdpa-learning__label',
			'.sl-dpdpa-learning__media',
			'.sl-dpdpa-learning__image-placeholder',
			'.sl-dpdpa-learning__caption',
			'.sl-dpdpa-learning__divider',
			'.sl-dpdpa-pricing',
			'.sl-dpdpa-pricing__heading',
			'.sl-dpdpa-pricing__grid',
			'.sl-dpdpa-pricing__copy',
			'.sl-dpdpa-pricing__why',
			'.sl-dpdpa-pricing__tiers',
			'.sl-dpdpa-pricing__tier',
			'.sl-dpdpa-pricing__tier-label',
			'.sl-dpdpa-pricing__tier-rate',
			'.sl-dpdpa-pricing__tier-period',
			'.sl-dpdpa-pricing__note',
			'.sl-dpdpa-pricing__calc',
			'.sl-dpdpa-pricing__label',
			'.sl-dpdpa-pricing__count',
			'.sl-dpdpa-pricing__slider',
			'.sl-dpdpa-pricing__track',
			'.sl-dpdpa-pricing__fill',
			'.sl-dpdpa-pricing__range',
			'.sl-dpdpa-pricing__total',
			'.sl-dpdpa-pricing__amount',
			'.sl-dpdpa-pricing__period',
			'.sl-dpdpa-pricing__unit',
			'.sl-dpdpa-pricing__volume',
			'.sl-dpdpa-pricing__actions',
			'.sl-dpdpa-scorecard-cta',
			'.sl-dpdpa-scorecard-cta__inner',
			'.sl-dpdpa-scorecard-cta__eyebrow',
			'.sl-dpdpa-scorecard-cta__description',
			'.sl-dpdpa-scorecard-cta__actions',
			'.sl-dpdpa-scorecard-cta__button',
			'.sl-dpdpa-training-records',
			'.sl-dpdpa-training-records__heading',
			'.sl-dpdpa-training-records__cards',
			'.sl-dpdpa-training-records__card',
			'.sl-dpdpa-training-records__head',
			'.sl-dpdpa-training-records__label',
			'.sl-dpdpa-training-records__screenshots',
			'.sl-dpdpa-training-records__screenshot',
			'.sl-dpdpa-training-records__image',
			'.sl-dpdpa-format-delivery',
			'.sl-dpdpa-format-delivery__heading',
			'.sl-dpdpa-format-delivery__table-wrap',
			'.sl-dpdpa-format-delivery__table',
			'.sl-dpdpa-contact',
			'.sl-dpdpa-contact__grid',
			'.sl-dpdpa-contact__content',
			'.sl-dpdpa-contact__heading',
			'.sl-dpdpa-contact__lead',
			'.sl-dpdpa-contact__bullets',
			'.sl-dpdpa-contact__details',
			'.sl-dpdpa-contact__detail',
			'.sl-dpdpa-contact__detail-label',
			'.sl-dpdpa-contact__detail-value',
			'.sl-dpdpa-contact__form-wrap',
			'.sl-gdpr-page',
			'.sl-gdpr-hero',
			'.sl-gdpr-hero__grid',
			'.sl-gdpr-hero__content',
			'.sl-gdpr-hero__heading',
			'.sl-gdpr-hero__lead',
			'.sl-gdpr-hero__description',
			'.sl-gdpr-hero__actions',
			'.sl-gdpr-hero__info-box',
			'.sl-gdpr-hero__info-icon',
			'.sl-gdpr-hero__info-content',
			'.sl-gdpr-hero__visual',
			'.sl-gdpr-course-preview',
			'.sl-gdpr-course-preview__header',
			'.sl-gdpr-course-preview__course',
			'.sl-gdpr-course-preview__course-label',
			'.sl-gdpr-course-preview__progress',
			'.sl-gdpr-course-preview__progress-track',
			'.sl-gdpr-course-preview__body',
			'.sl-gdpr-course-preview__eyebrow',
			'.sl-gdpr-course-preview__scenario',
			'.sl-gdpr-course-preview__answers',
			'.sl-gdpr-course-preview__answer',
			'.sl-gdpr-course-preview__answer--correct',
			'.sl-gdpr-course-preview__radio',
			'.sl-gdpr-course-preview__footer',
			'.sl-gdpr-course-preview__completion',
			'.sl-gdpr-course-preview__completion-track',
			'.sl-gdpr-course-preview__status',
			'.sl-gdpr-trust',
			'.sl-gdpr-trust__heading',
			'.sl-gdpr-trust__layout',
			'.sl-gdpr-trust__clients',
			'.sl-gdpr-trust__standards',
			'.sl-gdpr-trust__section-header',
			'.sl-gdpr-trust__section-icon',
			'.sl-gdpr-trust__section-heading',
			'.sl-gdpr-trust__client-grid',
			'.sl-gdpr-trust__client',
			'.sl-gdpr-trust__client-logo',
			'.sl-gdpr-trust__client-placeholder',
			'.sl-gdpr-trust__standard-list',
			'.sl-gdpr-trust__standard',
			'.sl-gdpr-trust__standard-check',
			'.sl-gdpr-trust__standard-title',
			'.sl-gdpr-trust__standard-text',
			'.sl-gdpr-risk',
			'.sl-gdpr-risk__heading',
			'.sl-gdpr-risk__cards',
			'.sl-gdpr-risk__card',
			'.sl-gdpr-risk__card-top',
			'.sl-gdpr-risk__number',
			'.sl-gdpr-risk__label',
			'.sl-gdpr-risk__card-text',
			'.sl-gdpr-risk__content-text',
			'.sl-gdpr-risk__highlight',
			'.sl-gdpr-reasons',
			'.sl-gdpr-reasons__heading',
			'.sl-gdpr-reasons__grid',
			'.sl-gdpr-reasons__card',
			'.sl-gdpr-reasons__card-top',
			'.sl-gdpr-reasons__icon-wrap',
			'.sl-gdpr-reasons__icon',
			'.sl-gdpr-reasons__card-content',
			'.sl-gdpr-reasons__closing',
			'.sl-gdpr-coverage',
			'.sl-gdpr-coverage__grid',
			'.sl-gdpr-coverage__content',
			'.sl-gdpr-coverage__heading',
			'.sl-gdpr-coverage__highlight',
			'.sl-gdpr-coverage__actions',
			'.sl-gdpr-coverage__visual',
			'.sl-gdpr-coverage__image',
			'.sl-gdpr-course-modules',
			'.sl-gdpr-course-modules__heading',
			'.sl-gdpr-course-modules__grid',
			'.sl-gdpr-course-modules__card',
			'.sl-gdpr-course-modules__card--featured',
			'.sl-gdpr-course-modules__number',
			'.sl-gdpr-course-modules__content',
			'.sl-gdpr-course-modules__label',
			'.sl-gdpr-course-modules__badge',
			'.sl-gdpr-coverage__image-placeholder',
			'.sl-gdpr-sales-marketing',
			'.sl-gdpr-sales-marketing__grid',
			'.sl-gdpr-sales-marketing__content',
			'.sl-gdpr-sales-marketing__heading',
			'.sl-gdpr-sales-marketing__list',
			'.sl-gdpr-sales-marketing__actions',
			'.sl-gdpr-sales-marketing__panel',
			'.sl-gdpr-sales-marketing__panel-header',
			'.sl-gdpr-sales-marketing__panel-eyebrow',
			'.sl-gdpr-sales-marketing__legend',
			'.sl-gdpr-sales-marketing__legend-item',
			'.sl-gdpr-sales-marketing__legend-dot',
			'.sl-gdpr-sales-marketing__legend-dot--consent',
			'.sl-gdpr-sales-marketing__table-wrap',
			'.sl-gdpr-sales-marketing__table',
			'.sl-gdpr-sales-marketing__country',
			'.sl-gdpr-sales-marketing__country-name',
			'.sl-gdpr-sales-marketing__country-detail',
			'.sl-gdpr-sales-marketing__status-dot',
			'.sl-gdpr-sales-marketing__status-dot--consent',
			'.sl-gdpr-sales-marketing__tag',
			'.sl-gdpr-sales-marketing__tag--consent',
			'.sl-gdpr-sales-marketing__panel-footer',
			'.sl-gdpr-completion-proof',
			'.sl-gdpr-completion-proof__grid',
			'.sl-gdpr-completion-proof__content',
			'.sl-gdpr-completion-proof__heading',
			'.sl-gdpr-completion-proof__card',
			'.sl-gdpr-completion-proof__card-heading',
			'.sl-gdpr-completion-proof__list',
			'.sl-gdpr-format-delivery',
			'.sl-gdpr-format-delivery__heading',
			'.sl-gdpr-format-delivery__stats',
			'.sl-gdpr-format-delivery__stat',
			'.sl-gdpr-format-delivery__formats-heading',
			'.sl-gdpr-format-delivery__formats',
			'.sl-gdpr-format-delivery__chip',
			'.sl-gdpr-faq',
			'.sl-gdpr-request-preview',
			'.sl-gdpr-request-preview__grid',
			'.sl-gdpr-request-preview__content',
			'.sl-gdpr-request-preview__heading',
			'.sl-gdpr-request-preview__lead',
			'.sl-gdpr-request-preview__bullets',
			'.sl-gdpr-request-preview__details',
			'.sl-gdpr-request-preview__detail',
			'.sl-gdpr-request-preview__detail-label',
			'.sl-gdpr-request-preview__detail-value',
			'.sl-gdpr-request-preview__form-wrap',
			'.sl-infosec-2026-cyber-page',
			'.sl-infosec-2026-cyber-hero',
			'.sl-infosec-2026-cyber-hero__grid',
			'.sl-infosec-2026-cyber-hero__head',
			'.sl-infosec-2026-cyber-hero__content',
			'.sl-infosec-2026-cyber-hero__tagline',
			'.sl-infosec-2026-cyber-hero__intro',
			'.sl-infosec-2026-cyber-hero__hook',
			'.sl-infosec-2026-cyber-hero__closing',
			'.sl-infosec-2026-cyber-hero__actions',
			'.sl-infosec-2026-cyber-hero__cta',
			'.sl-infosec-2026-cyber-hero__media',
			'.sl-infosec-2026-cyber-hero__visual',
			'.sl-infosec-2026-cyber-hero__orb',
			'.sl-infosec-2026-cyber-hero__stage',
			'.sl-infosec-2026-cyber-hero__stage-kicker',
			'.sl-infosec-2026-cyber-hero__stage-title',
			'.sl-infosec-2026-cyber-hero__stage-note',
			'.sl-infosec-2026-cyber-campaign',
			'.sl-infosec-2026-cyber-testing',
			'.sl-infosec-challenge',
			'.sl-infosec-campaign-works',
			'.sl-infosec-understand',
			'.sl-infosec-terms',
			'.sl-infosec-contact',
			'.sl-infosec-2026-cyber-campaign',
			'.sl-infosec-2026-cyber-campaign__card',
			'.sl-infosec-2026-cyber-campaign__content',
			'.sl-infosec-2026-cyber-campaign__lead',
			'.sl-infosec-2026-cyber-campaign__offer',
			'.sl-infosec-2026-cyber-campaign__offer-label',
			'.sl-infosec-2026-cyber-campaign__price',
			'.sl-infosec-2026-cyber-campaign__currency',
			'.sl-infosec-2026-cyber-campaign__amount',
			'.sl-infosec-2026-cyber-campaign__unit',
			'.sl-infosec-2026-cyber-campaign__actions',
			'.sl-infosec-2026-cyber-campaign__cta',
			'.sl-infosec-2026-cyber-campaign__cta--primary',
			'.sl-infosec-2026-cyber-campaign__terms',
			'.sl-infosec-2026-cyber-testing',
			'.sl-infosec-2026-cyber-testing__grid',
			'.sl-infosec-2026-cyber-testing__content',
			'.sl-infosec-2026-cyber-testing__questions',
			'.sl-infosec-2026-cyber-testing__question-mark',
			'.sl-infosec-2026-cyber-testing__emphasis',
			'.sl-infosec-2026-cyber-testing__visual',
			'.sl-infosec-2026-cyber-testing__image-placeholder',
			'.sl-infosec-challenge',
			'.sl-infosec-challenge__intro',
			'.sl-infosec-challenge__eyebrow',
			'.sl-infosec-challenge__heading',
			'.sl-infosec-challenge__intro-text',
			'.sl-infosec-challenge__intro-highlight',
			'.sl-infosec-challenge__intro-criteria-lead',
			'.sl-infosec-challenge__criteria',
			'.sl-infosec-challenge__criteria-item',
			'.sl-infosec-challenge__number',
			'.sl-infosec-challenge__criteria-copy',
			'.sl-infosec-challenge__criteria-divider',
			'.sl-infosec-challenge__paths',
			'.sl-infosec-challenge__card',
			'.sl-infosec-challenge__card--achieved',
			'.sl-infosec-challenge__card--awareness',
			'.sl-infosec-challenge__card-header',
			'.sl-infosec-challenge__icon',
			'.sl-infosec-challenge__card-heading',
			'.sl-infosec-challenge__card-label',
			'.sl-infosec-challenge__card-title',
			'.sl-infosec-challenge__awareness-intro',
			'.sl-infosec-challenge__subheading',
			'.sl-infosec-challenge__mini-icon',
			'.sl-infosec-challenge__benefits',
			'.sl-infosec-challenge__benefit',
			'.sl-infosec-challenge__benefit-icon',
			'.sl-infosec-challenge__benefit-copy',
			'.sl-infosec-challenge__benefit-title',
			'.sl-infosec-challenge__complimentary',
			'.sl-infosec-challenge__benefit-text',
			'.sl-infosec-challenge__message',
			'.sl-infosec-challenge__message-lead',
			'.sl-infosec-challenge__terms',
			'.sl-infosec-2026-how-it-works',
			'.sl-infosec-2026-how-it-works__intro',
			'.sl-infosec-2026-how-it-works__grid',
			'.sl-infosec-2026-how-it-works__steps',
			'.sl-infosec-2026-how-it-works__step',
			'.sl-infosec-2026-how-it-works__step--final',
			'.sl-infosec-2026-how-it-works__number',
			'.sl-infosec-2026-how-it-works__content',
			'.sl-infosec-2026-how-it-works__note',
			'.sl-infosec-2026-how-it-works__list',
			'.sl-infosec-2026-how-it-works__check',
			'.sl-infosec-2026-how-it-works__closing',
			'.sl-infosec-2026-how-it-works__outcomes',
			'.sl-infosec-2026-how-it-works__outcome',
			'.sl-infosec-2026-how-it-works__continue',
			'.sl-infosec-2026-how-it-works__actions',
			'.sl-infosec-2026-how-it-works__cta',
			'.sl-infosec-2026-how-it-works__cta--primary',
			'.sl-infosec-2026-how-it-works__cards',
			'.sl-infosec-2026-how-it-works__media',
			'.sl-infosec-2026-how-it-works__image-placeholder',
			'.sl-infosec-2026-understand',
			'.sl-infosec-2026-understand__grid',
			'.sl-infosec-2026-understand__media',
			'.sl-infosec-2026-understand__image-placeholder',
			'.sl-infosec-2026-understand__content',
			'.sl-infosec-2026-understand__list',
			'.sl-infosec-2026-understand__item',
			'.sl-infosec-2026-understand__marker',
			'.sl-infosec-2026-understand__item-content',
			'.sl-infosec-2026-terms',
			'.sl-infosec-2026-terms__intro',
			'.sl-infosec-2026-terms__content',
			'.sl-infosec-2026-terms__accordion',
			'.sl-infosec-2026-terms__item',
			'.sl-infosec-2026-terms__summary',
			'.sl-infosec-2026-terms__toggle',
			'.sl-infosec-2026-terms__panel',
			'.sl-infosec-2026-terms__criteria',
			'.sl-infosec-2026-terms__criterion',
			'.sl-infosec-2026-terms__number',
			'.sl-infosec-2026-terms__or',
			'.sl-infosec-2026-terms__benefits',
			'.sl-infosec-2026-terms__benefit',
			'.sl-infosec-2026-terms__benefit-label',
			'.sl-infosec-2026-terms__list',
			'.sl-infosec-2026-terms__list-item',
			'.sl-infosec-2026-terms__list-marker',
			'.sl-infosec-2026-contact',
			'.sl-infosec-2026-contact__grid',
			'.sl-infosec-2026-contact__content',
			'.sl-infosec-2026-contact__lead',
			'.sl-infosec-2026-contact__price',
			'.sl-infosec-2026-contact__price-amount',
			'.sl-infosec-2026-contact__price-label',
			'.sl-infosec-2026-contact__description',
			'.sl-infosec-2026-contact__whatsapp',
			'.sl-infosec-2026-contact__whatsapp-icon',
			'.sl-infosec-2026-contact__whatsapp-text',
			'.sl-infosec-2026-contact__whatsapp-label',
			'.sl-infosec-2026-contact__whatsapp-number',
			'.sl-sa-contact__whatsapp-number',
			'.sl-infosec-2026-contact__form-wrap',
			'.sl-csa-page',
			'.sl-cyber-awareness-hero',
			'.sl-cyber-awareness-hero__grid',
			'.sl-cyber-awareness-hero__content',
			'.sl-cyber-awareness-hero__tagline',
			'.sl-cyber-awareness-hero__description',
			'.sl-cyber-awareness-hero__actions',
			'.sl-cyber-awareness-hero__visual',
			'.sl-cyber-awareness-hero__image',
			'.sl-csa-oct-tag',
			'.sl-cyber-awareness-offer',
			'.sl-cyber-awareness-offer__panel',
			'.sl-cyber-awareness-offer__heading',
			'.sl-cyber-awareness-offer__title-row',
			'.sl-cyber-awareness-offer__availability',
			'.sl-cyber-awareness-offer__offer',
			'.sl-cyber-awareness-offer__item',
			'.sl-cyber-awareness-offer__item-content',
			'.sl-cyber-awareness-offer__item-label',
			'.sl-cyber-awareness-offer__operator',
			'.sl-cyber-awareness-offer__price',
			'.sl-cyber-awareness-offer__price-label',
			'.sl-cyber-awareness-offer__price-value',
			'.sl-cyber-awareness-offer__currency',
			'.sl-cyber-awareness-offer__amount',
			'.sl-cyber-awareness-offer__price-note',
			'.sl-cyber-awareness-offer__footnote',
			'.sl-cyber-awareness-offer__footnote-text',
			'.sl-cyber-awareness-readiness',
			'.sl-cyber-awareness-readiness__heading',
			'.sl-cyber-awareness-readiness__grid',
			'.sl-cyber-awareness-readiness__card',
			'.sl-cyber-awareness-readiness__number',
			'.sl-cyber-awareness-readiness__icon',
			'.sl-cyber-awareness-readiness__content',
			'.sl-cyber-awareness-readiness__footer',
			'.sl-csa-section-heading',
			'.sl-csa-two-col',
			'.sl-csa-campaign',
			'.sl-csa-campaign__row',
			'.sl-csa-campaign__row--reverse',
			'.sl-csa-campaign__content',
			'.sl-csa-campaign__number',
			'.sl-csa-checklist',
			'.sl-list',
			'.sl-list-item',
			'.sl-list-item__label',
			'.sl-list-item__text',
			'.sl-csa-placeholder',
			'.sl-csa-phishcue',
			'.sl-csa-phishcue__visual',
			'.sl-csa-phishcue__image',
			'.sl-csa-phishcue__cta',
			'.sl-csa-integration',
			'.sl-csa-integration__list',
			'.sl-csa-integration__visual',
			'.sl-csa-integration__image',
			'.sl-csa-integration__list',
			'.sl-csa-pricing',
			'.sl-csa-pricing__grid',
			'.sl-csa-pricing__card',
			'.sl-csa-pricing__card--featured',
			'.sl-csa-pricing__badge',
			'.sl-csa-pricing__head',
			'.sl-csa-pricing__price',
			'.sl-csa-included',
			'.sl-csa-included__heading',
			'.sl-csa-included__features',
			'.sl-csa-included__feature',
			'.sl-csa-included__feature--highlight',
			'.sl-csa-disclaimer',
			'.sl-csa-pricing__why',
			'.sl-csa-pricing__why-heading',
			'.sl-csa-pricing__why-scroll',
			'.sl-csa-pricing__why-table',
			'.sl-csa-pricing__why-close',
			'.sl-csa-journey',
			'.sl-csa-journey__grid',
			'.sl-csa-journey__card',
			'.sl-csa-measure',
			'.sl-csa-faq',
			'.sl-csa-faq__cta',
			'.sl-csa-footer',
			'.sl-csa-footer__meta',
			'.sl-csa-footer__tagline',
			'.sl-csa-footer__email',
			'.sl-csa-footer__copyright',
			'.sl-csa-footer__conditions',
			'.sl-csa-footer__conditions-toggle',
			'.sl-csa-footer__conditions-panel',
			'.sl-sap-faq',
			'.sl-sap-faq__cta',
			'.sl-sa-hero__top',
			'.sl-sa-hero__image-placeholder',
			'.sl-sa-hero__image-size',
			'.sl-sa-hero__image-note',
			'.sl-sa-hero__image-hint',
			'.sl-sa-achieve__icon',
			'.sl-amp-faq',
			'.sl-amp-faq__accordion',
			'.sl-amp-faq__item',
			'.sl-amp-faq__summary',
			'.sl-amp-faq__num',
			'.sl-amp-faq__q',
			'.sl-amp-faq__panel',
			'.sl-amp-faq__answer',
			'.sl-amp-card-grid',
			'.sl-amp-card-grid--1col',
			'.sl-gwct-page',
			'.sl-gwct-contact-direct',
			'.sl-gwct-contact-direct__label',
			'.sl-gwct-contact-direct__grid',
			'.sl-gwct-contact-direct__item',
			'.sl-gwct-contact-direct__icon',
			'.sl-gwct-contact-direct__body',
			'.sl-gwct-contact-direct__title',
			'.sl-gwct-contact-direct__value',
			'.sl-gwct-contact__whatsapp',
			'.sl-gwct-contact__whatsapp-icon',
			'.sl-gwct-contact__whatsapp-text',
			'.sl-gwct-contact__whatsapp-label',
			'.sl-gwct-contact__whatsapp-number',
			'.sl-csa-contact',
			'.sl-csa-contact__email',
			'.sl-csa-contact__email-label',
			'.sl-csa-contact__email-value',
			'.sl-csa-contact__form',
			'.ssf-form-wrap',
			'.ssf-form-card',
			'.ssf-form-header',
			'.ssf-form-title',
			'.ssf-form',
			'.ssf-field',
			'.ssf-checkbox',
			'.ssf-submit',
			'.ssf-error-message',
			'.ssf-honeypot',
			'.ssf-lightbox-overlay',
			'.ssf-lightbox-content',
			'.ssf-lightbox-title',
			'.ssf-lightbox-message',
			'.ssf-lightbox-button',
			'.sl-coc-page',
			'.sl-code-of-conduct-hero',
			'.sl-code-of-conduct-hero__grid',
			'.sl-code-of-conduct-hero__content',
			'.sl-code-of-conduct-hero__highlight',
			'.sl-code-of-conduct-hero__lead',
			'.sl-code-of-conduct-hero__actions',
			'.sl-code-of-conduct-hero__button-icon',
			'.sl-code-of-conduct-hero__assessment',
			'.sl-code-of-conduct-hero__assessment-top',
			'.sl-code-of-conduct-hero__assessment-category',
			'.sl-code-of-conduct-hero__assessment-label',
			'.sl-code-of-conduct-hero__question',
			'.sl-code-of-conduct-hero__options',
			'.sl-code-of-conduct-hero__option',
			'.sl-code-of-conduct-hero__option-marker',
			'.sl-code-of-conduct-hero__option-text',
			'.sl-code-of-conduct-hero__feedback',
			'.sl-code-of-conduct-hero__feedback--success',
			'.sl-code-of-conduct-hero__feedback--retry',
			'.sl-code-conduct-features',
			'.sl-code-conduct-features__heading',
			'.sl-code-conduct-features__grid',
			'.sl-code-conduct-features__card',
			'.sl-code-conduct-features__icon',
			'.sl-code-conduct-features__label',
		);
		return array_merge( (array) $white_list, $selectors );
	}

	public function prevent_page_cache_for_logged_in_users() {
		if ( is_user_logged_in() && ! defined( 'DONOTCACHEPAGE' ) ) {
			define( 'DONOTCACHEPAGE', true );
		}
	}

	public function disable_w3tc_minify_for_amp() {
		if ( ! defined( 'DONOTMINIFY' ) ) {
			define( 'DONOTMINIFY', true );
		}
	}

	public function guard_amp_page_cache_for_logged_in_users() {
		if ( ! $this->is_amp_request() ) {
			return;
		}
		if ( is_user_logged_in() && ! defined( 'DONOTCACHEPAGE' ) ) {
			define( 'DONOTCACHEPAGE', true );
		}
		show_admin_bar( false );
	}

	public function start_amp_output_buffer() {
		if ( $this->amp_output_buffer_started ) {
			return;
		}
		if ( function_exists( 'succeedlearn_amp_finalize_amp_html' ) ) {
			ob_start( 'succeedlearn_amp_finalize_amp_html' );
			$this->amp_output_buffer_started = true;
		}
	}

	public function maybe_start_amp_output_buffer() {
		if ( $this->amp_output_buffer_started || ! $this->is_amp_request() ) {
			return;
		}
		$this->start_amp_output_buffer();
		$this->disable_w3tc_minify_for_amp();
	}

	public function add_preconnect_hints() {
		echo '<link rel="dns-prefetch" href="https://cdn.ampproject.org">' . "\n";
		echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
		echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
		echo '<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700;800&display=swap">' . "\n";
	}

	public function register_amp_components() {
		if ( ! $this->is_amp_request() ) {
			return;
		}
		global $data;
		if ( ! is_array( $data ) ) {
			$data = array();
		}
		if ( empty( $data['amp_component_scripts'] ) || ! is_array( $data['amp_component_scripts'] ) ) {
			$data['amp_component_scripts'] = array();
		}
		$scripts = array(
			'amp-sidebar'   => 'https://cdn.ampproject.org/v0/amp-sidebar-0.1.js',
			'amp-accordion' => 'https://cdn.ampproject.org/v0/amp-accordion-0.1.js',
			'amp-bind'      => 'https://cdn.ampproject.org/v0/amp-bind-0.1.js',
			'amp-form'      => 'https://cdn.ampproject.org/v0/amp-form-0.1.js',
			'amp-mustache'  => 'https://cdn.ampproject.org/v0/amp-mustache-0.2.js',
			'amp-lightbox'  => 'https://cdn.ampproject.org/v0/amp-lightbox-0.1.js',
		);
		$data['amp_component_scripts'] = array_merge( $data['amp_component_scripts'], $scripts );
	}

	/**
	 * @param string $content Content.
	 * @return string
	 */
	public function sanitize_amp_the_content( $content ) {
		if ( ! $this->is_amp_request() || ! is_string( $content ) ) {
			return $content;
		}
		if ( function_exists( 'succeedlearn_amp_sanitize_amp_fragment' ) ) {
			return succeedlearn_amp_sanitize_amp_fragment( $content );
		}
		return $content;
	}

	public function prevent_duplicate_amp_canonicals() {
		if ( ! $this->is_amp_request() ) {
			return;
		}
		remove_action( 'wp_head', 'rel_canonical' );
		if ( defined( 'WPSEO_VERSION' ) ) {
			add_filter( 'wpseo_canonical', '__return_false', 99 );
		}
		if ( class_exists( 'RankMath' ) ) {
			add_filter( 'rank_math/frontend/canonical', '__return_false', 99 );
		}
	}

	public function maybe_ampforwp_missing_notice() {
		if ( ! current_user_can( 'activate_plugins' ) ) {
			return;
		}
		if ( defined( 'AMPFORWP_VERSION' ) || class_exists( 'AMPFORWP_Options_Manager' ) || function_exists( 'ampforwp_is_amp_endpoint' ) ) {
			return;
		}
		echo '<div class="notice notice-warning"><p><strong>SucceedLEARN AMP:</strong> ';
		echo esc_html__( 'AMPforWP (accelerated-mobile-pages) should be installed and active for AMP templates to work.', 'succeedlearn-amp' );
		echo '</p></div>';
	}

	/**
	 * @return bool
	 */
	private function is_amp_request() {
		if ( function_exists( 'succeedlearn_amp_is_serving_amp' ) ) {
			return succeedlearn_amp_is_serving_amp();
		}
		if ( isset( $_GET['amp'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
			return true;
		}
		return false;
	}

	/**
	 * @return Config
	 */
	public function get_config() {
		return $this->config;
	}
}
