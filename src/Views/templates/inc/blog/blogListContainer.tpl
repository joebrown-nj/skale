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
</section>