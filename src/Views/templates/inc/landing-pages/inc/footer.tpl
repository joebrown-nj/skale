<section class="py-5 bg-dark text-white {$class}">
    <div class="container py-5 text-center">
        <h2 class="display-6 fw-bold mb-3" data-aos="fade-up">{$headline}</h2>
        <p class="lead text-white-50 mb-4" data-aos="fade-up" data-aos-delay="100">{$subheadline}</p>
        <button class="mbtn btn btn-info btn-lg rounded-pill px-5 fw-semibold" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-meta-custom-event="LandingLeadCtaClick" data-meta-label="landing footer cta" data-aos="fade-up" data-aos-delay="300 ">
            {$ctaText}
        </button>
    </div>
</section>

<div class="sticky-mobile">
    <button class="mbtn btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#staticBackdrop" aria-describedby="website development lead gen page" data-meta-custom-event="LandingLeadCtaClick" data-meta-label="landing sticky cta">
        {$ctaText}
    </button>
</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">{$modalTitle}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <p class="secondary">We'll review your current setup and identify opportunities to generate more leads and improve efficiency.</p>
                {include file="inc/landing-pages/inc/lead-contact-form.tpl"}
            </div>
        </div>
    </div>
</div>

{* <section class="py-5 bg-dark text-white {$class}">
<div class="container py-5 text-center">
<h2 class="display-6 fw-bold mb-3" data-aos="fade-up">{$headline}</h2>
<p class="lead text-white-50 mb-4" data-aos="fade-up" data-aos-delay="100">{$subheadline}</p>
<button class="mbtn btn btn-info btn-lg rounded-pill px-5 fw-semibold" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-meta-custom-event="LandingLeadCtaClick" data-meta-label="landing footer cta" data-aos="fade-up" data-aos-delay="300 ">
{$ctaText}
</button>
</div>
</section>

<div class="sticky-mobile">
<button class="mbtn btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#staticBackdrop" aria-describedby="website development lead gen page" data-meta-custom-event="LandingLeadCtaClick" data-meta-label="landing sticky cta">
{$ctaText}
</button>
</div> *}
