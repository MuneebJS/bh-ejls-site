# Insynia — WordPress Theme

**Insynia** is the standalone WordPress theme from [Insynia](https://insynia.ai). Use it on any self-hosted WordPress site: no page builders, no block-editor lock-in, no CSS frameworks — PHP, semantic HTML5, and vanilla CSS with custom properties.

---

## Download the theme

### Option A — ZIP upload (simplest)

1. On GitHub, open this repo → **Code** → **Download ZIP**.
2. Optional: unzip and rename the folder to `insynia` (any name works; this keeps paths aligned with the docs below).
3. In WordPress: **Appearance → Themes → Add New → Upload Theme** → select the ZIP (GitHub’s ZIP already has `style.css` and `functions.php` at the correct depth inside one top-level folder).
4. **Activate** the theme under **Appearance → Themes**.

### Option B — Git clone

```bash
cd wp-content/themes
git clone <this-repository-url> insynia
```

Then activate **Insynia** under **Appearance → Themes**.

### Option C — GitHub Releases (when available)

If maintainers publish versioned assets, download the **`insynia.zip`** (or similarly named) file from the **Releases** page and upload it under **Appearance → Themes → Add New → Upload Theme**. Release zips are the most predictable layout for uploads.

---

## After activation

- **WP Admin → Appearance → Themes** — confirm **Insynia** is active.
- Optional: **Settings → Reading** → **A static page** if you want a dedicated homepage.

**Requirements:** WordPress 6.0+, PHP 8.0+.

---

## What’s in the box

| File / Directory | Purpose |
|---|---|
| `style.css` | WordPress theme header. Do not add real styles here. |
| `functions.php` | Thin bootstrap. Auto-loads `inc/*.php` and `inc/features/*.php`. |
| `index.php`, `front-page.php`, `page.php`, `single.php`, `archive.php`, `search.php`, `404.php` | Core template hierarchy. |
| `header.php`, `footer.php`, `sidebar.php`, `comments.php` | Document shell + widget area + comments. |
| `template-parts/global/` | Header and footer markup (swap these to restyle the chrome). |
| `template-parts/content/` | Post / page / empty-state content loops. |
| `inc/setup.php` | Theme supports, image sizes, text domain. |
| `inc/enqueue.php` | CSS/JS registration in strict dependency order. |
| `inc/nav-menus.php` | Registers `primary`, `footer`, `social` menu locations. |
| `inc/widgets.php` | Registers main + footer sidebars. |
| `inc/features/` | **Drop-in feature modules.** Auto-loaded. See "Adding features" below. |
| `assets/css/variables.css` | **All design tokens live here.** Rebrand from a single file. |
| `assets/css/reset.css` | Modern CSS reset. |
| `assets/css/base.css` | Document-level typography and baseline styles. |
| `assets/css/layout.css` | Containers, grids, site shell, header/footer structure. |
| `assets/css/components.css` | Buttons, forms, cards, nav, pagination, comments. |
| `assets/css/features/` | Per-feature stylesheets, one file per feature module. |
| `assets/js/main.js` | Small core JS (mobile nav, etc.). Features bring their own JS. |
| `languages/` | `.pot` / `.po` / `.mo` translation files. |

---

## Tech stack & principles

- **PHP 8.0+** — typed where it helps, escaping everywhere, no framework.
- **Vanilla CSS** with custom properties, `color-mix()`, logical properties, and modern features. No preprocessor required.
- **Vanilla JS** — no jQuery, no build step. Drop-in by default.
- **Semantic HTML5** — `<header>`, `<main>`, `<nav>`, `<article>`, `<aside>`, `<footer>`.
- **Mobile-first** responsive design (`min-width` queries only).
- **WCAG AA** accessibility goals — skip link, focus rings, `prefers-reduced-motion`, `prefers-color-scheme`.
- **Dark mode** via `prefers-color-scheme` plus a manual `[data-theme="dark"]` override hook.
- **Zero external dependencies** at runtime.

---

## Customization

### 1. Rebrand

Edit `assets/css/variables.css`. Every color, font, spacing value, radius, and shadow in the theme is a CSS custom property declared there. Update the palette tokens (`--color-primary-*`, `--color-secondary-*`, `--color-accent-*`) and the rest of the theme follows.

```css
:root {
    --color-primary-500: #your-brand-color;
    /* Shade tokens 50–900 interpolate from this. */
}
```

Do **not** hardcode hex values, px measurements, or box-shadows anywhere else.

### 2. Typography

Swap `--font-heading` / `--font-body` in `variables.css`. If loading a web font, add the `<link>` via a feature module at `inc/features/fonts.php` and let `enqueue.php` pick it up through `wp_head()`.

### 3. Adding pages / post types

- **New static templates** (e.g. about, contact): use the WP admin and a Page Template via a commented header:

  ```php
  <?php
  /* Template Name: Landing Page */
  get_header();
  // ... custom markup ...
  get_footer();
  ```

- **New custom post types**: create `inc/features/cpt-{name}.php` following the feature pattern below. Add matching `single-{cpt}.php` / `archive-{cpt}.php` templates at the theme root as needed.

### 4. Adding features (the core pattern)

A feature = one drop-in PHP file. `functions.php` globs and auto-loads every `inc/features/*.php`, so adding a feature **requires no edits to existing files**.

```
inc/features/testimonials.php       ← PHP: CPT, shortcode, hooks
assets/css/features/testimonials.css ← Styles (optional)
assets/js/testimonials.js            ← Script (optional)
template-parts/testimonials/card.php ← Markup (optional)
```

Every feature file must:

1. Begin with `<?php defined( 'ABSPATH' ) || exit;`
2. Self-enqueue its own CSS/JS, depending on `insynia-components`:

```php
add_action( 'wp_enqueue_scripts', function () {
    wp_enqueue_style(
        'insynia-testimonials',
        INSYNIA_URI . '/assets/css/features/testimonials.css',
        array( 'insynia-components' ),
        INSYNIA_VERSION
    );
} );
```

Removing a feature = delete its file. No cleanup elsewhere.

### 5. Global constants

Defined in `functions.php` for convenience in feature modules:

- `INSYNIA_VERSION` — current theme version string (cache-busting).
- `INSYNIA_DIR` — absolute path to the theme directory.
- `INSYNIA_URI` — URL to the theme directory.

---

## CSS load order

`enqueue.php` registers styles with explicit `$deps` so WordPress always prints them in this order:

1. `variables.css` — design tokens
2. `reset.css` — normalize box model / defaults
3. `base.css` — typography & document basics
4. `layout.css` — containers, grids, site shell
5. `components.css` — UI pieces
6. `assets/css/features/*.css` — per-feature (self-enqueued, depends on `components`)

JS is deferred by default via a filter; add handles to the `insynia_deferred_scripts` filter to extend.

---

## Navigation menus

After activation, visit **Appearance → Menus** and assign menus to:

- **Primary Navigation** — renders in the sticky site header.
- **Footer Navigation** — renders in the footer top section.
- **Social Links** — renders in the footer bottom row.

---

## Accessibility

- Skip link (`.skip-link`) appears on focus.
- Every interactive element has a `:focus-visible` state with a visible ring.
- Mobile menu closes on Escape and moves focus back to the toggle.
- `prefers-reduced-motion` is honored in `reset.css`.
- All images receive native `loading="lazy"` (except `eager` on featured/hero images).

When adding components, preserve these defaults and test with keyboard navigation.

---

## Project layout diagram

```
insynia/
├── style.css                    ← WP theme header
├── functions.php                ← Thin bootstrap (glob loader)
├── index.php  front-page.php  page.php  single.php  archive.php
├── search.php  404.php
├── header.php  footer.php  sidebar.php  comments.php
│
├── template-parts/
│   ├── content/
│   │   ├── content.php          ← Default loop card
│   │   ├── content-page.php
│   │   ├── content-single.php
│   │   └── content-none.php
│   └── global/
│       ├── site-header.php
│       └── site-footer.php
│
├── inc/
│   ├── setup.php                ← theme_support, image sizes, i18n
│   ├── enqueue.php              ← CSS/JS registration
│   ├── nav-menus.php
│   ├── widgets.php
│   └── features/                ← Drop features here
│
├── assets/
│   ├── css/
│   │   ├── variables.css        ← Design tokens (rebrand here)
│   │   ├── reset.css
│   │   ├── base.css
│   │   ├── layout.css
│   │   ├── components.css
│   │   ├── editor-style.css
│   │   └── features/            ← Per-feature styles
│   ├── js/
│   │   └── main.js
│   └── images/
│
└── languages/
```

---

## Contributing & support

- **Bugs and improvements:** use this repository’s **Issues** and **Pull Requests** on GitHub.
- **Insynia product questions:** see [https://insynia.ai](https://insynia.ai).

This theme is maintained for use with standard self-hosted WordPress. Always back up your site before updating or replacing a theme.

---

## License

MIT. See [`LICENSE`](LICENSE).
