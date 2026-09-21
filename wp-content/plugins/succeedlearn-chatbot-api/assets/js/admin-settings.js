/**
 * Admin settings JS for SucceedLearn Chatbot API
 * Adds "Select from Media" button to pick Lottie JSON URLs.
 */

(function($) {
    'use strict';

    let toggleAnim = null;
    let headerAnim = null;

    function safeDestroy(anim) {
        try {
            if (anim && typeof anim.destroy === 'function') {
                anim.destroy();
            }
        } catch (e) {
            // ignore
        }
    }

    function renderPreview(containerId, url, kind) {
        const el = document.getElementById(containerId);
        if (!el) {
            return null;
        }
        el.innerHTML = '';

        if (!url) {
            el.textContent = 'No URL set';
            return null;
        }

        if (typeof window.lottie === 'undefined') {
            el.textContent = 'Lottie library not loaded';
            return null;
        }

        const anim = window.lottie.loadAnimation({
            container: el,
            renderer: 'svg',
            loop: true,
            autoplay: true,
            path: url,
            rendererSettings: {
                progressiveLoad: true
            }
        });

        if (anim && typeof anim.addEventListener === 'function') {
            anim.addEventListener('data_failed', function() {
                el.innerHTML = '';
                el.textContent = 'Cannot load JSON (check URL / permissions)';
            });
        }

        return anim;
    }

    function refreshPreviews() {
        const toggleUrl = $('#succeedlearn_toggle_lottie_url').val();
        const headerUrl = $('#succeedlearn_header_lottie_url').val();

        safeDestroy(toggleAnim);
        safeDestroy(headerAnim);

        toggleAnim = renderPreview('succeedlearn-chatbot-preview-toggle', toggleUrl, 'toggle');
        headerAnim = renderPreview('succeedlearn-chatbot-preview-header', headerUrl, 'header');
    }

    function openMediaPicker(targetSelector) {
        const frame = wp.media({
            title: 'Select Lottie JSON',
            button: { text: 'Use this file' },
            multiple: false
        });

        frame.on('select', function() {
            const attachment = frame.state().get('selection').first().toJSON();
            if (attachment && attachment.url) {
                $(targetSelector).val(attachment.url).trigger('change');
            }
        });

        frame.open();
    }

    $(document).on('click', '.succeedlearn-chatbot-pick-media', function(e) {
        e.preventDefault();
        if (typeof wp === 'undefined' || !wp.media) {
            return;
        }
        const target = $(this).data('target');
        if (target) {
            openMediaPicker(target);
        }
    });

    $(document).on('input change', '#succeedlearn_toggle_lottie_url, #succeedlearn_header_lottie_url', function() {
        refreshPreviews();
    });

    $(document).ready(function() {
        if (typeof window.succeedlearnChatbotApiAdmin !== 'undefined') {
            if (!$('#succeedlearn_toggle_lottie_url').val() && succeedlearnChatbotApiAdmin.toggle) {
                $('#succeedlearn_toggle_lottie_url').val(succeedlearnChatbotApiAdmin.toggle);
            }
            if (!$('#succeedlearn_header_lottie_url').val() && succeedlearnChatbotApiAdmin.header) {
                $('#succeedlearn_header_lottie_url').val(succeedlearnChatbotApiAdmin.header);
            }
        }
        refreshPreviews();
    });

})(jQuery);
