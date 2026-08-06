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
