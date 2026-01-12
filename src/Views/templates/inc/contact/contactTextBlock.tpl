
<img alt="contact {$smarty.ENV.SITE_NAME}" src="{$smarty.ENV.WEB_ROOT}images/contact-temp.jpg" class="mb-4" style="width: 100%;"/>

<div class="border-bottom py-4">
    <h2 class="mb-2 Bahnschrift logo-bg-small">Questions? Ready to start now?</h2>
    {$contactContent.content}
</div>

{if isset($smarty.ENV.SITE_PHONE) && $smarty.ENV.SITE_PHONE != ''}
    <div class="border-bottom py-4">
        <h2 class="mb-2 Bahnschrift logo-bg-small"><i class="fa-solid fa-phone"></i> Phone</h2>
        {include file="inc/buttons/phoneLink.tpl" phone=$smarty.ENV.SITE_PHONE type="link"}
        {* {include file="inc/buttons/phoneLink.tpl" phone=$smarty.ENV.SITE_PHONE type="button"} *}
    </div>
{/if}

<div class="py-4">
    <h2 class="mb-2 Bahnschrift logo-bg-small"><i class="fa-solid fa-envelope"></i> Email</h2>
    {include file="inc/buttons/emailLink.tpl" phone=$smarty.ENV.SITE_EMAIL type="link"}
    {* {include file="inc/buttons/emailLink.tpl" phone=$smarty.ENV.SITE_EMAIL type="button"} *}
</div>