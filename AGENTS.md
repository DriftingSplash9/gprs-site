# Agent guide — GPRS website (astra-child)

> Loaded by Claude Code via `CLAUDE.md` (`@AGENTS.md`) and read directly by other AI tools.
> Read before making changes.

## What this is

The custom **Astra child theme** for the **Grande Prairie Residential Society (GPRS)** site.
It is one of several sites the user maintains, and **they are not built the same way** — do
not assume conventions from other sites carry over except where noted.

- **Live URL:** https://gpresidentialsociety.com
- **This repo is the source of truth.** Remote `github.com/DriftingSplash9/gprs-site`,
  branch `main`. **Pushing to `main` AUTO-DEPLOYS to the live site** — see "Deploying" below.
- **Stack:** WordPress, **Astra** parent theme + this hand-coded child theme (slug `astra-child`).

## How the pages are built (important, non-obvious)

The WordPress "Pages" are **empty** — no Gutenberg blocks, no page builder. Each page is
assembled by this child theme:

- **Body content:** `inc/<name>-content.php` self-hooks onto `astra_primary_content_top`,
  gated on `is_page('<slug>')`, `require`d from `functions.php`.
- **Hero section:** `inc/hero.php` — a single slug-matched `if / elseif` chain; the hero text
  for each page lives here (e.g. the Margaret Edgson Manor rebuild hero is the
  `is_page('margaret-edgson-manor-rebuild-efforts')` branch, `<p class="hero-mission">`).
- **Styling:** numbered CSS modules in `css/` (e.g. `13-fire-rebuild.css`), conditionally
  enqueued in `functions.php`. Page-scoped BEM classes (`hero--fire-rebuild`, `gprs-fire__*`).
  Dark-mode selector is `html.gprs-dark`.
- **SEO plugin:** Rank Math.

Because content is in theme PHP, searching the WP page editor for on-page text finds
nothing — look in `inc/*.php` here instead.

## How to edit

**Preferred (keeps history + survives deploys):**
1. Edit the file in this repo (`inc/…` or `css/…`).
2. Commit and push to `main`.
3. That's it — the push is the deploy. See the warning below before you push.

### Deploying — ⚠️ A PUSH TO `main` GOES LIVE BY ITSELF

**This repo auto-deploys.** Pushing to `main` puts the change on
https://gpresidentialsociety.com within a minute or two. There is no manual upload step and
no approval gate in between. Verified 2026-09-18 by curling the live pages straight after a
push; earlier versions of this file, and the user's own notes, wrongly said "no CI, manual
deploy" — they were wrong, and that error caused unapproved copy to be published.

The site is **Hostinger** shared hosting (LiteSpeed, PHP 8.3) with self-hosted
**WordPress.org**. There are no GitHub Actions in this repo, so the deploy is server-side:
Hostinger's Git auto-deployment (hPanel → Advanced → GIT) pulling `main` on a webhook.
Theme path on the server:

```
domains/gpresidentialsociety.com/public_html/wp-content/themes/astra-child/
```

**What this means before you commit:**

- **Treat every push as publishing.** Copy that is awaiting board or marketing approval, or
  that depends on a motion not yet declared carried, must NOT be pushed to `main`. Hold it on
  a branch, or keep it in a draft file outside the repo, until the gate clears.
- Run `php -l` on every changed file first. A syntax error in `functions.php` white-screens the
  live site the moment it lands — there is no staging copy to catch it.
- If any file in `css/` changed, bump `Version:` in `style.css` so the enqueue cache-busts.
- If a change does not appear, purge cache in both places: hPanel → Advanced → Cache Manager,
  and the LiteSpeed Cache plugin in wp-admin (Toolbox → Purge All).

To pull something back off the live site, revert and push — that deploys too:

```bash
git revert --no-edit <sha> && git push origin main
```

**Live hotfix via wp-admin Theme File Editor** (Appearance → Theme File Editor, theme
`astra-child`) edits the live server directly and takes effect immediately — but **does NOT
touch this repo**, so a later deploy will revert it. If you ever hotfix live, **mirror the
change back into this repo and commit**. The browser session must be logged into wp-admin
first; Claude cannot type the password.

## ⭐ Commit rule (cross-site — important)

**Commit-and-push is pre-authorized on GPRS** (changed 2026-08-04 — propose-and-wait was
slowing work down without having caught a real problem across ~50 hours of site work). Commit
and push a finished, reviewed unit of work without asking first, with a clear message. Still:
**stage explicit paths, never `git add .`**; don't push half-finished or unreviewed-risky work
— finish the unit first. ⚠️ **And remember a push here IS a publish** (see "Deploying"):
there is no manual deploy standing between a commit and the public site, so anything gated on
board or marketing approval must not be pushed to `main` at all.

## Gotchas

- The two connected WordPress MCP connectors are **not** this site (`thomascheesman` = the
  user's portfolio, `bareyourrare` = a different site). No MCP connector is wired to GPRS —
  edits go through this repo or the wp-admin Theme File Editor.
- Keep the em-dash as the `&mdash;` HTML entity to match existing markup.
- MEM (Margaret Edgson Manor) physical address is **11010 107A Avenue**; 10120 Hillside Drive
  is a mailing address. GPRS mail goes c/o Grande Spirit Foundation, 9503 102 Ave.
- Cross-site agent diary lives at `C:\Users\thoma\Desktop\My Files\Claude-Diary\diary.csv`
  (covers BYR / GPRS / TC).
