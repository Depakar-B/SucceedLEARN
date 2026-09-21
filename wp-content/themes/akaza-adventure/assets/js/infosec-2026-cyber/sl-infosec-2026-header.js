(function () {
	'use strict';

	var header = document.getElementById('sl-infosec-header');
	if (!header) {
		return;
	}

	var hideAfter = 120;
	var distanceThreshold = 56;
	var toggleCooldown = 280;
	var lastY = window.scrollY || document.documentElement.scrollTop || 0;
	var ticking = false;
	var hidden = false;
	var downDistance = 0;
	var upDistance = 0;
	var lastToggleAt = 0;
	var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)');

	function setHidden(state) {
		if (hidden === state) {
			return;
		}

		hidden = state;
		header.classList.toggle('is-hidden', state);
		document.body.classList.toggle('sl-infosec-header-is-hidden', state);
	}

	function resetScrollTracking() {
		downDistance = 0;
		upDistance = 0;
	}

	function canToggleHeader() {
		return Date.now() - lastToggleAt >= toggleCooldown;
	}

	function onScrollFrame() {
		ticking = false;

		if (reduceMotion.matches) {
			setHidden(false);
			return;
		}

		var y = window.scrollY || document.documentElement.scrollTop || 0;
		var delta = y - lastY;

		if (y <= hideAfter) {
			setHidden(false);
			resetScrollTracking();
			lastY = y;
			return;
		}

		if (delta > 0) {
			downDistance += delta;
			upDistance = 0;

			if (canToggleHeader() && downDistance >= distanceThreshold) {
				setHidden(true);
				downDistance = 0;
				lastToggleAt = Date.now();
			}
		} else if (delta < 0) {
			upDistance += Math.abs(delta);
			downDistance = 0;

			if (canToggleHeader() && upDistance >= distanceThreshold) {
				setHidden(false);
				upDistance = 0;
				lastToggleAt = Date.now();
			}
		}

		lastY = y;
	}

	function onScroll() {
		if (!ticking) {
			ticking = true;
			window.requestAnimationFrame(onScrollFrame);
		}
	}

	window.addEventListener('scroll', onScroll, { passive: true });

	var links = document.querySelectorAll(
		'.sl-infosec-header a[href^="#"], .sl-infosec-2026-cyber-hero a[href^="#"]'
	);

	function getScrollOffset() {
		var value = getComputedStyle(document.documentElement).getPropertyValue('--sl-infosec-scroll-offset');
		var parsed = parseInt(value, 10);
		var base = Number.isFinite(parsed) ? parsed : 80;

		if (hidden) {
			return 24;
		}

		return base + 16;
	}

	function scrollToHash(hash, pushState) {
		if (!hash || hash === '#') {
			return;
		}

		var id = hash.slice(1);
		var target = document.getElementById(id);
		if (!target) {
			return;
		}

		setHidden(false);

		var top = target.getBoundingClientRect().top + window.pageYOffset - getScrollOffset();

		window.scrollTo({
			top: Math.max(top, 0),
			behavior: reduceMotion.matches ? 'auto' : 'smooth',
		});

		if (pushState !== false && history.replaceState) {
			history.replaceState(null, '', hash);
		}

		target.setAttribute('tabindex', '-1');
		target.focus({ preventScroll: true });
	}

	links.forEach(function (link) {
		link.addEventListener('click', function (event) {
			var href = link.getAttribute('href');
			if (!href || href.charAt(0) !== '#') {
				return;
			}

			var target = document.getElementById(href.slice(1));
			if (!target) {
				return;
			}

			event.preventDefault();
			scrollToHash(href, true);
		});
	});

	if (window.location.hash) {
		window.requestAnimationFrame(function () {
			scrollToHash(window.location.hash, false);
		});
	}
})();
