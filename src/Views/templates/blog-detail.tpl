{include file="inc/layout/header.tpl"}

<link rel="stylesheet" href="{$smarty.ENV.WEB_ROOT}css/blog.min.css" data-ajax-managed-stylesheet="true">

<section class="bg-dark text-white py-5" style="{$data.blogDetail->heroStyle}">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-7" data-aos="fade-right">
                <span class="text-uppercase fw-semibold small text-success d-block mb-3">{$data.blogDetail->category}</span>
                <h1 class="display-4 fw-bold mb-4 text-light">{$data.blogDetail->title}</h1>
                <p class="lead text-secondary mb-4">{$data.blogDetail->shortText}</p>
            </div>

            <div class="col-lg-5" data-aos="fade-left" data-aos-delay="150">

                <img src="{$smarty.ENV.WEB_ROOT}images/{$data.blogDetail->image}" class="img-fluid rounded-4 shadow-sm" alt="{$data.blogDetail->title}">
            </div>
        </div>


    </div>
</section>

<section class="article py-5">


    {$data.blogDetail->content}


    <div class="article-progress-wrapper">
        <div class="progress article-progress" role="progressbar" aria-label="{$content.aria_label_article_reading_progress}" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar" id="article-progress-bar">{$content.text_completed}</div>
        </div>
    </div>
</section>

{include file="inc/layout/footer.tpl"}
