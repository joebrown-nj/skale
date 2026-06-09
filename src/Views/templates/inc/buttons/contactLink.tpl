{if $type == 'link'}
    <p>
        <i class="fa-solid fa-envelope"></i>
        <a aria-details="contact link" class="{$class} mbtn" href="{$smarty.ENV.SITE_URL}{$smarty.ENV.URL_CONTACT}{if $interest}?interests={$interest}{/if}" title="Contact {$smarty.ENV.SITE_NAME} {if $service}interested in {$service} solution{/if}" data-meta-custom-event="ContactIntent" data-meta-label="contact link">{$buttonText}</a>
    </p>
{/if}

{if $type == 'button'}
    <a aria-details="contact button" class="{$class} mbtn btn btn-lg btn-outline-info" href="{$smarty.ENV.SITE_URL}{$smarty.ENV.URL_CONTACT}{if $interest}?interests={$interest}{/if}" title="Contact {$smarty.ENV.SITE_NAME} {if $service}interested in {$service}{/if}" data-meta-custom-event="ContactIntent" data-meta-label="contact button">
        <i class="fa-solid fa-envelope"></i>
        {$buttonText}
    </a>
{/if}

