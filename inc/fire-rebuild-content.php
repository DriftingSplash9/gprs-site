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

	$uploads    = wp_get_upload_dir()['baseurl'];
	$report_img = get_stylesheet_directory_uri() . '/images/';
?>

<!-- ═══════════════════════════════════════════════════
     QUICKLINKS BAR — sits outside <article> so it can
     span full viewport width and stick below the header.
     ═══════════════════════════════════════════════════ -->
<nav class="gprs-quicklinks" aria-label="Page sections">
	<ul class="gprs-quicklinks-list">
		<li><span class="gprs-ql-label">Jump to:</span></li>
		<li><a href="#status">Where it stands</a></li>
		<li><a href="#updates">Latest update</a></li>
		<li><a href="#the-plan">What is being built</a></li>
		<li><a href="#photos">Photos</a></li>
		<li><a href="#how-to-help">How to help</a></li>
		<li><a href="#the-fire">The fire</a></li>
	</ul>
</nav>

<article class="gprs-fire gprs-tinted-text" aria-label="Margaret Edgson Manor fire and rebuild updates">


	<!-- ═══════════════════════════════════════════════════
	     SECTION 1 — WHERE THE REBUILD STANDS
	     Six stages. Move the --now / --wait / --done modifiers
	     along the list as the work moves on. No dates are
	     promised here on purpose.
	     ═══════════════════════════════════════════════════ -->
	<section class="gprs-fire__section gprs-fire__status-panel" id="status" aria-labelledby="status-title">
		<p class="gprs-fire__eyebrow">Where the rebuild stands</p>
		<h2 class="gprs-fire__status-title" id="status-title">The Manor is getting its new exterior.
		<span>The inside comes next.</span></h2>

		<ol class="gprs-fire__rail">
			<li class="gprs-fire__stage gprs-fire__stage--done">
				<span class="gprs-fire__stage-dot" aria-hidden="true"></span>
				<span class="gprs-fire__stage-name">The fire</span>
				<span class="gprs-fire__stage-note">June 9, 2025</span>
				<span class="gprs-fire__stage-state">Behind us</span>
			</li>
			<li class="gprs-fire__stage gprs-fire__stage--done">
				<span class="gprs-fire__stage-dot" aria-hidden="true"></span>
				<span class="gprs-fire__stage-name">Made safe</span>
				<span class="gprs-fire__stage-note">Damaged contents out, mould treated, stripped to bare studs</span>
				<span class="gprs-fire__stage-state">Done</span>
			</li>
			<li class="gprs-fire__stage gprs-fire__stage--done">
				<span class="gprs-fire__stage-dot" aria-hidden="true"></span>
				<span class="gprs-fire__stage-name">New roof</span>
				<span class="gprs-fire__stage-note">Built to updated codes, fourth floor reframed</span>
				<span class="gprs-fire__stage-state">Done</span>
			</li>
			<li class="gprs-fire__stage gprs-fire__stage--now" aria-current="step">
				<span class="gprs-fire__stage-dot" aria-hidden="true"></span>
				<span class="gprs-fire__stage-name">Exterior</span>
				<span class="gprs-fire__stage-note">Weather wrap, windows, doors, siding and new balconies</span>
				<span class="gprs-fire__stage-state">Under way</span>
			</li>
			<li class="gprs-fire__stage gprs-fire__stage--ahead">
				<span class="gprs-fire__stage-dot" aria-hidden="true"></span>
				<span class="gprs-fire__stage-name">Interior</span>
				<span class="gprs-fire__stage-note">Stripped to bare studs, to be rebuilt</span>
				<span class="gprs-fire__stage-state">Next</span>
			</li>
			<li class="gprs-fire__stage gprs-fire__stage--ahead">
				<span class="gprs-fire__stage-dot" aria-hidden="true"></span>
				<span class="gprs-fire__stage-name">Homes ready</span>
				<span class="gprs-fire__stage-note">70 homes, 20 of them barrier-free</span>
				<span class="gprs-fire__stage-state">Ahead</span>
			</li>
		</ol>
	</section>


	<!-- ═══════════════════════════════════════════════════
	     SECTION 2 — LATEST REBUILD UPDATES
	     Newest entry first. To post a new update, copy the
	     <article> block marked TEMPLATE below, paste it directly
	     under the "Earlier updates" line, so it sits folded with
	     the others. Each earlier update is a <details> block that
	     opens when its heading is selected.
	     ═══════════════════════════════════════════════════ -->
	<section class="gprs-fire__section" id="updates">
		<p class="gprs-fire__eyebrow">From the job site</p>
		<h2 class="gprs-fire__heading gprs-gradient-heading">Latest update</h2>

		<div class="gprs-fire__body">
			<p>Updates from 10706&nbsp;110&nbsp;Street, newest first. Earlier
			updates are folded underneath.</p>
		</div>

		<div class="gprs-fire__updates">

			<!-- ── NEWEST UPDATE GOES HERE ── -->

			<!-- ────────────────────────────────────────────
			     NOVEMBER 2026 — SITE REPORT
			     A one-off illustrated update (photo with numbered
			     pins, wall-layer photos, balcony sketch, and a line drawing
			     of the building in the header). Styles: sections 8C and 18D
			     8C of css/13-fire-rebuild.css. Photos live in the
			     theme's /images/ folder, so no Media Library upload.
			     When a newer update is posted, remove the "Latest"
			     badge here; the rest can stay as it is.
			     ──────────────────────────────────────────── -->
			<article class="gprs-fire__report" aria-labelledby="report-2026-11-title">

				<header class="gprs-fire__report-head">
					<svg class="gprs-fire__report-art" viewBox="0 0 300 170" aria-hidden="true" focusable="false">
						<line class="gprs-fire__art-line" x1="4" y1="150" x2="296" y2="150"/>
						<rect class="gprs-fire__art-line" x="20" y="46" width="260" height="104"/>
						<polygon class="gprs-fire__art-line" points="12,46 288,46 270,30 30,30"/>
						<line class="gprs-fire__art-line" x1="20" y1="72" x2="280" y2="72"/>
						<line class="gprs-fire__art-line" x1="20" y1="98" x2="280" y2="98"/>
						<line class="gprs-fire__art-line" x1="20" y1="124" x2="280" y2="124"/>
						<rect class="gprs-fire__art-wrap" x="125" y="34" width="50" height="116"/>
						<line class="gprs-fire__art-hatch" x1="126" y1="48" x2="174" y2="34"/><line class="gprs-fire__art-hatch" x1="126" y1="61" x2="174" y2="47"/><line class="gprs-fire__art-hatch" x1="126" y1="74" x2="174" y2="60"/><line class="gprs-fire__art-hatch" x1="126" y1="87" x2="174" y2="73"/><line class="gprs-fire__art-hatch" x1="126" y1="100" x2="174" y2="86"/><line class="gprs-fire__art-hatch" x1="126" y1="113" x2="174" y2="99"/><line class="gprs-fire__art-hatch" x1="126" y1="126" x2="174" y2="112"/><line class="gprs-fire__art-hatch" x1="126" y1="139" x2="174" y2="125"/><line class="gprs-fire__art-hatch" x1="126" y1="152" x2="174" y2="138"/>
						<polygon class="gprs-fire__art-line" points="118,34 182,34 172,20 128,20"/>
						<rect class="gprs-fire__art-win" x="36" y="54" width="14" height="11"/><rect class="gprs-fire__art-win" x="66" y="54" width="14" height="11"/><rect class="gprs-fire__art-win" x="96" y="54" width="14" height="11"/><rect class="gprs-fire__art-win" x="190" y="54" width="14" height="11"/><rect class="gprs-fire__art-win" x="220" y="54" width="14" height="11"/><rect class="gprs-fire__art-win" x="250" y="54" width="14" height="11"/><rect class="gprs-fire__art-win" x="36" y="80" width="14" height="11"/><rect class="gprs-fire__art-win" x="66" y="80" width="14" height="11"/><rect class="gprs-fire__art-win" x="96" y="80" width="14" height="11"/><rect class="gprs-fire__art-win" x="190" y="80" width="14" height="11"/><rect class="gprs-fire__art-win" x="220" y="80" width="14" height="11"/><rect class="gprs-fire__art-win" x="250" y="80" width="14" height="11"/><rect class="gprs-fire__art-win" x="36" y="106" width="14" height="11"/><rect class="gprs-fire__art-win" x="66" y="106" width="14" height="11"/><rect class="gprs-fire__art-win" x="96" y="106" width="14" height="11"/><rect class="gprs-fire__art-win" x="190" y="106" width="14" height="11"/><rect class="gprs-fire__art-win" x="220" y="106" width="14" height="11"/><rect class="gprs-fire__art-win" x="250" y="106" width="14" height="11"/><rect class="gprs-fire__art-win" x="36" y="132" width="14" height="11"/><rect class="gprs-fire__art-win" x="66" y="132" width="14" height="11"/><rect class="gprs-fire__art-win" x="96" y="132" width="14" height="11"/><rect class="gprs-fire__art-win" x="190" y="132" width="14" height="11"/><rect class="gprs-fire__art-win" x="220" y="132" width="14" height="11"/><rect class="gprs-fire__art-win" x="250" y="132" width="14" height="11"/><rect class="gprs-fire__art-win" x="143" y="54" width="14" height="11"/><rect class="gprs-fire__art-win" x="143" y="80" width="14" height="11"/><rect class="gprs-fire__art-win" x="143" y="106" width="14" height="11"/><rect class="gprs-fire__art-win" x="143" y="132" width="14" height="11"/>
						<path class="gprs-fire__art-dim" d="M291 46 V150 M287 46 H295 M287 150 H295"/>
					</svg>
					<div class="gprs-fire__update-meta">
						<time class="gprs-fire__update-date" datetime="2026-11">November 2026</time>
						<span class="gprs-fire__report-kicker">Site report</span>
						<span class="gprs-fire__update-badge">Latest</span>
					</div>
					<h3 class="gprs-fire__report-title" id="report-2026-11-title">The Manor is putting on its raincoat</h3>
					<p class="gprs-fire__report-lede">If you have driven past lately, you have
					seen the Manor turning yellow. That is the weather wrap going on, the
					layer that keeps wind and water out of the walls for good. Here is how
					to read what you are looking at.</p>
				</header>

				<!-- Photo with numbered pins. The pins are decoration;
				     the numbered list underneath carries the meaning. -->
				<figure class="gprs-fire__report-photo">
					<div class="gprs-fire__report-frame">
						<img src="<?php echo esc_url( $report_img . 'mem-wrap-2026-10-23-corner-1600.jpg' ); ?>"
						     srcset="<?php echo esc_url( $report_img . 'mem-wrap-2026-10-23-corner-800.jpg' ); ?> 800w, <?php echo esc_url( $report_img . 'mem-wrap-2026-10-23-corner-1600.jpg' ); ?> 1600w"
						     sizes="(max-width: 900px) 100vw, 860px"
						     alt="Margaret Edgson Manor on October 23, 2026, seen from a corner behind construction fencing. Wide strips of yellow weather wrap cover parts of the bare board walls, the window openings are edged in yellow, and wooden balcony stacks run along the far side of the building."
						     loading="lazy"
						     decoding="async"
						     width="1600"
						     height="1200">
						<span class="gprs-fire__pin gprs-fire__pin--1" aria-hidden="true">1</span>
						<span class="gprs-fire__pin gprs-fire__pin--2" aria-hidden="true">2</span>
						<span class="gprs-fire__pin gprs-fire__pin--3" aria-hidden="true">3</span>
						<span class="gprs-fire__pin gprs-fire__pin--4" aria-hidden="true">4</span>
					</div>
					<ol class="gprs-fire__report-legend">
						<li><strong>The yellow wrap.</strong> A self-adhered membrane going
						on over the repaired walls, one strip at a time.</li>
						<li><strong>Window openings.</strong> Each one is edged in yellow
						tape. New windows and exterior doors are part of this stage.</li>
						<li><strong>The balconies.</strong> The old ones are coming off so
						better ones can go on. More on that below.</li>
						<li><strong>The main floor.</strong> It will be kept warm all
						winter to protect the foundation from frost.</li>
					</ol>
					<figcaption class="gprs-fire__report-credit">Photographed October 23, 2026.</figcaption>
				</figure>

				<!-- Wall layers, inside to outside -->
				<section class="gprs-fire__report-block" aria-labelledby="report-2026-11-layers">
					<h4 class="gprs-fire__report-subtitle" id="report-2026-11-layers">A wall, from the inside out</h4>
					<p class="gprs-fire__report-text">A new exterior goes on in layers, and
					each one has to be finished before the next can start. This is where
					the Manor&rsquo;s walls stand today.</p>

					<ol class="gprs-fire__layers">
						<li class="gprs-fire__layer gprs-fire__layer--frame">
							<img class="gprs-fire__layer-swatch" src="<?php echo esc_url( $report_img . 'mem-layer-framing-640.jpg' ); ?>" alt="" loading="lazy" decoding="async" width="640" height="384">
							<span class="gprs-fire__layer-name">Framing</span>
							<span class="gprs-fire__layer-note">Stripped to bare studs, with the fourth floor reframed.</span>
							<span class="gprs-fire__status gprs-fire__status--done">Done</span>
						</li>
						<li class="gprs-fire__layer gprs-fire__layer--board">
							<img class="gprs-fire__layer-swatch" src="<?php echo esc_url( $report_img . 'mem-layer-sheathing-640.jpg' ); ?>" alt="" loading="lazy" decoding="async" width="640" height="384">
							<span class="gprs-fire__layer-name">Sheathing</span>
							<span class="gprs-fire__layer-note">The board skin over the frame, repaired.</span>
							<span class="gprs-fire__status gprs-fire__status--done">Done</span>
						</li>
						<li class="gprs-fire__layer gprs-fire__layer--wrap">
							<img class="gprs-fire__layer-swatch" src="<?php echo esc_url( $report_img . 'mem-layer-wrap-640.jpg' ); ?>" alt="" loading="lazy" decoding="async" width="640" height="384">
							<span class="gprs-fire__layer-name">Weather wrap</span>
							<span class="gprs-fire__layer-note">The yellow layer. It keeps wind and water out.</span>
							<span class="gprs-fire__status gprs-fire__status--now">Going on now</span>
						</li>
						<li class="gprs-fire__layer gprs-fire__layer--siding">
							<img class="gprs-fire__layer-swatch" src="<?php echo esc_url( $report_img . 'example-fibre-cement-siding-640.jpg' ); ?>" alt="" loading="lazy" decoding="async" width="640" height="384">
							<span class="gprs-fire__layer-name">Siding</span>
							<span class="gprs-fire__layer-note">Hardie board, a fibre cement siding, approved by the board in September.</span>
							<span class="gprs-fire__status gprs-fire__status--next">Next</span>
						</li>
					</ol>
					<p class="gprs-fire__report-credit">The framing, sheathing and wrap
					photos were taken at the Manor. The siding photo is an example of
					fibre cement siding on another building, since ours is not on yet
					(photo: Wikideas1, Wikimedia Commons, public domain).</p>
				</section>

				<!-- Balconies -->
				<section class="gprs-fire__report-block gprs-fire__report-block--split" aria-labelledby="report-2026-11-balconies">
					<div class="gprs-fire__report-split-text">
						<h4 class="gprs-fire__report-subtitle" id="report-2026-11-balconies">Why the balconies are coming off</h4>
						<p class="gprs-fire__report-text">This one is an unfortunate setback.
						A closer inspection during the rebuild showed that the old
						balconies need to be replaced, so they are being removed and new
						ones will be built in their place. The new balconies will do three
						things better than the old ones did.</p>
						<ol class="gprs-fire__report-points">
							<li><strong>Slope the right way,</strong> so rain and meltwater
							run off the deck and away from the wall.</li>
							<li><strong>Fasten more securely</strong> to the building.</li>
							<li><strong>Carry down properly</strong> to the foundation.</li>
						</ol>
						<p class="gprs-fire__report-text">They will be finished in the vinyl
						decking the board approved in September.</p>
					</div>

					<figure class="gprs-fire__sketch">
						<svg viewBox="0 0 320 210" role="img" aria-labelledby="report-2026-11-sketch-title">
							<title id="report-2026-11-sketch-title">Sketch of a new balcony from the side: the deck tilts slightly away from the wall so water runs off, it is fastened to the building, and its support carries down to the foundation.</title>
							<!-- ground + foundation -->
							<line class="gprs-fire__sketch-ground" x1="6" y1="182" x2="314" y2="182"/>
							<rect class="gprs-fire__sketch-found" x="22" y="182" width="62" height="20" rx="2"/>
							<rect class="gprs-fire__sketch-found" x="222" y="182" width="42" height="14" rx="2"/>
							<!-- wall -->
							<rect class="gprs-fire__sketch-wall" x="30" y="14" width="46" height="168"/>
							<!-- deck, tilted away from the wall -->
							<polygon class="gprs-fire__sketch-deck" points="76,92 268,104 268,114 76,102"/>
							<!-- post down to footing -->
							<rect class="gprs-fire__sketch-post" x="238" y="113" width="10" height="69"/>
							<!-- water running off -->
							<path class="gprs-fire__sketch-water" d="M110 84 L228 91"/>
							<path class="gprs-fire__sketch-water" d="M219 85 L229 91 L218 96" fill="none"/>
							<path class="gprs-fire__sketch-drop" d="M279 112 q5 8 0 12 q-5 -4 0 -12z"/>
							<path class="gprs-fire__sketch-drop" d="M288 132 q5 8 0 12 q-5 -4 0 -12z"/>
							<!-- numbered markers -->
							<g class="gprs-fire__sketch-mark"><circle cx="160" cy="72" r="11"/><text x="160" y="76">1</text></g>
							<g class="gprs-fire__sketch-mark"><circle cx="76" cy="97" r="11"/><text x="76" y="101">2</text></g>
							<g class="gprs-fire__sketch-mark"><circle cx="243" cy="160" r="11"/><text x="243" y="164">3</text></g>
						</svg>
						<figcaption class="gprs-fire__report-credit">A simple sketch of the idea, not a construction drawing.</figcaption>
					</figure>
				</section>

				<!-- Two more photos -->
				<div class="gprs-fire__report-pair">
					<figure class="gprs-fire__report-shot">
						<img src="<?php echo esc_url( $report_img . 'mem-wrap-2026-10-23-front-1000.jpg' ); ?>"
						     alt="A full-height strip of yellow weather wrap running up the middle of the Manor&rsquo;s bare board wall, with a lift parked at its base"
						     loading="lazy" decoding="async" width="1000" height="499">
						<figcaption class="gprs-fire__report-credit">The wrap goes up in full-height strips.</figcaption>
					</figure>
					<figure class="gprs-fire__report-shot">
						<img src="<?php echo esc_url( $report_img . 'mem-balconies-2026-10-23-1000.jpg' ); ?>"
						     alt="The corner of the Manor with yellow weather wrap on the walls and the wooden frame of the old balconies beside it"
						     loading="lazy" decoding="async" width="1000" height="667">
						<figcaption class="gprs-fire__report-credit">The old balcony framing at the end of the building, October 23.</figcaption>
					</figure>
				</div>

				<!-- What comes next -->
				<section class="gprs-fire__report-block" aria-labelledby="report-2026-11-next">
					<h4 class="gprs-fire__report-subtitle" id="report-2026-11-next">What comes next</h4>
										<ul class="gprs-fire__checklist">
						<li>
							<span class="gprs-fire__status gprs-fire__status--now">Under way</span>
							<span>Weather wrap on all four storeys, and the old balconies coming off.</span>
						</li>
						<li>
							<span class="gprs-fire__status gprs-fire__status--next">Next</span>
							<span>New windows and exterior doors, the siding, and the new balconies.</span>
						</li>
						<li>
							<span class="gprs-fire__status gprs-fire__status--wait">Waiting</span>
							<span>Interior work, which is waiting on a permit to begin.</span>
						</li>
						<li>
							<span class="gprs-fire__status gprs-fire__status--now">Getting ready</span>
							<span>Heat for the main floor, so frost cannot heave the foundation over the winter.</span>
						</li>
					</ul>
					<p class="gprs-fire__report-aside">That is, if El&nbsp;Ni&ntilde;o lets us
					have a winter at all.</p>
				</section>

				<footer class="gprs-fire__report-foot">
					<p>Work continues with our construction partner,
					<strong>Terrace Construction Development Inc.</strong>, toward
					70&nbsp;homes: 20 wheelchair-accessible and 50 standard.</p>
				</footer>

			</article>

			<p class="gprs-fire__updates-older">Earlier updates. Select one to read it.</p>

			<article class="gprs-fire__update gprs-fire__update--fold">
				<details>
					<summary class="gprs-fire__update-summary">
						<span class="gprs-fire__update-meta"><time class="gprs-fire__update-date" datetime="2026-09">September 2026</time></span>
						<h3 class="gprs-fire__update-title">Stripped to bare studs &mdash; and ready to build back</h3>
					</summary>
					<div class="gprs-fire__update-body">
					<p>The strip-out is finished. The old vinyl siding is off all four
					storeys, and inside, the Manor is down to bare studs. From
					the street it reads as a shell &mdash; but a building cleared
					back to good bone is a building ready to be rebuilt, and that is the
					stage Margaret Edgson Manor has now reached.</p>

					<p>What goes back on is not what came off. The board has approved
					<strong>James Hardie composite siding</strong> for the exterior and new
					<strong>vinyl decking</strong> for the balconies &mdash; a tougher,
					longer-lasting envelope than the Manor carried before the fire.</p>

					<p>Work continues with our construction partner,
					<strong>Terrace Construction Development Inc.</strong>, toward
					70&nbsp;homes &mdash; 20 wheelchair-accessible and 50 standard.</p>
				</div>
				</details>
			</article>

			<article class="gprs-fire__update gprs-fire__update--fold">
				<details>
					<summary class="gprs-fire__update-summary">
						<span class="gprs-fire__update-meta"><time class="gprs-fire__update-date" datetime="2026-08">August 2026</time></span>
						<h3 class="gprs-fire__update-title">The old siding is coming off &mdash; all four storeys of it</h3>
					</summary>
					<div class="gprs-fire__update-body">
					<p>The old vinyl siding is coming off Margaret Edgson Manor, all four
					storeys of it, and the exterior is being completely exposed and
					prepared for a new envelope.</p>

					<p>We know how that reads from the street: bare boards and
					patches of black wrap. But this is the good part. A new envelope is
					the difference between a building that got patched and a building
					that got rebuilt &mdash; warmer, tighter, and cheaper to heat than
					the Manor that stood here before.</p>

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
				</details>
			</article>

			<article class="gprs-fire__update gprs-fire__update--fold">
				<details>
					<summary class="gprs-fire__update-summary">
						<span class="gprs-fire__update-meta"><time class="gprs-fire__update-date" datetime="2026-05">Spring 2026</time></span>
						<h3 class="gprs-fire__update-title">Weather-tight, and waiting on materials</h3>
					</summary>
					<div class="gprs-fire__update-body">
					<p>With the new permanent roof installed to updated building codes and
					the fourth-floor walls reframed, the structure was closed to the
					weather. The project then moved into its materials phase &mdash;
					exterior materials priced and tendered &mdash; which is the quiet stretch
					that made the site look still from the street even as the work carried
					on.</p>
				</div>
				</details>
			</article>

			<article class="gprs-fire__update gprs-fire__update--fold">
				<details>
					<summary class="gprs-fire__update-summary">
						<span class="gprs-fire__update-meta"><time class="gprs-fire__update-date" datetime="2026-01">Winter 2025&ndash;26</time></span>
						<h3 class="gprs-fire__update-title">Protecting the building through the cold</h3>
					</summary>
					<div class="gprs-fire__update-body">
					<p>Selective demolition and mold mitigation were completed and the
					structure stripped to bare studs. Through the winter the boiler was
					run to keep the foundation from heaving, and on-site safety measures
					&mdash; lighting, security cameras, thermal monitoring, and fencing to
					Alberta Safety Code standards &mdash; kept the site secure.</p>
				</div>
				</details>
			</article>

			<!-- ────────────────────────────────────────────
			     TEMPLATE — copy this block for the next update.
			     Add gprs-fire__update--latest and the "Latest"
			     badge to whichever entry is newest.

			     <article class="gprs-fire__update gprs-fire__update--fold">
			         <details>
			         	<summary class="gprs-fire__update-summary">
			         		<span class="gprs-fire__update-meta"><time class="gprs-fire__update-date" datetime="2026-MM">Month 2026</time></span>
			         		<h3 class="gprs-fire__update-title">Headline</h3>
			         	</summary>
			         	<div class="gprs-fire__update-body">
			             <p>What changed on site, in plain language.</p>
			         </div>
			         </details>
			        </article>
			     ──────────────────────────────────────────── -->

		</div>
	</section>


	<!-- ═══════════════════════════════════════════════════
	     SECTION 3 — WHAT IS BEING BUILT
	     ═══════════════════════════════════════════════════ -->
	<section class="gprs-fire__section gprs-fire__sheet" id="the-plan" aria-labelledby="plan-title">
		<p class="gprs-fire__eyebrow">What is being built</p>
		<h2 class="gprs-fire__heading gprs-gradient-heading" id="plan-title">The same Manor, built better</h2>

		<ul class="gprs-fire__figures">
			<li><span class="gprs-fire__figure">70</span> homes in all</li>
			<li><span class="gprs-fire__figure gprs-fire__figure--gold">20</span> barrier-free</li>
			<li><span class="gprs-fire__figure">50</span> standard</li>
			<li><span class="gprs-fire__figure">4</span> storeys</li>
		</ul>

		<div class="gprs-fire__body">
			<p>This is a rebuild of the building that stood here, not a new project.
			After the fire, the Society chose to keep and restore the structure and
			bring it up to current standards, with our construction partner
			<strong>Terrace Construction Development Inc.</strong></p>
		</div>

		<div class="gprs-fire__plan">
			<div class="gprs-fire__plan-item">
				<h3 class="gprs-fire__plan-title">More barrier-free homes</h3>
				<p class="gprs-fire__plan-text">Twenty, which is four more than before
				the fire. The modified suites are being designed with roll-in
				showers.</p>
			</div>
			<div class="gprs-fire__plan-item">
				<h3 class="gprs-fire__plan-title">A tougher exterior</h3>
				<p class="gprs-fire__plan-text">Weather wrap, Hardie board siding, and
				new balconies finished in vinyl decking.</p>
			</div>
			<div class="gprs-fire__plan-item">
				<h3 class="gprs-fire__plan-title">Fire safety</h3>
				<p class="gprs-fire__plan-text">New sprinkler risers, and a new
				permanent roof built to updated building codes.</p>
			</div>
			<div class="gprs-fire__plan-item">
				<h3 class="gprs-fire__plan-title">The same community</h3>
				<p class="gprs-fire__plan-text">Affordable and accessible homes side by
				side, the mix the Manor has always had.</p>
			</div>
		</div>

		<p class="gprs-fire__more"><a href="<?php echo esc_url( home_url( '/accessible-housing/' ) ); ?>">What barrier-free housing means at GPRS</a></p>

		<blockquote class="gprs-fire__quote gprs-blockquote">
			<p>&ldquo;Once it&rsquo;s built, people will say it&rsquo;s a good
			thing.&rdquo;</p>
			<cite>&mdash; Ethel Oman, Founding Treasurer (1986)</cite>
		</blockquote>
	</section>


	<!-- ═══════════════════════════════════════════════════
	     SECTION 4 — PHOTO RECORD
	     One strip, newest first. To add a photo, copy a
	     <figure> block to the front of the strip.
	     ═══════════════════════════════════════════════════ -->
	<section class="gprs-fire__section gprs-fire__sheet" id="photos" aria-labelledby="photos-title">
		<p class="gprs-fire__eyebrow">Photo record</p>
		<h2 class="gprs-fire__heading gprs-gradient-heading" id="photos-title">The Manor, month by month</h2>

		<div class="gprs-fire__strip" tabindex="0" role="group" aria-label="Rebuild photos, newest first. Scroll sideways for more.">

			<figure class="gprs-fire__frame">
				<img src="<?php echo esc_url( $report_img . 'mem-wrap-2026-10-23-corner-800.jpg' ); ?>"
				     alt="Margaret Edgson Manor in October 2026 with wide strips of yellow weather wrap on its bare board walls, behind construction fencing"
				     loading="lazy" decoding="async" width="800" height="600">
				<figcaption><span class="gprs-fire__frame-date">October 2026</span> The yellow weather wrap goes on.</figcaption>
			</figure>

			<figure class="gprs-fire__frame">
				<img src="<?php echo esc_url( $uploads ); ?>/2026/08/mem-rebuild-2026-08-southwest-corner.jpg"
				     alt="Margaret Edgson Manor from the southwest in August 2026, with the old siding stripped away to bare sheathing, balconies in place, behind construction fencing"
				     loading="lazy" decoding="async" width="1600" height="1200">
				<figcaption><span class="gprs-fire__frame-date">August 2026</span> The west end, down to bare board as the old siding comes off.</figcaption>
			</figure>

			<figure class="gprs-fire__frame">
				<img src="<?php echo esc_url( $uploads ); ?>/2026/08/mem-rebuild-2026-08-front-elevation.jpg"
				     alt="The front of Margaret Edgson Manor in August 2026, part-stripped to bare sheathing and dark underlay, with the covered main entrance below"
				     loading="lazy" decoding="async" width="1600" height="1200">
				<figcaption><span class="gprs-fire__frame-date">August 2026</span> The front of the building part-way through the strip-out.</figcaption>
			</figure>

			<figure class="gprs-fire__frame">
				<img src="<?php echo esc_url( $uploads ); ?>/2026/08/mem-rebuild-2026-08-lift-on-site.jpg"
				     alt="A boom lift parked along the front of Margaret Edgson Manor in August 2026, beside the part-stripped exterior and the covered main entrance"
				     loading="lazy" decoding="async" width="1600" height="1200">
				<figcaption><span class="gprs-fire__frame-date">August 2026</span> Equipment back on site along the front of the building.</figcaption>
			</figure>

			<figure class="gprs-fire__frame">
				<img src="<?php echo esc_url( $uploads ); ?>/2026/03/DJI_20260110142827_0056_D-scaled-e1774515617787.jpg"
				     alt="Aerial view of Margaret Edgson Manor under reconstruction showing new roof trusses and framing, winter 2026"
				     loading="lazy" decoding="async" width="1200" height="800">
				<figcaption><span class="gprs-fire__frame-date">January 2026</span> From the air: new roof trusses and fourth-floor framing in progress.</figcaption>
			</figure>

			<figure class="gprs-fire__frame">
				<img src="<?php echo esc_url( $uploads ); ?>/2026/03/E63A8547-331B-422B-8C44-02C5CA3B0DB9-scaled.jpeg"
				     alt="Looking south from Seargent House at Margaret Edgson Manor under reconstruction showing new roof trusses and framing, winter 2026"
				     loading="lazy" decoding="async" width="1200" height="800">
				<figcaption><span class="gprs-fire__frame-date">Winter 2026</span> Looking south from Seargent House at the new roof trusses.</figcaption>
			</figure>

		</div>
		<p class="gprs-fire__strip-hint" aria-hidden="true">Scroll sideways for earlier photos</p>
	</section>


	<!-- ═══════════════════════════════════════════════════
	     SECTION 5 — HOW YOU CAN HELP
	     ═══════════════════════════════════════════════════ -->
	<section class="gprs-fire__section gprs-fire__sheet" id="how-to-help" aria-labelledby="help-title">
		<p class="gprs-fire__eyebrow">How you can help</p>
		<h2 class="gprs-fire__heading gprs-gradient-heading" id="help-title">Help build the 20 barrier-free homes</h2>

		<div class="gprs-fire__help">
			<div class="gprs-fire__give">
				<p class="gprs-fire__give-text">Donations to the rebuild go toward the
				Manor&rsquo;s 20 barrier-free homes, with features like roll-in showers.
				You can give online, by Interac e-Transfer or by cheque, and tax
				receipts are issued.</p>
				<a class="gprs-fire__give-btn" href="<?php echo esc_url( home_url( '/donate/#ways-to-donate' ) ); ?>">Donate to the rebuild</a>
			</div>

			<ul class="gprs-fire__ways">
				<li>
					<a href="<?php echo esc_url( home_url( '/volunteer/' ) ); ?>">
						<strong>Volunteer</strong>
						<span>GPRS is run by a volunteer board. See where you could help.</span>
					</a>
				</li>
				<li>
					<a href="https://www.facebook.com/Gpresidential/" rel="noopener">
						<strong>Follow along</strong>
						<span>Progress photos and news on our Facebook page.</span>
					</a>
				</li>
				<li>
					<a href="#newsletter">
						<strong>Get updates by email</strong>
						<span>Sign up at the bottom of this page.</span>
					</a>
				</li>
			</ul>
		</div>
	</section>


	<!-- ═══════════════════════════════════════════════════
	     SECTION 6 — HOW WE GOT HERE (the fire, the Manor)
	     ═══════════════════════════════════════════════════ -->
	<section class="gprs-fire__section gprs-fire__sheet" id="the-fire" aria-labelledby="fire-title">
		<p class="gprs-fire__eyebrow">How we got here</p>
		<h2 class="gprs-fire__heading gprs-gradient-heading" id="fire-title">June 9, 2025</h2>

		<div class="gprs-fire__body">
			<p>Shortly after midnight on June 9, 2025, a fire broke out at Margaret
			Edgson Manor. It caused serious damage, particularly to the upper floor
			and the roof, and displaced more than 70 residents, some of whom rely on
			the Manor&rsquo;s accessible features to live independently. Firefighters
			and other first responders helped residents with mobility needs out
			during the fire. <strong>There were no fatalities.</strong></p>

			<p>The Society remains grateful to the Grande Prairie Fire Department,
			EMS, RCMP, the Grande Spirit Foundation, Seniors Outreach,
			Home&nbsp;2&nbsp;Home, and everyone in the community who stepped in that
			night and in the weeks after.</p>

			<p>Margaret Edgson Manor is a 70-home mix of affordable and accessible
			apartments, owned and operated by the Grande Prairie Residential Society.
			<a href="<?php echo esc_url( home_url( '/margaret-edgson-manor/' ) ); ?>">Read
			more about the Manor</a>, or see our
			<a href="<?php echo esc_url( home_url( '/mem-rebuild-announcement/' ) ); ?>">official
			rebuild announcement</a>.</p>
		</div>

		<blockquote class="gprs-fire__quote gprs-blockquote">
			<p>&ldquo;Having a home of your own gives you a piece of independence.
			You have your own home.&rdquo;</p>
			<cite>&mdash; Travis McNally, Founding President (2004)</cite>
		</blockquote>
	</section>


	<!-- ═══════════════════════════════════════════════════
	     SECTION 7 — FOR FORMER RESIDENTS
	     ═══════════════════════════════════════════════════ -->
	<section class="gprs-fire__section gprs-fire__sheet gprs-fire__sheet--note" id="former-residents" aria-labelledby="residents-title">
		<p class="gprs-fire__eyebrow">If you lived at the Manor</p>
		<h2 class="gprs-fire__heading gprs-gradient-heading" id="residents-title">For former residents</h2>

		<blockquote class="gprs-fire__quote gprs-blockquote">
			<p>&ldquo;The rebuild is started but it is a big process, we will get it
			rebuilt.&rdquo;</p>
			<cite>&mdash; Travis McNally, GPRS President</cite>
		</blockquote>

		<div class="gprs-fire__body">
			<p>For questions about housing, contact <strong>GSF Family Housing</strong>
			at <a href="tel:7805323276">780-532-3276</a> (extension&nbsp;0) or
			<a href="mailto:family@grandespirit.org">family@grandespirit.org</a>.</p>
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
