<?php
/* Smarty version 5.5.2, created on 2026-01-12 13:45:45
  from 'file:inc/contact/contactTextBlock.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.2',
  'unifunc' => 'content_6964fb09611599_87119345',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '69c9eb8fc8aa3921938fa93999a1a95075c5c3c1' => 
    array (
      0 => 'inc/contact/contactTextBlock.tpl',
      1 => 1761584966,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:inc/buttons/phoneLink.tpl' => 1,
    'file:inc/buttons/emailLink.tpl' => 1,
  ),
))) {
function content_6964fb09611599_87119345 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\skaleup\\src\\Views\\templates\\inc\\contact';
?>
<img alt="contact <?php echo $_ENV['SITE_NAME'];?>
" src="<?php echo $_ENV['WEB_ROOT'];?>
images/contact-temp.jpg" class="mb-4" style="width: 100%;"/>

<div class="border-bottom py-4">
    <h2 class="mb-2 Bahnschrift logo-bg-small">Questions? Ready to start now?</h2>
    <?php echo $_smarty_tpl->getValue('contactContent')['content'];?>

</div>

<?php if ((true && (true && null !== ($_ENV['SITE_PHONE'] ?? null))) && $_ENV['SITE_PHONE'] != '') {?>
    <div class="border-bottom py-4">
        <h2 class="mb-2 Bahnschrift logo-bg-small"><i class="fa-solid fa-phone"></i> Phone</h2>
        <?php $_smarty_tpl->renderSubTemplate("file:inc/buttons/phoneLink.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('phone'=>$_ENV['SITE_PHONE'],'type'=>"link"), (int) 0, $_smarty_current_dir);
?>
            </div>
<?php }?>

<div class="py-4">
    <h2 class="mb-2 Bahnschrift logo-bg-small"><i class="fa-solid fa-envelope"></i> Email</h2>
    <?php $_smarty_tpl->renderSubTemplate("file:inc/buttons/emailLink.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('phone'=>$_ENV['SITE_EMAIL'],'type'=>"link"), (int) 0, $_smarty_current_dir);
?>
    </div><?php }
}
