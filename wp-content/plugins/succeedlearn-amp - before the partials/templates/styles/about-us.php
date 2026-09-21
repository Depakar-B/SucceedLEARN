<?php
/**
 * About Us — AMP page styles.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
.sl-about-page{--sl-page-navy:#16234e;--sl-page-primary:#ea3e24;--sl-page-primary-dark:#d4331c;--sl-page-primary-soft:#fdece8;--sl-page-blue:#1472ba;--sl-page-text:#4A4A4A;--sl-page-muted:#6B7C93;--sl-page-bg:#F5F3EF;--sl-page-white:#fff}
.sl-about-page .sl-eyebrow{color:var(--sl-page-primary)}
.sl-about-page .sl-btn--primary{background:var(--sl-page-primary)}
.sl-about-page .sl-btn--secondary{background:var(--sl-page-navy)}
.sl-about-page .sl-stat__value{color:var(--sl-page-primary)}
.sl-about-page .sl-clients__title span{color:var(--sl-page-primary)}
.sl-about-hero{padding:88px 16px 40px;background:var(--sl-page-white)}
.sl-about-hero__grid{display:grid;gap:28px;align-items:center}
.sl-about-hero__eyebrow{display:inline-block;margin:0 0 14px;padding:8px 16px;border:1px solid rgba(234,62,36,.28);border-radius:999px;background:var(--sl-page-white);color:var(--sl-page-primary);font-size:14px;font-weight:600}
.sl-about-hero__title{margin:0 0 16px;font-size:30px;line-height:1.15;color:var(--sl-page-navy);font-weight:750}
.sl-about-hero__title span{display:block;color:var(--sl-page-primary)}
.sl-about-hero__desc{margin:0 0 14px;font-size:15px;line-height:1.65;color:var(--sl-page-text)}
.sl-about-hero__actions{margin-top:8px}
.sl-about-hero__visual{display:grid;gap:12px}
.sl-about-hero__card{background:var(--sl-page-white);border:1px solid rgba(107,124,147,.18);border-radius:16px;padding:18px;box-shadow:0 12px 32px rgba(22,35,78,.08)}
.sl-about-hero__card--main{display:grid;grid-template-columns:auto 1fr;gap:14px;align-items:center;border-top:3px solid var(--sl-page-primary)}
.sl-about-hero__icon{width:42px;height:42px;border-radius:12px;background:var(--sl-page-primary-soft);color:var(--sl-page-primary);display:flex;align-items:center;justify-content:center;font-weight:700;font-size:18px}
.sl-about-hero__card-label{display:block;margin-bottom:4px;font-size:12px;color:var(--sl-page-muted);text-transform:uppercase;letter-spacing:.04em}
.sl-about-hero__card h3{margin:0;font-size:18px;color:var(--sl-page-navy)}
.sl-about-hero__card h3 span{color:var(--sl-page-primary)}
.sl-about-hero__mini-grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:12px}
.sl-about-hero__card--small{display:flex;gap:12px;align-items:center}
.sl-about-hero__mini-icon{width:32px;height:32px;border-radius:10px;background:var(--sl-page-primary-soft);color:var(--sl-page-primary);display:flex;align-items:center;justify-content:center;font-size:14px;flex:0 0 auto}
.sl-about-hero__card--small strong{display:block;font-size:16px;color:var(--sl-page-navy)}
.sl-about-hero__card--small small{display:block;font-size:12px;color:var(--sl-page-muted)}
@media(min-width:900px){.sl-about-hero__grid{grid-template-columns:minmax(0,1.05fr) minmax(0,.85fr)}.sl-about-hero__title{font-size:38px}}
