{include file="inc/layout/header.tpl"}

{* <div class="parallax parallax-mobile d-lg-none" data-aos="fade-up">
    <div style="background-color: rgba(0, 0, 0, .6); padding-top:50px;">
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center" style="height: 100vh;">
                <div class="col-md-8">
                    <h1 class="display-3 mb-4 BricolageGrotesque">{$data.hero->headline}</h1>
                    <h2 class="display-6 mb-4 ubuntu-regular">{$data.hero->subHeading}</h2>

                    <a aria-describedby="home hero {$data.hero->buttonText}" href="{$smarty.ENV.SITE_URL}{$data.hero->buttonUrl}" class="mb-4 d-block logo-bg-small mbtn ubuntu-regular lbc btn btn-primary btn-lg">{$data.hero->buttonText}</a>
                    {if $data.hero->secondaryButtonText}
                        <a aria-describedby="home hero {$data.hero->secondaryButtonText}" href="{$smarty.ENV.SITE_URL}{$data.hero->secondaryButtonUrl}" class="logo-bg-small mbtn ubuntu-regular lbc btn btn-secondary btn-lg brand-color-bg">{$data.hero->secondaryButtonText}</a>
                    {else}
                        <a aria-describedby="home hero contact" href="{$smarty.ENV.SITE_URL}{$smarty.ENV.URL_CONTACT}" class="d-block logo-bg-small mbtn ubuntu-regular lbc btn btn-secondary btn-lg brand-color-bg">Contact Us</a>
                    {/if}
                </div>

                <div class="border rounded col-md-3 px-0" style="background: rgba(10, 10, 10, 0.4);">
                    {include file="inc/home/hero-contact-form.tpl"}
                </div>
            </div>
        </div>
    </div>
</div> *}

{* <div class="parallax d-none d-lg-block" data-aos="fade-in-up">
    <div style="background-color: rgba(0, 0, 0, .6); padding-top:50px;">
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center" style="height: 100vh;">
                <div class="col-md-7">
                    <h1 style="font-size:46px;" class="mb-4 BricolageGrotesque">
                        <strong>{$data.hero->headline}</strong>
                    </h1>
                    <h2 style="font-size:30px;" class="mb-4 ubuntu-regular">{$data.hero->subHeading}</h2>

                    <a aria-describedby="home hero {$data.hero->buttonText}" href="{$smarty.ENV.SITE_URL}{$data.hero->buttonUrl}" class="logo-bg-small mbtn ubuntu-regular lbc btn btn-primary btn-lg">{$data.hero->buttonText}</a>
                    {if $data.hero->secondaryButtonText}
                        <a aria-describedby="home hero {$data.hero->secondaryButtonText}" href="{$smarty.ENV.SITE_URL}{$data.hero->secondaryButtonUrl}" class="logo-bg-small mbtn ubuntu-regular lbc btn btn-secondary btn-lg brand-color-bg">{$data.hero->secondaryButtonText}</a>
                    {else}
                        <a aria-describedby="home hero contact" href="{$smarty.ENV.SITE_URL}{$smarty.ENV.URL_CONTACT}" class="logo-bg-small mbtn ubuntu-regular lbc btn btn-secondary btn-lg brand-color-bg">Contact Us</a>
                    {/if}
                </div>

                <div class="overflow-hidden border rounded col-md-3 px-0" style="background: rgba(10, 10, 10, 0.4);">
                    {include file="inc/home/hero-contact-form.tpl"}
                </div>
            </div>
        </div>
    </div>
</div> *}


<section class="cta-section py-5 bg-gradient border-bottom">
    <div class="container vh-100 pt-5 pb-5 d-flex align-items-center justify-content-center">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <h2 class="display-4 fw-bold text-white mb-4">{$data.hero->headline}</h2>
                <p class="lead text-white-100 mb-4">{$data.hero->subHeading}</p>
                <div class="d-flex flex-wrap" data-aos="fade-up">
                    <a href="{$smarty.ENV.SITE_URL}{$data.hero->buttonUrl}" class="mbtn lbc btn btn-light btn-lg font-weight-bold me-3 mb-3" aria-describedby="home hero {$data.hero->buttonText}">{$data.hero->buttonText}</a>
                    {if $data.hero->secondaryButtonText}
                        <a href="{$smarty.ENV.SITE_URL}{$data.hero->secondaryButtonUrl}" class="mbtn lbc btn btn-outline-light btn-lg mb-3" aria-describedby="home hero {$data.hero->secondaryButtonText}">{$data.hero->secondaryButtonText}</a>
                    {/if}
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card border-0 shadow-lg" data-aos="fade-up">
                    <div class="card-body p-5">
                        <h3 class="card-title mb-4 ubuntu-regular">Get Started Today</h3>
                        {include file="inc/home/hero-contact-form.tpl"}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


