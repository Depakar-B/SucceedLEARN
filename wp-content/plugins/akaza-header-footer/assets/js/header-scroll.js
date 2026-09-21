(function () {
	'use strict';

	var config = window.ahfHeaderScroll || {};
	var desktopMin = config.desktopMin || 1201;
	var hideAfter = config.hideAfter || 120;
	var distanceThreshold = config.distanceThreshold || 56;
	var toggleCooldown = config.toggleCooldown || 280;

	var mq = window.matchMedia('(min-width: ' + desktopMin + 'px)');
	var header = null;
	var spacer = null;
	var lastY = 0;
	var ticking = false;
	var hidden = false;
	var booted = false;
	var downDistance = 0;
	var upDistance = 0;
	var lastToggleAt = 0;
	var offsetLocked = false;
	var lockedOffset = 0;

	function getHeader() {
		if (!header) {
			header = document.querySelector('.site-header, .genesis-header');
		}
		return header;
	}

	function getSpacer() {
		return null;
	}

	function syncSpacer() {
		/* Spacer removed — fixed header offset handled without placeholder markup. */
	}

	function isDesktop() {
		return mq.matches;
	}

	function finishBooting() {
		if (booted) {
			return;
		}

		booted = true;
		window.requestAnimationFrame(function () {
			document.documentElement.style.marginTop = '0px';
			document.documentElement.classList.remove('epsh-header-booting');
		});
	}

	function setHidden(state) {
		var node = getHeader();
		if (!node || hidden === state) {
			return;
		}

		if (state) {
			var hideHeight = lockedOffset || Math.ceil(node.offsetHeight || node.getBoundingClientRect().height || 0);
			if (hideHeight > 0) {
				document.documentElement.style.setProperty('--epsh-header-hide-shift', (hideHeight + 8) + 'px');
			}
		} else {
			document.documentElement.style.removeProperty('--epsh-header-hide-shift');
		}

		hidden = state;
		node.classList.toggle('epsh-header-hidden', state);

		if (state) {
			node.classList.remove('epsh-header-scrolled');
			document.body.classList.add('epsh-header-is-hidden');
			document.dispatchEvent(new CustomEvent('epsh-header-hide'));
		} else {
			document.body.classList.remove('epsh-header-is-hidden');
			var y = window.scrollY || document.documentElement.scrollTop || 0;
			setAtTop(y <= hideAfter);
		}
	}

	function setAtTop(state) {
		var node = getHeader();
		if (!node) {
			return;
		}

		node.classList.toggle('epsh-header-at-top', state);
		node.classList.toggle('epsh-header-scrolled', !state && !hidden);
	}

	function updateOffset(force) {
		document.documentElement.style.marginTop = '0px';

		if (!isDesktop()) {
			document.documentElement.style.removeProperty('--epsh-desktop-header-offset');
			lockedOffset = 0;
			offsetLocked = false;
			syncSpacer(0);
			setHidden(false);
			setAtTop(true);
			finishBooting();
			return;
		}

		if (offsetLocked && !force) {
			syncSpacer(lockedOffset);
			finishBooting();
			return;
		}

		var node = getHeader();
		if (!node) {
			finishBooting();
			return;
		}

		// offsetHeight ignores transform, so spacer stays stable while header is hidden.
		var offset = Math.ceil(node.offsetHeight || 0);
		if (offset < 1) {
			finishBooting();
			return;
		}

		if (force || Math.abs(lockedOffset - offset) > 2) {
			lockedOffset = offset;
			document.documentElement.style.setProperty('--epsh-desktop-header-offset', offset + 'px');
		}

		syncSpacer(lockedOffset);
		offsetLocked = true;
		finishBooting();
	}

	function resetScrollTracking() {
		downDistance = 0;
		upDistance = 0;
	}

	function canToggleHeader() {
		return (Date.now() - lastToggleAt) >= toggleCooldown;
	}

	function onScrollFrame() {
		ticking = false;

		if (!isDesktop()) {
			return;
		}

		var y = window.scrollY || document.documentElement.scrollTop || 0;
		var delta = y - lastY;

		if (y <= hideAfter) {
			setHidden(false);
			setAtTop(true);
			resetScrollTracking();
			lastY = y;
			return;
		}

		setAtTop(false);

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

	function onMqChange() {
		offsetLocked = false;
		lastY = window.scrollY || document.documentElement.scrollTop || 0;
		resetScrollTracking();
		updateOffset(true);
		onScrollFrame();
	}

	function init() {
		if (!getHeader()) {
			finishBooting();
			return;
		}

		lastY = window.scrollY || document.documentElement.scrollTop || 0;
		updateOffset(true);
		onScrollFrame();

		window.addEventListener('scroll', onScroll, { passive: true });
		window.addEventListener('resize', function () {
			offsetLocked = false;
			updateOffset(true);
		}, { passive: true });
		window.addEventListener('load', function () {
			offsetLocked = false;
			updateOffset(true);
		});

		if (typeof mq.addEventListener === 'function') {
			mq.addEventListener('change', onMqChange);
		} else if (typeof mq.addListener === 'function') {
			mq.addListener(onMqChange);
		}
	}

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', init);
	} else {
		init();
	}
})();
