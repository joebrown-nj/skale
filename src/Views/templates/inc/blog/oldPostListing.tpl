<div class="position-sticky border rounded p-4 mb-4" style="top: 2rem;">
    {* <div class="p-4 mb-3 bg-body-tertiary rounded">
        <h4 class="fst-italic">{$blogContent.title}</h4>
        <p>{$blogContent.content|strip_tags}</p>
    </div> *}

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
            {* <li>
                <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top" href="#">
                    <svg aria-hidden="true" class="bd-placeholder-img " height="96" preserveAspectRatio="xMidYMid slice" width="100%" xmlns="http://www.w3.org/2000/svg">
                        <rect width="100%" height="100%" fill="#777"></rect>
                    </svg>
                    <div class="col-lg-8">
                        <h6 class="mb-0">Example blog post title</h6>
                        <small class="text-body-secondary">January 15, 2024</small> 
                    </div>
                </a>
            </li>
            <li>
                <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top" href="#">
                    <svg aria-hidden="true" class="bd-placeholder-img " height="96" preserveAspectRatio="xMidYMid slice" width="100%" xmlns="http://www.w3.org/2000/svg">
                        <rect width="100%" height="100%" fill="#777"></rect>
                    </svg>
                    <div class="col-lg-8">
                        <h6 class="mb-0">This is another blog post title</h6>
                        <small class="text-body-secondary">January 14, 2024</small> 
                    </div>
                </a>
            </li>
            <li>
                <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top" href="#">
                    <svg aria-hidden="true" class="bd-placeholder-img " height="96" preserveAspectRatio="xMidYMid slice" width="100%" xmlns="http://www.w3.org/2000/svg">
                        <rect width="100%" height="100%" fill="#777"></rect>
                    </svg>
                    <div class="col-lg-8">
                        <h6 class="mb-0">Longer blog post title: This one has multiple lines!</h6>
                        <small class="text-body-secondary">January 13, 2024</small> 
                    </div>
                </a>
            </li> *}
        </ul>
    </div>

    {* <div class="p-4">
        <h4 class="fst-italic">Archives</h4>
        <ol class="list-unstyled mb-0">
            <li><a href="#">March 2021</a></li>
            <li><a href="#">February 2021</a></li>
            <li><a href="#">January 2021</a></li>
            <li><a href="#">December 2020</a></li>
            <li><a href="#">November 2020</a></li>
            <li><a href="#">October 2020</a></li>
            <li><a href="#">September 2020</a></li>
            <li><a href="#">August 2020</a></li>
            <li><a href="#">July 2020</a></li>
            <li><a href="#">June 2020</a></li>
            <li><a href="#">May 2020</a></li>
            <li><a href="#">April 2020</a></li>
        </ol>
    </div> *}

    {* <div class="p-4">
        <h4 class="fst-italic">Elsewhere</h4>
        <ol class="list-unstyled">
            <li><a href="#">GitHub</a></li>
            <li><a href="#">Social</a></li>
            <li><a href="#">Facebook</a></li>
        </ol>
    </div> *}
</div>