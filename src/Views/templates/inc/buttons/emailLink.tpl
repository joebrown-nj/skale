{if $type == 'link'}
    <p>
        <i class="fa-solid fa-envelope"></i>
        <a class="{$class}" href="mailto:{$smarty.ENV.SITE_EMAIL}" title="Email {$smarty.ENV.SITE_NAME} {$smarty.ENV.SITE_EMAIL}" data-meta-event="Contact" data-meta-label="email link">{$smarty.ENV.SITE_EMAIL}</a>
    </p>
{/if}

{if $type == 'button'}
    <a class="{$class} btn btn-lg btn-outline-info" href="mailto:{$smarty.ENV.SITE_EMAIL}" title="Email {$smarty.ENV.SITE_NAME} {$smarty.ENV.SITE_EMAIL}" data-meta-event="Contact" data-meta-label="email button">
        <i class="fa-solid fa-envelope"></i>
        {$smarty.ENV.SITE_EMAIL}
    </a>
{/if}
