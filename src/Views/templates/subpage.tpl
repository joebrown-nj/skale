{include file="inc/layout/header.tpl"}

<link rel="stylesheet" href="{$smarty.ENV.WEB_ROOT}css/subpage.min.css" data-ajax-managed-stylesheet="true">

{if isset($page.content)}
    {$page.content->content}
{/if}

{include file="inc/layout/footer.tpl"}
