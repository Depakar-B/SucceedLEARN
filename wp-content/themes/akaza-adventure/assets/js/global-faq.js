/**
 * Global FAQ — accordion: only one item open at a time; first open by default.
 */
(function () {
	'use strict';

	function initSection(section) {
		var items = Array.prototype.slice.call(section.querySelectorAll('details.faq'));
		if (!items.length) {
			return;
		}

		var openFirst = section.getAttribute('data-faq-open-first') !== 'false';

		if (openFirst && !items.some(function (item) { return item.open; })) {
			items[0].open = true;
		}

		items.forEach(function (details) {
			details.addEventListener('toggle', function () {
				if (!details.open) {
					return;
				}

				items.forEach(function (other) {
					if (other !== details && other.open) {
						other.open = false;
					}
				});
			});
		});
	}

	function init() {
		document.querySelectorAll('.sl-faq-section').forEach(initSection);
	}

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', init);
	} else {
		init();
	}
})();
