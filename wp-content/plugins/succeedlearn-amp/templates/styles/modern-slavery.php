<?php
/**
 * Modern Slavery Awareness AMP layout tweaks.
 *
 * Card grids: one per row on mobile, two per row from tablet up.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
.sl-msa-page #fcp-suite .sl-course-suite__grid{grid-template-columns:minmax(0,1fr)}
.sl-msa-page .sl-msa-cards{display:grid;grid-template-columns:minmax(0,1fr);gap:12px;margin:0;padding:0;list-style:none}
.sl-msa-page .sl-msa-card{position:relative;display:block;min-width:0;padding:18px 18px 18px 18px;border:1px solid rgba(22,35,78,.1);border-radius:12px;background:var(--sl-page-white,#fff);box-shadow:0 6px 18px rgba(22,35,78,.04);box-sizing:border-box;text-align:left}
.sl-msa-page .sl-msa-card__num{display:inline-flex;align-items:center;justify-content:center;min-width:36px;margin:0 0 10px;padding:6px 10px;border-radius:10px;background:rgba(20,114,186,.12);color:#1472ba;font-size:12px;font-weight:700;line-height:1}
.sl-msa-page .sl-msa-card .sl-panel-title{margin:0 0 6px;text-align:left}
.sl-msa-page .sl-msa-card p{margin:0;text-align:left}
@media(min-width:768px){
	.sl-msa-page #fcp-suite .sl-course-suite__grid{grid-template-columns:repeat(2,minmax(0,1fr));gap:16px}
	.sl-msa-page #fcp-suite .sl-course-suite__grid>.sl-course-suite__tile:last-child:nth-child(odd){grid-column:1/-1;justify-self:center;width:calc(50% - 8px)}
	.sl-msa-page .sl-msa-cards{grid-template-columns:repeat(2,minmax(0,1fr))}
	.sl-msa-page .sl-msa-cards>.sl-msa-card:last-child:nth-child(odd){grid-column:1/-1;justify-self:center;width:100%;max-width:calc((100% - 12px) / 2)}
}
@media(min-width:1000px){
	.sl-msa-page #fcp-suite .sl-course-suite__grid{grid-template-columns:repeat(2,minmax(0,1fr));gap:18px}
	.sl-msa-page #fcp-suite .sl-course-suite__grid>.sl-course-suite__tile,
	.sl-msa-page #fcp-suite .sl-course-suite__grid>.sl-course-suite__tile:last-child:nth-child(odd),
	.sl-msa-page #fcp-suite .sl-course-suite__grid>.sl-course-suite__tile:nth-last-child(2):nth-child(3n+1),
	.sl-msa-page #fcp-suite .sl-course-suite__grid>.sl-course-suite__tile:last-child:nth-child(3n+1){grid-column:auto;justify-self:stretch;width:auto}
}
