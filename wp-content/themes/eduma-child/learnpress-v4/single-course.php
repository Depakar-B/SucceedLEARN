<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Load theme header
get_header();

$course_id = get_the_ID();

// ============================================
// PERFORMANCE OPTIMIZATION: Batch Load All Meta
// ============================================
// Instead of 53 separate database queries, load all meta in ONE query
// This reduces page load time from 2-3 seconds to 0.3-0.5 seconds
// ============================================
function get_cached_course_meta($course_id) {
    // Cache key unique to this course
    $cache_key = 'course_meta_' . $course_id;
    
    // Try to get from WordPress object cache first
    $meta = wp_cache_get($cache_key);
    
    if ($meta === false) {
        // Cache miss - load ALL meta in ONE database query
        $all_meta = get_post_meta($course_id);
        
        // Convert to associative array for easy access
        $meta = [];
        foreach ($all_meta as $key => $value) {
            // get_post_meta returns arrays, get first value and unserialize if needed
            $raw_value = is_array($value) ? $value[0] : $value;
            $meta[$key] = maybe_unserialize($raw_value);
        }
        
        // Store in cache for 1 hour (3600 seconds)
        wp_cache_set($cache_key, $meta, '', 3600);
    }
    
    return $meta;
}

// Load all course meta in ONE query (or from cache)
$meta = get_cached_course_meta($course_id);

// ============================================
// Access all fields from $meta array
// ============================================
// Background fields
$banner_gradient = $meta['banner_gradient'] ?? '';
$banner_bg_hex = $meta['banner_bg_hex'] ?? '';
$banner_bg_rgb = $meta['banner_bg_rgb'] ?? '';
$banner_bg = $banner_gradient ?: ($banner_bg_hex ?: $banner_bg_rgb);
?>

<style>
/* ============================================
   GLOBAL FONT FAMILY DECLARATION
   ============================================ */
* {
  font-family: 'Open Sans', sans-serif !important;
}

/* ============================================
   GLOBAL TYPOGRAPHY STANDARDIZATION
   ============================================ */
/* Standardize all paragraph tags */
p {
  font-size: 16px !important;
  color: #1a1a1a !important;
  font-weight: 400 !important;
  line-height: 1.6 !important;
  margin: 0 0 15px 0 !important;
}
p:last-child {
  margin-bottom: 0 !important;
}

/* Override for white text sections */
.course-banner-section p,
.scroll-right p,
.advanced-section p,
.scroll-right li,
.advanced-section li {
  color: #ffffff !important;
}

/* Standardize all list items - Only for content areas, exclude header/footer */
.scroll-section li,
.objectives-content li,
.laws-content li,
.custom-output-section li,
.advanced-section li,
.codegrid-item-content li,
.faq-answer li,
.custom-dynamic-section li,
.extra-info-item-desc li {
  font-size: 16px !important;
  color: #1a1a1a !important;
  font-weight: 400 !important;
  line-height: 1.7 !important;
  margin-bottom: 8px !important;
  margin-left: 20px !important;
}
.scroll-section li:last-child,
.objectives-content li:last-child,
.laws-content li:last-child,
.custom-output-section li:last-child,
.advanced-section li:last-child,
.codegrid-item-content li:last-child,
.faq-answer li:last-child,
.custom-dynamic-section li:last-child,
.extra-info-item-desc li:last-child {
  margin-bottom: 0 !important;
}

/* Standardize all unordered and ordered lists - Only for content areas, exclude header/footer */
.scroll-section ul,
.scroll-section ol,
.objectives-content ul,
.objectives-content ol,
.laws-content ul,
.laws-content ol,
.custom-output-section ul,
.custom-output-section ol,
.advanced-section ul,
.advanced-section ol,
.codegrid-item-content ul,
.codegrid-item-content ol,
.faq-answer ul,
.faq-answer ol,
.custom-dynamic-section ul,
.custom-dynamic-section ol,
.extra-info-item-desc ul,
.extra-info-item-desc ol {
  margin: 0 0 12px 0 !important;
  padding-left: 20px !important;
}
.scroll-section ul:last-child,
.scroll-section ol:last-child,
.objectives-content ul:last-child,
.objectives-content ol:last-child,
.laws-content ul:last-child,
.laws-content ol:last-child,
.custom-output-section ul:last-child,
.custom-output-section ol:last-child,
.advanced-section ul:last-child,
.advanced-section ol:last-child,
.codegrid-item-content ul:last-child,
.codegrid-item-content ol:last-child,
.faq-answer ul:last-child,
.faq-answer ol:last-child,
.custom-dynamic-section ul:last-child,
.custom-dynamic-section ol:last-child,
.extra-info-item-desc ul:last-child,
.extra-info-item-desc ol:last-child {
  margin-bottom: 0 !important;
}

/* ============================================
   STANDARDIZED SPACING SYSTEM
   ============================================ */
/* Standard spacing below section titles - Reduced to 16px */
.objectives-title,
.laws-title,
.extra-info-title,
.custom-section-title,
.advanced-section h2,
.custom-output-section h2,
.codegrid-main-title,
.faq-title {
  margin-bottom: 16px !important;
}

/* Standard spacing below descriptions - Reduced to 16px */
.objectives-desc,
.laws-description,
.extra-info-item-desc,
.custom-output-section .description,
.advanced-section .description {
  margin-bottom: 16px !important;
}

/* Standard spacing between description and content */
.objectives-content,
.laws-content,
.custom-output-section .custom-output-content,
.advanced-section .advanced-content {
  margin-top: 0 !important;
}

/* Standard spacing for subsection titles - Reduced to 16px */
.subsection-title,
.codegrid-item-title {
  margin-bottom: 16px !important;
}


/* === Internal CSS for Custom Course Banner === */
body {
  margin: 0 !important;
  padding: 0 !important;
}

/* Banner Section Wrapper - Fluid Responsive Base */
.course-banner-section {
  margin: 0;
  padding: clamp(52px, 7vw, 100px) clamp(20px, 6vw, 100px) clamp(30px, 5vw, 80px);
  color: #fff;
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
  box-sizing: border-box;
  width: 100%;
}

/* ✅ Center container with max width - Fluid Layout */
.course-banner-container {
  max-width: 1290px;
  margin: 0 auto;
  width: 100%;
}

.course-banner-row {
  --banner-gutter-x: clamp(20px, 3vw, 50px);
  --banner-gutter-y: clamp(18px, 2.5vw, 30px);
  display: flex;
  flex-wrap: wrap;
  margin-left: calc(var(--banner-gutter-x) * -0.5);
  margin-right: calc(var(--banner-gutter-x) * -0.5);
  row-gap: var(--banner-gutter-y);
  align-items: center;
}

/* Left and Right Containers - Bootstrap column wrappers */
.banner-left,
.banner-right {
  box-sizing: border-box;
  min-width: 0;
  max-width: 100%;
  padding-left: calc(var(--banner-gutter-x) * 0.5);
  padding-right: calc(var(--banner-gutter-x) * 0.5);
  flex: 0 0 100%;
}

.banner-left {
  text-align: left;
  padding-left: clamp(0px, 1.5vw, 24px);
  padding-top: clamp(6px, 1.2vw, 14px);
}

.banner-right {
  align-self: center;
}

.banner-right-inner {
  width: 100%;
}

@media (min-width: 1200px) {
  .banner-left {
    flex: 0 0 58%;
    max-width: 58%;
  }
  .banner-right {
    flex: 0 0 42%;
    max-width: 42%;
  }
}

/* CTA row uses Bootstrap grid for reliable stacking */
.banner-cta-row {
  --banner-cta-gutter-x: clamp(10px, 1.4vw, 18px);
  --banner-cta-gutter-y: clamp(10px, 1.4vw, 18px);
  display: flex;
  flex-wrap: wrap;
  margin-left: calc(var(--banner-cta-gutter-x) * -0.5);
  margin-right: calc(var(--banner-cta-gutter-x) * -0.5);
  row-gap: var(--banner-cta-gutter-y);
}

.banner-cta-col {
  display: flex;
  flex: 0 0 100%;
  max-width: 100%;
  padding-left: calc(var(--banner-cta-gutter-x) * 0.5);
  padding-right: calc(var(--banner-cta-gutter-x) * 0.5);
}

.banner-cta-box {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  gap: 10px;
  width: 100%;
}

@media (min-width: 1200px) {
  .banner-left {
    padding-left: clamp(0px, 1.5vw, 24px);
  }
}

@media (max-width: 1199.98px) {
  .banner-left {
    padding-left: 0;
  }
}

@media (max-width: 767.98px) {
  .course-banner-section {
    padding: clamp(42px, 9vw, 62px) clamp(15px, 4vw, 25px) clamp(25px, 6vw, 35px);
  }
  .banner-left {
    padding-top: clamp(12px, 3vw, 20px);
  }
  .banner-course-description {
    margin-top: 8px;
  }
}

@media (min-width: 768px) {
  .banner-cta-col {
    flex: 0 0 50%;
    max-width: 50%;
  }
}

/* Video Styling - Fluid Sizing */
.banner-video {
  width: 100%;
  box-sizing: border-box;
}

.banner-video iframe,
.banner-video video {
  width: 100%;
  height: auto;
  min-height: clamp(200px, 25vw, 450px);
  aspect-ratio: 16 / 9;
  border-radius: clamp(8px, 1vw, 12px);
  border: clamp(3px, 0.4vw, 5px) solid #fff;
  object-fit: contain;
  box-sizing: border-box;
}

/* Image Styling - Fluid Sizing */
.banner-image {
  width: 100%;
  border-radius: clamp(8px, 1vw, 12px);
  overflow: hidden;
  box-sizing: border-box;
}

.banner-image img {
  width: 100%;
  height: auto;
  min-height: clamp(200px, 25vw, 450px);
  max-height: clamp(250px, 30vw, 500px);
  object-fit: contain;
  display: block;
  box-sizing: border-box;
}

/* Typography - Fluid Scaling */
.banner-course-title {
  font-weight: 700 !important;
  font-size: clamp(24px, 3.5vw, 42px) !important;
  line-height: clamp(32px, 4.5vw, 52px) !important;
  color: #fff;
  text-align: left;
  margin: 0 0 clamp(12px, 1.8vw, 24px) 0 !important;
  word-wrap: break-word;
}

@media (min-width: 1024px) and (max-width: 1440px) {
  .banner-course-title {
    font-size: clamp(24px, 2.6vw, 36px) !important;
    line-height: clamp(30px, 3.5vw, 46px) !important;
  }
}

.banner-course-description {
  font-weight: 400;
  font-size: clamp(14px, 1.5vw, 18px);
  line-height: 1.6;
  color: #fff;
  margin-bottom: clamp(15px, 2vw, 30px);
  text-align: left;
  word-wrap: break-word;
}

.banner-course-description p {
  margin: 0 0 clamp(12px, 1.5vw, 18px) 0;
  font-weight: 400;
  font-size: clamp(14px, 1.5vw, 18px) !important;
  line-height: 1.6;
  color: #fff !important;
}

.banner-course-description p:last-child {
  margin-bottom: 0;
}

.banner-desc-toggle-btn {
  background: none !important;
  border: none;
  color: #fff;
  cursor: pointer;
  font-size: clamp(14px, 1.5vw, 18px);
  font-weight: 600;
  padding: 0;
  margin-left: 0 !important;
  text-decoration: underline;
  text-underline-offset: 3px;
  transition: opacity 0.2s ease;
  display: inline;
}

.banner-desc-toggle-btn:hover {
  opacity: 0.85;
  text-decoration-thickness: 2px;
}

.banner-cta-title {
  margin: 0 !important;
  color: #ffffff !important;
  font-size: clamp(14px, 1.4vw, 18px) !important;
  font-weight: 500 !important;
}

/* White info strip between hero and next section */
.course-meta-strip-wrap {
  max-width: 1290px;
  margin: 0 auto;
  margin: 12px auto -40px;
  padding: 0 20px;
  position: relative;
  z-index: 7;
  box-sizing: border-box;
  display: flex;
  justify-content: center;
  transform: translateY(-50%);
}

