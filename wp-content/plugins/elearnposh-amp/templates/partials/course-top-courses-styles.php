<?php
/**
 * Our Other Solutions grid — course-showcase parity with AMP homepage.
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
.pfe-sub-wide{max-width:760px}
#pfe-top-courses .course-showcase__grid{display:grid;grid-template-columns:repeat(1,minmax(0,1fr));gap:20px;align-items:start;text-align:left;margin-top:14px}
@media (min-width:576px){#pfe-top-courses .course-showcase__grid{grid-template-columns:repeat(2,minmax(0,1fr));gap:22px}}
@media (min-width:992px){#pfe-top-courses .course-showcase__grid{grid-template-columns:repeat(3,minmax(0,1fr));gap:24px}}
#pfe-top-courses .course-showcase__card{position:relative;height:auto;display:flex;flex-direction:column;background:#fff;border:1px solid #e2e8f0;border-radius:16px;overflow:hidden;box-shadow:0 10px 26px rgba(15,23,42,.1);text-align:left}
#pfe-top-courses .course-showcase__image{display:block;position:relative;background:linear-gradient(180deg,#f8fafc 0%,#eef2f7 100%);aspect-ratio:16/10;overflow:hidden}
#pfe-top-courses .course-showcase__image amp-img{width:100%;height:100%}
#pfe-top-courses .course-showcase__category{position:absolute;top:12px;left:12px;z-index:2;display:inline-block;padding:6px 12px;border-radius:8px;font-size:.78rem;font-weight:700;line-height:1.2;box-shadow:0 4px 14px rgba(15,23,42,.18);pointer-events:none}
#pfe-top-courses .course-showcase__category--posh{background:#ede9fe;color:#5b21b6}
#pfe-top-courses .course-showcase__category--cms{background:#ccfbf1;color:#0f766e}
#pfe-top-courses .course-showcase__category--global{background:#ffedd5;color:#c2410c}
#pfe-top-courses .course-showcase__body{flex:0 0 auto;display:flex;flex-direction:column;justify-content:flex-start;padding:12px 16px 14px;text-align:left}
#pfe-top-courses .course-showcase__body h3{font-size:1.08rem;font-weight:700;margin:0 0 4px;line-height:1.25;color:#0f172a;text-align:left;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden}
#pfe-top-courses .course-showcase__desc{flex:0 0 auto;flex-shrink:0;margin:0 0 10px;font-size:14px;line-height:1.55;color:#475569;text-align:left;display:-webkit-box;-webkit-line-clamp:3;-webkit-box-orient:vertical;overflow:hidden;max-height:calc(1.55em * 3)}
#pfe-top-courses .course-showcase__cta{display:flex;align-items:center;justify-content:center;width:100%;margin-top:0;flex-shrink:0;box-sizing:border-box;text-align:center;border-radius:8px;background:#e8f2f5;color:#002a38;border:1px solid rgba(0,42,56,.22);text-decoration:none;font-weight:600;font-size:14px;padding:10px 14px}
