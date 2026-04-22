<?php
/**
 * Donate Page Content
 *
 * Self-hooking include — outputs all content for /donate/.
 * Loaded via require_once in functions.php.
 * Hero + H1 handled separately by inc/hero.php.
 * Newsletter signup auto-appended by gprs_append_newsletter_to_pages().
 *
 * Audit fixes applied:
 *   - Wrong mailto (ed@seniorsoutreachgp.com) → gpresidentialsociety@gmail.com
 *   - Broken URL (gpresidentialsociety.comcontact) → home_url('/contact/')
 *   - Stock "Donate" image removed → real GPRS photos only
 *   - AI-filler text replaced with real GPRS content
 *
 * @package Astra Child – GPRS
 */

add_action( 'astra_primary_content_top', 'gprs_render_donate_content', 10 );

function gprs_render_donate_content() {

    if ( ! is_page( 'donate' ) ) {
        return;
    }

    $uploads = wp_get_upload_dir()['baseurl'];
    $home    = home_url( '/' );
    ?>

    <div class="donate-page">

        <!-- ════════════════════════════════════════════════════════════════
             INTRO — THE STORY
             ════════════════════════════════════════════════════════════════ -->
        <section class="donate-intro" aria-label="Why your donation matters">
            <h2 class="donate-heading">Why Your Support Matters</h2>
            <p class="donate-text--large">On June 9, 2025, fire severely damaged Margaret Edgson Manor — 70 units of accessible and affordable housing that took nearly 20 years to build. Thanks to first responders, no lives were lost. But more than 70 residents were displaced from the homes that gave them independence.</p>
            <p>The GPRS board — entirely volunteer, no paid staff — chose to rebuild. Construction is underway to 2023 National Building Code standards with improved safety features, better insulation, and fully restored accessible units. Your donation goes directly to this rebuild.</p>
        </section>


        <!-- ════════════════════════════════════════════════════════════════
             IMPACT STRIP
             ════════════════════════════════════════════════════════════════ -->
        <section class="donate-impact" aria-labelledby="impact-heading">
            <h2 id="impact-heading" class="donate-heading">Every Dollar Builds</h2>
            <div class="donate-impact__grid">
                <div class="donate-impact__card">
                    <div class="donate-impact__icon" aria-hidden="true">
                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none"><path d="M8 32V16l12-8 12 8v16" stroke="currentColor" stroke-width="2.5" fill="none" stroke-linecap="round" stroke-linejoin="round"/><rect x="15" y="22" width="10" height="10" stroke="currentColor" stroke-width="2" fill="none"/></svg>
                    </div>
                    <h3>Rebuild Construction</h3>
                    <p>Higher trusses, full mechanical and electrical upgrades, and fixes for previously hidden water damage — built right this time.</p>
                </div>
                <div class="donate-impact__card">
                    <div class="donate-impact__icon" aria-hidden="true">
                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none"><circle cx="20" cy="12" r="5" stroke="currentColor" stroke-width="2.5" fill="none"/><path d="M12 36V28a8 8 0 0 1 16 0v8" stroke="currentColor" stroke-width="2.5" fill="none" stroke-linecap="round"/><circle cx="20" cy="32" r="5" stroke="currentColor" stroke-width="2" fill="none"/><line x1="16" y1="32" x2="24" y2="32" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
                    </div>
                    <h3>Accessible Design</h3>
                    <p>Zero-threshold entries, roll-in showers, automatic doors, wheelchair-accessible kitchens — the details that make independence real.</p>
                </div>
                <div class="donate-impact__card">
                    <div class="donate-impact__icon" aria-hidden="true">
                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none"><circle cx="20" cy="20" r="12" stroke="currentColor" stroke-width="2.5" fill="none"/><path d="M20 14v8l5 3" stroke="currentColor" stroke-width="2.5" fill="none" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </div>
                    <h3>Long-Term Stability</h3>
                    <p>Margaret Edgson Manor operates sustainably with no government funding. Your gift helps keep rents affordable for decades to come.</p>
                </div>
            </div>
        </section>


        <!-- ════════════════════════════════════════════════════════════════
             REBUILD PHOTOS + QUOTE
             ════════════════════════════════════════════════════════════════ -->
        <section class="donate-rebuild" aria-labelledby="rebuild-heading">
            <h2 id="rebuild-heading" class="donate-heading">The Rebuild — In Progress</h2>
            <div class="donate-rebuild__layout">
                <div class="donate-rebuild__images">
                    <figure class="donate-rebuild__figure">
                        <img
                            src="<?php echo esc_url( $uploads . '/2026/03/DJI_20260110143024_0071_D-scaled.jpg' ); ?>"
                            alt="Aerial view of Margaret Edgson Manor under construction — gabled roof with exposed trusses, multi-level framing, red protective wrapping, winter 2026"
                            class="donate-rebuild__img"
                            loading="lazy"
                            width="800"
                            height="533"
                        />
                    </figure>
                    <figure class="donate-rebuild__figure">
                        <img
                            src="<?php echo esc_url( $uploads . '/2026/01/mem-cleaned-up-e1767454553886.png' ); ?>"
                            alt="Exposed top floor of Margaret Edgson Manor where the roof burned off, partially covered by snow"
                            class="donate-rebuild__img"
                            loading="lazy"
                            width="800"
                            height="533"
                        />
                    </figure>
                </div>
                <div class="donate-rebuild__content">
                    <p>Selective demolition is complete. The building has been stripped to studs, mold mitigated, and the damaged roof removed. The new roof is finished and fourth-floor framing is underway — all to updated 2023 National Building Code standards.</p>
                    <p>GPRS is proud to support local: Terrace Construction, a Grande Prairie company, is leading the rebuild.</p>
                    <blockquote class="donate-quote">
                        <p class="donate-quote__text">"Get a second chance to do it right."</p>
                        <footer class="donate-quote__footer">
                            <cite>— Travis McNally, GPRS Board President</cite>
                        </footer>
                    </blockquote>
                    <a href="<?php echo esc_url( home_url( '/margaret-edgson-manor-rebuild-efforts/' ) ); ?>" class="donate-btn donate-btn--outline">
                        Full Rebuild Update
                        <svg class="donate-btn__arrow" width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M4 10h12m0 0l-4-4m4 4l-4 4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </a>
                </div>
            </div>
        </section>


        <!-- ════════════════════════════════════════════════════════════════
             HOW TO DONATE
             ════════════════════════════════════════════════════════════════ -->
        <section class="donate-methods" aria-labelledby="methods-heading">
            <h2 id="methods-heading" class="donate-heading">Ways to Donate</h2>
            <p class="donate-lead">All donations are directed toward the Margaret Edgson Manor rebuild. Tax receipts are issued through the Grande Spirit Foundation (Registered Charity #102169158RR0001).</p>

            <div class="donate-methods__grid">
                <div class="donate-methods__card">
                    <h3>
                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none" aria-hidden="true"><rect x="3" y="4" width="16" height="14" rx="2" stroke="currentColor" stroke-width="1.5" fill="none"/><line x1="7" y1="9" x2="15" y2="9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/><line x1="7" y1="13" x2="12" y2="13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
                        Cheque by Mail
                    </h3>
                    <p>Make payable to <strong>Grande Prairie Residential Society</strong> with <strong>"GPRS Donation"</strong> in the memo line.</p>
                    <address class="donate-methods__address">
                        <strong>GPRS</strong><br>
                        c/o Grande Spirit Foundation<br>
                        9503 102 Avenue<br>
                        Grande Prairie, AB T8V 7G9
                    </address>
                </div>
            </div>
        </section>


        <!-- ════════════════════════════════════════════════════════════════
             OTHER WAYS TO HELP
             ════════════════════════════════════════════════════════════════ -->
        <section class="donate-other" aria-labelledby="other-heading">
            <h2 id="other-heading" class="donate-heading">Other Ways to Help</h2>
            <div class="donate-other__grid">
                <div class="donate-other__card">
                    <h3>Volunteer</h3>
                    <p>GPRS has been entirely volunteer-run since 1986. Join a committee, help with outreach, or contribute professional skills.</p>
                    <a href="<?php echo esc_url( home_url( '/volunteer/' ) ); ?>" class="donate-btn donate-btn--outline">
                        Volunteer With Us
                        <svg class="donate-btn__arrow" width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M4 10h12m0 0l-4-4m4 4l-4 4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </a>
                </div>
                <div class="donate-other__card">
                    <h3>In-Kind Support</h3>
                    <p>Non-perishable food, clothing, or household essentials can be directed to community partners:</p>
                    <ul class="donate-other__list">
                        <li>Grande Prairie Goodwill Thriftstore — <a href="tel:7804026398">(780) 402-6398</a></li>
                        <li><a href="https://salvationarmygp.ca/" target="_blank" rel="noopener noreferrer">Salvation Army Food Bank</a> — <a href="tel:7805382848">(780) 538-2848</a></li>
                    </ul>
                </div>
                <div class="donate-other__card">
                    <h3>Spread the Word</h3>
                    <p>Share our story. Follow GPRS on <a href="https://www.facebook.com/Gpresidential/" target="_blank" rel="noopener noreferrer">Facebook</a> and tell people about the rebuild. Awareness is free and it matters.</p>
                </div>
            </div>
        </section>


        <!-- ════════════════════════════════════════════════════════════════
             CLOSING QUOTE + CONTACT
             ════════════════════════════════════════════════════════════════ -->
        <section class="donate-closing" aria-label="Closing message">
            <blockquote class="donate-quote donate-quote--hero">
                <p class="donate-quote__text">"Once it's built, people will say it's a good thing."</p>
                <footer class="donate-quote__footer">
                    <cite>— Ethel Oman, founding treasurer (1986)</cite>
                </footer>
            </blockquote>

            <div class="donate-closing__contact">
                <p>Questions about donating? We're here to help.</p>
                <div class="donate-closing__links">
                    <a href="tel:7805323276">(780) 532-3276</a>
                    <a href="mailto:gpresidentialsociety@gmail.com">gpresidentialsociety@gmail.com</a>
                    <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="donate-btn donate-btn--outline">
                        Contact Us
                        <svg class="donate-btn__arrow" width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M4 10h12m0 0l-4-4m4 4l-4 4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </a>
                </div>
            </div>
        </section>

    </div><!-- /.donate-page -->

    <?php
}
