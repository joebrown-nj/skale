<!doctype html>
<html lang="en" data-bs-theme="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ADMIN | <?= $_ENV['SITE_NAME'] ?></title>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css " rel="stylesheet">

        <link href="<?= $_ENV['WEB_ROOT'] ?>css/style.css" rel="stylesheet">

        <script src="https://cdn.tiny.cloud/1/922fqai2fy48g70stert7o9wh58oaavuhxcn58j4e8hppp08/tinymce/8/tinymce.min.js" referrerpolicy="origin" crossorigin="anonymous"></script>

        <script>
            tinymce.init({
                selector: 'textarea.editor',
                forced_root_block: false, 
                plugins: [
                    // Core editing features
                    'anchor', 'autolink', 'charmap', 'code', 'codesample', 'emoticons', 'link', 'lists', 'media', 'searchreplace', 'table', 'visualblocks', 'wordcount',
                    // Your account includes a free trial of TinyMCE premium features
                    // Try the most popular premium features until Oct 20, 2025:
                    // 'checklist', 'mediaembed', 'casechange', 'formatpainter', 'pageembed', 'a11ychecker', 'tinymcespellchecker', 'permanentpen', 'powerpaste', 'advtable', 'advcode', 'advtemplate', 'ai', 'uploadcare', 'mentions', 'tinycomments', 'tableofcontents', 'footnotes', 'mergetags', 'autocorrect', 'typography', 'inlinecss', 'markdown','importword', 'exportword', 'exportpdf'
                ],
                toolbar: 'code undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography uploadcare | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
                tinycomments_mode: 'embedded',
                tinycomments_author: 'Author name',
                // mergetags_list: [
                //     { value: 'First.Name', title: 'First Name' },
                //     { value: 'Email', title: 'Email' },
                // ],
                // ai_request: (request, respondWith) => respondWith.string(() => Promise.reject('See docs to implement AI Assistant')),
                uploadcare_public_key: '611011dc099627236bd1',
                relative_urls: false,
            });
        </script>

        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <!-- <script src="https://code.jquery.com/ui/1.14.1/jquery-ui.min.js" integrity="sha256-AlTido85uXPlSyyaZNsjJXeCs07eSv3r43kyCVc8ChI=" crossorigin="anonymous"></script> -->

        <!-- <script src="https://cdn.datatables.net/2.3.4/js/dataTables.min.js"></script> -->
        <script src="https://cdn.datatables.net/2.3.4/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/2.3.4/js/dataTables.bootstrap5.js"></script>
        <!-- <link href="https://cdn.datatables.net/2.3.4/css/dataTables.dataTables.min.css"> -->
        <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css"> -->
        <link href="https://cdn.datatables.net/2.3.4/css/dataTables.bootstrap5.css">
        <!-- https://code.jquery.com/jquery-3.7.1.js -->
        <!-- https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/js/bootstrap.bundle.min.js -->

        <style>
            #dataTable th { cursor: pointer; }
            /* .table-responsive { overflow: hidden !important; } */
            .clickable-row { cursor: pointer; }
            .clickable-row:hover td { background-color: #12161a; }
        </style>
    </head>

    <body class="bg-dark">
        <div class="container-fluid">
            <div class="row">
                <div class="sidebar border-end col-md-3 col-lg-2 p-0 bg-body-tertiary">
                    <div class="d-flex flex-column flex-shrink-0 p-3">
                        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                            <!-- <svg class="bi pe-none me-2" width="40" height="32" aria-hidden="true">
                                <use xlink:href="#bootstrap"></use>
                            </svg> -->
                            <span class="fs-4">Tables</span> 
                        </a>

                        <hr>

                        <ul class="nav nav-pills flex-column mb-auto">
                            <?php foreach ($tables as $t) {
                                $class = isset($_GET['t']) && $_GET['t'] == $t ? 'active' : '';
                                ?>
                                    <li class="nav-item">
                                        <a href="?t=<?= $t ?>" class="nav-link text-white <?= $class ?>" aria-current="page">
                                            <!-- <svg class="bi pe-none me-2" width="16" height="16" aria-hidden="true">
                                                <use xlink:href="#<?= $t ?>"></use>
                                            </svg> -->
                                            <?= ucwords(str_replace('_', ' ', $t)) ?>
                                            
                                        </a>
                                    </li>
                                <?php
                            } ?>
                        </ul>
                    </div>
                </div>

                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">
                            <?= ucwords(str_replace('_', ' ', $table)) ?>
                            <?php if($getId > 0): ?>
                                (ID: <?= $getId ?>)
                                <a href="?t=<?= $table ?>" class="btn btn-sm btn-outline-secondary">&laquo; back</a>
                            <?php endif; ?>
                        </h1>
                    </div>

                    <?php if(count($success) > 0): ?>
                        <div class="alert alert-success" role="alert">
                            <?php foreach($success as $s): ?>
                                <?= $s ?><br>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <?php if(count($error) > 0): ?>
                        <div class="alert alert-success" role="alert">
                            <?php foreach($error as $s): ?>
                                <?= $s ?><br>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <?php if($table != '' && $getId == 0): ?>
                        <div class="table-responsive small dt-container dt-bootstrap5">
                            <!-- <table class="display table table-striped table-hover table-sm dataTable"> -->
                            <table id="dataTable" class="table table-striped">
                                <thead>
                                    <tr>
                                        <!-- <th></th> -->
                                        <?php foreach($fields as $t): ?>
                                            <?php if($t['Type'] !== 'text' && $t['Type'] !== 'longtext' && $t['Field'] !== 'shortText'): ?>
                                                <th scope="col"><?= $t['Field'] ?></th>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($tableData as $d): ?>
                                        <tr class="clickable-row" data-href="?t=<?= $table ?>&id=<?= $d['id'] ?>">
                                            <!-- <td><a href="?t=<?= $table ?>&id=<?= $d['id'] ?>">edit</a></td> -->
                                            <?php foreach($fields as $col): ?>
                                                <?php if($col['Type'] !== 'text' && $col['Type'] !== 'longtext' && $col['Field'] !== 'shortText'): ?>
                                                    <td><?= substr(strip_tags($d[$col['Field']]), 0, 150) ?></td>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endif; ?>


                    <?php if($table != '' && $getId > 0): ?>
                        <form method="post" action="/admin/?t=<?= $table ?>" enctype="multipart/form-data">
                            <table class="table">
                                <?php foreach($data as $key => $data):
                                    $type = '';
                                    foreach($fields as $field):
                                        if($key == $field['Field']) {
                                            $type = $field['Type'];
                                            break;
                                        }
                                    endforeach; ?>

                                    <tr>
                                        <td><?= $key ?></td>
                                        <td>
                                            <?php if($key == 'id'): ?> 
                                                <input type="text" value="<?= $data ?>" disabled/>
                                                <input type="hidden" name="<?= $key ?>" value="<?= $data ?>"/>
                                            <?php elseif($type == 'text' || $type == 'longtext' || $key == 'shortText'): ?>
                                                <textarea <?php if(!str_contains($key, 'meta')): ?>class="editor"<?php else: ?>rows="6" cols="60"<?php endif; ?> name="<?= $key ?>"><?= $data ?></textarea>
                                            <?php elseif($type == 'timestamp'): ?>
                                                <?= $data ?>
                                            <?php else: ?>
                                                <input class="form-control <?= $key ?>" id="<?= $key ?>" type="text" name="<?= $key ?>" value="<?= $data ?>" />
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                                <tfoot>
                                    <tr>
                                        <td colspan="2">
                                            <input type="submit" class="btn btn-primary" value="Submit"/>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </form>
                    <?php endif; ?>
                </main>
            </div>
        </div>
    </body>
    
    <script>
        // let table = new DataTable('#dataTable');
        $('#dataTable').DataTable();

        // jQuery(document).ready(function($) {
        $(document).on('click', 'tr.clickable-row', function(t){
            // $(".clickable-row").click(function() {
                window.location = $(this).data("href");
            // });
        });

        $(document).ready(function() {
            $('.title').on('input', function(t){
                $('.url').val(string_to_slug($('.title').val()));
            });
        })

        function string_to_slug (str) {
            str = str.replace(/^\s+|\s+$/g, ''); // trim
            str = str.toLowerCase();
        
            // remove accents, swap ñ for n, etc
            var from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
            var to   = "aaaaeeeeiiiioooouuuunc------";
            for (var i=0, l=from.length ; i<l ; i++) {
                str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
            }

            str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
                .replace(/\s+/g, '-') // collapse whitespace and replace by -
                .replace(/-+/g, '-'); // collapse dashes

            return str;
        }
    </script>
</html>