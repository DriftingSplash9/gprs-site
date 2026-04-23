<?php
/**
 * 404 Page — Custom GPRS Content (Astra Hook Version)
 * Originally: WPCode snippet
 */

/* ============================================================
   404 Page — Custom GPRS Content (Astra Hook Version)
   ============================================================
   Purpose:  Replaces Astra's default "link was faulty" 404 page
             with a proper GPRS 404: hero, animated logo video,
             reassuring message, search bar, navigation cards,
             and contact fallback.

   Type:     PHP Snippet (NOT Universal)
   Auto:     Run Everywhere
   Priority: 12
   Depends:  01-Tokens, 02-Base, 05-Components (hero classes),
             07-Buttons (.btn-primary), 12-404 (CSS)

   Updated:  2026-03-12

   HOW IT WORKS:
   This snippet registers two WordPress action hooks that
   fire inside Astra's template system on 404 pages only:

   1. astra_content_before  → outputs the full-width hero
      (fires BEFORE Astra's .ast-container, so the hero
       can span the full viewport width)

   2. astra_primary_content_top → outputs the body content
      (video, message, search bar, nav cards, contact info)

   Astra's own 404 content ("link was faulty" + search box)
   is hidden by CSS rules in 12-404-styles.css.

   The Dynamic Hero snippet must also have the is_404() bail-out
   line to prevent it from rendering a default hero on 404 pages.
   ============================================================ */


/* ────────────────────────────────────────────────────────────
   HOOK 1: HERO — Full-width, before Astra's content container
   ──────────────────────────────────────────────────────────── */
add_action( 'astra_content_before', 'gprs_404_render_hero' );

function gprs_404_render_hero() {
	if ( ! is_404() ) {
		return;
	}

	$uploads = wp_get_upload_dir()['baseurl'];
	$home    = esc_url( home_url( '/' ) );
	?>

	<?php $hero_img = $uploads . '/2025/12/IMG_0983-scaled-e1764562777634.jpg'; ?>
	<section class="hero hero--404" id="content">
		<img class="gprs-img-hero"
		     src="<?php echo esc_url( $hero_img ); ?>"<?php echo gprs_hero_srcset_attrs( $hero_img ); ?>
		     alt=""
		     loading="eager"
		     decoding="async"
		     fetchpriority="high">

		<div class="hero-content hero-content--centered">
			<div class="hero-stack">
				<div class="hero-title-box">
					<h1 class="hero-title">Page Not Found</h1>
				</div>
				<p class="hero-mission">
					The page you&#x2019;re looking for may have moved during our recent site redesign.
				</p>
				<div class="hero-buttons">
					<a href="<?php echo $home; ?>" class="btn btn-primary">Go Home</a>
					<a href="#gprs-404-search" class="btn btn-outline">Search the Site</a>
				</div>
			</div>
		</div>
	</section>

	<?php
}


/* ────────────────────────────────────────────────────────────
   HOOK 2: BODY — Inside Astra's primary content area
   (video, message, search, nav cards, contact fallback)
   ──────────────────────────────────────────────────────────── */
add_action( 'astra_primary_content_top', 'gprs_404_render_body' );

