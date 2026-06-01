{include file="inc/layout/header.tpl"}

<link rel="stylesheet" href="{$smarty.ENV.WEB_ROOT}css/headerFooterShow.css">

{* <div class="container-fluid py-4">
    <section id="formcontent" class="row justify-content-center">
        <div class="col-md-5 px-4">
            {include file="inc/contact/contactTextBlock.tpl"}
        </div>

        <div data-aos="fade-up" class="col-md-5">
            {include file="inc/contact/contactForm.tpl"}
        </div>
    </section>
</div> *}



<style>
    :root {
        --bg: #081120;
        --primary: #2563eb;
        --primary-light: #60a5fa;
        --text: #ffffff;
        --muted: #cbd5e1;
    }

    * {
        box-sizing: border-box;
    }

    body {
        font-family: 'Inter', sans-serif;
        background: var(--bg);
        color: var(--text);
        overflow-x: hidden;
    }

    a {
        text-decoration: none;
    }

    .section-padding {
        padding: 100px 0;
    }

    /* Background Glow */
    .hero {
        position: relative;
        overflow: hidden;
    }

    .hero:before {
        content: '';
        position: absolute;
        width: 600px;
        height: 600px;
        background: radial-gradient(circle, rgba(37, 99, 235, .25), transparent 70%);
        top: -250px;
        left: -200px;
    }

    .hero:after {
        content: '';
        position: absolute;
        width: 500px;
        height: 500px;
        background: radial-gradient(circle, rgba(96, 165, 250, .15), transparent 70%);
        bottom: -250px;
        right: -150px;
    }

    .hero-content {
        position: relative;
        z-index: 2;
    }

    .eyebrow {
        color: var(--primary-light);
        text-transform: uppercase;
        letter-spacing: 2px;
        font-size: .9rem;
        font-weight: 700;
        margin-bottom: 20px;
    }

    .hero h1 {
        font-size: clamp(3rem, 6vw, 5rem);
        line-height: 1.05;
        font-weight: 800;
        margin-bottom: 25px;
    }

    .gradient-text {
        background: linear-gradient(90deg, var(--primary-light), var(--primary));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .hero p {
        color: var(--muted);
        font-size: 1.2rem;
        line-height: 1.8;
        margin-bottom: 35px;
        max-width: 650px;
    }

    .form-control,
    .form-select {
        background: rgba(255, 255, 255, .04);
        border: 1px solid rgba(255, 255, 255, .08);
        color: #fff;
        padding: 14px 16px;
        border-radius: 12px;
    }

    .form-control:focus,
    .form-select:focus {
        background: rgba(255, 255, 255, .06);
        border-color: var(--primary);
        color: #fff;
        box-shadow: none;
    }

    .form-control::placeholder {
        color: #94a3b8;
    }

    textarea {
        min-height: 140px;
        resize: none;
    }

    .btn-primary-custom {
        background: linear-gradient(90deg, var(--primary), #3b82f6);
        border: none;
        padding: 15px 22px;
        border-radius: 12px;
        font-weight: 700;
        width: 100%;
        transition: .3s;
    }

    .btn-primary-custom:hover {
        transform: translateY(-2px);
    }

    .small-text {
        color: #94a3b8;
        font-size: .9rem;
    }

    /* Feature Cards */
    .feature-card {
        background: rgba(255, 255, 255, .03);
        border: 1px solid var(--border);
        border-radius: 20px;
        padding: 35px;
        height: 100%;
        transition: .3s;
    }

    .feature-card:hover {
        transform: translateY(-6px);
        border-color: rgba(96, 165, 250, .3);
    }

    .feature-card h4 {
        margin-bottom: 15px;
        font-weight: 700;
    }

    .feature-card p {
        color: var(--muted);
        margin: 0;
        line-height: 1.7;
    }

    /* Stats */
    .stats {
        background: rgba(255, 255, 255, .03);
        border: 1px solid var(--border);
        border-radius: 24px;
        padding: 50px 30px;
    }

    .stat-number {
        font-size: 3rem;
        font-weight: 800;
        margin-bottom: 10px;
    }

    .stat-label {
        color: var(--muted);
    }

    /* Process */
    .process-step {
        position: relative;
        padding-left: 80px;
        margin-bottom: 50px;
    }

    .process-number {
        position: absolute;
        left: 0;
        top: 0;
        width: 55px;
        height: 55px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--primary), var(--primary-light));
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 1.1rem;
    }

    .process-step h4 {
        margin-bottom: 12px;
        font-weight: 700;
    }

    .process-step p {
        color: var(--muted);
        line-height: 1.7;
        margin: 0;
    }

    /* CTA */
    .cta-box {
        background: linear-gradient(135deg, rgba(37, 99, 235, .18), rgba(96, 165, 250, .08));
        border: 1px solid rgba(96, 165, 250, .15);
        border-radius: 28px;
        padding: 70px 50px;
        text-align: center;
    }

    .cta-box h2 {
        font-size: clamp(2.5rem, 5vw, 4rem);
        font-weight: 800;
        margin-bottom: 20px;
    }

    .cta-box p {
        color: var(--muted);
        max-width: 700px;
        margin: 0 auto 35px;
        font-size: 1.15rem;
        line-height: 1.8;
    }

    .btn-outline-custom {
        border: 1px solid rgba(255, 255, 255, .15);
        color: #fff;
        padding: 14px 24px;
        border-radius: 12px;
        font-weight: 600;
    }

    .btn-outline-custom:hover {
        background: rgba(255, 255, 255, .05);
        color: #fff;
    }

    @media(max-width:768px) {
        .section-padding {
            padding: 70px 0;
        }

        .cta-box {
            padding: 50px 25px;
        }

        .process-step {
            padding-left: 70px;
        }
    }
