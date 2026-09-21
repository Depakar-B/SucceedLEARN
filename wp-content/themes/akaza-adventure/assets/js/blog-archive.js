(function () {
  'use strict';

  var DEFAULT_SORT = 'newest';
  var PAGE_SIZE = 12;

  var root = document.querySelector('.slf-blog-archive');
  if (!root) {
    return;
  }

  var grid = document.getElementById('slf-blog-grid');
  var searchInput = document.getElementById('slf-blog-search-input');
  var searchClear = document.getElementById('slf-blog-search-clear');
  var sortSelect = document.getElementById('slf-blog-sort');
  var resetBtn = document.getElementById('slf-blog-reset');
  var searchEmpty = document.getElementById('slf-blog-search-empty');
  var loadMoreBtn = document.getElementById('slf-blog-load-more');
  var loadMoreWrap = document.getElementById('slf-blog-load-more-wrap');
  var loadMoreStatus = document.getElementById('slf-blog-load-more-status');
  var pills = document.querySelectorAll('.slf-blog-pill');
  var yearPills = document.querySelectorAll('.slf-blog-pill[data-year]');
  var hasYearFilter = yearPills.length > 0;

  var activeCategory = 'all';
  var activeYear = 'all';

  function getCards() {
    if (!grid) {
      return [];
    }
    return Array.prototype.slice.call(grid.querySelectorAll('.slf-blog-card'));
  }

  function cardMatchesCategory(card) {
    if (activeCategory === 'all') {
      return true;
    }
    var slugs = (card.getAttribute('data-categories') || '').split(/\s+/).filter(Boolean);
    return slugs.indexOf(activeCategory) !== -1;
  }

  function cardMatchesYear(card) {
    if (activeYear === 'all') {
      return true;
    }
    return String(card.getAttribute('data-year') || '') === String(activeYear);
  }

  function cardMatchesSearch(card, query) {
    if (!query) {
      return true;
    }
    var title = (card.getAttribute('data-post-title') || '').toLowerCase();
    var excerptEl = card.querySelector('.slf-blog-card__excerpt');
    var excerpt = excerptEl ? excerptEl.textContent.toLowerCase() : '';
    return title.indexOf(query) !== -1 || excerpt.indexOf(query) !== -1;
  }

  function getMatchingCards() {
    var query = searchInput ? searchInput.value.trim().toLowerCase() : '';
    return getCards().filter(function (card) {
      return cardMatchesCategory(card) && cardMatchesYear(card) && cardMatchesSearch(card, query);
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

  function setActivePill(value) {
    pills.forEach(function (pill) {
      var isActive = hasYearFilter
        ? pill.getAttribute('data-year') === value
        : pill.getAttribute('data-category') === value;
      pill.classList.toggle('is-active', isActive);
    });
  }

  function updateLoadMoreStatus(matching) {
    if (!loadMoreStatus) {
      return;
    }

    var visible = getVisibleCards(matching);
    var total = matching.length;

    if (total === 0) {
      loadMoreStatus.textContent = '';
      return;
    }

    if (total <= PAGE_SIZE) {
      loadMoreStatus.textContent = total === 1
        ? 'Showing 1 article'
        : 'Showing all ' + total + ' articles';
      return;
    }

    loadMoreStatus.textContent = 'Showing ' + visible.length + ' of ' + total + ' articles';
  }

  function updateCardCategoryLabel(card) {
    if (hasYearFilter) {
      return;
    }

    var label = card.querySelector('.slf-blog-card__category');
    if (!label) {
      return;
    }

    var primary = card.getAttribute('data-primary-category') || '';
    if (activeCategory === 'all') {
      label.textContent = primary;
      return;
    }

    var names = {};
    try {
      names = JSON.parse(card.getAttribute('data-category-names') || '{}') || {};
    } catch (e) {
      names = {};
    }

    label.textContent = names[activeCategory] || primary;
  }

  function applyFilters() {
    var matching = getMatchingCards();
    var matchingSet = new Set(matching);

    getCards().forEach(function (card) {
      var matches = matchingSet.has(card);
      card.classList.toggle('is-hidden', !matches);
      card.classList.remove('is-load-hidden');
      updateCardCategoryLabel(card);
    });

    matching.forEach(function (card, index) {
      if (index >= PAGE_SIZE) {
        card.classList.add('is-load-hidden');
      }
    });

    if (searchEmpty) {
      var hasQuery = searchInput && searchInput.value.trim().length > 0;
      var hasFilter = activeCategory !== 'all' || activeYear !== 'all';
      searchEmpty.hidden = !(hasQuery || hasFilter) || matching.length > 0;
    }

    if (loadMoreWrap) {
      loadMoreWrap.classList.toggle('is-hidden', matching.length <= PAGE_SIZE);
    }

    updateLoadMoreStatus(matching);
  }

  function loadMore() {
    var matching = getMatchingCards();
    var hidden = matching.filter(function (card) {
      return !card.classList.contains('is-hidden') && card.classList.contains('is-load-hidden');
    });

    hidden.slice(0, PAGE_SIZE).forEach(function (card) {
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
      var sortValue = sortSelect.value || DEFAULT_SORT;
      sortCards(sortValue);
      applyFilters();
      if (history.replaceState) {
        var url = new URL(window.location.href);
        url.searchParams.set('sort', sortValue);
        history.replaceState(null, '', url.toString());
      }
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
      activeCategory = 'all';
      activeYear = 'all';
      setActivePill('all');
      sortCards(DEFAULT_SORT);
      runSearch();
      if (history.replaceState) {
        history.replaceState(null, '', window.location.pathname);
      }
    });
  }

  pills.forEach(function (pill) {
    pill.addEventListener('click', function () {
      if (hasYearFilter) {
        activeYear = pill.getAttribute('data-year') || 'all';
        setActivePill(activeYear);
      } else {
        activeCategory = pill.getAttribute('data-category') || 'all';
        setActivePill(activeCategory);
      }
      applyFilters();
    });
  });

  if (loadMoreBtn) {
    loadMoreBtn.addEventListener('click', loadMore);
  }

  applyFilters();
})();
