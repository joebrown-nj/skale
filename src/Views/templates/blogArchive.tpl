{include file="inc/layout/header.tpl"}

<div class="container-fluid home-callout parallax" style="min-height:auto; height:auto; background-color:#04010f; background-image: url('{$smarty.ENV.WEB_ROOT}images/circle-skale-up-logo-bg.png'); background-repeat: no-repeat; background-position: center;">
    <div data-aos="fade-up" class="row justify-content-center px-4 py-4">
        <h3 class="pb-4 mb-4 fst-italic border-bottom">Archive</h3>

        <div class="row g-4">
            {include file="inc/blog/pagination.tpl"}

            {foreach from=$data.blogList key=key item=blog name=blogs}
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        {if $blog->image != ''}
                            <img style="max-height:226px;" src="{$smarty.ENV.WEB_ROOT}images/{$blog->image}" class="card-img-top" alt="{$blog->title}">
                        {/if}

                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="{$smarty.ENV.SITE_URL}blog/{$blog->datePosted|date_format:"%Y-%m-%d"}/{$blog->url}" class="mbtn lbc" aria-describedby="blog {$blog->title}">
                                    {$blog->title}
                                </a>
                            </h5>

                            <p class="card-text">{$blog->shortText|strip_tags}</p>
                        </div>

                        <div class="card-footer text-body-secondary">
                            <div class="row">
                                <div class="col-md-4">
                                    <a href="{$smarty.ENV.SITE_URL}blog/{$blog->datePosted|date_format:"%Y-%m-%d"}/{$blog->url}" class="mbtn lbc btn btn-primary stretched-link" aria-describedby="blog {$blog->title}">Read More</a>
                                </div>

                                <div class="col-md-8 text-end">
                                    <small>{$blog->datePosted|date_format:"%B %e, %Y"}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {/foreach}

            {include file="inc/blog/pagination.tpl"}
        </div>
    </div>
</div>

{include file="inc/layout/footerContactForm.tpl"}
{include file="inc/layout/footer.tpl"}