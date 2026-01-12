<?php
/* Smarty version 5.5.2, created on 2026-01-12 13:59:40
  from 'file:inc/blog/blogListContainer.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.2',
  'unifunc' => 'content_6964fe4c3ae719_00260140',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e203cf448a5629db43d52ea1864ec5e2b23fe81a' => 
    array (
      0 => 'inc/blog/blogListContainer.tpl',
      1 => 1767901609,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:inc/blog/blogListSingle.tpl' => 1,
  ),
))) {
function content_6964fe4c3ae719_00260140 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\skaleup\\src\\Views\\templates\\inc\\blog';
?><div data-aos="fade-up" class="container-fluid">
    <div class="row">
        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('blogList'), 'blog', false, 'key', 'blogs', array (
));
$foreach5DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('key')->value => $_smarty_tpl->getVariable('blog')->value) {
$foreach5DoElse = false;
?>
            <?php $_smarty_tpl->renderSubTemplate("file:inc/blog/blogListSingle.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('key'=>$_smarty_tpl->getValue('key')), (int) 0, $_smarty_current_dir);
?>
        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
    </div>
</div><?php }
}
