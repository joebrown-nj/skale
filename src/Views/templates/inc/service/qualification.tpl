<!-- QUALIFICATION -->
<section class="section-space pt-0">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <span class="eyebrow">{$data.eyebrow}</span>
                <h2>{$data.heading}</h2>
            </div>

            <div class="col-lg-6">
                <div class="row g-3">
                    {foreach from=$data.items item=item}
                        <div class="col-12">
                            <div class="d-flex gap-3 p-3 border rounded-4">
                                <i class="bi bi-check-circle-fill text-success fs-5" aria-hidden="true"></i>
                                <div><strong class="d-block">{$item.title}</strong><span class="text-secondary">{$item.description}</span></div>
                            </div>
                        </div>
                    {/foreach}
                </div>
            </div>
        </div>
    </div>
</section>
