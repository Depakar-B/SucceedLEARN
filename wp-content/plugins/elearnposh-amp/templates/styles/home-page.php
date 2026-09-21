<?php
/**
 * Home Page Styles
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
/* Home Page Styles */
:root {
	--eposh-soft-grad-a: linear-gradient(to bottom, #fff7ed 0%, #f8fafc 45%, #f0fdfa 100%);
	--eposh-soft-grad-b: linear-gradient(to bottom, #f0fdfa 0%, #f8fafc 45%, #fff7ed 100%);
}

body {
	background: var(--eposh-soft-grad-a);
}

/* Hero band: solid like desktop #hero */
.showcase.content.content-width {
	background: #ffffff;
	/* Extra top space above H1 (matches desktop #hero breathing room) */
	padding-top: 48px;
}

/* Shared section headings (matches video block green title) */
.eposh-section-title {
	font-weight: 700;
	font-size: clamp(1.25rem, 4vw, 1.65rem);
	line-height: 1.35;
	color: #0f766e !important;
	margin: 0 auto 12px;
	max-width: 38rem;
	text-align: center;
	display: block;
	padding: 0 12px;
}

.reason-to-choose-ep h2.eposh-section-title {
	background: transparent;
	color: #0f766e !important;
	font-weight: 700;
	font-size: clamp(1.25rem, 4vw, 1.65rem);
	line-height: 1.35;
	margin: 0 auto 16px;
	padding: 0 12px;
}

* {
	box-sizing: border-box;
	font-family: 'Nunito Sans', sans-serif;
}

a,
button,
.btn,
.amp-pc-btn {
	transition: color 0.2s linear, background-color 0.2s linear, border-color 0.2s linear, opacity 0.2s linear;
}

amp-video video {
	outline: 10px solid white;
	outline-offset: -4px;
}

ul {
	list-style-type: none;
	padding: 0;
}

.hrtag {
	border-top: 1px solid white;
	margin: 15px 0;
}

.content-width {
	width: 90%;
}

.content {
	padding: 30px 0px;
	margin: 0 auto;
	line-height: 140%;
}

/* Icon replacements (no FontAwesome needed) */
.icon-bullet {
	display: inline-block;
	width: 25px;
	height: 25px;
	background: #fa8b05;
	color: white;
	border-radius: 50%;
	text-align: center;
	line-height: 25px;
	font-weight: bold;
	margin-right: 10px;
}

.icon-check {
	color: #fa8b05;
	font-size: 18px;
	margin-right: 7px;
	font-weight: bold;
}

.custom-bullet {
	color: #fa8b05;
	margin-right: 7px;
}

/* Showcase Section */
.sub-text {
	text-align: center;
	font-weight: 400;
	color: #6b6b6b;
}

.showcase .information {
	margin-bottom: 10px;
	margin-top: 0px;
}

.showcase .information h1 {
	margin: 0;
	padding: 0;
}

.heading {
	font-size: 25px;
	line-height: 35px;
	text-align: center;
}

.brief {
	font-size: 15px;
	color: #000;
	text-align: center;
}

/* Achievement Section */
.achievement {
	padding: 20px;
}

.achievement .container {
	max-width: 1200px;
	margin: 0 auto;
}

.achievement .heading {
	margin-bottom: 15px;
}

.govt {
	background: #f5f5f5;
	padding: 20px 0;
}

.posh-badges {
	display: flex;
	justify-content: center;
	align-items: center;
	gap: 20px;
	margin: 20px 0;
}

/* About Section */
.about-content {
	padding: 26px 20px;
}

.about-content h2 {
	font-size: 23px;
	font-weight: 500;
	line-height: 120%;
	color: #002a38;
	margin: 0px 0px 20px;
	text-align: center;
}

.about-content p {
	color: #6b6b6b;
	font-size: 15px;
	font-weight: 300;
	font-style: normal;
	line-height: 140%;
	text-align: center;
}

/* Reason to Choose */
.reason-to-choose-ep {
	padding: 26px 0px;
}

/* Legacy bar title — use .eposh-section-title on h2 instead */
.reason-to-choose-ep h2:not(.eposh-section-title) {
	background: #002a38;
	padding: 10px 20px;
	color: white;
	font-size: 23px;
	margin: 0px;
	font-weight: 500;
}

.reason-to-choose-ep ul {
	padding: 0px 23px;
}

.reason-to-choose-ep ul li {
	margin: 18px 0px;
	display: flex;
	align-items: center;
}

/* Plans Section */
#plans {
	padding: 26px 20px;
	background: #efefef;
}

#plans .plans-wrapper h2 {
	font-size: 23px;
	margin: 0 0 10px;
	text-align: center;
	color: #002a38;
}

