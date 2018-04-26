<?php
$title = 'Florian STEIN - Projet 5 - DA PHP/Symfony OpenClassrooms';
$preloader = false;
$homeBanner = false;
$navbar = false;
$footer = false;
$scrollup = false;

$cssFiles = ['<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">',
             '<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">',
             '<link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">',
             '<link href="vendor/node-waves/waves.min.css" rel="stylesheet">',
             '<link href="vendor/drmonty/animate.css/css/animate.min.css" rel="stylesheet">',
             '<link href="public/css/admin/style.css" rel="stylesheet">'];

$jsFiles = ['<script src="vendor/components/jquery/jquery.min.js"></script>',
            '<script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>',
            '<script src="vendor/node-waves/waves.min.js"></script>',
            '<script src="vendor/jquery-validation/jquery.validate.js"></script>',
            '<script src="public/js/admin/admin.js"></script>'];
?>

<?php ob_start(); ?>

<body class="signup-page">
    <div class="signup-box">
        <div class="logo">
            <a href="javascript:void(0);">Inscription</a>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_up" action="../index.php?action=signup" method="POST">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="surname" placeholder="Nom" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="name" placeholder="Prénom" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" placeholder="Email" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" minlength="6" placeholder="Mot de passe" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="confirm" minlength="6" placeholder="Ressaisissez votre mot de passe" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="terms" id="terms" class="filled-in chk-col-pink">
                        <label for="terms">J'ai lu et accepte <a href="javascript:void(0);">les termes d'utilisation</a>.</label>
                    </div>
                    <input class="btn btn-block btn-lg bg-pink waves-effect" type="submit" value="S'inscrire">

                    <div class="m-t-25 m-b--5 align-center">
                        <a href="signInView.php">Vous êtes déjà membre ?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>


  <?php
  $content = ob_get_clean();
  require('template/blogTemplate.php');
  ?>
