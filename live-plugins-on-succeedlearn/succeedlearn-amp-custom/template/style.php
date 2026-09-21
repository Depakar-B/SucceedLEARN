<?php
$sl_current_page_id = function_exists('get_queried_object_id') ? (int) get_queried_object_id() : 0;
$sl_request_uri = isset($_SERVER['REQUEST_URI']) ? (string) $_SERVER['REQUEST_URI'] : '';
$sl_is_s_phish_page = ($sl_current_page_id === 54608) || (stripos($sl_request_uri, 's-phish') !== false);
$sl_is_s_sync_page = (stripos($sl_request_uri, 's-sync') !== false);
$sl_is_s_aware_page = (stripos($sl_request_uri, 's-aware') !== false);
$sl_is_s_bytes_page = (stripos($sl_request_uri, 's-bytes') !== false);
$sl_is_s_metrics_page =
  (stripos($sl_request_uri, 's-metrics') !== false) ||
  (stripos($sl_request_uri, 's-metrics-tracking-reporting') !== false);
$sl_is_s_play_page = (stripos($sl_request_uri, 's-play') !== false);
$sl_is_s_signs_page =
  (stripos($sl_request_uri, 's-signs') !== false) ||
  (stripos($sl_request_uri, 's-signs-security-awareness') !== false);
$sl_is_usa_suite_page = (stripos($sl_request_uri, 'harassment') !== false) || (stripos($sl_request_uri, 'posh') !== false);
$sl_is_about_page = (stripos($sl_request_uri, 'about') !== false);
$sl_is_contact_page = (stripos($sl_request_uri, 'contact') !== false);
$sl_is_financial_crime_suite_page = (stripos($sl_request_uri, 'financial-crime') !== false) || (stripos($sl_request_uri, 'financial-crime-prevention') !== false);
$sl_is_pevc_suite_page = (stripos($sl_request_uri, 'private-equity') !== false) || (stripos($sl_request_uri, 'venture-capital') !== false) || (stripos($sl_request_uri, 'pe-vc') !== false);
$sl_is_hr_compliance_suite_page = (stripos($sl_request_uri, 'hr-compliance-suite') !== false) || (stripos($sl_request_uri, 'respect-inclusion-suite') !== false);
$sl_is_landing_page = (stripos($sl_request_uri, 'landing') !== false);
?>

html,
  body,
  *,
  *:before,
  *:after,
  input,
  textarea,
  select,
  button {
    font-family: 'Open Sans', sans-serif !important;
  }

  html,
  body {
    margin: 0;
    padding: 0;
    overflow-x: hidden;
    font-family: sans-serif !important;
    background-color: #ffffff;
    height: 100%;
    overscroll-behavior-y: none;
  }


/************************* Header *************************/
.site-header {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  height: 60px;
  background-color: #ffffff;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0 20px;
  z-index: 1000;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
}

/* Global bottom progress bar (AMP pages) */
.global-progress-bar{
  position: fixed;
  left: 0;
  right: 0;
  bottom: 0;
  height: 4px;
  background: rgba(20,114,186,0.2);
  z-index: 9999;
  pointer-events: none;
}
.global-progress-fill{
  display: block;
  width: 100%;
  height: 100%;
  background: #1472ba;
  transform-origin: left center;
  transform: scaleX(0);
  will-change: transform;
  animation: global-scroll-progress linear both;
  animation-timeline: scroll(root block);
}
@keyframes global-scroll-progress{
  from { transform: scaleX(0); }
  to { transform: scaleX(1); }
}

.site-header amp-img {
  height: 40px;
}

.menu-icon {
  font-size: 28px;
  cursor: pointer;
  color: #333;
}
	

/************************* Sidebar *************************/
amp-sidebar.sidebar-main {
  width: 260px;
  background: #ffffff;
  padding: 15px;
}

.sidebar-header {
  display: flex;
  justify-content: flex-end;
  font-size: 26px;
  cursor: pointer;
  margin-bottom: 10px;
}

/************************* Menu Sections *************************/
.menu-section {
  margin-bottom: 12px;
}

.menu-link {
  display: block;
  padding: 8px 0;
  text-decoration: none;
  color: #333;
  font-size: 16px;
font-weight:500;
  transition: color 0.2s ease;
}
.menu-link:hover {
  color: #1472ba;
}
	.menu-item-section,.section-solutions{
		padding: 0px !important;
	}
/************************* Accordion *************************/
amp-accordion section {
  border: none;
  margin: 0;
}

.submenu a {
  display: block;
  font-size: 16px;
  padding: 12px 0 12px 14px;
  margin: 2px 0;
  border-bottom: 2px solid #eee;
  color: #444444;
  text-decoration: none;
	font-weight: 500 !important;
}
.submenu a:active {
  color: #1472ba;
}
.menu-title, .title-about{
	background-color: #ffffff !important;
    padding: 12px 20px 12px 0px !important;;
    border: none !important;
	color: #444444 !important;
    font-size: 16px !important;
    font-weight: 500 !important;
	}
	
/* Add arrow to dropdown menu titles */
.menu-title {
    position: relative;
    cursor: pointer;
    padding-right: 20px; 
}

/* Arrow on the right */
.menu-title::after {
    content: '▼'; 
    position: absolute;
    right: 0;
    top: 50%;
    transform: translateY(-50%);
    font-size: 12px;
    transition: transform 0.3s ease;
}

/* OLD (duplicate): removed duplicate .menu-title::after block */

/* Rotate arrow when section is expanded */
amp-accordion section[expanded] .menu-title::after {
    transform: translateY(-50%) rotate(-180deg);
}


/************************* CTA Button *************************/
.cta-btn {
  display: block;
  background: #003f88;
  color: #fff;
  text-align: center;
  padding: 10px;
  border-radius: 4px;
  text-decoration: none;
  font-weight: bold;
  margin-top: 24px!important;
}
.cta-btn:hover {
  background: #002f66;
}

/************************* Contact Info *************************/
.menu-contact {
  font-size: 13px;
  margin-top: 10px;
  line-height: 1.4;
}
.menu-contact a {
     color: #1472ba !important;
    text-decoration: none;
    font-size: 16px !important;
    font-weight: 500 !important;
	margin-top: 18px !important
}
.hidden-phone {
  display: none;
}
	.contact-email{
		text-align: center !important;
	}
/************************* Utility *************************/
.text-small {
  font-size: 13px;
}
.text-muted {
  color: #777;
}
	
	/*********************Scroll to top ****************************/
.scroll-top-btn {
    position: fixed;
    bottom: 20px;
    right: 20px;
    width: 50px;
    height: 50px;
    background: transparent;
    border: none;
    cursor: pointer;
    z-index: 9999;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 0;
    transition: transform 0.2s ease, opacity 0.3s ease;
}

.scroll-top-btn:hover {
    transform: translateY(-3px);
}

.progress-square {
    position: absolute;
    top: 0;
    left: 0;
    transform: rotate(-90deg);
}

.progress-square__rect {
    fill: transparent;
    stroke: #1472ba;
    stroke-width: 3;
    stroke-dasharray: 184;
    transition: stroke-dashoffset 0.25s ease;
}

/* Step-based AMP-safe progress states */
.scroll-top-btn.progress-step-0 .progress-square__rect { stroke-dashoffset: 184; }
.scroll-top-btn.progress-step-1 .progress-square__rect { stroke-dashoffset: 147; }
.scroll-top-btn.progress-step-2 .progress-square__rect { stroke-dashoffset: 110; }
.scroll-top-btn.progress-step-3 .progress-square__rect { stroke-dashoffset: 73; }
.scroll-top-btn.progress-step-4 .progress-square__rect { stroke-dashoffset: 0; }

/* Arrow */
.arrow-up {
    position: relative;
    width: 16px;
    height: 16px;
}

.arrow-up::before,
.arrow-up::after {
    content: "";
    position: absolute;
    top: 2px;
    width: 10px;
    height: 2.5px;
    background: #1472ba;
    border-radius: 2px;
}

.arrow-up::before {
    left: 50%;
    transform-origin: left center;
    transform: rotate(45deg);
}

.arrow-up::after {
    right: 50%;
    transform-origin: right center;
    transform: rotate(-45deg);
}
	
	
/************************Cookiee ************************/
	


	
  /************************Footer************************/
  .site-footer {
  background-color: #f5f7fa;
  padding: 40px 0 0 0;
  color: #333;
  text-align: left;
}

.footer-main-row {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 20px 30px 20px;
  display: flex;
  flex-wrap: wrap;
  align-items: flex-start;
  justify-content: space-between;
  gap: 32px 40px;
}

.footer-section {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0px 20px 20px 20px;
}

/* Footer menu groups: side by side; wrap to new row when width is tight */
.footer-columns-row {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
  align-items: start;
  flex: 2 1 400px;
  min-width: 0;
  max-width: 100%;
  margin: 0;
  padding: 0;
  gap: 24px 32px;
}

.footer-col {
  text-align: left;
  min-width: 0;
}

/* Tablet: keep all three in a row */
@media (min-width: 481px) and (max-width: 1024px) {
  .footer-main-row {
    flex-direction: column;
    align-items: stretch;
    gap: 32px;
    padding: 0 20px 20px 20px;
  }
  .footer-inner {
    flex: 1 1 auto;
    max-width: 100%;
  }
  .footer-columns-row {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    align-items: start;
    width: 100%;
    max-width: 100%;
    gap: 24px 28px;
  }
  .footer-col {
    min-width: 0;
  }
  .footer-cert-badges {
    flex-direction: row;
    flex-wrap: nowrap;
  }
}

/* Mobile: stack columns */
@media (max-width: 480px) {
  .footer-inner {
    flex: 1 1 auto;
    max-width: 100%;
  }
  .footer-main-row {
    flex-direction: column;
    padding: 0 16px 20px 16px;
    gap: 20px;
  }
  .footer-columns-row {
    display: grid;
    grid-template-columns: 1fr;
    align-items: stretch;
    padding: 0;
    gap: 20px;
  }
  .footer-col {
    width: 100%;
  }
  .footer-cert-badges {
    flex-direction: column;
    align-items: flex-start;
    gap: 10px;
  }
}

.footer-subtopic {
  font-size: 1.3em;
  color: #222;
  margin-bottom: 12px;
}

.footer-links,
.contact-info {
  list-style: none;
  padding: 0;
  margin: 0;
}

.footer-inner {
  margin: 0;
  padding: 0;
  text-align: left;
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  flex: 1 1 280px;
  min-width: 0;
  max-width: 100%;
}

.footer-inner .footer-logo {
  display: block;
  margin-bottom: 12px;
}

.footer-description {
  max-width: 100%;
  font-size: 14px;
  color: #555;
  line-height: 1.6;
}
.footer-highlight-link {
  color: #1472ba;
  text-decoration: none;
  font-weight: 600; 
}

.footer-contact-title {
  margin-top: 18px;
}

  /* OLD (duplicate): removed duplicate .footer-subtopic block */

.footer-link {
  text-decoration: none;
  color: inherit;
}

  .footer-links li {
    margin: 6px 0;
  }

  .footer-links a {
    text-decoration: none;
    color: #333;
    transition: color 0.3s ease;
  }

  .contact-info { color: #555; }

  .contact-info li {
    margin: 8px 0;
  }

  .no-style-link {
    color: inherit;
    text-decoration: none;
    cursor: pointer;
  }

  .social-icons {
    display: flex;
    gap: 14px;
    margin-top: 15px;
    justify-content: flex-start;
    width: 100%;
  }

  .social-icons a {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background-color: #e9ecef;
    padding: 6px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.08);
  }

  .footer-cert-badges {
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: flex-start;
    gap: 10px;
    margin-top: 14px;
  }

  .footer-cert-badges amp-img {
    display: block;
  }

/* Footer menus: left alignment on tablet (grid wrapping comes from base .footer-columns-row) */
@media (min-width: 481px) and (max-width: 1024px) {
  .footer-columns-row .footer-col,
  .footer-columns-row .footer-subtopic,
  .footer-columns-row .footer-links,
  .footer-columns-row .footer-links li,
  .footer-columns-row .footer-links a {
    text-align: left !important;
  }

  .footer-inner .social-icons {
    justify-content: flex-start !important;
    align-self: flex-start;
    margin-left: 0;
  }

  .footer-inner .footer-cert-badges {
    justify-content: flex-start !important;
    align-self: flex-start;
  }
}

.home-grid-center-section {
  max-width: var(--sl-content-max-width);
  margin-left: auto;
  margin-right: auto;
  box-sizing: border-box;
}

@media (max-width: 1024px) {
  .home-grid-center-section {
    padding-left: 16px;
    padding-right: 16px;
  }

  .grid-center-responsive {
    text-align: center;
  }

  .grid-center-responsive .imagebox-grid,
  .grid-center-responsive .sync-imagebox-grid,
  .grid-center-responsive .signs-imagebox-grid,
  .grid-center-responsive .s-aware-cards-grid {
    justify-content: center;
    justify-items: center;
  }

  .grid-center-responsive .imagebox,
  .grid-center-responsive .landing-imagebox,
  .grid-center-responsive .sync-imagebox,
  .grid-center-responsive .signs-imagebox,
  .grid-center-responsive .s-aware-cards-card {
    margin-left: auto;
    margin-right: auto;
    text-align: center;
  }

  .grid-center-responsive .imagebox-text,
  .grid-center-responsive .sync-imagebox-text,
  .grid-center-responsive .signs-imagebox-text,
  .grid-center-responsive .s-aware-cards-bottom {
    text-align: center;
  }

  .grid-center-responsive .imagebox-link {
    display: flex;
    justify-content: center;
  }
}

@media (min-width: 768px) and (max-width: 1024px) {
  .grid-center-responsive .imagebox-grid {
    grid-template-columns: repeat(2, minmax(280px, 320px));
    justify-content: center;
    gap: 16px;
  }
}

  .footer-bottom {
    text-align: center;
	   position: static !important;
    font-size: 0.9em;
    color: #ffffff;
    padding: 10px 0px;
    border-top: 1px solid #ccc;
    margin-top: 20px;
	 background-color:#1472ba;
  }

  .footer-bottom p {
    color: #ffffff !important;
    margin: 0;
  }


  /************************ Button ************************/

  a.button {
    display: inline-block;
    color: white;
    text-decoration: none;
    padding: 10px 20px;
    border-radius: 6px;
    font-size: 0.95rem;
    font-weight: 600;
    transition: background 0.3s;
  }

  .button {
    display: inline-block;
    padding: 10px 20px;
    margin-top: 1rem;
    background-color: #16234e;
    color: #fff;
    text-decoration: none;
    font-size: 0.9rem;
    font-weight: 600;
    border-radius: 4px;
    text-align: left;
    transition: background-color 0.3s;
  }
	.succeedlearn-btn{
		margin-top:12px;
	}
  /************************* List Items *************************/

  .section-keypoints {
    list-style-type: disc;
    padding-left: 1.2rem;
    color: #333;
    line-height: 1.6;
    margin: 1rem 0;
  }



  /************************* Heading *************************/

  .heading {
    font-size: 28px !important;
    font-weight: 600;
    margin: 0;
    padding-bottom: 12px;
    text-align: center;
  }
.key-section-heading {
  font-size: 24px;
  font-weight: 600;
  color: #222;
  text-align: left;
}
.section-keypoints {
  padding-left: 0px;
  margin: 12px 0px 0px 0px; 
}
.key-section-description {
    font-size: 16px;
    font-weight: 400;
    margin: 0;
    margin-top: 12px;
    text-align: left;
    color: #3d3d3d;
    line-height: 1.5;
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
  }


.section-keypoints li p {
  margin: 0;
}


  .heading .black {
    color: #000000;
  }

  .heading .blue {
    color: #1472ba;
  }


  .Main_heading {
    font-size: 28px;
    font-weight: 600;
  }


  .section-heading {
    font-size: 1.6em;
    font-weight: 600;
    margin: 0;
    padding-bottom: 12px;
    text-align: center;

  }
	
  .section-subheading {
    font-size: 1.4em;
    font-weight: 600;
    margin: 0;
    padding-bottom: 12px;
    text-align: left;

  }
  .section-topic {
    font-size: 1.8em;
    font-weight: 600;
    margin: 0;
    padding-top: 24px;
    text-align: center;
    padding-left: 16px;
  }

  /************************* subheading *************************/
  .subheading {
    font-size: 1.2em;
    font-weight: 500;
    margin: 0;
    text-align: left;
    color: #000000;
  }

  .sub-heading {
    font-size: 1.4em;
    font-weight: 600;
    margin: 0;
    text-align: left;
    color: #000000;
  }

  /************************* description *************************/

  .description {
    font-size: 1em;
    font-weight: 400;
    margin: 0;
    margin-top: 12px;
    text-align: left;
    color: #3d3d3d;
    line-height: 1.5;
    max-width: 600px;
  }

  /************************* Banner section *************************/
  .banner-heading {
    font-size: 32px;
    font-weight: 600;
    color: #ffffff;
    margin-top: 60px;
    line-height: 1;
  }
	.empty-banner{
		margin:10px;
		max-height:40px !important!;
		height:40px !important;
	}



  /************************* sections *************************/
.even-section,
.odd-section {
    background-color: #E3EDEC;
    display: flex;
    flex-direction: row;
    flex-wrap: wrap; 
    max-width: 1200px;
    margin: 0 auto;
    justify-content: center; 
    align-items: center; 
    padding: 20px; 
}
	.view-more-section{
	background-color: #ffffff;
    flex-wrap: wrap; 
    margin: 20px 16px;
    justify-content: center; 
    align-items: center; 
    padding: 0px !important; 
	border-radius: 12px;
	}
	.key-even-section{
	background-color: #ffffff;   
    display: flex;
    flex-direction: row;
    flex-wrap: wrap; 
    max-width: 1200px;
    margin: 0px 16px !important;
    justify-content: center; 
    align-items: left !important; 
    padding: 20px; 
	border-radius:12px;
	}

  .odd-section {
    background-color: #F4F2FC;
    padding: 20px;
  }
	.aware-even-section{
	background-color: #ffffff;
    display: flex;
    flex-direction: row;
    flex-wrap: wrap; 
    max-width: 1200px;
    margin: 0 auto;
    justify-content: center; 
    align-items: center; 
    padding: 32px 20px !important; 
	}
	.aware-odd-section{
	background-color: #E3EDEC;
    display: flex;
    flex-direction: row;
    flex-wrap: wrap; 
    max-width: 1200px;
    margin: 0 auto;
    justify-content: center; 
    align-items: center; 
    padding: 32px 20px !important; 
	}
	

	.s-bytes-even-section{
	background-color: #ffffff;
    display: flex;
    flex-direction: row;
    flex-wrap: wrap; 
    max-width: 1200px;
    margin: 24px auto !important;
    justify-content: center; 
    align-items: center; 
    padding:  0px 20px 20px 20px; 
	}
	.s-bytes-odd-section{
	background-color: #e8edec;
    display: flex;
    flex-direction: row;
    flex-wrap: wrap; 
    max-width: 1200px;
    margin: 24px auto !important;
    justify-content: center; 
    align-items: center; 
    padding:  24px 20px; 
	}
	.s-bytes-sub-heading{
		margin-top:20px!important;
		font-size:24px !important;
	}
	.s-bytes-different-img{
		width:60%;
		border-radius:12px;
		margin-top: 24px;
		height:70%;
	}
	
	.content-section{
    display: block;
    max-width: 1200px;
    margin: 0 auto;
    padding: 30px 20px;
    column-gap: 24px;
    row-gap: 20px;
}
	.content-section .subcategory-image{
		flex: 1 1 320px;
		max-width: 360px;
		margin-top: 20px;
	}
	.content-section .subcategory-content{
		flex: 1 1 520px;
		max-width: 760px !important;
		text-align: left;
	}
	.content-section .course-button{
		margin-left: 0;
		margin-right: auto;
	}
	.light-pink_bg{
		background-color:#FFDAF7;
	}
	.white_bg{
		background-color:#ffffff;
	}
  /************************* section image *************************/
  .section-image {
    width: auto;
    max-width: 100%;
    border-radius: 12px;
    overflow: hidden;
    margin-top: 16px;
	 text-align: center;
  }

  /************************* Hero section *************************/

  /* Hero Section 
  .hero-section {
    padding: 24px 26px 0px 16px !important;
    background: #ffffff;
    text-align: left;
    margin: 0px auto 0px  auto;
  }*/
	.hero-section {
  display: flex;
  flex-wrap: wrap; 
  justify-content: center;
  align-items: center;
  text-align: left;
  gap: 20px;        
  padding: 24px 26px 0px 16px !important;
  max-width: 1200px;
  margin: 0 auto;   
  box-sizing: border-box;
  background: #ffffff;
}
	.top-spacing{
		margin-top: 50px!important;
	}

  .hero-section-top {
    margin-bottom: 0px;
    max-width: 800px;
    flex: 1 1 500px;  
    min-width: 280px; 
    text-align: left;
   }
	.hero-section-quote{
	background-color: #1472ba !important;
	padding: 24px 32px !important;
    text-align: left;
	}
	.quote{
	font-size: 16px !important;
	font-weight: 600 !important;
	margin-bottom:18px !important;
	padding-bottom:12px !important;
	color: #ffffff!important;
	}
  .hero-section-topic {
    font-size: 32px !important;
    color: #1a1a1a;
    margin-bottom: 0.5rem;
    line-height: 1.3;
    font-weight: 600;
  }

  .hero-section-subtopic {
    font-size: 20px !important;
	  font-weight: 500 !important;
	  margin-bottom:12px;
    text-align: left;
    color: #000;
  }

  .hero-section-desc {
    font-size: 16px !important;
    color: #555;
	  font-weight: 400;
    max-width: 700px;
    margin: 0;
    line-height: 1.6;
  }

  .hero-section-bottom {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  padding: 10px 0;
  box-sizing: border-box;
}

.hero-img-wrapper {
  width: 100%;
  max-width: 600px; 
  margin: 0 auto;
  display: flex;
  justify-content: center;
  align-items: center;
}

/* Use when hero has a single media element */
.hero-media{
  width: 100%;
  max-width: 600px;
  margin: 0 auto;
  display: block;
}

.hero-section-img {
  width: 100%;
  height: auto;
  margin: 16px;
  border-radius: 8px; 
  object-fit: contain;
}