.course-meta-strip {
  background: linear-gradient(135deg, #ffffff 0%, #f8fbff 55%, #f3f7ff 100%);
  border-radius: 16px;
  border: 1px solid #d9e2f1;
  box-shadow: 0 18px 40px rgba(15, 23, 42, 0.14);
  display: grid;
  grid-template-columns: repeat(4, minmax(0, 1fr));
  width: min(1220px, 100%);
  position: relative;
  overflow: hidden;
}

.course-meta-strip::before {
  content: "";
  position: absolute;
  inset: 0;
  background: linear-gradient(90deg, rgba(110, 115, 216, 0.08) 0%, rgba(110, 115, 216, 0) 35%, rgba(110, 115, 216, 0) 65%, rgba(110, 115, 216, 0.08) 100%);
  pointer-events: none;
}

.course-meta-item {
  padding: 26px 28px;
  border-right: 1px solid #e7ecf5;
  background: transparent;
  position: relative;
}

.course-meta-item::after {
  content: "";
  position: absolute;
  left: 18px;
  right: 18px;
  bottom: 0;
  height: 1px;
  background: rgba(148, 163, 184, 0.18);
  display: none;
}

.course-meta-item:last-child {
  border-right: none;
}

.course-meta-label {
  margin: 0 0 8px 0 !important;
  color: #334155 !important;
  font-size: 13px !important;
  text-transform: uppercase;
  letter-spacing: 0.08em;
  font-weight: 700 !important;
  line-height: 1.25;
}

.course-meta-value {
  margin: 0 !important;
  color: #0f172a !important;
  font-size: 17px !important;
  font-weight: 600 !important;
  line-height: 1.35;
}

/* === Info Boxes - Fluid with Grid Alignment === */
.banner-info-boxes {
  display: grid;
  grid-template-columns: minmax(0, 0.3fr) minmax(0, 0.35fr) minmax(0, 0.35fr);
  width: 100%;
  gap: clamp(10px, 1.2vw, 18px);
  box-sizing: border-box;
  align-items: stretch;
}

.banner-box {
  border-radius: clamp(8px, 1vw, 12px);
  padding: clamp(12px, 1.5vw, 18px) clamp(15px, 2vw, 18px);
  text-align: left;
  color: #ffffff !important;
  display: grid;
  grid-template-rows: auto auto 1fr;
  grid-template-columns: 1fr;
  gap: clamp(10px, 1.2vw, 15px);
  box-sizing: border-box;
  align-content: start;
  height: 100%;
}

/* Ensure all text in banner boxes is white */
.banner-box *,
.banner-box p,
.banner-box h3,
.banner-box h4,
.banner-box span {
  color: #ffffff !important;
}

/* Transparent for Duration Box - Fluid */
.duration-box {
  width: 100%;
  background-color: transparent;
	padding:18px 0px!important;
}

.duration-vaule {
  font-size: clamp(12px, 2.2vw, 20px) !important;
  font-weight: 600 !important;
  margin: 0px !important;
  grid-row: 2;
  min-height: clamp(28px, 3.5vw, 36px);
  display: flex;
  align-items: center;
  line-height: 1.2;
  color: #ffffff !important;
}

/* Semi-transparent for Paid Boxes - Fluid */
.individual-box,
.corporate-box {
  width: 100%;
}
	.individual-box-2{
		display:none!important;
	}

/* Box Titles - Fluid - Aligned in first row */
.banner-box-title {
  font-weight: 400 !important;
  font-size: clamp(14px, 1.4vw, 18px) !important;
  margin: 0 !important;
  color: #ffffff !important;
  grid-row: 1;
  min-height: clamp(22px, 2.8vw, 30px);
  display: flex;
  align-items: center;
  line-height: 1.4;
}

/* Box Price/Value - Aligned in second row */
.banner-box-price {
  font-weight: 600;
  font-size: clamp(18px, 2.2vw, 28px);
  line-height: 1.2;
  margin: 0 !important;
  grid-row: 2;
  min-height: clamp(28px, 3.5vw, 36px);
  display: flex;
  align-items: center;
  color: #ffffff !important;
}

.banner-box-price small {
  font-size: clamp(14px, 1.8vw, 22px);
  vertical-align: bottom;
  line-height: 1;
}

/* Buttons - Fluid - Aligned in third row */
.banner-btn {
  display: flex;
  align-items: center;
  justify-content: center;
  text-align: center;
  width: 100% !important;
  min-width: 100% !important;
  padding: clamp(10px, 1.2vw, 14px) clamp(18px, 2.2vw, 26px);
  border-radius: clamp(5px, 0.6vw, 8px);
  font-weight: 600;
  font-size: clamp(12px, 1.2vw, 16px);
  line-height: 1.2;
  white-space: nowrap;
  text-decoration: none;
  transition: all 0.3s ease;
  box-sizing: border-box;
  grid-row: 3;
  align-self: end;
  margin-top: 4px;
  min-height: clamp(38px, 4.5vw, 48px);
}

.individual-btn {
  background: #fff;
  color: #16234e !important;
  border: 2px solid #fff;
}

.corporate-btn {
  background: transparent;
  color: #fff !important;
  border: 2px solid #fff;
}

.banner-btn:hover {
  opacity: 0.9;
}

.course-banner-section .individual-box {
  display: grid !important;
}

.banner-right .banner-video .video-placeholder-youtube {
  border: clamp(3px, 0.4vw, 5px) solid #fff;
  border-radius: clamp(12px, 1.5vw, 20px);
  overflow: hidden;
  box-sizing: border-box;
  width: 100%;
}

@media (max-width: 1024px) {
  .banner-btn {
    min-height: 44px;
    padding: 10px 14px;
  }
}

@media (max-width: 599px) {
  .banner-video iframe,
  .banner-video video,
  .banner-image img {
    border-width: clamp(2px, 0.5vw, 4px);
  }
}

@media (max-width: 900px) {
  .course-meta-strip-wrap {
    margin: 14px auto -26px;
    padding: 0 12px;
    transform: translateY(-50%);
  }
  .course-meta-strip {
    grid-template-columns: repeat(2, minmax(0, 1fr));
  }
  .course-meta-item:nth-child(2n) {
    border-right: none;
  }
  .course-meta-item:nth-child(-n+2) {
    border-bottom: 1px solid #eceff4;
  }
}

/* When hero starts stacking, show meta strip as separate block */
@media (max-width: 1180px) {
  .course-meta-strip-wrap {
    margin: 24px auto 22px;
    transform: none;
  }
}

@media (max-width: 599px) {
  .course-meta-strip {
    grid-template-columns: 1fr;
  }
  .course-meta-item {
    border-right: none;
    border-bottom: 1px solid #eceff4;
    padding: 20px 18px;
  }
  .course-meta-item:last-child {
    border-bottom: none;
  }
  .course-meta-label {
    font-size: 12px !important;
  }
  .course-meta-value {
    font-size: 15px !important;
    font-weight: 600 !important;
  }
  .course-meta-item:last-child .course-meta-value {
    font-size: 13px !important;
    line-height: 1.3;
  }
}

</style>

<?php
// Enhanced Media Detection Function
function detect_media_type($raw_media) {
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
            'url' => 'https://www.youtube.com/embed/' . $yt_id,
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
            'url' => 'https://player.vimeo.com/video/' . $vimeo_id,
            'id' => $vimeo_id
        ];
    }

    // Video file detection (mp4, webm, ogg, mov, avi)
    if (preg_match('/\.(mp4|webm|ogg|ogv|mov|avi|wmv|flv)$/i', $raw_media)) {
        $video_type = 'video/mp4';
        if (preg_match('/\.(webm)$/i', $raw_media)) $video_type = 'video/webm';
        elseif (preg_match('/\.(ogg|ogv)$/i', $raw_media)) $video_type = 'video/ogg';
        
        return [
            'type' => 'video',
            'url' => $raw_media,
            'id' => '',
            'video_type' => $video_type
        ];
    }

    // Image detection (jpg, png, gif, webp, svg, bmp)
    if (preg_match('/\.(jpg|jpeg|png|gif|webp|svg|bmp|ico)$/i', $raw_media)) {
        return [
            'type' => 'image',
            'url' => $raw_media,
            'id' => ''
        ];
    }

    // Unknown → treat as image (for URLs without extension)
    return [
        'type' => 'image',
        'url' => $raw_media,
        'id' => ''
    ];
}

// Resolve image alt text from WordPress media library URL.
function get_media_alt_from_url($url, $fallback = '') {
    if (empty($url)) return $fallback;

    $attachment_id = attachment_url_to_postid($url);
    if ($attachment_id) {
        $alt = trim((string) get_post_meta($attachment_id, '_wp_attachment_image_alt', true));
        if ($alt !== '') return $alt;

        $title = trim((string) get_the_title($attachment_id));
        if ($title !== '') return $title;
    }

    return $fallback;
}

$raw_media = $meta['video_url'] ?? '';
$media_info = detect_media_type($raw_media);
$media_type = $media_info['type'];
$media_final = $media_info['url'];
$media_id = $media_info['id'] ?? '';
$video_type = $media_info['video_type'] ?? 'video/mp4';
$course_title_display = trim((string) ($meta['course_title'] ?? ''));
if ($course_title_display === '') {
    $course_title_display = trim((string) get_the_title($course_id));
}
$hero_media_alt = get_media_alt_from_url($media_final, $course_title_display !== '' ? $course_title_display . ' course image' : 'Course image');

$duration_title = trim((string) ($meta['duration_title'] ?? ''));
$course_price_title = trim((string) ($meta['course_price_title'] ?? ''));
$course_level_title = trim((string) ($meta['course_level_title'] ?? ''));
$course_category_title = trim((string) ($meta['course_category_title'] ?? ''));
$duration_value = trim((string) ($meta['duration_value'] ?? ''));
$individual_title = trim((string) ($meta['individual_title'] ?? ''));
$individual_price = trim((string) ($meta['individual_price'] ?? ''));
$individual_currency_symbol = trim((string) ($meta['individual_currency_symbol'] ?? ''));
$individual_btn_text = trim((string) ($meta['individual_btn_text'] ?? ''));
$individual_btn_url = trim((string) ($meta['individual_btn_url'] ?? ''));
$corporate_title = trim((string) ($meta['corporate_title'] ?? ''));
$corporate_btn_text = trim((string) ($meta['corporate_btn_text'] ?? ''));
$corporate_btn_url = trim((string) ($meta['corporate_btn_url'] ?? ''));
$course_level_value = trim((string) ($meta['course_level'] ?? ''));
$course_category_value = trim((string) ($meta['course_category'] ?? ''));
$individual_has_price = ($individual_price !== '' || $individual_currency_symbol !== '');
$individual_btn_text_display = $individual_btn_text;
$individual_btn_url_display = ($individual_btn_url !== '') ? $individual_btn_url : $corporate_btn_url;
$individual_has_button = ($individual_btn_text !== '' && $individual_btn_url_display !== '');
$corporate_has_button = ($corporate_btn_text !== '' && $corporate_btn_url !== '');
$course_duration_display = ($duration_value !== '') ? $duration_value : '-';
$course_price_display = ($individual_has_price)
  ? trim($individual_currency_symbol . ' ' . $individual_price)
  : '-';
$course_level_display = ($course_level_value !== '') ? $course_level_value : '-';
$course_category_display = ($course_category_value !== '') ? $course_category_value : '-';
$course_duration_label_display = ($duration_title !== '') ? $duration_title : 'Course Duration';
$course_price_label_display = ($course_price_title !== '') ? $course_price_title : 'Course Price';
$course_level_label_display = ($course_level_title !== '') ? $course_level_title : 'Course Level';
$course_category_label_display = ($course_category_title !== '') ? $course_category_title : 'Course Category';
$meta_strip_accent = '#6e73d8';
if ($banner_bg_hex !== '') {
  $meta_strip_accent = $banner_bg_hex;
} elseif ($banner_bg_rgb !== '') {
  $meta_strip_accent = $banner_bg_rgb;
} elseif ($banner_gradient !== '' && preg_match('/#(?:[0-9a-fA-F]{3}){1,2}/', $banner_gradient, $accent_match)) {
  $meta_strip_accent = $accent_match[0];
}
?>

