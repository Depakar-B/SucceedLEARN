/**
 * SucceedLEARN — Code of Conduct stats counters.
 */

document.addEventListener('DOMContentLoaded', function () {
	'use strict';

	const section = document.querySelector('.sl-coc-stats');

	if (!section) {
		return;
	}

	const counters = section.querySelectorAll('.sl-coc-stats__counter');

	if (!counters.length) {
		return;
	}

	const prefersReducedMotion = window.matchMedia(
		'(prefers-reduced-motion: reduce)'
	).matches;

	function formatValue(value, format) {
		if (format === 'million') {
			const millions = value / 1000000;
			return millions.toFixed(1).replace(/\.0$/, '') + 'M';
		}

		return String(Math.round(value));
	}

	function setCounterValue(counter, value) {
		const format = counter.getAttribute('data-format') || 'plain';
		counter.textContent = formatValue(value, format);
	}

	function animateCounter(counter) {
		const target = parseFloat(counter.getAttribute('data-target'), 10);
		const format = counter.getAttribute('data-format') || 'plain';

		if (!target || Number.isNaN(target)) {
			return;
		}

		if (prefersReducedMotion) {
			setCounterValue(counter, target);
			return;
		}

		const duration = 2000;
		const startTime = performance.now();

		function tick(now) {
			const progress = Math.min((now - startTime) / duration, 1);
			const eased = 1 - Math.pow(1 - progress, 3);
			const current = target * eased;

			setCounterValue(counter, current);

			if (progress < 1) {
				requestAnimationFrame(tick);
			} else {
				setCounterValue(counter, target);
			}
		}

		setCounterValue(counter, 0);
		requestAnimationFrame(tick);
	}

	if (!('IntersectionObserver' in window) || prefersReducedMotion) {
		counters.forEach(function (counter) {
			const target = parseFloat(counter.getAttribute('data-target'), 10);

			if (target && !Number.isNaN(target)) {
				setCounterValue(counter, target);
			}
		});
		return;
	}

	const observer = new IntersectionObserver(
		function (entries) {
			entries.forEach(function (entry) {
				if (!entry.isIntersecting) {
					return;
				}

				animateCounter(entry.target);
				observer.unobserve(entry.target);
			});
		},
		{
			threshold: 0.35,
		}
	);

	counters.forEach(function (counter) {
		observer.observe(counter);
	});
});
