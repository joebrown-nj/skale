</div>
<!-- end of page-content -->

{if (isset($footer) && $footer === 'false')}

{else}
    <footer class="section-space-sm">
        <div class="container">
            <div class="row g-4 align-items-start">
                <div class="col-lg-5">
                    <a class="footer-brand text-decoration-none" href="/">skale<span class="brand-dot">.</span></a>
                    <p class="mt-3 mb-4">Strategy, technology, and marketing systems built to help businesses work smarter and grow with confidence.</p>
                    <a aria-describedby="footer contact button" class="mbtn btn btn-outline-light" href="{$smarty.ENV.SITE_URL}{$smarty.ENV.URL_CONTACT}">Start a Conversation</a>
                </div>

                <div class="col-6 col-lg-2 ms-lg-auto">
                    <h2 class="h6 text-white">Solutions</h2>
                    <ul class="list-unstyled mb-0">
                        {foreach from=$serviceList key=key item=service}
                            <li class="mb-2">
                                <a class="mbtn {if isset($serviceDetail) && $serviceDetail->url == $service->url}active{/if}" aria-describedby="footer solutions {$service->title}" href="{$smarty.ENV.SITE_URL}{$service->url}">{$service->title}</a>
                            </li>
                        {/foreach}
                    </ul>
                </div>

                <div class="col-6 col-lg-2">
                    <h2 class="h6 text-white">Company</h2>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2">
                            <a href="{$smarty.ENV.SITE_URL}about" class="mbtn" aria-describedby="footer about">About</a>
                        </li>

                        <li class="mb-2">
                            <a href="{$smarty.ENV.SITE_URL}blog" class="mbtn" aria-describedby="footer blog">Insights</a>
                        </li>

                        <li class="mb-2">
                            <a href="{$smarty.ENV.SITE_URL}{$smarty.ENV.URL_CONTACT}" class="mbtn" aria-describedby="footer contact">Contact</a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-3">
                    <h2 class="h6 text-white">Contact</h2>
                    {if isset($smarty.ENV.SITE_PHONE) && $smarty.ENV.SITE_PHONE != ''}
                        <p class="mb-2">{include file="inc/buttons/phoneLink.tpl" type="link"}</p>
                    {/if}

                    <p class="mb-2">{include file="inc/buttons/emailLink.tpl" type="link"}</p>

                    <p class="mb-2">
                        <a aria-label="{$smarty.ENV.SITE_URL_DISPLAY} on Facebook" target="_blank" href="{$smarty.ENV.FACEBOOK_PAGE_URL}" class="me-4 text-reset"><i class="fab fa-facebook-f"></i></a>
                        <a aria-label="{$smarty.ENV.SITE_URL_DISPLAY} on LinkedIn" target="_blank" target="_blank" href="{$smarty.ENV.LINKEDIN_PAGE_URL}" class="me-4 text-reset"><i class="fab fa-linkedin"></i></a>
                    </p>

                    <p class="small mb-0">Serving growing businesses in New Jersey and across the United States.</p>
                </div>
            </div>

            <hr class="border-secondary my-4">

            <div class="d-flex flex-column flex-md-row justify-content-between gap-2 small">
                <span>&copy; {$smarty.now|date_format:"Y"} <a class="text-reset fw-bold mbtn" aria-describedby="" href="{$smarty.ENV.SITE_URL}">{$smarty.ENV.SITE_URL_DISPLAY}</a>. All rights reserved.</span>
                <span>
                    {foreach from=$footerNav item=item key=key name=name}
                        <a aria-describedby="footer nav {$item.title}" href="{$smarty.ENV.SITE_URL}{$item.url}" class="mbtn {if $p1 == $item.url}active{/if}">
                            {$item.title}
                        </a>
                        {if !$smarty.foreach.name.last}
                            &nbsp;
                        {/if}
                    {/foreach}
                </span>
            </div>
        </div>
    </footer>

    <!-- Mobile sticky CTA -->
    <div class="d-lg-none sticky-mobile-cta">
        <a aria-describedby="footer mobile contact button" class="mbtn btn btn-primary w-100" href="{$smarty.ENV.SITE_URL}{$smarty.ENV.URL_CONTACT}">Get Your Free Strategy Session</a>
    </div>

    <!-- Back to top button -->
    <button type="button" class="btn btn-danger btn-floating btn-lg" id="btn-back-to-top">
        <i class="fas fa-arrow-up"></i>
    </button>

    {include file="inc/layout/hiddenLinks.tpl"}

    {include file="inc/layout/scripts.tpl"}

</body>
</html>
{/if}
