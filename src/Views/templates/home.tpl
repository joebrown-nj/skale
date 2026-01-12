{include file="inc/layout/header.tpl"}

<div class="parallax parallax-mobile d-lg-none" data-aos="fade-up">
    <div style="background-color: rgba(0, 0, 0, .6); padding-top:50px;">
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center" style="height: 100vh;">
                <div class="col-md-8">
                    <h1 class="display-3 mb-4 BricolageGrotesque">{$data.hero.headline}</h1>
                    <h2 class="display-6 mb-4 ubuntu-regular">{$data.hero.subHeading}</h2>
                    {$data.hero.text}

                    <a aria-describedby="home hero {$data.hero.buttonText}" href="{$smarty.ENV.SITE_URL}{$data.hero.url}" class="mb-4 d-block logo-bg-small shadow-hover mbtn ubuntu-regular lbc btn btn-primary btn-lg">Learn More</a>
                    <a aria-describedby="home hero contact" href="{$smarty.ENV.SITE_URL}{$smarty.ENV.URL_CONTACT}" class="d-block logo-bg-small shadow-hover mbtn ubuntu-regular lbc btn btn-secondary btn-lg brand-color-bg">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="parallax d-none d-lg-block" data-aos="fade-in-up">
    <div style="background-color: rgba(0, 0, 0, .6); padding-top:50px;">
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center" style="height: 100vh;">
                <div class="col-md-8">
                    <h1 style="font-size:56px;" class="mb-4 BricolageGrotesque">
                        <strong>{$data.hero.headline}</strong>
                    </h1>
                    <h2 style="font-size:40px;" class="mb-4 ubuntu-regular">{$data.hero.subHeading}</h2>
                    {$data.hero.text}

                    <a aria-describedby="home hero {$data.hero.buttonText}" href="{$smarty.ENV.SITE_URL}{$data.hero.url}" class="logo-bg-small shadow-hover mbtn ubuntu-regular lbc btn btn-primary btn-lg">Learn More: {$data.hero.buttonText}</a>
                    <a aria-describedby="home hero contact" href="{$smarty.ENV.SITE_URL}{$smarty.ENV.URL_CONTACT}" class="logo-bg-small shadow-hover mbtn ubuntu-regular lbc btn btn-secondary btn-lg brand-color-bg">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
</div>

{* <div class="home-video-container d-none">
    <video autoPlay loop muted playsInline webkit-playsinline id="myVideo">
        <source src="{$smarty.ENV.WEB_ROOT}videos/5644053-uhd_2562_1440_30fps.mp4" type="video/mp4">
    </video>

    <div class="container-fluid py-4" style="z-index: 10; position: relative;">
        <div class="row justify-content-center align-items-center" style="height: 100vh;">
            <div class="col-md-8">
                <div class="d-lg-none">
                    <h1 class="display-3 mb-4 BricolageGrotesque-ExtraBold">{$data.hero.headline}</h1>
                    <h2 class="display-6 mb-4 ubuntu-regular">{$data.hero.subHeading}</h2>
                    {$data.hero.text}

                    <a aria-describedby="home hero {$data.hero.buttonText}" href="{$smarty.ENV.SITE_URL}{$data.hero.url}" class="mb-4 d-block logo-bg-small shadow-hover mbtn ubuntu-regular lbc btn btn-primary btn-lg">Learn More: {$data.hero.buttonText}</a>
                    <a aria-describedby="home hero contact" href="{$smarty.ENV.SITE_URL}{$smarty.ENV.URL_CONTACT}" class="d-block logo-bg-small shadow-hover mbtn ubuntu-regular lbc btn btn-secondary btn-lg brand-color-bg">Contact</a>
                </div>

                <div class="d-none d-lg-block">
                    <h1 style="font-size:56px;" class="mb-4 BricolageGrotesque-ExtraBold">{$data.hero.headline}</h1>
                    <h2 style="font-size:42px;" class="mb-4 ubuntu-regular">{$data.hero.subHeading}</h2>
                    {$data.hero.text}

                    <a aria-describedby="home hero {$data.hero.buttonText}" href="{$smarty.ENV.SITE_URL}{$data.hero.url}" class="logo-bg-small shadow-hover mbtn ubuntu-regular lbc btn btn-primary btn-lg">Learn More: {$data.hero.buttonText}</a>
                    <a aria-describedby="home hero contact" href="{$smarty.ENV.SITE_URL}{$smarty.ENV.URL_CONTACT}" class="logo-bg-small shadow-hover mbtn ubuntu-regular lbc btn btn-secondary btn-lg brand-color-bg">Contact</a>
                </div>
            </div>
        </div>
    </div>
</div> *}

