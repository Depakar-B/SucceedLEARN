/**
 * DPDPA hero workday dashboard animation.
 */
(function () {
	"use strict";

	function initWorkday() {
		var grid = document.getElementById("dpdpaWdGrid");
		var numEl = document.getElementById("dpdpaWdNum");
		var clockEl = document.getElementById("dpdpaWdClock");

		if (!grid || !numEl || !clockEl) {
			return;
		}

		var COLS = 20;
		var ROWS = 6;
		var TOTAL = COLS * ROWS;
		var TARGET = 12000;
		var dots = [];
		var tips = {
			43: "2:15pm, wrong distribution list",
			88: '4:40pm, export kept "just in case"',
		};

		var i;
		for (i = 0; i < TOTAL; i++) {
			var d = document.createElement("span");
			d.className = "sl-dpdpa-workday__dot";
			dots.push(d);
			grid.appendChild(d);
		}

		Object.keys(tips).forEach(function (k) {
			var el = dots[parseInt(k, 10)];
			if (!el) {
				return;
			}
			var t = document.createElement("span");
			t.className = "sl-dpdpa-workday__tip";
			t.textContent = tips[k];
			el.appendChild(t);
		});

		var reduce =
			window.matchMedia &&
			window.matchMedia("(prefers-reduced-motion: reduce)").matches;

		function fmt(n) {
			var s = String(Math.round(n));
			if (s.length <= 3) {
				return s;
			}
			var l3 = s.slice(-3);
			var rest = s.slice(0, -3);
			return rest.replace(/\B(?=(\d{2})+(?!\d))/g, ",") + "," + l3;
		}

		function cls(idx) {
			var el = dots[idx];
			if (!el) {
				return;
			}
			if (Object.prototype.hasOwnProperty.call(tips, String(idx))) {
				el.classList.add("bad");
			} else if (idx % 4 === 0) {
				el.classList.add("hit");
			} else {
				el.classList.add("on");
			}
		}

		if (reduce) {
			dots.forEach(function (_d, idx) {
				cls(idx);
			});
			numEl.textContent = fmt(TARGET);
			clockEl.textContent = "18:00";
			return;
		}

		var order = [];
		var c;
		var r;
		for (c = 0; c < COLS; c++) {
			for (r = 0; r < ROWS; r++) {
				order.push(r * COLS + c);
			}
		}

		var start = null;
		var duration = 3000;

		function ease(t) {
			return 1 - Math.pow(1 - t, 3);
		}

		function step(ts) {
			if (!start) {
				start = ts;
			}
			var p = Math.min((ts - start) / duration, 1);
			var e = ease(p);
			numEl.textContent = fmt(TARGET * e);
			var mins = 9 * 60 + Math.round(e * 9 * 60);
			clockEl.textContent =
				String(Math.floor(mins / 60)).padStart(2, "0") +
				":" +
				String(mins % 60).padStart(2, "0");
			var upTo = Math.floor(e * TOTAL);
			var i2;
			for (i2 = 0; i2 < upTo; i2++) {
				var idx = order[i2];
				if (dots[idx].dataset.set) {
					continue;
				}
				dots[idx].dataset.set = "1";
				cls(idx);
			}
			if (p < 1) {
				requestAnimationFrame(step);
			}
		}

		var fired = false;
		function run() {
			if (fired) {
				return;
			}
			fired = true;
			requestAnimationFrame(step);
		}

		if ("IntersectionObserver" in window) {
			var io = new IntersectionObserver(
				function (entries) {
					entries.forEach(function (entry) {
						if (entry.isIntersecting) {
							run();
							io.disconnect();
						}
					});
				},
				{ threshold: 0.25 }
			);
			io.observe(grid);
		} else {
			run();
		}
	}

	if (document.readyState === "loading") {
		document.addEventListener("DOMContentLoaded", initWorkday);
	} else {
		initWorkday();
	}
})();