#plans .plans-wrapper p {
	font-size: 15px;
	text-align: center;
	color: #002a38;
}

/* Common Box Style */
#plans .plan-box {
	padding: 15px;
	background: #fff;
	box-shadow: 0px 0px 20px #888;
	border-radius: 8px;
	margin: 28px 0;
}

#plans .posh-basic {
	background: #ffffff !important;
	padding: 20px;
	margin: 30px 0;
	border-radius: 10px;
	box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
}

/* Title */
#plans .pricelist-title {
	background: #002a38;
	padding: 8px;
	color: #fff;
	text-align: center;
	text-transform: uppercase;
	margin: 0 0 10px;
}

/* List */
#plans .plan-box ul {
	padding: 0 14px;
}

#plans .plan-box ul li {
	margin: 8px 0;
	display: flex;
	align-items: flex-start;
}

#plans .plan-box ul li span {
	margin-left: 7px;
	font-size: 15px;
}

/* Button */
#plans .btn.btn-schedule {
	color: #fff;
	background: var(--posh-demo-btn-bg, #01465d);
	height: 40px;
	padding: 1px 43px;
	font-size: 17px;
	border: 0;
	border-radius: 4px;
	cursor: pointer;
}

#plans .btn-holder {
	text-align: center;
	margin-top: 10px;
}

/* Testimonials */
#testimonials {
	padding: 26px 20px;
	background: transparent;
}

#testimonials h2 {
	text-align: center;
	margin-top: 0px;
	margin-bottom: 20px;
}

.testimonials-carousel-wrapper {
	max-width: 100%;
	margin: 0 auto;
}

#testimonials amp-carousel {
	background: #002a38;
	border-radius: 7px;
	width: 100%;
}

#testimonials .testimonial-slide {
	padding: 20px;
	min-height: 300px;
	display: flex;
	align-items: center;
	justify-content: center;
}

#testimonials .testimonial-content {
	width: 100%;
	max-width: 700px;
	margin: 0 auto;
}

#testimonials amp-carousel h4 {
	background: transparent;
	border-radius: 0;
	font-size: 19px;
	color: #fa8b05;
	margin: 0px 0px 10px;
	padding: 0;
}

#testimonials amp-carousel .designation {
	font-style: italic;
	color: white;
	font-size: 15px;
	margin: 0px 0px 15px;
}

#testimonials amp-carousel .comment {
	font-size: 15px;
	color: white;
	margin: 0;
	line-height: 1.6;
}

#clients {
    text-align:center;
}
.client-logo {
    padding: 10px;
    display: flex;
    justify-content: center;
    align-items: center;
}
.client-logo amp-img {
    max-width: 140px;
    max-height: 55px;
    margin: 0 auto;
}

/* Mobile */
@media (max-width: 480px) {
    #clients amp-carousel {
        height: 90px !important;
    }
    .client-logo {
        width: 100%;
    }
}

/* Tablet */
@media (min-width: 481px) and (max-width: 991px) {
    .client-logo {
        width: 25%;
    }
}

/* Desktop */
@media (min-width: 992px) {
    .client-logo {
        width: 16.66%;
    }
}


/* SaaS Section */
#saas {
	background: #002a38;
	padding: 26px 20px;
}

#saas .information {
	background: white;
	padding: 10px;
	margin-top: 20px;
}

#saas .information h2:not(.eposh-section-title) {
	margin: 0px;
	font-size: 23px;
	color: white;
	background: #002a38;
	padding: 10px;
}

#saas .information h2.eposh-section-title {
	background: transparent;
	padding: 0 8px 14px;
	margin-bottom: 8px;
}

#saas .information ul {
	padding: 0px 14px;
}

#saas .information ul li.saas-contents {
	margin: 8px 0px;
	display: flex;
	align-items: flex-start;
}

#saas .information ul li.saas-contents span.saas-content {
	margin-left: 7px;
	font-size: 15px;
}

/* Why eLearnPOSH */
#whyeposh {
	padding: 26px 20px;
}

#whyeposh h2 {
	text-align: center;
	margin: 0px 0px 16px 0px;
}

#whyeposh .wep-content-div {
	border-radius: 15px;
	box-shadow: 0px 0px 20px #888888;
	padding: 15px;
	margin-bottom: 20px;
}

#whyeposh .wep-indiv {
	margin-bottom: 20px;
}

