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

            <?php
            if(isset($_GET['state']))
            {
                if($_GET['state'] == 'error')
                {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <h4 class="alert-heading">Erreur</h4>
                        <p>Vérifiez que tous les champs sont saisis, puis rééssayez.</p>
                        <hr>
                        <p class="mb-0">Si vous rencontrez un problème, n'hésitez pas à me contacter.</p>
                    </div>
                <?php
                }
                elseif($_GET['state'] == 'error_email_already_use')
                {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <h4 class="alert-heading">Erreur</h4>
                        <p>L'adresse email est déjà associée à un compte.</p>
                    </div>
                <?php
                }
                elseif($_GET['state'] == 'success')
                {
                ?>
                    <div class="alert alert-info" role="alert">
                        <h4 class="alert-heading">Félicitations</h4>
                        <p>Votre compte a bien été créé !</p>
                    </div>
                <?php
                }
            }
            ?>
            
                <form id="sign_up" action="index.php?action=signup" method="POST">
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
                    <input class="btn btn-block btn-lg bg-pink waves-effect" type="submit" value="S'inscrire">

                    <div class="m-t-25 m-b--5 align-center">
                        <a href="index.php?action=signin_view">Vous êtes déjà membre ?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>


  <?php
  $content = ob_get_clean();
  require('template/blogTemplate.php');
  ?>
