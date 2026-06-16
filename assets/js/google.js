(function initGoogleTracking() {
    const ANALYTICS_TRACKING_ID = 'G-5HMT5HBM1Y';
    const ADS_TRACKING_ID = 'AW-1029303333';
    const CONVERSION_DESTINATION = 'AW-1029303333/pQwbCNuxmcAcEKXY5-oD';
    const THANK_YOU_PATH = '/thank-you';
    const PENDING_CONVERSION_STORAGE_KEY = 'skale_google_pending_conversion';

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

    function readPendingConversion() {
        try {
            return window.sessionStorage.getItem(PENDING_CONVERSION_STORAGE_KEY);
        } catch (error) {
            return null;
        }
    }

    function clearPendingConversion() {
        try {
            window.sessionStorage.removeItem(PENDING_CONVERSION_STORAGE_KEY);
        } catch (error) {
            return;
        }
    }

    window.dataLayer = window.dataLayer || [];
    window.gtag = window.gtag || function gtag() {
        window.dataLayer.push(arguments);
    };

    window.gtag('js', new Date());
    window.gtag('config', ANALYTICS_TRACKING_ID);
    window.gtag('config', ADS_TRACKING_ID);

    window.skaleGoogleTracking = {
        markPendingContactConversion() {
            try {
                window.sessionStorage.setItem(PENDING_CONVERSION_STORAGE_KEY, 'contact-form');
            } catch (error) {
                return;
            }
        },
        trackPage(pathname = window.location.pathname || '/') {
            const normalizedPath = normalizePath(pathname);
            const pageData = {
                page_path: normalizedPath,
                page_location: window.location.href,
                page_title: document.title,
            };

            window.gtag('event', 'page_view', {
                send_to: ANALYTICS_TRACKING_ID,
                ...pageData,
            });
            window.gtag('config', ADS_TRACKING_ID, pageData);

            if (normalizedPath !== THANK_YOU_PATH || readPendingConversion() !== 'contact-form') {
                return;
            }

            window.gtag('event', 'conversion', {
                send_to: CONVERSION_DESTINATION,
            });

            clearPendingConversion();
        },
    };
}());
