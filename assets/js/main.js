const offcanvasElement = document.getElementById('oCNav');
const bsOffcanvas = offcanvasElement ? new bootstrap.Offcanvas(offcanvasElement) : null;

const OVERLAY_FADE_MS = 300;
const OVERLAY_HIDE_DELAY_MS = 250;
const MENU_BAR_BG_CLASS = 'menu-bar-bg';
let overlayRequestCount = 0;
let overlayHideTimeoutId = null;

function buildUrl(path, params = {}) {
    const query = new URLSearchParams(params).toString();
    return query ? `${path}?${query}` : path;
}

function sanitizeTrackingEventName(value) {
    return typeof value === 'string' ? value.trim() : '';
}

function escapeHtml(value) {
    return String(value ?? '').replace(/[&<>"']/g, (character) => (
        {
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            '"': '&quot;',
            "'": '&#39;',
        }[character]
    ));
}

function normalizeMessages(messages) {
    if (Array.isArray(messages)) {
        return messages.filter(Boolean);
    }

    if (messages === null || messages === undefined || messages === '') {
        return [];
    }

    return [messages];
}

function renderAlert($form, type, messages) {
    const content = normalizeMessages(messages)
        .map((message) => escapeHtml(message))
        .join('<br>');

    if (!content) {
        return;
    }

    $form.prepend(`<div class="alert alert-${type}" role="alert">${content}</div>`);
}

function capitalizeFirstLetter(value) {
    return value.charAt(0).toUpperCase() + value.slice(1);
}

function removeAllAlerts() {
    $('.alert').remove();
}

function updateHeaderBackground(slug) {
    $('header.menu-bar').toggleClass(MENU_BAR_BG_CLASS, Boolean(slug && slug !== '/'));
}

function setActiveNavItem(url) {
    $('#oCNav .active').removeClass('active');

    const adjustedUrl = url === '/' || url === ''
        ? url
        : url.replace('/', '').replaceAll('/', '-').trim();

    if (url !== '/') {
        $(`.navbar-nav li.${adjustedUrl}`).addClass('active');
        return;
    }

    $('.navbar-nav li').first().addClass('active');
}

function showOverlay() {
    overlayRequestCount += 1;

    if (overlayHideTimeoutId) {
        window.clearTimeout(overlayHideTimeoutId);
        overlayHideTimeoutId = null;
    }

    if (overlayRequestCount === 1) {
        $('#overlay').stop(true, true).fadeIn(OVERLAY_FADE_MS);
    }

    $('body').css({ overflow: 'hidden', 'padding-right': '17px' });
}

function hideOverlay() {
    overlayRequestCount = Math.max(overlayRequestCount - 1, 0);

    if (overlayRequestCount > 0) {
        return;
    }

    overlayHideTimeoutId = window.setTimeout(() => {
        $('#overlay').stop(true, true).fadeOut(OVERLAY_FADE_MS);
        $('body').css({ overflow: 'auto', 'padding-right': '' });
        $('.modal-backdrop').hide();
        overlayHideTimeoutId = null;
    }, OVERLAY_HIDE_DELAY_MS);
}

function refreshAos(delay = 0) {
    if (typeof AOS === 'undefined') {
        return;
    }

    window.setTimeout(() => {
        AOS.refreshHard();
    }, delay);
}

function getManagedStylesheetSelector() {
    return 'link[rel="stylesheet"][data-ajax-managed-stylesheet]';
}

function normalizeStylesheetHref(href) {
    return new URL(href, window.location.origin).href;
}

function extractManagedStylesheetsFromMarkup(markup) {
    const container = document.createElement('div');
    container.innerHTML = markup;

    const managedStylesheets = Array.from(
        container.querySelectorAll(getManagedStylesheetSelector()),
    ).map((element) => {
        const href = element.getAttribute('href') ?? '';
        element.remove();
        return href;
    }).filter(Boolean);

    return {
        html: container.innerHTML,
        stylesheets: managedStylesheets,
    };
}

