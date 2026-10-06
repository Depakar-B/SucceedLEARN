<?php
/**
 * Global AMP Course Suite styles (PE/VC and FCP card grids).
 *
 * Opt-in per page via succeedlearn_amp_output_page_styles(..., array(..., 'global-course-suite', ...)).
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
.sl-course-suite{--sl-suite-navy:#16234e;--sl-suite-primary:#1472ba;--sl-suite-cta:#ea3e24;--sl-suite-text:#4A4A4A;--sl-suite-muted:#6B7C93;--sl-suite-bg:#F5F3EF;--sl-suite-white:#fff}
.sl-course-suite--bg-soft{background:var(--sl-suite-bg)}
.sl-course-suite__header{display:block;width:100%;margin:0 0 22px}
.sl-course-suite__intro{width:100%;max-width:none;min-width:0}
.sl-course-suite__intro .sl-h2{margin:0 0 12px}
.sl-course-suite__intro>p{margin:0;color:var(--sl-suite-text);line-height:1.65}
.sl-course-suite__header-cta{display:block;width:100%;margin:20px 0 0}
.sl-course-suite__header-cta .sl-content-btn{width:100%;max-width:100%;white-space:normal}
.sl-course-suite__pricing{display:flex;flex-wrap:wrap;gap:10px;margin:0 0 28px}
.sl-course-suite__note{display:inline-flex;flex-wrap:wrap;align-items:center;gap:6px;padding:11px 16px;border:1px solid var(--sl-suite-navy);border-radius:999px;background:var(--sl-suite-navy);color:#fff;font-size:15px;font-weight:600;line-height:1.45}
.sl-course-suite__note strong{color:#fff;font-weight:700}
.sl-course-suite__grid{display:grid;grid-template-columns:minmax(0,1fr);gap:14px;width:100%}
a.sl-course-suite__tile{display:flex;flex-direction:column;min-width:0;min-height:210px;margin:0;padding:20px;border:1px solid rgba(22,35,78,.12);border-radius:14px;background:var(--sl-suite-white);box-shadow:0 6px 18px rgba(22,35,78,.04);box-sizing:border-box;text-decoration:none;color:inherit}
a.sl-course-suite__tile.is-active{border:2px solid var(--sl-suite-cta);background:rgba(234,62,36,.05)}
.sl-course-suite__chrome{display:flex;align-items:center;justify-content:space-between;gap:12px;margin:0 0 16px}
.sl-course-suite__dash{display:block;width:36px;height:4px;border-radius:2px;background:var(--sl-suite-primary)}
a.sl-course-suite__tile.is-active .sl-course-suite__dash{background:var(--sl-suite-cta)}
.sl-course-suite__num{display:inline-flex;align-items:center;justify-content:center;width:36px;height:36px;margin-left:auto;border-radius:10px;background:rgba(20,114,186,.12);color:var(--sl-suite-primary);font-size:13px;font-weight:700;line-height:1}
a.sl-course-suite__tile.is-active .sl-course-suite__num{background:var(--sl-suite-cta);color:#fff}
.sl-course-suite__tile .sl-panel-title{margin:0 0 10px;color:var(--sl-suite-navy);font-size:18px;line-height:1.3}
.sl-course-suite__tile p{margin:0;color:var(--sl-suite-muted);font-size:14px;line-height:1.55}
.sl-course-suite__cta{display:inline-flex;align-items:center;gap:6px;margin-top:auto;padding-top:16px;color:var(--sl-suite-primary);font-weight:600;line-height:1.3}
a.sl-course-suite__tile.is-active .sl-course-suite__cta{color:var(--sl-suite-cta)}
@media(min-width:768px){
	.sl-course-suite__header{margin-bottom:24px}
	.sl-course-suite__header-cta{margin-top:24px}
	.sl-course-suite__header-cta .sl-content-btn{width:auto;max-width:none;white-space:nowrap}
	.sl-course-suite__grid{grid-template-columns:repeat(2,minmax(0,1fr));gap:16px}
	.sl-course-suite__grid>.sl-course-suite__tile:last-child:nth-child(odd){grid-column:1/-1;justify-self:center;width:calc(50% - 8px)}
}
@media(min-width:1000px){
	.sl-course-suite__grid{grid-template-columns:repeat(6,minmax(0,1fr));gap:18px}
	.sl-course-suite__grid>.sl-course-suite__tile,.sl-course-suite__grid>.sl-course-suite__tile:last-child:nth-child(odd){grid-column:span 2;justify-self:stretch;width:auto}
	.sl-course-suite__grid>.sl-course-suite__tile:nth-last-child(2):nth-child(3n+1){grid-column:2/span 2}
	.sl-course-suite__grid>.sl-course-suite__tile:last-child:nth-child(3n+1){grid-column:3/span 2}
}
