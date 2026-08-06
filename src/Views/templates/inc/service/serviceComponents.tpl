<!-- SERVICE COMPONENTS -->
<section class="section-space bg-soft">
    <div class="container">
        <div class="row align-items-end mb-5 g-3">
            <div class="col-lg-8">
                <span class="eyebrow">{$data.eyebrow}</span>
                <h2 class="mb-0">{$data.heading}</h2>
            </div>
            <div class="col-lg-4">
                <p class="mb-0">{$data.description}</p>
            </div>
        </div>

        <div class="row g-4">
            {foreach from=$data.items item=item key=k}
                <div class="col-md-6 col-xl-4">
                    <article class="service-card">
                        <span class="service-number">{$k+1}</span>
                        <span class="icon-box"><i class="{$item.iconClass}" aria-hidden="true"></i></span>
                        <h3 class="h4">{$item.title}</h3>
                        <p>{$item.description}</p>
                        {if isset($item.bullets) && $item.bullets|@count > 0}
                            <ul>
                                {foreach from=$item.bullets item=bullet}
                                    <li><i class="{$data.listIconClass}"></i>{$bullet}</li>
                                {/foreach}
                            </ul>
                        {/if}
                        <a href="{$smarty.ENV.SITE_URL}{$item.url}" class="mbtn stretched-link" aria-describedby="service component {$item.title}"></a>
                    </article>
                </div>
            {/foreach}
        </div>

        <div class="{$data.cta.wrapperClass}">
            <a class="{$data.cta.class}" href="{$data.cta.url}">{$data.cta.label}</a>
        </div>
    </div>
</section>