function syncManagedStylesheets(stylesheets = []) {
    const desiredStylesheets = [...new Set(stylesheets.map(normalizeStylesheetHref))];
    const existingManagedStylesheets = Array.from(
        document.head.querySelectorAll(getManagedStylesheetSelector()),
    );

    existingManagedStylesheets.forEach((element) => {
        if (!desiredStylesheets.includes(normalizeStylesheetHref(element.href))) {
            element.remove();
        }
    });

    desiredStylesheets.forEach((href) => {
        const alreadyLoaded = document.head.querySelector(
            `${getManagedStylesheetSelector()}[href="${href}"]`,
        );

        if (alreadyLoaded) {
            return;
        }

        const link = document.createElement('link');
        link.rel = 'stylesheet';
        link.href = href;
        link.setAttribute('data-ajax-managed-stylesheet', 'true');
        document.head.appendChild(link);
    });
}

function initializeManagedStylesheets() {
    const pageContent = document.querySelector('.page-content');

    if (!pageContent) {
        return;
    }

    const managedStylesheets = Array.from(
        pageContent.querySelectorAll(getManagedStylesheetSelector()),
    ).map((element) => {
        const href = element.getAttribute('href') ?? '';
        element.remove();
        return href;
    }).filter(Boolean);

    syncManagedStylesheets(managedStylesheets);
}

function getAjaxContentScrollTop(slug, queryString = '') {
    const params = new URLSearchParams(queryString);
    const isBlogFilterRequest = (slug === '/blog' || slug === '/blog/archive') && params.has('category');

    if (!isBlogFilterRequest) {
        return 0;
    }

    const $categoryFilters = $('.blog-list .d-flex.flex-wrap.gap-2').first();

    if (!$categoryFilters.length) {
        return 0;
    }

    const headerOffset = $('header.menu-bar').outerHeight() || 0;

    return Math.max($categoryFilters.offset().top - headerOffset - 24, 0);
}

function renderAjaxPageContent(slug, data, queryString = '', addToHistory = true) {
    const historyUrl = buildUrl(slug, Object.fromEntries(new URLSearchParams(queryString)));
    const pageMarkup = typeof data === 'string'
        ? extractManagedStylesheetsFromMarkup(data)
        : { html: data, stylesheets: [] };

    if (addToHistory) {
        history.pushState({
            page: slug,
            queryString,
            title: document.title,
        }, document.title, historyUrl);
    }

    setActiveNavItem(slug);
    $('.page-content').html(pageMarkup.html);
    syncManagedStylesheets(pageMarkup.stylesheets);
    initializeHomePageForm();
    initializeStatsCounter();
    $(window).scrollTop(getAjaxContentScrollTop(slug, queryString));
    refreshAos(50);

    updateHeaderBackground(slug);
    syncMetaTrackingContext(slug);
    ajaxGetPageMetaData(slug, () => {
        dispatchRoutePageView(slug);
        trackMetaPageView(slug, true);
    });
    refreshAos(150);
}

