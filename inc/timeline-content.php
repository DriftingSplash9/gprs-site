<?php
/**
 * Timeline Page Content
 *
 * Self-hooking include — outputs the intro heading, all 14
 * timeline entries, and the lightbox markup for /timeline/.
 * No shortcode dependency — renders directly.
 *
 * Loaded via require_once in functions.php.
 * Hero + H1 handled separately by inc/hero.php.
 * Newsletter signup auto-appended by gprs_append_newsletter_to_pages().
 *
 * @package Astra Child – GPRS
 * @since   2026-03-30
 */

add_action( 'astra_primary_content_top', 'gprs_render_timeline_content', 10 );

function gprs_render_timeline_content() {

	if ( ! is_page( 'timeline' ) ) {
		return;
	}

	$uploads = wp_get_upload_dir()['baseurl'];
	$home    = home_url( '/' );

	$entries = array(

		array(
			'period' => 'Pre-1984',
			'title'  => 'Seeds of Hope',
			'text'   => 'Long before formal incorporation, a small group of caring Grande Prairie residents began dreaming of a better way for adults with physical disabilities to live independently. Instead of institutional care far from home, they envisioned safe, accessible housing right here in the Peace Region. This quiet grassroots movement laid the foundation for everything that followed.',
			'images' => array(
				$uploads . '/2025/12/logo.png',
			),
		),

		array(
			'period' => '1984–1985',
			'title'  => 'Coming Together',
			'text'   => 'In 1984, dedicated volunteers like Ernie Oman, Rose Pike, Jean Rycroft, Ethel Oman, and Kay McNally began meeting regularly. They shared stories of friends and family who deserved the dignity of their own homes. By 1985, awareness events were helping the wider community understand the everyday barriers faced by people using wheelchairs.',
			'images' => array(
				$uploads . '/2025/11/pexels-photo-5029919-5029919-scaled-e1766013935470.jpg',
			),
		),

		array(
			'period' => 'January 1986',
			'title'  => 'A Society is Born',
			'text'   => 'On January 15, 1986, the Grande Prairie Residential Society was officially incorporated. Travis McNally stepped forward as the first president, joined by Kay McNally, Ethel Oman, Irene Kriaski, and Colleen Kriaski. With hearts full of determination, they set out to create housing that truly put people first.',
			'images' => array(
				$uploads . '/2025/11/old-school-address.jpg',
			),
		),

		array(
			'period' => '1986–1987',
			'title'  => 'Turning Dreams into Blueprints',
			'text'   => 'Federal and provincial support arrived in the form of a mortgage and subsidy, allowing the group to purchase land and begin planning. Pat Adams generously donated his expertise as an unpaid consultant, designing thoughtful features like lowered counters, wide doorways, and roll-in showers. Ground was broken in Crystal Ridge in 1987.',
			'images' => array(
				$uploads . '/2026/03/My-presto-pics-and-docs_20240418203325160-e1773601779569.jpg',
			),
		),

		array(
			'period' => 'August 1988',
			'title'  => 'Phase I Opens — A New Beginning',
			'text'   => 'Five duplexes (10 units) welcomed their first residents in August 1988. For many, it was the first time they could live independently in their own community. Rents were kept affordable, and the homes were filled with laughter, independence, and hope. The official opening was a joyful celebration of years of hard work.',
			'images' => array(
				$uploads . '/2026/03/My-presto-pics-and-docs_20240418203732077.jpg',
				$uploads . '/2026/03/My-presto-pics-and-docs_20240801152813460-e1773647504930.jpg',
			),
		),

		array(
			'period' => '1989–1993',
			'title'  => 'Growing Stronger Together',
			'text'   => 'The early years focused on stability and community. Fundraising raffles, small donations, and volunteer hours kept everything running smoothly. Residents thrived, and word spread that Grande Prairie now offered something truly special.',
			'images' => array(
				$uploads . '/2026/03/My-presto-pics-and-docs_20240801152813460-e1773647504930.jpg',
			),
		),

		array(
			'period' => '1994',
			'title'  => 'Phase II — The Six-Plex (Later Expanded to 7 Units)',
			'text'   => 'Demand continued to grow, so the society built a six-unit apartment building right next door. With the generous support of the Wild Rose Foundation, these new homes featured automatic doors, shared laundry, and even a built-in vacuum system — thoughtful touches that made daily life easier. Over time, as needs evolved, the building was thoughtfully expanded to include a seventh unit, providing even more space for residents seeking affordable, accessible living. This adaptation, reflected in later maintenance agreements, shows GPRS\'s commitment to flexibility and growth.',
			'images' => array(
				$uploads . '/2026/03/My-presto-pics-and-docs_20240801153051252-e1773607986706.jpg',
				$uploads . '/2026/03/2b866c20-b1a1-4357-ad9e-ca2ba09129fd.jpg',
				$uploads . '/2026/03/My-presto-pics-and-docs_20240418204056725-e1773607745572.jpg',
			),
		),

		array(
			'period' => '2001–2004',
			'title'  => 'A Bold New Vision Takes Shape',
			'text'   => 'The society dreamed even bigger. With strong support from the City of Grande Prairie and the province, plans moved forward for a 70-unit apartment building. In 2003–2004, major funding was secured, and the project was named Margaret Edgson Manor in honour of a remarkable local advocate for accessible transportation and housing.',
			'images' => array(
				$uploads . '/2025/12/IMG_1299-scaled-e1764910506741.jpg',
			),
		),

		array(
			'period' => '2005',
			'title'  => 'Margaret Edgson Manor Opens',
			'text'   => 'In 2005, the doors opened to 70 beautiful two-bedroom homes — 16 of them fully wheelchair accessible. The building quickly became a cornerstone of the community, offering dignity, independence, and a true sense of belonging.',
			'images' => array(
				$uploads . '/2025/11/mem-3-e1763785598927.jpg',
			),
		),

		array(
			'period' => '2006–2012',
			'title'  => 'Celebrating 25 Years of Impact',
			'text'   => 'By 2011, the society marked its 25th anniversary with a warm gathering at Margaret Edgson Manor. Rose Pike Park was dedicated in honour of one of the original tenants and founding members. The society had grown from 10 units to 87 — a testament to the power of community and perseverance.',
			'images' => array(
				$uploads . '/2025/12/mem-plaque-donors-e1765524445416.jpg',
			),
		),

		array(
			'period' => '2013–2025',
			'title'  => 'Steady Care and Quiet Strength',
			'text'   => 'For over a decade the society quietly cared for its homes and residents while planning for the future. Volunteers continued the tradition of compassion, and the waitlist grew as more people discovered the welcoming environment GPRS had created. In 2023 the society received funding to help with anything big the properties needed and with that some upgrades were made, repairs done, and new paint and in the case of the 7-plex some new siding.',
			'images' => array(
				$uploads . '/2025/12/IMG_0991-2-scaled.jpg',
				$uploads . '/2025/12/IMG_0985-scaled-e1764954103742.jpg',
				$uploads . '/2025/11/IMG_1312-scaled-e1765779314596.jpg',
				$uploads . '/2025/11/9609-1-e1765598343648.jpg',
				$uploads . '/2025/12/IMG_1282-scaled.jpg',
			),
		),

		array(
			'period' => 'June 9, 2025',
			'title'  => 'The Fire at Margaret Edgson Manor',
			'text'   => 'Early on June 9, a fire broke out on the fourth floor. Thanks to the swift action of first responders, everyone was safely evacuated with no loss of life. The community immediately wrapped its arms around the displaced residents with food, clothing, and emotional support.',
			'images' => array(
				$uploads . '/2025/12/IMG_2287-scaled.jpg',
			),
		),

		array(
			'period' => 'July–Dec 2025',
			'title'  => 'Recovery and Determination',
			'text'   => 'Residents worked with certified contractors to safely remove belongings while the society coordinated with insurers and engineers. Demolition of damaged areas began, and a new roof was installed to protect the structure through winter. The GPRS board, still made up of dedicated volunteers, focused on supporting every resident and planning the rebuild.',
			'images' => array(
				$uploads . '/2025/11/Capture8.jpg',
			),
		),

		array(
			'period' => 'Jan–Mar 2026',
			'title'  => 'Winter Pause and Spring Hope',
			'text'   => 'The building now rests safely under its new roof while the team prepares for the next phase. Full interior restoration is scheduled to begin once spring inspections are complete. The entire community continues to rally with donations, volunteer hours, and encouragement.',
			'images' => array(
				$uploads . '/2026/03/DJI_20260110143024_0071_D-scaled.jpg',
			),
		),

	);

	?>

	<div class="timeline-page">

		<!-- ════════════════════════════════════════════════════════════════
		     INTRO
		     ════════════════════════════════════════════════════════════════ -->
		<section class="timeline-intro" aria-label="Timeline introduction">
			<h2 class="timeline-intro__heading">Historical Timeline</h2>
			<p class="timeline-intro__sub">40 years of building homes, community, and hope in Grande Prairie</p>
			<p class="timeline-intro__hint">Select any milestone to explore its history</p>
		</section>


		<!-- ════════════════════════════════════════════════════════════════
		     TIMELINE
		     ════════════════════════════════════════════════════════════════ -->
		<section class="gprs-timeline" aria-label="GPRS History Timeline" role="region">

			<div class="gprs-tl-track" role="list">

				<?php foreach ( $entries as $i => $e ) :
					$side       = ( $i % 2 === 0 ) ? 'left' : 'right';
					$img_count  = count( $e['images'] );
					$has_multi  = $img_count > 1;
					$entry_id   = 'gprs-tl-' . $i;
				?>
				<article
					class="gprs-tl-entry gprs-tl-entry--<?php echo $side; ?>"
					role="listitem"
					id="<?php echo esc_attr( $entry_id ); ?>"
				>
					<div class="gprs-tl-dot" aria-hidden="true">
						<span class="gprs-tl-dot-ring"></span>
					</div>

					<button
						class="gprs-tl-card"
						type="button"
						aria-haspopup="dialog"
						aria-label="View details: <?php echo esc_attr( $e['period'] . ' — ' . $e['title'] ); ?>"
						data-tl-entry="<?php echo $i; ?>"
						data-tl-period="<?php echo esc_attr( $e['period'] ); ?>"
						data-tl-title="<?php echo esc_attr( $e['title'] ); ?>"
						data-tl-text="<?php echo esc_attr( $e['text'] ); ?>"
						data-tl-images='<?php echo wp_json_encode( $e['images'] ); ?>'
					>
						<div class="gprs-tl-thumb">
							<img
								src="<?php echo esc_url( $e['images'][0] ); ?>"
								alt=""
								loading="lazy"
								decoding="async"
							/>
							<?php if ( $has_multi ) : ?>
							<span class="gprs-tl-badge" aria-hidden="true">
								<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 15l5-5 4 4 4-6 5 7"/></svg>
								<?php echo $img_count; ?>
							</span>
							<?php endif; ?>
						</div>

						<div class="gprs-tl-card-body">
							<time class="gprs-tl-period"><?php echo esc_html( $e['period'] ); ?></time>
							<h3 class="gprs-tl-title"><?php echo esc_html( $e['title'] ); ?></h3>
							<p class="gprs-tl-excerpt"><?php echo esc_html( mb_strimwidth( $e['text'], 0, 120, '…' ) ); ?></p>
							<span class="gprs-tl-read-more" aria-hidden="true">
								Explore
								<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
							</span>
						</div>
					</button>
				</article>
				<?php endforeach; ?>

			</div><!-- .gprs-tl-track -->

		</section><!-- .gprs-timeline -->


		<!-- ════════════════════════════════════════════════════════════════
		     LIGHTBOX / SLIDESHOW
		     ════════════════════════════════════════════════════════════════ -->
		<div
			class="gprs-tl-lightbox"
			id="gprs-tl-lightbox"
			role="dialog"
			aria-modal="true"
			aria-label="Timeline viewer"
			hidden
		>
			<div class="gprs-tl-lb-backdrop"></div>

			<div class="gprs-tl-lb-bg-blur" aria-hidden="true"></div>

			<div class="gprs-tl-lb-container">

				<button class="gprs-tl-lb-close" type="button" aria-label="Close viewer">
					<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 6 6 18M6 6l12 12"/></svg>
				</button>

				<div class="gprs-tl-lb-stage">
					<button class="gprs-tl-lb-arrow gprs-tl-lb-prev" type="button" aria-label="Previous image" hidden>
						<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M15 18l-6-6 6-6"/></svg>
					</button>

					<div class="gprs-tl-lb-image-wrap">
						<img class="gprs-tl-lb-image" src="" alt="" />
					</div>

					<button class="gprs-tl-lb-arrow gprs-tl-lb-next" type="button" aria-label="Next image" hidden>
						<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M9 18l6-6-6-6"/></svg>
					</button>
				</div>

				<div class="gprs-tl-lb-dots" role="tablist" aria-label="Image navigation"></div>

				<div class="gprs-tl-lb-caption">
					<time class="gprs-tl-lb-period"></time>
					<h3 class="gprs-tl-lb-title"></h3>
					<p class="gprs-tl-lb-text"></p>
					<span class="gprs-tl-lb-counter"></span>
				</div>

				<div class="gprs-tl-lb-entry-nav">
					<button class="gprs-tl-lb-entry-prev" type="button" aria-label="Previous milestone">
						<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M15 18l-6-6 6-6"/></svg>
						<span>Previous</span>
					</button>
					<button class="gprs-tl-lb-entry-next" type="button" aria-label="Next milestone">
						<span>Next</span>
						<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M9 18l6-6-6-6"/></svg>
					</button>
				</div>

			</div><!-- .gprs-tl-lb-container -->
		</div><!-- .gprs-tl-lightbox -->

	</div><!-- .timeline-page -->

	<?php
}
