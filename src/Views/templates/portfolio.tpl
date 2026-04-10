{include file="inc/layout/header.tpl"}

<div class="container py-5">
   <div class="row justify-content-center">
      <div class="col-md-8 text-center">
         {if isset($data.pageContent) && isset($data.pageContent) && isset($data.pageContent->content)}
            {$data.pageContent->content}
         {/if}
      </div>
   </div>

   <div class="row justify-content-center">
      {foreach from=$data.portfolioItems item=portfolio}
         <div class="col-md-6 col-lg-4 mb-4 portfolio-items" data-aos="fade-up">
               <div class="card h-100">
                  <img src="{$smarty.ENV.WEB_ROOT}images/{$portfolio->image}" class="card-img-top" alt="{$portfolio->title}">
                  <div class="card-body d-flex flex-column position-absolute top-0 start-0 w-100 h-100 p-4">
                     <h5 class="card-title">{$portfolio->title}</h5>
                     <p class="card-text">{$portfolio->text}</p>
                     <a href="{$smarty.ENV.SITE_URL}portfolio/{$portfolio->url}" class="stretched-link mt-auto btn btn-primary">View Case Study</a>
                  </div>
               </div>
         </div>
      {/foreach}
   </div>
</div>

{include file="inc/layout/footerContactForm.tpl"}
{include file="inc/layout/footer.tpl"}