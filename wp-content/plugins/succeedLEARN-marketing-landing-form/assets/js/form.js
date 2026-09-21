(() => {
	const form = document.getElementById('smlf-form');
	if (!form) {
		return;
	}

	const responseNode = form.querySelector('.smlf-response');
	const REDIRECT_FLAG_KEY = 'smlf_redirected';
	const submitBtn = form.querySelector('.smlf-submit');
	const hiddenFields = ['utm_source', 'utm_medium', 'utm_campaign', 'utm_term', 'utm_content', 'page_url'];
	
	// Track form load time and last submission time for rate limiting
	const formLoadTime = Math.floor(Date.now() / 1000);
	let lastSubmissionTime = 0;
	const minTimeBetweenSubmissions = 5; // Minimum seconds between submissions

	// Reset form when returning from redirect or back/forward cache
	const resetFormState = () => {
		form.reset();
		if (responseNode) {
			responseNode.textContent = '';
			responseNode.className = 'smlf-response';
			responseNode.style.display = 'none';
		}
		const errorMessages = form.querySelectorAll('.smlf-error-message');
		errorMessages.forEach((el) => {
			el.textContent = '';
		});
	};

	// If we previously redirected, clear on next load
	if (window.sessionStorage && sessionStorage.getItem(REDIRECT_FLAG_KEY) === '1') {
		resetFormState();
		sessionStorage.removeItem(REDIRECT_FLAG_KEY);
	}

	// Check BFCache navigation
	if (window.performance && window.performance.navigation) {
		if (window.performance.navigation.type === 2) {
			resetFormState();
		}
	}

	// pageshow for BFCache
	window.addEventListener('pageshow', function(event) {
		if (event.persisted) {
			resetFormState();
		}
	});

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

	// Refresh captcha numbers on page load/refresh to ensure they change
	const refreshCaptcha = async () => {
		try {
			const ajaxUrl = (SMLF_FORM && SMLF_FORM.ajaxUrl) || '';
			if (!ajaxUrl) {
				return;
			}

			const formData = new FormData();
			formData.append('action', 'smlf_refresh_captcha');
			formData.append('nonce', (SMLF_FORM && SMLF_FORM.nonce) || '');

			const response = await fetch(ajaxUrl, {
				method: 'POST',
				credentials: 'same-origin',
				body: formData,
			});

			const result = await response.json();
			if (result.success && result.data) {
				const captchaLabel = document.getElementById('smlf-captcha-question');
				const captchaAInput = document.getElementById('smlf_captcha_a');
				const captchaBInput = document.getElementById('smlf_captcha_b');
				const captchaInput = document.getElementById('smlf-captcha');

				if (captchaLabel && result.data.question) {
					captchaLabel.textContent = result.data.question.replace(' *', '');
				}
				if (captchaAInput) {
					captchaAInput.value = result.data.captcha_a;
				}
				if (captchaBInput) {
					captchaBInput.value = result.data.captcha_b;
				}
				if (captchaInput) {
					captchaInput.value = '';
				}
			}
		} catch (error) {
			// Silently fail - don't break the form if captcha refresh fails
			console.warn('Captcha refresh failed:', error);
		}
	};

	// Refresh captcha on page load (including refresh/back button)
	refreshCaptcha();

	const setResponse = (message, isError = false) => {
		if (!responseNode) {
			return;
		}
		responseNode.textContent = message;
		responseNode.className = 'smlf-response'; // Reset classes
		if (message) {
			if (isError) {
				responseNode.classList.add('smlf-error');
			} else {
				responseNode.classList.add('smlf-success');
			}
		}
		// Hide response element if message is empty
		if (!message) {
			responseNode.style.display = 'none';
		} else {
			responseNode.style.display = 'block';
		}
	};

	// Show native validation messages inline
	const showFieldError = (input) => {
		const field = input.closest('.smlf-field');
		if (!field) return;
		const errorSpan = field.querySelector('.smlf-error-message');
		if (!errorSpan) return;

		if (!input.validity.valid) {
			let message = '';
			if (input.validity.valueMissing) {
				if (input.type === 'email') {
					message = 'Enter a organizational mailid';
				} else if (input.type === 'checkbox') {
					message = (SMLF_FORM && SMLF_FORM.messages && SMLF_FORM.messages.privacy) || 'Please accept the privacy policy.';
				} else if (input.tagName === 'SELECT') {
					message = 'Please select an option.';
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
		} else {
			errorSpan.textContent = '';
			input.style.borderColor = '';
		}
	};

	// Handle form submission
	form.addEventListener('submit', async (event) => {
		// Check native validity
		if (!form.checkValidity()) {
			event.preventDefault();
			event.stopPropagation();
			
			// Show errors for all invalid fields
			const inputs = form.querySelectorAll('input, textarea, select');
			inputs.forEach((input) => {
				showFieldError(input);
			});
			
			// Focus first invalid field
			const firstInvalid = form.querySelector(':invalid');
			if (firstInvalid) {
				firstInvalid.focus();
			}
			return;
		}

		event.preventDefault();
		
		// Client-side rate limiting - prevent rapid resubmissions
		const currentTime = Math.floor(Date.now() / 1000);
		const timeSinceLastSubmission = currentTime - lastSubmissionTime;
		const timeSinceFormLoad = currentTime - formLoadTime;
		
		// Check if form was submitted too quickly after page load
		if (timeSinceFormLoad < 5) {
			setResponse('Please take your time to fill out the form properly.', true);
			return;
		}
		
		// Check if user is trying to submit too quickly after last successful submission
		if (lastSubmissionTime > 0 && timeSinceLastSubmission < minTimeBetweenSubmissions) {
			setResponse('Please wait at least ' + minTimeBetweenSubmissions + ' seconds before submitting again.', true);
			return;
		}
		
		setResponse('');
		submitBtn.disabled = true;
		submitBtn.classList.add('is-loading');
		
		const submitText = submitBtn.querySelector('.smlf-submit-text');
		const submitLoading = submitBtn.querySelector('.smlf-submit-loading');
		if (submitText) submitText.style.display = 'none';
		if (submitLoading) submitLoading.style.display = 'inline-flex';

		const formData = new FormData(form);
		
		// Update form time with current timestamp for server-side validation
		const formTimeInput = form.querySelector('[name="smlf_form_time"]');
		if (formTimeInput) {
			formTimeInput.value = formLoadTime; // Use original form load time
		}
		
		formData.append('action', 'smlf_submit_form');
		formData.append('nonce', (SMLF_FORM && SMLF_FORM.nonce) || '');

		try {
			const ajaxUrl = (SMLF_FORM && SMLF_FORM.ajaxUrl) || '';
			if (!ajaxUrl) {
				throw new Error('AJAX URL not configured');
			}
			const response = await fetch(ajaxUrl, {
				method: 'POST',
				credentials: 'same-origin',
				body: formData,
			});

			const result = await response.json();
			if (!response.ok || !result.success) {
				const errorMsg = (result && result.data && result.data.message) || 
				                (SMLF_FORM && SMLF_FORM.messages && SMLF_FORM.messages.error) || 
				                'Something went wrong. Please try again.';
				throw new Error(errorMsg);
			}

			// Update last submission time ONLY after successful submission
			lastSubmissionTime = Math.floor(Date.now() / 1000);
			
			// Track Facebook Pixel Lead event (safe - checks if fbq exists)
			if (typeof fbq !== 'undefined' && typeof fbq === 'function') {
				try {
					fbq('track', 'Lead');
				} catch (error) {
					// Silently fail if there's an error - don't break the form
					console.warn('Facebook Pixel tracking error:', error);
				}
			}
			
			// Check if redirect URL is provided
			const redirectUrl = (result && result.data && result.data.redirect_url) || '';
			
			if (redirectUrl) {
				// Mark that we redirected so we can reset form when user returns
				if (window.sessionStorage) {
					sessionStorage.setItem(REDIRECT_FLAG_KEY, '1');
				}
				// Redirect immediately for instant redirection
				window.location.href = redirectUrl;
			} else {
				// No redirect URL, show success message normally
				const successMsg = (result && result.data && result.data.message) || 
				                  (SMLF_FORM && SMLF_FORM.messages && SMLF_FORM.messages.success) || 
				                  'Thank you! We will contact you soon.';
				setResponse(successMsg, false);
				
				// Preserve form time before reset
				const formTimeInput = form.querySelector('[name="smlf_form_time"]');
				const savedFormTime = formTimeInput ? formTimeInput.value : formLoadTime;
				
				form.reset();
				
				// Restore form time after reset (so rapid resubmissions still use original load time)
				if (formTimeInput) {
					formTimeInput.value = savedFormTime;
				}
				
				// Clear all error messages
				const errorMessages = form.querySelectorAll('.smlf-error-message');
				errorMessages.forEach((el) => {
					el.textContent = '';
				});
			}
		} catch (error) {
			const errorMsg = error.message || 
			                (SMLF_FORM && SMLF_FORM.messages && SMLF_FORM.messages.error) || 
			                'Something went wrong. Please try again.';
			setResponse(errorMsg, true);
		} finally {
			submitBtn.disabled = false;
			submitBtn.classList.remove('is-loading');
			if (submitText) submitText.style.display = '';
			if (submitLoading) submitLoading.style.display = 'none';
		}
	});

	// Show/hide errors on input
	const inputs = form.querySelectorAll('input, textarea, select');
	inputs.forEach((input) => {
		input.addEventListener('invalid', (event) => {
			event.preventDefault();
			showFieldError(input);
		});

		input.addEventListener('input', () => {
			if (input.validity.valid) {
				showFieldError(input);
			}
		});

		input.addEventListener('change', () => {
			if (input.validity.valid) {
				showFieldError(input);
			}
		});

		input.addEventListener('blur', () => {
			showFieldError(input);
		});
	});
})();

