<?php
/**
 * Plugin Name: SucceedLEARN - Custom Course Banner Meta
 * Description: Adds a custom banner settings meta box for LearnPress courses in the Eduma theme.
 * Version: 1.0
 * Author: Succeed Tech
 */

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

/**
 * Course post types that use the custom banner/content meta box.
 *
 * @return string[]
 */
function ccbm_get_course_post_types() {
	$types = array( 'course', 'lp_course' );
	return array_values( array_filter( $types, 'post_type_exists' ) );
}

/**
 * Whether a post type is a supported course CPT.
 *
 * @param string|null $post_type Post type slug.
 * @return bool
 */
function ccbm_is_course_post_type( $post_type = null ) {
	if ( null === $post_type ) {
		$post_type = get_post_type();
	}
	return in_array( (string) $post_type, ccbm_get_course_post_types(), true );
}

/**
 * ====================================================
 * ADD CUSTOM COURSE BANNER META BOX
 * ====================================================
 */
function ccbm_add_custom_meta_box() {
	foreach ( ccbm_get_course_post_types() as $post_type ) {
		add_meta_box(
			'custom_course_banner',
			'Custom Course Banner Settings',
			'ccbm_render_meta_box',
			$post_type,
			'normal',
			'high'
		);
	}
}
add_action('add_meta_boxes', 'ccbm_add_custom_meta_box');

function ccbm_enable_docx_upload_on_post_form() {
    $screen = function_exists('get_current_screen') ? get_current_screen() : null;
    if ($screen && ccbm_is_course_post_type($screen->post_type)) {
        echo ' enctype="multipart/form-data"';
    }
}
add_action('post_edit_form_tag', 'ccbm_enable_docx_upload_on_post_form');

/**
 * ====================================================
 * DOCX IMPORT HELPERS
 * ====================================================
 */
function ccbm_normalize_heading($value) {
    $value = strtolower((string) $value);
    $value = preg_replace('/[^a-z0-9]+/', ' ', $value);
    return trim(preg_replace('/\s+/', ' ', $value));
}

function ccbm_heading_alias_map() {
    return [
        'course title' => 'course_title',
        'title' => 'course_title',
        'course name' => 'course_title',
        'course description' => 'course_description',
        'description' => 'course_description',
        'overview' => 'course_description',
        'duration' => 'duration_value',
        'course level' => 'course_level',
        'level' => 'course_level',
        'category' => 'course_category',
        'course category' => 'course_category',
        'individual price' => 'individual_price',
        'individual button text' => 'individual_btn_text',
        'individual button url' => 'individual_btn_url',
        'corporate title' => 'corporate_title',
        'corporate button text' => 'corporate_btn_text',
        'corporate button url' => 'corporate_btn_url',
        'objectives' => 'objectives_section_content',
        'learning objectives' => 'objectives_section_content',
        'what you will learn' => 'objectives_section_content',
        'laws' => 'laws_section_content',
        'laws section' => 'laws_section_content',
        'advanced section' => 'advanced_section_description',
        'advanced' => 'advanced_section_description',
        'faq title' => 'faq_main_title',
        'faq' => 'faq_main_title',
    ];
}

function ccbm_get_importable_fields() {
    return [
        'course_title',
        'course_description',
        'duration_value',
        'course_price_title',
        'course_level_title',
        'course_category_title',
        'course_level',
        'course_category',
        'individual_price',
        'individual_btn_text',
        'individual_btn_url',
        'corporate_title',
        'corporate_btn_text',
        'corporate_btn_url',
        'objectives_section_title',
        'objectives_section_description',
        'objectives_section_content',
        'laws_section_title',
        'laws_section_description',
        'laws_section_content',
        'advanced_section_title',
        'advanced_section_description',
        'custom_output_title',
        'custom_output_description',
        'custom_output_html',
        'faq_main_title',
    ];
}

function ccbm_get_example_heading_map($example_course_id) {
    $example_course_id = absint($example_course_id);
    if (!$example_course_id) {
        return [];
    }

    $title_fields = [
        'objectives_section_title' => get_post_meta($example_course_id, 'objectives_section_title', true),
        'laws_section_title' => get_post_meta($example_course_id, 'laws_section_title', true),
        'advanced_section_title' => get_post_meta($example_course_id, 'advanced_section_title', true),
        'custom_output_title' => get_post_meta($example_course_id, 'custom_output_title', true),
        'faq_main_title' => get_post_meta($example_course_id, 'faq_main_title', true),
    ];

    $map = [];
    foreach ($title_fields as $field => $heading_text) {
        $heading_key = ccbm_normalize_heading($heading_text);
        if ($heading_key !== '') {
            $map[$heading_key] = $field;
        }
    }
    return $map;
}

function ccbm_extract_docx_sections($docx_path, $example_course_id = 0) {
    if (!class_exists('ZipArchive')) {
        return new WP_Error('ccbm_docx_missing_zip', 'ZipArchive is not available on this server.');
    }

    $zip = new ZipArchive();
    if ($zip->open($docx_path) !== true) {
        return new WP_Error('ccbm_docx_open_failed', 'Could not open the DOCX file.');
    }

    $document_xml = $zip->getFromName('word/document.xml');
    $zip->close();

    if (!$document_xml) {
        return new WP_Error('ccbm_docx_invalid', 'Invalid DOCX file (missing document.xml).');
    }

    $dom = new DOMDocument();
    libxml_use_internal_errors(true);
    $loaded = $dom->loadXML($document_xml);
    libxml_clear_errors();
    if (!$loaded) {
        return new WP_Error('ccbm_docx_parse_failed', 'Could not parse DOCX content.');
    }

    $xpath = new DOMXPath($dom);
    $xpath->registerNamespace('w', 'http://schemas.openxmlformats.org/wordprocessingml/2006/main');
    // Read paragraphs from anywhere inside body (including tables/text containers),
    // not only direct children, so import works with more DOCX layouts.
    $paragraphs = $xpath->query('//w:body//w:p');

    $sections = [];
    $example_map = ccbm_get_example_heading_map($example_course_id);
    $active_heading = '';
    $active_content = [];

    foreach ($paragraphs as $paragraph) {
        $text_nodes = $xpath->query('.//w:t', $paragraph);
        $text_parts = [];
        foreach ($text_nodes as $node) {
            $text_parts[] = $node->nodeValue;
        }
        $paragraph_text = trim(implode('', $text_parts));
        if ($paragraph_text === '') {
            continue;
        }

        $style_node = $xpath->query('./w:pPr/w:pStyle', $paragraph)->item(0);
        $style_val = '';
        if ($style_node) {
            $style_val = (string) $style_node->getAttributeNS('http://schemas.openxmlformats.org/wordprocessingml/2006/main', 'val');
            if ($style_val === '') {
                $style_val = (string) $style_node->getAttribute('w:val');
            }
        }
        $is_style_heading = (bool) preg_match('/heading|title/i', $style_val);
        $is_label_heading = ccbm_is_heading_like_line($paragraph_text, $example_map);
        $is_heading = $is_style_heading || $is_label_heading;

        if ($is_heading) {
            if ($active_heading !== '' || !empty($active_content)) {
                $sections[] = [
                    'heading' => $active_heading,
                    'content' => trim(implode("\n\n", $active_content)),
                ];
            }
            $active_heading = $paragraph_text;
            $active_content = [];
        } else {
            if ($active_heading === '') {
                $active_heading = 'Course Description';
            }
            $active_content[] = $paragraph_text;
        }
    }

    if ($active_heading !== '' || !empty($active_content)) {
        $sections[] = [
            'heading' => $active_heading,
            'content' => trim(implode("\n\n", $active_content)),
        ];
    }

    if (empty($sections)) {
        // Final fallback: merge all paragraph text into Course Description.
        $all_text_parts = [];
        foreach ($paragraphs as $paragraph) {
            $text_nodes = $xpath->query('.//w:t', $paragraph);
            $text_parts = [];
            foreach ($text_nodes as $node) {
                $text_parts[] = $node->nodeValue;
            }
            $paragraph_text = trim(implode('', $text_parts));
            if ($paragraph_text !== '') {
                $all_text_parts[] = $paragraph_text;
            }
        }

        if (!empty($all_text_parts)) {
            $sections[] = [
                'heading' => 'Course Description',
                'content' => trim(implode("\n\n", $all_text_parts)),
            ];
        } else {
            return new WP_Error('ccbm_docx_no_content', 'No readable content found in the DOCX file.');
        }
    }

    return $sections;
}

function ccbm_guess_field_from_heading($heading, $example_map = []) {
    $heading_key = ccbm_normalize_heading($heading);
    if ($heading_key === '') {
        return '';
    }

    $aliases = ccbm_heading_alias_map();
    if (isset($aliases[$heading_key])) {
        return $aliases[$heading_key];
    }

    if (isset($example_map[$heading_key])) {
        return $example_map[$heading_key];
    }

    return '';
}

function ccbm_is_heading_like_line($text, $example_map = []) {
    $text = trim((string) $text);
    if ($text === '') {
        return false;
    }

    $normalized = ccbm_normalize_heading($text);
    if ($normalized === '') {
        return false;
    }

    $aliases = ccbm_heading_alias_map();
    if (isset($aliases[$normalized]) || isset($example_map[$normalized])) {
        return true;
    }

    $char_len = function_exists('mb_strlen') ? mb_strlen($text) : strlen($text);
    if ($char_len > 90) {
        return false;
    }

    $clean_for_words = preg_replace('/[^a-zA-Z0-9 ]+/', ' ', $text);
    $word_count = str_word_count($clean_for_words);

    if (substr(trim($text), -1) === ':' && $word_count > 0 && $word_count <= 8) {
        return true;
    }

    if ($word_count > 0 && $word_count <= 6 && strpos($text, '.') === false) {
        return true;
    }

    return false;
}

function ccbm_docx_sections_to_post_data($sections, $example_course_id = 0) {
    $mapped = [];
    $unmapped = [];
    $example_map = ccbm_get_example_heading_map($example_course_id);

    foreach ($sections as $section) {
        $heading = trim($section['heading'] ?? '');
        $content = trim($section['content'] ?? '');
        if ($heading === '' && $content === '') {
            continue;
        }

        $target_field = ccbm_guess_field_from_heading($heading, $example_map);
        if ($target_field === '') {
            $unmapped[] = $section;
            continue;
        }

        if (in_array($target_field, ['objectives_section_content', 'laws_section_content', 'advanced_section_description', 'custom_output_description', 'course_description'], true)) {
            $mapped[$target_field] = wpautop($content);
        } else {
            $mapped[$target_field] = $content;
        }

        // Also auto-fill title fields for key content sections
        if ($target_field === 'objectives_section_content' && !empty($heading)) {
            $mapped['objectives_section_title'] = $heading;
            if (empty($mapped['objectives_section_description'])) {
                $mapped['objectives_section_description'] = wpautop($content);
            }
        } elseif ($target_field === 'laws_section_content' && !empty($heading)) {
            $mapped['laws_section_title'] = $heading;
            if (empty($mapped['laws_section_description'])) {
                $mapped['laws_section_description'] = wpautop($content);
            }
        } elseif ($target_field === 'advanced_section_description' && !empty($heading)) {
            $mapped['advanced_section_title'] = $heading;
        }
    }

    // Keep unmapped content safely inside description so admins do not lose data.
    if (!empty($unmapped)) {
        $fallback_parts = [];
        foreach ($unmapped as $item) {
            $h = trim($item['heading'] ?? '');
            $c = trim($item['content'] ?? '');
            if ($h !== '') {
                $fallback_parts[] = '<h3>' . esc_html($h) . '</h3>';
            }
            if ($c !== '') {
                $fallback_parts[] = wpautop($c);
            }
        }
        $fallback_html = trim(implode("\n", $fallback_parts));
        if ($fallback_html !== '') {
            $mapped['course_description'] = trim(($mapped['course_description'] ?? '') . "\n\n" . $fallback_html);
        }
    }

    return [
        'mapped' => $mapped,
        'unmapped_count' => count($unmapped),
        'total_sections' => count($sections),
    ];
}

function ccbm_import_docx_to_post_data($post_id) {
    $import_now = !empty($_POST['ccbm_docx_import_now']);
    $apply_on_save = !empty($_POST['ccbm_apply_docx_import']);
    if ((!$import_now && !$apply_on_save) || empty($_FILES['ccbm_docx_file']) || !is_array($_FILES['ccbm_docx_file'])) {
        return null;
    }

    $file = $_FILES['ccbm_docx_file'];
    if (!isset($file['error']) || (int) $file['error'] === UPLOAD_ERR_NO_FILE) {
        if ($import_now) {
            return new WP_Error('ccbm_docx_missing_file', 'Please choose a DOCX file before clicking Import DOCX Now.');
        }
        return null;
    }
    if ((int) $file['error'] !== UPLOAD_ERR_OK) {
        return new WP_Error('ccbm_docx_upload_failed', 'DOCX upload failed. Please try again.');
    }

    $ext = strtolower(pathinfo($file['name'] ?? '', PATHINFO_EXTENSION));
    if ($ext !== 'docx') {
        return new WP_Error('ccbm_docx_invalid_ext', 'Please upload a .docx file only.');
    }

    $example_course_id = isset($_POST['ccbm_example_course_id']) ? absint($_POST['ccbm_example_course_id']) : 0;
    $sections = ccbm_extract_docx_sections($file['tmp_name'], $example_course_id);
    if (is_wp_error($sections)) {
        return $sections;
    }

    $result = ccbm_docx_sections_to_post_data($sections, $example_course_id);
    $mapped = $result['mapped'];

    foreach ($mapped as $field => $value) {
        $_POST[$field] = $value;
    }

    $notice = sprintf(
        'DOCX import completed: %d of %d sections mapped. Unmapped sections appended to Course Description: %d.',
        count($mapped),
        (int) $result['total_sections'],
        (int) $result['unmapped_count']
    );
    set_transient('ccbm_docx_notice_' . get_current_user_id() . '_' . absint($post_id), $notice, 120);

    return $result;
}

/**
 * ====================================================
 * RENDER META BOX FIELDS
 * ====================================================
 */
