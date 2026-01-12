<div class="service-list">
    <div class="container-fluid">
        <div class="d-lg-none service-list-mobile">
            <div class="row">
                <div class="col-md-4 px-0">
                    <a aria-details="home services {$service.title}" href="{$smarty.ENV.WEB_ROOT}{$service.url}" class="mbtn lbc">
                        <img alt="{$service.title}" src="{$smarty.ENV.WEB_ROOT}images/{$service.image}" style="width:100%;">
                    </a>
                </div>

                <div class="col-md-6 px-3 py-3">
                    <h5>
                        <a aria-details="home services {$service.title}" href="{$smarty.ENV.WEB_ROOT}{$service.url}" class="mbtn lbc link-light link-underline-opacity-0">
                            {$service.icon} {$service.title}
                        </a>
                    </h5>
                    {$service.shortText}
                    <a aria-details="home services {$service.title}" href="{$smarty.ENV.WEB_ROOT}{$service.url}" class="logo-bg-small shadow-hover mbtn lbc btn btn-primary btn-lg">Learn more about {$service.title}</a>
                </div>
            </div>
        </div>
    </div>

    <div data-aos="slide-{if $key % 2 == 0}left{else}right{/if}" class="d-none d-lg-block clearfix py-4" style="background-color:#04010f;">
        <div class="container-fluid">
            <div class="row justify-content-{if $key % 2 == 0}end{else}start{/if}">
                {if $key % 2 == 0}
                    <div class="col-md-6 px-5 align-self-center">
                        <h3>
                            <a aria-details="home services {$service.title}" href="{$smarty.ENV.WEB_ROOT}{$service.url}" class="mbtn lbc link-light link-underline-opacity-0">
                                {$service.icon} {$service.title}
                            </a>
                        </h3>
                        {$service.shortText}
                        <a aria-details="home services {$service.title}" href="{$smarty.ENV.WEB_ROOT}{$service.url}" class="logo-bg-small shadow-hover mbtn btn btn-primary btn-lg">Learn more about {$service.title}</a>
                    </div>

                    <div class="col-md-4 px-0">
                        <a aria-details="home services {$service.title}" href="{$smarty.ENV.WEB_ROOT}{$service.url}" class="mbtn lbc">
                            <img alt="{$service.title}" src="{$smarty.ENV.WEB_ROOT}images/{$service.image}" style="width:100%;">
                        </a>
                    </div>
                {else}
                    <div class="col-md-4 px-0">
                        <a aria-details="home services {$service.title}" href="{$smarty.ENV.WEB_ROOT}{$service.url}" class="mbtn lbc">
                            <img alt="{$service.title}" src="{$smarty.ENV.WEB_ROOT}images/{$service.image}" style="width:100%;">
                        </a>
                    </div>

                    <div class="col-md-6 px-5 align-self-center">
                        <h3>
                            <a aria-details="home services {$service.title}" href="{$smarty.ENV.WEB_ROOT}{$service.url}" class="mbtn lbc link-light link-underline-opacity-0 link-underline-opacity-0">
                                {$service.icon} {$service.title}
                            </a>
                        </h3>
                        {$service.shortText}
                        <a aria-details="home services {$service.title}" href="{$smarty.ENV.WEB_ROOT}{$service.url}" class="logo-bg-small shadow-hover mbtn lbc btn btn-primary btn-lg">Learn more about {$service.title}</a>
                    </div>
                {/if}
            </div>
        </div>
    </div>
</div>