<?php
/**
 * Contact Us — AMP page styles.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
.sl-contact-page{--sl-page-navy:#16234e;--sl-page-primary:#135db7;--sl-page-primary-dark:#1a3b87;--sl-page-primary-soft:rgba(77,126,214,.14);--sl-page-blue:#1472ba;--sl-page-cta:#ea3e24;--sl-btn-primary-fill:linear-gradient(180deg,#ea3e24 0%,#ea3e24 100%);--sl-btn-secondary-color:#ea3e24;--sl-page-text:#4A4A4A;--sl-page-muted:#6B7C93;--sl-page-bg:#f5f5f5;--sl-page-white:#fff}
.sl-contact-page .sl-eyebrow{color:var(--sl-page-primary)}
.sl-contact-page .sl-btn--secondary{background:var(--sl-page-navy)}
.sl-contact-page .sl-stat__value{color:var(--sl-page-primary)}
.sl-contact-page .sl-clients__title span{color:var(--sl-page-primary)}
.sl-contact-hero{padding:16px;background:var(--sl-page-white)}
.sl-contact-hero__grid{display:grid;gap:28px;align-items:center}
.sl-contact-hero__eyebrow{display:inline-block;margin:0 0 14px;padding:8px 16px;border:1px solid rgba(19,93,183,.28);border-radius:999px;background:var(--sl-page-white);color:var(--sl-page-primary);font-size:14px;font-weight:600}
.sl-contact-hero__title{margin:0 0 12px;font-size:30px;line-height:1.15;color:var(--sl-page-navy);font-weight:750}
.sl-contact-hero__title span{display:block;color:var(--sl-page-primary)}
.sl-contact-hero__heading{margin:0 0 8px;font-size:22px;color:var(--sl-page-navy)}
.sl-contact-hero__lead{margin:0 0 10px;font-size:16px;color:var(--sl-page-muted);font-weight:600}
.sl-contact-hero__desc{margin:0 0 18px;font-size:15px;line-height:1.65;color:var(--sl-page-text)}
.sl-contact-hero__email{display:flex;flex-wrap:wrap;gap:8px;align-items:center;font-size:15px}
.sl-contact-hero__email-label{color:var(--sl-page-muted);font-weight:600}
.sl-contact-hero__email a{color:var(--sl-page-blue);font-weight:700;text-decoration:none}
.sl-contact-hero__media amp-img{border-radius:18px;overflow:hidden;border:1px solid rgba(107,124,147,.18)}
@media(min-width:900px){.sl-contact-hero__grid{grid-template-columns:minmax(0,1.05fr) minmax(0,.95fr)}.sl-contact-hero__title{font-size:38px}}
