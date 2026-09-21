<?php
/**
 * Course Page Styles
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
/* Course Page Styles */
* {
	box-sizing: border-box;
	font-family: "Nunito Sans", sans-serif;
	transition: all 0.2s linear;
}

ul {
	list-style-type: none;
	padding: 0;
}

.title h1 {
	font-size: 23px;
	color: #002a38;
	text-align: center;
	padding: 0px 18px;
}

.description {
	padding: 0px 18px;
	color: #444444;
	font-size: 15px;
	line-height: 23px;
	margin-top: 5px;
}

.pricing-card {
	background-color: #4054b2;
	margin: 0 20px 0 20px;
	border-radius: 10px;
	padding: 20px 0 20px 0;
}

.pricing-img amp-img {
	width: 120px;
	text-align: center;
	margin: 0 auto;
	display: block;
}

.pricing-rate {
	text-align: center;
}

.pricing-rate h4 {
	color: #eabe2e;
	text-decoration: line-through;
	font-size: 25px;
	margin: 0;
	padding: 0;
}

.pricing-rate h2 {
	color: #fff;
	font-size: 36px;
	padding: 0;
	margin: 0;
}

.pricing-rate p {
	color: #ffffff;
	font-family: "Nunito Sans", sans-serif;
	font-size: 17px;
	font-weight: 300;
	text-transform: uppercase;
}

.pricing-rate .hrtag {
	border-top: 2px solid #fff;
	width: 100%;
	margin: 10px 0;
}

.pricing-rate .contact-us {
	padding: 10px 20px;
	margin: 11px 70px 10px 70px;
	background-color: #fff;
	color: #4054b2;
	border-radius: 4px;
	display: inline-block;
}

.pricing-rate .contact-us .request-demo {
	color: #4054b2;
	text-decoration: none;
	font-weight: 600;
}

.course-img {
	margin: 17px 0;
}

.course-screenshots-grid {
	display: grid;
	grid-template-columns: 1fr;
	gap: 12px;
	padding: 0 18px;
}

.course-screenshot-card {
	margin: 0;
	border-radius: 10px;
	overflow: hidden;
	box-shadow: 0 4px 14px rgba(0, 42, 56, 0.1);
	background: #fff;
}

.course-screenshot-card amp-img {
	display: block;
	width: 100%;
}

@media only screen and (min-width: 481px) {
	.course-screenshots-grid {
		grid-template-columns: repeat(2, minmax(0, 1fr));
	}
}

#about .list-content {
	padding-left: 15px;
	color: #5f6368;
	font-family: "Nunito Sans", sans-serif;
	font-size: 16px;
	font-weight: 400;
	font-style: normal;
	line-height: 1.4em;
	text-align: center;
}

#about .course-contents {
	margin-bottom: 20px;
	display: flex;
	align-items: flex-start;
}

#about .icons,
#about .icon-list,
#about .icon-clock,
#about .icon-users {
	color: #f9ab00;
	font-size: 20px;
	margin-right: 10px;
}

#about .icons-tick,
#about .icon-check {
	color: #23a455;
	font-size: 20px;
	margin-right: 10px;
}

#about .salient-content {
	padding-left: 15px;
	color: #5f6368;
	font-family: "Nunito Sans", sans-serif;
	font-size: 16px;
	font-weight: 400;
	font-style: normal;
	line-height: 1.4em;
}

#about h2 {
	text-align: center;
	font-size: 18px;
	color: #565981;
}

#highlights .list-highlights {
	padding: 0 50px;
	list-style-type: disc;
}

#highlights li {
	padding: 0 0 10px 0;
	line-height: 27px;
	color: #444444;
	font-size: 16px;
}

.hrtag-end {
	border-top: 2px solid #eee;
	width: 100%;
	margin: 20px 0;
}

.post-5390 .pricing-img amp-img {
	display: none;
}

.post-5390 .pricing-rate h4 {
	display: none;
}

.post-42 .pricing-img amp-img {
	display: none;
}

.post-42 .pricing-rate h4 {
	display: none;
}

.post-42 .posh-for-ic-des {
	padding-right: 0px;
	margin-right: 0px;
	padding-top: 40px;
}

.post-42 .posh-for-ic-des-head {
	color: #fa900f;
	font-family: "Nunito Sans", sans-serif;
	font-weight: 600;
	text-align: center;
	margin: 10px 0px;
	font-size: 18px;
}

.post-42 .posh-for-ic-main {
	font-size: 18px;
	text-align: center;
	color: white;
}

