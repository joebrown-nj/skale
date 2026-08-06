<!-- FAQ -->
<section class="section-space bg-soft">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-5">
                <span class="eyebrow">{$data.eyebrow}</span>
                <h2>{$data.heading}</h2>
                <p class="mt-3">{$data.description}</p>
            </div>

            <div class="col-lg-7">
                <div class="accordion" id="growthFaq">
                    {foreach from=$data.items item=faq}
                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button {if $faq@first} {else}collapsed{/if}" type="button" data-bs-toggle="collapse" data-bs-target="#faq{$faq@iteration}" aria-expanded="{if $faq@first}true{else}false{/if}" aria-controls="faq{$faq@iteration}">{$faq.question}</button>
                            </h3>
                            <div id="faq{$faq@iteration}" class="accordion-collapse collapse {if $faq@first}show{/if}" data-bs-parent="#growthFaq">
                                <div class="accordion-body">{$faq.answer}</div>
                            </div>
                        </div>
                    {/foreach}
                </div>
            </div>
        </div>
    </div>
</section>
