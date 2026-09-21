/**
 * SucceedLEARN CTA journey tracker (AMP amp-script sandbox).
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
				return sessionStorage.getItem(STORAGE_KEY) || '';
			} catch (e) {
				return '';
			}
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
		},
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
		const field = document.getElementById('scf-custom-lead-path');
		if (field) {
			field.value = path;
		}
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

	const bindFormHandlers = () => {
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

	recordPageView();
	document.addEventListener('click', handleClick, false);
	populateFormFields();
	bindFormHandlers();

	if (typeof MutationObserver !== 'undefined' && document.body) {
		const observer = new MutationObserver(() => {
			populateFormFields();
			bindFormHandlers();
		});
		observer.observe(document.body, { childList: true, subtree: true });
	}
})();
