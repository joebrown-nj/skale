{* <!DOCTYPE html>

<html lang="en">

<head>
<meta charset="utf-8" />
<meta content="width=device-width, initial-scale=1" name="viewport" />
<title>Skale | Connected Websites, Automation, Software &amp; Marketing Systems</title>
<meta content="Skale connects websites, marketing, automation, software, analytics, and strategy into practical growth systems built around your business." name="description" />
<meta content="index, follow" name="robots" />
<link href="https://skaleup.it.com/" rel="canonical" />
<!-- Bootstrap 5.3 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" />
<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet" />
<!-- AOS Animation -->
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet" />
<!-- Optional Google Font -->
<link href="https://fonts.googleapis.com" rel="preconnect" />
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&amp;family=Manrope:wght@500;600;700;800&amp;display=swap" rel="stylesheet" />
</head>

<body> *}

{include file="inc/layout/header.tpl"}

<link rel="stylesheet" href="{$smarty.ENV.WEB_ROOT}css/home.min.css" data-ajax-managed-stylesheet="true">
{* <link rel="stylesheet" href="{$smarty.ENV.WEB_ROOT}css/blog.min.css" data-ajax-managed-stylesheet="true"> *}
{* <link rel="stylesheet" href="{$smarty.ENV.WEB_ROOT}css/service-list.min.css" data-ajax-managed-stylesheet="true"> *}

<!-- Navigation -->
{* <nav aria-label="Main navigation" class="navbar navbar-expand-lg navbar-light bg-white fixed-top" id="mainNav">
<div class="container">
<a aria-label="Skale home" class="navbar-brand" href="/">skale<span class="brand-dot">.</span></a>
<button aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler border-0 shadow-none" data-bs-target="#navbarContent" data-bs-toggle="collapse" type="button">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarContent">
<ul class="navbar-nav ms-auto align-items-lg-center">
<li class="nav-item dropdown">
<a aria-expanded="false" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="{$smarty.ENV.URL_SERVICES_SOLUTIONS}" role="button">Solutions</a>
<ul class="dropdown-menu">
<li><a class="dropdown-item" href="{$smarty.ENV.URL_SERVICES_SOLUTIONS}/growth-infrastructure"><i class="bi bi-window me-2"></i>Growth Infrastructure</a></li>
<li><a class="dropdown-item" href="{$smarty.ENV.URL_SERVICES_SOLUTIONS}/automation-and-software"><i class="bi bi-diagram-3 me-2"></i>Automation &amp; Software</a></li>
<li><a class="dropdown-item" href="{$smarty.ENV.URL_SERVICES_SOLUTIONS}/demand-generation"><i class="bi bi-graph-up-arrow me-2"></i>Demand Generation</a></li>
<li><a class="dropdown-item" href="{$smarty.ENV.URL_SERVICES_SOLUTIONS}/strategy-and-optimization"><i class="bi bi-compass me-2"></i>Strategy &amp; Optimization</a></li>
<li>
<hr class="dropdown-divider" />
</li>
<li><a class="dropdown-item" href="{$smarty.ENV.URL_SERVICES_SOLUTIONS}"><i class="bi bi-grid me-2"></i>View All Solutions</a></li>
</ul>
</li>
<li class="nav-item"><a class="nav-link" href="/blog">Insights</a></li>
<li class="nav-item"><a class="nav-link" href="/about">About</a></li>
<li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
</ul>
<a class="btn btn-primary ms-lg-3" href="#contact">Free Strategy Session</a>
</div>
</div>
</nav> *}

