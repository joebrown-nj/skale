<div data-aos="fade-up" class="container-fluid">
    <div class="row">
        {foreach from=$blogList key=key item=blog name=blogs key=key}
            {include file="inc/blog/blogListSingle.tpl" key=$key}
        {/foreach}
    </div>
</div>