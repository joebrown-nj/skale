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
