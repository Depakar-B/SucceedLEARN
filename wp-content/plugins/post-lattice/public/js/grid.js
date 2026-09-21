(function () {
  'use strict';

  function parseConfig(root) {
    var raw = root.getAttribute('data-plt-config') || '{}';
    var config;

    try {
      config = JSON.parse(raw);
    } catch (e) {
      config = {};
    }

    return {
      pageSize: parseInt(config.pageSize, 10) || 12,
      defaultSort: config.defaultSort || 'newest',
      filterType: config.filterType || 'category',
      enabledFilters: Array.isArray(config.enabledFilters) ? config.enabledFilters : [config.filterType || 'category'],
      defaultView: config.defaultView === 'list' ? 'list' : 'grid',
      showViewUI: !!config.showViewUI,
      showingOne: config.showingOne || 'Showing 1 article',
      showingAll: config.showingAll || 'Showing all {total} articles',
      showingPaged: config.showingPaged || 'Showing {visible} of {total} articles'
    };
  }

  function fillTemplate(template, map) {
    return String(template).replace(/\{(visible|total)\}/g, function (_, key) {
      return Object.prototype.hasOwnProperty.call(map, key) ? String(map[key]) : '';
    });
  }

  function bindArchive(root) {
    var config = parseConfig(root);
    var pageSize = config.pageSize;
    var defaultSort = config.defaultSort;
    var currentView = config.defaultView;

    var grid = root.querySelector('[data-plt-grid]');
    var searchInput = root.querySelector('[data-plt-search]');
    var searchClear = root.querySelector('[data-plt-search-clear]');
    var sortSelect = root.querySelector('[data-plt-sort]');
    var resetBtn = root.querySelector('[data-plt-reset]');
    var searchEmpty = root.querySelector('[data-plt-search-empty]');
    var loadMoreBtn = root.querySelector('[data-plt-more-btn]');
    var loadMoreWrap = root.querySelector('[data-plt-more]');
    var loadMoreStatus = root.querySelector('[data-plt-more-status]');
    var viewButtons = root.querySelectorAll('[data-plt-view]');
    var filterPanel = root.querySelector('[data-plt-filters]');
    var clearFiltersBtn = root.querySelector('[data-plt-clear-filters]');
    var categoryPills = root.querySelectorAll('[data-plt-category]');
    var yearPills = root.querySelectorAll('[data-plt-year]');
    var tagPills = root.querySelectorAll('[data-plt-tag]');

    var state = {
      categories: ['all'],
      years: ['all'],
      tags: ['all']
    };

    function getCards() {
      if (!grid) {
        return [];
      }
      return Array.prototype.slice.call(grid.querySelectorAll('.plt-card'));
    }

    function cardMatchesCategory(card) {
      if (state.categories.indexOf('all') !== -1) {
        return true;
      }
      var slugs = (card.getAttribute('data-categories') || '').split(/\s+/).filter(Boolean);
      return state.categories.some(function (item) {
        return slugs.indexOf(item) !== -1;
      });
    }

    function cardMatchesYear(card) {
      if (state.years.indexOf('all') !== -1) {
        return true;
      }
      var year = String(card.getAttribute('data-year') || '');
      return state.years.indexOf(year) !== -1;
    }

    function cardMatchesTag(card) {
      if (state.tags.indexOf('all') !== -1) {
        return true;
      }
      var slugs = (card.getAttribute('data-tags') || '').split(/\s+/).filter(Boolean);
      return state.tags.some(function (item) {
        return slugs.indexOf(item) !== -1;
      });
    }

    function cardMatchesSearch(card, query) {
      if (!query) {
        return true;
      }
      var title = (card.getAttribute('data-post-title') || '').toLowerCase();
      var excerptEl = card.querySelector('.plt-card__excerpt');
      var excerpt = excerptEl ? excerptEl.textContent.toLowerCase() : '';
      return title.indexOf(query) !== -1 || excerpt.indexOf(query) !== -1;
    }

    function getMatchingCards() {
      var query = searchInput ? searchInput.value.trim().toLowerCase() : '';
      return getCards().filter(function (card) {
        return cardMatchesCategory(card) && cardMatchesYear(card) && cardMatchesTag(card) && cardMatchesSearch(card, query);
      });
    }

    function getVisibleCards(matching) {
      return matching.filter(function (card) {
        return !card.classList.contains('is-load-hidden');
      });
    }

    function sortCards(sortValue) {
      if (!grid) {
        return;
      }
      var cards = getCards();
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
    }

    function updateLoadMoreStatus(matching) {
      if (!loadMoreStatus) {
        return;
      }

      var visible = getVisibleCards(matching).length;
      var total = matching.length;

      if (total === 0) {
        loadMoreStatus.textContent = '';
        return;
      }

      if (total === 1) {
        loadMoreStatus.textContent = config.showingOne;
        return;
      }

      if (total <= pageSize) {
        loadMoreStatus.textContent = fillTemplate(config.showingAll, { total: total, visible: visible });
        return;
      }

      loadMoreStatus.textContent = fillTemplate(config.showingPaged, { total: total, visible: visible });
    }

    function updateCardCategoryLabel(card) {
      if (config.enabledFilters.indexOf('category') === -1) {
        return;
      }

      var label = card.querySelector('.plt-card__badge');
      if (!label) {
        return;
      }

      var primary = card.getAttribute('data-primary-category') || '';
      if (state.categories.indexOf('all') !== -1) {
        label.textContent = primary;
        return;
      }

      var names = {};
      try {
        names = JSON.parse(card.getAttribute('data-category-names') || '{}') || {};
      } catch (e) {
        names = {};
      }

      var firstSelected = state.categories[0];
      label.textContent = names[firstSelected] || primary;
    }

    function applyFilters() {
      var matching = getMatchingCards();
      var matchingSet = {};

      matching.forEach(function (card) {
        matchingSet[card] = true;
      });

      getCards().forEach(function (card) {
        var matches = matching.indexOf(card) !== -1;
        card.classList.toggle('is-hidden', !matches);
        card.classList.remove('is-load-hidden');
        updateCardCategoryLabel(card);
      });

      matching.forEach(function (card, index) {
        if (index >= pageSize) {
          card.classList.add('is-load-hidden');
        }
      });

      if (searchEmpty) {
        var hasQuery = searchInput && searchInput.value.trim().length > 0;
        var hasFilter = state.categories.indexOf('all') === -1 || state.years.indexOf('all') === -1 || state.tags.indexOf('all') === -1;
        searchEmpty.hidden = !(hasQuery || hasFilter) || matching.length > 0;
      }

      if (loadMoreWrap) {
        loadMoreWrap.classList.toggle('is-hidden', matching.length <= pageSize);
      }

      updateLoadMoreStatus(matching);
    }

    function setView(view) {
      currentView = view === 'list' ? 'list' : 'grid';
      root.classList.toggle('is-view-list', currentView === 'list');
      root.classList.toggle('is-view-grid', currentView !== 'list');

      viewButtons.forEach(function (btn) {
        var isActive = btn.getAttribute('data-plt-view') === currentView;
        btn.classList.toggle('is-active', isActive);
      });
    }

    /* --- pill helpers (buttons with is-active class, single-select) --- */

    function getActivePillValue(nodeList, dataAttr) {
      var val = 'all';
      Array.prototype.forEach.call(nodeList, function (node) {
        if (node.classList.contains('is-active')) {
          val = node.getAttribute(dataAttr) || 'all';
        }
      });
      return val;
    }

    function activatePill(nodeList, clickedNode) {
      Array.prototype.forEach.call(nodeList, function (node) {
        node.classList.toggle('is-active', node === clickedNode);
      });
    }

    function syncFilterState() {
      state.categories = categoryPills.length ? [getActivePillValue(categoryPills, 'data-plt-category')] : ['all'];
      state.years      = yearPills.length     ? [getActivePillValue(yearPills,     'data-plt-year')]     : ['all'];
      state.tags       = tagPills.length      ? [getActivePillValue(tagPills,      'data-plt-tag')]      : ['all'];
    }

    function clearAllFilters() {
      Array.prototype.forEach.call(categoryPills, function (node) {
        node.classList.toggle('is-active', (node.getAttribute('data-plt-category') || '') === 'all');
      });
      Array.prototype.forEach.call(yearPills, function (node) {
        node.classList.toggle('is-active', (node.getAttribute('data-plt-year') || '') === 'all');
      });
      Array.prototype.forEach.call(tagPills, function (node) {
        node.classList.toggle('is-active', (node.getAttribute('data-plt-tag') || '') === 'all');
      });
      syncFilterState();
      applyFilters();
    }

    function loadMore() {
      var matching = getMatchingCards();
      var hidden = matching.filter(function (card) {
        return !card.classList.contains('is-hidden') && card.classList.contains('is-load-hidden');
      });

      hidden.slice(0, pageSize).forEach(function (card) {
        card.classList.remove('is-load-hidden');
      });

      var remaining = matching.filter(function (card) {
        return !card.classList.contains('is-hidden') && card.classList.contains('is-load-hidden');
      });

      if (loadMoreWrap) {
        loadMoreWrap.classList.toggle('is-hidden', remaining.length === 0);
      }

      updateLoadMoreStatus(matching);
    }

    function runSearch() {
      if (searchClear && searchInput) {
        searchClear.hidden = searchInput.value.length === 0;
      }
      applyFilters();
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
        sortCards(sortSelect.value || defaultSort);
        applyFilters();
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
          sortSelect.value = defaultSort;
        }
        clearAllFilters();
        setView(config.defaultView);
        sortCards(defaultSort);
        runSearch();
      });
    }

    Array.prototype.forEach.call(categoryPills, function (node) {
      node.addEventListener('click', function () {
        activatePill(categoryPills, node);
        syncFilterState();
        applyFilters();
      });
    });

    Array.prototype.forEach.call(yearPills, function (node) {
      node.addEventListener('click', function () {
        activatePill(yearPills, node);
        syncFilterState();
        applyFilters();
      });
    });

    Array.prototype.forEach.call(tagPills, function (node) {
      node.addEventListener('click', function () {
        activatePill(tagPills, node);
        syncFilterState();
        applyFilters();
      });
    });

    if (clearFiltersBtn) {
      clearFiltersBtn.addEventListener('click', function () {
        clearAllFilters();
      });
    }

    if (loadMoreBtn) {
      loadMoreBtn.addEventListener('click', loadMore);
    }

    if (config.showViewUI && viewButtons.length) {
      viewButtons.forEach(function (btn) {
        btn.addEventListener('click', function () {
          setView(btn.getAttribute('data-plt-view'));
        });
      });
    }

    if (filterPanel) {
      syncFilterState();
    }

    setView(config.defaultView);
    applyFilters();
  }

  function init() {
    var archives = document.querySelectorAll('[data-plt-archive]');
    Array.prototype.forEach.call(archives, bindArchive);
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }
})();