<section class="course-banner-section" style="background: <?php echo esc_attr($banner_bg); ?>;">
  <div class="course-banner-container container">
    <div class="row course-banner-row">

    <!-- LEFT SIDE -->
    <div class="banner-left col-12 col-xl-7">
      <h1 class="banner-course-title">
        <?php echo esc_html($course_title_display); ?>
      </h1>

      <?php
        $desc_text = $meta['course_description'] ?? '';
        
        // Always process with wpautop to ensure paragraphs are created from line breaks
        if (!empty($desc_text)) {
          // Process with wpautop to convert line breaks to paragraphs
          // This handles cases where editor saved plain text or <br> tags
          $desc_text = wpautop($desc_text);
          // Clean up any double paragraph tags that might occur
          $desc_text = preg_replace('/<p>\s*<\/p>/i', '', $desc_text);
        }
        
        $desc_limit = 320;
        
        // Strip HTML tags for character counting
        $desc_plain = wp_strip_all_tags($desc_text);
        
        if (!empty($desc_text) && mb_strlen($desc_plain) > $desc_limit):
          // Extract paragraphs and build excerpt
          $paragraphs = preg_split('/<\/p>/i', $desc_text, -1, PREG_SPLIT_DELIM_CAPTURE);
          $excerpt_html = '';
          $current_length = 0;
          
          for ($i = 0; $i < count($paragraphs); $i++) {
            $para = $paragraphs[$i];
            $para_plain = wp_strip_all_tags($para);
            $para_length = mb_strlen($para_plain);
            
            if ($current_length + $para_length <= $desc_limit) {
              // Include full paragraph
              $excerpt_html .= $para . '</p>';
              $current_length += $para_length;
            } else {
              // Need to truncate this paragraph
              $remaining = $desc_limit - $current_length;
              if ($remaining > 50) {
                // Extract text from paragraph
                $para_text = wp_strip_all_tags($para);
                $truncated = mb_substr($para_text, 0, $remaining);
                // Try to break at sentence or word
                $last_period = mb_strrpos($truncated, '.');
                $last_space = mb_strrpos($truncated, ' ');
                
                if ($last_period !== false && $last_period > $remaining * 0.6) {
                  $truncated = mb_substr($para_text, 0, $last_period + 1);
                } elseif ($last_space !== false) {
                  $truncated = mb_substr($para_text, 0, $last_space);
                }
                
                // Preserve paragraph tag if it exists
                if (preg_match('/<p[^>]*>/i', $para, $matches)) {
                  $excerpt_html .= $matches[0] . esc_html($truncated) . '...</p>';
                } else {
                  $excerpt_html .= '<p>' . esc_html($truncated) . '...</p>';
                }
              }
              break;
            }
          }
      ?>
        <div class="banner-course-description">
          <div id="desc-short"><?php echo wp_kses_post($excerpt_html); ?></div>
          <div id="desc-full" style="display:none;"><?php echo wp_kses_post($desc_text); ?></div>
          <button id="banner-read-more" class="banner-desc-toggle-btn">Read more</button>
          <button id="banner-read-less" class="banner-desc-toggle-btn" style="display:none;">Read less</button>
        </div>
      <?php else: ?>
        <div class="banner-course-description">
          <?php echo wp_kses_post($desc_text); ?>
        </div>
      <?php endif; ?>

      <?php if ($individual_has_button || $corporate_has_button): ?>
      <div class="banner-cta-row row row-cols-1 row-cols-md-2">
        <?php if ($individual_has_button): ?>
        <div class="banner-cta-col col">
          <div class="banner-cta-box">
          <h3 class="banner-cta-title"><?php echo esc_html($individual_title !== '' ? $individual_title : 'For Individual'); ?></h3>
          <a href="<?php echo esc_url($individual_btn_url_display); ?>" class="banner-btn individual-btn" target="_blank" rel="noopener noreferrer">
            <?php echo esc_html($individual_btn_text_display); ?>
          </a>
          </div>
        </div>
        <?php endif; ?>

        <?php if ($corporate_has_button): ?>
        <div class="banner-cta-col col">
          <div class="banner-cta-box">
          <h3 class="banner-cta-title"><?php echo esc_html($corporate_title !== '' ? $corporate_title : 'For Corporate'); ?></h3>
          <a href="<?php echo esc_url($corporate_btn_url); ?>" class="banner-btn corporate-btn" target="_blank" rel="noopener noreferrer">
            <?php echo esc_html($corporate_btn_text); ?>
          </a>
          </div>
        </div>
        <?php endif; ?>
      </div>
      <?php endif; ?>
    </div>

    <!-- RIGHT SIDE (MEDIA) -->
    <div class="banner-right col-12 col-xl-5">
      <div class="banner-right-inner">

      <?php if ($media_type == 'youtube'): ?>
        <div class="banner-video">
          <iframe 
              src="<?php echo esc_url($media_final); ?>" 
              frameborder="0" 
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
              allowfullscreen 
              loading="lazy"></iframe>
        </div>

      <?php elseif ($media_type == 'vimeo'): ?>
        <div class="banner-video">
          <iframe 
              src="<?php echo esc_url($media_final); ?>?title=0&byline=0&portrait=0" 
              frameborder="0" 
              allow="autoplay; fullscreen; picture-in-picture"
              allowfullscreen 
              loading="lazy"></iframe>
        </div>

      <?php elseif ($media_type == 'video'): ?>
        <div class="banner-video">
          <video controls style="width:100%; height:auto; border-radius:10px;">
            <source src="<?php echo esc_url($media_final); ?>" type="<?php echo esc_attr($video_type); ?>">
            Your browser does not support the video tag.
          </video>
        </div>

      <?php elseif ($media_type == 'image'): ?>
        <div class="banner-image">
          <img src="<?php echo esc_url($media_final); ?>" 
               alt="<?php echo esc_attr($hero_media_alt); ?>"
               style="width:100%; height:auto; object-fit:contain; border-radius:10px; display:block;">
        </div>

      <?php endif; ?>

      </div>
    </div>

    </div>
  </div>
</section>

<div class="course-meta-strip-wrap">
  <div class="course-meta-strip" style="--meta-accent: <?php echo esc_attr($meta_strip_accent); ?>;">
    <div class="course-meta-item">
      <p class="course-meta-label"><?php echo esc_html($course_duration_label_display); ?></p>
      <p class="course-meta-value"><?php echo esc_html($course_duration_display); ?></p>
    </div>
    <div class="course-meta-item">
      <p class="course-meta-label"><?php echo esc_html($course_price_label_display); ?></p>
      <p class="course-meta-value"><?php echo esc_html($course_price_display); ?></p>
    </div>
    <div class="course-meta-item">
      <p class="course-meta-label"><?php echo esc_html($course_level_label_display); ?></p>
      <p class="course-meta-value"><?php echo esc_html($course_level_display); ?></p>
    </div>
    <div class="course-meta-item">
      <p class="course-meta-label"><?php echo esc_html($course_category_label_display); ?></p>
      <p class="course-meta-value"><?php echo esc_html($course_category_display); ?></p>
    </div>
  </div>
</div>



<script>
document.addEventListener('DOMContentLoaded', function() {
  // Read more/Read less functionality
  const rm = document.getElementById('banner-read-more');
  const rl = document.getElementById('banner-read-less');
  const ds = document.getElementById('desc-short');
  const df = document.getElementById('desc-full');
  
  if (rm && rl && ds && df) {
    rm.addEventListener('click', function(e) {
      e.preventDefault();
      ds.style.display = 'none';
      df.style.display = 'block';
      rm.style.display = 'none';
      rl.style.display = 'inline';
    });
    
    rl.addEventListener('click', function(e) {
      e.preventDefault();
      ds.style.display = 'block';
      df.style.display = 'none';
      rm.style.display = 'inline';
      rl.style.display = 'none';
    });
  }

  // Removed sticky positioning JavaScript - using CSS sticky instead
  // The CSS position: sticky with top: var(--scroll-sticky-offset) will handle it automatically
});
</script>



<?php
$contact_shortcode = '[succeedlearn_course_form]';
?>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
<style>
/* Force top spacing for LearnPress course template only */
.single-lp_course.lp_course-template-default #wrapper-container #main-content {
  margin-top: 24px !important;
}

.course-layout-shell {
  max-width: 1290px;
  margin: 24px auto 60px;
  display: block;
  padding: 0 20px;
  box-sizing: border-box;
}

.course-layout-main {
  min-width: 0;
}

.scroll-section {
  box-sizing: border-box;
  margin-top: 30px;
  width: 100%;
}

/* Responsive safety guards for content-heavy sections */
.scroll-section img,
.scroll-section video,
.scroll-section iframe,
.scroll-section svg,
.course-contact-us-section img,
.course-contact-us-section video,
.course-contact-us-section iframe,
.faq-section img,
.faq-section video,
.faq-section iframe {
  max-width: 100%;
  height: auto;
}

.scroll-section table,
.laws-content table,
.advanced-content table,
.custom-output-content table,
.codegrid-item-content table,
.extra-info-item-desc table {
  display: block;
  width: 100%;
  max-width: 100%;
  overflow-x: auto;
  -webkit-overflow-scrolling: touch;
}

.scroll-section pre,
.laws-content pre,
.advanced-content pre,
.custom-output-content pre,
.codegrid-item-content pre,
.extra-info-item-desc pre {
  max-width: 100%;
  overflow-x: auto;
  white-space: pre;
}

.scroll-section p,
.scroll-section li,
.laws-content p,
.laws-content li,
.advanced-content p,
.advanced-content li,
.custom-output-content p,
.custom-output-content li,
.codegrid-item-content p,
.codegrid-item-content li,
.extra-info-item-desc p,
.extra-info-item-desc li {
  overflow-wrap: anywhere;
  word-break: break-word;
}

.scroll-container {
  width: 100%;
  max-width: 1290px;
  margin: 0 auto;
  box-sizing: border-box;
}

@media (max-width: 1024px) {
  .scroll-section {
    padding: 60px 20px 40px;
  }
}


.objectives,
.objectives-section *,
.objectives-section,
.objectives * {
  text-align: left !important;
  margin-left: 0 !important;
  margin-right: 0 !important;
  justify-content: flex-start !important;
  align-items: flex-start !important;
}
	.objectives-section{
		padding:0px 30px 0px 30px!important;
	}

.scroll-left {
  width: 100%;
  max-width: 100%;
  max-height: none;
  overflow: visible;
  padding-right: 0;
  box-sizing: border-box;
}

.objectives-title {
font-family: 'Open Sans', sans-serif;
  font-size: 32px !important;
  font-weight: 600 !important;
  color: #1a1a1a;
}

.objectives-desc {
	font-family: 'Open Sans', sans-serif;
  margin-bottom: 20px;
}
.objectives-content {
}

/* Right sticky sidebar - HIDDEN */
.scroll-right {
  display: none !important;
}

/* Ensure all text elements in scroll-right are white */
.scroll-right p,
.scroll-right h3,
.scroll-right h4,
.scroll-right span,
.scroll-right .scroll-box-title,
.scroll-right .scroll-box-price,
.scroll-right .duration-title,
.scroll-right .duration-value,
.scroll-right .duration-line {
  color: #ffffff !important;
}

@media (max-width: 1366px) {
  .scroll-right {
    top: var(--scroll-sticky-offset) !important;
  }
}

@media (max-width: 1200px) {
  .scroll-right {
    top: var(--scroll-sticky-offset) !important;
  }
}

.scroll-right-video iframe,
.scroll-right-video video {
  width: clamp(220px, 18vw, 320px);
  height: clamp(140px, 12vw, 220px);
  border-radius: 12px;
  border: 2px solid #fff;
  margin: 0 auto 10px;
}
.scroll-right .scroll-right-video .video-placeholder-youtube {
  border: 3px solid #fff;       
  border-radius: 16px;       
  overflow: hidden;            
  box-sizing: border-box;
  width: clamp(220px, 18vw, 320px);
  height: clamp(140px, 12vw, 220px);
  margin: 0 auto;
}

.scroll-right-media img {
  width: clamp(220px, 18vw, 320px);
  max-width: 100%;
  max-height: clamp(150px, 12vw, 220px);
  height: auto;
  object-fit: contain;
  margin: 0 auto 10px;
  display: block;
}
	.scroll-box{
		min-height:120px;
		display:flex;
		flex-direction:column;
	}
.scroll-right .scroll-box-title {
  font-size: clamp(16px, 1.2vw, 20px);
}

.scroll-right .scroll-box-price {
  font-size: clamp(18px, 1.4vw, 22px);
}

.scroll-right .banner-btn {
  font-size: clamp(13px, 1vw, 16px);
  width: auto;
  min-width: auto;
  padding: clamp(8px, 1vw, 12px) clamp(16px, 1.8vw, 24px);
  align-self: center;
}

@media (max-width: 1280px) and (min-width: 901px) {
  .scroll-right {
    padding: clamp(14px, 1.4vw, 22px);
    gap: clamp(8px, 1vw, 16px);
  }
  .scroll-right-video iframe,
  .scroll-right-video video,
  .scroll-right .scroll-right-video .video-placeholder-youtube {
    width: clamp(210px, 32vw, 260px);
    height: clamp(130px, 20vw, 170px);
  }
  .scroll-right-media img {
    width: auto;
    max-width: clamp(210px, 34vw, 260px);
    max-height: 100px;
	  margin:0px;
  }
  .scroll-right .scroll-box-title {
    font-size: clamp(14px, 1.6vw, 17px);
  }
  .scroll-right .scroll-box-price {
    font-size: clamp(16px, 2vw, 19px);
  }
  .scroll-right .banner-btn {
    font-size: 14px;
    width: auto;
    min-width: auto;
    padding: 8px 18px;
  }
}

