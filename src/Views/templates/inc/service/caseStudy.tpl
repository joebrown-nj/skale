<!-- PROOF / CASE STUDY: Replace placeholders with a verified, relevant client story before publishing. -->
<section class="section-space">
    <div class="container">
        <div class="case-study">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <span class="case-label">{$data.label}</span>
                    <h2 class="mt-2">{$data.heading}</h2>
                    <p class="mt-3">{$data.description}</p>
                    <p class="mb-0"><strong class="text-dark">{$data.lessonLabel}</strong> {$data.lesson}</p>
                </div>

                <div class="col-lg-6">
                    <div class="row g-3">
                        {foreach from=$data.metrics item=metric}
                            <div class="col-6">
                                <div class="metric"><strong>{$metric.value}</strong><span>{$metric.label}</span></div>
                            </div>
                        {/foreach}
                    </div>

                    <p class="{$data.disclaimerClass}">{$data.disclaimer}</p>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- PROOF / CASE STUDY: Replace placeholders with a verified, relevant client story before publishing. -->
{* <section class="section-space">
<div class="container">
<div class="case-study">
<div class="row align-items-center g-5">
<div class="col-lg-6">
<span class="case-label">Client Transformation</span>
<h2 class="mt-2">From fragmented processes to a scalable business platform.</h2>
<p class="mt-3">A growing organization relied on disconnected tools, manual data handling, and a platform that could not support its expanding operation. Skale modernized the underlying systems, simplified workflows, and created a more dependable foundation for growth.</p>
<p class="mb-0"><strong class="text-dark">The lesson:</strong> sustainable growth rarely comes from one isolated improvement. It comes from solving the system behind the problem.</p>
</div>
<div class="col-lg-6">
<div class="row g-3">
<div class="col-6">
<div class="metric"><strong>50%+</strong><span>Reduction in operating costs</span></div>
</div>
<div class="col-6">
<div class="metric"><strong>1M+</strong><span>Records supported at scale</span></div>
</div>
<div class="col-6">
<div class="metric"><strong>Faster</strong><span>Publishing and delivery workflows</span></div>
</div>
<div class="col-6">
<div class="metric"><strong>Unified</strong><span>Data, systems, and processes</span></div>
</div>
</div>
<p class="small mt-3 mb-0">Use only metrics and claims you can verify. Add the client name, testimonial, or logo when permission is available.</p>
</div>
</div>
</div>
</div>
</section> *}
