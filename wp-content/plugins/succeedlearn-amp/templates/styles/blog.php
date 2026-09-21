<?php
/**
 * AMP blog listing styles.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
.sl-blog-page{background:#f4f3ee}
.sl-blog{padding:20px 0 48px;background:#f4f3ee}
.sl-blog__wrap{max-width:1100px;margin:0 auto;padding:0 16px}
.sl-blog__crumbs{font-size:14px;color:#6b7280;margin:0 0 14px}
.sl-blog__crumbs a{color:#16234d;text-decoration:none}
.sl-blog__hero{margin:0 0 22px;padding-top:24px}
.sl-blog__hero h1{margin:0 0 10px;font-size:28px;line-height:1.2;color:#16234d}
.sl-blog__subtitle{margin:0 0 12px;font-size:17px;font-weight:600;line-height:1.4;color:#16234d}
.sl-blog .sl-lead{margin:0 0 18px;max-width:none}
.sl-sr-only{position:absolute;width:1px;height:1px;padding:0;margin:-1px;overflow:hidden;clip:rect(0,0,0,0);border:0}
.sl-blog__toolbar{background:#fff;border:1px solid rgba(22,35,77,.08);border-radius:12px;padding:12px;margin:0 0 12px;box-shadow:0 8px 24px rgba(22,35,77,.06);display:flex;flex-direction:column;align-items:stretch;gap:10px;flex:none;min-height:0}
.sl-blog__search{width:100%;flex:none}
.sl-blog__search input{width:100%;box-sizing:border-box;height:48px;padding:12px 14px;border:1px solid rgba(22,35,77,.14);border-radius:8px;font-size:16px;color:#16234d;background:#fff}
.sl-blog__sort{display:flex;flex-wrap:wrap;gap:8px;margin:0;align-items:center}
.sl-blog__sort-link,.sl-blog__reset{display:inline-block;padding:7px 11px;border-radius:999px;border:1px solid rgba(22,35,77,.14);background:#fff;color:#16234d;text-decoration:none;font-size:13px;font-weight:600;cursor:pointer;font-family:inherit}
.sl-blog__sort-link.is-active{border-color:#135db7;color:#135db7;background:rgba(19,93,183,.08)}
.sl-blog__reset{margin-left:auto}
.sl-blog__pills{display:flex;flex-wrap:nowrap;gap:8px;overflow-x:auto;-webkit-overflow-scrolling:touch;padding:0 0 4px;margin:0 0 14px}
.sl-blog-pill{flex-shrink:0;padding:8px 14px;border-radius:999px;border:1px solid rgba(22,35,77,.15);background:#fff;color:#16234d;font-size:14px;font-weight:500;text-decoration:none;display:inline-block;cursor:pointer;font-family:inherit}
.sl-blog-pill.is-active{border-color:#135db7;color:#135db7;background:rgba(19,93,183,.08);font-weight:600}
.sl-blog__grid{display:grid;grid-template-columns:1fr;gap:16px}
<?php
for ( $i = 1; $i <= 80; $i++ ) {
	echo '.sl-blog-card.o-' . (int) $i . '{order:' . (int) $i . '}';
}
echo "\n";
?>
.sl-blog-card{background:#fff;border-radius:14px;overflow:hidden;box-shadow:0 8px 24px rgba(22,35,77,.07);display:flex;flex-direction:column}
article.sl-blog-card[hidden],.sl-blog-card[hidden],.sl-blog__grid[hidden]{display:none}
.sl-blog-card__thumb{display:block;background:#16234d;line-height:0}
.sl-blog-card__thumb amp-img{display:block}
.sl-blog-card__ph{display:block;padding-top:62.5%;background:#16234d}
.sl-blog-card__body{padding:16px;display:flex;flex-direction:column;flex:1;gap:8px}
.sl-blog-card__cat{align-self:flex-start;display:inline-block;padding:3px 10px;border-radius:999px;background:rgba(19,93,183,.1);color:#135db7;font-size:12px;font-weight:600;line-height:1.4;text-transform:uppercase;letter-spacing:.04em;margin:0}
.sl-blog-card__cat[hidden]{display:none}
.sl-blog-card__title{margin:0;font-size:18px;line-height:1.35}
.sl-blog-card__title a{color:#16234d;text-decoration:none}
.sl-blog-card__meta{margin:0;font-size:13px;color:#6b7280}
.sl-blog-card__excerpt{margin:0 0 6px;font-size:14px;line-height:1.55;color:#4a5568;flex:1}
.sl-blog-card__more{color:#135db7;font-weight:700;text-decoration:none;font-size:14px}
.sl-blog__empty{background:#fff;border-radius:12px;padding:24px;text-align:center;color:#4a5568;margin:0}
.sl-blog__empty--live[hidden]{display:none}
.sl-blog__cta{margin:32px 0 0;padding:24px;border-radius:14px;background:#16234d;color:#fff}
.sl-blog__cta h2{margin:0 0 8px;font-size:22px;line-height:1.3;color:#fff}
.sl-blog__cta p{margin:0 0 16px;color:rgba(255,255,255,.82)}
@media(min-width:640px){
.sl-blog__hero h1{font-size:34px}
.sl-blog__grid{grid-template-columns:repeat(2,minmax(0,1fr));gap:18px}
.sl-blog__toolbar{flex-direction:column;align-items:stretch;padding:14px 16px}
.sl-blog__search{flex:none;width:100%}
.sl-blog__sort{margin-top:0}
}
@media(min-width:1024px){
.sl-blog{padding:28px 0 56px}
.sl-blog__wrap{padding:0 24px}
.sl-blog__hero h1{font-size:40px}
.sl-blog__grid{grid-template-columns:repeat(3,minmax(0,1fr))}
.sl-blog__cta{display:flex;align-items:center;justify-content:space-between;gap:20px;padding:28px 32px}
.sl-blog__cta p{margin:0}
}
