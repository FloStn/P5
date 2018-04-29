<?php
$title = 'Florian STEIN - Projet 5 - DA PHP/Symfony OpenClassrooms';
$preloader = false;
$homeBanner = false;
$navbar = false;
$footer = false;
$scrollup = false;

$cssFiles = ['<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">',
             '<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">',
             '<link href="./vendor/twbs/bootstrap/dist/css/bootstrap.css" rel="stylesheet">',
             '<link href="./vendor/node-waves/waves.css" rel="stylesheet">',
             '<link href="./vendor/drmonty/animate.css/css/animate.css" rel="stylesheet">',
             '<link href="./vendor/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">',
             '<link href="./public/css/admin/style.css" rel="stylesheet">',
             '<link href="./public/css/admin/themes/all-themes.css" rel="stylesheet">'];

             $jsFiles = ['<script src="./vendor/components/jquery/jquery.min.js"></script>',
                        	'<script src="./vendor/twbs/bootstrap/dist/js/bootstrap.js"></script>',
                        	'<script src="./vendor/bootstrap-select/bootstrap-select/dist/js/bootstrap-select.js"></script>',
                         '<script src="./vendor/grimmlink/jquery-slimscroll/jquery.slimscroll.js"></script>',
                          '<script src="./vendor/node-waves/waves.js"></script>',
                          '<script src="./vendor/jquery-datatable/jquery.dataTables.js"></script>',
                          '<script src="./vendor/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>',
                          '<script src="./vendor/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>',
                          '<script src="./vendor/jquery-datatable/extensions/export/buttons.flash.min.js"></script>',
                          '<script src="./vendor/jquery-datatable/extensions/export/jszip.min.js"></script>',
                          '<script src="./vendor/jquery-datatable/extensions/export/pdfmake.min.js"></script>',
                          '<script src="./vendor/jquery-datatable/extensions/export/vfs_fonts.js"></script>',
                          '<script src="./vendor/jquery-datatable/extensions/export/buttons.html5.min.js"></script>',
                          '<script src="./vendor/jquery-datatable/extensions/export/buttons.print.min.js"></script>',
                        '<script src="./public/js/admin/admin.js"></script>',
                        '<script src="./public/js/admin/jquery-datatable.js"></script>',
                        '<script src="./public/js/admin/demo.js"></script>'];
?>

<?php ob_start(); ?>
    <section class="content">
        <div class="container-fluid">
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Commentaires de l'ensemble des posts
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Post</th>
                                            <th>Contenu</th>
                                            <th>Auteur</th>
                                            <th>Date</th>
                                            <th>Etat</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php foreach($comments as $comment)
                                      {
                                          $color = "";
                                      ?>
                                        <tr>
                                            <td><?= filter_var($comment->titleModel()->title(), FILTER_SANITIZE_STRING) ?></td>
                                            <td><?= $comment->content() ?></td>
                                            <td><?= $comment->authorModel()->name() ?> <?= $comment->authorModel()->surname() ?></td>
                                            <td><?= $comment->addDateTimeFr() ?></td>
                                            <?php
                                                if($comment->state() == "En attente de validation")
                                                {
                                                    $color = "color:red";
                                                }
                                                else
                                                {
                                                    $color = "color:green";
                                                }
                                                ?>
                                                <td><i class="material-icons" style="<?= $color ?>">lens</i></td>
                                            <td>
                                              <ul class="header-dropdown m-r--5 dropdown">
                                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                  <i class="material-icons">more_vert</i>
                                                </a>
                                                <ul class="dropdown-menu pull-right">
                                                  <li><a href="index.php?action=adminCommentState&id=<?= $comment->idCmt() ?>&state=1">Approuver</a></li>
                                                  <li><a href="index.php?action=adminCommentState&id=<?= $comment->idCmt() ?>&state=0">Désapprouver</a></li>
                                                </ul>
                                              </ul>
                                            </td>
                                        </tr>
                                      <?php
                                      }
                                      ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
        </div>
    </section>
  </body>

  	<?php
  	$content = ob_get_clean();
  	require('template/adminTemplate.php');
  	?>
