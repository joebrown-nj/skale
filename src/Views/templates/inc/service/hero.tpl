<!-- HERO: Outcome-focused message plus an above-the-fold conversion form. -->
<section class="hero">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-7">
                <div class="hero-copy">
                    <span class="eyebrow">{$data.eyebrow}</span>
                    <h1>{$data.heading} <span class="text-highlight">{$data.highlight}</span></h1>
                    <p class="hero-lead mt-4 mb-0">{$data.description}</p>

                    {if $data.benefits}
                        <ul class="{$data.benefits.class}" aria-label="{$data.benefits.ariaLabel}">
                            {foreach from=$data.benefits.items item=benefit}
                                <li>
                                    <i class="{$data.benefits.iconClass}" aria-hidden="true"></i>
                                    {$benefit}
                                </li>
                            {/foreach}
                        </ul>
                    {/if}

                    <div class="{$data.buttons.wrapperClass}">
                        {foreach from=$data.buttons.items item=button}
                            <a class="{$button.class}" href="{$button.url}">{$button.label}</a>
                        {/foreach}
                    </div>

                    <div class="hero-note">
                        <i class="{$data.note.iconClass}" aria-hidden="true"></i>
                        <span>{$data.note.text}</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-5" id="consultation">
                <div class="hero-form-wrap">

                    <div class="lead-form-card">
                        <div class="mb-4">
                            <span class="{$data.form.badgeClass}">{$data.form.badge}</span>
                            <h2 class="h3 mb-2">{$data.form.heading}</h2>
                            <p class="mb-0">{$data.form.description}</p>
                        </div>

                        <form action="{$data.form.action}" method="{$data.form.method}" class="{$data.form.class}" id="{$data.form.id}" data-meta-form-name="{$data.attributes.dataMetaFormName}" data-meta-success-event="{$data.attributes.dataMetaSuccessEvent}">
                            <div class="row g-3">
                                {foreach from=$data.form.fields item=field}
                                    <div class="{$field.wrapperClass}">
                                        <label class="{$field.labelClass}" for="{$field.id}">{$field.label}</label>
                                        {if $field.type == 'select'}
                                            <select class="{$field.inputClass}" id="{$field.id}" name="{$field.name}" {$field.attributes}>
                                                {foreach from=$field.options item=option}
                                                    <option value="{$option.value}" {$option.selected}>{$option.label}</option>
                                                {/foreach}
                                            </select>
                                            {elseif $field.type == 'textarea'}
                                            <textarea placeholder="{$field.placeholder}" class="{$field.inputClass}" id="{$field.id}" name="{$field.name}" rows="{$field.rows}" {$field.attributes}>{$field.value}</textarea>
                                            {* {elseif $field.type == 'checkbox'}
                                            <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="{$field.id}" name="{$field.name}" {$field.attributes}>
                                            <label class="form-check-label" for="{$field.id}">{$field.label}</label>
                                            </div> *}
                                        {else}
                                            <input class="{$field.inputClass}" id="{$field.id}" name="{$field.name}" type="{$field.type}" autocomplete="{$field.autocomplete}" {$field.attributes}>
                                        {/if}
                                    </div>
                                {/foreach}
                            </div>

                            <div class="col-12 d-grid">
                                <button class="btn {$data.form.submit.class} {$data.form.submit.sizeClass}" type="submit">{$data.form.submit.label}</button>
                            </div>

                            <p class="{$data.form.privacy.class}">
                                <i class="{$data.form.privacy.iconClass}"></i>{$data.form.privacy.text}
                            </p>
                        </form>

                        {* {include file="inc/landing-pages/inc/lead-contact-form.tpl" buttonText="Request My Free Review" userMessageLabel="What is your biggest challenge?" textAreaPlaceholder=""} *}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>













{* <section class="hero d-none">
<div class="container">
<div class="row align-items-center g-5">
<div class="col-lg-7">
<div class="hero-copy">
<span class="eyebrow">Growth Infrastructure</span>
<h1>Turn disconnected tools into a system that <span class="text-highlight">drives growth.</span></h1>
<p class="hero-lead mt-4 mb-0">Skale connects your website, lead funnels, CRM, automation, and reporting so your business can attract better prospects, follow up faster, and convert more opportunities.</p>

<ul class="hero-checks" aria-label="Key benefits">
<li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>Built around your business</li>
<li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>Clear strategy before execution</li>
<li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>One accountable growth partner</li>
</ul>

<div class="d-flex flex-column flex-sm-row gap-3">
<a class="btn btn-primary btn-lg" href="#consultation">Get Your Free Growth Review</a>
<a class="btn btn-outline-dark btn-lg" href="#how-it-works">See How It Works</a>
</div>

<div class="hero-note">
<i class="bi bi-shield-check" aria-hidden="true"></i>
<span>No pressure. No generic sales pitch. Just a practical conversation about what is holding your business back.</span>
</div>
</div>
</div>

<div class="col-lg-5" id="consultation">
<div class="hero-form-wrap">

<div class="lead-form-card">
<div class="mb-4">
<span class="badge text-bg-light border mb-3">Free 30-minute consultation</span>
<h2 class="h3 mb-2">Find your biggest growth gap</h2>
<p class="mb-0">Tell us a little about your business. We will help you identify where leads, time, or revenue may be slipping through the cracks.</p>
</div>

{include file="inc/landing-pages/inc/lead-contact-form.tpl" buttonText="Request My Free Review" userMessageLabel="What is your biggest challenge?" textAreaPlaceholder=""}
</div> *}

{* <form class="lead-form-card" action="/contact" method="post">
<div class="mb-4">
<span class="badge text-bg-light border mb-3">Free 30-minute consultation</span>
<h2 class="h3 mb-2">Find your biggest growth gap</h2>
<p class="mb-0">Tell us a little about your business. We will help you identify where leads, time, or revenue may be slipping through the cracks.</p>
</div>

<div class="row g-3">
<div class="col-12">
<label class="form-label" for="name">Your name</label>
<input class="form-control" id="name" name="name" type="text" autocomplete="name" required>
</div>
<div class="col-12">
<label class="form-label" for="email">Work email</label>
<input class="form-control" id="email" name="email" type="email" autocomplete="email" required>
</div>
<div class="col-12">
<label class="form-label" for="company">Company</label>
<input class="form-control" id="company" name="company" type="text" autocomplete="organization">
</div>
<div class="col-12">
<label class="form-label" for="challenge">What is your biggest challenge?</label>
<select class="form-select" id="challenge" name="challenge" required>
<option value="" selected disabled>Select one</option>
<option>We need more qualified leads</option>
<option>Our website is not converting</option>
<option>Our tools and data are disconnected</option>
<option>Too much work is manual</option>
<option>We cannot clearly measure results</option>
<option>We are not sure where to start</option>
</select>
</div>
<div class="col-12 d-grid">
<button class="btn btn-primary btn-lg" type="submit">Request My Free Review</button>
</div>
</div>
<p class="privacy-copy"><i class="bi bi-lock me-1" aria-hidden="true"></i>Your information stays private. Skale will only use it to respond to your request.</p>
</form> *}
{* </div>
</div>
</div>
</div>
</section> *}
