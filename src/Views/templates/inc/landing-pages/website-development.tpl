<section class="website-development-hero py-5">
    <div class="container py-5">
        <div class="row align-items-center g-5">
            <div class="col-lg-7">
                {include file="inc/landing-pages/inc/logo.tpl" linkDescribedBy="website development landing page logo"}

                <span class="badge automation-badge rounded-pill px-3 py-2 mb-3">Website Development</span>

                <h1 class="display-4 fw-bold mb-4">
                    Websites Built To Generate Leads, Not Just Look Good
                </h1>

                <p class="lead mb-4">Your website should be your best salesperson. We design and develop high-performing websites focused on speed, user experience, search visibility, and converting visitors into customers.</p>

                <p class="mb-4">Whether you're starting from scratch or rebuilding an outdated site, we create websites that help businesses attract more traffic, build trust faster, and turn clicks into real opportunities.</p>

                {* <div class="row">
                <div class="trust-list">
                <div class="trust-item">&check; Custom Website Design and Development</div> *}
                {* <div class="trust-item">&check; Mobile-first responsive experiences</div> *}
                {* <div class="trust-item">&check; SEO-ready architecture</div> *}
                {* <div class="trust-item">&check; Fast page speed optimization</div> *}
                {* <div class="trust-item">&check; Conversion Focused layouts</div> *}
                {* <div class="trust-item">&check; Analytics and lead tracking setup</div> *}
                {* <div class="trust-item">&check; More Qualified Leads</div>
                <div class="trust-item">&check; Faster Website Performance</div>
                <div class="trust-item">&check; Better Google Visibility</div>
                <div class="trust-item">&check; Mobile Optimized Experience</div>
                <div class="trust-item">&check; Analytics &amp; Lead Tracking</div>
                <div class="trust-item">&check; Built to Scale</div>
                </div>
                </div> *}

                <div class="row g-3 mb-4">
                    <div class="col-sm-6">&check; Custom Websites</div>
                    <div class="col-sm-6">&check; CRM & Lead Routing</div>
                    <div class="col-sm-6">&check; Custom Internal Tools</div>
                    <div class="col-sm-6">&check; Reporting Automation</div>
                    <div class="col-sm-6">&check; App & System Integrations</div>
                    <div class="col-sm-6">&check; Built to Scale</div>
                </div>
            </div>

            <div class="col-lg-5">
                <div id="strategy-session" class="form-panel p-4 p-lg-5 lead-card">
                    <h3 class="fw-bold mb-3">Get Your Free Growth Strategy Session</h3>
                    <p class="text-secondary mb-4">We'll review your current setup and identify opportunities to generate more leads and improve efficiency.</p>

                    {include file="inc/landing-pages/inc/lead-contact-form.tpl" buttonText="Get My Free Strategy Session" userMessageLabel="What do you want to improve with your website?"}
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Get Your Free Growth Strategy Session</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <p class="secondary">We'll review your current setup and identify opportunities to generate more leads and improve efficiency.</p>
                {include file="inc/landing-pages/inc/lead-contact-form.tpl"}
            </div>

            {* <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Understood</button>
            </div> *}
        </div>
    </div>
</div>


