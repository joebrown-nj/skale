<div class="position-sticky old-post-listing mb-4">
    <div class="card border-dark shadow-lg overflow-hidden">
        <div class="card-body">
            <h5 class="card-title">More Posts</h5>
        </div>

        <ul class="list-unstyled">
            {foreach from=$blogList key=key item=blog name=blogs}
                {if ($p2 != '' && $p2 != $blog->datePosted && $key < 5) || ($p2 == '' && $key > 5 && $key < 10)}
                <li>
                    <a href="{$smarty.ENV.SITE_URL}blog/{$blog->datePosted|date_format:"%Y-%m-%d"}/{$blog->url}"
                        class="mbtn d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center link-body-emphasis text-decoration-none border-top"
                        aria-label="blog more posts {$blog->title}"
                        >
                        <svg aria-hidden="true" class="bd-placeholder-img" height="96" preserveAspectRatio="xMidYMid slice" width="100%" xmlns="http://www.w3.org/2000/svg">
                            <rect width="100%" height="100%" fill="#777"></rect>
                            {if $blog->image != ''}
                                <image href="{$smarty.ENV.WEB_ROOT}images/{$blog->image}" height="96" width="100%" preserveAspectRatio="xMidYMid slice"></image>
                            {/if}
                        </svg>

                        <div class="col-lg-8">
                            <h6 class="mb-0">{$blog->title}</h6>
                            <small class="text-body-secondary">{$blog->datePosted|date_format:"%B %e, %Y"}</small>
                        </div>
                    </a>
                </li>
            {/if}
        {/foreach}
    </ul>

    <div class="card-footer text-body-secondary">
        <a href="{$smarty.ENV.SITE_URL}blog/archive"
        class="mbtn d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center link-body-emphasis text-decoration-none border-top"
        aria-label="blog archive"
    >Archive</a>
</div>
</div>
</div>


