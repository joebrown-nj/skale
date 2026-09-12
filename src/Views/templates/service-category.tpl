{include file="inc/layout/header.tpl"}

<link rel="stylesheet" href="{$smarty.ENV.WEB_ROOT}css/service-category.min.css" data-ajax-managed-stylesheet="true" />

<!-- ================== HERO ================== -->
<header class="category-hero">
    <div class="container">
        {* <div class="category-breadcrumb" data-aos="fade-up">
        <a href="/">Home</a>
        <span class="mx-2">/</span>

        <a href="/solutions/">Solutions</a>
        <span class="mx-2">/</span>

        <span>Websites & Conversion</span>
        </div> *}

        <div class="row">
            <div class="col-xl-10">
                <div class="category-eyebrow" data-aos="fade-up">{$content.hero.category_eyebrow}</div>
                <h1 class="text-white" data-aos="fade-up" data-aos-delay="75">{$content.hero.title}</h1>

                <p class="category-hero-copy" data-aos="fade-up" data-aos-delay="150">
                    {$content.hero.copy}
                </p>

                <div class="hero-points" data-aos="fade-up" data-aos-delay="225">
                    {foreach from=$content.hero.points item=point}
                        <span class="hero-point"> {$point} </span>
                    {/foreach}
                </div>

                <div class="hero-actions d-flex flex-wrap gap-3 mt-4" data-aos="fade-up" data-aos-delay="300">
                    {foreach from=$content.hero.actions item=action}
                        <a href="{$action.href}" class="{$action.class}"> {$action.label} </a>
                    {/foreach}
                </div>
            </div>
        </div>
    </div>
</header>

<!-- ================== QUICK PROBLEM RECOGNITION ================== -->
<section class="problem-strip section-space-sm">
    <div class="container">
        <div class="row g-4">
            {foreach from=$content.problem.items item=problem key=key}
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="{$key*75}">
                    <div class="problem-item">
                        <strong> {$problem.title} </strong>
                        <span> {$problem.description} </span>
                    </div>
                </div>
            {/foreach}
        </div>
    </div>
</section>

<!-- ================== CATEGORY INTRO ================== -->
<section class="section-space">
    <div class="container">
        <div class="row align-items-end g-4">
            <div class="col-lg-8">
                <div class="section-eyebrow" data-aos="fade-up">{$content.category_intro.eyebrow}</div>
                <h2 class="section-title" data-aos="fade-up">{$content.category_intro.title}</h2>
                <p class="section-intro mt-3" data-aos="fade-up">{$content.category_intro.copy}</p>
            </div>
        </div>
    </div>
</section>

<!-- ================== SERVICE CARDS ================== -->
<section id="services" class="services-section section-space">
    <div class="container">
        <div class="row g-4">
            {foreach from=$content.service_cards item=service key=key}
                <div class="col-md-6 col-xl-4" data-aos="fade-up" data-aos-delay="{$key*75}">
                    <article class="service-card">
                        <div class="service-card-body">
                            <div class="service-number">{$service.service_number}</div>
                            <h2>{$service.title}</h2>
                            <p>{$service.description}</p>
                            <ul class="service-features">
                                {foreach from=$service.features item=feature}
                                    <li>{$feature}</li>
                                {/foreach}
                            </ul>
                            <a href="{$service.link}" class="mbtn service-card-link stretched-link">
                                <span> {$service.link_text} </span>
                                <span aria-hidden="true"> → </span>
                            </a>
                        </div>
                    </article>
                </div>
            {/foreach}
        </div>
    </div>
</section>

<!-- ================== HELP ME CHOOSE ================== -->
<section class="choose-section section-space">
    <div class="container">
        <div class="choose-panel" data-aos="fade-up">
            <div class="row align-items-center g-5">
                <div class="col-lg-5">
                    <div class="section-eyebrow text-info">{$content.help.eyebrow}</div>
                    <h2 class="fw-bold display-6">{$content.help.title}</h2>
                    <p class="fs-5 mt-3">{$content.help.text}</p>
                </div>

                <div class="col-lg-7">
                    <div class="row g-3">
                        {foreach from=$content.help.cards item=card}
                            <div class="col-md-6">
                                <div class="choice-item">
                                    <strong> {$card.problem} </strong>
                                    <span> {$card.solution} </span>
                                </div>
                            </div>
                        {/foreach}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================== WHY SKALE ================== -->
<section class="section-space">
    <div class="container">
        <div class="section-eyebrow" data-aos="fade-up">{$content.why.eyebrow}</div>
        <h2 class="section-title" data-aos="fade-up">{$content.why.title}</h2>
        <p class="section-intro mt-3" data-aos="fade-up">{$content.why.text}</p>

        <div class="row g-4 mt-4">
            {foreach from=$content.why.cards item=card}
                <div class="col-md-6 col-xl-3" data-aos="fade-up">
                    <div class="approach-card">
                        <div class="approach-number">{$card.number}</div>
                        <h3>{$card.title}</h3>
                        <p>{$card.description}</p>
                    </div>
                </div>
            {/foreach}
        </div>
    </div>
</section>

<!-- ================== RELATED CATEGORIES ================== -->
<section class="related-section section-space-sm">
    <div class="container">
        <div class="row align-items-end g-4 mb-4">
            <div class="col-lg-8">
                <div class="section-eyebrow" data-aos="fade-up">{$content.related_categories.eyebrow}</div>
                <h2 class="h2 fw-bold" data-aos="fade-up">{$content.related_categories.title}</h2>
            </div>
        </div>

        <div class="row g-3">
            {foreach from=$content.related_categories.categories item=category key=key}
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="{$key*75}">
                    <a href="{$category.url}" class="related-card">
                        <strong> {$category.title} → </strong>
                        <span> {$category.copy} </span>
                    </a>
                </div>
            {/foreach}
        </div>
    </div>
</section>

<!-- ================== FINAL CTA ================== -->
<section id="contact" class="final-cta section-space rounded-0">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-8" data-aos="fade-right">
                <div class="section-eyebrow text-info">{$content.finalCTA.eyebrow}</div>
                <h2 class="section-title text-white">{$content.finalCTA.title}</h2>
                <p class="section-intro mt-3">{$content.finalCTA.description}</p>
            </div>

            <div class="col-lg-4 text-lg-end" data-aos="fade-left">
                <a href="{$content.finalCTA.buttonUrl}" class="btn-skale"> {$content.finalCTA.buttonText} </a>
            </div>
        </div>
    </div>
</section>

{include file="inc/layout/footer.tpl"}
