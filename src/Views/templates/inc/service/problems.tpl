<!-- PROBLEM RECOGNITION -->
<section class="{$data.class}">
    <div class="{$data.containerClass}">
        <div class="{$data.introClass}">
            <span class="eyebrow">{$data.eyebrow}</span>
            <h2>{$data.heading}</h2>
            <p class="mt-3">{$data.description}</p>
        </div>

        <div class="row g-4">
            {foreach from=$data.items item=problem}
                <div class="col-md-6 col-xl-3">
                    <article class="problem-card service-card">
                        <span class="{$data.iconWrapperClass}"><i class="{$problem.iconClass}" aria-hidden="true"></i></span>
                        <h3 class="{$data.titleClass}">{$problem.title}</h3>
                        <p class="{$data.bodyClass}">{$problem.description}</p>
                    </article>
                </div>
            {/foreach}
        </div>
    </div>
</section>
