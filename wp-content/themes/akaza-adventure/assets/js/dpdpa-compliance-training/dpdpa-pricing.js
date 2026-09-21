/**
 * DPDPA pricing calculator — progressive tiered rates.
 *
 * First 1,000 @ ₹200, next to 2,500 @ ₹180,
 * next to 5,000 @ ₹160, above 5,000 @ ₹140.
 */
(function () {
	"use strict";

	function indianNumber(n) {
		var s = String(Math.round(n));
		if (s.length <= 3) {
			return s;
		}
		var last3 = s.slice(-3);
		var rest = s.slice(0, -3);
		return rest.replace(/\B(?=(\d{2})+(?!\d))/g, ",") + "," + last3;
	}

	function calcTotal(employees) {
		var remaining = Math.max(0, employees);
		var total = 0;
		var bands = [
			{ size: 1000, rate: 200 },
			{ size: 1500, rate: 180 },
			{ size: 2500, rate: 160 },
		];
		var i;

		for (i = 0; i < bands.length; i++) {
			if (remaining <= 0) {
				break;
			}
			var take = Math.min(remaining, bands[i].size);
			total += take * bands[i].rate;
			remaining -= take;
		}

		if (remaining > 0) {
			total += remaining * 140;
		}

		return total;
	}

	function initPricing() {
		var calc = document.querySelector(".sl-dpdpa-pricing__calc");
		var range = document.getElementById("dpdpaPricingRange");
		var countEl = document.getElementById("dpdpaPricingCount");
		var totalEl = document.getElementById("dpdpaPricingTotal");
		var unitEl = document.getElementById("dpdpaPricingUnit");

		if (!calc || !range || !countEl || !totalEl || !unitEl) {
			return;
		}

		function updatePrice() {
			var employees = Number(range.value) || 0;
			var total = calcTotal(employees);
			var average = employees > 0 ? Math.round(total / employees) : 0;
			var min = Number(range.min) || 0;
			var max = Number(range.max) || 1;
			var pct = ((employees - min) / (max - min)) * 100;

			var slider = range.closest(".sl-dpdpa-pricing__slider");
			if (slider) {
				slider.style.setProperty("--pct", String(pct));
			}

			range.setAttribute("aria-valuenow", String(employees));
			range.setAttribute(
				"aria-valuetext",
				indianNumber(employees) + " employees"
			);
			countEl.textContent = indianNumber(employees) + " employees";
			totalEl.textContent = "₹" + indianNumber(total);
			unitEl.textContent =
				"Average ₹" + indianNumber(average) + " per employee, per year";

			if (slider) {
				var thumb = 20;
				var sliderWidth = slider.clientWidth;
				var tipWidth = countEl.offsetWidth;
				var center =
					thumb / 2 + ((sliderWidth - thumb) * pct) / 100;
				var left = Math.max(
					0,
					Math.min(center - tipWidth / 2, sliderWidth - tipWidth)
				);
				var arrow = Math.max(
					12,
					Math.min(center - left, tipWidth - 12)
				);

				countEl.style.left = left + "px";
				countEl.style.setProperty("--arrow", arrow + "px");
			}
		}

		range.addEventListener("input", updatePrice);
		range.addEventListener("change", updatePrice);
		window.addEventListener("resize", updatePrice);
		updatePrice();
	}

	if (document.readyState === "loading") {
		document.addEventListener("DOMContentLoaded", initPricing);
	} else {
		initPricing();
	}
})();
