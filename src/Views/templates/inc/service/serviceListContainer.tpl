<section class="cta-section py-5 bg-gradient">
    <div class="container">
        <div class="row justify-content-center align-items-center mb-5">
            <div class="col-md-8 mb-4 mb-lg-0 text-center">
                <h2 class="display-4 fw-bold text-white mb-4">We Build the Infrastructure Behind Scalable Businesses</h2>
                <p class="lead text-white-100 mb-4">Not one-off services. Not disconnected solutions.<br>Everything we do is engineered to support long-term growth.</p>
            </div>
        </div>

        {foreach from=$serviceList key=key item=service name=services key=key}
            <div class="card border-0 shadow-lg mb-5" data-aos="fade-up">
                <div class="row g-0 align-items-center">
                    <div class="col-md-4">
                        <img src="{$smarty.ENV.IMG_ROOT}{$service->image}" alt="{$service->title}" class="img-fluid rounded-start h-100 w-100">
                    </div>

                    <div class="col-md-8">
                        <div class="card-body">
                            <h2 class="card-title px-0 mb-2 ubuntu-regular">{$service->title}</h2>
                            <p class="fs-5">{$service->shortText}</p>
                            <a aria-describedby="home solutions {$service->title}" href="{$smarty.ENV.SITE_URL}{$service->url}" class="stretched-link logo-bg-small mbtn btn btn-primary btn">Learn more about {$service->title}</a>
                        </div>
                    </div>
                </div>
            </div>
        {/foreach}
    </div>
</section>


