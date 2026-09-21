document.addEventListener('DOMContentLoaded', function () {
    const carousels = document.querySelectorAll(
        '[data-scenario-carousel]'
    );

    carousels.forEach(function (carousel) {
        const track = carousel.querySelector(
            '[data-scenario-track]'
        );

        const cards = carousel.querySelectorAll(
            '.sl-abac-scenario-showcase__card'
        );

        const previousButton = carousel.querySelector(
            '[data-scenario-prev]'
        );

        const nextButton = carousel.querySelector(
            '[data-scenario-next]'
        );

        const counter = carousel.querySelector(
            '[data-scenario-counter]'
        );

        if (
            !track ||
            !cards.length ||
            !previousButton ||
            !nextButton ||
            !counter
        ) {
            return;
        }

        let currentIndex = 0;

        const totalSlides = cards.length;

        function updateCarousel() {
            track.style.transform =
                'translateX(-' + (currentIndex * 100) + '%)';

            counter.textContent =
                (currentIndex + 1) + ' / ' + totalSlides;

            previousButton.disabled =
                currentIndex === 0;

            nextButton.disabled =
                currentIndex === totalSlides - 1;
        }

        previousButton.addEventListener('click', function () {
            if (currentIndex > 0) {
                currentIndex--;
                updateCarousel();
            }
        });

        nextButton.addEventListener('click', function () {
            if (currentIndex < totalSlides - 1) {
                currentIndex++;
                updateCarousel();
            }
        });

        updateCarousel();
    });
});