</style>

<!-- HERO -->
<section class="hero section-padding">
    <div class="container hero-content">
        <div class="row align-items-center g-5">
            <!-- Left Content -->
            <div class="col-lg-6">
                <div class="eyebrow">Contact skale.</div>

                <h1>Build Faster.<br><span class="gradient-text">Scale Smarter.</span></h1>

                <p>Websites, software, automation, and marketing systems designed to help your business grow efficiently and generate measurable results.</p>

                <div class="trust-list">
                    <div class="trust-item">
                        &check; Custom-built solutions
                    </div>
                    <div class="trust-item">
                        &check; Fast response times
                    </div>
                    <div class="trust-item">
                        &check; Strategy + execution
                    </div>
                    <div class="trust-item">
                        &check; Long-term support
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="col-lg-6">
                <div class="glass-card">
                    <h3 class="fw-bold mb-3">
                        Start Your Project
                    </h3>

                    <p class="small-text mb-4">
                        Tell us about your goals and we'll reach out within 1 business day.
                    </p>

                    {include file="inc/contact/contactForm.tpl"}
                    {* <form>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="Full Name">
                            </div>
                            <div class="col-md-6">
                                <input type="email" class="form-control" placeholder="Email Address">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="Phone Number">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="Company Name">
                            </div>
                            <div class="col-12">
                                <select class="form-select">
                                    <option selected>What do you need help with?</option>
                                    <option>Website Design & Development</option>
                                    <option>Software Development</option>
                                    <option>Marketing & SEO</option>
                                    <option>Automation & IT Solutions</option>
                                    <option>General Consulting</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <textarea class="form-control" placeholder="Tell us about your project..."></textarea>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary-custom">
                                Schedule My Free Consultation
                                </button>
                            </div>
                        </div>
                    </form> *}

                    <p class="small-text mt-4 mb-0">
                        No pressure. No obligation. Just a conversation about your goals.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- WHY WORK WITH US -->
<section class="section-padding">
    <div class="container">
        <div class="text-center mb-5">
            <div class="eyebrow">
                Why Businesses Choose skale.
            </div>
            <h2 class="fw-bold display-5">
                Built Differently.<br>
                Built to Scale.
            </h2>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="feature-card">
                    <h4>Strategy First</h4>
                    <p>We build systems designed around growth, not templates.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="feature-card">
                    <h4>Built to Scale</h4>
                    <p>Every solution is designed for long-term performance and flexibility.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="feature-card">
                    <h4>Fast Execution</h4>
                    <p>Move quickly without sacrificing quality or strategic thinking.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="feature-card">
                    <h4>Real Partnership</h4>
                    <p>We stay involved beyond launch to optimize and support growth.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- RESULTS -->
<section class="section-padding">
    <div class="container">
        <div class="stats">
            <div class="row text-center g-4">
                <div class="col-md-3">
                    <div class="stat-number gradient-text">
                        100+
                    </div>
                    <div class="stat-label">
                        Projects Delivered
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="stat-number gradient-text">
                        1 Day
                    </div>
                    <div class="stat-label">
                        Average Response Time
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="stat-number gradient-text">
                        Custom
                    </div>
                    <div class="stat-label">
                        Tailored Solutions
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="stat-number gradient-text">
                        Ongoing
                    </div>
                    <div class="stat-label">
                        Long-Term Support
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- PROCESS -->
<section class="section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="text-center mb-5">
                    <div class="eyebrow">
                        What Happens Next?
                    </div>
                    <h2 class="fw-bold display-5">
                        Simple Process.<br>
                        Clear Direction.
                    </h2>
                </div>

                <div class="process-step">
                    <div class="process-number">1</div>
                    <h4>Discovery Call</h4>
                    <p>
                        We learn about your business, systems, goals, and challenges.
                    </p>
                </div>

                <div class="process-step">
                    <div class="process-number">2</div>
                    <h4>Strategy & Recommendations</h4>
                    <p>
                        We identify opportunities and propose the best path forward.
                    </p>
                </div>

                <div class="process-step">
                    <div class="process-number">3</div>
                    <h4>Build & Scale</h4>
                    <p>
                        We execute solutions designed to grow with your business long-term.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FINAL CTA -->
<section class="section-padding pt-0">
    <div class="container">
        <div class="cta-box">
            <h2>
                Ready to Build Something Better?
            </h2>

            <p>
                Let's create systems that help your business scale faster, operate smarter, and generate measurable growth.
            </p>

            <div class="d-flex flex-wrap justify-content-center gap-3">
                <a href="#" class="mbtn btn btn-primary-custom px-4 w-auto" aria-describedby="contact page schedule consultation button">
                    Book a Free Consultation
                </a>

                <a href="/solutions" class="mbtn btn btn-outline-custom" aria-describedby="contact page view solutions button">
                    View Solutions
                </a>
            </div>
        </div>
    </div>
</section>

{include file="inc/layout/footer.tpl"}