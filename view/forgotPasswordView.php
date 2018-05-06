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
<body class="fp-page">
   <div class="fp-box">
      <div class="logo">
         <a href="javascript:void(0);">Mot de passe oublié</a>
      </div>
      <div class="card">
         <div class="body">
            <?php
               if(isset($_GET['state']))
               {
                   if($_GET['state'] == 'success')
                   {
               ?>
            <div class="alert alert-info" role="alert">
               <h4 class="alert-heading">Mot de passe réinitialisé</h4>
               <p>Un mail contenant votre nouveau mot de passe a été envoyé à l'adresse email que vous avez spécifiée.</p>
            </div>
            <?php
               }
               elseif($_GET['state'] == 'error')
               {
               ?>
            <div class="alert alert-danger" role="alert">
               <h4 class="alert-heading">Adresse email introuvable</h4>
               <p>L'adresse que vous avez renseignée n'est liée à aucun compte.</p>
            </div>
            <?php
               }
               elseif($_GET['state'] == 'unknown_error')
               {
               ?>
            <div class="alert alert-danger" role="alert">
               <h4 class="alert-heading">Erreur</h4>
               <p>Une erreur a été rencontrée. Veuillez rééssayer ultérieurement.</p>
            </div>
            <?php
               }
               }
               ?>
            <form id="forgot_password" action="index.php?action=forgotPassword" method="POST">
               <div class="msg">
                  Saisissez votre adresse email ci-dessous.
                  <br>
                  Vous recevrez un mail contenant un nouveau mot de passe.
               </div>
               <div class="input-group">
                  <span class="input-group-addon">
                  <i class="material-icons">email</i>
                  </span>
                  <div class="form-line">
                     <input type="email" class="form-control" name="email" placeholder="Email" required autofocus>
                  </div>
               </div>
               <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">Réinitialiser mon mot de passe</button>
               <div class="row m-t-20 m-b--5 align-center">
                  <a href="index.php?action=signin_view">J'ai bien reçu mon nouveau mot de passe !</a>
               </div>
            </form>
         </div>
      </div>
   </div>
   <?php
      $content = ob_get_clean();
      require('template/blogTemplate.php');
      ?>