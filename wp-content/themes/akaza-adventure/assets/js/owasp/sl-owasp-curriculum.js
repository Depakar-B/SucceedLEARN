(() => {
	const section = document.querySelector('.sl-owasp-curriculum');
	const heading = document.querySelector('.sl-owasp-curriculum__heading');
	const nav = document.querySelector('[data-owasp-curriculum-nav]');

	if (!section || !heading) {
		return;
	}

	const SITE_HEADER_SEL = '.site-header, .genesis-header';
	const HIDDEN_BODY_CLASS = 'epsh-header-is-hidden';
	const HIDDEN_HEADER_CLASS = 'epsh-header-hidden';

	const getSiteHeader = () => document.querySelector(SITE_HEADER_SEL);

	const isSiteHeaderHidden = () => {
		if (document.body.classList.contains(HIDDEN_BODY_CLASS)) {
			return true;
		}

		const siteHeader = getSiteHeader();
		return Boolean(siteHeader && siteHeader.classList.contains(HIDDEN_HEADER_CLASS));
	};

	const measureVisibleHeaderHeight = () => {
		const siteHeader = getSiteHeader();
		if (!siteHeader || isSiteHeaderHidden()) {
			return 0;
		}

		const rect = siteHeader.getBoundingClientRect();
		const height = Math.ceil(rect.height || siteHeader.offsetHeight || 0);

		// Header is fixed; if it's fully off-screen, treat as hidden.
		if (rect.bottom <= 0) {
			return 0;
		}

		return Math.max(0, height);
	};

	const getStickyOffsets = () => {
		const styles = window.getComputedStyle(heading);
		const headingSticky = styles.position === 'sticky';
		const headerHeight = measureVisibleHeaderHeight();
		const gap = headerHeight > 0 ? 8 : 0;
		const headTop = headerHeight + gap;
		const headH = headingSticky
			? Math.ceil(heading.getBoundingClientRect().height)
			: 0;

		return { headingSticky, headTop, headH, headerHeight };
	};

	const syncStickyVars = () => {
		const { headingSticky, headTop, headH } = getStickyOffsets();

		section.style.setProperty('--sl-owasp-curr-head-top', `${headTop}px`);
		section.classList.toggle('is-header-hidden', headTop === 0);

		if (!headingSticky) {
			section.style.removeProperty('--sl-owasp-curr-head-h');
			return headTop;
		}

		section.style.setProperty('--sl-owasp-curr-head-h', `${headH}px`);
		return headTop + headH + 12;
	};

	let spyOffset = syncStickyVars();

	const moduleLinks = nav ? [...nav.querySelectorAll('a')] : [];
	const modules = moduleLinks
		.map((link) => {
			const target = document.querySelector(link.getAttribute('href'));
			return target ? { link, target } : null;
		})
		.filter(Boolean);

	const setActive = (activeLink) => {
		moduleLinks.forEach((link) => {
			link.classList.toggle('is-active', link === activeLink);
		});
	};

	const updateActiveFromScroll = () => {
		if (!modules.length) {
			return;
		}

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
	const refresh = () => {
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

	window.addEventListener('scroll', refresh, { passive: true });
	window.addEventListener('resize', refresh);
	window.addEventListener('load', refresh);
	document.addEventListener('epsh-header-hide', refresh);

	const siteHeader = getSiteHeader();
	if (siteHeader && 'MutationObserver' in window) {
		const observer = new MutationObserver(refresh);
		observer.observe(document.body, {
			attributes: true,
			attributeFilter: ['class'],
		});
		observer.observe(siteHeader, {
			attributes: true,
			attributeFilter: ['class'],
		});
	}

	updateActiveFromScroll();
})();
