<!-- FINAL CTA -->
<section class="section-space">
    <div class="container">
        <div class="final-cta text-center">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <span class="badge rounded-pill text-bg-light mb-3">{$data.badge}</span>
                    <h2>{$data.heading}</h2>
                    <p class="lead mt-3 mb-4">{$data.description}</p>

                    <div class="{$data.buttons.wrapperClass}">
                        {foreach from=$data.buttons.items item=button}
                            <a class="{$button.class}" href="{$button.href}">{$button.label}</a>
                        {/foreach}
                    </div>

                    <p class="small mt-3 mb-0">{$data.note}</p>
                </div>
            </div>
        </div>
    </div>
</section>


{* <!-- FINAL CTA -->
<section class="section-space">
<div class="container">
<div class="final-cta text-center">
<div class="row justify-content-center">
<div class="col-lg-9">
<span class="badge rounded-pill text-bg-light mb-3">Start with clarity</span>
<h2>Find out where your business is losing leads, time, or momentum.</h2>
<p class="lead mt-3 mb-4">Schedule a free consultation to talk through your current systems, your growth goals, and the most valuable place to begin.</p>
<div class="d-flex flex-column flex-sm-row justify-content-center gap-3">
<a class="btn btn-primary btn-lg" href="#consultation">Book My Free Consultation</a>
<a class="btn btn-outline-light btn-lg" href="tel:+17329254044"><i class="bi bi-telephone me-2" aria-hidden="true"></i>732-925-4044</a>
</div>
<p class="small mt-3 mb-0">No obligation. No generic package. A practical conversation focused on your business.</p>
</div>
</div>
</div>
</div>
</section> *}
