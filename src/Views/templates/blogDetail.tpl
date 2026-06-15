{include file="inc/layout/header.tpl"}

<link rel="stylesheet" href="{$smarty.ENV.WEB_ROOT}css/blog.min.css" data-ajax-managed-stylesheet="true">

<div class="share-sidebar">
    <a href="#"><i class="bi bi-twitter-x"></i></a>
    <a href="#"><i class="bi bi-linkedin"></i></a>
    <a href="#"><i class="bi bi-facebook"></i></a>
</div>

<section class="bg-dark text-white py-5" style="background: linear-gradient(135deg, #020617 0%, #0f172a 55%, #f97316 100%);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <img src="{$smarty.ENV.WEB_ROOT}images/{$data.blogDetail->image}" class="img-fluid rounded-4 shadow-lg w-100 mb-4" alt="{$data.blogDetail->title}">
                <h1 class="display-4 fw-bold mb-4">{$data.blogDetail->title}</h1>
                <p class="lead mb-4">{$data.blogDetail->shortText}</p>
                {* Build Your Championship Foundation *}
                <a aria-describedby='{$data.blogDetail->title}' href="/contact" class="mbtn btn btn-warning btn-lg fw-semibold">Get Started Today</a>
            </div>
        </div>
    </div>
</section>

<article class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                {$data.blogDetail->content}
            </div>
        </div>
    </div>
</article>

{include file="inc/layout/footerContactForm.tpl"}
{include file="inc/layout/footer.tpl"}