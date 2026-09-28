(function () {
	'use strict';

	function initCarousel(root) {
		var slides = Array.prototype.slice.call(root.querySelectorAll('[data-pci-carousel-slide]'));
		var dotsWrap = root.querySelector('[data-pci-carousel-dots]');
		var prevBtn = root.querySelector('[data-pci-carousel-prev]');
		var nextBtn = root.querySelector('[data-pci-carousel-next]');
		var index = 0;

		if (!slides.length) {
			return;
		}

		function renderDots() {
			if (!dotsWrap) {
				return;
			}
			dotsWrap.innerHTML = '';
			slides.forEach(function (_, i) {
				var dot = document.createElement('button');
				dot.type = 'button';
				dot.className = 'sl-pci-screenshots__dot' + (i === index ? ' is-active' : '');
				dot.setAttribute('aria-label', 'Go to screenshot ' + (i + 1));
				dot.addEventListener('click', function () {
					goTo(i);
				});
				dotsWrap.appendChild(dot);
			});
		}

		function goTo(nextIndex) {
			index = (nextIndex + slides.length) % slides.length;
			slides.forEach(function (slide, i) {
				var active = i === index;
				slide.classList.toggle('is-active', active);
				if (active) {
					slide.removeAttribute('hidden');
				} else {
					slide.setAttribute('hidden', '');
				}
			});
			renderDots();
		}

		if (prevBtn) {
			prevBtn.addEventListener('click', function () {
				goTo(index - 1);
			});
		}
		if (nextBtn) {
			nextBtn.addEventListener('click', function () {
				goTo(index + 1);
			});
		}

		goTo(0);
	}

	document.querySelectorAll('[data-pci-carousel]').forEach(initCarousel);

	var tabs = Array.prototype.slice.call(document.querySelectorAll('[data-pci-tab]'));
	var panels = Array.prototype.slice.call(document.querySelectorAll('[data-pci-tab-panel]'));

	if (!tabs.length || !panels.length) {
		return;
	}

	function activateTab(key) {
		tabs.forEach(function (tab) {
			var active = tab.getAttribute('data-pci-tab') === key;
			tab.classList.toggle('is-active', active);
			tab.setAttribute('aria-selected', active ? 'true' : 'false');
		});

		panels.forEach(function (panel) {
			var active = panel.getAttribute('data-pci-tab-panel') === key;
			if (active) {
				panel.removeAttribute('hidden');
			} else {
				panel.setAttribute('hidden', '');
			}
		});
	}

	tabs.forEach(function (tab) {
		tab.addEventListener('click', function () {
			activateTab(tab.getAttribute('data-pci-tab'));
		});
	});
})();
