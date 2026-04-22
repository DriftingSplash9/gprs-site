<?php
/**
 * Apply Page Content
 *
 * Self-hooking include — outputs all content for /apply/.
 * Loaded via require_once in functions.php.
 * Hero + H1 handled separately by inc/hero.php.
 * Newsletter signup auto-appended by gprs_append_newsletter_to_pages().
 *
 * @package Astra Child – GPRS
 */

add_action( 'astra_primary_content_top', 'gprs_render_apply_content', 10 );

function gprs_render_apply_content() {

    if ( ! is_page( 'apply' ) ) {
        return;
    }

    $uploads = wp_get_upload_dir()['baseurl'];
    $home    = home_url( '/' );
    ?>

    <div class="apply-page">

        <!-- ════════════════════════════════════════════════════════════════
             INTRO
             ════════════════════════════════════════════════════════════════ -->
        <section class="apply-intro" aria-label="Introduction">
            <h2 class="apply-intro__heading">Accessible Housing — Designed for Real Lives</h2>
            <p class="apply-intro__text">Accessibility in housing isn't a bonus feature — it's basic infrastructure. Our housing creates safe, affordable access to independence, dignity, and full participation in community life. Grande Prairie Residential Society exists to close that gap.</p>
            <div class="apply-intro__note" role="note">
                <strong>Online form coming soon.</strong> We're building a fully accessible online application. For now, download the fillable PDF below — you can complete it on your computer and email it with your documents.
            </div>
        </section>


        <!-- ════════════════════════════════════════════════════════════════
             STEP 1: ELIGIBILITY
             ════════════════════════════════════════════════════════════════ -->
        <section class="apply-section" aria-labelledby="elig-heading">
            <div class="apply-step-header">
                <span class="apply-step-badge" aria-hidden="true">1</span>
                <h3 id="elig-heading" class="apply-step-title">Check Your Eligibility</h3>
            </div>

            <div class="apply-elig-grid">
                <div class="apply-elig-card">
                    <div class="apply-elig-icon" aria-hidden="true">
                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none"><circle cx="20" cy="10" r="5" stroke="currentColor" stroke-width="2" fill="none"/><path d="M14 36V28a6 6 0 0 1 12 0v8" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round"/><circle cx="20" cy="32" r="5" stroke="currentColor" stroke-width="2" fill="none"/><line x1="15" y1="32" x2="25" y2="32" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
                    </div>
                    <h4 class="apply-elig-label">Physical Disability</h4>
                    <p>Applicants must have a physical disability that impairs their mobility. Priority is given to wheelchair users who need barrier-free housing.</p>
                </div>

                <div class="apply-elig-card">
                    <div class="apply-elig-icon" aria-hidden="true">
                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none"><rect x="5" y="6" width="30" height="28" rx="3" stroke="currentColor" stroke-width="2" fill="none"/><line x1="12" y1="14" x2="28" y2="14" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><line x1="12" y1="22" x2="22" y2="22" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><polyline points="24,26 28,30 36,18" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </div>
                    <h4 class="apply-elig-label">Support Plan</h4>
                    <p>If you require personal support services, your needs must be assessed and a care plan in place before acceptance into a unit.</p>
                </div>

                <div class="apply-elig-card">
                    <div class="apply-elig-icon" aria-hidden="true">
                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none"><rect x="7" y="4" width="26" height="32" rx="3" stroke="currentColor" stroke-width="2" fill="none"/><line x1="14" y1="14" x2="26" y2="14" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><line x1="14" y1="22" x2="26" y2="22" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><line x1="14" y1="30" x2="22" y2="30" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
                    </div>
                    <h4 class="apply-elig-label">Income Criteria</h4>
                    <p>You must meet income requirements set by GPRS and be willing to enter a landlord-tenant agreement with the Society.</p>
                </div>
            </div>

            <div class="apply-elig-income">
                <h4>Qualification Details</h4>
                <p>Requirements vary by program and may change over time:</p>
                <ul>
                    <li><strong>Affordable Housing:</strong> Annual household income must be below the <a href="https://open.alberta.ca/publications/income-thresholds" target="_blank" rel="noopener noreferrer">Household Income Limit (HIL)</a>.</li>
                    <li><strong>Rent Subsidy Programs (<a href="https://www.alberta.ca/rent-assistance" target="_blank" rel="noopener noreferrer">RAB</a>/<a href="https://open.alberta.ca/dataset/temporary-rent-assistance-benefit-rates" target="_blank" rel="noopener noreferrer">TRAB</a>):</strong> Applicants must meet income thresholds, asset limits, and employment criteria.</li>
                    <li><strong>Direct Rentals:</strong> Applicants must be below household income and asset limits.</li>
                </ul>
            </div>
        </section>


        <!-- ════════════════════════════════════════════════════════════════
             STEP 2: DOWNLOAD APPLICATION
             ════════════════════════════════════════════════════════════════ -->
        <section class="apply-section" aria-labelledby="form-heading">
            <div class="apply-step-header">
                <span class="apply-step-badge" aria-hidden="true">2</span>
                <h3 id="form-heading" class="apply-step-title">Download &amp; Complete the Application</h3>
            </div>

            <div class="apply-form-card">
                <h4 class="apply-form-card__title">GPRS Tenant Application</h4>
                <p class="apply-form-card__desc">This fillable PDF covers everything we need to assess your application: your personal information, mobility and accessibility needs, equipment used, personal care and homemaking assistance, housing preferences, and references. It also includes our privacy notice and consent under Alberta's PIPA and POPA.</p>
                <p class="apply-form-card__desc"><strong>4 pages.</strong> You can fill it out on your computer, phone, or tablet before printing, saving, or emailing it to us.</p>
                <a href="<?php echo esc_url( $uploads . '/2026/03/GPRS_Application_Fillable_2026-3.pdf' ); ?>" class="apply-form-card__btn" target="_blank" rel="noopener noreferrer">
                    Download Application (PDF)
                    <svg class="apply-form-card__btn-icon" width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                        <path d="M10 3v10m0 0l-3.5-3.5M10 13l3.5-3.5M4 16h12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            </div>
        </section>


        <!-- ════════════════════════════════════════════════════════════════
             STEP 3: SUBMIT
             ════════════════════════════════════════════════════════════════ -->
        <section class="apply-section" aria-labelledby="submit-heading">
            <div class="apply-step-header">
                <span class="apply-step-badge" aria-hidden="true">3</span>
                <h3 id="submit-heading" class="apply-step-title">Submit Your Application to Grande Spirit Foundation</h3>
            </div>

            <p class="apply-lead">Send your completed application by email, fax, or in person.</p>

            <div class="apply-submit-grid">
                <div class="apply-submit-card">
                    <h4>
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M2 4h16v12H2V4zm0 0l8 6 8-6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none"/></svg>
                        Email
                    </h4>
                    <a href="mailto:family@grandespirit.org">family@grandespirit.org</a>
                    <p>Attach the completed PDF and any supporting documents.</p>
                </div>

                <div class="apply-submit-card">
                    <h4>
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true"><rect x="4" y="2" width="12" height="16" rx="2" stroke="currentColor" stroke-width="1.5" fill="none"/><line x1="7" y1="6" x2="13" y2="6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/><line x1="7" y1="10" x2="11" y2="10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
                        Fax
                    </h4>
                    <p><strong>1-780-882-6774</strong></p>
                </div>

                <div class="apply-submit-card">
                    <h4>
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M3 7l7-4 7 4v9a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V7z" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linejoin="round"/><path d="M8 17V11h4v6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        In Person
                    </h4>
                    <p>Grande Spirit Foundation<br>9503 102 Avenue<br>Grande Prairie, AB</p>
                </div>
            </div>
        </section>


        <!-- ════════════════════════════════════════════════════════════════
             STEP 4: WHAT HAPPENS NEXT
             ════════════════════════════════════════════════════════════════ -->
        <section class="apply-section" aria-labelledby="next-heading">
            <div class="apply-step-header">
                <span class="apply-step-badge" aria-hidden="true">4</span>
                <h3 id="next-heading" class="apply-step-title">What Happens After You Apply</h3>
            </div>

            <div class="apply-timeline">
                <div class="apply-timeline__step">
                    <span class="apply-timeline__marker" aria-hidden="true">a</span>
                    <div class="apply-timeline__content">
                        <h4>Application Received</h4>
                        <p>Grande Spirit Foundation receives your completed application and confirms receipt.</p>
                    </div>
                </div>
                <div class="apply-timeline__step">
                    <span class="apply-timeline__marker" aria-hidden="true">b</span>
                    <div class="apply-timeline__content">
                        <h4>Eligibility Review</h4>
                        <p>GSF reviews your financial eligibility for affordable housing programs.</p>
                    </div>
                </div>
                <div class="apply-timeline__step">
                    <span class="apply-timeline__marker" aria-hidden="true">c</span>
                    <div class="apply-timeline__content">
                        <h4>GPRS Selection Committee</h4>
                        <p>If you indicated a need for barrier-free housing, your application is forwarded to the GPRS Selection Committee — which includes people with lived experience, professional experience, and a GSF representative.</p>
                    </div>
                </div>
                <div class="apply-timeline__step">
                    <span class="apply-timeline__marker" aria-hidden="true">d</span>
                    <div class="apply-timeline__content">
                        <h4>Next Steps</h4>
                        <p>You'll be contacted directly about your application status and next steps.</p>
                    </div>
                </div>
            </div>

            <!-- MEM rebuild note -->
            <div class="apply-info-callout" role="note">
                <h4>Margaret Edgson Manor Update</h4>
                <p>Margaret Edgson Manor is being rebuilt after the June 2025 fire. Units will become available as reconstruction completes. <a href="<?php echo esc_url( home_url( '/margaret-edgson-manor-rebuild-efforts/' ) ); ?>">Follow the rebuild progress.</a></p>
            </div>
        </section>


        <!-- ════════════════════════════════════════════════════════════════
             FAQ
             ════════════════════════════════════════════════════════════════ -->
        <section class="apply-section" aria-labelledby="faq-heading">
            <h3 id="faq-heading" class="apply-section-title">Frequently Asked Questions</h3>

            <details class="apply-faq">
                <summary>Is there a waitlist?</summary>
                <div class="apply-faq__body">
                    <p>Yes. When all units are occupied, qualified applicants are placed on a waitlist. Wait times vary depending on unit availability and turnover.</p>
                </div>
            </details>

            <details class="apply-faq">
                <summary>What documents do I need?</summary>
                <div class="apply-faq__body">
                    <p>The application form itself covers what's needed. Supporting documentation may include proof of disability, income verification, and government-issued identification. The form explains each requirement.</p>
                </div>
            </details>

            <details class="apply-faq">
                <summary>I don't live in Grande Prairie — can I apply?</summary>
                <div class="apply-faq__body">
                    <p>Yes. You don't need to currently live in Grande Prairie. The application asks about your connection to the area and the Peace Region.</p>
                </div>
            </details>

            <details class="apply-faq">
                <summary>How is my personal information protected?</summary>
                <div class="apply-faq__body">
                    <p>Your information is collected under Alberta privacy laws (PIPA and POPA) and used only to assess your housing eligibility and accessibility needs. It is shared with our property manager, Grande Spirit Foundation, as necessary to provide housing services. <a href="<?php echo esc_url( home_url( '/privacy/' ) ); ?>">Read our full Privacy Policy.</a></p>
                </div>
            </details>

            <details class="apply-faq">
                <summary>What types of units are available?</summary>
                <div class="apply-faq__body">
                    <p>GPRS operates 87 units across three phases: Phase I has 10 duplex units (six 2-bedroom, four 3-bedroom), Phase II has 7 apartments, and Phase III (Margaret Edgson Manor) has 70 units including 16 fully barrier-free suites. <a href="<?php echo esc_url( home_url( '/accessible-housing/' ) ); ?>">View all our housing.</a></p>
                </div>
            </details>
        </section>


        <!-- ════════════════════════════════════════════════════════════════
             CONTACT CTA
             ════════════════════════════════════════════════════════════════ -->
        <section class="apply-section apply-contact-cta" aria-labelledby="help-heading">
            <h3 id="help-heading" class="apply-section-title">Need Help or Have Questions?</h3>
            <p class="apply-lead">The application process can feel overwhelming. We've been through it ourselves and we're here to make it easier.</p>

            <div class="apply-contact-grid">
                <div class="apply-contact-item">
                    <strong>GPRS</strong>
                    <a href="tel:7805323276">(780) 532-3276</a>
                    <a href="mailto:gpresidentialsociety@gmail.com">gpresidentialsociety@gmail.com</a>
                </div>
                <div class="apply-contact-item">
                    <strong>Property Manager (GSF)</strong>
                    <a href="mailto:family@grandespirit.org">family@grandespirit.org</a>
                    <span>Grande Spirit Foundation Family Housing</span>
                </div>
            </div>

            <div class="apply-cta-buttons">
                <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="apply-btn apply-btn--primary">Contact Us</a>
                <a href="<?php echo esc_url( home_url( '/accessible-housing/' ) ); ?>" class="apply-btn apply-btn--outline">View Our Housing</a>
            </div>
        </section>

    </div><!-- /.apply-page -->

    <?php
}
