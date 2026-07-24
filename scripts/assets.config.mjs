export const cssSourceRoot = 'assets/css';
export const jsSourceRoot = 'assets/js';
export const publicCssRoot = 'public_html/css';
export const publicJsRoot = 'public_html/js';

export const cssAssets = [
    [`${cssSourceRoot}/style.css`, `${publicCssRoot}/style.min.css`],
    [`${cssSourceRoot}/blog.css`, `${publicCssRoot}/blog.min.css`],
    [`${cssSourceRoot}/home.css`, `${publicCssRoot}/home.min.css`],
    [`${cssSourceRoot}/contact.css`, `${publicCssRoot}/contact.min.css`],
    [`${cssSourceRoot}/templates.css`, `${publicCssRoot}/templates.min.css`],
    [`${cssSourceRoot}/landing.css`, `${publicCssRoot}/landing.min.css`],
    [`${cssSourceRoot}/thank-you.css`, `${publicCssRoot}/thank-you.min.css`],
    [`${cssSourceRoot}/headerFooterShow.css`, `${publicCssRoot}/headerFooterShow.min.css`],
    [`${cssSourceRoot}/headerFooterHide.css`, `${publicCssRoot}/headerFooterHide.min.css`]
];

export const jsAssets = [
    [`${jsSourceRoot}/google.js`, `${publicJsRoot}/google.min.js`],
    [`${jsSourceRoot}/main.js`, `${publicJsRoot}/main.min.js`],
];
