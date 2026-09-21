<?php
/**
 * Question Tracker - Tracks unanswered questions for improvement
 * 
 * @package SucceedLearn_Chatbot_API
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Question Tracker Class
 */
class SucceedLearn_Question_Tracker {
    
    /**
     * Track an unanswered question
     *
     * @param string $question The question that wasn't answered
     * @param string $fallback_response The response that was given
     * @return bool Success status
     */
    public static function track_unanswered($question, $fallback_response = '') {
        // Security: Sanitize question
        $question = sanitize_text_field($question);
        $question = trim($question);
        
        // Skip if question is too short or empty
        if (empty($question) || strlen($question) < 3) {
            return false;
        }
        
        // Get existing tracked questions
        $tracked = self::get_tracked_questions();
        
        // Check if question already exists (case-insensitive)
        $question_lower = strtolower($question);
        $exists = false;
        foreach ($tracked as $item) {
            if (strtolower($item['question']) === $question_lower) {
                $exists = true;
                // Update count and last asked
                $item['count'] = isset($item['count']) ? intval($item['count']) + 1 : 1;
                $item['last_asked'] = current_time('mysql');
                break;
            }
        }
        
        // If doesn't exist, add new entry
        if (!$exists) {
            $tracked[] = array(
                'question' => $question,
                'count' => 1,
                'first_asked' => current_time('mysql'),
                'last_asked' => current_time('mysql'),
                'fallback_response' => sanitize_text_field($fallback_response),
            );
        }
        
        // Save tracked questions
        return self::save_tracked_questions($tracked);
    }
    
    /**
     * Get all tracked questions
     *
     * @return array Tracked questions
     */
    public static function get_tracked_questions() {
        $file_path = SUCCEEDLEARN_CHATBOT_API_DIR . 'data/tracked-questions.json';
        
        if (!file_exists($file_path)) {
            return array();
        }
        
        $content = file_get_contents($file_path);
        $data = json_decode($content, true);
        
        return is_array($data) ? $data : array();
    }
    
    /**
     * Save tracked questions
     *
     * @param array $questions Questions to save
     * @return bool Success status
     */
    private static function save_tracked_questions($questions) {
        $file_path = SUCCEEDLEARN_CHATBOT_API_DIR . 'data/tracked-questions.json';
        
        // Ensure directory exists
        $dir = dirname($file_path);
        if (!file_exists($dir)) {
            wp_mkdir_p($dir);
        }
        
        // Sort by count (most asked first)
        usort($questions, function($a, $b) {
            $count_a = isset($a['count']) ? intval($a['count']) : 0;
            $count_b = isset($b['count']) ? intval($b['count']) : 0;
            return $count_b - $count_a;
        });
        
        $json = json_encode($questions, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        
        return file_put_contents($file_path, $json) !== false;
    }
    
    /**
     * Get most frequently asked unanswered questions
     *
     * @param int $limit Number of questions to return
     * @return array Most asked questions
     */
    public static function get_most_asked($limit = 10) {
        $tracked = self::get_tracked_questions();
        
        // Sort by count
        usort($tracked, function($a, $b) {
            $count_a = isset($a['count']) ? intval($a['count']) : 0;
            $count_b = isset($b['count']) ? intval($b['count']) : 0;
            return $count_b - $count_a;
        });
        
        return array_slice($tracked, 0, $limit);
    }
    
    /**
     * Clear tracked questions
     *
     * @return bool Success status
     */
    public static function clear_tracked() {
        $file_path = SUCCEEDLEARN_CHATBOT_API_DIR . 'data/tracked-questions.json';
        
        if (file_exists($file_path)) {
            return unlink($file_path);
        }
        
        return true;
    }
    
    /**
     * Add answer to tracked question (when admin adds answer)
     *
     * @param string $question Original question
     * @param string $answer Answer to add
     * @return bool Success status
     */
    public static function add_answer($question, $answer) {
        // Security: Sanitize inputs
        $question = sanitize_text_field($question);
        $answer = sanitize_textarea_field($answer);
        
        // Load Q&A data
        $qa_file = SUCCEEDLEARN_CHATBOT_API_DIR . 'data/qa-data.json';
        $qa_data = array();
        
        if (file_exists($qa_file)) {
            $content = file_get_contents($qa_file);
            $qa_data = json_decode($content, true);
            if (!is_array($qa_data)) {
                $qa_data = array();
            }
        }
        
        // Check if question already exists
        $exists = false;
        foreach ($qa_data as &$item) {
            if (strtolower(trim($item['question'])) === strtolower(trim($question))) {
                $item['answer'] = $answer;
                $exists = true;
                break;
            }
        }
        
        // If doesn't exist, add new Q&A pair
        if (!$exists) {
            $qa_data[] = array(
                'question' => $question,
                'answer' => $answer,
            );
        }
        
        // Save Q&A data
        $json = json_encode($qa_data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        $saved = file_put_contents($qa_file, $json) !== false;
        
        // Remove from tracked questions if saved successfully
        if ($saved) {
            $tracked = self::get_tracked_questions();
            $tracked = array_filter($tracked, function($item) use ($question) {
                return strtolower(trim($item['question'])) !== strtolower(trim($question));
            });
            self::save_tracked_questions(array_values($tracked));
        }
        
        return $saved;
    }
}
