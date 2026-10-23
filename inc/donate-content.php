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
    $theme   = get_stylesheet_directory_uri();
    ?>

    <div class="donate-page">

        <!-- ════════════════════════════════════════════════════════════════
             HOW TO DONATE
             ════════════════════════════════════════════════════════════════ -->
        <section id="ways-to-donate" class="donate-methods donate-give" aria-labelledby="methods-heading">
            <div class="donate-give__band">
                <div class="donate-give__intro">
                    <p class="donate-give__eyebrow">Support the rebuild</p>
                    <h2 id="methods-heading" class="donate-give__heading">Ways to Donate</h2>
                    <p class="donate-lead donate-give__lead">Your gift helps build the Manor&rsquo;s 20 barrier-free homes, with features like roll-in showers. That&rsquo;s four more barrier-free homes than before the fire.</p>
                    <ul class="donate-give__stats" aria-label="The rebuilt Manor">
                        <li><span class="donate-give__stat">70</span> homes</li>
                        <li><span class="donate-give__stat donate-give__stat--gold">20</span> barrier-free</li>
                        <li><span class="donate-give__stat">+4</span> more than before the fire</li>
                    </ul>
                </div>

                <div class="donate-give__grid">
                    <div class="donate-give__card donate-give__card--online">
                        <div class="donate-give__photo">
                            <img src="<?php echo esc_url( $uploads . '/2026/08/mem-rebuild-2026-08-hero.jpg' ); ?>" alt="Margaret Edgson Manor in August 2026, stripped to the sheathing and ready to rebuild" loading="lazy" decoding="async">
                            <span class="donate-give__badge">Quickest way to give</span>
                        </div>
                        <div class="donate-give__body">
                            <h3>Give online</h3>
                            <ul class="donate-give__checks">
                                <li><svg width="18" height="18" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M5 10.5l3.2 3.2L15 7" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg><span>Credit card or PayPal</span></li>
                                <li><svg width="18" height="18" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M5 10.5l3.2 3.2L15 7" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg><span>Secure checkout with <strong>ATB Cares</strong>, powered by Benevity</span></li>
                                <li><svg width="18" height="18" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M5 10.5l3.2 3.2L15 7" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg><span>Your tax receipt arrives by email</span></li>
                            </ul>
                            <a href="<?php echo esc_url( 'https://atb.benevity.org/community/cause/124-891431264RR0001/project/73YRWF67L7/donate' ); ?>" class="donate-btn donate-give__cta" target="_blank" rel="noopener">
                                Donate to the Rebuild
                                <span class="screen-reader-text">(opens ATB Cares in a new tab)</span>
                                <svg class="donate-btn__arrow" width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M4 10h12m0 0l-4-4m4 4l-4 4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </a>
                            <p class="donate-give__fine">Receipts for online gifts are issued by the Canadian Online Giving Foundation, ATB Cares&rsquo; partner foundation.</p>
                        </div>
                    </div>

                    <div class="donate-give__card donate-give__card--cheque">
                        <span class="donate-give__icon" aria-hidden="true"><svg width="26" height="26" viewBox="0 0 22 22" fill="none"><rect x="2.5" y="5" width="17" height="12" rx="2" stroke="currentColor" stroke-width="1.6"/><line x1="6" y1="10" x2="16" y2="10" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/><line x1="6" y1="13.5" x2="11" y2="13.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg></span>
                        <h3>Give by cheque</h3>
                        <p>Make it payable to <strong>Grande Prairie Residential Society</strong>, with <strong>&ldquo;GPRS Donation&rdquo;</strong> in the memo line.</p>
                        <p>Mail it, or drop it off at the Grande Spirit Foundation office:</p>
                        <address class="donate-give__address">
                            <strong>GPRS</strong><br>
                            c/o Grande Spirit Foundation<br>
                            9503 102 Avenue<br>
                            Grande Prairie, AB T8V 7G9
                        </address>
                        <p class="donate-give__fine">Cheque donations receive an official tax receipt.</p>
                    </div>
                </div>
            </div>
        </section>


        <!-- ════════════════════════════════════════════════════════════════
             GIFT LADDER — what a gift can help build
             Amounts are estimates per home (costed list, Oct 2026).
             ════════════════════════════════════════════════════════════════ -->
        <section class="donate-ladder" aria-labelledby="ladder-heading">
            <h2 id="ladder-heading" class="donate-heading">What Your Gift Can Help Build</h2>
            <p class="donate-lead">Inside each barrier-free home are pieces that make a real difference to the person living there. Here is what gifts of different sizes can help build.</p>
            <ol class="donate-ladder__list">
                <li class="donate-ladder__item">
                    <p class="donate-ladder__amount">About $50</p>
                    <h3>A ramp onto the balcony</h3>
                    <p>A small threshold ramp, so a wheelchair rolls straight out the patio door without a bump.</p>
                </li>
                <li class="donate-ladder__item">
                    <p class="donate-ladder__amount">About $400</p>
                    <h3>A sliding door</h3>
                    <p>A sliding door opens easily from a wheelchair, with no door swinging into the way.</p>
                </li>
                <li class="donate-ladder__item">
                    <p class="donate-ladder__amount">About $2,000 to $6,000</p>
                    <h3>An adjustable kitchen counter</h3>
                    <p>A counter that moves up or down, so someone can cook at the right height, seated or standing.</p>
                </li>
                <li class="donate-ladder__item donate-ladder__item--top">
                    <p class="donate-ladder__amount">About $6,400</p>
                    <h3>A ceiling track</h3>
                    <p>A track across the ceiling for a lift to run on, so a person can move from bed to wheelchair safely without being lifted by hand.</p>
                </li>
            </ol>
            <p class="donate-ladder__fine">Amounts are estimates for one home and will change once contractor quotes are in. Every gift goes to the Margaret Edgson Manor rebuild; these show what a gift of that size can help build.</p>
            <a href="<?php echo esc_url( 'https://atb.benevity.org/community/cause/124-891431264RR0001/project/73YRWF67L7/donate' ); ?>" class="donate-btn donate-btn--primary donate-ladder__cta" target="_blank" rel="noopener">
                Give to the Rebuild
                <span class="screen-reader-text">(opens ATB Cares in a new tab)</span>
                <svg class="donate-btn__arrow" width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M4 10h12m0 0l-4-4m4 4l-4 4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </a>

            <div class="donate-share">
                <div class="donate-share__card donate-share__card--qr">
                    <img src="<?php echo esc_url( $theme . '/images/qr-donate.svg' ); ?>" alt="QR code that opens this Donate page" width="132" height="132" loading="lazy" decoding="async">
                    <div>
                        <h3>Give from your phone</h3>
                        <p>On a computer? Point your phone&rsquo;s camera at this code to open this page and give from there.</p>
                    </div>
                </div>
                <div class="donate-share__card">
                    <span class="donate-share__icon" aria-hidden="true"><svg width="30" height="30" viewBox="0 0 24 24" fill="none"><path d="M6 3h8l4 4v14H6z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/><path d="M14 3v4h4M9 13h6M9 16.5h6" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg></span>
                    <div>
                        <h3>Prefer paper?</h3>
                        <p>Print our pamphlet, or pass it to a friend. It has the gift steps, both ways to give and a QR code.</p>
                        <a href="<?php echo esc_url( $theme . '/images/gprs-rebuild-pamphlet.pdf' ); ?>" class="donate-share__link" download>Download the pamphlet (PDF, 410 KB)</a>
                    </div>
                </div>
            </div>
        </section>


        <!-- ════════════════════════════════════════════════════════════════
             INTRO — THE STORY
             ════════════════════════════════════════════════════════════════ -->
        <section class="donate-intro" aria-label="Why your donation matters">
            <h2 class="donate-heading">Why Your Support Matters</h2>
            <p class="donate-text--large">On June 9, 2025, fire severely damaged Margaret Edgson Manor — 70 units of accessible and affordable housing that took nearly 20 years to build. Thanks to first responders, no lives were lost. But more than 70 residents were displaced from the homes that gave them independence.</p>
            <p>The GPRS board — entirely volunteer, no paid staff — chose to rebuild. Construction is underway to 2023 National Building Code standards with improved safety features and better insulation. The rebuilt Manor will again have 70 homes, 20 of them barrier-free. Your donation goes directly to this rebuild.</p>
            <blockquote class="donate-quote">
                <p class="donate-quote__text">"Before the '80s, anybody hurt that needed care, you basically had to move to Edmonton. There was nothing here."</p>
                <footer class="donate-quote__footer">
                    <cite>— Travis McNally, GPRS President</cite>
                </footer>
            </blockquote>
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
                            decoding="async"
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
                            decoding="async"
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
                            <cite>— Dale Williams, GPRS Treasurer</cite>
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
