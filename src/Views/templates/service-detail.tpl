{* {include file="inc/layout/header.tpl"}

{if $data.serviceContent|empty}
{$data.serviceDetail->content}
{else}
<main class="service-detail-page {$p2}">
{if $data.serviceContent.sections.hero && $data.serviceContent.sections.hero.enabled}
{include file="inc/service/hero.tpl" data=$data.serviceContent.sections.hero}
{/if}

{if $data.serviceContent.sections.trustStrip && $data.serviceContent.sections.trustStrip.enabled}
{include file="inc/service/trust-strip.tpl" data=$data.serviceContent.sections.trustStrip}
{/if}

{if $data.serviceContent.sections.problems && $data.serviceContent.sections.problems.enabled}
{include file="inc/service/problems.tpl" data=$data.serviceContent.sections.problems}
{/if}

{if $data.serviceContent.sections.outcomes && $data.serviceContent.sections.outcomes.enabled}
{include file="inc/service/outcomes.tpl" data=$data.serviceContent.sections.outcomes}
{/if}

{if $data.serviceContent.sections.serviceComponents && $data.serviceContent.sections.serviceComponents.enabled}
{include file="inc/service/service-components.tpl" data=$data.serviceContent.sections.serviceComponents}
{/if}

{if $data.serviceContent.sections.caseStudy && $data.serviceContent.sections.caseStudy.enabled}
{include file="inc/service/case-study.tpl" data=$data.serviceContent.sections.caseStudy}
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
{include file="inc/service/final-cta.tpl" data=$data.serviceContent.sections.finalCta}
{/if}
</main>
{/if}

{include file="inc/layout/footer.tpl"} *}


{* <title>Website Development Services for Growing Businesses | Skale</title> *}
{* <meta name="description" content="Skale builds professional, conversion-focused websites for growing businesses. Improve messaging, user experience, performance, integrations, and lead generation."> *}

{include file="inc/layout/header.tpl"}

<link rel="stylesheet" href="{$smarty.ENV.WEB_ROOT}css/service-detail.min.css" data-ajax-managed-stylesheet="true" />