@media (max-width: 900px) {
  .scroll-right-video iframe,
  .scroll-right-video video,
  .scroll-right .scroll-right-video .video-placeholder-youtube {
    width: clamp(200px, 60vw, 260px);
    height: clamp(120px, 35vw, 150px) !important;
  }
  .scroll-right-media img {
    max-height: 150px;
    width: auto;
    margin: 0 auto 10px;
    display: block;
  }
  .scroll-right .scroll-box-title {
    font-size: clamp(14px, 3vw, 18px);
  }
  .scroll-right .scroll-box-price {
    font-size: clamp(16px, 4vw, 20px);
  }
  .scroll-right .banner-btn {
    font-size: 13px;
    padding: 8px 16px;
    min-width: auto;
    width: auto;
  }
}

.scroll-right-duration {
  font-size: 16px;
  margin-bottom: 20px;
  color: #fff;
}

/* Box styles (reuse banner style but stacked) */
.scroll-right-boxes {
  display: flex;
  flex-wrap: wrap;         
  justify-content: center;   
  align-items: center;        
  gap: 20px;                  
  text-align: center;         

}


.scroll-box {
  text-align: left;
  padding: 20px;
}

.scroll-right .scroll-box {
  padding: clamp(12px, 1.2vw, 18px);
}
.scroll-box-title {
  font-size: 20px;
  font-weight: 400 !important;
  color: #fff;
  margin: 0px !important;
	margin-bottom:8px !important;
}

.sticky-box-title {
  font-size: 16px !important;
  font-weight: 500 !important;
  margin-bottom: 6px !important;
}

.scroll-box-price {
  font-size: 24px;
  font-weight: 700;
  color: #fff;
  margin-bottom:5px;
  margin:0px !important;
}

.scroll-box-price small {
  font-size: 20px;
  vertical-align: bottom;
}
.scroll-btn{
	min-width:100% !important;
	text-align:center!important;
	margin-top:12px;
	}	
.duration-box-2 {
  margin-bottom: 0rem;
  text-align: center;
  padding:0px !important;
	width:100% !important;
	min-width:100% !important;
}

.duration-line {
  display: inline-block;
  font-family: inherit;
  font-size: inherit; 
  font-weight: 600; 
  color: #ffffff; 
}

.duration-title {
  font-weight: 400;
  margin-right: 6px;
  color: #ffffff !important;
}

.duration-value {
  font-weight: 500;
  color: #ffffff !important;
}


.individual-box-2,
.corporate-box-2 {
	width: 90%;
	justify-content:space-between;
	width:100% !important;
	min-width:100% !important;
}
	
.objectives {
  width: 60%;
  margin: 0 auto 40px auto;  
  color: #000000;
  text-align: left;

}

.why-this-course{
	padding:30px;
	margin-top:40px !important;
}	
	
.extra-info-section {
  text-align: left;
}

.extra-info-title {
  font-weight: 600 !important;
  font-style: SemiBold;
  font-size: 32px !important;
  text-align: left;
	margin:0px;
}

.extra-info-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 0px 40px;
  margin: 0 auto;
  align-items: stretch;
}

.extra-info-item {
  background: #fff;
  padding: 20px 0px;
  display: flex;
  flex-direction: column;
}

/* Responsive gap for extra-info-grid */
@media (max-width: 768px) {
  .extra-info-grid {
    grid-template-columns: 1fr;
    gap: 20px;
  }
}

.extra-info-item-title {
  font-weight: 600;
  font-size: 18px!important;
  line-height: 24px;
  margin: 0px !important;
  text-align: left;
}

.extra-info-item-desc {
  text-align: left;
  margin: 8px 0px !important;
}

	.laws-section{
		margin-top:30px;
	}
.laws-title {
  font-weight: 600 !important;
  font-style: normal;
  font-size: 32px !important;
  line-height: 100%;
  letter-spacing: 0;
  text-align: left;
  margin-bottom: 10px;
	margin-top:0px!important;
}

.laws-description {
  text-align: left;
  margin-bottom: 20px;
}

.laws-content {
  text-align: left;
}

	
.custom-slider-container {
  width: 100%;
  overflow: hidden;
  position: relative;
  margin: 40px 0;
  padding: 20px 20px 20px 30px!important;
  box-sizing: border-box;
  border-radius: 16px;
  max-height:450px!important;
}

.custom-slider-wrapper {
  display: flex;
  transition: transform 0.6s ease;
}

.custom-slide {
  flex: 0 0 50%; 
  padding: 10px;
  box-sizing: border-box;
  display: flex;
  justify-content: center;
  align-items: center;
	max-height:200px!important;
}
.custom-slide img {
  width: 90%;         
  height: auto;       
  object-fit: contain; 
  border-radius: 12px;
  display: block;
  transition: transform 0.3s ease;
}

.custom-slide img:hover {
  transform: scale(1.05); 
}




	
	.course-details-container {
  margin-top: 40px;
  padding: 20px;
}

.course-detail-block {
  margin-bottom: 40px;
}

.course-detail-title {
	font-family: 'Open Sans', sans-serif;
  font-size: 28px;
  font-weight: 600;
  margin-bottom: 15px;
}

.course-detail-content {
	font-family: 'Open Sans', sans-serif;
  font-size: 17px;
  line-height: 1.6;
  color:#1a1a1a;
}
	
/* ==== Custom Dynamic Section Styles ==== */

.custom-dynamic-section {
  margin-top: 40px;
  padding: 30px 30px 0px 30px;
  background: #fff;
}

.custom-dynamic-section .custom-section-title {
font-family: 'Open Sans', sans-serif;
  font-weight: 600 !important;
  font-style: SemiBold;
  font-size: 32px !important;
  line-height: 100%;
  text-align: left;
	margin:0px;
  margin-bottom: 30px!important;
}

.custom-dynamic-section .custom-subsection {
  margin-bottom: 30px;
}

.custom-dynamic-section .subsection-title {
  font-size: 18px;
  font-weight: 600;
  margin-top:12px !important;
	margin-bottom:8px!important;
}

.custom-dynamic-section .subsection-content {
}
.custom-dynamic-section .subsection-content img {
  max-width: 100%;
  height: auto;
  border-radius: 10px;
  display: block;
  margin: 15px 0;
}

/* Responsive */
@media (max-width: 768px) {
  .custom-dynamic-section {
    padding: 20px 15px;
  }
  .custom-dynamic-section .custom-section-title {
    font-size: 28px !important;
  }
  .custom-dynamic-section .subsection-title {
    font-size: 22px;
  }
}
	
	
	
.advanced-section {
  padding: 30px;
  border-radius: 12px;
  margin: 40px 0 0 0;
  color: #ffffff !important;
  transition: background 0.4s ease;
}

/* Ensure all text elements in advanced-section are white */
.advanced-section p,
.advanced-section li,
.advanced-section ul,
.advanced-section ol,
.advanced-section h2,
.advanced-section h3,
.advanced-section h4,
.advanced-section h5,
.advanced-section h6,
.advanced-section span,
.advanced-section div,
.advanced-section strong,
.advanced-section em,
.advanced-section b,
.advanced-section i {
  color: #ffffff !important;
}

/* But allow links and buttons to have their own styling */
.advanced-section a {
  color: #ffffff !important;
  text-decoration: underline;
}

.advanced-section h2 {
	font-family: 'Open Sans', sans-serif;
  font-size: 32px !important;
  font-weight: 600 !important;
  margin-bottom: 20px;
	margin:0px;
}

.advanced-section .description {
	font-family: 'Open Sans', sans-serif;
  color: #ffffff;
  margin-bottom: 20px;
}
.advanced-section .description p {
  color: #ffffff !important;
}

.advanced-section .advanced-content {
	font-family: 'Open Sans', sans-serif;
  margin-bottom: 0px;
}
.advanced-section .advanced-content p {
  color: #ffffff !important;
}

.advanced-section .advanced-content img {
  max-width: 100%;
  border-radius: 10px;
  margin: 15px 0;
  display: block;
}
	
	
.custom-output-section {
  padding: 40px 30px 0px 30px;
  margin: 0;
}



.custom-output-section h2 {
  font-weight: 600 !important;
  font-style: normal;
  font-size: 32px !important;
  line-height: 100%;
  letter-spacing: 0;
  margin-bottom: 15px;
}

.custom-output-section .description {
	font-family: 'Open Sans', sans-serif;
  margin-bottom: 20px;
}

.custom-output-section .custom-output-content {
}

.custom-output-section .custom-output-content img {
  max-width: 100%;
  border-radius: 10px;
  display: block;
  margin: 15px 0;
}
	
.codegrid-item-content ul {
  list-style-type: disc;       
  padding-left: 25px;         
  margin: 15px 0;             
}

.codegrid-item-content ul li {    
  padding-left: 5px;           
  line-height: 32px;           
  font-size: 16px;             
  color: #1a1a1a;                 
  position: relative;
  transition: all 0.2s ease;
}

.laws-content ul,
.custom-output-section .custom-output-content ul {
  padding-left: 25px;
  margin: 15px 0;
}

.laws-content ul li,
.custom-output-section .custom-output-content ul li {
  line-height: 1.7;
  margin-bottom: 0px;
}

.custom-codegrid-section {
    text-align: left;
	padding:30px 30px 40px 30px !important;
}

.custom-codegrid-section .codegrid-main-title {
    font-weight: 600;
    font-size: 32px;
    line-height: 1.3;
    margin-bottom: 25px;
    text-align: left;
}
  
    .custom-codegrid-section .codegrid-list {
      display: grid;
      grid-template-columns: 1fr;
    }

  .custom-codegrid-section .codegrid-item {
  background: #fff;
  display: flex;
  flex-direction: column;
  margin-bottom:12px;
    }

    .custom-codegrid-section .codegrid-item-title {
  font-weight: 600;
  font-size: 16px;
  line-height: 24px;
  margin: 0px !important;
  margin-bottom:12px !important;
  text-align: left;
}

    @media (max-width: 768px) {
      .custom-codegrid-section .codegrid-list {
        grid-template-columns: 1fr;
      }
    }


</style>

<div class="course-layout-shell">
  <div class="course-layout-main">

<section class="scroll-section">
  <div class="scroll-container">
    <!-- Left Scrollable Content -->
    <div class="scroll-left">
		
		<div class="objectives-section">
      <h2 class="objectives-title">
        <?php echo esc_html($meta['objectives_section_title'] ?? ''); ?>
      </h2>
      <div class="objectives-desc">
        <?php 
        $objectives_desc = $meta['objectives_section_description'] ?? '';
        if (!empty($objectives_desc)) {
          $objectives_desc = wpautop($objectives_desc);
          $objectives_desc = preg_replace('/<p>\s*<\/p>/i', '', $objectives_desc);
        }
        echo wp_kses_post($objectives_desc); 
        ?>
      </div>
      <div class="objectives-content">
  <?php 
  $objectives_content = $meta['objectives_section_content'] ?? '';
  
  // Convert line breaks to paragraphs
  if (!empty($objectives_content)) {
    $objectives_content = wpautop($objectives_content);
    $objectives_content = preg_replace('/<p>\s*<\/p>/i', '', $objectives_content);
  }

  // Allow full HTML formatting (lists, bold, paragraphs, etc.)
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
<div class="why-this-course">
<!-- ====== Extra Info Section (Below Objectives) ====== -->
<div class="extra-info-section">
  <?php 
    $extra_title = $meta['extra_info_title'] ?? '';
    $extra_title_color = $meta['extra_info_title_color'] ?? '';
    $grid_title_color = $meta['extra_info_grid_title_color'] ?? '';
    $grid_items = $meta['extra_info_grid'] ?? [];
  ?>

  <?php if ($extra_title): ?>
    <h2 class="extra-info-title" style="color: <?php echo esc_attr($extra_title_color ?: '#000'); ?>;">
      <?php echo esc_html($extra_title); ?>
    </h2>
  <?php endif; ?>

  <?php if (!empty($grid_items) && is_array($grid_items)): ?>
    <div class="extra-info-grid">
      <?php foreach ($grid_items as $item): ?>
        <?php 
          $item_title = trim($item['title']);
          $item_desc  = trim($item['desc']);
          // Show item if title exists (even if description is empty)
          if ($item_title === '' && $item_desc === '') continue; 
        ?>
        <div class="extra-info-item">
          <?php if ($item_title): ?>
            <h3 class="extra-info-item-title" style="color: <?php echo esc_attr($grid_title_color ?: '#000'); ?>;">
              <?php echo esc_html($item_title); ?>
            </h3>
          <?php endif; ?>
          <?php if ($item_desc): ?>
            <div class="extra-info-item-desc">
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
</div>