window.skaleMetaTracking = window.skaleMetaTracking || (function createMetaTracking() {
    let lastTrackedPath = null;

    function sanitizeValue(value, fallback = '') {
        return typeof value === 'string' && value.trim() !== '' ? value.trim() : fallback;
    }

    function getBodyDataset() {
        return document.body?.dataset ?? {};
    }

    function buildBaseParams(pathname = window.location.pathname || '/') {
        const dataset = getBodyDataset();
        const normalizedPath = sanitizeValue(pathname, '/');

        return {
            page_path: normalizedPath,
            page_title: document.title,
            page_type: sanitizeValue(dataset.pageType, 'page'),
            route_path: sanitizeValue(dataset.routePath, normalizedPath),
            view_name: sanitizeValue(dataset.viewName, 'unknown'),
        };
    }

    function dispatch(command, eventName, params = {}) {
        const normalizedEventName = sanitizeTrackingEventName(eventName);

        if (typeof window.fbq !== 'function' || !normalizedEventName) {
            return;
        }

        window.fbq(command, normalizedEventName, params);
    }

    return {
        getBaseParams(pathname) {
            return buildBaseParams(pathname);
        },
        track(eventName, params = {}) {
            const normalizedEventName = sanitizeTrackingEventName(eventName);

            if (!normalizedEventName) {
                return;
            }

            dispatch('track', eventName, {
                ...buildBaseParams(),
                ...params,
            });
        },
        trackCustom(eventName, params = {}) {
            const normalizedEventName = sanitizeTrackingEventName(eventName);

            if (!normalizedEventName) {
                return;
            }

            dispatch('trackCustom', eventName, {
                ...buildBaseParams(),
                ...params,
            });
        },
        trackPageView(pathname = window.location.pathname || '/', force = false) {
            const normalizedPath = sanitizeValue(pathname, '/');

            if (!force && lastTrackedPath === normalizedPath) {
                return;
            }

            lastTrackedPath = normalizedPath;

            const baseParams = buildBaseParams(normalizedPath);
            dispatch('track', 'PageView', baseParams);

            if (baseParams.page_type === 'landing') {
                dispatch('track', 'ViewContent', {
                    ...baseParams,
                    content_name: document.title,
                    content_category: 'Landing Page',
                    content_ids: [normalizedPath],
                });
            }
        },
    };
}());

function tryParseJsonResponse(data, contentType = '') {
    if (typeof data === 'object' && data !== null) {
        return data;
    }

    if (typeof data !== 'string') {
        return null;
    }

    const trimmed = data.trim();
    const looksLikeJson = contentType.includes('application/json')
        || trimmed.startsWith('{')
        || trimmed.startsWith('[');

    if (!looksLikeJson) {
        return null;
    }

    try {
        return JSON.parse(trimmed);
    } catch (error) {
        return null;
    }
}

function normalizeTrackingPath(pathname = window.location.pathname || '/') {
    if (!pathname) {
        return '/';
    }

    try {
        return new URL(pathname, window.location.origin).pathname || '/';
    } catch (error) {
        return pathname.startsWith('/') ? pathname : `/${pathname}`;
    }
}

function getMetaTracker() {
    return window.skaleMetaTracking || null;
}

function inferMetaPageType(pathname = window.location.pathname || '/') {
    const normalizedPath = normalizeTrackingPath(pathname);

    if (normalizedPath === '/') {
        return 'home';
    }

    if (['/landing', '/website-development', '/marketing', '/automation'].includes(normalizedPath)) {
        return 'landing';
    }

    if (normalizedPath === '/contact') {
        return 'contact';
    }

    if (normalizedPath === '/portfolio') {
        return 'portfolio';
    }

    if (normalizedPath === '/thank-you') {
        return 'thank-you';
    }

    if (normalizedPath === '/blog' || normalizedPath === '/blog/archive') {
        return 'blog';
    }

    if (normalizedPath.startsWith('/blog/')) {
        return 'blog-article';
    }

    if (normalizedPath === '/solutions' || normalizedPath === '/services') {
        return 'service-list';
    }

    if (normalizedPath.startsWith('/solutions/') || normalizedPath.startsWith('/services/')) {
        return 'service-detail';
    }

    return document.body?.dataset.pageType || 'page';
}

function syncMetaTrackingContext(pathname = window.location.pathname || '/') {
    if (!document.body) {
        return;
    }

    const normalizedPath = normalizeTrackingPath(pathname);
    const pageType = inferMetaPageType(normalizedPath);
    document.body.dataset.routePath = normalizedPath;
    document.body.dataset.pageType = pageType;
    document.body.dataset.viewName = pageType;
}

function trackMetaPageView(pathname = window.location.pathname || '/', force = false) {
    syncMetaTrackingContext(pathname);
    getMetaTracker()?.trackPageView(normalizeTrackingPath(pathname), force);
}

function dispatchRoutePageView(pathname = window.location.pathname || '/') {
    const normalizedPath = normalizeTrackingPath(pathname);

    window.dispatchEvent(new CustomEvent('skale:page-view', {
        detail: {
            pathname: normalizedPath,
        },
    }));
}

