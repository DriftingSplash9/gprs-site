<?php
/**
 * Homepage Content
 *
 * Self-hooking include — outputs all below-hero content for the front page.
 * Replaces the old homepage-cards.php.
 * Loaded via require_once in functions.php.
 * Hero + H1 handled separately by inc/hero.php.
 * Newsletter signup auto-appended by gprs_append_newsletter_to_pages().
 *
 * Sections:
 *   1. Welcome / intro
 *   2. Partner logo strip
 *   3. Quick-link card grid (4 cards)
 *   4. Margaret Edgson Manor rebuild banner
 *
 * @package Astra Child – GPRS
 * @since   2026-03-30
 * Updated: 2026-03-30 — Fixed partner logo filenames to match actual
 *   uploaded files. Added Government of Canada. Commented out AISH
 *   and FCSS (no logo files uploaded yet).
 */

/* ────────────────────────────────────────────────────────────
   HOOK: astra_primary_content_top — runs inside main content
   area, before any WP editor content (which should be empty
   on the front page once Elementor content is cleared).
   ──────────────────────────────────────────────────────────── */
add_action( 'astra_primary_content_top', 'gprs_render_homepage_content', 10 );

function gprs_render_homepage_content() {

	if ( ! is_front_page() ) {
		return;
	}

	$uploads = wp_get_upload_dir()['baseurl'];
	$home    = home_url( '/' );
	?>

	<div class="homepage-content">

		<!-- ════════════════════════════════════════════════════════════════
		     SECTION 1 — WELCOME / INTRO
		     ════════════════════════════════════════════════════════════════ -->
		<section class="hp-intro" aria-label="About GPRS">
			<h2 class="hp-intro__heading">Welcome to GPRS</h2>
			<p class="hp-intro__text">The Grande Prairie Residential Society is a volunteer-run nonprofit that has been building and operating barrier-free housing since 1986. From the original Crystal Ridge duplexes to Margaret Edgson Manor, our 87&nbsp;units empower independence for adults with physical disabilities right here in Grande Prairie, Alberta.</p>
			<p class="hp-intro__text">After the June&nbsp;2025 fire at Margaret Edgson Manor, we&rsquo;re actively rebuilding to restore and expand these vital homes. Whether you&rsquo;re seeking accessible housing, interested in volunteering, or looking to support our efforts, we&rsquo;re here to help.</p>
		</section>


		<!-- ════════════════════════════════════════════════════════════════
		     SECTION 2 — PARTNER LOGO STRIP
		     ════════════════════════════════════════════════════════════════
		     Logos uploaded to: /wp-content/uploads/logos/
		     Filenames match server files as of 2026-03-30.
		     To add AISH or FCSS: upload the logo PNG to /logos/
		     and uncomment the corresponding block below.
		     ════════════════════════════════════════════════════════════════ -->
		<section class="hp-partners" aria-label="Our partners and funders">
			<p class="hp-partners__label">In Co-Operation With:</p>
			<div class="hp-partners__strip">

				<a href="https://www.grandespirit.org/" class="hp-partners__logo" target="_blank" rel="noopener noreferrer">
					<img src="<?php echo esc_url( $uploads . '/logos/grande-spirit-foundation-logo.png' ); ?>"
						 alt="Grande Spirit Foundation"
						 loading="lazy"
						 decoding="async"
						 width="160" height="60">
				</a>

				<a href="https://www.cityofgp.com/" class="hp-partners__logo" target="_blank" rel="noopener noreferrer">
					<img src="<?php echo esc_url( $uploads . '/logos/city-of-grande-prairie-logo.png' ); ?>"
						 alt="City of Grande Prairie"
						 loading="lazy"
						 decoding="async"
						 width="160" height="60">
				</a>

				<a href="https://www.alberta.ca/" class="hp-partners__logo" target="_blank" rel="noopener noreferrer">
					<img src="<?php echo esc_url( $uploads . '/logos/Province-Of-Alberta-Logo.png' ); ?>"
						 alt="Government of Alberta"
						 loading="lazy"
						 decoding="async"
						 width="160" height="60">
				</a>

				<a href="https://www.canada.ca/" class="hp-partners__logo" target="_blank" rel="noopener noreferrer">
					<img src="<?php echo esc_url( $uploads . '/logos/government-of-canada-logo.png' ); ?>"
						 alt="Government of Canada"
						 loading="lazy"
						 decoding="async"
						 width="160" height="60">
				</a>

				<a href="https://www.cmhc-schl.gc.ca/" class="hp-partners__logo" target="_blank" rel="noopener noreferrer">
					<img src="<?php echo esc_url( $uploads . '/logos/cmhc-logo.png' ); ?>"
						 alt="CMHC — Canada Mortgage and Housing Corporation"
						 loading="lazy"
						 decoding="async"
						 width="160" height="60">
				</a>

				<?php
				/*
				 * AISH logo — uncomment when aish-logo.png is uploaded to /logos/
				 *
				<a href="https://www.alberta.ca/aish" class="hp-partners__logo" target="_blank" rel="noopener noreferrer">
					<img src="<?php echo esc_url( $uploads . '/logos/aish-logo.png' ); ?>"
						 alt="AISH — Assured Income for the Severely Handicapped"
						 loading="lazy"
						 decoding="async"
						 width="160" height="60">
				</a>
				 */
				?>

				<?php
				/*
				 * FCSS logo — uncomment when fcss-logo.png is uploaded to /logos/
				 *
				<a href="https://www.cityofgp.com/residents/community-social-development/family-community-support-services-fcss" class="hp-partners__logo" target="_blank" rel="noopener noreferrer">
					<img src="<?php echo esc_url( $uploads . '/logos/fcss-logo.png' ); ?>"
						 alt="FCSS — Family &amp; Community Support Services"
						 loading="lazy"
						 decoding="async"
						 width="160" height="60">
				</a>
				 */
				?>

			</div>
		</section>


		<!-- ════════════════════════════════════════════════════════════════
		     SECTION 3 — QUICK-LINK CARD GRID
		     ════════════════════════════════════════════════════════════════ -->
		<section class="hp-cards" aria-label="Quick links">
			<div class="hp-cards__grid">

				<!-- Card 1 — Our Housing -->
				<a href="<?php echo esc_url( $home . 'accessible-housing/' ); ?>" class="hp-card">
					<span class="hp-card__icon" aria-hidden="true">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" width="32" height="32"><path d="M3 9.5L12 3l9 6.5V20a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1z"/><polyline points="9 21 9 14 15 14 15 21"/></svg>
					</span>
					<h3 class="hp-card__title">Our Housing</h3>
					<p class="hp-card__desc">87&nbsp;accessible and affordable units across three phases&nbsp;&mdash; from the pioneering 1987 duplexes to Margaret Edgson Manor.</p>
					<span class="hp-card__cta">Explore our housing &rarr;</span>
				</a>

				<!-- Card 2 — Apply for Housing -->
				<a href="<?php echo esc_url( $home . 'apply/' ); ?>" class="hp-card">
					<span class="hp-card__icon" aria-hidden="true">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" width="32" height="32"><rect x="5" y="2" width="14" height="20" rx="2"/><line x1="9" y1="7" x2="15" y2="7"/><line x1="9" y1="11" x2="15" y2="11"/><line x1="9" y1="15" x2="12" y2="15"/></svg>
					</span>
					<h3 class="hp-card__title">Apply for Housing</h3>
					<p class="hp-card__desc">Barrier-free and affordable housing for people with physical disabilities. Step-by-step application process.</p>
					<span class="hp-card__cta">Start your application &rarr;</span>
				</a>

				<!-- Card 3 — Volunteer -->
				<a href="<?php echo esc_url( $home . 'volunteer/' ); ?>" class="hp-card">
					<span class="hp-card__icon" aria-hidden="true">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" width="32" height="32"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
					</span>
					<h3 class="hp-card__title">Volunteer With Us</h3>
					<p class="hp-card__desc">GPRS was built by volunteers and still runs on their dedication. Join a committee, become a Society member, or help with outreach.</p>
					<span class="hp-card__cta">Get involved &rarr;</span>
				</a>

				<!-- Card 4 — Support the Rebuild -->
				<a href="<?php echo esc_url( $home . 'donate/' ); ?>" class="hp-card">
					<span class="hp-card__icon" aria-hidden="true">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" width="32" height="32"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 1 0-7.78 7.78L12 21.23l8.84-8.84a5.5 5.5 0 0 0 0-7.78z"/></svg>
					</span>
					<h3 class="hp-card__title">Support the Rebuild</h3>
					<p class="hp-card__desc">After the June&nbsp;2025 fire at Margaret Edgson Manor, every contribution helps restore accessible homes for our community.</p>
					<span class="hp-card__cta">Donate now &rarr;</span>
				</a>

			</div>
		</section>


		<!-- ════════════════════════════════════════════════════════════════
		     SECTION 4 — MARGARET EDGSON MANOR REBUILD BANNER
		     ════════════════════════════════════════════════════════════════ -->
		<section class="hp-rebuild" aria-label="Rebuild update">
			<div class="hp-rebuild__inner">

				<div class="hp-rebuild__image">
					<img src="<?php echo esc_url( $uploads . '/2026/03/DJI_20260110142815_0055_D-Copy-scaled.jpg' ); ?>"
						 alt="Aerial view of Margaret Edgson Manor under reconstruction, winter 2026"
						 loading="lazy"
						 decoding="async"
						 width="800" height="450">
				</div>

				<div class="hp-rebuild__text">
					<h2 class="hp-rebuild__heading">Margaret Edgson Manor Rebuild Update</h2>
					<p>Selective demolition is complete. The new roof is finished and construction continues to updated building codes&nbsp;&mdash; fourth-floor framing is now underway. The GPRS Board proudly supports local by working with Terrace Construction toward a safe, lasting rebuild.</p>
					<a href="<?php echo esc_url( $home . 'margaret-edgson-manor-rebuild-efforts/' ); ?>" class="btn btn-primary">Read the full update &rarr;</a>
				</div>

			</div>
		</section>

	</div><!-- .homepage-content -->

	<?php
}
