{include file="inc/layout/header.tpl"}

<div class="container-fluid" style="min-height:auto; height:auto; background-color:#04010f; background-image: url('{$smarty.ENV.WEB_ROOT}images/circle-skale-up-logo-bg.png'); background-repeat: no-repeat; background-position: center;">
    <div data-aos="fade-up" class="row justify-content-center px-4 py-4">
        <div class="col-md-8">
            <article class="blog-post">
                <h2 class="display-5 link-body-emphasis mb-1">
                    <a aria-describedby="blog {$data.blogDetail->title}" href="{$smarty.ENV.SITE_URL}blog/{$data.blogDetail->datePosted|date_format:"%Y-%m-%d"}/{$data.blogDetail->url}" class="mbtn lbc link-light link-underline-opacity-0">
                        {$data.blogDetail->title}
                    </a>
                </h2>

                <p class="blog-post-meta">{$data.blogDetail->datePosted|date_format:"%B %e, %Y"}</p>

                {if $data.blogDetail->image != ''}
                    <div class="img mb-4 float-end">
                        <img class="card-top" alt="{$data.blogDetail->title}" src="{$smarty.ENV.WEB_ROOT}images/{$data.blogDetail->image}">
                    </div>

                    {* <figure>
                        <img src="{$smarty.ENV.WEB_ROOT}images/{$data.blogDetail->image}" alt="{$data.blogDetail->title}" loading="lazy" width="100%">
                    </figure> *}
                {/if}

                {$data.blogDetail->text}
            </article>
        </div>

        <div class="col-md-4">
            {include file="inc/blog/oldPostListing.tpl" blogList=$data.blogList}
        </div>
    </div>
</div>

{include file="inc/layout/footerContactForm.tpl"}
{include file="inc/layout/footer.tpl"}