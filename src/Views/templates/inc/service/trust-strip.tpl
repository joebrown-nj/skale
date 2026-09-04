<!-- TRUST STRIP: Replace or expand with verified certifications, client logos, review ratings, and real proof. -->
<section class="{$data.class}" aria-label="{$data.ariaLabel}">
    <div class="container">
        <div class="{$data.rowClass}">
            {foreach from=$data.items item=item}
                <div class="{$data.columnClass}">
                    <div class="{$data.itemClass}">
                        <i class="{$item.iconClass}" aria-hidden="true"></i>
                        <div><strong>{$item.title}</strong><span>{$item.description}</span></div>
                    </div>
                </div>
            {/foreach}
        </div>
    </div>
</section>
