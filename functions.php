<?php
/**
 * Astra Child Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Astra Child
 * @since 1.0.0
 * Updated: 2026-03-27 — Added newsletter Brevo form shortcode, CSS module 14, newsletter-form.php include
 * Updated: 2026-05-15 — Added AGM/BBQ announcement banner (inc/agm-banner.php, CSS module 23)
 */

define( 'CHILD_THEME_ASTRA_CHILD_VERSION', '2.1.1' );


/* ============================================================
   STYLESHEETS
   ============================================================
   Load order mirrors the old WPCode priority system.
   Dependencies ensure correct cascade even if WordPress
   reorders the queue.

   GLOBAL (every page):   01-core, 02-header, 03-components,
                          04-forms, 05-responsive, 06-footer,
                          12-a11y-toolbar
   CONDITIONAL:           07-homepage, 08-apply, 09-404,
                          10-timeline, 11-our-story, 13-fire-rebuild,
                          14-newsletter, 15-legal, 16-app-submitted
   ============================================================ */

function gprs_enqueue_styles() {
	$v   = CHILD_THEME_ASTRA_CHILD_VERSION;
	$uri = get_stylesheet_directory_uri();

	// Normalize (self-hosted) — baseline reset
	wp_enqueue_style(
		'normalize-css',
		$uri . '/css/normalize.css',
		array(),
		'8.0.1'
	);

	// Astra child style.css (theme header)
	wp_enqueue_style(
		'astra-child-theme-css',
		$uri . '/style.css',
		array( 'astra-theme-css' ),
		$v
	);

	// 01 — Core Tokens & Base Layout
	wp_enqueue_style(
		'gprs-01-core',
		$uri . '/css/01-core-tokens-base.css',
		array( 'normalize-css', 'astra-child-theme-css' ),
		$v
	);
// 00 — Shared Components (unified design language — gradient headings, glass cards, glow hovers)
	wp_enqueue_style(
		'gprs-00-shared',
		$uri . '/css/00-shared-components.css',
		array( 'gprs-01-core' ),
		$v
	);
	// 02 — Header, Navigation & Hero
	wp_enqueue_style(
		'gprs-02-header',
		$uri . '/css/02-header-nav-hero.css',
		array( 'gprs-01-core' ),
		$v
	);

	// 03 — Buttons, Containers & Quicklinks
	wp_enqueue_style(
		'gprs-03-components',
		$uri . '/css/03-buttons-containers-quicklinks.css',
		array( 'gprs-01-core' ),
		$v
	);

	// 04 — WPForms Styling
	wp_enqueue_style(
		'gprs-04-forms',
		$uri . '/css/04-forms.css',
		array( 'gprs-01-core' ),
		$v
	);

	// 05 — Responsive / Mobile & Tablet
	wp_enqueue_style(
		'gprs-05-responsive',
		$uri . '/css/05-responsive.css',
		array( 'gprs-02-header', 'gprs-03-components' ),
		$v
	);

	// 06 — Footer
	wp_enqueue_style(
		'gprs-06-footer',
		$uri . '/css/06-footer.css',
		array( 'gprs-01-core' ),
		$v
	);

	/* ============================================================
	   CONDITIONAL CSS — only loads on pages that need it
	   ============================================================ */

	// 07 — Homepage Cards & Banner (front page only)
	if ( is_front_page() ) {
		wp_enqueue_style(
			'gprs-07-homepage',
			$uri . '/css/07-homepage.css',
			array( 'gprs-01-core' ),
			$v
		);
	}

	// 08 — Apply Page (apply page only)
	if ( is_page( 'apply' ) ) {
		wp_enqueue_style(
			'gprs-08-apply',
			$uri . '/css/08-apply.css',
			array( 'gprs-01-core' ),
			$v
		);
	}

	// 09 — 404 Page (404 only)
	if ( is_404() ) {
		wp_enqueue_style(
			'gprs-09-404',
			$uri . '/css/09-404.css',
			array( 'gprs-01-core' ),
			$v
		);
	}

	// 10 — Timeline (timeline page only)
	if ( is_page( 'timeline' ) ) {
		wp_enqueue_style(
			'gprs-10-timeline',
			$uri . '/css/10-timeline.css',
			array( 'gprs-01-core' ),
			$v
		);
	}

	// 11 — Our Story (our-story page only)
	if ( is_page( 'our-story' ) ) {
		wp_enqueue_style(
			'gprs-11-our-story',
			$uri . '/css/11-our-story.css',
			array( 'gprs-01-core' ),
			$v
		);
	}
	
	// 13 — Fire Rebuild (margaret-edgson-manor-rebuild-efforts page only)
	if ( is_page( 'margaret-edgson-manor-rebuild-efforts' ) ) {
		wp_enqueue_style(
			'gprs-13-fire-rebuild',
			$uri . '/css/13-fire-rebuild.css',
			array( 'gprs-01-core' ),
			$v
		);
	}

// 14 — Newsletter Brevo Form
    // Loads on pages with [gprs_newsletter] shortcode in content,
    // OR on pages where the newsletter is auto-appended by
    // gprs_append_newsletter_to_pages().
    $newsletter_pages = array(
        'donate',
        'accessible-housing',
        'margaret-edgson-manor-rebuild-efforts',
        'volunteer',
        'contact',
        'apply', 
        'margaret-edgson-manor',
        'our-story',
        'timeline',
        'mem-rebuild-announcement',
    );
    $needs_newsletter_css = gprs_page_has_newsletter();
    foreach ( $newsletter_pages as $slug ) {
        if ( is_page( $slug ) ) {
            $needs_newsletter_css = true;
            break;
        }
    }
    /* Also load on front page (homepage uses newsletter append) */
    if ( is_front_page() ) {
        $needs_newsletter_css = true;
    }
    if ( $needs_newsletter_css ) {
        wp_enqueue_style(
            'gprs-14-newsletter',
            $uri . '/css/14-newsletter.css',
            array( 'gprs-01-core' ),
            $v
        );
    }
 /* ════════════════════════════════════════════════════════════
   ADDITION 2 — CONDITIONAL CSS (inside gprs_enqueue_styles)
   ════════════════════════════════════════════════════════════
 
   Add this block alongside your other conditional CSS blocks
   (after 14-newsletter, before the closing brace of the
   function):
*/
 
// 20 — Legal pages (privacy + accessibility)
if ( is_page( 'privacy' ) || is_page( 'accessibility' ) ) {
	wp_enqueue_style(
		'gprs-20-legal',
		$uri . '/css/20-legal.css',
		array( 'gprs-01-core' ),
		$v
	);
}

 
    // 15 — Accessible Housing (accessible-housing page only)
    if ( is_page( 'accessible-housing' ) ) {
        wp_enqueue_style(
            'gprs-15-accessible-housing',
            $uri . '/css/15-accessible-housing.css',
            array( 'gprs-01-core' ),
            $v
        );
    }

 
    // 16 — Volunteer (volunteer page only)
    if ( is_page( 'volunteer' ) ) {
        wp_enqueue_style(
            'gprs-16-volunteer',
            $uri . '/css/16-volunteer.css',
            array( 'gprs-01-core' ),
            $v
        );
    }
    // 21 — Application Submitted (confirmation page only)
if ( is_page( 'gprs-application-submitted' ) ) {
	wp_enqueue_style(
		'gprs-21-app-submitted',
		$uri . '/css/21-app-submitted.css',
		array( 'gprs-01-core' ),
		$v
	);
}
  // 17 — Contact (contact page only)
    if ( is_page( 'contact' ) ) {
        wp_enqueue_style(
            'gprs-17-contact',
            $uri . '/css/17-contact.css',
            array( 'gprs-01-core' ),
            $v
        );
    }

    
      // 18 — Donate (donate page only)
    if ( is_page( 'donate' ) ) {
        wp_enqueue_style(
            'gprs-18-donate',
            $uri . '/css/18-donate.css',
            array( 'gprs-01-core' ),
            $v
        );
    }
    // 19 — Margaret Edgson Manor (margaret-edgson-manor page only)
    if ( is_page( 'margaret-edgson-manor' ) ) {
        wp_enqueue_style(
            'gprs-19-mem',
            $uri . '/css/19-mem.css',
            array( 'gprs-01-core' ),
            $v
        );
    }
     // 22 — FAQ (faq page only)
    if ( is_page( 'faq' ) ) {
        wp_enqueue_style(
            'gprs-22-faq',
            $uri . '/css/22-faq.css',
            array( 'gprs-00-shared', 'gprs-01-core' ),
            $v
        );
    }
    // 24 — MEM Rebuild Announcement (mem-rebuild-announcement page only)
    if ( is_page( 'mem-rebuild-announcement' ) ) {
        wp_enqueue_style(
            'gprs-24-mem-announcement',
            $uri . '/css/24-mem-announcement.css',
            array( 'gprs-00-shared', 'gprs-01-core' ),
            $v
        );
    }
	// 12 — Accessibility Toolbar (global — panel styles + toggle effects)
	wp_enqueue_style(
		'gprs-12-a11y-toolbar',
		$uri . '/css/12-accessibility-toolbar.css',
		array( 'gprs-01-core' ),
		$v
	);

	// 23 — AGM / BBQ Announcement Banner
	// Site-wide, but only enqueued while the announcement is active
	// (auto-expires after the event — see inc/agm-banner.php).
	if ( function_exists( 'gprs_agm_banner_active' ) && gprs_agm_banner_active() ) {
		wp_enqueue_style(
			'gprs-23-agm-banner',
			$uri . '/css/23-agm-banner.css',
			array( 'gprs-01-core', 'gprs-02-header' ),
			$v
		);
	}
}
add_action( 'wp_enqueue_scripts', 'gprs_enqueue_styles', 15 );


