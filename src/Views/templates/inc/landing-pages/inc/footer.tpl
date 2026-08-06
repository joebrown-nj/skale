<section class="py-5 text-white {if $class}{$class}{else}bg-dark{/if}">
    <div class="container py-5 text-center">
        <h2 class="display-6 fw-bold mb-3 text-white" data-aos="fade-up">{$headline}</h2>
        <p class="lead text-white-50 mb-4" data-aos="fade-up" data-aos-delay="100">{$subheadline}</p>
        {include file="inc/landing-pages/inc/modal-button.tpl" class="{if $btnClass}{$btnClass}{else}btn btn-info btn-lg rounded-pill px-5 fw-semibold{/if}" text="{$ctaText}" describedBy="{$ctaText}" metaEvent="{$metaEvent}" metaLabel="{$metaLabel}"}
    </div>
</section>

<div class="sticky-mobile">
    {include file="inc/landing-pages/inc/modal-button.tpl" class="btn btn-primary w-100" text="{$ctaText}" describedBy="{$ctaText}" metaEvent="{$metaEvent}" metaLabel="{$metaLabel}"}
</div>

{include file="inc/layout/hiddenLinks.tpl"}
