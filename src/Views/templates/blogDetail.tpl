{include file="inc/layout/header.tpl"}

<div class="container-fluid" style="min-height:auto; height:auto; background-color:#04010f; background-image: url('{$smarty.ENV.WEB_ROOT}images/circle-skale-up-logo-bg.png'); background-repeat: no-repeat; background-position: center;">
    <div data-aos="fade-up" class="row justify-content-center px-4 py-4">
        <div class="col-md-8">
            <article class="blog-post">
                <h2 class="display-5 link-body-emphasis mb-1">
                    <a aria-describedby="blog {$data.blogDetail.title}" href="{$smarty.ENV.SITE_URL}blog/{$data.blogDetail.datePosted|date_format:"%Y-%m-%d"}/{$data.blogDetail.url}" class="mbtn lbc link-light link-underline-opacity-0">
                        {$data.blogDetail.title}
                    </a>
                </h2>

                <p class="blog-post-meta">{$data.blogDetail.datePosted|date_format:"%B %e, %Y"}</p>

                {if $data.blogDetail.image != ''}
                    <div class="img">
                        <img class="card-top" alt="{$data.blogDetail.title}" src="{$smarty.ENV.WEB_ROOT}images/{$data.blogDetail.image}">
                    </div>

                    <figure>
                        <img src="/images/skale-launch.jpg" alt="Skale digital solutions launch" loading="lazy" width="100%">
                    </figure>
                {/if}

                {* <h3>
                    <a aria-describedby="blog {$data.blogDetail.title}" href="{$smarty.ENV.SITE_URL}blog/{$data.blogDetail.datePosted|date_format:"%Y-%m-%d"}/{$data.blogDetail.url}" class="mbtn lbc link-light link-underline-opacity-0">
                        {$data.blogDetail.title}
                    </a>
                </h3> *}

                {$data.blogDetail.text}
            </article>
        </div>

        <div class="col-md-4">
            {include file="inc/blog/oldPostListing.tpl" blogList=$data.blogList}

            {* <h4 class="fst-italic">Older Posts</h4>

            <ul class="list-unstyled">
                {foreach from=$data.blogList key=key item=blog name=blogs}
                    {if $p2 != $blog.datePosted}
                        <li>
                            <a href="{$smarty.ENV.SITE_URL}blog/{$blog.datePosted|date_format:"%Y-%m-%d"}/{$blog.url}" class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top">
                                <svg aria-hidden="true" class="bd-placeholder-img " height="96" preserveAspectRatio="xMidYMid slice" width="100%" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="100%" height="100%" fill="#777"></rect>
                                </svg>

                                <div class="col-lg-8">
                                    <h6 class="mb-0">{$blog.title}</h6>
                                    <small class="text-body-secondary">{$blog.datePosted|date_format:"%B %e, %Y"}</small>
                                </div>
                            </a>
                        </li>
                    {/if}
                {/foreach}
            </ul> *}
        </div>
    </div>
</div>

{include file="inc/layout/footerContactForm.tpl"}
{include file="inc/layout/footer.tpl"}