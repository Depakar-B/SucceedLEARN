<?php
/**
 * Theme bootstrap — load inc modules in dependency order.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$akaza_inc = AKAZA_DIR . '/inc';

require_once $akaza_inc . '/courses-archive.php';
require_once $akaza_inc . '/blog-archive.php';
require_once $akaza_inc . '/blog-seed.php';
require_once $akaza_inc . '/single-post.php';
require_once $akaza_inc . '/single-course.php';
require_once $akaza_inc . '/breadcrumbs.php';
require_once $akaza_inc . '/contact-form-brand.php';
require_once $akaza_inc . '/client-testimonials.php';
require_once $akaza_inc . '/client-logos.php';
require_once $akaza_inc . '/site-search.php';
require_once $akaza_inc . '/inclusive-courses-data.php';

require_once $akaza_inc . '/setup.php';
require_once $akaza_inc . '/helpers.php';
require_once $akaza_inc . '/secondary-header.php';
require_once $akaza_inc . '/solutions-carousel.php';

require_once $akaza_inc . '/assets/helpers.php';
require_once $akaza_inc . '/assets/enqueue-core.php';
require_once $akaza_inc . '/assets/enqueue-home.php';
require_once $akaza_inc . '/assets/enqueue-legal.php';
require_once $akaza_inc . '/assets/enqueue-fcp.php';
require_once $akaza_inc . '/assets/enqueue-sap.php';
require_once $akaza_inc . '/assets/enqueue-coc.php';
require_once $akaza_inc . '/assets/enqueue-csa.php';
require_once $akaza_inc . '/assets/enqueue-about-contact.php';
require_once $akaza_inc . '/assets/enqueue-clients.php';
require_once $akaza_inc . '/assets/enqueue-inclusive.php';
require_once $akaza_inc . '/assets/enqueue-iwc.php';
require_once $akaza_inc . '/assets/enqueue-gwct.php';
require_once $akaza_inc . '/assets/enqueue-gdpr.php';
require_once $akaza_inc . '/assets/enqueue-ferpa.php';
require_once $akaza_inc . '/assets/enqueue-whp.php';
require_once $akaza_inc . '/assets/enqueue-infosec-2026-cyber.php';
require_once $akaza_inc . '/assets/enqueue-dpdpa.php';
require_once $akaza_inc . '/assets/enqueue-dpdpa-readiness.php';
require_once $akaza_inc . '/assets/enqueue-hipaa.php';
require_once $akaza_inc . '/assets/enqueue-s-aware.php';
require_once $akaza_inc . '/assets/enqueue-s-bytes.php';
require_once $akaza_inc . '/assets/enqueue-s-phish.php';
require_once $akaza_inc . '/assets/enqueue-s-signs.php';
require_once $akaza_inc . '/assets/enqueue-s-play.php';
require_once $akaza_inc . '/assets/enqueue-s-metrics.php';
require_once $akaza_inc . '/assets/enqueue-us-harassment.php';
require_once $akaza_inc . '/assets/enqueue-uk-harassment.php';
require_once $akaza_inc . '/assets/enqueue-gifts-entertainment.php';
require_once $akaza_inc . '/assets/enqueue-aml-pe-vc.php';
require_once $akaza_inc . '/assets/enqueue-insider-trading.php';
require_once $akaza_inc . '/assets/enqueue-tax-evasion.php';
require_once $akaza_inc . '/assets/enqueue-anti-bribery.php';
require_once $akaza_inc . '/assets/enqueue-whistleblowing.php';
require_once $akaza_inc . '/assets/enqueue-political-donations.php';
require_once $akaza_inc . '/assets/enqueue-smcr.php';
require_once $akaza_inc . '/assets/enqueue-defensive-driving.php';
require_once $akaza_inc . '/assets/dispatcher.php';

require_once $akaza_inc . '/scroll-to-top.php';
require_once $akaza_inc . '/fonts.php';
require_once $akaza_inc . '/seo.php';
require_once $akaza_inc . '/performance.php';
require_once $akaza_inc . '/bootstrap-pages.php';
require_once $akaza_inc . '/contact-handler.php';
require_once $akaza_inc . '/dpdpa-readiness-handler.php';
require_once $akaza_inc . '/sitemap.php';
require_once $akaza_inc . '/elementor.php';
