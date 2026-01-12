<?php
/* Smarty version 5.5.2, created on 2026-01-12 13:59:39
  from 'file:inc/layout/mainLogo.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.2',
  'unifunc' => 'content_6964fe4b98a2d9_87138651',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fd295e0d4343d5301aae15c244cfaf473637c85b' => 
    array (
      0 => 'inc/layout/mainLogo.tpl',
      1 => 1764645106,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6964fe4b98a2d9_87138651 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\skaleup\\src\\Views\\templates\\inc\\layout';
?><h1 class="main-logo">
    <a href="/" class="clearfix mbtn lbc" aria-describedby="logo">
        <img class="skale-up" src="<?php echo $_ENV['WEB_ROOT'];?>
images/circle-skale-up-logo.png" alt="<?php echo $_smarty_tpl->getValue('SITE_NAME');?>
"><span class="logo-text fw-bold BricolageGrotesque-ExtraBold"><?php echo $_ENV['SITE_NAME'];?>
<span class="brand-color">.</span></span>
    </a>
</h1><?php }
}
