{include file="inc/layout/header.tpl"}

<link rel="stylesheet" href="{$smarty.ENV.WEB_ROOT}css/service-list.min.css" data-ajax-managed-stylesheet="true">

<main>
    <header class="hero">
        <div class="container py-5">
            <div class="row align-items-end g-5">
                <div class="col-xl-9">
                    <div class="eyebrow mb-4"><span class="eyebrow-dot"></span>Engineering systems for smarter growth</div>
                    <h1 class="fw-bold mb-4 text-white">Your business doesn't need more software. It needs better systems.</h1>
                    <p class="hero-copy mb-4">Skale connects websites, marketing, software, automation, analytics, and strategy into a growth system built around how your business actually works.</p>
                    <div class="d-flex flex-column flex-sm-row gap-3">
                        <a class="mbtn btn btn-skale btn-lg" href="{$smarty.ENV.SITE_URL}{$smarty.ENV.URL_CONTACT}">Get Your Free Growth Strategy Session</a>
                        <button class="btn btn-outline-skale btn-lg" onclick="scrollToEl('#explore')">Explore Solutions <i class="bi bi-arrow-down ms-1"></i></button>
                    </div>
                </div>

                <div class="col-xl-3">
                    <div class="hero-proof rounded-skale p-4">
                        <div class="small text-uppercase letter-spacing text-white-50 mb-2">Built differently</div>
                        <p class="fw-semibold mb-0 text-white">Business-first recommendations. Senior technical experience. No disconnected deliverables.</p>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section id="explore" class="section-padding">
        <div class="container">
            <div class="row justify-content-between align-items-end mb-5 g-4">
                <div class="col-lg-7">
                    <div class="eyebrow text-success mb-3"><span class="eyebrow-dot"></span>The problems we solve</div>
                    <h2 class="display-5 fw-bold mb-3">Does any of this sound familiar?</h2>
                    <p class="lead text-secondary mb-0">Most growth problems are not caused by a lack of effort. They happen when websites, tools, teams, and marketing fail to work together.</p>
                </div>

                <div class="col-lg-4">
                    <div class="service-card">
                        <p class="text-secondary mb-0">Start with the problem you recognize. We will help you find the right path forward.</p>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-md-6 col-xl-3">
                    <article class="problem-card p-4">
                        <div class="icon-box mb-4">
                            <i class="bi bi-graph-down-arrow"></i>
                        </div>
                        <h3 class="h5 fw-bold">Traffic, but not enough leads</h3>
                        <p class="text-secondary">People visit your website, but they do not take the next step or contact your business.</p>
                        <a class="mbtn text-link stretched-link" href="{$smarty.ENV.SITE_URL}{$smarty.ENV.URL_SERVICES_SOLUTIONS}/growth-infrastructure">Improve conversions <i class="bi bi-arrow-right"></i></a>
                    </article>
                </div>

                <div class="col-md-6 col-xl-3">
                    <article class="problem-card p-4">
                        <div class="icon-box mb-4">
                            <i class="bi bi-arrow-repeat"></i>
                        </div>
                        <h3 class="h5 fw-bold">Too much repetitive work</h3>
                        <p class="text-secondary">Your team spends valuable time copying data, updating spreadsheets, and repeating manual processes.</p>
                        <a class="mbtn text-link stretched-link" href="{$smarty.ENV.SITE_URL}{$smarty.ENV.URL_SERVICES_SOLUTIONS}/automation-and-software">Automate operations <i class="bi bi-arrow-right"></i></a>
                    </article>
                </div>

                <div class="col-md-6 col-xl-3">
                    <article class="problem-card p-4">
                        <div class="icon-box mb-4">
                            <i class="bi bi-diagram-3"></i>
                        </div>
                        <h3 class="h5 fw-bold">Systems that do not connect</h3>
                        <p class="text-secondary">Important information is scattered across tools, creating delays, mistakes, and limited visibility.</p>
                        <a class="mbtn text-link stretched-link" href="{$smarty.ENV.SITE_URL}{$smarty.ENV.URL_SERVICES_SOLUTIONS}/system-integrations">Connect your systems <i class="bi bi-arrow-right"></i></a>
                    </article>
                </div>

                <div class="col-md-6 col-xl-3">
                    <article class="problem-card p-4">
                        <div class="icon-box mb-4">
                            <i class="bi bi-arrows-angle-expand"></i>
                        </div>
                        <h3 class="h5 fw-bold">Growth is creating friction</h3>
                        <p class="text-secondary">Processes that once worked are becoming harder to manage as demand and complexity increase.</p>
                        <a class="mbtn text-link stretched-link" href="{$smarty.ENV.SITE_URL}{$smarty.ENV.URL_SERVICES_SOLUTIONS}/strategy-and-optimization">Build a scalable plan <i class="bi bi-arrow-right"></i></a>
                    </article>
                </div>
            </div>
            <div class="text-center mt-5"><p class="h4 fw-bold mb-1">If you recognized your business in any of these, you are in the right place.</p><p class="text-secondary mb-0">Skale helps turn disconnected efforts into systems that support growth.</p></div>
        </div>
    </section>

    <section class="goal-section section-padding-sm">
        <div class="container">
            <div class="text-center max-width-copy mx-auto mb-5">
                <div class="eyebrow text-success mb-3"><span class="eyebrow-dot"></span>Choose your goal</div>
                <h2 class="display-6 fw-bold">What are you trying to improve?</h2>
                <p class="lead text-secondary">Choose the outcome that matters most right now. Each solution can work independently or become part of a larger growth system.</p>
            </div>

            <div class="row g-4">
                <div class="col-md-6 col-xl-3">
                    <div class="goal-card d-block p-4">
                        <div class="d-flex justify-content-between align-items-start">
                            <div class="icon-box"><i class="bi bi-person-plus"></i></div>
                            <i class="bi bi-arrow-right arrow fs-4"></i>
                        </div>
                        <h3 class="h5 fw-bold mt-4">Generate More Leads</h3>
                        <p class="text-secondary mb-0">Improve your website, landing pages, forms, messaging, and customer journey.</p>
                        <a class="mbtn stretched-link" href="{$smarty.ENV.SITE_URL}{$smarty.ENV.URL_SERVICES_SOLUTIONS}/growth-infrastructure"></a>
                    </div>
                </div>

                <div class="col-md-6 col-xl-3">
                    <div class="goal-card d-block p-4">
                        <div class="d-flex justify-content-between align-items-start">
                            <div class="icon-box"><i class="bi bi-gear-wide-connected"></i></div>
                            <i class="bi bi-arrow-right arrow fs-4"></i>
                        </div>
                        <h3 class="h5 fw-bold mt-4">Automate Operations</h3>
                        <p class="text-secondary mb-0">Replace repetitive work with reliable workflows, integrations, and custom tools.</p>
                        <a class="mbtn stretched-link" href="{$smarty.ENV.SITE_URL}{$smarty.ENV.URL_SERVICES_SOLUTIONS}/automation-and-software"></a>
                    </div>
                </div>

                <div class="col-md-6 col-xl-3">
                    <div class="goal-card d-block p-4">
                        <div class="d-flex justify-content-between align-items-start">
                            <div class="icon-box"><i class="bi bi-megaphone"></i></div>
                            <i class="bi bi-arrow-right arrow fs-4"></i>
                        </div>
                        <h3 class="h5 fw-bold mt-4">Build Demand</h3>
                        <p class="text-secondary mb-0">Create more consistent visibility and lead flow through integrated marketing.</p>
                        <a class="mbtn stretched-link" href="{$smarty.ENV.SITE_URL}{$smarty.ENV.URL_SERVICES_SOLUTIONS}/demand-generation"></a>
                    </div>
                </div>

                <div class="col-md-6 col-xl-3">
                    <div class="goal-card d-block p-4">
                        <div class="d-flex justify-content-between align-items-start">
                            <div class="icon-box"><i class="bi bi-compass"></i></div>
                            <i class="bi bi-arrow-right arrow fs-4"></i>
                        </div>
                        <h3 class="h5 fw-bold mt-4">Scale Smarter</h3>
                        <p class="text-secondary mb-0">Identify bottlenecks, prioritize investments, and build a practical growth roadmap.</p>
                        <a class="mbtn stretched-link" href="{$smarty.ENV.SITE_URL}{$smarty.ENV.URL_SERVICES_SOLUTIONS}/strategy-and-optimization"></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="solutions" class="section-padding">
        <div class="container">
            <div class="max-width-copy mb-5">
                <div class="eyebrow text-success mb-3"><span class="eyebrow-dot"></span>Explore our solutions</div>
                <h2 class="display-5 fw-bold mb-3">Not isolated services. A connected path to growth.</h2>
                <p class="lead text-secondary">Every engagement starts with the business outcome. We then bring together the right strategy, technology, and execution to move it forward.</p>
            </div>

            <article id="growth" class="solution-row">
                <div class="row align-items-center g-5">
                    <div class="col-lg-6 order-lg-2">
                        <div class="solution-visual visual-growth">
                            <div class="visual-window">
                                <div class="window-dots d-flex gap-2 mb-4">
                                    <span></span><span></span><span></span>
                                </div>
                                <div class="mock-line green w-50 mb-3"></div>
                                <div class="mock-line w-75 mb-4"></div>

                                <div class="row g-3">
                                    <div class="col-7">
                                        <div class="mock-block"></div>
                                    </div>

                                    <div class="col-5">
                                        <div class="mock-block"></div>
                                    </div>
                                </div>

                                <div class="mock-line w-100 mt-4"></div>
                                <div class="mock-line w-75 mt-2"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 order-lg-1">
                        <span class="badge text-bg-light border mb-3">Growth Infrastructure</span>
                        <h3 class="display-6 fw-bold">Turn your website into your best salesperson.</h3>
                        <p class="lead text-secondary">A website should do more than look polished. It should clearly explain your value, earn trust, guide visitors, capture leads, and connect to the systems behind your business.</p>
                        <ul class="check-list">
                            <li>Website design and development</li>
                            <li>Landing pages and conversion optimization</li>
                            <li>CRM, lead tracking, and customer journeys</li>
                            <li>Analytics, reporting, and performance improvements</li>
                        </ul>
                        <a class="mbtn btn btn-dark mt-2" href="{$smarty.ENV.SITE_URL}{$smarty.ENV.URL_SERVICES_SOLUTIONS}/growth-infrastructure">Explore Growth Infrastructure <i class="bi bi-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </article>

            <article id="automation" class="solution-row">
                <div class="row align-items-center g-5">
                    <div class="col-lg-6">
                        <div class="solution-visual visual-automation">
                            <div class="visual-window rotate-right">
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <div class="mock-line green w-50"></div>
                                    <i class="bi bi-lightning-charge-fill fs-3 text-success"></i>
                                </div>
                                <div class="d-flex align-items-center gap-3 mb-3">
                                    <div class="icon-box flex-shrink-0">
                                        <i class="bi bi-file-earmark-spreadsheet"></i>
                                    </div>
                                    <div class="mock-line w-75"></div>
                                </div>
                                <div class="text-center fs-3 text-success my-2">
                                    <i class="bi bi-arrow-down"></i>
                                </div>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="icon-box flex-shrink-0">
                                        <i class="bi bi-cloud-check"></i>
                                    </div>
                                    <div class="mock-line w-100"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <span class="badge text-bg-light border mb-3">Automation &amp; Software</span>
                        <h3 class="display-6 fw-bold">Stop paying people to do robot work.</h3>
                        <p class="lead text-secondary">Repetitive tasks drain time and make growth harder. We streamline the work, connect your tools, and build practical software that helps your team focus on higher-value decisions.</p>
                        <ul class="check-list">
                            <li>Workflow and business process automation</li>
                            <li>System integrations and data synchronization</li>
                            <li>Custom software, portals, and internal tools</li>
                            <li>AI-assisted reporting and operational insights</li>
                        </ul>
                        <a class="mbtn btn btn-dark mt-2" href="{$smarty.ENV.SITE_URL}{$smarty.ENV.URL_SERVICES_SOLUTIONS}/automation-and-software">Explore Automation &amp; Software <i class="bi bi-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </article>

            <article id="demand" class="solution-row">
                <div class="row align-items-center g-5">
                    <div class="col-lg-6 order-lg-2">
                        <div class="solution-visual visual-demand">
                            <div class="visual-window">
                                <div class="d-flex align-items-end gap-3" style="height:180px">
                                    <div class="bg-secondary-subtle rounded-top flex-fill" style="height:36%"></div>
                                    <div class="bg-secondary-subtle rounded-top flex-fill" style="height:52%"></div>
                                    <div class="bg-success-subtle rounded-top flex-fill" style="height:73%"></div>
                                    <div class="bg-success rounded-top flex-fill" style="height:94%"></div>
                                </div>
                                <div class="mock-line green w-50 mt-4 mb-3"></div>
                                <div class="mock-line w-75"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 order-lg-1">
                        <span class="badge text-bg-light border mb-3">Demand Generation</span>
                        <h3 class="display-6 fw-bold">Build a more predictable pipeline of customers.</h3><p class="lead text-secondary">Marketing works better when every channel supports the same journey. We connect traffic, messaging, conversion, follow-up, and reporting so your investment creates measurable opportunities.</p>
                        <ul class="check-list">
                            <li>SEO strategy and content improvement</li>
                            <li>Google and Meta paid advertising</li>
                            <li>Email marketing and lead nurturing</li>
                            <li>Marketing analytics and campaign optimization</li>
                        </ul>
                        <a class="mbtn btn btn-dark mt-2" href="{$smarty.ENV.SITE_URL}{$smarty.ENV.URL_SERVICES_SOLUTIONS}/demand-generation">Explore Demand Generation <i class="bi bi-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </article>

            <article id="strategy" class="solution-row">
                <div class="row align-items-center g-5">
                    <div class="col-lg-6">
                        <div class="solution-visual visual-strategy">
                            <div class="visual-window rotate-right">
                                <div class="d-flex justify-content-between mb-4">
                                    <div>
                                        <div class="mock-line green mb-2" style="width:130px"></div>
                                        <div class="mock-line" style="width:190px"></div>
                                    </div>
                                    <div class="icon-box"><i class="bi bi-bar-chart-line"></i></div>
                                </div>
                                <div class="row g-3">
                                    <div class="col-6">
                                        <div class="mock-block p-3">
                                            <div class="h3 fw-bold mb-1">01</div>
                                            <div class="mock-line w-75"></div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mock-block p-3">
                                            <div class="h3 fw-bold mb-1">02</div>
                                            <div class="mock-line w-75"></div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mock-block"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <span class="badge text-bg-light border mb-3">Strategy &amp; Optimization</span>
                        <h3 class="display-6 fw-bold">Know exactly what to improve next.</h3>
                        <p class="lead text-secondary">More activity is not always the answer. We examine how your business operates, where growth is getting stuck, and which improvements will create the greatest practical impact.</p>
                        <ul class="check-list">
                            <li>Growth audits and system mapping</li>
                            <li>Technology and marketing roadmaps</li>
                            <li>Analytics, KPI design, and reporting</li>
                            <li>Ongoing optimization and strategic guidance</li>
                        </ul>
                        <a class="mbtn btn btn-dark mt-2" href="{$smarty.ENV.SITE_URL}{$smarty.ENV.URL_SERVICES_SOLUTIONS}/strategy-and-optimization">Explore Strategy &amp; Optimization <i class="bi bi-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </article>
        </div>
    </section>

    <section id="approach" class="system-section section-padding">
        <div class="container">
            <div class="row justify-content-between align-items-end g-4 mb-5">
                <div class="col-lg-7"><div class="eyebrow mb-3"><span class="eyebrow-dot"></span>The Skale systems approach</div><h2 class="display-5 fw-bold text-white">The best results happen when everything works together.</h2></div>
                <div class="col-lg-4"><p class="text-white-50 lead mb-0">Most vendors improve one part. Skale connects the complete journey from attention to conversion, delivery, and insight.</p></div>
            </div>
            <div class="row align-items-stretch g-3 system-flow">
                <div class="col-6 col-lg"><div class="flow-card"><div class="icon-box mb-3"><i class="bi bi-window"></i></div><h3 class="h6 mb-0">Website</h3></div></div>
                <div class="col-auto d-none d-lg-flex align-items-center"><i class="bi bi-arrow-right flow-arrow"></i></div>
                <div class="col-6 col-lg"><div class="flow-card"><div class="icon-box mb-3"><i class="bi bi-megaphone"></i></div><h3 class="h6 mb-0">Marketing</h3></div></div>
                <div class="col-auto d-none d-lg-flex align-items-center"><i class="bi bi-arrow-right flow-arrow"></i></div>
                <div class="col-6 col-lg"><div class="flow-card"><div class="icon-box mb-3"><i class="bi bi-people"></i></div><h3 class="h6 mb-0">CRM</h3></div></div>
                <div class="col-auto d-none d-lg-flex align-items-center"><i class="bi bi-arrow-right flow-arrow"></i></div>
                <div class="col-6 col-lg"><div class="flow-card"><div class="icon-box mb-3"><i class="bi bi-gear"></i></div><h3 class="h6 mb-0">Automation</h3></div></div>
                <div class="col-auto d-none d-lg-flex align-items-center"><i class="bi bi-arrow-right flow-arrow"></i></div>
                <div class="col-6 col-lg"><div class="flow-card"><div class="icon-box mb-3"><i class="bi bi-bar-chart"></i></div><h3 class="h6 mb-0">Reporting</h3></div></div>
                <div class="col-auto d-none d-lg-flex align-items-center"><i class="bi bi-arrow-right flow-arrow"></i></div>
                <div class="col-6 col-lg"><div class="flow-card"><div class="icon-box mb-3"><i class="bi bi-graph-up-arrow"></i></div><h3 class="h6 mb-0">Growth</h3></div></div>
            </div>
            <div class="row g-4 mt-5">
                <div class="col-lg-4"><h3 class="h4 fw-bold">1. Find the friction</h3><p class="text-white-50">We uncover the bottlenecks, missed opportunities, and disconnected systems slowing the business down.</p></div>
                <div class="col-lg-4"><h3 class="h4 fw-bold">2. Prioritize the impact</h3><p class="text-white-50">We focus on the changes most likely to improve revenue, efficiency, visibility, or customer experience.</p></div>
                <div class="col-lg-4"><h3 class="h4 fw-bold">3. Build for what comes next</h3><p class="text-white-50">We implement practical systems designed to work today and support the next stage of growth.</p></div>
            </div>
        </div>
    </section>

    <section class="section-padding">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-5">
                    <div class="eyebrow text-success mb-3">
                        <span class="eyebrow-dot"></span>
                        Why businesses choose Skale
                    </div>
                    <h2 class="display-5 fw-bold">A partner who understands the whole business.</h2>
                    <p class="lead text-secondary">You should not have to coordinate separate vendors for your website, marketing, software, data, and automation. Skale brings technical depth and business context together.</p>
                    <a class="mbtn btn btn-outline-dark" href="{$smarty.ENV.SITE_URL}{$smarty.ENV.URL_CONTACT}">Talk Through Your Challenges</a>
                </div>

                <div class="col-lg-7"><div class="row g-3">
                        <div class="col-md-6">
                            <div class="reason-card p-4">
                                <div class="icon-box mb-3">
                                    <i class="bi bi-award"></i>
                                </div>
                                <h3 class="h5 fw-bold">20+ Years of Experience</h3>
                                <p class="text-secondary mb-0">Senior engineering and consulting experience applied directly to your business.</p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="reason-card p-4">
                                <div class="icon-box mb-3">
                                    <i class="bi bi-person-check"></i>
                                </div>
                                <h3 class="h5 fw-bold">Founder-Led Engagements</h3>
                                <p class="text-secondary mb-0">Direct access, thoughtful recommendations, and accountability from start to finish.</p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="reason-card p-4">
                                <div class="icon-box mb-3">
                                    <i class="bi bi-sliders"></i>
                                </div>
                                <h3 class="h5 fw-bold">Built Around Your Business</h3>
                                <p class="text-secondary mb-0">No rigid package or generic playbook forced onto a problem it does not fit.</p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="reason-card p-4">
                                <div class="icon-box mb-3">
                                    <i class="bi bi-infinity"></i>
                                </div>
                                <h3 class="h5 fw-bold">Long-Term Thinking</h3>
                                <p class="text-secondary mb-0">Solutions are designed to reduce future friction, not create another short-lived fix.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-padding-sm bg-light">
        <div class="container">
            <div class="text-center max-width-copy mx-auto mb-5"><h2 class="display-6 fw-bold">Typical agency vs. the Skale approach</h2><p class="lead text-secondary">The difference is not only what gets delivered. It is how each decision supports the larger business.</p></div>
            <div class="comparison-table bg-white shadow-sm">
                <div class="row g-0 comparison-head"><div class="col-4">Area</div><div class="col-4">Typical Agency</div><div class="col-4 skale-column">Skale</div></div>

                <div class="row g-0"><div class="col-4 fw-semibold">Starting point</div><div class="col-4 text-secondary">Requested deliverable</div><div class="col-4 skale-column fw-semibold">Business outcome</div></div>

                <div class="row g-0"><div class="col-4 fw-semibold">Recommendations</div><div class="col-4 text-secondary">Limited to one service</div><div class="col-4 skale-column fw-semibold">Across systems and teams</div></div>

                <div class="row g-0"><div class="col-4 fw-semibold">Technology</div><div class="col-4 text-secondary">Platform-first</div><div class="col-4 skale-column fw-semibold">Fit-for-purpose</div></div>

                <div class="row g-0"><div class="col-4 fw-semibold">Success</div><div class="col-4 text-secondary">Launch completed</div><div class="col-4 skale-column fw-semibold">Measurable improvement</div></div>
            </div>
        </div>
    </section>

    <section class="section-padding-sm">
        <div class="container">
            <div class="row text-center rounded-skale border overflow-hidden mx-0">
                <div class="col-lg-3 metric"><div class="metric-number">20+</div><div class="text-secondary mt-2">Years of experience</div></div>

                <div class="col-lg-3 metric"><div class="metric-number">4</div><div class="text-secondary mt-2">Connected solution pillars</div></div>

                <div class="col-lg-3 metric"><div class="metric-number">1</div><div class="text-secondary mt-2">Partner across the journey</div></div>

                <div class="col-lg-3 metric"><div class="metric-number">Custom</div><div class="text-secondary mt-2">Every engagement</div></div>
            </div>
        </div>
    </section>

    <section id="resources" class="section-padding bg-light">
        <div class="container">
            <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-end gap-3 mb-5">
                <div>
                    <div class="eyebrow text-success mb-3">
                        <span class="eyebrow-dot"></span>
                        Keep exploring
                    </div>

                    <h2 class="display-6 fw-bold mb-0">Learn how businesses scale smarter.</h2>
                </div>

                <a class="mbtn text-link" href="{$smarty.ENV.SITE_URL}blog">View all insights <i class="bi bi-arrow-right"></i></a>
            </div>

            <div class="row g-4">
                {foreach from=$data.blogList item=blog key=k}
                    <div class="col-lg-4">
                        <article class="resource-card">
                            <div class="resource-art">
                                <img src="{$smarty.ENV.IMG_ROOT}{$blog->image}" class="card-img-top blog-image" alt="{$blog->title}">
                            </div>

                            <div class="p-4">
                                <span class="small text-uppercase fw-bold text-success letter-spacing">{$blog->category}</span>
                                <h3 class="h4 fw-bold mt-2">{$blog->title}</h3>
                                <p class="text-secondary">{$blog->shortText|truncate:100}</p>
                                <a aria-describedby="serviceList blog {$blog->title}" class="mbtn text-link stretched-link" href="{$smarty.ENV.SITE_URL}blog/{$blog->datePosted|date_format:"%Y-%m-%d"}/{$blog->url}">Read the article <i class="bi bi-arrow-right"></i></a>
                            </div>
                        </article>
                    </div>
                {/foreach}
            </div>
        </div>
    </section>

    <section id="contact" class="section-padding">
        <div class="container">
            <div class="cta-panel p-4 p-md-5 p-xl-6">
                <div class="row g-5 align-items-start">
                    <div class="col-lg-6">
                        <div class="eyebrow mb-3"><span class="eyebrow-dot"></span>Free consultation</div>
                        <h2 class="display-5 fw-bold text-white">Ready to build systems that actually scale?</h2>
                        <p class="lead text-white-50">Tell us what is getting in the way. We will help you identify the highest-impact opportunities across your website, marketing, processes, and technology.</p>
                        <div class="d-flex flex-column gap-3 mt-4">
                            <div><i class="bi bi-check-circle-fill text-success me-2"></i>No-pressure discovery conversation</div>
                            <div><i class="bi bi-check-circle-fill text-success me-2"></i>Clear next-step recommendations</div>
                            <div><i class="bi bi-check-circle-fill text-success me-2"></i>Direct conversation with an experienced technical partner</div>
                        </div>

                        <div class="mt-5">
                            <div class="small text-white-50 text-uppercase letter-spacing mb-1">Prefer email?</div>
                            <a class="h5 text-white text-decoration-none" href="mailto:{$smarty.ENV.SITE_EMAIL}">{$smarty.ENV.SITE_EMAIL}</a>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <form class="contact-form bg-white text-dark rounded-skale p-4 p-md-5 ajaxForm" action="{$smarty.ENV.SITE_URL}contact-form" method="post">
                            <input type="hidden" name="form_type" value="service-consultation">
                            <h3 class="h4 fw-bold mb-1">Start the conversation</h3>
                            <p class="text-secondary mb-4">Share a few details and we will follow up.</p>
                            <div class="row g-3">
                                <div class="col-md-6"><label class="form-label fw-semibold" for="name">Name</label><input class="form-control" id="name" name="name" type="text" autocomplete="name" required></div>
                                <div class="col-md-6"><label class="form-label fw-semibold" for="email">Email</label><input class="form-control" id="email" name="email" type="email" autocomplete="email" required></div>
                                <div class="col-12"><label class="form-label fw-semibold" for="company">Company</label><input class="form-control" id="company" name="company" type="text" autocomplete="organization"></div>
                                <div class="col-12"><label class="form-label fw-semibold" for="interest">What would you like to improve?</label><select class="form-select" id="interest" name="interest" required><option value="" selected disabled>Select the closest option</option><option>Generate more leads</option><option>Improve my website</option><option>Automate repetitive work</option><option>Connect business systems</option><option>Improve marketing performance</option><option>Create a growth strategy</option><option>Not sure yet</option></select></div>
                                <div class="col-12"><label class="form-label fw-semibold" for="message">What is happening now?</label><textarea class="form-control" id="comment" name="comment" placeholder="Briefly describe the challenge, what you have tried, or what you want to accomplish."></textarea></div>
                                <div class="col-12"><button class="btn btn-skale btn-lg w-100" type="submit">Request My Free Consultation <i class="bi bi-arrow-right ms-1"></i></button></div>
                                <div class="col-12"><p class="small text-secondary text-center mb-0">Your information stays private. No spam or aggressive sales follow-up.</p></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<a class="mbtn btn btn-skale sticky-cta d-lg-none" href="{$smarty.ENV.SITE_URL}{$smarty.ENV.URL_CONTACT}"><i class="bi bi-chat-dots me-2"></i>Free Consultation</a>

{include file="inc/layout/footer.tpl"}
