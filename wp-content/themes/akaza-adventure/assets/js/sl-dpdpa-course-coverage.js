/**
 * SucceedLEARN — DPDPA Course Coverage
 *
 * Full curriculum expand / collapse.
 */

document.addEventListener('DOMContentLoaded', function () {
	const sections = document.querySelectorAll(
		'.sl-dpdpa-course-coverage'
	);

	if (!sections.length) {
		return;
	}

	sections.forEach(function (section) {
		const toggle = section.querySelector(
			'.sl-dpdpa-course-coverage__toggle'
		);

		const panel = section.querySelector(
			'.sl-dpdpa-course-coverage__panel'
		);

		if (!toggle || !panel) {
			return;
		}

		toggle.addEventListener('click', function () {
			const expanded =
				toggle.getAttribute('aria-expanded') === 'true';

			toggle.setAttribute(
				'aria-expanded',
				String(!expanded)
			);

			panel.hidden = expanded;

			const action = toggle.querySelector(
				'.sl-dpdpa-course-coverage__toggle-action'
			);

			if (action) {
				action.textContent = expanded
					? action.getAttribute('data-show-label')
					: action.getAttribute('data-hide-label');
			}
		});
	});
});