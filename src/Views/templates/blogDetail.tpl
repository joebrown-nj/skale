{include file="inc/layout/header.tpl"}

<div data-aos="fade-up">
    {if $blog.image != ''}
        <div class="img">
            <img class="card-top" alt="{$blog.title}" src="{$smarty.ENV.WEB_ROOT}images/{$blog.image}">
        </div>
    {/if}

    <h3>
        <a aria-describedby="blog {$blog.title}" href="{$smarty.ENV.SITE_URL}blog/{$blog.datePosted|date_format:"%Y-%m-%d"}/{$blog.url}" class="mbtn lbc link-light link-underline-opacity-0">
            {$blog.title}
        </a>
    </h3>

    {$blog.text}
</div>

{include file="inc/layout/footerContactForm.tpl"}
{include file="inc/layout/footer.tpl"}