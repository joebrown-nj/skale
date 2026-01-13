{include file="inc/layout/header.tpl"}

{* <div data-aos="fade-up" class="container-fluid">
    <div class="row justify-content-center align-items-center border-bottom py-4 text-bg-dark">
        <div class="col-md-7">
            <h2 class="display-4 fw-bold Bahnschrift logo-bg-small">{$pageContent.title}</h2>
            {$pageContent.content}
        </div>
    </div>
</div> *}

<div class="container-fluid home-callout parallax" style="min-height:auto; height:auto; background-color:#04010f; background-image: url('{$smarty.ENV.WEB_ROOT}images/circle-skale-up-logo-bg.png'); background-repeat: no-repeat; background-position: center;">
    <div data-aos="fade-up" class="row justify-content-center px-4 py-4">
        {include file="inc/blog/blogListContainer.tpl" blogList=$data.blogList blogContent=$data.blogContent blogFeatured=$data.blogFeatured}
    </div>
</div>

{include file="inc/layout/footerContactForm.tpl"}
{include file="inc/layout/footer.tpl"}