<section class="py-5 comparison-section">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <span class="badge bg-primary-subtle text-primary px-3 py-2 mb-3">Why Choose Skale</span>
                <h2 class="display-5 fw-bold mb-3">Most Agencies Build Websites.<br>We Build Growth Infrastructure.</h2>
                <p class="lead text-secondary">Not all website development partners are created equal. Here's how Skale compares to a typical web design agency.</p>
            </div>
        </div>

        <!-- Mobile Comparison Cards -->
        <div class="d-lg-none">
            {foreach from=$data.comparisonCards item=card}
                <div class="card border-0 shadow-sm rounded-4 mb-3 overflow-hidden">
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
            <div class="row justify-content-center mb-5">
                <div class="col-lg-10">
                    <div class="text-left table-responsive shadow-xl overflow-hidden rounded-4">
                        <table class="table table-bordered align-middle mb-0 table-hover">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>
                                        <h5 class="fw-bold mb-0">Typical Agency</h5>
                                    </th>
                                    <th class="bg-primary text-white">
                                        <h5 class="fw-bold mb-0">Skale</h5>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                {foreach from=$data.comparisonCards item=card}
                                    <tr>
                                        <td class="fw-semibold">{$card.title}</td>
                                        <td>{$card.typical}</td>
                                        <td><strong>{$card.skale}</strong></td>
                                    </tr>
                                {/foreach}
                            </tbody>
                        </table>

                        <div class="border-top mt-4 pt-4 text-secondary text-center">
                            <p>Based on common offerings from freelance designers and traditional web agencies.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 blue-bg why-skale">
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
            <div class="col-md-4" data-aos="fade-up">
                <div class="feature-card">
                    <h4>Convert More Visitors</h4>
                    <p>Clear messaging, optimized calls-to-action, and strategic layouts help guide users toward taking action.</p>
                </div>
            </div>

            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="feature-card">
                    <h4>Built For Growth</h4>
                    <p>Create a foundation that can evolve with your business as traffic, products, and services expand.</p>
                </div>
            </div>

            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="feature-card">
                    <h4>Faster Performance</h4>
                    <p>Reduce page load times and improve user experience across desktop and mobile devices.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-lg-8">
                <div class="glass-card shadow-xl" data-aos="fade-up">
                    <h3 class="h2 fw-bold mb-3">Built for More Than Just Launch Day</h3>
                    <p class="mb-4 text-secondary">Your website should be your hardest-working business asset. At Skale, we combine website development, automation, analytics, and growth strategy to create systems that help businesses generate more leads, operate more efficiently, and scale with confidence.</p>
                    <button class="btn btn-primary btn-lg px-4" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-meta-custom-event="LandingLeadCtaClick" data-meta-label="website development mid page cta">
                        Get Your Free Growth Strategy Session
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="process">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-6 fw-bold">How It Works</h2>
        </div>

        <div class="row text-center py-4">
            <div class="col-md-4" data-aos="fade-left">
                <h4 class="fw-bold">
                    <span class="highlight">1</span>. Discover
                </h4>
                <p>We learn about your goals, audience, and current challenges.</p>
            </div>

            <div class="col-md-4" data-aos="fade-left" data-aos-delay="100">
                <h4 class="fw-bold">
                    <span class="highlight">2</span>. Build
                </h4>
                <p>We design and develop a custom experience aligned with your business objectives.</p>
            </div>

            <div class="col-md-4" data-aos="fade-left" data-aos-delay="200">
                <h4 class="fw-bold">
                    <span class="highlight">3</span>. Launch & Optimize
                </h4>
                <p>Track performance and continue improving results over time.</p>
            </div>
        </div>

        <div class="row text-center py-4">
            <div class="border-top mt-4 pt-4 text-secondary text-center">
                <p>Simple. Straightforward. Honest. We deliver results with no gimmicks.</p>
            </div>
        </div>
    </div>
</section>

<section class="stats py-5">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-3">
                <div class="stat-number"><span data-value="100">0</span>%</div>
                <p class="fs-5">Custom Solutions</p>
            </div>

            <div class="col-md-3">
                <div class="stat-number"><span data-value="20">0</span>+</div>
                <p class="fs-5">Years of Experience</p>
            </div>

            <div class="col-md-3">
                <div class="stat-number"><span data-value="24">0</span>/7</div>
                <p class="fs-5">Support & Optimization</p>
            </div>

            <div class="col-md-3">
                <div class="stat-number"><span data-value="1">0</span></div>
                <p class="fs-5">Growth Partner</p>
            </div>
        </div>
    </div>
</section>

{include file="inc/landing-pages/inc/faq.tpl"}
{include file="inc/landing-pages/inc/footer.tpl"}