<main class="home">
    <!-- Hero -->
    <section class="hero">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-7">
                    <div class="hero-kicker" data-aos="fade-up">
                        <span></span>
                        Where engineering meets growth
                    </div>
                    <h1 data-aos="fade-up" data-aos-delay="75">
                        Build a business that works <span class="text-gradient">smarter as it grows.</span>
                    </h1>
                    <p class="hero-copy mt-4" data-aos="fade-up" data-aos-delay="150">
                        Skale connects your website, marketing, software, automation, data, and strategy into practical systems that generate opportunities, reduce friction, and support long-term growth.
                    </p>
                    <div class="hero-actions d-flex flex-column flex-sm-row gap-3 mt-4" data-aos="fade-up" data-aos-delay="225">
                        <a aria-describedby="home hero contact button" class="text-white mbtn btn btn-outline-light btn-lg" href="{$smarty.ENV.SITE_URL}{$smarty.ENV.URL_CONTACT}">Explore Solutions</a>
                        <a class="btn btn-link text-white text-decoration-none px-2" onclick="scrollToEl('#problems')">See What We Solve <i class="bi bi-arrow-down ms-1"></i></a>
                    </div>
                    <div class="hero-proof" data-aos="fade-up" data-aos-delay="300">
                        <span><i class="bi bi-check-circle-fill"></i>20+ years of experience</span>
                        <span><i class="bi bi-check-circle-fill"></i>Founder-led engagements</span>
                        <span><i class="bi bi-check-circle-fill"></i>Built around your business</span>
                    </div>
                </div>
                <div class="col-lg-5" data-aos="fade-left" data-aos-delay="175">
                    <div class="hero-form-card">
                        <div class="hero-form-header">
                            <span class="hero-form-eyebrow">Free strategy session</span>
                            <h2 class="fs-4 h3 mb-2">What would you like to improve?</h2>
                            <p class="mb-0">Share a few details and get a practical recommendation for your next step.</p>
                        </div>

                        {* <form action="/contact/submit" class="hero-lead-form mt-4" method="post"> *}
                        <form action="{$smarty.ENV.SITE_URL}contact-form" method="POST" class="ajaxForm">
                            <input type="hidden" name="comment" value="home hero">
                            <input type="hidden" name="form_type" value="home-hero">

                            <div class="mb-3">
                                <label class="form-label" for="heroName">Name *</label>
                                <input autocomplete="name" class="form-control" id="heroName" name="name" required="" type="text" />
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="email">Email *</label>
                                <input autocomplete="email" class="form-control" id="email" name="email" required="" type="email" />
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="phone">Phone</label>
                                <input autocomplete="tel" class="form-control" id="phone" name="phone" type="tel" />
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="heroInterest">Biggest challenge *</label>
                                <select class="form-select" id="heroInterest" name="interest" required="">
                                    <option disabled="" selected="" value="">Select one</option>
                                    <option value="website-leads">Generate more leads</option>
                                    <option value="new-website">Build a new website</option>
                                    <option value="improve-website">Improve my current website</option>
                                    <option value="automation">Automate manual work</option>
                                    <option value="integrations">Connect systems and data</option>
                                    <option value="marketing">Improve marketing, SEO, or PPC</option>
                                    <option value="unsure">I am not sure yet</option>
                                </select>
                            </div>

                            <div aria-hidden="true" class="d-none">
                                <label for="heroWebsite">Website</label>
                                <input autocomplete="off" id="heroWebsite" name="website" tabindex="-1" type="text" />
                            </div>

                            <button class="btn btn-primary btn-lg w-100" type="submit">Get My Recommendation <i class="bi bi-arrow-right ms-1"></i></button>
                            <p class="hero-form-note mb-0 mt-3"><i class="bi bi-lock me-1"></i>No spam. No aggressive sales follow-up.</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Trust Stats -->
    <section aria-label="Skale trust indicators" class="trust-bar">
        <div class="container">
            <div class="trust-card">
                <div class="row text-center">
                    <div class="col-6 col-lg-3 trust-stat">
                        <strong>20+</strong>
                        <span>Years of experience</span>
                    </div>
                    <div class="col-6 col-lg-3 trust-stat">
                        <strong>4</strong>
                        <span>Connected solution pillars</span>
                    </div>
                    <div class="col-6 col-lg-3 trust-stat">
                        <strong>1</strong>
                        <span>Partner across the journey</span>
                    </div>
                    <div class="col-6 col-lg-3 trust-stat">
                        <strong>Custom</strong>
                        <span>Every engagement</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Problems -->
    <section class="section-padding" id="problems">
        <div class="container">
            <div class="row align-items-end g-4 mb-5">
                <div class="col-lg-8" data-aos="fade-up">
                    <span class="section-label">The problems we solve</span>
                    <h2>Your business may not need another tool. It may need a better system.</h2>
                </div>
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <p class="mb-0">Growth gets harder when websites, marketing, tools, and teams do not work together. Start with the problem you recognize.</p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-xl-3" data-aos="fade-up">
                    <article class="problem-card">
                        <span class="problem-number">01 / CONVERSION</span>
                        <h3>Traffic, but not enough leads</h3>
                        <p>People visit your website but leave without understanding why they should choose you or what to do next.</p>
                        <a aria-describedby="home service link" class="stretched-link mbtn problem-link" href="{$smarty.ENV.URL_SERVICES_SOLUTIONS}/growth-infrastructure">Improve conversions <i class="bi bi-arrow-right"></i></a>
                    </article>
                </div>

                <div class="col-md-6 col-xl-3" data-aos="fade-up" data-aos-delay="100">
                    <article class="problem-card">
                        <span class="problem-number">02 / EFFICIENCY</span>
                        <h3>Too much repetitive work</h3>
                        <p>Your team spends valuable time copying data, updating spreadsheets, and repeating avoidable manual tasks.</p>
                        <a aria-describedby="home service link" class="stretched-link mbtn problem-link" href="{$smarty.ENV.URL_SERVICES_SOLUTIONS}/automation-and-software">Automate operations <i class="bi bi-arrow-right"></i></a>
                    </article>
                </div>

                <div class="col-md-6 col-xl-3" data-aos="fade-up" data-aos-delay="200">
                    <article class="problem-card">
                        <span class="problem-number">03 / VISIBILITY</span>
                        <h3>Systems that do not connect</h3>
                        <p>Information is scattered across tools, creating delays, mistakes, duplicated work, and unclear reporting.</p>
                        <a aria-describedby="home service link" class="stretched-link mbtn problem-link" href="{$smarty.ENV.URL_SERVICES_SOLUTIONS}/system-integrations">Connect your systems <i class="bi bi-arrow-right"></i></a>
                    </article>
                </div>

                <div class="col-md-6 col-xl-3" data-aos="fade-up" data-aos-delay="300">
                    <article class="problem-card">
                        <span class="problem-number">04 / SCALE</span>
                        <h3>Growth is creating friction</h3>
                        <p>Processes that once worked are becoming harder to manage as customers, demand, and complexity increase.</p>
                        <a aria-describedby="home service link" class="stretched-link mbtn problem-link" href="{$smarty.ENV.URL_SERVICES_SOLUTIONS}/strategy-and-optimization">Build a scalable plan <i class="bi bi-arrow-right"></i></a>
                    </article>
                </div>
            </div>

            <div class="text-center mt-5" data-aos="fade-up">
                <p class="mb-3">Recognize your business in one of these?</p>
                <a aria-describedby="home talk through your challenge button" class="mbtn btn btn-outline-primary" href="{$smarty.ENV.SITE_URL}{$smarty.ENV.URL_CONTACT}">Talk Through Your Challenge</a>
            </div>
        </div>
    </section>

    <section class="section-padding-sm pt-0">
        <div class="container">
            <div class="inline-cta" data-aos="fade-up">
                <div>
                    <span class="inline-cta-label">Recognize these problems?</span>
                    <h2 class="h3 mb-2">Let's identify what is slowing your growth.</h2>
                    <p class="mb-0">You do not need to know the solution before reaching out.</p>
                </div>
                <a aria-describedby="home free strategy session button" class="mbtn btn btn-primary btn-lg flex-shrink-0" href="{$smarty.ENV.SITE_URL}{$smarty.ENV.URL_CONTACT}">Free Strategy Session</a>
            </div>
        </div>
    </section>

    <!-- Problems to Outcomes -->
    <section class="section-padding outcome-section">
        <div class="container">
            <div class="text-center mx-auto mb-5" data-aos="fade-up" style="max-width: 760px;">
                <span class="section-label justify-content-center">From friction to progress</span>
                <h2>Focus on the outcome, not a list of deliverables.</h2>
                <p class="section-intro mx-auto">Every engagement starts by understanding what is slowing the business down and what measurable improvement should look like.</p>
            </div>
            <div class="row g-4 align-items-stretch">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="home-outcome-card">
                        <span class="badge text-bg-light border mb-3">What may be happening now</span>
                        <h3>Disconnected activity creates hidden costs.</h3>
                        <ul class="home-outcome-list">
                            <li><i class="bi bi-x-circle"></i><span>Your website does not clearly communicate value or generate qualified inquiries.</span></li>
                            <li><i class="bi bi-x-circle"></i><span>Employees spend hours completing repetitive tasks that could be automated.</span></li>
                            <li><i class="bi bi-x-circle"></i><span>Marketing channels operate separately from sales, follow-up, and reporting.</span></li>
                            <li><i class="bi bi-x-circle"></i><span>Decisions are based on incomplete data or reports that arrive too late.</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="home-outcome-card dark">
                        <span class="badge bg-white text-dark mb-3">What better can look like</span>
                        <h3 class="text-white">Connected systems create momentum.</h3>
                        <ul class="home-outcome-list">
                            <li><i class="bi bi-check-circle-fill"></i><span>A clear customer journey that turns attention into qualified opportunities.</span></li>
                            <li><i class="bi bi-check-circle-fill"></i><span>Automated workflows that save time and reduce avoidable mistakes.</span></li>
                            <li><i class="bi bi-check-circle-fill"></i><span>Tools and data that move reliably between teams and platforms.</span></li>
                            <li><i class="bi bi-check-circle-fill"></i><span>Reporting that shows what is working and what should improve next.</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services -->
    <section class="section-padding" id="services">
        <div class="container">
            <div class="row align-items-end g-4 mb-5">
                <div class="col-lg-8" data-aos="fade-up">
                    <span class="section-label">Connected solutions</span>
                    <h2>Everything your business needs to grow working together.</h2>
                </div>
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <p class="mb-0">Each solution can stand alone or connect with the others to create a more complete growth system.</p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-6" data-aos="fade-up">
                    <article class="service-card">
                        <div class="icon-box"><i class="bi bi-window"></i></div>
                        <span class="small text-uppercase fw-bold text-secondary mt-4">Growth Infrastructure</span>
                        <h3>Turn your website into your best salesperson.</h3>
                        <p>Create a faster, clearer, more credible online experience that earns trust, guides visitors, captures leads, and supports follow-up.</p>
                        <ul class="service-list">
                            <li>Website design and development</li>
                            <li>Landing pages and conversion optimization</li>
                            <li>CRM, lead tracking, and customer journeys</li>
                            <li>Analytics and performance improvements</li>
                        </ul>
                        <a aria-describedby="home growth infrastructure" class="stretched-link mbtn btn-link-arrow mt-auto" href="{$smarty.ENV.URL_SERVICES_SOLUTIONS}/growth-infrastructure">Explore Growth Infrastructure <i class="bi bi-arrow-right"></i></a>
                    </article>
                </div>

                <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <article class="service-card">
                        <div class="icon-box"><i class="bi bi-gear-wide-connected"></i></div>
                        <span class="small text-uppercase fw-bold text-secondary mt-4">Automation &amp; Software</span>
                        <h3>Stop paying people to do robot work.</h3>
                        <p>Streamline repetitive processes, connect your tools, and build practical software that helps your team focus on higher-value work.</p>
                        <ul class="service-list">
                            <li>Workflow and process automation</li>
                            <li>System integrations and data synchronization</li>
                            <li>Custom software, portals, and internal tools</li>
                            <li>AI-assisted reporting and insights</li>
                        </ul>
                        <a aria-describedby="home automation and software" class="stretched-link mbtn btn-link-arrow mt-auto" href="{$smarty.ENV.URL_SERVICES_SOLUTIONS}/automation-and-software">Explore Automation &amp; Software <i class="bi bi-arrow-right"></i></a>
                    </article>
                </div>

                <div class="col-md-6" data-aos="fade-up">
                    <article class="service-card">
                        <div class="icon-box"><i class="bi bi-bullseye"></i></div>
                        <span class="small text-uppercase fw-bold text-secondary mt-4">Demand Generation</span>
                        <h3>Build a more predictable pipeline of customers.</h3>
                        <p>Connect visibility, messaging, conversion, lead nurturing, and reporting so your marketing investment creates measurable opportunities.</p>
                        <ul class="service-list">
                            <li>SEO strategy and content improvement</li>
                            <li>Google and Meta paid advertising</li>
                            <li>Email marketing and lead nurturing</li>
                            <li>Campaign analytics and optimization</li>
                        </ul>
                        <a aria-describedby="home demand generation" class="stretched-link mbtn btn-link-arrow mt-auto" href="{$smarty.ENV.URL_SERVICES_SOLUTIONS}/demand-generation">Explore Demand Generation <i class="bi bi-arrow-right"></i></a>
                    </article>
                </div>

                <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <article class="service-card">
                        <div class="icon-box"><i class="bi bi-compass"></i></div>
                        <span class="small text-uppercase fw-bold text-secondary mt-4">Strategy &amp; Optimization</span>
                        <h3>Know exactly what to improve next.</h3>
                        <p>Find bottlenecks, prioritize investments, and create a practical roadmap based on business impact rather than trends or unnecessary technology.</p>
                        <ul class="service-list">
                            <li>Growth audits and system mapping</li>
                            <li>Technology and marketing roadmaps</li>
                            <li>Analytics, KPIs, and reporting</li>
                            <li>Ongoing optimization and guidance</li>
                        </ul>
                        <a aria-describedby="home strategy optimization" class="stretched-link mbtn btn-link-arrow mt-auto" href="{$smarty.ENV.URL_SERVICES_SOLUTIONS}/strategy-and-optimization">Explore Strategy &amp; Optimization <i class="bi bi-arrow-right"></i></a>
                    </article>
                </div>
            </div>

            <div class="text-center mt-5" data-aos="fade-up">
                <a aria-describedby="home view all solutions" class="mbtn btn btn-outline-primary btn-lg" href="{$smarty.ENV.URL_SERVICES_SOLUTIONS}">View All Solutions</a>
            </div>
        </div>
    </section>

    <section class="section-padding-sm pt-0">
        <div class="container">
            <div class="inline-cta inline-cta-light" data-aos="fade-up">
                <div>
                    <span class="inline-cta-label">Not sure where to start?</span>
                    <h2 class="h3 mb-2">Tell us the outcome you need.</h2>
                    <p class="mb-0">We will help you determine whether the right next step is your website, automation, marketing, or the systems connecting them.</p>
                </div>
                <a class="btn btn-outline-primary btn-lg flex-shrink-0" href="{$smarty.ENV.SITE_URL}{$smarty.ENV.URL_CONTACT}">Talk Through Your Goal</a>
            </div>
        </div>
    </section>

    <!-- Connected Journey -->
    <section class="section-padding systems-section">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-lg-8" data-aos="fade-up">
                    <span class="section-label text-white">The Skale systems approach</span>
                    <h2 class="text-white">The best results happen when every step supports the next.</h2>
                </div>

                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <p class="mb-0">Most vendors improve one part. Skale considers the complete journey from attention and conversion to delivery, follow-up, and insight.</p>
                </div>
            </div>

            <div class="journey-row">
                <div class="journey-step" data-aos="zoom-in">
                    <div class="journey-icon"><i class="bi bi-megaphone"></i></div>
                    <strong>Marketing</strong>
                </div>

                <div class="journey-step" data-aos="zoom-in" data-aos-delay="75">
                    <div class="journey-icon"><i class="bi bi-window"></i></div>
                    <strong>Website</strong>
                </div>

                <div class="journey-step" data-aos="zoom-in" data-aos-delay="150">
                    <div class="journey-icon"><i class="bi bi-person-check"></i></div>
                    <strong>CRM</strong>
                </div>

                <div class="journey-step" data-aos="zoom-in" data-aos-delay="225">
                    <div class="journey-icon"><i class="bi bi-gear"></i></div>
                    <strong>Automation</strong>
                </div>

                <div class="journey-step" data-aos="zoom-in" data-aos-delay="300">
                    <div class="journey-icon"><i class="bi bi-bar-chart"></i></div>
                    <strong>Reporting</strong>
                </div>

                <div class="journey-step" data-aos="zoom-in" data-aos-delay="375">
                    <div class="journey-icon"><i class="bi bi-graph-up-arrow"></i></div>
                    <strong>Growth</strong>
                </div>
            </div>
        </div>
    </section>

    <!-- Process -->
    <section class="section-padding">
        <div class="container">
            <div class="text-center mx-auto mb-5" data-aos="fade-up" style="max-width: 760px;">
                <span class="section-label justify-content-center">How we work</span>
                <h2>A clear path from business challenge to measurable improvement.</h2>
                <p class="section-intro mx-auto">No unnecessary complexity. No generic package forced onto a problem it does not fit.</p>
            </div>

            <div class="row g-4">
                <div class="col-md-4" data-aos="fade-up">
                    <article class="process-card">
                        <span class="process-count">1</span>
                        <h3 class="h4 mt-4">Find the friction</h3>
                        <p class="mb-0">We examine your customer journey, workflows, technology, and data to uncover the real bottlenecks and missed opportunities.</p>
                    </article>
                </div>

                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <article class="process-card">
                        <span class="process-count">2</span>
                        <h3 class="h4 mt-4">Prioritize the impact</h3>
                        <p class="mb-0">We focus first on the changes most likely to improve revenue, efficiency, visibility, or customer experience.</p>
                    </article>
                </div>

                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <article class="process-card">
                        <span class="process-count">3</span>
                        <h3 class="h4 mt-4">Build for what comes next</h3>
                        <p class="mb-0">We implement practical systems that solve today's problem without creating new obstacles as your business grows.</p>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <!-- Trust / Founder -->
    <section class="section-padding trust-section">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-5" data-aos="fade-right">
                    <div class="founder-panel d-flex flex-column justify-content-end">
                        <span class="badge bg-light text-dark align-self-start mb-3">Founder-led consulting</span>
                        <h3 class="h2">Experience you can speak with directly.</h3>
                        {* <p class="mb-0">Replace the background image with a professional photo, working session, or client collaboration image.</p> *}
                    </div>
                </div>

                <div class="col-lg-7" data-aos="fade-left">
                    <span class="section-label">Why businesses trust Skale</span>
                    <h2>A technical partner who understands the whole business.</h2>
                    <p class="section-intro">You should not have to coordinate separate vendors for your website, marketing, software, automation, and analytics. Skale brings technical depth and business context together.</p>

                    <div class="mt-4">
                        <div class="trust-point">
                            <i class="bi bi-patch-check-fill"></i>
                            <div>
                                <h3 class="h5 mb-1">20+ years of real-world experience</h3>
                                <p class="mb-0">Senior engineering, product, consulting, and growth experience applied directly to your project.</p>
                            </div>
                        </div>

                        <div class="trust-point">
                            <i class="bi bi-person-workspace"></i>
                            <div>
                                <h3 class="h5 mb-1">Direct access and accountability</h3>
                                <p class="mb-0">Founder-led engagements mean thoughtful recommendations, clear communication, and ownership from start to finish.</p>
                            </div>
                        </div>

                        <div class="trust-point">
                            <i class="bi bi-sliders"></i>
                            <div>
                                <h3 class="h5 mb-1">Recommendations built around your business</h3>
                                <p class="mb-0">No rigid package, preferred platform, or generic playbook is forced onto a problem it does not fit.</p>
                            </div>
                        </div>

                        <div class="trust-point">
                            <i class="bi bi-infinity"></i>
                            <div>
                                <h3 class="h5 mb-1">Long-term thinking</h3>
                                <p class="mb-0">Every solution is designed to reduce future friction rather than create another short-lived fix.</p>
                            </div>
                        </div>
                    </div>

                    <a aria-describedby="home Learn more about Skale link" class="mbtn btn-link-arrow mt-4" href="/about">Learn more about Skale <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>

    <section class="section-padding-sm pt-0 trust-section">
        <div class="container">
            <div class="inline-cta inline-cta-dark" data-aos="zoom-in">
                <div>
                    <span class="inline-cta-label text-success">Ready for a clearer next step?</span>
                    <h2 class="fs-3 h3 mb-2">Get recommendations based on your business not a generic package.</h2>
                    <p class="mb-0">Start with a short conversation about what is not working and what you want to improve.</p>
                </div>

                <a aria-describedby="home Request a Consultation button" class="mbtn btn btn-light btn-lg flex-shrink-0 text-dark" href="{$smarty.ENV.SITE_URL}{$smarty.ENV.URL_CONTACT}">Request a Consultation</a>
            </div>
        </div>
    </section>

    <!-- Comparison -->
    <section class="section-padding">
        <div class="container">
            <div class="row align-items-end g-4 mb-5">
                <div class="col-lg-8" data-aos="fade-up">
                    <span class="section-label">Built differently</span>
                    <h2>The difference is not only what gets delivered. It is how every decision supports your business.</h2>
                </div>
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <p class="mb-0">Skale starts with the business outcome, then chooses the strategy and technology that best support it.</p>
                </div>
            </div>

            <div class="comparison-wrap table-responsive" data-aos="fade-up">
                <table class="table comparison-table">
                    <thead>
                        <tr>
                            <th scope="col">Area</th>
                            <th scope="col">Typical Agency</th>
                            <th scope="col">The Skale Approach</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">Starting point</th>
                            <td>Requested deliverable</td>
                            <td><i class="bi bi-check-circle-fill text-success me-2"></i>Business outcome</td>
                        </tr>
                        <tr>
                            <th scope="row">Recommendations</th>
                            <td>Limited to one service</td>
                            <td><i class="bi bi-check-circle-fill text-success me-2"></i>Across systems and teams</td>
                        </tr>
                        <tr>
                            <th scope="row">Technology</th>
                            <td>Platform-first</td>
                            <td><i class="bi bi-check-circle-fill text-success me-2"></i>Fit-for-purpose</td>
                        </tr>
                        <tr>
                            <th scope="row">Communication</th>
                            <td>Passed between departments</td>
                            <td><i class="bi bi-check-circle-fill text-success me-2"></i>Direct, founder-led access</td>
                        </tr>
                        <tr>
                            <th scope="row">Definition of success</th>
                            <td>Launch completed</td>
                            <td><i class="bi bi-check-circle-fill text-success me-2"></i>Measurable improvement</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- Mid-page CTA -->
    <section class="section-padding-sm">
        <div class="container">
            <div class="cta-band p-4 p-md-5" data-aos="zoom-in">
                <div class="row align-items-center g-4">
                    <div class="col-lg-8">
                        <span class="text-uppercase small fw-bold text-success">A better next step</span>
                        <h2 class="h1 mt-2 mb-3 fs-2">Not sure which service you need?</h2>
                        <p class="mb-0 fs-5">You do not need to diagnose the solution before reaching out. Tell us what is not working, and we will help identify the highest-impact path forward.</p>
                    </div>

                    <div class="col-lg-4 text-lg-end">
                        <a aria-describedby="home Talk Through Your Challenge button" class="text-dark mbtn btn btn-light btn-lg" href="{$smarty.ENV.SITE_URL}{$smarty.ENV.URL_CONTACT}">Talk Through Your <br>Challenge <i class="bi bi-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog -->
    <section class="section-padding">
        <div class="container">
            <div class="row align-items-end g-4 mb-5">
                <div class="col-lg-8" data-aos="fade-up">
                    <span class="section-label">Insights for smarter growth</span>
                    <h2>Practical ideas you can use before you ever hire us.</h2>
                </div>

                <div class="col-lg-4 text-lg-end" data-aos="fade-up" data-aos-delay="100">
                    <a class="btn btn-outline-primary" href="{$smarty.ENV.SITE_URL}blog">View All Insights</a>
                </div>
            </div>

            <div class="row g-4">
                {include file="inc/blog/blogListContainer.tpl" blogCategories=$data.blogCategories blogList=$data.blogList blogContent=$data.blogContent limit=6}
            </div>
        </div>
    </section>

    <!-- Contact / Lead Form -->
    <section class="section-padding contact-section" id="contact">
        <div class="container">
            <div class="row g-4 g-lg-5 align-items-stretch">
                <div class="col-lg-5" data-aos="fade-right">
                    <div class="contact-info">
                        <span class="badge bg-light text-dark mb-4">Free consultation</span>
                        <h2 class="fs-2 text-white">Ready to remove what is getting in the way?</h2>
                        <p class="fs-5">Tell us what you are trying to improve. We will help you identify practical opportunities across your website, marketing, processes, and technology.</p>

                        <div class="mt-4">
                            <div class="contact-benefit">
                                <i class="bi bi-check-circle-fill"></i>
                                <span>No-pressure discovery conversation</span>
                            </div>

                            <div class="contact-benefit">
                                <i class="bi bi-check-circle-fill"></i>
                                <span>Clear, practical next-step recommendations</span>
                            </div>

                            <div class="contact-benefit">
                                <i class="bi bi-check-circle-fill"></i>
                                <span>Direct conversation with an experienced technical partner</span>
                            </div>

                            <div class="contact-benefit">
                                <i class="bi bi-check-circle-fill"></i>
                                <span>No aggressive sales follow-up</span>
                            </div>
                        </div>

                        <hr class="border-secondary my-4" />
                        <p class="small text-uppercase fw-bold mb-2">Prefer to contact us directly?</p>
                        {include file="inc/buttons/phoneLink.tpl" type="link"}
                        {* <a class="d-block text-white text-decoration-none fs-5 mb-2" href="tel:+17329254044"><i class="bi bi-telephone me-2 text-success"></i>732-925-4044</a> *}
                        {include file="inc/buttons/emailLink.tpl" type="link"}
                        {* <a class="d-block text-white text-decoration-none fs-5" href="mailto:info@skaleup.it.com"><i class="bi bi-envelope me-2 text-success"></i>info@skaleup.it.com</a> *}
                    </div>
                </div>

                <div class="col-lg-7" data-aos="fade-left">
                    <!-- Replace action, field names, and hidden values with your production form handler -->
                    {* <form action="/contact/submit" class="contact-form" method="post"> *}
                    <form action="{$smarty.ENV.SITE_URL}contact-form" method="POST" class="ajaxForm">
                        <input type="hidden" name="comment" value="home footer form">
                        <input type="hidden" name="form_type" value="home-footer">

                        <div class="mb-4">
                            <span class="section-label">Start the conversation</span>
                            <h2 class="fs-4 h3 mb-2">What would you like to improve?</h2>
                            <p class="mb-0">Share a few details. We will respond personally and help clarify the right next step.</p>
                        </div>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label" for="name">Name *</label>
                                <input autocomplete="name" class="form-control" id="name" name="name" required="" type="text" />
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="email">Email *</label>
                                <input autocomplete="email" class="form-control" id="email" name="email" required="" type="email" />
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="company">Company</label>
                                <input autocomplete="organization" class="form-control" id="company" name="company" type="text" />
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="phone">Phone <span class="text-secondary fw-normal">(optional)</span></label>
                                <input autocomplete="tel" class="form-control" id="phone" name="phone" type="tel" />
                            </div>

                            <div class="col-12">
                                <label class="form-label" for="interest">What would you like to improve? *</label>
                                <select class="form-select" id="interest" name="interest" required="">
                                    <option disabled="" selected="" value="">Select the closest option</option>
                                    <option value="website-leads">Generate more leads from my website</option>
                                    <option value="automation">Automate repetitive work</option>
                                    <option value="integrations">Connect systems and data</option>
                                    <option value="marketing">Improve marketing performance</option>
                                    <option value="strategy">Create a growth or technology roadmap</option>
                                    <option value="unsure">I am not sure yet</option>
                                </select>
                            </div>

                            <div class="col-12">
                                <label class="form-label" for="comment">What is happening now? *</label>
                                <textarea class="form-control" id="comment" name="comment" placeholder="Briefly describe the problem, project, or goal..." required=""></textarea>
                            </div>

                            <!-- Simple honeypot. Hide this with CSS and validate server-side. -->
                            <div aria-hidden="true" class="d-none">
                                <label for="website">Website</label>
                                <input autocomplete="off" id="website" name="website" tabindex="-1" type="text" />
                            </div>

                            <div class="col-12">
                                <button class="btn btn-primary btn-lg w-100" type="submit">Request My Free Consultation <i class="bi bi-arrow-right ms-1"></i></button>
                            </div>

                            <div class="col-12">
                                <p class="small text-center mb-0"><i class="bi bi-lock me-1"></i>Your information stays private. No spam or aggressive sales follow-up.</p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>

