<?php
$title = 'Florian STEIN - Projet 5 - DA PHP/Symfony OpenClassrooms';
$preloader = true;
$homeBanner = false;
$navbar = true;
$footer = true;
$scrollup = true;
$anchor = '#facts';
$bg = 'background: url('.$post->img().') no-repeat fixed center center';

$cssFiles = ['<link href="http://fonts.googleapis.com/css?family=Roboto:400,300,500,700" rel="stylesheet" type="text/css">',
             '<link href="./vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" media="screen">',
             '<link href="./vendor/fortawesome/font-awesome/css/font-awesome.min.css" rel="stylesheet" media="screen">',
             '<link href="./vendor/drmonty/animate.css/css/animate.min.css" rel="stylesheet">',
             '<link href="./vendor/dimsemenov/magnific-popup/dist/magnific-popup.css" rel="stylesheet">',
             '<link href="./public/css/blog/style.css" rel="stylesheet" media="screen">',
             '<link href="./public/css/blog/responsive.css" rel="stylesheet">'];

$jsFiles = ['<script src="public/js/blog/jquery.js"></script>',
           	'<script src="./vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>',
           	'<script src="public/js/blog/jquery.sticky.js"></script>',
            '<script src="public/js/blog/blog.js"></script>'];
?>


  <?php ob_start(); ?>

<body>
  <section id="facts" class="post-section text-center" data-stellar-vertical-offset="50" data-stellar-background-ratio="0.2" style="<?= $bg ?>">
    <div class="post-tt-overlay-bg">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="post-count-wrap">
              <div class="post-heading">
                  <h1><?= $post->title() ?></h1>
                  <br>
                  <span class="meta">Publié par
                    <b>
                    <?= $author->name() ?> <?= $author->surname(); ?>
                    </b> le <?= $post->addDateTimeFr() ?>.
                    <br>
                    <?php
                      if(!empty($post->lastModifDateTimeFr()))
                      {
                    ?>
                    Dernière modification le <?= $post->lastModifDateTimeFr() ?>.</span>
                    <?php
                      }
                    ?>
              </div>
            </div><!-- /.count-wrap -->
          </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
      </div>
    </section>

    <!-- Post Content -->
  <div class="container">
    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
      <blockquote class="blockquote">
        <p><?= $post->chapo() ?></p>
      </blockquote>
    </div>
    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
    <p><?= $post->content() ?></p>
    </div>
  </div>
  <br>

  <!-- Comments Form -->
  <div class="container">
    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
    <?php
            if(isset($_GET['state']))
            {
                if($_GET['state'] == 'error')
                {
            ?>
                <div class="alert alert-danger" role="alert">
                  <h4 class="alert-heading">Erreur</h4>
                  <p>Vous devez être connecté pour pouvoir commenter un article.</p>
                </div> 
            <?php
                }
                elseif($_GET['state'] == 'success')
                {
            ?>
                <div class="alert alert-info" role="alert">
                  <h4 class="alert-heading">Commentaire ajouté</h4>
                  <p>Votre commentaire a été ajouté ! Vous devez cependant attendre qu'un Administrateur le valide pour qu'il apparaisse dans la liste des commentaires de l'article.</p>
                </div>
            <?php
                }
            }
          ?>
      <h5 class="card-header">Commenter cet article:</h5>
      <div class="card-body">
        <form action="index.php?action=newComment&idPost=<?= $_GET['id'] ?>" method="POST">
          <div class="form-group">
            <?php
            if(isset($_SESSION['user']))
            {
            ?>
            <textarea class="form-control" rows="3" name="comment"></textarea>
            <?php
            }
            else
            {
            ?>
              <textarea class="form-control" rows="3" name="comment" placeholder="(Vous devez être connecté pour pouvoir commenter un article)."></textarea>
            <?php
            }
            ?>
          </div>
          <button type="submit" class="btn btn-primary">Publier</button>
        </form>
      </div>
    </div>
  </div>
  <hr>

  <!-- Single Comment -->
  <div class="container">
    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
      <?php
      foreach($comments as $comment)
      {
        if ($comment->state() == "Validé")
        {
      ?>
    <div class="media mb-4">
      <div class="pull-left">
      <img class="avatar-comment" src="<?= $comment->avatarModel()->avatar() ?>" alt="avatar">
        </div>
      <div class="media-body">
        <h5 class="mt-0">
        <?= $comment->authorModel()->name() ?> <?= $comment->authorModel()->surname() ?>
        </h5>
        <?= $comment->content() ?>
        <br>
        <small>Le <?= $comment->addDateTimeFr() ?></small>
      </div>
    </div>
      <?php
        }
      }
      ?>
    </div>
  </div>
  <hr>
</body>

	<?php
	$content = ob_get_clean();
	require('template/blogTemplate.php');
	?>
