{include file="inc/layout/header.tpl"}

<div class="container-fluid">
    <div class="row justify-content-center align-items-center border-bottom py-4 text-bg-dark">
        <div class="col-md-6">
            <h2 class="display-4 fw-bold Bahnschrift logo-bg-small">{include file="inc/service/serviceIcon.tpl" serviceDetail=$data.serviceDetail} {$data.serviceDetail->title}</h2>
            <p class="lead">{if isset($data.serviceDetail->shortText) && $data.serviceDetail->shortText != ''}{$data.serviceDetail->shortText}{else}Learn more about our {$data.serviceDetail->title} solutions.{/if}</p>
        </div>

        <div class="col-md-4">
            <img style="max-width:100%; border:10px solid #171b1e;" alt="{$data.serviceDetail->title}" src="{$smarty.ENV.WEB_ROOT}images/{$data.serviceDetail->image}" style="width:100%; max-height:400px; object-fit:cover; object-position:center;">
        </div>
    </div>
</div>


<div class="container">
    <section class="py-5 bg-dark text-light position-relative overflow-hidden">
        <div class="row justify-content-center text-center py-4">
            <div class="col-md-8">
                <span class="text-uppercase fw-semibold text-primary small letter-spacing-2">Growth Infrastructure</span>
                <h1 class="display-3 fw-bold mt-3 mb-4">Build the Systems Behind Sustainable Business Growth</h1>
                <p class="lead text-secondary mb-5">
                    We design and implement the digital infrastructure that helps businesses scale efficiently - from high-performance websites and conversion-focused funnels to CRM systems, lead tracking, and automation.
                </p>
            </div>
            <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center">
                <a href="/contact" class="mbtn btn btn-primary btn-lg px-4" aria-describedby="growth infrastructure solutions page">Schedule a Consultation</a>
                <a href="/contact" class="mbtn btn btn-outline-light btn-lg px-4" aria-describedby="growth infrastructure solutions page">Explore Solutions</a>
            </div>
        </div>
    </section>
    <section class="py-5">
        <div class="row justify-content-center text-center py-4">
            <div class="col-md-8">
                <span class="text-uppercase fw-semibold text-primary small">Built for Growth</span>
                <h2 class="display-5 fw-bold mt-3 mb-4">Technology & Marketing Systems That Work Together</h2>
                <p class="lead text-muted">
                    Growth doesn't happen by accident. It's built on systems that attract leads, convert attention into revenue, and create operational clarity as your business scales. We create growth infrastructure that connects your website, funnels, CRM, automation, and reporting into one high-performing ecosystem.
                </p>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm h-100 rounded-4">
                    <div class="card-body p-4 p-xl-5">
                        <div class="mb-4">
                            <span class="badge bg-primary-subtle text-primary px-3 py-2 rounded-pill">Websites</span>
                        </div>
                        <h3 class="h3 fw-bold mb-3">High-Performance Websites</h3>
                        <p class="text-tertiary mb-4">
                            Your website should do more than look good - it should generate business. We build modern websites optimized for speed, SEO, user experience, and conversions so your online presence becomes a true growth asset.
                        </p>
                        <p class="text-tertiary mb-4">
                            Every page is strategically designed to guide visitors toward action, whether that means scheduling a consultation, submitting a lead form, making a purchase, or entering your sales pipeline.
                        </p>
                        <a href="/solutions/websites" class="fw-semibold text-decoration-none mbtn" aria-describedby="growth infrastructure solutions page">Learn More &rightarrow;</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm h-100 rounded-4">
                    <div class="card-body p-4 p-xl-5">
                        <div class="mb-4">
                            <span class="badge bg-primary-subtle text-primary px-3 py-2 rounded-pill">Funnels</span>
                        </div>
                        <h3 class="h3 fw-bold mb-3">Funnels & Conversion Optimization</h3>
                        <p class="text-tertiary mb-4">
                            We build conversion-focused funnel systems that turn traffic into measurable business growth. From landing pages and lead magnets to automated email sequences and conversion tracking, every step is engineered to reduce friction and improve performance.
                        </p>
                        <p class="text-tertiary mb-4">
                            By combining strategic messaging, automation, analytics, and UX best practices, we create scalable customer acquisition systems that help businesses consistently generate qualified leads.
                        </p>
                        <a href="/solutions/marketing-automation" class="fw-semibold text-decoration-none mbtn" aria-describedby="growth infrastructure solutions page">Optimize Your Funnel &rightarrow;</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm h-100 rounded-4">
                    <div class="card-body p-4 p-xl-5">
                        <div class="mb-4">
                            <span class="badge bg-primary-subtle text-primary px-3 py-2 rounded-pill">CRM Systems</span>
                        </div>
                        <h3 class="h3 fw-bold mb-3">CRM & Lead Tracking Systems</h3>
                        <p class="text-tertiary mb-4">
                            Growing businesses need visibility, organization, and automation. We implement CRM and lead management systems that centralize customer data, streamline follow-up, and improve sales operations.
                        </p>
                        <p class="text-tertiary mb-4">
                            From automated workflows and pipeline management to reporting and lead attribution, we help businesses eliminate disconnected systems and create operational clarity across marketing and sales.
                        </p>
                        <a href="/solutions/crm-solutions" class="fw-semibold text-decoration-none mbtn" aria-describedby="growth infrastructure solutions page">Improve Your Workflow &rightarrow;</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<section class="py-5 bg-light text-secondary">
    <div class="container py-lg-5">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <span class="text-uppercase fw-semibold text-primary small">Systems-First Approach</span>
                <h2 class="display-5 fw-bold mt-3 mb-4">Infrastructure Designed to Scale With Your Business</h2>
                <p class="text-tertiary mb-4">
                    Our approach focuses on building connected systems that support long-term growth. Instead of patching together disconnected tools, we create streamlined infrastructure that improves efficiency, automates repetitive tasks, and gives your business a stronger operational foundation.
                </p>
                <p class="text-tertiary mb-4">
                    The result is a scalable ecosystem built to support lead generation, customer engagement, team collaboration, and sustainable growth.
                </p>
                <a href="/contact" class="mbtn btn btn-primary btn-lg px-4" aria-describedby="growth infrastructure solutions page">  Build Your Growth Infrastructure</a>
            </div>
            <div class="col-lg-6">
                <div class="bg-white border rounded-4 shadow-sm p-4 p-lg-5">
                    <div class="d-flex mb-4">
                        <div class="me-3 mt-2">
                            <div class="bg-primary rounded-circle" style="width: 14px; height: 14px;"></div>
                        </div>
                        <div>
                            <h4 class="fw-bold mb-2">Connected Systems</h4>
                            <p class="text-tertiary mb-0">
                                Websites, funnels, CRM platforms, and automation working together seamlessly.
                            </p>
                        </div>
                    </div>
                    <div class="d-flex mb-4">
                        <div class="me-3 mt-2">
                            <div class="bg-primary rounded-circle" style="width: 14px; height: 14px;"></div>
                        </div>
                        <div>
                            <h4 class="fw-bold mb-2">Operational Efficiency</h4>
                            <p class="text-tertiary mb-0">
                                Streamline workflows, eliminate bottlenecks, and automate repetitive tasks.
                            </p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="me-3 mt-2">
                            <div class="bg-primary rounded-circle" style="width: 14px; height: 14px;"></div>
                        </div>
                        <div>
                            <h4 class="fw-bold mb-2">Scalable Growth</h4>
                            <p class="text-tertiary mb-0">
                                Build infrastructure that supports long-term expansion without operational chaos.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-primary text-white">
    <div class="container py-lg-5">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8">
                <span class="text-uppercase fw-semibold small">Ready to Scale?</span>
                <h2 class="display-4 fw-bold mt-3 mb-4">Build Smarter Systems That Drive Real Growth</h2>
                <p class="lead text-light mb-5">
                    Whether you need a new website, funnel optimization, CRM automation, or a complete operational overhaul, we help businesses create the infrastructure needed to grow with confidence.
                </p>
                <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center">
                    <a href="/contact" class="mbtn btn btn-light btn-lg px-4" aria-describedby="growth infrastructure solutions page">Get Started Today</a>
                    <a href="/contact" class="mbtn btn btn-outline-light btn-lg px-4" aria-describedby="growth infrastructure solutions page">Learn About Our Process</a>
                </div>
            </div>
        </div>
    </div>
</section>



{* {$data.serviceDetail->content} *}

{include file="inc/layout/footerContactForm.tpl"}
{include file="inc/layout/footer.tpl"}
