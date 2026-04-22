<?php


add_action( 'astra_primary_content_top', 'gprs_render_mem_content', 10 );

function gprs_render_mem_content() {

    if ( ! is_page( 'margaret-edgson-manor' ) ) {
        return;
    }

    $uploads = wp_get_upload_dir()['baseurl'];
    $home    = home_url( '/' );
    ?>

    <div class="mem-page">

        <!-- ════════════════════════════════════════════════════════════════
             QUICKLINKS BAR
             ════════════════════════════════════════════════════════════════ -->
        <nav class="mem-quicklinks" aria-label="Page sections">
            <div class="mem-quicklinks__inner">
                <span class="mem-quicklinks__label">Jump to:</span>
                <a href="#the-woman" class="mem-quicklinks__link">Margaret Edgson</a>
                <a href="#the-building" class="mem-quicklinks__link">The Building</a>
                <a href="#features" class="mem-quicklinks__link">Features</a>
                <a href="#community" class="mem-quicklinks__link">Community</a>
                <a href="#apply-cta" class="mem-quicklinks__link">Apply</a>
            </div>
        </nav>


        <!-- ════════════════════════════════════════════════════════════════
             AT A GLANCE
             ════════════════════════════════════════════════════════════════ -->
        <section class="mem-glance" aria-label="At a glance">
            <h2 class="mem-heading">At a Glance</h2>
            <div class="mem-glance__grid">
                <div class="mem-glance__card">
                    <span class="mem-glance__value">70</span>
                    <span class="mem-glance__label">Total units</span>
                </div>
                <div class="mem-glance__card">
                    <span class="mem-glance__value">16</span>
                    <span class="mem-glance__label">Barrier-free suites</span>
                </div>
                <div class="mem-glance__card">
                    <span class="mem-glance__value">54</span>
                    <span class="mem-glance__label">Affordable housing units</span>
                </div>
                <div class="mem-glance__card">
                    <span class="mem-glance__value">2005</span>
                    <span class="mem-glance__label">Year opened</span>
                </div>
                <div class="mem-glance__card">
                    <span class="mem-glance__value">$0</span>
                    <span class="mem-glance__label">Government operating support</span>
                </div>
            </div>
        </section>


        <!-- ════════════════════════════════════════════════════════════════
             THE WOMAN — MARGARET EDGSON
             ════════════════════════════════════════════════════════════════ -->
        <section id="the-woman" class="mem-section" aria-labelledby="woman-heading">
            <div class="mem-two-col">
                <div class="mem-two-col__content">
                    <h2 id="woman-heading" class="mem-heading">The Woman Behind the Name</h2>
                    <p>Margaret Edgson was a wheelchair user living in Mission Heights who spent years advocating for accessible transportation in Grande Prairie. She helped secure the DATS accessible transit buses — though she died in 2002, just months before the buses she fought for were finally launched.</p>
                    <p>She told her brother Jim, who lived in Vernon, BC, that she wanted the proceeds from the sale of her house to go toward accessible housing. Jim honoured her wish with no legal obligation, donating $150,000 to GPRS — plus an additional $25,000 to $50,000 to the Disabled Transportation Society.</p>
                    <p>At the presentation, Jim said:</p>
                    <blockquote class="mem-quote">
                        <p class="mem-quote__text">"I hope that you will continue to be an example for the rest of Canada."</p>
                        <footer class="mem-quote__footer"><cite>— Jim Edgson, at the donation presentation</cite></footer>
                    </blockquote>
                    <p>Dale Williams, GPRS president at the time, called the gift the catalyst that made everything possible:</p>
                    <blockquote class="mem-quote">
                        <p class="mem-quote__text">"Without Jim's contribution of $150,000, I don't believe we would be standing here today."</p>
                        <footer class="mem-quote__footer"><cite>— Dale Williams, GPRS President (2000–2003)</cite></footer>
                    </blockquote>
                </div>
                <div class="mem-two-col__images">
                    <figure class="mem-figure">
                        <img
                            src="<?php echo esc_url( $uploads . '/2025/12/mem-hero-e1773940918769.jpg' ); ?>"
                            alt="Margaret Edgson Manor exterior showing multi-storey apartment building with balconies, before the June 2025 fire"
                            class="mem-figure__img"
                            loading="lazy"
                            width="800"
                            height="512"
                        />
                    </figure>
                    <figure class="mem-figure">
                        <img
                            src="<?php echo esc_url( $uploads . '/2025/11/My-presto-pics-and-docs_20240418204525070-e1774198879633.jpg' ); ?>"
                            alt="Celebratory groundbreaking — Travis McNally unveils the building sign while supporters applaud"
                            class="mem-figure__img"
                            loading="lazy"
                            width="800"
                            height="533"
                        />
                    </figure>
                </div>
            </div>
        </section>


        <!-- ════════════════════════════════════════════════════════════════
             THE BUILDING — HOW IT CAME TOGETHER
             ════════════════════════════════════════════════════════════════ -->
        <section id="the-building" class="mem-section" aria-labelledby="building-heading">
            <h2 id="building-heading" class="mem-heading">How Margaret Edgson Manor Came Together</h2>
            <p>With waiting lists long and the oil-boom rental market squeezing out anyone on a fixed income, GPRS partnered with Grande Spirit Foundation, Royal Management Services, the City of Grande Prairie, and CMHC to plan something larger than anything they'd done before.</p>
            <p>The original plan was 48 units. The math didn't work. Curtis Way, the project manager from Royal Management Services, pushed the plan to 70 — the only way to make the building self-sustaining without ongoing government subsidies. The model: 16 fully barrier-free AISH suites at roughly $300–$400 per month, subsidized by 54 affordable family suites at about $600 per month.</p>

            <dl class="mem-facts">
                <div class="mem-facts__item">
                    <dt class="mem-facts__label">Address</dt>
                    <dd class="mem-facts__value">11010 107A Avenue, Grande Prairie, Alberta</dd>
                </div>
                <div class="mem-facts__item">
                    <dt class="mem-facts__label">Land</dt>
                    <dd class="mem-facts__value">City of Grande Prairie — $1/year lease, ~$74,000 in waived fees</dd>
                </div>
                <div class="mem-facts__item">
                    <dt class="mem-facts__label">Funding</dt>
                    <dd class="mem-facts__value">$3.25 million federal-provincial grant (approved January 2004)</dd>
                </div>
                <div class="mem-facts__item">
                    <dt class="mem-facts__label">Estate Gift</dt>
                    <dd class="mem-facts__value">$150,000 from Margaret Edgson's estate via her brother Jim</dd>
                </div>
                <div class="mem-facts__item">
                    <dt class="mem-facts__label">Construction</dt>
                    <dd class="mem-facts__value">2004–2005 — four-storey, elevator-equipped, fully sprinklered</dd>
                </div>
                <div class="mem-facts__item">
                    <dt class="mem-facts__label">Operations</dt>
                    <dd class="mem-facts__value">Self-sustaining — no government operating support since opening</dd>
                </div>
                <div class="mem-facts__item">
                    <dt class="mem-facts__label">Partners</dt>
                    <dd class="mem-facts__value">City of Grande Prairie, CMHC, Grande Spirit Foundation, Royal Management Services</dd>
                </div>
            </dl>

            <blockquote class="mem-quote mem-quote--hero">
                <p class="mem-quote__text">"This really is More than a Dream Come True."</p>
                <footer class="mem-quote__footer"><cite>— Dale Williams, grand-opening speech (2005)</cite></footer>
            </blockquote>
        </section>


        <!-- ════════════════════════════════════════════════════════════════
             FEATURES — WHAT THE BUILDING OFFERS
             ════════════════════════════════════════════════════════════════ -->
        <section id="features" class="mem-section" aria-labelledby="features-heading">
            <h2 id="features-heading" class="mem-heading">What the Manor Offers</h2>
            <div class="mem-features-layout">
                <div class="mem-features-card">
                    <h3>16 Barrier-Free Suites</h3>
                    <p>Purpose-built for wheelchair users and residents with mobility impairments:</p>
                    <ul class="mem-features-list">
                        <li>Zero-threshold entries</li>
                        <li>Roll-in showers with grab bars</li>
                        <li>Wide doorways and hallways</li>
                        <li>Automatic door openers</li>
                        <li>Wheelchair-accessible kitchens with adjustable counters</li>
                        <li>Elevator access to all floors</li>
                        <li>Full sprinkler system</li>
                    </ul>
                </div>
                <div class="mem-features-card">
                    <h3>54 Affordable Units</h3>
                    <p>Two-bedroom suites for families and individuals who need relief from high market rents — the revenue that keeps the building self-sustaining without government operating support.</p>
                </div>
                <div class="mem-features-card">
                    <h3>Community Room</h3>
                    <p>A barrier-free common space open to tenants and nonprofit groups — for meetings, workshops, celebrations, and neighbourly connection. One board director's efforts turned it into a true hub of community life.</p>
                </div>
            </div>

            <figure class="mem-figure mem-figure--wide">
                <img
                    src="<?php echo esc_url( $uploads . '/2025/12/IMG_1314-scaled-e1764993740381.jpg' ); ?>"
                    alt="Margaret Edgson Manor front entrance — barrier-free design with covered portico"
                    class="mem-figure__img"
                    loading="lazy"
                    width="800"
                    height="533"
                />
            </figure>
        </section>


        <!-- ════════════════════════════════════════════════════════════════
             COMMUNITY — THE PEOPLE
             ════════════════════════════════════════════════════════════════ -->
        <section id="community" class="mem-section" aria-labelledby="community-heading">
            <h2 id="community-heading" class="mem-heading">More Than a Building</h2>
            <p>Margaret Edgson Manor isn't just 70 units. It brought accessible and affordable housing together under one roof — a model where families, individuals, and disabled adults live side-by-side. People here aren't just tenants. They're neighbours, society members, volunteers, and part of a legacy that started in 1986.</p>
            <p>The mixed-income model was deliberate. The affordable units generate the revenue that keeps barrier-free rents low — no ongoing government subsidy required. It was designed to sustain itself, and it has for nearly 20 years.</p>

            <blockquote class="mem-quote">
                <p class="mem-quote__text">"Having a home of your own gives you a piece of independence. You have your own home."</p>
                <footer class="mem-quote__footer"><cite>— Travis McNally (2004)</cite></footer>
            </blockquote>

            <figure class="mem-figure mem-figure--wide">
                <img
                    src="<?php echo esc_url( $uploads . '/2025/12/mem-plaque-donors-e1765524445416.jpg' ); ?>"
                    alt="Donor recognition plaque at Margaret Edgson Manor honouring contributors to Grande Prairie Residential Society, dated 2005"
                    class="mem-figure__img"
                    loading="lazy"
                    width="800"
                    height="533"
                />
            </figure>
        </section>


        <!-- ════════════════════════════════════════════════════════════════
             FIRE & REBUILD — BRIEF CROSS-LINK (NOT A DUPLICATION)
             ════════════════════════════════════════════════════════════════ -->
        <section class="mem-rebuild-link" aria-label="Fire and rebuild information">
            <div class="mem-rebuild-link__content">
                <h2 class="mem-heading">The Fire &amp; the Rebuild</h2>
                <p>On June 9, 2025, fire severely damaged Margaret Edgson Manor, displacing more than 70 residents. Thanks to first responders, no lives were lost. The all-volunteer GPRS board chose to rebuild — and construction is now underway to updated 2023 building codes.</p>
                <div class="mem-rebuild-link__actions">
                    <a href="<?php echo esc_url( home_url( '/margaret-edgson-manor-rebuild-efforts/' ) ); ?>" class="mem-btn mem-btn--primary">
                        Full Rebuild Update
                        <svg class="mem-btn__arrow" width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M4 10h12m0 0l-4-4m4 4l-4 4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </a>
                    <a href="<?php echo esc_url( home_url( '/donate/' ) ); ?>" class="mem-btn mem-btn--outline">
                        Donate to the Rebuild
                        <svg class="mem-btn__arrow" width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M4 10h12m0 0l-4-4m4 4l-4 4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </a>
                </div>
            </div>
        </section>


        <!-- ════════════════════════════════════════════════════════════════
             APPLY CTA
             ════════════════════════════════════════════════════════════════ -->
        <section id="apply-cta" class="mem-apply-cta" aria-labelledby="apply-cta-heading">
            <h2 id="apply-cta-heading" class="mem-heading">Apply for Housing</h2>
            <p class="mem-lead">Applications for both barrier-free and affordable units are handled through our property manager, Grande Spirit Foundation.</p>
            <div class="mem-apply-cta__actions">
                <a href="<?php echo esc_url( home_url( '/apply/' ) ); ?>" class="mem-btn mem-btn--primary">
                    Start Your Application
                    <svg class="mem-btn__arrow" width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M4 10h12m0 0l-4-4m4 4l-4 4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </a>
                <a href="<?php echo esc_url( home_url( '/accessible-housing/' ) ); ?>" class="mem-btn mem-btn--outline">
                    View All Housing
                    <svg class="mem-btn__arrow" width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M4 10h12m0 0l-4-4m4 4l-4 4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </a>
            </div>
            <p class="mem-apply-cta__contact">Questions? Call <a href="tel:7805323276">(780) 532-3276</a> or email <a href="mailto:gpresidentialsociety@gmail.com">gpresidentialsociety@gmail.com</a></p>
        </section>

    </div><!-- /.mem-page -->

    <?php
}