function ccbm_render_meta_box($post) {
    wp_nonce_field('ccbm_save_meta', 'ccbm_meta_nonce');

    $fields = [
        'banner_gradient', 'banner_bg_hex', 'banner_bg_rgb',
        'course_title', 'course_description',
        'duration_title', 'duration_value',
        'course_price_title', 'course_level_title', 'course_category_title',
        'individual_title', 'individual_price', 'individual_currency_symbol', 'individual_btn_text', 'individual_btn_url',
        'individual_btn_text_hex', 'individual_btn_text_rgb',
        'individual_btn_bg_hex', 'individual_btn_bg_rgb',
        'individual_btn_border_hex', 'individual_btn_border_rgb',
        'individual_btn_hover_hex', 'individual_btn_hover_rgb',
        'corporate_title', 'corporate_btn_text', 'corporate_btn_url',
        'course_level', 'course_category',
        'corporate_btn_text_hex', 'corporate_btn_text_rgb',
        'corporate_btn_bg_hex', 'corporate_btn_bg_rgb',
        'corporate_btn_border_hex', 'corporate_btn_border_rgb',
        'corporate_btn_hover_hex', 'corporate_btn_hover_rgb',
        'video_url',
        'objectives_section_title',
        'objectives_section_description',
        'objectives_section_content',
        'laws_section_title',
        'laws_section_description'
    ];

    $values = [];
    foreach ($fields as $field) {
        $values[$field] = get_post_meta($post->ID, $field, true);
    }

    $docx_notice = get_transient('ccbm_docx_notice_' . get_current_user_id() . '_' . absint($post->ID));
    if ($docx_notice) {
        delete_transient('ccbm_docx_notice_' . get_current_user_id() . '_' . absint($post->ID));
    }
    ?>

    <!-- ===== ADMIN TOOLBAR ===== -->
    <div class="admin-meta-toolbar">
        <div class="toolbar-left">
            <label for="meta-quick-nav"><strong>Quick navigate</strong></label>
            <select id="meta-quick-nav"></select>
        </div>
        <div class="toolbar-right">
            <button type="button" class="button button-secondary" id="collapse-all">Collapse all</button>
            <button type="button" class="button button-primary" id="expand-all">Expand all</button>
        </div>
    </div>

    <style>
        .admin-meta-toolbar {
            position: sticky;
            top: 0;
            z-index: 10;
            background: #fff;
            border: 1px solid #e2e8f0;
            padding: 10px 12px;
            margin: 0 0 14px 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.04);
        }
        .banner-section-box {
            border: 1px solid #e2e8f0;
            margin-bottom: 30px;
            border-radius: 8px;
            background: #fff;
            box-shadow: 0 6px 12px rgba(17,24,39,0.04);
        }
        .banner-section-box h3 {
            margin: 0;
            background: linear-gradient(180deg, #f8fafc, #f1f5f9);
            border-bottom: 1px solid #e5e7eb;
            padding: 12px 16px;
            font-size: 15px;
            font-weight: 600;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
        }
        .banner-section-box .box-inner {
            padding: 24px !important;
        }
        .banner-section-box.collapsed .box-inner { display: none; }
        .banner-field {
            display: grid;
            grid-template-columns: 220px 1fr;
            gap: 12px 18px;
            margin-bottom: 18px !important;
            padding: 0 2px;
        }
        .hero-course-info-fields {
            padding: 8px 4px 12px !important;
            box-sizing: border-box;
        }
        .hero-preview-panel {
            display: none;
            border: 1px solid #d8e0eb;
            border-radius: 12px;
            background: #ffffff;
            overflow: hidden;
            box-shadow: 0 8px 18px rgba(15, 23, 42, 0.08);
        }
        .hero-preview-main {
            display: grid;
            grid-template-columns: minmax(0, 1.1fr) minmax(0, 0.9fr);
            gap: 0;
            align-items: stretch;
        }
        .hero-preview-header {
            padding: 24px;
            color: #ffffff;
            background: #576094;
        }
        .hero-preview-title {
            margin: 0 0 12px;
            font-size: 24px;
            line-height: 1.3;
            font-weight: 700;
        }
        .hero-preview-desc {
            font-size: 14px;
            line-height: 1.65;
            opacity: 0.98;
        }
        .hero-preview-desc p {
            margin: 0 0 10px;
            color: inherit !important;
        }
        .hero-preview-desc p:last-child {
            margin-bottom: 0;
        }
        .hero-preview-media {
            padding: 18px;
            background: #f3f6fb;
            border-left: 1px solid #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 280px;
        }
        .hero-preview-media > * {
            width: 100%;
            max-height: 250px;
            border-radius: 10px;
            object-fit: contain;
            background: #ffffff;
        }
        .hero-preview-cta {
            padding: 16px 18px;
            border-top: 1px solid #e5e7eb;
            background: #ffffff;
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            justify-content: flex-start;
            align-items: center;
        }
        @media (max-width: 900px) {
            .hero-preview-main {
                grid-template-columns: 1fr;
            }
            .hero-preview-media {
                border-left: 0;
                border-top: 1px solid #e5e7eb;
            }
        }
        .banner-field input[type=text],
        .banner-field input[type=url],
        .banner-field input[type=number],
        .banner-field input[type=email],
        .banner-field textarea,
        .banner-field select {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            line-height: 1.4;
            box-sizing: border-box;
        }
        .banner-field label { font-weight: 600; }
    </style>

   <!-- DOCX Import Section -->
<div class="banner-section-box" data-section="DOCX Import">
    <h3><span>📄 DOCX Auto Import</span><span class="caret">▾</span></h3>
    <div class="box-inner">
        <?php if (!empty($docx_notice)) : ?>
            <div style="margin-bottom:12px; padding:10px 12px; border:1px solid #bbf7d0; background:#f0fdf4; border-radius:6px; color:#166534;">
                <?php echo esc_html($docx_notice); ?>
            </div>
        <?php endif; ?>
        <p style="margin-top:0;">
            Upload a <strong>.docx</strong> file with proper headings. The plugin maps headings to course meta fields and fills content automatically.
        </p>
        <div class="banner-field">
            <label for="ccbm_docx_file">Upload DOCX</label>
            <input type="file" id="ccbm_docx_file" name="ccbm_docx_file" accept=".docx,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
        </div>
        <div class="banner-field">
            <label for="ccbm_example_course_id">Example Course (optional)</label>
            <select id="ccbm_example_course_id" name="ccbm_example_course_id">
                <option value="">Use default heading mapping</option>
                <?php
                $example_courses = get_posts([
                    'post_type' => ccbm_get_course_post_types(),
                    'posts_per_page' => 200,
                    'post_status' => ['publish', 'draft', 'pending', 'private'],
                    'post__not_in' => [$post->ID],
                    'orderby' => 'title',
                    'order' => 'ASC',
                ]);
                $selected_example = isset($_POST['ccbm_example_course_id']) ? absint($_POST['ccbm_example_course_id']) : 0;
                foreach ($example_courses as $example_course) :
                ?>
                    <option value="<?php echo esc_attr($example_course->ID); ?>" <?php selected($selected_example, $example_course->ID); ?>>
                        <?php echo esc_html($example_course->post_title . ' (#' . $example_course->ID . ')'); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="banner-field">
            <label>Start Import</label>
            <div style="display:flex; align-items:center; gap:10px;">
                <button type="submit" class="button button-primary" name="ccbm_docx_import_now" value="1">
                    Import DOCX Now
                </button>
                <span style="color:#475569;">Uploads and maps content instantly on click.</span>
            </div>
        </div>
        <p style="margin-bottom:0; color:#475569;">
            Suggested headings: <em>Course Title, Course Description, Objectives, Laws, Advanced Section, FAQ</em>.
        </p>
    </div>
</div>

   <!-- Hero Section -->
<div class="banner-section-box" data-section="Hero Section">
    <h3><span>🎨 Hero Section</span><span class="caret">▾</span></h3>
    <div class="box-inner">

        <!-- Enhanced Color Picker with Tabs -->
        <div class="wp-style-color-picker-wrapper">
            <label><strong>Banner Background</strong></label>
            
            <!-- Tab Navigation -->
            <div class="color-picker-tabs">
                <button type="button" class="color-tab-btn <?php echo empty($values['banner_gradient']) ? 'active' : ''; ?>" data-tab="solid-banner">Solid</button>
                <button type="button" class="color-tab-btn <?php echo !empty($values['banner_gradient']) ? 'active' : ''; ?>" data-tab="gradient-banner">Gradient</button>
            </div>

            <!-- Solid Color Tab -->
            <div id="solid-banner-tab" class="color-tab-content <?php echo empty($values['banner_gradient']) ? 'active' : ''; ?>">
                <div class="banner-field" style="display:flex; align-items:center; gap:12px; margin-top:10px;">
                    <input type="color" id="banner_bg_colorpicker"
                        value="<?php echo esc_attr($values['banner_bg_hex'] ?: '#ffffff'); ?>"
                        style="width:60px;height:40px; border-radius:4px; cursor:pointer;">
                    <input type="text" name="banner_bg_hex" id="banner_bg_hex_input"
                        value="<?php echo esc_attr($values['banner_bg_hex']); ?>"
                        placeholder="#ffffff"
                        style="flex:1; padding:8px; border:1px solid #cbd5e1; border-radius:4px; max-width:200px;">
                </div>
            </div>

            <!-- Gradient Tab -->
            <div id="gradient-banner-tab" class="color-tab-content <?php echo !empty($values['banner_gradient']) ? 'active' : ''; ?>">
                <div class="banner-field" style="margin-top:10px;">
                    <label><strong>Gradient Direction</strong></label>
                    <select id="gradient-direction" style="width:100%;max-width:250px; padding:6px; border:1px solid #cbd5e1; border-radius:4px;">
                        <option value="to bottom" <?php echo (strpos($values['banner_gradient'], 'to bottom') !== false) ? 'selected' : ''; ?>>Top → Bottom</option>
                        <option value="to right" <?php echo (strpos($values['banner_gradient'], 'to right') !== false) ? 'selected' : ''; ?>>Left → Right</option>
                        <option value="to bottom right" <?php echo (strpos($values['banner_gradient'], 'to bottom right') !== false) ? 'selected' : ''; ?>>Diagonal ↘</option>
                        <option value="to top right" <?php echo (strpos($values['banner_gradient'], 'to top right') !== false) ? 'selected' : ''; ?>>Diagonal ↗</option>
                        <option value="135deg" <?php echo (strpos($values['banner_gradient'], '135deg') !== false) ? 'selected' : ''; ?>>135°</option>
                        <option value="45deg" <?php echo (strpos($values['banner_gradient'], '45deg') !== false) ? 'selected' : ''; ?>>45°</option>
                    </select>
                </div>

                <div class="banner-field" style="display:flex; align-items:center; gap:12px; margin-top:10px;">
                    <div style="flex:1;">
                        <label><strong>Start Color</strong></label>
                        <div style="display:flex; align-items:center; gap:8px;">
                            <?php
                            $gradient_colors = [];
                            if (!empty($values['banner_gradient'])) {
                                preg_match_all('/#(?:[0-9a-fA-F]{3}){1,2}/', $values['banner_gradient'], $matches);
                                $gradient_colors = $matches[0] ?? [];
                            }
                            $start_color = !empty($gradient_colors[0]) ? $gradient_colors[0] : '#1abc9c';
                            $end_color = !empty($gradient_colors[1]) ? $gradient_colors[1] : '#16a085';
                            ?>
                            <input type="color" id="gradient-start" value="<?php echo esc_attr($start_color); ?>" style="width:60px;height:40px; border-radius:4px; cursor:pointer;">
                            <input type="text" id="gradient-start-hex" value="<?php echo esc_attr($start_color); ?>" placeholder="#1abc9c" style="flex:1; padding:8px; border:1px solid #cbd5e1; border-radius:4px; max-width:150px;">
                        </div>
                    </div>
                </div>

                <div class="banner-field" style="display:flex; align-items:center; gap:12px; margin-top:10px;">
                    <div style="flex:1;">
                        <label><strong>End Color</strong></label>
                        <div style="display:flex; align-items:center; gap:8px;">
                            <input type="color" id="gradient-end" value="<?php echo esc_attr($end_color); ?>" style="width:60px;height:40px; border-radius:4px; cursor:pointer;">
                            <input type="text" id="gradient-end-hex" value="<?php echo esc_attr($end_color); ?>" placeholder="#16a085" style="flex:1; padding:8px; border:1px solid #cbd5e1; border-radius:4px; max-width:150px;">
                            <button type="button" id="gradient-swap-btn" style="padding:6px 12px; border:1px solid #cbd5e1; border-radius:4px; background:#f8fafc; cursor:pointer; white-space:nowrap;">🔄 Swap</button>
                        </div>
                    </div>
                </div>

                <input type="text" 
                    name="banner_gradient"
                    id="banner_gradient"
                    value="<?php echo esc_attr($values['banner_gradient']); ?>" 
                    placeholder="Auto-generated gradient"
                    style="width:100%;margin-top:10px; padding:8px; border:1px solid #cbd5e1; border-radius:4px; background:#f8fafc; color:#64748b;">
            </div>

            <!-- Live Preview -->
            <div id="banner-bg-preview" style="margin-top:15px;width:100%;height:80px;border:2px solid #cbd5e1;border-radius:8px;background:<?php echo esc_attr($values['banner_gradient'] ?: $values['banner_bg_hex'] ?: '#ffffff'); ?>; box-shadow:0 2px 4px rgba(0,0,0,0.1);"></div>
        </div>

<style>
.wp-style-color-picker-wrapper {
    margin-bottom: 15px;
}
.color-picker-tabs {
    display: flex;
    gap: 4px;
    margin-top: 10px;
    border-bottom: 1px solid #cbd5e1;
}
.color-tab-btn {
    padding: 8px 16px;
    background: transparent;
    border: none;
    border-bottom: 2px solid transparent;
    cursor: pointer;
    font-size: 13px;
    font-weight: 500;
    color: #64748b;
    transition: all 0.2s ease;
    margin-bottom: -1px;
}
.color-tab-btn:hover {
    color: #1e293b;
    background: #f8fafc;
}
.color-tab-btn.active {
    color: #2271b1;
    border-bottom-color: #2271b1;
    background: #f0f6fc;
}
.color-tab-content {
    display: none;
    padding-top: 15px;
}
.color-tab-content.active {
    display: block;
}
</style>

<script>
document.addEventListener("DOMContentLoaded", function() {
    // Tab switching
    const tabButtons = document.querySelectorAll('.color-tab-btn[data-tab^="solid-banner"], .color-tab-btn[data-tab^="gradient-banner"]');
    const tabContents = document.querySelectorAll('#solid-banner-tab, #gradient-banner-tab');
    
    tabButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            const targetTab = this.getAttribute('data-tab');
            
            // Remove active class from all tabs
            tabButtons.forEach(b => b.classList.remove('active'));
            tabContents.forEach(c => c.classList.remove('active'));
            
            // Add active class to clicked tab
            this.classList.add('active');
            if (targetTab === 'solid-banner') {
                document.getElementById('solid-banner-tab').classList.add('active');
            } else {
                document.getElementById('gradient-banner-tab').classList.add('active');
            }
            
            // Update preview
            if (targetTab === 'solid-banner') {
                updateSolidBanner();
            } else {
                updateGradientBanner();
            }
        });
    });

    // Solid color elements
    const solidPicker = document.getElementById('banner_bg_colorpicker');
    const solidInput = document.getElementById('banner_bg_hex_input');
    const preview = document.getElementById('banner-bg-preview');

    // Gradient elements
    const gradStart = document.getElementById('gradient-start');
    const gradStartHex = document.getElementById('gradient-start-hex');
    const gradEnd = document.getElementById('gradient-end');
    const gradEndHex = document.getElementById('gradient-end-hex');
    const gradDir = document.getElementById('gradient-direction');
    const gradInput = document.getElementById('banner_gradient');
    const swapBtn = document.getElementById('gradient-swap-btn');

    function updateSolidBanner() {
        const color = solidPicker.value;
        solidInput.value = color;
        preview.style.background = color;
        // Clear gradient when using solid
        gradInput.value = '';
    }

    function updateGradientBanner() {
        const dir = gradDir.value;
        const start = gradStart.value;
        const end = gradEnd.value;
        const css = `linear-gradient(${dir}, ${start}, ${end})`;
        gradInput.value = css;
        gradStartHex.value = start;
        gradEndHex.value = end;
        preview.style.background = css;
        // Clear solid when using gradient
        solidInput.value = '';
    }

    // Solid color sync - always update the input value for saving
    solidPicker.addEventListener('input', function() {
        const color = this.value;
        solidInput.value = color;
        // Always clear gradient input so solid color takes precedence
        if (gradInput) {
            gradInput.value = '';
        }
        // Update preview only if tab is active
        if (document.getElementById('solid-banner-tab').classList.contains('active')) {
            preview.style.background = color;
        }
    });
    solidInput.addEventListener('input', function() {
        if (/^#[0-9A-F]{6}$/i.test(this.value)) {
            const color = this.value;
            solidPicker.value = color;
            // Always clear gradient input so solid color takes precedence
            if (gradInput) {
                gradInput.value = '';
            }
            // Update preview only if tab is active
            if (document.getElementById('solid-banner-tab').classList.contains('active')) {
                preview.style.background = color;
            }
        }
    });

    // Gradient color sync
    gradStart.addEventListener('input', function() {
        gradStartHex.value = this.value;
        if (document.getElementById('gradient-banner-tab').classList.contains('active')) {
            updateGradientBanner();
        }
    });
    gradStartHex.addEventListener('input', function() {
        if (/^#[0-9A-F]{6}$/i.test(this.value)) {
            gradStart.value = this.value;
            if (document.getElementById('gradient-banner-tab').classList.contains('active')) {
                updateGradientBanner();
            }
        }
    });
    gradEnd.addEventListener('input', function() {
        gradEndHex.value = this.value;
        if (document.getElementById('gradient-banner-tab').classList.contains('active')) {
            updateGradientBanner();
        }
    });
    gradEndHex.addEventListener('input', function() {
        if (/^#[0-9A-F]{6}$/i.test(this.value)) {
            gradEnd.value = this.value;
            if (document.getElementById('gradient-banner-tab').classList.contains('active')) {
                updateGradientBanner();
            }
        }
    });
    gradDir.addEventListener('change', function() {
        if (document.getElementById('gradient-banner-tab').classList.contains('active')) {
            updateGradientBanner();
        }
    });

    // Swap gradient colors
    swapBtn.addEventListener('click', function() {
        const temp = gradStart.value;
        gradStart.value = gradEnd.value;
        gradEnd.value = temp;
        gradStartHex.value = gradStart.value;
        gradEndHex.value = gradEnd.value;
        updateGradientBanner();
    });

    // Initialize preview
    if (document.getElementById('solid-banner-tab').classList.contains('active')) {
        updateSolidBanner();
    } else {
        updateGradientBanner();
    }
});
</script>



<!-- ======= Course Info (inside Hero Section) ======= -->
  <hr style="margin:18px 0;border:0;border-top:1px solid #e2e8f0;">
  <h4 style="margin:0 0 12px;font-size:14px;font-weight:700;color:#1e293b;">📘 Hero Content</h4>
  <div class="hero-course-info-fields" style="min-height: 460px;">

    <div class="banner-field">
      <label>Enter the Course Title</label>
      <input type="text" name="course_title" value="<?php echo esc_attr($values['course_title']); ?>" style="width:100%;">
    </div>

    <div class="banner-field">
      <label><strong>Enter the Course Description</strong></label>
      <?php
        $editor_id = 'course_description_editor';
        wp_editor(
          $values['course_description'],
          $editor_id,
          array(
            'textarea_name' => 'course_description',
            'media_buttons' => true,   // "Add Media" button
            'teeny'         => false,  // Full editor toolbar
            'quicktags'     => true,   // Text/HTML mode
            'textarea_rows' => 14,
          )
        );
      ?>
    </div>

    <h4 style="margin:0 0 12px;font-size:14px;font-weight:700;color:#1e293b;">🎥 Hero Media</h4>

    <!-- Input field -->
    <div class="banner-field">
        <label>Media URL (Video / Image / GIF / YouTube / Vimeo)</label>
        <input type="text" name="video_url" value="<?php echo esc_attr($values['video_url']); ?>" placeholder="Paste any media URL here">
    </div>

    <!-- Upload button + Preview -->
    <div class="banner-field">
        <label>Upload Media</label>

        <div style="display:flex; gap:12px; align-items:center;">
            <input type="text" id="video_url_upload" 
                placeholder="Upload or select media"
                style="flex:1; padding:7px; border:1px solid #cbd5e1; border-radius:6px;"
            >
            <button type="button" class="button upload_media_button">Upload</button>
        </div>
    </div>

    <!-- Live Preview -->
    <div class="banner-field" style="grid-template-columns: 1fr;">
        <label>Preview</label>

        <div id="media_preview" 
            style="
                width:100%; 
                height:300px; 
                border:1px solid #e2e8f0; 
                border-radius:8px; 
                background:#f8fafc; 
                display:flex;
                align-items:center;
                justify-content:center;
                overflow:hidden;
            "
        >
            <?php if (!empty($values['video_url'])): ?>
                <?php
                $url = esc_url($values['video_url']);
                $ext = pathinfo($url, PATHINFO_EXTENSION);
                ?>

                <?php if (in_array($ext, ['jpg','jpeg','png','webp','gif'])): ?>
                    <img src="<?php echo $url; ?>" style="max-width:100%; max-height:100%; object-fit:contain;">
                <?php elseif (in_array($ext, ['mp4','webm','ogg'])): ?>
                    <video src="<?php echo $url; ?>" controls style="max-width:100%; max-height:100%;"></video>
                <?php else: ?>
                    <iframe src="<?php echo $url; ?>" style="width:100%; height:100%; border:0;"></iframe>
                <?php endif; ?>
            <?php else: ?>
                <em>No media selected</em>
            <?php endif; ?>
        </div>
    </div>

    <hr style="margin:18px 0;border:0;border-top:1px solid #e2e8f0;">
    <div class="banner-field" style="grid-template-columns: 1fr;">
        <label><strong>Hero Section Preview</strong></label>
        <div>
            <button type="button" class="button button-primary" id="hero-preview-btn">Preview Hero Section</button>
        </div>
    </div>
    <div class="banner-field" style="grid-template-columns: 1fr;">
        <div id="hero_preview_panel" class="hero-preview-panel">
            <div class="hero-preview-main">
                <div id="hero_preview_header" class="hero-preview-header">
                    <h2 id="hero_preview_title" class="hero-preview-title"></h2>
                    <div id="hero_preview_desc" class="hero-preview-desc"></div>
                </div>
                <div id="hero_preview_media" class="hero-preview-media"></div>
            </div>
            <div id="hero_preview_cta" class="hero-preview-cta"></div>
        </div>
    </div>

  </div>
</div>
</div>


