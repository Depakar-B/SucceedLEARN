/**
 * SucceedLEARN Security Awareness — Dashboard Activity Chart
 */

(function () {
	'use strict';

	function initialiseActivityCharts() {
		var charts = document.querySelectorAll(
			'.sl-sa-dashboard__activity-chart'
		);

		if (!charts.length) {
			return;
		}

		charts.forEach(function (chart) {
			if (chart.dataset.initialised === 'true') {
				return;
			}

			var rawData = chart.getAttribute('data-activity') || '';

			var values = rawData
				.split(',')
				.map(function (value) {
					return parseFloat(value.trim());
				})
				.filter(function (value) {
					return Number.isFinite(value);
				});

			if (!values.length) {
				values = [62, 68, 71, 76, 73, 82, 79, 86, 84, 91, 88, 94];
			}

			var labels = [
				'Jan',
				'Feb',
				'Mar',
				'Apr',
				'May',
				'Jun',
				'Jul',
				'Aug',
				'Sep',
				'Oct',
				'Nov',
				'Dec'
			];

			var maxValue = Math.max.apply(null, values);

			if (maxValue <= 0) {
				maxValue = 100;
			}

			chart.innerHTML = '';

			var chartInner = document.createElement('div');

			chartInner.className =
				'sl-sa-dashboard__activity-bars';

			chartInner.setAttribute(
				'role',
				'img'
			);

			chartInner.setAttribute(
				'aria-label',
				'Programme activity chart showing activity across 12 months'
			);

			values.forEach(function (value, index) {

				var column = document.createElement('div');

				column.className =
					'sl-sa-dashboard__activity-column';

				var valueLabel = document.createElement('span');

				valueLabel.className =
					'sl-sa-dashboard__activity-value';

				valueLabel.textContent =
					value + '%';

				var barTrack = document.createElement('div');

				barTrack.className =
					'sl-sa-dashboard__activity-bar-track';

				var bar = document.createElement('span');

				bar.className =
					'sl-sa-dashboard__activity-bar';

				var percentage =
					(value / maxValue) * 100;

				percentage = Math.max(
					12,
					Math.min(100, percentage)
				);

				bar.style.height =
					percentage + '%';

				bar.setAttribute(
					'title',
					value + '% activity'
				);

				bar.setAttribute(
					'aria-hidden',
					'true'
				);

				barTrack.appendChild(bar);

				var label = document.createElement('span');

				label.className =
					'sl-sa-dashboard__activity-label';

				label.textContent =
					labels[index] || '';

				column.appendChild(valueLabel);
				column.appendChild(barTrack);
				column.appendChild(label);

				chartInner.appendChild(column);
			});

			chart.appendChild(chartInner);

			chart.setAttribute(
				'aria-label',
				'Programme activity over 12 months'
			);

			chart.dataset.initialised = 'true';
		});
	}

	if (document.readyState === 'loading') {

		document.addEventListener(
			'DOMContentLoaded',
			initialiseActivityCharts
		);

	} else {

		initialiseActivityCharts();

	}

	window.addEventListener(
		'load',
		initialiseActivityCharts
	);

})();
