<?php
/* Smarty version 5.5.2, created on 2026-01-12 19:08:13
  from 'file:inc/layout/footerContactForm.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.2',
  'unifunc' => 'content_6965469d160c57_30688367',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2035aa171f2fea2911d29fa1af5a35a2e39d77f7' => 
    array (
      0 => 'inc/layout/footerContactForm.tpl',
      1 => 1767745501,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:inc/contact/contactTextBlock.tpl' => 1,
    'file:inc/contact/contactForm.tpl' => 1,
  ),
))) {
function content_6965469d160c57_30688367 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\skaleup\\src\\Views\\templates\\inc\\layout';
?><div class="clearfix py-4" style="background-color:#01010A;">
    <div class="container-fluid py-4">
        <div class="row justify-content-center py-4">
            <div class="col-md-5 d-none d-sm-block">
                <?php $_smarty_tpl->renderSubTemplate("file:inc/contact/contactTextBlock.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
            </div>

            <div class="col-md-5">
                <?php $_smarty_tpl->renderSubTemplate("file:inc/contact/contactForm.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
            </div>
        </div>
    </div>
</div><?php }
}
