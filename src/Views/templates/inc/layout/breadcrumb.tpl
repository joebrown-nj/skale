<nav aria-label="breadcrumb" class="py-3 text-bg-dark border-bottom" style="--bs-breadcrumb-divider: '>'; /*background-color:#07021a;*/">
    <ol class="breadcrumb mb-0 px-3">
        <li class="breadcrumb-item">
            <a href="{$smarty.ENV.SITE_URL}" aria-details="breadcrumb link home" class="mbtn lbc" ><i class="fa-solid fa-house"></i></a>
        </li>

        {if isset($data.pageContent.menu->title)}
            <li class="breadcrumb-item active" aria-current="page">
                {if $p2 && isset($data.p1Content.menu) && $data.p1Content.menu != ''}
                    <a aria-details="breadcrumb link {$p1}" class="mbtn lbc" href="{$smarty.ENV.SITE_URL}{$data.p1Content.menu->url}">{$data.p1Content.menu->title}</a>
                {else}
                    {$data.pageContent.menu->title}
                {/if}
            </li>

            {if $p2}
                <li class="breadcrumb-item active" aria-current="page">
                    {$data.pageContent.menu->title}
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