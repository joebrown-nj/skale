{include file="inc/layout/header.tpl"}

<section class="parallax cta-section py-5 bg-gradient border-bottom">
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
                {include file="inc/home/hero-contact-form.tpl"}
            </div>
        </div>
    </div>
</section>

<div class="home-callout parallax container-fluid py-5" style="min-height:auto; height:auto; background-color:#04010f; background-image: url('{$smarty.ENV.WEB_ROOT}images/circle-skale-up-logo-bg.png'); background-repeat: no-repeat; background-position: center;" data-aos="fade-in-up">
    <div class="row justify-content-center py-5">
        <div class="col-md-8">
            <h2 class="pb-4 BricolageGrotesque-ExtraBold lh-base">
                Most Businesses Don't Have a <mark>Growth Problem</mark><br>
                They Have a <mark>Systems Problem</mark>
            </h2>
            <p class="lead"><strong>Disconnected tools. Manual workflows. Inconsistent lead flow.</strong> These aren't isolated issues they're symptoms of a broken system.</p>
            <p class="mb-4"><strong><span class="brand-color">Skale</span> fixes that.</strong> We design and build integrated systems that align your marketing, technology, and operations so everything works together to drive growth.</p>

            <a aria-describedby="home call out contact button" href="{$smarty.ENV.SITE_URL}{$smarty.ENV.URL_CONTACT}" class="mbtn lbc btn btn-outline-warning btn-lg logo-bg-small brand-color-bg-button" type="button">
                Schedule A Free Call Today
            </a>
        </div>
    </div>
</div>

{include file="inc/service/serviceListContainer.tpl" serviceList=$serviceList}

<div class="container-fluid why-choose logo-bg-small-light overflow-hidden">
    <div class="row">
        <div class="col-md-6 px-5 py-5 brand-color-bg">
            <div class="row">
                <div class="col-md-8">
                    <h2 class="fs-1 fw-bold text-white">How It Works</h2>
                </div>
            </div>

            <div class="row">
                <h3 class="fs-4 text-white mb-4">{$data.howItWorks.title}</h3>

                <div class="steps-vertical">
                    {foreach from=$data.howItWorks.steps item=step key=key name=steps}
                        <div class="step-vertical align-items-center shadow-lg" data-aos="fade-up">
                            <div class="step-vertical-icon text-center fs-3 fw-bold text-white">
                                <i class="{$step.icon}"></i>
                            </div>

                            <div class="step-vertical-content">
                                <h4 class="mb-0 text-white">{$step.title}</h4>
                                <p class="mb-0 text-white">{$step.description}</p>
                            </div>
                        </div>
                    {/foreach}
                </div>
            </div>
        </div>

        <div class="col-md-6 px-5 py-5">
            <div class="row">
                <div class="col-md-8">
                    <h2 class="fs-1 fw-bold text-white">The Results</h2>
                </div>
            </div>

            <div class="row">
                <h3 class="fs-4 text-white mb-4">{$data.theResults.title}</h3>

                <div class="steps-vertical">
                    {foreach from=$data.theResults.results item=item key=key name=name}
                        <div class="step-vertical align-items-center shadow-lg " data-aos="fade-up">
                            <div class="step-vertical-icon text-center fs-3 fw-bold text-white">
                                <i class="{$item.icon}"></i>
                            </div>

                            <div class="step-vertical-content">
                                <h4 class="mb-0 text-white">{$item.title}</h4>
                                <p class="mb-0 text-white">{$item.description}</p>
                            </div>
                        </div>
                    {/foreach}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid text-bg-light why-choose logo-bg-small-light pb-5 overflow-hidden">
    {foreach from=$data.homeCards item=item key=key name=name}
        <div class="row pt-5 px-5 mb-4 align-items-center" data-aos="fade-up">
            <div class="col-md-3">
                <div class="card">
                    <svg aria-label="{$item->title}" class="bd-placeholder-img card-img-top" 
                        height="180" preserveAspectRatio="xMidYMid slice" role="img" width="100%" 
                        xmlns="http://www.w3.org/2000/svg">
                        <title>{$item->title}</title>
                        <rect width="100%" height="100%" fill="#868e96"></rect>
                    </svg>
                    <div class="card-body">
                        <h5 class="card-title mb-0">{$item->title}</h5>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <h2>{$item->subTitle}</h2>
                {$item->text}
            </div>
        </div>
    {/foreach}
</div>

