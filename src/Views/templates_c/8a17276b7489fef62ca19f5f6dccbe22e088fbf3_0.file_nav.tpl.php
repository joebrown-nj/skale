<?php
/* Smarty version 5.5.2, created on 2026-01-12 19:08:11
  from 'file:inc/layout/nav.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.2',
  'unifunc' => 'content_6965469b8fd5d8_81717401',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8a17276b7489fef62ca19f5f6dccbe22e088fbf3' => 
    array (
      0 => 'inc/layout/nav.tpl',
      1 => 1767745412,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:inc/layout/mainLogo.tpl' => 2,
  ),
))) {
function content_6965469b8fd5d8_81717401 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\skaleup\\src\\Views\\templates\\inc\\layout';
?><div class="offcanvas offcanvas-end" tabindex="-1" id="oCNav" aria-labelledby="oCNavLabel" data-bs-scroll="true">
    <div class="offcanvas-header py-2">
        <?php $_smarty_tpl->renderSubTemplate("file:inc/layout/mainLogo.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div class="offcanvas-body py-2">
        <ul class="navbar-nav ms-auto">
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('nav'), 'item', false, 'key', 'name', array (
));
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('key')->value => $_smarty_tpl->getVariable('item')->value) {
$foreach1DoElse = false;
?>
                <li class="<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('replace')($_smarty_tpl->getValue('item')['url'],'/','-');?>
 nav-item <?php if ($_smarty_tpl->getValue('p1') == $_smarty_tpl->getValue('item')['url']) {?>active<?php }?> <?php if ($_smarty_tpl->getValue('item')['children']) {?>dropdown<?php }?>">
                    <a 
                        aria-describedby="main nav <?php echo $_smarty_tpl->getValue('item')['title'];?>
"
                        href="<?php echo $_ENV['SITE_URL'];
echo $_smarty_tpl->getValue('item')['url'];?>
"
                                                class="mbtn lbc <?php echo $_smarty_tpl->getValue('item')['class'];?>
 <?php if ($_smarty_tpl->getValue('p1') == $_smarty_tpl->getValue('item')['url']) {?>active<?php }?>" 
                    >
                        <?php echo $_smarty_tpl->getValue('item')['title'];?>

                    </a>

                    <?php if ($_smarty_tpl->getValue('item')['children']) {?>
                        <ul>
                            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('item')['children'], 'child', false, NULL, 'name1', array (
));
$foreach2DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('child')->value) {
$foreach2DoElse = false;
?>
                                <li class="<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('replace')($_smarty_tpl->getValue('child')['url'],'/','-');?>
">
                                    <a 
                                        aria-describedby="sub nav <?php echo $_smarty_tpl->getValue('child')['title'];?>
"
                                        class="pb-1 pt-0 fs-6 mbtn lbc dropdown-item <?php echo $_smarty_tpl->getValue('child')['class'];?>
 <?php if ($_smarty_tpl->getValue('p2') == $_smarty_tpl->getValue('child')['url']) {?>active<?php }?>" 
                                                                                href="<?php echo $_ENV['SITE_URL'];
echo $_smarty_tpl->getValue('child')['url'];?>
"
                                    >
                                        <?php echo $_smarty_tpl->getValue('child')['title'];?>

                                    </a>
                                </li>
                            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                        </ul>
                    <?php }?>
                </li>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </ul>
        
            </div>
</div>

<header class="fixed-top clearfix menu-bar <?php if ($_smarty_tpl->getValue('p1') != '') {?>menu-bar-bg<?php }?>">
    <nav class="navbar navbar-expand clearfix py-2 px-4  align-self-center">
        <?php $_smarty_tpl->renderSubTemplate("file:inc/layout/mainLogo.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

        <ul class="navbar-nav ms-auto">
                        <li>
                <button style="display:block; height:100%;" class="btn-lg navbar-toggler" data-bs-toggle="offcanvas" href="#oCNav" role="button" aria-controls="oCNav" aria-label="Menu">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </li>
        </ul>
    </nav>
</header><?php }
}