/* ============================================================
   SCRIPTS
   ============================================================
   GLOBAL:       accessibility-toolbar.js, submenus.js
   CONDITIONAL:  quicklinks-scrollspy.js, timeline-interactions.js
   ============================================================ */

function gprs_enqueue_scripts() {
	$v   = CHILD_THEME_ASTRA_CHILD_VERSION;
	$uri = get_stylesheet_directory_uri();

	// Accessibility toolbar — every page (absorbs dark mode from gprs-theme.js)
	wp_enqueue_script(
		'gprs-a11y-toolbar',
		$uri . '/js/accessibility-toolbar.js',
		array(),
		$v,
		array( 'in_footer' => true, 'strategy' => 'defer' )
	);

	// Submenus (mobile menu, dropdown handling) — every page
	wp_enqueue_script(
		'gprs-submenus',
		$uri . '/js/submenus.js',
		array(),
		$v,
		array( 'in_footer' => true, 'strategy' => 'defer' )
	);

	// Starfield + comets — every page (dark mode only, self-pausing)
	wp_enqueue_script(
		'gprs-starfield',
		$uri . '/js/gprs-starfield.js',
		array(),
		$v,
		array( 'in_footer' => true, 'strategy' => 'defer' )
	);
 
    // Accessible Housing gallery lightbox
    if ( is_page( 'accessible-housing' ) ) {
        wp_enqueue_script(
            'gprs-housing-gallery-js',
            $uri . '/js/accessible-housing-gallery.js',
            array(),
            $v,
            true
        );
    }
 
   if ( is_page( 'faq' ) ) {
        wp_enqueue_script(
            'gprs-faq-accordion',
            $uri . '/js/faq-accordion.js',
            array(),
            $v,
            true
        );
    }
    
	// Quicklinks scrollspy — fire rebuild page (matches quicklinks markup in inc/fire-rebuild-content.php)
	if ( is_page( 'margaret-edgson-manor-rebuild-efforts' ) ) {
		wp_enqueue_script(
			'gprs-quicklinks-scrollspy',
			$uri . '/js/quicklinks-scrollspy.js',
			array(),
			$v,
			array( 'in_footer' => true, 'strategy' => 'defer' )
		);
	}

	// Timeline interactions — only on the timeline page
	if ( is_page( 'timeline' ) ) {
		wp_enqueue_script(
			'gprs-timeline-js',
			$uri . '/js/timeline-interactions.js',
			array(),
			$v,
			true
		);
	}
}
add_action( 'wp_enqueue_scripts', 'gprs_enqueue_scripts', 20 );



