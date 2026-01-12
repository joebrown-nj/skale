<?php
/* Smarty version 5.5.2, created on 2026-01-12 19:08:12
  from 'file:inc/blog/blogListContainer.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.2',
  'unifunc' => 'content_6965469c9618e6_14595292',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e203cf448a5629db43d52ea1864ec5e2b23fe81a' => 
    array (
      0 => 'inc/blog/blogListContainer.tpl',
      1 => 1768244887,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6965469c9618e6_14595292 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\skaleup\\src\\Views\\templates\\inc\\blog';
?><main data-aos="fade-up" class="container-fluid">
    <div class="row mb-2">
        <div class="col-md-12">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                                        <h3 class="mb-0">Featured post</h3>
                    <div class="mb-1 text-body-secondary">
                        <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('date_format')($_smarty_tpl->getValue('blogFeatured')['datePosted'],"%B %e, %Y");?>

                    </div>

                    <h3>
                        <a href="<?php echo $_ENV['SITE_URL'];?>
blog/<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('date_format')($_smarty_tpl->getValue('blogFeatured')['datePosted'],"%Y-%m-%d");?>
/<?php echo $_smarty_tpl->getValue('blogFeatured')['url'];?>
" class="icon-link gap-1 icon-link-hover stretched-link" aria-describedby="blog <?php echo $_smarty_tpl->getValue('blogFeatured')['title'];?>
">
                            <?php echo $_smarty_tpl->getValue('blogFeatured')['title'];?>

                        </a>
                    </h3>

                    <?php echo $_smarty_tpl->getValue('blogFeatured')['shortText'];?>


                    <a href="<?php echo $_ENV['SITE_URL'];?>
blog/<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('date_format')($_smarty_tpl->getValue('blogFeatured')['datePosted'],"%Y-%m-%d");?>
/<?php echo $_smarty_tpl->getValue('blogFeatured')['url'];?>
" class="icon-link gap-1 icon-link-hover stretched-link" aria-describedby="blog <?php echo $_smarty_tpl->getValue('blogFeatured')['title'];?>
">
                        Continue reading
                        <svg class="bi" aria-hidden="true">
                            <use xlink:href="#chevron-right"></use>
                        </svg>
                    </a>
                </div>

                <div class="col-auto d-none d-lg-block">
                    <svg aria-label="Placeholder: Thumbnail" class="bd-placeholder-img " height="250" preserveAspectRatio="xMidYMid slice" role="img" width="200" xmlns="http://www.w3.org/2000/svg">
                        <title><?php echo $_smarty_tpl->getValue('blogFeatured')['title'];?>
</title>
                        <rect width="100%" height="100%" fill="#55595c"></rect>
                        <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                    </svg>
                </div>
            </div>
        </div>

            </div>

    <div class="row g-5">
        <div class="col-md-8">
            <h3 class="pb-4 mb-4 fst-italic border-bottom">From the Firehose</h3>

            <div class="row g-4">
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('blogList'), 'blog', false, 'key', 'blogs', array (
));
$foreach5DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('key')->value => $_smarty_tpl->getVariable('blog')->value) {
$foreach5DoElse = false;
?>
                    <div class="col-md-6 col-lg-4">
                        <div class="card">
                            <?php if ($_smarty_tpl->getValue('blog')['image'] != '') {?>
                                <img src="<?php echo $_ENV['WEB_ROOT'];?>
images/<?php echo $_smarty_tpl->getValue('blog')['image'];?>
" class="card-img-top" alt="<?php echo $_smarty_tpl->getValue('blog')['title'];?>
">
                            <?php }?>

                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="<?php echo $_ENV['SITE_URL'];?>
blog/<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('date_format')($_smarty_tpl->getValue('blog')['datePosted'],"%Y-%m-%d");?>
/<?php echo $_smarty_tpl->getValue('blog')['url'];?>
" class="btn btn-primary">
                                        <?php echo $_smarty_tpl->getValue('blog')['title'];?>

                                    </a>
                                </h5>

                                <p class="card-text"><?php echo preg_replace('!<[^>]*?>!', ' ', (string) $_smarty_tpl->getValue('blog')['shortText']);?>
</p>

                                <a href="<?php echo $_ENV['SITE_URL'];?>
blog/<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('date_format')($_smarty_tpl->getValue('blog')['datePosted'],"%Y-%m-%d");?>
/<?php echo $_smarty_tpl->getValue('blog')['url'];?>
" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </div>

            
            
            
                    </div>

        <div class="col-md-4">
            <div class="position-sticky" style="top: 2rem;">
                <div class="p-4 mb-3 bg-body-tertiary rounded">
                    <h4 class="fst-italic"><?php echo $_smarty_tpl->getValue('data')['blogContent']['title'];?>
</h4>
                    <p><?php echo preg_replace('!<[^>]*?>!', ' ', (string) $_smarty_tpl->getValue('data')['blogContent']['content']);?>
</p>
                </div>

                <div>
                    <h4 class="fst-italic">Recent posts</h4>

                    <ul class="list-unstyled">
                        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('blogList'), 'blog', false, 'key', 'blogs', array (
));
$foreach6DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('key')->value => $_smarty_tpl->getVariable('blog')->value) {
$foreach6DoElse = false;
?>
                            <?php if ($_smarty_tpl->getValue('key') < 4) {?>
                                <li>
                                    <a href="<?php echo $_ENV['SITE_URL'];?>
blog/<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('date_format')($_smarty_tpl->getValue('blog')['datePosted'],"%Y-%m-%d");?>
/<?php echo $_smarty_tpl->getValue('blog')['url'];?>
" class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top">
                                        <svg aria-hidden="true" class="bd-placeholder-img " height="96" preserveAspectRatio="xMidYMid slice" width="100%" xmlns="http://www.w3.org/2000/svg">
                                            <rect width="100%" height="100%" fill="#777"></rect>
                                        </svg>

                                        <div class="col-lg-8">
                                            <h6 class="mb-0"><?php echo $_smarty_tpl->getValue('blog')['title'];?>
</h6>
                                            <small class="text-body-secondary"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('date_format')($_smarty_tpl->getValue('blog')['datePosted'],"%B %e, %Y");?>
</small>
                                        </div>
                                    </a>
                                </li>
                            <?php }?>
                        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                                            </ul>
                </div>

                
                            </div>
        </div>
    </div>
</main>

<?php }
}
