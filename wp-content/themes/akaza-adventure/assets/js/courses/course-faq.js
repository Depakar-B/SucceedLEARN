/**
 * Course FAQ — smooth accordion + stable section height.
 */
(function () {
	'use strict';

	function lockListHeight(list) {
		if (window.matchMedia('(max-width: 1000px)').matches) {
			list.style.removeProperty('--faq-list-min-height');
			return;
		}

		var items = Array.prototype.slice.call(list.querySelectorAll('[data-course-faq-item]'));
		if (!items.length) {
			return;
		}

		var previouslyOpen = list.querySelector('[data-course-faq-item].is-open');
		var maxHeight = 0;

		list.classList.add('is-measuring');
		list.style.removeProperty('--faq-list-min-height');

		items.forEach(function (item) {
			items.forEach(function (other) {
				other.classList.toggle('is-open', other === item);
			});
			maxHeight = Math.max(maxHeight, list.scrollHeight);
		});

		items.forEach(function (item, index) {
			var shouldOpen = previouslyOpen ? item === previouslyOpen : 0 === index;
			item.classList.toggle('is-open', shouldOpen);
			var button = item.querySelector('.sl-course-faq__question');
			if (button) {
				button.setAttribute('aria-expanded', shouldOpen ? 'true' : 'false');
			}
		});

		list.style.setProperty('--faq-list-min-height', maxHeight + 'px');
		list.classList.remove('is-measuring');
	}

	function initList(list) {
		var items = Array.prototype.slice.call(list.querySelectorAll('[data-course-faq-item]'));
		if (!items.length) {
			return;
		}

		lockListHeight(list);

		items.forEach(function (item) {
			var button = item.querySelector('.sl-course-faq__question');
			if (!button) {
				return;
			}

			button.addEventListener('click', function () {
				var willOpen = !item.classList.contains('is-open');

				items.forEach(function (other) {
					var otherButton = other.querySelector('.sl-course-faq__question');
					var isTarget = willOpen && other === item;
					other.classList.toggle('is-open', isTarget);
					if (otherButton) {
						otherButton.setAttribute('aria-expanded', isTarget ? 'true' : 'false');
					}
				});
			});
		});
	}

	function init() {
		document.querySelectorAll('[data-course-faq-list]').forEach(initList);
	}

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', init);
	} else {
		init();
	}

	var resizeTimer;
	window.addEventListener('resize', function () {
		window.clearTimeout(resizeTimer);
		resizeTimer = window.setTimeout(function () {
			document.querySelectorAll('[data-course-faq-list]').forEach(lockListHeight);
		}, 150);
	});
})();
