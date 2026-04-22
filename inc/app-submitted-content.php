<?php
/**
 * Application Submitted — Confirmation Page Content
 *
 * Self-hooking include — outputs the thank-you content for the
 * application confirmation page.
 * Loaded via require_once in functions.php.
 * Hero is excluded for this page (handled in hero.php).
 * Newsletter signup auto-appended by gprs_append_newsletter_to_pages().
 *
 * NOTE: Verify slug matches your WP page. Expected slug is
 * 'gprs-application-submitted' (page ID 2538). If your slug
 * is different, update the is_page() check below.
 *
 * @package Astra Child – GPRS
 * @since   2026-03-30
 */

add_action( 'astra_primary_content_top', 'gprs_render_app_submitted_content', 10 );

function gprs_render_app_submitted_content() {

	if ( ! is_page( 'application-submitted' ) ) {
		return;
	}

	$home = home_url( '/' );
	?>

	<div class="app-submitted-page">

		<section class="app-submitted" aria-label="Application confirmation">

			<!-- Confirmation icon -->
			<div class="app-submitted__icon" aria-hidden="true">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" width="64" height="64">
					<circle cx="12" cy="12" r="10"/>
					<polyline points="9 12 11.5 14.5 16 9.5"/>
				</svg>
			</div>

			<h2 class="app-submitted__heading">Application Received</h2>

			<p class="app-submitted__message">Thank you for submitting your housing application to the Grande Prairie Residential Society. We have received your information and will begin reviewing it shortly.</p>


			<div class="app-submitted__next">
				<h3 class="app-submitted__subheading">What Happens Next</h3>

				<div class="app-submitted__steps">

					<div class="app-submitted__step">
						<span class="app-submitted__step-num" aria-hidden="true">1</span>
						<div class="app-submitted__step-text">
							<strong>Review</strong>
							<p>The GPRS Screening Committee will review your application for eligibility and accessibility needs.</p>
						</div>
					</div>

					<div class="app-submitted__step">
						<span class="app-submitted__step-num" aria-hidden="true">2</span>
						<div class="app-submitted__step-text">
							<strong>Contact</strong>
							<p>A volunteer board member or our property management partner, Grande Spirit Foundation, will follow up with you by phone or email.</p>
						</div>
					</div>

					<div class="app-submitted__step">
						<span class="app-submitted__step-num" aria-hidden="true">3</span>
						<div class="app-submitted__step-text">
							<strong>Next Steps</strong>
							<p>If a unit is available and you meet eligibility criteria, we will discuss placement options and move-in details.</p>
						</div>
					</div>

				</div>
			</div>


			<div class="app-submitted__contact">
				<p>If you have questions about your application, contact us at <a href="tel:7805323276">(780)&nbsp;532-3276</a> or <a href="mailto:gpresidentialsociety@gmail.com">gpresidentialsociety@gmail.com</a>.</p>
			</div>

			<div class="app-submitted__actions">
				<a href="<?php echo esc_url( $home ); ?>" class="btn btn-primary">Return to Homepage</a>
				<a href="<?php echo esc_url( $home . 'accessible-housing/' ); ?>" class="btn btn-outline">Learn About Our Housing</a>
			</div>

		</section>

	</div><!-- .app-submitted-page -->

	<?php
}
