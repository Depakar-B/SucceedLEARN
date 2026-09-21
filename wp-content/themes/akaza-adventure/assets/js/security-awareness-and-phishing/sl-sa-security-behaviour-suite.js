/**
 * SucceedLEARN — Security Behaviour & Culture Suite tabs.
 */
(function () {
	'use strict';

	function initSuiteExplorer() {
		var explorer = document.querySelector('.sl-suite-explorer');

		if (!explorer) {
			return;
		}

		var nav = explorer.querySelector('.sl-suite-nav');
		var content = explorer.querySelector('.sl-suite-content');

		if (!nav || !content) {
			return;
		}

		var navItems = nav.querySelectorAll('.sl-suite-nav-item');
		var panels = content.querySelectorAll('.sl-suite-panel');

		if (!navItems.length || !panels.length) {
			return;
		}

		var panelMap = {};

		panels.forEach(function (panel) {
			var key = panel.getAttribute('data-suite-panel');

			if (key) {
				panelMap[key] = panel;
				panel.setAttribute('role', 'tabpanel');
				panel.hidden = !panel.classList.contains('active');
			}
		});

		navItems.forEach(function (item, index) {
			var key = item.getAttribute('data-suite');

			item.setAttribute('role', 'tab');
			item.setAttribute('aria-selected', item.classList.contains('active') ? 'true' : 'false');
			item.setAttribute('tabindex', item.classList.contains('active') ? '0' : '-1');

			if (key && panelMap[key]) {
				var panelId = 'sl-suite-panel-' + key;
				panelMap[key].id = panelId;
				item.setAttribute('aria-controls', panelId);
			}

			item.dataset.suiteIndex = String(index);
		});

		nav.setAttribute('role', 'tablist');

		function activate(targetKey, focusNav) {
			if (!targetKey || !panelMap[targetKey]) {
				return;
			}

			navItems.forEach(function (navItem) {
				var isActive = navItem.getAttribute('data-suite') === targetKey;
				navItem.classList.toggle('active', isActive);
				navItem.setAttribute('aria-selected', isActive ? 'true' : 'false');
				navItem.setAttribute('tabindex', isActive ? '0' : '-1');

				if (isActive && focusNav) {
					navItem.focus();
				}
			});

			panels.forEach(function (panel) {
				var isActive = panel.getAttribute('data-suite-panel') === targetKey;
				panel.classList.toggle('active', isActive);
				panel.hidden = !isActive;
			});
		}

		nav.addEventListener('click', function (event) {
			var item = event.target.closest('.sl-suite-nav-item');

			if (!item || !nav.contains(item)) {
				return;
			}

			activate(item.getAttribute('data-suite'), false);
		});

		nav.addEventListener('keydown', function (event) {
			var current = event.target.closest('.sl-suite-nav-item');

			if (!current || !nav.contains(current)) {
				return;
			}

			var index = Number(current.dataset.suiteIndex);
			var nextIndex = index;

			if (event.key === 'ArrowDown' || event.key === 'ArrowRight') {
				nextIndex = (index + 1) % navItems.length;
			} else if (event.key === 'ArrowUp' || event.key === 'ArrowLeft') {
				nextIndex = (index - 1 + navItems.length) % navItems.length;
			} else if (event.key === 'Home') {
				nextIndex = 0;
			} else if (event.key === 'End') {
				nextIndex = navItems.length - 1;
			} else {
				return;
			}

			event.preventDefault();
			activate(navItems[nextIndex].getAttribute('data-suite'), true);
		});
	}

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', initSuiteExplorer);
	} else {
		initSuiteExplorer();
	}
})();
