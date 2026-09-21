<!doctype html>
<html amp lang="en">
<head>
  <meta charset="utf-8">
  <title>Courses | SucceedLEARN</title>
  <link rel="canonical" href="<?php echo esc_url(get_permalink()); ?>">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">

  <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">

  <!-- AMP Boilerplate -->
  <style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>

  <!-- AMP Scripts -->
  <script async src="https://cdn.ampproject.org/v0.js"></script>
  <script async custom-element="amp-sidebar" src="https://cdn.ampproject.org/v0/amp-sidebar-0.1.js"></script>
  <script async custom-element="amp-bind" src="https://cdn.ampproject.org/v0/amp-bind-0.1.js"></script>
  <script async custom-element="amp-selector" src="https://cdn.ampproject.org/v0/amp-selector-0.1.js"></script>
  <script async custom-element="amp-accordion" src="https://cdn.ampproject.org/v0/amp-accordion-0.1.js"></script>
  <script async custom-element="amp-form" src="https://cdn.ampproject.org/v0/amp-form-0.1.js"></script>
  <script async custom-element="amp-mustache" src="https://cdn.ampproject.org/v0/amp-mustache-0.2.js"></script>

  <?php do_action('amp_post_template_head', $this); ?>
  
  <style amp-custom>
    /* ========================================
       AMP Course Archive Styles
       ======================================== */
    
    * {
      box-sizing: border-box;
    }
    
    body {
      font-family: 'Open Sans', sans-serif;
      margin: 0;
      padding: 0;
      background: #f5f7fa;
      color: #333;
    }

