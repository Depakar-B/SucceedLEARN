/**
 * Shared training-page hero — fade-in only (no float / mouse tracking).
 */
document.addEventListener('DOMContentLoaded', () => {
	const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
	const heroes = document.querySelectorAll('.dpdpa-hero');

	if (!heroes.length) {
		return;
	}

	if (reduceMotion) {
		heroes.forEach((hero) => hero.classList.add('dpdpa-loaded'));
		return;
	}

	heroes.forEach((hero) => {
		const observer = new IntersectionObserver(
			(entries) => {
				entries.forEach((entry) => {
					if (entry.isIntersecting) {
						entry.target.classList.add('dpdpa-loaded');
						observer.unobserve(entry.target);
					}
				});
			},
			{ threshold: 0.2 }
		);

		observer.observe(hero);
	});
});