<div data-aos="fade-in-up" class="home-callout parallax container-fluid py-5" style="min-height:auto; height:auto; background-color:#04010f; background-image: url('{$smarty.ENV.WEB_ROOT}images/circle-skale-up-logo-bg.png'); background-repeat: no-repeat; background-position: center;">
    <div class="row justify-content-center py-5">
        <div class="col-md-8 text-center">
            <h2 class="pb-4 BricolageGrotesque-ExtraBold"><span class="brand-color">skale</span> your business with custom IT solutions and results driven marketing services.</h2>
            <a aria-describedby="home call out contact button" href="{$smarty.ENV.SITE_URL}{$smarty.ENV.URL_CONTACT}" class="mbtn shadow-hover btn btn-outline-warning btn-lg logo-bg-small brand-color-bg" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-play-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                    <path d="M6.271 5.055a.5.5 0 0 1 .52.038l3.5 2.5a.5.5 0 0 1 0 .814l-3.5 2.5A.5.5 0 0 1 6 10.5v-5a.5.5 0 0 1 .271-.445"/>
                </svg>
                Get Started Today
            </a>
        </div>
    </div>
</div>

{* <div class="container-fluid text-bg-light why-choose logo-bg-small-light">
    <div class="row py-5 px-5 align-items-center">
        <div class="col-md-6">
            {$data.whyChooseUsHeading}
        </div>

        <div class="col-md-6">
            <ol class="fs-5">
                {foreach from=$data.whyChooseUs item=item name=items}
                    <li><b>{$item.title}</b> - {$item.description}</li>
                {/foreach}
            </ol>
        </div>
    </div>
</div>

<hr>

<div class="container-fluid text-bg-light why-choose logo-bg-small-light">
    <div class="row justify-content-center pt-5">
        <div class="col-md-8 text-center">
            {$data.whyChooseUsHeading}
        </div>
    </div>

    <div class="row justify-content-center py-5">
        <div class="col-md-8">
            <ol class="fs-5 list-group list-group-horizontal">
                {foreach from=$data.whyChooseUs item=item name=items}
                    <li><b>{$item.title}</b> - {$item.description}</li>
                {/foreach}
            </ol>
        </div>
    </div>
</div>

<hr> *}

<div class="container-fluid text-bg-light why-choose logo-bg-small-light">
    <div data-aos="fade-up" class="row justify-content-center pt-5">
        <div class="col-md-8 text-center">
            {$data.whyChooseUsHeading}
        </div>
    </div>

    <div data-aos="fade-up" class="row justify-content-center py-5">
        <div class="col-md-6">
            <ol class="fs-5">
                {foreach from=$data.whyChooseUs item=item name=items}
                    <li><b>{$item.title}</b> - {$item.description}</li>
                {/foreach}
            </ol>
        </div>
    </div>
</div>

{* <hr>

<div class="container-fluid text-bg-light why-choose logo-bg-small-light">
    <div class="row justify-content-center pt-5">
        <div class="col-md-8 text-center">
            {$data.whyChooseUsHeading}
        </div>
    </div>

    <div class="row justify-content-center py-5">
        {foreach from=$data.whyChooseUs item=item name=items}
            <div class="col-md-2">
                <h5>{$item.title}</h5>
                <p>{$item.description}</p>
            </div>
        {/foreach}
    </div>
</div>

<hr>

<div class="container-fluid text-bg-light why-choose logo-bg-small-light">
    <div class="row justify-content-center pt-5">
        <div class="col-md-8 text-center">
            {$data.whyChooseUsHeading}
        </div>
    </div>

    <div class="row justify-content-center py-5">
        <div class="card-group">
            {foreach from=$data.whyChooseUs item=item name=items}
                <div class="card">
                    <h4 class="card-header">{$item.title}</h4>
                    <div class="card-body">{$item.description}</div>
                </div>
            {/foreach}
        </div>
    </div>
</div> *}

{include file="inc/service/serviceListContainer.tpl" serviceList=$serviceList}

{include file="inc/blog/blogListContainer.tpl" serviceList=$serviceList}

{include file="inc/layout/footerContactForm.tpl"}
{include file="inc/layout/footer.tpl"}