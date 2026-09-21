/**
 * Secondary global header: mobile toggle + dropdowns.
 */
(function () {
	'use strict';

	function ready(fn) {
		if (document.readyState !== 'loading') {
			fn();
		} else {
			document.addEventListener('DOMContentLoaded', fn);
		}
	}

	ready(function () {
		var header = document.querySelector('.sl-secondary-header');
		if (!header) {
			return;
		}

		document.body.classList.add('sl-secondary-header-active');

		var toggle = header.querySelector('[data-sl-secondary-nav-toggle]');
		var nav = header.querySelector('#sl-secondary-nav');
		var dropdowns = header.querySelectorAll('[data-sl-secondary-dropdown]');

		function closeDropdowns(except) {
			dropdowns.forEach(function (item) {
				if (except && item === except) {
					return;
				}
				item.classList.remove('is-open');
				var trigger = item.querySelector('.sl-secondary-header__trigger');
				if (trigger) {
					trigger.setAttribute('aria-expanded', 'false');
				}
			});
		}

		if (toggle && nav) {
			toggle.addEventListener('click', function () {
				var open = header.classList.toggle('is-open');
				toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
				if (!open) {
					closeDropdowns();
				}
			});
		}

		dropdowns.forEach(function (item) {
			var trigger = item.querySelector('.sl-secondary-header__trigger');
			if (!trigger) {
				return;
			}

			trigger.addEventListener('click', function (event) {
				event.preventDefault();
				var willOpen = !item.classList.contains('is-open');
				closeDropdowns(item);
				item.classList.toggle('is-open', willOpen);
				trigger.setAttribute('aria-expanded', willOpen ? 'true' : 'false');
			});
		});

		document.addEventListener('click', function (event) {
			if (!header.contains(event.target)) {
				header.classList.remove('is-open');
				if (toggle) {
					toggle.setAttribute('aria-expanded', 'false');
				}
				closeDropdowns();
			}
		});

		document.addEventListener('keydown', function (event) {
			if (event.key === 'Escape') {
				header.classList.remove('is-open');
				if (toggle) {
					toggle.setAttribute('aria-expanded', 'false');
				}
				closeDropdowns();
			}
		});
	});
})();
