<form action="{$smarty.ENV.SITE_URL}post-lead-form" method="POST" class="ajaxForm" id="lead-form" data-meta-form-name="landing-lead-form" data-meta-success-event="Lead" data-meta-success-custom-event="LandingLeadSubmitted" data-meta-start-custom-event="LandingLeadStarted">
    <div class="mb-3">
        <label class="form-label fw-semibold">Name</label>
        <input name="name" type="text" class="form-control form-control-lg" placeholder="Your name">
    </div>

    <div class="mb-3">
        <label class="form-label fw-semibold">Email</label>
        <input name="email" type="email" class="form-control form-control-lg" placeholder="you@example.com">
    </div>

    {* <div class="mb-3">
    <label class="form-label fw-semibold">What do you need help with?</label>
    <select class="form-select form-select-lg">
    {foreach from=$allServiceList key=key item=service}
    <option value="{$service->title}">{$service->title}</option>
    {/foreach}
    </select>
    </div> *}

    <div class="mb-4">
        <label class="form-label fw-semibold">{$userMessageLabel}</label>
        <textarea name="comment" class="form-control" rows="4" placeholder="Tell us what you want to improve..."></textarea>
    </div>

    <input type="hidden" name="interests[]" value="website development">
    <button class="btn btn-primary w-100" data-meta-custom-event="LandingLeadSubmitClick" data-meta-label="landing lead submit button">{$buttonText}</button>
</form>
