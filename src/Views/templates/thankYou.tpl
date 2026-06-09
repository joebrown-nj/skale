{include file="inc/layout/header.tpl" hideMenu=true hideBreadcrumb=true}

<link rel="stylesheet" href="{$smarty.ENV.WEB_ROOT}css/headerFooterHide.min.css" data-ajax-managed-stylesheet="true">
<link rel="stylesheet" href="{$smarty.ENV.WEB_ROOT}css/thank-you.min.css" data-ajax-managed-stylesheet="true">
<div class="thank-you-page container-fluid py-5">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-8">
            <div class="card">
                <div class="logo logo-text fw-bold BricolageGrotesque-ExtraBold">
                    <a href="{$smarty.ENV.WEB_ROOT}" class="mbtn" aria-describedby="thank you page logo link">
                        skale<span class="brand-color">.</span>
                    </a>
                </div>

                <div class="check">
                    &check;
                </div>

                <h1>Thank You.<br> <span class="gradient">Let's Scale Together.</span></h1>
                <p>We've received your request and our team will review your information shortly. We're excited to learn more about your goals and explore how Skale can help grow your business.</p>

                <div class="actions">
                    <a href="/" class="mbtn btn btn-primary" aria-describedby="thank you page return home button">
                        Return Home
                    </a>

                    <a href="/solutions" class="mbtn btn btn-secondary" aria-describedby="thank you page explore solutions button">
                        Explore Solutions
                    </a>
                </div>

                <div class="next">
                    <h3>What happens next?</h3>

                    <div class="trust-list">
                        <div class="trust-item">&check; We review your request</div>
                        <div class="trust-item">&check; We reach out within 1 business day</div>
                        <div class="trust-item">&check; We discuss your goals and opportunities</div>
                        <div class="trust-item">&check; We build a strategy tailored to your business</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{include file="inc/layout/footer.tpl" hideFooter=true}


