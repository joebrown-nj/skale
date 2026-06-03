<section class="hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7 mb-4" data-aos="fade-up">
                <div class="brand mb-2 logo-text BricolageGrotesque-ExtraBold logo fw-bold">
                    <a href="{$smarty.ENV.WEB_ROOT}" class="fs-1 mbtn" aria-describedby="thank you page logo link">
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
                        <div class="trust-item">&check; Custom Website Design and Development</div>
                        {* <div class="trust-item">&check; Mobile-first responsive experiences</div> *}
                        {* <div class="trust-item">&check; SEO-ready architecture</div> *}
                        {* <div class="trust-item">&check; Fast page speed optimization</div> *}
                        <div class="trust-item">&check; Conversion Focused layouts</div>
                        {* <div class="trust-item">&check; Analytics and lead tracking setup</div> *}
                        <div class="trust-item">&check; More Qualified Leads</div>
                        <div class="trust-item">&check; Faster Website Performance</div>
                        <div class="trust-item">&check; Better Google Visibility</div>
                        <div class="trust-item">&check; Mobile Optimized Experience</div>
                        <div class="trust-item">&check; Analytics &amp; Lead Tracking</div>
                        <div class="trust-item">&check; Built to Scale</div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 offset-lg-1" data-aos="fade-up">
                <div class="lead-card">
                    <h3 class="fw-bold mb-3">Get Your Free Growth Strategy Session</h3>
                    <p class="text-tertiary mb-4">We'll review your current setup and identify opportunities to generate more leads and improve efficiency.</p>

                    {include file="inc/landing-pages/inc/lead-contact-form.tpl"}
                </div>
            </div>
        </div>
    </div>
