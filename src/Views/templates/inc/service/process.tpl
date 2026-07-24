<!-- PROCESS -->
<section class="section-space bg-soft" id="how-it-works">
    <div class="container">
        <div class="section-intro">
            <span class="eyebrow">{$data.eyebrow}</span>
            <h2>{$data.heading}</h2>
            <p class="mt-3">{$data.description}</p>
        </div>

        <div class="row g-4">
            {foreach from=$data.items item=item key=k}
                <div class="col-md-6 col-xl-3">
                    <article class="process-card service-card">
                        <span class="process-step">{$k+1}</span>
                        <h3 class="h5">{$item.title}</h3>
                        <p class="mb-0">{$item.description}</p>
                    </article>
                </div>
            {/foreach}
        </div>
    </div>
</section>



{* <!-- PROCESS -->
<section class="section-space bg-soft" id="how-it-works">
<div class="container">
<div class="section-intro">
<span class="eyebrow">How It Works</span>
<h2>A practical process with clarity at every step.</h2>
<p class="mt-3">You will know what we are solving, why it matters, what happens next, and how success will be measured.</p>
</div>

<div class="row g-4">
<div class="col-md-6 col-xl-3">
<article class="process-card">
<span class="process-step">1</span>
<h3 class="h5">Discover</h3>
<p class="mb-0">We learn how your business generates revenue, where work slows down, and what growth means to you.</p>
</article>
</div>
<div class="col-md-6 col-xl-3">
<article class="process-card">
<span class="process-step">2</span>
<h3 class="h5">Prioritize</h3>
<p class="mb-0">We identify the highest-impact gaps and create a focused roadmap instead of trying to change everything at once.</p>
</article>
</div>
<div class="col-md-6 col-xl-3">
<article class="process-card">
<span class="process-step">3</span>
<h3 class="h5">Build & Connect</h3>
<p class="mb-0">We improve the right experiences, workflows, integrations, campaigns, and reporting systems.</p>
</article>
</div>
<div class="col-md-6 col-xl-3">
<article class="process-card">
<span class="process-step">4</span>
<h3 class="h5">Measure & Improve</h3>
<p class="mb-0">We monitor performance, learn from real behavior, and continuously improve what drives results.</p>
</article>
</div>
</div>
</div>
</section> *}
