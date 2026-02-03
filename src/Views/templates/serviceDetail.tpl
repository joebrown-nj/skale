{include file="inc/layout/header.tpl"}

<div data-aos="fade-up" class="container-fluid">
    <div class="row justify-content-center align-items-center border-bottom py-4 text-bg-dark">
        <div class="col-md-7">
            <h2 class="display-4 fw-bold Bahnschrift logo-bg-small">{include file="inc/service/serviceIcon.tpl" serviceDetail=$data.serviceDetail} {$data.serviceDetail->title}</h2>
            <p class="lead">{if isset($data.serviceDetail->shortText) && $data.serviceDetail->shortText != ''}{$data.serviceDetail->shortText}{else}Learn more about our {$data.serviceDetail->title} services.{/if}</p>
        </div>

        <div class="col-md-3">
            <img style="max-width:100%; border:10px solid #171b1e;" alt="{$data.serviceDetail->title}" src="{$smarty.ENV.WEB_ROOT}images/{$data.serviceDetail->image}" style="width:100%; max-height:400px; object-fit:cover; object-position:center;">
        </div>
    </div>

    <div class="row justify-content-center py-4">
        <div class="col-md-7">
            <div class="service-detail">
                {$data.serviceDetail->text}
            </div>

            <div class="service-footer-callout px-4 py-4 border-bottom border-top mb-4 mt-4 text-bg-dark">
                {$data.serviceDetail->footerCallout}
            </div>
        </div>

        <div data-aos="fade-up" class="col-md-3 mb-4">
            <div class="position-sticky" style="top: 2rem;">
                <div class="card text-bg-dark">
                    <div class="card-header">
                        <h4 class="logo-bg-small mb-0 card-title BricolageGrotesque-ExtraBold">Why choose {$smarty.ENV.SITE_NAME}?</h4>
                    </div>

                    <div class="card-body px-4 text-body-secondary logo-bg">
                        {$data.serviceDetail->whyChooseList}

                        <div class="d-grid gap-2">
                            <p>{include file="inc/buttons/contactLink.tpl" buttonText="Get Started" type="button" interest=replace($data.serviceDetail->url, 'services/', '') service=$data.serviceDetail->title}</p>
                            <p>{include file="inc/buttons/phoneLink.tpl" type="button"}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{include file="inc/layout/footerContactForm.tpl"}
{include file="inc/layout/footer.tpl"}