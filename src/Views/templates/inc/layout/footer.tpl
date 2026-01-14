</div>

{if (isset($footer) && $footer === 'false')}

{else}
    <footer class="logo-bg text-center text-lg-start bg-body-tertiary text-muted">
        <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom" style="background-color: rgba(0, 0, 0, 0.05);">
            <div class="me-5 d-none d-lg-block">
                <span>Get connected:</span>
            </div>

            <div>
                {if isset($smarty.ENV.FACEBOOK_PAGE_URL) && $smarty.ENV.FACEBOOK_PAGE_URL != ''}
                    <a aria-label="{$smarty.ENV.SITE_URL_DISPLAY} on Facebook" target="_blank" href="{$smarty.ENV.FACEBOOK_PAGE_URL}" class="me-4 text-reset"><i class="fab fa-facebook-f"></i></a>
                {/if}

                {if isset($smarty.ENV.TWITTER_PAGE_URL) && $smarty.ENV.TWITTER_PAGE_URL != ''}
                    <a target="_blank" href="{$smarty.ENV.TWITTER_PAGE_URL}" class="me-4 text-reset"><i class="fab fa-twitter"></i></a>
                {/if}

                {if isset($smarty.ENV.GOOGLE_PAGE_URL) && $smarty.ENV.GOOGLE_PAGE_URL != ''}
                    <a target="_blank" href="{$smarty.ENV.GOOGLE_PAGE_URL}" class="me-4 text-reset"><i class="fab fa-google"></i></a>
                {/if}

                {if isset($smarty.ENV.INSTAGRAM_PAGE_URL) && $smarty.ENV.INSTAGRAM_PAGE_URL != ''}
                    <a target="_blank" href="{$smarty.ENV.INSTAGRAM_PAGE_URL}" class="me-4 text-reset"><i class="fab fa-instagram"></i></a>
                {/if}

                {if isset($smarty.ENV.LINKEDIN_PAGE_URL) && $smarty.ENV.LINKEDIN_PAGE_URL != ''}
                    <a aria-label="{$smarty.ENV.SITE_URL_DISPLAY} on LinkedIn" target="_blank" target="_blank" href="{$smarty.ENV.LINKEDIN_PAGE_URL}" class="me-4 text-reset"><i class="fab fa-linkedin"></i></a>
                {/if}

                {if isset($smarty.ENV.GITHUB_PAGE_URL) && $smarty.ENV.GITHUB_PAGE_URL != ''}
                    <a target="_blank" href="{$smarty.ENV.GITHUB_PAGE_URL}" class="me-4 text-reset"><i class="fab fa-github"></i></a> 
                {/if}

                {if isset($smarty.ENV.SITE_PHONE) && $smarty.ENV.SITE_PHONE != ''}
                    <a aria-label="Call Skale" target="_blank" href="tel:{$smarty.ENV.SITE_PHONE}" class="me-4 text-reset"><i class="fa-solid fa-phone"></i></a>
                {/if}
            </div>
        </section>

        <section class="border-top">
            <div class="container-fluid text-center text-md-start mt-5">
                <div class="row mt-3">
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <h6 class="text-uppercase fw-bold mb-4"></i>Subscribe to our newsletter</h6>
                        <form id="newsletterForm" class="mb-4" method="POST" action="{$smarty.ENV.WEB_ROOT}email-list-signup">
                            <p>Monthly digest of what's new and exciting from us.</p>
                            <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                                <label for="email" class="visually-hidden">Email address</label>
                                <input id="email" name="email" type="email" class="required form-control" placeholder="Email address">
                                <button class="shadow-hover btn btn-primary" type="button">Subscribe</button>
                            </div>
                        </form>
                    </div>

                    <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mb-4">
                        <h6 class="text-uppercase fw-bold mb-4">Services</h6>
                        <div class="row">
                            {foreach from=$serviceList key=key item=service}
                                <div class="col-md-6">
                                    <p>
                                        <a aria-describedby="footer services {$service.title}" href="{$smarty.ENV.SITE_URL}{$service.url}" class="link-underline link-underline-opacity-0 mbtn lbc text-reset">{$service.icon} {$service.title}</a>
                                    </p>
                                </div>
                            {/foreach}
                        </div>
                    </div>

                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                        {if isset($smarty.ENV.SITE_PHONE) && $smarty.ENV.SITE_PHONE != ''}
                            {include file="inc/buttons/phoneLink.tpl" phone=$smarty.ENV.SITE_PHONE type="link"}
                        {/if}

                        {include file="inc/buttons/emailLink.tpl" email=$smarty.ENV.SITE_EMAIL type="link"}

                        <p>
                            <i class="fa-solid fa-location-dot"></i>
                            <a href="{$smarty.ENV.URL_CONTACT}" class="mbtn lbc" aria-describedby="footer contact link">Contact Us</a>
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <div class="p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            <div class="row">
                <div class="col-md-4 mb-0 text-body-secondary">
                    <p class="p-3 m-0">
                        &copy; {$smarty.now|date_format:"Y"} 
                        <a class="text-reset fw-bold" href="{$smarty.ENV.SITE_URL}">{$smarty.ENV.SITE_URL_DISPLAY}</a>
                    </p>
                </div>

                <div class="col-md-4 mb-0 text-body-secondary text-center">
                    {include file="inc/layout/mainLogo.tpl" class="footer-logo"}
                </div>

                <div class="col-md-4">
                    <ul class="nav justify-content-end">
                        {foreach from=$footerNav item=item key=key name=name}
                            <li class="{$item.url|replace:'/':'-'} nav-link px-2 text-body-secondary {if $p1 == $item.url}active{/if} {if $item.children}dropdown{/if}">
                                <a 
                                    aria-describedby="footer nav {$item.title}"
                                    href="{$smarty.ENV.SITE_URL}{$item.url}"
                                    class="text-body-secondary mbtn lbc {$item.class} {if $p1 == $item.url}active{/if}" 
                                >
                                    {$item.title}
                                </a>
                            </li>
                        {/foreach}
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>

    <script src="{$smarty.ENV.WEB_ROOT}js/main.min.js?{$smarty.now}"></script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=G-5HMT5HBM1Y"></script>

    </body>
    </html>
{/if}