# Agent guide — GPRS website (astra-child)

> Loaded by Claude Code via `CLAUDE.md` (`@AGENTS.md`) and read directly by other AI tools.
> Read before making changes.

## What this is

The custom **Astra child theme** for the **Grande Prairie Residential Society (GPRS)** site.
It is one of several sites the user maintains, and **they are not built the same way** — do
not assume conventions from other sites carry over except where noted.

- **Live URL:** https://gpresidentialsociety.com
- **This repo is the source of truth.** Remote `github.com/DriftingSplash9/gprs-site`,
  branch `main`. **No CI — the user deploys the theme manually.** Keep repo and live in sync.
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
3. The user deploys the theme to the live server.

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
— finish the unit first. This repo has no CI, so also remind the user the theme still needs a
manual deploy to the live server (see "How to edit" above) — a push here does not go live by
itself, unlike TC.

## Gotchas

- The two connected WordPress MCP connectors are **not** this site (`thomascheesman` = the
  user's portfolio, `bareyourrare` = a different site). No MCP connector is wired to GPRS —
  edits go through this repo or the wp-admin Theme File Editor.
- Keep the em-dash as the `&mdash;` HTML entity to match existing markup.
- MEM (Margaret Edgson Manor) physical address is **11010 107A Avenue**; 10120 Hillside Drive
  is a mailing address. GPRS mail goes c/o Grande Spirit Foundation, 9503 102 Ave.
- Cross-site agent diary lives at `C:\Users\thoma\Desktop\My Files\Claude-Diary\diary.csv`
  (covers BYR / GPRS / TC).
