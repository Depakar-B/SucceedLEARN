<?php
/**
 * Contact form styles.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
.scf-form-wrap{
	--scf-brand:#ea3f23;
	--scf-brand-hover:#d2361c;
	--scf-text:#0f172a;
	--scf-muted:#64748b;
	--scf-border:#d7e3ef;
	--scf-input-bg:#fff;
	max-width:520px;
	margin:0 auto;
	padding:24px 20px;
	box-sizing:border-box;
	background:transparent;
	border:1px solid var(--scf-border);
	border-radius:14px;
	box-shadow:0 8px 28px rgba(234,63,35,.08)
}
.scf-form-wrap.scf-form-wrap-course{
	max-width:none;
	width:100%;
	background:transparent;
	border:none;
	border-radius:0;
	box-shadow:none
}
.scf-form{margin:0}
.scf-field{margin-bottom:14px;display:flex;flex-direction:column}
.scf-field label{font-weight:600;color:var(--scf-text);margin-bottom:6px;font-size:14px;line-height:1.3}
.scf-required{color:#dc2626;margin-left:2px}
.scf-field input:not([type="checkbox"]):not([type="radio"]),.scf-field textarea,.scf-field select{
	width:100%;
	box-sizing:border-box;
	border:1px solid var(--scf-border);
	border-radius:8px;
	padding:12px 14px;
	font:inherit;
	background:var(--scf-input-bg);
	color:var(--scf-text)
}
.scf-field textarea{resize:vertical;min-height:90px}
.scf-field input:focus,.scf-field textarea:focus,.scf-field select:focus{
	outline:none;
	border-color:var(--scf-brand);
	box-shadow:0 0 0 3px rgba(234,63,35,.12)
}
.scf-interest-group{display:grid;grid-template-columns:1fr;gap:8px}
@media(min-width:700px){.scf-interest-group{grid-template-columns:1fr 1fr}}
.scf-interest-option{display:flex;align-items:flex-start;gap:8px}
.scf-interest-option label{margin:0;font-size:14px;font-weight:400}
.scf-helper-text{margin-top:6px;font-size:12px;line-height:1.4;color:#4b5563}
.scf-checkbox{display:flex;flex-direction:row;align-items:flex-start;gap:8px;margin-bottom:12px}
.scf-checkbox input[type="checkbox"]{margin-top:3px;flex-shrink:0}
.scf-checkbox label{margin:0;font-size:12px;line-height:1.4;color:var(--scf-muted);font-weight:400}
.scf-checkbox a{color:var(--scf-brand);font-weight:600;text-decoration:none}
.scf-checkbox a:hover{text-decoration:underline}
.scf-submit{
	width:100%;
	border:0;
	border-radius:9px;
	padding:13px 16px;
	margin-top:20px;
	font-size:16px;
	font-weight:700;
	background:var(--scf-brand);
	color:#fff;
	box-shadow:0 6px 16px rgba(234,63,35,.22)
}
.scf-submit[disabled]{opacity:.7}
.scf-error-message{display:block;color:#dc2626;font-size:12px;line-height:1.4;margin-top:6px}
.scf-recaptcha-notice{margin:10px 0;font-size:11px;line-height:1.35;color:#94a3b8}
.scf-lightbox-overlay{
	position:fixed;
	inset:0;
	display:flex;
	align-items:center;
	justify-content:center;
	padding:16px;
	background:rgba(15,23,42,.58)
}
.scf-lightbox-content{
	width:100%;
	max-width:420px;
	background:#fff;
	border-radius:14px;
	padding:22px 18px;
	text-align:center;
	box-shadow:0 14px 40px rgba(15,23,42,.22)
}
.scf-lightbox-icon{
	width:52px;
	height:52px;
	margin:0 auto 12px;
	display:flex;
	align-items:center;
	justify-content:center;
	font-size:24px;
	border-radius:999px;
	background:#eef2ff
}
.scf-lightbox-success .scf-lightbox-icon{background:#dcfce7;color:#15803d}
.scf-lightbox-error .scf-lightbox-icon{background:#fee2e2;color:#b91c1c}
.scf-lightbox-title{font-size:20px;line-height:1.3;font-weight:700;color:#0f172a;margin-bottom:8px}
.scf-lightbox-message{font-size:14px;line-height:1.55;color:#475569;margin-bottom:16px}
.scf-lightbox-button{
	border:0;
	border-radius:8px;
	padding:11px 18px;
	font-size:14px;
	font-weight:700;
	background:#ea3f23;
	color:#fff
}
.scf-honeypot{position:absolute;left:-9999px;width:1px;height:1px;overflow:hidden;opacity:0;pointer-events:none}
.screen-reader-text{
	position:absolute;
	width:1px;
	height:1px;
	padding:0;
	margin:-1px;
	overflow:hidden;
	clip:rect(0,0,0,0);
	white-space:nowrap;
	border:0
}
