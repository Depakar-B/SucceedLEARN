/**
 * Theme header fallback JS — loaded only when Akaza Header Footer is inactive.
 */
(function () {
  'use strict';

  var navToggle = document.querySelector('[data-slf-nav-toggle]');
  var nav = document.getElementById('slf-primary-nav');
  var dropdowns = document.querySelectorAll('[data-slf-dropdown]');
  var searchToggle = document.querySelector('[data-slf-search-toggle]');
  var searchPanel = document.getElementById('slf-header-search');
  var searchClose = document.querySelector('[data-slf-search-close]');
  var searchInput = document.getElementById('slf-header-search-input');

  function closeDropdowns(except) {
    dropdowns.forEach(function (item) {
      if (except && item === except) {
        return;
      }
      item.classList.remove('is-open');
      var trigger = item.querySelector('.slf-nav__trigger');
      if (trigger) {
        trigger.setAttribute('aria-expanded', 'false');
      }
    });
  }

  function setDropdownOpen(item, open) {
    var trigger = item.querySelector('.slf-nav__trigger');
    item.classList.toggle('is-open', open);
    if (trigger) {
      trigger.setAttribute('aria-expanded', open ? 'true' : 'false');
    }
  }

  function isDesktopHoverNav() {
    return window.matchMedia('(hover: hover) and (min-width: 861px)').matches;
  }

  function setSearchOpen(open) {
    if (!searchPanel || !searchToggle) {
      return;
    }
    searchPanel.hidden = !open;
    searchToggle.setAttribute('aria-expanded', open ? 'true' : 'false');
    if (open && searchInput) {
      window.setTimeout(function () {
        searchInput.focus();
      }, 10);
    }
  }

  if (navToggle && nav) {
    navToggle.addEventListener('click', function () {
      var open = nav.classList.toggle('is-open');
      navToggle.setAttribute('aria-expanded', open ? 'true' : 'false');
      if (!open) {
        closeDropdowns();
      }
    });

    nav.querySelectorAll('a').forEach(function (link) {
      link.addEventListener('click', function () {
        nav.classList.remove('is-open');
        navToggle.setAttribute('aria-expanded', 'false');
        closeDropdowns();
        setSearchOpen(false);
      });
    });
  }

  dropdowns.forEach(function (item) {
    var trigger = item.querySelector('.slf-nav__trigger');
    if (!trigger) {
      return;
    }

    item.addEventListener('mouseenter', function () {
      if (!isDesktopHoverNav()) {
        return;
      }
      closeDropdowns(item);
      setDropdownOpen(item, true);
    });

    item.addEventListener('mouseleave', function () {
      if (!isDesktopHoverNav()) {
        return;
      }
      setDropdownOpen(item, false);
    });

    trigger.addEventListener('click', function (e) {
      e.preventDefault();
      if (isDesktopHoverNav()) {
        return;
      }
      var willOpen = !item.classList.contains('is-open');
      closeDropdowns(willOpen ? item : null);
      setDropdownOpen(item, willOpen);
    });
  });

  if (searchToggle && searchPanel) {
    searchToggle.addEventListener('click', function () {
      var open = searchPanel.hidden;
      closeDropdowns();
      setSearchOpen(open);
    });
  }

  if (searchClose) {
    searchClose.addEventListener('click', function () {
      setSearchOpen(false);
    });
  }

  document.addEventListener('click', function (e) {
    var target = e.target;
    if (!(target instanceof Element)) {
      return;
    }
    if (!target.closest('[data-slf-dropdown]')) {
      closeDropdowns();
    }
    if (
      searchPanel &&
      !searchPanel.hidden &&
      !target.closest('#slf-header-search') &&
      !target.closest('[data-slf-search-toggle]')
    ) {
      setSearchOpen(false);
    }
  });

  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') {
      closeDropdowns();
      setSearchOpen(false);
      if (nav && navToggle) {
        nav.classList.remove('is-open');
        navToggle.setAttribute('aria-expanded', 'false');
      }
    }
  });

  var header = document.querySelector('.slf-header');
  if (header) {
    var onScroll = function () {
      var threshold = header.classList.contains('slf-header--overlay') ? 80 : 40;
      if (window.scrollY > threshold) {
        header.classList.add('is-scrolled');
      } else {
        header.classList.remove('is-scrolled');
      }
    };
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();
  }
})();
