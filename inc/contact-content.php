<?php
/**
 * Contact Page Content
 *
 * Self-hooking include — outputs all content for /contact/.
 * Loaded via require_once in functions.php.
 * Hero + H1 handled separately by inc/hero.php.
 * Newsletter signup auto-appended by gprs_append_newsletter_to_pages().
 *
 * ╔════════════════════════════════════════════════════════════╗
 * ║  WPForms form ID: 1452                                    ║
 * ╚════════════════════════════════════════════════════════════╝
 *
 * @package Astra Child – GPRS
 */

add_action( 'astra_primary_content_top', 'gprs_render_contact_content', 10 );

function gprs_render_contact_content() {

    if ( ! is_page( 'contact' ) ) {
        return;
    }

    $home = home_url( '/' );
    ?>

    <!-- ════════════════════════════════════════════════════════════════
         INTRO TEXT
         ════════════════════════════════════════════════════════════════ -->
    <section class="gprs-contact-intro" aria-label="Contact introduction">
        <div class="gprs-contact-intro__inner">
            <p class="gprs-contact-intro__text">We're here to help — whether you're applying for housing, already a tenant, or looking for information about accessible and affordable housing in Grande Prairie.</p>
        </div>
    </section>


    <!-- ════════════════════════════════════════════════════════════════
         TWO-COLUMN: FORM + CONTACT INFO
         ════════════════════════════════════════════════════════════════ -->
    <section class="gprs-contact-main" aria-label="Contact form and information">
        <div class="gprs-contact-main__inner">
            <div class="gprs-contact-main__layout">

                <!-- ── Contact Form ── -->
                <div class="gprs-contact-main__form-col">
                    <div class="gprs-contact-form-wrap">
                        <h2 class="gprs-contact-form-wrap__heading">Send Us a Message</h2>
                        <?php
                        /* WPForms contact form (ID 1452) */
                        echo do_shortcode( '[wpforms id="1452" title="false" description="false"]' );
                        ?>
                    </div>
                </div>

                <!-- ── Contact Info Sidebar ── -->
                <div class="gprs-contact-main__info-col">

                    <!-- General Contact -->
                    <div class="gprs-contact-card">
                        <h3 class="gprs-contact-card__heading">General Inquiries</h3>
                        <dl class="gprs-contact-card__list">
                            <div class="gprs-contact-card__item">
                                <dt class="gprs-contact-card__label">
                                    <svg class="gprs-contact-card__icon" width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                                        <path d="M2 3h16v14H2V3zm0 0l8 7 8-7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
                                    </svg>
                                    Email
                                </dt>
                                <dd class="gprs-contact-card__value">
                                    <a href="mailto:gpresidentialsociety@gmail.com">gpresidentialsociety@gmail.com</a>
                                </dd>
                            </div>
                            <div class="gprs-contact-card__item">
                                <dt class="gprs-contact-card__label">
                                    <svg class="gprs-contact-card__icon" width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                                        <path d="M3 5.5a2.5 2.5 0 0 1 2.5-2.5h1.172a1 1 0 0 1 .95.69l.8 2.4a1 1 0 0 1-.27 1.04l-1.05.88a10.5 10.5 0 0 0 5.05 5.05l.88-1.05a1 1 0 0 1 1.04-.27l2.4.8a1 1 0 0 1 .69.95V14.5a2.5 2.5 0 0 1-2.5 2.5h-.65C7.77 17 3 12.23 3 6.15V5.5z" stroke="currentColor" stroke-width="1.5" fill="none"/>
                                    </svg>
                                    Phone
                                </dt>
                                <dd class="gprs-contact-card__value">
                                    <a href="tel:7805323276">(780) 532-3276</a>
                                </dd>
                            </div>
                        </dl>
                    </div>

                    <!-- Mailing Address -->
                    <div class="gprs-contact-card">
                        <h3 class="gprs-contact-card__heading">Mailing Address</h3>
                        <address class="gprs-contact-card__address">
                            Grande Prairie Residential Society<br>
                            c/o Grande Spirit Foundation<br>
                            9503 102 Avenue<br>
                            Grande Prairie, AB T8V 7G9<br>
                            Canada
                        </address>
                    </div>

                    <!-- Emergency Maintenance -->
                    <div class="gprs-contact-card gprs-contact-card--emergency">
                        <h3 class="gprs-contact-card__heading">
                            <svg class="gprs-contact-card__icon gprs-contact-card__icon--alert" width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                                <path d="M10 2l8 14H2L10 2z" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linejoin="round"/>
                                <line x1="10" y1="8" x2="10" y2="12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                <circle cx="10" cy="14.5" r="0.75" fill="currentColor"/>
                            </svg>
                            24-Hour Emergency Maintenance
                        </h3>
                        <p class="gprs-contact-card__emergency-text">If you are a tenant experiencing a serious safety or property issue:</p>
                        <a href="tel:7808760088" class="gprs-contact-card__emergency-phone">(780) 876-0088</a>
                        <p class="gprs-contact-card__emergency-note">Available 24/7 — for emergencies only.</p>
                    </div>

                    <!-- Quick Links -->
                    <div class="gprs-contact-card">
                        <h3 class="gprs-contact-card__heading">Quick Links</h3>
                        <div class="gprs-contact-card__links">
                            <a href="<?php echo esc_url( home_url( '/apply/' ) ); ?>" class="gprs-contact-btn gprs-contact-btn--secondary">
                                Apply for Housing
                                <svg class="gprs-contact-btn__arrow" width="16" height="16" viewBox="0 0 16 16" fill="none" aria-hidden="true">
                                    <path d="M3 8h10m0 0l-3-3m3 3l-3 3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>
                            <a href="<?php echo esc_url( home_url( '/donate/' ) ); ?>" class="gprs-contact-btn gprs-contact-btn--secondary">
                                Donate to the Rebuild
                                <svg class="gprs-contact-btn__arrow" width="16" height="16" viewBox="0 0 16 16" fill="none" aria-hidden="true">
                                    <path d="M3 8h10m0 0l-3-3m3 3l-3 3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>
                            <a href="<?php echo esc_url( home_url( '/volunteer/' ) ); ?>" class="gprs-contact-btn gprs-contact-btn--secondary">
                                Volunteer With Us
                                <svg class="gprs-contact-btn__arrow" width="16" height="16" viewBox="0 0 16 16" fill="none" aria-hidden="true">
                                    <path d="M3 8h10m0 0l-3-3m3 3l-3 3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>
                            <a href="<?php echo esc_url( home_url( '/faq/' ) ); ?>" class="gprs-contact-btn gprs-contact-btn--secondary">
                                Frequently Asked Questions
                                <svg class="gprs-contact-btn__arrow" width="16" height="16" viewBox="0 0 16 16" fill="none" aria-hidden="true">
                                    <path d="M3 8h10m0 0l-3-3m3 3l-3 3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>
                        </div>
                    </div>

                </div><!-- /.gprs-contact-main__info-col -->

            </div><!-- /.gprs-contact-main__layout -->
        </div>
    </section>

    <?php
}
