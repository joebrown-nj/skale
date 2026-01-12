<?php
/* Smarty version 5.5.2, created on 2026-01-12 13:45:43
  from 'file:inc/layout/header.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.2',
  'unifunc' => 'content_6964fb075a3489_09671218',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2bdde433dd90fad9a579a76b911c69c4ce2be886' => 
    array (
      0 => 'inc/layout/header.tpl',
      1 => 1767907619,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:inc/layout/nav.tpl' => 1,
    'file:inc/layout/breadcrumb.tpl' => 1,
  ),
))) {
function content_6964fb075a3489_09671218 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\skaleup\\src\\Views\\templates\\inc\\layout';
if ((true && ($_smarty_tpl->hasVariable('header') && null !== ($_smarty_tpl->getValue('header') ?? null))) && $_smarty_tpl->getValue('header') === 'false') {?>

<?php } else { ?>
    <!doctype html>
    <html lang="en" data-bs-theme="dark">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title><?php echo $_ENV['SITE_NAME'];
if ((true && (true && null !== ($_smarty_tpl->getValue('pageContent')['metaTitle'] ?? null))) && $_smarty_tpl->getValue('pageContent')['metaTitle'] != '') {?> | <?php echo $_smarty_tpl->getValue('pageContent')['metaTitle'];
}?></title>
            <meta name="description" content="<?php if ((true && (true && null !== ($_smarty_tpl->getValue('pageContent')['metaDescription'] ?? null)))) {
echo $_smarty_tpl->getValue('pageContent')['metaDescription'];
}?>">
            <meta name="keywords" content="<?php if ((true && (true && null !== ($_smarty_tpl->getValue('pageContent')['metaKeywords'] ?? null)))) {
echo $_smarty_tpl->getValue('pageContent')['metaKeywords'];
}?>">
            <meta name="author" content="<?php echo $_ENV['SITE_NAME'];?>
">

                        <?php echo '<script'; ?>
 src="<?php echo $_ENV['WEB_ROOT'];?>
js/bootstrap.bundle.min.js" crossorigin="anonymous"><?php echo '</script'; ?>
>
            <link href=" <?php echo $_ENV['WEB_ROOT'];?>
css/bootstrap.min.css " rel="stylesheet">

            <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
                        <link href="<?php echo $_ENV['WEB_ROOT'];?>
css/style.min.css" rel="stylesheet">
                        <link rel="canonical" href="<?php echo $_ENV['SITE_URL'];
if ($_smarty_tpl->getValue('p1')) {
echo $_smarty_tpl->getValue('p1');?>
/<?php }
if ($_smarty_tpl->getValue('p2')) {
echo $_smarty_tpl->getValue('p2');?>
/<?php }
if ((true && (true && null !== ($_GET['interests'] ?? null)))) {?>?interests=<?php echo $_GET['interests'];
}?>" />

            <!-- Meta Pixel Code -->
            
                <!-- <?php echo '<script'; ?>
>
                    !function(f,b,e,v,n,t,s)
                        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
                        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
                        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
                        n.queue=[];t=b.createElement(e);t.async=!0;
                        t.src=v;s=b.getElementsByTagName(e)[0];
                        s.parentNode.insertBefore(t,s)}(window, document,'script',
                            'https://connect.facebook.net/en_US/fbevents.js');
                        fbq('init', '1637675473876321');
                        fbq('track', 'PageView');
                <?php echo '</script'; ?>
>
                <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=1637675473876321&ev=PageView&noscript=1"/></noscript> -->
            
            <!-- End Meta Pixel Code -->

            <!-- Open Graph -->
            <meta property="og:title" content="<?php echo $_ENV['SITE_NAME'];
if ((true && (true && null !== ($_smarty_tpl->getValue('pageContent')['metaTitle'] ?? null))) && $_smarty_tpl->getValue('pageContent')['metaTitle'] != '') {?> | <?php echo $_smarty_tpl->getValue('pageContent')['metaTitle'];
}?>">
            <meta property="og:description" content="<?php if ((true && (true && null !== ($_smarty_tpl->getValue('pageContent')['metaDescription'] ?? null)))) {
echo $_smarty_tpl->getValue('pageContent')['metaDescription'];
}?>">
            <meta property="og:type" content="<?php if ((true && (true && null !== ($_GET['p1'] ?? null))) && $_GET['p1'] == 'blog') {?>article<?php } else { ?>website<?php }?>">
            <meta property="og:URL" content="<?php echo $_ENV['SITE_URL'];
if ($_smarty_tpl->getValue('p1')) {
echo $_smarty_tpl->getValue('p1');?>
/<?php }
if ($_smarty_tpl->getValue('p2')) {
echo $_smarty_tpl->getValue('p2');?>
/<?php }
if ((true && (true && null !== ($_GET['interests'] ?? null)))) {?>?interests=<?php echo $_GET['interests'];
}?>" />
        </head>

        <body class="bg-dark">
            <div id="overlay">
                <div class="cv-spinner">
                    <span class="spinner">
                        <img class="skale-up" src="<?php echo $_ENV['WEB_ROOT'];?>
images/circle-skale-up-logo.png" alt="<?php echo $_smarty_tpl->getValue('SITE_NAME');?>
">
                    </span>
                </div>
            </div>

            <?php $_smarty_tpl->renderSubTemplate("file:inc/layout/nav.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

            <div class="page-content">
<?php }?>

<?php ob_start();
echo $_smarty_tpl->getValue('pageContent')['menuTitle'];
$_prefixVariable1 = ob_get_clean();
if ($_smarty_tpl->getValue('p1') && $_smarty_tpl->getValue('p1') != '' && (true && ($_smarty_tpl->hasVariable('pageContent') && null !== ($_smarty_tpl->getValue('pageContent') ?? null))) && (true && ($_prefixVariable1 !== null))) {?>
    <div data-aos="fade-up" class="page-title-block bg-light text-dark text-center" style="<?php if ((true && (true && null !== ($_smarty_tpl->getValue('data')['headerImage'] ?? null)))) {?>background: url('<?php echo $_ENV['WEB_ROOT'];?>
images/<?php echo $_smarty_tpl->getValue('data')['headerImage'];?>
') no-repeat center center; background-size: 100%;<?php }?>">
        <div class="logo-bg logo-bg-overlay"></div>
        <h1 class="display-1 BricolageGrotesque-ExtraBold"><?php echo $_smarty_tpl->getValue('pageContent')['menuTitle'];?>
</h1>
    </div>

    <?php $_smarty_tpl->renderSubTemplate("file:inc/layout/breadcrumb.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
}
}
}