/* ============================================================
   SKIP LINK TARGET
   ============================================================
   Outputs an invisible anchor so the skip link has
   somewhere to land, after the hero and before content.
   ============================================================ */

function gprs_skip_link_target() {
	echo '<a id="main-content" tabindex="-1"></a>';
}
add_action( 'astra_content_top', 'gprs_skip_link_target', 1 );


/* ============================================================
   STARFIELD CANVAS
   ============================================================
   Outputs a fixed, fullscreen <canvas> behind all content.
   The starfield JS (gprs-starfield.js) draws on this canvas
   only in dark mode. In light mode the canvas is transparent.
   Inline styles keep it behind everything (z-index: -1).
   ============================================================ */

function gprs_output_starfield_canvas() {
	echo '<canvas id="gprs-starfield" style="position:fixed;top:0;left:0;width:100%;height:100%;z-index:-1;pointer-events:none;" aria-hidden="true"></canvas>' . "\n";
}
add_action( 'astra_body_top', 'gprs_output_starfield_canvas', 1 );

/* ============================================================
   PHP INCLUDES — SELF-HOOKING
   ============================================================
   These files register their own hooks/filters/shortcodes
   internally. We just need to load them.
   ============================================================ */

// WPForms ARIA accessibility fix
require_once get_stylesheet_directory() . '/inc/wpforms-aria.php';

