<?php
/**
 * GPRS Newsletter Signup — Brevo Form Integration
 *
 * Registers [gprs_newsletter] shortcode.
 * Outputs the Brevo embedded form restyled with GPRS tokens.
 *
 * Usage:
 *   [gprs_newsletter]                — default (with header image)
 *   [gprs_newsletter show_image="0"] — hide the header image
 *
 * Brevo's JavaScript (main.js) handles form submission,
 * validation, success/error messages, and reCAPTCHA.
 *
 * IMPORTANT — SCRIPT LOADING:
 * Brevo's main.js requires a specific load order:
 *   1. Config variables (window.LOCALE, etc.) — inline, before main.js
 *   2. main.js — deferred
 *   3. reCAPTCHA api.js — standard (not deferred)
 * Using wp_enqueue_script breaks this order and causes
 * submission failures. Scripts are output directly via
 * wp_footer hook instead.
 *
 * PRIVACY CHECKBOX:
 * A required checkbox linking to /privacy/ is added between
 * the email field and reCAPTCHA. A small inline script
 * intercepts form submission and blocks it if unchecked,
 * since Brevo's main.js doesn't know about custom fields.
 *
 * @package Astra Child
 * @since   2.0.0
 * Updated: 2026-03-27
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register [gprs_newsletter] shortcode.
 */
