<?php
/**
 * FAQ — Page Content
 * Self-hooking: require_once in functions.php
 *
 * Outputs the full FAQ accordion page on /faq/.
 * NO hero on this page (hero.php returns early for FAQ).
 *
 * Migrated from: Gutenberg Custom HTML block (inline CSS/JS)
 * Now uses:      22-faq.css (conditional) + js/faq-accordion.js
 *
 * CLASS PREFIX:  faq-  (page-scoped)
 * Depends:       01-Tokens, 00-shared-components.css, 22-faq.css
 * Updated:       2026-03-31 — Converted to PHP include
 *
 * CHANGES FROM GUTENBERG VERSION:
 *   - Removed inline <style> block → moved to css/22-faq.css
 *   - Removed inline <script> block → moved to js/faq-accordion.js
 *   - Removed .gprs-card-glass (undefined) → .gprs-glass-card
 *   - Removed .gprs-container-glass (undefined) → .gprs-glass-card
 *   - Added .gprs-gradient-heading to category H2s
 *   - Added .gprs-tinted-text to page wrapper
 *   - All links use home_url() for portability
 *   - Puzzle-piece hero image REMOVED (was in WP editor above this content)
 */

add_action( 'astra_primary_content_top', 'gprs_render_faq_content', 10 );

function gprs_render_faq_content() {

    if ( ! is_page( 'faq' ) ) {
        return;
    }

    $home = home_url( '/' );
?>

<div class="faq-page gprs-tinted-text">

    <!-- ═══════ INTRO ═══════ -->
    <div class="faq-intro">
        <p>
            Find answers to the most common questions about our accessible
            housing, the application process, the Margaret Edgson Manor rebuild,
            and how to support our work. Can&rsquo;t find what you&rsquo;re looking for?
            <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Get in touch</a> &mdash; we&rsquo;re happy to help.
        </p>
    </div>


    <!-- ═══════════════════════════════════════════════════════
         CATEGORY 1: About GPRS
         ═══════════════════════════════════════════════════════ -->
    <div class="faq-category">
        <div class="faq-category__icon" aria-hidden="true">
            <svg viewBox="0 0 24 24"><path d="M3 21V7l9-4 9 4v14"/><path d="M9 21V13h6v8"/><path d="M3 10h18"/></svg>
        </div>
        <h2 class="gprs-gradient-heading gprs-gradient-heading--plain">About GPRS &amp; Our Mission</h2>
    </div>

    <div class="faq-items">

        <div class="faq-item gprs-glass-card" data-open="false">
            <button class="faq-item__question" aria-expanded="false">
                <span>What is the Grande Prairie Residential Society?</span>
                <span class="faq-item__chevron" aria-hidden="true"><svg viewBox="0 0 24 24"><polyline points="6 9 12 15 18 9"/></svg></span>
            </button>
            <div class="faq-item__answer" role="region">
                <p>GPRS is a volunteer-led non-profit founded in 1986 that provides safe, affordable, and fully barrier-free housing for people with physical disabilities in Grande Prairie, Alberta. We currently operate 87 accessible units across three housing phases &mdash; from the original Crystal Ridge duplexes built in 1987 to Margaret Edgson Manor, which opened in 2005.</p>
            </div>
        </div>

        <div class="faq-item gprs-glass-card" data-open="false">
            <button class="faq-item__question" aria-expanded="false">
                <span>Is GPRS a registered charity? Can I get a tax receipt?</span>
                <span class="faq-item__chevron" aria-hidden="true"><svg viewBox="0 0 24 24"><polyline points="6 9 12 15 18 9"/></svg></span>
            </button>
            <div class="faq-item__answer" role="region">
                <p>Yes. GPRS is a CRA-registered non-profit charitable organization (BN&nbsp;891431264RR0001). Tax receipts for donations are issued through our partner, the <a href="https://www.grandespirit.org/" target="_blank" rel="noopener noreferrer">Grande Spirit Foundation</a>. When donating, please note <strong>&ldquo;GPRS Donation&rdquo;</strong> so your contribution is properly directed and your receipt is accurate.</p>
            </div>
        </div>

        <div class="faq-item gprs-glass-card" data-open="false">
            <button class="faq-item__question" aria-expanded="false">
                <span>What is the Grande Spirit Foundation&rsquo;s role?</span>
                <span class="faq-item__chevron" aria-hidden="true"><svg viewBox="0 0 24 24"><polyline points="6 9 12 15 18 9"/></svg></span>
            </button>
            <div class="faq-item__answer" role="region">
                <p>The Grande Spirit Foundation (GSF) manages our housing properties and processes donations on our behalf. GSF is a long-established housing foundation serving Northern Alberta since 1960. When you donate to GPRS, your contribution flows through GSF (Registered Charity #102169158RR0001), which issues your tax receipt. GPRS maintains full governance over its housing and mission through its own volunteer board of directors.</p>
            </div>
        </div>

        <div class="faq-item gprs-glass-card" data-open="false">
            <button class="faq-item__question" aria-expanded="false">
                <span>Who was Margaret Edgson?</span>
                <span class="faq-item__chevron" aria-hidden="true"><svg viewBox="0 0 24 24"><polyline points="6 9 12 15 18 9"/></svg></span>
            </button>
            <div class="faq-item__answer" role="region">
                <p>Margaret Edgson was a strong advocate for accessible transportation and housing for people with disabilities in the Grande Prairie region. Our largest housing project &mdash; Margaret Edgson Manor &mdash; was named in her honour when it opened in 2005, recognizing her lasting contributions to the community she helped shape.</p>
            </div>
        </div>

    </div>


    <!-- ═══════════════════════════════════════════════════════
         CATEGORY 2: Housing & Eligibility
         ═══════════════════════════════════════════════════════ -->
    <div class="faq-category">
        <div class="faq-category__icon" aria-hidden="true">
            <svg viewBox="0 0 24 24"><circle cx="11" cy="4" r="2"/><path d="M6 20a4 4 0 1 1 5-6"/><path d="M11 10v4h4l3 6"/></svg>
        </div>
        <h2 class="gprs-gradient-heading gprs-gradient-heading--plain">Housing &amp; Eligibility</h2>
    </div>

    <div class="faq-items">

        <div class="faq-item gprs-glass-card" data-open="false">
            <button class="faq-item__question" aria-expanded="false">
                <span>Is GPRS housing wheelchair accessible?</span>
                <span class="faq-item__chevron" aria-hidden="true"><svg viewBox="0 0 24 24"><polyline points="6 9 12 15 18 9"/></svg></span>
            </button>
            <div class="faq-item__answer" role="region">
                <p>Yes. All our housing is designed to be fully barrier-free. Features include zero-threshold entries, wide doorways, roll-in showers with grab bars, wheelchair-accessible kitchens with adjustable counter heights, automatic door openers, and ramps or elevators where applicable. Priority is given to applicants who use wheelchairs.</p>
            </div>
        </div>

        <div class="faq-item gprs-glass-card" data-open="false">
            <button class="faq-item__question" aria-expanded="false">
                <span>Who qualifies for GPRS housing?</span>
                <span class="faq-item__chevron" aria-hidden="true"><svg viewBox="0 0 24 24"><polyline points="6 9 12 15 18 9"/></svg></span>
            </button>
            <div class="faq-item__answer" role="region">
                <p>Our housing is designed for individuals with physical disabilities affecting mobility who need barrier-free homes and meet GPRS income criteria. Priority is given to wheelchair users. We welcome applications from residents of Grande Prairie and surrounding areas.</p>
            </div>
        </div>

        <div class="faq-item gprs-glass-card" data-open="false">
            <button class="faq-item__question" aria-expanded="false">
                <span>What is the income limit for GPRS housing?</span>
                <span class="faq-item__chevron" aria-hidden="true"><svg viewBox="0 0 24 24"><polyline points="6 9 12 15 18 9"/></svg></span>
            </button>
            <div class="faq-item__answer" role="region">
                <p>Applicants must meet GPRS income criteria. Income thresholds are based on Alberta&rsquo;s Household Income Limits for affordable housing programs. You can review the current limits on the <a href="https://open.alberta.ca/publications/income-thresholds" target="_blank" rel="noopener noreferrer">Alberta government website</a>. If you&rsquo;re unsure whether you qualify, <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">contact us</a> &mdash; we&rsquo;re happy to walk you through it.</p>
            </div>
        </div>

        <div class="faq-item gprs-glass-card" data-open="false">
            <button class="faq-item__question" aria-expanded="false">
                <span>Can I apply if I receive AISH or other disability benefits?</span>
                <span class="faq-item__chevron" aria-hidden="true"><svg viewBox="0 0 24 24"><polyline points="6 9 12 15 18 9"/></svg></span>
            </button>
            <div class="faq-item__answer" role="region">
                <p>Absolutely. Many of our residents receive Alberta Income Support for the Severely Handicapped (AISH) or other disability benefits. Receiving these supports does not disqualify you from applying.</p>
            </div>
        </div>

        <div class="faq-item gprs-glass-card" data-open="false">
            <button class="faq-item__question" aria-expanded="false">
                <span>How long is the waitlist?</span>
                <span class="faq-item__chevron" aria-hidden="true"><svg viewBox="0 0 24 24"><polyline points="6 9 12 15 18 9"/></svg></span>
            </button>
            <div class="faq-item__answer" role="region">
                <p>Wait times vary depending on unit availability and each applicant&rsquo;s specific needs. We encourage you to submit an application so we can add you to our list and contact you when a suitable unit becomes available. <a href="<?php echo esc_url( home_url( '/apply/' ) ); ?>">Start your application here</a>.</p>
            </div>
        </div>

    </div>


    <!-- ═══════════════════════════════════════════════════════
         CATEGORY 3: Application Process
         ═══════════════════════════════════════════════════════ -->
    <div class="faq-category">
        <div class="faq-category__icon" aria-hidden="true">
            <svg viewBox="0 0 24 24"><rect x="8" y="2" width="8" height="4" rx="1"/><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><path d="M9 14l2 2 4-4"/></svg>
        </div>
        <h2 class="gprs-gradient-heading gprs-gradient-heading--plain">Applying for Housing</h2>
    </div>

    <div class="faq-items">

        <div class="faq-item gprs-glass-card" data-open="false">
            <button class="faq-item__question" aria-expanded="false">
                <span>How do I apply for GPRS housing?</span>
                <span class="faq-item__chevron" aria-hidden="true"><svg viewBox="0 0 24 24"><polyline points="6 9 12 15 18 9"/></svg></span>
            </button>
            <div class="faq-item__answer" role="region">
                <p>You can <a href="<?php echo esc_url( home_url( '/apply/' ) ); ?>">start your application directly on our website</a>. The process involves filling out a form, providing documentation (proof of disability, income verification, and identification), and a review by our team. We guide you through each step.</p>
            </div>
        </div>

        <div class="faq-item gprs-glass-card" data-open="false">
            <button class="faq-item__question" aria-expanded="false">
                <span>What documents do I need to apply?</span>
                <span class="faq-item__chevron" aria-hidden="true"><svg viewBox="0 0 24 24"><polyline points="6 9 12 15 18 9"/></svg></span>
            </button>
            <div class="faq-item__answer" role="region">
                <p>You&rsquo;ll typically need proof of physical disability, income verification, government-issued identification, and any relevant medical or support documentation. Full details and specific requirements are outlined on the <a href="<?php echo esc_url( home_url( '/apply/' ) ); ?>">application page</a>.</p>
            </div>
        </div>

    </div>


    <!-- ═══════════════════════════════════════════════════════
         CATEGORY 4: Margaret Edgson Manor Rebuild
         ═══════════════════════════════════════════════════════ -->
    <div class="faq-category">
        <div class="faq-category__icon" aria-hidden="true">
            <svg viewBox="0 0 24 24"><path d="M2 20h20"/><path d="M5 20V8l7-4 7 4v12"/><path d="M10 20v-4h4v4"/><path d="M9 12h1"/><path d="M14 12h1"/></svg>
        </div>
        <h2 class="gprs-gradient-heading gprs-gradient-heading--plain">Margaret Edgson Manor Rebuild</h2>
    </div>

    <div class="faq-items">

        <div class="faq-item gprs-glass-card" data-open="false">
            <button class="faq-item__question" aria-expanded="false">
                <span>What happened to Margaret Edgson Manor?</span>
                <span class="faq-item__chevron" aria-hidden="true"><svg viewBox="0 0 24 24"><polyline points="6 9 12 15 18 9"/></svg></span>
            </button>
            <div class="faq-item__answer" role="region">
                <p>On June 9, 2025, a fire severely damaged Margaret Edgson Manor, displacing all residents &mdash; including several requiring mobility assistance. Thanks to first responders, no lives were lost. The building is now being rebuilt to updated building codes, with improved safety features.</p>
            </div>
        </div>

        <div class="faq-item gprs-glass-card" data-open="false">
            <button class="faq-item__question" aria-expanded="false">
                <span>What is the current status of the rebuild?</span>
                <span class="faq-item__chevron" aria-hidden="true"><svg viewBox="0 0 24 24"><polyline points="6 9 12 15 18 9"/></svg></span>
            </button>
            <div class="faq-item__answer" role="region">
                <p>Selective demolition is complete. A new roof has been constructed to updated building codes, and fourth-floor framing is underway. The GPRS Board continues to work with Terrace Construction toward a safe, lasting rebuild. Follow our progress on the <a href="<?php echo esc_url( home_url( '/margaret-edgson-manor-rebuild-efforts/' ) ); ?>">rebuild updates page</a>.</p>
            </div>
        </div>

        <div class="faq-item gprs-glass-card" data-open="false">
            <button class="faq-item__question" aria-expanded="false">
                <span>How can I support the rebuild?</span>
                <span class="faq-item__chevron" aria-hidden="true"><svg viewBox="0 0 24 24"><polyline points="6 9 12 15 18 9"/></svg></span>
            </button>
            <div class="faq-item__answer" role="region">
                <p>Every donation goes directly toward reconstruction. You can <a href="<?php echo esc_url( home_url( '/donate/' ) ); ?>">donate online</a> through the Grande Spirit Foundation&rsquo;s Benevity platform on behalf of GPRS, send an Interac e-transfer, or mail a cheque. Volunteering your time also makes a real difference &mdash; visit our <a href="<?php echo esc_url( home_url( '/volunteer/' ) ); ?>">volunteer page</a> to learn how.</p>
            </div>
        </div>

    </div>


    <!-- ═══════════════════════════════════════════════════════
         CATEGORY 5: Donations & Support
         ═══════════════════════════════════════════════════════ -->
    <div class="faq-category">
        <div class="faq-category__icon" aria-hidden="true">
            <svg viewBox="0 0 24 24"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78L12 21.23l8.84-8.84a5.5 5.5 0 0 0 0-7.78z"/></svg>
        </div>
        <h2 class="gprs-gradient-heading gprs-gradient-heading--plain">Donations &amp; Support</h2>
    </div>

    <div class="faq-items">

        <div class="faq-item gprs-glass-card" data-open="false">
            <button class="faq-item__question" aria-expanded="false">
                <span>How can I make a donation?</span>
                <span class="faq-item__chevron" aria-hidden="true"><svg viewBox="0 0 24 24"><polyline points="6 9 12 15 18 9"/></svg></span>
            </button>
            <div class="faq-item__answer" role="region">
                <p>There are several ways to give. You can <a href="https://atb.benevity.org/community/cause/124-102169158RR0001" target="_blank" rel="noopener noreferrer">donate online</a> through ATB Benevity, send an Interac e-transfer to the Grande Spirit Foundation <strong>(note &ldquo;GPRS Donation&rdquo; in the message)</strong>, or mail a cheque payable to Grande Spirit Foundation with &ldquo;GPRS Donation&rdquo; in the memo. Full details are on our <a href="<?php echo esc_url( home_url( '/donate/' ) ); ?>">donate page</a>.</p>
            </div>
        </div>

        <div class="faq-item gprs-glass-card" data-open="false">
            <button class="faq-item__question" aria-expanded="false">
                <span>Are donations tax-deductible?</span>
                <span class="faq-item__chevron" aria-hidden="true"><svg viewBox="0 0 24 24"><polyline points="6 9 12 15 18 9"/></svg></span>
            </button>
            <div class="faq-item__answer" role="region">
                <p>Yes. All donations to GPRS are tax-deductible. Tax receipts are issued by the Grande Spirit Foundation (Registered Charity #102169158RR0001). For e-transfer and cheque donations, be sure to include &ldquo;GPRS Donation&rdquo; so your receipt is issued correctly.</p>
            </div>
        </div>

    </div>


    <!-- ═══════════════════════════════════════════════════════
         CATEGORY 6: Volunteering
         ═══════════════════════════════════════════════════════ -->
    <div class="faq-category">
        <div class="faq-category__icon" aria-hidden="true">
            <svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
        </div>
        <h2 class="gprs-gradient-heading gprs-gradient-heading--plain">Volunteering</h2>
    </div>

    <div class="faq-items">

        <div class="faq-item gprs-glass-card" data-open="false">
            <button class="faq-item__question" aria-expanded="false">
                <span>How can I volunteer with GPRS?</span>
                <span class="faq-item__chevron" aria-hidden="true"><svg viewBox="0 0 24 24"><polyline points="6 9 12 15 18 9"/></svg></span>
            </button>
            <div class="faq-item__answer" role="region">
                <p>GPRS was built by volunteers and still runs on their dedication. You can join a committee, become a Society member, help with administrative support, community outreach, or event coordination. Visit our <a href="<?php echo esc_url( home_url( '/volunteer/' ) ); ?>">volunteer page</a> to learn about current opportunities and sign up.</p>
            </div>
        </div>

        <div class="faq-item gprs-glass-card" data-open="false">
            <button class="faq-item__question" aria-expanded="false">
                <span>Do I need special skills to volunteer?</span>
                <span class="faq-item__chevron" aria-hidden="true"><svg viewBox="0 0 24 24"><polyline points="6 9 12 15 18 9"/></svg></span>
            </button>
            <div class="faq-item__answer" role="region">
                <p>Not at all. Whether you have professional skills, lived experience, or simply want to support the cause, there&rsquo;s a place for you. We especially welcome people with experience in construction, fundraising, communications, or governance &mdash; but all help is valued and makes a difference.</p>
            </div>
        </div>

    </div>


    <!-- ═══════════════════════════════════════════════════════
         CATEGORY 7: Current Tenants
         ═══════════════════════════════════════════════════════ -->
    <div class="faq-category">
        <div class="faq-category__icon" aria-hidden="true">
            <svg viewBox="0 0 24 24"><path d="M3 12l9-9 9 9"/><path d="M9 21V12h6v9"/></svg>
        </div>
        <h2 class="gprs-gradient-heading gprs-gradient-heading--plain">Current Tenants</h2>
    </div>

    <div class="faq-items">

        <div class="faq-item gprs-glass-card" data-open="false">
            <button class="faq-item__question" aria-expanded="false">
                <span>How do I report a maintenance issue?</span>
                <span class="faq-item__chevron" aria-hidden="true"><svg viewBox="0 0 24 24"><polyline points="6 9 12 15 18 9"/></svg></span>
            </button>
            <div class="faq-item__answer" role="region">
                <p>For non-urgent maintenance, please <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">contact us</a> through our website or email. For serious safety or property emergencies, call our <strong>24-hour emergency maintenance line: <a href="tel:7808760088">(780) 876-0088</a></strong>.</p>
            </div>
        </div>

        <div class="faq-item gprs-glass-card" data-open="false">
            <button class="faq-item__question" aria-expanded="false">
                <span>Does GPRS connect residents with other community services?</span>
                <span class="faq-item__chevron" aria-hidden="true"><svg viewBox="0 0 24 24"><polyline points="6 9 12 15 18 9"/></svg></span>
            </button>
            <div class="faq-item__answer" role="region">
                <p>While our primary focus is accessible housing, we work closely with community partners including the Grande Spirit Foundation and Seniors Outreach to connect residents with additional support as they age.</p>
            </div>
        </div>

    </div>


    <!-- ═══════════════════════════════════════════════════════
         BOTTOM CTA
         ═══════════════════════════════════════════════════════ -->
    <div class="faq-cta gprs-glass-card">
        <h2 class="gprs-gradient-heading gprs-gradient-heading--plain">Still Have Questions?</h2>
        <p>
            We&rsquo;re here to help. Reach us by phone at
            <a href="tel:7805323276">(780) 532-3276</a>
            or send us a message.
        </p>
        <div class="faq-cta__actions">
            <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-primary">Contact Us</a>
            <a href="<?php echo esc_url( home_url( '/margaret-edgson-manor-rebuild-efforts/' ) ); ?>" class="btn btn-secondary">News &amp; Updates</a>
        </div>
    </div>

</div>
<!-- /.faq-page -->

<?php
}
