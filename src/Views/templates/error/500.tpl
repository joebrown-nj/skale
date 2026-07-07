{include file="inc/layout/header.tpl"}

<section id="content">
    <div class="custom-bg text-dark">
        <div class="d-flex align-items-center justify-content-center min-vh-100 px-2">
            <div class="text-center">
                <h1 class="display-1 fw-bold">500</h1>
                <p class="fs-2 fw-medium mt-4">Something went wrong</p>
                <p class="mt-4 mb-5">We ran into an unexpected problem while loading this page. Please try again in a moment.</p>
                <a href="{$smarty.ENV.SITE_URL}" class="mbtn btn btn-light fw-semibold rounded-pill px-4 py-2 custom-btn" aria-describedby="500 home button">
                    Go Home
                </a>
            </div>
        </div>
    </div>
</section>

{include file="inc/layout/footerContactForm.tpl"}
{include file="inc/layout/footer.tpl"}
