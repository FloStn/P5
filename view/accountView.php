<?php
$title = 'Florian STEIN - Projet 5 - DA PHP/Symfony OpenClassrooms';
$preloader = true;
$homeBanner = false;
$navbar = true;
$footer = true;
$scrollup = false;

$cssFiles = ['<link href="http://fonts.googleapis.com/css?family=Roboto:400,300,500,700" rel="stylesheet" type="text/css">',
             '<link href="./vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" media="screen">',
             '<link href="./vendor/fortawesome/font-awesome/css/font-awesome.min.css" rel="stylesheet" media="screen">',
             '<link href="./vendor/drmonty/animate.css/css/animate.min.css" rel="stylesheet">',
             '<link href="./vendor/dimsemenov/magnific-popup/dist/magnific-popup.css" rel="stylesheet">',
             '<link href="./public/css/blog/style.css" rel="stylesheet" media="screen">',
             '<link href="./public/css/blog/responsive.css" rel="stylesheet">',
              '<link href="./vendor/dropzone/basic.css" rel="stylesheet">',
              '<link href="./vendor/dropzone/dropzone.css" rel="stylesheet">'];

             $jsFiles = ['<script src="public/js/blog/jquery.js"></script>',
                        	'<script src="./vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>',
                        	'<script src="public/js/blog/jquery.sticky.js"></script>',
                         '<script src="public/js/blog/blog.js"></script>',
                          '<script src="vendor/editable-table/mindmup-editabletable.js"></script>',
                          '<script src="vendor/editable-table/editable-table.js"></script>',
                        '<script src="vendor/dropzone/dropzone.js"></script>'];
?>

<?php ob_start(); ?>

  <body>
    <section id="facts" class="facts-section text-center" data-stellar-vertical-offset="50" data-stellar-background-ratio="0.2">
      <div class="tt-overlay-bg">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="count-wrap">
                  <h2 class="section-blog-title wow fadeInUp">Mon compte</h2>
              </div><!-- /.count-wrap -->
            </div><!-- /.col-md-12 -->
          </div><!-- /.row -->
        </div>
      </section>

    <!-- About Section -->
    <section id="about" class="about-section section-padding">
      <div class="container">

        <div class="row">

          <div class="col-md-4 col-md-push-4">
            <div class="biography">

            <?php
                if(isset($_GET['state']))
                {
                if($_GET['state'] == 'success')
                {
                ?>
                    <div class="alert alert-info" role="alert">
                        <h4 class="alert-heading">Félicitations</h4>
                        <p>Vos informations ont été mises à jour !</p>
                    </div>
                <?php
                }
                }
                ?>

              <div class="myphoto">
                <img src="<?= $user->avatar() ?>" width="100%" height="100%" alt="">
              </div>

              <form action="index.php?action=updateAccount" method="POST" enctype="multipart/form-data">
                <input type="file" name="avatar">
                <hr>
                <input type="text" name="name" class="form-control" id="name" value="<?= $user->name() ?>" required="">
                <hr>
                <hr>
                <input type="text" name="surname" class="form-control" id="surname" value="<?= $user->surname() ?>" required="">
                <hr>
                <input type="text" name="email" class="form-control" id="email" value="<?= $user->email() ?>" required="">
                <hr>
                <h6> Nouveau mot de passe </h6>
                <input type="password" name="new_password" class="form-control" id="new_password" value="">
                <hr>
                <h6> Confirmer le nouveau mot de passe </h6>
                <input type="password" name="confirm_password" class="form-control" id="confirm_password" value="">
                <hr>
                <center><input class="btn btn-info" type="submit" value="Mettre à jour"></center>
              </form>
              <br>
            </div>
          </div> <!-- col-md-4 -->

        </div> <!-- /.row -->
      </div> <!-- /.container -->
    </section><!-- End About Section -->
  </body>

  <?php
  $content = ob_get_clean();
  require('template/blogTemplate.php');
  ?>
