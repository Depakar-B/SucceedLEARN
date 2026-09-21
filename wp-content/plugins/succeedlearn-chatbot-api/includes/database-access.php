<?php
/**
 * Database Access - Direct database queries for faster data retrieval
 * 
 * @package SucceedLearn_Chatbot_API
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Database Access Class
 */
class SucceedLearn_Database_Access {
    /**
     * Get first non-empty meta value from a list of candidate keys.
     *
     * @param array $meta_data
     * @param array $keys
     * @return string
     */
    private static function get_meta_first($meta_data, $keys) {
        if (!is_array($meta_data) || !is_array($keys)) {
            return '';
        }
        foreach ($keys as $k) {
            if (!is_string($k) || $k === '') {
                continue;
            }
            if (isset($meta_data[$k]) && $meta_data[$k] !== '') {
                return $meta_data[$k];
            }
        }
        return '';
    }

    
    /**
     * Get courses directly from database
     *
     * @param array $args Query arguments
     * @return array Courses data
     */
    public static function get_courses_from_db($args = array()) {
        global $wpdb;
        
        $defaults = array(
            'status' => 'publish',
            'limit' => -1,
            'offset' => 0,
            'orderby' => 'post_date',
            'order' => 'DESC'
        );
        
        $args = wp_parse_args($args, $defaults);
        
        // Security: Sanitize inputs
        $status = sanitize_text_field($args['status']);
        $limit = intval($args['limit']);
        $offset = intval($args['offset']);
        $orderby = sanitize_sql_orderby($args['orderby'] . ' ' . $args['order']);
        if (!$orderby) {
            $orderby = 'post_date DESC';
        }
        
        // Prepare SQL query with prepared statements
        $sql = "SELECT ID, post_title, post_content, post_excerpt, post_date 
                FROM {$wpdb->posts} 
                WHERE post_type = 'lp_course' 
                AND post_status = %s";
        
        $sql_args = array($status);
        
        // Add ordering
        $sql .= " ORDER BY " . $orderby;
        
        // Add limit
        if ($limit > 0) {
            $sql .= " LIMIT %d OFFSET %d";
            $sql_args[] = $limit;
            $sql_args[] = $offset;
        }
        
        // Prepare and execute query
        $prepared_sql = $wpdb->prepare($sql, $sql_args);
        $results = $wpdb->get_results($prepared_sql, ARRAY_A);
        
        if (!$results || is_wp_error($results)) {
            return array();
        }
        
        // Process results
        $courses = array();
        foreach ($results as $row) {
            $course_id = intval($row['ID']);
            $course_data = self::get_course_full_data($course_id);
            if ($course_data) {
                $courses[] = $course_data;
            }
        }
        
        return $courses;
    }
    
    /**
     * Get complete course data including all meta fields
     *
     * @param int $course_id Course ID
     * @return array|false Course data or false
     */
    public static function get_course_full_data($course_id) {
        global $wpdb;
        
        // Security: Sanitize course ID
        $course_id = absint($course_id);
        
        if (!$course_id) {
            return false;
        }
        
        // Get post data
        $post = get_post($course_id);
        if (!$post || $post->post_type !== 'lp_course' || $post->post_status !== 'publish') {
            return false;
        }
        
        // Get all meta data in one query (more efficient)
        $meta_data = self::get_course_meta_bulk($course_id);
        
        // Build course data array
        $course_data = array(
            'id' => $course_id,
            'title' => self::get_course_title($course_id, $meta_data),
            'description' => self::get_course_description($course_id, $meta_data),
            'price' => self::get_course_price($course_id, $meta_data),
            'currency_symbol' => self::get_currency_symbol($course_id, $meta_data),
            'category' => self::get_course_category($course_id),
            'duration' => self::get_course_duration($course_id, $meta_data),
            'certificate' => self::has_certificate($course_id, $meta_data),
            'url' => esc_url(get_permalink($course_id)),
            'created_at' => get_the_date('Y-m-d H:i:s', $course_id),
            'source' => 'database',
            'faq_items' => self::get_faq_items($course_id, $meta_data),
            'outline_items' => self::get_outline_items($course_id, $meta_data),
            'extra_info' => self::get_extra_info($course_id, $meta_data),
        );
        
        return $course_data;
    }
    
    /**
     * Get all course meta data in bulk (more efficient)
     *
     * @param int $course_id Course ID
     * @return array Meta data array
     */
    private static function get_course_meta_bulk($course_id) {
        global $wpdb;
        
        $course_id = absint($course_id);
        
        // Get all meta in one query
        $meta_results = $wpdb->get_results($wpdb->prepare(
            "SELECT meta_key, meta_value 
            FROM {$wpdb->postmeta} 
            WHERE post_id = %d",
            $course_id
        ), ARRAY_A);
        
        $meta_data = array();
        foreach ($meta_results as $meta) {
            $meta_data[$meta['meta_key']] = $meta['meta_value'];
        }
        
        return $meta_data;
    }
    
