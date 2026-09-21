document.addEventListener('DOMContentLoaded', function () {
    const sections = document.querySelectorAll(
        '.sl-abac-laws-covered'
    );

    sections.forEach(function (section) {
        const tabs = section.querySelectorAll(
            '[data-law-tab]'
        );

        const panels = section.querySelectorAll(
            '[data-law-panel]'
        );

        if (!tabs.length || !panels.length) {
            return;
        }

        function activateLaw(law) {
            tabs.forEach(function (tab) {
                const isActive =
                    tab.getAttribute('data-law-tab') === law;

                tab.classList.toggle(
                    'is-active',
                    isActive
                );

                tab.setAttribute(
                    'aria-selected',
                    isActive ? 'true' : 'false'
                );

                tab.setAttribute(
                    'tabindex',
                    isActive ? '0' : '-1'
                );
            });

            panels.forEach(function (panel) {
                const isActive =
                    panel.getAttribute('data-law-panel') === law;

                panel.hidden = !isActive;

                panel.classList.toggle(
                    'is-active',
                    isActive
                );
            });
        }

        tabs.forEach(function (tab, index) {

            tab.addEventListener('click', function () {
                activateLaw(
                    tab.getAttribute('data-law-tab')
                );
            });


            tab.addEventListener('keydown', function (event) {

                let newIndex = null;

                if (event.key === 'ArrowRight') {
                    newIndex = (index + 1) % tabs.length;
                }

                if (event.key === 'ArrowLeft') {
                    newIndex =
                        (index - 1 + tabs.length) %
                        tabs.length;
                }

                if (newIndex !== null) {
                    event.preventDefault();

                    const nextTab = tabs[newIndex];

                    nextTab.focus();

                    activateLaw(
                        nextTab.getAttribute('data-law-tab')
                    );
                }
            });
        });
    });
});