/**
 * Clients logo carousel — seamless marquee + click/drag to scrub.
 */
(function () {
  "use strict";

  var DURATION_S = 32;

  function prefersReducedMotion() {
    return window.matchMedia("(prefers-reduced-motion: reduce)").matches;
  }

  function duplicateTrack(track) {
    var set = track.querySelector("[data-clients-set]");
    if (!set || track.querySelector("[data-clients-clone]")) {
      return;
    }

    var clone = set.cloneNode(true);
    clone.setAttribute("data-clients-clone", "true");
    clone.setAttribute("aria-hidden", "true");
    clone.querySelectorAll("img").forEach(function (img) {
      img.setAttribute("alt", "");
      img.removeAttribute("loading");
    });
    track.appendChild(clone);
  }

  function getTranslateX(el) {
    var style = window.getComputedStyle(el);
    var transform = style.transform;
    if (!transform || transform === "none") {
      return 0;
    }
    var matrix = new DOMMatrixReadOnly(transform);
    return matrix.m41;
  }

  function wrapOffset(tx, half) {
    if (!half) {
      return tx;
    }
    while (tx > 0) {
      tx -= half;
    }
    while (tx < -half) {
      tx += half;
    }
    return tx;
  }

  function enableDrag(section, row) {
    var track = row.querySelector("[data-clients-track]");
    var set = track && track.querySelector("[data-clients-set]");
    if (!track || !set) {
      return;
    }

    var dragging = false;
    var pointerId = null;
    var startX = 0;
    var startTx = 0;
    var moved = false;

    function halfWidth() {
      return set.offsetWidth || 0;
    }

    function onPointerDown(event) {
      if (event.button !== 0 && event.pointerType === "mouse") {
        return;
      }

      dragging = true;
      moved = false;
      pointerId = event.pointerId;
      startX = event.clientX;
      startTx = getTranslateX(track);

      section.classList.add("is-dragging", "is-paused");
      track.style.animation = "none";
      track.style.transform = "translate3d(" + startTx + "px, 0, 0)";

      try {
        row.setPointerCapture(event.pointerId);
      } catch (err) {
        /* ignore */
      }

      event.preventDefault();
    }

    function onPointerMove(event) {
      if (!dragging || event.pointerId !== pointerId) {
        return;
      }

      var dx = event.clientX - startX;
      if (Math.abs(dx) > 3) {
        moved = true;
      }

      var tx = wrapOffset(startTx + dx, halfWidth());
      track.style.transform = "translate3d(" + tx + "px, 0, 0)";
      event.preventDefault();
    }

    function endDrag(event) {
      if (!dragging || (event && event.pointerId !== pointerId)) {
        return;
      }

      dragging = false;
      pointerId = null;

      var tx = getTranslateX(track);
      var half = halfWidth();
      tx = wrapOffset(tx, half);

      section.classList.remove("is-dragging");

      if (prefersReducedMotion()) {
        track.style.transform = "translate3d(" + tx + "px, 0, 0)";
        section.classList.remove("is-paused");
        return;
      }

      // Resume CSS marquee from the dragged position.
      var progress = half > 0 ? Math.abs(tx) / half : 0;
      track.style.animation = "";
      track.style.transform = "";
      track.style.animationDelay = "-" + (progress * DURATION_S).toFixed(3) + "s";

      section.classList.remove("is-paused");
    }

    function onClickCapture(event) {
      // Prevent accidental clicks/drags on images after a scrub.
      if (moved) {
        event.preventDefault();
        event.stopPropagation();
        moved = false;
      }
    }

    row.addEventListener("pointerdown", onPointerDown);
    row.addEventListener("pointermove", onPointerMove);
    row.addEventListener("pointerup", endDrag);
    row.addEventListener("pointercancel", endDrag);
    row.addEventListener("lostpointercapture", endDrag);
    row.addEventListener("click", onClickCapture, true);

    track.querySelectorAll("img").forEach(function (img) {
      img.setAttribute("draggable", "false");
    });
  }

  function initSection(section) {
    var tracks = section.querySelectorAll("[data-clients-track]");
    var rows = section.querySelectorAll("[data-clients-row]");
    if (!tracks.length) {
      return;
    }

    tracks.forEach(duplicateTrack);
    rows.forEach(function (row) {
      enableDrag(section, row);
    });

    if (prefersReducedMotion()) {
      section.classList.add("is-reduced");
      return;
    }

    section.classList.add("is-ready");
    section.style.setProperty("--slf-clients-duration", DURATION_S + "s");

    section.addEventListener("focusin", function () {
      section.classList.add("is-paused");
    });

    section.addEventListener("focusout", function (event) {
      if (!section.contains(event.relatedTarget) && !section.classList.contains("is-dragging")) {
        section.classList.remove("is-paused");
      }
    });
  }

  function boot() {
    document.querySelectorAll("[data-clients-carousel]").forEach(initSection);
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", boot);
  } else {
    boot();
  }
})();