function gprs_404_render_body() {
	if ( ! is_404() ) {
		return;
	}

	$uploads = wp_get_upload_dir()['baseurl'];
	$home    = esc_url( home_url( '/' ) );
	?>

	<main class="gprs-404" aria-label="Page not found — navigation help">

		<!-- ─── ANIMATED LOGO VIDEO ─── -->
		<div class="gprs-404__video-wrap">
			<video class="gprs-404__video"
			       autoplay
			       muted
			       loop
			       playsinline
			       aria-hidden="true"
			       poster="<?php echo esc_url( $uploads ); ?>/2025/11/gprs-logo.svg">
				<source src="<?php echo esc_url( $uploads ); ?>/2026/03/grok-video-ff53f39e-937e-43a6-aab2-a0debdb92518.mp4"
				        type="video/mp4">
			</video>
			<button class="gprs-404__pause-btn"
			        type="button"
			        aria-label="Pause logo animation"
			        title="Pause animation">
				<svg width="18" height="18" viewBox="0 0 18 18" fill="none" aria-hidden="true">
					<rect class="gprs-404__pause-icon" x="3" y="2" width="4" height="14" rx="1" fill="currentColor"/>
					<rect class="gprs-404__pause-icon" x="11" y="2" width="4" height="14" rx="1" fill="currentColor"/>
					<polygon class="gprs-404__play-icon" points="4,2 16,9 4,16" fill="currentColor" style="display:none"/>
				</svg>
			</button>
		</div>

		<!-- ─── REASSURING MESSAGE ─── -->
		<div class="gprs-404__message">
			<h2 class="gprs-404__heading">We&#x2019;ve been rebuilding &#x2014; both our housing and our website.</h2>
			<p class="gprs-404__text">
				Our site was recently redesigned with a cleaner and more modern structure. The link
				you followed may point to an older address. Try searching below,
				or jump directly to the section you need.
			</p>
		</div>

		<!-- ─── SEARCH BAR ─── -->
		<div class="gprs-404__search" id="gprs-404-search">
			<form role="search"
			      method="get"
			      action="<?php echo $home; ?>"
			      class="gprs-404__search-form">
				<label for="gprs-404-input" class="sr-only">Search GPRS' website</label>
				<input type="search"
				       id="gprs-404-input"
				       name="s"
				       class="gprs-404__search-input"
				       placeholder="Search for housing, volunteering, donations&#x2026;"
				       autocomplete="off">
				<button type="submit" class="btn btn-primary gprs-404__search-btn">
					Search
				</button>
			</form>
		</div>

		<!-- ─── NAVIGATION CARDS ─── -->
		<div class="gprs-404__nav">
			<h2 class="gprs-404__nav-heading">Where would you like to go?</h2>

			<div class="gprs-404__grid">

				<a href="<?php echo $home; ?>" class="gprs-404__card">
					<span class="gprs-404__card-icon" aria-hidden="true">🏠</span>
					<span class="gprs-404__card-title">Home</span>
					<span class="gprs-404__card-desc">Back to the front page</span>
				</a>

				<a href="<?php echo esc_url( home_url( '/housing/' ) ); ?>" class="gprs-404__card">
					<span class="gprs-404__card-icon" aria-hidden="true">🏘️</span>
					<span class="gprs-404__card-title">Our Housing</span>
					<span class="gprs-404__card-desc">87 barrier-free units across three phases since 1987</span>
				</a>

				<a href="<?php echo esc_url( home_url( '/apply/' ) ); ?>" class="gprs-404__card">
					<span class="gprs-404__card-icon" aria-hidden="true">📋</span>
					<span class="gprs-404__card-title">Apply for Housing</span>
					<span class="gprs-404__card-desc">Step-by-step accessible housing application</span>
				</a>

				<a href="<?php echo esc_url( home_url( '/news/' ) ); ?>" class="gprs-404__card">
					<span class="gprs-404__card-icon" aria-hidden="true">📰</span>
					<span class="gprs-404__card-title">News &amp; MEM Rebuild</span>
					<span class="gprs-404__card-desc">Margaret Edgson Manor rebuild progress and updates</span>
				</a>

				<a href="<?php echo esc_url( home_url( '/volunteer/' ) ); ?>" class="gprs-404__card">
					<span class="gprs-404__card-icon" aria-hidden="true">🤝</span>
					<span class="gprs-404__card-title">Volunteer</span>
					<span class="gprs-404__card-desc">Join a committee, become a Society member, or help with outreach</span>
				</a>

				<a href="<?php echo esc_url( home_url( '/donate/' ) ); ?>" class="gprs-404__card">
					<span class="gprs-404__card-icon" aria-hidden="true">💙</span>
					<span class="gprs-404__card-title">Support the Rebuild</span>
					<span class="gprs-404__card-desc">Every contribution helps restore accessible homes</span>
				</a>

				<a href="<?php echo esc_url( home_url( '/our-story/' ) ); ?>" class="gprs-404__card">
					<span class="gprs-404__card-icon" aria-hidden="true">📖</span>
					<span class="gprs-404__card-title">Our Story</span>
					<span class="gprs-404__card-desc">Nearly four decades of community-built housing</span>
				</a>

				<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="gprs-404__card">
					<span class="gprs-404__card-icon" aria-hidden="true">📞</span>
					<span class="gprs-404__card-title">Contact Us</span>
					<span class="gprs-404__card-desc">(780) 532-3276 &bull; gpresidentialsociety@gmail.com</span>
				</a>

			</div>
		</div>

		<!-- ─── DIRECT CONTACT FALLBACK ─── -->
		<div class="gprs-404__contact">
			<p>
				Still can&#x2019;t find what you need?
				Call us at <a href="tel:7805323276">(780) 532-3276</a>
				or email <a href="mailto:gpresidentialsociety@gmail.com">gpresidentialsociety@gmail.com</a>
			</p>
		</div>

	</main>

	<!-- ─── PAUSE / PLAY TOGGLE ─── -->
	<script>
	(function() {
		'use strict';
		var btn = document.querySelector('.gprs-404__pause-btn');
		var vid = document.querySelector('.gprs-404__video');
		if (!btn || !vid) return;

		var pauseIcons = btn.querySelectorAll('.gprs-404__pause-icon');
		var playIcon   = btn.querySelector('.gprs-404__play-icon');

		btn.addEventListener('click', function() {
			if (vid.paused) {
				vid.play();
				pauseIcons.forEach(function(el) { el.style.display = ''; });
				playIcon.style.display = 'none';
				btn.setAttribute('aria-label', 'Pause logo animation');
			} else {
				vid.pause();
				pauseIcons.forEach(function(el) { el.style.display = 'none'; });
				playIcon.style.display = '';
				btn.setAttribute('aria-label', 'Play logo animation');
			}
		});

		/* Respect prefers-reduced-motion: auto-pause the video */
		var mq = window.matchMedia('(prefers-reduced-motion: reduce)');
		if (mq.matches) {
			vid.pause();
			pauseIcons.forEach(function(el) { el.style.display = 'none'; });
			playIcon.style.display = '';
			btn.setAttribute('aria-label', 'Play logo animation');
		}
	})();
	</script>

	<?php
}
