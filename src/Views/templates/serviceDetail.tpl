{include file="inc/layout/header.tpl"}

<div class="container-fluid">
 <div class="row justify-content-center align-items-center border-bottom py-4 text-bg-dark">
 <div class="col-md-6">
 <h2 class="display-4 fw-bold Bahnschrift logo-bg-small">{include file="inc/service/serviceIcon.tpl" serviceDetail=$data.serviceDetail} {$data.serviceDetail->title}</h2>
 <p class="lead">{if isset($data.serviceDetail->shortText) && $data.serviceDetail->shortText != ''}{$data.serviceDetail->shortText}{else}Learn more about our {$data.serviceDetail->title} solutions.{/if}</p>
 </div>

 <div class="col-md-4">
 <img class="img-fluid service-detail-hero-image" alt="{$data.serviceDetail->title}" src="{$smarty.ENV.WEB_ROOT}images/{$data.serviceDetail->image}">
 </div>
 </div>
</div>

{$data.serviceDetail->content}

{include file="inc/layout/footerContactForm.tpl"}
{include file="inc/layout/footer.tpl"}
