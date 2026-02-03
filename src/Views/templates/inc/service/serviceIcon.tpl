{if $serviceDetail->iconType == 'bootstrap'}
    <svg class="bi text-body-secondary flex-shrink-0 me-3" width="1.75em" height="1.75em" >
        <use xlink:href="{$smarty.ENV.SITE_URL}images/bootstrap-icons.svg#{$serviceDetail->iconBootstrap}"></use>
    </svg>
{else if $serviceDetail->iconType == 'fontawesome'}
    <i class="{$serviceDetail->iconFontAwesome} bi text-body-secondary flex-shrink-0 me-1 mt-1" width="1.75em" height="1.75em"></i>
{else}
    <!-- Invalid icon type -->
{/if}