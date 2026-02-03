<div class="container-fluid service-cards-container">
    <div class="d-lg-none">
        <div class="row mb-4">
            <div class="col">
                <div class="sticky-top" style="top:100px;">
                    <h3 class="BricolageGrotesque-ExtraBold mb-4 logo-bg-small">Why do businesses choose <span class="brand-color">skale</span>?</h3>
                    <p class="lead">We deliver <b>tailored digital solutions designed to accelerate growth, strengthen your brand presence, and optimize operational performance</b> in today's competitive landscape. Our team combines strategic insight with modern technology to help you overcome challenges, unlock new opportunities, and scale with confidence.</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                {foreach from=$smarty.SESSION.serviceList key=key item=service name=services key=key}
                    {include file="inc/service/serviceListSingle.tpl" key=$key}
                {/foreach}
            </div>
        </div>
    </div>

    <div class="d-none d-lg-block">
        <div class="row justify-content-end px-5 py-5">
            <div class="col-md-6">
                <div class="sticky-top" style="top:100px;">
                    <h3 class="BricolageGrotesque-ExtraBold mb-4 logo-bg-small">Why do businesses choose <span class="brand-color">skale</span>?</h3>
                    <p class="lead">We deliver <b>tailored digital solutions designed to accelerate growth, strengthen your brand presence, and optimize operational performance</b> in today's competitive landscape. Our team combines strategic insight with modern technology to help you overcome challenges, unlock new opportunities, and scale with confidence.</p>
                </div>
            </div>

            <div class="col-md-5">
                <div class="row position-relative">
                    <div class="col">
                        {foreach from=$smarty.SESSION.serviceList key=key item=service name=services key=key}
                            {include file="inc/service/serviceListSingle.tpl" key=$key}
                        {/foreach}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>