<form
action="{$smarty.ENV.SITE_URL}post-lead-form"
method="POST"
class="ajaxForm"
id="lead-form"
data-meta-form-name="landing-lead-form"
data-meta-success-event="Lead"
data-meta-success-custom-event="LandingLeadSubmitted"
data-meta-start-custom-event="LandingLeadStarted"
>
<div class="mb-3">
    <input name="name" type="text" class="form-control" placeholder="Your Name" required>
</div>
<div class="mb-3">
    <input name="email" type="email" class="form-control" placeholder="Email Address" required>
</div>
<div class="mb-3">
    <input name="phone" type="tel" class="form-control" placeholder="Phone Number">
</div>
<div class="mb-3">
    <select name="interests[]" class="form-select text-tertiary" required>
        <option>What do you need help with?</option>
        {foreach from=$allServiceList key=key item=service}
            <option value="{$service->title}">{$service->title}</option>
        {/foreach}
    </select>
</div>
<div class="mb-3">
    <textarea name="comment" class="form-control" rows="4" placeholder="Biggest challenge right now"></textarea>
</div>
<button class="btn btn-primary w-100" data-meta-custom-event="LandingLeadSubmitClick" data-meta-label="landing lead submit button">Get My Free Strategy Session</button>
</form>
