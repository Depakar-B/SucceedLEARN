(function () {
	'use strict';

	var cfg = window.ahfSiteSearch || {};
	var panel = document.getElementById('epsh-search-panel');
	var backdrop = document.getElementById('epsh-search-backdrop');
	var toggle = document.getElementById('epsh-search-toggle');
	var input = document.getElementById('epsh-search-input');
	var resultsEl = document.getElementById('epsh-search-results');
	var statusEl = document.getElementById('epsh-search-status');
	var footerEl = document.getElementById('epsh-search-footer');
	var viewAll = document.getElementById('epsh-search-view-all');
	var closeBtn = panel ? panel.querySelector('.epsh-search-panel__close') : null;
	var form = panel ? panel.querySelector('.epsh-search-panel__form') : null;

	if (!panel || !toggle || !input || !resultsEl) {
		return;
	}

	var open = false;
	var debounceTimer = null;
	var controller = null;
	var activeIndex = -1;
	var flatLinks = [];
	var minChars = cfg.minChars || 2;
	var debounceMs = cfg.debounce || 400;
	var i18n = cfg.i18n || {};

	function setPanelTop() {
		var header = document.querySelector('.site-header') || document.querySelector('.genesis-header');
		var top = 88;
		if (header) {
			var rect = header.getBoundingClientRect();
			top = Math.max(64, Math.round(rect.bottom + 8));
		}
		panel.style.setProperty('--epsh-search-panel-top', top + 'px');
	}

	function closeMegaMenus() {
		var openItems = document.querySelectorAll('.epsh-nav-item.is-open');
		for (var i = 0; i < openItems.length; i++) {
			openItems[i].classList.remove('is-open');
			var trigger = openItems[i].querySelector('.epsh-nav-trigger');
			var p = openItems[i].querySelector('.epsh-nav-panel');
			if (trigger) {
				trigger.setAttribute('aria-expanded', 'false');
			}
			if (p) {
				p.classList.remove('is-visible');
				p.hidden = true;
			}
		}
	}

	function setOpen(next) {
		open = !!next;
		setPanelTop();
		panel.hidden = !open;
		if (open) { panel.style.display = ''; } else { panel.style.display = 'none'; }
		if (backdrop) {
			backdrop.hidden = !open;
			if (open) { backdrop.style.display = ''; } else { backdrop.style.display = 'none'; }
		}
		toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
		toggle.setAttribute('aria-label', open ? (i18n.close || 'Close search') : (i18n.open || 'Open search'));

		if (open) {
			closeMegaMenus();
			panel.classList.add('is-visible');
			window.setTimeout(function () {
				input.focus();
				input.select();
			}, 30);
		} else {
			panel.classList.remove('is-visible');
			activeIndex = -1;
		}
	}

	function togglePanel() {
		setOpen(!open);
	}

	function updateViewAll(q) {
		if (!viewAll || !footerEl) {
			return;
		}
		if (!q || q.length < minChars) {
			footerEl.hidden = true;
			return;
		}
		viewAll.href = (cfg.searchPage || (window.location.origin + '/')) + '?s=' + encodeURIComponent(q);
		footerEl.hidden = false;
	}

	function setStatus(text) {
		if (statusEl) {
			statusEl.textContent = text || '';
		}
	}

	function clearResults() {
		resultsEl.innerHTML = '';
		flatLinks = [];
		activeIndex = -1;
	}

	function renderResults(payload) {
		clearResults();
		var q = (payload && payload.query) || input.value.trim();
		var results = (payload && payload.results) || [];
		var message = (payload && payload.message) || '';

		updateViewAll(q);

		if (!results.length) {
			setStatus(message || (i18n.noResults || 'No results for "%s"').replace('%s', q));
			return;
		}

		setStatus('');

		var groups = {};
		var order = [];
		for (var i = 0; i < results.length; i++) {
			var item = results[i];
			var label = item.type_label || 'Other';
			if (!groups[label]) {
				groups[label] = [];
				order.push(label);
			}
			groups[label].push(item);
		}

		var html = '';
		for (var g = 0; g < order.length; g++) {
			var groupLabel = order[g];
			html += '<div class="epsh-search-group">';
			html += '<p class="epsh-search-group__title">' + escapeHtml(groupLabel) + '</p>';
			for (var r = 0; r < groups[groupLabel].length; r++) {
				var row = groups[groupLabel][r];
				html += '<a class="epsh-search-result" role="option" href="' + escapeAttr(row.url || '#') + '">';
				html += '<span class="epsh-search-result__title">' + escapeHtml(row.title || '') + '</span>';
				if (row.excerpt) {
					html += '<span class="epsh-search-result__excerpt">' + escapeHtml(row.excerpt) + '</span>';
				}
				html += '</a>';
			}
			html += '</div>';
		}

		resultsEl.innerHTML = html;
		flatLinks = Array.prototype.slice.call(resultsEl.querySelectorAll('.epsh-search-result'));
	}

	function escapeHtml(str) {
		return String(str)
			.replace(/&/g, '&amp;')
			.replace(/</g, '&lt;')
			.replace(/>/g, '&gt;')
			.replace(/"/g, '&quot;');
	}

	function escapeAttr(str) {
		return escapeHtml(str).replace(/'/g, '&#39;');
	}

	function fetchSuggestions(q) {
		if (controller) {
			controller.abort();
		}
		controller = typeof AbortController !== 'undefined' ? new AbortController() : null;

		setStatus(i18n.searching || 'Searching...');
		updateViewAll(q);

		var url = (cfg.ajaxUrl || '/wp-admin/admin-ajax.php') +
			'?action=' + encodeURIComponent(cfg.action || 'ahf_site_search') +
			'&q=' + encodeURIComponent(q);

		var opts = { credentials: 'same-origin' };
		if (controller) {
			opts.signal = controller.signal;
		}

		fetch(url, opts)
			.then(function (res) { return res.json(); })
			.then(function (json) {
				if (!json || !json.success) {
					var errMsg = (json && json.data && json.data.message) ? json.data.message : (i18n.unavailable || 'Search is temporarily unavailable');
					setStatus(errMsg);
					clearResults();
					return;
				}
				renderResults(json.data || {});
			})
			.catch(function (err) {
				if (err && err.name === 'AbortError') {
					return;
				}
				setStatus(i18n.unavailable || 'Search is temporarily unavailable');
			});
	}

	function onInput() {
		var q = input.value.trim();
		window.clearTimeout(debounceTimer);

		if (q.length < minChars) {
			if (controller) {
				controller.abort();
			}
			clearResults();
			if (footerEl) {
				footerEl.hidden = true;
			}
			setStatus(q.length ? (i18n.hint || 'Type at least 2 characters to search') : '');
			return;
		}

		debounceTimer = window.setTimeout(function () {
			fetchSuggestions(q);
		}, debounceMs);
	}

	function moveActive(delta) {
		if (!flatLinks.length) {
			return;
		}
		activeIndex += delta;
		if (activeIndex < 0) {
			activeIndex = flatLinks.length - 1;
		}
		if (activeIndex >= flatLinks.length) {
			activeIndex = 0;
		}
		for (var i = 0; i < flatLinks.length; i++) {
			flatLinks[i].classList.toggle('is-active', i === activeIndex);
		}
		flatLinks[activeIndex].focus();
	}

	input.addEventListener('input', onInput);

	input.addEventListener('keydown', function (e) {
		if (e.key === 'ArrowDown') {
			e.preventDefault();
			moveActive(1);
		} else if (e.key === 'ArrowUp') {
			e.preventDefault();
			moveActive(-1);
		} else if (e.key === 'Escape') {
			e.preventDefault();
			setOpen(false);
			toggle.focus();
		}
	});

	if (closeBtn) {
		closeBtn.addEventListener('click', function () {
			setOpen(false);
			toggle.focus();
		});
	}

	if (backdrop) {
		backdrop.addEventListener('click', function () {
			setOpen(false);
		});
	}

	document.addEventListener('keydown', function (e) {
		if (e.key === 'Escape' && open) {
			setOpen(false);
			toggle.focus();
		}
	});

	window.addEventListener('resize', function () {
		if (open) {
			setPanelTop();
		}
	});

	window.ahfSiteSearchApp = {
		toggle: togglePanel,
		open: function () { setOpen(true); },
		close: function () { setOpen(false); }
	};
})();