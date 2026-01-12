<?php
/* Smarty version 5.5.2, created on 2026-01-12 13:45:45
  from 'file:inc/buttons/emailLink.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.2',
  'unifunc' => 'content_6964fb09c02726_43395300',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2c5e703aa662cd977cf08745f8c0a8e391e6b23a' => 
    array (
      0 => 'inc/buttons/emailLink.tpl',
      1 => 1767013877,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6964fb09c02726_43395300 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\skaleup\\src\\Views\\templates\\inc\\buttons';
if ($_smarty_tpl->getValue('type') == 'link') {?>
    <p>
        <i class="fa-solid fa-envelope"></i>
        <a class="<?php echo $_smarty_tpl->getValue('class');?>
" href="mailto:<?php echo $_ENV['SITE_EMAIL'];?>
" title="Email <?php echo $_ENV['SITE_NAME'];?>
 <?php echo $_ENV['SITE_EMAIL'];?>
"><?php echo $_ENV['SITE_EMAIL'];?>
</a>
    </p>
<?php }?>

<?php if ($_smarty_tpl->getValue('type') == 'button') {?>
    <a class="<?php echo $_smarty_tpl->getValue('class');?>
 btn btn-lg btn-outline-info" href="mailto:<?php echo $_ENV['SITE_EMAIL'];?>
" title="Email <?php echo $_ENV['SITE_NAME'];?>
 <?php echo $_ENV['SITE_EMAIL'];?>
">
        <i class="fa-solid fa-envelope"></i>
        <?php echo $_ENV['SITE_EMAIL'];?>

    </a>
<?php }
}
}