{* <div class="parallax d-none d-lg-block bg-gradient" data-aos="fade-in-up">
    <div>
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center" style="height: 100vh;">
                <div class="col-md-7">
                    <h2 class="display-4 font-weight-bold text-white mb-4">{$data.hero->headline}</h2>
                    <p class="lead text-white-50 mb-4">{$data.hero->subHeading}</p>
                    <div class="d-flex flex-wrap">
                        <button class="btn btn-light btn-lg font-weight-bold mr-3 mb-3">Get Started</button>
                        <button class="btn btn-outline-light btn-lg mb-3">Learn More</button>
                    </div>

                    <h2 style="font-size:30px;" class="mb-4 ubuntu-regular">{$data.hero->subHeading}</h2>

                    <a aria-describedby="home hero {$data.hero->buttonText}" href="{$smarty.ENV.SITE_URL}{$data.hero->buttonUrl}" class="logo-bg-small mbtn ubuntu-regular lbc btn btn-primary btn-lg">{$data.hero->buttonText}</a>
                    {if $data.hero->secondaryButtonText}
                        <a aria-describedby="home hero {$data.hero->secondaryButtonText}" href="{$smarty.ENV.SITE_URL}{$data.hero->secondaryButtonUrl}" class="logo-bg-small mbtn ubuntu-regular lbc btn btn-secondary btn-lg brand-color-bg">{$data.hero->secondaryButtonText}</a>
                    {else}
                        <a aria-describedby="home hero contact" href="{$smarty.ENV.SITE_URL}{$smarty.ENV.URL_CONTACT}" class="logo-bg-small mbtn ubuntu-regular lbc btn btn-secondary btn-lg brand-color-bg">Contact Us</a>
                    {/if}
                </div>

                <div class="overflow-hidden border rounded col-md-3 px-0" style="background: rgba(10, 10, 10, 0.4);">
                    {include file="inc/home/hero-contact-form.tpl"}
                </div>
            </div>
        </div>
    </div>
</div> *}







<div data-aos="fade-in-up" class="home-callout parallax container-fluid py-5" style="min-height:auto; height:auto; background-color:#04010f; background-image: url('{$smarty.ENV.WEB_ROOT}images/circle-skale-up-logo-bg.png'); background-repeat: no-repeat; background-position: center;">
    <div class="row justify-content-center py-5">
        <div class="col-md-8 text-center">
            <h2 class="pb-4 BricolageGrotesque-ExtraBold"><span class="brand-color">skale</span> your business with custom IT solutions and results driven marketing services.</h2>
            <a aria-describedby="home call out contact button" href="{$smarty.ENV.SITE_URL}{$smarty.ENV.URL_CONTACT}" class="mbtn lbc btn btn-outline-warning btn-lg logo-bg-small brand-color-bg" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-play-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                    <path d="M6.271 5.055a.5.5 0 0 1 .52.038l3.5 2.5a.5.5 0 0 1 0 .814l-3.5 2.5A.5.5 0 0 1 6 10.5v-5a.5.5 0 0 1 .271-.445"/>
                </svg>
                Get Started Today
            </a>
        </div>
    </div>
</div>

<div class="container-fluid text-bg-light why-choose logo-bg-small-light pb-5 overflow-hidden">
    <div data-aos="fade-up" class="row justify-content-center pt-5">
        <div class="col-md-8 text-center mb-4">
            <h3 class="BricolageGrotesque fs-1 mb-2 fw-bold">{$data.whyChooseUsHeading}</h3>
            <p class="lead">{$data.whyChooseUsSubHeading}</p>
        </div>
    </div>

    {foreach from=$data.whyChooseUs item=item name=items}
        <div class="row justify-content-center align-items-center mb-4" data-aos="fade-left">
            <div class="col-md-1 text-center">
                <p class="display-2 fw-bold">{$smarty.foreach.items.index + 1}</p>
            </div>

            <div class="col-md-6">
                <h5 class="fw-bold">{$item.title}</h5>
                <p class="lead">{$item.description}</p>
                {* <a href="#" class="btn btn-primary">Go somewhere</a> *}
            </div>
        </div>
    {/foreach}
</div>

{include file="inc/service/serviceListContainer.tpl" serviceList=$smarty.SESSION.serviceList}

<div class="container-fluid home-callout parallax" style="min-height:auto; height:auto; background-color:#04010f; background-image: url('{$smarty.ENV.WEB_ROOT}images/circle-skale-up-logo-bg.png'); background-repeat: no-repeat; background-position: center;">
    <div class="row justify-content-center px-4 py-4">
        {include file="inc/blog/blogListContainer.tpl" blogList=$data.blogList blogFeatured=$data.blogFeatured blogContent=$data.blogContent}
    </div>
</div>

{include file="inc/layout/footerContactForm.tpl"}
{include file="inc/layout/footer.tpl"}