<?php
/**
 * Fire Rebuild — Page Content
 * Self-hooking: require_once in functions.php
 *
 * Outputs the Margaret Edgson Manor fire and rebuild narrative.
 * Runs inside Astra's primary content area so the hero
 * (rendered by inc/hero.php) appears above this content.
 *
 * CLASS PREFIX:  gprs-fire-  (page-scoped)
 * Depends:      01-Tokens, 00-shared-components.css, 13-fire-rebuild.css
 * Updated:      2026-03-31 — Step 2: Added shared component classes
 *               (gprs-gradient-heading, gprs-gradient-subheading,
 *                gprs-tinted-text, gprs-blockquote)
 */

add_action( 'astra_primary_content_top', 'gprs_render_fire_rebuild_content', 10 );

function gprs_render_fire_rebuild_content() {

	if ( ! is_page( 'margaret-edgson-manor-rebuild-efforts' ) ) {
		return;
	}

	$uploads = wp_get_upload_dir()['baseurl'];
?>

<!-- ═══════════════════════════════════════════════════
     QUICKLINKS BAR — sits outside <article> so it can
     span full viewport width and stick below the header.
     ═══════════════════════════════════════════════════ -->
<nav class="gprs-quicklinks" aria-label="Page sections">
	<ul class="gprs-quicklinks-list">
		<li><span class="gprs-ql-label">Jump to:</span></li>
		<li><a href="#updates">Latest Updates</a></li>
		<li><a href="#the-fire">The Fire</a></li>
		<li><a href="#about-mem">About the Manor</a></li>
		<li><a href="#rebuild-progress">Rebuild Progress</a></li>
		<li><a href="#vision">Our Vision</a></li>
		<li><a href="#displaced">Displaced Residents</a></li>
		<li><a href="#how-to-help">How to Help</a></li>
	</ul>
</nav>

<article class="gprs-fire gprs-tinted-text" aria-label="Margaret Edgson Manor fire and rebuild updates">


	<!-- ═══════════════════════════════════════════════════
	     SECTION 0 — LATEST REBUILD UPDATES
	     Newest entry first. To post a new update, copy the
	     <article> block marked TEMPLATE below, paste it directly
	     under the "NEWEST UPDATE GOES HERE" comment, and remove
	     the gprs-fire__update--latest modifier from the entry
	     that is no longer the newest.
	     ═══════════════════════════════════════════════════ -->
	<section class="gprs-fire__section" id="updates">
		<h2 class="gprs-fire__heading gprs-gradient-heading">Latest Rebuild Updates</h2>

		<div class="gprs-fire__body">
			<p>Short updates from the job site at 11010&nbsp;107A&nbsp;Avenue, newest
			first. For the full story of the fire and the road back, keep reading
			below &mdash; or see our
			<a href="<?php echo esc_url( home_url( '/mem-rebuild-announcement/' ) ); ?>">official
			rebuild announcement</a>.</p>
		</div>

		<div class="gprs-fire__updates">

			<!-- ── NEWEST UPDATE GOES HERE ── -->

			<article class="gprs-fire__update gprs-fire__update--latest">
				<div class="gprs-fire__update-meta">
					<time class="gprs-fire__update-date" datetime="2026-08">August 2026</time>
					<span class="gprs-fire__update-badge">Latest</span>
				</div>
				<h3 class="gprs-fire__update-title">Down to bare board: the old skin is coming off</h3>
				<div class="gprs-fire__update-body">
					<p>Crews have begun removing the old siding, stucco and
					mould-damaged sheathing from Margaret Edgson Manor. The west end and
					the front are already down to bare board; the rest of the building
					still carries its original siding, and that is coming off too.</p>

					<p>It looks stark from 107A&nbsp;Avenue right now. But taking the
					building back to bare board is exactly what has to happen before
					anything new can go on it, and it is the first change in a year that
					you can see from the street.</p>

					<p>Out of sight, the same crews are treating the building for smoke
					odour, installing new sprinkler risers, and reworking bulkheads. The
					architectural drawings are nearly final &mdash; among the last pieces
					are the new roll-in showers for the modified accessible suites.</p>

					<p>Work continues with our construction partner,
					<strong>Terrace Construction Development Inc.</strong> We will keep
					posting progress here and on our
					<a href="https://www.facebook.com/Gpresidential/" rel="noopener">Facebook
					page</a> as each stage is finished.</p>
				</div>
			</article>

			<article class="gprs-fire__update">
				<div class="gprs-fire__update-meta">
					<time class="gprs-fire__update-date" datetime="2026-05">Spring 2026</time>
				</div>
				<h3 class="gprs-fire__update-title">Weather-tight, and waiting on materials</h3>
				<div class="gprs-fire__update-body">
					<p>With the new permanent roof installed to updated building codes and
					the fourth-floor walls reframed, the structure was closed to the
					weather. The project then moved into its materials phase &mdash;
					siding, windows and doors on order &mdash; which is the quiet stretch
					that made the site look still from the street even as the work carried
					on.</p>
				</div>
			</article>

			<article class="gprs-fire__update">
				<div class="gprs-fire__update-meta">
					<time class="gprs-fire__update-date" datetime="2026-01">Winter 2025&ndash;26</time>
				</div>
				<h3 class="gprs-fire__update-title">Protecting the building through the cold</h3>
				<div class="gprs-fire__update-body">
					<p>Selective demolition and mold mitigation were completed and the
					structure stripped to bare studs. Through the winter the boiler was
					run to keep the foundation from heaving, and on-site safety measures
					&mdash; lighting, security cameras, thermal monitoring, and fencing to
					Alberta Safety Code standards &mdash; kept the site secure.</p>
				</div>
			</article>

			<!-- ────────────────────────────────────────────
			     TEMPLATE — copy this block for the next update.
			     Add gprs-fire__update--latest and the "Latest"
			     badge to whichever entry is newest.

			     <article class="gprs-fire__update">
			         <div class="gprs-fire__update-meta">
			             <time class="gprs-fire__update-date" datetime="2026-MM">Month 2026</time>
			         </div>
			         <h3 class="gprs-fire__update-title">Headline</h3>
			         <div class="gprs-fire__update-body">
			             <p>What changed on site, in plain language.</p>
			         </div>
			     </article>
			     ──────────────────────────────────────────── -->

		</div>
	</section>


	<hr class="gprs-fire__divider" aria-hidden="true">


	<!-- ═══════════════════════════════════════════════════
	     SECTION 1 — THE FIRE
	     ═══════════════════════════════════════════════════ -->
	<section class="gprs-fire__section" id="the-fire">
		<h2 class="gprs-fire__heading gprs-gradient-heading">The Fire</h2>

		<div class="gprs-fire__body">
			<p>On June 9, 2025, a significant structure fire broke out at Margaret Edgson
			Manor (11010 107A Avenue, Grande Prairie, Alberta) shortly after midnight.
			The Grande Prairie Fire Department responded quickly, along with EMS, RCMP, Staff from the Grande Spirit Foundation,
			and other first responders. Thanks to their heroic efforts &mdash; including
			assisting residents with mobility needs during active fire conditions &mdash;
			<strong>there were no fatalities</strong>.</p>

			<p>The fire caused serious damage, particularly to upper floor and the roof,
			displacing over 70 residents, some of whom rely on the Manor&rsquo;s
			accessible features to live independently.</p>

			<p>The Grande Prairie Residential Society extends its deepest gratitude to the
			Grande Prairie Fire Department, EMS, RCMP, the Grande Spirit Foundation,
			Seniors Outreach, Home&nbsp;2&nbsp;Home, and the
			entire community for their immediate support during evacuations and ongoing
			assistance. Your compassion and quick action made a profound difference in a
			challenging time.</p>
		</div>

		<blockquote class="gprs-fire__quote gprs-blockquote">
			<p>&ldquo;The fire was devastating, but it also showcased the strength of our
			neighbours, staff, emergency responders, and local organizations who came
			together to care for everyone affected.&rdquo;</p>
		</blockquote>
	</section>


	<hr class="gprs-fire__divider" aria-hidden="true">


	<!-- ═══════════════════════════════════════════════════
	     SECTION 2 — ABOUT MARGARET EDGSON MANOR
	     ═══════════════════════════════════════════════════ -->
	<section class="gprs-fire__section" id="about-mem">
		<h2 class="gprs-fire__heading gprs-gradient-heading">About Margaret Edgson Manor</h2>

		<div class="gprs-fire__body">
			<p>Margaret Edgson Manor is a 70-unit mix of affordable and accessible living apartments
			owned and operated by the Grande Prairie Residential Society (GPRS). Since
			1986, GPRS has been dedicated to providing affordable and accessible housing
			for people with physical disabilities in Grande Prairie.</p>

			<p>The Manor features barrier-free design elements &mdash; wide doorways,
			grab bars, and layouts that support independence and dignity &mdash; allowing
			residents to live safely and comfortably in a mixed-income, inclusive
			community.</p>
		</div>

		<blockquote class="gprs-fire__quote gprs-blockquote">
			<p>&ldquo;Having a home of your own gives you a piece of independence.
			You have your own home.&rdquo;</p>
			<cite>&mdash; Travis McNally, Founding President (2004)</cite>
		</blockquote>
	</section>


	<hr class="gprs-fire__divider" aria-hidden="true">


	<!-- ═══════════════════════════════════════════════════
	     SECTION 3 — REBUILD PROGRESS
	     ═══════════════════════════════════════════════════ -->
	<section class="gprs-fire__section" id="rebuild-progress">
		<h2 class="gprs-fire__heading gprs-gradient-heading">The Rebuild: Progress &amp; Milestones</h2>

		<div class="gprs-fire__body">
			<p>We are actively rebuilding Margaret Edgson Manor &mdash; not as a new
			project, but as a continuation and renewal of our core mission. Following
			consultations with insurance providers, experts, and construction partners,
			we chose to preserve and restore the building while upgrading it to meet
			modern standards.</p>

			<p>We are proud to partner with <strong>Terrace Construction Development
			Inc.</strong> for this project. Their expertise and dedication have been
			instrumental in keeping progress on track despite challenging winter
			conditions.</p>
		</div>

		<h3 class="gprs-fire__subheading gprs-gradient-subheading">Key Milestones (as of August 2026)</h3>

		<div class="gprs-fire__milestones">

			<div class="gprs-fire__milestone">
				<span class="gprs-fire__milestone-icon" aria-hidden="true">✓</span>
				<span class="gprs-fire__milestone-text">
					<strong>Selective demolition completed</strong> &mdash; all damaged
					contents removed, mold mitigation performed, and the structure
					stripped to bare studs.
				</span>
			</div>

			<div class="gprs-fire__milestone">
				<span class="gprs-fire__milestone-icon" aria-hidden="true">✓</span>
				<span class="gprs-fire__milestone-text">
					<strong>Winter protection measures</strong> implemented to safeguard
					the foundation throughout the cold season. Includes running the boiler
					to heat the foundation so it doesn't suffer a catastrophic heave.
				</span>
			</div>

			<div class="gprs-fire__milestone">
				<span class="gprs-fire__milestone-icon" aria-hidden="true">✓</span>
				<span class="gprs-fire__milestone-text">
					<strong>New permanent roof installed</strong> to updated building
					codes, with fourth-floor walls reframed for enhanced structural
					support.
				</span>
			</div>

			<div class="gprs-fire__milestone">
				<span class="gprs-fire__milestone-icon" aria-hidden="true">✓</span>
				<span class="gprs-fire__milestone-text">
					<strong>On-site safety features added</strong> &mdash; lighting,
					security cameras, thermal monitoring of the foundation,
					and fencing per Alberta Safety Code standards.
				</span>
			</div>

			<div class="gprs-fire__milestone">
				<span class="gprs-fire__milestone-icon" aria-hidden="true">✓</span>
				<span class="gprs-fire__milestone-text">
					<strong>Construction advancing steadily</strong> through challenging
					winter conditions, with some framing and structural work underway.
				</span>
			</div>

			<div class="gprs-fire__milestone">
				<span class="gprs-fire__milestone-icon" aria-hidden="true">✓</span>
				<span class="gprs-fire__milestone-text">
					<strong>Strip-out underway</strong> &mdash; old siding, stucco and
					mould-damaged sheathing coming off, alongside smoke-odour abatement,
					new sprinkler risers and bulkhead changes.
				</span>
			</div>

		</div>

		<!-- ── Construction Progress Photos ── -->
		<h3 class="gprs-fire__subheading gprs-gradient-subheading">Construction Progress — August 2026</h3>

		<div class="gprs-fire__images">
			<figure class="gprs-fire__image-tile">
				<img src="<?php echo esc_url( $uploads ); ?>/2026/08/mem-rebuild-2026-08-southwest-corner.jpg"
				     alt="Margaret Edgson Manor from the southwest in August 2026, with the old siding and stucco stripped from this elevation down to bare sheathing, balconies in place, behind construction fencing"
				     loading="lazy"
				     decoding="async"
				     width="1600"
				     height="1200">
				<figcaption class="gprs-fire__image-caption">
					The west end, down to bare board as the old siding and stucco come
					off. August 18, 2026.
				</figcaption>
			</figure>

			<figure class="gprs-fire__image-tile">
				<img src="<?php echo esc_url( $uploads ); ?>/2026/08/mem-rebuild-2026-08-front-elevation.jpg"
				     alt="The front of Margaret Edgson Manor in August 2026, part-stripped to bare sheathing and dark underlay, with the covered main entrance below"
				     loading="lazy"
				     decoding="async"
				     width="1600"
				     height="1200">
				<figcaption class="gprs-fire__image-caption">
					The front of the building part-way through the strip-out.
					August 18, 2026.
				</figcaption>
			</figure>

			<figure class="gprs-fire__image-tile">
				<img src="<?php echo esc_url( $uploads ); ?>/2026/08/mem-rebuild-2026-08-lift-on-site.jpg"
				     alt="A boom lift parked along the front of Margaret Edgson Manor in August 2026, beside the part-stripped exterior and the covered main entrance"
				     loading="lazy"
				     decoding="async"
				     width="1600"
				     height="1200">
				<figcaption class="gprs-fire__image-caption">
					Equipment back on site along the front of the building.
					August 18, 2026.
				</figcaption>
			</figure>
		</div>

		<h3 class="gprs-fire__subheading gprs-gradient-subheading">Construction Progress — Winter 2026</h3>

		<div class="gprs-fire__images">
			<figure class="gprs-fire__image-tile">
				<img src="<?php echo esc_url( $uploads ); ?>/2026/03/DJI_20260110142827_0056_D-scaled-e1774515617787.jpg"
				     alt="Aerial view of Margaret Edgson Manor under reconstruction showing new roof trusses and framing, winter 2026"
				     loading="lazy"
				     decoding="async"
				     width="1200"
				     height="800">
				<figcaption class="gprs-fire__image-caption">
					Aerial view: new roof trusses and fourth-floor framing in progress, January 2026.
				</figcaption>
			</figure>

            <figure class="gprs-fire__image-tile">
				<img src="<?php echo esc_url( $uploads ); ?>/2026/03/E63A8547-331B-422B-8C44-02C5CA3B0DB9-scaled.jpeg"
				     alt="Looking south from Seargent House at Margaret Edgson Manor under reconstruction showing new roof trusses and framing, winter 2026"
				     loading="lazy"
				     decoding="async"
				     width="1200"
				     height="800">
				<figcaption class="gprs-fire__image-caption"
>
					Looking south from Seargent House at Margaret Edgson Manor under reconstruction showing new roof trusses and framing, winter 2026.

				</figcaption>
			</figure>
			<!-- ────────────────────────────────────────────
			     ADD MORE PROGRESS PHOTOS HERE
			     Copy the <figure> block above and change
			     the src, alt, and caption for each new image.
			     ──────────────────────────────────────────── -->
		</div>
	</section>


	<hr class="gprs-fire__divider" aria-hidden="true">


	<!-- ═══════════════════════════════════════════════════
	     SECTION 4 — OUR VISION
	     ═══════════════════════════════════════════════════ -->
	<section class="gprs-fire__section" id="vision">
		<h2 class="gprs-fire__heading gprs-gradient-heading">Our Vision for the Renewed Manor</h2>

		<div class="gprs-fire__body">
			<p>This rebuild will restore approximately 70 accessible, affordable units
			while strengthening what has always made the Manor special: a place where
			residents feel independent, safe, and at home.</p>
		</div>

		<div class="gprs-fire__features">

			<div class="gprs-fire__feature">
				<span class="gprs-fire__feature-icon" aria-hidden="true">♿</span>
				<h3 class="gprs-fire__feature-title">Enhanced Accessibility</h3>
				<p class="gprs-fire__feature-text">
					Updated features to accommodate today&rsquo;s mobility technologies
					and support aging in place.
				</p>
			</div>

			<div class="gprs-fire__feature">
				<span class="gprs-fire__feature-icon" aria-hidden="true">🛡️</span>
				<h3 class="gprs-fire__feature-title">Improved Safety Systems</h3>
				<p class="gprs-fire__feature-text">
					Modern fire suppression, detection, and emergency systems built to
					current building codes.
				</p>
			</div>

			<div class="gprs-fire__feature">
				<span class="gprs-fire__feature-icon" aria-hidden="true">🌱</span>
				<h3 class="gprs-fire__feature-title">Energy Efficiency</h3>
				<p class="gprs-fire__feature-text">
					Sustainable building materials and insulation for long-term
					durability and lower operating costs.
				</p>
			</div>

			<div class="gprs-fire__feature">
				<span class="gprs-fire__feature-icon" aria-hidden="true">🏠</span>
				<h3 class="gprs-fire__feature-title">Inclusive Community</h3>
				<p class="gprs-fire__feature-text">
					Thoughtful layout adjustments that maintain the mixed-income model
					residents value.
				</p>
			</div>

		</div>

		<blockquote class="gprs-fire__quote gprs-blockquote">
			<p>&ldquo;Once it&rsquo;s built, people will say it&rsquo;s a good
			thing.&rdquo;</p>
			<cite>&mdash; Ethel Oman, Founding Treasurer (1986)</cite>
		</blockquote>
	</section>


	<hr class="gprs-fire__divider" aria-hidden="true">


	<!-- ═══════════════════════════════════════════════════
	     SECTION 5 — SUPPORT FOR DISPLACED RESIDENTS
	     ═══════════════════════════════════════════════════ -->
	<section class="gprs-fire__section" id="displaced">
		<h2 class="gprs-fire__heading gprs-gradient-heading">Support for Displaced Residents</h2>

		<div class="gprs-fire__body">
			<p>GPRS and our partners have worked tirelessly to support those displaced
			by the fire. Insurance processes for personal property recovery are underway,
			and mental health resources remain available through
			<strong>Alberta Mental Health</strong> at
			<a href="tel:7808334323">780-833-4323</a>.</p>

			<p>For the latest on housing assistance or updates, residents and families
			should contact <strong>GSF Family Housing</strong> at
			<a href="tel:7805323276">780-532-3276</a> (extension&nbsp;0) or email
			<a href="mailto:family@grandespirit.org">family@grandespirit.org</a>.</p>
		</div>
	</section>


	<hr class="gprs-fire__divider" aria-hidden="true">


	<!-- ═══════════════════════════════════════════════════
	     SECTION 6 — HOW YOU CAN HELP
	     ═══════════════════════════════════════════════════ -->
	<section class="gprs-fire__section" id="how-to-help">
		<h2 class="gprs-fire__heading gprs-gradient-heading">How You Can Help</h2>

		<div class="gprs-fire__body">
			<p>Community support has been overwhelming and deeply appreciated. Here is
			how you can continue to make a difference:</p>
		</div>

		<div class="gprs-fire__ctas">

			<div class="gprs-fire__cta-card">
				<span class="gprs-fire__cta-icon" aria-hidden="true">💛</span>
				<h3 class="gprs-fire__cta-title">Donate</h3>
				<p class="gprs-fire__cta-text">
					All current donations go directly toward the rebuild. Donate online
					via the Grande Spirit Foundation, Interac e-Transfer to
					<strong>info@grandespirit.org</strong> (note &ldquo;GPRS
					Donation&rdquo;), or by cheque. Tax receipts are issued.
				</p>
				<a class="gprs-fire__cta-link"
				   href="<?php echo esc_url( home_url( '/donate/' ) ); ?>">
					Donate now
				</a>
			</div>

			<div class="gprs-fire__cta-card">
				<span class="gprs-fire__cta-icon" aria-hidden="true">🤝</span>
				<h3 class="gprs-fire__cta-title">Volunteer</h3>
				<p class="gprs-fire__cta-text">
					Help with outreach, meal support, or committee work. Contact Seniors
					Outreach or GPRS to get involved and make a direct impact in the
					community.
				</p>
				<a class="gprs-fire__cta-link"
				   href="<?php echo esc_url( home_url( '/volunteer/' ) ); ?>">
					Learn more
				</a>
			</div>

			<div class="gprs-fire__cta-card">
				<span class="gprs-fire__cta-icon" aria-hidden="true">📦</span>
				<h3 class="gprs-fire__cta-title">In-Kind Donations</h3>
				<p class="gprs-fire__cta-text">
					Non-perishable food, clothing, and household items can be donated
					through local partners like the Friendship Centre or Salvation Army.
				</p>
				<a class="gprs-fire__cta-link"
				   href="<?php echo esc_url( home_url( '/volunteer/' ) ); ?>">
					Get in touch
				</a>
			</div>

		</div>

		<div class="gprs-fire__body">
			<p>Your contributions help keep rents affordable and ensure accessible
			housing remains available for those who need it most.</p>
		</div>
	</section>


	<hr class="gprs-fire__divider" aria-hidden="true">


	<!-- ═══════════════════════════════════════════════════
	     SECTION 7 — LOOKING AHEAD
	     ═══════════════════════════════════════════════════ -->
	<section class="gprs-fire__section" id="looking-ahead">
		<h2 class="gprs-fire__heading gprs-gradient-heading">Looking Ahead</h2>

		<div class="gprs-fire__body">
			<p>The next chapter of Margaret Edgson Manor will honour our 40-year legacy
			while embracing updated standards for safety, accessibility, and
			sustainability. We remain committed to providing a welcoming home for people
			with disabilities and low-income families.</p>

			<p><strong>Thank you for standing with us. Together, we are building back
			stronger.</strong></p>
		</div>
	</section>


	<!-- ═══════════════════════════════════════════════════
	     CONTACT FOOTER BAR
	     ═══════════════════════════════════════════════════ -->
	<div class="gprs-fire__contact">
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