<!-- ======= Course Details Section ======= -->
<div class="banner-section-box" data-section="Course Details">
  <h3><span>📋 Course Details</span><span class="box-actions"><span class="caret">▾</span></span></h3>
  <div class="box-inner">

    <div class="banner-field">
      <label>Course Duration Text</label>
      <input type="text" name="duration_title" value="<?php echo esc_attr($values['duration_title'] ?: 'Course Duration'); ?>" style="width:100%;">
    </div>
    <div class="banner-field">
      <label>Course Duration</label>
      <?php
        $editor_id = 'duration_value_editor';
        wp_editor(
          ($values['duration_value'] ?: 'N/A'),
          $editor_id,
          array(
            'textarea_name' => 'duration_value',
            'media_buttons' => false,  // No need for media button here
            'teeny'         => true,   // Compact toolbar
            'quicktags'     => true,   // Enable Text/HTML mode
            'textarea_rows' => 5,
          )
        );
      ?>
    </div>

    <div class="banner-field">
      <label>Course Price Text</label>
      <input type="text" name="course_price_title" value="<?php echo esc_attr($values['course_price_title'] ?: 'Course Price'); ?>" style="width:100%; margin-bottom:8px;">
      <label style="display:block; margin:0 0 6px;">Course Price</label>
      <input type="text" name="individual_price" value="<?php echo esc_attr($values['individual_price']); ?>">
    </div>
    <div class="banner-field">
      <label>Currency Symbol</label>
      <input type="text" name="individual_currency_symbol" value="<?php echo esc_attr($values['individual_currency_symbol'] ?: '$'); ?>" maxlength="5" style="width:100px;">
      <p class="description" style="margin-top:5px; color:#64748b; font-size:12px;">Leave empty or use $ for default. You can use any currency symbol or text.</p>
    </div>
    <div class="banner-field">
      <label>Course Level Text</label>
      <input type="text" name="course_level_title" value="<?php echo esc_attr($values['course_level_title'] ?: 'Course Level'); ?>" style="width:100%; margin-bottom:8px;">
      <label style="display:block; margin:0 0 6px;">Course Level</label>
      <input type="text" name="course_level" value="<?php echo esc_attr($values['course_level'] ?: 'Beginner Level'); ?>">
    </div>
    <div class="banner-field">
      <label>Course Category Text</label>
      <input type="text" name="course_category_title" value="<?php echo esc_attr($values['course_category_title'] ?: 'Course Category'); ?>" style="width:100%; margin-bottom:8px;">
      <label style="display:block; margin:0 0 6px;">Course Category</label>
      <input type="text" name="course_category" value="<?php echo esc_attr($values['course_category']); ?>">
    </div>

  </div>
</div>


    <!-- Individual Box -->
    <div class="banner-section-box" data-section="Individual Box">
        <h3><span>👤 Individual Box Content</span><span class="box-actions"><span class="caret">▾</span></span></h3>
        <div class="box-inner">
        <div class="banner-field">
            <label>Enter the Title (e.g., Individual)</label>
            <input type="text" name="individual_title" value="<?php echo esc_attr($values['individual_title'] ?: 'For Individual'); ?>">
        </div>
        <div class="banner-field">
            <label>Enter the Button Text</label>
            <input type="text" name="individual_btn_text" value="<?php echo esc_attr($values['individual_btn_text'] ?: 'Buy Course'); ?>">
        </div>
        <div class="banner-field">
            <label>Enter the Button URL</label>
            <input type="text" name="individual_btn_url" value="<?php echo esc_attr($values['individual_btn_url']); ?>">
        </div>
        <div class="banner-field">
            <label>Enter the Button Text Color (Hex)</label>
            <input type="text" name="individual_btn_text_hex" value="<?php echo esc_attr($values['individual_btn_text_hex']); ?>">
        </div>
        <div class="banner-field">
            <label>Enter the Button Background Color (Hex)</label>
            <input type="text" name="individual_btn_bg_hex" value="<?php echo esc_attr($values['individual_btn_bg_hex']); ?>">
        </div>
        <div class="banner-field">
            <label>Enter the Button Border Color (Hex)</label>
            <input type="text" name="individual_btn_border_hex" value="<?php echo esc_attr($values['individual_btn_border_hex']); ?>">
        </div>
        <div class="banner-field">
            <label>Enter the Button Hover Color (Hex)</label>
            <input type="text" name="individual_btn_hover_hex" value="<?php echo esc_attr($values['individual_btn_hover_hex']); ?>">
        </div>
        </div>
    </div>

    <!-- Corporate Box -->
    <div class="banner-section-box" data-section="Corporate Box">
        <h3><span>🏢 Corporate Box Content</span><span class="box-actions"><span class="caret">▾</span></span></h3>
        <div class="box-inner">
        <div class="banner-field">
            <label>Enter the Title (e.g., Corporate) </label>
            <input type="text" name="corporate_title" value="<?php echo esc_attr($values['corporate_title'] ?: 'Corporate'); ?>">
        </div>
        <div class="banner-field">
            <label>Enter the Button Text</label>
            <input type="text" name="corporate_btn_text" value="<?php echo esc_attr($values['corporate_btn_text'] ?: 'Request Demo'); ?>">
        </div>
        <div class="banner-field">
            <label>Enter the Button URL</label>
            <input type="text" name="corporate_btn_url" value="<?php echo esc_attr($values['corporate_btn_url'] ?: 'https://succeedlearn.com/contact-us/'); ?>">
        </div>
        <div class="banner-field">
            <label>Enter the Button Text Color (Hex)</label>
            <input type="text" name="corporate_btn_text_hex" value="<?php echo esc_attr($values['corporate_btn_text_hex'] ?: '#ffffff'); ?>">
        </div>
        <div class="banner-field">
            <label>Enter the Button Background Color (Hex)</label>
            <input type="text" name="corporate_btn_bg_hex" value="<?php echo esc_attr($values['corporate_btn_bg_hex'] ?: '#FFFFFF33'); ?>">
        </div>
        <div class="banner-field">
            <label>Enter the Button Border Color (Hex)</label>
            <input type="text" name="corporate_btn_border_hex" value="<?php echo esc_attr($values['corporate_btn_border_hex'] ?: '#ffffff'); ?>">
        </div>
        <div class="banner-field">
            <label>Enter the Button Hover Color (Hex)</label>
            <input type="text" name="corporate_btn_hover_hex" value="<?php echo esc_attr($values['corporate_btn_hover_hex']); ?>">
        </div>

        </div>
    </div>

<script>
jQuery(document).ready(function($){
    // WordPress Media Uploader
    $('.upload_media_button').on('click', function(e){
        e.preventDefault();
        var frame = wp.media({
            title: 'Select or Upload Media',
            button: { text: 'Use this media' },
            multiple: false
        });

        frame.on('select', function(){
            var attachment = frame.state().get('selection').first().toJSON();

            $('input[name="video_url"]').val(attachment.url);
            $('#video_url_upload').val(attachment.url);

            // Update Preview
            let url = attachment.url;
            let ext = url.split('.').pop().toLowerCase();

            let preview = '';

            if (['jpg','jpeg','png','webp','gif'].includes(ext)) {
                preview = `<img src="${url}" style="max-width:100%; max-height:100%; object-fit:contain;">`;
            } else if (['mp4','webm','ogg'].includes(ext)) {
                preview = `<video src="${url}" controls style="max-width:100%; max-height:100%;"></video>`;
            } else {
                preview = `<iframe src="${url}" style="width:100%; height:100%; border:0;"></iframe>`;
            }

            $('#media_preview').html(preview);
        });

        frame.open();
    });

    function escapeHtml(value) {
        return String(value || '')
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#039;');
    }

    function getCourseDescriptionHtml() {
        if (typeof tinyMCE !== 'undefined' && tinyMCE.get('course_description_editor')) {
            return tinyMCE.get('course_description_editor').getContent() || '';
        }
        return $('textarea[name="course_description"]').val() || '';
    }

    function renderHeroPreview() {
        const title = $('input[name="course_title"]').val() || 'Course Title';
        const descHtml = getCourseDescriptionHtml();
        const mediaUrl = $('input[name="video_url"]').val() || '';
        const bannerBg = $('input[name="banner_gradient"]').val() || $('input[name="banner_bg_hex"]').val() || '#576094';

        const individualText = $('input[name="individual_btn_text"]').val() || '';
        const individualUrl = $('input[name="individual_btn_url"]').val() || '#';
        const corporateText = $('input[name="corporate_btn_text"]').val() || '';
        const corporateUrl = $('input[name="corporate_btn_url"]').val() || '#';
        const individualTextColor = $('input[name="individual_btn_text_hex"]').val() || '#ffffff';
        const individualBg = $('input[name="individual_btn_bg_hex"]').val() || '#1472ba';
        const corporateTextColor = $('input[name="corporate_btn_text_hex"]').val() || '#ffffff';
        const corporateBg = $('input[name="corporate_btn_bg_hex"]').val() || '#576094';

        $('#hero_preview_header').css('background', bannerBg);
        $('#hero_preview_title').text(title);
        $('#hero_preview_desc').html(descHtml || '<em>No description added.</em>');

        let mediaHtml = '<em style="color:#64748b;">No media selected.</em>';
        if (mediaUrl) {
            const cleanUrl = mediaUrl.trim();
            const ext = cleanUrl.split('.').pop().toLowerCase().split('?')[0];
            if (['jpg', 'jpeg', 'png', 'webp', 'gif'].includes(ext)) {
                mediaHtml = `<img src="${escapeHtml(cleanUrl)}" alt="Hero media preview">`;
            } else if (['mp4', 'webm', 'ogg'].includes(ext)) {
                mediaHtml = `<video src="${escapeHtml(cleanUrl)}" controls></video>`;
            } else {
                mediaHtml = `<iframe src="${escapeHtml(cleanUrl)}" style="width:100%; height:250px; border:0;" allowfullscreen></iframe>`;
            }
        }
        $('#hero_preview_media').html(mediaHtml);

        const ctaButtons = [];
        if (individualText) {
            ctaButtons.push(`<a href="${escapeHtml(individualUrl)}" target="_blank" rel="noopener noreferrer" style="display:inline-block; text-decoration:none; padding:10px 16px; border-radius:6px; color:${escapeHtml(individualTextColor)}; background:${escapeHtml(individualBg)};">${escapeHtml(individualText)}</a>`);
        }
        if (corporateText) {
            ctaButtons.push(`<a href="${escapeHtml(corporateUrl)}" target="_blank" rel="noopener noreferrer" style="display:inline-block; text-decoration:none; padding:10px 16px; border-radius:6px; color:${escapeHtml(corporateTextColor)}; background:${escapeHtml(corporateBg)};">${escapeHtml(corporateText)}</a>`);
        }
        $('#hero_preview_cta').html(ctaButtons.length ? ctaButtons.join('') : '<em style="color:#64748b;">No CTA buttons configured.</em>');

        $('#hero_preview_panel').show();
    }

    $('#hero-preview-btn').on('click', function(e) {
        e.preventDefault();
        renderHeroPreview();
    });
});
</script>


<!-- ======= Scroll Section ======= -->
<div class="banner-section-box" data-section="Scroll Section">
  <h3><span>📜 Learning Objectives Section Content</span><span class="box-actions"><span class="caret">▾</span></span></h3>
  <div class="box-inner">

    <div class="banner-field">
      <label>Enter the Section Title</label>
      <input type="text" name="objectives_section_title"
             value="<?php echo esc_attr($values['objectives_section_title']); ?>"
             style="width:100%;">
    </div>

    <div class="banner-field">
      <label>Enter the Section Description</label>
      <?php
      wp_editor(
        $values['objectives_section_description'],
        'objectives_section_description',
        array(
          'textarea_name' => 'objectives_section_description',
          'media_buttons' => true,   // Enable Add Media
          'teeny'         => false,  // Full toolbar
          'quicktags'     => true,   // Text/HTML tab
          'textarea_rows' => 6,
          'tinymce'       => array(
            'toolbar1' => 'formatselect,bold,italic,underline,forecolor,backcolor,bullist,numlist,blockquote,link,unlink,undo,redo',
            'toolbar2' => 'alignleft,aligncenter,alignright,alignjustify,outdent,indent,removeformat,subscript,superscript,pastetext',
            'plugins'  => 'lists,link,wordpress,wpautoresize,hr,media,paste,textcolor,colorpicker,charmap',
          ),
        )
      );
      ?>
    </div>

    <div class="banner-field">
      <label>Enter the Section Content</label>
      <?php
      wp_editor(
        $values['objectives_section_content'],
        'objectives_section_content',
        array(
          'textarea_name' => 'objectives_section_content',
          'media_buttons' => true,
          'teeny'         => false,
          'quicktags'     => true,
          'textarea_rows' => 12,
          'tinymce'       => array(
            'toolbar1' => 'formatselect,bold,italic,underline,forecolor,backcolor,bullist,numlist,blockquote,link,unlink,undo,redo',
            'toolbar2' => 'alignleft,aligncenter,alignright,alignjustify,outdent,indent,removeformat,subscript,superscript,pastetext',
            'plugins'  => 'lists,link,wordpress,wpautoresize,hr,media,paste,textcolor,colorpicker,charmap',
          ),
        )
      );
      ?>
    </div>

  </div>
</div>

<!-- Why This Course -->
<div class="banner-section-box" data-section="Why This Course">
    <h3><span>📚 Why This Course Content</span><span class="box-actions"><span class="caret">▾</span></span></h3>
    <div class="box-inner">

    <?php
    $extra_title = get_post_meta($post->ID, 'extra_info_title', true);
    $extra_title_color = get_post_meta($post->ID, 'extra_info_title_color', true);
    $grid_title_color = get_post_meta($post->ID, 'extra_info_grid_title_color', true);
    $grid_items = get_post_meta($post->ID, 'extra_info_grid', true);
    
    // Initialize empty array if no items exist
    if (!is_array($grid_items)) $grid_items = [];
    
    // If empty, add one default item for easier start
    if (empty($grid_items)) {
        $grid_items = [['title' => '', 'desc' => '']];
    }
    ?>

    <div class="banner-field">
        <label><strong>Enter the Main Title</strong></label>
        <input type="text" name="extra_info_title" value="<?php echo esc_attr($extra_title); ?>" placeholder="e.g., Key Learning Areas" style="width:100%;">
    </div>

    <div class="banner-field">
        <label><strong>Choose the Title text Color</strong></label>
        <input type="color" name="extra_info_title_color" value="<?php echo esc_attr($extra_title_color ?: '#000000'); ?>">
    </div>

    <div class="banner-field">
        <label><strong>Choose the Grid Title text Color</strong></label>
        <input type="color" name="extra_info_grid_title_color" value="<?php echo esc_attr($grid_title_color ?: '#000000'); ?>">
    </div>

    <div id="extra-info-grid-container">
        <?php foreach ($grid_items as $i => $item): ?>
            <div class="grid-item-group" style="margin-bottom:15px; border:1px solid #ddd; padding:10px; background:#fff; position:relative;">
                <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:8px;">
                    <strong>Why this course point <?php echo $i + 1; ?></strong>
                    <button type="button" class="button remove-grid-item" style="color:red; background:#fff; border:1px solid #dc3232;">Remove Point</button>
                </div>
                <input type="text" name="extra_info_grid[<?php echo $i; ?>][title]" value="<?php echo esc_attr($item['title']); ?>" placeholder="Title" style="width:100%; margin-top:5px; margin-bottom:5px;">
                <label><strong>Description</strong></label>
            <?php
            $editor_id = 'extra_info_grid_' . $i . '_desc';
            wp_editor(
                $item['desc'],
                $editor_id,
                array(
                    'textarea_name' => "extra_info_grid[{$i}][desc]",
                    'media_buttons' => true,
                    'teeny' => false,
                    'quicktags' => true,
                    'textarea_rows' => 6,
                    'tinymce' => array(
                        'toolbar1' => 'formatselect,bold,italic,underline,forecolor,backcolor,bullist,numlist,blockquote,link,unlink,undo,redo',
                        'toolbar2' => 'alignleft,aligncenter,alignright,alignjustify,outdent,indent,removeformat,subscript,superscript,pastetext',
                        'plugins'  => 'lists,link,wordpress,wpautoresize,hr,media,paste,textcolor,colorpicker,charmap',
                    ),
                )
            );
            ?>
            </div>
        <?php endforeach; ?>
    </div>

    <button type="button" class="button" id="add-grid-item">Add New Grid Item</button>

<script>
document.addEventListener("DOMContentLoaded", function() {
    let container = document.getElementById('extra-info-grid-container');
    let addBtn = document.getElementById('add-grid-item');

    // Add new grid item
    addBtn.addEventListener('click', function() {
        let count = container.querySelectorAll('.grid-item-group').length;
        let editorId = 'extra_info_grid_' + count + '_desc';

        let newGroup = document.createElement('div');
        newGroup.classList.add('grid-item-group');
        newGroup.style.marginBottom = '15px';
        newGroup.style.border = '1px solid #ddd';
        newGroup.style.padding = '10px';
        newGroup.style.background = '#fff';
        newGroup.style.position = 'relative';
        newGroup.innerHTML = `
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:8px;">
                <strong>Why this course point ${count + 1}</strong>
                <button type="button" class="button remove-grid-item" style="color:red; background:#fff; border:1px solid #dc3232;">Remove Point</button>
            </div>
            <input type="text" name="extra_info_grid[${count}][title]" placeholder="Title"
                style="width:100%; margin-top:5px; margin-bottom:5px;">
            <label><strong>Description</strong></label>
            <textarea id="${editorId}" name="extra_info_grid[${count}][desc]" placeholder="Description"
                style="width:100%; height:100px;"></textarea>
        `;
        container.appendChild(newGroup);

        // Wait a bit to ensure textarea is in DOM before initializing
        setTimeout(function() {
            if (typeof wp !== 'undefined' && wp.editor) {
                wp.editor.initialize(editorId, {
                    tinymce: {
                        toolbar1: 'formatselect,bold,italic,underline,forecolor,backcolor,bullist,numlist,blockquote,link,unlink,undo,redo',
                        toolbar2: 'alignleft,aligncenter,alignright,alignjustify,outdent,indent,removeformat,subscript,superscript,pastetext',
                        plugins: 'lists,link,wordpress,wpautoresize,hr,media,paste,textcolor,colorpicker,charmap'
                    },
                    quicktags: true,
                    mediaButtons: true
                });
            }
        }, 300);
    });

    // Remove grid item
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-grid-item')) {
            e.preventDefault();
            e.target.closest('.grid-item-group').remove();
            // Renumber remaining items
            let items = container.querySelectorAll('.grid-item-group');
            items.forEach(function(item, index) {
                let strong = item.querySelector('strong');
                if (strong) {
                    strong.textContent = 'Why this course point ' + (index + 1);
                }
            });
        }
    });
});
</script>
    </div>
</div>


<!-- Laws & Regulations Section -->
<div class="banner-section-box" data-section="Laws & Regulations">
  <h3><span>⚖️ Laws & Regulations Section</span><span class="box-actions"><span class="caret">▾</span></span></h3>
  <div class="box-inner">

  <div class="banner-field">
    <label>Enter the Section Title</label>
    <input type="text" name="laws_section_title" value="<?php echo esc_attr(get_post_meta($post->ID, 'laws_section_title', true)); ?>">
  </div>

  <div class="banner-field">
    <label>Enter the Section Description</label>
	  <?php
  $content = get_post_meta($post->ID, 'laws_section_description', true);
  wp_editor(
    $content,
    'laws_section_description', // editor ID
    array(
      'textarea_name' => 'laws_section_description',
      'media_buttons' => true,
      'teeny' => false, // full toolbar
      'quicktags' => true,
      'textarea_rows' => 10,
      'tinymce' => array(
                        'toolbar1' => 'formatselect,bold,italic,underline,forecolor,backcolor,bullist,numlist,blockquote,link,unlink,undo,redo',
                        'toolbar2' => 'alignleft,aligncenter,alignright,alignjustify,outdent,indent,removeformat,subscript,superscript,pastetext',
                        'plugins'  => 'lists,link,wordpress,wpautoresize,hr,media,paste,textcolor,colorpicker,charmap',
                    ),
    )
  );
  ?>
  </div>

