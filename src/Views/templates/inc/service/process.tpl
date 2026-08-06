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
