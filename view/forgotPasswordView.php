<?php
$title = 'Florian STEIN - Projet 5 - DA PHP/Symfony OpenClassrooms';
$preloader = false;
$homeBanner = false;
$navbar = false;
$footer = false;
$scrollup = false;

$cssFiles = ['<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">',
             '<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">',
             '<link href="../vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">',
             '<link href="../vendor/node-waves/waves.min.css" rel="stylesheet">',
             '<link href="../vendor/drmonty/animate.css/css/animate.min.css" rel="stylesheet">',
             '<link href="../public/css/admin/style.css" rel="stylesheet">'];

$jsFiles = ['<script src="../vendor/components/jquery/jquery.min.js"></script>',
            '<script src="../vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>',
            '<script src="../vendor/node-waves/waves.min.js"></script>',
            '<script src="../vendor/jquery-validation/jquery.validate.js"></script>',
            '<script src="../public/js/admin/admin.js"></script>'];
?>

<?php ob_start(); ?>

<body class="fp-page">
    <div class="fp-box">
        <div class="logo">
            <a href="javascript:void(0);">Mot de passe oublié</a>
        </div>
        <div class="card">
            <div class="body">
                <form id="forgot_password" method="POST">
                    <div class="msg">
                        Saisissez votre adresse email ci-dessous.
                        <br>
                        Votre mot de passe y sera renvoyé.
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" placeholder="Email" required autofocus>
                        </div>
                    </div>

                    <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">Récupérer mon mot de passe</button>

                    <div class="row m-t-20 m-b--5 align-center">
                        <a href="signInView.php">J'ai récupéré mon mot de passe !</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

  <?php
  $content = ob_get_clean();
  require('template/blogTemplate.php');
  ?>
