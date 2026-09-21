<?php
/**
 * Plugin Name: SucceedLearn Chatbot with API
 * Plugin URI: https://succeedlearn.com
 * Description: Intelligent chatbot with REST API for courses management. Features Lottie animations and course Q&A.
 * Version: 2.0.0
 * Author: SucceedLearn
 * Author URI: https://succeedlearn.com
 * License: GPL v2 or later
 * Text Domain: succeedlearn-chatbot-api
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Define plugin constants
define('SUCCEEDLEARN_CHATBOT_API_VERSION', '2.0.0');
define('SUCCEEDLEARN_CHATBOT_API_DIR', plugin_dir_path(__FILE__));
define('SUCCEEDLEARN_CHATBOT_API_URL', plugin_dir_url(__FILE__));
define('SUCCEEDLEARN_CHATBOT_API_BASENAME', plugin_basename(__FILE__));

/**
 * Main SucceedLearn Chatbot API Class
 */
class SucceedLearn_Chatbot_API_Plugin {
    
    /**
     * Instance of this class
     *
     * @var SucceedLearn_Chatbot_API_Plugin
     */
    private static $instance = null;
    
    /**
     * Get instance of this class
     *
     * @return SucceedLearn_Chatbot_API_Plugin
     */
    public static function get_instance() {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    /**
     * Constructor
     */
    private function __construct() {
        $this->init_hooks();
    }
    
    /**
     * Initialize WordPress hooks
     */
    private function init_hooks() {
        // Frontend
        add_action('wp_enqueue_scripts', array($this, 'enqueue_assets'));
        add_action('wp_footer', array($this, 'render_chatbot'));
        add_action('wp_ajax_succeedlearn_chatbot_message', array($this, 'handle_ajax_request'));
        add_action('wp_ajax_nopriv_succeedlearn_chatbot_message', array($this, 'handle_ajax_request'));

        // AMP support
        add_action('wp_head', array($this, 'add_amp_scripts'));
        add_action('amp_post_template_head', array($this, 'add_amp_scripts'));

        // Admin settings
        add_action('admin_menu', array($this, 'register_admin_menu'));
        add_action('admin_init', array($this, 'register_settings'));
        add_action('admin_enqueue_scripts', array($this, 'enqueue_admin_assets'));

        // REST API
        add_action('rest_api_init', array($this, 'register_rest_routes'));

        // Allow uploading Lottie JSON via Media Library
        add_filter('upload_mimes', array($this, 'allow_json_uploads'));
    }
    
    /**
     * Check if current page is AMP
     *
     * @return bool
     */
    private function is_amp() {
        // Check for AMP plugin
        if (function_exists('amp_is_request')) {
            return amp_is_request();
        }
        
        // Check for query parameter
        if (isset($_GET['amp']) && $_GET['amp'] === '1') {
            return true;
        }
        
        // Check for AMP endpoint
        if (function_exists('is_amp_endpoint')) {
            return is_amp_endpoint();
        }
        
        return false;
    }
    
    /**
     * Add AMP script dependencies to head
     */
    public function add_amp_scripts() {
        if (!$this->is_amp()) {
            return;
        }
        ?>
        <script async custom-element="amp-bind" src="https://cdn.ampproject.org/v0/amp-bind-0.1.js"></script>
        <script async custom-element="amp-form" src="https://cdn.ampproject.org/v0/amp-form-0.1.js"></script>
        <script async custom-element="amp-list" src="https://cdn.ampproject.org/v0/amp-list-0.1.js"></script>
        <?php
    }

    /**
     * Register REST API routes
     */
    public function register_rest_routes() {
        // Chatbot endpoint
        register_rest_route('succeedlearn-chatbot-api/v1', '/chat', array(
            'methods' => 'POST',
            'callback' => array($this, 'handle_rest_chat'),
            'permission_callback' => '__return_true',
        ));

        // Get all courses
        register_rest_route('succeedlearn-chatbot-api/v1', '/courses', array(
            'methods' => 'GET',
            'callback' => array($this, 'get_all_courses'),
            'permission_callback' => '__return_true',
        ));

        // Get single course
        register_rest_route('succeedlearn-chatbot-api/v1', '/courses/(?P<id>\d+)', array(
            'methods' => 'GET',
            'callback' => array($this, 'get_single_course'),
            'permission_callback' => '__return_true',
        ));
        
        // Get tracked questions (admin only)
        register_rest_route('succeedlearn-chatbot-api/v1', '/tracked-questions', array(
            'methods' => 'GET',
            'callback' => array($this, 'get_tracked_questions'),
            'permission_callback' => array($this, 'check_api_permission'),
        ));
        
        // Add answer to tracked question (admin only)
        register_rest_route('succeedlearn-chatbot-api/v1', '/add-answer', array(
            'methods' => 'POST',
            'callback' => array($this, 'add_answer_to_question'),
            'permission_callback' => array($this, 'check_api_permission'),
        ));

        // Create course (requires authentication)
        register_rest_route('succeedlearn-chatbot-api/v1', '/courses', array(
            'methods' => 'POST',
            'callback' => array($this, 'create_course'),
            'permission_callback' => array($this, 'check_api_permission'),
        ));

        // Update course (requires authentication)
        register_rest_route('succeedlearn-chatbot-api/v1', '/courses/(?P<id>\d+)', array(
            'methods' => 'PUT',
            'callback' => array($this, 'update_course'),
            'permission_callback' => array($this, 'check_api_permission'),
        ));

        // Delete course (requires authentication)
        register_rest_route('succeedlearn-chatbot-api/v1', '/courses/(?P<id>\d+)', array(
            'methods' => 'DELETE',
            'callback' => array($this, 'delete_course'),
            'permission_callback' => array($this, 'check_api_permission'),
        ));

        // Search courses
        register_rest_route('succeedlearn-chatbot-api/v1', '/courses/search', array(
            'methods' => 'GET',
            'callback' => array($this, 'search_courses'),
            'permission_callback' => '__return_true',
        ));
    }

    /**
     * Handle REST API chat request
     */
    public function handle_rest_chat($request) {
        $message = sanitize_text_field($request->get_param('message'));
        $user_id = $request->get_param('user_id');
        
        if (empty($message)) {
            return new WP_Error('missing_message', 'Message parameter is required', array('status' => 400));
        }

        require_once SUCCEEDLEARN_CHATBOT_API_DIR . 'includes/chatbot-handler.php';
        $handler = new SucceedLearn_Chatbot_Handler();
        $response = $handler->process_message($message, $user_id);
        
        return rest_ensure_response(array(
            'status' => 'success',
            'user_message' => $message,
            'reply' => $response,
            'timestamp' => current_time('mysql'),
        ));
    }

    /**
     * Get all courses via REST API - LearnPress integration
     */
    public function get_all_courses($request) {
        // Try LearnPress first, fallback to JSON
        require_once SUCCEEDLEARN_CHATBOT_API_DIR . 'includes/learnpress-integration.php';
        
        if (SucceedLearn_LearnPress_Integration::is_learnpress_active()) {
            $courses = SucceedLearn_LearnPress_Integration::get_learnpress_courses();
        } else {
            $courses = $this->load_courses_data();
        }
        
        $category = $request->get_param('category');
        $search = $request->get_param('search');
        
        if ($category) {
            $courses = array_filter($courses, function($course) use ($category) {
                return isset($course['category']) && strtolower($course['category']) === strtolower($category);
            });
        }
        
        if ($search) {
            $search = strtolower($search);
            $courses = array_filter($courses, function($course) use ($search) {
                $title = strtolower($course['title'] ?? '');
                $description = strtolower($course['description'] ?? '');
                $cat = strtolower($course['category'] ?? '');
                return strpos($title, $search) !== false || 
                       strpos($description, $search) !== false || 
                       strpos($cat, $search) !== false;
            });
        }
        
        return rest_ensure_response(array(
            'status' => 'success',
            'source' => SucceedLearn_LearnPress_Integration::is_learnpress_active() ? 'learnpress' : 'json',
            'count' => count($courses),
            'courses' => array_values($courses),
        ));
    }

    /**
     * Get single course - LearnPress integration
     */
    public function get_single_course($request) {
        $id = intval($request->get_param('id'));
        
        // Try LearnPress first
        require_once SUCCEEDLEARN_CHATBOT_API_DIR . 'includes/learnpress-integration.php';
        
        if (SucceedLearn_LearnPress_Integration::is_learnpress_active()) {
            $course = SucceedLearn_LearnPress_Integration::get_course_details($id);
            if ($course) {
                return rest_ensure_response(array(
                    'status' => 'success',
                    'source' => 'learnpress',
                    'course' => $course,
                ));
            }
        }
        
        // Fallback to JSON
        $courses = $this->load_courses_data();
        
        // Check by array index
        if (isset($courses[$id])) {
            return rest_ensure_response(array(
                'status' => 'success',
                'source' => 'json',
                'course' => $courses[$id],
            ));
        }
        
        // Check by course ID field
        foreach ($courses as $course) {
            if (isset($course['id']) && $course['id'] == $id) {
                return rest_ensure_response(array(
                    'status' => 'success',
                    'source' => 'json',
                    'course' => $course,
                ));
            }
        }
        
        return new WP_Error('course_not_found', 'Course not found', array('status' => 404));
    }

    /**
     * Create course
     */
    public function create_course($request) {
        $courses = $this->load_courses_data();
        
        $new_course = array(
            'id' => count($courses),
            'title' => sanitize_text_field($request->get_param('title')),
            'description' => sanitize_textarea_field($request->get_param('description')),
            'price' => floatval($request->get_param('price')),
            'category' => sanitize_text_field($request->get_param('category')),
            'duration' => sanitize_text_field($request->get_param('duration')),
            'certificate' => $request->get_param('certificate') === true || $request->get_param('certificate') === 'true',
            'created_at' => current_time('mysql'),
        );
        
        if (empty($new_course['title'])) {
            return new WP_Error('missing_title', 'Title is required', array('status' => 400));
        }
        
        $courses[] = $new_course;
        
        if ($this->save_courses_data($courses)) {
            return rest_ensure_response(array(
                'status' => 'success',
                'message' => 'Course created successfully',
                'course' => $new_course,
            ));
        }
        
        return new WP_Error('save_failed', 'Failed to save course', array('status' => 500));
    }

    /**
     * Update course
     */
    public function update_course($request) {
        $id = intval($request->get_param('id'));
        $courses = $this->load_courses_data();
        
        if (!isset($courses[$id])) {
            return new WP_Error('course_not_found', 'Course not found', array('status' => 404));
        }
        
        if ($request->get_param('title')) {
            $courses[$id]['title'] = sanitize_text_field($request->get_param('title'));
        }
        if ($request->get_param('description')) {
            $courses[$id]['description'] = sanitize_textarea_field($request->get_param('description'));
        }
        if ($request->get_param('price')) {
            $courses[$id]['price'] = floatval($request->get_param('price'));
        }
        if ($request->get_param('category')) {
            $courses[$id]['category'] = sanitize_text_field($request->get_param('category'));
        }
        if ($request->get_param('duration')) {
            $courses[$id]['duration'] = sanitize_text_field($request->get_param('duration'));
        }
        if ($request->has_param('certificate')) {
            $courses[$id]['certificate'] = $request->get_param('certificate') === true || $request->get_param('certificate') === 'true';
        }
        
        $courses[$id]['updated_at'] = current_time('mysql');
        
        if ($this->save_courses_data($courses)) {
            return rest_ensure_response(array(
                'status' => 'success',
                'message' => 'Course updated successfully',
                'course' => $courses[$id],
            ));
        }
        
        return new WP_Error('save_failed', 'Failed to update course', array('status' => 500));
    }

    /**
     * Delete course
     */
    public function delete_course($request) {
        $id = intval($request->get_param('id'));
        $courses = $this->load_courses_data();
        
        if (!isset($courses[$id])) {
            return new WP_Error('course_not_found', 'Course not found', array('status' => 404));
        }
        
        unset($courses[$id]);
        $courses = array_values($courses);
        
        if ($this->save_courses_data($courses)) {
            return rest_ensure_response(array(
                'status' => 'success',
                'message' => 'Course deleted successfully',
            ));
        }
        
        return new WP_Error('save_failed', 'Failed to delete course', array('status' => 500));
    }

    /**
     * Search courses
     */
    public function search_courses($request) {
        $query = sanitize_text_field($request->get_param('q'));
        
        if (empty($query)) {
            return new WP_Error('missing_query', 'Search query is required', array('status' => 400));
        }
        
        $courses = $this->load_courses_data();
        $query = strtolower($query);
        
        $results = array_filter($courses, function($course) use ($query) {
            $title = strtolower($course['title'] ?? '');
            $description = strtolower($course['description'] ?? '');
            $category = strtolower($course['category'] ?? '');
            return strpos($title, $query) !== false || 
                   strpos($description, $query) !== false || 
                   strpos($category, $query) !== false;
        });
        
        return rest_ensure_response(array(
            'status' => 'success',
            'query' => $query,
            'count' => count($results),
            'courses' => array_values($results),
        ));
    }
    
    /**
     * Get tracked questions (admin only)
     */
    public function get_tracked_questions($request) {
        require_once SUCCEEDLEARN_CHATBOT_API_DIR . 'includes/question-tracker.php';
        
        $limit = intval($request->get_param('limit'));
        if ($limit <= 0 || $limit > 100) {
            $limit = 10;
        }
        
        $questions = SucceedLearn_Question_Tracker::get_most_asked($limit);
        
        return rest_ensure_response(array(
            'status' => 'success',
            'count' => count($questions),
            'questions' => $questions,
        ));
    }
    
    /**
     * Add answer to tracked question (admin only)
     */
    public function add_answer_to_question($request) {
        require_once SUCCEEDLEARN_CHATBOT_API_DIR . 'includes/question-tracker.php';
        
        $question = sanitize_text_field($request->get_param('question'));
        $answer = sanitize_textarea_field($request->get_param('answer'));
        
        if (empty($question) || empty($answer)) {
            return new WP_Error('missing_fields', 'Question and answer are required', array('status' => 400));
        }
        
        $saved = SucceedLearn_Question_Tracker::add_answer($question, $answer);
        
        if ($saved) {
            return rest_ensure_response(array(
                'status' => 'success',
                'message' => 'Answer added successfully',
            ));
        }
        
        return new WP_Error('save_failed', 'Failed to save answer', array('status' => 500));
    }

    /**
     * Load courses data from JSON file
     */
    private function load_courses_data() {
        $file_path = SUCCEEDLEARN_CHATBOT_API_DIR . 'data/courses.json';
        
        if (!file_exists($file_path)) {
            return array();
        }
        
        $content = file_get_contents($file_path);
        $data = json_decode($content, true);
        
        return is_array($data) ? $data : array();
    }

    /**
     * Save courses data to JSON file
     */
    private function save_courses_data($courses) {
        $file_path = SUCCEEDLEARN_CHATBOT_API_DIR . 'data/courses.json';
        
        $json = json_encode($courses, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        
        return file_put_contents($file_path, $json) !== false;
    }

    /**
     * Check API permission
     */
    public function check_api_permission() {
        if (is_user_logged_in() && current_user_can('manage_options')) {
            return true;
        }
        
        $api_key = isset($_SERVER['HTTP_X_API_KEY']) ? $_SERVER['HTTP_X_API_KEY'] : '';
        $valid_key = get_option('succeedlearn_chatbot_api_key', '');
        
        if (!empty($valid_key) && $api_key === $valid_key) {
            return true;
        }
        
        return false;
    }

    /**
     * Allow JSON uploads (for Lottie files) in WordPress Media Library
     */
    public function allow_json_uploads($mimes) {
        if (!is_array($mimes)) {
            $mimes = array();
        }
        $mimes['json'] = 'application/json';
        return $mimes;
    }

    /**
     * Option key used to store plugin settings
     */
    private function option_key() {
        return 'succeedlearn_chatbot_api_settings';
    }

    /**
     * Default settings
     */
    private function default_settings() {
        return array(
            'toggle_lottie_url' => SUCCEEDLEARN_CHATBOT_API_URL . 'assets/lottie/live-chatbot.json',
            'header_lottie_url' => SUCCEEDLEARN_CHATBOT_API_URL . 'assets/lottie/robot-saludo.json',
            // AMP cannot run Lottie JSON (no custom JS). Use an animated GIF/WebP/PNG instead.
            // Upload it to Media Library and paste/select the URL in settings.
            'amp_toggle_icon_url' => '',
            'header_title' => 'SucceedLearn Support Assistant',
            'welcome_message' => "Hi! Welcome to SucceedLearn. How can I help you today?",
            'openai_enabled' => 0,
            'openai_api_key' => '',
            'openai_model' => 'gpt-4o-mini',
        );
    }

    /**
     * Get merged settings (saved + defaults)
     */
    private function get_settings() {
        $saved = get_option($this->option_key(), array());
        if (!is_array($saved)) {
            $saved = array();
        }
        return wp_parse_args($saved, $this->default_settings());
    }

    /**
     * Register admin menu page
     */
    public function register_admin_menu() {
        add_options_page(
            'SucceedLearn Chatbot API',
            'SucceedLearn Chatbot',
            'manage_options',
            'succeedlearn-chatbot-api',
            array($this, 'render_settings_page')
        );
    }

    /**
     * Register settings and fields
     */
    public function register_settings() {
        register_setting(
            'succeedlearn_chatbot_api_settings_group',
            $this->option_key(),
            array($this, 'sanitize_settings')
        );

        add_settings_section(
            'succeedlearn_chatbot_api_section_main',
            'Chatbot Settings',
            '__return_false',
            'succeedlearn-chatbot-api'
        );

        add_settings_section(
            'succeedlearn_chatbot_api_section_openai',
            'AI (OpenAI) Fallback (Optional)',
            '__return_false',
            'succeedlearn-chatbot-api'
        );

        add_settings_field(
            'toggle_lottie_url',
            'Floating Icon Lottie JSON URL',
            array($this, 'field_toggle_lottie_url'),
            'succeedlearn-chatbot-api',
            'succeedlearn_chatbot_api_section_main'
        );

        add_settings_field(
            'header_lottie_url',
            'Header (Inside Chat) Lottie JSON URL',
            array($this, 'field_header_lottie_url'),
            'succeedlearn-chatbot-api',
            'succeedlearn_chatbot_api_section_main'
        );

        add_settings_field(
            'amp_toggle_icon_url',
            'AMP Chat Icon (GIF/WebP/PNG URL)',
            array($this, 'field_amp_toggle_icon_url'),
            'succeedlearn-chatbot-api',
            'succeedlearn_chatbot_api_section_main'
        );

        add_settings_field(
            'header_title',
            'Chat Header Title',
            array($this, 'field_header_title'),
            'succeedlearn-chatbot-api',
            'succeedlearn_chatbot_api_section_main'
        );

        add_settings_field(
            'welcome_message',
            'Welcome Message',
            array($this, 'field_welcome_message'),
            'succeedlearn-chatbot-api',
            'succeedlearn_chatbot_api_section_main'
        );

        add_settings_field(
            'openai_enabled',
            'Enable OpenAI Fallback',
            array($this, 'field_openai_enabled'),
            'succeedlearn-chatbot-api',
            'succeedlearn_chatbot_api_section_openai'
        );

        add_settings_field(
            'openai_api_key',
            'OpenAI API Key',
            array($this, 'field_openai_api_key'),
            'succeedlearn-chatbot-api',
            'succeedlearn_chatbot_api_section_openai'
        );

        add_settings_field(
            'openai_model',
            'OpenAI Model',
            array($this, 'field_openai_model'),
            'succeedlearn-chatbot-api',
            'succeedlearn_chatbot_api_section_openai'
        );
    }

    /**
     * Sanitize settings before saving
     */
    public function sanitize_settings($input) {
        $defaults = $this->default_settings();
        $output = array();

        $toggle = isset($input['toggle_lottie_url']) ? esc_url_raw($input['toggle_lottie_url']) : '';
        $header = isset($input['header_lottie_url']) ? esc_url_raw($input['header_lottie_url']) : '';
        $amp_toggle_icon = isset($input['amp_toggle_icon_url']) ? esc_url_raw($input['amp_toggle_icon_url']) : '';

        $output['toggle_lottie_url'] = !empty($toggle) ? $toggle : $defaults['toggle_lottie_url'];
        $output['header_lottie_url'] = !empty($header) ? $header : $defaults['header_lottie_url'];
        $output['amp_toggle_icon_url'] = !empty($amp_toggle_icon) ? $amp_toggle_icon : $defaults['amp_toggle_icon_url'];
        $output['header_title'] = isset($input['header_title']) ? sanitize_text_field($input['header_title']) : $defaults['header_title'];
        $output['welcome_message'] = isset($input['welcome_message']) ? sanitize_textarea_field($input['welcome_message']) : $defaults['welcome_message'];

        $output['openai_enabled'] = !empty($input['openai_enabled']) ? 1 : 0;
        $output['openai_api_key'] = isset($input['openai_api_key']) ? sanitize_text_field($input['openai_api_key']) : '';
        $output['openai_model'] = isset($input['openai_model']) ? sanitize_text_field($input['openai_model']) : $defaults['openai_model'];

        return $output;
    }

    public function field_openai_enabled() {
        $settings = $this->get_settings();
        $enabled = !empty($settings['openai_enabled']);
        ?>
        <label>
            <input type="checkbox" name="<?php echo esc_attr($this->option_key()); ?>[openai_enabled]" value="1" <?php checked($enabled); ?> />
            Enable OpenAI as a fallback only when no local answer is found.
        </label>
        <p class="description">Your API key is stored on the server and is never exposed to the browser.</p>
        <?php
    }

    public function field_openai_api_key() {
        $settings = $this->get_settings();
        $value = isset($settings['openai_api_key']) ? $settings['openai_api_key'] : '';
        $masked = $value ? str_repeat('•', max(0, strlen($value) - 4)) . substr($value, -4) : '';
        ?>
        <input type="password" name="<?php echo esc_attr($this->option_key()); ?>[openai_api_key]" value="<?php echo esc_attr($value); ?>" class="regular-text" autocomplete="off" />
        <?php if ($masked): ?>
            <p class="description">Saved key: <code><?php echo esc_html($masked); ?></code></p>
        <?php else: ?>
            <p class="description">Paste your OpenAI API key here (e.g. <code>sk-...</code>).</p>
        <?php endif; ?>
        <?php
    }

    public function field_openai_model() {
        $settings = $this->get_settings();
        $value = isset($settings['openai_model']) ? $settings['openai_model'] : 'gpt-4o-mini';
        ?>
        <input type="text" name="<?php echo esc_attr($this->option_key()); ?>[openai_model]" value="<?php echo esc_attr($value); ?>" class="regular-text" />
        <p class="description">Example: <code>gpt-4o-mini</code>. Keep this lightweight to control costs.</p>
        <?php
    }

    /**
     * Enqueue admin scripts
     */
    public function enqueue_admin_assets($hook) {
        if ($hook !== 'settings_page_succeedlearn-chatbot-api') {
            return;
        }

        wp_enqueue_media();

        wp_enqueue_script(
            'succeedlearn-chatbot-api-lottie',
            SUCCEEDLEARN_CHATBOT_API_URL . 'assets/vendor/lottie.min.js',
            array(),
            '5.12.2',
            true
        );

        wp_enqueue_script(
            'succeedlearn-chatbot-api-admin',
            SUCCEEDLEARN_CHATBOT_API_URL . 'assets/js/admin-settings.js',
            array('jquery', 'succeedlearn-chatbot-api-lottie'),
            SUCCEEDLEARN_CHATBOT_API_VERSION,
            true
        );

        $settings = $this->get_settings();
        wp_localize_script(
            'succeedlearn-chatbot-api-admin',
            'succeedlearnChatbotApiAdmin',
            array(
                'toggle' => $settings['toggle_lottie_url'],
                'header' => $settings['header_lottie_url'],
            )
        );
    }

    /**
     * Render settings page
     */
    public function render_settings_page() {
        if (!current_user_can('manage_options')) {
            return;
        }
        ?>
        <div class="wrap">
            <h1>SucceedLearn Chatbot API</h1>
            <p>Configure the chatbot text and select Lottie animations. You can upload Lottie JSON files to Media Library and paste/select the URL here.</p>

            <form method="post" action="options.php">
                <?php
                settings_fields('succeedlearn_chatbot_api_settings_group');
                do_settings_sections('succeedlearn-chatbot-api');
                submit_button();
                ?>
            </form>

            <h2>Preview</h2>
            <p>Preview updates automatically when you change the URLs.</p>
            <div class="succeedlearn-chatbot-preview-grid">
                <div class="succeedlearn-chatbot-preview-card">
                    <h3>Floating Icon Preview</h3>
                    <div id="succeedlearn-chatbot-preview-toggle" class="succeedlearn-chatbot-preview-box"></div>
                </div>
                <div class="succeedlearn-chatbot-preview-card">
                    <h3>Header Animation Preview</h3>
                    <div id="succeedlearn-chatbot-preview-header" class="succeedlearn-chatbot-preview-box"></div>
                </div>
            </div>

            <style>
                .succeedlearn-chatbot-preview-grid{display:flex;gap:16px;flex-wrap:wrap;margin-top:12px}
                .succeedlearn-chatbot-preview-card{background:#fff;border:1px solid #dcdcde;border-radius:8px;padding:14px;min-width:260px;flex:1}
                .succeedlearn-chatbot-preview-card h3{margin:0 0 10px 0}
                .succeedlearn-chatbot-preview-box{width:120px;height:120px;border:1px dashed #c3c4c7;border-radius:12px;display:flex;align-items:center;justify-content:center;background:#f6f7f7}
                .succeedlearn-chatbot-preview-box svg{width:100% !important;height:100% !important;display:block}
            </style>

            <hr />
            <h2>API Endpoints</h2>
            <p><strong>REST API Base URL:</strong> <code><?php echo esc_url(rest_url('succeedlearn-chatbot-api/v1')); ?></code></p>
            <ul>
                <li><strong>POST</strong> /chat - Chatbot messages</li>
                <li><strong>GET</strong> /courses - Get all courses</li>
                <li><strong>GET</strong> /courses/{id} - Get single course</li>
                <li><strong>POST</strong> /courses - Create course (auth required)</li>
                <li><strong>PUT</strong> /courses/{id} - Update course (auth required)</li>
                <li><strong>DELETE</strong> /courses/{id} - Delete course (auth required)</li>
                <li><strong>GET</strong> /courses/search?q=term - Search courses</li>
                <li><strong>GET</strong> /tracked-questions - Get unanswered questions (admin only)</li>
                <li><strong>POST</strong> /add-answer - Add answer to tracked question (admin only)</li>
            </ul>
            
            <hr />
            <h2>Question Tracking</h2>
            <p>The chatbot automatically tracks questions it cannot answer. This helps you improve the bot by adding answers to frequently asked questions.</p>
            <?php
            require_once SUCCEEDLEARN_CHATBOT_API_DIR . 'includes/question-tracker.php';
            $tracked = SucceedLearn_Question_Tracker::get_most_asked(10);
            if (!empty($tracked)) {
                echo '<h3>Most Frequently Asked Unanswered Questions:</h3>';
                echo '<table class="wp-list-table widefat fixed striped">';
                echo '<thead><tr><th>Question</th><th>Times Asked</th><th>Last Asked</th><th>Action</th></tr></thead>';
                echo '<tbody>';
                foreach ($tracked as $item) {
                    $question = esc_html($item['question']);
                    $count = isset($item['count']) ? intval($item['count']) : 1;
                    $last_asked = isset($item['last_asked']) ? esc_html($item['last_asked']) : 'N/A';
                    echo '<tr>';
                    echo '<td><strong>' . $question . '</strong></td>';
                    echo '<td>' . $count . '</td>';
                    echo '<td>' . $last_asked . '</td>';
                    echo '<td><button type="button" class="button add-answer-btn" data-question="' . esc_attr($item['question']) . '">Add Answer</button></td>';
                    echo '</tr>';
                }
                echo '</tbody></table>';
            } else {
                echo '<p>No unanswered questions tracked yet. The bot will start tracking when users ask questions it cannot answer.</p>';
            }
            ?>
            
            <style>
                .add-answer-btn { margin-right: 5px; }
            </style>
            
            <script>
            jQuery(document).ready(function($) {
                $('.add-answer-btn').on('click', function() {
                    var question = $(this).data('question');
                    var answer = prompt('Enter the answer for: ' + question);
                    if (answer && answer.trim()) {
                        $.ajax({
                            url: '<?php echo esc_url(rest_url('succeedlearn-chatbot-api/v1/add-answer')); ?>',
                            method: 'POST',
                            beforeSend: function(xhr) {
                                xhr.setRequestHeader('X-WP-Nonce', '<?php echo wp_create_nonce('wp_rest'); ?>');
                            },
                            data: {
                                question: question,
                                answer: answer.trim()
                            },
                            success: function(response) {
                                alert('Answer added successfully! The bot will now respond to this question.');
                                location.reload();
                            },
                            error: function() {
                                alert('Failed to add answer. Please try again.');
                            }
                        });
                    }
                });
            });
            </script>
        </div>
        <?php
    }

    public function field_toggle_lottie_url() {
        $settings = $this->get_settings();
        ?>
        <input type="url" id="succeedlearn_toggle_lottie_url" name="<?php echo esc_attr($this->option_key()); ?>[toggle_lottie_url]" value="<?php echo esc_attr($settings['toggle_lottie_url']); ?>" class="regular-text" placeholder="https://example.com/animation.json" />
        <button type="button" class="button succeedlearn-chatbot-pick-media" data-target="#succeedlearn_toggle_lottie_url">Select from Media</button>
        <p class="description">Upload a Lottie JSON to Media Library and select it here, or paste any public JSON URL.</p>
        <?php
    }

    public function field_header_lottie_url() {
        $settings = $this->get_settings();
        ?>
        <input type="url" id="succeedlearn_header_lottie_url" name="<?php echo esc_attr($this->option_key()); ?>[header_lottie_url]" value="<?php echo esc_attr($settings['header_lottie_url']); ?>" class="regular-text" placeholder="https://example.com/animation.json" />
        <button type="button" class="button succeedlearn-chatbot-pick-media" data-target="#succeedlearn_header_lottie_url">Select from Media</button>
        <p class="description">This animation shows inside the chat header.</p>
        <?php
    }

    public function field_amp_toggle_icon_url() {
        $settings = $this->get_settings();
        $value = isset($settings['amp_toggle_icon_url']) ? $settings['amp_toggle_icon_url'] : '';
        ?>
        <input type="url" id="succeedlearn_amp_toggle_icon_url" name="<?php echo esc_attr($this->option_key()); ?>[amp_toggle_icon_url]" value="<?php echo esc_attr($value); ?>" class="regular-text" placeholder="https://example.com/chat-icon.gif" />
        <button type="button" class="button succeedlearn-chatbot-pick-media" data-target="#succeedlearn_amp_toggle_icon_url">Select from Media</button>
        <p class="description">AMP cannot run Lottie JSON. Use an animated GIF/WebP (recommended) or PNG for the floating chat icon on AMP pages.</p>
        <?php
    }

    public function field_header_title() {
        $settings = $this->get_settings();
        ?>
        <input type="text" name="<?php echo esc_attr($this->option_key()); ?>[header_title]" value="<?php echo esc_attr($settings['header_title']); ?>" class="regular-text" />
        <?php
    }

    public function field_welcome_message() {
        $settings = $this->get_settings();
        ?>
        <textarea name="<?php echo esc_attr($this->option_key()); ?>[welcome_message]" rows="3" class="large-text"><?php echo esc_textarea($settings['welcome_message']); ?></textarea>
        <?php
    }
    
    /**
     * Enqueue CSS and JavaScript files
     */
    public function enqueue_assets() {
        // Skip regular scripts on AMP pages
        if ($this->is_amp()) {
            // Only enqueue CSS for AMP
            wp_enqueue_style(
                'succeedlearn-chatbot-api-css',
                SUCCEEDLEARN_CHATBOT_API_URL . 'assets/css/chatbot.css',
                array(),
                SUCCEEDLEARN_CHATBOT_API_VERSION
            );
            return;
        }

        $settings = $this->get_settings();

        wp_enqueue_style(
            'succeedlearn-chatbot-api-css',
            SUCCEEDLEARN_CHATBOT_API_URL . 'assets/css/chatbot.css',
            array(),
            SUCCEEDLEARN_CHATBOT_API_VERSION
        );
        
        wp_enqueue_script(
            'succeedlearn-chatbot-api-lottie',
            SUCCEEDLEARN_CHATBOT_API_URL . 'assets/vendor/lottie.min.js',
            array(),
            '5.12.2',
            true
        );

        wp_enqueue_script(
            'succeedlearn-chatbot-api-js',
            SUCCEEDLEARN_CHATBOT_API_URL . 'assets/js/chatbot.js',
            array('jquery', 'succeedlearn-chatbot-api-lottie'),
            SUCCEEDLEARN_CHATBOT_API_VERSION,
            true
        );
        
        wp_localize_script('succeedlearn-chatbot-api-js', 'succeedlearnChatbot', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'restUrl' => rest_url('succeedlearn-chatbot-api/v1/chat'),
            'nonce' => wp_create_nonce('succeedlearn_chatbot_api_nonce'),
            'supportEmail' => 'support@succeedtech.com',
            'contactPage' => home_url('/contact-us/'),
            'lottie' => array(
                'toggle' => $settings['toggle_lottie_url'],
                'header' => $settings['header_lottie_url'],
            ),
            'ui' => array(
                'headerTitle' => $settings['header_title'],
                'welcomeMessage' => $settings['welcome_message'],
            ),
        ));
    }
    
    /**
     * Render chatbot HTML in footer
     */
    public function render_chatbot() {
        if ($this->is_amp()) {
            $this->render_amp_chatbot();
            return;
        }
        
        $settings = $this->get_settings();
        ?>
        <div id="succeedlearn-chatbot-widget" class="succeedlearn-chatbot-widget">
            <div id="succeedlearn-chatbot-toggle" class="succeedlearn-chatbot-toggle" aria-label="Open chat">
                <div id="succeedlearn-chatbot-toggle-lottie" class="succeedlearn-chatbot-toggle-lottie" aria-hidden="true"></div>
                <svg class="succeedlearn-chatbot-toggle-fallback" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M20 2H4C2.9 2 2 2.9 2 4V22L6 18H20C21.1 18 22 17.1 22 16V4C22 2.9 21.1 2 20 2Z" fill="currentColor"/>
                </svg>
                <div class="succeedlearn-chatbot-toggle-fallback-text" aria-hidden="true">
                    <div class="succeedlearn-chatbot-toggle-fallback-title">Chat</div>
                    <div class="succeedlearn-chatbot-toggle-fallback-subtitle">Contact us</div>
                </div>
            </div>
            
            <div id="succeedlearn-chatbot-window" class="succeedlearn-chatbot-window">
                <div class="succeedlearn-chatbot-header">
                    <div class="succeedlearn-chatbot-header-left">
                        <div id="succeedlearn-chatbot-header-lottie" class="succeedlearn-chatbot-header-lottie" aria-hidden="true"></div>
                        <h3 class="succeedlearn-chatbot-header-title"><?php echo esc_html($settings['header_title']); ?></h3>
                    </div>
                    <div class="succeedlearn-chatbot-header-actions">
                        <button id="succeedlearn-chatbot-back-menu" class="succeedlearn-chatbot-back-menu" aria-label="Go back to main menu" type="button" style="display:none;">Back</button>
                        <button id="succeedlearn-chatbot-close" class="succeedlearn-chatbot-close" aria-label="Close chat">×</button>
                    </div>
                </div>
                
                <div id="succeedlearn-chatbot-messages" class="succeedlearn-chatbot-messages">
                </div>
                
                <div id="succeedlearn-chatbot-quick-questions" class="succeedlearn-chatbot-quick-questions" aria-hidden="true"></div>
                
                <div class="succeedlearn-chatbot-input-area">
                    <input 
                        type="text" 
                        id="succeedlearn-chatbot-input" 
                        class="succeedlearn-chatbot-input" 
                        placeholder="Type your message..." 
                        maxlength="500"
                        aria-label="Type your message"
                    >
                    <button id="succeedlearn-chatbot-send" class="succeedlearn-chatbot-send" aria-label="Send message">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.01 21L23 12L2.01 3L2 10L17 12L2 14L2.01 21Z" fill="currentColor"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <?php
    }
    
    /**
     * Render AMP-compatible chatbot HTML
     */
    public function render_amp_chatbot() {
        $settings = $this->get_settings();
        $rest_url = rest_url('succeedlearn-chatbot-api/v1/chat');
        $welcome_message = !empty($settings['welcome_message']) ? esc_html($settings['welcome_message']) : 'Hi! Welcome to SucceedLearn. How can I help you today?';
        $header_title = !empty($settings['header_title']) ? esc_html($settings['header_title']) : 'SucceedLearn Chat';
        ?>
        <amp-state id="chatState">
            <script type="application/json">
            {
                "chatOpen": false
            }
            </script>
        </amp-state>
        
        <div id="succeedlearn-chatbot-widget-amp" class="succeedlearn-chatbot-widget">
            <!-- Chat Toggle Button -->
            <button 
                class="succeedlearn-chatbot-toggle"
                [class]="chatState.chatOpen ? 'succeedlearn-chatbot-toggle active' : 'succeedlearn-chatbot-toggle'"
                on="tap:AMP.setState({chatState: {chatOpen: !chatState.chatOpen}})"
                aria-label="Open chat"
            >
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M20 2H4C2.9 2 2 2.9 2 4V22L6 18H20C21.1 18 22 17.1 22 16V4C22 2.9 21.1 2 20 2Z" fill="currentColor"/>
                </svg>
            </button>
            
            <!-- Chat Window -->
            <div 
                class="succeedlearn-chatbot-window"
                [class]="chatState.chatOpen ? 'succeedlearn-chatbot-window succeedlearn-chatbot-window-open' : 'succeedlearn-chatbot-window'"
            >
                <!-- Header -->
                <div class="succeedlearn-chatbot-header">
                    <div class="succeedlearn-chatbot-header-left">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="width: 32px; height: 32px;">
                            <path d="M20 2H4C2.9 2 2 2.9 2 4V22L6 18H20C21.1 18 22 17.1 22 16V4C22 2.9 21.1 2 20 2Z" fill="currentColor"/>
                        </svg>
                        <h3 class="succeedlearn-chatbot-header-title"><?php echo esc_html($header_title); ?></h3>
                    </div>
                    <button 
                        class="succeedlearn-chatbot-close"
                        on="tap:AMP.setState({chatState: {chatOpen: false}})"
                        aria-label="Close chat"
                    >×</button>
                </div>
                
                <!-- Messages Container -->
                <div id="succeedlearn-chatbot-messages-amp" class="succeedlearn-chatbot-messages">
                    <!-- Welcome Message -->
                    <div class="succeedlearn-chatbot-message succeedlearn-chatbot-message-bot">
                        <?php echo wp_kses_post(nl2br($welcome_message)); ?>
                    </div>
                    
                    <!-- Dynamic Messages Container -->
                    <div id="chat-messages-container"></div>
                </div>
                
                <!-- Input Form -->
                <form 
                    method="post"
                    action-xhr="<?php echo esc_url($rest_url); ?>"
                    target="_top"
                    class="succeedlearn-chatbot-input-area"
                    id="chatbot-form-amp"
                >
                    <input 
                        type="text" 
                        name="message"
                        id="chatbot-input-amp"
                        class="succeedlearn-chatbot-input" 
                        placeholder="Type your message..." 
                        maxlength="500"
                        required
                        aria-label="Type your message"
                    >
                    <button type="submit" class="succeedlearn-chatbot-send" aria-label="Send message">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.01 21L23 12L2.01 3L2 10L17 12L2 14L2.01 21Z" fill="currentColor"/>
                        </svg>
                    </button>
                    <div submit-success>
                        <template type="amp-mustache">
                            <div class="succeedlearn-chatbot-message succeedlearn-chatbot-message-user">{{user_message}}</div>
                            <div class="succeedlearn-chatbot-message succeedlearn-chatbot-message-bot">{{{reply}}}</div>
                        </template>
                    </div>
                    <div submit-error>
                        <div class="succeedlearn-chatbot-error">Error sending message. Please try again.</div>
                    </div>
                </form>
            </div>
        </div>
        
        <style amp-custom>
        .succeedlearn-chatbot-widget {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 9999;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Helvetica Neue', sans-serif;
        }
        .succeedlearn-chatbot-toggle {
            width: 60px;
            height: 60px;
            background: #667eea;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            border: none;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            color: white;
            transition: transform 0.3s ease;
        }
        .succeedlearn-chatbot-toggle:active {
            transform: scale(0.95);
        }
        .succeedlearn-chatbot-window {
            position: fixed;
            bottom: 90px;
            right: 20px;
            width: 380px;
            max-width: calc(100vw - 40px);
            height: 600px;
            max-height: calc(100vh - 120px);
            background: white;
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.2);
            display: none;
            flex-direction: column;
            overflow: hidden;
        }
        .succeedlearn-chatbot-window-open {
            display: flex;
        }
        .succeedlearn-chatbot-header {
            padding: 16px;
            background: #667eea;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .succeedlearn-chatbot-header-left {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .succeedlearn-chatbot-header-title {
            margin: 0;
            font-size: 18px;
            font-weight: 600;
        }
        .succeedlearn-chatbot-close {
            background: transparent;
            border: none;
            color: white;
            font-size: 28px;
            line-height: 1;
            cursor: pointer;
            padding: 0;
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .succeedlearn-chatbot-messages {
            flex: 1;
            overflow-y: auto;
            padding: 16px;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }
        .succeedlearn-chatbot-message {
            padding: 12px 16px;
            border-radius: 12px;
            max-width: 85%;
            word-wrap: break-word;
            line-height: 1.5;
        }
        .succeedlearn-chatbot-message-bot {
            background: #f3f4f6;
            color: #1f2937;
            align-self: flex-start;
        }
        .succeedlearn-chatbot-message-user {
            background: #667eea;
            color: white;
            align-self: flex-end;
        }
        .succeedlearn-chatbot-input-area {
            padding: 16px;
            border-top: 1px solid #e5e7eb;
            display: flex;
            gap: 8px;
        }
        .succeedlearn-chatbot-input {
            flex: 1;
            padding: 12px 16px;
            border: 1px solid #d1d5db;
            border-radius: 24px;
            font-size: 14px;
            outline: none;
        }
        .succeedlearn-chatbot-input:focus {
            border-color: #667eea;
        }
        .succeedlearn-chatbot-send {
            width: 44px;
            height: 44px;
            background: #667eea;
            border: none;
            border-radius: 50%;
            color: white;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }
        .succeedlearn-chatbot-error {
            color: #dc2626;
            padding: 8px;
            font-size: 14px;
        }
        @media (max-width: 768px) {
            .succeedlearn-chatbot-window {
                width: calc(100vw - 40px);
                height: calc(100vh - 100px);
                bottom: 0;
                right: 20px;
            }
        }
        </style>
        <?php
    }
    
    /**
     * Handle AJAX request for chatbot messages
     */
    public function handle_ajax_request() {
        if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'succeedlearn_chatbot_api_nonce')) {
            wp_send_json_error(array('message' => 'Security check failed. Please refresh the page.'));
            return;
        }
        
        require_once SUCCEEDLEARN_CHATBOT_API_DIR . 'includes/chatbot-handler.php';
        
        $user_message = isset($_POST['message']) ? sanitize_text_field($_POST['message']) : '';
        
        if (empty($user_message)) {
            wp_send_json_error(array('message' => 'Message cannot be empty.'));
            return;
        }
        
        if (strlen($user_message) > 500) {
            wp_send_json_error(array('message' => 'Message is too long. Please keep it under 500 characters.'));
            return;
        }
        
        if (!$this->check_rate_limit()) {
            wp_send_json_error(array('message' => 'Too many requests. Please wait a moment before sending another message.'));
            return;
        }
        
        $handler = new SucceedLearn_Chatbot_Handler();
        $response = $handler->process_message($user_message, get_current_user_id());
        
        wp_send_json_success(array(
            'message' => wp_kses_post($response)
        ));
    }
    
    /**
     * Simple rate limiting
     */
    private function check_rate_limit() {
        $ip = $this->get_client_ip();
        $transient_key = 'succeedlearn_chatbot_api_rate_' . md5($ip);
        $requests = get_transient($transient_key);
        
        if ($requests === false) {
            set_transient($transient_key, 1, 60);
            return true;
        }
        
        if ($requests >= 5) {
            return false;
        }
        
        set_transient($transient_key, $requests + 1, 60);
        return true;
    }
    
    /**
     * Get client IP address
     */
    private function get_client_ip() {
        $ip_keys = array(
            'HTTP_CLIENT_IP',
            'HTTP_X_FORWARDED_FOR',
            'HTTP_X_FORWARDED',
            'HTTP_X_CLUSTER_CLIENT_IP',
            'HTTP_FORWARDED_FOR',
            'HTTP_FORWARDED',
            'REMOTE_ADDR'
        );
        
        foreach ($ip_keys as $key) {
            if (array_key_exists($key, $_SERVER) === true) {
                foreach (explode(',', $_SERVER[$key]) as $ip) {
                    $ip = trim($ip);
                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false) {
                        return $ip;
                    }
                }
            }
        }
        
        return isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '0.0.0.0';
    }
}

// Initialize the plugin
function succeedlearn_chatbot_api_init() {
    return SucceedLearn_Chatbot_API_Plugin::get_instance();
}

// Start the plugin
succeedlearn_chatbot_api_init();
