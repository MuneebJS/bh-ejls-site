(function () {
	'use strict';

	function initNavToggle() {
		var toggle = document.querySelector('.nav-toggle');
		var nav = document.getElementById('site-navigation');
		if (!toggle || !nav) return;

		toggle.addEventListener('click', function () {
			var expanded = toggle.getAttribute('aria-expanded') === 'true';
			toggle.setAttribute('aria-expanded', String(!expanded));
			nav.classList.toggle('is-open', !expanded);
		});

		document.addEventListener('keydown', function (event) {
			if (event.key === 'Escape' && toggle.getAttribute('aria-expanded') === 'true') {
				toggle.setAttribute('aria-expanded', 'false');
				nav.classList.remove('is-open');
				toggle.focus();
			}
		});
	}

	function initStickyState() {
		var header = document.getElementById('masthead');
		if (!header) return;

		var onScroll = function () {
			header.classList.toggle('is-scrolled', window.scrollY > 6);
		};

		onScroll();
		window.addEventListener('scroll', onScroll, { passive: true });
	}

	function initCurrentYear() {
		var targets = document.querySelectorAll('[data-current-year]');
		if (!targets.length) return;

		var year = String(new Date().getFullYear());
		targets.forEach(function (element) {
			element.textContent = year;
		});
	}

	function ready(callback) {
		if (document.readyState !== 'loading') {
			callback();
		} else {
			document.addEventListener('DOMContentLoaded', callback);
		}
	}

	ready(function () {
		initNavToggle();
		initStickyState();
		initCurrentYear();
	});

	window.Insynia = window.Insynia || {};
	window.Insynia.ready = ready;
})();
