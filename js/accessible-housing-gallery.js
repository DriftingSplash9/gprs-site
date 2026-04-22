/**
 * accessible-housing-gallery.js
 *
 * Standalone lightbox for /accessible-housing/ photo galleries.
 * Each gallery (data-gallery) opens its own scoped context.
 *
 * Features:
 *   - Open/close with animation
 *   - Previous/next image navigation
 *   - Dot navigation (role="tablist")
 *   - Image counter ("3 / 7 photos")
 *   - Keyboard: Escape to close, ArrowLeft/Right for prev/next
 *   - Touch: horizontal swipe for prev/next
 *   - Focus trap (Tab cycles within lightbox)
 *   - Blurred background image
 *   - Body overflow lock when open
 *   - Focus restoration on close
 *
 * No dependencies. IIFE. 'use strict'.
 */

(function () {
    'use strict';

    /* ──────────────────────────────────────────────
       DOM References
       ────────────────────────────────────────────── */

    var lightbox         = document.querySelector('.gprs-housing-lightbox');
    if (!lightbox) return;

    var backdropImg      = lightbox.querySelector('.gprs-housing-lightbox__backdrop-img');
    var mainImg          = lightbox.querySelector('.gprs-housing-lightbox__img');
    var captionTitle     = lightbox.querySelector('.gprs-housing-lightbox__gallery-title');
    var captionAlt       = lightbox.querySelector('.gprs-housing-lightbox__alt-text');
    var counter          = lightbox.querySelector('.gprs-housing-lightbox__counter');
    var dotsContainer    = lightbox.querySelector('.gprs-housing-lightbox__dots');
    var btnClose         = lightbox.querySelector('.gprs-housing-lightbox__close');
    var btnPrev          = lightbox.querySelector('.gprs-housing-lightbox__arrow--prev');
    var btnNext          = lightbox.querySelector('.gprs-housing-lightbox__arrow--next');
    var overlay          = lightbox.querySelector('.gprs-housing-lightbox__overlay');

    /* ──────────────────────────────────────────────
       State
       ────────────────────────────────────────────── */

    var currentGallery   = null;   // Array of { src, alt } for active gallery
    var currentIndex     = 0;
    var galleryTitle     = '';
    var triggerElement   = null;   // Button that opened the lightbox (for focus restore)
    var dots             = [];
    var isOpen           = false;

    /* Touch tracking */
    var touchStartX      = 0;
    var touchStartY      = 0;
    var touchDeltaX      = 0;
    var swipeThreshold   = 50;

    /* Reduced motion preference */
    var prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;


    /* ──────────────────────────────────────────────
       Gallery Data Collection
       ────────────────────────────────────────────── */

    /**
     * Collect image data from a gallery element's thumbnails.
     * Each thumbnail button contains an <img> whose src is the full-size URL.
     * The aria-label on the button contains the alt text after the colon.
     */
    function getGalleryImages(galleryEl) {
        var thumbs = galleryEl.querySelectorAll('.gprs-housing-gallery__thumb');
        var images = [];
        for (var i = 0; i < thumbs.length; i++) {
            var img = thumbs[i].querySelector('.gprs-housing-gallery__thumb-img');
            var label = thumbs[i].getAttribute('aria-label') || '';
            /* Extract alt text from after the last colon, e.g. "Open exterior photo 1 of 19: Alt text here" */
            var colonIndex = label.lastIndexOf(':');
            var altText = colonIndex > -1 ? label.substring(colonIndex + 1).trim() : '';
            images.push({
                src: img ? img.src : '',
                alt: altText
            });
        }
        return images;
    }

    function getGalleryTitle(galleryEl) {
        var titleEl = galleryEl.querySelector('.gprs-housing-gallery__title');
        return titleEl ? titleEl.textContent.trim() : '';
    }


    /* ──────────────────────────────────────────────
       Open / Close
       ────────────────────────────────────────────── */

    function openLightbox(galleryEl, index, trigger) {
        currentGallery = getGalleryImages(galleryEl);
        galleryTitle   = getGalleryTitle(galleryEl);
        currentIndex   = index;
        triggerElement = trigger;

        if (!currentGallery.length) return;

        /* Build dots */
        buildDots();

        /* Show/hide arrows for single-image galleries */
        var singleImage = currentGallery.length <= 1;
        btnPrev.hidden = singleImage;
        btnNext.hidden = singleImage;

        /* Display image */
        showImage(currentIndex, false);

        /* Open dialog */
        lightbox.removeAttribute('hidden');
        isOpen = true;

        /* Lock body scroll */
        document.body.style.overflow = 'hidden';

        /* Focus the close button */
        requestAnimationFrame(function () {
            btnClose.focus();
        });
    }

    function closeLightbox() {
        if (!isOpen) return;

        lightbox.setAttribute('hidden', '');
        isOpen = false;

        /* Restore body scroll */
        document.body.style.overflow = '';

        /* Restore focus */
        if (triggerElement) {
            triggerElement.focus();
            triggerElement = null;
        }

        /* Cleanup */
        currentGallery = null;
        dots = [];
        dotsContainer.innerHTML = '';
    }


    /* ──────────────────────────────────────────────
       Image Display
       ────────────────────────────────────────────── */

    function showImage(index, animate) {
        if (!currentGallery || index < 0 || index >= currentGallery.length) return;

        currentIndex = index;
        var data = currentGallery[index];

        /* Loading state */
        if (animate && !prefersReducedMotion) {
            mainImg.classList.add('is-loading');
        }

        /* Set sources */
        mainImg.src = data.src;
        mainImg.alt = data.alt;
        backdropImg.src = data.src;

        /* Caption */
        captionTitle.textContent = galleryTitle;
        captionAlt.textContent = data.alt;

        /* Counter */
        counter.textContent = (index + 1) + ' / ' + currentGallery.length + ' photos';

        /* Update dots */
        updateDots(index);

        /* Clear loading after image loads */
        mainImg.onload = function () {
            mainImg.classList.remove('is-loading');
        };
    }


    /* ──────────────────────────────────────────────
       Navigation
       ────────────────────────────────────────────── */

    function goToPrev() {
        if (!currentGallery) return;
        var newIndex = currentIndex - 1;
        if (newIndex < 0) newIndex = currentGallery.length - 1;
        showImage(newIndex, true);
    }

    function goToNext() {
        if (!currentGallery) return;
        var newIndex = currentIndex + 1;
        if (newIndex >= currentGallery.length) newIndex = 0;
        showImage(newIndex, true);
    }

    function goToIndex(index) {
        if (!currentGallery) return;
        if (index >= 0 && index < currentGallery.length) {
            showImage(index, true);
        }
    }


    /* ──────────────────────────────────────────────
       Dot Navigation
       ────────────────────────────────────────────── */

    function buildDots() {
        dotsContainer.innerHTML = '';
        dots = [];

        if (!currentGallery) return;

        for (var i = 0; i < currentGallery.length; i++) {
            var dot = document.createElement('button');
            dot.type = 'button';
            dot.className = 'gprs-housing-lightbox__dot';
            dot.setAttribute('role', 'tab');
            dot.setAttribute('aria-label', 'Photo ' + (i + 1));
            dot.setAttribute('data-dot-index', i);
            if (i === currentIndex) {
                dot.classList.add('is-active');
                dot.setAttribute('aria-selected', 'true');
            } else {
                dot.setAttribute('aria-selected', 'false');
            }
            dotsContainer.appendChild(dot);
            dots.push(dot);
        }
    }

    function updateDots(activeIndex) {
        for (var i = 0; i < dots.length; i++) {
            if (i === activeIndex) {
                dots[i].classList.add('is-active');
                dots[i].setAttribute('aria-selected', 'true');
            } else {
                dots[i].classList.remove('is-active');
                dots[i].setAttribute('aria-selected', 'false');
            }
        }
    }


    /* ──────────────────────────────────────────────
       Focus Trap
       ────────────────────────────────────────────── */

    function getFocusableElements() {
        return lightbox.querySelectorAll(
            'button:not([hidden]):not([disabled]), [tabindex]:not([tabindex="-1"])'
        );
    }

    function trapFocus(e) {
        if (!isOpen) return;

        var focusable = getFocusableElements();
        if (!focusable.length) return;

        var first = focusable[0];
        var last  = focusable[focusable.length - 1];

        if (e.shiftKey && document.activeElement === first) {
            e.preventDefault();
            last.focus();
        } else if (!e.shiftKey && document.activeElement === last) {
            e.preventDefault();
            first.focus();
        }
    }


    /* ──────────────────────────────────────────────
       Touch / Swipe
       ────────────────────────────────────────────── */

    function onTouchStart(e) {
        if (!isOpen) return;
        var touch = e.touches[0];
        touchStartX = touch.clientX;
        touchStartY = touch.clientY;
        touchDeltaX = 0;
    }

    function onTouchMove(e) {
        if (!isOpen) return;
        var touch = e.touches[0];
        touchDeltaX = touch.clientX - touchStartX;
        var deltaY = Math.abs(touch.clientY - touchStartY);

        /* If horizontal swipe is dominant, prevent vertical scroll */
        if (Math.abs(touchDeltaX) > deltaY && Math.abs(touchDeltaX) > 10) {
            e.preventDefault();
        }
    }

    function onTouchEnd() {
        if (!isOpen) return;
        if (Math.abs(touchDeltaX) > swipeThreshold) {
            if (touchDeltaX < 0) {
                goToNext();
            } else {
                goToPrev();
            }
        }
        touchDeltaX = 0;
    }


    /* ──────────────────────────────────────────────
       Event Listeners
       ────────────────────────────────────────────── */

    /* Close button */
    btnClose.addEventListener('click', closeLightbox);

    /* Overlay click to close */
    overlay.addEventListener('click', closeLightbox);

    /* Container click to close — clicking empty space around the image
       (but not on the image, arrows, dots, or caption) closes lightbox */
    var container = lightbox.querySelector('.gprs-housing-lightbox__container');
    if (container) {
        container.addEventListener('click', function (e) {
            /* Only close if the click was directly on the container
               or on the figure element (not on the img itself) */
            if (e.target === container || e.target === container.querySelector('.gprs-housing-lightbox__figure')) {
                closeLightbox();
            }
        });
    }

    /* Prev / Next arrows */
    btnPrev.addEventListener('click', function (e) {
        e.stopPropagation();
        goToPrev();
    });

    btnNext.addEventListener('click', function (e) {
        e.stopPropagation();
        goToNext();
    });

    /* Dot navigation (event delegation) */
    dotsContainer.addEventListener('click', function (e) {
        var dot = e.target.closest('.gprs-housing-lightbox__dot');
        if (!dot) return;
        var idx = parseInt(dot.getAttribute('data-dot-index'), 10);
        if (!isNaN(idx)) {
            goToIndex(idx);
        }
    });

    /* Keyboard */
    document.addEventListener('keydown', function (e) {
        if (!isOpen) return;

        switch (e.key) {
            case 'Escape':
                closeLightbox();
                break;
            case 'ArrowLeft':
                e.preventDefault();
                goToPrev();
                break;
            case 'ArrowRight':
                e.preventDefault();
                goToNext();
                break;
            case 'Tab':
                trapFocus(e);
                break;
        }
    });

    /* Touch events on lightbox */
    lightbox.addEventListener('touchstart', onTouchStart, { passive: true });
    lightbox.addEventListener('touchmove', onTouchMove, { passive: false });
    lightbox.addEventListener('touchend', onTouchEnd, { passive: true });


    /* ──────────────────────────────────────────────
       Thumbnail Click Delegation
       ────────────────────────────────────────────── */

    /* Attach click listeners to all gallery containers */
    var galleries = document.querySelectorAll('.gprs-housing-gallery');

    for (var g = 0; g < galleries.length; g++) {
        (function (galleryEl) {
            galleryEl.addEventListener('click', function (e) {
                var thumb = e.target.closest('.gprs-housing-gallery__thumb');
                if (!thumb) return;

                var index = parseInt(thumb.getAttribute('data-index'), 10);
                if (isNaN(index)) index = 0;

                openLightbox(galleryEl, index, thumb);
            });
        })(galleries[g]);
    }

})();
