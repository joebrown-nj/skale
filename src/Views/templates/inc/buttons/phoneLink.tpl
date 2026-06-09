{if isset($smarty.ENV.SITE_PHONE) && $smarty.ENV.SITE_PHONE != ''}
    {if $type == 'link'}
        <p>
            <i class="fa-solid fa-phone"></i>
            <a class="d-none d-lg-inline {$class}" href="tel:{$smarty.ENV.SITE_PHONE}" title="Call {$smarty.ENV.SITE_NAME} {$smarty.ENV.SITE_PHONE}" data-meta-event="Contact" data-meta-label="phone link">{$smarty.ENV.SITE_PHONE}</a>
            <a class="d-lg-none {$class}" href="sms:{$smarty.ENV.SITE_PHONE}" title="Call {$smarty.ENV.SITE_NAME} {$smarty.ENV.SITE_PHONE}" data-meta-event="Contact" data-meta-label="sms link">{$smarty.ENV.SITE_PHONE}</a>
        </p>
    {/if}

    {if $type == 'button'}
        <a class="d-none d-lg-inline {$class} btn btn-lg btn-outline-info" href="tel:{$smarty.ENV.SITE_PHONE}" title="Call {$smarty.ENV.SITE_NAME} {$smarty.ENV.SITE_PHONE}" data-meta-event="Contact" data-meta-label="phone button">
            <i class="fa-solid fa-phone"></i>
            {$smarty.ENV.SITE_PHONE}
        </a>

        <a class="d-lg-none {$class} btn btn-lg btn-outline-info" href="sms:{$smarty.ENV.SITE_PHONE}" title="Call {$smarty.ENV.SITE_NAME} {$smarty.ENV.SITE_PHONE}" data-meta-event="Contact" data-meta-label="sms button">
            <i class="fa-solid fa-phone"></i>
            {$smarty.ENV.SITE_PHONE}
        </a>
    {/if}
{/if}
