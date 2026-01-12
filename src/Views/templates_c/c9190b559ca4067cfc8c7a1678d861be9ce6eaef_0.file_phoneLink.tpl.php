<?php
/* Smarty version 5.5.2, created on 2026-01-12 13:59:40
  from 'file:inc/buttons/phoneLink.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.2',
  'unifunc' => 'content_6964fe4cbc24a1_92993686',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c9190b559ca4067cfc8c7a1678d861be9ce6eaef' => 
    array (
      0 => 'inc/buttons/phoneLink.tpl',
      1 => 1763761130,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6964fe4cbc24a1_92993686 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\skaleup\\src\\Views\\templates\\inc\\buttons';
if ((true && (true && null !== ($_ENV['SITE_PHONE'] ?? null))) && $_ENV['SITE_PHONE'] != '') {?>
    <?php if ($_smarty_tpl->getValue('type') == 'link') {?>
        <p>
                        <i class="fa-solid fa-phone"></i>
            <a class="d-none d-lg-inline <?php echo $_smarty_tpl->getValue('class');?>
" href="tel:<?php echo $_ENV['SITE_PHONE'];?>
" title="Call <?php echo $_ENV['SITE_NAME'];?>
 <?php echo $_ENV['SITE_PHONE'];?>
"><?php echo $_ENV['SITE_PHONE'];?>
</a>
            <a class="d-lg-none <?php echo $_smarty_tpl->getValue('class');?>
" href="sms:<?php echo $_ENV['SITE_PHONE'];?>
" title="Call <?php echo $_ENV['SITE_NAME'];?>
 <?php echo $_ENV['SITE_PHONE'];?>
"><?php echo $_ENV['SITE_PHONE'];?>
</a>
        </p>
    <?php }?>

    <?php if ($_smarty_tpl->getValue('type') == 'button') {?>
        <a class="d-none d-lg-inline <?php echo $_smarty_tpl->getValue('class');?>
 btn btn-lg btn-outline-info" href="tel:<?php echo $_ENV['SITE_PHONE'];?>
" title="Call <?php echo $_ENV['SITE_NAME'];?>
 <?php echo $_ENV['SITE_PHONE'];?>
">
            <i class="fa-solid fa-phone"></i>
            <?php echo $_ENV['SITE_PHONE'];?>

        </a>

        <a class="d-lg-none <?php echo $_smarty_tpl->getValue('class');?>
 btn btn-lg btn-outline-info" href="sms:<?php echo $_ENV['SITE_PHONE'];?>
" title="Call <?php echo $_ENV['SITE_NAME'];?>
 <?php echo $_ENV['SITE_PHONE'];?>
">
            <i class="fa-solid fa-phone"></i>
            <?php echo $_ENV['SITE_PHONE'];?>

        </a>
    <?php }
}
}
}