<div class="banner-field">
  <label>Enter the Content</label>
  <?php
  $content = get_post_meta($post->ID, 'laws_section_content', true);
  wp_editor(
    $content,
    'laws_section_content', // editor ID
    array(
      'textarea_name' => 'laws_section_content',
      'media_buttons' => true,
      'teeny' => false, // full toolbar
      'quicktags' => true,
      'textarea_rows' => 10,
      'tinymce' => array(
                        'toolbar1' => 'formatselect,bold,italic,underline,forecolor,backcolor,bullist,numlist,blockquote,link,unlink,undo,redo',
                        'toolbar2' => 'alignleft,aligncenter,alignright,alignjustify,outdent,indent,removeformat,subscript,superscript,pastetext',
                        'plugins'  => 'lists,link,wordpress,wpautoresize,hr,media,paste,textcolor,colorpicker,charmap',
                    ),
    )
  );
  ?>
</div>
  </div>
</div>

<!-- Carousel / Image Slider Section -->
<div class="banner-section-box" data-section="Carousel / Screenshots">
  <h3><span>🖼️ Screenshots course</span><span class="box-actions"><span class="caret">▾</span></span></h3>
  <div class="box-inner">

  <div class="banner-field">
    <label>Enter the Carousel Title</label>
    <input type="text" name="carousel_section_title" value="<?php echo esc_attr(get_post_meta($post->ID, 'carousel_section_title', true)); ?>" placeholder="e.g., Course Highlights">
  </div>

  <div class="banner-field">
    <label>Choose the Title Color</label>
    <input type="color" name="carousel_section_title_color" value="<?php echo esc_attr(get_post_meta($post->ID, 'carousel_section_title_color', true) ?: '#4C26F4'); ?>">
  </div>

  <?php
    $carousel_bg_value = get_post_meta($post->ID, 'carousel_section_bg', true);
    $is_carousel_gradient = !empty($carousel_bg_value) && strpos($carousel_bg_value, 'linear-gradient') !== false;
    $carousel_solid_color = '';
    if (!$is_carousel_gradient && !empty($carousel_bg_value) && preg_match('/^#[0-9A-Fa-f]{6}$/', $carousel_bg_value)) {
        $carousel_solid_color = $carousel_bg_value;
    } elseif (!$is_carousel_gradient && empty($carousel_bg_value)) {
        $carousel_solid_color = '#f5f5f5';
    }
    $carousel_gradient_colors = [];
    if ($is_carousel_gradient) {
        preg_match_all('/#(?:[0-9a-fA-F]{3}){1,2}/', $carousel_bg_value, $matches);
        $carousel_gradient_colors = $matches[0] ?? [];
    }
    $carousel_start_color = !empty($carousel_gradient_colors[0]) ? $carousel_gradient_colors[0] : '#576094';
    $carousel_end_color = !empty($carousel_gradient_colors[1]) ? $carousel_gradient_colors[1] : '#915EBD';
  ?>
  <div class="banner-field">
    <label><strong>Carousel Background</strong></label>
    <div class="wp-style-color-picker-wrapper">
      <div class="color-picker-tabs">
        <button type="button" class="color-tab-btn carousel-color-tab <?php echo !$is_carousel_gradient ? 'active' : ''; ?>" data-tab="carousel-solid">Solid</button>
        <button type="button" class="color-tab-btn carousel-color-tab <?php echo $is_carousel_gradient ? 'active' : ''; ?>" data-tab="carousel-gradient">Gradient</button>
      </div>

      <div id="carousel-solid-tab" class="color-tab-content <?php echo !$is_carousel_gradient ? 'active' : ''; ?>">
        <div class="banner-field" style="display:flex; align-items:center; gap:12px; margin-top:10px;">
          <input type="color" id="carousel-solid-color" value="<?php echo esc_attr($carousel_solid_color ?: '#f5f5f5'); ?>" style="width:60px; height:40px; border-radius:4px; cursor:pointer;">
          <input type="text" id="carousel-solid-hex" value="<?php echo esc_attr($carousel_solid_color ?: '#f5f5f5'); ?>" style="flex:1; padding:8px; border:1px solid #cbd5e1; border-radius:4px; max-width:200px;">
        </div>
      </div>

      <div id="carousel-gradient-tab" class="color-tab-content <?php echo $is_carousel_gradient ? 'active' : ''; ?>">
        <div class="banner-field" style="margin-top:10px;">
          <label><strong>Gradient Direction</strong></label>
          <select id="carousel-gradient-direction" style="width:100%;max-width:250px; padding:6px; border:1px solid #cbd5e1; border-radius:4px;">
            <?php
              $carousel_directions = [
                'to bottom' => 'Top → Bottom',
                'to top' => 'Bottom → Top',
                'to right' => 'Left → Right',
                'to left' => 'Right → Left',
                '135deg' => 'Diagonal ↘',
                '45deg' => 'Diagonal ↗'
              ];
              $carousel_current_dir = 'to bottom';
              if ($is_carousel_gradient) {
                  foreach ($carousel_directions as $dir => $label) {
                      if (strpos($carousel_bg_value, $dir) !== false) {
                          $carousel_current_dir = $dir;
                          break;
                      }
                  }
              }
              foreach ($carousel_directions as $dir => $label) {
                  $selected = ($dir === $carousel_current_dir) ? 'selected' : '';
                  echo '<option value="' . esc_attr($dir) . '" ' . $selected . '>' . esc_html($label) . '</option>';
              }
            ?>
          </select>
        </div>

        <div class="banner-field" style="display:flex; align-items:center; gap:12px; margin-top:10px;">
          <div style="flex:1;">
            <label><strong>Start Color</strong></label>
            <div style="display:flex; align-items:center; gap:8px;">
              <input type="color" id="carousel-gradient-start" value="<?php echo esc_attr($carousel_start_color); ?>" style="width:60px;height:40px; border-radius:4px; cursor:pointer;">
              <input type="text" id="carousel-gradient-start-hex" value="<?php echo esc_attr($carousel_start_color); ?>" style="flex:1; padding:8px; border:1px solid #cbd5e1; border-radius:4px; max-width:150px;">
            </div>
          </div>
        </div>

        <div class="banner-field" style="display:flex; align-items:center; gap:12px; margin-top:10px;">
          <div style="flex:1;">
            <label><strong>End Color</strong></label>
            <div style="display:flex; align-items:center; gap:8px;">
              <input type="color" id="carousel-gradient-end" value="<?php echo esc_attr($carousel_end_color); ?>" style="width:60px;height:40px; border-radius:4px; cursor:pointer;">
              <input type="text" id="carousel-gradient-end-hex" value="<?php echo esc_attr($carousel_end_color); ?>" style="flex:1; padding:8px; border:1px solid #cbd5e1; border-radius:4px; max-width:150px;">
              <button type="button" id="carousel-gradient-swap" style="padding:6px 12px; border:1px solid #cbd5e1; border-radius:4px; background:#f8fafc; cursor:pointer;">🔄 Swap</button>
            </div>
          </div>
        </div>
      </div>

      <input type="text" name="carousel_section_bg" id="carousel-bg-input" value="<?php echo esc_attr($carousel_bg_value); ?>" style="width:100%; margin-top:10px; padding:8px; border:1px solid #cbd5e1; border-radius:4px; background:#f8fafc; color:#64748b;">
      <div id="carousel-bg-preview" style="margin-top:15px;width:100%;height:70px;border:2px solid #cbd5e1;border-radius:8px;background:<?php echo esc_attr($carousel_bg_value ?: '#f5f5f5'); ?>;"></div>
      <p class="description" style="margin-top:6px;">Use a solid color (e.g., <code>#f5f5f5</code>) or a gradient (e.g., <code>linear-gradient(45deg, #ff9a9e, #fad0c4)</code>).</p>
    </div>
  </div>

  <div class="banner-field">
    <label>Upload the Carousel Images</label>
    <div id="carousel-images-container">
      <?php
      $carousel_images = get_post_meta($post->ID, 'carousel_section_images', true);
      if (!is_array($carousel_images)) $carousel_images = [];
      foreach ($carousel_images as $i => $url): ?>
        <div class="carousel-image-item" style="margin-bottom:10px;">
          <input type="text" name="carousel_section_images[<?php echo $i; ?>]" value="<?php echo esc_attr($url); ?>" style="width:80%;">
          <button class="button upload-carousel-image">Upload</button>
          <button class="button remove-carousel-image" style="color:red;">Remove</button>
        </div>
      <?php endforeach; ?>
    </div>
    <button type="button" class="button" id="add-carousel-image">Add New Image</button>
  </div>
  </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const tabButtons = document.querySelectorAll('.carousel-color-tab');
    const solidTab = document.getElementById('carousel-solid-tab');
    const gradientTab = document.getElementById('carousel-gradient-tab');
    const solidColor = document.getElementById('carousel-solid-color');
    const solidHex = document.getElementById('carousel-solid-hex');
    const gradStart = document.getElementById('carousel-gradient-start');
    const gradStartHex = document.getElementById('carousel-gradient-start-hex');
    const gradEnd = document.getElementById('carousel-gradient-end');
    const gradEndHex = document.getElementById('carousel-gradient-end-hex');
    const gradDir = document.getElementById('carousel-gradient-direction');
    const swapBtn = document.getElementById('carousel-gradient-swap');
    const preview = document.getElementById('carousel-bg-preview');
    const hiddenInput = document.getElementById('carousel-bg-input');

    function setActiveTab(target) {
        tabButtons.forEach(btn => btn.classList.remove('active'));
        solidTab.classList.remove('active');
        gradientTab.classList.remove('active');

        if (target === 'carousel-solid') {
            tabButtons[0].classList.add('active');
            solidTab.classList.add('active');
            updateSolid();
        } else {
            tabButtons[1].classList.add('active');
            gradientTab.classList.add('active');
            updateGradient();
        }
    }

    function updateSolid() {
        const color = solidColor.value;
        solidHex.value = color;
        preview.style.background = color;
        hiddenInput.value = color;
    }

    function updateGradient() {
        const dir = gradDir.value;
        const start = gradStart.value;
        const end = gradEnd.value;
        const css = `linear-gradient(${dir}, ${start}, ${end})`;
        hiddenInput.value = css;
        gradStartHex.value = start;
        gradEndHex.value = end;
        preview.style.background = css;
    }

    tabButtons.forEach(btn => {
        btn.addEventListener('click', () => setActiveTab(btn.dataset.tab));
    });

    solidColor.addEventListener('input', () => {
        solidHex.value = solidColor.value;
        if (solidTab.classList.contains('active')) updateSolid();
    });
    solidHex.addEventListener('input', () => {
        if (/^#[0-9A-F]{6}$/i.test(solidHex.value)) {
            solidColor.value = solidHex.value;
            if (solidTab.classList.contains('active')) updateSolid();
        }
    });

    gradStart.addEventListener('input', () => {
        gradStartHex.value = gradStart.value;
        if (gradientTab.classList.contains('active')) updateGradient();
    });
    gradStartHex.addEventListener('input', () => {
        if (/^#[0-9A-F]{6}$/i.test(gradStartHex.value)) {
            gradStart.value = gradStartHex.value;
            if (gradientTab.classList.contains('active')) updateGradient();
        }
    });
    gradEnd.addEventListener('input', () => {
        gradEndHex.value = gradEnd.value;
        if (gradientTab.classList.contains('active')) updateGradient();
    });
    gradEndHex.addEventListener('input', () => {
        if (/^#[0-9A-F]{6}$/i.test(gradEndHex.value)) {
            gradEnd.value = gradEndHex.value;
            if (gradientTab.classList.contains('active')) updateGradient();
        }
    });
    gradDir.addEventListener('change', () => {
        if (gradientTab.classList.contains('active')) updateGradient();
    });

    swapBtn.addEventListener('click', () => {
        const temp = gradStart.value;
        gradStart.value = gradEnd.value;
        gradEnd.value = temp;
        gradStartHex.value = gradStart.value;
        gradEndHex.value = gradEnd.value;
        updateGradient();
    });

    if (solidTab.classList.contains('active')) {
        updateSolid();
    } else {
        updateGradient();
    }
});
</script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const advTabs = document.querySelectorAll('.advanced-color-tab');
    const advSolidTab = document.getElementById('advanced-solid-tab');
    const advGradientTab = document.getElementById('advanced-gradient-tab');
    const advSolidColor = document.getElementById('advanced-solid-color');
    const advSolidHex = document.getElementById('advanced-solid-hex');
    const advGradStart = document.getElementById('advanced-gradient-start');
    const advGradStartHex = document.getElementById('advanced-gradient-start-hex');
    const advGradEnd = document.getElementById('advanced-gradient-end');
    const advGradEndHex = document.getElementById('advanced-gradient-end-hex');
    const advGradDir = document.getElementById('advanced-gradient-direction');
    const advSwapBtn = document.getElementById('advanced-gradient-swap');
    const advPreview = document.getElementById('advanced-bg-preview');
    const advHiddenInput = document.getElementById('advanced-bg-input');

    function setAdvTab(target) {
        advTabs.forEach(btn => btn.classList.remove('active'));
        advSolidTab.classList.remove('active');
        advGradientTab.classList.remove('active');

        if (target === 'advanced-solid') {
            advTabs[0].classList.add('active');
            advSolidTab.classList.add('active');
            updateAdvSolid();
        } else {
            advTabs[1].classList.add('active');
            advGradientTab.classList.add('active');
            updateAdvGradient();
        }
    }

    function updateAdvSolid() {
        const color = advSolidColor.value;
        advSolidHex.value = color;
        advPreview.style.background = color;
        advHiddenInput.value = color;
    }

    function updateAdvGradient() {
        const dir = advGradDir.value;
        const start = advGradStart.value;
        const end = advGradEnd.value;
        const css = `linear-gradient(${dir}, ${start}, ${end})`;
        advHiddenInput.value = css;
        advGradStartHex.value = start;
        advGradEndHex.value = end;
        advPreview.style.background = css;
    }

    advTabs.forEach(btn => {
        btn.addEventListener('click', () => setAdvTab(btn.dataset.tab));
    });

    advSolidColor.addEventListener('input', () => {
        advSolidHex.value = advSolidColor.value;
        if (advSolidTab.classList.contains('active')) updateAdvSolid();
    });

    advSolidHex.addEventListener('input', () => {
        if (/^#[0-9A-F]{6}$/i.test(advSolidHex.value)) {
            advSolidColor.value = advSolidHex.value;
            if (advSolidTab.classList.contains('active')) updateAdvSolid();
        }
    });

    advGradStart.addEventListener('input', () => {
        advGradStartHex.value = advGradStart.value;
        if (advGradientTab.classList.contains('active')) updateAdvGradient();
    });
    advGradStartHex.addEventListener('input', () => {
        if (/^#[0-9A-F]{6}$/i.test(advGradStartHex.value)) {
            advGradStart.value = advGradStartHex.value;
            if (advGradientTab.classList.contains('active')) updateAdvGradient();
        }
    });
    advGradEnd.addEventListener('input', () => {
        advGradEndHex.value = advGradEnd.value;
        if (advGradientTab.classList.contains('active')) updateAdvGradient();
    });
    advGradEndHex.addEventListener('input', () => {
        if (/^#[0-9A-F]{6}$/i.test(advGradEndHex.value)) {
            advGradEnd.value = advGradEndHex.value;
            if (advGradientTab.classList.contains('active')) updateAdvGradient();
        }
    });
    advGradDir.addEventListener('change', () => {
        if (advGradientTab.classList.contains('active')) updateAdvGradient();
    });

    advSwapBtn.addEventListener('click', () => {
        const temp = advGradStart.value;
        advGradStart.value = advGradEnd.value;
        advGradEnd.value = temp;
        advGradStartHex.value = advGradStart.value;
        advGradEndHex.value = advGradEnd.value;
        updateAdvGradient();
    });

    if (advSolidTab.classList.contains('active')) {
        updateAdvSolid();
    } else {
        updateAdvGradient();
    }
});
</script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const container = document.getElementById('carousel-images-container');
    const addBtn = document.getElementById('add-carousel-image');

    addBtn.addEventListener('click', function() {
        const index = container.querySelectorAll('.carousel-image-item').length;
        const div = document.createElement('div');
        div.className = 'carousel-image-item';
        div.style.marginBottom = '10px';
        div.innerHTML = `
            <input type="text" name="carousel_section_images[${index}]" style="width:80%;">
            <button class="button upload-carousel-image">Upload</button>
            <button class="button remove-carousel-image" style="color:red;">Remove</button>
        `;
        container.appendChild(div);
    });

    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-carousel-image')) {
            e.preventDefault();
            e.target.parentNode.remove();
        }

        if (e.target.classList.contains('upload-carousel-image')) {
            e.preventDefault();
            let button = e.target;
            let input = button.previousElementSibling;
            let frame = wp.media({
                title: 'Select Image',
                button: { text: 'Use this image' },
                multiple: false
            });
            frame.on('select', function() {
                let attachment = frame.state().get('selection').first().toJSON();
                input.value = attachment.url;
            });
            frame.open();
        }
    });
});
</script>


