{* <section class="cta-section py-5 bg-gradient">
<div class="container">
<div class="row justify-content-center align-items-center mb-5">
<div class="col-md-8 mb-4 mb-lg-0 text-center">
<h2 class="display-4 fw-bold text-dark mb-4">We Build the Infrastructure Behind Scalable Businesses</h2>
<p class="lead text-white-100 mb-4">Not one-off services. Not disconnected solutions.<br>Everything we do is engineered to support long-term growth.</p>
</div>
</div>

{foreach from=$serviceList key=key item=service name=services key=key}
<div class="card border-0 shadow-lg mb-5" data-aos="fade-up">
<div class="row g-0 align-items-center">
<div class="col-md-4">
<img src="{$smarty.ENV.IMG_ROOT}{$service->image}" alt="{$service->title}" class="img-fluid rounded-start h-100 w-100">
</div>

<div class="col-md-8">
<div class="card-body">
<h3 class="card-title px-0 mb-2 ubuntu-regular">{$service->title}</h3>
<p>{$service->shortText}</p>
<a aria-describedby="home solutions {$service->title}" href="{$smarty.ENV.SITE_URL}{$service->url}" class="stretched-link logo-bg-small mbtn btn btn-primary btn">Learn more about {$service->title}</a>
</div>
</div>
</div>
</div>
{/foreach}
</div>
</section> *}



<section id="solutions" class="section-padding bg-gradient">
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
