<?php
/**
 * Privacy Policy Page Content
 *
 * Self-hooking include — outputs all content for /privacy/.
 * Loaded via require_once in functions.php.
 * Hero + H1 handled separately by inc/hero.php.
 * Newsletter signup auto-appended by gprs_append_newsletter_to_pages().
 *
 * @package Astra Child – GPRS
 * @since   2026-03-30
 */

add_action( 'astra_primary_content_top', 'gprs_render_privacy_content', 10 );

function gprs_render_privacy_content() {

	if ( ! is_page( 'privacy' ) ) {
		return;
	}

	$home = home_url( '/' );
	?>

	<div class="legal-page">

		<!-- ════════════════════════════════════════════════════════════════
		     PRIVACY POLICY
		     ════════════════════════════════════════════════════════════════ -->
		<section class="legal-body" aria-label="Privacy policy">

			<h2 class="legal-heading">Privacy Policy</h2>

			<p class="legal-updated">Last updated: March 2026</p>

			<p>Grande Prairie Residential Society (GPRS) respects your privacy and is committed to protecting your personal information. We collect, use, disclose, and safeguard personal information in accordance with Alberta&rsquo;s <a href="https://www.alberta.ca/personal-information-protection-act-overview" target="_blank" rel="noopener noreferrer">Personal Information Protection Act (PIPA)</a> and, for certain public bodies we interact with, the Freedom of Information and Protection of Privacy Act (FOIP), which govern the collection, use, and disclosure of personal information.</p>


			<h3 class="legal-subheading">1. What Personal Information We Collect</h3>

			<p>We may collect personal information that you voluntarily provide when you:</p>

			<ul>
				<li>Complete an online contact or inquiry form</li>
				<li>Submit an application for housing (online or via downloadable PDF)</li>
				<li>Subscribe to our newsletter</li>
				<li>Communicate with us by email, telephone, or in person</li>
			</ul>

			<p>Personal information may include:</p>

			<ul>
				<li>Name, address, telephone number, email address</li>
				<li>Date of birth</li>
				<li>Information provided in a housing application, including disability, health, income, and support needs</li>
				<li>Other information reasonably required to provide services or respond to inquiries</li>
			</ul>


			<h3 class="legal-subheading">2. Why We Collect Personal Information</h3>

			<p>We collect personal information only for purposes that are reasonable and necessary in relation to our mandate. These purposes include:</p>

			<ul>
				<li>Responding to inquiries and providing information</li>
				<li>Assessing eligibility for accessible housing and support needs</li>
				<li>Administering housing services and tenancy arrangements</li>
				<li>Communicating with applicants and tenants</li>
				<li>Sending newsletter updates (with your consent)</li>
				<li>Meeting legal and reporting obligations</li>
			</ul>

			<p>We do not use personal information for unrelated purposes without consent.</p>


			<h3 class="legal-subheading">3. How We Use and Share Personal Information</h3>

			<p>Personal information collected by GPRS may be:</p>

			<ul>
				<li>Used by authorised GPRS board members and volunteers to carry out organisational duties</li>
				<li>Shared, when necessary, with partner organisations involved in the housing process, such as <a href="https://www.grandespirit.org/" target="_blank" rel="noopener noreferrer">Grande Spirit Foundation</a>, only for purposes related to housing eligibility or support needs, or as required by law</li>
			</ul>

			<p>We do not sell or trade personal information.</p>


			<h3 class="legal-subheading">4. How Personal Information Is Protected</h3>

			<p>GPRS takes reasonable administrative, physical, and technical measures to safeguard personal information against loss, unauthorised access, use, disclosure, copying, or disposal. Personal information may be stored in secure digital systems or physical files, and access is restricted to those who need it to perform their duties.</p>


			<h3 class="legal-subheading">5. Retention of Personal Information</h3>

			<p>We retain personal information only as long as necessary to fulfil the purposes for which it was collected, consistent with legal, regulatory, and operational requirements. When information is no longer needed, it is disposed of securely.</p>


			<h3 class="legal-subheading">6. Rights of Access and Correction</h3>

			<p>You have the right to:</p>

			<ul>
				<li>Request access to your personal information held by GPRS</li>
				<li>Request correction of personal information that is inaccurate or incomplete</li>
			</ul>

			<p>Requests for access or correction can be made using the contact details below.</p>


			<h3 class="legal-subheading">7. Newsletter and Email Communications</h3>

			<p>If you subscribe to our newsletter, your email address is stored with our email service provider (<a href="https://www.brevo.com/" target="_blank" rel="noopener noreferrer">Brevo</a>). You can unsubscribe at any time using the link in any newsletter email. We do not share your email address with third parties for marketing purposes.</p>


			<h3 class="legal-subheading">8. Website Privacy</h3>

			<p>This website does not use cookies for tracking or advertising purposes. We do not use analytics tools that collect personal browsing information. The website uses <code>localStorage</code> only to remember your accessibility toolbar preferences (such as dark mode and text size) on your own device&nbsp;&mdash; this data never leaves your browser.</p>


			<h3 class="legal-subheading">9. Questions or Concerns</h3>

			<p>If you have questions about this Privacy Policy or how your personal information is handled, please contact:</p>

			<div class="legal-contact-block">
				<p>
					<strong>Privacy Officer</strong><br>
					Grande Prairie Residential Society<br>
					Phone: <a href="tel:7805323276">(780) 532-3276</a><br>
					Email: <a href="mailto:gpresidentialsociety@gmail.com">gpresidentialsociety@gmail.com</a>
				</p>
			</div>


			<h3 class="legal-subheading">10. Updates to This Policy</h3>

			<p>We may update this Privacy Policy from time to time to reflect changes in our practices, legal requirements, or technology. The most current version will always be posted on this website.</p>

		</section>

	</div><!-- .legal-page -->

	<?php
}
