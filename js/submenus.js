/* ============================================================
   GPRS Navigation — Submenus, Mobile Menu
   Updated: 2026-03-25

   TABLE OF CONTENTS:
   1. Desktop Dropdown Submenus (hover + keyboard)
   2. Mobile Slide-Out Menu
   3. (Removed — theme sync now in accessibility-toolbar.js)
   4. Active Page Markers (aria-current)
   5. Init

   DROPDOWN BEHAVIOUR — DESKTOP:
   - Hover opens the dropdown (mouseenter)
   - Mouse-out closes after 250ms grace period
   - Moving from button into dropdown keeps it open
   - Click on button also toggles (touch fallback)
   - Focus-in auto-opens (keyboard accessible)
   - Focus-out auto-closes after 120ms delay
   - Only one dropdown open at a time
   - Escape closes and returns focus to button
   - Arrow keys navigate within open menu
   ============================================================ */

(function () {

	/* ============================================================
	   1. DESKTOP DROPDOWN SUBMENUS
	   ============================================================ */
	function initSubmenus() {
		var allParents = document.querySelectorAll('.has-submenu');
		if (!allParents.length) return;

		/* Detect touch-primary device (no hover support) */
		var isTouchPrimary = window.matchMedia('(hover: none)').matches;

		/* Close every dropdown except the one passed in */
		function closeAllExcept(except) {
			allParents.forEach(function (parent) {
				if (parent !== except && parent.classList.contains('open')) {
					parent.classList.remove('open');
					var btn = parent.querySelector('.nav-link-submenu');
					if (btn) btn.setAttribute('aria-expanded', 'false');
				}
			});
		}

		/* Attach handlers to each dropdown */
		allParents.forEach(function (parent) {
			var button = parent.querySelector('.nav-link-submenu');
			var menu   = parent.querySelector('.submenu');
			var items  = menu ? Array.from(menu.querySelectorAll('[role="menuitem"]')) : [];
			if (!button || !menu || !items.length) return;

			var closeTimeout = null;

			function openMenu(focusFirst) {
				if (closeTimeout) {
					clearTimeout(closeTimeout);
					closeTimeout = null;
				}
				closeAllExcept(parent);
				parent.classList.add('open');
				button.setAttribute('aria-expanded', 'true');
				if (focusFirst && items.length) {
					items[0].focus();
				}
			}

			function closeMenu() {
				if (closeTimeout) {
					clearTimeout(closeTimeout);
					closeTimeout = null;
				}
				parent.classList.remove('open');
				button.setAttribute('aria-expanded', 'false');
			}

			function scheduleClose(delay) {
				if (closeTimeout) {
					clearTimeout(closeTimeout);
				}
				closeTimeout = setTimeout(function () {
					closeMenu();
				}, delay || 250);
			}

			function cancelClose() {
				if (closeTimeout) {
					clearTimeout(closeTimeout);
					closeTimeout = null;
				}
			}

			/* ---- HOVER OPEN / CLOSE (desktop only) ---- */
			if (!isTouchPrimary) {
				parent.addEventListener('mouseenter', function () {
					openMenu(false);
				});

				parent.addEventListener('mouseleave', function () {
					scheduleClose(250);
				});
			}

			/* ---- FOCUS-BASED OPEN / CLOSE (keyboard) ---- */
			parent.addEventListener('focusin', function () {
				cancelClose();
				openMenu(false);
			});

			parent.addEventListener('focusout', function (e) {
				if (parent.contains(e.relatedTarget)) return;
				scheduleClose(120);
			});

			/* ---- CLICK ON BUTTON (touch fallback + toggle) ---- */
			button.addEventListener('click', function (e) {
				e.preventDefault();
				e.stopPropagation();
				if (parent.classList.contains('open')) {
					closeMenu();
				} else {
					openMenu(true);
				}
			});

			/* ---- KEYBOARD ON BUTTON ---- */
			button.addEventListener('keydown', function (e) {
				if (e.key === 'Enter' || e.key === ' ') {
					e.preventDefault();
					openMenu(true);
				}
				if (e.key === 'ArrowDown') {
					e.preventDefault();
					openMenu(true);
				}
				if (e.key === 'Escape') {
					closeMenu();
					button.focus();
				}
			});

			/* ---- KEYBOARD INSIDE MENU ---- */
			menu.addEventListener('keydown', function (e) {
				var idx = items.indexOf(document.activeElement);

				switch (e.key) {
					case 'ArrowDown':
						e.preventDefault();
						if (idx < items.length - 1) {
							items[idx + 1].focus();
						}
						break;

					case 'ArrowUp':
						e.preventDefault();
						if (idx > 0) {
							items[idx - 1].focus();
						} else {
							button.focus();
						}
						break;

					case 'Escape':
						e.preventDefault();
						closeMenu();
						button.focus();
						break;

					case 'Home':
						e.preventDefault();
						items[0].focus();
						break;

					case 'End':
						e.preventDefault();
						items[items.length - 1].focus();
						break;
				}
			});
		});

		/* ---- CLICK OUTSIDE CLOSES ALL ---- */
		document.addEventListener('click', function (e) {
			allParents.forEach(function (parent) {
				if (!parent.contains(e.target) && parent.classList.contains('open')) {
					parent.classList.remove('open');
					var btn = parent.querySelector('.nav-link-submenu');
					if (btn) btn.setAttribute('aria-expanded', 'false');
				}
			});
		});
	}


	/* ============================================================
	   2. MOBILE SLIDE-OUT MENU
	   ============================================================ */
	function initMobileMenu() {
		var toggle = document.getElementById('mobile-menu-toggle');
		var menu   = document.getElementById('mobile-menu');
		if (!toggle || !menu) return;

		toggle.addEventListener('click', function () {
			var isOpen = menu.classList.contains('open');
			menu.classList.toggle('open');
			toggle.setAttribute('aria-expanded', String(!isOpen));
			toggle.setAttribute('aria-label', isOpen ? 'Open menu' : 'Close menu');
			menu.setAttribute('aria-hidden', String(isOpen));
			document.body.classList.toggle('menu-open', !isOpen);

			/* Focus first link when opening */
			if (!isOpen) {
				var firstLink = menu.querySelector('a');
				if (firstLink) firstLink.focus();
			}
		});

		/* Close on Escape */
		menu.addEventListener('keydown', function (e) {
			if (e.key === 'Escape') {
				menu.classList.remove('open');
				toggle.setAttribute('aria-expanded', 'false');
				toggle.setAttribute('aria-label', 'Open menu');
				menu.setAttribute('aria-hidden', 'true');
				document.body.classList.remove('menu-open');
				toggle.focus();
			}
		});
	}


	/* ============================================================
	   3. (REMOVED — Mobile theme toggle sync)
	   Dark mode is now managed by accessibility-toolbar.js.
	   The mobile theme toggle row has been removed from header.php.
	============================================================ */


	/* ============================================================
	   4. ACTIVE PAGE MARKERS
	   ============================================================ */
	function markActivePages() {
		var path = window.location.pathname.replace(/\/+$/, '') || '/';

		var links = document.querySelectorAll(
			'.nav-desktop a, .nav-desktop [role="menuitem"], ' +
			'.mobile-menu a, .nav-cta-donate'
		);

		links.forEach(function (link) {
			var href = link.getAttribute('href');
			if (!href) return;

			try {
				var linkPath = new URL(href, window.location.origin).pathname.replace(/\/+$/, '') || '/';
			} catch (e) {
				return;
			}

			if (linkPath === path) {
				link.setAttribute('aria-current', 'page');

				var submenuParent = link.closest('.has-submenu');
				if (submenuParent) {
					submenuParent.classList.add('active-parent');
				}
			}
		});
	}


	/* ============================================================
	   5. INIT
	   ============================================================ */
	function init() {
		initSubmenus();
		initMobileMenu();
		markActivePages();
	}

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', init);
	} else {
		init();
	}

})();
