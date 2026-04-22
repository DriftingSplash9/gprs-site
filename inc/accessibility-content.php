<?php
/**
 * Accessibility Statement Page Content
 *
 * Self-hooking include — outputs all content for /accessibility/.
 * Loaded via require_once in functions.php.
 * Hero + H1 handled separately by inc/hero.php.
 * Newsletter signup auto-appended by gprs_append_newsletter_to_pages().
 *
 * @package Astra Child – GPRS
 * @since   2026-03-30
 */

add_action( 'astra_primary_content_top', 'gprs_render_accessibility_content', 10 );

function gprs_render_accessibility_content() {

	if ( ! is_page( 'accessibility' ) ) {
		return;
	}

	$home = home_url( '/' );
	?>

	<div class="legal-page">

		<!-- ════════════════════════════════════════════════════════════════
		     ACCESSIBILITY STATEMENT
		     ════════════════════════════════════════════════════════════════ -->
		<section class="legal-body" aria-label="Accessibility statement">

			<h2 class="legal-heading">Accessibility Statement</h2>

			<p class="legal-updated">Last updated: March 2026</p>

			<p>The Grande Prairie Residential Society (GPRS) is committed to ensuring digital accessibility for people with disabilities. We are continually improving the user experience for everyone and applying the relevant accessibility standards.</p>

			<h3 class="legal-subheading">Conformance Status</h3>

			<p>The <a href="https://www.w3.org/WAI/standards-guidelines/wcag/" target="_blank" rel="noopener noreferrer">Web Content Accessibility Guidelines (WCAG)</a> define requirements for designers and developers to improve accessibility for people with disabilities. WCAG defines three levels of conformance: Level&nbsp;A, Level&nbsp;AA, and Level&nbsp;AAA.</p>

			<p>We are making constant efforts to improve the accessibility of <a href="<?php echo esc_url( $home ); ?>">gpresidentialsociety.com</a> and its services. We believe it is our collective obligation to allow seamless, accessible, and unhindered use for people with disabilities.</p>

			<p>We aim to meet WCAG&nbsp;2.1 Level&nbsp;AA across all pages and content, though some areas may not yet fully conform. This may be due to challenges in identifying the most suitable technological solution. We revise this statement periodically to reflect improvements.</p>


			<h3 class="legal-subheading">What We Do</h3>

			<div class="legal-list-block">
				<p>Our accessibility efforts include:</p>
				<ul>
					<li>Semantic HTML markup with proper heading hierarchy</li>
					<li>Keyboard-navigable menus, forms, and interactive elements</li>
					<li>Sufficient colour contrast ratios (minimum 4.5:1 for text)</li>
					<li>Descriptive alt text on all meaningful images</li>
					<li>Skip-to-content links for screen reader users</li>
					<li>Visible focus indicators on all interactive elements</li>
					<li>Respect for <code>prefers-reduced-motion</code> and <code>prefers-color-scheme</code> user preferences</li>
					<li>An accessibility toolbar with adjustable text size, line height, letter spacing, grayscale mode, and dark mode</li>
					<li>Forms with associated labels, required-field indicators, and clear error messaging</li>
				</ul>
			</div>


			<h3 class="legal-subheading">Known Limitations</h3>

			<p>Despite our best efforts, some content on the site may not yet be fully accessible. Known areas under active improvement include older PDF documents that may not be fully tagged for assistive technology, and third-party embedded content (such as newsletter signup forms) that we do not fully control.</p>


			<h3 class="legal-subheading">Feedback</h3>

			<p>We welcome your feedback on the accessibility of this website. If you encounter barriers or have suggestions for improvement, please contact us:</p>

			<div class="legal-contact-block">
				<p>
					<strong>Grande Prairie Residential Society</strong><br>
					Phone: <a href="tel:7805323276">(780) 532-3276</a><br>
					Email: <a href="mailto:gpresidentialsociety@gmail.com">gpresidentialsociety@gmail.com</a>
				</p>
			</div>

			<p>We try to respond to accessibility feedback within 3&ndash;7 business days.</p>


			<h3 class="legal-subheading">Compatibility</h3>

			<p>This website is designed to be compatible with current versions of major browsers including Chrome, Firefox, Safari, and Edge. It is optimised for screen readers including NVDA, JAWS, and VoiceOver.</p>

		</section>

	</div><!-- .legal-page -->

	<?php
}
