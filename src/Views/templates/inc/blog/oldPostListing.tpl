<div class="position-sticky border rounded p-4 mb-4" style="top: 2rem;">
    {if $blogList}
        <div>
            <h4 class="fst-italic">Older Posts</h4>

            <ul class="list-unstyled">
                {foreach from=$blogList key=key item=blog name=blogs}
                    {if ($p2 != '' && $p2 != $blog.datePosted && $key < 5) || ($p2 == '' && $key > 5 && $key < 10)}
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
            </ul>
        </div>
    {/if}
</div>