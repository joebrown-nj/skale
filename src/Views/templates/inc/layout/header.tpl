{if isset($header) && $header === 'false'}

{else}
    <!doctype html>
    <html lang="en" data-bs-theme="dark">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>{$smarty.ENV.SITE_NAME}{if isset($page.content) && isset($page.content->metaTitle) && $page.content->metaTitle != ''} | {$page.content->metaTitle}{/if}{if isset($data.blogDetail->metaTitle) && $data.blogDetail->metaTitle != ''} blog | {$data.blogDetail->metaTitle}{/if}</title>
            <meta name="description" content="{if isset($page.content) && isset($page.content->metaDescription)}{$page.content->metaDescription}{/if}{if isset($data.blogDetail->metaDescription)}{$data.blogDetail->metaDescription}{/if}">
            <meta name="keywords" content="{if isset($page.content) && isset($page.content->metaKeywords)}{$page.content->metaKeywords}{/if}{if isset($data.blogDetail->metaKeywords)}{$data.blogDetail->metaKeywords}{/if}">
            <meta name="author" content="{$smarty.ENV.SITE_NAME}">

            <link href="{$smarty.ENV.WEB_ROOT}css/bootstrap.min.css" rel="stylesheet">

            <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
            <link href="{$smarty.ENV.WEB_ROOT}css/style.min.css" rel="stylesheet">
            <link rel="canonical" href="{$smarty.ENV.SITE_URL}{if $p1}{$p1}/{/if}{if $p2}{$p2}/{/if}{if $p3}{$p3}/{/if}{if isset($smarty.get.interests)}?interests={$smarty.get.interests}{/if}" />

            <!-- Open Graph -->
            <meta property="og:title" content="{if isset($page.content) && isset($page.content->metaTitle) && $page.content->metaTitle != ''}{$page.content->metaTitle} | {/if}{if isset($data.blogDetail->metaTitle) && $data.blogDetail->metaTitle != ''}{$data.blogDetail->metaTitle} | blog | {/if}{$smarty.ENV.SITE_NAME}">
            <meta property="og:description" content="{if isset($page.content) && isset($page.content->metaDescription)}{$page.content->metaDescription}{/if}{if isset($data.blogDetail->metaDescription)}{$data.blogDetail->metaDescription}{/if}">
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
                        <img class="skale-up" src="{$smarty.ENV.WEB_ROOT}images/circle-skale-up-logo.png" alt="{$smarty.ENV.SITE_NAME}">
                    </span>
                </div>
            </div>

            {include file="inc/layout/nav.tpl"}

            <div class="page-content">
{/if}

{if $p1 && $p1 != ''}
    <div data-aos="fade-up" class="page-title-block bg-light text-dark text-center">
        <div class="logo-bg logo-bg-overlay"></div>
        <h1 class="display-3 BricolageGrotesque-ExtraBold">
            {if $p1 == 'blog' && $p3 != '' && isset($data.blogDetail) && isset($data.blogDetail->title)}
                {$data.blogDetail->title}
            {/if}

            {if isset($page.content) && isset($page.content->title)}
                {$page.content->title}
            {/if}
        </h1>
    </div>

    {include file="inc/layout/breadcrumb.tpl"}
{/if}
