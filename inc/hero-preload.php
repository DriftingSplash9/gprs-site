<?php
/**
 * Hero Image Preload
 *
 * Outputs a <link rel="preload"> in the <head> for the hero
 * background image on the current page. This tells the browser
 * to start downloading the hero image immediately — before it
 * encounters the <img> tag in the body — which directly improves
 * Largest Contentful Paint (LCP).
 *
 * The page-to-image logic mirrors hero.php exactly. If you change
 * a hero image in hero.php, update it here too.
 *
 * Self-hooking: require_once this file in functions.php.
 *
 * Updated: 2026-03-26 — Added fire rebuild page preload, slug-based fallbacks
 */

add_action( 'wp_head', 'gprs_preload_hero_image', 1 );

function gprs_preload_hero_image() {

	$uploads = wp_get_upload_dir()['baseurl'];
	$image   = '';
	$type    = 'image/jpeg';

	if ( is_404() ) {
		// 404 hero uses the same image as homepage
		$image = $uploads . '/2025/12/IMG_0983-scaled-e1764562777634.jpg';

	} elseif ( is_singular() ) {
		$page_id = get_queried_object_id();

		// No hero pages — skip preload entirely
		// IDs: 156 (accessibility), 2004 (privacy), 2538 (faq)
		if (
			in_array( $page_id, array( 156, 2004, 2538 ), true )
			|| is_page( 'accessibility' )
			|| is_page( 'privacy' )
			|| is_page( 'faq' )
		) {
			return;
		}

		// Volunteer page (ID 1427, slug 'volunteer')
		if ( $page_id === 1427 || is_page( 'volunteer' ) ) {
			$image = $uploads . '/2025/11/pexels-photo-5029919-5029919-scaled-e1766013935470.jpg';

		// Story page (ID 1429, slug 'our-story')
		} elseif ( $page_id === 1429 || is_page( 'our-story' ) ) {
			$image = $uploads . '/2025/12/IMG_0988-scaled-e1764954260474.jpg';

		// Donate page (ID 2418, slug 'donate')
		} elseif ( $page_id === 2418 || is_page( 'donate' ) ) {
			$image = $uploads . '/2026/01/mem-cleaned-up.png';
			$type  = 'image/png';

		// Fire Rebuild page (slug 'margaret-edgson-manor-rebuild-efforts')
		} elseif ( is_page( 'margaret-edgson-manor-rebuild-efforts' ) ) {
			$image = $uploads . '/2026/03/DJI_20260110142827_0056_D-scaled-e1774515617787.jpg';

		// Homepage + all other pages (default hero)
		} else {
			$image = $uploads . '/2026/03/IMG_4052-e1774514929158.jpg';
		}
	}

	if ( $image ) {
		echo '<link rel="preload" as="image" href="' . esc_url( $image ) . '" type="' . esc_attr( $type ) . '">' . "\n";
	}
}
