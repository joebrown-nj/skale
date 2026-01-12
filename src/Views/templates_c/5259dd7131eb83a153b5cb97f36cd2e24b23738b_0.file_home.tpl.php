<?php
/* Smarty version 5.5.2, created on 2026-01-12 13:45:42
  from 'file:home.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.2',
  'unifunc' => 'content_6964fb06973c94_70966321',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5259dd7131eb83a153b5cb97f36cd2e24b23738b' => 
    array (
      0 => 'home.tpl',
      1 => 1767745072,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:inc/layout/header.tpl' => 1,
    'file:inc/service/serviceListContainer.tpl' => 1,
    'file:inc/blog/blogListContainer.tpl' => 1,
    'file:inc/layout/footerContactForm.tpl' => 1,
    'file:inc/layout/footer.tpl' => 1,
  ),
))) {
function content_6964fb06973c94_70966321 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\skaleup\\src\\Views\\templates';
$_smarty_tpl->renderSubTemplate("file:inc/layout/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

<div class="parallax parallax-mobile d-lg-none" data-aos="fade-up">
    <div style="background-color: rgba(0, 0, 0, .6); padding-top:50px;">
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center" style="height: 100vh;">
                <div class="col-md-8">
                    <h1 class="display-3 mb-4 BricolageGrotesque"><?php echo $_smarty_tpl->getValue('data')['hero']['headline'];?>
</h1>
                    <h2 class="display-6 mb-4 ubuntu-regular"><?php echo $_smarty_tpl->getValue('data')['hero']['subHeading'];?>
</h2>
                    <?php echo $_smarty_tpl->getValue('data')['hero']['text'];?>


                    <a aria-describedby="home hero <?php echo $_smarty_tpl->getValue('data')['hero']['buttonText'];?>
" href="<?php echo $_ENV['SITE_URL'];
echo $_smarty_tpl->getValue('data')['hero']['url'];?>
" class="mb-4 d-block logo-bg-small shadow-hover mbtn ubuntu-regular lbc btn btn-primary btn-lg">Learn More</a>
                    <a aria-describedby="home hero contact" href="<?php echo $_ENV['SITE_URL'];
echo $_ENV['URL_CONTACT'];?>
" class="d-block logo-bg-small shadow-hover mbtn ubuntu-regular lbc btn btn-secondary btn-lg brand-color-bg">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="parallax d-none d-lg-block" data-aos="fade-in-up">
    <div style="background-color: rgba(0, 0, 0, .6); padding-top:50px;">
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center" style="height: 100vh;">
                <div class="col-md-8">
                    <h1 style="font-size:56px;" class="mb-4 BricolageGrotesque">
                        <strong><?php echo $_smarty_tpl->getValue('data')['hero']['headline'];?>
</strong>
                    </h1>
                    <h2 style="font-size:40px;" class="mb-4 ubuntu-regular"><?php echo $_smarty_tpl->getValue('data')['hero']['subHeading'];?>
</h2>
                    <?php echo $_smarty_tpl->getValue('data')['hero']['text'];?>


                    <a aria-describedby="home hero <?php echo $_smarty_tpl->getValue('data')['hero']['buttonText'];?>
" href="<?php echo $_ENV['SITE_URL'];
echo $_smarty_tpl->getValue('data')['hero']['url'];?>
" class="logo-bg-small shadow-hover mbtn ubuntu-regular lbc btn btn-primary btn-lg">Learn More: <?php echo $_smarty_tpl->getValue('data')['hero']['buttonText'];?>
</a>
                    <a aria-describedby="home hero contact" href="<?php echo $_ENV['SITE_URL'];
echo $_ENV['URL_CONTACT'];?>
" class="logo-bg-small shadow-hover mbtn ubuntu-regular lbc btn btn-secondary btn-lg brand-color-bg">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
</div>


<div data-aos="fade-in-up" class="home-callout parallax container-fluid py-5" style="min-height:auto; height:auto; background-color:#04010f; background-image: url('<?php echo $_ENV['WEB_ROOT'];?>
images/circle-skale-up-logo-bg.png'); background-repeat: no-repeat; background-position: center;">
    <div class="row justify-content-center py-5">
        <div class="col-md-8 text-center">
            <h2 class="pb-4 BricolageGrotesque-ExtraBold"><span class="brand-color">skale</span> your business with custom IT solutions and results driven marketing services.</h2>
            <a aria-describedby="home call out contact button" href="<?php echo $_ENV['SITE_URL'];
echo $_ENV['URL_CONTACT'];?>
" class="mbtn shadow-hover btn btn-outline-warning btn-lg logo-bg-small brand-color-bg" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-play-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                    <path d="M6.271 5.055a.5.5 0 0 1 .52.038l3.5 2.5a.5.5 0 0 1 0 .814l-3.5 2.5A.5.5 0 0 1 6 10.5v-5a.5.5 0 0 1 .271-.445"/>
                </svg>
                Get Started Today
            </a>
        </div>
    </div>
</div>


<div class="container-fluid text-bg-light why-choose logo-bg-small-light">
    <div data-aos="fade-up" class="row justify-content-center pt-5">
        <div class="col-md-8 text-center">
            <?php echo $_smarty_tpl->getValue('data')['whyChooseUsHeading'];?>

        </div>
    </div>

    <div data-aos="fade-up" class="row justify-content-center py-5">
        <div class="col-md-6">
            <ol class="fs-5">
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('data')['whyChooseUs'], 'item', false, NULL, 'items', array (
));
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('item')->value) {
$foreach0DoElse = false;
?>
                    <li><b><?php echo $_smarty_tpl->getValue('item')['title'];?>
</b> - <?php echo $_smarty_tpl->getValue('item')['description'];?>
</li>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </ol>
        </div>
    </div>
</div>


<?php $_smarty_tpl->renderSubTemplate("file:inc/service/serviceListContainer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('serviceList'=>$_smarty_tpl->getValue('serviceList')), (int) 0, $_smarty_current_dir);
?>

<?php $_smarty_tpl->renderSubTemplate("file:inc/blog/blogListContainer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('serviceList'=>$_smarty_tpl->getValue('serviceList')), (int) 0, $_smarty_current_dir);
?>

<?php $_smarty_tpl->renderSubTemplate("file:inc/layout/footerContactForm.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
$_smarty_tpl->renderSubTemplate("file:inc/layout/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
}
}
