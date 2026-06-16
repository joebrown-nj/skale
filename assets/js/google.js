(function initGoogleTracking() {
    const ANALYTICS_TRACKING_ID = 'G-5HMT5HBM1Y';
    const ADS_TRACKING_ID = 'AW-1029303333';
    const CONVERSION_DESTINATION = 'AW-1029303333/pQwbCNuxmcAcEKXY5-oD';
    const THANK_YOU_PATH = '/thank-you';
    const PENDING_CONVERSION_STORAGE_KEY = 'skale_google_pending_conversion';
    const PENDING_CONTACT_CONVERSION_VALUE = 'contact-form';

    let lastTrackedPath = null;

    function normalizePath(pathname = window.location.pathname || '/') {
        if (!pathname) {
            return '/';
        }

        try {
            return new URL(pathname, window.location.origin).pathname || '/';
        } catch (error) {
            return pathname.startsWith('/') ? pathname : `/${pathname}`;
        }
    }

    function getPageData(pathname = window.location.pathname || '/') {
        return {
            page_path: normalizePath(pathname),
            page_location: window.location.href,
            page_title: document.title,
        };
    }

    function readPendingConversion() {
        try {
            return window.sessionStorage.getItem(PENDING_CONVERSION_STORAGE_KEY);
        } catch (error) {
            return null;
        }
    }

    function storePendingContactConversion() {
        try {
            window.sessionStorage.setItem(
                PENDING_CONVERSION_STORAGE_KEY,
                PENDING_CONTACT_CONVERSION_VALUE,
            );
        } catch (error) {
            return;
        }
    }

    function clearPendingConversion() {
        try {
            window.sessionStorage.removeItem(PENDING_CONVERSION_STORAGE_KEY);
        } catch (error) {
            return;
        }
    }

    function fireContactFormConversionIfNeeded(pathname = window.location.pathname || '/') {
        if (
            normalizePath(pathname) !== THANK_YOU_PATH
            || readPendingConversion() !== PENDING_CONTACT_CONVERSION_VALUE
        ) {
            return;
        }

        window.gtag('event', 'conversion', {
            send_to: CONVERSION_DESTINATION,
        });

        clearPendingConversion();
    }

    function trackPageView(pathname = window.location.pathname || '/') {
        const normalizedPath = normalizePath(pathname);

        if (lastTrackedPath === normalizedPath) {
            fireContactFormConversionIfNeeded(normalizedPath);
            return;
        }

        lastTrackedPath = normalizedPath;
        window.gtag('event', 'page_view', getPageData(normalizedPath));
        fireContactFormConversionIfNeeded(normalizedPath);
    }

    window.dataLayer = window.dataLayer || [];
    window.gtag = window.gtag || function gtag() {
        window.dataLayer.push(arguments);
    };

    window.gtag('js', new Date());
    window.gtag('config', ANALYTICS_TRACKING_ID);
    window.gtag('config', ADS_TRACKING_ID);

    lastTrackedPath = normalizePath(window.location.pathname || '/');
    fireContactFormConversionIfNeeded(lastTrackedPath);

    window.addEventListener('skale:page-view', (event) => {
        trackPageView(event.detail?.pathname);
    });

    window.addEventListener('skale:contact-form-conversion-pending', () => {
        storePendingContactConversion();
    });
}());
