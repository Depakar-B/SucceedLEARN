/**
 * SucceedLEARN Email CTA — desktop AJAX submit.
 */
(function () {
	'use strict';

	var cfg = window.SL_ECTA || {};
	var ajaxUrl = cfg.ajaxUrl || '/wp-admin/admin-ajax.php';
	var messages = cfg.messages || {};
	var utmFields = ['utm_source', 'utm_medium', 'utm_campaign', 'utm_term', 'utm_content'];

	function getCookie(name) {
		var match = document.cookie.match(new RegExp('(?:^|; )' + name.replace(/([.$?*|{}()[\]\\/+^])/g, '\\$1') + '=([^;]*)'));
		return match ? decodeURIComponent(match[1]) : '';
	}

	function fillTrackingFields(form) {
		if (!form) {
			return;
		}
		var params = new URLSearchParams(window.location.search);
		var pageUrlInput = form.querySelector('input[name="page_url"]');
		if (pageUrlInput) {
			pageUrlInput.value = window.location.href;
		}
		utmFields.forEach(function (field) {
			var input = form.querySelector('input[name="' + field + '"]');
			if (!input) {
				return;
			}
			var fromUrl = params.get(field) || '';
			var fromCookie = getCookie(field) || '';
			input.value = fromUrl || fromCookie || input.value || '';
		});
	}

	function isValidEmail(value) {
		return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(String(value || '').trim());
	}

	function setLoading(form, loading) {
		var btn = form.querySelector('.sl-ecta-submit');
		var text = form.querySelector('.sl-ecta-submit-text');
		var loadingEl = form.querySelector('.sl-ecta-submit-loading');
		if (!btn) {
			return;
		}
		btn.disabled = !!loading;
		if (text) {
			text.hidden = !!loading;
		}
		if (loadingEl) {
			loadingEl.hidden = !loading;
		}
	}

	function showError(form, message) {
		var el = form.querySelector('.sl-ecta-response');
		if (!el) {
			return;
		}
		el.textContent = message || messages.error || 'Something went wrong.';
		el.classList.add('is-error');
	}

	function showSuccess(wrap, message) {
		var form = wrap.querySelector('.sl-ecta-form');
		var success = wrap.querySelector('.sl-ecta-success');
		var msgEl = wrap.querySelector('.sl-ecta-success-message');
		if (form) {
			form.hidden = true;
		}
		if (success) {
			success.hidden = false;
		}
		if (msgEl) {
			msgEl.textContent = message || messages.success || 'Thank you!';
		}
	}

	function onSubmit(event) {
		var form = event.target;
		if (!form || !form.classList.contains('sl-ecta-form')) {
			return;
		}
		event.preventDefault();

		var wrap = form.closest('[data-sl-ecta]');
		var emailInput = form.querySelector('.sl-ecta-email');
		var email = emailInput ? String(emailInput.value || '').trim() : '';

		if (!isValidEmail(email)) {
			showError(form, messages.invalid || 'Please enter a valid email address.');
			if (emailInput) {
				emailInput.focus();
			}
			return;
		}

		var responseEl = form.querySelector('.sl-ecta-response');
		if (responseEl) {
			responseEl.textContent = '';
			responseEl.classList.remove('is-error');
		}

		fillTrackingFields(form);
		setLoading(form, true);

		var formData = new FormData(form);
		formData.set('page_url', window.location.href);

		fetch(ajaxUrl, {
			method: 'POST',
			credentials: 'same-origin',
			body: formData,
		})
			.then(function (res) {
				return res.json().then(function (data) {
					return { ok: res.ok, status: res.status, data: data };
				});
			})
			.then(function (result) {
				var data = result.data || {};
				var msg =
					data.message ||
					(data.data && data.data.message) ||
					'';

				if (result.ok && data.success) {
					showSuccess(wrap || form.parentNode, msg || messages.success);
					return;
				}

				showError(form, msg || messages.error);
			})
			.catch(function () {
				showError(form, messages.error);
			})
			.finally(function () {
				setLoading(form, false);
			});
	}

	function bind(root) {
		var forms = (root || document).querySelectorAll('.sl-ecta-form');
		forms.forEach(function (form) {
			if (form.getAttribute('action-xhr')) {
				return; // AMP form — do not bind JS
			}
			if (form.dataset.slEctaBound === '1') {
				return;
			}
			form.dataset.slEctaBound = '1';
			fillTrackingFields(form);
			form.addEventListener('submit', onSubmit);
		});
	}

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', function () {
			bind(document);
		});
	} else {
		bind(document);
	}
})();
