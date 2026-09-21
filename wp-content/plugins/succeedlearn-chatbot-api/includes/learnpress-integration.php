<?php
/**
 * LearnPress Integration
 * Fetches courses from LearnPress LMS plugin
 * 
 * @package SucceedLearn_Chatbot_API
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * LearnPress Integration Class
 */
class SucceedLearn_LearnPress_Integration {
    /**
     * Get first non-empty meta value from a list of candidate keys.
     *
     * @param int $course_id
     * @param array $keys
     * @return string
     */
    private static function meta_first($course_id, $keys) {
        if (!is_array($keys)) {
            return '';
        }
        foreach ($keys as $k) {
            if (!is_string($k) || $k === '') {
                continue;
            }
            $v = get_post_meta($course_id, $k, true);
            if ($v !== '' && $v !== null) {
                return $v;
            }
        }
        return '';
    }
    
    /**
     * Check if LearnPress is active
     *
     * @return bool
     */
    public static function is_learnpress_active() {
        return class_exists('LearnPress') || defined('LP_PLUGIN_FILE');
    }
    
    /**
     * Get all courses from LearnPress
     *
     * @return array Array of course data
     */
    public static function get_learnpress_courses() {
        if (!self::is_learnpress_active()) {
            return array();
        }
        
        // Try direct database access first (faster and more reliable)
        require_once SUCCEEDLEARN_CHATBOT_API_DIR . 'includes/database-access.php';
        
        if (class_exists('SucceedLearn_Database_Access')) {
            $db_courses = SucceedLearn_Database_Access::get_courses_from_db(array(
                'status' => 'publish',
                'limit' => -1,
            ));
            
            if (!empty($db_courses)) {
                return $db_courses;
            }
        }
        
        // Fallback to LearnPress functions
        $courses = array();
        
        // Get courses using LearnPress functions
        if (function_exists('learn_press_get_courses')) {
            $lp_courses = learn_press_get_courses(array(
                'post_status' => 'publish',
                'posts_per_page' => -1,
            ));
            
            foreach ($lp_courses as $course) {
                $course_id = $course->ID;
                $course_data = self::get_course_details($course_id);
                if ($course_data) {
                    $courses[] = $course_data;
                }
            }
        } else {
            // Fallback: Direct WP_Query for LearnPress post type
            $args = array(
                'post_type' => 'lp_course',
                'post_status' => 'publish',
                'posts_per_page' => -1,
            );
            
            $query = new WP_Query($args);
            
            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();
                    $course_id = get_the_ID();
                    $course_data = self::get_course_details($course_id);
                    if ($course_data) {
                        $courses[] = $course_data;
                    }
                }
                wp_reset_postdata();
            }
        }
        
        return $courses;
    }
    
    /**
     * Get detailed course information
     *
     * @param int $course_id LearnPress course ID
     * @return array|false Course data or false if not found
     */
    public static function get_course_details($course_id) {
        // Security: Sanitize course ID
        $course_id = absint($course_id);
        
        if (!$course_id) {
            return false;
        }
        
        // Try direct database access first (faster and more reliable)
        require_once SUCCEEDLEARN_CHATBOT_API_DIR . 'includes/database-access.php';
        
        if (class_exists('SucceedLearn_Database_Access')) {
            $db_course = SucceedLearn_Database_Access::get_course_full_data($course_id);
            if ($db_course) {
                return $db_course;
            }
        }
        
        // Fallback to WordPress functions (if database access fails)
        if (!self::is_learnpress_active()) {
            return false;
        }
        
        $course = get_post($course_id);
        
        if (!$course || $course->post_type !== 'lp_course') {
            return false;
        }
        
        // Get course title - prefer custom/ACF meta keys, fallback to post title
        $title_keys = apply_filters('succeedlearn_chatbot_course_title_meta_keys', array(
            'course_title',
            'course_name',
            'lp_course_title',
            'acf_course_title',
        ));
        $title = self::meta_first($course_id, $title_keys);
        if (empty($title)) { $title = get_the_title($course_id); }
        // Decode HTML entities before sanitizing
        $title = html_entity_decode($title, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $title = sanitize_text_field($title);
        
        // Get course description - prefer custom/ACF meta keys, fallback to excerpt/content
        $desc_keys = apply_filters('succeedlearn_chatbot_course_description_meta_keys', array(
            'course_description',
            'description',
            'course_desc',
            'acf_course_description',
        ));
        $description = self::meta_first($course_id, $desc_keys);
        if (empty($description)) {
            $description = get_the_excerpt($course_id);
            if (empty($description)) {
                $description = wp_trim_words(get_post_field('post_content', $course_id), 30);
            }
        }
        // Strip HTML tags for chatbot display, but preserve line breaks
        $description = wp_strip_all_tags($description);
        $description = wp_trim_words($description, 50);
        
        // Get course price - prefer custom/ACF keys, then LearnPress price
        $price_keys = apply_filters('succeedlearn_chatbot_course_price_meta_keys', array(
            'individual_price',
            'course_price',
            'price',
            'acf_course_price',
        ));
        $price = self::meta_first($course_id, $price_keys);
        if (empty($price) || !is_numeric($price)) {
            $price = self::get_course_price($course_id);
        } else {
            $price = floatval($price);
        }
        
        // Get currency symbol - prefer custom/ACF meta keys
        $currency_keys = apply_filters('succeedlearn_chatbot_course_currency_meta_keys', array(
            'individual_currency_symbol',
            'currency_symbol',
            'course_currency_symbol',
            'acf_course_currency_symbol',
        ));
        $currency_symbol = self::meta_first($course_id, $currency_keys);
        if (empty($currency_symbol)) {
            $currency_symbol = '$'; // Default to USD
        }
        $currency_symbol = sanitize_text_field($currency_symbol);
        
        // Get course category
        $category = self::get_course_category($course_id);
        
        // Get course duration - prefer custom/ACF meta keys
        $duration_keys = apply_filters('succeedlearn_chatbot_course_duration_meta_keys', array(
            'duration_value',
            'course_duration',
            'duration',
            'acf_course_duration',
        ));
        $duration = self::meta_first($course_id, $duration_keys);
        if (empty($duration)) {
            $duration = self::get_course_duration($course_id);
        }
        // Strip HTML tags from duration
        $duration = wp_strip_all_tags($duration);
        
        // Check if course has certificate
        $certificate = self::has_certificate($course_id);
        
        // Get FAQ items for chatbot responses
        $faq_items = get_post_meta($course_id, 'faq_items', true);
        if (!is_array($faq_items)) {
            $faq_items = array();
        }
        
        // Get course outline items
        $outline_items = get_post_meta($course_id, 'codegrid_items', true);
        if (!is_array($outline_items)) {
            $outline_items = array();
        }
        
        // Get extra info grid items
        $extra_info = get_post_meta($course_id, 'extra_info_grid', true);
        if (!is_array($extra_info)) {
            $extra_info = array();
        }
        
        return array(
            'id' => $course_id,
            'title' => $title,
            'description' => $description,
            'price' => $price,
            'currency_symbol' => $currency_symbol,
            'category' => $category,
            'duration' => $duration,
            'certificate' => $certificate,
            'url' => esc_url(get_permalink($course_id)),
            'created_at' => get_the_date('Y-m-d H:i:s', $course_id),
            'source' => 'learnpress',
            'faq_items' => self::sanitize_faq_items($faq_items),
            'outline_items' => self::sanitize_outline_items($outline_items),
            'extra_info' => self::sanitize_extra_info($extra_info),
        );
    }
    
    /**
     * Sanitize FAQ items for safe display
     *
     * @param array $faq_items Raw FAQ items
     * @return array Sanitized FAQ items
     */
    public static function sanitize_faq_items($faq_items) {
        if (!is_array($faq_items)) {
            return array();
        }
        
        $sanitized = array();
        foreach ($faq_items as $item) {
            if (!is_array($item)) {
                continue;
            }
            
            $question = isset($item['question']) ? sanitize_text_field($item['question']) : '';
            $answer = isset($item['answer']) ? wp_strip_all_tags($item['answer']) : '';
            
            // Only include if both question and answer exist
            if (!empty($question) && !empty($answer)) {
                $sanitized[] = array(
                    'question' => $question,
                    'answer' => wp_trim_words($answer, 30) // Limit answer length
                );
            }
        }
        
        return $sanitized;
    }
    
    /**
     * Sanitize outline items for safe display
     *
     * @param array $outline_items Raw outline items
     * @return array Sanitized outline items
     */
    public static function sanitize_outline_items($outline_items) {
        if (!is_array($outline_items)) {
            return array();
        }
        
        $sanitized = array();
        foreach ($outline_items as $item) {
            if (!is_array($item)) {
                continue;
            }
            
            $title = isset($item['title']) ? sanitize_text_field($item['title']) : '';
            $content = isset($item['content']) ? wp_strip_all_tags($item['content']) : '';
            
            if (!empty($title)) {
                $sanitized[] = array(
                    'title' => $title,
                    'content' => wp_trim_words($content, 20)
                );
            }
        }
        
        return $sanitized;
    }
    
    /**
     * Sanitize extra info items for safe display
     *
     * @param array $extra_info Raw extra info items
     * @return array Sanitized extra info items
     */
    public static function sanitize_extra_info($extra_info) {
        if (!is_array($extra_info)) {
            return array();
        }
        
        $sanitized = array();
        foreach ($extra_info as $item) {
            if (!is_array($item)) {
                continue;
            }
            
            $title = isset($item['title']) ? sanitize_text_field($item['title']) : '';
            $desc = isset($item['desc']) ? wp_strip_all_tags($item['desc']) : '';
            
            if (!empty($title)) {
                $sanitized[] = array(
                    'title' => $title,
                    'description' => wp_trim_words($desc, 25)
                );
            }
        }
        
        return $sanitized;
    }
    
    /**
     * Get course price from LearnPress
     *
     * @param int $course_id Course ID
     * @return float Course price
     */
    private static function get_course_price($course_id) {
        // Security: Sanitize course ID
        $course_id = absint($course_id);
        
        $price = 0;
        
        // Method 1: Check custom meta first (individual_price)
        $custom_price = get_post_meta($course_id, 'individual_price', true);
        if (!empty($custom_price) && is_numeric($custom_price)) {
            return floatval($custom_price);
        }
        
        // Method 2: Using LearnPress course meta
        if (function_exists('learn_press_get_course')) {
            $lp_course = learn_press_get_course($course_id);
            if ($lp_course) {
                // Try to get price using LearnPress methods
                if (method_exists($lp_course, 'get_price')) {
                    $price = floatval($lp_course->get_price());
                } elseif (method_exists($lp_course, 'get_regular_price')) {
                    $price = floatval($lp_course->get_regular_price());
                }
            }
        }
        
        // Method 3: Direct meta query
        if ($price == 0) {
            $regular_price = get_post_meta($course_id, '_lp_price', true);
            if ($regular_price !== '' && $regular_price !== false && is_numeric($regular_price)) {
                $price = floatval($regular_price);
            }
        }
        
        // Method 4: Check if course is free
        if ($price == 0) {
            $is_free = get_post_meta($course_id, '_lp_free', true);
            if ($is_free === 'yes' || $is_free === true || $is_free === '1') {
                return 0; // Free course
            }
        }
        
        return max(0, $price); // Ensure non-negative
    }
    
    /**
     * Get course category
     *
     * @param int $course_id Course ID
     * @return string Category name
     */
    private static function get_course_category($course_id) {
        $categories = wp_get_post_terms($course_id, 'course_category', array('fields' => 'names'));
        
        if (!empty($categories) && is_array($categories)) {
            return $categories[0];
        }
        
        // Fallback to course_tag
        $tags = wp_get_post_terms($course_id, 'course_tag', array('fields' => 'names'));
        if (!empty($tags) && is_array($tags)) {
            return $tags[0];
        }
        
        return 'General';
    }
    
    /**
     * Get course duration
     *
     * @param int $course_id Course ID
     * @return string Duration
     */
    private static function get_course_duration($course_id) {
        // Try to get duration from LearnPress meta
        $duration = get_post_meta($course_id, '_lp_duration', true);
        
        if (!empty($duration)) {
            return $duration;
        }
        
        // Calculate from lessons
        if (function_exists('learn_press_get_course')) {
            $lp_course = learn_press_get_course($course_id);
            if ($lp_course && method_exists($lp_course, 'get_items')) {
                $items = $lp_course->get_items();
                $lesson_count = 0;
                foreach ($items as $item) {
                    if ($item->get_item_type() === 'lp_lesson') {
                        $lesson_count++;
                    }
                }
                
                if ($lesson_count > 0) {
                    // Estimate: 1 week per 4-5 lessons
                    $weeks = ceil($lesson_count / 4);
                    return $weeks . ' week' . ($weeks > 1 ? 's' : '');
                }
            }
        }
        
        return 'Self-paced';
    }
    
    /**
     * Check if course has certificate
     *
     * @param int $course_id Course ID
     * @return bool
     */
    private static function has_certificate($course_id) {
        // Check LearnPress certificate meta
        $certificate = get_post_meta($course_id, '_lp_cert', true);
        
        if ($certificate === 'yes' || $certificate === true || $certificate === '1') {
            return true;
        }
        
        // Check if LearnPress Certificate addon is active
        if (class_exists('LP_Addon_Certificates')) {
            $certificate_id = get_post_meta($course_id, '_lp_certificate', true);
            return !empty($certificate_id);
        }
        
        // Default: assume all courses have certificates
        return true;
    }
    
    /**
     * Search courses by keyword
     *
     * @param string $keyword Search keyword
     * @return array Matching courses
     */
    public static function search_courses($keyword) {
        // Security: Sanitize and validate keyword
        $keyword = sanitize_text_field($keyword);
        $keyword = trim($keyword);
        
        if (empty($keyword) || strlen($keyword) < 2) {
            return array(); // Require at least 2 characters
        }
        
        // Try direct database search first (faster)
        require_once SUCCEEDLEARN_CHATBOT_API_DIR . 'includes/database-access.php';
        
        if (class_exists('SucceedLearn_Database_Access')) {
            $db_results = SucceedLearn_Database_Access::search_courses_in_db($keyword, 10);
            if (!empty($db_results)) {
                return $db_results;
            }
        }
        
        // Fallback to in-memory search
        $all_courses = self::get_learnpress_courses();
        $keyword_lower = strtolower($keyword);
        $results = array();
        
        foreach ($all_courses as $course) {
            // Security: Use sanitized values
            $title = strtolower($course['title'] ?? '');
            $description = strtolower($course['description'] ?? '');
            $category = strtolower($course['category'] ?? '');
            
            // Search in title, description, and category
            if (strpos($title, $keyword_lower) !== false || 
                strpos($description, $keyword_lower) !== false || 
                strpos($category, $keyword_lower) !== false) {
                $results[] = $course;
            }
        }
        
        // Limit results to prevent data leak
        return array_slice($results, 0, 10);
    }
    
    /**
     * Get FAQ items for a specific course
     *
     * @param int $course_id Course ID
     * @return array FAQ items
     */
    public static function get_course_faqs($course_id) {
        // Security: Sanitize course ID
        $course_id = absint($course_id);
        
        if (!$course_id || !self::is_learnpress_active()) {
            return array();
        }
        
        $faq_items = get_post_meta($course_id, 'faq_items', true);
        if (!is_array($faq_items)) {
            return array();
        }
        
        return self::sanitize_faq_items($faq_items);
    }
    
    /**
     * Get course outline for a specific course
     *
     * @param int $course_id Course ID
     * @return array Outline items
     */
    public static function get_course_outline($course_id) {
        // Security: Sanitize course ID
        $course_id = absint($course_id);
        
        if (!$course_id || !self::is_learnpress_active()) {
            return array();
        }
        
        $outline_items = get_post_meta($course_id, 'codegrid_items', true);
        if (!is_array($outline_items)) {
            return array();
        }
        
        return self::sanitize_outline_items($outline_items);
    }
}
