<section class="hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7 mb-4" data-aos="fade-up">
                <div class="brand mb-2 logo-text BricolageGrotesque-ExtraBold logo fw-bold">
                    <a href="{$smarty.const.WEB_URL}" class="fs-1 mbtn" aria-describedby="thank you page logo link">
                        skale<span class="brand-color">.</span>
                    </a>
                </div>

                <h1 class="display-5 fw-bold mb-3">
                    Websites Built To Generate Leads, Not Just Look Good
                </h1>

                <h3 class="mb-3">
                    Your website should be your best salesperson. We design and develop high-performing websites focused on speed, user experience, search visibility, and converting visitors into customers.
                </h3>

                <p class="fs-5 text-tertiary mb-3">Whether you're starting from scratch or rebuilding an outdated site, we create websites that help businesses attract more traffic, build trust faster, and turn clicks into real opportunities.</p>

                <div class="row">
                    <div class="trust-list">
                        <div class="trust-item">&check; Custom website design and development</div>
                        <div class="trust-item">&check; Mobile-first responsive experiences</div>
                        <div class="trust-item">&check; SEO-ready architecture</div>
                        <div class="trust-item">&check; Fast page speed optimization</div>
                        <div class="trust-item">&check; Conversion-focused layouts</div>
                        <div class="trust-item">&check; Analytics and lead tracking setup</div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 offset-lg-1" data-aos="fade-up">
                <div class="lead-card">
                    <h3 class="fw-bold mb-3">Get Your Free Growth Strategy Session</h3>
                    <p class="text-tertiary mb-4">We'll review your current setup and identify opportunities to generate more leads and improve efficiency.</p>

                    {include file="inc/landing-pages/lead-contact-form2.tpl"}
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 blue-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="mb-5">
                    <h2 class="lh-lg text-center display-6 fw-bold mb-4">Why Businesses Work With Skale</h2>
                    <h4 class="lh-base fw-bold mb-4">Many businesses invest in attractive websites but struggle to generate results. We focus on building systems that support growth rather than creating something that simply looks good.</h4>
                    <p class="lead">Our approach combines strategy, design, performance, and conversion optimization so your website actively contributes to revenue generation.</p>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="feature-card">
                    <h4>Convert More Visitors</h4>
                    <p>Clear messaging, optimized calls-to-action, and strategic layouts help guide users toward taking action.</p>
                </div>
            </div>
    
            <div class="col-md-4">
                <div class="feature-card">
                    <h4>Built For Growth</h4>
                    <p>Create a foundation that can evolve with your business as traffic, products, and services expand.</p>
                </div>
            </div>
    
            <div class="col-md-4">
                <div class="feature-card">
                    <h4>Faster Performance</h4>
                    <p>Reduce page load times and improve user experience across desktop and mobile devices.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="process">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">How It Works</h2>
        </div>

        <div class="row text-center">
            <div class="col-md-4">
                <h1 class="highlight">1</h1>
                <h5>Discover</h5>
                <p>We learn about your goals, audience, and current challenges.</p>
            </div>

            <div class="col-md-4">
                <h1 class="highlight">2</h1>
                <h5>Build</h5>
                <p>We design and develop a custom experience aligned with your business objectives.</p>
            </div>

            <div class="col-md-4">
                <h1 class="highlight">3</h1>
                <h5>Launch & Optimize</h5>
                <p>Track performance and continue improving results over time.</p>
            </div>
        </div>
    </div>
</section>

<section class="stats py-5">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-3">
                <div class="stat-number">100%</div>
                <p>Custom Solutions</p>
            </div>

            <div class="col-md-3">
                <div class="stat-number">20+</div>
                <p>Years of Experience</p>
            </div>

            <div class="col-md-3">
                <div class="stat-number">24/7</div>
                <p>Support & Optimization</p>
            </div>

            <div class="col-md-3">
                <div class="stat-number">1</div>
                <p>Growth Partner</p>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light px-5">
    <h2 class="text-center fw-bold mb-5 text-secondary">Frequently Asked Questions</h2>

    <div class="accordion accordion-flush" id="faqAccordion">
        {foreach from=$faq key=k item=faq}
            <div class="accordion-item" data-aos="fade-up">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq{$k}" aria-expanded="false" aria-controls="faq{$k}">
                        {$faq.question}
                    </button>
                </h2>

                <div id="faq{$k}" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body text-secondary">
                        {$faq.answer}
                    </div>
                </div>
            </div>
        {/foreach}
    </div>
</section>

<section class="cta">
    <div class="container text-center">
        <h2 class="fw-bold mb-4">Ready For A Website That Works Harder?</h2>
        <p class="mb-4">Get a free strategy session and discover opportunities to improve your online presence.</p>
        <a href="/contact" class="mbtn btn btn-light btn-lg" aria-describedby="website development lead gen page">Get My Website Plan</a>
    </div>
</section>

<div class="sticky-mobile">
    <a href="/contact" class="mbtn btn btn-primary w-100" aria-describedby="website development lead gen page">Get A Free Strategy Session</a>
</div>