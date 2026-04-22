<?php
/**
 * Custom GPRS Header HTML
 * Updated: 2026-03-30
 *
 * Changes from previous version:
 *   1. "More" catch-all dropdown replaced with semantic dropdown groups
 *   2. Full search bar added (desktop + mobile)
 *   3. SEO-friendly nav labels aligned with new page titles
 *   4. Mobile layout: Logo → Fire Updates → Accessibility → Hamburger
 *   5. Accessibility toggle replaces theme toggle (dark mode now in a11y panel)
 *   6. Privacy & Accessibility removed from nav (footer + mobile only)
 *   7. Mobile menu uses section headings with dividers (no nested menus)
 *   8. All links use home_url() for portability
 *   9. "News & Updates" converted to "News & FAQ" dropdown
 *   10. Mobile theme toggle row removed (now in accessibility panel)
 *   11. Desktop control order: Donate → Accessibility → Search (right edge)
 *   12. Improved accessibility icon SVG (universal access figure)
 *
 * Desktop nav structure:
 *   Logo | About ▾ | Housing ▾ | News & FAQ ▾ | Volunteer | Donate | [♿] | [Search]
 *
 * Mobile header:
 *   Logo | [Fire Updates] | [♿] | [Hamburger]
 *
 * Mobile menu (top to bottom):
 *   [Search] → Donate → Home → About → Housing → News & FAQ → Volunteer → Legal
 */
?>

<a class="skip-link" href="#main-content">Skip to main content</a>