function markPendingContactConversion(form, redirectTarget = '') {
    const config = resolveFormTrackingConfig(form);
    const normalizedRedirectTarget = normalizeTrackingPath(redirectTarget);

    if (!config || config.action !== '/contact-form' || normalizedRedirectTarget !== '/thank-you') {
        return;
    }

    window.dispatchEvent(new Event('skale:contact-form-conversion-pending'));
}

function trackMetaEvent(eventName, params = {}) {
    if (!eventName) {
        return;
    }

    getMetaTracker()?.track(eventName, params);
}

function trackMetaCustomEvent(eventName, params = {}) {
    if (!eventName) {
        return;
    }

    getMetaTracker()?.trackCustom(eventName, params);
}

function getElementTrackingLabel(element) {
    if (!element) {
        return '';
    }

    return element.dataset.metaLabel
        || element.getAttribute('aria-describedby')
        || element.getAttribute('aria-details')
        || element.getAttribute('title')
        || element.textContent?.trim()
        || '';
}

function resolveMetaClickConfig(element) {
    if (!element) {
        return null;
    }

    const href = element.getAttribute('href')?.trim() ?? '';
    const normalizedHref = href.toLowerCase();
    const label = getElementTrackingLabel(element);
    const destinationUrl = href || element.dataset.bsTarget || '';
    const metaEvent = sanitizeTrackingEventName(element.dataset.metaEvent);
    const metaCustomEvent = sanitizeTrackingEventName(element.dataset.metaCustomEvent);

    if (metaEvent || metaCustomEvent) {
        return {
            standardEvent: metaEvent,
            customEvent: metaCustomEvent,
            params: {
                cta_label: label,
                destination_url: destinationUrl,
            },
        };
    }

    if (element.dataset.bsTarget === '#staticBackdrop') {
        return {
            standardEvent: '',
            customEvent: 'LandingLeadModalOpen',
            params: {
                cta_label: label,
                destination_url: element.dataset.bsTarget,
            },
        };
    }

    if (normalizedHref.startsWith('tel:') || normalizedHref.startsWith('mailto:')) {
        return {
            standardEvent: 'Contact',
            customEvent: '',
            params: {
                cta_label: label,
                destination_url: href,
            },
        };
    }

    if (normalizedHref.includes('/contact')) {
        return {
            standardEvent: '',
            customEvent: 'ContactIntent',
            params: {
                cta_label: label,
                destination_url: href,
            },
        };
    }

    return null;
}

function trackMetaClick(element) {
    const config = resolveMetaClickConfig(element);

    if (!config) {
        return;
    }

    if (config.standardEvent) {
        trackMetaEvent(config.standardEvent, config.params);
    }

    if (config.customEvent) {
        trackMetaCustomEvent(config.customEvent, config.params);
    }
}

function resolveFormTrackingConfig(form) {
    if (!form) {
        return null;
    }

    const action = normalizeTrackingPath(form.getAttribute('action') || window.location.pathname || '/');
    const formName = form.dataset.metaFormName || form.getAttribute('id') || action || 'form';

    let successEvent = sanitizeTrackingEventName(form.dataset.metaSuccessEvent);

    if (!successEvent) {
        if (action === '/post-lead-form' || action === '/') {
            successEvent = 'Lead';
        } else if (action === '/contact-form') {
            successEvent = 'Contact';
        } else if (action === '/email-list-signup') {
            successEvent = 'CompleteRegistration';
        }
    }

    return {
        action,
        formName,
        successEvent,
        successCustomEvent: sanitizeTrackingEventName(form.dataset.metaSuccessCustomEvent),
        startCustomEvent: sanitizeTrackingEventName(form.dataset.metaStartCustomEvent),
    };
}

function trackMetaFormStart(form) {
    const config = resolveFormTrackingConfig(form);

    if (!config || form.dataset.metaStarted === 'true') {
        return;
    }

    form.dataset.metaStarted = 'true';
    trackMetaCustomEvent(config.startCustomEvent || 'FormStarted', {
        form_name: config.formName,
        form_action: config.action,
    });
}

