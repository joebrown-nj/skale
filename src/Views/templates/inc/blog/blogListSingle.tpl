<div data-aos="fade-up" class="card border-0 rounded-0">
    {if $blog.image != ''}
        <div class="img">
            <img class="card-top" alt="{$blog.title}" src="{$smarty.ENV.WEB_ROOT}images/{$blog.image}">
        </div>
    {/if}

    <h5 class="card-header px-3 pt-2 pb-3 mb-0 border-0" style="background-color: #171b1e;">
        <a aria-describedby="blog {$blog.title}" href="{$smarty.ENV.SITE_URL}blog/{$blog.datePosted}/{$blog.url}" class="mbtn lbc link-light link-underline-opacity-0">
            {$blog.title}
        </a>
    </h5>

    <div class="card-body">
        {$blog.shortText}
    </div>

    <div class="card-footer">
        <a aria-describedby="blog {$blog.title}" href="{$smarty.ENV.SITE_URL}blog/{$blog.datePosted}/{$blog.url}" class="logo-bg-small mbtn btn btn-primary btn-lg">Read More</a>
    </div>
</div>