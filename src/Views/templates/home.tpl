{include file="inc/layout/header.tpl"}

<link rel="stylesheet" href="{$smarty.ENV.WEB_ROOT}css/headerFooterShow.min.css" data-ajax-managed-stylesheet="true">
<link rel="stylesheet" href="{$smarty.ENV.WEB_ROOT}css/blog.min.css" data-ajax-managed-stylesheet="true">

<section class="parallax cta-section home-hero py-5 bg-gradient border-bottom">
 <div class="container home-hero-inner pt-5 pb-5 d-flex align-items-center justify-content-center">
 <div class="row align-items-center home-hero-grid">
 <div class="col-lg-6 mb-4 mb-lg-0">
 <h2 class="display-4 fw-bold text-white mb-4">{$data.hero->headline}</h2>
 <p class="lead text-white-100 mb-4">{$data.hero->subHeading}</p>
 <div class="d-flex flex-wrap" data-aos="fade-up">
 <a href="{$smarty.ENV.SITE_URL}{$data.hero->buttonUrl}" class="mbtn btn btn-light btn-lg font-weight-bold me-3 mb-3" aria-describedby="home hero {$data.hero->buttonText}">{$data.hero->buttonText}</a>
 {if $data.hero->secondaryButtonText}
 <a href="{$smarty.ENV.SITE_URL}{$data.hero->secondaryButtonUrl}" class="mbtn btn btn-outline-light btn-lg mb-3" aria-describedby="home hero {$data.hero->secondaryButtonText}">{$data.hero->secondaryButtonText}</a>
 {/if}
 </div>
 </div>

 <div class="col-lg-6 home-hero-form">
 {include file="inc/home/hero-contact-form.tpl"}
 </div>
 </div>
 </div>
</section>

<div class="home-callout home-callout-bg parallax container-fluid py-5" data-aos="fade-in-up">
 <div class="row justify-content-center py-5">
 <div class="col-md-8">
 <h2 class="pb-4 BricolageGrotesque-ExtraBold lh-base">
 Most Businesses Don't Have a <mark>Growth Problem</mark><br>
 They Have a <mark>Systems Problem</mark>
 </h2>
 <p class="lead"><strong>Disconnected tools. Manual workflows. Inconsistent lead flow.</strong> These aren't isolated issues they're symptoms of a broken system.</p>
 <p class="mb-4"><strong><span class="brand-color">Skale</span> fixes that.</strong> We design and build integrated systems that align your marketing, technology, and operations so everything works together to drive growth.</p>

 <a aria-describedby="home call out contact button" href="{$smarty.ENV.SITE_URL}{$smarty.ENV.URL_CONTACT}" class="mbtn btn btn-outline-warning btn-lg logo-bg-small brand-color-bg-button" type="button">
 Schedule A Free Call Today
 </a>
 </div>
 </div>
</div>

{include file="inc/service/serviceListContainer.tpl" serviceList=$serviceList}

<div class="container-fluid why-choose logo-bg-small-light overflow-hidden">
 <div class="row">
 <div class="col-md-6 px-5 py-5 brand-color-bg">
 <div class="row">
 <div class="col-md-8">
 <h2 class="fs-1 fw-bold text-white">How It Works</h2>
 </div>
 </div>

 <div class="row">
 <h3 class="fs-4 text-white mb-4">{$data.howItWorks.title}</h3>

 <div class="steps-vertical">
 {foreach from=$data.howItWorks.steps item=step key=key name=steps}
 <div class="step-vertical align-items-center shadow-lg" data-aos="fade-up">
 <div class="step-vertical-icon text-center fs-3 fw-bold text-white">
 <i class="{$step.icon}"></i>
 </div>

 <div class="step-vertical-content">
 <h4 class="mb-0 text-white">{$step.title}</h4>
 <p class="mb-0 text-white">{$step.description}</p>
 </div>
 </div>
 {/foreach}
 </div>
 </div>
 </div>

 <div class="col-md-6 px-5 py-5">
 <div class="row">
 <div class="col-md-8">
 <h2 class="fs-1 fw-bold text-white">The Results</h2>
 </div>
 </div>

 <div class="row">
 <h3 class="fs-4 text-white mb-4">{$data.theResults.title}</h3>

 <div class="steps-vertical">
 {foreach from=$data.theResults.results item=item key=key name=name}
 <div class="step-vertical align-items-center shadow-lg" data-aos="fade-up">
 <div class="step-vertical-icon text-center fs-3 fw-bold text-white">
 <i class="{$item.icon}"></i>
 </div>

 <div class="step-vertical-content">
 <h4 class="mb-0 text-white">{$item.title}</h4>
 <p class="mb-0 text-white">{$item.description}</p>
 </div>
 </div>
 {/foreach}
 </div>
 </div>
 </div>
 </div>
</div>

<div class="container-fluid text-bg-light why-choose logo-bg-small-light pb-5 overflow-hidden">
 <div class="row row-cols-1 row-cols-md-2 g-4 card-group px-5 py-5">
 {foreach from=$data.homeCards item=item key=key name=name}
 <div class="col" data-aos="fade-up">
 <div class="card h-100">
 <div class="bd-placeholder-img card-img-top">
 <img src="{$smarty.ENV.IMG_ROOT}{$item->image}" class="img-fluid" alt="{$item->title}">
 </div>

 <div class="card-body">
 <h5 class="card-title mb-0">{$item->title}</h5>
 <h2>{$item->subTitle}</h2>
 {$item->content}
 </div>
 </div>
 </div>
 {/foreach}
 </div>
</div>

<div class="bg-gradient container-fluid home-callout home-callout-bg parallax">
 <div class="row justify-content-center px-4 py-4">
 {include file="inc/blog/blogListContainer.tpl" blogList=$data.blogList blogFeatured=$data.blogFeatured blogContent=$data.blogContent limit=6}
 </div>
</div>

{include file="inc/layout/footer.tpl"}
