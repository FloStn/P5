<?php
$title = 'Florian STEIN - Projet 5 - DA PHP/Symfony OpenClassrooms';
$preloader = true;
$homeBanner = false;
$navbar = true;
$footer = true;
$scrollup = true;
$anchor = '#facts';

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
  <section id="facts" class="facts-section text-center" data-stellar-vertical-offset="50" data-stellar-background-ratio="0.2">
    <div class="tt-overlay-bg">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="count-wrap">
                <h2 class="section-blog-title wow fadeInUp">Blog</h2>
            </div><!-- /.count-wrap -->
          </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
      </div>
    </section>

    <!-- Blog Section -->
    <section id="blog" class="latest-blog-section section-padding">
      <div class="container">
        <div class="row">
          <?php
  				foreach($posts as $post)
  				{
  				?>
          <div class="col-sm-6">
            <article class="blog-post-wrapper">
              <div class="figure">
                <div class="post-thumbnail">
                  <a href="#"><img src="<?= $post->img() ?>" class="img-responsive " alt=""></a>
                </div>
                  <i class="fa fa-file-photo-o"></i>
              </div><!-- /.figure -->
              <header class="entry-header">
                <h1 class="entry-title"><a href="#" rel=""><?= $post->title() ?></a></h1>
								<br>
								<blockquote class="blockquote">
  								<h6><?= substr($post->chapo(), 0, 300) ?>...</h6>
								</blockquote>
                <div class="center">
                <a class="btn custom-btn btn-primary" href="index.php?action=post&id=<?= $post->idPost() ?>">Lire la suite</a>
                </div>
								<hr>
                <center>
                <div class="entry-meta">
                  <ul class="list-inline">
                    <li>
                      <span class="the-author">
                        <a href="#"><?= $post->authorModel()->name() ?> <?= $post->authorModel()->surname() ?></a>
                      </span>
                    </li>
                    <li>
                      <span class="the-time">
                        <a href="#"><?= $post->addDateTimeFr() ?></a>
                      </span>
                    </li>
                  </ul>
                </div><!-- .entry-meta -->
                </center>
              </header><!-- .entry-header -->
            </article>
          </div><!-- /.col-sm-6 -->
          <?php
          }
          ?>
        </div><!-- /.row -->


				<!-- Pagination -->
				<center>
					<ul class="pagination">
          <?php
            for($i=1;$i<=$pagesTotales;$i++)
            {   
           ?>
          <li class="page-item"><a class="page-link" href="index.php?action=listPosts&page=<?= $i ?>"><?= $i ?></a></li>
          <?php
          }
          ?>
				  </ul>
				</center>

      </div><!-- /.container -->
    </section><!-- End Blog Section -->
  </body>

	<?php
	$content = ob_get_clean();
	require('template/blogTemplate.php');
	?>
