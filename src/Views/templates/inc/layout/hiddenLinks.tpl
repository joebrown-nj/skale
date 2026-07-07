{foreach from=$hiddenLinks item=link}
    <a href="{$smarty.ENV.SITE_URL}{$link.url}" class="d-none">{$link.title}</a>
{/foreach}