<!-- ======= Course Structure Section ======= -->
<div class="banner-section-box" data-section="Course Structure">
  <h3><span>🧩 Course Structure Content</span><span class="box-actions"><span class="caret">▾</span></span></h3>
  <div class="box-inner">

    <!-- Main Section Title -->
    <div class="banner-field">
      <label><strong>Enter the Section Title</strong></label>
      <input type="text" name="custom_section_main_title"
             value="<?php echo esc_attr(get_post_meta($post->ID, 'custom_section_main_title', true)); ?>"
             placeholder="e.g., Course Structure Overview"
             style="width:100%;">
    </div>

    <!-- Dynamic Subsections -->
    <div id="custom-content-container">
      <?php
      $custom_sections = get_post_meta($post->ID, 'custom_content_sections', true);
      if (!is_array($custom_sections)) $custom_sections = [];

      foreach ($custom_sections as $i => $section):
        $editor_id = 'custom_content_editor_' . $i;
      ?>
        <div class="custom-content-group" style="margin-bottom:15px; border:1px solid #ddd; padding:10px; background:#fff;">
          <h4>Course Structure Point <?php echo $i + 1; ?></h4>

          <div class="banner-field">
            <label>Enter the Point Title</label>
            <input type="text" name="custom_content_sections[<?php echo $i; ?>][title]"
                   value="<?php echo esc_attr($section['title']); ?>"
                   placeholder="e.g., Learning Objectives" style="width:100%;">
          </div>

          <div class="banner-field">
            <label>Choose the Title Color</label>
            <input type="color" name="custom_content_sections[<?php echo $i; ?>][title_color]"
                   value="<?php echo esc_attr($section['title_color'] ?? '#000000'); ?>">
          </div>

          <div class="banner-field">
            <label>Enter the Point Content</label>
            <?php
            wp_editor(
              $section['content'],
              $editor_id,
              [
                'textarea_name' => "custom_content_sections[$i][content]",
                'media_buttons' => true,
                'teeny' => false,
                'quicktags' => true,
                'textarea_rows' => 8,
                'tinymce' => [
                  'menubar' => false,
                  'toolbar1' => 'formatselect,bold,italic,underline,forecolor,backcolor,bullist,numlist,blockquote,link,unlink,undo,redo,alignleft,aligncenter,alignright,alignjustify,removeformat',
                ],
              ]
            );
            ?>
          </div>

          <button type="button" class="button remove-custom-content" style="color:red;">Remove this point</button>
        </div>
      <?php endforeach; ?>
    </div>

    <button type="button" class="button" id="add-custom-content">Add New Point</button>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
      const container = document.getElementById('custom-content-container');
      const addBtn = document.getElementById('add-custom-content');

      addBtn.addEventListener('click', function() {
        const count = container.querySelectorAll('.custom-content-group').length;
        const editorId = 'custom_content_editor_' + count;

        const div = document.createElement('div');
        div.classList.add('custom-content-group');
        div.style.marginBottom = '15px';
        div.style.border = '1px solid #ddd';
        div.style.padding = '10px';
        div.style.background = '#fff';
        div.innerHTML = `
          <h4>Course Structure Point ${count + 1}</h4>
          <div class="banner-field">
            <label>Enter the Point Title</label>
            <input type="text" name="custom_content_sections[${count}][title]" placeholder="e.g., Section Title" style="width:100%;">
          </div>
          <div class="banner-field">
            <label>Choose the Title Color</label>
            <input type="color" name="custom_content_sections[${count}][title_color]" value="#000000">
          </div>
          <div class="banner-field">
            <label>Enter the Point Content</label>
            <textarea id="${editorId}" name="custom_content_sections[${count}][content]" rows="8" style="width:100%;"></textarea>
          </div>
          <button type="button" class="button remove-custom-content" style="color:red;">Remove this point</button>
        `;
        container.appendChild(div);

        // Initialize TinyMCE like wp_editor uses
        setTimeout(() => {
          if (typeof tinyMCEPreInit !== 'undefined' && typeof tinymce !== 'undefined') {
            const init = Object.assign({}, tinyMCEPreInit.mceInit['content']); // copy WordPress editor config
            init.selector = `#${editorId}`;
            init.menubar = false;
            init.toolbar1 = 'formatselect,bold,italic,underline,forecolor,backcolor,bullist,numlist,blockquote,link,unlink,undo,redo,alignleft,aligncenter,alignright,alignjustify,removeformat';
            init.setup = (editor) => {
              editor.on('change', () => tinymce.triggerSave());
            };
            tinymce.init(init);
          }
        }, 300);
      });

      // Remove section handler
      document.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-custom-content')) {
          e.preventDefault();
          e.target.closest('.custom-content-group').remove();
        }
      });
    });
    </script>

    <?php
    do_action('admin_footer', '');
    do_action('admin_print_footer_scripts');
    ?>
  </div>
</div>

<!-- ======= Advanced Gradient Section ======= -->
<div class="banner-section-box" data-section="Target Audience">
  <h3><span>🎨 Target Audience Content</span><span class="box-actions"><span class="caret">▾</span></span></h3>
  <div class="box-inner">

    <!-- Background -->
    <?php
      $advanced_bg_value = get_post_meta($post->ID, 'advanced_section_bg', true);
      $is_adv_gradient = !empty($advanced_bg_value) && strpos($advanced_bg_value, 'linear-gradient') !== false;
      $advanced_solid_color = '';
      if (!$is_adv_gradient && !empty($advanced_bg_value) && preg_match('/^#[0-9A-Fa-f]{6}$/', $advanced_bg_value)) {
          $advanced_solid_color = $advanced_bg_value;
      } elseif (!$is_adv_gradient && empty($advanced_bg_value)) {
          $advanced_solid_color = '#f5f5f5';
      }
      $advanced_gradient_colors = [];
      if ($is_adv_gradient) {
          preg_match_all('/#(?:[0-9a-fA-F]{3}){1,2}/', $advanced_bg_value, $matches);
          $advanced_gradient_colors = $matches[0] ?? [];
      }
      $advanced_start_color = !empty($advanced_gradient_colors[0]) ? $advanced_gradient_colors[0] : '#576094';
      $advanced_end_color = !empty($advanced_gradient_colors[1]) ? $advanced_gradient_colors[1] : '#915EBD';
    ?>
    <div class="banner-field">
      <label><strong>Enter the Background</strong></label>
      <div class="wp-style-color-picker-wrapper">
        <div class="color-picker-tabs">
          <button type="button" class="color-tab-btn advanced-color-tab <?php echo !$is_adv_gradient ? 'active' : ''; ?>" data-tab="advanced-solid">Solid</button>
          <button type="button" class="color-tab-btn advanced-color-tab <?php echo $is_adv_gradient ? 'active' : ''; ?>" data-tab="advanced-gradient">Gradient</button>
        </div>

        <div id="advanced-solid-tab" class="color-tab-content <?php echo !$is_adv_gradient ? 'active' : ''; ?>">
          <div class="banner-field" style="display:flex; align-items:center; gap:12px; margin-top:10px;">
            <input type="color" id="advanced-solid-color" value="<?php echo esc_attr($advanced_solid_color ?: '#f5f5f5'); ?>" style="width:60px;height:40px; border-radius:4px; cursor:pointer;">
            <input type="text" id="advanced-solid-hex" value="<?php echo esc_attr($advanced_solid_color ?: '#f5f5f5'); ?>" style="flex:1; padding:8px; border:1px solid #cbd5e1; border-radius:4px; max-width:200px;">
          </div>
        </div>

        <div id="advanced-gradient-tab" class="color-tab-content <?php echo $is_adv_gradient ? 'active' : ''; ?>">
          <div class="banner-field" style="margin-top:10px;">
            <label><strong>Gradient Direction</strong></label>
            <select id="advanced-gradient-direction" style="width:100%;max-width:250px; padding:6px; border:1px solid #cbd5e1; border-radius:4px;">
              <?php
                $adv_dirs = [
                  'to bottom' => 'Top → Bottom',
                  'to top' => 'Bottom → Top',
                  'to right' => 'Left → Right',
                  'to left' => 'Right → Left',
                  '135deg' => 'Diagonal ↘',
                  '45deg' => 'Diagonal ↗'
                ];
                $adv_current_dir = 'to bottom';
                if ($is_adv_gradient) {
                    foreach ($adv_dirs as $dir => $label) {
                        if (strpos($advanced_bg_value, $dir) !== false) {
                            $adv_current_dir = $dir;
                            break;
                        }
                    }
                }
                foreach ($adv_dirs as $dir => $label) {
                    $selected = ($dir === $adv_current_dir) ? 'selected' : '';
                    echo '<option value="' . esc_attr($dir) . '" ' . $selected . '>' . esc_html($label) . '</option>';
                }
              ?>
            </select>
          </div>

          <div class="banner-field" style="display:flex; align-items:center; gap:12px; margin-top:10px;">
            <div style="flex:1;">
              <label><strong>Start Color</strong></label>
              <div style="display:flex; align-items:center; gap:8px;">
                <input type="color" id="advanced-gradient-start" value="<?php echo esc_attr($advanced_start_color); ?>" style="width:60px;height:40px; border-radius:4px; cursor:pointer;">
                <input type="text" id="advanced-gradient-start-hex" value="<?php echo esc_attr($advanced_start_color); ?>" style="flex:1; padding:8px; border:1px solid #cbd5e1; border-radius:4px; max-width:150px;">
              </div>
            </div>
          </div>

          <div class="banner-field" style="display:flex; align-items:center; gap:12px; margin-top:10px;">
            <div style="flex:1;">
              <label><strong>End Color</strong></label>
              <div style="display:flex; align-items:center; gap:8px;">
                <input type="color" id="advanced-gradient-end" value="<?php echo esc_attr($advanced_end_color); ?>" style="width:60px;height:40px; border-radius:4px; cursor:pointer;">
                <input type="text" id="advanced-gradient-end-hex" value="<?php echo esc_attr($advanced_end_color); ?>" style="flex:1; padding:8px; border:1px solid #cbd5e1; border-radius:4px; max-width:150px;">
                <button type="button" id="advanced-gradient-swap" style="padding:6px 12px; border:1px solid #cbd5e1; border-radius:4px; background:#f8fafc; cursor:pointer;">🔄 Swap</button>
              </div>
            </div>
          </div>
        </div>

        <input type="text" name="advanced_section_bg" id="advanced-bg-input"
             value="<?php echo esc_attr($advanced_bg_value); ?>"
             placeholder="e.g., #f5f5f5 or linear-gradient(45deg, #ff9a9e, #fad0c4)"
             style="width:100%; margin-top:10px; padding:8px; border:1px solid #cbd5e1; border-radius:4px; background:#f8fafc; color:#64748b;">
        <div id="advanced-bg-preview" style="margin-top:15px;width:100%;height:70px;border:2px solid #cbd5e1;border-radius:8px;background:<?php echo esc_attr($advanced_bg_value ?: '#f5f5f5'); ?>;"></div>
        <p class="description">You can use a solid color (e.g., <code>#f5f5f5</code>) or a CSS gradient (e.g., <code>linear-gradient(45deg, #ff9a9e, #fad0c4)</code>).</p>
      </div>
    </div>

    <!-- Title -->
    <div class="banner-field">
      <label>Enter the Main Title</label>
      <input type="text" name="advanced_section_title"
             value="<?php echo esc_attr(get_post_meta($post->ID, 'advanced_section_title', true)); ?>"
             placeholder="e.g., Key Insights" style="width:100%;">
    </div>

    <!-- Title Color -->
    <div class="banner-field">
      <label>Choose the Title Color</label>
      <input type="color" name="advanced_section_title_color"
             value="<?php echo esc_attr(get_post_meta($post->ID, 'advanced_section_title_color', true) ?: '#000000'); ?>">
    </div>

    <!-- Section Description -->
    <div class="banner-field">
      <label>Enter the Section Description</label>
      <?php
      $advanced_section_description = get_post_meta($post->ID, 'advanced_section_description', true);
      wp_editor(
        $advanced_section_description,
        'advanced_section_description',
        [
          'textarea_name' => 'advanced_section_description',
          'media_buttons' => true,
          'teeny' => false,
          'quicktags' => true,
          'textarea_rows' => 5,
          'tinymce' => [
            'toolbar1' => 'formatselect,bold,italic,underline,forecolor,backcolor,bullist,numlist,blockquote,link,unlink,undo,redo,alignleft,aligncenter,alignright,alignjustify,removeformat',
          ],
        ]
      );
      ?>
    </div>

    <!-- HTML Content 1 -->
    <div class="banner-field">
      <label>Enter the Content</label>
      <?php
      $advanced_section_html_1 = get_post_meta($post->ID, 'advanced_section_html_1', true);
      wp_editor(
        $advanced_section_html_1,
        'advanced_section_html_1',
        [
          'textarea_name' => 'advanced_section_html_1',
          'media_buttons' => true,
          'teeny' => false,
          'quicktags' => true,
          'textarea_rows' => 8,
          'tinymce' => [
            'toolbar1' => 'formatselect,bold,italic,underline,forecolor,backcolor,bullist,numlist,blockquote,link,unlink,undo,redo,alignleft,aligncenter,alignright,alignjustify,removeformat',
          ],
        ]
      );
      ?>
    </div>

    <!-- HTML Content 2 -->
    <div class="banner-field">
      <label>Enter the Content Description if any</label>
      <?php
      $advanced_section_html_2 = get_post_meta($post->ID, 'advanced_section_html_2', true);
      wp_editor(
        $advanced_section_html_2,
        'advanced_section_html_2',
        [
          'textarea_name' => 'advanced_section_html_2',
          'media_buttons' => true,
          'teeny' => false,
          'quicktags' => true,
          'textarea_rows' => 8,
          'tinymce' => [
            'toolbar1' => 'formatselect,bold,italic,underline,forecolor,backcolor,bullist,numlist,blockquote,link,unlink,undo,redo,alignleft,aligncenter,alignright,alignjustify,removeformat',
          ],
        ]
      );
      ?>
    </div>

    <?php
    // Make sure editor scripts are printed correctly
    do_action('admin_footer', '');
    do_action('admin_print_footer_scripts');
    ?>
  </div>
</div>




<!-- ======= What if you don’t comply?  ======= -->
<div class="banner-section-box" data-section="What if you don’t comply?">
  <h3><span>⚙️ What if you don’t comply? Section</span><span class="box-actions"><span class="caret">▾</span></span></h3>
  <div class="box-inner">

    <div class="banner-field">
      <label>Enter the Section Title</label>
      <input type="text" name="custom_output_title"
             value="<?php echo esc_attr(get_post_meta($post->ID, 'custom_output_title', true)); ?>"
             placeholder="Enter section title" style="width:100%;">
    </div>

    <div class="banner-field">
      <label>Enter the Section Description</label>
      <?php
        $description = get_post_meta($post->ID, 'custom_output_description', true);
        wp_editor(
          $description,
          'custom_output_description',
          array(
            'textarea_name' => 'custom_output_description',
            'media_buttons' => true,     // show Add Media button
            'teeny'         => false,    // full editor toolbar
            'quicktags'     => true,     // show Text (HTML) tab
            'textarea_rows' => 5,
          )
        );
      ?>
    </div>

    <div class="banner-field">
      <label>Enter the Content</label>
      <?php
        $content = get_post_meta($post->ID, 'custom_output_html', true);
        wp_editor(
          $content,
          'custom_output_html',
          array(
            'textarea_name' => 'custom_output_html',
            'media_buttons' => true,
            'teeny'         => false,
            'quicktags'     => true,
            'textarea_rows' => 10,
          )
        );
      ?>
      <p class="description">You can write HTML, inline CSS, or WordPress shortcodes here. It will render on the front end.</p>
    </div>

  </div>
</div>




<!-- ======= Course Outline Section ======= -->
<div class="banner-section-box" data-section="Course Outline">
  <h3><span>🧠 Course Outline Section</span><span class="box-actions"><span class="caret">▾</span></span></h3>
  <div class="box-inner">

  <?php
  $codegrid_title = get_post_meta($post->ID, 'codegrid_title', true);
  $codegrid_title_color = get_post_meta($post->ID, 'codegrid_title_color', true);
  $codegrid_item_color = get_post_meta($post->ID, 'codegrid_item_color', true);
  $codegrid_items = get_post_meta($post->ID, 'codegrid_items', true);

  // Initialize empty array if no items exist
  if (!is_array($codegrid_items)) $codegrid_items = [];
  
  // If empty, add one default item for easier start
  if (empty($codegrid_items)) {
      $codegrid_items = [['title' => '', 'content' => '']];
  }
  ?>

  <div class="banner-field">
    <label><strong>Enter the Main Title</strong></label>
    <input type="text" name="codegrid_title" 
           value="<?php echo esc_attr($codegrid_title); ?>" 
           placeholder="e.g., Practical Applications" 
           style="width:100%;">
  </div>

  <div class="banner-field">
    <label><strong>Choose the Main Title Color</strong></label>
    <input type="color" name="codegrid_title_color" value="<?php echo esc_attr($codegrid_title_color ?: '#000000'); ?>">
  </div>

  <div class="banner-field">
    <label><strong>Choose the Outline Title Color</strong></label>
    <input type="color" name="codegrid_item_color" value="<?php echo esc_attr($codegrid_item_color ?: '#000000'); ?>">
  </div>

  <div id="codegrid-container">
    <?php foreach ($codegrid_items as $i => $item): ?>
      <div class="codegrid-item-group" style="margin-bottom:20px; border:1px solid #ddd; padding:15px; background:#fff; position:relative;">
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:8px;">
          <strong style="display:block; margin-bottom:8px;">Outline <?php echo $i + 1; ?></strong>
          <button type="button" class="button remove-codegrid-item" style="color:red; background:#fff; border:1px solid #dc3232;">Remove Point</button>
        </div>

        <input type="text"
               name="codegrid_items[<?php echo $i; ?>][title]"
               value="<?php echo esc_attr($item['title']); ?>"
               placeholder="Enter Outline Title"
               style="width:100%; margin-top:5px; margin-bottom:10px; color:<?php echo esc_attr($codegrid_item_color ?: '#000'); ?>;">

        <label><strong>Content:</strong></label>
        <?php
          $editor_id = 'codegrid_items_' . $i . '_content';
          wp_editor(
            $item['content'],
            $editor_id,
            array(
              'textarea_name' => "codegrid_items[$i][content]",
              'media_buttons' => true,
              'teeny'         => false,
              'quicktags'     => true,
              'textarea_rows' => 5,
            )
          );
        ?>
      </div>
    <?php endforeach; ?>
  </div>

  <button type="button" class="button" id="add-codegrid-item">Add New Point</button>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const codegridContainer = document.getElementById('codegrid-container');
    const addCodegridBtn = document.getElementById('add-codegrid-item');

    // Add new codegrid item
    addCodegridBtn.addEventListener('click', function() {
        const count = codegridContainer.querySelectorAll('.codegrid-item-group').length;
        const editorId = 'codegrid_items_' + count + '_content';

        const div = document.createElement('div');
        div.classList.add('codegrid-item-group');
        div.style.marginBottom = '20px';
        div.style.border = '1px solid #ddd';
        div.style.padding = '15px';
        div.style.background = '#fff';
        div.style.position = 'relative';
        div.innerHTML = `
          <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:8px;">
            <strong style="display:block; margin-bottom:8px;">Outline ${count + 1}</strong>
            <button type="button" class="button remove-codegrid-item" style="color:red; background:#fff; border:1px solid #dc3232;">Remove Point</button>
          </div>
          <input type="text" name="codegrid_items[${count}][title]" placeholder="Enter Outline Title"
              style="width:100%; margin-top:5px; margin-bottom:10px;">
          <label><strong>Content:</strong></label>
          <textarea id="${editorId}" name="codegrid_items[${count}][content]" rows="5" style="width:100%;"></textarea>
        `;
        codegridContainer.appendChild(div);

        // Initialize TinyMCE
        setTimeout(() => {
            if (typeof tinyMCEPreInit !== 'undefined' && typeof tinymce !== 'undefined') {
                const init = Object.assign({}, tinyMCEPreInit.mceInit['content']);
                init.selector = `#${editorId}`;
                init.menubar = false;
                init.toolbar1 = 'formatselect,bold,italic,underline,forecolor,backcolor,bullist,numlist,blockquote,link,unlink,undo,redo,alignleft,aligncenter,alignright,alignjustify,removeformat';
                init.setup = (editor) => {
                    editor.on('change', () => tinymce.triggerSave());
                };
                tinymce.init(init);
            }
        }, 300);
    });

    // Remove codegrid item
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-codegrid-item')) {
            e.preventDefault();
            e.target.closest('.codegrid-item-group').remove();
            // Renumber remaining items
            let items = codegridContainer.querySelectorAll('.codegrid-item-group');
            items.forEach(function(item, index) {
                let strong = item.querySelector('strong');
                if (strong) {
                    strong.textContent = 'Outline ' + (index + 1);
                }
            });
        }
    });
});
</script>

  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
  // Quick navigation dropdown support
  const select = document.getElementById('meta-quick-nav');
  const boxes = document.querySelectorAll('.banner-section-box');

  if (select) {
    // Clear any existing options first to prevent duplicates on re-render
    while (select.options.length > 0) select.remove(0);
    boxes.forEach((box, idx) => {
      const label = box.getAttribute('data-section') || box.querySelector('h3 > span')?.innerText || box.querySelector('h3')?.childNodes[0]?.textContent?.trim() || `Section ${idx+1}`;
      const opt = document.createElement('option');
      opt.value = idx.toString();
      opt.textContent = label;
      select.appendChild(opt);
    });

    select.addEventListener('change', function() {
      const idx = parseInt(this.value, 10);
      const target = boxes[idx];
      if (target) {
        target.classList.remove('collapsed');
        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    });
  }

  function setAll(collapsed) {
    boxes.forEach(b => collapsed ? b.classList.add('collapsed') : b.classList.remove('collapsed'));
    try { localStorage.setItem('meta_collapsed', collapsed ? '1' : '0'); } catch (e) {}
  }

  const collapseBtn = document.getElementById('collapse-all');
  const expandBtn = document.getElementById('expand-all');
  collapseBtn && collapseBtn.addEventListener('click', () => setAll(true));
  expandBtn && expandBtn.addEventListener('click', () => setAll(false));

  boxes.forEach(b => {
    const header = b.querySelector('h3');
    header && header.addEventListener('click', () => b.classList.toggle('collapsed'));
  });

  try {
    if (localStorage.getItem('meta_collapsed') === '1') {
      setAll(true);
    }
  } catch (e) {}
});
</script>



