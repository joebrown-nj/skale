<div class="glass-card" data-aos="fade-up">
    <div class="pb-4">
        <h3 class="card-title mb-2 ubuntu-regular text-white">Get a Custom Growth Plan for Your Business</h3>
        <p class="text-secondary">Tell us where you want to go - we'll map out the strategy, tech, and systems to get you there.</p>
    </div>

    <div class="position-relative mb-4 mx-2 px-0 py-0 progress-container">
        <div class="progress goals-progress" role="progressbar" aria-label="Progress" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar goals-progress-bar"></div>
        </div>

        <button type="button" class="p-0 position-absolute top-0 start-0 translate-middle btn btn-sm btn-primary rounded-pill goals-step-pill">1</button>
        <button type="button" class="p-0 position-absolute top-0 start-50 translate-middle btn btn-sm btn-secondary rounded-pill goals-step-pill">2</button>
        <button type="button" class="p-0 position-absolute top-0 start-100 translate-middle btn btn-sm btn-secondary rounded-pill goals-step-pill">3</button>
    </div>

    <form method="post" action="{$smarty.ENV.SITE_URL}contact-form" id="goals-form" class="ajaxForm" data-meta-form-name="home-growth-plan-form" data-meta-success-event="Lead" data-meta-success-custom-event="GrowthPlanSubmitted" data-meta-start-custom-event="GrowthPlanStarted">
        <input type="hidden" name="form_type" value="growth-plan">
        <div class="step step-1" data-aos="fade-in-right">
            <!-- Step 1 form fields here -->
            <h3 class="mb-4 text-white">What do you need help with?</h3>
            <div class="row mb-4">
                {foreach from=$serviceList key=key item=service}
                    <div class="col-md-6">
                        <input id="formInteresteIn-{$key}" {if isset($interests) && in_array(($service->url|replace:'{$smarty.ENV.URL_SERVICES_SOLUTIONS}/':''), $interests)}checked="checked"{/if} name="interests[]" class="cursor-pointer form-check-input" type="checkbox" value="{$service->title}">
                        <label for="formInteresteIn-{$key}" class="text-white cursor-pointer px-1 form-check-label">{$service->title}</label>
                    </div>
                {/foreach}
            </div>

            <a class="btn btn-primary next-step">Next</a>
        </div>

        <div class="step step-2" data-aos="fade-in-right">
            <!-- Step 2 form fields here -->
            <h3 class="text-white">What's your main goal?</h3>
            <div class="mb-4">
                <label for="comment" class="text-white form-label">What would you like to improve or achieve in the next 90 days?</label>
                <textarea class="form-control" id="comment" name="comment" rows="4" placeholder="Generate more leads, improve conversions, automate workflows, rebuild website, etc."></textarea>
            </div>

            <a class="btn btn-primary prev-step">Back</a>
            <a class="btn btn-primary next-step">Next</a>
        </div>

        <div class="step step-3" data-aos="fade-in-right">
            <!-- Step 3 form fields here -->
            <h3 class="text-white">Your Details</h3>
            <div class="mb-4">
                <input name="name" type="text" class="form-control" placeholder="Name" aria-label="Name" required>
            </div>

            <div class="mb-4">
                <input name="email" type="email" class="form-control" placeholder="Email" aria-label="Email" required>
            </div>

            <div class="mb-4">
                <input name="phone" type="tel" class="form-control" placeholder="Phone" aria-label="Phone" required>
            </div>

            <a class="btn btn-primary prev-step">Back</a>
            <button type="submit" class="btn btn-success" data-meta-custom-event="GrowthPlanSubmitClick" data-meta-label="home growth plan submit button">Get My Free Growth Plan</button>
        </div>
    </form>

    <div class="border-top mt-4 pt-2 text-secondary">
        <p class="mb-1">No spam, just a custom growth plan delivered to your inbox.</p>
        <p>Prefer to talk? <a href="{$smarty.ENV.SITE_URL}{$smarty.ENV.URL_CONTACT}" class="">Book a Free Strategy Call →</a></p>
    </div>
</div>
