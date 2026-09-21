/**
 * Akaza Header Footer — mobile drawer (plugin + legacy markup).
 */
(function () {
	'use strict';

	var strings = (window.ahfMobileHeader && window.ahfMobileHeader.strings) || {};
	var bound = false;

	function setHamburgerIcon(hamburger, open) {
		var icon = hamburger.querySelector('.epsh-hamburger-icon');

		if (icon) {
			icon.innerHTML = open ? '&times;' : '&#9776;';
			return;
		}

		hamburger.innerHTML = open ? '&times;' : '&#9776;';
	}

	function ensureHamburgerControl(hamburger) {
		if (!hamburger) {
			return;
		}

		if (hamburger.tagName !== 'BUTTON') {
			hamburger.setAttribute('role', 'button');
			if (!hamburger.hasAttribute('tabindex')) {
				hamburger.setAttribute('tabindex', '0');
			}
		}

		if (!hamburger.hasAttribute('aria-expanded')) {
			hamburger.setAttribute('aria-expanded', 'false');
		}
	}

	function bootstrapLegacyShell(hamburger) {
		var legacyBar = document.getElementById('custom-mobile-header');
		var root = document.querySelector('[data-epsh-mobile-header]') ||
			document.querySelector('.epsh-mobile-header-wrap') ||
			document.querySelector('.ep-mobile-header-wrap');
		var menu = document.getElementById('epsh-mobile-menu') || document.getElementById('mobile-menu');
		var overlay = document.getElementById('epsh-mobile-overlay') || document.getElementById('mobile-menu-overlay');

		if (!legacyBar && !root) {
			return null;
		}

		if (!root && legacyBar) {
			root = document.createElement('div');
			root.className = 'ep-mobile-header-wrap epsh-mobile-header-wrap';
			root.setAttribute('data-epsh-mobile-header', '');
			legacyBar.parentNode.insertBefore(root, legacyBar);
			root.appendChild(legacyBar);
		}

		if (!overlay) {
			overlay = document.createElement('div');
			overlay.id = 'mobile-menu-overlay';
			overlay.className = 'ep-mobile-menu-overlay epsh-mobile-overlay';
			overlay.setAttribute('aria-hidden', 'true');
			root.appendChild(overlay);
		} else if (root && overlay.parentElement !== root) {
			root.appendChild(overlay);
		}

		if (menu && root && menu.parentElement !== root) {
			root.appendChild(menu);
		}

		if (!hamburger) {
			hamburger = document.getElementById('epsh-hamburger') || document.getElementById('hamburger');
		}

		if (!root || !hamburger || !menu || !overlay) {
			return null;
		}

		return { root: root, hamburger: hamburger, menu: menu, overlay: overlay };
	}

	function resolveElements() {
		var hamburger = document.getElementById('epsh-hamburger') || document.getElementById('hamburger');
		var menu = document.getElementById('epsh-mobile-menu') || document.getElementById('mobile-menu');
		var overlay = document.getElementById('epsh-mobile-overlay') || document.getElementById('mobile-menu-overlay');
		var root = document.querySelector('[data-epsh-mobile-header]') ||
			document.querySelector('.epsh-mobile-header-wrap') ||
			document.querySelector('.ep-mobile-header-wrap');

		if (root && hamburger && menu && overlay) {
			return { root: root, hamburger: hamburger, menu: menu, overlay: overlay };
		}

		return bootstrapLegacyShell(hamburger);
	}

	function initMobileHeader() {
		if (bound) {
			return;
		}

		var elements = resolveElements();

		if (!elements) {
			return;
		}

		var root = elements.root;
		var hamburger = elements.hamburger;
		var menu = elements.menu;
		var overlay = elements.overlay;
		var closeBtn = menu.querySelector('.epsh-mobile-close') || menu.querySelector('.close-btn');

		bound = true;
		ensureHamburgerControl(hamburger);

		var submenuToggles = menu.querySelectorAll('.epsh-submenu-toggle');
		var legacySubmenuLinks = menu.querySelectorAll('.has-submenu > a');

		function isOpen() {
			return root.classList.contains('is-open') || document.body.classList.contains('epsh-menu-open');
		}

		function setOpen(open) {
			root.classList.toggle('is-open', open);
			document.body.classList.toggle('epsh-menu-open', open);
			document.body.classList.toggle('menu-open', open);

			hamburger.setAttribute('aria-expanded', open ? 'true' : 'false');
			hamburger.setAttribute('aria-label', open ? (strings.closeMenu || 'Close menu') : (strings.openMenu || 'Open menu'));
			menu.setAttribute('aria-hidden', open ? 'false' : 'true');
			overlay.setAttribute('aria-hidden', open ? 'false' : 'true');

			setHamburgerIcon(hamburger, open);
		}

		// Reset stuck open state from legacy scripts.
		setOpen(false);

		hamburger.addEventListener('click', function (e) {
			e.preventDefault();
			e.stopImmediatePropagation();
			setOpen(!isOpen());
		});

		hamburger.addEventListener('keydown', function (e) {
			if (e.key === 'Enter' || e.key === ' ') {
				e.preventDefault();
				setOpen(!isOpen());
			}
		});

		overlay.addEventListener('click', function () {
			setOpen(false);
		});

		if (closeBtn) {
			closeBtn.addEventListener('click', function () {
				setOpen(false);
			});
		}

		submenuToggles.forEach(function (btn) {
			btn.addEventListener('click', function () {
				var li = btn.parentElement;
				var expanded = li.classList.toggle('is-open');
				btn.setAttribute('aria-expanded', expanded ? 'true' : 'false');
			});
		});

		legacySubmenuLinks.forEach(function (link) {
			link.addEventListener('click', function (e) {
				e.preventDefault();
				e.stopPropagation();
				link.parentElement.classList.toggle('active');
			});
		});

		document.addEventListener('keydown', function (e) {
			if (e.key === 'Escape' && isOpen()) {
				setOpen(false);
			}
		});
	}

	function boot() {
		initMobileHeader();
	}

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', boot);
	} else {
		boot();
	}

	window.addEventListener('load', boot);
})();
