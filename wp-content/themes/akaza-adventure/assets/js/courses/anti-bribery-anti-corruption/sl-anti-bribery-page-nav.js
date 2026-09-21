document.addEventListener('DOMContentLoaded', function () {
    const nav = document.querySelector('.sl-anti-bribery-page-nav');

    if (!nav) {
        return;
    }

    const links = Array.from(
        nav.querySelectorAll('.sl-anti-bribery-page-nav__link')
    );

    if (!links.length) {
        return;
    }

    const sections = links
        .map(function (link) {
            const id = link.getAttribute('href');

            if (!id || !id.startsWith('#')) {
                return null;
            }

            return document.querySelector(id);
        })
        .filter(Boolean);

    /*
     * Smooth scroll with sticky-header offset.
     */
    links.forEach(function (link) {
        link.addEventListener('click', function (event) {
            const targetId = link.getAttribute('href');

            if (!targetId || !targetId.startsWith('#')) {
                return;
            }

            const target = document.querySelector(targetId);

            if (!target) {
                return;
            }

            event.preventDefault();

            const headerOffset =
                nav.offsetHeight +
                parseInt(
                    getComputedStyle(nav).top || '0',
                    10
                );

            const targetPosition =
                target.getBoundingClientRect().top +
                window.scrollY -
                headerOffset -
                12;

            window.scrollTo({
                top: targetPosition,
                behavior: 'smooth'
            });

            /*
             * Keep the URL hash without causing the browser
             * to perform its own jump.
             */
            history.replaceState(null, '', targetId);
        });
    });

    /*
     * Highlight the section currently in view.
     */
    if ('IntersectionObserver' in window) {
        const observer = new IntersectionObserver(
            function (entries) {
                entries.forEach(function (entry) {
                    if (!entry.isIntersecting) {
                        return;
                    }

                    const activeId = '#' + entry.target.id;

                    links.forEach(function (link) {
                        link.classList.toggle(
                            'is-active',
                            link.getAttribute('href') === activeId
                        );
                    });
                });
            },
            {
                rootMargin: '-25% 0px -60% 0px',
                threshold: 0
            }
        );

        sections.forEach(function (section) {
            observer.observe(section);
        });
    }
});