function trackMetaFormSuccess(form) {
    const config = resolveFormTrackingConfig(form);

    if (!config) {
        return;
    }

    const params = {
        form_name: config.formName,
        form_action: config.action,
    };

    if (config.successEvent) {
        trackMetaEvent(config.successEvent, params);
    }

    if (config.successCustomEvent) {
        trackMetaCustomEvent(config.successCustomEvent, params);
    }
}

function logInteraction({ target, url = window.location.pathname, detail }) {
    if (!detail) {
        return;
    }

    $.ajax({
        type: 'POST',
        url: '/log-button-click',
        data: {
            target,
            url,
            detail,
        },
    });
}

function logButtonClick(element) {
    if (!element) {
        return;
    }

    const $element = $(element);
    const href = $element.attr('href');
    const formAction = $element.closest('form').attr('action');
    const target = href || formAction || window.location.pathname;
    const detail = $element.attr('aria-describedby') || $element.attr('aria-details') || $element.text().trim();

    logInteraction({
        target,
        detail,
    });
}

function logLandingPage(pathname = window.location.pathname) {
    logInteraction({
        target: pathname,
        url: pathname,
        detail: 'Landing page',
    });
}

function parseLinkUrl(href) {
    if (!href || href === '/') {
        return { slug: '/', queryString: '' };
    }

    const url = new URL(href, window.location.origin);
    return {
        slug: url.pathname || '/',
        queryString: url.searchParams.toString(),
    };
}

function shouldHandleAjaxLink(href) {
    if (!href) {
        return false;
    }

    const trimmedHref = href.trim().toLowerCase();

    if (
        trimmedHref === '#'
        || trimmedHref.startsWith('#')
        || trimmedHref.startsWith('mailto:')
        || trimmedHref.startsWith('tel:')
    ) {
        return false;
    }

    return true;
}

function getCurrentLocationState() {
    return {
        page: window.location.pathname || '/',
        queryString: window.location.search.replace(/^\?/, ''),
        title: document.title,
    };
}

function initializeHistoryState() {
    const currentState = history.state ?? {};

    history.replaceState({
        ...currentState,
        ...getCurrentLocationState(),
    }, document.title, window.location.href);
}

function ajaxGetPageMetaData(slug, onComplete = null) {
    let callbackTriggered = false;

    const finish = (metaData = null) => {
        if (callbackTriggered) {
            return;
        }

        callbackTriggered = true;

        if (typeof onComplete === 'function') {
            onComplete(metaData);
        }
    };

    $.ajax({
        type: 'GET',
        url: `/meta-data${slug}`,
        success(data) {
            if (!data) {
                finish(null);
                return;
            }

            let json = null;

            try {
                json = $.parseJSON(data);
            } catch (error) {
                finish(null);
                return;
            }

            $('meta[name=description]').attr('content', json.description);
            $('meta[name=keywords]').attr('content', json.keywords);
            $('head title').text(json.title);
            $('link[rel="canonical"]').attr('href', window.location.href);
            $('meta[property="og:description"]').attr('content', json.description);
            $('meta[property="og:type"]').attr('content', window.location.href.includes('/blog/') ? 'article' : 'website');
            $('meta[property="og:title"]').attr('content', json.title);
            $('meta[property="og:URL"]').attr('content', window.location.href);
            finish(json);
        },
        error() {
            finish(null);
        },
    }).always(() => {
        finish(null);
    });
}

$(document).ready(function() {
    initializeManagedStylesheets();
    initializeHomePageForm();
    initializeStatsCounter();
    logLandingPage();
    trackMetaPageView(window.location.pathname, true);
});

var currentStep = 1;

function getHomePageStepCount() {
    return $('#goals-form').find('.step').length;
}

