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

                        <form action="{$smarty.ENV.SITE_URL}contact-form" method="POST" class="{$data.form.class} ajaxForm" id="{$data.form.id}" data-meta-form-name="{$data.form.attributes.dataMetaFormName}" data-meta-success-event="{$data.form.attributes.dataMetaSuccessEvent}">
                            <input type="hidden" name="form_type" value="service-detail">
                            <div class="row g-3">
                                {foreach from=$data.form.fields item=field}
                                    {if $field.type == 'hidden'}
                                        <input type="hidden" name="{$field.name}" value="{$field.value}">
                                    {else}
                                        <div class="{$field.wrapperClass}">
                                            <label class="{$field.labelClass}" for="{$field.id}">{$field.label}</label>
                                            {if $field.type == 'select'}
                                                {* {$field.attributes} *}
                                                {* {$option.selected} *}
                                                <select class="{$field.inputClass}" id="{$field.id}" name="{$field.name}">
                                                    {foreach from=$field.options item=option}
                                                        <option value="{$option.value}">{$option.label}</option>
                                                    {/foreach}
                                                </select>
                                                {elseif $field.type == 'textarea'}
                                                {* {$field.attributes} *}
                                                <textarea placeholder="{$field.placeholder}" class="{$field.inputClass}" id="{$field.id}" name="{$field.name}" rows="{$field.rows}"></textarea>
                                                {* {$field.value} *}
                                                {* {elseif $field.type == 'checkbox'}
                                                <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="{$field.id}" name="{$field.name}" {$field.attributes}>
                                                <label class="form-check-label" for="{$field.id}">{$field.label}</label>
                                                </div> *}
                                            {else}
                                                {* {$field.attributes} *}
                                                <input class="{$field.inputClass}" id="{$field.id}" name="{$field.name}" type="{$field.type}" autocomplete="{$field.autocomplete}">
                                            {/if}
                                        </div>
                                    {/if}
                                {/foreach}
                            </div>

                            <div class="col-12 d-grid">
                                <button class="{$data.form.submit.class}" type="submit">{$data.form.submit.label}</button>
                            </div>

                            <p class="{$data.form.privacy.class}">
                                <i class="{$data.form.privacy.iconClass}"></i>{$data.form.privacy.text}
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