{* <div class="container-fluid text-bg-light why-choose logo-bg-small-light pb-5 overflow-hidden">
    <div class="row justify-content-center pt-5 px-5">
        <div class="col-md-5 text-center mb-4" data-aos="fade-up">
            <div class="card bg-gradient" aria-hidden="true">
                <svg aria-label="Placeholder" class="bd-placeholder-img card-img-top" 
                    height="180" preserveAspectRatio="xMidYMid slice" role="img" width="100%" 
                    xmlns="http://www.w3.org/2000/svg">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="#868e96"></rect>
                </svg>

                <div class="card-body px-4 py-4">
                    <h2 class="card-title">{$data.whyChooseUsHeading}</h2>
                    <div class="card-text">
                        <h4>{$data.whyChooseUsSubHeading}</h4>
                    </div>
                    {$data.whyChooseUsContent}
                </div>
            </div>
        </div>

        <div class="col-md-5 text-center mb-4" data-aos="fade-up">
            <div class="card bg-gradient" aria-hidden="true">
                <svg aria-label="Placeholder" class="bd-placeholder-img card-img-top" 
                    height="180" preserveAspectRatio="xMidYMid slice" role="img" width="100%" 
                    xmlns="http://www.w3.org/2000/svg">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="#868e96"></rect>
                </svg>

                <div class="card-body px-4 py-4">
                    <h2 class="card-title">Built Differently</h2>
                    <div class="card-text">
                        <h4>Systems-first approach (not project-based)</h4>
                        Full-stack execution (strategy → build → scale)
                        Designed for long-term growth, not quick wins
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-5 text-center mb-4" data-aos="fade-up">
            <div class="card bg-gradient" aria-hidden="true">
                <svg aria-label="Placeholder" class="bd-placeholder-img card-img-top" 
                    height="180" preserveAspectRatio="xMidYMid slice" role="img" width="100%" 
                    xmlns="http://www.w3.org/2000/svg">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="#868e96"></rect>
                </svg>

                <div class="card-body px-4 py-4">
                    <h2 class="card-title">WHO THIS IS FOR</h2>
                    <div class="card-text">
                        <h4>We work best with businesses that:</h4>
                        Are growing but feel operational friction
                        Have multiple tools that don't work well together
                        Want to automate and scale efficiently
                        Are ready to invest in long-term infrastructure
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-5 text-center mb-4" data-aos="fade-up">
            <div class="card bg-gradient" aria-hidden="true">
                <svg aria-label="Placeholder" class="bd-placeholder-img card-img-top" 
                    height="180" preserveAspectRatio="xMidYMid slice" role="img" width="100%" 
                    xmlns="http://www.w3.org/2000/svg">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="#868e96"></rect>
                </svg>

                <div class="card-body px-4 py-4">
                    <h2 class="card-title">ENGAGEMENT OPTIONS</h2>
                    <div class="card-text">
                        <h4>Flexible Ways to Work Together</h4>
                        Growth Audit
                        Identify gaps, inefficiencies, and opportunities in your current systems.

                        System Buildout
                        Design and implement your full growth and operations infrastructure.

                        Ongoing Optimization
                        Continuous improvement, automation, and scaling support.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> *}


{* <div class="container-fluid text-bg-light why-choose logo-bg-small-light pb-5 overflow-hidden">
    {foreach from=$data.whyChooseUs item=item name=items}
        <div class="row justify-content-center align-items-center mb-4" data-aos="fade-left">
            <div class="col-md-1 text-center">
                <p class="display-2 fw-bold text-secondary">{$smarty.foreach.items.index + 1}</p>
            </div>

            <div class="col-md-6">
                <h5 class="fw-bold">{$item.title}</h5>
                <p class="lead">{$item.description}</p>
            </div>
        </div>
    {/foreach}
</div> *}

<div class="bg-gradient container-fluid home-callout parallax" style="min-height:auto; height:auto; background-color:#04010f; background-image: url('{$smarty.ENV.WEB_ROOT}images/circle-skale-up-logo-bg.png'); background-repeat: no-repeat; background-position: center;">
    <div class="row justify-content-center px-4 py-4">
        {include file="inc/blog/blogListContainer.tpl" blogList=$data.blogList blogFeatured=$data.blogFeatured blogContent=$data.blogContent}
    </div>
</div>

{* {include file="inc/layout/footerContactForm.tpl"} *}
{include file="inc/layout/footer.tpl"}
