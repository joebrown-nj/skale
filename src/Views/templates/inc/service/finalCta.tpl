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
                            <a class="{$button.class}" href="{$button.url}">{$button.label}</a>
                        {/foreach}
                    </div>

                    <p class="small mt-3 mb-0">{$data.note}</p>
                </div>
            </div>
        </div>
    </div>
</section>
