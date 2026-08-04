<form action="{$smarty.ENV.SITE_URL}contact-form" id="contactForm" class="mt-0 row g-3 needs-validation ajaxForm" novalidate method="POST" data-meta-form-name="contact-form" data-meta-success-event="Contact" data-meta-success-custom-event="ContactFormSubmitted" data-meta-start-custom-event="ContactFormStarted" >
    <input type="hidden" name="form_type" value="contact">
    <div class="row g-3">
        <div class="col-md-6">
            <input name="name" type="text" class="form-control" placeholder="Full Name"/>
        </div>

        <div class="col-md-6">
            <input name="email" type="email" class="form-control" placeholder="Email Address"/>
        </div>

        <div class="col-md-6">
            <input name="phone" type="text" class="form-control" placeholder="Phone Number"/>
        </div>

        <div class="col-md-6">
            <input name="company" type="text" class="form-control" placeholder="Company Name"/>
        </div>

        <div class="col-12">
            <select name="interest" class="form-select">
                <option selected>
                    What do you need help with?
                </option>
                <option>Website Design & Development</option>
                <option>Software Development</option>
                <option>Marketing & SEO</option>
                <option>Automation & IT Solutions</option>
                <option>General Consulting</option>
            </select>
        </div>

        <div class="col-12">
            <textarea rows="5" name="comment" class="form-control" placeholder="Tell us about your project..."></textarea>
        </div>

        <div class="col-12">
            <button class="btn btn-primary-custom">
                Schedule My Free Consultation
            </button>
        </div>
    </div>
</form>





{* <form action="{$smarty.ENV.SITE_URL}contact-form" id="contactForm" class="mt-0 row g-3 needs-validation ajaxForm" novalidate method="POST" data-meta-form-name="contact-form" data-meta-success-event="Contact" data-meta-success-custom-event="ContactFormSubmitted" data-meta-start-custom-event="ContactFormStarted" >
<input type="hidden" name="form_type" value="contact">
<div class="form-group mt-0">
<label class="fs-5 mb-2" for="formName">Name</label>
<input name="name" type="text" class="fs-5 required form-control" id="formName" required>
</div>

<div class="form-group">
<label class="fs-5 mb-2" for="formEmail">Email</label>
<input name="email" type="email" class="required form-control" id="formEmail" required>
</div>

<div class="form-group">
<label class="fs-5 mb-2" for="formPhone">Phone</label>
<input name="phone" type="phone" class="required form-control" id="formPhone" required>
</div>

<div class="form-group">
<label class="fs-5 mb-2">Interested in:</label>
<div class="row">
{foreach from=$serviceList key=key item=service}
<div class="col-md-6">
<input id="formInteresteIn-{$key}" {if isset($interests) && in_array(($service->url|replace:'{$smarty.ENV.URL_SERVICES_SOLUTIONS}/':''), $interests)}checked="checked"{/if} name="interests[]" class="cursor-pointer form-check-input" type="checkbox" value="{$service->title}">
<label for="formInteresteIn-{$key}" class="cursor-pointer px-1 form-check-label">{$service->title}</label>
</div>
{/foreach}
</div>
</div>

<div class="form-group">
<label class="fs-5 mb-2" for="formMessage">Comments</label>
<textarea cols="500" rows="5" id="formMessage" name="comment" class="fs-5 required form-control" required></textarea>
</div>

<div class="form-group">
<input name="subscribe" value="1" type="checkbox" class="cursor-pointer form-check-input" id="formCheck">
<label class="px-1 cursor-pointer form-check-label" for="formCheck">Subscribe to mailing list</label>
</div>

<div class="form-group">
<button aria-describedby="contact form button" class="btn btn-lg btn-primary" type="submit" data-meta-custom-event="ContactFormSubmitClick" data-meta-label="contact form submit button">Submit</button>
</div>
</form> *}
