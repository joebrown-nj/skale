{include file="inc/layout/header.tpl"}

<link rel="stylesheet" href="{$smarty.ENV.WEB_ROOT}css/blog.min.css" data-ajax-managed-stylesheet="true">

{* <div class="share-sidebar">
<a href="#"><i class="bi bi-twitter-x"></i></a>
<a href="#"><i class="bi bi-linkedin"></i></a>
<a href="#"><i class="bi bi-facebook"></i></a>
</div> *}

<section class="bg-dark text-white py-5" style="{$data.blogDetail->heroStyle}">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 py-4">
                <img src="{$smarty.ENV.WEB_ROOT}images/{$data.blogDetail->image}" class="img-fluid rounded-4 shadow-lg w-100 mb-4" alt="{$data.blogDetail->title}">
                <h1 class="display-4 fw-bold mb-4">{$data.blogDetail->title}</h1>
                <p class="lead mb-4">{$data.blogDetail->shortText}</p>
            </div>
        </div>
    </div>
</section>

<section class="article py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="article-content">
                    <p class="text-uppercase fw-semibold text-info mb-3">{$data.blogDetail->category}</p>
                    {$data.blogDetail->content}
                </div>
            </div>
        </div>
    </div>

    <div class="article-progress-wrapper">
        <div class="progress article-progress" role="progressbar" aria-label="Article reading progress" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar" id="article-progress-bar">0% completed</div>
        </div>
    </div>
</section>

{include file="inc/layout/footer.tpl"}
