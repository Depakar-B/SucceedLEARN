/**
 * Getting Started — staggered card entrance on first viewport entry.
 */
(function () {
  "use strict";

  function prefersReducedMotion() {
    return window.matchMedia("(prefers-reduced-motion: reduce)").matches;
  }

  function init() {
    var section = document.querySelector(".sl-home-getting-started-section");
    if (!section) {
      return;
    }

    if (prefersReducedMotion()) {
      section.classList.add("is-inview");
      return;
    }

    if (!("IntersectionObserver" in window)) {
      section.classList.add("is-inview");
      return;
    }

    var observer = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (entry) {
          if (!entry.isIntersecting) {
            return;
          }
          section.classList.add("is-inview");
          observer.unobserve(section);
        });
      },
      { threshold: 0.2 }
    );

    observer.observe(section);
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", init);
  } else {
    init();
  }
})();
