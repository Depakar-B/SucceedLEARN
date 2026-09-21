/**
 * HIPAA FAQ — accordion: only one item open at a time.
 */
(function () {
	'use strict';

	function initSection(section) {
		var items = Array.prototype.slice.call(
			section.querySelectorAll('details.sl-hipaa-faq__item')
		);

		if (!items.length) {
			return;
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
		document.querySelectorAll('.sl-hipaa-faq').forEach(initSection);
	}

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', init);
	} else {
		init();
	}
})();