    /**
     * Get course title (prefer custom meta, fallback to post title)
     */
    private static function get_course_title($course_id, $meta_data) {
        $title_keys = apply_filters('succeedlearn_chatbot_course_title_meta_keys', array(
            'course_title',
            'course_name',
            'lp_course_title',
            'acf_course_title',
        ));
        $title = self::get_meta_first($meta_data, $title_keys);
        if (!empty($title)) {
            // Decode HTML entities before sanitizing
            $title = html_entity_decode($title, ENT_QUOTES | ENT_HTML5, 'UTF-8');
            return sanitize_text_field($title);
        }
        $post_title = get_the_title($course_id);
        // Decode HTML entities before sanitizing
        $post_title = html_entity_decode($post_title, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        return sanitize_text_field($post_title);
    }
    
    /**
     * Get course description (prefer custom meta, fallback to excerpt/content)
     */
    private static function get_course_description($course_id, $meta_data) {
        $desc_keys = apply_filters('succeedlearn_chatbot_course_description_meta_keys', array(
            'course_description',
            'description',
            'course_desc',
            'acf_course_description',
        ));
        $desc_raw = self::get_meta_first($meta_data, $desc_keys);
        if (!empty($desc_raw)) {
            $desc = wp_strip_all_tags($desc_raw);
            return wp_trim_words($desc, 50);
        }
        
        $excerpt = get_the_excerpt($course_id);
        if (!empty($excerpt)) {
            return wp_trim_words(wp_strip_all_tags($excerpt), 50);
        }
        
        $content = get_post_field('post_content', $course_id);
        return wp_trim_words(wp_strip_all_tags($content), 50);
    }
    
    /**
     * Get course price (prefer custom meta, fallback to LearnPress meta)
     */
    private static function get_course_price($course_id, $meta_data) {
        // Check custom meta first (ACF/Custom fields)
        $price_keys = apply_filters('succeedlearn_chatbot_course_price_meta_keys', array(
            'individual_price',
            'course_price',
            'price',
            'acf_course_price',
        ));
        foreach ($price_keys as $k) {
            if (isset($meta_data[$k]) && $meta_data[$k] !== '' && is_numeric($meta_data[$k])) {
                return floatval($meta_data[$k]);
            }
        }
        
        // Check LearnPress meta
        if (isset($meta_data['_lp_price']) && is_numeric($meta_data['_lp_price'])) {
            return floatval($meta_data['_lp_price']);
        }
        
        // Check if free
        if (isset($meta_data['_lp_free']) && ($meta_data['_lp_free'] === 'yes' || $meta_data['_lp_free'] === '1')) {
            return 0;
        }
        
        return 0;
    }
    
    /**
     * Get currency symbol
     */
    private static function get_currency_symbol($course_id, $meta_data) {
        $currency_keys = apply_filters('succeedlearn_chatbot_course_currency_meta_keys', array(
            'individual_currency_symbol',
            'currency_symbol',
            'course_currency_symbol',
            'acf_course_currency_symbol',
        ));
        $sym = self::get_meta_first($meta_data, $currency_keys);
        if (!empty($sym)) {
            return sanitize_text_field($sym);
        }
        return '$'; // Default to USD
    }
    
    /**
     * Get course category
     */
    private static function get_course_category($course_id) {
        $categories = wp_get_post_terms($course_id, 'course_category', array('fields' => 'names'));
        
        if (!empty($categories) && is_array($categories)) {
            return sanitize_text_field($categories[0]);
        }
        
        // Fallback to course_tag
        $tags = wp_get_post_terms($course_id, 'course_tag', array('fields' => 'names'));
        if (!empty($tags) && is_array($tags)) {
            return sanitize_text_field($tags[0]);
        }
        
        return 'General';
    }
    
    /**
     * Get course duration
     */
    private static function get_course_duration($course_id, $meta_data) {
        // Check custom meta first
        $duration_keys = apply_filters('succeedlearn_chatbot_course_duration_meta_keys', array(
            'duration_value',
            'course_duration',
            'duration',
            'acf_course_duration',
        ));
        $dur = self::get_meta_first($meta_data, $duration_keys);
        if (!empty($dur)) {
            return wp_strip_all_tags($dur);
        }
        
        // Check LearnPress meta
        if (isset($meta_data['_lp_duration']) && !empty($meta_data['_lp_duration'])) {
            return sanitize_text_field($meta_data['_lp_duration']);
        }
        
        return 'Self-paced';
    }
    
    /**
     * Check if course has certificate
     */
    private static function has_certificate($course_id, $meta_data) {
        // Check LearnPress certificate meta
        if (isset($meta_data['_lp_cert'])) {
            $cert = $meta_data['_lp_cert'];
            if ($cert === 'yes' || $cert === '1' || $cert === true) {
                return true;
            }
        }
        
        // Check certificate addon
        if (isset($meta_data['_lp_certificate']) && !empty($meta_data['_lp_certificate'])) {
            return true;
        }
        
        // Default: assume all courses have certificates
        return true;
    }
    
    /**
     * Get FAQ items from meta
     */
    private static function get_faq_items($course_id, $meta_data) {
        if (!isset($meta_data['faq_items']) || empty($meta_data['faq_items'])) {
            return array();
        }
        
        $faq_items = maybe_unserialize($meta_data['faq_items']);
        
        if (!is_array($faq_items)) {
            return array();
        }
        
        return SucceedLearn_LearnPress_Integration::sanitize_faq_items($faq_items);
    }
    
    /**
     * Get outline items from meta
     */
    private static function get_outline_items($course_id, $meta_data) {
        if (!isset($meta_data['codegrid_items']) || empty($meta_data['codegrid_items'])) {
            return array();
        }
        
        $outline_items = maybe_unserialize($meta_data['codegrid_items']);
        
        if (!is_array($outline_items)) {
            return array();
        }
        
        return SucceedLearn_LearnPress_Integration::sanitize_outline_items($outline_items);
    }
    
    /**
     * Get extra info from meta
     */
    private static function get_extra_info($course_id, $meta_data) {
        if (!isset($meta_data['extra_info_grid']) || empty($meta_data['extra_info_grid'])) {
            return array();
        }
        
        $extra_info = maybe_unserialize($meta_data['extra_info_grid']);
        
        if (!is_array($extra_info)) {
            return array();
        }
        
        return SucceedLearn_LearnPress_Integration::sanitize_extra_info($extra_info);
    }
    
    /**
     * Search courses in database
     *
     * @param string $keyword Search keyword
     * @param int $limit Result limit
     * @return array Matching courses
     */
    public static function search_courses_in_db($keyword, $limit = 10) {
        global $wpdb;
        
        // Security: Sanitize keyword
        $keyword = sanitize_text_field($keyword);
        $keyword = trim($keyword);
        $limit = absint($limit);
        
        if (empty($keyword) || strlen($keyword) < 2) {
            return array();
        }
        
        // Prepare search query with prepared statements
        $search_term = '%' . $wpdb->esc_like($keyword) . '%';
        
        $sql = "SELECT DISTINCT p.ID 
                FROM {$wpdb->posts} p
                LEFT JOIN {$wpdb->postmeta} pm_title ON p.ID = pm_title.post_id AND pm_title.meta_key = 'course_title'
                LEFT JOIN {$wpdb->postmeta} pm_desc ON p.ID = pm_desc.post_id AND pm_desc.meta_key = 'course_description'
                LEFT JOIN {$wpdb->term_relationships} tr ON p.ID = tr.object_id
                LEFT JOIN {$wpdb->term_taxonomy} tt ON tr.term_taxonomy_id = tt.term_taxonomy_id
                LEFT JOIN {$wpdb->terms} t ON tt.term_id = t.term_id
                WHERE p.post_type = 'lp_course'
                AND p.post_status = 'publish'
                AND (
                    p.post_title LIKE %s
                    OR p.post_content LIKE %s
                    OR p.post_excerpt LIKE %s
                    OR pm_title.meta_value LIKE %s
                    OR pm_desc.meta_value LIKE %s
                    OR t.name LIKE %s
                )
                LIMIT %d";
        
        $prepared_sql = $wpdb->prepare(
            $sql,
            $search_term,
            $search_term,
            $search_term,
            $search_term,
            $search_term,
            $search_term,
            $limit
        );
        
        $results = $wpdb->get_col($prepared_sql);
        
        if (empty($results)) {
            return array();
        }
        
        // Get full course data for each result
        $courses = array();
        foreach ($results as $course_id) {
            $course_data = self::get_course_full_data(intval($course_id));
            if ($course_data) {
                $courses[] = $course_data;
            }
        }
        
        return $courses;
    }
    
    /**
     * Get course count
     *
     * @return int Course count
     */
    public static function get_course_count() {
        global $wpdb;
        
        $count = $wpdb->get_var(
            "SELECT COUNT(*) 
            FROM {$wpdb->posts} 
            WHERE post_type = 'lp_course' 
            AND post_status = 'publish'"
        );
        
        return intval($count);
    }
    
    /**
     * Get courses by category
     *
     * @param string $category Category name
     * @return array Courses
     */
    public static function get_courses_by_category($category) {
        global $wpdb;
        
        // Decode HTML entities before sanitizing
        $category = html_entity_decode($category, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $category = sanitize_text_field($category);
        
        $sql = "SELECT DISTINCT p.ID 
                FROM {$wpdb->posts} p
                INNER JOIN {$wpdb->term_relationships} tr ON p.ID = tr.object_id
                INNER JOIN {$wpdb->term_taxonomy} tt ON tr.term_taxonomy_id = tt.term_taxonomy_id
                INNER JOIN {$wpdb->terms} t ON tt.term_id = t.term_id
                WHERE p.post_type = 'lp_course'
                AND p.post_status = 'publish'
                AND tt.taxonomy = 'course_category'
                AND t.name = %s";
        
        $results = $wpdb->get_col($wpdb->prepare($sql, $category));
        
        if (empty($results)) {
            return array();
        }
        
        $courses = array();
        foreach ($results as $course_id) {
            $course_data = self::get_course_full_data(intval($course_id));
            if ($course_data) {
                $courses[] = $course_data;
            }
        }
        
        return $courses;
    }
}
