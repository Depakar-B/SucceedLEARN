<?php
/**
 * Home page base styles.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
.sl-home{overflow-x:hidden}
.sl-section{padding:24px 16px}
.sl-section--alt{background:#F7F7F7}
.sl-wrap{max-width:1100px;margin:0 auto}
.sl-eyebrow{display:inline-block;color:#F04E23;font-size:15px;font-weight:500;letter-spacing:normal;text-transform:none;margin:0 0 10px}
.sl-h2{margin:0 0 14px;font-size:28px;line-height:1.25;color:#1F2C56}
.sl-lead{margin:0 0 24px;font-size:16px;line-height:1.6;color:#4a5568}
.sl-btn{display:inline-block;padding:12px 20px;border-radius:8px;font-weight:700;text-decoration:none;font-size:15px;font-family:inherit;cursor:pointer;border:0}
button.sl-btn{-webkit-appearance:none;appearance:none}
.sl-btn--primary{background:#F04E23;color:#fff}
.sl-btn--secondary{background:#1F2C56;color:#fff;margin-left:8px}
.sl-btn--ghost{background:transparent;color:#fff;border:1px solid rgba(255,255,255,.55);margin-left:8px}
.sl-card{background:#fff;border:1px solid #e8eaf0;border-radius:14px;padding:20px}
.sl-grid-2{display:grid;gap:16px}
.sl-grid-3{display:grid;gap:16px}
.sl-grid-4{display:grid;gap:14px}
.sl-grid-3--outcomes{grid-template-columns:1fr}
.sl-grid-4.sl-steps{grid-template-columns:1fr}
@media(min-width:700px){
.sl-grid-2{grid-template-columns:1fr 1fr}
.sl-grid-2 > .sl-platform-card--cta:last-child:nth-child(odd){grid-column:span 2}
.sl-grid-3{grid-template-columns:1fr 1fr 1fr}
.sl-grid-3 > .sl-platform-card--cta:last-child:nth-child(3n+2){grid-column:span 2}
.sl-grid-3--outcomes{grid-template-columns:1fr 1fr}
.sl-grid-3--outcomes > :nth-child(3){grid-column:1 / -1}
.sl-grid-4.sl-steps{grid-template-columns:1fr 1fr}
.sl-h2{font-size:34px}
}
@media(min-width:1000px){
.sl-grid-3--outcomes{grid-template-columns:1fr 1fr 1fr}
.sl-grid-3--outcomes > :nth-child(3){grid-column:auto}
.sl-grid-4.sl-steps{grid-template-columns:1fr 1fr 1fr 1fr}
}