/* Tablet tweak */
@media (min-width: 768px) and (max-width: 1023px) {
  .hero-img-wrapper {
    max-width: 500px;
  }
  .hero-media{
    max-width: 500px;
  }
	.hero-section{
		padding:0px 32px !important;
		margin:20px 0px 32px 0px !important;
	}
}


  /************************* section *************************/
  section {
    padding: 40px 20px;
    /*display: flex;*/
    flex-wrap: wrap;
    align-items: center;
    justify-content: center;
  }

  /************************* Shared Layout Utilities *************************/
  :root{
    --sl-content-max-width: 1200px;
    --sl-section-pad-y: 40px;
    --sl-section-pad-x: 20px;
  }

  /* Reusable section shell */
  .section-shell{
    padding: var(--sl-section-pad-y) var(--sl-section-pad-x);
  }

  /* Reusable content shell */
  .content-shell{
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    max-width: var(--sl-content-max-width);
    margin: 0 auto;
    justify-content: center;
    align-items: center;
    box-sizing: border-box;
  }

  /* Keep AMP scroll-action buttons visually identical to links */
  .landing-page-amp-banner-btn,
  .testimonial-btn,
  .amp-contact-section-cta-btn,
  .marketing-landing-btn,
  .marketing-gradient-btn,
  .gradient-btn,
  .course-scroll-to-top-button {
    -webkit-appearance: none;
    appearance: none;
    border: none;
    font: inherit;
    cursor: pointer;
  }

  /* Map existing page sections to shared content width */
  .content-section,
  .common-content-section,
  .common-cta-section,
  .module-sections,
  .clients-marquee-section,
  .s-metrics-section,
  .s-sync-key-section,
  .what-signs-section,
  .signs-key-features-section,
  .signs-launch-section{
    max-width: var(--sl-content-max-width);
    margin-left: auto;
    margin-right: auto;
    box-sizing: border-box;
  }


/************************* Carousel *************************/

.carousel-container {
  margin: 60px auto 0;
  width: 100%;
  max-width: 100%;
  box-sizing: border-box;
  overflow-x: clip;
}

/* IMPORTANT: Do NOT force fixed height on amp-carousel */
amp-carousel {
  width: 100%;
  background-color: #ffffff;
  margin: 0 auto;
  cursor: grab;
}

amp-carousel:active {
  cursor: grabbing;
}

/* Slide layout */
.slide {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: flex-start;
  padding: 24px 16px;
  background-color: #ffffff;
  color: #333333;
  box-sizing: border-box;
  min-height: 200px; /* matches amp-carousel height */
}

/* Headings */
.topic {
  font-size: 26px;
  line-height: 1.25;
  margin-bottom: 8px;
  font-weight: 700;
}

.topic.blue {
  color: #1472ba;
}

.topic.green {
  color: #0e9f4a;
}

/* Paragraph */
.slide p {
  font-size: 16px;
  line-height: 1.5;
  margin: 0;
  color: #4b5563;
}

/* Hide navigation buttons (AMP-safe) */
amp-carousel > .amp-carousel-button,
.amp-carousel-button {
  display: none !important;
}

/* Pagination dots */
amp-carousel::part(pagination) {
  display: flex;
  justify-content: center;
  margin-top: 8px;
}

.amp-carousel-pagination {
  position: absolute;
  bottom: 8px;
  left: 0;
  right: 0;
  text-align: center;
  z-index: 2;
}

/* Mobile-first responsive tuning */
@media (max-width: 480px) {
  .topic {
    font-size: 22px;
  }

  .slide p {
    font-size: 15px;
  }
}
/* Tablet view */
@media (min-width: 481px) and (max-width: 1024px) {
  .carousel-container {
    margin-top: 30px;
  }

  .carousel-container amp-carousel {
    max-height: 220px; /* visually limits height */
  }

  .slide {
    min-height: 160px;   /* reduce slide height */
    padding: 16px 14px;  /* tighter padding */
  }

  .topic {
    font-size: 20px;
  }

  .slide p {
    font-size: 14px;
    line-height: 1.4;
  }
}

  .course-section-odd {
    padding :24px 16px 32px 16px !important;
    background-color:#E3EDEC;
  }

  .course-section-even {
    background-color: #ffffff;
	padding :24px 16px 32px 16px !important;
  }


  .course-content {
    margin-top: 16px;
  }

  .course-title {
    font-size: 24px;
    font-weight: bold;
    color: #000000;
    margin-bottom: 8px;
  }

  .course-subtitle {
    font-size: 20px;
    color: #000000;
    margin-bottom: 12px;
	  font-weight:500;
  }


  .course-button {
    background-color: #16234E;
    color: #ffffff;
    border-radius: 4px;
    padding: 12px 20px;
    text-decoration: none;
    margin-top: 24px;
    display: block;        
  	margin-left: auto;   
  	margin-right: auto;   
  	text-align: center;   
  	width: fit-content; 
  }
.course-keypoints p {
  font-size: 16px!important;
}
.course-keypoints {
  list-style: none;
  padding: 0px !important;
  margin: 0 ;
}

.course-keypoints li {
  display: flex;              
  align-items: center;        
	}

.course-keypoints li::before {
  content: "✔";
  margin-right: 8px;         
  color: #16234e;
  font-weight: bold;
}
.course-keypoints li p {
 	 margin: 8px 0px;   
	padding: 0px;
	font-size: 16px !important;
	}

/* Tablet view: add space on left & right */
@media (min-width: 768px) and (max-width: 1024px) {
  .carousel-container {
    padding-left: 32px;
    padding-right: 32px;
    box-sizing: border-box;
  }

  .carousel-container amp-carousel {
    border-radius: 12px; 
    overflow: hidden;
  }

  .carousel-container .slide {
    text-align: left!important; 
  }
	
	.course-section-odd, .course-section-even{
		padding:32px!important;
	}
}
	
  /************************* courses section*************************/

  .imagebox-section {
    padding-bottom: 32px !important;
    background-color: #EBF9FC;
  }

  .icon-img {
    width: 60px;
    height: 60px;
    margin-right: 16px;
    flex-shrink: 0;
    margin-bottom: 12px;
  }
	
  .section-title {
    font-size: 20px;
    text-align: left;
    margin-bottom: 20px;
    font-weight: bold;
    color: #1472ba;
  }

  .imagebox-grid {
    display: flex;
    flex-direction: column;
    gap: 20px;
	justify-items: center;
  align-items: center;
  }

  .imagebox {
    display: flex;
    flex-direction: column;
    align-items: center;
	justify-content:center;
	text-align:center;
    padding: 16px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 1px 4px rgba(0, 0, 0, 0.05);
    box-sizing: border-box;
    max-width: 400px;
	width: 300px;
  }

  .imagebox amp-img {
    width: 100%;
    height: 140px;
    object-fit: cover;
  }

  .imagebox-text {
    padding: 12px;
    flex: 1;
  }

  .imagebox-title {
    font-size: 24px;
    margin: 0 0 8px 0;
    font-weight: 600;
    color: #000;
  }

  .imagebox-description {
    font-size: 16px;
    font-weight: 500;
    margin: 0;
    color: #555;
    line-height: 1.4;
  }

  .imagebox-link {
    text-decoration: none;
    color: inherit;
    display: block;
  }
	
/* Tablet: 2 per line */
@media (min-width: 768px) and (max-width: 1024px) {
  .imagebox-grid {
    display: grid; 
    grid-template-columns: 1fr 1fr; 
    gap: 24px; 
    justify-items: center;
  }
}

  /**** clients-logo-section ****/
  .clients-section {
    padding: 32px 0px 24px 0px !important;
    margin: 16px;
    text-align: center;
  }
  .carousel-container {
    margin: 0;

  }

  .carousel-container .hero-static,
  .hero-static-section .hero-static {
    text-align: center;
    max-width: 760px;
    margin: 0 auto;
    padding: 16px 12px;
    align-items: center;
    box-sizing: border-box;
    width: 100%;
    overflow: hidden;
  }

  .carousel-container .hero-static h1,
  .hero-static-section .hero-static h1 {
    font-size: 34px;
    line-height: 1.2;
    margin: 0 0 10px;
    max-width: 100%;
    overflow-wrap: anywhere;
    word-break: break-word;
    text-align: center;
    width: 100%;
  }

  .carousel-container .hero-static h2,
  .hero-static-section .hero-static h2 {
    font-size: 22px;
    line-height: 1.35;
    margin: 0 auto 18px;
    font-weight: 600;
    max-width: 620px;
    overflow-wrap: anywhere;
    word-break: break-word;
    text-align: center;
    width: 100%;
  }

.carousel-container .hero-static .hero-subtitle,
.hero-static-section .hero-static .hero-subtitle {
  font-size: 18px;
  line-height: 1.35;
  margin: 0 auto 18px;
  font-weight: 400;
  max-width: 500px;
  overflow-wrap: anywhere;
  word-break: break-word;
  text-align: center;
  width: 100%;
  font-family: system-ui, -apple-system, "Segoe UI", Roboto, Arial, sans-serif;
}

  .carousel-container .hero-static .course-button,
  .hero-static-section .hero-static .course-button {
    display: inline-block;
  }

  @media (max-width: 640px) {
    .carousel-container .hero-static h1,
    .hero-static-section .hero-static h1 {
      font-size: 28px;
    }

    .carousel-container .hero-static h2,
    .hero-static-section .hero-static h2 {
      font-size: 18px;
    }

  .carousel-container .hero-static .hero-subtitle,
  .hero-static-section .hero-static .hero-subtitle {
    font-size: 15px;
    line-height: 1.3;
    max-width: 360px;
  }
  }

  .amp-carousel {
    margin: 0 auto;
  }

  .carousel-image {
    object-fit: contain;
  }

  .i-amphtml-carousel-pagination {
    bottom: -20px;
  }

  .i-amphtml-carousel-pagination-dot {
    background-color: #000000;
    opacity: 1;
    width: 10px;
    height: 10px;
    margin: 0 4px;
    border-radius: 50%;
  }

  .i-amphtml-carousel-pagination-dot-active {
    background-color: #007BFF;
  }

  /* Hide all AMP carousel navigation arrows and pagination dots */
  amp-carousel > .amp-carousel-button,
  .amp-carousel-button,
  .i-amphtml-carousel-button-prev,
  .i-amphtml-carousel-button-next,
  amp-carousel [role="button"],
  amp-carousel [aria-label*="previous"],
  amp-carousel [aria-label*="next"],
  amp-carousel [aria-label="Previous item"],
  amp-carousel [aria-label="Next item"],
  amp-carousel::part(pagination),
  .amp-carousel-pagination,
  .i-amphtml-carousel-pagination {
    display: none !important;
    visibility: hidden !important;
    pointer-events: none !important;
    height: 0 !important;
    width: 0 !important;
    opacity: 0 !important;
  }

/* ── Clients Section (static responsive logo grid) ── */
.clients-logos-section{
	padding: 40px 20px;
	text-align: center;
	background: transparent;
}
.clients-logos-section .heading{
	margin-bottom: 24px;
}
.clients-logos-grid{
	display: grid;
	grid-template-columns: repeat(2, minmax(0, 1fr));
	gap: 14px;
	max-width: 1200px;
	margin: 0 auto;
}
.clients-logos-item{
	background: #ffffff;
	border-radius: 10px;
	box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
	padding: 12px;
	display: flex;
	align-items: center;
	justify-content: center;
}
.clients-logos-item amp-img{
	width: 100%;
	max-width: 180px;
}
.clients-logos-item amp-img img{
	object-fit: contain;
}
.clients-logos-cta{
	margin-top: 18px;
}
.clients-logos-viewall-btn{
	display: inline-block;
	padding: 12px 18px;
	border-radius: 999px;
	background: #0056b3;
	color: #fff;
	font-weight: 700;
	text-decoration: none;
}
.clients-logos-viewall-btn:hover{
	background: #004a99;
}
@media (min-width: 641px){
	.clients-logos-grid{ grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 16px; }
}
@media (min-width: 768px){
	.clients-logos-grid{ grid-template-columns: repeat(4, minmax(0, 1fr)); gap: 18px; }
}
@media (min-width: 1024px){
	.clients-logos-grid{ grid-template-columns: repeat(6, minmax(0, 1fr)); gap: 20px; }
}
@media (max-width: 640px){
	/* Home: keep 8 logos on mobile for faster paint/LCP. */
	.clients-logos-limited .clients-logos-item:nth-child(n+9){ display: none; }
}
@media (min-width: 641px) and (max-width: 1023px){
	/* Home: keep up to 18 logos on tablet. */
	.clients-logos-limited .clients-logos-item:nth-child(n+19){ display: none; }
}

/* Legacy static client grid (used by New style.php) */
.clients-grid {
	display: grid;
	grid-template-columns: repeat(2, 1fr);
	gap: 20px;
	max-width: 1200px;
	margin: 0 auto;
	padding: 20px 0px;
}
.client-logo {
	display: flex;
	justify-content: center;
	align-items: center;
	min-height: 80px;
}
.client-logo amp-img {
	max-width: 180px;
	width: 100%;
	height: auto;
	opacity: 0.9;
	box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
	border-radius: 8px;
	padding: 12px;
	background: #fff;
}
@media (min-width: 768px) {
	.clients-grid {
		grid-template-columns: repeat(4, 1fr);
	}
}


  /*************************Stats Section*************************/

  /*.section.stats-section {
    padding: 40px 20px;
    text-align: center;
  }



  .count-boxes {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
  }

  .count-box {
    border: 2px solid #ccc;
    border-radius: 12px;
    padding: 20px;
    width: 80%;
    height: 20vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
  }

  .box-title {
    font-weight: bold;
    margin-bottom: 12px;
    font-size: 1.8em;
  }

  .count {
    font-size: 1.8em;
    font-weight: bold;
  }

  .green {
    color: #28a745;
  }

  .yellow {
    color: #ffc107;
  }

  .blue {
    color: #1472ba;
  }

  .red {
    color: #dc3545;
  }
*/
  /*************************Why SucceedLEARN *************************/
	.amp-spacer {
    min-height: 18px;
}
  .whysucceedlearn {
    background-color: #ffffff;
	  padding: 32px 0px !important;
  }
	.why-imagebox-grid {
    display: flex;
    flex-direction: column;
	justify-items: center;
  align-items: center;
  }

  .why-imagebox {
 	display: flex;
 	flex-direction: column;
 	align-items: center;   
 	justify-content: center;
  	text-align: center;    
  	padding: 16px;
    background-color: #fff;
    box-sizing: border-box;
    max-width: 400px;
	width: 300px;
  }
	.border-blue{
		border:solid 2px #1472ba ;
	}
		.border-green{
		border:solid 2px #0D723B ;
	}
		.border-purple{
		border:solid 2px #AC2494 ;
	}
  .why-imagebox amp-img {
    width: 100%;
    height: 140px;
    object-fit: cover;
  }

  .why-imagebox-text {
    padding: 12px;
    flex: 1;
  }

  .why-imagebox-title {
    font-size: 24px;
    margin: 0 0 8px 0;
    font-weight: 600;
    color: #000;
  }

  .why-imagebox-description {
    font-size: 16px;
    font-weight: 500;
    margin: 0;
    color: #555;
    line-height: 1.4;
  }

  .why-imagebox-link {
    text-decoration: none;
    color: inherit;
    display: block;
  }

@media (min-width: 768px) and (max-width: 1024px) {
  .why-imagebox-grid {
    display: flex;
    flex-direction: row;  
    justify-content: center;
    gap: 24px;
  }

  .why-imagebox {
    flex: 1;              
    max-width: 300px;      
    text-align: center;    
  }
}
  /*************************contact us  Section*************************/

.top-bottom-section {
    display: flex;
    flex-direction: column;
	margin:0px !important;
	padding:32px 0px 32px 0px!important;
	background-color:#E3EDEC;

  }

  .top-section,
  .bottom-section {
    box-sizing: border-box;
  }


  .contact-heading {
    font-size: 1.6em;
    font-weight: 600;
    margin: 0;
    padding-bottom: 12px;
    text-align: left;
  }


  .leftaligned-subheading {
    font-size: 24px;
    font-weight: 500;
  }

  .top-image {
    height: auto;
    max-height: 220px;
    object-fit: contain;
    border-radius: 8px;
    margin-bottom: 0;
    margin-top:32px;
	align-content :center;
  }

  .bottom-section {
    padding-top: 20px;
	  width:100% !important;
	  
  }
	.top-section{
		width: 100%;
		padding: 20px;
		align-items: center;
	}

  .bottom-section h2 {
    font-size: 28px !important;
    margin-bottom: 20px;
  }


/* Parent CTA Section */
.common-cta-section {
  max-width: 1200px;
  margin: 0 auto;
  padding: 40px 20px;
  display: flex;
  flex-direction: column;
  flex-wrap: wrap;
  gap: 24px;
  align-items: center;
  background-color: #e3edec;
  border-radius: 12px;
  box-shadow: 0 2px 8px rgba(0,0,0,0.08);
  box-sizing: border-box;
  text-align: center;
}
.common-cta-section .heading {
  width: 100%;
  margin: 0 0 8px;
}

/* Image Wrapper */
.cta-image-wrapper {
  width: 100%;
  max-width: 500px;
}

/* Image Styling */
.cta-image {
  width: 100% !important;
  height: auto !important;
  object-fit: contain;
  border-radius: 12px;
}

/* Form Wrapper */
.cta-form-wrapper {
  width: 100%;
  max-width: 500px;
  text-align: left;
}

/* Override AMP form fields (labels, inputs, textarea) */
.cta-form-wrapper form,
.cta-form-wrapper form label,
.cta-form-wrapper form input,
.cta-form-wrapper form textarea,
.cta-form-wrapper form select {
  text-align: left !important;
}

/* Tablet & desktop: image/form side-by-side, heading on top */
@media (min-width: 768px) {
  .common-cta-section {
    flex-direction: row;
    align-items: flex-start;
    justify-content: center;
    column-gap: 32px;
    row-gap: 20px;
  }
  .cta-image-wrapper,
  .cta-form-wrapper {
    flex: 1 1 420px;
    max-width: 520px;
  }
}

/* Tablet: show only form (hide CTA image) */
@media (min-width: 768px) and (max-width: 1024px) {
  .common-cta-section {
    justify-content: center;
    column-gap: 0;
  }

  .cta-image-wrapper {
    display: none;
  }

  .cta-form-wrapper {
    flex: 1 1 100%;
    max-width: 800px;
    margin-left: auto;
    margin-right: auto;
  }
}

/* Center CTA button in mobile/tablet when form is hidden */
@media (max-width: 1024px) {
  .common-cta-section .cta-form-wrapper > .cta-button {
    display: table;
    margin-left: auto;
    margin-right: auto;
    text-align: center;
  }
}


 
  /*************************Form*************************/

  .succeedlearn-message-form-ui form {
    max-width: 500px;
    margin: 0px !important;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 12px;
    background-color: #fafafa;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
  }

  .succeedlearn-message-form-ui input[type="text"],
  .succeedlearn-message-form-ui input[type="email"],
  .succeedlearn-message-form-ui textarea {
    width: 100%;
    padding: 12px 14px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 8px;
    font-size: 16px;
    box-sizing: border-box;
  }

  .succeedlearn-message-form-ui textarea {
    height: 120px;
    resize: vertical;
  }

  .succeedlearn-message-form-ui button {
    background-color: #007bff;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 8px;
    font-size: 16px;
    cursor: pointer;
    width: 100%;
    transition: background-color 0.3s ease;
  }
   .succeedlearn-message-form-ui .required {
        color: red !important;
		font-weight: bold;

    }
	.succeedlearn-message-form-ui{
		padding:0px !important;
	}
/* === Form Wrapper Styling === */
#succeedlearn-message-form {
     background: #f5fafd !important;
    box-shadow: 0 4px 24px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    padding: 24px 16px;
    margin: 16px;
    box-sizing: border-box;
    max-width: 600px;
}

#succeedlearn-message-form label {
    display: block;
    margin-bottom: 6px;
    font-weight: 500;
    color: #333;
}

#succeedlearn-message-form .required {
    color: #e63946; 
    margin-left: 2px;
}

/* === Inputs & Textarea === */
#succeedlearn-message-form input[type="text"],
#succeedlearn-message-form input[type="email"],
#succeedlearn-message-form textarea {
    width: 100%;
    padding: 10px 12px;
    margin-bottom: 16px;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 1rem;
    box-sizing: border-box;
}

#succeedlearn-message-form .succeedlearn-privacy {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 16px;
}

#succeedlearn-message-form .succeedlearn-privacy a {
    color: #1472ba;
    text-decoration: none;
    font-weight: 500;
}

#succeedlearn-message-form .succeedlearn-privacy a:hover {
    text-decoration: underline;
}

#succeedlearn-message-form .succeedlearn-btn {
    background-color: #1472ba;
    color: #fff;
    border: none;
    padding: 12px 20px;
    border-radius: 6px;
    font-size: 1rem;
    cursor: pointer;
    width: 100%;
    transition: background-color 0.3s ease;
}

#succeedlearn-message-form .succeedlearn-btn:hover {
    background-color: #0f5d9e;
}


  /************************Security awareness page css************************/
  /* Base Typography */

  h2,
  h3 {
    margin: 0;
  }

  .security-awareness-banner {
    background-color: transparent;
    margin-bottom: 20px;
  }

  /* Content Sections */

  .section-content {
    flex: 1 1 300px;
    width: 100%;
    max-width: 1200px !important;
    text-align: left;
  }
	.subcategory-content{
	max-width: 800px !important;
    text-align: left;
	}
  .subcategory-heading {
    font-size: 20px !important;
    font-weight: bold;
    margin-bottom: 10px;
    color: #111;
    line-height: 1.3;
  }
	.category-heading {
    font-size: 28px !important;
    font-weight: bold;
    margin-bottom: 10px;
    color: #111;
    line-height: 1.3;
  }

  .subcategory-subtitle {
    font-size: 24px;
    margin-bottom: 1rem;
    color: #000;
    line-height: 1.5;
	 font-weight:600;
  }

  .subcategory-keypoints {
    list-style: disc;
    padding-left: 20px;
    margin-bottom: 20px;
    color: #555;
  }

  .subcategory-keypoints li {
    margin-bottom: 8px;
    font-size: 16px !important;
    line-height: 1.5;
	  font-weight: 500;
	  color: #000000;
  }


/* ===== Why SucceedLEARN Section ===== */
.why-succeedlearn-section {
  background: #e8edec;
  padding: 50px 40px;
  box-sizing: border-box;
}

.why-succeedlearn-section-content {
  max-width: 1200px;
  margin: 0 auto;
}

.why-succeedlearn-subtitle {
  font-size: 18px;
  font-weight: 500;
  text-align: center;
  margin-bottom: 40px;
  color: #000;
  font-family: "Open Sans", sans-serif;
}

/* Boxes Grid */
.why-succeedlearn-boxes {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 20px;
}

