<?php
/**
 * Accessible Housing Page Content
 *
 * Self-hooking include — outputs all content for /accessible-housing/.
 * Loaded via require_once in functions.php.
 * Hero + H1 handled separately by inc/hero.php.
 * Newsletter signup auto-appended by gprs_append_newsletter_to_pages().
 *
 * @package Astra Child – GPRS
 */

add_action( 'astra_primary_content_top', 'gprs_render_accessible_housing_content', 10 );

function gprs_render_accessible_housing_content() {

    if ( ! is_page( 'accessible-housing' ) ) {
        return;
    }

    $uploads  = wp_get_upload_dir()['baseurl'];
    $home     = home_url( '/' );
    ?>

    <!-- ════════════════════════════════════════════════════════════════
         QUICKLINKS BAR
         ════════════════════════════════════════════════════════════════ -->
    <nav class="gprs-housing-quicklinks" aria-label="Page sections">
        <div class="gprs-housing-quicklinks__inner">
            <span class="gprs-housing-quicklinks__label">Jump to:</span>
            <a href="#phase-1" class="gprs-housing-quicklinks__link">Phase&nbsp;I</a>
            <a href="#phase-2" class="gprs-housing-quicklinks__link">Phase&nbsp;II</a>
            <a href="#phase-3" class="gprs-housing-quicklinks__link">Phase&nbsp;III</a>
            <a href="#gallery" class="gprs-housing-quicklinks__link">Gallery</a>
        </div>
    </nav>


    <!-- ════════════════════════════════════════════════════════════════
         AT A GLANCE — SUMMARY STRIP
         ════════════════════════════════════════════════════════════════ -->
    <section class="gprs-housing-glance" aria-label="At a glance">
        <div class="gprs-housing-glance__inner">
            <h2 class="gprs-housing-glance__heading">At a Glance</h2>
            <div class="gprs-housing-glance__grid">
                <div class="gprs-housing-glance__card">
                    <span class="gprs-housing-glance__label">Founded</span>
                    <span class="gprs-housing-glance__value">1986</span>
                </div>
                <div class="gprs-housing-glance__card">
                    <span class="gprs-housing-glance__label">Total Units</span>
                    <span class="gprs-housing-glance__value">87 across 3 phases</span>
                </div>
                <div class="gprs-housing-glance__card">
                    <span class="gprs-housing-glance__label">Location</span>
                    <span class="gprs-housing-glance__value">Grande Prairie, Alberta</span>
                </div>
                <div class="gprs-housing-glance__card">
                    <span class="gprs-housing-glance__label">Managed by</span>
                    <span class="gprs-housing-glance__value">Grande Spirit Foundation</span>
                </div>
                <div class="gprs-housing-glance__card">
                    <span class="gprs-housing-glance__label">Board</span>
                    <span class="gprs-housing-glance__value">Volunteer-led since 1986</span>
                </div>
                <div class="gprs-housing-glance__card">
                    <span class="gprs-housing-glance__label">Registered Charity</span>
                    <span class="gprs-housing-glance__value">BN 891431264RR0001</span>
                </div>
            </div>
        </div>
    </section>


    <!-- ════════════════════════════════════════════════════════════════
         ELIGIBILITY CRITERIA
         ════════════════════════════════════════════════════════════════ -->
    <section class="gprs-housing-eligibility" aria-label="Eligibility criteria">
        <div class="gprs-housing-eligibility__inner">
            <h2 class="gprs-housing-eligibility__heading">Who Can Apply</h2>
            <div class="gprs-housing-eligibility__grid">

                <div class="gprs-housing-eligibility__card">
                    <div class="gprs-housing-eligibility__icon" aria-hidden="true">
                        <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="24" cy="10" r="6" stroke="currentColor" stroke-width="2.5" fill="none"/>
                            <path d="M16 44V32a8 8 0 0 1 16 0v12" stroke="currentColor" stroke-width="2.5" fill="none" stroke-linecap="round"/>
                            <circle cx="24" cy="38" r="6" stroke="currentColor" stroke-width="2.5" fill="none"/>
                            <line x1="18" y1="38" x2="30" y2="38" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <h3 class="gprs-housing-eligibility__title">Physical Disability</h3>
                    <p class="gprs-housing-eligibility__text">Physical disability affecting mobility. Priority given to wheelchair users.</p>
                </div>

                <div class="gprs-housing-eligibility__card">
                    <div class="gprs-housing-eligibility__icon" aria-hidden="true">
                        <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="6" y="8" width="36" height="32" rx="4" stroke="currentColor" stroke-width="2.5" fill="none"/>
                            <line x1="14" y1="18" x2="34" y2="18" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
                            <line x1="14" y1="26" x2="28" y2="26" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
                            <line x1="14" y1="34" x2="22" y2="34" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
                            <polyline points="30,30 34,34 42,22" stroke="currentColor" stroke-width="2.5" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <h3 class="gprs-housing-eligibility__title">Support Services Plan</h3>
                    <p class="gprs-housing-eligibility__text">Support services plan assessed and in place if personal support is needed.</p>
                </div>

                <div class="gprs-housing-eligibility__card">
                    <div class="gprs-housing-eligibility__icon" aria-hidden="true">
                        <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="8" y="6" width="32" height="36" rx="4" stroke="currentColor" stroke-width="2.5" fill="none"/>
                            <line x1="16" y1="16" x2="32" y2="16" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
                            <line x1="16" y1="24" x2="32" y2="24" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
                            <line x1="16" y1="32" x2="26" y2="32" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <h3 class="gprs-housing-eligibility__title">Income Criteria</h3>
                    <p class="gprs-housing-eligibility__text">Meets GPRS income criteria and willing to enter a landlord-tenant agreement.</p>
                </div>

            </div>

            <div class="gprs-housing-eligibility__cta">
                <a href="<?php echo esc_url( home_url( '/apply/' ) ); ?>" class="gprs-housing-btn gprs-housing-btn--primary">
                    Apply for Housing
                    <svg class="gprs-housing-btn__arrow" width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                        <path d="M4 10h12m0 0l-4-4m4 4l-4 4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            </div>
        </div>
    </section>


    <!-- ════════════════════════════════════════════════════════════════
         PHASE I — CRYSTAL RIDGE DUPLEXES (1987)
         ════════════════════════════════════════════════════════════════ -->
    <article id="phase-1" class="gprs-housing-phase">
        <div class="gprs-housing-phase__inner">
            <header class="gprs-housing-phase__header">
                <span class="gprs-housing-phase__badge">Phase I</span>
                <h2 class="gprs-housing-phase__title">Crystal Ridge Duplexes</h2>
                <p class="gprs-housing-phase__subtitle">1987 — The first wheelchair-accessible housing north of Edmonton</p>
            </header>

            <div class="gprs-housing-phase__layout">

                <!-- Images -->
                <div class="gprs-housing-phase__images">
                    <figure class="gprs-housing-phase__figure">
                        <img
                            src="<?php echo esc_url( $uploads . '/2025/12/IMG_0988-scaled-e1764954260474.jpg' ); ?>"
                            alt="Street view of GPRS Crystal Ridge duplexes — the first wheelchair-accessible housing built north of Edmonton, completed in 1987"
                            class="gprs-housing-phase__img"
                            loading="lazy"
                            width="800"
                            height="533"
                        />
                    </figure>
                    <figure class="gprs-housing-phase__figure gprs-housing-phase__figure--secondary">
                        <img
                            src="<?php echo esc_url( $uploads . '/2026/03/My-presto-pics-and-docs_20240418203732077.jpg' ); ?>"
                            alt="Front entrance of a GPRS Crystal Ridge duplex showing accessible entry with gently sloped walkway"
                            class="gprs-housing-phase__img"
                            loading="lazy"
                            width="800"
                            height="533"
                        />
                    </figure>
                </div>

                <!-- Content -->
                <div class="gprs-housing-phase__content">

                    <!-- Key facts -->
                    <dl class="gprs-housing-facts">
                        <div class="gprs-housing-facts__item">
                            <dt class="gprs-housing-facts__label">Units</dt>
                            <dd class="gprs-housing-facts__value">5 duplexes = 10 units (six 2-bedroom, four 3-bedroom)</dd>
                        </div>
                        <div class="gprs-housing-facts__item">
                            <dt class="gprs-housing-facts__label">Location</dt>
                            <dd class="gprs-housing-facts__value">Crystal Ridge neighbourhood, 9539 123 Avenue</dd>
                        </div>
                        <div class="gprs-housing-facts__item">
                            <dt class="gprs-housing-facts__label">Built</dt>
                            <dd class="gprs-housing-facts__value">1987 — first wheelchair-accessible housing north of Edmonton</dd>
                        </div>
                        <div class="gprs-housing-facts__item">
                            <dt class="gprs-housing-facts__label">Architect</dt>
                            <dd class="gprs-housing-facts__value">Pat Adams (volunteer, unpaid consultant)</dd>
                        </div>
                        <div class="gprs-housing-facts__item">
                            <dt class="gprs-housing-facts__label">First Residents</dt>
                            <dd class="gprs-housing-facts__value">Moved in August 1988</dd>
                        </div>
                    </dl>

                    <!-- Accessibility features -->
                    <div class="gprs-housing-features">
                        <h3 class="gprs-housing-features__heading">Accessibility Features</h3>
                        <ul class="gprs-housing-features__list">
                            <li>Automatic door openers</li>
                            <li>Wide hallways and doorways for wheelchairs</li>
                            <li>Wheel-in showers with grab bars</li>
                            <li>Adjustable-height bathroom sinks and counters</li>
                            <li>Adjustable-height kitchen sinks and stoves</li>
                            <li>Countertop stoves and wall ovens</li>
                            <li>In-unit washer and dryer</li>
                        </ul>
                    </div>

                    <!-- Narrative -->
                    <div class="gprs-housing-phase__narrative">
                        <p>These weren't apartments with a ramp added as an afterthought. Every detail was designed for the people who would live there. Pat Adams donated his expertise as an unpaid design consultant, and what he helped create was quietly historic: the first wheelchair-accessible housing built north of Edmonton.</p>
                        <p>The first residents moved in during August 1988. For many, it was the first time they had a home truly built for them — where cooking, bathing, and getting in your own front door could happen with dignity and independence.</p>
                    </div>

                    <!-- Quote -->
                    <blockquote class="gprs-housing-quote">
                        <p class="gprs-housing-quote__text">"Having a home of your own gives you a piece of independence. You have your own home."</p>
                        <footer class="gprs-housing-quote__footer">
                            <cite>— Travis McNally (2004)</cite>
                        </footer>
                    </blockquote>

                </div><!-- /.gprs-housing-phase__content -->
            </div><!-- /.gprs-housing-phase__layout -->
        </div>
    </article>


    <!-- ════════════════════════════════════════════════════════════════
         PHASE II — CRYSTAL RIDGE 7-PLEX (1994)
         ════════════════════════════════════════════════════════════════ -->
    <article id="phase-2" class="gprs-housing-phase">
        <div class="gprs-housing-phase__inner">
            <header class="gprs-housing-phase__header">
                <span class="gprs-housing-phase__badge">Phase II</span>
                <h2 class="gprs-housing-phase__title">Crystal Ridge 7-Plex</h2>
                <p class="gprs-housing-phase__subtitle">1994 — Expanding to meet growing demand</p>
            </header>

            <div class="gprs-housing-phase__layout gprs-housing-phase__layout--reverse">

                <!-- Images -->
                <div class="gprs-housing-phase__images">
                    <figure class="gprs-housing-phase__figure">
                        <img
                            src="<?php echo esc_url( $uploads . '/2025/12/IMG_0997.jpg' ); ?>"
                            alt="GPRS Phase II 7-Plex exterior — seven accessible apartments in Crystal Ridge, Grande Prairie"
                            class="gprs-housing-phase__img"
                            loading="lazy"
                            width="800"
                            height="533"
                        />
                    </figure>
                    <figure class="gprs-housing-phase__figure gprs-housing-phase__figure--secondary">
                        <img
                            src="<?php echo esc_url( $uploads . '/2025/12/IMG_0995-scaled-e1764952655223.jpg' ); ?>"
                            alt="GPRS 7-Plex bungalow-style apartments with white siding on green lawns under blue sky"
                            class="gprs-housing-phase__img"
                            loading="lazy"
                            width="800"
                            height="533"
                        />
                    </figure>
                </div>

                <!-- Content -->
                <div class="gprs-housing-phase__content">

                    <!-- Key facts -->
                    <dl class="gprs-housing-facts">
                        <div class="gprs-housing-facts__item">
                            <dt class="gprs-housing-facts__label">Units</dt>
                            <dd class="gprs-housing-facts__value">7 units (originally 6, expanded in the early 2000s)</dd>
                        </div>
                        <div class="gprs-housing-facts__item">
                            <dt class="gprs-housing-facts__label">Location</dt>
                            <dd class="gprs-housing-facts__value">9609 123 Avenue (next door to Phase I)</dd>
                        </div>
                        <div class="gprs-housing-facts__item">
                            <dt class="gprs-housing-facts__label">Built</dt>
                            <dd class="gprs-housing-facts__value">1994</dd>
                        </div>
                        <div class="gprs-housing-facts__item">
                            <dt class="gprs-housing-facts__label">Funding</dt>
                            <dd class="gprs-housing-facts__value">Funded in part by a $50,000 Wild Rose Foundation grant</dd>
                        </div>
                    </dl>

                    <!-- Accessibility features -->
                    <div class="gprs-housing-features">
                        <h3 class="gprs-housing-features__heading">Accessibility Features</h3>
                        <ul class="gprs-housing-features__list">
                            <li>Ground-level entrances with automatic doors</li>
                            <li>Fully accessible barrier-free design</li>
                            <li>Shared accessible laundry room</li>
                            <li>Built-in vacuum system</li>
                            <li>Wide doorways and hallways</li>
                            <li>Wheel-in showers with grab bars</li>
                            <li>Wheelchair-accessible kitchens</li>
                        </ul>
                    </div>

                    <!-- Narrative -->
                    <div class="gprs-housing-phase__narrative">
                        <p>Demand grew. The duplexes were full and the waitlist was getting longer, so the Society built a six-unit complex right next door at 9609–123 Avenue. It featured ground-level automatic entrances, shared accessible laundry, and a built-in vacuum system — small details that made a real difference in daily life. In the early 2000s, a seventh suite was added and the building became known as the 7-Plex.</p>
                    </div>

                </div><!-- /.gprs-housing-phase__content -->
            </div><!-- /.gprs-housing-phase__layout -->
        </div>
    </article>


    <!-- ════════════════════════════════════════════════════════════════
         PHASE III — MARGARET EDGSON MANOR (2005)
         ════════════════════════════════════════════════════════════════ -->
    <article id="phase-3" class="gprs-housing-phase">
        <div class="gprs-housing-phase__inner">
            <header class="gprs-housing-phase__header">
                <span class="gprs-housing-phase__badge">Phase III</span>
                <h2 class="gprs-housing-phase__title">Margaret Edgson Manor</h2>
                <p class="gprs-housing-phase__subtitle">2005 — Accessible and affordable housing, together</p>
            </header>

            <div class="gprs-housing-phase__layout">

                <!-- Images -->
                <div class="gprs-housing-phase__images">
                    <figure class="gprs-housing-phase__figure">
                        <img
                            src="<?php echo esc_url( $uploads . '/2025/12/mem-hero-e1773940918769.jpg' ); ?>"
                            alt="Margaret Edgson Manor exterior showing multi-storey apartment building with balconies, before the June 2025 fire"
                            class="gprs-housing-phase__img"
                            loading="lazy"
                            width="800"
                            height="533"
                        />
                    </figure>
                    <figure class="gprs-housing-phase__figure gprs-housing-phase__figure--secondary">
                        <img
                            src="<?php echo esc_url( $uploads . '/2025/11/mem-rendition--e1763498007691.jpg' ); ?>"
                            alt="Architectural rendering of Margaret Edgson Manor — designed as a 70-unit accessible and affordable housing complex"
                            class="gprs-housing-phase__img"
                            loading="lazy"
                            width="800"
                            height="533"
                        />
                    </figure>
                    <figure class="gprs-housing-phase__figure gprs-housing-phase__figure--secondary">
                        <img
                            src="<?php echo esc_url( $uploads . '/2025/12/IMG_1314-scaled-e1764993740381.jpg' ); ?>"
                            alt="Margaret Edgson Manor front entrance — barrier-free design with covered portico"
                            class="gprs-housing-phase__img"
                            loading="lazy"
                            width="800"
                            height="533"
                        />
                    </figure>
                </div>

                <!-- Content -->
                <div class="gprs-housing-phase__content">

                    <!-- Key facts -->
                    <dl class="gprs-housing-facts">
                        <div class="gprs-housing-facts__item">
                            <dt class="gprs-housing-facts__label">Units</dt>
                            <dd class="gprs-housing-facts__value">70 total: 16 fully wheelchair-accessible + 54 affordable housing</dd>
                        </div>
                        <div class="gprs-housing-facts__item">
                            <dt class="gprs-housing-facts__label">Address</dt>
                            <dd class="gprs-housing-facts__value">11010 107A Avenue, Grande Prairie, Alberta</dd>
                        </div>
                        <div class="gprs-housing-facts__item">
                            <dt class="gprs-housing-facts__label">Opened</dt>
                            <dd class="gprs-housing-facts__value">2005</dd>
                        </div>
                        <div class="gprs-housing-facts__item">
                            <dt class="gprs-housing-facts__label">Named For</dt>
                            <dd class="gprs-housing-facts__value">Margaret Edgson — advocate for accessible transportation and housing</dd>
                        </div>
                        <div class="gprs-housing-facts__item">
                            <dt class="gprs-housing-facts__label">Estate Gift</dt>
                            <dd class="gprs-housing-facts__value">$150,000 from Margaret Edgson's estate</dd>
                        </div>
                        <div class="gprs-housing-facts__item">
                            <dt class="gprs-housing-facts__label">Partnership</dt>
                            <dd class="gprs-housing-facts__value">City of Grande Prairie's Global Housing Initiative</dd>
                        </div>
                        <div class="gprs-housing-facts__item">
                            <dt class="gprs-housing-facts__label">Operations</dt>
                            <dd class="gprs-housing-facts__value">Self-sustaining — no government operating support</dd>
                        </div>
                        <div class="gprs-housing-facts__item">
                            <dt class="gprs-housing-facts__label">Status</dt>
                            <dd class="gprs-housing-facts__value">Damaged by fire June 9, 2025 — currently being rebuilt</dd>
                        </div>
                    </dl>

                    <!-- Accessibility features -->
                    <div class="gprs-housing-features">
                        <h3 class="gprs-housing-features__heading">Accessibility Features (Barrier-Free Units)</h3>
                        <ul class="gprs-housing-features__list">
                            <li>Zero-threshold entries</li>
                            <li>Wide doorways</li>
                            <li>Roll-in showers with grab bars</li>
                            <li>Automatic door openers</li>
                            <li>Elevator</li>
                            <li>Wheelchair-accessible kitchens</li>
                            <li>Community room</li>
                        </ul>
                    </div>

                    <!-- Narrative -->
                    <div class="gprs-housing-phase__narrative">
                        <p>Margaret Edgson was a Grande Prairie advocate who believed people with disabilities should live as part of the community — not apart from it. Her estate contributed $150,000 to what would become the Society's largest project.</p>
                        <p>In 2005, Margaret Edgson Manor opened as a 70-unit complex: 16 fully barrier-free, wheelchair-accessible suites and 54 affordable housing units. It was developed in partnership with the City of Grande Prairie's Global Housing Initiative — a unique model that brought accessible and affordable housing together under one roof. The building operates sustainably, without ongoing government operational funding.</p>
                        <p>On June 9, 2025, a fire severely damaged the building, displacing over 70 residents. Thanks to first responders, no lives were lost. The building is now being rebuilt to updated building codes.</p>
                    </div>

                    <!-- Quote -->
                    <blockquote class="gprs-housing-quote">
                        <p class="gprs-housing-quote__text">"Margaret Edgson believed that people with disabilities should live as part of the community — not apart from it."</p>
                    </blockquote>

                </div><!-- /.gprs-housing-phase__content -->
            </div><!-- /.gprs-housing-phase__layout -->

            <!-- Fire rebuild cross-link banner -->
            <div class="gprs-housing-rebuild-banner">
                <div class="gprs-housing-rebuild-banner__content">
                    <p class="gprs-housing-rebuild-banner__text">After the June 2025 fire, Margaret Edgson Manor is being rebuilt — stronger than before.</p>
                    <div class="gprs-housing-rebuild-banner__actions">
                        <a href="<?php echo esc_url( home_url( '/margaret-edgson-manor-rebuild-efforts/' ) ); ?>" class="gprs-housing-btn gprs-housing-btn--primary">
                            Read the Full Rebuild Update
                            <svg class="gprs-housing-btn__arrow" width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                                <path d="M4 10h12m0 0l-4-4m4 4l-4 4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                        <a href="<?php echo esc_url( home_url( '/donate/' ) ); ?>" class="gprs-housing-btn gprs-housing-btn--secondary">
                            Donate to the Rebuild
                            <svg class="gprs-housing-btn__arrow" width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                                <path d="M4 10h12m0 0l-4-4m4 4l-4 4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </article>


    <!-- ════════════════════════════════════════════════════════════════
         PHOTO GALLERIES
         ════════════════════════════════════════════════════════════════ -->
    <section id="gallery" class="gprs-housing-galleries" aria-label="Photo galleries">
        <div class="gprs-housing-galleries__inner">
            <h2 class="gprs-housing-galleries__heading">Photo Galleries</h2>

            <!-- ── Gallery 1: Exterior Photos ── -->
            <div class="gprs-housing-gallery" data-gallery="exterior">
                <h3 class="gprs-housing-gallery__title">Exterior Photos</h3>
                <div class="gprs-housing-gallery__grid">
                    <?php
                    $exterior_images = array(
                        array( 'src' => '/2025/12/mem-hero-e1773940918769.jpg',                        'alt' => 'Exterior view of Margaret Edgson Manor with balconies' ),
                        array( 'src' => '/2025/12/IMG_0992-1-scaled.jpg',                              'alt' => 'Single-storey residential building with covered entrance and front walkway' ),
                        array( 'src' => '/2025/12/IMG_0991-1-scaled.jpg',                              'alt' => 'Single-storey residential building with covered entrance and paved parking driveway' ),
                        array( 'src' => '/2025/12/IMG_0998-scaled.jpg',                                'alt' => 'White vinyl-sided bungalows with brown shingled roofs and small covered entries on sloped green lawn' ),
                        array( 'src' => '/2025/12/IMG_0995-scaled-e1764952655223.jpg',                 'alt' => '7-Plex bungalow-style apartments with white siding on green lawns under blue sky' ),
                        array( 'src' => '/2025/12/IMG_0977-scaled-e1764952511140.jpg',                 'alt' => 'Single-storey residential units with pitched roofs and mature trees along the sidewalk' ),
                        array( 'src' => '/2025/12/IMG_0983-scaled-e1764961701729.jpg',                 'alt' => 'Row of single-storey duplexes with light-coloured stucco and mature spruce trees' ),
                        array( 'src' => '/2025/12/IMG_0976-scaled.jpg',                                'alt' => 'Residential grounds with flowers and a tree' ),
                        array( 'src' => '/2025/12/IMG_0980-scaled.jpg',                                'alt' => 'Single-storey residential units with pitched roofs and mature trees' ),
                        array( 'src' => '/2025/12/IMG_0990-scaled-e1765422746804.jpg',                 'alt' => 'Two duplexes exterior with four large evergreen trees in front' ),
                        array( 'src' => '/2025/12/IMG_0982-scaled.jpg',                                'alt' => 'Single-storey residential units with pitched roofs and mature trees' ),
                        array( 'src' => '/2025/12/IMG_2228-scaled.jpg',                                'alt' => 'Corner residential home with a large tree in the front yard' ),
                        array( 'src' => '/2025/12/IMG_2229-scaled-e1765597582701.jpg',                 'alt' => 'Residential homes along the street with large evergreens on a sunny summer day' ),
                        array( 'src' => '/2025/12/IMG_2218-scaled.jpg',                                'alt' => 'Residential home with pointed roof and large evergreen' ),
                        array( 'src' => '/2025/12/IMG_2220-scaled.jpg',                                'alt' => 'Pair of residential homes with large trees in front' ),
                        array( 'src' => '/2025/12/IMG_2215-scaled.jpg',                                'alt' => 'Street view of row of bungalows with spruce trees — house number 9547 visible' ),
                        array( 'src' => '/2025/12/IMG_1312-scaled.jpg',                                'alt' => 'Margaret Edgson Manor four-storey apartment building exterior' ),
                        array( 'src' => '/2025/12/IMG_1299-scaled-e1764910506741.jpg',                 'alt' => 'Architectural rendering of Margaret Edgson Manor with balconies, parking, and landscaped grounds' ),
                        array( 'src' => '/2025/11/My-presto-pics-and-docs_20240418203732077-2.jpg',    'alt' => 'Street-level view of an attached bungalow with pale yellow siding and red lower trim' ),
                    );
                    foreach ( $exterior_images as $idx => $img ) :
                    ?>
                        <button
                            type="button"
                            class="gprs-housing-gallery__thumb"
                            data-index="<?php echo $idx; ?>"
                            aria-label="Open exterior photo <?php echo $idx + 1; ?> of <?php echo count( $exterior_images ); ?>: <?php echo esc_attr( $img['alt'] ); ?>"
                        >
                            <img
                                src="<?php echo esc_url( $uploads . $img['src'] ); ?>"
                                alt=""
                                loading="lazy"
                                class="gprs-housing-gallery__thumb-img"
                            />
                        </button>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- ── Gallery 2: Interior & Accessibility Features ── -->
            <div class="gprs-housing-gallery" data-gallery="interior">
                <h3 class="gprs-housing-gallery__title">Interior &amp; Accessibility Features</h3>
                <div class="gprs-housing-gallery__grid">
                    <?php
                    $interior_images = array(
                        array( 'src' => '/2025/12/IMG_1279-scaled.jpg',                     'alt' => 'Empty living room with vinyl flooring, three windows, and ceiling fan' ),
                        array( 'src' => '/2025/12/IMG_1291-scaled.jpg',                     'alt' => 'Laundry area of a residential unit' ),
                        array( 'src' => '/2025/12/IMG_2086-scaled-e1765763364663.jpg',      'alt' => 'Large empty room with sliding door closet and ceiling fan' ),
                        array( 'src' => '/2025/11/bathroom-2-e1765598448281.jpg',           'alt' => 'Accessible bathroom with white bathtub with grab bars and walk-in shower with curved glass door' ),
                        array( 'src' => '/2025/11/bathroom--e1765598293486.jpg',            'alt' => 'Compact accessible bathroom with walk-in tiled shower, grab bars, fold-down seat, and granite countertop sink' ),
                        array( 'src' => '/2025/12/IMG_1282-scaled.jpg',                     'alt' => 'Kitchen with wood cabinets, laminate flooring, oven, sink, and refrigerator' ),
                        array( 'src' => '/2025/12/IMG_1280-scaled-e1765607141686.jpg',      'alt' => 'Front entranceway of a residential unit' ),
                        array( 'src' => '/2025/12/IMG_2083-scaled.jpg',                     'alt' => 'Empty room with small window' ),
                        array( 'src' => '/2025/12/IMG_1290-scaled.jpg',                     'alt' => 'Front entrance inside a residential home with automatic door mechanism' ),
                        array( 'src' => '/2025/12/IMG_1289-scaled.jpg',                     'alt' => 'Bedroom with sliding door to walk-in closet' ),
                        array( 'src' => '/2025/12/IMG_1281-scaled.jpg',                     'alt' => 'Interior of accessible kitchen and empty room' ),
                    );
                    foreach ( $interior_images as $idx => $img ) :
                    ?>
                        <button
                            type="button"
                            class="gprs-housing-gallery__thumb"
                            data-index="<?php echo $idx; ?>"
                            aria-label="Open interior photo <?php echo $idx + 1; ?> of <?php echo count( $interior_images ); ?>: <?php echo esc_attr( $img['alt'] ); ?>"
                        >
                            <img
                                src="<?php echo esc_url( $uploads . $img['src'] ); ?>"
                                alt=""
                                loading="lazy"
                                class="gprs-housing-gallery__thumb-img"
                            />
                        </button>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- ── Gallery 3: Margaret Edgson Manor Rebuild ── -->
            <div class="gprs-housing-gallery" data-gallery="rebuild">
                <h3 class="gprs-housing-gallery__title">Margaret Edgson Manor Rebuild</h3>
                <div class="gprs-housing-gallery__grid">
                    <?php
                    $rebuild_images = array(
                        array( 'src' => '/2026/03/DJI_20260110143024_0071_D-scaled.jpg',                    'alt' => 'Aerial view of Margaret Edgson Manor under construction — gabled roof with exposed trusses, multi-level framing, red protective wrapping, winter 2026' ),
                        array( 'src' => '/2026/03/DJI_20260110142815_0055_D-Copy-scaled.jpg',               'alt' => 'Aerial drone view of apartment complex under construction in winter, surrounded by snow-covered neighbourhood' ),
                        array( 'src' => '/2026/03/E63A8547-331B-422B-8C44-02C5CA3B0DB9-scaled.jpeg',       'alt' => 'Ground-level view of multi-storey apartment under construction in winter with grey and beige panels, red protective skirting, and orange safety fencing' ),
                        array( 'src' => '/2026/01/mem-cleaned-up-e1767454553886.png',                       'alt' => 'Exposed top floor of Margaret Edgson Manor where the roof burned off, partially covered by snow' ),
                        array( 'src' => '/2026/03/DJI_20260110143003_0068_D-scaled.jpg',                    'alt' => 'Close-up aerial of apartment under construction showing wood framing, roof trusses, and balconies' ),
                        array( 'src' => '/2026/01/unnamed.png',                                             'alt' => 'Terrace Construction Development Inc. logo — rebuild construction partner' ),
                        array( 'src' => '/2026/03/DJI_20260110143018_0070_D-scaled.jpg',                    'alt' => 'Aerial view of Margaret Edgson Manor under construction — gabled roof, multi-level framing, red wrapping, winter 2026' ),
                    );
                    foreach ( $rebuild_images as $idx => $img ) :
                    ?>
                        <button
                            type="button"
                            class="gprs-housing-gallery__thumb"
                            data-index="<?php echo $idx; ?>"
                            aria-label="Open rebuild photo <?php echo $idx + 1; ?> of <?php echo count( $rebuild_images ); ?>: <?php echo esc_attr( $img['alt'] ); ?>"
                        >
                            <img
                                src="<?php echo esc_url( $uploads . $img['src'] ); ?>"
                                alt=""
                                loading="lazy"
                                class="gprs-housing-gallery__thumb-img"
                            />
                        </button>
                    <?php endforeach; ?>
                </div>
            </div>

        </div><!-- /.gprs-housing-galleries__inner -->
    </section>


    <!-- ════════════════════════════════════════════════════════════════
         LIGHTBOX DIALOG (shared by all galleries)
         ════════════════════════════════════════════════════════════════ -->
    <div
        class="gprs-housing-lightbox"
        role="dialog"
        aria-modal="true"
        aria-label="Photo viewer"
        hidden
    >
        <!-- Blurred background (decorative) -->
        <div class="gprs-housing-lightbox__backdrop" aria-hidden="true">
            <img src="" alt="" class="gprs-housing-lightbox__backdrop-img" />
        </div>

        <!-- Overlay -->
        <div class="gprs-housing-lightbox__overlay"></div>

        <!-- Content wrapper -->
        <div class="gprs-housing-lightbox__container">

            <!-- Close button -->
            <button
                type="button"
                class="gprs-housing-lightbox__close"
                aria-label="Close photo viewer"
            >
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                    <line x1="6" y1="6" x2="18" y2="18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    <line x1="18" y1="6" x2="6" y2="18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                </svg>
            </button>

            <!-- Previous arrow -->
            <button
                type="button"
                class="gprs-housing-lightbox__arrow gprs-housing-lightbox__arrow--prev"
                aria-label="Previous photo"
            >
                <svg width="28" height="28" viewBox="0 0 28 28" fill="none" aria-hidden="true">
                    <polyline points="18,4 8,14 18,24" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>

            <!-- Main image -->
            <figure class="gprs-housing-lightbox__figure">
                <img src="" alt="" class="gprs-housing-lightbox__img" />
                <figcaption class="gprs-housing-lightbox__caption">
                    <span class="gprs-housing-lightbox__gallery-title"></span>
                    <span class="gprs-housing-lightbox__alt-text"></span>
                </figcaption>
            </figure>

            <!-- Next arrow -->
            <button
                type="button"
                class="gprs-housing-lightbox__arrow gprs-housing-lightbox__arrow--next"
                aria-label="Next photo"
            >
                <svg width="28" height="28" viewBox="0 0 28 28" fill="none" aria-hidden="true">
                    <polyline points="10,4 20,14 10,24" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>

            <!-- Dot navigation + counter -->
            <div class="gprs-housing-lightbox__nav">
                <span class="gprs-housing-lightbox__counter"></span>
                <div class="gprs-housing-lightbox__dots" role="tablist" aria-label="Photo navigation"></div>
            </div>

        </div><!-- /.gprs-housing-lightbox__container -->
    </div><!-- /.gprs-housing-lightbox -->

    <?php
}
