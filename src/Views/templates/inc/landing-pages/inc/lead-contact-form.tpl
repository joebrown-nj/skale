<form action="{$smarty.ENV.SITE_URL}contact-form" method="POST" class="ajaxForm" id="lead-form" data-meta-form-name="task-management-migration-form" data-meta-success-event="Lead">
    <input type="hidden" name="form_type" value="landing-page">
    <div class="mb-3"><label for="name" class="form-label fw-semibold">Name</label><input id="name" name="name" class="form-control" autocomplete="name" required></div>

    <div class="mb-3"><label for="email" class="form-label fw-semibold">Email</label><input id="email" name="email" type="email" class="form-control" autocomplete="email" required></div>

    <div class="row g-3 mb-3">
        <div class="col-sm-6"><label for="phone" class="form-label fw-semibold">Phone <span class="fw-normal text-secondary">(optional)</span></label><input id="phone" name="phone" type="tel" class="form-control" autocomplete="tel"></div>

        <div class="col-sm-6">
            <label for="team" class="form-label fw-semibold">Team size</label>
            <select id="team" name="team_size" class="form-select">
                <option value="">Select</option>
                <option>Just me</option>
                <option>2-5 people</option>
                <option>6-15 people</option>
                <option>16-50 people</option>
                <option>50+ people</option>
            </select>
        </div>
    </div>

    <div class="mb-4">
        <label for="comment" class="form-label fw-semibold">{$userMessageLabel}</label>
        <textarea id="comment" name="comment" class="form-control" placeholder="{!isset($textAreaPlaceholder) || $textAreaPlaceholder == '' ? "Tell us what you want to improve..." : $textAreaPlaceholder}"></textarea>
    </div>

    <input type="hidden" name="interests[]" value="{$p1}">

    <button class="btn btn-primary btn-lg w-100" type="submit">{$buttonText}</button>
    <p class="small text-secondary text-center mt-3 mb-0">
        <i class="fa-solid fa-lock me-1"></i>No sales pressure. Your information stays private.
    </p>
    {include file="inc/layout/cloudflare-turnstile.tpl"}
</form>
