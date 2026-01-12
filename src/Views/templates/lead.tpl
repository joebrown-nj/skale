{include file="inc/layout/header.tpl"}

{* <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet"> *}

<style>
    /* body {
        font-family: 'Inter', sans-serif;
        background-color: #0f172a;
        color: #e5e7eb;
    } */
    .hero {
        padding: 5rem 1rem;
        background: radial-gradient(circle at top right, #1e3a8a, #020617);
    }
    /* .btn-primary {
        background-color: #2563eb;
        border: none;
    }
    .btn-primary:hover {
        background-color: #1d4ed8;
    } */
    .card {
        background-color: #020617;
        border: 1px solid #1e293b;
        color: #e5e7eb;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .card:hover {
        transform: translateY(-6px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.4);
    }
    .form-control, .form-select {
        background-color: #020617;
        border: 1px solid #1e293b;
        color: #e5e7eb;
    }
    .form-control::placeholder {
        color: #94a3b8;
    }
    .section-padding {
        padding: 4rem 1rem;
    }
</style>

<!-- Hero Section -->

<section class="hero text-center" data-aos="fade-up">
    <div class="container">
        <h1 class="display-5 fw-bold mb-3">Build, Automate, and Grow — Faster with Skale</h1>
        <p class="lead mb-4">Web, software, IT, and marketing solutions designed to scale your business.</p>
        <a href="#lead-form" class="btn btn-primary btn-lg">Get a Free Strategy Call</a>
        <p class="mt-3 small text-muted">Free 30-minute consult • No obligation</p>
    </div>
</section>

<!-- Lead Form -->

<section id="lead-form" class="section-padding" data-aos="fade-up">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card p-4 shadow-lg">
                    <h3 class="fw-bold mb-3">Start Your Free Strategy Call</h3>
                    <form>
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Name" required>
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" placeholder="Email" required>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Company">
                        </div>
                        <div class="mb-3">
                            <select class="form-select">
                                <option selected>What do you need help with?</option>
                                <option>Website</option>
                                <option>Software / Automation</option>
                                <option>Marketing / SEO</option>
                                <option>Consulting</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Book My Free Call</button>
                        <p class="small text-muted mt-2">We respect your inbox. No spam.</p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Value Props -->

<section class="section-padding bg-dark" data-aos="fade-up">
    <div class="container">
        <h2 class="text-center fw-bold mb-5">Why Businesses Choose Skale</h2>
        <div class="row g-4">
            <div class="col-md-3">
                <div class="card p-4 h-100">
                    <h5 class="fw-semibold">Built to Scale</h5>
                    <p class="small">Solutions that grow with your business, not against it.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card p-4 h-100">
                    <h5 class="fw-semibold">All-in-One Partner</h5>
                    <p class="small">Web, software, IT, and marketing under one roof.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card p-4 h-100">
                    <h5 class="fw-semibold">Results-Driven</h5>
                    <p class="small">Focused on performance, automation, and ROI.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card p-4 h-100">
                    <h5 class="fw-semibold">Hands-On Expertise</h5>
                    <p class="small">Direct access to experienced builders, not sales layers.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- How It Works -->

<section class="section-padding" data-aos="fade-up">
    <div class="container">
        <h2 class="text-center fw-bold mb-5">How It Works</h2>
        <div class="row text-center">
            <div class="col-md-4">
                <h5 class="fw-semibold">1. Book a Call</h5>
                <p class="small">Tell us your goals and challenges.</p>
            </div>
            <div class="col-md-4">
                <h5 class="fw-semibold">2. Get a Plan</h5>
                <p class="small">We map the fastest path to results.</p>
            </div>
            <div class="col-md-4">
                <h5 class="fw-semibold">3. Build & Scale</h5>
                <p class="small">We execute while you focus on growth.</p>
            </div>
        </div>
    </div>
</section>

<!-- Final CTA -->

<section class="hero text-center" data-aos="zoom-in">
    <div class="container">
        <h2 class="fw-bold mb-3">Ready to Scale Smarter?</h2>
        <a href="#lead-form" class="btn btn-primary btn-lg">Schedule Your Free Strategy Call</a>
    </div>
</section>


{* <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

<script>
    AOS.init({
        once: true,
        duration: 900,
        easing: 'ease-out-cubic'
    });
</script> *}

{include file="inc/layout/footer.tpl"}