#whyeposh .wep-content-div {
	border-radius: 15px;
	box-shadow: 0px 0px 20px #888888;
	padding: 12px;
	margin-bottom: 10px;
}

#whyeposh .wep-content-div ul {
	list-style-type: disc;
	padding-left: 34px;
	margin-top: 3px;
}

#whyeposh .wep-content-div p {
	margin: 5px 0px;
	font-size: 15px;
}

#whyeposh .wep-content-div .title-holder {
	display: flex;
	align-items: center;
}

#whyeposh .wep-content-div .title-holder amp-img {
	margin-top: 2px;
}

#whyeposh .wep-content-div .title-holder h3 {
	font-size: 19px;
	margin: 0px 0px 0px 8px;
	color: #002a38;
}

#whyeposh .wep-mobile-arrow {
	text-align: center;
}

#whyeposh .wep-mobile-arrow amp-img {
	text-align: center;
	margin-bottom: -5px;
}

/* eLearning Courses Section */
#elearning-courses {
	padding: 26px 20px 8px 20px;
	background: #002a38;
	text-align: center;
}

#elearning-courses h2:not(.eposh-section-title) {
	font-size: 23px;
	margin-top: 0px;
	color: white;
}

#elearning-courses h2.eposh-section-title {
	color: #0f766e !important;
	background: transparent;
	padding: 0 12px 16px;
	margin-bottom: 8px;
}

#elearning-courses .portfolio-item {
	margin-bottom: 18px;
}

#elearning-courses .portfolio-item .portfolio-wrap {
	margin-bottom: 10px;
}

#elearning-courses .portfolio-item .courses-btn button {
	background: white;
	border: none;
	padding: 6px 25px;
	border-radius: 5px;
	color: #002a38;
	font-size: 16px;
	font-weight: bold;
	margin-top: 10px;
	cursor: pointer;
}

/* Contact CTA */
#contact-us {
	text-align: center;
	padding: 20px;
}

#contact-us .epcf-wrap,
#contact-us .epcf-form,
#contact-us .epcf-label,
#contact-us .epcf-checks {
	text-align: left;
}

#contact-us .button {
	display: inline-block;
	padding: 12px 30px;
	background: #002a38;
	color: white;
	text-decoration: none;
	border-radius: 4px;
	font-weight: bold;
	font-size: 17px;
}

.btn-schedule {
	background: var(--posh-demo-btn-bg, #01465d);
	color: white;
	border: 0;
	padding: 10px 20px;
	border-radius: 4px;
	font-size: 16px;
	cursor: pointer;
}

/* Responsive adjustments */
@media (max-width: 1024px) {
	#testimonials .testimonial-slide {
		padding: 20px 15px;
		min-height: 280px;
	}
	
	#testimonials amp-carousel h4 {
		font-size: 18px;
	}
	
	#testimonials amp-carousel .comment {
		font-size: 14px;
	}
	
	#clients .client-logo-slide {
		padding: 15px;
		min-height: 90px;
	}
	
	#clients .client-logo-slide amp-img {
		max-width: 200px;
	}
}

@media (max-width: 768px) {
	.heading {
		font-size: 20px;
		line-height: 28px;
	}
	
	.posh-badges {
		flex-direction: column;
	}
	
	#plans .plans-wrapper h2 {
		font-size: 20px;
	}
	
	#testimonials {
		padding: 20px 15px;
	}
	
	#testimonials h2.eposh-section-title {
		margin-bottom: 15px;
	}
	
	#testimonials .testimonial-slide {
		padding: 15px 10px;
		min-height: 250px;
	}
	
	#testimonials amp-carousel h4 {
		font-size: 17px;
	}
	
	#testimonials amp-carousel .designation {
		font-size: 14px;
	}
	
	#testimonials amp-carousel .comment {
		font-size: 13px;
	}
	
	#clients {
		padding: 30px 15px;
	}
	
	#clients h2 {
		font-size: 20px;
	}
	
	#clients .client-logo-slide {
		padding: 10px;
		min-height: 80px;
	}
	
	#clients .client-logo-slide amp-img {
		max-width: 150px;
	}
}

@media (max-width: 480px) {
	#testimonials .testimonial-slide {
		padding: 12px 8px;
		min-height: 220px;
	}
	
	#testimonials amp-carousel h4 {
		font-size: 16px;
	}
	
	#testimonials amp-carousel .comment {
		font-size: 12px;
	}
	
	#clients .client-logo-slide {
		padding: 8px;
		min-height: 70px;
	}
	
	#clients .client-logo-slide amp-img {
		max-width: 120px;
	}
}

