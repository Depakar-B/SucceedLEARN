<?php
/**
 * Shared solutions card grid — AMP styles.
 *
 * Accent follows --sl-page-primary from the page wrapper.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
.sl-solutions-cards{--sl-sc-accent:var(--sl-page-primary,#135db7);--sl-sc-accent-dark:var(--sl-page-primary-dark,#1a3b87);--sl-sc-accent-soft:var(--sl-page-primary-soft,rgba(77,126,214,.14));--sl-sc-navy:#16234e;--sl-sc-muted:#6B7C93;--sl-sc-blue:#1472ba;--sl-sc-soft:#f5f5f5;padding:48px 0;background:var(--sl-sc-soft)}
.sl-solutions-cards__container{max-width:1180px}
.sl-solutions-cards__header{max-width:720px;margin:0 0 28px}
.sl-solutions-cards__header .sl-eyebrow{display:inline-block;margin:0 0 12px;padding:8px 16px;border:1px solid rgba(22,35,78,.12);border-radius:999px;background:#fff;color:var(--sl-sc-accent);font-size:14px;font-weight:600;line-height:1.4}
.sl-solutions-cards__header .sl-h2{margin:0 0 12px;color:var(--sl-sc-navy);font-size:28px;font-weight:800;line-height:1.2}
.sl-solutions-cards__header .sl-lead{margin:0;color:var(--sl-sc-muted);font-size:15px;line-height:1.65}
.sl-solutions-cards__grid{display:grid;grid-template-columns:1fr;gap:16px;align-items:stretch}
.sl-solutions-cards__card{display:flex;flex-direction:column;height:100%;min-width:0;padding:22px 20px;border-radius:16px;background:#fff;border:1px solid rgba(22,35,78,.08);box-shadow:0 10px 28px rgba(22,35,78,.06);box-sizing:border-box}
.sl-solutions-cards__icon{display:inline-flex;align-items:center;justify-content:center;width:64px;height:64px;margin:0 0 16px;border-radius:14px;background:var(--sl-sc-accent-soft);border:1px solid rgba(22,35,78,.1);flex-shrink:0;box-sizing:border-box}
.sl-solutions-cards__icon amp-img{display:block}
.sl-solutions-cards__body{display:flex;flex-direction:column;flex:1;min-width:0;min-height:0}
.sl-solutions-cards__body h3{margin:0 0 12px;color:var(--sl-sc-navy);font-size:17px;font-weight:800;line-height:1.35}
.sl-solutions-cards__body p{margin:0 0 16px;color:var(--sl-sc-muted);font-size:14px;line-height:1.65;flex:1}
.sl-solutions-cards__link{display:inline-flex;align-items:center;margin-top:auto;padding:0;border:0;background:transparent;color:var(--sl-sc-accent-dark);font:inherit;font-size:14px;font-weight:700;line-height:1.45;text-align:left;text-decoration:none;cursor:pointer}
@media(min-width:641px){.sl-solutions-cards__grid{grid-template-columns:repeat(2,minmax(0,1fr));gap:18px}.sl-solutions-cards__card{padding:24px}.sl-solutions-cards__body h3{font-size:18px}.sl-solutions-cards__body p{font-size:15px}.sl-solutions-cards__header .sl-h2{font-size:32px}}
