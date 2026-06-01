{include file="inc/layout/header.tpl"}

<link rel="stylesheet" href="{$smarty.ENV.WEB_ROOT}css/blog.css">

{* <div class="container-fluid" style="min-height:auto; height:auto; background-color:#04010f; background-image: url('{$smarty.ENV.WEB_ROOT}images/circle-skale-up-logo-bg.png'); background-repeat: no-repeat; background-position: center;">
    <div data-aos="fade-up" class="row justify-content-center px-4 py-4">
        <div class="col-md-9">
            <article class="blog-post">
                <h2 class="display-5 link-body-emphasis mb-1">
                    <a aria-describedby="blog {$data.blogDetail->title}" href="{$smarty.ENV.SITE_URL}blog/{$data.blogDetail->datePosted|date_format:"%Y-%m-%d"}/{$data.blogDetail->url}" class="mbtn lbc link-light link-underline-opacity-0">
                        {$data.blogDetail->title}
                    </a>
                </h2>

                <p class="blog-post-meta">{$data.blogDetail->datePosted|date_format:"%B %e, %Y"}</p>

                {if $data.blogDetail->image != ''}
                    <div class="img mb-4 float-end">
                        <img class="ms-2" alt="{$data.blogDetail->title}" src="{$smarty.ENV.WEB_ROOT}images/{$data.blogDetail->image}">
                    </div>

                    <!-- <figure>
                        <img src="{$smarty.ENV.IMG_ROOT}{$data.blogDetail->image}" alt="{$data.blogDetail->title}" loading="lazy" width="100%">
                    </figure> -->
                {/if}

                {$data.blogDetail->content}
            </article>
        </div>

        <div class="col-md-3">
            {include file="inc/blog/oldPostListing.tpl" blogList=$data.blogList}
        </div>
    </div>
</div> *}

<div class="share-sidebar">
    <a href="#"><i class="bi bi-twitter-x"></i></a>
    <a href="#"><i class="bi bi-linkedin"></i></a>
    <a href="#"><i class="bi bi-facebook"></i></a>
</div>

<section class="article py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 mb-4">
                <img src="{$smarty.ENV.WEB_ROOT}images/{$data.blogDetail->image}" class="img-fluid rounded-4 shadow-lg w-100" alt="{$data.blogDetail->title}">
            </div>
        </div>
    
        <div class="row justify-content-center">
            <div class="col-xl-8">
                <div class="article-content">
                    <div class="mb-3">
                        <span class="badge bg-primary">{$data.blogDetail->category}</span>
                        <span class="text-secondary ms-2">{$data.blogDetail->datePosted|date_format:"%B %e, %Y"}</span>
                    </div>

                    <h1 class="display-4 fw-bold mb-4">{$data.blogDetail->title}</h1>

                    {$data.blogDetail->content}
                </div>

                <div class="article-progress-wrapper">
                    <div class="progress article-progress" role="progressbar" aria-label="Article reading progress" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                        <div id="article-progress-bar" class="progress-bar">0% completed</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="cta-section py-5 pb-0">
    <div class="bg-primary border-0 p-5 text-center">
        <h2 class="fw-bold mb-3">
            Ready to Scale Your Business?
        </h2>

        <p class="mb-4">
            Let's build smarter systems, better websites,and scalable growth strategies together.
        </p>

        <div class="d-flex justify-content-center gap-3">
            <a href="/contact" class="btn btn-light btn-lg">
                Book a Free Call
            </a>

            <a href="/solutions" class="btn btn-outline-light btn-lg">
                Explore Solutions
            </a>
        </div>
    </div>
</section>







{include file="inc/layout/footerContactForm.tpl"}
{include file="inc/layout/footer.tpl"}
