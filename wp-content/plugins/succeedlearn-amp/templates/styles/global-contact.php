<?php
/**
 * Shared AMP contact actions — email + WhatsApp chips (desktop .sl-contact-btn look).
 *
 * Also keeps legacy .sl-gwct-contact-* markup aligned with the same UI.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
.sl-contact-actions{
	display:flex;
	flex-direction:column;
	flex-wrap:nowrap;
	align-items:stretch;
	gap:12px;
	margin-top:20px;
	max-width:100%
}
.sl-contact-btn{
	box-sizing:border-box;
	display:inline-flex;
	align-items:center;
	gap:10px;
	flex:none;
	width:100%;
	min-width:0;
	min-height:56px;
	padding:10px 16px;
	border:1px solid transparent;
	border-radius:12px;
	text-decoration:none;
	max-width:100%
}
.sl-contact-btn__stack{
	display:flex;
	flex-direction:column;
	justify-content:center;
	gap:2px;
	min-width:0
}
.sl-contact-btn__label{
	font-size:13px;
	font-weight:700;
	line-height:1.25
}
.sl-contact-btn__value{
	font-size:15px;
	font-weight:700;
	line-height:1.3;
	word-break:break-word
}
.sl-contact-btn__icon{
	display:inline-flex;
	align-items:center;
	justify-content:center;
	flex:0 0 auto;
	color:currentColor
}
.sl-contact-btn__icon svg{
	display:block;
	width:22px;
	height:22px
}
.sl-contact-btn--email{
	border-color:rgba(107,124,147,.28);
	background:transparent
}
.sl-contact-btn--email .sl-contact-btn__label{
	color:var(--sl-page-muted,#6B7C93);
	font-size:12px;
	font-weight:600
}
.sl-contact-btn--email .sl-contact-btn__value{
	color:var(--sl-page-navy,#16234e)
}
.sl-contact-btn--whatsapp{
	border-color:#25d366;
	background:#25d366;
	color:#fff!important;
	box-shadow:0 12px 28px rgba(37,211,102,.28)
}
.sl-contact-btn--whatsapp .sl-contact-btn__label,
.sl-contact-btn--whatsapp .sl-contact-btn__value,
.sl-contact-btn--whatsapp .sl-contact-btn__icon,
.sl-contact-btn--whatsapp:visited,
.sl-contact-btn--whatsapp:visited .sl-contact-btn__label,
.sl-contact-btn--whatsapp:visited .sl-contact-btn__value,
.sl-contact-btn--whatsapp:visited .sl-contact-btn__icon{
	color:#fff!important
}
.sl-contact-btn--whatsapp .sl-contact-btn__label{
	font-size:20px;
	font-weight:700;
	line-height:1.25
}

/* Legacy GWCT / FCP contact chips → same email + WhatsApp look */
.sl-gwct-contact-direct,
.sl-sa-contact-direct{
	margin-top:16px;
	max-width:100%
}
.sl-gwct-contact-direct__label{
	margin:0 0 12px;
	color:var(--sl-page-muted,#6B7C93);
	font-size:14px;
	font-weight:500;
	line-height:1.5
}
.sl-gwct-contact-direct__grid,
.sl-sa-contact-direct{
	display:flex;
	flex-wrap:wrap;
	align-items:stretch;
	gap:12px;
	width:100%;
	max-width:100%;
	box-sizing:border-box
}
.sl-gwct-contact-direct__item,
.sl-sa-contact__email{
	box-sizing:border-box;
	display:inline-flex;
	align-items:center;
	gap:10px;
	min-height:56px;
	padding:10px 16px;
	border:1px solid rgba(107,124,147,.28);
	border-radius:12px;
	background:transparent;
	text-decoration:none;
	color:inherit;
	max-width:100%
}
.sl-gwct-contact-direct__icon{
	display:none
}
.sl-gwct-contact-direct__body,
.sl-sa-contact__email-text{
	display:flex;
	flex-direction:column;
	justify-content:center;
	gap:2px;
	min-width:0
}
.sl-gwct-contact-direct__title,
.sl-sa-contact__email-label{
	color:var(--sl-page-muted,#6B7C93);
	font-size:12px;
	font-weight:600;
	line-height:1.25;
	text-transform:none;
	letter-spacing:0
}
.sl-gwct-contact-direct__value,
.sl-sa-contact__email-value{
	color:var(--sl-page-navy,#16234e);
	font-size:15px;
	font-weight:700;
	line-height:1.3;
	word-break:break-word
}
.sl-gwct-contact__whatsapp,
.sl-sa-contact__whatsapp{
	box-sizing:border-box;
	display:inline-flex;
	align-items:center;
	gap:10px;
	min-height:56px;
	padding:10px 16px;
	border:1px solid #25d366;
	border-radius:12px;
	background:#25d366;
	color:#fff!important;
	text-decoration:none;
	box-shadow:0 12px 28px rgba(37,211,102,.28);
	max-width:100%
}
.sl-gwct-contact__whatsapp-icon,
.sl-sa-contact__whatsapp-icon{
	display:inline-flex;
	align-items:center;
	justify-content:center;
	flex:0 0 auto;
	width:22px;
	height:22px;
	color:#fff!important
}
.sl-gwct-contact__whatsapp-icon svg,
.sl-sa-contact__whatsapp-icon svg{
	display:block;
	width:22px;
	height:22px;
	fill:currentColor
}
.sl-gwct-contact__whatsapp-text,
.sl-sa-contact__whatsapp-text{
	display:flex;
	flex-direction:column;
	justify-content:center;
	gap:2px;
	min-width:0;
	color:#fff!important
}
.sl-gwct-contact__whatsapp-label,
.sl-sa-contact__whatsapp-label,
.sl-gwct-contact__whatsapp:visited,
.sl-gwct-contact__whatsapp:visited .sl-gwct-contact__whatsapp-label,
.sl-sa-contact__whatsapp:visited,
.sl-sa-contact__whatsapp:visited .sl-sa-contact__whatsapp-label{
	color:#fff!important;
	font-size:20px;
	font-weight:700;
	line-height:1.25;
	opacity:1
}
.sl-gwct-contact__whatsapp-number,
.sl-sa-contact__whatsapp-number{
	display:none
}
@media(min-width:768px){
	.sl-contact-actions{
		flex-direction:row;
		flex-wrap:nowrap;
		align-items:stretch;
		gap:12px
	}
	.sl-contact-actions .sl-contact-btn{
		flex:1 1 0;
		width:auto;
		min-width:0
	}
}
@media(max-width:767px){
	.sl-contact-actions{
		flex-direction:column;
		gap:10px
	}
	.sl-contact-actions .sl-contact-btn{
		flex:none;
		width:100%;
		justify-content:flex-start
	}
	.sl-gwct-contact-direct__grid,
	.sl-sa-contact-direct{gap:10px}
	.sl-gwct-contact-direct__item,
	.sl-gwct-contact__whatsapp,
	.sl-sa-contact__email,
	.sl-sa-contact__whatsapp{width:100%;justify-content:flex-start}
}