// 404 page custom content (hooks into astra_content_before
// and astra_primary_content_top on is_404() pages)
require_once get_stylesheet_directory() . '/inc/404-content.php';

// Hero image preload (outputs <link rel="preload"> in <head>
// for faster Largest Contentful Paint)
require_once get_stylesheet_directory() . '/inc/hero-preload.php';

// Homepage content — intro, partner logos, cards, rebuild banner
// (hooks into astra_primary_content_top on front page)
require_once get_stylesheet_directory() . '/inc/homepage-content.php';

// Our Story page content (hooks into astra_primary_content_top
// on page 1429)
require_once get_stylesheet_directory() . '/inc/our-story-content.php';

// Fire Rebuild page content (hooks into astra_primary_content_top
// on 'margaret-edgson-manor-rebuild-efforts' slug)
require_once get_stylesheet_directory() . '/inc/fire-rebuild-content.php';

// Newsletter signup form [gprs_newsletter] shortcode (Brevo integration)
require_once get_stylesheet_directory() . '/inc/newsletter-form.php';

// Accessible Housing page content (hooks into astra_primary_content_top
// on 'accessible-housing' slug)
require_once get_stylesheet_directory() . '/inc/accessible-housing-content.php';

// Volunteer page content (hooks into astra_primary_content_top
// on 'volunteer' slug)
require_once get_stylesheet_directory() . '/inc/volunteer-content.php';

// Contact page content (hooks into astra_primary_content_top
// on 'contact' slug)
require_once get_stylesheet_directory() . '/inc/contact-content.php';

// Apply page content (hooks into astra_primary_content_top
// on 'apply' slug)
require_once get_stylesheet_directory() . '/inc/apply-content.php';
 
// Margaret Edgson Manor page content (hooks into astra_primary_content_top
// on 'margaret-edgson-manor' slug)
require_once get_stylesheet_directory() . '/inc/mem-content.php';


require_once get_stylesheet_directory() . '/inc/donate-content.php';

// Privacy Policy page content (hooks into astra_primary_content_top
// on 'privacy' slug)
require_once get_stylesheet_directory() . '/inc/privacy-content.php';
 
