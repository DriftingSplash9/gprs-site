<?php
/**
 * AGM / BBQ Announcement Banner
 *
 * Self-hooking include — outputs a slim, persistent site-wide
 * announcement bar for the annual BBQ + Annual General Meeting.
 * Loaded via require_once in functions.php.
 *
 * Behaviour:
 *   1. Fixed bar pinned directly below the site header on every page.
 *   2. Always visible — visitors cannot dismiss or close it.
 *   3. Automatically stops showing after GPRS_AGM_BANNER_UNTIL, so the
 *      announcement disappears on its own once the event has passed —
 *      no need to remember to take it down.
 *
 * TO REUSE NEXT YEAR:
 *   - Update the GPRS_AGM_BANNER_UNTIL date.
 *   - Update the event wording in gprs_render_agm_banner() below.
 *
 * @package Astra Child – GPRS
 * @since   2026-05-15
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/* ────────────────────────────────────────────────────────────
   EVENT CONFIG — edit this to update or reuse the banner
   ──────────────────────────────────────────────────────────── */

// Last date the banner shows (YYYY-MM-DD). After this it auto-hides.
define( 'GPRS_AGM_BANNER_UNTIL', '2026-06-16' );


/**
 * Is the announcement banner currently active?
 *
 * @return bool True on or before the GPRS_AGM_BANNER_UNTIL date.
 */
function gprs_agm_banner_active() {
	return current_time( 'Y-m-d' ) <= GPRS_AGM_BANNER_UNTIL;
}


/* ────────────────────────────────────────────────────────────
   BODY CLASS — lets the CSS reserve space for the fixed bar
   ──────────────────────────────────────────────────────────── */
add_filter( 'body_class', 'gprs_agm_banner_body_class' );
function gprs_agm_banner_body_class( $classes ) {
	if ( gprs_agm_banner_active() ) {
		$classes[] = 'has-agm-banner';
	}
	return $classes;
}


/* ────────────────────────────────────────────────────────────
   THE BANNER — rendered just after the header
   ──────────────────────────────────────────────────────────── */
add_action( 'astra_body_top', 'gprs_render_agm_banner', 6 );
function gprs_render_agm_banner() {

	if ( ! gprs_agm_banner_active() ) {
		return;
	}
	?>
<div id="gprs-agm-banner" class="gprs-agm-banner" role="region" aria-label="Event announcement">
	<div class="gprs-agm-banner__inner">

		<span class="gprs-agm-banner__date-chip" aria-hidden="true">
			<span class="gprs-agm-banner__date-month">JUN</span>
			<span class="gprs-agm-banner__date-day">16</span>
			<span class="gprs-agm-banner__date-year">2026</span>
		</span>

		<div class="gprs-agm-banner__copy">

			<p class="gprs-agm-banner__head">
				<span class="screen-reader-text">You are invited to the </span>
				Annual General Meeting
				<span class="gprs-agm-banner__dash" aria-hidden="true">&mdash;</span>
				<span class="gprs-agm-banner__welcome">open to everyone</span>
			</p>

			<p class="gprs-agm-banner__sub">
				<span class="gprs-agm-banner__pill">Tenants</span>
				<span class="gprs-agm-banner__pill-text">BBQ supper 5:30&nbsp;pm before the meeting</span>
			</p>

			<p class="gprs-agm-banner__meta">
				<span class="gprs-agm-banner__date">Tuesday, June&nbsp;16,&nbsp;2026</span>
				<span class="gprs-agm-banner__sep" aria-hidden="true">&middot;</span>
				AGM 7:00&nbsp;pm
				<span class="gprs-agm-banner__sep" aria-hidden="true">&middot;</span>
				GPRS 7-Plex, 9609&nbsp;&ndash;&nbsp;123&nbsp;Avenue
				<span class="gprs-agm-banner__sep" aria-hidden="true">&middot;</span>
				$5 voting membership at the door
			</p>

		</div>

	</div>
</div>
<script>
/* Tells the CSS the banner's true rendered height so it can
   reserve exactly the right amount of space below the header
   (the message wraps to more lines on narrow screens). */
(function(){
	var banner = document.getElementById('gprs-agm-banner');
	if (!banner) { return; }
	function syncHeight(){
		document.documentElement.style.setProperty(
			'--agm-banner-height', banner.offsetHeight + 'px'
		);
	}
	syncHeight();
	window.addEventListener('resize', syncHeight);
})();
</script>
	<?php
}
