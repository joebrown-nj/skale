# Assets

This directory contains the editable source files for the site's custom CSS and JavaScript.

## Source of truth

- Edit JavaScript in `assets/js/`
- Edit CSS in `assets/css/`
- Do not edit generated `*.min.js` or `*.min.css` files in `public_html/`

## Build output

The asset build pipeline writes minified files to:

- `public_html/js/`
- `public_html/css/`

These minified files are the files loaded by the site at runtime.

## Commands

- Build once: `npm run build:assets`
- Watch for changes: `npm run watch:assets`

## Current mapping

- `assets/js/main.js` → `public_html/js/main.min.js`
- `assets/css/style.css` → `public_html/css/style.min.css`
- `assets/css/blog.css` → `public_html/css/blog.min.css`
- `assets/css/contact.css` → `public_html/css/contact.min.css`
- `assets/css/templates.css` → `public_html/css/templates.min.css`
- `assets/css/landing.css` → `public_html/css/landing.min.css`
- `assets/css/thank-you.css` → `public_html/css/thank-you.min.css`
- `assets/css/headerFooterShow.css` → `public_html/css/headerFooterShow.min.css`
- `assets/css/headerFooterHide.css` → `public_html/css/headerFooterHide.min.css`

## Notes

- Page templates and AJAX-loaded page content should reference the built minified assets in `public_html/`
- If a new source file is added, also add it to `scripts/build-assets.mjs`
