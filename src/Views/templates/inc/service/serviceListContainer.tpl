{* <div class="container-fluid service-cards-container">
    <div class="d-lg-none">
        <div class="row mb-4">
            <div class="col">
                <div class="sticky-top" style="top:100px;">
                    <h3 class="BricolageGrotesque-ExtraBold mb-4 logo-bg-small">What can <span class="brand-color">skale</span> do for you?</h3>
                    <p class="lead">We deliver <b>tailored digital solutions designed to accelerate growth, strengthen your brand presence, and optimize operational performance</b> in today's competitive landscape. Our team combines strategic insight with modern technology to help you overcome challenges, unlock new opportunities, and scale with confidence.</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                {foreach from=$serviceList key=key item=service name=services key=key}
                    {include file="inc/service/serviceListSingle.tpl" key=$key}
                {/foreach}
            </div>
        </div>
    </div>

    <div class="d-none d-lg-block">
        <div class="row justify-content-end px-5 py-5">
            <div class="col-md-6">
                <div class="sticky-top" style="top:100px;">
                    <h3 class="BricolageGrotesque display-6 mb-4 logo-bg-small">What can <span class="brand-color">skale</span> do for you?</h3>
                    <p class="lead">We deliver <b>tailored digital solutions designed to accelerate growth, strengthen your brand presence, and optimize operational performance</b> in today's competitive landscape. Our team combines strategic insight with modern technology to help you overcome challenges, unlock new opportunities, and scale with confidence.</p>
                </div>
            </div>

            <div class="col-md-5">
                <div class="row position-relative">
                    <div class="col">
                        {foreach from=$serviceList key=key item=service name=services key=key}
                            {include file="inc/service/serviceListSingle.tpl" key=$key}
                        {/foreach}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> *}

<section class="cta-section py-5 bg-gradient border-bottom">
    <div class="container">
        <div class="row justify-content-center align-items-center mb-5">
            <div class="col-md-8 mb-4 mb-lg-0 text-center">
                <h2 class="display-4 fw-bold text-white mb-4">What can <span class="brand-color">skale</span> do for you?</h2>
                <p class="lead text-white-100 mb-4">We deliver <b>tailored digital solutions designed to accelerate growth, strengthen your brand presence, and optimize operational performance</b> in today's competitive landscape. Our team combines strategic insight with modern technology to help you overcome challenges, unlock new opportunities, and scale with confidence.</p>
            </div>
        </div>

        {foreach from=$serviceList key=key item=service name=services key=key}
            <div class="card border-dark shadow-lg mb-5" data-aos="fade-up">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{$smarty.ENV.WEB_ROOT}images/{$service->image}" alt="{$service->title}" class="img-fluid rounded-start h-100 w-100">
                    </div>

                    <div class="col-md-8">
                        <div class="card-body">
                            {* <h5 class="card-title"> *}
                            <h3 class="card-title px-0 mb-0 ubuntu-regular">{$service->title}</h3>
                            {* <p class="card-text"></p> *}
                            {$service->shortText}
                            <a aria-describedby="home solutions {$service->title}" href="{$smarty.ENV.SITE_URL}{$service->url}" class="stretched-link logo-bg-small mbtn btn btn-primary btn">Learn more about {$service->title}</a>
                        </div>
                    </div>
                </div>
            </div>
        {/foreach}
    </div>
</section>
