(function initGoogleTracking() {
    const TRACKING_ID = 'AW-1029303333';
    const CONVERSION_DESTINATION = 'AW-1029303333/6CeyCOrf6r8cEKXY5-oD';
    const googleTrackingConfig = window.skaleGoogleTrackingConfig || {};

    window.dataLayer = window.dataLayer || [];
    window.gtag = window.gtag || function gtag() {
        window.dataLayer.push(arguments);
    };

    window.gtag('js', new Date());
    window.gtag('config', TRACKING_ID);

    if (googleTrackingConfig.isThankYouPage) {
        window.gtag('event', 'conversion', {
            send_to: CONVERSION_DESTINATION,
        });
    }
}());
