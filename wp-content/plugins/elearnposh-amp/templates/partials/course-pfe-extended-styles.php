<?php
/**
 * Extended .pfe styles for video-hero, outcomes, CTA, and HEI sections.
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
html{scroll-padding-top:200px}
#posh-live-action,#eposh-bytes{scroll-margin-top:200px}
.pfe-sub-wide{max-width:100%}
.pfe-info-panel{background:#fff;border:0;border-radius:14px;padding:22px;box-shadow:0 8px 24px rgba(11,35,58,.08)}
.pfe-why-grid{display:grid;grid-template-columns:1fr;gap:16px;align-items:center}
.pfe-why-grid > *{min-width:0}
.pfe-details-grid{margin-top:22px}
.pfe-details-panel{background:linear-gradient(180deg,#fff 0%,#f8fbff 100%);border:1px solid var(--line);border-radius:16px;padding:20px 18px;height:100%}
.pfe-details-panel-title{margin-bottom:0;font-size:clamp(1.25rem,1rem + .6vw,1.55rem)}
.pfe-tick-list{list-style:none;margin:14px 0 0;padding:0;display:grid;gap:10px}
.pfe-tick-list li{display:flex;align-items:center;gap:12px;padding:14px 16px;border:1px solid var(--line);border-radius:12px;background:#fafbfd;color:#2f4358;font-weight:600;line-height:1.45}
.pfe-tick-icon{flex:0 0 26px;width:26px;height:26px;border-radius:50%;background:linear-gradient(135deg,#0d73d4 0%,#2f90ef 100%);display:inline-flex;align-items:center;justify-content:center;box-shadow:0 4px 10px rgba(13,115,212,.28)}
.pfe-tick-icon::after{content:"";width:7px;height:11px;border:solid #fff;border-width:0 2.5px 2.5px 0;transform:rotate(45deg);margin-top:-2px}
.pfe-details-cta{text-align:center;margin-top:20px}
.mgr-tick-icon{flex:0 0 20px;width:20px;height:20px;border-radius:50%;background:linear-gradient(135deg,#0a9a74 0%,#14b88a 100%);display:inline-flex;align-items:center;justify-content:center;box-shadow:0 3px 8px rgba(10,154,116,.22);margin-top:1px}
.mgr-tick-icon::after{content:"";width:5px;height:8px;border:solid #fff;border-width:0 2px 2px 0;transform:rotate(45deg);margin-top:-1px}
.mgr-outcomes-card{padding:22px}
.mgr-outcomes-title{width:100%;margin:0 0 20px}
.mgr-outcomes-body{display:grid;grid-template-columns:1fr;gap:24px;align-items:start}
.mgr-outcomes-body--no-video{grid-template-columns:1fr}
.mgr-outcomes-list{margin:0;gap:8px;display:grid}
.mgr-outcomes-list li{display:flex;align-items:flex-start;gap:10px;padding:10px 12px;border:1px solid #e8f0f8;border-radius:10px;background:#fafcfd;color:#4a6278;font-size:15px;line-height:1.5}
.mgr-outcomes-list li::before{content:none}
.mgr-outcomes-video{background:#fff;border:1px solid #d7e8fb;border-radius:14px;box-shadow:0 10px 24px rgba(12,42,72,.1);padding:8px;width:100%;max-width:560px;min-width:0;margin:0 auto}
.mgr-outcomes-video .pfe-video{margin-top:0;border:0;box-shadow:none;border-radius:10px;overflow:hidden}
.pfe-learning-outcomes{margin-top:24px;margin-bottom:24px;padding:22px;border:1px solid var(--line);border-radius:14px;background:linear-gradient(180deg,#fff 0%,#f8fbff 100%);box-shadow:0 8px 24px rgba(11,35,58,.08)}
.pfe-learning-outcomes + h3,.pfe-learning-outcomes + h4{margin-top:28px}
.pfe-learning-outcomes__title{margin:0 0 8px;font-size:1.12rem;font-weight:700;color:#10273f;line-height:1.35}
.pfe-learning-outcomes__intro{margin:0 0 16px;color:var(--muted);font-size:16px;line-height:1.7}
.pfe-learning-outcomes__list{list-style:none;margin:0;padding:0;display:grid;gap:8px}
.pfe-learning-outcomes__list--split{grid-template-columns:repeat(2,minmax(0,1fr))}
.pfe-learning-outcomes__list li{display:flex;align-items:flex-start;gap:10px;padding:10px 12px;border:1px solid #e8f0f8;border-radius:10px;background:#fafcfd;color:#4a6278;font-size:15px;line-height:1.5}
.pfe-learning-outcomes__list li::before{content:none}
.pfe-learning-outcomes__tick{flex:0 0 20px;width:20px;height:20px;border-radius:50%;background:linear-gradient(135deg,#0a9a74 0%,#14b88a 100%);display:inline-flex;align-items:center;justify-content:center;box-shadow:0 3px 8px rgba(10,154,116,.22);margin-top:1px}
.pfe-learning-outcomes__tick::after{content:"";width:5px;height:8px;border:solid #fff;border-width:0 2px 2px 0;transform:rotate(45deg);margin-top:-1px}
.pfe-bullet-content .pfe-learning-outcomes{margin-left:0}
.pfe-card-list{list-style:none;margin:12px 0 16px;padding:0;display:grid;gap:12px}
.pfe-card-list--split{grid-template-columns:repeat(2,minmax(0,1fr))}
.pfe-card-list__item{display:flex;align-items:center;gap:12px;min-height:76px;padding:12px 14px;border:1px solid #dce8f6;border-radius:12px;background:linear-gradient(180deg,#fff 0%,#fbfdff 100%);box-shadow:0 8px 18px rgba(12,42,72,.08)}
.pfe-card-list__icon{flex:0 0 52px;width:52px;height:52px;border-radius:12px;display:inline-flex;align-items:center;justify-content:center}
.pfe-card-list__content{flex:1;min-width:0;color:#10273f;font-size:1rem;font-weight:700;line-height:1.45}
.pfe-hero-media{width:100%;min-width:0}
.pfe-video{width:100%;border-radius:18px;overflow:hidden;border:1px solid var(--line);box-shadow:0 8px 24px rgba(11,35,58,.08);background:#000}
.pfe-cta-band{text-align:center;background:linear-gradient(125deg,#f7fbff 0%,#eff7ff 50%,#f4fffa 100%);border:1px solid #d7e8fb;border-radius:18px;padding:22px;box-shadow:0 12px 28px rgba(12,42,72,.1)}
.pfe-cta-band .pfe-title{margin-bottom:10px}
.pfe-cta-band p{margin:0 auto 18px;max-width:72ch;color:var(--muted);line-height:1.75}
.us-states-grid{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:10px;margin:14px 0 0;list-style:none;padding:0}
.us-states-grid li{border:1px solid var(--line);border-radius:10px;padding:12px 14px;background:#f7fbff;font-weight:600;color:#2f4358;text-align:center;font-size:15px}
.pocso-outcomes-card{padding:22px}
.pocso-outcomes-title{margin:0 0 18px}
.pocso-outcomes-list{list-style:none;margin:0;padding:0;display:grid;gap:0;border:1px solid var(--line);border-radius:14px;overflow:hidden;background:linear-gradient(180deg,#fff 0%,#f8fbff 100%)}
.pocso-outcomes-list>li{display:flex;align-items:flex-start;gap:14px;margin:0;padding:16px 18px;border-bottom:1px solid #eef3f8;color:#2f4358;font-size:15px;font-weight:600;line-height:1.55}
.pocso-outcomes-list>li:last-child{border-bottom:0}
.pocso-outcomes-tick{flex:0 0 24px;width:24px;height:24px;margin-top:1px;border-radius:50%;background:linear-gradient(135deg,#0d73d4 0%,#2f90ef 100%);display:inline-flex;align-items:center;justify-content:center;box-shadow:0 4px 10px rgba(13,115,212,.24)}
.pocso-outcomes-tick::after{content:"";width:6px;height:10px;border:solid #fff;border-width:0 2.5px 2.5px 0;transform:rotate(45deg);margin-top:-2px}
.pocso-outcomes-text{flex:1;min-width:0}
.hei-compliance-stack{margin:18px 0 24px;display:grid;gap:14px}
.hei-compliance-card{display:grid;grid-template-columns:56px minmax(0,1fr);gap:16px 20px;align-items:center;padding:20px 22px;border:1px solid #e5e7eb;border-radius:14px;background:linear-gradient(135deg,#fafbfd 0%,#fff 100%);box-shadow:0 6px 16px rgba(12,42,72,.06)}
.hei-compliance-card--posh{border-left:4px solid #0d73d4}
.hei-compliance-card--ugc{border-left:4px solid #0a9a74}
.hei-compliance-card--aicte{border-left:4px solid #5b6fd6}
.hei-compliance-icon{width:56px;height:56px;border-radius:14px;display:inline-flex;align-items:center;justify-content:center;color:#fff;box-shadow:0 6px 16px rgba(13,115,212,.22)}
.hei-compliance-icon svg{width:28px;height:28px;stroke:currentColor;fill:none;stroke-width:2;stroke-linecap:round;stroke-linejoin:round}
.hei-compliance-icon--posh{background:linear-gradient(135deg,#0d73d4 0%,#2f90ef 100%)}
.hei-compliance-icon--ugc{background:linear-gradient(135deg,#0a9a74 0%,#14b88a 100%);box-shadow:0 6px 16px rgba(10,154,116,.22)}
.hei-compliance-icon--aicte{background:linear-gradient(135deg,#5b6fd6 0%,#7b8cef 100%);box-shadow:0 6px 16px rgba(91,111,214,.22)}
.hei-compliance-body{min-width:0}
.hei-compliance-meta{margin-bottom:10px}
.hei-compliance-year{display:inline-flex;padding:4px 10px;border-radius:999px;background:#f0f4f8;border:1px solid #dbe3ec;color:#4a5568;font-size:12px;font-weight:700}
.hei-compliance-card h3{margin:0 0 8px;font-size:1.05rem;font-weight:700;color:#111927;line-height:1.45}
.hei-compliance-card p{margin:0;color:#4a5568;font-size:15px;line-height:1.7}
.hei-point-grid{list-style:none;margin:14px 0 0;padding:0;display:grid;gap:16px}
.hei-point-grid--3{grid-template-columns:1fr}
.hei-point-grid--2{grid-template-columns:1fr}
.hei-point-grid li{border:1px solid #e5e7eb;border-radius:14px;padding:22px 20px;background:#fff;margin:0;display:flex;flex-direction:column;gap:14px;box-shadow:0 8px 22px rgba(12,42,72,.07)}
.hei-point-icon{width:48px;height:48px;border-radius:14px;display:inline-flex;align-items:center;justify-content:center;color:#fff;box-shadow:0 6px 16px rgba(13,115,212,.22)}
.hei-point-icon svg{width:24px;height:24px;stroke:currentColor;fill:none;stroke-width:2;stroke-linecap:round;stroke-linejoin:round}
.hei-point-icon--curriculum{background:linear-gradient(135deg,#0d73d4 0%,#2f90ef 100%)}
.hei-point-icon--learning{background:linear-gradient(135deg,#0a9a74 0%,#14b88a 100%)}
.hei-point-icon--cert{background:linear-gradient(135deg,#5b6fd6 0%,#7b8cef 100%)}
.hei-point-icon--staff{background:linear-gradient(135deg,#0c5fae 0%,#2f90ef 100%)}
.hei-point-icon--students{background:linear-gradient(135deg,#0a7a5c 0%,#14b88a 100%)}
.hei-point-body h3{margin:0;font-size:1rem;font-weight:700;color:#10273f;line-height:1.35}
.hei-point-body p{margin:0;color:var(--muted);font-size:15px;line-height:1.65}
.pfe-card-list__icon amp-img{display:block}
.pfe-title--plans{font-size:clamp(1.2rem,1rem + .7vw,1.55rem);line-height:1.25;font-weight:500}
.pfe-inline-highlight{font-weight:800;white-space:normal}
.pfe-inline-highlight--foundation{color:#1e88d8}
.pfe-inline-highlight--pro{color:#0a9a74}
.pfe-plan-sections{margin-top:20px;display:grid;gap:18px}
.pfe-plan-box{background:#fff;border:1px solid #dce8f6;border-radius:16px;box-shadow:0 10px 26px rgba(12,42,72,.08);padding:20px}
#posh-foundation-plan,#posh-pro-plan{background:transparent;border:0;border-radius:0;box-shadow:none;padding:0}
.pfe-plan-box h2{margin:0 0 10px;font-size:clamp(1.15rem,1.05rem + .35vw,1.35rem);line-height:1.3;font-weight:600;color:#10273f}
#posh-foundation-plan h2,.pfe-plan-title--foundation{color:#1e88d8}
#posh-pro-plan h2,.pfe-plan-title--pro{color:#0a9a74}
.pfe-plan-box h3{margin:0 0 10px;font-size:clamp(1.12rem,.98rem + .45vw,1.35rem);line-height:1.3;color:#10273f}
.pfe-plan-box h4{margin:18px 0 10px;font-size:1.02rem;line-height:1.4;color:#10273f}
.pfe-plan-box p{margin:0 0 12px;line-height:1.78;color:#2f4358}
.pfe-info-panel--plain{background:transparent;border:0;border-radius:0;box-shadow:none;padding:0}
.pfe-advanced-list{list-style:none;padding:0;margin:12px 0 14px;display:grid;gap:14px}
.pfe-advanced-list>li{margin:0;padding:22px;list-style:none;border:1px solid #dce8f6;border-radius:14px;background:linear-gradient(180deg,#fff 0%,#fbfdff 100%);box-shadow:0 10px 24px rgba(12,42,72,.08)}
.pfe-advanced-list>li::before{content:none}
.pfe-advanced-list>li>h3{margin:0 0 10px;font-size:clamp(1.12rem,1.06rem + .35vw,1.42rem);font-weight:700;color:#10273f}
.pfe-advanced-list>li>p{margin:0;color:#2f4358;line-height:1.75}
.pfe-advanced-list--compact{grid-template-columns:1fr}
.pfe-advanced-list .pfe-bullet-content{margin-top:10px;margin-left:0}
.pfe-advanced-list .pfe-plan-feature-grid{margin-top:12px;align-items:start}
.pfe-advanced-list .pfe-plan-feature-grid .pfe-bullet-content{margin-top:0}
.pfe-advanced-list .pfe-plan-feature-grid .pfe-why-gallery{margin-top:0;width:100%}
.pfe-eposh-bytes{margin-top:12px}
.pfe-eposh-bytes__grid{grid-template-columns:1fr;align-items:start}
.pfe-eposh-bytes__copy{grid-column:1/-1;width:100%;display:flex;flex-direction:column;justify-content:flex-start;min-height:0}
.pfe-eposh-bytes__copy>h3{margin:0 0 14px;line-height:1.3}
.pfe-eposh-bytes__intro{margin:0;max-width:100%;width:100%}
.pfe-eposh-bytes__points{margin:0 0 14px;padding:0;list-style:none}
.pfe-eposh-bytes__points li{margin:0;padding:0;text-align:left;line-height:1.65}
.pfe-eposh-bytes__gallery{grid-column:1/-1;margin-top:16px;width:100%;max-width:none;justify-self:start;justify-items:start;align-items:center;margin-left:0;margin-right:auto}
.pfe-eposh-bytes>.pfe-bullet-content{margin-top:20px;margin-left:0}
.pfe-why-cards{list-style:none;margin:20px 0 0;padding:0;display:grid;grid-template-columns:1fr;gap:12px}
.pfe-why-card{list-style:none;margin:0;min-height:100%;display:flex;align-items:flex-start;gap:14px;padding:16px;border:1px solid #dce8f6;border-radius:14px;background:linear-gradient(180deg,#fff 0%,#f8fbff 100%);box-shadow:0 8px 20px rgba(12,42,72,.07);border-left:4px solid var(--card-accent,#1e88d8)}
.pfe-why-card__num{flex:0 0 36px;width:36px;height:36px;border-radius:50%;background:var(--card-accent,#1e88d8);color:#fff;font-size:11px;font-weight:800;display:inline-flex;align-items:center;justify-content:center;box-shadow:0 4px 12px rgba(11,35,58,.14)}
.pfe-why-card__text{margin:0;padding-top:6px;font-size:15px;font-weight:600;line-height:1.55;color:#173a5b}
.pfe-choose-timeline{margin:20px 0 0;position:relative}
.pfe-choose-timeline ul{list-style:none;margin:0;padding:0;position:relative}
.pfe-choose-timeline ul::before{content:"";position:absolute;left:16px;top:18px;bottom:18px;width:4px;background:#e4edf9;border-radius:999px}
.pfe-choose-step{list-style:none;margin:0;position:relative;padding:0 0 20px;display:flex;align-items:flex-start;gap:14px}
.pfe-choose-step:last-child{padding-bottom:0}
.pfe-choose-dot{position:relative;flex:0 0 36px;width:36px;height:36px;margin-top:16px;border-radius:50%;border:2px solid #b9cce3;background:#f3f8ff;box-shadow:0 0 0 6px #fff;color:#7f97b1;font-size:10px;font-weight:700;display:inline-flex;align-items:center;justify-content:center;z-index:2}
.pfe-choose-card{flex:1;min-width:0;border:1px solid #dce8f6;border-radius:12px;background:#fff;box-shadow:0 8px 18px rgba(12,42,72,.08);color:#2f4358;line-height:1.72;padding:16px 18px;opacity:1;transform:none}
.pfe-choose-card--stack{display:block;min-height:0}
.pfe-choose-card--stack h3{margin:0 0 8px;font-size:1.05rem;font-weight:800;line-height:1.4;color:#10273f}
.pfe-choose-card--stack p{margin:0;font-size:.97rem;line-height:1.65;color:#2f4358}
.pfe-demo-cta{background:radial-gradient(420px 220px at 0% 0%,rgba(13,115,212,.12),transparent 70%),radial-gradient(360px 220px at 100% 100%,rgba(10,154,116,.12),transparent 70%),linear-gradient(125deg,#f7fbff 0%,#eff7ff 50%,#f4fffa 100%);border:1px solid #d7e8fb;border-radius:22px;box-shadow:0 16px 34px rgba(12,42,72,.12);padding:clamp(18px,3vw,30px);display:grid;grid-template-columns:1fr;gap:14px;align-items:start}
.pfe-demo-copy{text-align:left}
.pfe-demo-chip{display:inline-flex;align-items:center;gap:8px;padding:7px 12px;margin-bottom:12px;border-radius:999px;border:1px solid #c5ddf9;background:#eaf4ff;color:#0c5fae;font-size:12px;font-weight:700;letter-spacing:.01em}
.pfe-demo-cta h2{margin:0 0 12px;font-size:clamp(1.35rem,1.1rem + .9vw,1.95rem);line-height:1.2;color:#10273f}
.pfe-demo-cta p{margin:0;max-width:74ch;color:#2f4358;line-height:1.8}
.pfe-demo-actions{display:flex;align-items:center;justify-content:flex-start}
.pfe-demo-video{background:#fff;border:1px solid #d7e8fb;border-radius:14px;box-shadow:0 10px 24px rgba(12,42,72,.1);overflow:hidden}
.pfe-demo-video amp-youtube{display:block}
.hei-section-gap{margin-top:28px}
<?php
$ep_faq_accordion_styles = ELEARNPOSH_AMP_TEMPLATES_DIR . 'partials/faq-accordion-styles.php';
if ( is_readable( $ep_faq_accordion_styles ) ) {
	include $ep_faq_accordion_styles;
}
?>
@media (min-width:641px){.pfe-why-grid > .pfe-why-gallery{grid-column:1/-1;max-width:none;margin:0;width:100%}.pfe-eposh-bytes__grid > .pfe-why-gallery{grid-column:1/-1;max-width:none;margin:0;width:100%}.pfe-card-list--split{grid-template-columns:repeat(2,minmax(0,1fr))}.pfe-learning-outcomes__list--split{grid-template-columns:repeat(2,minmax(0,1fr))}.pfe-why-cards{grid-template-columns:repeat(2,minmax(0,1fr));gap:16px}.pfe-advanced-list--compact{grid-template-columns:repeat(2,minmax(0,1fr))}.pfe-demo-cta:not(.pfe-demo-cta--center){grid-template-columns:1.1fr .9fr;gap:18px;text-align:left;align-items:center}.pfe-demo-cta:not(.pfe-demo-cta--center) .pfe-demo-video{grid-column:2;grid-row:1 / span 2}}
@media (min-width:641px) and (max-width:1200px){.hei-point-grid--2{grid-template-columns:repeat(2,minmax(0,1fr))}.hei-point-grid--3{grid-template-columns:repeat(2,minmax(0,1fr))}.hei-point-grid--3>li:nth-child(3){grid-column:1/-1;justify-self:center;width:min(100%,calc((100% - 16px)/2))}}
@media (min-width:641px) and (max-width:1024px){.pfe-why-grid > .pfe-why-gallery,.pfe-hero-grid > .pfe-why-gallery{grid-column:1/-1;width:100%;max-width:none;margin:0}}
@media (min-width:981px){.mgr-outcomes-body{grid-template-columns:minmax(0,1fr) minmax(0,1fr)}.pfe-why-grid{grid-template-columns:1.1fr .9fr}.pfe-why-grid > .pfe-why-gallery{grid-column:auto;max-width:none;margin:0}.pfe-eposh-bytes__grid{grid-template-columns:1fr}.pfe-eposh-bytes__grid > .pfe-why-gallery{grid-column:1/-1;max-width:none;margin:16px 0 0;width:100%}.pfe-why-cards{grid-template-columns:repeat(3,minmax(0,1fr))}.pfe-advanced-list--compact{grid-template-columns:repeat(3,minmax(0,1fr))}}
@media (min-width:1201px){.hei-point-grid--3{grid-template-columns:repeat(3,minmax(0,1fr))}.hei-point-grid--2{grid-template-columns:repeat(2,minmax(0,1fr))}}
@media (min-width:1025px){.pfe-hero-grid{grid-template-columns:1.1fr .9fr}}
@media (max-width:1024px){.pfe-plan-box h2,#posh-foundation-plan h2,.pfe-plan-title--foundation,#posh-pro-plan h2,.pfe-plan-title--pro{font-size:clamp(.95rem,.9rem + .2vw,1.05rem);font-weight:500;line-height:1.4}}
@media (max-width:640px){.us-states-grid{grid-template-columns:1fr}.hei-compliance-card{grid-template-columns:1fr;gap:12px;align-items:start}.hei-compliance-icon{width:52px;height:52px;align-self:start}.hei-compliance-icon svg{width:24px;height:24px}.hei-compliance-meta{margin-bottom:8px}.pfe-card.pocso-outcomes-card{padding:0;background:transparent;border:0;border-radius:0;box-shadow:none}.pfe-card-list--split{grid-template-columns:1fr}.pfe-learning-outcomes__list--split{grid-template-columns:1fr}.pfe-info-panel{padding:0;background:transparent;border:0;border-radius:0;box-shadow:none}.pfe-advanced-list>li,.pfe-advanced-list--compact>li,.pfe-eposh-bytes-item{padding:0;border:0;border-radius:0;background:transparent;box-shadow:none}}
