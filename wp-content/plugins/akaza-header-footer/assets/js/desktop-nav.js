(function () {
	'use strict';

	var config = window.ahfDesktopNav || {};
	var desktopMin = parseInt(config.desktopMin, 10) || 1201;
	var nav = null;
	var extras = null;
	var items = [];
	var mq = window.matchMedia('(min-width: ' + desktopMin + 'px)');
	var closeTimer = null;
	var CLOSE_DELAY = 350;
	var PANEL_ANIM_MS = 420;
	var bound = false;

	function isDesktop() {
		return mq.matches;
	}

	function isPanelFullyOpen(item) {
		if (!item) {
			return false;
		}

		var panel = getPanel(item);
		return !!(
			item.classList.contains('is-open') &&
			panel &&
			!panel.hidden &&
			panel.classList.contains('is-visible')
		);
	}

	function cancelScheduledClose() {
		if (closeTimer) {
			window.clearTimeout(closeTimer);
			closeTimer = null;
		}
	}

	function scheduleClose(item) {
		cancelScheduledClose();
		closeTimer = window.setTimeout(function () {
			if (isPointerOverOpenMenu()) {
				return;
			}
			closeItem(item);
			closeTimer = null;
		}, CLOSE_DELAY);
	}

	function getPanel(item) {
		return item ? item.querySelector('.epsh-nav-panel') : null;
	}

	function pointInRect(x, y, rect) {
		return x >= rect.left && x <= rect.right && y >= rect.top && y <= rect.bottom;
	}

	function getOpenItem() {
		for (var i = 0; i < items.length; i++) {
			if (items[i].classList.contains('is-open')) {
				return items[i];
			}
		}
		return null;
	}

	function isPointerOverOpenMenu() {
		if (!isDesktop()) {
			return false;
		}

		var open = getOpenItem();
		if (!open) {
			return false;
		}

		var panel = getPanel(open);
		var trigger = open.querySelector('.epsh-nav-trigger');
		if (!panel || !trigger) {
			return false;
		}

		var x;
		var y;
		if (window._epshPointer && typeof window._epshPointer.x === 'number') {
			x = window._epshPointer.x;
			y = window._epshPointer.y;
		} else {
			return open.matches(':hover') || panel.matches(':hover');
		}

		var triggerRect = trigger.getBoundingClientRect();
		var panelRect = panel.getBoundingClientRect();
		var itemRect = open.getBoundingClientRect();

		if (pointInRect(x, y, itemRect) || pointInRect(x, y, panelRect) || pointInRect(x, y, triggerRect)) {
			return true;
		}

		var bridgeTop = Math.min(triggerRect.bottom, panelRect.top);
		var bridgeBottom = Math.max(triggerRect.bottom, panelRect.top);
		if (bridgeBottom > bridgeTop) {
			var bridgeRect = {
				top: bridgeTop,
				bottom: bridgeBottom,
				left: Math.min(triggerRect.left, panelRect.left) - 12,
				right: Math.max(triggerRect.right, panelRect.right) + 12
			};
			if (pointInRect(x, y, bridgeRect)) {
				return true;
			}
		}

		return false;
	}

	function hidePanelAfterAnimation(panel) {
		if (!panel) {
			return;
		}

		panel._epshHideToken = (panel._epshHideToken || 0) + 1;
		var token = panel._epshHideToken;
		var done = false;
		var finish = function () {
			if (done || token !== panel._epshHideToken) {
				return;
			}
			done = true;
			if (!panel.classList.contains('is-visible')) {
				panel.hidden = true;
			}
		};

		panel.addEventListener('transitionend', function onEnd(event) {
			if (event.target !== panel || event.propertyName !== 'opacity') {
				return;
			}
			panel.removeEventListener('transitionend', onEnd);
			finish();
		});

		window.setTimeout(finish, PANEL_ANIM_MS + 60);
	}

	function showPanel(panel) {
		if (!panel) {
			return;
		}

		panel._epshHideToken = (panel._epshHideToken || 0) + 1;
		var token = panel._epshHideToken;

		if (!panel.hidden && panel.classList.contains('is-visible')) {
			return;
		}

		panel.hidden = false;
		panel.classList.remove('is-visible');

		window.requestAnimationFrame(function () {
			window.requestAnimationFrame(function () {
				if (token !== panel._epshHideToken) {
					return;
				}
				panel.classList.add('is-visible');
			});
		});
	}

	function closeItem(item) {
		if (!item) {
			return;
		}

		item.classList.remove('is-open');
		var trigger = item.querySelector('.epsh-nav-trigger');
		var panel = getPanel(item);

		if (trigger) {
			trigger.setAttribute('aria-expanded', 'false');
		}
		if (panel) {
			panel.classList.remove('is-visible');
			panel.style.left = '';
			panel.style.right = '';
			panel.style.maxWidth = '';
			panel.style.transform = '';
			hidePanelAfterAnimation(panel);
		}
	}

	function closeAll(except) {
		items.forEach(function (item) {
			if (item !== except) {
				closeItem(item);
			}
		});
	}

	function openItem(item) {
		if (!item || !isDesktop()) {
			return;
		}

		var panel = getPanel(item);

		if (isPanelFullyOpen(item)) {
			cancelScheduledClose();
			return;
		}

		cancelScheduledClose();
		closeAll(item);

		item.classList.add('is-open');

		var trigger = item.querySelector('.epsh-nav-trigger');
		if (trigger) {
			trigger.setAttribute('aria-expanded', 'true');
		}
		if (panel) {
			showPanel(panel);
			positionMegaPanel(item);
			initInteractiveMega(panel);
		}
	}

	function positionMegaPanel(item) {
		var panel = getPanel(item);
		var anchor = item ? item.querySelector('.epsh-mega-anchor') : null;

		if (
			!panel ||
			!anchor ||
			!(
				panel.classList.contains('epsh-mega-panel--solutions') ||
				panel.classList.contains('epsh-mega-panel--interactive')
			)
		) {
			return;
		}

		panel.style.left = '0';
		panel.style.right = 'auto';
		panel.style.width = '';
		panel.style.maxWidth = '';
		panel.style.transform = panel.classList.contains('is-visible') ? 'translateY(0)' : '';

		window.requestAnimationFrame(function () {
			var margin = 16;
			var wrap = document.querySelector('.site-header > .wrap, .genesis-header > .wrap');
			var anchorRect = anchor.getBoundingClientRect();
			var targetWidth;
			var offsetLeft = 0;

			if (wrap) {
				var wrapRect = wrap.getBoundingClientRect();
				offsetLeft = wrapRect.left - anchorRect.left;
				targetWidth = wrapRect.width;
			} else {
				targetWidth = window.innerWidth - margin - anchorRect.left;
			}

			targetWidth = Math.max(0, Math.floor(targetWidth));

			if (targetWidth > 0) {
				panel.style.left = offsetLeft + 'px';
				panel.style.width = targetWidth + 'px';
				panel.style.maxWidth = targetWidth + 'px';
			}

			if (anchorRect.left + offsetLeft < margin) {
				var shift = margin - (anchorRect.left + offsetLeft);
				panel.style.left = (offsetLeft + shift) + 'px';
				panel.style.width = Math.max(0, targetWidth - shift) + 'px';
				panel.style.maxWidth = panel.style.width;
			}
		});
	}

	function isWithinZone(node, item, panel) {
		if (!node) {
			return false;
		}

		if (item.contains(node) || panel.contains(node)) {
			return true;
		}

		if (node.closest) {
			var zone = node.closest('.epsh-has-mega.is-open, .epsh-has-dropdown.is-open, .epsh-nav-panel');
			return zone === item || zone === panel;
		}

		return false;
	}

	function bindInteractions(item) {
		var trigger = item.querySelector('.epsh-nav-trigger');
		var panel = getPanel(item);
		var anchor = item.querySelector('.epsh-mega-anchor, .epsh-dropdown-anchor');

		if (!trigger || !panel) {
			return;
		}

		trigger.addEventListener('click', function (event) {
			if (!isDesktop()) {
				return;
			}

			event.preventDefault();
			cancelScheduledClose();
			if (isPanelFullyOpen(item)) {
				closeItem(item);
			} else {
				openItem(item);
			}
		});

		function onEnter() {
			if (!isDesktop()) {
				return;
			}

			// Always reopen if class state drifted (is-open without a visible panel).
			openItem(item);
		}

		function onPanelEnter() {
			if (isDesktop()) {
				cancelScheduledClose();
			}
		}

		function onLeave(event) {
			if (!isDesktop()) {
				return;
			}

			if (isWithinZone(event.relatedTarget, item, panel)) {
				return;
			}

			scheduleClose(item);
		}

		item.addEventListener('mouseenter', onEnter);
		item.addEventListener('mouseleave', onLeave);
		panel.addEventListener('mouseenter', onPanelEnter);
		panel.addEventListener('mouseleave', onLeave);

		if (anchor && anchor !== item) {
			anchor.addEventListener('mouseenter', onEnter);
			anchor.addEventListener('mouseleave', onLeave);
		}

		trigger.addEventListener('keydown', function (event) {
			if (!isDesktop()) {
				return;
			}

			if (event.key === 'Enter' || event.key === ' ') {
				event.preventDefault();
				if (isPanelFullyOpen(item)) {
					closeItem(item);
				} else {
					openItem(item);
				}
			}

			if (event.key === 'Escape') {
				closeItem(item);
				trigger.blur();
			}
		});
	}

	var megaMenuData = window.ahfMegaMenu || {};
	var megaCategories = Array.isArray(megaMenuData.categories) ? megaMenuData.categories : [];
	var megaI18n = megaMenuData.i18n || {};

	function getCategoryById(categoryId) {
		for (var i = 0; i < megaCategories.length; i++) {
			if (megaCategories[i].id === categoryId) {
				return megaCategories[i];
			}
		}
		return null;
	}

	function renderCoursePreview(panel, course) {
		var previewLink = panel.querySelector('.epsh-mega-preview__link');
		var previewImage = panel.querySelector('.epsh-mega-preview__image');
		var previewTitle = panel.querySelector('.epsh-mega-preview__title');
		var previewDescription = panel.querySelector('.epsh-mega-preview__description');
		var previewCta = panel.querySelector('.epsh-mega-preview__cta');

		if (!previewLink || !previewImage || !previewTitle || !previewDescription) {
			return;
		}

		if (!course) {
			previewLink.hidden = true;
			previewLink.setAttribute('tabindex', '-1');
			previewImage.hidden = true;
			previewImage.removeAttribute('src');
			previewTitle.textContent = '';
			previewDescription.textContent = '';
			return;
		}

		previewLink.href = course.url || '#';
		previewLink.hidden = false;
		previewLink.setAttribute('tabindex', '0');
		previewTitle.textContent = course.label || '';
		previewDescription.textContent = course.description || '';

		if (previewCta) {
			previewCta.textContent = megaI18n.viewCourse || 'View course';
		}

		if (course.image) {
			previewImage.src = course.image;
			previewImage.alt = course.label || '';
			previewImage.width = course.image_width || 640;
			previewImage.height = course.image_height || 400;
			previewImage.hidden = false;
		} else {
			previewImage.hidden = true;
			previewImage.removeAttribute('src');
			previewImage.alt = '';
		}
	}

	function renderCoursesList(panel, category, preferredCourseId) {
		var list = panel.querySelector('.epsh-mega-courses__list');
		if (!list) {
			return null;
		}

		list.innerHTML = '';

		if (!category || !Array.isArray(category.courses) || !category.courses.length) {
			var emptyItem = document.createElement('li');
			emptyItem.className = 'epsh-mega-courses__empty';
			emptyItem.textContent = megaI18n.noCourses || 'No courses in this category yet.';
			list.appendChild(emptyItem);
			renderCoursePreview(panel, null);
			return null;
		}

		var activeCourse = category.courses[0];

		category.courses.forEach(function (course) {
			var item = document.createElement('li');
			var button = document.createElement('button');
			button.type = 'button';
			button.className = 'epsh-mega-course';
			button.setAttribute('data-course-id', String(course.id || ''));
			button.setAttribute('aria-pressed', 'false');

			var label = document.createElement('span');
			label.className = 'epsh-mega-course__label';
			label.textContent = course.label || '';
			button.appendChild(label);

			if (preferredCourseId && String(course.id) === String(preferredCourseId)) {
				activeCourse = course;
			}

			button.addEventListener('mouseenter', function () {
				activateCourse(panel, button, course);
			});

			button.addEventListener('focus', function () {
				activateCourse(panel, button, course);
			});

			button.addEventListener('click', function () {
				if (course.url) {
					window.location.href = course.url;
				}
			});

			item.appendChild(button);
			list.appendChild(item);
		});

		return activeCourse;
	}

	function activateCategory(panel, topicButton, categoryId) {
		var topics = panel.querySelectorAll('.epsh-mega-topic');
		var category = getCategoryById(categoryId);

		topics.forEach(function (button) {
			var isActive = button === topicButton;
			button.classList.toggle('is-active', isActive);
			if (button.hasAttribute('aria-pressed')) {
				button.setAttribute('aria-pressed', isActive ? 'true' : 'false');
			}
			if (button.hasAttribute('aria-current')) {
				button.setAttribute('aria-current', isActive ? 'true' : 'false');
			}
		});

		var activeCourse = renderCoursesList(panel, category);
		var courseButtons = panel.querySelectorAll('.epsh-mega-course');

		if (activeCourse && courseButtons.length) {
			activateCourse(panel, courseButtons[0], activeCourse);
		} else {
			renderCoursePreview(panel, null);
		}
	}

	function activateCourse(panel, courseButton, course) {
		var courseButtons = panel.querySelectorAll('.epsh-mega-course');

		courseButtons.forEach(function (button) {
			var isActive = button === courseButton;
			button.classList.toggle('is-active', isActive);
			button.setAttribute('aria-pressed', isActive ? 'true' : 'false');
		});

		renderCoursePreview(panel, course);
	}

	function initInteractiveMega(panel) {
		if (!panel || !panel.hasAttribute('data-epsh-interactive-mega')) {
			return;
		}

		if (!megaCategories.length) {
			return;
		}

		var topics = panel.querySelectorAll('.epsh-mega-topic');
		if (!topics.length) {
			return;
		}

		if (!panel._epshInteractiveBound) {
			topics.forEach(function (topicButton) {
				topicButton.addEventListener('mouseenter', function () {
					activateCategory(panel, topicButton, topicButton.getAttribute('data-category-id'));
				});

				topicButton.addEventListener('focus', function () {
					activateCategory(panel, topicButton, topicButton.getAttribute('data-category-id'));
				});

				// Click navigates to the category page via the anchor href.
				// Still sync the courses column before navigation for keyboard users.
				topicButton.addEventListener('click', function () {
					activateCategory(panel, topicButton, topicButton.getAttribute('data-category-id'));
				});
			});

			panel._epshInteractiveBound = true;
		}

		var activeTopic = panel.querySelector('.epsh-mega-topic.is-active') || topics[0];
		if (activeTopic) {
			activateCategory(panel, activeTopic, activeTopic.getAttribute('data-category-id'));
		}
	}

	function bindMegaGroupAccordions() {
		var toggles = nav.querySelectorAll('.epsh-mega-group-toggle');

		toggles.forEach(function (toggle) {
			toggle.addEventListener('click', function (event) {
				if (!isDesktop()) {
					return;
				}

				event.preventDefault();
				event.stopPropagation();

				var group = toggle.closest('.epsh-mega-group');
				var sublinks = group ? group.querySelector('.epsh-mega-sublinks') : null;

				if (!group || !sublinks) {
					return;
				}

				var expanded = !group.classList.contains('is-open');

				group.classList.toggle('is-open', expanded);
				toggle.setAttribute('aria-expanded', expanded ? 'true' : 'false');
				sublinks.hidden = !expanded;
			});

			toggle.addEventListener('keydown', function (event) {
				if (!isDesktop()) {
					return;
				}

				if (event.key === 'Enter' || event.key === ' ') {
					event.preventDefault();
					toggle.click();
				}
			});
		});
	}

	function bindGlobalListeners() {
		document.addEventListener(
			'mousemove',
			function (event) {
				window._epshPointer = { x: event.clientX, y: event.clientY };
				if (isDesktop() && getOpenItem() && isPointerOverOpenMenu()) {
					cancelScheduledClose();
				}
			},
			{ passive: true }
		);

		document.addEventListener('click', function (event) {
			if (!isDesktop() || !nav) {
				return;
			}

			var target = event.target;
			var inNav = nav.contains(target);
			var inExtras = extras && extras.contains(target);
			var inPanel = false;

			items.forEach(function (item) {
				var itemPanel = getPanel(item);
				if (itemPanel && itemPanel.contains(target)) {
					inPanel = true;
				}
			});

			if (!inNav && !inExtras && !inPanel) {
				closeAll();
			}
		});

		if (typeof mq.addEventListener === 'function') {
			mq.addEventListener('change', function () {
				cancelScheduledClose();
				closeAll();
			});
		} else if (typeof mq.addListener === 'function') {
			mq.addListener(function () {
				cancelScheduledClose();
				closeAll();
			});
		}

		document.addEventListener('epsh-header-hide', function () {
			cancelScheduledClose();
			closeAll();
		});

		window.addEventListener('scroll', function () {
			if (!getOpenItem()) {
				return;
			}

			cancelScheduledClose();
			closeAll();
		}, { passive: true });

		window.addEventListener('resize', function () {
			var openItem = getOpenItem();
			if (openItem && openItem.classList.contains('epsh-has-mega')) {
				positionMegaPanel(openItem);
			}
		}, { passive: true });
	}

	function init() {
		if (bound) {
			return true;
		}

		nav = document.querySelector('.epsh-desktop-nav');
		extras = document.querySelector('.epsh-header-extras-wrap');

		if (!nav) {
			return false;
		}

		items = Array.prototype.slice.call(nav.querySelectorAll('.epsh-has-mega, .epsh-has-dropdown'));
		items.forEach(bindInteractions);
		bindMegaGroupAccordions();
		bindGlobalListeners();
		bound = true;
		return true;
	}

	if (!init()) {
		if (document.readyState === 'loading') {
			document.addEventListener('DOMContentLoaded', init);
		} else {
			window.setTimeout(init, 0);
		}
	}
})();