// Accessibility Statement page content (hooks into
// astra_primary_content_top on 'accessibility' slug)
require_once get_stylesheet_directory() . '/inc/accessibility-content.php';

// Timeline page content — intro + full timeline markup + lightbox
// (hooks into astra_primary_content_top on 'timeline' slug)
require_once get_stylesheet_directory() . '/inc/timeline-content.php';
 
// Application Submitted confirmation page
// (hooks into astra_primary_content_top on 'gprs-application-submitted' slug)
// NOTE: Verify your page slug matches. If your slug is different,
// update the is_page() check in app-submitted-content.php.
require_once get_stylesheet_directory() . '/inc/app-submitted-content.php';

/* ============================================================
   CUSTOM HEADER HTML
   ============================================================
   Outputs the custom GPRS header immediately after <body>.
   Astra's default header is hidden via CSS in 02-header.
   ============================================================ */
   
// FAQ page content (self-hooking)
require_once get_stylesheet_directory() . '/inc/faq-content.php';

// AGM / BBQ announcement banner (self-hooking — site-wide,
// auto-expires after the event date)
require_once get_stylesheet_directory() . '/inc/agm-banner.php';

// MEM Rebuild Announcement press page (hooks into
// astra_primary_content_top on 'mem-rebuild-announcement' slug)
require_once get_stylesheet_directory() . '/inc/mem-announcement-content.php';

function gprs_output_custom_header() {
	include get_stylesheet_directory() . '/parts/header.php';
}
add_action( 'astra_body_top', 'gprs_output_custom_header', 5 );


/* ============================================================
   DYNAMIC HERO
   ============================================================
   Outputs the correct hero section per page.
   Runs after the header, before main content.
   ============================================================ */

function gprs_output_hero() {
	include get_stylesheet_directory() . '/inc/hero.php';
}
add_action( 'astra_content_before', 'gprs_output_hero', 10 );

/* ============================================================
   CUSTOM FOOTER HTML
   ============================================================
   Outputs the custom GPRS footer.
   Hooked early in footer area, before Astra's default footer
   (which is overridden by our CSS/markup).
   ============================================================ */

function gprs_output_custom_footer() {
	include get_stylesheet_directory() . '/parts/footer.php';
}
add_action( 'astra_footer_before', 'gprs_output_custom_footer', 5 );

/**
 * GPRS — Favicon, Touch Icons, and Web App Manifest
 * Replaces default WP site icon output.
 */
remove_action( 'wp_head', 'wp_site_icon', 99 );

add_action( 'wp_head', function() {
    $base = home_url( '/' );
    ?>
    <link rel="icon" type="image/svg+xml" href="<?php echo esc_url( $base . 'favicon.svg' ); ?>">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo esc_url( $base . 'favicon-96x96.png' ); ?>">
    <link rel="icon" type="image/x-icon" href="<?php echo esc_url( $base . 'favicon.ico' ); ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo esc_url( $base . 'apple-touch-icon.png' ); ?>">
    <link rel="manifest" href="<?php echo esc_url( $base . 'site.webmanifest' ); ?>">
    <?php
}, 1 );

/**
 * GPRS — ResidentialComplex schema for each housing phase
 * Only outputs on the /accessible-housing/ page.
 */
