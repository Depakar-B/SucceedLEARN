<?php
/**
 * AMP course archive listing styles — aligned with desktop courses-archive.css.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
.sl-courses-page{background:#f4f3ee}
.sl-courses{padding:16px 0 48px;background:#f4f3ee}
.sl-courses__wrap{max-width:1100px;margin:0 auto;padding:0 16px}
.sl-courses__crumbs{font-size:14px;color:#6b7280;margin:0 0 16px}
.sl-courses__crumbs a{color:#16234d;text-decoration:none}
.sl-sr-only{position:absolute;width:1px;height:1px;padding:0;margin:-1px;overflow:hidden;clip:rect(0,0,0,0);border:0}
.sl-courses-shell{display:flex;flex-direction:column;gap:14px}
.sl-courses-cats{background:#fff;border:1px solid rgba(22,35,77,.08);border-radius:14px;box-shadow:0 10px 28px rgba(22,35,77,.08);overflow:hidden}
.sl-courses-cats__title{margin:0;padding:14px 16px;font-size:12px;font-weight:700;letter-spacing:.1em;text-transform:uppercase;color:#6b7280;border-bottom:1px solid rgba(22,35,77,.08);background:linear-gradient(180deg,#fff 0%,#fafbff 100%)}
.sl-courses-cats__list{list-style:none;margin:0;padding:10px 12px 14px;display:flex;flex-wrap:wrap;gap:8px}
.sl-courses-cats__item{margin:0}
.sl-courses-cats__link{display:flex;align-items:center;justify-content:space-between;gap:10px;padding:11px 12px;border-radius:10px;border-left:3px solid transparent;color:#16234d;text-decoration:none;font-size:14px;line-height:1.45;background:#fff;border:1px solid rgba(22,35,77,.1)}
.sl-courses-cats__link:focus,
.sl-courses-cats__link:active{outline:none;border-color:#ea3f23;border-left-color:#ea3f23;background:rgba(234,63,35,.06)}
.sl-courses-cats__label{flex:1;min-width:0}
.sl-courses-cats__count{flex-shrink:0;min-width:24px;padding:2px 8px;border-radius:999px;background:rgba(22,35,77,.06);font-size:12px;font-weight:700;color:#6b7280;text-align:center}
.sl-courses__toolbar{background:#fff;border:1px solid rgba(22,35,77,.08);border-radius:12px;padding:12px 14px;box-shadow:0 8px 24px rgba(22,35,77,.06);display:flex;flex-direction:column;gap:12px}
.sl-courses__search{width:100%}
.sl-courses__search input{width:100%;box-sizing:border-box;height:44px;padding:10px 14px;border:1px solid rgba(22,35,77,.12);border-radius:8px;font-size:16px;color:#16234d;background:#fff}
.sl-courses__controls{display:flex;flex-wrap:wrap;align-items:center;gap:8px}
.sl-courses__sort{display:flex;flex-wrap:wrap;gap:8px;flex:1}
.sl-courses__sort-link,.sl-courses__reset{display:inline-block;padding:8px 12px;border-radius:8px;border:1px solid rgba(22,35,77,.12);background:#fff;color:#16234d;font-size:13px;font-weight:600;cursor:pointer;font-family:inherit}
.sl-courses__sort-link.is-active{border-color:#ea3f23;color:#ea3f23;background:rgba(234,63,35,.08)}
.sl-courses__reset{margin-left:auto}
.sl-courses-main{min-width:0}
.sl-courses-section{margin:0 0 28px;scroll-margin-top:80px}
.sl-courses-section[hidden]{display:none}
.sl-courses-section__header{display:flex;flex-wrap:wrap;align-items:baseline;gap:8px 16px;margin:0 0 14px;padding:0 0 10px;border-bottom:2px solid rgba(22,35,77,.08)}
.sl-courses-section__title{margin:0;font-size:22px;line-height:1.25;color:#16234d}
.sl-courses-section__count{font-size:14px;color:#6b7280;font-weight:500}
.sl-courses-bulk{margin:0 0 16px}
.sl-courses-bulk__inner{background:#fff;border-radius:12px;padding:18px 20px;box-shadow:0 8px 24px rgba(22,35,77,.07);border-left:4px solid #ea3f23}
.sl-courses-bulk__title{margin:0 0 8px;font-size:18px;line-height:1.35;color:#16234d}
.sl-courses-bulk__desc,.sl-courses-bulk__intro{margin:0 0 8px;font-size:14px;line-height:1.55;color:#4a5568}
.sl-courses-bulk__intro{color:#6b7280;margin-bottom:12px}
.sl-courses__grid{display:grid;grid-template-columns:1fr;gap:16px}
<?php
for ( $i = 1; $i <= 80; $i++ ) {
	echo '.sl-courses-card.o-' . (int) $i . '{order:' . (int) $i . '}';
}
echo "\n";
?>
.sl-courses-card{display:flex;flex-direction:column;background:#fff;border-radius:12px;overflow:hidden;box-shadow:0 8px 24px rgba(22,35,77,.07);min-width:0}
article.sl-courses-card[hidden],.sl-courses-card[hidden]{display:none}
.sl-courses-card__thumb{display:block;aspect-ratio:16/10;overflow:hidden;background:#f4f3ee;line-height:0}
.sl-courses-card__thumb amp-img{display:block;width:100%;height:100%;object-fit:cover}
.sl-courses-card__ph{display:block;width:100%;height:100%;min-height:180px;background:linear-gradient(135deg,#f4f3ee 0%,#e8e7e2 100%)}
.sl-courses-card__body{display:flex;flex-direction:column;flex:1;gap:10px;padding:16px 18px 18px}
.sl-courses-card__title{margin:0;font-size:17px;line-height:1.35}
.sl-courses-card__title a{color:#16234d;text-decoration:none}
.sl-courses-card__excerpt{margin:0;font-size:14px;line-height:1.5;color:#6b7280;display:-webkit-box;-webkit-line-clamp:3;-webkit-box-orient:vertical;overflow:hidden}
.sl-courses-card__meta{display:flex;flex-wrap:wrap;align-items:center;justify-content:space-between;gap:8px;margin-top:auto;font-size:13px;color:#6b7280}
.sl-courses-card__duration strong{font-weight:600;color:#16234d}
.sl-courses-card__price{font-weight:700;color:#ea3f23;font-size:16px}
.sl-courses-card__cta{align-self:flex-start;margin-top:4px}
.sl-btn{display:inline-flex;align-items:center;justify-content:center;padding:11px 22px;border-radius:8px;font-weight:600;font-size:15px;line-height:1;text-decoration:none;border:0;font-family:inherit;cursor:pointer}
.sl-btn--sm{padding:11px 22px;font-size:15px}
.sl-btn--primary{background:#ea3f23;color:#fff}
.sl-courses-page .sl-courses-card__cta,
.sl-courses-page a.sl-courses-card__cta.sl-btn--primary{background:#ea3f23!important;color:#fff!important;border-color:#ea3f23!important}
.sl-courses__empty{background:#fff;border-radius:12px;padding:24px;text-align:center;color:#4a5568;margin:0}
.sl-courses__empty--live[hidden]{display:none}
@media(min-width:640px){
.sl-courses__grid{grid-template-columns:repeat(2,minmax(0,1fr));gap:18px}
.sl-courses-cats__list{flex-direction:column;flex-wrap:nowrap;gap:6px;padding:10px 14px 14px}
.sl-courses-cats__link{border:1px solid rgba(22,35,77,.08);border-left:3px solid transparent;padding:12px 14px}
}
@media(min-width:1024px){
.sl-courses{padding:24px 0 56px}
.sl-courses__wrap{padding:0 24px}
.sl-courses-shell{display:grid;grid-template-columns:260px minmax(0,1fr);grid-template-rows:auto 1fr;gap:0 20px;align-items:start}
.sl-courses-cats{grid-column:1;grid-row:1/-1;position:sticky;top:80px}
.sl-courses-cats__list{flex-direction:column;flex-wrap:nowrap}
.sl-courses-cats__link{border:0;border-left:3px solid transparent}
.sl-courses__toolbar{grid-column:2;grid-row:1;margin-bottom:4px}
.sl-courses-main{grid-column:2;grid-row:2}
.sl-courses__grid{grid-template-columns:repeat(2,minmax(0,1fr))}
}
