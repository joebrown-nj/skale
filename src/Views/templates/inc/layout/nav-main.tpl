<header class="fixed-top clearfix menu-bar {if $p1 != '' && $viewName != 'landing'}menu-bar-bg{/if}">
    <nav class="navbar navbar-expand-lg sticky-top" aria-label="Main navigation">
        <div class="container">
            {include file="inc/layout/main-logo.tpl"}

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
                    {foreach from=$nav item=item key=key name=name}
                        <li class="{$item.url|replace:'/':'-'} nav-item {if $p1 == $item.url}active{/if} {if $item.children}dropdown{/if}">
                            <a {if $item.children}aria-expanded="false" data-bs-toggle="dropdown" role="button"{/if} class="{if !$item.children}mbtn{/if} {$item.class} {if $p1 == $item.url}active{/if}" href="{$smarty.ENV.SITE_URL}{$item.url}" aria-label="main nav {$item.title}" href="{$smarty.ENV.SITE_URL}{$item.url}">
                                {$item.title}
                            </a>

                            {if $item.children}
                                <ul class="dropdown-menu">
                                    {foreach $item.children item=child name=name1}
                                        <li><a aria-label="sub nav {$child.title}" class="mbtn dropdown-item" href="{$smarty.ENV.SITE_URL}{$child.url}"><i class="bi bi-{$child.icon} me-2"></i>{$child.title}</a></li>
                                    {/foreach}

                                    <li><hr class="dropdown-divider" /></li>
                                    <li><a class="dropdown-item" href="/solutions"><i class="bi bi-grid me-2"></i>View All Solutions</a></li>
                                </ul>
                            {/if}
                        </li>
                    {/foreach}
                </ul>
            </div>
        </div>
    </nav>
</header>
