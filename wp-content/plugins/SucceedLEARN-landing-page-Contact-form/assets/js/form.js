(function() {
	// Wait for DOM to be ready and LPF_FORM to be available
	function initForm() {
		const form = document.getElementById('lpf-form');
		if (!form) {
			return;
		}

		// Check if LPF_FORM is available
		if (typeof window.LPF_FORM === 'undefined') {
			console.error('LPF_FORM is not defined. The form script may not be loaded correctly.');
			// Show error to user
			const errorMsg = document.createElement('p');
			errorMsg.className = 'lpf-response lpf-error';
			errorMsg.textContent = 'Form configuration error. Please refresh the page.';
			form.appendChild(errorMsg);
			return;
		}

	const responseNode = form.querySelector('.lpf-response');
	const submitBtn = form.querySelector('.lpf-submit');
	const hiddenFields = ['utm_source', 'utm_medium', 'utm_campaign', 'utm_term', 'utm_content', 'page_url'];
	
	// Track form load time and last submission time for rate limiting
	const formLoadTime = Math.floor(Date.now() / 1000);
	let lastSubmissionTime = 0;
	const minTimeBetweenSubmissions = 5; // Minimum seconds between submissions

	// Function to regenerate math captcha numbers
	const regenerateCaptcha = () => {
		const captchaA = Math.floor(Math.random() * 11) + 10; // Random number between 10-20
		const captchaB = Math.floor(Math.random() * 11) + 10; // Random number between 10-20
		const captchaLabel = document.getElementById('lpf-captcha-label');
		const captchaAInput = document.getElementById('lpf-captcha-a');
		const captchaBInput = document.getElementById('lpf-captcha-b');
		const captchaInput = document.getElementById('lpf-captcha');
		
		if (captchaLabel && captchaAInput && captchaBInput) {
			// Update label text
			const requiredSpan = captchaLabel.querySelector('.lpf-required');
			captchaLabel.innerHTML = `Security Question: What is ${captchaA} + ${captchaB}? `;
			if (requiredSpan) {
				captchaLabel.appendChild(requiredSpan);
			}
			
			// Update hidden input values
			captchaAInput.value = captchaA;
			captchaBInput.value = captchaB;
			
			// Clear the captcha input field
			if (captchaInput) {
				captchaInput.value = '';
			}
		}
	};

	// Regenerate captcha on page load
	regenerateCaptcha();

	const params = new URLSearchParams(window.location.search);
	hiddenFields.forEach((field) => {
		const input = form.querySelector(`[name="${field}"]`);
		if (!input) {
			return;
		}
		if (field === 'page_url') {
			input.value = window.location.href;
		} else {
			input.value = params.get(field) || '';
		}
	});

	const setResponse = (message, isError = false) => {
		if (!responseNode) {
			return;
		}
		responseNode.textContent = message;
		responseNode.className = 'lpf-response'; // Reset classes
		if (message) {
			if (isError) {
				responseNode.classList.add('lpf-error');
			} else {
				responseNode.classList.add('lpf-success');
			}
		}
		// Hide response element if message is empty
		if (!message) {
			responseNode.style.display = 'none';
		} else {
			responseNode.style.display = 'block';
		}
	};

	// Validate email domain (client-side check)
	const validateEmailDomain = (email) => {
		if (!email || !email.includes('@')) {
			return { valid: false, message: 'Please enter a valid organizational email id.' };
		}
		
		const emailParts = email.split('@');
		if (emailParts.length !== 2) {
			return { valid: false, message: 'Please enter a valid organizational email id.' };
		}
		
		const domain = emailParts[1].toLowerCase().trim();
		
		// Common email providers
		const commonProviders = [
			'gmail.com', 'googlemail.com',
			'yahoo.com', 'yahoo.co.uk', 'yahoo.co.in', 'yahoo.fr', 'yahoo.de', 'yahoo.es', 'yahoo.it', 'yahoo.ca', 'yahoo.com.au', 'yahoo.com.br', 'yahoo.com.mx', 'yahoo.co.jp', 'yahoo.co.kr',
			'outlook.com', 'hotmail.com', 'hotmail.co.uk', 'hotmail.fr', 'hotmail.de', 'hotmail.es', 'hotmail.it', 'hotmail.ca', 'hotmail.com.au', 'hotmail.co.jp',
			'live.com', 'msn.com',
			'aol.com', 'aol.co.uk', 'aol.fr', 'aol.de',
			'icloud.com', 'me.com', 'mac.com',
			'protonmail.com', 'proton.me',
			'zoho.com', 'zoho.eu',
			'yandex.com', 'yandex.ru', 'yandex.ua',
			'mail.com', 'email.com', 'gmx.com', 'gmx.de', 'gmx.net',
			'rediffmail.com', 'rediffmailpro.com',
			'inbox.com', 'fastmail.com',
			'aim.com', 'rocketmail.com'
		];
		
		if (commonProviders.includes(domain)) {
			return { valid: false, message: 'Please enter an organizational email id.' };
		}
		
		// Fake/test domains
		const fakeDomains = [
			'abc.com', 'test.com', 'test.net', 'test.org',
			'example.com', 'example.net', 'example.org',
			'fake.com', 'fake.net', 'fake.org',
			'invalid.com', 'invalid.net', 'invalid.org',
			'dummy.com', 'dummy.net', 'dummy.org',
			'sample.com', 'sample.net', 'sample.org',
			'demo.com', 'demo.net', 'demo.org',
			'localhost.com', 'localhost.net',
			'nonexistent.com', 'nonexistent.net', 'nonexistent.org'
		];
		
		if (fakeDomains.includes(domain)) {
			return { valid: false, message: 'Please enter a valid organizational email id.' };
		}
		
		// Check test patterns in local part
		const localPart = emailParts[0].toLowerCase().trim();
		const testPatterns = ['test', 'testing', 'tester', 'demo', 'sample', 'fake', 'dummy', 'invalid', 'example', 'temp', 'temporary'];
		
		if (testPatterns.includes(localPart) || /^(test|demo|sample|fake|dummy|invalid|example|temp|temporary)[0-9]+$/.test(localPart)) {
			return { valid: false, message: 'Please enter a valid organizational email id.' };
		}
		
		if (/^[0-9]+$/.test(localPart) || localPart.length < 3) {
			return { valid: false, message: 'Please enter a valid organizational email id.' };
		}
		
		return { valid: true, message: '' };
	};

	// Show native validation messages inline
	const showFieldError = (input) => {
		const field = input.closest('.lpf-field');
		if (!field) return;
		const errorSpan = field.querySelector('.lpf-error-message');
		if (!errorSpan) return;

		// Special handling for email field
		if (input.type === 'email' && input.value) {
			const emailValidation = validateEmailDomain(input.value);
			if (!emailValidation.valid) {
				errorSpan.textContent = emailValidation.message;
				input.style.borderColor = '#dc2626';
				input.setCustomValidity(emailValidation.message);
				return;
			} else {
				// Email is valid, clear any previous error
				errorSpan.textContent = '';
				input.style.borderColor = '';
				input.setCustomValidity('');
				return;
			}
		}

		// Special handling for captcha field - ensure custom validity is cleared when field has value
		if (input.id === 'lpf-captcha' || input.name === 'lpf_captcha') {
			// For number inputs, check if value exists (can be 0 or any number)
			if (input.value !== '' && input.value !== null && input.value !== undefined) {
				// Field has value, clear any custom validity and error
				errorSpan.textContent = '';
				input.style.borderColor = '';
				input.setCustomValidity('');
				return;
			}
		}

		if (!input.validity.valid) {
			let message = '';
			if (input.validity.valueMissing) {
				if (input.type === 'email') {
					message = 'Enter a organizational mailid';
				} else if (input.type === 'checkbox') {
					message = LPF_FORM?.messages?.privacy || 'Please accept the privacy policy.';
				} else {
					message = 'Please fill out this field.';
				}
			} else if (input.validity.typeMismatch && input.type === 'email') {
				message = 'Enter a organizational mailid';
			} else {
				message = input.validationMessage;
			}
			errorSpan.textContent = message;
			input.style.borderColor = '#dc2626';
			input.setCustomValidity(message);
		} else {
			errorSpan.textContent = '';
			input.style.borderColor = '';
			input.setCustomValidity('');
		}
	};

	// Handle form submission
	form.addEventListener('submit', async (event) => {
		event.preventDefault();
		
		// ============================================
		// STEP 1: FAST CLIENT-SIDE VALIDATION (< 50ms)
		// ============================================
		// Clear any previous messages
		setResponse('', false);
		
		// Check native HTML5 validity (instant)
		if (!form.checkValidity()) {
			event.stopPropagation();
			
			// Show errors for all invalid fields
			const inputs = form.querySelectorAll('input, textarea');
			inputs.forEach((input) => {
				showFieldError(input);
			});
			
			// Focus first invalid field
			const firstInvalid = form.querySelector(':invalid');
			if (firstInvalid) {
				firstInvalid.focus();
			}
			
			// Show error message
			setResponse('Please fill in all required fields correctly.', true);
			return; // Stop here if validation fails
		}
		
		// Client-side rate limiting checks (instant)
		const currentTime = Math.floor(Date.now() / 1000);
		const timeSinceLastSubmission = currentTime - lastSubmissionTime;
		const timeSinceFormLoad = currentTime - formLoadTime;
		
		// Check if form was submitted too quickly after page load
		if (timeSinceFormLoad < 5) {
			setResponse('Please take your time to fill out the form properly.', true);
			regenerateCaptcha();
			return;
		}
		
		// Check if user is trying to submit too quickly after last successful submission
		if (lastSubmissionTime > 0 && timeSinceLastSubmission < minTimeBetweenSubmissions) {
			setResponse('Please wait at least ' + minTimeBetweenSubmissions + ' seconds before submitting again.', true);
			regenerateCaptcha();
			return;
		}
		
		// Check if LPF_FORM is available and has nonce (instant)
		if (!window.LPF_FORM) {
			setResponse('Form configuration error. Please refresh the page and try again.', true);
			return;
		}
		
		const nonce = window.LPF_FORM.nonce || '';
		if (!nonce) {
			console.error('Nonce is missing from LPF_FORM');
			setResponse('Security token missing. Please refresh the page and try again.', true);
			return;
		}
		
		// ============================================
		// STEP 2: PREPARE SUBMISSION (disable button, show loading)
		// ============================================
		// Clear any previous error messages from fields
		const errorMessages = form.querySelectorAll('.lpf-error-message');
		errorMessages.forEach((el) => {
			el.textContent = '';
		});
		
		// Disable button to prevent double submission
		submitBtn.disabled = true;
		submitBtn.classList.add('is-loading');
		const submitText = submitBtn.querySelector('.lpf-submit-text');
		const submitLoading = submitBtn.querySelector('.lpf-submit-loading');
		if (submitText) submitText.style.display = 'none';
		if (submitLoading) submitLoading.style.display = 'inline-flex';

		// ============================================
		// STEP 3: COLLECT FORM DATA
		// ============================================
		const formData = new FormData(form);
		const formTimeInput = form.querySelector('[name="lpf_form_time"]');
		if (formTimeInput) {
			formTimeInput.value = formLoadTime; // Use original form load time
		}
		formData.append('action', 'lpf_submit_form');
		formData.append('nonce', nonce);

		// ============================================
		// STEP 4: GET reCAPTCHA TOKEN (if enabled)
		// ============================================
		let recaptchaToken = '';
		if (LPF_FORM?.recaptchaSiteKey && typeof grecaptcha !== 'undefined') {
			try {
				recaptchaToken = await grecaptcha.execute(LPF_FORM.recaptchaSiteKey, { action: 'submit' });
			} catch (error) {
				console.error('reCAPTCHA error:', error);
				setResponse('reCAPTCHA verification failed. Please try again.', true);
				submitBtn.disabled = false;
				submitBtn.classList.remove('is-loading');
				if (submitText) submitText.style.display = '';
				if (submitLoading) submitLoading.style.display = 'none';
				return;
			}
		}
		
		if (recaptchaToken) {
			formData.append('recaptcha_token', recaptchaToken);
		}

		// ============================================
		// STEP 5: SEND TO SERVER AND HANDLE RESPONSE
		// ============================================
		try {
			const response = await fetch(LPF_FORM?.ajaxUrl, {
				method: 'POST',
				credentials: 'same-origin',
				body: formData,
			});

			const result = await response.json();
			
			// Check if server response indicates failure
			if (!response.ok || !result.success) {
				throw new Error(result?.data?.message || LPF_FORM?.messages?.error || 'Submission failed. Please try again.');
			}

			// ============================================
			// STEP 6: SUCCESS - Show success only after server confirms
			// ============================================
			// Update last submission time ONLY after successful submission
			lastSubmissionTime = Math.floor(Date.now() / 1000);
			
			// Show success message (only after server confirms success)
			setResponse(result?.data?.message || LPF_FORM?.messages?.success || 'Thank you! We will contact you soon.', false);
			
			// Reset form only after success
			const savedFormTime = formTimeInput ? formTimeInput.value : formLoadTime;
			form.reset();
			
			// Restore hidden fields for next potential submission
			const paramsAfterReset = new URLSearchParams(window.location.search);
			hiddenFields.forEach((field) => {
				const input = form.querySelector(`[name="${field}"]`);
				if (!input) return;
				if (field === 'page_url') {
					input.value = window.location.href;
				} else {
					input.value = paramsAfterReset.get(field) || '';
				}
			});
			if (formTimeInput) {
				formTimeInput.value = savedFormTime;
			}
			
			// Clear all error messages
			errorMessages.forEach((el) => {
				el.textContent = '';
			});
			
			// Regenerate captcha after successful submission
			regenerateCaptcha();
		} catch (error) {
			// ============================================
			// STEP 7: ERROR HANDLING - Show error immediately
			// ============================================
			const errorMsg = error.message || LPF_FORM?.messages?.error || 'An error occurred. Please try again.';
			
			// Check if error is about email validation
			const emailInput = form.querySelector('#lpf-email');
			if (emailInput && (errorMsg.includes('organizational email') || errorMsg.includes('organizational mailid'))) {
				const emailField = emailInput.closest('.lpf-field');
				const errorSpan = emailField ? emailField.querySelector('.lpf-error-message') : null;
				if (errorSpan) {
					errorSpan.textContent = errorMsg;
					emailInput.style.borderColor = '#dc2626';
					emailInput.setCustomValidity(errorMsg);
				}
			} else {
				setResponse(errorMsg, true);
			}
			
			// Regenerate captcha after failed submission
			regenerateCaptcha();
			
			// Re-enable button on error
			submitBtn.disabled = false;
			submitBtn.classList.remove('is-loading');
			if (submitText) submitText.style.display = '';
			if (submitLoading) submitLoading.style.display = 'none';
			return; // Don't continue if there's an error
		}
		
		// ============================================
		// STEP 8: CLEANUP - Re-enable button (form is reset, success shown)
		// ============================================
		submitBtn.disabled = false;
		submitBtn.classList.remove('is-loading');
		if (submitText) submitText.style.display = '';
		if (submitLoading) submitLoading.style.display = 'none';
	});

	// Show/hide errors on input
	const inputs = form.querySelectorAll('input, textarea');
	inputs.forEach((input) => {
		input.addEventListener('invalid', (event) => {
			event.preventDefault();
			showFieldError(input);
		});

		input.addEventListener('input', () => {
			// For email field, always validate on input
			if (input.type === 'email') {
				showFieldError(input);
			} else if (input.id === 'lpf-captcha' || input.name === 'lpf_captcha') {
				// For captcha field, validate immediately to clear errors when value is entered
				showFieldError(input);
			} else if (input.validity.valid) {
				showFieldError(input);
			}
		});

		input.addEventListener('blur', () => {
			showFieldError(input);
		});
	});
	}

	// Initialize when DOM is ready
	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', initForm);
	} else {
		// DOM is already ready, but wait a tick to ensure wp_localize_script has run
		setTimeout(initForm, 0);
	}
})();

