<?php
/**
 * Single course layout â€” hero, content sections, FAQ, contact.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$course_id = get_the_ID();
if ( ! $course_id ) {
	return;
}

$meta = get_cached_course_meta( $course_id );

// ============================================
// Access all fields from $meta array
// ============================================
// Background fields
$banner_gradient = $meta['banner_gradient'] ?? '';
$banner_bg_hex = $meta['banner_bg_hex'] ?? '';
$banner_bg_rgb = $meta['banner_bg_rgb'] ?? '';
$banner_bg = $banner_gradient ?: ($banner_bg_hex ?: $banner_bg_rgb);
?>
<?php
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
  <button type="button" class="fullscreen-cursor-close" aria-label="Close fullscreen"></button>
  <button type="button" class="fullscreen-prev" aria-label="Previous image"></button>
  <img class="fullscreen-image" src="" alt="Full View">
  <button type="button" class="fullscreen-next" aria-label="Next image"></button>
</div>
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
        // Show item if title exists (even if content is empty)
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
          <span class="faq-toggle" aria-hidden="true"></span>
        </button>
        <div class="faq-answer<?php echo $index === 0 ? ' open' : ''; ?>">
          <?php echo wp_kses_post(wpautop($faq['answer'])); ?>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>
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

    question.addEventListener("click", () => {
      const isActive = question.classList.contains("active");

      // Close all
      faqItems.forEach(i => {
        const a = i.querySelector(".faq-answer");
        i.querySelector(".faq-question").classList.remove("active");
        a.classList.remove("open");
        a.style.maxHeight = "0px"; // Reset to closed state
        a.style.overflow = "hidden";
        i.classList.remove("open");
      });

      // Open this one if not already active
      if (!isActive) {
        question.classList.add("active");
        answer.classList.add("open");
        // Remove height restriction to show full content
        answer.style.maxHeight = "none";
        answer.style.overflow = "visible";
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
    <button type="button" class="course-contact-modal-close" id="course-close-contact-modal" aria-label="Close contact form"></button>
    <h2 class="course-contact-modal-title">Contact Us</h2>
    <div class="course-contact-us-shortcode">
      <?php echo do_shortcode($contact_shortcode); ?>
    </div>
  </div>
</div>
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

