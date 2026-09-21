<?php
/**
 * AMP global footer styles (matches desktop secondary footer).
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
.sl-amp-footer{--sl-amp-footer-navy:#16234e;--sl-amp-footer-blue:#1472ba;--sl-amp-footer-text:#4A4A4A;--sl-amp-footer-muted:#6B7C93;--sl-amp-footer-border:rgba(107,124,147,.18);position:relative;margin-top:0;background:#fff;color:var(--sl-amp-footer-text);font-family:"Open Sans","Space Grotesk",system-ui,sans-serif}
.sl-amp-footer__main{padding:40px 0 32px;border-top:1px solid var(--sl-amp-footer-border)}
.sl-amp-footer__inner{display:grid;grid-template-columns:1fr;gap:28px;width:100%;max-width:1400px;margin:0 auto;padding:0 16px;box-sizing:border-box}
.sl-amp-footer__logo{display:inline-flex;line-height:0;text-decoration:none;margin:0 0 14px}
.sl-amp-footer__logo amp-img{display:block}
.sl-amp-footer__about{margin:0 0 18px;max-width:420px;font-size:14px;line-height:1.7;color:var(--sl-amp-footer-text)}
.sl-amp-footer__about a{color:var(--sl-amp-footer-blue);font-weight:600;text-decoration:none}
.sl-amp-footer__heading{margin:0 0 12px;color:var(--sl-amp-footer-navy);font-size:18px;font-weight:700;line-height:1.3}
.sl-amp-footer__email-row{display:flex;align-items:center;gap:8px;margin:0 0 12px;font-size:15px}
.sl-amp-footer__email-row a{color:var(--sl-amp-footer-navy);font-weight:600;text-decoration:none}
.sl-amp-footer__email-icon{color:var(--sl-amp-footer-blue);line-height:1}
.sl-amp-footer__social{display:flex;gap:10px;margin:0 0 18px}
.sl-amp-footer__social-link{display:inline-flex;align-items:center;justify-content:center;width:36px;height:36px;border-radius:6px;background:var(--sl-amp-footer-blue);color:#fff;text-decoration:none}
.sl-amp-footer__certs{display:flex;flex-wrap:wrap;align-items:center;gap:10px}
.sl-amp-footer__certs amp-img{display:block}
.sl-amp-footer__links{list-style:none;margin:0;padding:0}
.sl-amp-footer__links li{margin:0 0 10px}
.sl-amp-footer__links a{color:var(--sl-amp-footer-navy);font-size:15px;font-weight:500;line-height:1.4;text-decoration:none}
.sl-amp-footer__bar{background:var(--sl-amp-footer-blue);color:#fff;text-align:center;padding:12px 16px}
.sl-amp-footer__bar p{margin:0;font-size:13px;line-height:1.5;color:#fff}
@media(min-width:768px){.sl-amp-footer__main{padding:48px 0 36px}.sl-amp-footer__inner{grid-template-columns:minmax(0,1.2fr) repeat(2,minmax(0,1fr));gap:28px 28px;padding:0 20px}.sl-amp-footer__brand{grid-column:1/-1}.sl-amp-footer__bar p{font-size:14px}}
@media(min-width:1100px){.sl-amp-footer__inner{grid-template-columns:minmax(240px,1.35fr) repeat(3,minmax(0,1fr));gap:36px 40px}.sl-amp-footer__brand{grid-column:auto}}
