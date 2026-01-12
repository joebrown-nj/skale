{include file="inc/layout/header.tpl"}

<div data-aos="fade-up" class="container-fluid">
    <div class="row justify-content-center align-items-center border-bottom py-4 text-bg-dark">
        <div class="col-md-7">
            <h2 class="display-4 fw-bold Bahnschrift logo-bg-small">{$pageContent.title}</h2>
            {$pageContent.content}
        </div>
    </div>
</div>

{include file="inc/service/serviceListContainer.tpl" serviceList=$serviceList}

{include file="inc/layout/footerContactForm.tpl"}
{include file="inc/layout/footer.tpl"}