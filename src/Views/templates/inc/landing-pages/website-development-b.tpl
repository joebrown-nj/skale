<link rel="stylesheet" href="{$smarty.ENV.WEB_ROOT}css/website-development-b.min.css" data-ajax-managed-stylesheet="true">

<main>
    <!-- =============================== HERO ================================ -->
    <section class="hero">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-7" data-aos="fade-up">
                    <div class="hero-copy">
                        <span class="eyebrow">Website Design & Development</span>

                        <h1 class="display-heading mb-4">
                            Your website gets visitors.
                            <span class="text-green">It should get you customers.</span>
                        </h1>

                        <p class="hero-lead mb-0">
                            If people are finding your business but not contacting you, your website may be
                            creating friction instead of opportunity. We build websites that make your value
                            clear, earn trust and give visitors a reason to take the next step.
                        </p>

                        <ul class="hero-checks">
                            <li>
                                <i class="bi bi-check-circle-fill"></i>
                                Clearer messaging
                            </li>
                            <li>
                                <i class="bi bi-check-circle-fill"></i>
                                Better conversion paths
                            </li>
                            <li>
                                <i class="bi bi-check-circle-fill"></i>
                                Faster performance
                            </li>
                            <li>
                                <i class="bi bi-check-circle-fill"></i>
                                Analytics that matter
                            </li>
                        </ul>

                        <div class="d-flex flex-column flex-sm-row align-items-sm-center gap-3">
                            {* <a
                            href="#website-review"
                            class="btn btn-skale"
                            aria-describedby="hero-cta-description"
                            >
                            Get My Free Website Review
                            <i class="bi bi-arrow-right ms-2"></i>
                            </a> *}
                            {include file="inc/landing-pages/inc/modal-button.tpl" class="btn btn-skale" text="Get My Free Website Review <i class='bi bi-arrow-right ms-2'></i>" describedBy="website development landing page" metaEvent="WebsiteDevelopmentB" metaLabel="Hero Button"}

                            <span id="hero-cta-description" class="small text-secondary">
                                No obligation. No sales pressure.
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="conversion-form" data-aos="fade-left" data-aos-delay="100">
                        <div class="mb-4">
                            <span class="small fw-bold text-green text-uppercase">
                                Free Website Conversion Review
                            </span>

                            <h2 class="h3 mt-2 mb-2">Find out what may be costing you leads.</h2>

                            <p class="small mb-0">
                                Tell us where to look. We'll review your website and identify practical
                                opportunities to improve it.
                            </p>
                        </div>

                        <!-- Replace action below with your existing Laravel form endpoint. -->
                        {* <form action="/contact" method="post"> *}
                        <form action="{$smarty.ENV.SITE_URL}contact-form" method="POST" class="ajaxForm" id="lead-form" data-meta-form-name="task-management-migration-form" data-meta-success-event="Lead">
                            <input type="hidden" name="form_type" value="landing-page">
                            <input type="hidden" name="lead_source" value="website-development-ab-version-b" />

                            <div class="mb-3">
                                <label for="name" class="form-label"> Your name </label>
                                <input type="text" class="form-control" id="name" name="name" autocomplete="name" required/>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label"> Work email </label>
                                <input type="email" class="form-control" id="email" name="email" autocomplete="email" required/>
                            </div>

                            <div class="mb-3">
                                <label for="website" class="form-label">
                                    Website
                                    <span class="fw-normal text-secondary"> (optional) </span>
                                </label>

                                <input type="url" class="form-control" id="website" name="website" placeholder="https://"/>
                            </div>

                            <div class="mb-3">
                                <label for="website_goal" class="form-label">
                                    What would you most like to improve?
                                </label>

                                <select class="form-select" id="website_goal" name="website_goal">
                                    <option value="">Select one</option>
                                    <option value="more-leads">Generate more leads</option>
                                    <option value="redesign">Redesign an outdated website</option>
                                    <option value="new-website">Build a new website</option>
                                    <option value="performance">Improve speed / performance</option>
                                    <option value="seo">Improve search visibility</option>
                                    <option value="unsure">Not sure yet</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-skale w-100 mt-2">
                                Review My Website
                                <i class="bi bi-arrow-right ms-2"></i>
                            </button>

                            <div class="form-reassurance">
                                <i class="bi bi-shield-check"></i>
                                Your information stays private.
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- =============================== TRUST / PROOF BAR ================================ -->
    <section class="proof-bar bg-white">
        <div class="container">
            <div class="row text-center">
                <div class="col-4">
                    <div class="proof-item">
                        <span class="proof-number">20+</span>
                        <span class="proof-label"> Years of experience </span>
                    </div>
                </div>

                <div class="col-4 border-start border-end">
                    <div class="proof-item">
                        <span class="proof-number">Founder-led</span>
                        <span class="proof-label"> Senior expertise </span>
                    </div>
                </div>

                <div class="col-4">
                    <div class="proof-item">
                        <span class="proof-number">Business-first</span>
                        <span class="proof-label"> Not template-first </span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- =============================== PROBLEM RECOGNITION ================================ -->
    <section class="section-padding bg-soft">
        <div class="container">
            <div class="row justify-content-center text-center mb-5" data-aos="fade-up">
                <div class="col-lg-8">
                    <span class="eyebrow"> The real problem </span>

                    <h2 class="section-heading mb-3">A website can look good and still be bad for business.</h2>

                    <p class="fs-5 mb-0">
                        Visitors make decisions quickly. If they have to work to understand what you offer, why
                        they should trust you or what to do next, many of them simply leave.
                    </p>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-md-6 col-lg-3" data-aos="fade-up">
                    <div class="problem-card">
                        <div class="problem-icon">
                            <i class="bi bi-chat-left-text"></i>
                        </div>

                        <h3 class="h5">The message isn't clear</h3>

                        <p class="mb-0">
                            Visitors see what you do, but not why it matters to them or why they should choose
                            you.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="75">
                    <div class="problem-card">
                        <div class="problem-icon">
                            <i class="bi bi-hand-index-thumb"></i>
                        </div>

                        <h3 class="h5">The next step feels difficult</h3>

                        <p class="mb-0">
                            Weak calls to action, long forms and confusing navigation make it easy to put
                            contacting you off.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="150">
                    <div class="problem-card">
                        <div class="problem-icon">
                            <i class="bi bi-shield-check"></i>
                        </div>

                        <h3 class="h5">There's not enough trust</h3>

                        <p class="mb-0">
                            Visitors don't yet have enough evidence to feel comfortable starting a conversation.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="225">
                    <div class="problem-card">
                        <div class="problem-icon">
                            <i class="bi bi-graph-up-arrow"></i>
                        </div>

                        <h3 class="h5">You can't see what's broken</h3>

                        <p class="mb-0">
                            Traffic numbers alone don't tell you where visitors lose interest or why leads
                            aren't coming through.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- =============================== FREE REVIEW / OFFER ================================ -->
    <section class="section-padding">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="report-shell">
                        <div class="report-window">
                            <div class="window-bar">
                                <span class="window-dot"></span>
                                <span class="window-dot"></span>
                                <span class="window-dot"></span>
                            </div>

                            <div class="report-content">
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <div>
                                        <small class="text-secondary"> WEBSITE REVIEW </small>

                                        <h3 class="h5 mb-0">Conversion Opportunities</h3>
                                    </div>

                                    <div class="report-score">✓</div>
                                </div>

                                <div class="report-row d-flex align-items-start gap-3">
                                    <i class="bi bi-check-circle-fill text-green"></i>

                                    <div>
                                        <strong> Messaging & positioning </strong>

                                        <div class="small text-secondary">
                                            Can visitors quickly understand your value?
                                        </div>
                                    </div>
                                </div>

                                <div class="report-row d-flex align-items-start gap-3">
                                    <i class="bi bi-check-circle-fill text-green"></i>

                                    <div>
                                        <strong> Conversion path </strong>

                                        <div class="small text-secondary">
                                            Is the next step obvious and easy?
                                        </div>
                                    </div>
                                </div>

                                <div class="report-row d-flex align-items-start gap-3">
                                    <i class="bi bi-check-circle-fill text-green"></i>

                                    <div>
                                        <strong> Trust & credibility </strong>

                                        <div class="small text-secondary">
                                            Does the page remove reasons to hesitate?
                                        </div>
                                    </div>
                                </div>

                                <div class="report-row d-flex align-items-start gap-3">
                                    <i class="bi bi-check-circle-fill text-green"></i>

                                    <div>
                                        <strong> Performance & usability </strong>

                                        <div class="small text-secondary">
                                            Are technical issues creating friction?
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6" data-aos="fade-left">
                    <span class="eyebrow"> Start with answers </span>

                    <h2 class="section-heading mb-4">
                        Before you spend money rebuilding your site, find out what actually needs to change.
                    </h2>

                    <p class="fs-5">
                        A new website shouldn't begin with choosing colors or templates. It should begin by
                        understanding what's preventing your current site from doing its job.
                    </p>

                    <p>
                        Our free website review looks at the experience from a potential customer's perspective
                        and identifies opportunities around messaging, calls to action, trust, mobile usability,
                        performance and conversion tracking.
                    </p>

                    <div class="mt-4">
                        {* <a href="#website-review" class="btn btn-skale">
                        Get My Free Review
                        <i class="bi bi-arrow-right ms-2"></i>
                        </a> *}
                        {include file="inc/landing-pages/inc/modal-button.tpl" class="btn btn-skale" text="Get My Free Website Review <i class='bi bi-arrow-right ms-2'></i>" describedBy="website development landing page" metaEvent="WebsiteDevelopmentB" metaLabel="Midpage CTA Button"}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- =============================== WHAT A BETTER WEBSITE CHANGES ================================ -->
    <section class="section-padding bg-soft">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-5" data-aos="fade-up">
                    <span class="eyebrow"> The goal </span>

                    <h2 class="section-heading">Build a website that makes doing business with you easier.</h2>

                    <p class="fs-5 mt-4">
                        Good website development isn't about adding more pages. It's about removing uncertainty
                        between a visitor arriving and deciding to contact you.
                    </p>
                </div>

                <div class="col-lg-6 offset-lg-1">
                    <div class="change-item" data-aos="fade-up">
                        <span class="change-number"> 01 / UNDERSTAND </span>

                        <h3 class="h4 mt-2">Make your value obvious.</h3>

                        <p class="mb-0">
                            Visitors should understand who you help, what problem you solve and why it matters
                            without having to search for the answer.
                        </p>
                    </div>

                    <div class="change-item" data-aos="fade-up" data-aos-delay="75">
                        <span class="change-number"> 02 / TRUST </span>

                        <h3 class="h4 mt-2">Give people confidence.</h3>

                        <p class="mb-0">
                            Strong positioning, professional execution, relevant proof and clear expectations
                            reduce uncertainty.
                        </p>
                    </div>

                    <div class="change-item" data-aos="fade-up" data-aos-delay="150">
                        <span class="change-number"> 03 / ACT </span>

                        <h3 class="h4 mt-2">Make the next step easy.</h3>

                        <p class="mb-0">
                            Intentional calls to action and lower-friction forms help interested visitors
                            continue the conversation.
                        </p>
                    </div>

                    <div class="change-item" data-aos="fade-up" data-aos-delay="225">
                        <span class="change-number"> 04 / IMPROVE </span>

                        <h3 class="h4 mt-2">Measure what happens next.</h3>

                        <p class="mb-0">
                            Track meaningful visitor actions so future decisions are based on leads and
                            opportunities rather than traffic alone.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- =============================== WHY SKALE ================================ -->
    <section class="section-padding">
        <div class="container">
            <div class="why-box" data-aos="fade-up">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-5">
                        <span class="eyebrow"> Why Skale </span>

                        <h2 class="section-heading text-white">
                            You're not hiring someone just to make pages look better.
                        </h2>

                        <p class="fs-5 mt-4 mb-0">
                            Skale brings website development, software engineering, conversion strategy,
                            analytics and business thinking together so the website supports what happens before
                            and after the click.
                        </p>
                    </div>

                    <div class="col-lg-6 offset-lg-1">
                        <div class="d-flex gap-3 mb-4">
                            <div class="why-icon">
                                <i class="bi bi-person-check"></i>
                            </div>

                            <div>
                                <h3 class="h5 text-white">Senior, founder-led work</h3>

                                <p class="mb-0">
                                    You work with experienced technical leadership rather than being handed from
                                    sales to a junior production team.
                                </p>
                            </div>
                        </div>

                        <div class="d-flex gap-3 mb-4">
                            <div class="why-icon">
                                <i class="bi bi-diagram-3"></i>
                            </div>

                            <div>
                                <h3 class="h5 text-white">More than web design</h3>

                                <p class="mb-0">
                                    Websites can connect with CRM, analytics, marketing, automation and the
                                    other systems your business relies on.
                                </p>
                            </div>
                        </div>

                        <div class="d-flex gap-3">
                            <div class="why-icon">
                                <i class="bi bi-bullseye"></i>
                            </div>

                            <div>
                                <h3 class="h5 text-white">Business outcomes first</h3>

                                <p class="mb-0">
                                    Technology and design decisions start with what the website needs to
                                    accomplish for your business.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- =============================== WHO IT IS FOR ================================ -->
    <section class="section-padding bg-soft">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-lg-8" data-aos="fade-up">
                    <span class="eyebrow"> Is this for you? </span>

                    <h2 class="section-heading">You probably don't need another generic website redesign.</h2>

                    <p class="fs-5">
                        You need one when your current website is getting in the way of where the business is
                        going.
                    </p>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="row g-3">
                        <div class="col-md-6" data-aos="fade-up">
                            <div class="bg-white border rounded-3 p-4 h-100">
                                <div class="d-flex gap-3">
                                    <i class="bi bi-check-circle-fill text-green fs-5"></i>
                                    <span> You're getting traffic but not enough inquiries. </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6" data-aos="fade-up">
                            <div class="bg-white border rounded-3 p-4 h-100">
                                <div class="d-flex gap-3">
                                    <i class="bi bi-check-circle-fill text-green fs-5"></i>
                                    <span>
                                        Your current site no longer reflects the business you've become.
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6" data-aos="fade-up">
                            <div class="bg-white border rounded-3 p-4 h-100">
                                <div class="d-flex gap-3">
                                    <i class="bi bi-check-circle-fill text-green fs-5"></i>
                                    <span>
                                        Your marketing is sending visitors to pages that aren't converting.
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6" data-aos="fade-up">
                            <div class="bg-white border rounded-3 p-4 h-100">
                                <div class="d-flex gap-3">
                                    <i class="bi bi-check-circle-fill text-green fs-5"></i>
                                    <span>
                                        Your website doesn't connect well with sales, CRM or marketing systems.
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6" data-aos="fade-up">
                            <div class="bg-white border rounded-3 p-4 h-100">
                                <div class="d-flex gap-3">
                                    <i class="bi bi-check-circle-fill text-green fs-5"></i>
                                    <span>
                                        Your site is slow, difficult to manage or technically outdated.
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6" data-aos="fade-up">
                            <div class="bg-white border rounded-3 p-4 h-100">
                                <div class="d-flex gap-3">
                                    <i class="bi bi-check-circle-fill text-green fs-5"></i>
                                    <span>
                                        You're starting something new and want the foundation built correctly.
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-5" data-aos="fade-up">
                        {* <a href="#website-review" class="btn btn-skale">
                        See What We Would Improve
                        <i class="bi bi-arrow-right ms-2"></i>
                        </a> *}
                        {include file="inc/landing-pages/inc/modal-button.tpl" class="btn btn-skale" text="See What We Would Improve <i class='bi bi-arrow-right ms-2'></i>" describedBy="website development landing page" metaEvent="WebsiteDevelopmentB" metaLabel="See What We Would Improve"}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- =============================== PROCESS ================================ -->
    <section class="section-padding">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-lg-7" data-aos="fade-up">
                    <span class="eyebrow"> What happens next? </span>

                    <h2 class="section-heading">Start small. Decide what makes sense from there.</h2>
                </div>
            </div>

            <div class="row g-5">
                <div class="col-md-4" data-aos="fade-up">
                    <div class="step-number mb-4">1</div>

                    <h3 class="h4">Tell us where to look.</h3>

                    <p>Send us your website and tell us what you would most like it to do better.</p>
                </div>

                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="step-number mb-4">2</div>

                    <h3 class="h4">We review the experience.</h3>

                    <p>We'll look for messaging, UX, conversion, performance and growth opportunities.</p>
                </div>

                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="step-number mb-4">3</div>

                    <h3 class="h4">You get a practical next step.</h3>

                    <p>
                        If there's a fit, we can talk about improving or rebuilding the site. If not, you still
                        leave with useful direction.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- =============================== FAQ ================================ -->
    <!-- Keep objections focused on conversion. -->
    <section class="section-padding bg-soft">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-4" data-aos="fade-right">
                    <span class="eyebrow"> Common questions </span>

                    <h2 class="section-heading">Before you reach out.</h2>

                    <p>
                        A few quick answers to the questions businesses usually have before starting a website
                        project.
                    </p>
                </div>

                <div class="col-lg-7 offset-lg-1" data-aos="fade-left">
                    <div class="accordion accordion-flush" id="websiteFaq">
                        <div class="accordion-item" data-aos="fade-up">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqOne">
                                    Is the website review really free?
                                </button>
                            </h2>

                            <div id="faqOne" class="accordion-collapse collapse show" data-bs-parent="#websiteFaq">
                                <div class="accordion-body text-secondary">
                                    Yes. The first review is intended to help identify practical opportunities
                                    with your existing website and determine whether Skale can help.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item" data-aos="fade-up">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqTwo">
                                    Do you redesign existing websites?
                                </button>
                            </h2>

                            <div id="faqTwo" class="accordion-collapse collapse" data-bs-parent="#websiteFaq">
                                <div class="accordion-body text-secondary">
                                    Yes. We can improve an existing website or rebuild it when the current
                                    technology, structure or experience is limiting what the business needs to
                                    accomplish.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item" data-aos="fade-up">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqThree">
                                    What if I don't have a website yet?
                                </button>
                            </h2>

                            <div id="faqThree" class="accordion-collapse collapse" data-bs-parent="#websiteFaq">
                                <div class="accordion-body text-secondary">
                                    That's fine. Choose “Build a new website” on the form and we'll discuss what
                                    you're trying to accomplish and the right foundation for it.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item" data-aos="fade-up">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqFour">
                                    How long does a website project take?
                                </button>
                            </h2>

                            <div id="faqFour" class="accordion-collapse collapse" data-bs-parent="#websiteFaq">
                                <div class="accordion-body text-secondary">
                                    Timing depends on the size and complexity of the project. Many website
                                    projects can be completed within several weeks once scope, content and
                                    requirements are clear.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item" data-aos="fade-up">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqFive">
                                    Can you help after the website launches?
                                </button>
                            </h2>

                            <div id="faqFive" class="accordion-collapse collapse" data-bs-parent="#websiteFaq">
                                <div class="accordion-body text-secondary">
                                    Yes. Skale can continue supporting development, conversion improvements,
                                    analytics, SEO, marketing integrations, CRM workflows and other growth
                                    infrastructure as your needs evolve.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- =============================== FINAL CTA ================================ -->
    <section class="section-padding final-cta rounded-0">
        <div class="container position-relative">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8" data-aos="fade-up">
                    <span class="eyebrow"> Don't guess </span>

                    <h2 class="section-heading text-white mb-4">
                        You already paid to get people to your website. Let's make more of those visits count.
                    </h2>

                    <p class="fs-5 mb-4">
                        Start with a free website conversion review and find out where your biggest
                        opportunities may be.
                    </p>

                    {include file="inc/landing-pages/inc/modal-button.tpl" class="btn btn-skale btn-lg" text="Get My Free Website Review <i class='bi bi-arrow-right ms-2'></i>" describedBy="website development landing page" metaEvent="WebsiteDevelopmentB" metaLabel="Mid Page CTA Button"}

                    <div class="small mt-3 text-white-50">No obligation. No sales pressure.</div>
                </div>
            </div>
        </div>
    </section>
</main>

<!-- =============================== STICKY MOBILE CTA ================================ -->
<div class="mobile-cta">
    {include file="inc/landing-pages/inc/modal-button.tpl" class="btn btn-skale w-100" text="Get My Free Website Review" describedBy="website development landing page" metaEvent="WebsiteDevelopmentB" metaLabel="Mobile CTA Button"}
</div>

{include file="inc/landing-pages/inc/modal.tpl" modalTitle="Tell Us About the Website You Need" ctaText="Request My Free Consultation" modalDescription="Share a few details about your business, current website, and goals. We'll help you identify the right scope, approach, and next steps."}
