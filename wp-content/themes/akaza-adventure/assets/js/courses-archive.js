(function () {
  'use strict';

  var DEFAULT_SORT = 'newest';
  var root = document.querySelector('.slf-courses-archive');
  var chromeRoot = document.body.classList.contains('slf-courses-archive-page')
    ? document.body
    : root;
  if (!root || !chromeRoot) {
    return;
  }

  var searchInput = document.getElementById('slf-courses-search-input');
  var searchClear = document.getElementById('slf-courses-search-clear');
  var sortSelect = document.getElementById('slf-courses-sort');
  var resetBtn = document.getElementById('slf-courses-reset');
  var searchEmpty = document.getElementById('slf-courses-search-empty');
  var catToggle = document.querySelector('[data-slf-courses-cat-toggle]');
  var catPanel = document.getElementById('slf-courses-frame-side');
  var catScroll = catPanel ? catPanel.querySelector('.slf-courses-frame__side-body') : null;
  var topBar = document.querySelector('[data-slf-courses-top]');
  var usePluginHeader = document.body.classList.contains('epsh-smart-header');
  var cachedTopBarHeight = 0;
  var CHROME_GAP = 12;

  var lastScrollY = window.scrollY || 0;
  var chromeHidden = false;
  var offsetTicking = false;
  var scrollSpyTicking = false;
  var SCROLL_MIN = 48;
  var SCROLL_DELTA = 8;

  function getSiteHeader() {
    return document.querySelector('.site-header, .genesis-header, .slf-header');
  }

  function readEpshHeaderOffset() {
    var value = getComputedStyle(document.documentElement).getPropertyValue('--epsh-desktop-header-offset').trim();
    if (!value) {
      return 0;
    }
    return parseFloat(value) || 0;
  }

  function getHeaderHeight() {
    var header = getSiteHeader();
    if (header) {
      var measured = Math.ceil(header.getBoundingClientRect().height || header.offsetHeight || 0);
      if (measured > 0) {
        return measured;
      }
    }
    var epshOffset = readEpshHeaderOffset();
    if (epshOffset > 0) {
      return epshOffset;
    }
    return 76;
  }

  function syncShellClearance() {
    if (!root || isHeaderHidden()) {
      return;
    }

    var headerClearance = getHeaderHeight() + CHROME_GAP;
    var shell = document.querySelector('.slf-courses-shell');
    if (!shell) {
      return;
    }

    var shellTop = shell.getBoundingClientRect().top;
    if (shellTop < headerClearance - 1) {
      root.style.paddingTop = Math.ceil(headerClearance - shellTop) + 'px';
    } else if (!document.body.classList.contains('slf-has-breadcrumbs')) {
      root.style.paddingTop = '';
    }
  }

  function measureTopBarHeight() {
    if (!topBar) {
      return 64;
    }

    var rect = topBar.getBoundingClientRect();
    var height = Math.ceil(rect.height);

    if (height < 48 || height > 200) {
      return 64;
    }

    return height;
  }

  function getTopBarHeight() {
    if (cachedTopBarHeight > 0) {
      return cachedTopBarHeight;
    }
    cachedTopBarHeight = measureTopBarHeight();
    return cachedTopBarHeight;
  }

  function isHeaderHidden() {
    if (document.body.classList.contains('epsh-header-is-hidden')) {
      return true;
    }
    return document.body.classList.contains('slf-chrome-hidden');
  }

  function getStickyTop() {
    var sticky = parseFloat(getComputedStyle(chromeRoot).getPropertyValue('--slf-sticky-top'));
    if (!isNaN(sticky) && sticky >= 0) {
      return sticky;
    }
    if (isHeaderHidden()) {
      return CHROME_GAP;
    }
    return getHeaderHeight() + CHROME_GAP + getTopBarHeight();
  }

  function getScrollOffset() {
    return getStickyTop() + 12;
  }

  function updateChromeOffsets() {
    var headerH = getHeaderHeight();
    var topH = getTopBarHeight();
    var hidden = isHeaderHidden();

    chromeRoot.style.setProperty('--slf-header-height', headerH + 'px');
    chromeRoot.style.setProperty('--slf-courses-top-height', topH + 'px');
    root.style.setProperty('--slf-header-height', headerH + 'px');
    root.style.setProperty('--slf-courses-top-height', topH + 'px');

    if (hidden) {
      chromeRoot.style.setProperty('--slf-header-offset', '0px');
      chromeRoot.style.setProperty('--slf-sticky-top', CHROME_GAP + 'px');
      root.style.setProperty('--slf-header-offset', '0px');
      root.style.setProperty('--slf-sticky-top', CHROME_GAP + 'px');
      root.style.paddingTop = '0';
    } else {
      var headerOffset = headerH + CHROME_GAP;
      chromeRoot.style.setProperty('--slf-header-offset', headerOffset + 'px');
      chromeRoot.style.setProperty('--slf-sticky-top', (headerOffset + topH) + 'px');
      root.style.setProperty('--slf-header-offset', headerOffset + 'px');
      root.style.setProperty('--slf-sticky-top', (headerOffset + topH) + 'px');
      syncShellClearance();
    }
  }

  function queueChromeOffsetUpdate() {
    if (offsetTicking) {
      return;
    }
    offsetTicking = true;
    window.requestAnimationFrame(function () {
      updateChromeOffsets();
      offsetTicking = false;
    });
  }

  function setChromeHidden(hidden) {
    if (usePluginHeader || chromeHidden === hidden) {
      return;
    }
    chromeHidden = hidden;
    document.body.classList.toggle('slf-chrome-hidden', hidden);
    updateChromeOffsets();
  }

  function onScrollChrome() {
    if (usePluginHeader) {
      queueChromeOffsetUpdate();
      return;
    }

    var y = window.scrollY || 0;
    var delta = y - lastScrollY;

    if (y <= SCROLL_MIN) {
      setChromeHidden(false);
    } else if (delta > SCROLL_DELTA) {
      setChromeHidden(true);
    } else if (delta < -SCROLL_DELTA) {
      setChromeHidden(false);
    }

    lastScrollY = y;
    updateChromeOffsets();
  }

  function getVisibleSections() {
    return getSections().filter(function (section) {
      return !section.classList.contains('is-hidden');
    });
  }

  function setActiveCategory(targetId) {
    if (!targetId) {
      return;
    }
    document.querySelectorAll('.slf-courses-cat-item').forEach(function (item) {
      item.classList.remove('is-active');
    });
    var link = document.querySelector('.slf-courses-cat-link[data-scroll-target="' + targetId + '"]');
    if (link) {
      link.closest('.slf-courses-cat-item').classList.add('is-active');
      scrollActiveSidebarItemIntoView(link);
    }
  }

  function scrollActiveSidebarItemIntoView(link) {
    var scrollEl = catScroll || catPanel;
    if (!link || !scrollEl) {
      return;
    }
    if (scrollEl.scrollHeight <= scrollEl.clientHeight + 1) {
      return;
    }
    link.scrollIntoView({ block: 'nearest', behavior: 'smooth' });
  }

  function updateActiveSectionFromScroll() {
    var sections = getVisibleSections();
    if (!sections.length) {
      return;
    }

    var scrollPos = (window.scrollY || window.pageYOffset || 0) + getScrollOffset() + 20;
    var activeId = sections[0].id;

    sections.forEach(function (section) {
      var sectionTop = section.getBoundingClientRect().top + window.pageYOffset;
      if (sectionTop <= scrollPos) {
        activeId = section.id;
      }
    });

    setActiveCategory(activeId);
  }

  function queueScrollSpyUpdate() {
    if (scrollSpyTicking) {
      return;
    }
    scrollSpyTicking = true;
    window.requestAnimationFrame(function () {
      updateActiveSectionFromScroll();
      scrollSpyTicking = false;
    });
  }

  function scrollToTarget(targetId) {
    var target = document.getElementById(targetId);
    if (!target) {
      return;
    }
    var top = target.getBoundingClientRect().top + window.pageYOffset - getScrollOffset();
    window.scrollTo({ top: top, behavior: 'smooth' });
  }

  function getCards() {
    return Array.prototype.slice.call(document.querySelectorAll('.slf-courses-card'));
  }

  function getSections() {
    return Array.prototype.slice.call(document.querySelectorAll('.slf-courses-section'));
  }

  function runSearch() {
    if (!searchInput) {
      return;
    }
    var query = searchInput.value.trim().toLowerCase();
    if (searchClear) {
      searchClear.hidden = query.length === 0;
    }

    var visibleCount = 0;
    getCards().forEach(function (card) {
      var title = (card.getAttribute('data-course-title') || '').toLowerCase();
      var show = query.length === 0 || title.indexOf(query) !== -1;
      card.classList.toggle('is-hidden', !show);
      if (show) {
        visibleCount++;
      }
    });

    getSections().forEach(function (section) {
      var hasVisible = section.querySelector('.slf-courses-card:not(.is-hidden)');
      section.classList.toggle('is-hidden', !hasVisible);
    });

    if (searchEmpty) {
      searchEmpty.hidden = query.length === 0 || visibleCount > 0;
    }

    queueScrollSpyUpdate();
  }

  function sortCourses(sortValue) {
    getSections().forEach(function (section) {
      var grid = section.querySelector('.slf-courses-grid');
      if (!grid) {
        return;
      }
      var cards = Array.prototype.slice.call(grid.querySelectorAll('.slf-courses-card'));
      cards.sort(function (a, b) {
        if (sortValue === 'a-z' || sortValue === 'z-a') {
          var titleA = (a.getAttribute('data-sort-title') || '').toString();
          var titleB = (b.getAttribute('data-sort-title') || '').toString();
          var cmp = titleA.localeCompare(titleB);
          return sortValue === 'z-a' ? -cmp : cmp;
        }
        var dateA = parseInt(a.getAttribute('data-sort-date'), 10) || 0;
        var dateB = parseInt(b.getAttribute('data-sort-date'), 10) || 0;
        return sortValue === 'oldest' ? dateA - dateB : dateB - dateA;
      });
      cards.forEach(function (card) {
        grid.appendChild(card);
      });
    });
  }

  if (searchInput) {
    searchInput.addEventListener('input', runSearch);
    searchInput.addEventListener('keydown', function (e) {
      if (e.key === 'Enter') {
        e.preventDefault();
        runSearch();
        searchInput.blur();
      }
    });
  }

  if (searchClear) {
    searchClear.addEventListener('click', function () {
      searchInput.value = '';
      searchClear.hidden = true;
      searchInput.focus();
      runSearch();
    });
  }

  if (sortSelect) {
    sortSelect.addEventListener('change', function () {
      sortCourses(sortSelect.value || DEFAULT_SORT);
    });
  }

  if (resetBtn) {
    resetBtn.addEventListener('click', function () {
      if (searchInput) {
        searchInput.value = '';
      }
      if (searchClear) {
        searchClear.hidden = true;
      }
      if (sortSelect) {
        sortSelect.value = DEFAULT_SORT;
      }
      sortCourses(DEFAULT_SORT);
      runSearch();
      var firstSection = getVisibleSections()[0];
      if (firstSection) {
        setActiveCategory(firstSection.id);
        scrollToTarget(firstSection.id);
      }
      if (history.replaceState) {
        history.replaceState(null, '', window.location.pathname);
      }
    });
  }

  document.addEventListener('click', function (e) {
    var link = e.target.closest('.slf-courses-cat-link');
    if (!link) {
      return;
    }
    e.preventDefault();
    var targetId = link.getAttribute('data-scroll-target');
    if (!targetId) {
      return;
    }
    setActiveCategory(targetId);
    scrollToTarget(targetId);
    if (history.replaceState) {
      history.replaceState(null, '', '#' + targetId);
    }
    if (catPanel && window.matchMedia('(max-width: 991px)').matches) {
      catPanel.classList.remove('is-open');
      if (catToggle) {
        catToggle.setAttribute('aria-expanded', 'false');
      }
    }
  });

  if (catToggle && catPanel) {
    catToggle.addEventListener('click', function () {
      var open = catPanel.classList.toggle('is-open');
      catToggle.setAttribute('aria-expanded', open ? 'true' : 'false');
    });
  }

  function handleInitialHash() {
    var hash = window.location.hash.replace('#', '');
    if (!hash || !document.getElementById(hash)) {
      return;
    }
    setTimeout(function () {
      setActiveCategory(hash);
      scrollToTarget(hash);
    }, 150);
  }

  function onScrollPage() {
    onScrollChrome();
    queueScrollSpyUpdate();
  }

  updateChromeOffsets();
  syncShellClearance();
  window.addEventListener('resize', function () {
    cachedTopBarHeight = 0;
    updateChromeOffsets();
    syncShellClearance();
    queueScrollSpyUpdate();
  });
  window.addEventListener('load', function () {
    updateChromeOffsets();
    syncShellClearance();
    queueScrollSpyUpdate();
  });
  window.addEventListener('scroll', onScrollPage, { passive: true });

  if (usePluginHeader && typeof MutationObserver !== 'undefined') {
    var bodyObserver = new MutationObserver(queueChromeOffsetUpdate);
    bodyObserver.observe(document.body, { attributes: true, attributeFilter: ['class'] });
    document.addEventListener('epsh-header-hide', queueChromeOffsetUpdate);
  }
  handleInitialHash();
  runSearch();
  queueScrollSpyUpdate();
})();
