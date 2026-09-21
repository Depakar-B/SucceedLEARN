(function () {
	'use strict';

	var article = document.querySelector('.slf-single-article__body');
	if (!article) {
		return;
	}

	var links = Array.prototype.slice.call(document.querySelectorAll('.slf-toc a[href^="#"]'));
	if (!links.length) {
		return;
	}

	var headings = [];
	links.forEach(function (link) {
		var id = decodeURIComponent((link.getAttribute('href') || '').replace(/^#/, ''));
		if (!id) {
			return;
		}
		var heading = document.getElementById(id);
		if (heading) {
			headings.push({ id: id, el: heading, links: [] });
		}
	});

	headings.forEach(function (item) {
		item.links = links.filter(function (link) {
			return decodeURIComponent((link.getAttribute('href') || '').replace(/^#/, '')) === item.id;
		});
	});

	if (!headings.length) {
		return;
	}

	function setActive(id) {
		links.forEach(function (link) {
			var match = decodeURIComponent((link.getAttribute('href') || '').replace(/^#/, '')) === id;
			link.classList.toggle('is-active', match);
			if (match) {
				link.setAttribute('aria-current', 'true');
			} else {
				link.removeAttribute('aria-current');
			}
		});
	}

	links.forEach(function (link) {
		link.addEventListener('click', function (event) {
			var id = decodeURIComponent((link.getAttribute('href') || '').replace(/^#/, ''));
			var target = document.getElementById(id);
			if (!target) {
				return;
			}
			event.preventDefault();
			target.scrollIntoView({ behavior: 'smooth', block: 'start' });
			if (history.replaceState) {
				history.replaceState(null, '', '#' + id);
			}
			setActive(id);
		});
	});

	if (!('IntersectionObserver' in window)) {
		return;
	}

	var current = headings[0].id;
	var observer = new IntersectionObserver(
		function (entries) {
			entries.forEach(function (entry) {
				if (entry.isIntersecting) {
					current = entry.target.id;
				}
			});
			if (current) {
				setActive(current);
			}
		},
		{
			rootMargin: '-20% 0px -65% 0px',
			threshold: 0,
		}
	);

	headings.forEach(function (item) {
		observer.observe(item.el);
	});
})();
