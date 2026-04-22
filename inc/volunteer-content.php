<?php
/**
 * Volunteer Page Content
 *
 * Self-hooking include — outputs all content for /volunteer/.
 * Loaded via require_once in functions.php.
 * Hero + H1 handled separately by inc/hero.php.
 * Newsletter signup auto-appended by gprs_append_newsletter_to_pages().
 *
 * @package Astra Child – GPRS
 */

add_action( 'astra_primary_content_top', 'gprs_render_volunteer_content', 10 );

function gprs_render_volunteer_content() {

    if ( ! is_page( 'volunteer' ) ) {
        return;
    }

    $uploads = wp_get_upload_dir()['baseurl'];
    $home    = home_url( '/' );
    ?>

    <!-- ════════════════════════════════════════════════════════════════
         QUICKLINKS BAR
         ════════════════════════════════════════════════════════════════ -->
    <nav class="gprs-vol-quicklinks" aria-label="Page sections">
        <div class="gprs-vol-quicklinks__inner">
            <span class="gprs-vol-quicklinks__label">Jump to:</span>
            <a href="#why-volunteer" class="gprs-vol-quicklinks__link">Why Volunteer</a>
            <a href="#roles" class="gprs-vol-quicklinks__link">Roles</a>
            <a href="#committees" class="gprs-vol-quicklinks__link">Committees</a>
            <a href="#get-involved" class="gprs-vol-quicklinks__link">Get Involved</a>
        </div>
    </nav>


    <!-- ════════════════════════════════════════════════════════════════
         AT A GLANCE — VOLUNTEER FACTS
         ════════════════════════════════════════════════════════════════ -->
    <section class="gprs-vol-glance" aria-label="Volunteer facts at a glance">
        <div class="gprs-vol-glance__inner">
            <h2 class="gprs-vol-glance__heading">Volunteering at a Glance</h2>
            <div class="gprs-vol-glance__grid">
                <div class="gprs-vol-glance__card">
                    <span class="gprs-vol-glance__value">40 Years</span>
                    <span class="gprs-vol-glance__label">Volunteer-led since 1986</span>
                </div>
                <div class="gprs-vol-glance__card">
                    <span class="gprs-vol-glance__value">100%</span>
                    <span class="gprs-vol-glance__label">All-volunteer board</span>
                </div>
                <div class="gprs-vol-glance__card">
                    <span class="gprs-vol-glance__value">87 Units</span>
                    <span class="gprs-vol-glance__label">Built by community effort</span>
                </div>
                <div class="gprs-vol-glance__card">
                    <span class="gprs-vol-glance__value">7 Committees</span>
                    <span class="gprs-vol-glance__label">Shaping GPRS's future</span>
                </div>
            </div>
        </div>
    </section>


    <!-- ════════════════════════════════════════════════════════════════
         WHY VOLUNTEER WITH GPRS
         ════════════════════════════════════════════════════════════════ -->
    <section id="why-volunteer" class="gprs-vol-why" aria-labelledby="why-volunteer-heading">
        <div class="gprs-vol-why__inner">
            <div class="gprs-vol-why__layout">

                <!-- Image column -->
                <div class="gprs-vol-why__image-col">
                    <figure class="gprs-vol-why__figure">
                        <img
                            src="<?php echo esc_url( $uploads . '/2025/12/IMG_0988-scaled-e1764954260474.jpg' ); ?>"
                            alt="Street view of GPRS Crystal Ridge duplexes — built by volunteers and community effort since 1987"
                            class="gprs-vol-why__img"
                            loading="lazy"
                            width="800"
                            height="533"
                        />
                    </figure>
                    <figure class="gprs-vol-why__figure">
                        <img
                            src="<?php echo esc_url( $uploads . '/2025/12/IMG_0976-scaled.jpg' ); ?>"
                            alt="GPRS residential grounds with flowers and a tree"
                            class="gprs-vol-why__img"
                            loading="lazy"
                            width="800"
                            height="533"
                        />
                    </figure>
                </div>

                <!-- Text column -->
                <div class="gprs-vol-why__content">
                    <h2 id="why-volunteer-heading" class="gprs-vol-section-title">Why Volunteer with GPRS</h2>

                    <p>The Grande Prairie Residential Society has been entirely volunteer-run since it was incorporated in 1986. There has never been paid staff. Every one of our 87 housing units — from the 1987 Crystal Ridge duplexes to Margaret Edgson Manor — was planned, funded, built, and maintained through the work of people who showed up because they believed in the mission.</p>

                    <p>That started with Rose Pike, who lobbied politicians for 18 years to get accessible housing built in Grande Prairie. It started with Ernie and Ethel Oman, whose daughter Penny became quadriplegic in the mid-1970s and had to move to Edmonton because nothing existed here. It started with Pat Adams, who donated his architectural expertise as an unpaid consultant to design the first barrier-free homes north of Edmonton.</p>

                    <p>The fight Rose Pike began in the 1970s is still going. After the June 2025 fire at Margaret Edgson Manor, our all-volunteer board chose to rebuild — and they're doing it now. Whether you have professional skills or simply want to help, GPRS needs people who are willing to step up.</p>

                    <blockquote class="gprs-vol-quote">
                        <p class="gprs-vol-quote__text">"Come try it out — see if it fits."</p>
                        <footer class="gprs-vol-quote__footer">
                            <cite>— The standing invitation from the GPRS Board</cite>
                        </footer>
                    </blockquote>
                </div>

            </div>
        </div>
    </section>


    <!-- ════════════════════════════════════════════════════════════════
         VOLUNTEER ROLES
         ════════════════════════════════════════════════════════════════ -->
    <section id="roles" class="gprs-vol-roles" aria-labelledby="roles-heading">
        <div class="gprs-vol-roles__inner">
            <h2 id="roles-heading" class="gprs-vol-section-title gprs-vol-section-title--center">Ways to Contribute</h2>
            <p class="gprs-vol-roles__intro">No experience required for most roles — we'll teach you what you need to know. What matters is showing up.</p>

            <div class="gprs-vol-roles__grid">

                <div class="gprs-vol-roles__card">
                    <div class="gprs-vol-roles__icon" aria-hidden="true">
                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="4" y="6" width="32" height="28" rx="3" stroke="currentColor" stroke-width="2.5" fill="none"/>
                            <circle cx="20" cy="17" r="5" stroke="currentColor" stroke-width="2" fill="none"/>
                            <path d="M11 30c0-5 4-8 9-8s9 3 9 8" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <h3 class="gprs-vol-roles__title">Board Member</h3>
                    <p class="gprs-vol-roles__text">Help guide the Society's direction, vote on policy, and shape the future of accessible housing in Grande Prairie. Board members include community members and tenants.</p>
                </div>

                <div class="gprs-vol-roles__card">
                    <div class="gprs-vol-roles__icon" aria-hidden="true">
                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20 6v28M6 20h28" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
                            <circle cx="20" cy="20" r="14" stroke="currentColor" stroke-width="2.5" fill="none"/>
                            <path d="M12 12l4 4M24 24l4 4M28 12l-4 4M12 28l4-4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <h3 class="gprs-vol-roles__title">Committee Member</h3>
                    <p class="gprs-vol-roles__text">Join one of seven committees to focus on an area that matches your skills — from budgeting and policy to marketing and maintenance.</p>
                </div>

                <div class="gprs-vol-roles__card">
                    <div class="gprs-vol-roles__icon" aria-hidden="true">
                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="6" y="4" width="28" height="32" rx="3" stroke="currentColor" stroke-width="2.5" fill="none"/>
                            <line x1="12" y1="12" x2="28" y2="12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            <line x1="12" y1="20" x2="24" y2="20" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            <line x1="12" y1="28" x2="20" y2="28" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <h3 class="gprs-vol-roles__title">Grant Writing</h3>
                    <p class="gprs-vol-roles__text">Research and write grant proposals to help fund housing projects, maintenance, and community programs. Strong writing skills are an asset.</p>
                </div>

                <div class="gprs-vol-roles__card">
                    <div class="gprs-vol-roles__icon" aria-hidden="true">
                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="5" y="14" width="30" height="18" rx="2" stroke="currentColor" stroke-width="2.5" fill="none"/>
                            <path d="M5 20h30" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            <path d="M14 8h12a2 2 0 0 1 2 2v4H12v-4a2 2 0 0 1 2-2z" stroke="currentColor" stroke-width="2" fill="none"/>
                        </svg>
                    </div>
                    <h3 class="gprs-vol-roles__title">Fundraising &amp; Events</h3>
                    <p class="gprs-vol-roles__text">Help plan fundraising campaigns, community events, and donor outreach. Whether it's a raffle or a community gathering, your energy makes it happen.</p>
                </div>

                <div class="gprs-vol-roles__card">
                    <div class="gprs-vol-roles__icon" aria-hidden="true">
                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8 32V14l12-8 12 8v18" stroke="currentColor" stroke-width="2.5" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
                            <rect x="16" y="22" width="8" height="10" stroke="currentColor" stroke-width="2" fill="none"/>
                            <line x1="20" y1="22" x2="20" y2="32" stroke="currentColor" stroke-width="1.5"/>
                        </svg>
                    </div>
                    <h3 class="gprs-vol-roles__title">Property &amp; Maintenance</h3>
                    <p class="gprs-vol-roles__text">Hands-on work keeping our housing in good shape — painting, minor repairs, groundskeeping, and seasonal upkeep across our three phases.</p>
                </div>

                <div class="gprs-vol-roles__card">
                    <div class="gprs-vol-roles__icon" aria-hidden="true">
                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="20" cy="14" r="6" stroke="currentColor" stroke-width="2.5" fill="none"/>
                            <path d="M8 34c0-6.6 5.4-12 12-12s12 5.4 12 12" stroke="currentColor" stroke-width="2.5" fill="none" stroke-linecap="round"/>
                            <path d="M26 14l4 4 6-8" stroke="currentColor" stroke-width="2.5" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <h3 class="gprs-vol-roles__title">Society Membership</h3>
                    <p class="gprs-vol-roles__text">Become a member of the Grande Prairie Residential Society. Members attend the Annual General Meeting, vote on resolutions, and help set the organization's direction.</p>
                </div>

            </div>
        </div>
    </section>


    <!-- ════════════════════════════════════════════════════════════════
         BOARD COMMITTEES
         ════════════════════════════════════════════════════════════════ -->
    <section id="committees" class="gprs-vol-committees" aria-labelledby="committees-heading">
        <div class="gprs-vol-committees__inner">
            <h2 id="committees-heading" class="gprs-vol-section-title gprs-vol-section-title--center">Board Committees</h2>
            <p class="gprs-vol-committees__intro">The GPRS board operates through seven standing committees. Each one focuses on a critical area of the Society's work. You don't need to be a board member to contribute to a committee.</p>

            <div class="gprs-vol-committees__grid">

                <div class="gprs-vol-committees__card">
                    <h3 class="gprs-vol-committees__title">Strategic Planning</h3>
                    <p class="gprs-vol-committees__text">Long-term vision, growth planning, and ensuring GPRS stays aligned with its mission as the community evolves.</p>
                </div>

                <div class="gprs-vol-committees__card">
                    <h3 class="gprs-vol-committees__title">Budget &amp; Finance</h3>
                    <p class="gprs-vol-committees__text">Annual budgets, financial oversight, and ensuring responsible stewardship of the Society's resources.</p>
                </div>

                <div class="gprs-vol-committees__card">
                    <h3 class="gprs-vol-committees__title">Policy</h3>
                    <p class="gprs-vol-committees__text">Developing and reviewing housing policies, tenant agreements, and organizational governance.</p>
                </div>

                <div class="gprs-vol-committees__card">
                    <h3 class="gprs-vol-committees__title">Marketing &amp; Outreach</h3>
                    <p class="gprs-vol-committees__text">Public communications, website content, social media, and raising awareness of GPRS in the community.</p>
                </div>

                <div class="gprs-vol-committees__card">
                    <h3 class="gprs-vol-committees__title">Community Room</h3>
                    <p class="gprs-vol-committees__text">Programming and managing the shared community space at Margaret Edgson Manor — a hub for resident connection.</p>
                </div>

                <div class="gprs-vol-committees__card">
                    <h3 class="gprs-vol-committees__title">Treasury</h3>
                    <p class="gprs-vol-committees__text">Managing donations, grant applications, financial reporting, and partnership with Grande Spirit Foundation.</p>
                </div>

                <div class="gprs-vol-committees__card">
                    <h3 class="gprs-vol-committees__title">Maintenance</h3>
                    <p class="gprs-vol-committees__text">Overseeing property upkeep, coordinating repairs, managing contractors, and planning capital improvements across all three phases.</p>
                </div>

            </div>

            <div class="gprs-vol-committees__skills">
                <h3 class="gprs-vol-committees__skills-heading">Skills We're Looking For</h3>
                <p class="gprs-vol-committees__skills-text">These are especially useful — but we welcome anyone willing to learn and contribute:</p>
                <ul class="gprs-vol-committees__skills-list">
                    <li>Finance, accounting, or bookkeeping</li>
                    <li>Construction or project management</li>
                    <li>Grant writing or fundraising</li>
                    <li>Legal or governance experience</li>
                    <li>Marketing, web design, or communications</li>
                    <li>Community organizing or event planning</li>
                    <li>Property management or trades</li>
                </ul>
            </div>
        </div>
    </section>


    <!-- ════════════════════════════════════════════════════════════════
         THE PEOPLE WHO BUILT THIS
         ════════════════════════════════════════════════════════════════ -->
    <section class="gprs-vol-legacy" aria-labelledby="legacy-heading">
        <div class="gprs-vol-legacy__inner">
            <h2 id="legacy-heading" class="gprs-vol-section-title gprs-vol-section-title--center">Built by Volunteers — Every Step</h2>

            <div class="gprs-vol-legacy__grid">

                <div class="gprs-vol-legacy__card">
                    <h3 class="gprs-vol-legacy__name">Rose Pike</h3>
                    <p class="gprs-vol-legacy__role">Founding Advocate</p>
                    <p class="gprs-vol-legacy__text">Rose had cerebral palsy and spent 20 years at Central Park Lodge because accessible housing didn't exist. She lobbied politicians for 18 years until GPRS was formed. She was among the first residents of the Crystal Ridge duplexes in 1988.</p>
                </div>

                <div class="gprs-vol-legacy__card">
                    <h3 class="gprs-vol-legacy__name">Ernie &amp; Ethel Oman</h3>
                    <p class="gprs-vol-legacy__role">Founding President &amp; Treasurer</p>
                    <p class="gprs-vol-legacy__text">The Omans of Sexsmith knew the need personally — their daughter Penny became quadriplegic in the mid-1970s and had to move to Edmonton. Ernie served as the Society's first president from 1984 to 1986.</p>
                </div>

                <div class="gprs-vol-legacy__card">
                    <h3 class="gprs-vol-legacy__name">Travis McNally</h3>
                    <p class="gprs-vol-legacy__role">Board President since 1986</p>
                    <p class="gprs-vol-legacy__text">A former professional jockey left quadriplegic by a riding accident, Travis has served as president across multiple terms since 1986. He was among the first duplex residents and continues to lead the Society through the Margaret Edgson Manor rebuild.</p>
                </div>

                <div class="gprs-vol-legacy__card">
                    <h3 class="gprs-vol-legacy__name">Dale Williams</h3>
                    <p class="gprs-vol-legacy__role">Board Member since ~1990</p>
                    <p class="gprs-vol-legacy__text">Dale joined the board through his Canadian Paraplegic Association role around 1990 and served as president from 2000 to 2003. His grand-opening speech for Margaret Edgson Manor called the project "More than a Dream Come True."</p>
                </div>

                <div class="gprs-vol-legacy__card">
                    <h3 class="gprs-vol-legacy__name">Pat Adams</h3>
                    <p class="gprs-vol-legacy__role">Volunteer Architect</p>
                    <p class="gprs-vol-legacy__text">Pat donated his design expertise as an unpaid consultant, drawing on his experience with the QEII Hospital project. What he helped create was quietly historic: the first wheelchair-accessible housing built north of Edmonton.</p>
                </div>

                <div class="gprs-vol-legacy__card">
                    <h3 class="gprs-vol-legacy__name">Margaret Edgson</h3>
                    <p class="gprs-vol-legacy__role">Advocate &amp; Benefactor</p>
                    <p class="gprs-vol-legacy__text">Margaret advocated tirelessly for accessible transportation from her wheelchair in Mission Heights. She died in 2002, and her brother Jim honoured her wish by donating $150,000 from her estate to fund what became Margaret Edgson Manor.</p>
                </div>

            </div>

            <blockquote class="gprs-vol-quote gprs-vol-quote--centered">
                <p class="gprs-vol-quote__text">"Once it's built, people will say it's a good thing."</p>
                <footer class="gprs-vol-quote__footer">
                    <cite>— Ethel Oman (1986)</cite>
                </footer>
            </blockquote>
        </div>
    </section>


    <!-- ════════════════════════════════════════════════════════════════
         GET INVOLVED — CTA
         ════════════════════════════════════════════════════════════════ -->
    <section id="get-involved" class="gprs-vol-cta" aria-labelledby="get-involved-heading">
        <div class="gprs-vol-cta__inner">
            <h2 id="get-involved-heading" class="gprs-vol-section-title gprs-vol-section-title--center">Get Involved</h2>
            <p class="gprs-vol-cta__text">Whether you have professional skills to offer or simply want to be part of something that matters, GPRS welcomes you. The best way to start is to reach out — we'll find the right fit together.</p>

            <div class="gprs-vol-cta__grid">

                <div class="gprs-vol-cta__card">
                    <h3 class="gprs-vol-cta__card-title">Contact Us</h3>
                    <p class="gprs-vol-cta__card-text">Phone or email to express your interest. We'll connect you with the right committee or role.</p>
                    <div class="gprs-vol-cta__contact-info">
                        <a href="tel:7805323276" class="gprs-vol-cta__contact-link">(780) 532-3276</a>
                        <a href="mailto:gpresidentialsociety@gmail.com" class="gprs-vol-cta__contact-link">gpresidentialsociety@gmail.com</a>
                    </div>
                </div>

                <div class="gprs-vol-cta__card">
                    <h3 class="gprs-vol-cta__card-title">Attend an Event</h3>
                    <p class="gprs-vol-cta__card-text">Our Annual General Meeting is the best way to meet the board and see what GPRS is about. Check our news page for upcoming dates.</p>
                    <a href="<?php echo esc_url( home_url( '/margaret-edgson-manor-rebuild-efforts/' ) ); ?>" class="gprs-vol-btn gprs-vol-btn--secondary">
                        Latest News &amp; Updates
                        <svg class="gprs-vol-btn__arrow" width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                            <path d="M4 10h12m0 0l-4-4m4 4l-4 4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                </div>

                <div class="gprs-vol-cta__card">
                    <h3 class="gprs-vol-cta__card-title">Become a Member</h3>
                    <p class="gprs-vol-cta__card-text">Society members vote at the AGM, elect board members, and help shape organizational direction. Membership is open to the public.</p>
                    <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="gprs-vol-btn gprs-vol-btn--secondary">
                        Contact Us to Join
                        <svg class="gprs-vol-btn__arrow" width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                            <path d="M4 10h12m0 0l-4-4m4 4l-4 4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                </div>

            </div>

            <!-- Prominent donate/apply CTAs -->
            <div class="gprs-vol-cta__buttons">
                <a href="<?php echo esc_url( home_url( '/donate/' ) ); ?>" class="gprs-vol-btn gprs-vol-btn--primary">
                    Donate to the Rebuild
                    <svg class="gprs-vol-btn__arrow" width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                        <path d="M4 10h12m0 0l-4-4m4 4l-4 4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
                <a href="<?php echo esc_url( home_url( '/apply/' ) ); ?>" class="gprs-vol-btn gprs-vol-btn--secondary">
                    Apply for Housing
                    <svg class="gprs-vol-btn__arrow" width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                        <path d="M4 10h12m0 0l-4-4m4 4l-4 4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <?php
}
