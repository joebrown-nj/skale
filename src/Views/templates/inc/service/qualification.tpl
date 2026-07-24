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



{* <!-- QUALIFICATION -->
<section class="section-space pt-0">
<div class="container">
<div class="row g-5 align-items-center">
<div class="col-lg-6">
<span class="eyebrow">Who This Is For</span>
<h2>A strong fit for businesses ready to improve the system, not just patch the symptoms.</h2>
</div>
<div class="col-lg-6">
<div class="row g-3">
<div class="col-12">
<div class="d-flex gap-3 p-3 border rounded-4">
<i class="bi bi-check-circle-fill text-success fs-5" aria-hidden="true"></i>
<div><strong class="d-block">You are generating activity, but not enough qualified opportunities.</strong><span class="text-secondary">Traffic, campaigns, and referrals are not consistently becoming customers.</span></div>
</div>
</div>
<div class="col-12">
<div class="d-flex gap-3 p-3 border rounded-4">
<i class="bi bi-check-circle-fill text-success fs-5" aria-hidden="true"></i>
<div><strong class="d-block">Your team relies on too many manual steps and disconnected tools.</strong><span class="text-secondary">Growth is creating more work instead of greater efficiency.</span></div>
</div>
</div>
<div class="col-12">
<div class="d-flex gap-3 p-3 border rounded-4">
<i class="bi bi-check-circle-fill text-success fs-5" aria-hidden="true"></i>
<div><strong class="d-block">You want a long-term partner who can connect strategy and execution.</strong><span class="text-secondary">You need more than a vendor completing isolated tasks.</span></div>
</div>
</div>
</div>
</div>
</div>
</div>
</section> *}
