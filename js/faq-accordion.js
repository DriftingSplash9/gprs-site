/**
 * FAQ Accordion — Keyboard-accessible toggle
 *
 * Manages open/close state for .faq-item accordion panels.
 * Only one item per category (.faq-items group) can be open
 * at a time — opening one closes its siblings.
 *
 * Depends: faq-content.php (data-open attribute, aria-expanded)
 * Loaded:  Conditionally on /faq/ page only
 * Updated: 2026-03-31
 *
 * Keyboard: Enter and Space are handled natively by <button>.
 */
(function () {
    'use strict';

    var items = document.querySelectorAll('.faq-item');
    if (!items.length) return;

    items.forEach(function (item) {
        var btn = item.querySelector('.faq-item__question');
        if (!btn) return;

        btn.addEventListener('click', function () {
            var isOpen = item.getAttribute('data-open') === 'true';

            /* Close all siblings in the same .faq-items group */
            var siblings = item.parentElement.querySelectorAll('.faq-item');
            siblings.forEach(function (sib) {
                sib.setAttribute('data-open', 'false');
                var sibBtn = sib.querySelector('.faq-item__question');
                if (sibBtn) sibBtn.setAttribute('aria-expanded', 'false');
            });

            /* Toggle the clicked item (if it was closed, open it) */
            if (!isOpen) {
                item.setAttribute('data-open', 'true');
                btn.setAttribute('aria-expanded', 'true');
            }
        });
    });
})();
