{if isset($header) && $header === 'false'}

{else}
    <!doctype html>
    <html lang="en" data-bs-theme="dark">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>{$smarty.ENV.SITE_NAME}{if isset($pageContent.metaTitle) && $pageContent.metaTitle != ''} | {$pageContent.metaTitle}{/if}{if isset($data.blogDetail.metaTitle) && $data.blogDetail.metaTitle != ''} blog | {$data.blogDetail.metaTitle}{/if}</title>
            <meta name="description" content="{if isset($pageContent.metaDescription)}{$pageContent.metaDescription}{/if}{if isset($data.blogDetail.metaDescription)}{$data.blogDetail.metaDescription}{/if}">
            <meta name="keywords" content="{if isset($pageContent.metaKeywords)}{$pageContent.metaKeywords}{/if}{if isset($data.blogDetail.metaKeywords)}{$data.blogDetail.metaKeywords}{/if}">
            <meta name="author" content="{$smarty.ENV.SITE_NAME}">

            {* <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
            <link href=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css " rel="stylesheet"> *}
            <script src="{$smarty.ENV.WEB_ROOT}js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
            <link href=" {$smarty.ENV.WEB_ROOT}css/bootstrap.min.css " rel="stylesheet">

            <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
            {* <link href="{$smarty.ENV.WEB_ROOT}css/font-awesome.all.min.css" rel="stylesheet"> *}
            <link href="{$smarty.ENV.WEB_ROOT}css/style.min.css" rel="stylesheet">
            {* <link href="{$smarty.ENV.WEB_ROOT}css/style.css?{$smarty.now}" rel="stylesheet"> *}
            <link rel="canonical" href="{$smarty.ENV.SITE_URL}{if $p1}{$p1}/{/if}{if $p2}{$p2}/{/if}{if isset($smarty.get.interests)}?interests={$smarty.get.interests}{/if}" />

            <!-- Meta Pixel Code -->
            {literal}
                <!-- <script>
                    !function(f,b,e,v,n,t,s)
                        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
                        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
                        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
                        n.queue=[];t=b.createElement(e);t.async=!0;
                        t.src=v;s=b.getElementsByTagName(e)[0];
                        s.parentNode.insertBefore(t,s)}(window, document,'script',
                            'https://connect.facebook.net/en_US/fbevents.js');
                        fbq('init', '1637675473876321');
                        fbq('track', 'PageView');
                </script>
                <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=1637675473876321&ev=PageView&noscript=1"/></noscript> -->
            {/literal}
            <!-- End Meta Pixel Code -->

            <!-- Open Graph -->
            <meta property="og:title" content="{$smarty.ENV.SITE_NAME}{if isset($pageContent.metaTitle) && $pageContent.metaTitle != ''} | {$pageContent.metaTitle}{/if}{if isset($data.blogDetail.metaTitle) && $data.blogDetail.metaTitle != ''} | {$data.blogDetail.metaTitle}{/if}">
            <meta property="og:description" content="{if isset($pageContent.metaDescription)}{$pageContent.metaDescription}{/if}{if isset($data.blogDetail.metaDescription)}{$data.blogDetail.metaDescription}{/if}">
            <meta property="og:type" content="{if isset($smarty.get.p1) && $smarty.get.p1 == 'blog'}article{else}website{/if}">
            <meta property="og:URL" content="{$smarty.ENV.SITE_URL}{if $p1}{$p1}/{/if}{if $p2}{$p2}/{/if}{if $p3}{$p3}/{/if}{if isset($smarty.get.interests)}?interests={$smarty.get.interests}{/if}" />
        </head>

        <body class="bg-dark">
            <div id="overlay">
                <div class="cv-spinner">
                    <span class="spinner">
                        <img class="skale-up" src="{$smarty.ENV.WEB_ROOT}images/circle-skale-up-logo.png" alt="{$SITE_NAME}">
                    </span>
                </div>
            </div>

            {include file="inc/layout/nav.tpl"}

            <div class="page-content">
{/if}

{if $p1 && $p1 != '' && isset($pageContent) && isset({$pageContent.menuTitle})}
    <div data-aos="fade-up" class="page-title-block bg-light text-dark text-center" style="{if isset($data.headerImage)}background: url('{$smarty.ENV.WEB_ROOT}images/{$data.headerImage}') no-repeat center center; background-size: 100%;{/if}">
        <div class="logo-bg logo-bg-overlay"></div>
        <h1 class="display-1 BricolageGrotesque-ExtraBold">{$pageContent.menuTitle}</h1>
    </div>

    {include file="inc/layout/breadcrumb.tpl"}
{/if}

{if $p1 == 'blog' && $p2}
    <div data-aos="fade-up" class="page-title-block bg-light text-dark text-center">
        <div class="logo-bg logo-bg-overlay"></div>
        <h1 class="display-1 BricolageGrotesque-ExtraBold">{$data.blogDetail.title}</h1>
    </div>

    {include file="inc/layout/breadcrumb.tpl"}
{/if}