<!-- ======= Laws & Regulations Section ======= -->
<div class="laws-section">
  <?php 
    $laws_title = $meta['laws_section_title'] ?? '';
    $laws_description = $meta['laws_section_description'] ?? '';
    $laws_content = $meta['laws_section_content'] ?? '';
  ?>

  <?php if (!empty($laws_title)) : ?>
    <h2 class="laws-title"><?php echo esc_html($laws_title); ?></h2>
  <?php endif; ?>

  <?php if (!empty($laws_description)) : ?>
    <div class="laws-description">
      <?php 
      if (!empty($laws_description)) {
        $laws_description = wpautop($laws_description);
        $laws_description = preg_replace('/<p>\s*<\/p>/i', '', $laws_description);
      }
      echo wp_kses_post($laws_description); 
      ?>
    </div>
  <?php endif; ?>

  <div class="laws-content">
    <?php 
    // Convert line breaks to paragraphs
    if (!empty($laws_content)) {
      $laws_content = wpautop($laws_content);
      $laws_content = preg_replace('/<p>\s*<\/p>/i', '', $laws_content);
    }
    // Allow safe HTML including inline CSS and tables etc.
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
</div>	
	</div>

<?php 
$carousel_title = $meta['carousel_section_title'] ?? '';
$carousel_title_color = $meta['carousel_section_title_color'] ?? '';
$carousel_bg = $meta['carousel_section_bg'] ?? '';
$carousel_images = $meta['carousel_section_images'] ?? [];
?>

<?php if (!empty($carousel_images) && is_array($carousel_images)) : ?>
<div class="custom-slider-container" style="background: <?php echo esc_attr($carousel_bg ?: 'linear-gradient(90deg, #576094, #915EBD)'); ?>; padding:40px 0;">
  
  <?php if (!empty($carousel_title)) : ?>
    <h2 class="carousel-title" style="color: <?php echo esc_attr($carousel_title_color ?: '#fff'); ?>; font-size:32px !important; font-weight:600 !important; text-align:left; margin-top:0px;">
      <?php echo esc_html($carousel_title); ?>
    </h2>
  <?php endif; ?>

  <div class="custom-slider-wrapper">
    <div class="custom-slider-track">
      <?php foreach ($carousel_images as $index => $image_url) : ?>
        <?php if (!empty($image_url)) : ?>
          <?php
            $carousel_alt_fallback = ($course_title_display !== '' ? $course_title_display : 'Course') . ' slide ' . ($index + 1);
            $carousel_image_alt = get_media_alt_from_url($image_url, $carousel_alt_fallback);
          ?>
          <div class="custom-slide">
            <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($carousel_image_alt); ?>" class="slider-image" loading="eager" fetchpriority="<?php echo $index < 2 ? 'high' : 'auto'; ?>" decoding="async" />
          </div>
        <?php endif; ?>
      <?php endforeach; ?>
    </div>
  </div>

  <div class="slider-controls">
    <button class="prev-slide" aria-label="Previous slide">
      <span class="slider-arrow-icon slider-arrow-icon--prev" aria-hidden="true"></span>
    </button>
    <button class="next-slide" aria-label="Next slide">
      <span class="slider-arrow-icon slider-arrow-icon--next" aria-hidden="true"></span>
    </button>
  </div>
</div>

<!-- Fullscreen Viewer -->
<div class="fullscreen-viewer">
  <div class="fullscreen-toolbar">
    <span class="fullscreen-counter">1 / 1</span>
  </div>
  <button class="fullscreen-cursor-close" aria-label="Close fullscreen">×</button>
  <button class="fullscreen-prev">‹</button>
  <img class="fullscreen-image" src="" alt="Full View">
  <button class="fullscreen-next">›</button>
</div>

<style>
/* ==== Slider ==== */
.custom-slider-wrapper {
  overflow: hidden;
  position: relative;
  width: 100%;
  margin: 20px 0;
}
.custom-slider-container {
  max-height: none !important;
}
.custom-slider-track {
  display: flex;
  gap: clamp(10px, 1.2vw, 18px);
  transition: transform 0.6s ease-in-out;
  will-change: transform;
  cursor: grab;
  user-select: none;
}
.custom-slider-track.is-dragging { cursor: grabbing; }
.custom-slider-track.is-loading {
  pointer-events: none;
}
.custom-slider-track.is-loading .slider-image {
  opacity: 0.01;
}
.custom-slide {
  flex: 0 0 calc((100% - 4%) / 3);
  flex-shrink: 0;
  border-radius: 12px;
  overflow: hidden;
  box-sizing: border-box;
  display: flex;
  align-items: center;
  justify-content: center;
  min-height: 200px;
}
.slider-image {
  width: 100%;
  height: auto;
  max-height: 240px;
  object-fit: contain;
  object-position: center;
  border-radius: 12px;
  cursor: zoom-in;
  transition: transform 0.3s ease, opacity 0.25s ease;
  background-color: transparent;
}
.slider-image:hover {
  transform: scale(1.05);
}



.slider-controls {
  display: flex;
  justify-content: flex-end;
  gap: 10px;
  margin-top: 20px;
}
.slider-controls button {
  display: flex;
  font-size: 32px;
  font-weight:500!important;
  background: #FFFFFF33!important;  
  cursor: pointer;
  margin: 0 !important;
  padding:0 !important;
  align-items: center!important; 
  justify-content: center!important;
  line-height: 1;
  width: 52px;
  height: 52px;
}

.slider-arrow-icon {
  display: inline-block;
  width: 24px;
  height: 24px;
  background-repeat: no-repeat;
  background-position: center;
  background-size: contain;
}

.slider-arrow-icon--prev {
  background-image: url('https://succeedlearn.com/wp-content/uploads/2025/11/LA.svg');
}

.slider-arrow-icon--next {
  background-image: url('https://succeedlearn.com/wp-content/uploads/2025/11/RA.svg');
}

/* ==== Fullscreen View ==== */
.fullscreen-viewer {
  --fs-header-offset: 88px;
  --fs-side-gap: 88px;
  --fs-bottom-gap: 28px;
  position: fixed;
  inset: 0;
  background: radial-gradient(circle at 50% 20%, rgba(30, 30, 45, 0.65), rgba(5, 5, 10, 0.96));
  backdrop-filter: blur(6px);
  display: none;
  justify-content: center;
  align-items: center;
  z-index: 99999;
  padding: calc(var(--fs-header-offset) + 22px) var(--fs-side-gap) var(--fs-bottom-gap);
}
.fullscreen-viewer.active {
  display: flex;
}
.fullscreen-toolbar {
  position: absolute;
  top: calc(var(--fs-header-offset) + 8px);
  left: 50%;
  transform: translateX(-50%);
  display: flex;
  align-items: center;
  gap: 14px;
  padding: 8px 10px 8px 14px;
  border-radius: 999px;
  background: rgba(0, 0, 0, 0.45);
  border: 1px solid rgba(255, 255, 255, 0.18);
}
.fullscreen-counter {
  color: #fff;
  font-size: 14px;
  font-weight: 600;
  letter-spacing: 0.2px;
}
.fullscreen-image {
  max-width: min(92vw, 1300px);
  max-height: min(calc(100vh - var(--fs-header-offset) - var(--fs-bottom-gap) - 36px), 760px);
  width: auto;
  height: auto;
  object-fit: contain;
  border-radius: 16px;
  box-shadow: 0 22px 60px rgba(0, 0, 0, 0.5);
  transition: opacity 0.28s ease, transform 0.28s ease;
}
.close-fullscreen,
.fullscreen-cursor-close,
.fullscreen-prev,
.fullscreen-next {
  position: absolute;
  background: rgba(255,255,255,0.14);
  color: #fff;
  border: 1px solid rgba(255, 255, 255, 0.22);
  cursor: pointer;
  font-size: 34px;
  width: 54px;
  height: 54px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: all 0.22s ease;
}
.close-fullscreen {
  position: static;
  width: 40px;
  height: 40px;
  min-width: 40px;
  min-height: 40px;
  font-size: 24px;
  line-height: 1;
  border-radius: 999px !important;
  aspect-ratio: 1 / 1;
  padding: 0 !important;
  appearance: none;
  background: rgba(239, 68, 68, 0.9);
  border: 1px solid rgba(255, 99, 99, 0.95);
  color: #fff;
  box-shadow: none !important;
}
.fullscreen-cursor-close {
  position: fixed;
  left: var(--cursor-x, 50vw);
  top: var(--cursor-y, 50vh);
  width: 42px;
  height: 42px;
  min-width: 42px;
  min-height: 42px;
  font-size: 24px;
  line-height: 1;
  border-radius: 999px !important;
  aspect-ratio: 1 / 1;
  padding: 0 !important;
  appearance: none;
  background: rgba(239, 68, 68, 0.95);
  border: 1px solid rgba(255, 120, 120, 0.95);
  color: #fff;
  box-shadow: none !important;
  transform: translate(-50%, -50%) scale(0.9);
  opacity: 0;
  visibility: hidden;
  pointer-events: none;
  z-index: 100000;
}
.fullscreen-cursor-close.is-visible {
  opacity: 1;
  visibility: visible;
  pointer-events: auto;
  transform: translate(-50%, -50%) scale(1);
}
.fullscreen-prev { left: 24px; top: 50%; transform: translateY(-50%); }
.fullscreen-next { right: 24px; top: 50%; transform: translateY(-50%); }
.close-fullscreen:hover,
.fullscreen-cursor-close:hover,
.fullscreen-prev:hover,
.fullscreen-next:hover {
  background: rgba(255,255,255,0.26);
  transform: translateY(-50%) scale(1.04);
}
.close-fullscreen:hover {
  background: rgba(220, 38, 38, 0.98);
  transform: scale(1.06);
}
.fullscreen-cursor-close:hover {
  background: rgba(220, 38, 38, 1);
  transform: translate(-50%, -50%) scale(1.06);
}

@media (min-width: 1025px) {
  .custom-slider-track { gap: 16px; }
  .custom-slide {
    flex: 0 0 calc((100% - 48px) / 4);
    min-height: 220px;
  }
}
@media (max-width: 1024px) and (min-width: 769px) {
  .custom-slider-track { gap: 14px; }
  .custom-slide { 
    flex: 0 0 calc((100% - 28px) / 3);
    min-height: 200px;
  }
}
@media (max-width:768px){
  .fullscreen-viewer {
    --fs-header-offset: 104px;
    --fs-side-gap: 18px;
    --fs-bottom-gap: 16px;
  }
  .custom-slide { 
    flex: 0 0 calc((100% - 12px) / 2);
    min-height: 160px;
  }
  .custom-slider-track { gap: 12px; }
  .slider-image { max-height: 180px; }
  .fullscreen-toolbar {
    padding: 6px 8px 6px 12px;
  }
  .fullscreen-counter {
    font-size: 13px;
  }
  .fullscreen-prev, .fullscreen-next {
    width: 42px;
    height: 42px;
    font-size: 24px;
  }
  .fullscreen-prev { left: 8px; }
  .fullscreen-next { right: 8px; }
  .fullscreen-image {
    max-width: 92vw;
    max-height: calc(100vh - var(--fs-header-offset) - var(--fs-bottom-gap) - 12px);
    border-radius: 12px;
  }
  .fullscreen-cursor-close {
    display: none;
  }
}

body.carousel-fullscreen-active {
  overflow: hidden;
}
</style>

