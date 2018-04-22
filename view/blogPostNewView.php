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
             '<link href="./vendor/drmonty/animate.css/css/animate.css" rel="stylesheet" />',
             '<link href="./public/css/admin/style.css" rel="stylesheet">',
             '<link href="./public/css/admin/themes/all-themes.css" rel="stylesheet">'];

             $jsFiles = ['<script src="./vendor/components/jquery/jquery.min.js"></script>',
                        	'<script src="./vendor/twbs/bootstrap/dist/js/bootstrap.js"></script>',
                        	'<script src="./vendor/bootstrap-select/bootstrap-select/dist/js/bootstrap-select.js"></script>',
                         '<script src="./vendor/grimmlink/jquery-slimscroll/jquery.slimscroll.js"></script>',
                          '<script src="./vendor/node-waves/waves.js"></script>',
                          '<script src="./vendor/ckeditor/ckeditor/ckeditor.js"></script>',
                        '<script src="./public/js/admin/admin.js"></script>',
                        '<script src="./public/js/admin/editors.js"></script>',
                        '<script src="./public/js/admin/demo.js"></script>'];
?>

<?php ob_start(); ?>

    <section class="content">
        <div class="container-fluid">

            <!-- CKEditor -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                              Rédaction d'un article
                            </h2>
                        </div>
                        <div class="body">
                          <center>
                          <img src="./public/images/blog/posts/default.jpg" alt="post_img" class="img-thumbnail" width="50%">
                          <form action="index.php?action=adminCreateNewPost" method="post" enctype="multipart/form-data">
                          <input type="file" name="image">
                          <small>Dimensions idéales: 1920x1086</small>
                          <center>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# CKEditor -->

            <!-- CKEditor -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                          <h2>
                            Titre
                          </h2>
                        </div>
                        <div class="body">
                          <textarea id="ckeditor_title" name="title"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# CKEditor -->

            <!-- CKEditor -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                          <h2>
                            Chapo
                          </h2>
                        </div>
                        <div class="body">
                          <textarea id="ckeditor_chapo" name="chapo"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# CKEditor -->

            <!-- CKEditor -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                          <h2>
                            Contenu
                          </h2>
                        </div>
                        <div class="body">
                          <textarea id="ckeditor_content" name="content"></textarea>
                          <br>
                          <center>
                            <input class="btn bg-teal waves-effect" type="submit" value="Publier l'article">
                          </center>
                        </div>
                    </div>
                </div>
            </div>
          </form>
            <!-- #END# CKEditor -->

        </div>
    </section>
  </body>

  	<?php
  	$content = ob_get_clean();
  	require('template/adminTemplate.php');
  	?>
