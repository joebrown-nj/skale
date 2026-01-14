<main data-aos="fade-up" class="container-fluid">
    <div class="row mb-2">
        <div class="col-md-8">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                    <h3 class="mb-0">Featured post</h3>
                    <div class="mb-1 text-body-secondary">
                        {$blogFeatured.datePosted|date_format:"%B %e, %Y"}
                    </div>

                    <h3>
                        <a href="{$smarty.ENV.SITE_URL}blog/{$blogFeatured.datePosted|date_format:"%Y-%m-%d"}/{$blogFeatured.url}" class="mbtn lbc icon-link gap-1 icon-link-hover stretched-link" aria-describedby="blog {$blogFeatured.title}">
                            {$blogFeatured.title}
                        </a>
                    </h3>

                    {$blogFeatured.shortText}

                    <a href="{$smarty.ENV.SITE_URL}blog/{$blogFeatured.datePosted|date_format:"%Y-%m-%d"}/{$blogFeatured.url}" class="mbtn lbc icon-link gap-1 icon-link-hover stretched-link" aria-describedby="blog {$blogFeatured.title}">
                        Continue reading
                        <svg class="bi" aria-hidden="true">
                            <use xlink:href="#chevron-right"></use>
                        </svg>
                    </a>
                </div>

                <div class="col-auto d-none d-lg-block">
                    <svg aria-label="Placeholder: Thumbnail" class="bd-placeholder-img " height="100%" preserveAspectRatio="xMidYMid slice" role="img" width="200" xmlns="http://www.w3.org/2000/svg">
                        <title>{$blogFeatured.title}</title>
                        <rect width="100%" height="100%" fill="#55595c"></rect>
                        <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                    </svg>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="p-4 mb-3 bg-body-tertiary rounded">
                <h4 class="fst-italic">{$blogContent.title}</h4>
                <p>{$blogContent.content|strip_tags}</p>
            </div>
        </div>
    </div>

    <div class="row g-5">
        <div class="col-md-8">
            <h3 class="pb-4 mb-4 fst-italic border-bottom">Latest Posts</h3>

            <div class="row g-4">
                {foreach from=$blogList key=key item=blog name=blogs}
                    {if $key < 6}
                        <div class="col-md-6">
                            <div class="card">
                                {if $blog.image != ''}
                                    <img src="{$smarty.ENV.WEB_ROOT}images/{$blog.image}" class="card-img-top" alt="{$blog.title}">
                                {/if}

                                <div class="card-body">
                                    <h5 class="card-title">
                                        <a href="{$smarty.ENV.SITE_URL}blog/{$blog.datePosted|date_format:"%Y-%m-%d"}/{$blog.url}" class="mbtn lbc" aria-describedby="blog {$blog.title}">
                                            {$blog.title}
                                        </a>
                                    </h5>

                                    <p class="card-text">{$blog.shortText|strip_tags}</p>

                                    <a href="{$smarty.ENV.SITE_URL}blog/{$blog.datePosted|date_format:"%Y-%m-%d"}/{$blog.url}" class="mbtn lbc btn btn-primary stretched-link" aria-describedby="blog {$blog.title}">Read More</a>
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
</main>