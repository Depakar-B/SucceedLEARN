(function () {
	'use strict';

	var root = document.querySelector('[data-pci-carousel]');
	if (!root) {
		return;
	}

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
})();
