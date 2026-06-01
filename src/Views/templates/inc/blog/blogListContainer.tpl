{if $blogFeatured}
    <section class="blog-featured py-5">
        <div class="container">
            <div class="glass-card">
                <div class="row g-0">
                    <div class="col-lg-6">
                        <img src="{$smarty.ENV.IMG_ROOT}{$blogFeatured->image}" class="img-fluid h-100 object-fit-cover" alt="">
                    </div>

                    <div class="col-lg-6">
                        <div class="card-body p-5">
                            <span class="badge bg-primary mb-3">Featured Article</span>
                            <h2 class="fw-bold mb-3">{$blogFeatured->title}</h2>
                            <p class="text-secondary mb-4">{$blogFeatured->shortText}</p>
                            <a class="mbtn btn btn-primary stretched-link"  aria-describedby="blog {$blogFeatured->title}" href="{$smarty.ENV.SITE_URL}blog/{$blogFeatured->datePosted|date_format:"%Y-%m-%d"}/{$blogFeatured->url}">Read Article</a>
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
                        <a href="{$filterPath}" class="mbtn btn btn-sm {if !$activeCategory}btn-primary{else}btn-outline-light{/if} rounded-pill" aria-describedby="All Blog Categories">All</a>
                        {foreach from=$blogCategories item=category}
                            <a href="{$filterPath}?category={$category|lower|escape:'url'}" class="mbtn btn btn-sm {if $activeCategory == $category}btn-primary{else}btn-outline-light{/if} rounded-pill" aria-describedby="Blog Category {$category}">{$category}</a>
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
                                <p class="text-secondary">{$blog->shortText}</p>
                            </div>

                            <div class="card-footer bg-transparent border-0 px-4 pb-4">
                                <a aria-describedby="blog {$blog->title}" href="{$smarty.ENV.SITE_URL}blog/{$blog->datePosted|date_format:"%Y-%m-%d"}/{$blog->url}" class="mbtn btn btn-link text-decoration-none p-0 stretched-link">Read More →</a>
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

        <div class="row">
            <div class="col-12 text-center">
                <a href="{$smarty.ENV.SITE_URL}blog/archive{if $activeCategory}?category={$activeCategory|escape:'url'}{/if}" class="mbtn btn btn-outline-light rounded-pill px-4" aria-describedby="View All Articles">
                    View All Articles
                </a>
            </div>
        </div>
    </div>
</section>


{* <section class="cta-section py-5">
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
                            <img src="{$smarty.ENV.IMG_ROOT}{$blogFeatured->image}" alt="{$blogFeatured->title}" class="img-fluid">
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
                                <img src="{$smarty.ENV.IMG_ROOT}{$blog->image}" alt="{$blog->title}" class="img-fluid h-100 w-100">
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
</section> *}
