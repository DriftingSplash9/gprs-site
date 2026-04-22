/* ============================================================
   GPRS TIMELINE — JavaScript
   ============================================================
   Purpose:  Scroll-reveal + lightbox / slideshow viewer
   Depends:  GPRS Timeline PHP (shortcode), GPRS Timeline CSS
   Page:     /timeline/
   Updated:  2026-03-17
   ============================================================ */

(function () {
    'use strict';

    /* ========================================================
       0. GUARD — only run if timeline exists on the page
    ======================================================== */
    const timeline = document.querySelector('.gprs-timeline');
    if (!timeline) return;

    /* ========================================================
       1. SCROLL-REVEAL (IntersectionObserver)
    ======================================================== */
    const entries = timeline.querySelectorAll('.gprs-tl-entry');

    if ('IntersectionObserver' in window) {
        const revealObs = new IntersectionObserver(
            function (items) {
                items.forEach(function (item) {
                    if (item.isIntersecting) {
                        item.target.classList.add('gprs-tl-visible');
                        revealObs.unobserve(item.target);
                    }
                });
            },
            { threshold: 0.15, rootMargin: '0px 0px -40px 0px' }
        );
        entries.forEach(function (el) { revealObs.observe(el); });
    } else {
        /* Fallback: show everything immediately */
        entries.forEach(function (el) { el.classList.add('gprs-tl-visible'); });
    }

    /* ========================================================
       2. BUILD DATA ARRAY from card data-attributes
    ======================================================== */
    var cards = timeline.querySelectorAll('.gprs-tl-card');
    var data  = [];

    cards.forEach(function (card) {
        data.push({
            period: card.getAttribute('data-tl-period') || '',
            title:  card.getAttribute('data-tl-title')  || '',
            text:   card.getAttribute('data-tl-text')    || '',
            images: JSON.parse(card.getAttribute('data-tl-images') || '[]'),
            alts:   JSON.parse(card.getAttribute('data-tl-alts')   || '[]')
        });
    });

    var totalEntries = data.length;
    if (totalEntries === 0) return;

    /* ========================================================
       3. LIGHTBOX REFERENCES
    ======================================================== */
    var lb          = document.getElementById('gprs-tl-lightbox');
    if (!lb) return;

    var lbBackdrop  = lb.querySelector('.gprs-tl-lb-backdrop');
    var lbBgBlur    = lb.querySelector('.gprs-tl-lb-bg-blur');
    var lbClose     = lb.querySelector('.gprs-tl-lb-close');
    var lbImage     = lb.querySelector('.gprs-tl-lb-image');
    var lbPrev      = lb.querySelector('.gprs-tl-lb-prev');
    var lbNext      = lb.querySelector('.gprs-tl-lb-next');
    var lbDots      = lb.querySelector('.gprs-tl-lb-dots');
    var lbPeriod    = lb.querySelector('.gprs-tl-lb-period');
    var lbTitle     = lb.querySelector('.gprs-tl-lb-title');
    var lbText      = lb.querySelector('.gprs-tl-lb-text');
    var lbCounter   = lb.querySelector('.gprs-tl-lb-counter');
    var lbEntryPrev = lb.querySelector('.gprs-tl-lb-entry-prev');
    var lbEntryNext = lb.querySelector('.gprs-tl-lb-entry-next');

    var currentEntry = 0;
    var currentSlide = 0;
    var previousFocus = null;

    /* ========================================================
       4. OPEN / CLOSE
    ======================================================== */

    function openLightbox(entryIndex) {
        previousFocus = document.activeElement;
        currentEntry  = entryIndex;
        currentSlide  = 0;

        lb.hidden = false;
        document.body.style.overflow = 'hidden';

        renderEntry();
        lbClose.focus();

        /* Trap focus */
        lb.addEventListener('keydown', trapFocus);
    }

    function closeLightbox() {
        lb.hidden = true;
        document.body.style.overflow = '';
        lb.removeEventListener('keydown', trapFocus);

        /* Clear blurred bg to free memory */
        if (lbBgBlur) {
            lbBgBlur.style.backgroundImage = '';
        }

        if (previousFocus) {
            previousFocus.focus();
        }
    }

    /* ========================================================
       4b. UPDATE BLURRED HERO BACKGROUND
    ======================================================== */

    function updateBgBlur(imageUrl) {
        if (!lbBgBlur) return;
        lbBgBlur.style.backgroundImage = 'url(' + imageUrl + ')';
    }

    /* ========================================================
       5. RENDER ENTRY
    ======================================================== */

    function renderEntry() {
        var entry  = data[currentEntry];
        var images = entry.images;
        var total  = images.length;

        /* Caption */
        lbPeriod.textContent = entry.period;
        lbTitle.textContent  = entry.title;
        lbText.textContent   = entry.text;

        /* Image */
        showSlide(0);

        /* Arrows (within images) */
        lbPrev.hidden = total <= 1;
        lbNext.hidden = total <= 1;

        /* Dots */
        lbDots.innerHTML = '';
        if (total > 1) {
            for (var d = 0; d < total; d++) {
                var dot = document.createElement('button');
                dot.className = 'gprs-tl-lb-dot';
                dot.setAttribute('role', 'tab');
                dot.setAttribute('aria-label', 'Image ' + (d + 1) + ' of ' + total);
                dot.setAttribute('data-slide', d);
                if (d === 0) dot.classList.add('gprs-tl-lb-dot--active');
                lbDots.appendChild(dot);
            }
        }

        /* Counter */
        if (total > 1) {
            lbCounter.textContent = '1 / ' + total + ' photos';
        } else {
            lbCounter.textContent = '';
        }

        /* Entry nav */
        lbEntryPrev.disabled = currentEntry === 0;
        lbEntryNext.disabled = currentEntry === totalEntries - 1;
    }

    /* ========================================================
       6. SHOW SLIDE
    ======================================================== */

    function showSlide(index) {
        var images = data[currentEntry].images;
        if (index < 0 || index >= images.length) return;

        currentSlide = index;

        /* Fade transition */
        lbImage.classList.add('gprs-tl-lb-loading');
        lbImage.src = '';

        /* Update blurred hero background */
        updateBgBlur(images[index]);

        var img = new Image();
        img.onload = function () {
            lbImage.src = img.src;
            var alts = data[currentEntry].alts;
            lbImage.alt = (alts && alts[index]) ? alts[index] : data[currentEntry].title + ' — photo ' + (index + 1);
            lbImage.classList.remove('gprs-tl-lb-loading');
        };
        img.onerror = function () {
            lbImage.src = images[index];
            var alts = data[currentEntry].alts;
            lbImage.alt = (alts && alts[index]) ? alts[index] : data[currentEntry].title;
            lbImage.classList.remove('gprs-tl-lb-loading');
        };
        img.src = images[index];

        /* Update dots */
        var dots = lbDots.querySelectorAll('.gprs-tl-lb-dot');
        dots.forEach(function (d, i) {
            d.classList.toggle('gprs-tl-lb-dot--active', i === index);
            d.setAttribute('aria-selected', i === index ? 'true' : 'false');
        });

        /* Update counter */
        if (images.length > 1) {
            lbCounter.textContent = (index + 1) + ' / ' + images.length + ' photos';
        }
    }

    /* ========================================================
       7. NAVIGATION HELPERS
    ======================================================== */

    function nextSlide() {
        var images = data[currentEntry].images;
        if (currentSlide < images.length - 1) {
            showSlide(currentSlide + 1);
        }
    }

    function prevSlide() {
        if (currentSlide > 0) {
            showSlide(currentSlide - 1);
        }
    }

    function nextEntry() {
        if (currentEntry < totalEntries - 1) {
            currentEntry++;
            currentSlide = 0;
            renderEntry();
        }
    }

    function prevEntry() {
        if (currentEntry > 0) {
            currentEntry--;
            currentSlide = 0;
            renderEntry();
        }
    }

    /* ========================================================
       8. EVENT LISTENERS
    ======================================================== */

    /* Open from timeline cards */
    cards.forEach(function (card) {
        card.addEventListener('click', function () {
            var idx = parseInt(card.getAttribute('data-tl-entry'), 10);
            openLightbox(idx);
        });
    });

    /* Close */
    lbClose.addEventListener('click', closeLightbox);
    lbBackdrop.addEventListener('click', closeLightbox);

    /* Image arrows */
    lbPrev.addEventListener('click', prevSlide);
    lbNext.addEventListener('click', nextSlide);

    /* Dot clicks */
    lbDots.addEventListener('click', function (e) {
        var dot = e.target.closest('.gprs-tl-lb-dot');
        if (dot) {
            var idx = parseInt(dot.getAttribute('data-slide'), 10);
            showSlide(idx);
        }
    });

    /* Entry nav */
    lbEntryPrev.addEventListener('click', prevEntry);
    lbEntryNext.addEventListener('click', nextEntry);

    /* Keyboard */
    document.addEventListener('keydown', function (e) {
        if (lb.hidden) return;

        switch (e.key) {
            case 'Escape':
                closeLightbox();
                break;
            case 'ArrowLeft':
                e.preventDefault();
                if (data[currentEntry].images.length > 1) {
                    prevSlide();
                } else {
                    prevEntry();
                }
                break;
            case 'ArrowRight':
                e.preventDefault();
                if (data[currentEntry].images.length > 1) {
                    nextSlide();
                } else {
                    nextEntry();
                }
                break;
            case 'ArrowUp':
                e.preventDefault();
                prevEntry();
                break;
            case 'ArrowDown':
                e.preventDefault();
                nextEntry();
                break;
        }
    });

    /* Touch / swipe support */
    var touchStartX = 0;
    var touchStartY = 0;

    lb.addEventListener('touchstart', function (e) {
        touchStartX = e.changedTouches[0].screenX;
        touchStartY = e.changedTouches[0].screenY;
    }, { passive: true });

    lb.addEventListener('touchend', function (e) {
        var dx = e.changedTouches[0].screenX - touchStartX;
        var dy = e.changedTouches[0].screenY - touchStartY;

        /* Horizontal swipe must be stronger than vertical */
        if (Math.abs(dx) > 50 && Math.abs(dx) > Math.abs(dy)) {
            if (dx > 0) {
                /* Swipe right — prev */
                if (data[currentEntry].images.length > 1 && currentSlide > 0) {
                    prevSlide();
                } else {
                    prevEntry();
                }
            } else {
                /* Swipe left — next */
                if (data[currentEntry].images.length > 1 && currentSlide < data[currentEntry].images.length - 1) {
                    nextSlide();
                } else {
                    nextEntry();
                }
            }
        }
    }, { passive: true });

    /* ========================================================
       9. FOCUS TRAP
    ======================================================== */

    function trapFocus(e) {
        if (e.key !== 'Tab') return;

        var focusable = lb.querySelectorAll(
            'button:not([hidden]):not([disabled]), [tabindex]:not([tabindex="-1"])'
        );
        if (focusable.length === 0) return;

        var first = focusable[0];
        var last  = focusable[focusable.length - 1];

        if (e.shiftKey) {
            if (document.activeElement === first) {
                e.preventDefault();
                last.focus();
            }
        } else {
            if (document.activeElement === last) {
                e.preventDefault();
                first.focus();
            }
        }
    }

})();
