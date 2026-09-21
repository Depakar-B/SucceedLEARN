<?php
/**
 * AMP single post styles.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
.sl-post-page{background:#f4f3ee}
.sl-post{padding:20px 0 48px;background:#f4f3ee}
.sl-post__wrap{max-width:800px;margin:0 auto;padding:0 16px}
.sl-post__crumbs{font-size:13px;color:#6b7280;margin:0 0 14px;line-height:1.45}
.sl-post__crumbs a{color:#16234d;text-decoration:none}
.sl-post__hero{margin:0 0 18px;padding-top:8px}
.sl-post__cat{display:inline-block;margin:0 0 10px;padding:3px 10px;border-radius:999px;background:rgba(234,63,35,.1);color:#ea3f23;font-size:12px;font-weight:600;text-transform:uppercase;letter-spacing:.04em}
.sl-post__hero h1{margin:0 0 10px;font-size:26px;line-height:1.25;color:#16234d}
.sl-post__meta{margin:0 0 14px;font-size:13px;color:#6b7280}
.sl-post__meta span::before{content:" · ";color:rgba(22,35,77,.35)}
.sl-post__media{margin:0;border-radius:14px;overflow:hidden;background:#16234d}
.sl-post__toc{margin:0 0 20px;padding:14px 16px 10px;border:1px solid rgba(22,35,77,.1);border-radius:12px;background:#fff}
.sl-post__toc-title{margin:0 0 8px;padding:0 0 10px;font-size:14px;font-weight:700;text-transform:uppercase;letter-spacing:.04em;color:#16234d;border-bottom:1px solid rgba(22,35,77,.08)}
.sl-post__toc-list{margin:0;padding:0;list-style:none}
.sl-post__toc-list li{margin:0}
.sl-post__toc-list a,.sl-post__toc-list button.sl-post__toc-link{display:block;width:100%;padding:10px 0;color:#16234d;text-decoration:none;font-size:15px;line-height:1.45;border-bottom:1px solid rgba(22,35,77,.06);background:transparent;border-left:0;border-right:0;border-top:0;text-align:left;font-family:inherit;cursor:pointer;-webkit-appearance:none;appearance:none}
.sl-post__toc-list li:last-child a,.sl-post__toc-list li:last-child button.sl-post__toc-link{border-bottom:0}
.sl-post__body{color:#1a1a1a;font-size:16px;line-height:1.7}
.sl-post__body h2,.sl-post__body h3{color:#16234d;line-height:1.3;margin:1.6em 0 .6em;scroll-margin-top:var(--sl-amp-scroll-offset,120px)}
.sl-post__body h2{font-size:22px}
.sl-post__body h3{font-size:18px}
.sl-post__body p,.sl-post__body ul,.sl-post__body ol{margin:0 0 1em}
.sl-post__body a{color:#ea3f23}
.sl-post__body img,.sl-post__body amp-img,.sl-post__body figure{max-width:100%;height:auto}
.sl-post__body blockquote{margin:1.25em 0;padding:0 0 0 14px;border-left:3px solid #ea3f23;color:#2f4674;font-style:italic}
.sl-post__tags{display:flex;flex-wrap:wrap;gap:8px;list-style:none;margin:24px 0 0;padding:16px 0 0;border-top:1px solid rgba(22,35,77,.1)}
.sl-post__tags li{padding:4px 10px;border-radius:6px;background:rgba(22,35,77,.06);color:#16234d;font-size:13px}
.sl-post__cta{margin-top:24px}
.sl-post__related{margin-top:28px;padding-top:20px;border-top:1px solid rgba(22,35,77,.1)}
.sl-post__related h2{margin:0 0 14px;font-size:22px;color:#16234d;scroll-margin-top:var(--sl-amp-scroll-offset,120px)}
.sl-post__related-grid{grid-template-columns:1fr!important}
@media(min-width:640px){
.sl-post__hero h1{font-size:32px}
.sl-post__wrap{padding:0 20px}
.sl-post__related-grid{grid-template-columns:repeat(2,minmax(0,1fr))!important}
}