function updateProgressBar() {
    var totalSteps = getHomePageStepCount();
    var progressPercentage = totalSteps > 1
        ? ((currentStep - 1) / (totalSteps - 1)) * 100
        : 0;

    $('.progress-bar').css('width', progressPercentage + '%');
}

function initializeHomePageForm() {
    var $form = $('#goals-form');

    if (!$form.length) {
        currentStep = 1;
        return;
    }

    currentStep = 1;

    if ($form.length && $form[0]) {
        $form[0].reset();
    }

    $form.find('.step').removeClass('aos-animate').hide();
    $form.find('.step-1').show().addClass('aos-animate');

    $('.progress-container').find('.btn')
        .removeClass('btn-primary')
        .addClass('btn-secondary')
        .first()
        .removeClass('btn-secondary')
        .addClass('btn-primary');

    updateProgressBar();
}

$(document).on('click', '.next-step', function() {
    if (currentStep < getHomePageStepCount()) {
        $(".step-" + currentStep).addClass("aos-animate");
        currentStep++;
        setTimeout(function() {
            $(".step").removeClass("aos-animate").hide();
            $(".step-" + currentStep).show().addClass("aos-animate");
            updateProgressBar();
            $(".progress-container").find('.btn').eq(currentStep - 1).removeClass('btn-secondary').addClass('btn-primary');
            trackMetaCustomEvent('GrowthPlanStepAdvance', {
                form_name: 'home-growth-plan-form',
                step_number: currentStep,
            });
        }, 500);
    }
});

$(document).on('click', '.prev-step', function() {
    if (currentStep > 1) {
        $(".step-" + currentStep).addClass("aos-animate");
        currentStep--;
        setTimeout(function() {
            $(".step").removeClass("aos-animate").hide();
            $(".step-" + currentStep).show().addClass("aos-animate");
            updateProgressBar();
            $(".progress-container").find('.btn').eq(currentStep).removeClass('btn-primary').addClass('btn-secondary');
            trackMetaCustomEvent('GrowthPlanStepBack', {
                form_name: 'home-growth-plan-form',
                step_number: currentStep,
            });
        }, 500);
    }
});

function ajaxGetPageContent(slug, queryString = '', event = null, addToHistory = true) {
    removeAllAlerts();

    const sourceElement = event?.currentTarget ?? event?.target ?? null;

    if (sourceElement) {
        logButtonClick(sourceElement);
    }

    showOverlay();

    $.ajax({
        type: 'GET',
        url: buildUrl(slug, {
            header: 'false',
            footer: 'false',
            ...Object.fromEntries(new URLSearchParams(queryString)),
        }),
        success(data) {
            renderAjaxPageContent(slug, data, queryString, addToHistory);
        },
    }).always(() => {
        hideOverlay();
    });

    return false;
}

function handlePopState(event) {
    const page = event.state?.page ?? window.location.pathname ?? '/';
    const queryString = event.state?.queryString ?? window.location.search.replace(/^\?/, '');

    ajaxGetPageContent(page, queryString, event, false);
}

function validateRequiredFields($form) {
    const errors = [];

    $form.find('.required').each(function validateField() {
        if (!$(this).val()) {
            errors.push(`${capitalizeFirstLetter(this.name)} is required`);
        }
    });

    return errors;
}

