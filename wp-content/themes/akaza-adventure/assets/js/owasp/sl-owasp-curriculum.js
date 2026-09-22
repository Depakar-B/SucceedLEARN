(() => {
	const section = document.querySelector('.sl-owasp-curriculum');
	const heading = document.querySelector('.sl-owasp-curriculum__heading');
	const nav = document.querySelector('[data-owasp-curriculum-nav]');

	if (!section || !heading) {
		return;
	}

	const syncHeadingHeight = () => {
		const styles = window.getComputedStyle(heading);
		if (styles.position !== 'sticky') {
			section.style.removeProperty('--sl-owasp-curr-head-h');
			return;
		}

		section.style.setProperty(
			'--sl-owasp-curr-head-h',
			`${Math.ceil(heading.getBoundingClientRect().height)}px`
		);
	};

	syncHeadingHeight();
	window.addEventListener('resize', syncHeadingHeight);

	if (!nav || !('IntersectionObserver' in window)) {
		return;
	}

	const moduleLinks = [...nav.querySelectorAll('a')];
	const sections = moduleLinks
		.map((link) => document.querySelector(link.getAttribute('href')))
		.filter(Boolean);

	if (!sections.length) {
		return;
	}

	const observer = new IntersectionObserver(
		(entries) => {
			entries.forEach((entry) => {
				if (!entry.isIntersecting) {
					return;
				}

				moduleLinks.forEach((link) => link.classList.remove('is-active'));
				const active = moduleLinks.find(
					(link) => link.getAttribute('href') === `#${entry.target.id}`
				);
				if (active) {
					active.classList.add('is-active');
				}
			});
		},
		{ rootMargin: '-30% 0px -60% 0px', threshold: 0 }
	);

	sections.forEach((moduleSection) => observer.observe(moduleSection));
})();
