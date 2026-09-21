<?php
/**
 * Zig-zag video showcase styles (desktop #eposh-vz parity).
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
#eposh-vz{--eposh-soft-grad-b:linear-gradient(to bottom,#f0fdfa 0%,#f8fafc 45%,#fff7ed 100%);background:var(--eposh-soft-grad-b);padding:48px 16px 56px}
#eposh-vz .eposh-vz-shell{width:100%;max-width:1290px;margin:0 auto}
.eposh-vz-head{text-align:center;margin-bottom:32px}
.eposh-vz-head__title{margin:0 0 12px;font-size:clamp(1.4rem,1.1rem + 1.2vw,1.95rem);line-height:1.3;font-weight:800;color:#0f766e}
.eposh-vz-head__lead{margin:0 auto;max-width:42rem;font-size:16px;line-height:1.6;color:#475569}
.eposh-vz-list{display:flex;flex-direction:column;gap:24px}
.eposh-vz-card{background:#fff;border:1px solid #e5e7eb;border-radius:16px;box-shadow:0 8px 24px rgba(15,23,42,.07);overflow:hidden}
.eposh-vz-card__inner{display:flex;flex-direction:column;align-items:stretch;min-height:0}
.eposh-vz-card__media{position:relative;width:100%;background:#fff;overflow:hidden;display:flex;align-items:center;justify-content:center}
#eposh-vz .eposh-vz-card__player{display:block;width:100%}
.eposh-vz-card__body{padding:20px 18px 22px;display:flex;flex-direction:column;justify-content:center;background:#fff}
.eposh-vz-card__eyebrow{display:inline-block;font-size:11px;font-weight:700;letter-spacing:.08em;text-transform:uppercase;color:#0089cf;margin-bottom:8px}
.eposh-vz-card__title{margin:0 0 10px;font-size:clamp(1.1rem,1rem + .4vw,1.35rem);line-height:1.35;font-weight:800;color:#0f172a}
.eposh-vz-card__lead{margin:0 0 14px;font-size:15px;line-height:1.6;color:#475569}
.eposh-vz-card__points{margin:0 0 16px;padding:0;list-style:none}
.eposh-vz-card__points li{display:flex;align-items:flex-start;gap:10px;padding-left:0;margin-bottom:8px;font-size:14px;line-height:1.5;color:#334155;list-style:none}
.eposh-vz-card__points li::marker{content:none}
.eposh-vz-card__points li::before{content:"";flex:0 0 8px;width:8px;height:8px;margin-top:6px;border-radius:50%;background:#0089cf;border:none;transform:none;position:static}
.eposh-vz-card__note{margin:0;font-size:13px;line-height:1.5;color:#64748b;font-style:italic}
.eposh-vz-card__actions{margin-top:18px}
.eposh-vz-card--no-cta .eposh-vz-card__body::after{content:"";display:block;flex-shrink:0;margin-top:18px;min-height:38px}
.eposh-vz-card__accordion{margin:0 0 12px}
.eposh-vz-card__accordion section{border:none}
.eposh-vz-card__accordion-header{margin:0;padding:0;border:0;background:transparent;font-size:13px;font-weight:700;line-height:1.2;color:#0f766e}
.eposh-vz-card__extra{padding-top:8px}
.eposh-vz-card__btn{display:inline-block;padding:10px 22px;font-size:14px;font-weight:700;line-height:1.3;color:#002a38;background:#e8f2f5;border:1px solid rgba(0,42,56,.22);border-radius:8px;text-decoration:none}
.eposh-vz-cta{text-align:center;margin-top:32px}
.eposh-vz-cta__lead{margin:0 0 14px;font-size:18px;font-weight:600;color:#0f172a}
.eposh-vz-cta__btn{display:inline-block;padding:11px 22px;border-radius:8px;background:#002a38;color:#fff;font-weight:700;font-size:15px;text-decoration:none}
@media (max-width:767px){
#eposh-vz .eposh-vz-card__media{min-height:240px}
#eposh-vz .eposh-vz-card__player,#eposh-vz .eposh-vz-card__player>iframe{min-height:240px}
}
@media (min-width:768px) and (max-width:991.98px){
#eposh-vz{padding:40px 20px 48px}
.eposh-vz-head{margin-bottom:24px}
.eposh-vz-head__lead{font-size:15px}
.eposh-vz-list{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:16px;align-items:stretch;max-width:740px;margin-left:auto;margin-right:auto}
.eposh-vz-card{border-radius:14px;box-shadow:0 6px 18px rgba(15,23,42,.06)}
.eposh-vz-card:nth-child(3){grid-column:1/-1;max-width:460px;width:100%;justify-self:center}
}
@media (min-width:992px){
.eposh-vz-card__inner{flex-direction:row;min-height:320px}
.eposh-vz-card--media-end .eposh-vz-card__inner{flex-direction:row-reverse}
.eposh-vz-card__media{flex:0 0 44%;max-width:44%;width:44%;align-self:stretch;display:flex;align-items:center}
#eposh-vz .eposh-vz-card__player{width:100%}
.eposh-vz-card__body{flex:1;min-width:0;padding:24px 28px 24px 24px}
.eposh-vz-card--media-end .eposh-vz-card__body{padding:24px 24px 24px 28px}
}
