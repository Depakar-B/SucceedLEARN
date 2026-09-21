(() => {
	const initScfForm = (form) => {
		if (!form || form.getAttribute('data-scf-initialized') === '1') {
			return;
		}
		form.setAttribute('data-scf-initialized', '1');

		const responseNode = form.querySelector('.scf-response');
		const submitBtn = form.querySelector('.scf-submit');
		const courseInterestCheckboxes = form.querySelectorAll('input[name="course_interest[]"]');
		const otherCourseHintNodes = form.querySelectorAll('.scf-other-course-hint');
		const hiddenFields = ['utm_source', 'utm_medium', 'utm_campaign', 'utm_term', 'utm_content', 'page_url', 'custom_lead_path'];

		const formLoadTime = Math.floor(Date.now() / 1000);
		let lastSubmissionTime = 0;
		const minTimeBetweenSubmissions = 5;
		let securityReady = null;

		const requiresRecaptcha = Boolean(SCF_FORM && SCF_FORM.recaptchaSiteKey);

		const applySecurityPayload = (payload) => {
			if (!payload || typeof payload !== 'object') {
				return;
			}
			const nonceInput = form.querySelector('input[name="nonce"]');
			const tokenInput = form.querySelector('input[name="scf_form_token"]');
			const timeInput = form.querySelector('input[name="scf_form_time"]');

			if (payload.nonce) {
				if (nonceInput) {
					nonceInput.value = payload.nonce;
				}
				if (window.SCF_FORM) {
					window.SCF_FORM.nonce = payload.nonce;
				}
			}
			if (payload.formToken && tokenInput) {
				tokenInput.value = payload.formToken;
			}
			if (payload.formTime && timeInput) {
				timeInput.value = String(payload.formTime);
			}
			if (payload.honeypotNames && typeof payload.honeypotNames === 'object') {
				const map = {
					website: form.querySelector('#scf-website'),
					company: form.querySelector('#scf-company'),
					url: form.querySelector('#scf-url'),
				};
				Object.keys(map).forEach((key) => {
					const input = map[key];
					const name = payload.honeypotNames[key];
					if (input && name) {
						input.name = name;
						input.value = '';
					}
				});
			}
		};

		const refreshFormSecurity = () => {
			const ajaxUrl = (window.SCF_FORM && window.SCF_FORM.ajaxUrl) || '';
			if (!ajaxUrl) {
				return Promise.resolve();
			}
			const body = new FormData();
			body.append('action', 'scf_refresh_form_security');
			return fetch(ajaxUrl, {
				method: 'POST',
				credentials: 'same-origin',
				body,
			})
				.then((response) => response.json())
				.then((data) => {
					if (data && data.success && data.data) {
						applySecurityPayload(data.data);
					}
				})
				.catch(() => {
					// Keep rendered tokens; submit will still attempt with them.
				});
		};

		securityReady = refreshFormSecurity();

		const waitForRecaptcha = (timeoutMs = 8000) => {
			const siteKey = SCF_FORM && SCF_FORM.recaptchaSiteKey;
			if (!siteKey) {
				return Promise.reject(new Error('Missing reCAPTCHA site key'));
			}

			const whenReady = () =>
				new Promise((resolve, reject) => {
					if (typeof window.grecaptcha === 'undefined' || typeof window.grecaptcha.ready !== 'function') {
						reject(new Error('grecaptcha unavailable'));
						return;
					}
					window.grecaptcha.ready(() => resolve(window.grecaptcha));
				});

			if (typeof window.grecaptcha !== 'undefined') {
				return whenReady();
			}

			return new Promise((resolve, reject) => {
				const existing = document.querySelector('script[src*="recaptcha/api.js"]');
				let settled = false;
				const timer = window.setTimeout(() => {
					if (!settled) {
						settled = true;
						reject(new Error('reCAPTCHA load timeout'));
					}
				}, timeoutMs);

				const finish = () => {
					whenReady()
						.then((api) => {
							if (!settled) {
								settled = true;
								window.clearTimeout(timer);
								resolve(api);
							}
						})
						.catch((err) => {
							if (!settled) {
								settled = true;
								window.clearTimeout(timer);
								reject(err);
							}
						});
				};

				const poll = window.setInterval(() => {
					if (typeof window.grecaptcha !== 'undefined') {
						window.clearInterval(poll);
						finish();
					}
				}, 100);

				if (!existing) {
					const script = document.createElement('script');
					script.src = 'https://www.google.com/recaptcha/api.js?render=' + encodeURIComponent(siteKey);
					script.async = true;
					script.onerror = () => {
						window.clearInterval(poll);
						if (!settled) {
							settled = true;
							window.clearTimeout(timer);
							reject(new Error('reCAPTCHA script failed'));
						}
					};
					document.head.appendChild(script);
				}
			});
		};

		const params = new URLSearchParams(window.location.search);

		const readCookie = (name) => {
			const match = document.cookie.match(
				new RegExp('(?:^|; )' + name.replace(/([.$?*|{}()[\]\\/+^])/g, '\\$1') + '=([^;]*)')
			);
			return match ? decodeURIComponent(match[1]) : '';
		};

		const inferSourceFromReferrer = (refUrl) => {
			try {
				if (!refUrl) {
					return '';
				}
				const host = String(new URL(refUrl).hostname || '').toLowerCase();
				if (!host) {
					return '';
				}
				const siteHost = String(window.location.hostname || '').toLowerCase();
				if (siteHost && (host === siteHost || host.indexOf(siteHost) !== -1)) {
					return '';
				}
				if (host.indexOf('google.') !== -1 || host.indexOf('google') === 0) return 'google';
				if (host.indexOf('bing.') !== -1) return 'bing';
				if (host.indexOf('yahoo.') !== -1) return 'yahoo';
				if (host.indexOf('linkedin.') !== -1 || host.indexOf('lnkd.') !== -1) return 'linkedin';
				if (host.indexOf('youtube.') !== -1 || host.indexOf('youtu.be') !== -1) return 'youtube';
				if (host.indexOf('facebook.') !== -1 || host.indexOf('fb.') !== -1 || host === 'fb.com') return 'facebook';
				if (host.indexOf('instagram.') !== -1) return 'instagram';
				if (host.indexOf('twitter.') !== -1 || host.indexOf('t.co') !== -1 || host === 'x.com') return 'twitter';
			} catch (e) {
				/* ignore bad referrer URLs */
			}
			return '';
		};

		const resolveUtmValue = (field) => {
			const fromUrl = params.get(field);
			if (fromUrl) {
				return fromUrl;
			}
			const fromCookie = readCookie(field);
			if (fromCookie) {
				return fromCookie;
			}
			if (field === 'gclid') {
				return '';
			}
			if (field === 'utm_source') {
				const fromRef =
					inferSourceFromReferrer(readCookie('handl_original_ref')) ||
					inferSourceFromReferrer(readCookie('handl_ref')) ||
					inferSourceFromReferrer(document.referrer);
				if (fromRef) {
					return fromRef;
				}
				return 'direct';
			}
			return '';
		};

		const resolvePageUrlValue = () => {
			let baseUrl;
			try {
				baseUrl = new URL(window.location.href);
			} catch (e) {
				return window.location.href;
			}

			const trackingParams = ['utm_source', 'utm_medium', 'utm_campaign', 'utm_term', 'utm_content', 'gclid'];
			trackingParams.forEach((field) => {
				if (baseUrl.searchParams.get(field)) {
					return;
				}
				const value = resolveUtmValue(field);
				if (!value) {
					return;
				}
				if (field === 'utm_source' && value === 'direct') {
					return;
				}
				baseUrl.searchParams.set(field, value);
			});

			return baseUrl.toString();
		};

		const syncTrackingFields = () => {
			hiddenFields.forEach((field) => {
				const input = form.querySelector(`[name="${field}"]`);
				if (!input) {
					return;
				}
				if (field === 'page_url') {
					input.value = resolvePageUrlValue();
				} else if (field === 'custom_lead_path') {
					input.value = resolveCustomLeadPathValue();
				} else {
					input.value = resolveUtmValue(field);
				}
			});
		};

		const resolveCustomLeadPathValue = () => {
			const readCookie = () => {
				try {
					const match = document.cookie.match(/(?:^|; )scf_custom_lead_path=([^;]*)/);
					return match ? decodeURIComponent(match[1]) : '';
				} catch (e) {
					return '';
				}
			};

			const readPageSegment = () => {
				if (window.SCF_FORM && window.SCF_FORM.pageSegment) {
					return window.SCF_FORM.pageSegment;
				}
				if (window.SCF_CTA_PATH_CONFIG && window.SCF_CTA_PATH_CONFIG.pageSegment) {
					return window.SCF_CTA_PATH_CONFIG.pageSegment;
				}
				const meta = document.querySelector('meta[name="scf-page-journey"]');
				return meta ? meta.getAttribute('content') || '' : '';
			};

			const appendPageSegment = (path, pageSegment) => {
				if (!pageSegment) {
					return path;
				}
				if (!path) {
					return pageSegment;
				}
				const parts = path.split('>');
				if (parts[parts.length - 1] === pageSegment) {
					return path;
				}
				return path + '>' + pageSegment;
			};

			let path = '';
			if (window.SCF_CTA_PATH && typeof window.SCF_CTA_PATH.getPath === 'function') {
				path = window.SCF_CTA_PATH.getPath() || '';
			}
			if (!path) {
				try {
					path = sessionStorage.getItem('custom_lead_path') || '';
					if (!path) {
						path = sessionStorage.getItem('cta_path') || '';
					}
				} catch (e) {
					path = '';
				}
			}
			if (!path) {
				path = readCookie();
			}

			return appendPageSegment(path, readPageSegment());
		};

		syncTrackingFields();

		const setResponse = (message, isError = false) => {
			if (!responseNode) {
				return;
			}
			responseNode.textContent = message || '';
			responseNode.className = 'scf-response';
			if (message) {
				responseNode.classList.add(isError ? 'scf-error' : 'scf-success');
				responseNode.hidden = false;
			} else {
				responseNode.hidden = true;
			}
		};

		// Keep the status area collapsed until there is a real message.
		setResponse('');

		const validateCourseInterestGroup = () => {
			if (!courseInterestCheckboxes.length) {
				return;
			}
			const hasSelection = Array.from(courseInterestCheckboxes).some((input) => input.checked);
			const firstCheckbox = courseInterestCheckboxes[0];
			if (firstCheckbox && typeof firstCheckbox.setCustomValidity === 'function') {
				firstCheckbox.setCustomValidity(hasSelection ? '' : 'Please select at least one option.');
			}
		};

		const toggleOtherCourseHint = () => {
			if (!otherCourseHintNodes.length) {
				return;
			}
			const showHint = Array.from(courseInterestCheckboxes).some((input) => {
				return input.checked && String(input.value || '').trim().toLowerCase() === 'others';
			});
			otherCourseHintNodes.forEach((node) => {
				node.classList.toggle('is-hidden', !showHint);
			});
		};

		validateCourseInterestGroup();
		toggleOtherCourseHint();
		courseInterestCheckboxes.forEach((input) => {
			input.addEventListener('change', () => {
				validateCourseInterestGroup();
				toggleOtherCourseHint();
			});
		});

		const validateEmailDomain = (email) => {
			if (!email || !email.includes('@')) {
				return { valid: false, message: 'Please enter a valid organizational email id.' };
			}

			const emailParts = email.split('@');
			if (emailParts.length !== 2) {
				return { valid: false, message: 'Please enter a valid organizational email id.' };
			}

			const domain = emailParts[1].toLowerCase().trim();

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
				'aim.com', 'rocketmail.com',
			];

			if (commonProviders.includes(domain)) {
				return { valid: false, message: 'Please enter an organizational email id.' };
			}

			const fakeDomains = [
				'abc.com', 'test.com', 'test.net', 'test.org',
				'example.com', 'example.net', 'example.org',
				'fake.com', 'fake.net', 'fake.org',
				'invalid.com', 'invalid.net', 'invalid.org',
				'dummy.com', 'dummy.net', 'dummy.org',
				'sample.com', 'sample.net', 'sample.org',
				'demo.com', 'demo.net', 'demo.org',
				'localhost.com', 'localhost.net',
				'nonexistent.com', 'nonexistent.net', 'nonexistent.org',
			];

			if (fakeDomains.includes(domain)) {
				return { valid: false, message: 'Please enter a valid organizational email id.' };
			}

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

		const applyEmailCustomValidity = (input) => {
			if (!input || input.type !== 'email') {
				if (input && typeof input.setCustomValidity === 'function') {
					// Keep native required / minlength messages for non-email fields.
					if (input.id !== 'scf-email') {
						input.setCustomValidity('');
					}
				}
				return;
			}

			const value = String(input.value || '').trim();
			if (!value) {
				// Empty required email → native browser message.
				input.setCustomValidity('');
				return;
			}

			const emailValidation = validateEmailDomain(value);
			input.setCustomValidity(emailValidation.valid ? '' : emailValidation.message);
		};

		const clearFieldErrorUi = (input) => {
			const field = input.closest('.scf-field');
			if (!field) return;
			const errorSpan = field.querySelector('.scf-error-message');
			if (errorSpan) {
				errorSpan.textContent = '';
			}
			input.style.borderColor = '';
		};

		// Popups often close on bubbled clicks; stop submit button from bubbling.
		if (submitBtn) {
			submitBtn.addEventListener(
				'click',
				(e) => {
					e.stopPropagation();
				},
				true
			);
		}

		form.addEventListener('submit', async (event) => {
			event.preventDefault();
			event.stopPropagation();

			const inputs = form.querySelectorAll('input, textarea, select');
			inputs.forEach((input) => {
				clearFieldErrorUi(input);
				applyEmailCustomValidity(input);
			});

			// Use the browser's default required / minlength messages under the field.
			if (!form.checkValidity()) {
				form.reportValidity();
				return;
			}

			const currentTime = Math.floor(Date.now() / 1000);
			const timeSinceLastSubmission = currentTime - lastSubmissionTime;
			const timeSinceFormLoad = currentTime - formLoadTime;

			if (timeSinceFormLoad < 5) {
				setResponse('Please take your time to fill out the form properly.', true);
				return;
			}

			if (lastSubmissionTime > 0 && timeSinceLastSubmission < minTimeBetweenSubmissions) {
				setResponse('Please wait at least ' + minTimeBetweenSubmissions + ' seconds before submitting again.', true);
				return;
			}

			setResponse('');
			if (submitBtn) {
				submitBtn.disabled = true;
				submitBtn.classList.add('is-loading');
			}

			const submitText = submitBtn ? submitBtn.querySelector('.scf-submit-text') : null;
			const submitLoading = submitBtn ? submitBtn.querySelector('.scf-submit-loading') : null;
			if (submitText) submitText.style.display = 'none';
			if (submitLoading) submitLoading.style.display = 'inline-flex';

			const resetSubmitState = () => {
				if (submitBtn) {
					submitBtn.disabled = false;
					submitBtn.classList.remove('is-loading');
				}
				if (submitText) submitText.style.display = '';
				if (submitLoading) submitLoading.style.display = 'none';
			};

			if (securityReady) {
				try {
					await securityReady;
				} catch (e) {
					/* ignore */
				}
			}

			let recaptchaToken = '';
			if (requiresRecaptcha) {
				try {
					const recaptcha = await waitForRecaptcha();
					recaptchaToken = await recaptcha.execute(SCF_FORM.recaptchaSiteKey, { action: SCF_FORM.recaptchaAction || 'submit' });
				} catch (error) {
					console.error('reCAPTCHA error:', error);
				}
			}

			// Ensure timing field is set before FormData is built.
			const formTimeInput = form.querySelector('[name="scf_form_time"]');
			if (formTimeInput) {
				formTimeInput.value = String(formLoadTime);
			}

			if (window.SCF_CTA_PATH && typeof window.SCF_CTA_PATH.populateFormFields === 'function') {
				window.SCF_CTA_PATH.populateFormFields();
			}

			syncTrackingFields();

			// Password managers sometimes autofill honeypots; clear them for real users.
			form.querySelectorAll('.scf-honeypot input').forEach((input) => {
				input.value = '';
			});

			const formData = new FormData(form);
			formData.set('action', 'scf_submit_form');
			formData.set('custom_lead_path', resolveCustomLeadPathValue());
			formData.set('page_url', resolvePageUrlValue());
			['utm_source', 'utm_medium', 'utm_campaign', 'utm_term', 'utm_content'].forEach((field) => {
				formData.set(field, resolveUtmValue(field));
			});

			const nonceFromForm = form.querySelector('input[name="nonce"]');
			const nonceValue =
				(nonceFromForm && nonceFromForm.value) ||
				(window.SCF_FORM && window.SCF_FORM.nonce) ||
				'';
			formData.set('nonce', nonceValue);

			if (recaptchaToken) {
				formData.set('recaptcha_token', recaptchaToken);
			}

			const postSubmission = async (data) => {
				const ajaxUrl = (SCF_FORM && SCF_FORM.ajaxUrl) || '';
				if (!ajaxUrl) {
					throw new Error('AJAX URL not configured');
				}
				const response = await fetch(ajaxUrl, {
					method: 'POST',
					credentials: 'same-origin',
					body: data,
				});

				const extractJsonObject = (raw) => {
					const text = raw ? String(raw).trim() : '';
					if (!text) {
						return {};
					}
					try {
						return JSON.parse(text);
					} catch (firstError) {
						// Recover when notices/HTML wrap or follow the JSON payload.
						const startIndex = text.indexOf('{');
						if (startIndex === -1) {
							throw firstError;
						}
						let depth = 0;
						let inString = false;
						let escaped = false;
						for (let i = startIndex; i < text.length; i += 1) {
							const ch = text[i];
							if (inString) {
								if (escaped) {
									escaped = false;
								} else if (ch === '\\') {
									escaped = true;
								} else if (ch === '"') {
									inString = false;
								}
								continue;
							}
							if (ch === '"') {
								inString = true;
								continue;
							}
							if (ch === '{') {
								depth += 1;
							} else if (ch === '}') {
								depth -= 1;
								if (depth === 0) {
									return JSON.parse(text.slice(startIndex, i + 1));
								}
							}
						}
						throw firstError;
					}
				};

				let result;
				try {
					const text = await response.text();
					result = extractJsonObject(text);
				} catch (parseErr) {
					throw new Error(
						(SCF_FORM && SCF_FORM.messages && SCF_FORM.messages.error) ||
							'Something went wrong. Please try again.'
					);
				}
				return { response, result };
			};

			const rebuildFormData = () => {
				if (formTimeInput) {
					formTimeInput.value = String(formLoadTime);
				}
				form.querySelectorAll('.scf-honeypot input').forEach((input) => {
					input.value = '';
				});
				syncTrackingFields();
				const data = new FormData(form);
				data.set('action', 'scf_submit_form');
				data.set('page_url', resolvePageUrlValue());
				['utm_source', 'utm_medium', 'utm_campaign', 'utm_term', 'utm_content'].forEach((field) => {
					data.set(field, resolveUtmValue(field));
				});
				const nonceFromFormRetry = form.querySelector('input[name="nonce"]');
				const nonceRetry =
					(nonceFromFormRetry && nonceFromFormRetry.value) ||
					(window.SCF_FORM && window.SCF_FORM.nonce) ||
					'';
				data.set('nonce', nonceRetry);
				if (recaptchaToken) {
					data.set('recaptcha_token', recaptchaToken);
				}
				return data;
			};

			const isSecurityFailure = (message) => {
				const msg = String(message || '').toLowerCase();
				return (
					msg.includes('security check failed') ||
					msg.includes('security verification') ||
					msg.includes('form session has expired') ||
					msg.includes('refresh the page')
				);
			};

			try {
				let { response, result } = await postSubmission(formData);

				if (
					(!response.ok || !result.success) &&
					isSecurityFailure(result && result.data && result.data.message)
				) {
					await refreshFormSecurity();
					({ response, result } = await postSubmission(rebuildFormData()));
				}

				if (!response.ok || !result.success) {
					const errorMsg =
						(result && result.data && result.data.message) ||
						(SCF_FORM && SCF_FORM.messages && SCF_FORM.messages.error) ||
						'Something went wrong. Please try again.';
					throw new Error(errorMsg);
				}

				lastSubmissionTime = Math.floor(Date.now() / 1000);

				const successMsg =
					(result && result.data && result.data.message) ||
					(SCF_FORM && SCF_FORM.messages && SCF_FORM.messages.success) ||
					'Thank you! Our team will contact you soon.';

				// Show success immediately, then reset the form.
				setResponse(successMsg, false);
				resetSubmitState();

				const savedFormTime = formTimeInput ? formTimeInput.value : formLoadTime;

				form.reset();
				validateCourseInterestGroup();
				toggleOtherCourseHint();

				if (formTimeInput) {
					formTimeInput.value = savedFormTime;
				}

				syncTrackingFields();

				const errorMessages = form.querySelectorAll('.scf-error-message');
				errorMessages.forEach((el) => {
					el.textContent = '';
				});

				securityReady = refreshFormSecurity();

			} catch (error) {
				const errorMsg =
					error.message ||
					(SCF_FORM && SCF_FORM.messages && SCF_FORM.messages.error) ||
					'Something went wrong. Please try again.';

				const emailInput = form.querySelector('#scf-email');
				if (emailInput && (errorMsg.includes('organizational email') || errorMsg.includes('organizational mailid'))) {
					const emailField = emailInput.closest('.scf-field');
					const errorSpan = emailField ? emailField.querySelector('.scf-error-message') : null;
					if (errorSpan) {
						errorSpan.textContent = errorMsg;
						emailInput.style.borderColor = '#dc2626';
						emailInput.setCustomValidity(errorMsg);
						emailInput.reportValidity();
					}
				} else {
					setResponse(errorMsg, true);
				}

			} finally {
				if (submitBtn) {
					submitBtn.disabled = false;
					submitBtn.classList.remove('is-loading');
				}
				if (submitText) submitText.style.display = '';
				if (submitLoading) submitLoading.style.display = 'none';
			}
		});

		const inputs = form.querySelectorAll('input, textarea, select');
		inputs.forEach((input) => {
			const refreshValidity = () => {
				clearFieldErrorUi(input);
				applyEmailCustomValidity(input);
			};

			input.addEventListener('input', refreshValidity);
			input.addEventListener('change', refreshValidity);
		});
	};

	const scanAndInit = () => {
		document.querySelectorAll('form.scf-form').forEach(initScfForm);
	};

	let domScanTimer = null;
	const scheduleScanAndInit = () => {
		if (domScanTimer) {
			clearTimeout(domScanTimer);
		}
		domScanTimer = setTimeout(() => {
			domScanTimer = null;
			scanAndInit();
		}, 120);
	};

	const maybeScheduleInitForAddedNodes = (mutations) => {
		for (const m of mutations) {
			for (const n of m.addedNodes) {
				if (n.nodeType !== 1) {
					continue;
				}
				if (n.matches && n.matches('form.scf-form')) {
					scheduleScanAndInit();
					return;
				}
				if (n.querySelector && n.querySelector('form.scf-form')) {
					scheduleScanAndInit();
					return;
				}
			}
		}
	};

	const startMutationObserver = () => {
		if (typeof MutationObserver === 'undefined' || !document.body) {
			return;
		}
		const observer = new MutationObserver(maybeScheduleInitForAddedNodes);
		observer.observe(document.body, { childList: true, subtree: true });
	};

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', () => {
			scanAndInit();
			startMutationObserver();
		});
	} else {
		scanAndInit();
		startMutationObserver();
	}

	// Popups / modals: also callable when the popup opens (in case MutationObserver is blocked).
	window.scfInitContactForms = scanAndInit;
})();