<script>
document.addEventListener("DOMContentLoaded", function () {
  const track = document.querySelector(".custom-slider-track");
  if (!track) return;
  track.classList.add("is-loading");

  const originalSlides = Array.from(track.querySelectorAll(".custom-slide"));
  const prevBtn = document.querySelector(".prev-slide");
  const nextBtn = document.querySelector(".next-slide");
  const slideCount = originalSlides.length;
  if (!slideCount) return;

  let visibleSlides = 3;
  let currentIndex = 0;
  let auto = null;
  let isReady = false;
  let hasLoop = false;
  let renderedSlides = [];
  let isDragging = false;
  let dragMoved = false;
  let dragStartX = 0;
  let dragCurrentX = 0;
  let dragStartTranslate = 0;

  function getVisibleSlides() {
    if (window.innerWidth <= 768) return 2;
    if (window.innerWidth <= 1024) return 3;
    return 4;
  }

  function getSlideStep() {
    const first = renderedSlides[0];
    if (!first) return 0;
    const trackStyle = window.getComputedStyle(track);
    const gap = parseFloat(trackStyle.columnGap || trackStyle.gap || 0);
    return first.getBoundingClientRect().width + gap;
  }

  function stopAuto() {
    if (auto) {
      clearInterval(auto);
      auto = null;
    }
  }

  function startAuto() {
    stopAuto();
    if (isReady && hasLoop) {
      auto = setInterval(nextSlide, 4000);
    }
  }

  function moveToIndex(withAnimation = true) {
    const step = getSlideStep();
    if (!step) return;
    track.style.transition = withAnimation ? "transform 0.6s ease" : "none";
    track.style.transform = `translateX(-${currentIndex * step}px)`;
  }

  function getCurrentTranslateX() {
    const style = window.getComputedStyle(track);
    const matrix = new DOMMatrixReadOnly(style.transform);
    return matrix.m41 || 0;
  }

  function rebuildTrack() {
    visibleSlides = Math.min(getVisibleSlides(), Math.max(1, slideCount));
    hasLoop = slideCount > visibleSlides;

    track.innerHTML = "";

    if (hasLoop) {
      const clonesBefore = originalSlides.slice(-visibleSlides).map((slide) => slide.cloneNode(true));
      const clonesAfter = originalSlides.slice(0, visibleSlides).map((slide) => slide.cloneNode(true));
      clonesBefore.forEach((slide) => track.appendChild(slide));
      originalSlides.forEach((slide) => track.appendChild(slide.cloneNode(true)));
      clonesAfter.forEach((slide) => track.appendChild(slide));
      currentIndex = visibleSlides;
    } else {
      originalSlides.forEach((slide) => track.appendChild(slide.cloneNode(true)));
      currentIndex = 0;
    }

    renderedSlides = Array.from(track.querySelectorAll(".custom-slide"));
    renderedSlides.forEach((slide, idx) => {
      const normalizedIndex = hasLoop
        ? (idx - visibleSlides + slideCount) % slideCount
        : idx;
      slide.dataset.originalIndex = String(normalizedIndex);
    });
    if (prevBtn) prevBtn.style.display = hasLoop ? "flex" : "none";
    if (nextBtn) nextBtn.style.display = hasLoop ? "flex" : "none";
    moveToIndex(false);
    startAuto();
  }

  function nextSlide() {
    if (!isReady || !hasLoop) return;
    currentIndex += 1;
    moveToIndex();
  }

  function prevSlide() {
    if (!isReady || !hasLoop) return;
    currentIndex -= 1;
    moveToIndex();
  }

  function onDragStart(clientX) {
    if (!isReady || !hasLoop) return;
    isDragging = true;
    dragMoved = false;
    dragStartX = clientX;
    dragCurrentX = clientX;
    dragStartTranslate = getCurrentTranslateX();
    stopAuto();
    track.classList.add("is-dragging");
    track.style.transition = "none";
  }

  function onDragMove(clientX) {
    if (!isDragging) return;
    dragCurrentX = clientX;
    const delta = dragCurrentX - dragStartX;
    if (Math.abs(delta) > 6) dragMoved = true;
    track.style.transform = `translateX(${dragStartTranslate + delta}px)`;
  }

  function onDragEnd() {
    if (!isDragging) return;
    isDragging = false;
    track.classList.remove("is-dragging");
    const delta = dragCurrentX - dragStartX;
    const threshold = Math.max(40, getSlideStep() * 0.15);
    if (Math.abs(delta) > threshold) {
      if (delta < 0) {
        nextSlide();
      } else {
        prevSlide();
      }
    } else {
      moveToIndex(true);
    }
    setTimeout(() => {
      dragMoved = false;
    }, 0);
    startAuto();
  }

  track.addEventListener("transitionend", () => {
    if (!hasLoop) return;

    if (currentIndex >= slideCount + visibleSlides) {
      currentIndex = visibleSlides;
      moveToIndex(false);
    } else if (currentIndex < visibleSlides) {
      currentIndex = slideCount + visibleSlides - 1;
      moveToIndex(false);
    }
  });

  async function preloadInitialSlides() {
    const preloadCount = originalSlides.length;
    const preloadTargets = originalSlides
      .slice(0, preloadCount)
      .map((slide) => slide.querySelector("img"))
      .filter(Boolean);

    await Promise.all(
      preloadTargets.map((img) => {
        if (img.complete && img.naturalWidth > 0) return Promise.resolve();
        return new Promise((resolve) => {
          img.addEventListener("load", resolve, { once: true });
          img.addEventListener("error", resolve, { once: true });
        });
      })
    );
  }

  if (nextBtn) nextBtn.addEventListener("click", nextSlide);
  if (prevBtn) prevBtn.addEventListener("click", prevSlide);
  track.addEventListener("mouseenter", stopAuto);
  track.addEventListener("mouseleave", startAuto);
  track.addEventListener("dragstart", (event) => event.preventDefault());
  track.addEventListener("mousedown", (event) => onDragStart(event.clientX));
  window.addEventListener("mousemove", (event) => onDragMove(event.clientX));
  window.addEventListener("mouseup", onDragEnd);
  track.addEventListener(
    "touchstart",
    (event) => {
      if (!event.touches[0]) return;
      onDragStart(event.touches[0].clientX);
    },
    { passive: true }
  );
  track.addEventListener(
    "touchmove",
    (event) => {
      if (!event.touches[0]) return;
      onDragMove(event.touches[0].clientX);
    },
    { passive: true }
  );
  track.addEventListener("touchend", onDragEnd);
  track.addEventListener("touchcancel", onDragEnd);
  window.addEventListener("resize", rebuildTrack);

  // === FULLSCREEN ===
  const fullscreen = document.querySelector(".fullscreen-viewer");
  const fullscreenImg = document.querySelector(".fullscreen-image");
  const fullscreenCounter = document.querySelector(".fullscreen-counter");
  const closeFs = document.querySelector(".close-fullscreen");
  const cursorCloseFs = document.querySelector(".fullscreen-cursor-close");
  const prevFs = document.querySelector(".fullscreen-prev");
  const nextFs = document.querySelector(".fullscreen-next");
  let fsIndex = 0;

  function updateFullscreenCounter() {
    if (fullscreenCounter) {
      fullscreenCounter.textContent = `${fsIndex + 1} / ${slideCount}`;
    }
  }

  function updateFullscreenMedia() {
    const activeImage = originalSlides[fsIndex]?.querySelector("img");
    if (!activeImage || !fullscreenImg) return;
    fullscreenImg.src = activeImage.src;
    fullscreenImg.alt = activeImage.alt || "Course image";
  }

  function openFullscreen(index) {
    fsIndex = index % slideCount;
    fullscreen.classList.add("active");
    document.body.classList.add("carousel-fullscreen-active");
    updateFullscreenCounter();
    updateFullscreenMedia();
  }
  function closeFullscreen() {
    fullscreen.classList.remove("active");
    document.body.classList.remove("carousel-fullscreen-active");
    if (cursorCloseFs) cursorCloseFs.classList.remove("is-visible");
  }
  function nextFullscreen() {
    fsIndex = (fsIndex + 1) % slideCount;
    updateFullscreenCounter();
    updateFullscreenMedia();
  }
  function prevFullscreenSlide() {
    fsIndex = (fsIndex - 1 + slideCount) % slideCount;
    updateFullscreenCounter();
    updateFullscreenMedia();
  }

  track.addEventListener("click", (event) => {
    if (dragMoved) return;
    const clickedImage = event.target.closest(".slider-image");
    if (!clickedImage) return;
    const slideEl = clickedImage.closest(".custom-slide");
    if (!slideEl) return;
    const dataIndex = Number(slideEl.dataset.originalIndex);
    if (!Number.isNaN(dataIndex)) {
      openFullscreen(dataIndex);
    }
  });

  if (closeFs) closeFs.addEventListener("click", closeFullscreen);
  if (cursorCloseFs) cursorCloseFs.addEventListener("click", closeFullscreen);
  if (nextFs) nextFs.addEventListener("click", nextFullscreen);
  if (prevFs) prevFs.addEventListener("click", prevFullscreenSlide);
  if (fullscreen) {
    fullscreen.addEventListener("click", (event) => {
      if (event.target === fullscreen) closeFullscreen();
    });
    fullscreen.addEventListener("mousemove", (event) => {
      if (!cursorCloseFs || !fullscreen.classList.contains("active")) return;
      const hoveringImage = event.target.closest(".fullscreen-image, .fullscreen-toolbar, .fullscreen-prev, .fullscreen-next");
      if (hoveringImage) {
        cursorCloseFs.classList.remove("is-visible");
        return;
      }
      cursorCloseFs.style.setProperty("--cursor-x", `${event.clientX}px`);
      cursorCloseFs.style.setProperty("--cursor-y", `${event.clientY}px`);
      cursorCloseFs.classList.add("is-visible");
    });
    fullscreen.addEventListener("mouseleave", () => {
      if (cursorCloseFs) cursorCloseFs.classList.remove("is-visible");
    });
  }
  document.addEventListener("keydown", (event) => {
    if (!fullscreen || !fullscreen.classList.contains("active")) return;
    if (event.key === "Escape") closeFullscreen();
    if (event.key === "ArrowRight") nextFullscreen();
    if (event.key === "ArrowLeft") prevFullscreenSlide();
  });

  rebuildTrack();
  preloadInitialSlides().finally(() => {
    isReady = true;
    track.classList.remove("is-loading");
    moveToIndex(false);
    startAuto();
  });
});
</script>
<?php endif; ?>


		
		
		
		
		
		
		
		
		
<?php
$main_title = $meta['custom_section_main_title'] ?? '';
$custom_sections = $meta['custom_content_sections'] ?? [];

if (!empty($main_title) || !empty($custom_sections)) : ?>
  <div class="custom-dynamic-section">
    <?php if (!empty($main_title)) : ?>
      <h2 class="custom-section-title"><?php echo esc_html($main_title); ?></h2>
    <?php endif; ?>

    <?php if (is_array($custom_sections) && !empty($custom_sections)) : ?>
      <?php foreach ($custom_sections as $section) : ?>
        <?php if (!empty($section['title']) || !empty($section['content'])) : ?>
          <div class="custom-subsection">
            <?php if (!empty($section['title'])) : ?>
              <h3 class="subsection-title" 
                  style="color:<?php echo esc_attr($section['title_color'] ?? '#000'); ?>;">
                <?php echo esc_html($section['title']); ?>
              </h3>
            <?php endif; ?>

            <?php if (!empty($section['content'])) : ?>
              <div class="subsection-content">
                <?php 
                $section_content = $section['content'];
                if (!empty($section_content)) {
                  $section_content = wpautop($section_content);
                  $section_content = preg_replace('/<p>\s*<\/p>/i', '', $section_content);
                }
                echo wp_kses_post($section_content); 
                ?>
              </div>
            <?php endif; ?>
          </div>
        <?php endif; ?>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
<?php endif; ?>
		
		
<?php
$adv_title = $meta['advanced_section_title'] ?? '';
$adv_title_color = $meta['advanced_section_title_color'] ?? '';
$adv_desc = $meta['advanced_section_description'] ?? '';
$adv_html_1 = $meta['advanced_section_html_1'] ?? '';
$adv_html_2 = $meta['advanced_section_html_2'] ?? '';
$adv_bg = $meta['advanced_section_bg'] ?? '';
?>

<?php if ($adv_title || $adv_desc || $adv_html_1 || $adv_html_2): ?>
  <div class="advanced-section" style="background: <?php echo esc_attr($adv_bg ?: '#f9f9f9'); ?>;">
    <?php if ($adv_title): ?>
      <h2 style="color: <?php echo esc_attr($adv_title_color ?: '#000'); ?>;">
        <?php echo esc_html($adv_title); ?>
      </h2>
    <?php endif; ?>

    <?php if ($adv_desc): ?>
      <div class="description">
        <?php 
        if (!empty($adv_desc)) {
          $adv_desc = wpautop($adv_desc);
          $adv_desc = preg_replace('/<p>\s*<\/p>/i', '', $adv_desc);
        }
        echo wp_kses_post($adv_desc); 
        ?>
      </div>
    <?php endif; ?>

    <?php if ($adv_html_1): ?>
      <div class="advanced-content">
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

    <?php if ($adv_html_2): ?>
      <div class="advanced-content">
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
<?php endif; ?>

<?php
$co_title = $meta['custom_output_title'] ?? '';
$co_desc = $meta['custom_output_description'] ?? '';
$co_html = $meta['custom_output_html'] ?? '';
?>

<?php if ($co_title || $co_desc || $co_html): ?>
<div class="custom-output-section">
  <?php if ($co_title): ?>
    <h2><?php echo esc_html($co_title); ?></h2>
  <?php endif; ?>

  <?php if ($co_desc): ?>
    <div class="description">
      <?php 
      if (!empty($co_desc)) {
        $co_desc = wpautop($co_desc);
        $co_desc = preg_replace('/<p>\s*<\/p>/i', '', $co_desc);
      }
      echo wp_kses_post($co_desc); 
      ?>
    </div>
  <?php endif; ?>

  <?php if ($co_html): ?>
    <div class="custom-output-content">
      <?php 
      $co_content = $co_html;
      if (!empty($co_content)) {
        $co_content = wpautop($co_content);
        $co_content = preg_replace('/<p>\s*<\/p>/i', '', $co_content);
      }
      echo do_shortcode(wp_kses_post($co_content)); 
      ?>
    </div>
  <?php endif; ?>
</div>
<?php endif; ?>
		
