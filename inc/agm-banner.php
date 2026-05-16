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

		<span class="gprs-agm-banner__icon" aria-hidden="true">
			<svg width="20" height="20" viewBox="0 0 24 24" fill="none"
			     stroke="currentColor" stroke-width="2.2"
			     stroke-linecap="round" stroke-linejoin="round">
				<rect x="3" y="4" width="18" height="18" rx="2"/>
				<line x1="16" y1="2" x2="16" y2="6"/>
				<line x1="8" y1="2" x2="8" y2="6"/>
				<line x1="3" y1="10" x2="21" y2="10"/>
			</svg>
		</span>

		<p class="gprs-agm-banner__text">
			<strong>You&rsquo;re invited!</strong>
			GPRS BBQ &amp; Annual General Meeting &mdash;
			<span class="gprs-agm-banner__date">Tuesday, June&nbsp;16,&nbsp;2026</span>.
			BBQ supper 5:30&nbsp;pm &middot; AGM &amp; election of officers 7&nbsp;pm &middot;
			GPRS 7-Plex parking lot, 9609&nbsp;&ndash;&nbsp;123&nbsp;Avenue.
			Everyone welcome &mdash; voting memberships $5 at the door.
		</p>

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