function submitAjaxForm(button) {
    const $form = $(button).closest('form');
    const action = $form.attr('action');
    const errors = validateRequiredFields($form);

    trackMetaClick(button);
    trackMetaFormStart($form[0]);
    logButtonClick(button);
    showOverlay();
    $form.find('.alert').remove();

    if (!action) {
        renderAlert($form, 'danger', 'Form action is missing.');
        hideOverlay();
        return false;
    }

    if (errors.length > 0) {
        renderAlert($form, 'danger', errors);
        hideOverlay();
        return false;
    }

    $.ajax({
        type: 'POST',
        url: buildUrl(action, { header: 'false', footer: 'false' }),
        data: $form.serializeArray(),
        success(data, textStatus, jqXHR) {
            const contentType = jqXHR.getResponseHeader('Content-Type') || '';
            const json = tryParseJsonResponse(data, contentType);

            if (json) {
                const redirectTarget = json.success?.redirect;
                const hasSuccessMessages = normalizeMessages(json.success).length > 0;

                if (redirectTarget) {
                    trackMetaFormSuccess($form[0]);
                    markPendingContactConversion($form[0], redirectTarget);
                    ajaxGetPageContent(redirectTarget, '', null, true);
                    return;
                }

                renderAlert($form, 'danger', json.error);

                if (hasSuccessMessages) {
                    trackMetaFormSuccess($form[0]);
                    $form[0].reset();
                    delete $form[0].dataset.metaStarted;
                    renderAlert($form, 'success', json.success);
                }

                return;
            }

            const { slug, queryString } = parseLinkUrl(jqXHR.responseURL || action);
            renderAjaxPageContent(slug, data, queryString, true);
        },
        error(jqXHR) {
            const contentType = jqXHR.getResponseHeader('Content-Type') || '';
            const json = tryParseJsonResponse(jqXHR.responseText, contentType);

            if (json) {
                const redirectTarget = json.success?.redirect;
                const hasSuccessMessages = normalizeMessages(json.success).length > 0;

                if (redirectTarget) {
                    trackMetaFormSuccess($form[0]);
                    markPendingContactConversion($form[0], redirectTarget);
                    ajaxGetPageContent(redirectTarget, '', null, true);
                    return;
                }

                renderAlert($form, 'danger', json.error);

                if (hasSuccessMessages) {
                    trackMetaFormSuccess($form[0]);
                    $form[0].reset();
                    delete $form[0].dataset.metaStarted;
                    renderAlert($form, 'success', json.success);
                }

                return;
            }

            if (jqXHR.responseText) {
                const { slug, queryString } = parseLinkUrl(jqXHR.responseURL || action);
                renderAjaxPageContent(slug, jqXHR.responseText, queryString, true);
                return;
            }

            renderAlert($form, 'danger', 'There was a problem submitting the form. Please try again.');
        },
    }).always(() => {
        hideOverlay();
    });

    return false;
}

$(document).on('click', '.mbtn', function handleMenuClick(event) {
    trackMetaClick(this);
    const href = $(this).attr('href');

    if (!shouldHandleAjaxLink(href)) {
        return true;
    }

    const { slug, queryString } = parseLinkUrl(href);

    ajaxGetPageContent(slug, queryString, event);
    bsOffcanvas?.hide();

    return false;
});

$(document).on('click', '[data-meta-event], [data-meta-custom-event]', function handleTrackedElementClick() {
    if ($(this).closest('.ajaxForm').length || $(this).hasClass('mbtn')) {
        return true;
    }

    trackMetaClick(this);
    return true;
});

$(document).on('click', '.ajaxForm button', function handleAjaxFormClick() {
    return submitAjaxForm(this);
});

$(document).on('focusin', '.ajaxForm input, .ajaxForm select, .ajaxForm textarea', function handleTrackedFormFocus() {
    const form = $(this).closest('form')[0];
    trackMetaFormStart(form);
});

$(document).on('scroll', function handleScroll() {
    const $callout = $('.home-callout');

    if (!$callout.length) {
        return;
    }

    const heightThreshold = $callout.offset().top - 150;
    const scrollTop = $(window).scrollTop();

    $('header.menu-bar').toggleClass(MENU_BAR_BG_CLASS, scrollTop >= heightThreshold);
});

window.onpopstate = handlePopState;
initializeHistoryState();

AOS.init();

$(window).on('load', function handleWindowLoad() {
    refreshAos(0);
    refreshAos(200);
});

//Get the button.
const backToTopButton = document.getElementById('btn-back-to-top');

function updateBackToTopButton() {
    if (!backToTopButton) {
        return;
    }

    const isVisible = document.body.scrollTop > 20 || document.documentElement.scrollTop > 20;

    backToTopButton.style.display = isVisible ? 'block' : 'none';
}

