<?php
/**
 * Chatbot Handler - Processes messages using API data
 * 
 * @package SucceedLearn_Chatbot_API
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Chatbot Handler Class
 */
class SucceedLearn_Chatbot_Handler {
    /**
     * Get plugin settings
     *
     * @return array
     */
    private function get_plugin_settings() {
        $saved = get_option('succeedlearn_chatbot_api_settings', array());
        return is_array($saved) ? $saved : array();
    }

    /**
     * Normalize text for matching (lowercase, remove punctuation, collapse spaces)
     *
     * @param string $text
     * @return string
     */
    private function normalize_text($text) {
        $text = strtolower(trim((string) $text));
        // Remove punctuation/symbols but keep letters, numbers and whitespace
        $text = preg_replace('/[^\p{L}\p{N}\s]+/u', ' ', $text);
        // Collapse multiple spaces
        $text = preg_replace('/\s+/u', ' ', $text);
        return trim($text);
    }

    /**
     * Detect if message is a core "course intent" that should be handled
     * by structured handlers (and NOT overridden by qa-data.json).
     *
     * @param string $message_norm
     * @return bool
     */
    private function is_course_intent($message_norm) {
        if ($message_norm === '') {
            return false;
        }

        return (bool) preg_match(
            '/\bcourses?\b|\bavailable\b|\bpricing\b|\bprice\b|\bcost\b|\bfee\b|\bcertificate\b|\bcertification\b|\benroll\b|\benrollment\b|\bregister\b|\bsign up\b|\bbuy\b|\bpurchase\b|\bcontact support\b|\bsupport\b|\bdemo\b/i',
            $message_norm
        );
    }
    
    /**
     * Process user message and return response
     *
     * @param string $message User message
     * @param int|null $user_id WordPress user ID
     * @return string Bot response
     */
    public function process_message($message, $user_id = null) {
        // Security: Sanitize and validate input
        $message = sanitize_text_field($message);
        $message = trim($message);
        
        // Validate message length
        if (empty($message) || strlen($message) < 2) {
            return "Please provide a valid question. I'm here to help!";
        }
        
        // Prevent extremely long messages (potential DoS)
        if (strlen($message) > 500) {
            $message = substr($message, 0, 500);
        }
        
        // Load data - Try LearnPress first, fallback to JSON
        $courses = $this->load_courses_data();
        $qa_data = $this->load_qa_data();
        
        $message_norm = $this->normalize_text($message);

        // Handle quick option numbers (1, 2, 3) - must be checked before other intents
        if (preg_match('/^\s*[123]\s*$/', $message_norm)) {
            $option_num = intval(trim($message_norm));
            $explanations = array(
                1 => "**Get Course Details**\n\nTo get full details about a course:\n\n1. **Reply with the course name** (e.g., \"POSH Compliance Training\")\n2. I'll provide you with:\n   • Course description\n   • Price and currency\n   • Duration\n   • Certificate information\n   • Course link\n\n**Example:** Just type the course name and I'll show you everything about it!",
                2 => "**Course Pricing**\n\n**Single Course Purchase:**\n• Visit the course page\n• Click 'Enroll' or 'Purchase'\n• Complete payment\n• Get immediate access\n\n**Bulk / Corporate Purchase:**\n• Email: **[sales@succeedtech.com](mailto:sales@succeedtech.com)**\n• We'll provide customized pricing\n\nWould you like to see pricing for specific courses?",
                3 => "**How to Enroll**\n\n**Steps to Enroll:**\n\n1. **Browse Courses:** Select a course from our available options\n2. **Visit Course Page:** Click on the course you want\n3. **Click 'Enroll' or 'Purchase':** Found on the course page\n4. **Complete Payment:** If it's a paid course, follow the payment process\n5. **Get Access:** You'll receive immediate access after enrollment\n\n**Need Help?**\n• Contact support: [support@succeedtech.com](mailto:support@succeedtech.com)\n• For bulk enrollment: [sales@succeedtech.com](mailto:sales@succeedtech.com)\n\nWould you like me to show you available courses?"
            );
            
            if (isset($explanations[$option_num])) {
                return $explanations[$option_num];
            }
        }
        
        // Login/access/technical issues - check FIRST before course intent (moved outside)
        if (preg_match('/\b(unable|can\'t|cannot|can not).*(login|log in|log.*in|access|enter|sign in|sign.*in)\b|\b(login|log in|access|sign in).*(problem|issue|error|trouble|help|not working|failed|fail)\b|\bforgot.*password|\breset.*password|\bpassword.*reset|\bhave.*login.*issue|\bhave.*access.*issue|\bhave.*issue/i', $message_norm)) {
            return $this->handle_technical_support($message, $courses);
        }
        
        // Always route core intents to structured handlers first (deterministic).
        if ($this->is_course_intent($message_norm)) {
            // Demo intent - handle separately
            if (preg_match('/\bdemo\b/i', $message_norm)) {
                return $this->handle_demo_request($courses);
            }
            
            // Contact/support intent
            if (preg_match('/\bcontact support\b|\bsupport\b/i', $message_norm)) {
                $contact_page_url = esc_url(home_url('/contact-us/'));
                $support_email = 'support@succeedtech.com';
                return "<div class=\"succeedlearn-chatbot-contact-support\">" .
                       "<div class=\"succeedlearn-chatbot-contact-line\">**Contact Support**</div>" .
                       "<div class=\"succeedlearn-chatbot-contact-line\">**Email us at:** [{$support_email}](mailto:{$support_email})</div>" .
                       "<div class=\"succeedlearn-chatbot-contact-line\">**Contact page:** [Contact us]({$contact_page_url})</div>" .
                       "<div class=\"succeedlearn-chatbot-contact-line\">If you are facing any issue, let me know, I'll guide you.</div>" .
                       "</div>";
            }

            $course_response = $this->handle_course_query($message_norm, $courses);
            if ($course_response) {
                return $course_response;
            }
        }
        
        // Check Q&A database first
        foreach ($qa_data as $item) {
            if (isset($item['question']) && isset($item['answer'])) {
                $question_norm = $this->normalize_text($item['question']);
                
                // Exact match
                if ($message_norm !== '' && $message_norm === $question_norm) {
                    return $item['answer'];
                }
                
                // Partial match (stricter): avoid short questions like "course pricing"
                // matching any message that contains "course".
                $question_words = array_values(array_filter(explode(' ', $question_norm)));
                if (count($question_words) >= 3) {
                    $matched_words = 0;
                    foreach ($question_words as $word) {
                        if (strlen($word) > 2 && strpos($message_norm, $word) !== false) {
                            $matched_words++;
                        }
                    }
                    // Require at least 60% match AND at least 2 matched keywords
                    if ($matched_words >= 2 && ($matched_words / count($question_words)) >= 0.6) {
                        return $item['answer'];
                    }
                }
            }
        }
        
        // Handle course queries
        $course_response = $this->handle_course_query($message_norm, $courses);
        if ($course_response) {
            return $course_response;
        }
        
        // Default responses
        $defaults = array(
            'hello' => 'Hello! How can I help you with our courses today?',
            'hi' => 'Hi there! What would you like to know about our courses?',
            'help' => 'I can help you with information about our courses, pricing, certificates, and enrollment. What would you like to know?',
            'thanks' => "You're welcome! Is there anything else I can help you with?",
            'thank you' => "You're welcome! Feel free to ask if you need more information.",
        );
        
        foreach ($defaults as $key => $response) {
            if (strpos($message_norm, $key) !== false) {
                return $response;
            }
        }
        
        // Track unanswered question for improvement
        require_once SUCCEEDLEARN_CHATBOT_API_DIR . 'includes/question-tracker.php';
        SucceedLearn_Question_Tracker::track_unanswered($message, "Fallback response");

        // OpenAI fallback (optional) for common questions
        $settings = $this->get_plugin_settings();
        if (!empty($settings['openai_enabled'])) {
            require_once SUCCEEDLEARN_CHATBOT_API_DIR . 'includes/openai-client.php';

            // Safe, minimal context only (no user data)
            $safe_context = array(
                'site' => array(
                    'support_email' => 'support@succeedtech.com',
                    'sales_email' => 'sales@succeedtech.com',
                ),
                'courses_available_count' => is_array($courses) ? count($courses) : 0,
                'course_titles' => array_slice(array_values(array_filter(array_map(function($c) {
                    return isset($c['title']) ? sanitize_text_field($c['title']) : null;
                }, is_array($courses) ? $courses : array()))), 0, 10),
            );

            $ai = SucceedLearn_OpenAI_Client::get_answer($message, $safe_context, $settings);
            if (is_string($ai) && trim($ai) !== '') {
                return wp_kses_post($ai);
            }
        }
        
        // Fallback
        return "I'm here to help! I can assist with questions about our courses, pricing, enrollment, and certifications. Could you please rephrase your question?";
    }
    