add_action( 'wp_head', function() {
    if ( ! is_page( 'accessible-housing' ) ) {
        return;
    }
    ?>
    <script type="application/ld+json">
    [
      {
        "@context": "https://schema.org",
        "@type": "ResidentialComplex",
        "name": "GPRS Phase I – Crystal Ridge Duplexes",
        "description": "Five fully accessible barrier-free duplexes (10 units total — six 2-bedroom and four 3-bedroom) providing affordable housing for people with physical disabilities. Features include widened doorways and hallways, wheelchair-accessible kitchens with barrier-free cupboards and countertops, wheel-in showers, and automatic door openers.",
        "url": "https://gpresidentialsociety.com/accessible-housing/#phase-1",
        "dateBuilt": "1987",
        "numberOfBedrooms": "2",
        "numberOfAvailableAccommodationUnits": {
          "@type": "QuantitativeValue",
          "value": 10,
          "unitText": "units (5 duplexes)"
        },
        "amenityFeature": [
          { "@type": "LocationFeatureSpecification", "name": "Wheelchair accessible", "value": true },
          { "@type": "LocationFeatureSpecification", "name": "Widened doorways and hallways", "value": true },
          { "@type": "LocationFeatureSpecification", "name": "Wheel-in showers", "value": true },
          { "@type": "LocationFeatureSpecification", "name": "Automatic door openers", "value": true },
          { "@type": "LocationFeatureSpecification", "name": "Barrier-free kitchens", "value": true }
        ],
        "address": {
          "@type": "PostalAddress",
          "streetAddress": "9539 123 Avenue",
          "addressLocality": "Grande Prairie",
          "addressRegion": "AB",
          "addressCountry": "CA"
        },
        "isPartOf": {
          "@type": "Organization",
          "@id": "https://gpresidentialsociety.com/#organization"
        }
      },
      {
        "@context": "https://schema.org",
        "@type": "ResidentialComplex",
        "name": "GPRS Phase II – 7-Plex",
        "description": "A seven-unit accessible apartment complex built to meet growing demand for affordable barrier-free housing. Ground-level entrances are fully accessible with automatic doors, widened hallways, wheel-in showers, wheelchair-accessible kitchens, and a shared accessible laundry room.",
        "url": "https://gpresidentialsociety.com/accessible-housing/#phase-2",
        "dateBuilt": "1994",
        "numberOfBedrooms": "2",
        "numberOfAvailableAccommodationUnits": {
          "@type": "QuantitativeValue",
          "value": 7,
          "unitText": "units"
        },
        "amenityFeature": [
          { "@type": "LocationFeatureSpecification", "name": "Wheelchair accessible", "value": true },
          { "@type": "LocationFeatureSpecification", "name": "Automatic door openers", "value": true },
          { "@type": "LocationFeatureSpecification", "name": "Wheel-in showers", "value": true },
          { "@type": "LocationFeatureSpecification", "name": "Barrier-free kitchens", "value": true },
          { "@type": "LocationFeatureSpecification", "name": "Accessible shared laundry", "value": true },
          { "@type": "LocationFeatureSpecification", "name": "Built-in vacuum system", "value": true }
        ],
        "address": {
          "@type": "PostalAddress",
          "streetAddress": "9609 123 Avenue",
          "addressLocality": "Grande Prairie",
          "addressRegion": "AB",
          "postalCode": "T8V 6Z9",
          "addressCountry": "CA"
        },
        "isPartOf": {
          "@type": "Organization",
          "@id": "https://gpresidentialsociety.com/#organization"
        }
      },
      {
        "@context": "https://schema.org",
        "@type": "ResidentialComplex",
        "name": "Margaret Edgson Manor",
        "alternateName": "GPRS Phase III",
        "description": "A 70-unit four-storey affordable housing complex with 16 fully wheelchair-accessible units and 54 standard suites. All units have two bedrooms. Named for Margaret Edgson, a strong advocate for accessible transportation and housing. Self-sustaining with no government operating support. Damaged by fire in June 2025 and currently being rebuilt to updated building codes.",
        "url": "https://gpresidentialsociety.com/accessible-housing/#phase-3",
        "dateBuilt": "2005",
        "numberOfBedrooms": "2",
        "numberOfAvailableAccommodationUnits": {
          "@type": "QuantitativeValue",
          "value": 70,
          "unitText": "units"
        },
        "amenityFeature": [
          { "@type": "LocationFeatureSpecification", "name": "Wheelchair accessible units", "value": true },
          { "@type": "LocationFeatureSpecification", "name": "Zero-threshold entries", "value": true },
          { "@type": "LocationFeatureSpecification", "name": "Roll-in showers with grab bars", "value": true },
          { "@type": "LocationFeatureSpecification", "name": "Wide doorways", "value": true },
          { "@type": "LocationFeatureSpecification", "name": "Automatic door openers", "value": true },
          { "@type": "LocationFeatureSpecification", "name": "Elevator", "value": true },
          { "@type": "LocationFeatureSpecification", "name": "Community room", "value": true }
        ],
        "address": {
          "@type": "PostalAddress",
          "streetAddress": "10120 Hillside Drive",
          "addressLocality": "Grande Prairie",
          "addressRegion": "AB",
          "addressCountry": "CA"
        },
        "isPartOf": {
          "@type": "Organization",
          "@id": "https://gpresidentialsociety.com/#organization"
        }
      }
    ]
    </script>
    <?php
}, 20 );

