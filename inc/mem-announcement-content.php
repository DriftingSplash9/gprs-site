<?php
/**
 * MEM Rebuild Announcement — Page Content
 * Self-hooking: require_once in functions.php
 *
 * Permanent press-release page for the official commencement of
 * the Margaret Edgson Manor rebuild. Written to be cited by local
 * media: dateline, quotable copy, quick facts, and a For Media
 * section with downloadable assets.
 *
 * The dateline uses the page's PUBLISH date, so it is correct
 * automatically on launch day — keep the page as a DRAFT until
 * crews/materials arrive on site, then hit Publish.
 *
 * CLASS PREFIX:  gprs-annc-  (page-scoped)
 * Depends:      01-Tokens, 00-shared-components.css, 24-mem-announcement.css
 * Slug:         mem-rebuild-announcement
 * Created:      2026-07-04
 */

add_action( 'astra_primary_content_top', 'gprs_render_mem_announcement_content', 10 );

function gprs_render_mem_announcement_content() {

	if ( ! is_page( 'mem-rebuild-announcement' ) ) {
		return;
	}

	$uploads = wp_get_upload_dir()['baseurl'];

	/* Publish date = release date. Falls back to today for previews
	   of the unpublished draft. */
	$release_date = get_the_date( 'F j, Y' );
	if ( ! $release_date ) {
		$release_date = date_i18n( 'F j, Y' );
	}
?>

<article class="gprs-annc gprs-tinted-text" aria-label="Official announcement: Margaret Edgson Manor rebuild underway">


	<!-- ═══════════════════════════════════════════════════
	     DATELINE
	     ═══════════════════════════════════════════════════ -->
	<div class="gprs-annc__dateline">
		<span class="gprs-annc__release-tag">Official Announcement &mdash; For Immediate Release</span>
		<span class="gprs-annc__release-date">Grande Prairie, Alberta &mdash; <?php echo esc_html( $release_date ); ?></span>
	</div>


	<!-- ═══════════════════════════════════════════════════
	     SECTION 1 — THE ANNOUNCEMENT
	     ═══════════════════════════════════════════════════ -->
	<section class="gprs-annc__section" id="announcement">
		<h2 class="gprs-annc__heading gprs-gradient-heading">Rebuilding Officially Begins at Margaret Edgson Manor</h2>

		<div class="gprs-annc__body">
			<p><strong>The Grande Prairie Residential Society (GPRS) is proud to announce
			that the rebuilding of Margaret Edgson Manor is officially underway.</strong>
			Just over a year after the devastating fire of June 9, 2025 &mdash; which
			displaced our residents but, thankfully, took no lives &mdash; construction
			crews are on site and reconstruction is moving forward.</p>

			<p>Progress is already visible and will accelerate in the weeks ahead:
			<strong>new siding is scheduled for delivery soon, along with new windows and
			doors.</strong> Each delivery brings us one step closer to welcoming residents
			back home. GPRS is proud to continue this work with our construction partner,
			<strong>Terrace Construction Development Inc.</strong></p>
		</div>

		<blockquote class="gprs-annc__quote gprs-blockquote">
			<p>&ldquo;This is the milestone our residents and our community have been
			waiting for. Margaret Edgson Manor has always been more than a building
			&mdash; it is a home, and a promise that accessible, affordable housing
			belongs in Grande Prairie. Seeing materials arrive and walls take shape again
			means that promise is being kept.&rdquo;</p>
			<cite>&mdash; GPRS Board of Directors</cite>
		</blockquote>

		<div class="gprs-annc__body">
			<p>The rebuilt <a href="<?php echo esc_url( home_url( '/margaret-edgson-manor/' ) ); ?>">Margaret
			Edgson Manor</a> will once again offer barrier-free and standard apartments,
			restoring a vital supply of accessible and affordable housing for people with
			physical disabilities, seniors, and families in our community. The
			reconstruction meets modern building codes and improves accessibility, safety,
			and energy efficiency throughout the building.</p>

			<p>GPRS extends its continued gratitude to the first responders who kept
			everyone safe on the night of the fire, to the Grande Spirit Foundation and
			our property managers, and to the many community partners, organizations, and
			individuals whose generosity has supported our displaced residents over the
			past year. To our former tenants: thank you for your patience and resilience
			&mdash; this rebuild is for you.</p>
		</div>
	</section>


	<hr class="gprs-annc__divider" aria-hidden="true">


	<!-- ═══════════════════════════════════════════════════
	     SECTION 2 — QUICK FACTS
	     ═══════════════════════════════════════════════════ -->
	<section class="gprs-annc__section" id="quick-facts">
		<h2 class="gprs-annc__heading gprs-gradient-heading">Quick Facts</h2>

		<div class="gprs-annc__facts">

			<div class="gprs-annc__fact gprs-glass-card">
				<span class="gprs-annc__fact-label">What</span>
				<span class="gprs-annc__fact-text">Official commencement of the rebuilding of Margaret Edgson Manor</span>
			</div>

			<div class="gprs-annc__fact gprs-glass-card">
				<span class="gprs-annc__fact-label">Where</span>
				<span class="gprs-annc__fact-text">11010 107A Avenue, Grande Prairie, Alberta</span>
			</div>

			<div class="gprs-annc__fact gprs-glass-card">
				<span class="gprs-annc__fact-label">The Fire</span>
				<span class="gprs-annc__fact-text">June 9, 2025 &mdash; over 70 residents displaced, no lives lost</span>
			</div>

			<div class="gprs-annc__fact gprs-glass-card">
				<span class="gprs-annc__fact-label">Completed</span>
				<span class="gprs-annc__fact-text">Selective demolition, mold mitigation, permanent roof to updated codes, fourth-floor reframing</span>
			</div>

			<div class="gprs-annc__fact gprs-glass-card">
				<span class="gprs-annc__fact-label">Happening Now</span>
				<span class="gprs-annc__fact-text">Crews on site &mdash; siding, new windows, and doors arriving</span>
			</div>

			<div class="gprs-annc__fact gprs-glass-card">
				<span class="gprs-annc__fact-label">The Building</span>
				<span class="gprs-annc__fact-text">70 homes &mdash; 20 wheelchair-accessible units and 50 standard suites, all two-bedroom</span>
			</div>

		</div>

		<div class="gprs-annc__body">
			<p>Full milestone history and construction photos:
			<a href="<?php echo esc_url( home_url( '/margaret-edgson-manor-rebuild-efforts/' ) ); ?>">Rebuild
			Efforts &amp; Milestones</a> &middot;
			<a href="<?php echo esc_url( home_url( '/timeline/' ) ); ?>">Our Timeline</a> &middot;
			<a href="<?php echo esc_url( home_url( '/our-story/' ) ); ?>">Our Story</a></p>
		</div>
	</section>


	<hr class="gprs-annc__divider" aria-hidden="true">


	<!-- ═══════════════════════════════════════════════════
	     SECTION 3 — FOR MEDIA
	     ═══════════════════════════════════════════════════ -->
	<section class="gprs-annc__section" id="for-media">
		<h2 class="gprs-annc__heading gprs-gradient-heading">For Media</h2>

		<div class="gprs-annc__body">
			<p>Members of the media are welcome to quote this announcement and republish
			the materials below. For interviews, site photos, or further information,
			contact the GPRS Board Secretary at
			<a href="mailto:GPResidentialSociety@gmail.com">GPResidentialSociety@gmail.com</a>
			or <a href="tel:7805323276">780-532-3276</a>.</p>
		</div>

		<ul class="gprs-annc__media-list">
			<!-- Verify this URL after uploading the final PDF to the
			     Media Library on launch day. -->
			<li><a href="<?php echo esc_url( $uploads . '/2026/07/MEM-Rebuild-Press-Release-July-2026.pdf' ); ?>">Download the press release (PDF)</a></li>
			<li><a href="<?php echo esc_url( $uploads . '/2025/11/cropped-new-logo.jpg' ); ?>">Download the GPRS logo (JPG)</a></li>
			<li>Background: <a href="<?php echo esc_url( home_url( '/margaret-edgson-manor/' ) ); ?>">About Margaret Edgson Manor</a> &middot; <a href="<?php echo esc_url( home_url( '/accessible-housing/' ) ); ?>">Our Accessible Housing</a></li>
		</ul>
	</section>


	<hr class="gprs-annc__divider" aria-hidden="true">


	<!-- ═══════════════════════════════════════════════════
	     SECTION 4 — HOW TO HELP
	     ═══════════════════════════════════════════════════ -->
	<section class="gprs-annc__section" id="how-to-help">
		<h2 class="gprs-annc__heading gprs-gradient-heading">How You Can Help</h2>

		<div class="gprs-annc__body">
			<p>Every donation goes directly toward the rebuild, and tax receipts are
			issued. Visit our <a href="<?php echo esc_url( home_url( '/donate/' ) ); ?>">donation
			page</a> to give online, by e-Transfer, or by cheque &mdash; or learn about
			<a href="<?php echo esc_url( home_url( '/volunteer/' ) ); ?>">volunteering
			with GPRS</a>.</p>
		</div>
	</section>


	<!-- ═══════════════════════════════════════════════════
	     CONTACT FOOTER BAR
	     ═══════════════════════════════════════════════════ -->
	<div class="gprs-annc__contact">
		<strong>Grande Prairie Residential Society</strong><br>
		c/o Grande Spirit Foundation<br>
		9503 102 Ave, Grande Prairie, AB&nbsp;&nbsp;T8V 7G9<br>
		Phone: <a href="tel:7805323276">780-532-3276</a><br>
		Website: <a href="<?php echo esc_url( home_url( '/' ) ); ?>">gpresidentialsociety.com</a><br><br>
		<em>Our Mission since 1986: &ldquo;To provide accessible and affordable housing
		for people with physical disabilities.&rdquo;</em>
	</div>


</article>

<?php } ?>
