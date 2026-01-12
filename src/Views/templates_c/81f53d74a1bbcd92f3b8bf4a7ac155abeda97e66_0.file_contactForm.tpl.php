<?php
/* Smarty version 5.5.2, created on 2026-01-12 19:08:13
  from 'file:inc/contact/contactForm.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.2',
  'unifunc' => 'content_6965469d7ad721_00977763',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '81f53d74a1bbcd92f3b8bf4a7ac155abeda97e66' => 
    array (
      0 => 'inc/contact/contactForm.tpl',
      1 => 1764645361,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6965469d7ad721_00977763 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\skaleup\\src\\Views\\templates\\inc\\contact';
?><div class="card text-bg-dark">
    <div class="card-header">
        <h2 class="logo-bg-small mb-0 card-title BricolageGrotesque-ExtraBold display-5">Let's talk.</h2>
    </div>

    <div class="card-body px-4">
        <section id="formcontent" class="row">
            <form id="contactForm" class="mt-0 row g-3 needs-validation" novalidate method="POST">
                <div class="form-group mt-0">
                    <label class="fs-5 mb-2" for="formName">Name</label>
                    <input name="name" type="text" class="fs-5 required form-control" id="formName" required>
                </div>

                <div class="form-group">
                    <label class="fs-5 mb-2" for="formEmail">Email</label>
                    <input name="email" type="email" class="required form-control" id="formEmail" required>
                </div>

                <div class="form-group">
                    <label class="fs-5 mb-2" for="formPhone">Phone</label>
                    <input name="phone" type="phone" class="required form-control" id="formPhone" required>
                </div>

                <div class="form-group">
                    <label class="fs-5 mb-2">Interested in:</label>
                    <div class="row">
                        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('serviceList'), 'service', false, 'key');
$foreach7DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('key')->value => $_smarty_tpl->getVariable('service')->value) {
$foreach7DoElse = false;
?>
                            <div class="col-md-6">
                                <input id="formInteresteIn-<?php echo $_smarty_tpl->getValue('key');?>
" <?php if ($_smarty_tpl->getValue('service')['selected']) {?>checked="checked"<?php }?> name="interests[]" class="form-check-input" type="checkbox" value="<?php echo $_smarty_tpl->getValue('service')['title'];?>
">
                                <label for="formInteresteIn-<?php echo $_smarty_tpl->getValue('key');?>
" class="form-check-label"><?php echo $_smarty_tpl->getValue('service')['title'];?>
</label>
                            </div>
                        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="fs-5 mb-2" for="formMessage">Comments</label>
                    <textarea cols="500" rows="5" id="formMessage" name="comment" class="fs-5 required form-control" required></textarea>
                </div>

                <div class="form-group form-check">
                    <input name="subscribe" value="1" type="checkbox" class="form-check-input" id="formCheck">
                    <label class="form-check-label" for="formCheck">Subscribe to mailing list</label>
                </div>

                <div class="form-group">
                    <button aria-describedby="contact form button" class="lbc shadow-hover btn btn-lg btn-primary" type="submit">Submit</button>
                </div>
            </form>
        </section>
    </div>
</div><?php }
}
