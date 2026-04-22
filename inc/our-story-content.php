<?php
/**
 * Our Story — Page Content
 * Self-hooking: require_once in functions.php
 *
 * Outputs the full Our Story narrative on page ID 1429.
 * Runs inside Astra's primary content area so the hero
 * (rendered by inc/hero.php) appears above this content.
 *
 * CLASS PREFIX:  gprs-story-  (page-scoped)
 * Depends:      01-Tokens, 00-shared-components.css, 11-our-story.css
 * Updated:      2026-03-31 — Step 2: Added shared component classes
 *               (gprs-gradient-heading, gprs-gradient-subheading,
 *                gprs-tinted-text, gprs-blockquote)
 */

add_action( 'astra_primary_content_top', 'gprs_render_our_story_content', 10 );

function gprs_render_our_story_content() {

	if ( ! is_page( 1429 ) && ! is_page( 'our-story' ) ) {
    return;
}
?>

<article class="gprs-story gprs-tinted-text" aria-label="The history of Grande Prairie Residential Society">


	<!-- ═══════════════════════════════════════════════════
	     SECTION 1 — IT STARTED WITH A QUESTION
	     ═══════════════════════════════════════════════════ -->
	<section class="gprs-story__section" id="origins">
		<h2 class="gprs-story__heading gprs-gradient-heading">It started with a simple question</h2>

		<div class="gprs-story__body">
			<p>In 1984, a small group of people in Grande Prairie started asking a question
			that no one had a good answer for: where do people with physical disabilities
			live &mdash; safely, affordably, independently &mdash; in northern Alberta?</p>

			<p>At the time, the answer was often: somewhere else. Institutional care in
			cities far from home. Apartments that weren&rsquo;t built for wheelchairs.
			Homes that worked against the people living in them, not with them. For
			families in the Peace Region, it meant watching someone they loved leave the
			community just to find a place to live.</p>

			<p>That wasn&rsquo;t good enough for Ernie Oman, Rose Pike, Jean Rycroft,
			Ethel Oman, and Kay McNally. They began meeting regularly &mdash; not as an
			organization, not with funding, but as neighbours who believed their community
			could do better.</p>
		</div>

		<blockquote class="gprs-story__quote gprs-blockquote">
			<p>&ldquo;It&rsquo;s somewhere you can be independent, but there is support
			staff when you need it.&rdquo;</p>
			<cite>&mdash; Rose Pike, founding member (1984)</cite>
		</blockquote>
	</section>


	<hr class="gprs-story__divider" aria-hidden="true">


	<!-- ═══════════════════════════════════════════════════
	     SECTION 2 — A SOCIETY IS BORN
	     ═══════════════════════════════════════════════════ -->
	<section class="gprs-story__section">
		<h2 class="gprs-story__heading gprs-gradient-heading">A Society is born</h2>

		<div class="gprs-story__body">
			<p>On January 15, 1986, the Grande Prairie Residential Society was officially
			incorporated. Travis McNally became the first president of the board, joined
			by Kay McNally, Ethel Oman, Irene Kriaski, and Colleen Kriaski.</p>

			<p>Travis brought something to the role that no one else could. In 1983, a
			horse-racing accident in Regina left him quadriplegic. He knew firsthand what
			it meant to need a home that worked with your body rather than against
			it &mdash; and he knew what it felt like when that home didn&rsquo;t exist.
			He has served as president of GPRS periodically since 1986.</p>

			<p>The mission they wrote down that year has never changed:
			<em>to provide affordable and accessible housing for the physically
			disabled.</em> Forty years later, every decision the Society makes still
			comes back to those words.</p>
		</div>
	</section>


	<hr class="gprs-story__divider" aria-hidden="true">


	<!-- ═══════════════════════════════════════════════════
	     SECTION 3 — BUILDING WHAT DIDN'T EXIST
	     ═══════════════════════════════════════════════════ -->
	<section class="gprs-story__section">
		<h2 class="gprs-story__heading gprs-gradient-heading">Building what didn&rsquo;t exist</h2>


		<!-- ── PHASE I ─────────────────────────────── -->
		<h3 class="gprs-story__subheading gprs-gradient-subheading" id="story-phase-1">Phase I &mdash; Crystal Ridge Duplexes (1987)</h3>

		<div class="gprs-story__body">
			<p>With city, federal, and provincial support, GPRS purchased land in the
			Crystal Ridge neighbourhood and broke ground in 1987. Pat Adams donated his
			expertise as an unpaid design consultant, and what he helped create was
			quietly historic: five duplexes with six two-bedroom and four three-bedroom
			units &mdash; the first wheelchair-accessible housing built north of
			Edmonton.</p>

			<p>These weren&rsquo;t apartments with a ramp added as an afterthought. Every
			detail was designed for the people who would live there. Automatic door
			openers. Wide hallways and doorways for wheelchairs. Roll-in showers with grab
			bars. Adjustable-height counters and sinks. Countertop stoves and wall ovens.
			In-unit laundry. The duplexes were designed so that daily life &mdash;
			cooking, bathing, getting in your own front door &mdash; could happen with
			dignity and independence.</p>

			<p>The first residents moved in during August 1988. For many, it was the first
			time they had a home truly built for them.</p>
		</div>

		<blockquote class="gprs-story__quote gprs-blockquote">
			<p>&ldquo;Having a home of your own gives you a piece of independence.
			You have your own home.&rdquo;</p>
			<cite>&mdash; Travis McNally (2004)</cite>
		</blockquote>


		<!-- ── PHASE II ────────────────────────────── -->
		<h3 class="gprs-story__subheading gprs-gradient-subheading" id="story-phase-2">Phase II &mdash; The 7-Plex (1994)</h3>

		<div class="gprs-story__body">
			<p>Demand grew. The duplexes were full and the waitlist was getting longer, so
			the Society built a six-unit apartment complex right next door at
			9609&ndash;123 Avenue. It featured ground-level automatic entrances, shared
			accessible laundry, and a built-in vacuum system &mdash; small details that
			made a real difference in daily life. In the early 2000s, a seventh suite was
			added and the building became known as the 7-Plex.</p>
		</div>


		<!-- ── PHASE III ───────────────────────────── -->
		<h3 class="gprs-story__subheading gprs-gradient-subheading" id="story-phase-3">Phase III &mdash; Margaret Edgson Manor (2005)</h3>

		<div class="gprs-story__body">
			<p>Margaret Edgson was a Grande Prairie advocate who believed that people with
			disabilities should live as part of the community &mdash; not apart from it.
			Her estate contributed significantly to what would become the Society&rsquo;s
			largest project.</p>

			<p>In 2005, Margaret Edgson Manor opened as a 70-unit complex: 16 fully
			barrier-free, wheelchair-accessible suites and 54 affordable housing units. It
			was developed in partnership with the City of Grande Prairie&rsquo;s Global
			Housing Initiative &mdash; a unique model that brought accessible and
			affordable housing together under one roof. The building operates sustainably,
			without ongoing government operational funding.</p>

			<p>Behind its doors, hundreds of people have found stability. Some stayed
			long-term and built a sense of home. Others used the stability to get back on
			their feet &mdash; returning to work, re-entering the rental market, or moving
			closer to family. The common thread is dignity.</p>
		</div>
	</section>


	<hr class="gprs-story__divider" aria-hidden="true">


	<!-- ═══════════════════════════════════════════════════
	     SECTION 4 — 87 HOMES AND COUNTING
	     ═══════════════════════════════════════════════════ -->
	<section class="gprs-story__section">
		<h2 class="gprs-story__heading gprs-gradient-heading">87 homes and counting</h2>

		<div class="gprs-story__body">
			<p>Across three phases, GPRS has developed and manages approximately
			87 accessible and affordable units in Grande Prairie. Every one of them exists
			because a handful of volunteers in 1984 decided their community could do
			better &mdash; and then spent the next four decades proving it.</p>

			<p>Travis McNally&rsquo;s leadership has been recognized beyond the Society.
			In 2012, he received the Queen Elizabeth II Diamond Jubilee Medal for his
			contributions to disability advocacy. He also co-founded the Grande Prairie
			Injured Jockeys Foundation. But ask anyone at GPRS what matters most, and
			they&rsquo;ll point to the housing &mdash; the rooms, the doorways, the
			showers, the homes that work.</p>
		</div>
	</section>


	<hr class="gprs-story__divider" aria-hidden="true">


	<!-- ═══════════════════════════════════════════════════
	     SECTION 5 — THE FIRE AND WHAT COMES NEXT
	     ═══════════════════════════════════════════════════ -->
	<section class="gprs-story__section">
		<h2 class="gprs-story__heading gprs-gradient-heading">The fire &mdash; and what comes next</h2>

		<div class="gprs-story__body">
			<p>On June 9, 2025, a fire struck Margaret Edgson Manor. No lives were lost,
			thanks to the response of first responders and community members, but
			residents were displaced and the upper floor and roof suffered significant
			damage.</p>

			<p>The rebuild began quickly. By early 2026, selective demolition was complete
			and a new roof was finished to updated building codes &mdash; all in
			partnership with Terrace Construction. The GPRS Board continues to work toward
			a safe, lasting rebuild.</p>

			<p>It would have been easy to see the fire as the end of something. Instead,
			it became the next chapter. The same community that came together in
			1984 &mdash; that asked a question no one had a good answer for and then built
			the answer themselves &mdash; is doing it again.</p>
		</div>

		<div class="gprs-story__cta-row">
			<a href="<?php echo esc_url( home_url( '/donate/' ) ); ?>" class="btn btn-primary">Support the Rebuild</a>
			<a href="<?php echo esc_url( home_url( '/margaret-edgson-manor-rebuild-efforts/' ) ); ?>" class="btn btn-outline">Rebuild Updates</a>
		</div>
	</section>


	<hr class="gprs-story__divider" aria-hidden="true">


	<!-- ═══════════════════════════════════════════════════
	     SECTION 6 — OUR MISSION HASN'T CHANGED
	     ═══════════════════════════════════════════════════ -->
	<section class="gprs-story__section" id="today">
		<h2 class="gprs-story__heading gprs-gradient-heading">Our mission hasn&rsquo;t changed</h2>

		<div class="gprs-story__body">
			<p>Since 1986, the Grande Prairie Residential Society has existed for one
			reason: to provide affordable and accessible housing for the physically
			disabled. We&rsquo;re a volunteer-led, registered Canadian charity
			(BN&nbsp;891431264RR0001) that operates accessible housing across multiple
			phases, in partnership with community members and advocates.</p>

			<p>The need hasn&rsquo;t gone away. The work isn&rsquo;t finished. But every
			door that opens wide enough for a wheelchair, every counter that adjusts to
			the right height, every resident who can say &ldquo;this is my
			home&rdquo; &mdash; that&rsquo;s what forty years of showing up looks
			like.</p>
		</div>

		<blockquote class="gprs-story__quote gprs-story__quote--closing gprs-blockquote">
			<p>&ldquo;Once it&rsquo;s built, people will say it&rsquo;s a good
			thing.&rdquo;</p>
			<cite>&mdash; Ethel Oman, founding member (1986)</cite>
		</blockquote>
	</section>


	<!-- ═══════════════════════════════════════════════════
	     INTERNAL LINKS — SEO & AI DISCOVERABILITY
	     ═══════════════════════════════════════════════════ -->
	<nav class="gprs-story__links" aria-label="Related pages">
		<a href="<?php echo esc_url( home_url( '/timeline/' ) ); ?>">Explore the full timeline &rarr;</a>
		<a href="<?php echo esc_url( home_url( '/accessible-housing/' ) ); ?>">See our housing &rarr;</a>
		<a href="<?php echo esc_url( home_url( '/apply/' ) ); ?>">Apply for housing &rarr;</a>
	</nav>


</article>

<?php
}
