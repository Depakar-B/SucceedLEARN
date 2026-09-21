<?php
/**
 * Plugin Name: Bottom Security Sticky Bar
 * Description: A sticky bottom bar with timer, security message, and animated CTA button
 * Version: 1.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Default settings
function security_bar_default_settings() {
    return array(
        'headline' => 'READY TO BUILD A SECURITY CULTURE YOUR EMPLOYEES ACTUALLY ADOPT?',
        'subtext' => 'Turn your workforce into a human firewall with engaging, behaviour-first training.',
        'button_text' => 'Fortify Teams Today',
        'button_link' => '#contact',
        'timer_enabled' => true,
        'timer_max_minutes' => 5,
        'timer_max_seconds' => 0,
        'timer_use_persistent' => true,
        'show_on_all_pages' => true,
        'show_on_homepage' => true,
        'show_on_posts' => true,
        'show_on_pages' => false,
        'selected_page_ids' => array(),
    );
}

// Get settings with defaults
function security_bar_get_settings() {
    $defaults = security_bar_default_settings();
    $settings = get_option('security_bar_settings', $defaults);
    return wp_parse_args($settings, $defaults);
}

// Check if bar should be displayed
function security_bar_should_display() {
    $settings = security_bar_get_settings();
    
    // If show on all pages is enabled, always show
    if ($settings['show_on_all_pages']) {
        return true;
    }
    
    // Check specific page types
    if (is_front_page() && $settings['show_on_homepage']) {
        return true;
    }
    
    if (is_single() && $settings['show_on_posts']) {
        return true;
    }
    
    // Check if show on pages is enabled
    if ($settings['show_on_pages']) {
        // Only show if specific pages are selected and current page is in the list
        if (!empty($settings['selected_page_ids']) && is_array($settings['selected_page_ids'])) {
            $current_page_id = get_queried_object_id();
            if (in_array($current_page_id, $settings['selected_page_ids'])) {
                return true;
            }
        }
        // If show_on_pages is enabled but no pages selected, don't show
        return false;
    }
    
    return false;
}

// Enqueue scripts and styles
add_action('wp_enqueue_scripts', function () {
    if (!security_bar_should_display()) {
        return;
    }
    
    
    wp_enqueue_style(
        'security-bar-css',
        plugin_dir_url(__FILE__) . 'bottom-bar.css',
        [],
        '1.1'
    );

    wp_enqueue_script(
        'security-bar-js',
        plugin_dir_url(__FILE__) . 'bottom-bar.js',
        [],
        '1.1',
        true
    );
});

// Output HTML
add_action('wp_footer', function () {
    if (!security_bar_should_display()) {
        return;
    }
    
    $settings = security_bar_get_settings();
    
    // Return early for mobile and tablet devices - only show on desktop
    if (function_exists('wp_is_mobile') && wp_is_mobile()) {
        return;
    }
    
    $headline = !empty($settings['headline']) ? $settings['headline'] : 'READY TO BUILD A SECURITY CULTURE YOUR EMPLOYEES ACTUALLY ADOPT?';
    $subtext = !empty($settings['subtext']) ? $settings['subtext'] : 'Turn your workforce into a human firewall with engaging, behaviour-first training.';
    $button_text = !empty($settings['button_text']) ? $settings['button_text'] : 'Fortify Teams Today';
    $button_link = esc_url($settings['button_link']);
    $timer_enabled = isset($settings['timer_enabled']) ? $settings['timer_enabled'] : true;
    $timer_max_min = isset($settings['timer_max_minutes']) ? intval($settings['timer_max_minutes']) : 5;
    $timer_max_sec = isset($settings['timer_max_seconds']) ? intval($settings['timer_max_seconds']) : 0;
    $timer_use_persistent = isset($settings['timer_use_persistent']) ? $settings['timer_use_persistent'] : true;
    
    // Generate random time within max limit
    $max_total_seconds = ($timer_max_min * 60) + $timer_max_sec;
    $random_seconds = rand(0, max(0, $max_total_seconds - 1));
    $timer_min = floor($random_seconds / 60);
    $timer_sec = $random_seconds % 60;
    $timer_display = sprintf('%02d : %02d', $timer_min, $timer_sec);
    
    // Regular version with JavaScript
    ?>
    <div class="security-bar" 
             data-timer-min="<?php echo esc_attr($timer_min); ?>" 
             data-timer-sec="<?php echo esc_attr($timer_sec); ?>" 
             data-timer-max-min="<?php echo esc_attr($timer_max_min); ?>" 
             data-timer-max-sec="<?php echo esc_attr($timer_max_sec); ?>" 
             data-timer-persistent="<?php echo $timer_use_persistent ? '1' : '0'; ?>"
             data-timer-enabled="<?php echo $timer_enabled ? '1' : '0'; ?>">
            <div class="security-bar-inner">
                <?php if ($timer_enabled) { ?>
                <div class="timer-box">
                    <svg class="timer-icon" width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <!-- Horizontal lines extending from left -->
                        <line x1="0" y1="8" x2="6" y2="8" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        <line x1="0" y1="16" x2="6" y2="16" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        <line x1="0" y1="24" x2="6" y2="24" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        <!-- Stopwatch circle -->
                        <circle cx="19" cy="16" r="10" stroke="currentColor" stroke-width="2" fill="none"/>
                        <!-- Stopwatch top handle -->
                        <path d="M19 6 L19 4 L23 4" stroke="currentColor" stroke-width="2" stroke-linecap="round" fill="none"/>
                        <!-- Clock hands -->
                        <line x1="19" y1="16" x2="19" y2="10" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        <line x1="19" y1="16" x2="24" y2="16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>
                    <span class="timer-text"><?php echo esc_html($timer_display); ?></span>
                </div>
                <?php } ?>
                <div class="security-text">
                    <h3><?php echo esc_html($headline); ?></h3>
                    <p><?php echo esc_html($subtext); ?></p>
                </div>
                <a href="<?php echo $button_link; ?>" class="security-btn">
                    <span><?php echo esc_html($button_text); ?></span>
                </a>
            </div>
        </div>
    <?php
});

// Add settings page (optional - for future customization)
add_action('admin_menu', function () {
    add_options_page(
        'Security Bar Settings',
        'Security Bar',
        'manage_options',
        'security-bar-settings',
        'security_bar_settings_page'
    );
});

// Settings page callback
function security_bar_settings_page() {
    if (isset($_POST['security_bar_save']) && check_admin_referer('security_bar_settings')) {
        // Handle selected page IDs
        $selected_page_ids = array();
        if (isset($_POST['selected_page_ids']) && is_array($_POST['selected_page_ids'])) {
            $selected_page_ids = array_map('intval', $_POST['selected_page_ids']);
        }
        
        $settings = array(
            'headline' => sanitize_text_field($_POST['headline']),
            'subtext' => sanitize_textarea_field($_POST['subtext']),
            'button_text' => sanitize_text_field($_POST['button_text']),
            'button_link' => esc_url_raw($_POST['button_link']),
            'timer_enabled' => isset($_POST['timer_enabled']),
            'timer_max_minutes' => intval($_POST['timer_max_minutes']),
            'timer_max_seconds' => intval($_POST['timer_max_seconds']),
            'timer_use_persistent' => isset($_POST['timer_use_persistent']),
            'show_on_all_pages' => isset($_POST['show_on_all_pages']),
            'show_on_homepage' => isset($_POST['show_on_homepage']),
            'show_on_posts' => isset($_POST['show_on_posts']),
            'show_on_pages' => isset($_POST['show_on_pages']),
            'selected_page_ids' => $selected_page_ids,
        );
        update_option('security_bar_settings', $settings);
        echo '<div class="notice notice-success"><p>Settings saved successfully!</p></div>';
    }
    
    $settings = security_bar_get_settings();
    ?>
    <div class="wrap">
        <h1>Security Bar Settings</h1>
        <form method="post">
            <?php wp_nonce_field('security_bar_settings'); ?>
            
            <h2 class="nav-tab-wrapper">
                <a href="#content" class="nav-tab nav-tab-active">Content</a>
                <a href="#display" class="nav-tab">Display Options</a>
            </h2>
            
            <div id="content-section">
                <h2>Content Settings</h2>
                <table class="form-table">
                    <tr>
                        <th><label for="headline">Headline Text</label></th>
                        <td>
                            <input type="text" id="headline" name="headline" 
                                   value="<?php echo esc_attr($settings['headline']); ?>" 
                                   class="large-text" placeholder="READY TO BUILD A SECURITY CULTURE...">
                            <p class="description">Main headline text (will be displayed in uppercase)</p>
                        </td>
                    </tr>
                    <tr>
                        <th><label for="subtext">Sub-text</label></th>
                        <td>
                            <textarea id="subtext" name="subtext" rows="3" class="large-text"><?php echo esc_textarea($settings['subtext']); ?></textarea>
                            <p class="description">Supporting text below the headline</p>
                        </td>
                    </tr>
                    <tr>
                        <th><label for="button_text">Button Text</label></th>
                        <td>
                            <input type="text" id="button_text" name="button_text" 
                                   value="<?php echo esc_attr($settings['button_text']); ?>" 
                                   class="regular-text" placeholder="Fortify Teams Today">
                        </td>
                    </tr>
                    <tr>
                        <th><label for="button_link">Button Link URL</label></th>
                        <td>
                            <input type="text" id="button_link" name="button_link" 
                                   value="<?php echo esc_attr($settings['button_link']); ?>" 
                                   class="regular-text" placeholder="#contact or https://...">
                            <p class="description">Enter the URL where the button should link to (e.g., #contact, /contact, or https://example.com)</p>
                        </td>
                    </tr>
                </table>
                
                <h2>Timer Settings</h2>
                <table class="form-table">
                    <tr>
                        <th>Timer Options</th>
                        <td>
                            <label>
                                <input type="checkbox" name="timer_enabled" value="1" 
                                       <?php checked($settings['timer_enabled'], true); ?>>
                                Enable timer display
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <th><label for="timer_max_minutes">Maximum Minutes</label></th>
                        <td>
                            <input type="number" id="timer_max_minutes" name="timer_max_minutes" 
                                   value="<?php echo esc_attr($settings['timer_max_minutes']); ?>" 
                                   min="0" max="60" class="small-text">
                            <p class="description">Maximum minutes for random timer (default: 5). Timer will show random time between 00:00 and this value.</p>
                        </td>
                    </tr>
                    <tr>
                        <th><label for="timer_max_seconds">Maximum Seconds</label></th>
                        <td>
                            <input type="number" id="timer_max_seconds" name="timer_max_seconds" 
                                   value="<?php echo esc_attr($settings['timer_max_seconds']); ?>" 
                                   min="0" max="59" class="small-text">
                            <p class="description">Additional seconds to add to maximum (0-59). Leave at 0 to use only minutes.</p>
                        </td>
                    </tr>
                    <tr>
                        <th>Timer Behavior</th>
                        <td>
                            <label>
                                <input type="checkbox" name="timer_use_persistent" value="1" 
                                       <?php checked($settings['timer_use_persistent'], true); ?>>
                                Use persistent timer (continues counting on page refresh)
                            </label>
                            <p class="description">When enabled, timer will continue from where it left off when user refreshes the page. Timer resets when it reaches 00:00.</p>
                        </td>
                    </tr>
                </table>
            </div>
            
            <div id="display-section" style="display:none;">
                <h2>Display Options</h2>
                <table class="form-table">
                    <tr>
                        <th>Where to Display</th>
                        <td>
                            <label>
                                <input type="checkbox" name="show_on_all_pages" value="1" 
                                       <?php checked($settings['show_on_all_pages'], true); ?>>
                                Show on all pages
                            </label><br>
                            <label>
                                <input type="checkbox" name="show_on_homepage" value="1" 
                                       <?php checked($settings['show_on_homepage'], true); ?>>
                                Show on homepage
                            </label><br>
                            <label>
                                <input type="checkbox" name="show_on_posts" value="1" 
                                       <?php checked($settings['show_on_posts'], true); ?>>
                                Show on blog posts
                            </label><br>
                            <label>
                                <input type="checkbox" name="show_on_pages" value="1" id="show_on_pages_checkbox"
                                       <?php checked($settings['show_on_pages'], true); ?>>
                                Show on specific pages
                            </label>
                            <p class="description" style="margin-top: 10px;">Select specific pages below where the bar should appear</p>
                        </td>
                    </tr>
                    <tr id="page_selector_row" style="<?php echo $settings['show_on_pages'] ? '' : 'display:none;'; ?>">
                        <th><label for="selected_page_ids">Select Pages</label></th>
                        <td>
                            <?php
                            $selected_ids = isset($settings['selected_page_ids']) ? $settings['selected_page_ids'] : array();
                            $pages = get_pages(array('sort_column' => 'post_title', 'sort_order' => 'ASC'));
                            if (!empty($pages)) {
                                echo '<select name="selected_page_ids[]" id="selected_page_ids" multiple="multiple" style="width: 100%; min-height: 200px;" size="10">';
                                foreach ($pages as $page) {
                                    $selected = in_array($page->ID, $selected_ids) ? 'selected="selected"' : '';
                                    echo '<option value="' . esc_attr($page->ID) . '" ' . $selected . '>' . esc_html($page->post_title) . '</option>';
                                }
                                echo '</select>';
                                echo '<p class="description">Hold Ctrl (Windows) or Cmd (Mac) to select multiple pages</p>';
                            } else {
                                echo '<p class="description">No pages found. Create some pages first.</p>';
                            }
                            ?>
                        </td>
                    </tr>
                </table>
            </div>
            
            <?php submit_button('Save Settings', 'primary', 'security_bar_save'); ?>
        </form>
    </div>
    
    <script>
    jQuery(document).ready(function($) {
        $('.nav-tab').on('click', function(e) {
            e.preventDefault();
            $('.nav-tab').removeClass('nav-tab-active');
            $(this).addClass('nav-tab-active');
            
            if ($(this).attr('href') === '#content') {
                $('#content-section').show();
                $('#display-section').hide();
            } else {
                $('#content-section').hide();
                $('#display-section').show();
            }
        });
        
        // Toggle page selector visibility
        $('#show_on_pages_checkbox').on('change', function() {
            if ($(this).is(':checked')) {
                $('#page_selector_row').show();
            } else {
                $('#page_selector_row').hide();
            }
        });
    });
    </script>
    <?php
}

// Function to output security bar HTML
function security_bar_output_html($force_display = false) {
    // Return empty for mobile and tablet devices - only show on desktop
    if (function_exists('wp_is_mobile') && wp_is_mobile()) {
        return '';
    }
    
    // If force_display is false, check display conditions
    if (!$force_display && !security_bar_should_display()) {
        return '';
    }
    
    $settings = security_bar_get_settings();
    $headline = !empty($settings['headline']) ? $settings['headline'] : 'READY TO BUILD A SECURITY CULTURE YOUR EMPLOYEES ACTUALLY ADOPT?';
    $subtext = !empty($settings['subtext']) ? $settings['subtext'] : 'Turn your workforce into a human firewall with engaging, behaviour-first training.';
    $button_text = !empty($settings['button_text']) ? $settings['button_text'] : 'Fortify Teams Today';
    $button_link = esc_url($settings['button_link']);
    $timer_enabled = isset($settings['timer_enabled']) ? $settings['timer_enabled'] : true;
    $timer_max_min = isset($settings['timer_max_minutes']) ? intval($settings['timer_max_minutes']) : 5;
    $timer_max_sec = isset($settings['timer_max_seconds']) ? intval($settings['timer_max_seconds']) : 0;
    
    // Generate random time within max limit
    $max_total_seconds = ($timer_max_min * 60) + $timer_max_sec;
    $random_seconds = rand(0, max(0, $max_total_seconds - 1));
    $timer_min = floor($random_seconds / 60);
    $timer_sec = $random_seconds % 60;
    $timer_display = sprintf('%02d : %02d', $timer_min, $timer_sec);
    
    // Regular version
    ?>
    <div class="security-bar" 
         data-timer-min="<?php echo esc_attr($timer_min); ?>" 
         data-timer-sec="<?php echo esc_attr($timer_sec); ?>" 
         data-timer-max-min="<?php echo esc_attr($timer_max_min); ?>" 
         data-timer-max-sec="<?php echo esc_attr($timer_max_sec); ?>" 
         data-timer-persistent="<?php echo isset($settings['timer_use_persistent']) && $settings['timer_use_persistent'] ? '1' : '0'; ?>"
         data-timer-enabled="<?php echo $timer_enabled ? '1' : '0'; ?>">
        <div class="security-bar-inner">
            <?php if ($timer_enabled) { ?>
            <div class="timer-box">
                <svg class="timer-icon" width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <line x1="0" y1="8" x2="6" y2="8" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    <line x1="0" y1="16" x2="6" y2="16" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    <line x1="0" y1="24" x2="6" y2="24" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    <circle cx="19" cy="16" r="10" stroke="currentColor" stroke-width="2" fill="none"/>
                    <path d="M19 6 L19 4 L23 4" stroke="currentColor" stroke-width="2" stroke-linecap="round" fill="none"/>
                    <line x1="19" y1="16" x2="19" y2="10" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    <line x1="19" y1="16" x2="24" y2="16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                </svg>
                <span class="timer-text"><?php echo esc_html($timer_display); ?></span>
            </div>
            <?php } ?>
            <div class="security-text">
                <h3><?php echo esc_html($headline); ?></h3>
                <p><?php echo esc_html($subtext); ?></p>
            </div>
            <a href="<?php echo $button_link; ?>" class="security-btn">
                <span><?php echo esc_html($button_text); ?></span>
            </a>
        </div>
    </div>
    <?php
}

// Shortcode for manual placement: [security_bar]
add_shortcode('security_bar', function () {
    // Return empty for mobile and tablet devices - only show on desktop
    if (function_exists('wp_is_mobile') && wp_is_mobile()) {
        return '';
    }
    
    $settings = security_bar_get_settings();
    
    // Enqueue scripts if not already enqueued
    wp_enqueue_style('security-bar-css', plugin_dir_url(__FILE__) . 'bottom-bar.css', [], '1.1');
    wp_enqueue_script('security-bar-js', plugin_dir_url(__FILE__) . 'bottom-bar.js', [], '1.1', true);
    
    $headline = !empty($settings['headline']) ? $settings['headline'] : 'READY TO BUILD A SECURITY CULTURE YOUR EMPLOYEES ACTUALLY ADOPT?';
    $subtext = !empty($settings['subtext']) ? $settings['subtext'] : 'Turn your workforce into a human firewall with engaging, behaviour-first training.';
    $button_text = !empty($settings['button_text']) ? $settings['button_text'] : 'Fortify Teams Today';
    $button_link = esc_url($settings['button_link']);
    $timer_enabled = isset($settings['timer_enabled']) ? $settings['timer_enabled'] : true;
    $timer_max_min = isset($settings['timer_max_minutes']) ? intval($settings['timer_max_minutes']) : 5;
    $timer_max_sec = isset($settings['timer_max_seconds']) ? intval($settings['timer_max_seconds']) : 0;
    $timer_use_persistent = isset($settings['timer_use_persistent']) ? $settings['timer_use_persistent'] : true;
    
    // Generate random time within max limit
    $max_total_seconds = ($timer_max_min * 60) + $timer_max_sec;
    $random_seconds = rand(0, max(0, $max_total_seconds - 1));
    $timer_min = floor($random_seconds / 60);
    $timer_sec = $random_seconds % 60;
    $timer_display = sprintf('%02d : %02d', $timer_min, $timer_sec);
    
    ob_start();
    ?>
    <div class="security-bar security-bar-shortcode" 
         data-timer-min="<?php echo esc_attr($timer_min); ?>" 
         data-timer-sec="<?php echo esc_attr($timer_sec); ?>" 
         data-timer-max-min="<?php echo esc_attr($timer_max_min); ?>" 
         data-timer-max-sec="<?php echo esc_attr($timer_max_sec); ?>" 
         data-timer-persistent="<?php echo $timer_use_persistent ? '1' : '0'; ?>"
         data-timer-enabled="<?php echo $timer_enabled ? '1' : '0'; ?>">
        <div class="security-bar-inner">
            <?php if ($timer_enabled) { ?>
            <div class="timer-box">
                <svg class="timer-icon" width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <!-- Horizontal lines extending from left -->
                    <line x1="0" y1="8" x2="6" y2="8" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    <line x1="0" y1="16" x2="6" y2="16" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    <line x1="0" y1="24" x2="6" y2="24" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    <!-- Stopwatch circle -->
                    <circle cx="19" cy="16" r="10" stroke="currentColor" stroke-width="2" fill="none"/>
                    <!-- Stopwatch top handle -->
                    <path d="M19 6 L19 4 L23 4" stroke="currentColor" stroke-width="2" stroke-linecap="round" fill="none"/>
                    <!-- Clock hands -->
                    <line x1="19" y1="16" x2="19" y2="10" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    <line x1="19" y1="16" x2="24" y2="16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                </svg>
                <span class="timer-text"><?php echo esc_html($timer_display); ?></span>
            </div>
            <?php } ?>
            <div class="security-text">
                <h3><?php echo esc_html($headline); ?></h3>
                <p><?php echo esc_html($subtext); ?></p>
            </div>
            <a href="<?php echo $button_link; ?>" class="security-btn">
                <span><?php echo esc_html($button_text); ?></span>
            </a>
        </div>
    </div>
    <?php
    return ob_get_clean();
});
