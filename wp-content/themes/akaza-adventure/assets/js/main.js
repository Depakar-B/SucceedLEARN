/**
 * Akaza Adventure — site scripts (non-header).
 * Theme header behavior lives in header-fallback.js when AHF is inactive.
 */
(function () {
  'use strict';

  var form = document.querySelector('[data-slf-form]');
  if (form) {
    form.addEventListener('submit', function (e) {
      var status = form.querySelector('.slf-form__status');
      var email = form.querySelector('input[name="email"]');
      if (email && !email.value.includes('@')) {
        e.preventDefault();
        if (status) {
          status.hidden = false;
          status.textContent = 'Please enter a valid work email.';
          status.style.color = '#ea3f23';
        }
        return;
      }
      if (status) {
        status.hidden = false;
        status.textContent = 'Sending…';
        status.style.color = '#00982b';
      }
    });
  }
})();