<!-- ======= FAQ Section ======= -->
<div class="banner-section-box" data-section="FAQ">
  <h3><span>❓ FAQ Section</span><span class="box-actions"><span class="caret">▾</span></span></h3>
  <div class="box-inner">

  <?php
  $faq_main_title = get_post_meta($post->ID, 'faq_main_title', true);
  $faq_items      = get_post_meta($post->ID, 'faq_items', true);
  if (!is_array($faq_items) || empty($faq_items)) {
      $faq_items = [['sno' => '', 'question' => '', 'answer' => '']];
  }
  $faq_count = count($faq_items);
  ?>

  <!-- Main title field -->
  <div class="banner-field" style="margin-bottom:20px;">
    <label style="display:block;margin-bottom:5px;font-weight:600;color:#1e293b;">Section Title</label>
    <input type="text" name="faq_main_title"
           value="<?php echo esc_attr($faq_main_title); ?>"
           placeholder="e.g., Frequently Asked Questions"
           style="width:100%;padding:8px 12px;border:1px solid #cbd5e1;border-radius:6px;font-size:14px;">
  </div>

  <!-- FAQ list header bar -->
  <div class="faq-list-header">
    <span class="faq-list-title">FAQ Items <span id="faq-total-count" class="faq-count-badge"><?php echo $faq_count; ?></span></span>
    <span class="faq-list-hint">Use ▲ ▼ arrows to reorder</span>
  </div>

  <!-- Insert-before strip for the very first FAQ -->
  <div class="faq-insert-strip faq-insert-before-first">
    <button type="button" class="faq-insert-btn faq-insert-here-btn" data-position="before-first">
      <span class="faq-insert-line"></span>
      <span class="faq-insert-label">&#43; Add FAQ Here</span>
      <span class="faq-insert-line"></span>
    </button>
  </div>

  <div id="faq-container">
    <?php foreach ($faq_items as $i => $faq): ?>

      <div class="faq-item-group" data-faq-index="<?php echo $i; ?>">

        <!-- ── Card Header ── -->
        <div class="faq-card-header">
          <div class="faq-move-btns">
            <button type="button" class="faq-move-up-btn" title="Move up">
              <svg width="12" height="12" viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><polyline points="2,8 6,3 10,8"/></svg>
            </button>
            <button type="button" class="faq-move-down-btn" title="Move down">
              <svg width="12" height="12" viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><polyline points="2,4 6,9 10,4"/></svg>
            </button>
          </div>
          <span class="faq-number-badge"><?php echo $i + 1; ?></span>
          <div class="faq-header-question-preview">
            <?php echo $faq['question'] ? esc_html($faq['question']) : '<span style="color:#94a3b8;font-style:italic;">Untitled FAQ</span>'; ?>
          </div>
          <div class="faq-header-actions">
            <button type="button" class="faq-collapse-btn" title="Collapse / expand">
              <svg class="faq-chevron" width="14" height="14" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="2,5 7,10 12,5"/></svg>
            </button>
            <button type="button" class="faq-delete-btn" title="Remove this FAQ">
              <svg width="13" height="13" viewBox="0 0 13 13" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><line x1="1" y1="1" x2="12" y2="12"/><line x1="12" y1="1" x2="1" y2="12"/></svg>
              Delete
            </button>
          </div>
        </div>

        <!-- ── Card Body ── -->
        <div class="faq-card-body">
          <div class="faq-field-group">
            <label class="faq-field-label">S.No. (Auto)</label>
            <input type="text"
                   value="<?php echo esc_attr((string) ($i + 1)); ?>"
                   class="faq-sno-input"
                   readonly>
            <input type="hidden"
                   name="faq_items[<?php echo $i; ?>][sno]"
                   value="<?php echo esc_attr((string) ($i + 1)); ?>"
                   class="faq-sno-hidden-input">
          </div>

          <div class="faq-field-group">
            <label class="faq-field-label">Question</label>
            <input type="text"
                   name="faq_items[<?php echo $i; ?>][question]"
                   value="<?php echo esc_attr($faq['question']); ?>"
                   placeholder="Type your question here…"
                   class="faq-question-input">
          </div>

          <div class="faq-field-group">
            <label class="faq-field-label">Answer</label>
            <?php
              $editor_id = 'faq_items_' . $i . '_answer';
              wp_editor(
                $faq['answer'],
                $editor_id,
                array(
                  'textarea_name' => "faq_items[$i][answer]",
                  'media_buttons' => true,
                  'teeny'         => false,
                  'quicktags'     => true,
                  'textarea_rows' => 5,
                )
              );
            ?>
          </div>
        </div><!-- /.faq-card-body -->

      </div><!-- /.faq-item-group -->

      <!-- Insert-after strip for each FAQ -->
      <div class="faq-insert-strip">
        <button type="button" class="faq-insert-btn faq-insert-here-btn">
          <span class="faq-insert-line"></span>
          <span class="faq-insert-label">&#43; Add FAQ Here</span>
          <span class="faq-insert-line"></span>
        </button>
      </div>

    <?php endforeach; ?>
  </div><!-- /#faq-container -->

  <!-- Add at end CTA -->
  <button type="button" id="faq-add-end-btn">
    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" style="vertical-align:middle;margin-right:6px;"><line x1="8" y1="1" x2="8" y2="15"/><line x1="1" y1="8" x2="15" y2="8"/></svg>
    Add New FAQ
  </button>

  </div><!-- /.box-inner -->
</div><!-- /.banner-section-box -->

<!-- ===== FAQ Styles ===== -->
<style>
/* ── List header ── */
.faq-list-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 4px;
  padding: 0 2px;
}
.faq-list-title {
  font-size: 13px;
  font-weight: 700;
  color: #374151;
  display: flex;
  align-items: center;
  gap: 7px;
}
.faq-count-badge {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  background: #3b82f6;
  color: #fff;
  font-size: 11px;
  font-weight: 700;
  min-width: 20px;
  height: 20px;
  border-radius: 10px;
  padding: 0 6px;
}
.faq-list-hint {
  font-size: 11px;
  color: #94a3b8;
}

