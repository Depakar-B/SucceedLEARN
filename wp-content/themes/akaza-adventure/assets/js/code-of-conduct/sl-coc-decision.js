/**
 * SucceedLEARN — Code of Conduct Decision Experience.
 * Scenario tabs switch on hover (click kept for keyboard / touch).
 */

document.addEventListener('DOMContentLoaded', function () {
	const sections = document.querySelectorAll('.sl-coc-decision');

	sections.forEach(function (section) {
		const tabs = section.querySelectorAll('.sl-coc-decision__tab[data-scenario]');
		const panels = section.querySelectorAll('[data-scenario-panel]');

		function closeReveal(reveal) {
			const button = reveal.querySelector('[data-decision-reveal-btn]');
			const panel = reveal.querySelector('[data-decision-answer-panel]');
			const label = reveal.querySelector('[data-decision-reveal-label]');

			if (!button || !panel) {
				return;
			}

			reveal.classList.remove('is-revealed');
			button.setAttribute('aria-expanded', 'false');
			panel.setAttribute('aria-hidden', 'true');

			if (label && button.dataset.viewLabel) {
				label.textContent = button.dataset.viewLabel;
			}
		}

		function resetPanelReveals(panel) {
			panel.querySelectorAll('[data-decision-reveal]').forEach(closeReveal);
		}

		function openReveal(reveal) {
			const button = reveal.querySelector('[data-decision-reveal-btn]');
			const panel = reveal.querySelector('[data-decision-answer-panel]');
			const label = reveal.querySelector('[data-decision-reveal-label]');

			if (!button || !panel) {
				return;
			}

			reveal.classList.add('is-revealed');
			button.setAttribute('aria-expanded', 'true');
			panel.setAttribute('aria-hidden', 'false');

			if (label && button.dataset.hideLabel) {
				label.textContent = button.dataset.hideLabel;
			}
		}

		function activateTab(tab) {
			if (!tab || tab.classList.contains('is-active')) {
				return;
			}

			const scenario = tab.getAttribute('data-scenario');

			tabs.forEach(function (item) {
				const isActive = item === tab;

				item.classList.toggle('is-active', isActive);
				item.setAttribute('aria-selected', isActive ? 'true' : 'false');
			});

			panels.forEach(function (panel) {
				const isActive = panel.getAttribute('data-scenario-panel') === scenario;

				panel.classList.toggle('is-active', isActive);
				panel.hidden = !isActive;

				if (!isActive) {
					resetPanelReveals(panel);
				}
			});
		}

		section.querySelectorAll('[data-decision-reveal-btn]').forEach(function (button) {
			const reveal = button.closest('[data-decision-reveal]');

			button.addEventListener('click', function () {
				if (!reveal) {
					return;
				}

				if (reveal.classList.contains('is-revealed')) {
					closeReveal(reveal);
					return;
				}

				openReveal(reveal);
			});
		});

		tabs.forEach(function (tab) {
			tab.addEventListener('mouseenter', function () {
				activateTab(tab);
			});

			tab.addEventListener('focus', function () {
				activateTab(tab);
			});

			tab.addEventListener('click', function (event) {
				event.preventDefault();
				activateTab(tab);
			});
		});
	});
});
