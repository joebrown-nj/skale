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




{* <!-- SERVICE COMPONENTS -->
<section class="section-space bg-soft">
<div class="container">
<div class="row align-items-end mb-5 g-3">
<div class="col-lg-8">
<span class="eyebrow">What We Connect</span>
<h2 class="mb-0">The essential parts of your growth engine.</h2>
</div>
<div class="col-lg-4">
<p class="mb-0">Your engagement can include one area or a complete connected system, depending on your goals and current infrastructure.</p>
</div>
</div>

<div class="row g-4">
<div class="col-md-6 col-xl-4">
<article class="service-card">
<span class="service-number">01</span>
<span class="icon-box"><i class="bi bi-window" aria-hidden="true"></i></span>
<h3 class="h4">Website & Conversion</h3>
<p>Your website should clearly explain your value, establish credibility, and guide visitors toward action.</p>
<ul>
<li><i class="bi bi-check2"></i>Website strategy and development</li>
<li><i class="bi bi-check2"></i>Landing pages and conversion paths</li>
<li><i class="bi bi-check2"></i>Messaging and calls to action</li>
</ul>
</article>
</div>

<div class="col-md-6 col-xl-4">
<article class="service-card">
<span class="service-number">02</span>
<span class="icon-box"><i class="bi bi-megaphone" aria-hidden="true"></i></span>
<h3 class="h4">Demand Generation</h3>
<p>Reach the right audience with focused campaigns designed around qualified traffic and measurable action.</p>
<ul>
<li><i class="bi bi-check2"></i>SEO and content strategy</li>
<li><i class="bi bi-check2"></i>PPC and paid social campaigns</li>
<li><i class="bi bi-check2"></i>Email marketing and nurturing</li>
</ul>
</article>
</div>

<div class="col-md-6 col-xl-4">
<article class="service-card">
<span class="service-number">03</span>
<span class="icon-box"><i class="bi bi-people" aria-hidden="true"></i></span>
<h3 class="h4">CRM & Lead Management</h3>
<p>Create a dependable process for capturing, organizing, assigning, and following up with every opportunity.</p>
<ul>
<li><i class="bi bi-check2"></i>CRM setup and optimization</li>
<li><i class="bi bi-check2"></i>Lead routing and pipeline design</li>
<li><i class="bi bi-check2"></i>Sales and marketing alignment</li>
</ul>
</article>
</div>

<div class="col-md-6 col-xl-4">
<article class="service-card">
<span class="service-number">04</span>
<span class="icon-box"><i class="bi bi-lightning-charge" aria-hidden="true"></i></span>
<h3 class="h4">Automation</h3>
<p>Remove repetitive work and make important actions happen reliably at the right time.</p>
<ul>
<li><i class="bi bi-check2"></i>Marketing and sales automation</li>
<li><i class="bi bi-check2"></i>Internal workflow automation</li>
<li><i class="bi bi-check2"></i>Notifications and follow-up sequences</li>
</ul>
</article>
</div>

<div class="col-md-6 col-xl-4">
<article class="service-card">
<span class="service-number">05</span>
<span class="icon-box"><i class="bi bi-link-45deg" aria-hidden="true"></i></span>
<h3 class="h4">System Integrations</h3>
<p>Connect the platforms your business already depends on so information moves without unnecessary handoffs.</p>
<ul>
<li><i class="bi bi-check2"></i>API and platform integrations</li>
<li><i class="bi bi-check2"></i>Data synchronization</li>
<li><i class="bi bi-check2"></i>Custom integration workflows</li>
</ul>
</article>
</div>

<div class="col-md-6 col-xl-4">
<article class="service-card">
<span class="service-number">06</span>
<span class="icon-box"><i class="bi bi-clipboard-data" aria-hidden="true"></i></span>
<h3 class="h4">Analytics & Optimization</h3>
<p>Understand what is working, what is not, and where your next best opportunity may be.</p>
<ul>
<li><i class="bi bi-check2"></i>Analytics implementation</li>
<li><i class="bi bi-check2"></i>Dashboards and reporting</li>
<li><i class="bi bi-check2"></i>Continuous conversion optimization</li>
</ul>
</article>
</div>
</div>

<div class="text-center mt-5">
<a class="btn btn-primary btn-lg" href="#consultation">Talk Through Your Growth Gaps</a>
</div>
</div>
</section> *}
