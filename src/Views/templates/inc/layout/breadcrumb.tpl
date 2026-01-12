<nav aria-label="breadcrumb" class="py-3 text-bg-dark border-bottom" style="--bs-breadcrumb-divider: '>'; /*background-color:#07021a;*/">
    <ol class="breadcrumb mb-0 px-3">
        <li class="breadcrumb-item">
            <a href="{$smarty.ENV.SITE_URL}" aria-details="breadcrumb link home" class="mbtn lbc" ><i class="fa-solid fa-house"></i></a>
        </li>

        {if isset($pageContent.menuTitle)}
            <li class="breadcrumb-item active" aria-current="page">
                {if $p2 && isset($p1Content) && $p1Content != ''}
                    <a aria-details="breadcrumb link {$p1}" class="mbtn lbc" href="{$smarty.ENV.SITE_URL}{$p1Content.url}">{$p1Content.title}</a>
                {else}
                    {$pageContent.menuTitle}
                {/if}
            </li>

            {if $p2}
                <li class="breadcrumb-item active" aria-current="page">
                    {$pageContent.menuTitle}
                </li>
            {/if}
        {/if}
    </ol>
</nav>