/* ── Insert strips ── */
.faq-insert-strip {
  display: flex;
  align-items: center;
  margin: 4px 0;
  opacity: 0;
  transition: opacity .2s ease;
}
.faq-insert-strip:hover,
.faq-insert-strip:focus-within {
  opacity: 1;
}
.faq-insert-btn {
  display: flex;
  align-items: center;
  width: 100%;
  gap: 8px;
  background: none;
  border: none;
  padding: 3px 0;
  cursor: pointer;
  color: #3b82f6;
  font-size: 12px;
  font-weight: 600;
}
.faq-insert-btn:hover .faq-insert-label {
  background: #3b82f6;
  color: #fff;
}
.faq-insert-btn:hover .faq-insert-line { background: #3b82f6; }
.faq-insert-line {
  flex: 1;
  height: 2px;
  background: #cbd5e1;
  border-radius: 2px;
  transition: background .15s;
}
.faq-insert-label {
  white-space: nowrap;
  background: #eff6ff;
  border: 1.5px solid #3b82f6;
  color: #3b82f6;
  border-radius: 20px;
  padding: 2px 12px;
  font-size: 11px;
  font-weight: 700;
  letter-spacing: .02em;
  transition: background .15s, color .15s;
}
/* always show first/last strips slightly so they're discoverable */
.faq-insert-before-first { opacity: .35; }
#faq-container .faq-insert-strip:last-child { opacity: .35; }
.faq-insert-strip:hover { opacity: 1 !important; }

/* ── FAQ card ── */
.faq-item-group {
  background: #fff;
  border: 1.5px solid #e2e8f0;
  border-radius: 10px;
  box-shadow: 0 1px 4px rgba(15,23,42,.05);
  overflow: hidden;
  transition: box-shadow .18s ease, opacity .18s ease, border-color .18s ease;
}
.faq-item-group:hover { box-shadow: 0 4px 14px rgba(15,23,42,.08); }
.faq-item-group.faq-moving {
  outline: 2.5px solid #3b82f6;
  outline-offset: 2px;
}
.faq-item-group.faq-collapsed .faq-card-body { display: none; }
.faq-item-group.faq-collapsed .faq-chevron { transform: rotate(-90deg); }
.faq-chevron { transition: transform .2s ease; }

/* ── Card header ── */
.faq-card-header {
  display: flex;
  align-items: center;
  gap: 10px;
  padding: 11px 14px;
  background: #f8fafc;
  border-bottom: 1.5px solid #e2e8f0;
  cursor: default;
  user-select: none;
}
.faq-item-group.faq-collapsed .faq-card-header {
  border-bottom-color: transparent;
}

/* ── Move up / down buttons ── */
.faq-move-btns {
  display: flex;
  flex-direction: column;
  gap: 2px;
  flex-shrink: 0;
}
.faq-move-up-btn,
.faq-move-down-btn {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 24px;
  height: 20px;
  background: #fff;
  border: 1.5px solid #e2e8f0;
  border-radius: 5px;
  cursor: pointer;
  color: #64748b;
  padding: 0;
  transition: background .15s, border-color .15s, color .15s;
}
.faq-move-up-btn:hover:not(:disabled),
.faq-move-down-btn:hover:not(:disabled) {
  background: #eff6ff;
  border-color: #3b82f6;
  color: #3b82f6;
}
.faq-move-up-btn:disabled,
.faq-move-down-btn:disabled {
  opacity: .28;
  cursor: not-allowed;
}
.faq-number-badge {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  width: 26px;
  height: 26px;
  background: #1e40af;
  color: #fff;
  border-radius: 50%;
  font-size: 12px;
  font-weight: 700;
  flex-shrink: 0;
}
.faq-header-question-preview {
  flex: 1;
  font-size: 13px;
  font-weight: 600;
  color: #1e293b;
  overflow: hidden;
  white-space: nowrap;
  text-overflow: ellipsis;
}
.faq-header-actions {
  display: flex;
  align-items: center;
  gap: 6px;
  flex-shrink: 0;
}
.faq-collapse-btn {
  background: none;
  border: 1.5px solid #e2e8f0;
  border-radius: 6px;
  width: 30px;
  height: 30px;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  color: #64748b;
  padding: 0;
  transition: background .15s, border-color .15s, color .15s;
}
.faq-collapse-btn:hover { background: #f1f5f9; border-color: #94a3b8; color: #1e293b; }
.faq-delete-btn {
  display: flex;
  align-items: center;
  gap: 5px;
  background: #fff;
  color: #dc2626;
  border: 1.5px solid #fca5a5;
  border-radius: 6px;
  padding: 4px 10px;
  cursor: pointer;
  font-size: 12px;
  font-weight: 600;
  transition: background .15s, border-color .15s, color .15s;
}
.faq-delete-btn:hover { background: #dc2626; color: #fff; border-color: #dc2626; }
.faq-delete-btn svg { flex-shrink: 0; }

/* ── Card body ── */
.faq-card-body {
  padding: 16px 16px 18px;
}
.faq-field-group { margin-bottom: 14px; }
.faq-field-group:last-child { margin-bottom: 0; }
.faq-field-label {
  display: block;
  font-size: 12px;
  font-weight: 700;
  color: #475569;
  text-transform: uppercase;
  letter-spacing: .06em;
  margin-bottom: 6px;
}
.faq-question-input {
  width: 100%;
  padding: 9px 12px;
  border: 1.5px solid #e2e8f0;
  border-radius: 7px;
  font-size: 14px;
  color: #1e293b;
  background: #fff;
  box-sizing: border-box;
  transition: border-color .15s, box-shadow .15s;
}
.faq-question-input:focus {
  outline: none;
  border-color: #3b82f6;
  box-shadow: 0 0 0 3px rgba(59,130,246,.15);
}

/* ── Add at end button ── */
#faq-add-end-btn {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 100%;
  margin-top: 16px;
  padding: 11px 0;
  background: linear-gradient(135deg, #1d4ed8 0%, #2563eb 100%);
  color: #fff;
  border: none;
  border-radius: 8px;
  font-size: 14px;
  font-weight: 700;
  cursor: pointer;
  letter-spacing: .02em;
  box-shadow: 0 2px 8px rgba(37,99,235,.30);
  transition: opacity .18s, box-shadow .18s;
}
#faq-add-end-btn:hover {
  opacity: .9;
  box-shadow: 0 4px 16px rgba(37,99,235,.38);
}
</style>

<!-- ===== FAQ Script ===== -->
<script>
document.addEventListener('DOMContentLoaded', function() {
  var faqContainer = document.getElementById('faq-container');
  if (!faqContainer) return;

  var editorCounter = <?php echo $faq_count; ?>;

  /* ── helpers ── */
  function getCards() {
    return Array.from(faqContainer.querySelectorAll('.faq-item-group'));
  }

  function updateCountBadge() {
    var badge = document.getElementById('faq-total-count');
    if (badge) badge.textContent = getCards().length;
  }

  function updateNumbers() {
    getCards().forEach(function(card, idx) {
      var badge = card.querySelector('.faq-number-badge');
      if (badge) badge.textContent = idx + 1;
      card.setAttribute('data-faq-index', idx);
    });
    updateCountBadge();
    updateMoveButtonStates();
  }

  function updateNames() {
    getCards().forEach(function(card, idx) {
      var snoInput = card.querySelector('.faq-sno-input');
      if (snoInput) snoInput.value = String(idx + 1);

      var snoHiddenInput = card.querySelector('.faq-sno-hidden-input');
      if (snoHiddenInput) {
        snoHiddenInput.setAttribute('name', 'faq_items[' + idx + '][sno]');
        snoHiddenInput.value = String(idx + 1);
      }

      var qInput = card.querySelector('.faq-question-input');
      if (qInput) qInput.setAttribute('name', 'faq_items[' + idx + '][question]');
      var ta = card.querySelector('textarea');
      if (ta) ta.setAttribute('name', 'faq_items[' + idx + '][answer]');
    });
  }

  function syncEditors() {
    if (typeof tinyMCE !== 'undefined') {
      tinyMCE.editors.forEach(function(ed) {
        try { if (ed && ed.save) ed.save(); } catch(e) {}
      });
    }
  }

  /* ── save all editor content → textarea, then destroy every TinyMCE instance ── */
  function destroyAllEditors() {
    if (typeof tinyMCE === 'undefined') return;
    // iterate over a copy because removing editors mutates the array
    var edList = tinyMCE.editors.slice ? tinyMCE.editors.slice() : Array.from(tinyMCE.editors);
    edList.forEach(function(ed) {
      if (!ed) return;
      try { ed.save(); } catch(e) {}
      try { ed.remove(); } catch(e) {}
    });
  }

  /* ── reinitialise TinyMCE on every textarea inside every card ── */
  function reinitAllEditors() {
    if (typeof wp === 'undefined' || !wp.editor || typeof wp.editor.initialize !== 'function') return;
    getCards().forEach(function(card) {
      var ta = card.querySelector('textarea');
      if (!ta || !ta.id) return;
      var uid = ta.id;
      // only reinit if not already active
      if (typeof tinyMCE !== 'undefined' && tinyMCE.get(uid)) return;
      try {
        wp.editor.initialize(uid, {
          tinymce: {
            wpautop: true,
            toolbar1: 'formatselect,bold,italic,bullist,numlist,link,unlink,blockquote,hr,undo,redo'
          },
          quicktags: true,
          mediaButtons: true
        });
      } catch(e) {}
    });
  }

  /* ── question → header preview sync ── */
  function bindPreviewSync(card) {
    var qInput = card.querySelector('.faq-question-input');
    var preview = card.querySelector('.faq-header-question-preview');
    if (!qInput || !preview) return;
    function refresh() {
      preview.innerHTML = qInput.value.trim()
        ? escHtml(qInput.value.trim())
        : '<span style="color:#94a3b8;font-style:italic;">Untitled FAQ</span>';
    }
    qInput.addEventListener('input', refresh);
  }

  function escHtml(str) {
    return str.replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;');
  }

  /* ── build a new blank FAQ card ── */
  function createFaqCard() {
    editorCounter++;
    var uid = 'faq_dyn_' + editorCounter;

    var card = document.createElement('div');
    card.className = 'faq-item-group';
    card.setAttribute('data-faq-index', '0');
    card.innerHTML =
      '<div class="faq-card-header">' +
        '<div class="faq-move-btns">' +
          '<button type="button" class="faq-move-up-btn" title="Move up">' +
            '<svg width="12" height="12" viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><polyline points="2,8 6,3 10,8"/></svg>' +
          '</button>' +
          '<button type="button" class="faq-move-down-btn" title="Move down">' +
            '<svg width="12" height="12" viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><polyline points="2,4 6,9 10,4"/></svg>' +
          '</button>' +
        '</div>' +
        '<span class="faq-number-badge">?</span>' +
        '<div class="faq-header-question-preview"><span style="color:#94a3b8;font-style:italic;">Untitled FAQ</span></div>' +
        '<div class="faq-header-actions">' +
          '<button type="button" class="faq-collapse-btn" title="Collapse / expand">' +
            '<svg class="faq-chevron" width="14" height="14" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="2,5 7,10 12,5"/></svg>' +
          '</button>' +
          '<button type="button" class="faq-delete-btn" title="Remove this FAQ">' +
            '<svg width="13" height="13" viewBox="0 0 13 13" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><line x1="1" y1="1" x2="12" y2="12"/><line x1="12" y1="1" x2="1" y2="12"/></svg>' +
            'Delete' +
          '</button>' +
        '</div>' +
      '</div>' +
      '<div class="faq-card-body">' +
        '<div class="faq-field-group">' +
          '<label class="faq-field-label">S.No. (Auto)</label>' +
          '<input type="text" value="1" class="faq-sno-input" readonly>' +
          '<input type="hidden" name="faq_items[0][sno]" value="1" class="faq-sno-hidden-input">' +
        '</div>' +
        '<div class="faq-field-group">' +
          '<label class="faq-field-label">Question</label>' +
          '<input type="text" name="faq_items[0][question]" placeholder="Type your question here\u2026" class="faq-question-input">' +
        '</div>' +
        '<div class="faq-field-group">' +
          '<label class="faq-field-label">Answer</label>' +
          '<textarea id="' + uid + '" name="faq_items[0][answer]" rows="5" ' +
                    'style="width:100%;padding:8px;border:1.5px solid #e2e8f0;border-radius:7px;box-sizing:border-box;font-size:13px;" ' +
                    'placeholder="Enter answer here\u2026"></textarea>' +
        '</div>' +
      '</div>';

    bindCardEvents(card);
    bindMoveEvents(card);
    bindPreviewSync(card);

    if (typeof wp !== 'undefined' && wp.editor && typeof wp.editor.initialize === 'function') {
      setTimeout(function() {
        try {
          wp.editor.initialize(uid, {
            tinymce: { wpautop: true, toolbar1: 'formatselect,bold,italic,bullist,numlist,link,unlink,blockquote,hr,undo,redo' },
            quicktags: true,
            mediaButtons: true
          });
        } catch(e) {}
      }, 200);
    }

    return card;
  }

  /* ── build an insert strip ── */
  function createInsertStrip() {
    var strip = document.createElement('div');
    strip.className = 'faq-insert-strip';
    strip.innerHTML =
      '<button type="button" class="faq-insert-btn faq-insert-here-btn">' +
        '<span class="faq-insert-line"></span>' +
        '<span class="faq-insert-label">&#43; Add FAQ Here</span>' +
        '<span class="faq-insert-line"></span>' +
      '</button>';
    return strip;
  }

  /* ── insert a new card after a given card element ── */
  function insertCardAfter(refCard) {
    var newCard  = createFaqCard();
    var newStrip = createInsertStrip();
    bindStripEvent(newStrip, newCard);

    // nextElementSibling skips whitespace text nodes that exist between PHP-rendered elements
    var refStrip    = refCard.nextElementSibling;   // the strip that follows refCard
    var afterTarget = refStrip ? refStrip.nextElementSibling : null; // element after that strip

    if (afterTarget) {
      // Insert newCard then newStrip immediately before the next card
      faqContainer.insertBefore(newCard,  afterTarget);
      faqContainer.insertBefore(newStrip, afterTarget);
    } else {
      // refCard is the last card — append at the end
      faqContainer.appendChild(newCard);
      faqContainer.appendChild(newStrip);
    }
    updateNumbers();
    updateNames();
    setTimeout(function() { newCard.scrollIntoView({ behavior:'smooth', block:'center' }); }, 150);
  }

  /* ── bind click on an insert strip ── */
  function bindStripEvent(strip, afterCard) {
    var btn = strip.querySelector('.faq-insert-here-btn');
    if (!btn || btn.dataset.bound) return;
    btn.dataset.bound = '1';
    btn.addEventListener('click', function() {
      if (afterCard) {
        insertCardAfter(afterCard);
      } else {
        // "before first" strip
        var newCard  = createFaqCard();
        var newStrip = createInsertStrip();
        bindStripEvent(newStrip, newCard);
        var firstCard = getCards()[0];
        if (firstCard) {
          faqContainer.insertBefore(newStrip, firstCard);
          faqContainer.insertBefore(newCard, newStrip);
        } else {
          faqContainer.appendChild(newCard);
          faqContainer.appendChild(newStrip);
        }
        updateNumbers();
        updateNames();
        setTimeout(function() { newCard.scrollIntoView({ behavior:'smooth', block:'center' }); }, 150);
      }
    });
  }

  /* ── bind collapse + delete events to a card ── */
  function bindCardEvents(card) {
    /* collapse toggle */
    var colBtn = card.querySelector('.faq-collapse-btn');
    if (colBtn && !colBtn.dataset.bound) {
      colBtn.dataset.bound = '1';
      colBtn.addEventListener('click', function(e) {
        e.stopPropagation();
        card.classList.toggle('faq-collapsed');
      });
    }
    /* header click also toggles */
    var hdr = card.querySelector('.faq-card-header');
    if (hdr && !hdr.dataset.clickBound) {
      hdr.dataset.clickBound = '1';
      hdr.addEventListener('click', function(e) {
        if (e.target.closest('.faq-header-actions') || e.target.closest('.faq-move-btns')) return;
        card.classList.toggle('faq-collapsed');
      });
    }
    /* delete */
    var delBtn = card.querySelector('.faq-delete-btn');
    if (delBtn && !delBtn.dataset.bound) {
      delBtn.dataset.bound = '1';
      delBtn.addEventListener('click', function(e) {
        e.stopPropagation();
        if (getCards().length <= 1) {
          alert('You must keep at least one FAQ entry.');
          return;
        }
        if (confirm('Remove this FAQ?')) {
          var ta = card.querySelector('textarea');
          if (ta && ta.id && typeof tinyMCE !== 'undefined' && tinyMCE.get(ta.id)) {
            tinyMCE.get(ta.id).remove();
          }
          // also remove the trailing insert strip (use nextElementSibling to skip text nodes)
          var next = card.nextElementSibling;
          if (next && next.classList && next.classList.contains('faq-insert-strip')) {
            faqContainer.removeChild(next);
          }
          faqContainer.removeChild(card);
          updateNumbers();
          updateNames();
        }
      });
    }
  }

  /* ── update disabled state of ▲/▼ buttons so first can't go up, last can't go down ── */
  function updateMoveButtonStates() {
    var cards = getCards();
    cards.forEach(function(card, idx) {
      var upBtn   = card.querySelector('.faq-move-up-btn');
      var downBtn = card.querySelector('.faq-move-down-btn');
      if (upBtn)   upBtn.disabled   = (idx === 0);
      if (downBtn) downBtn.disabled = (idx === cards.length - 1);
    });
  }

  /* ── move a card one position up or down ── */
  function moveCard(card, direction) {
    var cards = getCards();
    var idx   = cards.indexOf(card);
    if (direction === 'up'   && idx === 0)              return;
    if (direction === 'down' && idx === cards.length - 1) return;

    // Flush + destroy all editors before touching the DOM
    destroyAllEditors();

    // Use nextElementSibling to skip whitespace text nodes between PHP-rendered elements
    var cardStrip = card.nextElementSibling;
    var hasStrip  = cardStrip && cardStrip.classList && cardStrip.classList.contains('faq-insert-strip');

    if (direction === 'up') {
      var prevCard = cards[idx - 1];
      // Move card (+ its strip) before prevCard
      faqContainer.insertBefore(card, prevCard);
      if (hasStrip) faqContainer.insertBefore(cardStrip, prevCard);
    } else {
      var nextCard  = cards[idx + 1];
      var nextStrip = nextCard.nextElementSibling;
      // Move card (+ its strip) after nextCard's strip
      var afterNext = nextStrip && nextStrip.classList.contains('faq-insert-strip')
        ? nextStrip.nextElementSibling
        : null;
      if (afterNext) {
        faqContainer.insertBefore(card, afterNext);
        if (hasStrip) faqContainer.insertBefore(cardStrip, afterNext);
      } else {
        faqContainer.appendChild(card);
        if (hasStrip) faqContainer.appendChild(cardStrip);
      }
    }

    updateNumbers();
    updateNames();
    updateMoveButtonStates();

    // Rebuild all editors in their new positions after DOM has settled
    setTimeout(reinitAllEditors, 300);

    // Gently scroll the moved card into view
    setTimeout(function() { card.scrollIntoView({ behavior: 'smooth', block: 'nearest' }); }, 100);
  }

  /* ── bind ▲/▼ events to a card ── */
  function bindMoveEvents(card) {
    var upBtn = card.querySelector('.faq-move-up-btn');
    if (upBtn && !upBtn.dataset.bound) {
      upBtn.dataset.bound = '1';
      upBtn.addEventListener('click', function(e) {
        e.stopPropagation();
        moveCard(card, 'up');
      });
    }
    var downBtn = card.querySelector('.faq-move-down-btn');
    if (downBtn && !downBtn.dataset.bound) {
      downBtn.dataset.bound = '1';
      downBtn.addEventListener('click', function(e) {
        e.stopPropagation();
        moveCard(card, 'down');
      });
    }
  }

  /* ── initialise all PHP-rendered cards ── */
  getCards().forEach(function(card) {
    bindCardEvents(card);
    bindMoveEvents(card);
    bindPreviewSync(card);
  });
  updateMoveButtonStates();

  /* ── bind "before-first" strip ── */
  var beforeFirstStrip = document.querySelector('.faq-insert-before-first');
  if (beforeFirstStrip) bindStripEvent(beforeFirstStrip, null);

  /* ── bind all "after" strips (one per card, rendered by PHP) ── */
  var afterStrips = faqContainer.querySelectorAll('.faq-insert-strip');
  afterStrips.forEach(function(strip, idx) {
    var cards = getCards();
    if (cards[idx]) bindStripEvent(strip, cards[idx]);
  });

  /* ── "Add New FAQ" button at bottom ── */
  var addEndBtn = document.getElementById('faq-add-end-btn');
  if (addEndBtn) {
    addEndBtn.addEventListener('click', function() {
      var cards = getCards();
      if (cards.length > 0) {
        insertCardAfter(cards[cards.length - 1]);
      } else {
        var newCard  = createFaqCard();
        var newStrip = createInsertStrip();
        bindStripEvent(newStrip, newCard);
        faqContainer.appendChild(newCard);
        faqContainer.appendChild(newStrip);
        updateNumbers();
        updateNames();
      }
    });
  }

  /* ── sync before submit ── */
  var form = document.querySelector('form#post');
  if (form) {
    form.addEventListener('submit', function() {
      syncEditors();
      updateNames();
    });
  }
});
</script>

    <?php
}






/**
 * ====================================================
 * SAVE META BOX FIELDS
 * ====================================================
 */
function ccbm_save_meta($post_id) {
    if (!isset($_POST['ccbm_meta_nonce']) || !wp_verify_nonce($_POST['ccbm_meta_nonce'], 'ccbm_save_meta')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;
    if (!ccbm_is_course_post_type(get_post_type($post_id))) return;

    $import_result = ccbm_import_docx_to_post_data($post_id);
    if (is_wp_error($import_result)) {
        set_transient(
            'ccbm_docx_notice_' . get_current_user_id() . '_' . absint($post_id),
            'DOCX import failed: ' . $import_result->get_error_message(),
            120
        );
    }

    $fields = [
        'banner_gradient', 'banner_bg_hex', 'banner_bg_rgb',
        'course_title', 'course_description',
        'duration_title', 'duration_value',
        'course_price_title', 'course_level_title', 'course_category_title',
        'individual_title', 'individual_price', 'individual_currency_symbol', 'individual_btn_text', 'individual_btn_url',
        'individual_btn_text_hex', 'individual_btn_text_rgb',
        'individual_btn_bg_hex', 'individual_btn_bg_rgb',
        'individual_btn_border_hex', 'individual_btn_border_rgb',
        'individual_btn_hover_hex', 'individual_btn_hover_rgb',
        'corporate_title', 'corporate_btn_text', 'corporate_btn_url',
        'course_level', 'course_category',
        'corporate_btn_text_hex', 'corporate_btn_text_rgb',
        'corporate_btn_bg_hex', 'corporate_btn_bg_rgb',
        'corporate_btn_border_hex', 'corporate_btn_border_rgb',
        'corporate_btn_hover_hex', 'corporate_btn_hover_rgb',
        'video_url',
        'objectives_section_title',
        'objectives_section_description',
        'objectives_section_content',
        'laws_section_title',
        'laws_section_description'
    ];

    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
        } else {
            delete_post_meta($post_id, $field);
        }
    }
	
	// Special case: allow HTML for course_description (to preserve paragraphs)
	if (isset($_POST['course_description'])) {
		$course_desc = $_POST['course_description'];
		// If content doesn't have paragraph tags, convert line breaks to paragraphs
		if (strpos($course_desc, '<p>') === false && !empty(trim($course_desc))) {
			$course_desc = wpautop($course_desc);
		}
		update_post_meta($post_id, 'course_description', wp_kses_post($course_desc));
	}
	
	// Special case: allow HTML for objectives_section_description (to preserve paragraphs)
	if (isset($_POST['objectives_section_description'])) {
		$obj_desc = $_POST['objectives_section_description'];
		if (strpos($obj_desc, '<p>') === false && !empty(trim($obj_desc))) {
			$obj_desc = wpautop($obj_desc);
		}
		update_post_meta($post_id, 'objectives_section_description', wp_kses_post($obj_desc));
	}
	
	// Special case: allow HTML and inline CSS for objectives content
if (isset($_POST['objectives_section_content'])) {
    $allowed_tags = wp_kses_allowed_html('post');

    // Add 'style' attribute support to all allowed tags
    foreach ($allowed_tags as $tag => $attributes) {
        $allowed_tags[$tag]['style'] = true;
    }
    
    $obj_content = $_POST['objectives_section_content'];
    if (strpos($obj_content, '<p>') === false && !empty(trim($obj_content))) {
        $obj_content = wpautop($obj_content);
    }

    update_post_meta(
        $post_id,
        'objectives_section_content',
        wp_kses($obj_content, $allowed_tags)
    );
}

// === Save Extra Info Section ===
if (isset($_POST['extra_info_title'])) {
    update_post_meta($post_id, 'extra_info_title', sanitize_text_field($_POST['extra_info_title']));
}
if (isset($_POST['extra_info_title_color'])) {
    update_post_meta($post_id, 'extra_info_title_color', sanitize_hex_color($_POST['extra_info_title_color']));
}
if (isset($_POST['extra_info_grid_title_color'])) {
    update_post_meta($post_id, 'extra_info_grid_title_color', sanitize_hex_color($_POST['extra_info_grid_title_color']));
}
if (isset($_POST['extra_info_grid'])) {
    $grid = array_filter(array_map(function($item) {
        $title = trim($item['title']);
        $desc  = trim($item['desc']);
        // Exclude only if both title and desc are empty
        if ($title === '' && $desc === '') return null;
        // Convert line breaks to paragraphs for description
        if (!empty($desc) && strpos($desc, '<p>') === false) {
            $desc = wpautop($desc);
        }
        return [
            'title' => sanitize_text_field($title),
            'desc'  => wp_kses_post($desc),
        ];
    }, $_POST['extra_info_grid']), function($item) {
        // Keep items that have at least a title
        return !empty($item['title']) || !empty($item['desc']);
    });
    update_post_meta($post_id, 'extra_info_grid', $grid);
}

	// Allow HTML for laws_section_description (to preserve paragraphs)
	if (isset($_POST['laws_section_description'])) {
		$laws_desc = $_POST['laws_section_description'];
		if (strpos($laws_desc, '<p>') === false && !empty(trim($laws_desc))) {
			$laws_desc = wpautop($laws_desc);
		}
		update_post_meta($post_id, 'laws_section_description', wp_kses_post($laws_desc));
	}
	
	// Allow HTML and inline CSS for Laws Section
if (isset($_POST['laws_section_content'])) {
    $allowed_tags = wp_kses_allowed_html('post');
    foreach ($allowed_tags as $tag => $attributes) {
        $allowed_tags[$tag]['style'] = true;
    }
    $laws_content = $_POST['laws_section_content'];
    if (strpos($laws_content, '<p>') === false && !empty(trim($laws_content))) {
        $laws_content = wpautop($laws_content);
    }
    update_post_meta(
        $post_id,
        'laws_section_content',
        wp_kses($laws_content, $allowed_tags)
    );
}

// === Save Carousel Section ===
if (isset($_POST['carousel_section_title'])) {
    update_post_meta($post_id, 'carousel_section_title', sanitize_text_field($_POST['carousel_section_title']));
}
if (isset($_POST['carousel_section_title_color'])) {
    update_post_meta($post_id, 'carousel_section_title_color', sanitize_hex_color($_POST['carousel_section_title_color']));
}
if (isset($_POST['carousel_section_bg'])) {
    update_post_meta($post_id, 'carousel_section_bg', sanitize_text_field($_POST['carousel_section_bg']));
}
if (isset($_POST['carousel_section_images'])) {
    $images = array_filter(array_map('esc_url_raw', $_POST['carousel_section_images']));
    update_post_meta($post_id, 'carousel_section_images', $images);
}

	
// === Save Custom Dynamic Content Section ===
if (isset($_POST['custom_section_main_title'])) {
    update_post_meta($post_id, 'custom_section_main_title', sanitize_text_field($_POST['custom_section_main_title']));
}

if (isset($_POST['custom_content_sections'])) {
    $allowed_tags = wp_kses_allowed_html('post');
    foreach ($allowed_tags as $tag => $attributes) {
        $allowed_tags[$tag]['style'] = true;
    }

    $sections = array_map(function($item) use ($allowed_tags) {
        $content = $item['content'];
        // Convert line breaks to paragraphs if needed
        if (!empty($content) && strpos($content, '<p>') === false) {
            $content = wpautop($content);
        }
        return [
            'title' => sanitize_text_field($item['title']),
            'title_color' => sanitize_hex_color($item['title_color']),
            'content' => wp_kses($content, $allowed_tags),
        ];
    }, $_POST['custom_content_sections']);

    update_post_meta($post_id, 'custom_content_sections', $sections);
}

// === Save Advanced Gradient Section ===
if (isset($_POST['advanced_section_title'])) {
    update_post_meta($post_id, 'advanced_section_title', sanitize_text_field($_POST['advanced_section_title']));
}
if (isset($_POST['advanced_section_title_color'])) {
    update_post_meta($post_id, 'advanced_section_title_color', sanitize_hex_color($_POST['advanced_section_title_color']));
}
// Allow HTML for advanced_section_description (to preserve paragraphs)
if (isset($_POST['advanced_section_description'])) {
    $adv_desc = $_POST['advanced_section_description'];
    if (strpos($adv_desc, '<p>') === false && !empty(trim($adv_desc))) {
        $adv_desc = wpautop($adv_desc);
    }
    update_post_meta($post_id, 'advanced_section_description', wp_kses_post($adv_desc));
}
if (isset($_POST['advanced_section_bg'])) {
    update_post_meta($post_id, 'advanced_section_bg', sanitize_text_field($_POST['advanced_section_bg']));
}

// Allow HTML and inline CSS for HTML fields
if (isset($_POST['advanced_section_html_1'])) {
    $allowed_tags = wp_kses_allowed_html('post');
    foreach ($allowed_tags as $tag => $attrs) {
        $allowed_tags[$tag]['style'] = true;
    }
    $adv_html_1 = $_POST['advanced_section_html_1'];
    if (strpos($adv_html_1, '<p>') === false && !empty(trim($adv_html_1))) {
        $adv_html_1 = wpautop($adv_html_1);
    }
    update_post_meta($post_id, 'advanced_section_html_1', wp_kses($adv_html_1, $allowed_tags));
}

if (isset($_POST['advanced_section_html_2'])) {
    $allowed_tags = wp_kses_allowed_html('post');
    foreach ($allowed_tags as $tag => $attrs) {
        $allowed_tags[$tag]['style'] = true;
    }
    $adv_html_2 = $_POST['advanced_section_html_2'];
    if (strpos($adv_html_2, '<p>') === false && !empty(trim($adv_html_2))) {
        $adv_html_2 = wpautop($adv_html_2);
    }
    update_post_meta($post_id, 'advanced_section_html_2', wp_kses($adv_html_2, $allowed_tags));
}

// === Save Custom Output Section ===
if (isset($_POST['custom_output_title'])) {
    update_post_meta($post_id, 'custom_output_title', sanitize_text_field($_POST['custom_output_title']));
}

// Allow HTML for custom_output_description (to preserve paragraphs)
if (isset($_POST['custom_output_description'])) {
    $co_desc = $_POST['custom_output_description'];
    if (strpos($co_desc, '<p>') === false && !empty(trim($co_desc))) {
        $co_desc = wpautop($co_desc);
    }
    update_post_meta($post_id, 'custom_output_description', wp_kses_post($co_desc));
}

// Allow HTML or shortcode for output textarea
if (isset($_POST['custom_output_html'])) {
    $allowed_tags = wp_kses_allowed_html('post');
    foreach ($allowed_tags as $tag => $attrs) {
        $allowed_tags[$tag]['style'] = true;
    }
    $co_html = $_POST['custom_output_html'];
    if (strpos($co_html, '<p>') === false && !empty(trim($co_html))) {
        $co_html = wpautop($co_html);
    }
    update_post_meta($post_id, 'custom_output_html', wp_kses($co_html, $allowed_tags));
}

// === Save Custom Code Editor Section ===
$codeeditor_fields = [
    'codeeditor_title' => 'sanitize_text_field',
    'codeeditor_title_color' => 'sanitize_hex_color',
    'codeeditor_description' => 'sanitize_textarea_field',
];

foreach ($codeeditor_fields as $field => $sanitize_cb) {
    if (isset($_POST[$field])) {
        update_post_meta($post_id, $field, call_user_func($sanitize_cb, $_POST[$field]));
    }
}

// Allow HTML / shortcode in the output field
if (isset($_POST['codeeditor_output'])) {
    $allowed_tags = wp_kses_allowed_html('post');
    foreach ($allowed_tags as $tag => $attrs) {
        $allowed_tags[$tag]['style'] = true;
    }
    update_post_meta($post_id, 'codeeditor_output', wp_kses($_POST['codeeditor_output'], $allowed_tags));
}

// === Save Custom Code Grid Section ===
$codegrid_fields = [
    'codegrid_title' => 'sanitize_text_field',
    'codegrid_title_color' => 'sanitize_hex_color',
    'codegrid_item_color' => 'sanitize_hex_color',
];

foreach ($codegrid_fields as $field => $sanitize_cb) {
    if (isset($_POST[$field])) {
        update_post_meta($post_id, $field, call_user_func($sanitize_cb, $_POST[$field]));
    }
}

if (isset($_POST['codegrid_items']) && is_array($_POST['codegrid_items'])) {
    $clean_items = [];
    foreach ($_POST['codegrid_items'] as $item) {
        $title = sanitize_text_field($item['title']);
        $content = $item['content'];
        // Convert line breaks to paragraphs if needed
        if (!empty($content) && strpos($content, '<p>') === false) {
            $content = wpautop($content);
        }
        $content = wp_kses_post($content); // allow HTML & shortcode
        // Skip only if both title and content are empty
        if (empty($title) && empty($content)) continue;
        $clean_items[] = ['title' => $title, 'content' => $content];
    }
    update_post_meta($post_id, 'codegrid_items', $clean_items);
}


// === Save FAQ Section ===
if (isset($_POST['faq_main_title'])) {
    update_post_meta($post_id, 'faq_main_title', sanitize_text_field($_POST['faq_main_title']));
}

if (isset($_POST['faq_items']) && is_array($_POST['faq_items'])) {
    $clean_faqs = [];
    // array_values() preserves the drag-and-drop order submitted by the form
    foreach (array_values($_POST['faq_items']) as $index => $faq) {
        $sno      = (string) ($index + 1);
        $question = sanitize_text_field($faq['question'] ?? '');
        $question = preg_replace('/^\s*\d+\s*\.\s*/', '', $question);
        $answer   = wp_kses_post($faq['answer'] ?? '');
        // Only save FAQ entries that have at least a question or answer
        if (!empty($question) || !empty($answer)) {
            $clean_faqs[] = [
                'sno'      => $sno,
                'question' => $question,
                'answer'   => $answer
            ];
        }
    }
    update_post_meta($post_id, 'faq_items', $clean_faqs);
}
}
add_action('save_post', 'ccbm_save_meta');

