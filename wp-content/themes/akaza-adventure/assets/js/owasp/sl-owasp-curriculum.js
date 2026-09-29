(() => {
	const section = document.querySelector('.sl-owasp-curriculum');
	const heading = document.querySelector('.sl-owasp-curriculum__heading');
	const nav = document.querySelector('[data-owasp-curriculum-nav]');

	if (!section || !heading) {
		return;
	}

	const readCssPx = (value, fallback) => {
		const parsed = Number.parseFloat(value);
		return Number.isFinite(parsed) ? parsed : fallback;
	};

	const getStickyOffsets = () => {
		const styles = window.getComputedStyle(heading);
		const headingSticky = styles.position === 'sticky';
		const rootStyles = window.getComputedStyle(document.documentElement);
		const headerClearance = readCssPx(
			rootStyles.getPropertyValue('--slf-header-clearance'),
			110
		);
		const headTop = headerClearance + 20;
		const headH = headingSticky
			? Math.ceil(heading.getBoundingClientRect().height)
			: 0;

		return { headingSticky, headTop, headH };
	};

	const syncStickyVars = () => {
		const { headingSticky, headTop, headH } = getStickyOffsets();

		section.style.setProperty('--sl-owasp-curr-head-top', `${headTop}px`);

		if (!headingSticky) {
			section.style.removeProperty('--sl-owasp-curr-head-h');
			return headTop;
		}

		section.style.setProperty('--sl-owasp-curr-head-h', `${headH}px`);
		return headTop + headH + 12;
	};

	let spyOffset = syncStickyVars();

	if (!nav) {
		window.addEventListener('resize', () => {
			spyOffset = syncStickyVars();
		});
		return;
	}

	const moduleLinks = [...nav.querySelectorAll('a')];
	const modules = moduleLinks
		.map((link) => {
			const target = document.querySelector(link.getAttribute('href'));
			return target ? { link, target } : null;
		})
		.filter(Boolean);

	if (!modules.length) {
		return;
	}

	const setActive = (activeLink) => {
		moduleLinks.forEach((link) => {
			link.classList.toggle('is-active', link === activeLink);
		});
	};

	const updateActiveFromScroll = () => {
		const marker = spyOffset + 8;
		let current = modules[0];

		modules.forEach((module) => {
			const top = module.target.getBoundingClientRect().top;
			if (top <= marker) {
				current = module;
			}
		});

		if (current) {
			setActive(current.link);
		}
	};

	let ticking = false;
	const onScrollOrResize = () => {
		if (ticking) {
			return;
		}

		ticking = true;
		window.requestAnimationFrame(() => {
			spyOffset = syncStickyVars();
			updateActiveFromScroll();
			ticking = false;
		});
	};

	window.addEventListener('scroll', onScrollOrResize, { passive: true });
	window.addEventListener('resize', onScrollOrResize);
	window.addEventListener('load', onScrollOrResize);

	updateActiveFromScroll();
})();
