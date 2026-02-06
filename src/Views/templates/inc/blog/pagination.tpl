<nav aria-label="page navigation">
    <ul class="pagination justify-content-center">
        <li class="page-item">
            <a aria-details="blog archive pagination prev" class="mbtn lbc page-link {if $data.currentPage - 1 == 0}disabled{/if}" href="{$smarty.ENV.SITE_URL}{$p1}/{$p2}?page={$data.currentPage - 1}" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>

        {foreach from=$data.pagesArray item=item name=name}
            <li class="page-item {if $item == $data.currentPage}active{/if}">
                <a aria-details="blog archive pagination page {$item}" class="mbtn lbc page-link" href="{$smarty.ENV.SITE_URL}{$p1}/{$p2}?page={$item}">{$item}</a>
            </li>
        {/foreach}

        <li class="page-item">
            <a aria-details="blog archive pagination next" class="mbtn lbc page-link {if $data.currentPage + 1 > $data.numberOfpages}disabled{/if}" href="{$smarty.ENV.SITE_URL}{$p1}/{$p2}?page={$data.currentPage + 1}" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
</nav>