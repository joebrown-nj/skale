{if $type == 'link'}
    <p>
        <i class="fa-solid fa-envelope"></i>
        <a aria-details="contact link" class="{$class} mbtn lbc" href="{$smarty.ENV.SITE_URL}{$smarty.ENV.URL_CONTACT}{if $interest}?interests={$interest}{/if}" title="Contact {$smarty.ENV.SITE_NAME} {if $service}interested in {$service} service{/if}">{$buttonText}</a>
    </p>
{/if}

{if $type == 'button'}
    <a aria-details="contact button" class="{$class} mbtn lbc btn btn-lg btn-outline-info" href="{$smarty.ENV.SITE_URL}{$smarty.ENV.URL_CONTACT}{if $interest}?interests={$interest}{/if}" title="Contact {$smarty.ENV.SITE_NAME} {if $service}interested in {$service}{/if}">
        <i class="fa-solid fa-envelope"></i>
        {$buttonText}
    </a>
{/if}