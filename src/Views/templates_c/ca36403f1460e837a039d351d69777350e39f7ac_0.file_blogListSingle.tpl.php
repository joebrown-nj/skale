<?php
/* Smarty version 5.5.2, created on 2026-01-12 13:45:45
  from 'file:inc/blog/blogListSingle.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.2',
  'unifunc' => 'content_6964fb0910f563_65339970',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ca36403f1460e837a039d351d69777350e39f7ac' => 
    array (
      0 => 'inc/blog/blogListSingle.tpl',
      1 => 1767902041,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6964fb0910f563_65339970 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\skaleup\\src\\Views\\templates\\inc\\blog';
?><div data-aos="fade-up" class="card border-0 rounded-0">
    <?php if ($_smarty_tpl->getValue('blog')['image'] != '') {?>
        <div class="img">
            <img class="card-top" alt="<?php echo $_smarty_tpl->getValue('blog')['title'];?>
" src="<?php echo $_ENV['WEB_ROOT'];?>
images/<?php echo $_smarty_tpl->getValue('blog')['image'];?>
">
        </div>
    <?php }?>

    <h5 class="card-header px-3 pt-2 pb-3 mb-0 border-0" style="background-color: #171b1e;">
        <a aria-describedby="blog <?php echo $_smarty_tpl->getValue('blog')['title'];?>
" href="<?php echo $_ENV['SITE_URL'];?>
blog/<?php echo $_smarty_tpl->getValue('blog')['datePosted'];?>
/<?php echo $_smarty_tpl->getValue('blog')['url'];?>
" class="mbtn lbc link-light link-underline-opacity-0">
            <?php echo $_smarty_tpl->getValue('blog')['title'];?>

        </a>
    </h5>

    <div class="card-body">
        <?php echo $_smarty_tpl->getValue('blog')['shortText'];?>

    </div>

    <div class="card-footer">
        <a aria-describedby="blog <?php echo $_smarty_tpl->getValue('blog')['title'];?>
" href="<?php echo $_ENV['SITE_URL'];?>
blog/<?php echo $_smarty_tpl->getValue('blog')['datePosted'];?>
/<?php echo $_smarty_tpl->getValue('blog')['url'];?>
" class="logo-bg-small mbtn btn btn-primary btn-lg">Read More</a>
    </div>
</div><?php }
}
