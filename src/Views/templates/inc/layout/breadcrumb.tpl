<nav aria-label="breadcrumb" class="breadcrumb-container py-3 text-bg-dark border-bottom {if $hideBreadcrumb === true}d-none{/if}">
    <ol class="breadcrumb mb-0 px-3">
        <li class="breadcrumb-item">
            <a href="{$smarty.ENV.SITE_URL}" aria-details="breadcrumb link home" class="mbtn lbc" ><i class="fa-solid fa-house"></i></a>
        </li>

        {if isset($page.content) && isset($page.content->title)}
            <li class="breadcrumb-item active" aria-current="page">
                {if $p2 && isset($data.p1Page.menu) && $data.p1Page.menu != ''}
                    <a aria-details="breadcrumb link {$p1}" class="mbtn lbc" href="{$smarty.ENV.SITE_URL}{$data.p1Page.menu->url}">{$data.p1Page.menu->title}</a>
                {else}
                    {$page.content->title}
                {/if}
            </li>

            {if $p2}
                <li class="breadcrumb-item active" aria-current="page">
                    {$page.content->title}
                </li>
            {/if}
        {elseif $p1 == 'blog' && isset($data.blogDetail->title)}
            <li class="breadcrumb-item active" aria-current="page">
                <a aria-details="breadcrumb link {$p1}" class="mbtn lbc" href="{$smarty.ENV.SITE_URL}blog">Blog</a>
            </li>

            <li class="breadcrumb-item active" aria-current="page">
                {$data.blogDetail->title}
            </li>
        {/if}
    </ol>
</nav>
