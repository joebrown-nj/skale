{include file="inc/layout/header.tpl"}

<link rel="stylesheet" href="{$smarty.ENV.WEB_ROOT}css/blog.min.css" data-ajax-managed-stylesheet="true">

<section class="blog-hero py-5 bg-black">
    <div class="container">
        <div class="row align-items-center py-5">
            <div class="col-lg-7">
                <span class="badge bg-primary-subtle text-primary mb-3">{$content.text_insights_growth_strategies}</span>
                <h1 class="display-4 fw-bold mb-3 text-white">{$content.text_the_skale_growth_journal}</h1>
                <p class="lead text-secondary">{$content.text_actionable_insights_on_websites_automation_software}</p>

                <div class="d-flex gap-2 flex-wrap mt-4">
                    <a href="{$smarty.ENV.SITE_URL}blog/archive" class="mbtn btn btn-primary rounded-pill px-4">{$content.text_latest_articles}</a>
                </div>
            </div>

            <div class="col-lg-5 text-center">
                <img src="{$smarty.ENV.WEB_ROOT}images/blog-hero.webp" class="img-fluid rounded-4 shadow-lg" alt="{$content.alt_skale_blog}">
            </div>
        </div>
    </div>
</section>

{include file="inc/blog/blog-list-container.tpl" blogList=$data.blogList blogContent=$page.content blogFeatured=$data.blogFeatured limit=6 blogCategories=$data.blogCategories activeCategory=$data.activeCategory filterPath=$data.filterPath}


{include file="inc/layout/footer.tpl"}