<header id="gprs-header" class="gprs-header" role="banner">
	<div class="header-inner">

		<!-- ==============================
		     LOGO
		     ============================== -->
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>"
		   aria-label="Grande Prairie Residential Society home"
		   class="logo">
			<img src="/wp-content/uploads/2025/11/gprs-logo.svg"
			     alt="Grande Prairie Residential Society logo">
			<span class="logo-text">Grande Prairie Residential Society</span>
		</a>

		<!-- ==============================
		     DESKTOP NAVIGATION
		     ============================== -->
		<div class="header-nav-controls">
			<nav class="nav-desktop" aria-label="Main navigation">

				<!-- ABOUT dropdown -->
				<div class="has-submenu">
					<button class="nav-link-submenu"
					        type="button"
					        aria-haspopup="menu"
					        aria-expanded="false"
					        aria-controls="submenu-about"
					        id="submenu-about-button">
						About
						<svg class="submenu-chevron" width="12" height="12"
						     viewBox="0 0 12 12" aria-hidden="true">
							<path d="M3 4.5L6 7.5L9 4.5" fill="none"
							      stroke="currentColor" stroke-width="1.8"
							      stroke-linecap="round" stroke-linejoin="round"/>
						</svg>
					</button>
					<div class="submenu" id="submenu-about"
					     role="menu" aria-labelledby="submenu-about-button">
						<a role="menuitem" href="<?php echo esc_url( home_url( '/our-story/' ) ); ?>">Our Story</a>
						<a role="menuitem" href="<?php echo esc_url( home_url( '/timeline/' ) ); ?>">Timeline</a>
						<a role="menuitem" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Contact Us</a>
					</div>
				</div>

				<!-- HOUSING dropdown -->
				<div class="has-submenu">
					<button class="nav-link-submenu"
					        type="button"
					        aria-haspopup="menu"
					        aria-expanded="false"
					        aria-controls="submenu-housing"
					        id="submenu-housing-button">
						Housing
						<svg class="submenu-chevron" width="12" height="12"
						     viewBox="0 0 12 12" aria-hidden="true">
							<path d="M3 4.5L6 7.5L9 4.5" fill="none"
							      stroke="currentColor" stroke-width="1.8"
							      stroke-linecap="round" stroke-linejoin="round"/>
						</svg>
					</button>
					<div class="submenu" id="submenu-housing"
					     role="menu" aria-labelledby="submenu-housing-button">
						<a role="menuitem" href="<?php echo esc_url( home_url( '/accessible-housing/' ) ); ?>">Accessible Housing</a>
						<a role="menuitem" href="<?php echo esc_url( home_url( '/margaret-edgson-manor/' ) ); ?>">Margaret Edgson Manor</a>
						<a role="menuitem" href="<?php echo esc_url( home_url( '/apply/' ) ); ?>">Apply for Housing</a>
					</div>
				</div>

				<!-- NEWS & FAQ dropdown -->
				<div class="has-submenu">
					<button class="nav-link-submenu"
					        type="button"
					        aria-haspopup="menu"
					        aria-expanded="false"
					        aria-controls="submenu-news-faq"
					        id="submenu-news-faq-button">
						News &amp; FAQ
						<svg class="submenu-chevron" width="12" height="12"
						     viewBox="0 0 12 12" aria-hidden="true">
							<path d="M3 4.5L6 7.5L9 4.5" fill="none"
							      stroke="currentColor" stroke-width="1.8"
							      stroke-linecap="round" stroke-linejoin="round"/>
						</svg>
					</button>
					<div class="submenu" id="submenu-news-faq"
					     role="menu" aria-labelledby="submenu-news-faq-button">
						<a role="menuitem" href="<?php echo esc_url( home_url( '/faq/' ) ); ?>">FAQ</a>
						<a role="menuitem" href="<?php echo esc_url( home_url( '/margaret-edgson-manor-rebuild-efforts/' ) ); ?>">Fire Updates</a>
					</div>
				</div>

				<!-- VOLUNTEER — standalone link -->
				<a href="<?php echo esc_url( home_url( '/volunteer/' ) ); ?>">Volunteer</a>

			</nav>
		</div>

		<!-- ==============================
		     HEADER CONTROLS
		     Desktop: Donate → Accessibility → Search (right edge)
		     Mobile:  Fire Updates → Accessibility → Hamburger
		     ============================== -->
		<div class="header-controls">

			<!-- DONATE CTA — hidden on mobile, shown in mobile menu -->
			<a href="<?php echo esc_url( home_url( '/donate/' ) ); ?>"
			   class="nav-cta-donate">Donate</a>

			<!-- FIRE UPDATES — mobile only (replaces donate position) -->
			<a href="<?php echo esc_url( home_url( '/margaret-edgson-manor-rebuild-efforts/' ) ); ?>"
			   class="mobile-fire-updates">Fire Updates</a>

			<!-- ACCESSIBILITY TOGGLE — visible at ALL breakpoints -->
			<button id="gprs-a11y-toggle"
			        class="gprs-a11y-toggle"
			        type="button"
			        aria-expanded="false"
			        aria-controls="gprs-a11y-panel"
			        aria-label="Accessibility options">
				<svg width="20" height="20" viewBox="0 0 24 24" fill="none"
				     stroke="currentColor" stroke-width="2"
				     stroke-linecap="round" stroke-linejoin="round"
				     aria-hidden="true">
					<circle cx="12" cy="4" r="1.5"/>
					<path d="M7 8h10"/>
					<path d="M12 8v5"/>
					<path d="M12 13l-3.5 7"/>
					<path d="M12 13l3.5 7"/>
				</svg>
			</button>

			<!-- SEARCH BAR — desktop only (moves into mobile menu on ≤1024px) -->
			<form class="header-search" role="search"
			      action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
				<label for="header-search-input" class="sr-only">Search this site</label>
				<input type="search"
				       id="header-search-input"
				       class="header-search-input"
				       name="s"
				       placeholder="Search…"
				       autocomplete="off">
				<button type="submit" class="header-search-btn" aria-label="Submit search">
					<svg width="18" height="18" viewBox="0 0 24 24" fill="none"
					     stroke="currentColor" stroke-width="2"
					     stroke-linecap="round" stroke-linejoin="round"
					     aria-hidden="true">
						<circle cx="11" cy="11" r="8"/>
						<path d="M21 21l-4.35-4.35"/>
					</svg>
				</button>
			</form>

			<!-- MOBILE HAMBURGER — hidden on desktop -->
			<button id="mobile-menu-toggle"
			        class="mobile-toggle"
			        type="button"
			        aria-label="Open menu"
			        aria-expanded="false">
				<svg class="hamburger-icon" width="22" height="18"
				     viewBox="0 0 22 18" aria-hidden="true">
					<rect class="hamburger-top" x="0" y="0"
					      width="22" height="2.5" rx="1.25" fill="currentColor"/>
					<rect class="hamburger-mid" x="0" y="7.75"
					      width="22" height="2.5" rx="1.25" fill="currentColor"/>
					<rect class="hamburger-bot" x="0" y="15.5"
					      width="22" height="2.5" rx="1.25" fill="currentColor"/>
				</svg>
			</button>

		</div>
	</div>

	<!-- ==============================
	     MOBILE SLIDE-OUT MENU
	     Flat list with section headings & dividers.
	     No nested dropdowns (better UX on touch).
	     ============================== -->
	<nav id="mobile-menu" class="mobile-menu"
	     aria-label="Mobile navigation" aria-hidden="true">
		<ul>
			<!-- Search bar — first item in mobile menu -->
			<li class="mobile-search-row">
				<form class="mobile-search" role="search"
				      action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
					<label for="mobile-search-input" class="sr-only">Search this site</label>
					<input type="search"
					       id="mobile-search-input"
					       class="mobile-search-input"
					       name="s"
					       placeholder="Search…"
					       autocomplete="off">
					<button type="submit" class="mobile-search-btn" aria-label="Submit search">
						<svg width="18" height="18" viewBox="0 0 24 24" fill="none"
						     stroke="currentColor" stroke-width="2"
						     stroke-linecap="round" stroke-linejoin="round"
						     aria-hidden="true">
							<circle cx="11" cy="11" r="8"/>
							<path d="M21 21l-4.35-4.35"/>
						</svg>
					</button>
				</form>
			</li>

			<li class="mobile-menu-divider" role="separator"></li>

			<!-- Donate CTA — prominent at top -->
			<li><a href="<?php echo esc_url( home_url( '/donate/' ) ); ?>" class="mobile-donate">Donate</a></li>

			<li class="mobile-menu-divider" role="separator"></li>

			<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>

			<li class="mobile-menu-divider" role="separator"></li>

			<!-- About section -->
			<li class="mobile-menu-heading" aria-hidden="true">About</li>
			<li><a href="<?php echo esc_url( home_url( '/our-story/' ) ); ?>">Our Story</a></li>
			<li><a href="<?php echo esc_url( home_url( '/timeline/' ) ); ?>">Timeline</a></li>
			<li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Contact Us</a></li>

			<li class="mobile-menu-divider" role="separator"></li>

			<!-- Housing section -->
			<li class="mobile-menu-heading" aria-hidden="true">Housing</li>
			<li><a href="<?php echo esc_url( home_url( '/accessible-housing/' ) ); ?>">Accessible Housing</a></li>
			<li><a href="<?php echo esc_url( home_url( '/margaret-edgson-manor/' ) ); ?>">Margaret Edgson Manor</a></li>
			<li><a href="<?php echo esc_url( home_url( '/apply/' ) ); ?>">Apply for Housing</a></li>

			<li class="mobile-menu-divider" role="separator"></li>

			<!-- News & FAQ section -->
			<li class="mobile-menu-heading" aria-hidden="true">News &amp; FAQ</li>
			<li><a href="<?php echo esc_url( home_url( '/faq/' ) ); ?>">FAQ</a></li>
			<li><a href="<?php echo esc_url( home_url( '/margaret-edgson-manor-rebuild-efforts/' ) ); ?>">Fire Updates</a></li>

			<li class="mobile-menu-divider" role="separator"></li>

			<li><a href="<?php echo esc_url( home_url( '/volunteer/' ) ); ?>">Volunteer</a></li>

			<li class="mobile-menu-divider" role="separator"></li>

			<!-- Legal section -->
			<li class="mobile-menu-heading" aria-hidden="true">Legal</li>
			<li><a href="<?php echo esc_url( home_url( '/privacy/' ) ); ?>">Privacy Policy</a></li>
			<li><a href="<?php echo esc_url( home_url( '/accessibility/' ) ); ?>">Accessibility Statement</a></li>
		</ul>
	</nav>
</header>
