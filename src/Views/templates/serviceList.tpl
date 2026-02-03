{include file="inc/layout/header.tpl"}

{if isset($data.pageContent.pageContent)}
    <div data-aos="fade-up" class="container-fluid">
        <div class="row justify-content-center align-items-center border-bottom py-4 text-bg-dark">
            <div class="col-md-7">
                <h2 class="display-4 fw-bold Bahnschrift logo-bg-small">{$data.pageContent.pageContent->title}</h2>
                {$data.pageContent.pageContent->content}
            </div>
        </div>
    </div>
{/if}

{include file="inc/service/serviceListContainer.tpl" serviceList=$smarty.SESSION.serviceList}

{include file="inc/layout/footerContactForm.tpl"}
{include file="inc/layout/footer.tpl"}