/* Gradient Boxes */
.gradient-box {
  background: #fff;
  padding: 20px;
  border-radius: 8px;
  display: flex;
  flex-direction: column;
  justify-content: center; /* vertical center */
  align-items: center; /* horizontal center */
  text-align: center;
  transition: transform 0.3s ease;
  min-height: 220px; /* minimum height for uniformity */
  box-sizing: border-box;
}

.gradient-box:hover {
  transform: translateY(-4px);
}

/* Icon */
.gradient-box .icon {
  margin-bottom: 12px;
}

.gradient-box .icon img,
.gradient-box .icon amp-img {
  width: 50px;
  height: 50px;
}
.gradient-box .icon amp-img img{
  object-fit: contain;
}

/* Paragraph */
.gradient-box p {
  font-size: 16px;
  line-height: 1.5;
  color: #333;
  margin: 0;
}

/* ===== Tablet ===== */
@media (max-width: 1024px) {
  .why-succeedlearn-section {
    padding: 50px 30px;
  }

  .why-succeedlearn-boxes {
    grid-template-columns: repeat(2, 1fr);
    gap: 16px;
  }

  .gradient-box {
    padding: 18px;
    min-height: 200px; 
  }

  .gradient-box .icon img,
  .gradient-box .icon amp-img {
    width: 45px;
    height: 45px;
  }

  .gradient-box p {
    font-size: 15px;
  }
}

/* ===== Mobile ===== */
@media (max-width: 600px) {
  .why-succeedlearn-section {
    padding: 40px 16px;
  }

  .why-succeedlearn-boxes {
    grid-template-columns: 1fr;
    gap: 16px;
  }

  .gradient-box {
    padding: 16px;
    min-height: 200px; 
    justify-content: center; 
    align-items: center; 
  }

  .gradient-box .icon img,
  .gradient-box .icon amp-img {
    width: 40px;
    height: 40px;
  }

  .gradient-box p {
    font-size: 14px;
    line-height: 1.4;
  }
}



	.s-aware-section, .s-phish-section, .s-bytes-section, .s-play-section, .s-signs-section, .s-metrics-section, .s-sync-section{
    display: flex;
    flex-direction: row;
    flex-wrap: wrap; 
    max-width: 1200px;
    justify-content: center; 
    align-items: center;
	text-align: center;
    padding: 32px 16px !important;
	border-radius: 12px;
	}
	.s-aware-section, .s-bytes-section, .s-signs-section, .s-sync-section{
		background-color:#ffffff;
	}
	.s-phish-section{
		background-color:#EFF1FF;
	}
	.s-play-section{
		background-color:#E6FDFF;
	}
	.s-metrics-section{
		background-color:#FFF5F0;
	}
.s-bytes-section .subcategory-image amp-img {
  margin-top: 20px;
}
.subcategory-content .button-wrapper {
  text-align: center;
  margin-top: 20px;
}

.subcategory-content .button {
  display: inline-block;
  padding: 10px 20px;
  background: #16234e;
  color: #fff;
  border-radius: 6px;
  text-decoration: none;
  font-weight: 600;
}
.gradient-boxes {
  display: grid;
  grid-template-columns: 1fr; 
  gap: 20px;
}
/* Default: mobile – center the image */
.subcategory-image {
  width: 100%;
  display: flex;
  justify-content: center; 
  margin-bottom: 16px;
}

/* Make the image responsive */
.subcategory-image amp-img {
  width: 100%;  
  max-width: 300px; 
  height: auto;
  object-fit: contain;
}

@media (min-width: 768px) {
  .gradient-boxes {
    grid-template-columns: 1fr 1fr; 
  }
}

/* Tablet view */
@media (min-width: 768px) and (max-width: 1024px) {
  .s-aware-section,
  .s-phish-section,
  .s-bytes-section,
  .s-play-section,
  .s-signs-section,
  .s-metrics-section,
  .s-sync-section {
    display: block;           
    max-width: none;         
    width:100% !important; 
	padding: 24px !important;
    margin: 0px !important;          
    box-sizing: border-box;
  }

  .subcategory-image,
  .subcategory-content {
    width: 100%;
    text-align: left !important;      
  }
	.subcategory-image {
    justify-content: center;
    margin-bottom: 24px;     
  }
}



<?php if ($sl_is_s_aware_page) : ?>
/************************S-Aware************************/

