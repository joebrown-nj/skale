{* <nav class="navbar navbar-expand-lg sticky-top fixed-top" aria-label="Main navigation">
<div class="container">
<a class="navbar-brand" href="/">skale<span>.</span></a>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="mainNav">
<ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
<li class="nav-item"><a class="nav-link" href="/solutions">Solutions</a></li>
<li class="nav-item"><a class="nav-link" href="/about">About</a></li>
<li class="nav-item"><a class="nav-link" href="/blog">Insights</a></li>
<li class="nav-item ms-lg-2"><a class="btn btn-primary" href="#consultation">Book a Free Consultation</a></li>
</ul>
</div>
</div>
</nav> *}


<!-- Replace this navigation with your existing site header if needed. -->
<header class="fixed-top clearfix menu-bar {if $p1 != ''}menu-bar-bg{/if}">
    <nav class="navbar navbar-expand-lg sticky-top" aria-label="Main navigation">
        <div class="container">
            {* <a class="navbar-brand" href="/">skale<span>.</span></a> *}
            {include file="inc/layout/mainLogo.tpl"}

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
                    {foreach from=$nav item=item key=key name=name}
                        <li class="{$item.url|replace:'/':'-'} nav-item {if $p1 == $item.url}active{/if} {if $item.children}dropdown{/if}">
                            <a aria-describedby="main nav {$item.title}" href="{$smarty.ENV.SITE_URL}{$item.url}" class="mbtn {$item.class} {if $p1 == $item.url}active{/if}">
                                {$item.title}
                            </a>
                        </li>
                    {/foreach}

                    <li class="nav-item">
                        <a aria-describedby="main nav Book a Free Consultation" class="mbtn btn btn-primary {if $p1 == $item.url}active{/if}" href="{$smarty.ENV.SITE_URL}{$smarty.ENV.URL_CONTACT}">
                            Book a Free Consultation
                        </a>
                    </li>

                    {* <li class="nav-item"><a class="nav-link" href="/solutions">Solutions</a></li>
                    <li class="nav-item"><a class="nav-link" href="/about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="/blog">Insights</a></li>
                    <li class="nav-item ms-lg-2"><a class="btn btn-primary" href="#consultation">Book a Free Consultation</a></li> *}
                </ul>
            </div>
        </div>
    </nav>
</header>

{* <header class="fixed-top clearfix menu-bar {if $p1 != ''}menu-bar-bg{/if}">
<nav class="navbar navbar-expand clearfix align-self-center">
<div class="container">
{include file="inc/layout/mainLogo.tpl"}

<ul class="navbar-nav ms-auto">
<li class="nav-item">
<a class="btn btn-primary" href="#consultation">Book a Free Consultation</a>
</li>

<li class="ms-lg-2">
<button class="d-block h-100 navbar-toggler" data-bs-toggle="offcanvas" href="#oCNav" role="button" aria-controls="oCNav" aria-label="Menu">
<span class="navbar-toggler-icon"></span>
</button>
</li>
</ul>
</div>
</nav>
</header>

<div class="offcanvas offcanvas-end" tabindex="-1" id="oCNav" aria-labelledby="oCNavLabel" data-bs-scroll="true">
<div class="offcanvas-header py-2">
{include file="inc/layout/mainLogo.tpl"}
<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
</div>

<div class="offcanvas-body py-2">
<ul class="navbar-nav ms-auto">
{foreach from=$nav item=item key=key name=name}
<li class="{$item.url|replace:'/':'-'} nav-item {if $p1 == $item.url}active{/if} {if $item.children}dropdown{/if}">
<a aria-describedby="main nav {$item.title}" href="{$smarty.ENV.SITE_URL}{$item.url}" class="mbtn {$item.class} {if $p1 == $item.url}active{/if}">
{$item.title}
</a>

{if $item.children}
<ul>
{foreach $item.children item=child name=name1}
<li class="{$child.url|replace:'/':'-'}">
<a aria-describedby="sub nav {$child.title}" class="pb-1 pt-0 fs-6 mbtn dropdown-item {$child.class} {if $p2 == $child.url}active{/if}" href="{$smarty.ENV.SITE_URL}{$child.url}">
{$child.title}
</a>
</li>
{/foreach}
</ul>
{/if}
</li>
{/foreach}
</ul>
</div>
</div> *}