{if $content}
    <!-- ============================ SPECIFIC PROBLEM ============================ -->
    <header class="service-hero">
        <div class="container">
            {* <div class="breadcrumb-custom" data-aos="fade-up">
            <a href="/">Home</a>
            <span class="mx-2">/</span>

            <a href="/solutions/websites-conversion"> Websites & Conversion </a>

            <span class="mx-2">/</span>

            <span> Website Development </span>
            </div> *}

            <div class="row">
                <div class="col-xl-10">
                    <div class="hero-eyebrow" data-aos="fade-up">{$content.hero.eyebrow}</div>
                    <h1 data-aos="fade-up" data-aos-delay="75" class="text-white">{$content.hero.title}</h1>

                    <p class="hero-copy" data-aos="fade-up" data-aos-delay="150">
                        {$content.hero.copy}
                    </p>

                    <div class="hero-problems" data-aos="fade-up" data-aos-delay="225">
                        {foreach $content.hero.problems as $problem}
                            <span class="hero-problem">{$problem}</span>
                        {/foreach}
                    </div>

                    <div class="hero-actions d-flex flex-wrap gap-3 mt-4" data-aos="fade-up" data-aos-delay="300">
                        {foreach $content.hero.actions as $action}
                            <a href="{$action.href}" class="{$action.class}">{$action.text}</a>
                        {/foreach}
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main>
        <!-- ============================ SYMPTOMS ============================ -->
        <section id="symptoms" class="section-space">
            <div class="container">
                <div class="section-eyebrow" data-aos="fade-up">{$content.symptoms.eyebrow}</div>

                <h2 class="section-title" data-aos="fade-up">
                    {$content.symptoms.title}
                </h2>

                <p class="section-intro mt-3" data-aos="fade-up">
                    {$content.symptoms.copy}
                </p>

                <div class="row g-4 mt-4">
                    {foreach from=$content.symptoms.items item=item key=key}
                        <div class="col-md-6 col-xl-3" data-aos="fade-up" data-aos-delay="{$key*75}">
                            <article class="symptom-card">
                                <div class="symptom-number">{$item.number}</div>
                                <h3>{$item.title}</h3>
                                <p>{$item.copy}</p>
                            </article>
                        </div>
                    {/foreach}
                </div>

                <div class="text-center mt-5" data-aos="fade-up">
                    <a href="{$content.symptoms.link.url}" class="btn-skale"> {$content.symptoms.link.text} </a>
                </div>
            </div>
        </section>

        <!-- ============================ SOLUTION ============================ -->
        <section class="solution-section section-space">
            <div class="container">
                <div class="row align-items-start g-5">
                    <div class="col-lg-6" data-aos="fade-right">
                        <div class="section-eyebrow">{$content.solution.eyebrow}</div>

                        <h2 class="section-title">{$content.solution.title}</h2>

                        <p class="section-intro mt-3">
                            {$content.solution.copy}
                        </p>

                        <p class="text-secondary">
                            {$content.solution.secondary_copy}
                        </p>
                    </div>

                    <div class="col-lg-6">
                        <div class="row g-3">
                            <div class="col-md-6" data-aos="fade-up">
                                <div class="solution-panel">
                                    <h3>{$content.solution.cards.0.title}</h3>

                                    <p>
                                        {$content.solution.cards.0.copy}
                                    </p>
                                </div>
                            </div>

                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="75">
                                <div class="solution-panel">
                                    <h3>{$content.solution.cards.1.title}</h3>

                                    <p>
                                        {$content.solution.cards.1.copy}
                                    </p>
                                </div>
                            </div>

                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="150">
                                <div class="solution-panel">
                                    <h3>{$content.solution.cards.2.title}</h3>

                                    <p>
                                        {$content.solution.cards.2.copy}
                                    </p>
                                </div>
                            </div>

                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="225">
                                <div class="solution-panel">
                                    <h3>{$content.solution.cards.3.title}</h3>

                                    <p>{$content.solution.cards.3.copy}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ============================ WHAT'S INCLUDED ============================ -->
        <section class="section-space">
            <div class="container">
                <div class="section-eyebrow" data-aos="fade-up">{$content.included.eyebrow}</div>

                <h2 class="section-title" data-aos="fade-up">{$content.included.title}</h2>

                <p class="section-intro mt-3" data-aos="fade-up">
                    {$content.included.copy}
                </p>

                <div class="row g-4 mt-4">
                    {foreach from=$content.included.cards item=card}
                        <div class="col-md-6 col-lg-4" data-aos="fade-up">
                            <div class="included-card">
                                <h3>{$card.title}</h3>
                                <p>{$card.copy}</p>
                            </div>
                        </div>
                    {/foreach}
                </div>
            </div>
        </section>

        <!-- ============================ PROOF ============================ -->
        <section class="proof-section section-space">
            <div class="container">
                <div class="section-eyebrow text-info" data-aos="fade-up">{$content.proof.eyebrow}</div>

                <h2 class="section-title text-white" data-aos="fade-up">
                    {$content.proof.title}
                </h2>

                <p class="section-intro mt-3 text-secondary" data-aos="fade-up">
                    {$content.proof.copy}
                </p>

                <div class="row g-4 mt-4">
                    {foreach from=$content.proof.stats item=stat key=key}
                        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="{$key*100}">
                            <article class="proof-card">
                                <div class="proof-stat">{$stat.stat}</div>

                                <h3 class="text-white">{$stat.title}</h3>

                                {if $stat.copy}
                                    <p class="text-secondary">
                                        {$stat.copy}
                                    </p>
                                {/if}
                            </article>
                        </div>
                    {/foreach}
                </div>

                <div class="row align-items-center g-5 mt-4">
                    <div class="col-lg-7" data-aos="fade-right">
                        <h3 class="h2 fw-bold">{$content.founder.founder_title}</h3>

                        <p class="text-white-50">
                            {$content.founder.founder_copy}
                        </p>

                        <a href="{$content.founder.founder_link}" class="text-white fw-bold">{$content.founder.founder_link_text}</a>
                    </div>

                    <div class="col-lg-5" data-aos="fade-left">
                        <div class="p-4 rounded-4" style="background: rgba(255, 255, 255, 0.05); border: 1px solid rgba(255, 255, 255, 0.1)" >
                            {foreach from=$content.founder.founder_cards item=card}
                                <div class="mb-4">
                                    <strong class="d-block fs-5">{$card.title}</strong>
                                    <span class="text-white-50">{$card.copy}</span>
                                </div>
                            {/foreach}
                        </div>
                    </div>
                </div>

                <p class="proof-note mt-4 mb-0">{$content.founder.founder_note}</p>
            </div>
        </section>

        <!-- ============================ PROCESS ============================ -->
        <section class="section-space">
            <div class="container">
                <div class="section-eyebrow" data-aos="fade-up">{$content.process.eyebrow}</div>

                <h2 class="section-title" data-aos="fade-up">{$content.process.title}</h2>

                <p class="section-intro mt-3" data-aos="fade-up">
                    {$content.process.intro}
                </p>

                <div class="row g-4 mt-4">
                    {foreach from=$content.process.steps item=step key=key}
                        <div class="col-md-6 col-xl-3" data-aos="fade-up" data-aos-delay="{$key*75}">
                            <div class="process-step-card">
                                <div class="process-number">{$step.number}</div>
                                <h3>{$step.title}</h3>
                                <p>{$step.description}</p>
                            </div>
                        </div>
                    {/foreach}
                </div>
            </div>
        </section>

        <!-- ============================ FAQ ============================ -->
        <section class="faq-section section-space">
            <div class="container">
                <div class="row g-5">
                    <div class="col-lg-5" data-aos="fade-right">
                        <div class="section-eyebrow">{$content.faq.eyebrow}</div>
                        <h2 class="section-title">{$content.faq.title}</h2>

                        <p class="section-intro mt-3">
                            {$content.faq.intro}
                        </p>
                    </div>

                    <div class="col-lg-7" data-aos="fade-left">
                        <div class="accordion" id="websiteFaq">
                            {foreach from=$content.faq.questions item=question key=key}
                                <div class="accordion-item">
                                    <h3 class="accordion-header">
                                        <button
                                        class="accordion-button {if $key != 0}collapsed{/if}"
                                        type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#faq{$key}"
                                        aria-expanded="{if $key == 0}true{else}false{/if}"
                                        aria-controls="faq{$key}"
                                        >
                                        {$question.question}
                                    </button>
                                </h3>

                                <div id="faq{$key}" class="accordion-collapse collapse {if $key == 0}show{/if}" data-bs-parent="#websiteFaq">
                                    <div class="accordion-body">
                                        {$question.answer}
                                    </div>
                                </div>
                            </div>
                        {/foreach}
                    </div>
                </div>
            </div>
        </section>

        <!-- ============================ FINAL CTA / LEAD FORM  ============================ -->
        <section id="contact" class="cta-section section-space">
            <div class="container">
                <div class="row align-items-center g-5">
                    <div class="col-lg-6" data-aos="fade-right">
                        <div class="section-eyebrow text-info">{$content.final_cta.eyebrow}</div>
                        <h2 class="section-title text-white">{$content.final_cta.title}</h2>
                        <p class="section-intro mt-3">{$content.final_cta.intro}</p>
                        <p class="fs-5 text-white">{$content.final_cta.copy}</p>

                        <div class="mt-4">
                            {foreach from=$content.final_cta.benefits item=benefit}
                                <div class="d-flex gap-3 mb-3">
                                    <span class="text-info fw-bold"> ✓ </span>
                                    <span> {$benefit} </span>
                                </div>
                            {/foreach}
                        </div>
                    </div>

                    <div class="col-lg-6" data-aos="fade-left">
                        <div class="lead-form-card">
                            <div class="small fw-bold text-uppercase text-secondary mb-2">{$content.form.heading}</div>
                            <h3 class="fw-bold">{$content.form.subheading}</h3>
                            <p class="text-secondary">{$content.form.intro}</p>

                            <form action="/post-lead-form" method="post" class="ajaxForm" data-meta-form-name="{$p1}-form" data-meta-success-event="Lead" data-meta-success-custom-event="WebsiteReviewSubmitted" data-meta-start-custom-event="{$p1}-form-started">
                                <div class="row g-3">
                                    {foreach from=$content.form.fields item=field}
                                        <div class="{$field.divClass}">
                                            {if $field.fieldType == 'input'}
                                                <label for="{$field.for}" class="form-label">{$field.label}</label>
                                                <input type="{$field.type}" id="{$field.id}" name="{$field.name}" class="{$field.class}" autocomplete="{$field.autocomplete}" {if $field.required}required{/if} {if $field.placeholder}placeholder="{$field.placeholder}"{/if}>
                                            {/if}

                                            {if $field.fieldType == 'select'}
                                                <label for="{$field.for}" class="form-label">{$field.label}</label>
                                                <select id="{$field.id}" name="{$field.name}" class="{$field.class}">
                                                    {foreach from=$field.options item=option}
                                                        <option value="{$option.value}">{$option.label}</option>
                                                    {/foreach}
                                                </select>
                                            {/if}


                                            {if $field.fieldType == 'textarea'}
                                                <label for="{$field.for}" class="form-label">{$field.label}</label>
                                                <textarea id="{$field.id}" name="{$field.name}" class="{$field.class}" placeholder="{$field.placeholder}" {if $field.required}required{/if}></textarea>
                                            {/if}

                                            {if $field.fieldType == 'button'}
                                                <button type="submit" id="{$field.id}" name="{$field.name}" class="{$field.class}">{$field.value}</button>
                                            {/if}
                                        </div>
                                    {/foreach}
                                    <input type="hidden" name="interest" value="{$p2}">
                                    {include file="inc/layout/cloudflare-turnstile.tpl"}
                                </div>
                            </form>

                            <p class="form-note mt-3 mb-0">
                                No spam. No aggressive sales follow-up. I'll review what you send and tell you what I think the best next step is.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    {elseif $data.serviceDetail && $data.serviceDetail->content != ''}

    {$data.serviceDetail->content}

{/if}

{include file="inc/layout/footer.tpl"}
