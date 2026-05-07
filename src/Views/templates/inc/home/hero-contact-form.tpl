<div class="card border-0 shadow-lg" data-aos="fade-up">
    <div class="card-body p-5">
        <div class="pb-4">
            <h3 class="card-title mb-4 ubuntu-regular">Get a Custom Growth Plan for Your Business</h3>
            <p class="lead">Tell us where you want to go - we'll map out the strategy, tech, and systems to get you there within 24 hours.</p>
        </div>

        <div class="position-relative mb-4 mx-2 px-0 py-0 progress-container">
            <div class="progress" role="progressbar" aria-label="Progress" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="height: 1px;">
                <div class="progress-bar" style="width:0%"></div>
            </div>

            <button type="button" class="position-absolute top-0 start-0 translate-middle btn btn-sm btn-primary rounded-pill" style="width: 2rem; height:2rem;">1</button>
            <button type="button" class="position-absolute top-0 start-50 translate-middle btn btn-sm btn-secondary rounded-pill" style="width: 2rem; height:2rem;">2</button>
            <button type="button" class="position-absolute top-0 start-100 translate-middle btn btn-sm btn-secondary rounded-pill" style="width: 2rem; height:2rem;">3</button>
        </div>

        <form method="post" action="{$smarty.ENV.SITE_URL}" id="goals-form" class="ajaxForm">
            <div class="step step-1" data-aos="fade-in-right">
                <!-- Step 1 form fields here -->
                <h3 class="mb-4">What do you need help with?</h3>
                <div class="row mb-4">
                    {foreach from=$serviceList key=key item=service}
                        <div class="col-md-6">
                            <input id="formInteresteIn-{$key}" {if isset($interests) && in_array(($service->url|replace:'{$smarty.ENV.URL_SERVICES_SOLUTIONS}/':''), $interests)}checked="checked"{/if} name="interests[]" class="cursor-pointer form-check-input" type="checkbox" value="{$service->title}">
                            <label for="formInteresteIn-{$key}" class="cursor-pointer px-1 form-check-label">{$service->title}</label>
                        </div>
                    {/foreach}
                </div>

                {* <button type="button" class="btn btn-primary next-step">Next</button> *}
                <a class="btn btn-primary next-step">Next</a>
            </div>

            <div class="step step-2" data-aos="fade-in-right">
                <!-- Step 2 form fields here -->
                <h3>What's your main goal?</h3>
                <div class="mb-4">
                    <label for="goals" class="form-label">What would you like to improve or achieve in the next 90 days?</label>
                    <textarea class="form-control" id="goals" name="goals" rows="4" placeholder="Generate more leads, improve conversions, automate workflows, rebuild website, etc."></textarea>
                </div>

                {* <button type="button" class="btn btn-primary prev-step">Back</button>
                <button type="button" class="btn btn-primary next-step">Next</button> *}
                <a class="btn btn-primary prev-step">Back</a>
                <a class="btn btn-primary next-step">Next</a>
            </div>

            <div class="step step-3" data-aos="fade-in-right">
                <!-- Step 3 form fields here -->
                <h3>Your Details</h3>
                <div class="mb-4">
                    <input name="name" type="text" class="form-control" placeholder="Name" aria-label="Name" required>
                </div>

                <div class="mb-4">
                    <input name="email" type="email" class="form-control" placeholder="Email" aria-label="Email" required>
                </div>

                <div class="mb-4">
                    <input name="phone" type="tel" class="form-control" placeholder="Phone" aria-label="Phone" required>
                </div>

                {* <button type="button" class="btn btn-primary prev-step">Back</button> *}
                <a class="btn btn-primary prev-step">Back</a>
                <button type="submit" class="lbc btn btn-success">Get My Free Growth Plan</button>
            </div>
        </form>

        <div class="border-top mt-4 pt-2 text-secondary">
            <p class="mb-2">No spam, just a custom growth plan delivered to your inbox.</p>
            <p>Prefer to talk? <a href="{$smarty.ENV.SITE_URL}{$smarty.ENV.URL_CONTACT}" class="">Book a Free Strategy Call →</a></p>
        </div>
    </div>
</div>