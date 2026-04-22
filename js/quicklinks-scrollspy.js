/**
 * Quicklinks Scrollspy
 *
 * Highlights the quicklinks bar link whose target section is
 * currently in the viewport. Also handles smooth-scroll clicks
 * with proper offset for the fixed header + sticky quicklinks bar.
 *
 * CSS class contract (from 03-buttons-containers-quicklinks.css):
 *   .gprs-quicklinks          — the sticky nav bar
 *   .gprs-quicklinks-list a   — individual links (href="#id")
 *   .ql-active                — added to the link whose section is visible
 *
 * Reduced motion:
 *   Respects prefers-reduced-motion: uses instant scroll instead
 *   of smooth when the user prefers reduced motion.
 *
 * Dependencies: None (vanilla JS, no jQuery)
 * Enqueue:      Conditionally on pages that have .gprs-quicklinks
 * Updated:      2026-03-20
 */

(function () {
	'use strict';

	/* ──────────────────────────────────────────────
	   1. BAIL EARLY IF NO QUICKLINKS BAR
	   ────────────────────────────────────────────── */
	var bar = document.querySelector('.gprs-quicklinks');
	if (!bar) return;

	var links = bar.querySelectorAll('.gprs-quicklinks-list a[href^="#"]');
	if (!links.length) return;

	/* ──────────────────────────────────────────────
	   2. BUILD SECTION MAP
	   Match each link to its target element on the page.
	   Skip links whose target ID doesn't exist yet
	   (safe for Elementor lazy rendering).
	   ────────────────────────────────────────────── */
	var sections = [];

	links.forEach(function (link) {
		var id = link.getAttribute('href').substring(1);
		var el = document.getElementById(id);
		if (el) {
			sections.push({ id: id, el: el, link: link });
		}
	});

	/* ──────────────────────────────────────────────
	   3. OFFSET CALCULATION
	   Header (fixed) + quicklinks bar (sticky) + a
	   small buffer so the section heading isn't glued
	   right against the bar.
	   ────────────────────────────────────────────── */
	function getScrollOffset() {
		var header = document.querySelector('.gprs-header');
		var headerH = header ? header.offsetHeight : 72;
		var barH = bar.offsetHeight || 48;
		return headerH + barH + 24; /* 24px breathing room */
	}

	/* ──────────────────────────────────────────────
	   4. REDUCED MOTION CHECK
	   ────────────────────────────────────────────── */
	var prefersReducedMotion = window.matchMedia(
		'(prefers-reduced-motion: reduce)'
	).matches;

	/* ──────────────────────────────────────────────
	   5. SMOOTH SCROLL ON CLICK
	   Scrolls to the target section with offset so
	   the heading isn't hidden behind the header or
	   quicklinks bar.
	   ────────────────────────────────────────────── */
	links.forEach(function (link) {
		link.addEventListener('click', function (e) {
			var id = this.getAttribute('href').substring(1);
			var target = document.getElementById(id);
			if (!target) return;

			e.preventDefault();

			var offset = getScrollOffset();
			var top = target.getBoundingClientRect().top
				+ window.pageYOffset
				- offset;

			window.scrollTo({
				top: top,
				behavior: prefersReducedMotion ? 'auto' : 'smooth'
			});

			/* Update URL hash without triggering a jump */
			if (history.pushState) {
				history.pushState(null, '', '#' + id);
			}

			/* Immediately highlight the clicked link so the
			   user gets instant feedback even before scroll
			   finishes */
			setActive(link);
		});
	});

	/* ──────────────────────────────────────────────
	   6. SCROLLSPY — HIGHLIGHT ACTIVE SECTION
	   On every scroll frame, find the section whose
	   top edge is closest to (but above) the offset
	   line. That section's link gets .ql-active.
	   ────────────────────────────────────────────── */
	function setActive(activeLink) {
		links.forEach(function (l) {
			l.classList.remove('ql-active');
		});
		if (activeLink) {
			activeLink.classList.add('ql-active');

			/* Auto-scroll the quicklinks bar horizontally
			   so the active link is visible on mobile */
			scrollLinkIntoView(activeLink);
		}
	}

	function scrollLinkIntoView(link) {
		/* Only matters when the bar overflows (mobile) */
		if (bar.scrollWidth <= bar.clientWidth) return;

		var linkRect = link.getBoundingClientRect();
		var barRect = bar.getBoundingClientRect();

		/* If the link is partially or fully outside the
		   visible area of the bar, scroll it into center */
		if (linkRect.left < barRect.left || linkRect.right > barRect.right) {
			var scrollTarget = link.offsetLeft
				- (bar.clientWidth / 2)
				+ (link.offsetWidth / 2);
			bar.scrollTo({
				left: scrollTarget,
				behavior: prefersReducedMotion ? 'auto' : 'smooth'
			});
		}
	}

	var ticking = false;

	function updateActiveOnScroll() {
		if (!sections.length) {
			ticking = false;
			return;
		}

		var offset = getScrollOffset() + 40; /* extra buffer for trigger zone */
		var current = null;

		/* Walk sections bottom-to-top: the LAST section
		   whose top is above the offset line wins */
		for (var i = sections.length - 1; i >= 0; i--) {
			var rect = sections[i].el.getBoundingClientRect();
			if (rect.top <= offset) {
				current = sections[i];
				break;
			}
		}

		/* Edge case: if user is scrolled to the very bottom
		   of the page, highlight the last section even if
		   its top is below the offset (short final section) */
		if (!current) {
			var scrollBottom = window.innerHeight + window.pageYOffset;
			var docHeight = document.documentElement.scrollHeight;
			if (docHeight - scrollBottom < 100 && sections.length > 0) {
				current = sections[sections.length - 1];
			}
		}

		if (current) {
			setActive(current.link);
		} else {
			/* Above all sections — clear highlight */
			setActive(null);
		}

		ticking = false;
	}

	window.addEventListener('scroll', function () {
		if (!ticking) {
			requestAnimationFrame(updateActiveOnScroll);
			ticking = true;
		}
	}, { passive: true });

	/* ──────────────────────────────────────────────
	   7. INITIAL STATE
	   Run once on load in case the page loads with
	   a hash or the user is already scrolled.
	   ────────────────────────────────────────────── */
	updateActiveOnScroll();

})();