<!-- ======= Custom Code Grid Section (Frontend Output) ======= -->
<?php
$codegrid_title = $meta['codegrid_title'] ?? '';
$codegrid_title_color = $meta['codegrid_title_color'] ?? '';
$codegrid_item_color = $meta['codegrid_item_color'] ?? '';
$codegrid_items = $meta['codegrid_items'] ?? [];
?>

<?php if (!empty($codegrid_items) && is_array($codegrid_items)) : ?>
  <div class="custom-codegrid-section">
    <?php if (!empty($codegrid_title)) : ?>
      <h2 class="codegrid-main-title" style="color: <?php echo esc_attr($codegrid_title_color ?: '#000'); ?>">
        <?php echo esc_html($codegrid_title); ?>
      </h2>
    <?php endif; ?>

    <div class="codegrid-list">
      <?php foreach ($codegrid_items as $item) : ?>
        <?php
        $item_title = trim($item['title'] ?? '');
        $item_content = trim($item['content'] ?? '');
        // ✅ Show item if title exists (even if content is empty)
        if (empty($item_title) && empty($item_content)) continue;
        ?>
        <div class="codegrid-item">
          <?php if (!empty($item_title)): ?>
            <h3 class="codegrid-item-title" style="color: <?php echo esc_attr($codegrid_item_color ?: '#000'); ?>">
              <?php echo esc_html($item_title); ?>
            </h3>
          <?php endif; ?>

          <?php if (!empty($item_content)): ?>
            <div class="codegrid-item-content">
              <?php 
              $codegrid_content = $item_content;
              if (!empty($codegrid_content)) {
                $codegrid_content = wpautop($codegrid_content);
                $codegrid_content = preg_replace('/<p>\s*<\/p>/i', '', $codegrid_content);
              }
              echo do_shortcode(wp_kses_post($codegrid_content)); 
              ?>
            </div>
          <?php endif; ?>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
<?php endif; ?>
		
		
		
		

		
		</div>

  </div>
</section>




<?php
$contact_illustration_url = 'https://succeedlearn.com/wp-content/uploads/2025/08/your-Organization-2.svg';
$contact_illustration_alt = get_media_alt_from_url($contact_illustration_url, 'Organization illustration');
?>

<section class="course-contact-us-section" aria-label="Contact us">
  <div class="course-contact-us-inner">
    <h2 class="course-contact-us-title">See how <span>Succeed</span> will work for your Organization</h2>

    <div class="course-contact-us-left" aria-hidden="true">
      <img
        class="course-contact-us-illustration"
        src="<?php echo esc_url($contact_illustration_url); ?>"
        alt="<?php echo esc_attr($contact_illustration_alt); ?>"
        loading="lazy"
      />
    </div>

    <div class="course-contact-us-right">
      <div class="course-contact-us-shortcode">
        <?php echo do_shortcode($contact_shortcode); ?>
      </div>
    </div>
  </div>
</section>

<style>
.course-contact-us-section{
  margin: 0 auto 60px;
  padding: 0;
  box-sizing: border-box;
  background: #ffffff;
  /* Hidden for now — set to block to show the inline contact section again */
  display: none;
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
}
.course-contact-us-illustration{
  width: 100%;
  max-width: 520px;
  height: auto;
  display: block;
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
  background: #eef2f3;
  border-radius: 12px;
  padding: 18px;
}

/* SCF plugin form CSS (scoped to this section) */
.course-contact-us-shortcode .scf-form-wrap {
	max-width: 760px;
	margin: 0rem auto;
	padding: 0rem;
}

.course-contact-us-shortcode .scf-form {
	max-width: 100%;
	margin: 0;
}

/* Hide honeypot field from users */
.course-contact-us-shortcode .scf-honeypot {
	position: absolute;
	left: -9999px;
	width: 1px;
	height: 1px;
	overflow: hidden;
	opacity: 0;
	pointer-events: none;
}

.course-contact-us-shortcode .scf-field {
	margin-bottom: 0rem;
	display: flex;
	flex-direction: column;
}

.course-contact-us-shortcode .scf-field label {
	font-weight: 600;
	color: #0f172a;
	margin-bottom: 0.25rem;
	font-size: 0.95rem;
}

.course-contact-us-shortcode .scf-required {
	color: #dc2626;
	margin-left: 2px;
}

.course-contact-us-shortcode .scf-field input:not([type="checkbox"]):not([type="radio"]),
.course-contact-us-shortcode .scf-field select,
.course-contact-us-shortcode .scf-field textarea {
	border: 1px solid #cbd5f5;
	border-radius: 6px;
	font-size: 1rem;
	background-color: #ffffff;
	color: #0f172a;
	width: 100%;
	box-sizing: border-box;
	transition: border-color 0.2s ease, box-shadow 0.2s ease;
}

/* Extra spacing for recently added fields */
.course-contact-us-shortcode #scf-organization,
.course-contact-us-shortcode #scf-email,
.course-contact-us-shortcode #scf-course-interest,
.course-contact-us-shortcode #scf-phone-country-code,
.course-contact-us-shortcode #scf-phone-number {
	margin-bottom: 0.75rem;
}

/* Keep Chrome autofill from changing background colors */
.course-contact-us-shortcode .scf-field input:-webkit-autofill,
.course-contact-us-shortcode .scf-field textarea:-webkit-autofill,
.course-contact-us-shortcode .scf-field select:-webkit-autofill {
	-webkit-text-fill-color: #0f172a;
	transition: background-color 9999s ease-in-out 0s;
	box-shadow: 0 0 0px 1000px #ffffff inset;
}

.course-contact-us-shortcode .scf-field input::placeholder,
.course-contact-us-shortcode .scf-field textarea::placeholder {
	color: rgba(15, 23, 42, 0.42);
}

/* When intl-tel-input sets placeholders, fade them too */
.course-contact-us-shortcode .scf-field .iti input::placeholder {
	color: rgba(15, 23, 42, 0.42);
}

.course-contact-us-shortcode .scf-field input:not([type="checkbox"]):not([type="radio"]):focus,
.course-contact-us-shortcode .scf-field select:focus,
.course-contact-us-shortcode .scf-field textarea:focus {
	outline: none;
	border-color: #2563eb;
	box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
}

/* Custom select arrow with right-side spacing */
.course-contact-us-shortcode .scf-field select {
	appearance: none;
	-webkit-appearance: none;
	-moz-appearance: none;
	background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 20 20'%3E%3Cpath fill='%230f172a' d='M5.6 7.8a1 1 0 0 1 1.4 0L10 10.8l3-3a1 1 0 1 1 1.4 1.4l-3.7 3.7a1 1 0 0 1-1.4 0L5.6 9.2a1 1 0 0 1 0-1.4Z'/%3E%3C/svg%3E");
	background-repeat: no-repeat;
	background-position: right 0.85rem center;
	background-size: 18px 18px;
	padding-right: 2.75rem;
}

.course-contact-us-shortcode .scf-field select::-ms-expand {
	display: none;
}

.course-contact-us-shortcode .scf-field textarea {
	resize: vertical;
	min-height: 80px;
}

/* Two-column layout for name and email fields */
.course-contact-us-shortcode .scf-field-row {
	display: flex;
	gap: 1rem;
	margin-bottom: 0rem;
}

.course-contact-us-shortcode .scf-field-row .scf-field {
	flex: 1;
	margin-bottom: 0;
}

.course-contact-us-shortcode .scf-phone-inline {
	display: flex;
	gap: 0.5rem;
	align-items: center;
}

.course-contact-us-shortcode .scf-phone-inline select#scf-phone-country-code {
	flex: 0 0 46%;
	max-width: 46%;
	min-width: 160px;
	white-space: nowrap;
	overflow: hidden;
	text-overflow: ellipsis;
}

.course-contact-us-shortcode .scf-phone-inline input#scf-phone-number {
	flex: 1 1 auto;
	min-width: 0;
}

/* Intl-tel-input wrapper should fill the row */
.course-contact-us-shortcode .scf-phone-inline .iti {
	width: 100%;
}

/* Remove hover highlighting on country list / selected country */
.course-contact-us-shortcode .iti__country:hover,
.course-contact-us-shortcode .iti__country.iti__highlight,
.course-contact-us-shortcode .iti__selected-country:hover,
.course-contact-us-shortcode .iti__selected-country:focus {
	background-color: transparent !important;
}

/* Override aggressive theme button styles on intl-tel-input elements */
.course-contact-us-shortcode .scf-form .iti button,
.course-contact-us-shortcode .scf-form .iti__selected-country,
.course-contact-us-shortcode .scf-form .iti__selected-country-primary,
.course-contact-us-shortcode .scf-form .iti__country {
	background-color: #ffffff !important;
	background-image: none !important;
}

.course-contact-us-shortcode .scf-form .iti__selected-country:hover,
.course-contact-us-shortcode .scf-form .iti__selected-country:focus,
.course-contact-us-shortcode .scf-form .iti__selected-country:active,
.course-contact-us-shortcode .scf-form .iti__selected-country-primary:hover,
.course-contact-us-shortcode .scf-form .iti__selected-country-primary:focus,
.course-contact-us-shortcode .scf-form .iti__selected-country-primary:active {
	background-color: #ffffff !important;
	box-shadow: none !important;
}

/* Keep country dropdown text visible in all states */
.course-contact-us-shortcode .iti__selected-country,
.course-contact-us-shortcode .iti__selected-country:hover,
.course-contact-us-shortcode .iti__selected-country:focus,
.course-contact-us-shortcode .iti__selected-country:active,
.course-contact-us-shortcode .iti__country,
.course-contact-us-shortcode .iti__country:hover,
.course-contact-us-shortcode .iti__country.iti__highlight,
.course-contact-us-shortcode .iti__country-name,
.course-contact-us-shortcode .iti__dial-code {
	color: #0f172a !important;
}

/* Responsive: stack fields on mobile */
@media (max-width: 768px) {
	.course-contact-us-shortcode .scf-form {
		max-width: 100%;
	}
	
	.course-contact-us-shortcode .scf-field-row {
		flex-direction: column;
		gap: 0;
	}

	.course-contact-us-shortcode .scf-phone-inline {
		flex-direction: column;
		gap: 0.75rem;
		align-items: stretch;
	}

	.course-contact-us-shortcode .scf-phone-inline select#scf-phone-country-code,
	.course-contact-us-shortcode .scf-phone-inline input#scf-phone-number {
		flex: 1 1 100%;
		max-width: 100%;
		min-width: 0;
		width: 100%;
	}
}

.course-contact-us-shortcode .scf-checkbox {
	flex-direction: row;
	align-items: center;
	flex-wrap: wrap;
	margin-bottom: 1rem;
	position: relative;
	pointer-events: auto;
	display: flex;
	gap: 0;
}

.course-contact-us-shortcode .scf-checkbox input[type="checkbox"],
.course-contact-us-shortcode .scf-form .scf-checkbox input[type="checkbox"],
.course-contact-us-shortcode body .scf-form .scf-checkbox input[type="checkbox"] {
	width: 1.2em !important;
	height: 1.2em !important;
	margin: 0 0.5rem 0 0 !important;
	flex-shrink: 0;
	cursor: pointer !important;
	pointer-events: auto !important;
	position: relative;
	z-index: 10;
	opacity: 1 !important;
	appearance: checkbox;
	-webkit-appearance: checkbox;
	-moz-appearance: checkbox;
	border: initial !important;
	background: initial !important;
	padding: 0 !important;
	box-shadow: none !important;
	vertical-align: middle;
}

.course-contact-us-shortcode .scf-checkbox input[type="checkbox"]::before,
.course-contact-us-shortcode .scf-checkbox input[type="checkbox"]::after,
.course-contact-us-shortcode .scf-checkbox input[type="checkbox"]:checked::before,
.course-contact-us-shortcode .scf-checkbox input[type="checkbox"]:checked::after,
.course-contact-us-shortcode .scf-form .scf-checkbox input[type="checkbox"]::before,
.course-contact-us-shortcode .scf-form .scf-checkbox input[type="checkbox"]::after,
.course-contact-us-shortcode .scf-form .scf-checkbox input[type="checkbox"]:checked::before,
.course-contact-us-shortcode .scf-form .scf-checkbox input[type="checkbox"]:checked::after,
.course-contact-us-shortcode body .scf-form .scf-checkbox input[type="checkbox"]::before,
.course-contact-us-shortcode body .scf-form .scf-checkbox input[type="checkbox"]::after,
.course-contact-us-shortcode body .scf-form .scf-checkbox input[type="checkbox"]:checked::before,
.course-contact-us-shortcode body .scf-form .scf-checkbox input[type="checkbox"]:checked::after {
	display: none !important;
	content: "" !important;
	width: 0 !important;
	height: 0 !important;
	margin: 0 !important;
	padding: 0 !important;
	border: none !important;
	background: transparent !important;
	box-shadow: none !important;
	visibility: hidden !important;
	opacity: 0 !important;
	position: absolute !important;
	left: -9999px !important;
	font-family: initial !important;
	font-size: 0 !important;
	line-height: 0 !important;
	float: none !important;
}

