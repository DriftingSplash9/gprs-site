<?php
/**
 * Dynamic Hero (Conditional)
 * Originally: WPCode snippet
 */

/* ============================================================
   HTML - Dynamic Hero (Conditional)
   ============================================================
   Purpose:  Outputs the correct hero per page
   Depends:  02-header-nav-hero.css (hero CSS classes)
   Updated:  2026-03-30
   Changes:  - Homepage hero title now wrapped in .hero-title-box
               (glassmorphic container) for visual consistency.
             - All hardcoded staging URLs replaced with
               home_url() or wp_upload_dir() calls so this
               works on ANY domain without editing.
             - Added is_404() bail-out so the custom 404
               content snippet handles its own hero.
             - Added slug-based fallbacks for all page ID
               conditions so heroes survive page recreation.
             - Added fetchpriority="high" to hero images for
               improved LCP.
   ============================================================ */

// Get current page ID
$page_id = get_the_ID();
if ( is_404() ) { return; }
// Uploads base URL (resolves to current domain automatically)
$uploads = wp_get_upload_dir()['baseurl'];

/*
PAGE RULES
--------------------------------
Home            → 100vh (desktop)
Fire Rebuild    → 70vh  (desktop)
Accessibility   → NO HERO
Privacy         → NO HERO
All others      → 62vh
*/

// ===============================
// NO HERO PAGES
// Page IDs: 156 (accessibility), 2004 (privacy), 2538 (faq)
// Slug fallbacks in case pages are recreated
// ===============================
if (
	in_array($page_id, [156, 2004, 2538])
	|| is_page('accessibility')
	|| is_page('privacy')
	|| is_page('faq')
) {
	return;
}

// ===============================
// VOLUNTEER PAGE (62vh)
// Page ID 1427 — slug fallback: 'volunteer'
// ===============================
if ($page_id == 1427 || is_page('volunteer')):
?>
<section class="hero hero--volunteer hero--soft" id="content">
	<img class="gprs-img-hero"
	     src="<?php echo esc_url($uploads); ?>/2025/11/pexels-photo-5029919-5029919-scaled-e1766013935470.jpg"
	     alt="Volunteers working together to support accessible housing"
	     loading="eager"
	     fetchpriority="high"
	     decoding="async">

	<div class="hero-content hero-content--centered">
		<div class="hero-stack">
			<div class="hero-heading-group">
				<h1 class="hero-title">Volunteer With Us</h1>
				<p class="hero-mission">
					Community-built housing begins with community action.
				</p>
			</div>
			<div class="hero-buttons">
				<a href="<?php echo esc_url(home_url('/donate/')); ?>" class="btn btn-primary">Donate</a>
			</div>
		</div>
	</div>
</section>

<?php
// ===============================
// STORY PAGE (62vh)
// Page ID 1429 — slug fallback: 'our-story'
// ===============================
elseif ($page_id == 1429 || is_page('our-story')):
?>
<section class="hero hero--story" id="content">
	<img class="hero-bg-img"
	     src="<?php echo esc_url($uploads); ?>/2025/12/IMG_0988-scaled-e1764954260474.jpg"
	     alt="Accessible housing homes in Grande Prairie under an open sky"
	     loading="eager"
	     fetchpriority="high"
	     decoding="async">

	<div class="hero-content">
		<div class="hero-stack">
			<div class="hero-title-box">
				<h1 class="hero-title">Our Story</h1>
			</div>

			<p class="hero-mission">
				A community response to the need for safe, affordable, and accessible housing.
			</p>

			<div class="hero-buttons">
				<a href="#origins" class="btn btn-primary">How It Began</a>
				<a href="#today" class="btn btn-outline">Where We Are Now</a>
			</div>
			
		</div>
	</div>
</section>

<?php
// ===============================
// DONATION PAGE (62vh)
// Page ID 2418 — slug fallback: 'donate'
// ===============================
elseif ($page_id == 2418 || is_page('donate')):
?>
<section class="hero hero--donate" id="content">
	<img class="gprs-img-hero"
	     src="<?php echo esc_url($uploads); ?>/2026/01/mem-cleaned-up.png"
	     alt="Margaret Edgson Manor under construction during winter"
	     loading="eager"
	     fetchpriority="high"
	     decoding="async">

	<div class="hero-content hero-content--centered">
		<div class="hero-stack">
			<div class="hero-title-box">
				<h1 class="hero-title">
					Help Build Accessible Homes That Last
				</h1>
			</div>
			<div class="hero-buttons">
				<a href="<?php echo esc_url(home_url('/volunteer/')); ?>" class="btn btn-primary">Volunteer</a>
			</div>
			<p class="hero-quote">
				&#x201C;No one has ever become poor by giving.&#x201D;