.post-42 .posh-for-ic {
	background: #002a38;
	padding: 13px 18px;
}

.post-42 section {
	background-color: white;
	padding: 10px;
	margin-bottom: 25px;
}

.post-42 .posh-for-ic-title {
	color: white;
	font-size: 17px;
	padding: 10px 6px;
	background: #002a38;
	text-align: center;
	border: none;
}

.post-42 .posh-for-ic-ui {
	margin: 17px 10px;
}

.post-42 .posh-for-ic-ui li {
	display: flex;
	margin-bottom: 10px;
}

.post-42 .posh-for-ic-ui li amp-img {
	margin-right: 10px;
}

.post-42 .posh-for-ic-ui li .main-text {
	font-size: 15px;
}

.post-42 .posh-for-ic-ui li .duration {
	font-size: 13px;
}

.post-42 .contact-us {
	padding: 0px 18px 13px 18px;
	text-align: center;
}

.post-42 .contact-us .request-demo {
	background: #002a38;
	padding: 7px 22px;
	color: white;
	text-decoration: none;
	border-radius: 4px;
	border: none;
	cursor: pointer;
	font-size: 16px;
	display: inline-block;
}

.post-42 #highlights {
	padding: 18px;
}

.post-42 #highlights h2 {
	text-align: center;
	font-size: 18px;
	color: #002a38;
}

.post-42 #highlights .list-highlights-ic-member {
	font-size: 18px;
	color: #002a38;
	padding: 18px;
	box-shadow: 0px 0px 8px #888;
}

.post-42 #highlights .list-highlights-ic-member li {
	display: flex;
	align-items: flex-start;
}

.post-42 #highlights .list-highlights-ic-member li .icon-check {
	color: #fa8b05;
	margin-right: 10px;
	margin-top: 5px;
	font-size: 18px;
}

.post-42 .bottom-text {
	font-size: 16px;
	color: #002a38;
	padding: 0px 18px;
	line-height: 23px;
	margin-top: 43px;
}

.post-42 .bottom-text a {
	color: #fa8b05;
	font-weight: bold;
	text-decoration: none;
}

.post-42 amp-youtube iframe {
	outline: 4px solid white;
	outline-offset: -4px;
}

.post-42 .posh-for-ic-des amp-img {
	margin-top: 20px;
}

.post-66 .posh-foundation {
	color: #2694c2;
	font-family: "Nunito Sans", sans-serif;
	font-size: 22px;
	font-weight: 600;
	margin: 15px 0 10px 0;
}

.post-66 .posh-for-ic-ui {
	padding-right: 0px;
	background-color: white;
	border: none;
	text-align: center;
	list-style: none;
	margin: 0;
	padding: 0;
}

.post-66 .posh-for-ic-ui li {
	list-style: none;
	margin-bottom: 30px;
	display: block;
}

.post-66 .posh-for-ic-ui amp-img {
	display: block;
	margin: 20px auto 10px auto;
}

.post-66 .posh-for-ic-ui h4 {
	margin: 15px 0 10px 0;
}

.post-66 .posh-for-ic-ui p.description {
	margin: 0 0 30px 0;
	padding: 0 15px;
	text-align: left;
}

.post-66 .posh-foundation-title {
	color: #2694c2;
	text-align: center;
	font-size: 30px;
	margin: 15px 0;
	background-color: #fff;
	border: 0px;
}

.text-center {
	text-align: center;
}

.post-8100 .posh-for-hei-sec-title,
.post-8244 .posh-for-pocso {
	font-size: 23px;
	color: #002a38;
	padding: 0px 18px;
}

.post-15159 .contact-us {
	text-align: center;
}

.post-15159 .contact-us .request-demo {
	background: #002a38;
	padding: 7px 22px;
	color: white;
	text-decoration: none;
	border-radius: 4px;
	border: none;
	cursor: pointer;
	font-size: 16px;
	display: inline-block;
}

.post-15159 .unconscious-course-dtls {
	background: #002a38;
	padding: 13px 18px;
	color: white;
	margin: 15px 0;
}

.post-15159 .unconscious-course-dtls span {
	font-size: 15px;
}

.post-15159 .unconscious-course-dtls li {
	padding: 0 0 10px 0;
	line-height: 27px;
	font-size: 16px;
}

.post-15159 .unconscious-course-dtls h1 {
	font-size: 23px;
	text-align: left;
	padding: 0px 18px;
}

.post-15159 .learningobject {
	background: #ecf4f6;
	padding: 13px 18px;
	color: white;
	margin: 15px 0;
}

