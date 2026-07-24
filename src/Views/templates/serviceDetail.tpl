{include file="inc/layout/header.tpl"}

{* <div class="container-fluid">
<div class="row justify-content-center align-items-center border-bottom py-4 text-bg-dark">
<div class="col-md-6">
<h2 class="display-4 fw-bold Bahnschrift logo-bg-small">{include file="inc/service/serviceIcon.tpl" serviceDetail=$data.serviceDetail} {$data.serviceDetail->title}</h2>
<p class="lead">{if isset($data.serviceDetail->shortText) && $data.serviceDetail->shortText != ''}{$data.serviceDetail->shortText}{else}Learn more about our {$data.serviceDetail->title} solutions.{/if}</p>
</div>

<div class="col-md-4">
<img class="img-fluid service-detail-hero-image" alt="{$data.serviceDetail->title}" src="{$smarty.ENV.WEB_ROOT}images/{$data.serviceDetail->image}">
</div>
</div>
</div>

{$data.serviceDetail->content} *}






{*
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1"> *}
{* <title>Growth Infrastructure Services | Skale</title> *}
{* <meta name="description" content="Connect your website, CRM, automation, marketing, and reporting into one growth system built to generate leads and support your business."> *}
{* <link rel="canonical" href="https://skaleup.it.com/solutions/growth-infrastructure"> *}

{* <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"> *}

{* </head> *}


<!-- Replace this navigation with your existing site header if needed. -->
{* <nav class="navbar navbar-expand-lg sticky-top" aria-label="Main navigation">
<div class="container">
<a class="navbar-brand" href="/">skale<span>.</span></a>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="mainNav">
<ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
<li class="nav-item"><a class="nav-link" href="/solutions">Solutions</a></li>
<li class="nav-item"><a class="nav-link" href="/about">About</a></li>
<li class="nav-item"><a class="nav-link" href="/blog">Insights</a></li>
<li class="nav-item ms-lg-2"><a class="btn btn-primary" href="#consultation">Book a Free Consultation</a></li>
</ul>
</div>
</div>
</nav> *}

{* <main>
{foreach from=$data.serviceSections item=section}
{if $section->isEnabled}
{include file="inc/service/serviceSection.tpl" section=$section}
{/if}
{/foreach}
</main> *}


{if $data.serviceContent|empty}
    {$data.serviceDetail->content}
{else}
    <main class="service-detail-page {$p2}">
        {if $data.serviceContent.sections.hero && $data.serviceContent.sections.hero.enabled}
            {include file="inc/service/hero.tpl" data=$data.serviceContent.sections.hero}
        {/if}

        {if $data.serviceContent.sections.trustStrip && $data.serviceContent.sections.trustStrip.enabled}
            {include file="inc/service/trustStrip.tpl" data=$data.serviceContent.sections.trustStrip}
        {/if}

        {if $data.serviceContent.sections.problems && $data.serviceContent.sections.problems.enabled}
            {include file="inc/service/problems.tpl" data=$data.serviceContent.sections.problems}
        {/if}

        {if $data.serviceContent.sections.outcomes && $data.serviceContent.sections.outcomes.enabled}
            {include file="inc/service/outcomes.tpl" data=$data.serviceContent.sections.outcomes}
        {/if}

        {* {if $data.serviceContent.sections.components}
        {include file="inc/service/components.tpl" data=$data.serviceContent.sections.components}
        {/if} *}

        {if $data.serviceContent.sections.serviceComponents && $data.serviceContent.sections.serviceComponents.enabled}
            {include file="inc/service/serviceComponents.tpl" data=$data.serviceContent.sections.serviceComponents}
        {/if}

        {if $data.serviceContent.sections.caseStudy && $data.serviceContent.sections.caseStudy.enabled}
            {include file="inc/service/caseStudy.tpl" data=$data.serviceContent.sections.caseStudy}
        {/if}

        {if $data.serviceContent.sections.process && $data.serviceContent.sections.process.enabled}
            {include file="inc/service/process.tpl" data=$data.serviceContent.sections.process}
        {/if}

        {if $data.serviceContent.sections.founder && $data.serviceContent.sections.founder.enabled}
            {include file="inc/service/founder.tpl" data=$data.serviceContent.sections.founder}
        {/if}

        {if $data.serviceContent.sections.qualification && $data.serviceContent.sections.qualification.enabled}
            {include file="inc/service/qualification.tpl" data=$data.serviceContent.sections.qualification}
        {/if}

        {if $data.serviceContent.sections.faq && $data.serviceContent.sections.faq.enabled}
            {include file="inc/service/faq.tpl" data=$data.serviceContent.sections.faq}
        {/if}

        {if $data.serviceContent.sections.finalCta && $data.serviceContent.sections.finalCta.enabled}
            {include file="inc/service/finalCta.tpl" data=$data.serviceContent.sections.finalCta}
        {/if}
    </main>
{/if}

{include file="inc/layout/footer.tpl"}