.empty-banner {
  margin: 10px;
  max-height: 40px !important;
  height: 40px !important;
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

/* Arrow on the right (unchanged) */
.menu-title::after {
    content: '▼'; 
    position: absolute;
    right: 0;
    top: 50%;
    transform: translateY(-50%);
    font-size: 12px;
    transition: transform 0.3s ease;
}

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

.footer-section {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0px 20px 20px 20px;
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

.footer-inner {
  flex: 1 1 280px;
  max-width: 100%;
  margin: 0;
  padding: 0;
  text-align: left;
  display: flex;
  flex-direction: column;
  align-items: flex-start;
}

/* Three menu groups: inline columns that wrap when width is tight */
.footer-columns-row {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
  align-items: start;
  gap: 24px 32px;
  flex: 2 1 400px;
  min-width: 0;
  max-width: 100%;
  margin: 0;
  padding: 0;
  text-align: left;
}

.footer-col {
  text-align: left;
  min-width: 0;
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

.footer-inner .footer-logo {
  display: block;
  margin-bottom: 12px;
}

.footer-description {
  max-width: 500px;
  font-size: 14px;
  color: #555;
  line-height: 1.6;
}
.footer-highlight-link {
  color: #1472ba;
  text-decoration: none;
  font-weight: 600; 
}

  .footer-subtopic {
    font-size: 1.3em;
    color: #222;
    margin-bottom: 12px;
  }

  .footer-links {
    list-style: none;
    padding: 0;
    margin: 0;
  }
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

  .contact-info {
    list-style: none;
    padding: 0;
    margin: 0;
    color: #555;
  }

  .contact-info li {
    margin: 8px 0;
  }

  .no-style-link {
    color: inherit;
    text-decoration: none;
    cursor: pointer;
  }

  .footer-cert-badges {
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    align-items: center;
    justify-content: flex-start;
    gap: 10px;
    margin-top: 14px;
  }

  .footer-cert-badges amp-img {
    display: block;
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

@media (max-width: 479px) {
  .footer-main-row {
    padding: 0 16px 20px 16px;
    gap: 24px;
  }
  .footer-columns-row {
    grid-template-columns: 1fr;
  }
}
    
    /* Main Container */
    .cca-amp-container {
      max-width: 1400px;
      margin: 0 auto;
      padding: 20px;
    }
    
    .cca-amp-wrapper {
      display: flex;
      gap: 20px;
      align-items: flex-start;
    }
    
    /* ========================================
       Sidebar Styles
       ======================================== */
    .cca-amp-sidebar-wrapper {
      width: 280px;
      flex-shrink: 0;
      position: sticky;
      top: 85px;
      z-index: 10;
    }
    
    .cca-amp-sidebar {
      background: #fff;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 2px 10px rgba(0,0,0,0.08);
    }
    
    .cca-amp-sidebar-title {
      font-size: 1.3em;
      margin: 0px 16px;
      padding: 20px 15px;
		border-radius:8px;
      color: #fff;
      text-align: center;
      background: linear-gradient(to right, #576094, #915ebd);
    }
    
    .cca-amp-category-list {
      list-style: none;
      padding: 16px;
      margin: 0;
    }
    
    .cca-amp-category-item {
      margin: 0;
      padding: 0;
		margin-top:12px;
    }
    
    .cca-amp-category-link {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 12px 15px;
      text-decoration: none;
      color: #555;
      transition: all 0.3s ease;
      font-size: 0.95em;
      cursor: pointer;
      border: none;
      background: transparent;
      width: 100%;
      text-align: left;
    }
    
    .cca-amp-category-link:hover,
    .cca-amp-category-link[selected],
    .cca-amp-category-link.active {
      background: #0073aa;
      color: #fff;
		border-radius:4px;
    }
    
    .cca-amp-category-count {
      font-size: 0.85em;
      opacity: 0.7;
    }
    
    /* ========================================
       Content Area Styles
       ======================================== */
    .cca-amp-content {
      flex: 1;
      min-width: 0;
    }
    
    /* Filter Bar */
    .cca-amp-filter-bar {
      background: linear-gradient(to right, #576094, #915ebd);
      padding: 20px;
      border-radius: 8px;
      margin-bottom: 25px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      gap: 20px;
      flex-wrap: wrap;
    }
    
    .cca-amp-search-wrapper {
      position: relative;
      flex: 1;
      min-width: 200px;
      max-width: 400px;
    }
    
    .cca-amp-search-input {
      width: 100%;
      padding: 12px 15px 12px 45px;
      border: 2px solid #e0e0e0;
      border-radius: 6px;
      font-size: 0.95em;
      background: #fff;
      outline: none;
      text-transform: lowercase;
    }
    
    .cca-amp-search-input:focus {
      border-color: #0073aa;
    }
    
    .cca-amp-search-input::placeholder {
      text-transform: none;
    }
    
    .cca-amp-search-icon {
      position: absolute;
      left: 15px;
      top: 50%;
      transform: translateY(-50%);
      width: 20px;
      height: 20px;
      color: #999;
    }
    
    .cca-amp-sort-wrapper {
      display: flex;
      align-items: center;
      gap: 10px;
    }
    
    .cca-amp-sort-label {
      color: #fff;
      font-size: 0.95em;
      white-space: nowrap;
    }
    
    .cca-amp-sort-links {
      display: flex;
      flex-wrap: wrap;
      gap: 8px;
      align-items: center;
    }
    
    .cca-amp-sort-link {
      padding: 8px 14px;
      border-radius: 6px;
      font-size: 0.9em;
      background: rgba(255,255,255,0.2);
      color: #fff;
      text-decoration: none;
      border: 1px solid rgba(255,255,255,0.4);
      transition: background 0.2s ease;
    }
    
    .cca-amp-sort-link:hover,
    .cca-amp-sort-link.active {
      background: #fff;
      color: #576094;
      border-color: #fff;
    }
    
    /* Desktop: sort + reset group on its own row; reset on next line, wider */
    .cca-amp-sort-reset-group {
      display: flex;
      flex-direction: column;
      align-items: stretch;
      gap: 12px;
      width: 100%;
      margin-left: 0;
    }
    
    .cca-amp-reset-btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      padding: 12px 24px;
      min-width: 220px;
      width: 100%;
      max-width: 320px;
      background: rgba(255,255,255,0.25);
      color: #fff;
      font-size: 0.95em;
      font-weight: 600;
      text-decoration: none;
      border-radius: 6px;
      border: 1px solid rgba(255,255,255,0.5);
      transition: background 0.2s ease;
    }
    
    .cca-amp-reset-btn:hover {
      background: #fff;
      color: #576094;
      border-color: #fff;
    }

    /* Bulk / full category purchase section (AMP) */
    .cca-amp-bulk-purchase {
      width: 100%;
      margin: 0 0 25px;
      background: linear-gradient(135deg, #576094 0%, #915ebd 100%);
      border-radius: 10px;
      padding: 20px 22px;
      box-shadow: 0 3px 15px rgba(0,0,0,0.1);
      box-sizing: border-box;
      color: #fff;
    }

    .cca-amp-bulk-title {
      margin: 0 0 10px;
      font-size: 1.2em;
      font-weight: 700;
      color: #fff;
    }

    .cca-amp-bulk-desc,
    .cca-amp-bulk-intro {
      margin: 0 0 10px;
      font-size: 0.95em;
      line-height: 1.5;
      color: rgba(255,255,255,0.95);
    }

    .cca-amp-bulk-price {
      margin: 0 0 14px;
      font-size: 1.2em;
      font-weight: 700;
      color: #fff;
    }

    .cca-amp-bulk-btn {
      display: inline-block;
      padding: 12px 20px;
      background: #fff;
      color: #576094;
      font-weight: 600;
      text-decoration: none;
      border-radius: 6px;
    }
    
    /* ========================================
       Course Grid Styles
       ======================================== */
    .cca-amp-courses-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr); /* 3 cards per row on desktop */
      gap: 25px;
    }
    
    .cca-amp-course-card {
      background: #fff;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 2px 10px rgba(0,0,0,0.08);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      display: flex;
      flex-direction: column;
    }
    
    .cca-amp-course-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 25px rgba(0,0,0,0.12);
    }
    
    .cca-amp-course-card[hidden],
    .cca-amp-course-card.amp-hidden {
      display: none !important;
    }
    
    .cca-amp-course-thumbnail {
      position: relative;
      overflow: hidden;
      background: #B4C1D4 !important;
      height: 220px;
      width: 100%;
      padding: 12px;
      box-sizing: border-box;
    }
    
    .cca-amp-course-thumbnail a {
      position: absolute;
      top: 12px;
      left: 12px;
      right: 12px;
      bottom: 12px;
    }
    
    .cca-amp-course-thumbnail amp-img {
      object-fit: contain;
      object-position: center;
    }
    
    .cca-amp-course-thumbnail amp-img img {
      object-fit: contain;
      object-position: center;
    }
    
    .cca-amp-course-content {
      padding: 20px;
      display: flex;
      flex-direction: column;
      flex: 1;
    }
    
    .cca-amp-course-title {
      font-size: 1.1em;
      margin: 0 0 10px;
      line-height: 1.4;
    }
    
    .cca-amp-course-title a {
      color: #333;
      text-decoration: none;
    }
    
    .cca-amp-course-title a:hover {
      color: #0073aa;
    }
    
    .cca-amp-course-excerpt {
      font-size: 0.9em;
      color: #666;
      line-height: 1.6;
      margin-bottom: 8px;
      height: 2.88em; /* Fixed: 2 lines × 1.6 line-height × 0.9 font-size */
      overflow: hidden;
      display: -webkit-box;
      -webkit-line-clamp: 2;
      -webkit-box-orient: vertical;
    }
    
    .cca-amp-read-more {
      display: inline-block;
      font-size: 0.9em;
      color: #0073aa;
      text-decoration: none;
      margin-bottom: 12px;
      font-weight: 500;
    }
    
    .cca-amp-read-more:hover {
      text-decoration: underline;
    }
    
    .cca-amp-course-meta {
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      gap: 8px;
      padding: 10px 0;
      border-top: 1px solid #eee;
      margin-bottom: 15px;
      font-size: 1em;
    }
    
    .cca-amp-course-duration {
      color: #666;
      font-size: 1em;
    }
    
    .cca-amp-course-duration .cca-amp-duration-label {
      font-weight: 600;
      font-size: 1em;
    }
    
    .cca-amp-course-duration .cca-amp-duration-value {
      font-size: 1em;
    }
    
    .cca-amp-course-price {
      font-weight: 600;
      color: #0073aa;
      font-size: 1.1em;
    }
    
    .cca-amp-course-price.free {
      color: #28a745;
      font-size: 1.1em;
    }
    
    .cca-amp-course-link {
      display: block;
      width: 100%;
      padding: 12px 20px;
      background: #0073aa;
      color: #fff;
      text-align: center;
      text-decoration: none;
      border-radius: 6px;
      font-weight: 600;
      transition: background 0.3s ease;
      margin-top: auto;
      box-sizing: border-box;
    }
    
    .cca-amp-course-link:hover {
      background: #005a87;
    }
    
    /* No Courses Message */
    .cca-amp-no-courses {
      text-align: center;
      padding: 60px 20px;
      background: #fff;
      border-radius: 8px;
      grid-column: 1 / -1;
    }
    
    .cca-amp-no-courses p {
      color: #666;
      font-size: 1.1em;
    }
    
    /* ========================================
       Pagination Styles
       ======================================== */
    .cca-amp-pagination {
      margin-top: 40px;
      display: flex;
      justify-content: center;
    }
    
    .cca-amp-page-numbers {
      list-style: none;
      padding: 0;
      margin: 0;
      display: flex;
      gap: 8px;
      flex-wrap: wrap;
      justify-content: center;
    }
    
    .cca-amp-page-numbers li {
      margin: 0;
    }
    
    .cca-amp-page-number,
    .cca-amp-page-prev,
    .cca-amp-page-next {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      min-width: 40px;
      height: 40px;
      padding: 0 12px;
      background: #fff;
      color: #333;
      text-decoration: none;
      border-radius: 6px;
      font-size: 0.95em;
      transition: all 0.3s ease;
    }
    
    .cca-amp-page-number:hover,
    .cca-amp-page-prev:hover,
    .cca-amp-page-next:hover {
      background: #0073aa;
      color: #fff;
    }
    
    .cca-amp-page-number.active {
      background: #0073aa;
      color: #fff;
    }
    
    /* ========================================
       Mobile Sidebar (AMP Sidebar) & Category Menu
       ======================================== */
    .cca-amp-mobile-menu-btn {
      display: none;
      padding: 14px 18px;
      background: linear-gradient(to right, #576094, #915ebd);
      color: #fff;
      border: none;
      border-radius: 8px;
      font-size: 1.05em;
      font-weight: 600;
      cursor: pointer;
      margin-bottom: 18px;
      width: 100%;
      text-align: center;
      box-shadow: 0 2px 8px rgba(87, 96, 148, 0.3);
    }
    
    .cca-amp-mobile-menu-btn::before {
      content: "☰ ";
      font-size: 1.2em;
      margin-right: 6px;
    }
    
    .cca-amp-mobile-category-bar {
      display: none;
      margin-bottom: 15px;
    }
    
    amp-sidebar {
      width: 300px;
      max-width: 85vw;
      background: #fff;
    }
    
    amp-sidebar .cca-amp-sidebar {
      box-shadow: none;
      border-radius: 0;
    }
    
    .cca-amp-sidebar-close {
      display: block;
      width: 100%;
      padding: 15px 20px;
      text-align: right;
      background: #f5f5f5;
      border: none;
      font-size: 1.5em;
      cursor: pointer;
      font-weight: 300;
    }
    
    /* ========================================
       AMP Selector Styles
       ======================================== */
    amp-selector[role="listbox"] {
      display: block;
    }
    
    amp-selector [option] {
      outline: none;
    }
    
    amp-selector [option][selected] {
      background: #0073aa;
      color: #fff;
    }
    
    /* ========================================
       Responsive Styles
       ======================================== */
    @media (max-width: 1024px) {
      .cca-amp-wrapper {
        flex-direction: column;
      }
      
      .cca-amp-sidebar-wrapper {
        display: none;
      }
      
      .cca-amp-mobile-menu-btn,
      .cca-amp-mobile-category-bar {
        display: block;
      }
      
      .cca-amp-content {
        width: 100%;
      }

      .cca-amp-courses-grid {
        grid-template-columns: repeat(2, 1fr); /* 2 cards per row on tablet */
      }
      
      .cca-amp-course-thumbnail {
        padding: 12px !important;
      }
      
      .cca-amp-course-thumbnail a {
        top: 12px !important;
        left: 12px !important;
        right: 12px !important;
        bottom: 12px !important;
      }
      
      /* Tablet: sort left, reset right (inline), reset small width */
      .cca-amp-sort-reset-group {
        flex-direction: row;
        width: auto;
        margin-left: auto;
        align-items: center;
      }
      
      .cca-amp-reset-btn {
        min-width: 0;
        max-width: none;
        width: auto;
        padding: 8px 16px;
        font-size: 0.9em;
      }
    }
    
    @media (max-width: 768px) {
      .cca-amp-filter-bar {
        flex-direction: column;
        align-items: stretch;
      }
      
      .cca-amp-search-wrapper {
        max-width: 100%;
      }
      
      /* Mobile: sort and reset on different lines (stacked) */
      .cca-amp-sort-reset-group {
        flex-direction: column;
        width: 100%;
        margin-left: 0;
        align-items: stretch;
      }
      
      .cca-amp-reset-btn {
        width: 100%;
        max-width: none;
        padding: 12px 20px;
      }
      
      .cca-amp-sort-wrapper {
        width: 100%;
      }
      
      .cca-amp-sort-links {
        flex: 1;
      }
      
      .cca-amp-courses-grid {
        grid-template-columns: repeat(2, 1fr); /* Keep 2 columns down to 640px */
      }
      
      .cca-amp-course-thumbnail {
        height: 200px;
        padding: 12px !important;
      }
      
      .cca-amp-course-thumbnail a {
        top: 12px !important;
        left: 12px !important;
        right: 12px !important;
        bottom: 12px !important;
      }
      
      .cca-amp-course-excerpt,
      .cca-amp-read-more,
      .cca-amp-course-meta {
        display: block !important;
      }
      
      .cca-amp-course-meta {
        display: flex !important;
      }
    }
    
    @media (max-width: 640px) {
      .cca-amp-courses-grid {
        grid-template-columns: 1fr; /* 1 card per row on mobile */
      }
    }

    @media (max-width: 480px) {
      .cca-amp-container {
        padding: 15px 10px;
      }
    }
  </style>

  <!-- Schema Markup -->
  <script type="application/ld+json">
  {
    "@context": "http://schema.org",
    "@type": "CollectionPage",
    "name": "Courses - SucceedLEARN",
    "url": "<?php echo esc_url(get_permalink()); ?>",
    "description": "Browse our collection of professional courses"
  }
  </script>
</head>
<body>
<section class="empty-banner" aria-label="Security Awareness Banner">
  </section>
<?php
// Get course data
$query = new CCA_Course_Query();
$categories = $query->get_all_categories();

// Use cca_cat to avoid conflict with WordPress "category" query var
// Store as slug for clean, SEO-friendly URLs
$current_category = isset($_GET['cca_cat']) ? sanitize_key($_GET['cca_cat']) : '';
$current_sort = isset($_GET['sort']) ? sanitize_text_field($_GET['sort']) : 'newest';

// Resolve slug → term_id for database queries
$current_category_id = 0;
if (!empty($current_category)) {
    $cat_term = get_term_by('slug', $current_category, 'course_category');
    if ($cat_term && !is_wp_error($cat_term)) {
        $current_category_id = $cat_term->term_id;
    }
}

// Page number: WordPress sets paged from URL path (/page/4/); fallback to query string
$paged_var = get_query_var( 'paged' );
$current_page = ( $paged_var && is_numeric( $paged_var ) ) ? max( 1, (int) $paged_var ) : ( isset( $_GET['paged'] ) ? max( 1, (int) $_GET['paged'] ) : 1 );

// Get courses (server-side filtering)
$results = $query->get_courses($current_category_id, $current_sort, $current_page);
$courses = $results['courses'];
$total_pages = $results['pages'];
$current_page = $results['current_page'];

// Explicit base for pagination (current URL without paged) so each link gets correct paged
$pagination_base = remove_query_arg( 'paged' );
// Reset: clean page URL with no filters (category, sort, paged)
$reset_url = get_permalink();

?>

<!-- AMP State for search-only filtering (category/sort/pagination are server-side via links) -->
<amp-state id="courseFilter">
  <script type="application/json">
  { "search": "" }
  </script>
</amp-state>

<!-- ✅ AMP Sidebar/Menu (your existing menu) -->
<?php 
if (file_exists(plugin_dir_path(__FILE__) . 'menu.php')) {
    include(plugin_dir_path(__FILE__) . 'menu.php'); 
}
?>

<!-- Mobile Category Sidebar -->
<amp-sidebar id="category-sidebar" layout="nodisplay" side="left">
  <button class="cca-amp-sidebar-close" on="tap:category-sidebar.close">×</button>
  <div class="cca-amp-sidebar">
    <h3 class="cca-amp-sidebar-title">Categories</h3>
    <ul class="cca-amp-category-list">
      <li class="cca-amp-category-item">
        <a href="<?php echo esc_url( remove_query_arg( 'cca_cat', add_query_arg( array( 'sort' => $current_sort, 'paged' => 1 ) ) ) ); ?>" 
           class="cca-amp-category-link<?php echo $current_category === '' ? ' active' : ''; ?>"
           target="_top">
          All Courses
        </a>
      </li>
      <?php foreach ($categories as $cat) : 
        $cat_url = add_query_arg( array( 'cca_cat' => $cat->slug, 'sort' => $current_sort, 'paged' => 1 ) );
        $is_active = $current_category === $cat->slug;
      ?>
        <li class="cca-amp-category-item">
          <a href="<?php echo esc_url( $cat_url ); ?>"
             class="cca-amp-category-link<?php echo $is_active ? ' active' : ''; ?>"
             target="_top">
            <?php echo esc_html( $cat->name ); ?>
            <span class="cca-amp-category-count">(<?php echo $cat->count; ?>)</span>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</amp-sidebar>

<!-- Main Content -->
<div class="cca-amp-container">
  <div class="cca-amp-wrapper">
    
    <!-- Desktop Sidebar -->
    <aside class="cca-amp-sidebar-wrapper">
      <div class="cca-amp-sidebar">
        <h3 class="cca-amp-sidebar-title">Categories</h3>
        <ul class="cca-amp-category-list">
          <li class="cca-amp-category-item">
            <a href="<?php echo esc_url( remove_query_arg( 'cca_cat', add_query_arg( array( 'sort' => $current_sort, 'paged' => 1 ) ) ) ); ?>" 
               class="cca-amp-category-link<?php echo $current_category === '' ? ' active' : ''; ?>"
               target="_top">
              All Courses
            </a>
          </li>
          <?php foreach ($categories as $cat) : 
            $cat_url = add_query_arg( array( 'cca_cat' => $cat->slug, 'sort' => $current_sort, 'paged' => 1 ) );
            $is_active = $current_category === $cat->slug;
          ?>
            <li class="cca-amp-category-item">
              <a href="<?php echo esc_url( $cat_url ); ?>"
                 class="cca-amp-category-link<?php echo $is_active ? ' active' : ''; ?>"
                 target="_top">
                <?php echo esc_html( $cat->name ); ?>
                <span class="cca-amp-category-count">(<?php echo $cat->count; ?>)</span>
              </a>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </aside>

    <!-- Content Area -->
    <main class="cca-amp-content">
      
      <!-- Mobile Category Menu (visible only on mobile) -->
      <div class="cca-amp-mobile-category-bar">
        <button class="cca-amp-mobile-menu-btn" on="tap:category-sidebar.open" aria-label="Open category menu">
          Categories
        </button>
      </div>
      
      <!-- Filter Bar -->
      <div class="cca-amp-filter-bar">
        <div class="cca-amp-search-wrapper">
          <svg class="cca-amp-search-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <circle cx="11" cy="11" r="8"></circle>
            <path d="m21 21-4.35-4.35"></path>
          </svg>
          <input type="text" 
                 id="course-search"
                 class="cca-amp-search-input" 
                 placeholder="Search courses..."
                 on="input-debounced:AMP.setState({courseFilter: {search: event.value}})"
                 [value]="courseFilter.search">
        </div>
        
        <div class="cca-amp-sort-reset-group">
          <div class="cca-amp-sort-wrapper">
            <span class="cca-amp-sort-label">Sort by:</span>
            <div class="cca-amp-sort-links">
              <a href="<?php echo esc_url( add_query_arg( array( 'cca_cat' => $current_category, 'sort' => 'newest', 'paged' => 1 ) ) ); ?>" 
                 class="cca-amp-sort-link<?php echo $current_sort === 'newest' ? ' active' : ''; ?>" target="_top">Newest</a>
              <a href="<?php echo esc_url( add_query_arg( array( 'cca_cat' => $current_category, 'sort' => 'oldest', 'paged' => 1 ) ) ); ?>" 
                 class="cca-amp-sort-link<?php echo $current_sort === 'oldest' ? ' active' : ''; ?>" target="_top">Oldest</a>
              <a href="<?php echo esc_url( add_query_arg( array( 'cca_cat' => $current_category, 'sort' => 'a-z', 'paged' => 1 ) ) ); ?>" 
                 class="cca-amp-sort-link<?php echo $current_sort === 'a-z' ? ' active' : ''; ?>" target="_top">A–Z</a>
              <a href="<?php echo esc_url( add_query_arg( array( 'cca_cat' => $current_category, 'sort' => 'z-a', 'paged' => 1 ) ) ); ?>" 
                 class="cca-amp-sort-link<?php echo $current_sort === 'z-a' ? ' active' : ''; ?>" target="_top">Z–A</a>
            </div>
          </div>
          <a href="<?php echo esc_url( $reset_url ); ?>" class="cca-amp-reset-btn" target="_top">Reset</a>
        </div>
      </div>

      <?php
        // Bulk section (AMP) – shown when a category is selected and has bulk data
        $bulk_data = ($current_category_id > 0 && class_exists('CCA_Term_Meta')) ? CCA_Term_Meta::get_bulk_data($current_category_id) : null;
        $show_bulk_section = $bulk_data && ( $bulk_data['bulk_price'] !== '' || $bulk_data['bulk_description'] !== '' || $bulk_data['bulk_cta_url'] !== '' || $bulk_data['section_title'] !== '' || $bulk_data['section_intro'] !== '' );
      ?>
      <?php if ($show_bulk_section) : ?>
        <?php
          $bulk_title = !empty($bulk_data['section_title'])
            ? $bulk_data['section_title']
            : ($bulk_data['name'] . ' — ' . __('Full category package', 'custom-course-archive'));
          $bulk_intro = !empty($bulk_data['section_intro'])
            ? $bulk_data['section_intro']
            : __('Companies can purchase all courses in this category as a single bulk package for multiple users.', 'custom-course-archive');
        ?>
        <div class="cca-amp-bulk-purchase">
          <h3 class="cca-amp-bulk-title"><?php echo esc_html($bulk_title); ?></h3>
          <?php if ($bulk_data['bulk_description'] !== '') : ?>
            <p class="cca-amp-bulk-desc"><?php echo esc_html($bulk_data['bulk_description']); ?></p>
          <?php endif; ?>
          <p class="cca-amp-bulk-intro"><?php echo esc_html($bulk_intro); ?></p>
          <?php if ($bulk_data['bulk_cta_url'] !== '') : ?>
            <a class="cca-amp-bulk-btn" href="<?php echo esc_url($bulk_data['bulk_cta_url']); ?>" target="_top"><?php echo esc_html($bulk_data['bulk_cta_text']); ?></a>
          <?php endif; ?>
        </div>
      <?php endif; ?>

      <!-- Courses Grid -->
      <div class="cca-amp-courses-grid">
        <?php if (!empty($courses)) : ?>
          <?php foreach ($courses as $course) : 
            // Get course categories for filtering
            $course_cats = isset($course['categories']) ? $course['categories'] : array();
            $course_cat_ids = array_map(function($cat) { return $cat->term_id; }, $course_cats);
            $course_cat_str = ',' . implode(',', $course_cat_ids) . ',';
            
            // Truncate excerpt to 80 characters
            $excerpt = isset($course['excerpt']) ? $course['excerpt'] : '';
            $short_excerpt = mb_strlen($excerpt) > 80 ? mb_substr($excerpt, 0, 80) . '...' : $excerpt;
            
            // Clean title for search (lowercase, alphanumeric only)
            $search_title = strtolower(trim($course['title']));
            $search_title_clean = strtolower(preg_replace('/[^a-z0-9\s]/i', '', $course['title']));

            // Thumbnail background now uses CSS default (#B4C1D4) - no inline styles applied
          ?>
            <article class="cca-amp-course-card"
                     data-title="<?php echo esc_attr($search_title_clean); ?>"
                     [hidden]="courseFilter.search.length > 0 && '<?php echo esc_js($search_title); ?>'.indexOf(courseFilter.search) < 0">
              
              <div class="cca-amp-course-thumbnail">
                <a href="<?php echo esc_url($course['url']); ?>">
                  <amp-img src="<?php echo esc_url($course['thumbnail']); ?>"
                           alt="<?php echo esc_attr($course['title']); ?>"
                           width="600"
                           height="280"
                           layout="fill">
                  </amp-img>
                </a>
              </div>
              
              <div class="cca-amp-course-content">
                <h3 class="cca-amp-course-title">
                  <a href="<?php echo esc_url($course['url']); ?>">
                    <?php echo esc_html($course['title']); ?>
                  </a>
                </h3>
                
                <p class="cca-amp-course-excerpt">
                  <?php echo esc_html($short_excerpt); ?>
                </p>
                <a href="<?php echo esc_url($course['url']); ?>" class="cca-amp-read-more">Read More</a>
                
                <div class="cca-amp-course-meta">
                  <span class="cca-amp-course-duration">
                    <?php 
                    $duration_label = !empty($course['duration_label']) ? $course['duration_label'] : 'Total Duration';
                    $duration_value = !empty($course['duration']) && $course['duration'] != 'N/A' ? $course['duration'] : '';
                    if (!empty($duration_value)) {
                      echo '<span class="cca-amp-duration-label">' . esc_html($duration_label) . ': </span><span class="cca-amp-duration-value">' . esc_html($duration_value) . '</span>';
                    } else {
                      echo '<span class="cca-amp-duration-label">' . esc_html($duration_label) . ': </span><span class="cca-amp-duration-value">—</span>';
                    }
                    ?>
                  </span>
                </div>
                
                <a href="<?php echo esc_url($course['url']); ?>" class="cca-amp-course-link">
                  View Course
                </a>
              </div>
            </article>
          <?php endforeach; ?>
        <?php else : ?>
          <div class="cca-amp-no-courses">
            <p>No courses found.</p>
          </div>
        <?php endif; ?>
      </div>

      <!-- Pagination -->
      <?php if ($total_pages > 1) : ?>
        <nav class="cca-amp-pagination">
          <ul class="cca-amp-page-numbers">
            <?php
            $page_params = array( 'cca_cat' => $current_category, 'sort' => $current_sort );
            if ($current_page > 1) {
              $prev_url = add_query_arg( array_merge( $page_params, array( 'paged' => $current_page - 1 ) ), $pagination_base );
              echo '<li><a href="' . esc_url( $prev_url ) . '" class="cca-amp-page-prev" target="_top">Prev</a></li>';
            }
            $start = max(1, $current_page - 1);
            $end = min($total_pages, $current_page + 1);
            if ($start > 1) {
              $first_url = add_query_arg( array_merge( $page_params, array( 'paged' => 1 ) ), $pagination_base );
              echo '<li><a href="' . esc_url( $first_url ) . '" class="cca-amp-page-number" target="_top">1</a></li>';
              if ($start > 2) echo '<li><span class="cca-amp-page-dots">...</span></li>';
            }
            for ($i = $start; $i <= $end; $i++) {
              $page_url = add_query_arg( array_merge( $page_params, array( 'paged' => $i ) ), $pagination_base );
              $active_class = ($i == $current_page) ? ' active' : '';
              echo '<li><a href="' . esc_url( $page_url ) . '" class="cca-amp-page-number' . $active_class . '" target="_top">' . $i . '</a></li>';
            }
            if ($end < $total_pages) {
              if ($end < $total_pages - 1) echo '<li><span class="cca-amp-page-dots">...</span></li>';
              $last_url = add_query_arg( array_merge( $page_params, array( 'paged' => $total_pages ) ), $pagination_base );
              echo '<li><a href="' . esc_url( $last_url ) . '" class="cca-amp-page-number" target="_top">' . $total_pages . '</a></li>';
            }
            if ($current_page < $total_pages) {
              $next_url = add_query_arg( array_merge( $page_params, array( 'paged' => $current_page + 1 ) ), $pagination_base );
              echo '<li><a href="' . esc_url( $next_url ) . '" class="cca-amp-page-next" target="_top">Next</a></li>';
            }
            ?>
          </ul>
        </nav>
      <?php endif; ?>
      
    </main>
  </div>
</div>

<!-- ✅ Footer (your existing footer) -->
<?php 
if (file_exists(plugin_dir_path(__FILE__) . 'footer.php')) {
    include(plugin_dir_path(__FILE__) . 'footer.php'); 
}
?>

</body>
</html>
