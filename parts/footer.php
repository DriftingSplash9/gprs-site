<?php
/**
 * Custom GPRS Footer HTML
 * Originally: WPCode HTML snippet
 *
 * Updated: 2026-03-28
 *   1. All hardcoded relative links → home_url() for staging portability
 *   2. Added @id to Organization schema (referenced by ResidentialComplex isPartOf)
 *   3. Footer logo now uses wp_get_upload_dir() for consistency
 *   4. Removed Eligibility column (belongs on Apply/Housing pages)
 *   5. Added newsletter signup link to Contact column
 *   6. Footer grid reduced from 4 columns to 3
 */
?>
<!-- ============================================================
     GPRS FOOTER CUSTOM HTML
     ============================================================ -->

<footer class="gprs-footer" role="contentinfo">
	<!-- ============================================
	     MISSION STRIP (top)
	============================================ -->
	<div class="footer-mission">
		<p>Our Mission: To provide affordable and accessible housing for the physically disabled</p>
	</div>
	
	<!-- ============================================
	     MAIN GRID
	============================================ -->
	<div class="footer-inner">
		<!-- COLUMN 1: ABOUT -->
		<div class="footer-col footer-branding">
			<div class="footer-logo">
				<?php $footer_uploads = wp_get_upload_dir()['baseurl']; ?>
				<img
					src="<?php echo esc_url( $footer_uploads . '/2025/11/gprs-logo.svg' ); ?>"
					alt="Grande Prairie Residential Society logo">
				<h3 class="footer-org-name">
					Grande Prairie Residential Society
				</h3>
			</div>
			<p class="footer-text">
				We operate barrier-free, accessibly-designed housing across multiple phases,
				in partnership with community members and advocates.
			</p>
			<a class="footer-link-plain" href="<?php echo esc_url( home_url( '/accessible-housing/' ) ); ?>">
				Learn more about our history →
			</a>
		</div>
		
		<!-- COLUMN 2: OUR HOUSING -->
		<nav class="footer-col" aria-labelledby="footer-housing-heading">
			<h3 id="footer-housing-heading" class="footer-heading">
				Our Housing
			</h3>
			<ul class="footer-links">
				<li><a href="<?php echo esc_url( home_url( '/accessible-housing/#phase-1' ) ); ?>">Phase I – Duplexes</a></li>
				<li><a href="<?php echo esc_url( home_url( '/accessible-housing/#phase-2' ) ); ?>">Phase II – 7-Plex</a></li>
				<li><a href="<?php echo esc_url( home_url( '/accessible-housing/#phase-3' ) ); ?>">Phase III – Margaret Edgson Manor</a></li>
			</ul>
		</nav>
		
		<!-- COLUMN 3: CONTACT -->
		<div class="footer-col" aria-labelledby="footer-contact-heading">
			<h3 id="footer-contact-heading" class="footer-heading">
				Contact
			</h3>
			<p class="footer-text">
				Phone: <a href="tel:7805323276">(780) 532-3276</a><br>
				Email: <a href="mailto:gpresidentialsociety@gmail.com">gpresidentialsociety@gmail.com</a>
			</p>
			<div class="footer-buttons">
				<a href="<?php echo esc_url( home_url( '/apply/' ) ); ?>" class="footer-btn">Apply for Housing</a>
				<a href="<?php echo esc_url( home_url( '/donate/' ) ); ?>" class="footer-btn">Donate</a>
				<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="footer-btn">Contact Us</a>
			</div>
			<a class="footer-link-plain" href="<?php echo esc_url( home_url( '/newsletter/' ) ); ?>">
				Subscribe to our Newsletter →
			</a>
		</div>
	</div>
	
	<!-- ============================================
	     LEGAL & COPYRIGHT
	============================================ -->
	<div class="footer-bottom">
		<nav class="footer-legal" aria-label="Legal">
			<a href="<?php echo esc_url( home_url( '/privacy/' ) ); ?>">Privacy Policy</a>
			<span class="footer-legal-sep" aria-hidden="true">|</span>
			<a href="<?php echo esc_url( home_url( '/accessibility/' ) ); ?>">Accessibility Statement</a>
		</nav>
		<p class="footer-copy">© 1986–2026 Grande Prairie Residential Society. All rights reserved.</p>
		<p class="footer-charity">Registered Charity BN 891431264RR0001</p>
	</div>

	<!-- ============================================
	     SCHEMA.ORG — ORGANIZATION JSON-LD
	     ============================================
	     Tells Google who GPRS is: non-profit, location,
	     contact info, logo, social links, and what you do.

	     To update: edit the values below directly.
	     Test at: https://search.google.com/test/rich-results
	     Docs:    https://schema.org/NonprofitType

	     NOTE: @id MUST match the value in the ResidentialComplex
	     schemas in functions.php (isPartOf → @id reference).
	============================================ -->
	<script type="application/ld+json">
	{
		"@context": "https://schema.org",
		"@type": "Organization",
		"@id": "https://gpresidentialsociety.com/#organization",
		"name": "Grande Prairie Residential Society",
		"alternateName": "GPRS",
		"url": "https://gpresidentialsociety.com",
		"taxID": "891431264RR0001", 
		"logo": "https://gpresidentialsociety.com/wp-content/uploads/2025/11/gprs-logo.svg",
		"description": "A volunteer-led non-profit providing affordable and barrier-free housing for people with physical disabilities in Grande Prairie, Alberta since 1986.",
		"foundingDate": "1986",
		
		"telephone": "+1-780-532-3276",
		"email": "gpresidentialsociety@gmail.com",
		"address": {
			"@type": "PostalAddress",
			"addressLocality": "Grande Prairie",
			"addressRegion": "AB",
			"addressCountry": "CA"
		},
		"areaServed": {
			"@type": "City",
			"name": "Grande Prairie",
			"containedInPlace": {
				"@type": "AdministrativeArea",
				"name": "Alberta"
			}
		},
		"knowsAbout": [
			"Accessible housing",
			"Barrier-free housing",
			"Affordable housing",
			"Housing for people with physical disabilities",
			"Wheelchair accessible apartments"
		],
	"sameAs": [
    "https://www.facebook.com/Gpresidential/",
    "https://www.canadahelps.org/en/charities/340715-alberta-society/"
]
	}
	</script>

</footer>
