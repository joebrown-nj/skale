<section class="cta-section py-5">
    <div class="row mb-5 align-items-center justify-content-center">
        <div class="col-md-6">
            {if isset($blogContent)}
                <h2 class="display-6 fw-bold text-white mb-4">{$blogContent->title}</h2>
                <p class="lead text-white-100 mb-4">{$blogContent->content|strip_tags}</p>
            {/if}
        </div>

        <div class="col-md-4">
            {if $blogFeatured}
                <div class="card border-dark shadow-lg mb-5 overflow-hidden" data-aos="fade-up">
                    <div class="row g-0">
                        <div class="col-md">
                            <img src="{$smarty.ENV.WEB_ROOT}images/{$blogFeatured->image}" alt="{$blogFeatured->title}" class="img-fluid">
                            <div class="card-body">
                                <h3 class="card-title px-0 mb-0 ubuntu-regular">{$blogFeatured->title}</h3>
                                <p>{$blogFeatured->shortText}</p>
                                <a aria-describedby="blog {$blogFeatured->title}" href="{$smarty.ENV.SITE_URL}blog/{$blogFeatured->datePosted|date_format:"%Y-%m-%d"}/{$blogFeatured->url}" class="stretched-link logo-bg-small mbtn btn btn-primary btn">Read more</a>
                            </div>
                        </div>
                    </div>
                </div>
            {/if}
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-md-8">
            {foreach from=$blogList key=key item=blog name=blogs}
                {if $key < 6}
                    <div class="card border-0 shadow-lg mb-5 overflow-hidden" data-aos="fade-up">
                        <div class="row g-0">
                            <div class="col-md-3">
                                <img src="{$smarty.ENV.WEB_ROOT}images/{$blog->image}" alt="{$blog->title}" class="img-fluid h-100 w-100">
                            </div>

                            <div class="col-md-9">
                                <div class="card-body">
                                    <h5 class="card-title px-0 mb-0 ubuntu-regular">{$blog->title}</h5>
                                    <p>{$blog->shortText}</p>
                                    <a aria-describedby="blog {$blog->title}" href="{$smarty.ENV.SITE_URL}blog/{$blog->datePosted|date_format:"%Y-%m-%d"}/{$blog->url}" class="stretched-link logo-bg-small mbtn btn btn-primary btn">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                {/if}
            {/foreach}
        </div>

        <div class="col-md-4">
            {include file="inc/blog/oldPostListing.tpl" blogList=$blogList}
        </div>
    </div>
</section>

{* <main class="container-fluid">
    <div class="row mb-2">
        <div class="col-md-4 shadow-lg">
            <div class="p-4 mb-3 bg-body-tertiary rounded">
                <h4 class="fst-italic">{$blogContent->title}</h4>
                <p>{$blogContent->content|strip_tags}</p>
            </div>
        </div>

        <div class="col-md-8 shadow-lg">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                    <h3 class="mb-0">Featured post</h3>
                    <div class="mb-1 text-body-secondary">
                        {$blogFeatured->datePosted|date_format:"%B %e, %Y"}
                    </div>

                    <h3>
                        <a href="{$smarty.ENV.SITE_URL}blog/{$blogFeatured->datePosted|date_format:"%Y-%m-%d"}/{$blogFeatured->url}" class="mbtn lbc icon-link gap-1 icon-link-hover stretched-link" aria-describedby="blog {$blogFeatured->title}">
                            {$blogFeatured->title}
                        </a>
                    </h3>

                    {$blogFeatured->shortText}

                    <a href="{$smarty.ENV.SITE_URL}blog/{$blogFeatured->datePosted|date_format:"%Y-%m-%d"}/{$blogFeatured->url}" class="mbtn lbc icon-link gap-1 icon-link-hover stretched-link" aria-describedby="blog {$blogFeatured->title}">
                        Continue reading
                        <svg class="bi" aria-hidden="true">
                            <use xlink:href="#chevron-right"></use>
                        </svg>
                    </a>
                </div>

                <div class="col-auto d-none d-lg-block">
                    <svg aria-label="Placeholder: Thumbnail" class="bd-placeholder-img " height="100%" role="img" width="200" xmlns="http://www.w3.org/2000/svg">
                        <title>{$blogFeatured->title}</title>
                        <rect width="100%" height="100%" fill="#55595c"></rect>
                        <text x="50%" y="50%" fill="#eceeef" dy=".3em">{$blogFeatured->title}</text>
                        {if $blogFeatured->image != ''}
                            <image x="-100%" href="{$smarty.ENV.WEB_ROOT}images/{$blogFeatured->image}" height="100%"></image>
                        {/if}
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-5">
        <div class="col-md-8">
            <h3 class="pb-4 mb-4 fst-italic border-bottom">Latest Posts</h3>

            <div class="row g-4">
                {foreach from=$blogList key=key item=blog name=blogs}
                    {if $key < 6}
                        <div class="col-md-6 shadow-lg" data-aos="fade-up">
                            <div class="card h-100 shadow-sm">
                                {if $blog->image != ''}
                                    <img style="max-height:226px;" src="{$smarty.ENV.WEB_ROOT}images/{$blog->image}" class="card-img-top" alt="{$blog->title}">
                                {/if}

                                <div class="card-body">
                                    <h5 class="card-title">
                                        <a href="{$smarty.ENV.SITE_URL}blog/{$blog->datePosted|date_format:"%Y-%m-%d"}/{$blog->url}" class="mbtn lbc" aria-describedby="blog {$blog->title}">
                                            {$blog->title}
                                        </a>
                                    </h5>

                                    <p class="card-text">{$blog->shortText|strip_tags}</p>
                                </div>

                                <div class="card-footer text-body-secondary">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <a href="{$smarty.ENV.SITE_URL}blog/{$blog->datePosted|date_format:"%Y-%m-%d"}/{$blog->url}" class="mbtn lbc btn btn-primary stretched-link" aria-describedby="blog {$blog->title}">Read More</a>
                                        </div>

                                        <div class="col-md-8 text-end">
                                            <small>{$blog->datePosted|date_format:"%B %e, %Y"}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    {/if}
                {/foreach}
            </div>
        </div>

        <div class="col-md-4">
            {include file="inc/blog/oldPostListing.tpl" blogList=$blogList}
        </div>
    </div>
</main> *}
