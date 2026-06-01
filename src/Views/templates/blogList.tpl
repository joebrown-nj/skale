{include file="inc/layout/header.tpl"}

{* <div class="container-fluid home-callout parallax" style="min-height:auto; height:auto; background-color:#04010f; background-image: url('{$smarty.ENV.WEB_ROOT}images/circle-skale-up-logo-bg.png'); background-repeat: no-repeat; background-position: center;">
    <div data-aos="fade-up" class="row justify-content-center px-4 py-4">
        {include file="inc/blog/blogListContainer.tpl" blogList=$data.blogList blogContent=$page.content blogFeatured=$data.blogFeatured}
    </div>
</div> *}

<link rel="stylesheet" href="{$smarty.ENV.WEB_ROOT}css/blog.css">

<section class="blog-hero py-5 bg-black">
    <div class="container">
        <div class="row align-items-center py-5">
            <div class="col-lg-7">
                <span class="badge bg-primary-subtle text-primary mb-3">Insights & Growth Strategies</span>
                <h1 class="display-4 fw-bold mb-3">The Skale Growth Journal</h1>
                <p class="lead text-secondary">Actionable insights on websites, automation, software, IT infrastructure, marketing, and business growth.</p>

                <div class="d-flex gap-2 flex-wrap mt-4">
                    <a href="{$smarty.ENV.SITE_URL}blog/archive" class="mbtn btn btn-primary rounded-pill px-4">Latest Articles</a>
                    {* <a href="#subscribe" class="btn btn-outline-light rounded-pill px-4">Subscribe</a> *}
                </div>
            </div>

            <div class="col-lg-5 text-center">
                <img src="{$smarty.ENV.WEB_ROOT}images/blog-hero.webp" class="img-fluid rounded-4 shadow-lg" alt="Skale Blog">
            </div>
        </div>
    </div>
</section>

{include file="inc/blog/blogListContainer.tpl" blogList=$data.blogList blogContent=$page.content blogFeatured=$data.blogFeatured limit=6 blogCategories=$data.blogCategories activeCategory=$data.activeCategory filterPath=$data.filterPath}

{include file="inc/layout/footerContactForm.tpl"}
{include file="inc/layout/footer.tpl"}
