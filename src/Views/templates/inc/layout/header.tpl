{if isset($header) && $header === 'false'}

{else}
    <!doctype html>
    <html lang="en" data-bs-theme="dark">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>{$smarty.ENV.SITE_NAME}{if isset($data.pageContent.pageContent->metaTitle) && $data.pageContent.pageContent->metaTitle != ''} | {$data.pageContent.pageContent->metaTitle}{/if}{if isset($data.blogDetail->metaTitle) && $data.blogDetail->metaTitle != ''} blog | {$data.blogDetail->metaTitle}{/if}</title>
            <meta name="description" content="{if isset($data.pageContent.pageContent->metaDescription)}{$data.pageContent.pageContent->metaDescription}{/if}{if isset($data.blogDetail->metaDescription)}{$data.blogDetail->metaDescription}{/if}">
            <meta name="keywords" content="{if isset($data.pageContent.pageContent->metaKeywords)}{$data.pageContent.pageContent->metaKeywords}{/if}{if isset($data.blogDetail->metaKeywords)}{$data.blogDetail->metaKeywords}{/if}">
            <meta name="author" content="{$smarty.ENV.SITE_NAME}">

            <!-- Google Tag Manager -->
            {literal}
                <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
                j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
                'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
                })(window,document,'script','dataLayer','GTM-MGKXRNV7');</script>
                <!-- End Google Tag Manager -->
            {/literal}

            <script src="{$smarty.ENV.WEB_ROOT}js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
            <link href="{$smarty.ENV.WEB_ROOT}css/bootstrap.min.css " rel="stylesheet">

            <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
            <link href="{$smarty.ENV.WEB_ROOT}css/style.min.css" rel="stylesheet">
            <link rel="canonical" href="{$smarty.ENV.SITE_URL}{if $p1}{$p1}/{/if}{if $p2}{$p2}/{/if}{if $p3}{$p3}/{/if}{if isset($smarty.get.interests)}?interests={$smarty.get.interests}{/if}" />

            <!-- Open Graph -->
            <meta property="og:title" content="{$smarty.ENV.SITE_NAME}{if isset($pageContent->metaTitle) && $pageContent->metaTitle != ''} | {$pageContent->metaTitle}{/if}{if isset($data.blogDetail->metaTitle) && $data.blogDetail->metaTitle != ''} blog | {$data.blogDetail->metaTitle}{/if}">
            <meta property="og:description" content="{if isset($pageContent->metaDescription)}{$pageContent->metaDescription}{/if}{if isset($data.blogDetail->metaDescription)}{$data.blogDetail->metaDescription}{/if}">
            <meta property="og:type" content="{if isset($p1) && $p1 == 'blog' && $p3}article{else}website{/if}">
            <meta property="og:URL" content="{$smarty.ENV.SITE_URL}{if $p1}{$p1}/{/if}{if $p2}{$p2}/{/if}{if $p3}{$p3}/{/if}{if isset($smarty.get.interests)}?interests={$smarty.get.interests}{/if}" />

            {* <script>let FF_FOUC_FIX;/*to prevent Firefox FOUC, this must be here*/</script> *}
        </head>

        <body class="bg-dark">
            <!-- Google Tag Manager (noscript) -->
            <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MGKXRNV7"
            height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
            <!-- End Google Tag Manager (noscript) -->

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

{if $p1 && $p1 != ''}
    <div data-aos="fade-up" class="page-title-block bg-light text-dark text-center" style="{if isset($data->pageContent.menu->headerImage)}background: url('{$smarty.ENV.WEB_ROOT}images/{$data->pageContent.menu->headerImage}') no-repeat center center; background-size: 100%;{/if}">
        <div class="logo-bg logo-bg-overlay"></div>
        <h1 class="display-3 BricolageGrotesque-ExtraBold">
            {if $p1 == 'blog' && $p3 != '' && isset($data.blogDetail) && isset({$data.blogDetail->title})}
                {$data.blogDetail->title}
            {/if}

            {if isset($data.pageContent) && isset({$data.pageContent.menu->title})}
                {$data.pageContent.menu->title}
            {/if}
        </h1>
    </div>

    {include file="inc/layout/breadcrumb.tpl"}
{/if}