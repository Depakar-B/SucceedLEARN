(() => {
	const initSsfForm = (form) => {
		if (!form || form.getAttribute('data-ssf-initialized') === '1') {
			return;
		}
		form.setAttribute('data-ssf-initialized', '1');

		const responseNode = form.querySelector('.ssf-response');
		const submitBtn = form.querySelector('.ssf-submit');
		const hiddenFields = ['utm_source', 'utm_medium', 'utm_campaign', 'utm_term', 'utm_content', 'page_url'];

		const formLoadTime = Math.floor(Date.now() / 1000);
		let lastSubmissionTime = 0;
		const minTimeBetweenSubmissions = 5;

		const params = new URLSearchParams(window.location.search);
		hiddenFields.forEach((field) => {
			const input = form.querySelector(`[name="${field}"]`);
			if (!input) return;
			input.value = field === 'page_url' ? window.location.href : (params.get(field) || '');
		});

		const setResponse = (message, isError = false) => {
			if (!responseNode) return;
			responseNode.textContent = message;
			responseNode.className = 'ssf-response';
			if (message) {
				responseNode.classList.add(isError ? 'ssf-error' : 'ssf-success');
				responseNode.style.display = 'block';
			} else {
				responseNode.style.display = 'none';
			}
		};

		if (submitBtn) {
			submitBtn.addEventListener('click', (e) => e.stopPropagation(), true);
		}

		form.addEventListener('submit', async (event) => {
			event.preventDefault();
			event.stopPropagation();

			// Native browser validation tooltips (no custom under-field errors).
			if (!form.checkValidity()) {
				form.reportValidity();
				return;
			}

			const currentTime = Math.floor(Date.now() / 1000);
			if (currentTime - formLoadTime < 3) {
				setResponse('Please take a moment to complete the form.', true);
				return;
			}
			if (lastSubmissionTime > 0 && currentTime - lastSubmissionTime < minTimeBetweenSubmissions) {
				setResponse(`Please wait ${minTimeBetweenSubmissions} seconds before submitting again.`, true);
				return;
			}

			setResponse('');
			if (submitBtn) {
				submitBtn.disabled = true;
				submitBtn.classList.add('is-loading');
			}

			const submitText = submitBtn ? submitBtn.querySelector('.ssf-submit-text') : null;
			const submitLoading = submitBtn ? submitBtn.querySelector('.ssf-submit-loading') : null;
			if (submitText) submitText.style.display = 'none';
			if (submitLoading) submitLoading.style.display = 'inline-flex';

			const formData = new FormData(form);
			const formTimeInput = form.querySelector('[name="ssf_form_time"]');
			if (formTimeInput) formTimeInput.value = formLoadTime;

			formData.append('action', 'ssf_submit_form');
			formData.append('nonce', (SSF_FORM && SSF_FORM.nonce) || '');

			try {
				const ajaxUrl = (SSF_FORM && SSF_FORM.ajaxUrl) || '';
				if (!ajaxUrl) throw new Error('AJAX URL not configured');

				const response = await fetch(ajaxUrl, {
					method: 'POST',
					credentials: 'same-origin',
					body: formData,
				});

				const extractJsonObject = (raw) => {
					// Strip UTF-8 BOM / zero-width noise theme files may prepend to AJAX output.
					let text = raw ? String(raw).replace(/^\uFEFF+/, '').trim() : '';
					if (!text) {
						return {};
					}
					try {
						return JSON.parse(text);
					} catch (firstError) {
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
				} catch {
					throw new Error((SSF_FORM && SSF_FORM.messages && SSF_FORM.messages.error) || 'Something went wrong.');
				}

				if (!response.ok || !result.success) {
					throw new Error(
						(result && result.data && result.data.message) ||
						(SSF_FORM && SSF_FORM.messages && SSF_FORM.messages.error) ||
						'Something went wrong.'
					);
				}

				lastSubmissionTime = Math.floor(Date.now() / 1000);
				const successMsg =
					(result && result.data && result.data.message) ||
					(SSF_FORM && SSF_FORM.messages && SSF_FORM.messages.success) ||
					'Thank you!';

				setResponse(successMsg, false);
				form.reset();

				hiddenFields.forEach((field) => {
					const input = form.querySelector(`[name="${field}"]`);
					if (!input) return;
					input.value = field === 'page_url' ? window.location.href : (params.get(field) || '');
				});
			} catch (error) {
				setResponse(error.message || 'Something went wrong. Please try again.', true);
			} finally {
				if (submitBtn) {
					submitBtn.disabled = false;
					submitBtn.classList.remove('is-loading');
				}
				if (submitText) submitText.style.display = '';
				if (submitLoading) submitLoading.style.display = 'none';
			}
		});
	};

	const scanAndInit = () => {
		document.querySelectorAll('form.ssf-form').forEach(initSsfForm);
	};

	let domScanTimer = null;
	const scheduleScanAndInit = () => {
		if (domScanTimer) clearTimeout(domScanTimer);
		domScanTimer = setTimeout(() => {
			domScanTimer = null;
			scanAndInit();
		}, 120);
	};

	const startMutationObserver = () => {
		if (typeof MutationObserver === 'undefined' || !document.body) return;
		const observer = new MutationObserver((mutations) => {
			for (const m of mutations) {
				for (const n of m.addedNodes) {
					if (n.nodeType !== 1) continue;
					if ((n.matches && n.matches('form.ssf-form')) || (n.querySelector && n.querySelector('form.ssf-form'))) {
						scheduleScanAndInit();
						return;
					}
				}
			}
		});
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

	window.ssfInitSeoForms = scanAndInit;
})();
