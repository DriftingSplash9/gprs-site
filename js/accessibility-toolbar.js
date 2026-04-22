/* ============================================================
   GPRS Accessibility Toolbar
   ============================================================
   Purpose:  Header-integrated accessibility settings panel.
             Replaces gprs-theme.js (dark mode logic absorbed).
   Scope:    Global (loads on every page)
   Updated:  2026-03-25

   TABLE OF CONTENTS:
   0. Early Apply (before DOMContentLoaded — prevents FOUC)
   1. Constants & State
   2. Panel HTML Builder
   3. Dark Mode Toggle
   4. Text Scale Cycle
   5. Line Height Toggle
   6. Letter Spacing Toggle
   7. Grayscale Toggle
   8. Simplify Images Toggle
   9. Enlarge Targets Toggle
   10. Reset All
   11. Panel Open / Close
   12. Init
============================================================ */

(function () {
    'use strict';

    /* ========================================================
       0. EARLY APPLY — runs immediately (IIFE top level)
       Reads all localStorage keys and applies classes/variables
       to <html> before first paint. Prevents FOUC.
    ======================================================== */
    var root = document.documentElement;

    /* --- Dark mode --- */
    var savedTheme = localStorage.getItem('gprs-theme');
    if (savedTheme === 'dark') {
        root.classList.add('gprs-dark');
    } else {
        root.classList.remove('gprs-dark');
    }

    /* --- Text scale --- */
    var savedScale = localStorage.getItem('gprs-text-scale');
    if (savedScale && savedScale !== '1') {
        root.style.setProperty('--gprs-text-scale', savedScale);
    }

    /* --- Line height --- */
    var savedLineHeight = localStorage.getItem('gprs-line-height');
    if (savedLineHeight === 'relaxed') {
        root.style.setProperty('--gprs-line-height-boost', '0.35');
    }

    /* --- Letter spacing --- */
    var savedLetterSpacing = localStorage.getItem('gprs-letter-spacing');
    if (savedLetterSpacing === 'wide') {
        root.classList.add('gprs-wide-spacing');
    }

    /* --- Grayscale --- */
    var savedGrayscale = localStorage.getItem('gprs-grayscale');
    if (savedGrayscale === 'on') {
        root.classList.add('gprs-grayscale');
    }

    /* --- Simplify images --- */
    var savedSimplify = localStorage.getItem('gprs-simplify-images');
    if (savedSimplify === 'on') {
        root.classList.add('gprs-simplify-images');
    }

    /* --- Enlarge targets --- */
    var savedEnlarge = localStorage.getItem('gprs-enlarge-targets');
    if (savedEnlarge === 'on') {
        root.classList.add('gprs-enlarge-targets');
    }


    /* ========================================================
       1. CONSTANTS & STATE
    ======================================================== */
    var KEYS = {
        theme:         'gprs-theme',
        textScale:     'gprs-text-scale',
        lineHeight:    'gprs-line-height',
        letterSpacing: 'gprs-letter-spacing',
        grayscale:     'gprs-grayscale',
        simplify:      'gprs-simplify-images',
        enlarge:       'gprs-enlarge-targets'
    };

    var TEXT_SCALE_STEPS = [
        { value: '1',    label: 'Regular' },
        { value: '1.15', label: 'Large' },
        { value: '1.3',  label: 'Extra Large' }
    ];

    var panelBuilt = false;
    var panelEl = null;
    var toggleBtn = null;


    /* ========================================================
       2. PANEL HTML BUILDER
       Injects panel DOM on first open (keeps initial load lean).
    ======================================================== */
    function buildPanel() {
        if (panelBuilt) return;

        var isDark      = root.classList.contains('gprs-dark');
        var scaleVal    = localStorage.getItem(KEYS.textScale) || '1';
        var scaleStep   = TEXT_SCALE_STEPS.find(function (s) { return s.value === scaleVal; }) || TEXT_SCALE_STEPS[0];
        var isRelaxed   = localStorage.getItem(KEYS.lineHeight) === 'relaxed';
        var isWide      = localStorage.getItem(KEYS.letterSpacing) === 'wide';
        var isGray      = localStorage.getItem(KEYS.grayscale) === 'on';
        var isSimplify  = localStorage.getItem(KEYS.simplify) === 'on';
        var isEnlarge   = localStorage.getItem(KEYS.enlarge) === 'on';

        var html = '' +
            '<div class="gprs-a11y-panel-heading">' +
                '<span class="gprs-a11y-panel-title" id="gprs-a11y-panel-label">Accessibility Settings</span>' +
                '<button class="gprs-a11y-panel-close" type="button" aria-label="Close accessibility settings">' +
                    '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">' +
                        '<path d="M18 6L6 18"/><path d="M6 6l12 12"/>' +
                    '</svg>' +
                '</button>' +
            '</div>' +

            /* --- 1. Dark / Light mode --- */
            '<div class="gprs-a11y-row">' +
                '<span class="gprs-a11y-row-label" id="gprs-a11y-label-theme">Dark Mode</span>' +
                '<button class="gprs-a11y-switch" id="gprs-a11y-theme" type="button" role="switch"' +
                    ' aria-pressed="' + (isDark ? 'true' : 'false') + '"' +
                    ' aria-labelledby="gprs-a11y-label-theme"></button>' +
            '</div>' +

            /* --- 2. Text size --- */
            '<div class="gprs-a11y-row">' +
                '<span class="gprs-a11y-row-label" id="gprs-a11y-label-text">Text Size</span>' +
                '<span class="gprs-a11y-row-status' + (scaleStep.value !== '1' ? ' gprs-a11y-row-status--active' : '') + '" id="gprs-a11y-text-status">' + scaleStep.label + '</span>' +
                '<button class="gprs-a11y-cycle' + (scaleStep.value !== '1' ? ' gprs-a11y-cycle--active' : '') + '" id="gprs-a11y-text-scale" type="button"' +
                    ' aria-labelledby="gprs-a11y-label-text gprs-a11y-text-status"' +
                    ' aria-label="Cycle text size: currently ' + scaleStep.label + '">Aa+</button>' +
            '</div>' +

            /* --- 3. Line height --- */
            '<div class="gprs-a11y-row">' +
                '<span class="gprs-a11y-row-label" id="gprs-a11y-label-lh">Line Height</span>' +
                '<span class="gprs-a11y-row-status' + (isRelaxed ? ' gprs-a11y-row-status--active' : '') + '" id="gprs-a11y-lh-status">' + (isRelaxed ? 'Relaxed' : 'Normal') + '</span>' +
                '<button class="gprs-a11y-switch" id="gprs-a11y-line-height" type="button" role="switch"' +
                    ' aria-pressed="' + (isRelaxed ? 'true' : 'false') + '"' +
                    ' aria-labelledby="gprs-a11y-label-lh"></button>' +
            '</div>' +

            /* --- 4. Letter spacing --- */
            '<div class="gprs-a11y-row">' +
                '<span class="gprs-a11y-row-label" id="gprs-a11y-label-ls">Letter Spacing</span>' +
                '<span class="gprs-a11y-row-status' + (isWide ? ' gprs-a11y-row-status--active' : '') + '" id="gprs-a11y-ls-status">' + (isWide ? 'Wide' : 'Normal') + '</span>' +
                '<button class="gprs-a11y-switch" id="gprs-a11y-letter-spacing" type="button" role="switch"' +
                    ' aria-pressed="' + (isWide ? 'true' : 'false') + '"' +
                    ' aria-labelledby="gprs-a11y-label-ls"></button>' +
            '</div>' +

            /* --- 5. Grayscale --- */
            '<div class="gprs-a11y-row">' +
                '<span class="gprs-a11y-row-label" id="gprs-a11y-label-gray">Grayscale</span>' +
                '<button class="gprs-a11y-switch" id="gprs-a11y-grayscale" type="button" role="switch"' +
                    ' aria-pressed="' + (isGray ? 'true' : 'false') + '"' +
                    ' aria-labelledby="gprs-a11y-label-gray"></button>' +
            '</div>' +

            /* --- 6. Simplify images --- */
            '<div class="gprs-a11y-row">' +
                '<span class="gprs-a11y-row-label" id="gprs-a11y-label-simplify">Simplify Images</span>' +
                '<button class="gprs-a11y-switch" id="gprs-a11y-simplify" type="button" role="switch"' +
                    ' aria-pressed="' + (isSimplify ? 'true' : 'false') + '"' +
                    ' aria-labelledby="gprs-a11y-label-simplify"></button>' +
            '</div>' +

            /* --- 7. Enlarge targets --- */
            '<div class="gprs-a11y-row">' +
                '<span class="gprs-a11y-row-label" id="gprs-a11y-label-enlarge">Enlarge Buttons &amp; Links</span>' +
                '<button class="gprs-a11y-switch" id="gprs-a11y-enlarge" type="button" role="switch"' +
                    ' aria-pressed="' + (isEnlarge ? 'true' : 'false') + '"' +
                    ' aria-labelledby="gprs-a11y-label-enlarge"></button>' +
            '</div>' +

            /* --- Reset --- */
            '<button class="gprs-a11y-reset" id="gprs-a11y-reset" type="button">Reset All</button>';

        panelEl = document.createElement('div');
        panelEl.className = 'gprs-a11y-panel';
        panelEl.id = 'gprs-a11y-panel';
        panelEl.setAttribute('role', 'dialog');
        panelEl.setAttribute('aria-label', 'Accessibility settings');
        panelEl.setAttribute('aria-labelledby', 'gprs-a11y-panel-label');
        panelEl.innerHTML = html;

        /* Insert panel right after the toggle button */
        toggleBtn.parentNode.appendChild(panelEl);

        /* Attach panel event handlers */
        bindPanelEvents();

        panelBuilt = true;
    }


    /* ========================================================
       3. DARK MODE TOGGLE
    ======================================================== */
    function toggleDarkMode() {
        var nowDark = root.classList.toggle('gprs-dark');
        localStorage.setItem(KEYS.theme, nowDark ? 'dark' : 'light');

        var sw = document.getElementById('gprs-a11y-theme');
        if (sw) sw.setAttribute('aria-pressed', nowDark ? 'true' : 'false');
    }


    /* ========================================================
       4. TEXT SCALE CYCLE
    ======================================================== */
    function cycleTextScale() {
        var current = localStorage.getItem(KEYS.textScale) || '1';
        var idx = TEXT_SCALE_STEPS.findIndex(function (s) { return s.value === current; });
        var next = (idx + 1) % TEXT_SCALE_STEPS.length;
        var step = TEXT_SCALE_STEPS[next];

        localStorage.setItem(KEYS.textScale, step.value);
        root.style.setProperty('--gprs-text-scale', step.value);

        /* Update UI */
        var statusEl = document.getElementById('gprs-a11y-text-status');
        var cycleBtn = document.getElementById('gprs-a11y-text-scale');
        if (statusEl) {
            statusEl.textContent = step.label;
            statusEl.classList.toggle('gprs-a11y-row-status--active', step.value !== '1');
        }
        if (cycleBtn) {
            cycleBtn.setAttribute('aria-label', 'Cycle text size: currently ' + step.label);
            cycleBtn.classList.toggle('gprs-a11y-cycle--active', step.value !== '1');
        }
    }


    /* ========================================================
       5. LINE HEIGHT TOGGLE
    ======================================================== */
    function toggleLineHeight() {
        var current = localStorage.getItem(KEYS.lineHeight) || 'normal';
        var isRelaxed = current !== 'relaxed';

        localStorage.setItem(KEYS.lineHeight, isRelaxed ? 'relaxed' : 'normal');
        root.style.setProperty('--gprs-line-height-boost', isRelaxed ? '0.35' : '0');

        var sw = document.getElementById('gprs-a11y-line-height');
        var statusEl = document.getElementById('gprs-a11y-lh-status');
        if (sw) sw.setAttribute('aria-pressed', isRelaxed ? 'true' : 'false');
        if (statusEl) {
            statusEl.textContent = isRelaxed ? 'Relaxed' : 'Normal';
            statusEl.classList.toggle('gprs-a11y-row-status--active', isRelaxed);
        }
    }


    /* ========================================================
       6. LETTER SPACING TOGGLE
    ======================================================== */
    function toggleLetterSpacing() {
        var current = localStorage.getItem(KEYS.letterSpacing) || 'normal';
        var isWide = current !== 'wide';

        localStorage.setItem(KEYS.letterSpacing, isWide ? 'wide' : 'normal');
        root.classList.toggle('gprs-wide-spacing', isWide);

        var sw = document.getElementById('gprs-a11y-letter-spacing');
        var statusEl = document.getElementById('gprs-a11y-ls-status');
        if (sw) sw.setAttribute('aria-pressed', isWide ? 'true' : 'false');
        if (statusEl) {
            statusEl.textContent = isWide ? 'Wide' : 'Normal';
            statusEl.classList.toggle('gprs-a11y-row-status--active', isWide);
        }
    }


    /* ========================================================
       7. GRAYSCALE TOGGLE
    ======================================================== */
    function toggleGrayscale() {
        var isOn = !root.classList.contains('gprs-grayscale');
        root.classList.toggle('gprs-grayscale', isOn);
        localStorage.setItem(KEYS.grayscale, isOn ? 'on' : 'off');

        var sw = document.getElementById('gprs-a11y-grayscale');
        if (sw) sw.setAttribute('aria-pressed', isOn ? 'true' : 'false');
    }


    /* ========================================================
       8. SIMPLIFY IMAGES TOGGLE
       Inserts .gprs-alt-placeholder spans after each <img>
       on first enable. The CSS hides/shows them.
    ======================================================== */
    var placeholdersInserted = false;

    function insertAltPlaceholders() {
        if (placeholdersInserted) return;

        var images = document.querySelectorAll('img:not(.logo img):not([aria-hidden="true"])');
        images.forEach(function (img) {
            /* Skip if placeholder already exists */
            if (img.nextElementSibling && img.nextElementSibling.classList.contains('gprs-alt-placeholder')) return;

            var altText = img.getAttribute('alt');
            if (!altText || altText.trim() === '') {
                altText = 'Image (no description available)';
            }

            var placeholder = document.createElement('span');
            placeholder.className = 'gprs-alt-placeholder';
            placeholder.setAttribute('aria-hidden', 'true');
            placeholder.textContent = altText;

            img.parentNode.insertBefore(placeholder, img.nextSibling);
        });

        placeholdersInserted = true;
    }

    function toggleSimplifyImages() {
        var isOn = !root.classList.contains('gprs-simplify-images');

        if (isOn) {
            insertAltPlaceholders();
        }

        root.classList.toggle('gprs-simplify-images', isOn);
        localStorage.setItem(KEYS.simplify, isOn ? 'on' : 'off');

        var sw = document.getElementById('gprs-a11y-simplify');
        if (sw) sw.setAttribute('aria-pressed', isOn ? 'true' : 'false');
    }

    /* If simplify was saved as on, insert placeholders once DOM is ready */
    function maybeInsertPlaceholdersOnLoad() {
        if (localStorage.getItem(KEYS.simplify) === 'on') {
            insertAltPlaceholders();
        }
    }


    /* ========================================================
       9. ENLARGE TARGETS TOGGLE
    ======================================================== */
    function toggleEnlargeTargets() {
        var isOn = !root.classList.contains('gprs-enlarge-targets');
        root.classList.toggle('gprs-enlarge-targets', isOn);
        localStorage.setItem(KEYS.enlarge, isOn ? 'on' : 'off');

        var sw = document.getElementById('gprs-a11y-enlarge');
        if (sw) sw.setAttribute('aria-pressed', isOn ? 'true' : 'false');
    }


    /* ========================================================
       10. RESET ALL
    ======================================================== */
    function resetAll() {
        /* Remove all localStorage keys */
        Object.keys(KEYS).forEach(function (k) {
            localStorage.removeItem(KEYS[k]);
        });

        /* Remove all classes */
        root.classList.remove('gprs-dark', 'gprs-wide-spacing', 'gprs-grayscale', 'gprs-simplify-images', 'gprs-enlarge-targets');

        /* Reset CSS variables */
        root.style.setProperty('--gprs-text-scale', '1');
        root.style.setProperty('--gprs-line-height-boost', '0');

        /* Update all panel UI */
        var themeSwitch = document.getElementById('gprs-a11y-theme');
        if (themeSwitch) themeSwitch.setAttribute('aria-pressed', 'false');

        var textStatus = document.getElementById('gprs-a11y-text-status');
        var textCycle  = document.getElementById('gprs-a11y-text-scale');
        if (textStatus) {
            textStatus.textContent = 'Regular';
            textStatus.classList.remove('gprs-a11y-row-status--active');
        }
        if (textCycle) {
            textCycle.setAttribute('aria-label', 'Cycle text size: currently Regular');
            textCycle.classList.remove('gprs-a11y-cycle--active');
        }

        var lhSwitch = document.getElementById('gprs-a11y-line-height');
        var lhStatus = document.getElementById('gprs-a11y-lh-status');
        if (lhSwitch) lhSwitch.setAttribute('aria-pressed', 'false');
        if (lhStatus) {
            lhStatus.textContent = 'Normal';
            lhStatus.classList.remove('gprs-a11y-row-status--active');
        }

        var lsSwitch = document.getElementById('gprs-a11y-letter-spacing');
        var lsStatus = document.getElementById('gprs-a11y-ls-status');
        if (lsSwitch) lsSwitch.setAttribute('aria-pressed', 'false');
        if (lsStatus) {
            lsStatus.textContent = 'Normal';
            lsStatus.classList.remove('gprs-a11y-row-status--active');
        }

        var graySwitch = document.getElementById('gprs-a11y-grayscale');
        if (graySwitch) graySwitch.setAttribute('aria-pressed', 'false');

        var simplifySwitch = document.getElementById('gprs-a11y-simplify');
        if (simplifySwitch) simplifySwitch.setAttribute('aria-pressed', 'false');

        var enlargeSwitch = document.getElementById('gprs-a11y-enlarge');
        if (enlargeSwitch) enlargeSwitch.setAttribute('aria-pressed', 'false');
    }


    /* ========================================================
       11. PANEL OPEN / CLOSE
    ======================================================== */
    function openPanel() {
        buildPanel();
        panelEl.classList.add('gprs-a11y-panel--open');
        toggleBtn.setAttribute('aria-expanded', 'true');
    }

    function closePanel() {
        if (!panelEl) return;
        panelEl.classList.remove('gprs-a11y-panel--open');
        toggleBtn.setAttribute('aria-expanded', 'false');
    }

    function isPanelOpen() {
        return panelEl && panelEl.classList.contains('gprs-a11y-panel--open');
    }

    function togglePanel() {
        if (isPanelOpen()) {
            closePanel();
        } else {
            openPanel();
        }
    }


    /* ========================================================
       BIND PANEL EVENTS (called once after DOM injection)
    ======================================================== */
    function bindPanelEvents() {
        /* Close button (mobile) */
        var closeBtn = panelEl.querySelector('.gprs-a11y-panel-close');
        if (closeBtn) {
            closeBtn.addEventListener('click', function () {
                closePanel();
                toggleBtn.focus();
            });
        }

        /* Dark mode */
        var themeSwitch = document.getElementById('gprs-a11y-theme');
        if (themeSwitch) {
            themeSwitch.addEventListener('click', toggleDarkMode);
        }

        /* Text scale */
        var textCycle = document.getElementById('gprs-a11y-text-scale');
        if (textCycle) {
            textCycle.addEventListener('click', cycleTextScale);
        }

        /* Line height */
        var lhSwitch = document.getElementById('gprs-a11y-line-height');
        if (lhSwitch) {
            lhSwitch.addEventListener('click', toggleLineHeight);
        }

        /* Letter spacing */
        var lsSwitch = document.getElementById('gprs-a11y-letter-spacing');
        if (lsSwitch) {
            lsSwitch.addEventListener('click', toggleLetterSpacing);
        }

        /* Grayscale */
        var graySwitch = document.getElementById('gprs-a11y-grayscale');
        if (graySwitch) {
            graySwitch.addEventListener('click', toggleGrayscale);
        }

        /* Simplify images */
        var simplifySwitch = document.getElementById('gprs-a11y-simplify');
        if (simplifySwitch) {
            simplifySwitch.addEventListener('click', toggleSimplifyImages);
        }

        /* Enlarge targets */
        var enlargeSwitch = document.getElementById('gprs-a11y-enlarge');
        if (enlargeSwitch) {
            enlargeSwitch.addEventListener('click', toggleEnlargeTargets);
        }

        /* Reset */
        var resetBtn = document.getElementById('gprs-a11y-reset');
        if (resetBtn) {
            resetBtn.addEventListener('click', resetAll);
        }

        /* Escape key closes panel */
        panelEl.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') {
                e.stopPropagation();
                closePanel();
                toggleBtn.focus();
            }
        });
    }


    /* ========================================================
       12. INIT (runs on DOMContentLoaded)
    ======================================================== */
    function init() {
        toggleBtn = document.getElementById('gprs-a11y-toggle');
        if (!toggleBtn) return;

        /* Toggle panel on button click */
        toggleBtn.addEventListener('click', function (e) {
            e.stopPropagation();
            togglePanel();
        });

        /* Close on click outside */
        document.addEventListener('click', function (e) {
            if (!isPanelOpen()) return;
            if (toggleBtn.contains(e.target)) return;
            if (panelEl && panelEl.contains(e.target)) return;
            closePanel();
        });

        /* Close on Escape anywhere (if panel is open) */
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && isPanelOpen()) {
                closePanel();
                toggleBtn.focus();
            }
        });

        /* Close on scroll (any scroll beyond a small threshold) */
        var scrollCloseThreshold = 30;
        var lastScrollY = window.scrollY;
        window.addEventListener('scroll', function () {
            if (!isPanelOpen()) {
                lastScrollY = window.scrollY;
                return;
            }
            if (Math.abs(window.scrollY - lastScrollY) > scrollCloseThreshold) {
                closePanel();
                lastScrollY = window.scrollY;
            }
        }, { passive: true });

        /* Insert alt placeholders if simplify-images was saved as on */
        maybeInsertPlaceholdersOnLoad();
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

})();
