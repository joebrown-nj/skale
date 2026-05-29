{include file="inc/layout/header.tpl" hideBreadcrumb=true hideMenu=true}

<link rel="stylesheet" href="{$smarty.ENV.WEB_ROOT}css/landing.css">
<link rel="stylesheet" href="{$smarty.ENV.WEB_ROOT}css/headerFooterHide.css">

{if $p1 == 'website-development'}
    {include file="inc/landing-pages/website-development.tpl"}
{/if}

{if $p1 == 'marketing'}
    {include file="inc/landing-pages/marketing.tpl"}
{/if}

{if $p1 == 'automation'}
    {include file="inc/landing-pages/automation.tpl"}
{/if}

{* testing *}
{if isset($smarty.get.test)}
    {if $smarty.get.test == '1'}
        {include file="inc/landing-pages/test1.tpl"}
    {/if}

    {if $smarty.get.test == '2'}
        {include file="inc/landing-pages/test2.tpl"}
    {/if}
{/if}

{include file="inc/layout/footer.tpl" hideFooter=true}