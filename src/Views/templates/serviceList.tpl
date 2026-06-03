{include file="inc/layout/header.tpl"}

<link rel="stylesheet" href="{$smarty.ENV.WEB_ROOT}css/headerFooterShow.min.css" data-ajax-managed-stylesheet="true">

{if isset($page.content)}
    <div data-aos="fade-up" class="container-fluid">
        <div class="row justify-content-center align-items-center border-bottom py-4 text-bg-dark">
            <div class="col-md-7">
                <h2 class="display-4 fw-bold Bahnschrift logo-bg-small">{$page.content->title}</h2>
                {$page.content->content}
            </div>
        </div>
    </div>
{/if}

{include file="inc/service/serviceListContainer.tpl" serviceList=$serviceList}

{include file="inc/layout/footerContactForm.tpl"}
{include file="inc/layout/footer.tpl"}