    /**
     * Handle course-related queries
     */
    private function handle_course_query($message, $courses) {
        // Check if user is asking for demo of a specific category or course
        $is_demo_request = preg_match('/demo/i', $message);
        
        // FIRST: Check if message is a specific category name (before general category query)
        // This handles clicks on category buttons which send "Course Categories [Category Name]", "Demo [Category Name]", or "Course pricing [Category Name]"
        $categories = $this->get_all_course_categories($courses);
        $message_lower = strtolower(trim($message));
        
        // Detect context from message (pricing, demo, or general)
        $is_pricing_context = preg_match('/course pricing|pricing/i', $message);
        $is_demo_context = preg_match('/demo/i', $message) || $is_demo_request;
        
        // Remove common prefixes that might be added by button clicks
        $message_clean = preg_replace('/^(course categories|course categor|course pricing|pricing|demo)\s+/i', '', $message_lower);
        $message_clean = trim($message_clean);
        
        // Flag to track if a specific category was matched
        $has_specific_category_match = false;
        
        // Check if message matches a category name exactly or contains it
        foreach ($categories as $category) {
            // Decode HTML entities in category name for matching
            $category_decoded = html_entity_decode($category, ENT_QUOTES | ENT_HTML5, 'UTF-8');
            $category_lower = strtolower(trim($category_decoded));
            $category_original_lower = strtolower(trim($category));
            
            // Also decode HTML entities in message for better matching
            $message_decoded = html_entity_decode($message_lower, ENT_QUOTES | ENT_HTML5, 'UTF-8');
            $message_clean_decoded = html_entity_decode($message_clean, ENT_QUOTES | ENT_HTML5, 'UTF-8');
            
            // Check for exact match or if cleaned message contains category name
            // Also check original message for "Course pricing [Category]" or "Demo [Category]" format
            // For pricing context, also check if original message contains category name
            $is_match = false;
            if ($message_clean === $category_lower || 
                $message_clean_decoded === $category_lower ||
                $message_clean === $category_original_lower ||
                ($message_clean !== '' && strpos($message_clean_decoded, $category_lower) !== false) ||
                ($message_clean !== '' && strpos($message_clean, $category_original_lower) !== false) ||
                // For pricing/demo context, also check original message (before cleaning)
                ($is_pricing_context && strpos($message_lower, $category_lower) !== false) ||
                ($is_demo_context && strpos($message_lower, $category_lower) !== false) ||
                ($message_lower !== 'course categories' && 
                 $message_lower !== 'course categor' &&
                 $message_lower !== 'demo' &&
                 $message_lower !== 'course pricing' &&
                 (strpos($message_decoded, $category_lower) !== false || strpos($message_lower, $category_original_lower) !== false) && 
                 strlen($message_lower) <= strlen($category_lower) + 50)) { // Allow more extra text for longer category names
                $is_match = true;
            }
            
            if ($is_match) {
                $has_specific_category_match = true;
                
                // Filter courses by this category
                // Decode category name for comparison
                $category_decoded = html_entity_decode($category, ENT_QUOTES | ENT_HTML5, 'UTF-8');
                $filtered_courses = array_filter($courses, function($course) use ($category, $category_decoded) {
                    if (!isset($course['category']) || empty($course['category'])) {
                        return false;
                    }
                    $course_cat = html_entity_decode($course['category'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
                    $course_cat_normalized = strtolower(trim($course_cat));
                    $category_normalized = strtolower(trim($category));
                    $category_decoded_normalized = strtolower(trim($category_decoded));
                    // Match against both encoded and decoded category names
                    return $course_cat_normalized === $category_normalized || 
                           $course_cat_normalized === $category_decoded_normalized;
                });
                
                if (empty($filtered_courses)) {
                    if ($is_demo_context) {
                        return "**Demo Request**\n\nWe don't have any courses in the **{$category}** category available for demo at the moment.\n\nPlease contact **[sales@succeedtech.com](mailto:sales@succeedtech.com)** to discuss your training needs.";
                    }
                    return "We don't have any courses in the **{$category}** category at the moment. Please check back later!";
                }
                
                // If it's a demo context, show demo-specific information (just course titles)
                if ($is_demo_context) {
                    $response = "**Demo Available - Courses in {$category}:**\n\n";
                    $course_count = 0;
                    foreach ($filtered_courses as $course) {
                        if ($course_count >= 10) break;
                        $title = html_entity_decode($course['title'] ?? 'Untitled Course', ENT_QUOTES | ENT_HTML5, 'UTF-8');
                        $title = esc_html($title);
                        $course_count++;
                        $response .= "{$course_count}. **{$title}**\n";
                    }
                    
                    $contact_page_url = esc_url(home_url('/contact-us/'));
                    $response .= "\n**To Schedule a Demo:**\n\n";
                    $response .= "**Option 1:** Fill out the form on our **[Contact Us page]({$contact_page_url})** to schedule an appointment with our team.\n\n";
                    $response .= "**Option 2:** Email **[sales@succeedtech.com](mailto:sales@succeedtech.com)** with:\n";
                    $response .= "• Your preferred course(s) from the list above\n";
                    $response .= "• Preferred date and time\n";
                    $response .= "• Number of participants\n\n";
                    $response .= "**View courses above**\n";
                    return $response;
                }
                
                // If it's a pricing context, show course cards with price, tick, and view button
                if ($is_pricing_context) {
                    $response = "**Course Pricing - {$category}:**\n\n";
                    $course_count = 0;
                    foreach ($filtered_courses as $course) {
                        if ($course_count >= 20) break;
                        
                        $title = html_entity_decode($course['title'] ?? 'Untitled Course', ENT_QUOTES | ENT_HTML5, 'UTF-8');
                        $title = esc_html($title);
                        $currency_symbol = isset($course['currency_symbol']) ? esc_html($course['currency_symbol']) : '$';
                        $price = isset($course['price']) && $course['price'] > 0 
                            ? esc_html($currency_symbol) . number_format(floatval($course['price']), 2) 
                            : 'Free';
                        $course_url = isset($course['url']) ? esc_url($course['url']) : '';
                        
                        $course_count++;
                        // Use special format for card rendering with numbering, price, and view button
                        $response .= "[COURSE_CARD]{$course_count}|{$title}|{$price}|{$course_url}[/COURSE_CARD]\n";
                    }
                    
                    $response .= "\n**Bulk / Corporate Purchase:**\n";
                    $response .= "For bulk licensing / corporate purchase options, please contact our sales team:\n";
                    $response .= "• **Email:** [sales@succeedtech.com](mailto:sales@succeedtech.com)\n";
                    return $response;
                }
                
                // Default: General course listing (just course titles, not cards)
                $response = "**Courses in {$category}:**\n\n";
                $course_count = 0;
                foreach ($filtered_courses as $course) {
                    if ($course_count >= 20) break;
                    
                    $title = html_entity_decode($course['title'] ?? 'Untitled Course', ENT_QUOTES | ENT_HTML5, 'UTF-8');
                    $title = esc_html($title);
                    $course_count++;
                    // Just show course titles as numbered list (not cards)
                    $response .= "{$course_count}. **{$title}**\n";
                }
                
                // Show remaining categories instead of quick options
                $all_categories = $this->get_all_course_categories($courses);
                $remaining_categories = array_filter($all_categories, function($cat) use ($category) {
                    return strtolower(trim($cat)) !== strtolower(trim($category));
                });
                
                if (!empty($remaining_categories)) {
                    $response .= "\n**Other Course Categories:**\n\n";
                    $response .= "[CATEGORY_LIST]\n";
                    foreach ($remaining_categories as $remaining_category) {
                        $response .= "{$remaining_category}|Course Categories {$remaining_category}\n";
                    }
                    $response .= "[/CATEGORY_LIST]\n";
                }
                
                return $response;
            }
        }
        
        // Handle Course Categories query (general - show all categories)
        // Only show categories if message doesn't contain a specific category name
        // Use the flag from above to prevent showing category list if a category was already matched
        if (!$has_specific_category_match && preg_match('/course categor|categor|category/i', $message)) {
            // Check if this is coming from pricing context
            $is_pricing_context = preg_match('/course pricing|pricing/i', $message);
            
            // If it's a demo request for categories (but NOT a specific category), show demo-specific info
            // Only show category list if message is just "demo" without a specific category name
            // Check if message contains any category keywords to avoid showing categories again
            $has_specific_category = false;
            foreach ($categories as $cat) {
                $cat_lower = strtolower(trim($cat));
                if (strpos($message_lower, $cat_lower) !== false && $message_lower !== 'demo') {
                    $has_specific_category = true;
                    break;
                }
            }
            
            if ($is_demo_request && !$has_specific_category) {
                $categories = $this->get_all_course_categories($courses);
                
                if (empty($categories)) {
                    return "**Demo Request**\n\nWe currently don't have any course categories available for demo. Please contact **[sales@succeedtech.com](mailto:sales@succeedtech.com)** to discuss your training needs.";
                }
                
                $response = "**Schedule a Demo - Select a Category:**\n\n";
                $response .= "[CATEGORY_LIST]\n";
                foreach ($categories as $category) {
                    $response .= "{$category}|Demo {$category}\n";
                }
                $response .= "[/CATEGORY_LIST]\n\n";
                $response .= "**Next Steps:**\n";
                $response .= "Click a category above to see courses available for demo, or contact **[sales@succeedtech.com](mailto:sales@succeedtech.com)** directly to schedule.\n";
                return $response;
            }
            
            // If it's from pricing context, show categories with pricing context
            if ($is_pricing_context) {
                $categories = $this->get_all_course_categories($courses);
                
                if (empty($categories)) {
                    return "We currently don't have any course categories available. Please check back later!";
                }
                
                $response = "**Course Pricing - Select a Category:**\n\n";
                $response .= "[CATEGORY_LIST]\n";
                foreach ($categories as $category) {
                    $response .= "{$category}|Course pricing {$category}\n";
                }
                $response .= "[/CATEGORY_LIST]\n";
                return $response;
            }
            
            // Default: General category listing
            $categories = $this->get_all_course_categories($courses);
            
            if (empty($categories)) {
                return "We currently don't have any course categories available. Please check back later!";
            }
            
            $response = "**Course Categories:**\n\n";
            $response .= "[CATEGORY_LIST]\n";
            foreach ($categories as $category) {
                $response .= "{$category}|Course Categories {$category}\n";
            }
            $response .= "[/CATEGORY_LIST]\n";
            return $response;
        }
        
        // Note: Category name matching is now handled above (lines 213-285)
        // This duplicate section has been removed to prevent showing categories again
        
        // List all courses (fallback - should not be called if categories are working)
        if (preg_match('/list|show|all|available|what.*course/i', $message)) {
            if (empty($courses)) {
                return "We currently don't have any courses available. Please check back later!";
            }
            
            $response = "**Available Courses:**\n\n";
            $course_count = 0;
            foreach ($courses as $index => $course) {
                // Security: Limit displayed courses to prevent data leak
                if ($course_count >= 20) {
                    break;
                }
                
                $title = esc_html($course['title'] ?? 'Untitled Course');
                $currency_symbol = isset($course['currency_symbol']) ? esc_html($course['currency_symbol']) : '$';
                $price = isset($course['price']) && $course['price'] > 0 
                    ? esc_html($currency_symbol) . number_format(floatval($course['price']), 2) 
                    : 'Free';
                $course_url = isset($course['url']) ? esc_url($course['url']) : '';
                
                $course_count++;
                // Use special format for card rendering with numbering
                $response .= "[COURSE_CARD]{$course_count}|{$title}|{$price}|{$course_url}[/COURSE_CARD]\n";
            }

            // Show remaining categories instead of quick options
            $all_categories = $this->get_all_course_categories($courses);
            if (!empty($all_categories)) {
                $response .= "\n**Browse Other Categories:**\n\n";
                $response .= "[CATEGORY_LIST]\n";
                foreach ($all_categories as $cat) {
                    $response .= "{$cat}|Course Categories {$cat}\n";
                }
                $response .= "[/CATEGORY_LIST]\n";
            }
            
            return $response;
        }
        
        // Price queries - also handle "course pricing" button
        if (preg_match('/price|pricing|cost|how much|fee|course pricing/i', $message)) {
            if (empty($courses)) {
                return "We currently don't have any courses available.";
            }
            
            // Check if they're asking about a specific category pricing
            $categories = $this->get_all_course_categories($courses);
            $message_lower = strtolower($message);
            foreach ($categories as $category) {
                $category_lower = strtolower($category);
                if (strpos($message_lower, $category_lower) !== false || strpos($category_lower, $message_lower) !== false) {
                    // Show pricing for this specific category
                    $filtered_courses = array_filter($courses, function($course) use ($category) {
                        return isset($course['category']) && strtolower($course['category']) === strtolower($category);
                    });
                    
                    if (empty($filtered_courses)) {
                        return "We don't have any courses in the **{$category}** category at the moment.\n\n**Bulk / Corporate Purchase:**\nContact [sales@succeedtech.com](mailto:sales@succeedtech.com) for bulk pricing options.";
                    }
                    
                    // Use the user's question as the title
                    $title = preg_match('/price|pricing/i', $message) ? 'Course pricing' : 'Pricing';
                    $response = "**{$title} - {$category}:**\n\n";
                    $response .= "You can purchase a single course by visiting the course page.\n\n";
                    
                    $course_count = 0;
                    foreach ($filtered_courses as $course) {
                        if ($course_count >= 20) break;
                        
                        $title = html_entity_decode($course['title'] ?? 'Untitled Course', ENT_QUOTES | ENT_HTML5, 'UTF-8');
                        $title = esc_html($title);
                        $currency_symbol = isset($course['currency_symbol']) ? esc_html($course['currency_symbol']) : '$';
                        $price = isset($course['price']) && $course['price'] > 0 
                            ? esc_html($currency_symbol) . number_format(floatval($course['price']), 2) 
                            : 'Free';
                        $course_url = isset($course['url']) ? esc_url($course['url']) : '';
                        
                        $course_count++;
                        $response .= "[COURSE_CARD]{$course_count}|{$title}|{$price}|{$course_url}[/COURSE_CARD]\n";
                    }
                    
                    $response .= "\n**Bulk / Corporate Purchase:**\n";
                    $response .= "For bulk licensing / corporate purchase options, please contact our sales team:\n";
                    $response .= "• **Email:** [sales@succeedtech.com](mailto:sales@succeedtech.com)\n";
                    
                    return $response;
                }
            }
            
            // General pricing query - show categories first
            // Use the user's question as the title
            $title = preg_match('/price|pricing/i', $message) ? 'Course pricing' : 'Pricing';
            $response = "**{$title}:**\n\n";
            $response .= "You can purchase a single course by visiting the course page.\n\n";
            
            if (!empty($categories)) {
                $response .= "**Select a Category:**\n\n";
                $response .= "[CATEGORY_LIST]\n";
                foreach ($categories as $category) {
                    $response .= "{$category}|Course pricing {$category}\n";
                }
                $response .= "[/CATEGORY_LIST]\n\n";
                
                  $response .= "**What would you like to do next?**\n\n";
                $response .= "Choose a category above to move forward, or schedule a demo call with our team.\n\n";
                
                $response .= "**Bulk / Corporate Purchase:**\n";
                $response .= "For bulk licensing / corporate purchase options, please contact our sales team:\n";
                $response .= "• **Email:** [sales@succeedtech.com](mailto:sales@succeedtech.com)\n";
            } else {
                // Fallback if no categories - show all courses
                $response .= "**Available Courses (single purchase):**\n\n";
                $course_count = 0;
                foreach ($courses as $course) {
                    if ($course_count >= 20) break;
                    
                    $title = esc_html($course['title'] ?? 'Untitled Course');
                    $currency_symbol = isset($course['currency_symbol']) ? esc_html($course['currency_symbol']) : '$';
                    $price = isset($course['price']) && $course['price'] > 0 
                        ? esc_html($currency_symbol) . number_format(floatval($course['price']), 2) 
                        : 'Free';
                    $course_url = isset($course['url']) ? esc_url($course['url']) : '';
                    
                    $course_count++;
                    $response .= "[COURSE_CARD]{$course_count}|{$title}|{$price}|{$course_url}[/COURSE_CARD]\n";
                }
                
                $response .= "\n**Bulk / Corporate Purchase:**\n";
                $response .= "For bulk licensing / corporate purchase options, please contact our sales team:\n";
                $response .= "• **Email:** [sales@succeedtech.com](mailto:sales@succeedtech.com)\n";
            }

            return $response;
        }
        
        // Certificate queries - handle "certification details" and "will i receive"
        if (preg_match('/certificate|certification|cert|will i receive|receive.*certificate/i', $message)) {
            // Check if they're asking about specific courses with certificates
            $asking_about_courses = preg_match('/which.*course|what.*course|list.*course|show.*course|course.*certificate/i', $message);
            
            if ($asking_about_courses) {
                // They want to see which courses have certificates - show by category
                $cert_courses = array();
                foreach ($courses as $course) {
                    if (isset($course['certificate']) && $course['certificate']) {
                        $cert_courses[] = $course;
                    }
                }
                
                if (empty($cert_courses)) {
                    return "**Certificates Available**\n\nWe provide completion certificates for all our courses. However, we currently don't have any courses available.\n\nPlease check back later or contact **[support@succeedtech.com](mailto:support@succeedtech.com)** for more information.";
                }
                
                // Group courses by category
                $courses_by_category = array();
                foreach ($cert_courses as $course) {
                    $category = isset($course['category']) && !empty($course['category']) 
                        ? esc_html(html_entity_decode($course['category'] ?? '', ENT_QUOTES | ENT_HTML5, 'UTF-8')) 
                        : 'General';
                    if (!isset($courses_by_category[$category])) {
                        $courses_by_category[$category] = array();
                    }
                    $courses_by_category[$category][] = $course;
                }
                
                $response = "**Courses with Certificates:**\n\n";
                $cat_count = 0;
                foreach ($courses_by_category as $category => $cat_courses) {
                    $cat_count++;
                    $response .= "**{$cat_count}. {$category}**\n\n";
                    
                    $cat_course_count = 0;
                    foreach ($cat_courses as $course) {
                        $cat_course_count++;
                        $title = html_entity_decode($course['title'] ?? 'Untitled Course', ENT_QUOTES | ENT_HTML5, 'UTF-8');
                        $title = esc_html($title);
                        $currency_symbol = isset($course['currency_symbol']) ? esc_html($course['currency_symbol']) : '$';
                        $price = isset($course['price']) && $course['price'] > 0 
                            ? esc_html($currency_symbol) . number_format(floatval($course['price']), 2) 
                            : 'Free';
                        $course_url = isset($course['url']) ? esc_url($course['url']) : '';
                        
                        $response .= "[COURSE_CARD]{$cat_course_count}|{$title}|{$price}|{$course_url}[/COURSE_CARD]\n";
                    }
                    $response .= "\n";
                }
                
                $response .= "**Certificate Details:**\n";
                $response .= "1. All certificates are issued upon successful completion of the course\n";
                $response .= "2. Certificates are digital and can be downloaded\n";
                $response .= "3. Certificates include course name, completion date, and verification details\n";
                
                return $response;
            } else {
                // General certificate question - just explain
                $response = "**Certificate Information**\n\nYes! You will receive a certificate upon successful completion of any course.\n\n**Certificate Details:**\n";
                $response .= "1. **When:** After successfully completing the course\n";
                $response .= "2. **Format:** Digital certificate (downloadable)\n";
                $response .= "3. **Includes:** Course name, completion date, and verification details\n";
                $response .= "4. **Validity:** Lifetime access to your certificate\n\n";
                $response .= "**Want to see which courses offer certificates?**\n\n";
                $response .= "**Reply with:**\n";
                $response .= "\"Which courses have certificates?\" or \"Show me courses with certificates\"\n";
                return $response;
            }
        }
        
        // Enrollment queries
        if (preg_match('/\benroll\b|\benrollment\b|\bregister\b|\bsign up\b|\bbuy\b|\bpurchase\b/i', $message)) {
            return "**How to Enroll**\n\n1. Open the course you want\n2. Click **Enroll** / **Purchase**\n3. Complete payment (if paid)\n4. You’ll get access immediately\n\nIf you share the course name, I can send you the exact course page link.";
        }
        
        // Search for specific course
        foreach ($courses as $course) {
            $title = strtolower($course['title'] ?? '');
            if (strpos($message, $title) !== false || strpos($title, $message) !== false) {
                // Security: Escape all output
                $course_title = esc_html($course['title'] ?? 'Untitled Course');
                
                // If it's a demo request for this course, show demo-specific info
                if ($is_demo_request) {
                    $response = "**Schedule a Demo - {$course_title}**\n\n";
                    
                    if (isset($course['description'])) {
                        $description = wp_strip_all_tags($course['description']);
                        $description = esc_html($description);
                        $response .= "**Course Overview:**\n{$description}\n\n";
                    }
                    
                    $response .= "**Ready to Schedule a Demo?**\n\n";
                    $response .= "I'd love to show you how **{$course_title}** can benefit your team!\n\n";
                    $response .= "**To Schedule:**\n";
                    $response .= "Email **[sales@succeedtech.com](mailto:sales@succeedtech.com)** with:\n";
                    $response .= "1. Course name: **{$course_title}**\n";
                    $response .= "2. Your preferred date and time\n";
                    $response .= "3. Number of participants\n";
                    $response .= "4. Any specific questions or requirements\n\n";
                    $response .= "Our sales team will get back to you promptly to confirm your demo session!\n\n";
                    
                    if (!empty($course['url'])) {
                        $response .= "**Learn More:** [View Course Details](" . esc_url($course['url']) . ")\n";
                    }
                    
                    return $response;
                }
                
                $response = "**About {$course_title}:**\n\n";
                
                if (isset($course['description'])) {
                    $description = wp_strip_all_tags($course['description']);
                    $description = esc_html($description);
                    $response .= $description . "\n\n";
                }
                
                // Use custom currency symbol if available
                $currency_symbol = isset($course['currency_symbol']) ? esc_html($course['currency_symbol']) : '$';
                
                if (isset($course['price'])) {
                    if ($course['price'] > 0) {
                        $price = floatval($course['price']);
                        $response .= "**Price:** " . esc_html($currency_symbol) . number_format($price, 2) . "\n";
                    } else {
                        $response .= "**Price:** Free\n";
                    }
                }
                
                if (isset($course['duration']) && !empty($course['duration'])) {
                    $duration = esc_html($course['duration']);
                    $response .= "**Duration:** {$duration}\n";
                }
                
                if (isset($course['certificate']) && $course['certificate']) {
                    $response .= "**Certificate:** Yes\n";
                }
                
                // Add FAQ items if available
                if (isset($course['faq_items']) && is_array($course['faq_items']) && !empty($course['faq_items'])) {
                    $response .= "\n\n**Frequently Asked Questions:**\n\n";
                    $faq_count = min(3, count($course['faq_items'])); // Limit to 3 FAQs
                    for ($i = 0; $i < $faq_count; $i++) {
                        $faq = $course['faq_items'][$i];
                        $faq_q = esc_html($faq['question'] ?? '');
                        $faq_a = esc_html($faq['answer'] ?? '');
                        if (!empty($faq_q) && !empty($faq_a)) {
                            $response .= ($i + 1) . ". **{$faq_q}**\n{$faq_a}\n\n";
                        }
                    }
                }
                
                // Add LearnPress course URL if available
                if (isset($course['url'])) {
                    $course_url = esc_url($course['url']);
                    $response .= "\n[View Course Details]({$course_url})";
                }
                
                return $response;
            }
        }
        
        // If LearnPress is active, try searching
        require_once SUCCEEDLEARN_CHATBOT_API_DIR . 'includes/learnpress-integration.php';
        if (SucceedLearn_LearnPress_Integration::is_learnpress_active()) {
            $search_results = SucceedLearn_LearnPress_Integration::search_courses($message);
            if (!empty($search_results)) {
                $response = "**I found these courses matching your search:**\n\n";
                foreach ($search_results as $index => $course) {
                    // Security: Escape all output
                    $title = esc_html($course['title'] ?? 'Untitled Course');
                    $currency_symbol = isset($course['currency_symbol']) ? esc_html($course['currency_symbol']) : '$';
                    $price = isset($course['price']) && $course['price'] > 0 
                        ? esc_html($currency_symbol) . number_format(floatval($course['price']), 2) 
                        : 'Free';
                    $response .= ($index + 1) . ". **{$title}** - {$price}\n";
                }
                return $response;
            }
        }
        
        // Handle FAQ queries
        if (preg_match('/faq|frequently.*asked|question.*answer/i', $message)) {
            require_once SUCCEEDLEARN_CHATBOT_API_DIR . 'includes/learnpress-integration.php';
            if (SucceedLearn_LearnPress_Integration::is_learnpress_active() && !empty($courses)) {
                // Get FAQs from first matching course or all courses
                $all_faqs = array();
                foreach ($courses as $course) {
                    if (isset($course['faq_items']) && is_array($course['faq_items'])) {
                        foreach ($course['faq_items'] as $faq) {
                            if (!empty($faq['question']) && !empty($faq['answer'])) {
                                $all_faqs[] = array(
                                    'question' => esc_html($faq['question']),
                                    'answer' => esc_html($faq['answer']),
                                    'course' => esc_html($course['title'] ?? '')
                                );
                            }
                        }
                    }
                }
                
                if (!empty($all_faqs)) {
                    $response = "**Frequently Asked Questions:**\n\n";
                    $faq_count = min(5, count($all_faqs)); // Limit to 5 FAQs
                    for ($i = 0; $i < $faq_count; $i++) {
                        $faq = $all_faqs[$i];
                        $response .= ($i + 1) . ". **{$faq['question']}**\n{$faq['answer']}\n\n";
                    }
                    return $response;
                }
            }
        }
        
        // Handle course outline queries
        if (preg_match('/outline|structure|curriculum|syllabus|what.*learn/i', $message)) {
            require_once SUCCEEDLEARN_CHATBOT_API_DIR . 'includes/learnpress-integration.php';
            if (SucceedLearn_LearnPress_Integration::is_learnpress_active() && !empty($courses)) {
                // Try to find course mentioned in message
                foreach ($courses as $course) {
                    $title = strtolower($course['title'] ?? '');
                    if (strpos($message, $title) !== false || strpos($title, $message) !== false) {
                        if (isset($course['outline_items']) && is_array($course['outline_items']) && !empty($course['outline_items'])) {
                            $response = "**Course Outline for " . esc_html($course['title']) . ":**\n\n";
                            $outline_count = min(10, count($course['outline_items'])); // Limit to 10 items
                            for ($i = 0; $i < $outline_count; $i++) {
                                $item = $course['outline_items'][$i];
                                $item_title = esc_html($item['title'] ?? '');
                                $item_content = esc_html($item['content'] ?? '');
                                if (!empty($item_title)) {
                                    $response .= ($i + 1) . ". **{$item_title}**\n";
                                    if (!empty($item_content)) {
                                        $response .= "{$item_content}\n";
                                    }
                                    $response .= "\n";
                                }
                            }
                            return $response;
                        }
                    }
                }
            }
        }
        
        return null;
    }
    
    /**
     * Load courses data - LearnPress integration with JSON fallback
     */
    private function load_courses_data() {
        // Try LearnPress first
        require_once SUCCEEDLEARN_CHATBOT_API_DIR . 'includes/learnpress-integration.php';
        
        if (SucceedLearn_LearnPress_Integration::is_learnpress_active()) {
            $lp_courses = SucceedLearn_LearnPress_Integration::get_learnpress_courses();
            if (!empty($lp_courses)) {
                return $lp_courses;
            }
        }
        
        // Fallback to JSON file
        $file_path = SUCCEEDLEARN_CHATBOT_API_DIR . 'data/courses.json';
        
        if (!file_exists($file_path)) {
            return array();
        }
        
        $content = file_get_contents($file_path);
        $data = json_decode($content, true);
        
        return is_array($data) ? $data : array();
    }
    
    /**
     * Load Q&A data from JSON file
     */
    private function load_qa_data() {
        $file_path = SUCCEEDLEARN_CHATBOT_API_DIR . 'data/qa-data.json';
        
        if (!file_exists($file_path)) {
            return array();
        }
        
        $content = file_get_contents($file_path);
        $data = json_decode($content, true);
        
        return is_array($data) ? $data : array();
    }
    
    /**
     * Handle demo request - ask about needs and show options
     *
     * @param array $courses Array of course data
     * @return string Demo response
     */
    private function handle_demo_request($courses) {
        if (empty($courses)) {
            return "**Schedule a Demo**\n\nWe'd love to show you our courses! However, we currently don't have any courses available for demo.\n\nPlease contact our sales team at **[sales@succeedtech.com](mailto:sales@succeedtech.com)** to discuss your training needs.";
        }
        
        $categories = $this->get_all_course_categories($courses);
        
        $response = "**Schedule a Demo**\n\n";
        $response .= "Great! I'd be happy to help you schedule a demo. Let me understand your needs better.\n\n";
        
        if (!empty($categories)) {
            $response .= "**Available Course Categories:**\n\n";
            $response .= "[CATEGORY_LIST]\n";
            foreach ($categories as $category) {
                $response .= "{$category}|Demo {$category}\n";
            }
            $response .= "[/CATEGORY_LIST]\n\n";
            
            $response .= "**What would you like to do?**\n\n";
            $response .= "1. **Click a category above** to see courses available for demo in that category\n";
            $response .= "2. **Reply with a course name** if you already know which course you want to demo\n";
            $response .= "3. **Tell me about your training needs** or organization requirements and I'll recommend the best courses\n\n";
        } else {
            $response .= "**Available Courses for Demo:**\n\n";
            $course_count = 0;
            foreach ($courses as $course) {
                if ($course_count >= 10) break;
                $title = esc_html($course['title'] ?? 'Untitled Course');
                $course_count++;
                $response .= "{$course_count}. **{$title}**\n";
            }
            
            $response .= "\n**What would you like to do?**\n";
            $response .= "1. Reply with a **course name** to schedule a demo for that course\n";
            $response .= "2. Tell me about your **training needs** and I'll recommend the best courses\n\n";
        }
        
        $response .= "**How to Schedule a Demo:**\n\n";
        $response .= "You can schedule a demo in two ways:\n\n";
        $response .= "1. **Select a category above** - Choose a category that interests you, and I'll show you the available courses. Then you can select a specific course for your demo.\n\n";
        $response .= "2. **Contact our sales team directly** - Email **[sales@succeedtech.com](mailto:sales@succeedtech.com)** with your preferred course(s) or training needs, and they'll help you schedule a demo at a time that works for you.\n\n";
        $response .= "**What happens next?**\n";
        $response .= "After you select a course or category, I'll provide you with more details about that course and the next steps to schedule your demo session.\n";
        $response .= "You can also email us directly at **[sales@succeedtech.com](mailto:sales@succeedtech.com)** with your preferred date and time.\n";
        
        return $response;
    }
    
    /**
     * Get all unique course categories from courses array
     *
     * @param array $courses Array of course data
     * @return array Array of unique category names
     */
    private function get_all_course_categories($courses) {
        $categories_map = array(); // Use map with normalized key to prevent duplicates
        
        foreach ($courses as $course) {
            if (isset($course['category']) && !empty($course['category'])) {
                $category = trim($course['category']);
                // Decode HTML entities before escaping (to prevent double encoding)
                $category = html_entity_decode($category, ENT_QUOTES | ENT_HTML5, 'UTF-8');
                $category_normalized = strtolower(trim($category));
                
                // Use normalized key to prevent duplicates - store original escaped version
                if (!empty($category) && !isset($categories_map[$category_normalized])) {
                    $categories_map[$category_normalized] = esc_html($category);
                }
            }
        }
        
        // Also try to get categories directly from LearnPress taxonomy
        require_once SUCCEEDLEARN_CHATBOT_API_DIR . 'includes/learnpress-integration.php';
        if (SucceedLearn_LearnPress_Integration::is_learnpress_active()) {
            $terms = get_terms(array(
                'taxonomy' => 'course_category',
                'hide_empty' => true,
            ));
            
            if (!is_wp_error($terms) && !empty($terms)) {
                foreach ($terms as $term) {
                    // Decode HTML entities before escaping
                    $cat_name = html_entity_decode($term->name, ENT_QUOTES | ENT_HTML5, 'UTF-8');
                    $cat_name_normalized = strtolower(trim($cat_name));
                    
                    // Use normalized key to prevent duplicates
                    if (!isset($categories_map[$cat_name_normalized])) {
                        $categories_map[$cat_name_normalized] = esc_html($cat_name);
                    }
                }
            }
        }
        
        // Convert map to array and sort alphabetically (case-insensitive)
        $categories = array_values($categories_map);
        usort($categories, function($a, $b) {
            return strcasecmp($a, $b);
        });
        
        return $categories;
    }
    
    /**
     * Handle technical support issues (login, access, etc.) with OpenAI assistance
     *
     * @param string $message
     * @param array $courses
     * @return string
     */
    private function handle_technical_support($message, $courses) {
        $message_lower = strtolower($message);
        
        // Check if user has already provided details about their issue
        // More lenient check - if message is longer than 20 chars or contains descriptive words
        $has_details = strlen($message) > 20 || preg_match('/\b(because|when|after|before|trying|attempting|getting|receiving|see|seeing|shows|display|error|message|problem|issue|unable|cannot|can\'t|forgot|reset|password|credentials|account|email)\b/i', $message);
        
        if (!$has_details) {
            // First time - prompt for details with improved message
            return "**I'm here to help with your login/access issue!**\n\n" .
                   "Please **briefly explain your issue** - I will help you with that.\n\n" .
                   "You can tell me:\n" .
                   "• What happens when you try to login?\n" .
                   "• Are you seeing any error messages?\n" .
                   "• When did this issue start?\n" .
                   "• Are you trying to access a specific course?\n\n" .
                   "**Example:** \"I'm unable to login to my account. I see an error message saying 'Invalid credentials'.\"\n\n" .
                   "Once you share the details, I'll provide step-by-step solutions!";
        }
        
        // User has provided details - use OpenAI to generate helpful response
        $settings = $this->get_plugin_settings();
        if (!empty($settings['openai_enabled'])) {
            require_once SUCCEEDLEARN_CHATBOT_API_DIR . 'includes/openai-client.php';
            
            // Enhanced context for technical support
            $safe_context = array(
                'site' => array(
                    'support_email' => 'support@succeedtech.com',
                    'sales_email' => 'sales@succeedtech.com',
                    'platform' => 'LearnPress LMS',
                ),
                'common_issues' => array(
                    'Password reset',
                    'Account access',
                    'Course enrollment access',
                    'Payment issues',
                    'Certificate download',
                ),
            );
            
            // Create a focused prompt for technical support
            $support_prompt = "The user is experiencing a login or access issue. " .
                            "User's description: " . $message . "\n\n" .
                            "Provide helpful, step-by-step troubleshooting suggestions. " .
                            "Be specific and actionable. " .
                            "If the issue requires account-specific help, suggest contacting support@succeedtech.com. " .
                            "Format your response with numbered steps and clear instructions.";
            
            $ai_response = SucceedLearn_OpenAI_Client::get_answer($support_prompt, $safe_context, $settings);
            
            if (is_string($ai_response) && trim($ai_response) !== '') {
                $response = "**Here are some solutions to help resolve your issue:**\n\n";
                $response .= wp_kses_post($ai_response);
                $response .= "\n\n**Still need help?**\n";
                $response .= "If these steps don't resolve your issue, please contact our support team:\n";
                $response .= "• **Email:** [support@succeedtech.com](mailto:support@succeedtech.com)\n";
                $response .= "• Include your account email and a brief description of the issue\n\n";
                $response .= "**Did this help resolve your issue?** Please let me know if you need further assistance!";
                return $response;
            }
        }
        
        // Fallback if OpenAI is not available or didn't respond
        $response = "**I understand you're having login/access issues.**\n\n";
        $response .= "**Common Solutions:**\n\n";
        $response .= "1. **Check your credentials:**\n";
        $response .= "   • Ensure your email and password are correct\n";
        $response .= "   • Check for typos or extra spaces\n\n";
        $response .= "2. **Reset your password:**\n";
        $response .= "   • Use the 'Forgot Password' link on the login page\n";
        $response .= "   • Check your email (including spam folder) for reset instructions\n\n";
        $response .= "3. **Clear browser cache:**\n";
        $response .= "   • Clear cookies and cache for this site\n";
        $response .= "   • Try using an incognito/private window\n\n";
        $response .= "4. **Check course enrollment:**\n";
        $response .= "   • Ensure you've completed enrollment for the course\n";
        $response .= "   • Verify payment was successful (if paid course)\n\n";
        $response .= "**Still having trouble?**\n";
        $response .= "Contact our support team: [support@succeedtech.com](mailto:support@succeedtech.com)\n";
        $response .= "Include your account email and a brief description of what you're experiencing.\n\n";
        $response .= "**Did this help resolve your issue?** Please let me know if you need further assistance!";
        
        return $response;
    }
}
