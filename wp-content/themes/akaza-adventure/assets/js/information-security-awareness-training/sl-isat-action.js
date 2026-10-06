document.addEventListener('DOMContentLoaded', function () {
	const carousels = document.querySelectorAll('[data-isat-carousel]');

	carousels.forEach(function (carousel) {
		const track = carousel.querySelector('[data-isat-track]');
		const slides = carousel.querySelectorAll('.sl-isat-action__slide');
		const previousButton = carousel.querySelector('[data-isat-prev]');
		const nextButton = carousel.querySelector('[data-isat-next]');
		const counter = carousel.querySelector('[data-isat-counter]');

		if (!track || !slides.length || !previousButton || !nextButton || !counter) {
			return;
		}

		let currentIndex = 0;
		const totalSlides = slides.length;

		function updateCarousel() {
			track.style.transform = 'translateX(-' + currentIndex * 100 + '%)';
			counter.textContent = currentIndex + 1 + ' / ' + totalSlides;
			previousButton.disabled = currentIndex === 0;
			nextButton.disabled = currentIndex === totalSlides - 1;
		}

		previousButton.addEventListener('click', function () {
			if (currentIndex > 0) {
				currentIndex -= 1;
				updateCarousel();
			}
		});

		nextButton.addEventListener('click', function () {
			if (currentIndex < totalSlides - 1) {
				currentIndex += 1;
				updateCarousel();
			}
		});

		carousel.addEventListener('keydown', function (event) {
			if (event.key === 'ArrowLeft' && currentIndex > 0) {
				currentIndex -= 1;
				updateCarousel();
			}

			if (event.key === 'ArrowRight' && currentIndex < totalSlides - 1) {
				currentIndex += 1;
				updateCarousel();
			}
		});

		updateCarousel();
	});
});
