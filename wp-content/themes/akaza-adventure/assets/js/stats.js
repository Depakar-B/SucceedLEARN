document.addEventListener("DOMContentLoaded", function () {

    const counters = document.querySelectorAll(".counter");

    if (!counters.length) {
        return;
    }

    const prefersReducedMotion = window.matchMedia(
        "(prefers-reduced-motion: reduce)"
    ).matches;

    function animateCounter(counter) {
        const target = parseInt(counter.dataset.target, 10);

        if (!target || Number.isNaN(target)) {
            return;
        }

        if (prefersReducedMotion) {
            counter.textContent = String(target);
            return;
        }

        const duration = 2000;
        const stepTime = Math.max(10, duration / target);
        let count = 0;

        counter.textContent = "0";

        const timer = setInterval(function () {
            count += Math.ceil(target / 100);

            if (count >= target) {
                counter.textContent = String(target);
                clearInterval(timer);
            } else {
                counter.textContent = String(count);
            }
        }, stepTime);
    }

    if (!("IntersectionObserver" in window) || prefersReducedMotion) {
        counters.forEach(function (counter) {
            const target = parseInt(counter.dataset.target, 10);
            if (target && !Number.isNaN(target)) {
                counter.textContent = String(target);
            }
        });
        return;
    }

    const observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (!entry.isIntersecting) {
                return;
            }

            animateCounter(entry.target);
            observer.unobserve(entry.target);
        });
    }, {
        threshold: 0.5
    });

    counters.forEach(function (counter) {
        observer.observe(counter);
    });

});
