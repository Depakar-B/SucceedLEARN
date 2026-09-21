/**
 * DPDPA Readiness Assessment
 *
 * @package Akaza_Adventure
 */

document.addEventListener('DOMContentLoaded', function () {

	const assessment = document.querySelector(
		'.sl-dpdpa-assessment'
	);

	if (!assessment) {
		return;
	}

	const dataElement = document.getElementById(
		'sl-dpdpa-assessment-data'
	);

	if (!dataElement) {
		return;
	}

	let questions = [];

	try {
		questions = JSON.parse(
			dataElement.textContent
		);
	} catch (error) {
		console.error(
			'Unable to load DPDPA assessment data.',
			error
		);

		return;
	}

	if (
		!Array.isArray(questions) ||
		questions.length === 0
	) {
		return;
	}

	/*
	 * Question interface.
	 */
	const questionInterface =
		assessment.querySelector(
			'.sl-dpdpa-assessment__question-interface'
		);

	const questionNumber =
		assessment.querySelector(
			'.sl-dpdpa-assessment__question-number strong'
		);

	const categoryBadge =
		assessment.querySelector(
			'.sl-dpdpa-assessment__category'
		);

	const progressContainer =
		assessment.querySelector(
			'.sl-dpdpa-assessment__progress'
		);

	const progressBar =
		assessment.querySelector(
			'.sl-dpdpa-assessment__progress span'
		);

	const categoryLabel =
		assessment.querySelector(
			'.sl-dpdpa-assessment__category-label'
		);

	const moduleLabel =
		assessment.querySelector(
			'.sl-dpdpa-assessment__module'
		);

	const questionTitle =
		assessment.querySelector(
			'.sl-dpdpa-assessment__question'
		);

	const answersContainer =
		assessment.querySelector(
			'.sl-dpdpa-assessment__answers'
		);

	const backButton =
		assessment.querySelector(
			'.sl-dpdpa-assessment__back'
		);

	const nextButton =
		assessment.querySelector(
			'.sl-dpdpa-assessment__next'
		);

	const status =
		assessment.querySelector(
			'.sl-dpdpa-assessment__status'
		);

	/*
	 * Result interface.
	 */
	const resultInterface =
		assessment.querySelector(
			'.sl-dpdpa-assessment__result-interface'
		);

	const resultBand =
		assessment.querySelector(
			'.sl-dpdpa-assessment__result-band'
		);

	const resultPercentage =
		assessment.querySelector(
			'.sl-dpdpa-assessment__result-percentage'
		);

	const resultRing =
		assessment.querySelector(
			'.sl-dpdpa-assessment__result-ring'
		);

	const resultDescription =
		assessment.querySelector(
			'.sl-dpdpa-assessment__result-description'
		);

	const categoryResultCards =
		assessment.querySelectorAll(
			'.sl-dpdpa-assessment__category-result'
		);

	const unlockForm =
		assessment.querySelector(
			'.sl-dpdpa-assessment__unlock-form'
		);

	const unlockSection =
		assessment.querySelector(
			'.sl-dpdpa-assessment__unlock'
		);

	const unlockButton =
		assessment.querySelector(
			'.sl-dpdpa-assessment__unlock-button'
		);

	const formMessage =
		assessment.querySelector(
			'.sl-dpdpa-assessment__form-message'
		);

	let currentQuestion = 0;
	let latestResults = null;

	/*
	 * Stores selected answer index
	 * for each question.
	 */
	const selectedAnswers =
		new Array(questions.length).fill(null);

	/*
	 * Category names.
	 */
	const categoryNames = {
		1: 'Recognising data',
		2: 'Consent & lawful use',
		3: 'Everyday handling',
		4: 'Rights & requests',
		5: 'Breach reporting'
	};

	const categoryMaxScore = 6;

	/**
	 * Render current question.
	 */
	function renderQuestion() {

		const question =
			questions[currentQuestion];

		if (!question) {
			return;
		}

		const questionPosition =
			currentQuestion + 1;

		const progress =
			(questionPosition / questions.length) * 100;

		/*
		 * Header.
		 */
		questionNumber.textContent =
			questionPosition;

		categoryBadge.textContent =
			question.category_title;

		/*
		 * Progress.
		 */
		progressBar.style.width =
			progress + '%';

		progressContainer.setAttribute(
			'aria-valuenow',
			questionPosition
		);

		/*
		 * Question information.
		 */
		categoryLabel.textContent =
			'Category ' +
			question.category +
			' of 5: ' +
			question.category_title;

		moduleLabel.textContent =
			'Question ' +
			questionPosition +
			' · Module ' +
			question.module;

		questionTitle.textContent =
			question.question;

		/*
		 * Clear previous answers.
		 */
		answersContainer.innerHTML = '';

		/*
		 * Render answers.
		 */
		question.answers.forEach(
			function (answer, answerIndex) {

				const answerButton =
					document.createElement('button');

				answerButton.type = 'button';

				answerButton.className =
					'sl-dpdpa-assessment__answer';

				const isSelected =
					selectedAnswers[currentQuestion] ===
					answerIndex;

				if (isSelected) {
					answerButton.classList.add(
						'is-selected'
					);
				}

				answerButton.setAttribute(
					'aria-pressed',
					isSelected
						? 'true'
						: 'false'
				);

				/*
				 * Radio.
				 */
				const radio =
					document.createElement('span');

				radio.className =
					'sl-dpdpa-assessment__answer-radio';

				radio.setAttribute(
					'aria-hidden',
					'true'
				);

				/*
				 * Text.
				 */
				const text =
					document.createElement('span');

				text.className =
					'sl-dpdpa-assessment__answer-text';

				text.textContent =
					answer.text;

				answerButton.appendChild(
					radio
				);

				answerButton.appendChild(
					text
				);

				answerButton.addEventListener(
					'click',
					function () {
						selectAnswer(
							answerIndex
						);
					}
				);

				answersContainer.appendChild(
					answerButton
				);
			}
		);

		/*
		 * Back button.
		 */
		backButton.disabled =
			currentQuestion === 0;

		/*
		 * Next button.
		 */
		const hasAnswer =
			selectedAnswers[currentQuestion] !==
			null;

		nextButton.disabled =
			!hasAnswer;

		nextButton.textContent =
			currentQuestion ===
			questions.length - 1
				? 'See My Score'
				: 'Next';

		status.textContent =
			hasAnswer
				? 'Answer selected'
				: 'Select an answer to continue';
	}

	/**
	 * Select answer.
	 */
	function selectAnswer(answerIndex) {

		selectedAnswers[currentQuestion] =
			answerIndex;

		const answerButtons =
			answersContainer.querySelectorAll(
				'.sl-dpdpa-assessment__answer'
			);

		answerButtons.forEach(
			function (button, index) {

				const isSelected =
					index === answerIndex;

				button.classList.toggle(
					'is-selected',
					isSelected
				);

				button.setAttribute(
					'aria-pressed',
					isSelected
						? 'true'
						: 'false'
				);
			}
		);

		nextButton.disabled = false;

		status.textContent =
			'Answer selected';
	}

	/**
	 * Go back.
	 */
	function goBack() {

		if (currentQuestion === 0) {
			return;
		}

		currentQuestion--;

		renderQuestion();

		assessment.scrollIntoView({
			behavior: 'smooth',
			block: 'start'
		});
	}

	/**
	 * Calculate score.
	 *
	 * Maximum:
	 * 15 questions × 2 = 30 points.
	 */
	function calculateResults() {

		let totalScore = 0;

		const categoryScores = {
			1: 0,
			2: 0,
			3: 0,
			4: 0,
			5: 0
		};

		questions.forEach(
			function (question, index) {

				const answerIndex =
					selectedAnswers[index];

				if (answerIndex === null) {
					return;
				}

				const selectedAnswer =
					question.answers[
						answerIndex
					];

				const score =
					Number(
						selectedAnswer.score
					);

				totalScore += score;

				categoryScores[
					question.category
				] += score;
			}
		);

		const maximumScore =
			questions.length * 2;

		const percentage =
			Math.round(
				(totalScore / maximumScore) * 100
			);

		return {
			totalScore: totalScore,
			maximumScore: maximumScore,
			percentage: percentage,
			categoryScores: categoryScores,
			answers: selectedAnswers
		};
	}

	/**
	 * Get result band.
	 */
	function getResultData(percentage) {

		if (percentage <= 44) {

			return {
				title: 'Significant gap',
				bandClass: 'is-gap',
				description:
					'Your employees are largely untrained on DPDPA basics. This is the highest-risk stage. Most incidents in this category start exactly here.'
			};
		}

		if (percentage <= 74) {

			return {
				title: 'Partial readiness',
				bandClass: 'is-partial',
				description:
					'Some foundations exist, but the gaps are inconsistent enough that a routine mistake could still become a reportable incident.'
			};
		}

		return {
			title: 'Strong foundation',
			bandClass: 'is-strong',
			description:
				'Your workforce has a solid baseline. The remaining gaps are worth closing before an auditor or regulator finds them for you.'
		};
	}

	/**
	 * Set form message state.
	 */
	function setFormMessage(message, state) {

		if (!formMessage) {
			return;
		}

		formMessage.textContent = message;
		formMessage.classList.remove(
			'is-error',
			'is-success'
		);

		if (state) {
			formMessage.classList.add(state);
		}
	}

	/**
	 * Unlock category breakdown in the UI.
	 */
	function unlockCategoryScores(results) {

		resultInterface.classList.add(
			'is-unlocked'
		);

		categoryResultCards.forEach(
			function (card) {

				const categoryId =
					Number(
						card.dataset.category
					);

				const score =
					Number(
						results.categoryScores[
							categoryId
						] || 0
					);

				const value =
					card.querySelector(
						'.sl-dpdpa-assessment__category-result-value'
					);

				const percent =
					Math.round(
						(score / categoryMaxScore) *
						100
					);

				if (value) {
					value.textContent =
						percent + '%';
				}

				card.setAttribute(
					'aria-label',
					categoryNames[
						categoryId
					] +
					': ' +
					percent +
					' percent'
				);
			}
		);
	}

	/**
	 * Show final result.
	 */
	function showResult(results) {

		latestResults = results;

		const resultData =
			getResultData(
				results.percentage
			);

		/*
		 * Update result text.
		 */
		resultBand.textContent =
			resultData.title;

		resultBand.classList.remove(
			'is-gap',
			'is-partial',
			'is-strong'
		);

		resultBand.classList.add(
			resultData.bandClass
		);

		resultPercentage.textContent =
			results.percentage + '%';

		if (resultRing) {
			resultRing.style.setProperty(
				'--sl-dpdpa-score',
				String(results.percentage)
			);
		}

		resultDescription.textContent =
			resultData.description;

		/*
		 * Store category scores. Detail stays
		 * locked until email unlock.
		 */
		categoryResultCards.forEach(
			function (card) {

				const categoryId =
					Number(
						card.dataset.category
					);

				const score =
					results.categoryScores[
						categoryId
					];

				card.dataset.score =
					String(score);

				card.setAttribute(
					'aria-label',
					categoryNames[
						categoryId
					] +
					' category result is locked'
				);
			}
		);

		/*
		 * Hide questions.
		 */
		questionInterface.hidden = true;

		/*
		 * Show result.
		 */
		resultInterface.hidden = false;
		resultInterface.classList.remove(
			'is-unlocked'
		);

		if (unlockSection) {
			unlockSection.classList.remove(
				'is-complete'
			);
		}

		setFormMessage('', '');

		/*
		 * Save result temporarily.
		 */
		try {

			sessionStorage.setItem(
				'sl_dpdpa_readiness_result',
				JSON.stringify(results)
			);

		} catch (error) {

			console.warn(
				'Unable to save DPDPA assessment result.',
				error
			);
		}

		assessment.dispatchEvent(
			new CustomEvent(
				'slDpdpaAssessmentComplete',
				{
					detail: results
				}
			)
		);

		setTimeout(
			function () {

				resultInterface.scrollIntoView({
					behavior: 'smooth',
					block: 'start'
				});

			},
			100
		);
	}

	/**
	 * Next button.
	 */
	function goNext() {

		if (
			selectedAnswers[currentQuestion] ===
			null
		) {
			return;
		}

		/*
		 * Continue to next question.
		 */
		if (
			currentQuestion <
			questions.length - 1
		) {

			currentQuestion++;

			renderQuestion();

			assessment.scrollIntoView({
				behavior: 'smooth',
				block: 'start'
			});

			return;
		}

		/*
		 * Last question completed.
		 */
		const results =
			calculateResults();

		showResult(results);
	}

	/**
	 * Unlock form: reveal category scores and
	 * email the report to the visitor.
	 */
	if (unlockForm) {

		unlockForm.addEventListener(
			'submit',
			function (event) {

				event.preventDefault();

				const emailInput =
					unlockForm.querySelector(
						'input[type="email"]'
					);

				if (!emailInput) {
					return;
				}

				const email =
					emailInput.value.trim();

				if (!email) {

					setFormMessage(
						'Please enter your email address.',
						'is-error'
					);

					emailInput.focus();

					return;
				}

				if (
					!emailInput.checkValidity()
				) {

					setFormMessage(
						'Please enter a valid email address.',
						'is-error'
					);

					emailInput.focus();

					return;
				}

				let storedResult =
					latestResults;

				if (!storedResult) {

					try {

						storedResult =
							JSON.parse(
								sessionStorage.getItem(
									'sl_dpdpa_readiness_result'
								)
							);

					} catch (error) {

						storedResult = null;
					}
				}

				if (!storedResult) {

					setFormMessage(
						'We could not find your assessment result. Please retake the scorecard.',
						'is-error'
					);

					return;
				}

				const resultData =
					getResultData(
						storedResult.percentage
					);

				unlockCategoryScores(
					storedResult
				);

				try {

					sessionStorage.setItem(
						'sl_dpdpa_readiness_email',
						email
					);

					storedResult.email =
						email;

					sessionStorage.setItem(
						'sl_dpdpa_readiness_result',
						JSON.stringify(
							storedResult
						)
					);

				} catch (error) {

					console.warn(
						'Unable to save assessment email.',
						error
					);
				}

				const config =
					typeof slDpdpaReadiness !==
					'undefined'
						? slDpdpaReadiness
						: null;

				if (
					!config ||
					!config.ajaxUrl ||
					!config.nonce
				) {

					if (unlockSection) {
						unlockSection.classList.add(
							'is-complete'
						);
					}

					setFormMessage(
						'Category scores unlocked. Email delivery is not available on this page right now.',
						'is-success'
					);

					return;
				}

				if (unlockButton) {
					unlockButton.disabled =
						true;
					unlockButton.textContent =
						'Sending...';
				}

				setFormMessage(
					'Sending your report…',
					''
				);

				const body =
					new URLSearchParams();

				body.append(
					'action',
					'sl_dpdpa_readiness_email'
				);

				body.append(
					'nonce',
					config.nonce
				);

				body.append(
					'email',
					email
				);

				body.append(
					'percentage',
					String(
						storedResult.percentage
					)
				);

				body.append(
					'band',
					resultData.title
				);

				body.append(
					'category_scores',
					JSON.stringify(
						storedResult.categoryScores
					)
				);

				fetch(
					config.ajaxUrl,
					{
						method: 'POST',
						credentials:
							'same-origin',
						headers: {
							'Content-Type':
								'application/x-www-form-urlencoded; charset=UTF-8'
						},
						body: body.toString()
					}
				)
					.then(
						function (response) {
							return response
								.json()
								.then(
									function (data) {
										return {
											ok:
												response.ok,
											data:
												data
										};
									}
								);
						}
					)
					.then(
						function (payload) {

							const data =
								payload.data ||
								{};

							const message =
								data.data &&
								data.data.message
									? data.data
										.message
									: data.message;

							if (
								data.success
							) {

								if (
									unlockSection
								) {
									unlockSection
										.classList
										.add(
											'is-complete'
										);

									const heading =
										unlockSection
											.querySelector(
												'h2'
											);

									const intro =
										unlockSection
											.querySelector(
												'.sl-dpdpa-assessment__unlock-content p'
											);

									if (
										heading
									) {
										heading.textContent =
											'Report unlocked';
									}

									if (
										intro
									) {
										intro.textContent =
											'Your category breakdown is visible above. A copy is on its way to your inbox.';
									}
								}

								setFormMessage(
									message ||
									'Report sent. Check your inbox for the full breakdown.',
									'is-success'
								);

								return;
							}

							if (
								unlockButton
							) {
								unlockButton.disabled =
									false;
								unlockButton.textContent =
									'Email my report';
							}

							setFormMessage(
								message ||
								'We unlocked your breakdown on this page, but the email could not be sent. Please try again.',
								'is-error'
							);
						}
					)
					.catch(
						function () {

							if (
								unlockButton
							) {
								unlockButton.disabled =
									false;
								unlockButton.textContent =
									'Email my report';
							}

							setFormMessage(
								'We unlocked your breakdown on this page, but the email could not be sent. Please try again.',
								'is-error'
							);
						}
					);

			}
		);
	}

	/*
	 * Events.
	 */
	backButton.addEventListener(
		'click',
		goBack
	);

	nextButton.addEventListener(
		'click',
		goNext
	);

	/*
	 * Start assessment.
	 */
	renderQuestion();

});