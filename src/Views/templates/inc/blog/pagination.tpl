<nav aria-label="page navigation">
    <ul class="pagination justify-content-center">
        <li class="page-item">
            <a aria-details="blog archive pagination prev" class="mbtn page-link {if $data.currentPage - 1 == 0}disabled{/if}" {if $data.currentPage - 1 > 0}href="{$smarty.ENV.SITE_URL}{$p1}/{$p2}?page={$data.currentPage - 1}"{/if} aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>

        {foreach from=$data.pagesArray item=item name=name}
            <li class="page-item {if $item == $data.currentPage}active{/if}">
                <a aria-details="blog archive pagination page {$item}" class="mbtn page-link" href="{$smarty.ENV.SITE_URL}{$p1}/{$p2}?page={$item}">{$item}</a>
            </li>
        {/foreach}

        <li class="page-item">
            <a aria-details="blog archive pagination next" class="mbtn page-link {if $data.currentPage + 1 > $data.numberOfpages}disabled{/if}" {if $data.currentPage + 1 < $data.numberOfpages}href="{$smarty.ENV.SITE_URL}{$p1}/{$p2}?page={$data.currentPage + 1}"{/if} aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
</nav>

