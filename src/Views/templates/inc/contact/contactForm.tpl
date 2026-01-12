<div class="card text-bg-dark">
    <div class="card-header">
        <h2 class="logo-bg-small mb-0 card-title BricolageGrotesque-ExtraBold display-5">Let's talk.</h2>
    </div>

    <div class="card-body px-4">
        <section id="formcontent" class="row">
            <form id="contactForm" class="mt-0 row g-3 needs-validation" novalidate method="POST">
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
                                <input id="formInteresteIn-{$key}" {if $service.selected}checked="checked"{/if} name="interests[]" class="form-check-input" type="checkbox" value="{$service.title}">
                                <label for="formInteresteIn-{$key}" class="form-check-label">{$service.title}</label>
                            </div>
                        {/foreach}
                    </div>
                </div>

                <div class="form-group">
                    <label class="fs-5 mb-2" for="formMessage">Comments</label>
                    <textarea cols="500" rows="5" id="formMessage" name="comment" class="fs-5 required form-control" required></textarea>
                </div>

                <div class="form-group form-check">
                    <input name="subscribe" value="1" type="checkbox" class="form-check-input" id="formCheck">
                    <label class="form-check-label" for="formCheck">Subscribe to mailing list</label>
                </div>

                <div class="form-group">
                    <button aria-describedby="contact form button" class="lbc shadow-hover btn btn-lg btn-primary" type="submit">Submit</button>
                </div>
            </form>
        </section>
    </div>
</div>