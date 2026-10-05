document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.msa-faq__question').forEach(function (button) {
        button.addEventListener('click', function () {
            const target = document.getElementById(
                button.getAttribute('aria-controls')
            );

            if (!target) {
                return;
            }

            const isOpen = button.getAttribute('aria-expanded') === 'true';

            button.setAttribute('aria-expanded', String(!isOpen));
            target.hidden = isOpen;
        });
    });
});
