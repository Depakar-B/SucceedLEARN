/**
 * Scroll-to-top — show after scroll, smooth return to top.
 * Owns reading-progress width (viewport-safe).
 */
(function () {
  'use strict';

  function removeLegacyScrollTop() {
    var legacy = document.getElementById('scrollTopBtn');
    if (!legacy) {
      return;
    }
    var next = legacy.nextElementSibling;
    if (next && next.tagName === 'STYLE') {
      next.parentNode.removeChild(next);
    }
    next = legacy.nextElementSibling;
    if (next && next.tagName === 'SCRIPT' && (next.textContent || '').indexOf('scrollTopBtn') !== -1) {
      next.parentNode.removeChild(next);
    }
    legacy.parentNode.removeChild(legacy);
  }

  /**
   * Use viewport height — documentElement.clientHeight can equal scrollHeight
   * when html is sized to content, which left the bar stuck at 0%.
   * Drive fill via --sl-read-progress + scaleX so the footer snippet
   * cannot zero out width with its broken clientHeight math.
   */
  function updateReadProgress() {
    var bar = document.getElementById('read-progress-bar');
    if (!bar) {
      return;
    }

    var scrollTop = window.scrollY || document.documentElement.scrollTop || 0;
    var docHeight =
      Math.max(
        document.body ? document.body.scrollHeight : 0,
        document.documentElement.scrollHeight
      ) - (window.innerHeight || document.documentElement.clientHeight || 0);

    var progress = docHeight > 0 ? scrollTop / docHeight : 0;
    if (progress < 0) {
      progress = 0;
    } else if (progress > 1) {
      progress = 1;
    }

    document.documentElement.style.setProperty(
      '--sl-read-progress',
      progress.toFixed(4)
    );
    // Keep a sensible inline width for a11y/legacy, but CSS scaleX is authoritative.
    bar.style.width = '100%';
  }

  function onReady(fn) {
    if (document.readyState === 'loading') {
      document.addEventListener('DOMContentLoaded', fn);
    } else {
      fn();
    }
  }

  onReady(function () {
    removeLegacyScrollTop();
    updateReadProgress();
  });

  var progressTicking = false;
  window.addEventListener(
    'scroll',
    function () {
      if (!progressTicking) {
        window.requestAnimationFrame(function () {
          updateReadProgress();
          progressTicking = false;
        });
        progressTicking = true;
      }
    },
    { passive: true }
  );
  window.addEventListener('resize', updateReadProgress, { passive: true });

  var wrap = document.getElementById('sl-scroll-top');
  if (!wrap) {
    return;
  }

  var btn = wrap.querySelector('.sl-scroll-top');
  var threshold = 200;
  var ticking = false;

  function update() {
    var y = window.scrollY || document.documentElement.scrollTop || 0;
    wrap.classList.toggle('is-visible', y > threshold);
    ticking = false;
  }

  function onScroll() {
    if (!ticking) {
      window.requestAnimationFrame(update);
      ticking = true;
    }
  }

  if (btn) {
    btn.addEventListener('click', function () {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  }

  window.addEventListener('scroll', onScroll, { passive: true });
  update();
})();
