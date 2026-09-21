<?php
/**
 * Template Name: Single Newsletter Page (AMP)
 * AMP Template for Newsletter Posts
 */

// Get the post
if (have_posts()) {
    while (have_posts()) : the_post();

?>
<!doctype html>
<html amp lang="<?php echo esc_attr(get_bloginfo('language')); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
    <script async src="https://cdn.ampproject.org/v0.js"></script>
    <script async custom-element="amp-form" src="https://cdn.ampproject.org/v0/amp-form-0.1.js"></script>
    <script async custom-template="amp-mustache" src="https://cdn.ampproject.org/v0/amp-mustache-0.2.js"></script>
    <script async custom-element="amp-lightbox" src="https://cdn.ampproject.org/v0/amp-lightbox-0.1.js"></script>
    <script async custom-element="amp-bind" src="https://cdn.ampproject.org/v0/amp-bind-0.1.js"></script>
    <script async custom-element="amp-sidebar" src="https://cdn.ampproject.org/v0/amp-sidebar-0.1.js"></script>
    <script async custom-element="amp-accordion" src="https://cdn.ampproject.org/v0/amp-accordion-0.1.js"></script>
    <script async custom-element="amp-iframe" src="https://cdn.ampproject.org/v0/amp-iframe-0.1.js"></script>
    
    <!-- AMP Boilerplate -->
    <style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
    
    <title><?php echo esc_html(wp_get_document_title()); ?></title>
    <link rel="canonical" href="<?php echo esc_url(get_permalink()); ?>">
    
    <!-- AMP Custom Styles -->
    <style amp-custom>
        html {
            scroll-behavior: smooth;
        }
        
        /* Subscribe button: when scrolling to form, show it with space for fixed header (stops at form, not past it) */
        #newsletter-subscription-form {
            scroll-margin-top: 100px;
            scroll-margin-bottom: 0;
        }
        
        body {
            font-family: 'Inter', 'Nunito Sans', Arial, sans-serif;
            margin: 0;
            padding: 0;
            padding-top: 100px !important;
            background: #fff;
            color: #0f172a;
            line-height: 1.6;
        }

        .newsletter-single-container {
            max-width: none;
            margin: 0 auto;
            padding: 0 0 40px;
        }

        .newsletter-single-content,
        .newsletter-related,
        .newsletter-entry-footer {
            max-width: 1040px;
            margin-left: auto;
            margin-right: auto;
            box-sizing: border-box;
        }

        .newsletter-single-hero-copy {
            min-width: 0;
        }

        .newsletter-subscribe-btn {
            margin: 16px 0 0;
            display: inline-flex;
            align-items: center;
        }

        .newsletter-subscribe-btn a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            min-height: 44px;
            padding: 10px 20px;
            background: linear-gradient(135deg, #ea3e24 0%, #f68c1e 50%, #fdb813 100%);
            color: #fff;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 700;
            font-size: 14px;
            border: 0;
            box-shadow: 0 2px 8px rgba(234, 62, 36, 0.35);
            white-space: nowrap;
        }

        .newsletter-single-hero {
            background: transparent;
            border: 0;
            border-bottom: 1px solid #e2e8f0;
            border-radius: 0;
            padding: 22px 20px 26px;
            margin: 0;
            box-shadow: none;
            box-sizing: border-box;
        }

        .newsletter-single-hero .ep-breadcrumbs {
            margin: 0 0 14px;
            padding: 0 0 12px;
            border-bottom: 1px solid #e8eef5;
            font-size: 0.8125rem;
            line-height: 1.5;
            word-break: break-word;
        }

        .newsletter-single-title {
            font-size: clamp(1.45rem, 1.05rem + 1.5vw, 2.05rem);
            font-weight: 800;
            color: #002a38;
            margin: 0 0 12px;
            line-height: 1.22;
            letter-spacing: -0.015em;
            text-align: left;
            max-width: 85%;
        }

        .newsletter-single-meta {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: flex-start;
            gap: 8px 14px;
            font-size: 14px;
            color: #64748b;
            margin: 0;
        }

        .newsletter-single-meta span {
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .newsletter-meta-sep {
            color: #cbd5e1;
            font-weight: 700;
            user-select: none;
        }

        .newsletter-read-time {
            font-size: 12px;
            color: #fff;
            background-color: #1472ba;
            padding: 5px 12px;
            border-radius: 999px;
            font-weight: 700;
            letter-spacing: 0.02em;
        }

        .newsletter-single-hero-actions {
            display: none;
        }
        
        .newsletter-single-content {
            margin: 0 auto 30px;
            padding: 16px 16px 24px;
            width: 100%;
            background: transparent;
            border: 0;
            border-radius: 0;
            box-shadow: none;
            line-height: 1.8;
            font-size: 16px;
            color: #334155;
        }
        
        .newsletter-single-content h2 {
            font-size: 1.25rem !important;
            font-weight: 600;
            color: #1472ba;
            margin-top: 28px;
            margin-bottom: 12px;
            line-height: 1.35;
        }
        
        .newsletter-single-content h3 {
            font-size: 1.125rem !important;
            font-weight: 600;
            color: #1472ba;
            margin-top: 22px;
            margin-bottom: 10px;
            line-height: 1.35;
        }
        
        .newsletter-single-content h4 {
            font-size: 1.0625rem !important;
            font-weight: 600;
            color: #333;
            margin-top: 18px;
            margin-bottom: 8px;
            line-height: 1.35;
        }

        .newsletter-single-content h5,
        .newsletter-single-content h6 {
            font-size: 1rem !important;
            font-weight: 600;
            color: #333;
            margin-top: 16px;
            margin-bottom: 8px;
            line-height: 1.35;
        }

        .newsletter-single-content h6 {
            font-size: 0.9375rem !important;
        }
        
        .newsletter-single-content p {
            margin-bottom: 15px;
        }
        
        .newsletter-single-content ul,
        .newsletter-single-content ol {
            margin-bottom: 20px;
            padding-left: 30px;
        }
        
        .newsletter-single-content ul {
            list-style-type: disc;
        }
        
        .newsletter-single-content ol {
            list-style-type: decimal;
        }
        
        .newsletter-single-content ol li::marker {
            color: #1472ba;
            font-weight: 600;
        }
        
        .newsletter-single-content li {
            margin-bottom: 8px;
        }
        
        .newsletter-single-content blockquote {
            border-left: 4px solid #1472ba;
            padding-left: 20px;
            margin: 25px 0;
            font-style: italic;
            color: #555;
        }
        
        .newsletter-single-content a,
        .newsletter-single-content a:link,
        .newsletter-single-content a:visited,
        .newsletter-single-content a:hover,
        .newsletter-single-content a:focus,
        .newsletter-single-content a:active,
        .newsletter-single-content ul a,
        .newsletter-single-content ol a,
        .newsletter-single-content li a,
        .newsletter-single-content h2 a,
        .newsletter-single-content h3 a,
        .newsletter-single-content h4 a {
            color: #1472ba;
            text-decoration: none;
            border-bottom: 0;
        }
        /* Hide AddToAny blocks that are injected inside the content */
        .newsletter-single-content .addtoany_content {
            display: none !important;
        }
        
        .newsletter-single-content amp-img {
            max-width: 100%;
            width: 100%;
            border-radius: 8px;
            margin: 25px 0;
            margin-left: 0;
            margin-right: 0;
        }
        
        /* Author / avatar and small images - keep them small, not full width */
        .newsletter-single-content amp-img.avatar,
        .newsletter-single-content .avatar amp-img,
        .newsletter-single-content amp-img[class*="avatar"],
        .newsletter-single-content amp-img.size-thumbnail {
            max-width: 120px !important;
            display: inline-block;
            vertical-align: middle;
        }
        
        /* Reduce one particular image: add class img-small or size-small in the editor */
        .newsletter-single-content amp-img.img-small,
        .newsletter-single-content amp-img.size-small {
            max-width: 50%;
            margin-left: auto;
            margin-right: auto;
            display: block;
        }
        .newsletter-single-content amp-img.img-medium {
            max-width: 70%;
            margin-left: auto;
            margin-right: auto;
            display: block;
        }
        /* Fixed small size: add class img-100 (100x100) or img-120 (120x120) in the editor */
        .newsletter-single-content amp-img.img-100 {
            max-width: 100px !important;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        .newsletter-single-content amp-img.img-120 {
            max-width: 120px !important;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        
        /* Keep aligned images flush — no side auto-margins that leave empty left/right gaps */
        .newsletter-single-content amp-img.align-left,
        .newsletter-single-content amp-img.img-align-left,
        .newsletter-single-content amp-img.alignleft,
        .newsletter-single-content amp-img.align-right,
        .newsletter-single-content amp-img.img-align-right,
        .newsletter-single-content amp-img.alignright,
        .newsletter-single-content amp-img.align-center,
        .newsletter-single-content amp-img.img-align-center,
        .newsletter-single-content amp-img.aligncenter {
            margin-left: 0;
            margin-right: 0;
            max-width: 100%;
            width: 100%;
            display: block;
            float: none;
        }
        
        /* PDF / Google Docs viewer embed - 16:9 aspect-ratio; use amp-iframe */
        .newsletter-single-content .ns-pdf-embed,
        .newsletter-single-content div[style*="padding-top: 56.25%"],
        .newsletter-single-content div[style*="padding-top:56.25%"] {
            position: relative;
            width: 100%;
            max-width: 100%;
            margin: 25px 0;
            overflow: hidden;
            border-radius: 8px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.08);
        }
        .newsletter-single-content .ns-pdf-embed amp-iframe,
        .newsletter-single-content div[style*="padding-top: 56.25%"] amp-iframe,
        .newsletter-single-content div[style*="padding-top:56.25%"] amp-iframe {
            position: absolute !important;
            top: 0 !important;
            left: 0 !important;
            width: 100% !important;
            height: 100% !important;
            border: 0;
            border-radius: 8px;
        }
        
        .newsletter-taxonomy {
            margin-top: 36px;
            padding-top: 22px;
            border-top: 2px solid #e0eaf4;
            font-size: 13.5px;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 8px;
            row-gap: 10px;
        }

        .newsletter-taxonomy-label {
            font-weight: 700;
            color: #002a38;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            margin-right: 4px;
            white-space: nowrap;
        }

        .newsletter-taxonomy-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
        }

        .newsletter-taxonomy strong {
            color: #333;
            font-weight: 600;
        }
        
        .newsletter-taxonomy a {
            display: inline-block;
            color: #1472ba;
            text-decoration: none;
            background: #eef5fc;
            border: 1px solid #c5dcf0;
            border-radius: 20px;
            padding: 3px 12px;
            font-size: 13px;
            font-weight: 500;
            line-height: 1.6;
            transition: background 0.15s, color 0.15s;
        }

        .newsletter-taxonomy a:hover {
            background: #1472ba;
            color: #fff;
            border-color: #1472ba;
        }
        
        .newsletter-entry-footer {
            margin-top: 40px;
            padding-top: 25px;
            border-top: 2px solid #e8e8e8;
        }
        
        .addtoany_share_save_container {
            margin-top: 10px;
            margin-bottom: 20px;
        }
        .addtoany_header {
            font-weight: 700;
            margin-bottom: 10px;
            font-size: 16px;
            color: #333;
        }
        /* Hide any auto-inserted AddToAny blocks from the plugin (keep our footer one) */
        .addtoany_content_top {
            display: none !important;
        }
        .a2a_kit {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            align-items: center;
        }
        .a2a_kit a {
            display: inline-block;
            width: 32px;
            height: 32px;
            border-radius: 6px;
            padding: 2px;
        }
        .a2a_kit amp-img {
            display: block;
            border-radius: 4px;
        }
        .a2a_button_facebook { background: #1877f2; }
        .a2a_button_linkedin { background: #0077b5; }
        .a2a_button_twitter { background: #1da1f2; }
        .a2a_button_whatsapp { background: #25d366; }
        .a2a_button_telegram { background: #2ca5e0; }
        .a2a_button_copy_link { background: #888; }
        .addtoany_share { background: #1472ba; }
        
        .entry-meta {
            margin-top: 25px;
            padding-top: 20px;
            border-top: 1px solid #e8e8e8;
            font-size: 14px;
            line-height: 1.8;
        }
        
        .entry-meta strong {
            color: #333;
            font-weight: 600;
        }
        
        .disclaimer-desc {
            color: #666;
            font-style: italic;
        }
        
        .newsletter-single-footer {
            margin-top: 40px;
            padding-top: 25px;
            border-top: 2px solid #e8e8e8;
        }
        
        .newsletter-back-link {
            display: inline-block;
            padding: 12px 24px;
            background: #f8f9fa;
            color: #1472ba;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 600;
            border: 1px solid #e0e0e0;
        }
        
        /* Recent Newsletters Section */
        .newsletter-related {
            margin-top: 50px;
            padding-top: 30px;
            padding-left: 16px;
            padding-right: 16px;
            border-top: 2px solid #e8e8e8;
        }
        
        /* Extra newsletter cards (index 4+) toggled via amp-bind [hidden] on each item */
        .newsletter-related-item-more[hidden] {
            display: none;
        }
        
        .newsletter-view-more-wrap {
            margin-top: 20px;
            text-align: center;
        }
        
        .newsletter-view-more-btn {
            display: inline-block;
            padding: 12px 24px;
            background: linear-gradient(135deg, #1472ba 0%, #0f5a8f 100%);
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            transition: opacity 0.2s;
            box-shadow: 0 2px 8px rgba(20, 114, 186, 0.3);
        }
        
        .newsletter-related h3 {
            font-size: 22px;
            font-weight: 600;
            color: #0f2a47;
            margin-bottom: 25px;
            text-align: center;
        }
        
        .newsletter-related-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 24px;
        }

        .newsletter-related .nl-card {
            background: #fff;
            border: 1px solid #e3edf7;
            border-radius: 14px;
            padding: 14px;
            display: flex;
            flex-direction: column;
            height: 100%;
            box-shadow: 0 6px 16px rgba(15, 42, 72, 0.05);
        }

        .newsletter-related .nl-thumb {
            position: relative;
            border-radius: 10px;
            overflow: hidden;
            background: #f8f8f8;
            margin-bottom: 14px;
        }

        .newsletter-related .nl-thumb amp-img {
            width: 100%;
            height: 190px;
            object-fit: contain;
            background: #f8f8f8;
        }

        .newsletter-related .nl-thumb-fallback {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            aspect-ratio: 3/2;
            color: #aab4be;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: 0.04em;
            text-transform: uppercase;
        }

        .newsletter-related .nl-meta {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #6b809a;
            font-size: 12px;
            margin-bottom: 6px;
        }

        .newsletter-related .nl-title {
            margin: 0 0 12px;
            font-size: 20px;
            font-weight: 700;
            line-height: 1.3;
        }

        .newsletter-related .nl-title a {
            color: #0f2a47;
            text-decoration: none;
        }

        .newsletter-related .nl-desc {
            margin: 0 0 14px;
            font-size: 14px;
            line-height: 1.5;
            color: #77899c;
            min-height: 60px;
        }

        .newsletter-related .nl-readtime {
            display: inline-flex;
            align-items: center;
            width: fit-content;
            margin-top: auto;
            margin-bottom: 10px;
            font-size: 12px;
            font-weight: 600;
            background: #1472ba;
            color: #fff;
            padding: 5px 12px;
            border-radius: 6px;
        }

        .newsletter-related .nl-readmore {
            font-size: 14px;
            font-weight: 600;
            color: #1472ba;
            text-decoration: none;
        }

        .newsletter-related .nl-readmore::after {
            content: " \2192";
        }
        
        /* Tablet view - 2 cards per line for recent newsletters */
        @media (min-width: 601px) and (max-width: 1024px) {
            .newsletter-related-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            /* Content images: full width, no side auto-margins (exclude avatars/editorial images) */
            .newsletter-single-content amp-img:not(.avatar):not([class*="avatar"]):not(.size-thumbnail):not(.img-100):not(.img-120):not(.img-small):not(.img-medium) {
                max-width: 100%;
                width: 100%;
                margin-left: 0;
                margin-right: 0;
                display: block;
            }
            .newsletter-single-content h2 {
                font-size: 1.1875rem !important;
                margin-top: 24px;
                margin-bottom: 10px;
            }
            .newsletter-single-content h3 {
                font-size: 1.0625rem !important;
                margin-top: 20px;
                margin-bottom: 8px;
            }
            .newsletter-single-content h4 {
                font-size: 1rem !important;
            }
            .newsletter-single-content h5 {
                font-size: 0.9375rem !important;
            }
            .newsletter-single-content h6 {
                font-size: 0.875rem !important;
            }
            .newsletter-single-content amp-img.avatar,
            .newsletter-single-content amp-img.size-thumbnail,
            .newsletter-single-content amp-img[class*="avatar"] {
                max-width: 120px !important;
                max-height: none !important;
            }
            .newsletter-single-content amp-img.img-small,
            .newsletter-single-content amp-img.size-small {
                max-width: min(220px, 50%) !important;
                max-height: none;
            }
            .newsletter-single-content amp-img.img-medium {
                max-width: min(260px, 65%) !important;
                max-height: none;
            }
            .newsletter-single-content amp-img.img-100 {
                max-width: 100px !important;
            }
            .newsletter-single-content amp-img.img-120 {
                max-width: 120px !important;
            }
            .newsletter-single-content amp-img.align-left,
            .newsletter-single-content amp-img.img-align-left,
            .newsletter-single-content amp-img.alignleft,
            .newsletter-single-content amp-img.align-right,
            .newsletter-single-content amp-img.img-align-right,
            .newsletter-single-content amp-img.alignright,
            .newsletter-single-content amp-img.align-center,
            .newsletter-single-content amp-img.img-align-center,
            .newsletter-single-content amp-img.aligncenter {
                margin-left: 0;
                margin-right: 0;
                max-width: 100%;
                width: 100%;
                float: none;
            }
        }
        
        @media (max-width: 600px) {
            .newsletter-related-grid {
                grid-template-columns: 1fr;
            }
            .newsletter-single-container {
                padding: 0 0 32px;
            }

            .newsletter-single-hero {
                padding: 20px 16px 22px;
            }

            .newsletter-subscribe-btn,
            .newsletter-subscribe-btn a {
                width: 100%;
                justify-content: center;
            }

            .newsletter-single-content {
                width: 100%;
                padding: 16px 16px 24px;
            }

            .newsletter-single-title {
                font-size: 1.35rem;
            }
            
            .newsletter-single-content {
                font-size: 15px;
            }

            .newsletter-single-content h2 {
                font-size: 1.0625rem !important;
                margin-top: 20px;
                margin-bottom: 8px;
            }
            
            .newsletter-single-content h3 {
                font-size: 1rem !important;
                margin-top: 18px;
                margin-bottom: 8px;
            }

            .newsletter-single-content h4 {
                font-size: 0.9375rem !important;
            }

            .newsletter-single-content h5 {
                font-size: 0.875rem !important;
            }

            .newsletter-single-content h6 {
                font-size: 0.8125rem !important;
            }

            .newsletter-single-content ul,
            .newsletter-single-content ol {
                padding-left: 22px;
            }
            
            .newsletter-single-content amp-img {
                max-width: 100%;
                width: 100%;
                margin-left: 0;
                margin-right: 0;
            }
            .newsletter-single-content amp-img.img-100 {
                max-width: 100px !important;
            }
            .newsletter-single-content amp-img.img-120 {
                max-width: 120px !important;
            }
            .newsletter-single-content amp-img.align-left,
            .newsletter-single-content amp-img.img-align-left,
            .newsletter-single-content amp-img.alignleft,
            .newsletter-single-content amp-img.align-right,
            .newsletter-single-content amp-img.img-align-right,
            .newsletter-single-content amp-img.alignright,
            .newsletter-single-content amp-img.align-center,
            .newsletter-single-content amp-img.img-align-center,
            .newsletter-single-content amp-img.aligncenter {
                margin-left: 0;
                margin-right: 0;
                max-width: 100%;
                width: 100%;
                float: none;
            }
            
            .newsletter-single-meta {
                gap: 6px 10px;
            }

            .newsletter-meta-sep {
                display: none;
            }

            .newsletter-subscribe-btn,
            .newsletter-subscribe-btn a {
                width: 100%;
                justify-content: center;
            }
        }
		<?php 
		// Output optimized menu and footer CSS
		$optimizer = \ElearnPOSH\AMP\Performance_Optimizer::get_instance();
		echo $optimizer->get_optimized_css( 'newsletter', array( 'menu', 'footer' ) );
		?>
		
		/* Newsletter Subscription Form - AMP Compatible CSS */
		.ans-subscription-form-wrapper {
		    width: 100%;
		    max-width: 100%;
		    margin: 30px auto;
		    padding: 40px;
		    background: linear-gradient(135deg, #f5f7fa 0%, #ffffff 100%);
		    border-radius: 12px;
		    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08), 0 0 0 1px rgba(20, 114, 186, 0.1);
		    border-left: 4px solid #1472ba;
		    position: relative;
		    overflow: hidden;
		    box-sizing: border-box;
		}
		
		.ans-form-title {
		    margin-bottom: 25px;
		    color: #1a1a1a;
		    font-size: 28px;
		    text-align: left;
		    font-weight: 700;
		    letter-spacing: -0.5px;
		    position: relative;
		    padding-bottom: 15px;
		}
		
		.ans-form-title::after {
		    content: '';
		    position: absolute;
		    bottom: 0;
		    left: 0;
		    width: 60px;
		    height: 3px;
		    background: linear-gradient(90deg, #1472ba 0%, #0f5a8f 100%);
		    border-radius: 2px;
		}
		
		.ans-subscription-form {
		    display: flex;
		    flex-direction: column;
		    gap: 10px;
		}
		
		.ans-form-row {
		    display: flex;
		    flex-direction: row;
		    align-items: flex-start;
		    gap: 20px;
		    flex-wrap: nowrap;
		    width: 100%;
		    box-sizing: border-box;
		}
		
		.ans-inline-form {
		    display: flex;
		    flex-direction: column;
		    gap: 10px;
		}
		
		.ans-inline-group {
		    flex: 1 1 auto;
		    min-width: 0;
		    display: flex;
		    flex-direction: column;
		    box-sizing: border-box;
		}
		
		.ans-field-label {
		    margin-bottom: 10px;
		    font-weight: 600;
		    color: #444;
		    font-size: 15px;
		    display: block;
		    letter-spacing: 0.2px;
		}

		.ans-floating-field {
		    position: relative;
		}

		.ans-floating-label {
		    position: absolute;
		    left: 16px;
		    top: 50%;
		    transform: translateY(-50%);
		    margin: 0;
		    pointer-events: none;
		    font-weight: 500;
		    color: #888;
		    font-size: 14px;
		}

		.ans-floating-field .ans-form-input:focus + .ans-floating-label,
		.ans-floating-field .ans-form-input:not(:placeholder-shown) + .ans-floating-label {
		    opacity: 0;
		    visibility: hidden;
		}

		.ans-floating-field .ans-form-input::placeholder {
		    color: transparent;
		}
		
		.ans-required-asterisk {
		    color: #e74c3c;
		    font-weight: bold;
		}
		
		.ans-button-label {
		    visibility: hidden;
		    height: 24px;
		}
		
		.ans-button-group {
		    flex: 0 0 auto;
		    min-width: auto;
		    display: flex;
		    flex-direction: column;
		    align-self: flex-end;
		    margin-top: 0;
		}
		
		.ans-form-group {
		    display: flex;
		    flex-direction: column;
		    box-sizing: border-box;
		}
		
		.ans-form-input {
		    padding: 14px 18px;
		    border: 2px solid #e0e0e0;
		    border-radius: 8px;
		    font-size: 15px;
		    width: 100%;
		    box-sizing: border-box;
		    height: 48px;
		    max-width: 100%;
		    background: #ffffff;
		    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
		    font-family: inherit;
		}
		
		.ans-form-input:focus {
		    outline: none;
		    border-color: #1472ba;
		    box-shadow: 0 0 0 3px rgba(20, 114, 186, 0.1), 0 2px 8px rgba(0, 0, 0, 0.1);
		}
		
		.ans-form-input.error {
		    border-color: #e74c3c;
		}
		
		.ans-error-message {
		    color: #e74c3c;
		    font-size: 12px;
		    margin-top: 5px;
		    display: block;
		}
		
		.ans-submit-btn {
		    padding: 14px 35px;
		    background: linear-gradient(135deg, #1472ba 0%, #0f5a8f 100%);
		    color: white;
		    border: none;
		    border-radius: 8px;
		    font-size: 16px;
		    font-weight: 600;
		    white-space: nowrap;
		    height: 48px;
		    align-self: flex-start;
		    box-shadow: 0 4px 12px rgba(20, 114, 186, 0.3);
		    letter-spacing: 0.3px;
		    position: relative;
		    overflow: hidden;
		    cursor: pointer;
		    font-family: inherit;
		    box-sizing: border-box;
		}
		
		.ans-submit-btn:disabled {
		    background-color: #cccccc;
		    cursor: not-allowed;
		    opacity: 0.6;
		}
		
		.ans-message {
		    padding: 14px 18px;
		    border-radius: 8px;
		    margin-top: 15px;
		    text-align: center;
		    font-size: 14px;
		    display: none;
		    width: 100%;
		    clear: both;
		    font-weight: 500;
		    box-sizing: border-box;
		}
		
		.ans-message.ans-success {
		    display: block;
		    background-color: #d4edda;
		    color: #155724;
		    border: 1px solid #c3e6cb;
		}
		
		.ans-message.ans-error {
		    display: block;
		    background-color: #f8d7da;
		    color: #721c24;
		    border: 1px solid #f5c6cb;
		}
		
		.ans-honeypot {
		    position: absolute !important;
		    left: -9999px !important;
		    width: 1px !important;
		    height: 1px !important;
		    overflow: hidden !important;
		    opacity: 0 !important;
		    pointer-events: none !important;
		    visibility: hidden !important;
		    display: none !important;
		}
		
		.ans-honeypot input,
		.ans-honeypot label {
		    display: none !important;
		}
		
		.ans-submit-loading {
		    display: inline-block;
		}
		
		.ans-submit-loading::after {
		    content: '';
		    display: inline-block;
		    width: 12px;
		    height: 12px;
		    margin-left: 8px;
		    border: 2px solid #ffffff;
		    border-top-color: transparent;
		    border-radius: 50%;
		    vertical-align: middle;
		    animation: spin 0.8s linear infinite;
		}
		
		@keyframes spin {
		    to {
		        transform: rotate(360deg);
		    }
		}
		
		@media (max-width: 768px) {
		    .ans-form-row {
		        flex-direction: column;
		        flex-wrap: wrap;
		    }
		    
		    .ans-inline-group {
		        width: 100%;
		        min-width: 100%;
		    }
		    
		    .ans-button-group {
		        width: 100%;
		    }
		    
		    .ans-submit-btn {
		        width: 100%;
		        align-self: stretch;
		    }
		    
		    .ans-subscription-form-wrapper {
		        padding: 25px;
		        margin: 15px;
		        width: calc(100% - 30px);
		    }
		    
		    .ans-error-message {
		        position: static;
		        margin-top: 5px;
		    }
		}
		
		/* AMP Lightbox Styles */
		.amp-lightbox-content {
		    background: #fff;
		    padding: 40px;
		    margin: 50px auto;
		    max-width: 500px;
		    border-radius: 12px;
		    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
		    position: relative;
		}
		
		.amp-message-box {
		    text-align: center;
		}
		
		.amp-message-box h3 {
		    margin: 0 0 15px 0;
		    font-size: 24px;
		    font-weight: 700;
		}
		
		.amp-message-box.ans-success h3 {
		    color: #155724;
		}
		
		.amp-message-box.ans-error h3 {
		    color: #721c24;
		}
		
		.amp-message-box p {
		    margin: 0 0 25px 0;
		    font-size: 16px;
		    line-height: 1.6;
		}
		
		.amp-close-btn {
		    background: linear-gradient(135deg, #1472ba 0%, #0f5a8f 100%);
		    color: #fff;
		    border: none;
		    padding: 12px 30px;
		    border-radius: 6px;
		    font-size: 16px;
		    font-weight: 600;
		    cursor: pointer;
		    transition: all 0.3s ease;
		}
		
		.amp-close-btn:active {
		    transform: scale(0.98);
		}
		
		/* Newsletter Subscription Form - AMP Compatible CSS */
		/* This CSS is designed for AMP pages and follows AMP CSS guidelines */
		
		.ans-subscription-form-wrapper {
		    width: 100%;
		    max-width: 100%;
		    margin: 30px auto;
		    padding: 40px;
		    background: linear-gradient(135deg, #f5f7fa 0%, #ffffff 100%);
		    border-radius: 12px;
		    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08), 0 0 0 1px rgba(20, 114, 186, 0.1);
		    border-left: 4px solid #1472ba;
		    position: relative;
		    overflow: hidden;
		    box-sizing: border-box;
		}
		
		.ans-form-title {
		    margin-bottom: 25px;
		    color: #1a1a1a;
		    font-size: 28px;
		    text-align: left;
		    font-weight: 700;
		    letter-spacing: -0.5px;
		    position: relative;
		    padding-bottom: 15px;
		}
		
		.ans-form-title::after {
		    content: '';
		    position: absolute;
		    bottom: 0;
		    left: 0;
		    width: 60px;
		    height: 3px;
		    background: linear-gradient(90deg, #1472ba 0%, #0f5a8f 100%);
		    border-radius: 2px;
		}
		
		.ans-subscription-form {
		    display: flex;
		    flex-direction: column;
		    gap: 10px;
		}
		
		.ans-form-row {
		    display: flex;
		    flex-direction: row;
		    align-items: flex-start;
		    gap: 20px;
		    flex-wrap: nowrap;
		    width: 100%;
		    box-sizing: border-box;
		}
		
		.ans-inline-form {
		    display: flex;
		    flex-direction: column;
		    gap: 10px;
		}
		
		.ans-inline-group {
		    flex: 1 1 auto;
		    min-width: 0;
		    display: flex;
		    flex-direction: column;
		    box-sizing: border-box;
		}
		
		.ans-field-label {
		    margin-bottom: 10px;
		    font-weight: 600;
		    color: #444;
		    font-size: 15px;
		    display: block;
		    letter-spacing: 0.2px;
		}

		.ans-floating-field {
		    position: relative;
		}

		.ans-floating-label {
		    position: absolute;
		    left: 16px;
		    top: 50%;
		    transform: translateY(-50%);
		    margin: 0;
		    pointer-events: none;
		    font-weight: 500;
		    color: #888;
		    font-size: 14px;
		}

		.ans-floating-field .ans-form-input:focus + .ans-floating-label,
		.ans-floating-field .ans-form-input:not(:placeholder-shown) + .ans-floating-label {
		    opacity: 0;
		    visibility: hidden;
		}

		.ans-floating-field .ans-form-input::placeholder {
		    color: transparent;
		}
		
		.ans-required-asterisk {
		    color: #e74c3c;
		    font-weight: bold;
		}
		
		.ans-button-label {
		    visibility: hidden;
		    height: 24px;
		}
		
		.ans-button-group {
		    flex: 0 0 auto;
		    min-width: auto;
		    display: flex;
		    flex-direction: column;
		    align-self: flex-end;
		    margin-top: 0;
		}
		
		.ans-form-group {
		    display: flex;
		    flex-direction: column;
		    box-sizing: border-box;
		}
		
		.ans-form-input {
		    padding: 14px 18px;
		    border: 2px solid #e0e0e0;
		    border-radius: 8px;
		    font-size: 15px;
		    width: 100%;
		    box-sizing: border-box;
		    height: 48px;
		    max-width: 100%;
		    background: #ffffff;
		    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
		    font-family: inherit;
		}
		
		.ans-form-input:focus {
		    outline: none;
		    border-color: #1472ba;
		    box-shadow: 0 0 0 3px rgba(20, 114, 186, 0.1), 0 2px 8px rgba(0, 0, 0, 0.1);
		}
		
		.ans-form-input.error {
		    border-color: #e74c3c;
		}
		
		.ans-error-message {
		    color: #e74c3c;
		    font-size: 12px;
		    margin-top: 5px;
		    display: block;
		}
		
		.ans-inline-group {
		    position: relative;
		}
		
		.ans-submit-btn {
		    padding: 14px 35px;
		    background: linear-gradient(135deg, #1472ba 0%, #0f5a8f 100%);
		    color: white;
		    border: none;
		    border-radius: 8px;
		    font-size: 16px;
		    font-weight: 600;
		    white-space: nowrap;
		    height: 48px;
		    align-self: flex-start;
		    box-shadow: 0 4px 12px rgba(20, 114, 186, 0.3);
		    letter-spacing: 0.3px;
		    position: relative;
		    overflow: hidden;
		    cursor: pointer;
		    font-family: inherit;
		    box-sizing: border-box;
		}
		
		.ans-submit-btn:disabled {
		    background-color: #cccccc;
		    cursor: not-allowed;
		    opacity: 0.6;
		}
		
		/* AMP form states */
		.ans-submit-btn[disabled] {
		    background-color: #cccccc;
		    cursor: not-allowed;
		    opacity: 0.6;
		}
		
		[submit-text] {
		    display: inline-block;
		}
		
		[submit-loading] {
		    display: none;
		}
		
		.ans-submit-btn[submitting] [submit-text] {
		    display: none;
		}
		
		.ans-submit-btn[submitting] [submit-loading] {
		    display: inline-block;
		}
		
		/* Message styles - ensure they're visible */
		.ans-message-wrapper {
		    margin-top: 15px;
		    width: 100%;
		    clear: both;
		}
		
		.ans-message {
		    padding: 14px 18px;
		    border-radius: 8px;
		    text-align: center;
		    font-size: 14px;
		    display: block;
		    width: 100%;
		    clear: both;
		    font-weight: 500;
		    box-sizing: border-box;
		    margin-top: 15px;
		}
		
		.ans-message.ans-success {
		    background-color: #d4edda;
		    color: #155724;
		    border: 1px solid #c3e6cb;
		}
		
		.ans-message.ans-error {
		    background-color: #f8d7da;
		    color: #721c24;
		    border: 1px solid #f5c6cb;
		}
		
		.ans-message.ans-error ul {
		    margin: 10px 0 0 0;
		    padding-left: 20px;
		    text-align: left;
		}
		
		.ans-message.ans-error li {
		    margin: 5px 0;
		}
		
		/* Honeypot fields - ensure they stay hidden */
		.ans-honeypot {
		    position: absolute !important;
		    left: -9999px !important;
		    width: 1px !important;
		    height: 1px !important;
		    overflow: hidden !important;
		    opacity: 0 !important;
		    pointer-events: none !important;
		    visibility: hidden !important;
		    display: none !important;
		}
		
		.ans-honeypot input,
		.ans-honeypot label {
		    display: none !important;
		}
		
		/* AMP Lightbox Styles */
		.ns-lightbox-overlay {
		    position: fixed;
		    top: 0;
		    left: 0;
		    right: 0;
		    bottom: 0;
		    z-index: 1000;
		}
		
		.ns-lightbox-backdrop {
		    position: absolute;
		    top: 0;
		    left: 0;
		    right: 0;
		    bottom: 0;
		    background: rgba(0, 0, 0, 0.6);
		    cursor: pointer;
		}
		
		.ns-lightbox-content {
		    background: #ffffff;
		    border-radius: 12px;
		    max-width: 500px;
		    width: 90%;
		    max-height: 90vh;
		    display: flex;
		    flex-direction: column;
		    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
		    overflow: hidden;
		    position: relative;
		    z-index: 1001;
		}
		
		.ns-lightbox-content-centered {
		    position: absolute;
		    top: 50%;
		    left: 50%;
		    transform: translate(-50%, -50%);
		    margin: 0;
		}
		
		.ns-lightbox-white {
		    background: #ffffff;
		    border-radius: 12px;
		}
		
		.ns-lightbox-body-full {
		    padding: 50px 40px;
		    text-align: center;
		    display: flex;
		    align-items: center;
		    justify-content: center;
		    min-height: 300px;
		    flex-direction: column;
		}
		
		.ns-lightbox-header {
		    background: linear-gradient(135deg, #1472ba 0%, #0f5a8f 100%);
		    color: white;
		    padding: 20px 25px;
		    display: flex;
		    justify-content: space-between;
		    align-items: center;
		}
		
		.ns-lightbox-header-success {
		    background: linear-gradient(135deg, #28a745 0%, #218838 100%);
		    color: white;
		}
		
		.ns-lightbox-header-error {
		    background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
		}
		
		.ns-lightbox-header h2 {
		    margin: 0;
		    font-size: 24px;
		    font-weight: 600;
		}
		
		.ns-lightbox-close {
		    background: transparent;
		    border: none;
		    color: white;
		    font-size: 32px;
		    line-height: 1;
		    cursor: pointer;
		    padding: 0;
		    width: 32px;
		    height: 32px;
		    display: flex;
		    align-items: center;
		    justify-content: center;
		    border-radius: 50%;
		    transition: background-color 0.3s;
		}
		
		.ns-lightbox-close:hover {
		    background-color: rgba(255, 255, 255, 0.2);
		}
		
		.ns-lightbox-body {
		    padding: 30px 25px;
		    text-align: center;
		    overflow-y: auto;
		    flex: 1;
		}
		
		.ns-lightbox-footer {
		    padding: 20px 25px;
		    border-top: 1px solid #e0e0e0;
		    text-align: center;
		}
		
		.ns-lightbox-button {
		    padding: 12px 30px;
		    border: none;
		    border-radius: 8px;
		    font-size: 16px;
		    font-weight: 600;
		    cursor: pointer;
		    transition: all 0.3s;
		    min-width: 120px;
		}
		
		.ns-lightbox-button-primary {
		    background: linear-gradient(135deg, #1472ba 0%, #0f5a8f 100%);
		    color: white;
		}
		
		.ns-lightbox-button-primary:hover {
		    background: linear-gradient(135deg, #0f5a8f 0%, #0a4a75 100%);
		    transform: translateY(-2px);
		    box-shadow: 0 4px 12px rgba(20, 114, 186, 0.3);
		}
		
		.ns-lightbox-button-error {
		    background: linear-gradient(135deg, #f44336 0%, #d32f2f 100%);
		    color: white;
		}
		
		.ns-lightbox-button-error:hover {
		    background: linear-gradient(135deg, #c82333 0%, #bd2130 100%);
		    transform: translateY(-2px);
		    box-shadow: 0 4px 12px rgba(220, 53, 69, 0.3);
		}
		
		/* Success Message Styles */
		.ns-success-message {
		    text-align: center;
		    padding: 0;
		    width: 100%;
		    display: flex;
		    flex-direction: column;
		    align-items: center;
		    justify-content: center;
		}
		
		.ns-success-icon {
		    margin: 0 auto 30px;
		    display: block;
		}
		
		.ns-success-text {
		    font-size: 20px;
		    margin: 0 0 30px 0;
		    color: #28a745;
		    font-weight: 600;
		    line-height: 1.6;
		    text-align: center;
		}
		
		.ns-lightbox-close-btn {
		    margin-top: 20px;
		}
		
		/* Error Message Styles */
		.ns-error-message {
		    text-align: center;
		    padding: 0;
		    width: 100%;
		    display: flex;
		    flex-direction: column;
		    align-items: center;
		    justify-content: center;
		}
		
		.ns-error-icon {
		    margin: 0 auto 30px;
		    display: block;
		}
		
		.ns-error-text-main {
		    font-size: 20px;
		    margin: 0 0 20px 0;
		    color: #dc3545;
		    font-weight: 600;
		    line-height: 1.6;
		    text-align: center;
		}
		
		.ns-error-details {
		    margin-top: 20px;
		    padding-top: 20px;
		    border-top: 1px solid #f5c6cb;
		    width: 100%;
		}
		
		.ns-error-list {
		    margin: 0;
		    padding-left: 20px;
		    text-align: left;
		    color: #721c24;
		    list-style: disc;
		}
		
		.ns-error-list li {
		    margin: 8px 0;
		    font-size: 15px;
		    line-height: 1.5;
		}
		
		/* Responsive design for AMP */
		@media (max-width: 768px) {
		    .ans-form-row {
		        flex-direction: column;
		        flex-wrap: wrap;
		    }
		    
		    .ans-inline-group {
		        width: 100%;
		        min-width: 100%;
		    }
		    
		    .ans-button-group {
		        width: 100%;
		    }
		    
		    .ans-submit-btn {
		        width: 100%;
		        align-self: stretch;
		    }
		    
		    .ans-subscription-form-wrapper {
		        padding: 25px;
		        margin: 15px;
		        width: calc(100% - 30px);
		    }
		    
		    .ans-error-message {
		        position: static;
		        margin-top: 5px;
		    }
		    
		    .ns-lightbox-content {
		        width: 95%;
		    }
		    
		    .ns-lightbox-content-centered {
		        transform: translate(-50%, -50%);
		    }
		    
		    .ns-lightbox-body-full {
		        padding: 40px 25px;
		        min-height: 250px;
		    }
		    
		    .ns-success-text,
		    .ns-error-text-main {
		        font-size: 18px;
		    }
		    
		    .ns-lightbox-header h2 {
		        font-size: 20px;
		    }
		    
		    .ns-lightbox-body {
		        padding: 20px 15px;
		    }
		}
		<?php elearnposh_amp_include_style_partial( 'connect-fab' ); ?>
    </style>
    <?php elearnposh_amp_output_current_page_schema_json_ld( '', 'Article' ); ?>
</head>
<body>
    <?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/menu.php'; ?>
    
    <div class="amp-content-wrapper">
    <div class="newsletter-single-container">
        <header class="newsletter-single-hero">
            <?php elearnposh_amp_render_breadcrumbs(); ?>

            <div class="newsletter-single-hero-copy">
                <h1 class="newsletter-single-title"><?php echo esc_html(get_the_title()); ?></h1>

                <div class="newsletter-single-meta">
                    <span><?php echo esc_html(get_the_date('F j, Y')); ?></span>
                    <span class="newsletter-meta-sep" aria-hidden="true">·</span>
                    <span class="newsletter-read-time">
                        <?php
                        $read_time = '';
                        if (function_exists('get_field')) {
                            $read_time = get_field('read_time');
                        }
                        if (!$read_time) {
                            $content = get_post_field('post_content', get_the_ID());
                            if ($content) {
                                $words = str_word_count(strip_tags($content));
                                $read_time = ceil($words / 200);
                            } else {
                                $read_time = 1;
                            }
                        }
                        echo esc_html($read_time) . ' min read';
                        ?>
                    </span>
                </div>

                <span class="newsletter-subscribe-btn">
                    <a href="#newsletter-subscription-form" class="newsletter-subscribe-link">
                        <?php esc_html_e( 'Subscribe to our Newsletter', 'elearnposh-amp' ); ?>
                    </a>
                </span>
            </div>
        </header>

        <!-- Content Section -->
        <div class="newsletter-single-content">
            <?php
            // Get content and convert images to AMP
            $content = get_the_content();
            if ( function_exists( 'elearnposh_amp_strip_tinymce_editor_artifacts' ) ) {
                $content = elearnposh_amp_strip_tinymce_editor_artifacts( $content );
            }
            if ( function_exists( 'elearnposh_amp_strip_disallowed_style_tags' ) ) {
                $content = elearnposh_amp_strip_disallowed_style_tags( $content );
            }
            $content = apply_filters('the_content', $content);
            if ( function_exists( 'elearnposh_amp_sanitize_amp_form_markup' ) ) {
                $content = elearnposh_amp_sanitize_amp_form_markup( $content );
            }
            if ( function_exists( 'elearnposh_amp_convert_img_tags_to_amp_img' ) ) {
                $content = elearnposh_amp_convert_img_tags_to_amp_img( $content );
            }
            if ( function_exists( 'elearnposh_amp_sanitize_amp_img_markup' ) ) {
                $content = elearnposh_amp_sanitize_amp_img_markup( $content );
            }
            if ( function_exists( 'elearnposh_amp_resolve_content_media_urls' ) ) {
                $content = elearnposh_amp_resolve_content_media_urls( $content );
            }
            // Convert Google Docs / gview PDF iframe embeds to amp-iframe (AMP does not allow raw iframe)
            $content = preg_replace_callback(
                '/<div\s+[^>]*style=["\'][^"\']*padding-top:\s*56\.25%[^"\']*["\'][^>]*>[\s\S]*?<iframe\s+[^>]+src=["\']([^"\']+)["\'][^>]*>[\s\S]*?<\/iframe>\s*<\/div>/i',
                function($m) {
                    $src = $m[1];
                    if (strpos($src, 'docs.google.com') === false && strpos($src, 'gview') === false) {
                        return $m[0];
                    }
                    $src = str_replace('&amp;', '&', $src);
                    return '<div class="ns-pdf-embed" style="position:relative;padding-top:56.25%;width:100%;max-width:100%;margin:25px 0;"><amp-iframe layout="fill" sandbox="allow-scripts allow-same-origin" src="' . esc_url($src) . '"></amp-iframe></div>';
                },
                $content
            );

            echo $content;
            ?>
        </div>

        <!-- Taxonomy Section -->
        <div class="newsletter-taxonomy">
            <?php
            $categories = get_the_category();
            if (!empty($categories)) {
                echo '<span class="newsletter-taxonomy-label">' . __('Categories:', 'genesis') . '</span>';
                echo '<span class="newsletter-taxonomy-tags">';
                the_category(' ');
                echo '</span>';
            }
            
            $tags = get_the_tags();
            if (!empty($tags)) {
                echo '<span class="newsletter-taxonomy-label">' . __('Tags:', 'genesis') . '</span>';
                echo '<span class="newsletter-taxonomy-tags">';
                the_tags('', ' ', '');
                echo '</span>';
            }
            ?>
        </div>

        <!-- Recent Newsletters Section (below taxonomy, above footer) -->
        <?php
        $recent_args = array(
            'post_type' => 'post',
            'category_name' => 'newsletter',
            'posts_per_page' => 50,
            'post__not_in' => array(get_the_ID()),
            'orderby' => 'date',
            'order' => 'DESC',
            'post_status' => 'publish'
        );
        $recent_query = new WP_Query($recent_args);
        $recent_total = $recent_query->post_count;
        if ($recent_query->have_posts()) :
        ?>
            <amp-state id="recentNewslettersState">
                <script type="application/json">
                {"showAll": false}
                </script>
            </amp-state>
            <div class="newsletter-related">
                <h3><?php _e('Recent Newsletters', 'genesis'); ?></h3>
                <div class="nl-grid newsletter-related-grid">
                    <?php
                    $index = 0;
                    while ($recent_query->have_posts()) : $recent_query->the_post();
                        $read_time = function_exists( 'get_field' ) ? get_field( 'read_time' ) : false;
                        if ( ! $read_time ) {
                            $words     = str_word_count( wp_strip_all_tags( get_post_field( 'post_content', get_the_ID() ) ) );
                            $read_time = max( 1, ceil( $words / 200 ) );
                        }
                        $is_more = ( $index >= 3 );
                        $index++;
                    ?>
                        <article class="nl-card<?php echo $is_more ? ' newsletter-related-item-more' : ''; ?>"<?php echo $is_more ? ' hidden [hidden]="!recentNewslettersState.showAll"' : ''; ?>>
                            <div class="nl-thumb">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <amp-img
                                            src="<?php echo esc_url( elearnposh_amp_get_post_thumbnail_url( get_the_ID(), 'medium_large' ) ); ?>"
                                            width="600"
                                            height="400"
                                            layout="responsive"
                                            alt="<?php echo esc_attr( get_the_title() ); ?>">
                                        </amp-img>
                                    </a>
                                <?php else : ?>
                                    <div class="nl-thumb-fallback">
                                        <?php esc_html_e( 'Newsletter', 'genesis' ); ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="nl-meta">
                                <span><?php echo esc_html( get_the_date() ); ?></span>
                            </div>

                            <h3 class="nl-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>

                            <p class="nl-desc">
                                <?php echo esc_html( wp_trim_words( get_the_excerpt(), 22 ) ); ?>
                            </p>

                            <span class="nl-readtime">
                                <?php
                                /* translators: %s: Read time in minutes */
                                printf( esc_html__( '%s min read', 'genesis' ), esc_html( $read_time ) );
                                ?>
                            </span>

                            <a class="nl-readmore" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read More', 'genesis' ); ?></a>
                        </article>
                    <?php
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </div>
                <?php if ($recent_total > 3) : ?>
                <div class="newsletter-view-more-wrap">
                    <button type="button"
                            class="newsletter-view-more-btn"
                            on="tap:AMP.setState({recentNewslettersState: {showAll: !recentNewslettersState.showAll}})"
                            role="button"
                            tabindex="0"
                            aria-expanded="false"
                            [aria-expanded]="recentNewslettersState.showAll && 'true' || 'false'">
                        <span [hidden]="recentNewslettersState.showAll"><?php esc_html_e( 'View more', 'genesis' ); ?></span>
                        <span hidden [hidden]="!recentNewslettersState.showAll"><?php esc_html_e( 'Show less', 'genesis' ); ?></span>
                    </button>
                </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <!-- Entry Footer with Social Sharing and Disclaimer -->
        <footer class="newsletter-entry-footer entry-footer">
            <!-- AddToAny AMP-friendly share section -->
            <div class="addtoany_share_save_container addtoany_content addtoany_content_bottom" aria-label="Share">
                <div class="addtoany_header">Share:</div>
                <div class="a2a_kit a2a_kit_size_30 addtoany_list"
                    data-a2a-url="<?php echo esc_url(get_permalink()); ?>"
                    data-a2a-title="<?php echo esc_attr(get_the_title()); ?>">
                    
                    <a class="a2a_button_facebook" href="https://www.addtoany.com/add_to/facebook?linkurl=<?php echo urlencode(get_permalink()); ?>&linkname=<?php echo urlencode(get_the_title()); ?>" rel="nofollow noopener" target="_blank">
                        <amp-img src="https://static.addtoany.com/buttons/facebook.svg" width="30" height="30" layout="fixed" alt="Facebook"></amp-img>
                    </a>
                    
                    <a class="a2a_button_linkedin" href="https://www.addtoany.com/add_to/linkedin?linkurl=<?php echo urlencode(get_permalink()); ?>&linkname=<?php echo urlencode(get_the_title()); ?>" rel="nofollow noopener" target="_blank">
                        <amp-img src="https://static.addtoany.com/buttons/linkedin.svg" width="30" height="30" layout="fixed" alt="LinkedIn"></amp-img>
                    </a>
                    
                    <a class="a2a_button_twitter" href="https://www.addtoany.com/add_to/twitter?linkurl=<?php echo urlencode(get_permalink()); ?>&linkname=<?php echo urlencode(get_the_title()); ?>" rel="nofollow noopener" target="_blank">
                        <amp-img src="https://static.addtoany.com/buttons/twitter.svg" width="30" height="30" layout="fixed" alt="Twitter"></amp-img>
                    </a>
                    
                    <a class="a2a_button_whatsapp" href="https://www.addtoany.com/add_to/whatsapp?linkurl=<?php echo urlencode(get_permalink()); ?>&linkname=<?php echo urlencode(get_the_title()); ?>" rel="nofollow noopener" target="_blank">
                        <amp-img src="https://static.addtoany.com/buttons/whatsapp.svg" width="30" height="30" layout="fixed" alt="WhatsApp"></amp-img>
                    </a>
                    
                    <a class="a2a_button_telegram" href="https://www.addtoany.com/add_to/telegram?linkurl=<?php echo urlencode(get_permalink()); ?>&linkname=<?php echo urlencode(get_the_title()); ?>" rel="nofollow noopener" target="_blank">
                        <amp-img src="https://static.addtoany.com/buttons/telegram.svg" width="30" height="30" layout="fixed" alt="Telegram"></amp-img>
                    </a>
                    
                    <a class="a2a_button_copy_link" href="https://www.addtoany.com/add_to/copy_link?linkurl=<?php echo urlencode(get_permalink()); ?>&linkname=<?php echo urlencode(get_the_title()); ?>" rel="nofollow noopener" target="_blank">
                        <amp-img src="https://static.addtoany.com/buttons/link.svg" width="30" height="30" layout="fixed" alt="Copy Link"></amp-img>
                    </a>
                    
                    <a class="a2a_dd addtoany_share_save addtoany_share" href="https://www.addtoany.com/share#url=<?php echo urlencode(get_permalink()); ?>&title=<?php echo urlencode(get_the_title()); ?>" target="_blank">
                        <amp-img src="https://static.addtoany.com/buttons/a2a.svg" width="30" height="30" layout="fixed" alt="More"></amp-img>
                    </a>
                </div>
            </div>

            <!-- Disclaimer -->
            <p class="entry-meta">
                <strong>Disclaimer:</strong>
                <span class="disclaimer-desc"> The content provided on elearnposh.com website like data, judgments, and opinions are only for informational / educational purposes in a general context. The content do not constitute legal advice and are not a substitute for legal advice for a specific case where the facts of the case are not known. You should seek legal advice or other professional advice in relation to any particular matters you or your organisation may have.</span>
            </p>
        </footer>

        <!-- Footer Section -->
        <div class="newsletter-single-footer">
            <a href="https://devep.succeedlms.com/newsletter/" class="newsletter-back-link">
                ← <?php _e('Back to Newsletter Archive', 'genesis'); ?>
            </a>
        </div>
    </div>
    
    </div><!-- .amp-content-wrapper -->
	<a
		class="pa-connect-fab"
		href="<?php echo esc_url( function_exists( 'elearnposh_amp_url' ) ? elearnposh_amp_url( '/contact-us/' ) : home_url( '/contact-us/' ) ); ?>"
		aria-label="<?php esc_attr_e( "Let's Connect — Contact Us", 'elearnposh-amp' ); ?>"
	><?php esc_html_e( "Let's Connect", 'elearnposh-amp' ); ?></a>
    <?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/footer.php'; ?>
</body>
</html>
<?php
    endwhile;
}
?>
