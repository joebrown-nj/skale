</div>
<!-- end of page-content -->

{if (isset($footer) && $footer === 'false')}

{else}
    {*
    <footer class="logo-bg text-center text-lg-start bg-body-tertiary text-muted">
    <section class="footer-social-strip d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
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
    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4" id="subscribe">
    <h6 class="text-uppercase fw-bold mb-4"></i>Subscribe to our newsletter</h6>
    <form
    id="newsletterForm"
    class="mb-4 ajaxForm"
    method="POST"
    action="{$smarty.ENV.WEB_ROOT}email-list-signup"
    data-meta-form-name="newsletter-form"
    data-meta-success-event="CompleteRegistration"
    data-meta-success-custom-event="NewsletterSubscribed"
    data-meta-start-custom-event="NewsletterSignupStarted"
    >
    <p>Monthly digest of what's new and exciting from us.</p>
    <div class="d-flex flex-column flex-sm-row w-100 gap-2">
    <label for="email" class="visually-hidden">Email address</label>
    <input id="email" name="email" type="email" class="required form-control" placeholder="Email address">
    <button class="btn btn-primary" type="button" data-meta-custom-event="NewsletterSubscribeClick" data-meta-label="newsletter subscribe button">Subscribe</button>
    </div>
    </form>
    </div>

    <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mb-4">
    <h6 class="text-uppercase fw-bold mb-4">Solutions</h6>
    <div class="row">
    {foreach from=$serviceList key=key item=service}
    <div class="col-md-6">
    <p>
    <a aria-describedby="footer solutions {$service->title}" href="{$smarty.ENV.SITE_URL}{$service->url}" class="link-underline link-underline-opacity-0 mbtn text-reset">
    {$service->title}
    </a>
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
    <a href="{$smarty.ENV.SITE_URL}{$smarty.ENV.URL_CONTACT}" class="mbtn" aria-describedby="footer contact link">Contact Us</a>
    </p>
    </div>
    </div>
    </div>
    </section>

    <div class="footer-legal-strip p-4">
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
    class="text-body-secondary mbtn {$item.class} {if $p1 == $item.url}active{/if}"
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
    *}

    <footer class="section-space-sm">
        <div class="container">
            <div class="row g-4 align-items-start">
                <div class="col-lg-5">
                    <a class="navbar-brand text-white" href="/">skale<span>.</span></a>
                    <p class="mt-3 mb-0">Strategy, technology, and marketing systems built to help businesses work smarter and grow with confidence.</p>
                </div>

                <div class="col-6 col-lg-3">
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
                            <a href="/about" class="mbtn" aria-describedby="footer about">About</a>
                        </li>

                        <li class="mb-2">
                            <a href="/contact" class="mbtn" aria-describedby="footer contact">Contact</a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-2">
                    <h2 class="h6 text-white">Contact</h2>
                    {* <p class="mb-1"><a href="tel:+17329254044">732-925-4044</a></p>
                    <p class="mb-0"><a href="mailto:info@skaleup.it.com">info@skaleup.it.com</a></p> *}

                    {if isset($smarty.ENV.SITE_PHONE) && $smarty.ENV.SITE_PHONE != ''}
                        <p class="mb-1">{include file="inc/buttons/phoneLink.tpl" phone=$smarty.ENV.SITE_PHONE type="link"}</p>
                    {/if}

                    <p class="mb-0">{include file="inc/buttons/emailLink.tpl" email=$smarty.ENV.SITE_EMAIL type="link"}</p>

                    <!-- p class="mb-0">
                    {* <i class="fa-solid fa-location-dot"></i> *}
                    <a href="{$smarty.ENV.SITE_URL}{$smarty.ENV.URL_CONTACT}" class="mbtn" aria-describedby="footer contact link">Contact Us</a>
                    </p -->
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

    <!-- Back to top button -->
    <button type="button" class="btn btn-danger btn-floating btn-lg" id="btn-back-to-top">
        <i class="fas fa-arrow-up"></i>
    </button>

    {include file="inc/layout/hiddenLinks.tpl"}

    {include file="inc/layout/scripts.tpl"}

</body>
</html>
{/if}

