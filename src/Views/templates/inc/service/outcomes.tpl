<!-- OUTCOMES -->
<section class="section-space pt-0">
    <div class="container">
        <div class="{$data.panelClass}">
            <div class="row align-items-center g-5">
                <div class="col-lg-5">
                    <span class="eyebrow text-white">{$data.eyebrow}</span>
                    <h2>{$data.heading}</h2>
                    <p class="mt-3 mb-0">{$data.description}</p>
                </div>

                <div class="col-lg-7">
                    <ul class="{$data.listClass}">
                        {foreach from=$data.items item=item key=k}
                            <li data-aos="fade-up" data-aos-delay="{($k + 1) * 50}">
                                <i class="{$data.iconClass}" aria-hidden="true"></i>
                                <div><strong>{$item.title}</strong><span>{$item.description}</span></div>
                            </li>
                        {/foreach}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>


{* <!-- OUTCOMES -->
<section class="section-space pt-0">
<div class="container">
<div class="outcome-panel">
<div class="row align-items-center g-5">
<div class="col-lg-5">
<span class="eyebrow text-white">The Outcome</span>
<h2>A connected growth system built around how your business actually works.</h2>
<p class="mt-3 mb-0">Skale looks beyond isolated projects. We align strategy, technology, marketing, data, and operations so each part of your business supports the next.</p>
</div>
<div class="col-lg-7">
<ul class="outcome-list">
<li>
<i class="bi bi-check-circle-fill" aria-hidden="true"></i>
<div><strong>Generate and capture better opportunities</strong><span>Clear messaging, stronger conversion paths, and lead-focused experiences.</span></div>
</li>
<li>
<i class="bi bi-check-circle-fill" aria-hidden="true"></i>
<div><strong>Respond faster and nurture consistently</strong><span>CRM workflows and automation keep prospects moving without constant manual effort.</span></div>
</li>
<li>
<i class="bi bi-check-circle-fill" aria-hidden="true"></i>
<div><strong>Make decisions with reliable data</strong><span>Reporting connects marketing activity and operational performance to business outcomes.</span></div>
</li>
<li>
<i class="bi bi-check-circle-fill" aria-hidden="true"></i>
<div><strong>Build a foundation that can scale</strong><span>Flexible systems support growth without creating unnecessary complexity or rework.</span></div>
</li>
</ul>
</div>
</div>
</div>
</div>
</section> *}