</section>

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

            {* <div class="card border-0 shadow-sm rounded-4 mb-3 overflow-hidden">
                <div class="card-header bg-primary text-white py-3">
                    <h3 class="h6 fw-bold mb-0">Primary Focus</h3>
                </div>
                <div class="card-body">
                    <div class="border rounded-3 p-3 mb-3">
                        <small class="text-uppercase fw-semibold d-block mb-2">Typical Agency</small>
                        <span class="text-secondary">Design & aesthetics</span>
                    </div>
                    <div class="border border-primary rounded-3 p-3 bg-primary-subtle">
                        <small class="text-uppercase fw-semibold text-primary d-block mb-2">Skale</small>
                        <strong>Business growth & lead generation</strong>
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow-sm rounded-4 mb-3 overflow-hidden">
                <div class="card-header bg-primary text-white py-3">
                    <h3 class="h6 fw-bold mb-0">Website Strategy</h3>
                </div>
                <div class="card-body">
                    <div class="border rounded-3 p-3 mb-3 text-tertiary">
                        <small class="text-uppercase fw-semibold text-secondary d-block mb-2">Typical Agency</small>
                        <span>Build a website and launch</span>
                    </div>
                    <div class="border border-primary rounded-3 p-3 bg-primary-subtle">
                        <small class="text-uppercase fw-semibold text-primary d-block mb-2">Skale</small>
                        <strong>Create a website that supports marketing, sales, and growth goals</strong>
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow-sm rounded-4 mb-3 overflow-hidden">
                <div class="card-header bg-primary text-white py-3">
                    <h3 class="h6 fw-bold mb-0">Development Approach</h3>
                </div>
                <div class="card-body">
                    <div class="border rounded-3 p-3 mb-3 text-tertiary">
                        <small class="text-uppercase fw-semibold text-secondary d-block mb-2">Typical Agency</small>
                        <span>Templates and page builders</span>
                    </div>
                    <div class="border border-primary rounded-3 p-3 bg-primary-subtle">
                        <small class="text-uppercase fw-semibold text-primary d-block mb-2">Skale</small>
                        <strong>Custom development and scalable solutions</strong>
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow-sm rounded-4 mb-3 overflow-hidden">
                <div class="card-header bg-primary text-white py-3">
                    <h3 class="h6 fw-bold mb-0">Marketing Integration</h3>
                </div>
                <div class="card-body">
                    <div class="border rounded-3 p-3 mb-3 text-tertiary">
                        <small class="text-uppercase fw-semibold text-secondary d-block mb-2">Typical Agency</small>
                        <span>Limited or outsourced</span>
                    </div>
                    <div class="border border-primary rounded-3 p-3 bg-primary-subtle">
                        <small class="text-uppercase fw-semibold text-primary d-block mb-2">Skale</small>
                        <strong>CRM, email marketing, analytics, automation, and lead tracking included</strong>
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow-sm rounded-4 mb-3 overflow-hidden">
                <div class="card-header bg-primary text-white py-3">
                    <h3 class="h6 fw-bold mb-0">Technical Expertise</h3>
                </div>
                <div class="card-body">
                    <div class="border rounded-3 p-3 mb-3 text-tertiary">
                        <small class="text-uppercase fw-semibold text-secondary d-block mb-2">Typical Agency</small>
                        <span>Design-focused team</span>
                    </div>
                    <div class="border border-primary rounded-3 p-3 bg-primary-subtle">
                        <small class="text-uppercase fw-semibold text-primary d-block mb-2">Skale</small>
                        <strong>20+ years of software engineering and business growth experience</strong>
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                <div class="card-header bg-primary text-white py-3">
                    <h3 class="h6 fw-bold mb-0">Long-Term Value</h3>
                </div>
                <div class="card-body">
                    <div class="border rounded-3 p-3 mb-3 text-tertiary">
                        <small class="text-uppercase fw-semibold text-secondary d-block mb-2">Typical Agency</small>
                        <span>Website project completed</span>
                    </div>
                    <div class="border border-primary rounded-3 p-3 bg-primary-subtle">
                        <small class="text-uppercase fw-semibold text-primary d-block mb-2">Skale</small>
                        <strong>Long-term growth partner focused on helping your business scale</strong>
                    </div>
                </div>
            </div> *}
        </div>

        <!-- Desktop Comparison Table -->
        <div class="row justify-content-center mb-5 d-none d-lg-inline">
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

                            {* <tr>
                                <td class="fw-semibold">Primary Focus</td>
                                <td>Design & aesthetics</td>
                                <td><strong>Business growth & lead generation</strong></td>
                            </tr>
                            <tr>
                                <td class="fw-semibold">Website Strategy</td>
                                <td>Build a website and launch</td>
                                <td><strong>Create a website that supports marketing, sales, and growth goals</strong></td>
                            </tr>
                            <tr>
                                <td class="fw-semibold">Development Approach</td>
                                <td>Templates and page builders</td>
                                <td><strong>Custom development and scalable solutions</strong></td>
                            </tr>
                            <tr>
                                <td class="fw-semibold">SEO Optimization</td>
                                <td>Basic setup</td>
                                <td><strong>Built-in SEO best practices and performance optimization</strong></td>
                            </tr>
                            <tr>
                                <td class="fw-semibold">Marketing Integration</td>
                                <td>Limited or outsourced</td>
                                <td><strong>Integrated with CRM, email marketing, analytics, and automation</strong></td>
                            </tr>
                            <tr>
                                <td class="fw-semibold">Analytics & Tracking</td>
                                <td>Google Analytics only</td>
                                <td><strong>Lead tracking, conversion tracking, and reporting</strong></td>
                            </tr>
                            <tr>
                                <td class="fw-semibold">Technical Expertise</td>
                                <td>Design-focused team</td>
                                <td><strong>20+ years of engineering and software development experience</strong></td>
                            </tr>
                            <tr>
                                <td class="fw-semibold">After Launch Support</td>
                                <td>Maintenance only</td>
                                <td><strong>Ongoing optimization and growth strategy</strong></td>
                            </tr>
                            <tr>
                                <td class="fw-semibold">Long-Term Value</td>
                                <td>Website project completed</td>
                                <td><strong>Continuous improvement and business growth partnership</strong></td>
                            </tr> *}
                        </tbody>
                    </table>

                    <div class="border-top mt-4 pt-4 text-secondary text-center">
                        <p>Based on common offerings from freelance designers and traditional web agencies.</p>
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

<section class="py-5">
    <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-lg-8">
                <div class="glass-card shadow-xl">
                    <h3 class="h2 fw-bold mb-3">Built for More Than Just Launch Day</h3>
                    <p class="mb-4 text-secondary">Your website should be your hardest-working business asset. At Skale, we combine website development, automation, analytics, and growth strategy to create systems that help businesses generate more leads, operate more efficiently, and scale with confidence.</p>
                    <a href="#contact-form" class="btn btn-primary btn-lg px-4">Get Your Free Growth Strategy Session</a>
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

{include file="inc/landing-pages/inc/faq.tpl"}
{include file="inc/landing-pages/inc/footer.tpl"}