— Anne Frank
			</p>
		</div>
	</div>
</section>

<?php
// ===============================
// FIRE REBUILD PAGE (70vh desktop)
// Slug: 'margaret-edgson-manor-rebuild-efforts'
// ===============================
elseif (is_page('margaret-edgson-manor-rebuild-efforts')):
?>
<section class="hero hero--fire-rebuild" id="content">
	<img class="gprs-img-hero"
	     src="<?php echo esc_url($uploads); ?>/2026/03/DJI_20260110142827_0056_D-scaled-e1774515617787.jpg"
	     alt="Aerial view of Margaret Edgson Manor under reconstruction, winter 2026"
	     loading="eager"
	     fetchpriority="high"
	     decoding="async">

	<div class="hero-content hero-content--centered">
		<div class="hero-stack">
			<div class="hero-title-box">
				<h1 class="hero-title">
					Rebuilding Margaret Edgson Manor
				</h1>
			</div>

			<p class="hero-mission">
				Restoring 70 accessible, affordable homes &mdash; stronger than before.
			</p>

			<div class="hero-buttons">
				<a href="<?php echo esc_url(home_url('/donate/')); ?>" class="btn btn-primary">Donate</a>
				<a href="<?php echo esc_url(home_url('/volunteer/')); ?>" class="btn btn-outline">Volunteer</a>
			</div>

			<!-- ════════════════════════════════════════════
			     QUOTE — PLACEHOLDER
			     Replace the text below with the Canadian
			     quote once confirmed. Delete this comment
			     block when done.
			     ════════════════════════════════════════════ -->
			<p class="hero-quote">
				&#x201C;You can shed the past. You cannot shake it. But you certainly get new skin. You can grow and become stronger.&#x201D;
				&mdash; Lesra Martin, Canadian lawyer and advocate
			</p>
		</div>
	</div>
</section>

<?php
// ===============================
// HOMEPAGE ONLY (100vh)
// ===============================
elseif ($page_id == get_option('page_on_front')):
?>
<!-- ════ HOMEPAGE HERO (100vh) ════ -->
<section class="hero hero--home" aria-label="Homepage hero">
 
	<div class="hero-bg">
		<img class="hero-bg-img"
			 src="<?php echo esc_url( $uploads . '/2026/03/IMG_4052-e1774514929158.jpg' ); ?>"
			 alt="Accessible housing complex in Grande Prairie, Alberta — barrier-free homes surrounded by open prairie landscape"
			 width="1920"
			 height="1080"
			 fetchpriority="high"
			 decoding="async">
	</div>
 
	<div class="hero-overlay"></div>
 
	<div class="hero-content hero-content--wide">
		<div class="hero-title-box hero-title-box--wide">
			<h1 class="hero-title hero-title--wide">Accessible &amp; Affordable Housing in Grande&nbsp;Prairie</h1>
		</div>
		<p class="hero-mission">Since 1986, the Grande Prairie Residential Society has provided safe, barrier-free homes for adults with physical disabilities.</p>
 
		<div class="hero-buttons">
			<a href="<?php echo esc_url( home_url( '/apply/' ) ); ?>" class="btn btn-primary">Apply Now</a>
			<a href="<?php echo esc_url( home_url( '/volunteer/' ) ); ?>" class="btn btn-outline">Volunteer</a>
		</div>
 
		<p class="hero-quote">
			&ldquo;Having a home of your own gives you a piece of independence.&rdquo;
			<strong>&mdash; Travis McNally</strong> <span class="hero-quote-year">(2004)</span>
		</p>
	</div>
 
</section>
<?php

// ===============================
// ACCESSIBLE HOUSING PAGE (62vh)
// Page ID 182 — slug fallback: 'accessible-housing'
// ===============================
elseif ($page_id == 182 || is_page('accessible-housing')):
?>
<section class="hero hero--housing" id="content">
	<img class="gprs-img-hero"
	     src="<?php echo esc_url($uploads); ?>/2025/12/IMG_0991-1-scaled-e1774807371865.jpg"
	     alt="Accessible duplex housing in Grande Prairie's Crystal Ridge neighbourhood with covered entrance and paved driveway"
	     loading="eager"
	     fetchpriority="high"
	     decoding="async">

	<div class="hero-content hero-content--centered">
		<div class="hero-stack">
			<div class="hero-title-box">
				<h1 class="hero-title">
					<?php echo esc_html(get_the_title()); ?>
				</h1>
			</div>

			<p class="hero-mission">
				87 barrier-free and affordable units &mdash; built by volunteers, designed for independence.
			</p>

			<div class="hero-buttons">
				<a href="<?php echo esc_url(home_url('/apply/')); ?>" class="btn btn-primary">Apply for Housing</a>
				<a href="<?php echo esc_url(home_url('/donate/')); ?>" class="btn btn-outline">Support the Rebuild</a>
			</div>

			<p class="hero-quote">
				&#x201C;It&#x2019;s somewhere you can be independent, but there is support staff when you need it.&#x201D;
				&mdash; <strong>Rose Pike</strong>, founding member (1984)
			</p>
		</div>
	</div>
