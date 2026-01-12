<?php
/* Smarty version 5.5.2, created on 2026-01-12 19:08:12
  from 'file:inc/service/serviceListSingle.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.2',
  'unifunc' => 'content_6965469c3f8112_40101521',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b1c4b4b5bf199749ecf08fe54a2f6369ac3fa20f' => 
    array (
      0 => 'inc/service/serviceListSingle.tpl',
      1 => 1767905859,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6965469c3f8112_40101521 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\skaleup\\src\\Views\\templates\\inc\\service';
?><div data-aos="fade-up" style="z-index:<?php echo $_smarty_tpl->getValue('key')+1;?>
; <?php if (($_smarty_tpl->getValue('__smarty_foreach_services')['last'] ?? null)) {?>margin-bottom:150px;<?php }?>" class="shadow-hover sticky-top service-card card border-0 rounded-0" id="service-<?php echo $_smarty_tpl->getValue('service')['id'];?>
">
    <div class="img">
        <img class="card-top" alt="<?php echo $_smarty_tpl->getValue('service')['title'];?>
" src="<?php echo $_ENV['WEB_ROOT'];?>
images/<?php echo $_smarty_tpl->getValue('service')['image'];?>
">
    </div>

    <h5 class="card-header px-3 pt-2 pb-3 mb-0 border-0" style="background-color: #171b1e;">
        <a aria-describedby="home services <?php echo $_smarty_tpl->getValue('service')['title'];?>
" href="<?php echo $_ENV['SITE_URL'];
echo $_smarty_tpl->getValue('service')['url'];?>
" class="mbtn lbc link-light link-underline-opacity-0">
            <?php echo $_smarty_tpl->getValue('service')['icon'];?>
 <?php echo $_smarty_tpl->getValue('service')['title'];?>

        </a>
    </h5>

    <div class="card-body">
        <?php echo $_smarty_tpl->getValue('service')['shortText'];?>

    </div>

    <div class="card-footer">
        <a aria-describedby="home services <?php echo $_smarty_tpl->getValue('service')['title'];?>
" href="<?php echo $_ENV['SITE_URL'];
echo $_smarty_tpl->getValue('service')['url'];?>
" class="logo-bg-small mbtn btn btn-primary btn-lg">Learn more about <?php echo $_smarty_tpl->getValue('service')['title'];?>
</a>
    </div>
</div><?php }
}