.course-contact-us-shortcode .scf-checkbox input[type="checkbox"]:focus {
	outline: 2px solid #2563eb;
	outline-offset: 2px;
	box-shadow: none !important;
}

.course-contact-us-shortcode .scf-checkbox input[type="checkbox"]:hover {
	cursor: pointer;
}

.course-contact-us-shortcode .scf-checkbox label {
	font-weight: normal;
	cursor: pointer;
	flex: 1;
	line-height: 1.4;
	pointer-events: auto;
	user-select: none;
	margin-left: 0;
	display: flex;
	align-items: center;
	gap: 0.25rem;
	min-height: 1.2em;
}

.course-contact-us-shortcode .scf-checkbox label a {
	pointer-events: auto;
	position: relative;
	z-index: 1;
}

.course-contact-us-shortcode .scf-checkbox .scf-error-message {
	width: 100%;
	margin-left: 0;
}

.course-contact-us-shortcode .scf-checkbox a {
	color: #2563eb;
	text-decoration: underline;
}

.course-contact-us-shortcode .scf-submit {
	background: #2563eb;
	color: #fff;
	border: none;
	border-radius: 6px;
	padding: 0.875rem 2rem;
	font-size: 1rem;
	font-weight: 600;
	cursor: pointer;
	transition: background-color 0.2s ease, transform 0.1s ease;
	width: 100%;
	display: block;
	margin: 0.5rem 0 0 0;
	position: relative;
	max-width: 45%;
}

.course-contact-us-shortcode .scf-submit:hover {
	background: #1d4ed8;
}

.course-contact-us-shortcode .scf-submit:active {
	transform: scale(0.98);
}

.course-contact-us-shortcode .scf-submit:disabled {
	cursor: not-allowed;
}

.course-contact-us-shortcode .scf-submit.is-loading {
	opacity: 0.6;
	pointer-events: none;
}

.course-contact-us-shortcode .scf-response {
	margin-top: 1rem;
	padding: 0.75rem 1rem;
	border-radius: 6px;
	font-weight: 600;
	display: block;
}

.course-contact-us-shortcode .scf-response.scf-error {
	color: #dc2626;
	background-color: #fee2e2;
	border: 1px solid #fecaca;
}

.course-contact-us-shortcode .scf-response.scf-success {
	color: #15803d;
	background-color: #d1fae5;
	border: 1px solid #a7f3d0;
	margin-top:8px !important;
}

.course-contact-us-shortcode .scf-error-message {
	color: #dc2626;
	font-size: 14px;
	font-weight: normal;
	margin-top: 0.50rem;
	display: block;
	/**min-height: 20px;**/
}

.course-contact-us-shortcode .scf-field input:invalid:not(:focus):not(:placeholder-shown),
.course-contact-us-shortcode .scf-field textarea:invalid:not(:focus):not(:placeholder-shown) {
	border-color: #cbd5f5;
}

.course-contact-us-shortcode .scf-spinner {
	display: inline-block;
	width: 14px;
	height: 14px;
	border: 2px solid rgba(255, 255, 255, 0.3);
	border-top-color: #fff;
	border-radius: 50%;
	animation: scf-spin 0.8s linear infinite;
	margin-right: 8px;
	vertical-align: middle;
}
.course-contact-us-shortcode .scf-checkbox a{
	color: #1472ba!important;
    font-weight: 600;
    text-decoration: none;
}
@keyframes scf-spin {
	from {
		transform: rotate(0deg);
	}
	to {
		transform: rotate(360deg);
	}
}

.course-contact-us-shortcode .scf-submit-loading {
	display: inline-flex;
	align-items: center;
}

.course-contact-us-shortcode .scf-submit.is-loading .scf-submit-text {
	display: none;
}

.course-contact-us-shortcode .scf-submit.is-loading .scf-submit-loading {
	display: inline-flex !important;
}

@media (max-width: 1024px){
  .course-contact-us-inner{ grid-template-columns: 1fr; padding: 24px 20px; }
  .course-contact-us-left{ display: none; }
}
</style>

<?php
$faq_main_title = $meta['faq_main_title'] ?? '';
$faq_items = $meta['faq_items'] ?? [];
if (!empty($faq_items)) :
?>
<section class="faq-section">
  <?php if ($faq_main_title): ?>
    <h2 class="faq-title"><?php echo esc_html($faq_main_title); ?></h2>
  <?php endif; ?>

  <div class="faq-container">
    <?php foreach ($faq_items as $index => $faq):
      $question_raw = trim($faq['question'] ?? '');
      $question_clean = preg_replace('/^\s*\d+\s*\.\s*/', '', $question_raw);
      $question_label = ($index + 1) . '. ' . $question_clean;
    ?>
      <div class="faq-item<?php echo $index === 0 ? ' open' : ''; ?>">
        <button class="faq-question<?php echo $index === 0 ? ' active' : ''; ?>">
          <?php echo esc_html($question_label); ?>
          <span class="faq-toggle"><?php echo $index === 0 ? '−' : '+'; ?></span>
        </button>
        <div class="faq-answer<?php echo $index === 0 ? ' open' : ''; ?>">
          <?php echo wp_kses_post(wpautop($faq['answer'])); ?>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>

<style>
.faq-section {
  font-family: "Open Sans", sans-serif;
  margin: 0px auto 80px auto;
  padding: 0px;
  box-sizing: border-box;
}
.faq-title {
  text-align: center;
  font-size: 32px !important;
  font-weight: 600 !important;
  margin-bottom: 30px;
  color: #1a1a1a;
}
.faq-container {
  max-width: 1290px;
  margin: 0 auto;
}
.faq-item {
  background: #fff;
  border-radius: 12px;
  margin-bottom: 12px;
  overflow: hidden;
  transition: box-shadow 0.3s ease;
}
.faq-item.open {
  box-shadow: 0 4px 12px rgba(0,0,0,0.08);
}
.faq-question {
  width: 100%;
  background: #fff!important;
  border: none;
  outline: none;
  padding: 18px 24px;
  text-align: left;
  font-size: 18px;
  font-weight: 600;
  color:#1a1a1a!important;
  cursor: pointer;
  display: flex;
  justify-content: space-between;
  align-items: center;
  transition: background 0.2s ease, color 0.2s ease;
  text-transform: none !important;
}
.faq-question:hover {
  background: #fafafa;
}
.faq-question.active {
  background: #f5f8ff;
  color: #16356b;
}
.faq-toggle {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  width: 28px;
  height: 28px;
  border-radius: 8px;
  background: #123456;
  color: #ffffff;
  font-size: 18px;
  font-weight: 700;
  transition: transform 0.3s ease;
}
.faq-question.active .faq-toggle {
  transform: rotate(180deg);
}
.faq-answer {
  max-height: 0;
  overflow: hidden;
  background: #fff;
  color: #1a1a1a;
  font-size: 16px;
  line-height: 1.65;
  padding: 0 24px;
  transition: max-height 0.4s ease, padding 0.4s ease;
  text-transform: none !important;
}
.faq-answer.open {
  padding: 16px 24px 20px 24px;
  max-height: 10000px !important; /* Very large value to accommodate any content length */
  overflow: visible;
}
/* Ensure initial open state displays correctly */
.faq-item.open .faq-answer.open {
  max-height: 10000px !important;
  overflow: visible;
}
.faq-answer p,
.faq-answer ul,
.faq-answer li {
  text-transform: none !important;
}
@media (max-width: 1024px) {
  .faq-section { padding: 0 20px; }
}
</style>

<script>
document.addEventListener("DOMContentLoaded", function() {
  const faqItems = document.querySelectorAll(".faq-item");

  // Ensure initially open FAQs display correctly
  faqItems.forEach(item => {
    const answer = item.querySelector(".faq-answer");
    if (answer && answer.classList.contains("open")) {
      // Remove any height restrictions for initially open items
      answer.style.maxHeight = "none";
      answer.style.overflow = "visible";
    }
  });

  faqItems.forEach(item => {
    const question = item.querySelector(".faq-question");
    const answer = item.querySelector(".faq-answer");
    const toggle = item.querySelector(".faq-toggle");

    question.addEventListener("click", () => {
      const isActive = question.classList.contains("active");

      // Close all
      faqItems.forEach(i => {
        const a = i.querySelector(".faq-answer");
        i.querySelector(".faq-question").classList.remove("active");
        a.classList.remove("open");
        a.style.maxHeight = "0px"; // Reset to closed state
        a.style.overflow = "hidden";
        i.querySelector(".faq-toggle").textContent = "+";
        i.classList.remove("open");
      });

      // Open this one if not already active
      if (!isActive) {
        question.classList.add("active");
        answer.classList.add("open");
        // Remove height restriction to show full content
        answer.style.maxHeight = "none";
        answer.style.overflow = "visible";
        toggle.textContent = "−";
        item.classList.add("open");
      }
    });
  });
});
</script>
<?php endif; ?>

  </div>
</div>

<button type="button" class="course-floating-contact-btn" id="course-open-contact-modal">
  Contact Us
</button>

<div class="course-contact-modal" id="course-contact-modal" aria-hidden="true">
  <div class="course-contact-modal-backdrop"></div>
  <div class="course-contact-modal-panel" role="dialog" aria-modal="true" aria-label="Contact form">
    <button type="button" class="course-contact-modal-close" id="course-close-contact-modal" aria-label="Close contact form">×</button>
    <h2 class="course-contact-modal-title">Contact Us</h2>
    <div class="course-contact-us-shortcode">
      <?php echo do_shortcode($contact_shortcode); ?>
    </div>
  </div>
</div>

<style>
.course-floating-contact-btn {
  position: fixed;
  right: 22px;
  bottom: 122px;
  z-index: 9998;
  background: #1d4ed8;
  color: #ffffff;
  border: none;
  border-radius: 999px;
  padding: 12px 20px;
  font-size: 15px;
  font-weight: 600;
  cursor: pointer;
  box-shadow: 0 10px 24px rgba(29, 78, 216, 0.35);
}

.course-contact-modal {
  --modal-header-offset: 80px;
  position: fixed;
  inset: 0;
  z-index: 2147483000;
  display: none;
}

.course-contact-modal.is-open {
  display: block;
}

.course-contact-modal-backdrop {
  position: absolute;
  inset: 0;
  background: rgba(2, 6, 23, 0.62);
}

.course-contact-modal-panel {
  position: absolute;
  top: calc(50% + (var(--modal-header-offset) / 2));
  left: 50%;
  transform: translate(-50%, -50%);
  width: min(560px, calc(100vw - 28px));
  max-height: calc(100vh - var(--modal-header-offset) - 28px);
  overflow: auto;
  background: #ffffff;
  border-radius: 14px;
  padding: 20px;
  box-sizing: border-box;
}

.course-contact-modal-title {
  margin: 0 0 14px 0 !important;
  font-size: 24px !important;
  font-weight: 700 !important;
  color: #0f172a;
}

.course-contact-modal-close {
  position: absolute;
  top: 10px;
  right: 12px;
  width: 38px;
  height: 38px;
  min-width: 38px;
  min-height: 38px;
  aspect-ratio: 1 / 1;
  border-radius: 999px;
  padding: 0;
  border: none;
  background: #ef4444;
  color: #ffffff;
  font-size: 24px;
  line-height: 1;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
}

body.course-contact-modal-open {
  overflow: hidden;
}
</style>

<script>
document.addEventListener("DOMContentLoaded", function () {
  const openBtn = document.getElementById("course-open-contact-modal");
  const closeBtn = document.getElementById("course-close-contact-modal");
  const modal = document.getElementById("course-contact-modal");
  const backdrop = modal ? modal.querySelector(".course-contact-modal-backdrop") : null;

  if (!openBtn || !closeBtn || !modal || !backdrop) return;

  function openModal() {
    modal.classList.add("is-open");
    modal.setAttribute("aria-hidden", "false");
    document.body.classList.add("course-contact-modal-open");
  }

  function closeModal() {
    modal.classList.remove("is-open");
    modal.setAttribute("aria-hidden", "true");
    document.body.classList.remove("course-contact-modal-open");
  }

  openBtn.addEventListener("click", openModal);
  closeBtn.addEventListener("click", closeModal);
  backdrop.addEventListener("click", closeModal);
  document.addEventListener("keydown", function (event) {
    if (event.key === "Escape" && modal.classList.contains("is-open")) {
      closeModal();
    }
  });
});
</script>

<?php
// Load theme footer
get_footer();
?>
