/**
 * SucceedLEARN — Cybersecurity Awareness Hero Assessment
 */

document.addEventListener('DOMContentLoaded', function () {
	'use strict';

	const assessments = document.querySelectorAll(
		'[data-cybersecurity-awareness-assessment]'
	);

	if (!assessments.length) {
		return;
	}

	assessments.forEach(function (assessment) {
		const options = assessment.querySelectorAll(
			'.sl-cybersecurity-awareness-hero__option'
		);

		const feedback = assessment.querySelector(
			'.sl-cybersecurity-awareness-hero__feedback'
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

				feedback.className = 'sl-cybersecurity-awareness-hero__feedback';
				feedback.textContent = '';

				option.classList.add('is-selected');

				const answer = option.getAttribute('data-answer');

				if ('correct' === answer) {
					option.classList.add('is-correct');

					feedback.className =
						'sl-cybersecurity-awareness-hero__feedback is-visible is-success';

					feedback.textContent =
						'Good decision. Legitimate IT teams never ask you to confirm a password by email. Reporting the message helps protect the organisation.';

					return;
				}

				option.classList.add('is-incorrect');

				feedback.className =
					'sl-cybersecurity-awareness-hero__feedback is-visible is-error';

				feedback.textContent =
					'Think again. Urgent password requests by email are a common phishing tactic — do not click or reply.';
			});
		});
	});
});
