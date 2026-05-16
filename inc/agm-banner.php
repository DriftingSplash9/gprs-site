<?php
/**
 * AGM / BBQ Announcement Banner
 *
 * Self-hooking include — outputs a slim, dismissible site-wide
 * announcement bar for the annual BBQ + Annual General Meeting.
 * Loaded via require_once in functions.php.
 *
 * Behaviour:
 *   1. Fixed bar pinned directly below the site header on every page.
 *   2. Visitors can dismiss it; the choice is remembered in the
 *      browser (localStorage) so it stays closed on future visits.
 *   3. Automatically stops showing after GPRS_AGM_BANNER_UNTIL, so the
 *      announcement disappears on its own once the event has passed —
 *      no need to remember to take it down.
 *
 * TO REUSE NEXT YEAR:
 *   - Update the GPRS_AGM_BANNER_UNTIL date.
 *   - Bump the year in GPRS_AGM_BANNER_KEY so anyone who dismissed
 *     last year's banner still sees the new one.
 *   - Update the event wording in gprs_render_agm_banner() below.
 *
 * @package Astra Child – GPRS
 * @since   2026-05-15
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/* ────────────────────────────────────────────────────────────
   EVENT CONFIG — edit these to update or reuse the banner
   ──────────────────────────────────────────────────────────── */

// Last date the banner shows (YYYY-MM-DD). After this it auto-hides.
define( 'GPRS_AGM_BANNER_UNTIL', '2026-06-16' );

// localStorage key — bump the year for a brand-new announcement so
// visitors who dismissed an older banner still see the new one.
define( 'GPRS_AGM_BANNER_KEY', 'gprs-agm-2026-dismissed' );


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
   NO-FLASH SCRIPT — runs in <head>, before the page paints.
   If the visitor already dismissed the banner, this hides it
   immediately so it never flickers into view.
   ──────────────────────────────────────────────────────────── */
add_action( 'wp_head', 'gprs_agm_banner_head_script', 1 );
function gprs_agm_banner_head_script() {
	if ( ! gprs_agm_banner_active() ) {
		return;
	}
	$key = wp_json_encode( GPRS_AGM_BANNER_KEY );
	echo '<script>(function(){try{if(localStorage.getItem(' . $key .
		")==='1'){document.documentElement.className+=' gprs-agm-dismissed';}}catch(e){}})();</script>" . "\n";
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
			<svg width="22" height="22" viewBox="0 0 24 24" fill="none"
			     stroke="currentColor" stroke-width="2"
			     stroke-linecap="round" stroke-linejoin="round">
				<rect x="3" y="4" width="18" height="18" rx="2"/>
				<line x1="16" y1="2" x2="16" y2="6"/>
				<line x1="8" y1="2" x2="8" y2="6"/>
				<line x1="3" y1="10" x2="21" y2="10"/>
			</svg>
		</span>

		<p class="gprs-agm-banner__text">
			<strong>You&rsquo;re invited!</strong>
			GPRS BBQ &amp; Annual General Meeting &mdash; Tuesday, June&nbsp;16,&nbsp;2026.
			BBQ supper 5:30&nbsp;pm &middot; AGM &amp; election of officers 7&nbsp;pm &middot;
			GPRS 7-Plex parking lot, 9609&nbsp;&ndash;&nbsp;123&nbsp;Avenue.
			Everyone welcome &mdash; voting memberships $5 at the door.
		</p>

		<button type="button" class="gprs-agm-banner__close"
		        aria-label="Dismiss this announcement">
			<svg width="20" height="20" viewBox="0 0 24 24" fill="none"
			     stroke="currentColor" stroke-width="2.5"
			     stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
				<line x1="18" y1="6" x2="6" y2="18"/>
				<line x1="6" y1="6" x2="18" y2="18"/>
			</svg>
		</button>

	</div>
</div>
<script>
(function(){
	var KEY = <?php echo wp_json_encode( GPRS_AGM_BANNER_KEY ); ?>;
	var banner = document.getElementById('gprs-agm-banner');
	if (!banner) { return; }
	var root = document.documentElement;

	/* Already dismissed (head script set the class) — remove and stop. */
	if (root.classList.contains('gprs-agm-dismissed')) {
		if (banner.parentNode) { banner.parentNode.removeChild(banner); }
		return;
	}

	/* Tell the CSS the banner's true rendered height so it can
	   reserve exactly the right amount of space below the header. */
	function syncHeight(){
		root.style.setProperty('--agm-banner-height', banner.offsetHeight + 'px');
	}
	syncHeight();
	window.addEventListener('resize', syncHeight);

	/* Dismiss — remember the choice and collapse the reserved space. */
	banner.querySelector('.gprs-agm-banner__close').addEventListener('click', function(){
		try { localStorage.setItem(KEY, '1'); } catch (e) {}
		root.classList.add('gprs-agm-dismissed');
		root.style.setProperty('--agm-banner-height', '0px');
		if (banner.parentNode) { banner.parentNode.removeChild(banner); }
	});
})();
</script>
	<?php
}
