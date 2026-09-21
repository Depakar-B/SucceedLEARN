document.addEventListener('DOMContentLoaded', function () {
	const carousel = document.querySelector('[data-coc-carousel]');

	if (!carousel) {
		return;
	}

	const track = carousel.querySelector('.sl-coc-coverage__track');
	const slides = carousel.querySelectorAll('.sl-coc-coverage__slide');
	const dots = carousel.querySelectorAll('.sl-coc-coverage__dot');
	const previousButton = carousel.querySelector('[data-coc-prev]');
	const nextButton = carousel.querySelector('[data-coc-next]');

	if (!track || !slides.length) {
		return;
	}

	let currentSlide = 0;
	const totalSlides = slides.length;

	function updateCarousel(index) {
		if (index < 0) {
			index = totalSlides - 1;
		}

		if (index >= totalSlides) {
			index = 0;
		}

		currentSlide = index;

		track.style.transform = 'translateX(-' + (currentSlide * 100) + '%)';

		dots.forEach(function (dot, dotIndex) {
			const isActive = dotIndex === currentSlide;

			dot.classList.toggle('is-active', isActive);
			dot.setAttribute('aria-selected', isActive ? 'true' : 'false');
		});
	}

	previousButton?.addEventListener('click', function () {
		updateCarousel(currentSlide - 1);
	});

	nextButton?.addEventListener('click', function () {
		updateCarousel(currentSlide + 1);
	});

	dots.forEach(function (dot) {
		dot.addEventListener('click', function () {
			const slideIndex = parseInt(dot.dataset.slide, 10);

			if (!Number.isNaN(slideIndex)) {
				updateCarousel(slideIndex);
			}
		});
	});

	carousel.addEventListener('keydown', function (event) {
		if (event.key === 'ArrowLeft') {
			updateCarousel(currentSlide - 1);
		}

		if (event.key === 'ArrowRight') {
			updateCarousel(currentSlide + 1);
		}
	});

	updateCarousel(0);
});