/**
 * GPRS — FAQPage schema
 * Only outputs on the /faq/ page.
 */
add_action( 'wp_head', function() {
    if ( ! is_page( 'faq' ) ) {
        return;
    }
    ?>
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "FAQPage",
      "mainEntity": [
        {
          "@type": "Question",
          "name": "What is the Grande Prairie Residential Society?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "GPRS is a volunteer-led non-profit founded in 1986 that provides safe, affordable, and fully barrier-free housing for people with physical disabilities in Grande Prairie, Alberta. We currently operate 87 accessible units across three housing phases."
          }
        },
        {
          "@type": "Question",
          "name": "Is GPRS a registered charity?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Yes. GPRS is a CRA-registered non-profit charitable organization (BN 891431264RR0001). Tax receipts for donations are issued through the Grande Spirit Foundation (Registered Charity #102169158RR0001)."
          }
        },
        {
          "@type": "Question",
          "name": "Is GPRS housing wheelchair accessible?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Yes. All GPRS housing is designed to be fully barrier-free, with features including zero-threshold entries, wide doorways, roll-in showers with grab bars, wheelchair-accessible kitchens with adjustable counter heights, and automatic door openers."
          }
        },
        {
          "@type": "Question",
          "name": "Who qualifies for GPRS housing?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "GPRS housing is designed for individuals with physical disabilities affecting mobility who need barrier-free homes and meet GPRS income criteria. Priority is given to wheelchair users."
          }
        },
        {
          "@type": "Question",
          "name": "How do I apply for GPRS housing?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "You can start your application directly on the GPRS website at gpresidentialsociety.com/apply/. The process involves filling out a form, providing documentation (proof of disability, income verification, and identification), and a review by the GPRS team."
          }
        },
        {
          "@type": "Question",
          "name": "What happened to Margaret Edgson Manor?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "On June 9, 2025, a fire severely damaged Margaret Edgson Manor, displacing up to 40 residents. No lives were lost. The building is now being rebuilt to updated building codes with improved safety features and fully restored accessible units."
          }
        },
        {
          "@type": "Question",
          "name": "How can I donate to GPRS?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "You can donate online through ATB Benevity, send an Interac e-transfer to the Grande Spirit Foundation (note 'GPRS Donation'), or mail a cheque payable to Grande Spirit Foundation with 'GPRS Donation' in the memo. Visit gpresidentialsociety.com/donate/ for full details."
          }
        },
        {
          "@type": "Question",
          "name": "Who was Margaret Edgson?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Margaret Edgson was a strong advocate for accessible transportation and housing for people with disabilities in the Grande Prairie region. GPRS's largest housing project was named in her honour when it opened in 2005."
          }
        },
        {
          "@type": "Question",
          "name": "What is the Grande Spirit Foundation's role?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "The Grande Spirit Foundation manages GPRS housing properties and processes donations on behalf of GPRS. GSF is a registered Canadian charity (Registration #102169158RR0001) that has been providing housing support in Northern Alberta since 1960. Tax receipts for GPRS donations are issued through GSF."
          }
        },
        {
          "@type": "Question",
          "name": "How do I report a maintenance issue as a GPRS tenant?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "For non-urgent maintenance, contact GPRS through the website or email. For serious safety or property emergencies, call the 24-hour emergency maintenance line at (780) 876-0088."
          }
        }
      ]
    }
    </script>
    <?php
}, 20 );


