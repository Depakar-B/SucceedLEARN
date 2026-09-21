<?php
/**
 * Shared hero subtitle styles (matches theme page-hero-subtitle.css).
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
.ep-page-hero__subtitle,
.ep-enterprise-hero__subtitle,
.ep-posh-audit-hero__subtitle.ep-page-hero__subtitle,
.pfe-hero-subtitle,
.pfe-hero h2.pfe-hero-subtitle,
.pwb-subtitle,
.posh-act-hero-sub,
.she-box-hero-sub,
.elp-legal-hero-sub,
.clients-page-subtitle.ep-page-hero__subtitle,
.ep-press-hero__subtitle,
.pfe-hero--press .ep-page-hero__subtitle,
.nl-hero-subtitle,
.ep-blog-list-hero__subtitle {
	margin: 0 0 12px;
	font-size: clamp(1.1rem, 0.95rem + 0.6vw, 1.45rem);
	line-height: 1.35;
	font-weight: 700;
	color: #0f766e;
}

.pfe-hero h2.pfe-hero-subtitle {
	font-size: clamp(1.1rem, 0.95rem + 0.6vw, 1.45rem);
}

.pwb-hero-head .ep-page-hero__subtitle,
.pwb-hero-head .pwb-subtitle {
	text-align: center;
	max-width: 860px;
	margin-left: auto;
	margin-right: auto;
}
