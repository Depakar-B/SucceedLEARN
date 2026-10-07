document.addEventListener('DOMContentLoaded', function () {
	const carousels = document.querySelectorAll('[data-tax-evasion-carousel]');

	carousels.forEach(function (carousel) {
		const track = carousel.querySelector('[data-tax-evasion-track]');
		const slides = carousel.querySelectorAll('.sl-tax-evasion-interactive__image');
		const previousButton = carousel.querySelector('[data-tax-evasion-prev]');
		const nextButton = carousel.querySelector('[data-tax-evasion-next]');

		if (!track || !slides.length || !previousButton || !nextButton) {
			return;
		}

		let currentIndex = 0;
		const totalSlides = slides.length;

		function updateCarousel() {
			track.style.transform = 'translateX(-' + currentIndex * 100 + '%)';
		}

		previousButton.addEventListener('click', function () {
			currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
			updateCarousel();
		});

		nextButton.addEventListener('click', function () {
			currentIndex = (currentIndex + 1) % totalSlides;
			updateCarousel();
		});

		updateCarousel();
	});
});
