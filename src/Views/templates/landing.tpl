{include file="inc/layout/header.tpl" hideBreadcrumb=true hideMenu=true}

<link rel="stylesheet" href="{$smarty.ENV.WEB_ROOT}css/landing.min.css" data-ajax-managed-stylesheet="true">

{include file="{$data.template}"}

<style>
    /*
    * Header
    */
    .landing-header {
    padding: 20px 0;
    border-bottom: 1px solid rgba(0, 0, 0, 0.07);
    }

    .brand {
    font-size: 1.8rem;
    line-height: 1;
    font-weight: 800;
    text-decoration: none;
    letter-spacing: -0.06em;
    }

    .header-phone {
    font-weight: 700;
    text-decoration: none;
    }
</style>

{include file="inc/layout/footer-landing.tpl" hideFooter=true}
