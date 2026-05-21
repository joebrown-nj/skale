const offcanvasElement = document.getElementById('oCNav');
const bsOffcanvas = offcanvasElement ? new bootstrap.Offcanvas(offcanvasElement) : null;

const OVERLAY_FADE_MS = 300;
const OVERLAY_HIDE_DELAY_MS = 250;
const MENU_BAR_BG_CLASS = 'menu-bar-bg';

function buildUrl(path, params = {}) {
    const query = new URLSearchParams(params).toString();
    return query ? `${path}?${query}` : path;
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
    $('#overlay').fadeIn(OVERLAY_FADE_MS);
    $('body').css({ overflow: 'hidden', 'padding-right': '17px' });
}

function hideOverlay() {
    setTimeout(() => {
        $('#overlay').fadeOut(OVERLAY_FADE_MS);
        $('body').css({ overflow: 'auto', 'padding-right': '' });
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

function renderAjaxPageContent(slug, data, queryString = '', addToHistory = true) {
    const historyUrl = buildUrl(slug, Object.fromEntries(new URLSearchParams(queryString)));

    if (addToHistory) {
        history.pushState({
            page: slug,
            queryString,
            title: document.title,
        }, document.title, historyUrl);
    }

    setActiveNavItem(slug);
    $('.page-content').html(data);
    initializeHomePageForm();
    $(window).scrollTop(0);
    refreshAos(50);

    updateHeaderBackground(slug);
    ajaxGetPageMetaData(slug);
    refreshAos(150);
}

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

function logButtonClick(element) {
    $.ajax({
        type: 'POST',
        url: '/log-button-click',
        data: {
            target: $(element).attr('href'),
            url: window.location.pathname,
            detail: $(element).attr('aria-describedby'),
        },
    });

    return false;
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

function ajaxGetPageMetaData(slug) {
    $.ajax({
        type: 'GET',
        url: `/meta-data${slug}`,
        success(data) {
            if (!data) {
                return;
            }

            const json = $.parseJSON(data);
            $('meta[name=description]').attr('content', json.description);
            $('meta[name=keywords]').attr('content', json.keywords);
            $('head title').text(json.title);
            $('link[rel="canonical"]').attr('href', window.location.href);
            $('meta[property="og:description"]').attr('content', json.description);
            $('meta[property="og:type"]').attr('content', window.location.href.includes('/blog/') ? 'article' : 'website');
            $('meta[property="og:title"]').attr('content', json.title);
            $('meta[property="og:URL"]').attr('content', window.location.href);
        },
    });
}

$(document).ready(function() {
    initializeHomePageForm();
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
        }, 500);
    }
});

function ajaxGetPageContent(slug, queryString = '', event = null, addToHistory = true) {
    removeAllAlerts();

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

                if (redirectTarget) {
                    ajaxGetPageContent(redirectTarget, '', null, true);
                    return;
                }

                renderAlert($form, 'danger', json.error);

                if (normalizeMessages(json.success).length > 0) {
                    $form[0].reset();
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

                if (redirectTarget) {
                    ajaxGetPageContent(redirectTarget, '', null, true);
                    return;
                }

                renderAlert($form, 'danger', json.error);

                if (normalizeMessages(json.success).length > 0) {
                    $form[0].reset();
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

$(document).on('click', '.lbc', function handleLogClick() {
    logButtonClick(this);
});

$(document).on('click', '.mbtn', function handleMenuClick(event) {
    const { slug, queryString } = parseLinkUrl($(this).attr('href'));

    ajaxGetPageContent(slug, queryString, event);
    bsOffcanvas?.hide();

    return false;
});

$(document).on('click', '.ajaxForm button', function handleAjaxFormClick() {
    return submitAjaxForm(this);
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

$(document).ajaxSend(() => {
    showOverlay();
});

$(document).ajaxStop(() => {
    hideOverlay();
});

window.onpopstate = handlePopState;
initializeHistoryState();

AOS.init({
    duration: 900,
    easing: 'ease-out-cubic',
    offset: 60,
    once: true,
});

$(window).on('load', function handleWindowLoad() {
    refreshAos(0);
    refreshAos(200);
});

window.dataLayer = window.dataLayer || [];

function gtag() {
    dataLayer.push(arguments);
}

gtag('js', new Date());
gtag('config', 'G-5HMT5HBM1Y', {
    cookie_flags: 'secure;samesite=none',
});

//Get the button
let mybutton = document.getElementById("btn-back-to-top");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function () {
  scrollFunction();
};

function scrollFunction() {
  if (
    document.body.scrollTop > 20 ||
    document.documentElement.scrollTop > 20
  ) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}
// When the user clicks on the button, scroll to the top of the document
mybutton.addEventListener("click", backToTop);

function backToTop() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}