function updateArticleProgress() {
    const articleSection = document.querySelector('section.article');
    const article = articleSection?.querySelector('.article-content');
    const progressWrapper = articleSection?.querySelector('.article-progress-wrapper');
    const progress = articleSection?.querySelector('.article-progress');
    const progressBar = document.getElementById('article-progress-bar');

    if (!articleSection || !article || !progressWrapper || !progress || !progressBar) {
        return;
    }

    const articleTop = article.getBoundingClientRect().top + window.scrollY;
    const articleSectionBottom = articleSection.getBoundingClientRect().bottom + window.scrollY;
    const viewportHeight = window.innerHeight;
    const progressStart = articleTop - viewportHeight;
    const progressEnd = articleSectionBottom - viewportHeight;
    const scrollableDistance = Math.max(progressEnd - progressStart, 1);
    const scrollPosition = window.scrollY - progressStart;
    const progressValue = Math.max(0, Math.min((scrollPosition / scrollableDistance) * 100, 100));
    const roundedProgress = Math.round(progressValue);
    const hasStarted = progressValue > 0;
    const isComplete = progressValue >= 100;
    const progressLabel = window.innerWidth < 768
        ? `${roundedProgress}%`
        : `${roundedProgress}% completed`;

    progressWrapper.classList.toggle('is-visible', hasStarted);
    progressWrapper.classList.toggle('is-complete', isComplete);
    progressBar.style.width = `${progressValue}%`;
    progressBar.setAttribute('aria-valuenow', roundedProgress);
    progress.setAttribute('aria-valuenow', roundedProgress);
    progressBar.textContent = progressLabel;
}

function handleWindowScroll() {
    updateBackToTopButton();
    updateArticleProgress();
}

window.addEventListener('scroll', handleWindowScroll, { passive: true });
window.addEventListener('resize', updateArticleProgress);

if (backToTopButton) {
    backToTopButton.addEventListener('click', backToTop);
}

function backToTop() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}

handleWindowScroll();

let statsObserver = null;

function animateValue(element, start, end, duration) {
    let startTimestamp = null;

    const step = (timestamp) => {
        if (!startTimestamp) {
            startTimestamp = timestamp;
        }

        const progress = Math.min((timestamp - startTimestamp) / duration, 1);
        element.textContent = `${Math.floor((progress * (end - start)) + start)}`;

        if (progress < 1) {
            window.requestAnimationFrame(step);
            return;
        }

        element.textContent = `${end}`;
    };

    window.requestAnimationFrame(step);
}

function animateStatsSection(statsSection) {
    const statsElements = statsSection.querySelectorAll('.stat-number span[data-value]');

    statsElements.forEach((element) => {
        if (element.dataset.countAnimated === 'true') {
            return;
        }

        const endValue = parseInt(element.dataset.value ?? '', 10);

        if (Number.isNaN(endValue)) {
            return;
        }

        element.dataset.countAnimated = 'true';
        element.textContent = '0';
        animateValue(element, 0, endValue, 1000);
    });

    statsSection.dataset.statsAnimated = 'true';
}

function initializeStatsCounter() {
    if (statsObserver) {
        statsObserver.disconnect();
        statsObserver = null;
    }

    const statsSections = Array.from(document.querySelectorAll('section.stats'));

    if (!statsSections.length) {
        return;
    }

    if (typeof IntersectionObserver === 'undefined') {
        statsSections.forEach((section) => {
            if (section.dataset.statsAnimated !== 'true') {
                animateStatsSection(section);
            }
        });

        return;
    }

    statsObserver = new IntersectionObserver((entries, observerInstance) => {
        entries.forEach((entry) => {
            if (!entry.isIntersecting || entry.target.dataset.statsAnimated === 'true') {
                return;
            }

            animateStatsSection(entry.target);
            observerInstance.unobserve(entry.target);
        });
    }, {
        threshold: 0.35,
    });

    statsSections.forEach((section) => {
        if (section.dataset.statsAnimated === 'true') {
            return;
        }

        statsObserver.observe(section);
    });
}

