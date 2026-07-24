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


<!-- TRUST STRIP: Replace or expand with verified certifications, client logos, review ratings, and real proof. -->
{* <section class="trust-strip" aria-label="Why businesses trust Skale">
<div class="container">
<div class="row row-cols-2 row-cols-lg-4 g-3">
<div class="col">
<div class="trust-item">
<i class="bi bi-person-check" aria-hidden="true"></i>
<div><strong>Senior Expertise</strong><span>Direct access to an experienced partner</span></div>
</div>
</div>
<div class="col">
<div class="trust-item">
<i class="bi bi-diagram-3" aria-hidden="true"></i>
<div><strong>Systems Thinking</strong><span>Every tool supports a larger strategy</span></div>
</div>
</div>
<div class="col">
<div class="trust-item">
<i class="bi bi-graph-up-arrow" aria-hidden="true"></i>
<div><strong>Outcome Focused</strong><span>Decisions tied to measurable progress</span></div>
</div>
</div>
<div class="col">
<div class="trust-item">
<i class="bi bi-headset" aria-hidden="true"></i>
<div><strong>Ongoing Support</strong><span>A long-term partner after launch</span></div>
</div>
</div>
</div>
</div>
</section> *}
