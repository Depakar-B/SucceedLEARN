<?php
/**
 * OpenAI Client (Server-side)
 *
 * @package SucceedLearn_Chatbot_API
 */

if (!defined('ABSPATH')) {
    exit;
}

class SucceedLearn_OpenAI_Client {
    /**
     * Call OpenAI as a fallback to answer common questions.
     * Never send sensitive data. Keep prompts small.
     *
     * @param string $user_message
     * @param array $safe_context
     * @param array $settings
     * @return string|null
     */
    public static function get_answer($user_message, $safe_context, $settings) {
        $enabled = !empty($settings['openai_enabled']);
        $api_key = isset($settings['openai_api_key']) ? trim((string) $settings['openai_api_key']) : '';
        $model = isset($settings['openai_model']) ? trim((string) $settings['openai_model']) : 'gpt-4o-mini';

        if (!$enabled || $api_key === '') {
            return null;
        }

        $user_message = sanitize_text_field($user_message);
        if ($user_message === '' || strlen($user_message) < 2) {
            return null;
        }

        // Safe context must be small and non-sensitive
        if (!is_array($safe_context)) {
            $safe_context = array();
        }

        $system = "You are SucceedLearn’s website assistant. "
            . "Answer clearly and briefly. Use numbered lists when listing steps. "
            . "Do NOT invent prices or policies. "
            . "If you are unsure, tell the user to contact sales@succeedtech.com for pricing or support@succeedtech.com for technical help. "
            . "Never ask for passwords, payment details, or personal sensitive data.";

        $context_json = wp_json_encode($safe_context, JSON_UNESCAPED_UNICODE);
        if (!is_string($context_json)) {
            $context_json = '{}';
        }

        $payload = array(
            'model' => $model,
            'messages' => array(
                array('role' => 'system', 'content' => $system),
                array('role' => 'user', 'content' => "Context (safe):\n" . $context_json . "\n\nUser message:\n" . $user_message),
            ),
            'max_tokens' => 300,
            'temperature' => 0.7,
        );

        $resp = wp_remote_post(
            'https://api.openai.com/v1/chat/completions',
            array(
                'timeout' => 20,
                'headers' => array(
                    'Authorization' => 'Bearer ' . $api_key,
                    'Content-Type' => 'application/json',
                ),
                'body' => wp_json_encode($payload),
            )
        );

        if (is_wp_error($resp)) {
            return null;
        }

        $code = wp_remote_retrieve_response_code($resp);
        $body = wp_remote_retrieve_body($resp);

        if ($code < 200 || $code >= 300 || !$body) {
            return null;
        }

        $data = json_decode($body, true);
        if (!is_array($data)) {
            return null;
        }

        // Extract response from chat completions API
        if (!empty($data['choices'][0]['message']['content']) && is_string($data['choices'][0]['message']['content'])) {
            return trim($data['choices'][0]['message']['content']);
        }

        return null;
    }
}

