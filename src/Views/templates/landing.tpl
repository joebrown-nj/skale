{include file="inc/layout/header.tpl" hideBreadcrumb=true hideMenu=true}

<link rel="stylesheet" href="{$smarty.ENV.WEB_ROOT}css/landing.min.css" data-ajax-managed-stylesheet="true">
{* <link rel="stylesheet" href="{$smarty.ENV.WEB_ROOT}css/headerFooterHide.min.css" data-ajax-managed-stylesheet="true"> *}

{* {include file="inc/landing-pages/inc/header.tpl"} *}

{include file="{$data.template}"}
{include file="inc/layout/footer.tpl" hideFooter=true}
