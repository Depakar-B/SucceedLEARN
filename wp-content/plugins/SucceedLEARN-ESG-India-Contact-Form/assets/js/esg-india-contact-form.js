(() => {
	const form = document.getElementById('esg-india-contact-form-form');
	if (!form) {
		return;
	}

	const responseNode = form.querySelector('.esg-india-contact-form-response');
	const submitBtn = form.querySelector('.esg-india-contact-form-submit');
	const hiddenFields = ['page_url'];
	
	// Track form load time and last submission time for rate limiting
	const formLoadTime = Math.floor(Date.now() / 1000);
	let lastSubmissionTime = 0;
	const minTimeBetweenSubmissions = 5; // Minimum seconds between submissions

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
		responseNode.className = 'esg-india-contact-form-response'; // Reset classes
		if (message) {
			if (isError) {
				responseNode.classList.add('esg-india-contact-form-error');
			} else {
				responseNode.classList.add('esg-india-contact-form-success');
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
		const field = input.closest('.esg-india-contact-form-field');
		if (!field) return;
		const errorSpan = field.querySelector('.esg-india-contact-form-error-message');
		if (!errorSpan) return;

		if (!input.validity.valid) {
			let message = '';
			if (input.validity.valueMissing) {
				if (input.type === 'email') {
					message = 'Enter a organizational mailid';
				} else 			if (input.type === 'checkbox') {
				message = (ESG_INDIA_CONTACT_FORM && ESG_INDIA_CONTACT_FORM.messages && ESG_INDIA_CONTACT_FORM.messages.privacy) || 'Please accept the privacy policy.';
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
			const inputs = form.querySelectorAll('input, textarea');
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
		
		const submitText = submitBtn.querySelector('.esg-india-contact-form-submit-text');
		const submitLoading = submitBtn.querySelector('.esg-india-contact-form-submit-loading');
		if (submitText) submitText.style.display = 'none';
		if (submitLoading) submitLoading.style.display = 'inline-flex';

		// Get reCAPTCHA token if enabled
		let recaptchaToken = '';
		if (ESG_INDIA_CONTACT_FORM && ESG_INDIA_CONTACT_FORM.recaptchaSiteKey && typeof grecaptcha !== 'undefined') {
			try {
				recaptchaToken = await grecaptcha.execute(ESG_INDIA_CONTACT_FORM.recaptchaSiteKey, { action: 'submit' });
			} catch (error) {
				console.error('reCAPTCHA error:', error);
			}
		}

		const formData = new FormData(form);
		
		// Update form time with current timestamp for server-side validation
		const formTimeInput = form.querySelector('[name="esg_india_contact_form_form_time"]');
		if (formTimeInput) {
			formTimeInput.value = formLoadTime; // Use original form load time
		}
		
		formData.append('action', 'esg_india_contact_form_submit_form');
		formData.append('nonce', (ESG_INDIA_CONTACT_FORM && ESG_INDIA_CONTACT_FORM.nonce) || '');
		if (recaptchaToken) {
			formData.append('recaptcha_token', recaptchaToken);
		}

		try {
			const ajaxUrl = (ESG_INDIA_CONTACT_FORM && ESG_INDIA_CONTACT_FORM.ajaxUrl) || '';
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
				                (ESG_INDIA_CONTACT_FORM && ESG_INDIA_CONTACT_FORM.messages && ESG_INDIA_CONTACT_FORM.messages.error) || 
				                'Something went wrong. Please try again.';
				throw new Error(errorMsg);
			}

			// Update last submission time ONLY after successful submission
			lastSubmissionTime = Math.floor(Date.now() / 1000);
			
			const successMsg = (result && result.data && result.data.message) || 
			                  (ESG_INDIA_CONTACT_FORM && ESG_INDIA_CONTACT_FORM.messages && ESG_INDIA_CONTACT_FORM.messages.success) || 
			                  'Thank you! We will contact you soon.';
			setResponse(successMsg, false);
			
			// Preserve form time before reset
			const formTimeInput = form.querySelector('[name="esg_india_contact_form_form_time"]');
			const savedFormTime = formTimeInput ? formTimeInput.value : formLoadTime;
			
			form.reset();
			
			// Restore form time after reset (so rapid resubmissions still use original load time)
			if (formTimeInput) {
				formTimeInput.value = savedFormTime;
			}
			
			// Clear all error messages
			const errorMessages = form.querySelectorAll('.esg-india-contact-form-error-message');
			errorMessages.forEach((el) => {
				el.textContent = '';
			});
		} catch (error) {
			const errorMsg = error.message || 
			                (ESG_INDIA_CONTACT_FORM && ESG_INDIA_CONTACT_FORM.messages && ESG_INDIA_CONTACT_FORM.messages.error) || 
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
	const inputs = form.querySelectorAll('input, textarea');
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

		input.addEventListener('blur', () => {
			showFieldError(input);
		});
	});
})();