</section>

<?php
// ===============================
// APPLY PAGE (62vh)
// Page ID 1300 — slug fallback: 'apply'
// ===============================
elseif ($page_id == 1300 || is_page('apply')):
?>
<section class="hero hero--apply" id="content">
    <img class="gprs-img-hero"
         src="<?php echo esc_url($uploads); ?>/2025/12/IMG_2284-scaled-e1774848390458.jpg"
         alt="Accessible duplex housing in Grande Prairie with covered entrance and landscaped grounds"
         loading="eager"
         fetchpriority="high"
         decoding="async">
 
    <div class="hero-content hero-content--centered">
        <div class="hero-stack">
            <div class="hero-title-box">
                <h1 class="hero-title">
                    <?php echo esc_html(get_the_title()); ?>
                </h1>
            </div>
 
            <p class="hero-mission">
                Safe, affordable, barrier-free homes &mdash; designed for independence.
            </p>
 
            <div class="hero-buttons">
                <a href="#form-heading" class="btn btn-primary">Download Application</a>
                <a href="<?php echo esc_url(home_url('/accessible-housing/')); ?>" class="btn btn-outline">View Our Housing</a>
            </div>
 
            <p class="hero-quote">
                &#x201C;It&#x2019;s somewhere you can be independent, but there is support staff when you need it.&#x201D;
                &mdash; <strong>Rose Pike</strong>, founding member (1984)
            </p>
        </div>
    </div>
</section>

<?php
// ===============================
// MARGARET EDGSON MANOR PAGE (62vh)
// Page ID 1433 — slug fallback: 'margaret-edgson-manor'
// ===============================
elseif ($page_id == 1433 || is_page('margaret-edgson-manor')):
?>
<section class="hero hero--mem" id="content">
    <img class="gprs-img-hero"
         src="<?php echo esc_url($uploads); ?>/2025/12/IMG_1308-scaled-e1764904732232.jpg"
         alt="Margaret Edgson Manor four-storey apartment building entrance with covered portico"
         loading="eager"
         fetchpriority="high"
         decoding="async">

    <div class="hero-content hero-content--centered">
        <div class="hero-stack">
            <div class="hero-title-box" style="max-width: 1200px;">
                <h1 class="hero-title">
                    <?php echo esc_html(get_the_title()); ?>
                </h1>
            </div>

            <p class="hero-mission">
                70 accessible and affordable homes &mdash; built by community, named for an advocate.
            </p>

            <div class="hero-buttons">
                <a href="<?php echo esc_url(home_url('/apply/')); ?>" class="btn btn-primary">Apply for Housing</a>
                <a href="<?php echo esc_url(home_url('/donate/')); ?>" class="btn btn-outline">Support the Rebuild</a>
            </div>

            <p class="hero-quote">
                &#x201C;This really is More than a Dream Come True.&#x201D;
                &mdash; <strong>Dale Williams</strong>, grand-opening speech (2005)
            </p>
        </div>
    </div>
</section>

<?php
// ===============================
// DEFAULT HERO (62vh)
// ===============================
// DEFAULT HERO (62vh)
// Housing 182 | Apply 1300 | News 1431 | MEM 1433 | Contact 387
// ===============================
else:
?>
<section class="hero hero--default" id="content">
	<img class="gprs-img-hero"
	     src="<?php echo esc_url($uploads); ?>/2025/12/IMG_0983-scaled-e1764562777634.jpg"
	     alt=""
	     loading="eager"
	     fetchpriority="high"
	     decoding="async">

	<div class="hero-content">
		<div class="hero-stack">
			<div class="hero-title-box">
				<h1 class="hero-title">
					<?php echo esc_html(get_the_title()); ?>
				</h1>
			</div>
			<p class="hero-mission">
				Our Mission: &#x201C;To provide affordable and accessible housing for the physically disabled&#x201D;.
			</p>

			<div class="hero-buttons">
				<a href="<?php echo esc_url(home_url('/apply/')); ?>" class="btn btn-primary">Apply Now</a>
				<a href="<?php echo esc_url(home_url('/volunteer/')); ?>" class="btn btn-outline">Volunteer</a>
			</div>
			<p class="hero-quote">
				"It's somewhere you can be independent, but there is support staff when you need it." (1984)
			<strong>— Rose Pike</strong> (founding member)
			</p>
		</div>
	</div>
</section>

<?php endif; ?>
