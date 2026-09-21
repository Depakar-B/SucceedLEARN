/**
 * SucceedLEARN CTA journey tracker (non-AMP).
 * Records page views + [data-cta] clicks into sessionStorage.
 */
(function () {
	'use strict';

	const STORAGE_KEY = 'custom_lead_path';
	const COOKIE_KEY = 'scf_custom_lead_path';
	const MAX_TOTAL_LENGTH = 500;
	const MAX_SEGMENT_LENGTH = 64;
	const SEGMENT_PATTERN = /^[a-z0-9_-]+$/;

	const safeStorage = {
		get() {
			try {
				const fromSession = sessionStorage.getItem(STORAGE_KEY) || '';
				if (fromSession) {
					return fromSession;
				}
			} catch (e) {
				/* storage unavailable */
			}
			return readCookie();
		},
		set(value) {
			try {
				if (value) {
					sessionStorage.setItem(STORAGE_KEY, value);
				} else {
					sessionStorage.removeItem(STORAGE_KEY);
				}
			} catch (e) {
				/* storage unavailable */
			}
			writeCookie(value);
		},
	};

	const readCookie = () => {
		try {
			const match = document.cookie.match(new RegExp('(?:^|; )' + COOKIE_KEY + '=([^;]*)'));
			return match ? decodeURIComponent(match[1]) : '';
		} catch (e) {
			return '';
		}
	};

	const writeCookie = (value) => {
		try {
			if (!value) {
				document.cookie = COOKIE_KEY + '=; path=/; Max-Age=0; SameSite=Lax';
				return;
			}
			document.cookie = COOKIE_KEY + '=' + encodeURIComponent(value) + '; path=/; SameSite=Lax';
		} catch (e) {
			/* cookie unavailable */
		}
	};

	const sanitizeSegment = (raw) => {
		if (typeof raw !== 'string') {
			return '';
		}
		const value = raw.trim().toLowerCase().slice(0, MAX_SEGMENT_LENGTH);
		return SEGMENT_PATTERN.test(value) ? value : '';
	};

	const sanitizePath = (raw) => {
		if (typeof raw !== 'string' || raw === '') {
			return '';
		}
		const segments = raw
			.split('>')
			.map((part) => sanitizeSegment(part))
			.filter(Boolean);
		if (!segments.length) {
			return '';
		}
		let path = segments.join('>');
		if (path.length > MAX_TOTAL_LENGTH) {
			path = path.slice(0, MAX_TOTAL_LENGTH);
		}
		return path;
	};

	const getPath = () => {
		const current = sanitizePath(safeStorage.get());
		if (current) {
			return current;
		}
		try {
			return sanitizePath(sessionStorage.getItem('cta_path') || '');
		} catch (e) {
			return '';
		}
	};

	const appendSegment = (rawValue) => {
		const segment = sanitizeSegment(rawValue);
		if (!segment) {
			return getPath();
		}
		const existing = getPath();
		if (existing === '') {
			safeStorage.set(segment);
			return segment;
		}
		const parts = existing.split('>');
		const last = parts[parts.length - 1];
		if (last === segment) {
			return existing;
		}
		const next = existing + '>' + segment;
		const sanitized = sanitizePath(next);
		safeStorage.set(sanitized);
		return sanitized;
	};

	const readPageSegment = () => {
		if (window.SCF_CTA_PATH_CONFIG && window.SCF_CTA_PATH_CONFIG.pageSegment) {
			return window.SCF_CTA_PATH_CONFIG.pageSegment;
		}
		const meta = document.querySelector('meta[name="scf-page-journey"]');
		return meta ? meta.getAttribute('content') || '' : '';
	};

	const recordPageView = () => {
		const segment = readPageSegment();
		if (segment) {
			appendSegment(segment);
		}
	};

	const populateFormFields = () => {
		const path = getPath();
		document.querySelectorAll('input[name="custom_lead_path"]').forEach((input) => {
			input.value = path;
		});
	};

	const handleClick = (event) => {
		const target = event.target;
		if (!target || typeof target.closest !== 'function') {
			return;
		}
		const cta = target.closest('[data-cta]');
		if (!cta) {
			return;
		}
		const value = cta.getAttribute('data-cta');
		if (!value) {
			return;
		}
		appendSegment(value);
	};

	const bindFormSubmitHandlers = () => {
		document.querySelectorAll('form.scf-form').forEach((form) => {
			if (form.getAttribute('data-scf-cta-bound') === '1') {
				return;
			}
			form.setAttribute('data-scf-cta-bound', '1');
			form.addEventListener(
				'submit',
				() => {
					populateFormFields();
				},
				true
			);
		});
	};

	const init = () => {
		recordPageView();
		document.addEventListener('click', handleClick, false);
		populateFormFields();
		bindFormSubmitHandlers();

		if (typeof MutationObserver !== 'undefined' && document.body) {
			const observer = new MutationObserver(() => {
				populateFormFields();
				bindFormSubmitHandlers();
			});
			observer.observe(document.body, { childList: true, subtree: true });
		}
	};

	window.SCF_CTA_PATH = {
		getPath,
		appendCta: appendSegment,
		appendSegment,
		recordPageView,
		populateFormFields,
		sanitizePath,
	};

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', init);
	} else {
		init();
	}
})();
