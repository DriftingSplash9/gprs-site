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

/**
 * Resolve srcset + sizes for a hero image URL.
 *
 * Uses WordPress' attachment metadata when it can find the upload. If the
 * URL is an edited copy or can't be matched to an attachment, returns empty
 * strings — callers should then fall back to single-image behaviour.
 *
 * @param string $image_url Full URL of the hero image.
 * @return array{srcset:string,sizes:string}
 */
function gprs_hero_srcset_data( $image_url ) {
	$attachment_id = attachment_url_to_postid( $image_url );
	if ( ! $attachment_id ) {
		return array( 'srcset' => '', 'sizes' => '' );
	}
	$srcset = wp_get_attachment_image_srcset( $attachment_id, 'full' );
	if ( ! $srcset ) {
		return array( 'srcset' => '', 'sizes' => '' );
	}
	return array(
		'srcset' => $srcset,
		'sizes'  => '100vw',
	);
}

/**
 * Returns ' srcset="..." sizes="100vw"' for inline use after the src attr of
 * a hero <img>. Empty string when no responsive variants exist.
 */
function gprs_hero_srcset_attrs( $image_url ) {
	$data = gprs_hero_srcset_data( $image_url );
	if ( ! $data['srcset'] ) {
		return '';
	}
	return ' srcset="' . esc_attr( $data['srcset'] ) . '" sizes="' . esc_attr( $data['sizes'] ) . '"';
}

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
			$image = $uploads . '/2026/08/mem-rebuild-2026-08-hero.jpg';

		// MEM announcement page (slug 'mem-rebuild-announcement')
		} elseif ( is_page( 'mem-rebuild-announcement' ) ) {
			$image = $uploads . '/2026/08/mem-rebuild-2026-08-hero.jpg';

		// Margaret Edgson Manor page (ID 1433, slug 'margaret-edgson-manor')
		} elseif ( $page_id === 1433 || is_page( 'margaret-edgson-manor' ) ) {
			$image = $uploads . '/2026/08/mem-2026-08-site-wide-hero.jpg';

		// Apply page (ID 1300, slug 'apply')
		} elseif ( $page_id === 1300 || is_page( 'apply' ) ) {
			$image = $uploads . '/2026/08/gprs-homes-2026-08-entrances.jpg';

		// Accessible Housing page (ID 182, slug 'accessible-housing')
		} elseif ( $page_id === 182 || is_page( 'accessible-housing' ) ) {
			$image = $uploads . '/2025/12/IMG_0991-1-scaled-e1774807371865.jpg';

		// Homepage (whichever page is set as the front page)
		} elseif ( $page_id === (int) get_option( 'page_on_front' ) ) {
			$image = $uploads . '/2026/08/gprs-homes-2026-08-row.jpg';

		// Every remaining page — matches the default hero in hero.php
		} else {
			$image = $uploads . '/2025/12/IMG_0983-scaled-e1764562777634.jpg';
		}
	}

	if ( $image ) {
		$data = gprs_hero_srcset_data( $image );
		if ( $data['srcset'] ) {
			// Responsive preload — browser picks matching candidate for viewport.
			echo '<link rel="preload" as="image" imagesrcset="' . esc_attr( $data['srcset'] ) . '" imagesizes="' . esc_attr( $data['sizes'] ) . '" type="' . esc_attr( $type ) . '">' . "\n";
		} else {
			// Fallback: single-image preload when attachment metadata isn't available.
			echo '<link rel="preload" as="image" href="' . esc_url( $image ) . '" type="' . esc_attr( $type ) . '">' . "\n";
		}
	}
}
