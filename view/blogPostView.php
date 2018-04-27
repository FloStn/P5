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
                    <?php
                    $usr = $userManager->getUser($post->author());
                    echo $usr->surname();
                    ?>
                    <?= $usr->name(); ?>
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
        <h6><?= $post->chapo() ?></h6>
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
      <h5 class="card-header">Commenter cet article:</h5>
      <div class="card-body">
        <form action="index.php?action=newComment&idPost=<?= $_GET['id'] ?>" method="post">
          <div class="form-group">
            <textarea class="form-control" rows="3" name="comment"></textarea>
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
      <?php
        $comment_author = $userManager->getUser($comment->author());
        ?>
      <img class="avatar-comment" src="<?= $comment_author->avatar() ?>" alt="avatar">
        </div>
      <div class="media-body">
        <h5 class="mt-0">
        <?php
        $usr = $userManager->getUser($comment->author());
        echo $usr->surname();
        ?>
        <?= $usr->name(); ?>
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