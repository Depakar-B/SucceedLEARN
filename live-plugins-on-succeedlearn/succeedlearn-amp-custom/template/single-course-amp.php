<?php
/* Template Name: Single Course AMP */
?>
<!doctype html>
<html amp lang="en">
<head>
    <meta charset="utf-8">
    <title><?php the_title(); ?> | SucceedLearn</title>
    <link rel="canonical" href="<?php echo get_permalink(); ?>">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
    <script async src="https://cdn.ampproject.org/v0.js"></script>
    <script async custom-element="amp-bind" src="https://cdn.ampproject.org/v0/amp-bind-0.1.js"></script>
    <script async custom-element="amp-state" src="https://cdn.ampproject.org/v0/amp-state-0.1.js"></script>
    <script async custom-element="amp-youtube" src="https://cdn.ampproject.org/v0/amp-youtube-0.1.js"></script>
    <script async custom-element="amp-vimeo" src="https://cdn.ampproject.org/v0/amp-vimeo-0.1.js"></script>
    <script async custom-element="amp-video" src="https://cdn.ampproject.org/v0/amp-video-0.1.js"></script>
    <script async custom-element="amp-carousel" src="https://cdn.ampproject.org/v0/amp-carousel-0.2.js"></script>
    <script async custom-element="amp-position-observer" src="https://cdn.ampproject.org/v0/amp-position-observer-0.1.js"></script>
    <script async custom-element="amp-animation" src="https://cdn.ampproject.org/v0/amp-animation-0.1.js"></script>
    <style amp-boilerplate>
        body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}
        @-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}
        @-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}
        @-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}
        @-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}
        @keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}
    </style>
    <noscript>
        <style amp-boilerplate>
            body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}
        </style>
    </noscript>

    <?php
    $course_id = get_the_ID();
    $banner_gradient = get_post_meta($course_id, 'banner_gradient', true);
    $banner_bg_hex   = get_post_meta($course_id, 'banner_bg_hex', true);
    $banner_bg       = $banner_gradient ?: $banner_bg_hex;

    $course_title        = get_post_meta($course_id, 'course_title', true);
    $course_desc         = get_post_meta($course_id, 'course_description', true);
    $duration_title      = get_post_meta($course_id, 'duration_title', true);
    $duration_value      = get_post_meta($course_id, 'duration_value', true);
    $individual_title           = get_post_meta($course_id, 'individual_title', true);
    $individual_price           = get_post_meta($course_id, 'individual_price', true);
    $individual_currency_symbol = get_post_meta($course_id, 'individual_currency_symbol', true);
    $individual_btn_text        = get_post_meta($course_id, 'individual_btn_text', true);
    $individual_btn_url         = get_post_meta($course_id, 'individual_btn_url', true);
    $corporate_title            = get_post_meta($course_id, 'corporate_title', true);
    $corporate_btn_text         = get_post_meta($course_id, 'corporate_btn_text', true);
    $corporate_btn_url          = get_post_meta($course_id, 'corporate_btn_url', true);
    $course_level               = get_post_meta($course_id, 'course_level', true);
    $course_category            = get_post_meta($course_id, 'course_category', true);
    $video_url           = get_post_meta($course_id, 'video_url', true);
    
    // Enhanced Media Detection Function for AMP
    function detect_media_type_amp($raw_media) {
        if (empty($raw_media)) {
            return ['type' => '', 'url' => '', 'id' => ''];
        }

        // YouTube detection
        if (strpos($raw_media, 'youtube.com') !== false || strpos($raw_media, 'youtu.be') !== false) {
            $yt_id = '';
            if (strpos($raw_media, 'v=') !== false) {
                $yt_id = explode('v=', $raw_media)[1];
                $yt_id = explode('&', $yt_id)[0];
            } elseif (strpos($raw_media, 'youtu.be/') !== false) {
                $yt_id = basename(parse_url($raw_media, PHP_URL_PATH));
            } else {
                $yt_id = basename($raw_media);
            }
            return [
                'type' => 'youtube',
                'url' => $raw_media,
                'id' => $yt_id
            ];
        }

        // Vimeo detection
        if (strpos($raw_media, 'vimeo.com') !== false) {
            $vimeo_id = '';
            if (preg_match('/vimeo\.com\/(\d+)/', $raw_media, $matches)) {
                $vimeo_id = $matches[1];
            } else {
                $vimeo_id = basename(parse_url($raw_media, PHP_URL_PATH));
            }
            return [
                'type' => 'vimeo',
                'url' => $raw_media,
                'id' => $vimeo_id
            ];
        }

        // Video file detection (mp4, webm, ogg)
        if (preg_match('/\.(mp4|webm|ogg|ogv)$/i', $raw_media)) {
            return [
                'type' => 'video',
                'url' => $raw_media,
                'id' => ''
            ];
        }

        // Image detection (jpg, png, gif, webp, svg)
        if (preg_match('/\.(jpg|jpeg|png|gif|webp|svg|bmp|ico)$/i', $raw_media)) {
            return [
                'type' => 'image',
                'url' => $raw_media,
                'id' => ''
            ];
        }

        // Unknown → treat as image
        return [
            'type' => 'image',
            'url' => $raw_media,
            'id' => ''
        ];
    }
    
    $media_info = detect_media_type_amp($video_url);
    $media_type = $media_info['type'];
    $media_url = $media_info['url'];
    $media_id = $media_info['id'] ?? '';

    $individual_btn_url_display = !empty($individual_btn_url) ? $individual_btn_url : $corporate_btn_url;
    $individual_has_button = (!empty($individual_btn_text) && !empty($individual_btn_url_display));
    $corporate_has_button = (!empty($corporate_btn_text) && !empty($corporate_btn_url));
    $individual_has_price = (!empty($individual_price) || !empty($individual_currency_symbol));
    $course_price_display = $individual_has_price ? trim($individual_currency_symbol . ' ' . $individual_price) : '-';
    $course_duration_display = !empty($duration_value) ? $duration_value : '-';
    $course_level_display = !empty($course_level) ? $course_level : '-';
    $course_category_display = !empty($course_category) ? $course_category : '-';
    ?>

    <style amp-custom>
        /* ============================================
           GLOBAL TYPOGRAPHY STANDARDIZATION
           ============================================ */
        /* Standardize all paragraph tags */
        p {
            font-size: 16px !important;
            color: #1a1a1a !important;
            font-weight: 400 !important;
            font-family: 'Open Sans', sans-serif !important;
            line-height: 1.6 !important;
            margin: 0 0 15px 0 !important;
        }
        p:last-child {
            margin-bottom: 0 !important;
        }

        /* Override for white text sections in AMP - Banner and Target Audience (gradient backgrounds) */
        .single-amp-course-banner-section p,
        .single-amp-course-banner-section h1,
        .single-amp-course-banner-section h2,
        .single-amp-course-banner-section h3,
        .single-amp-course-banner-section h4,
        .single-amp-course-banner-section span,
        .single-amp-course-banner-section div,
        .single-amp-course-banner-section .single-amp-course-banner-box-title,
        .single-amp-course-banner-section .single-amp-course-banner-box-value,
        .single-amp-course-banner-section .single-amp-course-banner-box-price,
        .single-amp-course-target-audience p,
        .single-amp-course-target-audience li,
        .single-amp-course-target-audience ul,
        .single-amp-course-target-audience ol,
        .single-amp-course-target-audience h2,
        .single-amp-course-target-audience h3,
        .single-amp-course-target-audience h4,
        .single-amp-course-target-audience h5,
        .single-amp-course-target-audience h6,
        .single-amp-course-target-audience span,
        .single-amp-course-target-audience div,
        .single-amp-course-target-audience strong,
        .single-amp-course-target-audience em,
        .single-amp-course-target-audience b,
        .single-amp-course-target-audience i {
            color: #ffffff !important;
        }

        /* Standardize all list items */
        li {
            font-size: 16px !important;
            color: #1a1a1a !important;
            font-weight: 400 !important;
            font-family: 'Open Sans', sans-serif !important;
            line-height: 1.7 !important;
            margin-bottom: 0px !important;
        }

        /* Standardize all unordered and ordered lists */
        ul, ol {
            margin: 0 0 15px 0 !important;
            padding-left: 20px !important;
        }
        ul:last-child, ol:last-child {
            margin-bottom: 0 !important;
        }

        /* ============================================
           STANDARDIZED SPACING SYSTEM
           ============================================ */
        /* Standard spacing below section titles */
        .single-amp-course-objectives-title,
        .single-amp-course-laws-title,
        .single-amp-course-why-this-course-title,
        .single-amp-course-dynamic-section-title,
        .single-amp-course-target-audience-title,
        .single-amp-what-if-comply-title,
        .single-amp-course-outline-title,
        .single-amp-faq-title {
            margin-bottom: 12px !important;
        }

        /* Standard spacing below descriptions */
        .single-amp-course-objectives-description,
        .single-amp-course-laws-description,
        .single-amp-course-why-this-course-item-desc,
        .single-amp-what-if-comply-description,
        .single-amp-course-target-audience-description {
            margin-bottom: 20px !important;
        }

        /* Standard spacing for subsection titles */
        .single-amp-course-dynamic-subsection-title,
        .single-amp-course-outline-item-title {
            margin-bottom: 12px !important;
        }

        html {
            scroll-behavior: smooth;
        }
        
        body {
            margin: 0;
            font-family: 'Open Sans', sans-serif;
            color: #1a1a1a;
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
	
.amp-negative-space {
  margin-top: -12px;
}
	.amp-positive-space {
  margin-top: 16px;
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

		
		
/* ✅ Banner Section */
.single-amp-course-banner-section {
    padding: 80px 20px;
    background: <?php echo $banner_bg ? esc_html($banner_bg) : 'linear-gradient(90deg, #576094, #915EBD)'; ?>;
    background-size: cover;
    background-position: center;
}

.single-amp-course-banner-container {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    flex-wrap: wrap;
    gap: 40px;
    max-width: 1200px;
    margin: 0 auto;
}

.single-amp-course-banner-left, .single-amp-course-banner-right {
    flex: 1 1 48%;
}

.single-amp-course-banner-course-title {
    font-size: 36px;
    font-weight: 700;
    margin: 0 0 10px;
}

.single-amp-course-banner-course-description {
    font-size: 16px;
    line-height: 1.6;
    margin-bottom: 25px;
}
.single-amp-course-banner-course-description p {
    margin: 0 0 15px 0;
    font-size: 16px !important;
    line-height: 1.6;
    color: #fff !important;
    font-weight: 400 !important;
}
.single-amp-course-banner-course-description p:last-child {
    margin-bottom: 0;
}

.single-amp-course-banner-info-boxes {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 20px;
}

/* Container for the two button boxes */
.single-amp-course-banner-btn-boxes {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 20px;
    width: 100%;
}

.single-amp-course-banner-btn-boxes .single-amp-course-banner-box {
    flex: 1 1 32%;
    max-width: 32%;
    text-align: center;
}

/* ✅ Mobile view (≤600px): All boxes stacked full width */
@media (max-width: 600px) {
    .single-amp-course-banner-duration-box,
    .single-amp-course-banner-btn-boxes .single-amp-course-banner-box {
        flex: 1 1 100%;
        max-width: 100%;
    }

    .single-amp-course-banner-info-boxes {
        gap: 15px;
    }
}

.single-amp-course-banner-box {
    padding: 25px 20px;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    justify-content: center;
}

.single-amp-course-banner-box-title,
.single-amp-course-banner-box-value,
.single-amp-course-banner-box-price {
    text-align: left;
    margin: 0;
    padding-left: 5px;
}

.single-amp-course-banner-box-title {
    font-size: 16px;
    font-weight: 500;
    margin-bottom: 0px;
}

.single-amp-course-banner-box-value,
.single-amp-course-banner-box-price {
    font-size: 22px;
    font-weight: 600;
}

.single-amp-course-banner-btn {
    display: block;
    width: 100%;
    text-align: center;
    padding: 14px 0;
    border-radius: 6px;
    font-weight: 500;
    text-decoration: none;
    transition: 0.3s;
    font-size: 18px;
    margin-top: auto;
}

.single-amp-course-banner-individual-btn {
    background: #fff;
    color: #16234e;
    border: 2px solid #fff;
    margin-top: 10px;
}

.single-amp-course-banner-corporate-btn {
    background: transparent;
    border: 2px solid #fff;
    color: #fff;
}

.single-amp-course-banner-btn:hover {
    opacity: 0.9;
}

/* ✅ Hero CTA row (AMP) */
.single-amp-banner-cta-row {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 14px;
    width: 100%;
    margin: 14px 0 6px 0;
}
.single-amp-banner-cta-box {
    border-radius: 10px;
    padding: 14px;
    background: rgba(255, 255, 255, 0.08);
    border: 1px solid rgba(255, 255, 255, 0.22);
}
.single-amp-banner-cta-title {
    margin: 0 0 10px 0 !important;
    font-size: 16px !important;
    line-height: 1.3 !important;
    font-weight: 500 !important;
    color: #ffffff !important;
}

/* ✅ Post-hero section (AMP): only desktop-like meta strip */
.single-amp-post-hero-section {
    max-width: 1290px;
    margin: 12px auto 0;
    padding: 0 16px;
    box-sizing: border-box;
}
.single-amp-course-meta-strip {
    background: linear-gradient(135deg, #ffffff 0%, #f8fbff 55%, #f3f7ff 100%);
    border-radius: 16px;
    border: 1px solid #d9e2f1;
    display: grid;
    grid-template-columns: repeat(4, minmax(0, 1fr));
    width: 100%;
    position: relative;
    overflow: hidden;
    box-shadow: 0 18px 40px rgba(15, 23, 42, 0.14);
}
.single-amp-course-meta-strip::before {
    content: "";
    position: absolute;
    inset: 0;
    background: linear-gradient(90deg, rgba(110, 115, 216, 0.08) 0%, rgba(110, 115, 216, 0) 35%, rgba(110, 115, 216, 0) 65%, rgba(110, 115, 216, 0.08) 100%);
    pointer-events: none;
}
.single-amp-course-meta-item {
    padding: 26px 28px;
    border-right: 1px solid #e7ecf5;
    background: transparent;
    position: relative;
}
.single-amp-course-meta-item:last-child {
    border-right: none;
}
.single-amp-course-meta-label {
    margin: 0 0 8px 0 !important;
    color: #334155 !important;
    font-size: 13px !important;
    text-transform: uppercase;
    letter-spacing: 0.08em;
    font-weight: 700 !important;
    line-height: 1.25 !important;
}
.single-amp-course-meta-value {
    margin: 0 !important;
    font-size: 17px !important;
    line-height: 1.35 !important;
    color: #0f172a !important;
    font-weight: 600 !important;
}

@media (max-width: 900px) {
    .single-amp-banner-cta-row {
        grid-template-columns: 1fr;
    }
    .single-amp-course-meta-strip {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
    .single-amp-course-meta-item:nth-child(2n) {
        border-right: none;
    }
    .single-amp-course-meta-item:nth-child(-n+2) {
        border-bottom: 1px solid #eceff4;
    }
}
@media (max-width: 640px) {
    .single-amp-course-meta-strip {
        grid-template-columns: 1fr;
    }
    .single-amp-course-meta-item {
        border-right: none;
        border-bottom: 1px solid #eceff4;
        padding: 20px 18px;
    }
    .single-amp-course-meta-item:last-child {
        border-bottom: none;
    }
    .single-amp-course-meta-value {
        font-size: 15px !important;
    }
}

/* ✅ AMP Media (YouTube, Vimeo, Video, Image) */
.single-amp-course-banner-right {
    width: 100%;
    max-width: 700px;
    margin: 0 auto;
}

.single-amp-course-banner-video,
.single-amp-course-banner-image {
    position: relative;
    width: 100%;
    overflow: hidden;
}

.single-amp-course-banner-video amp-youtube,
.single-amp-course-banner-video amp-vimeo,
.single-amp-course-banner-video amp-video {
    width: 100%;
    height: auto;
    aspect-ratio: 16 / 9;
    object-fit: contain;
}

.single-amp-course-banner-image amp-img {
    width: 100%;
    height: auto;
    object-fit: contain;
    display: block;
}

/* ✅ Responsive (Tablet & Mobile) */
@media (max-width: 1024px) {
    .single-amp-course-banner-container {
        gap: 30px;
    }

    .single-amp-course-banner-course-title {
        font-size: 32px;
    }

    .single-amp-course-banner-video amp-youtube,
    .single-amp-course-banner-video amp-vimeo,
    .single-amp-course-banner-video amp-video {
        aspect-ratio: 16 / 9;
    }
    
    .single-amp-course-banner-image amp-img {
        aspect-ratio: 16 / 9;
    }
}

@media (max-width: 768px) {
    .single-amp-course-banner-btn-boxes .single-amp-course-banner-box {
        flex: 1 1 32%;
        max-width: 48%;
        text-align: center;
    }

    .single-amp-course-banner-duration-box {
        min-width: 90%;
    }

    .single-amp-course-banner-container {
        flex-direction: column;
        gap: 30px;
    }

    .single-amp-course-banner-left, .single-amp-course-banner-right {
        flex: 1 1 100%;
    }

    .single-amp-course-banner-course-title {
        font-size: 28px;
    }

    .single-amp-course-banner-video amp-youtube,
    .single-amp-course-banner-video amp-vimeo,
    .single-amp-course-banner-video amp-video {
        aspect-ratio: 16 / 9;
    }
    
    .single-amp-course-banner-image amp-img {
        aspect-ratio: 16 / 9;
    }
}

@media (max-width: 480px) {
    .single-amp-course-banner-course-title {
        font-size: 24px;
    }

    .single-amp-course-banner-box {
        padding: 20px 15px;
        min-height: 100px;
    }

    .single-amp-course-banner-btn {
        font-size: 14px;
        padding: 12px 0;
    }
}

@media (max-width: 768px) {
    @media (max-width: 480px) {
        .single-amp-course-banner-box {
            padding: 20px 15px;
            min-height: 100px;
            min-width: 100%;
            margin: 0px 20px;
			gap:20px;
        }

        .single-amp-course-banner-info-boxes {
            gap: 15px;
            padding: 20px;
        }
    }
}
	  
/* ✅ Single AMP Course – Objectives Section */
.single-amp-course-objectives-section {
  padding: 40px 16px;
  background: #ffffff;
  color: #1a1a1a;
}

.single-amp-course-objectives-container {
  max-width: 1200px;
  margin: 0 auto;
  display: flex;
  justify-content: space-between;
  flex-wrap: wrap;
  gap: 40px;
}

.single-amp-course-objectives-left {
  flex: 1 1 100%;
}

.single-amp-course-objectives-contentbox {
  padding: 40px 30px;
  box-sizing: border-box;
}

.single-amp-course-objectives-title {
  font-size: 32px;
  color: #1a1a1a;
  margin-bottom: 15px;
  font-weight: 700;
  text-transform: capitalize;
	align-self:center;
	text-align:center;
}

.single-amp-course-objectives-description {
  margin-bottom: 20px;
}

.single-amp-course-objectives-details {
  line-height: 1.8;
}

.single-amp-course-objectives-details ul,
.single-amp-course-objectives-details ol {
  margin-left: 0px;
  padding: 0px;
}

/* ✅ Responsive Design */
@media (max-width: 1024px) {
  .single-amp-course-objectives-section {
    padding: 30px 16px;
  }
  .single-amp-course-objectives-contentbox {
    padding: 30px 25px;
  }
  .single-amp-course-objectives-title {
    font-size: 28px;
	  margin-bottom:32px;
  }
}

@media (max-width: 768px) {
  .single-amp-course-objectives-section {
    padding: 20px 16px;
  }
  .single-amp-course-objectives-contentbox {
    padding: 25px 20px;
  }
  .single-amp-course-objectives-title {
    font-size: 24px;
	  margin-bottom:32px;
  }
  .single-amp-course-objectives-description{
    margin: 0px;
  }
  .single-amp-course-objectives-details {
    margin-left: 20px;
  }
}

@media (max-width: 480px) {
  .single-amp-course-objectives-contentbox {
    padding: 20px 15px;
  }
  .single-amp-course-objectives-title {
    font-size: 22px;
    line-height: 1.3;
  }
}

	  
/* ✅ Base section style */
.single-amp-course-why-this-course {
  border-radius: 12px;
  padding: 20px 16px 0px 16px;
  background: #f9f9ff;
}

.single-amp-course-why-this-course-title {
  font-family: 'Open Sans', sans-serif;
  font-weight: 600;
  font-size: 28px;
  line-height: 1.3;
  text-align: center;
  margin-bottom: 30px;
}

.single-amp-course-why-this-course-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 24px;
  max-width: 1000px;
  margin: 0 auto;
}

.single-amp-course-why-this-course-item {
  padding: 20px;
  display: flex;
  flex-direction: column;
  justify-content: flex-start;
  min-height: 140px;
}

.single-amp-course-why-this-course-item-title {
  font-family: 'Open Sans', sans-serif;
  font-weight: 600;
  font-size: 16px;
  line-height: 1.4;
  margin: 0 0 8px 0;
}

.single-amp-course-why-this-course-item-desc {
  font-family: 'Open Sans', sans-serif;
  margin: 0;
}

@media (min-width: 600px) and (max-width: 1024px) {
  .single-amp-course-why-this-course-grid {
    grid-template-columns: repeat(2, 1fr);
  }
}

@media (max-width: 599px) {
  .single-amp-course-why-this-course-grid {
    grid-template-columns: 1fr;
  }

  .single-amp-course-why-this-course-title {
    font-size: 24px;
  }

  .single-amp-course-why-this-course-item {
    padding:0px;
  }
}

	  
.single-amp-course-laws {
  background: #f9f9ff;
  border-radius: 12px;
  padding: 20px 24px;
}

.single-amp-course-laws-title {
  font-family: 'Open Sans', sans-serif;
  font-weight: 600;
  font-size: 28px;
  line-height: 120%;
  color: #1a1a1a;
  text-align: left;
  margin-bottom: 12px;
}

.single-amp-course-laws-description {
  font-family: 'Open Sans', sans-serif;
  margin-bottom: 20px;
}

.single-amp-course-laws-content {
  font-family: 'Open Sans', sans-serif;
  text-align: left;
}

.single-amp-course-laws-content table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 16px;
}

.single-amp-course-laws-content th,
.single-amp-course-laws-content td {
  border: 1px solid #ddd;
  padding: 8px;
  text-align: left;
}

.single-amp-course-laws-content th {
  background: #f0f0f0;
  font-weight: 600;
}

.single-amp-course-laws-content.has-table {
  overflow-x: auto;
  -webkit-overflow-scrolling: touch;
}

.single-amp-course-laws-content.has-table table {
  min-width: 760px;
  table-layout: fixed;
}

.single-amp-course-laws-content.has-table th,
.single-amp-course-laws-content.has-table td {
  white-space: normal;
  word-break: break-word;
  overflow-wrap: anywhere;
  hyphens: auto;
  max-width: none;
  padding-right: 18px;
}

@media (max-width: 768px) {
  .single-amp-course-laws-content.has-table table {
    min-width: 520px;
  }
  .single-amp-course-laws-content.has-table th,
  .single-amp-course-laws-content.has-table td {
    max-width: none;
  }
}

/* ✅ Tablet (≤ 992px) */
@media (max-width: 992px) {
  .single-amp-course-laws {
    padding: 18px 20px;
  }

  .single-amp-course-laws-title {
    font-size: 26px;
  }

  .single-amp-course-laws-content {
    font-size: 15px;
  }
}

/* ✅ Mobile (≤ 600px) */
@media (max-width: 600px) {
  .single-amp-course-laws {
    padding: 16px 16px 40px 16px;
    border-radius: 10px;
  }

  .single-amp-course-laws-title {
    font-size: 22px;
    text-align: center;
    margin-bottom: 10px;
  }

  .single-amp-course-laws-description {
    text-align: center;
    margin-bottom: 16px;
  }

  .single-amp-course-laws-content {
    line-height: 1.6;
  }

  .single-amp-course-laws-content table,
  .single-amp-course-laws-content th,
  .single-amp-course-laws-content td {
    font-size: 14px;
  }
}

	  
.single-amp-course-carousel {
  padding: 40px 0;
  text-align: center;
}

.single-amp-course-carousel-title {
  font-family: 'Open Sans', sans-serif;
  font-weight: 600;
  font-size: 32px;
  text-align: left;
  margin: 0 auto 24px auto;
  max-width: 90%;
}

.single-amp-course-carousel-slider {
  width: 90%;
  max-width: 1100px;
  margin: 0 auto;
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 2px 15px rgba(0, 0, 0, 0.25);
}

.single-amp-course-carousel-slide amp-img {
  object-fit: cover;
  border-radius: 12px;
  transition: transform 0.3s ease;
}

.single-amp-course-carousel-slide amp-img:hover {
  transform: scale(1.03);
}

/* ✅ Tablet view (≤ 992px) */
@media (max-width: 992px) {
  .single-amp-course-carousel-title {
    font-size: 28px;
  }
}

/* ✅ Mobile view (≤ 600px) */
@media (max-width: 600px) {
  .single-amp-course-carousel {
    padding: 24px 0;
  }
  .single-amp-course-carousel-title {
    font-size: 22px;
    text-align: center;
    margin-bottom: 16px;
  }
}

/* ====== Dynamic Custom Section ====== */
.single-amp-course-dynamic-section {
  background: #ffffff;
  border-radius: 12px;
  padding: 40px;
  margin: 0;
}

.single-amp-course-dynamic-section-title {
  font-size: 32px;
  color: #1a1a1a;
  text-align: center;
  font-weight: 700;
}

.single-amp-course-dynamic-section-content {
  display: flex;
  flex-direction: column;
}

.single-amp-course-dynamic-subsection {
  padding: 0px;
}

.single-amp-course-dynamic-subsection-title {
  font-size: 24px;
  margin-bottom: 12px;
  font-weight: 600;
}

.single-amp-course-dynamic-subsection-content {
  color: #1a1a1a;
}

/* ✅ Responsive adjustments */
@media (max-width: 1024px) {
  .single-amp-course-dynamic-section {
    padding: 30px;
  }
  .single-amp-course-dynamic-section-title {
    font-size: 28px;
  }
}

@media (max-width: 768px) {
  .single-amp-course-dynamic-section {
    padding: 40px 24px;
  }
  .single-amp-course-dynamic-section-title {
    font-size: 26px;
  }
  .single-amp-course-dynamic-subsection-title {
    font-size: 20px;
  }
}

@media (max-width: 480px) {
  .single-amp-course-dynamic-section {
    padding: 40px 20px;
  }
  .single-amp-course-dynamic-section-title {
    font-size: 24px;
    margin-bottom: 12px;
  }
  .single-amp-course-dynamic-subsection {
    padding: 0px;
  }
}
	  
/* ====== Target Audience Section ====== */
.single-amp-course-target-audience {
  padding: 60px 50px;
  margin: 0px;
  transition: all 0.3s ease-in-out;
}

.single-amp-course-target-audience-title {
  font-family: 'Open Sans', sans-serif;
  font-size: 34px;
  font-weight: 700;
  text-align: center;
  margin-bottom: 28px;
  line-height: 1.3;
}

.single-amp-course-target-audience-description {
  text-align: center;
  font-family: 'Open Sans', sans-serif;
  color: #ffffff;
  max-width: 800px;
  margin: 0;
}
.single-amp-course-target-audience-description p {
  color: #ffffff !important;
}

.single-amp-course-target-audience-content {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 32px;
}

.single-amp-course-target-audience-item {
  background: transparent;
  border-radius: 10px;
  padding: 24px;
  font-family: 'Open Sans', sans-serif;
  color: #ffffff;
}

.single-amp-course-target-audience-item p {
  color: #ffffff !important;
}

.single-amp-course-target-audience-item ul {
  margin: 0px;
  list-style-type: disc;
}
.single-amp-course-target-audience-item ul li {
  color: #ffffff !important;
}

.single-amp-course-target-audience-item img {
  max-width: 100%;
  height: auto;
  border-radius: 8px;
  margin: 15px 0;
}

/* ✅ Tablet View */
@media (max-width: 1024px) {
  .single-amp-course-target-audience {
    padding: 40px;
  }
  .single-amp-course-target-audience-title {
    font-size: 30px;
  }
}

/* ✅ Mobile View */
@media (max-width: 768px) {
  .single-amp-course-target-audience {
    padding: 30px 20px;
  }
  .single-amp-course-target-audience-title {
    font-size: 26px;
  }
  .single-amp-course-target-audience-content {
    grid-template-columns: 1fr;
    gap:0px;
  }
  .single-amp-course-target-audience-item {
    padding: 20px;
  }
	.single-amp-course-target-audience-item ul {
        list-style-type: disc;
		padding:0px 0px 0px 20px;
    }

}

/* ✅ Small Mobile View */
@media (max-width: 480px) {
  .single-amp-course-target-audience {
    padding: 24px 15px;
  }
  .single-amp-course-target-audience-title {
    font-size: 24px;
    margin-bottom: 24px;
  }
}

/* ============================================================
   SINGLE AMP WHAT IF COMPLY SECTION
   ============================================================ */
.single-amp-what-if-comply-section {
  background: #ffffff;
  padding: 60px 20px;
  text-align: center;
  border-top: 1px solid #eee;
}

.single-amp-what-if-comply-container {
  max-width: 1000px;
  margin: 0 auto;
}

/* ----- Title and Description ----- */
.single-amp-what-if-comply-title {
  font-size: 28px;
  font-weight: 700;
  color: #1a1a1a;
  margin-bottom: 15px;
  line-height: 1.3;
}

.single-amp-what-if-comply-description {
  margin-bottom: 20px;
}
.single-amp-what-if-comply-description p {
  font-size: 18px !important;
}

/* ----- Main Content Area ----- */
.single-amp-what-if-comply-content {
  text-align: left; 
  padding: 0px;
}

.single-amp-what-if-comply-content h3,
.single-amp-what-if-comply-content h4,
.single-amp-what-if-comply-content h5 {
  color: #444444;
  font-weight: 600;
  margin-top: 25px;
  margin-bottom: 10px;
  line-height: 1.4;
}

.single-amp-what-if-comply-content ul,
.single-amp-what-if-comply-content ol {
  padding-left: 30px;
  text-align: left;
  list-style-position: outside;
}

.single-amp-what-if-comply-content ul li,
.single-amp-what-if-comply-content ol li,
.single-amp-what-if-comply-description ul li,
.single-amp-what-if-comply-description ol li {
  text-align: left;
}

.single-amp-what-if-comply-description ul,
.single-amp-what-if-comply-description ol {
  padding-left: 30px;
  text-align: left;
  list-style-position: outside;
}

.single-amp-what-if-comply-content a {
  color: #3366cc;
  text-decoration: underline;
}

.single-amp-what-if-comply-content a:hover {
  text-decoration: none;
}

.single-amp-what-if-comply-content blockquote {
  border-left: 4px solid #3366cc;
  padding-left: 15px;
  margin: 20px 0;
  font-style: italic;
  color: #555;
  background: #f5f7fa;
  border-radius: 5px;
}

/* ----- Tables ----- */
.single-amp-what-if-comply-content table {
  width: 100%;
  border-collapse: collapse;
  margin-bottom: 20px;
  font-size: 15px;
}

.single-amp-what-if-comply-content th,
.single-amp-what-if-comply-content td {
  border: 1px solid #ddd;
  padding: 10px;
  text-align: left;
}

.single-amp-what-if-comply-content th {
  background-color: #f2f2f2;
  font-weight: bold;
}

/* ----- Images ----- */
.single-amp-what-if-comply-content img {
  max-width: 100%;
  height: auto;
  border-radius: 5px;
  margin: 15px 0;
}

/* ============================================================
   RESPONSIVE STYLES
   ============================================================ */

/* ----- Tablet (≥768px) ----- */
@media (min-width: 768px) {
  .single-amp-what-if-comply-section {
    padding: 20px;
  }
  .single-amp-what-if-comply-title {
	 font-family: "Open Sans", sans-serif;
    font-weight: 600;
    font-size: 28px;
    line-height: 1.3;
    text-align: center;
    margin-bottom: 30px;
  }
  .single-amp-what-if-comply-description {
    font-size: 18px!important;
	  font-weight:500!important;
  }
  .single-amp-what-if-comply-content {
    padding: 0px;
  }
}

/* ----- Mobile (≤767px) ----- */
@media (max-width: 767px) {
  .single-amp-what-if-comply-section {
    padding: 40px 16px;
  }
  .single-amp-what-if-comply-title {
    font-size: 22px;
  }
  .single-amp-what-if-comply-content {
    padding: 0px;
  }
  .single-amp-what-if-comply-content table {
    font-size: 14px;
  }
}

/* ============================================================
   SINGLE AMP COURSE OUTLINE SECTION
   ============================================================ */
.single-amp-course-outline-section {
  background: #ffffff;
  padding:20px;
  text-align: center;
}

.single-amp-course-outline-container {
  max-width: 1200px;
  margin: 0 auto;
}

/* ===== Title ===== */
.single-amp-course-outline-title {
  font-size: 32px;
  font-weight: 700;
  margin-bottom: 40px;
  color: #1a1a1a;
  line-height: 1.3;
}

/* ===== Grid Layout ===== */
.single-amp-course-outline-grid {
  display: grid;
  grid-template-columns: repeat(1, 1fr);
  gap: 24px;
}

.single-amp-course-outline-item {
  padding: 25px;
  text-align: left;
}


/* ===== Item Title ===== */
.single-amp-course-outline-item-title {
  font-size: 20px;
  font-weight: 600;
  margin-bottom: 12px;
  line-height: 1.4;
}

/* ===== Item Content ===== */
.single-amp-course-outline-item-content {
  line-height: 1.7;
}

.single-amp-course-outline-item-content ul,
.single-amp-course-outline-item-content ol {
  padding-left: 20px;
}

.single-amp-course-outline-item-content a {
  color: #3366cc;
  text-decoration: underline;
}

.single-amp-course-outline-item-content a:hover {
  text-decoration: none;
}

/* ============================================================
   RESPONSIVE STYLES
   ============================================================ */

/* ✅ Tablet (between 601px–991px): 2 per row */
@media (max-width: 991px) {
  .single-amp-course-outline-grid {
    grid-template-columns: 1fr;
    gap: 0px;
  }

  .single-amp-course-outline-title {
    font-size: 28px;
    margin-bottom: 30px;
  }

  .single-amp-course-outline-item {
    padding: 0px;
  }

  .single-amp-course-outline-item-title {
    font-size: 18px;
  }
}

/* ✅ Mobile (≤600px): 1 per row */
@media (max-width: 600px) {
  .single-amp-course-outline-grid {
    grid-template-columns: 1fr;
    gap: 0px;
  }

  .single-amp-course-outline-title {
    font-size: 24px;
    margin-bottom: 24px;
  }

  .single-amp-course-outline-item {
    padding: 0px!important;
  }

  .single-amp-course-outline-item-title {
    font-size: 17px;
  }

}

	  
/* ✅ AMP FAQ Section Styling */
.single-amp-faq-section {
  font-family: "Open Sans", sans-serif;
  margin: 0px auto;
  padding: 0 20px;
  box-sizing: border-box;
}

.single-amp-faq-title {
  text-align: center;
  font-size: 28px;
  font-weight: 700;
  margin-bottom: 30px;
  color: #1a1a1a;
}

.single-amp-faq-container {
  max-width: 1290px;
  margin: 0 auto;
}

.single-amp-faq-item {
  background: #fff;
  border-radius: 12px;
  margin-bottom: 12px;
  overflow: hidden;
  transition: box-shadow 0.3s ease;
  border: none;
  box-shadow: none;
}

.single-amp-faq-item[expanded] {
  box-shadow: 0 4px 12px rgba(0,0,0,0.08);
}

.single-amp-faq-question {
  background: #fff !important;
  color: #1a1a1a !important;
  font-weight: 600;
  font-size: 18px;
  padding: 18px 24px;
  margin: 0;
  cursor: pointer;
  display: flex;
  justify-content: space-between;
  align-items: center;
  border: none;
  position: relative;
  min-height: 60px;
}

.single-amp-faq-question:hover {
  background: #fafafa;
}

.single-amp-faq-item[expanded] .single-amp-faq-question {
  background: #f5f8ff;
  color: #16356b !important;
}

.single-amp-faq-question-text {
  flex: 1;
  padding-right: 40px;
}

/* ✅ Perfectly aligned + / - toggle on the right */
.single-amp-faq-toggle {
  position: absolute;
  right: 24px;
  top: 50%;
  transform: translateY(-50%);
  width: 28px;
  height: 28px;
  border-radius: 8px;
  background: #123456;
  display: flex;
  justify-content: center;
  align-items: center;
  color: #fff;
}

.single-amp-faq-toggle::before,
.single-amp-faq-toggle::after {
  content: '';
  position: absolute;
  background: #fff;
  transition: transform 0.3s ease;
}

.single-amp-faq-toggle::before {
  width: 12px;
  height: 2px;
}

.single-amp-faq-toggle::after {
  width: 2px;
  height: 12px;
}

.single-amp-faq-item[expanded] .single-amp-faq-toggle::after {
  transform: rotate(90deg);
}

.single-amp-faq-answer {
  padding: 16px 24px 20px 24px;
  background: #fff;
  color: #1a1a1a;
  font-size: 16px;
  line-height: 1.65;
}

.single-amp-faq-answer p,
.single-amp-faq-answer ul,
.single-amp-faq-answer li {
  margin: 8px 0;
}

/* ✅ Tablet View */
@media (max-width: 1024px) {
  .single-amp-faq-section {
    padding: 0 20px;
  }
  .single-amp-faq-title {
    font-size: 26px;
  }
  .single-amp-faq-question {
    font-size: 17px;
  }
}

/* ✅ Mobile View */
@media (max-width: 600px) {
  .single-amp-faq-section {
    padding: 0 20px;
  }
  .single-amp-faq-title {
    font-size: 24px;
  }
  .single-amp-faq-question {
    font-size: 16px;
	padding: 12px 32px 16px 18px !important;
  }
  .single-amp-faq-toggle {
    right: 18px;
    width: 20px;
    height: 20px;
  }
  .single-amp-faq-answer {
    padding: 16px 18px;
  }
}

/* ============================================
   RELATED COURSES SECTION
   ============================================ */
.amp-rc-section {
  padding: 60px 30px;
  background: #f5f7fa;
}
.amp-rc-container {
  max-width: 1290px;
  margin: 0 auto;
}
.amp-rc-title {
  font-size: 32px;
  font-weight: 700;
  color: #1a1a1a;
  margin: 0 0 30px 0;
  text-align: left;
}
.amp-rc-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 25px;
}
.amp-rc-card {
  background: #fff;
  border-radius: 10px;
  overflow: hidden;
  box-shadow: 0 3px 15px rgba(0,0,0,0.08);
  display: flex;
  flex-direction: column;
}
.amp-rc-thumbnail {
  position: relative;
  height: 185px;
  overflow: hidden;
  background: #f0f0f0;
  width: 100%;
}
.amp-rc-thumbnail a {
  position: absolute;
  top: 0; left: 0; right: 0; bottom: 0;
}
.amp-rc-thumbnail amp-img {
  object-fit: contain;
}
.amp-rc-content {
  padding: 15px 20px 20px;
  display: flex;
  flex-direction: column;
  flex: 1;
}
.amp-rc-card-title {
  font-size: 1em;
  font-weight: 600;
  margin: 0 0 10px 0;
  line-height: 1.4;
  color: #333;
}
.amp-rc-card-title a {
  color: #333;
  text-decoration: none;
}
.amp-rc-excerpt {
  font-size: 0.9em;
  color: #666;
  line-height: 1.6;
  margin: 0 0 6px 0;
  overflow: hidden;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  height: 2.88em;
}
.amp-rc-read-more {
  color: #1472ba;
  font-size: 0.9em;
  font-weight: 600;
  text-decoration: underline;
  text-underline-offset: 2px;
  margin-bottom: 10px;
  display: inline-block;
}
.amp-rc-meta {
  padding: 10px 0;
  border-top: 1px solid #eee;
  margin-bottom: 15px;
  font-size: 1em;
  color: #666;
}
.amp-rc-btn {
  display: block;
  text-align: center;
  padding: 12px 20px;
  background: #0073aa;
  color: #fff;
  text-decoration: none;
  border-radius: 6px;
  font-weight: 600;
  font-size: 0.95em;
  margin-top: auto;
  box-sizing: border-box;
}

/* Tablet (769px – 1024px): 3 cards */
@media (max-width: 1024px) {
  .amp-rc-grid { grid-template-columns: repeat(3, 1fr); }
  .amp-rc-title { font-size: 28px; }
}
/* Small tablet / large mobile (481px – 768px): 2 cards */
@media (max-width: 768px) {
  .amp-rc-section { padding: 40px 20px; }
  .amp-rc-grid { grid-template-columns: repeat(2, 1fr); gap: 16px; }
  .amp-rc-title { font-size: 24px; }
}
/* Mobile (≤ 480px): 1 card */
@media (max-width: 480px) {
  .amp-rc-grid { grid-template-columns: 1fr; }
  .amp-rc-title { font-size: 22px; }
  .amp-rc-thumbnail { height: 200px; }
}

/* Single-course read more/less button */
.single-amp-desc-toggle-btn {
  background: none;
  border: none;
  color: #ffffff;
  cursor: pointer;
  font: inherit;
  padding: 0;
  margin-left: 8px;
  text-decoration: underline;
}
.single-amp-desc-toggle-btn[hidden],
span[hidden] {
  display: none !important;
}

/* ===== AMP Form UI (SCF) ===== */
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
}
.scf-field label {
  font-weight: 600;
  color: #0f172a;
  font-size: 0.95rem;
  display: block;
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
  margin-top: 0;
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
#scf-organization,
#scf-email,
#scf-course-interest,
#scf-phone-country-code,
#scf-phone-number {
  margin-bottom: 0.75rem;
}
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
.scf-submit:hover { background: #1d4ed8; }
.scf-submit:active { transform: scale(0.98); }
.scf-error-message {
  color: #dc2626;
  font-size: 14px;
  font-weight: normal;
  margin-top: 0.5rem;
  display: block;
}
@media (max-width: 768px) {
  .scf-phone-inline { flex-direction: column; align-items: stretch; }
  .scf-phone-inline #scf-phone-country-code,
  .scf-phone-inline #scf-phone-number { width: 100%; min-width: 0; }
}

/* SCF lightbox (success/error popup) */
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

/* Course contact section */
.course-contact-us-section{
  margin: 0 auto 60px;
  padding: 0;
  box-sizing: border-box;
  background: #ffffff;
}
.course-contact-us-inner{
  width: 100%;
  max-width: 1290px;
  margin: 0 auto;
  background: #ffffff;
  border-radius: 0;
  padding: 36px 80px;
  display: grid;
  grid-template-columns: 1fr 1fr;
  grid-template-rows: auto 1fr;
  gap: 28px;
  align-items: center;
  box-sizing: border-box;
}
.course-contact-us-title{
  margin: 0;
  font-family: "Open Sans", sans-serif;
  font-size: 32px !important;
  font-weight: 600 !important;
  color: #1a1a1a;
  line-height: 1.25;
  text-align: center;
  grid-column: 1 / -1;
}
.course-contact-us-title span{ color: #1472ba; }
.course-contact-us-shortcode{
  font-family: "Open Sans", sans-serif;
  background: transparent;
  border-radius: 12px;
  padding: 0px;
  box-sizing: border-box;
}
@media (max-width: 1024px){
  .course-contact-us-inner{ grid-template-columns: 1fr; padding: 24px 20px; }
  .course-contact-us-left{ display: none; }
}
</style>
</head>

<body>
    <?php include(plugin_dir_path(__FILE__) . 'menu.php'); ?>

    <!-- ✅ Banner Section -->
<section class="single-amp-course-banner-section">
    <div class="single-amp-course-banner-container">

        <!-- ✅ Left Column -->
        <div class="single-amp-course-banner-left">
            <h1 class="single-amp-course-banner-course-title"><?php echo esc_html($course_title ?: get_the_title()); ?></h1>
            <?php
                // Process course description with wpautop for paragraphs
                if (!empty($course_desc)) {
                  $course_desc = wpautop($course_desc);
                  $course_desc = preg_replace('/<p>\s*<\/p>/i', '', $course_desc);
                }
                
                // How many characters to show before "Read more"
                $desc_limit = 320;
                $desc_text = wp_strip_all_tags($course_desc); // Strip tags for character counting

                if (mb_strlen($desc_text) > $desc_limit):
                    $desc_excerpt = mb_substr($desc_text, 0, $desc_limit);
                    
                    // Get full HTML version for display
                    $desc_full_html = wp_kses_post($course_desc);
            ?>
                <amp-state id="descToggle">
                  <script type="application/json">
                    {
                      "showFull": false
                    }
                  </script>
                </amp-state>
                <div class="single-amp-course-banner-course-description">
                    <div [hidden]="descToggle.showFull"><?php echo esc_html($desc_excerpt); ?>...</div>
                    <div hidden [hidden]="!descToggle.showFull"><?php echo wp_kses_post($desc_full_html); ?></div>
                    <button on="tap:AMP.setState({descToggle: {showFull: true}})" 
                        class="single-amp-desc-toggle-btn" 
                        [hidden]="descToggle.showFull">Read more</button>
                    <button on="tap:AMP.setState({descToggle: {showFull: false}})" 
                        class="single-amp-desc-toggle-btn" 
                        hidden
                        [hidden]="!descToggle.showFull">Read less</button>
                </div>
                <!-- AMP state handles read more/less; no extra styles/scripts -->
            <?php else: ?>
                <div class="single-amp-course-banner-course-description">
                  <?php 
                  if (!empty($course_desc)) {
                    echo wp_kses_post($course_desc);
                  } else {
                    echo esc_html($desc_text);
                  }
                  ?>
                </div>
            <?php endif; ?>

            <?php if ($individual_has_button || $corporate_has_button): ?>
                <div class="single-amp-banner-cta-row">
                    <?php if ($individual_has_button): ?>
                        <div class="single-amp-banner-cta-box">
                            <h3 class="single-amp-banner-cta-title"><?php echo esc_html(!empty($individual_title) ? $individual_title : 'For Individual'); ?></h3>
                            <a href="<?php echo esc_url($individual_btn_url_display); ?>" class="single-amp-course-banner-btn single-amp-course-banner-individual-btn">
                                <?php echo esc_html($individual_btn_text); ?>
                            </a>
                        </div>
                    <?php endif; ?>

                    <?php if ($corporate_has_button): ?>
                        <div class="single-amp-banner-cta-box">
                            <h3 class="single-amp-banner-cta-title"><?php echo esc_html(!empty($corporate_title) ? $corporate_title : 'For Corporate'); ?></h3>
                            <a href="<?php echo esc_url($corporate_btn_url); ?>" class="single-amp-course-banner-btn single-amp-course-banner-corporate-btn">
                                <?php echo esc_html($corporate_btn_text); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

        </div>

        <!-- ✅ Right Column (Media) -->
        <div class="single-amp-course-banner-right">
            <?php if (!empty($media_type)): ?>
                
                <?php if ($media_type == 'youtube' && !empty($media_id)): ?>
                    <div class="single-amp-course-banner-video">
                        <amp-youtube
                            data-videoid="<?php echo esc_attr($media_id); ?>"
                            layout="responsive"
                            width="16"
                            height="9"
                            controls
                        ></amp-youtube>
                    </div>
                
                <?php elseif ($media_type == 'vimeo' && !empty($media_id)): ?>
                    <div class="single-amp-course-banner-video">
                        <amp-vimeo
                            data-videoid="<?php echo esc_attr($media_id); ?>"
                            layout="responsive"
                            width="16"
                            height="9"
                            autoplay="false"
                        ></amp-vimeo>
                    </div>
                
                <?php elseif ($media_type == 'video'): ?>
                    <div class="single-amp-course-banner-video">
                        <amp-video
                            src="<?php echo esc_url($media_url); ?>"
                            width="16"
                            height="9"
                            layout="responsive"
                            controls
                            autoplay="false"
                        >
                            <div fallback>
                                <p>Your browser doesn't support HTML5 video.</p>
                            </div>
                        </amp-video>
                    </div>
                
                <?php elseif ($media_type == 'image'): ?>
                    <div class="single-amp-course-banner-image">
                        <amp-img
                            src="<?php echo esc_url($media_url); ?>"
                            alt="Course Media"
                            width="800"
                            height="450"
                            layout="responsive"
                        ></amp-img>
                    </div>
                
                <?php endif; ?>
                
            <?php endif; ?>
        </div>

    </div>
</section>

<section class="single-amp-post-hero-section">
    <div class="single-amp-course-meta-strip">
        <div class="single-amp-course-meta-item">
            <p class="single-amp-course-meta-label">Course Duration</p>
            <p class="single-amp-course-meta-value"><?php echo esc_html($course_duration_display); ?></p>
        </div>
        <div class="single-amp-course-meta-item">
            <p class="single-amp-course-meta-label">Course Price</p>
            <p class="single-amp-course-meta-value"><?php echo esc_html($course_price_display); ?></p>
        </div>
        <div class="single-amp-course-meta-item">
            <p class="single-amp-course-meta-label">Course Level</p>
            <p class="single-amp-course-meta-value"><?php echo esc_html($course_level_display); ?></p>
        </div>
        <div class="single-amp-course-meta-item">
            <p class="single-amp-course-meta-label">Category</p>
            <p class="single-amp-course-meta-value"><?php echo esc_html($course_category_display); ?></p>
        </div>
    </div>
</section>

<!-- ✅ Objectives Section -->
<section class="single-amp-course-objectives-section">
  <div class="single-amp-course-objectives-container">

    <div class="single-amp-course-objectives-left">
      <div class="single-amp-course-objectives-contentbox">

        <h2 class="single-amp-course-objectives-title">
          <?php echo esc_html(get_post_meta($course_id, 'objectives_section_title', true)); ?>
        </h2>

        <div class="single-amp-course-objectives-description">
          <?php 
          $objectives_desc = get_post_meta($course_id, 'objectives_section_description', true);
          if (!empty($objectives_desc)) {
            $objectives_desc = wpautop($objectives_desc);
            $objectives_desc = preg_replace('/<p>\s*<\/p>/i', '', $objectives_desc);
          }
          echo wp_kses_post($objectives_desc); 
          ?>
        </div>

        <div class="single-amp-course-objectives-details">
          <?php 
          $objectives_content = get_post_meta($course_id, 'objectives_section_content', true);
          // Convert line breaks to paragraphs
          if (!empty($objectives_content)) {
            $objectives_content = wpautop($objectives_content);
            $objectives_content = preg_replace('/<p>\s*<\/p>/i', '', $objectives_content);
          }
          echo wp_kses(
            $objectives_content,
            array(
              'p' => array(),
              'br' => array(),
              'strong' => array(),
              'em' => array(),
              'b' => array(),
              'i' => array(),
              'ul' => array(),
              'ol' => array(),
              'li' => array(),
              'a' => array('href' => array(), 'title' => array(), 'target' => array()),
            )
          );
          ?>
        </div>

      </div>
    </div>

  </div>
</section>
	
<section class="single-amp-course-why-this-course">
  <?php 
    $extra_title = get_post_meta($course_id, 'extra_info_title', true);
    $extra_title_color = get_post_meta($course_id, 'extra_info_title_color', true);
    $grid_title_color = get_post_meta($course_id, 'extra_info_grid_title_color', true);
    $grid_items = get_post_meta($course_id, 'extra_info_grid', true);
  ?>

  <?php if ($extra_title): ?>
    <h2 class="single-amp-course-why-this-course-title" style="color: <?php echo esc_attr($extra_title_color ?: '#000'); ?>;">
      <?php echo esc_html($extra_title); ?>
    </h2>
  <?php endif; ?>

  <?php if (!empty($grid_items) && is_array($grid_items)): ?>
    <div class="single-amp-course-why-this-course-grid">
      <?php foreach ($grid_items as $item): ?>
        <?php 
          $item_title = trim($item['title']);
          $item_desc  = trim($item['desc']);
          // Show item if title exists (even if description is empty)
          if ($item_title === '' && $item_desc === '') continue; 
        ?>
        <div class="single-amp-course-why-this-course-item">
          <?php if ($item_title): ?>
            <h4 class="single-amp-course-why-this-course-item-title" style="color: <?php echo esc_attr($grid_title_color ?: '#000'); ?>;">
              <?php echo esc_html($item_title); ?>
            </h4>
          <?php endif; ?>
          <?php if ($item_desc): ?>
            <div class="single-amp-course-why-this-course-item-desc">
              <?php 
              if (!empty($item_desc)) {
                $item_desc = wpautop($item_desc);
                $item_desc = preg_replace('/<p>\s*<\/p>/i', '', $item_desc);
              }
              echo wp_kses_post($item_desc); 
              ?>
            </div>
          <?php endif; ?>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
</section>

<!-- ====== Laws & Regulations Section ====== -->
<section class="single-amp-course-laws">
  <?php 
    $laws_title = get_post_meta($course_id, 'laws_section_title', true);
    $laws_description = get_post_meta($course_id, 'laws_section_description', true);
    $laws_content = get_post_meta($course_id, 'laws_section_content', true);
  ?>

  <?php if (!empty($laws_title)) : ?>
    <h2 class="single-amp-course-laws-title">
      <?php echo esc_html($laws_title); ?>
    </h2>
  <?php endif; ?>

  <?php if (!empty($laws_description)) : ?>
    <div class="single-amp-course-laws-description">
      <?php 
      if (!empty($laws_description)) {
        $laws_description = wpautop($laws_description);
        $laws_description = preg_replace('/<p>\s*<\/p>/i', '', $laws_description);
      }
      echo wp_kses_post($laws_description); 
      ?>
    </div>
  <?php endif; ?>

  <?php $laws_has_table = (stripos($laws_content, '<table') !== false); ?>
  <div class="single-amp-course-laws-content<?php echo $laws_has_table ? ' has-table' : ''; ?>">
    <?php 
    // Convert line breaks to paragraphs
    if (!empty($laws_content)) {
      $laws_content = wpautop($laws_content);
      $laws_content = preg_replace('/<p>\s*<\/p>/i', '', $laws_content);
    }
    echo wp_kses(
        $laws_content,
        array(
            'p' => array('style' => array()),
            'br' => array(),
            'strong' => array(),
            'em' => array(),
            'b' => array(),
            'i' => array(),
            'u' => array(),
            'ul' => array('style' => array()),
            'ol' => array('style' => array()),
            'li' => array('style' => array()),
            'table' => array('style' => array(), 'border' => array(), 'cellpadding' => array(), 'cellspacing' => array()),
            'thead' => array(),
            'tbody' => array(),
            'tr' => array('style' => array()),
            'th' => array('style' => array()),
            'td' => array('style' => array()),
            'a' => array('href' => array(), 'target' => array(), 'style' => array()),
            'div' => array('style' => array(), 'class' => array()),
            'span' => array('style' => array()),
        )
    );
    ?>
  </div>
</section>

	
	<?php 
$carousel_title = get_post_meta($course_id, 'carousel_section_title', true);
$carousel_title_color = get_post_meta($course_id, 'carousel_section_title_color', true);
$carousel_bg = get_post_meta($course_id, 'carousel_section_bg', true);
$carousel_images = get_post_meta($course_id, 'carousel_section_images', true);
?>

<?php if (!empty($carousel_images) && is_array($carousel_images)) : ?>
<section class="single-amp-course-carousel" style="background: <?php echo esc_attr($carousel_bg ?: 'linear-gradient(90deg, #576094, #915EBD)'); ?>;">
  
  <?php if (!empty($carousel_title)) : ?>
    <h2 class="single-amp-course-carousel-title" style="color: <?php echo esc_attr($carousel_title_color ?: '#fff'); ?>;">
      <?php echo esc_html($carousel_title); ?>
    </h2>
  <?php endif; ?>

  <amp-carousel class="single-amp-course-carousel-slider" layout="responsive" width="800" height="450" type="slides" autoplay delay="4000" loop>
    <?php foreach ($carousel_images as $image_url) : ?>
      <?php if (!empty($image_url)) : ?>
        <div class="single-amp-course-carousel-slide">
          <amp-img src="<?php echo esc_url($image_url); ?>" alt="Course Slide" layout="responsive" width="800" height="450"></amp-img>
        </div>
      <?php endif; ?>
    <?php endforeach; ?>
  </amp-carousel>

</section>
<?php endif; ?>
	
<!-- ====== Dynamic Custom Section ====== -->
<section class="single-amp-course-dynamic-section">
  <?php 
    $main_title = get_post_meta(get_the_ID(), 'custom_section_main_title', true);
    $custom_sections = get_post_meta(get_the_ID(), 'custom_content_sections', true);
  ?>

  <?php if (!empty($main_title)) : ?>
    <h2 class="single-amp-course-dynamic-section-title">
      <?php echo esc_html($main_title); ?>
    </h2>
  <?php endif; ?>

  <?php if (is_array($custom_sections) && !empty($custom_sections)) : ?>
    <div class="single-amp-course-dynamic-section-content">
      <?php foreach ($custom_sections as $section) : ?>
        <?php if (!empty($section['title']) || !empty($section['content'])) : ?>
          <div class="single-amp-course-dynamic-subsection">
            <?php if (!empty($section['title'])) : ?>
              <h3 class="single-amp-course-dynamic-subsection-title" 
                  style="color:<?php echo esc_attr($section['title_color'] ?? '#000'); ?>;">
                <?php echo esc_html($section['title']); ?>
              </h3>
            <?php endif; ?>

            <?php if (!empty($section['content'])) : ?>
              <div class="single-amp-course-dynamic-subsection-content">
                <?php 
                  $section_content = $section['content'];
                  // Convert line breaks to paragraphs
                  if (!empty($section_content)) {
                    $section_content = wpautop($section_content);
                    $section_content = preg_replace('/<p>\s*<\/p>/i', '', $section_content);
                  }
                  echo wp_kses(
                    $section_content,
                    array(
                      'p' => array('style' => array()),
                      'br' => array(),
                      'strong' => array(),
                      'em' => array(),
                      'b' => array(),
                      'i' => array(),
                      'u' => array(),
                      'ul' => array('style' => array()),
                      'ol' => array('style' => array()),
                      'li' => array('style' => array()),
                      'a' => array('href' => array(), 'target' => array(), 'style' => array()),
                      'table' => array('style' => array(), 'border' => array(), 'cellpadding' => array(), 'cellspacing' => array()),
                      'thead' => array(),
                      'tbody' => array(),
                      'tr' => array('style' => array()),
                      'th' => array('style' => array()),
                      'td' => array('style' => array()),
                      'div' => array('style' => array(), 'class' => array()),
                      'span' => array('style' => array()),
                    )
                  );
                ?>
              </div>
            <?php endif; ?>
          </div>
        <?php endif; ?>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
</section>

<!-- ====== Target Audience Section ====== -->
<section class="single-amp-course-target-audience" 
  style="background: <?php echo esc_attr(get_post_meta(get_the_ID(), 'advanced_section_bg', true) ?: '#ffffff'); ?>;">

  <?php 
    $adv_title = get_post_meta(get_the_ID(), 'advanced_section_title', true);
    $adv_title_color = get_post_meta(get_the_ID(), 'advanced_section_title_color', true);
    $adv_desc = get_post_meta(get_the_ID(), 'advanced_section_description', true);
    $adv_html_1 = get_post_meta(get_the_ID(), 'advanced_section_html_1', true);
    $adv_html_2 = get_post_meta(get_the_ID(), 'advanced_section_html_2', true);
  ?>

  <?php if (!empty($adv_title)) : ?>
    <h2 class="single-amp-course-target-audience-title"
        style="color: <?php echo esc_attr($adv_title_color ?: '#000'); ?>;">
      <?php echo esc_html($adv_title); ?>
    </h2>
  <?php endif; ?>

  <?php if (!empty($adv_desc)) : ?>
    <div class="single-amp-course-target-audience-description">
      <?php 
      // Convert line breaks to paragraphs
      if (!empty($adv_desc)) {
        $adv_desc = wpautop($adv_desc);
        $adv_desc = preg_replace('/<p>\s*<\/p>/i', '', $adv_desc);
      }
      echo wp_kses(
        $adv_desc,
        [
          'p' => ['style' => []],
          'br' => [],
          'strong' => [],
          'em' => [],
          'b' => [],
          'i' => [],
          'u' => [],
          'ul' => ['style' => []],
          'ol' => ['style' => []],
          'li' => ['style' => []],
          'a' => ['href' => [], 'target' => [], 'style' => []],
          'span' => ['style' => []],
          'div' => ['style' => [], 'class' => []],
        ]
      ); 
      ?>
    </div>
  <?php endif; ?>

  <div class="single-amp-course-target-audience-content">
    <?php if (!empty($adv_html_1)) : ?>
      <div class="single-amp-course-target-audience-item">
        <?php 
        $adv_content_1 = $adv_html_1;
        if (!empty($adv_content_1)) {
          $adv_content_1 = wpautop($adv_content_1);
          $adv_content_1 = preg_replace('/<p>\s*<\/p>/i', '', $adv_content_1);
        }
        echo wp_kses_post($adv_content_1); 
        ?>
      </div>
    <?php endif; ?>

    <?php if (!empty($adv_html_2)) : ?>
      <div class="single-amp-course-target-audience-item">
        <?php 
        $adv_content_2 = $adv_html_2;
        if (!empty($adv_content_2)) {
          $adv_content_2 = wpautop($adv_content_2);
          $adv_content_2 = preg_replace('/<p>\s*<\/p>/i', '', $adv_content_2);
        }
        echo wp_kses_post($adv_content_2); 
        ?>
      </div>
    <?php endif; ?>
  </div>
</section>

	
	
<section class="single-amp-what-if-comply-section">
  <?php
    // ==============================
    // Fetch meta fields
    // ==============================
    $wi_title = get_post_meta(get_the_ID(), 'custom_output_title', true);
    $wi_desc  = get_post_meta(get_the_ID(), 'custom_output_description', true);
    $wi_html  = get_post_meta(get_the_ID(), 'custom_output_html', true);
  ?>

  <?php if ($wi_title || $wi_desc || $wi_html): ?>
  <div class="single-amp-what-if-comply-container">

    <?php if ($wi_title): ?>
      <h2 class="single-amp-what-if-comply-title">
        <?php echo esc_html($wi_title); ?>
      </h2>
    <?php endif; ?>

    <?php if ($wi_desc): ?>
      <div class="single-amp-what-if-comply-description">
        <?php 
        if (!empty($wi_desc)) {
          $wi_desc = wpautop($wi_desc);
          $wi_desc = preg_replace('/<p>\s*<\/p>/i', '', $wi_desc);
        }
        echo wp_kses_post($wi_desc); 
        ?>
      </div>
    <?php endif; ?>

    <?php if ($wi_html): ?>
      <div class="single-amp-what-if-comply-content">
        <?php 
        if (!empty($wi_html)) {
          $wi_html = wpautop($wi_html);
          $wi_html = preg_replace('/<p>\s*<\/p>/i', '', $wi_html);
        }
        echo do_shortcode(wp_kses_post($wi_html)); 
        ?>
      </div>
    <?php endif; ?>

  </div>
  <?php endif; ?>
</section>

<!-- ======= Course Outline Section (AMP Frontend Output) ======= -->
<section class="single-amp-course-outline-section">
  <?php 
    $codegrid_title = get_post_meta($course_id, 'codegrid_title', true);
    $codegrid_title_color = get_post_meta($course_id, 'codegrid_title_color', true);
    $codegrid_item_color = get_post_meta($course_id, 'codegrid_item_color', true);
    $codegrid_items = get_post_meta($course_id, 'codegrid_items', true);
  ?>

  <?php if (!empty($codegrid_items) && is_array($codegrid_items)) : ?>
    <div class="single-amp-course-outline-container">

      <?php if (!empty($codegrid_title)) : ?>
        <h2 class="single-amp-course-outline-title" 
            style="color: <?php echo esc_attr($codegrid_title_color ?: '#000'); ?>">
          <?php echo esc_html($codegrid_title); ?>
        </h2>
      <?php endif; ?>

      <div class="single-amp-course-outline-grid">
        <?php foreach ($codegrid_items as $item) : 
          $item_title = trim($item['title'] ?? '');
          $item_content = trim($item['content'] ?? '');
          // Show item if title exists (even if content is empty)
          if (empty($item_title) && empty($item_content)) continue;
        ?>
          <div class="single-amp-course-outline-item">
            <?php if (!empty($item_title)): ?>
              <h3 class="single-amp-course-outline-item-title"
                  style="color: <?php echo esc_attr($codegrid_item_color ?: '#000'); ?>">
                <?php echo esc_html($item_title); ?>
              </h3>
            <?php endif; ?>

            <?php if (!empty($item_content)): ?>
              <div class="single-amp-course-outline-item-content">
                <?php 
                if (!empty($item_content)) {
                  $item_content = wpautop($item_content);
                  $item_content = preg_replace('/<p>\s*<\/p>/i', '', $item_content);
                }
                echo do_shortcode(wp_kses_post($item_content)); 
                ?>
              </div>
            <?php endif; ?>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  <?php endif; ?>
</section>
<?php
$contact_shortcode = '[contact_form]';
?>

<section class="course-contact-us-section" aria-label="Contact us">
  <div class="course-contact-us-inner">
    <h2 class="course-contact-us-title">See how <span>Succeed</span> will work for your Organization</h2>

    <div class="course-contact-us-left" aria-hidden="true">
      <amp-img
        src="https://succeedlearn.com/wp-content/uploads/2025/08/your-Organization-2.svg"
        width="720"
        height="520"
        layout="responsive"
        alt="">
      </amp-img>
    </div>

    <div class="course-contact-us-right">
      <div class="course-contact-us-shortcode">
        <?php echo do_shortcode($contact_shortcode); ?>
      </div>
    </div>
  </div>
</section>

<!-- ✅ AMP FAQ Section -->
<section class="single-amp-faq-section">
  <?php
  // Fetch meta values inside section for structure
  $faq_main_title = get_post_meta(get_the_ID(), 'faq_main_title', true);
  $faq_items = get_post_meta(get_the_ID(), 'faq_items', true);
  ?>

  <?php if (!empty($faq_items)) : ?>
    <?php if (!empty($faq_main_title)) : ?>
      <h2 class="single-amp-faq-title"><?php echo esc_html($faq_main_title); ?></h2>
    <?php endif; ?>

    <amp-accordion class="single-amp-faq-container" expand-single-section>
      <?php foreach ($faq_items as $index => $faq) :
        $question = trim($faq['question'] ?? '');
        $answer = trim($faq['answer'] ?? '');
        if (empty($question) || empty($answer)) continue;
      ?>
        <section class="single-amp-faq-item" <?php echo $index === 0 ? 'expanded' : ''; ?>>
          <h4 class="single-amp-faq-question">
            <span class="single-amp-faq-question-text"><?php echo esc_html($question); ?></span>
            <span class="single-amp-faq-toggle"></span>
          </h4>
          <div class="single-amp-faq-answer">
            <?php echo wp_kses_post(wpautop($answer)); ?>
          </div>
        </section>
      <?php endforeach; ?>
    </amp-accordion>
  <?php endif; ?>
</section>

<!-- ✅ Related Courses Section (AMP) -->
<?php
$rc_course_id   = get_the_ID();
$rc_terms       = wp_get_post_terms( $rc_course_id, 'course_category', array( 'fields' => 'ids' ) );
$rc_cards_limit = 4;

if ( ! empty( $rc_terms ) && ! is_wp_error( $rc_terms ) ) :
    $rc_query = new WP_Query( array(
        'post_type'      => 'lp_course',
        'post_status'    => 'publish',
        'posts_per_page' => $rc_cards_limit,
        'post__not_in'   => array( $rc_course_id ),
        'tax_query'      => array(
            array(
                'taxonomy' => 'course_category',
                'field'    => 'term_id',
                'terms'    => $rc_terms,
                'operator' => 'IN',
            ),
        ),
        'orderby'        => 'date',
        'order'          => 'DESC',
    ) );

    if ( $rc_query->have_posts() ) :
?>
<section class="amp-rc-section">
  <div class="amp-rc-container">
    <h2 class="amp-rc-title">Related Courses</h2>
    <div class="amp-rc-grid">
      <?php while ( $rc_query->have_posts() ) : $rc_query->the_post();
        $rc_id          = get_the_ID();
        $rc_title       = get_post_meta( $rc_id, 'course_title', true ) ?: get_the_title();
        $rc_url         = get_permalink();
        $rc_thumb       = get_the_post_thumbnail_url( $rc_id, 'medium' );
        $rc_excerpt_raw = get_post_meta( $rc_id, 'course_description', true ) ?: get_the_excerpt();
        $rc_excerpt     = mb_strlen( wp_strip_all_tags( $rc_excerpt_raw ) ) > 80
                            ? mb_substr( wp_strip_all_tags( $rc_excerpt_raw ), 0, 80 ) . '…'
                            : wp_strip_all_tags( $rc_excerpt_raw );
        $rc_duration_l  = get_post_meta( $rc_id, 'duration_title', true ) ?: 'Total Duration';
        $rc_duration_v  = get_post_meta( $rc_id, 'duration_value', true );

        // Per-card thumbnail bg colour
        $rc_bg = get_post_meta( $rc_id, 'banner_gradient', true );
        if ( empty( $rc_bg ) ) $rc_bg = get_post_meta( $rc_id, 'banner_bg_hex', true );
        if ( empty( $rc_bg ) ) $rc_bg = get_post_meta( $rc_id, 'banner_bg_rgb', true );
      ?>
      <article class="amp-rc-card">
        <div class="amp-rc-thumbnail"<?php if ( ! empty( $rc_bg ) ) echo ' style="background:' . esc_attr( $rc_bg ) . ';"'; ?>>
          <a href="<?php echo esc_url( $rc_url ); ?>">
            <?php if ( $rc_thumb ) : ?>
              <amp-img src="<?php echo esc_url( $rc_thumb ); ?>"
                       alt="<?php echo esc_attr( $rc_title ); ?>"
                       width="600" height="280"
                       layout="fill">
              </amp-img>
            <?php endif; ?>
          </a>
        </div>

        <div class="amp-rc-content">
          <h3 class="amp-rc-card-title">
            <a href="<?php echo esc_url( $rc_url ); ?>"><?php echo esc_html( $rc_title ); ?></a>
          </h3>

          <?php if ( ! empty( $rc_excerpt ) ) : ?>
            <p class="amp-rc-excerpt"><?php echo esc_html( $rc_excerpt ); ?></p>
            <a href="<?php echo esc_url( $rc_url ); ?>" class="amp-rc-read-more">Read More</a>
          <?php endif; ?>

          <div class="amp-rc-meta">
            <span>
              <strong><?php echo esc_html( $rc_duration_l ); ?>: </strong>
              <?php echo $rc_duration_v ? esc_html( $rc_duration_v ) : '—'; ?>
            </span>
          </div>

          <a href="<?php echo esc_url( $rc_url ); ?>" class="amp-rc-btn">View Details</a>
        </div>
      </article>
      <?php endwhile; wp_reset_postdata(); ?>
    </div>
  </div>
</section>
<?php
    endif;
endif;
?>

    <?php include(plugin_dir_path(__FILE__) . 'footer.php'); ?>
</body>
</html>