{include file="inc/layout/footer.tpl"}







{* {include file="inc/layout/header.tpl"}

<link rel="stylesheet" href="{$smarty.ENV.WEB_ROOT}css/home.min.css" data-ajax-managed-stylesheet="true">
<link rel="stylesheet" href="{$smarty.ENV.WEB_ROOT}css/blog.min.css" data-ajax-managed-stylesheet="true">
<link rel="stylesheet" href="{$smarty.ENV.WEB_ROOT}css/service-list.min.css" data-ajax-managed-stylesheet="true">

<section class="parallax cta-section home-hero py-5 curve-style">
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

<div class="home-callout home-callout-bg parallax container-fluid py-5" data-aos="fade-in-up" style="position:relative; top:-70px;">
<div class="row justify-content-center py-5">
<div class="col-md-8">
<h2 class="pb-4 BricolageGrotesque-ExtraBold lh-base">
Most Businesses Don't Have a <mark>Growth Problem</mark><br>
They Have a <mark>Systems Problem</mark>
</h2>
<p class="lead"><strong>Disconnected tools. Manual workflows. Inconsistent lead flow.</strong> These aren't isolated issues they're symptoms of a broken system.</p>
<p class="mb-4"><strong><span class="brand-color">Skale</span> fixes that.</strong> We design and build integrated systems that align your marketing, technology, and operations so everything works together to drive growth.</p>

<a aria-describedby="home call out contact button" href="{$smarty.ENV.SITE_URL}{$smarty.ENV.URL_CONTACT}" class="mbtn btn btn-outline-warning btn-lg brand-color-bg-button" type="button">
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

<div class="col-md-6 px-5 py-5 text-bg-dark">
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
{include file="inc/blog/blogListContainer.tpl" blogCategories=$data.blogCategories blogList=$data.blogList blogFeatured=$data.blogFeatured blogContent=$data.blogContent limit=6}
</div>
</div>

{include file="inc/layout/footer.tpl"} *}


