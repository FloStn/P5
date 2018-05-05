<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="IAMX, One Page Responsive HTML Resume Template">
  <meta name="keywords" content="onepage, resume, CV HTML template, personal Vcard, html resume, free resume template, free HTML template, free bootstrap template, personal portfolio, free html portfolio">
	<meta name="author" content="http://trendytheme.net/">

	<title><?= $title ?></title>

	<?php
  foreach($cssFiles as $row)
  {
    echo $row;
  }
  ?>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->

  <link rel="shortcut icon" href="public/images/home/ico/favicon.png">
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="public/images/home/ico/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="public/images/home/ico/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="public/images/home/ico/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="public/images/home/ico/apple-touch-icon-57-precomposed.png">

</head>



	<?php
	if($preloader == true)
	{
	?>
	<!-- Preloader -->
	<div id="tt-preloader">
		<div id="pre-status">
			<div class="preload-placeholder"></div>
		</div>
	</div>
	<?php
	}
	?>

  <?php
  if($homeBanner == true)
  {
  ?>
    <!-- Home Section -->
    <section id="home" class="tt-fullHeight" data-stellar-vertical-offset="50" data-stellar-background-ratio="0.2">
      <div class="intro">
        <h1>Développeur <span>PHP/Symfony</span></h1>
        
        <div class="social-icons">
          <ul class="list-inline">
            <li><a href="https://www.linkedin.com/in/florian-stein-742902144/" target="_blank"><i class="fa fa-linkedin"></i></a></li>
            <li><a href="https://github.com/FloStn" target="_blank"><i class="fa fa-github"></i></a></li>
          </ul>
        </div> <!-- /.social-icons -->
      </div>

      <div class="mouse-icon">
        <div class="wheel"></div>
      </div>
    </section><!-- End Home Section -->
  <?php
  }
  ?>

<?php
if($navbar == true)
{
?>
  <!-- Navigation -->
	<header class="header">
		<nav class="navbar navbar-custom" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#custom-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.html"><img src="public/images/home/logo.png" alt=""></a>
				</div>

				<div class="collapse navbar-collapse" id="custom-collapse">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="index.php#home">Accueil</a></li>
						<li><a href="index.php#about">A propos de moi</a></li>
						<li><a href="index.php?action=listPosts&page=1">Blog</a></li>
            <li><a href="index.php#contact">Me contacter</a></li>
						<?php
            if(isset($_SESSION['user']))
            {
            ?>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mon compte<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="index.php?action=my_account">Informations personnelles</a></li>
								<li><a href="index.php?action=deconnection">Déconnexion</a></li>
              </ul>
            </li>
            <?php
            }
            else
            {
            ?>
            <li><a href="index.php?action=signup_view">Inscription</a></li>
            <li><a href="index.php?action=signin_view">Connexion</a></li>
            <?php
            }
            ?>
					</ul>
				</div>
			</div><!-- .container -->
		</nav>
	</header><!-- End Navigation -->
	<?php
	}
	?>

  <?= $content ?>

<?php
if($footer == true)
{
?>
  <!-- Footer Section -->
    <footer class="footer-wrapper">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="copyright text-center">
            Projet n°5 de Florian STEIN - Parcours DA PHP/Symfony - <a href="https://openclassrooms.com" target="_blank">OpenClassrooms</a>
            <?php
            if(isset($_SESSION['role']) == "Administrateur")
            {
            ?>
              <br>
              <a href="index.php?action=adminUsersList">Administrer le site</a>
            <?php
            }
            ?>
            </div>
          </div>
        </div>
      </div>
    </footer><!-- End Footer Section -->
<?php
}
?>

<?php
if($scrollup == true)
{
?>
  <!-- Scroll-up -->
  <div class="scroll-up">
    <a href=<?= $anchor ?>><i class="fa fa-angle-up"></i></a>
  </div>
<?php
}
?>

  <!-- Javascript files -->
  <?php
  foreach($jsFiles as $row)
  {
    echo $row;
  }
  ?>

 </html>
