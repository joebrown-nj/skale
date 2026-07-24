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



<!-- PROBLEM RECOGNITION -->
{* <section class="section-space">
<div class="container">
<div class="section-intro">
<span class="eyebrow">The Real Problem</span>
<h2>Your business may not need another tool. It may need its tools to work together.</h2>
<p class="mt-3">Growth becomes harder when your website, marketing, sales process, customer data, and reporting operate separately. Small gaps create missed follow-ups, unclear performance, duplicated work, and lost opportunities.</p>
</div>

<div class="row g-4">
<div class="col-md-6 col-xl-3">
<article class="problem-card">
<span class="icon-box"><i class="bi bi-funnel" aria-hidden="true"></i></span>
<h3 class="h5">Leads go nowhere</h3>
<p class="mb-0">Visitors arrive, but weak calls to action and disconnected follow-up leave good prospects behind.</p>
</article>
</div>
<div class="col-md-6 col-xl-3">
<article class="problem-card">
<span class="icon-box"><i class="bi bi-arrows-angle-contract" aria-hidden="true"></i></span>
<h3 class="h5">Teams work manually</h3>
<p class="mb-0">Employees copy data, chase updates, and repeat tasks that should happen automatically.</p>
</article>
</div>
<div class="col-md-6 col-xl-3">
<article class="problem-card">
<span class="icon-box"><i class="bi bi-plug" aria-hidden="true"></i></span>
<h3 class="h5">Systems are disconnected</h3>
<p class="mb-0">Customer information is spread across spreadsheets, inboxes, apps, and isolated platforms.</p>
</article>
</div>
<div class="col-md-6 col-xl-3">
<article class="problem-card">
<span class="icon-box"><i class="bi bi-bar-chart-line" aria-hidden="true"></i></span>
<h3 class="h5">Results are unclear</h3>
<p class="mb-0">Reporting shows activity, but not which efforts are creating revenue or where improvement is needed.</p>
</article>
</div>
</div>
</div>
</section> *}