function gprs_newsletter_shortcode( $atts ) {
	$atts = shortcode_atts(
		array(
			'show_image' => '1', // Set to "0" to hide the banner image
		),
		$atts,
		'gprs_newsletter'
	);

	$show_image = (bool) $atts['show_image'];

	// Enqueue Brevo CSS in <head> (safe via wp_enqueue)
	wp_enqueue_style(
		'brevo-sib-styles',
		'https://sibforms.com/forms/end-form/build/sib-styles.css',
		array(),
		null
	);

	// Flag that the form is on this page so footer scripts fire
	if ( ! defined( 'GPRS_NEWSLETTER_ACTIVE' ) ) {
		define( 'GPRS_NEWSLETTER_ACTIVE', true );
	}

	// Build the privacy policy URL
	$privacy_url = esc_url( home_url( '/privacy/' ) );

	// Buffer output
	ob_start();
	?>
	<div class="gprs-newsletter" role="region" aria-label="Newsletter signup">
		<div class="sib-form" style="text-align: center;
         background-color: #EFF2F7;                                 ">
			<div id="sib-form-container" class="sib-form-container">

				<!-- Error message (hidden by default, shown by Brevo JS) -->
				<div id="error-message" class="sib-form-message-panel" style="font-size:16px; text-align:left; font-family:Helvetica, sans-serif; color:#661d1d; background-color:#ffeded; border-radius:3px; border-color:#ff4949;max-width:540px;">
					<div class="sib-form-message-panel__text sib-form-message-panel__text--center">
						<svg viewBox="0 0 512 512" class="sib-icon sib-notification__icon">
							<path d="M256 40c118.621 0 216 96.075 216 216 0 119.291-96.61 216-216 216-119.244 0-216-96.562-216-216 0-119.203 96.602-216 216-216m0-32C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm-11.49 120h22.979c6.823 0 12.274 5.682 11.99 12.5l-7 168c-.268 6.428-5.556 11.5-11.99 11.5h-8.979c-6.433 0-11.722-5.073-11.99-11.5l-7-168c-.283-6.818 5.167-12.5 11.99-12.5zM256 340c-15.464 0-28 12.536-28 28s12.536 28 28 28 28-12.536 28-28-12.536-28-28-28z" />
						</svg>
						<span class="sib-form-message-panel__inner-text">
                          Your subscription could not be saved. Please try again. 
                      </span>
					</div>
				</div>
				<div></div>
				<!-- Success message (hidden by default, shown by Brevo JS) -->
				<div id="success-message" class="sib-form-message-panel" style="font-size:16px; text-align:left; font-family:Helvetica, sans-serif; color:#085229; background-color:#e7faf0; border-radius:3px; border-color:#13ce66;max-width:540px;">
					<div class="sib-form-message-panel__text sib-form-message-panel__text--center">
						<svg viewBox="0 0 512 512" class="sib-icon sib-notification__icon">
							<path d="M256 8C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 464c-118.664 0-216-96.055-216-216 0-118.663 96.055-216 216-216 118.664 0 216 96.055 216 216 0 118.663-96.055 216-216 216zm141.63-274.961L217.15 376.071c-4.705 4.667-12.303 4.637-16.97-.068l-85.878-86.572c-4.667-4.705-4.637-12.303.068-16.97l8.52-8.451c4.705-4.667 12.303-4.637 16.97.068l68.976 69.533 163.441-162.13c4.705-4.667 12.303-4.637 16.97.068l8.451 8.52c4.668 4.705 4.637 12.303-.068 16.97z" />
						</svg>
						<span class="sib-form-message-panel__inner-text">
                          Your subscription has been successful.
                      </span>
					</div>
				</div>
				<div></div>

				<!-- Main form container -->
				<div id="sib-container" class="sib-container--large sib-container--vertical" style="text-align:center; background-color:rgba(255,255,255,1); max-width:540px; border-radius:3px; border-width:1px; border-color:#C0CCD9; border-style:solid; direction:ltr">
					<form id="sib-form" method="POST" action="https://46d7b6a0.sibforms.com/serve/MUIFAA-Hb_n6lH7WYAcz6dE9vEPI1HNhPNYBe81S2-RSQPq4kOUf9T3iDEGLwB9X2ENuIAFGxiG9GMiu6-hnJIw2D2Y78QjKGFB7wVEIwElXUPhOWr_I2U-W3LpUixBxpgv59x3dsnxrOV3Wrh3wgTGS-H9oVoklCSS32Wc8cRwacZmBlY9lFenliWKZIlxBxti1FQtzbKUmkIMyrQ==" data-type="subscription">

						<?php if ( $show_image ) : ?>
						<!-- Header image -->
						<div style="padding: 8px 0;">
							<div class="sib-form-block sib-image-form-block" style="text-align: center">
								<img src="https://img.mailinblue.com/10701023/images/content_library/original/69c5f53fb5f2e2dbde9e1e6b.png" style="width: 500px;height: 174px;" alt="" title="" />
							</div>
						</div>
						<?php endif; ?>

						<!-- Title -->
						<div style="padding: 8px 0;">
							<div class="sib-form-block" style="font-size:32px; text-align:left; font-weight:700; font-family:Helvetica, sans-serif; color:#3C4858; background-color:transparent; text-align:left">
								<p>Newsletter</p>
							</div>
						</div>

						<!-- Divider -->
						<div style="padding: 8px 0;">
							<div class="sib-form-block sib-divider-form-block">
								<div style="border: 0; border-bottom: 1px solid #0066cc"></div>
							</div>
						</div>

						<!-- Description -->
						<div style="padding: 8px 0;">
							<div class="sib-form-block" style="font-size:16px; text-align:left; font-family:Helvetica, sans-serif; color:#3C4858; background-color:transparent; text-align:left">
								<div class="sib-text-form-block">
									<p>Subscribe to our newsletter and stay updated.</p>
								</div>
							</div>
						</div>

						<!-- Email field -->
						<div style="padding: 8px 0;">
							<div class="sib-input sib-form-block">
								<div class="form__entry entry_block">
									<div class="form__label-row ">
										<label class="entry__label" style="font-weight: 700; text-align:left; font-size:16px; text-align:left; font-weight:700; font-family:Helvetica, sans-serif; color:#3c4858;" for="EMAIL" data-required="*">Enter your email address to subscribe</label>

										<div class="entry__field">
											<input class="input " type="text" id="EMAIL" name="EMAIL" autocomplete="off" placeholder="EMAIL" data-required="true" required />
										</div>
									</div>

									<label class="entry__error entry__error--primary" style="font-size:16px; text-align:left; font-family:Helvetica, sans-serif; color:#661d1d; background-color:#ffeded; border-radius:3px; border-color:#ff4949;">
									</label>
									<label class="entry__specification" style="font-size:12px; text-align:left; font-family:Helvetica, sans-serif; color:#8390A4; text-align:left">
										Provide your email address to subscribe. For e.g abc@xyz.com
									</label>
								</div>
							</div>
						</div>

						<!-- Privacy policy checkbox -->
						<div style="padding: 8px 0;">
							<div class="sib-form-block gprs-privacy-consent">
								<div class="gprs-privacy-row">
									<input type="checkbox" id="gprs-privacy-accept" name="gprs_privacy_accept" required aria-required="true" />
									<label for="gprs-privacy-accept">
										I have read and agree to the <a href="<?php echo $privacy_url; ?>" target="_blank" rel="noopener noreferrer">Privacy Policy</a> <span class="gprs-required-asterisk" aria-hidden="true">*</span>
									</label>
								</div>
								<div class="gprs-privacy-error" id="gprs-privacy-error" role="alert" aria-live="polite"></div>
							</div>
						</div>

						<!-- Divider -->
						<div style="padding: 8px 0;">
							<div class="sib-form-block sib-divider-form-block">
								<div style="border: 0; border-bottom: 1px solid #0066cc"></div>
							</div>
						</div>

						<!-- reCAPTCHA -->
						<div style="padding: 8px 0;">
							<div class="sib-captcha sib-form-block">
								<div class="form__entry entry_block">
									<div class="form__label-row ">
										<script>
											function handleCaptchaResponse() {
												var event = new Event('captchaChange');
												document.getElementById('sib-captcha').dispatchEvent(event);
											}
										</script>
										<div class="g-recaptcha sib-visible-recaptcha" id="sib-captcha" data-sitekey="6Ld7QJssAAAAAEpbTfcIqmJflp23aoDzNFHBoro3" data-callback="handleCaptchaResponse" style="direction:ltr"></div>
									</div>
									<label class="entry__error entry__error--primary" style="font-size:16px; text-align:left; font-family:Helvetica, sans-serif; color:#661d1d; background-color:#ffeded; border-radius:3px; border-color:#ff4949;">
									</label>
								</div>
							</div>
						</div>

						<!-- Submit button -->
						<div style="padding: 8px 0;">
							<div class="sib-form-block" style="text-align: left">
								<button class="sib-form-block__button sib-form-block__button-with-loader" style="font-size:16px; text-align:left; font-weight:700; font-family:Helvetica, sans-serif; color:#FFFFFF; background-color:#3E4857; border-radius:3px; border-width:0px;" form="sib-form" type="submit">
									<svg class="icon clickable__icon progress-indicator__icon sib-hide-loader-icon" viewBox="0 0 512 512" style="">
										<path d="M460.116 373.846l-20.823-12.022c-5.541-3.199-7.54-10.159-4.663-15.874 30.137-59.886 28.343-131.652-5.386-189.946-33.641-58.394-94.896-95.833-161.827-99.676C261.028 55.961 256 50.751 256 44.352V20.309c0-6.904 5.808-12.337 12.703-11.982 83.556 4.306 160.163 50.864 202.11 123.677 42.063 72.696 44.079 162.316 6.031 236.832-3.14 6.148-10.75 8.461-16.728 5.01z" />
									</svg>
									SUBSCRIBE
								</button>
							</div>
						</div>

						<!-- Honeypot (anti-spam) -->
						<input type="text" name="email_address_check" value="" class="input--hidden">
						<input type="hidden" name="locale" value="en">

					</form>
				</div>

			</div>
		</div>
	</div>
	<?php
	return ob_get_clean();
}
add_shortcode( 'gprs_newsletter', 'gprs_newsletter_shortcode' );


