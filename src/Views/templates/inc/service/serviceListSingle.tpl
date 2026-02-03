<div data-aos="fade-up" style="z-index:{$key + 1}; {if $smarty.foreach.services.last}margin-bottom:150px;{/if}" class="shadow-hover sticky-top service-card card border-0 rounded-0" id="service-{$service->id}">
    <div class="img">
        <img class="card-top" alt="{$service->title}" src="{$smarty.ENV.WEB_ROOT}images/{$service->image}">
    </div>

    <h5 class="card-header px-3 pt-2 pb-3 mb-0 border-0" style="background-color: #171b1e;">
        <a aria-describedby="home services {$service->title}" href="{$smarty.ENV.SITE_URL}{$service->url}" class="mbtn lbc link-light link-underline-opacity-0">
            {include file="inc/service/serviceIcon.tpl" serviceDetail=$service} {$service->title}
        </a>
    </h5>

    <div class="card-body">
        {$service->shortText}
    </div>

    <div class="card-footer">
        <a aria-describedby="home services {$service->title}" href="{$smarty.ENV.SITE_URL}{$service->url}" class="logo-bg-small mbtn btn btn-primary btn-lg">Learn more about {$service->title}</a>
    </div>
</div>