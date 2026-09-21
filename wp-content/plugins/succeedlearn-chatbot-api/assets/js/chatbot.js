/**
 * SucceedLearn Chatbot JavaScript - Updated for REST API
 */

(function($) {
    'use strict';

    const Chatbot = {
        config: {
            storageKey: 'succeedlearn_chatbot_conversation',
            legacyLocalStorageKey: 'succeedlearn_chatbot_conversation', // used by older versions
            maxStoredMessages: 50,
            maxContextMessages: 5,
            // Welcome text (no buttons appended under this)
            welcomeMessage: "Hi! Welcome to SucceedLearn. How can I help you today?",
            // Main menu message (renders menu buttons in chat)
            menuMessage: "What do you want to learn or know about?\n\n[CHATBOT_MENU_OPTIONS]\n1|Course Categories\n2|Course Pricing\n3|Certification\n4|Demo\n5|Contact Support\n[END_MENU_OPTIONS]"
        },
        
        state: {
            hasRealConversationStarted: false, // hides main menu after first real bot answer
            awaitingBotAnswer: false
        },

        init: function() {
            // Initialize state
            this.state.hasRealConversationStarted = false;
            this.state.awaitingBotAnswer = false;
            
            this.bindEvents();
            this.clearLegacyPersistentStorage();
            this.loadStoredConversation();
            this.showWelcomeMessage();
            this.initLottie();
            this.applyUiSettings();
            // Show menu initially, hide if conversation already started
            this.syncMenuVisibilityFromHistory();
        },

        getStorage: function() {
            // Use sessionStorage so chat clears when browser/tab is closed.
            try {
                if (typeof window.sessionStorage !== 'undefined') {
                    return window.sessionStorage;
                }
            } catch (e) {}
            // Fallback: no storage available
            return null;
        },

        clearLegacyPersistentStorage: function() {
            // Remove any previously saved chat in localStorage (older behavior).
            try {
                if (typeof window.localStorage !== 'undefined') {
                    window.localStorage.removeItem(this.config.legacyLocalStorageKey);
                }
            } catch (e) {}
        },

        applyUiSettings: function() {
            if (typeof window.succeedlearnChatbot === 'undefined' || !succeedlearnChatbot.ui) {
                return;
            }
            if (succeedlearnChatbot.ui.headerTitle) {
                $('.succeedlearn-chatbot-header-title').text(succeedlearnChatbot.ui.headerTitle);
            }
            if (succeedlearnChatbot.ui.welcomeMessage) {
                // Treat admin-provided welcomeMessage as greeting text.
                // Menu buttons are rendered from config.menuMessage.
                this.config.welcomeMessage = succeedlearnChatbot.ui.welcomeMessage;
            }
        },

        initLottie: function() {
            const $toggleBtn = $('#succeedlearn-chatbot-toggle');

            if (typeof window.lottie === 'undefined') {
                console.warn('[SucceedLearn Chatbot] Lottie library not found.');
                $toggleBtn.addClass('is-fallback');
                return;
            }
            if (typeof window.succeedlearnChatbot === 'undefined' || !succeedlearnChatbot.lottie) {
                console.warn('[SucceedLearn Chatbot] Lottie paths not found');
                $toggleBtn.addClass('is-fallback');
                return;
            }

            function attachAnimHandlers(anim, label) {
                if (!anim || typeof anim.addEventListener !== 'function') {
                    return;
                }
                anim.addEventListener('data_failed', function() {
                    console.warn('[SucceedLearn Chatbot] Lottie data_failed for', label);
                    if (label === 'toggle') {
                        $toggleBtn.addClass('is-fallback');
                    }
                });
            }

            const toggleEl = document.getElementById('succeedlearn-chatbot-toggle-lottie');
            if (toggleEl && succeedlearnChatbot.lottie.toggle) {
                const anim = window.lottie.loadAnimation({
                    container: toggleEl,
                    renderer: 'svg',
                    loop: true,
                    autoplay: true,
                    path: succeedlearnChatbot.lottie.toggle,
                    rendererSettings: {
                        progressiveLoad: true
                    }
                });
                if (anim) {
                    $toggleBtn.removeClass('is-fallback');
                    attachAnimHandlers(anim, 'toggle');
                }
            } else {
                $toggleBtn.addClass('is-fallback');
            }

            const headerEl = document.getElementById('succeedlearn-chatbot-header-lottie');
            if (headerEl && succeedlearnChatbot.lottie.header) {
                const headerAnim = window.lottie.loadAnimation({
                    container: headerEl,
                    renderer: 'svg',
                    loop: true,
                    autoplay: true,
                    path: succeedlearnChatbot.lottie.header,
                    rendererSettings: {
                        progressiveLoad: true
                    }
                });
                attachAnimHandlers(headerAnim, 'header');
            }
        },

        bindEvents: function() {
            const self = this;

            $('#succeedlearn-chatbot-toggle').on('click', function() {
                self.toggleChatWindow();
            });

            $('#succeedlearn-chatbot-close').on('click', function() {
                self.closeChatWindow();
            });

            $('#succeedlearn-chatbot-send').on('click', function() {
                self.sendMessage();
            });

            $('#succeedlearn-chatbot-input').on('keypress', function(e) {
                if (e.which === 13 && !e.shiftKey) {
                    e.preventDefault();
                    self.sendMessage();
                }
            });

            // In-chat menu buttons (rendered from [CHATBOT_MENU_OPTIONS])
            $(document).on('click', '.succeedlearn-chatbot-menu-btn', function() {
                const question = $(this).data('question');
                if (question) {
                    $('#succeedlearn-chatbot-input').val(question);
                    self.sendMessage();
                }
            });

            // In-chat "Go back to menu"
            $(document).on('click', '.succeedlearn-chatbot-go-back-btn', function() {
                self.showMainMenu();
            });

            // Handle quick option buttons (1, 2, 3)
            $(document).on('click', '.succeedlearn-chatbot-quick-option-btn', function() {
                const optionNum = $(this).data('option');
                if (optionNum) {
                    $('#succeedlearn-chatbot-input').val(optionNum);
                    self.sendMessage();
                }
            });
            
            // Handle category list buttons
            $(document).on('click', '.succeedlearn-chatbot-category-btn', function() {
                const question = $(this).data('question');
                if (question) {
                    $('#succeedlearn-chatbot-input').val(question);
                    self.sendMessage();
                }
            });
        },

        toggleChatWindow: function() {
            const $window = $('#succeedlearn-chatbot-window');
            const $toggle = $('#succeedlearn-chatbot-toggle');

            if ($window.hasClass('active')) {
                this.closeChatWindow();
            } else {
                $window.addClass('active');
                $toggle.css('display', 'none');
                setTimeout(function() {
                    $('#succeedlearn-chatbot-input').focus();
                }, 100);
            }
        },

        closeChatWindow: function() {
            $('#succeedlearn-chatbot-window').removeClass('active');
            $('#succeedlearn-chatbot-toggle').css('display', 'flex');
        },

        showWelcomeMessage: function() {
            const $messages = $('#succeedlearn-chatbot-messages');
            
            if ($messages.children('.succeedlearn-chatbot-message').length === 0) {
                this.addMessage(this.config.welcomeMessage, 'bot');
            }
        },

        sendMessage: function() {
            const $input = $('#succeedlearn-chatbot-input');
            const message = $input.val().trim();

            if (!message) {
                return;
            }

            if (message.length > 500) {
                this.addMessage('Message is too long. Please keep it under 500 characters.', 'bot');
                return;
            }

            // Hide menu when user sends first message (if menu is visible)
            if (!this.state.hasRealConversationStarted) {
                this.hideMainMenu();
            }

            this.addMessage(message, 'user');
            this.state.awaitingBotAnswer = true;
            $input.val('');
            this.setInputState(false);
            this.showLoading();

            // Try REST API first, fallback to AJAX
            this.sendRestRequest(message);
        },

        sendRestRequest: function(message) {
            const self = this;
            
            if (!succeedlearnChatbot.restUrl) {
                // Fallback to AJAX
                this.sendAjaxRequest(message);
                return;
            }

            fetch(succeedlearnChatbot.restUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    message: message,
                    user_id: succeedlearnChatbot.userId || null
                })
            })
            .then(response => response.json())
            .then(data => {
                self.hideLoading();
                if (data.status === 'success' && data.reply) {
                    self.addMessage(data.reply, 'bot');
                    // Hide menu after first bot answer
                    if (self.state.awaitingBotAnswer && !self.state.hasRealConversationStarted) {
                        self.hideMainMenu();
                    }
                } else {
                    self.addMessage('Sorry, I encountered an error. Please try again.', 'bot');
                }
                self.state.awaitingBotAnswer = false;
                self.setInputState(true);
            })
            .catch(error => {
                console.error('REST API error:', error);
                // Fallback to AJAX
                self.sendAjaxRequest(message);
            });
        },

        sendAjaxRequest: function(message) {
            const self = this;

            $.ajax({
                url: succeedlearnChatbot.ajaxurl,
                type: 'POST',
                data: {
                    action: 'succeedlearn_chatbot_message',
                    message: message,
                    nonce: succeedlearnChatbot.nonce
                },
                success: function(response) {
                    self.hideLoading();

                    if (response.success && response.data && response.data.message) {
                        self.addMessage(response.data.message, 'bot');
                        // Hide menu after first bot answer
                        if (self.state.awaitingBotAnswer && !self.state.hasRealConversationStarted) {
                            self.hideMainMenu();
                        }
                    } else {
                        const errorMsg = response.data && response.data.message 
                            ? response.data.message 
                            : 'Sorry, I encountered an error. Please try again.';
                        self.addMessage(errorMsg, 'bot');
                    }

                    self.state.awaitingBotAnswer = false;
                    self.setInputState(true);
                },
                error: function(xhr, status, error) {
                    self.hideLoading();
                    self.addMessage('Sorry, there was a connection error. Please check your internet connection and try again.', 'bot');
                    self.setInputState(true);
                }
            });
        },

        addMessage: function(text, type) {
            const $messages = $('#succeedlearn-chatbot-messages');
            const $message = $('<div>').addClass('succeedlearn-chatbot-message').addClass('succeedlearn-chatbot-message-' + type);
            
            const formatted = this.formatMessage(text, type);
            $message.html(formatted);
            
            $messages.append($message);
            
            // For bot messages, scroll to show the top of the message first (so user sees courses/cards at top)
            // For user messages, scroll to bottom as usual
            if (type === 'bot') {
                this.scrollToMessageTop($message);
            } else {
                this.scrollToBottom();
            }
            
            this.saveMessage(text, type);

            // Hide main menu once the first real bot answer is displayed
            // (only if it's a bot message after user message, and not the welcome message)
            if (type === 'bot' && this.state.awaitingBotAnswer && text !== this.config.welcomeMessage) {
                this.state.awaitingBotAnswer = false;
                if (!this.state.hasRealConversationStarted) {
                    this.state.hasRealConversationStarted = true;
                    this.hideMainMenu();
                }
            }
        },

        formatMessage: function(text, type) {
            if (!text) return '';
            
            // Decode HTML entities first (e.g., &amp; -> &, &lt; -> <, etc.)
            const decodeHtmlEntities = function(str) {
                const textarea = document.createElement('textarea');
                textarea.innerHTML = str;
                return textarea.value;
            };
            
            // Process original text first (before HTML escaping)
            let processed = decodeHtmlEntities(String(text));

            // Render menu block [CHATBOT_MENU_OPTIONS]... [END_MENU_OPTIONS]
            const menuRegex = /\[CHATBOT_MENU_OPTIONS\]([\s\S]*?)\[END_MENU_OPTIONS\]/g;
            processed = processed.replace(menuRegex, function(match, menuBody) {
                const lines = (menuBody || '').split(/\r?\n/).map(l => l.trim()).filter(Boolean);
                const items = [];
                lines.forEach(line => {
                    // Format: 1|Courses
                    const parts = line.split('|');
                    if (parts.length >= 2) {
                        const label = parts.slice(1).join('|').trim();
                        if (label) items.push(label);
                    }
                });

                if (!items.length) {
                    return '';
                }

                const buttons = items.map(label => {
                    // Map menu labels -> actual questions the bot understands
                    let q = label;
                    const lower = label.toLowerCase();
                    if (lower.includes('course pricing') || lower.includes('pricing')) q = 'Course pricing';
                    else if (lower.includes('course categor') || lower.includes('categor')) q = 'Course Categories';
                    else if (lower === 'courses') q = 'What courses are available?';
                    else if (lower.includes('cert')) q = 'Will I receive a certificate?';
                    else if (lower.includes('contact')) q = 'Contact support';
                    else if (lower.includes('demo')) q = 'Demo';

                    return '<button type="button" class="succeedlearn-chatbot-menu-btn" data-question="' + $('<div>').text(q).html() + '">' + $('<div>').text(label).html() + '</button>';
                }).join('');

                return '<div class="succeedlearn-chatbot-menu">' + buttons + '</div>';
            });
            
            // Render category list [CATEGORY_LIST]... [/CATEGORY_LIST]
            const categoryListRegex = /\[CATEGORY_LIST\]([\s\S]*?)\[\/CATEGORY_LIST\]/g;
            processed = processed.replace(categoryListRegex, function(match, listBody) {
                const lines = (listBody || '').split(/\r?\n/).map(l => l.trim()).filter(Boolean);
                const items = [];
                lines.forEach(line => {
                    const parts = line.split('|');
                    if (parts.length >= 2) {
                        const label = parts[0].trim(); // Category name
                        const question = parts.slice(1).join('|').trim(); // Question to ask
                        if (label && question) items.push({ label, question });
                    } else if (parts.length === 1 && parts[0].trim()) {
                        // Fallback: if no pipe, use category name as both label and question
                        const label = parts[0].trim();
                        items.push({ label, question: label });
                    }
                });

                if (!items.length) {
                    return '';
                }

                const buttons = items.map(item => {
                    return '<button type="button" class="succeedlearn-chatbot-category-btn" data-question="' + $('<div>').text(item.question).html() + '">' + $('<div>').text(item.label).html() + '</button>';
                }).join('');

                return '<div class="succeedlearn-chatbot-category-list">' + buttons + '</div>';
            });
            
            // Render quick options [QUICK_OPTIONS]... [/QUICK_OPTIONS]
            const quickOptionsRegex = /\[QUICK_OPTIONS\]([\s\S]*?)\[\/QUICK_OPTIONS\]/g;
            processed = processed.replace(quickOptionsRegex, function(match, optionsBody) {
                const lines = (optionsBody || '').split(/\r?\n/).map(l => l.trim()).filter(Boolean);
                const options = [];
                lines.forEach(line => {
                    // Format: 1|Label|Explanation
                    const parts = line.split('|');
                    if (parts.length >= 3) {
                        const num = parts[0].trim();
                        const label = parts[1].trim();
                        const explanation = parts.slice(2).join('|').trim();
                        if (num && label) {
                            options.push({ num: num, label: label, explanation: explanation });
                        }
                    }
                });

                if (!options.length) {
                    return '';
                }

                const buttons = options.map(opt => {
                    const escapedLabel = $('<div>').text(opt.label).html();
                    return '<button type="button" class="succeedlearn-chatbot-quick-option-btn" data-option="' + opt.num + '" title="' + $('<div>').text(opt.explanation).html() + '">' + opt.num + '. ' + escapedLabel + '</button>';
                }).join('');

                return '<div class="succeedlearn-chatbot-quick-options">' + buttons + '</div>';
            });
            
            // Process line by line to convert numbered lists and bullet points to proper HTML lists
            const lines = processed.split(/\r?\n/);
            const processedLines = [];
            let inNumberedList = false;
            let inBulletList = false;
            let numberedListItems = [];
            let bulletListItems = [];
            
            for (let i = 0; i < lines.length; i++) {
                const line = lines[i];
                const trimmed = line.trim();
                
                // Skip processing if this line contains COURSE_CARD tag (will be processed later)
                if (trimmed.indexOf('[COURSE_CARD]') !== -1) {
                    // Process the line normally without list formatting
                    if (trimmed.match(/<[^>]+>/)) {
                        processedLines.push(trimmed);
                    } else {
                        processedLines.push($('<div>').text(trimmed).html());
                    }
                    continue;
                }
                
                // Check if this is a numbered list item (1. 2. 3. etc.)
                const numberedMatch = trimmed.match(/^(\d+)\.\s+(.+)$/);
                // Check if this is a bullet point (• or - or *)
                const bulletMatch = trimmed.match(/^[•\-\*]\s+(.+)$/);
                
                if (numberedMatch) {
                    // Close bullet list if open
                    if (inBulletList && bulletListItems.length > 0) {
                        processedLines.push('<ul class="succeedlearn-chatbot-unordered-list">' + bulletListItems.join('') + '</ul>');
                        bulletListItems = [];
                        inBulletList = false;
                    }
                    
                    if (!inNumberedList) {
                        inNumberedList = true;
                        numberedListItems = [];
                    }
                    // Escape first, then apply formatting on escaped text.
                    // This prevents any raw markers like <!--BOLD_START--> from leaking into UI.
                    let content = $('<div>').text(numberedMatch[2]).html();

                    // Bold: **text**
                    content = content.replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>');

                    // Price: $299.99
                    content = content.replace(/\$\s*(\d+[\d,]*\.?\d*)/g, function(match, amount) {
                        return '<span class="succeedlearn-chatbot-price">$' + amount + '</span>';
                    });

                    // Link: [View Course Details](url)
                    content = content.replace(/\[View Course Details\]\((.*?)\)/g, function(match, url) {
                        // url is already escaped because we escaped the full string above
                        return '<a href="' + url + '" class="succeedlearn-chatbot-course-link" target="_blank">View Course Details →</a>';
                    });
                    
                    numberedListItems.push('<li class="succeedlearn-chatbot-list-item">' + content + '</li>');
                } else if (bulletMatch) {
                    // Close numbered list if open
                    if (inNumberedList && numberedListItems.length > 0) {
                        processedLines.push('<ol class="succeedlearn-chatbot-ordered-list">' + numberedListItems.join('') + '</ol>');
                        numberedListItems = [];
                        inNumberedList = false;
                    }
                    
                    if (!inBulletList) {
                        inBulletList = true;
                        bulletListItems = [];
                    }
                    
                    // Escape first, then apply formatting
                    let content = $('<div>').text(bulletMatch[1]).html();
                    
                    // Bold: **text**
                    content = content.replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>');
                    
                    bulletListItems.push('<li class="succeedlearn-chatbot-list-item">' + content + '</li>');
                } else {
                    // Not a list item - close any open lists
                    if (inNumberedList && numberedListItems.length > 0) {
                        processedLines.push('<ol class="succeedlearn-chatbot-ordered-list">' + numberedListItems.join('') + '</ol>');
                        numberedListItems = [];
                        inNumberedList = false;
                    }
                    if (inBulletList && bulletListItems.length > 0) {
                        processedLines.push('<ul class="succeedlearn-chatbot-unordered-list">' + bulletListItems.join('') + '</ul>');
                        bulletListItems = [];
                        inBulletList = false;
                    }
                    
                    // Process the line normally
                    if (trimmed) {
                        // Check if line already contains HTML (like our menu div)
                        // If it contains HTML tags, don't escape it
                        if (trimmed.match(/<[^>]+>/)) {
                            processedLines.push(trimmed);
                        } else {
                            // Escape HTML for plain text lines
                            processedLines.push($('<div>').text(trimmed).html());
                        }
                    } else if (line === '') {
                        processedLines.push('');
                    }
                }
            }
            
            // Close any remaining lists
            if (inNumberedList && numberedListItems.length > 0) {
                processedLines.push('<ol class="succeedlearn-chatbot-ordered-list">' + numberedListItems.join('') + '</ol>');
            }
            if (inBulletList && bulletListItems.length > 0) {
                processedLines.push('<ul class="succeedlearn-chatbot-unordered-list">' + bulletListItems.join('') + '</ul>');
            }
            
            processed = processedLines.join('\n');
            
            // Now HTML escape the rest and process other formatting
            let formatted = processed;
            
            // IMPORTANT: Process COURSE_CARD tags FIRST before any other formatting
            // This prevents course cards from being processed as numbered lists
            // Convert [COURSE_CARD]number|title|price|url[/COURSE_CARD] to card HTML
            // Also support old format [COURSE_CARD]title|price|url[/COURSE_CARD] for backward compatibility
            // Use non-greedy match with [\s\S] to handle multi-line content and special characters
            formatted = formatted.replace(/\[COURSE_CARD\]([\s\S]*?)\[\/COURSE_CARD\]/g, function(match, content) {
                // Manual parsing to handle pipes in titles - parse from the end backwards
                // Format is always: number|title|price|url (4 parts) or title|price|url (3 parts)
                // We'll parse from the end to get URL and price first, then handle the rest
                const lastPipeIndex = content.lastIndexOf('|');
                const secondLastPipeIndex = content.lastIndexOf('|', lastPipeIndex - 1);
                
                if (lastPipeIndex === -1 || secondLastPipeIndex === -1) {
                    // Invalid format - return original match to avoid breaking display
                    console.warn('Invalid COURSE_CARD format:', match);
                    return match;
                }
                
                // Extract URL (last part after last pipe)
                let url = content.substring(lastPipeIndex + 1).trim();
                
                // Extract price (between second last and last pipe)
                let price = content.substring(secondLastPipeIndex + 1, lastPipeIndex).trim();
                
                // Remaining part is number|title or just title
                const remaining = content.substring(0, secondLastPipeIndex).trim();
                const firstPipeIndex = remaining.indexOf('|');
                
                let number = '';
                let title = '';
                
                if (firstPipeIndex !== -1 && /^\d+$/.test(remaining.substring(0, firstPipeIndex).trim())) {
                    // Has number format: number|title
                    number = remaining.substring(0, firstPipeIndex).trim();
                    title = remaining.substring(firstPipeIndex + 1).trim();
                } else {
                    // No number format: just title
                    number = '';
                    title = remaining;
                }
                
                const escapedTitle = $('<div>').text(title).html();
                const escapedPrice = $('<div>').text(price).html();
                const escapedUrl = url ? $('<div>').text(url).html() : '';
                
                let cardHtml = '<div class="succeedlearn-chatbot-course-card">';
                if (number) {
                    cardHtml += '<div class="succeedlearn-chatbot-course-card-number">' + number + '.</div>';
                }
                cardHtml += '<div class="succeedlearn-chatbot-course-card-title">' + escapedTitle + '</div>';
                cardHtml += '<div class="succeedlearn-chatbot-course-card-footer">';
                cardHtml += '<div class="succeedlearn-chatbot-course-card-price">' + escapedPrice + '</div>';
                if (escapedUrl) {
                    cardHtml += '<a href="' + escapedUrl + '" class="succeedlearn-chatbot-course-card-link" target="_blank">View Course</a>';
                }
                cardHtml += '</div></div>';
                return cardHtml;
            });
            
            // Convert FAQ format (number. **question** answer) - but these should be escaped first
            formatted = formatted.replace(/(\d+)\.\s+\*\*(.*?)\*\*\s*\n\s+(.*?)(?=\n\n|\n\d+\.|$)/gs, function(match, num, question, answer) {
                const qEscaped = $('<div>').text(question.trim()).html();
                const aEscaped = $('<div>').text(answer.trim()).html();
                return '<div class="succeedlearn-chatbot-faq-item"><span class="faq-question">' + qEscaped + '</span><span class="faq-answer">' + aEscaped + '</span></div>';
            });
            
            // Section titles (**Title**) - escape first
            formatted = formatted.replace(/\*\*(.*?)\*\*:\s*\n\n/g, function(match, title) {
                const escapedTitle = $('<div>').text(title).html();
                return '<div class="succeedlearn-chatbot-section-title">' + escapedTitle + '</div>';
            });
            
            // Bold text **text** (but not if already processed)
            formatted = formatted.replace(/\*\*(.*?)\*\*/g, function(match, content) {
                const escaped = $('<div>').text(content).html();
                return '<strong>' + escaped + '</strong>';
            });
            
            // Convert markdown links [text](url) to HTML links
            formatted = formatted.replace(/\[([^\]]+)\]\(([^)]+)\)/g, function(match, text, url) {
                const escapedText = $('<div>').text(text).html();
                const escapedUrl = $('<div>').text(url).html();
                // Check if it's a mailto link or regular link
                const linkClass = url.startsWith('mailto:') ? 'succeedlearn-chatbot-email-link' : 'succeedlearn-chatbot-link';
                return '<a href="' + escapedUrl + '" class="' + linkClass + '">' + escapedText + '</a>';
            });
            
            // Convert [View Course Details](url) to link (if not already processed - legacy format)
            formatted = formatted.replace(/\[View Course Details\]\((.*?)\)/g, function(match, url) {
                const escapedUrl = $('<div>').text(url).html();
                return '<a href="' + escapedUrl + '" class="succeedlearn-chatbot-course-link" target="_blank">View Course Details →</a>';
            });
            
            // Convert price format ($299.99) to highlighted price (if not already processed)
            formatted = formatted.replace(/\$\s*(\d+[\d,]*\.?\d*)/g, function(match, amount) {
                if (match.indexOf('succeedlearn-chatbot-price') === -1) {
                    return '<span class="succeedlearn-chatbot-price">$' + amount + '</span>';
                }
                return match;
            });
            
            // Line breaks - but preserve HTML structure
            // Split by lines and process each segment
            const segments = formatted.split(/\n+/);
            const processedSegments = [];
            let currentParagraph = [];
            
            for (let i = 0; i < segments.length; i++) {
                const segment = segments[i].trim();
                if (!segment) {
                    // Empty line - close current paragraph if any
                    if (currentParagraph.length > 0) {
                        processedSegments.push('<p>' + currentParagraph.join(' ') + '</p>');
                        currentParagraph = [];
                    }
                    continue;
                }
                
                // Check if segment contains HTML tags (like menu div or contact support div)
                if (segment.match(/<[^>]+>/)) {
                    // Close current paragraph if any
                    if (currentParagraph.length > 0) {
                        processedSegments.push('<p>' + currentParagraph.join(' ') + '</p>');
                        currentParagraph = [];
                    }
                    // Add HTML segment as-is (including contact support divs)
                    processedSegments.push(segment);
                } else {
                    // Plain text - add to current paragraph
                    currentParagraph.push(segment);
                }
            }
            
            // Close any remaining paragraph
            if (currentParagraph.length > 0) {
                processedSegments.push('<p>' + currentParagraph.join(' ') + '</p>');
            }
            
            formatted = processedSegments.join('');
            
            // If no paragraphs were created and no HTML, wrap in paragraph
            if (!formatted.match(/^<div|^<p|^<ul|^<ol|^<button/) && formatted.trim()) {
                formatted = '<p>' + formatted + '</p>';
            }

            // Safety cleanup: remove any legacy markers if they ever appear
            formatted = formatted
                .replace(/<!--BOLD_START-->|<!--BOLD_END-->|<!--PRICE_START-->|<!--PRICE_END-->|<!--LINK_START-->|<!--LINK_END-->/g, '');

            const isMenuMessage = (text === this.config.menuMessage) || (formatted.indexOf('succeedlearn-chatbot-menu') !== -1);
            const isWelcomeMessage = (text === this.config.welcomeMessage);

            // Add "Go back to menu" CTA only for BOT answers (not user), not on welcome/menu messages
            if (type === 'bot' && !isMenuMessage && !isWelcomeMessage) {
                formatted += '<div class="succeedlearn-chatbot-go-back"><button type="button" class="succeedlearn-chatbot-go-back-btn">Go back to menu</button></div>';
            }
            
            return formatted;
        },

        showLoading: function() {
            const $messages = $('#succeedlearn-chatbot-messages');
            const $loading = $('<div>').addClass('succeedlearn-chatbot-message').addClass('succeedlearn-chatbot-message-bot').addClass('succeedlearn-chatbot-loading');
            $loading.html('<div class="succeedlearn-chatbot-loading-dots"><span></span><span></span><span></span></div>');
            $messages.append($loading);
            this.scrollToBottom();
        },

        hideLoading: function() {
            $('.succeedlearn-chatbot-loading').remove();
        },

        setInputState: function(enabled) {
            const $input = $('#succeedlearn-chatbot-input');
            const $send = $('#succeedlearn-chatbot-send');
            
            if (enabled) {
                $input.prop('disabled', false);
                $send.prop('disabled', false);
            } else {
                $input.prop('disabled', true);
                $send.prop('disabled', true);
            }
        },

        scrollToBottom: function() {
            const $messages = $('#succeedlearn-chatbot-messages');
            $messages.scrollTop($messages[0].scrollHeight);
        },
        
        scrollToMessageTop: function($messageElement) {
            const $messages = $('#succeedlearn-chatbot-messages');
            
            // Use setTimeout to ensure the message is fully rendered and positioned
            setTimeout(function() {
                // Get the position of the message element relative to the messages container
                const messageElement = $messageElement[0];
                const messagesElement = $messages[0];
                
                if (messageElement && messagesElement) {
                    // Calculate the scroll position to show the top of the message
                    const messageTop = messageElement.offsetTop;
                    const currentScrollTop = messagesElement.scrollTop;
                    const messagesTop = messagesElement.offsetTop;
                    
                    // Calculate how much we need to scroll to show the message at the top
                    // Add a small offset (20px) for padding/margin
                    const targetScrollTop = messageTop - 20;
                    
                    // Smooth scroll to show the top of the message
                    $messages.animate({
                        scrollTop: Math.max(0, targetScrollTop)
                    }, 300);
                } else {
                    // Fallback: scroll to bottom if calculation fails
                    $messages.scrollTop($messages[0].scrollHeight);
                }
            }, 150);
        },

        saveMessage: function(message, type) {
            try {
                let conversation = this.getStoredConversation();
                conversation.push({
                    message: message,
                    type: type,
                    timestamp: new Date().toISOString()
                });
                
                if (conversation.length > this.config.maxStoredMessages) {
                    conversation = conversation.slice(-this.config.maxStoredMessages);
                }

                const storage = this.getStorage();
                if (!storage) {
                    return;
                }
                storage.setItem(this.config.storageKey, JSON.stringify(conversation));
            } catch (e) {
                console.warn('Failed to save conversation:', e);
            }
        },

        getStoredConversation: function() {
            try {
                const storage = this.getStorage();
                if (!storage) {
                    return [];
                }
                const stored = storage.getItem(this.config.storageKey);
                return stored ? JSON.parse(stored) : [];
            } catch (e) {
                return [];
            }
        },

        loadStoredConversation: function() {
            const conversation = this.getStoredConversation();
            const $messages = $('#succeedlearn-chatbot-messages');
            
            if (conversation.length > 0) {
                conversation.forEach(function(msg) {
                    const $msg = $('<div>').addClass('succeedlearn-chatbot-message').addClass('succeedlearn-chatbot-message-' + msg.type);
                    $msg.html(Chatbot.formatMessage(msg.message));
                    $messages.append($msg);
                });
                this.scrollToBottom();
            }
        },
        
        syncMenuVisibilityFromHistory: function() {
            // Check if there's already a real conversation (user message + bot answer)
            const conversation = this.getStoredConversation();
            const hasUserMessage = conversation.some(m => m && m.type === 'user');
            const hasBotAnswer = conversation.some(m => m && m.type === 'bot' && m.message !== this.config.welcomeMessage);
            
            // If there's a real conversation, hide menu initially
            if (hasUserMessage && hasBotAnswer) {
                this.state.hasRealConversationStarted = true;
                this.hideMainMenu();
            } else {
                // Show menu initially if no real conversation yet
                this.showMainMenu();
            }
        },


        hideMainMenu: function() {
            this.state.hasRealConversationStarted = true;
            $('#succeedlearn-chatbot-quick-questions').hide();
        },

        showMainMenu: function() {
            // Show the main menu again inside the chat area (avoid duplicates)
            const convo = this.getStoredConversation ? this.getStoredConversation() : [];
            const last = convo && convo.length ? convo[convo.length - 1] : null;
            if (last && last.type === 'bot' && last.message === this.config.menuMessage) {
                this.state.hasRealConversationStarted = false;
                return;
            }
            this.addMessage(this.config.menuMessage, 'bot');
            this.state.hasRealConversationStarted = false;
        }
    };

    $(document).ready(function() {
        Chatbot.init();
    });

})(jQuery);