/**Banner section */

	.aware-banner-heading{
	   color:#AC2890;
	}
	  .phish-banner-heading{
	   color: #283384;
	}

  /* table section */
  .table-section {
    padding: 24px 20px 40px 20px;
    background-color: #E3EDEC;
    margin-top: 24px;
  }

  .table-heading h2 {
    text-align: center;
    font-size: 1.4rem;
    margin-bottom: 24px;
    color: #222;
  }

  .table-wrapper {
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    overscroll-behavior-x: contain;
    border-radius: 10px;
  }

  .custom-table {
    width: 100%;
    min-width: 620px;
    border-collapse: collapse;
    font-size: 1rem;
    color: #333;
  }

  .custom-table th,
  .custom-table td {
    border: 1px solid #ccc;
    padding: 16px;
    text-align: left;
    vertical-align: top;
	  background-color: #ffffff;
  }

  .custom-table tr.heading-bg {
    background-color: #3528ac !important;
  }

  .custom-table tr.heading-bg th {
    color: #ffffff;
    font-weight: 600;
	  background-color:#AC2890;
  }

  /*CTA */

  .cta {
    background-image: url(https://succeedlearn.co/wp-content/uploads/2025/06/BG-Aboyr-CTA.png);
    background-color: #af71ff;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    padding: 20px;
    margin: 16px;
    border-radius: 12px;
  }


  .cta-explaination {
    color: rgb(0, 0, 0);
    font-size: 1.1em;

  }

  .cta-button {
    color: rgb(230, 230, 230);
    background: #FF9C00;
    padding: 8px 20px;
    border: none;
    border-radius: 4px;
    font-size: 1.2em;
    text-decoration: none;
  }
<?php endif; ?>
<?php if ($sl_is_s_phish_page) : ?>
  /************************S-Phish************************/

	.phish-banner-heading{
	   color: #283384;
	   margin-top: 60px;
	  font-size: 42px !important;
	}
	.view-more-section-heading{
	font-size: 24px;
    font-weight: 600;
    margin: 0;
    text-align: left;
    color: #000000;
	}
	.phish-even-section {
    background-color: #ffffff;
    display: flex;
    flex-direction: row;
    flex-wrap: wrap; 
    max-width: 1200px;
    margin: 0 auto;
    justify-content: center; 
    align-items: center; 
    padding: 20px; 
}
	 .phish-section-keypoints {
    list-style-type: disc;
    padding-left: 16px !important;
    color: #333;
    line-height: 1.6;
    margin: 1rem 0;
  }
  .keys-section {
    padding: 16px !important;
	background-color: #EBF9Fc !important;
	 gap:32px !important;
	 margin-top: 32px !important;
  }
	.s-phish-key-even-section{
	background-color: #ffffff;   
    flex-direction: row;
    flex-wrap: wrap; 
    max-width: 1200px;
    margin: 0px 0px 32px 0px !important;
    justify-content: center; 
    align-items: left !important; 
    padding: 20px; 
	border-radius:12px;
	}
	.s-phish-keys-section{
	padding: 24px 16px !important;
	background-color: #e8edec !important;
	 gap:20px !important;
	 margin-top: 32px !important;
	margin-bottom: 32px !important;
	text-align: left;
	}
	  .keys-sub-heading {
    font-size: 24px !important;
    font-weight: 600;
    margin: 0;
    text-align: left !important;
    color: #000000;
  }


.s-phish-key-even-section .description {
  margin: 0;
}


.amp-image-section {
   padding: 40px 16px !important;
   background: #E3EDEC;
   text-align: center;
  }

  .amp-image-section .heading {
    font-size: 28px;
    font-weight: bold;
    margin-bottom: 10px;
    color: #283384;
  }

  .amp-image-section .subheading {
    font-size: 20px;
    color: #000000;
    margin-bottom: 20px;
	  font-weight:500;
	  padding: 0px 16px !important;
  }

  .image-list {
    display: grid;
    flex-direction: column;
    gap: 20px;
    max-width: 800px;
    margin: 0 auto;
  }
	.phish-image-list{
	display: grid;
    flex-direction: column;
    gap: 32px !important;
    max-width: 800px;
    margin: 24px auto;
	}
.image-item {
  background: #fff; 
  padding: 15px;    
  border-radius: 10px; 
  box-shadow: 0 2px 6px rgba(0,0,0,0.1); 
}
  .image-item amp-img {
    border-radius: 8px;
  }
	
/* Sticky & Scrollable Tab Menu */
.tab-menu {
  position: sticky;
  top: 60px; 
  background: #ffffff;
  padding: 10px 16px !important;
  display: flex;
  overflow-x: auto;
  scrollbar-width: thin; 
  -ms-overflow-style: none; 
  z-index: 99;
}
.tab-menu::-webkit-scrollbar {
  display: none; 
}
.tab-menu div {
  flex: 0 0 auto;
  padding: 10px 20px;
  margin: 0 8px;
  border-radius: 4px;
  font-size: 14px;
  font-weight: 600;
  color: #1472ba;
  background: #ffffff !important;
  cursor: pointer;
  transition: all 0.3s ease;
  white-space: nowrap;
	border: solid 2px #1472ba;

}
.tab-menu div[selected] {
  background: #123456;
  color: #ffffff;
  box-shadow: 0 2px 8px rgba(0,0,0,0.2);
	border:none!important;
}

/* Tab Content */
.tab-content [role="tabpanel"] {
  display: none;
}
.tab-content [role="tabpanel"][selected] {
  display: block;
  margin-top: 20px;
padding:0px 16px !important;
}

/* Section wrapper */
.how-it-works-section {
  background-color: #fff;
  padding: 40px 20px;
  max-width: 1200px;
  margin: 0 auto;
}

/* Heading styles */
.how-it-works-section .heading {
  font-size: 24px;
  font-weight: 700;
  margin-bottom: 10px;
  text-align: center;
}
.how-it-works-section .heading .black { color: #222; }
.how-it-works-section .heading .blue { color: #1472ba; }
.how-it-works-section .subheading {
  font-size: 16px;
  text-align: center;
  color: #444;
  margin-bottom: 30px;
  font-weight: 500;
}
	.amp-image-section .phish-subheading {
    font-size: 1.2em;
    font-weight: 500;
    margin: 0;
    text-align:left !important;
    color: #000000;
  }


/* Section inner headings */
.phish-inner-heading {
  font-size: 20px;
  font-weight: 600;
  text-align: left;
  margin: 30px 0 10px 0;
  color: #222;
}
.phish-inner-description {
  font-size: 15px;
  line-height: 1.6;
  color: #333;
  margin-bottom: 20px;
  text-align: left;
}

/* Icon box wrapper */
.phish-icon-box-wrapper {
  display: flex;
  flex-wrap: wrap;
  gap: 20px;
  justify-content: center; 
  margin-bottom: 20px;
}

/* Each icon box */
.phish-icon-box {
  display: flex;
  align-items: center;  
  gap: 15px;
  padding: 15px;
  border: 1px solid #eaeaea;
  border-radius: 10px;
  background: #fff;
  flex: 1 1 300px;
  max-width: 400px;
}

/* Icon itself */
.phish-icon {
  flex: 0 0 60px;
  display: flex;
  align-items: center;
  justify-content: center;
}
.phish-icon-img {
  max-width: 48px;
  max-height: 48px;
}

/* Text inside box */
.phish-content {
  flex: 1;
  text-align: left;
}
.phish-title {
  font-weight: 700;
  font-size: 16px;
  margin: 0 0 6px 0;
  color: #222;
}
.phish-description {
  font-size: 14px;
  line-height: 1.6;
  color: #555;
}

/* Bottom description */
.phish-section-description {
  font-size: 15px;
  line-height: 1.6;
  color: #333;
  margin-top: 30px;
  text-align: left!important;
}
<?php endif; ?>
	
	  /*FAQ */
  .faq-section {
    padding: 32px 20px;
    background-color: #ffffff !important;
    font-family: 'Open Sans', sans-serif;
    max-width: 800px;
    margin: 0 auto;
  }

  .faq-heading {
    text-align: center;
    font-size: 32px;
    color: #283384;
    margin-bottom: 30px;
  }

  .faq-accordion section {
    border-radius: 8px;
    margin: 20px 0px;
    border: 1px solid #1472ba;
    overflow: hidden;
    background-color: #ffffff;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.06);
    transition: box-shadow 0.3s ease;
  }

  .faq-accordion section:hover {
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
  }

  .faq-question {
    margin: 0;
    padding: 14px 18px;
    font-size: 16px;
    font-weight: 500;
    color: #333;
    background-color: #ffffff;
    cursor: pointer;
    transition: background-color 0.3s ease;
	 padding-right: 40px; 
  }

  .faq-question:hover {
    background-color: #ffffff;
  }

  .faq-answer {
    padding: 12px 18px;
    background-color: #ffffff;
    color: #444;
    font-size: 15px;
    line-height: 1.5;
  }

  .faq-answer p {
    margin: 0;
  }

  .q-a {
    padding: 0px;
  }
	/* + icon by default */
.faq-question::after {
  content: "+";
  font-size: 20px;
  font-weight: bold;
  position: absolute;
  right: 16px;
  top: 50%;
  transform: translateY(-50%);
  color: #1472ba;
  transition: transform 0.3s ease;
}

/* Change + to – when expanded */
[expanded] .faq-question::after {
  content: "–";
  font-size: 20px;
}
<?php if ($sl_is_s_bytes_page) : ?>
  /************************Security awareness S-Bytes ************************/

	
.bytes-banner-heading{
	   color: #226968;
	   margin: 60px 0px 0px 0px ;
	  font-size: 42px !important;
	}
	
.bytes-hero-section-bottom {
  width: 100%;           
  max-width: 900px;     
  margin: 0 auto;        
  border-radius: 8px;    
  overflow: hidden;     
}


	.bytes-sub-heading{
	font-size: 18px;
    font-weight: 600;
    margin: 0;
    text-align:center !important;
    color: #000000;
  }
.s-bytes-why-section, .s-bytes-awareness-section{
	display: flex;
    flex-direction: row;
    flex-wrap: wrap; 
    max-width: 1200px;
    margin: 24px auto !important;
    justify-content: center; 
    align-items: center; 
    padding:  0px 20px 20px 20px; 
	}
	
	.s-bytes-why-section{
		background-color:#e8edec;
		padding: 32px 20px !important;
	}
	.s-bytes-awareness-section{
		background-color:#ffffff;
		padding: 32px 20px !important;
	}
  .custom-section {
    padding: 24px 16px;
    background: #f5f7fa;
    text-align: center;
  }

  .section-header {
    margin-bottom: 24px;
  }

  .main-heading {
    font-size: 1.8rem;
    font-weight: 700;
    margin: 0;
    color: #222;
    text-align: left;
  }

  .main-description {
    font-size: 1rem;
    color: #555;
    margin-top: 8px;
    text-align: left;
  }

  .inner-container {
    background: #ffffff;
    padding: 24px;
    border-radius: 12px;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.05);
  }

  .inner-heading {
    font-size: 1.4rem;
    font-weight: 600;
    margin-bottom: 8px;
    color: #333;
    text-align: left;
  }

  .bytes-inner-description {
    font-size: 16px;
    color: #000000;
	  font-weight:500;
    margin-bottom: 0px 0px 0px 16px !important;
    text-align: left;
  }

  .section-button {
    background: #007bff;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 6px;
    font-size: 1rem;
    margin-bottom: 24px;
  }


/* Mobile default: 1 per row */
.icon-box-grid {
  display: grid;
  grid-template-columns: 1fr;
  gap: 20px;
  align-items: center;
  justify-content: center;
}

/* Tablet: force 2 per row */
@media (min-width: 768px) and (max-width: 1023px) {
  .icon-box-grid {
    grid-template-columns: repeat(2, 1fr);
	 min-height: 200px;
  }
}


  .icon-box {
    background: #fff;
    padding: 16px;
    border-radius: 10px;
    text-align: center;
    box-shadow: 0 2px 12px rgba(0, 0, 0, 0.05);
	 align-items:center;
	 min-height: 200px;
  }

  .icon-title {
    font-size: 1.1rem;
    font-weight: 600;
    margin: 0;
    color: #222;
    text-align: center;
  }

  .icon-description {
    font-size: 0.9rem;
    color: #555;
    margin-top: 8px;
    text-align: center;
  }

  .main-videosection {

    padding: 24px;
    max-width: 100%;
    overflow-x: hidden;
    border-radius: 12px;
    background-color: #ffffff!important;
  }

  * {
    box-sizing: border-box;
  }


	.videobox-container-odd-section{
	background-color: #e8edec !important;
    display: flex;
    flex-direction: row;
    flex-wrap: wrap; 
    max-width: 1200px;
    margin: 0px !important;
    justify-content: center; 
    align-items: center; 
    padding: 32px 20px 0px  20px !important; 
	}

  .videobox-container-title {
    font-size: 32px;
    font-weight: 600;
    margin: 12px 0px 0px 0px !important;
    padding-bottom: 32px;
    text-align: center;
  }

  .videobox-fullwidth,
  .videobox-row {
    display: flex;
    flex-direction: column;
    gap: 24px;
  }

  .videobox {
    width: 100%;
    background-color: #f9f9f9;
    border-radius: 12px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    text-align: left;
    max-width: 100%;
    overflow: hidden;
    margin-bottom: 24px;
  }

  .videobox-img {
    display: block;
    width: 100%;
    height: auto;
    border-top-left-radius: 12px;
    border-top-right-radius: 12px;
    margin: 0;
    padding: 0;
  }

  .videobox-content {
    padding: 16px;
  }

  .videobox-title {
    font-size: 20px;
    font-weight: 600;
    color: #222;
    margin: 8px 0;
  }

  .videobox-description {
    font-size: 16px;
    color: #555;
    margin: 0;
  }

  .videosection {
    padding: 0px;
	  background-color:#ffffff !important;
  }

  .i-amphtml-fill-content {
    object-fit: cover !important;
  }

.videobox-row {
  display: grid;
  grid-template-columns: 1fr; 
  gap: 20px;
  justify-items: center; 
}

@media (min-width: 768px) and (max-width: 1023px) {
  .videobox-row {
    grid-template-columns: repeat(2, 1fr);
	 justify-items: center;
  }
}

.videobox-img {
  border-radius: 8px;
  object-fit: cover;
}
@media (min-width: 768px) and (max-width: 1023px) {
  .bytes-hero-section-bottom {
    max-width: 700px;    
  }
}

<?php endif; ?>
<?php if ($sl_is_s_metrics_page) : ?>
  /************************Security awareness S-Metrics ************************/

.metrics-banner-heading{
	color: #EE7A41;
	margin: 60px 0px 0px 0px;
	font-size: 42px !important;
	}
.s-metrics-image-box-top-1{
	background-color:#FB5D76;
	}
.moodule-section {
  padding: 32px 0px !important;
  }


.s-metrics-grid {
  display: grid;
  grid-template-columns: 1fr;
  gap: 20px;
  width: 100%;
}

	/* Each card */
.s-metrics-box {
  display: flex;
  flex-direction: column;
  border-radius: 10px;
  overflow: hidden; 
  box-shadow: 0 2px 6px rgba(0,0,0,0.1);
  background: #fff;
}

/* Top colored section */
.s-metrics-box-top {
  display: flex;
  align-items: center;
  justify-content: flex-start;
  padding: 20px;
}
.s-metrics-bg-1 { background-color: #FB5D76; }
.s-metrics-bg-2 { background-color: #5F5F83; }
.s-metrics-bg-3 { background-color: #FC9644; }
.s-metrics-bg-4 { background-color: #9E76D9; }

/* Icon */
.s-metrics-icon {
  display: block;
}

/* Bottom white section */
.s-metrics-box-bottom {
  background: #fff;
  padding: 20px;
  text-align: left;
}
.s-metrics-title {
  font-size: 18px;
  font-weight: 600;
  margin-bottom: 8px;
  color: #222;
}
.s-metrics-description {
  font-size: 14px;
  line-height: 1.6;
  color: #555;
}
	
/* Tablet: 2 per row */
@media (min-width: 768px) and (max-width: 1023px) {
  .s-metrics-grid {
    grid-template-columns: repeat(2, 1fr);
  }
}



/* Parent Section */
.module-sections {
  max-width: 1200px;
  margin: 0 auto;
  padding: 40px 20px;
  display: flex;
  flex-direction: column;
  gap: 24px;
  align-items: center;
}

/* Individual Module */
.module {
  background: #fff;
  border-radius: 12px;
  box-shadow: 0 2px 6px rgba(0,0,0,0.1);
  width: 100%; 
  padding: 16px;
  box-sizing: border-box;
}

/* Module Header: Heading + Image */
.module-header {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  gap: 16px;
}

/* Module Title */
.module-title {
  font-size: 22px;
  margin: 0;
}

/* Optional: Different colors for each module */
.module-title-1 { color: #AC2890; }
.module-title-2 { color: #F97316; }
.module-title-3 { color: #06B6D4; }
.module-title-4 { color: #283384; }
.module-title-5 { color: #B42AD1; }
.module-title-6 { color: #CD414C; }

/* Module Image */
.module-image amp-img {
  width: 100%;
  max-width: 120px;
  height: auto;
}

/* Keypoints List */
 .module-keypoints{
  margin-top: 16px;
  padding-left: 0px;
  list-style: disc;
}
.module-keypoints li {
  display: flex;              
  align-items: center;        
	}

.module-keypoints li::before {
  content: "✔";
  margin-right: 8px;         
  color: #16234e;
  font-weight: bold;
}
.module-keypoints li p {
 	margin: 8px 0px;   
	padding: 0px;
	font-size: 16px !important;
	}
	
/* Tablet View: Image Left, Heading Right, same width */
@media (min-width: 768px) and (max-width: 1023px) {
  .module {
    width: 90%; 
  }
  .module-header {
    flex-direction: row; 
    align-items: center;
    gap: 20px;
  }
  .module-image {
    flex-shrink: 0;
  }
  .module-title {
    font-size: 20px;
    margin: 0;
  }
}

/* Mobile: reduce module icon size */
@media (max-width: 767px) {
  .module-image amp-img {
    max-width: 88px;
  }
}

<?php endif; ?>
<?php if ($sl_is_s_play_page) : ?>
  /************************Security awareness S-play ************************/
  .play-banner-heading{
	   color: #47B6C1;
	   margin-top: 60px;
	  font-size: 42px !important;
	}
	
	
.s-play-even-section,
.s-play-odd-section {
    background-color: #E3EDEC;
    display: flex;
    flex-direction: row;
    flex-wrap: wrap; 
    max-width: 1200px;
    margin: 20px auto;
    justify-content: center; 
    align-items: center; 
    padding: 20px;
}
.s-play-even-section{
		background-color: #ffffff !important;
		margin: 24px 16px !important;
	}
.s-play-view-more-section-heading{
	font-size:16px;
    font-weight:600;
    margin: 0;
    text-align: center;
    color: #000000;
	}
	.s-play-videobox-container-odd-section{
	background-color: #e8edec !important;
    display: flex;
    flex-direction: row;
    flex-wrap: wrap; 
    max-width: 1200px;
    margin:24px 0px !important;
    justify-content: center; 
    align-items: center; 
    padding: 32px 20px 20px  20px !important; 
	}
	.s-play-whats-next-section{
	background-color: #e8edec;
    display: flex;
    flex-direction: row;
    flex-wrap: wrap; 
    max-width: 1200px;
    margin: 20px auto;
    justify-content: center; 
    align-items: center; 
    padding: 32px 20px !important;
	}
	.s-play-moodule-section {
    padding: 0px !important;
		
  }
	.s-play-videobox-container-odd-section .heading{
		margin-bottom:24px !important;
	}
	
	.s-play-cta-section {
  background-color: #ffffff;
  padding: 40px 20px;
  display: flex;
  justify-content: center;
}

.s-play-cta-inner {
  background-color: #e8edec;
  border-radius: 12px;
  padding: 30px 20px;
  max-width: 600px;
  text-align: center;
  width: 100%;
  box-shadow: 0 4px 10px rgba(0,0,0,0.05);
}

.s-play-cta-image {
  max-width: 150px;
  margin: 0 auto 20px;
  display: block;
}

.s-play-cta-title {
  font-size: 28px;
  margin: 10px 0;
  color: #222;
}

.s-play-cta-desc {
  font-size: 16px;
  margin: 10px 0;
  color: #444;
}

.s-play-cta-bold {
  font-weight: bold;
  font-size: 18px;
  margin: 15px 0;
  color: #000;
}

.s-play-cta-btn {
  display: inline-block;
  padding: 12px 25px;
  background-color: #47B6C1;
  color: #fff;
  border-radius: 6px;
  text-decoration: none;
  font-weight: bold;
  transition: background 0.3s ease;
}


<?php if ($sl_is_s_sync_page) : ?>
<?php endif; ?>
  /************************Security awareness S-Sync ************************/

.sync-banner-heading{
	   color: #9B41FA!important;
	   margin-top: 60px;
	  font-size: 42px !important;
	}
	.s-sync-integration-section{
	background-color: #ffffff !important;
    display: flex;
    flex-direction: row;
    flex-wrap: wrap; 
    max-width: 1200px;
    margin:24px 0px !important;
    justify-content: center; 
    align-items: center; 
    padding: 32px 20px 0px  20px !important; 
	}
  .s-sync-sso-section, .s-sync-rest-api-section, .s-sync-pre-built-section, .s-sync-scim-section {
    flex-direction: row;
    max-width: 1200px;
    margin: 0 auto;
    border-radius: 12px;
	margin: 12px 0px 20px 0px;
	padding:20px 16px !important;
  }

	.s-sync-sso-section {
		background-color:#FFCDD2;
	}
	
	.s-sync-rest-api-section{
		background-color:#E7DDF7;
	}
	.s-sync-pre-built-section{
		background-color:#CEECFD;
	}
	
	.s-sync-scim-section{
		background-color:#D2FBF9;
	}
  .s-sync-heading {
    font-size: 24px !important;
    font-weight: 600;
    margin: 0;
    padding-bottom: 12px;
    text-align: left;
  }
  .key-imagebox-grid {
    display: flex;
    flex-direction: column;
    gap: 20px;
    padding: 0px 24px;
    padding-top: 32px;
    background-color: #F4F2FC;
  }

  .key-imagebox {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    padding: 12px 12px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 1px 4px rgba(0, 0, 0, 0.05);
    box-sizing: border-box;
    max-width: 400px;
  }

  .key-imagebox amp-img {
    width: 100%;
    height: 140px;
    object-fit: cover;
  }

  .key-imagebox-text {
    padding: 12px;
    flex: 1;
  }

  .key-imagebox-title {
    font-size: 18px;
    margin: 0 0 8px 0;
    font-weight: 600;
    color: #000;
  }

  .key-imagebox-description {
    font-size: 16px;
    margin: 0;
    color: #555;
    line-height: 1.4;
  }

  .key-imagebox-section {
    padding: 24px 16px;
    background-color: #F4F2FC;
    margin-top: 32px;
  }
.s-sync-icons {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
  gap: 20px;
  margin-top: 20px;
}

.s-sync-icon {
  display: flex;
  align-items: center;
  background: #fff;
  border-radius: 10px;
  padding: 10px 14px;
  box-shadow: 0 2px 6px rgba(0,0,0,0.08);
}

.s-sync-icon amp-img {
  margin-right: 10px;
  flex-shrink: 0;
}

.s-sync-icon span {
  font-size: 15px;
  font-weight: 500;
  color: #222;
}
.sync-imagebox-section {
    padding: 32px  16px !important;
    background-color: #e8edec;
  }
	


.sync-imagebox-grid {
  display: grid;
  grid-template-columns: 1fr; 
  gap: 20px; 
}
 .sync-imagebox {
    display: flex;
    flex-direction: column;
    align-items: center;
	 text-align: center !important;
    padding: 12px 20px !important;
    box-sizing: border-box;
    max-width: 400px;
	width: 300px;
  }

  .sync-imagebox amp-img {
    width: 100%;
    height: 140px;
    object-fit: cover;
  }

  .sync-imagebox-text {
    padding:0px;
    flex: 1;
  }

  .sync-imagebox-title {
    font-size: 18px;
    margin: 12px 0 8px 0 !important;
    font-weight: 500;
    color: #000;
	  text-align:center!important;
  }


/* Section wrapper */
.s-sync-key-section {
  max-width: 1200px;
  margin: 0 auto;
  padding: 40px 20px;
  background: #ffffff;
}

/* Grid */
.s-sync-key-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 20px;
}

/* Each card */
.s-sync-key-box {
  display: flex;
  flex-direction: column;
  border-radius: 10px;
  overflow: hidden; 
  box-shadow: 0 2px 6px rgba(0,0,0,0.1);
  background: #fff;
}

/* Top colored section */
.s-sync-key-box-top {
  display: flex;
  align-items: center;
  justify-content: flex-start;
  padding: 20px;
}
.s-sync-key-bg{ background-color:#E8ECED; }

/* Icon */
.s-sync-key-icon {
  display: block;
}

/* Bottom white section */
.s-sync-key-box-bottom {
  background: #fff;
  padding: 20px;
  text-align: left;
}
.s-sync-key-title {
  font-size: 18px;
  font-weight: 600;
  margin-bottom: 8px;
  color: #222;
}
.s-sync-key-description {
  font-size: 14px;
  line-height: 1.6;
  color: #555;
}
	
	.reporting-title-1{color: #AC2890!important;}
	.reporting-title-2{color: #F97316!important;}
	.reporting-title-3{color: #06B6D4!important;}
	.reporting-title-4{color: #283384!important;}
	.reporting-title-5{color: #B42AD1!important;}
	.reporting-title-6{color: #CD414C!important;}
	


@media (min-width: 768px) and (max-width: 1024px) {
	
	.s-sync-sso-section, .s-sync-rest-api-section, .s-sync-pre-built-section, .s-sync-scim-section {
    flex-direction: row;
    margin: 0 auto;
    margin: 12px 0px 20px 0px;
    border-radius: 12px;
    padding: 20px 16px;
    min-width: 700px !important;
		max-width:700px !important;
		
	}
	.s-sync-sso-section .description{
		margin:0px !important;
	}
	 .sync-imagebox-grid {
    grid-template-columns: repeat(2, 1fr);
  }
	}
<?php endif; ?>
	
	
<?php if ($sl_is_s_signs_page) : ?>
  /************************Security awareness S-Signs ************************/
.signs-banner-heading{
	   color: #9642AC !important;
	   margin-top: 60px;
	  font-size: 42px !important;
	}
	
	
.view-more-section-sub-heading{
	font-size: 18px;
    font-weight:600;
    margin: 0;
    text-align: center;
    color: #000000;
	}
.what-signs-section,.signs-key-features-section, .signs-launch-section {
  background-color: #e8edec !important;
  display: flex;
  flex-direction: row;
  flex-wrap: wrap;
  max-width: 1200px;
  margin: 0 auto;
  justify-content: space-between;
  align-items: center;
  padding: 24px 20px;
}
	.signs-key-features-section{
		background-color:#FFF0E1 !important;
	}
	
.signs-key-features-section .heading {
  display: inline-flex;
  align-items: center;
  gap: 8px; 
  justify-content: center;
  font-size: 24px; 
  line-height: 1.3;
}

.signs-key-features-section .heading .title-icon {
  width: 20px;
  height: 20px;
  flex-shrink: 0;
  margin-top: 2px; 
}

@media (min-width: 768px) {
  .signs-key-features-section .heading .title-icon {
    width: 24px;
    height: 24px;
    margin-top: 0;
  }
}

	
.signs-launch-section{
		background-color:#C0FFF8 !important;
	}
	
.signs-launch-section .heading,
.signs-key-features-section .heading {
  display: inline-flex;
  align-items: center;
  gap: 8px; 
  justify-content: center;
  font-size: 22px;
  line-height: 1.3;
  text-align: left;
  width: 100%;
}

.signs-launch-section .title-icon,
.signs-key-features-section .title-icon {
  width: 20px;
  height: 20px;
  flex-shrink: 0;
  margin-top: 2px;
}

@media (min-width: 768px) {
  .signs-launch-section .heading,
  .signs-key-features-section .heading {
    justify-content: center;
    gap: 8px; 
  }

  .signs-launch-section .title-icon,
  .signs-key-features-section .title-icon {
    width: 28px;
    height: 28px;
    margin-top: 0;
  }
}

/* Mobile view fix */
@media (max-width: 767px) {
  .signs-launch-section .heading,
  .signs-key-features-section .heading {
    justify-content: flex-start;
    gap: 0;
  }

  .signs-launch-section .title-icon,
  .signs-key-features-section .title-icon {
    margin-right: 6px; 
  }
}


.s-signs-sub-heading {
    font-size: 18px;
    font-weight: 600;
    margin: 0;
    text-align: center;
    color: #000000;
  }
.signs-imagebox-section {
    padding: 32px  16px!important;
    background-color: #ffffff;
  }

  .icon-img {
    width: 60px;
    height: 60px;
    margin-right: 16px;
    flex-shrink: 0;
    margin-bottom: 12px;
  }
	
.signs-course-image amp-img img {
  object-fit: contain;
  width: 100%;
  height: 100%;
  display: block;
  background: transparent;
}

  .signs-section-title {
    font-size: 20px;
    text-align: left;
    margin-bottom: 20px;
    font-weight: bold;
    color: #1472ba;
  }

  .signs-imagebox-grid {
    display: flex;
    flex-direction: column;
	justify-items: center;
  align-items: center;
	  margin-top:24px;
  }

  .signs-imagebox {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    padding: 20px;
    box-sizing: border-box;
    max-width: 400px;
	width: 300px;
  }

  .signs-imagebox amp-img {
    width: 100%;
    height: 140px;
    object-fit: cover;
  }

  .signs-imagebox-text {
    padding:0px;
    flex: 1;
  }

  .signs-imagebox-title {
    font-size: 18px;
    margin: 12px 0 8px 0 !important;
    font-weight: 600;
    color: #000;
  }

  .signs-imagebox-description {
    font-size: 16px;
    font-weight: 500;
    margin: 0;
    color: #555;
    line-height: 1.4;
  }

  .signs-imagebox-link {
    text-decoration: none;
    color: inherit;
    display: block;
  }

@media (max-width: 1024px) and (min-width: 601px) {
  .signs-imagebox-grid {
    display: grid;
    grid-template-columns: 1fr 1fr; 
    gap: 20px;
    justify-items: center;
  }

  .signs-imagebox {
    width: 100%;
    max-width: 100%;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); 
    border-radius: 8px;
    background: #fff;
  }
}

@media (max-width: 600px) {
  .signs-imagebox-grid {
    display: grid;
    grid-template-columns: 1fr; 
    gap: 16px;
  }

  .signs-imagebox {
    box-shadow: none; 
    width: 100%;
    max-width: 100%;
  }
}


.section-keypoints li {
  display: flex;              
  align-items: center;        
	}

.section-keypoints li::before {
  content: "✔";
  margin-right: 8px;         
  color: #16234e;
  font-weight: bold;
}
.section-keypoints li p {
 	margin: 8px 0px;   
	padding: 0px;
	font-size: 16px !important;
	}
	
	

@media (max-width: 1024px) {
  .view-more-section {
    display: flex;
    justify-content: center; 
    align-items: center;    
    text-align: center; 
	  margin:32px 0px 60px 0px !important; !important;
  }

  .view-more-section .section-content {
    width: 100%;
    max-width: 100%;
  }
}

@media (max-width: 1024px) {
  .what-signs-section {
    flex-direction: column;
    text-align: center;
  }

  .what-signs-section .section-content {
    width: 100%;
    margin-bottom: 20px;
  }

  .what-signs-section .hero-img-wrapper {
    display: flex;
    justify-content: center;
  }

  .what-signs-section .hero-img-wrapper amp-img {
    max-width: 250px;
    height: auto;
  }
}

/* Mobile – tighter spacing, smaller font + image */
@media (max-width: 600px) {
  .what-signs-section {
    padding: 16px 12px;
    gap: 16px;
  }

  .what-signs-section .section-content {
    font-size: 14px;
  }

  .s-signs-sub-heading {
    font-size: 16px;
  }

  .section-keypoints li p {
    font-size: 14px !important;
  }

  .what-signs-section .hero-img-wrapper amp-img {
    max-width: 180px;
    height: auto;
  }
}
	
<?php endif; ?>

<?php if ($sl_is_usa_suite_page) : ?>
  /************************Security awareness USA ************************/
  .usa-banner {
    width: 100%;
    background-color: #283384 !important;
    align-items: center;
    box-sizing: border-box;
    margin-top: 60px;
  }
.usa-employee-section, .usa-supervisor-section, .usa-intervention-section { 
    max-width: 1200px;
    margin: 0 auto;
    align-items: center; 
    padding: 20px; 
}
	.usa-supervisor-section {
		background-color:#ffffff;
	}
	.usa-employee-section{
		background-color:#E7DDF7;
	}
	.usa-intervention-section{
		background-color:#FFF5F0;
	}
<?php endif; ?>

<?php if ($sl_is_about_page) : ?>
  /************************About Us ************************/
	
	
	
	.about-us-main-top-section{
		margin: 24px 0px ;
		padding:16px;
		gap:18px;
	}
	.about-us-description{
		font-size: 16px;
		color:#444444;
		font-weight: 400;
		text-align:center;
	}
	.about-us-highlight-link{
		color:#1472ba;
		font-weight:bold ;
		text-decoration: none;
	}
	.about-subheading {
    font-size: 18px;
    font-weight: 500;
    margin: 0;
    padding-bottom: 12px;
    text-align: center !important;
  }

	@media (min-width: 768px) {
   .about-us-main-top-section .heading {
        text-align: center;
    }
}
<?php endif; ?>

<?php if ($sl_is_contact_page) : ?>
  /************************Contact Us ************************/
.contact-us-icon-box-section {
  padding: 20px;
}

.contact-us-icon-box {
  display: flex;
  align-items: flex-start!important;
  gap: 15px; 
  margin-bottom: 20px;
}

.contact-us-top-section{
	margin: 32px 0px 0px 0px ;
	padding:0px 16px;
	gap:18px;
	}
.contact-us-description{
	font-size: 16px;
	color:#444444;
	font-weight: 400;
	text-align:left;
	}
.contact-us-subheading {
    font-size: 18px;
    font-weight: 500;
    margin: 0;
    padding-bottom: 12px;
    text-align: center !important;
  }
.contact-us-form-section{
	padding:16px;
	text-align:center!important;
	}

.contact-us-support-card {
  background-color: #FCF8EA;
  border-radius: 8px;
  padding: 28px 22px;
  width: 100%;
  margin: 0 auto;
  text-align: left;
  box-sizing: border-box;
}

.contact-us-form-text-heading{
	font-size:24px;
	text-align:left;
	}

.contact-us-text-section {
  text-align: left;
  margin-bottom: 20px;
}

.contact-us-icon-box-section {
  text-align: left;
}

.contact-us-icon-box {
  display: flex;
  align-items: center;
  gap: 12px;
}

.contact-us-icon {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  background-color: #f0f0f0;
  display: flex;
  align-items: center;
  justify-content: center;
}
.contact-us-icon-title {
  margin: 0;
  font-size: 16px;
  color: #16234e;
}

.contact-us-icon-description {
  margin: 0;
  font-size: 14px;
  color: #555;
}

.email-link {
  text-decoration: none;
  color: inherit;
}

.contact-us-email-label {
  margin: 20px 0 6px;
  font-size: 22px;
  font-weight: 600;
  color: #16234e;
}

.contact-us-email-value {
  margin: 0;
  font-size: 18px;
  color: #1f2937;
}

.contact-us-support-image-wrap {
  margin-top: 22px;
}

.contact-us-support-image-wrap amp-img {
  border-radius: 6px;
}

@media (min-width: 768px) and (max-width: 1024px) {
  .contact-us-support-image-wrap {
    max-width: 460px;
    margin: 20px auto 0;
  }
}

@media (max-width: 768px) {
  .contact-us-support-card {
    padding: 20px 16px;
  }

  .contact-us-email-label {
    font-size: 18px;
  }

  .contact-us-email-value {
    font-size: 16px;
  }
}
.contact-us-form{
	margin:0px;
	padding:0px;
	}

/* Contact page: keep only the form card in CTA area */
.common-cta-section {
  max-width: 100%;
  background-color: transparent;
  box-shadow: none;
  border-radius: 0;
  padding: 12px 0;
}

.common-cta-section .heading,
.common-cta-section .cta-image-wrapper {
  display: none !important;
}

.common-cta-section .cta-form-wrapper {
  max-width: 100%;
  width: 100%;
}

.common-cta-section .scf-form {
  background-color: #ffffff;
  box-shadow: 0 8px 24px rgba(15, 23, 42, 0.12);
}
<?php endif; ?>

<?php if ($sl_is_hr_compliance_suite_page) : ?>
	

	.global-section, .workplace-section, .posh-india-section, .usa-section, .bias-section, .wpa-section, .bystander-section{
    max-width: 1200px;
    margin: 0 auto;
    align-items: center; 
    padding: 20px; 
	}
	

	
	.global-section{
		background-color:#E7DDF7;
	}
	
	.workplace-section{
		background-color:#ffffff;
	}
	
	.posh-india-section{
		background-color:#FFE7FC;
	}
	
	.usa-section{
		background-color:#ffffff;
	}
	
	.wpa-section{
		background-color:#FFF0E1;
	}
	.bias-section{
		background-color:#ffffff;
	}
	
	.bystander-section{
		background-color:#FFE3E5;
	}
<?php endif; ?>

<?php if ($sl_is_financial_crime_suite_page) : ?>

  /************************Financial Crime Prevention Suite ************************/
.cpd-image {
  position: absolute;
  top: 20px !important;
  left: 20px;
}
<?php endif; ?>
	
<?php if ($sl_is_usa_suite_page) : ?>
/************************Prevention of Sexual Harassment (POSH) Fundamentals - India ************************/

	.posh-page-hero .hero-section-quote {
  display: block;
  margin-bottom: 12px !important;
}

.posh-india-foundation-section, 
.posh-india-managers-section, 
.posh-india-all-employees-section{
    margin: 0 auto;
    justify-content: left !important; 
    align-items: left!important; 
    padding: 32px 20px;
	}
	
	.posh-india-foundation-section{
		background-color: #EFF1FF ;
	}
	
	.posh-india-managers-section{
		background-color:#ffffff ;
	}
	
	.posh-india-all-employees-section{
		background-color: #FFF5F0;
	}
<?php endif; ?>





<?php if ($sl_is_pevc_suite_page) : ?>
/************************Private Equity and Venture Capital Suite ************************/

#private-equity-and-venture-capital-carousel{
  height: 300px !important;
}

.private-equity-and-venture-capital-cards-section {
  max-width: 350px;
  margin: 0 auto;
  padding: 32px 16px;
  text-align: center;
}

.private-equity-and-venture-capital-card {
  border: 2px solid var(--accent);
  border-radius: 14px;
  background:#fff;
  position: relative;
  padding: 20px;
  height: 150px;
  margin: 0 10px;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

.private-equity-and-venture-capital-card-title {
  margin: 0;
  font-size: 16px;
  font-weight: 500;
  color:#000;
  line-height: 1.4em;
  flex-grow: 1;
}

.private-equity-and-venture-capital-card-arrow {
  position: absolute;
  right: 20px;
  bottom: 20px;
}

.security-and-data-protection-awareness-trainings-section, 
.human-resource-compliance-trainings-section, 
.financial-crime-prevention-trainings-section, 
.specific-programs-section{
    margin: 0 auto;
    align-items: center; 
    padding: 32px 16px ;
  	position: relative; 
}
<?php endif; ?>

.security-and-data-protection-awareness-trainings-section {
  background-color: #E3EDEC;
}
.human-resource-compliance-trainings-section{
  background-color:#ffffff ;  
}
.financial-crime-prevention-trainings-section{
    background-color:#E3EDEC ;
} 
.specific-programs-section{
    background-color:#ffffff ;
}

	
<!-- ===== Hero Section Carousel (AMP) ===== -->

#hero-carousel {
  height: 300px !important;
}

.hero-section-carousel {
  max-width: 350px;
  margin: 0 auto;
  padding: 20px 16px;
  text-align: center;
}

.hero-card {
  border: 2px solid var(--accent);
  border-radius: 14px;
  background: #fff;
  position: relative;
  padding: 32px 20px;
  height: 150px;
  margin: 0 10px;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

@media (min-width: 768px) and (max-width: 1024px) {
  .hero-card {
    justify-content: center;   
    align-items: center;       
    height: auto;              
    padding: 40px 24px;        
    text-align: center;        
  }

  .hero-card-title {
    font-size: 24px;
    line-height: 1.4;
    margin-bottom: 12px;
  }
}

	
.hero-card-title {
  margin: 0;
  font-size: 16px;
  font-weight: 500;
  color:#000;
  line-height: 1.4em;
  flex-grow: 1;
}

.hero-card-arrow {
  position: absolute;
  right: 20px;
  bottom: 20px;
}

.arrow-icon {
  width: 24px;
  height: 16px;
  display: block;
  color: var(--accent);
}

  amp-carousel[type="slides"] .i-amphtml-carousel-slides {
  transition: transform 1s ease-in-out !important; 
}

/* Tablet view: 2 per row */
@media (min-width: 768px) {
.hero-section-carousel {
    min-width: 800px;
    margin: 0px auto !important;
    padding: 20px 16px;
    text-align: center;
}


}
	/* Mobile */
@media (max-width: 767px) {
  #hero-carousel {
    max-width: 300px; 
  }
}
/* ===== Code of Conduct eLearning Training ===== */
	
	
.coc-section {
  background: #fff;
  padding: 50px 20px;
}

.coc-section-title {
  text-align: left;
  font-size: 20px;
  margin-bottom: 30px;
  color: #222;
}

.coc-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
  gap: 20px;
}

.coc-box {
  padding: 20px;
  border-radius: 10px;
  text-align: center;
  box-shadow: 0 4px 8px rgba(0,0,0,0.05);
  display: flex;
  align-items: center;
  justify-content: center;
  min-height: 80px !important;
}

.coc-box-title {
  margin: 0;
  font-size: 16px;
  font-weight: 500;
  color: #222;
}
@media (min-width: 768px) and (max-width: 1024px) {
  .coc-grid {
    grid-template-columns: repeat(2, 1fr);
  }
}
	
	
/* ===========================
   Landing Page AMP Logo Section
   =========================== */
.landing-page-amp-logo-section {
  background: #fff;
  padding: 20px 40px;
  display: flex;
  align-items: center;
  justify-content: flex-start;
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  z-index: 1100;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
}

.landing-page-amp-logo-container {
  max-width: 180px;
}

/* Prevent content overlap below fixed logo header */
.landing-page-amp-logo-section + .landing-page-amp-banner-section {
  margin-top: 84px;
}

/* Tablet */
@media (max-width: 1024px) {
  .landing-page-amp-logo-section {
    padding: 16px 30px;
  }
  .landing-page-amp-logo-section + .landing-page-amp-banner-section {
    margin-top: 76px;
  }
}

/* Mobile */
@media (max-width: 600px) {
  .landing-page-amp-logo-section {
    padding: 16px;
  }

  .landing-page-amp-logo-container {
    max-width: 150px;
  }
  .landing-page-amp-logo-section + .landing-page-amp-banner-section {
    margin-top: 72px;
  }
}

	
/* Landing Page AMP Banner Styles */
.landing-page-amp-banner-section {
  padding: 20px 20px;
   background: linear-gradient(270deg, #915EBD 44%, #576094 100%);
	color:#ffffff!important;
}

.landing-page-amp-banner-top {
  text-align: center;
  max-width: 800px;
  margin: 0 auto;
}

.landing-page-amp-banner-topic {
  font-size: 28px;
  font-weight: 700;
  color: #ffffff;
  margin-bottom: 15px;
  font-family: "Open Sans", sans-serif;
}

.landing-page-amp-banner-description {
  font-size: 16px;
  color: #ffffff;
  margin-bottom: 25px;
  line-height: 1.6;
  font-family: "Open Sans", sans-serif;
}

/* Bordered Box */
.landing-page-amp-banner-box {
  border: 1px solid #ddd;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  border-radius: 8px;
  padding: 20px;
  margin-bottom: 25px;
  background: #fff;
}

.landing-page-amp-banner-box p {
  margin: 0 0 10px 0;
  font-weight: 600;
  color: #003F88;
  font-family: "Open Sans", sans-serif;
}

.landing-page-amp-banner-box p:last-child {
  margin-bottom: 0;
}

/* Buttons */
.landing-page-amp-banner-buttons {
  display: flex;
  flex-direction: column;
  gap: 12px;
  align-items: center;
}

.landing-page-amp-banner-btn {
  display: inline-block;
  width: 100%;
  max-width: 260px; /* fixed max width */
  padding: 12px 12px;
  border-radius: 6px;
  font-weight: 600;
  text-align: center;
  text-decoration: none;
  transition: all 0.3s ease;
  box-sizing: border-box;
  font-family: "Open Sans", sans-serif;
}

.landing-page-amp-banner-btn.primary-btn {
  background: #003F88;
  color: #fff;
  border: none;
}

.landing-page-amp-banner-btn.secondary-btn {
  background: #fff;
  color: #003F88;
  border: 2px solid #003F88;
}

.landing-page-amp-banner-bottom {
  margin-top: 40px;
  max-width: 800px;
  margin-left: auto;
  margin-right: auto;
}

/* ✅ Tablet and Mobile Adjustments */
@media (max-width: 1024px) {

  .landing-page-amp-banner-buttons {
    flex-direction: column;
    align-items: center;
  }

  .landing-page-amp-banner-btn {
    width: auto;
    max-width: 300px;
	  min-width:300px!important;
  }

 
  .landing-page-amp-banner-box {
    display: flex;
    justify-content: space-evenly;
    align-items: center;
    gap: 15px;
    flex-wrap: wrap; 
	  margin:12px 12px 24px 12px !important;
  }

  .landing-page-amp-banner-box p {
    margin: 0;
  }
}

/* ✅ Mobile */
@media (max-width: 600px) {
  .landing-page-amp-banner-topic { font-size: 24px; }
  .landing-page-amp-banner-description { font-size: 15px; }
  .landing-page-amp-banner-box {
    flex-direction: column;
    text-align: center;
  }
}


	
.testimonial-carousel-container {
  margin-top: 20px;
  width: 100%;
  text-align: center;
}

@media (min-width: 768px) and (max-width: 1024px) {
  .testimonial-carousel-section {
    padding-top: 0 !important;
  }
}

.testimonial-carousel {
  width: 100%;
  height: 160px; 
  cursor: grab;
  margin: 0 auto;
}

.testimonial-slide {
   display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 32px 20px 20px;
    background-color: white;
    color: #333;
    height: 100%;
    box-sizing: border-box;
}

.testimonial-text {
  font-size:16px;
  font-size: 16px;
  line-height: 1.4;
  margin-bottom: 12px;
  overflow-wrap: break-word;
}

.testimonial-company {
  color: #1472ba;
  font-weight: 600;
}

/* Button styling */
.testimonial-btn-wrapper {
  margin-top: 16px;
  text-align: center;
}

.testimonial-btn-wrapper .testimonial-btn {
  display: inline-block;
  max-width: 300px;
	width:250px;
  padding: 10px 16px;
  text-align: center;
  background: #003F88;
  color: #fff;
  border-radius: 6px;
  text-decoration: none;
  font-weight: 500;
}
.testimonial-btn {
  max-width: none; 
  padding: 8px 14px;
  font-size: 13px; 
  white-space: nowrap; 
}

amp-carousel>.amp-carousel-button {
  display: none !important;
}

/* Tablet */
@media (min-width: 768px) and (max-width: 1024px) {
  .testimonial-slide {
    max-width: 350px;
    padding: 14px 10px;
  }

  .testimonial-text {
    font-size: 13px;
  }
}

/* Mobile */
@media (max-width: 600px) {
  .testimonial-slide {
    max-width: 280px;
    padding: 12px 8px;
  }

  .testimonial-text {
    font-size: 16px;
  }
}

.landing-page-amp-videos-container {
  max-width: 900px;
  margin: 0 auto;
  padding: 40px 0px;
  display: flex;
  flex-direction: column;
  gap: 30px;
}

.landing-page-amp-video-wrapper {
  width: 100%;
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 4px 12px rgba(0,0,0,0.08);
}

/* ===== Tablet ===== */
@media (max-width: 1024px) {
  .landing-page-amp-videos-container {
    padding: 32px 0px;
  }
}

/* ===== Mobile ===== */
@media (max-width: 600px) {
  .landing-page-amp-videos-container {
    padding: 24px 0px;
  }
}

	
	/************************* Landing Why SucceedLearn *************************/

	.rounder-banner-video{
		border-radius: 20px;
    overflow: hidden;
	}
.landing-why-section {
  background-color: #ffffff;
  padding: 32px 0px;
}

.landing-why-grid {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.landing-why-box {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  text-align: center;
  padding: 0px;
  background-color: #fff;
  box-sizing: border-box;
  max-width: 400px;
  width: 300px;
  margin-bottom: 20px;
}

.border-blue {
  border: solid 2px #1472ba;
}

.border-green {
  border: solid 2px #0D723B;
}

.border-purple {
  border: solid 2px #AC2494;
}

.landing-why-box amp-img {
  width: 100%;
  height: 140px;
  object-fit: cover;
}

.landing-why-text {
  padding: 12px;
  flex: 1;
}

.landing-why-title {
  font-size: 24px;
  margin: 0 0 8px 0;
  font-weight: 600;
  color: #000;
}

.landing-why-description {
  font-size: 16px;
  font-weight: 500;
  margin: 0;
  color: #555;
  line-height: 1.4;
}

.landing-why-link {
  text-decoration: none;
  color: inherit;
  display: block;
}

/* ✅ Tablet view — inline grid (e.g. 3 + 2 / 3 + 3) */
@media (min-width: 768px) and (max-width: 1024px) {
  .landing-why-grid {
    display: grid;
    grid-template-columns: repeat(3, minmax(180px, 1fr));
    gap: 18px;
    align-items: stretch;
    justify-items: center;
  }

  .landing-why-box {
    width: 100%;
    max-width: 100%;
    margin-bottom: 0;
  }
}

/* ✅ Desktop view */
@media (min-width: 1025px) {
  .landing-why-grid {
    display: flex;
    flex-direction: row;
    justify-content: center;
    gap: 24px;
    flex-wrap: wrap;
  }

  .landing-why-box {
    flex: 1;
    max-width: 300px;
  }
}
	
	
.btn-before-text{
		text-align:center;
		margin-top:0px !important;
	}
	.text-btn-section{
		padding:0px 24px !important;
	}
	
	  .landing-imagebox {
    display: flex;
    flex-direction: column;
    align-items: center;
	justify-content:center;
	text-align:center;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 1px 4px rgba(0, 0, 0, 0.05);
    box-sizing: border-box;
    max-width: 400px;
	width: 300px;
  }
	.landing-bulk-section{
		padding:0px 8px!important; 
	}
	.landing-cta-section{
  max-width: 1200px;
  margin: 0 auto;
  padding: 40px 20px;
  display: flex;
  flex-direction: column; 
  align-items: center;
  background-color: #e3edec;
  border-radius: 12px;
  box-shadow: 0 2px 8px rgba(0,0,0,0.08);
  box-sizing: border-box;
  text-align: center; 
}
	  .landing-footer-bottom {
    text-align: center;
	  position: static !important;
    font-size: 0.9em;
    color: #ffffff;
    padding: 10px 0px;
    border-top: 1px solid #ccc;
    margin-top: 0px !important;
	 background-color:#1472ba;
  }
/* AMP section styles */
.landing-page-amp-videos-section {
  padding: 0;
  margin-top:40px;
}

.landing-page-amp-videos-container {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  gap: 20px;
  padding: 20px;
}

.landing-page-amp-video-wrapper amp-video {
  border-radius: 20px;
  overflow: hidden;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
  background-color: #000;
  margin-bottom: 30px;
}

.amp-video-title {
  text-align: center;
  font-size: 16px;
  margin-top: 10px;
  font-weight: 600;
  color: #333;
}

/* Center CTA button in AMP section */
.landing-page-amp-videos-container .testimonial-btn-wrapper {
  grid-column: 1 / -1;
  display: flex;
  justify-content: center;
  align-items: center;
  margin-top: 4px;
}

/* Tablet view only */
@media (min-width: 768px) and (max-width: 1024px) {
  .text-btn-section {
    padding-top: 40px;
    padding-bottom: 40px;
  }
}

.landing-page-cta-key-points {
  text-align: left;
  margin-bottom: 8px;
}

ol .landing-page-cta-key-points {
  padding: 0;
}
	
	.esg-gradient-bg {
    background: linear-gradient(270deg, #00A08CD9 0%, #004682E6 100%) !important;
}
.text-white {
    color: #ffffff;
}

	.why-esg-matters .esg-box {
    background: #F7F9FC;
    border-radius: 8px;
    padding: 20px;
	margin-bottom:12px;
}
.why-esg-matters .esg-box-title {
    font-size: 20px;
    font-weight: 700;
}
.why-esg-matters .esg-box-desc {
    font-size: 16px;
    line-height: 1.5;
}
	
	.esg-landing-page-boxes{
		border:1px solid #ddd;  
		border-radius:4px; 
		box-shadow:0 2px 8px rgba(0,0,0,0.15);
		overflow:hidden; background:#fff;
		padding:16px;
		margin-bottom:20px;
	}
	.esg-landing-page-boxe-title{
		margin-bottom:20px;
	}
	.esg-landing-page-why-choose-our-esg-boxes{
	background:#F7F9FC; 
	border-radius:4px; 
	box-shadow:0 2px 6px rgba(0,0,0,0.1);
	padding:16px;
	margin-bottom:20px;
	}
/* Wrapper */
.amp-contact-section-cta-wrapper {
  width: 100%;
  margin: 30px 0;
  display: flex;
  flex-direction: column;
  gap: 25px;
}

/* Each Box — Equal Height */
.amp-contact-section-cta-box {
  background: #ffffff;
  border: 1px solid #dcdcdc;
  padding: 20px;
  border-radius: 8px;
  text-align: left;
  min-height: 180px; /* Ensures equal height */
  display: flex;
  flex-direction: column;
  justify-content: flex-start;
}

/* Tablet: show CTA boxes in one row (50% + 50%) */
@media (min-width: 768px) and (max-width: 1024px) {
  .amp-contact-section-cta-wrapper {
    flex-direction: row;
    flex-wrap: wrap;
    gap: 20px;
    align-items: stretch;
  }

  .amp-contact-section-cta-box {
    flex: 1 1 calc(50% - 10px);
    max-width: calc(50% - 10px);
    margin: 0;
  }
}

/* Title — Reduce Boldness */
.amp-contact-section-cta-title {
  font-size: 20px;
  font-weight: 600; /* reduced from 700 */
  margin-bottom: 10px;
  color: #222;
}

/* Price text */
.amp-contact-section-cta-price {
  font-size: 22px!important;
  font-weight: 700;
  color: #000000!important;
  margin-bottom: 15px;
}
.amp-contact-section-cta-price-unit{
  font-size: 13px;
  font-weight: 400;
  color: #6b7280;
}

/* Button — New Color + Less Bold */
.amp-contact-section-cta-btn {
  display: inline-block;
  padding: 10px 20px;
  background: #003F88; 
  color: #fff;
  border-radius: 6px;
  text-decoration: none;
  font-weight: 500;
  font-size: 16px;
  margin-top: auto; 
  text-align:center;
}

/* ===== AMP Form UI (separate AMP stylesheet) ===== */

.scf-form {
	max-width: 520px;
	margin: 1.5rem auto !important;
	padding: 1.5rem;
	border: 1px solid #dcdcdc;
	border-radius: 8px;
	background: #fff;
	box-shadow: 0 6px 16px rgba(15, 23, 42, 0.08);
}

.scf-field {
	display: flex;
	flex-direction: column;
	gap: 0.5rem;
	margin-bottom: 1rem;
}

.scf-field:last-child {
	margin-bottom: 0;
}

.scf-field label {
	font-weight: 600;
	color: #0f172a;
	font-size: 0.95rem;
	display: block;
	margin-bottom: 10px !important;
}

.scf-required,
label .scf-required,
.scf-field label .scf-required,
.scf-checkbox label .scf-required {
	color: #dc2626 !important;
	margin-left: 2px;
	font-weight: 600;
}

.scf-field input:not([type="checkbox"]):not([type="radio"]),
.scf-field select,
.scf-field textarea {
	border: 1px solid #cbd5f5;
	border-radius: 6px;
	padding: 0.75rem 0.875rem;
	font-size: 1rem;
	width: 100%;
	box-sizing: border-box;
	transition: border-color 0.2s ease, box-shadow 0.2s ease;
	margin-top: 0 !important;
	background: #fff;
	color: #0f172a;
}

.scf-field input::placeholder,
.scf-field textarea::placeholder {
	color: rgba(15, 23, 42, 0.42);
}

.scf-field input:focus,
.scf-field select:focus,
.scf-field textarea:focus {
	outline: none;
	border-color: #2563eb;
	box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
}

.scf-field select {
	appearance: none;
	-webkit-appearance: none;
	-moz-appearance: none;
	background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 20 20'%3E%3Cpath fill='%230f172a' d='M5.6 7.8a1 1 0 0 1 1.4 0L10 10.8l3-3a1 1 0 1 1 1.4 1.4l-3.7 3.7a1 1 0 0 1-1.4 0L5.6 9.2a1 1 0 0 1 0-1.4Z'/%3E%3C/svg%3E");
	background-repeat: no-repeat;
	background-position: right 0.85rem center;
	background-size: 18px 18px;
	padding-right: 2.75rem;
}

.scf-field textarea {
	resize: vertical;
	min-height: 120px;
}

/* Extra bottom spacing for your new fields */
#scf-organization,
#scf-email,
#scf-course-interest,
#scf-phone-country-code,
#scf-phone-number {
	margin-bottom: 0.75rem;
}

/* AMP phone row */
.scf-phone-inline {
	display: flex;
	gap: 0.5rem;
	align-items: center;
	width: 100%;
}

.scf-phone-inline #scf-phone-country-code {
	flex: 0 0 44%;
	min-width: 160px;
}

.scf-phone-inline #scf-phone-number {
	flex: 1 1 auto;
	min-width: 0;
}

/* Privacy checkbox alignment + gap fix: "I Accept privacy policy" */
.scf-checkbox {
	display: flex;
	flex-direction: row;
	align-items: center;
	gap: 0.5rem;
	flex-wrap: wrap;
	margin-bottom: 1rem;
}

.scf-checkbox input[type="checkbox"] {
	width: auto;
	margin: 0;
	flex-shrink: 0;
}

.scf-checkbox label {
	font-weight: normal;
	cursor: pointer;
	flex: 1;
	line-height: 1.4;
	display: inline-flex;
	align-items: center;
	gap: 0.35rem;
}

.scf-checkbox a {
	color: #1472ba;
	font-weight: 600;
	text-decoration: none;
}

.scf-submit {
	background: #2563eb;
	color: #fff;
	border: none;
	border-radius: 6px;
	padding: 0.875rem 2rem;
	font-size: 1rem;
	font-weight: 600;
	cursor: pointer;
	width: 100%;
	display: block;
	margin: 1.5rem 0 0 0;
	transition: background-color 0.2s ease, transform 0.1s ease;
	box-sizing: border-box;
}

.scf-submit:hover {
	background: #1d4ed8;
}

.scf-submit:active {
	transform: scale(0.98);
}

.scf-error-message {
	color: #dc2626;
	font-size: 14px;
	font-weight: normal;
	margin-top: 0.5rem;
	display: block;
}

/* SCF inline response (fallback when no popup) */
.scf-response {
	margin-top: 1rem;
	padding: 0.75rem 1rem;
	border-radius: 6px;
	font-weight: 600;
	display: block;
}
.scf-response.scf-success {
	color: #15803d;
	background-color: #d1fae5;
	border: 1px solid #a7f3d0;
}
.scf-response.scf-error {
	color: #dc2626;
	background-color: #fee2e2;
	border: 1px solid #fecaca;
}

/* SCF lightbox popup (success/error) */
amp-lightbox { z-index: 9999; }
.scf-lightbox-overlay {
	background: rgba(0, 0, 0, 0.75);
	position: fixed;
	top: 0;
	left: 0;
	right: 0;
	bottom: 0;
	height: 100vh;
	width: 100vw;
	display: flex;
	align-items: center;
	justify-content: center;
	padding: 1rem;
	box-sizing: border-box;
}
.scf-lightbox-content {
	background: #fff;
	padding: 2.5rem 2rem;
	border-radius: 12px;
	text-align: center;
	max-width: 480px;
	width: 100%;
	box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
	position: relative;
	box-sizing: border-box;
}
.scf-lightbox-success {
	background: #d1fae5;
	border: 2px solid #a7f3d0;
}
.scf-lightbox-error {
	background: #fee2e2;
	border: 2px solid #fecaca;
}
.scf-lightbox-icon {
	font-size: 3.5em;
	margin-bottom: 1rem;
	line-height: 1;
}
.scf-lightbox-title {
	font-weight: 700;
	font-size: 1.5rem;
	margin-bottom: 1rem;
	color: #0f172a;
	line-height: 1.3;
}
.scf-lightbox-message {
	margin-bottom: 2rem;
	color: #374151;
	line-height: 1.6;
	font-size: 1rem;
}
.scf-lightbox-button {
	margin-top: 0;
	padding: 0.875rem 2rem;
	border: none;
	border-radius: 6px;
	background: #2563eb;
	color: #fff;
	font-size: 1rem;
	font-weight: 600;
	cursor: pointer;
	transition: background-color 0.2s ease, transform 0.1s ease;
	width: 100%;
	max-width: 200px;
	margin-left: auto;
	margin-right: auto;
}
.scf-lightbox-button:hover { background: #1d4ed8; }
.scf-lightbox-button:active { transform: scale(0.98); }

@media (max-width: 768px) {
	.scf-phone-inline {
		flex-direction: column;
		align-items: stretch;
	}

	.scf-phone-inline #scf-phone-country-code,
	.scf-phone-inline #scf-phone-number {
		width: 100%;
		min-width: 0;
	}
}
/**** EGG form ****/
	.stcf-form {
			max-width: 520px;
			margin: 1.5rem auto;
			padding: 1.5rem;
			border: 1px solid #dcdcdc;
			border-radius: 8px;
			background: #fff;
			box-shadow: 0 6px 16px rgba(15, 23, 42, 0.08);
		}
		.stcf-field {
			margin-bottom: 1rem;
			display: flex;
			flex-direction: column;
			gap: 0.35rem;
		}
		.stcf-field label {
			font-weight: 600;
			color: #0f172a;
		}
		.stcf-required {
			color: #dc2626;
			margin-left: 2px;
		}
		.stcf-field input,
		.stcf-field textarea {
			border: 1px solid #cbd5f5;
			border-radius: 6px;
			padding: 0.65rem 0.75rem;
			font-size: 1rem;
			width: 100%;
		}
		.stcf-field textarea {
			resize: vertical;
			min-height: 120px;
		}
		.stcf-checkbox {
			flex-direction: row;
			align-items: flex-start;
			gap: 0.5rem;
			flex-wrap: wrap;
		}
		.stcf-checkbox input[type="checkbox"] {
			width: auto;
			margin-top: 0.25rem;
			flex-shrink: 0;
		}
		.stcf-checkbox label {
			font-weight: normal;
			cursor: pointer;
			flex: 1;
		}
		.stcf-checkbox a {
			color: #2563eb;
			text-decoration: underline;
		}
		.stcf-submit {
			background: #2563eb;
			color: #fff;
			border: none;
			border-radius: 6px;
			padding: 0.75rem 1.5rem;
			font-size: 1rem;
			cursor: pointer;
			width: auto;
			display: block;
			margin: 0;
		}
		.stcf-submit {
			position: relative;
		}
		.stcf-submit[disabled] {
			opacity: 0.7;
			cursor: not-allowed;
		}
		.stcf-response {
			margin-top: 1rem;
			padding: 0.75rem 1rem;
			border-radius: 6px;
			font-weight: 600;
			display: block;
		}
		.stcf-response.stcf-error {
			color: #dc2626;
			background-color: #fee2e2;
			border: 1px solid #fecaca;
		}
		.stcf-response.stcf-success {
			color: #15803d;
			background-color: #d1fae5;
			border: 1px solid #a7f3d0;
		}
		.stcf-error-message {
			color: #dc2626;
			font-size: 14px;
			font-weight: normal;
			margin-top: 0.25rem;
			display: block;
			min-height: 20px;
		}
		.stcf-field input[type="number"] {
			max-width: 200px;
		}
		.stcf-lightbox-overlay {
			background: rgba(0, 0, 0, 0.7);
			height: 100vh;
			display: flex;
			align-items: center;
			justify-content: center;
			padding: 1rem;
		}
		.stcf-lightbox-content {
			background: #fff;
			padding: 2rem;
			border-radius: 12px;
			text-align: center;
			max-width: 460px;
			width: 100%;
			box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
		}
		.stcf-lightbox-success {
			background: #d1fae5;
			border: 2px solid #a7f3d0;
		}
		.stcf-lightbox-error {
			background: #fee2e2;
			border: 2px solid #fecaca;
		}
		.stcf-lightbox-icon {
			font-size: 3em;
			margin-bottom: 0.5rem;
		}
		.stcf-lightbox-title {
			font-weight: bold;
			font-size: 1.25rem;
			margin-bottom: 0.75rem;
			color: #0f172a;
		}
		.stcf-lightbox-message {
			margin-bottom: 1.5rem;
			color: #374151;
			line-height: 1.6;
		}
		.stcf-lightbox-button {
			margin-top: 0.5rem;
			padding: 0.75rem 1.5rem;
			border: none;
			border-radius: 6px;
			background: #2563eb;
			color: #fff;
			font-size: 1rem;
			font-weight: 600;
			cursor: pointer;
			transition: background-color 0.2s ease;
		}
		.stcf-lightbox-button:hover {
			background: #1d4ed8;
		}
	

/* Section */
.privacy-policy-section {
    padding:0px 20px 40px 20px;
}


/* Layout */
.pp-container {
    max-width: 1100px;
    margin: 0 auto;
    display: grid;
    gap: 16px;
}

/* Each Block */
.privacy-policy-box {
    padding: 10px 0;
}

/* Subtitles */
.pp-subtitle {
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 10px;
}

/* Paragraph */
.pp-desc {
    font-size: 15px;
    line-height: 1.6;
    margin-bottom: 10px;
}

/* List */
.pp-list {
    padding-left: 20px;
    margin: 0;
}

.pp-list li {
    font-size: 15px;
    line-height: 1.5;
    margin-bottom: 6px;
}

/* Responsive */
@media (min-width: 768px) {
    .pp-container {
        grid-template-columns: repeat(3, 1fr);
    }
}

	.bgwhite{
		background-color:#ffffff !important;
	}
	
	
/****************** Css for the landing page form *******************/
.lpf-form {
  max-width: 520px;
  margin: 1rem auto !important;
  padding: 1rem;
  border: 1px solid #dcdcdc;
  border-radius: 8px;
  background: #fff;
  box-shadow: 0 6px 16px rgba(15,23,42,0.08);
}

.lpf-honeypot {
  position: absolute;
  left: -9999px;
  width: 1px;
  height: 1px;
  overflow: hidden;
  opacity: 0;
  pointer-events: none;
  visibility: hidden;
}

.lpf-field {
  margin-bottom: 1rem;
  display: flex;
  flex-direction: column;
}

.lpf-field label {
  font-weight: 600;
  color: #0f172a;
  margin-bottom: 0.25rem;
  font-size: 0.95rem;
}

.lpf-required {
  color: #dc2626;
  margin-left: 2px;
}

.lpf-field input,
.lpf-field textarea {
  border: 1px solid #d1d5db;
  border-radius: 6px;
  padding: 0.625rem 0.75rem;
  font-size: 0.95rem;
  width: 100%;
  box-sizing: border-box;
  transition: border-color 0.2s ease, box-shadow 0.2s ease;
  background-color: #fff;
}

.lpf-field input:focus,
.lpf-field textarea:focus {
  outline: none;
  border-color: #2563eb;
  box-shadow: 0 0 0 3px rgba(37,99,235,0.1);
}

.lpf-field textarea {
  resize: vertical;
  min-height: 80px;
}

.lpf-checkbox {
  flex-direction: row;
  align-items: flex-start;
  flex-wrap: wrap;
}

.lpf-checkbox input[type="checkbox"] {
  width: auto;
  margin-top: 0.25rem;
  flex-shrink: 0;
}

.lpf-checkbox label {
  font-weight: normal;
  cursor: pointer;
  flex: 1;
  line-height: 1.5;
}

.lpf-checkbox .lpf-error-message {
  width: 100%;
  margin-left: 0;
}

.lpf-checkbox a {
  color: #1472ba !important;
  text-decoration: none !important;
  font-weight: 600;
}

.lpf-submit {
  background: #2563eb;
  color: #fff;
  border: none;
  border-radius: 6px;
  padding: 0.75rem 2rem;
  font-size: 0.95rem;
  font-weight: 600;
  cursor: pointer;
  transition: background-color 0.2s ease, transform 0.1s ease;
  width: 100%;
  display: block;
  margin: 1rem 0 0 0;
  position: relative;
}

.lpf-submit:hover {
  background: #1d4ed8;
}

.lpf-submit:active {
  transform: scale(0.98);
}

.lpf-submit:disabled {
  cursor: not-allowed;
  opacity: 0.6;
}

.lpf-submit.is-loading {
  opacity: 0.6;
  pointer-events: none;
}

.lpf-response {
  margin-top: 1rem;
  padding: 0.75rem 1rem;
  border-radius: 6px;
  font-weight: 600;
  display: block;
}

.lpf-response.lpf-error {
  color: #dc2626;
  background-color: #fee2e2;
  border: 1px solid #fecaca;
}

.lpf-response.lpf-success {
  color: #15803d;
  background-color: #d1fae5;
  border: 1px solid #a7f3d0;
  margin-top: 8px;
}

.lpf-error-message {
  color: #dc2626;
  font-size: 14px;
  font-weight: normal;
  display: block;
}

.lpf-field input:invalid:not(:focus):not(:placeholder-shown),
.lpf-field textarea:invalid:not(:focus):not(:placeholder-shown) {
  border-color: #d1d5db;
}

.lpf-field input:valid,
.lpf-field textarea:valid {
  border-color: #d1d5db;
}

.lpf-spinner {
  display: inline-block;
  width: 14px;
  height: 14px;
  border: 2px solid rgba(255,255,255,0.3);
  border-top-color: #fff;
  border-radius: 50%;
  animation: lpf-spin 0.8s linear infinite;
  margin-right: 8px;
  vertical-align: middle;
}

@keyframes lpf-spin {
  from { transform: rotate(0deg); }
  to { transform: rotate(360deg); }
}

.lpf-submit-loading {
  display: inline-flex;
  align-items: center;
}

.lpf-submit.is-loading .lpf-submit-text {
  display: none;
}

.lpf-submit.is-loading .lpf-submit-loading {
  display: inline-flex !important;
}

.lpf-lightbox-overlay {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: rgba(0,0,0,0.6);
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 9999;
  padding: 1rem;
}

.lpf-lightbox-content {
  background: #fff;
  border-radius: 12px;
  padding: 2rem;
  max-width: 400px;
  width: 100%;
  text-align: center;
  box-shadow: 0 20px 25px -5px rgba(0,0,0,0.1), 0 10px 10px -5px rgba(0,0,0,0.04);
}

.lpf-lightbox-icon {
  font-size: 3rem;
  margin-bottom: 1rem;
}

.lpf-lightbox-title {
  font-size: 1.5rem;
  font-weight: 700;
  margin-bottom: 0.75rem;
  color: #0f172a;
}

.lpf-lightbox-message {
  font-size: 1rem;
  color: #64748b;
  margin-bottom: 1.5rem;
  line-height: 1.5;
}

.lpf-lightbox-button {
  background: #2563eb;
  color: #fff;
  border: none;
  border-radius: 6px;
  padding: 0.75rem 2rem;
  font-size: 1rem;
  font-weight: 600;
  cursor: pointer;
  transition: background-color 0.2s ease;
  width: 100%;
}

.lpf-lightbox-button:hover {
  background: #1d4ed8;
}

.lpf-lightbox-success .lpf-lightbox-title {
  color: #15803d;
}

.lpf-lightbox-error .lpf-lightbox-title {
  color: #dc2626;
}

@media (min-width: 768px) and (max-width: 1024px) {
  .lpf-form {
    width: 100%;
    max-width: 800px;
    margin-left: auto !important;
    margin-right: auto !important;
  }
}

@media (max-width: 767px) {
  .lpf-form {
    width: 100%;
    max-width: 100%;
    margin-left: auto !important;
    margin-right: auto !important;
  }
  .content-section{
    padding: 32px 16px;
    row-gap: 14px;
  }
  .content-section .subcategory-image,
  .content-section .subcategory-content{
    flex-basis: 100%;
    min-width: 0;
  }
  .content-section .subcategory-image{
    max-width: 340px;
    justify-content: center !important;
    margin-left: auto !important;
    margin-right: auto !important;
    margin-top: 24px;
  }
  .content-section .subcategory-image amp-img{
    max-width: 340px !important;
  }
  .content-section .course-button{
    margin-top: 14px;
  }
  .subcategory-image{
    margin-top: 20px !important;
  }
  .section{
    padding-top: 32px !important;
    padding-bottom: 32px !important;
  }
}

	.pevc-violet{
		background-color:#E7DDF7;
	}
	.pevc-pink{
		background-color:#FFE7FC;
	}
		.pevc-orange{
		background-color:#F9DBCA;
	}
		.pevc-purple{
		background-color:#DCC6FF;
	}
	
	/* ===== Marketing Landing Page : Banner ===== */

.marketing-landing-banner {
  background-color: transparent;
  background-image: linear-gradient(90deg, #6C3FB5 0%, #FF4D8F 100%);
  padding: 20px 0px 20px 0px ;
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  z-index: 1100;
  min-height: 40px !important;
  height:40px !important;
}

.marketing-landing-banner + .marketing-landing-section {
  margin-top: 40px;
}

.marketing-landing-container {
  width: 100%;
  max-width: 1140px;
  margin: 0 auto;
  padding: 0px;
}

.marketing-landing-row {
  display: flex;
  flex-wrap: wrap;
}

.marketing-landing-col-12 {
  width: 100%;
}

.text-center {
  text-align: center;
}

/* Text styles (WHITE, no bg) */
.marketing-landing-eyebrow {
  font-size: 14px;
  font-weight: 700;
  letter-spacing: 1px;
  text-transform: uppercase;
  color: #ffffff;
  margin-bottom: 10px;
}

.marketing-landing-heading {
  font-size: 18px;
  font-weight: 600;
  color: #ffffff;
  margin-bottom: 18px;
}

/* Highlight box (ONLY last text) */
.marketing-landing-slot-box {
  display: inline-block;
  background: #E7E7E738;
  color: #ffffff;
  font-size: 18px;
  font-weight: 600;
  padding: 10px 20px;
  border-radius: 6px;
}

/* Responsive */
@media (max-width: 768px) {
  .marketing-landing-heading {
    font-size: 18px;
  }

  .marketing-landing-slot-box {
    font-size: 16px;
  }

  .marketing-landing-banner + .marketing-landing-section {
    margin-top: 40px;
  }
}

@media (max-width: 480px) {
  .marketing-landing-banner + .marketing-landing-section {
    margin-top: 40px;
  }
}

	/* ===== Marketing Landing Page Section ===== */
.marketing-landing-section {
  background-color: #0F0F1E;
  padding: 60px 15px;
  color: #ffffff;
  font-family: Arial, sans-serif;
}

/* Top Image */
.marketing-landing-top-image {
  margin-bottom: 30px;
}

/* Security Alert (reuse previous styles) */
.marketing-landing-security-alert {
  width: 100%;
  margin: 20px 0;
}
.alert-container {
  position: relative;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 15px;
  padding: 8px 25px;
  background: linear-gradient(135deg, #2d1b4e 0%, #3d2a5f0 100%);
  border: 2px solid #ff4d8f;
  border-radius: 100px;
  box-shadow: 0 4px 20px rgba(255, 20, 147, 0.3);
  overflow: hidden;
}
.alert-container::before,
.alert-container::after {
  content: '';
  position: absolute;
  top: 50%;
  left: 50%;
  width: 0;
  height: 0;
  border-radius: 50%;
  background: rgba(255, 20, 147, 0.2);
  transform: translate(-50%, -50%);
  animation: wave 3s ease-out infinite;
  pointer-events: none;
}
.alert-container::after { background: rgba(255,20,147,0.15); animation-delay: 0.5s; }
@keyframes wave { 0%{width:0;height:0;opacity:.8}50%{opacity:.4}100%{width:600px;height:600px;opacity:0} }
.alert-icon-wrapper { position: relative; display: flex; align-items: center; justify-content: center; flex-shrink:0; min-width:40px; height:40px;}
.ping-circle { position:absolute; width:28px; height:28px; border-radius:50%; background:#ff0000; opacity:.75; animation:ping 2s cubic-bezier(0,0,0.2,1) infinite; }
.icon-circle { position:relative; display:inline-flex; align-items:center; justify-content:center; width:28px; height:28px; border-radius:50%; background:#dc2626; color:#fff; font-size:20px; font-weight:600; z-index:1; box-shadow:0 2px 8px rgba(0,0,0,.3); }
@keyframes ping {0%{transform:scale(1);opacity:.75}75%,100%{transform:scale(2);opacity:0}}
.alert-text { color:#fff; font-size:14px; font-weight:600; letter-spacing:0.5px; text-transform:uppercase; line-height:1.4; text-shadow:0 2px 4px rgba(0,0,0,0.3); }

/* Heading */
.marketing-landing-heading {
  font-size: 18px;
  font-weight: 600;
  margin: 12px 0 20px;
  line-height: 1.2;
}
.gradient-text {
  background-image: linear-gradient(135deg, rgb(108, 63, 181), rgb(255, 77, 143));
  -webkit-background-clip: text;
  background-clip: text;
  color: transparent;
  display: inline-block;
  padding-bottom: 16px;
}

/* Subheading */
.marketing-landing-subheading {
  font-size: 20px;
  font-weight: 400;
  color: #b8b8d1;
  margin-bottom: 40px;
}
.highlight-white { color:#fff; font-weight:600; }

/* Fullscreen Image */
.marketing-landing-fullscreen-image { margin: 40px 0; }

/* ===== CLEAN ICON ROWS ===== */

.marketing-landing-icon-list {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 14px;
  margin: 30px 0;
}

.icon-row {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 10px;

  color: #ffffff;
  font-size: 16px;
  font-weight: 600; /* semi-bold */
  line-height: 1.4;
  text-align: center;
}


/* Supporting Text */
.marketing-landing-support-text {
  font-size: 18px;
  font-weight: 600;
  color: #fff;
  margin-bottom: 40px;
}

/* Gradient Button */
.marketing-landing-btn {
  display: inline-block;
  font-size: 16px;
  font-weight: 600;
  color: #fff;
  background: linear-gradient(90deg, #6C3FB5 0%, #FF4D8F 100%);
  padding: 24px 60px;
  border-radius: 8px;
  text-decoration: none;
  transition: 0.4s;
  margin-bottom: 40px;
}

/* Urgency Text */
.marketing-landing-urgency-text {
  color: #FF6B35;
  font-size: 16px;
  font-weight: 600;
}

/* Responsive */
@media(max-width:768px){
  .marketing-landing-heading{font-size:18px;}
  .marketing-landing-subheading{font-size:16px;}
  .marketing-landing-btn{font-size:14px;padding:18px 40px;}
  .icon-box p{font-size:14px;}
  .marketing-landing-support-text{font-size:16px;}
}

/* ===== Section Wrapper ===== */
.marketing-landing-leader-section {
  background: #ffffff;
  padding: 40px 15px;
  color: #000000;
}

/* Headings */
.leader-heading {
  font-size: 32px;
  font-weight: 700;
  margin-bottom: 20px;
}

.leader-subheading {
  font-size: 20px;
  margin-bottom: 50px;
}

/* Subheading text styles */
.text-grey {
  color: #6b7280;
}

.text-black-bold {
  color: #000000;
  font-weight: 700;
}

/* Heading underline */
.heading-with-line {
  position: relative;
  display: inline-block;
  padding-bottom: 30px;
}

.heading-with-line::after {
  content: "";
  position: absolute;
  left: 50%;
  transform: translateX(-50%);
  bottom: 0;
  width: 3cm;
  height: 4px;
  background-color: #2563eb;
  border-radius: 9999px;
  box-shadow: 0 4px 20px rgba(37, 99, 235, 0.4);
}

/* Icon List */
.leader-icon-list {
  max-width: 900px;
  margin: 0 auto 60px;
  text-align: left;
}

.leader-icon-item {
  display: flex;
  align-items: flex-start;
  gap: 14px;
  margin-bottom: 24px;
}

.leader-icon-item h4 {
  font-size: 18px;
  font-weight: 700;
  margin: 0 0 6px;
}

.leader-icon-item p {
  font-size: 15px;
  color: #4b5563;
  margin: 0;
}

/* Video */
.leader-video-wrap {
  max-width: 900px;
  margin: 60px auto;
}

.leader-support-text {
  font-size: 18px;
  font-weight: 600;
  color: #000000;
  margin-bottom: 20px;
}


.text-blue {
  color: #2563eb;
}

/* Reused CTA */
.marketing-landing-btn {
  display: inline-block;
  font-size: 20px;
  font-weight: 600;
  color: #FFFFFF;
  background-image: linear-gradient(90deg, #6C3FB5 0%, #FF4D8F 100%);
  padding: 24px 60px;
  border-radius: 8px;
  text-decoration: none;
  margin-bottom: 24px;
}

/* Urgency Text */
.marketing-landing-urgency-text {
  color: #FF6B35;
  font-size: 16px;
  font-weight: 600;
	margin:0px;
}

/* Responsive */
@media (max-width: 768px) {
  .leader-heading { font-size: 32px; }
  .leader-subheading { font-size: 16px; }
  .leader-icon-item h4 { font-size: 16px; }
  .leader-icon-item p { font-size: 14px; }
  .marketing-landing-btn {
    font-size: 16px;
    padding: 16px 32px;
  }
}
@media (max-width: 1024px) {
  .leader-icon-item amp-img {
    width: 28px;
    height: 28px;
  }
}

@media (max-width: 768px) {
  .leader-icon-item amp-img {
    width: 32px;
    height: 32px;
  }
}

/* ===== Shared Tokens (Reusable Across Site) ===== */
.marketing-gradient-text {
  background-image: linear-gradient(135deg, #6C3FB5, #FF4D8F);
  -webkit-background-clip: text;
  background-clip: text;
  color: transparent;
}

.marketing-grey-text {
  color: #b8b8d1;
}

.marketing-orange-text {
  color: #FF6B35;
  font-weight: 600;
}

/* ===== Section Wrapper ===== */
.marketing-transform-section {
  background-color: #0F0F1E;
  padding: 80px 20px;
}

/* ===== Typography ===== */
.marketing-transform-section h2 {
  color: #ffffff;
  font-size: 36px;
  font-weight: 700;
  text-align: center;
  margin-bottom: 24px;
}

.marketing-transform-desc {
  font-size: 18px;
  font-weight: 600;
  max-width: 900px;
  margin: 0 auto 60px;
  text-align: center;
}

/* ===== Icon Box Grid ===== */
.marketing-icon-box-grid {
  max-width: 1100px;
  margin: 0 auto 60px;
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 24px;
}

.marketing-icon-box {
  background-color: #4A47B80A;
  padding: 32px;
  border: 1px solid #2A2A3E;
  border-radius: 6px;
}

.marketing-icon-box-title {
  color: #ffffff;
  font-weight: 600;
  margin: 8px 0px 12px 0px;
}

.marketing-icon-box-desc {
  color: #b8b8d1;
  font-size: 14px;
  line-height: 1.6;
}


/* ===== Button ===== */
.marketing-gradient-btn {
  display: inline-block;
  font-size: 20px;
  font-weight: 600;
  color: #ffffff;
  background-image: linear-gradient(90deg, #6C3FB5 0%, #FF4D8F 100%);
  border-radius: 8px;
  padding: 20px 56px;
  text-decoration: none;
  transition: opacity 0.3s ease;
}

.marketing-gradient-btn:hover {
  opacity: 0.9;
}

/* ===== Responsive ===== */
@media (max-width: 1024px) {
  .marketing-icon-box-grid {
    grid-template-columns: repeat(2, 1fr);
  }
}

@media (max-width: 768px) {
  .marketing-transform-section {
    padding: 60px 16px;
  }

  .marketing-transform-section h2 {
    font-size: 32px;
  }

  .marketing-icon-box-grid {
    grid-template-columns: 1fr;
  }

  .marketing-gradient-btn {
    font-size: 16px;
    padding: 16px 32px;
  }
}

/* ===== Testimonials Section ===== */
.marketing-testimonials-section {
  background: #ffffff;
  padding: 40px 20px;
}

.marketing-testimonials-title {
  text-align: center;
  font-size: 32px;
  font-weight: 700;
  color: #000000;
}

/* Grid */
.marketing-testimonials-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 24px;
  max-width: 1200px;
  margin: 0 auto;
}

/* Card */
.marketing-testimonial-card {
  border: 1px solid #000000;
  border-radius: 16px;
  padding: 28px;
  background: #ffffff;
  display: flex;
  flex-direction: column;
}

/* Stars */
.testimonial-stars {
  color: #f59e0b;
  font-size: 18px;
  margin-bottom: 12px;
}

/* Title */
.testimonial-title {
  color: #8b5fd3;
  font-weight: 600;
  font-size: 18px;
  margin-bottom: 12px;
}

/* Description */
.testimonial-desc {
  color: #6b7280;
  font-size: 15px;
  line-height: 1.6;
}

/* Divider */
.testimonial-divider {
  border: none;
  border-top: 1px solid #000000;
  margin: 24px 0;
}

/* Author */
.testimonial-author {
  display: flex;
  align-items: center;
  gap: 12px;
}

.testimonial-avatar {
  border-radius: 50%;
}

.testimonial-name {
  font-weight: 600;
  color: #000000;
}

.testimonial-role {
  font-size: 14px;
  color: #6b7280;
}

/* Tablet */
@media (max-width: 1024px) {
  .marketing-testimonials-grid {
    grid-template-columns: repeat(2, 1fr);
  }
}

/* Mobile */
@media (max-width: 768px) {
  .marketing-testimonials-grid {
    grid-template-columns: 1fr;
  }

  .marketing-testimonials-title {
    font-size: 32px;
  }
}

	
.marketing-arsenal-section {
  background: #0F0F1E;
  padding: 40px 20px;
}

.marketing-arsenal-title {
  text-align: center;
  font-size: 32px;
  font-weight: 700;
  color: #ffffff;
  margin-bottom: 24px;
}


.marketing-arsenal-subtitle {
  max-width: 900px;
  margin: 0 auto 60px;
  color: #b8b8d1;
  font-weight: 600;
  font-size: 18px;
  text-align: center;
  line-height: 1.6;
}

.marketing-arsenal-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 24px;
  max-width: 1200px;
  margin: 0 auto 60px;
}

.arsenal-card {
  border: 1px solid #2A2A3E;
  border-radius: 12px;
  padding: 28px;
}

.arsenal-card-header {
  display: flex;
  align-items: center;
  gap: 14px;
  flex-wrap: nowrap;
  margin-bottom: 16px;
}


.arsenal-card-title {
  color: #ffffff;
  font-size: 18px;
  font-weight: 600;
}

.arsenal-card-desc {
  margin: 0;
  color: #b8b8d1;
  font-size: 16px;
  line-height: 1.7;
}

.arsenal-card-list {
  list-style: none;
  padding: 0;
  margin: 0;
}

.arsenal-card-list li {
  position: relative;
  padding-left: 28px;
  margin-bottom: 12px;
  color: #b8b8d1;
  line-height: 1.6;
}

.arsenal-card-list li::before {
  content: "✔";
  position: absolute;
  left: 0;
  color: #ff4d8f;
  font-weight: 700;
}

.arsenal-support-text {
  text-align: center;
  color: #b8b8d1;
  font-size: 18px;
  margin-bottom: 40px;
}

.arsenal-highlight {
  color: #ffffff;
  font-weight: 600;
}

.arsenal-cta-wrap {
  text-align: center;
}

.arsenal-orange-text {
  margin: 20px 0px 10px 0px;
  color: #FF6B35;
  font-weight: 600;
}

.arsenal-footnote {
  margin-top: 12px;
  color: #9ca3af;
  font-size: 16px;
}

/* Responsive */
@media (max-width: 1024px) {
  .marketing-arsenal-grid {
    grid-template-columns: repeat(2, 1fr);
  }
}

@media (max-width: 768px) {
  .marketing-arsenal-grid {
    grid-template-columns: 1fr;
  }

  .gradient-btn {
    font-size: 16px;
    padding: 16px 36px;
  }
}

	.leaders-experience-section {
  background: #000;
  padding: 40px 20px;
  color: #fff;
}

.leaders-title {
  text-align: center;
  font-size: 32px;
  font-weight: 700;
  margin-bottom: 48px;
}

.gradient-text {
  background: linear-gradient(90deg, #2563eb, #ff4d8f);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}

.leaders-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 24px;
  margin-bottom: 56px;
}

.leader-card {
  border: 1px solid #2A2A3E;
  border-radius: 16px;
  padding: 24px;
  background: #0b0b0b;
}

.leader-text {
  color: #9ca3af;
  font-size: 18px;
  line-height: 1.6;
  margin-bottom: 20px;
}

.leader-name {
  color: #fff;
  font-size: 18px;
  font-weight: 600;
}

.leader-position {
  color: #9ca3af;
  font-size: 14px;
  margin-top: 4px;
}



/* Responsive */
@media (max-width: 1024px) {
  .leaders-grid {
    grid-template-columns: repeat(2, 1fr);
  }
}

@media (max-width: 640px) {
  .leaders-grid {
    grid-template-columns: 1fr;
  }

  .leaders-title {
    font-size: 32px;
  }
}
.culture-section {
  background: #ffffff;
  padding: 80px 20px;
  color: #000;
}

.culture-title {
  font-size: 36px;
  font-weight: 700;
  text-align: center;
  margin-bottom: 32px;
  line-height: 1.3;
}

.gradient-text {
  background: linear-gradient(90deg, #6C3FB5 0%, #FF4D8F 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  display: inline-block;
}

.culture-desc {
  font-size: 18px;
  font-weight: 600;
  color: #6b6b7b; /* dull grey */
  line-height: 1.7;
  text-align: center;
  margin-bottom: 40px;
}

.highlight-text {
  color: #000;
  font-weight: 700;
}

.culture-cta {
  text-align: center;
  margin-bottom: 20px;
}

.culture-support {
  color: #000000;
  font-size: 16px;
  text-align: center;
}
	
.gradient-btn {
  display: inline-block;
  background-color: transparent;
  color: #fff;
  font-size: 20px;
  font-weight: 600;
  padding: 12px;
  border-radius: 8px;
  background-image: linear-gradient(90deg, #6C3FB5 0%, #FF4D8F 100%);
  text-decoration: none;
  transition-duration: 0.4s;
}
	
	.marketing-certified-section {
  background-color: #0F0F1E;
  padding: 40px 20px;
  text-align: center;
}

.certified-icon-wrap {
  margin-bottom: 24px;
}

.certified-title {
  font-size: 36px;
  font-weight: 700;
  color: #ffffff;
  margin-bottom: 32px;
  line-height: 1.3;
}

.certified-text {
  font-size: 18px;
  font-weight: 600;
  color: #ffffff;
  opacity: 0.9;
  line-height: 1.7;
  max-width: 920px;
  margin: 0 auto 20px;
}

.certified-cta {
  margin: 40px 0 18px;
  text-align: center;
}

.certified-support {
  color: #9ca3af; /* dull grey */
  font-size: 16px;
}

	
	.marketing-strategy-section {
  background-color: #ffffff;
  padding: 90px 20px 40px 20px;
}

.strategy-title {
  font-size: 38px;
  font-weight: 700;
  color: #000000;
  text-align: center;
  margin-bottom: 26px;
  line-height: 1.3;
}

.strategy-intro {
  font-size: 18px;
  font-weight: 600;
  color: #6b7280; /* dull grey */
  text-align: center;
  max-width: 900px;
  margin: 0 auto 40px;
  line-height: 1.6;
}

/* Tick List */
.strategy-points {
  max-width: 900px;
  margin: 0 auto 36px;
  padding: 0;
  list-style: none;
}

.strategy-points li {
  position: relative;
  padding-left: 34px;
  margin-bottom: 20px;
  font-size: 16px;
  color: #374151;
  line-height: 1.6;
}

/* Pink tick */
.strategy-points li::before {
  content: "✔";
  position: absolute;
  left: 0;
  top: 2px;
  color: #ff4d8f;
  font-weight: 700;
  font-size: 18px;
}

.strategy-note {
  text-align: center;
  font-size: 16px;
  color: #6b7280;
  max-width: 820px;
  margin: 0px 0px 12px 0px ;
  line-height: 1.6;
}

.strategy-cta-section {
  margin-top: 8px;
}

.strategy-cta-title {
  font-size: 38px;
  font-weight: 700;
  color: #000000;
  text-align: center;
  margin-bottom: 26px;
  line-height: 1.3;
}

.strategy-cta-desc {
  font-size: 18px;
  font-weight: 600;
  color: #6b7280;
  text-align: center;
  max-width: 900px;
  margin: 0 auto 40px;
  line-height: 1.6;
}

/* Marketing page form alignment */
@media (max-width: 1024px) {
  .marketing-strategy-section #contact-section {
    width: 100%;
    max-width: 640px;
    margin: 0 auto;
    text-align: center;
  }

  .marketing-strategy-section #contact-section form {
    margin-left: auto !important;
    margin-right: auto !important;
  }
}

	

/* ==============================
   MARKETING FAQ (Professional Blue Theme)
   ============================== */
.marketing-faq-section {
  padding: 40px 20px 40px;
  background: radial-gradient(1200px 600px at 15% -20%, #1d3557 0%, #0b1320 45%, #080d16 100%);
}

.marketing-faq-section > .container > .faq-title {
  color: #eef4ff;
  text-align: center;
  font-size: 36px;
  font-weight: 700;
  margin-bottom: 36px;
}

.marketing-faq-section amp-accordion {
  background: transparent;
  max-width: 1100px;
  margin: 0 auto;
}

.marketing-faq-section amp-accordion > section {
  margin-bottom: 12px;
  background: rgba(14, 22, 36, 0.7);
  border: 1px solid rgba(120, 170, 235, 0.24);
  border-radius: 10px;
  width: 100%;
  max-width: 100%;
  box-sizing: border-box;
  overflow: hidden;
  transition: box-shadow 0.25s ease, background 0.25s ease, border-color 0.25s ease;
}

.marketing-faq-section amp-accordion > section[expanded] {
  background: rgba(20, 31, 49, 0.95);
  border-color: rgba(130, 192, 255, 0.72);
  box-shadow: 0 8px 24px rgba(0, 0, 0, 0.35);
}

.marketing-faq-section amp-accordion > section > h4,
.marketing-faq-section amp-accordion > section[expanded] > h4 {
  display: block;
  width: 100%;
  max-width: 100%;
  position: relative;
  margin: 0;
  padding: 16px 68px 16px 18px;
  box-sizing: border-box;
  background: transparent !important;
  border: none;
  font-size: 18px;
  font-weight: 600;
  line-height: 1.45;
  color: #eef4ff;
  white-space: normal;
  word-break: break-word;
  overflow-wrap: anywhere;
  hyphens: auto;
  transition: color 0.2s ease;
}

/* Force transparent FAQ question background on all screens/states */
.marketing-faq-section amp-accordion > section > h4,
.marketing-faq-section amp-accordion > section[expanded] > h4,
.marketing-faq-section .faq-question,
.marketing-faq-section .faq-question.i-amphtml-accordion-header {
  background: transparent !important;
}

.marketing-faq-section amp-accordion > section > h4:hover {
  color: #84c6ff;
}

.marketing-faq-section amp-accordion > section[expanded] > h4 {
  color: #8ecbff;
}

.marketing-faq-section amp-accordion > section > div {
  background: transparent !important;
  width: 100%;
  max-width: 100%;
  box-sizing: border-box;
  white-space: normal;
  word-break: break-word;
  overflow-wrap: anywhere;
  hyphens: auto;
  padding: 0 18px 14px;
  color: #c4d6f0;
  font-size: 16px;
  line-height: 1.65;
}

/* Custom plus/minus icon for AMP header */
.marketing-faq-section amp-accordion > section > h4::before {
  content: "";
  position: absolute;
  right: 20px;
  top: 50%;
  width: 36px;
  height: 36px;
  border-radius: 8px;
  background: #2a6cb2;
  transform: translateY(-50%);
  transition: background 0.2s ease, box-shadow 0.2s ease;
}

.marketing-faq-section amp-accordion > section > h4::after {
  content: "+";
  position: absolute;
  right: 20px;
  top: 50%;
  width: 36px;
  height: 36px;
  color: #ffffff;
  font-size: 22px;
  line-height: 36px;
  font-weight: 600;
  text-align: center;
  transform: translateY(-50%);
  transition: transform 0.2s ease;
}

.marketing-faq-section amp-accordion > section > h4:hover::before {
  background: #3d86d0;
  box-shadow: 0 2px 10px rgba(79, 156, 235, 0.35);
}

.marketing-faq-section amp-accordion > section[expanded] > h4::after {
  content: "-";
}

@media (max-width: 768px) {
  .marketing-faq-section > .container > .faq-title {
    font-size: 30px;
    margin-bottom: 28px;
  }

  .marketing-faq-section amp-accordion > section > h4,
  .marketing-faq-section amp-accordion > section[expanded] > h4 {
    font-size: 16px;
    padding: 18px 64px 18px 20px;
    background: transparent !important;
  }

  .marketing-faq-section amp-accordion > section > div {
    font-size: 15px;
    padding: 0 20px 18px;
  }

  .marketing-faq-section amp-accordion > section > h4::before {
    width: 32px;
    height: 32px;
    right: 16px;
    border-radius: 6px;
  }

  .marketing-faq-section amp-accordion > section > h4::after {
    right: 16px;
    width: 32px;
    height: 32px;
    font-size: 20px;
    line-height: 32px;
  }
}

/* Marketing Landing Form Styles */
		.smlf-marketing-form-wrapper {
			max-width: 800px;
			margin: 1.5rem auto;
			background: #f9fafb;
			border-radius: 12px;
			padding: 2rem;
		}

		.smlf-form-title {
			font-size: 1.875rem;
			font-weight: 700;
			color: #0f172a;
			margin: 0 0 1.5rem 0;
			text-align: center;
		}

		.smlf-form {
			max-width: 100%;
			margin: 0;
			background: #ffffff;
			border-radius: 8px;
			padding: 1.5rem;
		}

		.smlf-honeypot {
			position: absolute;
			left: -9999px;
			width: 1px;
			height: 1px;
			overflow: hidden;
			opacity: 0;
			pointer-events: none;
			visibility: hidden;
		}

		.smlf-form-row {
			display: flex;
			gap: 1rem;
			margin-bottom: 1rem;
		}

		.smlf-form-col {
			flex: 1;
			display: flex;
			flex-direction: column;
		}

		@media (max-width: 768px) {
			.smlf-form-row {
				flex-direction: column;
			}
		}

		.smlf-field {
			margin-bottom: 1rem;
			display: flex;
			flex-direction: column;
		}

		.smlf-field label {
			font-weight: 600;
			color: #0f172a;
			margin-bottom: 0.25rem;
			font-size: 0.95rem;
		}

		.smlf-required {
			color: #dc2626;
			margin-left: 2px;
		}

		.smlf-field input,
		.smlf-field textarea,
		.smlf-field select {
			border: 1px solid #d1d5db;
			border-radius: 6px;
			padding: 0.625rem 0.75rem;
			font-size: 0.95rem;
			width: 100%;
			box-sizing: border-box;
			transition: border-color 0.2s ease, box-shadow 0.2s ease;
			background-color: #fff;
		}

		.smlf-field select {
			cursor: pointer;
			appearance: none;
			background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23334155' d='M6 9L1 4h10z'/%3E%3C/svg%3E");
			background-repeat: no-repeat;
			background-position: right 0.75rem center;
			padding-right: 2.5rem;
		}

		.smlf-field input:focus,
		.smlf-field textarea:focus,
		.smlf-field select:focus {
			outline: none;
			border-color: #2563eb;
			box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
		}

		.smlf-field textarea {
			resize: vertical;
			min-height: 80px;
		}

		.smlf-checkbox {
			flex-direction: row;
			align-items: flex-start;
			flex-wrap: wrap;
		}

		.smlf-checkbox input[type="checkbox"] {
			width: auto;
			margin-top: 0.25rem;
			flex-shrink: 0;
		}

		.smlf-checkbox label {
			font-weight: normal;
			cursor: pointer;
			flex: 1;
			line-height: 1.5;
		}

		.smlf-checkbox .smlf-error-message {
			width: 100%;
			margin-left: 0;
		}

		.smlf-checkbox a {
			color: #1472ba !important;
			text-decoration: none !important;
			font-weight: 600;
		}

		.smlf-submit {
			background-color: transparent;
			background-image: linear-gradient(90deg, rgb(108, 63, 181) 0%, rgb(255, 77, 143) 100%);
			color: rgb(255, 255, 255);
			fill: rgb(255, 255, 255);
			border: none;
			border-radius: 6px;
			padding: 0.75rem 2rem;
			font-size: 0.95rem;
			font-weight: 600;
			cursor: pointer;
			transition: background-color 0.2s ease, transform 0.1s ease;
			width: 100%;
			display: block;
			margin: 1rem 0 0 0;
			position: relative;
		}

		.smlf-submit:hover {
			background: #1d4ed8;
		}

		.smlf-submit:active {
			transform: scale(0.98);
		}

		.smlf-submit:disabled {
			cursor: not-allowed;
			opacity: 0.6;
		}

		.smlf-submit.is-loading {
			opacity: 0.6;
			pointer-events: none;
		}

		.smlf-response {
			margin-top: 1rem;
			padding: 0.75rem 1rem;
			border-radius: 6px;
			font-weight: 600;
			display: block;
		}

		.smlf-response.smlf-error {
			color: #dc2626;
			background-color: #fee2e2;
			border: 1px solid #fecaca;
		}

		.smlf-response.smlf-success {
			color: #15803d;
			background-color: #d1fae5;
			border: 1px solid #a7f3d0;
			margin-top: 8px;
		}

		.smlf-error-message {
			color: #dc2626;
			font-size: 14px;
			font-weight: normal;
			display: block;
		}

		.smlf-field input:invalid:not(:focus):not(:placeholder-shown),
		.smlf-field textarea:invalid:not(:focus):not(:placeholder-shown),
		.smlf-field select:invalid:not(:focus) {
			border-color: #d1d5db;
		}

		.smlf-field input:valid,
		.smlf-field textarea:valid,
		.smlf-field select:valid {
			border-color: #d1d5db;
		}

		.smlf-spinner {
			display: inline-block;
			width: 14px;
			height: 14px;
			border: 2px solid rgba(255, 255, 255, 0.3);
			border-top-color: #fff;
			border-radius: 50%;
			animation: smlf-spin 0.8s linear infinite;
			margin-right: 8px;
			vertical-align: middle;
		}

		@keyframes smlf-spin {
			from {
				transform: rotate(0deg);
			}
			to {
				transform: rotate(360deg);
			}
		}

		.smlf-submit-loading {
			display: inline-flex;
			align-items: center;
		}

		.smlf-submit.is-loading .smlf-submit-text {
			display: none;
		}

		.smlf-submit.is-loading .smlf-submit-loading {
			display: inline-flex !important;
		}

		.smlf-form-footer {
			margin-top: 1.5rem;
			text-align: center;
		}

		.smlf-urgency-text {
			color: #ff6b35;
			font-size: 0.9rem;
			font-weight: 600;
			margin: 1rem 0 0.5rem 0;
			line-height: 1.4;
		}

		.smlf-value-text {
			color: #4b5563;
			font-size: 0.9rem;
			margin: 0.5rem 0 0 0;
			line-height: 1.4;
		}

		/* Lightbox styles for AMP forms */
		.smlf-lightbox-overlay {
			position: fixed;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
			background: rgba(0, 0, 0, 0.6);
			display: flex;
			align-items: center;
			justify-content: center;
			z-index: 9999;
			padding: 1rem;
		}

		.smlf-lightbox-content {
			background: #fff;
			border-radius: 12px;
			padding: 2rem;
			max-width: 400px;
			width: 100%;
			text-align: center;
			box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
		}

		.smlf-lightbox-icon {
			font-size: 3rem;
			margin-bottom: 1rem;
		}

		.smlf-lightbox-title {
			font-size: 1.5rem;
			font-weight: 700;
			margin-bottom: 0.75rem;
			color: #0f172a;
		}

		.smlf-lightbox-message {
			font-size: 1rem;
			color: #64748b;
			margin-bottom: 1.5rem;
			line-height: 1.5;
		}

		.smlf-lightbox-button {
			background: #2563eb;
			color: #fff;
			border: none;
			border-radius: 6px;
			padding: 0.75rem 2rem;
			font-size: 1rem;
			font-weight: 600;
			cursor: pointer;
			transition: background-color 0.2s ease;
			width: 100%;
		}

		.smlf-lightbox-button:hover {
			background: #1d4ed8;
		}

		.smlf-lightbox-success .smlf-lightbox-title {
			color: #15803d;
		}

		.smlf-lightbox-error .smlf-lightbox-title {
			color: #dc2626;
		}

		/* Responsive adjustments */
		@media (max-width: 640px) {
			.smlf-marketing-form-wrapper {
				padding: 1rem;
				margin: 1rem auto;
			}

			.smlf-form {
				padding: 1rem;
			}

			.smlf-form-title {
				font-size: 1.5rem;
				margin-bottom: 1rem;
			}

			.smlf-lightbox-content {
				padding: 1.5rem;
				margin: 1rem;
			}

			.smlf-lightbox-title {
				font-size: 1.25rem;
			}

			.smlf-lightbox-message {
				font-size: 0.9rem;
			}
		}
	
/* Security Bar Styles */
.security-bar {
    position: fixed;
    bottom: 20px;
    left: 20px;
    right: 20px;
    width: calc(100% - 40px);
    max-width: calc(100% - 40px);
    background: linear-gradient(90deg, #6B46C1 0%, #EC4899 100%);
    color: #fff;
    z-index: 9999;
    box-shadow: 0 -6px 30px rgba(0,0,0,0.3), 0 4px 20px rgba(0,0,0,0.2);
    border-radius: 16px;
}


.security-bar.hide {
    transform: translateY(calc(100% + 30px));
    opacity: 0;
    visibility: hidden;
    pointer-events: none;
}

.security-bar-inner {
    max-width: 1600px;
    width: 100%;
    margin: 0 auto;
    padding: 24px 30px;
    display: grid;
    grid-template-columns: auto 1fr auto;
    align-items: center;
    gap: 30px;
    justify-content: center;
}

.timer-box {
    display: flex;
    align-items: center;
    gap: 12px;
    flex-shrink: 0;
    padding: 8px 16px;
    background: rgba(255, 255, 255, 0.15);
    border-radius: 12px;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}

.timer-icon {
    width: 24px;
    height: 24px;
    color: #fff;
    flex-shrink: 0;
    opacity: 0.9;
}

.timer-text {
    font-family: 'Courier New', 'Monaco', 'Consolas', monospace;
    font-weight: 700;
    font-size: 28px;
    line-height: 1;
    min-width: 90px;
    text-align: center;
    color: #fff;
    letter-spacing: 3px;
    text-shadow: 0 0 10px rgba(255, 255, 255, 0.5), 0 2px 4px rgba(0, 0, 0, 0.3);
}

.security-text {
    text-align: center;
    padding: 0 15px;
    min-width: 0;
    flex: 1;
    max-width: 100%;
}

.security-text h3 {
    font-size: 20px;
    font-weight: 700;
    margin: 0;
    text-transform: uppercase;
    letter-spacing: 0.3px;
    line-height: 1.2;
    color: #fff;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    text-align: center;
}

.security-text p {
    margin: 4px 0 0;
    font-size: 14px;
    color: rgba(255, 255, 255, 0.95);
    line-height: 1.3;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    text-align: center;
}

.security-btn {
    position: relative;
    padding: 14px 28px;
    background-image: linear-gradient(90deg, #6C3FB5 0%, #FF4D8F 100%);
    color: #FFFFFF;
    fill: #FFFFFF;
    text-decoration: none;
    font-weight: 700;
    font-size: 15px;
    overflow: hidden;
    border-radius: 8px;
    display: inline-block;
    transition-duration: 0.4s;
    z-index: 1;
    white-space: nowrap;
    box-shadow: 0 4px 15px rgba(108, 63, 181, 0.4);
    flex-shrink: 0;
    border: none;
}

.security-btn span {
    position: relative;
    z-index: 2;
    color: #FFFFFF;
}

/* Mobile Responsive */
@media (max-width: 768px) {
    .security-bar {
        bottom: 15px;
        left: 15px;
        right: 15px;
        width: calc(100% - 30px);
        max-width: calc(100% - 30px);
        border-radius: 12px;
    }
    
    .security-bar-inner {
        grid-template-columns: auto 1fr auto;
        gap: 15px;
        padding: 18px 18px;
    }
    
    .timer-box {
        padding: 6px 10px;
        gap: 8px;
    }
    
    .timer-icon {
        width: 18px;
        height: 18px;
    }
    
    .timer-text {
        font-size: 20px;
        min-width: 75px;
        letter-spacing: 2px;
    }
    
    .security-text {
        padding: 0 8px;
    }
    
    .security-text h3 {
        font-size: 13px;
    }
    
    .security-text p {
        font-size: 11px;
    }
    
    .security-btn {
        padding: 10px 18px;
        font-size: 12px;
    }
}

@media (max-width: 480px) {
    .security-bar {
        bottom: 10px;
        left: 10px;
        right: 10px;
        width: calc(100% - 20px);
        max-width: calc(100% - 20px);
    }
    
    .security-bar-inner {
        grid-template-columns: 1fr;
        text-align: center;
        gap: 10px;
        padding: 18px 15px;
    }
    
    .timer-box {
        padding: 6px 12px;
        justify-content: center;
        gap: 8px;
    }
    
    .timer-text {
        font-size: 22px;
        min-width: 80px;
    }
    
    .security-text h3 {
        font-size: 13px;
        white-space: normal;
        line-height: 1.3;
    }
    
    .security-text p {
        font-size: 11px;
        white-space: normal;
    }
    
    .security-btn {
        padding: 11px 22px;
        font-size: 13px;
    }
}
	
/* Thank you page */
	

.thankyou-section {
	min-height: 100vh;
	background: linear-gradient(135deg, #ff4d8f, #7841b6);
	padding: 24px;
	display: flex;
	align-items: center;      
	justify-content: center;
	text-align: center;
}

.thankyou-content {
	max-width: 720px;
}

.thankyou-title {
	font-size: 2.25rem;
}

.thankyou-box {
	max-width: 640px;
	background-color:#ffffff;
	padding:16px;
	border-radius:8px;
}

.thankyou-subtitle {
	color: #000000; 
	letter-spacing: 0.04em;
	font-size: 2rem;
	font-weight:700;
}

.thankyou-text {
	color: #405275; 
	font-size: 1rem;
	line-height: 1.6;
}

/* Mobile */
@media (max-width: 576px) {
	.thankyou-title {
		font-size: 1.75rem;
	}

	.thankyou-subtitle {
		font-size: 1.5rem;
	}
}
	
	.welcome-section {
	min-height: 100vh;
	background: #ffffff;
	padding: 80px 16px;
	display: flex;
	align-items: center;      
	justify-content: center;
	text-align: center;
}

.welcome-gradient-box {
	max-width: 640px;
	background-image: linear-gradient(135deg, #6c3fb5, #ff4d8f);
	color: #ffffff;
	padding:24px;
	border-radius:12px;
}

.welcome-title {
	color: #ffffff;
	font-size: 1.6rem;
	margin-top:32px;
}

.welcome-text {
	color: #ffffff;
	font-size: 1rem;
	line-height: 1.6;
}

.welcome-logo amp-img {
	max-width: 180px;
	margin: 0 auto;
}
	
	
.s-aware-cards-section {
  background: #E8ECED;
  padding: 40px 16px;
}

/* GRID */
.s-aware-cards-grid {
  max-width: 1200px;
  margin: 0 auto;
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 24px;
  justify-items: center;
  width: 100%;
  box-sizing: border-box;
}

/* CARD */
.s-aware-cards-card {
  background: #ffffff;
  border-radius: 12px;
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.06);
  display: flex;
  flex-direction: column;
  padding: 20px;
  width: 100%;
  max-width: 360px;
  box-sizing: border-box;
  min-width: 0;
}

/* TOP */
.s-aware-cards-top {
  display: flex;
  align-items: center;
  padding-bottom: 16px;
}

.s-aware-cards-top img,
.s-aware-cards-top amp-img {
  width: 90px;
  height: 90px;
  padding: 8px;
  flex-shrink: 0;
}
.s-aware-cards-top amp-img img{
  object-fit: contain;
}

.s-aware-cards-top h3 {
  margin: 0;
  font-size: 18px;
  font-weight: 600;
  color: #222222;
}

/* BOTTOM */
.s-aware-cards-bottom {
  background: #f1f2f4;
  padding: 18px 20px;
  border-radius: 8px;
}

.s-aware-cards-bottom p {
  margin: 0;
  font-size: 14px;
  line-height: 1.6;
  color: #555555;
}

/* RESPONSIVE */
@media (max-width: 1024px) {
  .s-aware-cards-grid {
    grid-template-columns: repeat(2, 1fr);
    justify-items: stretch;
  }
  .s-aware-cards-card {
    max-width: none;
  }
}

@media (max-width: 600px) {
  .s-aware-cards-grid {
    grid-template-columns: 1fr;
  }
}

	
	.amp-negative-space {
  margin-top: -12px;
}
	.amp-positive-space {
  margin-top: 16px;
}
/* ========================================
   AMP Contact Carousel Section Styles
   ======================================== */

/* Section spacing */
.contact-carousel-section-amp {
  padding: 60px 20px;
  background: #f5f5f5;
  overflow: hidden;
}

/* AMP Carousel container */
.contact-carousel-amp {
  max-width: 900px;
  margin: 0 auto;
}

/* Each slide wrapper */
.carousel-slide-amp {
  display: flex;
  align-items: stretch;
  justify-content: center;
  padding: 10px 20px;
  box-sizing: border-box;
  height: 100%;
}

/* Card styling - outer white background */
.contact-card-amp {
  background: #ffffff;
  border-radius: 12px;
  min-height: 400px;
  max-width: 600px;
  width: 100%;
  padding: 32px;
  box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
  border: 2px solid #6B7FD7;
  text-align: left;
  overflow: hidden;
  display: flex;
  flex-direction: column;
  box-sizing: border-box;
}

/* Icon/Logo - positioned at top */
.card-icon-amp {
  display: flex;
  justify-content: flex-start;
  margin-bottom: 24px;
  flex-shrink: 0;
}

/* Icon wrapper box */
.icon-wrapper-amp {
  width: 64px;
  height: 64px;
  background: #f0f0f0;
  border: 1px solid #e0e0e0;
  border-radius: 12px;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
}

/* Inner card - grey background */
.card-inner-amp {
  background: #f8f8f8;
  border-radius: 12px;
  padding: 32px 40px 32px 40px;
  flex: 1;
  display: flex;
  flex-direction: column;
}

/* Title - bold, dark gray */
.card-inner-amp h3 {
  font-size: 20px;
  font-weight: 700;
  margin: 0 0 24px;
  color: #1a1a1a;
  line-height: 1.4;
  flex-shrink: 0;
}

/* Body text - regular weight, dark gray */
.card-inner-amp p {
  font-size: 15px;
  line-height: 1.75;
  margin: 0 0 16px;
  color: #4a4a4a;
  flex-grow: 1;
}

/* CTA Link - at bottom */
.card-link-amp {
  font-size: 15px;
  font-weight: 600;
  color: #1a1a1a;
  text-decoration: none;
  display: inline-block;
  margin-top: auto;
  flex-shrink: 0;
  line-height: 1.5;
}

.card-inner-amp p.card-link-amp {
  margin: 0;
  flex-grow: 0;
}

.card-link-amp:hover {
  color: #6B7FD7;
}

/* AMP Carousel navigation buttons */
.contact-carousel-amp .amp-carousel-button {
  background-color: rgba(107, 127, 215, 0.9);
  border-radius: 50%;
  width: 40px;
  height: 40px;
}

.contact-carousel-amp .amp-carousel-button:hover {
  background-color: #6B7FD7;
}

.contact-carousel-amp .amp-carousel-button-prev {
  left: 10px;
}

.contact-carousel-amp .amp-carousel-button-next {
  right: 10px;
}

/* ========================================
   Responsive - Tablet
   ======================================== */
@media (max-width: 1024px) {
  .contact-carousel-section-amp {
    padding: 50px 15px;
  }

  .carousel-slide-amp {
    padding: 10px 15px;
  }

  .contact-card-amp {
    padding: 28px;
    min-height: 380px;
  }

  .card-inner-amp {
    padding: 28px 32px 28px 32px;
  }

  .card-inner-amp h3 {
    font-size: 18px;
  }

  .card-inner-amp p {
    font-size: 14px;
  }
}

/* Tablet-only: increase carousel/slide height to avoid clipping */
@media (min-width: 769px) and (max-width: 1024px) {
  .contact-carousel-amp {
    height: 660px !important;
  }

  .carousel-slide-amp {
    min-height: 100%;
  }

  .contact-card-amp {
    min-height: 560px;
  }
}

/* ========================================
   Responsive - Mobile
   ======================================== */
@media (max-width: 768px) {
  .contact-carousel-section-amp {
    padding: 40px 10px;
  }

  .contact-carousel-amp {
    height: 500px;
  }

  .carousel-slide-amp {
    padding: 10px;
  }

  .contact-card-amp {
    min-height: 440px;
    padding: 24px 20px 0 20px;
  }

  .card-icon-amp {
    margin-bottom: 20px;
  }

  .icon-wrapper-amp {
    width: 56px;
    height: 56px;
  }

  .card-inner-amp {
    padding: 28px 24px 28px 24px;
    margin: 0 -20px;
    margin-top: -10px;
    border-radius: 0 0 12px 12px;
  }

  .card-inner-amp h3 {
    font-size: 17px;
    margin-bottom: 16px;
  }

  .card-inner-amp p {
    font-size: 14px;
    line-height: 1.65;
    margin-bottom: 16px;
  }

  .card-link-amp {
    font-size: 14px;
  }

  .contact-carousel-amp .amp-carousel-button {
    width: 36px;
    height: 36px;
  }
}

/* ========================================
   Responsive - Small Mobile
   ======================================== */
@media (max-width: 480px) {
  .contact-carousel-section-amp {
    padding: 30px 5px;
  }

  .contact-carousel-amp {
    height: 540px;
  }

  .contact-card-amp {
    min-height: 480px;
    padding: 20px 16px 0 16px;
  }

  .card-inner-amp {
    padding: 24px 20px 24px 20px;
    margin: 0 -16px;
  }

  .card-inner-amp h3 {
    font-size: 16px;
    margin-bottom: 14px;
  }

  .card-inner-amp p {
    font-size: 13px;
    margin-bottom: 14px;
  }

  .card-link-amp {
    font-size: 13px;
  }
}
	

	
/*Resolution taken to reduce the css*/	
	
	
.common-content-section{
	display: flex;
    flex-direction: row;
    flex-wrap: wrap; 
    max-width: 1200px;
    margin: 0px auto;
    justify-content: flex-start; 
    align-items: flex-start; 
    text-align: left;
    padding: 40px 20px;
	}
	.common-content-section .subcategory-image{
		flex: 1 1 340px;
		min-width: 280px;
	}
	.common-content-section .course-content{
		flex: 1 1 420px;
		min-width: 280px;
	}
	.common-content-section .subcategory-image amp-img{
		width: 100%;
		height: auto;
	}
	@media (max-width: 640px){
		.common-content-section{
			flex-direction: row;
			align-items: stretch;
			justify-content: flex-start;
			text-align: left;
			padding: 28px 16px;
			row-gap: 14px;
		}
		.common-content-section .subcategory-image,
		.common-content-section .course-content{
			min-width: 0;
			flex-basis: 100%;
		}
		.common-content-section .course-content{
			margin-top: 12px;
		}
		.common-content-section .subcategory-image{
			margin-left: 0 !important;
			margin-right: auto !important;
			justify-content: flex-start !important;
			align-self: flex-start !important;
		}
		.common-content-section .course-button{
			margin-top: 16px;
		}
		.common-content-section .course-keypoints li p{
			margin: 8px 0;
		}
	}

	@media (min-width: 768px) and (max-width: 1024px){
		.common-content-section{
			align-items: flex-start;
			justify-content: flex-start;
			text-align: left;
			column-gap: 20px;
			row-gap: 20px;
			padding: 40px 32px;
		}
		.common-content-section .subcategory-image{
			flex: 0 1 460px;
			max-width: 460px;
			margin-left: 0 !important;
			margin-right: auto !important;
			justify-content: flex-start !important;
			align-self: flex-start !important;
		}
		.common-content-section .course-content{
			flex: 1 1 520px;
		}
		.common-content-section .course-button{
			margin-left: 0;
			margin-right: auto;
		}
		.content-section .subcategory-image{
			max-width: 460px;
			justify-content: flex-start !important;
			margin-left: 0 !important;
			margin-right: auto !important;
			margin-top: 20px !important;
		}
		.content-section .subcategory-content > .subcategory-image{
			align-self: flex-start !important;
			margin-left: 0 !important;
			margin-right: auto !important;
		}
		.subcategory-image{
			margin-top: 20px !important;
		}
		.content-section{
			padding-top: 32px !important;
			padding-bottom: 32px !important;
		}
		.section{
			padding-top: 32px !important;
			padding-bottom: 32px !important;
		}
	}
	.bg-light-mint,
	.bg-mint{
		background-color:#E3EDEC;
	}
	.bg-light-purple{
		background-color:#E7DDF7 ;
	}
	
	.bg-white,
	.bg-base-white{
		background-color:#ffffff;
	}
	.bg-light-pink,
	.bg-pink-soft{
		background-color:#FFE7FC;
	}
	.bg-light-blue,
	.bg-blue-soft{
		background-color:#B5E2F0 ;
	}
	.bg-light-yellow,
	.bg-yellow-soft{
		background-color:#FFF0E1 ;
	}
	.bg-light-red{
		background-color:#FFE3E5 ;
	}
	.bg-soft-lavender{
		background-color:#EFF1FF;
	}
	.bg-soft-cyan{
		background-color:#E6FDFF;
	}
	.bg-soft-peach{
		background-color:#FFF5F0;
	}

	.u-mt-12{
		margin-top: 12px !important;
	}
	.u-mt-20{
		margin-top: 20px !important;
	}

	.common-content-section{
		display: flex;
		flex-direction: row;
		flex-wrap: wrap;
		max-width: 1200px;
		justify-content: flex-start;
		align-items: flex-start;
		text-align: left;
		padding: 32px 16px !important;
		margin: 0 auto;
		width: 100%;
		box-sizing: border-box;
		overflow-x: hidden;
	}

	.common-content-section .course-content,
	.common-content-section .subcategory-image{
		box-sizing: border-box;
		max-width: 100%;
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	@media only screen and (min-width: 768px) and (max-width: 1024px) {
		.common-content-section{
			justify-content: flex-start;
			align-items: flex-start;
			text-align: left;
			padding: 32px 24px !important;
			row-gap: 16px;
			width: 100%;
			box-sizing: border-box;
		}
		.common-content-section .subcategory-content{
			flex: 1 1 100%;
			max-width: 100% !important;
		}
		.common-content-section .subcategory-image{
			width: 380px!important;
			max-width: 100%;
			margin-left: 0 !important;
			margin-right: auto !important;
			justify-content: flex-start !important;
			align-self: flex-start !important;
		}
		.common-content-section .subcategory-image amp-img{
			width: 100% !important;
			max-width: 380px !important;
		}
    .subcategory-image {
        width: 380px; 
        height: auto;
        max-width: 100%;
    }
		.hero-img-wrapper{
		width: 450px; 
        height: auto;
        max-width: 100%;
		}
}

/* Final layout safety overrides for course/common sections */
.common-content-section{
  width: 100%;
  box-sizing: border-box;
}

.common-content-section .subcategory-content,
.common-content-section .course-content,
.common-content-section .subcategory-image{
  width: 100% !important;
  max-width: 100% !important;
  box-sizing: border-box;
}

.common-content-section .course-keypoints{
  margin: 0;
  padding-left: 0;
}

.common-content-section .course-keypoints li{
  align-items: flex-start;
}

.common-content-section .course-keypoints li::before{
  margin-top: 2px;
  flex: 0 0 auto;
}

@media (max-width: 1024px){
  .common-content-section{
    padding-left: 24px !important;
    padding-right: 24px !important;
  }

  .common-content-section .subcategory-content{
    padding-left: 8px !important;
    padding-right: 8px !important;
  }

  .carousel-container .hero-static .course-button{
    margin-left: auto !important;
    margin-right: auto !important;
    display: inline-block;
  }
}

@media (max-width: 640px){
  .common-content-section{
    padding-left: 20px !important;
    padding-right: 20px !important;
  }

  .common-content-section .subcategory-content{
    padding-left: 6px !important;
    padding-right: 6px !important;
  }

  .common-content-section .course-keypoints{
    padding-left: 4px !important;
  }
}

/* Keep section keypoints markers inside content box */
.section-keypoints{
  list-style: disc !important;
  list-style-position: outside;
  margin-left: 0 !important;
  padding-left: 20px !important;
}

.section-keypoints li{
  display: list-item;
  margin: 0 0 8px 0;
}

.section-keypoints li p{
  margin: 0 !important;
  padding: 0;
  display: block;
}

/* Optional: hide AMP runtime loader spinner */
.i-amphtml-new-loader {
  display: none !important;
}


/* AMP-only styles for ESG India Contact Form */
.esg-india-contact-form-form {
	max-width: 520px;
	margin: 1.5rem auto;
	padding: 1.5rem;
	border: 1px solid #dcdcdc;
	border-radius: 8px;
	background: #fff;
	box-shadow: 0 6px 16px rgba(15, 23, 42, 0.08);
}

.esg-india-contact-form-field {
	margin-bottom: 1rem;
	display: flex;
	flex-direction: column;
	gap: 0.35rem;
}

.esg-india-contact-form-field label {
	font-weight: 600;
	color: #0f172a;
	font-size: 0.95rem;
}

.esg-india-contact-form-required {
	color: #dc2626;
	margin-left: 2px;
}

.esg-india-contact-form-field input,
.esg-india-contact-form-field textarea {
	border: 1px solid #cbd5f5;
	border-radius: 6px;
	padding: 0.65rem 0.75rem;
	font-size: 1rem;
	width: 100%;
	box-sizing: border-box;
}

.esg-india-contact-form-field textarea {
	resize: vertical;
	min-height: 120px;
}

.esg-india-contact-form-field input[type="number"] {
	max-width: 200px;
}

.esg-india-contact-form-checkbox {
	flex-direction: row;
	align-items: flex-start;
	gap: 0.5rem;
	flex-wrap: wrap;
}

.esg-india-contact-form-checkbox input[type="checkbox"] {
	width: 16px;
	height: 16px;
	min-width: 16px;
	min-height: 16px;
	margin-top: 0.25rem;
	flex-shrink: 0;
	appearance: auto;
	-webkit-appearance: checkbox;
	accent-color: #2563eb;
}

.esg-india-contact-form-checkbox label {
	font-weight: 400;
	cursor: pointer;
	flex: 1;
	line-height: 1.5;
}

.esg-india-contact-form-checkbox a {
	color: #1472ba;
	font-weight: 600;
	text-decoration: none;
}

.esg-india-contact-form-checkbox .esg-india-contact-form-error-message {
	width: 100%;
}

.esg-india-contact-form-submit {
	background: #2563eb;
	color: #fff;
	border: none;
	border-radius: 6px;
	padding: 0.75rem 1.5rem;
	font-size: 1rem;
	font-weight: 600;
	cursor: pointer;
	width: auto;
	display: block;
	margin: 0;
}

.esg-india-contact-form-submit[disabled] {
	opacity: 0.7;
	cursor: not-allowed;
}

.esg-india-contact-form-error-message {
	color: #dc2626;
	font-size: 14px;
	font-weight: 400;
	margin-top: 0.25rem;
	display: block;
	min-height: 20px;
}

.esg-india-contact-form-lightbox-overlay {
	background: rgba(0, 0, 0, 0.7);
	height: 100vh;
	display: flex;
	align-items: center;
	justify-content: center;
	padding: 1rem;
}

.esg-india-contact-form-lightbox-content {
	background: #fff;
	padding: 2rem;
	border-radius: 12px;
	text-align: center;
	max-width: 460px;
	width: 100%;
	box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
}

.esg-india-contact-form-lightbox-success {
	background: #d1fae5;
	border: 2px solid #a7f3d0;
}

.esg-india-contact-form-lightbox-error {
	background: #fee2e2;
	border: 2px solid #fecaca;
}

.esg-india-contact-form-lightbox-icon {
	font-size: 3em;
	margin-bottom: 0.5rem;
}

.esg-india-contact-form-lightbox-title {
	font-weight: 700;
	font-size: 1.25rem;
	margin-bottom: 0.75rem;
	color: #0f172a;
}

.esg-india-contact-form-lightbox-message {
	margin-bottom: 1.5rem;
	color: #374151;
	line-height: 1.6;
}

.esg-india-contact-form-lightbox-button {
	margin-top: 0.5rem;
	padding: 0.75rem 1.5rem;
	border: none;
	border-radius: 6px;
	background: #2563eb;
	color: #fff;
	font-size: 1rem;
	font-weight: 600;
	cursor: pointer;
}