function ccbm_load_admin_editor_assets($hook) {
    global $post;
    // Only load on LearnPress course edit pages
    if ($hook === 'post-new.php' || $hook === 'post.php') {
        if ($post && ccbm_is_course_post_type($post->post_type)) {
            wp_enqueue_editor(); // TinyMCE + Quicktags
            wp_enqueue_media();  // Media uploader
        }
    }
}
add_action('admin_enqueue_scripts', 'ccbm_load_admin_editor_assets');

/**
 * ====================================================
 * MAKE CUSTOM FIELDS AVAILABLE TO SEO PLUGINS (RankMath)
 * ====================================================
 * This function collects all custom field content for SEO analysis
 * Preserves HTML structure (headings, paragraphs) for proper SEO analysis
 */
function ccbm_get_all_custom_content($course_id, $preserve_html = true) {
    $seo_content = '';
    
    // Course Description
    $course_desc = get_post_meta($course_id, 'course_description', true);
    if (!empty($course_desc)) {
        if ($preserve_html) {
            $course_desc = wpautop($course_desc);
            $seo_content .= "\n\n" . $course_desc;
        } else {
            $seo_content .= "\n\n" . wp_strip_all_tags($course_desc);
        }
    }
    
    // Objectives Section Title (as H2)
    $objectives_title = get_post_meta($course_id, 'objectives_section_title', true);
    if (!empty($objectives_title)) {
        $seo_content .= "\n\n<h2>" . esc_html($objectives_title) . "</h2>";
    }
    
    // Objectives Section Description
    $objectives_desc = get_post_meta($course_id, 'objectives_section_description', true);
    if (!empty($objectives_desc)) {
        if ($preserve_html) {
            $objectives_desc = wpautop($objectives_desc);
            $seo_content .= "\n\n" . $objectives_desc;
        } else {
            $seo_content .= "\n\n" . wp_strip_all_tags($objectives_desc);
        }
    }
    
    // Objectives Section Content (preserve HTML structure)
    $objectives_content = get_post_meta($course_id, 'objectives_section_content', true);
    if (!empty($objectives_content)) {
        if ($preserve_html) {
            // Process with wpautop to ensure paragraphs
            $objectives_content = wpautop($objectives_content);
            $seo_content .= "\n\n" . $objectives_content;
        } else {
            $seo_content .= "\n\n" . wp_strip_all_tags($objectives_content);
        }
    }
    
    // Extra Info Grid
    $grid_items = get_post_meta($course_id, 'extra_info_grid', true);
    if (!empty($grid_items) && is_array($grid_items)) {
        foreach ($grid_items as $item) {
            if (!empty($item['title'])) {
                $seo_content .= "\n\n<h3>" . esc_html($item['title']) . "</h3>";
            }
            if (!empty($item['desc'])) {
                if ($preserve_html) {
                    $item_desc = wpautop($item['desc']);
                    $seo_content .= "\n" . $item_desc;
                } else {
                    $seo_content .= "\n" . wp_strip_all_tags($item['desc']);
                }
            }
        }
    }
    
    // Laws Section Title (as H2)
    $laws_title = get_post_meta($course_id, 'laws_section_title', true);
    if (!empty($laws_title)) {
        $seo_content .= "\n\n<h2>" . esc_html($laws_title) . "</h2>";
    }
    
    // Laws Section Description
    $laws_desc = get_post_meta($course_id, 'laws_section_description', true);
    if (!empty($laws_desc)) {
        if ($preserve_html) {
            $laws_desc = wpautop($laws_desc);
            $seo_content .= "\n\n" . $laws_desc;
        } else {
            $seo_content .= "\n\n" . wp_strip_all_tags($laws_desc);
        }
    }
    
    // Laws Section Content (preserve HTML structure)
    $laws_content = get_post_meta($course_id, 'laws_section_content', true);
    if (!empty($laws_content)) {
        if ($preserve_html) {
            $laws_content = wpautop($laws_content);
            $seo_content .= "\n\n" . $laws_content;
        } else {
            $seo_content .= "\n\n" . wp_strip_all_tags($laws_content);
        }
    }
    
    // Custom Content Sections (preserve headings)
    $custom_sections = get_post_meta($course_id, 'custom_content_sections', true);
    if (!empty($custom_sections) && is_array($custom_sections)) {
        foreach ($custom_sections as $section) {
            if (!empty($section['title'])) {
                $seo_content .= "\n\n<h3>" . esc_html($section['title']) . "</h3>";
            }
            if (!empty($section['content'])) {
                if ($preserve_html) {
                    $section_content = wpautop($section['content']);
                    $seo_content .= "\n" . $section_content;
                } else {
                    $seo_content .= "\n" . wp_strip_all_tags($section['content']);
                }
            }
        }
    }
    
    // Advanced Section Title (as H2)
    $adv_title = get_post_meta($course_id, 'advanced_section_title', true);
    if (!empty($adv_title)) {
        $seo_content .= "\n\n<h2>" . esc_html($adv_title) . "</h2>";
    }
    
    // Advanced Section Description
    $adv_desc = get_post_meta($course_id, 'advanced_section_description', true);
    if (!empty($adv_desc)) {
        if ($preserve_html) {
            $adv_desc = wpautop($adv_desc);
            $seo_content .= "\n\n" . $adv_desc;
        } else {
            $seo_content .= "\n\n" . wp_strip_all_tags($adv_desc);
        }
    }
    
    // Advanced Section HTML (preserve structure)
    $adv_html_1 = get_post_meta($course_id, 'advanced_section_html_1', true);
    if (!empty($adv_html_1)) {
        if ($preserve_html) {
            $adv_html_1 = wpautop($adv_html_1);
            $seo_content .= "\n\n" . $adv_html_1;
        } else {
            $seo_content .= "\n\n" . wp_strip_all_tags($adv_html_1);
        }
    }
    
    $adv_html_2 = get_post_meta($course_id, 'advanced_section_html_2', true);
    if (!empty($adv_html_2)) {
        if ($preserve_html) {
            $adv_html_2 = wpautop($adv_html_2);
            $seo_content .= "\n\n" . $adv_html_2;
        } else {
            $seo_content .= "\n\n" . wp_strip_all_tags($adv_html_2);
        }
    }
    
    // Custom Output Section Title (as H2)
    $co_title = get_post_meta($course_id, 'custom_output_title', true);
    if (!empty($co_title)) {
        $seo_content .= "\n\n<h2>" . esc_html($co_title) . "</h2>";
    }
    
    // Custom Output Description
    $co_desc = get_post_meta($course_id, 'custom_output_description', true);
    if (!empty($co_desc)) {
        if ($preserve_html) {
            $co_desc = wpautop($co_desc);
            $seo_content .= "\n\n" . $co_desc;
        } else {
            $seo_content .= "\n\n" . wp_strip_all_tags($co_desc);
        }
    }
    
    // Custom Output HTML (preserve structure)
    $co_html = get_post_meta($course_id, 'custom_output_html', true);
    if (!empty($co_html)) {
        if ($preserve_html) {
            $co_html = wpautop($co_html);
            $seo_content .= "\n\n" . $co_html;
        } else {
            $seo_content .= "\n\n" . wp_strip_all_tags($co_html);
        }
    }
    
    // Codegrid Title (as H2)
    $codegrid_title = get_post_meta($course_id, 'codegrid_title', true);
    if (!empty($codegrid_title)) {
        $seo_content .= "\n\n<h2>" . esc_html($codegrid_title) . "</h2>";
    }
    
    // Codegrid Items (preserve structure)
    $codegrid_items = get_post_meta($course_id, 'codegrid_items', true);
    if (!empty($codegrid_items) && is_array($codegrid_items)) {
        foreach ($codegrid_items as $item) {
            if (!empty($item['title'])) {
                $seo_content .= "\n\n<h3>" . esc_html($item['title']) . "</h3>";
            }
            if (!empty($item['content'])) {
                if ($preserve_html) {
                    $item_content = wpautop($item['content']);
                    $seo_content .= "\n" . $item_content;
                } else {
                    $seo_content .= "\n" . wp_strip_all_tags($item['content']);
                }
            }
        }
    }
    
    // FAQ Title (as H2)
    $faq_title = get_post_meta($course_id, 'faq_main_title', true);
    if (!empty($faq_title)) {
        $seo_content .= "\n\n<h2>" . esc_html($faq_title) . "</h2>";
    }
    
    // FAQ Items (preserve structure)
    $faq_items = get_post_meta($course_id, 'faq_items', true);
    if (!empty($faq_items) && is_array($faq_items)) {
        foreach ($faq_items as $index => $faq) {
            $faq_sno = trim((string) ($faq['sno'] ?? ''));
            if ($faq_sno === '') {
                $faq_sno = (string) ($index + 1);
            }
            if (!empty($faq['question'])) {
                $seo_content .= "\n\n<h3>" . esc_html($faq_sno . '. ' . $faq['question']) . "</h3>";
            }
            if (!empty($faq['answer'])) {
                if ($preserve_html) {
                    $faq_answer = wpautop($faq['answer']);
                    $seo_content .= "\n" . $faq_answer;
                } else {
                    $seo_content .= "\n" . wp_strip_all_tags($faq['answer']);
                }
            }
        }
    }
    
    return $seo_content;
}

// RankMath Integration - Add custom fields to content analysis
if (class_exists('RankMath')) {
    // Primary hook for RankMath content analysis (preserve HTML for headings detection)
    add_filter('rank_math/frontend/content', function($content, $post = null) {
        if (!$post) {
            global $post;
        }
        if ($post && ccbm_is_course_post_type($post->post_type)) {
            // Use preserve_html=true to keep H2, H3 tags for heading detection
            $custom_content = ccbm_get_all_custom_content($post->ID, true);
            $custom_content = wp_kses_post($custom_content); // Sanitize while preserving structure
            $content .= $custom_content;
        }
        return $content;
    }, 10, 2);
    
    // Alternative hook for content analysis
    add_filter('rank_math/analyzer/content', function($content, $post = null) {
        if (!$post) {
            global $post;
        }
        if ($post && ccbm_is_course_post_type($post->post_type)) {
            // Preserve HTML structure for proper analysis
            $custom_content = ccbm_get_all_custom_content($post->ID, true);
            $custom_content = wp_kses_post($custom_content); // Sanitize while preserving structure
            $content .= $custom_content;
        }
        return $content;
    }, 10, 2);
    
    // General content filter
    add_filter('rank_math/content', function($content, $post = null) {
        if (!$post) {
            global $post;
        }
        if ($post && ccbm_is_course_post_type($post->post_type)) {
            $custom_content = ccbm_get_all_custom_content($post->ID, true);
            $custom_content = wp_kses_post($custom_content); // Sanitize while preserving structure
            $content .= $custom_content;
        }
        return $content;
    }, 10, 2);
    
    // Add custom fields to RankMath's content length calculation
    add_filter('rank_math/content_length', function($length, $post = null) {
        if (!$post) {
            global $post;
        }
        if ($post && ccbm_is_course_post_type($post->post_type)) {
            // Use strip tags for accurate word count
            $custom_content = ccbm_get_all_custom_content($post->ID, false);
            $length += mb_strlen($custom_content);
        }
        return $length;
    }, 10, 2);
    
    // Use course description for meta description if not set
    add_filter('rank_math/frontend/description', function($description, $post = null) {
        if (!$post) {
            global $post;
        }
        if ($post && ccbm_is_course_post_type($post->post_type) && empty($description)) {
            $course_desc = get_post_meta($post->ID, 'course_description', true);
            if (!empty($course_desc)) {
                $description = wp_trim_words(wp_strip_all_tags($course_desc), 25);
            }
        }
        return $description;
    }, 10, 2);
    
    // Hook into RankMath's SEO analysis data (early priority)
    add_filter('rank_math/analyzer/content', function($content) {
        global $post;
        if ($post && ccbm_is_course_post_type($post->post_type)) {
            $custom_content = ccbm_get_all_custom_content($post->ID, true);
            $custom_content = wp_kses_post($custom_content); // Sanitize while preserving structure
            $content .= $custom_content;
        }
        return $content;
    }, 5);
}

// Add to the_content for SEO plugins - Always add in admin context
add_filter('the_content', function($content) {
    // Only for LearnPress courses
    if (!ccbm_is_course_post_type()) {
        return $content;
    }
    
    // Always add in admin (where RankMath analyzes)
    if (is_admin()) {
        $course_id = get_the_ID();
        if ($course_id) {
            $custom_content = ccbm_get_all_custom_content($course_id);
            return $content . $custom_content;
        }
    }
    
    // Also add in REST API context (RankMath might use this)
    if (defined('REST_REQUEST') && REST_REQUEST) {
        $course_id = get_the_ID();
        if ($course_id) {
            $custom_content = ccbm_get_all_custom_content($course_id);
            return $content . $custom_content;
        }
    }
    
    // Add for other SEO plugins
    if (defined('WPSEO_VERSION') && doing_action('wpseo_head')) {
        $course_id = get_the_ID();
        if ($course_id) {
            $custom_content = ccbm_get_all_custom_content($course_id);
            return $content . $custom_content;
        }
    }
    
    return $content;
}, 999);

// CRITICAL: Always append custom content to the_content in admin (where RankMath analyzes)
// This must run early and always in admin - preserves HTML structure for heading detection
add_filter('the_content', function($content) {
    // Only in admin and only for courses
    if (!is_admin() || !ccbm_is_course_post_type()) {
        return $content;
    }
    
    global $post;
    if ($post && $post->ID) {
        // Preserve HTML structure (H2, H3, paragraphs) for RankMath analysis
        $custom_content = ccbm_get_all_custom_content($post->ID, true);
        if (!empty($custom_content)) {
            // Sanitize HTML while preserving structure (headings, paragraphs, lists)
            $custom_content = wp_kses_post($custom_content);
            // Add with proper spacing - RankMath will analyze this HTML structure
            $content .= "\n\n<!-- Custom Course Fields Content for SEO -->\n" . $custom_content;
        }
    }
    
    return $content;
}, 5); // Early priority to ensure it runs before RankMath reads content