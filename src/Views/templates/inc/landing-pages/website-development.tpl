<section class="website-development-hero py-5">
    <div class="container py-5">
        <div class="row align-items-center g-5">
            <div class="col-lg-7" data-aos="fade-up">
                {include file="inc/landing-pages/inc/logo.tpl" linkDescribedBy="website development landing page logo"}

                <span class="badge automation-badge rounded-pill px-3 py-2 mb-3">
                    {$data.sections.sectionHero.category}
                </span>

                <h1 class="display-4 fw-bold mb-4">
                    {$data.sections.sectionHero.headline}
                </h1>

                <p class="lead mb-4">{$data.sections.sectionHero.subheadline}</p>

                <p class="mb-4">{$data.sections.sectionHero.text}</p>

                <div class="row g-3 mb-4">
                    {foreach from=$data.sections.sectionHero.checks item=check}
                        <div class="col-sm-6">&check; {$check}</div>
                    {/foreach}
                </div>

                <a class="btn btn-lg btn-info rounded-pill px-4 fw-semibold" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-meta-custom-event="LandingLeadCtaClick" data-meta-label="website development hero page cta">
                    Get My Free Website Growth Review
                </a>
            </div>

            <div class="col-lg-5" data-aos="fade-up" data-aos-delay="200">
                <div id="strategy-session" class="form-panel p-4 p-lg-5 lead-card">
                    <h3 class="fw-bold mb-3">{$data.sections.sectionHero.formHeadline}</h3>
                    <p class="text-secondary mb-4">{$data.sections.sectionHero.formText}</p>

                    {include file="inc/landing-pages/inc/lead-contact-form.tpl" buttonText=$data.sections.sectionHero.formButtonText userMessageLabel=$data.sections.sectionHero.formUserMessageLabel}
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 comparison-section">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <span class="badge bg-primary-subtle text-primary px-3 py-2 mb-3">{$data.sections.sectionComparison.category}</span>
                <h2 class="display-5 fw-bold mb-3">{$data.sections.sectionComparison.headline}</h2>
                <p class="lead text-secondary">{$data.sections.sectionComparison.text}</p>
            </div>
        </div>

        <!-- Mobile Comparison Cards -->
        <div class="d-lg-none">
            {foreach from=$data.sections.sectionComparison.comparisonCards item=card key=k}
                <div class="card border-0 shadow-sm rounded-4 mb-3 overflow-hidden" data-aos="fade-up" data-aos-delay="{$k*100}">
                    <div class="card-header bg-primary text-white py-3">
                        <h3 class="h6 fw-bold mb-0">{$card.title}</h3>
                    </div>
                    <div class="card-body">
                        <div class="border rounded-3 p-3 mb-3">
                            <small class="text-uppercase fw-semibold d-block mb-2">Typical Agency</small>
                            <span class="text-secondary">{$card.typical}</span>
                        </div>
                        <div class="border border-primary rounded-3 p-3 bg-primary-subtle">
                            <small class="text-uppercase fw-semibold text-primary d-block mb-2">Skale</small>
                            <strong>{$card.skale}</strong>
                        </div>
                    </div>
                </div>
            {/foreach}
        </div>

        <!-- Desktop Comparison Table -->
        <div class="d-none d-lg-block">
            <div class="automation-card p-4 p-lg-5">
                <div class="row fw-bold text-secondary d-none d-md-flex mb-3">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">Typical Agency</div>
                    <div class="col-md-4">Skale</div>
                </div>

                {foreach from=$data.sections.sectionComparison.comparisonCards item=card key=k}
                    <div class="comparison-row row" data-aos="fade-up" data-aos-delay="{$k*50}">
                        <div class="col-md-4 fw-bold">{$card.title}</div>
                        <div class="col-md-4 text-secondary">{$card.typical}</div>
                        <div class="col-md-4">{$card.skale}</div>
                    </div>
                {/foreach}
            </div>
        </div>
    </div>
</section>

<section class="py-5 blue-bg why-skale">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="mb-5">
                    <h2 class="lh-lg text-center display-6 fw-bold mb-4">{$data.sections.sectionWhySkale.headline}</h2>
                    <h4 class="lh-base fw-bold mb-4">{$data.sections.sectionWhySkale.subheadline}</h4>
                    <p class="lead">{$data.sections.sectionWhySkale.text}</p>
                </div>
            </div>
        </div>

        <div class="row g-4">
            {foreach from=$data.sections.sectionWhySkale.features item=feature key=k}
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="{$k*100}">
                    <div class="feature-card">
                        <h4>{$feature.title}</h4>
                        <p>{$feature.description}</p>
                    </div>
                </div>
            {/foreach}
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-lg-8">
                <div class="glass-card shadow-xl" data-aos="fade-up">
                    <h3 class="h2 fw-bold mb-3">{$data.sections.sectionBuiltForGrowth.headline}</h3>
                    <p class="mb-4 text-secondary">{$data.sections.sectionBuiltForGrowth.subheadline}</p>
                    <button class="btn btn-primary btn-lg px-4 stretched-link" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-meta-custom-event="LandingLeadCtaClick" data-meta-label="website development mid page cta">
                        {$data.sections.sectionBuiltForGrowth.ctaButtonText}
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="process">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-6 fw-bold">{$data.sections.sectionProcess.headline}</h2>
        </div>

        <div class="row text-center py-4">
            {foreach from=$data.sections.sectionProcess.steps item=step key=k}
                <div class="col-md-4" data-aos="fade-left" data-aos-delay="{$k*100}">
                    <h4 class="fw-bold">
                        <span class="highlight">{$k+1}</span>. {$step.title}
                    </h4>
                    <p>{$step.description}</p>
                </div>
            {/foreach}
        </div>
    </div>
</section>

{include file="inc/landing-pages/inc/stats.tpl"}
{include file="inc/landing-pages/inc/faq.tpl" faq=$data.sections.sectionFAQ}
{include file="inc/landing-pages/inc/modal.tpl" modalTitle="Get Your Free Website Growth Strategy Session" ctaText="Get My Website Plan" modalDescription="We'll review your current setup and identify opportunities to generate more leads and improve efficiency."}
{include file="inc/landing-pages/inc/footer.tpl" headline="Ready For A Website That Works Harder?" subheadline="Get a free strategy session and discover opportunities to improve your online presence." ctaText="Get My Website Plan" class="cta"}
