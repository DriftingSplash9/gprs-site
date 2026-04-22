/* ============================================================
   GPRS Starfield + Comets
   Updated: 2026-03-22

   Standalone engine — does NOT touch theme toggle or nav.
   Those are handled by gprs-theme.js and submenus.js.

   BEHAVIOUR:
   - Dark mode only (checks for .gprs-dark on <html>)
   - Pauses (clears canvas) in light mode — loop stays alive
     so it resumes instantly when user switches back to dark
   - Respects prefers-reduced-motion: reduce — won't start at all
   - Desktop (>768px): 315 stars across 3 layers + comets
   - Mobile (≤768px): 80 stars, 2 layers, no comets, throttled to ~30fps
   - Canvas is fixed fullscreen behind all content (z-index: -1)
   - Resizes with viewport

   REQUIRES:
   - <canvas id="gprs-starfield"> in the DOM (added by PHP hook)
   ============================================================ */

(function () {
	'use strict';

	var MOBILE = window.matchMedia('(max-width: 768px)').matches;
	var REDUCED_MOTION = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
	var running = false;

	function init() {
		if (REDUCED_MOTION) return;
		if (running) return;

		var canvas = document.getElementById('gprs-starfield');
		if (!canvas) return;

		var ctx = canvas.getContext('2d');
		if (!ctx) return;

		running = true;

		var animationFrameId = null;
		var w, h, cx, cy;

		function resize() {
			w = canvas.width = window.innerWidth;
			h = canvas.height = window.innerHeight;
			cx = w * 0.5;
			cy = -h * 1.0;
		}

		window.addEventListener('resize', resize);
		resize();

		var maxDim = Math.max(w, h);

		/* ============================================================
		   STAR LAYERS
		   Desktop: 3 layers, 315 stars total
		   Mobile:  2 layers, 80 stars total (smaller, fewer)
		   ============================================================ */
		var LAYERS;

		if (MOBILE) {
			LAYERS = [
				{ count: 50, speed: 0.0020, rMin: maxDim * 0.8, rMax: maxDim * 3.0, size: 1.8, opacity: 0.35 },
				{ count: 30, speed: 0.0030, rMin: maxDim * 0.6, rMax: maxDim * 2.0, size: 2.8, opacity: 0.50 }
			];
		} else {
			LAYERS = [
				{ count: 185, speed: 0.0032, rMin: maxDim * 0.7, rMax: maxDim * 2.5, size: 1.5, opacity: 0.35 },
				{ count: 105, speed: 0.0018, rMin: maxDim * 0.6, rMax: maxDim * 2.0, size: 2.0, opacity: 0.45 },
				{ count: 25,  speed: 0.0054, rMin: maxDim * 0.9, rMax: maxDim * 4.0, size: 4.8, opacity: 0.60 }
			];
		}

		var stars = [];
		LAYERS.forEach(function (L, layerIndex) {
			for (var i = 0; i < L.count; i++) {
				stars.push({
					layer: layerIndex,
					angle: Math.random() * Math.PI * 2,
					radius: L.rMin + Math.random() * (L.rMax - L.rMin)
				});
			}
		});

		/* ============================================================
		   COMETS — desktop only
		   ============================================================ */
		var comets = [];
		var COMET_RATE = 0.00015;

		function spawnComet() {
			if (MOBILE) return;
			if (Math.random() >= COMET_RATE) return;

			var edge = Math.floor(Math.random() * 4);
			var x, y, ang;

			switch (edge) {
				case 0: x = -80; y = Math.random() * h; ang = Math.random() * Math.PI - Math.PI / 2; break;
				case 1: x = Math.random() * w; y = -80; ang = Math.PI / 2 + (Math.random() * Math.PI / 3 - Math.PI / 6); break;
				case 2: x = w + 80; y = Math.random() * h; ang = Math.PI + (Math.random() * Math.PI - Math.PI / 2); break;
				case 3: x = Math.random() * w; y = h + 80; ang = -Math.PI / 2 + (Math.random() * Math.PI / 3 - Math.PI / 6); break;
			}

			var speed = 140 + Math.random() * 80;
			var life = 3.0 + Math.random() * 2.5;

			comets.push({
				x: x, y: y,
				vx: Math.cos(ang) * speed,
				vy: Math.sin(ang) * speed,
				life: life,
				age: 0
			});
		}

		/* ============================================================
		   DRAW HELPERS
		   ============================================================ */
		function glow(x, y, size, a) {
			var g = ctx.createRadialGradient(x, y, 0, x, y, size);
			g.addColorStop(0, 'rgba(255,255,255,' + a + ')');
			g.addColorStop(1, 'rgba(255,255,255,0)');
			ctx.fillStyle = g;
			ctx.beginPath();
			ctx.arc(x, y, size, 0, Math.PI * 2);
			ctx.fill();
		}

		/* ============================================================
		   ANIMATION LOOP
		   Mobile: throttle to ~30fps to save battery
		   ============================================================ */
		var last = performance.now();
		var mobileFrameInterval = 1000 / 30;
		var mobileAccum = 0;

		function frame(now) {
			var dt = Math.min((now - last) / 1000, 0.1);
			last = now;

			/* Light mode — stop the loop entirely; MutationObserver will restart on theme flip */
			if (!document.documentElement.classList.contains('gprs-dark')) {
				ctx.clearRect(0, 0, w, h);
				animationFrameId = null;
				return;
			}

			/* Mobile throttle: skip frames to target ~30fps */
			if (MOBILE) {
				mobileAccum += dt * 1000;
				if (mobileAccum < mobileFrameInterval) {
					animationFrameId = requestAnimationFrame(frame);
					return;
				}
				mobileAccum = 0;
			}

			ctx.clearRect(0, 0, w, h);

			/* ---- STARS ---- */
			for (var i = 0; i < stars.length; i++) {
				var s = stars[i];
				var L = LAYERS[s.layer];
				s.angle += L.speed * dt;
				var x = cx + Math.cos(s.angle) * s.radius;
				var y = cy + Math.sin(s.angle) * s.radius;
				var twinkle = L.opacity * (0.6 + Math.random() * 0.4);
				glow(x, y, L.size, twinkle);
			}

			/* ---- COMETS (desktop only) ---- */
			if (!MOBILE) {
				spawnComet();

				for (var c = comets.length - 1; c >= 0; c--) {
					var cm = comets[c];
					cm.age += dt;

					if (cm.age >= cm.life) {
						comets.splice(c, 1);
						continue;
					}

					cm.x += cm.vx * dt;
					cm.y += cm.vy * dt;

					var t = cm.age / cm.life;
					var op = 0.88 * (1 - t);

					/* Trail */
					var trailLen = 187;
					var norm = Math.hypot(cm.vx, cm.vy) || 1;
					var ex = cm.x - (cm.vx / norm) * trailLen;
					var ey = cm.y - (cm.vy / norm) * trailLen;

					var grad = ctx.createLinearGradient(cm.x, cm.y, ex, ey);
					grad.addColorStop(0, 'rgba(255,255,255,' + op + ')');
					grad.addColorStop(0.35, 'rgba(0,102,204,' + (op * 0.7) + ')');
					grad.addColorStop(1, 'rgba(0,102,204,0)');

					ctx.strokeStyle = grad;
					ctx.lineWidth = 2;
					ctx.beginPath();
					ctx.moveTo(cm.x, cm.y);
					ctx.lineTo(ex, ey);
					ctx.stroke();

					/* Head glow */
					glow(cm.x, cm.y, 3, Math.min(1, op + 0.3));

					/* Blue core */
					ctx.fillStyle = 'rgba(0,102,204,' + (op * 0.4) + ')';
					ctx.beginPath();
					ctx.arc(cm.x, cm.y, 2, 0, Math.PI * 2);
					ctx.fill();
				}
			}

			animationFrameId = requestAnimationFrame(frame);
		}

		function startIfDark() {
			if (animationFrameId !== null) return;
			if (!document.documentElement.classList.contains('gprs-dark')) return;
			last = performance.now();
			animationFrameId = requestAnimationFrame(frame);
		}

		startIfDark();

		new MutationObserver(startIfDark).observe(document.documentElement, {
			attributes: true,
			attributeFilter: ['class']
		});
	}

	/* ============================================================
	   KICK OFF
	   ============================================================ */
	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', init);
	} else {
		init();
	}

})();