/**
 * Auto-append newsletter signup to key pages.
 *
 * Hooks into the_content to add the [gprs_newsletter] shortcode
 * with a contextual section heading. On the fire rebuild page,
 * this also fills Astra's otherwise-empty content area, which
 * eliminates the blank gap between the PHP-rendered content
 * and the footer.
 *
 * Pages: /donate/, /accessible-housing/, /volunteer/,
 *        /margaret-edgson-manor-rebuild-efforts/, /contact/
 *
 * @since 2.1.0
 * Updated: 2026-03-29 — Fixed: was trapped inside FAQ schema
 *   callback. Now a standalone function. Added volunteer and
 *   contact page conditions.
 */
function gprs_append_newsletter_to_pages( $content ) {
    if ( is_admin() ) {
        return $content;
    }

    $show    = false;
    $heading = 'Stay Connected';
    $subtext = 'Rebuild progress, community updates, and ways to help — delivered to your inbox.';

    if ( is_page( 'donate' ) ) {
        $show = true;
    }

    if ( is_page( 'accessible-housing' ) ) {
        $show    = true;
        $heading = 'Stay in the Loop';
        $subtext = 'Housing updates, community news, and ways to get involved — delivered to your inbox.';
    }

    if ( is_page( 'margaret-edgson-manor-rebuild-efforts' ) ) {
        $show    = true;
        $heading = 'Stay Updated on the Rebuild';
        $subtext = 'Construction milestones, community news, and ways to support — straight to your inbox.';
    }

    if ( is_page( 'volunteer' ) ) {
        $show    = true;
        $heading = 'Stay Connected';
        $subtext = 'Volunteer news, upcoming events, and ways to make a difference — delivered to your inbox.';
    }
    if ( is_page( 'apply' ) ) {
        $show    = true;
        $heading = 'Stay Informed';
        $subtext = 'Housing availability, application updates, and community news — delivered to your inbox.';
    }
    if ( is_page( 'contact' ) ) {
        $show    = true;
        $heading = 'Stay in Touch';
        $subtext = 'Community news, housing updates, and ways to get involved — delivered to your inbox.';
    }
    if ( is_page( 'margaret-edgson-manor' ) ) {
        $show    = true;
        $heading = 'Stay Updated';
        $subtext = 'Rebuild progress, housing news, and community updates — delivered to your inbox.';
    }
    if ( is_front_page() ) {
        $show    = true;
        $heading = 'Stay Connected';
        $subtext = 'Rebuild progress, community updates, and ways to help — delivered to your inbox.';
    }
    if ( is_page( 'our-story' ) ) {
        $show    = true;
        $heading = 'Stay Connected';
        $subtext = 'Community stories, housing updates, and ways to get involved — delivered to your inbox.';
    }
    if ( is_page( 'timeline' ) ) {
        $show    = true;
        $heading = 'Stay Connected';
        $subtext = 'Community milestones, housing updates, and ways to get involved — delivered to your inbox.';
    }
    if ( is_page( 'mem-rebuild-announcement' ) ) {
        $show    = true;
        $heading = 'Stay Updated on the Rebuild';
        $subtext = 'Construction milestones, community news, and ways to support — straight to your inbox.';
    }
    if ( ! $show ) {
        return $content;
    }

    $newsletter  = '<div class="donate-newsletter-wrap">';
    $newsletter .= '  <div class="donate-section-head">';
    $newsletter .= '    <h2>' . esc_html( $heading ) . '</h2>';
    $newsletter .= '    <p>' . esc_html( $subtext ) . '</p>';
    $newsletter .= '  </div>';
    $newsletter .= do_shortcode( '[gprs_newsletter show_image="0"]' );
    $newsletter .= '</div>';

    $content .= $newsletter;

    return $content;
}
add_filter( 'the_content', 'gprs_append_newsletter_to_pages', 20 );