/**
 * Output Brevo scripts + privacy checkbox validation in footer.
 *
 * Brevo's main.js expects:
 *   1. Config variables set on window (before main.js)
 *   2. main.js loaded with defer
 *   3. reCAPTCHA api.js loaded normally (not deferred)
 *
 * The privacy checkbox validation intercepts form submission
 * BEFORE Brevo's handler fires. If the checkbox isn't checked,
 * submission is blocked and an error message shown.
 *
 * Only outputs when [gprs_newsletter] shortcode is on the page.
 */
function gprs_newsletter_footer_scripts() {
	if ( ! defined( 'GPRS_NEWSLETTER_ACTIVE' ) ) {
		return;
	}
	?>
	<script>
		window.REQUIRED_CODE_ERROR_MESSAGE = 'Please choose a country code';
		window.LOCALE = 'en';
		window.EMAIL_INVALID_MESSAGE = window.SMS_INVALID_MESSAGE = "The information provided is invalid. Please review the invalid information and try again.";

		window.REQUIRED_ERROR_MESSAGE = "This field cannot be left blank. Please fill in the required information. ";

		window.GENERIC_INVALID_MESSAGE = "The information provided is invalid. Please review the invalid information and try again.";




		window.translation = {
			common: {
				selectedList: '{quantity} list selected',
				selectedLists: '{quantity} lists selected',
				selectedOption: '{quantity} selected',
				selectedOptions: '{quantity} selected',
			}
		};

		var AUTOHIDE = Boolean(0);
	</script>

	<script defer src="https://sibforms.com/forms/end-form/build/main.js"></script>

	<script src="https://www.google.com/recaptcha/api.js?hl=en"></script>

	<script>
	/* ============================================================
	   GPRS Privacy Checkbox Validation
	   ============================================================
	   Brevo's main.js doesn't know about our custom checkbox.
	   This listener intercepts the submit event in the CAPTURE
	   phase (fires before Brevo's handler) and blocks submission
	   if the privacy checkbox is unchecked.
	   ============================================================ */
	document.addEventListener('DOMContentLoaded', function() {
		var form = document.getElementById('sib-form');
		var checkbox = document.getElementById('gprs-privacy-accept');
		var errorEl = document.getElementById('gprs-privacy-error');

		if (!form || !checkbox || !errorEl) return;

		form.addEventListener('submit', function(e) {
			if (!checkbox.checked) {
				e.preventDefault();
				e.stopImmediatePropagation();
				errorEl.textContent = 'You must accept the Privacy Policy to subscribe.';
				errorEl.style.display = 'block';
				checkbox.focus();
				return false;
			}
			/* Clear any previous error when valid */
			errorEl.textContent = '';
			errorEl.style.display = 'none';
		}, true); /* true = capture phase, fires BEFORE Brevo */

		/* Clear error when user checks the box */
		checkbox.addEventListener('change', function() {
			if (checkbox.checked) {
				errorEl.textContent = '';
				errorEl.style.display = 'none';
			}
		});
	});
	</script>
	<?php
}
add_action( 'wp_footer', 'gprs_newsletter_footer_scripts', 99 );


/**
 * Helper: Does the current page contain [gprs_newsletter]?
 * Used by functions.php to conditionally enqueue CSS.
 */
function gprs_page_has_newsletter() {
	if ( is_singular() ) {
		$post = get_queried_object();
		if ( $post && ! empty( $post->post_content ) ) {
			return has_shortcode( $post->post_content, 'gprs_newsletter' );
		}
	}
	return false;
}
