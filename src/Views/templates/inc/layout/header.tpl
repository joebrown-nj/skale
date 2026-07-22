{if isset($header) && $header === 'false'}

{else}
    <!doctype html>
    <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>{if isset($page.content) && isset($page.content->metaTitle) && $page.content->metaTitle != ''}{$page.content->metaTitle} | {/if}{if isset($data.blogDetail->metaTitle) && $data.blogDetail->metaTitle != ''}{$data.blogDetail->metaTitle} | blog | {/if} {$smarty.ENV.SITE_NAME}</title>
            <meta name="description" content="{if isset($page.content) && isset($page.content->metaDescription)}{$page.content->metaDescription}{/if}{if isset($data.blogDetail->metaDescription)}{$data.blogDetail->metaDescription}{/if}">
            <meta name="keywords" content="{if isset($page.content) && isset($page.content->metaKeywords)}{$page.content->metaKeywords}{/if}{if isset($data.blogDetail->metaKeywords)}{$data.blogDetail->metaKeywords}{/if}">
            <meta name="author" content="{$smarty.ENV.SITE_NAME}">

            {* <link href="{$smarty.ENV.WEB_ROOT}css/bootstrap.min.css" rel="stylesheet"> *}
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

            <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
            <link href="{$smarty.ENV.WEB_ROOT}css/style.min.css" rel="stylesheet">
            <link href="{$smarty.ENV.WEB_ROOT}css/templates.min.css" rel="stylesheet">
            <link rel="canonical" href="{$smarty.ENV.SITE_URL}{if $p1}{$p1}/{/if}{if $p2}{$p2}/{/if}{if $p3}{$p3}/{/if}{if isset($smarty.get.interests)}?interests={$smarty.get.interests}{/if}" />

            <!-- Open Graph -->
            <meta property="og:title" content="{if isset($page.content) && isset($page.content->metaTitle) && $page.content->metaTitle != ''}{$page.content->metaTitle} | {/if}{if isset($data.blogDetail->metaTitle) && $data.blogDetail->metaTitle != ''}{$data.blogDetail->metaTitle} | blog | {/if}{$smarty.ENV.SITE_NAME}">
            <meta property="og:description" content="{if isset($page.content) && isset($page.content->metaDescription)}{$page.content->metaDescription}{/if}{if isset($data.blogDetail->metaDescription)}{$data.blogDetail->metaDescription}{/if}">
            <meta property="og:type" content="{if isset($p1) && $p1 == 'blog' && $p3}article{else}website{/if}">
            <meta property="og:URL" content="{$smarty.ENV.SITE_URL}{if $p1}{$p1}/{/if}{if $p2}{$p2}/{/if}{if $p3}{$p3}/{/if}{if isset($smarty.get.interests)}?interests={$smarty.get.interests}{/if}" />

            {* <script>let FF_FOUC_FIX;/*to prevent Firefox FOUC, this must be here*/</script> *}

            <!-- Meta Pixel Code -->
            <script>
                {literal}
                    !function(f,b,e,v,n,t,s)
                    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
                    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
                    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
                    n.queue=[];t=b.createElement(e);t.async=!0;
                    t.src=v;s=b.getElementsByTagName(e)[0];
                    s.parentNode.insertBefore(t,s)}(window, document,'script',
                    'https://connect.facebook.net/en_US/fbevents.js');
                    fbq('init', '341250316314045');
                {/literal}
            </script>

            <noscript>
                <img height="1" width="1" class="hidden-tracking-pixel" src="https://www.facebook.com/tr?id=341250316314045&ev=PageView&noscript=1"/>
            </noscript>
            <!-- End Meta Pixel Code -->

            <script async src="https://www.googletagmanager.com/gtag/js?id=G-5HMT5HBM1Y"></script>
            <script src="{$smarty.ENV.WEB_ROOT}js/google.min.js"></script>
        </head>

        <body
        data-route-path="{if $uri}/{$uri|escape:'html'}{else}/{/if}"
        data-page-type="{if $viewName == 'landing'}landing{elseif $viewName == 'home'}home{elseif $viewName == 'contact'}contact{elseif $viewName == 'portfolio'}portfolio{elseif $viewName == 'thankYou'}thank-you{elseif $p1 == 'blog' && $p2 && $p3}blog-article{elseif $p1 == 'blog'}blog{elseif $p1 == $smarty.ENV.URL_SERVICES_SOLUTIONS && $p2}service-detail{elseif $p1 == $smarty.ENV.URL_SERVICES_SOLUTIONS}service-list{elseif isset($page.content)}content{else}page{/if}"
        data-view-name="{$viewName|escape:'html'}"
        >

        <div id="overlay">
            <div class="cv-spinner">
                <span class="spinner">
                    <img class="skale-up" src="{$smarty.ENV.WEB_ROOT}images/circle-skale-up-logo.png" alt="{$smarty.ENV.SITE_NAME}">
                </span>
            </div>
        </div>

        {include file="inc/layout/nav.tpl"}

        <div class="page-content {if $p1 == ''}my-0{/if}">
        {/if}

        {if $p1 && $p1 != ''}
            {* <div data-aos="fade-up" class="page-title-block bg-light text-dark text-center">
            <div class="logo-bg logo-bg-overlay"></div>
            <h1 class="display-3 BricolageGrotesque-ExtraBold">
            {if $p1 == 'blog' && $p3 != '' && isset($data.blogDetail) && isset($data.blogDetail->title)}
            {$data.blogDetail->title}
            {/if}

            {if isset($page.content) && isset($page.content->title)}
            {$page.content->title}
            {/if}
            </h1>
            </div> *}

            {* {include file="inc/layout/breadcrumb.tpl"} *}
        {/if}
