<div class="offcanvas offcanvas-end" tabindex="-1" id="oCNav" aria-labelledby="oCNavLabel" data-bs-scroll="true">
    <div class="offcanvas-header py-2">
        {include file="inc/layout/mainLogo.tpl"}
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div class="offcanvas-body py-2">
        <ul class="navbar-nav ms-auto">
            {foreach from=$nav item=item key=key name=name}
                <li class="{$item.url|replace:'/':'-'} nav-item {if $p1 == $item.url}active{/if} {if $item.children}dropdown{/if}">
                    <a 
                        aria-describedby="main nav {$item.title}"
                        href="{$smarty.ENV.SITE_URL}{$item.url}"
                        class="mbtn lbc {$item.class} {if $p1 == $item.url}active{/if}" 
                    >
                        {$item.title}
                    </a>

                    {if $item.children}
                        <ul>
                            {foreach $item.children item=child name=name1}
                                <li class="{$child.url|replace:'/':'-'}">
                                    <a 
                                        aria-describedby="sub nav {$child.title}"
                                        class="pb-1 pt-0 fs-6 mbtn lbc dropdown-item {$child.class} {if $p2 == $child.url}active{/if}" 
                                        href="{$smarty.ENV.SITE_URL}{$child.url}"
                                    >
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
</div>

<header class="fixed-top clearfix menu-bar {if $p1 != ''}menu-bar-bg{/if}">
    <nav class="navbar navbar-expand clearfix py-2 px-4  align-self-center">
        {include file="inc/layout/mainLogo.tpl"}

        <ul class="navbar-nav ms-auto">
            <li>
                <button style="display:block; height:100%;" class="btn-lg navbar-toggler" data-bs-toggle="offcanvas" href="#oCNav" role="button" aria-controls="oCNav" aria-label="Menu">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </li>
        </ul>
    </nav>
</header>