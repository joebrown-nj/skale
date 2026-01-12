<?php
/* Smarty version 5.5.2, created on 2026-01-12 13:59:39
  from 'file:inc/service/serviceListContainer.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.2',
  'unifunc' => 'content_6964fe4bb9ee01_92222489',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f30e4ec03fb56ca3a97bde3c323388b10eaf6a39' => 
    array (
      0 => 'inc/service/serviceListContainer.tpl',
      1 => 1767745126,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:inc/service/serviceListSingle.tpl' => 2,
  ),
))) {
function content_6964fe4bb9ee01_92222489 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\skaleup\\src\\Views\\templates\\inc\\service';
?><div class="container-fluid service-cards-container">
    <div class="d-lg-none">
        <div class="row mb-4">
            <div class="col">
                <div class="sticky-top" style="top:100px;">
                    <h3 class="BricolageGrotesque-ExtraBold mb-4 logo-bg-small">Why do businesses choose <span class="brand-color">skale</span>?</h3>
                    <p class="lead">We deliver <b>tailored digital solutions designed to accelerate growth, strengthen your brand presence, and optimize operational performance</b> in today's competitive landscape. Our team combines strategic insight with modern technology to help you overcome challenges, unlock new opportunities, and scale with confidence.</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('serviceList'), 'service', false, 'key', 'services', array (
));
$foreach3DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('key')->value => $_smarty_tpl->getVariable('service')->value) {
$foreach3DoElse = false;
?>
                    <?php $_smarty_tpl->renderSubTemplate("file:inc/service/serviceListSingle.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('key'=>$_smarty_tpl->getValue('key')), (int) 0, $_smarty_current_dir);
?>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </div>
        </div>
    </div>

    <div class="d-none d-lg-block">
        <div class="row justify-content-end px-5 py-5">
            <div class="col-md-6">
                <div class="sticky-top" style="top:100px;">
                    <h3 class="BricolageGrotesque-ExtraBold mb-4 logo-bg-small">Why do businesses choose <span class="brand-color">skale</span>?</h3>
                    <p class="lead">We deliver <b>tailored digital solutions designed to accelerate growth, strengthen your brand presence, and optimize operational performance</b> in today's competitive landscape. Our team combines strategic insight with modern technology to help you overcome challenges, unlock new opportunities, and scale with confidence.</p>
                </div>
            </div>

            <div class="col-md-5">
                <div class="row position-relative">
                    <div class="col">
                        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('serviceList'), 'service', false, 'key', 'services', array (
));
$foreach4DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('key')->value => $_smarty_tpl->getVariable('service')->value) {
$foreach4DoElse = false;
?>
                            <?php $_smarty_tpl->renderSubTemplate("file:inc/service/serviceListSingle.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('key'=>$_smarty_tpl->getValue('key')), (int) 0, $_smarty_current_dir);
?>
                        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><?php }
}
