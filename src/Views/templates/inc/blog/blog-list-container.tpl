{if $blogFeatured}
    <section class="blog-featured py-5">
        <div class="container">
            <div class="blog-card glass-card p-0 overflow-hidden" data-aos="fade-up">
                <div class="row g-0">
                    <div class="col-lg-5">
                        <img src="{$smarty.ENV.IMG_ROOT}{$blogFeatured->image}" class="blog-image img-fluid w-100 object-fit-cover" alt="">
                    </div>

                    <div class="col-lg-7">
                        <div class="card-body p-4">
                            <span class="badge bg-primary mb-2">Featured Article</span>
                            <h3 class="fw-bold mb-2 text-white">{$blogFeatured->title}</h3>
                            <p class="text-white mb-2">{$blogFeatured->shortText}</p>
                            <a class="mbtn btn btn-primary stretched-link mb-0 px-3 py-2" aria-label="blog {$blogFeatured->title}" href="{$smarty.ENV.SITE_URL}blog/{$blogFeatured->datePosted|date_format:"%Y-%m-%d"}/{$blogFeatured->url}">Read Article</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
{/if}

<section class="blog-list py-5">
    <div class="container">
        {if $blogCategories}
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex flex-wrap gap-2">
                        <a href="{$filterPath}" class="mbtn btn btn-sm {if !$activeCategory}btn-primary{else}btn-outline-light{/if} rounded-pill" aria-label="All Blog Categories">All</a>
                        {foreach from=$blogCategories item=category}
                            <a href="{$filterPath}?category={$category|lower|escape:'url'}" class="mbtn btn btn-sm {if $activeCategory == $category}btn-primary{else}btn-outline-dark{/if} rounded-pill text-dark" aria-label="Blog Category {$category}">{$category}</a>
                        {/foreach}
                    </div>
                </div>
            </div>
        {/if}

        <div class="row py-5">
            {foreach from=$blogList key=key item=blog name=blogs}
                {if ($limit > 0 && $key < $limit) || $limit == 0}
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="{$key*100}">
                    <article class="card blog-card h-100 border-0 bg-dark-subtle rounded-4 overflow-hidden">
                        <div class="overflow-hidden">
                            <img src="{$smarty.ENV.IMG_ROOT}{$blog->image}" class="card-img-top blog-image" alt="{$blog->title}">
                        </div>

                        <div class="card-body p-4">
                            <div class="d-flex gap-2 mb-3">
                                <span class="badge text-bg-primary">{$blog->category}</span>
                                <small class="text-secondary">{$blog->datePosted|date_format:"%B %e, %Y"}</small>
                            </div>

                            <h3 class="h5 fw-bold mb-3">{$blog->title}</h3>
                            <p class="text-secondary">{$blog->shortText|truncate:200:"..."}</p>
                        </div>

                        <div class="card-footer bg-transparent border-0 px-4 pb-4">
                            <a aria-label="blog {$blog->title}" href="{$smarty.ENV.SITE_URL}blog/{$blog->datePosted|date_format:"%Y-%m-%d"}/{$blog->url}" class="mbtn btn btn-link text-decoration-none p-0 stretched-link">Read More →</a>
                        </div>
                    </article>
                </div>
            {/if}
        {foreachelse}
            <div class="col-12">
                <p class="text-center text-secondary mb-0">No blog posts found for this category.</p>
            </div>
        {/foreach}
    </div>

    {if $p2 == 'archive'}
        {include file="inc/blog/pagination.tpl"}
    {/if}

    {if $p2 !== 'archive'}
        <div class="row">
            <div class="col-12 text-center">
                <a href="{$smarty.ENV.SITE_URL}blog/archive" class="mbtn btn btn-outline-light text-secondary rounded-pill px-4" aria-label="View All Articles">
                    View All Insights
                </a>
            </div>
        </div>
    {/if}
</div>
</section>
