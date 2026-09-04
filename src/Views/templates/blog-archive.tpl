{include file="inc/layout/header.tpl"}

<link rel="stylesheet" href="{$smarty.ENV.WEB_ROOT}css/blog.min.css" data-ajax-managed-stylesheet="true">

{include file="inc/blog/blog-list-container.tpl" blogList=$data.blogList blogCategories=$data.blogCategories limit=0 activeCategory=$data.activeCategory filterPath=$data.filterPath}

{include file="inc/layout/footer.tpl"}


