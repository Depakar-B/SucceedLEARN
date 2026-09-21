/**
 * SucceedLEARN — Code of Conduct Hero Assessment
 */

document.addEventListener('DOMContentLoaded', function () {
	'use strict';

	const assessments = document.querySelectorAll(
		'[data-code-of-conduct-assessment]'
	);

	if (!assessments.length) {
		return;
	}

	assessments.forEach(function (assessment) {
		const options = assessment.querySelectorAll(
			'.sl-code-of-conduct-hero__option'
		);

		const feedback = assessment.querySelector(
			'.sl-code-of-conduct-hero__feedback'
		);

		if (!options.length || !feedback) {
			return;
		}

		options.forEach(function (option) {
			option.addEventListener('click', function () {
				options.forEach(function (item) {
					item.classList.remove(
						'is-selected',
						'is-correct',
						'is-incorrect'
					);
				});

				feedback.className = 'sl-code-of-conduct-hero__feedback';
				feedback.textContent = '';

				option.classList.add('is-selected');

				const answer = option.getAttribute('data-answer');

				if ('correct' === answer) {
					option.classList.add('is-correct');

					feedback.className =
						'sl-code-of-conduct-hero__feedback is-visible is-success';

					feedback.textContent =
						'Good decision. Declining and disclosing helps protect the integrity of the tender process and avoids an actual or perceived conflict.';

					return;
				}

				option.classList.add('is-incorrect');

				feedback.className =
					'sl-code-of-conduct-hero__feedback is-visible is-error';

				feedback.textContent =
					'Think again. The gift could influence — or appear to influence — an active business decision.';
			});
		});
	});
});