.post-15159 .learningobject h1 {
	font-size: 23px;
	text-align: left;
	color: #012a38;
}

.post-15159 .learningobject span {
	font-size: 12px;
	color: #012a38;
}

.post-15159 #learning {
	background-color: #195265;
}

.post-15159 .learning-object-list {
	font-size: 18px;
	color: #002a38;
	padding: 18px;
}

.post-15159 #learning .learning-object-list li {
	display: flex;
	padding: 0 0 10px 0;
	line-height: 27px;
	color: #444444;
	font-size: 16px;
}

.post-15159 #learning .learning-object-list li .icon-check {
	color: #fa8b05;
	margin-right: 10px;
	margin-top: 5px;
	font-size: 18px;
}

.post-15159 #learning .learning-object-list li span:last-child {
	font-size: 13px;
	color: white;
}

.post-15159 .learningobject > div {
	margin-top: 15px;
	padding: 0 18px;
}

.post-15159 .learningobject > div span {
	font-size: 15px;
	color: #444444;
	line-height: 23px;
}

.post-15159 .faq {
	font-size: 20px;
	color: #195265;
	text-align: center;
}

.post-15159 .faq-content {
	color: #000;
	padding: 0px 18px;
}

.post-15159 .count {
	font-size: large;
	color: #068cd1;
}

.post-15159 .faq-content h2 {
	color: #068cd1;
}

.post-15159 .unconscious-ul amp-img {
	margin-right: 8px;
}

.post-15159 .biases {
	list-style-type: none;
	padding-left: 0;
}

.post-15159 .mitigating {
	list-style-type: disc;
	margin-left: 20px;
}

.post-15159 .engaging {
	padding: 13px 18px;
}

.post-15159 .engaging-button {
	text-align: left;
	margin-top: 25px;
}

.post-15159 .divider-1 {
	width: 100%;
	border-top: 1px solid #ecf4f6;
	margin-top: 30px;
}

.post-15820 .contact-us {
	text-align: center;
}

.post-15820 .contact-us .request-demo {
	background: #002a38;
	padding: 7px 22px;
	color: white;
	text-decoration: none;
	border-radius: 4px;
	border: none;
	cursor: pointer;
	font-size: 16px;
	display: inline-block;
}

.post-15820 .features {
	background: #ededed;
	padding: 35px 32px 35px 40px;
}

.post-15820 .card {
	position: relative;
	width: 300px;
	border: 1px solid #ccc;
	border-radius: 5px;
	box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
	background: #fff;
	margin-top: 40px;
}

.post-15820 .card amp-img {
	width: 60px;
	position: absolute;
	top: -7.1%;
	left: -6.4%;
}

.post-15820 .card-body {
	padding: 60px 20px 35px 20px;
}

.post-15820 .card-title {
	margin-top: 0;
	font-size: 1.5em;
}

.post-15820 .card-text {
	margin-bottom: 20px;
}

.post-15820 .features-title {
	text-align: center;
}

.post-15820 .features-title .features-content {
	background: #002a38;
	padding: 7px 22px;
	color: white;
	border: none;
	cursor: pointer;
	font-size: 16px;
	width: 180px;
	margin: 10px 0px;
}

.post-15820 #salient-features {
	background-color: #fff;
}

.post-15820 .salient-features-list {
	font-size: 15px;
	color: #000;
	padding: 18px 30px;
	margin-top: 0px;
}

.post-15820 #salient-features .salient-features-list li {
	display: flex;
	padding: 0 0 10px 0;
	line-height: 27px;
	color: #444444;
	font-size: 16px;
}

.post-15820 #salient-features .salient-features-list li .icon-check {
	color: #fa8b05;
	margin-right: 10px;
	margin-top: 5px;
	font-size: 18px;
}

.post-15820 .salient-features {
	text-align: center;
}

.post-15820 .salient-features .salient-features-title {
	background: #002a38;
	padding: 5px;
	color: white;
	border: none;
	cursor: pointer;
	font-size: 18px;
	width: 290px;
	margin: 10px 0px 0px 0px;
	letter-spacing: 0.4px;
}

.post-15820 #course-details {
	background-color: #fff;
}

.post-15820 .course-details-list {
	flex-wrap: wrap;
	font-size: 15px;
	color: #000;
	padding: 18px 30px;
	margin-top: 0px;
}

.post-15820 #course-details .course-details-list li {
	padding: 0 0 10px 0;
	line-height: 27px;
	color: #444444;
	font-size: 16px;
	display: flex;
	align-items: center;
}

