<?php
/* Smarty version 5.5.2, created on 2026-01-12 13:45:46
  from 'file:inc/layout/footer.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.2',
  'unifunc' => 'content_6964fb0a423867_10181508',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd468bdf8ea39b1d4e4f257c97f7535dc414c2236' => 
    array (
      0 => 'inc/layout/footer.tpl',
      1 => 1767745422,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:inc/buttons/phoneLink.tpl' => 1,
    'file:inc/buttons/emailLink.tpl' => 1,
    'file:inc/layout/mainLogo.tpl' => 1,
  ),
))) {
function content_6964fb0a423867_10181508 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\skaleup\\src\\Views\\templates\\inc\\layout';
?></div>

<?php if (((true && ($_smarty_tpl->hasVariable('footer') && null !== ($_smarty_tpl->getValue('footer') ?? null))) && $_smarty_tpl->getValue('footer') === 'false')) {?>

<?php } else { ?>
    <footer class="logo-bg text-center text-lg-start bg-body-tertiary text-muted">
        <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom" style="background-color: rgba(0, 0, 0, 0.05);">
            <div class="me-5 d-none d-lg-block">
                <span>Get connected:</span>
            </div>

            <div>
                <?php if ((true && (true && null !== ($_ENV['FACEBOOK_PAGE_URL'] ?? null))) && $_ENV['FACEBOOK_PAGE_URL'] != '') {?>
                    <a aria-label="<?php echo $_ENV['SITE_URL_DISPLAY'];?>
 on Facebook" target="_blank" href="<?php echo $_ENV['FACEBOOK_PAGE_URL'];?>
" class="me-4 text-reset"><i class="fab fa-facebook-f"></i></a>
                <?php }?>

                <?php if ((true && (true && null !== ($_ENV['TWITTER_PAGE_URL'] ?? null))) && $_ENV['TWITTER_PAGE_URL'] != '') {?>
                    <a target="_blank" href="<?php echo $_ENV['TWITTER_PAGE_URL'];?>
" class="me-4 text-reset"><i class="fab fa-twitter"></i></a>
                <?php }?>

                <?php if ((true && (true && null !== ($_ENV['GOOGLE_PAGE_URL'] ?? null))) && $_ENV['GOOGLE_PAGE_URL'] != '') {?>
                    <a target="_blank" href="<?php echo $_ENV['GOOGLE_PAGE_URL'];?>
" class="me-4 text-reset"><i class="fab fa-google"></i></a>
                <?php }?>

                <?php if ((true && (true && null !== ($_ENV['INSTAGRAM_PAGE_URL'] ?? null))) && $_ENV['INSTAGRAM_PAGE_URL'] != '') {?>
                    <a target="_blank" href="<?php echo $_ENV['INSTAGRAM_PAGE_URL'];?>
" class="me-4 text-reset"><i class="fab fa-instagram"></i></a>
                <?php }?>

                <?php if ((true && (true && null !== ($_ENV['LINKEDIN_PAGE_URL'] ?? null))) && $_ENV['LINKEDIN_PAGE_URL'] != '') {?>
                    <a aria-label="<?php echo $_ENV['SITE_URL_DISPLAY'];?>
 on LinkedIn" target="_blank" target="_blank" href="<?php echo $_ENV['LINKEDIN_PAGE_URL'];?>
" class="me-4 text-reset"><i class="fab fa-linkedin"></i></a>
                <?php }?>

                <?php if ((true && (true && null !== ($_ENV['GITHUB_PAGE_URL'] ?? null))) && $_ENV['GITHUB_PAGE_URL'] != '') {?>
                    <a target="_blank" href="<?php echo $_ENV['GITHUB_PAGE_URL'];?>
" class="me-4 text-reset"><i class="fab fa-github"></i></a> 
                <?php }?>

                <?php if ((true && (true && null !== ($_ENV['SITE_PHONE'] ?? null))) && $_ENV['SITE_PHONE'] != '') {?>
                    <a aria-label="Call Skale" target="_blank" href="tel:<?php echo $_ENV['SITE_PHONE'];?>
" class="me-4 text-reset"><i class="fa-solid fa-phone"></i></a>
                <?php }?>
            </div>
        </section>

        <section class="border-top">
            <div class="container-fluid text-center text-md-start mt-5">
                <div class="row mt-3">
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <h6 class="text-uppercase fw-bold mb-4"></i>Subscribe to our newsletter</h6>
                        <form id="newsletterForm" class="mb-4" method="POST" action="<?php echo $_ENV['WEB_ROOT'];?>
email-list-signup">
                            <p>Monthly digest of what's new and exciting from us.</p>
                            <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                                <label for="email" class="visually-hidden">Email address</label>
                                <input id="email" name="email" type="email" class="required form-control" placeholder="Email address">
                                <button class="shadow-hover btn btn-primary" type="button">Subscribe</button>
                            </div>
                        </form>
                    </div>

                    <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mb-4">
                        <h6 class="text-uppercase fw-bold mb-4">Services</h6>
                        <div class="row">
                            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('serviceList'), 'service', false, 'key');
$foreach7DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('key')->value => $_smarty_tpl->getVariable('service')->value) {
$foreach7DoElse = false;
?>
                                <div class="col-md-6">
                                    <p>
                                        <a aria-describedby="footer services <?php echo $_smarty_tpl->getValue('service')['title'];?>
" href="<?php echo $_ENV['SITE_URL'];
echo $_smarty_tpl->getValue('service')['url'];?>
" class="link-underline link-underline-opacity-0 mbtn lbc text-reset"><?php echo $_smarty_tpl->getValue('service')['icon'];?>
 <?php echo $_smarty_tpl->getValue('service')['title'];?>
</a>
                                    </p>
                                </div>
                            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                        </div>
                    </div>

                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                        <?php if ((true && (true && null !== ($_ENV['SITE_PHONE'] ?? null))) && $_ENV['SITE_PHONE'] != '') {?>
                            <?php $_smarty_tpl->renderSubTemplate("file:inc/buttons/phoneLink.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('phone'=>$_ENV['SITE_PHONE'],'type'=>"link"), (int) 0, $_smarty_current_dir);
?>
                        <?php }?>

                        <?php $_smarty_tpl->renderSubTemplate("file:inc/buttons/emailLink.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('email'=>$_ENV['SITE_EMAIL'],'type'=>"link"), (int) 0, $_smarty_current_dir);
?>

                        <p>
                            <i class="fa-solid fa-location-dot"></i>
                            <a href="<?php echo $_ENV['URL_CONTACT'];?>
" class="mbtn lbc" aria-describedby="footer contact link">Contact Us</a>
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <div class="p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            <div class="row">
                <div class="col-md-4 mb-0 text-body-secondary">
                    <p class="p-3 m-0">
                        &copy; <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('date_format')(time(),"Y");?>
 
                        <a class="text-reset fw-bold" href="<?php echo $_ENV['SITE_URL'];?>
"><?php echo $_ENV['SITE_URL_DISPLAY'];?>
</a>
                    </p>
                </div>

                <div class="col-md-4 mb-0 text-body-secondary text-center">
                    <?php $_smarty_tpl->renderSubTemplate("file:inc/layout/mainLogo.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('class'=>"footer-logo"), (int) 0, $_smarty_current_dir);
?>
                </div>

                <div class="col-md-4">
                    <ul class="nav justify-content-end">
                        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('footerNav'), 'item', false, 'key', 'name', array (
));
$foreach8DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('key')->value => $_smarty_tpl->getVariable('item')->value) {
$foreach8DoElse = false;
?>
                            <li class="<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('replace')($_smarty_tpl->getValue('item')['url'],'/','-');?>
 nav-link px-2 text-body-secondary <?php if ($_smarty_tpl->getValue('p1') == $_smarty_tpl->getValue('item')['url']) {?>active<?php }?> <?php if ($_smarty_tpl->getValue('item')['children']) {?>dropdown<?php }?>">
                                <a 
                                    aria-describedby="footer nav <?php echo $_smarty_tpl->getValue('item')['title'];?>
"
                                    href="<?php echo $_ENV['SITE_URL'];
echo $_smarty_tpl->getValue('item')['url'];?>
"
                                    class="text-body-secondary mbtn lbc <?php echo $_smarty_tpl->getValue('item')['class'];?>
 <?php if ($_smarty_tpl->getValue('p1') == $_smarty_tpl->getValue('item')['url']) {?>active<?php }?>" 
                                >
                                    <?php echo $_smarty_tpl->getValue('item')['title'];?>

                                </a>
                            </li>
                        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"><?php echo '</script'; ?>
>
    
    
    <?php echo '<script'; ?>
 src="https://unpkg.com/aos@next/dist/aos.js"><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
 src="<?php echo $_ENV['WEB_ROOT'];?>
js/main.min.js?<?php echo time();?>
"><?php echo '</script'; ?>
>

    <!-- GOOGLE ANALYTICS -->
    <?php echo '<script'; ?>
 async src="https://www.googletagmanager.com/gtag/js?id=G-5HMT5HBM1Y"><?php echo '</script'; ?>
>

    </body>
    </html>
<?php }
}
}
