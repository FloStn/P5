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

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">Connexion</a>
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
                        <p>Les identifiants saisis sont incorrects.</p>
                        <hr>
                        <p class="mb-0">Si vous rencontrez un problème, n'hésitez pas à me contacter.</p>
                    </div>
                <?php
                }
                elseif($_GET['state'] == 'success')
                {
                ?>
                    <div class="alert alert-info" role="alert">
                        <h4 class="alert-heading">Félicitations</h4>
                        <p>Connexion réussie !</p>
                        <hr>
                        <p class="mb-0">Redirection vers l'accueil dans 3 secondes...</p>
                    </div>
                <?php
                    header("Refresh: 3; url=index.php");
                }
            }
            ?>

                <form id="sign_in" action="index.php?action=signin" method="POST">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="email" placeholder="Email" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Mot de passe" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">Connexion</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <a href="index.php?action=signup_view">Créer un compte !</a>
                        </div>
                        <div class="col-xs-6 align-right">
                            <a href="index.php?action=forgot_password_view">Mot de passe oublié ?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
  </body>

  <?php
	$content = ob_get_clean();
	require('template/blogTemplate.php');
	?>