.post-15820 #course-details .course-details-list li amp-img {
	margin-right: 10px;
}

.post-15820 .course-details-list .module {
	margin-right: 50px;
}

.post-15820 .course-topics-list {
	list-style: none;
	box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;
	padding: 15px;
	background-color: #ffffff;
	border-radius: 5px;
	margin: 10px;
	font-size: 13px;
}

.post-15820 .course-topics-list li {
	margin-bottom: 10px;
}

.post-15820 .course-topics-list hr {
	margin-top: 10px;
	margin-bottom: 10px;
}

.post-15820 .courses-topics span {
	font-size: 13px;
	margin-left: 12px;
}

.post-15820 .know-more {
	display: flex;
	padding-top: 25px;
}

.post-15820 .posh-manager {
	margin-left: 10px;
	margin-top: -7px;
}

.post-15820 .divider-1 {
	width: 100%;
	border-top: 1px solid #ecf4f6;
	margin-top: 20px;
}

.post-15820 .faq {
	font-size: 20px;
	color: #195265;
	text-align: center;
}

.post-15820 .faq-content {
	color: #000;
	padding: 0px 18px;
}

.post-15820 .count {
	font-size: large;
	color: #068cd1;
}

.post-15820 .faq-content h2 {
	color: #068cd1;
}

.post-15820 .harassment-list li {
	margin-bottom: 20px;
}

.post-15820 .mitigating {
	list-style-type: disc;
	margin-left: 35px;
	margin-top: 5px;
	margin-bottom: 10px;
}

.post-15820 .feature-title {
	color: #002a38;
	text-align: center;
	font-size: 25px;
	margin: 0px 0px;
}

.strong {
	font-size: 13px;
	padding-left: 12px;
}

.posh-iframe {
	padding-left: 10px;
	margin-top: 10px;
}

.post-42 .faq {
	font-size: 20px;
	color: #195265;
	text-align: center;
}

.post-42 .faq-content {
	color: #000;
	padding: 0px 18px;
}

.post-42 .count {
	font-size: large;
	color: #068cd1;
}

.post-42 .faq-content h2 {
	color: #068cd1;
}

.post-66 .faq {
	font-size: 20px;
	color: #195265;
	text-align: center;
}

.post-66 .faq-content {
	color: #000;
	padding: 0px 18px;
}

.post-66 .count {
	font-size: large;
	color: #068cd1;
}

.post-66 .faq-content h2 {
	color: #068cd1;
}

.post-66 .harassment-list li {
	margin-bottom: 10px;
}

.post-66 .mitigating {
	list-style-type: disc;
	margin-left: 35px;
	margin-top: 5px;
	margin-bottom: 10px;
}

.post-66 .divider-1 {
	width: 100%;
	border-top: 1px solid #ecf4f6;
	margin-top: 30px;
}

/* POSH Foundation Features - Card Design (matching module) */
.post-66 .features {
	background: #ededed;
	padding: 35px 32px 35px 40px;
}

.post-66 .card {
	position: relative;
	width: 300px;
	border: 1px solid #ccc;
	border-radius: 5px;
	box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
	background: #fff;
	margin-top: 40px;
}

.post-66 .card amp-img {
	width: 60px;
	position: absolute;
	top: -7.1%;
	left: -6.4%;
}

.post-66 .card-body {
	padding: 60px 20px 35px 20px;
}

.post-66 .card-title {
	margin-top: 0;
	font-size: 1.5em;
}

.post-66 .card-text {
	margin-bottom: 20px;
}

.post-66 .features-title {
	text-align: center;
	color: #002a38;
	font-size: 25px;
	margin: 0px 0px 20px 0px;
}

.post-42 .posh-for-ic-title-payment {
	font-size: 17px;
	padding: 10px 6px;
	text-align: center;
	border: none;
}

.compare-plans {
	margin: 20px 0;
}

.compare-plans h2 {
	font-size: 20px;
	color: #002a38;
	text-align: center;
}

.compare-plans p {
	text-align: center;
	color: #666;
}

/* Responsive */
@media only screen and (max-width: 768px) {
	.pricing-rate .contact-us {
		margin: 11px 20px;
	}
	
	#highlights .list-highlights {
		padding: 0 20px;
	}
}

@media only screen and (max-width: 600px) {
	.title h1 {
		font-size: 20px;
	}
	
	.description {
		font-size: 14px;
	}
	
	.pricing-card {
		margin: 0 10px;
	}
	
	.pricing-rate h2 {
		font-size: 28px;
	}
}

