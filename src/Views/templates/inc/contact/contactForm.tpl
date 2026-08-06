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
